jQuery(document).ready(function($) {

	/* For Carousel Slider */
	$( '.wpamc-swiper-carousel' ).each(function( index ) {

		var slider_id   = $(this).parent().attr('id');
		var slider_conf = $.parseJSON( $(this).closest('.wpamc-carousel-wrap').find('.wpamc-carousel-conf').text());

		if( typeof(slider_id) != 'undefined' && slider_id != '' ) {
			
			var swiper = new Swiper('#'+slider_id, {
				slidesPerView		: 'auto',
				centeredSlides		: true,
				loop				: ( slider_conf.loop )			== "true"			? true		: false,
				autoplay			: {
										delay				: parseInt( slider_conf.autoplay_speed ),
										stopOnLastSlide		: ( slider_conf.auto_stop )		== "true"			? true		: false,
										disableOnInteraction: false,
									},
				spaceBetween		: 10,
				speed				: parseInt(slider_conf.speed),
				paginationHide		: ( slider_conf.pagination )	== "true"			? false		: true,
				pagination			: {
										el			: '.swiper-pagination',
										type		: ( slider_conf.pagination_type == 'fraction' )	? 'fraction'	: 'bullets',
										clickable	: true,
									},
				paginationClickable	: true,
				navigation			: {
										nextEl		: '.swiper-button-next',
										prevEl		: '.swiper-button-prev',
									},
	    	});

			/* Autplay True/False */
			if( slider_conf.autoplay == 'true' ) {
	    		swiper.autoplay.start();
	    	} else {
	    		swiper.autoplay.stop();
	    	}
		}
	});
});