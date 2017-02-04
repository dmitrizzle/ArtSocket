<?php
    $title = 'Internal server error';
    $css = '
    
    body > main, .table {
    	height: 100%;
    }
    .table {
    	padding-top: 0;
    }
    .tableCell {
    	vertical-align: middle;
    	text-align: center;
    }
    
    ';
	$noscript_css = '';
	
	$error_page = true;
    include('/home2/artsocke/public_html/snippets/header.php');
?>
<main>
	<section class="table">
		<article class="tableRow">
			<div class="tableCell">
				<h1>Internal server error</h1>
				<p>OMG! Something went wrong on our end. Please wait a few minutes and <a href="/">try again</a> or come back in couple of hours.</p>
			</div>
		</article>
	</section>
</main>
<?php
	$script = "";
	include('/home2/artsocke/public_html/_subdomains/stage/snippets/footer.php');
?>