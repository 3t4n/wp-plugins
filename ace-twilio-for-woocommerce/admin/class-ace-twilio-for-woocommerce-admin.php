<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       www.acewebx.com
 * @since      1.0.0
 *
 * @package    Ace_Twilio_For_Woocommerce
 * @subpackage Ace_Twilio_For_Woocommerce/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ace_Twilio_For_Woocommerce
 * @subpackage Ace_Twilio_For_Woocommerce/admin
 * @author     AceWebx Team <developer@acewebx.com>
 */

require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-ace-twilio-for-woocommerce-config.php';


class Ace_Twilio_For_Woocommerce_Admin
{

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

	private $config;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->config = new Ace_Config();
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function aceEnqueueStyles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ace_Twilio_For_Woocommerce_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ace_Twilio_For_Woocommerce_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/ace-twilio-for-woocommerce-admin.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function aceEnqueueScripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ace_Twilio_For_Woocommerce_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ace_Twilio_For_Woocommerce_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/ace-twilio-for-woocommerce-admin.js', array('jquery'), $this->version, false);
	}

	function aceTwilioWoo()
	{
		add_menu_page(
			'Ace Twilio Woo',     // page title
			'Ace Twilio Woo',     // menu title
			'manage_options',   // capability
			'ace-twilio-woo',     // menu slug
			array($this, 'aceTwilioWooCallback'), // callback function
			'dashicons-dashboard', // icon 
			52
		);
	}

	function aceTwilioWooCallback()
	{
		$countryCodes = $this->config->get('ace_country_codes');

		if (isset($_POST['submit'])) {

			unset($_POST['submit']);

			$aceTwilioEnableDe    	=  (isset($_POST['ace_twilio_enable_de'])) ? $_POST['ace_twilio_enable_de'] : "";
			$aceTwilioSid    		=  (isset($_POST['ace_twilio_sid'])) ? $_POST['ace_twilio_sid'] : "";

			$aceTwilioAuth         	=  (isset($_POST['ace_twilio_auth'])) ? $_POST['ace_twilio_auth'] : "";
			$aceFromTwilioNumber  	=  (isset($_POST['ace_from_twilio_number'])) ? $_POST['ace_from_twilio_number'] : "";
			$aceFromCountryCode    	=  (isset($_POST['ace_from_country_code'])) ? $_POST['ace_from_country_code'] : "";

			$pendingPayment         =  (isset($_POST['pending_payment'])) ? $_POST['pending_payment'] : "";
			$processingPayment      =  (isset($_POST['processing_payment'])) ? $_POST['processing_payment'] : "";
			$completePayment        =  (isset($_POST['complete_payment'])) ? $_POST['complete_payment'] : "";
			$onHold                 =  (isset($_POST['on_hold'])) ? $_POST['on_hold'] : "";
			$cancelled              =  (isset($_POST['cancelled'])) ? $_POST['cancelled'] : "";
			$refunded               =  (isset($_POST['refunded'])) ? $_POST['refunded'] : "";
			$failed                 =  (isset($_POST['failed'])) ? $_POST['failed'] : "";

			$acePendingMess        =  (isset($_POST['ace_pending_mess'])) ? $_POST['ace_pending_mess'] : "";
			$aceProcessingMess     =  (isset($_POST['ace_processing_mess'])) ? $_POST['ace_processing_mess'] : "";
			$aceCompleteMess       =  (isset($_POST['ace_complete_mess'])) ? $_POST['ace_complete_mess'] : "";
			$aceHoldMess           =  (isset($_POST['ace_hold_mess'])) ? $_POST['ace_hold_mess'] : "";
			$aceCancelledMess      =  (isset($_POST['ace_cancelled_mess'])) ? $_POST['ace_cancelled_mess'] : "";
			$aceRefundedMess       =  (isset($_POST['ace_refunded_mess'])) ? $_POST['ace_refunded_mess'] : "";
			$aceFailedMess         =  (isset($_POST['ace_failed_mess'])) ? $_POST['ace_failed_mess'] : "";

			$error = [];

			$numberStrlenFrom = strlen($aceFromTwilioNumber);

			if (!trim($aceTwilioEnableDe)) {
				$error['ace_twilio_enable_de'] =  "<i>Note: Enable Twilio SMS</i>";
			}
			if (!trim($aceTwilioSid)) {
				$error['ace_twilio_sid'] =  "<i>Note: Enter Account SID</i>";
			}
			if (!trim($aceTwilioAuth)) {
				$error['ace_twilio_auth'] =  "<i>Note: Enter Twilio Account Auth Token  </i>";
			}
			if (!trim($acePendingMess)) {
				$error['ace_pending_mess'] =  "<i>Note: This field is required.</i>";
			}
			if (!trim($aceProcessingMess)) {
				$error['ace_processing_mess'] =  "<i>Note: This field is required.</i>";
			}
			if (!trim($aceCompleteMess)) {
				$error['ace_complete_mess'] =  "<i>Note: This field is required.</i>";
			}
			if (!trim($aceHoldMess)) {
				$error['ace_hold_mess'] =  "<i>Note: This field is required.</i>";
			}
			if (!trim($aceCancelledMess)) {
				$error['ace_cancelled_mess'] =  "<i>Note: This field is required.</i>";
			}
			if (!trim($aceRefundedMess)) {
				$error['ace_refunded_mess'] =  "<i>Note: This field is required.</i>";
			}
			if (!trim($aceFailedMess)) {
				$error['ace_failed_mess'] =  "<i>Note: This field is required.</i>";
			}
			if (!$pendingPayment && !$processingPayment && !$completePayment && !$onHold && !$cancelled && !$refunded && !$failed) {
				$error['payment_notification'] =  "<i>Note: Please choose at least one status.  </i>";
			}

			if (!$aceFromCountryCode) {
				$error['from_phone'] =  "<i>Note: Enter from number with country code </i>";
			}

			if (trim($numberStrlenFrom) != 10) {
				$error['from_length'] =  "<i>Note: From number must have 10 digits. </i>";
			}

			$ace_payment_twilio_enabled =  array(
				'pending'             => $pendingPayment,
				'processing'          => $processingPayment,
				'completed'           => $completePayment,
				'on-hold'             => $onHold,
				'cancelled'           => $cancelled,
				'refunded'            => $refunded,
				'failed'              => $failed
			);

			$ace_twilio_message = array(
				'pending'     =>  $acePendingMess,
				'processing'  =>  $aceProcessingMess,
				'completed'   =>  $aceCompleteMess,
				'on-hold'     =>  $aceHoldMess,
				'cancelled'   =>  $aceCancelledMess,
				'refunded'    =>  $aceRefundedMess,
				'failed'      =>  $aceFailedMess
			);

			$data = array(
				'ace_twilio_enable_de'          => $aceTwilioEnableDe,
				'ace_twilio_sid'                => $aceTwilioSid,
				'ace_twilio_auth'               => $aceTwilioAuth,
				'ace_payment_twilio_enabled'    => $ace_payment_twilio_enabled,
				'ace_twilio_message'            => $ace_twilio_message,
				'ace_from_country_code'         => $aceFromCountryCode,
				'ace_from_twilio_number'        => ''
			);

			if (empty($error['from_phone']) && empty($error['from_length'])) {
				$data['ace_from_twilio_number'] = $aceFromTwilioNumber;
			}

			update_option('ace_twilio_setting_data', $data);
		}
		require_once plugin_dir_path(__FILE__) . 'partials/ace-twilio-for-woocommerce-admin-display.php';
	}
}
