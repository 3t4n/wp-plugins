<?php

namespace G_Smtp;

use G_Smtp\Traits\Singleton;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Class Options
 */
class Options {

	use Singleton;

	const SEND_TEST_EMAIL_NONCE = 'g_smtp_send_test_email';

	/**
	 * @var string OPTIONS_NAME
	 */
	const OPTIONS_NAME = 'g-smtp-options';

	/**
	 * @var string OPTIONS_CAP
	 */
	const OPTIONS_CAP = 'manage_options';

	/**
	 * @var string DIRECTORY_FILE
	 */
	const DIRECTORY_FILE = 'g-smtp/g-smtp.php';

	/**
	 * @var array $option_fields List
	 */
	private $option_fields = null;

	/**
	 * @var array $option_tabs List
	 */
	private $option_tabs = null;

	/**
	 * Init function
	 *
	 * @return void
	 */
	public function init() {
		if ( is_admin() ) {
			add_action( 'admin_menu', [ $this, 'register_options_page' ] );
			add_action( 'admin_init', [ $this, 'options_init' ] );
			add_action( 'admin_init', [ $this, 'make_options' ] );

			add_filter( 'option_page_capability_' . self::OPTIONS_NAME . '-group', [ $this, 'set_option_page_capability' ] );
			add_filter( 'plugin_action_links_' . self::DIRECTORY_FILE, [ $this, 'add_settings_button' ] );

			add_action( 'wp_ajax_g_smtp_test_email', [ $this, 'send_test_email' ] );
		}
	}

	/**
	 * Send test e-mail to the current user
	 *
	 * @return void
	 */
	public function send_test_email() {
		if ( ! is_user_logged_in() || ! current_user_can( 'manage_options' ) ) {
			wp_send_json_error( esc_html__( 'Unauthorized', 'g-smtp' ), 403 );
			exit;
		}

		if ( ! isset( $_POST['security'] ) || ! wp_verify_nonce( $_POST['security'], self::SEND_TEST_EMAIL_NONCE ) ) {
			wp_send_json_error( esc_html__( 'Unauthorized', 'g-smtp' ), 403 );
			exit;
		}

		$user = wp_get_current_user();

		global $phpmailer;

		$headers = [
			'Content-Type: text/html',
		];

		$email = ! empty( $_POST['email'] ) ? sanitize_email( $_POST['email'] ) : '';

		if ( empty( $email ) ) {
			$email = $user->user_email;
		}

		$result = wp_mail(
			$email,
			esc_html__( 'G-SMTP test e-mail', 'g-smtp' ),
			esc_html__( 'It works!', 'g-smtp' ),
			$headers
		);

		if ( $result ) {
			wp_send_json_success(
				[
					'message' => sprintf(
						/* translators: %s is the email address where the email was sent */
						esc_html__( 'Test e-mail was sent to "%s" successfully! If you haven\'t received an e-mail, please check your junk mail.', 'g-smtp' ),
						$email
					),
				]
			);
		} else {
			wp_send_json_error(
				[
					// phpcs:ignore
					'message' => $phpmailer->ErrorInfo,
				],
				500
			);
		}
	}

	/**
	 * Adds a settings link to this plugin's entry on the plugin list
	 *
	 * @param array $links
	 *
	 * @return array
	 */
	public function add_settings_button( $links ) {
		$links[] = "<a href='options-general.php?page=" . esc_attr( self::OPTIONS_NAME ) . "'>" . esc_html__( 'Settings' ) . '</a>';

		return $links;
	}

	/**
	 * Set capability for option page
	 *
	 * @param string $cap Default capability
	 *
	 * @return string
	 */
	public function set_option_page_capability( $cap ) {
		$cap = self::OPTIONS_CAP;

		return $cap;
	}

	/**
	 * Get option if exists else return default value
	 *
	 * @param string $name Name of the option
	 * @param string $default Default value
	 * @param string $suffix Suffix for fetching the value, used for language properties for instance
	 * @return string
	 */
	public static function get_option( $name, $default = '', $suffix = '' ) {
		$setting_name = sprintf( '%s_%s', self::OPTIONS_NAME, $name );

		if ( ! empty( $suffix ) ) {
			$setting_name .= '_' . $suffix;
		}

		$setting = get_option( $setting_name, false );

		if ( $setting === false ) {
			return $default;
		}

		return $setting;

		if ( $setting === false ) {
			return $default;
		}

		return $setting;
	}

	/**
	 * Initialize options
	 *
	 * @return void
	 */
	public function options_init() {
		if ( ! current_user_can( self::OPTIONS_CAP ) ) {
			return;
		}

		$option_fields = $this->get_option_fields();

		foreach ( $option_fields as $field_name => $field ) {
			$sanitize_callback = function ( $value ) use ( $field_name, $field ) {
				return $this->sanitize_setting( $value, $field_name, $field );
			};

			register_setting( sprintf( '%s-group', self::OPTIONS_NAME ), sprintf( '%s_%s', self::OPTIONS_NAME, $field_name ), $sanitize_callback );
		}

		$section_name = 'g_smtp_section';
		$section_callback = [];
		$page_name = self::OPTIONS_NAME;

		add_settings_section(
			$section_name,
			false, // Skip section title because of redundancy
			$section_callback,
			$page_name
		);
	}

	/**
	 * Add option boxes
	 *
	 * @return void
	 */
	public function make_options() {
		$section_name = 'g_smtp_section';
		$page_name = self::OPTIONS_NAME;

		$option_fields = $this->get_option_fields();

		foreach ( $option_fields as $field_name => $field ) {
			// Check if there's any tabs created
			if ( ! empty( $this->get_option_tabs() ) ) {
				// Check if this field belong to current tab
				if ( ! $this->is_field_current_tab( $field ) ) {
					continue;
				}
			}

			$field['field_name'] = sprintf( '%s_%s', self::OPTIONS_NAME, $field_name );

			if ( $field['type'] === 'hidden' ) {
				$field['class'] = 'hidden';
			}

			if ( isset( $field['conditional']['field'] ) ) {
				$field['conditional']['field'] = sprintf( '%s_%s', self::OPTIONS_NAME, $field['conditional']['field'] );
			}

			add_settings_field(
				$field_name,
				$field['label'],
				[ $this, 'make_options_callback' ],
				$page_name,
				$section_name,
				$field
			);
		}
	}

	/**
	 * Renders input fields
	 *
	 * @param array $args List of arguments
	 *
	 * @return void
	 */
	public function make_options_callback( $args ) {
		$field_name = explode( '_', $args['field_name'], 2 )[1];
		$args['value'] = isset( $args['value'] ) ? $args['value'] : self::get_option( $field_name, '' );

		Input_Fields::make_input( $args );

		if ( ! empty( $args['description'] ) ) :
			?>
		<p class="description"><?php echo esc_html( $args['description'] ); ?></p>
			<?php
		endif;
	}

	/**
	 * Sanitize single input
	 *
	 * @param string $value Input field value
	 * @param string $field_name Input field name
	 * @param array $field List of Input field attributes
	 *
	 * @return string cleaned input
	 */
	public function sanitize_setting( $value, $field_name, $field ) {

		// Fallback: Get option field if field doesn't belong to current tab
		if ( ! $this->is_field_current_tab( $field ) ) {
			return self::get_option( $field_name );
		}

		// Format arguments for sanitize function
		$field['field_name'] = $field_name;
		$input = [ $field_name => $value ];

		return Input_Fields::sanitize_input( $field, $input );
	}

	/**
	 * Register options page
	 *
	 * @return void
	 */
	public function register_options_page() {
		$page_title = esc_html__( 'G-SMTP', 'g-smtp' );
		$menu_title = esc_html__( 'G-SMTP', 'g-smtp' );
		$capability = self::OPTIONS_CAP;
		$menu_slug = self::OPTIONS_NAME;
		$callback = [ $this, 'options_page' ];

		add_options_page( $page_title, $menu_title, $capability, $menu_slug, $callback );
	}

	/**
	 * Display options page
	 *
	 * @return void
	 */
	public function options_page() {
		?>
		<div class="wrap">
			<?php settings_errors( self::OPTIONS_NAME ); ?>
			<form action="options.php" method="post">
				<?php

				// Create tabs
				if ( ! empty( $this->get_option_tabs() ) ) {
					$this->create_option_tabs();
				}

				settings_fields( sprintf( '%s-group', self::OPTIONS_NAME ) );
				do_settings_sections( self::OPTIONS_NAME );

				?>
				<input type="hidden" name="current_tab" value="<?php echo esc_attr( $this->get_current_tab() ); ?>">
			</form>
		</div>
		<?php
	}

	/**
	 * Get option fields
	 *
	 * @return array
	 */
	public function get_option_fields() {
		if ( $this->option_fields !== null ) {
			return $this->option_fields;
		}

		$this->option_fields = [
			'smtp_connection_test' => [
				'label' => esc_html__( 'SMTP-connection', 'g-smtp' ),
				'type'  => 'smtp_connection_test',
				'tab'   => 'general',
			],
			'smtp_test_email'      => [
				'label'       => esc_html__( 'Test SMTP e-mail', 'g-smtp' ),
				'type'        => 'smtp_test_email',
				'tab'         => 'general',
				'description' => esc_html__( 'Send a test e-mail to the provided e-mail address, for validation and debug purposes.', 'g-smtp' ),
			],
			'generate_smtp_config' => [
				'label' => esc_html__( 'Generate SMTP-config', 'g-smtp' ),
				'type'  => 'generate_smtp_config',
				'tab'   => 'config',
			],
		];

		return $this->option_fields;
	}

	/**
	 * Get default tab
	 *
	 * @return string|null
	 */
	public function get_default_tab() {
		$default_tab = array_search( true, array_column( $this->option_tabs, 'default' ), true );

		$tab_keys = array_keys( $this->option_tabs );

		if ( $default_tab !== false ) {
			return $tab_keys[ $default_tab ];
		}

		if ( ! empty( $tab_keys ) ) {
			// If not default tab is set, return the first
			return $tab_keys[0];
		}

		return null;
	}

	/**
	 * Get current tab
	 *
	 * @return string
	 */
	public function get_current_tab() {
		// Set default tab
		$current_tab = $this->get_default_tab();

		// Check if GET-variable is set
		// phpcs:ignore
		if ( isset( $_GET['tab'] ) ) {
			// phpcs:ignore
			$current_tab = sanitize_text_field( $_GET['tab'] );
		}

		// Check if POST-variable is set
		// phpcs:ignore
		if ( isset( $_POST['current_tab'] ) ) {
			// phpcs:ignore
			$current_tab = sanitize_text_field( $_POST['current_tab'] );
		}

		// Check if current tab exists, if not set to default
		if ( ! in_array( $current_tab, array_keys( $this->get_option_tabs() ), true ) ) {
			return 'default';
		}

		// Return default as fallback if tab doesn't exist OR if GET/POST-variable isnt set'
		return $current_tab;
	}

	/**
	 * Check if input field belongs to current tab
	 *
	 * @param array $field
	 *
	 * @return bool
	 */
	public function is_field_current_tab( $field ) {
		// Get current tab
		$current_tab = $this->get_current_tab();

		// Fallback to default tab if no tab is set
		$field_tab = $this->get_default_tab();

		if ( ! empty( $field['tab'] ) ) {
			$field_tab = $field['tab'];
		}

		return $field_tab === $current_tab;
	}

	/**
	 * Get option tabs
	 *
	 * @return array
	 */
	public function get_option_tabs() {
		if ( $this->option_tabs !== null ) {
			return $this->option_tabs;
		}

		$this->option_tabs = [
			'general' => [
				'label'   => esc_html__( 'General', 'g-smtp' ),
				'default' => true,
			],
			'config'  => [
				'label' => esc_html__( 'Config', 'g-smtp' ),
			],
		];

		return $this->option_tabs;
	}

	/**
	 * Create option tabs
	 *
	 * @return void
	 */
	public function create_option_tabs() {
		$option_tabs = $this->get_option_tabs();

		?>
		<div class="gt-admin-header">
			<h1 class="wp-heading-inline"><?php echo esc_html__( 'G-SMTP', 'g-smtp' ); ?></h1>
			<hr class="wp-header-end">
			<h2 class="nav-tab-wrapper wp-clearfix">
			<?php

			$current_tab = $this->get_current_tab();

			if ( array_search( true, array_column( $option_tabs, 'default' ), true ) === false ) :
				// Add a default tab label if there's no default tab set
				$active_tab = $current_tab === 'default';

				?>
				<a class="<?php echo $active_tab ? 'nav-tab nav-tab-active' : 'nav-tab'; ?>" href="?page=<?php echo esc_attr( self::OPTIONS_NAME ) . '&tab=default'; ?>" ><?php esc_html_e( 'General', 'g-smtp' ); ?></a>
				<?php
				endif;
			foreach ( $option_tabs as $tab_name => $tab_attr ) :
				// Check if current iterations tab is active
				$active_tab = $current_tab === $tab_name;
				?>
				<a class="<?php echo $active_tab ? 'nav-tab nav-tab-active' : 'nav-tab'; ?>" href="?page=<?php echo esc_attr( self::OPTIONS_NAME ) . '&tab=' . esc_attr( $tab_name ); ?>"><?php echo esc_html( $tab_attr['label'] ); ?></a>
				<?php
			endforeach;
			?>
			</h2>
		</div>
		<?php
	}
}
