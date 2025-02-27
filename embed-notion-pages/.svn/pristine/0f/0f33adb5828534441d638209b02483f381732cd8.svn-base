<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://www.embednotionpages.com
 * @since      1.0.0
 *
 * @package    Embed_Notion_Pages
 * @subpackage Embed_Notion_Pages/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Embed_Notion_Pages
 * @subpackage Embed_Notion_Pages/includes
 * @author     Embed Notion Pages <contact@embednotionpages.com>
 */
class Embed_Notion_Pages
{

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Embed_Notion_Pages_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct()
	{
		if (defined('EMBED_NOTION_PAGES_VERSION')) {
			$this->version = EMBED_NOTION_PAGES_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'embed-notion-pages';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Embed_Notion_Pages_Loader. Orchestrates the hooks of the plugin.
	 * - Embed_Notion_Pages_i18n. Defines internationalization functionality.
	 * - Embed_Notion_Pages_Admin. Defines all hooks for the admin area.
	 * - Embed_Notion_Pages_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies()
	{

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-embed-notion-pages-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-embed-notion-pages-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-embed-notion-pages-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'public/class-embed-notion-pages-public.php';

		$this->loader = new Embed_Notion_Pages_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Embed_Notion_Pages_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale()
	{

		$plugin_i18n = new Embed_Notion_Pages_i18n();

		$this->loader->add_action('plugins_loaded', $plugin_i18n, 'load_plugin_textdomain');

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks()
	{

		$plugin_admin = new Embed_Notion_Pages_Admin($this->get_plugin_name(), $this->get_version());

		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks()
	{

		$plugin_public = new Embed_Notion_Pages_Public($this->get_plugin_name(), $this->get_version());

		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run()
	{
		$this->loader->add_action('init', $this, 'register_shortcodes');
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name()
	{
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Embed_Notion_Pages_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader()
	{
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version()
	{
		return $this->version;
	}


	public function register_shortcodes()
	{
		add_shortcode('notion', array($this, 'embed_notion_pages_shortcode'));
	}

	private function get_embed_url($embed_id)
	{
		// Try to get the cached data
		$transient_key = 'embed_notion_' . $embed_id;
		$embed_url = get_transient($transient_key);

		// If the cached data does not exist
		if (false === $embed_url) {
			$url = 'https://www.embednotionpage.com/api/embeds/' . $embed_id;
			$response = wp_remote_get($url);

			if (is_wp_error($response) || 200 !== wp_remote_retrieve_response_code($response)) {
				return '';
			}

			$body = wp_remote_retrieve_body($response);
			$data = json_decode($body, true);
			$embed_url = $data['embedUrl'] ?? '';

			// Cache the data for 12 hours
			set_transient($transient_key, $embed_url, 12 * HOUR_IN_SECONDS);
		}

		return $embed_url;
	}
	public function embed_notion_pages_shortcode($atts)
	{
		$a = shortcode_atts(
			array(
				'id' => 'NotionPageID',
			),
			$atts
		);

		// Make a GET request to the REST API

		$embed_url = $this->get_embed_url($a['id']);



		// If the request is successful
		if (!empty($embed_url)) {
			// Use the embed URL from the REST API in the iframe
			return '<div style="position: relative;min-width: 600px;"><iframe src="' . esc_url($embed_url) . '" style="width: 100%; height: 500px; border: none !important; padding: 0;"></iframe></div>';

		}

		// If the request fails, display an error message
		return '<p>Error retrieving Notion page. Please check the page ID and try again.</p>';
	}
}
