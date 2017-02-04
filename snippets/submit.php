<?php
	$title = 'Submit Your Art and Photography';
	
    $css = '
    
    	body > header nav a.submitButton { background: #000; }
		body > header nav a.submitButton svg path {
			fill: #ff5a96 !important;
			
		}

    	main > header:before {
    		padding: 0;
    	}
    	main > header {
			height: auto;
			min-height: 100vh;
		}
		main > header > div {
			height: auto;
			margin-top: -100vh;
			position: relative;
		}
		main > header > img { height: 66.666vw; }
		
		
    	main > header .submitForm {
    		padding: 0;
    		position: static !important;
    	}
    	#jotform {
			position: relative;
			min-height: 330px;
			width: 266px !important;
			padding: 0 1.5em 1.5em 1.5em;
			overflow: hidden;
			margin: 0 auto;
			background: rgba(255, 255, 255, 0.89);
			margin-bottom: .5em;
			border-radius: .333em;
		}
    	main > header iframe {
    		z-index: 2;
			position: relative;
			min-height: 335px;
			padding-bottom: 1.5em;
    	}
		
		
		
		
		main > header p {
			max-width: 314px;
			margin: 0 auto;
			padding: 0 1.5em 1.5em;
			text-align: justify;
		}
		main > header section:first-child { margin-top: 35vh; }
    ';
    
    // UPDATE THIS IF MAIN CSS FILE IS CHANGED:
	// generated at: http://jonassebastianohlsson.com/criticalpathcssgenerator/
	//$critical_css = '';
	
	
	
    // $light_header = true;
    include('snippets/header.php');
    ob_start('simpleComress');

?>

<main>
	<header class="white">
		<img src="/images/content/pages/submit-header-3.jpg" alt="<?php echo $title; ?>" />
		<div>
			<section class="submitForm">
				<h1 class="animateAll"><span class="red">Submit</span> Your Art & Stories</h1>
				<p>Guaranteed fixed royalties. Non-exclusive exhibition license. Strict edition control. <a href="javascript:read('terms');">Learn more</a>. <strong class="red">New:</strong> Use the same form to submit your written story for ArtSocket Magazine (extended terms below). Please include your images and all required info for publication. <a href="/contact/">Contact us</a> if you have any questions.</p>
				<div id="jotform">
					<h4 class="darkGrey">Upload your submission:</h4>
					<script type="text/javascript" src="https://secure.jotform.me/jsform/42071234243443"></script>
				</div>
				<p><small>By clicking the <q>Submit Your Art</q> button above you are indicating that you have read and agree to (and give all the permissions requested) in the terms listed on this page.</small></p>
			</section>
		</div>
	</header>
	<section id="terms">
		<h2>Quality</h2>
		<p>Although a lot about art is subjective, there is one thing that our customers <a href="https://www.surveymonkey.com/s/B3XFH25" target="_blank" rel="nofollow">agree upon</a>: quality is very important. We have done extensive research on the types of inks, paper, as well as color settings for digital files that would generate the best results. This is why it is the first thing that we screen our submissions for. Besides the size of the image, quality of your scanner or camera sensor and the lens are extremely important. Note that we do accept a lot of Lo-Fi images, such as film scans form toy cameras - but we ask that your submit excellent quality scans. Please note our minimum requirements:</p>
		<ol>
			<li>Pixel density: at least 2,000 pixels on the short side of your images (i.e. 2000x3000).</li>
			<li>Compression: if you are submitting compressed files such as JPG, the quality setting has to be at least 9/10. We can't check the settings that you had while saving your images but we will notice compression artifacts. We prefer that you submit uncompressed files to us such as Camera RAW, TIFF or PNG.</li>
			<li>Sharpness: your images must be sharp - unless it is intended by the artist to create a blur effect or an old-fashioned camera has been used.</li>
			<li>Dust and scratches: are OK, unless your image is intended to be a <q>clean</q> and it was an accident. An example is a photo of a sunset taken with a digital camera with dog's hair on the lens</li>
			<li>Filters: creative digital and analog filters are totally fine but please have a look at our current selections before submitting your images. We are looking for particular style that often does not involve any effects at all.</li>
			<li>Colors and sharpness: we hope that you will be submitting images ready to be published and printed. However we ask your permission to manipulate colors and sharpness of your image (as well as other corrections, such as perspective). Within a reason of course - only to highlight the best parts of it. We will do our absolute best not to take away anything that is truly <em>yours</em> from your work.</li>
			<li>No watermarks.</li>
		</ol>
		
		<h2>Presentation</h2>
		<p>ArtSocket takes on most of the work when it comes to showing your work in the best light possible. This website is built to be unobstructive, fast and beautiful. Its design has been created from scratch and it uses the latest technology available to deliver your work to potential customers. However there is another part: the story. Each image is presented with a short paragraph (or more) that describes the mood, the setting and any other relevant details. We ask that you give us as much of the details about your image as possible. Please note however that we edit most of the entries to suit overall website written style.</p>
		
		<h2>Your spot in the gallery</h2>
		<p>ArtSocket does not function like most stores or portfolio websites. It is much more similar to real-world galleries. Each artist gets a <q>wall space</q> for a given amount of time. At this point we <strong>guarantee you at least 30 days</strong> upon acceptance. After that we can either extend that period for another 30 days or archive the image. Note that we are also very likely to bring it back from the archive at a later time. The reason for that is to present a cohesive body of work to our viewers and have every image constantly flow into the next one. New submissions and addition reviews often change that flow - hence the movement of the works to and from the archive. Note that this <q>flow</q> is also a major factor in determining whether your work will be accepted or not. Even a brilliant piece might not fit with our theme.</p>
		
		<h2>Payments</h2>
		<p>We will notify of each print purchase that has been made (for your art). We are leaving it up to you to decide on when to ask for your funds, but please note that we recommend waiting to collect a substantial sum in order to ensure that the fees incurred during transfer are minimised. We will be using PayPal transfers for international arits and Interac E-Transfer for Canadians.</p>
		
		<h2>Privacy</h2>
		<p>Unfortunately we can not share any of our customers' information with you due to our privacy policy limitations. If a customer requests to be connected with you, we will only give your information to them after asking your permission.</p>
		
		<h2>Royalties</h2>
		<p>You are <strong>guaranteed $35USD from each print sale</strong> on the website. That means that even if ArtSocket's expenses involving printing, shipping and any overhead exceed the actual price of item you will still get paid $35. However, we ask for a 30-day grace period from the time of purchase to allow the customers the time to return the item in case they are not happy. We will never charge you for any repairs, membership fees or anything - really.</p>
		<p>Each print is limited to 15 editions, giving you a potential of $150 in earnings from a single piece of art or photography that you submit.</p>
		
		<h2>Edition control</h2>
		<p>We are very serious about controlling our editions. There will be only 15 ArtSocket prints made per image - period. We will not print any of your work <strong>even for promotional purposes</strong> without actually buying an edition of your print.</p>
		<p>We have also implemented all reasonable security features on the website to prevent users from easily stealing your content. Although the images look very crisp on the website their resolution is also not allowable for any kind of decent print - in case someone actually manages to steal it. However we can not take the responsibility of hunting down individuals who infringe on your copyright.</p>
		
		<h2>Copyright</h2>
		<p>Please note that besides the design and functionality of this website our copyright also extends to how we present your work. Tat means that all of the presentation work associated (i.e. your signature and a photograph on the gutter) belongs to us. If you choose to withdraw your work you can not still make prints presented in the same fashion as we do. This also extends to using our brand name and edition numbering system.
		
		<h2>Release & withdrawal</h2>
		<p>We do ask for your full permission to exhibit and do limited modifications to your work on this website and anywhere that is meant to bring traffic to the website in digital form. An exception could be a magazine ad or a billboard - but we would contact yo about something like that.</p>
		<p>You are free to request an immediate withdrawal of your work at any time. Sometimes things come up or you change your mind and we understand. We will comply as soon as possible, but give us a couple of days (no more than 7) to re-arrange our collection and have someone remove it from the site permanently. At that point you are revoking your non-exclusive exhibition licensee that you granted to us when you submitted the image. If you would like your work to be put back on the website you will have to re-submit it again (<strong>we will not keep the copy of your work after it has been withdrawn</strong>).
		
		<h2>Exclusivity</h2>
		<p>Your work is being exhibited on non-exclusive basis. This means that you are free to continue submitting it to any gallery or website that you wish. However, if a bad reputation follows your image, or if it is over-saturating the market according to our opinion it will not be accepted or given a further extension after its 30-day term. An example is a great image that after being submitted here has also been a very popular stock photo and is now being used in tooth past commercials.</p>
		
		<h2>Magazine submissions</h2>
		<p>Written pieces are not commissioned, unless exclusively arranged. Guaranteed at least one <strong>do-follow</strong> link to a URL of your choice upon accepted submission.</p>
		
		
		<small>We may modify these terms at any point in time without any notifications. Please check back periodically or every time before submitting new work.</small>
		
	</section>
	
	
</main>


<?php 

	ob_end_flush();
	
	$script = "
	"; 
	include('snippets/footer.php');
?>