<?php

	/**
	 * The public-facing functionality of the plugin.
	 *
	 * @link       aiaibot
	 * @since      1.0.4
	 *
	 * @package    Aiaibot
	 * @subpackage Aiaibot/public
	 */

	/**
	 * The public-facing functionality of the plugin.
	 *
	 * Defines the plugin name, version, and two examples hooks for how to
	 * enqueue the public-facing stylesheet and JavaScript.
	 *
	 * @package    Aiaibot
	 * @subpackage Aiaibot/public
	 * @author     aiaibot <wordpress@aiaibot.com>
	 */
	class Aiaibot_Public {

		/**
		 * The ID of this plugin.
		 *
		 * @since    1.0.4
		 * @access   private
		 * @var      string $plugin_name The ID of this plugin.
		 */
		private $plugin_name;

		/**
		 * The version of this plugin.
		 *
		 * @since    1.0.4
		 * @access   private
		 * @var      string $version The current version of this plugin.
		 */
		private $version;

		/**
		 * Initialize the class and set its properties.
		 *
		 * @since    1.0.4
		 *
		 * @param      string $plugin_name The name of the plugin.
		 * @param      string $version The version of this plugin.
		 */
		public function __construct( $plugin_name, $version ) {

			$this->plugin_name = $plugin_name;
			$this->version     = $version;

		}

		/**
		 * Register the JavaScript for the public-facing side of the site.
		 *
		 * @since    1.0.4
		 */
		public function enqueue_scripts() {

			/**
			 * This function is provided for demonstration purposes only.
			 *
			 * An instance of this class should be passed to the run() function
			 * defined in Aiaibot_Loader as all of the hooks are defined
			 * in that particular class.
			 *
			 * The Aiaibot_Loader will then create the relationship
			 * between the defined hooks and the functions defined in this
			 * class.
			 */

			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/aiaibot-public.js', array( 'jquery' ), $this->version, false );

			$options    = get_option( 'aiaibot' );
			$config_id  = esc_attr( $options['config_id'] );
			$is_enabled = esc_attr( $options['is_enabled'] ) == TRUE;

			$scriptData = array(
				'key' => $is_enabled ? $config_id: null,
				'version' => $this->version,
			);

			wp_localize_script( $this->plugin_name, 'aiaibotData', $scriptData );
		}

	}
