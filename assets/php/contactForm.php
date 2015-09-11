<?php
//	// Contact
//	$to = 'jmekstrom@gmail.com';
//    $subject = 'Job Opportunity';
//
//	if(isset($_POST['c_name']) && isset($_POST['c_email']) && isset($_POST['c_message'])){
//   		$name    = $_POST['c_name'];
//		$headers = "From: " . strip_tags($_POST['c_email']) . "\r\n";
//		$headers .= "Reply-To: " . strip_tags($_POST['c_email']) . "\r\n";
//		$headers .= "CC: jxstrom@example.com\r\n";
//		$headers .= "MIME-Version: 1.0\r\n";
//		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
//    	$message = $_POST['c_message'];
//
//		if (mail($to, $subject, $message, $headers)) {
//			$result = array(
//				'message' => 'Thanks for contacting me!',
//				'sendstatus' => 1
//				);
//			echo json_encode($result);
//		} else {
//			$result = array(
//				'message' => 'Sorry, something is wrong',
//				'sendstatus' => 1
//				);
//			echo json_encode($result);
//		}
//	}
//
//?>

<?php
require_once('php/class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail = new PHPMailer();

$body = file_get_contents('contents.html');
$body = eregi_replace("[\]", '', $body);

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host = "mail.yourdomain.com"; // SMTP server
$mail->SMTPDebug = 2;                     // enables SMTP debug information (for testing)
// 1 = errors and messages
// 2 = messages only
$mail->SMTPAuth = true;                  // enable SMTP authentication
$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
$mail->Host = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port = 587;                   // set the SMTP port for the GMAIL server
$mail->Username = "yourusername@gmail.com";  // GMAIL username
$mail->Password = "yourpassword";            // GMAIL password

$mail->SetFrom('name@yourdomain.com', 'First Last');

$mail->AddReplyTo("name@yourdomain.com", "First Last");

$mail->Subject = "PHPMailer Test Subject via smtp (Gmail), basic";

$mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);

$address = "whoto@otherdomain.com";
$mail->AddAddress($address, "John Doe");

$mail->AddAttachment("images/phpmailer.gif");      // attachment
$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment


if (!$mail->Send()) {
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
?>
