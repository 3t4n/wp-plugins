<?php
add_shortcode( 'WPSM_AC_SH', 'AccordionShortCodeWidget' );
function AccordionShortCodeWidget( $Id ) {
	ob_start();	
	if(!isset($Id['id'])) 
	 {
		$WPSM_AC_SH_ID = "";
	 } 
	else 
	{
		$WPSM_AC_SH_ID = $Id['id'];
	}
	require("ac-content.php"); 
	wp_reset_query();
    return ob_get_clean();
}
?>