<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
wp_enqueue_script("jquery");
$error = $success =  '';

global $woocommerce;
global $wpdb;

$_carriers = array(
	//domestic
	'FIRST_OVERNIGHT'                    => 'FedEx First Overnight',
	'PRIORITY_OVERNIGHT'                 => 'FedEx Priority Overnight',
	'STANDARD_OVERNIGHT'                 => 'FedEx Standard Overnight',
	'FEDEX_2_DAY_AM'                     => 'FedEx 2Day A.M',
	'FEDEX_2_DAY'                        => 'FedEx 2Day',
	'SAME_DAY'                        	 => 'FedEx Same Day',
	'SAME_DAY_CITY'                      => 'FedEx Same Day City',
	'SAME_DAY_METRO_AFTERNOON'           => 'FedEx Same Day Metro Afternoon',
	'SAME_DAY_METRO_MORNING'             => 'FedEx Same Day Metro Morning',
	'SAME_DAY_METRO_RUSH'                => 'FedEx Same Day Metro Rush',
	'FEDEX_EXPRESS_SAVER'                => 'FedEx Express Saver',
	'GROUND_HOME_DELIVERY'               => 'FedEx Ground Home Delivery',
	'FEDEX_GROUND'                       => 'FedEx Ground',
	'FEDEX_1_DAY_FREIGHT'                => 'FedEx 1 Day Freight',
	'FEDEX_2_DAY_FREIGHT'                => 'FedEx 2 Day Freight',
	'FEDEX_3_DAY_FREIGHT'                => 'FedEx 3 Day Freight',
	'SMART_POST'                         => 'FedEx Smart Post',
	'FEDEX_FIRST_FREIGHT'                => 'FedEx First Freight',
	'FEDEX_FREIGHT_ECONOMY'              => 'FedEx Freight Economy',
	'FEDEX_FREIGHT_PRIORITY'             => 'FedEx Freight Priority',
	'FEDEX_DISTANCE_DEFERRED'            => 'FedEx Distance Deferred',
	'FEDEX_NEXT_DAY_EARLY_MORNING'       => 'FedEx Next Day Early Morning',
	'FEDEX_NEXT_DAY_MID_MORNING'         => 'FedEx Next Day Mid Morning',
	'FEDEX_NEXT_DAY_AFTERNOON'           => 'FedEx Next Day Afternoon',
	'FEDEX_NEXT_DAY_END_OF_DAY'          => 'FedEx Next Day End of Day',
	'FEDEX_NEXT_DAY_FREIGHT'             => 'FedEx Next Day Freight',

	//international
	'INTERNATIONAL_ECONOMY'              => 'International Economy',
	'INTERNATIONAL_ECONOMY_DISTRIBUTION' => 'International Economy Distribution',
	'INTERNATIONAL_FIRST'                => 'International First',
	'INTERNATIONAL_GROUND'               => 'International Ground',
	'INTERNATIONAL_PRIORITY'             => 'International Priority',
	'INTERNATIONAL_PRIORITY_DISTRIBUTION' => 'International Priority Distribution',
	'EUROPE_FIRST_INTERNATIONAL_PRIORITY' => 'Europe First International Priority',
	'INTERNATIONAL_PRIORITY_EXPRESS' 	 => 'FedEx International Priority Express',
	'FEDEX_INTERNATIONAL_PRIORITY_PLUS'  => 'FedEx First International Priority Plus',
	'FEDEX_INTERNATIONAL_PRIORITY_EXPRESS'  => 'Fedex international priority express',
	'FEDEX_INTERNATIONAL_PRIORITY'          => 'Fedex international priority',
	'FEDEX_INTERNATIONAL_CONNECT_PLUS'      => 'Fedex international connect plus',
	'INTERNATIONAL_DISTRIBUTION_FREIGHT' => 'FedEx International Distribution Fright',
	'FEDEX_CARGO_INTERNATIONAL_EXPRESS_FREIGHT' => 'FedEx CARGO International Express Fright',
	'FEDEX_CARGO_INTERNATIONAL_PREMIUM'  => 'FedEx CARGO International Premium',
	'INTERNATIONAL_ECONOMY_FREIGHT'      => 'FedEx Economy Freight',
	'INTERNATIONAL_PRIORITY_FREIGHT'     => 'FedEx Priority Freight',

	//sepacial carriers
	'FEDEX_CARGO_AIRPORT_TO_AIRPORT'             => 'FedEx CARGO Airport to Airport',
	'FEDEX_CARGO_FREIGHT_FORWARDING'             => 'FedEx CARGO Freight Forwarding',
	'FEDEX_CARGO_MAIL'             => 'FedEx CARGO Mail',
	'FEDEX_CARGO_REGISTERED_MAIL'             => 'FedEx CARGO Registered Mail',
	'FEDEX_CARGO_SURFACE_MAIL'             => 'FedEx CARGO Surface Mail',
	'FEDEX_CUSTOM_CRITICAL_AIR_EXPEDITE_EXCLUSIVE_USE'             => 'FedEx Custom Critical Air Expedite Exclusive Use',
	'FEDEX_CUSTOM_CRITICAL_AIR_EXPEDITE_NETWORK'             => 'FedEx Custom Critical Air Expedite Network',
	'FEDEX_CUSTOM_CRITICAL_CHARTER_AIR'             => 'FedEx Custom Critical Charter Air',
	'FEDEX_CUSTOM_CRITICAL_POINT_TO_POINT'             => 'FedEx Custom Critical Point to Point',
	'FEDEX_CUSTOM_CRITICAL_SURFACE_EXPEDITE'             => 'FedEx Custom Critical Surface Expedite',
	'FEDEX_CUSTOM_CRITICAL_SURFACE_EXPEDITE_EXCLUSIVE_USE'             => 'FedEx Custom Critical Surface Expedite Exclusive Use',
	'FEDEX_CUSTOM_CRITICAL_TEMP_ASSURE_AIR'             => 'FedEx Custom Critical Temp Assure Air',
	'FEDEX_CUSTOM_CRITICAL_TEMP_ASSURE_VALIDATED_AIR'             => 'FedEx Custom Critical Temp Assure Validated Air',
	'FEDEX_CUSTOM_CRITICAL_WHITE_GLOVE_SERVICES'             => 'FedEx Custom Critical White Glove Services',
	'TRANSBORDER_DISTRIBUTION_CONSOLIDATION'             => 'Fedex Transborder Distribution Consolidation',
);	
$Domestic_service = array(
	//domestic
	'FIRST_OVERNIGHT'                    => 'FedEx First Overnight',
	'PRIORITY_OVERNIGHT'                 => 'FedEx Priority Overnight',
	'STANDARD_OVERNIGHT'                 => 'FedEx Standard Overnight',
	'FEDEX_2_DAY_AM'                     => 'FedEx 2Day A.M',
	'FEDEX_2_DAY'                        => 'FedEx 2Day',
	'SAME_DAY'                        	 => 'FedEx Same Day',
	'SAME_DAY_CITY'                      => 'FedEx Same Day City',
	'SAME_DAY_METRO_AFTERNOON'           => 'FedEx Same Day Metro Afternoon',
	'SAME_DAY_METRO_MORNING'             => 'FedEx Same Day Metro Morning',
	'SAME_DAY_METRO_RUSH'                => 'FedEx Same Day Metro Rush',
	'FEDEX_EXPRESS_SAVER'                => 'FedEx Express Saver',
	'GROUND_HOME_DELIVERY'               => 'FedEx Ground Home Delivery',
	'FEDEX_GROUND'                       => 'FedEx Ground',
	'FEDEX_1_DAY_FREIGHT'                => 'FedEx 1 Day Freight',
	'FEDEX_2_DAY_FREIGHT'                => 'FedEx 2 Day Freight',
	'FEDEX_3_DAY_FREIGHT'                => 'FedEx 3 Day Freight',
	'SMART_POST'                         => 'FedEx Smart Post',
	'FEDEX_FIRST_FREIGHT'                => 'FedEx First Freight',
	'FEDEX_FREIGHT_ECONOMY'              => 'FedEx Freight Economy',
	'FEDEX_FREIGHT_PRIORITY'             => 'FedEx Freight Priority',
	'FEDEX_DISTANCE_DEFERRED'            => 'FedEx Distance Deferred',
	'FEDEX_NEXT_DAY_EARLY_MORNING'       => 'FedEx Next Day Early Morning',
	'FEDEX_NEXT_DAY_MID_MORNING'         => 'FedEx Next Day Mid Morning',
	'FEDEX_NEXT_DAY_AFTERNOON'           => 'FedEx Next Day Afternoon',
	'FEDEX_NEXT_DAY_END_OF_DAY'          => 'FedEx Next Day End of Day',
	'FEDEX_NEXT_DAY_FREIGHT'             => 'FedEx Next Day Freight',
);
$international_service = array(

	//international
	'INTERNATIONAL_ECONOMY'              => 'International Economy',
	'INTERNATIONAL_ECONOMY_DISTRIBUTION' => 'International Economy Distribution',
	'INTERNATIONAL_FIRST'                => 'International First',
	'INTERNATIONAL_GROUND'               => 'International Ground',
	'INTERNATIONAL_PRIORITY'             => 'International Priority',
	'INTERNATIONAL_PRIORITY_DISTRIBUTION' => 'International Priority Distribution',
	'EUROPE_FIRST_INTERNATIONAL_PRIORITY' => 'Europe First International Priority',
	'INTERNATIONAL_PRIORITY_EXPRESS' 	 => 'FedEx International Priority Express',
	'FEDEX_INTERNATIONAL_PRIORITY_PLUS'  => 'FedEx First International Priority Plus',
	'FEDEX_INTERNATIONAL_PRIORITY_EXPRESS'  => 'Fedex international priority express',
	'FEDEX_INTERNATIONAL_PRIORITY'          => 'Fedex international priority',
	'FEDEX_INTERNATIONAL_CONNECT_PLUS'      => 'Fedex international connect plus',
	'INTERNATIONAL_DISTRIBUTION_FREIGHT' => 'FedEx International Distribution Fright',
	'FEDEX_CARGO_INTERNATIONAL_EXPRESS_FREIGHT' => 'FedEx CARGO International Express Fright',
	'FEDEX_CARGO_INTERNATIONAL_PREMIUM'  => 'FedEx CARGO International Premium',
	'INTERNATIONAL_ECONOMY_FREIGHT'      => 'FedEx Economy Freight',
	'INTERNATIONAL_PRIORITY_FREIGHT'     => 'FedEx Priority Freight',

	//sepacial carriers
	'FEDEX_CARGO_AIRPORT_TO_AIRPORT'             => 'FedEx CARGO Airport to Airport',
	'FEDEX_CARGO_FREIGHT_FORWARDING'             => 'FedEx CARGO Freight Forwarding',
	'FEDEX_CARGO_MAIL'             => 'FedEx CARGO Mail',
	'FEDEX_CARGO_REGISTERED_MAIL'             => 'FedEx CARGO Registered Mail',
	'FEDEX_CARGO_SURFACE_MAIL'             => 'FedEx CARGO Surface Mail',
	'FEDEX_CUSTOM_CRITICAL_AIR_EXPEDITE_EXCLUSIVE_USE'             => 'FedEx Custom Critical Air Expedite Exclusive Use',
	'FEDEX_CUSTOM_CRITICAL_AIR_EXPEDITE_NETWORK'             => 'FedEx Custom Critical Air Expedite Network',
	'FEDEX_CUSTOM_CRITICAL_CHARTER_AIR'             => 'FedEx Custom Critical Charter Air',
	'FEDEX_CUSTOM_CRITICAL_POINT_TO_POINT'             => 'FedEx Custom Critical Point to Point',
	'FEDEX_CUSTOM_CRITICAL_SURFACE_EXPEDITE'             => 'FedEx Custom Critical Surface Expedite',
	'FEDEX_CUSTOM_CRITICAL_SURFACE_EXPEDITE_EXCLUSIVE_USE'             => 'FedEx Custom Critical Surface Expedite Exclusive Use',
	'FEDEX_CUSTOM_CRITICAL_TEMP_ASSURE_AIR'             => 'FedEx Custom Critical Temp Assure Air',
	'FEDEX_CUSTOM_CRITICAL_TEMP_ASSURE_VALIDATED_AIR'             => 'FedEx Custom Critical Temp Assure Validated Air',
	'FEDEX_CUSTOM_CRITICAL_WHITE_GLOVE_SERVICES'             => 'FedEx Custom Critical White Glove Services',
	'TRANSBORDER_DISTRIBUTION_CONSOLIDATION'             => 'Fedex Transborder Distribution Consolidation',
);

$print_format = array(
	'PDF' => 'PDF',
	'DOC' => 'DOC',
	'EPL2' => 'EPL2',
	'ZPLII' => 'ZPLII',
	'PNG' => 'PNG',
	'RTF' => 'RTF',
	'TEXT' => 'TEXT'
);

$printer_doc_size = array(
	'PAPER_7X4.75' => 'PAPER_7X4.75',
	'PAPER_4X6' => 'PAPER_4X6',
	'PAPER_4X8' => 'PAPER_4X8',
	'PAPER_4X9' => 'PAPER_4X9',
	'PAPER_8.5X11_BOTTOM_HALF_LABEL' => 'PAPER_8.5X11_BOTTOM_HALF_LABEL',
	'PAPER_8.5X11_TOP_HALF_LABEL' => 'PAPER_8.5X11_TOP_HALF_LABEL',
	'PAPER_LETTER' => 'PAPER_LETTER',
	'STOCK_4X6' => 'STOCK_4X6',
	'STOCK_4X6.75_LEADING_DOC_TAB' => 'STOCK_4X6.75_LEADING_DOC_TAB',
	'STOCK_4X6.75_TRAILING_DOC_TAB' => 'STOCK_4X6.75_TRAILING_DOC_TAB',
	'STOCK_4X8' => 'STOCK_4X8',
	'STOCK_4X9_LEADING_DOC_TAB' => 'STOCK_4X9_LEADING_DOC_TAB',
	'STOCK_4X9_TRAILING_DOC_TAB' => 'STOCK_4X9_TRAILING_DOC_TAB'
);

$printer_doc_type = array(
	'COMMON2D' => 'COMMON2D'
);

$shipment_packing_type = array(
	'YOUR_PACKAGING' => 'YOUR PACKAGING',
	'FEDEX_BOX' => 'FEDEX BOX',
	'FEDEX_PAK' => 'FEDEX PAK',
	'FEDEX_TUBE' => 'FEDEX TUBE',
	'FEDEX_10KG_BOX' => 'FEDEX 10KG BOX',
	'FEDEX_25KG_BOX' => 'FEDEX 25KG  BOX',
	'FEDEX_ENVELOPE' => 'FEDEX ENVELOPE',
	'FEDEX_EXTRA_LARGE_BOX' => 'FEDEX EXTRA LARGE BOX',
	'FEDEX_LARGE_BOX' => 'FEDEX LARGE BOX',
	'FEDEX_MEDIUM_BOX' => 'FEDEX MEDIUM BOX',
	'FEDEX_SMALL_BOX' => 'FEDEX SMALL BOX'
);

$shipment_drop_off_type = array(
	'REGULAR_PICKUP' => 'REGULAR PICKUP',
	'REQUEST_COURIER' => 'REQUEST COURIER',
	'DROP_BOX' => 'DROP BOX',
	'BUSINESS_SERVICE_CENTER' => 'BUSINESS SERVICE CENTER',
	'STATION' => 'STATION'
);

$shipment_signature_codes = array(
	'none' => 'None',
	'NO_SIGNATURE_REQUIRED_SIGNATURE_OPTION' => '(NSR) No Signature Required Signature Option',
	'SIGNATURE_OPTION' => 'Signature Required'
);

$reason_for_export = array(
	'SOLD' => 'Sold',
	'GIFT' => 'Gift',
	'NOT_SOLD' => 'Donations',
	'PERSONAL_EFFECTS' => 'Personal belongings',
	'REPAIR_AND_RETURN' => 'Repair and Resturn to Sender',
	'SAMPLE' => 'Samples',
);

$packing_type = array("per_item" => "Pack Items Individually", "weight_based" => "Weight Based Packing", "box" => "Box Based Packing");
$collection_type = array("ANY" => "Any", "CASH" => "Cash", "COMPANY_CHECK" => "Company Check", "GUARANTEED_FUNDS" => "Guaranteed_Funds", "PERSONAL_CHECK" => "Personal_Check");
$duty_type = array("S" => "Sender", "R" => "Recipient");
$return_type = array("REJECTED" => "Rejected", "REPLACEMENT" => "Replacement", "TRIAL" => "Trial", "ITEM_FOR_LOAN" => "Item for loan", "FOR_REPAIR" => "For repair", "FOLLOWING_REPAIR" => "Following repair", "FAULTY_ITEM" => "Faulty item", "EXHIBITION_TRADE_SHOW" => "Exhibition trade show", "COURTESY_RETURN_LABEL" => "Courtesy return label", "OTHER" => "Other");
$pickup_type = array("CONTACT_FEDEX_TO_SCHEDULE" => "Contact fedex to schedule", "DROPOFF_AT_FEDEX_LOCATION" => "Dropoff at fedex location", "USE_SCHEDULED_PICKUP" => "Use scheduled pickup", "ON_CALL" => "On call", "PACKAGE_RETURN_PROGRAM" => "Package return program", "REGULAR_STOP" => "Regular stop", "TAG" => "Tag");



$currencys = array (
	'ALL' => 'Albania Lek',
	'AFN' => 'Afghanistan Afghani',
	'ARN' => 'Argentina Peso',
	'ARS' => 'Argentina Peso',
	'AWG' => 'Aruba Guilder',
	'AUD' => 'Australia Dollar',
	'AZN' => 'Azerbaijan New Manat',
	'BSD' => 'Bahamas Dollar',
	'BBD' => 'Barbados Dollar',
	'BDT' => 'Bangladeshi taka',
	'BYR' => 'Belarus Ruble',
	'BZD' => 'Belize Dollar',
	'BMD' => 'Bermuda Dollar',
	'BOB' => 'Bolivia Boliviano',
	'BAM' => 'Bosnia and Herzegovina Convertible Marka',
	'BWP' => 'Botswana Pula',
	'BGN' => 'Bulgaria Lev',
	'BRL' => 'Brazil Real',
	'BND' => 'Brunei Darussalam Dollar',
	'KHR' => 'Cambodia Riel',
	'CAD' => 'Canada Dollar',
	'CID' => 'Cayman Islands Dollar',
	'KYD' => 'Cayman Islands Dollar',
	'CHP' => 'Chile Peso',
	'CLP' => 'Chile Peso',
	'CNY' => 'China Yuan Renminbi',
	'COP' => 'Colombia Peso',
	'CRC' => 'Costa Rica Colon',
	'HRK' => 'Croatia Kuna',
	'CUP' => 'Cuba Peso',
	'CZK' => 'Czech Republic Koruna',
	'DKK' => 'Denmark Krone',
	'RDD' => 'Dominican Peso',
	'DOP' => 'Dominican Republic Peso',
	'ECD' => 'E. Caribbean Dollar',
	'XCD' => 'East Caribbean Dollar',
	'EGP' => 'Egypt Pound',
	'SVC' => 'El Salvador Colon',
	'EEK' => 'Estonia Kroon',
	'EUR' => 'Euro Member Countries',
	'FKP' => 'Falkland Islands (Malvinas) Pound',
	'FJD' => 'Fiji Dollar',
	'GHC' => 'Ghana Cedis',
	'GIP' => 'Gibraltar Pound',
	'GTQ' => 'Guatemala Quetzal',
	'GGP' => 'Guernsey Pound',
	'GYD' => 'Guyana Dollar',
	'HNL' => 'Honduras Lempira',
	'HKD' => 'Hong Kong Dollar',
	'HUF' => 'Hungary Forint',
	'ISK' => 'Iceland Krona',
	'INR' => 'India Rupee',
	'IDR' => 'Indonesia Rupiah',
	'IRR' => 'Iran Rial',
	'IMP' => 'Isle of Man Pound',
	'ILS' => 'Israel Shekel',
	'JAD' => 'Jamaica Dollar',
	'JMD' => 'Jamaica Dollar',
	'JYE' => 'Japan Yen',
	'JPY' => 'Japan Yen',
	'JEP' => 'Jersey Pound',
	'KZT' => 'Kazakhstan Tenge',
	'KPW' => 'Korea (North) Won',
	'WON' => 'Korea (South) Won',
	'KRW' => 'Korea (South) Won',
	'KGS' => 'Kyrgyzstan Som',
	'LAK' => 'Laos Kip',
	'LVL' => 'Latvia Lat',
	'LBP' => 'Lebanon Pound',
	'LRD' => 'Liberia Dollar',
	'LTL' => 'Lithuania Litas',
	'MKD' => 'Macedonia Denar',
	'MYR' => 'Malaysia Ringgit',
	'MUR' => 'Mauritius Rupee',
	'NMP' => 'Mexico Peso',
	'MXN' => 'Mexico Peso',
	'MNT' => 'Mongolia Tughrik',
	'MZN' => 'Mozambique Metical',
	'NAD' => 'Namibia Dollar',
	'NPR' => 'Nepal Rupee',
	'ANG' => 'Netherlands Antilles Guilder',
	'NZD' => 'New Zealand Dollar',
	'NIO' => 'Nicaragua Cordoba',
	'NGN' => 'Nigeria Naira',
	'NOK' => 'Norway Krone',
	'OMR' => 'Oman Rial',
	'PKR' => 'Pakistan Rupee',
	'PAB' => 'Panama Balboa',
	'PYG' => 'Paraguay Guarani',
	'PEN' => 'Peru Nuevo Sol',
	'PHP' => 'Philippines Peso',
	'PLN' => 'Poland Zloty',
	'QAR' => 'Qatar Riyal',
	'RON' => 'Romania New Leu',
	'RUB' => 'Russia Ruble',
	'SHP' => 'Saint Helena Pound',
	'SAR' => 'Saudi Arabia Riyal',
	'RSD' => 'Serbia Dinar',
	'SCR' => 'Seychelles Rupee',
	'SID' => 'Singapore Dollar',
	'SGD' => 'Singapore Dollar',
	'SBD' => 'Solomon Islands Dollar',
	'SOS' => 'Somalia Shilling',
	'ZAR' => 'South Africa Rand',
	'LKR' => 'Sri Lanka Rupee',
	'SEK' => 'Sweden Krona',
	'SFR' => 'Switzerland Franc',
	'CHF' => 'Switzerland Franc',
	'SRD' => 'Suriname Dollar',
	'SYP' => 'Syria Pound',
	'NTD' => 'New Taiwan Dollar',
	'TWD' => 'Taiwan New Dollar',
	'THB' => 'Thailand Baht',
	'TTD' => 'Trinidad and Tobago Dollar',
	'TRY' => 'Turkey Lira',
	'TRL' => 'Turkey Lira',
	'TVD' => 'Tuvalu Dollar',
	'UAH' => 'Ukraine Hryvna',
	'UKL' => 'Great Britain Pound',
	'GBP' => 'United Kingdom Pound',
	'USD' => 'United States Dollar',
	'UYU' => 'Uruguay Peso',
	'UZS' => 'Uzbekistan Som',
	'VEF' => 'Venezuela Bolivar',
	'VND' => 'Viet Nam Dong',
	'YER' => 'Yemen Rial',
	'ZWD' => 'Zimbabwe Dollar',
	'DHS' => 'United Arab Emirates Dirham',
	'AED' => 'United Arab Emirates Dirham'
);
$general_settings = get_option('hitshippo_fedex_main_settings');
$general_settings = empty($general_settings) ? array() : $general_settings;
$boxes = array(array(
	'name'       => 'Sample BOX',
	'id'         => 'HITS_FEDEX_SAMPLE_BOX',
	'max_weight' => 10,
	'box_weight' => 0,
	'length'     => 10,
	'width'      => 10,
	'height'     => 10,
	'enabled'    => true,
	'pack_type' => 'BOX'
));
$package_type = array('BOX' => 'Box Pack', 'YP' => 'Your Pack');

if (isset($_POST['save'])) {
	$hitshippo_fedex_shipo_password = '';
	if (isset($_POST['hitshippo_fedex_site_id'])) {

		$general_settings['hitshippo_fedex_shippo_int_key'] = sanitize_text_field(isset($_POST['hitshippo_fedex_shippo_int_key']) ? $_POST['hitshippo_fedex_shippo_int_key'] : '');
		$general_settings['hitshippo_fedex_site_id'] = sanitize_text_field(isset($_POST['hitshippo_fedex_site_id']) ? $_POST['hitshippo_fedex_site_id'] : '');
		$general_settings['hitshippo_fedex_site_pwd'] = sanitize_text_field(isset($_POST['hitshippo_fedex_site_pwd']) ? $_POST['hitshippo_fedex_site_pwd'] : '');
		$general_settings['hitshippo_fedex_acc_no'] = sanitize_text_field(isset($_POST['hitshippo_fedex_acc_no']) ? $_POST['hitshippo_fedex_acc_no'] : '');
		$general_settings['hitshippo_fedex_access_key'] = sanitize_text_field(isset($_POST['hitshippo_fedex_access_key']) ? $_POST['hitshippo_fedex_access_key'] : '');
		$general_settings['hitshippo_fedex_api_type'] = sanitize_text_field(isset($_POST['hitshippo_fedex_api_type']) ? $_POST['hitshippo_fedex_api_type'] : '');
		$general_settings['hitshippo_fedex_rest_grant_type'] = 'client_credentials';
		$general_settings['hitshippo_fedex_rest_acc_no'] = sanitize_text_field(isset($_POST['hitshippo_fedex_rest_acc_no']) ? $_POST['hitshippo_fedex_rest_acc_no'] : '');
		$general_settings['hitshippo_fedex_rest_api_key'] = sanitize_text_field(isset($_POST['hitshippo_fedex_rest_api_key']) ? $_POST['hitshippo_fedex_rest_api_key'] : '');
		$general_settings['hitshippo_fedex_rest_secret_key'] = sanitize_text_field(isset($_POST['hitshippo_fedex_rest_secret_key']) ? $_POST['hitshippo_fedex_rest_secret_key'] : '');
		$general_settings['hitshippo_fedex_rest_tracking_api_key'] = sanitize_text_field(isset($_POST['hitshippo_fedex_rest_tracking_api_key']) ? $_POST['hitshippo_fedex_rest_tracking_api_key'] : '');
		$general_settings['hitshippo_fedex_rest_tracking_secret_key'] = sanitize_text_field(isset($_POST['hitshippo_fedex_rest_tracking_secret_key']) ? $_POST['hitshippo_fedex_rest_tracking_secret_key'] : '');
		$general_settings['hitshippo_fedex_weight_unit'] = sanitize_text_field(isset($_POST['hitshippo_fedex_weight_unit']) ? $_POST['hitshippo_fedex_weight_unit'] : '');
		$general_settings['hitshippo_fedex_test'] = sanitize_text_field(isset($_POST['hitshippo_fedex_test']) ? 'yes' : 'no');
		$general_settings['hitshippo_fedex_rates'] = sanitize_text_field(isset($_POST['hitshippo_fedex_rates']) ? 'yes' : 'no');
		$general_settings['hitshippo_fedex_res_f'] = sanitize_text_field(isset($_POST['hitshippo_fedex_res_f']) ? 'yes' : 'no');
		$general_settings['hitshippo_fedex_send_pack_as_ship'] = sanitize_text_field(isset($_POST['hitshippo_fedex_send_pack_as_ship']) ? 'yes' : 'no');
		$general_settings['hitshippo_fedex_include_tax'] = sanitize_text_field(isset($_POST['hitshippo_fedex_include_tax']) ? 'yes' : 'no');
		$general_settings['hitshippo_fedex_sat_del'] = sanitize_text_field(isset($_POST['hitshippo_fedex_sat_del']) ? 'yes' : 'no');
		$general_settings['hitshippo_fedex_del_date'] = sanitize_text_field(isset($_POST['hitshippo_fedex_del_date']) ? 'yes' : 'no');
		$general_settings['hitshippo_fedex_insurance'] = sanitize_text_field(isset($_POST['hitshippo_fedex_insurance']) ? 'yes' : 'no');
		$general_settings['hitshippo_fedex_shipper_name'] = sanitize_text_field(isset($_POST['hitshippo_fedex_shipper_name']) ? $_POST['hitshippo_fedex_shipper_name'] : '');
		$general_settings['hitshippo_fedex_company'] = sanitize_text_field(isset($_POST['hitshippo_fedex_company']) ? $_POST['hitshippo_fedex_company'] : '');
		$general_settings['hitshippo_fedex_mob_num'] = sanitize_text_field(isset($_POST['hitshippo_fedex_mob_num']) ? $_POST['hitshippo_fedex_mob_num'] : '');
		$general_settings['hitshippo_fedex_email'] = sanitize_text_field(isset($_POST['hitshippo_fedex_email']) ? $_POST['hitshippo_fedex_email'] : '');
		$general_settings['hitshippo_fedex_address1'] = sanitize_text_field(isset($_POST['hitshippo_fedex_address1']) ? $_POST['hitshippo_fedex_address1'] : '');
		$general_settings['hitshippo_fedex_address2'] = sanitize_text_field(isset($_POST['hitshippo_fedex_address2']) ? $_POST['hitshippo_fedex_address2'] : '');
		$general_settings['hitshippo_fedex_city'] = sanitize_text_field(isset($_POST['hitshippo_fedex_city']) ? $_POST['hitshippo_fedex_city'] : '');
		$general_settings['hitshippo_fedex_state'] = sanitize_text_field(isset($_POST['hitshippo_fedex_state']) ? $_POST['hitshippo_fedex_state'] : '');
		$general_settings['hitshippo_fedex_zip'] = sanitize_text_field(isset($_POST['hitshippo_fedex_zip']) ? $_POST['hitshippo_fedex_zip'] : '');
		$general_settings['hitshippo_fedex_country'] = sanitize_text_field(isset($_POST['hitshippo_fedex_country']) ? $_POST['hitshippo_fedex_country'] : '');
		$general_settings['hitshippo_fedex_carrier'] = !empty($_POST['hitshippo_fedex_carrier']) ? $_POST['hitshippo_fedex_carrier'] : array();
		$general_settings['hitshippo_fedex_Domestic_service'] = !empty($_POST['hitshippo_fedex_Domestic_service']) ? $_POST['hitshippo_fedex_Domestic_service'] : array();
		$general_settings['hitshippo_fedex_international_service'] = !empty($_POST['hitshippo_fedex_international_service']) ? $_POST['hitshippo_fedex_international_service'] : array();
		$general_settings['hitshippo_fedex_carrier_name'] = !empty($_POST['hitshippo_fedex_carrier_name']) ? $_POST['hitshippo_fedex_carrier_name'] : array();
		$general_settings['hitshippo_fedex_account_rates'] = sanitize_text_field(isset($_POST['hitshippo_fedex_account_rates']) ? 'yes' : 'no');
		$general_settings['hitshippo_fedex_one_rates'] = sanitize_text_field(isset($_POST['hitshippo_fedex_one_rates']) ? 'yes' : 'no');
		$general_settings['hitshippo_fedex_developer_rate'] = sanitize_text_field(isset($_POST['hitshippo_fedex_developer_rate']) ? 'yes' : 'no');
		// $general_settings['hitshippo_fedex_developer_shipment'] = sanitize_text_field(isset($_POST['hitshippo_fedex_developer_shipment']) ? 'yes' :'no');
		// $general_settings['hitshippo_fedex_insure'] = sanitize_text_field(isset($_POST['hitshippo_fedex_insure']) ? 'yes' :'no');
		// $general_settings['hitshippo_fedex_sd'] = sanitize_text_field(isset($_POST['hitshippo_fedex_sd']) ? 'yes' :'no');
		$general_settings['hitshippo_fedex_shippo_label_gen'] = sanitize_text_field(isset($_POST['hitshippo_fedex_shippo_label_gen']) ? 'yes' : 'no');
		$general_settings['hitshippo_fedex_cod'] = sanitize_text_field(isset($_POST['hitshippo_fedex_cod']) ? 'yes' : 'no');
		$general_settings['hitshippo_fedex_etd'] = sanitize_text_field(isset($_POST['hitshippo_fedex_etd']) ? 'yes' : 'no');
		
		$general_settings['hitshippo_fedex_shippo_mail'] = sanitize_text_field(isset($_POST['hitshippo_fedex_shippo_mail']) ? $_POST['hitshippo_fedex_shippo_mail'] : '');
		$general_settings['hitshippo_fedex_label_size'] = sanitize_text_field(isset($_POST['hitshippo_fedex_label_size']) ? $_POST['hitshippo_fedex_label_size'] : '');
		$general_settings['hitshippo_fedex_drop_off'] = sanitize_text_field(isset($_POST['hitshippo_fedex_drop_off']) ? $_POST['hitshippo_fedex_drop_off'] : '');
		$general_settings['hitshippo_fedex_ship_pack_type'] = sanitize_text_field(isset($_POST['hitshippo_fedex_ship_pack_type']) ? $_POST['hitshippo_fedex_ship_pack_type'] : '');
		$general_settings['hitshippo_fedex_collection_type'] = sanitize_text_field(isset($_POST['hitshippo_fedex_collection_type']) ? $_POST['hitshippo_fedex_collection_type'] : 'CASH');
		$general_settings['hitshippo_fedex_duty_type'] = sanitize_text_field(isset($_POST['hitshippo_fedex_duty_type']) ? $_POST['hitshippo_fedex_duty_type'] : 'S');
		$general_settings['hitshippo_fedex_pickup_type'] = sanitize_text_field(isset($_POST['hitshippo_fedex_pickup_type']) ? $_POST['hitshippo_fedex_pickup_type'] : 'S');
		$general_settings['hitshippo_fedex_sign'] = sanitize_text_field(isset($_POST['hitshippo_fedex_sign']) ? $_POST['hitshippo_fedex_sign'] : 'none');
		$general_settings['hitshippo_fedex_export_reason'] = sanitize_text_field(isset($_POST['hitshippo_fedex_export_reason']) ? $_POST['hitshippo_fedex_export_reason'] : 'SOLD');

		$general_settings['hitshippo_fedex_return_type'] = sanitize_text_field(isset($_POST['hitshippo_fedex_return_type']) ? $_POST['hitshippo_fedex_return_type'] : '');
		$general_settings['hitshippo_fedex_return_type_desc'] = sanitize_text_field(isset($_POST['hitshippo_fedex_return_type_desc']) ? $_POST['hitshippo_fedex_return_type_desc'] : '');
		$general_settings['hitshippo_fedex_shipment_content'] = sanitize_text_field(isset($_POST['hitshippo_fedex_shipment_content']) ? $_POST['hitshippo_fedex_shipment_content'] : '');
		$general_settings['hitshippo_fedex_packing_type'] = sanitize_text_field(isset($_POST['hitshippo_fedex_packing_type']) ? $_POST['hitshippo_fedex_packing_type'] : '');
		$general_settings['hitshippo_fedex_max_weight'] = sanitize_text_field(isset($_POST['hitshippo_fedex_max_weight']) ? $_POST['hitshippo_fedex_max_weight'] : '');
		$general_settings['hitshippo_fedex_con_rate'] = sanitize_text_field(isset($_POST['hitshippo_fedex_con_rate']) ? $_POST['hitshippo_fedex_con_rate'] : '');
		$general_settings['hitshippo_fedex_auto_con_rate'] = sanitize_text_field(isset($_POST['hitshippo_fedex_auto_con_rate']) ? 'yes' : 'no');
		$general_settings['hitshippo_fedex_currency'] = sanitize_text_field(isset($_POST['hitshippo_fedex_currency']) ? $_POST['hitshippo_fedex_currency'] : '');
		$general_settings['hitshippo_fedex_exclude_countries'] = !empty($_POST['hitshippo_fedex_exclude_countries']) ? $_POST['hitshippo_fedex_exclude_countries'] : array();
		$general_settings['hitshippo_fedex_inv_img'] = sanitize_text_field(isset($_POST['hitshippo_fedex_inv_img']) ? $_POST['hitshippo_fedex_inv_img'] : '');
		$general_settings['hitshippo_fedex_inv_letterhead'] = sanitize_text_field(isset($_POST['hitshippo_fedex_inv_letterhead']) ? $_POST['hitshippo_fedex_inv_letterhead'] : '');

		// update_option('hitshippo_fedex_main_settings', $general_settings);
		
		// Multi Vendor Settings
		$general_settings['hitshippo_fedex_v_enable'] = sanitize_text_field(isset($_POST['hitshippo_fedex_v_enable']) ? 'yes' : 'no');
		$general_settings['hitshippo_fedex_v_rates'] = sanitize_text_field(isset($_POST['hitshippo_fedex_v_rates']) ? 'yes' : 'no');
		$general_settings['hitshippo_fedex_v_labels'] = sanitize_text_field(isset($_POST['hitshippo_fedex_v_labels']) ? 'yes' : 'no');
		$general_settings['hitshippo_fedex_v_roles'] = !empty($_POST['hitshippo_fedex_v_roles']) ? $_POST['hitshippo_fedex_v_roles'] : array();
		$general_settings['hitshippo_fedex_v_email'] = sanitize_text_field(isset($_POST['hitshippo_fedex_v_email']) ? 'yes' : 'no');
		//Save boxes
		$boxes_id = isset($_POST['boxes_id']) ? sanitize_post($_POST['boxes_id']) : array();
		$boxes_name = isset($_POST['boxes_name']) ? sanitize_post($_POST['boxes_name']) : array();
		$boxes_length = isset($_POST['boxes_length']) ? sanitize_post($_POST['boxes_length']) : array();
		$boxes_width = isset($_POST['boxes_width']) ? sanitize_post($_POST['boxes_width']) : array();
		$boxes_height = isset($_POST['boxes_height']) ? sanitize_post($_POST['boxes_height']) : array();
		$boxes_box_weight = isset($_POST['boxes_box_weight']) ? sanitize_post($_POST['boxes_box_weight']) : array();
		$boxes_max_weight = isset($_POST['boxes_max_weight']) ? sanitize_post($_POST['boxes_max_weight']) : array();
		$boxes_enabled = isset($_POST['boxes_enabled']) ? sanitize_post($_POST['boxes_enabled']) : array();
		$boxes_pack_type = isset($_POST['boxes_pack_type']) ? sanitize_post($_POST['boxes_pack_type']) : array();

		$all_boxes = array();
		if (!empty($boxes_name)) {
			if (isset($boxes_name['filter'])) { //Using sanatize_post() it's adding filter type. Have to unset otherwise it will display as box
				unset($boxes_name['filter']);
			}
			if (isset($boxes_name['ID'])) {
				unset($boxes_name['ID']);
			}
			foreach ($boxes_name as $key => $value) {
				if (empty($value)) {
					continue;
				}
				$ind_box_id = $boxes_id[$key];
				$ind_box_name = empty($boxes_name[$key]) ? "New Box" : $boxes_name[$key];
				$ind_box_length = empty($boxes_length[$key]) ? 0 : $boxes_length[$key];
				$ind_boxes_width = empty($boxes_width[$key]) ? 0 : $boxes_width[$key];
				$ind_boxes_height = empty($boxes_height[$key]) ? 0 : $boxes_height[$key];
				$ind_boxes_box_weight = empty($boxes_box_weight[$key]) ? 0 : $boxes_box_weight[$key];
				$ind_boxes_max_weight = empty($boxes_max_weight[$key]) ? 0 : $boxes_max_weight[$key];
				$ind_box_enabled = isset($boxes_enabled[$key]) ? true : false;

				$all_boxes[$key] = array(
					'id' => $ind_box_id,
					'name' => $ind_box_name,
					'length' => $ind_box_length,
					'width' => $ind_boxes_width,
					'height' => $ind_boxes_height,
					'box_weight' => $ind_boxes_box_weight,
					'max_weight' => $ind_boxes_max_weight,
					'enabled' => $ind_box_enabled,
					'pack_type' => $boxes_pack_type[$key]
				);
			}
		}
		$general_settings['hitshippo_fedex_boxes'] = !empty($all_boxes) ? $all_boxes : array();
		update_option('hitshippo_fedex_main_settings', $general_settings);
		$success = 'Settings Saved Successfully.';
		// reset all auth tokens if operating mode changes
		if (isset($general_settings['hitshippo_fedex_test']) && !empty($general_settings['hitshippo_fedex_test']) && isset($general_settings['hitshippo_fedex_api_type']) && ($general_settings['hitshippo_fedex_api_type'] == "REST")) {
			if (isset($_POST['hitshippo_fedex_last_mode']) && !empty($_POST['hitshippo_fedex_last_mode'])) {
				if ($_POST['hitshippo_fedex_last_mode'] != $general_settings['hitshippo_fedex_test']) {
					try {
						$wpdb->query("DELETE FROM `".$wpdb->prefix."options` WHERE `option_name` LIKE '_transient_hitshipo_fedex_rest_auth_token_%'");
					} catch (Exception $e) {
						
					}
				}
			}
		}
	}
	if ((!isset($general_settings['hitshippo_fedex_shippo_int_key']) || empty($general_settings['hitshippo_fedex_shippo_int_key'])) && isset($_POST['shipo_link_type']) && $_POST['shipo_link_type'] == "WITH") {
		$general_settings['hitshippo_fedex_shippo_int_key'] = sanitize_text_field(isset($_POST['hitshippo_fedex_shippo_int_key']) ? $_POST['hitshippo_fedex_shippo_int_key'] : '');
		update_option('hitshippo_fedex_main_settings', $general_settings);
		update_option('hitshipo_fedex_working_status', 'start_working');
		$success = 'Site Linked Successfully.<br><br> It\'s great to have you here.';
	}

	if (!isset($general_settings['hitshippo_fedex_shippo_int_key']) || empty($general_settings['hitshippo_fedex_shippo_int_key'])) {
		$random_nonce = wp_generate_password(16, false);
		set_transient('hitshipo_fedex_express_nonce_temp', $random_nonce, HOUR_IN_SECONDS);

		$general_settings['hitshippo_fedex_track_audit'] = sanitize_text_field(isset($_POST['hitshippo_fedex_track_audit']) ? 'yes' : 'no');
		$general_settings['hitshippo_fedex_daily_report'] = sanitize_text_field(isset($_POST['hitshippo_fedex_daily_report']) ? 'yes' : 'no');
		$general_settings['hitshippo_fedex_monthly_report'] = sanitize_text_field(isset($_POST['hitshippo_fedex_monthly_report']) ? 'yes' : 'no');
		$general_settings['hitshippo_fedex_shipo_signup'] = sanitize_text_field(isset($_POST['hitshippo_fedex_shipo_signup']) ? $_POST['hitshippo_fedex_shipo_signup'] : '');
		$hitshippo_fedex_shipo_password = sanitize_text_field(isset($_POST['hitshippo_fedex_shipo_password']) ? $_POST['hitshippo_fedex_shipo_password'] : '');
		update_option('hitshippo_fedex_main_settings', $general_settings);
		$hitshippo_fedex_shipo_password = base64_encode($hitshippo_fedex_shipo_password);

		$link_hitshipo_request = json_encode(array(
			'site_url' => site_url() . "/wp-json/shipi/connect/fedex",
			'site_name' => get_bloginfo('name'),
			'email_address' => $general_settings['hitshippo_fedex_shipo_signup'],
			'password' => $hitshippo_fedex_shipo_password,
			'nonce' => $random_nonce,
			'audit' => $general_settings['hitshippo_fedex_track_audit'],
			'd_report' => $general_settings['hitshippo_fedex_daily_report'],
			'm_report' => $general_settings['hitshippo_fedex_monthly_report'],
			'pulgin' => 'FedEx',
			'platfrom' => 'Woocommerce',
		));

		$link_site_url = "https://app.myshipi.com/api/link-site.php";
		$link_site_response = wp_remote_post(
			$link_site_url,
			array(
				'method'      => 'POST',
				'timeout'     => 45,
				'redirection' => 5,
				'httpversion' => '1.0',
				'blocking'    => true,
				'headers'     => array('Content-Type' => 'application/json; charset=utf-8'),
				'body'        => $link_hitshipo_request,
				'sslverify' => 0
			)
		);

		$link_site_response = (is_array($link_site_response) && isset($link_site_response['body'])) ? json_decode($link_site_response['body'], true) : array();
		if ($link_site_response) {
			if ($link_site_response['status'] != 'error') {
				$general_settings['hitshippo_fedex_shippo_int_key'] = sanitize_text_field($link_site_response['integration_key']);
				update_option('hitshippo_fedex_main_settings', $general_settings);
				update_option('hitshipo_fedex_working_status', 'start_working');
				$success = 'Site Linked Successfully.<br><br> It\'s great to have you here. ' . (isset($link_site_response['trail']) ? 'Your 60days Trail period is started. To know about this more, please check your inbox.' : '') . '<br><br><button class="button" type="submit">Back to Settings</button>';
			} else {
				$error = '<p style="color:red;">' . $link_site_response['message'] . '</p>';
				$success = '';
			}
		} else {
			$error = '<p style="color:red;">Failed to connect with Shipi</p>';
			$success = '';
		}
	}
}
$initial_setup = false;
$countries_obj   = new WC_Countries();
$default_country = $countries_obj->get_base_country();
$general_settings['hitshippo_fedex_currency'] = isset($general_settings['hitshippo_fedex_currency']) ? $general_settings['hitshippo_fedex_currency'] : (isset($value[$default_country]) ? $value[$default_country]['currency'] : "");
$general_settings['hitshippo_fedex_woo_currency'] = get_option('woocommerce_currency');
$general_settings['hitshippo_fedex_cod'] = isset($general_settings['hitshippo_fedex_cod']) ? $general_settings['hitshippo_fedex_cod'] : 'no';
$general_settings['hitshippo_fedex_etd'] = isset($general_settings['hitshippo_fedex_etd']) ? $general_settings['hitshippo_fedex_etd'] : 'no';

?>

<style>
	.notice {
		display: none;
	}

	#multistepsform {
		width: 80%;
		margin: 50px auto;
		text-align: center;
		position: relative;
	}

	#multistepsform fieldset {
		background: white;
		text-align: left;
		border: 0 none;
		border-radius: 5px;
		<?php if (!$initial_setup) { ?>
		box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
		<?php } ?>
		padding: 20px 30px;
		box-sizing: border-box;
		position: relative;
	}

	<?php if (!$initial_setup) { ?>
	#multistepsform fieldset:not(:first-of-type) {
		display: none;
	}
	<?php } ?>

	#multistepsform input[type=text],
	#multistepsform input[type=password],
	#multistepsform input[type=number],
	#multistepsform input[type=email],
	#multistepsform textarea {
		padding: 5px;
		width: 95%;
	}

	#multistepsform input:focus,
	#multistepsform textarea:focus {
		border-color: #679b9b;
		outline: none;
		color: #637373;
	}

	#multistepsform .action-button {
		width: 100px;
		background: #ff9a76;
		font-weight: bold;
		color: #fff;
		transition: 150ms;
		border: 0 none;
		float: right;
		border-radius: 1px;
		cursor: pointer;
		padding: 10px 5px;
		margin: 10px 5px;
	}

	#multistepsform .action-button:hover,
	#multistepsform .action-button:focus {
		box-shadow: 0 0 0 2px #f08a5d, 0 0 0 3px #ff976;
		color: #fff;
	}

	#multistepsform .fs-title {
		font-size: 15px;
		text-transform: uppercase;
		color: #2c3e50;
		margin-bottom: 10px;
	}

	#multistepsform .fs-subtitle {
		font-weight: normal;
		font-size: 13px;
		color: #666;
		margin-bottom: 20px;
	}

	#multistepsform #progressbar {
		margin-bottom: 30px;
		overflow: hidden;
		counter-reset: step;
	}

	#multistepsform #progressbar li {
		list-style-type: none;
		color: #FF6600;
		text-transform: uppercase;
		font-size: 9px;
		width: 16.5%;
		float: left;
		position: relative;
	}

	#multistepsform #progressbar li:before {
		content: counter(step);
		counter-increment: step;
		width: 20px;
		line-height: 20px;
		display: block;
		font-size: 10px;
		color: #fff;
		background: #FF6600;
		border-radius: 3px;
		margin: 0 auto 5px auto;
	}

	#multistepsform #progressbar li:after {
		content: "";
		width: 100%;
		height: 2px;
		background: #FF6600;
		position: absolute;
		left: -50%;
		top: 9px;
		z-index: -1;
	}

	#multistepsform #progressbar li:first-child:after {
		content: none;
	}

	#multistepsform #progressbar li.active {
		color: #4D148C;
	}

	#multistepsform #progressbar li.active:before,
	#multistepsform #progressbar li.active:after {
		background: #4D148C;
		color: white;
	}

	.setting {
		cursor: pointer;
		border: 0px;
		padding: 10px 5px;
		margin: 10px 5px;
		background-color: #ff9a76 !important;
		font-weight: bold;
		color: #ffffff !important;
		border-radius: 3px;
	}
</style>
<div style="text-align:center;margin-top:20px;"><img src="<?php echo plugin_dir_url(__FILE__); ?>fedex.png" style="width:150px;"></div>

<?php if($success != ''){
	echo '<fieldset>
	<center><h2 class="fs-title" style="background: #0ba156;padding: 20px;color: white;">'. $success .'</h2>
	</center>';
}?>
	<!-- multistep form -->
	<form id="multistepsform" method="post">
		<?php if (!$initial_setup) { ?>
		<!-- progressbar -->
		<ul id="progressbar">
			<li class="active">Integration</li>
			<li>Setup</li>
			<li>Packing</li>
			<li>Rates</li>
			<li>Shipping Label</li>
			<li>Shipi</li>
		</ul>
		<?php } ?>
		<?php if ($error == '') {

		?>
			<!-- fieldsets -->
			<fieldset>
				<center>
					<h2 class="fs-title">FedEx Account Information</h2>

					<table style="padding-left:10px;padding-right:10px;">
						<td><span style="float:left;padding-right:10px;"><input type="checkbox" name="hitshippo_fedex_test" <?php echo (isset($general_settings['hitshippo_fedex_test']) && $general_settings['hitshippo_fedex_test'] == 'yes') ? 'checked="true"' : ''; ?> value="yes"><small style="color:gray"> Enable Test Mode.</small></span></td>
						<td><span style="float:right;padding-right:10px;"><input type="checkbox" name="hitshippo_fedex_rates" <?php echo (isset($general_settings['hitshippo_fedex_rates']) && $general_settings['hitshippo_fedex_rates'] == 'yes') || ($initial_setup) ? 'checked="true"' : ''; ?> value="yes"><small style="color:gray"> Enable Live Shipping Rates.</small></span></td>
						<td><span style="float:right;padding-right:10px;"><input type="checkbox" name="hitshippo_fedex_shippo_label_gen" <?php echo (isset($general_settings['hitshippo_fedex_shippo_label_gen']) && $general_settings['hitshippo_fedex_shippo_label_gen'] == 'yes') || ($initial_setup) ? 'checked="true"' : ''; ?> value="yes"><small style="color:gray"> Create Label automatically.</small></span></td>
						<td><span style="float:right;padding-right:10px;"><input type="checkbox" name="hitshippo_fedex_developer_rate" <?php echo (isset($general_settings['hitshippo_fedex_developer_rate']) && $general_settings['hitshippo_fedex_developer_rate'] == 'yes') ? 'checked="true"' : ''; ?> value="yes"><small style="color:gray"> Enable Debug Mode.</small></span></td>
						<td style="display: none;"><input type="text" name="hitshippo_fedex_last_mode" value="<?php echo (isset($general_settings['hitshippo_fedex_test'])) ? $general_settings['hitshippo_fedex_test'] : ''; ?>"></td>
					</table>
				</center>
				<table style="width:100%;">
					<tr>
						<td colspan="2" style="padding:10px;">
							<hr>
						</td>
					</tr>
					<tr>
						<td colspan="2" style="padding:10px;">
							<center>
								<b><?php _e('Select API type', 'hitshippo_fedex') ?></b><br/><br/>
								<?php
								if ((!isset($general_settings['hitshippo_fedex_site_id']) && !isset($general_settings['hitshippo_fedex_api_type'])) || (isset($general_settings['hitshippo_fedex_api_type']) && $general_settings['hitshippo_fedex_api_type'] == "REST")) {
								?>
									<input type="radio" name="hitshippo_fedex_api_type" value="REST" checked> I don't have meter number (REST) &nbsp; &nbsp;
									<input type="radio" name="hitshippo_fedex_api_type" value="SOAP"> I have meter number (SOAP)
								<?php
								} else {
								?>
									<input type="radio" name="hitshippo_fedex_api_type" value="REST"> I don't have meter number (REST) &nbsp; &nbsp;
									<input type="radio" name="hitshippo_fedex_api_type" value="SOAP" checked> I have meter number (SOAP)
								<?php
								}
								?>
							</center>
						</td>
					</tr>
					<tr>
						<td colspan="2" style="padding:10px;">
							<hr>
						</td>
					</tr>
					<tr class="SOAP_auth">
						<td style=" width: 50%;padding:10px;">
							<?php _e('FedEx Web Service Key', 'hitshippo_fedex') ?><font style="color:red;">*</font>
							<input type="text" class="input-text regular-input" id="site_id" name="hitshippo_fedex_site_id" value="<?php echo (isset($general_settings['hitshippo_fedex_site_id'])) ? $general_settings['hitshippo_fedex_site_id'] : ''; ?>">
						</td>
						<td style="padding:10px;">
							<?php _e('Web Service Password', 'hitshippo_fedex') ?><font style="color:red;">*</font>
							<input type="text" name="hitshippo_fedex_site_pwd" id="fedex_site_pwd" value="<?php echo (isset($general_settings['hitshippo_fedex_site_pwd'])) ? $general_settings['hitshippo_fedex_site_pwd'] : ''; ?>">
						</td>
					</tr>
					<tr class="SOAP_auth">
						<td style=" width: 50%;padding:10px;">
							<?php _e('FedEx Account number', 'hitshippo_fedex') ?><font style="color:red;">*</font>
							<input type="text" class="input-text regular-input" id="fedex_acc_no" name="hitshippo_fedex_acc_no" value="<?php echo (isset($general_settings['hitshippo_fedex_acc_no'])) ? $general_settings['hitshippo_fedex_acc_no'] : ''; ?>">
						</td>
						<td style="padding:10px;">
							<?php _e('Meter Number', 'hitshippo_fedex') ?><font style="color:red;">*</font>
							<input type="text" name="hitshippo_fedex_access_key" id="fedex_access_key" value="<?php echo (isset($general_settings['hitshippo_fedex_access_key'])) ? $general_settings['hitshippo_fedex_access_key'] : ''; ?>">
						</td>
					</tr>
					<tr class="REST_auth">
						<td style="padding:10px;">
							<?php _e('Account number', 'hitshippo_fedex') ?><font style="color:red;">*</font>
							<input type="text" id= "hitshippo_fedex_rest_acc_no" name="hitshippo_fedex_rest_acc_no" value="<?php echo (isset($general_settings['hitshippo_fedex_rest_acc_no'])) ? $general_settings['hitshippo_fedex_rest_acc_no'] : ''; ?>">
						</td>
					</tr>
					<tr class="REST_auth">
						<td style=" width: 50%;padding:10px;">
							<?php _e('API key', 'hitshippo_fedex') ?><font style="color:red;">*</font>
							<input type="text" id="hitshippo_fedex_rest_api_key" name="hitshippo_fedex_rest_api_key" value="<?php echo (isset($general_settings['hitshippo_fedex_rest_api_key'])) ? $general_settings['hitshippo_fedex_rest_api_key'] : ''; ?>">
							<a href="https://myshipi.com/docs/fedex/how-to-get-fedex-api-key-and-secret" target="_blank" style="color: #0ba156;">How to Get these details and permissions required?</a>
						</td>
						<td style="padding:10px;">
							<?php _e('Secret key', 'hitshippo_fedex') ?><font style="color:red;">*</font>
							<input type="text" id= "hitshippo_fedex_rest_secret_key" name="hitshippo_fedex_rest_secret_key" value="<?php echo (isset($general_settings['hitshippo_fedex_rest_secret_key'])) ? $general_settings['hitshippo_fedex_rest_secret_key'] : ''; ?>">
						</td>
					</tr>
					<tr class="REST_auth">
						<td style=" width: 50%;padding:10px;">
							<?php _e('Tracking API key', 'hitshippo_fedex') ?>
							<input type="text" id="hitshippo_fedex_rest_tracking_api_key" name="hitshippo_fedex_rest_tracking_api_key" value="<?php echo (isset($general_settings['hitshippo_fedex_rest_tracking_api_key'])) ? $general_settings['hitshippo_fedex_rest_tracking_api_key'] : ''; ?>">
							<a href="https://myshipi.com/docs/fedex/why-tracking-needs-different-api-details-in-fedex" target="_blank" style="color: #0ba156;">Why Tracking Needs Different API Details in FedEx?</a>
						</td>
						<td style="padding:10px;">
							<?php _e('Tracking Secret key', 'hitshippo_fedex') ?>
							<input type="text" id= "hitshippo_fedex_rest_tracking_secret_key" name="hitshippo_fedex_rest_tracking_secret_key" value="<?php echo (isset($general_settings['hitshippo_fedex_rest_tracking_secret_key'])) ? $general_settings['hitshippo_fedex_rest_tracking_secret_key'] : ''; ?>">
						</td>
					</tr>
					<tr>
						<td style="padding:10px;">
							<?php _e('Weight Unit', 'hitshippo_fedex') ?><font style="color:red;">*</font><br>
							<select name="hitshippo_fedex_weight_unit" class="wc-enhanced-select" style="width:95%;padding:5px;">
								<option value="LB_IN" <?php echo (isset($general_settings['hitshippo_fedex_weight_unit']) && $general_settings['hitshippo_fedex_weight_unit'] == 'LB_IN') ? 'Selected="true"' : ''; ?>> LB & IN </option>
								<option value="KG_CM" <?php echo (isset($general_settings['hitshippo_fedex_weight_unit']) && $general_settings['hitshippo_fedex_weight_unit'] == 'KG_CM') ? 'Selected="true"' : ''; ?>> KG & CM </option>
							</select>
						</td>
						<td style="padding:10px;">
							<?php _e('Change FedEx currency', 'hitshippo_fedex') ?><font style="color:red;">*</font><br>
							<select name="hitshippo_fedex_currency" style="width:95%;padding:5px;">

								<?php foreach ($currencys as  $key => $value) {
									if (isset($general_settings['hitshippo_fedex_currency']) && ($general_settings['hitshippo_fedex_currency'] == $key)) {
										echo "<option value=" . $key . " selected='true'>" . $key . ' - ' . $value . "</option>";
									} else {
										echo "<option value=" . $key . ">" . $key . ' - ' . $value . "</option>";
									}
								}
								 ?>
							</select>
						</td>
					</tr>
					<tr>
						<td colspan="2" style="padding:10px;">
							<hr>
						</td>
					</tr>
					<?php if ($general_settings['hitshippo_fedex_woo_currency'] != $general_settings['hitshippo_fedex_currency']) {
					?>
						<tr>
							<td colspan="2" style="text-align:center;"><small><?php _e(' Your Website Currency is ', 'hitshippo_fedex') ?> <b><?php echo $general_settings['hitshippo_fedex_woo_currency']; ?></b> and your FedEx currency is <b><?php echo (isset($general_settings['hitshippo_fedex_currency']) && !empty($general_settings['hitshippo_fedex_currency'])) ? $general_settings['hitshippo_fedex_currency'] : '(Choose country)'; ?></b>. <?php echo ($general_settings['hitshippo_fedex_woo_currency'] != $general_settings['hitshippo_fedex_currency']) ? 'So you have to consider the converstion rate.' : '' ?></small>
							</td>
						</tr>

						<tr>
							<td colspan="2" style="text-align:center;">
								<input type="checkbox" id="auto_con" name="hitshippo_fedex_auto_con_rate" <?php echo (isset($general_settings['hitshippo_fedex_auto_con_rate']) && $general_settings['hitshippo_fedex_auto_con_rate'] == 'yes') ? 'checked="true"' : ''; ?> value="yes"><?php _e('Auto Currency Conversion ', 'hitshippo_fedex') ?>

							</td>
						</tr>
						<tr>
							<td style="padding:10px;text-align:center;" colspan="2" class="con_rate">
								<?php _e('Exchange Rate', 'hitshippo_fedex') ?><font style="color:red;">*</font> <?php echo "( " . $general_settings['hitshippo_fedex_woo_currency'] . "->" . $general_settings['hitshippo_fedex_currency'] . " )"; ?>
								<br><input type="text" style="width:240px;" name="hitshippo_fedex_con_rate" value="<?php echo (isset($general_settings['hitshippo_fedex_con_rate'])) ? $general_settings['hitshippo_fedex_con_rate'] : ''; ?>">
								<br><small style="color:gray;"><?php _e('Enter conversion rate.', 'hitshippo_fedex') ?></small>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="padding:10px;">
								<hr>
							</td>
						</tr>
					<?php
					}
					?>

				</table>
				<?php if (isset($general_settings['hitshippo_fedex_shippo_int_key']) && $general_settings['hitshippo_fedex_shippo_int_key'] != '') {
					echo '<input type="submit" name="save" class="action-button save_changes" style="width:auto;float:left;" value="Save Changes" />';
				}

				?>
				<?php if (!$initial_setup) { ?>
				<input type="button" name="next" class="next action-button" value="Next" />
				<?php } ?>
			</fieldset>
			<fieldset>
				<center>
					<h2 class="fs-title">Shipping Address Information</h2>
				</center>

				<table style="width:100%;">
					<tr>
						<td colspan="2" style="padding:10px;">
							<hr>
						</td>
					</tr>
					<tr>
						<td style=" width: 50%;padding:10px;">
							<?php _e('Shipper Name', 'hitshippo_fedex') ?><font style="color:red;">*</font>
							<input type="text" name="hitshippo_fedex_shipper_name" id="fedex_shipper_name" value="<?php echo (isset($general_settings['hitshippo_fedex_shipper_name'])) ? $general_settings['hitshippo_fedex_shipper_name'] : ''; ?>">
						</td>
						<td style="padding:10px;">
							<?php _e('Company Name', 'hitshippo_fedex') ?><font style="color:red;">*</font>
							<input type="text" name="hitshippo_fedex_company" id="fedex_company" value="<?php echo (isset($general_settings['hitshippo_fedex_company'])) ? $general_settings['hitshippo_fedex_company'] : ''; ?>">
						</td>
					</tr>
					<tr>
						<td style=" width: 50%;padding:10px;">
							<?php _e('Shipper Mobile / Contact Number', 'hitshippo_fedex') ?><font style="color:red;">*</font>
							<input type="text" name="hitshippo_fedex_mob_num" id="fedex_mob_num" value="<?php echo (isset($general_settings['hitshippo_fedex_mob_num'])) ? $general_settings['hitshippo_fedex_mob_num'] : ''; ?>">
						</td>
						<td style="padding:10px;">
							<?php _e('Email Address of the Shipper', 'hitshippo_fedex') ?><font style="color:red;">*</font>
							<input type="text" name="hitshippo_fedex_email" id="fedex_email" value="<?php echo (isset($general_settings['hitshippo_fedex_email'])) ? $general_settings['hitshippo_fedex_email'] : ''; ?>">
						</td>
					</tr>
					<tr>
						<td style=" width: 50%;padding:10px;">
							<?php _e('Address Line 1', 'hitshippo_fedex') ?><font style="color:red;">*</font>
							<input type="text" name="hitshippo_fedex_address1" id="fedex_address1" value="<?php echo (isset($general_settings['hitshippo_fedex_address1'])) ? $general_settings['hitshippo_fedex_address1'] : ''; ?>">
						</td>
						<td style="padding:10px;">
							<?php _e('Address Line 2', 'hitshippo_fedex') ?>
							<input type="text" name="hitshippo_fedex_address2"  value="<?php echo (isset($general_settings['hitshippo_fedex_address2'])) ? $general_settings['hitshippo_fedex_address2'] : ''; ?>">
						</td>
					</tr>
					<tr>
						<td style=" width: 50%;padding:10px;">
							<?php _e('Country', 'hitshippo_fedex') ?><font style="color:red;">*</font><br>
								<select name="hitshippo_fedex_country" id="hitshippo_fedex_country" class="wc-enhanced-select" style="width:95%;padding:5px;">
							</select>
							
						</td>
						<td style="padding:10px;">
						<?php _e('State', 'hitshippo_fedex') ?><font style="color:red;">*</font><br>
							<select name="hitshippo_fedex_state" id="hitshippo_fedex_state" style="width:95%;padding:5px;" >
							</select>
						</td>
					</tr>
					<tr>
					<td style="padding:10px;">
						<?php _e('City of the Shipper from address', 'hitshippo_fedex') ?><font style="color:red;">*</font>
							<input type="text" name="hitshippo_fedex_city" id="fedex_city" value="<?php echo (isset($general_settings['hitshippo_fedex_city'])) ? $general_settings['hitshippo_fedex_city'] : ''; ?>">
						</td>
						<td style=" width: 50%;padding:10px;">
							<?php _e('Postal/Zip Code', 'hitshippo_fedex') ?><font style="color:red;">*</font>
							<input type="text" name="hitshippo_fedex_zip" id="fedex_zip" value="<?php echo (isset($general_settings['hitshippo_fedex_zip'])) ? $general_settings['hitshippo_fedex_zip'] : ''; ?>">
						</td>
						
					</tr>

					<tr>
						<td colspan="2" style="padding:10px;">
							<hr>
						</td>
					</tr>
				</table>
				<center>
					<h2 class="fs-title">Are you gonna use Multi Vendor?</h2>
				</center><br>
				<table style="padding-left:10px;padding-right:10px;">
					<td><span style="float:left;padding-right:10px;"><input type="checkbox" name="hitshippo_fedex_v_enable" <?php echo (isset($general_settings['hitshippo_fedex_v_enable']) && $general_settings['hitshippo_fedex_v_enable'] == 'yes') ? 'checked="true"' : ''; ?> value="yes"><small style="color:gray"> Use Multi-Vendor.</small></span></td>
					<td><span style="float:right;padding-right:10px;"><input type="checkbox" name="hitshippo_fedex_v_rates" <?php echo (isset($general_settings['hitshippo_fedex_v_rates']) && $general_settings['hitshippo_fedex_v_rates'] == 'yes') || ($initial_setup) ? 'checked="true"' : ''; ?> value="yes"><small style="color:gray"> Get rates from vendor address.</small></span></td>
					<td><span style="float:right;padding-right:10px;"><input type="checkbox" name="hitshippo_fedex_v_labels" <?php echo (isset($general_settings['hitshippo_fedex_v_labels']) && $general_settings['hitshippo_fedex_v_labels'] == 'yes') || ($initial_setup) ? 'checked="true"' : ''; ?> value="yes"><small style="color:gray"> Create Label from vendor address.</small></span></td>
					<td><span style="float:right;padding-right:10px;"><input type="checkbox" name="hitshippo_fedex_v_email" <?php echo (isset($general_settings['hitshippo_fedex_v_email']) && $general_settings['hitshippo_fedex_v_email'] == 'yes') ? 'checked="true"' : ''; ?> value="yes"><small style="color:gray"> Email the shipping labels to vendors.</small></span></td>
				</table>
				<table style="width:100%">


					<tr>
						<td style=" width: 50%;padding:10px;text-align:center;">
							<?php _e('Vendor role', 'hitshippo_fedex') ?></h4><br>
							<select name="hitshippo_fedex_v_roles[]" style="padding:5px;width:240px;">

								<?php foreach (get_editable_roles() as $role_name => $role_info) {
									if (isset($general_settings['hitshippo_fedex_v_roles']) && in_array($role_name, $general_settings['hitshippo_fedex_v_roles'])) {
										echo "<option value=" . $role_name . " selected='true'>" . $role_info['name'] . "</option>";
									} else {
										echo "<option value=" . $role_name . ">" . $role_info['name'] . "</option>";
									}
								}
								?>

							</select><br>
							<small style="color:gray;"> To this role users edit page, you can find the new<br>fields to enter the ship from address.</small>

						</td>
					</tr>
					<tr>
						<td style="padding:10px;">
							<hr>
						</td>
					</tr>
				</table>
				<?php if (isset($general_settings['hitshippo_fedex_shippo_int_key']) && $general_settings['hitshippo_fedex_shippo_int_key'] != '') {
					echo '<input type="submit" name="save" class="action-button save_changes" style="width:auto;float:left;" value="Save Changes" />';
				}

				?>
				<?php if (!$initial_setup) { ?>
				<input type="button" name="next" class="next action-button " value="Next" />
				<input type="button" name="previous" class="previous action-button" value="Previous" />
				<?php } ?>
			</fieldset>
			<fieldset <?php echo ($initial_setup) ? 'style="display:none"' : ''?>>
				<center>
					<h2 class="fs-title">Choose Packing ALGORITHM</h2>
				</center><br />
				<table style="width:100%">

					<tr>
						<td style=" width: 50%;padding:10px;">
							<?php _e('Select Package Type', 'hitshippo_fedex') ?>
						</td>
						<td style="padding:10px;">
							<select name="hitshippo_fedex_packing_type" style="padding:5px; width:95%;" id="hitshippo_fedex_packing_type" class="wc-enhanced-select" style="width:153px;" onchange="changepacktype(this)">
								<?php foreach ($packing_type as $key => $value) {
									if (isset($general_settings['hitshippo_fedex_packing_type']) && ($general_settings['hitshippo_fedex_packing_type'] == $key)) {
										echo "<option value=" . $key . " selected='true'>" . $value . "</option>";
									} else {
										echo "<option value=" . $key . ">" . $value . "</option>";
									}
								} ?>
							</select>
						</td>
					</tr>
					<tr style=" display:none;" id="weight_based">
						<td style=" width: 50%;padding:10px;">
							<?php _e('What is the Maximum weight to one package? (Weight based shipping only)', 'hitshippo_fedex') ?><font style="color:red;">*</font>
						</td>
						<td style="padding:10px;">
							<input type="number" name="hitshippo_fedex_max_weight" placeholder="" value="<?php echo (isset($general_settings['hitshippo_fedex_max_weight'])) ? $general_settings['hitshippo_fedex_max_weight'] : ''; ?>">
						</td>
					</tr>
				</table>
				<div id="box_pack" style="width: 100%;">
					<h4 style="font-size: 16px;">Box packing configuration</h4>
					<p>( Saved boxes are used when package type is "BOX". Enter the box dimensions/weight based on selected weight/dimension unit on plugin. )</p>
					<table id="box_pack_t">
						<tr>
							<th style="padding:3px;"></th>
							<th style="padding:3px;"><?php _e('Name', 'hitshippo_fedex') ?><font style="color:red;">*</font>
							</th>
							<th style="padding:3px;"><?php _e('Length', 'hitshippo_fedex') ?><font style="color:red;">*</font>
							</th>
							<th style="padding:3px;"><?php _e('Width', 'hitshippo_fedex') ?><font style="color:red;">*</font>
							</th>
							<th style="padding:3px;"><?php _e('Height', 'hitshippo_fedex') ?><font style="color:red;">*</font>
							</th>
							<th style="padding:3px;"><?php _e('Box Weight', 'hitshippo_fedex') ?><font style="color:red;">*</font>
							</th>
							<th style="padding:3px;"><?php _e('Max Weight', 'hitshippo_fedex') ?><font style="color:red;">*</font>
							</th>
							<th style="padding:3px;"><?php _e('Enabled', 'hitshippo_fedex') ?><font style="color:red;">*</font>
							</th>
							<th style="padding:3px;"><?php _e('Package Type', 'hitshippo_fedex') ?><font style="color:red;">*</font>
							</th>
						</tr>
						<tbody id="box_pack_tbody">
							<?php

							$boxes = (isset($general_settings['hitshippo_fedex_boxes'])) ? $general_settings['hitshippo_fedex_boxes'] : $boxes;
							if (!empty($boxes)) { //echo '<pre>';print_r($general_settings['hitshippo_fedex_boxes']);die();
								foreach ($boxes as $key => $box) {
									echo '<tr>
												<td class="check-column" style="padding:3px;"><input type="checkbox" /></td>
												<input type="hidden" size="1" name="boxes_id[' . $key . ']" value="' . $box["id"] . '"/>
												<td style="padding:3px;"><input type="text" size="25" name="boxes_name[' . $key . ']" value="' . $box["name"] . '" /></td>
												<td style="padding:3px;"><input type="text" style="width:100%;" name="boxes_length[' . $key . ']" value="' . $box["length"] . '" /></td>
												<td style="padding:3px;"><input type="text" style="width:100%;" name="boxes_width[' . $key . ']" value="' . $box["width"] . '" /></td>
												<td style="padding:3px;"><input type="text" style="width:100%;" name="boxes_height[' . $key . ']" value="' . $box["height"] . '" /></td>
												<td style="padding:3px;"><input type="text" style="width:100%;" name="boxes_box_weight[' . $key . ']" value="' . $box["box_weight"] . '" /></td>
												<td style="padding:3px;"><input type="text" style="width:100%;" name="boxes_max_weight[' . $key . ']" value="' . $box["max_weight"] . '" /></td>';
									if ($box['enabled'] == true) {
										echo '<td style="padding:3px;"><center><input type="checkbox" name="boxes_enabled[' . $key . ']" checked/></center></td>';
									} else {
										echo '<td style="padding:3px;"><center><input type="checkbox" name="boxes_enabled[' . $key . ']" /></center></td>';
									}

									echo '<td style="padding:3px;"><select name="boxes_pack_type[' . $key . ']">';
									foreach ($package_type as $k => $v) {
										$selected = ($k == $box['pack_type']) ? "selected='true'" : '';
										echo '<option value="' . $k . '" ' . $selected . '>' . $v . '</option>';
									}
									echo '</select></td>
											</tr>';
								}
							}
							?>
						<tfoot>
							<tr>
								<th colspan="6">
									<a href="#" class="button button-secondary" id="add_box"><?php _e('Add Box', 'hitshippo_fedex') ?></a>
									<a href="#" class="button button-secondary" id="remove_box"><?php _e('Remove selected box(es)', 'hitshippo_fedex') ?></a>
								</th>
							</tr>
						</tfoot>
						</tbody>
					</table>
				</div>

				<?php if (isset($general_settings['hitshippo_fedex_shippo_int_key']) && $general_settings['hitshippo_fedex_shippo_int_key'] != '') {
					echo '<input type="submit" name="save" class="action-button save_changes" style="width:auto;float:left;" value="Save Changes" />';
				}

				?>
				<?php if (!$initial_setup) { ?>
				<input type="button" name="next" class="next action-button" value="Next" />
				<input type="button" name="previous" class="previous action-button" value="Previous" />
				<?php } ?>
			</fieldset>
			<fieldset>
				<center>
					<h2 class="fs-title">Rates</h2><br />
					<table style="padding-left:10px;padding-right:10px;">
						<tr>
							<td colspan="3" style=" text-align: center;">
								<span style="float:left;padding-right:10px;"><input type="checkbox" name="hitshippo_fedex_one_rates" <?php echo (isset($general_settings['hitshippo_fedex_one_rates']) && $general_settings['hitshippo_fedex_one_rates'] == 'yes') ? 'checked="true"' : ''; ?> value="yes"><small style="color:gray"> Enable ONE rate.</small></span>
								<span style="float:right;padding-right:10px;"><input type="checkbox" name="hitshippo_fedex_account_rates" <?php echo (isset($general_settings['hitshippo_fedex_account_rates']) && $general_settings['hitshippo_fedex_account_rates'] == 'yes') || ($initial_setup) ? 'checked="true"' : ''; ?> value="yes"><small style="color:gray"> Fetch FedEx account rates.</small></span>
								<span style="float:right;padding-right:10px;"><input type="checkbox" name="hitshippo_fedex_send_pack_as_ship" <?php echo (isset($general_settings['hitshippo_fedex_send_pack_as_ship']) && $general_settings['hitshippo_fedex_send_pack_as_ship'] == 'yes') ? 'checked="true"' : ''; ?> value="yes"><small style="color:gray"> Send Fedex pack type as same as shipping label settings.</small></span>
							</td>
						</tr>
						<tr <?php echo ($initial_setup) ? 'style="display:none"' : ''?>>
							<td colspan="3" style=" text-align: center;">
								<span style=" text-align: center;"><input type="checkbox" name="hitshippo_fedex_res_f" <?php echo (isset($general_settings['hitshippo_fedex_res_f']) && $general_settings['hitshippo_fedex_res_f'] == 'yes') ? 'checked="true"' : ''; ?> value="yes"><small style="color:gray"> Residential Delivery.</small></span>
								<span style=" text-align: center;"><input type="checkbox" name="hitshippo_fedex_include_tax" <?php echo (isset($general_settings['hitshippo_fedex_include_tax']) && $general_settings['hitshippo_fedex_include_tax'] == 'yes') ? 'checked="true"' : ''; ?> value="yes"><small style="color:gray"> Include Tax.</small></span>
								<span style=" text-align: center;"><input type="checkbox" name="hitshippo_fedex_sat_del" <?php echo (isset($general_settings['hitshippo_fedex_sat_del']) && $general_settings['hitshippo_fedex_sat_del'] == 'yes') ? 'checked="true"' : ''; ?> value="yes"><small style="color:gray"> Saturday Delivery</small></span>
								<span style=" text-align: center;"><input type="checkbox" name="hitshippo_fedex_del_date" <?php echo (isset($general_settings['hitshippo_fedex_del_date']) && $general_settings['hitshippo_fedex_del_date'] == 'yes') ? 'checked="true"' : ''; ?> value="yes"><small style="color:gray"> Show Delivery Date</small></span>
								<span style=" text-align: center;"><input type="checkbox" name="hitshippo_fedex_insurance" <?php echo (isset($general_settings['hitshippo_fedex_insurance']) && $general_settings['hitshippo_fedex_insurance'] == 'yes') ? 'checked="true"' : ''; ?> value="yes"><small style="color:gray"> Insurance</small></span>
							</td>
						</tr>
					</table>
				</center>
				<center>
					<h2 class="fs-title">Shipping Services & Price adjustment</h2>
				</center>
				<table style="width:100%;">

					<tr>
						<td>
							<h3 style="font-size: 1.10em;"><?php _e('Carriers', 'hitshippo_fedex') ?></h3>
						</td>
						<td>
							<h3 style="font-size: 1.10em;"><?php _e('Alternate Name for Carrier', 'hitshippo_fedex') ?></h3>
						</td>

					</tr>
					<?php foreach ($_carriers as $key => $value) {
						if ($key == 'INTERNATIONAL_ECONOMY') {
							echo ' <tr><td colspan="4" style="padding:10px;"><hr></td></tr><tr ><td colspan="4" style="text-align:center;"><div style="padding:10px;border:1px solid gray;"><b><u>INTERNATIONAL SERVICES</u><br>
									These all are the services provided by FedEx to ship internationally.<br>

								</b></div></td></tr> <tr><td colspan="4" style="padding:10px;"><hr></td></tr>';
						} else if ($key == "FIRST_OVERNIGHT") {
							echo ' <tr><td colspan="4" style="padding:10px;"><hr></td></tr><tr ><td colspan="4" style="text-align:center;"><div style="padding:10px;border:1px solid gray;"><b><u>DOMESTIC SERVICES</u><br>
										These all are the services provided by Fedex to ship domestic.<br>
									</b></div>
									</td></tr> <tr><td colspan="4" style="padding:10px;"><hr></td></tr>';
						} else if ($key == 'FEDEX_CARGO_AIRPORT_TO_AIRPORT') {
							echo ' <tr><td colspan="4" style="padding:10px;"><hr></td></tr><tr ><td colspan="4" style="text-align:center;"><b><u>OTHER SPECIAL SERVICES</u><br>

									</b>
									</td></tr> <tr><td colspan="4" style="padding:10px;"><hr></td></tr>';
						}
						$ser_to_enable = ["FIRST_OVERNIGHT", "PRIORITY_OVERNIGHT", "STANDARD_OVERNIGHT", "FEDEX_GROUND", "FEDEX_EXPRESS_SAVER", "INTERNATIONAL_ECONOMY", "INTERNATIONAL_FIRST", "INTERNATIONAL_GROUND", "INTERNATIONAL_PRIORITY", "FEDEX_INTERNATIONAL_PRIORITY"];
						echo '	<tr>
										<td>
										<input type="checkbox" value="yes" name="hitshippo_fedex_carrier[' . $key . ']" ' . ((isset($general_settings['hitshippo_fedex_carrier'][$key]) && $general_settings['hitshippo_fedex_carrier'][$key] == 'yes') || ($initial_setup && in_array($key, $ser_to_enable)) ? 'checked="true"' : '') . ' > <small>' . $value . ' - [ ' . $key . ' ]</small>
										</td>
										<td>
											<input type="text" name="hitshippo_fedex_carrier_name[' . $key . ']" value="' . ((isset($general_settings['hitshippo_fedex_carrier_name'][$key])) ? $general_settings['hitshippo_fedex_carrier_name'][$key] : '') . '">
										</td>
										</tr>';
					} ?>
					<tr>
						<td colspan="4" style="padding:10px;">
							<hr>
						</td>
					</tr>
				</table>
				<?php if (isset($general_settings['hitshippo_fedex_shippo_int_key']) && $general_settings['hitshippo_fedex_shippo_int_key'] != '') {
					echo '<input type="submit" name="save" class="action-button save_changes" style="width:auto;float:left;" value="Save Changes" />';
				}

				?>
				<?php if (!$initial_setup) { ?>
				<input type="button" name="next" class="next action-button" value="Next" />
				<input type="button" name="previous" class="previous action-button" value="Previous" />
				<?php } ?>

			</fieldset>
			<fieldset>
				<center>
					<h2 class="fs-title">Configure Shipping Label</h2><br />
					<table style="padding-left:10px;padding-right:10px;">
						<td><span style="float:left;padding-right:10px;"><input type="checkbox" name="hitshippo_fedex_cod" <?php echo (isset($general_settings['hitshippo_fedex_cod']) && $general_settings['hitshippo_fedex_cod'] == 'yes') ? 'checked="true"' : ''; ?> value="yes"><small style="color:gray"> Cash on Delivery.</small></span></td>
						<td><span style="float:right;padding-right:10px;"><input type="checkbox" name="hitshippo_fedex_etd" <?php echo (isset($general_settings['hitshippo_fedex_etd']) && $general_settings['hitshippo_fedex_etd'] == 'yes') ? 'checked="true"' : ''; ?> value="yes"><small style="color:gray"> Enable Electronic Trade Document International(ETD). (To Upload Documents Contact shipi to automate)</small></span></td>

					</table>
				</center>
				<table style="width:100%">
					<tr>
						<td colspan="2" style="padding:10px;">
							<hr>
							
						</td>
					</tr>

					<tr>
						<td style=" width: 50%;padding:10px;">
							<?php _e('Shipment Content', 'hitshippo_fedex') ?>
							<input type="text" name="hitshippo_fedex_shipment_content" placeholder="" value="<?php echo (isset($general_settings['hitshippo_fedex_shipment_content'])) ? $general_settings['hitshippo_fedex_shipment_content'] : ''; ?>">
						</td>
						<td style="padding:10px;">
							<?php _e('Shipping Label Format (PDF)', 'hitshippo_fedex') ?><font style="color:red;">*</font><br>
							<select name="hitshippo_fedex_label_size" style="width:95%;padding:5px;">
								<?php foreach ($printer_doc_size as $key => $value) {
									if (isset($general_settings['hitshippo_fedex_label_size']) && ($general_settings['hitshippo_fedex_label_size'] == $key)) {
										echo "<option value=" . $key . " selected='true'>" . $value . "</option>";
									} else {
										echo "<option value=" . $key . ">" . $value . "</option>";
									}
								} ?>
							</select>
						</td>
					</tr>

					<tr>
						<td style=" width: 50%;padding:10px;">
							<?php _e('Select drop off type for shipments', 'hitshippo_fedex') ?><font style="color:red;">*</font><br>
							<select name="hitshippo_fedex_drop_off" style="width:95%;padding:5px;">
								<?php foreach ($shipment_drop_off_type as $key => $value) {
									if (isset($general_settings['hitshippo_fedex_drop_off']) && ($general_settings['hitshippo_fedex_drop_off'] == $key)) {
										echo "<option value=" . $key . " selected='true'>" . $value . "</option>";
									} else {
										echo "<option value=" . $key . ">" . $value . "</option>";
									}
								} ?>
							</select><br>
						</td>
						<td style=" width: 50%;padding:10px;">
							<?php _e('Email address to sent Shipping label', 'hitshippo_fedex') ?>
							<input type="text" name="hitshippo_fedex_shippo_mail" placeholder="" value="<?php echo (isset($general_settings['hitshippo_fedex_shippo_mail'])) ? $general_settings['hitshippo_fedex_shippo_mail'] : ''; ?>"><br>
							<small style="color:gray;"> Shipi send the shipping label and invoice to the given email after creating shipment. If you don't need this then leave it empty.</small>
						</td>
					</tr>
					<tr <?php echo ($initial_setup) ? 'style="display:none"' : ''?>>
						<td style=" width: 50%;padding:10px;">
							<?php _e('Shipping Pack Type', 'hitshippo_fedex') ?><font style="color:red;">*</font><br>
							<select name="hitshippo_fedex_ship_pack_type" style="width:95%;padding:5px;">
								<?php foreach ($shipment_packing_type as $key => $value) {
									if (isset($general_settings['hitshippo_fedex_ship_pack_type']) && ($general_settings['hitshippo_fedex_ship_pack_type'] == $key)) {
										echo "<option value=" . $key . " selected='true'>" . $value . "</option>";
									} else {
										echo "<option value=" . $key . ">" . $value . "</option>";
									}
								} ?>
							</select><br>
						</td>
						<td style=" width: 50%;padding:10px;">
							<?php _e('Collection Type (for COD)', 'hitshippo_fedex') ?><br>
							<select name="hitshippo_fedex_collection_type" style="width:95%;padding:5px;">
								<?php foreach ($collection_type as $key => $value) {
									if (isset($general_settings['hitshippo_fedex_collection_type']) && ($general_settings['hitshippo_fedex_collection_type'] == $key)) {
										echo "<option value=" . $key . " selected='true'>" . $value . "</option>";
									} else {
										echo "<option value=" . $key . ">" . $value . "</option>";
									}
								} ?>
							</select><br>
						</td>
					</tr>
					<tr <?php echo ($initial_setup) ? 'style="display:none"' : ''?>>
						<td style=" width: 50%;padding:10px;">
							<?php _e('Duty Payment Type', 'hitshippo_fedex') ?><br>
							<select name="hitshippo_fedex_duty_type" style="width:95%;padding:5px;">
								<?php foreach ($duty_type as $key => $value) {
									if (isset($general_settings['hitshippo_fedex_duty_type']) && ($general_settings['hitshippo_fedex_duty_type'] == $key)) {
										echo "<option value=" . $key . " selected='true'>" . $value . "</option>";
									} else {
										echo "<option value=" . $key . ">" . $value . "</option>";
									}
								} ?>
							</select><br>
						</td>
						<td style=" width: 50%;padding:10px;">
							<?php _e('Pickup Type', 'hitshippo_fedex') ?><br>
							<select name="hitshippo_fedex_pickup_type" style="width:95%;padding:5px;">
								<?php foreach ($pickup_type as $key => $value) {
									if (isset($general_settings['hitshippo_fedex_pickup_type']) && ($general_settings['hitshippo_fedex_pickup_type'] == $key)) {
										echo "<option value=" . $key . " selected='true'>" . $value . "</option>";
									} else {
										echo "<option value=" . $key . ">" . $value . "</option>";
									}
								} ?>
							</select>
						</td>
					</tr>
					<tr <?php echo ($initial_setup) ? 'style="display:none"' : ''?>>
						<td style=" width: 50%;padding:10px;">
							<?php _e('Signature Options', 'hitshippo_fedex') ?><br>
							<select name="hitshippo_fedex_sign" style="width:95%;padding:5px;">
								<?php foreach ($shipment_signature_codes as $key => $value) {
									if (isset($general_settings['hitshippo_fedex_sign']) && ($general_settings['hitshippo_fedex_sign'] == $key)) {
										echo "<option value=" . $key . " selected='true'>" . $value . "</option>";
									} else {
										echo "<option value=" . $key . ">" . $value . "</option>";
									}
								} ?>
							</select><br>
						</td>
						<td style=" width: 50%;padding:10px;">
							<?php _e('Reason for Export', 'hitshippo_fedex') ?><br>
							<select name="hitshippo_fedex_export_reason" style="width:95%;padding:5px;">
								<?php foreach ($reason_for_export as $key => $value) {
									if (isset($general_settings['hitshippo_fedex_export_reason']) && ($general_settings['hitshippo_fedex_export_reason'] == $key)) {
										echo "<option value=" . $key . " selected='true'>" . $value . "</option>";
									} else {
										echo "<option value=" . $key . ">" . $value . "</option>";
									}
								} ?>
							</select><br>
						</td>
					</tr>
					<tr <?php echo ($initial_setup) ? 'style="display:none"' : ''?>>
						<td style=" width: 50%;padding:10px;">
							<?php _e('Return Type', 'hitshippo_fedex') ?>
							<br>
							<select name="hitshippo_fedex_return_type" style="width:95%;padding:5px;">
								<?php foreach ($return_type as $key => $value) {
									if (isset($general_settings['hitshippo_fedex_return_type']) && ($general_settings['hitshippo_fedex_return_type'] == $key)) {
										echo "<option value=" . $key . " selected='true'>" . $value . "</option>";
									} else {
										echo "<option value=" . $key . ">" . $value . "</option>";
									}
								} ?>
							</select><br>
						</td>
						<td style=" width: 50%;padding:10px;">
							<?php _e('Return type description', 'hitshippo_fedex') ?>
							<input type="text" name="hitshippo_fedex_return_type_desc" placeholder="" value="<?php echo (isset($general_settings['hitshippo_fedex_return_type_desc'])) ? $general_settings['hitshippo_fedex_return_type_desc'] : ''; ?>"><br>
							<small style="color:gray;">Required when Return type is 'Others'.</small>
						</td>
					</tr>
					<tr <?php echo ($initial_setup) ? 'style="display:none"' : ''?>>
						<td style=" width: 50%;padding:10px;">
							<?php _e('Invoice Signature Image URL (.png Only supported)', 'hitshippo_fedex') ?>
							<input type="text" name="hitshippo_fedex_inv_img" placeholder="" value="<?php echo (isset($general_settings['hitshippo_fedex_inv_img'])) ? $general_settings['hitshippo_fedex_inv_img'] : ''; ?>"><br>
							<br>
						</td>
						<td style=" width: 50%;padding:10px;">
							<!-- <?php _e('Letter Head Image URL (.png Only supported)', 'hitshippo_fedex') ?>
							<input type="text" name="hitshippo_fedex_inv_letterhead" placeholder="" value="<?php echo (isset($general_settings['hitshippo_fedex_inv_letterhead'])) ? $general_settings['hitshippo_fedex_inv_letterhead'] : ''; ?>"><br> -->
						</td>
					</tr>
					<tr>
						<td colspan="2" style="padding:10px;">
							<hr>
						</td>
					</tr>
				</table>
				<!-- // SHIPPING LABEL AUTOMATION -->
				<center <?php echo ($initial_setup) ? 'style="display:none"' : ''?>>
					<h2 class="fs-title">SHIPPING LABEL AUTOMATION</h2><br />
					<table style="padding-left:10px;padding-right:10px;">
						<tr>
							<small style="color:red; text-align: justify;">Note: </small><small style="color:gray;">When "Create Label automatically" is chosen then the default shipping services chosen from here will be used to generate labels automatically for the orders placed using other service.</small>
						</tr>
						<tr>
							<td style=" width: 50%;padding:10px;">
								<p> <span class=""></span> <?php _e('Default Domestic Service', 'hitshippo_fedex') ?>
								<p>
							</td>
							<td style="padding:10px;">
								<select name="hitshippo_fedex_Domestic_service" style="padding:5px; width:95%;" id="hitshippo_fedex_Domestic_service" class="wc-enhanced-select" style="width:153px;" onchange="changepacktype(this)">
								<option value="null" selected ='true'>No option</option>
									<?php
									foreach ($Domestic_service as $key => $values) {
										if (isset($general_settings['hitshippo_fedex_Domestic_service']) && $general_settings['hitshippo_fedex_Domestic_service'] == $key) {
											echo "<option value=" . $key . " selected ='true'>" . $values . "-[" . $key . "]" . "</option>";
										} else {
											echo "<option value=" . $key . ">" . $values . "-[" . $key . "]" . "</option>";
										}
									}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td style=" width: 50%;padding:10px;">
								<p> <span class=""></span> <?php _e('Default International Service', 'hitshippo_fedex') ?></p>
							</td>
							<td style="padding:10px;">
								<select name="hitshippo_fedex_international_service" style="padding:5px; width:95%;" id="hitshippo_fedex_international_service" class="wc-enhanced-select" style="width:153px;" onchange="changepacktype(this)">
								<option value="null" selected ='true'>No option</option>
									<?php
									foreach ($international_service as $key => $values) {
										if (isset($general_settings['hitshippo_fedex_international_service']) && $general_settings['hitshippo_fedex_international_service'] == $key) {
											echo "<option value=" . $key . " selected ='true'>" . $values . "-[" . $key . "]" . "</option>";
										} else {
											echo "<option value=" . $key . ">" . $values . "-[" . $key . "]" . "</option>";
										}
									}

									?>

								</select>
							</td>
						</tr>
						
					</table>
				</center>

				<?php if (isset($general_settings['hitshippo_fedex_shippo_int_key']) && $general_settings['hitshippo_fedex_shippo_int_key'] != '') {
					echo '<input type="submit" name="save" class="action-button save_changes" style="width:auto;float:left;" value="Save Changes" />';
				}

				?>
				<?php if (!$initial_setup) { ?>
				<input type="button" name="next" class="next action-button" value="Next" />
				<input type="button" name="previous" class="previous action-button" value="Previous" />
				<?php } ?>

			</fieldset>
		<?php }
		?>
		<fieldset>
			<center>
				<h2 class="fs-title">LINK Shipi</h2><br>
				<h3 class="fs-subtitle">Shipi performs all the operations in its own server. So it won't affect your page speed or server usage.</h3>
				<?php
				if (!isset($general_settings['hitshippo_fedex_shippo_int_key']) || empty($general_settings['hitshippo_fedex_shippo_int_key'])) {
				?>
					<input type="radio" name="shipo_link_type" id="WITHOUT" value="WITHOUT" checked>I don't have Shipi account  &nbsp; &nbsp; &nbsp;
					<input type="radio" name="shipo_link_type" id="WITH" value="WITH">I have Shipi integration key
<br><hr>
		<table class="with_shipo_acc" style="width:100%;text-align:center;display: none;">
		<tr>
			<td style="width: 50%;padding:10px;">
				<?php _e('Enter Intergation Key', 'hitshippo_fedex') ?><font style="color:red;">*</font><br>
				
				<input type="text" style="width:330px;" class="intergration" id="shipo_intergration"  name="hitshippo_fedex_shippo_int_key" value="">
			</td>
		</tr>
	</table>
					<br>
					<table class ="without_shipo_acc" style="padding-left:10px;padding-right:10px;">
						<td><span style="float:left;padding-right:10px;"><input type="checkbox" name="hitshippo_fedex_track_audit" <?php echo (isset($general_settings['hitshippo_fedex_track_audit']) && $general_settings['hitshippo_fedex_track_audit'] == 'yes') ? 'checked="true"' : ''; ?> value="yes"><small style="color:gray"> Track shipments everyday & Update the order status </small></span></td>
						<td><span style="float:right;padding-right:10px;"><input type="checkbox" name="hitshippo_fedex_daily_report" <?php echo (isset($general_settings['hitshippo_fedex_daily_report']) && $general_settings['hitshippo_fedex_daily_report'] == 'yes') ? 'checked="true"' : ''; ?> value="yes"><small style="color:gray"> Daily Report</small></span></td>
						<td><span style="float:right;padding-right:10px;"><input type="checkbox" name="hitshippo_fedex_monthly_report" <?php echo (isset($general_settings['hitshippo_fedex_monthly_report']) && $general_settings['hitshippo_fedex_monthly_report'] == 'yes') ? 'checked="true"' : ''; ?> value="yes"><small style="color:gray"> Monthly Report</small></span></td>
					</table>
			</center>
			<table class="without_shipo_acc" style="width:100%;text-align:center;">
				<tr>
					<td style="padding:10px;">
						
					</td>
				</tr>

				<tr>
					<td style=" width: 50%;padding:10px;">
						<?php _e('Email address to signup / check the registered email.', 'hitshippo_fedex') ?><font style="color:red;">*</font><br>
						<input type="email" id="shipo_mail" style="width:330px;" placeholder="Enter email address" name="hitshippo_fedex_shipo_signup" placeholder="" value="<?php echo (isset($general_settings['hitshippo_fedex_shipo_signup'])) ? $general_settings['hitshippo_fedex_shipo_signup'] : ''; ?>">
					</td>

				</tr>
				<tr>
					<td style=" width: 50%;padding:10px;">
						<?php _e('password.', 'hitshippo_fedex') ?><font style="color:red;">*</font><br>
						<input type="password" id="shipo_password" style="width:330px;" placeholder="Enter password" name="hitshippo_fedex_shipo_password" placeholder="" value="">
					</td>

				</tr>

				<tr>
					<td style="padding:10px;">
						<hr>
					</td>
				</tr>

			</table>

		<?php } else {
		?>
			<tr>
				<td style="padding:10px;">
					<?php _e('Shipi Intergation Key', 'hitshippo_fedex') ?><br><br>
				</td>
			</tr>
			<tr>
				<td><span style="padding-right:10px; text-align:center;"><input type="checkbox" id='intergration_ckeck_box'><small style="color:gray">Edit intergration key</small></span></td>
			</tr>
			<tr>
				<td>
					<input style="width:24%; text-align:center; pointer-events:none;" required type="text" id="intergration" name="hitshippo_fedex_shippo_int_key" placeholder="" value="<?php echo (isset($general_settings['hitshippo_fedex_shippo_int_key'])) ? $general_settings['hitshippo_fedex_shippo_int_key'] : ''; ?>">
				</td>
			</tr>
			<p style="font-size:14px;line-height:24px;">
				Site Linked Successfully. <br><br>
				It's great to have you here. Your account has been linked successfully with Shipi. <br><br>
				Make your customers happier by reacting faster and handling their service requests in a timely manner, meaning higher store reviews and more revenue.</p>
		<?php
					echo '</center>';
				}
		?>
		<?php echo '<center>' . $error . '</center>'; ?>

		<?php if (!isset($general_settings['hitshippo_fedex_shippo_int_key']) || empty($general_settings['hitshippo_fedex_shippo_int_key'])) {
		?>
			<input type="submit" name="save" class="action-button save_changes" style="width:auto;" value="SAVE & START" />
		<?php	} else {	?>
			<input type="submit" name="save" class="action-button save_changes" style="width:auto;" value="Save Changes" />
		<?php	}	?>
		<?php 
		if (!$initial_setup) {
		if (empty($error)) {
		?>	
		<input type="button" name="previous" class="previous action-button" value="Previous" />
		<?php }else{ ?>
			<input type="button" name="previous" class="previous action-button" value="Previous" onclick=" location.reload();" /> 
			<?php  }}?>
		</fieldset>
	</form>
	<center><a href="https://app.myshipi.com/support" target="_blank" style="width:auto;margin-right :20px;" class="button button-primary">Trouble in configuration? / not working? Email us.</a>
<a href="https://calendar.app.google/aVfnftudzdtZwDVT9" target="_blank" style="width:auto;" class="button button-primary">Looking for demo ? Book your slot with our expert</a></center>


	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->
	<script type="text/javascript">
		var current_fs, next_fs, previous_fs;
		var left, opacity, scale;
		var animating;
		jQuery(".next").click(function() {
			if (animating) return false;
			animating = true;

			current_fs = jQuery(this).parent();
			next_fs = jQuery(this).parent().next();
			jQuery("#progressbar li").eq(jQuery("fieldset").index(next_fs)).addClass("active");
			next_fs.show();
			document.body.scrollTop = 0; // For Safari
			document.documentElement.scrollTop = 0;
			current_fs.animate({
				opacity: 0
			}, {
				step: function(now, mx) {
					scale = 1 - (1 - now) * 0.2;
					left = now * 50 + "%";
					opacity = 1 - now;
					current_fs.css({
						transform: "scale(" + scale + ")"
					});
					next_fs.css({
						left: left,
						opacity: opacity
					});
				},
				duration: 0,
				complete: function() {
					current_fs.hide();
					animating = false;
				},
				//easing: "easeInOutBack"
			});
		});

		jQuery(".previous").click(function() {
			if (animating) return false;
			animating = true;

			current_fs = jQuery(this).parent();
			previous_fs = jQuery(this).parent().prev();
			jQuery("#progressbar li")
				.eq(jQuery("fieldset").index(current_fs))
				.removeClass("active");

			previous_fs.show();
			current_fs.animate({
				opacity: 0
			}, {
				step: function(now, mx) {
					scale = 0.8 + (1 - now) * 0.2;
					left = (1 - now) * 50 + "%";
					opacity = 1 - now;
					current_fs.css({
						left: left
					});
					previous_fs.css({
						transform: "scale(" + scale + ")",
						opacity: opacity
					});
				},
				duration: 0,
				complete: function() {
					current_fs.hide();
					animating = false;
				},
				//easing: "easeInOutBack"
			});
		});

		jQuery(".submit").click(function() {
			return false;
		});
		jQuery(document).ready(function() {
			
			var fedex_curr = '<?php echo $general_settings['hitshippo_fedex_currency']; ?>';
			var woo_curr = '<?php echo $general_settings['hitshippo_fedex_woo_currency']; ?>';
			var fedex_cod = '<?php echo $general_settings['hitshippo_fedex_cod']; ?>';
			
			var box = document.getElementById("box_pack");
			var api_type = jQuery("input[name='hitshippo_fedex_api_type']:checked").val();

			if (api_type == "REST") {
				jQuery('.SOAP_auth').attr('hidden', 'hidden');
				jQuery('.REST_auth').removeAttr('hidden');
			} else {
				jQuery('.SOAP_auth').removeAttr('hidden');
				jQuery('.REST_auth').attr('hidden', 'hidden');
			}
			jQuery("input[name='hitshippo_fedex_api_type']").change(function() {
				if (this.value == "REST") {
					jQuery('.SOAP_auth').attr('hidden', 'hidden');
					jQuery('.REST_auth').removeAttr('hidden');
				} else {
					jQuery('.SOAP_auth').removeAttr('hidden');
					jQuery('.REST_auth').attr('hidden', 'hidden');
				}
			});
			if ('#checkAll') {
				jQuery('#checkAll').on('click', function() {
					jQuery('.fedex_service').each(function() {
						this.checked = true;
					});
				});
			}
			if ('#uncheckAll') {
				jQuery('#uncheckAll').on('click', function() {
					jQuery('.fedex_service').each(function() {
						this.checked = false;
					});
				});
			}

			if (fedex_curr != null && fedex_curr == woo_curr) {
				jQuery('.con_rate').each(function() {
					jQuery('.con_rate').hide();
				});
			} else {
				if (jQuery("#auto_con").prop('checked') == true) {
					jQuery('.con_rate').hide();
				} else {
					jQuery('.con_rate').each(function() {
						jQuery('.con_rate').show();
					});
				}
			}

			jQuery("#auto_con").change(function() {
				if (this.checked) {
					jQuery('.con_rate').hide();
				} else {
					if (fedex_curr != woo_curr) {
						jQuery('.con_rate').show();
					}
				}
			});

			jQuery("#hitshippo_fedex_cod").change(function() {
				if (this.checked) {
					jQuery('#col_type').show();
				} else {
					jQuery('#col_type').hide();
				}
			});

			if (fedex_cod != "yes") {
				jQuery('#col_type').hide();
			}

			jQuery('#add_box').click(function() {
				var pack_type_options = '<option value="BOX">Box Pack</option><option value="YP" selected="selected" >Your Pack</option>';
				var tbody = jQuery('#box_pack_t').find('#box_pack_tbody');
				var size = tbody.find('tr').size();
				var code = '<tr class="new">\
			<td  style="padding:3px;" class="check-column"><input type="checkbox" /></td>\
			<input type="hidden" size="1" name="boxes_id[' + size + ']" value="box_id_' + size + '"/>\
			<td style="padding:3px;"><input type="text" size="25" name="boxes_name[' + size + ']" /></td>\
			<td style="padding:3px;"><input type="text" style="width:100%;" name="boxes_length[' + size + ']" /></td>\
			<td style="padding:3px;"><input type="text" style="width:100%;" name="boxes_width[' + size + ']" /></td>\
			<td style="padding:3px;"><input type="text" style="width:100%;" name="boxes_height[' + size + ']" /></td>\
			<td style="padding:3px;"><input type="text" style="width:100%;" name="boxes_box_weight[' + size + ']" /></td>\
			<td style="padding:3px;"><input type="text" style="width:100%;" name="boxes_max_weight[' + size + ']" /></td>\
			<td style="padding:3px;"><center><input type="checkbox" name="boxes_enabled[' + size + ']" /></center></td>\
			<td style="padding:3px;"><select name="boxes_pack_type[' + size + ']" >' + pack_type_options + '</select></td>\
	        </tr>';
				tbody.append(code);
				return false;
			});

			jQuery('#remove_box').click(function() {
				var tbody = jQuery('#box_pack_t').find('#box_pack_tbody');
				console.log(tbody);
				tbody.find('.check-column input:checked').each(function() {
					jQuery(this).closest('tr').remove().find('input').val('');
				});
				return false;
			});

			var box_type = jQuery('#hitshippo_fedex_packing_type').val();
			var weight = jQuery('#weight_based').val();

			if (box_type != "box") {
				// box.style.display = "none";
				jQuery('#box_pack').hide();
			}
		
			if (box_type != "weight_based") {
				// weight.style.display = "none";
				jQuery('#weight_based').hide();
			}else{
				// weight.style.display = "table-row";
				jQuery('#weight_based').show();
			}


		});

		function changepacktype(selectbox) {
			var box = document.getElementById("box_pack");
			var weight = document.getElementById("weight_based");
			var box_type = selectbox.value;
			if(box_type == "weight_based"){			
				weight.style.display = "table-row";
			}else{
				weight.style.display = "none";
			}
			if (box_type == "box") {
				box.style.display = "block";
			} else {
				box.style.display = "none";
			}
			// alert(box_type);
		}
		
        jQuery("#intergration_ckeck_box").click(function () {
            if (jQuery(this).is(":checked")) {
                jQuery("#intergration").css("pointer-events", "auto");
            } else {
				jQuery("#intergration").css("pointer-events", "none");
            }
        });

		jQuery('.save_changes').click(function() {
		var key = jQuery("input[name='hitshippo_fedex_api_type']:checked").val();
		var site_id = jQuery('#site_id').val();
		var site_pwd = jQuery('#fedex_site_pwd').val();
		var acc_no = jQuery('#fedex_acc_no').val();
		var meter_no = jQuery('#fedex_access_key').val();
		var secret_key = jQuery('#hitshippo_fedex_rest_secret_key').val();
		var rest_api_key = jQuery('#hitshippo_fedex_rest_api_key').val();
		var rest_acco = jQuery('#hitshippo_fedex_rest_acc_no').val();
		var shipper_name = jQuery('#fedex_shipper_name').val();
        var shipper_company = jQuery('#fedex_company').val();
        var mob_no = jQuery('#fedex_mob_num').val();
        var email_address = jQuery('#fedex_email').val();
        var shipper_address = jQuery('#fedex_address1').val();
        var shipper_city = jQuery('#fedex_city').val();
        var shipper_state = jQuery('#fedex_state').val();
        var shipper_zip = jQuery('#fedex_zip').val();
		var shipo_mail = jQuery('#shipo_mail').val();
		var shipo_password = jQuery('#shipo_password').val();
		var shipo_intergration = jQuery('#shipo_intergration').val();

		if(key == 'SOAP'){
					if(site_id == ''){
						alert('FedEx Web Service Key is empty');
						return false;
					}
					if(site_pwd == ''){
						alert('Fedex Web Service Password is empty');
						return false;
					}
					if(acc_no == ''){
						alert('Fedex Account Number is empty');
						return false;
					}
					if(meter_no == ''){
						alert('Fedex Meter Number is empty');
						return false;
					}
			}else{
				if(secret_key == ''){
						alert('Fedex Secret key is empty');
						return false;
					}
					if(rest_api_key == ''){
						alert('Fedex API key is empty');
						return false;
					}
					if(rest_acco == ''){
						alert('Fedex REST a API Account number is empty');
						return false;
					}
			}

			if(shipper_name == ''){
                alert('Shipper Name is empty');
                return false;
            }
            if(shipper_company == ''){
                alert('Company Name is empty');
                return false;
            }
            if(mob_no == ''){
                alert('Shipper Mobile / Contact Number is empty');
                return false;
            }
            if(email_address == ''){
                alert('Email Address of the Shipper is empty');
                return false;
            }
            if(shipper_address == ''){
                alert('Address Line 1 is empty');
                return false;
            }
            if(shipper_city == ''){
                alert('City of the Shipper from address is empty');
                return false;
            }
            if(shipper_state == ''){
                alert('State of the Shipper from address is empty');
                return false;
            }
            if(shipper_zip == ''){
                alert('Postal/Zip Code is empty');
                return false;
            }

			var link_type = jQuery("input[name='shipo_link_type']:checked").val();
			if (link_type === 'WITHOUT') {
				if(shipo_mail == ''){
						alert('Enter Shipi Email');
						return false;
					}
					if(shipo_password == ''){
						alert('Enter Shipi Password');
						return false;
					}
			} else {
				if(shipo_intergration == ''){
						alert('Enter Shipi intergtraion Key');
						return false;
					}
			}
				
   		});
		   jQuery(document).ready(function() {
			jQuery("input[name='shipo_link_type']").change(function() {
			if (jQuery(this).val() == "WITHOUT") {
				jQuery(".without_shipo_acc").show();
				jQuery(".with_shipo_acc").hide();
			} else if (jQuery(this).val() == "WITH") {
				jQuery(".without_shipo_acc").hide();
				jQuery(".with_shipo_acc").show();
			}
		});
	});
	jQuery(document).ready(function(){
		jQuery.getJSON('<?php echo plugin_dir_url( __FILE__ ); ?>/data/countries.json', function(countryData){
			var countries = countryData.Data;
			countries.forEach(function(country){
				var hitshippo_fedex_country = '<?php echo (isset($general_settings['hitshippo_fedex_country'])) ? $general_settings['hitshippo_fedex_country'] : ''; ?>';
				var option = '<option value="' + country.code + '">' + country.name + '</option>';
				if (country.code === hitshippo_fedex_country) {
					option = '<option value="' + country.code + '" selected>' + country.name + '</option>';
				}
				jQuery('#hitshippo_fedex_country').append(option);
			});

			// Load states from JSON file
			jQuery.getJSON('<?php echo plugin_dir_url( __FILE__ ); ?>/data/states.json', function(stateData){
				jQuery('#hitshippo_fedex_country').change(function(){
					var countryCode = jQuery(this).val();
					jQuery('#hitshippo_fedex_state').empty();
					var states = stateData.Data.filter(function(state){
						return state.country === countryCode;
					});
					states.forEach(function(state){
						var stateCode = state.code.split('-')[1].substring(0, 2); // Get the part after the hyphen
						var hitshippo_fedex_state = '<?php echo (isset($general_settings['hitshippo_fedex_state'])) ? $general_settings['hitshippo_fedex_state'] : ''; ?>';
						var option = '<option value="' + stateCode + '">' + state.name + '</option>';
						if (stateCode === hitshippo_fedex_state) {
							option = '<option value="' + stateCode + '" selected>' + state.name + '</option>';
						}
						jQuery('#hitshippo_fedex_state').append(option);
					});
				}).change(); // Trigger change event to populate states on page load
			});
			
		});
	});

	</script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
	var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
	(function(){
	var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
	s1.async=true;
	s1.src='https://embed.tawk.to/671925bb4304e3196ad6b676/1iat3mpss';
	s1.charset='UTF-8';
	s1.setAttribute('crossorigin','*');
	s0.parentNode.insertBefore(s1,s0);
	})();
</script>
<!--End of Tawk.to Script-->