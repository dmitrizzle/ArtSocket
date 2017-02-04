<?php
	$content_type = 'art';
	$title = ''; //  title will set automatically in the header.php
    $description = ''; // description will set automatically in the header.php
    $product_page = true;
	
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
	
	
	
	/* JUST FOR THE SLIDER */
	#imageSlider {
		padding: 0;
		margin: 0;
		max-width: 100%;
		width: 100%;
		border: 0;
		overflow: hidden;
		background: #000;
		cursor: pointer;
		
		height: 100%;
	}
	#imageSlider div {
		overflow: hidden;
	}
	#imageSlider, #imageSlider > div, main {
		-webkit-transform: translate3d(0, 0, 0);
		-moz-transform: translate3d(0, 0, 0);
		-ms-transform: translate3d(0, 0, 0);
		transform: translate3d(0, 0, 0);
	}
	#imageSlider div > article {
		overflow: hidden;
		width: 100vw;
		height: 100vh;
		padding: 0;
		margin: 0;
		
		/*
		float: none;
		opacity: 0;
		background-size: cover;
		background-position: center;
		background-repeat: no-repeat;
		
		-webkit-transition: all 300ms;
		-moz-transition: all 300ms;
		transition: all 300ms;
		*/
		
		float: left;
		
		background-size: cover;
		background-repeat: no-repeat;
		background-position: center;

	}
	#imageSlider.fullScreen div > article {
		background-size: auto 100%;
	}
	#imageSlider.fullScreen div > article.wide {
		background-size: 100% auto;
	}
	
	
	
	
	
	#imageSlider > div.init {
		margin-left: 0 !important;	
	}
	/*
	#imageSlider div > article.imageLoaded {
		background-size: 0;
	}
	*/
	
	
	
	#imageSlider div > article .imageAligner {
		margin: 0 auto;
		padding: 0;
		max-width: 100%;
		
		/*
		background-size: cover;
		opacity : 0.5;
		*/
	}
	
	#imageSlider div > article .imageAligner,
	#imageSlider div > article .imageAligner figure,
	#imageSlider div > article .imageAligner figure img {
		height: 100vh;
		width: auto;
	}
	
	#imageSlider figure figcaption {
		position: relative;
		bottom: 3.5em;
		border-radius: .333em;
		text-align: center;
		color: #fff;
		font-size: .75em;
		width: 24em;
		max-width: 99%;
		margin: 0 auto;
		background: rgba(44, 44, 44, .65);
		cursor: pointer;
	}
	
	#imageSlider figure figcaption,
	#imageSlider:not(.fullScreen) figure.show figcaption {
		-webkit-transform: translateY(50vh);
		-moz-transform: translateY(50vh);
		transform: translateY(50vh);
		opacity: 0;
	}
	#imageSlider figure.show figcaption {
		-webkit-transform: translateY(0);
		-moz-transform: translateY(0);
		transform: translateY(0);
		opacity: 1;
	}
	
	#imageSlider figure figcaption span.title {
		max-width: 11em;
		white-space: nowrap;
		overflow: hidden;
		text-overflow: ellipsis;
		display: inline-block;
		line-height: .95em;
		height: 1em;
		margin-bottom: -.15em;
	}
	#imageSlider figure figcaption span.authorName {
		color: #ff5a96;
	}
	
	
	#imageSlider figure figcaption span.arrow {
		display: inline-block;
		width: 1.25em;
		height: 1.25em;
		border-radius: 1.25em;
		line-height: 1.275em;
		padding: .15em calc(.15em - .5px) .15em calc(.15em + .5px);
		margin-left: .5em;
		color: transparent;
		background-color: #000;
		background-image: url(/design/header-downArrow.svg);
		background-size: 60%;
		background-repeat: no-repeat;
		background-position: center;
	}
	
	
	
	
	#imageSlider div > article .imageAligner figure img.zoomedOut {
		-webkit-transform: scale(1,1) !important;
		-moz-transform: scale(1,1) !important;
		-ms-transform: scale(1,1) !important;
		transform: scale(1,1) !important;
	}
	#imageSlider div > article .imageAligner figure img.loading {
		opacity: 0;
	}
	#imageSlider div > article.slidePage .imageAligner figure img.loading {
		-webkit-transform: scale(0,0) !important;
		-moz-transform: scale(0,0) !important;
		-ms-transform: scale(0,0) !important;
		transform: scale(0,0) !important;
	}#imageSlider div > article.slidePage .imageAligner figure img {
		transition: transform 300ms, opacity 1200ms ease-out;
	}
	
	.imageDetails {
		background: #fff;
		display: none;
		opacity: 0;
		overflow: hidden;
	}
	.imageDetails.slidePage {
		display: block;
		overflow: hidden;
	}
	#imageSlider .imageDetails.slidePage {
		margin-top: 100vh;
		position: relative;
   		z-index: 2;
	}
	
	
	.storyContent {
		padding: 0;
		min-height: 5em;
		margin: 0;
		border-bottom: 1px solid #e5e5e5;
	}
	.storyContent.loadingContainer {
		max-width: 10.5em;
	}
	.storyContent p, .productDetails p {
		padding: 0 0 1.5em;
	}
	@media only screen and (min-width:823px){
		.storyContent.expanded {
			min-height: 44em;
		}
	}
	
	
	
	
	.imageDetails { position: relative; }
	.imageDetails > aside, .imageDetails > a, .imageDetails > section {
		padding-right: 27em;
		width: auto;
	}
	.imageDetails > h1 {
		padding-right: 7.714em;
		width: auto;
		max-width: 12em;
	}
	.imageDetails > h3 {
		padding-right: 18em;
		width: auto;
	}
	
	
	p.statsAndShare {
	    padding-left: 0;
		background: 0 0;
		-webkit-clip-path: none;
		clip-path: none;
		padding-right: 0;
		margin-left: 0;
		text-align: center;
		max-width: calc(100% - 27em);
	}
	p.statsAndShare:before, p.statsAndShare:after {
		display: none;
	}
	main:not(.initial) p.statsAndShare svg path {
		fill: #2c2c2c;
	}
	
	
	a.moreLink.nostyle {
		padding: .1em .25em .2em;
		border-radius: .15em;
		display: block;
		width: 17.65em;
		margin-top: .5em;
	}
	a.moreLink.nostyle:active, a.moreLink.nostyle.active {
		background: #00AEEF;
	}
	
	a.moreLink.nostyle .sticker { font-size: .75em; }
	a.moreLink.nostyle .sticker small {
		display: inline-block;
	}
	a.moreLink.nostyle > strong {
		text-decoration: underline;
	}
	
	
	
	.imageDetails section.eCom > div section {
		padding: 0;
	}
	
	
	
	.imageDetails section.eCom {
		padding: 2.2em 1.5em 0 1.5em;
		border-left: 1px solid rgba(44, 44, 44, 0.1);
		margin-left: 1.5em;
		width: 24em;
		opacity: 0;
		position: absolute;
		bottom: 0;
		top: 0;
		right: 0;
	}
	
	.imageDetails section.eCom .shippingInfo { padding: 0 1em 1.5em 0; }
	.imageDetails section.eCom .shippingInfo a { color: #999; }
	
	.imageDetails section.eCom strong.sale {
		display: block;
		overflow: hidden;
		width: 11.65em;
		padding: .7em .5em .7em 4em;
		line-height: 1.15em;
		margin: 0 0 .5em 0;
		border-radius: 3px;
		box-shadow: 0 0 0 1px #ec0000 inset;
		text-align: left;
		cursor: pointer;
		background: #ff5a96 url(/images/content/pages/product-winter-holidays-hat.svg) no-repeat .25em;
		background-size: 3em;
	}
	.imageDetails section.eCom strong.sale span.clarify {
		font-size: .8em;
		display: block;
		font-weight: 400;
	}
	.imageDetails section.eCom strong.sale span.clarify .strong {
		font-weight: 700;
	}
	
	
	.imageDetails section.eCom .printSizeInfo {
		background: url(/images/content/pages/about-poster-size.jpg);
		background-size: cover;
		margin-bottom: 1em;
		height: 8em;
		border-radious: .15em;
	}
	.imageDetails section.eCom .printSizeInfo p {
		background: 0 0;
		padding: 5em 5em 0;
		line-height: 1.5em;
		text-align: center;
		font-size: .85em;
		color: #fff;
	}
	.imageDetails section.eCom .printStats p {
		padding: 0;
		padding-bottom:.75em;
		line-height: 1.3em;
		letter-spacing: .05em;
	}
	.imageDetails section.eCom .printStats p > small { color: #2c2c2c; }

	.imageDetails section.eCom .printStats small {
		display: inline;
	}
	
	.imageDetails section.eCom .sticker {
		background: #ff5a96;
		padding: 0.05em .25em;
		border-radius: .15em;
		color: #fff;
		margin-right: .15em;
	}
	.imageDetails section.eCom .sticker.blue {
		background: #00AEEF;
	}
	
	.imageDetails figure.productPreview {		
		margin: 0 auto;
		background: #fff;
		padding: 3em 0 0;
		overflow: visible;
		max-height: initial;
		text-align: center;
		z-index: 5;
		position: relative;
	}
	
	.imageDetails .productHeader {
		padding: 2em 0 .5em;
	}
	.overshadowWhite {
		background: #fff;
		z-index: 1;
		position: relative;
	}
	
	.imageDetails figure.productPreview  > img {
		width: calc(100% - 5em);
		height: auto;
		background-color: #f6f6f6;
		border: .2em solid #f6f6f6;
		background-size: 18%;
		display: inline-block;
		z-index: 2;
		position: relative;
		
		background-repeat: no-repeat;
		background-position: bottom left;
		box-shadow: 0 -.05em .375em rgba(0, 0, 0, .5);
		
		
	}

	.imageDetails figure.productPreview.portrait > img {
		height: auto;
		width: auto;	
		max-width: 100%;
		max-height: 75vh;
		margin: 0 auto;	
	}
	
	.imageDetails .royaltiesBreakdown {
		z-index: 5;
		position: relative;
		padding-top: 6em;
		background: #fff;
		text-align: center;
	}
	.imageDetails .royaltiesBreakdown small.center {
		max-width: 32em;
		margin: 0 auto;
	}
	@media only screen and (max-width:822px){
		.imageDetails .royaltiesBreakdown { display: none; }
	}
	
	
	
	/* LEARN MORE LINKS */
	.imageDetails .royaltiesBreakdown .hintLinkLearnMore {
		padding-top: 1em;
	}
	.imageDetails .royaltiesBreakdown .hintLinkLearnMore a:active strong,
	.imageDetails .royaltiesBreakdown .hintLinkLearnMore a.active strong {
		color: #fff;
	}
	
	
	
	
	
	.imageDetails section.eCom > section {
		padding: 0;
	}
	.imageDetails section.eCom > div {
		padding-bottom: 2.1em;
	}
	
	
	a.buyPrint {
		color: #2c2c2c !important;
		background: rgba(255, 255, 255, .9);
		width: 16.5em;
	}
	a.buyPrint.active,
	a.buyPrint:active {
		-webkit-animation: buyLoading 10000ms;
		-moz-animation: buyLoading 10000ms;
		animation: buyLoading 10000ms;
		
		background: #00AEEF !important;
		color: #fff !important;
	}
	@-webkit-keyframes buyLoading {
		0% { box-shadow: 0em 0 0 -1em rgba(255, 255, 255, 0.5) inset; }
		20% { box-shadow: 6em 0 0 -1em rgba(255, 255, 255, 0.5) inset; }
		100% { box-shadow: 8em 0 0 -1em rgba(255, 255, 255, 0.5) inset; }
	}
	@-moz-keyframes buyLoading {
		0% { box-shadow: 0em 0 0 -1em rgba(255, 255, 255, 0.5) inset }
		20% { box-shadow: 6em 0 0 -1em rgba(255, 255, 255, 0.5) inset }
		100% { box-shadow: 8em 0 0 -1em rgba(255, 255, 255, 0.5) inset }
	}
	@keyframes buyLoading {
		0% { box-shadow: 0em 0 0 -1em rgba(255, 255, 255, 0.5) inset }
		20% { box-shadow: 6em 0 0 -1em rgba(255, 255, 255, 0.5) inset }
		100% { box-shadow: 8em 0 0 -1em rgba(255, 255, 255, 0.5) inset }
	}
	a.buyPrint.loadingContainer { color: transparent !important; }

	a.buyPrint.loadingContainer small { visibility: hidden; }
	
	a.buyPrint .printPrice:before {
		content: "$";
	}
	
	a.buyPrint.active .red,
	a.buyPrint:active .red {
		color: #fff;
	}
	
	.imageDetails > a.buyPrint {
	    display: block;
		margin: 1em auto 0em;
		padding: 0.75em;
		background: #fff;
		box-shadow: 0 0 0em 4em #fff;
		z-index: 4;
		position: relative;
    }
	
	
	.imageDetails section.eCom h4 > small { display: block; }
	
	.imageDetails section.eCom small.shipInfo {
		padding-top: 0.2em
	}
	
	
	
	
	
	
	
	
	.customerReviews {
		margin: 0 auto 3em;
		display: block;
		max-width: 32.2em;
		width: 90%;
	}
	
	.imageDetails section.genericImagInfo > p:last-child small { color: #2c2c2c; }
	
	
	
	
	@media only screen and (max-width:822px){
	
		.moreLink, .expandHint {
			text-align: center;
			display: block;
		}
		
		
		
		.imageDetails > aside, .imageDetails > a, .imageDetails > section,
		.imageDetails > h1, .imageDetails > h3, p.statsAndShare {
			padding-right: 0;
		}
		
		/*
		.imageDetails > section:nth-child(3) {
			padding-left: 0.25em !important;
		}
		*/
		
		p.statsAndShare {
			padding-right: 0;
			margin: 0 auto;
			max-width: 100%;
		}
		.imageDetails section.eCom {
			opacity: 1;
			position: relative;
			border: none;
			width: 100%;
			margin: 0;
			padding: 0;
		}
		.imageDetails section.eCom > div .contentButton,
		.imageDetails section.eCom section.genericImageInfo,
		.imageDetails section.eCom h4 { display: none; }
		
		a.moreLink.nostyle {
			margin: -1em auto 0;
		}
		
		.imageDetails section.eCom .shippingInfo {
			text-align: center;
			padding: 0 0 1.5em;
		}
		
		.imageDetails > a.buyPrint { box-shadow: none; margin-bottom: 1.5em; }
		.imageDetails > h1 { text-align: center; }
	}
	@media only screen and (max-width:500px){
	
	}
	
	
	
	
	
	
	
	
	
	
	
	/*
	
	.productDetails {
		padding: 0;
		margin: 0;
		opacity: 0;
	}
	
	.productDetails > h2:first-child {
		background-image: url(/images/content/pages/about-artHeader.jpg);
		background-size: 100%;
		background-repeat: no-repeat;
		background-position: center -1.5em;
		height: 2.65em;
		padding-bottom: 0;
	}
	@media only screen and (max-width:480px){
		.productDetails > h2:first-child {
			background-position: bottom center;
			height: 5em;
		}
	}
	@media only screen and (max-width:375px){
		.productDetails > h2:first-child {
			height: 3em;
		}
	}
	
	
	.productDetails > small.white {
		background-size: cover;
		box-shadow: 0 0 0 6em rgba(44, 44, 44, 0.83) inset;
		max-width: 44.4em;
		text-align: center;
		margin: 0 auto 3em;
		padding: 3em;
		line-height: 1.2em;
		font-weight: 700;
		font-family: "Times New Roman", Times, sans-serif;
		font-style: italic;
	}
	.productDetails > small.white a.expandProductDetail {
		font-family: Raleway, sans-serif;
		font-style: normal;
		background: #ff5a96;
		display: block;
		width: 6em;
		margin: .5em auto 0
	}
	.productDetails > .productDetailInfo { display: none; padding: 0 0 3em; }
	
	
	
	.productDetails ul {
		margin: 0;
		max-width: 100%;
		padding-bottom: .75em;
		padding-top: 3em;
	}
	
	.productDetails blockquote {
		font-size: 1em;
		max-width: 34em;
	}
	.productDetails blockquote p {
		padding: 0;
		line-height: 1.25em;
	}
	
	
	*/
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	#aboutThisImage {
		max-width: 100%;
		background: #fff;
	}
	/*	
		-webkit-transform: translateY(-28.571vh);
		-moz-transform: translateY(-28.571vh);
		transform: translateY(-28.571vh);
		
	}
	#aboutThisImage.fullScreen {
		-webkit-transform: translateY(0);
		-moz-transform: translateY(0);
		transform: translateY(0);
	}
	*/
	
	#aboutThisImage:before {
		content: "";
		width: 0%;
		display: block;
		height: 2px;
		background: #ff5a96;
		position: absolute;
		left: 0;
		top: -2px;
		top: calc(100vh - 2px);
		-webkit-transition: all 300ms;
		-moz-transition: all 300ms;
		transition: all 300ms;
	}
	.imageDetails .author {
		text-transform: none;
	}
	.imageDetails h3.author img {
		width: 1em;
		height: 1em;
		border-radius: 1.97em;
		border: 1px solid #2c2c2c;
		overflow: hidden;
		margin: 0 0 -0.2em .25em;
		position: relative;
		z-index: 1;	
	}
	.imageDetails h3.author img.signature {
		width: auto;
		height: 1em;
		z-index: 0;
		border: none;
		position: relative;
		margin-left: -.25em;
		margin-bottom: -.15em;
		border-radius: 0.1em;
		-webkit-filter: brightness(96%);
		filter: brightness(96%);
	}
	.imageDetails h3.author a.active img.signature,
	.imageDetails h3.author a:active img.signature {
		-webkit-filter: invert(.85);
		filter: invert(.85);
	}
	
	
	/*
	main > nav {
		width: 100vw;
		height: 100vh;
		overflow: hidden;
		position: fixed;
		top: 0;
	}
	*/
	svg .imageArrow {
		stroke: #F0F0F0;
		stroke-width: 3;
		stroke-miterlimit: 10;
		fill: none;
	}
	a.rightArrow, a.leftArrow {
		position: absolute;
		background: url(/design/blank.gif);
		cursor: pointer;
		display: none;
		top: calc(50vh - 3.75em);
		border-radius: 7em;
		overflow: hidden;
		background-color: rgba(44, 44, 44, 1);
		width: 8em;
		height: 8em;
		left: -5em;
		
	}
	a.rightArrow {
		right: 0;
		left: initial;
		background: 0 0;
		width: 3.25em;
		border-radius: 0;
	}
	a.rightArrow .rightArrowShim {
		background-color: rgba(44, 44, 44, 1);
		width: 8em;
		height: 8em;
		padding: .15em .25em;
		margin-top: -.15em;
		border-radius: 7em;
	}
	a.rightArrow svg, a.leftArrow svg {
		width: 1.5em;
		margin-left: 1.25em;
		margin-top: .25em;
		height: 100%;
		
		animation: wobble 1.5s;
	}
	a.rightArrow:active svg .imageArrow, a.leftArrow:active svg .imageArrow {
		stroke: #ff5a96;
	}
	a.rightArrow:hover {
		width: 3.75em;
	}
	a.leftArrow svg {
		float: right;
		margin-right: 1.25em;
		animation: wobbleReverse 1.5s;
	}
	a.leftArrow:hover {
		left: -4.5em;
		
	}
	
	
	
	@keyframes wobble  {
		0%  { transform: translateX(0); }
		14%  { transform: translateX(.45em); }
		29%  { transform: translateX(0); }
		44%  { transform: translateX(.3em); }
		59%  { transform: translateX(0); }
		75%  { transform: translateX(.15em); }
		100%  { transform: translateX(0); }
	}
	@keyframes wobbleReverse  {
		0%  { transform: translateX(0); }
		14%  { transform: translateX(-.45em); }
		29%  { transform: translateX(0); }
		44%  { transform: translateX(-.3em); }
		59%  { transform: translateX(0); }
		75%  { transform: translateX(-.15em); }
		100%  { transform: translateX(0); }
	}
	
	
	img.security {
		height: 100%;
	}
	.imageDetails section.eCom section.genericImageInfo { padding-top: 2em; }
	section.genericImageInfo > a {
		float: left;
		padding-right: 1.5em;
		height: 3.8em;
		z-index: 2;
		position: relative;
		display: block
	}
	section.genericImageInfo > p:last-child {
		padding: 0;
	}
	p.froadProtection {
		line-height: 0.85em;
		color: #999;
		background: rgba(0,0,0,0);
	}
	p.froadProtection small {
		font-size: 0.75em;
		line-height: 1.15em;
		padding: 0 0 .5em 0;
	}
	p.froadProtection img {
		height: 1.1em;
		width: 5.3em;
	}
	
	
	
	
	
	
	/* PAGE DESIGN */
	main section:first-child { padding-top: inherit; }
	
	
	
	
	
	
	
	
	
	/* INITIAL (TRANSPARENT) COLORS */
	/*
	main.initial { background: #2c2c2c; }
	
	main.initial #aboutThisImage,
	main.initial #aboutThisImage .storyContent p,
	main.initial #aboutThisImage section > p.shippingInfo,
	main.initial #aboutThisImage .genericImagInfo p {
		background: rgba(0, 0, 0, 0);
	}
	main.initial #aboutThisImage .imageDetails {
		background-color: rgba(44, 44, 44, 0.65);
		background: -moz-linear-gradient(top, rgba(44, 44, 44, 0) 0%, rgba(44, 44, 44, 0.65) 30vh);
		background: -webkit-linear-gradient(top, rgba(44, 44, 44, 0) 0%, rgba(44, 44, 44, 0.65) 30vh);
		background: linear-gradient(to bottom, rgba(44, 44, 44, 0) 0%, rgba(44, 44, 44, 0.65) 30vh);
	}
	main.initial #aboutThisImage .imageDetails,
	main.initial #aboutThisImage .darkGrey,
	main.initial #aboutThisImage .storyContent p {
		color: #fff;
	}
	
	main.initial #aboutThisImage img.signature,
	main #aboutThisImage .imageDetails h3.author a:active img.signature,
	main #aboutThisImage .imageDetails h3.author a.active img.signature {
		filter: invert(87%);
		-webkit-filter: invert(87%);
		opacity: .35;
	}
	*/
	
	
	
	
	
		
	';
	
	$noscript_css = '
	#imageSlider {
		cursor: default;
		background: transparent;
	}
	#imageSlider div > article .imageAligner figure {
		height: auto;
	}
	#imageSlider div > article .imageAligner figure img {
		opacity: 1;
		width: 100%;
		height: auto;
	}
	#imageSlider div > article .imageAligner {
		opacity: 1;
	}
	#imageSlider div > article .imageAligner figure img.loading { display: none; }
	
	
	a.rightArrow, a.leftArrow {
		display: block;
		top: 250px;
	}
	a.hiddenArrow {
		display: none;
	}
	.productDetails { opacity: 1; }
	#imageSlider div > article .imageAligner figure img.animateAll {
		display: none;
	}
	#imageSlider .imageDetails.slidePage {
		padding: 0 0.5em;
		margin-top: 0;
		opacity: 1;
	}
	
	';
	
	
	
	// UPDATE THIS IF MAIN CSS FILE IS CHANGED:
	// generated at: http://jonassebastianohlsson.com/criticalpathcssgenerator/
	//$critical_css = '';
	
	include('snippets/image-db.php');
	include('snippets/header.php');
    ob_start('simpleComress');
?>
	
	
	<main>
		<?php
		buildSlider($slides, $image_direcotory, $large_image_prefix, $small_image_prefix);
		
		echo '<p class="statsAndShare">'.$share_html.'</p>';
		
		?>
		
		<!-- newsletter signups -->
		<!--
		<aside class="largeBanner">
				<h1 class="red">Email Newsletter!</h1>
				<p class="white">Don't miss out on the new art and photography - curated & added <strong class="blue">monthly!</strong> As a thank-you we'll send you <a href="/origami/">free origami printables</a>. We send <a href="/privacy-policy/">no spam</a>.</p>
				<form method="post" action="/email-submit/" id="emailSubmit">
					<input type="email" name="email" required id="emailInput" placeholder="Enter your email address" value="" maxlength="200" />
					<input type="submit" class="contentButton animateLetterSpacing nostyle" value="Sign up!" />
				</form>
		</aside>
		-->
	</main>


<?php 

	ob_end_flush();
		
	$script = "
	
		visitorIP = '".$_SERVER['REMOTE_ADDR']."';
		
		
		/*
		var currentImageInit = parseInt($('imageSlider').get('data-current-slide'));
		$$('#imageSlider > div')[0].setStyle('margin-left', '-' + currentImageInit + '00vw');
		
		// preload images before scripts
		$$('#imageSlider div > article').each(function(el,i){
			var preloadingImage = '".$image_direcotory."L_' + el.getElements('img')[0].get('data-image');
			el.setStyle('background-image','url('+preloadingImage+')');
			
			Asset.image(preloadingImage, {
				onLoad: function(){
					el.setStyle('opacity',1);
				}
			});
			
		});
		
		
		var imagePrefix = 's_';
		if(document.body.getSize().x > 720)imagePrefix = 'L_';
		
		var preloadingImage = '".$image_direcotory."' + imagePrefix + $$('#imageSlider div > article')[currentImageInit].getElements('img')[0].get('data-image');
		$$('#imageSlider div > article')[currentImageInit].setStyle('background-image','url('+preloadingImage+')');
		Asset.image(preloadingImage, {
			onLoad: function(){
				$$('#imageSlider div > article').setStyle('opacity',1);
			}
		});
		*/
		
		
		$$('.moreLink').addEvent('click', function(){
			// this.getParent('.eCom').getChildren('.expandHint')[0].setStyle('display','none');
			this.getParent('.slidePage').getChildren('.storyContent')[0].addClass('expanded');
		});
		
	
		//slider.js
		ssLoaded = false;
		// window.addEvent('domready', function(){
		$$('script').each(function(el,i){
			if(el.get('src')=='".$slider_script."')
			ssLoaded = true;
		});
		if(!ssLoaded){
			// Asset.javascript('".$slider_script."');
			var script = document.createElement('script');
			script.src = '".$slider_script."';
			document.head.appendChild(script); //or something of the likes
		}
		// });
		
		$$('.buyPrint').addEvent('click', function(){
			
			//Facebook pixel tracking
			/*
			window._fbq.push(['track', 'CheckoutButton', { product_id: document.title }]);
			window._fbq.push(['track', '6009734116869', {'value':'0.00','currency':'USD'}]);
			*/
			
			//GA pixel tracking
			//ga('send', 'event', 'Purchase Intent', 'Checkout Button', document.title);
			
			ga('send', {'hitType': 'event', 'eventCategory': 'Purchase Intent', 'eventAction': 'Checkout Button', 'eventLabel': document.title, 'eventValue': 79});
			
		});
		
		
		
		// remove initial state:
		/*
		window.addEvent('scroll', function(){
			if(window.getScroll().y > 1){
				$$('main')[0].removeClass('initial');
			}else{
				$$('main')[0].addClass('initial');
			}
		});
		*/
		
		
		// hint links
		$$('.hintLinkLearnMore a').addEvent('click', function(){
			window.addEvent('domready', function(){
				scrl.start(0, wS().y - 40);
				(function(){
					$$('.moreLink')[currentSlide].addClass('active').setStyle('background','#00AEEF');
				}).delay(750);
				(function(){
					$$('.moreLink')[currentSlide].fireEvent('click');
				}).delay(1500);
			});
		});
		
	"; 
	include('snippets/footer.php');
?>