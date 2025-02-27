(function( $ ) {

	// Grab the setting.
	wp.customize( 'motif_css', function( setting ) {
		// Find the head element and motif css element.
		var head  = $('head'),
			style = $('#motif-css');

		// When the CSS changes
		setting.bind( function( css ) {
			// Refresh the stylesheet by removing and recreating it.
			style.remove();
			style = $( '<style type="text/css" id="motif-css">' + css + '</style>' ).appendTo( head );
		});
	});

}( jQuery ));