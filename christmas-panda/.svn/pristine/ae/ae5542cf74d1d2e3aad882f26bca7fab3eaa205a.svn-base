jQuery(function (){
	'use strict';
	var $ = jQuery;

	var hp_container = $('#pix-cp-container'),
		body = $('body'),
		popup = $('.pix-christmas-pandas-popup');

	if (hp_container.length) {
	var hp_container_class = hp_container.attr('data-class'),
		hp_image = hp_container.attr('data-image'),
		hp_fall = hp_container.attr('data-fall');

		if ( 'pix-cp-bottom' == hp_container_class ) {
			var css_style = 'padding-bottom';
		} else {
			var css_style = 'padding-top';
		}

		if (hp_container.hasClass('pix-cp')) {
			body.css(css_style, hp_container.height());
			var cimg = hp_container.find('img');
			if (cimg.length) {
				cimg.load(function (){
					body.css(css_style, cimg.height());
				})
				$(window).resize(function (){
					body.css(css_style, cimg.height());
				})
			}
		}

		if (hp_fall == 'yes') {
			$('body').snowfall({image: [hp_image+'_1.png', hp_image+'_2.png', hp_image+'_3.png', hp_image+'_4.png', hp_image+'_5.png', hp_image+'_6.png', hp_image+'_7.png', hp_image+'_8.png', hp_image+'_9.png', hp_image+'_10.png'], minSize: 5, maxSize: 100, flakeCount: 25, minSpeed: 1, maxSpeed: 3});
			setTimeout(function () {
				$('body').snowfall('clear');
			}, 1000*300);
		}
		if (hp_container_class) {
			body.addClass(hp_container_class);
		}
	}

	if (popup.length) {
		var popup_is_hidden = Cookies.get('px_cp_popup_hidden');
		if ('1' !== popup_is_hidden) {
			popup.fadeIn(500);
		}
	}

	$(document).on('click', '.px-popup-close', function (e){
		e.preventDefault();
		Cookies.set('px_cp_popup_hidden', '1', { expires: 1});
		if (popup.length) {
			popup.fadeOut(500);
		}
	})
})
