<?php
ob_start();
function resize($original, $new_width, $new_height, $blur) {
	
	//offset images horisontally if in parameters
	$xoffset = 0;
	$yoffset = 0;
	if(isset($_GET['xoffset'])) $xoffset = $_GET['xoffset'];
	if(isset($_GET['yoffset'])) $yoffset = $_GET['yoffset'];
	
	
	if(strpos($original, 'http') === false)
	$original = "http://".$_SERVER["SERVER_NAME"].$original;//adjusting the url to our needs
	
	
	if(isset($_GET['m'])) { $mode = $_GET['m']; } else { $mode = ''; }	
	$target_file = urlencode($original).'___'.$mode.'___'.$xoffset.'___'.$yoffset; #for now
	
	if(!file_exists($target_file)){//make thumbnail if one doesn't already exists
		$src = imagecreatefromjpeg($original);
		
		#decide what to resize first and crop second depending on input/output ratios
		$new_height_temp = 0;//resize keeping the ratio
		$new_width_temp = 0;//resize keeping the ratio
		$dst_x = 0;//vertical position of resized image inside black square
		$dst_y = 0;//horisontal position of resized image inside black square
		
		list($width, $height) = getimagesize($original);
		// no changes to size:
		if(!$new_width || !$new_height){
			$new_width = $width;
			$new_height = $height;
		}
		
		$original_ratio = $height / $width;
		if($new_height=='*')$new_height = $new_width*$original_ratio;//flexible height
		$ratio = $new_height / $new_width;
		
		
		if($ratio > $original_ratio){//narrower width
			$new_height_temp = $new_height;
			$new_width_temp = $new_height/$original_ratio;
			$dst_x = ($new_width - $new_width_temp)/2;
			
		}else{//shorter height
			$new_width_temp = $new_width;
			$new_height_temp = $new_width*$original_ratio;
			$dst_y = ($new_height - $new_height_temp)/2;
		}
		
		
		$tmp = imagecreatetruecolor($new_width, $new_height);//create black square of specified dimentions
		imagecopyresampled($tmp, $src, $dst_x/*x-offset*/, $dst_y/*y-offset*/, $xoffset, $yoffset, $new_width_temp, $new_height_temp, $width, $height);
		
		//APPLY EFFECTS
		if(isset($blur)){
			// imagefilter($tmp, IMG_FILTER_GAUSSIAN_BLUR);
			if($blur == 1)
				$tmp = blur($tmp, 4);
			elseif($blur == 2)
				$tmp = blur($tmp, 5);
			imagejpeg($tmp, $target_file, 100); //save image	
		}
		else{
			imagejpeg($tmp, $target_file, 80); //save image	
		}
	}
	
	//display image
	$image_display = imagecreatefromjpeg($target_file);
	imageinterlace($image_display, true); //make progressive
	imagejpeg($image_display);
}

//?mode=a
if(isset($_GET['m'])){
	switch ($_GET['m']) {
		//THUMBNAILS ON THE GALLERY OVERVIEW PAGE
	
	
	   
		
		/* homepage preview squares */  
		case 'L_square':
			$width_d = 720;
			$height_d = 720;
			break;
		case 'm_square':
			$width_d = 500;
			$height_d = 500;
			break;
		case 's_square':
			$width_d = 720;
			$height_d = 560;
			break;
		case 'half_square':
			$width_d = 500;
			$height_d = 267;
			break;
	
		/* legacy (home preview squares) */
		case 'embed':
			$width_d = 1000;
			$height_d = 1000;
			break;
		case 'preview_square':
			$width_d = 100;
			$height_d = 100;
			break;
	
		case 'tiny_square':
			$width_d = 300;
			$height_d = 300;
			break; 
	
	
	
	
	
		/* profile pictures */
		case 's_profile':
			$width_d = 50;
			$height_d = 50;
			break;
		
		
		case 'elsewhere':
			$width_d = 600;
			$height_d = 270;
			break;
		
		
		default:
			$width_d = false;
			$height_d = false;
	}
}
else {
	$width_d = false;
	$height_d = false;
}


resize ($_GET['i'], $width_d, $height_d, $_GET['blur']);
header('Content-Type: image/jpeg');
header('Cache-Control: max-age=2592000 public');
header('Expires: '.gmdate('D, d M Y H:i:s \G\M\T', time() + 31536000));



//get the last-modified-date of this very file
$lastModified=filemtime(__FILE__);
//get a unique hash of this file (etag)
$etagFile = md5_file(__FILE__);
//get the HTTP_IF_MODIFIED_SINCE header if set
$ifModifiedSince=(isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) ? $_SERVER['HTTP_IF_MODIFIED_SINCE'] : false);
//get the HTTP_IF_NONE_MATCH header if set (etag: unique file hash)
$etagHeader=(isset($_SERVER['HTTP_IF_NONE_MATCH']) ? trim($_SERVER['HTTP_IF_NONE_MATCH']) : false);

//set last-modified header
header("Last-Modified: ".gmdate("D, d M Y H:i:s", $lastModified)." GMT");
//set etag-header
header("Etag: $etagFile");

//check if page has changed. If not, send 304 and exit
if (@strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE'])==$lastModified || $etagHeader == $etagFile)
{
       header("HTTP/1.1 304 Not Modified");
       exit;
}

















// STRONG BLUR fn:
// http://php.net/manual/en/function.imagefilter.php
function blur($gdImageResource, $blurFactor = 3)
{
  // blurFactor has to be an integer
  $blurFactor = round($blurFactor);
  
  $originalWidth = imagesx($gdImageResource);
  $originalHeight = imagesy($gdImageResource);

  $smallestWidth = ceil($originalWidth * pow(0.5, $blurFactor));
  $smallestHeight = ceil($originalHeight * pow(0.5, $blurFactor));

  // for the first run, the previous image is the original input
  $prevImage = $gdImageResource;
  $prevWidth = $originalWidth;
  $prevHeight = $originalHeight;

  // scale way down and gradually scale back up, blurring all the way
  for($i = 0; $i < $blurFactor; $i += 1)
  {    
    // determine dimensions of next image
    $nextWidth = $smallestWidth * pow(2, $i);
    $nextHeight = $smallestHeight * pow(2, $i);

    // resize previous image to next size
    $nextImage = imagecreatetruecolor($nextWidth, $nextHeight);
    imagecopyresized($nextImage, $prevImage, 0, 0, 0, 0, 
      $nextWidth, $nextHeight, $prevWidth, $prevHeight);

    // apply blur filter
    imagefilter($nextImage, IMG_FILTER_GAUSSIAN_BLUR);

    // now the new image becomes the previous image for the next step
    $prevImage = $nextImage;
    $prevWidth = $nextWidth;
      $prevHeight = $nextHeight;
  }

  // scale back to original size and blur one more time
  imagecopyresized($gdImageResource, $nextImage, 
    0, 0, 0, 0, $originalWidth, $originalHeight, $nextWidth, $nextHeight);
  imagefilter($gdImageResource, IMG_FILTER_GAUSSIAN_BLUR);

  // clean up
  imagedestroy($prevImage);

  // return result
  return $gdImageResource;
}







header('Content-Length: ' . ob_get_length());
ob_end_flush();