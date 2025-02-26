<?php
/**
 * Plugin Name:     Embed Extended
 * Description:     Embed any external content into WordPress posts and pages. It works seamlessly on Gutenberg, Elementor, classic editor, the embed shortcode, as well as programmatically.
 * Author:          Rudy Susanto
 * Author URI:      https://profiles.wordpress.org/rsusanto/
 * Text Domain:     embed-extended
 * Domain Path:     /languages
 * Version:         1.4.0
 *
 * @package         Embed_Extended
 */

final class Embed_Extended {
	/**
	 * Plugin version.
	 */
	const VERSION = '1.4.0';

	/**
	 * Singleton pattern instance.
	 *
	 * @var Embed_Extended
	 */
	private static $instance = null;

	/**
	 * Singleton pattern method.
	 *
	 * @return Embed_Extended
	 */
	public static function instance() {
		if (null === self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Default constructor.
	 */
	private function __construct() {
		$this->basename = plugin_basename(__FILE__);
		$this->base_dir = plugin_dir_path(__FILE__);
		$this->base_url = plugin_dir_url(__FILE__);

		spl_autoload_register([$this, 'autoloader']);

		new Embed_Extended_Debug();

		add_action('plugins_loaded', [$this, 'update_db_check']);

		add_action('enqueue_block_editor_assets', [$this, 'block_editor_assets']);

		add_filter('pre_oembed_result', [$this, 'pre_oembed_result'], 10, 3);
		add_filter('rest_endpoints', [$this, 'oembed_endpoint'], 10, 1);

		add_filter('oembed_providers', [$this, 'oembed_providers'], 101, 1);

		add_action('wp_ajax_embed_extended_iframe', [$this, 'iframe_content']);
		add_action('wp_ajax_nopriv_embed_extended_iframe', [$this, 'iframe_content']);
	}

	/**
	 * Class autoloader.
	 *
	 * @param string $class The name of the class to be loaded.
	 */
	public function autoloader($class) {
		if (0 !== strpos($class, 'Embed_Extended_')) {
			return;
		}

		$class = strtolower($class);
		$path = $this->base_dir . 'includes' . DIRECTORY_SEPARATOR;
		$file = $path . 'class-' . str_replace('_', '-', $class) . '.php';

		if (file_exists($file)) {
			require_once $file;
		}
	}

	/**
	 * Check if anything needs to be updated.
	 *
	 * @since 1.3.0
	 */
	public function update_db_check() {
		$version = get_site_option('embed_extended_version', '0');

		// Result for oEmbed html is updated on version 1.3.0
		if (version_compare($version, '1.3.0') < 0) {
			Embed_Extended_Debug()->clear_cache();
			update_site_option('embed_extended_version', self::VERSION);
		}
	}

	/**
	 * Get URL of a stylesheet file.
	 *
	 * @param string $name
	 * @param string|null $version
	 * @return string
	 */
	public function get_css($name, $version = null) {
		$sep = DIRECTORY_SEPARATOR;
		$url = $this->base_url . 'assets' . $sep . 'css' . $sep . $name . '.css';

		if (is_string($version)) {
			$url .= '?ver=' . $version;
		}

		return $url;
	}

	/**
	 * Get URL of a javascript file.
	 *
	 * @param string $name
	 * @param string|null $version
	 * @return string
	 */
	public function get_js($name, $version = null) {
		$sep = DIRECTORY_SEPARATOR;
		$url = $this->base_url . 'assets' . $sep . 'js' . $sep . $name . '.js';

		if (is_string($version)) {
			$url .= '?ver=' . $version;
		}

		return $url;
	}

	/**
	 * Get template string.
	 *
	 * @param string $name Template name.
	 * @param array  $data Optional data to be passed to the template.
	 * @param array  $opts Optional settings to be applied to the template.
	 * @return string
	 */
	public function get_template($name, $data = [], $opts = []) {
		$file = $this->base_dir . 'templates' . DIRECTORY_SEPARATOR . $name . '.php';

		// Make sure we cannot override admin templates.
		if (false === strpos($name, 'admin-')) {
			/**
			 * Filters the embed template.
			 *
			 * @param string $file
			 * @param string $name
			 */
			$file = apply_filters('embed_extended_template', $file, $name);
		}

		$template = '';

		if (file_exists($file)) {
			try {
				ob_start();
				include $file;
				$template = ob_get_clean();

				if (isset($opts['trim']) && $opts['trim']) {
					$template = preg_replace('/\s+/', ' ', $template);
					$template = preg_replace('/> </', '><', $template);
				}
			} catch (Exception $e) {
				// Do nothing.
			}
		}

		return $template;
	}

	/**
	 * Load required scripts and stylesheets.
	 */
	public function block_editor_assets() {
		// Script tag is stripped on the block editor, so we need to load it manually.
		wp_enqueue_script('embed-extended', $this->get_js('embed'), [], self::VERSION);
	}

	/**
	 * Re-route the rest oEmbed endpoint so that it can handle non-fetchable URLs.
	 * This is a workaround for this issue: https://core.trac.wordpress.org/ticket/45447
	 *
	 * @param array $endpoints
	 * @return array
	 */
	public function oembed_endpoint($endpoints) {
		if (array_key_exists('/oembed/1.0/proxy', $endpoints)) {
			$endpoints['/oembed/1.0/proxy'][0]['callback'] = [$this, 'rest_endpoint_oembed'];
		}

		return $endpoints;
	}

	/**
	 * Pre-filters HTML result for non-fetchable URLs.
	 *
	 * @see WP_oEmbed::get_html()
	 *
	 * @since 1.0.1
	 *
	 * @param null|string $result
	 * @param string $url
	 * @param array $args
	 * @return null|string
	 */
	public function pre_oembed_result($result, $url, $args) {
		if (null !== $result) {
			return $result;
		}

		$wp_oembed = _wp_oembed_get_object();

		$data = $wp_oembed->get_data($url, $args);
		if (false !== $data) {
			return apply_filters('oembed_result', $wp_oembed->data2html($data, $url), $url, $args);
		}

		$fetcher = Embed_Extended_Fetcher::instance();
		$data = $fetcher->fetch($url);
		if ($data) {
			if ($data->html) {
				$result = $data->html;
			} else {
				$legacy = defined('EMBED_EXTENDED_LEGACY_CARD') && EMBED_EXTENDED_LEGACY_CARD;
				$result = $this->get_template(
					$legacy ? 'embed-content' : 'embed-iframe',
					(array) $data,
					['trim' => true]
				);
			}
		}

		return $result;
	}

	/**
	 * Extends the rest oEmbed endpoint to support non-fetchable URLs.
	 *
	 * @see WP_oEmbed_Controller::get_proxy_item()
	 *
	 * @param WP_REST_Request $request Full data about the request.
	 * @return object|WP_Error oEmbed response data or WP_Error on failure.
	 */
	public function rest_endpoint_oembed($request) {
		if (!apply_filters('embed_oembed_discover', true)) {
			$request->set_param('discover', false);
		}

		$oembed_controller = new WP_oEmbed_Controller();
		$response_data = $oembed_controller->get_proxy_item($request);

		// Handle links cannot be handled by the default oembed endpoint.
		if (is_wp_error($response_data)) {
			$fetcher = Embed_Extended_Fetcher::instance();
			$data = $fetcher->fetch($request['url']);

			if ($data) {
				if (!$data->html) {
					$legacy = defined('EMBED_EXTENDED_LEGACY_CARD') && EMBED_EXTENDED_LEGACY_CARD;
					$data->html = $this->get_template(
						$legacy ? 'embed-content' : 'embed-iframe',
						(array) $data,
						['trim' => true]
					);
				}

				$response_data = $data;

				// Save oEmbed data to the transient cache the same way built-in function does it.
				$args = $request->get_params();
				unset($args['_wpnonce']);
				$cache_key = 'oembed_' . md5(serialize($args));
				$ttl = apply_filters('rest_oembed_ttl', DAY_IN_SECONDS, $url, $args);
				set_transient($cache_key, $response_data, $ttl);
			}
		}

		return $response_data;
	}

	/**
	 * Adds support for known oEmbed providers.
	 *
	 * @since 1.1.1
	 *
	 * @param array $providers
	 * @return array
	 */
	public function oembed_providers($providers = []) {
		$providers_more = [
			/**
			 * Adds support for Wistia.
			 *
			 * @link https://wistia.com/support/developers/oembed
			 */
			'#https?://[^.]+\.(wistia\.com|wi\.st)/.*#i' => [
				'https://fast.wistia.com/oembed',
				true,
			],
		];

		return array_merge($providers, $providers_more);
	}

	/**
	 * Plugin deactivation hook.
	 *
	 * @since 1.2.1
	 */
	public function deactivate() {
		// Remove cached result upon plugin deactivation.
		Embed_Extended_Debug()->clear_cache('transient');
	}

	/**
	 * Iframe content handler.
	 *
	 * @since 1.3.0
	 */
	public function iframe_content() {
		$url = esc_url_raw($_GET['url']);

		$fetcher = Embed_Extended_Fetcher::instance();
		$data = $fetcher->fetch($url);
		$data->html = $this->get_template('embed-content', (array) $data);
		$html = $this->get_template('embed-iframe-content', (array) $data);

		wp_die($html);
		die();
	}
}

function Embed_Extended() {
	return Embed_Extended::instance();
}

Embed_Extended();

// Initialize admin class on administrator panel.
if (is_admin()) {
	new Embed_Extended_Admin();
}

// Register plugin deactivation hook.
register_deactivation_hook(__FILE__, 'embed_extended_deactivate');
function embed_extended_deactivate() {
	Embed_Extended()->deactivate();
}
