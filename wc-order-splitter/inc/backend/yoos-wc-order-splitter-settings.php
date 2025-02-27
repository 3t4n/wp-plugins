<?php

defined('ABSPATH') || exit;

class WooCommerce_Order_Splitter_Settings {

	private $version = '1.3.2';

	public function __construct() {
		add_filter('woocommerce_settings_tabs_array', array($this, 'add_orders_settings_tab'), 30);
		add_action('woocommerce_settings_tabs_orders', array($this, 'order_splitter_settings_tab'), 9);
		add_action('woocommerce_update_options_orders', array($this, 'update_order_splitter_settings'));
		register_activation_hook(__FILE__, array($this, 'set_default_settings'));
		register_activation_hook(__FILE__, array($this, 'on_activation'));
		add_action('plugins_loaded', array($this, 'check_for_updates'));
		add_action('admin_footer', array($this, 'wc_order_splitter_add_custom_class_settings_page'));

		if (class_exists('WC_Order_Cancellation_Return_Premium_Settings')) {
			$wc_order_cancel_return_settings = new WC_Order_Cancellation_Return_Premium_Settings();
		} elseif (class_exists('WC_Order_Cancellation_Return_Settings')) {
			$wc_order_cancel_return_settings = new WC_Order_Cancellation_Return_Settings();
		}

		if (isset($wc_order_cancel_return_settings)) {
			add_action('woocommerce_admin_field_available_time', array($wc_order_cancel_return_settings, 'render_available_time_field'));
		}
	}

	public function add_orders_settings_tab($settings_tabs) {
		$settings_tabs['orders'] = esc_html__('Orders', 'wc-order-splitter');
		return $settings_tabs;
	}

	public function order_splitter_settings_tab() {
		$current_section = isset($_GET['section']) ? sanitize_text_field($_GET['section']) : 'order_splitter';

		echo '<ul class="subsubsub">';
		$this->output_sub_sub_tabs($current_section);
		echo '</ul><br class="clear" />
			<p>Please support us by <a href="https://wordpress.org/plugins/wc-order-splitter/#reviews" target="_blank">leaving a review</a> <span style="color: #e26f56;">&#9733;&#9733;&#9733;&#9733;&#9733;</span> to keep updating & improving.</p>';

		if ('automation_splitter' === $current_section) {
			$this->output_automation_splitter_settings();
		} elseif ('cancel_return' === $current_section) {
			$this->output_cancel_return_settings();
		} elseif ('notifications' === $current_section) {
			$this->output_notifications_settings();
		} else {
			$this->output_order_splitter_settings();
		}
	}

	public function output_sub_sub_tabs($current_section) {
		$sub_sub_tabs = array(
			'order_splitter' => esc_html__('General', 'wc-order-splitter'),
			'automation_splitter' => esc_html__('Automation', 'wc-order-splitter')
		);

		if (
			(is_plugin_active('wc-order-cancellation-return/wc-order-cancellation-return.php') || 
			(is_plugin_active('wc-order-cancellation-return-premium/wc-order-cancellation-return-premium.php') && 
			get_option('wc_order_cancellation_return_premium_license_status') === 'activated'))
		) {
			$sub_sub_tabs['cancel_return'] = esc_html__('Cancel & Return', 'wc-order-splitter');
		}

		$sub_sub_tabs['notifications'] = esc_html__('Notifications', 'wc-order-splitter');
		
		$count = count($sub_sub_tabs);
		$i = 1;

		foreach ($sub_sub_tabs as $section_id => $section_label) {
			$class = ($current_section === $section_id) ? 'current' : '';
			echo '<li><a href="' . admin_url('admin.php?page=wc-settings&tab=orders&section=' . $section_id) . '" class="' . $class . '">' . $section_label . '</a>';
			if ($i < $count) {
				echo ' | ';
			}
			echo '</li>';
			$i++;
		}
	}

	public function output_order_splitter_settings() {
		woocommerce_admin_fields($this->get_split_order_settings());
		woocommerce_admin_fields($this->get_duplicate_order_settings());
		woocommerce_admin_fields($this->get_advanced_settings());
	}

	public function output_automation_splitter_settings() {
		woocommerce_admin_fields($this->get_automation_splitter_settings());
	}

	public function output_notifications_settings() {
		woocommerce_admin_fields($this->get_notifications_settings());
	}

	public function output_cancel_return_settings() {
		if (class_exists('WC_Order_Cancellation_Return_Premium_Settings')) {
			// If the premium class exists, use it
			$wc_order_cancel_return_settings = new WC_Order_Cancellation_Return_Premium_Settings();
		} elseif (class_exists('WC_Order_Cancellation_Return_Settings')) {
			// If the regular class exists, use it
			$wc_order_cancel_return_settings = new WC_Order_Cancellation_Return_Settings();
		} else {
			// If neither plugin is active, display a notice
			echo '<div class="notice notice-error"><p>' . esc_html__('The Cancel / Return plugin is not activated.', 'wc-order-splitter') . '</p></div>';
			return;
		}

		// Output cancel and return order settings from the appropriate plugin
		if (isset($wc_order_cancel_return_settings)) {
			$wc_order_cancel_return_settings->yoocr_wc_order_cancellation_return_settings_orders_add_cancellation_section();
			$wc_order_cancel_return_settings->yoocr_wc_order_cancellation_return_settings_orders_add_return_section();
		}
	}

	public function get_split_order_settings() {
		if (current_user_can('shop_manager') && get_option('order_splitter_shop_manager_permission', 'no') === 'no') {
			echo '<div class="notice notice-error"><p>' . esc_html__('You are not allowed to access Order Splitter settings.', 'wc-order-splitter') . '</p></div>';
			return array();
		}
		
		$settings = array(
			'section_title' => array(
				'name'     => esc_html__('Split orders', 'wc-order-splitter'),
				'type'     => 'title',
				'id'       => 'order_splitter_section_title',
			),
			'order_status' => array(
				'name'     => esc_html__('Allowed status', 'wc-order-splitter'),
				'type'     => 'multiselect',
				'desc_tip' => esc_html__('Choose order statuses that allow for splitting and duplication.', 'wc-order-splitter'),
				'id'       => 'order_splitter_status_allowed',
				'options'  => wc_get_order_statuses(),
				'default'  => array('wc-processing'),
				'custom_attributes' => array(
					'data-placeholder' => esc_html__('Select order statuses', 'wc-order-splitter')
				),
				'class'    => 'wc-enhanced-select',
				'css'      => 'min-width:300px;',
			),
			'exclude_shipping' => array(
				'name'     => esc_html__('Excluded fee', 'wc-order-splitter'),
				'type'     => 'checkbox',
				'desc'     => esc_html__('Exclude shipping fees for the split order.', 'wc-order-splitter'),
				'id'       => 'order_splitter_exclude_shipping_fee',
				'default'  => 'no',
			),
			'product_tag' => array(
				'name'     => esc_html__('Product tags ', 'wc-order-splitter'),
				'type'     => 'text',
				'id'       => 'product_tag',
				'desc'     => '<a href="https://yoohw.com/product/woocommerce-order-splitter-premium/" target="_blank" class="premium-label">Upgrade</a>',
				'desc_tip'     => esc_html__('Select product tags can be split. You have to create the product tags before can set them here.', 'wc-order-splitter'),
				'placeholder' => esc_html__('Select product tags', 'wc-order-splitter'),
				'custom_attributes' => array(
					'disabled' => 'disabled',
				),
			),
			'product_attribute' => array(
				'name'     => esc_html__('Product attribute ', 'wc-order-splitter'),
				'type'     => 'text',
				'id'       => 'product_tag',
				'desc'     => '<a href="https://yoohw.com/product/woocommerce-order-splitter-premium/" target="_blank" class="premium-label">Upgrade</a>',
				'desc_tip'     => esc_html__('Select product attribute can be split. You have to create the product attribute before can set them here.', 'wc-order-splitter'),
				'placeholder' => esc_html__('Select product attribute', 'wc-order-splitter'),
				'custom_attributes' => array(
					'disabled' => 'disabled',
				),
			),
			'section_end' => array(
				'type' => 'sectionend',
				'id'   => 'order_splitter_section_end'
			)
		);
		return apply_filters('order_splitter_settings', $settings);
	}

	public function get_duplicate_order_settings() {
		if (current_user_can('shop_manager') && get_option('order_splitter_shop_manager_permission', 'no') === 'no') {
			return;
		}

		$settings = array(
			'section_title' => array(
				'name'     => esc_html__('Duplicate orders', 'wc-order-splitter'),
				'type'     => 'title',
				'id'       => 'duplicate_order_section_title'
			),
			'status_allowed' => array(
				'name'     => esc_html__('Allowed status', 'wc-order-splitter'),
				'type'     => 'text',
				'desc'     => '<a href="https://yoohw.com/product/woocommerce-order-splitter-premium/" target="_blank" class="premium-label">Upgrade</a>',
				'desc_tip' => esc_html__('Choose order statuses that allow for duplication.', 'wc-order-splitter'),
				'id'       => 'duplicate_status',
				'placeholder' => esc_html__('Select order statuses', 'wc-order-splitter'),
				'custom_attributes' => array(
					'disabled' => 'disabled',
				),
			),
			'new_status' => array(
				'name'     => esc_html__('Duplicated status', 'wc-order-splitter'),
				'type'     => 'text',
				'desc'     => '<a href="https://yoohw.com/product/woocommerce-order-splitter-premium/" target="_blank" class="premium-label">Upgrade</a>',
				'desc_tip' => esc_html__('Choose order status that the new order should be.', 'wc-order-splitter'),
				'id'       => 'duplicate_status',
				'placeholder' => esc_html__('Select order statuses', 'wc-order-splitter'),
				'custom_attributes' => array(
					'disabled' => 'disabled',
				),
			),
			'section_end' => array(
				'type' => 'sectionend',
				'id'   => 'duplicate_order_section_end'
			)
		);
		return apply_filters('duplicate_order_settings', $settings);
	}

	public function get_advanced_settings() {
		if (current_user_can('shop_manager') && get_option('order_splitter_shop_manager_permission', 'no') === 'no') {
			return;
		}

		$settings = array(
			'section_title' => array(
				'name'     => esc_html__('Advanced', 'wc-order-splitter'),
				'type'     => 'title',
				'id'       => 'advanced_order_splitter_section_title'
			),
			'editable_status' => array(
				'name'     => esc_html__('Editable orders', 'wc-order-splitter'),
				'type'     => 'text',
				'desc'     => '<a href="https://yoohw.com/product/woocommerce-order-splitter-premium/" target="_blank" class="premium-label">Upgrade</a>',
				'desc_tip' => esc_html__('Choose order statuses that allow to edit.', 'wc-order-splitter'),
				'id'       => 'editable_status',
				'placeholder' => esc_html__('Select order statuses', 'wc-order-splitter'),
				'custom_attributes' => array(
					'disabled' => 'disabled',
				),
			),
			'order_label' => array(
				'name'     => esc_html__('Order labels', 'wc-order-splitter'),
				'type'     => 'checkbox',
				'desc'     => esc_html__('Enable the labels for split orders.', 'wc-order-splitter'),
				'id'       => 'order_splitter_order_label',
				'default'  => 'yes',
			),
			'allow_split_orders' => array(
				'name'     => esc_html__('Permission', 'wc-order-splitter'),
				'type'     => 'checkbox',
				'desc'     => esc_html__('Enable the shop manager to split orders.', 'wc-order-splitter'),
				'id'       => 'order_splitter_shop_manager_permission',
				'default'  => 'no',
			),
			'section_end' => array(
				'type' => 'sectionend',
				'id'   => 'advanced_order_splitter_section_end'
			)
		);
		return apply_filters('advanced_settings', $settings);
	}

	public function get_automation_splitter_settings() {
		if (current_user_can('shop_manager') && get_option('order_splitter_shop_manager_permission', 'no') === 'no') {
			echo '<div class="notice notice-error"><p>' . esc_html__('You are not allowed to access Order Splitter settings.', 'wc-order-splitter') . '</p></div>';
			return array();
		}

		$settings = array(
			'section_title' => array(
				'name'     => esc_html__('Automation Splitter', 'wc-order-splitter'),
				'type'     => 'title',
				'id'       => 'automation_splitter_section_title'
			),
			'enable_automation' => array(
				'name'     => esc_html__('Enable automation', 'wc-order-splitter'),
				'type'     => 'checkbox',
				'desc'     => esc_html__('Automate splitting an order right after it has been placed.', 'wc-order-splitter'),
				'desc_tip'     => '<a href="https://yoohw.com/product/woocommerce-order-splitter-premium/" target="_blank" class="premium-label">Upgrade</a>',
				'id'       => 'automation_splitter',
				'custom_attributes' => array(
					'disabled' => 'disabled',
				),
			),
			'automation_mode' => array(
				'name'     => esc_html__('Automation mode', 'wc-order-splitter'),
				'type'     => 'text',
				'desc'     => '<a href="https://yoohw.com/product/woocommerce-order-splitter-premium/" target="_blank" class="premium-label">Upgrade</a>',
				'desc_tip' => esc_html__('Select the mode to automate splitting when an order has been placed.', 'wc-order-splitter'),
				'placeholder' => esc_html__('Select a mode', 'wc-order-splitter'),
				'id'       => 'automation_splitter',
				'custom_attributes' => array(
					'disabled' => 'disabled',
				),
			),
			'automation_timer' => array(
				'name'     => esc_html__('Delay timer', 'wc-order-splitter'),
				'type'     => 'text',
				'desc'     => '<a href="https://yoohw.com/product/woocommerce-order-splitter-premium/" target="_blank" class="premium-label">Upgrade</a>',
				'desc_tip'     => esc_html__('Enter how many seconds to be delayed to automate splitting orders.', 'wc-order-splitter'),
				'id'       => 'automation_splitter',
				'default'  => '5',
				'css'      => 'max-width: 70px;',
				'custom_attributes' => array(
					'disabled' => 'disabled',
				),
			),
			'section_end' => array(
				'type' => 'sectionend',
				'id'   => 'automation_splitter_section_end'
			)
		);

		return apply_filters('automation_splitter_settings', $settings);
	}

	public function get_notifications_settings() {
		if (current_user_can('shop_manager') && get_option('order_splitter_shop_manager_permission', 'no') === 'no') {
			return;
		}

		$settings = array(
			'section_title' => array(
				'name'     => esc_html__('Split order email', 'wc-order-splitter'),
				'type'     => 'title',
				'id'       => 'notifications_order_splitter_section_title'
			),
			'split_email_customer' => array(
				'name'     => esc_html__('Email to customer', 'wc-order-splitter'),
				'type'     => 'checkbox',
				'desc'     => esc_html__('Enable sending split order emails to the customer.', 'wc-order-splitter'),
				'desc_tip'     => '<a href="https://yoohw.com/product/woocommerce-order-splitter-premium/" target="_blank" class="premium-label">Upgrade</a>',
				'id'       => 'notifications',
				'default'  => 'no',
				'custom_attributes' => array(
					'disabled' => 'disabled',
				),
			),
			'automate_category_message' => array(
				'name'     => esc_html__('Split by category notice', 'wc-order-splitter'),
				'type'     => 'textarea',
				'desc'     => '<a href="https://yoohw.com/product/woocommerce-order-splitter-premium/" target="_blank" class="premium-label">Upgrade</a>',
				'desc_tip'     => esc_html__('Enter the notice message you want to display in the new order email to the customer when the order is automating split by category.', 'wc-order-splitter'),
				'id'       => 'notifications',
				'default'  => esc_html__('To ensure quicker processing, your order has been divided into categories.', 'wc-order-splitter'),
				'custom_attributes' => array(
					'disabled' => 'disabled',
				),
			),
			'automate_onbackorder_message' => array(
				'name'     => esc_html__('Split by stock status notice', 'wc-order-splitter'),
				'type'     => 'textarea',
				'desc'     => '<a href="https://yoohw.com/product/woocommerce-order-splitter-premium/" target="_blank" class="premium-label">Upgrade</a>',
				'desc_tip'     => esc_html__('Enter the notice message you want to display in the new order email to the customer when the order is automating split by stock status.', 'wc-order-splitter'),
				'id'       => 'notifications',
				'default'  => esc_html__('To ensure quicker processing, your order has been divided into product stock statuses.', 'wc-order-splitter'),
				'custom_attributes' => array(
					'disabled' => 'disabled',
				),
			),
			'automate_tag_message' => array(
				'name'     => esc_html__('Split by tag notice', 'wc-order-splitter'),
				'type'     => 'textarea',
				'desc'     => '<a href="https://yoohw.com/product/woocommerce-order-splitter-premium/" target="_blank" class="premium-label">Upgrade</a>',
				'desc_tip'     => esc_html__('Enter the notice message you want to display in the new order email to the customer when the order is automating split by tag.', 'wc-order-splitter'),
				'id'       => 'notifications',
				'default'  => esc_html__('To ensure quicker processing, your order has been divided into product tags.', 'wc-order-splitter'),
				'custom_attributes' => array(
					'disabled' => 'disabled',
				),
			),
			'automate_attribute_message' => array(
				'name'     => esc_html__('Split by attribute notice', 'wc-order-splitter'),
				'type'     => 'textarea',
				'desc'     => '<a href="https://yoohw.com/product/woocommerce-order-splitter-premium/" target="_blank" class="premium-label">Upgrade</a>',
				'desc_tip'     => esc_html__('Enter the notice message you want to display in the new order email to the customer when the order is automating split by attribute.', 'wc-order-splitter'),
				'id'       => 'notifications',
				'default'  => esc_html__('To ensure quicker processing, your order has been divided into product attributes.', 'wc-order-splitter'),
				'custom_attributes' => array(
					'disabled' => 'disabled',
				),
			),
			'automate_vendor_message' => array(
				'name'     => esc_html__('Split by vendor notice', 'wc-order-splitter'),
				'type'     => 'textarea',
				'desc'     => '<a href="https://yoohw.com/product/woocommerce-order-splitter-premium/" target="_blank" class="premium-label">Upgrade</a>',
				'desc_tip'     => esc_html__('Enter the notice message you want to display in the new order email to the customer when the order is automating split by vendor.', 'wc-order-splitter'),
				'id'       => 'notifications',
				'default'  => esc_html__('To ensure quicker processing, your order has been divided into vendors.', 'wc-order-splitter'),
				'custom_attributes' => array(
					'disabled' => 'disabled',
				),
			),
			'split_email_admin' => array(
				'name'     => esc_html__('Email to admin', 'wc-order-splitter'),
				'type'     => 'checkbox',
				'desc_tip'     => '<a href="https://yoohw.com/product/woocommerce-order-splitter-premium/" target="_blank" class="premium-label">Upgrade</a>',
				'desc'     => esc_html__('Enable sending split order emails to the administrator.', 'wc-order-splitter'),
				'id'       => 'notifications',
				'default'  => 'no',
				'custom_attributes' => array(
					'disabled' => 'disabled',
				),
			),
			'section_end' => array(
				'type' => 'sectionend',
				'id'   => 'notifications_order_splitter_section_end'
			)
		);

		return apply_filters('notifications_settings', $settings);
	}

	public function update_order_splitter_settings() {
		woocommerce_update_options($this->get_split_order_settings());
		woocommerce_update_options($this->get_advanced_settings());
	}

	public function set_default_settings() {
		$default_settings = array(
			'order_splitter_status_allowed' => array('wc-processing'),
			'order_splitter_exclude_shipping_fee' => 'no',
			'order_splitter_disable_split_order_email' => 'none',
			'order_splitter_shop_manager_permission' => 'no',
			'order_splitter_order_label' => 'yes',
		);

		foreach ($default_settings as $key => $value) {
			if (get_option($key, false) === false) {
				add_option($key, $value);
			}
		}
	}

    public function on_activation() {
        $this->update_options();
        update_option('wc_order_splitter_version', $this->version);
    }

    public function check_for_updates() {
        $installed_version = get_option('wc_order_splitter_version');

        if ($installed_version !== $this->version) {
            $this->update_options();
            update_option('wc_order_splitter_version', $this->version);
        }
    }

	public function update_options() {
		$options_to_update = array(
			'new_order_email_option' => 'order_splitter_disable_split_order_email',
			'new_order_exclude_shipping' => 'order_splitter_exclude_shipping_fee',
			'order_splitter_shop_manager_permission' => 'order_splitter_shop_manager_permission'
		);
	
		foreach ($options_to_update as $old_option => $new_option) {
			$old_value = get_option($old_option);
			if (false !== $old_value) {
				update_option($new_option, $old_value);
				delete_option($old_option);
			}
		}
	}

	public function wc_order_splitter_add_custom_class_settings_page() {
		$screen = get_current_screen();
		if ($screen && $screen->id === 'woocommerce_page_wc-settings') {
			?>
			<script type="text/javascript">
				jQuery(document).ready(function($) {
					// Check if we are on the 'Orders' tab in WooCommerce settings
					const urlParams = new URLSearchParams(window.location.search);
					const tab = urlParams.get('tab');
	
					// Only execute the script if the current tab is 'orders'
					if (tab === 'orders') {
						$('input#product_tag').closest('tr').addClass('premium-locked');
						$('h2:contains("Duplicate orders")').addClass('premium-locked');
						$('input#duplicate_status').closest('tr').addClass('premium-locked');
						$('input#editable_status').closest('tr').addClass('premium-locked');
						$('h2:contains("Automation Splitter")').addClass('premium-locked');
						$('input#automation_splitter').closest('tr').addClass('premium-locked');
						$('h2:contains("Split order email")').addClass('premium-locked');
						$('input#notifications').closest('tr').addClass('premium-locked');
						$('textarea#notifications').closest('tr').addClass('premium-locked');
					}
				});
			</script>
			<?php
		}
	}
}

new WooCommerce_Order_Splitter_Settings();
