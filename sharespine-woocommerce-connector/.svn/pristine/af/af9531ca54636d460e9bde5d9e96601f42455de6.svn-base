<?php
/**
* Plugin Name: Sharespine Woocommerce Connector
* Description: Premium Synchronizing of customers, products and orders from WooCommerce to Fortnox, Specter, Visma, Mamut, Hogia, CDON, Fyndiq, Tradera, Afound .
* Version: 4.7.55
* Author: Sharespine AB
* Author URI: https://www.sharespine.com/woocommerce/
*
* WC requires at least: 3.5
* WC tested up to: 8.1.1
*
* Copyright: © 2017-2023 Sharespine AB
* License: GPL3
* License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

if ( ! defined( 'ABSPATH' ) ) {
    die;
}

add_action( 'before_woocommerce_init', function() {
	if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
		\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility(
            'custom_order_tables', __FILE__, true
        );
	}
} );

require_once dirname( __FILE__ ) .'/api-resource-info.php';
require_once dirname( __FILE__ ) .'/api-lastmodifiedatorafter-filter.php';
require_once dirname( __FILE__ ) .'/wc-meta-update.php';
require_once dirname( __FILE__ ) .'/api-product-extensions.php';
require_once dirname( __FILE__ ) .'/menu-shsp-connector.php';
require_once dirname( __FILE__ ) .'/api-resource-integrator.php';

?>
