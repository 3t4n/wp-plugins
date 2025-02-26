( function( $ ) {

	var WidgetAfeSliderHandler = function( $scope, $ ) {
		/*console.log( $scope );*/
		var carousel_elem = $scope.find('.afe-slides');
		/*console.log(carousel_elem);*/
		if (carousel_elem.length > 0) {
			var settings = carousel_elem.data('slider_options');
			$arrows_size = carousel_elem.data('arrows-size');
			$arrows_color = carousel_elem.data('arrows-color');
			$dots_size = carousel_elem.data('dots-size');
			$dots_color = carousel_elem.data('dots-color');
			carousel_elem.owlCarousel(settings);
			carousel_elem.find('.owl-nav [class*=owl-]').css({
				'font-size'	: $arrows_size +'px',
				'color'		: $arrows_color
			});
			carousel_elem.find('.owl-dots .owl-dot span').css({
				'width'			: $dots_size +'px',
				'height'		: $dots_size +'px',
				'background'	: $dots_color
			});	
			carousel_elem.on('change.owl.carousel', function(e){
				$(this).find('.afe-slide-content').css('opacity', '0');
				idx = e.item.index - (e.relatedTarget._clones.length / 2); /*get current index*/
				$(this).find('.owl-item').removeAnimateItem(idx);
		        /*add animation heading*/
		        $(this).find('.owl-item').removeAnimateClass(idx);			 				 	
			 	/*add animation description*/
		        $(this).find('.owl-item').removeAnimateClass(idx, '.afe-slide-description');			 				 	
			 	/*add animation button*/
		        $(this).find('.owl-item').removeAnimateClass(idx, '.afe-slide-button');
			});
			carousel_elem.on('translated.owl.carousel', function(e){
				$(this).find('.afe-slide-content').css('opacity', '1');
				idx = e.item.index - (e.relatedTarget._clones.length / 2); /*get current index*/
		        /*add animation heading*/
		        $(this).find('.owl-item').addAnimateClass(idx);			 				 	
			 	/*add animation description*/
		        $(this).find('.owl-item').addAnimateClass(idx, '.afe-slide-description');			 				 	
			 	/*add animation button*/
		        $(this).find('.owl-item').addAnimateClass(idx, '.afe-slide-button');
		    });
		}
	};	

	$( window ).on( 'elementor/frontend/init', function() {
		elementorFrontend.hooks.addAction( 'frontend/element_ready/afe-image-slider.default', WidgetAfeSliderHandler );
	} );
	$.fn.removeAnimateItem = function(idx) {
		if ($(this).eq(idx-1).hasClass('cloned')) {
			$(this).eq(idx-1).removeClass().addClass('owl-item cloned');
		} else {
			$(this).eq(idx-1).removeClass().addClass('owl-item');
		}
		if ($(this).eq(idx+1).hasClass('cloned')) {
			$(this).eq(idx+1).removeClass().addClass('owl-item cloned');
		} else {
			$(this).eq(idx+1).removeClass().addClass('owl-item');
		}
	}
	$.fn.addAnimateClass = function(idx, fe) {
		fe = typeof fe !== 'undefined' ? fe : '.afe-slide-heading';
		elcurrent = $(this).not('.cloned').eq(idx).find(fe);
      	dacurrent = elcurrent.data('animation');
		elcurrent.addClass('animated '+dacurrent);
		return this;
   	};
   	$.fn.removeAnimateClass = function(idx, fe) {
		fe = typeof fe !== 'undefined' ? fe : '.afe-slide-heading';		
		
      	el = $(this).not('.cloned').eq(idx-1).find(fe);
      	da = el.data('animation');
      	el.removeClass('animated '+da);

      	el1 = $(this).not('.cloned').eq(idx+1).find(fe);
      	da1 = el1.data('animation');
      	el1.removeClass('animated '+da1);
		return this;
   	};
   	/*afe fancy flipbox*/
   	var WidgetAfeFlipboxHandler = function( $scope, $ ) {
   		var flipbox_cube = $scope.find('.afe-flipbox');
		if (flipbox_cube.length > 0) {
			$.each(flipbox_cube, function(key, value){
				console.log($(this).find('.afe-flipbox-front').height());
			});
		}
   	}
   	$( window ).on( 'elementor/frontend/init', function() {
		elementorFrontend.hooks.addAction( 'frontend/element_ready/afe-flipbox.default', WidgetAfeFlipboxHandler );
	} );
} )( jQuery );


	