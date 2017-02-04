<?php
	$title = 'Submit Your Photography & Articles';
	$description = '$525USD per work earning potential. Dedicated readership and viewership.';
	
    $css = '
    
    	body > header nav a.submitButton { background: #000; }
		body > header nav a.submitButton svg path {
			fill: #ff5a96 !important;
			
		}

    	main > header:before {
    		padding: 0;
    	}
    	main > header {
			height: 50vh;
background: url(/images/content/pages/analog_cafe_bg.jpg) bottom;
background-size: cover;
		}
		main > header > div {
			height: auto;
			margin-top: -100vh;
			position: relative;
		}
		
		
		
		
		
		
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
	</header>
	
			<section class="submitForm">
				<h1><span class="red">Submit</span> Film Photography</h1>
				<p>Analog.Cafe is an online publication dedicated to film photography, the people and the stories that make it special.</p>
				<p>Your submissions will be considered for the new Twitter, Instagram and Medium feeds as well as the website that is to be launched Summer 2017.</p>
				
				<div id="jotform">
					<!-- SUBMISSION FORM EMBEDDED AS IFRAME GOES HERE -->
				</div>
				
				
			</section>
	<section id="terms"><!-- YOUR TERMS FOR SUBMISSION --></section>
	
	
</main>


<?php 

	ob_end_flush();
	
	$script = "
	"; 
	include('snippets/footer.php');
?>