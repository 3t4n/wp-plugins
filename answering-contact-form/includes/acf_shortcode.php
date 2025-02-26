<?php
/*
 Shortcode for contact form.
*/

add_shortcode( 'acfl_shortcode', 'acfl_add_shortcode' );

function acfl_add_shortcode() {
	ob_start();
	acfl_deliver_mail();
	acfl_form_code();
	acfl_similair();
	
	return ob_get_clean();
}
?>