<?php
	$mag_index_page = true;
    $title = 'Inspiring Stories About Art, Travel and Creativity';
    $banner_image = '/images/content/pages/mag-poster.jpg';
    
    $description = 'Long-form articles about art, design, photography, lifestyle and travel.';
    
    $css = '
    body > header nav a.blogButton {
		color: #ff5a96;
		font-weight: 700;
		background: #000;
	}
	body > header nav a.blogButton svg path {
		fill: #ff5a96 !important;
	}
	
	#articleBody { max-width: 100%; }
	main { padding-bottom: 0; }
	
	#exploreList h2 > span.abstract {
		text-align: center;
		margin-bottom: 1em;
	}
	
	
	
	.loadMore p, .loadMore p:before, .loadMore p:after {
		background:0 0 !important;
	}
	.loadMore p.center { padding: 1.5em 0 3em; }
	.loadMore p a {
		background: rgba(255, 255, 255, .05);
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
		fill: #fff;
	}
	


	#loadMag { width: 19em; }
	
	
	
	
	
	
	
	
	';
	
	$explore_list = true;
	
	// UPDATE THIS IF MAIN CSS FILE IS CHANGED:
	// generated at: http://jonassebastianohlsson.com/criticalpathcssgenerator/
	//$critical_css = '';
    
    if(!$_GET['ajax_request'] && !$ajax_request)
    include_once('mag-header.php');
    
    
    
    $post_list = array(
		

		array(
			'art-needs-design',
			'Art and Design',
			'/images/content/mag/art-needs-design_header.jpg',
			"An artist statement by Richart Heinisohn on his newest work, \"Time Frames\" that explores the perception of temporal interpretations within our evolving culture of information overload.",
			'Dmitri Tcherbadji', true),
								
		array(
			'pink-color',
			'Pink',
			'/images/art/L_TurquoiseDouble.jpg',
			"An interactive article with descriptions, history and color codes of all documented shades of pink. Plus a background behind our cultural and physiological associations with the color.",
			'Dmitri Tcherbadji', false),

			
	);
	
	
	
	
	
	
	
	
	
	
	
	include_once('../snippets/elsewhere-db.php');
	
	
	if(!$ajax_request){
	
	
	
	
	// RSS:
	if(isset($_GET['rss'])){
		header('Content-Type: application/rss+xml; charset=ISO-8859-1');
		echo '<?xml version="1.0" encoding="ISO-8859-1"?>'.PHP_EOL;
		echo '<rss version="2.0">'.PHP_EOL;
		echo '<channel>'.PHP_EOL;
			echo '<title>ArtSocket Magazine</title>'.PHP_EOL;
			echo '<description>'.$description.'</description>'.PHP_EOL;
			echo '<language>en-us</language>'.PHP_EOL;
			echo '<link>https://www.artsocket.com/mag/</link>'.PHP_EOL;
	}
	
	
	
	// next article filter:
	$next_article = true;
	$more_articles_list = [];
	if(isset($_GET['filter_next'])) $next_article = false;
		
	//OUTPUT ARTICLE LIST
	foreach($post_list as $value) {
	
		// special for pink-color:
		$special_class = '';
		$article_label = '<span class="label yellow">Article</span>';
		if($value[0] == 'pink-color'){
			$special_class = ' pink';
			$article_label = '<span class="label black">Interactive Article</span>';
		}
		
		
		if($value[0] == 'art-discounts-ethics'){
			$article_label = '<span class="label black">Interactive Article</span>';
		}
		if(
			$value[0] == 'betty-travelling-artist' ||
			$value[0] == 'matthew-skater-videographer-artist' ||
			$value[0] == 'kristen-au-model-musician' ||
			$value[0] == 'ian-travel-and-inspiration' ||
			$value[0] == 'ron-starbucks-coffee-cup-art' ||
			$value[0] == 'darcy-canadian-nature-photographer'
		){
			$article_label = '<span class="label red">Interview</span>';
		}
	
	
	
		// filters:
		if(
			// author:
			!isset($_GET['filter_author']) || ($_GET['filter_author'] == $value[4])
		){
		
			// regular html:
			if(!$_GET['rss'] && $value[5] !== false && !(isset($_GET['ajax_request']) && isset($_GET['filter_smallgrid'])) ){
			
				if($next_article){ // always on by default, on only once if [current] article set in filter_next variable
					echo '
				<a href="/mag/'.$value[0].'/" class="nostyle white mag animateAll'.$special_class.'" data-background-image="'.$value[2].'">
					<section>
						<h2>
							<span class="titleText">'.$value[1].'</span>
							<span class="abstract">'.$value[3].'</span>'.$article_label.'
						</h2>
					</section>
				</a>';
					if(isset($_GET['filter_next'])) $next_article = false;
					
				}
				
				// next article:
				if(isset($_GET['filter_next']) && $value[0] == $_GET['filter_next']){
					$next_article = true;
				}
			}
			
			
			
			
			// more articles:
			if(
				(!isset($_GET['ajax_request']) && (!isset($value[5]) || $value[5] == false))
				
				// ajax request for author article list:
				|| (isset($_GET['ajax_request']) && isset($_GET['filter_smallgrid']))
			){
				array_push($more_articles_list, '
					<a href="/mag/'.$value[0].'/" class="nostyle">
						<div>
							<h4>'.$value[1].$article_label.'</h4>
							<img src="/images/thumbnails/?i='.$value[2].'&m=tiny_square" alt="'.$value[1].'">
							<p class="animateAllFast"><em>'./*preg_replace('/\s+?(\S+)?$/', '', substr(strip_tags(*/$value[3]/*), 0, 190))*/.'</em></p>
						</div>
					</a>');
				
				// instantly print for ajax requests:
				if(isset($_GET['ajax_request']) && isset($_GET['filter_smallgrid'])){
					echo end($more_articles_list);
				}
			}
			
			
			
			
			
			
			
			
			// rss:
			if(isset($_GET['rss'])){
				echo '<item>'.PHP_EOL;
					echo '<title>'.$value[1].'</title>'.PHP_EOL;
					/*
					echo '<image>'.PHP_EOL;
						echo '<url>https://www.artsocket.com/images/thumbnails/?i='.$value[2].'&amp;m=half_square</url>'.PHP_EOL;
					echo '</image>'.PHP_EOL;
					*/
					echo '<link>https://www.artsocket.com/mag/'.$value[0].'/</link>'.PHP_EOL;
					echo '<description>'.str_replace('&','&amp;',strip_tags($value[3])).'</description>'.PHP_EOL;
				echo '</item>'.PHP_EOL;
			}
		}
	}
	
	// RSS:
	if(isset($_GET['rss'])){
		echo '</channel>'.PHP_EOL;
		echo '</rss>'.PHP_EOL;
	}
	
	
	/*
	if(!$_GET['ajax_request'])
	echo '<div id="imageSlider"></div>';
	*/
	
	if(!$_GET['ajax_request']){
	echo '
			
		<section id="moreArticles">';
		
	foreach($more_articles_list as $value) {
		echo $value;
	}
			
	echo '
		
		<hr/>
		</section>';
	
	$script = "
	
	
		
		
		
		/*
	// LOAD MAG STUFF:
		
		var wWidthQuick = window.getSize().x;
		var wHeightQuick = window.getSize().y;
		squareRes = 's_';
		if(wWidthQuick > 890) squareRes = 'm_';
		if(wWidthQuick > 1280 || (isRetina() && wWidthQuick > 1023)) squareRes = 'L_';
					
		
		$('loadMag').addEvent('click', function(e){
			e.stop();
			ga('send', 'event', 'Browse Intent', 'More Button', 'Load /Mag');
			var artSection = $('exploreList').getSize().y - wHeightQuick/2;
			new Request.HTML({ 
				url: '/art/?ajax_request=true', 
				onSuccess: function(tree, elements, html){ 
				
					// show the user where we are:
					showHeader();
					(function(){ pullArt(); }).delay(750);
							
					
							
					
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
						if(window.getScroll().y < artSection && !alreadyMag){
							pullMag();
							
						}
						// art
						if(window.getScroll().y > artSection && !alreadyArt){
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
	
	
	include_once('mag-footer.php');
	}
	
	
	
	if(!$_GET['ajax_request'])
	include('../snippets/footer.php');
	
	}
?>