<?php
	$title = 'ArtSocket Email Newsletter';
	$description = 'Email newsletter mini-series with exclusive insights & inspiration from creative industry leaders.';
	$meta_image = '/images/content/pages/subscribe_header.jpg';

    $css = '
    
    	main > header > div {
    		background: linear-gradient(to top right, #932bab, #ff3b63);
    	}
    	main > header > div img {
    		visibility: hidden;
    	}
    	main>header section h1 { overflow: visible; }
    	main>header section p {
				text-align: justify;
				max-width: 24.5em;
			}
    
    	#emailSubmit {
    		width: 29.85em;
				max-width: 100%;
				margin-bottom: 3em;
			}
    	#emailSubmit input {
    		display: inline-block;
				width: calc(100% - 4em);
				max-width: 23em;
				font-weight: 400;
    	}
    	#emailInput {
    		background: linear-gradient(30deg, #ff5a96, #fff200);
				text-align: center;
				border: 1px #932bab solid;
				margin: 0 0 .5em;
				font-size: 1em;
				border-radius: .5em;
    	}
    	
			#emailInput::-webkit-input-placeholder {
				color: #2c2c2c;
			}
			#emailInput::-moz-placeholder {
				color: #2c2c2c;
			}
			#emailInput:-ms-input-placeholder {
				color: #2c2c2c;
			}
			#emailInput:-moz-placeholder {
				color: #2c2c2c;
			}
    	
    	.display_archive {
				max-width: 42em;
				margin: 0 auto;
			}
    	
    ';
    include('snippets/header.php');
    ob_start('simpleComress');

?>
<main>
	<header class="white" <?php if($blur_headers) echo 'style="background-image: url(/images/thumbnails/?blur=2&i='.$meta_image.')"';?>>

		<div>
			<section>
				<h1>Stay <span class="red">in the loop</span> &#x1F60F;</h1>
				<form method="post" action="/email-submit/" id="emailSubmit">
					<input type="email" name="email" required id="emailInput" placeholder="Type Your Email" value="" maxlength="200" />
					<input type="submit" class="contentButton animateLetterSpacing nostyle red" value="Click to Subscribe!" />
				</form>
				<p><small><strong class="red">Get exclusive inspiration & insights on all creative projects from the ArtSocket team.</strong></small>.</p>
				<p><small><strong>Don't forget</strong> to click the confirmation link in the email that you should receive in about 5 minutes. <a href="/privacy-policy/">No spam</a></small></p>
			</section>
		</div>
		<img src="<?php echo $meta_image; ?>" alt="ArtSocket Email Newsletter" />
	</header>

	<article>
		<section>
		<h2>Past ArtSocket Newsletter issues:</h2>
		
			<?php
				$curl = curl_init();
				curl_setopt ($curl, CURLOPT_URL, "http://us4.campaign-archive2.com/generate-js/?u=256339f7eafa36f2f466aca44&fid=5921&show=10");
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

				$result = curl_exec ($curl);
				curl_close ($curl);
				echo str_replace('_blank"','_blank" rel="nofollow"', str_replace('ud83cudf89u00a0','',str_replace('document.write("','',str_replace('");','',stripslashes($result)))));
			?>
		</section>
	</article>
</main>


<?php 

	ob_end_flush();
	
	$script = "
	
	$('emailInput').focus();
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
	
	"; 
	include('snippets/footer.php');
?>