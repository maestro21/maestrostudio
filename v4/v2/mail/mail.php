<?php
/**
 * This example shows making an SMTP connection with authentication.
 */
//Import the PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Europe/Zurich');
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';


function sendmail($data) {

	//Create a new PHPMailer instance
	$mail = new PHPMailer;
	//Tell PHPMailer to use SMTP
	$mail->isSMTP();
	$mail->CharSet = 'UTF-8';
	//Enable SMTP debugging
	// 0 = off (for production use)
	// 1 = client messages
	// 2 = client and server messages
	$mail->SMTPDebug = 0;
	//Set the hostname of the mail server
	$mail->Port = 465;
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "ssl";
	/*
	$mail->Host = 'smtp.gmail.com';
	$mail->Username = 'sergeyspopov@gmail.com';
	$mail->Password = 'serijkotrulit86'; */
	$mail->Host = 'smtp.yandex.ru';
	$mail->Username = 'info@webstudio-maestro.ch';
	$mail->Password = 'serega86';
	// addr
	$mail->setFrom($data['from'], $data['from_name']);
	$mail->addReplyTo($data['replyto'], $data['replyto_name']);
	$mail->addAddress($data['to'], $data['to_name']);
	//Set the subject line
	$mail->Subject = $data['subj'];
	$mail->msgHTML($data['html']);
	$mail->AltBody = $data['text'];
	if (!$mail->send()) {
		$res = ['error' => $mail->ErrorInfo];
	} else {
		$res = ['msg' => 'Ok'];
	}
	echo json_encode($res);
}