<?php
/**
* Delete the options on uninstall.
*/
	 
// plugin uninstallation
register_uninstall_hook( __FILE__, 'dftc_uninstall' );
function dftc_uninstall() {
    delete_option( 'wp_fortune_telling_cards_plugin_option' );
}
?>