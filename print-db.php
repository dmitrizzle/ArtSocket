<?php
	include('snippets/image-db.php');
	
	$story_content = '';
	$title_content = '';
	$author_block_content = '';
	$author_content = '';
	foreach($slides as $value) {
		if($value[0] == $_GET['nametag']){
			if (strpos($value[3], '<p>') !== FALSE)
			$story_content = $value[3];
			else $story_content = '<p>'.$value[3].'</p>';
			
			if($value[3] == ''){
				$story_content = '<p><em>'.explode(' ',trim($value[4]))[0]." didn't write an artist statement for this image. Most images chosen to be here don't need a background story; they stand wonderfully on their own. If you would like to learn more about this work, have a look at <a href=\"/talent/".str_replace(' ','-',strtolower($value[4]))."/\">".explode(' ',trim($value[4]))[0]."'s portfolio</a>. That's where you can understand the style, inspirations and find more similar creations from this artist.</em></p>";
			}	
			
			
			$title_content = $value[2];
			
			$author_block_content = '<a href="/talent/'.str_replace(" ", "-",strtolower($value[4])).'/" rel="author" class="darkGrey"><span>'.$value[4].'</span><img src="/images/thumbnails/?i=/images/content/pages/about-'.str_replace(" ", "-",strtolower($value[4])).'.jpg&m=s_profile"  alt="artist" /><img src="/images/content/pages/signature-'.str_replace(" ", "-",strtolower($value[4])).'.jpg" class="signature"></a>';
			
			$author_content = $value[4];
		}
	}
	
	$arr = array('story' => $story_content, 'title' => $title_content, 'author-block' => $author_block_content, 'author' => $author_content);
	
	header('Content-Type: application/json');
	echo json_encode($arr);
	exit();

?>