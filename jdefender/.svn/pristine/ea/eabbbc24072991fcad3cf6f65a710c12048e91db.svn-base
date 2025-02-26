<?php
/*
Plugin Name: jDefender
Plugin URI: https://joobi.co?l=home_jdefender.application
Description: jDefender is an advance website analytics enhanced with security features to protect your Joomla site from intruders. jDefender can be used for traffic analysis like "Google Analytics" or for security purpose to know who logged in to your site, what they did and what they modified.
Author: Joobi
Author URI: https://joobi.co
Version: 3.1
*/

/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */

if((defined('ABSPATH')) && !defined('JOOBI_SECURE')) define('JOOBI_SECURE',true);
defined('JOOBI_SECURE') or define( 'JOOBI_SECURE', true );
register_activation_hook( __FILE__, 'jdefender_activate' );
register_deactivation_hook( __FILE__, 'jdefender_deactivate' );
add_action( 'admin_init', 'install_jdefender' );
add_action( 'template_redirect', 'joobiIsPopUp' );
if(!empty( $_POST['page'])) $_GET['page']=$_POST['page'];
function jdefender_pluginActionLinks_WP($links) {
	return WApplication_wp4::renderFunction( 'install',  'pluginActionLinks', array( 'jdefender', $links ) );
}function jdefender_installNotice_WP() {
	ob_start();
	$html = WApplication_wp4::renderFunction( 'install',  'installNotice', 'jdefender' );
	ob_end_clean();
	echo $html;
}function jdefender_activate() {
if(version_compare(phpversion(),"5.3","<")){echo "PHP 5.3 is required for for the plugin to work!";exit;}	
add_option( 'jdefenderActivated_Plugin', 'jdefender' );
}function jdefender_deactivate() {
	add_option( 'jdefenderDeActivated_Plugin', 'jdefender' );
}function install_jdefender() {
	if ( is_admin() ) {
		if ( get_option( 'jdefenderActivated_Plugin' ) == 'jdefender' ) {
			delete_option( 'jdefenderActivated_Plugin' );
						include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'install.php' );
			if ( class_exists( 'install_joobi' ) ) {
				$joobiInstaller = new install_joobi ;
				$joobiInstaller->setCMS('wordpress','jdefender');
				$joobiInstaller->setDistribServer('http://server.joobi.co/w/wp/p32');
				$joobiInstaller->setLicense('http://register.joobi.co');
								$joobiInstaller->installJoobi();
			}
			WApplication_wp4::renderFunction("install","install",'jdefender');
		} elseif ( get_option( 'jdefenderDeActivated_Plugin' ) == 'jdefender' ) {
			delete_option( 'jdefenderDeActivated_Plugin' );
			WApplication_wp4::renderFunction("install","uninstall",'jdefender');
		}
	}
}
$joobiEntryPoint = __FILE__ ;
$status = @include(ABSPATH  . 'joobi'.DIRECTORY_SEPARATOR.'entry.php');
