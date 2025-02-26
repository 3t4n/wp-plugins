<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://https://profiles.wordpress.org/thechetanvaghela/
 * @since      1.0.0
 *
 * @package    Attention_Browser_Tab_Titles
 * @subpackage Attention_Browser_Tab_Titles/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Attention_Browser_Tab_Titles
 * @subpackage Attention_Browser_Tab_Titles/admin
 * @author     Chetan Vaghela <ckvaghela92@gmail.com>
 */
class Attention_Browser_Tab_Titles_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Attention_Browser_Tab_Titles_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Attention_Browser_Tab_Titles_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/attention-browser-tab-titles-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Attention_Browser_Tab_Titles_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Attention_Browser_Tab_Titles_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/attention-browser-tab-titles-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function attention_browser_register_admin_page() {
		add_menu_page(
			'Attention Browser Tab Title', // Page Title
			'Tab Title Settings', // Menu Title
			'manage_options', // Capability
			'abtt-settings', // Menu Slug
			array($this, 'attention_browser_admin_page'), // Callback function
			'dashicons-heading', // Icon
			20 // Position
		);
	}

	public function attention_browser_register_admin_init()
	{
		register_setting('attention_browser_settings_group', 'attention_browser_enable_feature');
		register_setting('attention_browser_settings_group', 'attention_browser_title_texts', ['sanitize_callback' => 'attention_browser_sanitize_title_texts']);
		register_setting('attention_browser_settings_group', 'attention_browser_title_time');
		register_setting('attention_browser_settings_group', 'attention_browser_enable_homepage');
	}

	public function attention_browser_admin_page() {
		?>
		<div id="attention_browser-settings-page">
			<div class="wrap">
				<h1>Attention Browser Tab Title Settings</h1>
				<form method="post" action="options.php">
					<?php settings_fields('attention_browser_settings_group'); ?>
					<?php do_settings_sections('attention_browser_settings_group'); ?>
					<table class="form-table">
						<tr valign="top">
							<th scope="row">Enable Feature</th>
							<td>
								<input type="checkbox" id="attention_browser_enable_feature" name="attention_browser_enable_feature" value="1" <?php checked(1, get_option('attention_browser_enable_feature'), true); ?> />
							</td>
						</tr>

						<tr valign="top" class="dependent-fields">
							<th scope="row">Title Texts</th>
							<td>
								<div id="title-texts-container">
									<?php 
									$title_texts = get_option('attention_browser_title_texts', ['']);
									if (is_array($title_texts)) {
										foreach ($title_texts as $text) {
											?>
											<div class="title-text-field">
												<input type="text" name="attention_browser_title_texts[]" value="<?php echo esc_attr($text); ?>" />
												<button type="button" class="button remove-title-text">Remove</button>
											</div>
											<?php
										}
									}
									?>
								</div>
								<button type="button" class="button" id="add-title-text">Add Title</button>
							</td>
						</tr>

						<tr valign="top" class="dependent-fields">
							<th scope="row">Title Change Time (in seconds)</th>
							<td>
								<input type="number" name="attention_browser_title_time" value="<?php echo esc_attr(get_option('attention_browser_title_time', 5)); ?>" min="1" />
							</td>
						</tr>

						<tr valign="top" class="dependent-fields">
							<th scope="row">Enable Only on Homepage</th>
							<td>
								<input type="checkbox" name="attention_browser_enable_homepage" value="1" <?php checked(1, get_option('attention_browser_enable_homepage'), true); ?> />
							</td>
						</tr>
					</table>

					<?php submit_button(); ?>
				</form>
			</div>
		</div>
		<?php
	}

}


function attention_browser_sanitize_title_texts($input) {
	if (is_array($input)) {
		// Remove empty values
		$input = array_filter($input, function($value) {
			return !empty(trim($value));
		});
	}
	return $input;
}