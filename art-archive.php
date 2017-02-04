<?php
    $title = 'Archive';
    $description = 'A collection of formerly featured artwork & photography that could still be bought as prints.';
    $css = '
	
	/* HEADER LINK COLORING */
	body > header nav a.homeButton {
		color: #ff5a96;
		font-weight: 700;
		background: #000;
	}
	body > header nav a.homeButton svg path {
		fill: #ff5a96 !important;
	}
	
	
	
	';
    include('snippets/header.php');
    ob_start('simpleComress');
?>


	<main>
		<article>
			<section>
				<h1 class="center">Archive</h1>
				<?php 
					$ajax_request = true;
					include_once('people/person.php');
					include('snippets/image-db.php');
				?>
				<h4 class="center"><a href="javascript:read('currentSelections');"><?php echo count($slides); ?> works</a> by <a href="/artist/"><?php echo count($artist_directory); ?> artists</a>.</h4>
				
				<p>Depending on number and quality of submissions we occasionally (about once a month) revise our <a href="/art/">collection</a> to reflect new styles and the evolving moods of our artists. As a result some pieces (no matter how brilliant) are bound to be retired from the "<a href="/art/"><strong>Art & Photography</strong></a>" page. This page is a convenient place to find all of the past works in one place.</p>
				
			</section>
			
			<section class="archiveGrid">
				<h2 id="currentSelections">Current Selections:</h2>
				<?php
					
					foreach($slides as $value) {
						if($value[6] !== false || !isset($value[6]))
						echo '<a href="/art/'.$value[0].'/"><img src="/images/thumbnails/?i=/images/art/L_'.$value[1].'&m=tiny_square" alt="'.$value[2].'" title="'.$value[2].'" class="animateAll" /></a>';
					}
				?>
			</section>
			<hr />
			<section class="archiveGrid">
				<h2 class="center">Past Selections:</h2>
				<?php
					foreach($slides as $value) {
						if($value[6] === false)
						echo '<a href="/art/'.$value[0].'/"><img src="/images/thumbnails/?i=/images/art/L_'.$value[1].'&m=tiny_square" alt="'.$value[2].'" title="'.$value[2].'" class="animateAll" /></a>';
					}
				?>
			</section>
			
		</article>
	</main>

<?php 

	ob_end_flush();
	
	$script = "
		
		$$('.archiveGrid > a img').each(function(el, i){
		
			Asset.image(el.get('src'), {
				onLoad: function(){
					el.setStyle('opacity',1);
				}
			});
		
		});
		
		
	"; 
	include('snippets/footer.php');
?>