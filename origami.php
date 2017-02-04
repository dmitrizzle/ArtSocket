<?php
	//server url... very important
	$domain = "https://www.artsocket.com";
	
	
	$title = 'Free Origami Art Printables';
	$description = "Download, print and fold 3 miniature origami picture frames in five minutes. Free.";
	$meta_image = $domain."/images/content/pages/origami-videoPoster-large.jpg";
	
    $css = '
    
	
	main > header article {
		padding: 5.3em 0;
		padding-top: 15%;
	}
	
	main > header .contentButton svg {
		width: 0.75em;
		height: 0.75em;
		display: inline;
		margin: 0 0 -0.3em 0.3em;
	}
	main > header .contentButton svg path {
		fill: #fff;
	}
	main > header .contentButton:active svg path {
		fill: #ff5a96;
	}
	
	
	main > header .contentButton .white {
		fill: #fff;
	}
	main > header .contentButton:active .white,
	main > header .contentButton.active .white {
		fill: #ff5a96;
	}
	
	main > header > div { z-index: 1; }
	main > header video {
		position: absolute;
		bottom: 0;
		right: 0;
		z-index: 0;
		height: 100vh;
		opacity: 0;
	}
	
	
	
		#emailSubmit { padding-bottom: 1.5em; max-width: 19em;}		
    	#emailSubmit input {
    		display: block !important;
    		float: none;
			text-align: center;
		}
		#emailSubmit input[type="email"]{
			border: 1px solid #00AEEF !important;
			width: 19.15em !important;
		}
		#emailSubmit .contentButton {
    		width: 17.1em;
    	}
    	
    	
    	figure.enjoy {
			max-width: 52em;
			max-height: 19em;
			margin: 0 auto;
			background: #030303;
			position: relative;
			overflow: hidden;
			border-radius: .15em;
		}
		figure.enjoy aside {
			z-index: 1;
			position: absolute;
			top: 50%;
			left: 50%;
			margin-top: -1em;
			margin-left: -4.3em
		}
		figure.enjoy img {
			display: block;
			opacity: 0.2;
			width: 100%;
			height: auto;
		}
		figure.enjoy:hover img {
			opacity: 0.5;
			margin-top: -3em;
		}
		.social a.contentButton.facebook, svg .f {
			fill: #497EED;
			border-color: #497EED;
			color: #497EED;
		}
    	
		
		
    ';
    
    
    // $light_header = true;
    include('snippets/header.php');
    ob_start('simpleComress');

?>
<main>
	<header class="white">
		<video loop preload="none" poster="<?php echo $meta_image; ?>" >
			<source src="/images/content/media/origami.webm" type="video/webm">
			<source src="/images/content/media/origami.mp4" type="video/mp4">
			<img src="<?php echo $meta_image; ?>" alt="ArtSocket art and photography prints" />
		</video>
		<div>
			
			<article>
				<h1 class="center"><span class="red">Free</span> Printables</h1>
				<form method="post" action="/email-submit/" id="emailSubmit">
					<input type="hidden" name="source" value="<?php echo ucfirst($_GET['utm_source']).' '.$_GET['utm_campaign']; ?>" />
					<input type="email" name="email" id="inputEmail" required placeholder="Enter your email address" value="" maxlength="200" class="white" />
					<input type="submit" class="contentButton animateLetterSpacing nostyle red" value="Download printables" />
				</form>
			</article>
		</div>
		<section class="vimeo animateAll"><section>
	</header>
	
	
	<section>
		<h2>1) Download and Print</h2>
		<h4>Enter your email address <a href="javascript:read();">above</a> to begin</h4>
		<p>We will email you a link to 3 PDF printable files with all the artwork and fold lines. Please download and print these files.<small><br /><strong>We'll ask you to subscribe to our non-spammy, non-salesy newsletter as a small favour in return.</strong> About once every 30 days <a href="/artist/dmitri-tcherbadji/">Dmitri</a> sends out thoroughly designed and curated email newsletter with the list of new images and articles on ArtSocket. No spammy, pushy or sales material - just a list of beautiful things for your monthly inspiration (<a href="http://us4.campaign-archive2.com/home/?u=256339f7eafa36f2f466aca44&id=12d8a644fa" target="_blank" rel="nofollow">see our past issues</a>). You'll receive the download link in your email along with the subscription to this newsletter. It is completely free and you can always easily unsubscribe.The download is a <strong>5MB</strong> PDF.</small></p>
	</section>
	
	<section>
		<h2>2) Fold</h2>
		<p>After you've received your download link and printed the files, follow the <a href="https://vimeo.com/100884076" target="blank" rel="nofollow" >folding instructions video</a>.</p>
	</section>
	<section>
		<h2>3) Share and Enjoy!</h2>
		<figure class="enjoy">
			<?php echo $share_html; ?>
			<img src="/images/content/pages/origami-demo-sm.jpg" alt="Free origami printables" class="pinterestMedia animateAll" width="1200" height="900" />
		</figure>
	</section>
	
</main>

<?php 

	ob_end_flush();
	
	$script = "
	
	
	//email subscribe
	var submitButton = $$('#emailSubmit .contentButton')[0];
	$$('#emailSubmit').addEvent('submit', function(e){
		e.stop();
		liFx();
		submitButton.addClass('active');
		new Request.HTML({
			url:'/email-submit.php',
			onComplete:function(a, b, c){
				killNotify();
				(function(){
					notify(c, true); 
					lo();
					submitButton.removeClass('active');
				}).delay(600);
			},
			data: $('emailSubmit')
		}).send();
	});
	$('inputEmail').focus();
	
	
	
	/*
	$$('main > header video')[0].set('preload','auto').set('autoplay','true').setStyle('display','block').play();
		$$('main > header .videoPoster').setStyle('display','none');

		vimeo = $$('header .vimeo')[0];
		function playVideo(){
			vimeo.setStyles({
				'opacity' : 1,
				'display' : 'block'
			});
			(function(){
				$$('header video').setStyle('display','none');
				vimeo.set('html','<iframe src=\"//player.vimeo.com/video/100884076?title=0&amp;byline=0&amp;portrait=0&amp;color=fff&amp;autoplay=1\" width=\"715\" height=\"402\" frameborder=\"0\" id=\"promoVideo\" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>');
			}).delay(500);
		}
		*/
		
		
		Asset.image('".$meta_image."', {
			onLoad: function(){
				$$('main > header video')[0].setStyle('opacity',1);
			}
		});
		
		
		/*
		$$('.foldingClipLink').addEvent('click', function(e){
			e.stop();
			read();
			playVideo();
		});
		*/
	
	
	
	
	
	"; 
	$mini_footer = true;
	include('snippets/footer.php');
?>