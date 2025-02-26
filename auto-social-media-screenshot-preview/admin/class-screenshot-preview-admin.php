<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://screenshot-capture-api.com
 * @since      1.0.0
 *
 * @package    Screenshot_Preview
 * @subpackage Screenshot_Preview/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Screenshot_Preview
 * @subpackage Screenshot_Preview/admin
 * @author     Roman Kobosil <r.kobosil@webseite-herunterladen.de>
 */
class Screenshot_Preview_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $screenshot_preview    The ID of this plugin.
	 */
	private $screenshot_preview;

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
	 * @param      string    $screenshot_preview       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $screenshot_preview, $version ) {

		$this->screenshot_preview = $screenshot_preview;
		$this->version = $version;

	}

    /**
	 * Render the settings page for the admin area.
	 *
	 * @since    1.0.0
	 */
    function render_plugin_settings_page() {
        ?>
        <div class="wrap">
        <div id="icon-options-general" class="icon32"></div>
        <h1>Auto Social-Media Screenshot Preview Settings</h1>
        <form action="options.php" method="post">
            <?php
            settings_fields( 'screenshot_preview_options' );
            do_settings_sections( 'screenshot-preview' );
            // Add the submit button to serialize the options
            submit_button();
            ?>
        </form>
        <?php
    }

	/**
	 * Register the settings page for the admin area.
	 *
	 * @since    1.0.0
	 */
	function add_settings_page() {
        add_menu_page( 'Auto Screenshot Preview', 'Auto Screenshot Preview', 'manage_options', 'screenshot-preview', array( $this, 'render_plugin_settings_page' ));
    }

    function plugin_section_text() {
        echo '<p>Here you enter the access token and secret from <a href="https://screenshot-capture-api.com/console/?pid=tokens">screenshot-capture-api.com</a></p>';
    }

    function screenshot_preview_setting_wh_api_token() {
        //id and name of form element should be same as the setting name.
        ?>
          <input type="text" name="wh_api_token" id="wh_api_token" value="<?php echo esc_textarea(get_option('wh_api_token')); ?>" />
        <?php
    }

    function screenshot_preview_setting_wh_api_secret() {
        //id and name of form element should be same as the setting name.
        ?>
          <input type="text" name="wh_api_secret" id="wh_api_secret" value="<?php echo esc_textarea(get_option('wh_api_secret')); ?>" />
        <?php
    }

    function screenshot_preview_setting_wh_screenshot_ttl() {
         //id and name of form element should be same as the setting name.
         $value = (get_option('wh_screenshot_ttl') == '' ? '1800' : get_option('wh_screenshot_ttl'))
         ?>
           <input type="number" name="wh_screenshot_ttl" id="wh_screenshot_ttl" value="<?php echo esc_textarea($value); ?>" />
         <?php
    }

    function screenshot_preview_setting_wh_screenshot_delay() {
         //id and name of form element should be same as the setting name.
         $value = (get_option('wh_screenshot_delay') == '' ? '1500' : get_option('wh_screenshot_delay'))
         ?>
           <input type="number" name="wh_screenshot_delay" id="wh_screenshot_delay" value="<?php echo esc_textarea($value); ?>" />
         <?php
    }

	/**
	 * Register the settings for the admin area.
	 *
	 * @since    1.0.0
	 */
    function register_settings() {

        add_settings_section( 'screenshot_preview_options', 'API Settings', array( $this, 'plugin_section_text' ), 'screenshot-preview' );

        add_settings_field( 'wh_api_token', 'API Token', array( $this, 'screenshot_preview_setting_wh_api_token' ), 'screenshot-preview', 'screenshot_preview_options' );
        add_settings_field( 'wh_api_secret', 'API Secret', array( $this, 'screenshot_preview_setting_wh_api_secret' ), 'screenshot-preview', 'screenshot_preview_options' );
        add_settings_field( 'wh_screenshot_ttl', 'Time to live in seconds (TTL)', array( $this, 'screenshot_preview_setting_wh_screenshot_ttl' ), 'screenshot-preview', 'screenshot_preview_options' );
        add_settings_field( 'wh_screenshot_delay', 'Custom Delay in milliseconds (after page load)', array( $this, 'screenshot_preview_setting_wh_screenshot_delay' ), 'screenshot-preview', 'screenshot_preview_options' );

        register_setting( 'screenshot_preview_options', 'wh_api_token');
        register_setting( 'screenshot_preview_options', 'wh_api_secret');
        register_setting( 'screenshot_preview_options', 'wh_screenshot_ttl');
        register_setting( 'screenshot_preview_options', 'wh_screenshot_delay');
    }

}
