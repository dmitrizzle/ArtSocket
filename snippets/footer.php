

<!-- FOOTER -->
<?php 

/*
if(!isset($footer_action_title))
$footer_action_title = "Start exploring our curated art and photography collection:";
if(!isset($footer_action_verb))
$footer_action_verb = "Explore";
if(!isset($footer_action_url))
$footer_action_url = "/";
*/

ob_start('simpleComress'); ?>
<footer style="padding-bottom: 6em;">
	<div class="logoButton" onclick="read(0,0);" title="Click to scroll all the way up" style="box-shadow: 0 0 .15em #000;"></div>
	
	<?php
	
		if ( isset($mini_footer) && $mini_footer == true && strpos($_SERVER['REQUEST_URI'], '/mag/') == -1 ){
		
	?>
	<div style="width:100%;height:10em;background:#1DA1F2;margin-top:-1.5em;border-top:.15em solid #FFF200;">
		
		<a href="https://twitter.com/artsocket" class="nostyle contentButton animateAll white" style="width: 20em;
    margin: 3.5em auto .5em;" target="_blank" rel="nofollow"  onclick="ga('send', 'event', 'Twitter Follow CTA', 'Footer', document.title);">
    		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="21px" height="21px" viewBox="0 0 21 21" enable-background="new 0 0 21 21" xml:space="preserve" style="margin:-.33em .5em -.33em 0;">
    			<path d="M20.682 4.183c-0.748 0.333-1.555 0.557-2.398 0.658c0.863-0.517 1.525-1.335 1.836-2.311 c-0.807 0.479-1.701 0.827-2.652 1.014c-0.762-0.812-1.848-1.319-3.049-1.319c-2.309 0-4.178 1.871-4.178 4.2 c0 0.3 0 0.6 0.1 0.953C6.875 7.2 3.8 5.5 1.7 2.988C1.376 3.6 1.2 4.3 1.2 5.1 c0 1.4 0.7 2.7 1.9 3.477C2.344 8.5 1.7 8.4 1.1 8.044c0 0 0 0 0 0.052c0 2 1.4 3.7 3.4 4.1 c-0.351 0.095-0.72 0.146-1.101 0.146c-0.269 0-0.531-0.026-0.786-0.074c0.532 1.7 2.1 2.9 3.9 2.9 c-1.43 1.12-3.231 1.788-5.189 1.788c-0.337 0-0.67-0.02-0.997-0.059c1.849 1.2 4 1.9 6.4 1.9 c7.686 0 11.887-6.366 11.887-11.888c0-0.181-0.004-0.361-0.012-0.541C19.414 5.8 20.1 5 20.7 4.183z" class="bird" style="fill:#fff;"></path>
			</svg>ArtSocket on Twitter</a>
			
		<small class="white">
			<strong>Connect with artists, get inspired &amp; share your opinions.</strong> Follow us for daily inspiration of art and photography, drop us a line and stay in touch!</small>
			
			
    </div>
    <?php } ?>
    
	<hr />
	
	<nav>
		<ul class="footerLinks">
			<li>
				<a href="/about/" class="white">About</a>
			</li>
			<li>
				<a href="/art/" class="white">Art Gallery</a>
			</li>
			<li>
				<a href="/talent/" class="white">Talent</a>
			</li>
			<li>
				<a href="/mag/" class="white">Gallery Magazine</a>
			</li>
		</ul>
		<ul class="footerLinks">
			<li>
				<a href="/submit/" class="red"><strong>Submit Your Articles & Photography</strong></a>
			</li>
			<li>
				<a href="/search/" class="white">Search ArtSocket</a>
			</li>
			<li>
				<a href="/contact/" class="white">Contact Us</a>
			</li>
		</ul>
		<ul class="footerLinks">
			<li>
				<a href="/privacy-policy/" class="white">Privacy policy</a>
			</li>
			<li>
				<a href="/terms-of-service/" class="white">Terms of service</a>
			</li>
			<li>
				<a href="/warranty/" class="white">Warranty</a>
			</li>
			<li>
				<a href="/return-policy/" class="white">Return policy</a>
			</li>
			<!--
			<li>
				<a href="/origami/" class="white freePrintables">FREE Printables</a>
			</li>
			
			<li>
				<a href="http://google.com/+ArtSocket" rel="publisher" target="_blank" class="white" rel="nofollow">Google+</a>
			</li>
			<li>
				<a href="https://pinterest.com/artsocket/pins/" target="_blank" class="white" rel="nofollow">Pinterest</a>
			</li>
			<li>
				<a href="http://instagram.com/artsocket" target="_blank" class="white" rel="nofollow">Instagram</a>
			</li>
			-->
		</ul>
		<ul class="footerLinks">
			<li>
				<a href="/art/archive/" class="blue"><strong>Art & Photography Archive</strong></a>
			</li>
		</ul>
		<ul class="footerLinks">
			<li>
				<a href="/subscribe/" class="white">Email Newsletter</a>
			</li>
			<li>
				<a href="https://twitter.com/artsocket" target="_blank" rel="nofollow" class="yellow"><strong>Twitter</strong></a>
			</li>
			<li>
				<a href="https://pinterest.com/artsocket" target="_blank" rel="nofollow" class="white">Pinterest</a>
			</li>
			<li>
				<a href="https://medium.com/artsocket-magazine" target="_blank" rel="nofollow" class="white">Medium</a>
			</li>
			<li>
				<a href="https://www.instagram.com/dmitrizzle/" target="_blank" rel="nofollow" class="white">Instagram</a>
			</li>
		</ul>
	</nav>
	
	
	
	<section class="securityInfo center">
		
		<p><small>Payment processing on ArtSocket is done by <a href="https://stripe.com" rel="nofollow" target="_blank">Stripe</a> - trusted by companies like Twitter, Shopify, Pinterest and KickStarter. Read our <strong><a href="/privacy-policy/">privacy policy</a></strong> to learn which information we keep and collect.</small></p>
		<img src="/images/content/pages/index-stripeBadge.png" alt="Stripe logo">
		
		
		<p><small>ArtSocket is scanned and verified daily by SliteLock against malware. <strong><a href="javascript:void(0);" onclick="window.open('https://www.sitelock.com/verify.php?site=artsocket.com','SiteLock','width=600,height=600,left=160,top=170');">Read today's security report</a></strong>.</small></p>
		<img src="/images/content/pages/secure-cards.png" data-image="/images/content/pages/secure-cards.png" alt="Accepted credit cards">
		<img src="//shield.sitelock.com/shield/artsocket.com" alt="Website security">
	
	
	</section>
	
	
</footer>


<script>


/* LOAD ALL ON-PAGE SCRIPTS */
function ea(){<?php if($script) echo $script; ?>}j=document.getElementsByTagName("script");done=!1;for(i=0;i<j.length;i++)j[i].src.indexOf("snippets/javascript")>-1&&(j[i].onload=j[i].onreadystatechange=function(){this.readyState&&"loaded"!==this.readyState&&"complete"!==this.readyState||(ea(),done=!0,j[i]&&(j[i].onload=j[i].onreadystatechange=null))},"undefined"==typeof $||done||ea());




<?php
//LOAD STYLESHEET (DEBLOCKING) - from https://developers.google.com/speed/docs/insights/OptimizeCSSDelivery
// generated critical path at: http://jonassebastianohlsson.com/criticalpathcssgenerator/
if(isset($critical_css)){ ?>
var cb=function(){var e=document.createElement("link");e.rel="stylesheet",e.href="<?php echo $css_load; ?>";var a=document.getElementsByTagName("head")[0];a.parentNode.insertBefore(e,a)},raf=requestAnimationFrame||mozRequestAnimationFrame||webkitRequestAnimationFrame||msRequestAnimationFrame;raf?raf(cb):window.addEventListener("load",cb);
<?php } ?>
	



/* GOOGLE ANALYTICS */
!function(e,a,t,n,c,o,s){e.GoogleAnalyticsObject=c,e[c]=e[c]||function(){(e[c].q=e[c].q||[]).push(arguments)},e[c].l=1*new Date,o=a.createElement(t),s=a.getElementsByTagName(t)[0],o.async=1,o.src=n,s.parentNode.insertBefore(o,s)}(window,document,"script","//www.google-analytics.com/analytics.js","ga"),ga("create","UA-26049398-1","auto"),ga("send","pageview");

/* TRACK JS ERRORS IN ANALYTICS */
/* http://davidwalsh.name/track-errors-google-analytics */
window.addEventListener('error',function(e){
	ga('send', 'event', 'JavaScript Error', e.message,e.filename+':  '+e.lineno);
});

</script>

<!-- Eureka King -->
<script>
(function(){ eurekaKingId = "artsocket";
function a(){var t=document.createElement("script");t.type="text/javascript",t.async=!0,t.src="https://s.eurekaking.com";var e=document.getElementsByTagName("script")[0];e.parentNode.insertBefore(t,e)}window.attachEvent?window.attachEvent("onload",a):window.addEventListener("load",a,!1);})();
</script>

<?php /*
<!-- Twitter conversion tracking -->
<script src="//platform.twitter.com/oct.js"></script>
<script> if(typeof twttr !== 'undefined') twttr.conversion.trackPid('l4rdj');</script>
<noscript>
<img height="1" width="1" style="display:none;" alt="" src="https://analytics.twitter.com/i/adsct?txn_id=l4rdj&p_id=Twitter" />
<img height="1" width="1" style="display:none;" alt="" src="//t.co/i/adsct?txn_id=l4rdj&p_id=Twitter" />
</noscript>
*/ ?>
                

<?php ob_end_flush(); ?>

</body>
</html>