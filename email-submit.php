<?php

	require_once 'snippets/mailchimp/MCAPI.class.php';
	require_once 'snippets/mailchimp/config.inc.php'; //contains apikey

	$api = new MCAPI($apikey);

	if(isset($_POST['source']) && $_POST['source']!='')
	$merge_vars = array('EMAIL'=>strip_tags($_POST['email']),'SOURCE'=>strip_tags($_POST['source']));
	else
	$merge_vars = array('EMAIL'=>strip_tags($_POST['email']));

	// By default this sends a confirmation email - you will not see new members
	// until the link contained in it is clicked!
	$retval = $api->listSubscribe( $listId, $_POST['email'], $merge_vars );

	
	
	
	
	if ($api->errorCode){
		//echo "Unable to load listSubscribe()!\n";
		//echo "\tCode=".$api->errorCode."\n";
		
		if($api->errorCode == 214){
			echo "<span data-type='success'><strong>You've already subscribed!</strong> <a href='http://eepurl.com/hxyzM' target='_blank' class='blue'>update your profile</a> or <strong><a href='/download-printables/?email=".strip_tags($_POST['email'])."&download=true'>download your printables</a></strong>.</span>";
		}
		else{
			echo "<strong>".$api->errorMessage."</strong>";
		}
		
		
		
		
	} else {
		echo "<span data-type = 'success'><strong>Please check your email</strong> to confirm & download your free printables.</span>";
	}
	
	
	
	
	

?>