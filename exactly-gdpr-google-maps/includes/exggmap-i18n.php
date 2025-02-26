<?php 
/**
 * Load plugin textdomain.
*/

add_action( 'init', 'exggmap_load_textdomain' );

function exggmap_load_textdomain() {
  load_plugin_textdomain(EXGGMAP_PLUGIN_NAME, false, EXGGMAP_PLUGIN_NAME . '/languages/' ); 
}

?>