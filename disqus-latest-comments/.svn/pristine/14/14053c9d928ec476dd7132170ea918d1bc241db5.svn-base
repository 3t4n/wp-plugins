function ToggleDisqusStyle() {
	if ( jQuery( "#style > option:selected" ).val() == "custom" ) {
		jQuery( "#custom_css" ).closest( 'tr' ).show();
	} else {
		jQuery( "#custom_css" ).closest( 'tr' ).hide();
	}
}

function ResetDisqusStyle() {
	jQuery( "#style > option.default" ).prop( "selected", true );
}

jQuery( document ).ready(function() {
	ToggleDisqusStyle();
});