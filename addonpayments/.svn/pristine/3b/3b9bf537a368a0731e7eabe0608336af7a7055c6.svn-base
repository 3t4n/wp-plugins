<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

    function addonp_test_mode_field(){ ?>

     <input type="checkbox" class="js-switch-addonp_test_mode" title="<?php _e('Test Mode', 'addonpayments' ); ?>" name="addonp_test_mode_field" value="1" <?php checked(1, get_option('addonp_test_mode_field'), true); ?>/>
    <?php }

    function addonp_merchant_id_field(){ ?>
    <input title="<?php _e('Merchant ID - Live', 'addonpayments' ); ?>" type="text" name="addonp_merchant_id_field" value="<?php echo get_option('addonp_merchant_id_field'); ?>"  size="40" />
    <?php }

    function addonp_account_field(){ ?>
    <input title="<?php _e('Account - Live', 'addonpayments' ); ?>" type="text" name="addonp_account_field" value="<?php echo get_option('addonp_account_field'); ?>"  size="40" />
    <?php }

    function addonp_shared_secret_field(){ ?>
    <input title="<?php _e('Shared Secret - Live', 'addonpayments' ); ?>" type="text" name="addonp_shared_secret_field" value="<?php echo get_option('addonp_shared_secret_field'); ?>"  size="40" />
    <?php }

	function addonp_merchant_id_test_field(){ ?>
    <input title="<?php _e('Merchant ID - Test', 'addonpayments' ); ?>" type="text" name="addonp_merchant_id_test_field" value="<?php echo get_option('addonp_merchant_id_test_field'); ?>"  size="40" />
    <?php }

    function addonp_account_test_field(){ ?>
    <input title="<?php _e('Account - Test', 'addonpayments' ); ?>" type="text" name="addonp_account_test_field" value="<?php echo get_option('addonp_account_test_field'); ?>"  size="40" />
    <?php }

    function addonp_shared_secret_test_field(){ ?>
    <input title="<?php _e('Shared Secret - Test', 'addonpayments' ); ?>" type="text" name="addonp_shared_secret_test_field" value="<?php echo get_option('addonp_shared_secret_test_field'); ?>"  size="40" />
    <?php }

    function addonp_currency_field(){
        $currency_codes = array(
            'Afghani'                       => 'AFN',
            'Algerian Dinar'                => 'DZD',
            'Argentine Peso'                => 'ARS',
            'Armenian Dram'                 => 'AMD',
            'Aruban Florin'                 => 'AWG',
            'Australian Dollar'             => 'AUD',
            'Azerbaijan Manat'              => 'AZN',
            'Bahamian Dollar'               => 'BSD',
            'Bahraini Dinar'                => 'BHD',
            'Baht'                          => 'THB',
            'Balboa'                        => 'PAB',
            'Barbados Dollar'               => 'BBD',
            'Belarusian Ruble'              => 'BYN',
            'Belize Dollar'                 => 'BZD',
            'Bermudian Dollar'              => 'BMD',
            'Bolívar'                       => 'VEF',
            'Boliviano'                     => 'BOB',
            'Brazilian Real'                => 'BRL',
            'Brunei Dollar'                 => 'BND',
            'Bulgarian Lev'                 => 'BGN',
            'Burundi Franc'                 => 'BIF',
            'Cabo Verde Escudo'             => 'CVE',
            'Canadian Dollar'               => 'CAD',
            'Chilean Peso'                  => 'CLP',
            'Colombian Peso'                => 'COP',
            'Comorian Franc '               => 'KMF',
            'Congolese Franc'               => 'CDF',
            'Cordoba Oro'                   => 'NIO',
            'Costa Rican Colon'             => 'CRC',
            'Cuban Peso'                    => 'CUP',
            'Czech Koruna'                  => 'CZK',
            'Dalasi'                        => 'GMD',
            'Danish Krone'                  => 'DKK',
            'Denar'                         => 'MKD',
            'Djibouti Franc'                => 'DJF',
            'Dobra'                         => 'STD',
            'Dominican Peso'                => 'DOP',
            'Dong'                          => 'VND',
            'East Caribbean Dollar'         => 'XCD',
            'Egyptian Pound'                => 'EGP',
            'El Salvador Colon'             => 'SVC',
            'Ethiopian Birr'                => 'ETB',
            'Euro'                          => 'EUR',
            'Falkland Islands Pound'        => 'FKP',
            'Fiji Dollar'                   => 'FJD',
            'Forint'                        => 'HUF',
            'Ghana Cedi'                    => 'GHS',
            'Gibraltar Pound'               => 'GIP',
            'Gourde'                        => 'HTG',
            'Guarani'                       => 'PYG',
            'Guinean Franc'                 => 'GNF',
            'Guyana Dollar'                 => 'GYD',
            'Hong Kong Dollar'              => 'HKD',
            'Hryvnia'                       => 'UAH',
            'Iceland Krona'                 => 'ISK',
            'Indian Rupee'                  => 'INR',
            'Iranian Rial'                  => 'IRR',
            'Iraqi Dinar'                   => 'IQD',
            'Jamaican Dollar'               => 'JMD',
            'Jordanian Dinar'               => 'JOD',
            'Kenyan Shilling'               => 'KES',
            'Kina'                          => 'PGK',
            'Kuna'                          => 'HRK',
            'Kuwaiti Dinar'                 => 'KWD',
            'Kwanza'                        => 'AOA',
            'Kyat'                          => 'MMK',
            'Lao Kip'                       => 'LAK',
            'Lari'                          => 'GEL',
            'Lebanese Pound'                => 'LBP',
            'Lek'                           => 'ALL',
            'Lempira'                       => 'HNL',
            'Leone'                         => 'SLL',
            'Liberian Dollar'               => 'LRD',
            'Libyan Dinar'                  => 'LYD',
            'Lilangeni'                     => 'SZL',
            'Loti'                          => 'LSL',
            'Malagasy Ariary'               => 'MGA',
            'Malawi Kwacha'                 => 'MWK',
            'Malaysian Ringgit'             => 'MYR',
            'Mauritius Rupee'               => 'MUR',
            'Mexican Peso'                  => 'MXN',
            'Moldovan Leu'                  => 'MDL',
            'Moroccan Dirham'               => 'MAD',
            'Mozambique Metical'            => 'MZN',
            'Mvdol'                         => 'BOV',
            'Naira'                         => 'NGN',
            'Nakfa'                         => 'ERN',
            'Namibia Dollar'                => 'NAD',
            'Nepalese Rupee'                => 'NPR',
            'Netherlands Antillean Guilder' => 'ANG',
            'New Israeli Sheqel'            => 'ILS',
            'New Taiwan Dollar'             => 'TWD',
            'New Zealand Dollar'            => 'NZD',
            'Ngultrum'                      => 'BTN',
            'North Korean Won'              => 'KPW',
            'Norwegian Krone'               => 'NOK',
            'Ouguiya'                       => 'MRO',
            'Pa’anga'                       => 'TOP',
            'Pakistan Rupee'                => 'PKR',
            'Pataca'                        => 'MOP',
            'Peso Convertible'              => 'CUC',
            'Peso Uruguayo'                 => 'UYU',
            'Philippine Peso'               => 'PHP',
            'Pound Sterling'                => 'GBP',
            'Pula'                          => 'BWP',
            'Qatari Rial'                   => 'QAR',
            'Quetzal'                       => 'GTQ',
            'Rand'                          => 'ZAR',
            'Rial Omani'                    => 'OMR',
            'Riel'                          => 'KHR',
            'Romanian Leu'                  => 'RON',
            'Rufiyaa'                       => 'MVR',
            'Rupiah'                        => 'IDR',
            'Russian Ruble'                 => 'RUB',
            'Rwanda Franc'                  => 'RWF',
            'Saint Helena Pound'            => 'SHP',
            'Saudi Riyal'                   => 'SAR',
            'Serbian Dinar'                 => 'RSD',
            'Seychelles Rupee'              => 'SCR',
            'Singapore Dollar'              => 'SGD',
            'Sol'                           => 'PEN',
            'Solomon Islands Dollar'        => 'SBD',
            'Som'                           => 'KGS',
            'Somali Shilling'               => 'SOS',
            'Somoni'                        => 'TJS',
            'South Sudanese Pound'          => 'SSP',
            'Sri Lanka Rupee'               => 'LKR',
            'Sucre'                         => 'XSU',
            'Sudanese Pound'                => 'SDG',
            'Surinam Dollar'                => 'SRD',
            'Swedish Krona'                 => 'SEK',
            'Swiss Franc'                   => 'CHF',
            'Syrian Pound'                  => 'SYP',
            'Taka'                          => 'BDT',
            'Tala'                          => 'WST',
            'Tanzanian Shilling'            => 'TZS',
            'Tenge'                         => 'KZT',
            'Trinidad and Tobago Dollar'    => 'TTD',
            'Tugrik'                        => 'MNT',
            'Tunisian Dinar'                => 'TND',
            'Turkish Lira'                  => 'TRY',
            'Turkmenistan New Manat'        => 'TMT',
            'UAE Dirham'                    => 'AED',
            'Uganda Shilling'               => 'UGX',
            'Unidad de Fomento'             => 'CLF',
            'Unidad de Valor Real'          => 'COU',
            'US Dollar'                     => 'USD',
            'Uzbekistan Sum'                => 'UZS',
            'Vatu'                          => 'VUV',
            'Won'                           => 'KRW',
            'Yemeni Rial'                   => 'YER',
            'Yen'                           => 'JPY',
            'Yuan Renminbi'                 => 'CNY',
            'Zambian Kwacha'                => 'ZMW',
            'Zimbabwe Dollar'               => 'ZWL',
            'Zloty'                         => 'PLN'
        );
    $option = get_option( 'addonp_currency_field' );
    ?>
       <select id="addonp_currency_field" name="addonp_currency_field" class="js-currency-list">
           <?php
           foreach ( $currency_codes as $currency => $code ) { ?>
                <option value="<?php echo $code; ?>" <?php if ( $option == $code ) echo ' selected'; ?>><?php echo $currency; ?></option>
            <?php } ?>
        </select>
    <?php   }

    function addonp_auto_set_flag_field(){
    $option = get_option( 'addonp_auto_set_flag_field' );
    ?>
       <select id="addonp_auto_set_flag_field" name="addonp_auto_set_flag_field">
           <option value="0" <?php if ( $option == '0') echo ' selected'; ?>>0</option>
           <option value="1" <?php if ( $option == '1') echo ' selected'; ?>>1</option>

        </select>
    <?php   }


    function display_addonp_basic_settings_panel_fields(){

    add_settings_section( 'addonp-basic-settings-section', NULL, NULL, 'addonp-basic-settings-options' );

    add_settings_field( 'addonp_test_mode_field', __('Test Mode', 'addonpayments'), 'addonp_test_mode_field', 'addonp-basic-settings-options', 'addonp-basic-settings-section' );
    add_settings_field( 'addonp_merchant_id_field', __('Merchand ID - Live', 'addonpayments'), 'addonp_merchant_id_field', 'addonp-basic-settings-options', 'addonp-basic-settings-section' );
    add_settings_field( 'addonp_account_field', __('Account - Live', 'addonpayments'), 'addonp_account_field', 'addonp-basic-settings-options', 'addonp-basic-settings-section' );
    add_settings_field( 'addonp_shared_secret_field', __('Shared Secret - Live', 'addonpayments'), 'addonp_shared_secret_field', 'addonp-basic-settings-options', 'addonp-basic-settings-section' );
    add_settings_field( 'addonp_merchant_id_test_field', __('Merchand ID - Test', 'addonpayments'), 'addonp_merchant_id_test_field', 'addonp-basic-settings-options', 'addonp-basic-settings-section' );
    add_settings_field( 'addonp_account_test_field', __('Account - Test', 'addonpayments'), 'addonp_account_test_field', 'addonp-basic-settings-options', 'addonp-basic-settings-section' );
    add_settings_field( 'addonp_shared_secret_test_field', __('Shared Secret - Test', 'addonpayments'), 'addonp_shared_secret_test_field', 'addonp-basic-settings-options', 'addonp-basic-settings-section' );
    add_settings_field( 'addonp_currency_field', __('Currency', 'addonpayments'), 'addonp_currency_field', 'addonp-basic-settings-options', 'addonp-basic-settings-section' );
    add_settings_field( 'addonp_auto_set_flag_field', __('AUTO SETTLE FLAG', 'addonpayments'), 'addonp_auto_set_flag_field', 'addonp-basic-settings-options', 'addonp-basic-settings-section' );

    // register all setings
    register_setting('addonp-basic-settings-section', 'addonp_test_mode_field' );
    register_setting('addonp-basic-settings-section', 'addonp_merchant_id_field' );
    register_setting('addonp-basic-settings-section', 'addonp_account_field' );
    register_setting('addonp-basic-settings-section', 'addonp_shared_secret_field' );
    register_setting('addonp-basic-settings-section', 'addonp_merchant_id_test_field' );
    register_setting('addonp-basic-settings-section', 'addonp_account_test_field' );
    register_setting('addonp-basic-settings-section', 'addonp_shared_secret_test_field' );
    register_setting('addonp-basic-settings-section', 'addonp_currency_field' );
    register_setting('addonp-basic-settings-section', 'addonp_auto_set_flag_field' );

    }

    add_action('admin_init', 'display_addonp_basic_settings_panel_fields');