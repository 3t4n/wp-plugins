<?php
class GFLimitPayments {
	static $slugs;

	public static function slugs() {
		if (self::$slugs == null) {
			//TODO: Can add braintree, paypal (although paypal addon supports a certain number of payments), or other payment feed in the future;
			self::$slugs = array('gravityformsstripe');
		}
		return self::$slugs;
	}
	public static function add_hooks() {
		add_action('gform_post_payment_callback', array('GFLimitPayments', 'process_payment'), 10, 3);
	}
	public static function log($obj) {
		error_log(print_r($obj, true));
	}
	public static function is_recurring($feed) {
		return $feed['meta']['recurringAmount'] && !isset($feed['meta']['recurringTimes']);
	}
	public static function get_feed($form_id, $slug) {
		$feeds = GFAPI::get_feeds(null, $form_id);
		foreach ($feeds as $feed) {
			if ($feed['addon_slug'] == $slug && self::is_recurring($feed)) {
				return $feed;
			}
		}
	}
	public static function process_payment($entry, $action, $result) {
		global $wpdb;
		//https://docs.gravityforms.com/cancel-stripe-subscription-payments/
		//https://docs.gravityforms.com/gform_post_payment_callback/
		$hook = 'gform_post_payment_callback';
		if (($action['type'] == 'add_subscription_payment' || $action['type'] == 'complete_payment') && $result && rgar($entry, 'payment_status') == 'Active') {
			$form = RGFormsModel::get_form_meta($entry['form_id']);
			$meta = GFStripeExtensionsAddon::get_settings_limit($form);
			$logdebug = "entry #{$entry['id']}, form #{$entry['form_id']}";
			if ($meta && $meta['limit']) {
				$sql = "SELECT addon_slug FROM {$wpdb->prefix}gf_addon_payment_callback WHERE lead_id = %s ORDER BY date_created DESC LIMIT 1";
				$query = $wpdb->prepare($sql, $entry['id']); 
				$slug = $wpdb->get_var($query);
				if (in_array($slug, self::slugs())) {
					$feed = self::get_feed($entry['form_id'], $slug);
					if ($feed) {
						$limit = $meta['payments_'.$feed['id']];
						$feed_name  = rgars( $feed, 'meta/feedName' );
						$logdebug = "(feed #{$feed['id']} - {$feed_name}) for $logdebug";
						if ($limit == '' || $limit == '0' && $limit == null) {
							$limit = $meta['payments_default'];
							GFStripeExtensionsAddon::get_instance()->log_debug("$hook: Feed not found, using default limit $logdebug.");
						}
						if ($limit != '' && $limit != '0' && $limit != null) {
							$count = $wpdb->get_var($wpdb->prepare("SELECT count(id) FROM {$wpdb->prefix}gf_addon_payment_transaction WHERE lead_id=%d", $entry['id']));
							$limit = (int) $limit;
							if ($count >= $limit) {
								$result = gf_stripe()->cancel( $entry, $feed );
								$message = "$hook: Cancelling subscription $logdebug. Result: " . print_r($result, 1);
								gf_stripe()->log_debug($message);
								GFStripeExtensionsAddon::get_instance()->log_debug($message);
							} else {
								GFStripeExtensionsAddon::get_instance()->log_debug("$hook: Maxmium payment not yet reached for $logdebug.");	
							}
						} else {
							GFStripeExtensionsAddon::get_instance()->log_debug("$hook: No limit set for feed for $logdebug.");
						}
					} else {
						GFStripeExtensionsAddon::get_instance()->log_error("$hook: Cancelling subscription failed $logdebug. Form has not feed with slug " . $slug);
					}
				} else {
					GFStripeExtensionsAddon::get_instance()->log_error("$hook: Cancelling subscription failed $logdebug. Unsupported feed type " . $slug);
				}
			} else {
				//Not a limiting form, skip
				//error_log(print_r($action, true));
			}
		}
	}
}
GFLimitPayments::add_hooks();