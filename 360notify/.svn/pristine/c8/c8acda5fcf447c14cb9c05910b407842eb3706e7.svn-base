<?php
/* This file is forked from the original author Micro Ocean Technologies's MoceanAPI Order SMS Notification plugin on 7/1/2024 */

class Notify_Multivendor_Setting implements Notify_Register_Interface {
	public function register() {
		add_filter( 'notifysms_setting_section', array( $this, 'set_multivendor_setting_section' ) );
		add_filter( 'notifysms_setting_fields', array( $this, 'set_multivendor_setting_field' ) );
        add_action( 'notifysms_setting_fields_custom_html', array( $this, 'notifysms_wc_not_activated' ), 10, 1 );

        add_filter( 'notifysms_setting_fields', array( new Notify_WooCommerce_Setting(), 'add_custom_order_status' ) );
	}

	public function set_multivendor_setting_section( $sections ) {
		$sections[] = array(
			'id'    => 'notifysms_multivendor_setting',
			'title' => __( 'Multivendor Settings', '360notify' ),
            'submit_button' => class_exists("woocommerce") ? null : '',
		);

		return $sections;
	}

	public function set_multivendor_setting_field( $setting_fields ) {
        if(!class_exists("woocommerce")) { return $setting_fields; }

		$setting_fields['notifysms_multivendor_setting'] = array(
			array(
				'name'    => 'notifysms_multivendor_vendor_send_sms',
				'label'   => __( 'Enable Vendor WhatsApp Notifications', '360notify' ),
				'desc'    => __('Enable', '360notify' ),
				'type'    => 'checkbox',
				'default' => 'off',
			),
			array(
				'name'    => 'notifysms_multivendor_vendor_send_sms_on',
				'label'   => __( 'Send notification on', '360notify' ),
				'desc'    => __( 'Choose when to send a status notification message to your vendors', '360notify' ),
				'type'    => 'multicheck',
				'default' => array(
					'processing' => __('processing', '360notify' ),
					'completed'  => __('completed', '360notify' ),
				),
				'options' => array(
					'pending'    => __(' Pending', '360notify' ),
					'on-hold'    => __(' On-hold', '360notify' ),
					'processing' => __(' Processing', '360notify' ),
					'completed'  => __(' Completed', '360notify' ),
					'cancelled'  => __(' Cancelled', '360notify' ),
					'refunded'   => __(' Refunded', '360notify' ),
					'failed'     => __(' Failed', '360notify' )
				)
			),
			array(
				'name'    => 'notifysms_multivendor_selected_plugin',
				'label'   => __( 'Third Party Plugin', '360notify' ),
				'desc'    => __('Change this when auto detect multivendor plugin not working<br /><span id="notifysms_multivendor_setting[multivendor_helper_desc]"></span>', '360notify' ),
				'type'    => 'select',
				'default' => Notify_Multivendor_Factory::$activatedPlugin ?? 'auto',
				'options' => array(
					'auto'             => __('Auto Detect', '360notify' ),
					'product_vendors'  => 'Woocommerce Product Vendors',
					'wc_marketplace'   => 'MultivendorX',
					'wc_vendors'       => 'WC Vendors Marketplace',
					'wcfm_marketplace' => 'WooCommerce Multivendor Marketplace',
					'dokan'            => 'Dokan',
					'yith'             => 'YITH WooCommerce Multi Vendor'
				)
			),
			array(
				'name'    => 'notifysms_multivendor_vendor_sms_template',
				'label'   => __( 'Vendor WhatsApp Message', '360notify' ),
				'desc'    => __('Customize your WhatsApp with <button type="button" id="notify_sms[open-keywords]" data-attr-type="multivendor" data-attr-target="notifysms_multivendor_setting[notifysms_multivendor_vendor_sms_template]" class="button button-secondary">Keywords</button>', '360notify' ),
				'type'    => 'textarea',
				'rows'    => '8',
				'cols'    => '500',
				'css'     => 'min-width:350px;',
				'default' => __( '[shop_name] : You have a new order with order ID [order_id] and order amount [order_currency] [order_amount]. The order is now [order_status].', '360notify' )
			),
		);

		return $setting_fields;
	}

    public function notifysms_wc_not_activated($form_id)
    {
        if(class_exists('woocommerce')) { return; }
        if($form_id != 'notifysms_multivendor_setting') { return; }
        ?>
        <div class="wrap">
            <h1>360Notify Woocommerce Order Notification</h1>
            <p>This feature requires WooCommerce to be activated</p>
        </div>
        <?php
    }

}

?>
