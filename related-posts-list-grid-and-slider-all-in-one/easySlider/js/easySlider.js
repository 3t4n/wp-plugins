(function($){
	var defaults = {
		autoPlay: false,
		autoPlayInterval: 4000,
		autoPlayReverse: false,
		effect: 'fade',
		speed: 'slow',
		showButtonBar: false
	};
	var options;
	var currentImage = 1;
	var obj;
	
	$.fn.easySlider = function(params){				
		options = $.extend({}, defaults, options, params);
		obj = this;
		//wrap all content
		$(this).wrap('<div class="slider-wrapper" />');
		var wrapper = $(this).parent();		
		//init slider
		$(this).addClass('slider-ul');				
		$(this).children().hide();
		$(this).find('li:first').show();
		
		//left-right buttons
		$(obj).before('<div class="div-left"></div>');	
		$(obj).parent().find('.div-left').html('<a href="#" id="btnLeft">tuda</a>');
		var btnLeft = $(obj).parent().find('.div-left').find('#btnLeft');		
		
		$(obj).after('<div class="div-right"></div>');		
		$(obj).parent().find('.div-right').html('<a href="#" id="btnRight">suda</a>');
		var btnRight = $(obj).parent().find('.div-right').find('#btnRight');					
		
		$(btnLeft).click(function(event){
			event.preventDefault();
			prevImage();
		});
		
		$(btnRight).click(function(event){
			event.preventDefault();
			nextImage();
		});
		
		if(options.autoPlay){
			if(options.autoPlayReverse){
				setInterval(prevImage, options.autoPlayInterval);
			}
			else{
				setInterval(nextImage, options.autoPlayInterval);
			}
		}
		//init footer		
		initFooter();		
		return this;
	}
	
	function initFooter(){
		var wrapper = $(obj).parent();		
		$(wrapper).append('<div class="slider-footer"></div>');		
		var footer = $(wrapper).find('.slider-footer');				
		for(i=1; i<=$(obj).children().length;i++){			
			$(footer).append('<a class="footer-link-'+i+'" href="#">'+ i +'</a>');						
			$(footer).find('.footer-link-'+i).click(function(event){								
				moveTo($(this).text());
				event.preventDefault();
			});			
		}
		
		$(footer).find('a:first').addClass('active-link');
		if(!options.showButtonBar){
			$(footer).hide();
		}
	}
	
	function nextImage(){
	if( $('#tips').is(':visible') ) {
		var last = $(obj).parent().find('.slider-footer').children().length;		
		var i = currentImage==last?1 : currentImage+1;		
		if(options.effect=='fade'){
			$(obj).find('li:nth-child('+currentImage+')').fadeOut('slow');
			$(obj).find('li:nth-child('+i+')').fadeIn('slow');
		}
		else {
			$(obj).find('li:nth-child('+currentImage+')').slideToggle('slow');
			$(obj).find('li:nth-child('+i+')').slideToggle('slow');
		}
		currentImage = i;
			
		var footer = $(obj).parent().find('.slider-footer');					
		for(i=1; i<=$(footer).children().length;i++){			
			var a = $(footer).find('a:nth-child('+i+')');				
			if($(a).hasClass('active-link')){
				$(a).removeClass('active-link');
			}
				
			if($(a).text()==currentImage){
				$(a).addClass('active-link');
			}
		}						
	  }
	}
	
	function prevImage(){
	  if( $('#tips').is(':visible') ) {
		var last = $(obj).parent().find('.slider-footer').children().length;
		var i = currentImage==1?last : currentImage-1;		
		
		if(options.effect=='fade'){
			$(obj).find('li:nth-child('+currentImage+')').fadeOut('slow');
			$(obj).find('li:nth-child('+i+')').fadeIn('slow');
		}
		else{
			$(obj).find('li:nth-child('+currentImage+')').slideToggle('slow');
			$(obj).find('li:nth-child('+i+')').slideToggle('slow');
		}
		currentImage = i;
			
		var footer = $(obj).parent().find('.slider-footer');					
		for(i=1; i<=$(footer).children().length;i++){			
			var a = $(footer).find('a:nth-child('+i+')');				
			if($(a).hasClass('active-link')){
				$(a).removeClass('active-link');
			}
				
			if($(a).text()==currentImage){
				$(a).addClass('active-link');
			}
		}
	  }						
	}	
	
	function moveTo(i){		
		i = parseInt(i); //convert string value to int
		if(i!=currentImage){								
			if(options.effect=='fade'){
				$(obj).find('li:nth-child('+currentImage+')').fadeOut('slow');
				$(obj).find('li:nth-child('+i+')').fadeIn('slow');
			}
			else{
				$(obj).find('li:nth-child('+currentImage+')').slideToggle('slow');
				$(obj).find('li:nth-child('+i+')').slideToggle('slow');
			}
			currentImage = i;
			
			var footer = $(obj).parent().find('.slider-footer');					
			for(i=1; i<=$(footer).children().length;i++){			
				var a = $(footer).find('a:nth-child('+i+')');				
				if($(a).hasClass('active-link')){
					$(a).removeClass('active-link');
				}
				
				if($(a).text()==currentImage){
					$(a).addClass('active-link');
				}
			}						
		}
	}
})(jQuery)