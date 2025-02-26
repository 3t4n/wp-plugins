<?php
/**
 * PasswordLess auth Settings
 *
 * @package 1-click-passwordless-login
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Xclickpw_Settings
 *
 * Manages the settings for the 1-Click Passwordless Login plugin.
 * Handles plugin configuration, admin settings page, statistics tracking,
 * and lockout management.
 *
 * @package 1-click-passwordless-login
 */
class Xclickpw_Settings {

	/**
	 * Stores plugin settings options.
	 *
	 * @var array
	 */
	public array $options;

	/**
	 * Stores select field options.
	 *
	 * @var array
	 */
	public array $select_options;

	/**
	 * Default settings for the plugin.
	 */
	public const DEFAULT_OPTIONS = array(
		'password_less_expiry'    => 15,
		'woocommerce_integration' => false,
		'max_attempts'            => 5,
		'lockout_time'            => 15,
	);

	/**
	 * Settings schema with types.
	 */
	public const SETTINGS_SCHEMA = array(
		'password_less_expiry'    => 'int',    // Expiry time in minutes (integer).
		'max_attempts'            => 'int',    // Maximum login attempts (integer).
		'lockout_time'            => 'int',    // Lockout time in minutes (integer).
		'woocommerce_integration' => 'bool',   // WooCommerce integration (boolean).
	);

	/**
	 * Google Form URLs
	 */
	private const FEATURE_REQUEST_URL = 'https://forms.gle/s1y4BzTX5NERvCwG8';
	private const HIRE_US_URL         = 'https://forms.gle/oa2ufB3imsHPijEM8';

	/**
	 * Constructor - Initializes settings, admin menus, and dashboard widget.
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_plugin_menu' ) );
		add_action( 'admin_init', array( $this, 'register_settings' ) );
		add_action( 'init', array( $this, 'init_options' ) );
		add_action( 'wp_dashboard_setup', array( $this, 'dashboard_widget' ) );
		add_filter( 'plugin_action_links_' . XCLICKPW_PLUGIN_BASENAME, array( $this, 'add_plugin_action_links' ) );
		add_filter( 'plugin_row_meta', array( $this, 'add_plugin_meta_links' ), 10, 2 );

		// Populate options for select fields.
		$this->populate_options();
	}

	/**
	 * Adds the plugin settings menu in the WordPress admin.
	 *
	 * @return void
	 */
	public function add_plugin_menu(): void {
		$xclickpw_icon = 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz48c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkxheWVyXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgODUuMDcgMTIyLjg4IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA4NS4wNyAxMjIuODgiIHhtbDpzcGFjZT0icHJlc2VydmUiPjxnPjxwYXRoIGQ9Ik02MC43OCw0My40NGMtMS40OSwwLjgxLTMuMzUsMC4yNi00LjE1LTEuMjJjLTAuODEtMS40OS0wLjI2LTMuMzUsMS4yMy00LjE1YzcuMDQtMy44MiwxMC4zMi04Ljc2LDEwLjk4LTEzLjU5IGMwLjM1LTIuNTgtMC4wNS01LjE3LTEuMDItNy41N2MtMC45OS0yLjQzLTIuNTYtNC42NC00LjU1LTYuNDJjLTMuODctMy40Ni05LjMtNS4yOC0xNC45Ny0zLjg3Yy0yLjMsMC41Ny00LjI5LDEuNzItNi4wMywzLjM0IGMtMS44NSwxLjcyLTMuNDUsMy45Ny00Ljg1LDYuNjNjLTAuNzksMS41LTIuNjQsMi4wNy00LjEzLDEuMjljLTEuNS0wLjc5LTIuMDctMi42NC0xLjI5LTQuMTNjMS43Mi0zLjI2LDMuNzMtNi4wNiw2LjExLTguMjggYzIuNDktMi4zMSw1LjM4LTMuOTcsOC43NC00LjhjNy44LTEuOTMsMTUuMjMsMC41MywyMC41MSw1LjI1YzIuNjgsMi40LDQuODEsNS4zOSw2LjE1LDguNjljMS4zNSwzLjMzLDEuOSw2Ljk5LDEuMzksMTAuNyBDNzMuOTksMzEuOTMsNjkuNzUsMzguNTcsNjAuNzgsNDMuNDRMNjAuNzgsNDMuNDR6IE0zNy4zMiw2Ny42MWMtMTEuNi0xNS41OC0xMS44OC0zMC4zNCwyLjItNDQuMDZsLTEwLjE0LTUuNiBDMjEuMjYsMTQuNzksNi4zNiwzOC4wOCwxMi4xMiw0NC4zbDcuOSwxMS43MmwtMS42MywzLjRjLTAuNDUsMS4wMS0wLjAxLDEuNzIsMS4wOSwyLjIxbDEuMDcsMC4yOUwwLDEwMi41OWw0LjE2LDguODdsOC4zMi0yLjQ1IGwyLjE0LTQuMTZsLTIuMDUtMy44NGw0LjUyLTAuOTdMMTguMTQsOThsLTIuMzYtMy42bDEuNTUtMy4wMWw0LjUxLTAuNTdsMS40Ny0yLjg1bC0yLjUyLTMuMjlsMS42MS0zLjEybDQuNi0wLjc1bDYuMjYtMTEuOTUgbDEuMDYsMC41OEMzNi4xNiw3MC41NiwzNy4xMSw2OS44NCwzNy4zMiw2Ny42MUwzNy4zMiw2Ny42MXogTTU5LjE1LDc3LjM4bC0zLjA2LDExLjQybC00LjI1LDEuNjhsLTAuODksMy4zM2wzLjEsMi42M2wtMC44MSwzLjAzIGwtNC4yLDEuNDhsLTAuODYsMy4ybDMuMDEsMi45NWwtMC41OCwyLjE3bC00LjEzLDEuODdsMi43NiwzLjI1bC0xLjE5LDQuNDNsLTcuNDUsNC4wN2wtNS44Mi03LjYzbDExLjEtNDEuNDNsLTIuNjktMC43MiBjLTAuNTUtMC4xNS0wLjg5LTAuNzItMC43NC0xLjI4bDEuMTMtNC4yMWMtOC4xNC02LjE3LTEyLjE3LTE2Ljg1LTkuMzctMjcuMzJjMy42LTEzLjQ1LDE3LjE4LTIxLjU3LDMwLjY0LTE4LjU1IGMwLjA2LDAuNzIsMC4wNSwxLjQ1LTAuMDUsMi4xOGMtMC4yNSwxLjgyLTEuMDQsMy42OS0yLjUsNS41Yy0wLjIsMC4yNC0wLjQxLDAuNDktMC42MywwLjczYy00LjMtMC4yOC04LjMzLDIuNS05LjQ5LDYuODIgYy0wLjUsMS44Ni0wLjM5LDMuNzQsMC4yLDUuNDNjMC4xNCwwLjYsMC4zNywxLjE4LDAuNjcsMS43NWMwLjcxLDEuMywxLjc1LDIuMjksMi45NywyLjkyYzAuOCwwLjUzLDEuNywwLjkzLDIuNjcsMS4yIGM0LjgzLDEuMjksOS43OC0xLjQ5LDExLjIyLTYuMjRjMS40Ni0xLjI5LDIuNzMtMi42NSwzLjgyLTQuMDVjMi4xMi0yLjczLDMuNTctNS42Myw0LjQzLTguNThjNS44NCw2LjMsOC40MSwxNS4zNyw2LjAyLDI0LjI5IGMtMi44LDEwLjQ3LTExLjY1LDE3LjcxLTIxLjc3LDE4Ljk4bC0xLjEzLDQuMjFjLTAuMTUsMC41NS0wLjcyLDAuODktMS4yOCwwLjc0TDU5LjE1LDc3LjM4TDU5LjE1LDc3LjM4eiIvPjwvZz48L3N2Zz4=';

		add_menu_page(
			'PasswordLess Auth Settings', // Page title.
			__( '1-Click Login', '1-click-passwordless-login' ), // Menu title.
			'manage_options', // Capability.
			'1-click-passwordless-login', // Menu slug.
			array( $this, 'settings_page' ), // Callback function.
			$xclickpw_icon, // Icon.
			80 // Position in menu order.
		);
	}

	/**
	 * Registers the plugin settings in WordPress.
	 *
	 * @return void
	 */
	public function register_settings(): void {
		// Register the settings group.
		register_setting(
			'xclickpw_settings', // Option group.
			'xclickpw_settings', // Option name.
			'xclickpw_sanitize_settings' // Sanitization callback.
		);

		// Add settings section.
		add_settings_section(
			'xclickpw_main', // Section ID.
			esc_html__( 'Settings', '1-click-passwordless-login' ), // Section title.
			'', // Callback (empty string for no callback).
			'xclickpw_settings' // Page slug.
		);

		// Define translated labels for settings.
		$labels = array(
			'password_less_expiry'    => esc_html__( 'Passwordless Expiry (minutes)', '1-click-passwordless-login' ),
			'max_attempts'            => esc_html__( 'Maximum Login Attempts', '1-click-passwordless-login' ),
			'lockout_time'            => esc_html__( 'Lockout Time (minutes)', '1-click-passwordless-login' ),
			'woocommerce_integration' => esc_html__( 'WooCommerce Integration', '1-click-passwordless-login' ),
		);

		// Add settings fields.
		foreach ( self::SETTINGS_SCHEMA as $key => $type ) {
			add_settings_field(
				$key, // Field ID.
				$labels[ $key ], // Field label.
				array( $this, 'render_setting_field' ), // Callback to render the field.
				'xclickpw_settings', // Page slug.
				'xclickpw_main', // Section ID.
				array( // Additional arguments passed to the callback.
					'key'  => $key,
					'type' => $type,
				)
			);
		}
	}

	/**
	 * Renders the setting fields dynamically based on type.
	 *
	 * @param array $args Field arguments.
	 *
	 * @return void
	 */
	public function render_setting_field( array $args ): void {
		$key   = $args['key'];
		$type  = $args['type'];
		$value = $this->options[ $key ] ?? self::DEFAULT_OPTIONS[ $key ];

		// Is the field disabled?.
		$disabled = $this->is_field_disabled( $key ) ? 'disabled' : '';

		// Handle different field types dynamically.
		switch ( $type ) {
			case 'int': // Numeric input.
				printf(
					'<input type="number" name="xclickpw_settings[%s]" value="%s" %s />',
					esc_attr( $key ),
					esc_attr( $value ),
					esc_attr( $disabled )
				);
				break;

			case 'bool': // Checkbox input.
				printf(
					'<input type="checkbox" name="xclickpw_settings[%s]" value="1" %s %s />',
					esc_attr( $key ),
					esc_attr( $value ? 'checked' : '' ),
					esc_attr( $disabled )
				);
				break;

			case 'text': // Text input.
				printf(
					'<input type="text" name="xclickpw_settings[%s]" value="%s" %s />',
					esc_attr( $key ),
					esc_attr( $value ),
					esc_attr( $disabled )
				);
				break;

			case 'textarea': // Textarea field.
				printf(
					'<textarea name="xclickpw_settings[%s]" %s>%s</textarea>',
					esc_attr( $key ),
					esc_attr( $disabled ),
					esc_textarea( $value )
				);
				break;

			case 'select': // Dropdown select field (multi-select support).
				if ( isset( $this->select_options[ $key ] ) && is_array( $this->select_options[ $key ] ) ) {
					$multiple = ( is_array( $value ) ) ? 'multiple' : ''; // Allow multi-select.
					echo '<select name="xclickpw_settings[' . esc_attr( $key ) . '][]" ' . esc_attr( $multiple ) . '>';
					foreach ( $this->select_options[ $key ] as $option_value => $label ) {
						$selected = ( in_array( $option_value, (array) $value, true ) ) ? 'selected' : '';
						printf(
							'<option value="%s" %s>%s</option>',
							esc_attr( $option_value ),
							esc_attr( $selected ),
							esc_html( $label )
						);
					}
					echo '</select>';
				}
				break;

			default: // Default to a text field for unknown types.
				printf(
					'<input type="text" name="xclickpw_settings[%s]" value="%s" %s />',
					esc_attr( $key ),
					esc_attr( $value ),
					esc_attr( $disabled )
				);
				break;
		}
	}

	/**
	 * Checks if a field should be disabled dynamically.
	 *
	 * @param string $key Setting key.
	 * @return bool True if the field should be disabled, false otherwise.
	 */
	private function is_field_disabled( string $key ): bool {
		if ( method_exists( $this, "disable_check_{$key}" ) ) {
			return (bool) $this->{"disable_check_{$key}"}();
		}
		return false;
	}

	/**
	 * Disables the WooCommerce integration setting if WooCommerce is not installed.
	 *
	 * @return bool
	 */
	private function disable_check_woocommerce_integration(): bool {
		return ! class_exists( 'WooCommerce' );
	}

	/**
	 * Initializes stored plugin options or sets defaults.
	 *
	 * @return void
	 */
	public function init_options(): void {
		$this->options = (array) get_option( 'xclickpw_settings', self::DEFAULT_OPTIONS );
	}

	/**
	 * Adds a widget to the WordPress admin dashboard.
	 *
	 * @return void
	 */
	public function dashboard_widget(): void {
		wp_add_dashboard_widget(
			'xclickpw_widget',
			'PasswordLess Auth Statistics',
			array(
				$this,
				'dashboard_widget_content',
			)
		);
	}

	/**
	 * Displays the content inside the admin dashboard widget.
	 *
	 * @return void
	 */
	public function dashboard_widget_content(): void {
		$this->statistics_table();
	}

	/**
	 * Retrieves authentication statistics.
	 *
	 * @return array An array containing login statistics.
	 */
	private function get_stats() {
		return get_option(
			'xclickpw_stats',
			array(
				'successful_logins' => 0,
				'failed_attempts'   => 0,
			)
		);
	}

	/**
	 * Updates authentication statistics by incrementing counters.
	 *
	 * @param string $type The type of statistic to increment. Options: 'successful_logins', 'failed_attempts'.
	 * @return void
	 */
	public function set_stats( string $type ): void {
		// Get current statistics.
		$stats = $this->get_stats();

		// Ensure the type exists in the stats array.
		if ( isset( $stats[ $type ] ) ) {
			$stats[ $type ] += 1;
		} else {
			// If the type doesn't exist, initialize it.
			$stats[ $type ] = 1;
		}

		// Update the statistics in the database.
		update_option( 'xclickpw_stats', $stats );
	}

	/**
	 * Displays the plugin settings page in the WordPress admin.
	 *
	 * @return void
	 */
	public function settings_page(): void {
		?>
		<div class="wrap">
			<h1><?php esc_html_e( 'PasswordLess Authentication Settings', '1-click-passwordless-login' ); ?></h1>

			<form method="post" action="options.php">
				<?php
				settings_fields( 'xclickpw_settings' );
				do_settings_sections( 'xclickpw_settings' );
				submit_button();
				?>
			</form>

			<?php $this->statistics_table(); ?>

			<!-- Footer Section with Links -->
			<div class="postbox" style="margin-top: 30px; padding: 15px;">
				<h2 style="margin-top: 0;"><?php esc_html_e( 'Need Help?', '1-click-passwordless-login' ); ?></h2>
				<p style="font-size: 14px; color: #555;">
					💡 Have ideas or need customization? Let us know!
				</p>
				<p>
					<a href="<?php echo esc_url( self::FEATURE_REQUEST_URL ); ?>" target="_blank" rel="noopener noreferrer" class="button button-primary">
						🚀 Request a Feature
					</a>
					<a href="<?php echo esc_url( self::HIRE_US_URL ); ?>" target="_blank" rel="noopener noreferrer" class="button button-secondary">
						💼 Hire Us
					</a>
				</p>
			</div>
		</div>
		<?php
	}

	/**
	 * Displays a table with authentication statistics.
	 *
	 * @return void
	 */
	private function statistics_table(): void {
		$stats = $this->get_stats();
		?>
		<div class="1-click-passwordless-login-widget-content">
			<h3>📊 <?php esc_html_e( 'Login Statistics', '1-click-passwordless-login' ); ?></h3>
			<table class="form-table">
				<tr>
					<th><?php esc_attr_e( 'Total Successful Logins', '1-click-passwordless-login' ); ?></th>
					<td><?php echo esc_html( $stats['successful_logins'] ); ?></td>
				</tr>
				<tr>
					<th><?php esc_attr_e( 'Failed Login Attempts', '1-click-passwordless-login' ); ?></th>
					<td><?php echo esc_html( $stats['failed_attempts'] ); ?></td>
				</tr>
			</table>
		</div>
		<?php
	}

	/**
	 * Populates options for select fields dynamically.
	 *
	 * @return void
	 */
	private function populate_options(): void {
		$select_fields = array_filter(
			self::SETTINGS_SCHEMA,
			static function ( $value ) {
				return 'select' === $value;
			},
			ARRAY_FILTER_USE_BOTH
		);

		foreach ( $select_fields as $key => $type ) {
			// If a method exists to fetch select options, call it.
			if ( method_exists( $this, "get_options_{$key}" ) ) {
				$this->select_options[ $key ] = $this->{"get_options_{$key}"}();
			} else {
				// Otherwise, set default options.
				$this->select_options[ $key ] = $this->select_options[ $key ] ?? self::DEFAULT_OPTIONS[ $key ];
			}
		}
	}

	/**
	 * Adds custom links (Settings) to the plugin row on the Plugins page.
	 *
	 * @param array $links Existing plugin action links.
	 * @return array Modified plugin action links.
	 */
	public function add_plugin_action_links( array $links ) {
		// Create the settings link.
		$settings_link = '<a href="admin.php?page=1-click-passwordless-login">' . esc_html__( 'Settings', '1-click-passwordless-login' ) . '</a>';

		// Add the settings link to the plugin row actions.
		$links[] = $settings_link;

		return $links;
	}

	/**
	 * Adds additional plugin row meta-information.
	 *
	 * @param array  $plugin_meta Existing metadata.
	 * @param string $plugin_file The plugin file path.
	 * @return array Modified metadata array.
	 */
	public function add_plugin_meta_links( array $plugin_meta, string $plugin_file ): array {
		// Check if this is our plugin.
		if ( strpos( $plugin_file, '1-click-passwordless-login.php' ) !== false ) {
			// Request a Feature link with icon.
			$feature_request_link = '<a href="' . esc_url( self::FEATURE_REQUEST_URL ) . '" target="_blank" rel="noopener noreferrer" style="color: #0073aa; font-weight: 600;">🚀 ' . esc_html__( 'Request a Feature', '1-click-passwordless-login' ) . '</a>';

			// Hire Us link with icon.
			$hire_us_link = '<a href="' . esc_url( self::HIRE_US_URL ) . '" target="_blank" rel="noopener noreferrer" style="color: #ff5722; font-weight: 600;">💼 ' . esc_html__( 'Hire Us', '1-click-passwordless-login' ) . '</a>';

			// Append new metadata.
			$plugin_meta[] = $feature_request_link;
			$plugin_meta[] = $hire_us_link;
		}

		return $plugin_meta;
	}
}
