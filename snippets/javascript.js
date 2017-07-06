/*
---
MooTools: the javascript framework

web build:
 - http://mootools.net/more/57b8bd2345d42a894fc248a7f302459a

packager build:
 - packager build More/Number.Format More/String.Extras More/Fx.Elements More/Fx.Scroll More/Request.JSONP More/Assets

copyrights:
  - [MooTools](http://mootools.net)

licenses:
  - [MIT License](http://mootools.net/license.txt)
...
*/

MooTools.More={version:"1.5.0",build:"73db5e24e6e9c5c87b3a27aebef2248053f7db37"};(function(){var b=function(c){return c!=null;};var a=Object.prototype.hasOwnProperty;
Object.extend({getFromPath:function(e,f){if(typeof f=="string"){f=f.split(".");}for(var d=0,c=f.length;d<c;d++){if(a.call(e,f[d])){e=e[f[d]];}else{return null;
}}return e;},cleanValues:function(c,e){e=e||b;for(var d in c){if(!e(c[d])){delete c[d];}}return c;},erase:function(c,d){if(a.call(c,d)){delete c[d];}return c;
},run:function(d){var c=Array.slice(arguments,1);for(var e in d){if(d[e].apply){d[e].apply(d,c);}}return d;}});})();(function(){var b=null,a={},d={};var c=function(f){if(instanceOf(f,e.Set)){return f;
}else{return a[f];}};var e=this.Locale={define:function(f,j,h,i){var g;if(instanceOf(f,e.Set)){g=f.name;if(g){a[g]=f;}}else{g=f;if(!a[g]){a[g]=new e.Set(g);
}f=a[g];}if(j){f.define(j,h,i);}if(!b){b=f;}return f;},use:function(f){f=c(f);if(f){b=f;this.fireEvent("change",f);}return this;},getCurrent:function(){return b;
},get:function(g,f){return(b)?b.get(g,f):"";},inherit:function(f,g,h){f=c(f);if(f){f.inherit(g,h);}return this;},list:function(){return Object.keys(a);
}};Object.append(e,new Events);e.Set=new Class({sets:{},inherits:{locales:[],sets:{}},initialize:function(f){this.name=f||"";},define:function(i,g,h){var f=this.sets[i];
if(!f){f={};}if(g){if(typeOf(g)=="object"){f=Object.merge(f,g);}else{f[g]=h;}}this.sets[i]=f;return this;},get:function(r,j,q){var p=Object.getFromPath(this.sets,r);
if(p!=null){var m=typeOf(p);if(m=="function"){p=p.apply(null,Array.from(j));}else{if(m=="object"){p=Object.clone(p);}}return p;}var h=r.indexOf("."),o=h<0?r:r.substr(0,h),k=(this.inherits.sets[o]||[]).combine(this.inherits.locales).include("en-US");
if(!q){q=[];}for(var g=0,f=k.length;g<f;g++){if(q.contains(k[g])){continue;}q.include(k[g]);var n=a[k[g]];if(!n){continue;}p=n.get(r,j,q);if(p!=null){return p;
}}return"";},inherit:function(g,h){g=Array.from(g);if(h&&!this.inherits.sets[h]){this.inherits.sets[h]=[];}var f=g.length;while(f--){(h?this.inherits.sets[h]:this.inherits.locales).unshift(g[f]);
}return this;}});})();Locale.define("en-US","Number",{decimal:".",group:",",currency:{prefix:"$ "}});Number.implement({format:function(q){var n=this;q=q?Object.clone(q):{};
var a=function(i){if(q[i]!=null){return q[i];}return Locale.get("Number."+i);};var f=n<0,h=a("decimal"),k=a("precision"),o=a("group"),c=a("decimals");if(f){var e=a("negative")||{};
if(e.prefix==null&&e.suffix==null){e.prefix="-";}["prefix","suffix"].each(function(i){if(e[i]){q[i]=a(i)+e[i];}});n=-n;}var l=a("prefix"),p=a("suffix");
if(c!==""&&c>=0&&c<=20){n=n.toFixed(c);}if(k>=1&&k<=21){n=(+n).toPrecision(k);}n+="";var m;if(a("scientific")===false&&n.indexOf("e")>-1){var j=n.split("e"),b=+j[1];
n=j[0].replace(".","");if(b<0){b=-b-1;m=j[0].indexOf(".");if(m>-1){b-=m-1;}while(b--){n="0"+n;}n="0."+n;}else{m=j[0].lastIndexOf(".");if(m>-1){b-=j[0].length-m-1;
}while(b--){n+="0";}}}if(h!="."){n=n.replace(".",h);}if(o){m=n.lastIndexOf(h);m=(m>-1)?m:n.length;var d=n.substring(m),g=m;while(g--){if((m-g-1)%3==0&&g!=(m-1)){d=o+d;
}d=n.charAt(g)+d;}n=d;}if(l){n=l+n;}if(p){n+=p;}return n;},formatCurrency:function(b){var a=Locale.get("Number.currency")||{};if(a.scientific==null){a.scientific=false;
}a.decimals=b!=null?b:(a.decimals==null?2:a.decimals);return this.format(a);},formatPercentage:function(b){var a=Locale.get("Number.percentage")||{};if(a.suffix==null){a.suffix="%";
}a.decimals=b!=null?b:(a.decimals==null?2:a.decimals);return this.format(a);}});(function(){var e={a:/[àáâãäåăą]/g,A:/[ÀÁÂÃÄÅĂĄ]/g,c:/[ćčç]/g,C:/[ĆČÇ]/g,d:/[ďđ]/g,D:/[ĎÐ]/g,e:/[èéêëěę]/g,E:/[ÈÉÊËĚĘ]/g,g:/[ğ]/g,G:/[Ğ]/g,i:/[ìíîï]/g,I:/[ÌÍÎÏ]/g,l:/[ĺľł]/g,L:/[ĹĽŁ]/g,n:/[ñňń]/g,N:/[ÑŇŃ]/g,o:/[òóôõöøő]/g,O:/[ÒÓÔÕÖØ]/g,r:/[řŕ]/g,R:/[ŘŔ]/g,s:/[ššş]/g,S:/[ŠŞŚ]/g,t:/[ťţ]/g,T:/[ŤŢ]/g,u:/[ùúûůüµ]/g,U:/[ÙÚÛŮÜ]/g,y:/[ÿý]/g,Y:/[ŸÝ]/g,z:/[žźż]/g,Z:/[ŽŹŻ]/g,th:/[þ]/g,TH:/[Þ]/g,dh:/[ð]/g,DH:/[Ð]/g,ss:/[ß]/g,oe:/[œ]/g,OE:/[Œ]/g,ae:/[æ]/g,AE:/[Æ]/g},d={" ":/[\xa0\u2002\u2003\u2009]/g,"*":/[\xb7]/g,"'":/[\u2018\u2019]/g,'"':/[\u201c\u201d]/g,"...":/[\u2026]/g,"-":/[\u2013]/g,"&raquo;":/[\uFFFD]/g},c={ms:1,s:1000,m:60000,h:3600000},b=/(\d*.?\d+)([msh]+)/;
var a=function(h,j){var g=h,i;for(i in j){g=g.replace(j[i],i);}return g;};var f=function(g,i){g=g||"";var j=i?"<"+g+"(?!\\w)[^>]*>([\\s\\S]*?)</"+g+"(?!\\w)>":"</?"+g+"([^>]+)?>",h=new RegExp(j,"gi");
return h;};String.implement({standardize:function(){return a(this,e);},repeat:function(g){return new Array(g+1).join(this);},pad:function(g,j,i){if(this.length>=g){return this;
}var h=(j==null?" ":""+j).repeat(g-this.length).substr(0,g-this.length);if(!i||i=="right"){return this+h;}if(i=="left"){return h+this;}return h.substr(0,(h.length/2).floor())+this+h.substr(0,(h.length/2).ceil());
},getTags:function(g,h){return this.match(f(g,h))||[];},stripTags:function(g,h){return this.replace(f(g,h),"");},tidy:function(){return a(this,d);},truncate:function(g,h,k){var j=this;
if(h==null&&arguments.length==1){h="…";}if(j.length>g){j=j.substring(0,g);if(k){var i=j.lastIndexOf(k);if(i!=-1){j=j.substr(0,i);}}if(h){j+=h;}}return j;
},ms:function(){var g=b.exec(this);if(g==null){return Number(this);}return Number(g[1])*c[g[2]];}});})();Fx.Elements=new Class({Extends:Fx.CSS,initialize:function(b,a){this.elements=this.subject=$$(b);
this.parent(a);},compute:function(g,h,j){var c={};for(var d in g){var a=g[d],e=h[d],f=c[d]={};for(var b in a){f[b]=this.parent(a[b],e[b],j);}}return c;
},set:function(b){for(var c in b){if(!this.elements[c]){continue;}var a=b[c];for(var d in a){this.render(this.elements[c],d,a[d],this.options.unit);}}return this;
},start:function(c){if(!this.check(c)){return this;}var h={},j={};for(var d in c){if(!this.elements[d]){continue;}var f=c[d],a=h[d]={},g=j[d]={};for(var b in f){var e=this.prepare(this.elements[d],b,f[b]);
a[b]=e.from;g[b]=e.to;}}return this.parent(h,j);}});(function(){Fx.Scroll=new Class({Extends:Fx,options:{offset:{x:0,y:0},wheelStops:true},initialize:function(c,b){this.element=this.subject=document.id(c);
this.parent(b);if(typeOf(this.element)!="element"){this.element=document.id(this.element.getDocument().body);}if(this.options.wheelStops){var d=this.element,e=this.cancel.pass(false,this);
this.addEvent("start",function(){d.addEvent("mousewheel",e);},true);this.addEvent("complete",function(){d.removeEvent("mousewheel",e);},true);}},set:function(){var b=Array.flatten(arguments);
this.element.scrollTo(b[0],b[1]);return this;},compute:function(d,c,b){return[0,1].map(function(e){return Fx.compute(d[e],c[e],b);});},start:function(c,d){if(!this.check(c,d)){return this;
}var b=this.element.getScroll();return this.parent([b.x,b.y],[c,d]);},calculateScroll:function(g,f){var d=this.element,b=d.getScrollSize(),h=d.getScroll(),j=d.getSize(),c=this.options.offset,i={x:g,y:f};
for(var e in i){if(!i[e]&&i[e]!==0){i[e]=h[e];}if(typeOf(i[e])!="number"){i[e]=b[e]-j[e];}i[e]+=c[e];}return[i.x,i.y];},toTop:function(){return this.start.apply(this,this.calculateScroll(false,0));
},toLeft:function(){return this.start.apply(this,this.calculateScroll(0,false));},toRight:function(){return this.start.apply(this,this.calculateScroll("right",false));
},toBottom:function(){return this.start.apply(this,this.calculateScroll(false,"bottom"));},toElement:function(d,e){e=e?Array.from(e):["x","y"];var c=a(this.element)?{x:0,y:0}:this.element.getScroll();
var b=Object.map(document.id(d).getPosition(this.element),function(g,f){return e.contains(f)?g+c[f]:false;});return this.start.apply(this,this.calculateScroll(b.x,b.y));
},toElementEdge:function(d,g,e){g=g?Array.from(g):["x","y"];d=document.id(d);var i={},f=d.getPosition(this.element),j=d.getSize(),h=this.element.getScroll(),b=this.element.getSize(),c={x:f.x+j.x,y:f.y+j.y};
["x","y"].each(function(k){if(g.contains(k)){if(c[k]>h[k]+b[k]){i[k]=c[k]-b[k];}if(f[k]<h[k]){i[k]=f[k];}}if(i[k]==null){i[k]=h[k];}if(e&&e[k]){i[k]=i[k]+e[k];
}},this);if(i.x!=h.x||i.y!=h.y){this.start(i.x,i.y);}return this;},toElementCenter:function(e,f,h){f=f?Array.from(f):["x","y"];e=document.id(e);var i={},c=e.getPosition(this.element),d=e.getSize(),b=this.element.getScroll(),g=this.element.getSize();
["x","y"].each(function(j){if(f.contains(j)){i[j]=c[j]-(g[j]-d[j])/2;}if(i[j]==null){i[j]=b[j];}if(h&&h[j]){i[j]=i[j]+h[j];}},this);if(i.x!=b.x||i.y!=b.y){this.start(i.x,i.y);
}return this;}});function a(b){return(/^(?:body|html)$/i).test(b.tagName);}})();Request.JSONP=new Class({Implements:[Chain,Events,Options],options:{onRequest:function(a){if(this.options.log&&window.console&&console.log){console.log("JSONP retrieving script with url:"+a);
}},onError:function(a){if(this.options.log&&window.console&&console.warn){console.warn("JSONP "+a+" will fail in Internet Explorer, which enforces a 2083 bytes length limit on URIs");
}},url:"",callbackKey:"callback",injectScript:document.head,data:"",link:"ignore",timeout:0,log:false},initialize:function(a){this.setOptions(a);},send:function(c){if(!Request.prototype.check.call(this,c)){return this;
}this.running=true;var d=typeOf(c);if(d=="string"||d=="element"){c={data:c};}c=Object.merge(this.options,c||{});var e=c.data;switch(typeOf(e)){case"element":e=document.id(e).toQueryString();
break;case"object":case"hash":e=Object.toQueryString(e);}var b=this.index=Request.JSONP.counter++;var f=c.url+(c.url.test("\\?")?"&":"?")+(c.callbackKey)+"=Request.JSONP.request_map.request_"+b+(e?"&"+e:"");
if(f.length>2083){this.fireEvent("error",f);}Request.JSONP.request_map["request_"+b]=function(){this.success(arguments,b);}.bind(this);var a=this.getScript(f).inject(c.injectScript);
this.fireEvent("request",[f,a]);if(c.timeout){this.timeout.delay(c.timeout,this);}return this;},getScript:function(a){if(!this.script){this.script=new Element("script",{type:"text/javascript",async:true,src:a});
}return this.script;},success:function(b,a){if(!this.running){return;}this.clear().fireEvent("complete",b).fireEvent("success",b).callChain();},cancel:function(){if(this.running){this.clear().fireEvent("cancel");
}return this;},isRunning:function(){return !!this.running;},clear:function(){this.running=false;if(this.script){this.script.destroy();this.script=null;
}return this;},timeout:function(){if(this.running){this.running=false;this.fireEvent("timeout",[this.script.get("src"),this.script]).fireEvent("failure").cancel();
}return this;}});Request.JSONP.counter=0;Request.JSONP.request_map={};var Asset={javascript:function(d,b){if(!b){b={};}var a=new Element("script",{src:d,type:"text/javascript"}),e=b.document||document,c=b.onload||b.onLoad;
delete b.onload;delete b.onLoad;delete b.document;if(c){if(!a.addEventListener){a.addEvent("readystatechange",function(){if(["loaded","complete"].contains(this.readyState)){c.call(this);
}});}else{a.addEvent("load",c);}}return a.set(b).inject(e.head);},css:function(d,a){if(!a){a={};}var b=new Element("link",{rel:"stylesheet",media:"screen",type:"text/css",href:d});
var c=a.onload||a.onLoad,e=a.document||document;delete a.onload;delete a.onLoad;delete a.document;if(c){b.addEvent("load",c);}return b.set(a).inject(e.head);
},image:function(c,b){if(!b){b={};}var d=new Image(),a=document.id(d)||new Element("img");["load","abort","error"].each(function(e){var g="on"+e,f="on"+e.capitalize(),h=b[g]||b[f]||function(){};
delete b[f];delete b[g];d[g]=function(){if(!d){return;}if(!a.parentNode){a.width=d.width;a.height=d.height;}d=d.onload=d.onabort=d.onerror=null;h.delay(1,a,a);
a.fireEvent(e,a,1);};});d.src=a.src=c;if(d&&d.complete){d.onload.delay(1);}return a.set(b);},images:function(c,b){c=Array.from(c);var d=function(){},a=0;
b=Object.merge({onComplete:d,onProgress:d,onError:d,properties:{}},b);return new Elements(c.map(function(f,e){return Asset.image(f,Object.append(b.properties,{onload:function(){a++;
b.onProgress.call(this,a,e,f);if(a==c.length){b.onComplete();}},onerror:function(){a++;b.onError.call(this,a,e,f);if(a==c.length){b.onComplete();}}}));
}));}};
















/*----------------------------------------declaring variables-----------------------------------------*/


// main body and nav variables
var docB;
var scrl;
var mainHeader;
// var host = window.location.protocol + '//' + location.hostname;

var t;
var iApp;
var lo;
var domready = false;


// IPHONE DETECTION
if((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i))) iPh = true;
else iPh = false;
// IPAD [OR OTHER SUPPORTED TABLET] DETECTION
if(navigator.userAgent.match(/iPad|PlayBook/i)) iPd = true;
else iPd = false;


//RETINA?
function isRetina(){
    return ((window.matchMedia && (window.matchMedia('only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx), only screen and (min-resolution: 75.6dpcm)').matches || window.matchMedia('only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2/1), only screen and (min--moz-device-pixel-ratio: 2), only screen and (min-device-pixel-ratio: 2)').matches)) || (window.devicePixelRatio && window.devicePixelRatio > 2));
}; var retina = isRetina();

/*
// SAFARI?
var safariFix = false;
if(Browser.safari && Browser.version < 8)
safariFix = true;
*/


// FUNCTION TO DETERMINE WINDOW SIZE
var wS;

// GENERAL FUNCTION TO BE CALLED DURING SCREEN RESIZE
function rS(){
	resizeHeader();
}







// EXTENDING BROWSER PUSHSTATE/HISTORY API

// extend native popstate to allow x.addEvent('popstate',fn);
Element.NativeEvents.popstate = 2;

// var firstReferrer = document.referrer;
// var 
var historyDefault = function(){ 
	if(historyUrls[0] != location.pathname)
	window.location = location.pathname;
}

var hI = 0;
var historyUrls = [location.pathname];
// var historyTitles = [document.title];
// var historyImages = [$$('meta[property="og:image"]')[0].get('content') || false];

var returnActions = [historyDefault];
var nullFn = function(){};

function trackingAndTags(){
	
	// fetch document properties:
	new Request({ 
		url: location.pathname,
		onSuccess: function(text){
			
			// get document contents/xml tree
			var tree = new DOMParser().parseFromString (text, "text/html");
			
			// document title
			document.title = tree.getElementsByTagName('title')[0].innerHTML || 'ArtSocket'; 
			
			// meta image
			var metaTags = tree.getElementsByTagName('meta');
			for (i = 0, n = metaTags.length; i < n; i++){
				if($$('meta[property="og:image"]')[0]){
					if (metaTags[i].getAttribute('property') == 'og:image'){
						var ogimage = metaTags[i].content;
						if(!ogimage.contains(urlDomain))ogimage = urlDomain + ogimage; // make sure it's absolute path
						$$('meta[property="og:image"]')[0].set('content', ogimage); 
					}
				} else return;
			}
			
			// canonical tag
			var linkTags = tree.getElementsByTagName('link');
			for (i = 0, n = linkTags.length; i < n; i++){
				if (linkTags[i].getAttribute('rel') == 'canonical')
					whatIsCanonical().set('href', linkTags[i].href);
			}
			
			
			
			// google analytics pageview tracking
			if (typeof ga == 'function')
				ga('send', 'pageview', {
					'page': location.pathname,
					'title': document.title
				});
	
			socialActions();	// update social buttons
			console.log('tracking & social actions updated')
	
	
		}
	}).send();
	
	
	
	
}


// controlling browser back button:
window.addEvent('popstate', function(e){

	trackingAndTags();
	
	// historyGoBack();
	var hIprev = hI;
	hI = historyUrls.indexOf(location.pathname);
	console.log('hI r: ' + hI);
	
	if(hIprev > hI)returnActions[hI+1](); // back button
	else returnActions[hI](); // forward button
	
	console.log('popstate');
	console.log(returnActions[hI]);
	
});



// function for easy, full-featured history entry creation with HTML element modifications:
function historyGo(url, options){
	// title, image, returnAction
	
	// clean url of AJAX stuff
	url = prettyAjaxUrl(url);
	
	history.pushState(null, url, url);	// push to url bar
	trackingAndTags();
	
	
	hI ++;
	console.log('hI: ' + hI);
	
	historyUrls[hI] = url;
	console.log(historyUrls);
		
	returnActions[hI] = options.returnAction || nullFn;
	console.log(returnActions);
	
}

function prettyAjaxUrl(url){
	
	url = url.replace('&ajax_request=true','').replace('?ajax_request=true','').replace(urlDomain, '');
	
	// special case url switches
	if(url.contains('/process-email.php')) url = '/subscribe/';
	
	if(!url.contains('http') && !url.contains('//'))
		return(url);
}








docB = $(document.body);
docB.addClass(Browser.name);


scrl = new Fx.Scroll(docB, {transition: 'circ:out'});
mainHeader = $$('body > header')[0];
mainHeaderSection = $$('main > header section')[0] || false;
//IS THIS IN WEB APP MODE??	
if (docB.hasClass('iApp')) iApp = true;
else iApp = false; 
//TOUCH DEVICE?
function is_touch_device() { return !!('ontouchstart' in window) ? 1 : 0;}; t = is_touch_device(); 
if(!t)docB.addClass('mouse');
//determine window size:
wS = function(){
	var wS = docB.getSize();
	return wS;
}
var wSx = wS().x;
var wSy = wS().y;
window.addEvent('resizeend', function(){
	wSx = wS().x;
	wSy = wS().y;
});
		
doNotSteal($$('.doNotSteal'), true);
		
if(mainHeader){		
	homeButton = $$('body > header .homeButton')[0];
	logoSVGel = $$('body > header .logoButton svg.logoSVG rect');
	logoSVGc = logoSVGel.length;
	logoSVG = $$('body > header .logoButton')[0];
}
loadingAnimation = function(){ if(mainHeader){ mainHeader.removeClass('light'); logoSVG.addClass('animationLoading'); } }
lo = function(){ if(mainHeader && logoSVG) { logoSVG.removeClass('animationLoading'); } };
		
//SEARCH BUTTON
window.addEvent('domready', function(){
	if($('searchQuery')){
		$('searchQuery').addEvents({
			'click': function(e){
				e.stop();
				fullScreenInput('Search', false, '/search/');
				// this.removeClass('active');
			},
			'touchstart': function(e){
				e.stop();
				fullScreenInput('Search', false, '/search/');
				// this.removeClass('active');
			}
		});
	}
});

// automatically full-screen all search fields
$$('form').each(function(el){
	if(el.get('action').contains('/search'))
	el.getChildren('input[type="text"]')[0].addEvent('focus', function(e){
		e.stop();
		fullScreenInput('Search', this.get('value'), '/search/');
	});
});



// FULL SCREEN INPUT FIELDS
var fsInputScrollMem = window.getScroll().y;	
bodyDontScroll = function(e){ e.preventDefault(); }
var fsinputFormEl = false;
var fsinputScrl;

// correct scroll or exit the popup
fullScreenFormScrollSnap = function(){
	/*
	if(t && ( window.getScroll().y > fsInputScrollMem + 100 ||  window.getScroll().y < fsInputScrollMem - 100 )){
		history.back();
	}
	else 
	*/
	if(t && ( window.getScroll().y > fsInputScrollMem + 10 ||  window.getScroll().y < fsInputScrollMem - 10 )){
		scrl.start(0, fsInputScrollMem);
	}
	// console.log('fullScreenFormScrollSnap');
};

// close popup
closeInput = function(){
	if(fsinputFormEl){
		
		// history.back();
		historyDefault();
		
		fsinputFormEl.setStyles({
			'opacity': 0,
			'position': null,
			'-webkit-transform': 'translateY('+(fsInputScrollMem)+'px) scale(.85, .85)',
			'-moz-transform': 'translateY('+(fsInputScrollMem)+'px) scale(.85, .85)',
			'transform': 'translateY('+(fsInputScrollMem)+'px) scale(.85, .85)'
		}).removeClass('appear');
		
		(function(){
			if(fsinputFormEl){
				$('fsinputForm').destroy();
				fsinputFormEl = false;
			}
			
		}).delay(500);
		
		docB.removeClass('fsinput');
		
		// resume normal scrolling:
		// $(document).removeEvent('touchmove', bodyDontScroll);
		window.removeEvent('scrollend', fullScreenFormScrollSnap);
		// clearInterval(correctFullScreenFormPosition);
		
	} else historyDefault();
	
	// console.log(0);
}

fullScreenInput = function(placeholder, inputValue, action){
	
	if(domready){ // domready == popstate fired, need to wait for popstate
	
	
		fsInputScrollMem = window.getScroll().y;
		
		// case for ajax popup:
		if(placeholder == 'ajaxContent'){
			fullScreenForm = new Element('div', {
				'id': 'fsinputForm',
				'class': 'animateAllFast loadingContainer',
			});
		
			historyGo(action, {returnAction: closeInput});
			new Request.HTML({ 
				url: action,
				append: fullScreenForm,
				onSuccess: function(tree, elements, html, js){
			
				
					fullScreenForm.removeClass('loadingContainer');
					
					// load javascript for Medium embeds
					if(html.contains('class="m-story"')){
						if($('mediumEmbed'))$('mediumEmbed').destroy();
						Asset.javascript('https://static.medium.com/embed.js', {
							id: 'mediumEmbed'
						});
					}
				
					// load javascript for Instagram embeds
					if(html.contains('class="instagram-media"')){
						if(!$('instagramEmbed'))
						Asset.javascript('https://platform.instagram.com/en_US/embeds.js', {
							id: 'instagramEmbed',
							onLoad: function(){
								window.instgrm.Embeds.process();
							}
						});
						else window.instgrm.Embeds.process();
					}
				}
			}).get();
	
		}
		else {
			/* if(action.contains('eurekaking-forms')){
				
				// cache EK form element
				if(!$('eurekaKingForm_cache') && $('eurekaKingForm'))
				$('eurekaKingForm').set('id', 'eurekaKingForm_cache').setStyle('display', 'none');
				
				fullScreenForm = $('eurekaKingForm_cache').clone();
				fullScreenForm.set('id', 'eurekaKingForm').setStyle('display', 'block');
				
				historyGo('/subscribe/', {returnAction: closeInput });
			}
			else {
			*/
				fullScreenForm = new Element('form', {
					'method': 'get',
					'id': 'fsinputForm',
					'action': action,
					'class': 'animateAllFast',
					'html': '<input type="text" name="for" required placeholder="'+ placeholder +'" maxlength="200" /><input type="submit" />'
				});

				historyGo(prettyAjaxUrl(action), {returnAction: closeInput });
			// }

		}

		var fullScreenFormXClicked = false;
		fullScreenFormX = new Element('a', {
			'id': 'fsinputClose',
			'class': 'animateAllFast',
			'href': 'javascript:void(0);',
			'html': '<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 56 56" xml:space="preserve" class="searchIcon animateAllFast"><g fill="none" stroke-width="2"><path d="M55 27H29V1c0-0.6-0.4-1-1-1s-1 0.4-1 1v26H1c-0.6 0-1 0.4-1 1 0 0.6 0.4 1 1 1h26v26c0 0.6 0.4 1 1 1s1-0.4 1-1V29h26c0.6 0 1-0.4 1-1C56 27.4 55.6 27 55 27z"/></g></svg>',
			events: {
				click: function(e) { e.stop(); if(!fullScreenFormXClicked){ history.back(); fullScreenFormXClicked = true; } },
				touchstart: function(e) { e.stop();  if(!fullScreenFormXClicked){ history.back(); fullScreenFormXClicked = true; } }
			}
		});
	
		
		fullScreenForm.setStyles({
			'-webkit-transform': 'translateY('+(fsInputScrollMem)+'px) scale(.85, .85)',
			'-moz-transform': 'translateY('+(fsInputScrollMem)+'px) scale(.85, .85)',
			'transform': 'translateY('+(fsInputScrollMem)+'px) scale(.85, .85)'
		}).inject(docB, 'top');
		
		fullScreenFormX.inject(fullScreenForm, 'top');
		fsinputFormEl = $('fsinputForm') || $('eurekaKingForm');
		fsinputScrl = new Fx.Scroll(fsinputFormEl, {transition: 'circ:out'});
	
		if(iPh && window.innerHeight > window.innerWidth && window.getScroll().y < 10)
			window.scrollTo(0,0);
		
		(function(){
			fullScreenForm.setStyles({
				'opacity': 1,
				'-webkit-transform': 'translate3d(0, '+(fsInputScrollMem)+'px, 0)',
				'-moz-transform': 'translate3d(0, '+(fsInputScrollMem)+'px, 0)',
				'transform': 'translate3d(0, '+(fsInputScrollMem)+'px, 0)'
			});

			window.scrollTo(0,fsInputScrollMem);
			if($$('#fsinputForm input[type="text"]')[0]){
				$$('#fsinputForm input[type="text"]')[0].focus();
				if(inputValue !== false) $$('#fsinputForm input[type="text"]')[0].set('value', inputValue);
			}
			
		}).delay(100);
		(function(){ fullScreenFormX.addClass('appear'); }).delay(250);
		
		
		// final animations:
		(function(){
			docB.addClass('fsinput');
			if(t)fullScreenForm.setStyle('position','relative');
		}).delay(500);
		
		
		// correcting for overscroll:
		fullScreenForm.addEvents({
			'touchend': fullScreenFormScrollSnap,
		});
		window.addEvent('scrollend', fullScreenFormScrollSnap);
	
	}
	else window.location = prettyAjaxUrl(action);
}	
		
		
		
		
		
		
		
		
		
		




//GENERAL FUNCTIONS TO BE CALLED ON SCROLL
var scrollP_header = 0;
if(viewToggle == undefined) var viewToggle = false;
var scrollTimer = null;
//var pageH = $$('main')[0].getSize().y;
function sC(){


	/*if(domready && !t)*/(headerVisibilityLogic || Function)();
	
	
	
	//create end scroll event
	/*
	if(scrollTimer !== null) {
		clearTimeout(scrollTimer);  
	}
	scrollTimer = setTimeout(function() {
		  window.fireEvent('scrollend');
	}, 150);
	*/

	//light header stuff (from below)
	if(mainHeader){
		if(domready && lightHeader && window.getScroll().y > 10)
		mainHeader.removeClass('light');
		else if(domready && lightHeader)
		mainHeader.addClass('light');
	}
	
}
function sCEnd(){
	// if(t)(headerVisibilityLogic || Function)();
};


//lighter header transparency on pages with top banner:
var lightHeader = false;
var headerVisibilityLogic;
var hideHeader;
var showHeader;




//READ function
function read(id){
	if(domready && (window.getScroll().y < (wS().y/3) || id)){
		if(id)scrl.start(0, $(id).getPosition().y);
        else
        scrl.start(0, wS().y);
    }
	else scrl.toTop();
}


// read button for header
if($$('main > header .scrollButton') && mainHeaderSection){
	$$('main > header .scrollButton').addEvent('click', function(e){
		e.stop();
		read();
	});

	// header effects
	/*
	window.addEvent('scroll', function(){
		mainHeaderSection.setStyles({
			'-webkit-transform': 'translate(0,-'+window.getScroll().y+'px)',
			'-moz-transform': 'translate(0,-'+window.getScroll().y+'px)',
			'transform': 'translate(0,-'+window.getScroll().y+'px)'
		});
	});
	*/
	window.addEvent('scroll', function(){
		if(window.getScroll().y > 5)
			mainHeaderSection.addClass('reading');
		else
			mainHeaderSection.removeClass('reading');

		if(window.getScroll().y >= (wSy/3))
			$$('main > header .scrollButton').addClass('scrollUp');
		else
			$$('main > header .scrollButton').removeClass('scrollUp');
	});
}



//NOTIFY function
function notify(content, persistent){

	//remove all previous notifications
	killNotify();
	
	
	//close it on timeout (unless prescribed to stay)
	if (typeof persistent === 'undefined')
	(function(){ killNotify(); }).delay(5500);



	var notifyAside = new Element('aside', {
		'class': 'alert animateAll',
		'role': 'note',
		'id': 'notification',
		'title': 'Click or tap this message to close it'
	});
	var notifyP = new Element('p', {
		'role': 'alert',
		'html': content
	});
	if(domready)notifyAside.inject($$('body > header > div')[0], 'after');
	notifyP.inject(notifyAside);

	//style the notification box:
	var notificationBox = $('notification');

	//kill on click
	notificationBox.addEvent('click', killNotify);


	var notificationBoxH = notificationBox.getSize().y;
	notificationBox.setStyle('height', 0).addClass('animateAll');

	(function(){ notificationBox.setStyle('height', notificationBoxH); }).delay(500);

	if($$('#notification p span')[0] != undefined && $$('#notification p span')[0].get('data-type')!='')
		notificationBox.addClass($$('#notification p span')[0].get('data-type'));
}
function killNotify(){
	if($('notification')) {
		$('notification').setStyle('height', 0);
		(function(){
			$('notification').destroy();
		}).delay(500);
	}
}


//LOADING indicator animation and listener
var logoSVG;
var homeButton;
var logoSVGel;
var loadingAnimation; //start loading animation
var lo; //end loading animaiton








//do not steal my shit!
function doNotSteal(el, contextMenuReset){
	el.each(function(el,i){
		if(contextMenuReset)el.addEvent('contextmenu', function(e){ e.preventDefault(); });
		el.ondragstart = function(e) {
			e.preventDefault();
			this.fireEvent('contextmenu',e);
		};
	});
}




//ONLOAD
rS();
		
		
		
		
var resizeTimer; // resize delay: only resize after resizing is done
var closeInput; // function to close input field
var fullScreenInput; // function to open full-screen input field

// detect user pinch zoom (& fire event):
// var pinchZoomedIn = false;
function pinchZoomedIn(){
	condition = false;
	if((document.documentElement.clientWidth / window.innerWidth ) > 1){
		condition = true;
	}
	return condition;
}

var pinchZoomEventFired = false;
var pzf = function(){
	if(pinchZoomedIn() && pinchZoomEventFired != 'in'){
		window.fireEvent('userpinchzoom', 'in');
	}
	else if(pinchZoomEventFired != 'normal'){
		window.fireEvent('userpinchzoom', 'normal');
	}
};
pzf.periodical(1000);

	
window.addEvents({
	//resize window and elements (tied with orientation change for handheld)
	'resize': function(){
		//fire resizeend event (when we are done resizing the window)
		if(resizeTimer !== null) clearTimeout(resizeTimer);
		
		// touch devices "resize" browser window every time you scroll
		if(!t) resizeTimer = setTimeout(function() {  window.fireEvent('resizeend'); }, 250);
		//
	},
	'resizeend': rS,
	'orientationchange': function(){
		rS();
		if(fsinputFormEl) history.back();  // close input field
	},

	
	
	// user pinch zoom reactive design:
	'userpinchzoom': function(e){
		if(e == 'in'){
			if(mainHeader){
				mainHeader.setStyles({
					'opacity':'0',
					'position': 'absolute'
				}); 
			}
		}
		else {
			if(mainHeader){
				mainHeader.setStyles({
					'opacity':'1',
					'position': null
				});
			}
		}
	},
	
	
	

	'scroll': sC,

	'click:relay(a)': function(e){
	
		var el = this;
		var ev = e;
		window.addEvent('domready', function(){
        
			//DO NOT OPEN IPHONE APP LINKS IN NEW WINDOW
			if((iPh || iPd) && iApp && el.get('href').contains('://')
			//payments have to be taken outside of the app window:
			&& !el.get('class').contains('checkout')){
				ev.stop();
				window.location = el.get('href');
				return false
			}
		
			//all other links
			else li(el, ev);
		});

	},
	//KEYBOARD SHORTCUTS
	keydown: function(e){
		switch (e.key){
			case 'esc':
                lo(); // cancel loading
                if(fsinputFormEl) history.back(); // close input field
				break;
			case 'enter':
				if (e.target.tagName.toLowerCase() !== 'input'){ //prevent firing during filling out forms
					e.stop(); 
					//
				}
				break;
			case 'left':
				//
				break;
			case 'right':
				//
				break;
			
			//custom scrolling fn:
			case 'down':
				e.stop();
				if(!fsinputFormEl){
					fsinputScrl.stop();
					if(domready)scrl.start(0,window.getScroll().y + wS().y/2);
				}else{
					scrl.stop();
					
					fsinputScrl.start(0,fsinputFormEl.getScroll().y + wS().y/2);
				}
				break;
			case 'up':
				e.stop();
				if(!fsinputFormEl){
					fsinputScrl.stop();
					if(domready)scrl.start(0,window.getScroll().y - wS().y/2);
				}else{
					scrl.stop();
					fsinputScrl.start(0,fsinputFormEl.getScroll().y - wS().y/2);
				}
				break;
		}
	},
	'domready': function(){
		domready = true;
		console.log('domready');
		if (typeof lo == 'function') lo();
		
		
		
		
		
		//------EXECUTE ON DOMREADY ONLY
		$$('.moreLink').each(function(el,i){
			el.addEvent('click', function(){
				if (typeof lo == 'function') lo();
				$(el.get('data-more')).addClass('show');
				(function(){ $(el.get('data-more')).setStyle('opacity',1); }).delay(100);
				el.setStyle('display', 'none');
			});
		});
		
		
		
		//Set (and remain) key links and buttons to "active" state when clicked
		$$('a').addEvents({
			'click': function(e){
				
				var el = this;
				var ev = e;
				window.addEvent('domready', function(e){
					li(el, ev);
				
					if(el.get('target')!='_blank')
					el.addClass('active');
				
				});
			},
			
			// an idea to bring up page title and description on hover
			/*
			'mouseover': function(e){
				if(!this.hasClass('nostyle') && this.getParent('main') !== null){
					console.log('hover');
					var linkUrl = this.get('href');
					new Request.HTML({
						url: linkUrl,
						onComplete: function(responseTree, responseElements, responseHTML, responseJavaScript){
							console.log(responseElements.filter('title'));
						}
					}).send();
				}
			},
			*/
			'touchstart': function(e){
				if(this.get('target')!='_blank')
				this.addClass('active');
				
				// pinch zoom detector
				pzf();
			},
			'touchend': function(e){
				//li(this, e);
			},
			'touchcancel': function(){
				this.removeClass('active');	
			},
			'touchmove': function(){
				this.removeClass('active');	
			}
		});


		
		/*
		if(!$('imageSlider') && typeof  $$('.social')[0] !== 'undefined'){ //image page is optimized to load social button counters after the image
			socialCounters();
		}
		*/
		
		if(mainHeader){
			$$(logoSVG).addEvents({
				'mouseenter': function(){
					if(domready && !t){
						logoSVGel.each(function(el,i){
							(function(){
								el.setStyles({
									'-webkit-transform':'rotateY(360deg)',
									'msTransform':'rotateY(360deg)',
									'-moz-transform':'rotateY(360deg)',
									'transform':'rotateY(360deg)'
								});
							}).delay(i*25);
							lo(); //hide loading indicator on mouseover
						});
						// if(!safariFix) homeButton.setStyle('letter-spacing', '0.25em');
					}
				},
				'mouseleave': function(){
					if(domready && !t){
						logoSVGel.each(function(el,i){
							(function(){
								el.setStyles({
									'-webkit-transform':'rotateY(0deg)',
									'msTransform':'rotateY(0deg)',
									'-moz-transform':'rotateY(0deg)',
									'transform':'rotateY(0deg)'
								});
							}).delay((logoSVGc-i)*25);
						});
						// if(!safariFix) homeButton.setStyle('letter-spacing', '');
					}
				}
			});
		}
		//SAFARI FIX FOR LETTER-SPACING (one more time, so it starts quicker)
		// safariLetterSpacing();
		
		
		
		
		
		
		
		
		
		
		//HIDE/SHOW shortcut HEADER FUNCTIONS
		if(mainHeader){
			if($('identifierHomepage') || $('identifierMagPink')) lightHeader = true;
			
			if(lightHeader)
			mainHeader.addClass('light');

			hideHeader = function(){
				if(!mainHeader.hasClass('hide'))
				mainHeader.addClass('hide');
			}
			showHeader = function(){
				if(mainHeader.hasClass('hide'))
				mainHeader.removeClass('hide');
			}
			headerVisibilityLogic = function(){
	
				//scrolling down
				if(window.getScroll().y > scrollP_header+10 && window.getScroll().y > wSy/1.5){
					hideHeader();
					scrollP_header = window.getScroll().y;
				}
	
				//scrolling up
				else if ((window.getScroll().y < scrollP_header || window.getScroll().y < wSy/1.5) && 
	
					//using native JS here to determine bottom of the page for more accuracy
					docB.scrollHeight >
					(docB.scrollTop +        
					window.innerHeight + 50)&&
		
					//dont show the header if the image is full-screen
					viewToggle !==0
				){
					showHeader();
					scrollP_header = window.getScroll().y;
				}
	
	
	
				//notify the user (if he scrolled down enough) how to bring back the top menu
				//only for the slider page
			
			
				if(typeof sliderEl !== 'undefined' && viewToggle ==0 && (window.getScroll().y >= 20) && !pinchZoomedIn()){
					windowedScreenView();
				}
				if(typeof sliderEl !== 'undefined' && viewToggle ==1 && (window.getScroll().y == 0) && !pinchZoomedIn()){
					fullScreenView();
				}
			
			
		
			}
		}
		
		
		
		
		
		
		
		
		





	},
	'scrollend': sCEnd,
	'load': function(){ (headerVisibilityLogic || Function)(); }
});


//SAFARI FIX FOR LETTER-SPACING
/*
function safariLetterSpacing() {
	if(safariFix){
		$$($$('.animateAll'),$$('.animateLetterSpacing'), homeButton).setStyle('letter-spacing','0.05em');	
	}
}safariLetterSpacing();
*/


		
		
		
		
		
		
		

//LOADING INDICATOR
function li(el, e){ 
    if(
        
        (	//checks to run if element has class
        	!el.get('class') || (
        		//link can not be a scroll button
				!el.get('class').test('read')
				//...is not gallery arrow
				&& !el.get('class').contains('leftArrow')
				&& !el.get('class').contains('rightArrow')
			)
		)
        //...it must be internal
        && !el.get('href').contains('://')
        //...can't be javascript lauhcn
        && !el.get('href').contains('javascript:')
        //...is not a link to be opened in a new window
        && el.get('target')!='_blank'
    ){
        e.stop();
        liFx(el.get('href'));
    }
}
function liFx(urx) {
	if (typeof loadingAnimation == 'function') loadingAnimation();
	if (typeof showHeader == 'function') showHeader();
	if(urx)(function(){ window.location = urx; }).delay(350);
}





//li(this, e);











//REDIRECT 'SHITTY IE' USERS
if(Browser.ie && Browser.version < 11) window.location = '/upgrade.html';












//SOCIAL
function whatIsCanonical(){
	var canonical;
	var links = $$('link');
	for (var i = 0; i < links.length; i ++) {
		if (links[i].get('rel') === 'canonical') {
			canonical = links[i];
		}
	}
	return canonical;
}
function socialActions(){
	$$('.social.facebook').removeEvents('click').addEvent('click', function(e){
		e.stop();
		window.open('https://www.facebook.com/sharer/sharer.php?u='+whatIsCanonical().get('href')+'', '', 'width=640, height=400');

	});
	$$('.social.twitter').removeEvents('click').addEvent('click', function(e){
		e.stop();
		shareTweet = encodeURIComponent(document.title);
		shareTweet = shareTweet.replace('%20%7C%20ArtSocket%20Art%20Gallery','');
		window.open('https://twitter.com/intent/tweet?text='+shareTweet+'&url='+whatIsCanonical().get('href')+'&hashtags=artsocket&related=artsocket', '', 'width=640, height=400');

	});
	$$('.social.pinterest').removeEvents('click').addEvent('click', function(e){
		e.stop();

		//current slide
		if(typeof currentSlide !== 'undefined') 
		pinterestMedia = "https://www.artsocket.com" + imageDir+largeImageP+sliderImage[currentSlide].get('data-image');

		//or a image with class .pinterestMedia
		else if(typeof $$('meta[property="og:image"]')[0] !== 'undefined')
		pinterestMedia = $$('meta[property="og:image"]').get('content')[0];

		//default
		else pinterestMedia = "https://www.artsocket.com/images/content/pages/mag-poster.jpg";

		pinterestMedia = encodeURIComponent(pinterestMedia);
		if($('documentDescription'))
			pinterestDescription = encodeURIComponent($('documentDescription').get('content'));
		else pinterestDescription = '';
		window.open('https://pinterest.com/pin/create/button/?url='+whatIsCanonical().get('href')+'&media='+pinterestMedia+'&description='+pinterestDescription, '', 'width=640, height=400');
	});
}
window.addEvent('domready', socialActions);

/*
function socialCounters(){

	if($$('.social')[0]){

		var shareUrl = whatIsCanonical().get('href');

		//Facebook counter & action
		
		new Request.JSONP({
			url: 'https://graph.facebook.com/fql?q=select%20total_count%20from%20link_stat%20where%20url=%22'+shareUrl+'%22',
			onComplete: function(d){
				$$('.social .facebook .count').set('html',d.data[0].total_count).addClass('set');
				//console.log('https://graph.facebook.com/fql?q=select%20total_count%20from%20link_stat%20where%20url=%22'+shareUrl+'%22');
			}
		}).send();
		$$('.social .facebook').removeEvents('click').addEvent('click', function(e){
			e.stop();
			window.open('https://www.facebook.com/sharer/sharer.php?u='+shareUrl+'', '', 'width=640, height=400');
		
		});

		//Twitter counter & action
		new Request.JSONP({
			url: 'https://cdn.api.twitter.com/1/urls/count.json?url='+shareUrl,
			onComplete: function(d){
				$$('.social .twitter .count').set('html',d.count).addClass('set');
			}
		}).send();
		$$('.social .twitter').removeEvents('click').addEvent('click', function(e){
			e.stop();
			shareTweet = encodeURIComponent('Check out ' + document.title);
			shareTweet = shareTweet.replace('%C2%B7','on');
			window.open('https://twitter.com/intent/tweet?text='+shareTweet+'&url='+shareUrl+'&hashtags=artsocket&related=artsocket', '', 'width=640, height=400');
		
		});

		//Pinterest counter & action
	
		new Request.JSONP({
			url: 'https://api.pinterest.com/v1/urls/count.json?url='+whatIsCanonical().get('href'),
			onComplete: function(d){
				$$('.social .pinterest .count').set('html',d.count).addClass('set');
			}
		}).send();
		$$('.social .pinterest').removeEvents('click').addEvent('click', function(e){
			e.stop();
		
			//current slide
			if(typeof currentSlide !== 'undefined') 
			pinterestMedia = imageDir+largeImageP+sliderImage[currentSlide].get('data-image');
		
			//or a image with class .pinterestMedia
			else if(typeof $$('img.pinterestMedia')[0] !== 'undefined') pinterestMedia = $$('.pinterestMedia').get('src');
		
			//default
			else pinterestMedia = "/images/content/pages/blog-about.jpg";
		
			pinterestMedia = encodeURIComponent(host + pinterestMedia);
			pinterestDescription = encodeURIComponent(document.title);
			window.open('https://pinterest.com/pin/create/button/?url='+whatIsCanonical().get('href')+'&media='+pinterestMedia+'&description='+pinterestDescription, '', 'width=640, height=400');
		});
	
		//Google+ action
		$$('.social .google').set('href', 'javascript:window.open("https://plus.google.com/share?url='+whatIsCanonical().get('href')+'", "", "width=640, height=420");');
		
	
	}
	
}
*/




var exploreListCare;
function em(){
	var em = 15;
	if($$('body > footer > .logoButton')[0]){
		em = $$('body>footer>.logoButton')[0].getSize().x / 2;
		return em;
	}
}

/* EXPLORELIST */
downstatesForGalleryLists = false;
exploreListCare = function(){
	if($('exploreList') || $$('.exploreSection')[0]){
	
		// correct image sizes
		if(window.getSize().x > 720)bgSizePrefix = 'L_';
		else bgSizePrefix = 's_';
	
		// load the large, featured article images
		var backgroundImageUrl = [];
		var featuredImageLoadedList = [];
		var printPreviewSrc = [];
		// var elsewhereImageLoadedList = [];
		
		
		$$($$('#exploreList > a'),$$('.exploreSection > a')).each(function(el,i){
			if(el){
			
				el.addClass('loadingContainer');
				window.addEvent('scroll', function(){
					loadFeaturedListImages(el,i);
				});
				function loadFeaturedListImages(el, i){
					if(!featuredImageLoadedList[i] && window.getScroll().y > el.getPosition().y - wS().y){
						featuredImageLoadedList[i] = true;
						if(el.get('data-background-image') !== undefined && el.get('data-background-image') !== null){
							if(el.hasClass('art')){
								backgroundImageUrl[i] = '/images/thumbnails/?blur='+blurImageLevel+'&i=/images/art/' + bgSizePrefix + el.get('data-background-image');
							}
							else if(el.hasClass('mag')){
								if(blurBlogFeatures){
									backgroundImageUrl[i] =  '/images/thumbnails/?blur='+blurImageLevel+'&i=' + el.get('data-background-image');
								}
								else{
									backgroundImageUrl[i] =  el.get('data-background-image');
								}
							}
							Asset.image(backgroundImageUrl[i], {
								onLoad: function(){
									var img = new Element('img', {
										'src': '/design/blank.gif',
										'styles': {
											'background-image': 'url(' + backgroundImageUrl[i] + ')'
										}
									});
									img.inject(el);
									(function(){
										if(el.hasClass('art')) { img.setStyle('opacity',.5); }
										else {
											img.setStyle('opacity',1);
											el.removeClass('loadingContainer');
										}
									}).delay(100);
								
									// show print previews
									if(el.getElements('img')[0] && !el.hasClass('mag')){
										printPreviewSrc[i] = '/images/art/' + bgSizePrefix + el.get('data-background-image');
										Asset.image(printPreviewSrc[i], {
											onLoad: function(){
												el.getElements('img')[0].set('src', printPreviewSrc[i]).addClass('show');
												el.removeClass('loadingContainer');
											}
										});
									}
								
								}
							});
						}
					}
				}loadFeaturedListImages(el, i);
			}
		});

		$$('#exploreList > article > span').each(function(el,i){
			el.addEvent('click', function(e){
				e.stop();
				console.log('.' + el.get('data-artist-scrollto'));
				srollToArtist = ($$('.' + el.get('data-artist-scrollto'))[0]).getPosition().y - 58;
				scrl.start(0, srollToArtist);
			});

			$$('#exploreList > article')[i]

		});			

		var sectionSize = window.getSize().y*.75;
		window.addEvent('resize', function(){ sectionSize = window.getSize().y*.75; });
		$$('#exploreList > article').each(function(el,i){
			window.addEvent('scroll', function(){
				if(window.getScroll().y > el.getPosition().y + sectionSize - 56){
					el.addClass('mellowDivider');
				}else{
					el.removeClass('mellowDivider');
				}
			});
		});
		
		
		if(downstatesForGalleryLists){
			$$('#exploreList a').addEvents({
				'click': function(e){
					if(this.get('target')!='_blank')
					this.addClass('active');
				},
				'touchstart': function(e){
					if(this.get('target')!='_blank')
					this.addClass('active');
					pzf();
				},
				'touchcancel': function(){
					this.removeClass('active');	
				},
				'touchmove': function(){
					this.removeClass('active');	
				}
			});
		}
		
		
		
		
						
	}
}
window.addEvent('domready', exploreListCare);





// full-screen image previews:
var figurePreviewScrollLocation = 0;
var firegurePreviewActiveEl;
window.addEvent('domready', function(){
	$$('main > article section figure.feature > a').addEvent('click', function(e){ e.stop(); });
	$$('main > article section figure.feature img').addEvent('click', function(e){
		if(!this.getParent('figure').hasClass('productPreview')){
			e.stop();
			if(!this.hasClass('noZoom') && this.hasClass('loaded')){
				var ratio = this.getSize().x/this.getSize().y;
				var width = docB.getSize().y*ratio;
				this.set('data-ratio', ratio);
		
				var figureEl = this.getParent('figure');
	
				if(!docB.hasClass('figurePreview')){
					(function(){ docB.addClass('figurePreview'); }).delay(500);
	
					if(this.getSize().y < docB.getSize().y){
						figurePreviewScrollLocation = this.getPosition().y - (docB.getSize().y - this.getSize().y)/2;
						scrl.start(0, figurePreviewScrollLocation);
						figureEl.setStyle('opacity','1');
					}else{
						figurePreviewScrollLocation = this.getPosition().y;
						if(this.getStyle('margin-top')){
							figurePreviewScrollLocation = this.getPosition().y - parseFloat(this.getStyle('margin-top'));
							this.set('data-margin-top',this.getStyle('margin-top'));
						}
						scrl.start(0, figurePreviewScrollLocation);
			
				
						if(this.getSize().y > docB.getSize().y){
				
							var morph = new Fx.Morph(this, {duration: 250});
							(function(){
								morph.start({
									'height': docB.getSize().y,
									'width': width,
									'margin-left': (docB.getSize().x - width)/2,
									'margin-top': 0
								});
								figureEl.setStyle('opacity','1');
							}).delay(500);
					
					
						}
			
			
					}
	
					(function(){
						window.addEvent('scroll', scrollFigurePreviewClose);
					}).delay(500);
					if(!t)window.addEvent('scrollend', scrollFigurePreviewRestore);
					else window.addEvent('touchend', scrollFigurePreviewRestore);
				}else{
					figurePreviewClose();
				}
				firegurePreviewActiveEl = this;
	
			}
		}
	});
	figureFocus();
});


// figure blur load
if(blurFigureImages){
	$$('main > article section figure img').each(function(el,i){
		if(!el.getParent('figure').hasClass('productPreview')){
			el.addClass('animateAll').addClass('loadBlur');
			el.getParent('figure').setStyle('background-image','url(/images/thumbnails/?blur='+blurImageLevel+'&i=' + el.get('src') + ')');
			Asset.image('/images/thumbnails/?blur='+blurImageLevel+'&i=' + el.get('src'), {
				onLoad: function(){
				
					window.addEvent('scroll', function(){
						loadFigureImages(el);
					});
					loadFigureImages(el);
					
				}
			});
		}
	});
	function loadFigureImages(el){
		if(window.getScroll().y > el.getPosition().y - wS().y){
			Asset.image(el.get('src'), {
				onLoad: function(){
					el.setStyle('opacity',1);
					(function(){
						el.getParent('figure').setStyle('background-image',null);
						el.removeClass('animateAll').addClass('loaded');
					}).delay(500);
				}
			});
		}
	}
}
	
	

// bottom-align figure images:
window.addEvent('resizeend', figureFocus); 
function figureFocus(){
	$$('main > article section figure.focusBottom img').each(function(el,i){
		Asset.image(el.get('src'), {
			onLoad: function(){
				if(el.getSize().y > wS().y){
					el.setStyle('margin-top', wS().y - el.getSize().y);
				}else{
					el.setStyle('margin-top', null);
				}
			}
		});
	});
}



var headerSizeRatio;
window.addEvent('domready', function(){
	if($$('main > header')[0]){
		$$('main > header')[0].addEvent('click', function(){
			if(!this.hasClass('noFigurePreview') && this.hasClass('loaded')){
				if(docB && !docB.hasClass('figurePreview')){
					figurePreviewScrollLocation = 0;
					docB.addClass('figurePreview');
					scrl.start(0, 0);
		
					(function(){
						window.addEvent('scroll', scrollFigurePreviewClose);
					}).delay(500);
					if(!t)window.addEvent('scrollend', scrollFigurePreviewRestore);
					else window.addEvent('touchend', scrollFigurePreviewRestore);
				}else{
					figurePreviewClose();
				}
				firegurePreviewActiveEl = this;
			}
		});
		$$('main > header section')[0].addEvent('click', function(e){ e.stop(); });
	
		if($$('main > header > img')[0]){
			var headerImage = $$('main > header > img')[0].get('src');
			$$('main > header')[0].addClass('loadingContainer');
			Asset.image(headerImage, { onLoad: fadeInHeader });
			fadeInHeader.delay(6000); // fade in after 6s even if not loaded
			function fadeInHeader(){
				mainHeaderImage = $$('main > header > img')[0];
				if(mainHeaderImage.getStyle('opacity') == 0){
					mainHeaderImage.setStyle('opacity', 1);
					$$('main > header')[0].addClass('loaded').removeClass('loadingContainer');
					// see function below:
					headerSizeRatio = mainHeaderImage.getSize().x/mainHeaderImage.getSize().y;
					if(!isNaN(headerSizeRatio)){
						resizeHeader();
					}else{
						(function(){
							headerSizeRatio = mainHeaderImage.getSize().x/mainHeaderImage.getSize().y;
							resizeHeader();
						}).delay(500);
					}
				}
			}
		}
		
	}
});




function resizeHeader(){
	// resize header image if necessary:
	var headerImage = $$('main > header > img')[0];
	if($$('main > header > video')[0]) headerImage = $$('main > header > video')[0];
	if(headerSizeRatio && !isNaN(headerSizeRatio)){
		windowScreenRatio = window.getSize().x/window.getSize().y;
		if(windowScreenRatio < headerSizeRatio){
			var marginLeft = (window.getSize().x - headerImage.getSize().x)/2;
			if(marginLeft < 0){
				headerImage.setStyle('margin-left', (window.getSize().x - headerImage.getSize().x)/2);
			}
			headerImage.addClass('vertical');
			flickerHeader();
		}
		else {
			headerImage.removeClass('vertical').setStyle('margin-left', null);
			flickerHeader();
		}
		mainHeader.setStyle('width','');
	}
}// resizeHeader();

// avoid flicker due to undefined dimensions
function flickerHeader(){
	// resize header image if necessary:
	var headerImage = $$('main > header > img')[0];
	if($$('main > header > video')[0]) headerImage = $$('main > header > video')[0];
	headerImage.setStyles({'opacity':0, 'display':'none'});
	(function(){
		headerImage.setStyle('display', 'block');
		(function(){ headerImage.setStyle('opacity', 1); }).delay(10);
	}).delay(600);
}

// window.addEvent('resize', resizeHeader);




// functions to close preview on scroll:

function figurePreviewClose(){
	if(firegurePreviewActiveEl && !pinchZoomedIn()){
		if(docB){
			docB.removeClass('figurePreview');
			if(mainHeaderSection){
				mainHeaderSection.addClass('animateAll');
				(function(){ mainHeaderSection.removeClass('animateAll'); }).delay(600);
			}
			
		}
		window.removeEvent('scroll', scrollFigurePreviewClose);
		if(!t)window.removeEvent('scrollend', scrollFigurePreviewRestore);
		else window.removeEvent('touchend', scrollFigurePreviewRestore);
	
		var morph = new Fx.Morph(firegurePreviewActiveEl, {duration: 250});
		if(docB)
		morph.start({
			'height': docB.getSize().x/firegurePreviewActiveEl.get('data-ratio'),
			'width': docB.getSize().x,
			'margin-left': 0,
			'margin-top': firegurePreviewActiveEl.get('data-margin-top')
		});
		if(firegurePreviewActiveEl.getParent('figure'))
			firegurePreviewActiveEl.getParent('figure').setStyle('opacity', null);
	}
}

var scrollRestoreValue = 40;
function scrollFigurePreviewClose(){
	if(window.getScroll().y - scrollRestoreValue > figurePreviewScrollLocation || window.getScroll().y + scrollRestoreValue < figurePreviewScrollLocation){
		figurePreviewClose();
	}
}
function scrollFigurePreviewRestore(){
	if(window.getScroll().y - scrollRestoreValue <= figurePreviewScrollLocation || window.getScroll().y + scrollRestoreValue >= figurePreviewScrollLocation && !pinchZoomedIn()){
		scrl.start(0, figurePreviewScrollLocation);
	}
}

window.addEvent('resize', function(){
	if(!pinchZoomedIn()){
		docB.removeClass('figurePreview');
		window.removeEvent('scroll', scrollFigurePreviewClose);
		if(!t)window.removeEvent('scrollend', scrollFigurePreviewRestore);
		else window.removeEvent('touchend', scrollFigurePreviewRestore);
	
		$$('main > article section figure').each(function(el,i){
			if(!el.hasClass('productPreview') && el.hasClass('loaded')){
				el.getElements('img').set('style',null);
				console.log('removing styles from figure elements');
			}
		});
	}
	
});








// }); // end another domready




// LOAD EUREKA KING JS
// eurekaKingID = 'artsocket';
// Asset.javascript("https://s3-us-west-1.amazonaws.com/eurekaking-plugin/go.js?"+Math.floor((1 + Math.random()) * 0x10000));