<?php

class User_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->library('session');
       
    }
    
    function add($postdata) {
	    
	    // If e-mail already exists, kick them to a "your e-mail already exists" page and force them to verify
	    
	    // if (!$postdata['email']) show_error("E-mail address is required.");
	    $email = $postdata['email'];
	    $phone = $postdata['phone'];
	    $data = ['email'=>$postdata['email'], 'phone'=>$postdata['phone'], 'language'=>$postdata['language'], 'started'=>time()];

        if((isset($phone) && $phone!="") && (isset($email) && $email!="")){

           $query = "SELECT * FROM users WHERE email = '".$email."' OR phone = '".$phone."' LIMIT 1;";

        }else if(isset($phone) && $phone!=""){

           $query = "SELECT * FROM users WHERE phone = '".$phone."' LIMIT 1;";

        }else if(isset($email) && $email!=""){

           $query = "SELECT * FROM users WHERE email = '".$email."'  LIMIT 1;";
        }
	    $alreadyExist = $this->db->query($query)->row();

	    //echo "<pre>"; print_r($alreadyExist->user_id);"</pre>";exit();
        if($alreadyExist){
	        	// Set session data
		    $this->session->set_userdata([
				'user_id'=>$alreadyExist->user_id,
				'email'=>$alreadyExist->email, 
				'phone'=>$alreadyExist->phone, 
				'language'=>$postdata['language']
		    ]);
		  
	    }else{

		    $this->db->insert('users', $data);
		    $user_id = $this->db->insert_id();
		    
		    // Set session data
		    $this->session->set_userdata([
				'user_id'=>$user_id,
				'email'=>$postdata['email'], 
				'phone'=>$postdata['phone'], 
				'language'=>$postdata['language']
		    ]);
	    }

	    //$user_id = $this->session->user_id;
    	//print_r($user_id);exit();

	    
    }

    function changeLanguage($language) {
	    
	    $user_id = $this->session->user_id;
	    $this->db->update('users', ['language'=>$language], ['user_id'=>$user_id]);
	    
    }

} // end class