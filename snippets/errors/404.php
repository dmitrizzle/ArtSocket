<?php
    $title = 'Page not found!';
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
    
    
    $search_term_maybe = '';
    
    $search_maybe = explode('/', $_SERVER['REQUEST_URI']);
    $search_string_offset = 1;
    
    if(substr($_SERVER['REQUEST_URI'], -1) == '/')
    	 $search_string_offset = 2;
    
	$search_term_maybe = $search_maybe[count($search_maybe) - $search_string_offset];
	
	$search_term_maybe = str_replace('-', ' ', $search_term_maybe);
	
?>
<main>
	<section class="table">
		<article class="tableRow">
			<div class="tableCell">
				<h1>Page not found!</h1>
				<p>Sorry about that. Perhaps you have been given a wrong or misspelled link. Or the file has moved. Try the <a href="/art/">home page</a> or our <a href="/mag/">blog</a> to find what you are looking for.</p>
				
				<section>
					<form method="get" action="/search/">
						<input type="text" name="for" value="<?php echo $search_term_maybe; ?>" required placeholder="Type your question" maxlength="500" class="animateAllFast">
						<input type="submit" class="contentButton animateLetterSpacing nostyle" value="Search">
					</form>
				</section>
			</div>
		</article>
	</section>
</main>
<?php
	$script = "";
	include('/home2/artsocke/public_html/_subdomains/stage/snippets/footer.php');
?>