/*NEW DASHBOARD MOBILE MENU AND WIDGET TOGGLING*/
jQuery(document).ready(function($){
	$('#grfwp-dash-mobile-menu-open').click(function(){
		$('.grfwp-admin-header-menu .nav-tab:nth-of-type(1n+2)').toggle();
		$('#grfwp-dash-mobile-menu-up-caret').toggle();
		$('#grfwp-dash-mobile-menu-down-caret').toggle();
		return false;
	});
	$(function(){
		$(window).resize(function(){
			if($(window).width() > 800){
				$('.grfwp-admin-header-menu .nav-tab:nth-of-type(1n+2)').show();
			}
			else{
				$('.grfwp-admin-header-menu .nav-tab:nth-of-type(1n+2)').hide();
				$('#grfwp-dash-mobile-menu-up-caret').hide();
				$('#grfwp-dash-mobile-menu-down-caret').show();
			}
		}).resize();
	});	
	$('#grfwp-dashboard-support-widget-box .grfwp-dashboard-new-widget-box-top').click(function(){
		$('#grfwp-dashboard-support-widget-box .grfwp-dashboard-new-widget-box-bottom').toggle();
		$('#grfwp-dash-mobile-support-up-caret').toggle();
		$('#grfwp-dash-mobile-support-down-caret').toggle();
	});
	$('#grfwp-dashboard-optional-table .grfwp-dashboard-new-widget-box-top').click(function(){
		$('#grfwp-dashboard-optional-table .grfwp-dashboard-new-widget-box-bottom').toggle();
		$('#grfwp-dash-optional-table-up-caret').toggle();
		$('#grfwp-dash-optional-table-down-caret').toggle();
	});
});

/*LOCK BOXES*/
jQuery(document).ready(function($){
	$(function(){
		$(window).resize(function(){
			$('.grfwp-premium-options-table-overlay').each(function(){
				var eachProTableOverlay = $(this);
				var associatedTable = eachProTableOverlay.next();
				var tableWidth = associatedTable.outerWidth(true);
				associatedTable.css('min-height', '240px');
				var tableHeight = associatedTable.outerHeight();
				var tablePosition = associatedTable.position();
				var tableLeft = tablePosition.left; 
				var tableTop = tablePosition.top; 
				eachProTableOverlay.css('width', tableWidth+'px');
				eachProTableOverlay.css('height', tableHeight+'px');
				eachProTableOverlay.css('left', tableLeft+'px');
				eachProTableOverlay.css('top', tableTop+'px');
			});
		}).resize();
	});	
});

//OPTIONS PAGE YES/NO TOGGLE SWITCHES
jQuery(document).ready(function($){
	$('.grfwp-admin-option-toggle').on('change', function() {
		var Input_Name = $(this).data('inputname'); console.log(Input_Name);
		if ($(this).is(':checked')) {
			$('input[name="' + Input_Name + '"][value="1"]').prop('checked', true).trigger('change');
			$('input[name="' + Input_Name + '"][value=""]').prop('checked', false);
		}
		else {
			$('input[name="' + Input_Name + '"][value="1"]').prop('checked', false).trigger('change');
			$('input[name="' + Input_Name + '"][value=""]').prop('checked', true);
		}
	});
});

//DATEPICKER
if ('object' == typeof grfwp_php_add_data && grfwp_php_add_data.enable_datepicker == '1') {
	jQuery(document).ready(function($){
		$('.grfwp-datepicker').datepicker({
			dateFormat : grfwp_php_add_data.date_format,
		});
	});
}

//SPECTRUM
jQuery(document).ready(function() {
	jQuery('.grfwp-spectrum').spectrum({
		showInput: true,
		showInitial: true,
		preferredFormat: "hex",
		allowEmpty: true
	});

	jQuery('.grfwp-spectrum').css('display', 'inline');

	jQuery('.grfwp-spectrum').on('change', function() {
		if (jQuery(this).val() != "") {
			jQuery(this).css('background', jQuery(this).val());
			var rgb = GRFWP_hexToRgb(jQuery(this).val());
			var Brightness = (rgb.r * 299 + rgb.g * 587 + rgb.b * 114) / 1000;
			if (Brightness < 100) {jQuery(this).css('color', '#ffffff');}
			else {jQuery(this).css('color', '#000000');}
		}
		else {
			jQuery(this).css('background', 'none');
		}
	});

	jQuery('.grfwp-spectrum').each(function() {
		if (jQuery(this).val() != "") {
			jQuery(this).css('background', jQuery(this).val());
			var rgb = GRFWP_hexToRgb(jQuery(this).val());
			var Brightness = (rgb.r * 299 + rgb.g * 587 + rgb.b * 114) / 1000;
			if (Brightness < 100) {jQuery(this).css('color', '#ffffff');}
			else {jQuery(this).css('color', '#000000');}
		}
	});
});

function GRFWP_hexToRgb(hex) {
    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    return result ? {
        r: parseInt(result[1], 16),
        g: parseInt(result[2], 16),
        b: parseInt(result[3], 16)
    } : null;
}

// About Us Page
jQuery( document ).ready( function( $ ) {

	jQuery( '.grfwp-about-us-tab-menu-item' ).on( 'click', function() {

		jQuery( '.grfwp-about-us-tab-menu-item' ).removeClass( 'grfwp-tab-selected' );
		jQuery( '.grfwp-about-us-tab' ).addClass( 'grfwp-hidden' );

		var tab = jQuery( this ).data( 'tab' );

		jQuery( this ).addClass( 'grfwp-tab-selected' );
		jQuery( '.grfwp-about-us-tab[data-tab="' + tab + '"]' ).removeClass( 'grfwp-hidden' );
	} );

	jQuery( '.grfwp-about-us-send-feature-suggestion' ).on( 'click', function() {

		var feature_suggestion = jQuery( '.grfwp-about-us-feature-suggestion textarea' ).val();
		var email_address = jQuery( '.grfwp-about-us-feature-suggestion input[name="feature_suggestion_email_address"]' ).val();
	
		var params = {};

		params.nonce  				= grfwp_php_add_data.nonce;
		params.action 				= 'grfwp_send_feature_suggestion';
		params.feature_suggestion	= feature_suggestion;
		params.email_address 		= email_address;

		var data = jQuery.param( params );
		jQuery.post( ajaxurl, data, function() {} );

		jQuery( '.grfwp-about-us-feature-suggestion' ).prepend( '<p>Thank you, your feature suggestion has been submitted.' );
	} );
} );


//SETTINGS PREVIEW SCREENS

jQuery( document ).ready( function() {

	jQuery( '.grfwp-settings-preview' ).prevAll( 'h2' ).hide();
	jQuery( '.grfwp-settings-preview' ).prevAll( '.sap-tutorial-toggle' ).hide();
	jQuery( '.grfwp-settings-preview .sap-tutorial-toggle' ).hide();
});
