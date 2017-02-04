<?php
if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) && strlen($_POST["message"]) > 1 && $_POST["name"]=="Art Socket" ) {
	$from = $_POST["email"]; // sender
	$subject = 'Contact form - ArtSocket';
	$message = strip_tags($_POST["message"]);
	// message lines should not exceed 70 characters (PHP rule), so wrap it
	$message = 'From: '.$from.'

'.wordwrap($message, 70);
	// send mail
	mail("[[[YOUR EMAIL]]]",$subject,$message,"From: $from\n");
	echo "<span data-type='success'><strong>Thanks!</strong> I got your message, will reply soon.</span>";
}else{
	echo "<strong>Please make sure that you've filled out all the fields in the contact form and <a href=\"http://enable-javascript.com/\" target=\"_blank\" rel=\"_nofollow\">have your JavaScript enabled</a>.</strong>";
}
?>