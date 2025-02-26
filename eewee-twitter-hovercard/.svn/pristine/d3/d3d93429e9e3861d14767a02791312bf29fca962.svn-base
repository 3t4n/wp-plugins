<?php 
/*
Plugin Name: Eewee Twitter Hovercard
Plugin URI: http://www.eewee.fr/
Description: Twitter Hovercard. Use the system "twitter hovercard" proposed by twitter wordrpess on your site. Hovercard Twitter allows you to view the profile of each @twitter_profil (hover) that you will add in the various pages / posts your website. The plugin is Extremely easy to use & offers a great value added.
Version: 1.1
Author: Michael DUMONTET
Author URI: http://www.eewee.fr/wordpress/
License: copyright eewee
*/

/**
 * Define
 * @since 1.0.0
 */
define( 'EEWEE_TWITTERHOVERCARD_VERSION', '1.1' );
define( 'EEWEE_TWITTERHOVERCARD_NAME', 'eeweeTwitterHovercard' );
define( 'EEWEE_TWITTERHOVERCARD_PLUGIN_DIR', WP_PLUGIN_DIR . '/' . dirname( plugin_basename( __FILE__ ) ) );
define( 'EEWEE_TWITTERHOVERCARD_PLUGIN_URL', WP_PLUGIN_URL . '/' . dirname( plugin_basename( __FILE__ ) ) );

// Gestion lang (dossier lang dans le plugin, contenant les .mo)
load_plugin_textdomain("eewee-twitter-hovercard", false, dirname( plugin_basename( __FILE__ ) ) . '/lang');

/**
 * Add CSS
 * @since 1.0.0
 */
function addCssTwitterHovercard(){
	//wp_enqueue_style( 'cssCountdown-style', '/wp-content/plugins/eewee_twitter_card/css/style.css' );
}
add_action( 'init', 'addCssTwitterHovercard' );

/**
 * Add JS
 * @since 1.0.0
 */
function addJsTwitterHovercard(){
	wp_enqueue_style( 'jsTwitterHovercard', '/wp-content/plugins/eewee_twitter_card/css/themes/base/jquery.ui.all.css' );
}
add_action( 'init', 'addJsTwitterHovercard' );


/**
 * Add Files
 * @since 1.0.0
 */
require_once( EEWEE_TWITTERHOVERCARD_PLUGIN_DIR . '/forms/addTwitterHovercard.php' );
require_once( EEWEE_TWITTERHOVERCARD_PLUGIN_DIR . '/controllers/EeweeTwitterHovercard.php' );


/**
 * Instantiate Classe
 * @since 1.0.0
 */
$eewee_admin = new EeweeTwitterHovercard();


/**
 * Wordpress Activate/Deactivate
 *
 * @uses register_activation_hook()
 * @uses register_deactivation_hook()
 *
 * @since 1.0.0
 */
register_activation_hook( __FILE__, array( $eewee_admin, 'eewee_activate' ) );
register_deactivation_hook( __FILE__, array( $eewee_admin, 'eewee_deactivate' ) );


/**
 * Required action filters
 *
 * @uses add_action()
 *
 * @since 1.0.0
 */
add_action( 'admin_menu', array( $eewee_admin, 'eewee_adminMenu' ) );
?>