<?php
    require_once('snippets/stripe/lib/Stripe.php');

	$stripe = array(
	  "secret_key"      => "[[ STRIPE SECRET KEY ]]",
	  "publishable_key" => "[[ STRIPE PUBLIC KEY ]]"
	);

	Stripe::setApiKey($stripe['secret_key']);
?>