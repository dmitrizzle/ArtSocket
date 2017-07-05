

// TO DO:
	// windowWidth and Height are no longer necessary if we have css wv and wh - > replace
	// EXPLORELIST LOADING FLASHES COLORS
	// FADE-IN IMAGES ON HEADERS FOR THE REST OF THE WEBSITE
	




//SET THIS:
var titlePattern = ' '+String.fromCharCode(183)+' ArtSocket';
window.scrollTo(0,0);

//DECLARE FUNCTIONS
var sizeIS;
var lastHeight = 0;
var lastWidth = 0;
var sizeISNow;
var windowedScreenView;
var fullScreenView;
var loadThisImage;
var purchasePrint;
function is_touch_device() { return !!('ontouchstart' in window) ? 1 : 0;}

if($('imageSlider')){

	//DECLARE VARIABLES
	var sliderEl = $('imageSlider');
	var imageDir = sliderEl.get('data-image-dir');
	var smallImageP = sliderEl.get('data-small-image-prefix');
	var largeImageP = sliderEl.get('data-large-image-prefix');
	var blankImage = '/design/blank.gif'; //url of the blank gif image
	var sliderBox = $$('#imageSlider > div')[0];
	var sliderBlock = $$('#imageSlider div > article');
	var imageTotal = $$('#imageSlider div > article').length;
	var imageAligner = $$('#imageSlider .imageAligner');
	var sliderFigure =  $$('#imageSlider .imageAligner figure');
	var sliderImage = $$('#imageSlider .imageAligner figure img');
	var sliderImageZoomOffsetY = new Array();
	
	
	var productImage = $$('.imageDetails figure.productPreview img');
	var productImageWidth = 0;
	var productImageHeight = 0;
	var previewDecor;
	
	
	var sliderRightArrow = $$('a.rightArrow')[0];
	var sliderLeftArrow = $$('a.leftArrow')[0];
	var fsButtons = $$('.fsButton');
	// var fsButtonContentButton = $$('#aboutThisImage .fsButton.contentButton.small');
	var slideURL = sliderBlock.get('data-slide-url');
	var docB = $(document.body);
	var imageRatio = new Array();
	var resizeTimer = null;
	var autoHideArrows = null;
	var t = is_touch_device();
	var windowWidth = docB.getSize().x;
	var windowHeight = docB.getSize().y;
	var totalImagesLoaded = 0;
	
	var sliderPointerInit;
    var sliderPointerDown;
    var sliderInitPosition;
    var scrollToPosition;
    var currentSlide = parseInt(sliderEl.get('data-current-slide')); //starting point
    	if(currentSlide == undefined || currentSlide < 0) currentSlide = 0;
    var imageLoaded = new Array();
    
    var detailsEl = $$('.imageDetails');
    var sliderTitles = $$('.imageDetails h1').get('html');
    var sliderAuthor = function(){
    	if($$('.imageDetails .author'))
    		return getFirstWord(($$('.imageDetails .author')[currentSlide].get('html')).stripTags());
    	else return false;
    }
    var detailsBlock = $('aboutThisImage');
	
	if($$('.statsAndShare')[0]){
		var socialEl = $$('.statsAndShare')[0];
		// socialEl.set('html', '&nbsp;' + socialEl.get('html'));
		// $$('aside.social > ul').setStyle('display','inline-block');
	}
	
    var genericImagInfo = $$('.genericImagInfo')[0];
    var productDetails = $$('.productDetails')[0];
    var eComEls = $$('section.eCom');
    
    var firstSlideEnhance = 0;
	
    var viewToggle = 1;
    //console.log(viewToggle);
    // DEFAULT = 1
	// FULL SCREEN = 0
	
	var physicalAction = 'Click';
	if(t) physicalAction = 'Tap';
	
    // var pagePreviewHeight = 200;
    
    var sliderSnapDuration = 735;
	
	//populate some variables
	sliderImage.each(function(el,i){
		imageRatio[i] = el.get('width')/el.get('height');
		
		if(el.get('data-zoom-offset-y'))
		sliderImageZoomOffsetY[i] = el.get('data-zoom-offset-y');
		else sliderImageZoomOffsetY[i] = 0;
		
		var sliderFigcaption = new Element('figcaption', {'class':'animateAll','html': '"<span class="title">'+sliderTitles[i]+'</span>" by <span class="authorName">...</span> <strong>$' + Math.round(parseFloat(detailsEl[i].getElements('.printPrice')[0].get('html').stripTags())) + '</strong><span class="arrow">&nbsp;</span>' });
		sliderFigcaption.inject(sliderFigure[i], 'bottom');
	});
	
	// first word of a string (utility function):
	function getFirstWord(str) {
		str = str.replace('By ', '');
        if (str.indexOf(' ') === -1)
            return str;
        else
            return str.substr(0, str.indexOf(' '));
    };
	
	//url of the current image
	loadThisImage = function (slide){
		thisSlide = slide || currentSlide;
	
		if(windowWidth > 720){
			return imageDir+largeImageP+sliderImage[thisSlide].get('data-image');
		}
		else return imageDir+smallImageP+sliderImage[thisSlide].get('data-image');
	}
	
	
	// canonical elements
	/*
	var canonicalEl;
	for (var i = 0; i < $$('link').length; i ++) {
		if ($$('link')[i].get('rel') === 'canonical') {
			canonicalEl = $$('link')[i];
		}
	}
	*/
	
	
	// blurred previews
	if(blurLoadingSliders){
		sliderBlock.each(function(el,i){
			el.setStyle('background-image', 'url(/images/thumbnails/?blur=1&i=' + loadThisImage(i) + ')');
		});
	}else{
		sliderBlock.addClass('loadingContainer');
	}

	
	//load the first image (right-away!)
	var firstImageLoadedEvent = false;
	Asset.image(loadThisImage(), {
		onLoad: function(){
			if(!firstImageLoadedEvent){
				window.fireEvent('firstImageLoaded');
				firstImageLoadedEvent = true;
			}
		}
	});
	
	//if image takes more than 1s to load, fire the event to trigger all the subsequent functions
	(function(){
		if(!firstImageLoadedEvent){
			window.fireEvent('firstImageLoaded');
			firstImageLoadedEvent = true;
		}
	}).delay(1000);
	
	
	
	
	//animation that lock the images to the closest one, loads media, shows arrows, adjusts progress bar and pushes history api
	var setCurrentAuthor  = function(currentAuthor){
		$$('#imageSlider figcaption .authorName')[currentSlide].set('html', currentAuthor);
	};
	var sliderSnap = new Fx.Scroll(sliderEl, {
	
		duration: sliderSnapDuration,
		transition:"expo:out",
		onStart: function(){
			if(slideURL[currentSlide] != location.pathname)
				// historyGo(slideURL[currentSlide], false, false, sliderHistory);
				historyGo(slideURL[currentSlide], {returnAction: sliderHistory});
		},
		onComplete: function(){

			sliderFigure[currentSlide].addClass('show');
	
			(function(){ sliderBlock[currentSlide].addClass('imageLoaded'); }).delay(500);
			
			//load image if it hasnt been loaded yet
			if(!imageLoaded[currentSlide] || sliderImage[currentSlide].get('src') == blankImage){
			
				//console.log(1 + '' +currentSlide);
				
				//image has loaded
				sliderImage[currentSlide].set('src', loadThisImage());
				
				// get author name for image figcaption button:
				if(sliderAuthor()) setCurrentAuthor(sliderAuthor());
				else {
					(function(){
						if(sliderAuthor()) setCurrentAuthor(sliderAuthor());
					}).delay(1500);
				}
					
				
				//thumbnail preview before the image loads:
				/*
				imageAligner[currentSlide].setStyles({
					'background-image': 'url(/images/thumbnails/?i='+imageDir+smallImageP+sliderImage[currentSlide].get('data-image')+'&m=L_square)' //,
					//'opacity': .65
				});
				*/
				
				
				
				
				
				/*
				$$('.productDetails > small.white')[currentSlide].setStyle(
					'background-image','url('+loadThisImage()+')'
				);
				*/
				
				

				Asset.image(loadThisImage(), {
					onLoad: function(){
					
						sliderImage[currentSlide].removeClass('loading');
						
						(function(){
							if(blurLoadingSliders){
								sliderBlock[currentSlide].setStyle('background-image',null);
							}else{
								sliderBlock[currentSlide].removeClass('loadingContainer');
							}
						}).delay(500);


						
						/*
						if(productImage[currentSlide].getSize().y > window.getSize().y*.75){
							productImage[currentSlide].setStyles({
								'width':'auto',
								'max-height': '75vh'
							});
						}
						productImageWidth = detailsProductImg[currentSlide].getSize().x;
						productImageHeight = detailsProductImg[currentSlide].getSize().y;
						*/
						
						productImage[currentSlide].set('src', loadThisImage());
						previewDecor();
						
						
						//productImage[currentSlide].setStyle('opacity',1);
						imageLoaded[currentSlide] = true;
						
						//remove thumbnail preview
						/*
						imageAligner[currentSlide].setStyles({
							'opacity':1 //,
							//'background-image':'none'
						});
						*/
						
						
						
						
						//product image
						// previewDecor();		
						
						
						//bring up a message instructing the user about full-screen image previews (for the first image only)
						/*
						if(totalImagesLoaded < 1)
						(function(){
							if(viewToggle == 1
								&& (
									localStorage.getItem('tip_fsimage') == undefined 
									|| localStorage.getItem('tip_fsimage') == null
								)
							){
								notify('<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" width="44" height="44" viewBox="0 0 44 44" xml:space="preserve" style="width:.65em;height:.65em;overflow:visible;margin:0 .25em .15em"><g fill="none" stroke="#2c2c2c" stroke-width="2"><path d="M24 16h-6v-6c0-0.6-0.4-1-1-1 -0.6 0-1 0.4-1 1v6h-6c-0.6 0-1 0.4-1 1 0 0.6 0.4 1 1 1h6v6c0 0.6 0.4 1 1 1 0.6 0 1-0.4 1-1v-6h6c0.6 0 1-0.4 1-1C25 16.4 24.6 16 24 16zM43.7 42.3L29.7 28.3C32.4 25.3 34 21.3 34 17c0-9.4-7.6-17-17-17C7.6 0 0 7.6 0 17s7.6 17 17 17c4.3 0 8.3-1.6 11.3-4.3l14 14c0.4 0.4 1 0.4 1.4 0S44.1 42.7 43.7 42.3zM17 32C8.7 32 2 25.3 2 17S8.7 2 17 2s15 6.7 15 15S25.3 32 17 32z"></path></g></svg><strong>' + physicalAction + ' the image</strong> to view it full-size.', 1);
								localStorage.setItem('tip_fsimage', 'done');
								
								//perform the action prescribed in the notify message
								$('notification').addEvent('click', function(){ window.fireEvent('toggletap'); });
								
							}
						}).delay(500);
						*/
						
						//count total number of images the user has loaded
						totalImagesLoaded++;
					}
				});
			}
			
			//show/hide arrows
			if(!t && currentSlide < imageTotal - 1)sliderRightArrow.setStyle('display','block');
			else sliderRightArrow.setStyle('display','none');
			
			if(!t && currentSlide > 0)sliderLeftArrow.setStyle('display','block');
			else sliderLeftArrow.setStyle('display','none');
			
			
			//draw the description
			if(currentSlide < imageTotal && currentSlide >= 0){
				detailsEl.setStyle('display','none');
				detailsEl[currentSlide].setStyles({
					'display':'block',
					'opacity': 1
				});
			}
						
			//progress bar
			var progressPercent = ((currentSlide + 1)/imageTotal)*100;
			if(progressStyles.cssRules.length > 0) //if there are rules already applied, delete
			progressStyles.deleteRule(0);			
			if(progressStyles.insertRule)
				progressStyles.insertRule('#aboutThisImage:before {width: '+progressPercent+'%;}', 0);
			else
				progressStyles.addRule('#aboutThisImage:before', 'width: '+progressPercent+'%;', 0);
			
			
			
			sliderRightArrow.set('href',slideURL[currentSlide+1])
			sliderLeftArrow.set('href',slideURL[currentSlide-1])
			
			//history API title is BELOW>>
			
			//fire custom history API event
			if(totalImagesLoaded>0)
			window.fireEvent('pushstate');
			
			
			//load text story content:
			//if($$('section.storyContent')[currentSlide].hasClass('loadingContainer') || firstSlideEnhance == 0){
				nametag = $$('#imageSlider > div > article')[currentSlide].get('data-slide-url').replace('/art/','').replace('/','');

				new Request.JSON({
					url: '/print-db.php?nametag='+nametag,
					onComplete: function(d){
					
						//show story and author title
						$$('section.storyContent')[currentSlide].set('html', d.story).removeClass('loadingContainer');
						$$('h3.author')[currentSlide].set('html','By '+d['author-block']);
						
						//HISTORY API push
						// document.title = '"' + sliderTitles[currentSlide] + '" by ' + d.author;
						
							
						$$('.productDetails')[currentSlide].setStyle('opacity',1);
						firstSlideEnhance++;
					}
				}).send();
			//}
			
		}
	});
	//HISTORY API push (for back button)
	var sliderHistory = function(){
		// console.log(1);
		sliderSnap.cancel();
		// currentSlide = slideURL.indexOf(location.pathname);
		currentSlide = slideURL.indexOf(historyUrls[hI].replace(urlDomain,''));
		
		if(currentSlide == undefined || currentSlide < 0) currentSlide = 0;		
		
		sliderSnap.start(currentSlide*windowWidth + windowWidth/4, 0);
		
		// (function(){
			// hI --;	
			// historyUrls.pop(); historyTitles.pop(); historyImages.pop(); returnActions.pop();
		// }).delay(500);

	}
	
	
	
	
	// sliderSnap.start(currentSlide*windowWidth + windowWidth/4, 0);
	sliderBox.set('tween', { duration:250, transition: 'expo:out'});
	
	
	//animate scroll window
	var windowSnap = new Fx.Scroll(window, { duration:500 });
	//windowSnap.start(0,0);
	
	//animatable styles (but only for JS borwsers)
	$$(imageAligner,sliderBlock).addClass('animateAll');
	
	//default image size (zoomed in, fill screen)
	windowedScreenView = function(){
		if(viewToggle == 0){
			/*
			detailsBlock.setStyles({
				'-webkit-transform': 'translate(0,-'+pagePreviewHeight+'px)',
				'msTransform': 'translate(0,-'+pagePreviewHeight+'px)',
				'-moz-transform': 'translate(0,-'+pagePreviewHeight+'px)',
				'transform': 'translate(0,-'+pagePreviewHeight+'px)'
			});
			*/
			viewToggle = 1;
			//console.log(viewToggle);
			sliderImage.removeClass('zoomedOut');
			sliderEl.removeClass('fullScreen');
			detailsBlock.removeClass('fullScreen');
			// (hideHeader || Function)();
			
			(function(){
				if(window.getScroll().y == 0 && viewToggle == 1){
					new Fx.Scroll(docB).start(0, 50);
				}
			}).delay(750);
			// fsButtonContentButton.setStyle('opacity',1);
		}
	};
	
	//full-screen image
	fullScreenView = function(){
		if(viewToggle == 1){
			
			if(window.getScroll().y <= 10) animationDelay = 0;
			else animationDelay = 500;
			
			(function(){
				sliderImage.addClass('zoomedOut');
				sliderEl.addClass('fullScreen');
				detailsBlock.addClass('fullScreen');
				(function(){ (hideHeader || Function)(); }).delay(100);
				// fsButtonContentButton.setStyle('opacity',0);
			}).delay(animationDelay);
		
			windowSnap.start(0,0);
		
			viewToggle = 0;
			//console.log(viewToggle);
			
			
			
			/*
			killNotify();
			(function(){
				notify('<strong>'+physicalAction+' the image</strong> to exit full-screen mode.');
				$('notification').addEvent('click', function(){ window.fireEvent('toggletap'); });
			}).delay(600);
			*/
			
			
		}
	};
	// windowedScreenView();
	fullScreenView(); window.addEvent('domready', function(){ (hideHeader || Function)(); });
	(function(){ eComEls.setStyle('opacity',1); }).delay(500);
	
	fsButtons.addEvent('click', function(e){
		e.stop();
		(hideHeader || Function)();
		fullScreenView();
		this.removeClass('active');
	});
	
	//http://davidwalsh.name/add-rules-stylesheets
	//manipulate progress bar by adding custom style block
	var progressStyles = (function() {
		var style = document.createElement("style");
		style.appendChild(document.createTextNode(""));
		document.head.appendChild(style);
		return style.sheet;
	})();
	
	
	
	//AT THE END OF SCREEN RESIZE
	var onLoadResizeDelay = sliderSnapDuration;
	sizeIS = function(){
		
		// dont' resize unnecessarily if there's only minor height changes:
		if(
			(lastHeight > window.getSize().y + 50 || lastHeight < window.getSize().y - 50)
			|| (lastWidth != window.getSize().x)
		){
		
			//black-out the screen on resize to avoid jumpy crap
			sliderBox.setStyle('opacity',0);
			// console.log('darkness');
			(function(){ sliderBox.tween('opacity',1); }).delay(onLoadResizeDelay);
			onLoadResizeDelay = sliderSnapDuration*2+250; //black out for longer duration after load (the crap bugs take longer)
		
			//set window size variables (instead of getting them every time)
			windowWidth = docB.getSize().x;
			windowHeight = docB.getSize().y;
		
			//the initial image (fill screen) will occupy 71% of the screen
			pagePreviewHeight = windowHeight/3.5;
		
		
			//resize the the slider container and scroll to appropriate (current) image
			// sliderBlock.setStyle('width', windowWidth);
			// sliderBlock.setStyle('height', windowHeight);
			(function(){
				sliderBox.setStyles({
					'width': windowWidth*imageTotal,
					'padding': '0 '+ windowWidth/4+ 'px'
				});
				sliderSnap.start(currentSlide*windowWidth + windowWidth/4, 0);
			}).delay(600);
		
			//change the height of content on resize (if we are in the default preview mode)
			/*
			if(viewToggle == 1)
			detailsBlock.setStyles({
				'-webkit-transform': 'translate(0,-'+pagePreviewHeight+'px)',
				'msTransform': 'translate(0,-'+pagePreviewHeight+'px)',
				'-moz-transform': 'translate(0,-'+pagePreviewHeight+'px)',
				'transform': 'translate(0,-'+pagePreviewHeight+'px)'
			});
			*/
			
			//position the arrows
			// $$(sliderLeftArrow, sliderRightArrow).setStyle('top', windowHeight/2-35);
		
		
			//resize landscape and portrait images as required
			imageAligner.each(function(el,i){
						
				//image is wider than the screen
				if(windowWidth/windowHeight < imageRatio[i]){
					sliderImage[i].setStyles({
						'height': 'auto',
						'width': '100%'
					});
					mtop = (windowHeight - windowWidth/imageRatio[i])/2;
					el.setStyles({
						'width': windowWidth,
						'margin-top': mtop//,
					
						//set the vert position of the thumbnail
						//'background-position': 'center ' + (windowHeight/2-mtop-50) + 'px'
					});
					
					sliderBlock[i].addClass('wide');
				
					//if the screen is in portrait mode, vert position of the thumbnail
					//if(windowWidth/windowHeight < 1)
					//el.setStyle('background-position', 'center ' + (windowHeight/2-mtop-50) + 'px');
				
				
					//zoom in if required
					var scaleRatio = (imageRatio[i]/windowWidth)*windowHeight;
					sliderImage[i].setStyles({
						'-webkit-transform': 'scale('+scaleRatio+','+scaleRatio+')',
						'msTransform': 'scale('+scaleRatio+','+scaleRatio+')',
						'-moz-transform': 'scale('+scaleRatio+','+scaleRatio+')',
						'transform': 'scale('+scaleRatio+','+scaleRatio+')',
					});
					if(viewToggle == 1){
						sliderImage.removeClass('zoomedOut');	
						sliderEl.removeClass('fullScreen');
						detailsBlock.removeClass('fullScreen');
					}
				}
				//image is narrower than the screen
				else {
					sliderImage[i].setStyles({
						'height': '',
						'width': ''
					});
					el.setStyles({
						'width': imageRatio[i]*windowHeight,
						'margin-top': ''//,
					
						//set the vert position of the thumbnail
						//'background-position': 'center ' + (windowHeight/2 - 50) + 'px'
					});
					
					sliderBlock[i].removeClass('wide');
				
					//zoom in if required
					var scaleRatio = windowWidth/(imageRatio[i]*windowHeight);
					sliderImage[i].setStyles({
						'-webkit-transform': 'scale('+scaleRatio+','+scaleRatio+') translateY('+sliderImageZoomOffsetY[i]+'%)',
						'msTransform': 'scale('+scaleRatio+','+scaleRatio+') translateY('+sliderImageZoomOffsetY[i]+'%)',
						'-moz-transform': 'scale('+scaleRatio+','+scaleRatio+') translateY('+sliderImageZoomOffsetY[i]+'%)',
						'transform': 'scale('+scaleRatio+','+scaleRatio+') translateY('+sliderImageZoomOffsetY[i]+'%)',
					});
					if(viewToggle == 1){
						sliderImage.removeClass('zoomedOut');	
						sliderEl.removeClass('fullScreen');
						detailsBlock.removeClass('fullScreen');
					}
				}
			
			
			
			
			
			
				//thumbnail preview before the image loads:
				//el.setStyle('background-image', 'url(/images/thumbnails/?i='+imageDir+smallImageP+sliderImage[i].get('data-image')+'&m=embed&xoffset=0)');
			
			
			
			
			
				// rearrange page elements:
				if(windowWidth < 822){
			
					$$('.imageDetails').each(function(el,i){
						var currentEcomElement = $$('.imageDetails section.eCom')[i];
						currentEcomElement.remove();
						currentEcomElement.inject(el, 'bottom');				
					});
			
				}else{
			
					$$('.imageDetails').each(function(el,i){
						var currentEcomElement = $$('.imageDetails section.eCom')[i];
						currentEcomElement.remove();
						currentEcomElement.inject(el, 'top');				
					});
			
				}
			
			
			
			
			
			});
		
			// add the gutter to product image
			previewDecor();
			lastHeight = window.getSize().y;
			lastWidth = window.getSize().x;
		}

	};
	
	//IMMEDIATE SCREEN RESIZE
	sizeISNow = function(){
		sliderEl.setStyle('height', docB.getSize().y);
		// previewDecor();
	};sizeISNow();
	
	/* RESPONSIVE */
	var detailsH1 = $$('.imageDetails h1');
	var detailsEcom = $$('.imageDetails section.eCom');
	// var detailsstoryContent = $$('.imageDetails .storyContent');
	//var detailsGenInfo = $$('.imageDetails section.genericImagInfo');
	// var detailsProductImg = $$('.imageDetails figure.productPreview');
	var detailsRestructured = [];
	var responsive;
	//var domready = false;
	//domready ^^
	
	
	
	
	//INITIALIZE ALL WINDOW EVENTS
	
	// some Android browsers don't fire 'orientationchange'
	var mql = window.matchMedia('(orientation: portrait)');
	mql.addListener(function(m) {
		/* if(m.matches) {} */
		sizeIS();
		sizeISNow();
	});
	
	// var pinchZoomedIn = false;
	// var pinchZoomedCount = 0;
	
	window.addEvents({
		'resize': sizeISNow,
		'orientationchange': function(){
			sizeIS();
			sizeISNow();
		},
		'resizeend': function(){
			sizeIS();
			sizeISNow();
		},
		'scrollend': function(){
			if(iPh && t){
				sizeIS();
				sizeISNow();
			}
		},
		
		//navigate with keyboard
		'keyup': function(e){
			sliderSnap.cancel();
			switch (e.key){
				case 'right':
					if(currentSlide < imageTotal-1)currentSlide++;
					sliderSnap.start(currentSlide*windowWidth + windowWidth/4, 0); //slide snapping animation
				break;
				case 'left':
					if(currentSlide > 0)currentSlide--;
					sliderSnap.start(currentSlide*windowWidth + windowWidth/4, 0); //slide snapping animation
				break;
			}
		},
		
		//change the image preview mode (fill screen or full-screen):
		'toggletap': function(){
			if(viewToggle == 1) fullScreenView(); else windowedScreenView();
			
			//close notification box when tapping image
			//killNotify();
			//console.log('toggletap');
			
		},
		
		//zoom out on Esc key
		'keydown' : function(e){
			// if(e.key == 'esc')windowedScreenView();
		},
		
		
		
		// pinch zoom state
		/*
		'userpinchzoom': function(e){
			if(e == 'in'){
				pinchZoomedIn = true;
				if(window.getScroll().y < 100){
					if(pinchZoomedCount < 1){
						fullScreenView();
						pinchZoomedCount ++;
					}
					
					// (function(){
						$$('body > main').setStyle('padding', 0);
						$$($$('body > footer'),detailsBlock).setStyle('display', 'none');
					// }).delay(600);
					
					
				}
			}
			else {
				pinchZoomedIn = false;
				
				if(window.getScroll().y < 100){
					pinchZoomedCount == 0;
					(function(){ windowedScreenView(); }).delay(750);
					
					$$('body > main').setStyle('padding', '');
					$$($$('body > footer'),detailsBlock).setStyle('display', '');
					
					
				}
				
			}
		}
		*/
		
		
		
		
		
		//init the gallery (safety)
		/*
		'domready' : function(){
			domready = true;
			
			sliderSnap.start(currentSlide*windowWidth + windowWidth/4, 0);
			sliderBox.addClass('init');
			
			
			//responsive = function(){
				//console.log('res');
			//	if(wS().x <= 766 && !detailsRestructured[currentSlide]){
			//		detailsRestructured[currentSlide] = true;
			//		detailsH1[currentSlide].inject(detailsEcom[currentSlide], 'before');
			//		if(detailsGenInfo[currentSlide])
			//			detailsGenInfo[currentSlide].inject($$('aside.social')[currentSlide], 'after');
			//	}
			//	if(wS().x > 766 && detailsRestructured[currentSlide]){
			//		detailsRestructured[currentSlide] = false;
			//		detailsH1[currentSlide].inject(detailsEcom[currentSlide], 'after');
			//		detailsGenInfo[currentSlide].inject(detailsProductImg[currentSlide], 'after');
			//	}
			//}
			//responsive();
			
			sizeIS();
			
			
		}
		*/
		
		/* ,
		'load' : function(){
			(function(){
				sliderSnap.start(currentSlide*windowWidth + windowWidth/4, 0);
			}).delay(1000);
		} */
		
		
	});	
	
	//IMAGE ARROWS' EVENTS
	sliderRightArrow.addEvent('click', function(e){
		e.stop();
		sliderSnap.cancel();
		if(currentSlide < imageTotal-1)currentSlide++;
			sliderSnap.start(currentSlide*windowWidth + windowWidth/4, 0); //slide snapping animation
	});
	sliderLeftArrow.addEvent('click', function(e){
		e.stop();
		sliderSnap.cancel();
		if(currentSlide > 0)currentSlide--;
			sliderSnap.start(currentSlide*windowWidth + windowWidth/4, 0); //slide snapping animation
	});
					
	
	
	//RESTRUCTURE HTML
	detailsEl.dispose();
	detailsEl.inject(detailsBlock);
	$$('.buyPrint').each(function(el,i){
		el.clone().inject(detailsEl[i], 'bottom');
		$$('.royaltiesBreakdown')[i].inject(detailsEl[i], 'bottom');
	});
	
	
	
	// PRINT PREVIEW IMAGE:
	/*
	var zoomPan; var zoomCancel;
	zoomPan = function(el, event){
		if(el.hasClass('zoom')){
			// source: https://gist.github.com/dnaber-de/1671196
			var pos = el.getPosition();
			var relPos = {};
			relPos.x = event.page.x - pos.x;
			relPos.y = event.page.y - pos.y;
	
			relPos.x = (productImageWidth-relPos.x*3)/3 + productImageWidth/6;
			relPos.y = (productImageHeight-relPos.y*3)/3 + productImageHeight/6;
			// console.log(relPos.y);
			
			
			el.getChildren('img')[0].setStyles({
				'-webkit-transform': 'scale(2,2) translate('+relPos.x+'px, '+relPos.y+'px)',
				'-moz-transform': 'scale(2,2) translate('+relPos.x+'px, '+relPos.y+'px)',
				'transform': 'scale(2,2) translate('+relPos.x+'px, '+relPos.y+'px)',
			});
		}
	}
	zoomCancel = function(el){
		el.getChildren('img')[0].setStyles({
			'-webkit-transform': '',
			'-moz-transform': '',
			'transform': ''
		});
	}
	
	var zoomPanTimer = null;
	detailsProductImg.addEvents({
		'mousemove': function(event){ if(!t) zoomPan(this, event); },
		
		// if mouse is out for 3s, cancel zoom:
		'mouseout': function(){
			if(zoomPanTimer !== null) {
				clearTimeout(zoomPanTimer);  
			}
			zoomPanTimer = setTimeout(function() {
				if(!t && !pinchZoomedIn()){
					var el = detailsProductImg[currentSlide];
					el.removeClass('zoom');
					el.getChildren('img')[0].addClass('animateAllFast');
					(function(){ el.getChildren('img')[0].removeClass('animateAllFast'); }).delay(250);
					zoomCancel(el);
				}
			}, 3000);
		},
		'mouseover': function(){
			if(zoomPanTimer !== null) {
				clearTimeout(zoomPanTimer);  
			}
		},
		
		
		
		'click': function(event){
			if(!t && !pinchZoomedIn()){
				this.toggleClass('zoom');
				var el = this;
				el.getChildren('img')[0].addClass('animateAllFast');
				(function(){ el.getChildren('img')[0].removeClass('animateAllFast'); }).delay(250);
			
				if(this.hasClass('zoom')){
					zoomPan(el, event);
				}
				else{ zoomCancel(el); }
			}
			
			
    	}
	});
	*/
	
	// product image gutter and gutter decoration
	previewDecor = function(){
		gtr = (productImage[currentSlide].getSize().x / 24);
		console.log('resize product preview gutter to: ' + gtr);
		
		if(productImage[currentSlide] && loadThisImage()){
			if(productImage[currentSlide].get('src').contains('blank.gif')
				|| productImage[currentSlide].get('src')==''){
				productImage[currentSlide].set('src',loadThisImage());
			}	
			
			
			if(!isNaN(gtr)){
				//(function(){
					// gtr = (productImage[currentSlide].getSize().x / 24);
					//console.log(gtr);
					productImage[currentSlide].setStyles({
						'background-image':'url(/images/content/pages/product-gutter.png)',
						'max-width': (productImage[currentSlide].getParent('figure').getSize().x - Math.sqrt(2)*(gtr + (Math.sqrt(gtr))) ) + 'px'
					});
				
					//(function(){
						// portrait
						if(productImage[currentSlide].getParent('figure').hasClass('portrait')){
							gtr = (productImage[currentSlide].getSize().x / 24);
							productImage[currentSlide].setStyles({
								'padding': gtr + 'px',
								'background-size': 'calc(' + gtr + 'px * 8.5)'
							});
						// landscape
						}else{
							gtr = (productImage[currentSlide].getSize().y / 24);
							productImage[currentSlide].setStyles({
								'padding': gtr + 'px',
								'background-size': 'calc(' + gtr + 'px * 8.5)'
							});
						}
					//})();
								
				//})();
			}
		}		
	}
	
	
	//image info on the right & product pictures
	var productHeader = new Element('h3', {'html': 'Print preview:' });
	
	// var productCaption = new Element('small', {'html': '<p>Your print will come with a &frac12;" border that will feature a serial seal and the artist\'s signature.</p><p>All prints are 12" (30cm) -wide on the short side.</p>', });
	/**/
	//multislide product caption:
	/*var productHandsOn = new Element('figure', {'html': '<img src="/images/content/pages/product-hands-on-1a.jpg" class="mtt" /><figcaption class="multiSlide">See how our wall-art prints look in the real-world:<br /><a href="#a" class="selected">1</a> <a href="#b">2</a> <a href="#c">3</a> <a href="#d">4</a> <a href="#e">5</a> <a href="#f">6</a> <a href="#g">7</a> <a href="#h">8</a></figcaption>', 'class': 'handsOn'});*/
	
	//bottom panel
	/*
	var productHandsOn2 = new Element('figure', {'html': '<img src="/images/content/pages/product-hands-on-2.jpg" /><figcaption>We stand behind the quality of every single one of our prints. <a href="/warranty/">warranty</a> | <a href="/return-policy/">return policy</a></figcaption>', 'class': 'handsOn'});
	*/
	
/*
	var reviewsHeader = new Element('h4', {'html':'What our customers say:'});
	var reviewsSection = new Element('section', {'html': '<blockquote><p>The prints are hanging in our dining room and getting a lot of comments from visitors!</p><cite>Marcin Szablewski <span class="yellow">&#9733;&#9733;&#9733;&#9733;&#9733;</span></cite></blockquote><blockquote><p>I\'m enjoying the prints, thanks very much!</p><cite>John Piercy <span class="yellow">&#9733;&#9733;&#9733;&#9733;&#9733;</span></cite></blockquote><blockquote><p>I received the print and it looks great! The colours came out just as I expected - saturated (in a good way) and true!</p><cite>Reina Shishikura <span class="yellow">&#9733;&#9733;&#9733;&#9733;&#9733;</span></cite></blockquote>', 'class': 'reviews'});
*/	
	
	
 
	/* detailsProductImg.each(function(el,i){
	
		
		window.addEvent('firstImageLoaded', function(){
			
			// productCaption.clone().inject(el,'bottom');
			socialActions();
		});
		
	
		//inject product images
		//el.set('html', el.get('html')+'<a href="javascript:void(0);"><img src="/images/content/pages/product-banner.jpg" /></a><a href="javascript:void(0);"><img src="/images/content/pages/product-dad.jpg" /></a><a href="javascript:void(0);"><img src="/images/content/pages/product-mom.jpg" /></a><a href="javascript:void(0);"><img src="/images/content/pages/product-betty.jpg" /></a>');
		
		//add security notifications at the bottom etc:
		genericImagInfo.clone().inject($$('.shippingInfo')[i], 'after');
		if(i==imageTotal-1)
		genericImagInfo.dispose();
		
		// console.log('product image loaded');
	}); */
	
	
	
	// social & other stuff injects
	$$('.imageDetails .storyContent').each(function(el,i){
	
		// el.set('html', '<h2>Artist Statement</h2>' + el.get('html'));
		//el.getChildren('.loadingContainer').destroy();
		productDetails.clone().inject(el, 'before');
		//$$('.buyPrint')[0].clone().inject(el, 'bottom');
		
		if(i==imageTotal-1){
			productDetails.dispose();
		}
	});
	if($$('.statsAndShare')[0]){
		$$('.imageDetails > h1').each(function(el,i){
			socialEl.clone().inject(el, 'after');
		
			if(i==imageTotal-1){
				socialEl.dispose();
			}
		});
	}
	
	
	
	// populate shipping info
	$$('.shippingInfo').set('html','<a href="javascript:void(0);" title="Click to change your shipping country" class="changeCountry"><img src="/design/blank.gif" alt="Country flag" class="countryFlag" />Shipping <span class="userCountry loadingContainer">&nbsp;&nbsp;&nbsp;&nbsp;</span>: $<span class="shipPrice">...</span></a><br /><small class="shipInfo">From Madison, WI, USA<br />Delivered within 2 - 3 weeks<br />All prices are in <strong>US dollars</strong></small>');
	

	// ecom/product preview gallery function:
	/*
	window.addEvent('firstImageLoaded', function(){
		$$('.imageDetails section.eCom .productThumbnails a').addEvent('click', function(){
			var hp = this.getParent('.productPreview'); // gallery container
			var h = this.getParent('.productPreview').getChildren('img')[0]; // current enlarged image
			var t = this.getChildren('img'); // clicked-on thumbnail
		
			t.inject(hp,'top');
			h.inject(this);
		});
	});
	*/
	
	
	
	
	
	

	

    
    //REBUILD THE SLIDING ELEMENT
    var touchInitPoint;
    var windowInitPosition;
    sliderEl.addEvents({
    	
    	//allow drag scrolling with mouse
    	//get initial variables
    	'mousedown' : function(e){
    		e.stop();
    		sliderSnap.cancel();
    		sliderInitPosition = this.getScroll().x;
    		sliderPointerDown = true;
    		sliderPointerInit = e.client.x;
    		
    		touchInitPoint = e.client.y;
    	},
    	
    	//initial variables
    	'touchstart' : function(e){    		
    		if(e.changedTouches.length == 1 && !pinchZoomedIn()){
				sliderSnap.cancel();
				sliderInitPosition = this.getScroll().x;
				sliderPointerDown = true;
				sliderPointerInit = e.client.x;
			
				windowInitPosition = window.getScroll().y;
				touchInitPoint = e.client.y;
    		}
    	},
    	
    	//drag scroll with mouse
    	'mousemove' : function(e){
    		e.stop();
    		if(sliderPointerDown){
    			scrollToPosition = sliderPointerInit - e.client.x + sliderInitPosition;
    			this.scrollTo(scrollToPosition, 0);
    		
    			//elastic
				if(scrollToPosition == 0)
					sliderSnap.start(currentSlide*windowWidth + windowWidth/4, 0);
			
				if(scrollToPosition == windowWidth*imageTotal-windowWidth + windowWidth/2)
					sliderSnap.start(currentSlide*windowWidth + windowWidth/4, 0);
    		}	
    	},
    	
    	//during the touch drag:
    	'touchmove' : function(e){
    		if(
    		
    		//only one finger
    		e.touches.length==1 && !pinchZoomedIn() &&
    		
    		//we are scrolling sideways
    		Math.abs(sliderPointerInit - e.client.x)/windowWidth >
			(Math.abs(touchInitPoint - e.client.y - windowInitPosition)/windowHeight)
    		
    		){
    			//cancel default behaviour
    			e.stop();
    			
				//scroll the slider
				scrollToPosition = sliderPointerInit - e.client.x + sliderInitPosition;
				this.scrollTo(scrollToPosition, 0);
			
				//elastic
				if(scrollToPosition == 0)
					sliderSnap.start(currentSlide*windowWidth + windowWidth/4, 0);
		
				if(scrollToPosition == windowWidth*imageTotal-windowWidth + windowWidth/2)
					sliderSnap.start(currentSlide*windowWidth + windowWidth/4, 0);
			}
    	},
    	
    	//drag scroll with mouse over
    	'mouseup' : function(e){
    		sliderPointerDown = false; //tell this variable that the mouse clicker is no longer held down
    		
    		//if we are sliding for more than 40 pixels, animate the image scroll/snap:
    		if(Math.abs(sliderPointerInit - e.client.x) > 40){
    		
    			//which way are we scrolling?
				if(sliderInitPosition > scrollToPosition) currentSlide --;
				else currentSlide ++;
				
				//change the currentSlide variable
				if(currentSlide < 0 ) currentSlide = 0;
				if(currentSlide >= imageTotal) currentSlide = imageTotal - 1;
			}
    		sliderSnap.start(currentSlide*windowWidth + windowWidth/4, 0);
    		
    		//quick tap or click (this will change the image view mode)
    		if(Math.abs(sliderPointerInit - e.client.x) <= 3 && Math.abs(touchInitPoint - e.client.y) <=3){
    			windowSnap.start(0,0);
    			window.fireEvent('toggletap');
    		}
    	},
    	
    	//touch scroll is over
    	'touchend' : function(e){
    	
    		//only with one finger:
    		if(e.changedTouches.length == 1 && !pinchZoomedIn()){
    		
				sliderPointerDown = false; //tell this variable that the finger is off the screen
		
				//multi-touch events (convert to single-touch variable)
				if(e.client.x == undefined || e.client.y == undefined){
					e_client_x = e.changedTouches[0].clientX;
					e_client_y = e.changedTouches[0].clientY;
				}
				else{
					e_client_x = e.client.x;
					e_client_y = e.client.y;
				}
    		
				//if we are sliding for more than 40 pixels:
				if(Math.abs(sliderPointerInit - e_client_x) > 40){
				
					//which way are we scrolling?
					if(sliderInitPosition > scrollToPosition) currentSlide --;
					else currentSlide ++;
					
					//change the currentSlide variable
					if(currentSlide < 0 ) currentSlide = 0;
					if(currentSlide >= imageTotal) currentSlide = imageTotal - 1;
				}
				sliderSnap.start(currentSlide*windowWidth + windowWidth/4, 0);
			
				//quick tap or click (we haven't moved the finger more than 3 pixels either way)
				if(Math.abs(sliderPointerInit - e_client_x) <= 3 && Math.abs(touchInitPoint - e_client_y) <=3){
					
					//change image view mode: fill-screen or full-screen
					e.stop();
					windowSnap.start(0,0);
					window.fireEvent('toggletap');
				}
				
    		} // e.changedTouches.length==1
    	} // touchend
    }); // sliderEl.addEvents
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    /*----------> ON PAGE RIP --------->*/
    //the script below used to be right on art.php page
    //it now has been moved here for better performance
    
    
    

    
    
	//USER COUNTRY (US is default)
	
	var usShipping = '5';
	var caShipping = '10';
	var defaultShipping = '18';
	
	var ipCountry;
	var ipCountryCode;
	
	var changeCountry = $$('.changeCountry');
	var userCountry = $$('.userCountry');
	var countryFlag = $$('.countryFlag');
	var shipPrice = $$('.shipPrice');
	
	
	//--executed after first image load
	
	function setIpShipping(ipCountryCode){
		switch(ipCountryCode){
			case 'US': shipPrice.set('html', usShipping).addClass('set'); break;
			case 'CA': shipPrice.set('html', caShipping).addClass('set'); break;
			default: shipPrice.set('html', defaultShipping).addClass('set'); break;
		}
	}
	
	changeCountry.addEvent('click', function(e){
		e.stop();
		(function(){ changeCountry.removeClass('active'); }).delay(100);
		var currentCountry = userCountry[0].get('html');
		
		
		switch (currentCountry){
			case 'to ' + ipCountry: //switch to to Canada
				if(ipCountry != 'to Canada'){
					userCountry.set('html','to Canada');
					countryFlag.set('src','/design/isoFlags-32/CA.png');
					shipPrice.set('html', caShipping);
					break;
				}
			case 'to Canada': //switch to to USA
				if(ipCountry != 'to USA'){
					userCountry.set('html','to USA');
					countryFlag.set('src','/design/isoFlags-32/US.png');
					shipPrice.set('html', usShipping);
					break;
				}
			case 'to USA': //switch to Other
			case 'to Canada':
				userCountry.set('html','Worldwide');
				countryFlag.set('src','/design/isoFlags-32/_united-nations.png');
				shipPrice.set('html', defaultShipping);
				break;
				
			case 'Worldwide': //switch to IP country
				userCountry.set('html', 'to ' + ipCountry);
				countryFlag.set('src','/design/isoFlags-32/'+ipCountryCode+'.png');
				setIpShipping(ipCountryCode);
				break;
				
		}	
			
	});
	
	
	window.addEvents({
		'toggletap': function(){
		
			if(viewToggle == 0 && window.getScroll().y <= 100)
				(hideHeader || Function)();
				
			if(viewToggle == 1 && window.getScroll().y <= 100)
				(showHeader || Function)();
			
		},
		'scrollend': function(){
			if(window.getScroll().y < 300 && viewToggle == 0 && t)
				(function(){ (hideHeader || Function)(); }).delay(5);

		},
		'scroll': function(){
			if(window.getScroll().y < 300 && viewToggle == 0 && !t)
				(function(){ (hideHeader || Function)(); }).delay(5);

		},
		'resize': function(){ /*if(domready)responsive();*/ },
		'pushstate': function(){
		
			//track pageview with google analytics
			/*
			if (typeof ga == 'function')
				ga('send', 'pageview', {
				  'page': location.pathname,
				  'title': document.title
				});
			*/
		}
	});
	
	
	

	
	
	
	
	//FIRST IMAGE LOADED---
	window.addEvent('firstImageLoaded',function(){

		//STRIPE--
		Asset.javascript('https://checkout.stripe.com/checkout.js', {
			onLoad: function(){
			
				// sale banner clicks:
				if($$('.sale')[0]){
					$$('.sale').addEvent('click', function(){
						$$('.buyPrint')[currentSlide].fireEvent('click');
					});
				};
				// other purchase button replicas:
				purchasePrint = function(){
					$$('.buyPrint')[currentSlide].fireEvent('click');
				}
    
				$$('.buyPrint').removeClass('loadingContainer').addEvent('click', function(e){
					
					// remove animation after 10s
					activeBuyPrintButton = this;
					clarBuyButtonStyles();
					function clarBuyButtonStyles(){
						(function(){
							activeBuyPrintButton.addClass('animateAll').removeClass('active');
							(function(){
								activeBuyPrintButton.removeClass('animateAll');
							}).delay(500);
						}).delay(10000);
					}
			
			
		
					// var chargeShipping = parseFloat(shipPrice[currentSlide].get('html').stripTags());
						// when no cents in shipping price:
					var chargeShipping = parseFloat(shipPrice[currentSlide].get('html').stripTags())*100;
					
					if (isNaN(chargeShipping)) chargeShipping =  parseFloat(defaultShipping.stripTags());
					var chargeTotal = Math.round(parseFloat(detailsEl[currentSlide].getElements('.printPrice')[0].get('html').stripTags()))*100+chargeShipping;
					
					// var shortDesc = /* $$('.printSize')[currentSlide].get('html').stripTags() +*/ 'Pay $' + chargeTotal/100 + 'USD';
					
					
					
					var imageTitle = sliderTitles[currentSlide];
					// var imageFile = imageDir+largeImageP+sliderImage[currentSlide].get('data-image');
					var details = '$' + chargeTotal/100 + ' (including shipping)';
					var shortDesc = '"' + imageTitle + '" Print';
		
					var token = function(res, args){
						//create token value
						var orderToken = new Element('input', {
							'name': 'order-token',
							'value': res.id
						});

						//get customer email
						var orderEmail = new Element('input', {
							'name': 'order-email',
							'value': res.email
						});
		
						//get customer address
						var orderCustomer = new Element('input', {
							'name': 'order-customer',
							'value': 'Ship to: ' + args.shipping_address_line1 + ' ' + args.shipping_address_city + ' ' + args.shipping_address_state + ' ' + args.shipping_address_zip + ' ' + args.shipping_address_country
						});
		
						//create full description for invoice
						var orderDescription = new Element('input', {
							'name': 'order-description',
							'value': imageTitle + ': '+ shortDesc
						});
		
						//create amount value
						var orderAmount = new Element('input', {
							'name': 'order-amount',
							'value': chargeTotal
						});
		
		
						/*
						//--print title to replicate this form in case of error
						var printTitle = new Element('input', {
							'name': 'print-title',
							'value': imageTitle
						});
			
						//--print image url
						var printTitle = new Element('input', {
							'name': 'image-url',
							'value': sliderImage[currentSlide].get('src')
						});
						*/
			
			
			
						//create virtual form
						var orderForm = new Element('form', {
							'action' : '/order/',
							'method' : 'POST'
						});
						//submit virtual form
						orderForm.adopt(orderToken, orderEmail, orderCustomer, orderDescription, orderAmount, printTitle).submit();
					};
		
					//checkout variables for the payment
					StripeCheckout.open({
						key:			'pk_live_GazfSGLrdsRWa27pq8rLnOHj',

						shippingAddress	:	true,
						billingAddress:	false,


						amount: 		chargeTotal,
						currency:    	'USD',
						name:        	shortDesc,
						description: 	details,
						// image:  		imageFile,
						token:       	token
					});
				
				}); //--END STRIPE CLICK EVENT
				
			}
		}); //--END STRIPE GET SCRIPT	
		
		
		
		
		//which country?
		new Request.JSONP({
			url: 'https://freegeoip.net/json/' + visitorIP,
			onComplete: function(d){

				ipCountry = d.country_name;
				ipCountryCode = d.country_code;
				userCountry.set('html', 'to ' + ipCountry).addClass('set').removeClass('loadingContainer');
				countryFlag.set('src','/design/isoFlags-32/'+ipCountryCode+'.png').addClass('set');
				
				setIpShipping(ipCountryCode);
			}
		}).send();
		
		// default country if hasn't worked for 7 seconds:
		(function(){
			if(ipCountry == undefined){
				ipCountry = 'Worldwide';
				ipCountryCode = '_united-nations';
				userCountry.set('html',ipCountry).addClass('set').removeClass('loadingContainer');
				countryFlag.set('src','/design/isoFlags-32/'+ipCountryCode+'.png').addClass('set');
			
				(function(){ setIpShipping(ipCountryCode); })();
			}
		}).delay(7000);
		
		
		
	
		//load security and accepted cards images
		$$('img.security').each(function(el,i){
			el.set('src', el.get('data-image'));
		});
		$$('.acceptedCards').each(function(el,i){
			el.set('src', el.get('data-image'));
		});
	
		

	}); //---END FIRST IMAGE LOADED
		
	
	
	/*----------> END ON PAGE RIP --------->*/
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	domready = true;
	sliderSnap.start(currentSlide*windowWidth + windowWidth/4, 0);
	sliderBox.addClass('init');
	sizeIS();
	
	
		
		
		
		
} // if($('imageSlider'))