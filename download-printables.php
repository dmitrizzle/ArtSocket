<?php


require_once 'snippets/mailchimp/MCAPI.class.php';
require_once 'snippets/mailchimp/config.inc.php'; //contains apikey

$api = new MCAPI($apikey);
$result = $api->listMemberInfo($listId, strip_tags($_GET['email']));

//echo $result['data'][0]['status'];

if(!isset($_GET['download']) && isset($_GET['email']) && $result['data'][0]['status']=="subscribed")
	echo 'ok';
elseif(!isset($_GET['download']))
	echo '<strong>Please <a href="/subscribe/">sign up</a> for our newsletter</strong> to get these printables, free!';

if(isset($_GET['download']) && isset($_GET['email']) && $result['data'][0]['status']=="subscribed")
pushDownload();

//from: http://www.kavoir.com/2009/05/php-hide-the-real-file-url-and-provide-download-via-a-php-script.html
function pushDownload(){

	
	//log
	date_default_timezone_set('EST');
	$file = 'downloads_log.txt';
	$current = file_get_contents($file);
	$current .= strip_tags($_GET['email'])." ".$path." ".date("D M j G:i:s T Y")."\n";
	file_put_contents($file, $current);
	
	
	// the file made available for download via this PHP file
	$path = '/home2/artsocke/products/Free-Origami-Foldables-from-ArtSocket.pdf'; 
	$mm_type="application/octet-stream"; // modify accordingly to the file type of $path, but in most cases no need to do so
	//$mm_type="application/pdf";
	
	
	header("Pragma: public");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Cache-Control: public");
	header("Content-Description: File Transfer");
	header("Content-Type: " . $mm_type);
	header("Content-Length: " .filesize($path) );
	header('Content-Disposition: attachment; filename="'.basename($path).'"');
	header("Content-Transfer-Encoding: binary");

	ob_start();
	readfile($path); // outputs the content of the file
	ob_end_flush();

	exit();
}

?>