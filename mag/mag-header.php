<?php
$content_type = 'mag';
$css_extra = '';
if(isset($css))$css_extra = $css;


if(!isset($mag_index_page) || $mag_index_page != true)
$css = '
    
    /* HEADER LINK COLORING */
	body > header nav a.blogButton {
		color: #ff5a96;
		font-weight: 700;
		background: #000;
	}
	body > header nav a.blogButton svg path {
		fill: #ff5a96 !important;
	}
	
	body > main { padding-bottom: 0; }
	
	#exploreList {
		margin-top: 0;
		border-top: 1em solid #ff5a96;
		background: #2c2c2c;
		padding-top: 0em;
	}
	
	/* header styles
	main > header {
		background-image: url('.$banner_image.');
		background-size: cover;
	}
	 */
	
	
	h3.author { text-transform: none; margin: 0 auto 0; }
	h3.author img {
		width: 1em;
		height: 1em;
		border-radius: 1.97em;
		border: 1px solid #2c2c2c;
		overflow: hidden;
		margin: 0 0 -0.2em .25em;
		position: relative;
		z-index: 1;
	}
	h3.author small {
		font-size: .5em;
		margin-top: 1em;
	}
	h3.author small a { background: 0 0; padding: 0; }
	h3.author small a:active { color: inherit; }
	
	main > article > section:first-child { padding-top: 3em; }
	
	.shareArrow {
		-webkit-transform: translateY(-.15em) rotate(-45deg) scale(.8,.8);
		-moz-transform: translateY(-.15em) rotate(-45deg) scale(.8,.8);
		transform: translateY(-.15em) rotate(-45deg) scale(.8,.8);
		display: inline-block;
	}
	
	
	
	
	
	section.comments {
		max-width: 63em;
		margin: 0 auto;
		padding: 0 1.5em 3em 1.5em;
	}
	section.comments > section:first-child {
		padding: 0;
	}
	
	
	#exploreList {
		font-size: 1.5em;
	}
	#exploreList > h1 {
		max-width: 100%;
		text-align: center;
    }
	
	
	
	
	
	#rel_next { display: none; }
	
	
	
	
	';
	
	
	$css .= $css_extra;
	$meta_image = $banner_image;
	if(isset($description)){ $description_header = $description; $description = strip_tags($description); }
	else $description_header = '';
	
    include_once('../snippets/header.php');
    ob_start('simpleComress');
    
    
    
    
    //$permalink_url = preg_replace('/\.php$/', '', __FILE__);
	//convert date to human-readable one
	if(isset($datetime)){
		list($datetime_year, $datetime_month, $datetime_day) = explode('-', $datetime);
		$month_object   = DateTime::createFromFormat('!m', $datetime_month);
		$month_name = $month_object->format('M');
		$datetime_human = $month_name.' '.$datetime_day.', '.$datetime_year;
	}
?>
	<main itemscope="" itemtype="http://schema.org/BlogPosting"><?php 
		
		if(!isset($special_header) && (!isset($mag_index_page) || $mag_index_page != true)){ 
		
		?>
		<header class="white scrollButton<?php if(!$blur_headers) echo ' loadingContainer'; ?>" <?php if($blur_headers) echo 'style="background-image: url(/images/thumbnails/?blur=2&i='.$banner_image.')"';?>>
			<img src="<?php echo $banner_image; ?>" alt="<?php echo $title; ?>"/>
			<div>
				<section>
					<h1 class="noHyphens"><?php echo $body_title; ?></h1>
					<p class="statsAndShare"><?php echo $share_html; ?><?php echo '<small><time datetime="'.$datetime.'" itemprop="datePublished">'.$datetime_human.'</time></small>';
					?></p>
					
					<?php echo $scroll_button_html; ?>
				</section>
			</div>
		</header><?php } else if (isset($special_header)) echo $special_header; ?>
		
		<article itemprop="articleBody" id="articleBody" >
			<?php if(isset($mag_index_page) && $mag_index_page == true) echo '<section id="exploreList">'; ?>
			<?php 
			if(!isset($banner_image_author))$banner_image_author = 'ArtSocket';
			if((!isset($mag_index_page) || $mag_index_page != true) && !isset($skip_author)) echo '<section>
				<h3 class="author">By <a href="/talent/'.strtolower(str_replace(' ', '-',$author)).'/" rel="author" class="darkGrey" title="Author of this article" itemprop="author" itemscope="" itemtype="http://schema.org/Person"><span itemprop="name">'.$author.'</span><img src="/images/thumbnails/?i=/images/content/pages/about-'.strtolower(str_replace(' ', '-',$author)).'.jpg&amp;m=s_profile" alt="author"></a><small>Header image credit: '.$banner_image_author.'</small></h3>';
			?>