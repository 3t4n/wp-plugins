<?php

/**
 * Plugin Name: AS Order Tracking
 * Plugin URI:
 * Description: Send Email with Tracking link to customer for WooCommerce 
 * Version:     1.0.0
 * Author:      Akshar Soft Solutions
 * Author URI:  https://aksharsoftsolutions.com/
 * License:     GPLv2
 * Text Domain: as-order-tracking
 * Domain Path: /languages
 * WC requires at least: 8.0.0
 * WC tested up to: 9.3.3
 * @link -
 *
 * @package ASOT
 * @version 1.0
 */

/**
 * Copyright (c) 2024 Akshar Soft Solutions ( email : contact@aksharsoftsolutions.com )
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2 or, at
 * your discretion, any later version, as published by the Free
 * Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * 
 */


if (! defined('ABSPATH')) {
	exit;
}

if (! class_exists('AS_Woocommerce_Order_Tracking')) {

	/**
	 * AS_Woocommerce_Order_Tracking main class.
	 */
	class AS_Woocommerce_Order_Tracking
	{

		/**
		 * Plugin version.
		 *
		 * @var string
		 */
		const VERSION = '1.0.0';

		/**
		 * Instance of this class.
		 *
		 * @var object
		 */
		private static $instance;

		/**
		 * URL of plugin directory
		 *
		 * @var string
		 */
		protected $url = '';

		/**
		 * Path of plugin directory
		 *
		 * @var string
		 */
		protected $path = '';

		/**
		 * Plugin basename
		 *
		 * @var string
		 */
		protected $basename = '';

	
		/**
		 * Provider list
		 *
		 * @var array
		 */
		public $order_status = array();

		/**
		 * Initialize the plugin.
		 */
		public function __construct()
		{

			$this->basename       = dirname(plugin_basename(__FILE__));
			$this->url            = plugin_dir_url(__FILE__);
			$this->path           = plugin_dir_path(__FILE__);
			$this->order_status   = get_option('as_order_status') ? str_replace('wc-', '', get_option('as_order_status')) : 'completed';

			add_action('plugins_loaded', array($this, 'as_add_hooks'));

			load_plugin_textdomain('as-order-tracking', false,  $this->basename . '/languages/');

			register_activation_hook(__FILE__, array($this, 'as_plugin_activate'));
			register_deactivation_hook(__FILE__, array($this, 'as_plugin_deactivate'));
		}

		/**
		 * Return an instance of this class.
		 *
		 * @return object A single instance of this class.
		 */
		public static function as_get_instance()
		{
			if (! isset(self::$instance)) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Add hooks and filters
		 *
		 * @return void
		 */
		public function as_add_hooks()
		{
		    add_action('before_woocommerce_init', array($this, 'my_custom_order_tracking'));
			add_action('add_meta_boxes', array($this, 'as_adding_meta_boxes'), 20, 2);
			add_action('save_post', array($this, 'as_save_meta_boxes'));
			add_action('admin_enqueue_scripts', array($this, 'as_register_script'));
			add_action('wp_ajax_as_send_tracking', array($this, 'as_send_tracking'));
			add_action('woocommerce_email_order_meta', array($this, 'as_add_order_email_shipment_tracking'), 10, 2);
			add_action('woocommerce_settings_tabs_as_order_tracking', array($this, 'as_settings_tab'));
			add_action('woocommerce_update_options_as_order_tracking', array($this, 'as_update_settings'));
			add_filter('woocommerce_settings_tabs_array', array($this, 'as_add_settings_tab'), 50);

			add_action('woocommerce_order_details_after_order_table', array($this, 'as_add_order_shipment_tracking'), 5);
			if (!function_exists('WC')) {
				add_action('admin_notices', array($this, 'as_admin_notice_error'));
			}
		}

		public function my_custom_order_tracking() {
			if (class_exists(\Automattic\WooCommerce\Utilities\FeaturesUtil::class)) {
				\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility('custom_order_tables', __FILE__, true);
			}
		}

		/**
		 * Activate the plugin
		 *
		 * @return void
		 */
		public function as_plugin_activate()
		{
			do_action('as_order_traking_plugin_activate');
		}

		/**
		 * Deactivate the plugin
		 * Uninstall routines should be in uninstall.php
		 *
		 * @return void
		 */
		public function as_plugin_deactivate() {
			do_action('as_order_traking_plugin_deactivate');
		}

		/**
		 * Enqueue scripts
		 */
		public function as_register_script()
		{

			wp_enqueue_style('as_order_tracking-style', $this->url . 'css/style.css', array());

			wp_enqueue_script('jquery-ui-datepicker');
			wp_enqueue_script('jquery-ui-sortable');

			wp_enqueue_script('as_order_tracking-functions', $this->url . 'js/functions.js', array('jquery'), false, true);
			wp_localize_script('as_order_tracking-functions', 'ASOT', array(
				'ajaxurl'          => admin_url('admin-ajax.php'),
				// 'provider_name'    => __('Provider name', 'as-order-tracking'),
				'tracking_url'     => __('Tracking URL', 'as-order-tracking'),
				'add_tracking_url' => __('Add a tracking number to the URL', 'as-order-tracking'),
				'delete'           => __('Delete', 'as-order-tracking'),
				'close'            => __('Close', 'as-order-tracking'),
				'update'           => __('Update', 'as-order-tracking'),
				'order_action'     => 'wc-' . $this->order_status,
				'notice'           => __('Order tracking sended.', 'as-order-tracking'),
			));
		}

		/**
		 * AJAX handler
		 *
		 * post submissions tracking.
		 *
		 **/
		public function as_send_tracking()
		{

			check_ajax_referer('as_shipment_tracking_data', 'as_shipment_tracking_nonce');

			$return = array();
			$errors = false;

			$post_id          = sanitize_text_field(wp_unslash(isset($_POST["as_order_ID"]) ? $_POST["as_order_ID"] : ""));
			$tracking_number  = sanitize_text_field(wp_unslash(isset($_POST["as_tracking_number"]) ? $_POST["as_tracking_number"] : ""));
			$date_shipped     = sanitize_text_field(wp_unslash(isset($_POST["as_date_shipped"]) ? $_POST["as_date_shipped"] : ""));

			$order = wc_get_order($post_id);

			if ($order) {
				$order->update_meta_data('as_tracking_number', $tracking_number);
				$order->update_meta_data('as_date_shipped', $date_shipped);

				$order->save();
			}
			
			if ('' == $tracking_number) {
				$errors = true;
				$return['msg'] .= __('Please enter a tracking number', 'as-order-tracking') . "\n";
			}
			if ('' == $date_shipped) {
				$errors = true;
				$return['msg'] .= __('Please enter a date', 'as-order-tracking') . "\n";
			}

			if ($errors == false) {
				$order = new WC_Order($post_id);
				$order->update_status($this->order_status);
			}


			$return['errors'] = $errors;

			wp_send_json($return);
		}

		/**
		 * WooCommerce fallback notice.
		 *
		 * @return string
		 */

		public function as_admin_notice_error()
		{

			$class = 'notice notice-error';
			$message = esc_html__('AS Order Tracking is enabled but not effective. It requires WooCommerce in order to work.', 'as-order-tracking');

			printf('<div class="%1$s"><p>%2$s</p></div>', esc_attr($class), esc_html($message));
		}

		/**
		 * Store custom field meta box data
		 *
		 * @param int $post_id The post ID.
		 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/save_post
		 */
		public function as_save_meta_boxes($post_id)
		{

			if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

			if (isset($_POST['as_shipment_tracking_nonce']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['as_shipment_tracking_nonce'])), 'as_shipment_tracking_data')) return;

			if (! current_user_can('edit_post', $post_id)) return;

			$order = wc_get_order($post_id);

			if ($order) {
				if (isset($_POST['as_tracking_number'])) {
					$order->update_meta_data('as_tracking_number', sanitize_text_field(wp_unslash($_POST['as_tracking_number'])));
				}

				if (isset($_POST['as_date_shipped'])) {
					$order->update_meta_data('as_date_shipped', sanitize_text_field(wp_unslash($_POST['as_date_shipped'])));
				}

				if (isset($_POST['as_tracking_number']) || isset($_POST['as_date_shipped']) ){
					$order->save();
				}
			}

		}

		/**
		 * Add meta box
		 *
		 * @param post $post The post object
		 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/add_meta_boxes
		 */

		public function as_adding_meta_boxes($post_type, $post)
		{
			add_meta_box(
				'as-shipment-tracking',
				__('Shipment Tracking', 'as-order-tracking'),
				array($this, 'as_meta_boxes_callback'),
				wc_get_page_screen_id('shop-order'),
				'side',
				'high'
			);
		}

		/**
		 * Get all the settings for this plugin for @see woocommerce_admin_fields() function.
		 *
		 * @return array Array of settings for @see woocommerce_admin_fields() function.
		 */
		public function as_get_settings()
		{

			$statuses = wc_get_order_statuses();

			unset($statuses['wc-pending'], $statuses['wc-on-hold'], $statuses['wc-processing'], $statuses['wc-cancelled'], $statuses['wc-refunded'], $statuses['wc-pending_refund'], $statuses['wc-failed']);

			$settings = array(
				array(
					'name'     => __('Email setting', 'as-order-tracking'),
					'type'     => 'title',
					'desc'     => '',
					'id'       => 'as_title'
				),
				array(
					'name'    => __('Email sender order status', 'as-order-tracking'),
					'type'    => 'select',
					'id'      => 'as_order_status',
					'default' => 'wc-completed',
					'options' => $statuses,
				),
				array(
					'name' => __('Email description', 'as-order-tracking'),
					'type' => 'textarea',
					'id'   => 'as_email_description'
				),
				array(
					'type' => 'sectionend',
					'id' => 'as_section_end'
				)
			);

			return apply_filters('as_tab_settings', $settings);
		}

		/**
		 * Add a new settings tab to the WooCommerce settings tabs array.
		 *
		 * @param array $settings_tabs Array of WooCommerce setting tabs & their labels, excluding the Subscription tab.
		 * @return array $settings_tabs Array of WooCommerce setting tabs & their labels, including the Subscription tab.
		 */
		public function as_add_settings_tab($settings_tabs)
		{

			$settings_tabs['as_order_tracking'] = __('Order Tracking', 'as-order-tracking');
			return $settings_tabs;
		}

		/**
		 * Uses the WooCommerce options API to save settings via the @see woocommerce_update_options() function.
		 *
		 * @uses woocommerce_update_options()
		 * @uses ::as_get_settings()
		 */
		public function as_update_settings()
		{
			woocommerce_update_options(self::as_get_settings());
		}

		public function as_validate($order_id)
		{

			$order = wc_get_order($order_id);

			if ($order->get_meta('as_tracking_number') == ''
				|| $order->get_meta('as_date_shipped') == ''
			) {
				return false;
			} else {
				return true;
			}

		}


		/**
		 * Build custom field meta box
		 *
		 * @param post $post The post object
		 */
		public function as_meta_boxes_callback($post)
		{
			wp_nonce_field('as_shipment_tracking_data', 'as_shipment_tracking_nonce');

			$order = wc_get_order( $post->ID );

			$tracking_number = $order->get_meta( 'as_tracking_number' );
			$date_shipped    = $order->get_meta( 'as_date_shipped' );

			$date_today = gmdate(get_option('date_format'), current_time('timestamp')); ?>

			<p>
				<label for="as_tracking_number"><strong><?php esc_html_e('Tracking URL', 'as-order-tracking'); ?> :</strong></label>
				<input type="text" class="widefat as-field" name="as_tracking_number" id="as_tracking_number" value="<?php echo esc_attr($tracking_number);?>" />
			</p>

			<p>
				<label for="as_date_shipped"><strong><?php esc_html_e('Date shipped', 'as-order-tracking'); ?> :</strong></label>
				<input type="text" class="widefat as-field" name="as_date_shipped" id="as_date_shipped"
					value="<?php echo esc_attr($date_shipped ? $date_shipped : $date_today); ?>" />
			</p>

			<input type="hidden" class="as-field" name="as_order_ID" value="<?php echo $post->ID ?>" />

			<div class="control-actions">
				<div class="alignright">
					<button class="button button-primary right " id="save_send">
						<?php echo ($this->as_validate($post->ID) ? esc_html__('Save', 'as-order-tracking') : esc_html__('Save and Send', 'as-order-tracking')); ?>
					</button>
					<span class="spinner"></span>
				</div>
				<br class="clear">
			</div>

		<?php
		}

		/**
		 * Uses the WooCommerce admin fields
		 * @uses self::as_get_settings()
		 */
		public function as_settings_tab()
		{  
		    woocommerce_admin_fields(self::as_get_settings());
		}

		public function as_get_shipping($order_id)
		{
			

			if (! $this->as_validate($order_id)) return false;

			$order = wc_get_order($order_id);

			$tracking_number = $order->get_meta('as_tracking_number');
			$date_shipped    = $order->get_meta('as_date_shipped');

			return array(
				'tracking_number' =>  $tracking_number,
				'date_shipped'    => date_i18n(get_option('date_format'), strtotime($date_shipped)),
			);
		}

		public function as_add_order_email_shipment_tracking($order, $sent_to_admin)
		{
			if (! $sent_to_admin && $this->order_status == $order->status && $shipping = $this->as_get_shipping($order->id)) : ?>

				<h2><?php esc_html_e('Shipping information', 'as-order-tracking') ?></h2>
				<p><?php echo esc_html(wpautop(get_option('as_email_description'))); ?></p>
				<table class="td" cellspacing="0" cellpadding="6" style="width: 100%; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif; margin-bottom: 40px;" border="1">
					<thead>
						<tr>
							<th class="td" scope="col" style="text-align:left;"><?php esc_html_e('Date shipped', 'as-order-tracking') ?></th>
							<th class="td" scope="col" style="text-align:left;">#</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php echo esc_html($shipping['date_shipped']); ?></td>
							<td><a href="<?php echo esc_url($shipping['tracking_number']); ?>" target="_blank"><?php esc_html_e('Track & Trace', 'as-order-tracking'); ?></a></td>
						</tr>
					</tbody>
				</table>

			<?php endif;
		}

		public function as_add_order_shipment_tracking($order)
		{
			
			if ($this->order_status == $order->status && $shipping = $this->as_get_shipping($order->id)) : ?>

				<h2><?php esc_html_e('Shipping information', 'as-order-tracking') ?></h2>
				<table class="shop_table shop_table_responsive">
					<thead>
						<tr>
							<th class=""><?php esc_html_e('Date shipped', 'as-order-tracking') ?></th>
							<th><?php esc_html_e('#', 'as-order-tracking'); ?></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td data-title="<?php esc_html_e('Date shipped', 'as-order-tracking') ?>"><?php echo esc_html($shipping['date_shipped']); ?></td>
							<td data-title="#"><a href="<?php echo esc_url($shipping['tracking_number']); ?>" target="_blank"><?php esc_html_e('Track & Trace', 'as-order-tracking') ?></a></td>
						</tr>
					</tbody>
				</table>

			<?php endif; ?>

<?php }
	}

	AS_Woocommerce_Order_Tracking::as_get_instance();
}
