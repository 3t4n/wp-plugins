(function( $ ) {
	'use strict';

	jQuery(document).ready(function(a) {
		if (jQuery('body').hasClass('twitch-integration_page_streamweasels-wall')) {
			var columnCount = document.querySelector('#sw-tile-column-count');
			var columnCountVal = columnCount.value;
			var columnCountInit = new Powerange(columnCount, { callback: function() {columnCount.nextElementSibling.nextElementSibling.innerHTML = columnCount.value+' columns'}, step: 1, max: 6, start: columnCountVal, hideRange: true });		

			var columnSpacing = document.querySelector('#sw-tile-column-spacing');
			var columnSpacingVal = columnSpacing.value;
			var columnSpacingInit = new Powerange(columnSpacing, { callback: function() {columnSpacing.nextElementSibling.nextElementSibling.innerHTML = columnSpacing.value+'px'}, step: 5, max: 100, start: columnSpacingVal, hideRange: true });

			var clipboard = new ClipboardJS('#sw-copy-shortcode');

			clipboard.on('success', function (e) {
				jQuery(e.trigger).addClass('tooltipped');
				jQuery(e.trigger).on('mouseleave', function() {
					jQuery(e.trigger).removeClass('tooltipped');
				})
			  });
			  
		}
	})


})( jQuery );
