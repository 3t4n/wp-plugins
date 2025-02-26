(function( $ ) {
	'use strict';

	$( document ).ready(function() {

		// Admin menu preloader.
		$('#_wpas_er_options').addClass('wpas--after-none');

		var getUrl = window.location,
			baseUrl = getUrl.protocol + '//' + getUrl.host + '/',
			selectedVal = $('.wpas--image-group .wpas--active').find('input').val();

		/* switch ( selectedVal ) {

			case 'value-1':
				$( '.wpas--image-group' ).after( '<div class="wpas--image-after"><img src="' + baseUrl + 'wp-content/plugins/editorial-rating/admin/img/theme-set/demo-1.jpg"></div>' );
				break;

			case 'value-2':
				$( '.wpas--image-group' ).after( '<div class="wpas--image-after"><img src="' + baseUrl + 'wp-content/plugins/editorial-rating/admin/img/theme-set/demo-2.jpg"></div>' );
				break;

			case 'value-3':
				$( '.wpas--image-group' ).after( '<div class="wpas--image-after"><img src="' + baseUrl + 'wp-content/plugins/editorial-rating/admin/img/theme-set/demo-3.jpg"></div>' );
				break;
				
			case 'value-4':
				$( '.wpas--image-group' ).after( '<div class="wpas--image-after"><img src="' + baseUrl + 'wp-content/plugins/editorial-rating/admin/img/theme-set/demo-4.jpg"></div>' );
				
			case 'value-5':
				$( '.wpas--image-group' ).after( '<div class="wpas--image-after"><img src="' + baseUrl + 'wp-content/plugins/editorial-rating/admin/img/theme-set/demo-5.jpg"></div>' );
				
			case 'value-6':
				$( '.wpas--image-group' ).after( '<div class="wpas--image-after"><img src="' + baseUrl + 'wp-content/plugins/editorial-rating/admin/img/theme-set/demo-6.jpg"></div>' );
				
			case 'value-7':
				$( '.wpas--image-group' ).after( '<div class="wpas--image-after"><img src="https://via.placeholder.com/700x467"></div>' );
				
			case 'value-8':
				$( '.wpas--image-group' ).after( '<div class="wpas--image-after"><img src="https://via.placeholder.com/700x467"></div>' );
		} */


		/* $('.wpas--image-group .wpas--sibling').on('click', function() {

			var selectedVal = $(this).find('input').val();
			var selectImgLg = $('.wpas--image-after').find('img');

			switch ( selectedVal ) {

				case 'value-1':
					$(selectImgLg).attr('src', baseUrl + 'wp-content/plugins/editorial-rating/admin/img/theme-set/demo-1.jpg');
					break;

				case 'value-2':
					$(selectImgLg).attr('src', baseUrl + 'wp-content/plugins/editorial-rating/admin/img/theme-set/demo-2.jpg');
					break;

				case 'value-3':
					$(selectImgLg).attr('src', baseUrl + 'wp-content/plugins/editorial-rating/admin/img/theme-set/demo-3.jpg');
					break;

				case 'value-4':
					$(selectImgLg).attr('src', baseUrl + 'wp-content/plugins/editorial-rating/admin/img/theme-set/demo-4.jpg');

				case 'value-5':
					$(selectImgLg).attr('src', baseUrl + 'wp-content/plugins/editorial-rating/admin/img/theme-set/demo-5.jpg');

				case 'value-6':
					$(selectImgLg).attr('src', baseUrl + 'wp-content/plugins/editorial-rating/admin/img/theme-set/demo-6.jpg');

				case 'value-7':
					$(selectImgLg).attr('src', 'https://via.placeholder.com/700x467');

				case 'value-8':
					$(selectImgLg).attr('src', 'https://via.placeholder.com/700x467');
			}
		}); */

	});

})( jQuery );
