<?php

/*
  Plugin Name: Additional email recipients
  Plugin URI: https://arrowdesign.ie/
  Description: Send emaiils to additional email recipients
  Version: 1.2
  Author: Arrow Design
  Author URI: https://arrowdesign.ie
  Text Domain: additional-email-recipients
  REST API Namespace: arrowD07137738/v1/authenticate
  License: GPLv2 or later
  License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

// Exit if accessed directly
  if (!defined('ABSPATH'))
    exit;

/*
* Register the admin page for : additional email recipients
*
*/
include_once 'admin/admin.php';
/* include_once 'admin/emailLogginBespoke.php';
include_once 'admin/emailtemplatesBespoke.php';
include_once 'admin/premiumAuthenticationOptions.php';

include_once 'admin/versionControlUpdater.php';
 */



	//declare the function to add settings link to plugin page : blank template

	function arrowD07137738__additionalemails_settings_link($links) {
	  $settings_link_ad_plugin_arrowD07137738__additionalemails_Options  = '<a href="admin.php?page=arrowD07137738__additionalemailsSettings">Settings</a>';
	  array_unshift($links, $settings_link_ad_plugin_arrowD07137738__additionalemails_Options );
	  return $links;
	}

	//declare the the address of the files of the plugin, call the function, using a filter
	$plugin_arrowD07137738__additionalemails = plugin_basename(__FILE__);
	add_filter("plugin_action_links_$plugin_arrowD07137738__additionalemails", 'arrowD07137738__additionalemails_settings_link' );

	//add documentation link and support link to plugin page
function arrowD07137738__additionalemails_page_doc_meta( $arrowD07137738__additionalemails_plugin_links, $file ) {
		if ( plugin_basename( __FILE__ ) == $file ) {
			$arrowD07137738__additionalemails_row_meta = array(
			'arrowD07137738__additionalemails_docs'    => '<a href="' . esc_url( 'https://arrowdesign.ie/' ) . '" target="_blank" aria-label="' . esc_attr__( 'Plugin Additional Links', 'additional-email-recipients' ) . '" >' . esc_html__( 'Documentation', 'additional-email-recipients' ) . '</a>',
			'arrowD07137738__additionalemails_support'    => '<a href="' . esc_url( 'https://arrowdesign.ie/contact-arrow-design-2/' ) . '" target="_blank" aria-label="' . esc_attr__( 'Plugin Additional Links', 'additional-email-recipients' ) . '" >' . esc_html__( 'Support', 'additional-email-recipients' ) . '</a>'
			);

			return is_null($arrowD07137738__additionalemails_plugin_links) ? $arrowD07137738__additionalemails_row_meta : array_merge( $arrowD07137738__additionalemails_plugin_links, $arrowD07137738__additionalemails_row_meta );
	}
			return (array) $arrowD07137738__additionalemails_plugin_links;
}

		add_filter( 'plugin_row_meta', 'arrowD07137738__additionalemails_page_doc_meta', 10, 2 );



?>