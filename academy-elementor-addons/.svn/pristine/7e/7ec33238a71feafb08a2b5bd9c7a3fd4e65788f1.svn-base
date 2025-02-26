


'use strict';

(function ($) {



	jQuery(window).on("elementor/frontend/init", function () {

		

      	elementorFrontend.hooks.addAction("frontend/element_ready/academyea-course-carousel.default", function (scope, $) {

			var carouselElement = $(scope).find('.academyea-course-carousel__item');
			var DataAtrrCalss = '.academyea-course-carousel';
			
			var courseCount = $(scope).find(DataAtrrCalss).attr('courseCount');
			Number(courseCount)

			var slidesToScroll_dsk = $(scope).find(DataAtrrCalss).attr('carousel_slidesToScroll_dsk');
			var slidesToScroll_tablet = $(scope).find(DataAtrrCalss).attr('carousel_slidesToScroll_tablet');
			var slidesToScroll_mobile = $(scope).find(DataAtrrCalss).attr('carousel_slidesToScroll_mobile');
			
			var slidesToShow_dsk = $(scope).find(DataAtrrCalss).attr('carousel_column_dsk');
			var slidesToShow_medium = $(scope).find(DataAtrrCalss).attr('carousel_column_tablet');
			var slidesToShow_mobile = $(scope).find(DataAtrrCalss).attr('carousel_column_mobile');

		  	var carousel_arrows = $(scope).find(DataAtrrCalss).attr('carousel_arrows');
			var carousel_dot = $(scope).find(DataAtrrCalss).attr('carousel_dot');
			var carousel_transition = $(scope).find(DataAtrrCalss).attr('carousel_transition');
			var carousel_center = $(scope).find(DataAtrrCalss).attr('carousel_center');
			var carousel_smooth_scroll = $(scope).find(DataAtrrCalss).attr('carousel_smooth_scroll');
			var carousel_autoplay = $(scope).find(DataAtrrCalss).attr('carousel_auto_play');
			var carousel_auto_play_speed = $(scope).find(DataAtrrCalss).attr('carousel_auto_play_speed');
			var carousel_infinite_loop = $(scope).find(DataAtrrCalss).attr('carousel_infinite_loop');
			var carousel_pause_on_hover = $(scope).find(DataAtrrCalss).attr('carousel_pause_on_hover');
			var prevIcon = $(scope).find(DataAtrrCalss).attr('carousel_prevArowIcon');
			var nextIcon = $(scope).find(DataAtrrCalss).attr('carousel_nextArowIcon');
			var prevArrowIcon = `	<div class="slide-arrow prev-arrow ${prevIcon}" aria-hidden="true"></div>`;
			var nextArrowIcon = `	<div class="slide-arrow next-arrow ${nextIcon}" aria-hidden="true"></div>`;

		
			carousel_arrows == 'yes' ? carousel_arrows = true : carousel_arrows = false;
			carousel_dot == 'yes' ? carousel_dot = true : carousel_dot = false;
			carousel_transition = Number(carousel_transition);
			carousel_center == 'yes' ? carousel_center = true : carousel_center = false;
			carousel_smooth_scroll == 'yes' ? carousel_smooth_scroll = 'linear' : carousel_smooth_scroll = 'ease';
			carousel_autoplay == 'yes' ? carousel_autoplay = true : carousel_autoplay = false;
			carousel_auto_play_speed = Number(carousel_auto_play_speed);
			carousel_infinite_loop == 'yes' ? carousel_infinite_loop = true : carousel_infinite_loop = false;
			carousel_pause_on_hover == 'yes' ? carousel_pause_on_hover = true : carousel_pause_on_hover = false;
			var dsk_slideShow = (Number(slidesToShow_dsk) && courseCount) === 1 ? 2 : Number(slidesToShow_dsk)

			$(carouselElement).slick({

				prevArrow: prevArrowIcon,
    			nextArrow: nextArrowIcon,
				arrows: carousel_arrows,
				dots: carousel_dot,
				speed: carousel_transition,
				centerMode: carousel_center,
				cssEase: carousel_smooth_scroll,
				autoplay: carousel_autoplay,
				autoplaySpeed: carousel_auto_play_speed,
				infinite: carousel_infinite_loop,
				pauseOnHover: carousel_pause_on_hover,

				slidesToShow: dsk_slideShow ,
				slidesToScroll: Number(slidesToScroll_dsk),
				
				fade: false,
				mobileFirst:false,

				responsive: [
			
				{
					
				breakpoint: 1024,
				settings: {
					arrows: carousel_arrows,
					slidesToShow: Number(slidesToShow_medium),
					slidesToScroll: Number(slidesToScroll_tablet),
					
				}
				},


				{
				breakpoint:  576,
				settings: {
					arrows: false,
					slidesToShow: Number(slidesToShow_mobile),
					slidesToScroll: Number(slidesToScroll_mobile),
					
					
				}

				}
			]

			});

		
         
      	});
  	})

})(jQuery);














