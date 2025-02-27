<?php
/**
 * Plugin Name: Timologia for WooCommerce
 * Plugin URI: https://wordpress.org/plugins/timologia-for-woocommerce/
 * Description: Add invoice functionality to checkout page and adds editable fields to user profile and to order page per Greek standards
 * Author: John Athanasiou
 * Author URI: http://www.exentric.gr/
 * Version: 2.6.2
 * Text Domain: wc-timologia
 * Domain Path: /languages/
 *
 * Copyright: (c) 2015-2018, John Athanasiou (exentric.gr@gmail.com)
 *
 * License: GNU General Public License
 * License URI: http://www.gnu.org/licenses/
 *
 * @package   Timologia for WooCommerce
 * @author    John Athanasiou
 * @category  Invoice
 * @copyright Copyright (c) 2015-2018, John Athanasiou
 * @license   http://www.gnu.org/licenses/ GNU General Public License
 */


/**
 * Copyright (C) 2017 John Athanasiou <exentric.gr@gmail.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */


if (!defined('ABSPATH'))
{
	exit;
}

define( 'TEXT_DOMAIN' , 'wc-timologia' );

function tfwc_load_textdomain() {
  load_plugin_textdomain( 'wc-timologia', false, basename( dirname( __FILE__ ) ) . '/languages' ); 
}

add_action( 'init', 'tfwc_load_textdomain' );

require  __DIR__ . '/persist-admin-notices-dismissal.php';
add_action( 'admin_init', array( 'PAnD', 'init' ) );


function tfwc_admin_notice__success1() {
	if ( ! PAnD::is_admin_notice_active( 'notice-one-1' ) ) {
		return;
	}

	?>
	<div data-dismissible="notice-one-1" class="updated error notice notice-success is-dismissible">
		<p><?php _e( 'Get Timologia for WooCommerce <a target="_blank" href="https://www.exentric.gr/web-design-blog/woocommerce/woocommerce-vat-validation.htm">PRO</a> with VAT validation against the EU VIES service and AADE, and many more features.', TEXT_DOMAIN); ?></p>
	</div>
	<?php
	
}
add_action( 'admin_init', array( 'PAnD', 'init' ) );
add_action( 'admin_notices', 'tfwc_admin_notice__success1' );



function tfwc_get_keys_labels( $all = true ){
	$data = [
		'timologio' => __('INVOICE', TEXT_DOMAIN),
		'vat' 		=> __('VAT', TEXT_DOMAIN),
		'irs' 		=> __('TAX OFFICE', TEXT_DOMAIN),
		'store' 	=> __('Profession', TEXT_DOMAIN),
	];
	if( ! $all )
		unset($data['timologio']);

	return $data;
}

require  __DIR__ . '/settings.php';

add_action('admin_enqueue_scripts', 'tfwc_load_billing_fields_assets', '999');
function tfwc_load_billing_fields_assets() {
    $screen = get_current_screen();
    if (isset($screen->id) && $screen->id == 'shop_order') {
        wp_enqueue_script('billing_fields_js', plugin_dir_url(__FILE__) . 'script.js', array('jquery'), null, true);
        wp_enqueue_style('billing_fields_css', plugin_dir_url(__FILE__) . 'style.css');
    }
}


add_action('wp_enqueue_scripts', 'tfwc_load_timologia_fields_js');
function tfwc_load_timologia_fields_js() {
    if(is_cart() || is_checkout()){
        //wp_enqueue_script( 'wc-timologia', plugin_dir_url(__FILE__) . 'script.js', array('jquery'), null, true);
		wp_enqueue_script( 'wc-timologia', plugin_dir_url(__FILE__) . 'script1.js', array('jquery'), null, true);
		wp_enqueue_style('billing_fields_css', plugin_dir_url(__FILE__) . 'style.css');
    }
}


add_filter('woocommerce_admin_billing_fields', 'tfwc_add_woocommerce_admin_billing_fields');
function tfwc_add_woocommerce_admin_billing_fields($billing_fields) {
	// Loop through the (complete) keys/labels array
	foreach ( tfwc_get_keys_labels() as $key => $label ) {
	    $billing_fields[$key]['label'] = $label;
	}
    return $billing_fields;
}




// Process the checkout
add_action('woocommerce_checkout_process', 'tfwc_checkout_field_process');
function tfwc_checkout_field_process() {
	if ( $_POST['billing_timologio'] == 'Y' ) {
		// Loop through the (partial) keys/labels array
		foreach( tfwc_get_keys_labels(false) as $key => $label ){
		    // Check if set, if not avoid checkout displaying an error notice.
		    if ( ! $_POST['billing_'.$key]) {
		        wc_add_notice( sprintf( __('%s is a required field.', TEXT_DOMAIN ), $label ), 'error' );
		    }
	    }
	}
}


add_action( 'manage_shop_order_posts_custom_column', 'tfwc_icon_to_order_notes_column', 15, 1 );
function tfwc_icon_to_order_notes_column( $column ) {
    global $post, $the_order;

    // Added WC 3.2+  compatibility
    if ( $column == 'order_notes' || $column == 'order_number' ) {
        // Added WC 3+  compatibility
        $order_id = method_exists( $the_order, 'get_id' ) ? $the_order->get_id() : $the_order->id;

        $timologio = get_post_meta( $order_id, '_billing_timologio', true );
        if ( $timologio == 'Y' ) {
	        $style     = $column == 'order_notes' ? 'style="margin-top:5px;" ' : 'style="margin-left:8px;padding:5px;"';
            echo '<span class="dashicons dashicons-format-aside" '.$style.'title="'. __('INVOICE', TEXT_DOMAIN).'"></span>';
        }
    }
}


add_filter('woocommerce_found_customer_details', 'tfwc_add_woocommerce_found_customer_details', 10, 3);
function tfwc_add_woocommerce_found_customer_details($customer_data, $user_id, $type_to_load) {
    if ($type_to_load == 'billing') {
		// Loop through the (partial) keys/labels array
		foreach( tfwc_get_keys_labels(false) as $key => $label ){
	        $customer_data[$type_to_load.'_'.$key]   = get_user_meta($user_id, $type_to_load.'_'.$key, true);
        }
    }
    return $customer_data;
}


add_filter('woocommerce_billing_fields', 'tfwc_add_woocommerce_billing_fields');
function tfwc_add_woocommerce_billing_fields($billing_fields) {
	$labels = tfwc_get_keys_labels();

    $billing_fields['billing_timologio'] = array(
        'priority'    => '999',
        'type'        => 'select',
        'label'       => $labels['timologio'],
        'placeholder' => _x( $labels['timologio'], 'placeholder' ),
        'required'    => false,
        'class'       => array( 'form-row-wide', 'timologio-select' ),
        'label_class' => array( 'show-me' ),
        'clear'       => true,
        'options'     => array(
            'N' => __( 'No', TEXT_DOMAIN ),
            'Y' => __( 'Yes', TEXT_DOMAIN ),
        ),
    );

    $billing_fields['billing_vat'] = array(
        'priority'    => '1000',
        'type' => 'text',
        'label' => $labels['vat'],
        'placeholder' => _x( $labels['vat'], 'placeholder' ),
        'class' => array('form-row-first', 'timologio-hide', 'validate-required' ),
        'required' => false
    );

    $billing_fields['billing_irs'] = array(
        'priority'    => '1001',
        'type' => 'text',
        'label' => $labels['irs'],
        'placeholder' => _x( $labels['irs'], 'placeholder' ),
        'class' => array('form-row-last', 'timologio-hide', 'validate-required' ),
        'required' => false,
        'clear' => true
    );

    $billing_fields['billing_store'] = array(
        'priority'    => '1002',
	    'type' => 'text',
        'label' => $labels['store'],
        'placeholder' => _x( $labels['store'], 'placeholder' ),
        'class' => array('form-row-wide', 'timologio-hide', 'validate-required'  ),
        'required' => false,
        'clear' => true
    );

    return $billing_fields;
}


add_filter('woocommerce_customer_meta_fields', 'tfwc_add_woocommerce_customer_meta_fields');
function tfwc_add_woocommerce_customer_meta_fields($billing_fields) {
    if (isset($billing_fields['billing']['fields'])) {

	    // Loop through the (partial) keys/labels array
	    foreach( tfwc_get_keys_labels(false) as $key => $label ){
	        $billing_fields['billing']['fields']['billing_'.$key] = array(
	            'label' => $label,
	            'description' => ''
	        );
        }
    }
    return $billing_fields;
}


add_filter('woocommerce_order_formatted_billing_address', 'tfwc_add_woocommerce_order_fields', 10, 2);
function tfwc_add_woocommerce_order_fields($address, $order) {
    // Added WC 3+  compatibility
    $order_id = method_exists( $order, 'get_id' ) ? $order->get_id() : $order->id;

    // Loop through (partial) the keys/labels array (not the first entry)
    foreach( tfwc_get_keys_labels(false) as $key => $label ){
    	$address['billing_'.$key] = get_post_meta( $order_id, '_billing_'.$key, true );
    }
    return $address;
}


add_filter('woocommerce_formatted_address_replacements', 'tfwc_add_woocommerce_formatted_address_replacements', 10, 2);
function tfwc_add_woocommerce_formatted_address_replacements( $replace, $args ) {
	// The (partial) keys/labels array (not the first entry)
    $data = tfwc_get_keys_labels(false);

    $replace['{billing_vat}'] = !empty($args['billing_vat']) ? $data['vat'] .': '. $args['billing_vat'] : '';
    $replace['{billing_irs}'] = !empty($args['billing_irs']) ? $data['irs'] .': '. $args['billing_irs'] : '';
    $replace['{billing_store}'] = !empty($args['billing_store']) ? $data['store'] .': '. $args['billing_store'] : '';

    return $replace;
}


add_filter('woocommerce_localisation_address_formats', 'tfwc_add_woocommerce_localisation_address_formats', 10, 1);
function tfwc_add_woocommerce_localisation_address_formats($formats) {
    $formats['default'] = $formats['default'] . "\n{billing_vat}\n{billing_irs}\n{billing_store}";
    return $formats;
}

function tfwc_plugin_meta($links, $file) { // add some links to plugin meta row
	if ( $file == plugin_basename( __FILE__ ) ) {
		$row_meta = array(
			'DONATE PLEASE' => '<a href="https://www.paypal.me/exentric" target="_blank"><span class="dashicons dashicons-megaphone"></span> ' . __( 'MAKE DONATION' ) . '</a>',			
		);
	
		$links = array_merge( $links, $row_meta );
	}
	return (array) $links;
}
add_filter('plugin_row_meta', 'tfwc_plugin_meta', 10, 2);

add_filter( 'plugin_action_links', 'tfwc_add_action_plugin', 10, 5 );
function tfwc_add_action_plugin( $actions, $plugin_file ) 
{
	static $plugin;
	if (!isset($plugin))
		$plugin = plugin_basename(__FILE__);
	if ($plugin == $plugin_file) {
		//array_unshift($actions, "<a href=\"".menu_page_url('duplicatepost', false)."\">".esc_html__("Settings")."</a>");
			$settings = array('settings' => '<a href="admin.php?page=wc-settings&tab=settings_tab_demo">' . esc_html__('Settings') . '</a>');	
    			$actions = array_merge($settings, $actions);			
		}		
		return $actions;
}