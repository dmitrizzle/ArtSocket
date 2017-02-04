<?php
 	$title = 'Your print is on the way!';
    $css = '
    	.summary {
    		overflow: hidden;
    	}
    	.summary figure img {
    		width: 17.5em;
			height: auto;
			padding: 1em;
			border: 1px solid #c4c4c4;
		}
		@media only screen and (min-width:640px) {
			.summary h2 {
				padding-top: 0;
				margin-top: -0.37em;
			}
			.summary figure {
				float: left;
				padding-right: 1.5em;
			}
		}
    	';
    include('snippets/header.php');
    ob_start('simpleComress');
?>
<main>
	<article>
		<section class="summary">
<?php
	
	//--------------------------------STRIPE CHARGE--------------------------------------//
	require_once('config.php');
	//get stripe token
	$token  = $_POST['order-token'];

	//SUCCESSFUL CHARGE
	try {
		$customer = Stripe_Customer::create(array(
			'email' => $_POST['order-email'],
			'description' => $_POST['order-customer'],
			'card'  => $token
		));
		$charge = Stripe_Charge::create(array(
			'customer' => $customer->id,
			'amount'   => intval($_POST['order-amount']),
			'currency' => 'usd',
			'description' => $_POST['order-description']
		));

		echo '
			<h1>Your print is on the way!</h1>
			<p><figure><img src="'.$_POST['image-url'].'" class="doNotSteal" /></figure></p>
			<h2>Order summary:</h2>
			<p><q>'.$_POST['order-description'].'</q>. '.$_POST['order-customer'].'. We have charged your credit card a total of <strong>$'.($_POST['order-amount']/100).'USD</strong></p>
		
		$next_steps = '<div class="articleHead bodyBlock">
		<h2>What\'s next?</h2>
		<p>We personally check every order to ensure that it is filled correctly and there are no errors before submitting it to the printer (you will receive an email if we find a problem). Within next 3-4 business days, acid-free archival ink will be layed on top of eco-friendly cotton paper, expertly packaged and sent to your doorstop. The artist who created the image will be immensly happy to receive the news and the royalties.</p>
		<p>We will contact you with a tracking number once we receive it from the shipping company.</p>
		</div>
		';
	}
	//CARD ERRORS
	catch(Stripe_CardError $e) {
		// Since it's a decline, Stripe_CardError will be caught
		$body = $e->getJsonBody();
		$err  = $body['error'];

		echo '<h1 class="red">We could not charge your credit card</h1>';
		echo '<p>Please try again or contact us for help.</p>';
		
	}
	//OTHER ERRORS
	catch (Stripe_InvalidRequestError $e) {
	// Invalid parameters were supplied to Stripe's API
		genError("Invalid parameters were supplied");
	}
	catch (Stripe_AuthenticationError $e) {
	// Authentication with Stripe's API failed
	// (maybe you changed API keys recently)
		genError("Authentication with S/ API failed");
	}
	catch (Stripe_ApiConnectionError $e) {
	// Network communication with Stripe failed
		genError("Network communication with S/ failed");
	}
	catch (Stripe_Error $e) {
	// Display a very generic error to the user, and maybe send
	// yourself an email
		genError("unknown error S/");
	}
	catch (Exception $e) {
	// Something else happened, completely unrelated to Stripe
		genError("server error");
	}
	function genError($type){
		echo '<h1 class="red">Error processing credit card payment</h1>';
		echo '<p>We encounted "'.$type.'" error. Please try again or contact us for help.</p>';
	}
		
		
 ?>
 		</section>
 		<section>
 		<?php echo $next_steps; //if the order was successful, show next steps and invoice ?>
		</section>
 	</article>
 </main>
 
 
 <?php
 	ob_end_flush();
	$script = "";
    include('snippets/footer.php');
?>