<?php

/*
Class Name: WOO_F_LOOKBOOK_Admin_Admin
Author: Andy Ha (support@villatheme.com)
Author URI: http://villatheme.com
Copyright 2015 villatheme.com. All rights reserved.
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WOO_F_LOOKBOOK_Admin_Admin {
	protected $settings;
	protected $suffix = WP_DEBUG ? '' : '.min';

	function __construct() {
		$this->settings = new WOO_F_LOOKBOOK_Data();
		add_filter(
			'plugin_action_links_woo-lookbook/woo-lookbook.php', array(
				$this,
				'settings_link'
			)
		);
		add_action( 'init', array( $this, 'init' ) );
		add_action( 'admin_menu', array( $this, 'menu_page' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ), 99 );
	}





	/**
	 * Function init when run plugin+
	 */
	function init() {
		/*Register post type*/

		load_plugin_textdomain( 'woo-lookbook' );
		$this->load_plugin_textdomain();
		$this->register_post_type();


	}




}

?>