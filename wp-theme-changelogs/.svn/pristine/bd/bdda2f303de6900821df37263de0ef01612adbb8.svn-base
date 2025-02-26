/*! jQuery Changelog Links
  Displays Changelog links on update page
  Author: Thomas W (themezee.com)
*/

(function($) {

	$( document ).ready( function() {

		// Loop through theme updates.
		$( '#update-themes-table tbody tr' ).each( function () {

			// Get theme slug.
			var theme_slug = $( this ).find( 'td.check-column input[type="checkbox"]' ).val();

			// Check if changelog link exists.
			if ( theme_slug in tztcl_changelog_links ) {

				// Add link to changelog.
				$( this ).find( 'td.plugin-title p' ).append( tztcl_changelog_links[theme_slug] );

			}

		} );

	} );

}(jQuery));
