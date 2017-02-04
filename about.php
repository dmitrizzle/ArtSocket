<?php
    $title = 'Independent Art Gallery, Focus on Analog Photography';
    $description = 'Curated works by independent artists & photographers, sold as quality prints.';
    $meta_image = '/images/content/pages/about_header-160916.jpg';
    $css = '
	/* HEADER LINK COLORING */
	body > header nav a.aboutButton {
		color: #ff5a96;
		font-weight: 700;
		background: #000;
	}
	
	main { padding-bottom: 0; }
	

	main > header small { font-weight: 700; opacity: .5}
	main > header section small.white { color: #999 }

	.animateAllSlow {
		-webkit-transition: all 1000ms;
		-moz-transition: all 1000ms;
		transition: all 1000ms;
	}




	main > header section strong {
		background: rgba(44, 44, 44, .05);
		padding: .15em .25em;
		border-radius: .15em;
	}
	
	.headerImage {
		width: .75em;
		border-radius: .15em;
		margin-right: .25em;
		-moz-transform: scale(0,0);
		-webkit-transform: scale(0,0);
		transform: scale(0,0);
	}
	@media only screen and (max-width:375px) {
		.headerImage { margin-right: 0; }
	}
	
	
	.headerImage.loaded {
		-moz-transform: scale(1,1);
		-webkit-transform: scale(1,1);
		transform: scale(1,1);
	}
	
	
	main > header h1 { opacity: 0; }
	main > header h1.loaded { opacity: 1; }
	
	
	
	
	@media only screen and (max-width:510px) {
		a.startHere { display: none; }
	}	
	main {
		overflow-x: hidden;
	}
	
	
	
	
	
	
	
	
	
	main section.art h2 svg, main section.mag h2 svg {
		height: .75em;
		width: .75em;
		margin: 0;
	}
	
	main .printCorners {
		min-height: 30vw;
		margin-top: -14em;
		max-width: 100%;
		padding: .875em .4375em .4375em;
		background-image: url(/images/content/pages/about-artHeader-v2.jpg);
		background-size: 100%;
		background-repeat: no-repeat;
		background-position: bottom;
    }
    #aboutPrints p { background: 0 0 }
    
    
    @media only screen and (max-width: 640px){ main .printCorners { margin-top: -6em; } }
	
	
	
	
	
	
	main ul.team { text-align: center; }
	main ul.team li {
		padding: .5em;
		display: inline-block;
		float: none;
	}
	main ul.team li img {
		width: 5em;
		border-radius: 5em;
		border: 1px solid #2c2c2c;
	}
	main ul.team li strong { display: block; }
	
	#aboutPrints > figure { margin-bottom: 0; }
	@media only screen and (max-width: 800px){ #aboutPrints > h2 { padding: 1em 0 1.5em; } }
	
	main section.reviews {
		position: relative;
		max-width: 42em;
		padding-top: 1.5em;
	}
	body.figurePreview main section.reviews {
		background: #000;
	}
	main section.reviews blockquote {
		-webkit-backdrop-filter: blur(.5em);
		backdrop-filter: blur(.5em);
	}
	main section.reviews blockquote cite yellow { text-shadow: 0 0 .05em #000; }
	main section.reviews blockquote p { padding-bottom: 1.5em; }
	#moreReviews { display: none; padding: 0; }
	
	.loadMore {
		background: #fff;
	}
	.loadMore .contentButton {
		width: 23em;
		max-width: calc(100vw - 5em);
		display: block;
		margin: 0 auto;
	}

	
	
	
	
	
	main a.moreLink {
		display: block;
		width: 7em;
		text-align: center;
		margin: 0 auto 3em;
	}
	
	
	main a.contentButton.visitGallery { width: 19em; }	
	
	
	.smallGif {
		margin: 0 auto;
		display: block;
		border-radius: .333em;
		max-width: 100%;
		width: 300px;
	}
	
	';
	


	// $light_header = true;
    include('snippets/header.php');
    ob_start('simpleComress');
    
    include('snippets/image-db.php');
    $svg_store = '<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" width="40" height="44" viewBox="0 0 40 44" xml:space="preserve"><path d="M40 42.9l0 0 -4-32 0 0C35.9 10.4 35.5 10 35 10h-6 -1V8.1c0 0 0-0.1 0-0.1C28 3.6 24.4 0 20 0s-8 3.6-8 8c0 0 0 0 0 0.1V10H14V8.1c0 0 0 0 0-0.1 0-3.3 2.7-6 6-6s6 2.7 6 6C26 8 26 8 26 8.1V10H14v4.2c1.2 0.4 2 1.5 2 2.8 0 1.7-1.3 3-3 3s-3-1.3-3-3c0-1.3 0.8-2.4 2-2.8V10h-1H5c-0.5 0-0.9 0.4-1 0.9l0 0 -4 32 0 0C0 42.9 0 43 0 43c0 0.6 0.4 1 1 1h38c0.6 0 1-0.4 1-1C40 43 40 42.9 40 42.9zM27 20c-1.7 0-3-1.3-3-3 0-1.3 0.8-2.4 2-2.8V11h2v3.2c1.2 0.4 2 1.5 2 2.8C30 18.6 28.7 20 27 20z"/></svg>';
    
    $svg_talent = '<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" width="44" height="32" viewBox="0 0 44 32" xml:space="preserve" style="width: 1.75em;"><path d="M31.9 22.1C27.3 19.6 26 20 26 18c0-5.8 2-4.2 2-10 0-8-5.1-8-6-8v2C25.5 2 26 6 26 8c0 2.4-0.4 3.2-0.8 4.1C24.6 13.3 24 14.7 24 18c0 2.7 1.8 3.4 3.6 4.2 0.9 0.4 1.9 0.9 3.4 1.6 3.3 1.8 4.6 2.5 5 6.1h-13.9H8.1c0.3-3.6 1.7-4.4 5-6.1 1.4-0.8 2.5-1.2 3.3-1.6C18.2 21.4 20 20.7 20 18c0-3.3-0.6-4.7-1.2-5.9C18.4 11.2 18 10.4 18 8c0-2 0.5-6 4-6h0.1l0-2c0 0 0 0 0 0H22c0 0 0 0 0 0C21.1 0 16 0 16 8c0 5.8 2 4.2 2 10 0 2-1.3 1.6-5.9 4.1C8.1 24.3 6 25.4 6 32h16 16C38 25.4 35.9 24.3 31.9 22.1zM4.7 23.3c2.8-1 4.3-2.7 4.3-4.7 0-2.2-0.4-3.2-1-4.3 -0.3-0.6-0.5-1-0.5-2.4 0-2.4 0.6-3.3 1-3.6 0.3-0.3 0.7-0.3 0.9-0.3l0.1 0h0.1c1.6 0 2.5 2.1 2.5 3.9 0 1.5-0.2 1.9-0.5 2.5 -0.5 1-0.6 2-0.6 4.2 0 0.8 0.2 1.4 0.5 1.9 0.2-0.1 0.4-0.2 0.6-0.3 0.5-0.3 0.9-0.5 1.2-0.7 -0.1-0.3-0.2-0.6-0.2-0.9 0-3.8 1.1-2.9 1.1-6.7 0-5.8-3.8-5.9-4.5-5.9 0 0 0 0-0.1 0H9.5c0 0-0.1 0-0.1 0 -0.7 0-3.9 0.1-3.9 5.9 0 3.8 1.5 2.8 1.5 6.7 0 1.3-1.6 2.3-3 2.8S0 23.6 0 28h4.5c0.2-0.7 0.4-1.4 0.7-2H2.3C2.8 24.3 3.9 23.5 4.7 23.3zM40 21.4c-1.4-0.5-3-1.5-3-2.8 0-3.8 1.5-2.8 1.5-6.7 0-5.8-3.2-5.9-3.9-5.9 0 0-0.1 0-0.1 0h0c0 0 0 0-0.1 0 -0.7 0-4.5 0.1-4.5 5.9 0 3.8 1.1 2.9 1.1 6.7 0 0.2 0 0.5-0.1 0.7 0.5 0.3 1.1 0.6 1.8 0.9 0.2-0.5 0.3-1 0.3-1.6 0-2.2-0.1-3.2-0.6-4.2 -0.3-0.6-0.5-1-0.5-2.5 0-1.8 0.9-3.9 2.5-3.9h0.1l0.1 0c0.2 0 0.6 0 0.9 0.3 0.4 0.3 1 1.2 1 3.6 0 1.4-0.2 1.8-0.5 2.4 -0.5 1-1 2-1 4.3 0 2 1.5 3.7 4.3 4.7 0.8 0.3 1.9 1 2.4 2.7h-2.7c0.2 0.6 0.4 1.3 0.6 2h4.3C44 23.6 41.4 21.9 40 21.4z"></path></svg>';
    
    $featured_slides = 0;
    foreach($slides as $value) {
		if(!isset($value[6]) || $value[6] !== false ){
			$featured_slides ++;
		}
	}
	
?>
	<main>
		<header class="white scrollButton<?php if(!$blur_headers) echo ' loadingContainer'; ?>" <?php if($blur_headers) echo 'style="background-image: url(/images/thumbnails/?blur=2&i='.$meta_image.')"';?>>

			<div>
				<section>
					<h1 class="noHyphens"><img src="/design/apple-touch-icon-152x152.png" alt="ArtSocket logo" class="animateAll headerImage" />ArtSocket</h1>
					<p><strong>Independent Art Gallery Online</strong><small class="white">Focus on Analog Photography</small></p>
					<?php echo $scroll_button_html; ?>
				</section>
			</div>
			<img src="<?php echo $meta_image; ?>" alt="ArtSocket prints" />
		</header>
		
		<article>
			<section id="aboutTeam">
				<ul class="nostyle team">
					<li><a href="/talent/dmitrizzle/" class="nostyle" title="dmitrizzle, ArtSocket owner"><img src="/images/content/pages/about-dmitrizzle.jpg" alt="dmitrizzle" /></a><strong><a href="/talent/dmitrizzle/">Dmitri</a></strong></li>
					<li><a href="/talent/betty-dai/" class="nostyle" title="Betty Dai, creative consultant and photographer"><img src="/images/content/pages/about-betty-dai.jpg" alt="Betty Dai" /></a><strong><a href="/talent/betty-dai/">Betty</a></strong></li>
					<li><a href="/talent/olga-tcherbadji/" class="nostyle" title="Olga Tcherbadji, creative consultant and artist"><img src="/images/content/pages/about-olga-tcherbadji.jpg" alt="Olga Tcherbadji" /></a><strong><a href="/talent/olga-tcherbadji/">Olga</a></strong></li>
					<li><a href="/talent/thayanantha-thevanayagam/" class="nostyle" title="Thayanantha Thevanayagam, creative consultant"><img src="/images/content/pages/about-thaya-theva.jpg" alt="Thayanantha Thevanayagam" /></a><strong><a href="/talent/thayanantha-thevanayagam/">Thaya</a></strong></li>
				</ul>				
				
				<p>ArtSocket started as a simple idea to <strong>exhibit and sell art online</strong> by Dmitri: a music, photography and technology-obsessed Russian-Canadian. Together with Betty, Olga and Thaya's 80 years of combined creative industry experience he started this website in the fall of 2012. <a href="javascript:void(0)" class="moreLink" data-more="moreTeam"><strong>+ Learn More</strong></a></p>

				
				<div class="more animateAll" id="moreTeam">
					<p>ArtSocket team is made of artists, educators, designers and developers. Our past projects range from prestigious Russian ballet productions to classical animation shorts. Photography assignments at the edge of the world and sketches of strangers on busy streets of Shenyang. Experimenting with miles of film and exotic camera lenses and cutting-edge digital editing techniques. We love, live and breathe art. And we are not alone. <a href="/talent/"><strong>There are now over a dozen artists, photographers and writers working with us</strong></a>.</p>
				
					<p>Our process here is pretty simple. We select the most promising works from independent artists and photographers. Once the submissions have been screened for quality and style we create <em>featured series</em> which stay in our <a href="/art/">main gallery page</a> for about a month at a time. Until we find a new topic and have the artwork to fill it.</p>
					
					<p>All of our previous works can still be found in the <a href="/archive/">archive</a> section of this website.</p>
				</div>
			</section>

			<section id="aboutPrints">	
				<h2 class="center noHyphens">Our Product: Premium Prints</h2>
				<p><strong>Every print</strong> is created with eco-friendly, archival grade <a href="http://www.hahnemuehle.com/en/digital-fineart/digital-fineart-collection/matt-fineart/p/Product/show/42/286.html" rel="nofollow" target="_blank">Hahnemühle Bamboo</a> paper (very expensive stuff). We've tested an enormous amount of mediums (including canvas, metal and wood) yet this paper has shown the best color gamut for the type of images we print here. <a href="javascript:void(0)" class="moreLink" data-more="morePrints"><strong>+ Learn More</strong></a></p>
				<div class="more animateAll" id="morePrints">
				
					<figure><img src="/images/content/pages/about_printHangingAboveTable.jpg" alt="Film photo print hanging on a wall" /></figure>
					<p><br />The inks are non-toxic gicle&eacute; pigment-type, <a href="/warranty/">guaranteed</a> to last fade-free for one hundred years without fading (no joke).</p>
				 
				 
					<p>Shipping. Prints arrive within two to three weeks of the order. Professionally packaged in a durable shipping tube. Should there be any problems, you can <a href="/return-policy/">return</a> them within 30 days for a full refund.</p>
					<section class="reviews">					
						<blockquote>
							<p>The print is great. I am just now getting it framed. It looks really good. I like it a lot, and will definitely be browsing ArtSocket in the future for more prints. </p>
							<cite>Kevin D Schopp <span class="yellow">★★★★★</span></cite>
						</blockquote>
						<blockquote>
							<p>I received the print and it looks great! The colours came out just as I expected - saturated (in a good way) and true!</p>
							<cite>Reina Shishikura <span class="yellow">★★★★★</span></cite>
						</blockquote>
						<blockquote>
							<p>The prints are hanging in our dining room and getting a lot of comments from visitors!</p>
							<cite>Marcin Szablewski <span class="yellow">★★★★★</span></cite>
						</blockquote>
						<blockquote>
							<p>The prints arrived in a nice tube — really no problem at all. Print quality and stock appear to be of high quality.</p>
							<cite>Frank Russo <span class="yellow">★★★★★</span></cite>
						</blockquote>
						<blockquote>
							<p>I'm enjoying the prints, thanks very much!</p>
							<cite>John Piercy <span class="yellow">★★★★★</span></cite>
						</blockquote>
					</section>
				
				</div>				
			</section>
			
			<p class="printCorners"></p>
			<section class="loadingContainer" id="exploreList"></section>
		</article>
		

		<?php echo $gallery_subfooter_html; ?>
	</main>

<?php 

	ob_end_flush();
	$script = "
	
		
			
			
			
			
	
	
	
	
		$$('main > header h1').addClass('loaded');
		
		// load header logo
		var headerLogoImage = $$('.headerImage');
		Asset.image(headerLogoImage[0].get('src'), { onLoad: function(){
			headerLogoImage[0].addClass('loaded');
		}});
			
		
		// explore sections
		function exploreSegment(section){
			new Request.HTML({ 
				url: '/'+section+'/?ajax_request=true',
				filter: 'a',
				onSuccess: function(tree, elements, html){
					$('exploreList').removeClass('loadingContainer').set('html', html);
				
					/*
					var count = 0;
					elements.each(function(el){
						if(el.get('data-background-image') !== null){
							el.inject($$('.exploreSection')[0]);
							count++;
						}
					});
					*/
					
					(function(){
						exploreListCare();
						$$('.exhibitName').set('html', $$('.seriesName')[0].get('html'));
						
						var artPosition = $('exploreList').getPosition().y;
						var artHistoryCount = 0;
						var aboutHistoryCount = 0;
						window.addEvent('resize', function(){ artPosition = $('exploreList').getPosition().y; });
						window.addEvent('scroll', function(){
							if(window.getScroll().y > artPosition){
								if(!artHistoryCount){
									historyGo('/art/', {returnAction: function(){ scrl.start(0, artPosition); }});
									localStorage.setItem('last_url', '/' + (window.location.href).replace(urlDomain,'').split('/')[1] + '/');
									artHistoryCount++;
									(function(){ aboutHistoryCount = 0; }).delay(3000);
									
									$$('body > header nav a.homeButton').setStyles({
										'color': '#ff5a96',
										'font-weight': '700',
										'background': '#000'
									});
									$$('body > header nav a.homeButton svg path').setStyle('fill', '#ff5a96');
									$$('body > header nav a.aboutButton').setStyles({
										'color': '#fff',
										'font-weight': '400',
										'background-color': 'rgba(44, 44, 44, .65)'
									});
								}
							}
							else {
								if(!aboutHistoryCount){
									historyGo('/about/', {returnAction: function(){ scrl.start(0, 0); }});
									localStorage.setItem('last_url', '/' + (window.location.href).replace(urlDomain,'').split('/')[1] + '/');
									aboutHistoryCount++;
									(function(){ artHistoryCount = 0; }).delay(3000);
									
									$$('body > header nav a.homeButton').setStyles({
										'color': '#2c2c2c',
										'font-weight': '400',
										'background': '0 0'
									});
									$$('body > header nav a.homeButton svg path').setStyle('fill', '');
									$$('body > header nav a.aboutButton').setStyles({
										'color': '#ff5a96',
										'font-weight': '700',
										'background-color': '#000'
									});
								}
							}
						});
						
					}).delay(100);
				}
			}).send();
		}
		window.addEvent('domready', function(){
			exploreSegment('art');
		});
		
		
		
		
		
		
					
		
	"; 
	$mini_footer = true;
	include('snippets/footer.php');
?>