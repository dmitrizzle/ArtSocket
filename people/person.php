<?php
//server url... very important
$domain = "https://www.artsocket.com";




$artist_directory = array(





	/* TEAM */
	'dmitrizzle' => array(
		'title' =>'dmitrizzle',
		'featured' => false,
		'description' =>"ArtSocket Creator",
		'profile_background' =>"/images/art/L_Dusk.jpg",
		'profile' =>"<p>Dmitri's passion for art and technology began when he was 11. Back in the 90's when personal computers were still qute rare he aquired a copy of 3D Studio MAX, which he used almost every day while his friends plaid Super Mario. Since then he's never stopped developing the skills and the passion for creative process. <a href=\"javascript:void(0)\" class=\"moreLink\" data-more=\"moreTeam\"><strong>+ Read More</strong></a></p>
				<div class=\"more animateAll\" id=\"moreTeam\">
					<p>More about dmitrizzle</p>
				</div>
				"
	),

	
	
	
	
	

);





$clean_u = str_replace('/', '', $_GET['u']);



$profile_exists = false;
if(isset($artist_directory[$clean_u]['title'])){
	$title = $artist_directory[$clean_u]['title'].', '.$artist_directory[$clean_u]['description'];
	$artist_name = $artist_directory[$clean_u]['title'];
	$description = $artist_directory[$clean_u]['description'];
	$profile_background = $artist_directory[$clean_u]['profile_background'];
	$profile_picture = "/images/content/pages/about-".str_replace('/','',$_GET['u']).".jpg";
	$meta_image = $domain.$profile_picture;
	$profile = $artist_directory[$clean_u]['profile'];
	$profile_exists = true;
}



if(!$_GET['ajax_request'] && !$ajax_request){
/*	if(!$profile_exists){
		header("HTTP/1.1 404 Not Found");
		$error_page = true;
		include('../snippets/errors/404.php');
		die();
	} */

	$c = 'http://www.artsocket.com/talent/'.$clean_u.'/';	
	$body_description = $description;
	$description = strip_tags($description).'.';
			
    $css = ' 
    
    	/* HEADER LINK COLORING */
		body > header nav a.artistsButton svg path,
		body > header.light nav a.artistsButton svg path {
			fill: #ff5a96;
		}
		body > header nav a.artistsButton {
			color: #ff5a96;
			font-weight: 700;
			background: #000;
		}
		
		
	
		body > main { padding-bottom: 0; }
		/*
		main > header {
			background-image: url('.$profile_background.');
		}
		*/
		
		main > header section {
			padding: 7em 0 0;
		}
		main > header section > img {
		width: 8em;
		height: 8em;
		box-shadow: 0 1px 3px #000, 0 0 1px #000 inset;
		overflow: hidden;
		display: block;
		border-radius: 7.5em;
		/* margin: 0 auto -.75em; */
		position: absolute;
		z-index: 1;
		left: calc(50% - 4em);
		top: -4em;
		}
		main > header section > h1 {
			padding-bottom: 0;
			min-height: 1.5em;
			padding-top: 1em;
		}
		main section:first-child {
			padding-top: 0;
		}
		
		
		a.moreLink { display: inline-block; }
		main .more {
			display: none;
			opacity: 0;
		}
		main .more.show {
			display: block;
		}
		
		
		
		
		
		#artistWorkHeader { display: none; }
		
    	small.meetEverybody{
			font-size: .45em;
			margin-top: 0em;
		}
    	.archiveGrid {
			max-width: 100%;
		}
    	
    	
		
		
		
		
		
		
		
		
		
	.loadMore {
		font-size: 1.5em;
		padding-top: 1.5em;
border-top: 1em solid #ff5a96;
	}
	.loadMore p, .loadMore p:before, .loadMore p:after {
		background:0 0 !important;
	}
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
	
	.loadMore .contentButton {
		width: 19em;
		margin-bottom: 3em;
	}
	

	';


	$explore_list = true;
    include('../snippets/header.php');
    ob_start('simpleComress');
?>
<main>
	<header class="white scrollButton<?php if(!$blur_headers) echo ' loadingContainer'; ?>" <?php if($blur_headers) echo 'style="background-image: url(/images/thumbnails/?blur=2&i='.$profile_background.')"';?>>
		<img src="<?php echo $profile_background; ?>"/>
		<div>
			<section>
				<img src="<?php echo $profile_picture; ?>" alt="<?php echo $nav_title; ?>" />
				<h1 class="noHyphens"><?php echo $nav_title; ?></h1>
				<p class="statsAndShare"><?php echo $share_html; ?></p>
				
				<?php echo $scroll_button_html; ?>
			</section>
		</div>
	</header>
	
	<article>
		<section>
			<?php echo $profile; ?>
			<h2 id="artistWorkHeader" class="center"><?php echo explode(' ',trim($artist_name))[0]; ?>'s work on ArtSocket:</h2>
		</section>
	</article>
    
    
    <section class="exploreSection loadingContainer animateAll"></section>
    <section class="archiveGrid"></section>
	
</main>

<?php

	ob_end_flush();
	$script = "
	
	
		
		// artwork:
		function exploreSegment(section){
			new Request.HTML({ 
				url: '/'+section+'/?ajax_request=true&filter_author=".$artist_name."&filter_includenotfeatured=true&filter_cutauthors=true',
				filter: 'a',
				onSuccess: function(tree, elements, html){
					$$('.exploreSection').removeClass('loadingContainer');
					$$('.exploreSection')[0].set('html', $$('.exploreSection')[0].get('html')+html);
					
					if(html !== ''){
						$('artistWorkHeader').setStyle('display','block');
						fetchArtistArticles(true);
					}else {
						$$('.exploreSection').setStyle('display','none');
						fetchArtistArticles(false);
					}
					
					(function(){ exploreListCare();	}).delay(100);
					
				}
			}).send();
		}
		window.addEvent('domready', function(){
			exploreSegment('art');
		});
		
		
		// blog posts:
		function fetchArtistArticles(artistHasArtwork){
			new Request.HTML({ 
				url: '/mag/?ajax_request=true&filter_author=".$artist_name."&filter_smallgrid=true', 
				onSuccess: function(tree, elements, html){ 
			
					// show the user where we are:
					$$('.archiveGrid')[0].set('html', $$('.archiveGrid')[0].get('html')+ '<section id=\"moreArticles\">' + html + '</section>');
			
					if($$('#moreArticles > a')[0] !== undefined){
						$$('.archiveGrid')[0].setStyle('padding-bottom', '1.5em');
					}else{
						$('moreArticles').setStyle('display','none');
					}
					
					// show title
					if(html !== ''){
						$('artistWorkHeader').setStyle('display','block');
					}else if (!artistHasArtwork){
						$$('.exploreSection').setStyle('display','none');
					}
					
					
				}
			}).send();
		}
		
		
		
	
	";
	include('../snippets/footer.php');
}
?>