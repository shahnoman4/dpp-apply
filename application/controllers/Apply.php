<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apply extends CI_Controller {

	function __construct() {

		parent::__construct();
		//$this->load->library('session');
	    include APPPATH . 'third_party/HelloSign/HelloSign.php';
		$this->data = array();
		$this->load->library('email');


		// if (ENVIRONMENT=='development') $this->output->enable_profiler(TRUE);

	} // construct
	 
	 
	public function index()
	{
		if (!$this->session->userdata('language')) {
			$language = 'english';
		} else {
			$language = $this->session->userdata('language');
		}
		$this->data['pdf'] = site_url("download/DPP-2017-001_ParentApp_Comm_1617-$language.pdf");
		$this->load->view('partials/header', $this->data);
		$this->load->view('start', $this->data);
		$this->load->view('partials/footer', $this->data);
		
	}
	
	public function step($step=1, $response=false) {

		$user_id = $this->session->user_id;
		$this->data['preschool'] = null;
		if (!!$user_id) {
			$this->data['preschool'] = $first = $this->db->query("SELECT * FROM meta WHERE user_id = $user_id AND field = 'preschool_name' LIMIT 1;")->row();
		}
		
		// Data will save at this point

		$currentURL = current_url();
		$parts = explode("/", $currentURL);
		$param = end($parts);
		
		$this->data['current_step'] = ($param == 'edit') ? 7 : $step;
		$this->data['response']     = $response;

		
		
		if ($step == 9 && !!$user_id) {
			$first = $this->db->query("SELECT * FROM meta WHERE user_id = $user_id AND field = 'parent_1_first_name' LIMIT 1;")->row();
			$last = $this->db->query("SELECT * FROM meta WHERE user_id = $user_id AND field = 'parent_1_last_name' LIMIT 1;")->row();
			$full_name = $first->value . " " . $last->value;
            
			$client = new HelloSign\Client('5031e0a9d16b999a508301fc1dd1ad0c9cda2bf07d1d9e63f16ee8705f539021');
			$request = new HelloSign\TemplateSignatureRequest;
			$request->enableTestMode();
			$request->setTemplateId('ef5d0cf5ccd334814e127bbe8d163501d7c54586');
			$request->setTitle('DPP Application Signature Page');
			$request->setSubject('This is the DPP Application Signature Page');
			$request->setMessage('This is a message about the DPP Application Signature Page.');
			$request->setSigner('Parent', $this->session->userdata('email'), $full_name);
			$request->setCustomFieldValue('Month', '5');
			$request->setCustomFieldValue('Day', '5');
			$request->setCustomFieldValue('Year', '19');

			$client_id = 'e91c268e23d21673ee9975ec334f256e';
			$embedded_request = new HelloSign\EmbeddedSignatureRequest($request, $client_id);
			$response = $client->createEmbeddedSignatureRequest($embedded_request);
			$signatures   = $response->getSignatures();
			$signature_id = $signatures[0]->getId();
			$response = $client->getEmbeddedSignUrl($signature_id);
			$sign_url = $response->getSignUrl();

			$this->data['client_id'] = $client_id;
			$this->data['sign_url'] = $sign_url;
			//echo $step; exit();
		}
		

		if ( 10 == $step && 'email' == $response ) {

			// Send Email for step 10.
			$result = $this->send_form_email();
		}


		$this->load->view('partials/header', $this->data);
		$this->load->view('step'.$step, $this->data);
		$this->load->view('partials/footer', $this->data);
		
	}
	
	public function process( $step = 1 ) {
		if ( 'start' == $step ) {
			$this->user->add( $this->input->post( null, true ) );
			$user_id = $this->session->user_id;
			$last = "SELECT * FROM meta WHERE user_id = '".$user_id."' AND step IS NOT NULL ORDER BY meta_id DESC";
	        $lastdata = $this->db->query($last)->row();
	        if($lastdata){   
		    $next_step = $lastdata->step;
		    redirect('apply/step/'.$next_step); 
		    }else{
			$step=0;

		    }

		} else {
			
		$this->meta->add($this->input->post(null, true));
		//echo "<pre>";print_r($_FILES);"</pre>";exit();
		$user_id = $this->session->user_id;
		if(isset($_FILES)){

		    if(isset($_FILES['verification_document_income'])){
                

//echo "<pre>";print_r($_FILES['verification_document_income']);"</pre>";exit();
		    	$newFileNames ='';
		    	foreach ($_FILES['verification_document_income']['tmp_name'] as  $key => $value) {
	          //echo $key; exit();
	            $fileTmpPath = $_FILES['verification_document_income']['tmp_name'][$key];
	            $fileName = $_FILES['verification_document_income']['name'][$key];
				$fileSize = $_FILES['verification_document_income']['size'][$key];
				$fileType = $_FILES['verification_document_income']['type'][$key];
				$fileNameCmps = explode(".", $fileName);
				$fileExtension = strtolower(end($fileNameCmps));
				$newFileName = (time() . $fileName) . '.' . $fileExtension;
				//print_r($_FILES['verification_document_income']);exit();
				$id = mkdir('files/'.$user_id);
				$uploadFileDir = './files/'.$user_id.'/';
	            $dest_path = $uploadFileDir . $newFileName;
	            move_uploaded_file($fileTmpPath, $dest_path);

	           $newFileNames.=$newFileName.",";

	          }
	          $name = rtrim($newFileNames, ",");
	          //echo $name;exit();
                $keyval ='verification_document_income';
	            $query = $this->db->get_where('meta', ['user_id'=>$user_id, 'field'=>$keyval]);
			    if ($query->num_rows() > 0) {
				    $row=$query->row();
				    $this->db->update('meta', ['field'=>$keyval, 'value'=>$name], ['meta_id'=>$row->meta_id]);
			    } else {
				    $this->db->insert('meta', ['field'=>$keyval, 'value'=>$name, 'user_id'=>$user_id]);
			    }

            }else{
	          foreach ($_FILES as  $key => $value) {
	          
	            $fileTmpPath = $value['tmp_name'];
	            $fileName = $value['name'];
				$fileSize = $value['size'];
				$fileType = $value['type'];
				$fileNameCmps = explode(".", $fileName);
				$fileExtension = strtolower(end($fileNameCmps));
				$newFileName = (time() . $fileName) . '.' . $fileExtension;
				//print_r($user_id);exit();
				$id = mkdir('files/'.$user_id);
				$uploadFileDir = './files/'.$user_id.'/';
	            $dest_path = $uploadFileDir . $newFileName;
	            move_uploaded_file($fileTmpPath, $dest_path);

	           $query = $this->db->get_where('meta', ['user_id'=>$user_id, 'field'=>$key]);
			    if ($query->num_rows() > 0) {
				    $row=$query->row();
				    $this->db->update('meta', ['field'=>$key, 'value'=>$newFileName], ['meta_id'=>$row->meta_id]);
			    } else {
				    $this->db->insert('meta', ['field'=>$key, 'value'=>$newFileName, 'user_id'=>$user_id]);
			    }

	          }
	        }  
        }    
	 }
	  $user_id = $this->session->user_id;
		$last = "SELECT * FROM meta WHERE user_id = '".$user_id."' AND step IS NOT NULL ORDER BY meta_id DESC";
	    $lastdata = $this->db->query($last)->row();
	    //print_r($lastdata);exit();
	    if(isset($lastdata->step) && $lastdata->step!=""){   
		    $next_step = $lastdata->step;
		    if($next_step > ($step+1)){
		    redirect('apply/step/'.$next_step); 
		    }else{
		    	var_dump ($step);
				$next_step = $step+1;
				redirect('apply/step/'.$next_step);
		    }
		}else{
		var_dump ($step);
		$next_step = $step+1;
		redirect('apply/step/'.$next_step);
	    }
	}


	function printXml($date=false) {
		
		//$date = $_GET['date'];
		// echo $date; exit();
	    if(isset($date) && $date!=""){

	     $res = $this->db->query('Select * from users WHERE last_activity ='.$date);
	    }else{

	     $res = $this->db->query('Select * from users');

         }
         $user = [];
         foreach($res->result() as $rows) {

                  $meta = $this->db->query("Select * from meta WHERE user_id =".$rows->user_id);
          
         	$user[] = ['user_id' => $rows->user_id, 'email' => $rows->email,'phone' => $rows->phone,
                         'meta' => $meta->result()
         	           ];

         }


	    if (!empty($user)) {
	        $sxe   = new SimpleXMLElement('<Start/>');
	        //$deals = $sxe->addChild('deals');
            header('Content-type: text/xml');

	        foreach($user as $item) {

	            $users = $sxe->addChild('User');
	            $users->addChild('Id', $item['user_id']);
	            $users->addChild('Email', $item['email']);
	            $users->addChild('Phone', $item['phone']);
	            
	           //$metaData = $users->addChild('MetaData');
	            if(!empty($item['meta'])){
	            	foreach($item['meta'] as $ro) {
	                    
			            $users->addChild($ro->field, htmlspecialchars($ro->value));
			           // $metaData->addChild('Value', htmlspecialchars($ro->value));
		           }
		        }
		           
	            
	        }
	    }

	    echo $sxe->saveXML();
    }

	public function send_form_email(){
         
       
		$this->email->initialize(array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'smtp.sendgrid.net',
		  'smtp_user' => 'dpporg',
		  'smtp_pass' => '3ORrk!v0vqwz',
		  'smtp_port' => 587,
		  'crlf' => "\r\n",
		  'newline' => "\r\n"
		));
		//$headers = "MIME-Version: 1.0" . "\r\n";
         //$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        //$this->session->userdata( 'email' )
		$this->email->from('your@example.com', 'Your Name');
		$this->email->to($this->session->userdata( 'email' ));
		$this->email->cc('another@another-example.com');
		$this->email->bcc('them@their-example.com');
		$this->email->subject('DPP Tuition Application: Reply to this message and attach your files');
		$this->email->message("<p>Thank you for submitting your application to receive Denver Preschool Program tuition credit.</p> 
	
			<p>To complete your application please submit the required documents outlined below by simply replying to this email and including the attachments. </p>
			
			<p>Missing or incorrect documents will delay the processing of your application. </p>
			
			<h2>Required Documents</h2>
			<h3>VERIFICATION OF CHILD’S AGE</h3>
			<p>A copy of the child’s Birth Certificate, baptismal record, or hospital record showing child’s birth. In order to receive DPP funds the student must be 4-years-old on or before October 1 of the school year.</p>
			
			<h3>VERIFICATION OF CURRENT ADDRESS IN THE CITY AND COUNTY OF DENVER</h3>
			<p>A copy of current lease, proof of home ownership, or utility bill (with service or premise address listed) such as your bill for gas, electric, water or cable.</p>
			
			<h3>VERIFICATION OF ONE MONTH’S INCOME</h3>
			<p>Most current check stubs (if paid more than once a month, include all stubs for month), wage statement, tax return or other work documents for each parent/guardian’s income. If none of these documents are available, you may provide an income affidavit by contacting 303.595.4DPP(4377).</p>
			
			<h2>What Happens Next?</h2>
			<p>Upon approval, DPP will send a letter informing you and your preschool of the tuition credit for your child. The Tuition Credit will be paid directly to your child’s preschool and deducted from your tuition. Let us know if your family circumstances change after you apply.</p>
			
			<p>We are happy to have you join the Denver Preschool Program. If you have any questions about your application or Tuition Credit application process, please call 303.595.4DPP(4377).</p>
			
			<p>Sincerely,<br>
			DPP</p>");
		$this->email->set_header('Header1', 'Value1');

        $this->email->set_header('Header2', 'Value2');
		$this->email->send();

		echo $this->email->print_debugger();
		exit();
	}
	
	public function send_form_emails() {
		// $this->load->library('email');
		
		// $this->email->to( $this->session->userdata('email') );
		// $this->email->bcc( 'testemailfromelementive@gmail.com' );

		// $this->email->subject( 'DPP Tuition Application: Reply to this message and attach your files' );
		// $this->email->message( "<p>Thank you for submitting your application to receive Denver Preschool Program tuition credit.</p> 
	
		// <p>To complete your application please submit the required documents outlined below by simply replying to this email and including the attachments. </p>
		
		// <p>Missing or incorrect documents will delay the processing of your application. </p>
		
		// <h2>Required Documents</h2>
		// <h3>VERIFICATION OF CHILD’S AGE</h3>
		// <p>A copy of the child’s Birth Certificate, baptismal record, or hospital record showing child’s birth. In order to receive DPP funds the student must be 4-years-old on or before October 1 of the school year.</p>
		
		// <h3>VERIFICATION OF CURRENT ADDRESS IN THE CITY AND COUNTY OF DENVER</h3>
		// <p>A copy of current lease, proof of home ownership, or utility bill (with service or premise address listed) such as your bill for gas, electric, water or cable.</p>
		
		// <h3>VERIFICATION OF ONE MONTH’S INCOME</h3>
		// <p>Most current check stubs (if paid more than once a month, include all stubs for month), wage statement, tax return or other work documents for each parent/guardian’s income. If none of these documents are available, you may provide an income affidavit by contacting 303.595.4DPP(4377).</p>
		
		// <h2>What Happens Next?</h2>
		// <p>Upon approval, DPP will send a letter informing you and your preschool of the tuition credit for your child. The Tuition Credit will be paid directly to your child’s preschool and deducted from your tuition. Let us know if your family circumstances change after you apply.</p>
		
		// <p>We are happy to have you join the Denver Preschool Program. If you have any questions about your application or Tuition Credit application process, please call 303.595.4DPP(4377).</p>
		
		// <p>Sincerely,<br>
		// DPP</p>" );
		
		// $this->email->send();

		return mail(
			$this->session->userdata( 'email' ),
			'DPP Tuition Application: Reply to this message and attach your files',
			"<p>Thank you for submitting your application to receive Denver Preschool Program tuition credit.</p> 
	
			<p>To complete your application please submit the required documents outlined below by simply replying to this email and including the attachments. </p>
			
			<p>Missing or incorrect documents will delay the processing of your application. </p>
			
			<h2>Required Documents</h2>
			<h3>VERIFICATION OF CHILD’S AGE</h3>
			<p>A copy of the child’s Birth Certificate, baptismal record, or hospital record showing child’s birth. In order to receive DPP funds the student must be 4-years-old on or before October 1 of the school year.</p>
			
			<h3>VERIFICATION OF CURRENT ADDRESS IN THE CITY AND COUNTY OF DENVER</h3>
			<p>A copy of current lease, proof of home ownership, or utility bill (with service or premise address listed) such as your bill for gas, electric, water or cable.</p>
			
			<h3>VERIFICATION OF ONE MONTH’S INCOME</h3>
			<p>Most current check stubs (if paid more than once a month, include all stubs for month), wage statement, tax return or other work documents for each parent/guardian’s income. If none of these documents are available, you may provide an income affidavit by contacting 303.595.4DPP(4377).</p>
			
			<h2>What Happens Next?</h2>
			<p>Upon approval, DPP will send a letter informing you and your preschool of the tuition credit for your child. The Tuition Credit will be paid directly to your child’s preschool and deducted from your tuition. Let us know if your family circumstances change after you apply.</p>
			
			<p>We are happy to have you join the Denver Preschool Program. If you have any questions about your application or Tuition Credit application process, please call 303.595.4DPP(4377).</p>
			
			<p>Sincerely,<br>
			DPP</p>"
		);
	}

}
