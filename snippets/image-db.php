<?php
//INIT THE SLIDER VARIABLES
$image_direcotory = "/images/art/";
$large_image_prefix = "L_"; //large images for big screens will have this prefix
$small_image_prefix = "s_"; //small images for smaller screens will have this prefix

// (url, Image-Name.jpg, Title, Story, Author, remaining, active)
$slides = array(
	
	array("dusk", "Dusk.jpg", "A sun setting down beyond the Toronto Island.", "", "dmitrizzle", 15, TRUE),

);	



function buildSlider($slides, $image_direcotory, $large_image_prefix, $small_image_prefix){
	
	// CHANGE THIS DIRECOTRY:
	$subdir = '/art/';
	
	// PRICES
	// set in header.php
	
	//loop through all the values
	$slide_counter = 0;
	$current_slide_number = 0;
	$html_blocks = '';
	$story_content = '';
	$author_block_content = '';
	$slide_status = '';


	
	// single-slide gallery for slides that are no longer part of main exhibit:
	$not_part_of_current_exhibit = false;
	$standalone_slide = 0;
	foreach($slides as $value) {
		$standalone_slide ++;
		if(isset($_GET['q']) && $value[0] == str_replace('/','',$_GET['q'])){
			if($value[6] === false){
				$not_part_of_current_exhibit = true;
				break;
			}
		}
	}
	if($not_part_of_current_exhibit){
		$slides = array($slides[$standalone_slide-1]);
	}
	
	// filter out slides that aren't part of the gallery:
	if(!$not_part_of_current_exhibit){
		$new_slides = array();
		foreach($slides as $value) {
			if($value[6] !== false){
				array_push($new_slides, $value);
			}
		}
		unset($slides);
		$slides = $new_slides;
	}
	

	
	foreach($slides as $value) {
	
	
		// does this block contain the current slide (first one, requested through url)?
		$noscript = ''; //noscript tag only for the first image
		$slide_status = '';
		if(isset($_GET['q']) && $value[0] == str_replace('/','',$_GET['q'])){
			$current_slide_number = $slide_counter;
			$slide_status = ' slidePage';
			$noscript = '<noscript><img src="'.$image_direcotory.$large_image_prefix.$value[1].'" alt="'.$value[2].'" /></noscript>';
		}$slide_counter++;
		
		
		
		// get image dimensions
		$sm = "http://".$_SERVER["SERVER_NAME"].$image_direcotory.$small_image_prefix.$value[1]; //relative url -> absolute
		list($image_width, $image_height, $t, $a) = getimagesize($sm);


		


		// calculate base print size:
		$portrait_class = '';
		$printer_price = 0;
		if($image_width > $image_height){ //landscape
			$print_height = 11;
			$print_width = floor(($image_width/$image_height)*110)/10;
			$printer_price = (17.75 + ($print_width - 12)*1.5);
		}else{
			$portrait_class = ' portrait';
			$print_width = 11;
			$print_height = floor(($image_height/$image_width)*120)/10;
			$printer_price = (17.75 + ($print_height - 12)*1.5);
		}
		// take 1/2 white borders into account:
		$print_width += 1;
		$print_height += 1;


		// set the price
		$price_for_this_print = $GLOBALS['price_regular'];
		if($print_width > $GLOBALS['panorama_threshold'] || $print_height > $GLOBALS['panorama_threshold'])
			$price_for_this_print = $GLOBALS['price_panorama'];
		


		// SALE PRICE
		$sale_message = '';

		/*
		$sale_message .= applyCoupon($price_for_this_print)['message'];
		$price_for_this_print = applyCoupon($price_for_this_print)['price'];
		*/



		// prepare stories (do not show any text for non-loaded pages)
		if($slide_status == ' slidePage'){
			if (strpos($value[3], '<p>') !== FALSE)
			$story_content = $value[3];
			else $story_content = '<p>'.$value[3].'</p>';
	
			$author_block_content = $value[4];
			$story_status = '';
			
			if($value[3] == ''){
				$story_content = '<p><em>'.explode(' ',trim($value[4]))[0]." didn't write an artist statement for this image. Most images chosen to be here don't need a background story; they stand wonderfully on their own. If you would like to learn more about this work, have a look at <a href=\"/talent/".str_replace(' ','-',strtolower($value[4]))."/\">".explode(' ',trim($value[4]))[0]."'s portfolio</a>. That's where you can understand the style, inspirations and find more similar creations from this artist.</em></p>";
			}
			
			
		}else{
			$story_content = '';
			$story_status = ' loadingContainer';
			$author_block_content = '';
		}

		// zoom offset for some vertical images:
		if ($value[0] == 'laughing-girl')
		$data_zoom_offset_y = ' data-zoom-offset-y="13"';
		else
		$data_zoom_offset_y = '';
		
	
	
	
	
	
	
	
		// construct the html block
		$spell_numbers = new NumberFormatter("en", NumberFormatter::SPELLOUT);
		$prints_sold = $spell_numbers->format((15-$value[5]));
		$prints_sold_sentence = ucfirst($prints_sold).' prints have been sold';
		if((15-$value[5]) == 1){
			$prints_sold_sentence = ucfirst($prints_sold).' print has been sold';
		}
		if((15-$value[5]) == 0){
			$prints_sold_sentence = 'No prints of this edition have been sold yet';
		}
		
		$html_blocks .= '
		<article data-slide-url="'.$subdir.$value[0].'/" class="'.$slide_status.'">
			<section class="imageAligner">
				<figure>
					<img src="/design/blank.gif" data-image="'.$value[1].'"'.$data_zoom_offset_y.' alt="'.$value[2].'" width="'.$image_width.'" height="'.$image_height.'" class="animateAll loading doNotSteal" />'.$noscript.'
				</figure>
			</section>
			<section class="imageDetails'.$slide_status.'">
				<section class="eCom">
					<div>'.$sale_message.'
						<a href="javascript:void(0);" class="contentButton darkGrey animateLetterSpacing nostyle buyPrint loadingContainer">Buy This Print<small class="red"><strong class="printPrice">'.$price_for_this_print.'</strong> + shipping</small></a>
						<a href="javascript:void(0)" class="moreLink nostyle" data-more="printInfo-'.$value[0].'"><span class="sticker printSize blue">'.$print_height.'<small class="white"> x </small>'.$print_width.'&rdquo; Print</span> <strong>+ Learn more</strong></a>
					</div>
					
					<div class="more animateAll" id="printInfo-'.$value[0].'">
						<h4>Limited Edition <span class="red">Premium Print</span></h4>
						<section class="printSizeInfo">
							<p>All ArtSocket prints are 12 inches (30cm) on the short-side.</p>
						</section>
						<section class="printStats">
							<p><small><span class="sticker printSize blue">'.$print_height.'<small class="white"> x </small>'.$print_width.'&rdquo; Print</span> ('.(round($print_height*2.54)).'<small> x </small>'.(round($print_width*2.54)).'cm) premium print. All of our artwork is printed on superior quality archival paper made from bamboo fibers to ensure best color reproduction and lowest environmetal impact.</small></p>
							<p><small>Giclée inks are <a href="/warranty/">guaranteed</a> to be fade-free for 100 years by manufacturer.</small></p>
						<p><small><span class="sticker ltdRun">Edition #'.(16-$value[5]).'<small class="white"> of </small>15</span> <strong>Only fifteen prints will be made</strong> in this limited edition run. '.$prints_sold_sentence.'. <strong>You are looking at print #'.(16-$value[5]).'.</strong></small></p>
							<p><small>Your print comes with a &frac12;" border that features a serial seal and the <strong>artist\'s signature.</strong></small></p>
						</section>
						<section class="genericImageInfo">
							<p class="froadProtection" style="padding: 0 0 1.5em;"><small>Payment processing by <a href="https://stripe.com" rel="nofollow" target="_blank">Stripe</a> - trusted by companies like Twitter, Shopify, Pinterest and KickStarter. Read our <strong><a href="/privacy-policy/">privacy policy</a></strong> to learn which information we keep and collect.</small><img src="/images/content/pages/index-stripeBadge.png" alt="Stripe logo" style="height: 41px;
	width: auto;"></p>
							<a href="javascript:void(0);" onclick="window.open(\'https://www.sitelock.com/verify.php?site=artsocket.com\',\'SiteLock\',\'width=600,height=600,left=160,top=170\');" class="nostyle securityCheck"><img src="/design/blank.gif" data-image="//shield.sitelock.com/shield/artsocket.com" class="security" alt="Website security" /></a>
							<p class="froadProtection"><small>ArtSocket is scanned and verified daily by SliteLock against malware. <strong><a href="javascript:void(0);" onclick="window.open(\'https://www.sitelock.com/verify.php?site=artsocket.com\',\'SiteLock\',\'width=600,height=600,left=160,top=170\');">Read today\'s security report</a></strong>.</small><img src="/design/blank.gif" data-image="/images/content/pages/secure-cards.png" class="acceptedCards" alt="Accepted credit cards" /></p>
						
						</section>
					</div>		
					
					<p class="shippingInfo"></p>
				</section>
			
			
			
			
				<h1>'.$value[2].'</h1>' /*
				<section style="padding-left:0"><figure class="productPreview'.$portrait_class.'"><img src="/design/blank.gif" data-image="'.$image_direcotory.$large_image_prefix.$value[1].'" alt="Preview" class="doNotSteal" width="'.$image_width.'" height="'.$image_height.'" /><figcaption><small class="note">Click above for <strong class="white">Zoom</strong> preview.</small></figcaption></figure></section> */
				.'
				<h3 class="author">'.$author_block_content.'</h3>
				<section class="storyContent'.$story_status.'">'.$story_content.'<p class="loadingContainer"></p></section>
				<h3 class="center productHeader overshadowWhite">Limited Edition Premium Paper Print &#x1F60D;</h3>
    		<small class="center hintLinkLearnMore overshadowWhite"><a href="javascript:void(0);">Learn more (edition, size, shipping)</a></small>
			
			
			
				<figure class="productPreview'.$portrait_class.'"><img src="/design/blank.gif" data-image="'.$image_direcotory.$large_image_prefix.$value[1].'" alt="Preview" class="doNotSteal" width="'.$image_width.'" height="'.$image_height.'" /></figure>
				
				<div class="royaltiesBreakdown">
					<h4>Support The Artist &#x1F49D;</h4>
					<small class="center">If you buy this print, <strong>'.explode(' ',trim($value[4]))[0].' will get $35</strong>, we\'ll pay about $'.number_format($printer_price, 2).' to our <a href="http://www.picturesalon.com" rel="nofollow" target="_blank">printer</a> and spend about $11 for digital processing and packaging. <strong>ArtSocket will keep $'.number_format(($price_for_this_print - 35 - $printer_price - 11), 2).'</strong>.</small><small class="center hintLinkLearnMore"><a href="javaScript:void(0);"><strong class="darkGrey">+ Learn more (edition, size, shipping)</strong></a></small>
				</div>
				
			</section>
				
		</article>';
	}
	
	
	// next/prev arrows and urls
	$prev_url = '#';
	$next_url = '#';
	$hide_left_arrow = ' hiddenArrow';
	$hide_right_arrow = ' hiddenArrow';
	
	if($current_slide_number > 0 ){
		$hide_left_arrow = '';
		$prev_url = $subdir.$slides[$current_slide_number-1][0];
	}
	if($current_slide_number < $slide_counter - 1 ){
		$next_url = $subdir.$slides[$current_slide_number+1][0];
		$hide_right_arrow = '';
	}
	
	
	
	
	
	// output html
	echo '
		<section id="imageSlider" data-image-dir="'.$image_direcotory.'" data-large-image-prefix="'.$large_image_prefix.'" data-small-image-prefix="'.$small_image_prefix.'" data-current-slide="'.$current_slide_number.'" class="animateAll">
			<div>
			'.$html_blocks.'
			</div>
		</section>
		
		<nav>
			
			<a href="'.$next_url.'/" class="rightArrow animateAllFast'.$hide_right_arrow.'" rel="next">
				<div class="rightArrowShim">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="71.333px" height="133.083px" viewBox="0 0 71.333 133.083" enable-background="new 0 0 71.333 133.083" xml:space="preserve" class="animateAll">
						<g>
							<line x1="0" y1="0" x2="67.5" y2="67.5" class="imageArrow"/>
							<line x1="0" y1="133.1" x2="67.5" y2="65.6" class="imageArrow"/>
						</g>
					</svg>
				</div>
			</a>
		
			<a href="'.$prev_url.'/" class="leftArrow animateAllFast'.$hide_left_arrow.'" rel="prev">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="71.333px" height="133.083px" viewBox="0 0 71.333 133.083" enable-background="new 0 0 71.333 133.083" xml:space="preserve" class="animateAll">
					<g>
						<line x1="70.3" y1="133.1" x2="2.8" y2="65.6" class="imageArrow"/>
						<line x1="70.3" y1="0" x2="2.8" y2="67.5" class="imageArrow"/>
					</g>
				</svg>
			</a>
		</nav>
		
		<section class="productDetails"></section>
		<article id="aboutThisImage" class="animateAll"></article>
		<section class="genericImagInfo"></section>
		
		
		
	';
}





/*
<section class="productDetails">
		<!--
			<h2></h2>
			
			<small class="white">
				Incredible color and detail. Only on paper!
				<a href="javascript:void(0);" class="expandProductDetail">Learn more</a>
			</small>
			
			<div class="productDetailInfo">
				<blockquote>
					<p>The print is great. I am just now getting it framed. It looks really good. I like it a lot, and will definitely be browsing ArtSocket in the future for more prints.</p><cite>Kevin D Schopp <span class="yellow">★★★★★</span></cite></blockquote>
				<blockquote><p>The prints arrived in a nice tube — really no problem at all. Print quality and stock appear to be of high quality.</p><cite>Frank Russo <span class="yellow">★★★★★</span></cite></blockquote>
				<small class="center"><a href="/about/#reviews">Read more customer reviews</a></small>			
			
			
				<ul>
					<li>Every print comes with <strong><a href="/warranty/">100 year warranty</a></strong>. You can also <a href="/return-policy/">return</a> it within 30 days of your purchase in case you are not happy.</li>
					<li>Our everlasting giclée inks are laid on 290<em>gsm</em> sheets of eco-friendly museum-quality paper made from <strong>bamboo pulp by <a href="http://en.wikipedia.org/wiki/Hahnemühle" target="_blank" rel="nofollow">Hahnemühle</a></strong>. This subtly textured heavy stock is going to feel wonderful once you hold it in your hand and reflect light like no other once it\'s on the wall. </li>
					<li>This print is <strong>one-of-a-kind edition of just 15</strong>. A beautifully designed serial seal with artwork title, artist\'s portrait and signature is printed at the marginof the image, making your copy truelly unique.</li>
				</ul>
			</div>
		-->
		</section>
*/
	
?>