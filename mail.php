<?php
	require 'PHPMailer/PHPMailerAutoload.php';
	// geboinc@yahoo.com
	$mail = new PHPMailer;

	$mail->setFrom('daveperlman89@me.com', 'Lisa/Craig Lentz');
	$mail->addAddress("$_POST[from]", "$_POST[first] $_POST[last]");
	$mail->Subject = 'A Message From WildDuckPub.com';
	$mail->Body = "$_POST[body]";

		if (!$mail->send()) 
		{
			echo "Oops! Something went wrong. Please try again later.";
		}else
		{
			echo "Thank you for your message. We'll be in touch soon!";
		}