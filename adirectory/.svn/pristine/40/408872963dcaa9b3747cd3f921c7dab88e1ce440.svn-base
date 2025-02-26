<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
/* =========== Expire Listing Action hook and cron job =========== */
if (!function_exists('is_available_pricing_availbale')) {
	function is_available_pricing_availbale()
	{
		$plugins = get_option("active_plugins", []);
		if (!in_array('ad-pricing-package/ad-pricing-package.php', $plugins) && !in_array('ad-wc-pricing-package/ad-wc-pricing-package.php', $plugins)) {
			return false;
		}
		return in_array('ad-pricing-package/ad-pricing-package.php', $plugins) ? 'self' : 'wc';
	}
}


if (!function_exists('get_author_meta_by_listing_id')) {
	function get_author_meta_by_listing_id($post_id, $meta_key)
	{
		$author_id = get_post_field('post_author', $post_id);
		if ($author_id) {
			return get_user_meta($author_id, $meta_key, true);
		}
	}
}

// Get the expiry purchase date of a listing
if (!function_exists('adqs_get_purchase_expiry_date')) {
	function adqs_get_purchase_expiry_date($post_id = 0)
	{
		if (empty($post_id)) {
			return false;
		}
		$expiry_type = !empty(adqs_get_setting_option('purchase_expiry_type')) ? adqs_get_setting_option('purchase_expiry_type') : '';
		$selectExpiry_type = ($expiry_type === 'by_post_date') || ($expiry_type === 'by_plan_expire') ? true : false;
		if (!$selectExpiry_type) {
			return false;
		}

		$author_id = get_post_field('post_author', $post_id);
		$post_date = get_post_field('post_date', $post_id);
		$directory_id = absint(get_post_meta($post_id, 'adqs_directory_type', true));
		if (!empty($_REQUEST['adqs_listing_type'] ?? '')) {
			$directory_id = absint($_REQUEST['adqs_listing_type']);
		}
		$pricing_active = is_available_pricing_availbale();


		if ($pricing_active === 'self') {
			$getAllOrders = adp_get_order_by_user_id($author_id, 'id,pricing_id', 'completed', true, ['directory_id' => $directory_id]);
			if (!empty($getAllOrders)) {
				foreach ($getAllOrders as $order) {
					$getDate = get_user_meta(absint($author_id), "adp_order_expire_{$order->id}", true);
					if (!empty($getDate) && ($getDate !== 'never_expire')) {
						if ($expiry_type === 'by_post_date') {
							$pricing = adp_get_query_pricing($order->pricing_id, 'duration');
							$duration = $pricing->duration ?? '';
							if (!empty($duration)) {
								return wp_date('Y-m-d H:i:s', strtotime("+{$duration}", strtotime($post_date)));
								break;
							}
						} elseif ($expiry_type === 'by_plan_expire') {
							return $getDate;
							break;
						}
					}
				}
			}
		} elseif ($pricing_active === 'wc') {
			// code for woocommerce
			$query = new WC_Order_Query(array(
				'status' => 'wc-completed',
				'limit'  => -1,
				'customer_id'  => $author_id,
			));


			if (!empty($query->get_orders())) {
				foreach ($query->get_orders() as $order) {
					$order_id = $order->get_id();
					$getDate = get_user_meta(absint($author_id), "adp_wc_order_expire_{$order_id}", true);
					if (!empty($order->get_items()) && !empty($getDate) && ($getDate !== 'never_expire')) {
						foreach ($order->get_items() as $item) {
							$product = $item->get_product();
							$id = $product->get_id();
							$term = get_term_by('slug', get_post_meta($id, '_directory_type', true) ?? '', 'adqs_listing_types');
							if (absint($term->term_id ?? 0) !== absint($directory_id)) {
								continue;
							}

							if ($expiry_type === 'by_post_date') {
								$duration = adp_wc_get_meta($id, 'duration');
								if (!empty($duration)) {
									return wp_date('Y-m-d H:i:s', strtotime("+{$duration}", strtotime($post_date)));
									break;
								}
							} elseif ($expiry_type === 'by_plan_expire') {
								return $getDate;
								break;
							}
						}
					}
				}
			}
		}
		return false;
	}
}


// all expire listing related functions
if (!function_exists('adqs_convert_expiry_date')) {
	function adqs_convert_expiry_date($post_id = 0)
	{
		$post_id = absint($post_id);
		$value = AD()->Helper->meta_val($post_id, '_expiry_date', '');
		if (!empty($value)) {
			$value = wp_date('Y-m-d H:i:s', strtotime($value));
		} else {
			$expireDays = !empty(adqs_get_setting_option('listing_expiry_date')) ? adqs_get_setting_option('listing_expiry_date') : 365;

			if (!empty($post_id) && get_post_field('post_date', $post_id)) {
				$value = wp_date('Y-m-d H:i:s', strtotime("+{$expireDays} days", strtotime(get_post_field('post_date', $post_id))));
			}
		}

		return $value;
	}
}



if (!function_exists('adqs_save_listing_expiry_date')) {
	function adqs_save_listing_expiry_date($post_id)
	{


		$post_id = absint($post_id);

		$getData = AD()->Helper->post_data($_POST, '_expiry_date', []);
		if (!empty($getData) && is_array($getData)) {
			$sanitized_data = array_map('sanitize_text_field', array_values($getData));

			list($mm, $jj, $aa, $hh, $mn) = $sanitized_data;
			if (!empty($aa ?? '') && !empty($mm ?? '') && !empty($jj ?? '')) {
				$expireDates = sprintf('%04d-%02d-%02d %02d:%02d:00', $aa, $mm, $jj, $hh, $mn);
				update_post_meta($post_id, '_expiry_date', $expireDates);
			}
		} else {

			if (!empty(adqs_get_purchase_expiry_date($post_id))) {
				update_post_meta($post_id, '_expiry_date', adqs_get_purchase_expiry_date($post_id));
			} else {
				$expireDays = !empty(adqs_get_setting_option('listing_expiry_date')) ? adqs_get_setting_option('listing_expiry_date') : '';
				if (!empty($expireDays)) {
					$expireDates = wp_date('Y-m-d H:i:s', strtotime("+{$expireDays} days"));
					if (!empty($post_id) && get_post_field('post_date', $post_id)) {
						$expireDates = wp_date('Y-m-d H:i:s', strtotime("+{$expireDays} days", strtotime(get_post_field('post_date', $post_id))));
					}
					update_post_meta($post_id, '_expiry_date', $expireDates);
				}
			}
		}

		// Handle "Never Expire" option
		$getExpData = AD()->Helper->post_data($_POST, '_expiry_never', '');
		update_post_meta($post_id, '_expiry_never', sanitize_text_field($getExpData));
	}
	add_action('adqs_frontend_after_save_metabox_data', 'adqs_save_listing_expiry_date');
	add_action('adqs_after_save_metabox_data', 'adqs_save_listing_expiry_date');
}



// delete the expiry purchase date of a listing
if (!function_exists('adqs_delete_purchase_expiry_date')) {
	function adqs_delete_purchase_expiry_date()
	{
		$pricing_active = is_available_pricing_availbale();
		$expireNotifDay = !empty(adqs_get_setting_option('purchase_expiry_notification')) ? adqs_get_setting_option('purchase_expiry_notification') : 7;
		if ($pricing_active === 'self') {
			$getAllOrders = adp_get_query_orders(['number' => ''], 'id,customer_id,status');
			if (!empty($getAllOrders)) {
				foreach ($getAllOrders as $order) {
					$getDate = get_user_meta(absint($order->customer_id ?? 0), "adp_order_expire_{$order->id}", true);
					if (!empty($getDate) && ($getDate !== 'never_expire')) {
						$userNotifyDate = wp_date('Y-m-d', strtotime($getDate . " -{$expireNotifDay} days"));
						$currentDate = wp_date('Y-m-d');
						if ($currentDate === $userNotifyDate) {
							$order_url = $order->id ?? '';
							if (!empty(get_option('adp_view_page_id'))) {
								$order_url = get_permalink(absint(get_option('adp_view_page_id')));
								$order_url =  esc_url("{$order_url}ad-order/{$order->id}");
							}
							do_action('adqs_expire_listing_notification', $getDate, absint($order->customer_id ?? 0), $order_url);
						}
						if (time() > strtotime($getDate)) {
							$customer_id = absint($order->customer_id ?? 0);
							delete_user_meta($customer_id, "adp_order_expire_{$order->id}");
							delete_user_meta($customer_id, "adp_order_reg_listing_{$order->id}");
							delete_user_meta($customer_id, "adp_order_fea_listing_{$order->id}");
						}
					}
				}
			}
		} elseif ($pricing_active === 'wc') {
			// code for woocommerce
			$query = new WC_Order_Query(array(
				'status' => array_keys(wc_get_order_statuses()),
				'limit'  => -1,
			));
			if (!empty($query->get_orders())) {
				foreach ($query->get_orders() as $order) {
					$order_id = $order->get_id();
					$customer_id = $order->get_user_id();
					$getDate = get_user_meta(absint($customer_id), "adp_wc_order_expire_{$order_id}", true);
					if (!empty($getDate) && ($getDate !== 'never_expire')) {
						$userNotifyDate = wp_date('Y-m-d', strtotime($getDate . " -{$expireNotifDay} days"));
						$currentDate = wp_date('Y-m-d');
						if ($currentDate === $userNotifyDate) {
							$order_url = $order_id ?? '';
							if (!empty($order->get_view_order_url())) {
								$order_url = $order->get_view_order_url();
							}
							do_action('adqs_expire_listing_notification', $getDate, absint($customer_id), $order_url);
						}
						if (time() > strtotime($getDate)) {
							delete_user_meta($customer_id, "adp_wc_order_expire_{$order_id}");
							delete_user_meta($customer_id, "adp_wc_order_reg_listing_{$order_id}");
							delete_user_meta($customer_id, "adp_wc_order_fea_listing_{$order_id}");
						}
					}
				}
			}
		}
	}
}

// Expire Listing Action
if (!function_exists('adqs_expire_listing_action')) {
	function adqs_expire_listing_action($post_id)
	{
		$expiryNever = AD()->Helper->meta_val($post_id, '_expiry_never', '');
		if ($expiryNever === 'yes') {
			return;
		}

		if (!empty($value)) {
			$action = !empty(adqs_get_setting_option('action_expiry_date')) ? adqs_get_setting_option('action_expiry_date') : 'pending';

			if (time() > strtotime(adqs_convert_expiry_date($post_id))) {
				switch ($action) {
					case 'pending':
						wp_update_post(array(
							'ID' => $post_id,
							'post_status' => 'pending',
						));
						break;
					case 'draft':
						wp_update_post(array(
							'ID' => $post_id,
							'post_status' => 'draft',
						));
						break;
					case 'trash':
						wp_trash_post($post_id);
						break;
					case 'delete':
						wp_delete_post($post_id, true);
						break;
				}
			}
		}
	}
}


// Schedule Cron Event
if (!wp_next_scheduled('adqs_daily_expire_listings')) {
	wp_schedule_event(time(), 'daily', 'adqs_daily_expire_listings');
}


// run cron job daily
if (!function_exists('adqs_daily_run_cron_job')) {
	function adqs_daily_run_cron_job()
	{
		// delete the expiry purchase date of a listing
		adqs_delete_purchase_expiry_date();

		// Expire all listings action
		$args = array(
			'post_type' => 'adqs_directory',
			'post_status' => 'publish',
			'posts_per_page' => -1,
		);

		$query = new WP_Query($args);
		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();
				adqs_expire_listing_action(get_the_ID());
			}
			wp_reset_postdata();
		}
	}
	// Hook the Cron Event
	add_action('adqs_daily_expire_listings', 'adqs_daily_run_cron_job');
}

if (!function_exists('adqs_unschedule_cron_job')) {
	function adqs_unschedule_cron_job()
	{
		$timestamp = wp_next_scheduled('adqs_daily_expire_listings');
		if ($timestamp) {
			wp_unschedule_event($timestamp, 'adqs_daily_expire_listings');
		}
	}

	// Unschedule Cron Event on Deactivation
	register_deactivation_hook(ADQS_DIRECTORY_FILE, 'adqs_unschedule_cron_job');
}







// Add filter for "Expired" listings in the admin views
if (!function_exists('addqs_add_expiry_date_filter_in_admin')) {
	function addqs_add_expiry_date_filter_in_admin($views)
	{
		if (is_admin() &&  ($_GET['post_type'] ?? '') == 'adqs_directory') {
			$currentDateTime = current_time('mysql');

			// Query to count expired listings
			$query_args = array(
				'post_type'   => 'adqs_directory',
				'post_status' => 'any',
				'meta_query'  => array(
					'relation' => 'AND',
					array(
						'key'     => '_expiry_date',
						'value'   => $currentDateTime,
						'compare' => '<',
						'type'    => 'DATETIME',
					),
					array(
						'key'     => '_expiry_never',
						'value'   => 'yes',
						'compare' => '!=',
					),
				),
			);

			$result = new WP_Query($query_args);

			// Check if the 'expired' filter is selected
			$class = (isset($_GET['post_status_check']) && $_GET['post_status_check'] == 'expired') ? ' class="current"' : '';
			// Add the expired listings link to the views
			if (!empty($result->found_posts ?? '')) {
				$views['expired_f'] = sprintf(
					__('<a href="%s"' . $class . '>Expired (%d)</a>', 'adirectory'),
					admin_url('edit.php?post_status_check=expired&post_type=adqs_directory'),
					$result->found_posts
				);
			}


			return $views;
		}

		return $views;
	}
	add_filter('views_edit-adqs_directory', 'addqs_add_expiry_date_filter_in_admin');
}

if (!function_exists('addqs_limit_post_status_check')) {
	function addqs_limit_post_status_check($query)
	{
		global $pagenow;

		if ($pagenow !== 'edit.php' || !is_admin()) {
			return $query;
		}

		if (isset($_GET['post_status_check']) && $_GET['post_status_check'] === 'expired' && isset($_GET['post_type']) && $_GET['post_type'] === 'adqs_directory') {
			$currentDateTime = current_time('mysql');

			$meta_query = array(
				'relation' => 'AND',
				array(
					'key'     => '_expiry_date',
					'value'   => $currentDateTime,
					'compare' => '<',
					'type'    => 'DATETIME',
				),
				array(
					'key'     => '_expiry_never',
					'value'   => 'yes',
					'compare' => '!=',
				),
			);

			$query->set('post_status', 'any');
			$query->set('meta_query', $meta_query);
		}

		return $query;
	}
	add_filter('pre_get_posts', 'addqs_limit_post_status_check');
}






// for testing
/* add_action('init', function () {
	if (isset($_GET['test_adqs_expire_listings_cron']) && $_GET['test_adqs_expire_listings_cron'] == '1') {
		adqs_expire_listings_cron_job();
	}
}); */
