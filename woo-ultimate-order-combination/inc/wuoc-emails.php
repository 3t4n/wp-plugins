<?php
	add_filter('wp_mail', 'wuoc_redirect_mails', 99, 1);
	
	function wuoc_redirect_mails($args) {
		$wuoc_stock_short_email = get_option('wuoc_stock_short_email', 0);
		$wuoc_product_backorder_email = get_option('wuoc_product_backorder_email', 0);
		$wuoc_new_order_email = get_option('wuoc_new_order_email', 0);
	
		if (!isset($args['subject']) || !isset($args['to'])) {
			return $args; // Ensure the email structure is valid before processing
		}
	
		// Match subject keywords for filtering
		$subject = strtolower($args['subject']);
		$backorder = strpos($subject, 'product backorder') !== false;
		$out_of_stock = strpos($subject, 'product out of stock') !== false;
		$new_order = strpos($subject, 'new order #') !== false;
	
		// Check conditions and modify the recipient
		if (!$wuoc_stock_short_email && $out_of_stock) {
			$args['to'] = '';
		}
		if (!$wuoc_product_backorder_email && $backorder) {
			$args['to'] = '';
		}
		if ($wuoc_new_order_email && $new_order) {
			$args['to'] = ''; // Ensure that this condition is correct based on your logic
		}
	
		return $args;
	}
	
	
	function wuoc_email_notification($pref = [], $action = 'wuoc_combine') {
		$ret = false;
		$myaccount_page_id = get_option('woocommerce_myaccount_page_id');
		$wuoc_cart_notices = get_option('wuoc_cart_notices', true);
	
		$myaccount_page_url = $myaccount_page_id ? get_permalink($myaccount_page_id) : '';
	
		$to = '';
		$subject = '';
		$display_name = '';
		$body = 'USER_NAME,<br><br>BODY_1BODY_2BODY_3<br><br>' . get_bloginfo('name') . '<br>' . get_bloginfo('description') . '<br>' . get_bloginfo('wpurl');
	
		switch ($action) {
			case 'wuoc_combine':
				$subject = __('Following orders are combined into order#', 'woo-uoc') . ' ' . esc_html($pref['new']);
				$body_1 = __('Following orders are combined into one order#', 'woo-uoc') . ' <a href="' . esc_url($myaccount_page_url . 'view-order/' . $pref['new']) . '">' . esc_html($pref['new']) . '</a>';
				$body_1 .= '<br><br><ul>';
	
				if (!empty($pref['original'])) {
					foreach ($pref['original'] as $order_id) {
						$order = wc_get_order($order_id);
						if ($order instanceof WC_Order) {
							$body_1 .= '<li>Order# <a href="' . esc_url($myaccount_page_url . 'view-order/' . $order_id) . '">' . esc_html($order_id) . '</a></li>';
							$post_author_id = $order->get_customer_id();
						}
					}
				}
	
				$body_1 .= '</ul><br><br>';
				$body_2 = __('Order items will remain intact, same product (items) will be merged and quantity will be incremented.', 'woo-uoc') . '<br><br>';
				$body_3 = '<a href="' . esc_url($myaccount_page_url . 'orders') . '">' . __('Click here', 'woo-uoc') . '</a> ' . __('to check your orders status in your account.', 'woo-uoc') . '';
	
				if (get_option('wuoc_order_combine_email', 0)) {
					if (!empty($post_author_id)) {
						$post_author = get_userdata($post_author_id);
						if ($post_author && isset($post_author->user_email)) {
							$to = sanitize_email($post_author->user_email);
							$display_name = strtoupper(sanitize_text_field($post_author->display_name));
						}
					} else {
						$any_order = wc_get_order($pref['new']);
						if ($any_order instanceof WC_Order) {
							$to = sanitize_email($any_order->get_billing_email());
							$display_name = $display_name ? $display_name : sanitize_text_field($any_order->get_formatted_billing_full_name());
						}
					}
				}
	
				$body = str_replace(['USER_NAME', 'BODY_1', 'BODY_2', 'BODY_3'], [$display_name, $body_1, $body_2, $body_3], $body);
				break;
		}
	
		$co_efrom_name = isset($wuoc_cart_notices['co_efrom_name']) && !empty($wuoc_cart_notices['co_efrom_name']) ? sanitize_text_field($wuoc_cart_notices['co_efrom_name']) : get_bloginfo('name');
		$co_efrom_email = isset($wuoc_cart_notices['co_efrom_email']) && !empty($wuoc_cart_notices['co_efrom_email']) ? sanitize_email($wuoc_cart_notices['co_efrom_email']) : get_bloginfo('admin_email');
		$co_ereplyto_email = isset($wuoc_cart_notices['co_ereplyto_email']) && !empty($wuoc_cart_notices['co_ereplyto_email']) ? sanitize_email($wuoc_cart_notices['co_ereplyto_email']) : get_bloginfo('admin_email');
	
		$headers = [
			'Content-Type: text/html; charset=UTF-8',
			'From: ' . esc_html($co_efrom_name) . ' <' . esc_html($co_efrom_email) . '>',
			'Reply-To: ' . esc_html(get_bloginfo('name')) . ' <' . esc_html($co_ereplyto_email) . '>'
		];
	
		// Allow filtering of email data
		$arr = apply_filters('wuoc_email_notification_filter', $pref, $action);
	
		if (is_array($arr)) {
			if (!empty($arr['to']) && $arr['to'] !== $to) {
				$to = sanitize_email($arr['to']);
			}
			if (!empty($arr['subject']) && $arr['subject'] !== $subject) {
				$subject = sanitize_text_field($arr['subject']);
			}
			if (!empty($arr['body']) && $arr['body'] !== $body) {
				$body = wp_kses_post($arr['body']);
			}
			if (!empty($arr['headers']) && $arr['headers'] !== $headers) {
				$headers = array_map('sanitize_text_field', (array) $arr['headers']);
			}
		}
	
		// Ensure email is valid before sending
		if (is_email($to)) {
			$ret = wp_mail($to, $subject, $body, $headers);
		}
	
		return $ret;
	}

	/**
	 * Unhook and remove WooCommerce default emails.
	 */
	 function wuoc_unhook_emails($email_class) {
		// Check if the backorder email notification setting is disabled
		if (get_option('wuoc_backorder_mail_notification', 0)) {
			// Unhook email notifications for stock events
			remove_action('woocommerce_low_stock_notification', [$email_class, 'low_stock']);
			remove_action('woocommerce_no_stock_notification', [$email_class, 'no_stock']);
			remove_action('woocommerce_product_on_backorder_notification', [$email_class, 'backorder']);
		}
	}
