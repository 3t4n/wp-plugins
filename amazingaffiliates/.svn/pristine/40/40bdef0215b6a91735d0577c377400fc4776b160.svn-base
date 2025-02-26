function important_field_missing_alert(cssSelector) {
    if( jQuery( cssSelector ).attr('data-saved-value') == '' || jQuery( cssSelector ).attr('data-saved-value') == '{"name":"- SELECT -","amazon_domain":"","pa_endpoint":"","region":""}' ) {
        jQuery( cssSelector ).addClass( 'missing_value' );
    }
    jQuery( '.tr').removeClass( 'missing_value_row' );
    jQuery( '.tr.api_group[data-saved-value=""]').addClass( 'missing_value_row' );
}

function test_api(e) {
    
    jQuery('#test_api_result').html('<span style="color:darkgray;">Connecting...</span>');

	jQuery.ajax(
		jQuery("main").attr( "data-ajax" ), {
			method : "POST",
			dataType : "json",
			data : {
                action: "test_api",
                nonce: jQuery("main").attr( "data-nonce" )
			},
			success: function(response) {
                if(response) jQuery('#test_api_result').html('<span style="color:green;font-weight:bold;">'+response+'</span>');
                jQuery('#test_api').css('background-color' ,'green');
                jQuery('#test_api').css('color' ,'white');
                jQuery("#letsStart").removeClass('hidden');
                setTimeout(() => {
                  location.reload();
                }, "2000");
			},
			error: function(response) {
                jQuery('#test_api_result').html('<span style="color:red;font-weight:bold;">Meh! Failed to connect to the Amazon APIs with these credentials!<br>(check for any typos)</span>');
                jQuery('#test_api').css('background-color' ,'red');
                jQuery('#test_api').css('color' ,'white');
                jQuery("#letsStart").addClass('hidden');
			}
		}
	);
	
}

jQuery(document).ready( function() {
    
    jQuery(".amazingaffiliates_tab").tabs();
    
    important_field_missing_alert( 'select[name="amazingaffiliates_settings_api_country"]' );
    important_field_missing_alert( 'input[name="amazingaffiliates_settings_api_partner_tag"]' );
    important_field_missing_alert( 'input[name="amazingaffiliates_settings_api_accessKey"]' );
    important_field_missing_alert( 'input[name="amazingaffiliates_settings_api_secretKey"]' );
    
    jQuery( "input" ).on( "change keyup mouseup paste", function(e) {
        important_field_missing_alert( 'select[name="amazingaffiliates_settings_api_country"]' );
        important_field_missing_alert( 'input[name="amazingaffiliates_settings_api_partner_tag"]' );
        important_field_missing_alert( 'input[name="amazingaffiliates_settings_api_accessKey"]' );
        important_field_missing_alert( 'input[name="amazingaffiliates_settings_api_secretKey"]' );
    });
    
    
    jQuery("#test_api").click( function(e) {
        e.preventDefault();
        test_api(e);
    });
    
});