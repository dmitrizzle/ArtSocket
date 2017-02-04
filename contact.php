<?php
	$title = 'Contact';
	
    $css = '
    	
    	
		.getInTouch textarea {
			height: 8em;
			display: block;
		}
		
		@media only screen and (min-width:460px) {
			.getInTouch textarea, .getInTouch #emailInput, .getInTouch textarea {
				width: 100%;
				max-width: 23.35em
			}
		}
		@media only screen and (max-width:461px) {
			.getInTouch form {
				max-width: 100%;
				margin: 0;
			}
		}
		
		
		
    ';
    include('snippets/header.php');
    ob_start('simpleComress');

?>
<main>
	<section class="getInTouch">
		<p>Thank you for your interest in what we do. Your message will be sent directly to <a href="/artist/dmitri-tcherbadji/">Dmitri</a> and he'll make sure to answer it as soon as possible. Please double-check your email spelling when submitting this form.</p>
		
		<form method="post" action="/query-submit/" id="querySubmit">
			<input type="email" name="email" required id="emailInput" placeholder="Enter your email address" value=""  maxlength="200"/>
			<textarea placeholder="Enter your message" required name="message" maxlength="1000"></textarea>
			<input type="submit" class="contentButton animateLetterSpacing nostyle" value="Send" />
			<br /><br />
			<small class="or"></small>
		</form>
		<hr />
		<small class="center">You can learn more about the company <a href="/about/">here</a>.</small>
		
	</section>
</main>

<?php 

	ob_end_flush();
	
	$script = "
	
		//thing
		$$('.emailOption').setStyle('opacity',1);
		
		var field = new Element('input', {
			'type': 'text',
			'name': 'name',
			'value': 'Art Socket',
			styles: {
				display: 'none'
			}
		});
		field.inject($('querySubmit'));
		
		
		//send ajax
		var submitButton = $$('#querySubmit .contentButton')[0];
		$$('#querySubmit').addEvent('submit', function(e){
			e.stop();
			ga('send', 'event', 'Contact Intent', 'Send Button', $('emailInput').get('value'));
			
			liFx();
			submitButton.addClass('active');
			new Request.HTML({
				url:'/query-submit.php',
				onComplete:function(a, b, c){
					killNotify();
					(function(){
						 
						//since this is JS, we dont need notification about disabled JS. 
						notify(c.replace('and <a href=\"http://enable-javascript.com/\" target=\"_blank\" rel=\"_nofollow\">have your JavaScript enabled</a>', ''), true); 
						
						lo();
						submitButton.removeClass('active');
					}).delay(600);
				},
				data: $('querySubmit')
			}).send();
		});
	
	"; 
	

	include('snippets/footer.php');
?>