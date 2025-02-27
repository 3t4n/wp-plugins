<?php

/**
 * Plugin Name: Bosta WooCommerce
 * Description: WooCommerce integration for Bosta eCommerce
 * Author: Bosta
 * Author URI: https://www.bosta.co/
 * Version: 4.0.0
 * Requires at least: 5.0
 * php version 7.0
 * Tested up to: 6.6.1
 * WC requires at least: 2.6
 * WC tested up to: 9.3.3
 * Text Domain: bosta-woocommerce
 * Domain Path: /languages
 *
 */

add_action('before_woocommerce_init', function () {
	if (class_exists(\Automattic\WooCommerce\Utilities\FeaturesUtil::class)) {
		\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility('custom_order_tables', __FILE__, true);
	}
});

include plugin_dir_path(__FILE__) . 'components/pickups/pickups.php';
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

add_action('admin_print_styles', 'bosta_stylesheet');
function bosta_stylesheet()
{
	$main_css_file = plugin_dir_path(__FILE__) . 'Css/main.css';
    $pickups_css_file = plugin_dir_path(__FILE__) . 'components/pickups/pickups.css';

	$main_css_version = filemtime($main_css_file);
    $pickups_css_version = filemtime($pickups_css_file);


	wp_enqueue_style(
        'myCSS', 
        plugins_url('/Css/main.css', __FILE__), 
        array(), 
        $main_css_version
    );
    wp_enqueue_style(
        'pickupsCSS', 
        plugins_url('components/pickups/pickups.css', __FILE__), 
        array(), 
        $pickups_css_version
    );
}

const BOSTA_ENV_URL_V0 = 'https://app.bosta.co/api/v0';
const BOSTA_ENV_URL_V2 = 'https://app.bosta.co/api/v2';
const PLUGIN_VERSION = '4.0.0';
const bosta_cache_duration = 86400;
const bosta_country_id_duration = 604800;
const BOSTA_EGYPT_COUNTRY_ID = "60e4482c7cb7d4bc4849c4d5";

//region Bosta Utils Functions

function bosta_send_api_request($method, $url, $APIKey = null, $body = null)
{
	$args = [
		'timeout' => 30,
		'method'  => strtoupper($method),
		'headers' => [
			'Content-Type'     => 'application/json',
			'X-Requested-By'   => 'WooCommerce',
			'X-Plugin-Version' => PLUGIN_VERSION,
		],
	];

	if (!empty($APIKey)) {
        $args['headers']['authorization'] = $APIKey;
    }

	if ($body) {
		$args['body'] = json_encode($body);
	}

	$response = wp_remote_request($url, $args);
	if (is_wp_error($response)) {
		return [
			'success' => false,
			'error'   => $response->get_error_message(),
		];
	}
	$response_body = wp_remote_retrieve_body($response);
	$response_code = wp_remote_retrieve_response_code($response);

	if ($response_code < 200 || $response_code >= 300 || empty($response_body)) {
		$decoded_body = json_decode($response_body, true);

		if (isset($decoded_body['message'])) {
			$error_message = $decoded_body['message'];
		} elseif (isset($decoded_body[0]['message'])) {
			$error_message = $decoded_body[0]['message'];
		} else {
			$error_message = 'Unknown error';
		}
		
		$error_messages = [
			'success' => false,
			'error'   => $error_message,
		];

		if (isset($decoded_body['data'])) {
			$error_messages['data'] = $decoded_body['data'];
		}

		return $error_messages;
	}

	return [
		'success' => true,
		'code'    => $response_code,
		'body'    => json_decode($response_body, true),
	];
}

function bosta_validate_api_key($bostaApiKey)
{
	if ($bostaApiKey == null) {
		return false;
	}

	$url = BOSTA_ENV_URL_V0 . '/businesses/' . esc_html($bostaApiKey) . '/info';
	$response = bosta_send_api_request('GET', $url);

	if (!$response['success']) {
		return false;
	}

	return true;
}

function bosta_get_api_key()
{
	$apikey = get_option('woocommerce_bosta_settings')['APIKey'];
	if (isset($apikey)) {
		return sanitize_text_field($apikey);
	}
}

function bosta_check_disable_bosta_zoning_checkbox()
{
	$disable_bosta_zoning = get_option('woocommerce_bosta_settings')['DisableBostaZoning'];
	return $disable_bosta_zoning === 'yes';
}

function bosta_get_country_id()
{
	$APIKey = bosta_get_api_key();
	if (empty($APIKey)) {
		return;
	}

	$url = BOSTA_ENV_URL_V0 . '/businesses/' . esc_html(bosta_get_api_key()) . '/info';
	$response = bosta_send_api_request('GET', $url);

	if (!$response['success']) {
		return BOSTA_EGYPT_COUNTRY_ID;
	} else {
		$business = $response['body'];
		$country_id = $business['country']['_id'];
		set_transient('bosta_country_id_Transient', $country_id, bosta_country_id_duration);
		return $country_id;
	}
}

function bosta_check_area_coverage($area)
{
	return isset($area['dropOffAvailability']) && $area['dropOffAvailability'] == true;
}

function bosta_get_zoning()
{
	$country_id = get_transient('bosta_country_id_Transient');
	if (!$country_id) {
		$country_id = bosta_get_country_id();
		if ($country_id == null) {
			return array();
		}
	}

	$bosta_zoning_key_cache = 'bosta_zoning';
	$bosta_zoning = get_transient($bosta_zoning_key_cache);

	if (!$bosta_zoning) {
		$url = BOSTA_ENV_URL_V2 .  '/cities/getAllDistricts?countryId=' . esc_html($country_id);
		$response = bosta_send_api_request('GET', $url);
		if (!$response['success']) {
			return array();
		}
		$bosta_zoning = $response['body']['data'];
		set_transient($bosta_zoning_key_cache, $bosta_zoning, bosta_cache_duration);
	}

	return $bosta_zoning ? $bosta_zoning : [];
}

function bosta_get_cities()
{
	$bosta_zoning = bosta_get_zoning();
	$bosta_cities = [];

	if (defined('ICL_SITEPRESS_VERSION')) {
		$current_language = apply_filters('wpml_current_language', 'ar');
		$current_language = ($current_language === 'en') ? 'en' : 'ar';
	} else {
		$current_language = 'ar';
	}
	$is_arabic = $current_language === 'ar';

	foreach ($bosta_zoning as $city) {
		if (!isset($city['cityOtherName']) || !bosta_check_area_coverage($city)) {
			continue;
		}
		$city_code = $city['cityCode'];
        $city_name = $is_arabic ? $city['cityOtherName'] : $city['cityName'];
		$bosta_cities[$city_code] = $city_name;
	}
	return $bosta_cities;
}

function bosta_get_city_areas()
{
	$bosta_zoning = bosta_get_zoning();
	
	if (defined('ICL_SITEPRESS_VERSION')) {
		$current_language = apply_filters('wpml_current_language', 'ar');
		$current_language = ($current_language === 'en') ? 'en' : 'ar';
	} else {
		$current_language = 'ar';
	}
	$is_arabic = $current_language === 'ar';

	$bosta_city_areas_cache_key = 'bosta_city_areas' . '_' . $current_language;
	$bosta_city_areas = get_transient($bosta_city_areas_cache_key);
	if (!$bosta_city_areas) {
		$bosta_city_areas = [];
		foreach ($bosta_zoning as $city) {
			$city_code = $city['cityCode'];
			$city_areas = '';
			foreach ($city['districts'] as $district) {
				$zone_name = $is_arabic ? $district['zoneOtherName'] : $district['zoneName'];
                $district_name = $is_arabic ? $district['districtOtherName'] : $district['districtName'];

				if ($zone_name === $district_name) {
                    $area = $district_name;
                } else {
                    $area = $zone_name . ' - ' . $district_name;
                }

				$city_areas .= sprintf(
					'<option value="%s">%s</option>',
					esc_attr($district['districtId']),
					esc_html($area)
				);
			}
			$bosta_city_areas[$city_code] = $city_areas;
		}
		set_transient($bosta_city_areas_cache_key, $bosta_city_areas, bosta_cache_duration);
	}
	return $bosta_city_areas ? $bosta_city_areas : [];
}

function bosta_format_failed_order_message($error_message, $order_id = null)
{
	$formatted_error_message = '<p>' . ($order_id ? '<strong>Order ID:</strong> ' . esc_html($order_id) . '<br>' : '') .
		'<strong>Reason:</strong> ' . esc_html(print_r($error_message, true)) . '</p>';
	bosta_set_transient('bosta_failed_orders', $formatted_error_message);
}

function bosta_format_date($date)
{
	try {
		$pos = strrpos($date, '(');
		$clean_date = $pos !== false ? substr($date, 0, $pos) : $date;
		$datetime = new DateTime($clean_date, new DateTimeZone('UTC'));
		$datetime->setTimezone(new DateTimeZone('Africa/Cairo'));
		return $datetime->format('l, d/m/Y h:ia');
	} catch (Exception $e) {
		error_log('Error parsing date: ' . $e->getMessage());
		return null;
	}
}

function bosta_set_transient($key, $value, $expiration = HOUR_IN_SECONDS)
{
	$existing_value = get_transient($key) ?: '';
	$updated_value = $existing_value . $value;
	set_transient($key, $updated_value, $expiration);
}

function bosta_render_pdf($pdf_data)
{
	header('Content-Type: application/pdf');
	header('Cache-Control: public, must-revalidate, max-age=0');
	header('Pragma: public');
	ob_clean();
	flush();
	echo $pdf_data;
	exit;
}

function bosta_redirect_to_settings_page()
{
	$redirect_url = admin_url('admin.php?') . 'page=wc-settings&tab=shipping&section=bosta';
	wp_redirect($redirect_url);
	exit;
}

function bosta_redirect_to_orders_page()
{
	$redirect_url = admin_url('edit.php?') . 'post_type=shop_order&paged=1';
	wp_redirect($redirect_url);
}

function bosta_redirect_to_dashboard_page()
{
	$redirect_url = 'https://bosta.co/tracking-shipments';
	wp_redirect($redirect_url);
}

function bosta_redirect_to_documentation_page()
{
	$redirect_url = 'https://docs.bosta.co/docs/plugins-and-sdks/integrate-with-woocommerce';
	wp_redirect($redirect_url);
}

function bosta_get_order_by_metadata($meta_key, $meta_value) 
{	
	$page_num = isset($_GET['page_num']) ? $_GET['page_num'] : 1;
	$query = new WC_Order_Query([
		'limit' => 1, 
		'meta_key' => $meta_key, 
		'meta_value' => $meta_value, 
		'paged' => $page_num
	]);
	$orders = $query->get_orders();
	return !empty($orders) ? $orders[0] : null;
}

function bosta_update_order_metadata($order, $bosta_data)
{
	$is_order_delivered = $bosta_data['state']['code'] == 45;
	$deliveried_at = $is_order_delivered ? bosta_format_date($bosta_data['state']['delivering']['time']) : null;
	$meta_mapping = [
		'bosta_delivery_id'     => $bosta_data['_id'] ?? null,
		'bosta_status'          => $bosta_data['state']['value'] ?? null,
		'bosta_tracking_number' => $bosta_data['trackingNumber'] ?? null,
		'bosta_customer_phone'  => $bosta_data['receiver']['phone'] ?? null,
		'bosta_delivery_date' => $deliveried_at
	];

	foreach ($meta_mapping as $meta_key => $meta_value) {
		if (!empty($meta_value)) {
			$order->update_meta_data($meta_key, $meta_value);
		}
	}
	$order->save();
}

function bosta_delete_order_metadata($order)
{
	$meta_keys = [
		'bosta_delivery_id',
		'bosta_status',
		'bosta_tracking_number',
		'bosta_customer_phone',
		'bosta_delivery_date'
	];

	foreach ($meta_keys as $meta_key) {
		$order->delete_meta_data($meta_key);
	}

	$order->save();
}
//endregion

//region Bosta Customize City Fields

add_filter('woocommerce_states', 'bosta_custom_woocommerce_states');
function bosta_custom_woocommerce_states($states)
{
	$bosta_cities = bosta_get_cities();
	$states['EG'] = $bosta_cities;
	return $states;
}

add_filter('woocommerce_checkout_fields', 'bosta_add_dynamic_area_dropdown_to_checkout', 20);
function bosta_add_dynamic_area_dropdown_to_checkout($fields)
{
	if (!bosta_check_disable_bosta_zoning_checkbox()) {
		$field_priority = 50;
		if (isset($fields['billing']['billing_state']['priority'])) {
			$field_priority = $fields['billing']['billing_state']['priority'] + 1;
		}

		$fields['billing']['billing_area'] = array(
			'type'     => 'select',
			'label'    => __('Area', 'woocommerce'),
			'required' => false,
			'options'  => array(
				'' => __('Select an option...', 'woocommerce'),
			),
			'input_class' => array(
				'wc-enhanced-select',
			),
			'priority' => $field_priority,
		);

		wc_enqueue_js("
    jQuery(document).ready(function($) {
        $(':input.wc-enhanced-select').filter(':not(.enhanced)').each(function() {
            var select2_args = { minimumResultsForSearch: 5 };
            $(this).select2(select2_args).addClass('enhanced');
        });

        $('select.wc-enhanced-select').val('').trigger('change');
		$('#billing_state').val('').trigger('change');
    });	
	");
	}

	return $fields;
}

add_action('woocommerce_admin_order_data_after_billing_address', 'bosta_add_area_dropdown_admin_order', 10, 1);
function bosta_add_area_dropdown_admin_order($order)
{
	if (!bosta_check_disable_bosta_zoning_checkbox()) {


		$current_state = get_post_meta($order->get_id(), '_billing_state', true);
		$current_area = get_post_meta($order->get_id(), '_billing_area', true);

		$bosta_city_areas = bosta_get_city_areas();
		$areas_options = '<option value="">' . __('Select an area...', 'woocommerce') . '</option>';

		if (!empty($bosta_city_areas[$current_state])) {
			$areas = explode('</option>', $bosta_city_areas[$current_state]);
			foreach ($areas as $area_option) {
				if (strpos($area_option, 'value="' . esc_attr($current_area) . '"') !== false) {
					$area_option = str_replace('<option', '<option selected="selected"', $area_option);
				}
				$areas_options .= $area_option . '</option>';
			}
		}

		echo '<p class="form-field" style="width:100%">' .
			'<label for="billing_area">' . __('Area', 'woocommerce') . '</label>' .
			'<select name="billing_area" id="billing_area" class="wc-enhanced-select">' .
			$areas_options .
			'</select>' .
			'</p>';
	}
}

add_action('wp_footer', 'bosta_enqueue_dynamic_area_dropdown_script');
add_action('admin_footer', 'bosta_enqueue_dynamic_area_dropdown_script');
function bosta_enqueue_dynamic_area_dropdown_script()
{
	if (!bosta_check_disable_bosta_zoning_checkbox()) {
		$bosta_city_areas = bosta_get_city_areas();
		$city_areas_js = json_encode($bosta_city_areas);

		$is_valid_screen = false;
		$is_checkout = is_checkout();
		$is_admin = is_admin();
		if($is_checkout) {
			$is_valid_screen = true;
		}
		if($is_admin) {
			$current_screen = get_current_screen();
			if ($current_screen && isset($current_screen->post_type) && $current_screen->post_type === 'shop_order') {
				$is_valid_screen = true;
			}
		}
		if (!$is_valid_screen) {
			return;
		}

	?>
		<script type="text/javascript">
			jQuery(function($) {
				function updateAreaDropdown(stateSelector, areaSelector, cityAreas) {
					$(document).on('change', stateSelector, function() {
						var selectedState = $(this).val();
						var areaDropdown = $(areaSelector);

						areaDropdown.empty();
						areaDropdown.append($('<option></option>').attr('value', '').text('Select an option...'));

						if (selectedState && cityAreas[selectedState]) {
							var areas = cityAreas[selectedState];
							areaDropdown.append(areas);
						} else {
							areaDropdown.append($('<option></option>').attr('value', '').text('No areas available'));
						}

						areaDropdown.trigger('change');
					});
				}

				var cityAreasJs = <?php echo $city_areas_js; ?>;

				<?php if ($is_checkout): ?>
					updateAreaDropdown('#billing_state', '#billing_area', cityAreasJs);
				<?php endif; ?>

				<?php if ($is_admin): ?>
					updateAreaDropdown('#_billing_state', '#billing_area', cityAreasJs);
				<?php endif; ?>
			});
		</script>
	<?php
	}
}

add_action('woocommerce_checkout_update_order_meta', 'bosta_save_billing_area_to_order_metadata', 10, 2);
add_action('woocommerce_process_shop_order_meta', 'bosta_save_billing_area_to_order_metadata', 10, 2);
function bosta_save_billing_area_to_order_metadata($order_id, $posted_data)
{
	if (bosta_check_disable_bosta_zoning_checkbox()) {
		return;
	}

	if (isset($_POST['billing_area'])) {
		$billing_area = sanitize_text_field($_POST['billing_area']);
		$order = wc_get_order($order_id);
		$order->update_meta_data('_billing_area', $billing_area);
		$order->save();
	}
}

//endregion

//region Bosta Notice Messages

add_action('admin_notices', 'bosta_woocommerce_notice');
function bosta_woocommerce_notice()
{
	//check if woocommerce installed and activated
	if (!class_exists('WooCommerce')) {
		echo
		'<div class="error notice-warning text-bold">
              <p>
				<img src="' . esc_url(plugins_url('assets/images/bosta.svg', __FILE__)) . '" alt="Bosta" style="height:13px; width:25px;">
				<strong>' . sprintf(esc_html__('Bosta requires WooCommerce to be installed and active. You can download %s here.'), '<a href="https://woocommerce.com/" target="_blank">WooCommerce</a>') . '</strong>
              </p>
			</div>';
	}

	$success_count = get_transient('bosta_success_count');
	if ($success_count) {
		bosta_render_success_notice($success_count);
		delete_transient('bosta_success_count');
	}

	$bosta_errors = get_transient('bosta_errors');
	if ($bosta_errors) {
		bosta_render_error_notice($bosta_errors);
		delete_transient('bosta_errors');
	}

	$failed_orders = get_transient('bosta_failed_orders');
	if ($failed_orders) {
		bosta_render_failed_orders_notice($failed_orders);
		delete_transient('bosta_failed_orders');
	}
}

function bosta_render_success_notice($success_count)
{
	if ($success_count) {
		echo '<div class="notice notice-success is-dismissible">';
		echo '<p>' . sprintf(esc_html__('%d orders successfully synced at Bosta.'), $success_count) . '</p>';
		echo '</div>';
	}
}

function bosta_render_error_notice($error_message)
{
	echo '<div class="notice notice-error is-dismissible">';
	echo $error_message;
	echo '</div>';
}

function bosta_render_failed_orders_notice($failed_orders)
{
	echo '<div class="notice notice-error is-dismissible">';
	echo '<p>Some orders failed to be synced at Bosta. <span class="toggle-details" style="cursor: pointer; color: red;">&#9660;</span></p>';
	echo '<div class="details hidden" style="max-height: 150px; overflow-y: auto; margin: 10px;">';
	echo $failed_orders;
	echo '</div>';
	echo '</div>';
	?>
	<script>
		document.addEventListener('DOMContentLoaded', () => {
			document.querySelector('.toggle-details').addEventListener('click', function() {
				const detailsSection = document.querySelector('.details');
				detailsSection.classList.toggle('hidden');
				this.innerHTML = detailsSection.classList.contains('hidden') ? '&#9660;' : '&#9650;';
			});
		});
	</script>
<?php
}

//endregion

//region Bosta Customize Orders Table 

add_filter('manage_edit-shop_order_columns', 'bosta_wco_add_columns');
add_filter('manage_woocommerce_page_wc-orders_columns', 'bosta_wco_add_columns');
function bosta_wco_add_columns($columns)
{
	$order_total = $columns['order_total'];
	$order_date = $columns['order_date'];
	$order_status = $columns['order_status'];

	unset($columns['order_date']);
	unset($columns['order_status']);
	unset($columns['order_total']);

	$columns["bosta_tracking_number"] = __("Bosta Tracking Number", "themeprefix");
	$columns['order_date'] = $order_date;
	$columns['order_status'] = $order_status;
	$columns["bosta_status"] = __("Bosta Status", "themeprefix");
	$columns["bosta_delivery_date"] = __("Delivered at", "themeprefix");
	$columns["bosta_customer_phone"] = __("Customer phone", "themeprefix");
	$columns['order_total'] = $order_total;

	return $columns;
}

add_action('manage_shop_order_posts_custom_column', 'bosta_wco_column_cb_data', 10, 2);
add_action('manage_woocommerce_page_wc-orders_custom_column', 'bosta_wco_column_cb_data', 10, 2);
function bosta_wco_column_cb_data($colName, $orderId)
{
	$order = wc_get_order($orderId);

	$status = $order->get_meta('bosta_status', true);
	$trackingNumber = $order->get_meta('bosta_tracking_number', true);
	$deliveryDate = $order->get_meta('bosta_delivery_date', true);
	$customerPhone = $order->get_meta('bosta_customer_phone', true);

	if ($colName == 'bosta_status') {
		echo !empty($status) ? esc_html($status) : "---";
	}

	if ($colName == 'bosta_tracking_number') {
		echo !empty($trackingNumber) ? esc_html($trackingNumber) : "---";
	}

	if ($colName == 'bosta_delivery_date') {
		echo !empty($deliveryDate) ? $deliveryDate : "---";
	}

	if ($colName == 'bosta_customer_phone') {
		echo !empty($customerPhone) ? esc_html($customerPhone) : "---";
	}
}

//endregion

//region Bosta Bulk Actions

add_filter('bulk_actions-edit-shop_order', 'bosta_sync_cash_collection_orders', 20);
add_filter('bulk_actions-woocommerce_page_wc-orders', 'bosta_sync_cash_collection_orders', 20);
function bosta_sync_cash_collection_orders($actions)
{
	$actions['sync_cash_collection_orders'] = __('Send Cash Collection Orders', 'woocommerce');
	return $actions;
}

add_filter('bulk_actions-edit-shop_order', 'bosta_sync', 20);
add_filter('bulk_actions-woocommerce_page_wc-orders', 'bosta_sync', 20);
function bosta_sync($actions)
{
	$actions['sync_to_bosta'] = __('Send To Bosta', 'woocommerce');
	return $actions;
}

add_filter('bulk_actions-edit-shop_order', 'bosta_print_awb', 20);
add_filter('bulk_actions-woocommerce_page_wc-orders', 'bosta_print_awb', 20);
function bosta_print_awb($actions)
{
	$actions['print_bosta_awb'] = __('Print Bosta AirWaybill', 'woocommerce');
	return $actions;
}

add_filter('handle_bulk_actions-edit-shop_order', 'bosta_handle_bulk_action', 10, 3);
add_filter('handle_bulk_actions-woocommerce_page_wc-orders', 'bosta_handle_bulk_action', 10, 3);
function bosta_handle_bulk_action($redirect_to, $action, $order_ids)
{
	$order_action = bosta_handle_order_action($action);
	if (!$order_action) {
		return;
	}

	$APIKey = bosta_get_api_key();
	if (empty($APIKey)) {
		$message = 'API Key is required to be able to sync with Bosta';
		bosta_set_transient('bosta_errors', "<p>{$message}</p>");
		bosta_redirect_to_settings_page();
		return;
	}

	$orders = wc_get_orders([
		'limit'    => -1,
		'post__in' => $order_ids,
	]);

	if (!empty($orders)) {
		switch ($order_action['actionType']) {
			case 'sync_orders':
				bosta_handle_send_orders_bulk_action([
					'APIKey'       => $APIKey,
					'redirect_to'  => $redirect_to,
					'orders'       => $orders,
					'order_action' => $order_action,
				]);
				break;

			case 'print_awbs':
				bosta_handle_print_awbs_bulk_action([
					'APIKey' => $APIKey,
					'orders' => $orders,
				]);
				break;

			case 'fetch_status':
				bosta_handle_fetch_status_bulk_action([
					'APIKey' => $APIKey,
					'redirect_to'  => $redirect_to,
					'orders' => $orders,
				]);
				break;
			default:
				throw new Exception('Unknown action type: ' . $order_action['actionType']);
		}
	}
	return $redirect_to;
}

function bosta_handle_order_action($action)
{
	switch ($action) {
		case 'sync_cash_collection_orders':
			return [
				'actionType' => 'sync_orders',
				'orderType' => 15,
				'addressType' => 'pickupAddress',
			];
		case 'sync_to_bosta':
			return [
				'actionType' => 'sync_orders',
				'orderType' => 10,
				'addressType' => 'dropOffAddress',
			];
		case 'print_bosta_awb':
			return [
				'actionType' => 'print_awbs',
			];
		case 'fetch_latest_status':
			return [
				'actionType' => 'fetch_status',
			];
		default:
			return null;
	}
}

function bosta_handle_send_orders_bulk_action($params)
{
	$APIKey = $params['APIKey'];
	$orders = $params['orders'];
	$order_action = $params['order_action'];

	$formatted_orders = [];
	foreach ($orders as $order) {
		$isOrderSyncedWithBosta = !empty($order->get_meta('bosta_tracking_number'));
		if (!$isOrderSyncedWithBosta) {
			$formatted_orders[] = bosta_format_order_payload($order, $order_action);
		}
	}

	if (empty($formatted_orders)) {
		wp_safe_redirect(add_query_arg(['post_type' => 'shop_order'], admin_url('edit.php')));
		exit;
	}

	$chunkSize = 100;
	$chunks = array_chunk($formatted_orders, $chunkSize);
	$successfulDeliveriesCount = 0;
	$allFailedDeliveries = [];
	foreach ($chunks as $chunk) {
		$url = BOSTA_ENV_URL_V2 . '/deliveries/bulk';
		$body = (object)[
			'deliveries' => $chunk,
			'deleteFailedDeliveries' => false
		];

		$response = bosta_send_api_request('POST', $url, $APIKey, $body);

		if (!$response['success']) {
			bosta_render_error_notice($response['error']);
			return;
		}

		$data = $response['body']['data'];
		$failedDeliveries = $data['failedDeliveries'] ?? [];
		$createdDeliveriesIds = $data['createdDeliveriesIds'] ?? $data;

		bosta_get_woocommerce_deliveries_data($createdDeliveriesIds, $APIKey);

		if (!empty($failedDeliveries)) {
			$allFailedDeliveries = array_merge($allFailedDeliveries, $failedDeliveries);
		}

		$successfulDeliveriesCount += count($createdDeliveriesIds);
	}

	if (!empty($allFailedDeliveries)) {
		array_walk($allFailedDeliveries, function ($failedDelivery) {
			bosta_format_failed_order_message($failedDelivery['errorMessage'], $failedDelivery['businessReference']);
		});
	}

	if ($successfulDeliveriesCount > 0) {
		set_transient('bosta_success_count', $successfulDeliveriesCount, HOUR_IN_SECONDS);
	}

	wp_safe_redirect(add_query_arg(['post_type' => 'shop_order'], admin_url('edit.php')));
	exit;
}

function bosta_handle_print_awbs_bulk_action($params)
{
	$APIKey = $params['APIKey'];
	$orders = $params['orders'];

	$delivery_ids = array_filter(array_map(function ($order) {
		return $order->get_meta('bosta_delivery_id');
	}, $orders));

	if (empty($delivery_ids)) {
		$error_message = '<p>No orders have been synced with Bosta for AWB printing</p>';
		bosta_set_transient('bosta_errors', $error_message);
		return;
	}

	$url = BOSTA_ENV_URL_V2 . '/deliveries/mass-awb?ids=' . implode(',', $delivery_ids) . '&lang=ar';
	$response = bosta_send_api_request('GET', $url, $APIKey);

	if (!$response['success']) {
		bosta_format_failed_order_message($response['error']);
		return;
	}

	$pdf_data = base64_decode($response['body']['data'], true);

	if ($pdf_data === false) {
		$error_message = '<p>Failed to decode PDF data</p>';
		bosta_set_transient('bosta_errors', $error_message);
		return;
	}

	bosta_render_pdf($pdf_data);
}

function bosta_handle_fetch_status_bulk_action($params)
{
	$APIKey = $params['APIKey'];
	$redirect_to = $params['redirect_to'];
	$orders = $params['orders'];

	$deliveriesIds = [];
	foreach ($orders as $order) {
		$deliveryId = $order->get_meta('bosta_delivery_id', true);
		if (!empty($deliveryId)) {
			$deliveriesIds[] = $deliveryId;
		}
	}

	$chunkSize = 50;
	$chunks = array_chunk($deliveriesIds, $chunkSize);
	foreach ($chunks as $chunk) {
		bosta_get_woocommerce_deliveries_data($chunk, $APIKey);
	}

	if (!empty($redirect_to)) {
		wp_safe_redirect($redirect_to);
	} else {
		wp_safe_redirect(add_query_arg(['post_type' => 'shop_order'], admin_url('edit.php')));
	}
	exit;
}

function bosta_get_woocommerce_deliveries_data($deliveriesIds, $APIKey)
{
	if (!empty($deliveriesIds)) {
		$url = BOSTA_ENV_URL_V2 . '/deliveries/woocommerce-data';
		$body = (object)[
			'deliveriesIds' => $deliveriesIds,
		];

		$response = bosta_send_api_request('POST', $url, $APIKey, $body);
		$deliveriesData = $response['body']['data'] ?? [];
		$returnedDeliveryIds = [];
		foreach ($deliveriesData as $deliveryData) {
			$order_id = substr($deliveryData['uniqueBusinessReference'], 3);
			$order = wc_get_order($order_id);
			if ($order) {
				bosta_update_order_metadata($order, $deliveryData);
			}
			$returnedDeliveryIds[$deliveryData['_id']] = $deliveryData['_id'];
		}

		if (count($deliveriesIds) !== count($returnedDeliveryIds)) {
			foreach ($deliveriesIds as $deliveryId) {
				$order = bosta_get_order_by_metadata('bosta_delivery_id', $deliveryId);
				if (!isset($returnedDeliveryIds[$deliveryId])) {

					if ($order) {
						bosta_delete_order_metadata($order);
					}
				}
			}
		}
		
	}
}

function bosta_format_order_payload($order, $order_action)
{
	$productDescription = get_option('woocommerce_bosta_settings')['ProductDescription'];
	$allowToOpenPackage = get_option('woocommerce_bosta_settings')['AllowToOpenPackage'];
	$orderRef = get_option('woocommerce_bosta_settings')['OrderRef'];

	$newOrder = new stdClass();
	$newOrder->id = $order->get_id();
	$newOrder->type = $order_action['orderType'];
	$newOrder->notes = $order->get_customer_note();
	$newOrder->uniqueBusinessReference = "WC_" . $order->get_id();
	$newOrder->specs = new stdClass();
	$newOrder->specs->packageDetails = bosta_format_package_details($order, $productDescription);

	if ($allowToOpenPackage === 'yes') {
		$newOrder->allowToOpenPackage = true;
	}

	if ($orderRef === 'yes') {
		$newOrder->businessReference = 'Woocommerce_' . $order->get_id();
	}

	$newOrder->receiver = bosta_format_receiver_details($order);
	$newOrder->{$order_action['addressType']} = bosta_format_address_details($order);
	if ($order->get_payment_method() === 'cod') {
		$newOrder->cod = (float) $order->get_total();
	}
	
	return $newOrder;
}

function bosta_format_package_details($order, $productDescription)
{
	$items = $order->get_items();
	$itemsCount = 0;
	$descArray = [];
	$index = 1;

	foreach ($items as $item) {
		$product = $item->get_product();
		$itemsCount += $item->get_quantity();
		$descArray[] = bosta_format_order_description($productDescription, $index, $product->get_sku(), $product->get_name(), $item->get_quantity());
		$index++;
	}

	$packageDetails = new stdClass();
	$packageDetails->itemsCount = $itemsCount;
	$packageDetails->description = implode(", ", $descArray);

	return $packageDetails;
}

function bosta_format_order_description($productDescription, $index, $sku, $name, $quantity)
{
	$desc = "Product_$index: ";
	if ($productDescription === 'yes') $desc .= $name;
	if (!empty($sku)) $desc .= " [$sku]";
	$desc .= " (" . $quantity . ")";

	return $desc;
}

function bosta_format_receiver_details($order)
{
	$firstname = $order->get_billing_first_name() ?: $order->get_shipping_first_name();
	$lastname = $order->get_billing_last_name() ?: $order->get_shipping_last_name();
	$receiver = new stdClass();
	$receiver->firstName = mb_substr($firstname, 0, 50);
	$receiver->lastName = $lastname;
	$receiver->phone = $order->get_billing_phone() ?: $order->get_shipping_phone();
	return $receiver;
}

function bosta_format_address_details($order)
{
	$states = WC()->countries->get_states('EG');
	$address = new stdClass();

	$address->firstLine = $order->get_billing_address_1() ?: $order->get_shipping_address_1();
	$address->secondLine = $order->get_billing_address_2() ?: $order->get_shipping_address_2();

	$city_code = $order->get_billing_state() ?: $order->get_shipping_state();
	if (isset($city_code) && isset($states[$city_code])) {
		$address->city = $states[$city_code];
	}

	$district_id = $order->get_meta('_billing_area');
	if (!empty($district_id)) {
		$address->districtId = $district_id;
	}
	return $address;
}

//endregion

//region Bosta Update and Delete Actions

add_action('wp_trash_post', 'bosta_custom_delete_function');
function bosta_custom_delete_function($id)
{
	$screen = get_current_screen();
	if (!isset($screen->post_type) || 'shop_order' != $screen->post_type) {
		return;
	}

	$order = wc_get_order($id);
	if (!$order) {
		return;
	}

	$bostaStatus = $order->get_meta('bosta_status', true);
	if ($bostaStatus != 'Pickup requested' && $bostaStatus != 'Created') {
		$error_message = '<p>Failed to delete order in the current Bosta Status</p>';
		bosta_set_transient('bosta_errors', $error_message);
		return;
	}

	$APIKey = bosta_get_api_key();
	if (empty($APIKey)) {
		$error_message = '<p>API Key is required to be able to sync with Bosta</p>';
		bosta_set_transient('bosta_errors', $error_message);
		bosta_redirect_to_settings_page();
		return;
	}

	$deliveryId = $order->get_meta('bosta_delivery_id', true);

	$url = BOSTA_ENV_URL_V2 .  '/deliveries/business/' . $deliveryId . '/terminate';

	$response = bosta_send_api_request('DELETE', $url, $APIKey);

	if (!$response['success']) {
		bosta_format_failed_order_message($response['error'], $id);
	} else {
		bosta_delete_order_metadata($order);
		$success_count = get_transient('bosta_success_count') ?: 0;
		set_transient('bosta_success_count', ++$success_count, HOUR_IN_SECONDS);
	}
}

add_action('woocommerce_update_order', 'bosta_enqueue_order_update_logic', 10, 1);
function bosta_enqueue_order_update_logic($id)
{
	if (is_admin() && isset($_POST['action']) && ($_POST['action'] === 'edit_order' || $_POST['action'] === 'editpost')) {
		set_transient('deferred_order_update', $id, 10);
		add_action('shutdown', 'bosta_handle_order_update_action');
	}
}

function bosta_handle_order_update_action()
{
	$id = get_transient('deferred_order_update');

	if (!$id) {
		return;
	}

	$order = wc_get_order($id);
	if (!$order) {
		return;
	}

	$bostaStatus = $order->get_meta('bosta_status', true);
	if (empty($bostaStatus)) {
		return;
	}

	if ($bostaStatus != 'Pickup requested' && $bostaStatus != 'Created') {
		$error_message = '<p>Failed to update order in the current Bosta Status</p>';
		bosta_set_transient('bosta_errors', $error_message);
		return;
	}

	$APIKey = bosta_get_api_key();
	if (empty($APIKey)) {
		$error_message = '<p>API Key is required to be able to sync with Bosta</p>';
		bosta_set_transient('bosta_errors', $error_message);
		// bosta_redirect_to_settings_page();
		return;
	}

	$deliveryId = $order->get_meta('bosta_delivery_id', true);
	$newOrder = bosta_format_updated_order($order);

	$url = BOSTA_ENV_URL_V2 .  '/deliveries/business/' . $deliveryId;

	$response = bosta_send_api_request('PUT', $url, $APIKey, $newOrder);

	if (!$response['success']) {
		bosta_format_failed_order_message($response['error'], $id);
	} else {
		set_transient('bosta_success_count', 1, HOUR_IN_SECONDS);
	}
}

function bosta_format_updated_order($order)
{
	$states = WC()->countries->get_states('EG');
	$newOrder = new stdClass();

	$newOrder->notes = $order->get_customer_note();

	$fullname = $order->get_billing_first_name() . ' ' . $order->get_billing_last_name();
	$newOrder->receiver = (object) [
		'fullName' => mb_substr($fullname, 0, 50),
		'phone'    => $order->get_billing_phone(),
	];

	$city_code = $order->get_billing_state();
	$city_name = null;
	if (isset($city_code) && isset($states[$city_code])) {
		$city_name = $states[$city_code];
	}

	$district_id = $order->get_meta('_billing_area');
	$district_id = !empty($district_id) ? $district_id : null;

	$newOrder->dropOffAddress = (object) [
		'firstLine'  => $order->get_billing_address_1(),
		'secondLine' => $order->get_billing_address_2(),
		'city'       => $city_name,
		'districtId' => $district_id,
	];

	return $newOrder;
}


//endregion

//region Bosta Order Page Custom Buttons

function bosta_render_custom_buttons($send_all_nonce, $fetch_status)
{
	?>
		<div class="alignleft bosta_custom_buttons_div">
			<div class="rightDiv">
				<button type="submit" name="create_pickup" class="orders-button bosta_custom_button" value="yes">Create Pickup</button>
				<button type="submit" name="send_all_orders" class="orders-button bosta_custom_button" value="yes">Send all Orders to Bosta</button>
				<input type="hidden" name="bosta_send_all_nonce_field" value="<?php echo esc_attr($send_all_nonce); ?>">
			</div>
			<div class="leftDiv">
				<button type="submit" name="fetch_status" class="danger-button bosta_custom_button" value="yes">
					<img class="refreshIcon" src="<?php echo esc_url(plugins_url("assets/images/refreshIcon.png", __FILE__)); ?>" alt="Bosta"> Refresh Bosta Status
				</button>
				<input type="hidden" name="bosta_fetch_status_nonce_field" value="<?php echo esc_attr($fetch_status); ?>">
			</div>
			<input type="hidden" name="page_num" value="<?php echo esc_attr($_GET['paged'] ?? '1'); ?>">
		</div>
	<?php
}

function bosta_render_status_search_tags()
{
?>
	<div class="alignleft">
		<p class="bosta_custom_p">Filter with Bosta status:</p>
	</div>
	<div class="alignleft bosta_status_search_tags">
		<input type="button" value="Created" onClick="document.location.href='edit.php?s=created&post_type=shop_order&paged=1'" />
		<input type="button" value="Delivered" onClick="document.location.href='edit.php?s=delivered&post_type=shop_order&paged=1'" />
		<input type="button" value="Terminated" onClick="document.location.href='edit.php?s=terminated&post_type=shop_order&paged=1'" />
		<input type="button" value="Returned" onClick="document.location.href='edit.php?s=returned&post_type=shop_order&paged=1'" />
	</div>
	<?php
}

add_filter('woocommerce_order_table_search_query_meta_keys', 'woocommerce_shop_order_search_order_total');
add_filter('woocommerce_shop_order_search_fields', 'woocommerce_shop_order_search_order_total');
function woocommerce_shop_order_search_order_total($search_fields)
{
	$search_fields[] = 'bosta_tracking_number';
	$search_fields[] = 'bosta_customer_phone';
	$search_fields[] = 'bosta_status';

	return $search_fields;
}

add_action('woocommerce_order_list_table_extra_tablenav', 'bosta_add_extra_tablenav_components_hpos', 20, 2);
function bosta_add_extra_tablenav_components_hpos($post_type, $which)
{
	if ('shop_order' !== $post_type || 'top' !== $which) {
		return;
	}

	$nonces = [
		'send_all' => wp_create_nonce('bosta_send_all_nonce'),
		'fetch_status' => wp_create_nonce('bosta_fetch_status_nonce'),
	];

	$action_handlers = [
		'create_pickup' => function () {
			$redirect_url = add_query_arg('page', 'bosta-woocommerce-create-edit-pickup', admin_url('admin.php'));
			wp_safe_redirect($redirect_url);
			exit;
		},
		'send_all_orders' => function () {
			bosta_handle_custom_bulk_action(
				'bosta_send_all_nonce',
				'bosta_send_all_nonce_field',
				'sync_to_bosta'
			);
		},
		'fetch_status' => function () {
			bosta_handle_custom_bulk_action(
				'bosta_fetch_status_nonce',
				'bosta_fetch_status_nonce_field',
				'fetch_latest_status'
			);
		},
	];

	foreach ($action_handlers as $action => $handler) {
		$value = isset($_GET[$action]) ? sanitize_text_field($_GET[$action]) : null;
		if ($value === 'yes') {
			$handler();
			break;
		}
	}

	bosta_render_custom_buttons($nonces['send_all'], $nonces['fetch_status']);
	bosta_render_status_search_tags();
}

add_action('manage_posts_extra_tablenav', 'bosta_add_extra_tablenav_components', 20);
function bosta_add_extra_tablenav_components($which)
{
	$screen = get_current_screen();
	bosta_add_extra_tablenav_components_hpos($screen->post_type, $which);
}

function bosta_handle_custom_bulk_action($nonce_action, $nonce_field, $action_type)
{
	$nonce_value = isset($_GET[$nonce_field]) ? sanitize_text_field($_GET[$nonce_field]) : null;
	if ($nonce_value && check_admin_referer($nonce_action, $nonce_field)) {
		$current_user_id = get_current_user_id();
		$current_page = isset($_GET['page_num']) ? $_GET['page_num'] : 1;
		$orders_per_page = get_user_option('edit_shop_order_per_page', $current_user_id);

		$orderIds = wc_get_orders([
			'limit' => $orders_per_page,
			'paged' => $current_page,
			'return' => 'ids',
		]);

		$redirect_url = add_query_arg('paged', $current_page, admin_url('edit.php?post_type=shop_order'));
		bosta_handle_bulk_action($redirect_url, $action_type, $orderIds);
	} else {
		wp_die(__('Invalid nonce! Something went wrong.', 'bosta'));
	}
}

//endregion

//region Bosta Settings Functions

if (!function_exists('bosta_add_custom_box')) {
	function bosta_add_custom_box()
	{
		if (class_exists('Automattic\WooCommerce\Utilities\OrderUtil') && Automattic\WooCommerce\Utilities\OrderUtil::custom_orders_table_usage_is_enabled()) {
			add_meta_box('wporg_box_id', __('My Field', 'woocommerce'), 'bosta_wporg_custom_box_html', 'woocommerce_page_wc-orders', 'side', 'core');
		} else {
			add_meta_box('wporg_box_id', __('My Field', 'woocommerce'), 'bosta_wporg_custom_box_html', 'shop_order', 'side', 'core');
		}
	}
}

add_action('add_meta_boxes', 'bosta_add_custom_box');
function bosta_wporg_custom_box_html($post)
{
	$screen = get_current_screen();
	if (!isset($screen->post_type) || 'shop_order' != $screen->post_type) {
		return;
	}

	$order = wc_get_order($post->ID);
	if (!$order) {
		return;
	}

	$APIKey = bosta_get_api_key();
	if (empty($APIKey)) {
		$error_message = '<p>API Key is required to be able to sync with Bosta</p>';
		bosta_set_transient('bosta_errors', $error_message);
		return;
	}


	$trackingNumber = $order->get_meta('bosta_tracking_number', true);

	if (empty($trackingNumber)) {
		return;
	}

	$body = [
		'trackingNumbers' => $trackingNumber,
	];

	$url = BOSTA_ENV_URL_V2 .  '/deliveries/search';
	$response = bosta_send_api_request('POST', $url, $APIKey, $body);

	if (!$response['success']) {
		bosta_format_failed_order_message($response['error'], $post->ID);
	} else {
		$delivery = $response['body']['data']['deliveries'][0];
		if ($delivery['state']['value'] != 'Created' && $delivery['state']['value'] != 'Pickup requested') {
		?>
			<script>
				let div = document.createElement("div");
				let p = document.createElement("p");
				let textnode = document.createTextNode("The order is being shipped by bosta. Any updating or deleting on the order info will not reflect to bosta system. For support email help@bosta.co");
				p.appendChild(textnode);
				div.appendChild(p);
				div.setAttribute('class', 'error error-note');
				const parent = document.getElementsByClassName("wrap")[0];
				parent.insertBefore(div, parent.children[3]);
			</script>
		<?php
		}
	}
}

add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'bosta_plugin_action_links');
function bosta_plugin_action_links($links)
{
	$plugin_links = array(
		'<a href="' . menu_page_url('bosta-woocommerce', false) . '">' . __('Settings') . '</a>',
	);
	return array_merge($plugin_links, $links);
}

add_action('plugins_loaded', 'bosta_init_shipping_class');
add_action('woocommerce_shipping_init', 'bosta_init_shipping_class');
function bosta_init_shipping_class()
{
	if (!class_exists('WooCommerce')) {
		return;
	}

	if (!class_exists('bosta_Shipping_Method')) {
		class bosta_Shipping_Method extends WC_Shipping_Method
		{
			public function __construct()
			{
				parent::__construct();

				$this->id = 'bosta';
				$this->method_title = __('Bosta Shipping', 'bosta');
				$this->method_description = __('Custom Shipping Method for bosta', 'bosta');
				$this->init();
				$this->enabled = isset($this->settings['enabled']) ? $this->settings['enabled'] : 'yes';
				$this->title = isset($this->settings['title']) ? $this->settings['title'] : __('bosta Shipping', 'bosta');
			}

			function init()
			{
				$this->init_form_fields();
				$this->init_settings();
				add_action('woocommerce_update_options_shipping_' . $this->id, array(
					$this,
					'process_admin_options',
				));
			}

			function init_form_fields()
			{
				$this->form_fields = array(
					'APIKey' => array(
						'title' => __('APIKey', 'bosta'),
						'type' => 'text',
					),
					'ProductDescription' => array(
						'label' => 'Display Woocomerce product description in AWB',
						'title' => __('Product description', 'bosta'),
						'type' => 'checkbox',
						'default' => 'yes',
					),
					'AllowToOpenPackage' => array(
						'label' => 'Allow customer to open package',
						'title' => __('Allow to open package', 'bosta'),
						'type' => 'checkbox',
						'default' => 'no',
					),
					'OrderRef' => array(
						'label' => 'Display Woocomerce order reference in AWB',
						'title' => __('Order reference', 'bosta'),
						'type' => 'checkbox',
						'default' => 'yes',
					),
					'DisableBostaZoning' => array(
						'label' => 'Disable Bosta area fields',
						'title' => __('Disable Bosta Zoning', 'bosta'),
						'type' => 'checkbox',
						'default' => 'no',
					),
					'ResetZoningCache' => array(
						'label' => 'Reset zoning cache',
						'title' => __('Reset Zoning Cache', 'bosta'),
						'type' => 'checkbox',
						'default' => 'no',
					),
				);
			}

			private function bosta_check_reset_zoning_cache_toggle()
			{
				$is_toggle_enabled = $this->get_option('ResetZoningCache') === 'yes';
				if ($is_toggle_enabled) {
					delete_transient('bosta_zoning');
					delete_transient('bosta_city_areas');
					delete_transient('bosta_country_id_Transient');

			        $this->update_option('ResetZoningCache', 'no');
				}
			}

			public function process_admin_options()
			{
				$settings_saved = parent::process_admin_options();
				$this->bosta_check_reset_zoning_cache_toggle();

				$apikey = $this->get_option('APIKey');
				if (empty($apikey)) {
					WC_Admin_Settings::add_error(__('Error: API Key is required.', 'bosta'));
					$settings_saved = false;
				} elseif (!bosta_validate_api_key($apikey)) {
					WC_Admin_Settings::add_error(__('Error: API Key is invalid.', 'bosta'));
					$settings_saved = false;
				}

				return $settings_saved;
			}
		}
	}
}

add_filter('woocommerce_shipping_methods', 'bosta_add_shipping_method');
function bosta_add_shipping_method($methods)
{
	$methods[] = 'bosta_Shipping_Method';
	return $methods;
}

add_action('admin_menu', 'bosta_setup_menu');
function bosta_setup_menu()
{
	//check if woocommerce is activated
	if (!class_exists('WooCommerce')) {
		return;
	}

	add_menu_page('Test Plugin Page', 'Bosta', 'manage_options', 'bosta-woocommerce', 'bosta_redirect_to_settings_page', esc_url(plugins_url('assets/images/bosta.svg', __FILE__)));

	// link to plugin settings
	add_submenu_page('bosta-woocommerce', 'Setting', 'Setting', 'manage_options', 'bosta-woocommerce', 'bosta_redirect_to_settings_page');

	// link to woocommerce orders
	add_submenu_page('bosta-woocommerce', 'Send Orders', 'Send Orders', 'manage_options', 'bosta-woocommerce-orders', 'bosta_redirect_to_orders_page');

	// create pickup request
	add_submenu_page('bosta-woocommerce', 'Create Pickup', 'Create Pickup', 'manage_options', 'bosta-woocommerce-create-edit-pickup', 'bosta_create_edit_pickup_form');

	//view pickups
	add_submenu_page('bosta-woocommerce', 'Pickup Requests', 'Pickup Requests', 'manage_options', 'bosta-woocommerce-view-pickups', 'bosta_view_scheduled_pickups');

	// link to bosta shipments
	add_submenu_page('bosta-woocommerce', 'Track Bosta Orders', 'Track Bosta Orders', 'manage_options', 'bosta-woocommerce-shipments', 'bosta_redirect_to_dashboard_page');

	// link to bosta documentation
	add_submenu_page('bosta-woocommerce', 'Bosta Documentation', 'Bosta Documentation', 'manage_options', 'bosta-woocommerce-documentation', 'bosta_redirect_to_documentation_page');
}

//endregion

//region Bosta Preview Functions

add_filter('woocommerce_admin_order_preview_get_order_details', 'bosta_admin_order_preview_add_custom_meta_data', 10, 2);
function bosta_admin_order_preview_add_custom_meta_data($data, $order)
{
	$APIKey = bosta_get_api_key();
	if (empty($APIKey)) {
		$message = 'API Key is required to be able to sync with Bosta';
		bosta_set_transient('bosta_errors', "<p>{$message}</p>");
		bosta_redirect_to_settings_page();
		return;
	}

	$trackingNumber = $order->get_meta('bosta_tracking_number', true);
	if (empty($trackingNumber)) {
		$message = 'Order is not synced at Bosta';
		bosta_set_transient('bosta_errors', "<p>{$message}</p>");
		return;
	}

	$url = BOSTA_ENV_URL_V2 . '/deliveries/business/' . $trackingNumber;
	$response = bosta_send_api_request('GET', $url, $APIKey);
	if (!$response['success']) {
		bosta_format_failed_order_message($response['error']);
		return;
	}
	$orderDetails = $response['body']['data'];
	$data = array_merge($data, bosta_preview_extract_order_timeline_details($orderDetails));
	$data = array_merge($data, bosta_preview_extract_order_details($orderDetails));
	$data = array_merge($data, bosta_preview_extract_customer_info($orderDetails));
	$data = array_merge($data, bosta_preview_extract_pickup_info($orderDetails));
	$data = array_merge($data, bosta_preview_extract_bosta_performance_info($orderDetails));

	return $data;
}

function bosta_preview_extract_order_timeline_details($orderDetails)
{
	$timelineData = [];

	if (!empty($orderDetails['timeline'])) {
		foreach ($orderDetails['timeline'] as $x => $timeline) {
			$timelineData["timeline_value_$x"] = $timeline['value'] ?? 'N/A';
			$timelineData["timeline_date_$x"] = isset($timeline['date']) ? bosta_format_date($timeline['date']) : 'N/A';
			$isDone = $timeline['done'] ?? false;
			$timelineData["timeline_done_$x"] = $isDone ? 'status_done' : 'status_not_done';
			if ($isDone) {
				$timelineData["timeline_next_action"] = $timeline['nextAction'] ?? 'N/A';
				$timelineData["timeline_shipment_age"] = $timeline['nextAction'] ?? 'N/A';
			}
		}
		$timelineLength = count($orderDetails['timeline']);
		set_transient('bosta_timelineLength', $timelineLength, HOUR_IN_SECONDS);
	}

	return $timelineData;
}

function bosta_preview_extract_order_details($orderDetails)
{
	return [
		'trackingNumber' => $orderDetails['trackingNumber'] ?? 'N/A',
		'status' => $orderDetails['state']['value'] ?? 'N/A',
		'type' => $orderDetails['type']['value'] ?? 'N/A',
		'cod' => $orderDetails['cod'] ?? '0',
		'createdAt' => bosta_format_date($orderDetails['createdAt']),
		'updatedAt' => bosta_format_date($orderDetails['updatedAt']),
		'itemsCount' => $orderDetails['specs']['packageDetails']['itemsCount'] ?? 'N/A',
		'notes' => $orderDetails['notes'] ?? 'N/A'
	];
}

function bosta_preview_extract_customer_info($orderDetails)
{
	return [
		'fullName' => $orderDetails['receiver']['fullName'] ?? 'N/A',
		'phone' => $orderDetails['receiver']['phone'] ?? 'N/A',
		'dropOffAddressCity' => $orderDetails['dropOffAddress']['city']['name'] ?? 'N/A',
		'dropOffAddressZone' => $orderDetails['dropOffAddress']['zone']['name'] ?? 'N/A',
		'dropOffAddressDistrict' => $orderDetails['dropOffAddress']['district']['name'] ?? 'N/A',
		'dropOffAddressFistLine' => $orderDetails['dropOffAddress']['firstLine'] ?? 'N/A',
		'dropOffAddressBuilding' => $orderDetails['dropOffAddress']['buildingNumber'] ?? 'N/A',
		'dropOffAddressFloor' => $orderDetails['dropOffAddress']['floor'] ?? 'N/A',
		'dropOffAddressApartment' => $orderDetails['dropOffAddress']['apartment'] ?? 'N/A'
	];
}

function bosta_preview_extract_pickup_info($orderDetails)
{
	return [
		'pickupAddressCity' => $orderDetails['pickupAddress']['city']['name'] ?? 'N/A',
		'pickupAddressZone' => $orderDetails['pickupAddress']['zone']['name'] ?? 'N/A',
		'pickupAddressDistrict' => $orderDetails['pickupAddress']['district']['name'] ?? 'N/A',
		'pickupAddressFistLine' => $orderDetails['pickupAddress']['firstLine'] ?? 'N/A',
		'pickupAddressBuilding' => $orderDetails['pickupAddress']['buildingNumber'] ?? 'N/A',
		'pickupAddressFloor' => $orderDetails['pickupAddress']['floor'] ?? 'N/A',
		'pickupAddressApartment' => $orderDetails['pickupAddress']['apartment'] ?? 'N/A',
		'pickupRequestId' => $orderDetails['pickupRequestId'] ?? 'N/A'
	];
}

function bosta_preview_extract_bosta_performance_info($orderDetails)
{
	$promise = 'Not started yet';
	if (!empty($orderDetails['sla'])) {
		$isExceeded = $orderDetails['sla']['e2eSla']['isExceededE2ESla'] ?? false;
		$data['promise'] = $isExceeded ? 'Not met' : 'Met';
	}

	return [
		'outboundActionsCount' => $orderDetails['outboundActionsCount'] ?? '0',
		'deliveryAttemptsLength' => $orderDetails['deliveryAttemptsLength'] ?? '0',
		'promise' => $promise
	];
}

add_action('woocommerce_admin_order_preview_start', 'bosta_custom_display_order_data_in_admin');
function bosta_custom_display_order_data_in_admin()
{
	$timelineLength = get_transient('bosta_timelineLength') ?? 0;

	?>
	<div class="container-div">
		<h4 class="table-title">Order Timeline</h4>
		<div class="timeline-table">
			<?php for ($x = 0; $x < $timelineLength; $x++): ?>
				<div class="timeline-entry">
					<div class="entry-progress">
						<span class="<?php echo "{{data.timeline_done_" . esc_attr($x) . "}}" ?>"></span>
						<span class="<?php echo "{{data.timeline_done_" . esc_attr($x) . "}}_line"; ?>"></span>
					</div>
					<div class="entry-data">
						<span class="data-title"><?php echo "{{data.timeline_value_$x}}"; ?></span>
						<span class="data-date"><?php echo "{{data.timeline_date_$x}}"; ?></span>
					</div>
				</div>
			<?php endfor; ?>
		</div>
		<div class="timeline-next-action">
			<span class="next-action-title">Next Action:</span>
			<span> {{data.timeline_next_action}} </span>
		</div>
	</div>
	<?php

	?>
	<div class="container-div">
		<h4 class="table-title">Order Details</h4>
		<div class="container-table">
			<div class="cell">
				<p class="cell-header">Bosta tracking number: </p>
				<p class="cell-data"><?php echo "{{data.trackingNumber}}"; ?></p>
			</div>
			<div class="cell">
				<p class="cell-header">Status: </p>
				<p class="cell-data"><?php echo "{{data.status}}"; ?></p>
			</div>
			<div class="cell">
				<p class="cell-header">Type: </p>
				<p class="cell-data"><?php echo "{{data.type}}"; ?></p>
			</div>
			<div class="cell">
				<p class="cell-header">Cash on delivery: </p>
				<p class="cell-data"><?php echo "{{data.cod}}"; ?></p>
			</div>
			<div class="cell">
				<p class="cell-header">Creation date: </p>
				<p class="cell-data"><?php echo "{{data.createdAt}}"; ?></p>
			</div>
			<div class="cell">
				<p class="cell-header">Last update date: </p>
				<p class="cell-data"><?php echo "{{data.updatedAt}}"; ?></p>
			</div>
			<div class="cell">
				<p class="cell-header">Items count: </p>
				<p class="cell-data"><?php echo "{{data.itemsCount}}"; ?></p>
			</div>
			<div class="cell">
				<p class="cell-header">Delivery Notes: </p>
				<p class="cell-data"><?php echo "{{data.notes}}"; ?></p>
			</div>
		</div>
	</div>
	<?php

	?>
	<div class="container-div">
		<h4 class="table-title">Customer Info</h4>
		<div class="container-table">
			<div class="cell">
				<p class="cell-header">Customer name: </p>
				<p class="cell-data"><?php echo "{{data.fullName}}"; ?></p>
			</div>
			<div class="cell">
				<p class="cell-header">Phone number: </p>
				<p class="cell-data"><?php echo "{{data.phone}}"; ?></p>
			</div>
			<div class="cell">
				<p class="cell-header">Area, City: </p>
				<p class="cell-data"><?php echo "{{data.dropOffAddressZone}} - {{data.dropOffAddressDistrict}}, {{data.dropOffAddressCity}}"; ?></p>
			</div>
			<div class="cell">
				<p class="cell-header">Customer address: </p>
				<p class="cell-data"><?php echo "{{data.dropOffAddressFistLine}}"; ?></p>
			</div>
			<div class="cell">
				<p class="cell-header">Building number: </p>
				<p class="cell-data"><?php echo "{{data.dropOffAddressBuilding}}"; ?></p>
			</div>
			<div class="cell">
				<p class="cell-header">Floor, Apartment: </p>
				<p class="cell-data"><?php echo "{{data.dropOffAddressFloor}}, {{data.dropOffAddressApartment}}"; ?></p>
			</div>
		</div>
	</div>
	<?php

	?>
	<div class="container-div">
		<h4 class="table-title">Pickup Info</h4>
		<div class="container-table">
			<div class="cell">
				<p class="cell-header">City: </p>
				<p class="cell-data"><?php echo "{{data.pickupAddressCity}}"; ?></p>
			</div>
			<div class="cell">
				<p class="cell-header">Area: </p>
				<p class="cell-data"><?php echo "{{data.pickupAddressZone}} - {{data.pickupAddressDistrict}}"; ?></p>
			</div>
			<div class="cell">
				<p class="cell-header">Street name: </p>
				<p class="cell-data"><?php echo "{{data.pickupAddressFistLine}}"; ?></p>
			</div>
			<div class="cell">
				<p class="cell-header">Building number: </p>
				<p class="cell-data"><?php echo "{{data.pickupAddressBuilding}}"; ?></p>
			</div>
			<div class="cell">
				<p class="cell-header">Floor, Apartment: </p>
				<p class="cell-data"><?php echo "{{data.pickupAddressFloor}}, {{data.pickupAddressApartment}}"; ?></p>
			</div>
			<div class="cell">
				<p class="cell-header">Pickup ID: </p>
				<p class="cell-data"><?php echo "{{data.pickupRequestId}}"; ?></p>
			</div>
		</div>
	</div>
	<?php

	?>
	<div class="container-div">
		<h4 class="table-title">Bosta Performance</h4>
		<div class="container-table">
			<div class="cell">
				<p class="cell-header" data-tooltip="Number of times Bosta tried to deliver the order">Delivery attempts:</p>
				<p class="cell-data"><?php echo "{{data.deliveryAttemptsLength}}"; ?></p>
			</div>
			<div class="cell">
				<p class="cell-header" data-tooltip="Number of calls made by the outbound team to verify the star actions and take corrective actions if needed to deliver the order on time">Outbound calls:</p>
				<p class="cell-data"><?php echo "{{data.outboundActionsCount}}"; ?></p>
			</div>
			<div class="cell">
				<p class="cell-header" data-tooltip="Bosta promises next day delivery (calculated from the pickup date) for orders with Cairo as the pickup and drop city. The expected delivery period increases to two or three days depending on the distance between the pick up and the drop off cities i.e. Alexandria, Delta or Upper Egypt.">Delivery promise:</p>
				<p class="cell-data"><?php echo "{{data.promise}}"; ?></p>
			</div>
		</div>
	</div>
	<?php
}

//endregion