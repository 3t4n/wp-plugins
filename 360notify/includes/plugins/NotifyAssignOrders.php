<?php

class NotifyAssignOrders implements Notify_PluginInterface, Notify_Register_Interface {

    public static $plugin_identifier = 'assign-orders';
    private $plugin_name;
    private $plugin_medium;
    private $log;
    private $option_id;

    public function __construct() {
        $this->log = new Notify_WooCoommerce_Logger();
        $this->option_id = "notifysms_{$this::$plugin_identifier}";
        $this->plugin_name = 'Assign Orders';
        $this->plugin_medium = 'wp_' . str_replace( ' ', '_', strtolower($this->plugin_name));
    }

    public static function plugin_activated()
    {
        $log = new Notify_WooCoommerce_Logger();
        if( ! is_plugin_active(sprintf('%1$s/%1$s.php', self::$plugin_identifier ))) { return false; }
        return true;
    }

    public function register()
    {
        add_action( 'woocommerce_order_status_pending', array( $this, 'send_sms_on'), 10, 3);
        add_action( 'woocommerce_order_status_failed'  , array( $this, 'send_sms_on'), 10, 3);
        add_action( 'woocommerce_order_status_on-hold'     , array( $this, 'send_sms_on'), 10, 3);
        add_action( 'woocommerce_order_status_processing'     , array( $this, 'send_sms_on'), 10, 3);
        add_action( 'woocommerce_order_status_completed'     , array( $this, 'send_sms_on'), 10, 3);
        add_action( 'woocommerce_order_status_refunded'     , array( $this, 'send_sms_on'), 10, 3);
        add_action( 'woocommerce_order_status_cancelled'     , array( $this, 'send_sms_on'), 10, 3);
        add_action( 'woocommerce_before_thankyou'     , array( $this, 'thankyou_send_sms_on'), 10, 1);
        	

    }

    public function get_option_id()
    {
        return $this->option_id;
    }

    public function get_setting_section_data()
    {
        return array(
            'id'    => $this->get_option_id(),
            'title' => 'Assign Orders',
        );
    }

    public function get_setting_field_data()
    {
        $setting_fields = array(
			$this->get_enable_notification_fields(),
			//$this->get_send_from_fields(),
			$this->get_send_on_fields(),
		);
        foreach($this->get_sms_template_fields() as $sms_templates) {
            $setting_fields[] = $sms_templates;
        }
        return $setting_fields;
    }

    public function get_plugin_settings($with_identifier = false)
    {
        $settings = array(
            "notifysms_automation_enable_notification"        => notifysms_get_options("notifysms_automation_enable_notification", $this->get_option_id()),
            "notifysms_send_from"                             => notifysms_get_options('notifysms_automation_send_from', $this->get_option_id()),
            "notifysms_automation_send_on"                    => notifysms_get_options("notifysms_automation_send_on", $this->get_option_id()),
            "notifysms_automation_sms_template_thankyou"      => notifysms_get_options("notifysms_automation_sms_template_thankyou", $this->get_option_id()),
            "notifysms_automation_sms_template_pending"       => notifysms_get_options("notifysms_automation_sms_template_pending", $this->get_option_id()),
            "notifysms_automation_sms_template_failed"        => notifysms_get_options("notifysms_automation_sms_template_failed", $this->get_option_id()),
            "notifysms_automation_sms_template_on-hold"       => notifysms_get_options("notifysms_automation_sms_template_on-hold", $this->get_option_id()),
            "notifysms_automation_sms_template_processing"    => notifysms_get_options("notifysms_automation_sms_template_processing", $this->get_option_id()),
            "notifysms_automation_sms_template_completed"     => notifysms_get_options("notifysms_automation_sms_template_completed", $this->get_option_id()),
            "notifysms_automation_sms_template_refunded"      => notifysms_get_options("notifysms_automation_sms_template_refunded", $this->get_option_id()),
            "notifysms_automation_sms_template_cancelled"     => notifysms_get_options("notifysms_automation_sms_template_cancelled", $this->get_option_id()),

        );

        if ($with_identifier) {
            return array(
                self::$plugin_identifier => $settings,
            );
        }

        return $settings;
    }

    private function get_enable_notification_fields() {
        return array(
            'name'    => 'notifysms_automation_enable_notification',
            'label'   => __( 'Enable WhatsApp notifications', '360notify' ),
            'desc'    => ' ' . __( 'Enable', '360notify' ),
            'type'    => 'checkbox',
            'default' => 'off'
        );
    }

    private function get_send_from_fields() {
        return array(
            'name'  => 'notifysms_automation_send_from',
            'label' => __( 'Send from', '360notify' ),
            'desc'  => __( 'Sender of the WhatsApp when a message is received at a mobile phone', '360notify' ),
            'type'  => 'text',
        );
    }

    private function get_send_on_fields() {
        return array(
            'name'    => 'notifysms_automation_send_on',
            'label'   => __( 'Send notification on', '360notify' ),
            'desc'    => __( 'Choose when to send a WhatsApp notification message', '360notify' ),
            'type'    => 'multicheck',
            'options' => array(
                'thankyou'    => 'Thankyou',
                'pending'     => 'Pending',
                'failed'      => 'Failed',
                'on-hold'     => 'On-hold',
                'processing'  => 'Processing',
                'completed'   => 'Completed',
                'refunded'    => 'Refunded',
                'cancelled'   => 'Cancelled',
                )
        );
    }

    private function get_sms_template_fields() {
        return array(
            array(
                'name'    => 'notifysms_automation_sms_template_thankyou',
                'label'   => __( 'Thankyou WhatsApp message', '360notify' ),
                'desc'    => sprintf('Customize your WhatsApp with <button type="button" id="notifysms-open-keyword-%1$s-[dummy]" data-attr-type="customer" data-attr-target="%1$s[notifysms_automation_sms_template_thankyou]" class="button button-secondary">Keywords</button>', $this->get_option_id() ),
                'type'    => 'textarea',
                'rows'    => '8',
                'cols'    => '500',
                'css'     => 'min-width:350px;',
                'default' => __( '[shop_name] : Thank you for purchasing. Your order ([order_id]) is now [order_status].', '360notify' )
            ),
            array(
                'name'    => 'notifysms_automation_sms_template_pending',
                'label'   => __( 'Pending status WhatsApp message', '360notify' ),
                'desc'    => sprintf('Customize your WhatsApp with <button type="button" id="notifysms-open-keyword-%1$s-[dummy]" data-attr-type="customer" data-attr-target="%1$s[notifysms_automation_sms_template_pending]" class="button button-secondary">Keywords</button>', $this->get_option_id() ),
                'type'    => 'textarea',
                'rows'    => '8',
                'cols'    => '500',
                'css'     => 'min-width:350px;',
                'default' => __( '[shop_name] : Thank you for purchasing. Your order ([order_id]) is now [order_status].', '360notify' )
            ),
            array(
                'name'    => 'notifysms_automation_sms_template_failed',
                'label'   => __( 'Failed status WhatsApp message', '360notify' ),
                'desc'    => sprintf('Customize your WhatsApp with <button type="button" id="notifysms-open-keyword-%1$s-[dummy]" data-attr-type="lead" data-attr-target="%1$s[notifysms_automation_sms_template_failed]" class="button button-secondary">Keywords</button>', $this->get_option_id() ),
                'type'    => 'textarea',
                'rows'    => '8',
                'cols'    => '500',
                'css'     => 'min-width:350px;',
                'default' => __( '[shop_name] : Thank you for purchasing. Your order ([order_id]) is now [order_status].', '360notify' )
            ),
            array(
                'name'    => 'notifysms_automation_sms_template_on-hold',
                'label'   => __( 'On-hold status WhatsApp message', '360notify' ),
                'desc'    => sprintf('Customize your WhatsApp with <button type="button" id="notifysms-open-keyword-%1$s-[dummy]" data-attr-type="refused" data-attr-target="%1$s[notifysms_automation_sms_template_on-hold]" class="button button-secondary">Keywords</button>', $this->get_option_id() ),
                'type'    => 'textarea',
                'rows'    => '8',
                'cols'    => '500',
                'css'     => 'min-width:350px;',
                'default' => __( '[shop_name] : Thank you for purchasing. Your order ([order_id]) is now [order_status].', '360notify' )
            ),
            array(
                'name'    => 'notifysms_automation_sms_template_processing',
                'label'   => __( 'Processing status WhatsApp message', '360notify' ),
                'desc'    => sprintf('Customize your WhatsApp with <button type="button" id="notifysms-open-keyword-%1$s-[dummy]" data-attr-type="refused" data-attr-target="%1$s[notifysms_automation_sms_template_processing]" class="button button-secondary">Keywords</button>', $this->get_option_id() ),
                'type'    => 'textarea',
                'rows'    => '8',
                'cols'    => '500',
                'css'     => 'min-width:350px;',
                'default' => __( '[shop_name] : Thank you for purchasing. Your order ([order_id]) is now [order_status].', '360notify' )
            ),
            array(
                'name'    => 'notifysms_automation_sms_template_completed',
                'label'   => __( 'Completed status WhatsApp message', '360notify' ),
                'desc'    => sprintf('Customize your WhatsApp with <button type="button" id="notifysms-open-keyword-%1$s-[dummy]" data-attr-type="refused" data-attr-target="%1$s[notifysms_automation_sms_template_completed]" class="button button-secondary">Keywords</button>', $this->get_option_id() ),
                'type'    => 'textarea',
                'rows'    => '8',
                'cols'    => '500',
                'css'     => 'min-width:350px;',
                'default' => __( '[shop_name] : Thank you for purchasing. Your order ([order_id]) is now [order_status].', '360notify' )
            ),
            array(
                'name'    => 'notifysms_automation_sms_template_refunded',
                'label'   => __( 'Refunded status WhatsApp message', '360notify' ),
                'desc'    => sprintf('Customize your WhatsApp with <button type="button" id="notifysms-open-keyword-%1$s-[dummy]" data-attr-type="refused" data-attr-target="%1$s[notifysms_automation_sms_template_refunded]" class="button button-secondary">Keywords</button>', $this->get_option_id() ),
                'type'    => 'textarea',
                'rows'    => '8',
                'cols'    => '500',
                'css'     => 'min-width:350px;',
                'default' => __( '[shop_name] : Thank you for purchasing. Your order ([order_id]) is now [order_status].', '360notify' )
            ),
            array(
                'name'    => 'notifysms_automation_sms_template_cancelled',
                'label'   => __( 'Cancelled status WhatsApp message', '360notify' ),
                'desc'    => sprintf('Customize your WhatsApp with <button type="button" id="notifysms-open-keyword-%1$s-[dummy]" data-attr-type="refused" data-attr-target="%1$s[notifysms_automation_sms_template_cancelled]" class="button button-secondary">Keywords</button>', $this->get_option_id() ),
                'type'    => 'textarea',
                'rows'    => '8',
                'cols'    => '500',
                'css'     => 'min-width:350px;',
                'default' => __( '[shop_name] : Thank you for purchasing. Your order ([order_id]) is now [order_status].', '360notify' )
            ),
        );
    }

    public function get_keywords_field()
    {
        return array(
            'assign-orders' => array(
                'shop_name',
                'shop_email',
                'shop_url',
                'order_id',
                'order_currency',
                'order_amount',
                'order_status',
                'order_latest_cust_note',
                'order_note',
                'order_product',
                'order_product_with_qty',
                'order_total_discount',
                'order_date_created',
                'order_total_tax',
                'order_subtotal',
                'billing_first_name',
                'billing_last_name',
                'billing_phone',
                'billing_email',
                'billing_company',
                'billing_address',
                'billing_country',
                'billing_city',
                'billing_state',
                'billing_postcode',
                'payment_method',
                'shipping_method',
                'transaction_id',
                'shipment_tracking_number',
            ),
        );

    }

    public function send_sms_on($orderid, $contact, $old_status)
    {
        //var_dump($orderid, $contact, $old_status);exit;
        $order    = wc_get_order( $orderid );
		$assignee = $order->get_meta( '_assignee' );
		if(!$assignee) return false;
		$assignee_phone = get_user_meta( $assignee, 'phone', true ); 

        if($old_status["from"] == $contact->status) {
            $this->log->add("360MessengerWhatsApp", "old status and new status is the same, aborting.");
            return;
        }

        $plugin_settings = $this->get_plugin_settings();
        $enable_notifications = $plugin_settings['notifysms_automation_enable_notification'];
        $send_on = $plugin_settings['notifysms_automation_send_on'];

        $status = $contact->status;

        $this->log->add("360MessengerWhatsApp", "status: {$status}");

        if($enable_notifications === "on") {
            $this->log->add("360MessengerWhatsApp", "enable notifications: on");
            if(!empty($send_on) && is_array($send_on)) {
                if(array_key_exists($status, $send_on)) {
                    $this->log->add("360MessengerWhatsApp", "enable {$status} notifications: on");
                    $this->send_customer_notification($contact, $status, $assignee_phone);
                }
            }
        }

        return false;
    }
    
    public function thankyou_send_sms_on($orderid)
    {
        $order    = wc_get_order( $orderid );
		$assignee = $order->get_meta( '_assignee' );
		if(!$assignee) return false;
		$assignee_phone = get_user_meta( $assignee, 'phone', true ); 
        $plugin_settings = $this->get_plugin_settings();
        $enable_notifications = $plugin_settings['notifysms_automation_enable_notification'];
        $send_on = $plugin_settings['notifysms_automation_send_on'];

        $status = "thankyou";

        $this->log->add("360MessengerWhatsApp", "status: {$status}");

        if($enable_notifications === "on") {
            $this->log->add("360MessengerWhatsApp", "enable notifications: on");
            if(!empty($send_on) && is_array($send_on)) {
                if(array_key_exists($status, $send_on)) {
                    $this->log->add("360MessengerWhatsApp", "enable {$status} notifications: on");
                    $this->send_customer_notification($order, $status, $assignee_phone);
                }
            }
        }

        return false;
    }

    public function send_customer_notification($contact, $status, $assignee_phone)
    {
        $this->log->add("360MessengerWhatsApp", "send_customer_notification status: {$status}");
        $settings = $this->get_plugin_settings();
        $sms_from = $settings['notifysms_automation_send_from'];

        // get number from args
        $phone_no = $assignee_phone;
        $phone_no = preg_replace('/[^0-9]/', '', $phone_no);
        if( !ctype_digit($phone_no) ) {
            $this->log->add("360MessengerWhatsApp", "phone_no is not a digit: {$phone_no}. Aborting...");
            return;
        }
        
        $phone_no = Notify_SendSMS_Sms::get_formatted_number($phone_no);
        
        // if( !empty($contact->country) ) {
        //     $country = $contact->country;
        //     $phone_no = Notify_SendSMS_Sms::get_formatted_number($phone_no, $country);
        // }

        $this->log->add("360MessengerWhatsApp", "phone_no: {$phone_no}");

        // get message template from status
        $msg_template = $settings["notifysms_automation_sms_template_{$status}"];
        // $message = $this->replace_keywords_with_value($contact, $msg_template);
        $message = $this->replace_order_keyword($contact, $msg_template, $status);

        Notify_SendSMS_Sms::send_sms($sms_from, $phone_no, $message, $this->plugin_medium);
    }

    /*
        returns the message with keywords replaced to original value it points to
        eg: [name] => 'customer name here'
    */
    protected function replace_keywords_with_value($contact, $message)
    {
        // use regex to match all [stuff_inside]
        // return the message
        // preg_match_all('/\[(.*?)\]/', $message, $keywords);
        $notify_setting = new Notify_WooCommerce_Setting();

        $keywords = array(
            '[first_name]'     => !empty($contact->first_name) ? $contact->first_name : '',
            '[last_name]'      => !empty($contact->last_name) ? $contact->last_name : '',
            '[email]'          => !empty($contact->email) ? $contact->email : '',
            '[status]'         => !empty($contact->status) ? $contact->status : '',
            '[contact_type]'   => !empty($contact->contact_type) ? $contact->contact_type : '',
            '[address_line_1]' => !empty($contact->address_line_1) ? $contact->address_line_1 : '',
            '[address_line_2]' => !empty($contact->address_line_2) ? $contact->address_line_2 : '',
            '[postal_code]'    => !empty($contact->postal_code) ? $contact->postal_code : '',
            '[city]'           => !empty($contact->city) ? $contact->city : '',
            '[state]'          => !empty($contact->state) ? $contact->state : '',
            '[country]'        => !empty($contact->country) ? $contact->country : '',
            '[phone]'          => !empty($contact->phone) ? $contact->phone : '',
            '[date_of_birth]'  => !empty($contact->date_of_birth) ? $contact->date_of_birth : '',
        );

        return str_replace(array_keys($keywords), array_values($keywords), $message);

    }
    
    protected function replace_order_keyword( $order_details, $message, $order_status ) {
		/** @var WC_Order $order_details */
		$items            = $order_details->get_items();
		$product_name     = '';
		$product_with_qty = '';
		foreach ( $items as $item ) {
			$product_name     .= ', ' . $item->get_name();
			$product_with_qty .= ', ' . $item->get_name() . ' X ' . $item->get_quantity();
		}
		if ( $product_name ) {
			$product_name     = substr( $product_name, 2 );
			$product_with_qty = substr( $product_with_qty, 2 );
		}
		
		$order_date = $order_details->get_date_created();
		$format = get_option("date_format");
        $order_date = date_i18n($format, $order_date);
        
        $order_id = $order_details->get_order_number();
		$tracking_items = get_post_meta( $order_id, '_wc_shipment_tracking_items', true );
		foreach ( $tracking_items as $tracking_item ){
			$shipment_tracking_number = $tracking_item['tracking_number'];
		}
        
		$search  = array(
			'[shop_name]',
			'[shop_email]',
			'[shop_url]',
			'[order_id]',
			'[order_currency]',
			'[order_amount]',
			'[order_status]',
            '[order_latest_cust_note]',
            '[order_note]',
			'[order_product]',
			'[order_product_with_qty]',
			'[order_total_discount]',
			'[order_date_created]',
			'[order_total_tax]',
			'[order_subtotal]',
			'[billing_first_name]',
			'[billing_last_name]',
			'[billing_phone]',
			'[billing_email]',
			'[billing_company]',
			'[billing_address]',
			'[billing_country]',
			'[billing_city]',
			'[billing_state]',
			'[billing_postcode]',
			'[payment_method]',
			'[shipping_method]',
			'[transaction_id]',
			'[shipment_tracking_number]'
			
		);
		$replace = array(
			get_bloginfo( 'name' ),
			get_bloginfo( 'admin_email' ),
			get_bloginfo( 'url' ),
			$order_details->get_order_number(),
			$order_details->get_currency(),
			$order_details->get_total(),
			ucfirst( $order_details->get_status() ),
            isset($order_details->get_customer_order_notes()[0]->comment_content) ? $order_details->get_customer_order_notes()[0]->comment_content : "",
            $order_details->get_customer_note(), // new
			$product_name,
			$product_with_qty,
			$order_details->get_total_discount(), // new
			$order_date, // new
			$order_details->get_total_tax(), // new
			$order_details->get_subtotal(), // new
			$order_details->get_billing_first_name(),
			$order_details->get_billing_last_name(),
			$order_details->get_billing_phone(),
			$order_details->get_billing_email(),
			$order_details->get_billing_company(),
			$order_details->get_billing_address_1(),
			$order_details->get_billing_country(),
			$order_details->get_billing_city(),
			$order_details->get_billing_state(),
			$order_details->get_billing_postcode(),
			$order_details->get_payment_method(),
			$order_details->get_shipping_method(), // new
			$order_details->get_transaction_id(), // new
			isset($shipment_tracking_number) ? $shipment_tracking_number : ""// new
		);

        $message = str_replace( $search, $replace, $message );

		$additional_billing_fields_array = $this->get_additional_billing_fields();
		foreach ( $additional_billing_fields_array as $field ) {
			$post_data = get_post_meta( $order_details->get_order_number(), $field, true );
			$message   = str_replace( '[' . $field . ']', $post_data, $message );
		}

		return $message;
	}
	
    protected function get_additional_billing_fields() {
		$default_billing_fields   = array(
			'billing_first_name',
			'billing_last_name',
			'billing_company',
			'billing_address_1',
			'billing_address_2',
			'billing_city',
			'billing_state',
			'billing_country',
			'billing_postcode',
			'billing_phone',
			'billing_email'
		);
		$additional_billing_field = array();
		$billing_fields           = array_filter( get_option( 'wc_fields_billing', array() ) );
		foreach ( $billing_fields as $field_key => $field_info ) {
			if ( ! in_array( $field_key, $default_billing_fields ) && $field_info['enabled'] ) {
				array_push( $additional_billing_field, $field_key );
			}
		}

		return $additional_billing_field;
	}
}