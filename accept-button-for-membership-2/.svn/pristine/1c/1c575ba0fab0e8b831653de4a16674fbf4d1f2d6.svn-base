<?php
/**
 * Plugin Name: Accept Button For Membership 2
 * Plugin URI: http://elliotvs.co.uk
 * Description: Adds a shortcode to hide the PayPal pay now button for Membership 2 plugin until user clicks an 'I ACCEPT' button.
 * Version: 1.0.0
 * Author: ElliotVS
 * Author URI: http://elliotvs.co.uk
 * License: GPL2
 */

function avc_accept(){

	if (is_plugin_active('membership/membership2.php')) {

		return "<script>

		jQuery(document).ready(function(){
			jQuery('#ms-paypal-form').toggle();
			jQuery('#hideshow2').toggle();
			
			jQuery('#hideshow').live('click', function(event) {       
				 jQuery('#ms-paypal-form').toggle('show');
				 jQuery('#hideshow').toggle();
				 jQuery('#hideshow2').toggle();
			});
			
			jQuery('#hideshow2').live('click', function(event) {       
				 jQuery('#ms-paypal-form').toggle('hide');
				 jQuery('#hideshow').toggle();
				 jQuery('#hideshow2').toggle();
			});
		});

		</script>

		<input type='button' id='hideshow' value='I ACCEPT' style='background-color: #BDBDBD;'>
		<input type='button' id='hideshow2' value='I ACCEPT' style='background-color: #01DF01;'>";

	}

}
add_shortcode( 'acceptbutton', 'avc_accept' );

?>