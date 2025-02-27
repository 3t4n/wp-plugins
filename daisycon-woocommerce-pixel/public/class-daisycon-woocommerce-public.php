<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.daisycon.com
 * @since      1.0.0
 *
 * @package    Daisycon_Woocommerce
 * @subpackage Daisycon_Woocommerce/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Daisycon_Woocommerce
 * @subpackage Daisycon_Woocommerce/public
 * @author     daisycon
 */
class Daisycon_Woocommerce_Public
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $plugin_name The ID of this plugin.
	 */
	protected $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $version The current version of this plugin.
	 */
	protected $version;

	/**
	 * The text domain
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $text -domain
	 */
	protected $text_domain = 'daisycon-woocommerce';

	/**
	 * The order.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      WC_Order $order
	 */
	private $order;

	/**
	 * The product.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      \WC_Product $product
	 */
	private $product;

	/**
	 * Custom attributes as set in the settings
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      array $custom_attributes
	 */
	private $custom_attributes = [
		'cf_one'   => 'e1',
		'cf_two'   => 'e2',
		'cf_three' => 'e3',
		'cf_four'  => 'e4',
	];

	/**
	 * Show excluding tax?
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      mixed $excl_tax
	 */
	private $excl_tax = null;

	/**
	 * Add shipping to the totals?
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      mixed $order_shipping
	 */
	private $order_shipping = null;

	/**
	 * The required fields to make this plugin work correctly.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      array $setting_fields The required setting fields of this plugin.
	 */
	protected $required_settings = ['campaign_id', 'matching_domain', 'lcc_enabled', 'commission_vat'];

	/**
	 * The option name
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string $option_name
	 */
	protected $option_name = 'daisycon_woocommerce_options';

	/**
	 * The option name
	 *
	 * @since    1.4.0
	 * @access   protected
	 * @var      string $option_name
	 */
	protected $source_name = 'woocommerce';

	/**
	 * The settings of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string|null $settings The settings of this plugin.
	 */
	protected $settings = null;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @param string $plugin_name The name of the plugin.
	 * @param string $version     The version of this plugin.
	 * @since    1.0.0
	 */
	public function __construct(string $plugin_name, string $version)
	{
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Handle the LCC cookie save, with the use of javascript.
	 * In this way the lcc url parameter is always handled correctly,
	 * even if the specific page is served from cache.
	 */
	public function daisycon_lcc_script()
	{
		$lcc_enabled = daisycon_get_setting_value('lcc_enabled');

		if ('yes' == $lcc_enabled)
		{
			$lcc_url_param = daisycon_get_setting_value('lcc_url_param');
			?>
			<script type="text/javascript">
				(function () {
					const urlParams = new URLSearchParams(window.location.search);
					const networkName = urlParams.get('<?php echo $lcc_url_param; ?>');
					if (networkName) {
						const d = new Date;
						d.setTime(d.getTime() + 24 * 60 * 60 * 1000 * 100);
						document.cookie = 'network' + "=" + networkName + ";path=<?php echo COOKIEPATH; ?>;expires=" + d.toGMTString();
					}
				})();
			</script>
			<?php
		}
	}

	/**
	 * Add the pixel to the succespage
	 *
	 * @param $order_id
	 *
	 * @return bool
	 */
	public function daisycon_add_pixel($order_id): bool
	{
		if (empty($order_id))
		{
			error_log(
				print_r('Daisycon WooCommerce Pixel: No order ID found in the "daisycon_add_pixel" function.', true)
			);

			return false;
		}

		$settings = $this->get_settings();

		foreach ($this->required_settings as $setting)
		{
			if (true === empty(daisycon_get_setting_value($setting, $settings)))
			{
				return false;
			}
		}

		$lcc_enabled = daisycon_get_setting_value('lcc_enabled', $settings);

		if ('yes' === $lcc_enabled && isset($_COOKIE['network']) && 'daisycon' !== $_COOKIE['network'])
		{
			// If LCC is enabled, but the 'from network' is SET and NOT `daisycon`.
			return '';
		}

		$this->order = wc_get_order($order_id);
		include_once(plugin_dir_path(__FILE__) . 'partials/daisycon-woocommerce-public-display.php');
		return true;
	}

	/**
	 * Get the Daisycon pixel url
	 *
	 * @return mixed
	 */
	protected function _get_daisycon_pixel_url()
	{
		$matching_domain = daisycon_get_setting_value('matching_domain');
		if (true === empty($matching_domain))
		{
			return false;
		}

		$url_string = '//%s/t/?%s';
		$variables = $this->_get_variables_query_string() . $this->_get_products_query_string();

		return apply_filters(
			'daisycon_woocommerce_pixel_url',
			sprintf($url_string, $matching_domain, $variables)
		);
	}

	/**
	 * Get the basic variables as a query string
	 *
	 * @return string
	 */
	protected function _get_variables_query_string(): string
	{
		$shipping = ($this->_excl_shipping()) ? ($this->_is_excl_tax()) ? ((float)$this->order->get_shipping_total())
			: ((float)$this->order->get_shipping_total() + (float)$this->order->get_shipping_tax()) : 0;

		$order_total = ($this->_is_excl_tax()) ? number_format(
			(float)($this->order->get_total() - $this->order->get_total_tax() - $shipping),
			wc_get_price_decimals(),
			'.',
			''
		) : number_format((float)($this->order->get_total() - $shipping), wc_get_price_decimals(), '.', '');

		if (false === defined('WC_VERSION'))
		{
			define('WC_VERSION', 'none');
		}

		$basic_variables = [
			'ci'  => daisycon_get_setting_value('campaign_id'),
			'ti'  => $this->order->get_id(),
			'np'  => count($this->order->get_items()),
			'c'   => $this->order->get_billing_country(),
			'z'   => $this->order->get_billing_postcode(),
			'cur' => $this->order->get_currency(),
			'src' => 'woocommerce_' . WC_VERSION . '|' . $this->version,
		];

		$lcc_enabled = daisycon_get_setting_value('lcc_enabled');
		if ('yes' === $lcc_enabled && !isset($_COOKIE['network']))
		{
			// If LCC is enabled, but the 'from network' is NOT SET (catch all).
			$basic_variables['ti'] = 'C' . $basic_variables['ti'];
		}

		// Coupons used? Get the first coupon used
		if ($coupon = $this->_get_used_coupons())
		{
			$basic_variables['pr'] = $coupon;
		}

		// Apply a custom filter so developers can hook into this
		$basic_variables = apply_filters('daisycon_woocommerce_pixel_basic_variables', $basic_variables, $this->order);

		return http_build_query($basic_variables);
	}

	/**
	 * Get product query string
	 *
	 * @return string
	 */
	protected function _get_products_query_string(): string
	{
		$_product_parts = '';

		/**
		 * @var \WC_Order_Item_Product $item
		 */
		foreach ($this->order->get_items() as $item)
		{
			$product = $item->get_product();

			// Variable product?
			if ($parent_id = $product->get_parent_id())
			{
				$product = new WC_Product($parent_id);
			}

			$this->product = $product;
			$item_data = $item->get_data();
			$product_id = $item->get_product_id() . '__' . $item->get_variation_id();
			$product_name = urlencode($item->get_name());
			$ordered_qty = $item_data['quantity'] ?? $item->get_quantity();
			$product_price = $this->_get_product_price($item, (int)$ordered_qty);
			$order_revenue = number_format(($product_price * $ordered_qty), wc_get_price_decimals(), '.', '');

			// No price? Skip this product
			if ($product_price < 0.001)
			{
				continue;
			}

			$product_variables = [
				'pn'  => $product_name,
				'sku' => $product->get_sku(),
				'a'   => $order_revenue,
				'iv'  => $product_name,
				'r'   => $order_revenue,
				'qty' => number_format($ordered_qty, 0, '.', ''),
				'cc'  => $this->_get_first_category($product),
				'e5'  => $product_id,
			];

			// Add the custom cc value if this product has one set
			if ($custom_cc = get_post_meta($product->get_id(), '_daisycon_cc', true))
			{
				$product_variables['cc'] = $custom_cc;
			}

			// If there are any customer attributes set, add them to the array
			$custom_attributes = $this->_get_custom_attributes();
			if (!empty($custom_attributes))
			{
				$product_variables = array_merge($product_variables, $custom_attributes);
			}

			// Apply a custom filter so developers can hook into this
			$product_variables = apply_filters('daisycon_woocommerce_pixel_product_variables', $product_variables, $product);

			$_product_parts .= '&p[]=';
			$part_string = '{%s:%s}';
			foreach ($product_variables as $variable_key => $variable_value)
			{
				$_product_parts .= sprintf($part_string, $variable_key, esc_attr($variable_value));
			}
		}

		return $_product_parts;
	}

	/**
	 * Get the product price
	 *
	 * @param int $ordered_qty
	 *
	 * @return string
	 */
	protected function _get_product_price(WC_Order_Item_Product $item, int $ordered_qty): string
	{
		$product_price = ($this->_is_excl_tax())
			? ($item->get_total() / $ordered_qty) : ($item->get_total()
				/ $ordered_qty) + ($item->get_total_tax() / $ordered_qty);

		return number_format((float)($product_price), wc_get_price_decimals(), '.', '');
	}

	/**
	 * @param WC_Product $product
	 *
	 * @return string
	 */
	protected function _get_first_category(WC_Product $product): string
	{
		$categories = $product->get_category_ids();
		if (is_array($categories) && isset($categories[0]))
		{
			if ($term = get_term_by('id', $categories[0], 'product_cat'))
			{
				return urlencode(esc_attr($term->name));
			}
		}

		return 'undefined';
	}

	/**
	 * Return the first coupon if present
	 *
	 * @return mixed
	 */
	protected function _get_used_coupons()
	{
		if ($coupons = $this->order->get_coupon_codes())
		{
			$coupons = apply_filters('daisycon_woocommerce_pixel_used_coupons', $coupons);

			if (is_array($coupons) && !empty($coupons))
			{
				return reset($coupons);
			}
		}

		return false;
	}

	/**
	 * Get the custom attributes from the settings and add them to the array
	 *
	 * @return array
	 */
	protected function _get_custom_attributes(): array
	{
		$custom_attributes = [];

		foreach ($this->custom_attributes as $custom_attribute => $index)
		{
			if ($setting_value = daisycon_get_setting_value($custom_attribute))
			{
				if ($value = $this->product->get_attribute($setting_value))
				{
					$custom_attributes[$index] = $value;
				}
				elseif ($value = get_post_meta($this->product->get_id(), $setting_value, true))
				{
					$custom_attributes[$index] = $value;
				}
				elseif ($value = get_post_meta($this->product->get_id(), '_' . $setting_value, true))
				{
					$custom_attributes[$index] = $value;
				}
			}
		}

		return $custom_attributes;
	}

	/**
	 * Order is set to show excluded tax?
	 *
	 * @return bool
	 */
	protected function _is_excl_tax(): bool
	{
		if (is_null($this->excl_tax))
		{
			$price_excl_tax = daisycon_get_setting_value('commission_vat');
			$this->excl_tax = ($price_excl_tax ?? '') === 'excl';
		}

		return (bool)$this->excl_tax;
	}

	/**
	 * Add shipping to the totals?
	 *
	 * @return bool
	 */
	protected function _excl_shipping(): bool
	{
		if (is_null($this->order_shipping))
		{
			$this->order_shipping = false;
		}

		return (bool)$this->order_shipping;
	}

	/**
	 * Get and set the settings
	 *
	 * @return mixed
	 */
	protected function get_settings()
	{
		if (is_null($this->settings))
		{
			$this->settings = get_option($this->option_name);
		}

		return $this->settings;
	}

}
