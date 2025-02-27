<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.streamweasels.com
 * @since      1.0.0
 *
 * @package    Streamweasels_Wall_Pro
 * @subpackage Streamweasels_Wall_Pro/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Streamweasels_Wall_Pro
 * @subpackage Streamweasels_Wall_Pro/admin
 * @author     StreamWeasels <admin@streamweasels.com>
 */
class Streamweasels_Wall_Pro_Admin {

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
		$this->baseOptions = get_option( 'swti_options', array() );
		$this->options = swti_get_options_wall();
		$this->base = '';
		if (in_array('streamweasels-twitch-integration-pro/streamweasels.php', apply_filters('active_plugins', get_option('active_plugins')))){ 
			$this->base = '/streamweasels-twitch-integration-pro';
		}
		if (in_array('streamweasels-twitch-integration/streamweasels.php', apply_filters('active_plugins', get_option('active_plugins')))){ 
			$this->base = '/streamweasels-twitch-integration';
		}
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
		 * defined in Streamweasels_Wall_Pro_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Streamweasels_Wall_Pro_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'dist/streamweasels-wall-pro-admin.min.css', array(), $this->version, 'all' );

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
		 * defined in Streamweasels_Wall_Pro_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Streamweasels_Wall_Pro_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'dist/streamweasels-wall-pro-admin.min.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register the admin page.
	 *
	 * @since    1.0.0
	 */
	public function display_admin_page() {

		add_options_page(
			'Twitch TV Wall',
			'[StreamWeasels] Twitch Wall',
			'manage_options',
			'twitch-tv-wall',
			array($this, 'swti_showLegacyWallAdmin')
		);

		add_submenu_page(
			'streamweasels',
			'[Add-On] Wall',
			'[Add-On] Wall',
			'manage_options',
			'streamweasels-wall',
			array($this, 'swti_showAdmin')
		);		

		$tooltipArray = array(
			'Column Count'=>'Column Count <span class="sw-shortcode-help tooltipped tooltipped-n" aria-label="wall-column-count=\'\'"></span>',
			'Column Spacing'=>'Column Spacing <span class="sw-shortcode-help tooltipped tooltipped-n" aria-label="wall-column-spacing=\'\'"></span>',
		);		

		register_setting( 'swti_options_wall', 'swti_options_wall', array($this, 'swti_options_validate'));	
		add_settings_section('swti_wall_settings', '[Add-On] Wall Settings', false, 'swti_wall_fields');
		// Shortcode Settings section
		add_settings_section('swti_wall_shortcode_settings', 'Shortcode', false, 'swti_wall_shortcode_fields');		
		add_settings_field('swti_wall_column_count', $tooltipArray['Column Count'], array($this, 'swti_wall_column_count_cb'), 'swti_wall_fields', 'swti_wall_settings');			
		add_settings_field('swti_wall_column_spacing', $tooltipArray['Column Spacing'], array($this, 'swti_wall_column_spacing_cb'), 'swti_wall_fields', 'swti_wall_settings');
	}

	public function swti_showLegacyWallAdmin() {
		include ('partials/streamweasels-wall-pro-admin-display.php');
	}		

	public function swti_showAdmin() {
		include (WP_PLUGIN_DIR.$this->base.'/admin/partials/streamweasels-admin-display.php');
	}			

	public function swti_wall_column_count_cb() {
		$columns = ( isset ( $this->options['swti_wall_column_count'] ) ) ? $this->options['swti_wall_column_count'] : '4';
		?>
		
		<input id="sw-tile-column-count" type="text" name="swti_options_wall[swti_wall_column_count]" value="<?php echo esc_html($columns); ?>">
		<span class="range-bar-value"></span>		
		<p>Choose the number of columns for your [Add-on] Wall.</p>

		<?php
	}	

	public function swti_wall_column_spacing_cb() {
		$columnSpacing = ( isset ( $this->options['swti_wall_column_spacing'] ) ) ? $this->options['swti_wall_column_spacing'] : '5';
		?>
		
		<input id="sw-tile-column-spacing" type="text" name="swti_options_wall[swti_wall_column_spacing]" value="<?php echo esc_html($columnSpacing); ?>">
		<span class="range-bar-value"></span>	
		<p>Choose the space between columns for your [Add-on] Wall.</p>


		<?php
	}

	public function swti_options_validate($input) {
		$new_input = [];
		$options = get_option('swti_options_wall');
		if( isset( $input['swti_wall_stream_position'] ) ) {
			$new_input['swti_wall_stream_position'] = sanitize_text_field( $input['swti_wall_stream_position'] );
		}	

		if( isset( $input['swti_wall_column_count'] ) ) {
			$new_input['swti_wall_column_count'] = sanitize_text_field( $input['swti_wall_column_count'] );
		}
		
		if( isset( $input['swti_wall_column_spacing'] ) ) {
			$new_input['swti_wall_column_spacing'] = sanitize_text_field( $input['swti_wall_column_spacing'] );
		}
		return $new_input;
	}	


	public function swti_twitch_layout_options_pro( $options ) {
		$options['wall'] = 'Wall';
		return $options;
	}	
}

function swti_get_options_wall() {
	return get_option( 'swti_options_wall', array() );
}