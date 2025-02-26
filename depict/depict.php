<?php
/**
 * Plugin Name: Depict
 * Plugin URI: http://themes.tradesouthwest.com/plugins/depict
 * Description: Adds new fields to User Profile which display on a custom widget or page.
 * Version: 1.0
 * Author: Larry Judd Oliver
 * Author URI: http://tradesouthwest.com/
 * License: GPL3
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**activate/deactivate hooks
 */
function depict_plugin_activation()
{
    global $wp_version;
    $wp = '3.8';
        if ( version_compare( $wp_version, $wp, '<' ) ) {

	        deactivate_plugins( basename( __FILE__ ) );
            wp_die(		'<p>' .
			sprintf(__( 'This plugin can not be activated because it requires a WordPress version greater than %1$s. Please go to Dashboard &#9656; Updates to the latest version of WordPress .', 'depict' ),
			$wp )
			. '</p> <a href="' . admin_url( 'plugins.php' )
            . '">' . __( 'Please go back', 'depict' ) . '</a>'
		    );
        }
}

/**house keeeping fallback
 */
function depict_plugin_deactivation()
{ /*
    $option_name = 'show_depict_profile_fields';
    delete_option( $option_name ); */
}

/**enqueue scripts
 */
function depict_plugin_enqueue_admin_scripts()
{
    wp_enqueue_style( 'depict-admin-style',
                      plugins_url( basename( __DIR__ ))
                                   . '/assets/depict-admin-style.css' );
}
add_action( 'wp_enqueue_scripts', 'depict_plugin_enqueue_admin_scripts' );

/**enqueue text-domain
 * example usage: German MO and PO files should be named
 * depict-de_DE.mo and depict-de_DE.po.
 */
function depict_load_plugin_textdomain()
{
    load_plugin_textdomain( 'depict',
                            FALSE,
                            plugins_url( basename( __DIR__ )) . '/languages/'
                      );
}
add_action( 'init', 'depict_load_plugin_textdomain' );


register_activation_hook( __FILE__,   'depict_plugin_activation' );
register_deactivation_hook( __FILE__, 'depict_plugin_deactivation' );
//register_uninstall_hook( __FILE__,    'depict_plugin_uninstall' );

require_once( 'inc/depict-admin.php' );
require_once( 'inc/depict-views.php' );
require_once( 'inc/Depict_Widget.php' );

?>