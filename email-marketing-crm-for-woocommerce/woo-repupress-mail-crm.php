<?php
/**
 * Plugin Name: Email Marketing & CRM for WooCommerce
 * Plugin URI: http://www.RepUPress.com
 * Description: This Plugin integrates Woocommerce with the powerful Email Marketing and CRM Platform Rep U Press. Customers who make a purchase will be automatically be added to your Subscriber List and CRM.
 * Version: 1.0
 * Author: RepUPress.com
 * Author URI: http://www.RepUPress.com
 * Text Domain: woo-repupress-mail-crm
 * License: GPL2
*/

/*	Copyright 2015  RepUPress.com

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as 
	published by the Free Software Foundation.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if (!defined('ABSPATH')) exit();

if (!class_exists('Rep_Email_Hook') && in_array( 'woocommerce/woocommerce.php', apply_filters('active_plugins', get_option( 'active_plugins' ) ) ) ) :

class Rep_Email_Hook {

	const OPTION_NAME = 'woocommerce_woo-repupress-mail-crm_settings';
	
    public function __construct() {

		if (is_admin() && ( !defined( 'DOING_AJAX' ) || !DOING_AJAX ) ) {
			// Add settings fields for this plugin to the WooCommerce Settings Integration tab
			add_action( 'plugins_loaded', array( $this, 'init_integration' ) );
			// Add the settings link to the plugins page
			add_filter( 'plugin_action_links_'.plugin_basename(__FILE__), array ($this, 'settings_link'));
			// Add custom 'tag' field to the Advanced Product data section of WooCommerce
			add_action( 'woocommerce_product_options_advanced', array ($this, 'product_advanced_field'));
			add_action( 'woocommerce_process_product_meta', array ($this, 'custom_product_fields_save')); 
		}
		// Call the Rep U Press API whenever an order status is changed
		add_action('woocommerce_order_status_changed', array ($this, 'order_status_change'), 10, 3);
		add_action('woocommerce_checkout_update_order_meta', array ($this, 'order_created'), 10, 1);
		add_action('plugins_loaded', array($this, 'load_plugin_textdomain'));
    }

	public function load_plugin_textdomain() {
		load_plugin_textdomain( 'woo-repupress-mail-crm', false, basename(dirname(__FILE__)) . '/languages/' );
	}

	public function init_integration() {
		if ( class_exists( 'WC_Integration' ) )
			add_filter( 'woocommerce_integrations', array( $this, 'add_integration' ) );
	}

	public function add_integration( $integrations ) {
		include_once 'includes/settings.php';
		$integrations[] = 'Woo_Repupress_Mail_CRM';
		return $integrations;
	}
	
    public function settings_link($links) {
        array_unshift($links, '<a href="admin.php?page=wc-settings&tab=integration">Settings</a>'); 
        return $links;
    }
	
	public function product_advanced_field() {
		// Could modify to check only for simple product
		echo '<div class="options_group">';
		woocommerce_wp_text_input(array(
			'id' 			=> 'activecampaign_tag',
			'label' 		=> __( 'Rep U Press Tag', 'woo-repupress-mail-crm' ),
			'desc_tip' 		=> 'true',
			'description' 	=> __( 'Contact will be given this tag within Rep U Press when an order is completed', 'woo-repupress-mail-crm' )));
		echo '</div>';
	  }

	public function custom_product_fields_save( $post_id ){
		$woocommerce_text_field = $_POST['activecampaign_tag'];
		if( isset( $woocommerce_text_field ) )
			update_post_meta( $post_id, 'activecampaign_tag', esc_attr( $woocommerce_text_field ) );
	}

	// This function is called whenever a WooCommerce order is created
	public function order_created ($order_id) {
		$order = new WC_Order( $order_id );
		$this->order_status_change ($order_id, null, $order->status);
	}
	
	// This function is called whenever a WooCommerce order status is changed
	public function order_status_change ($order_id, $old_status, $new_status) {
		$valid_order = true;
		$log_message = array();

		// Get the plugin settings and order details
		$options = get_option( self::OPTION_NAME, null );
		$default_tags = implode(',',array_map('trim', explode(',', $options['ac_default_tag'])));
		$last_default_tag = end(explode(',',$default_tags));
		$logging_enabled = $options['wc_ac_notification'];
		$add_on_processing = $options['wc_ac_addonprocessing'];
		$order_tracking = $options['wc_ac_ordertracking'];
		$valid_status = array('pending', 'failed','processing','on-hold','cancelled');
		
		if ($new_status == 'completed' || ($new_status == 'processing' && $add_on_processing == 'yes') || (in_array($new_status,$valid_status) && $order_tracking == 'yes')) {
			$order = new WC_Order( $order_id );

			// Add the product tags for any of the items on the order
			$items = $order->get_items();
			if ($order_tracking == 'yes') {
				$order_tracking_tag = ($new_status != 'completed') ? ' ('.$new_status.')' : null;
				$tags = $last_default_tag ? $default_tags.' ('.$new_status.')' : null;
			}
			else $tags = $default_tags;
			foreach ($items as $item) {
				$product_tag = get_post_meta( $item['product_id'], 'activecampaign_tag', true );
				$product_tag = implode(',',array_map('trim', explode(',', $product_tag)));
				$last_product_tag = end(explode(',',$product_tag));
				$tags .= ','.(($last_product_tag) ? $product_tag.$order_tracking_tag : $product_tag);
			}
			// eMail is the key on Rep U Press so should be validated
			if (!is_email ($order->billing_email)) {
				$valid_order = false;
				$log_message[] = sprintf( __( 'Error: Invalid customer (billing) email address = %s', 'woo-repupress-mail-crm' ), $order->billing_email);
			}

			// The order details are used to make a call using the Rep U Press API to add/update a customer contact
			if ($valid_order) {
				include_once('includes/sync-contact.php');
				$api = new WC_AC_Hook_Sync($options);
				$contact = array(
					'email' 				=> $order->billing_email,
					'first_name'			=> $order->billing_first_name,
					'last_name' 			=> $order->billing_last_name,
					'tags' 					=> $tags,
					'phone' 				=> $order->billing_phone);
				$api->sync_contact($contact);
				if ($order_tracking == 'yes') {
					if ($last_default_tag) {
						foreach ($valid_status as $status) {
							if ($status==$new_status) continue;
							$tags_to_remove[] = $last_default_tag.' ('.$status.')';
						}
						if ($new_status!='completed') $tags_to_remove[] = $last_default_tag.' (completed)';
					}
					foreach ($items as $item) {
						$product_tag = get_post_meta( $item['product_id'], 'activecampaign_tag', true );
						$last_product_tag = trim(end(explode(',',$product_tag)));
						if ($last_product_tag) {
							foreach ($valid_status as $status) {
								if ($status==$new_status) continue;
								$tags_to_remove[] = $last_product_tag.' ('.$status.')';
							}
						}
					}
					if ($tags_to_remove) {
						$contact_tag_remove = array(
							'email'			=> $order->billing_email,
							'tags' 			=> $tags_to_remove);
						$api->remove_tags($contact_tag_remove);
					}
				}
				$log_message = $api->log_message;
			}
		}
	
		if ($logging_enabled != 'no') {
			$log = new WC_Logger();
			$log_string = sprintf( __( 'Order ID = %s (Status = %s).', 'woo-repupress-mail-crm' ), $order_id, $new_status);
			foreach ($log_message as $value) $log_string .= ' '.$value;
			$log->add( 'woo-repupress-mail-crm', $log_string);
		}
		
	}
	
}

new Rep_Email_Hook();

endif;
?>