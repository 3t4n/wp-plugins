<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       www.acewebx.com
 * @since      1.0.0
 *
 * @package    Ace_Twilio_For_Woocommerce
 * @subpackage Ace_Twilio_For_Woocommerce/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Ace_Twilio_For_Woocommerce
 * @subpackage Ace_Twilio_For_Woocommerce/public
 * @author     AceWebx Team <developer@acewebx.com>
 */
class Ace_Twilio_For_Woocommerce_Public
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

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/ace-twilio-for-woocommerce-public.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/ace-twilio-for-woocommerce-public.js', array('jquery'), $this->version, false);
	}

	private function _sendTwilioNotification($orderId)
	{
		$order = wc_get_order($orderId);
		$customerName   = $order->data['billing']['first_name'];
		$customerNumber = $order->data['billing']['phone'];
		$status          = $order->data['status'];
		$countryName =  $order->data['billing']['country'];

		$ace_twilio_setting_data  =  get_option('ace_twilio_setting_data');
		$select_status            =  $ace_twilio_setting_data['ace_payment_twilio_enabled'];
		$status_massage           =  $ace_twilio_setting_data['ace_twilio_message'];
		$twillioEnable            =  $ace_twilio_setting_data['ace_twilio_enable_de'];

		$twilioFromCountry	=  $ace_twilio_setting_data['ace_from_country_code'];
		$twilioFrom			=  $ace_twilio_setting_data['ace_from_twilio_number'];
		$twilioSID         	=  $ace_twilio_setting_data['ace_twilio_sid'];
		$twilioToken       	=  $ace_twilio_setting_data['ace_twilio_auth'];
		$ErrMsg = '';
		$f=0;
		// country code array 
		$countryCodes = array(
			'AF' => '+93',
			'AL' => '+355',
			'DZ' => '+213',
			'AS' => '+1-684',
			'AD' => '+376',
			'AO' => '+244',
			'AI' => '+1-264',
			'AQ' => '+672',
			'AG' => '+1-268',
			'AR' => '+54',
			'AM' => '+374',
			'AW' => '+297',
			'AU' => '+61',
			'AT' => '+43',
			'AZ' => '+994',
			'BS' => '+1-242',
			'BH' => '+973',
			'BD' => '+880',
			'BB' => '+1-246',
			'BY' => '+375',
			'BE' => '+32',
			'BZ' => '+501',
			'BJ' => '+229',
			'BM' => '+1-441',
			'BT' => '+975',
			'BO' => '+591',
			'BA' => '+387',
			'BW' => '+267',
			'BV' => '+47',
			'BR' => '+55',
			'BQ' => '+599',
			'IO' => '+246',
			'VG' => '+1-284',
			'BN' => '+673',
			'BG' => '+359',
			'BF' => '+226',
			'BI' => '+257',
			'KH' => '+855',
			'CM' => '+237',
			'CA' => '+1',
			'CT' => '+235',
			'CV' => '+238',
			'KY' => '+1-345',
			'CF' => '+236',
			'TD' => '+235',
			'CL' => '+56',
			'CN' => '+86',
			'CX' => '+61',
			'CC' => '+61',
			'CO' => '+57',
			'KM' => '+269',
			'CG' => '+242',
			'CD' => '+243',
			'CK' => '+682',
			'CR' => '+506',
			'HR' => '+385',
			'CU' => '+53',
			'CY' => '+357',
			'CZ' => '+420',
			'CI' => '+225',
			'DK' => '+45',
			'DJ' => '+253',
			'DM' => '+1-767',
			'DO' => '+1-809',
			'NQ' => '+672',
			'DD' => '+49',
			'EC' => '+593',
			'EG' => '+20',
			'SV' => '+503',
			'GQ' => '+240',
			'ER' => '+291',
			'EE' => '+372',
			'ET' => '+251',
			'FK' => '+500',
			'FO' => '+298',
			'FJ' => '+679',
			'FI' => '+358',
			'FR' => '+33',
			'GF' => '+594',
			'PF' => '+689',
			'TF' => '+262',
			'FQ' => '+262',
			'GA' => '+241',
			'GM' => '+220',
			'GE' => '+995',
			'DE' => '+49',
			'GH' => '+233',
			'GI' => '+350',
			'GR' => '+30',
			'GL' => '+299',
			'GD' => '+1-473',
			'GP' => '+590',
			'GU' => '+1-671',
			'GG' => '+44-1481',
			'GN' => '+224',
			'GW' => '+245',
			'GY' => '+592',
			'HT' => '+509',
			'HM' => '+672',
			'HN' => '+504',
			'HK' => '+852',
			'HU' => '+36',
			'IS' => '+354',
			'IN' => '+91',
			'ID' => '+62',
			'IR' => '+98',
			'IQ' => '+964',
			'IE' => '+353',
			'IM' => '+44-1624',
			'IL' => '+972',
			'IT' => '+39',
			'JM' => '+1-876',
			'JP' => '+81',
			'JE' => '+44-1534',
			'JT' => '+44',
			'JO' => '+962',
			'KZ' => '+7',
			'KE' => '+254',
			'KI' => '+686',
			'KW' => '+965',
			'KG' => '+996',
			'LA' => '+856',
			'LV' => '+371',
			'LB' => '+961',
			'LS' => '+266',
			'LR' => '+231',
			'LY' => '+218',
			'LI' => '+423',
			'LT' => '+370',
			'LU' => '+352',
			'MO' => '+853',
			'MK' => '+389',
			'MG' => '+261',
			'MW' => '+265',
			'MY' => '+60',
			'MV' => '+960',
			'ML' => '+223',
			'MT' => '+356',
			'MH' => '+692',
			'MQ' => '+596',
			'MR' => '+222',
			'MU' => '+230',
			'YT' => '+262',
			'FX' => '+33',
			'MX' => '+52',
			'FM' => '+691',
			'MI' => '+44',
			'MD' => '+373',
			'MC' => '+377',
			'MN' => '+976',
			'ME' => '+382',
			'MS' => '+1-664',
			'MA' => '+212',
			'MZ' => '+258',
			'MM' => '+95',
			'NA' => '+264',
			'NR' => '+674',
			'NP' => '+977',
			'NL' => '+31',
			'AN' => '+599',
			'NT' => '+672',
			'NC' => '+687',
			'NZ' => '+64',
			'NI' => '+505',
			'NE' => '+227',
			'NG' => '+234',
			'NU' => '+683',
			'NF' => '+672',
			'KP' => '+850',
			'VD' => '+84',
			'MP' => '+1-670',
			'NO' => '+47',
			'OM' => '+968',
			'PC' => '+507',
			'PK' => '+92',
			'PW' => '+680',
			'PS' => '+970',
			'PA' => '+507',
			'PZ' => '+507',
			'PG' => '+675',
			'PY' => '+595',
			'YD' => '+967',
			'PE' => '+51',
			'PH' => '+63',
			'PN' => '+64',
			'PL' => '+48',
			'PT' => '+351',
			'PR' => '+1-787',
			'QA' => '+974',
			'RO' => '+40',
			'RU' => '+7',
			'RW' => '+250',
			'RE' => '+262',
			'BL' => '+590',
			'SH' => '+290',
			'KN' => '+1-869',
			'LC' => '+1-758',
			'MF' => '+590',
			'PM' => '+508',
			'VC' => '+1-784',
			'WS' => '+685',
			'SM' => '+378',
			'SA' => '+966',
			'SN' => '+221',
			'RS' => '+381',
			'CS' => '+381',
			'SC' => '+248',
			'SL' => '+232',
			'SG' => '+65',
			'SK' => '+421',
			'SI' => '+386',
			'SB' => '+677',
			'SO' => '+252',
			'ZA' => '+27',
			'GS' => '+500',
			'KR' => '+82',
			'ES' => '+34',
			'LK' => '+94',
			'SD' => '+249',
			'SR' => '+597',
			'SJ' => '+47',
			'SZ' => '+268',
			'SE' => '+46',
			'CH' => '+41',
			'SY' => '+963',
			'ST' => '+239',
			'TW' => '+886',
			'TJ' => '+992',
			'TZ' => '+255',
			'TH' => '+66',
			'TL' => '+670',
			'TG' => '+228',
			'TK' => '+690',
			'TO' => '+676',
			'TT' => '+1-868',
			'TN' => '+216',
			'TR' => '+90',
			'TM' => '+993',
			'TC' => '+1-649',
			'TV' => '+688',
			'UM' => '+1',
			'PU' => '+1-787',
			'VI' => '+1-340',
			'UG' => '+256',
			'UA' => '+380',
			'SU' => '+7',
			'AE' => '+971',
			'GB' => '+44',
			'US' => '+1',
			'ZZ' => '+0',
			'UY' => '+598',
			'UZ' => '+998',
			'VU' => '+678',
			'VA' => '+379',
			'VE' => '+58',
			'VN' => '+84',
			'WF' => '+681',
			'EH' => '+212',
			'YE' => '+967',
			'ZM' => '+260',
			'ZW' => '+263',
			'AX' => '+358-18',
		);
		$countryCode = isset($countryCodes[$countryName]) ? $countryCodes[$countryName] : '';	
		if ($twillioEnable != 'on') return;

		$twilioMessage = bloginfo('name');
		foreach ($select_status as $key => $value) {
			if ($status == $key &&  $value == 'on') {
				$twilioMessage .= ". " . $status_massage[$status];
			}
		}
		$twilioMessage .= " Order ID - $orderId.";



		if ($customerNumber == '') return;
		if (substr($customerNumber, 0, strlen($countryCode)) === $countryCode) {
          // Remove the country code from the phone number
           $customerNumber = substr($customerNumber, strlen($countryCode));
       } else {
        // Country code is not present, keep the original phone number
        $customerNumber = $customerNumber;
       }
		$postFeilds = [
			"Body" 	=> $twilioMessage,
			"From" 	=> '+' . $twilioFromCountry . '' . $twilioFrom,
			"To" 	=>  $countryCode . $customerNumber,
		];
	

  $sendContent =  http_build_query($postFeilds);

	$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.twilio.com/2010-04-01/Accounts/$twilioSID/Messages.json",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => $sendContent,
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/x-www-form-urlencoded',
				'Authorization: Basic ' . base64_encode($twilioSID . ':' . $twilioToken),
			),
		));
		$response = curl_exec($curl);
		$countryCodeError = json_decode($response, true);
		curl_close($curl);
	}
	public function aceNewOrderReceived($orderId)
	{	
		if($f==0){
		$res = $this->_sendTwilioNotification($orderId);
			$f=1;
		}
	}
	public function aceOrderStatusChanged($orderId)
	{	
		$check = $this->_sendTwilioNotification($orderId);
	}

}
