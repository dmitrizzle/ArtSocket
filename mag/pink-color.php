<?php
	
	
	
	$intro = '
				<p>My mom said that when I was a baby, yellow was my favorite color. I don\'t remember any of that. But I do remember very vividly that pink was the first color to make an impression on me as a child. It took me a few tries to remember how to say it Russian (<em>&#1088;&#1086;&#1079;&#1086;&#1074;&#1099;&#1081;, rozoviy)</em> while growing up in Moscow with my grandpa. It was a big rosy bar of pink soap that made bubbles. The sight of it is still fresh in my memory as if it was yesterday.</p>
		<p>Later in life pink started to get weird meanings. Here in the West we associate it with sexual deviance when used by men or femininity when used by women. In Russia, pink is associated with homosexuality when used by girls. Baby-blue is gay when used by boys. Long story short, I stopped liking the color because I did not want to identify myself as a homosexual or transgendered. It\'s kind of sad that such a nice color has to fall out of people\'s pallets because of some nasty social stigma. So why are we giving so much meaning to something one shade lighter than red?</p>
		<p>Colors are not passive. They can stimulate us or calm us down. They have meanings - both social and innate. They can literally change the way we think and act. In the 1960s an American <a href="http://en.wikipedia.org/wiki/Baker-Miller_Pink" target="_blank" rel="nofollow">researcher</a> Alexander Schauss noticed that his patients showed a shift in the hue of their preference, depending on their mood. Naturally, he wondered whether the reverse was true: can a color influence our mood? Numerous experiments later, Schauss was able to determine that in fact it could. A particular shade of pink, filed as <em>P-618</em> had the greatest effect. It considerably slowed the heart rate, pulse and respiration of the test subjects. In a few years that followed he was successful in persuading correctional institution directors to paint a few of the prison cells in that particular shade to analyze the effects. The results were (amazingly!) positive: inmates behaved in a <a href="http://adamalterauthor.com/book/" target="_blank" rel="nofollow">calmer</a> manner. Those directors\' names were Baker and Miller, hence <em>Baker-Miller Pink</em> (or <em>Drunk Tank Pink</em>).</p>';
	
	
	
	
  $title = 'Pink (Interative Article)';
  $body_title = '<span class="red">Pink</span>';
  $permalink_url = 'pink-color';
	$banner_image = '/images/content/mag/'.$permalink_url.'_header.jpg';
	//$banner_image = '/design/blank.gif';
  
  $description = 'An interactive article with descriptions, history and color codes of all documented shades of pink. Plus a background behind our cultural and physiological associations with the color.';
  $author = 'dmitrizzle';
  
  $datetime = '2014-12-04';
  $skip_author = true;
  
  
  
  $css = '
  	body > header.light { box-shadow: none; }
  	body > header.light nav ul, body > header.light div nav .logoButton { background: 0 0 !important }
  	
  	
  	main > header {
  		background-image: url(/images/thumbnails/?blur=2&i=https://www.artsocket.com/images/art/L_TurquoiseDouble.jpg);
  		background-size: cover;
    	background-repeat: no-repeat;
  		overflow-x: hidden;
  		/* min-height: 680px; */
  		height: auto;
  		cursor: default;
  	}
  	main > header > div {
  		background: #2c2c2c;
  		background: rgba(44, 44, 44, 0.8);
  		min-height: 100vh;
  		height: auto;
  		position: relative;
  	}
  	#appContainer {
		margin: 0 auto;
	}
	main > header section { position: static; }
	main > header article {
		background: transparent;
		position: relative;
		padding: 3em 0 2em 3em;
		display: inline-block;
		margin-left: 360px;
		width: 100%;
		text-align: left;
		opacity: 0;
		height: auto;
	}
	#articleTitle {
		padding: 0 .36em .5em;
		margin-top: 11%;
		margin-left: 0;
	}
	#wheelHow { padding: 0 1.5em 1.5em; margin-left: 0; text-align: center; }
	#wheelHow a { background: #3d3d3d; }
	
	.pointerHand:before {
		content: "\261C\0020";
	}
	.gLocation:before {
		content: "on the left";
	}
	
	
	#aboutShade {
		overflow-y: scroll;
		-webkit-overflow-scrolling: touch;
		height: 100%;
		display: none;
		
		padding-top: 0;
		text-align: left;
		box-shadow: none;
		padding: .5em;
		margin-top: 1em;
		margin-left: 1.25em;
		
		background: transparent;
		color: #fff;
		
		-webkit-transform: translate(0, 0);
		-moz-transform: translate(0, 0);
		transform: translate(0, 0);
		
		-webkit-backdrop-filter: none;
		backdrop-filter: none;
	}
	#aboutShade p:last-child { padding-bottom: 20em; }
	
	#aboutShade p {
		background: transparent;
		margin-left: 0;
		max-width: 42em;
		padding: 0 0 3em;
		color: #fff;
		opacity: 1;
		-webkit-clip-path: none;
		clip-path: none;
	}
	#aboutShade p:before, #aboutShade p:after { display: none; }
	#aboutShade h3, aside.shadeInfo h3 { position: relative; }
	#aboutShade h3 { margin-left: 0; }
	#aboutShade a { background: rgba(255, 255, 255, 0.05); }
	
	
	h3 strong.hexLabel {
		display: inline-block;
		cursor: pointer;
		position: absolute;
		bottom: 1em;
		margin-left: .5em;
		padding: .5em;
		font-size: .5em;
		line-height: 1em;
		font-weight: 400;
		border-radius: 3px;
	}
	main aside.shadeInfo { display: none; }
	main aside.shadeInfo section:first-child,
	main > article > section.mainArticle {
		padding-top: 3em;
	}
	
	#pinkWheel {
		position: absolute;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		padding: 3.5em 0 1.5em 1.5em;
		
	}
	#pinkWheel > svg {
		height: 100%;
		overflow: visible !important;
		
		-webkit-transform: scale(0,0) rotate(-33deg);
		-moz-transform: scale(0,0) rotate(-33deg);
		transform: scale(0,0) rotate(-33deg);
		
		cursor: pointer;
	}
	
	.articleDetails {
		padding: 0;
		margin: -1.75em .5em 0;
		position: relative;
		z-index: 3;
		text-align: right;
		max-width: 100%;
	}
	.articleDetails a { font-weight: 400; }
	
	@media only screen and (max-width: 1024px){
		#pinkWheel {
			max-height: 22.5em;
		}
	}
	
	@media only screen and (max-width: 830px){
		main > header {  }
		#articleTitle { margin: 0; }
		#articleTitle {
			padding: 1.5em 0 0 .36em;
		}
		
		#appContainer {
			height: auto;
			position: relative;
		}
		
		
		#pinkWheel {
			padding: 1.5em 0px 0 1.5em;
			height: 20em;
			z-index: 2;
			position: relative;
		}
		main > header article {
			padding: 2.5em 0 .5em;
			margin-left: 0;
			overflow-y: auto;
		}
		.pointerHand:before {
			content: "\261D\0020";
		}
		.gLocation:before {
			content: "at the top";
		}
		#aboutShade {
			-webkit-overflow-scrolling: touch;
			height: 100%;
			display: none;
			padding-top: 0;
			text-align: left;
			padding: .5em;
			margin-top: 1em;
			margin-left: 1.25em;
			background: transparent;
			color: #fff;
			bottom: initial;
			top: 0;
			-webkit-transform: translate(0, 0);
			-moz-transform: translate(0, 0);
			transform: translate(0, 0);
			width: calc(100vw - 3.5em);
		}
		#aboutShade p:last-child { padding-bottom: 0; }

	}
	
	
	
	p.statsAndShare { color: #fff; }
	p.statsAndShare a { background: rgba(255, 255, 255, 0.05); }
	
	p.statsAndShare > a.social svg path, p.statsAndShare > a.active.social svg path { fill: #fff; }
	
	
	
	';
	$noscript_css = '.shadeInfo { display: block !important; }';
	
	$special_header = '
			<header class="noFigurePreview">
				<div>
				<div class="loadingContainer" id="appContainer">
					<div id="pinkWheel"></div>
					<article>
						<h1 class="noHyphens white" id="articleTitle">'.$body_title.'</h1>
						<p class="white" id="wheelHow"><strong><a href="javaScript:read(\'pinkStory\');">Read the article</a></strong> | <a href="javascript:void(0);" class="showHideAllColors">List all shades</a></p>
						<div id="shareSocial" class="center"></div>
						<section id="aboutShade" class="white"></section>
					</article>
				</div>
				</div>
			</header>';
  	include_once('mag-header.php');
  	
  	// <strong>Click</strong> the color wheel <span class="gLocation"></sapn><br /><br />
    
  
  $article_details = '<small class="white articleDetails"><time datetime="'.$datetime.'" itemprop="datePublished"><!-- '.$datetime_human.'</time> | <a href="'.$domain.'/mag/'.$permalink_url.'/#disqus_thread" class="commentsLink">comments</a> | -->  Background: <a href="/art/sakura/" class="shareLinkScroll">"Sakura" by Chi<span class="shareArrow">&rarr;</span></a></small>';
  
?>
<script>var wDeselect; var pSEl; var scAlrdy; var shareHTML = '<p class="statsAndShare"><?php echo $share_html; ?></p>';</script>
<?php echo $article_details; ?>
<aside class="shadeInfo" id="identifierMagPink">
	<section id="hex-FFDDF4">
		<h3>Pink Lace</h3>
		<p>A <a href="http://en.wikipedia.org/wiki/Shades_of_pink#Pink_lace" target="_blank" rel="nofollow">supposedly</a> suggestive color for the women's lingerie. This is the lightest hue in the palette. And although it's for panties, it feels very innocent and inoffensive.</p> 
		<p>It's also in use since 2001 by the <a href="http://xona.com" target="_blank" rel="nofollow">Xona</a> Color List. Xona is a retro computer game studio.</p>
	</section>
	
	
	<section id="hex-FDDDE6">
		<h3>Piggy Pink</h3>
		<p>This color name sounds so cute! No wonder a popular art-supply brand chose it, children being their biggest customers.</p>
		<p>In use since 2009. This color appears in the Crayola catalog of crayon hues, "<a href="http://en.wikipedia.org/wiki/List_of_Crayola_crayon_colors#Standard_colors" target="_blank" rel="nofollow">133 standard colors</a>". This color is only available as a part of their 120-crayon packs.</p>
	</section>
	
	
	<section id="hex-F1DDCF">
		<h3>Champagne Pink</h3>
		<p>In use since (around) the 1960's. This color appears in the <a href="http://www.pantone.com/pages/pantone/colorfinder.aspx" target="_blank" rel="nofollow">Pantone Inc</a> matching system.</p>
	</section>
	
	
	
	
	<section id="hex-F9CCCA">
		<h3>Pale Pink</h3>
		<p>There <a href="http://en.wikipedia.org/wiki/Shades_of_pink#Pale_pink" rel="nofollow" target="_blank">isn't enough</a> information about this color at this time. <a href="/contact/">Help me</a> fix that!</p>
	</section>
	
	
	<section id="hex-F7CAC9">
		<h3>Rose Quartz</h3>
		<p>A color of the year 2016, according to <a href="http://www.pantone.com/color-of-the-year-2016" target="_blank" rel="nofollow">Pantone</a>. Interestingly, <a href="http://qz.com/564450/pantones-new-colors-of-the-year-are-a-nod-to-gender-equality/" rel="nofollow" target="_blank">QZ.com</a> notes this announcement as a nod to gender equality. Pink has always been a hot topic in terms of masculinity and femininity values (as you should have gathered from the <a href="javascript:read('pinkStory');">mini-essay below</a>) - this makes it somewhat official.</p>
	</section>
	
	<section id="hex-F4C2C2">
		<h3>Baby Pink</h3>
		<p>In use since 1948. This color appears in the <a href="https://metacpan.org/pod/Color::Library::Dictionary::NBS_ISCC::P" target="_blank" rel="nofollow">ISCC-NBS Dictionary of Color Names</a>.
	</section>
	
	
	
	
	
	<section id="hex-F2BDCD">
		<h3>Orchid Pink</h3>
		<p>Orchids can of course come in a variety of colors, from purple to white. The intensity and the temperature of this hue does resemble the flower quite well. Also, good name.</p>
		<p>In use since (around) the 1960's. This color appears in the <a href="http://www.pantone.com/pages/pantone/colorfinder.aspx" target="_blank" rel="nofollow">Pantone Inc</a> matching system.</p>
	</section>
	
	
	<section id="hex-EFBBCC">
		<h3>Cameo Pink</h3>
		<p>Apparently a very popular color for <a href="http://www.pinterest.com/SaraBoivin/wedding-study-cameo/" target="_blank" rell="nofollow">wedding</a> themes. All I can think of is cupcakes.</p>
		<p>In use since 1912. This color appears in <em>A Dictionary of Color</em>, McGraw-Hill 1930.</p>
	</section>
	
	
	<section id="hex-F7BFBE">
		<h3>Spanish Pink</h3>
		<p>Little square-ish homes somewhere near palm trees and the sea. It really does remind me of my trip to Mexico about three years ago.</p>
		<p>In use since 2005. This color appears in <em>Gu&iacute;a de coloraciones</em> (<em>Guide to colorations</em>), Rosa Gallego 2005</p>
	</section>
	
	
	<section id="hex-FFC0CB">
		<h3>Web Pink</h3>
		<p>This particular color reminds me of soap. It's also what you should see on your screen if you set any of your text or shapes in HTML to "pink" - no color codes, just the keyword.</p>
		<p>In use since 2000s. This color appears in <a href="http://www.w3.org/TR/css3-color/" target="_blank" rel="nofollow">W3C</a>. W3C is an organization that sets the standards for how our browsers work.</p>
	</section>
	
	
	<section id="hex-FFB7C5">
		<h3>Cherry Blossom Pink</h3>
		<p>The Japanese love cherry blossoms. <em>Hanami</em> (&#33457;&#35211;, lit. "flower viewing") is the time of the year when garden picnic spots are booked months in advance. Also the busiest and most expensive time of the year to visit that country. Why? The movement, the aura of countless petals floating down to the ground are mesmerizing. It really is worth it.</p>
		<p>In use since 1867. This color appears in <em>A Dictionary of Color</em>, McGraw-Hill 1930.</p>
	</section>
	
	
	<section id="hex-FFB6C1">
		<h3>Light Pink (Web)</h3>
		<p>This is the color that the browsers will display when you set the CSS style of any element to "lightpink". <em>Although this color is called "light pink", as can be ascertained by inspecting its hex code, it is actually a slightly deeper, not a lighter, tint of pink than the color pink itself. A more accurate name for it in terms of traditional color nomenclature would therefore be medium light pink.</em> - <a href="http://en.wikipedia.org/wiki/Shades_of_pink#Light_pink" target="_blank" rel="nofollow">Wikipedia</a>.</p>
		<p>In use since 2000s. This color appears in <a href="http://www.w3.org/TR/css3-color/" target="_blank" rel="nofollow">W3C</a>. W3C is an organization that sets the standards for how our browsers work.</p>
	</section>
	
	
	<section id="hex-E8CCD7">
		<h3>Queen Pink</h3>
		<p>Can't tell whether it's the naming or actually the color, but it feels very fancy. Almost like this color costs more than the rest.</p>
		<p>In use since 1948. This color appears in <a href="http://www.plochere.com" target="_blank" rel="nofollow">Plochere</a> color system.</p>
	</section>
	
	
	<section id="hex-FFBCD9">
		<h3>Cotton Candy</h3>
		<p>Can you feel the sugar granules grinding against the gums? This is yet another standard color shade & name, developed by American art supply company - Crayola.</p>
		<p>In use since 2009. This color appears in the Crayola catalog of crayon hues, "<a href="http://en.wikipedia.org/wiki/List_of_Crayola_crayon_colors#Standard_colors" target="_blank" rel="nofollow">133 standard colors</a>". This color is only available as a part of their 120-crayon packs.</p>
	</section>
	
	
	<section id="hex-FFB3DE">
		<h3>Light Hot Pink</h3>
		<p>In use since 2001. This color appears in the <a href="http://xona.com" target="_blank" rel="nofollow">Xona</a> Color List. Xona is a retro computer game studio.</p>
	</section>
	
	
	<section id="hex-FBAED2">
		<h3>Lavender Pink</h3>
		<p>Lavender... sounds so delicate. Yet I can totally see this color being used for stark contrasts, even naughty content on the internet.</p>
		<p>In use since 2009. This color appears in the Crayola catalog of crayon hues, "<a href="http://en.wikipedia.org/wiki/List_of_Crayola_crayon_colors#Standard_colors" target="_blank" rel="nofollow">133 standard colors</a>". This color is only available as a part of their 64+ crayon packs.</p>
	</section>
	
	
	<section id="hex-FFA6C9">
		<h3>Carnation Pink</h3>
		<p>Most carnations I've seen come in shades darker than this, but I'm not the one who named this. So it shall remain.</p>
		<p>In use since 1535 (<em>A Dictionary of Color</em>, 1930). This color appears in the Crayola catalog of crayon hues, "<a href="http://en.wikipedia.org/wiki/List_of_Crayola_crayon_colors#Standard_colors" target="_blank" rel="nofollow">133 standard colors</a>". This color is only available as a part of their 16+ crayon packs.</p>
	</section>
	
	
	<section id="hex-D8B2D1">
		<h3>Pink Lavender</h3>
		<p>Not the same as <em>Lavender Pink</em> (that's two shades lighter on the color wheel) as it was developed by a different color system.</p>
		<p>In use since (around) the 1960's. This color appears in the <a href="http://www.pantone.com/pages/pantone/colorfinder.aspx" target="_blank" rel="nofollow">Pantone Inc</a> matching system.</p>
	</section>
	
	
	<section id="hex-F19CBB">
		<h3>Amaranth Pink</h3>
		<p><a href="https://en.wikipedia.org/wiki/Amaranth" rel="nofollow" target="_blank">Amaranth</a> is an interesting flowering plant.</p>
		<p>In use since 1905. This color appears in <em>A Dictionary of Color</em>, McGraw-Hill 1930.</p>
	</section>
	
	
	<section id="hex-DEA5A4">
		<h3>Pastel Pink</h3>
		<p>As defined at <a href="https://metacpan.org/pod/Color::Library::Dictionary::NBS_ISCC::P" target="_blank" rel="nofollow">ISCC-NBS Dictionary of Color Names</a>. A slightly darker, less saturated hue of pink that naturally seems to have been drawn with a pencil.</p>
	</section>
	
	
	<section id="hex-C4AEAD">
		<h3>Silver Pink</h3>
		<p>Polorche color system seems to add a bit of green to a lot of their pink hues. Non the less, this swatch does have a feel of being sparkly and metallic.</p>
		<p>In use since 1948. This color appears in <a href="http://www.plochere.com" target="_blank" rel="nofollow">Plochere</a> color system.</p>
	</section>
	
	
	<section id="hex-FF91AF">
		<h3>Baker-Miller Pink</h3>
		<p>This particular shade has interesting history. It got its name from Naval correctional institute directors: Baker and Miller. Apparently, they are the people who allowed Alexander Schauss to design an experiment on their inmates to see if the color could have a positive effect on their behavior. And it <a href="http://en.wikipedia.org/wiki/Baker-Miller_Pink" rel="nofollow" target="_blank">did</a>.</p>
		<p>Back in the 60's, Schauss was studying the effects of various colors on our moods. He discovered that color preferences of his patients shifted, depending on their psychological state. He then wondered if the reverse was true: could the colors influence our behaviour? Very much so. Particularly this shade of pink (catalogd as <em>P-618</em>) had a very strong slowing <a href="http://www.orthomolecular.org/library/jom/1988/pdf/1988-v03n04-p202.pdf" rel="nofollow" target="_blank">effect</a> on heart rate, pulse and respiration.</p>
		<p>There is even a <a href="http://adamalterauthor.com/book/" rel="nofollow" target"_blank">book</a>, <em>Drunk Tank Pink</em> that depicts the unexpectedly strong effects of this color on human psychology.</p>
	</section>
	
	
	<section id="hex-FC89AC">
		<h3>Tickle Me Pink</h3>
		<p>In English <em>tickled pink</em> is an idiom that means extremely pleased. Personally I hate being tickled. The color is alright.</p>
		<p>In use since 2009. This color appears in the Crayola catalog of crayon hues, "<a href="http://en.wikipedia.org/wiki/List_of_Crayola_crayon_colors#Standard_colors" target="_blank" rel="nofollow">133 standard colors</a>". This color is only available as a part of their 96+ crayon packs.</p>
	</section>
	
	<section id="hex-F88379">
		<h3>Congo Pink</h3>
		<p>In use since 1912 (<em>A Dictionary of Color</em>, 1930). This color appears in the <a href="https://metacpan.org/pod/Color::Library::Dictionary::NBS_ISCC::P" target="_blank" rel="nofollow">ISCC-NBS Dictionary of Color Names</a>.</p>
	</section>
	
	
	<section id="hex-FF6FFF">
		<h3>Ultra Pink</h3>
		<p>This color is very, very pink. At least according to Crayola. They've also toyed with the "shocking pink" name, but it is already reserved by Elsa Schiaparelli, an Italian fashion designer.</p>
		<p>In use since 2009. This color appears in the Crayola catalog of crayon hues, "<a href="http://en.wikipedia.org/wiki/List_of_Crayola_crayon_colors#Standard_colors" target="_blank" rel="nofollow">133 standard colors</a>". This color is only available as a part of their 72+ crayon packs.</p>
	</section>
	
	
	<section id="hex-F77FBE">
		<h3>Persian Pink</h3>
		<p>An incredibly popular hue in Persia (Iran), especially in women's fashion.</p>
		<p>In use since 1923. This color appears in <em>A Dictionary of Color</em>, McGraw-Hill 1930.</p>
	</section>
	
	
	<section id="hex-E68FAC">
		<h3>Charm Pink</h3>
		<p>This hue is the pink walls in little girls' rooms. Can't say that I'm charmed. It reminds me of wasted weekends working in suburbs, painting huge, boring houses.</p>
		<p>In use since 1948. This color appears in the <a href="https://metacpan.org/pod/Color::Library::Dictionary::NBS_ISCC::P" target="_blank" rel="nofollow">ISCC-NBS Dictionary of Color Names</a>.
	</section>
	
	
	<section id="hex-FF69B4">
		<h3>Hot Pink (Web)</h3>
		<p>This is the color that the browsers will display when you set the CSS style of any text or shape in HTML to "hotpink". No color codes, just the keyword.</p>
		<p>In use since 2000s. This color appears in <a href="http://www.w3.org/TR/css3-color/" target="_blank" rel="nofollow">W3C</a>. W3C is an organization that sets the standards for how our browsers work.</p>
	</section>
	
	
	<section id="hex-FF5CCD">
		<h3>Light Deep Pink</h3>
		<p>In use since 2001. This color appears in the <a href="http://xona.com" target="_blank" rel="nofollow">Xona</a> Color List. Xona is a retro computer game studio.</p>
	</section>
	
	
	<section id="hex-FD6C9E">
		<h3>French (Rose) Pink</h3>
		<p>A "true" pink according to <a href="http://pourpre.com/chroma/dico.php?typ=teinte&ent=340" target="_blank" rel="nofollow">Pourpre</a> - a popular French color list.</p>
	</section>
	
	
	<section id="hex-ff5a96">
		<h3>ArtSocket Pink</h3>
		<p>Up until very recent, the main brand color on this website and the top two squares in the ArtSocket logo were pure red (<strong>#F00</strong>). They were meant to signify the stark beauty of the art that gets to be selected out of thousands. The color also meant to represent the rebellious nater of my personality and some of the rules I set for this community. However, there were some issues with it.</p>
		<p>Computers are notoriously bad at <a href="http://www.ou.edu/class/digitalmedia/articles/CompressionMethods_Gif_Jpeg_PNG.html" target="_blank" rel="nofollow">compressing red hues</a>, which means that a lot of the images, including the logo itself looked "dirty" when shared on social networks. With time I also realised that the color gave the website an unsettling vibe. Red is often used in supermarkets in order to pursue the customers' excitement, forcing them to buy more. Although I do want as many people as possible to <a href="/">buy stuff here</a>, in reality I'd like everyone to feel at ease instead.</p>
		<p>This december I spent a few days picking the right hue to replace the red. The goal was to keep the starkness and the meaning intact, while avoiding the problems mentioned above. The result is <strong class="red">ArtSocket Pink</strong>, a color that fulfills all of those requirements quite well. The shade gives away a posh, expensive and hip vibe. At least that's what I feel like it does.
	</section>
	
	
	<section id="hex-FB607F">
		<h3>Pink Sherbert</h3>
		<p>Formerly known as <em>Brink Pink</em>.</p>
		<p>In use since 2009. This color appears in the Crayola catalog of crayon hues, "<a href="http://en.wikipedia.org/wiki/List_of_Crayola_crayon_colors#Standard_colors" target="_blank" rel="nofollow">133 standard colors</a>". This color is only available as a part of their 120-crayon packs.</p>
	</section>
	
	
	
	<section id="hex-E4717A">
		<h3>Tango Pink</h3>
		<p>This color reminds me of my godparents who, once a year, invited all their friends and relatives to dance in their living room to old records.</p>
		<p>In use since 1925 (<em>A Dictionary of Color</em>, 1930). This color appears in the <a href="https://metacpan.org/pod/Color::Library::Dictionary::NBS_ISCC::P" target="_blank" rel="nofollow">ISCC-NBS Dictionary of Color Names</a>.
	</section>
	
	
	<section id="hex-D7837F">
		<h3>New York Pink</h3>
		<p>Dusty fluorescent store lights and <a href="http://www.lvled.net/wp-content/uploads/2012/05/2012-05-07_00002.jpg" rel="nofollow" target="_blank">Max Payne</a>. That's what I think of when I see this color.</p>
		<p>In use since 2001. This color appears in the <a href="http://xona.com" target="_blank" rel="nofollow">Xona</a> Color List. Xona is a retro computer game studio.</p>
	</section>
	
	
	<section id="hex-DE6FA1">
		<h3>China Pink</h3>
		<p>Delicate porcelain teacups with golden rims and thin handles. Not the country. Traditionally Chinese would just use red.</p>
		<p>In use since 1948. This color appears in the <a href="https://metacpan.org/pod/Color::Library::Dictionary::NBS_ISCC::P" target="_blank" rel="nofollow">ISCC-NBS Dictionary of Color Names</a>.
	</section>
	
	<section id="hex-FC0FC0">
		<h3>Shocking Pink</h3>
		<p>This is a very intense color. On purpose, as it was used in design of the 1930's perfume by <a href="http://en.wikipedia.org/wiki/Elsa_Schiaparelli" rel="nofollow" target="_blank">Elsa Schiaparelli</a> that was featured in a shape of a woman's bust. No nipples, but obscene by the time's standards.</p>
	</section>
	
	
	<section id="hex-FF1493">
		<h3>Deep Pink (Web)</h3>
		<p>This is the color that the browsers will display when you set the CSS style of any text or shape to "deeppink" - no color codes, just the keyword.</p>
		<p>In use since 2000s. This color appears in <a href="http://www.w3.org/TR/css3-color/" target="_blank" rel="nofollow">W3C</a>. W3C is an organization that sets the standards for how our browsers work.</p>
	</section>
	
		
	<section id="hex-E0218A">
		<h3>Barbie Pink</h3>
		<p>This palette would be incomplete without including this famous girls' toy. This color is used in all of the logos, packaging and promotional materials of the company throughout.</p>
	</section>
	
	
	<section id="hex-D74894">
		<h3>Pink U</h3>
		<p>A "true" pink color according to Pantone color system. A little too stark for my eyes but it's not my choice. It's Pantone's.</p>
		<p>In use since (around) the 1960's. This color appears in the <a href="http://www.pantone.com/pages/pantone/colorfinder.aspx" target="_blank" rel="nofollow">Pantone Inc</a> matching system.</p>
	</section>
	
	
	<section id="hex-CF6BA9">
		<h3>Super Pink</h3>
		<p><a href="http://knowyourmeme.com/memes/doge" target="_blank" rel="nofollow">V&#9675;&#7461;&#9675;V</a></p>
		<p>In use since (around) the 1960's. This color appears in the <a href="http://www.pantone.com/pages/pantone/colorfinder.aspx" target="_blank" rel="nofollow">Pantone Inc</a> matching system.</p>
	</section>
	
	
	<section id="hex-DE5285">
		<h3>Fandango Pink</h3>
		<p>A medium-strength hue with a bit of a fruity feel. Fandango is a Spanish pair dance, as depicted in <a href="https://www.youtube.com/watch?v=N2gFXGncf9A" rel="nofollow" target="_blank">this</a> ridiculous video.</p>
		<p>In use since (around) the 1960's. This color appears in the <a href="http://www.pantone.com/pages/pantone/colorfinder.aspx" target="_blank" rel="nofollow">Pantone Inc</a> matching system.</p>
	</section>
	
	<section id="hex-E63E62">
		<h3>Paradise Pink</h3>
		<p>A warm, lively hue, almost as if someone added milk to the red to make it smoother.</p>
		<p>In use since (around) the 1960's. This color appears in the <a href="http://www.pantone.com/pages/pantone/colorfinder.aspx" target="_blank" rel="nofollow">Pantone Inc</a> matching system.</p>
	</section>
	
	<section id="hex-CC33CC">
		<h3>Steel Pink</h3>
		<p>A somewhat recent color for the Crayola pencil collection, introduced in 2001. Although this is not the darkest color in the palette, it surely is the starkest. It looks pretty insane, actually.</p>
	</section>
	
	
	<section id="hex-893843">
		<h3>Solid Pink</h3>
		<p>The darkest color in the palette, almost brown (but still distinguishable pink-ish). Very solid indeed.</p>
		<p>In use since 2001. This color appears in the <a href="http://xona.com" target="_blank" rel="nofollow">Xona</a> Color List. Xona is a retro computer game studio.</p>
	</section>
</aside>
<?php echo '<section class="mainArticle" id="pinkStory"><h3 class="author">By <a href="/artist/'.strtolower(str_replace(' ', '-',$author)).'/" rel="author" class="darkGrey" title="Author of this article" itemprop="author" itemscope="" itemtype="http://schema.org/Person"><span itemprop="name">'.$author.'</span><img src="/images/thumbnails/?i=/images/content/pages/about-'.strtolower(str_replace(' ', '-',$author)).'.jpg&amp;m=s_profile" alt="author"></a></h3>';  echo $intro; ?>
		
		
		
		
		
		
		
		
		
		
		<figure class="feature">
			<a href="/art/1735/"><img alt="17:35, photo shot on film" src="/images/art/L_1735.jpg" class="doNotSteal" /></a>
			<figcaption><a href="/art/1735/">17:35</a> by <a href="/artist/chi/">Chi</a> uses shades of pink around <a href="javascript:window.location='#E0218A';read();(function(){window.location.reload();}).delay(500);">"Barbie Pink", #E0218A</a>. This shade adds a lot of dramma to this shot and at the same time softens it. The image has been shot on a special film called "Lomochrome Purple" that gave it this ting after being processed in the dark room.</figcaption>
		</figure>
				
		<p>What I find interesting about that particular study is that I can't imagine pink as a calming color on its own. It seems to me that it needs to be a part of something. I remember spending my weekends as a teenager, painting homes and the rosy walls that made me feel nauseous. It might have been the fumes.</p>
		<p>In <strong>Western culture</strong> it is primarily a feminine color with most of the male population shying away from it. Is there any innate, hard-wired predisposition to our gender-assigned palette? Not really; the research about color preferences (with findings about the differences between our genders) has been widely <a href="http://www.theguardian.com/science/2007/aug/25/genderissues" target="_blank" rel="nofollow">misquoted</a> by marketers. What's interesting is that prior to 1950s (in the early 1900s when we just learned how to color our clothes properly) <strong>pink was associated with boys and blue with girls</strong>. At that time, pink was a gentle offset from red - a traditionally masculine color. There is no concrete evidence of why the boys and their parents over time started choosing the blue, but there is some speculation about the color being associated with other masculine roles. For example The Navy, machinery and airplanes. This preference has then been further accelerated through marketing and gender stereotypes and inequalities of our society. Fast forward to 2000s: from bubblegum princess to porn and a synonym to vagina - it all belongs to women.</p>
		<figure>
			<img alt="Join The Navy! Boys dress in blue." src="https://upload.wikimedia.org/wikipedia/commons/7/77/Join_the_Navy.jpg" />
			<figcaption>
				<p>Blue uniforms commonly worn by men are likely to have influenced the gender preferences. Before the 1950s boys mostly wore pink and girls - light blue.</p>
				<p>Image courtesy of: By Library Company of Philadelphia [see page for license], via <a href="http://commons.wikimedia.org/wiki/File%3AJoin_the_Navy.jpg" rel="nofollow" target="_blank">Wikimedia Commons</a></p></figcaption>
		</figure>
		
		<p>But there are punk (and <a href="http://www.pinkspage.com" target="_blank" rel="nofollow">P!nk</a>), pimp, hipster and hippie cultures which strongly identify with pink. None of them are female-centric but all of them are rebellious. Moreover, some of the most traditional designs which are not aimed at any gender in particular are pink. Take British Rose <a href="#DE6FA1">fine china</a> sets and pink marble in expensive buildings for example. Plus a huge variety of British furniture.</p>
		<blockquote>"Pink is for the girls" seems to be purely a product of our cultural stereotypes and marketing efforts by toy and clothing companies in the West.</blockquote>
		
		<p><strong>In other cultures and languages</strong> the word pink is often associated with a physical object. In Russian it's pronunciation is derived from the word rose (see above) and it seems to be the same story for a lot of the European languages <a href="http://en.wikipedia.org/wiki/Pink#Pink_in_other_languages" target="_blank" rel="nofollow">as well</a>. In Japanese it's the peach blossoms and in Chinese it's the women's makeup (although they haven't started recognizing the color until recent). In Thailand the color is associated with <a href="http://usmta.com/Thai-Birthday.htm" target="_blank" rel="nofollow">Tuesday</a> and (subsequently) with bravery and seriousness. It is also the color of Buddhist enlightenment. In South Korea it is the color of trust. And in India it is a happy and hopeful color.</p>
		
		<p>Whatever the cultural association, the seems to make strong impressions. This study, <em>Eva Heller, Psychologie de la couleur - effets et symboliques, p. 179.</em>,  demonstrated that people seem to shy away from the color without any real negative associations. On the other hand it is used to attract attention for <a href="http://en.wikipedia.org/wiki/Pink_ribbon" target="_blank" rel="nofollow">breast cancer</a> awareness campaigns. And it is the defining color of <a href="http://en.wikipedia.org/wiki/Pink_slip" target="_blank" rel="nofollow">pink slip</a> - a paper that'll get you either fired or certified.</p>
		

<?php
	
	$script = "
	
		if (typeof wS != 'function') { 
			wS = window.getSize;
		}
		//Add color code labels to descriptions:
		var hexIndex = [];
		$$('aside.shadeInfo > section').each(function(el,i){
			colorCode = '#' + el.get('id').replace('hex-', '');
			hexIndex[i] = colorCode;
			
			hexL = new Element('strong', {
				'class': 'hexLabel darkGrey',
				'style': 'background: ' + colorCode,
				'html': colorCode,
				'title': 'Hexadecimal code for this color. Use this in your graphic design and coding projects.',
				events: {
					click: function(e){
						e.stop();
						window.location = '#' + el.get('id').replace('hex-', '');
						read();
						
						(function(){
							pie.covers[hexIndex.indexOf(window.location.hash)].events[0].f();
							pie.covers[hexIndex.indexOf(window.location.hash)].events[2].f();
						}).delay(500);
					}
				}
			});
			hexL.inject(el.getChildren('h3')[0],'bottom');
		});
		
		var articleTitle = $('articleTitle');
		var appContainer = $('appContainer');
		infoBxS = new Fx.Scroll($('aboutShade'));
						
		//social menu
		var shareSocial = $('shareSocial');
		var articleDetails = $$('.articleDetails');
		shareSocial.set('html',shareHTML);
		socialActions();
		
		//Show/hidde all colors:
		var showHideTHML = $('wheelHow').get('html');
		var shadeInfo = $$('.shadeInfo')[0];
		$$('.showHideAllColors').addEvent('click', function(e){ showHideAllColors(e); });
		
		function showHideAllColors(e){
			e.stop();
			if(shadeInfo.getStyle('display') == 'none'){
				(function(){
					shadeInfo.setStyle('display','block');
					read('hex-FFDDF4');
				}).delay(100);
			}
			else {
				shadeInfo.setStyle('display','none');
			}
		}	
			
		
		Asset.javascript('/snippets/raphael-2.1.2.js', {
			onLoad: function(){
				
				var allSlices = new Array();
				for(i=0; i < 43; i++){
					allSlices[i] = 1;
				}
				
				
				var r = Raphael('pinkWheel');
				r.setViewBox(0, 0, 500, 500, true);
				
				pie = r.piechart(
					250, 250, 250, allSlices,
					{
						stroke: '#2c2c2c',
						strokewidth: .5,
						maxSlices: 100,
						colors: [
		'#FFDDF4','#FDDDE6','#F1DDCF','#F9CCCA','#F7CAC9','#F4C2C2','#F2BDCD','#EFBBCC','#F7BFBE','#FFC0CB','#FFB7C5','#FFB6C1','#E8CCD7','#FFBCD9','#FFB3DE','#FBAED2','#FFA6C9','#D8B2D1','#F19CBB','#DEA5A4','#C4AEAD','#FF91AF','#FC89AC','#F88379','#FF6FFF','#F77FBE','#E68FAC','#FF69B4','#FF5CCD','#FD6C9E','#ff5a96','#FB607F','#E4717A','#D7837F','#DE6FA1','#FC0FC0','#FF1493','#E0218A','#D74894','#CF6BA9','#DE5285','#E63E62','#CC33CC','#893843'
						]
					}
				);
	
	
				//Select and de-select slices
				var pSlice = -1;
				pie.hover(
					function () {
						this.sector.stop();
						if(this.cover.id != pSlice)
						this.sector.scale(1.1, 1.1, this.cx, this.cy);
					},
					function () {
						if(this.cover.id != pSlice)
						this.sector.animate({ transform: 's1 1 ' + this.cx + ' ' + this.cy }, 500, 'bounce');
					}
				);
				
				// open up hashtags
				//
				if(window.location.hash && hexIndex.indexOf(window.location.hash) !== undefined){
					window.addEvent('domready', function(){
						pie.covers[hexIndex.indexOf(window.location.hash)].events[0].f();
						pie.covers[hexIndex.indexOf(window.location.hash)].events[2].f();
					});
				}
				//
				
				pie.click(
					function (e) {					
						if(pSlice>=0 && typeof pSEl !== 'undefined' && pSlice != this.cover.id){
							pSEl.sector.animate({ transform: 's1 1 ' + this.cx + ' ' + this.cy }, 500, 'bounce');
						}
						
						if(pSlice != this.cover.id){
							pie.series.attr('opacity', .5);							
							pSlice = this.cover.id;
							pSEl = this;
							
							$('aboutShade').set('html', $$('.shadeInfo > section')[pSlice-43].get('html') + '<p class=\"pointerHand\">' + /* showHideTHML + */'</p><p>&nbsp;</p>').setStyle('display','block');
							$$('.showHideAllColors').addEvent('click', function(e){ showHideAllColors(e); });
							
							// $('wheelHow').set('html','<a href=\"javascript:wDeselect(1);\">Go back</a>').removeClass('pointerHand');
							articleTitle.setStyle('margin-top',0);
							
							// shareSocial.setStyle('display','none');
							articleDetails.setStyle('opacity',0);
							
							//scroll down to description (once only, to demo)
							if(wS().x<830 /*&& !scAlrdy*/){ scrl.start(0, wS().y/1.5); scAlrdy=true; }
							//demonstrate that most articles are scrollable
							else infoBxS.start(0, 5);
							
							window.location = '#'+$$('.shadeInfo > section')[pSlice-43].get('id').replace('hex-', '');
							
							console.log(pSlice);
						}
						else wDeselect();
						
						this.sector.attr('opacity', 1);
						
						
					}
				);
				wDeselect = function(gCl){
					
					pie.series.attr('opacity', 1);
					pSlice = -1;
					
					
					$('aboutShade').setStyle('display', 'none');
					$('wheelHow').set('html', showHideTHML);
					//.addClass('pointerHand');
					$$('.showHideAllColors').addEvent('click', function(e){ showHideAllColors(e); });
					articleTitle.setStyle('margin-top','');
					
					gCl = gCl || false;
					if(gCl)pSEl.sector.animate({ transform: 's1 1 ' + pSEl.cx + ' ' + pSEl.cy }, 500, 'bounce');
					pSEl = null;
					
					shareSocial.setStyle('display','block');
					articleDetails.setStyle('opacity',1);
					socialActions();
					
					scrl.start(0,0);
					$('aboutShade').scrollTo(0, 0);
					(function(){ infoBxS.start(0, 5); }).delay(100);
					
					window.location = '#';
				};
				
				$$('#pinkWheel > svg path').addEvent('click', function(e){
					e.stop();
				});
				$$('#pinkWheel > svg').addEvent('click', function(){
					wDeselect();
				});
				$$('main > header article')[0].addEvent('click', function(){
					wDeselect();
				});
				
				window.addEvents({
					'domready': buildHeaderG,
					'resize': buildHeaderG
				});
				
				buildHeaderG();
				function buildHeaderG(){
					var gSVG = $$('#pinkWheel > svg')[0];
					var gSize = gSVG.getSize().y;
					if(gSize == undefined || gSize == 0){
						gSize = parseFloat(gSVG.getStyle('height'));
					}
					var hArticle = $$('main > header article')[0];
				
					gSVG.setStyle('width', gSize);
					gSVG.set('width', '');
					
					if(wS().x>830){
						
						hArticle.setStyles({
							'margin-left': gSize,
							'height': gSize,
							'max-width': wS().x - gSize - 100
						});
						$('aboutShade').setStyle('max-width', wS().x - gSize - 100);
						
						//rearrange dom elements
						articleTitle.dispose();
						articleTitle.inject($$('main > header article')[0], 'top');
						$('aboutShade').setStyle('height', $('appContainer').getSize().y - $('wheelHow').getSize().y - articleTitle.getSize().y - 20);
						
					}else{
						hArticle.setStyles({
							'margin-left': 0,
							'height': 'auto',
							'max-width': ''
						});
						$('aboutShade').setStyle('max-width', '');
						
						//rearrange dom elements
						articleTitle.dispose();
						articleTitle.inject(appContainer, 'top');
						
					}
				
					//init loading animation
					(function(){
						gSVG.setStyles({
							'-webkit-transition': 'all 300ms',
							'-moz-transition': 'all 300ms',
							'transition': 'all 300ms',
							'-webkit-transform': 'scale(1,1) rotate(0deg)',
							'-moz-transform': 'scale(1,1) rotate(0deg)',
							'transform': 'scale(1,1) rotate(0deg)'
						});
						(function(){ hArticle.fade(1); }).delay(400);
					}).delay(100);
					
					appContainer.removeClass('loadingContainer');
				}
			}
		});
		
		
		
		
		// Adding back linking abilities to color descriptions:
		$('aboutShade').addEvent('click:relay(a)', function(e, el){
			e.stop();
			if(el.get('target') == '_blank') {
				window.open(el.get('href'),'_blank');
			}
			else {
				window.location = el.get('href');
			}
		});
		";
	include_once('mag-footer.php');
	$mini_footer = true;
	include('../snippets/footer.php');
?>