/*!
* Awesome Responsive Photo Gallery - v1.2 - 12 January, 2025
* @realwebcare - https://www.realwebcare.com/
*/
;(function($){
	"use strict";
	$.fn.arpGallery = function(options) {
		var defaults = {
			mode:'slide',
			useCSS : true,
			easing: 'ease',//'cubic-bezier(0.25, 0, 0.25, 1)',//
			speed: 1000,
			loop: true,
			auto: false,
			pause: 4000,
			escKey:true,
			rel:false,
			
			//thumbnail
			exThumbImage: false,
			thumbnail: true,
			thumbWidth: 'auto',
			thumbHeight: '80px',
			thumbMargin: 5,
			caption:true,
			desc:true,

			//share
			share:true,
			facebook: true,
			facebookDropdownText: 'Facebook',
			twitter: true,
			twitterDropdownText: 'Twitter',
			linkedin: true,
			linkedinDropdownText: 'LinkedIn',
			pinterest: true,
			pinterestDropdownText: 'Pinterest',

			controls:true,
			hideControlOnEnd:false,
			download:true,
			counter: true,
			appendCounterTo: '.arpGallery-toolbar',
			fullScreen:true,

			mousewheel: true,
			mobileSrc: false,
			mobileSrcMaxWidth :640,

			//touch
			swipeThreshold: 50,
			enableSwipe: true,
			enableDrag: true,
			
			//video
			loadYoutubeThumbnail: true,
			youtubeThumbSize: 1,
			loadVimeoThumbnail: true,
			vimeoThumbSize: 'thumbnail_small',
			vimeoColor : 'CCCCCC',
			loadDailymotionThumbnail: true,
			videoAutoplay:false,
			videoMaxWidth:855,
			dynamic:false,
			
			//video params
			youtubePlayerParams: false,
			vimeoPlayerParams: false,
			dailymotionPlayerParams: false,
			
			//callbacks
			dynamicEl : [],
			onOpen: function() {},
			onSlideBefore: function() {},
			onSlideAfter: function() {},
			onSlideNext: function() {},
			onSlidePrev: function() {},
			onBeforeClose: function(){},
			onCloseAfter: function(){}
		},
		el = $(this),
		$children,
		index,
		arpGalleryOn = false,
		html = '<div id="arpGallery-outer"><div id="arpGallery-Gallery"><div id="arpGallery-slider"></div><div class="arpGallery-toolbar arpGallery-group"><a id="arpGallery-close" class="ag-icon"></a></div></div></div>',
		isTouch = document.createTouch !== undefined || ('ontouchstart' in window) || ('onmsgesturechange' in window) || navigator.msMaxTouchPoints,
		$gallery, $galleryCont, $slider, $slide, $prev, $next, prevIndex, $thumb_cont, $thumb, windowWidth, interval, usingThumb=false, aTiming= false, aSpeed = false;
		var settings = $.extend( true, {}, defaults, options);
		var arpGallery = {
			init: function(){
				el.each(function() {
					var $this = $(this);
                	
					if(settings.dynamic == true){
						$children = settings.dynamicEl;
						index = 0;
						prevIndex = index;
						setUp.init(index);	
					} else{
						$children = $(this).children();
						$children.click(function(e){
							if(settings.rel == true && $this.data('rel')){
								var rel = $this.data('rel');
								$children = $('[data-rel="'+rel+'"]').children();
							}else{
								$children = $this.children();
							}
							e.preventDefault();
							e.stopPropagation();
							index = $children.index(this);
							prevIndex = index;
							setUp.init(index);
						}); 
					}
                });
			},	
		};

		var setUp = {
			init: function(){
				this.start();	
				this.build();
			},
			start: function(){
				this.structure();	
				this.touch();
				this.enableTouch();
				this.getWidth();
				this.closeSlide();
			},
			build: function(){
				this.loadContent(index);
				this.addCaption();
				this.addDesc();//description
				this.addDownload();//download
				this.addFullscreen();//fullscreen
				this.addShare();//share
				this.addMousewheel();//mousewheel
				this.addCounter();//counter
				this.slideTo();
				this.getThumb();
				this.buildThumbnail(index);	
				this.keyPress();
				this.slide(index);
				setTimeout(function(){
					$gallery.addClass('opacity');
				},50);
			},

			structure: function(){
				$('body').append(html).addClass('arpGallery');
				$galleryCont = $('#arpGallery-outer');
				$gallery = $('#arpGallery-Gallery');
				$slider = $gallery.find('#arpGallery-slider');
				var slideList = '';
				if(settings.dynamic === true){
					for(var i = 0; i<settings.dynamicEl.length; i++){
						slideList += '<div class="arpGallery-slide"></div>';	
					}	
				}else{
					$children.each(function() {
						slideList += '<div class="arpGallery-slide"></div>';
					});
				}
				$slider.append(slideList);
				$slide = $gallery.find('.arpGallery-slide');
				if (settings.download === true) {
					$gallery.find('.arpGallery-toolbar').append('<a id="ag-download" target="_blank" download class="ag-download ag-icon"></a>');
				}
			},		
			closeSlide: function(){
				var $this = this;
				$('#arpGallery-close').bind('click touchend', function(){
					$this.destroy();
				});
			},
			addDownload: function(index){
			},
			addMousewheel: function(){
				if (settings.mousewheel === true) {
					var _this = this;
					$gallery.on('mousewheel.arpGallery', function(e) {
						if (!e.deltaY) {
							return;
						}
						if (e.deltaY > 0) {
							_this.prevSlide();
						} else {
							_this.nextSlide();
						}
						e.preventDefault();
					});
				}
			},
			addCounter: function() {
				if (settings.counter === true) {
					$(settings.appendCounterTo).append('<div id="arpGallery-counter"><span id="arpGallery-counter-current">' + (parseInt(index, 10) + 1) + '</span> / <span id="arpGallery-counter-all">' + $children.length + '</span></div>');
				}
			},
			getWidth: function(){
				var resizeWindow = function(){
					windowWidth = $(window).width();
				};
				$(window).bind('resize',resizeWindow());
			},
			doCss : function() {
				var support = function(){
					var transition = ['transition', 'MozTransition', 'WebkitTransition', 'OTransition', 'msTransition', 'KhtmlTransition'];
					var root=document.documentElement;
					for (var i=0; i<transition.length; i++){
						if (transition[i] in root.style){
							//cssPrefix = transition[i].replace('Transition', '').toLowerCase();
							//cssPrefix == 'transition' ? cssPrefix = 'transition' : cssPrefix = ('-'+cssPrefix+'-transition');
							return true;
						}
					}
				};
				if(settings.useCSS && support() ){
					return true;
				}
				return false;
			},
			enableTouch : function(){
				if(settings.enableSwipe === true) {
					if ( isTouch ){
						var $this = this,
						distance,
						swipeThreshold = settings.swipeThreshold,
						startCoords = {}, 
						endCoords = {};					
						$('body').bind('touchstart', function(e){
							$(this).addClass('touch');
							endCoords = e.originalEvent.targetTouches[0];
							startCoords.pageX = e.originalEvent.targetTouches[0].pageX;
							$('.touch').bind('touchmove',function(e){
								e.preventDefault();
								e.stopPropagation();
								endCoords = e.originalEvent.targetTouches[0];
							});	
							return false;
							}).bind('touchend',function(e){
								e.preventDefault();
								e.stopPropagation();
								distance = endCoords.pageX - startCoords.pageX;
								if( distance >= swipeThreshold ){
									$this.prevSlide();
									clearInterval(interval);
								}
								else if( distance <= - swipeThreshold ){
									$this.nextSlide();
									clearInterval(interval);
								}
								$('.touch').off('touchmove').removeClass('touch');						
						});
					}
				}
			},
			touch:function(){
				if(settings.enableDrag === true) {
					var xStart,xEnd;
					var $this = this;
					$('.arpGallery').bind('mousedown',function(e){
						e.stopPropagation();
						e.preventDefault();
						xStart = e.pageX;
					});
					$('.arpGallery').bind('mouseup',function(e){
						e.stopPropagation();
						e.preventDefault();
						xEnd = e.pageX; 
						if(xEnd-xStart>20){
							$this.nextSlide();
						}else if(xStart-xEnd>20){
							$this.prevSlide();
						}
					});
				}
			},
			isVideo: function(src, index){
				var html;
				if (settings.dynamic) {
					html = settings.dynamicEl[index].html;
				} else {
					html = $children.eq(index).attr('data-html');
				}
		
				if (!src) {
					if(html) {
						return {
							html5: true
						};
					} else {
						// console.error('awesomeGallery :- data-src is not pvovided on slide item ' + (index + 1) + '. Please make sure the selector property is properly configured.');
						return false;
					}
				}
				var youtube = src.match(/\/\/(?:www\.)?youtu(?:\.be|be\.com)\/(?:watch\?v=|embed\/)?([a-z0-9\-\_\%]+)/i);
				var vimeo = src.match(/\/\/(?:www\.)?vimeo.com\/([0-9a-z\-_]+)/i);
        		var dailymotion = src.match(/\/\/(?:www\.)?dai.ly\/([0-9a-z\-_]+)/i);
				if (youtube) {
					return {
						youtube: youtube
					};
				} else if (vimeo) {
					return {
						vimeo: vimeo
					};
				} else if (dailymotion) {
					return {
						dailymotion: dailymotion
					};
				}
			},
			loadVideo: function(src,a,_id) {
				var youtube = src.match(/\/\/(?:www\.)?youtu(?:\.be|be\.com)\/(?:watch\?v=|embed\/)?([a-z0-9\-\_\%]+)/i);
				var vimeo = src.match(/\/\/(?:www\.)?vimeo.com\/([0-9a-z\-_]+)/i);
				var dailymotion = src.match(/\/\/(?:www\.)?dai.ly\/([0-9a-z\-_]+)/i);
				var video = '';

				if(youtube) {    
					a = '?wmode=opaque&enablejsapi=1';
					if (settings.youtubePlayerParams) {
						a = a + '&' + $.param(settings.youtubePlayerParams);
					}							
					video = '<iframe id="video'+_id+'" width="560" height="315" src="//www.youtube.com/embed/' + youtube[1] + a + '" frameborder="0" allowfullscreen></iframe>';									
				} else if(vimeo) {    
					a = '?api=1';
					if (settings.vimeoPlayerParams) {
						a = a + '&' + $.param(settings.vimeoPlayerParams);
					}
					video = '<iframe id="video'+_id+'" width="560" height="315"  src="//player.vimeo.com/video/' + vimeo[1] + a + '" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
				} else if (dailymotion) {
					a = '?wmode=opaque&api=postMessage';
					if (settings.dailymotionPlayerParams) {
						a = a + '&' + $.param(settings.dailymotionPlayerParams);
					}
					video = '<iframe id="video'+_id+'" width="560" height="315" src="//www.dailymotion.com/embed/video/' + dailymotion[1] + a + '" frameborder="0" allowfullscreen></iframe>';		
				}
				return '<div class="video_cont" style="max-width:'+settings.videoMaxWidth+' !important;"><div class="video">'+video+'</div></div>';
			},	
			loadContent : function (index){
				var $this = this;
				var i,j,ob,l= $children.length - index;
				var src;
				$this.autoStart();
				if(settings.mobileSrc===true && windowWidth <= settings.mobileSrcMaxWidth){
					if(settings.dynamic == true){
						src = settings.dynamicEl[0]['mobileSrc'];	
					}else{
						src = $children.eq(index).attr('data-responsive-src');	
					}
				}
				else{
					if(settings.dynamic == true){
						src = settings.dynamicEl[0]['src'];	
					}else{
						src = $children.eq(index).attr('data-src');	
					}
				}
				if(!$this.isVideo(src)){ 
					$slide.eq(index).prepend('<img src="'+src+'" />');
					ob = $('img');
				}
				else{
					$slide.eq(index).prepend($this.loadVideo(src,true,index));
					ob = $('iframe');
					if(settings.auto && settings.videoAutoplay === true){
						clearInterval(interval);
					}
				}
				if($children.length > 1){
					$slide.eq(index).find(ob).on('load error',function(){
						for (i=0; i<=index-1; i++){ 
							var src;
							if(settings.mobileSrc===true && windowWidth <= settings.mobileSrcMaxWidth){
								if(settings.dynamic == true){
									src = settings.dynamicEl[index-i-1]['mobileSrc'];	
								}else{
									src = $children.eq(index-i-1).attr('data-responsive-src');		
								}
							}
							else{
								if(settings.dynamic == true){
									src = settings.dynamicEl[index-i-1]['src'];	
								}else{
									src = $children.eq(index-i-1).attr('data-src');	
								}
							}
							if(!$this.isVideo(src)){ 
								$slide.eq(index-i-1).prepend('<img src="'+src+'" />');
							}
							else{
									$slide.eq(index-i-1).prepend($this.loadVideo(src,false,index-i-1));
								}
						}
						for (j=1; j<l; j++){
							var src;
							if(settings.mobileSrc===true && windowWidth <= settings.mobileSrcMaxWidth){
								if(settings.dynamic == true){
									src = settings.dynamicEl[index+j]['mobileSrc'];	
								}else{
									src = $children.eq(index+j).attr('data-responsive-src');		
								}
							}
							else{
								if(settings.dynamic == true){
									src = settings.dynamicEl[index+j]['src'];	
								}else{
									src = $children.eq(index+j).attr('data-src');
								}
							}
							if(!$this.isVideo(src)){
								$slide.eq(index+j).prepend('<img src="'+src+'" />');
							}
							else{
									$slide.eq(index+j).prepend($this.loadVideo(src,false,index+j));
								}
						}
					});
				}
			},
			addCaption:function(){
				if(settings.caption === true){
					var i, title = false;
					for(i=0;i < $children.length; i++){
						if(settings.dynamic === true){
							title = settings.dynamicEl[i]['caption'];	
						}else{
							title = $children.eq(i).attr('data-title');
						}
						if(typeof title === 'undefined' || title === null){
							title = 'image '+i+'';	
						}
						$slide.eq(i).append('<div class="info group"><span class="ag-title">'+title+'</span></div>');
					}	
				}
			},
			addDesc:function(){
				if(settings.desc === true){
					var i, description = false;
					for(i=0;i < $children.length; i++){
						if(settings.dynamic === true){
							description = settings.dynamicEl[i].desc;	
						}else{
							description = $children.eq(i).attr('data-desc');
						}
						if(typeof description === 'undefined' || description === null){
							description = 'image '+i+'';
						}
						if(settings.caption === false){
							$slide.eq(i).append('<div class="info group"><span class="ag-desc">'+description+'</span></div>');	
						}else{
							$slide.eq(i).find('.info').append('<span class="ag-desc">'+description+'</span>');	
						}
					}			
				}
			},
			addShare: function () {
				if (settings.share === true) {
					var _this = this;
					var shareHtml = '<span id="ag-share" class="ag-icon">' +
						'<ul class="ag-dropdown" style="position: absolute;">';
					shareHtml += settings.facebook ? '<li><a id="ag-share-facebook" target="_blank"><span class="ag-icon"></span><span class="ag-dropdown-text">' + settings.facebookDropdownText + '</span></a></li>' : '';
					shareHtml += settings.twitter ? '<li><a id="ag-share-twitter" target="_blank"><span class="ag-icon"></span><span class="ag-dropdown-text">' + settings.twitterDropdownText + '</span></a></li>' : '';
					shareHtml += settings.linkedin ? '<li><a id="ag-share-linkedin" target="_blank"><span class="ag-icon"></span><span class="ag-dropdown-text">' + settings.linkedinDropdownText + '</span></a></li>' : '';
					shareHtml += settings.pinterest ? '<li><a id="ag-share-pinterest" target="_blank"><span class="ag-icon"></span><span class="ag-dropdown-text">' + settings.pinterestDropdownText + '</span></a></li>' : '';
					shareHtml += '</ul></span>';
			
					$gallery.find('.arpGallery-toolbar').append(shareHtml);
			
					$gallery.find('.arpGallery').append('<div id="ag-dropdown-overlay"></div>');
					$('#ag-share').on('click.arpGallery', function () {
						$gallery.toggleClass('ag-dropdown-active');
					});
			
					$('#ag-dropdown-overlay').on('click.arpGallery', function () {
						$gallery.removeClass('ag-dropdown-active');
					});
			
					$gallery.find('#ag-share-facebook').bind('click touchend', function () {
						// Get the URL of the page
						var facebookShareUrl = window.location.href;

						// console.log('URL:', facebookShareUrl);
					
						// Construct the Facebook share URL
						var facebookUrl = 'https://www.facebook.com/sharer/sharer.php?u=' +
							encodeURIComponent(facebookShareUrl);
					
						// Set the URL to the Facebook button
						$(this).attr('href', facebookUrl);
					});
					
					$gallery.find('#ag-share-twitter').bind('click touchend', function () {
						// Get the URL of the page
						var twitterShareUrl = window.location.href;
					
						// Get the description from the .ag-desc element
						var twitterDescription = $gallery.find('.arpGallery-slide.current .info .ag-desc').text().trim() || 'Check out this image!';
					
						// Construct the Twitter share URL
						var twitterUrl = 'https://twitter.com/intent/tweet?text=' +
							encodeURIComponent(twitterDescription) +
							'&url=' + encodeURIComponent(twitterShareUrl);
					
						// Set the URL to the Twitter button
						$(this).attr('href', twitterUrl);
					});
					
					$gallery.find('#ag-share-linkedin').bind('click touchend', function () {
						// Get the URL of the page
						var linkedinShareUrl = window.location.href;
					
						// Get the title from the .ag-title element
						var linkedinTitle = $gallery.find('.arpGallery-slide.current .info .ag-title').text().trim() || 'Check out this image!';

						// Get the description from the .ag-desc element
						var linkedinDescription = $gallery.find('.arpGallery-slide.current .info .ag-desc').text().trim() || 'Check out this image!';
					
						// Construct the LinkedIn share URL
						var linkedinUrl = 'https://linkedin.com/shareArticle?mini=true&url=' +
							encodeURIComponent(linkedinShareUrl) +
							'&title=' + encodeURIComponent(linkedinTitle) +
							'&summary=' + encodeURIComponent(linkedinDescription);
					
						// Set the URL to the LinkedIn button
						$(this).attr('href', linkedinUrl);
					});
					
					$gallery.find('#ag-share-pinterest').bind('click touchend', function () {
						// Get the URL of the page
						var pinterestShareUrl = window.location.href;
					
						// Get the image URL and description
						var pinterestImage = $gallery.find('.arpGallery-slide.current img').attr('src') || ''; // Replace with your logic to get the correct image
						var pinterestDescription = $gallery.find('.arpGallery-slide.current .info .ag-desc').text().trim() || 'Check out this image!'; // Corrected to retrieve text content
					
						// console.log('Description:', pinterestDescription);
					
						// Construct the Pinterest URL
						var pinterestUrl = 'http://www.pinterest.com/pin/create/button/?url=' +
							encodeURIComponent(pinterestShareUrl) +
							'&media=' + encodeURIComponent(pinterestImage) +
							'&description=' + encodeURIComponent(pinterestDescription);
					
						// Set the URL to the Pinterest button
						$(this).attr('href', pinterestUrl);
					});
				}
			},
			getShareProps: function(index, prop){
				var shareProp = '';
				if(settings.dynamic === true){
					shareProp = settings.dynamicEl[index][prop];
				} else {
					var _href = $gallery.eq(index).attr('href');
					var _prop = $gallery.eq(index).data(prop);
					shareProp = prop === 'src' ? _href || _prop : _prop;
				}
				return shareProp;
			},
			addFullscreen:function(){
				var fullScreen = '';
				if (settings.fullScreen === true) {
					// check for fullscreen browser support
					if (!document.fullscreenEnabled && !document.webkitFullscreenEnabled &&
						!document.mozFullScreenEnabled && !document.msFullscreenEnabled) {
						return;
					} else {
						fullScreen = '<span class="ag-fullscreen ag-icon"></span>';
						$gallery.find('.arpGallery-toolbar').append(fullScreen);
						this.fullScreen();
					}
				}
			},
			requestFullscreen:function(){
				var el = document.documentElement;
				if (el.requestFullscreen) {
					el.requestFullscreen();
				} else if (el.msRequestFullscreen) {
					el.msRequestFullscreen();
				} else if (el.mozRequestFullScreen) {
					el.mozRequestFullScreen();
				} else if (el.webkitRequestFullscreen) {
					el.webkitRequestFullscreen();
				}
			},
			exitFullscreen:function(){
				if (document.exitFullscreen) {
					document.exitFullscreen();
				} else if (document.msExitFullscreen) {
					document.msExitFullscreen();
				} else if (document.mozCancelFullScreen) {
					document.mozCancelFullScreen();
				} else if (document.webkitExitFullscreen) {
					document.webkitExitFullscreen();
				}
			},
			fullScreen:function() {
				var _this = this;
				$(document).on('fullscreenchange.arpGallery webkitfullscreenchange.arpGallery mozfullscreenchange.arpGallery MSFullscreenChange.arpGallery', function() {
					$gallery.toggleClass('ag-fullscreen-on');
				});
		
				$gallery.find('.ag-fullscreen').on('click.arpGallery', function() {
					if (!document.fullscreenElement &&
						!document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement) {
						_this.requestFullscreen();
					} else {
						_this.exitFullscreen();
					}
				});
			},

			getThumb: function(src, thumb, index) {
				var isVideo = this.isVideo(src, index) || {};
				var thumbImg;
				var vimeoId = '';
        		var thumbList = '';
				var thumbSpace = settings.thumbMargin - 6;
				var $thumb_inner = $gallery.find('.thumb_inner');
        		var vimeoErrorThumbSize = '';
	
				switch (settings.vimeoThumbSize) {
					case 'thumbnail_large':
						vimeoErrorThumbSize = '640';
						break;
					case 'thumbnail_medium':
						vimeoErrorThumbSize = '200x150';
						break;
					case 'thumbnail_small':
						vimeoErrorThumbSize = '120x90';
				}

				if (isVideo.youtube || isVideo.vimeo || isVideo.dailymotion) {
					if (isVideo.youtube) {
						if (settings.loadYoutubeThumbnail) {
							thumbImg = '//img.youtube.com/vi/' + isVideo.youtube[1] + '/' + settings.youtubeThumbSize + '.jpg';
						} else {
							thumbImg = thumb;
						}
					} else if (isVideo.vimeo) {
						if (settings.loadVimeoThumbnail) {
							thumbImg = '//i.vimeocdn.com/video/error_' + vimeoErrorThumbSize + '.jpg';
							vimeoId = isVideo.vimeo[1];
						} else {
							thumbImg = thumb;
						}
					} else if (isVideo.dailymotion) {
						if (settings.loadDailymotionThumbnail) {
							thumbImg = '//www.dailymotion.com/thumbnail/video/' + isVideo.dailymotion[1];
						} else {
							thumbImg = thumb;
						}
					}
				} else {
					thumbImg = thumb;
				}
	
				thumbList += '<div data-vimeo-id="' + vimeoId + '" class="thumb" style="width:' + settings.thumbWidth + 'px; height: ' + settings.thumbHeight + '; margin-right:' +thumbSpace+ 'px"><img src="'+thumbImg+'"></div>';	
				vimeoId = '';
				$thumb_inner.append(thumbList);
			},
			buildThumbnail: function() {
				if(settings.thumbnail===true && $children.length > 1){
					var $this = this;
					$gallery.append('<div class="thumb_cont"><div class="thumb_info"><span class="close ib"><i class="bUi-iCn-rMv-16" aria-hidden="true"></i></span></div><div class="thumb_inner"></div></div>');
					$thumb_cont = $gallery.find('.thumb_cont');
					$prev.after('<a class="cLthumb"></a>');
					$gallery.find('.cLthumb').bind('click touchend', function(){
						$thumb_cont.addClass('open');
						if($this.doCss() && settings.mode === 'slide'){
							$slide.eq(index).prevAll().removeClass('nextSlide').addClass('prevSlide');	
							$slide.eq(index).nextAll().removeClass('prevSlide').addClass('nextSlide');	
						}
					});
					$gallery.find('.close').bind('click touchend', function(){
						$thumb_cont.removeClass('open');		
					});
					var thumbInfo = $gallery.find('.thumb_info');
					var $thumb_inner = $gallery.find('.thumb_inner');
					var thumbList = '';
					var thumbImg;
					var thumbSpace = settings.thumbMargin - 7;
					if(settings.dynamic === true) {
						for(var i = 0; i<settings.dynamicEl.length; i++){
							thumbImg = settings.dynamicEl[i].thumb;
							thumbList += '<div class="thumb" style="margin-right:' +thumbSpace+ 'px"><img src="'+thumbImg+'"></div>';
						}	
					} else {
						$children.each(function(i) {
							if(settings.exThumbImage === false || typeof $(this).attr(settings.exThumbImage) === 'undefined' || $(this).attr(settings.exThumbImage) === null) {
								$this.getThumb($(this).attr('href') || $(this).attr('data-src'), $(this).find('img').attr('src'), i);
							} else {
								$this.getThumb($(this).attr('href') || $(this).attr('data-src'), $(this).attr(settings.exThumbImage), i);
							}
						});	
					}
					$thumb = $thumb_inner.find('.thumb');
					$thumb.bind('click touchend', function(){
						usingThumb = true;
						var index = $(this).index();
						$thumb.removeClass('active');
						$(this).addClass('active');
						$this.slide(index);
						clearInterval(interval);
					});	
					thumbInfo.prepend('<span class="ib count">All photos ('+$thumb.length+')</span>');
				}
				
			},
			slideTo : function(){
				var $this = this;
				if(settings.controls === true && $children.length > 1){
					$gallery.append('<div id="arpGallery-action"><a id="arpGallery-prev"></a><a id="arpGallery-next"></a></div>');
					$prev = $gallery.find('#arpGallery-prev');
					$next = $gallery.find('#arpGallery-next');	
					$prev.bind('click touchend', function(){
						$this.prevSlide();
						clearInterval(interval);
					});
					$next.bind('click touchend', function(){
						$this.nextSlide();
						clearInterval(interval);
					});
				}
			},
			autoStart: function(){
				var $this = this;
				if(settings.auto === true){
					interval = setInterval(function(){
						if(index+1 < $children.length){
							index = index;
						}
						else{
							index = -1;
						}
						index++;
						$this.slide(index);
					}, settings.pause);	
				}
			},
			keyPress : function(){
				var $this = this;
				$(window).bind('keyup', function(e){
					e.preventDefault();
					e.stopPropagation();
					if (e.keyCode === 37){
						$this.prevSlide();
						clearInterval(interval);
					}
					if (e.keyCode === 38 &&  settings.thumbnail===true){
						if(!$thumb_cont.hasClass('open')){
							if($this.doCss() && settings.mode === 'slide'){
								$slide.eq(index).prevAll().removeClass('nextSlide').addClass('prevSlide');	
								$slide.eq(index).nextAll().removeClass('prevSlide').addClass('nextSlide');
							}
							$thumb_cont.addClass('open');	
						}
					}
					else if (e.keyCode===39){
						$this.nextSlide();
						clearInterval(interval);
					}
					if (e.keyCode === 40 && settings.thumbnail===true){
						if($thumb_cont.hasClass('open')){
							$thumb_cont.removeClass('open');	
						}
					}
					else if (settings.escKey === true && e.keyCode === 27) {
						if(settings.thumbnail===true &&  $thumb_cont.hasClass('open') ){
							$thumb_cont.removeClass('open');
						}
						else{
								$this.destroy();
							}
					}
				});
			},
			nextSlide : function (){
				var $this = this;
				index = $slide.index($slide.eq(prevIndex));
				if(index+1 < $children.length){
					index++;
					$this.slide(index);
				}
				else{
					if(settings.loop){
						index = 0;
						$this.slide(index);
					}
					else if(settings.mode==='fade' && settings.thumbnail===true && $children.length > 1){ 
						$thumb_cont.addClass('open');
					}
				}
				settings.onSlideNext.call( this );
			},
			prevSlide : function (){
				var $this = this;
				index = $slide.index($slide.eq(prevIndex));
				if(index > 0){
					index--;
					$this.slide(index);
				}
				else{
					if(settings.loop){
						index = $children.length -1;
						$this.slide(index);
					}
					else if(settings.mode==='fade' && settings.thumbnail===true && $children.length > 1){ 
						$thumb_cont.addClass('open');
					}
				}
				settings.onSlidePrev.call( this );
			},
			slide : function (index){
				if(arpGalleryOn){
					if(!$slider.hasClass('on')){
						$slider.addClass('on');
					}
					if(this.doCss() && settings.speed !== ''){
						if(!$slider.hasClass('speed')){
							$slider.addClass('speed');
						}
						if(aSpeed === false){
							$slider.css('transition-duration',settings.speed+'ms');
							aSpeed = true;
						}
					}
					if(this.doCss() && settings.easing !== ''){
						if(!$slider.hasClass('timing')){
							$slider.addClass('timing');
						}
						if(aTiming === false){
							$slider.css('transition-timing-function',settings.easing);
							aTiming = true;
						}
					}
					settings.onSlideBefore.call( this );
				}
				if(settings.mode === 'slide'){
					if(this.doCss() && !$slider.hasClass('slide')){
						$slider.addClass('slide');
					}
/*					if(this.doCss()){
						$slider.css({ 'transform' : 'translate3d('+(-index*100)+'%, 0px, 0px)' });
					}*/
					if(!this.doCss() && !arpGalleryOn){
						$slider.css({ left : (-index*100)+'%' });
						//$slide.eq(index).css('transition','none');
					}
					else if(!this.doCss() && arpGalleryOn){
						$slider.animate({ left : (-index*100)+'%' },settings.speed,settings.easing);
					}
				}
				else if(settings.mode === 'fade'){
					if(this.doCss() && !$slider.hasClass('fadeM')){
						$slider.addClass('fadeM');	
					}else if(!this.doCss() && !$slider.hasClass('animate')){
							$slider.addClass('animate');	
						}
					if(!this.doCss() && !arpGalleryOn){
						$slide.fadeOut(100);
						$slide.eq(index).fadeIn(100);
					}else if(!this.doCss() && arpGalleryOn){
						$slide.eq(prevIndex).fadeOut(settings.speed,settings.easing);
						$slide.eq(index).fadeIn(settings.speed,settings.easing);		
					}
				}
				if(index+1 >= $children.length && settings.auto && settings.loop === false){
					clearInterval(interval);
				}
				$slide.eq(prevIndex).removeClass('current');
				$slide.eq(index).addClass('current');
				//if(this.doCss() && settings.mode === 'slide'){
					if(usingThumb === false){
						$('.prevSlide').removeClass('prevSlide');
						$('.nextSlide').removeClass('nextSlide');
						$slide.eq(index-1).addClass('prevSlide');
						$slide.eq(index+1).addClass('nextSlide');
					}else{
						$slide.eq(index).prevAll().removeClass('nextSlide').addClass('prevSlide');	
						$slide.eq(index).nextAll().removeClass('prevSlide').addClass('nextSlide');
					}
				//}
				if(settings.thumbnail===true && $children.length > 1){
					$thumb.removeClass('active');
					$thumb.eq(index).addClass('active');
				}
				
				if(settings.controls && settings.hideControlOnEnd && settings.loop === false){
					if(index === 0){
						$prev.addClass('disabled');
					}else if( index === $children.length - 1 ){
						$next.addClass('disabled');
					}
					else{
						$prev.add($next).removeClass('disabled');		
					}	
				}
				prevIndex = index;
				arpGalleryOn === false ? settings.onOpen.call(this) : settings.onSlideAfter.call(this);
				arpGalleryOn = true;
				usingThumb = false;

				if (settings.download === true) {
					var _src;
					if (settings.dynamic === true) {
						_src = settings.dynamicEl[index].downloadUrl !== false && (settings.dynamicEl[index].downloadUrl || settings.dynamicEl[index].src);
					} else {
						_src = $children.eq(index).attr('data-download-url') !== 'false' && ($children.eq(index).attr('data-download-url') || $children.eq(index).attr('href') || $children.eq(index).attr('data-src'));
					}	
					if (_src) {
						$gallery.find('#ag-download').attr('href', _src);
						$gallery.removeClass('ag-hide-download');
					} else {
						$gallery.addClass('ag-hide-download');
					}
				}
				if (settings.counter === true) {
					$('#arpGallery-counter-current').text(index + 1);
				}
			},
			destroy : function(){
				settings.onBeforeClose.call( this );
				arpGalleryOn = false;
				clearInterval(interval);
				$('.arpGallery').unbind('mousedown');
				$('.arpGallery').unbind('mouseup');
				$('body').removeClass('touch');
				$('body').unbind('touchstart');
				$('body').unbind('touchmove');
				$('body').unbind('touchend');
				$(window).unbind('resize');
				$(window).unbind('keyup');
				$gallery.addClass('fadeM');
				setTimeout(function(){
					$galleryCont.remove();
					$('body').removeClass('arpGallery');
				},500);
				// exit from fullscreen if activated
				this.exitFullscreen();
				$(document).off('fullscreenchange.arpGallery webkitfullscreenchange.arpGallery mozfullscreenchange.arpGallery MSFullscreenChange.arpGallery');
				settings.onCloseAfter.call( this );
 			}
		};
		arpGallery.init();
	};
}(jQuery));

(function($) {
	'use strict';
	var $filters = $('.arp_gallery_filter [data-filter]'),
	$boxes = $('.arp_gallery [data-category]');

	$filters.on('click', function(e) {
		e.preventDefault();
		var $this = $(this);

		$filters.removeClass('active');
		$this.addClass('active');

		var $filterColor = $this.attr('data-filter');

		if ($filterColor === 'all') {
			$boxes.removeClass('is-animated').fadeOut().promise().done(function() {
				$boxes.addClass('is-animated').fadeIn();
			});
		} else {
			$boxes.removeClass('is-animated').fadeOut().promise().done(function() {
				$boxes.filter('[data-category *= "' + $filterColor + '"]').addClass('is-animated').fadeIn();
			});
		}
	});
})(jQuery);
