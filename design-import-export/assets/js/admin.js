jQuery( document ).ready ( function( $ ){
	$( '#design-import-posts-all' ).on( 'click', function() {
		if ( this.checked ) {
			$( '.design_import_posts' ).each( function() {
				this.checked = true;
			});
		} else {
			 $( '.design_import_posts' ).each( function() {
				this.checked = false;
			});
		}
	});
	$( '.design_import_posts' ).on( 'click', function() {
		if ( $( '.design_import_posts:checked' ).length == $( '.design_import_posts' ).length ) {
			$( '#design-import-posts-all' ).prop( 'checked', true );
		} else {
			$( '#design-import-posts-all' ).prop( 'checked', false );
		}
	});
});