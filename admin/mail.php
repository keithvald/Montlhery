<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once '../code/phpmailer/Exception.php';
require_once '../code/phpmailer/PHPMailer.php';
require_once '../code/phpmailer/SMTP.php';

require_once 'adminGestion.php';


$mail = new PHPMailer(true);

$alert = '';
try{
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = $mailAdmin; // Gmail address which you want to use as SMTP server
	$mail->Password = $passwordAdmin; // Gmail address Password
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
	$mail->Port = '587';

	$mail->setFrom($mailAdmin); // Gmail address which you used as SMTP server
	$mail->addAddress($mailAdmin); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

	$mail->isHTML(true);
	$mail->Subject = $subject;
	$mail->Body = "<h2>Code de verification</h2> <strong>Code: $code </strong>";

	$mail->send();
	$alert = '<div class="alert-success mb-5">
				<span>Message envoyé ! Merci de nous avoir contacté</span>
			</div>';
} catch (Exception $e){
	$alert = '<div class="alert-error mb-5">
				<span>'.$e->getMessage().'</span>
			</div>';
};
?>
