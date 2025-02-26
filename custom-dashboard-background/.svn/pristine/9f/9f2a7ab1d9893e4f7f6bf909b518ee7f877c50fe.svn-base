<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/boele/custom-dashboard-background/tree/master/admin/class-custom-dashboard-background-admin.php
 * @since      1.0.0
 *
 * @package    Custom_Dashboard_Background
 * @subpackage Custom_Dashboard_Background/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Custom_Dashboard_Background
 * @subpackage Custom_Dashboard_Background/admin
 * @author     Boele Boom <boele.boom@hotmail.com>
 */
class Custom_Dashboard_Background_Admin {

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
	 * The settings framework of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      WordPressSettingsFramework    $settings_framework    Instance of wpsf.
	 */
	private $settings_framework;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 * @param      WordPressSettingsFramework    $settings_framework    The inance of wpsf.
	 */
	public function __construct( $plugin_name, $version, $settings_framework ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->settings_framework = $settings_framework;
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
		 * defined in Custom_Dashboard_Background_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Custom_Dashboard_Background_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/' . $this->plugin_name . '-admin.css', array(), $this->version, 'all' );
	}

	public function settings_init() {
		$this->settings_framework->add_settings_page( array(
			'parent_slug' => 'options-general.php',
			'page_title'  => __( 'Custom Dashboard Background' ),
			'menu_title'  => __( 'Custom Dashboard Background' )
		) );
	}

	/**
	 * Validate settings.
	 * 
	 * @since 	1.0.0
	 * @param 	mixed $input
	 * 
	 * @return 	mixed
	 */
	function validate_settings( $input ) {
		return $input;
	}

	/**
	 * Set background image setting in img element and style element as admin notice.
	 *
	 * @since	1.0.0
	 * @see 	settings/settings.php
	 */
	public function set_background_image() {
		if ( $this->setting_is_active( 'background_image' ) ) {
			echo '
				<img id="custom_dashboard_background_admin_fullscreen_image" src="' . $this->get_setting( 'background_image' ) . '">
				<style>
					body {
						background-color: transparent !important;
					}
				</style>
			';
		}
	}

	/**
	 * Set wrap color setting in style element as admin notice.
	 *
	 * @since	1.0.0
	 * @see 	settings/settings.php
	 */
	public function set_wrap_color() {
		if ( $this->setting_is_active( 'background_image' ) ) {
			echo '
				<style>
					.editor-writing-flow,
					.wrap {
						background-color: white !important;
					}
				</style>
			';
		}
	}

	/**
	 * Set footer text color setting in style element as admin notice.
	 *
	 * @since	1.0.0
	 * @see 	settings/settings.php
	 */
	public function set_footer_text_color() {
		if ( $this->setting_is_active( 'footer_text_color' ) ) {
			echo '
				<style>
					#footer-thankyou,
					#footer-upgrade,
					#footer-thankyou a {
						color:' . $this->get_setting( 'footer_text_color' ) . '!important;
					}
					
					#footer-thankyou a {
						opacity: 0.65;
					}

					#footer-thankyou a:hover {
						opacity: 1;
					}
				</style>
			';
		}
	}

	/**
	 * Set border radius setting in style element as admin notice.
	 *
	 * @since	1.0.0
	 * @see 	settings/settings.php
	 */
	public function set_border_radius() {
		if ( $this->setting_is_active( 'border_radius' ) ) {
			echo '
				<style>
					.editor-writing-flow,
					.wrap {
						margin-top: 3rem !important;
						padding: 2rem !important;
						border-radius:' . $this->get_setting( 'border_radius' ) . 'px !important;
						opacity: 0.95 !important; 
					}

					.editor-writing-flow {
						margin: 0 2rem !important;
					}
				</style>
			';
		}
	}

	/**
	 * Set grayscale filter setting in style element as admin notice.
	 *
	 * @since	1.0.0
	 * @see 	settings/settings.php
	 */
	public function set_grayscale_filter() {
		if ( $this->setting_is_active( 'grayscale_filter' ) && !$this->setting_is_active( 'blur_filter' ) ) {
			echo '
				<style>
					#custom_dashboard_background_admin_fullscreen_image {
						filter: grayscale(1);
						-webkit-filter: grayscale(1);
						-moz-filter: grayscale(1);
						-ms-filter: grayscale(1);
						-o-filter: grayscale(1);
					}
				</style>
			';
		}
	}

	/**
	 * Set blut filter setting in style element as admin notice.
	 *
	 * @since	1.0.0
	 * @see 	settings/settings.php
	 */
	public function set_blur_filter() {
		if ( $this->setting_is_active( 'blur_filter' ) && !$this->setting_is_active( 'grayscale_filter' ) ) {
			echo '
				<style>
					#custom_dashboard_background_admin_fullscreen_image {
						filter: blur(3px);
						-webkit-filter: blur(3px);
						-moz-filter: blur(3px);
						-ms-filter: blur(3px);
						-o-filter: blur(3px);
					}
				</style>
			';
		}
	}

	/**
	 * Set blur and grayscale filter setting in style element as admin notice.
	 *
	 * @since	1.0.0
	 * @see 	settings/settings.php
	 */
	public function set_blur_and_grayscale_filter() {
		if ( $this->setting_is_active( 'blur_filter' ) && $this->setting_is_active( 'grayscale_filter' ) ) {
			echo '
				<style>
					#custom_dashboard_background_admin_fullscreen_image {
						filter: blur(3px) grayscale(1);
						-webkit-filter: blur(3px) grayscale(1);
						-moz-filter: blur(3px) grayscale(1);
						-ms-filter: blur(3px) grayscale(1);
						-o-filter: blur(3px) grayscale(1);
					}
				</style>
			';
		}
	}

	/**
	 * Get setting from wpsf cdb_settings.
	 *
	 * @since	1.0.0
	 * @see 	settings/settings.php
	 * @param 	string 	$setting valid setting from cdb_settings
	 * @access  private	
	 * 
	 * @return 	array 	cdb_settings setting
	 */
	private function get_setting( $setting ) {
		return wpsf_get_setting( 'cdb', 'cdb_settings', $setting );
	}

	/**
	 * Check if setting from wpsf cdb_settings is active.
	 *
	 * @since	1.0.0
	 * @see		settings/settings.php
	 * @param 	string 	$setting valid setting from cdb_settings
	 * @access  private	
	 * 
	 * @return 	bool 	true or false boolean
	 */
	private function setting_is_active( $setting ) {
		if ( $this->get_setting( $setting ) === NULL ) {
			return false;
		}

		if ( ! $this->get_setting( $setting ) ) {
			return false;
		}

		return true;
	}
}
