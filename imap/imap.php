<style>
	div.toggler				{ border:1px solid #ccc; background:url(gmail2.jpg) 10px 12px #eee no-repeat; cursor:pointer; padding:10px 32px; }
div.toggler .subject	{ font-weight:bold; }
div.read					{ color:#666; }
div.toggler .from, div.toggler .date { font-style:italic; font-size:11px; }
div.body					{ padding:10px 20px; }
	</style>

<?php
	
	/* connect to gmail */
$hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
$username = 'apply@dpp.org';
$password = 'atvGiTl!oCBs';

/* try to connect */
$inbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());

/* grab emails */
$emails = imap_search($inbox,'UNSEEN');

/* if emails are returned, cycle through each... */
if($emails) {
	
	/* begin output var */
	$output = '';
	
	/* put the newest emails on top */
	rsort($emails);
	
	/* for every email... */
	foreach($emails as $email_number) {
		
		/* get information specific to this email */
		$overview = imap_fetch_overview($inbox,$email_number,0);
		$message = imap_fetchbody($inbox,$email_number,2);
		$structure = imap_fetchstructure($inbox,$email_number);

		echo '<pre>'; print_r($overview); echo '</pre>';

		// Get normal attachments

	     $attachments = array();
	       if(isset($structure->parts) && count($structure->parts)) {
	         for($i = 0; $i < count($structure->parts); $i++) {
	           $attachments[$i] = array(
	              'is_attachment' => false,
	              'filename' => '',
	              'name' => '',
	              'attachment' => '');
	
	           if($structure->parts[$i]->ifdparameters) {
	             foreach($structure->parts[$i]->dparameters as $object) {
	               if(strtolower($object->attribute) == 'filename') {
	                 $attachments[$i]['is_attachment'] = true;
	                 $attachments[$i]['filename'] = $object->value;
	               }
	             }
	           }
	
	           if($structure->parts[$i]->ifparameters) {
	             foreach($structure->parts[$i]->parameters as $object) {
	               if(strtolower($object->attribute) == 'name') {
	                 $attachments[$i]['is_attachment'] = true;
	                 $attachments[$i]['name'] = $object->value;
	               }
	             }
	           }
	
	           if($attachments[$i]['is_attachment']) {
	             $attachments[$i]['attachment'] = imap_fetchbody($inbox, $email_number, $i+1);
	             if($structure->parts[$i]->encoding == 3) { // 3 = BASE64
	               $attachments[$i]['attachment'] = base64_decode($attachments[$i]['attachment']);
	             }
	             elseif($structure->parts[$i]->encoding == 4) { // 4 = QUOTED-PRINTABLE
	               $attachments[$i]['attachment'] = quoted_printable_decode($attachments[$i]['attachment']);
	             }
	           }             
	         } // for($i = 0; $i < count($structure->parts); $i++)
	       } // if(isset($structure->parts) && count($structure->parts))
	
		   $filenames = array();
		    if(count($attachments)!=0){
		        foreach($attachments as $at){
		            if($at['is_attachment']==1){
		                file_put_contents('attachments/'.$at['filename'], $at['attachment']);
		            }
		            $filenames[] = $at['filename'];
		        }
		    }
		    
		    // mail($overview[0]->from, 'DPP Application Message Received', "Thank you for your message. We received the following attachments: " . implode(', ', $filenames));
		
			/* output the email header information 
			$output.= '<div class="toggler '.($overview[0]->seen ? 'read' : 'unread').'">';
			$output.= '<span class="subject">'.$overview[0]->subject.'</span> ';
			$output.= '<span class="from">'.$overview[0]->from.'</span>';
			$output.= '<span class="date">on '.$overview[0]->date.'</span>';
			$output.= '</div>';
			*/
			
			/* output the email body 
			$output.= '<div class="body">'.$message.'</div>';
			*/
		}
		
	echo $output;
} 

/* close the connection */
imap_close($inbox);