<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.autovisie.nl
 * @since      1.0.0
 *
 * @package    Av_Slack_Notifications
 * @subpackage Av_Slack_Notifications/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Av_Slack_Notifications
 * @subpackage Av_Slack_Notifications/admin
 * @author     Melvr
 */
class Av_Slack_Notifications_Admin {

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
	 * The option name
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $option_name
	 */
	private $option_name = 'av_slack_notifications';

	/**
	 * The text domain
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $text-domain
	 */
	private $text_domain = 'av-slack-notifications';

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
	 * Add an options page under the Settings submenu
	 *
	 * @since  1.0.0
	 */
	public function av_add_options_page() {
		add_options_page(
			__( 'Slack Notification Settings', $this->text_domain ),
			__( 'Slack Notification Settings', $this->text_domain ),
			'manage_options',
			$this->plugin_name,
			array( $this, 'av_display_options_page' )
		);
	}

	/**
	 * Render the options page for plugin
	 *
	 * @since  1.0.0
	 */
	public function av_display_options_page() {
		include_once plugin_dir_path( dirname( __FILE__ ) ) .  '/admin/partials/av-slack-notifications-admin-display.php';
	}

	public function av_register_settings(){
		$settings = array(
			'url' => __( 'Slack webhook url', $this->text_domain ),
			'channel' => __( 'Slack channel to show message in', $this->text_domain ),
			'name' => __( 'Name to use on Slack', $this->text_domain ),
		);

		/**
		 * Add the title
		 */
		add_settings_section(
			$this->option_name . '_general',
			__( 'General', $this->text_domain ),
			array( $this, 'general_description' ),
			$this->plugin_name
		);

		$this->add_settings( $settings );
	}

	/**
	 * Add the settings by sending a array with 'id' => 'description'
	 *
	 * @param bool $settings
	 * @return bool
	 */
	protected function add_settings( $settings = false ){
		if( !$settings || !is_array($settings) ){
			return false;
		}

		foreach( $settings as $setting => $description ){
			if( empty( $setting ) || empty( $description ) ){
				continue;
			}

			$setting_id = $this->option_name . '_' . $setting;
			$callback = $setting . '_callback';

			add_settings_field(
				$setting_id,
				__( $description, $this->text_domain ),
				array( $this, $callback ),
				$this->plugin_name,
				$this->option_name . '_general',
				array( 'label_for' => $setting_id )
			);

			register_setting( $this->plugin_name, $setting_id );
		}

		return true;
	}

	/**
	 * Render the description for the general section
	 *
	 * @since  1.0.0
	 */
	public function general_description() {
		echo '<p>' . __( 'settings_description', $this->text_domain ) . '</p>';
	}


	/**
	 * Render the url input for this plugin
	 *
	 * @since  1.0.0
	 */
	public function url_callback() {
		echo '<input type="text" name="' . $this->option_name . '_url' . '" id="' . $this->option_name . '_url' . '" value="' . esc_html( get_option( $this->option_name . '_url' ) ) . '" />';
	}

	/**
	 * Render the channel input for this plugin
	 *
	 * @since  1.0.0
	 */
	public function channel_callback() {
		echo '<input type="text" name="' . $this->option_name . '_channel' . '" id="' . $this->option_name . '_channel' . '" value="' . esc_html( get_option( $this->option_name . '_channel' ) ) . '" />';
	}

	/**
	 * Render the name input for this plugin
	 *
	 * @since  1.0.0
	 */
	public function name_callback() {
		echo '<input type="text" name="' . $this->option_name . '_name' . '" id="' . $this->option_name . '_name' . '" value="' . esc_html( get_option( $this->option_name . '_name' ) ) . '" />';
	}

}
