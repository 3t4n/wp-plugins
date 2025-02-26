<?php
/**
* Plugin Name: AT News Scroller
* Plugin URI: http://abhashtech.com
* Description: Scroll latest post from certain category.
* Version: 0.4
* Author: AbhashTech
* Author URI: http://abhashtech.com
*/


// If plugin file is called directly, die!
if ( ! defined( 'WPINC' ) ) {
die("Ouch! You should not have called me like this!");
}

// TGM Class to check if Redux Framework is Installed or not, if not nag user to install Redux Plugin
if ( file_exists( dirname( __FILE__ ) . '/includes/tgm/tgm-init.php' ) ) {
    require_once dirname( __FILE__ ) . '/includes/tgm/tgm-init.php';
}

// Show option panel only if redux Plugin is installed
if ( class_exists( 'Redux' )  && file_exists( dirname(__FILE__) . '/includes/extensions/extensions-init.php' ) ) {
require_once( dirname(__FILE__) . '/includes/extensions/extensions-init.php' );
}

// load the Plugin's Setting Page 
if ( !isset( $at_news_scroller ) && file_exists( dirname(__FILE__) . '/includes/view.php' ) ) {
require_once( dirname(__FILE__) . '/includes/view.php' );
}
//Load Functions file
require_once(dirname(__FILE__) . '/includes/functions.php');
?>
