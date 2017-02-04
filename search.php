<?php
	$title =  $_GET['for'];
	if($_GET['for']=='') $title = 'Search';
	
    $css = '
    	
    	body > header nav a#searchQuery { background: #000; }
    	#searchQuery .searchIcon path {
    		stroke: #ff5a96;
    	}
    	main .searchResults > h1 a { padding: 0; }
    	
    	
    	main section.searchResults {
    		max-width: 42em;
    	}
    	main section.searchResults > small {
    		margin: -2em 0 2em
    	}
    	#cse { width: 100%; min-height: 800px; }
    	
    	.largeBanner {
			background: #2c2c2c;
			padding: 3em 1.5em 4.5em 1.5em;
			margin-bottom: -4em;
		}
		#emailInput {
			border-color: #ff5a96;
			color: #fff;
		}
		
		main .searchResults > h1 { padding-bottom: 0; }
		main .searchResults > h1 .searchIcon {
			margin-right: .25em;
			font-size: .75em;
			
		}
		
		main .searchResults > h1 { overflow: visible; }
		main .searchResults > h1 a.headerSearchButton:active,
		main .searchResults > h1 a.headerSearchButton.active {
			background: #fff;
			color: #2c2c2c;
		}
		main .searchResults > h1 .searchIcon:hover {
			-webkit-transform: scale(1.5, 1.5);
			-moz-transform: scale(1.5, 1.5);
			transform: scale(1.5, 1.5);
		}
    	
    	
    	.cse .gsc-control-cse, .gsc-control-cse { padding: 0 !important; }

		.gsc-input-box, .gsc-input-box-hover, .gsc-input-box-focus {
			border: 1px solid #2c2c2c !important;
			height: 2.9em !important;
			box-shadow: none !important;
			border-radius: .5em;
		}
		.gsst_b {
			padding: .3em !important;
		}
		input.gsc-input {
			font-size: 1.25em !important;
		}
		.cse input.gsc-search-button, input.gsc-search-button {
			display: none !important;
		}

		.gsc-above-wrapper-area {
			border-bottom: none !important;
			padding: 0 !important;
		}
		div#resInfo-0.gsc-result-info {
			padding: 0;
			color: #999;
		}
		div.gcsc-branding {
			width: 200px;
			padding: 0 !important;
		}
		div.gcsc-branding-text {
			margin: 0 !important;
			color: #00AEEF;
		}
		td.gcsc-branding-text.gcsc-branding-text-name {
			color: #00AEEF;
		}

		.gs-spelling a {
			color: #2c2c2c !important;
		}
		.gs-spelling a:hover {
			text-decoration: underline !important;
		}
		.gs-spelling a i {
			font-family: Times, "Times New Roman", sans-serif;
		}


		.gsc-table-result, .gsc-thumbnail-inside, .gsc-url-top, .gs-spelling {
			padding-left: 0 !important;
			padding-right: 0 !important;
		}
		.gsc-control-cse, .gsc-control-cse .gsc-table-result {
			font-family: Raleway, sans-serif !important;
			font-size: 1em !important;
			color: #2c2c2c !important;
			line-height: inherit;
		}
		.gsc-webResult .gsc-result {
			padding: 1.5em 0 1.5em !important;
		}
		.gsc-control-cse .gs-result .gs-title, .gsc-control-cse .gs-result .gs-title * {
			font-size: 1em !important;
			height: auto;
			color: #2c2c2c;
			background: #fff;
			text-decoration: none;
			text-transform: uppercase;
			font-weight: 700;
			padding: 0;
		}
		.gsc-control-cse .gs-result .gs-title a:hover {
			text-decoration: underline;
		}
		.gsc-control-cse .gs-result .gs-title a:active {
			color: #fff;
		}
		
		
		.gsc-control-cse .gs-result .gs-title b {
			font-size: inherit !important;
			background-color: #FFF200;
		}

		.gs-result a.gs-visibleUrl, .gs-result .gs-visibleUrl {
			color: #999 !important;
			font-size: .8em;
			font-weight: 200;
			padding: 0;
			height: 2em;
		}



		.gsc-results .gsc-cursor-box .gsc-cursor-current-page {
			color: #fff !important;
			background: #ff5a96;
			width: 1.5em;
			height: 1.5em;
			line-height: 1.5em;
			display: inline-block !important;
			text-align: center;
			border-radius: 1.5em !important;
		}
		
		.gs-result img.gs-image, .gs-result img.gs-promotion-image {
			width: auto;
			height: 120%;
			max-width: 500% !important;
			max-height: 120% !important;
			border: none !important;
			padding: 0 !important;
		}
		.gs-result a.gs-image {
			display: inline-block;
			overflow: hidden;
			width: 6.25em !important;
			height: 6.25em !important;
			float: left;
			box-shadow: 0 1px 3px #000, 0 0 1px #000 inset;
			overflow: hidden;
			display: block;
			border-radius: 7.5em;
			margin: 0 auto -.15em;
			position: relative;
			z-index: 1;
			padding: 0;
		}
		.gs-image-box.gs-web-image-box.gs-web-image-box-portrait,
		.gs-image-box.gs-web-image-box.gs-web-image-box-landscape {
			width: 6.25em !important;
			height: auto !important;
			overflow: visible !important;
			padding: 0;
		}
		.gsc-table-cell-thumbnail { padding: 0; }
		td.gcsc-branding-text div.gcsc-branding-text {
			color: #999;
		}
		td.gcsc-branding-img-noclear a { background: 0 0; }
		.gs-spelling a i {
			    font-family: inherit;
			font-style: normal;
		}
		.gsc-table-cell-snippet-close {
			height: 6.25em;
			padding: .75em 4px 0 2em !important;		
		}
		.gs-webResult div.gs-visibleUrl-long { display: none !important; }
		.gs-result .gs-snippet {
			font-family: "Times New Roman", Times, serif;
			font-style: italic;
		}
		.gs-result a {
			margin: 0 0 0 8.25em;
			display: block;
		}
		
		
		.gsc-result-info-container, 
		form.gsc-search-box { display: none; }
		

		';
    include('snippets/header.php');
    ob_start('simpleComress');

?>
<main>
	<section class="searchResults">
		<h1><a href="javascript:fullScreenInput('Search','<?php echo addslashes($_GET['for']); ?>', '/search/');" class="headerSearchButton nostyle"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="-1 -1 56 56" xml:space="preserve" class="searchIcon animateAll"><g fill="none" stroke="#2c2c2c" stroke-width="2"><path d="M55.7 54.3L39.9 38.5C43.7 34.4 46 29 46 23 46 10.3 35.7 0 23 0S0 10.3 0 23s10.3 23 23 23c6 0 11.4-2.3 15.5-6.1l15.8 15.8c0.4 0.4 1 0.4 1.4 0C56.1 55.3 56.1 54.7 55.7 54.3zM23 44C11.4 44 2 34.6 2 23 2 11.4 11.4 2 23 2s21 9.4 21 21C44 34.6 34.6 44 23 44z"></g></path></svg><?php echo $_GET['for']; ?></a></h1>
		<script src="https://www.google.com/jsapi" type="text/javascript"></script>
		<script type="text/javascript"> 
		  google.load('search', '1', {language : 'en', style : google.loader.themes.V2_DEFAULT});
		  google.setOnLoadCallback(function() {
			var customSearchOptions = {};
			var customSearchControl = new google.search.CustomSearchControl(
			  '013056101972584049933:gbkrmqt2srw', customSearchOptions);
			  
			customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
			 customSearchControl.setLinkTarget(google.search.Search.LINK_TARGET_SELF);
			customSearchControl.draw('cse');

		<?php $qu = (isset($_GET["for"]))?$_GET["for"]:'posters'; ?> // php $_GET to capture the search keyword
			customSearchControl.execute('<?php echo addslashes($qu); ?>');

			function parseParamsFromUrl() {
			  var params = {};
			  var parts = window.location.search.substr(1).split('\x26');
			  for (var i = 0; i < parts.length; i++) {
				var keyValuePair = parts[i].split('=');
				var key = decodeURIComponent(keyValuePair[0]);
				params[key] = keyValuePair[1] ?
					decodeURIComponent(keyValuePair[1].replace(/\+/g, ' ')) :
					keyValuePair[1];
			  }
			  return params;
			}

			var urlParams = parseParamsFromUrl();
			var queryParamName = "for";
			if (urlParams[queryParamName]) {
			  customSearchControl.execute(urlParams[queryParamName]);
			}
		  }, true);
		</script>
		<div id="cse">Loading...</div>
	</section>
	<!--
	<aside class="largeBanner">
				<h2 class="red">Can't find it?</h2>
				<p class="white">We update this website on daily basis with new images, mag posts and tools. Sign up for our beautiful, curated monthly newsletter - you will definitely find something interesting there. Promise!<br />We send <a href="/privacy-policy/">no spam</a>.</p>
				<form method="post" action="/email-submit/" id="emailSubmit">
					<input type="email" name="email" required id="emailInput" placeholder="Enter your email address" value="" maxlength="200" />
					<input type="submit" class="contentButton animateLetterSpacing nostyle" value="Sign up!" />
				</form>
		</aside>
	-->
</main>


<?php 

	ob_end_flush();
	
	$mini_footer = true;
	$script = "
	"; 
	include('snippets/footer.php');
?>