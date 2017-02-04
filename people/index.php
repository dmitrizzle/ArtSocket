<?php

    $ajax_request = true;
    include_once('person.php');
    include_once('../mag/index.php');
    include('../snippets/image-db.php');
    
    $description = 'Meet the '.count($artist_directory).' contributors who authored '.(count($slides) + count($post_list)).' works and articles on ArtSocket.';
    
    
    $css = '
    
    
    
	
	
	
	
	
   	 /* HEADER LINK COLORING */
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
		body > main > article { padding-bottom: 1.5em; }
		
		
		#moreArticles > a > div > div {
			background-position: center;
			background-size: cover;
		}
		.label.blue { background: #00AEEF; }
		.label.red { background: #ff5a96; }
		
		
		
		
		.titleText img {
			width: 2.15em;
			height: 2.15em;
			box-shadow: 0 1px 3px #000, 0 0 1px #000 inset;
			overflow: hidden;
			display: block;
			border-radius: 7.5em;
			margin: 0 auto -.15em;
			position: relative;
			z-index: 1;
		}
		
		
    	
		
		
	.thankyou p a svg {
		width: .85em;
		height: .85em;
		overflow: visible;
		padding: 0 .35em 0 0;
		margin-bottom: -2px;
	}
	.thankyou p a svg path {
		fill: #2c2c2c;
	}
	
	
	
		';
    $title = 'Artists and Writers';
    include('../snippets/header.php');
    ob_start('simpleComress');


?>
<main id="identifierTalent">
	<!--
	<header class="white">
		<div>
			<section>
				<h1 class="noHyphens">ArtSocket Artists</h1>
				<p><strong>Meet the <a href="javascript:void(0);" class="scrollArtists"><?php echo count($artist_directory); ?> contributors</a> who authored <?php echo (count($slides) + count($post_list)); ?> <a href="/art/archive/">works</a> & <a href="/mag/">articles</a> on ArtSocket</strong></p>
				<a href="javascript:void(0);" class="scrollButton animateAll nostyle">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="30px" height="15px" viewBox="-180 210 30 15" enable-background="new -180 210 30 15" xml:space="preserve"><g><line x1="-150" y1="210" x2="-165" y2="225"/><line x1="-180" y1="210" x2="-165" y2="225"/></g></svg>
				</a>
			</section>
		</div>
		<img src="<?php echo $meta_image; ?>" alt="ArtSocket prints" />
	</header>
	-->	
		
		
		
		
	<article>
		<?php
			// alphabetical:
			$count_1 = 0;
			$count_2 = 0;
		
			// display:
			foreach ($artist_directory as $key => $value) {
				$label_color = "";
				$label_width = 14;
				switch ($value['description']) {
					
					case "Artist": $label_color = "black"; $label_width = 4; break;
					case "Skater": $label_color = "black"; $label_width = 4; break;
					
					case "Photographer, Writer": $label_color = "yellow"; $label_width = 12; break;
					case "Writer": $label_color = "yellow"; $label_width = 4; break;
					
					case "Photographer": $label_color = "blue"; $label_width = 8; break;
					
					case "Consultant": $label_color = "red"; $label_width = 6.5; break;
					case "ArtSocket Owner":  $label_color = "red"; $label_width = 10; break;
					case "Consultant, Photographer": $label_color = "red"; $label_width = 14.5; break;
					case "Consultant, Artist": $label_color = "red"; $label_width = 10; break;
					
					default: $label_color =  "red"; $label_width = 14;
				}
				
				if(isset($value['featured']) && $value['featured'] == true){
					if($count_1 == 0) echo '<section id="exploreList">'; $count_1++;
					echo '
					<a href="/talent/'.$key.'/" class="nostyle white mag talent animateAll" data-background-image="/images/thumbnails/?blur=2&i='.$value['profile_background'].'">
						<section>
							<h2>
								<span class="titleText"><img src="/images/content/pages/about-'.str_replace('/','',$key).'.jpg" alt="'.$value['title'].'" alt="'.$value['title'].'" />'.$value['title'].'</span>
								<span class="abstract">'.preg_replace('/\s+?(\S+)?$/', '', substr(strip_tags($value['profile']), 0, 190)).'...</span>
								<span class="label '.$label_color.'" style="width:'.$label_width.'em;">'.strip_tags($value['description']).'</span>
							</h2>
						</section>
					</a>';
				}
				else {
					if($count_2 == 0) echo '</section><section id="moreArticles">'; $count_2++;
					echo '
					<a href="/talent/'.$key.'/" class="nostyle">
						<div>
							<h4>'.$value['title'].'<span class="label '.$label_color.'" style="width:'.$label_width.'em;">'.strip_tags($value['description']).'</span></h4>
							<img src="/images/content/pages/about-'.str_replace('/','',$key).'.jpg" alt="'.$value[1].'">
							<p><em>'.preg_replace('/\s+?(\S+)?$/', '', substr(strip_tags($value['profile']), 0, 190)).'...</em></p>
						</div>
					</a>';
				}
				
			}
			echo '</section>';
	
	
		?>
		
		
		
	</article>
		
		

	<section class="thankyou" >
		<hr />
		<h1>Thank You, Artists</h1>
		<p>Everyone on this list has made a huge impact on what ArtSocket has become over the years. Their artwork, photography and stories have moved thousands of people from over one hundred and fivty countries around the world.</p>
	
		<p class="center"><a href="/mag/" class="nostyle contentButton animateAll darkGrey" style="width:19em;">Read Gallery Magazine</a></p>

	
		<p class="center"><a href="/submit/"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" width="44" height="44" viewBox="0 0 44 44" xml:space="preserve" class="animateAllFast"><path d="M39.1 7.7L19.2 27.7l-2.6-0.2 -0.2-2.6L36.3 4.9l-1.4-1.4L14.4 23.9l-1.4 7.1 7.1-1.4L40.7 9 40.6 9.2 39.1 7.7zM35 20c-0.6 0-1 0.4-1 1v21H2v-32h21c0.6 0 1-0.4 1-1 0-0.6-0.4-1-1-1H2c-1.1 0-2 0.9-2 2v32c0 1.1 0.9 2 2 2h32c1.1 0 2-0.9 2-2v-21C36 20.5 35.6 20 35 20zM43.4 3.5l-2.9-2.9c-0.8-0.8-2.1-0.8-2.9 0l-1.4 1.4 5.7 5.7 1.4-1.4C44.2 5.5 44.2 4.2 43.4 3.5z"></path></svg>Become an ArtSocket artist</a><small>Fair royalties and dedicated viewership on an exclusive, quality publishing platform.</small></p>
	</section>
</main>
<?php

	ob_end_flush();
	$script = "exploreListCare();";
	include('../snippets/footer.php');
?>