<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Appsy
 * @subpackage Appsy/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Appsy
 * @subpackage Appsy/admin
 * @author     Your Name <email@example.com>
 */
class Appsy_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $appsy    The ID of this plugin.
	 */
	private $appsy;

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
	 * @param      string    $appsy       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $appsy, $version ) {

		$this->appsy = $appsy;
		$this->version = $version;
		
		add_action( 'admin_menu', array( $this, 'create_plugin_settings_page' ) );
		// add_action( 'admin_init', 'appsy_register_settings' );
  	add_option( 'appsy_id', '');
  	register_setting( 'appsy_options_group', 'appsy_id', 'appsy_callback' );
	}

	public function create_plugin_settings_page() {
    // Add the menu item and page
    $page_title = 'Appsy Settings';
    $menu_title = 'Appsy';
    $capability = 'manage_options';
    $slug = 'appsy_fields';
    $callback = array( $this, 'plugin_settings_page_content' );
    $icon = 'dashicons-admin-plugins';
    $position = 100;

    add_menu_page( $page_title, $menu_title, $capability, $slug, $callback, $icon, $position );
	}

	public function plugin_settings_page_content() {
	?>
		<div>
			<?php screen_icon(); ?>
			<h2>Appsy Settings</h2>
			<form method="post" action="options.php">
  			<?php settings_fields( 'appsy_options_group' ); ?>
				<p>Please enter your project ID.</p>
				<p>You can find this ID on your project settings in <a target="_blank" href="https://appsy.app">Appsy</a>.</p>
				<table>
					<tr valign="top">
						<th scope="row"><label for="appsy_id">Project ID:</label></th>
						<td><input style="width: 250px;" type="text" id="appsy_id" name="appsy_id" value="<?php echo get_option('appsy_id'); ?>" /></td>
					</tr>
				</table>
				<?php  submit_button(); ?>
			</form>
		</div>
	<?php
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
		 * defined in Appsy_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Appsy_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->appsy, plugin_dir_url( __FILE__ ) . 'css/appsy-admin.css', array(), $this->version, 'all' );

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
		 * defined in Appsy_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Appsy_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->appsy, plugin_dir_url( __FILE__ ) . 'js/appsy-admin.js', array( 'jquery' ), $this->version, false );

	}

}
