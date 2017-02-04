<?php

	require_once 'MCAPI.class.php';
	require_once 'config.inc.php'; //contains apikey

	$api = new MCAPI($apikey);
	
	
	//SUBMIT AN EMAIL
	if($_GET['q'] == 'email-submit'){
		$merge_vars = array('EMAIL'=>$_POST['email']);

		// By default this sends a confirmation email - you will not see new members
		// until the link contained in it is clicked!
		$retval = $api->listSubscribe( $listId, $_POST['email'], $merge_vars );

		if ($api->errorCode){
			//echo "Unable to load listSubscribe()!\n";
			//echo "\tCode=".$api->errorCode."\n";
			echo '<span data-type="error"><strong>'.$api->errorMessage.'</strong></span>';
		} else {
			echo "<span data-type=\"success\"><strong>Thank you for your subscription! Please check your inbox for confirmation email.</strong></span>";
		}
	}
	
	
	//GET STATS
	if($_GET['q'] == 'stats'){
		$retval = $api->lists();
		
		//first list: $retval['data'][0]
		$output_stats['member_count'] = $retval['data'][0]['stats']['member_count'];
		header('Content-Type: application/json');
		echo json_encode($output_stats, JSON_PRETTY_PRINT);
	}

?>