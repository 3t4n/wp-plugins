// Get directory path of plugin directory
var plugindir = php_vars.plugindir;

//
var gifpath = '<img src="' + plugindir + '" class="eol_si_clear">';

// Use jQuery to wrap each img tag in the shrinkwrap div
jQuery( document ).on( 'ready', function() {
	jQuery( 'img' )
	.not('[src$=".gif"], [src^="data:"]')
	.wrap( '<div class="eol_si_shrink"></div>' )
	.after( gifpath );
} );

// Run shrinkwrap when lightbox openend
document.arrive( 'img', function() {
	if ( ! jQuery( this ).closest( '.eol_si_shrink' ).length ) {
		jQuery( this )
			.wrap( '<div class="eol_si_shrink"></div>' )
			.after( gifpath );
	}
} );