jQuery(document).ready(function($){
	var cisiw_initialize_widget = function ( widget_el ) {
		cisiwColorPickerInit( widget_el );
		cisiw_repeating_sortable_init( widget_el );
	};

	cisiw_initialize_widget();

	function cisiw_on_customizer_widget_form_update( e, widget_el ) {
		cisiw_initialize_widget( widget_el );
	}

	// Widget init doesn't occur for some reason, when added through the customizer. Therefore the event handler below is needed.
	// https://make.wordpress.org/core/2014/04/17/live-widget-previews-widget-management-in-the-customizer-in-wordpress-3-9/
	// 'widget-added' is complemented by 'widget-updated'. However, alpha-color-picker shows multiple alpha channel
	// pickers if called on 'widget-updated'
	// $( document ).on( 'widget-updated', cisiw_on_customizer_widget_form_update );
	$( document ).on( 'widget-added', cisiw_on_customizer_widget_form_update );

	// Widget Actions on Save
	$(document).ajaxSuccess(function(e, xhr, options){
		if ( options.data && options.data.search( 'action=save-widget' ) != -1 ) {
			var widget_id;

			if( ( widget_id = options.data.match( /widget-id=(socials-ignited-\d+)/ ) ) !== null ) {
				var widget = $("input[name='widget-id'][value='" + widget_id[1] + "']").parent();
				cisiw_initialize_widget( widget );
			}

		}

	});

});

var cisiwColorPickerInit = function ( selector ) {
	if ( selector === undefined ) {
		var ciColorPicker = jQuery( '#widgets-right .cisiw-colorpckr, #wp_inactive_widgets .cisiw-colorpckr' ).filter( function () {
			return ! jQuery( this ).parents( '.field-prototype' ).length;
		} );

		// The use of throttle was taken by: https://wordpress.stackexchange.com/questions/5515/update-widget-form-after-drag-and-drop-wp-save-bug/212676#212676
		ciColorPicker.each( function () {
			jQuery( this ).wpColorPicker( {
				change: _.throttle( function () {
					jQuery( this ).trigger( 'change' );
				}, 1000, { leading: false } )
			} );
		} );
	} else {
		jQuery( '.cisiw-colorpckr', selector ).each( function () {
			jQuery( this ).wpColorPicker( {
				change: _.throttle( function () {
					jQuery( this ).trigger( 'change' );
				}, 1000, { leading: false } )
			} );
		} );
	}
};
