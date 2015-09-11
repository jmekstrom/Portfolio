<?php

	// Contact
	$to = 'jmekstrom@gmail.com';
    $subject = 'Job Opportunity';

	if(isset($_POST['c_name']) && isset($_POST['c_email']) && isset($_POST['c_message'])){
   		$name    = $_POST['c_name'];
		$headers = "From: " . strip_tags($_POST['c_name']) . "\r\n";
		$headers .= "Reply-To: " . strip_tags($_POST['c_email']) . "\r\n";
		$headers .= "CC: jxstrom@example.com\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    	$message = $_POST['c_message'];

		if (mail($to, $subject, $message, $headers)) {
			$result = array(
				'message' => 'Thanks for contacting me!',
				'sendstatus' => 1
				);
			echo json_encode($result);
		} else { 
			$result = array(
				'message' => 'Sorry, something is wrong',
				'sendstatus' => 1
				);
			echo json_encode($result);
		} 
	}

?>