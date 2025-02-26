<?php
/**
 * Plugin_Settings class
 *
 * @link       https://takeoff.design/
 * @since      1.0.0
 *
 * @package    Astrolabe
 */

namespace ASTR\Admin;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Plugin_Settings class
 *
 * @since      1.0.0
 * @package    Astrolabe
 * @author     Matt Bonacini
 */
class Plugin_Settings {

	/**
	 * Main Settings Page Slug
	 *
	 * @var string
	 */
	private $main_settings_slug = 'astrolabe-settings';

	/**
	 * Constructor
	 */
	public function __construct() {
		// Add a page under Settings for Astrolabe
		add_action( 'admin_menu', array( $this, 'main_settings_menu' ) );

		// Add settings to the Astrolabe Settings page
		add_action( 'admin_init', array( $this, 'main_settings_init' ) );

		// Enqueue admin styles
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_styles' ) );

	}

	/**
	 * Add a page under WordPress Settings for Astrolabe
	 */
	public function main_settings_menu() {
		add_options_page(
			// Page title
			'Astrolabe Settings',
			// Menu title
			'Astrolabe',
			// Capability
			'manage_options',
			// Menu slug
			$this->main_settings_slug,
			// Callback function
			array( $this, 'main_settings_page' )
		);
	}

	/**
	 * Main Settings Page
	 */
	public function main_settings_page() {
		?>
			<div class="wrap">
				<div class="wa-astro-admin-notice">
				<h1>Astrolabe Settings</h1>
				<form method="post" action="options.php">
				<?php
				// Output security fields for the registered setting "astr_design_settings_section"
				settings_fields( 'astr_design_settings_section' );

				// Output setting sections and their fields
				do_settings_sections( $this->main_settings_slug );

				// Output save settings button
				submit_button();
				?>
				</form>
				</div>
				<div class="wa-astro-admin-notice">
					<h2>❓ Do you have any questions about Astrolabe?</h2>
					<p>If you need help with this plugin or if you have any feature requests, feel free to contact me via the official plugin's support forum, or <a href="https://tally.so/r/wzJ7bg">via this form</a>.</p>
				</div>
			</div>
		<?php
	}

	/**
	 * Add settings to the Astrolabe Settings page
	 */
	public function main_settings_init() {

		// Add design settings
		$this->design_settings();
	}

	/**
	 * Add design settings
	 */
	private function design_settings() {
		$design_settings_section_id = 'astr_design_settings_section';

		add_settings_section(
			$design_settings_section_id,
			'Design Settings',
			array( $this, 'design_settings_description' ),
			$this->main_settings_slug
		);

		/**
		 * Astrolabe Format
		 */
		add_settings_field(
			'astr_astrolabe_format',
			'Fixed Dock Format',
			array( $this, 'format_callback' ),
			$this->main_settings_slug,
			$design_settings_section_id
		);

		register_setting( $design_settings_section_id, 'astr_astrolabe_format' );

		/**
		 * Astrolabe Color Theme
		 */
		add_settings_field(
			'astr_astrolabe_color_theme',
			'Color Theme',
			array( $this, 'color_theme_callback' ),
			$this->main_settings_slug,
			$design_settings_section_id
		);

		register_setting( $design_settings_section_id, 'astr_astrolabe_color_theme' );
	}

	/**
	 * A dropdown select to choose the format of the main Astrolabe item
	 */
	public function format_callback() {
		$setting_value = get_option( 'astr_astrolabe_format' );

		// Create a select with two option: minimal, modal menu
		echo '<select name="astr_astrolabe_format">';
		echo '<option value="default"' . selected( 'default', $setting_value, false ) . '>Minimal</option>';
		echo '<option value="modal-menu"' . selected( 'modal-menu', $setting_value, false ) . '>Modal Menu</option>';
		echo '</select>';
	}

	/**
	 * Design settings section description
	 */
	public function design_settings_description() {
		?>
			<p>Choose the default format of the fixed dock menu. All options add a fixed menu that follows the user as they scroll. This menu automatically fades out when the user is near the bottom of the page to avoid covering any important element on your website's footer.</p>
			<p><b>Don't forget to add the menu items you need at the correct menu display location <a href="/wp-admin/nav-menus.php">in this page</a>.</b></p>
			<p>Astrolabe will not be displayed if the selected menu location doesn't include at least one menu item.</p>
			<h3>Minimal</h3>
			<p><b>Menu location: "Astrolabe Default Menu"</b></p>
			<p>The minimal version of the menu id displayed with items that can be immediately clicked by users. Do not add more than 4 items to this type of menu and keep the title of each item short.</p>
			<h3>Modal Menu</h3>
			<p><b>Menu location: "Astrolabe Modal Menu"</b></p>
			<p>Similar to typical menus on mobile devices, users can open this menu with a click on the button that will be visibile by default on the main Astrolabe location (the bottom area of the screen). When opened, the menu is displayed as a modal at the center of the screen.</p>
		<?php
	}

	/**
	 * Enqueue admin-side styles
	 */
	public function admin_styles() {
			wp_enqueue_style( 'astrolabe-admin-style', ASTR_PLUGIN_URL . '/admin/admin.css', array(), ASTR_PLUGIN_VERSION );
	}

	/**
	 * A dropdown to let users choose the Astrolabe Color Theme
	 */
	public function color_theme_callback() {
		$setting_value = get_option( 'astr_astrolabe_color_theme' );
		?>
		<select name="astr_astrolabe_color_theme">
			<option value="dark" <?php selected( 'dark', $setting_value ); ?>>Dark Theme</option>
			<option value="light" <?php selected( 'light', $setting_value ); ?>>Light Theme</option>
			<option value="dark-ice" <?php selected( 'dark-ice', $setting_value ); ?>>Dark Ice Theme</option>
		</select>
		<?php
	}

	/**
	 * Static method to get the Astrolabe theme class
	 */
	public static function astro_theme_class() {
		$setting_value = get_option( 'astr_astrolabe_color_theme' );

		$class_name = '';

		if ( $setting_value ) {
			$class_name = 'wa-astro-' . $setting_value . '-theme';
		}

		return $class_name;
	}


}
