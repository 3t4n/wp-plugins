(function($){
var AwsAnimation	=	function(options, element){
	
	this.options		=	options;
	this.element		=	element;
	this.elementSlides	=	element.find(options.slidesClassname);
	this.elementSlide	=	element.find(options.slideClassname);
	this.bgSlide		=	element.find(options.bgClassname);
	this.container		=	element.find(options.containerClassname);
	this.states			=	{
		currentSlide: 	0,
		nextSlide: 		true,
		isAnimating: 	false,
		isPaused: 		false,
		isAuto: 		true,
		totalSlides: 	this.elementSlides.length,
		scale: 1
	};
	
	if(this.options.isProgress)
		this.Progress	=	new AwsProgress(element.find('.progress'), {theme: options.progress_theme});
};

var AwsPreload	=	function(elements, options){
	
	this.options	=	$.extend({background: false, single: true, isReplace: true, complete: function(){}}, options);
	this.elements	=	elements;
	
	var _self	=	this;
	
	if(this.options.isReplace){
		
		$.when(this.loadReplace()).then(function(){
			
			_self.options.complete();
		});
		
	}else{
		
		$.when(this.loadAppend()).then(function(){
			
			_self.options.complete();
		});
		
	}
};

AwsPreload.prototype	=	{
	constructor: AwsPreload,
	load: function(){
		
		
		
	},
	loadAppend: function(){
		var defer	=	$.Deferred(),
			_self	=	this,
			index	=	0,
			total	=	this.elements.length;
		
		if(this.elements.length == 0) {
			
			defer.resolve();
			return defer.promise();
		}
		
		this.elements.each(function(index, value){
			
			if($(this).find('img').length == 0){
			
				var _self	=	$(this),
					image	=	$('<img alt="image"/>');
			
					_self.addClass('loading');
				
					image.attr('src', _self.data('src'));
			
					image.load(function(){
				
						_self.removeClass('loading');
						
						if(!_self.hasClass('box_item_bg'))
							_self.append(image);
						
						index++;
						
						if(index == total){
							
							defer.resolve();
						}
						
					});
			}else{
				
				index++;
				
				if(index == total){
					
					defer.resolve();
				}
			}
		});
		
		return defer.promise();
	},
	loadReplace: function(){
		
		var _self	=	this,
			index	=	0,
			total	=	this.elements.length;
		
		this.elements.each(function(index, value){
			
			var image	=	$(this),
				defer	=	$.Deferred();
			
				image.addClass('loading');
				
				image.load(function(){
					
					image.removeClass('loading');
					
					if(_self.options.single){
						
						defer.resolve();
						
					}else{
						
						if(index == total){
							
							defer.resolve();
						}
						
					}
						
				});
			
		});
		
		return defer.promise();
	}
};

var AwsData		=	{
	get: function(element, name, defaultValue, options){
		
		options	=	$.extend({unit: false, scale: false, belong: 'width'}, options);
		
		var data = element.data(name);
		
		if(typeof data == 'undefined')
			data = defaultValue;
		
		if(options.scale != false) {
			
			
			if(data > data * options.scale){
				data	=	data * options.scale;
			}
			
			
		}
		
		if(options.unit !== false)
			data = data + options.unit;
		
		return data;
	},
	getPadding: function(item, options){
		
		var data	=	this.get(item, 'padding', '0 0 0 0');
			
			data	=	data.split(' ');
			
		if(data.length > 0){
			
			var padding = '';
			
			$.each(data, function(index, pad){
				
				data[index] = (pad * options.scale) + options.unit;
				
			});
			
			return data.join(' ');
		}
	}
};

var AwsEffects	=	{
	
	addEffect: function(item, effect, data){
		
		var animation	=	data.join(' ');
		
		item.css(Modernizr.prefixed(effect), animation);
	},
	setAnimation: function(item, data){
		
		if(data.animation.indexOf('_js') > 0){
			
			this.setJsAnimation(item, data);
			
		}else{
		
			var data	=	$.extend({
				duration: '500ms',
				easing: 'linear',
				delay: '0s',
				iteration: 1,
				direction: 'normal',
				fillmode: 'forwards'
			
			}, data);
		
			if(data.easing == 'custom') data.easing = 'linear';
			
			var animation	=	[data.animation, data.duration, data.easing, data.delay, data.iteration, data.direction, data.fillmode].join(' ');
			
			item.css(Modernizr.prefixed('animation'), animation);
		}
	},
	setBgAnimation: function(item, data){
		
		if(data.animation.indexOf('_js') > 0){
			
			this.setJsAnimation(item, data);
			
		}else{
		
			var data	=	$.extend({
				duration: '500ms',
				easing: 'linear',
				delay: '0s',
				iteration: 1,
				direction: 'normal',
				fillmode: 'forwards'
			
			}, data);
		
			if(data.easing == 'custom') data.easing = 'linear';
			
			var effect	=	data.animation;
			
			if(data.state == 'in'){
				
				effect += 'In';
				
			}else{
				
				effect += 'Out';
			}
			
			var animation	=	[effect, data.duration, data.easing, data.delay, data.iteration, data.direction, data.fillmode].join(' ');
			
			item.css(Modernizr.prefixed('animation'), animation);
		}
	},
	setJsAnimation: function(item, data){
		
		var effect	=	data.animation;
		
		var width	=	item.width();
		var height	=	item.height();
		
		var initBlocks	=	function(cols, rows, initState){
			
			var total		=	cols*rows;
			var colWidth	=	Math.ceil(width/cols);
			var colHeight	=	Math.ceil(height/rows);
			var bgType		=	item.data('from');
			
			item.empty();
			item.css('opacity', 1);
			
			for(var r = 0; r < rows; r++){
			
				var top	=	r * colHeight;
			
				for(var c = 0; c < cols; c++){
				
					var left	=	c * colWidth;
				
					var block	=	$('<span/>');
				
					block.data('top', top);
					block.data('left', left);
					block.data('width', colWidth);
					block.data('height', colHeight);
				
					block.css({ 
						display: 'block',
						position: 'absolute',
						width: colWidth, 
						height: colHeight
					});
					
					
				
					var backLeft	=	-1*left;
					var backTop		=	-1*top;
					
					if(bgType == 'image')
						block.css('background-image', 'url('+item.data('src')+')');
					
					block.css('background-color', item.data('color'));
					
					block.css('background-position', backLeft+'px '+backTop+'px');
				
					item.append(block);
				}
			}
			
			
			item.css('background', 'none');
			
			if(typeof initState != 'undefined'){
				
				initState(item.children('span'));
				
				
			}
		}
		
		var getRandomInt	=	function(min, max) {
  		  		return Math.floor(Math.random() * (max - min)) + min;
			}
			
		var bg_blocks_1_js	=	{
			
			effectIn: function(){
				
				initBlocks(1, 30, function(items){
					
					var even	=	items.filter(':even');
					var odd		=	items.filter(':odd');
					
					even.each(function(){
						
						$(this).css({ top: $(this).data('top'), left:-1*(2000 + Math.ceil($(this).data('left'))) });
					});
					
					odd.each(function(){
						
						$(this).css({ top: $(this).data('top'), left:(2000 + Math.ceil($(this).data('left'))) });
					});
					
					return ;
				});
				
				this._effectIn(0);
				
			},
			_effectIn: function(i){
				
				var efBlocks	=	item.children('span');
				
				if(i >= efBlocks.length) return;
				
				var _self	=	this;
				
				var even	=	efBlocks.filter(':even');
				var odd		=	efBlocks.filter(':odd');
				
				even.each(function(index){
					
					$(this).animate({left: $(this).data('left')}, 1500);
				});
				
				odd.each(function(index){
					
					$(this).animate({left: $(this).data('left')}, 1500);
				});
				
				setTimeout(function(){
					
					item.css('opacity', 1);
				}, 1500);
			},
			effectOut: function(){
				
				var efBlocks	=	item.children('span');
								
				var _self	=	this;
				
				var even	=	efBlocks.filter(':even');
				var odd		=	efBlocks.filter(':odd');
				
				even.each(function(index){
					
					$(this).animate({left:-1*(2000 + Math.ceil($(this).data('left')))}, 1000);
				});
				
				odd.each(function(index){
					
					$(this).animate({left:(2000 + Math.ceil($(this).data('left')))}, 1000);
				});
				
				setTimeout(function(){
					
					item.css('opacity', 0);
				}, 1000);
			}
		}
		
		var bg_blocks_2_js	=	{
			
			effectIn: function(){
				
				initBlocks(30, 1, function(items){
					
					var even	=	items.filter(':even');
					var odd		=	items.filter(':odd');
					
					even.each(function(){
						
						$(this).css({ left: $(this).data('left'), top:-1*(2000 + Math.ceil($(this).data('top'))) });
					});
					
					odd.each(function(){
						
						$(this).css({ left: $(this).data('left'), top:(2000 + Math.ceil($(this).data('top'))) });
					});
					
					return ;
				});
				
				this._effectIn(0);
				
			},
			_effectIn: function(i){
				
				var efBlocks	=	item.children('span');
				
				if(i >= efBlocks.length) return;
				
				var _self	=	this;
				
				var even	=	efBlocks.filter(':even');
				var odd		=	efBlocks.filter(':odd');
				
				even.each(function(index){
					
					$(this).animate({top: $(this).data('top')}, 1500);
				});
				
				odd.each(function(index){
					
					$(this).animate({top: $(this).data('top')}, 1500);
				});
			},
			effectOut: function(){
				
				var efBlocks	=	item.children('span');
								
				var _self	=	this;
				
				var even	=	efBlocks.filter(':even');
				var odd		=	efBlocks.filter(':odd');
				
				even.each(function(index){
					
					$(this).animate({top:-1*(2000 + Math.ceil($(this).data('top')))}, 1000);
				});
				
				odd.each(function(index){
					
					$(this).animate({top:(2000 + Math.ceil($(this).data('top')))}, 1000);
				});
				
				setTimeout(function(){
					
					item.css('opacity', 0);
				}, 2000);
			}
		}
		
		switch(effect){
		case 'bg_blocks_1_js':
			
			if(data.state == 'in'){
		
				bg_blocks_1_js.effectIn();
			
			}else{
			
				bg_blocks_1_js.effectOut();
			}
			
			break;
		case 'bg_blocks_2_js':
			
			if(data.state == 'in'){
		
				bg_blocks_2_js.effectIn();
			
			}else{
			
				bg_blocks_2_js.effectOut();
			}
			
			break;
		}
		
	},
	setPadding: function(item, data, options){
		
		
		
	},
	setStyleText: function(item, data){
		
		var data	=	data.join(' ');
		
		
	}
};

var AwsProgress	=	function(element, options){
	
	var theme		=	options.theme || 'bars';
	
	this.element	=	element;
	this.options	=	options;
	this.theme		=	this.themes[theme];
	
	this.theme.init.call(this);
};

AwsProgress.prototype	=	{
	constructor: AwsProgress,
	themes: {},
	eventStart: function(){},
	eventStop: function(){},
	states: {
		isProgress: false
	},
	start: function(data){
		
		this.theme.start.call(this, data);
	},
	stop: function(){
		
		this.theme.stop.call(this);
	}
};

AwsProgress.prototype.themes.bars	=	{
	
	init: function(){
		
		this._s				=	this;
		this.percent		=	0;
		this.percentElement	=	$('<div class="percent"></div>');
		
		this.element.addClass('bars');
		this.element.append(this.percentElement);
	},
	setPercent: function(element, percent){
		
		if(Modernizr.cssanimations){
			
			AwsEffects.setAnimation(element.find('.percent'), {animation: 'awsprogress_bar_in', duration: (this.duration - 500)+'ms'});
			
		}else{
		
			var widthContainer	=	element.width();

			var v1	=	(this.stepTime * 100)/this.duration;

			var widthPercent	=	((widthContainer * v1)/100) * percent;

			element.find('.percent').width(widthPercent);
		}
	},
	resetPercent: function(element){
		
		if(Modernizr.cssanimations){
			
			AwsEffects.setAnimation(element.find('.percent'), {animation: 'awsprogress_bar_out', duration: '500ms'});
			
		}else{
			
			element.find('.percent').width(0);
		}
	},
	start: function( data ){
		
		var _s	=	this;
		
		var percent		=	1;
		
		this.theme.stepTime	=	100;
		
		this.theme.duration	=	data.duration;
		
		this.theme.setPercent(this.element, percent);
		
		var interval = setInterval(function(){
			
			percent++;
			
			_s.theme.setPercent(_s.element, percent);
			
		}, this.theme.stepTime);
		
		setTimeout(function(){
			
			clearInterval(interval);
			
			
			
		}, this.theme.duration);
	},
	stop: function(){
		
		this.theme.resetPercent(this.element);
	}
};

AwsAnimation.prototype	=	{
	constructor: 	AwsAnimation,
	Data: AwsData,
	Effect: AwsEffects,
	Video: {},
	method: 		function(nam, fn){
		
		this.prototype[name] = fn;
	},
	isPause: false,
	getBackground: 	function(index){
		
		var element = this.elementSlides.eq(index).find(this.options.bgClassname);
		
		return {
			element: 	element,
			effectIn: 	element.data('effectin'),
			effectOut: 	element.data('effectout'),
			from: 		element.data('from'),
			src: 		element.data('src'),
			color: 		element.data('color'),
			easing: 	this.Data.get(element, 'easing', 'linear')
		}
	},
	slideIn: 		function(index){
		
		if(index < 0) index = 0;
		
		var _self			=	this,
			dfd 			=	new jQuery.Deferred(),
			durationSlide	=	this.elementSlides.eq(index).data('duration'),
			items			=	this.getItems(index);
		
		this.element.trigger('slide_index', index);
		
		if(items.length > 0){			
			items.each(function(){
				
				var item		=	jQuery(this);

				_self.Effect.setAnimation(item, {
					animation: _self.Data.get(item, 'effect', 'awsfadeIn'),
					duration: _self.Data.get(item, 'duration', '0s', {unit: 'ms'}),
					easing: _self.Data.get(item, 'easing', 'linear'),
					delay: _self.Data.get(item, 'delay', '0s', {unit: 'ms'}),
					iteration: _self.Data.get(item, 'iteration', 1),
					direction: _self.Data.get(item, 'direction', 'normal'),
					fillmode: _self.Data.get(item, 'fillmode', 'forwards')
				});
				
				if(item.data('kind') == 'video' && item.data('auto') != 0)
					_self.Video.play(item.data('playerid'));
				
			});
			
		}else{
			dfd.resolve();
			return dfd.promise();
		}
		
		var timeout = setTimeout(function(){
			
						
			dfd.resolve();
			
		}, durationSlide);
		
		if(this.states.isPaused){
			
			clearTimeout(timeout);
			
			dfd.resolve();
		}
	
		return dfd.promise();
	
	},
	slideOut: 		function(index){
				
		var _self		=	this,
			dfd 		=	new jQuery.Deferred();
		
		if(index < 0 || typeof index == 'undefined') {
			
			dfd.resolve();
			return dfd.promise();
		}
		
		var duration	=	this.getDuration(index),
			items		=	this.getItems(index);
		
			if(items.length > 0){
				items.each(function(){

					var item		=	jQuery(this),
						delay		=	((_self.Data.get(item, 'delay', '0')*30)/100)+'ms';
						
						_self.Effect.setAnimation(item, {
							animation: _self.Data.get(item, 'effectout', 'awsfadeOut'),
							duration: _self.Data.get(item, 'duration', 500, {unit: 'ms'}),
							easing: _self.Data.get(item, 'easing', 'linear'),
							delay: delay,
							fillmode: _self.Data.get(item, 'fillmode', 'both')
						});
						
						if(item.data('kind') == 'video')
							_self.Video.stop(item.data('playerid'));
						
				});
			}
		
		var timeout = setTimeout(function(){
		
			dfd.resolve();
		}, duration);
		
		if(this.states.isPaused){
			
			clearTimeout(timeout);
			
			dfd.resolve();
			
		}
	
		return dfd.promise();
		
	},
	slides: 	function(from, to){
		
		var _self		=	this,
			slideFrom	=	this.elementSlides.eq(from),
			slideTo		=	this.elementSlides.eq(to);
		
		this.states.isAnimating = true;
		
		_self.options.eventStart.call(this);
		
		new AwsPreload(slideTo.find('.box_item_image'), {isReplace: false, complete: function(){
		
		$.when(_self.slideOut(from)).then(function(){
			
			if(_self.options.isAuto && _self.options.isProgress)
				_self.Progress.start({duration: slideTo.data('duration')});
			
			$.when(_self.slideBackground(from, to)).then(function(){
				
				$.when(_self.slideIn(to)).then(function(){
					
					if(_self.options.isAuto && _self.options.isProgress)
						_self.Progress.stop();
					
					_self.states.isAnimating = false;
					
					_self.resetIndex(from, to);
					
				});
			});
		});
		
	}});
		
	},
	slidesBreak: function(from, to){
		
		if(this.states.isAnimating) return;
		
		this.isPaused	=	true;
		this.states.isAnimating = true;
		
		var _self		=	this,
			slideFrom	=	this.elementSlides.eq(from),
			slideTo		=	this.elementSlides.eq(to);
		
		this.elementSlides.removeClass('active');
		slideTo.addClass('active');
				
		this.states.currentSlide = to;
		
		new AwsPreload(slideTo.find('.box_item_image'), {isReplace: false, complete: function(){
			
			$.when(_self.slideOut(from)).then(function(){
			
				$.when(_self.slideBackground(from, to)).then(function(){
				
					_self.states.isAnimating = false;
				
					_self.slideIn(to);
				});
		
			});
	
		}});
	},
	resetIndex: function(from, to){
		
		var slideFrom	=	this.elementSlides.eq(from),
			slideTo		=	this.elementSlides.eq(to);
			
			this.states.currentSlide = to;	
	
			slideFrom.removeClass('active');
			slideTo.addClass('active');
			
			if(this.options.isAuto == true && !this.isPaused){
				
				var index	=	this.getNextIndex();
				
				this.slides(index[0], index[1]);
				
			}
			
			this.options.eventComplete.call(this);
		
	}, 
	getNextIndex: 	function(){
		
		var from	=	0,
			to		=	1;
	
		if(this.states.currentSlide == (this.states.totalSlides - 1)){
		
			from	=	this.states.totalSlides - 1;
			to		=	0;
		
		}else{
		
			from	=	this.states.currentSlide;
			to		=	from + 1;
		
		}
		
		return [from, to];
	},
	getPrevIndex: function(){
		
		var from	=	0,
			to		=	1;

		if(this.states.currentSlide == 0){
		
			from	=	0;
			to		=	this.states.totalSlides - 1;
		
		}else{
	
			from	=	this.states.currentSlide;
			to		=	from - 1;
			
		}
		
		return [from, to];
	},
	nextSlides: function(){
		
		this.options.isAuto		=	false;
		
		if(this.states.isAnimating){
			
			return false;
		}
		
		this.states.nextSlide = true;
		
		var _self	=	this;
		
		var index	=	this.getNextIndex(),
			from	=	index[0],
			to		=	index[1];
		
		this.slidesBreak(from, to);
			
	},
	prevSlides: 	function(){
		
		this.options.isAuto		=	false;
		
		if(this.states.isAnimating) return;
		
		this.states.nextSlide = false;
		
		var index	=	this.getPrevIndex(),
			from	=	index[0],
			to		=	index[1];
	
		this.slidesBreak(from, to);
	},
	indexSlides: function(){
		
		
	},
	getItems: 		function(index){
		
		return this.elementSlides.eq(index).find(this.options.slideClassname);
	},
	getDuration: 		function(index){
		
		return 500;
	},
	getDurationSlide: 	function(){
		
		return 2000;
	},
	setScale: function(){
		
		var _self	=	this,
			width	=	this.Data.get(this.element, 'width'),
			height	=	this.Data.get(this.element, 'height');
		
		var widthContainer		=	this.element.find('.box_container').width();
		var heightBoxContainer	=	this.element.find('.box_container').height();
				
		if(this.options.isResponsive == 1){
			
			if(this.options.customScale) {
				
				
				$.each(this.options.customScale, function(index, media){
					
					if(Modernizr.mq(media.name)){

						_self.states.scale	=	media.value;
						
					}
					
				});
				
			}else{
				
				var windowHeight	=	$(window).height();
				var windowWidth		=	$(window).width();
				
				heightContainer	=	windowHeight;
				widthContainer	=	windowWidth;
				
				this.states.scale		=	1;
				
				this.states.scaleWidth 	= 1;
				this.states.scaleHeight = 1;
				
				if(width <= windowWidth){
					widthContainer	=	width;
					
				}else{
					
					this.states.scale 		= windowWidth/width;
					
					this.states.scaleHeight = this.states.scale;
				}
			
				if(height <= windowHeight){
					heightContainer	=	height;
					
				}else{
					
					this.states.scale 		= windowHeight/height;
					
					this.states.scaleWidth 	= this.states.scale;
				}
				
				
				if(width > windowWidth && height > windowHeight){
					this.states.scale 		= windowWidth/width;
					
					this.states.scaleHeight = windowHeight/height;
					this.states.scaleWidth 	= windowWidth/width;
					
				}
					
					var wboxContainer	=	widthContainer * this.states.scale,
						hboxContainer	=	heightContainer * this.states.scale;
					
				if(windowWidth < windowHeight && (width > windowWidth && height > windowHeight)){
					
					this.element.find('.box_container').css({width: windowWidth, height: hboxContainer});
					
				}
				
				if(windowWidth > windowHeight && (width > windowWidth && height > windowHeight)){
				
					this.element.find('.box_container').css({width: windowWidth, height: wboxContainer});
					
				}
				
				if(width <= windowWidth && height <= windowHeight){
					
					this.element.find('.box_container').css({width: wboxContainer, height: hboxContainer});
					
				}else{
					
					if(width < windowWidth && (width < windowWidth || height < windowHeight))
						this.element.find('.box_container').css({width: wboxContainer, height: hboxContainer});
					
					if(width > windowWidth && (width < windowWidth || height < windowHeight))
						this.element.find('.box_container').css({width: windowWidth, height: hboxContainer});
						
				}
				
				if(this.options.isfullwindow == 1 || (width > windowWidth && height > windowHeight)){
				
					this.element.css('width', windowWidth);
					this.element.css('height', windowHeight);
					
				}else{
					
					if(this.options.isFullwidth == 0)
						this.element.css('width', widthContainer);
					
					
					this.element.css('height', heightContainer);
					
				}
			}
							
		}else{
						
			this.element.css({'height': this.Data.get(this.element, 'height', {unit:'px'}), 'width': this.Data.get(this.element, 'width', {unit:'px'})});
		}
		
	},
	init: function(){
		
		var _self	=	this;
		
		this.reset();
		this.navigation();
		this.slides(-1, 0);
		
		$(window).resize(function(){
			
			_self.reset();
			
		});
	},
	start: function(){
		
		var _self	=	this;
		
		if(this.options.preload){
			
			new AwsPreload(this.element.find('.box_item_image'), {isReplace: false, complete: function(){
				
				_self.init();
			}});
			
		}else{
			
			this.init();
		}
		
	},
	pause: function(){
		
		
	},
	reset: 			function(){
		
		var _s	=	this;
		
		var sourceVideo	=	[];
		
		this.setScale();
		
		this.bgSlide.each(function(){
			
			var item	=	$(this);
			
			item.css({top: 0, left: 0});
			
			if(item.data('from') == 'color')
				item.css({'background-color': _s.Data.get(item, 'color', '#FFF')});
			
			if(item.data('from') == 'image'){
				
				item.css('background-image', "url('"+_s.Data.get(item, 'src', 'none')+"')");
				
			}
			
			if(item.data('from') == 'video'){
				
				sourceVideo.push({name: item.data('kind'), video: item.data('src'), element: item});
			}
		});
		
		this.elementSlide.each(function(){
			
			var item	=	$(this),
				kind	=	_s.Data.get(item, 'kind', 'image');
			
			item.css({
				'top': _s.Data.get(item, 'top', 0, {unit:'px', scale: _s.states.scale, belong: 'height'}), 
				'left': _s.Data.get(item, 'left', 0, {unit:'px', scale: _s.states.scale}), 
				'z-index': _s.Data.get(item, 'zindex', 0)
			});
			
			if(kind == 'image'){
				
				item.find('img').attr('alt', _s.Data.get(item, 'alt', 'alt slide'));
				
				item.css({
					'width': _s.Data.get(item, 'width', 100, {unit:'px', scale: _s.states.scale}),
					'height': _s.Data.get(item, 'height', 100, {unit:'px', scale: _s.states.scale})
				});
				
				
			}
			
			if(kind == 'text'){
				
				item.css({
					'font-family': "'"+_s.Data.get(item, 'fontname', 'arial')+"'",
					'font-size': _s.Data.get(item, 'fontsize', '12', {unit:'px', scale: _s.states.scale}),
					'font-weight': _s.Data.get(item, 'fontweight', 'normal'),
					'color': _s.Data.get(item, 'color', '#000'),
					'background': _s.Data.get(item, 'bgcolor', 'transparent'),
					'padding': _s.Data.getPadding( item, {unit:'px', scale: _s.states.scale})
				});
			}
			
			if(kind == 'video'){
				
				item.css({ 
					'width': _s.Data.get(item, 'width', 100, {unit:'px', scale: _s.states.scale}),
					'height': _s.Data.get(item, 'height', 100, {unit:'px', scale: _s.states.scale}) 
				});
				
				sourceVideo.push({
					name: _s.Data.get(item, 'from', 'youtube'), 
					video: item.data('src'), 
					element: item,
					auto: _s.Data.get(item, 'auto', 'false')
				});
			}
			
		});
		
		if(sourceVideo.length > 0){
			
			this.Video	=	new AwsVideo({players: sourceVideo});
		}
	},
	pagination: function(){
		
		var _s		=	this,
			pagi	=	this.element.find('.pagination');
			
			pagi.addClass('style-2');
			
			pagi.append($('<div/>'));
		
		$.each(this.elementSlides, function(index, slide){
			
			pagi.find('div').append($('<a class="index" href="#" data-index="'+index+'">'+(index+1)+'</a>'));
			
		});
		
		pagi.find('.index').click(function(e){
			
			e.preventDefault();
			
			var from	= _s.states.currentSlide, 
				to		= $(this).data('index');
			
			if(_s.states.isAnimating) return;

			if(from == to) return;
			
			if(to > from){
				_s.states.nextSlide = true;
			}else{
				_s.states.nextSlide = false;
			}
			
			_s.options.isAuto		=	false;
			
			pagi.find('.index').removeClass('active');
			$(this).addClass('active');
			
			_s.slidesBreak(from, to);
				
		});
		
		this.element.on('slide_index', function(event, index){
			
			var g	=	pagi.find('div').children('a');
			
			g.removeClass('active');
			g.eq(index).addClass('active');
		});
		
	},
	navigation: 	function(){
		
		var _self	=	this;
		
		if(this.options.pagination)
			this.pagination();
		
		this.element.find('.nextSlide').click(function(e){
			
			_self.nextSlides();
			
			e.preventDefault();
		});
		
		this.element.find('.prevSlide').click(function(e){
			
			
			_self.prevSlides();
			
			e.preventDefault();
		});
		
		if(typeof this.element.swipe == 'function')
		this.element.swipe( {
			
			swipe:function(event, direction, distance, duration, fingerCount, fingerData) {
			  
				if(direction == 'left'){
					
					_self.nextSlides();
					
				}else{
					
					_self.prevSlides();
				}
			}
		});
	}
};

AwsAnimation.decorators = {};

AwsAnimation.prototype.decorate = function (decorator) {
	var F = function () {}, overrides = this.constructor.decorators[decorator], i, newobj;
	F.prototype = this;
	newobj = new F(); 
	newobj.uber = F.prototype; 
	for (i in overrides) {
		if (overrides.hasOwnProperty(i)) {
			newobj[i] = overrides[i]; 
		}
	}

	return newobj;
};

AwsAnimation.decorators.fade	=	{
	
	slideBackground: 	function(from, to){
		
		var dfd 		=	new jQuery.Deferred(),
			duration	=	500;
			
		var toBg	=	this.getBackground(to);
		
		if(from >= 0){
			var fromBg	=	this.getBackground(from);
			
			if(typeof fromBg.effectOut != 'undefined'){

				this.Effect.setBgAnimation(fromBg.element, {
					animation: fromBg.effectIn,
					easing: 	toBg.easing,
					state: 'out'
				});
			}
		}
		
		if(typeof toBg.effectIn != 'undefined'){
			
			this.Effect.setBgAnimation(toBg.element, {
				animation: 	toBg.effectIn,
				easing: 	toBg.easing,
				state: 'in'
			});
		}
		
		setTimeout(function(){
		
			dfd.resolve();
		
		}, duration);
	
		return dfd.promise();
	}
};

AwsAnimation.decorators.horizontal	=	{
	
	slideBackground: 	function(from, to){
		
		var dfd 		=	new jQuery.Deferred(),
			duration	=	1100;
		
		var toBg	=	this.getBackground(to);
		
		var easing	=	'cubic-bezier(.63,.36,.02,.96)';
		
		var animation_next_from	=	{
				animation: 'awsnext_h_from',
				duration: '1s',
				easing: easing},
			
			animation_next_to	=	{
				animation: 'awsnext_h_to',
				duration: '1s',
				easing: easing},
				
			animation_prev_from	=	{
				animation: 'awsprev_h_from',
				duration: '1s',
				easing: easing},
				
			animation_prev_to	=	{
				animation: 'awsprev_h_to',
				duration: '1s',
				easing: easing};
		
		if(from >= 0){
			var fromBg	=	this.getBackground(from);
			
			if(this.states.nextSlide){
				
				this.Effect.setAnimation(fromBg.element, { animation: fromBg.effectIn+'next_h_from', duration: '1s', easing: easing });
								
			}else{
				
				this.Effect.setAnimation(fromBg.element, { animation: fromBg.effectIn+'prev_h_from', duration: '1s', easing: easing });
				
			}
		}
		
		if(this.states.nextSlide){
			
			this.Effect.setAnimation(toBg.element, { animation: toBg.effectIn+'next_h_to', duration: '1s', easing: easing });
			
			
		}else{
			
			this.Effect.setAnimation(toBg.element, { animation: toBg.effectIn+'next_h_to', duration: '1s', easing: easing });
			
			
		}
		
		setTimeout(function(){
		
			dfd.resolve();
		
		}, duration);
	
		return dfd.promise();
	}
	
};

AwsAnimation.decorators.vertical	=	{
	
	slideBackground: 	function(from, to){
		
		var _s			=	this,
			dfd 		=	new jQuery.Deferred(),
			duration	=	1100;
		
		var toBg	=	this.getBackground(to);
		
		var easing	=	'cubic-bezier(0.230, 1.000, 0.320, 1.000)';
		
		var animation_next_from	=	{
				animation: 'awsnext_v_from',
				duration: '1s',
				easing: easing},
			
			animation_next_to	=	{
				animation: 'awsnext_v_to',
				duration: '1s',
				easing: easing},
				
			animation_prev_from	=	{
				animation: 'awsprev_v_from',
				duration: '1s',
				easing: easing},
				
			animation_prev_to	=	{
				animation: 'awsprev_v_to',
				duration: '1s',
				easing: easing};
		
		if(from >= 0){
			var fromBg	=	this.getBackground(from);
			
			if(this.states.nextSlide){
				
				this.Effect.setAnimation(fromBg.element, animation_next_from);
							
			}else{
				
				this.Effect.setAnimation(fromBg.element, animation_prev_from);
				
			}
		}
		
		if(this.states.nextSlide){
			
			
			this.Effect.setAnimation(toBg.element, animation_next_to);
					
		}else{
			
			this.Effect.setAnimation(toBg.element, animation_prev_to);
					
		}
		
		setTimeout(function(){
			
			dfd.resolve();
			
		}, duration);
	
		return dfd.promise();
	}
};

jQuery.fn.awslideshow	=	function(options){
	
	return this.each(function(){
		
		var settings = jQuery.extend( {
			type: 'fade',
			containerClassname: '.box_container',
			slidesClassname: 	'.box_items',
			slideClassname: 	'.box_item',
			bgClassname: 		'.box_item_bg',
			responsive: true,
			isfullwindow: false,
			customScale: false,
			preload: true,
			width:'100%',
			height:450,
			eventStart: function(){},
			eventComplete: function(){},
			timeslide:4000,
			isAuto:false,
			isProgress: 0,
			isFullwidth: 1,
			isResponsive: 1,
			viewport:1,
			effect:'fade',
			direction:'horizontal',
			navigation: true,
			pagination: false,
			nextprev:false,
			duration:2000,
			enableTouch:true,
			thumbNavi: false,
			customScale: false
		}, options),
		self	=	jQuery(this),
		wHeight	=	self.data('height'),
		wWidth	=	self.data('width');
		
		var awslideshow = {
			animationDecorate: {},
			init: 	function(){
				
				this.navigate();
				
				this.loadGoogleFont(self.data('fontgoogle'));
				
				var animation	=	new AwsAnimation(settings, self);
				
				this.animationDecorate = animation.decorate(settings.type);
				
				this.animationDecorate.start();

			},
			loadGoogleFont: function(src){
			
				if(typeof src == 'undefined') return;
			
				var fonts	=	src.split('|');
			
				WebFont.load({
				    google: {
				      families: fonts
				    }
				});
			
			},
			navigate: function(){
				
				if(settings.isProgress == 1 && settings.isAuto == 1){
					
					self.append($('<div class="progress"></div>'));
				}
				
				if(settings.ispagination == 1){
					
					self.append($('<div class="pagination"></div>'));
				}
			},
			
		};
		
		awslideshow.init();
		
		
	});
};

$('document').ready(function(){
	
	$('.aws_slideshow_wrap').each(function(){
		
		$(this).awslideshow({
			type: $(this).data('direction'),
			responsive: $(this).data('isresponsive'),
			isfullwindow: $(this).data('isfullwindow'),
			isnavigation: $(this).data('isnavigation'),
			ispagination: $(this).data('ispagination'),
			isProgress: $(this).data('isprogress'),
			isFullwidth: $(this).data('isfullwidth'),
			progress_theme: 'bars',
			isAuto: $(this).data('isauto'),
			isPhone: $(this).data('isphone'),
			pagination: $(this).data('ispagination'),
			preload: false
		});
	});
	
	
});

})(jQuery);



var AwsVideo	=	(function(){
	
	var source	= {};
	
	// Private method
	this.privateMethod	=	function(){
		
	}
	
	return function( options ){
		
		this.players	=	options.players;
		
		// Public method
		this.setup = function(){
			
			this.setDefaultSource();
			
			for(var i in source){
				
				source[i].init.call(this);
			}
		}
		
		this.setSource	=	function( newSource ){
			
			source[newSource.name]	=	newSource.value;
		}
		
		this.getSource	=	function(name){
			
			return source[name];
		}
		
		this.setup();
	};
	
})();

AwsVideo.prototype	=	{
	Sources: [],
	getPlayer: function(name){
		
		for(var i in this.players){
			
			if(this.players[i].playerID == name)
				return this.players[i];
		}
	},
	play: function(name){
		
		var player	=	this.getPlayer(name);
		
		if(typeof player != 'undefined')
				player.play();
		
	},
	stop: function(name){
		
		var player	=	this.getPlayer(name);
		
		if(typeof player != 'undefined')
				player.stop();
	},
	setDefaultSource: function(){
		
		for(var i in this.Sources){
			
			this.setSource( this.Sources[i] );
		}
	}
};

// Youtube
AwsVideo.prototype.Sources.push({
	name: 'youtube',
	value: {		
		init: function(){
			
			var _self	=	this;
			var players	=	this.players;
			
			var tag = document.createElement('script');
			var firstScriptTag = document.getElementsByTagName('script')[0];
		
				tag.src = "https://www.youtube.com/iframe_api";
				firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
				
				
				jQuery(document).on('onYouTubeIframeAPIReady', function(){
					
					jQuery.each(players, function(index, player){
						
						if(player.name == 'youtube'){
							
							var element		=	player.element,
								playerID	=	'youtube_'+index;
							
							element.html(jQuery('<div id="'+playerID+'"/>'));
							element.data('playerid', playerID);
							
							players[index].playerID	=	playerID;
							
							players[index].player	=	new YT.Player(playerID, {
								height: '100%',
								width: '100%',
								videoId: player.video,
								events: {
									'onReady': onPlayerReady,
									'onStateChange': onPlayerStateChange
								}
							});
							
							players[index].play	=	function(){
								
								if(typeof this.player.playVideo != 'undefined')
									this.player.playVideo();
							}
							
							players[index].stop	=	function(){
								
								console.log('stop video');
								this.player.stopVideo();
							}
							
						}
						
					});

				});
				
				jQuery(document).on('onPlayerReady', function(){
				
					jQuery.each(players, function(index, player){
						
						if(player.name == 'youtube' && player.auto){
							players[index].player.playVideo();
						}
					});
					
				});
			
		}
	}
});

// Vimeo
AwsVideo.prototype.Sources.push({
	name: 'vimeo',
	value: {

		init: function(){
			
			var players	=	this.players;
			var tag = document.createElement('script');
			var firstScriptTag = document.getElementsByTagName('script')[0];

				tag.src = "//f.vimeocdn.com/js/froogaloop2.min.js";
				firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
				
				
				jQuery.each(players, function(index, player){
					
					if(player.name == 'vimeo'){
						
						var iframe		=	jQuery('<iframe/>'),
							element		=	player.element,
							playerID	=	'vimeo_'+index;
							
							iframe.attr('src', '//player.vimeo.com/video/'+player.video+'?api=1&player_id='+playerID);
							iframe.attr('width', element.width()).attr('height', element.height()).attr('frameborder', 0);
							iframe.attr('id', playerID);
							
							element.html(iframe);
							element.data('playerid', playerID);
							
							
							iframe.load(function(){
								
								players[index].playerID	=	playerID;
								
								players[index].player	=	$f(iframe[0]);
								
								players[index].play	=	function(){
									
									this.player.api('play');
								}
								
								players[index].stop	=	function(){
									
									this.player.api('pause');
								}
								
								if(player.auto)
									players[index].player.api('play');
								
							});
					}
					
				});

		}

	}
});

// Hosting
AwsVideo.prototype.Sources.push({
	name: 'hosting',
	value: {
		init: function(){
			var players	=	this.players;
			var tag = document.createElement('script');
			var firstScriptTag = document.getElementsByTagName('script')[0];
			
				tag.src = awsslideshow_object.plugin_url+"js/jquery_awsslideshow/videojs/video.js";
				firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
				
				jQuery(tag).load(function(){
					jQuery.each(players, function(index, player){
					
						if(player.name == 'hosting'){
							
							var options	=	$.extend({width: 630, height: 354, auto: false, preload: 'auto'}, player);
							var video	=	$('<video class="video-js vjs-default-skin vjs-big-play-centered" controls/>');
							var element	=	$('#'+player.playerId);
							
							
							jQuery.each(player.video, function(index, data){
								
								var source	=	$('<source />');
								
								source.attr('src', data.src);
								source.attr('type', data.type);
								
								video.append(source);
							});
							
							video.attr('id', 'vjs_'+player.playerId);
							video.attr('width', options.width);
							video.attr('height', options.height);
							video.attr('preload', options.auto);
							
							
						
							element.html(video);
						
							videojs('vjs_'+player.playerId, {}, function(){
								
								var videojsPlayer	=	this;
								
								if(player.auto)
									this.play();
								
								players[index].play	=	function(){
									
									videojsPlayer.play();
								}
								
								players[index].stop	=	function(){
									
									videojsPlayer.pause();
								}
								
							});
						}
					});
				});	
				
				
		}
	}
});
		
function onYouTubeIframeAPIReady() {
	
	jQuery(document).trigger(jQuery.Event('onYouTubeIframeAPIReady'));
}

function onPlayerReady(event) {
  
  jQuery(document).trigger(jQuery.Event('onPlayerReady'));
}

function onPlayerStateChange(event) {
	
}

function stopVideo() {

}