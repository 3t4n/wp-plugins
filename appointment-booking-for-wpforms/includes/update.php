<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
class Booknow_Booknow_Update {
	function __construct(){
		add_action( 'upgrader_process_complete', array($this,"wp_upe_upgrade_completed"), 10, 2 );
	}
	function wp_upe_upgrade_completed( $upgrader_object, $options ) {
		 // The path to our plugin's main file
		 $our_plugin = plugin_basename( BOOKNOW_PLUGIN_FILE );
		 // If an update has taken place and the updated type is plugins and the plugins element exists
		 if( $options['action'] == 'update' && $options['type'] == 'plugin' && isset( $options['plugins'] ) ) {
			  foreach( $options['plugins'] as $plugin ) {
			   if( $plugin == $our_plugin ) {
			   		$plugin_data = get_plugin_data( __FILE__ );
                	$plugin_version = $plugin_data['Version'];
                	if(version_compare($plugin_version,"1.0.1")<=1){
                			//update notifications
                			$Booknow_Install::install_notifications_update();
                	}
			   }
			  }
			 }
	}
	//v1.0.1
	
}
new Booknow_Booknow_Update;