<?php

/***************************
* Global Constants
***************************/

define( 'LMLM_BASE_NAME', plugin_basename( __FILE__ ) );	    // lamlim-button/
define( 'LMLM_BASE_DIR_SHORT', dirname( LMLM_BASE_NAME ) );	// lamlim-button
define( 'LMLM_BASE_DIR_LONG', dirname( __FILE__ ) );			// ../wp-content/plugins/lamlim-button (physical file path)
define( 'LMLM_INC_DIR', LMLM_BASE_DIR_LONG . '/inc/' );		// ../wp-content/plugins/lamlim-button/inc/  (physical file path)
define( 'LMLM_BASE_URL', plugin_dir_url( __FILE__ ) );		// http://mysite.com/wp-content/plugins/lamlim-button/
define( 'LMLM_IMAGES_URL', LMLM_BASE_URL . 'img/' );			// http://mysite.com/wp-content/plugins/lamlim-button/img/
define( 'LMLM_CSS_URL', LMLM_BASE_URL . 'css/' );
define( 'LMLM_JS_URL', LMLM_BASE_URL . 'js/' );



$lmlm_options = get_option( 'lmlm_options' );

/***************************
* Includes
***************************/

require_once( LMLM_INC_DIR . 'public-display-functions.php' );
require_once(LMLM_INC_DIR.'admin-functions.php');

add_action('plugins_loaded', 'myplugin_init');
function myplugin_init() {
  load_plugin_textdomain( 'lmlm', false, dirname( plugin_basename( __FILE__ ) ).'/lang/' );
}


?>
