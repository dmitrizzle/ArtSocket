<?php
	
	
	
	
	
	
	
	
	
	
	
	
	
	$exhibit_name = "Monochrome";
	$meta_image = "/images/art/L_ShoesFlower.jpg";
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
    $title = '"'.$exhibit_name.'" Curated Art Series';
    // $description = "Curated art sold as top quality prints with selections from independent photographers from around the world. Limited edition prints available, starting from $price_regular.";
    $description = 'Curated art series, created by Dmitri Tcherbadji. Limited edition prints from $price_regular.';
     
     
    $css = '

	/* HEADER LINK COLORING */
	body > header nav a.homeButton {
		color: #ff5a96;
		font-weight: 700;
		background: #000;
	}
	
	
	body > header nav a.homeButton svg path {
		fill: #ff5a96 !important;
	}
	main > article { max-width: 100%; }
	main { padding-bottom: 0; }
	
	
	
	#loadMag { width: 19em; }
	
	
	.loadMore {
		/*
		background-image: url(/images/thumbnails/?blur=2&i=/images/art/L_Insomnia.jpg);
		background-size: cover;
		box-shadow: 0 0 6em 4em #000 inset;
		*/
		background: #fff;
	}
	.loadMore p, .loadMore p:before, .loadMore p:after {
		background:0 0 !important;
	}
	.loadMore p a:active, .loadMore p a.active {
		background: #1e1e1e;
	}
	.loadMore p a svg {
		width: .85em;
		height: .85em;
		overflow: visible;
		padding: 0 .35em 0 0;
		margin-bottom: -2px;
	}
	.loadMore p a svg path {
		fill: #00AEEF;
	}
	.loadMore .contentButton {
		width: 23em;
		max-width: calc(100vw - 5em);
		display: block;
		margin: 0 auto;
	}
	
	
	
	

	
	.lightGrey { color: #5a5a5a; }
	
	
	';
	
	$explore_list = true;
	$noscript_css = '.postLoadImg { display: none; }';
	
	// UPDATE THIS IF MAIN CSS FILE IS CHANGED:
	// generated at: http://jonassebastianohlsson.com/criticalpathcssgenerator/
	// $critical_css = '';

	//$light_header = true;
	if(!$_GET['ajax_request']){
		include('snippets/header.php');
		ob_start('simpleComress');
	}else{
	
		// COPIED FROM HEADER.PHP:
		ob_start();
		include_once('snippets/header.php');
		ob_end_clean();
	}
?>
<?php if(!$_GET['ajax_request']){ ?><main id="identifierHomepage">

	<!-- CURATED SELECTIONS -->
	<article>
	
		
		<section id="exploreList"><?php } include('snippets/image-db.php');
		
		$slide_number = 0;
		$previous_author = '';
		
		
		foreach($slides as $value) {
			$xoffset = 0;
			$yoffset = 0;
			
			//correct thumbnails individually
			switch ($value[1]) {
				case 'Stairway':
					$xoffset = -10;
					break;
				/*case 'Incheon-Badlands':
					$xoffset = -20;
					break;*/
				case 'Big-and-Small':
					$xoffset = -40;
					break;
				/*case 'The-Owl-March':
					$xoffset = -150;
					break;*/
				case 'White-Bear':
					$xoffset = -60;
					break;
				case 'Tale-of-Medvediha':
					$xoffset = -25;
					break;
				case 'Old-Man':
					$yoffset = -175;
					break;
			}
			
			
			
			
			//PRICES ----- STRAIGHT COPY FROM IMAGE-DB.PHP
			$panorama_threshold = 17.55; //how wide does the image need to be to be considered a panorama?
	
	
			$sm = "http://".$_SERVER["SERVER_NAME"].$image_direcotory.$small_image_prefix.$value[1]; //relative url -> absolute
			list($image_width, $image_height, $t, $a) = getimagesize($sm);
			
			//calculate base print size:
			$portrait_class = '';
			if($image_width > $image_height){ //landscape
				$print_height = 11;
				$print_width = floor(($image_width/$image_height)*110)/10;
			}else{
				$portrait_class = ' portrait';
				$print_width = 11;
				$print_height = floor(($image_height/$image_width)*120)/10;
			}
			//take 1/2 white borders into account:
			$print_width += 1;
			$print_height += 1;
		
			//set the price
			$price_for_this_print = $price_regular;
			if($print_width > $panorama_threshold || $print_height > $panorama_threshold)
			$price_for_this_print = $price_panorama;
			
			//SALE PRICE
			/*
			$sale_price_for_this_print = applyCoupon($price_for_this_print)['price'];
			$sale_msg = '<s>$'.$price_for_this_print.'</s> <strong class="white salePrice" title="This print is on Sale!">$'.$sale_price_for_this_print.'</strong>';
			
			if($sale_price_for_this_print == $price_for_this_print) $sale_msg = '$'.$price_for_this_print;
			*/
			
			//------ END PRICES
		
		
		
		
			
			
			
			// image URLs
			$slide_thumb_large = '/images/thumbnails/?i='.$image_direcotory.$large_image_prefix.$value[1].
			'&amp;m=L_square&amp;xoffset='.$xoffset.'&amp;yoffset='.$yoffset;
			$slide_thumb_small = '/images/thumbnails/?i='.$image_direcotory.$large_image_prefix.$value[1].
			'&amp;m=s_square&amp;xoffset='.$xoffset.'&amp;yoffset='.$yoffset;

			// filters:
			if(
				// author:
				!(isset($_GET['filter_author']) && urldecode($_GET['filter_author']) != $value[4])
				
				// listing by position number:
				&& !(isset($_GET['filter_position']) && $_GET['filter_position'] != $slide_number)
				
				
				// DO NOT SHOW INACTIVE IMAGES IN THE GALLERY:
				&& ($value[6] !== false || (isset($_GET['filter_includenotfeatured'])))
				
				&& !isset($_GET['filter_smallgrid']) 
				
				
			){
			
				$background_output = ' '.str_replace(' ', '-', strtolower($value[4])).'" data-background-image="'.$value[1].'"';
				$number_modifier = 'st';
				if((16-$value[5]) ==2)$number_modifier = 'nd';
				if((16-$value[5]) ==3)$number_modifier = 'rd';
				if((16-$value[5]) >=4)$number_modifier = 'th';
				//<strong>'.$sale_msg.'</strong> '.$print_height.'<small>x</small>'.$print_width.'&rdquo; 
				
				echo '<a href="/art/'.$value[0].'/" class="nostyle white art animateAll'.$background_output.' title="'.preg_replace('/\s+?(\S+)?$/', '', str_replace('.','.&nbsp;', str_replace('"', '', substr(strip_tags($value[3]), 0, 165)))).'...">
						<section>
							<h2>
								<img src="/design/blank.gif" alt="'.$value[2].'" data-image-width="'.$image_width.'" data-image-height="'.$image_height.'" class="animateAll'.$portrait_class.'"/>
								<span class="titleText">'.$value[2]
								// .'<span class="label blue">'.(16-$value[5]).'st Edition Print</span>'
								.'</span>
								<span class="label blue">'.$print_height.'<small>x</small>'.$print_width.'&rdquo; print <strong>$'.$price_for_this_print.'</strong></span>
								
								
							</h2>
						</section>
					</a>';
				
				if($value[4] != $GLOBALS['slides'][$slide_number + 1][4]){
				
					if(isset($GLOBALS['slides'][$slide_number - 1][4]) && $value[4] == $GLOBALS['slides'][$slide_number - 1][4]){
						$plural_or_singular = 'Images above are the works of';
					}else{
						$plural_or_singular = 'Image above is the work of';
					}
					
					if(!isset($_GET['filter_cutauthors'])){
						echo '
					
					
						<article class="animateAll">
							<span data-artist-scrollto="'.str_replace(' ', '-', strtolower($value[4])).'"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="30px" height="15px" viewBox="-180 210 30 15" enable-background="new -180 210 30 15" xml:space="preserve"><g><line x1="-150" y1="210" x2="-165" y2="225"></line><line x1="-180" y1="210" x2="-165" y2="225"></line></g></svg></span>
							<figure class="productPreview">
								<a href="/talent/'.str_replace(' ', '-', strtolower($value[4])).'/" class="nostyle">
									<img src="/images/content/pages/about-'.str_replace(' ', '-', strtolower($value[4])).'.jpg" alt="'.$value[4].'" class="noZoom" />
									<img src="/images/content/pages/signature-'.str_replace(' ', '-', strtolower($value[4])).'.jpg" alt="'.$value[4].'" class="signature" />
								</a>
								<figcaption class="center">
									'.$plural_or_singular.' <a href="/talent/'.str_replace(' ', '-', strtolower($value[4])).'/" class="featuredArtist darkGrey">'.$value[4].'</a> for the '.date("Y").' series <a href="javascript:read(\'aboutSeries\')" class="seriesName"><strong>"'.$exhibit_name.'"</strong></a><br /><span class="lightGrey">Curated by Dmitri Tcherbadji.</a>
								</figcaption>
							</figure>
							<p class="statsAndShare center">'.$share_html.'</p>
						</article>';
					}
				}
					
			}
			
			
			
			
			if(
				isset($_GET['filter_smallgrid']) 
				&& !(isset($_GET['filter_author']) && urldecode($_GET['filter_author']) != $value[4])
			){
				echo '<a href="/art/'.$value[0].'/"><img src="/images/thumbnails/?i=/images/art/L_'.$value[1].'&m=tiny_square" alt="'.$value[2].'" title="'.$value[2].'" class="animateAll" /></a>';
			}
			
			
			
		
		$slide_number++;
		}
		
		
		if(!$_GET['ajax_request']){?><!-- <div id="more"></div> -->
        </section>

		<?php echo $gallery_subfooter_html; ?>
		
		
		<!-- <div id="imageSlider"></div> -->
		
		
	</article>
</main>

<?php 
	}
	
	if(!$_GET['ajax_request']){
	ob_end_flush();
	
	$script = "
					
		$$('.exhibitName').set('html', $$('.seriesName')[0].get('html'));
		$$('.totalImages').set('html', '".$slide_number."');
		
		
		
				
		/* 
		var wHeightQuick = window.getSize().y;
		
		
		// LOAD MAG STUFF:
		
		$('loadMag').addEvent('click', function(e){
			e.stop();
			ga('send', 'event', 'Browse Intent', 'More Button', 'Load /Mag');
			var artSection = $('exploreList').getSize().y - wHeightQuick/2;
			new Request.HTML({ 
				url: '/mag/?ajax_request=true', 
				onSuccess: function(tree, elements, html){
					
					// show the user where we are:
					showHeader();
					(function(){ pullMag(); }).delay(750);
					
					
							
					
					$('exploreList').set('html', $('exploreList').get('html')+html);
					$$('.loadMore').setStyle('display','none');
					ga('send', 'pageview', {
						'page': '/mag/',
						'title': 'Mag'
					});
					
					var alreadyArt = 0;
					var alreadyMag = 0;
					window.addEvent('scroll', function(){
						// mag
						if(window.getScroll().y > artSection && !alreadyMag){
							pullMag();
							
						}
						// art
						if(window.getScroll().y < artSection && !alreadyArt){
							pullArt();
							
						}
					});
					
					exploreListCare();
					
					
					function pullMag(){
						history.pushState(null, null, '/mag/');
						document.title = 'Magazine '+String.fromCharCode(183)+' ArtSocket';
						alreadyMag++; alreadyArt=0;
						
						$$('body > header nav a.blogButton').setStyles({
							'color': '#ff5a96',
							'font-weight': '700'
						});
						$$('body > header nav a.homeButton').setStyles({
							'color': '#2c2c2c',
							'font-weight': '400'
						});
						$$('body > header nav a.homeButton svg path').set('style', 'fill: #2c2c2c !important');
						$$('body > header nav a.blogButton svg path').set('style', 'fill: #ff5a96 !important');
					}
					
					function pullArt(){
						history.pushState(null, null, '/art/');
						document.title = 'Art '+String.fromCharCode(183)+' ArtSocket';
						alreadyMag=0; alreadyArt++;
						
						$$('body > header nav a.homeButton').setStyles({
							'color': '#ff5a96',
							'font-weight': '700'
						});
						$$('body > header nav a.homeButton svg path').set('style', 'fill: #ff5a96 !important');
						$$('body > header nav a.blogButton svg path').set('style', 'fill: #2c2c2c !important');
						
						$$('body > header nav a.blogButton').setStyles({
							'color': '#2c2c2c',
							'font-weight': '400'
						});
					}
					
					
				}
			}).send(); 

		});
		
		*/
		
		
	";

	include('snippets/footer.php');
	}
?>