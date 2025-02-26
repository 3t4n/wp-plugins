<?php

	/**
	 * The admin-specific functionality of the plugin.
	 *
	 * @link       aiaibot
	 * @since      1.0.4
	 *
	 * @package    Aiaibot
	 * @subpackage Aiaibot/admin
	 */

	/**
	 * The admin-specific functionality of the plugin.
	 *
	 * Defines the plugin name, version, and hooks
	 *
	 * @package    Aiaibot
	 * @subpackage Aiaibot/admin
	 * @author     aiaibot <wordpress@aiaibot.com>
	 */
	class Aiaibot_Admin {

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
		 * @param      string $plugin_name The name of this plugin.
		 * @param      string $version The version of this plugin.
		 */
		public function __construct( $plugin_name, $version ) {

			$this->plugin_name = $plugin_name;
			$this->version     = $version;
		}

		/**
		 * Register the stylesheets for the admin area.
		 *
		 * @since    1.0.4
		 */
		public function enqueue_styles() {
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/aiaibot-admin.css', array(), $this->version, 'all' );
		}


		function register_config_setting() {
			// create a new record in the wp_options table for our settings, with ‘aiaibot_options’ as the option_name.

			register_setting(
				$this->plugin_name, // option group,
				$this->plugin_name, // option name
				array( $this, 'validate_settings' )
			);

			add_settings_section(
				'aiaibot_config_section', // id
				'', // title
				[ $this, 'aiaibot_section_text' ], // callback
				'aiaibot' // page
			);

			add_settings_field(
				'config_id', // id
				__( 'Integration Code', 'aiaibot' ), // title
				[ $this, 'aiaibot_config_id_render' ], // callback
				$this->plugin_name, // page
				'aiaibot_config_section' // section
			);

			add_settings_field(
				'is_enabled', // id
				__( 'Enabled', 'aiaibot' ), // title
				[ $this, 'aiaibot_is_enabled_render' ], // callback
				$this->plugin_name, // page
				'aiaibot_config_section' // section
			);
		}

		function aiaibot_config_id_render() {
			$options   = get_option( $this->plugin_name ); // Retrieves an option value based on an option name.
			$config_id = esc_attr( $options['config_id'] );
			echo "<input id='aiaibot_config_id' class='regular-text' name='aiaibot[config_id]' type='text' value='$config_id' />";
		}

		function aiaibot_is_enabled_render() {
			$options    = get_option( $this->plugin_name ); // Retrieves an option value based on an option name.
			$is_enabled = esc_attr( $options['is_enabled'] ) == '1';
			echo "<input id='aiaibot_is_enabled' class='regular-text' name='aiaibot[is_enabled]' type='checkbox' value='1'" . ( $is_enabled ? ' checked' : '' ) . "/>";
		}

		function aiaibot_section_text() {
			echo __( 'Implement your chatbot on your Wordpress page', 'aiaibot' );
		}

		function validate_settings( $input ) {
			// Do a validation
			$config_id_value_valid = ( $input && array_key_exists( 'config_id', $input ) && strlen( $input['config_id'] ) == 36 );

			if ( ! $config_id_value_valid ) {
				add_settings_error(
					'aiaibot_config_id',
					esc_attr( 'aiaibot_config_id' ),
					__( 'Config id is not valid.', 'aiaibot' )
				);

				$options            = get_option( $this->plugin_name, array( 'config_id' => '' ) );
				$input['config_id'] = esc_attr( $options['config_id'] );
			}

			return $input;
		}

		public function add_plugin_page() {
			add_options_page(
				'aiaibot chatbot', // page title
				'aiaibot chatbot', // menu title
				'manage_options', // capability
				$this->plugin_name, // menu slug
				array( $this, 'create_admin_page' )
			);
		}

		public function create_admin_page() {
			$aiaibot_url = "<a href=\"https://app.aiaibot.com\" target=\"_blank\">app.aiaibot.com</a>";
			?>
            <div class="wrap aiaibot">
                <h1><?php echo __( 'Chatbot Integration Settings', 'aiaibot' ); ?></h1>
                <form method="post" action="options.php">
					<?php
						// This prints out all hidden setting fields
						settings_fields( $this->plugin_name ); // $option_group - Output nonce, action, and option_page fields for a settings page.
						do_settings_sections( $this->plugin_name ); // $page - Prints out all settings sections added to a particular settings page
						printf(
						    /* translators: %s: url to the app.aiaibot */
							__( 'Get the integration code on %s.', 'aiaibot' ),
							$aiaibot_url );
						submit_button( __( 'Publish Chatbot', 'aiaibot' ) );
					?>
                </form>
            </div>
			<?php
		}
	}
