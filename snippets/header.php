<?php

// server url... very important
$domain = "https://www.artsocket.com";


// PRICES FOR PRINTS
$price_regular = 79;
$price_panorama = 89;
$panorama_threshold = 17.55; //how wide does the image need to be to be considered a panorama?


// APPEARANCE VARIABLES
$blur_headers = 0;
$blur_loading_sliders = 0;
$blur_figure_images = 1;
$blur_blog_features = 1;
$blur_image_level = 2;



// update prices in description with the above values ^^
if (strpos($description, '$price_regular') !== false) {
    $description = str_replace('$price_regular', '$'.$price_regular, $description);
}


// PREFETCH STATIC ASSETS
//if(!isset($_GET['appView'])){
	$js_dependencies = array(
		"https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js",
		"https://ajax.googleapis.com/ajax/libs/mootools/1.4.5/mootools-yui-compressed.js",
		$domain."/snippets/javascript.min.js?v=1.231"
	);
	$css_load = $domain.'/design/design.min.css?v=1.240';
	$slider_script = $domain."/snippets/slider.min.js?v1.158";
//}
$link_prefetch = 'Link: ';



// prefetch required JS
for($i=0; $i < count($js_dependencies); $i++){
	$link_prefetch .= '<'.$js_dependencies[$i].'>; rel=subresource,';
}

// prefetch CSS
$link_prefetch .= '<'.$css_load.'>; rel=subresource,';

// conditional prefetch for slider JS
if(isset($_GET['q']))
$link_prefetch .= '<'.$slider_script.'>; rel=subresource';
else
$link_prefetch .= '<'.$slider_script.'>; rel=prefetch';


// add header:
header($link_prefetch);







// REDIRECT FIRST-TIME VISITOR TO /ABOUT/
if($_SERVER['REQUEST_URI'] == '/' || $_SERVER['REQUEST_URI'] == '' /* && !isset($_GET['appView'])*/){
	if(!isset($_COOKIE['repeat_visitor']) || $_COOKIE['repeat_visitor'] == ''){
		setcookie('repeat_visitor', 'true', time() + (1 * 365 * 24 * 60 * 60));
		header('Location: '.$domain.'/about/');
		die();
	}
}






// cache
header('Cache-Control: max-age=1200');
header('Expires: '.gmdate('D, d M Y H:i:s \G\M\T', time() + 86400));

// if this file has been already included (i.e. 404 page) some functions are to be avoided
if(!isset($skip_checks))$skip_checks = false;
if(!isset($error_page))$error_page = false;

// set cookies:
// if(isset($_GET['coupon_code']))
// setcookie('coupon_code', $_GET['coupon_code'], time() + (86400 * 31), '/'); // 86400 = 1 day



//Minify CSS and JS
if(!$skip_checks){
	function simpleComress($buffer) {
		// Remove comments:
		//$buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
		// Remove HTML comments:
		$buffer =  preg_replace('/<!--(.|\s)*?-->/', '', $buffer);
		$buffer = preg_replace('#(\ |\t)//.*#','',preg_replace('#/\*(?:[^*]*(?:\*(?!/))*)*\*/#','',($buffer)));
		// Remove tabs, excessive spaces and newlines
		$buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '	'), '', $buffer);
		// Remove spaces before and after curly brackers
		$buffer = str_replace(array('} ',' }'), '}', $buffer);
		$buffer = str_replace(array('{ ',' {'), '{', $buffer);

		return $buffer;
	}
	
	//SALE? USE THIS FUNCTION
/*
	function applyCoupon($price_for_this_print){
		$sale_message = '';
		if(isset($_COOKIE['coupon_code'])){
			
			$coupon_code = $_COOKIE['coupon_code'];
			
			switch ($coupon_code) {
	
				case 'FriendsAndFamily':
					$sale_amount = .07;
					$sale_message = '<strong class="sale">Friends Get 7% OFF! <span class="clarify white">Reg: $'.$price_for_this_print.'. <span class="strong yellow">Save $'.cents($price_for_this_print*$sale_amount).'</span></span></strong>';
					$price_for_this_print = cents($price_for_this_print - $price_for_this_print*$sale_amount);
				break;
			
			
			
			}
		}
		else $_COOKIE['coupon_code'] == 0;
	
		//default 'always on' sale:
		*//*
		if(!isset($sale_amount)){
			$sale_amount = .2;
			$sale_message = '<strong class="sale">Boxing Day: 20% OFF!<span class="clarify white"> Reg: $'.$price_for_this_print.' - <span class="strong yellow">Save $'.cents($price_for_this_print*$sale_amount).'</span></span></strong>';
			$price_for_this_print = cents($price_for_this_print - $price_for_this_print*$sale_amount);
		}
		*//*

	
		return array('price' => $price_for_this_print, 'message' => $sale_message);
	}	
	function cents($number){
		$number_calc = ceil(100*$number) / 100; // rounds fee up to nearest cent
		$number_calc = number_format((float)$number_calc, 2, '.', '');
		$number_calc = str_replace('.','<sup>',$number_calc);
		return $number_calc.'</sup>';
	}
	
	*/


}






//SERVE 404s TO GARBAGE URLs
if(!$skip_checks){

	if(strpos($_SERVER['PHP_SELF'], 'art-store.php') !== false || strpos($_SERVER['PHP_SELF'], 'elsewhere-embed.php') !== false){
		$slide_exists = false;
		if(isset($_GET['q']) && isset($slides)){
			foreach ($slides as $value) {
				if($value[0] == str_replace('/','',$_GET['q'])){
					$slide_exists = true;
		
					// title will be changed accordingly:
					$title = '"'.$value[2].'" by '.$value[4];
					$description = strip_tags($value[3]);
					
					
					
					
					
					
					
					
					// PRICE TAG
					
					// ***************** NEEDS REFATORING ***************** //
					
					// get image dimensions
					$sm = "http://".$_SERVER["SERVER_NAME"].$image_direcotory.$small_image_prefix.$value[1]; //relative url -> absolute
					list($image_width, $image_height, $t, $a) = getimagesize($sm);
					if($image_width > $image_height){ //landscape
						$print_height = 11;
						$print_width = floor(($image_width/$image_height)*110)/10;
					}else{
						$print_width = 11;
						$print_height = floor(($image_height/$image_width)*120)/10;
					}
					// take 1/2 white borders into account:
					$print_width += 1;
					$print_height += 1;
					
					$canonical_price_for_this_print = $price_regular;
					if($print_width > $panorama_threshold || $print_height > $panorama_threshold)
						$canonical_price_for_this_print = $price_panorama;

					// *************** end NEEDS REFATORING *************** //
					
					
					
					
					

					
					// metatag for image
					if(isset($image_direcotory) && isset($large_image_prefix))
					$meta_image = 'https://'.$_SERVER["SERVER_NAME"].$image_direcotory.$large_image_prefix.$value[1];
					
					break;
				}
			}
	
			if(!$slide_exists && str_replace('/','',$_GET['q'])!=''){
				header("HTTP/1.1 404 Not Found");
				$skip_checks = true;
				include('errors/404.php');
				die();
			}
		}
	}

	//only file that currently supports queries (turned subdirs by htaccess) is art.php
	elseif(isset($_GET['q']) && str_replace('/','',$_GET['q']) !=''){
		header("HTTP/1.1 404 Not Found");
		$skip_checks = true;
		include('errors/404.php');
		die();
	}
}










//SHARING (!!! separate url on the blog proxy)

$share_html = '
			<a href="https://www.facebook.com/ArtSocketGallery" class="social facebook"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="21px" height="21px" viewBox="0 0 21 21" enable-background="new 0 0 21 21" xml:space="preserve">
					<path d="M12.079 20.602v-9.189h3.085l0.461-3.581h-3.546V5.545c0-1.037 0.288-1.743 1.774-1.743l1.896-0.001 V0.598c-0.328-0.043-1.454-0.141-2.764-0.141c-2.734 0-4.605 1.669-4.605 4.734v2.641H5.289v3.581h3.092v9.189H12.079z"></path>
				</svg><span>share</span></a> <a href="https://twitter.com/artsocket" class="social twitter"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="21px" height="21px" viewBox="0 0 21 21" enable-background="new 0 0 21 21" xml:space="preserve">
					<path d="M20.682 4.183c-0.748 0.333-1.555 0.557-2.398 0.658c0.863-0.517 1.525-1.335 1.836-2.311 c-0.807 0.479-1.701 0.827-2.652 1.014c-0.762-0.812-1.848-1.319-3.049-1.319c-2.309 0-4.178 1.871-4.178 4.2 c0 0.3 0 0.6 0.1 0.953C6.875 7.2 3.8 5.5 1.7 2.988C1.376 3.6 1.2 4.3 1.2 5.1 c0 1.4 0.7 2.7 1.9 3.477C2.344 8.5 1.7 8.4 1.1 8.044c0 0 0 0 0 0.052c0 2 1.4 3.7 3.4 4.1 c-0.351 0.095-0.72 0.146-1.101 0.146c-0.269 0-0.531-0.026-0.786-0.074c0.532 1.7 2.1 2.9 3.9 2.9 c-1.43 1.12-3.231 1.788-5.189 1.788c-0.337 0-0.67-0.02-0.997-0.059c1.849 1.2 4 1.9 6.4 1.9 c7.686 0 11.887-6.366 11.887-11.888c0-0.181-0.004-0.361-0.012-0.541C19.414 5.8 20.1 5 20.7 4.183z"></path></svg><span>tweet</span></a> <a href="https://www.pinterest.com/artsocket" class="social pinterest"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="21px" height="21px" viewBox="0 0 21 21" enable-background="new 0 0 21 21" xml:space="preserve">
					<path d="M10.496 0C4.7 0 0 4.7 0 10.497c0 4.3 2.6 8 6.3 9.615c-0.029-0.735-0.005-1.614 0.183-2.41 c0.202-0.853 1.35-5.721 1.35-5.721s-0.335-0.67-0.335-1.661c0-1.555 0.902-2.717 2.024-2.717c0.956 0 1.4 0.7 1.4 1.6 c0 0.959-0.612 2.397-0.927 3.726c-0.263 1.1 0.6 2 1.7 2.021c1.99 0 3.329-2.554 3.329-5.582 c0-2.3-1.549-4.021-4.367-4.021c-3.184 0-5.167 2.374-5.167 5.026c0 0.9 0.3 1.6 0.7 2.1 c0.194 0.2 0.2 0.3 0.2 0.587c-0.05 0.192-0.167 0.657-0.214 0.84c-0.07 0.266-0.285 0.361-0.525 0.3 c-1.467-0.6-2.151-2.205-2.151-4.011c0-2.981 2.516-6.557 7.502-6.557c4.008 0 6.6 2.9 6.6 6 c0 4.118-2.287 7.194-5.663 7.194c-1.133 0-2.199-0.612-2.564-1.31c0 0-0.609 2.42-0.739 2.9 c-0.223 0.809-0.658 1.618-1.056 2.247c0.944 0.3 1.9 0.4 3 0.432c5.796 0 10.497-4.699 10.497-10.497S16.292 0 10.5 0 z"></path>
				</svg><span>pin</span></a>
			
			';

$scroll_button_html = '<a href="javascript:void(0);" class="scrollButton animateAll nostyle "></a>';

$gallery_subfooter_html = '<section class="loadMore" id="aboutSeries">
			<div class="clear"></div>
			<section>
				<h1 class="exhibitName">"..."</h1>
				<p>This curated art series has been created by <a href="/talent/dmitri-tcherbadji/">Dmitri Tcherbadji</a> exclusively for ArtSocket. Although we are quite simply an online art dealer for high quality posters, <strong class="red">our storefront is meant to resemble an art exhibition</strong>. Depending on the number of submissions and their common theme, Dmitri goes through every image while selecting not only the best material but also composing a flowing, living body of art. <a href="/mag/curated-art-online-how-does-it-work">Learn about our selection process & philosophy.</a></p>
				<p>Even if you never end up buying artwork after visiting Artsocket we want you to leave feeling inspired.</p>
			</section>
			
			<section>
				<h2 class="noHyphens">Why Buy Prints from ArtSocket?</h2>
				<ol>
					<li><strong>Outstanding quality of selections from independant artists</strong>. Expertly <a href="/mag/curated-art-online-how-does-it-work">curated</a>.</li>
					<li><strong>100-year <a href="/warranty/">warranty</a></strong> on "Archival" color pigment and paper.</li>
					<li>All prints are <strong>signed, <span class="red">very rare editions of 15</span></strong>, starting at $'.$price_regular.'.</li>
				</ol>
				<p>Even if you never end up buying artwork after visiting ArtSocket we want you to leave feeling inspired.</p>
			</section>
			<hr />
			
			<a href="/art/archive/" class="nostyle contentButton animateAll blue"><span class="totalImages">100+</span> more images in Archive</a>
			<p class="center" style="padding: 1.5em 1.5em 3em;"><small>We have <span class="totalImages">over a hundred more</span> brilliant images in the archive which are not a part of this series.</small></p>
		</section>';





// EXPLORELIST CSS
if(isset($explore_list) && $explore_list == true){
	$explore_list_css = '';
	if(!isset($css))$css = '';
	$css .= $explore_list_css;
}


/*-------------------------------------------output--------------------------------------------*/


//canonical location
if(!isset($c))
$c = str_replace('.php', '', $domain.str_replace('/art-store','/art',str_replace('/index','/',strtok($_SERVER["REQUEST_URI"],'?'))));
//if(strpos($_SERVER['PHP_SELF'], 'art.php') !== false)
//$c = str_replace('http:', 'https:',$c);

//conditionally include ArtSocket in page title:
$nav_title = $title;
//branded label
$title .= ' | ArtSocket';
if (strpos($_SERVER['REQUEST_URI'], '/art/') !== false) {
	$title .= ' Art Gallery & Store';
}
elseif (strpos($_SERVER['REQUEST_URI'], '/mag/') !== false) {
	$title .= ' Gallery Magazine';
}
elseif (strpos($_SERVER['REQUEST_URI'], '/search/') !== false) {
	$title .= ' Search';
}


?><!DOCTYPE html>
<!--
THIS WEBSITE (INCLUDING CODE, DESIGN AND A GOOD PART OF THE CONTENT)
IS BUILT AND MAINTAINED BY DMITRI TCHERBADJI.
-->

<html lang="en">
<head><?php /* if(!isset($_GET['appView'])){ */?>
<script>
var urlDomain = '<?php echo $domain; ?>';

isLs = function(){
	try {
		localStorage.setItem(mod, mod);
		localStorage.removeItem(mod);
		return true;
	} catch(e) {
		return false;
	}
}


if(isLs()) {
	var relativePathUrl = (window.location.href).replace(urlDomain,'');
	if(relativePathUrl !== '/' && relativePathUrl !== ''){
    	localStorage.setItem('last_url', '/' + relativePathUrl.split('/')[1] + '/');
	}else{
		if(localStorage.getItem('last_url') !== undefined && localStorage.getItem('last_url') !== null
			&& (
				localStorage.getItem('last_url').indexOf('art/') > -1
				|| localStorage.getItem('last_url').indexOf('mag/') > -1
				|| localStorage.getItem('last_url').indexOf('search/') > -1
				|| localStorage.getItem('last_url').indexOf('submit/') > -1
				|| localStorage.getItem('last_url').indexOf('subscribe/') > -1
				)
			)
			window.location = urlDomain + localStorage.getItem('last_url');
		else
			window.location = urlDomain + '/about/';
	}
}

<?php
	echo '
	blurHeaders = '.$blur_headers;
	
	echo ';
	blurFigureImages = '.$blur_figure_images;
	
	echo ';
	blurBlogFeatures = '.$blur_blog_features;
	
	echo ';
	blurLoadingSliders = '.$blur_loading_sliders;
	
	echo ';
	blurImageLevel = '.$blur_image_level.';';

?>
</script><? /* } */ ?>
	
	
<!-- OPTIMIZELY
<script src="//cdn.optimizely.com/js/133271859.js"></script>
-->
 
<?php 
/*

<!-- Facebook Conversion Code for Purchase intent -->
<script>(function() {
  var _fbq = window._fbq || (window._fbq = []);
  if (!_fbq.loaded) {
    var fbds = document.createElement('script');
    fbds.async = true;
    fbds.src = '//connect.facebook.net/en_US/fbds.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(fbds, s);
    _fbq.loaded = true;
  }
  _fbq.push(['addPixelId', '6009734116869']);
})();
window._fbq = window._fbq || [];
<?php if(strpos($_SERVER['PHP_SELF'], 'art.php') !== false){ ?>
window._fbq.push(["track", "ViewProduct", {
  product_id: '<?php echo addslashes($title); ?>'
}]);
<?php } ?>


</script>

*/
?>
<meta charset="utf-8">
<?php

// title
echo '<title>'.strip_tags($title).'</title>
';

// canonical link
if(!$error_page){
	if(substr($c, -1)!='/')$c.='/';
	echo '<link rel="canonical" href="'.$c.'" />
';
}
// pagination
if(isset($rel_prev)) {
	echo '<link rel="prev" href="'.$domain.$rel_prev.'" />
';
}
if(isset($rel_next)) {
	echo '<link rel="next" href="'.$domain.$rel_next.'" />
';
}


// description
if (isset($description) && $description!='')
echo '<meta name="description" content="'.$description.'" id="documentDescription" />
';
if(!isset($description))
$description = 'Independent Art Gallery. Online only. Limited edition prints from $'.$price_regular.'.';
?>

<!-- STYLESHEETS --><?php

//echo minified style
if(!isset($css))$css="";
if(!isset($noscript_css))$noscript_css="";

//critical CSS exists?
//index
//art
//origami
//submit
//blog

if(isset($critical_css))$css = $critical_css.$css;
else echo '
<link rel="stylesheet" type="text/css" href="'.$css_load.'" />';

echo '<style type="text/css">
'.simpleComress($css).'
</style>';

//special css for javascript-disabled browsers
echo '<noscript><link rel="stylesheet" type="text/css" href="'.$css_load.'" /><style type="text/css">'.simpleComress($noscript_css).'h1,h2,small,p,nav a{opacity:1;font-family: sans-serif;}</style></noscript>';

?>


<!-- WEB APP, SCRIPTS & CONNECT STUFF -->
<?php ob_start('simpleComress'); ?>
<link rel="shortcut icon" type="image/ico" href="/favicon.ico" />
<link rel="mask-icon" href="/design/safari-pintabLogo.svg" color="#2c2c2c">
<link rel="alternate" type="application/rss+xml" href="http://feeds.feedburner.com/artsocket" title="ArtSocket Magazine">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php


if(!$error_page){ if(isset($_SERVER['HTTP_USER_AGENT']) && (
	stripos($_SERVER['HTTP_USER_AGENT'],"iPod") ||
	stripos($_SERVER['HTTP_USER_AGENT'],"iPhone") ||
	stripos($_SERVER['HTTP_USER_AGENT'],"iPad"))){  ?><!-- OS WEB APP -->
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta name="apple-mobile-web-app-title" content="ArtSocket" />
<link rel="apple-touch-icon" href="/design/apple-touch-icon-152x152.png" sizes="152x152">
<link href="/design/apple-touch-startup-image-1536x2008.png"
	  media="(device-width: 768px) and (device-height: 1024px)
		 and (orientation: portrait)
		 and (-webkit-device-pixel-ratio: 2)"
	  rel="apple-touch-startup-image">
<link href="/design/apple-touch-startup-image-1496x2048.png"
	  media="(device-width: 768px) and (device-height: 1024px)
		 and (orientation: landscape)
		 and (-webkit-device-pixel-ratio: 2)"
	  rel="apple-touch-startup-image">
<link href="/design/apple-touch-startup-image-640x1096.png"
	  media="(device-width: 320px) and (device-height: 568px)
		 and (-webkit-device-pixel-ratio: 2)"
	  rel="apple-touch-startup-image">
<link href="/design/apple-touch-startup-image-640x920.png"
	  media="(device-width: 320px) and (device-height: 480px)
		 and (-webkit-device-pixel-ratio: 2)"
	  rel="apple-touch-startup-image"><?php } ?>
<!-- Win8 tile --><?php if (isset($_SERVER['HTTP_USER_AGENT']) && strpos($_SERVER['HTTP_USER_AGENT'], 'Win') !== false) { ?>
<meta name="msapplication-TileImage" content="/design/msapplication-TileImage-144x144.png">
<meta name="msapplication-TileColor" content="#B20099"/>
<meta name="application-name" content="name" /><? } ?>
<?php if (isset($_SERVER['HTTP_USER_AGENT']) && strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7.0; rv:11.0') !== false) { ?><!-- IE11 tiles -->
<meta name="msapplication-square70x70logo" content="/design/msapplication-square70x70logo.png"/>
<meta name="msapplication-square150x150logo" content="/design/msapplication-square150x150logo.png"/>
<meta name="msapplication-wide310x150logo" content="/design/msapplication-wide310x150logo.png"/>
<meta name="msapplication-square310x310logo" content="/design/msapplication-square310x310logo.png"/><?php } ?>
<!-- SCHEMA.ORG logo -->
<meta itemprop="logo" itemtype="http://schema.org/Organization" content="<?php echo $domain; ?>/design/logo-black.png" />
<!-- Chrome App -->
<!-- <link rel="chrome-webstore-item" href="https://chrome.google.com/webstore/detail/blcmjmbalenihipjodgeebipglnbjjen"> -->

<!-- Facebook meta -->
<meta property="fb:admins" content="630190401" />
<meta property="og:type" content="website" />
<!-- Twitter meta -->
<meta property="twitter:account_id" content="4503599628402459" />
<?php

// Facebook OG:Image
if(!isset($meta_image))
$meta_image = $domain."/images/content/pages/about_header-160916.jpg";

// make sure OG:Image contains absolute address:
else if(strpos($meta_image, $domain) === false)
	$meta_image = $domain.$meta_image;
echo '<meta property="og:image" content="'.$meta_image.'" />
';

echo '
<!-- Pintereste meta -->';
if(isset($content_type) && $content_type == 'mag')
	echo '<meta property="og:site_name" content="ArtSocket Magazine" />
	<meta property="og:type" content="article" />
	<meta property="og:description" content="'.strip_tags($intro).'" />';
if(isset($content_type) && $content_type == 'art'){
	echo '<meta property="og:site_name" content="ArtSocket Prints" />
	<meta property="og:type" content="product" />
	<meta property="og:price:amount" content="'.$canonical_price_for_this_print.'" />
    <meta property="og:price:currency" content="USD" />
    <meta property="og:availability" content="instock" />
    <meta property="og:description" content="'.strip_tags($description).'" />';
}

echo '
<meta property="og:title" content=\''.strip_tags($nav_title).'\' />
<meta property="og:url" content="'.$c.'" />';

if(isset($datetime))
	echo '<meta property="article:published_time" content="'.$datetime.'" />';
if(isset($author))
	echo '<meta property="article:author" content="'.$author.'" />';



echo '
<!-- Twitter card -->
<meta name="twitter:card" content="photo" />
<meta name="twitter:site" content="@artsocket" />
<meta name="twitter:domain" content="artsocket.com">
<meta name="twitter:title" content=\''.strip_tags($nav_title).'\' />
<meta name="twitter:description" content="'.strip_tags($description).'" />
<meta name="twitter:image" content="'.$meta_image.'" />';



}// dont output above if it is an error file

// noindex for error pages
else echo '<meta name="robots" content="noindex">
';
ob_end_flush(); 












// LOAD SCRIPTS //
//source: http://www.html5rocks.com/en/tutorials/speed/script-loading/
echo '<!-- Load JS -->
<script>!function(e,t,r){function n(){for(;d[0]&&"loaded"==d[0][f];)c=d.shift(),c[o]=!i.parentNode.insertBefore(c,i)}for(var s,a,c,d=[],i=e.scripts[0],o="onreadystatechange",f="readyState";s=r.shift();)a=e.createElement(t),"async"in i?(a.async=!1,e.head.appendChild(a)):i[f]?(d.push(a),a[o]=n):e.write("<"+t+\' src="\'+s+\'" defer></\'+t+">"),a.src=s}(document,"script",[';

for($i=0; $i < count($js_dependencies); $i++){
	echo '"'.$js_dependencies[$i].'",';
}

echo ']);function ee(){WebFont.load({google:{families:["Raleway:700,400,200"],subset:"latin,cyrilic"}})}var j=document.getElementsByTagName("script"),done=!1;for(i=0;i<j.length;i++)j[i].src.indexOf("webfont")>-1&&(j[i].onload=j[i].onreadystatechange=function(){this.readyState&&"loaded"!==this.readyState&&"complete"!==this.readyState||(ee(),done=!0,j[i]&&(j[i].onload=j[i].onreadystatechange=null))},"undefined"==typeof WebFont||done||ee());</script>';

/* ABOVE^^: HANDLE WEB FONT LOADING:

//collect all the script tags on the page
var jScripts = document.getElementsByTagName('script');
var done = false;
function execute(){
	WebFont.load({
		google: {
		  families: ['Raleway:700,400,200'],
		  subset: 'latin,cyrilic'
		}
	});
}

//cycle through them
for (i = 0; i < jScripts.length; i++) {

	//find one with a URL key
    if(jScripts[i].src.indexOf('webfont') > -1){
    
    	//once it's loaded...
    	jScripts[i].onload = jScripts[i].onreadystatechange = function() {
    		if (!this.readyState ||
            	this.readyState === "loaded" || this.readyState === "complete") {
            	
            	//execute
				execute();
				
				done = true;
				
				//fix memory leak in IE
				if(jScripts[i])jScripts[i].onload = jScripts[i].onreadystatechange = null;
			}
    	}
    	
    	//OR if loaded didn't fire (in case it's cached) check for a known variable:
    	if(typeof WebFont !== 'undefined' && !done){
    		
    		//execute
    		execute();
    	
    	}
    	
    	
    //finish with our script:
    }
}

http://stackoverflow.com/questions/4845762/onload-handler-for-script-tag-in-internet-explorer */
















?>

<!--[if lt IE 9]><meta http-equiv="refresh" content="0; url=/upgrade.html" /><![endif]-->
</head>

<body ontouchstart="">

<!-- NAVBAR -->
<?php if(!(isset($_SERVER['HTTP_USER_AGENT'])&&  $_SERVER['HTTP_USER_AGENT'] == 'chromeApp')){  ob_start('simpleComress'); ?>
<header class="animateAll">
	<div>
		<nav>
			<a href="/about/" class="nostyle animationLoading logoButton aboutButton" itemscope itemtype="http://schema.org/Organization" title="About ArtSoket">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="66px" height="66px" viewBox="0 0 11 11" enable-background="new 0 0 11 11" xml:space="preserve" class="logoSVG" role="logo">
					<switch>
						<g>
							<rect x="7.9" y="7.9" width="3.3" height="3.3" class="yellow animateAll"/>
							<rect x="3.9" y="7.9" width="3.3" height="3.3" class="yellow animateAll"/>
							<rect x="0" y="7.9" width="3.3" height="3.3" class="yellow animateAll"/>
							<rect x="7.9" y="3.9" width="3.3" height="3.3" class="blue animateAll"/>
							<rect x="3.9" y="3.9" width="3.3" height="3.3" class="blue animateAll"/>
							<rect x="0" y="3.9" width="3.3" height="3.3" class="blue animateAll"/>
							<rect x="3.9" y="0" width="3.3" height="3.3" class="red animateAll"/>
							<rect x="0" y="0" width="3.3" height="3.3" class="red animateAll"/>
						</g>
						<!--
						<foreignObject width="23" height="23">
							<img src="/design/msapplication-square310x310logo.png" width="23" height="23" itemprop="logo" alt="ArtSocket Logo" />
						</foreignObject>
						-->
					</switch>
				</svg>
				<span class="animateLetterSpacing">ArtSocket</span>
			</a>
			<ul class="animateAll">
				<!--
				<li>
					<a href="/about/" class="aboutButton nostyle animateLetterSpacing">ArtSocket</a>
				</li>
				-->
				<li>
					<a href="/art/" class="homeButton nostyle animateLetterSpacing " title="Live exhibit featuring curated selections">
					<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" width="40" height="44" viewBox="0 0 40 44" xml:space="preserve"><path d="M40 42.9l0 0 -4-32 0 0C35.9 10.4 35.5 10 35 10h-6 -1V8.1c0 0 0-0.1 0-0.1C28 3.6 24.4 0 20 0s-8 3.6-8 8c0 0 0 0 0 0.1V10H14V8.1c0 0 0 0 0-0.1 0-3.3 2.7-6 6-6s6 2.7 6 6C26 8 26 8 26 8.1V10H14v4.2c1.2 0.4 2 1.5 2 2.8 0 1.7-1.3 3-3 3s-3-1.3-3-3c0-1.3 0.8-2.4 2-2.8V10h-1H5c-0.5 0-0.9 0.4-1 0.9l0 0 -4 32 0 0C0 42.9 0 43 0 43c0 0.6 0.4 1 1 1h38c0.6 0 1-0.4 1-1C40 43 40 42.9 40 42.9zM27 20c-1.7 0-3-1.3-3-3 0-1.3 0.8-2.4 2-2.8V11h2v3.2c1.2 0.4 2 1.5 2 2.8C30 18.6 28.7 20 27 20z"/></svg><strong>Art</strong><span class="titleShortened"> Gallery & Store</span></a>
				</li>
				<li>
					<a href="/talent/" class="nostyle artistsButton animateLetterSpacing" title="Portfolios of ArtSocket artists and contributors"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" width="44" height="32" viewBox="0 0 44 32" xml:space="preserve" style="width: 1.75em;"><path d="M31.9 22.1C27.3 19.6 26 20 26 18c0-5.8 2-4.2 2-10 0-8-5.1-8-6-8v2C25.5 2 26 6 26 8c0 2.4-0.4 3.2-0.8 4.1C24.6 13.3 24 14.7 24 18c0 2.7 1.8 3.4 3.6 4.2 0.9 0.4 1.9 0.9 3.4 1.6 3.3 1.8 4.6 2.5 5 6.1h-13.9H8.1c0.3-3.6 1.7-4.4 5-6.1 1.4-0.8 2.5-1.2 3.3-1.6C18.2 21.4 20 20.7 20 18c0-3.3-0.6-4.7-1.2-5.9C18.4 11.2 18 10.4 18 8c0-2 0.5-6 4-6h0.1l0-2c0 0 0 0 0 0H22c0 0 0 0 0 0C21.1 0 16 0 16 8c0 5.8 2 4.2 2 10 0 2-1.3 1.6-5.9 4.1C8.1 24.3 6 25.4 6 32h16 16C38 25.4 35.9 24.3 31.9 22.1zM4.7 23.3c2.8-1 4.3-2.7 4.3-4.7 0-2.2-0.4-3.2-1-4.3 -0.3-0.6-0.5-1-0.5-2.4 0-2.4 0.6-3.3 1-3.6 0.3-0.3 0.7-0.3 0.9-0.3l0.1 0h0.1c1.6 0 2.5 2.1 2.5 3.9 0 1.5-0.2 1.9-0.5 2.5 -0.5 1-0.6 2-0.6 4.2 0 0.8 0.2 1.4 0.5 1.9 0.2-0.1 0.4-0.2 0.6-0.3 0.5-0.3 0.9-0.5 1.2-0.7 -0.1-0.3-0.2-0.6-0.2-0.9 0-3.8 1.1-2.9 1.1-6.7 0-5.8-3.8-5.9-4.5-5.9 0 0 0 0-0.1 0H9.5c0 0-0.1 0-0.1 0 -0.7 0-3.9 0.1-3.9 5.9 0 3.8 1.5 2.8 1.5 6.7 0 1.3-1.6 2.3-3 2.8S0 23.6 0 28h4.5c0.2-0.7 0.4-1.4 0.7-2H2.3C2.8 24.3 3.9 23.5 4.7 23.3zM40 21.4c-1.4-0.5-3-1.5-3-2.8 0-3.8 1.5-2.8 1.5-6.7 0-5.8-3.2-5.9-3.9-5.9 0 0-0.1 0-0.1 0h0c0 0 0 0-0.1 0 -0.7 0-4.5 0.1-4.5 5.9 0 3.8 1.1 2.9 1.1 6.7 0 0.2 0 0.5-0.1 0.7 0.5 0.3 1.1 0.6 1.8 0.9 0.2-0.5 0.3-1 0.3-1.6 0-2.2-0.1-3.2-0.6-4.2 -0.3-0.6-0.5-1-0.5-2.5 0-1.8 0.9-3.9 2.5-3.9h0.1l0.1 0c0.2 0 0.6 0 0.9 0.3 0.4 0.3 1 1.2 1 3.6 0 1.4-0.2 1.8-0.5 2.4 -0.5 1-1 2-1 4.3 0 2 1.5 3.7 4.3 4.7 0.8 0.3 1.9 1 2.4 2.7h-2.7c0.2 0.6 0.4 1.3 0.6 2h4.3C44 23.6 41.4 21.9 40 21.4z"/></svg> <strong>Artists</strong><span class="titleShortened"> & Writers</span></a>
				</li>
				<li>
					<a href="/mag/" class="blogButton nostyle animateLetterSpacing " title="Articles, interviews & essays by ArtSocket artists and contributors"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" width="44" height="40" viewBox="0 0 44 40" xml:space="preserve"><path d="M13 32h24c0.6 0 1-0.4 1-1 0-0.6-0.4-1-1-1H13c-0.6 0-1 0.4-1 1C12 31.6 12.4 32 13 32zM29 20h8c0.6 0 1-0.4 1-1s-0.4-1-1-1h-8c-0.6 0-1 0.4-1 1S28.4 20 29 20zM29 8h8c0.6 0 1-0.4 1-1 0-0.6-0.4-1-1-1h-8c-0.6 0-1 0.4-1 1C28 7.6 28.4 8 29 8zM29 14h8c0.6 0 1-0.4 1-1 0-0.6-0.4-1-1-1h-8c-0.6 0-1 0.4-1 1C28 13.6 28.4 14 29 14zM42 0H8C6.9 0 6 0.9 6 2v6H2c-1.1 0-2 0.9-2 2v2 17 5c0 3.3 2.7 6 6 6h2 4 30c1.1 0 2-0.9 2-2V2C44 0.9 43.1 0 42 0zM42 38H9 8.4 8 6c-2.2 0-4-1.8-4-4v-4.4V10h4v23c0 0.6 0.4 1 1 1s1-0.4 1-1V2h34V38zM13 26h24c0.6 0 1-0.4 1-1 0-0.6-0.4-1-1-1H13c-0.6 0-1 0.4-1 1C12 25.6 12.4 26 13 26zM13 20h10c0.6 0 1-0.4 1-1V7c0-0.6-0.4-1-1-1H13c-0.6 0-1 0.4-1 1v12C12 19.6 12.4 20 13 20zM14 8h8v10h-8V8z" class="animateAll"/></svg><span class="titleShortened">Gallery </span><strong class="titleShortened">Magazine</strong></a>
				</li>
				
				<li class="right">
					<a href="javascript:void(0);" class="nostyle" id="searchQuery" title="Search ArtSocket content"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="-1 -1 56 56" xml:space="preserve" class="searchIcon animateAllFast"><g fill="none" stroke-width="2"><path d="M55.7 54.3L39.9 38.5C43.7 34.4 46 29 46 23 46 10.3 35.7 0 23 0S0 10.3 0 23s10.3 23 23 23c6 0 11.4-2.3 15.5-6.1l15.8 15.8c0.4 0.4 1 0.4 1.4 0C56.1 55.3 56.1 54.7 55.7 54.3zM23 44C11.4 44 2 34.6 2 23 2 11.4 11.4 2 23 2s21 9.4 21 21C44 34.6 34.6 44 23 44z"></g></path></svg></a>
				</li>
				<!--
				<li class="right">
					<a href="/submit/" class="nostyle submitButton" title="Submit Your Art, Photography & Written Stories"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" width="44" height="44" viewBox="0 0 44 44" xml:space="preserve" class="animateAllFast"><path d="M39.1 7.7L19.2 27.7l-2.6-0.2 -0.2-2.6L36.3 4.9l-1.4-1.4L14.4 23.9l-1.4 7.1 7.1-1.4L40.7 9 40.6 9.2 39.1 7.7zM35 20c-0.6 0-1 0.4-1 1v21H2v-32h21c0.6 0 1-0.4 1-1 0-0.6-0.4-1-1-1H2c-1.1 0-2 0.9-2 2v32c0 1.1 0.9 2 2 2h32c1.1 0 2-0.9 2-2v-21C36 20.5 35.6 20 35 20zM43.4 3.5l-2.9-2.9c-0.8-0.8-2.1-0.8-2.9 0l-1.4 1.4 5.7 5.7 1.4-1.4C44.2 5.5 44.2 4.2 43.4 3.5z"/></svg></a>
				</li>
				-->
				
				
			</ul>
			
			
			
			
			
		</nav>
	</div>
	<noscript>
		<aside class="alert" role="note">
			<p role="alert"><strong>Please <a href="http://enable-javascript.com/" rel="nofollow">enable JavasScript</a> in your browser.</strong> Otherwise this website just does not work the way it should.</p>
		</aside>
	</noscript>
</header><?php ob_end_flush(); }?>


<!-- CONTENT -->
