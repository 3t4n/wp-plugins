/*!
 * spc-image-slider
 */

(function ($) {
	$(document).ready(function (e) {

		// Init block loaded via AJAX
		$(document.body).on('post-load', function (e) {
			spc_init_sliders();
		});

		var spc_init_sliders = () => {
			var spc_images_sliders = $('.wp-block-spc-image-slider:not(.spc-init) .wp-block-spc-image-slider-wrapper'),
				spc_images_slider,
				spc_fade_effect,
				spc_slidesToShow,
				spc_slidesToShowLaptop,
				spc_slidesToShowTablet,
				spc_slidesToShowMobile,
				spc_slidesToScroll,
				spc_autoplay,
				spc_autoplay_speed,
				spc_infinite,
				spc_animation_speed,
				spc_center_mode,
				spc_variable_width,
				spc_pause_on_hover,
				spc_arrows,
				spc_dots,

				spc_slide_height,
				spc_reset_on_tablet,
				spc_reset_on_mobile;

			if (!spc_images_sliders.length) return;


			if (typeof imagesLoaded == 'undefined') return;


			spc_images_sliders.each(function (index) {

				spc_images_slider = $(this);

				//Add init class
				spc_images_slider.closest('.wp-block-spc-image-slider').addClass('spc-init');

				spc_images_slider.imagesLoaded().done(function (instance) {

					const current_spc_images_slider = $(instance.elements[0]);

					spc_fade_effect = current_spc_images_slider.data('effect') == 'fade' ? true : false;
					spc_slidesToShow = !!current_spc_images_slider.data('slides-show') && current_spc_images_slider.data('effect') == 'slide' ? parseInt(current_spc_images_slider.data('slides-show')) : 1;
					spc_slidesToShowLaptop = !!current_spc_images_slider.data('slides-show-laptop') ? parseInt(current_spc_images_slider.data('slides-show-laptop')) : 1;
					spc_slidesToShowTablet = !!current_spc_images_slider.data('slides-show-tablet') ? parseInt(current_spc_images_slider.data('slides-show-tablet')) : 1;
					spc_slidesToShowMobile = !!current_spc_images_slider.data('slides-show-mobile') ? parseInt(current_spc_images_slider.data('slides-show-mobile')) : 1;
					spc_slidesToScroll = !!current_spc_images_slider.data('slides-scroll') ? parseInt(current_spc_images_slider.data('slides-scroll')) : 1;
					spc_autoplay = current_spc_images_slider.data('autoplay') == true ? true : false;
					spc_autoplay_speed = parseInt(current_spc_images_slider.data('autoplay-speed')) ? parseInt(current_spc_images_slider.data('autoplay-speed')) : 2000;
					spc_infinite = current_spc_images_slider.data('infinite') == true ? true : false;
					spc_animation_speed = parseInt(current_spc_images_slider.data('animation-speed'));
					spc_center_mode = current_spc_images_slider.data('center-mode') == true ? true : false;
					spc_variable_width = current_spc_images_slider.data('variable-width') == true ? true : false;
					spc_pause_on_hover = current_spc_images_slider.data('pause-hover') == true ? true : false;
					spc_arrows = current_spc_images_slider.data('arrows') != 'none' ? true : false;
					spc_dots = current_spc_images_slider.data('dots') != 'none' ? true : false;

					spc_slide_height = current_spc_images_slider.data('height') ? current_spc_images_slider.data('height') : undefined;
					spc_reset_on_tablet = current_spc_images_slider.data('reset-on-tablet') ? true : false;
					spc_reset_on_mobile = current_spc_images_slider.data('reset-on-mobile') ? true : false;

					$(instance.elements[0]).slick({
						arrows: spc_arrows,
						prevArrow: '<div class="spc-image-slider-prev"><i class="arrow-right"><svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7 13 1 7l6-6" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></i></div>',
						nextArrow: '<div class="spc-image-slider-next"><i class="arrow-left"><svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="m1 13 6-6-6-6" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></i></div>',
						dots: spc_dots,
						rows: 0,
						slidesToShow: spc_slidesToShow,
						slidesToScroll: spc_slidesToScroll,
						autoplay: spc_autoplay,
						autoplaySpeed: spc_autoplay_speed,
						fade: spc_fade_effect,
						speed: spc_animation_speed,
						infinite: spc_infinite,

						centerMode: spc_center_mode,
						variableWidth: spc_variable_width,
						pauseOnHover: spc_pause_on_hover,

						adaptiveHeight: true,

						responsive: [
							{
								breakpoint: 991,
								settings: {
									slidesToShow: spc_slidesToShowLaptop,
									slidesToScroll: 1
								}
							},
							{
								breakpoint: 768,
								settings: {
									slidesToShow: spc_slidesToShowTablet,
									slidesToScroll: 1
								}
							},
							{
								breakpoint: 468,
								settings: {
									slidesToShow: spc_slidesToShowMobile,
									slidesToScroll: 1
								}
							}
						]

					});

				});
			});
		};

		spc_init_sliders();
	});
})(jQuery);
