<?php
    $title = 'Forbidden';
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
				<h1>Forbidden</h1>
				<p>This page is no go. Try the <a href="/">home page</a> instead!</p>
			</div>
		</article>
	</section>
</main>
<?php
	$script = "";
	include('/home2/artsocke/public_html/_subdomains/stage/snippets/footer.php');
?>