			</section>
		</article>
		
	</main><?php if(!isset($mag_index_page) || !$mag_index_page){?>
	
	<!-- COMMENTS
	<section class="comments">
		<section id="disqus_thread"></section>
	</section>
	-->
	
	<!-- READ NEXT -->
	<section id="exploreList">
		<h1 class="white"></h1>
		<p class="center white hint"></p>
	</section>
	
	
	<?php
		if(isset($rel_next)){
			echo '
			<div id="rel_next">
				<a href="'.$rel_next.'" class="nostyle white mag animateAll" data-background-image="/images/thumbnails/?blur=2&i=/images/content/mag/'.$rel_next_id.'_header.jpg">
					<section>
						<h2>
							<span class="titleText">'.$rel_next_title.'</span>
							<span class="abstract">'.$rel_next_abstract.'</span><span class="label yellow">Article</span>
						</h2>
					</section>
				</a>
			</div>';
		
		}
	?>
	
				
				
			
			
			
			
			
	
	<?php } ?>

	<?php
	ob_end_flush();
	
	if(!isset($script))$script = "";
	
	$script .= "
	
	/*
	//COMMENTS
    $$('.commentsLink').addEvent('click', function(e){
        e.stop();
        read('disqus_thread');
    });
    $$('.shareLinkScroll').addEvent('click', function(e){
        e.stop();
        read('shareSocial');
    });
    */
    
	
	
	";
	
	/*
	var disqus_config = function () {
        this.page.url = '".$c."';
    };
    (function() {
        var d = document, s = d.createElement('script');
        s.src = '//artsocketblog.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
    
    
    






	// count comments
	(function () {
	var s = document.createElement('script'); s.async = true;
	s.type = 'text/javascript';
	s.src = '//' + disqus_shortname + '.disqus.com/count.js';
	(document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
	}());
	
	// subscribe
	var submitButton = $$('#emailSubmit .contentButton')[0];
	$$('#emailSubmit').addEvent('submit', function(e){
		e.stop();
		liFx();
		submitButton.addClass('active');
		new Request.HTML({
			url:'/email-submit.php',
			onComplete:function(a, b, c){
				killNotify();
				(function(){ 
					notify(c, true); 
					lo();
					submitButton.removeClass('active');
				}).delay(600);
			},
			data: $('emailSubmit')
		}).send();
	});
	*/
	
	
	if(!isset($mag_index_page) || !$mag_index_page) $script .= "

	
	
	// READ NEXT SCRIPTS:
	if(!$('rel_next')){
		new Request.HTML({ 
			url: '/mag/?ajax_request=true&filter_next=".$permalink_url."&app_elsewhere=false', 
			onSuccess: function(tree, elements, html){ 
		
				if(html != ''){
					$('exploreList').set('html', $('exploreList').get('html')+html);
					$$('#exploreList > h1').set('html','Read Next:');
				
					$$('#exploreList p.hint').set('html', 'Our next featured magazine article is called <strong>\"' + elements.getElements('.titleText')[0].get('html') + '\"</strong>:');
						
					exploreListCare();
				}
			
				// if this is the last article:
				else{
					new Request.HTML({ 
						url: '/art/?ajax_request=true&filter_position=0', 
						onSuccess: function(tree, elements, html){ 
		
							$('exploreList').set('html', $('exploreList').get('html')+html);
							$$('#exploreList > h1').set('html','ArtSocket Art Gallery');
												
							$$('#exploreList p.hint').set('html', 'Browse our selections for this month\'s exhibition on ArtSocket. Starting with <strong>\"' + elements.getElements('.titleText')[0].get('html') + '\"</strong>:');
						
						
							exploreListCare();
						}
					}).send(); 
				}
			
			}
		}).send();
	}else{
	
		// next article as perscribed by rel next:
	
		$('exploreList').set('html', $('exploreList').get('html')+$('rel_next').get('html'));
		$$('#exploreList > h1').set('html','Read Next:');
	
		$$('#exploreList p.hint').set('html', 'Our next featured magazine article is called <strong>\"' + $$('#rel_next .titleText')[0].get('html') + '\"</strong>:');
			
		exploreListCare();
	
	}
	
	
	
	
	";
	
	if(isset($mag_index_page) && $mag_index_page){
		$mini_footer = true;
		$script .= "";
	}
?>