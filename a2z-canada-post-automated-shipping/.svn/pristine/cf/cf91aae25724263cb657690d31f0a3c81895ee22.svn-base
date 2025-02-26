<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
if ( ! class_exists( 'hit_cp_auto' ) ) {
    class hit_cp_auto extends WC_Shipping_Method {
        /**
         * Constructor for your shipping class
         *
         * @access public
         * @return void
         */
        public function __construct() {
            $this->id                 = 'ht_cp_auto';
			$this->method_title       = __( 'Canada Post' );  // Title shown in admin
			$this->title       = __( 'Canada Post' );
            $this->method_description = __( '' ); // 
            $this->enabled            = "yes"; // This can be added as an setting but for this example its forced enabled
            $this->init();
        }

        /**
         * Init your settings
         *
         * @access public
         * @return void
         */
        function init() {
            // Load the settings API
            $this->init_form_fields(); // This is part of the settings API. Override the method to add your own settings
            $this->init_settings(); // This is part of the settings API. Loads settings you previously init.

            // Save settings in admin if you have any defined
            add_action( 'woocommerce_update_options_shipping_' . $this->id, array( $this, 'process_admin_options' ) );
			
        }
        
        /**
         * calculate_shipping function.
         *
         * @access public
         * @param mixed $package
         * @return void
         */
        public function calculate_shipping( $package = array() ) {

			$execution_status = get_option('hit_cp_auto_working_status');
			if(!empty($execution_status)){
				if($execution_status == 'stop_working'){
					return;
				}
			}

			$pack_aft_hook = apply_filters('hit_cp_auto_rate_packages', $package);
			$general_settings = get_option('hit_cp_auto_main_settings');
			$general_settings = empty($general_settings) ? array() : $general_settings;
			if(!is_array($general_settings)){
				return;
			}

			
			$value = array();
			$value['AD'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
			$value['AE'] = array('region' => 'AP', 'currency' =>'AED', 'weight' => 'KG_CM');
			$value['AF'] = array('region' => 'AP', 'currency' =>'AFN', 'weight' => 'KG_CM');
			$value['AG'] = array('region' => 'AM', 'currency' =>'XCD', 'weight' => 'LB_IN');
			$value['AI'] = array('region' => 'AM', 'currency' =>'XCD', 'weight' => 'LB_IN');
			$value['AL'] = array('region' => 'AP', 'currency' =>'EUR', 'weight' => 'KG_CM');
			$value['AM'] = array('region' => 'AP', 'currency' =>'AMD', 'weight' => 'KG_CM');
			$value['AN'] = array('region' => 'AM', 'currency' =>'ANG', 'weight' => 'KG_CM');
			$value['AO'] = array('region' => 'AP', 'currency' =>'AOA', 'weight' => 'KG_CM');
			$value['AR'] = array('region' => 'AM', 'currency' =>'ARS', 'weight' => 'KG_CM');
			$value['AS'] = array('region' => 'AM', 'currency' =>'USD', 'weight' => 'LB_IN');
			$value['AT'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
			$value['AU'] = array('region' => 'AP', 'currency' =>'AUD', 'weight' => 'KG_CM');
			$value['AW'] = array('region' => 'AM', 'currency' =>'AWG', 'weight' => 'LB_IN');
			$value['AZ'] = array('region' => 'AM', 'currency' =>'AZN', 'weight' => 'KG_CM');
			$value['AZ'] = array('region' => 'AM', 'currency' =>'AZN', 'weight' => 'KG_CM');
			$value['GB'] = array('region' => 'EU', 'currency' =>'GBP', 'weight' => 'KG_CM');
			$value['BA'] = array('region' => 'AP', 'currency' =>'BAM', 'weight' => 'KG_CM');
			$value['BB'] = array('region' => 'AM', 'currency' =>'BBD', 'weight' => 'LB_IN');
			$value['BD'] = array('region' => 'AP', 'currency' =>'BDT', 'weight' => 'KG_CM');
			$value['BE'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
			$value['BF'] = array('region' => 'AP', 'currency' =>'XOF', 'weight' => 'KG_CM');
			$value['BG'] = array('region' => 'EU', 'currency' =>'BGN', 'weight' => 'KG_CM');
			$value['BH'] = array('region' => 'AP', 'currency' =>'BHD', 'weight' => 'KG_CM');
			$value['BI'] = array('region' => 'AP', 'currency' =>'BIF', 'weight' => 'KG_CM');
			$value['BJ'] = array('region' => 'AP', 'currency' =>'XOF', 'weight' => 'KG_CM');
			$value['BM'] = array('region' => 'AM', 'currency' =>'BMD', 'weight' => 'LB_IN');
			$value['BN'] = array('region' => 'AP', 'currency' =>'BND', 'weight' => 'KG_CM');
			$value['BO'] = array('region' => 'AM', 'currency' =>'BOB', 'weight' => 'KG_CM');
			$value['BR'] = array('region' => 'AM', 'currency' =>'BRL', 'weight' => 'KG_CM');
			$value['BS'] = array('region' => 'AM', 'currency' =>'BSD', 'weight' => 'LB_IN');
			$value['BT'] = array('region' => 'AP', 'currency' =>'BTN', 'weight' => 'KG_CM');
			$value['BW'] = array('region' => 'AP', 'currency' =>'BWP', 'weight' => 'KG_CM');
			$value['BY'] = array('region' => 'AP', 'currency' =>'BYR', 'weight' => 'KG_CM');
			$value['BZ'] = array('region' => 'AM', 'currency' =>'BZD', 'weight' => 'KG_CM');
			$value['CA'] = array('region' => 'AM', 'currency' =>'CAD', 'weight' => 'LB_IN');
			$value['CF'] = array('region' => 'AP', 'currency' =>'XAF', 'weight' => 'KG_CM');
			$value['CG'] = array('region' => 'AP', 'currency' =>'XAF', 'weight' => 'KG_CM');
			$value['CH'] = array('region' => 'EU', 'currency' =>'CHF', 'weight' => 'KG_CM');
			$value['CI'] = array('region' => 'AP', 'currency' =>'XOF', 'weight' => 'KG_CM');
			$value['CK'] = array('region' => 'AP', 'currency' =>'NZD', 'weight' => 'KG_CM');
			$value['CL'] = array('region' => 'AM', 'currency' =>'CLP', 'weight' => 'KG_CM');
			$value['CM'] = array('region' => 'AP', 'currency' =>'XAF', 'weight' => 'KG_CM');
			$value['CN'] = array('region' => 'AP', 'currency' =>'CNY', 'weight' => 'KG_CM');
			$value['CO'] = array('region' => 'AM', 'currency' =>'COP', 'weight' => 'KG_CM');
			$value['CR'] = array('region' => 'AM', 'currency' =>'CRC', 'weight' => 'KG_CM');
			$value['CU'] = array('region' => 'AM', 'currency' =>'CUC', 'weight' => 'KG_CM');
			$value['CV'] = array('region' => 'AP', 'currency' =>'CVE', 'weight' => 'KG_CM');
			$value['CY'] = array('region' => 'AP', 'currency' =>'EUR', 'weight' => 'KG_CM');
			$value['CZ'] = array('region' => 'EU', 'currency' =>'CZF', 'weight' => 'KG_CM');
			$value['DE'] = array('region' => 'AP', 'currency' =>'EUR', 'weight' => 'KG_CM');
			$value['DJ'] = array('region' => 'EU', 'currency' =>'DJF', 'weight' => 'KG_CM');
			$value['DK'] = array('region' => 'AM', 'currency' =>'DKK', 'weight' => 'KG_CM');
			$value['DM'] = array('region' => 'AM', 'currency' =>'XCD', 'weight' => 'LB_IN');
			$value['DO'] = array('region' => 'AP', 'currency' =>'DOP', 'weight' => 'LB_IN');
			$value['DZ'] = array('region' => 'AM', 'currency' =>'DZD', 'weight' => 'KG_CM');
			$value['EC'] = array('region' => 'EU', 'currency' =>'USD', 'weight' => 'KG_CM');
			$value['EE'] = array('region' => 'AP', 'currency' =>'EUR', 'weight' => 'KG_CM');
			$value['EG'] = array('region' => 'AP', 'currency' =>'EGP', 'weight' => 'KG_CM');
			$value['ER'] = array('region' => 'EU', 'currency' =>'ERN', 'weight' => 'KG_CM');
			$value['ES'] = array('region' => 'AP', 'currency' =>'EUR', 'weight' => 'KG_CM');
			$value['ET'] = array('region' => 'AU', 'currency' =>'ETB', 'weight' => 'KG_CM');
			$value['FI'] = array('region' => 'AP', 'currency' =>'EUR', 'weight' => 'KG_CM');
			$value['FJ'] = array('region' => 'AP', 'currency' =>'FJD', 'weight' => 'KG_CM');
			$value['FK'] = array('region' => 'AM', 'currency' =>'GBP', 'weight' => 'KG_CM');
			$value['FM'] = array('region' => 'AM', 'currency' =>'USD', 'weight' => 'LB_IN');
			$value['FO'] = array('region' => 'AM', 'currency' =>'DKK', 'weight' => 'KG_CM');
			$value['FR'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
			$value['GA'] = array('region' => 'AP', 'currency' =>'XAF', 'weight' => 'KG_CM');
			$value['GB'] = array('region' => 'EU', 'currency' =>'GBP', 'weight' => 'KG_CM');
			$value['GD'] = array('region' => 'AM', 'currency' =>'XCD', 'weight' => 'LB_IN');
			$value['GE'] = array('region' => 'AM', 'currency' =>'GEL', 'weight' => 'KG_CM');
			$value['GF'] = array('region' => 'AM', 'currency' =>'EUR', 'weight' => 'KG_CM');
			$value['GG'] = array('region' => 'AM', 'currency' =>'GBP', 'weight' => 'KG_CM');
			$value['GH'] = array('region' => 'AP', 'currency' =>'GBS', 'weight' => 'KG_CM');
			$value['GI'] = array('region' => 'AM', 'currency' =>'GBP', 'weight' => 'KG_CM');
			$value['GL'] = array('region' => 'AM', 'currency' =>'DKK', 'weight' => 'KG_CM');
			$value['GM'] = array('region' => 'AP', 'currency' =>'GMD', 'weight' => 'KG_CM');
			$value['GN'] = array('region' => 'AP', 'currency' =>'GNF', 'weight' => 'KG_CM');
			$value['GP'] = array('region' => 'AM', 'currency' =>'EUR', 'weight' => 'KG_CM');
			$value['GQ'] = array('region' => 'AP', 'currency' =>'XAF', 'weight' => 'KG_CM');
			$value['GR'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
			$value['GT'] = array('region' => 'AM', 'currency' =>'GTQ', 'weight' => 'KG_CM');
			$value['GU'] = array('region' => 'AM', 'currency' =>'USD', 'weight' => 'LB_IN');
			$value['GW'] = array('region' => 'AP', 'currency' =>'XOF', 'weight' => 'KG_CM');
			$value['GY'] = array('region' => 'AP', 'currency' =>'GYD', 'weight' => 'LB_IN');
			$value['HK'] = array('region' => 'AM', 'currency' =>'HKD', 'weight' => 'KG_CM');
			$value['HN'] = array('region' => 'AM', 'currency' =>'HNL', 'weight' => 'KG_CM');
			$value['HR'] = array('region' => 'AP', 'currency' =>'HRK', 'weight' => 'KG_CM');
			$value['HT'] = array('region' => 'AM', 'currency' =>'HTG', 'weight' => 'LB_IN');
			$value['HU'] = array('region' => 'EU', 'currency' =>'HUF', 'weight' => 'KG_CM');
			$value['IC'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
			$value['ID'] = array('region' => 'AP', 'currency' =>'IDR', 'weight' => 'KG_CM');
			$value['IE'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
			$value['IL'] = array('region' => 'AP', 'currency' =>'ILS', 'weight' => 'KG_CM');
			$value['IN'] = array('region' => 'AP', 'currency' =>'INR', 'weight' => 'KG_CM');
			$value['IQ'] = array('region' => 'AP', 'currency' =>'IQD', 'weight' => 'KG_CM');
			$value['IR'] = array('region' => 'AP', 'currency' =>'IRR', 'weight' => 'KG_CM');
			$value['IS'] = array('region' => 'EU', 'currency' =>'ISK', 'weight' => 'KG_CM');
			$value['IT'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
			$value['JE'] = array('region' => 'AM', 'currency' =>'GBP', 'weight' => 'KG_CM');
			$value['JM'] = array('region' => 'AM', 'currency' =>'JMD', 'weight' => 'KG_CM');
			$value['JO'] = array('region' => 'AP', 'currency' =>'JOD', 'weight' => 'KG_CM');
			$value['JP'] = array('region' => 'AP', 'currency' =>'JPY', 'weight' => 'KG_CM');
			$value['KE'] = array('region' => 'AP', 'currency' =>'KES', 'weight' => 'KG_CM');
			$value['KG'] = array('region' => 'AP', 'currency' =>'KGS', 'weight' => 'KG_CM');
			$value['KH'] = array('region' => 'AP', 'currency' =>'KHR', 'weight' => 'KG_CM');
			$value['KI'] = array('region' => 'AP', 'currency' =>'AUD', 'weight' => 'KG_CM');
			$value['KM'] = array('region' => 'AP', 'currency' =>'KMF', 'weight' => 'KG_CM');
			$value['KN'] = array('region' => 'AM', 'currency' =>'XCD', 'weight' => 'LB_IN');
			$value['KP'] = array('region' => 'AP', 'currency' =>'KPW', 'weight' => 'LB_IN');
			$value['KR'] = array('region' => 'AP', 'currency' =>'KRW', 'weight' => 'KG_CM');
			$value['KV'] = array('region' => 'AM', 'currency' =>'EUR', 'weight' => 'KG_CM');
			$value['KW'] = array('region' => 'AP', 'currency' =>'KWD', 'weight' => 'KG_CM');
			$value['KY'] = array('region' => 'AM', 'currency' =>'KYD', 'weight' => 'KG_CM');
			$value['KZ'] = array('region' => 'AP', 'currency' =>'KZF', 'weight' => 'LB_IN');
			$value['LA'] = array('region' => 'AP', 'currency' =>'LAK', 'weight' => 'KG_CM');
			$value['LB'] = array('region' => 'AP', 'currency' =>'USD', 'weight' => 'KG_CM');
			$value['LC'] = array('region' => 'AM', 'currency' =>'XCD', 'weight' => 'KG_CM');
			$value['LI'] = array('region' => 'AM', 'currency' =>'CHF', 'weight' => 'LB_IN');
			$value['LK'] = array('region' => 'AP', 'currency' =>'LKR', 'weight' => 'KG_CM');
			$value['LR'] = array('region' => 'AP', 'currency' =>'LRD', 'weight' => 'KG_CM');
			$value['LS'] = array('region' => 'AP', 'currency' =>'LSL', 'weight' => 'KG_CM');
			$value['LT'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
			$value['LU'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
			$value['LV'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
			$value['LY'] = array('region' => 'AP', 'currency' =>'LYD', 'weight' => 'KG_CM');
			$value['MA'] = array('region' => 'AP', 'currency' =>'MAD', 'weight' => 'KG_CM');
			$value['MC'] = array('region' => 'AM', 'currency' =>'EUR', 'weight' => 'KG_CM');
			$value['MD'] = array('region' => 'AP', 'currency' =>'MDL', 'weight' => 'KG_CM');
			$value['ME'] = array('region' => 'AM', 'currency' =>'EUR', 'weight' => 'KG_CM');
			$value['MG'] = array('region' => 'AP', 'currency' =>'MGA', 'weight' => 'KG_CM');
			$value['MH'] = array('region' => 'AM', 'currency' =>'USD', 'weight' => 'LB_IN');
			$value['MK'] = array('region' => 'AP', 'currency' =>'MKD', 'weight' => 'KG_CM');
			$value['ML'] = array('region' => 'AP', 'currency' =>'COF', 'weight' => 'KG_CM');
			$value['MM'] = array('region' => 'AP', 'currency' =>'USD', 'weight' => 'KG_CM');
			$value['MN'] = array('region' => 'AP', 'currency' =>'MNT', 'weight' => 'KG_CM');
			$value['MO'] = array('region' => 'AP', 'currency' =>'MOP', 'weight' => 'KG_CM');
			$value['MP'] = array('region' => 'AM', 'currency' =>'USD', 'weight' => 'LB_IN');
			$value['MQ'] = array('region' => 'AM', 'currency' =>'EUR', 'weight' => 'KG_CM');
			$value['MR'] = array('region' => 'AP', 'currency' =>'MRO', 'weight' => 'KG_CM');
			$value['MS'] = array('region' => 'AM', 'currency' =>'XCD', 'weight' => 'LB_IN');
			$value['MT'] = array('region' => 'AP', 'currency' =>'EUR', 'weight' => 'KG_CM');
			$value['MU'] = array('region' => 'AP', 'currency' =>'MUR', 'weight' => 'KG_CM');
			$value['MV'] = array('region' => 'AP', 'currency' =>'MVR', 'weight' => 'KG_CM');
			$value['MW'] = array('region' => 'AP', 'currency' =>'MWK', 'weight' => 'KG_CM');
			$value['MX'] = array('region' => 'AM', 'currency' =>'MXN', 'weight' => 'KG_CM');
			$value['MY'] = array('region' => 'AP', 'currency' =>'MYR', 'weight' => 'KG_CM');
			$value['MZ'] = array('region' => 'AP', 'currency' =>'MZN', 'weight' => 'KG_CM');
			$value['NA'] = array('region' => 'AP', 'currency' =>'NAD', 'weight' => 'KG_CM');
			$value['NC'] = array('region' => 'AP', 'currency' =>'XPF', 'weight' => 'KG_CM');
			$value['NE'] = array('region' => 'AP', 'currency' =>'XOF', 'weight' => 'KG_CM');
			$value['NG'] = array('region' => 'AP', 'currency' =>'NGN', 'weight' => 'KG_CM');
			$value['NI'] = array('region' => 'AM', 'currency' =>'NIO', 'weight' => 'KG_CM');
			$value['NL'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
			$value['NO'] = array('region' => 'EU', 'currency' =>'NOK', 'weight' => 'KG_CM');
			$value['NP'] = array('region' => 'AP', 'currency' =>'NPR', 'weight' => 'KG_CM');
			$value['NR'] = array('region' => 'AP', 'currency' =>'AUD', 'weight' => 'KG_CM');
			$value['NU'] = array('region' => 'AP', 'currency' =>'NZD', 'weight' => 'KG_CM');
			$value['NZ'] = array('region' => 'AP', 'currency' =>'NZD', 'weight' => 'KG_CM');
			$value['OM'] = array('region' => 'AP', 'currency' =>'OMR', 'weight' => 'KG_CM');
			$value['PA'] = array('region' => 'AM', 'currency' =>'USD', 'weight' => 'KG_CM');
			$value['PE'] = array('region' => 'AM', 'currency' =>'PEN', 'weight' => 'KG_CM');
			$value['PF'] = array('region' => 'AP', 'currency' =>'XPF', 'weight' => 'KG_CM');
			$value['PG'] = array('region' => 'AP', 'currency' =>'PGK', 'weight' => 'KG_CM');
			$value['PH'] = array('region' => 'AP', 'currency' =>'PHP', 'weight' => 'KG_CM');
			$value['PK'] = array('region' => 'AP', 'currency' =>'PKR', 'weight' => 'KG_CM');
			$value['PL'] = array('region' => 'EU', 'currency' =>'PLN', 'weight' => 'KG_CM');
			$value['PR'] = array('region' => 'AM', 'currency' =>'USD', 'weight' => 'LB_IN');
			$value['PT'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
			$value['PW'] = array('region' => 'AM', 'currency' =>'USD', 'weight' => 'KG_CM');
			$value['PY'] = array('region' => 'AM', 'currency' =>'PYG', 'weight' => 'KG_CM');
			$value['QA'] = array('region' => 'AP', 'currency' =>'QAR', 'weight' => 'KG_CM');
			$value['RE'] = array('region' => 'AP', 'currency' =>'EUR', 'weight' => 'KG_CM');
			$value['RO'] = array('region' => 'EU', 'currency' =>'RON', 'weight' => 'KG_CM');
			$value['RS'] = array('region' => 'AP', 'currency' =>'RSD', 'weight' => 'KG_CM');
			$value['RU'] = array('region' => 'AP', 'currency' =>'RUB', 'weight' => 'KG_CM');
			$value['RW'] = array('region' => 'AP', 'currency' =>'RWF', 'weight' => 'KG_CM');
			$value['SA'] = array('region' => 'AP', 'currency' =>'SAR', 'weight' => 'KG_CM');
			$value['SB'] = array('region' => 'AP', 'currency' =>'SBD', 'weight' => 'KG_CM');
			$value['SC'] = array('region' => 'AP', 'currency' =>'SCR', 'weight' => 'KG_CM');
			$value['SD'] = array('region' => 'AP', 'currency' =>'SDG', 'weight' => 'KG_CM');
			$value['SE'] = array('region' => 'EU', 'currency' =>'SEK', 'weight' => 'KG_CM');
			$value['SG'] = array('region' => 'AP', 'currency' =>'SGD', 'weight' => 'KG_CM');
			$value['SH'] = array('region' => 'AP', 'currency' =>'SHP', 'weight' => 'KG_CM');
			$value['SI'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
			$value['SK'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
			$value['SL'] = array('region' => 'AP', 'currency' =>'SLL', 'weight' => 'KG_CM');
			$value['SM'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
			$value['SN'] = array('region' => 'AP', 'currency' =>'XOF', 'weight' => 'KG_CM');
			$value['SO'] = array('region' => 'AM', 'currency' =>'SOS', 'weight' => 'KG_CM');
			$value['SR'] = array('region' => 'AM', 'currency' =>'SRD', 'weight' => 'KG_CM');
			$value['SS'] = array('region' => 'AP', 'currency' =>'SSP', 'weight' => 'KG_CM');
			$value['ST'] = array('region' => 'AP', 'currency' =>'STD', 'weight' => 'KG_CM');
			$value['SV'] = array('region' => 'AM', 'currency' =>'USD', 'weight' => 'KG_CM');
			$value['SY'] = array('region' => 'AP', 'currency' =>'SYP', 'weight' => 'KG_CM');
			$value['SZ'] = array('region' => 'AP', 'currency' =>'SZL', 'weight' => 'KG_CM');
			$value['TC'] = array('region' => 'AM', 'currency' =>'USD', 'weight' => 'LB_IN');
			$value['TD'] = array('region' => 'AP', 'currency' =>'XAF', 'weight' => 'KG_CM');
			$value['TG'] = array('region' => 'AP', 'currency' =>'XOF', 'weight' => 'KG_CM');
			$value['TH'] = array('region' => 'AP', 'currency' =>'THB', 'weight' => 'KG_CM');
			$value['TJ'] = array('region' => 'AP', 'currency' =>'TJS', 'weight' => 'KG_CM');
			$value['TL'] = array('region' => 'AP', 'currency' =>'USD', 'weight' => 'KG_CM');
			$value['TN'] = array('region' => 'AP', 'currency' =>'TND', 'weight' => 'KG_CM');
			$value['TO'] = array('region' => 'AP', 'currency' =>'TOP', 'weight' => 'KG_CM');
			$value['TR'] = array('region' => 'AP', 'currency' =>'TRY', 'weight' => 'KG_CM');
			$value['TT'] = array('region' => 'AM', 'currency' =>'TTD', 'weight' => 'LB_IN');
			$value['TV'] = array('region' => 'AP', 'currency' =>'AUD', 'weight' => 'KG_CM');
			$value['TW'] = array('region' => 'AP', 'currency' =>'TWD', 'weight' => 'KG_CM');
			$value['TZ'] = array('region' => 'AP', 'currency' =>'TZS', 'weight' => 'KG_CM');
			$value['UA'] = array('region' => 'AP', 'currency' =>'UAH', 'weight' => 'KG_CM');
			$value['UG'] = array('region' => 'AP', 'currency' =>'USD', 'weight' => 'KG_CM');
			$value['US'] = array('region' => 'AM', 'currency' =>'USD', 'weight' => 'LB_IN');
			$value['UY'] = array('region' => 'AM', 'currency' =>'UYU', 'weight' => 'KG_CM');
			$value['UZ'] = array('region' => 'AP', 'currency' =>'UZS', 'weight' => 'KG_CM');
			$value['VC'] = array('region' => 'AM', 'currency' =>'XCD', 'weight' => 'LB_IN');
			$value['VE'] = array('region' => 'AM', 'currency' =>'VEF', 'weight' => 'KG_CM');
			$value['VG'] = array('region' => 'AM', 'currency' =>'USD', 'weight' => 'LB_IN');
			$value['VI'] = array('region' => 'AM', 'currency' =>'USD', 'weight' => 'LB_IN');
			$value['VN'] = array('region' => 'AP', 'currency' =>'VND', 'weight' => 'KG_CM');
			$value['VU'] = array('region' => 'AP', 'currency' =>'VUV', 'weight' => 'KG_CM');
			$value['WS'] = array('region' => 'AP', 'currency' =>'WST', 'weight' => 'KG_CM');
			$value['XB'] = array('region' => 'AM', 'currency' =>'EUR', 'weight' => 'LB_IN');
			$value['XC'] = array('region' => 'AM', 'currency' =>'EUR', 'weight' => 'LB_IN');
			$value['XE'] = array('region' => 'AM', 'currency' =>'ANG', 'weight' => 'LB_IN');
			$value['XM'] = array('region' => 'AM', 'currency' =>'EUR', 'weight' => 'LB_IN');
			$value['XN'] = array('region' => 'AM', 'currency' =>'XCD', 'weight' => 'LB_IN');
			$value['XS'] = array('region' => 'AP', 'currency' =>'SIS', 'weight' => 'KG_CM');
			$value['XY'] = array('region' => 'AM', 'currency' =>'ANG', 'weight' => 'LB_IN');
			$value['YE'] = array('region' => 'AP', 'currency' =>'YER', 'weight' => 'KG_CM');
			$value['YT'] = array('region' => 'AP', 'currency' =>'EUR', 'weight' => 'KG_CM');
			$value['ZA'] = array('region' => 'AP', 'currency' =>'ZAR', 'weight' => 'KG_CM');
			$value['ZM'] = array('region' => 'AP', 'currency' =>'ZMW', 'weight' => 'KG_CM');
			$value['ZW'] = array('region' => 'AP', 'currency' =>'USD', 'weight' => 'KG_CM');
			
			$des_coun = $pack_aft_hook['destination']['country'];
			$orderCurrency = $value[$des_coun]['currency'];	

			if(isset($general_settings['hit_cp_auto_rates']) && $general_settings['hit_cp_auto_rates'] == 'yes' && isset($pack_aft_hook['destination']['country']) && !empty($pack_aft_hook['destination']['country']))
			{
				$des_coun = $pack_aft_hook['destination']['country'];
				if ( ( "US" == $des_coun ) && ( "PR" == $des_coun ) ) {		
						$destination_country = "PR";
				}
				
				$weight_unit = $dim_unit = '';
				if(!empty($general_settings['hit_cp_auto_weight_unit']) && $general_settings['hit_cp_auto_weight_unit'] == 'KG_CM')
				{
					$weight_unit = 'KGS';
					$dim_unit = 'CM';
				}
				else
				{
					$weight_unit = 'LBS';
					$dim_unit = 'IN';
				}
				$total_weight_for_request = 0;
				
				// if ($pack_aft_hook) {
				// foreach ($pack_aft_hook['contents'] as $parcel) {
				// 		$parcel['products'][] = 
				// 		$quantity = $parcel['quantity'];
				// 		for($i=0;$i<$quantity; $i++)
				// 		{
				// 			$product = $parcel['data']->get_data();
				// 			$total_weight   =(string) $product['weight'];
				// 			$total_weight   = str_replace(',','.',$total_weight);
				// 			if($total_weight<0.001){
				// 				$total_weight = 0.001;
				// 			}else{
				// 				$total_weight = round((float)$total_weight,3);
				// 			}
				// 			$total_weight_for_request += $total_weight;
				// 		}
				// 	}
				// }
				$packages = $this->hit_get_canada_packages($pack_aft_hook['contents'],$general_settings,$orderCurrency);
				// echo "<pre>";
				// print_r($packages);
				// die();
				if($packages){
					$rate_costs = array();
					foreach($packages as $ky=>$package){
						$xmlRequest = '';
						if($des_coun == 'US')			
						{
							$xmlRequest =  file_get_contents(dirname(__FILE__).'/xml/rateus.xml');
							$postalcode = $pack_aft_hook['destination']['postcode'];
							
						}
						else if($des_coun == 'CA')
						{
							$xmlRequest =  file_get_contents(dirname(__FILE__).'/xml/rateca.xml');
							$postalcode = $pack_aft_hook['destination']['postcode'];
						}
						else
						{
							$xmlRequest =  file_get_contents(dirname(__FILE__).'/xml/rate.xml');
							$postalcode = $des_coun;
						}
				
						$parcel = '<parcel-characteristics>';
						$parcel .= '<weight>'.$package['Weight']['Value'].'</weight>';
						$parcel .= '</parcel-characteristics>';
				
						$cont_id = !empty($general_settings['hit_cp_auto_access_key']) ? '<contract-id>'.$general_settings['hit_cp_auto_access_key'].'</contract-id>' : '';
						$xmlRequest = str_replace('{$mailedBy}',$general_settings['hit_cp_auto_acc_no'],$xmlRequest);
						$xmlRequest = str_replace('{$contact_number}',$cont_id,$xmlRequest);
						$xmlRequest = str_replace('{$parcel_cat}',$parcel,$xmlRequest);
						$xmlRequest = str_replace('{$originPostalCode}',$general_settings['hit_cp_auto_zip'],$xmlRequest);
						$xmlRequest = str_replace('{$postalCode}',strtoupper(str_replace(" ", "", $postalcode)),$xmlRequest);
						
						// echo "<pre>";
						
						
						$service_url = (isset($general_settings['hit_cp_auto_test']) && $general_settings['hit_cp_auto_test'] != 'yes') ? 'https://soa-gw.canadapost.ca/rs/ship/price/' : 'https://ct.soa-gw.canadapost.ca/rs/ship/price/';
						$username = $general_settings['hit_cp_auto_site_id'];
						$password = $general_settings['hit_cp_auto_site_pwd'];
						$curl = curl_init($service_url); // Create REST Request
						// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
						// curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
						curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
						curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
						curl_setopt($curl, CURLOPT_POST, true);
						curl_setopt($curl, CURLOPT_POSTFIELDS, $xmlRequest);
						curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
						curl_setopt($curl, CURLOPT_USERPWD, $username . ':' . $password);
						curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/vnd.cpc.ship.rate-v3+xml', 'Accept: application/vnd.cpc.ship.rate-v3+xml'));
						
						$result = utf8_encode(curl_exec($curl));
						libxml_use_internal_errors(true);
								$xml = '';
								if(!empty($result))
						{
							$xml = simplexml_load_string( '<root>' . preg_replace('/<\?xml.*\?>/','', $result ) . '</root>' );
				
						}
				
									// echo "<pre>";
									// echo "<h1> Request </h1><br/>";
									// print_r($xml);
									// print_r($xmlRequest);
									// echo "<br/><h1> Response </h1><br/>";
									// print_r($xml);
									// die();
				
								if(isset($general_settings['hit_cp_auto_developer_rate']) && $general_settings['hit_cp_auto_developer_rate'] == 'yes')
								{
									echo "<pre>";
									echo "<h1> Request </h1><br/>";
									print_r(htmlspecialchars($xmlRequest));
									echo "<br/><h1> Response </h1><br/>";
									print_r($xml);
									// die();
								
								}
								if(empty($xml) || isset($xml->Response->ResponseStatusCode) && $xml->Response->ResponseStatusCode != '1')
								{
									return false;
								}
								$_carriers = array(
									//"Public carrier name" => "technical name",
									'DOM.RP'                        => 'Regular Parcel',
									'DOM.EP'                        => 'Expedited Parcel',
									'DOM.XP'                        => 'Xpresspost',
									'DOM.XP.CERT'                   => 'Xpresspost Certified',
									'DOM.PC'                        => 'Priority',
									'DOM.LIB'                       => 'Library Materials',
									'USA.EP'                        => 'Expedited Parcel USA',
									'USA.PW.ENV'                    => 'Priority Worldwide Envelope USA',
									'USA.PW.PAK'                    => 'Priority Worldwide pak USA',
									'USA.PW.PARCEL'                 => 'Priority Worldwide Parcel USA',
									'USA.SP.AIR'                    => 'Small Packet USA Air',
									'USA.TP'                        => 'Tracked Packet – USA',
									'USA.XP'                        => 'Xpresspost USA',
									'INT.XP'                        => 'Xpresspost International',
									'INT.IP.AIR'                    => 'International Parcel Air',
									'INT.IP.SURF'                   => 'International Parcel Surface',
									'INT.PW.ENV'                    => 'Priority Worldwide Envelope Int’l',
									'INT.PW.PAK'                    => 'Priority Worldwide pak Int’l',
									'INT.PW.PARCEL'                 => 'Priority Worldwide parcel Int’l',
									'INT.SP.AIR'                    => 'Small Packet International Air',
									'INT.SP.SURF'                   => 'Small Packet International Surface',
									'INT.TP'                        => 'Tracked Packet – International'
								);
								$carriers_available = isset($general_settings['hit_cp_auto_carrier']) && is_array($general_settings['hit_cp_auto_carrier']) ? $general_settings['hit_cp_auto_carrier'] : array();
								
								foreach($xml->{'price-quotes'}->{'price-quote'} as $ind_ky=>$indshipment)
								{
									$rate_code = (string)$indshipment->{'service-code'};
									
									if(array_key_exists($rate_code,$carriers_available) && isset($rate_costs[$rate_code]))
									{
										if($rate_costs[$rate_code]){
											if (isset($general_settings['hit_cp_auto_rates_with_tax']) && $general_settings['hit_cp_auto_rates_with_tax'] == 'yes') {
												$rate_costs[$rate_code] += (float) $indshipment->{'price-details'}->{'due'};
											} else {
												$rate_costs[$rate_code] += (float) $indshipment->{'price-details'}->{'base'};
											}
										}
									}
									if(array_key_exists($rate_code,$carriers_available) && !isset($rate_costs[$rate_code]))
									{
										if (isset($general_settings['hit_cp_auto_rates_with_tax']) && $general_settings['hit_cp_auto_rates_with_tax'] == 'yes') {
											$rate_costs[$rate_code] = (float) $indshipment->{'price-details'}->{'due'};
										} else {
											$rate_costs[$rate_code] = (float) $indshipment->{'price-details'}->{'base'};
										}
									}
								
								}
								
					}
					
					if(isset($general_settings['hit_cp_auto_developer_rate']) && $general_settings['hit_cp_auto_developer_rate'] == 'yes')
								{
									
									die();
								
								}
								foreach($rate_costs as $rate_code=>$rate_cost){
									

								$rate_cst = apply_filters('hit_cp_auto_rate_cost',$rate_cost,$rate_code);
									
									
									if($rate_cost > 0)
									{
									
										$rate_name = $_carriers[$rate_code];
										$name = isset($carriers_name_available[$rate_code]) && !empty($carriers_name_available[$rate_code]) ? $carriers_name_available[$rate_code] : $rate_name;
									
									
										$rate = array(
											'id'       => 'hits'.$rate_code,
											'label'    => __( $name ),
											'cost'     => $rate_cst,
											'meta_data' => '');
											
											$this->add_rate( $rate );
										
									}
								}
					
								
					
					//end packages


				}
				
		
				// die();
			}
			
        }

        public function hit_get_canada_packages($package,$general_settings,$orderCurrency,$chk = false)
		{
			switch ($general_settings['hit_cp_auto_packing_type']) {
				case 'box' :
					return $this->box_shipping($package,$general_settings,$orderCurrency,$chk);
					break;
				case 'weight_based' :
					return $this->weight_based_shipping($package,$general_settings,$orderCurrency,$chk);
					break;
				case 'per_item' :
				default :
					return $this->per_item_shipping($package,$general_settings,$orderCurrency,$chk);
					break;
			}
		}
		private function weight_based_shipping($package,$general_settings,$orderCurrency,$chk = false)
		{
			// echo '<pre>';
			// print_r($package);
			// die();
			if ( ! class_exists( 'WeightPack' ) ) {
				include_once 'classes/weight_pack/class-hit-weight-packing.php';
			}
			$max_weight = isset($general_settings['hit_cp_auto_max_weight']) && $general_settings['hit_cp_auto_max_weight'] !=''  ? $general_settings['hit_cp_auto_max_weight'] : 10 ;
			$weight_pack=new WeightPack('pack_descending');
			$weight_pack->set_max_weight($max_weight);

			$package_total_weight = 0;
			$insured_value = 0;

			$ctr = 0;
			foreach ($package as $item_id => $values) {
				$ctr++;
				$product = $values['data'];
				$product_data = $product->get_data();

				if (!$product_data['weight']) {
					$product_data['weight'] = 0.001;
				}
				$chk_qty = $chk ? $values['product_quantity'] : $values['quantity'];

				$weight_pack->add_item($product_data['weight'], $values, $chk_qty);
			}

			$pack   =   $weight_pack->pack_items();  
			$errors =   $pack->get_errors();
			if( !empty($errors) ){
				//do nothing
				return;
			} else {
				$boxes    =   $pack->get_packed_boxes();
				$unpacked_items =   $pack->get_unpacked_items();

				$insured_value        =   0;

				$packages      =   array_merge( $boxes, $unpacked_items ); // merge items if unpacked are allowed
				$package_count  =   sizeof($packages);
				// get all items to pass if item info in box is not distinguished
				$packable_items =   $weight_pack->get_packable_items();
				$all_items    =   array();
				if(is_array($packable_items)){
					foreach($packable_items as $packable_item){
						$all_items[]    =   $packable_item['data'];
					}
				}
				//pre($packable_items);
				$order_total = '';

				$to_ship  = array();
				$group_id = 1;
				foreach($packages as $package){//pre($package);
					$packed_products = array();
					if(($package_count  ==  1) && isset($order_total)){
						$insured_value  =  (isset($product_data['product_price']) ? $product_data['product_price'] : $product_data['price']) * (isset($values['product_quantity']) ? $values['product_quantity'] : $values['quantity']);
					}else{
						$insured_value  =   0;
						if(!empty($package['items'])){
							foreach($package['items'] as $item){               

								$insured_value        =   $insured_value; //+ $item->price;
							}
						}else{
							if( isset($order_total) && $package_count){
								$insured_value  =   $order_total/$package_count;
							}
						}
					}
					$packed_products    =   isset($package['items']) ? $package['items'] : $all_items;
					// Creating package request
					$package_total_weight   = $package['weight'];

					$insurance_array = array(
						'Amount' => $insured_value,
						'Currency' => $orderCurrency
					);

					$group = array(
						'GroupNumber' => $group_id,
						'GroupPackageCount' => 1,
						'Weight' => array(
						'Value' => round($package_total_weight, 3),
						'Units' => (isset($general_settings['weg_dim']) && $general_settings['weg_dim'] ==='yes') ? 'KG' : 'LBS'
					),
						'packed_products' => $packed_products,
					);
					$group['InsuredValue'] = $insurance_array;
					$group['packtype'] = 'BOX';

					$to_ship[] = $group;
					$group_id++;
				}
			}
			return $to_ship;
		}
		private function box_shipping($package,$general_settings,$orderCurrency,$chk = false)
		{
			if (!class_exists('HIT_Boxpack')) {
				include_once 'classes/hit-box-packing.php';
			}
			$boxpack = new HIT_Boxpack();
			$boxes = Configuration::get('hit_cp_auto_shipping_services_box');
			if(empty($boxes))
			{
				return false;
			}
			$boxes = unserialize($boxes);
			// Define boxes
			foreach ($boxes as $key => $box) {
				if (!$box['enabled']) {
					continue;
				}
				$box['pack_type'] = !empty($box['pack_type']) ? $box['pack_type'] : 'BOX' ;

				$newbox = $boxpack->add_box($box['length'], $box['width'], $box['height'], $box['box_weight'], $box['pack_type']);

				if (isset($box['id'])) {
					$newbox->set_id(current(explode(':', $box['id'])));
				}

				if ($box['max_weight']) {
					$newbox->set_max_weight($box['max_weight']);
				}
				if ($box['pack_type']) {
					$newbox->set_packtype($box['pack_type']);
				}
			}

			// Add items
			foreach ($package as $item_id => $values) {

				$skip_product = '';
				if($skip_product){
					continue;
				}

				if ( $values['width'] && $values['height'] && $values['depth'] && $values['weight'] ) {

					$dimensions = array( $values['depth'], $values['height'], $values['width']);
					$chk_qty = $chk ? $values['product_quantity'] : $values['cart_quantity'];
					for ($i = 0; $i < $chk_qty; $i ++) {
						$boxpack->add_item($dimensions[2], $dimensions[1], $dimensions[0], $values['weight'], $values['price'], array(
							'data' => $values
						)
										  );
					}
				} else {
					//    $this->debug(sprintf(__('Product #%s is missing dimensions. Aborting.', 'wf-shipping-cp'), $item_id), 'error');
					return;
				}
			}

			// Pack it
			$boxpack->pack();
			$packages = $boxpack->get_packages();
			$to_ship = array();
			$group_id = 1;
			foreach ($packages as $package) {
				if ($package->unpacked === true) {
					//$this->debug('Unpacked Item');
				} else {
					//$this->debug('Packed ' . $package->id);
				}

				$dimensions = array($package->length, $package->width, $package->height);

				sort($dimensions);
				$insurance_array = array(
					'Amount' => round($package->value),
					'Currency' => $orderCurrency->iso_code
				);


				$group = array(
					'GroupNumber' => $group_id,
					'GroupPackageCount' => 1,
					'Weight' => array(
					'Value' => round($package->weight, 3),
					'Units' => (isset($general_settings['weg_dim']) && $general_settings['weg_dim'] ==='yes') ? 'KG' : 'LBS'
				),
					'Dimensions' => array(
					'Length' => max(1, round($dimensions[2], 3)),
					'Width' => max(1, round($dimensions[1], 3)),
					'Height' => max(1, round($dimensions[0], 3)),
					'Units' => (isset($general_settings['weg_dim']) && $general_settings['weg_dim'] ==='yes') ? 'CM' : 'IN'
				),
					'InsuredValue' => $insurance_array,
					'packed_products' => array(),
					'package_id' => $package->id,
					'packtype' => isset($package->packtype)?$package->packtype:'BOX'
				);

				if (!empty($package->packed) && is_array($package->packed)) {
					foreach ($package->packed as $packed) {
						$group['packed_products'][] = $packed->get_meta('data');
					}
				}

				$to_ship[] = $group;

				$group_id++;
			}

			return $to_ship;
		}
		private function per_item_shipping($package,$general_settings,$orderCurrency,$chk = false) {
			$to_ship = array();
			$group_id = 1;

			// Get weight of order
			foreach ($package as $item_id => $values) {
				$product = $values['data'];
				$product_data = $product->get_data();
				
				$group = array();
				$insurance_array = array(
					'Amount' => round($product_data['price']),
					'Currency' => $orderCurrency
				);

				if($product_data['weight'] < 0.001){
					$cp_per_item_weight = 0.001;
				}else{
					$cp_per_item_weight = round($product_data['weight'], 3);
				}
				$group = array(
					'GroupNumber' => $group_id,
					'GroupPackageCount' => 1,
					'Weight' => array(
					'Value' => $cp_per_item_weight,
					'Units' => (isset($general_settings['hit_cp_auto_weight_unit']) && $general_settings['hit_cp_auto_weight_unit'] == 'KG_CM') ? 'KG' : 'LBS'
				),
					'packed_products' => $product
				);

				if ($product_data['width'] && $product_data['height'] && $product_data['length']) {

					$group['Dimensions'] = array(
						'Length' => max(1, round($product_data['length'],3)),
						'Width' => max(1, round($product_data['width'],3)),
						'Height' => max(1, round($product_data['height'],3)),
						'Units' => (isset($general_settings['hit_cp_auto_weight_unit']) && $general_settings['hit_cp_auto_weight_unit'] == 'KG_CM') ? 'CM' : 'IN'
					);
				}

				$group['packtype'] = 'BOX';

				$group['InsuredValue'] = $insurance_array;

				$chk_qty = $chk ? $values['product_quantity'] : $values['quantity'];

				for ($i = 0; $i < $chk_qty; $i++)
					$to_ship[] = $group;

				$group_id++;
			}

			return $to_ship;
		}
		private function hit_get_zipcode_or_city($country, $city, $postcode) {
			$no_postcode_country = array('AE', 'AF', 'AG', 'AI', 'AL', 'AN', 'AO', 'AW', 'BB', 'BF', 'BH', 'BI', 'BJ', 'BM', 'BO', 'BS', 'BT', 'BW', 'BZ', 'CD', 'CF', 'CG', 'CI', 'CK',
									 'CL', 'CM', 'CO', 'CR', 'CV', 'DJ', 'DM', 'DO', 'EC', 'EG', 'ER', 'ET', 'FJ', 'FK', 'GA', 'GD', 'GH', 'GI', 'GM', 'GN', 'GQ', 'GT', 'GW', 'GY', 'HK', 'HN', 'HT', 'IE', 'IQ', 'IR',
									 'JM', 'JO', 'KE', 'KH', 'KI', 'KM', 'KN', 'KP', 'KW', 'KY', 'LA', 'LB', 'LC', 'LK', 'LR', 'LS', 'LY', 'ML', 'MM', 'MO', 'MR', 'MS', 'MT', 'MU', 'MW', 'MZ', 'NA', 'NE', 'NG', 'NI',
									 'NP', 'NR', 'NU', 'OM', 'PA', 'PE', 'PF', 'PY', 'QA', 'RW', 'SA', 'SB', 'SC', 'SD', 'SL', 'SN', 'SO', 'SR', 'SS', 'ST', 'SV', 'SY', 'TC', 'TD', 'TG', 'TL', 'TO', 'TT', 'TV', 'TZ',
									 'UG', 'UY', 'VC', 'VE', 'VG', 'VN', 'VU', 'WS', 'XA', 'XB', 'XC', 'XE', 'XL', 'XM', 'XN', 'XS', 'YE', 'ZM', 'ZW');

			$postcode_city = !in_array( $country, $no_postcode_country ) ? $postcode_city = "<Postalcode>{$postcode}</Postalcode>" : '';
			if( !empty($city) ){
				$postcode_city .= "<City>{$city}</City>";
			}
			return $postcode_city;
		}	
		/**
		 * Initialise Gateway Settings Form Fields
		 */
		public function init_form_fields() {
			 $this->form_fields = array('hit_cp_auto' => array('type'=>'hit_cp_auto'));
		}
		 public function generate_hit_cp_auto_html() {
			
			$general_settings = get_option('hit_cp_auto_main_settings');
			$general_settings = empty($general_settings) ? array() : $general_settings;
			if(!empty($general_settings)){
				wp_redirect(admin_url('options-general.php?page=hit-cp-configuration'));
			}

			if(isset($_POST['configure_the_plugin'])){
				// global $woocommerce;
				// $countries_obj   = new WC_Countries();
				// $countries   = $countries_obj->__get('countries');
				// $default_country = $countries_obj->get_base_country();

				// if(!isset($general_settings['hit_cp_auto_country'])){
				// 	$general_settings['hit_cp_auto_country'] = $default_country;
				// 	update_option('hit_cp_auto_main_settings', $general_settings);
				
				// }
				wp_redirect(admin_url('options-general.php?page=hit-cp-configuration'));	
			}
		?>
			<style>

			.card {
				background-color: #fff;
				border-radius: 5px;
				width: 800px;
				max-width: 800px;
				height: auto;
				text-align:center;
				margin: 10px auto 100px auto;
				box-shadow: 0px 1px 20px 1px hsla(213, 33%, 68%, .6);
			}  

			.content {
				padding: 20px 20px;
			}


			h2 {
				text-transform: uppercase;
				color: #000;
				font-weight: bold;
			}


			.boton {
				text-align: center;
			}

			.boton button {
				font-size: 18px;
				border: none;
				outline: none;
				color: #166DB4;
				text-transform: capitalize;
				background-color: #fff;
				cursor: pointer;
				font-weight: bold;
			}

			button:hover {
				text-decoration: underline;
				text-decoration-color: #166DB4;
			}
						</style>
						<!-- Fuente Mulish -->
						

			<div class="card">
				<div class="content">
					<div class="logo">
					<img src="<?php echo plugin_dir_url(__FILE__); ?>views/cp.png" style="width:150px;" alt="logo canadapost" />
					</div>
					<h2><strong>Shipi + Canada Post</strong></h2>
					<p style="font-size: 14px;line-height: 27px;">
					<?php _e('Welcome to Shipi! You are at just one-step ahead to configure the Canada Post with Shipi.','hit_cp_auto') ?><br>
					<?php _e('We have lot of features that will take your e-commerce store to another level.','hit_cp_auto') ?><br><br>
					<?php _e('Shipi helps you to save time, reduce errors, and worry less when you automate your tedious, manual tasks. Shipi + our plugin can generate shipping labels, Commercial invoice, display real time rates, track orders, audit shipments, and supports both domestic & international Canada Post services.','hit_cp_auto') ?><br><br>
					<?php _e('Make your customers happier by reacting faster and handling their service requests in a timely manner, meaning higher store reviews and more revenue.','hit_cp_auto') ?><br>
					</p>
						
				</div>
				<div class="boton" style="padding-bottom:10px;">
				<button class="button-primary" name="configure_the_plugin" style="padding:8px;">Configure the plugin</button>
				</div>
				</div>
			<?php
			echo '<style>button.button-primary.woocommerce-save-button{display:none;}</style>';
			
		 }


		 }
    }
