<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://wildrobot.app/wildrobot-logistra-cargonizer-woocommerce-integrasjon/
 * @since      1.0.0
 *
 * @package    Wildrobot_Logistra
 * @subpackage Wildrobot_Logistra/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wildrobot_Logistra
 * @subpackage Wildrobot_Logistra/public
 * @author     Robertosnap <robertosnap@pm.me>
 */
class Wildrobot_Logistra_Public
{

	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		add_action('wp_ajax_logistra_save_service_partner', array($this, 'save_service_partner_to_session'));
		add_action('wp_ajax_nopriv_logistra_save_service_partner', array($this, 'save_service_partner_to_session'));
		add_filter('logistra_robots_service_partner_select', array($this, "logistra_robots_cart_shipping_template_args"), 1, 2);
		// Cart
		add_action("woocommerce_cart_totals_after_shipping", array($this, "add_pickup_point_to_cart"));
		// Checkout
		add_action("woocommerce_review_order_after_shipping", array($this, "add_pickup_point_to_cart"), 1);
	}

	function wildrobot_logistra_locate_template($template, $template_name, $template_path)
	{
		global $woocommerce;
		$_template = $template;
		if (!$template_path)
			$template_path = $woocommerce->template_url;

		// $plugin_path  = untrailingslashit(plugin_dir_path(__FILE__))  . '/template/woocommerce/';
		$plugin_path  = plugin_dir_path(dirname(__FILE__)) . 'templates/woocommerce/';
		// $plugin_path  = plugin_dir_path(dirname(__FILE__) . '/template/woocommerce/');

		// Look within passed path within the theme - this is priority
		$template = locate_template(
			array(
				$template_path . $template_name,
				$template_name
			)
		);

		if (!$template && file_exists($plugin_path . $template_name))
			$template = $plugin_path . $template_name;

		if (!$template)
			$template = $_template;

		return $template;
	}

	public function add_picklist_to_page($content = null)
	{
		$page_id = get_the_ID();
		if (is_page() && (get_option("wildrobot_logistra_picklist_active") === "yes")  && !empty($page_id)) {
			if ($page_id == get_option('wildrobot_logistra_picklist_page', null)) {
				$content = '<div id="wildrobot-complete-picklist-order">Laster plukkliste fullføring...</div>';
			}
		}
		return $content;
	}

	public function add_service_partner_picker_field($fields)
	{
		$fields['billing']['shipping_service_partner'] = array(
			'label'     => __('Utleveringssted', 'logistra-robots'),
			'placeholder'   => _x('Velg utleveringssted', 'placeholder', 'logistra-robots'),
			'required'  => false,
			'class'     => array('form-row-wide hidden'),
			'clear'     => true,
			'type' => 'text',
		);

		return $fields;
	}

	public function save_service_partner_to_session()
	{
		check_ajax_referer('wildrobot_logistra_select_servicepartner', 'nonce');

		$service_partner_number = sanitize_text_field($_POST['service_partner_number']);
		$service_partner_customer_number = sanitize_text_field($_POST['service_partner_customer_number']);
		$service_partner_name = sanitize_text_field($_POST['service_partner_name']);
		$service_partner_postcode = sanitize_text_field($_POST['service_partner_postcode']);
		$service_partner_city = sanitize_text_field($_POST['service_partner_city']);
		$service_partner_country = sanitize_text_field($_POST['service_partner_country']);
		$chosen_shipping_methods = maybe_serialize(WC()->session->get('chosen_shipping_methods'));

		WC()->session->set('wildrobot_logistra_service_partner_number', $service_partner_number);
		WC()->session->set('wildrobot_logistra_service_partner_customer_number', $service_partner_customer_number);
		WC()->session->set('wildrobot_logistra_service_partner_name', $service_partner_name);
		WC()->session->set('wildrobot_logistra_service_partner_postcode', $service_partner_postcode);
		WC()->session->set('wildrobot_logistra_service_partner_city', $service_partner_city);
		WC()->session->set('wildrobot_logistra_service_partner_country', $service_partner_country);
		WC()->session->set('wildrobot_logistra_service_partner_for_chosen_shipping_methods', $chosen_shipping_methods);
		wp_send_json_success();
	}

	function wildrobot_logistra_woocommerce_checkout_process($order_id, $posted_data, $order)
	{

		$service_partner_number = WC()->session->get('wildrobot_logistra_service_partner_number');
		$service_partner_customer_number = WC()->session->get('wildrobot_logistra_service_partner_customer_number');
		$service_partner_name = WC()->session->get('wildrobot_logistra_service_partner_name');
		$service_partner_postcode = WC()->session->get('wildrobot_logistra_service_partner_postcode');
		$service_partner_city = WC()->session->get('wildrobot_logistra_service_partner_city');
		$service_partner_country = WC()->session->get('wildrobot_logistra_service_partner_country');

		if (!empty($service_partner_number)) {
			$order->update_meta_data("_wildrobot_logistra_service_partner_number", $service_partner_number);
			$order->update_meta_data("_wildrobot_logistra_service_partner_customer_number", $service_partner_customer_number);
			$order->update_meta_data("_wildrobot_logistra_service_partner_name", $service_partner_name);
			$order->update_meta_data("_wildrobot_logistra_service_partner_postcode", $service_partner_postcode);
			$order->update_meta_data("_wildrobot_logistra_service_partner_city", $service_partner_city);
			$order->update_meta_data("_wildrobot_logistra_service_partner_country", $service_partner_country);
			$order->save();
			WC()->session->__unset('wildrobot_logistra_service_partner_number');
			WC()->session->__unset('wildrobot_logistra_service_partner_customer_number');
			WC()->session->__unset('wildrobot_logistra_service_partner_name');
			WC()->session->__unset('wildrobot_logistra_service_partner_postcode');
			WC()->session->__unset('wildrobot_logistra_service_partner_city');
			WC()->session->__unset('wildrobot_logistra_service_partner_country');
			WC()->session->__unset('wildrobot_logistra_service_partner_for_chosen_shipping_methods');
			return;
		}

		// TO BE DEPRECATED
		if (isset($_POST["logistra_robots_select_servicepartner"]) && !empty($_POST["logistra_robots_select_servicepartner"])) {
			$service_partner_number = $_POST["logistra_robots_select_servicepartner"];
		} else if (isset($_POST["shipping_service_partner"]) && !empty($_POST["shipping_service_partner"])) {
			$service_partner_number = $_POST["shipping_service_partner"];
		}
		if (!empty($service_partner_number)) {
			$order->update_meta_data("_shipping_service_partner", $service_partner_number);
			$order->save();
		}
	}

	public function stop_checkout_if_service_partner_not_set($order_id)
	{
		$chosen_shipping_methods = WC()->session->get('chosen_shipping_methods');
		$shipping_methods = WC()->shipping()->get_shipping_methods();

		foreach ($chosen_shipping_methods as $chosen_method) {
			if (strpos($chosen_method, 'logistra_robots_shipping_method') !== false) {
				list($method_id, $instance_id) = explode(':', $chosen_method);
				if (isset($shipping_methods[$method_id])) {
					$shipping_method = new $shipping_methods[$method_id]($instance_id);
					if (method_exists($shipping_method, 'get_option')) {
						$require_service_partner = $shipping_method->get_option('require_service_partner');
						if ($require_service_partner === 'yes') {
							$service_partner_number = WC()->session->get('wildrobot_logistra_service_partner_number');
							$service_partner_for_chosen_shipping_methods = maybe_unserialize(WC()->session->get('wildrobot_logistra_service_partner_for_chosen_shipping_methods'));
							if (empty($service_partner_number) || !in_array($chosen_method, $service_partner_for_chosen_shipping_methods)) {
								wc_add_notice(__('Må velge utleveringssted på denne fraktmetoden.', 'logistra-robots'), 'error');
								return;
							}
						}
					}
				}
			}
		}
	}


	/**
	 * Generates the service partner object for the cart shipping template based on the selected shipping method.
	 *
	 * This function retrieves the delivery relation and transport agreement based on the chosen shipping method.
	 * It checks if service partners are possible and filters out certain carriers. It then fetches service partners
	 * based on the destination postcode and country. The function returns a service partner object which includes
	 * details like carrier name, identifier, and available service partners.
	 *
	 * @param object $service_partner_object An object to be populated with service partner details.
	 * @param array $args An array containing shipping method and destination details. Minimum values required are "chosen_method" and "package" with "destination" containing "postcode" and "country".
	 * [
	 * 	"chosen_method": string,
	 * 	"package": [
	 * 		"destination": [
	 * 			"postcode": string,
	 * 			"country": string
	 * 		]
	 * 	]
	 * ]
	 * @return object|bool Returns the service partner object with populated details or false on failure.
	 * {
	 * 	"carrier_name": string,
	 * 	"carrier_identifier": string,
	 * 	"service_partner_possible": bool,
	 * 	"requires_service_partner": bool,
	 * 	"service_partners": array,
	 * 	"service_partner_select_values": array
	 * }
	 */
	function logistra_robots_cart_shipping_template_args($service_partner_object, $args = [])
	{
		try {
			$packages = WC()->shipping()->get_packages();
			foreach ($packages as $i => $package) {
				$chosen_method = isset(WC()->session->chosen_shipping_methods[$i]) ? WC()->session->chosen_shipping_methods[$i] : '';
				$package = $packages[$i];
				if (!empty($chosen_method)) {
					break;
				}
			}
			if (empty($chosen_method) || empty($package)) {
				return false;
			}

			$delivery_realtion = Wildrobot_Logistra_DB::get_delivery_relation_with_transport_agreement($chosen_method);
			if (empty($delivery_realtion)) {
				return false;
			}
			$transportAgreement = $delivery_realtion["transport_agreement"];
			$service_partner_possible = false;
			if ($transportAgreement["service_partner_possible"]) {
				$service_partner_possible = true;
			}
			if (in_array($transportAgreement["identifier"], ["bring_small_parcel_a_no_rfid", "bring_small_parcel_a", "bring2_small_parcel_a_no_rfid", "bring2_small_parcel_a", "postnord_mypack_home_small"])) {
				$service_partner_possible = false;
			}
			$carrier_identifier = $transportAgreement["ta_carrier"]["identifier"];
			$carrier_name = $transportAgreement["ta_carrier"]["name"];

			$postcode = $package["destination"]["postcode"];
			$country = $package["destination"]["country"];
			$address_1 = $package["destination"]["address"];
			$city = $package["destination"]["city"];
			if (empty($postcode)) {
				return false;
			}
			$service_partner_type = null;
			foreach ($delivery_realtion["services"] as $service) {
				if ($service === "wildrobot_only_manned_service_partner") {
					$service_partner_type = "manned";
				}
				if ($service === "wildrobot_only_unmanned_service_partner") {
					$service_partner_type = "locker";
				}
			}
			$res = Wildrobot_Logistra_Cargonizer::get_service_partners(
				$country,
				$postcode,
				$carrier_identifier,
				$delivery_realtion["wr_id"],
				empty($address_1) ? null : $address_1,
				empty($city) ? null : $city,
				$service_partner_type
			);
			if (empty($res["service_partners"])) {
				$service_partner_possible = false;
			}

			$service_partner_key_label = [
				"" => get_option("wildrobot_logistra_service_partner_select_default_value", "Velg nærmeste for meg"),
			];
			foreach ($res["service_partners"] as $service_partner) {
				$key = $service_partner["number"] . "@@@" .
					(is_string($service_partner["customer-number"]) ? $service_partner["customer-number"] : "");
				$service_partner_key_label[$key] = $service_partner["name"] . ", " . $service_partner["postcode"] . ($service_partner["city"] === "Unknown" ? "" : ", " . $service_partner["city"]);
			}

			$service_partner_object = (object) [
				"carrier_name" => $carrier_name,
				"carrier_identifier" => $carrier_identifier,
				"service_partner_possible" => $service_partner_possible,
				"requires_service_partner" => $transportAgreement["requires_service_partner"],
				"service_partners" => $res["service_partners"],
				"service_partner_select_values" => $service_partner_key_label,
				// "service_partner_select_objects" => $service_partner_select_objects,
			];

			return apply_filters("logistra_robots_cart_shipping_service_partner_object", $service_partner_object);
		} catch (\Throwable $error) {
			return false;
		}
	}
	/**
	 * Adds pickup point selection to cart totals if enabled
	 * Hooked to: woocommerce_cart_totals_after_shipping
	 */
	public function add_pickup_point_to_cart()
	{
		// Early return if pickup point is not enabled
		if (get_option("wildrobot_logistra_pickuppoint_checkout_inline_hook") !== "yes") {
			return;
		}

		$service_partner_object = self::logistra_robots_cart_shipping_template_args(null);

		// Early return if service partner is not possible
		if (!$service_partner_object || !$service_partner_object->service_partner_possible) {
			return;
		}

		// Get current service partner value from session
		$value = !empty(WC()->session->get('wildrobot_logistra_service_partner_number'))
			? WC()->session->get('wildrobot_logistra_service_partner_number') . "@@@" .
			WC()->session->get('wildrobot_logistra_service_partner_customer_number')
			: null;

		// Add data attributes instead of wp_localize_script
		$service_partner_data = array(
			'servicePartners' => $service_partner_object->service_partners,
			'ajaxUrl' => admin_url('admin-ajax.php'),
			'nonce' => wp_create_nonce('wildrobot_logistra_select_servicepartner')
		);
?>
		<tr class="woocommerce-wildrobot-pickuppoint-checkout-inline"
			data-logistra-service-partner='<?php echo esc_attr(json_encode($service_partner_data)); ?>'>
			<th><?php echo esc_html__('Utleveringssted', 'logistra-robots'); ?></th>
			<td>
				<?php
				woocommerce_form_field("logistra_robots_select_servicepartner", [
					'type'          => 'select',
					'class'         => array('logistra_robots_select_servicepartner form-row-wide'),
					'required'      => false,
					'options'       => $service_partner_object->service_partner_select_values,
					'default'       => $value,
				]);
				?>
			</td>
		</tr>
<?php
	}

	public function enqueue_styles()
	{
		// wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/ReactToastify.css', array(), $this->version, 'all');
	}

	public function enqueue_scripts()
	{

		$pickup_page_id = (int) get_option('wildrobot_logistra_picklist_page');
		$current_page_id = get_queried_object_id();
		$is_pickup_page = $current_page_id == $pickup_page_id;

		// Get current page ID
		// Only enqueue scripts on cart, checkout, or pickup page
		if (!is_cart() && !is_checkout() && !$is_pickup_page) {
			return;
		}
		$php_to_js_variables = array(
			'version' => $this->version,
			'wc_ajax_url' => WC()->ajax_url(),
			'security' => wp_create_nonce("randomTextForLogistraIntegration"),
		);

		$options = Wildrobot_Logistra_Options::get_public_options();

		$plugin_js = self::get_js_file_path('partials/frontend', 'public');
		wp_enqueue_script($this->plugin_name . "-public-js", $plugin_js, ['wp-element'], $this->version, true);
		wp_localize_script($this->plugin_name . '-public-js', 'wildrobotLogistraPublic', array_merge($php_to_js_variables, $options));

		// Enqueue the service partner handler script
		wp_enqueue_script(
			$this->plugin_name . '-service-partner',
			plugin_dir_url(__FILE__) . 'js/service-partner-handler.js',
			array('jquery'),
			$this->version,
			true
		);
	}

	private static function get_js_file_path($folder, $file)
	{
		$files = glob(plugin_dir_path(__FILE__) . $folder . '/' . $file . '*.js');
		if (!empty($files)) {
			$full_path = $files[0];
			$app_pos = strpos($full_path, $file . '.');
			$file_name = substr($full_path, $app_pos);
			return plugin_dir_url(__FILE__) . $folder . '/' . $file_name;
		} else {
			return 'http://localhost:3000/static/js/client.js';
		}
	}
}
