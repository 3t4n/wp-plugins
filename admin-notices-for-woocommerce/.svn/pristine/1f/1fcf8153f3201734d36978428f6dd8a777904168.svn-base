<?php

/**
* Plugin Name: Admin notices for WooCommerce
* Plugin URI: webmaniabr.com
* Description: Show admin notices with WooCommerce Admin plugin.
* Author: WebmaniaBR
* Author URI: https://webmaniabr.com
* Version: 1.1
* Copyright: © 2009-2019 WebmaniaBR.
* License: GNU General Public License v3.0
* License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class WooCommerceAdminNotices {

  protected static $_instance = NULL;

	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;

	}

  function load(){

    global $pagenow;

    // Check WooCommerce Admin plugin
    if (!is_plugin_active('woocommerce-admin/woocommerce-admin.php')){
      return;
    }

    // Do not make changes in wc-admin page
    if ($pagenow == 'admin.php' && $_GET['page'] == 'wc-admin'){
      return;
    }

    // Remove actions
    remove_action( 'admin_notices', array( 'Automattic\WooCommerce\Admin\Loader', 'inject_before_notices' ), -9999 );
		remove_action( 'admin_notices', array( 'Automattic\WooCommerce\Admin\Loader', 'inject_after_notices' ), PHP_INT_MAX );

  }

}

function WooCommerceAdminNotices(){

	return WooCommerceAdminNotices::instance();

}

add_action( 'plugins_loaded', array( WooCommerceAdminNotices(), 'load' ), 20);
