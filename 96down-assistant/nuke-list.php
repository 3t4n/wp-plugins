<?php 
/**
 * Register and enqueue the admin stylesheet
 * @since 2.0.0
 */
function dbfw_load_custom_admin_style( $hook ) {
    if( 'index.php' != $hook )
    	return;
	wp_register_style( 'custom_dbfw_admin_css', SO_DBFW_URI . 'css/nuke-list.css', false, SO_DBFW_VERSION );
	wp_enqueue_style( 'custom_dbfw_admin_css' );
}

//add a change to hide wpmudev in the dashboard end from chat plugin - End.
class WPMUDEV_Update_Notifications {
        public function __construct()
        {
        }

    }
    
class WPMUDEV_Dashboard {
      public function __construct()
      {
      }
      }

if ( class_exists('WPMUDEV_Dashboard_Notice') ) {

   remove_action( 'all_admin_notices', array( $WPMUDEV_Dashboard_Notice3, 'activate_notice' ), 10 );
   remove_action( 'all_admin_notices', array( $WPMUDEV_Dashboard_Notice3, 'install_notice' ), 10 );
}


function load_custom_wp_admin_style() {
  wp_register_style( 'custom_wp_admin_css', plugin_dir_url( __FILE__ ) . '/css/nuke-list.css', false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style');

function my_plugin_load_last()
{
	$path = str_replace( WP_PLUGIN_DIR . '/', '', __FILE__ );
	if ( $plugins = get_option( 'active_plugins' ) ) {
		if ( $key = array_search( $path, $plugins ) ) {
			array_splice( $plugins, $key, 9999 );
			array_unshift( $plugins, $path );
			update_option( 'active_plugins', $plugins );
		}
	}
}


add_action( 'activated_plugin', 'my_plugin_load_last' );
//add a change to hide wpmudev in the dashboard end from chat plugin - End.

// Remove WooCommerce Updater start
class woothemes_updater {
        public function __construct()
        {
        }

    }
global $woothemes_updater;
remove_action( 'admin_notices', array( $woothemes_updater, 'woothemes_updater_notice' ), 10 );
// Remove WooCommerce Updater end


// Remove IgniteWoo Updater start
class ignitewoo_updater {
        public function __construct()
        {
        }

    }
global $ignitewoo_updater;
remove_action( 'admin_notices', array( $ignitewoo_updater, 'ignitewoo_updater_notice' ), 10 );
// Remove IgniteWoo Updater finish

/** The End **/
?>