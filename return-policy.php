<?php
	$title = 'Return Policy';
	
    $css = '';
    include('snippets/header.php');
    ob_start('simpleComress');

?>
<main>
	<section>
		<h1>Returns & Refunds</h1>
		<p>Thanks for shopping at ArtSocket.</p>
		<p>If you are not entirely satisfied with your purchase, we're here to help.</p>

		<h2>Returns</h2>
		<p>You have 30 calendar days to return an item from the date you received it.</p>
		<p>To be eligible for a return, your item must be unused and in the same condition that you received it. Your item must be in the original packaging.</p>
		<p>Your item needs to have the receipt or proof of purchase.</p>

		<h2>Sale items</h2>
		<p>Sale items can be refunded.</p>

		<h2>Refunds</h2>
		<p>Once we receive your item, we will inspect it and notify you that we have received your returned item. We will immediately notify you on the status of your refund after inspecting the item.</p>
		<p>If your return is approved, we will initiate a refund to your credit card (or original method of payment). You will receive the credit within a certain amount of days, depending on your card issuer's policies.</p>

		<h2>Shipping</h2>
		<p>You will be responsible for paying for your own shipping costs for returning your item. Shipping costs are non-refundable. If you receive a refund, the cost of return shipping will be deducted from your refund.</p>

		<h2>How To Return Your Item</h2>
		<p>To return an item to us, please mail it to the following address:</p>
		<p>15 Lesmount Avenue, Toronto, ON M4J3V5, Canada</p>
		
		
		<h2>Contacting Us</h2>

		<p>If you have any questions on how to return your item to us, contact us.</p>

		<p>
		https://www.artsocket.com<br />
		15 Lesmount Avenue<br />
		Toronto, Ontario M4J3V5<br />
		Canada<br />
		hello [at] artsocket [dot] com<br />
		+1 718 404 9278
		</p>
		
	</section>
	<section>
	<p>This policy was written with help from <a href="http://termsfeed.com" rel="nofollow" target="_blank">TermsFeed Generator</a>.</p>
	</section>
</main>


<?php 

	ob_end_flush();
	
	$script = "
	"; 
	include('snippets/footer.php');
?>