<?php

if ( !defined( 'ABSPATH' ) ) {
    exit;
    // Exit if accessed directly
}
/**
 * Start: Settings tab
 **/
// from: https://www.speakinginbytes.com/2014/07/woocommerce-settings-tab/
class WCPTI_Settings_Tab {
    /**
     * Bootstraps the class and hooks required actions & filters.
     *
     */
    public static function init() {
        add_filter( 'woocommerce_settings_tabs_array', __CLASS__ . '::add_settings_tab', 50 );
        add_action( 'woocommerce_settings_tabs_wcpti_settings_tab', __CLASS__ . '::settings_tab' );
        // the first parameter is a concatenated field…
        add_action( 'woocommerce_update_options_wcpti_settings_tab', __CLASS__ . '::update_settings' );
        // the first parameter is a concatenated field…
    }

    /**
     * Add a new settings tab to the WooCommerce settings tabs array.
     *
     * @param array $settings_tabs Array of WooCommerce setting tabs & their labels, excluding the Subscription tab.
     * @return array $settings_tabs Array of WooCommerce setting tabs & their labels, including the Subscription tab.
     */
    public static function add_settings_tab( $settings_tabs ) {
        $settings_tabs['wcpti_settings_tab'] = __( 'Gyta BuyBack', 'wcpti-settings-tab' );
        return $settings_tabs;
    }

    /**
     * Uses the WooCommerce admin fields API to output settings via the @see woocommerce_admin_fields() function.
     *
     * @uses woocommerce_admin_fields()
     * @uses self::get_settings()
     */
    public static function settings_tab() {
        woocommerce_admin_fields( self::get_settings() );
    }

    /**
     * Uses the WooCommerce options API to save settings via the @see woocommerce_update_options() function.
     *
     * @uses woocommerce_update_options()
     * @uses self::get_settings()
     */
    public static function update_settings() {
        woocommerce_update_options( self::get_settings() );
    }

    /**
     * Get all the settings for this plugin for @see woocommerce_admin_fields() function.
     *
     * @return array Array of settings for @see woocommerce_admin_fields() function.
     */
    public static function get_settings() {
        // https://www.easypost.com/service-levels-and-parcels
        $easypost_service_levels = array();
        $easypost_service_levels['usps.ParcelSelect'] = "USPS - ParcelSelect";
        $easypost_service_levels['usps.Priority'] = "USPS - Priority";
        $easypost_service_levels['usps.Express'] = "USPS - Express";
        $easypost_service_levels['ups.Ground'] = "UPS - Ground";
        $easypost_service_levels['ups.UPSStandard'] = "UPS - UPSStandard";
        $easypost_service_levels['ups.UPSSaver'] = "UPS - UPSSaver";
        $easypost_service_levels['ups.Express'] = "UPS - Express";
        $easypost_service_levels['ups.ExpressPlus'] = "UPS - ExpressPlus";
        $easypost_service_levels['ups.Expedited'] = "UPS - Expedited";
        $easypost_service_levels['ups.NextDayAir'] = "UPS - NextDayAir";
        $easypost_service_levels['ups.NextDayAirSaver'] = "UPS - NextDayAirSaver";
        $easypost_service_levels['ups.2ndDayAir'] = "UPS - 2ndDayAir";
        $easypost_service_levels['ups.3DaySelect'] = "UPS - 3DaySelect";
        $easypost_service_levels['fedex.FEDEX_GROUND'] = "FedEx - FEDEX_GROUND";
        $easypost_service_levels['fedex.FEDEX_2_DAY'] = "FedEx - FEDEX_2_DAY";
        $easypost_service_levels['fedex.FEDEX_EXPRESS_SAVER'] = "FedEx - FEDEX_EXPRESS_SAVER";
        $easypost_service_levels['fedex.STANDARD_OVERNIGHT'] = "FedEx - STANDARD_OVERNIGHT";
        $easypost_service_levels['fedex.GROUND_HOME_DELIVERY'] = "FedEx - GROUND_HOME_DELIVERY";
        $easypost_service_levels['AustraliaPost.ExpressPost'] = "AustraliaPost - ExpressPost";
        $easypost_service_levels['AustraliaPost.ParcelPost'] = "AustraliaPost - ParcelPost";
        $easypost_service_levels['AustraliaPost.ParcelPostExtra'] = "AustraliaPost - ParcelPostExtra";
        $easypost_service_levels['canadapost.RegularParcel'] = "CanadaPost - RegularParcel";
        $easypost_service_levels['canadapost.ExpeditedParcel'] = "CanadaPost - ExpeditedParcel";
        $easypost_service_levels['canadapost.Xpresspost'] = "CanadaPost - Xpresspost";
        $easypost_service_levels['canadapost.XpresspostCertified'] = "CanadaPost - XpresspostCertified";
        $easypost_service_levels['canadapost.Priority'] = "CanadaPost - Priority";
        $easypost_service_levels['canadapost.Priority'] = "CanadaPost - Priority";
        $easypost_service_levels['DeutschePost.PacketPlus'] = "DeutschePost - PacketPlus";
        $easypost_service_levels['DHLExpress.BreakBulkEconomy'] = "DHL Express - BreakBulkEconomy";
        $easypost_service_levels['DHLExpress.BreakBulkExpress'] = "DHL Express - BreakBulkExpress";
        $easypost_service_levels['DHLExpress.DomesticEconomySelect'] = "DHL Express - DomesticEconomySelect";
        $easypost_service_levels['DHLExpress.DomesticExpress'] = "DHL Express - DomesticExpress";
        $easypost_service_levels['DHLExpress.DomesticExpress1030'] = "DHL Express - DomesticExpress1030";
        $easypost_service_levels['DHLExpress.DomesticExpress1200'] = "DHL Express - DomesticExpress1200";
        $easypost_service_levels['DHLExpress.EconomySelect'] = "DHL Express - EconomySelect";
        $easypost_service_levels['DHLExpress.EconomySelectNonDoc'] = "DHL Express - EconomySelectNonDoc";
        $easypost_service_levels['DHLExpress.EuroPack'] = "DHL Express - EuroPack";
        $easypost_service_levels['DHLExpress.EuropackNonDoc'] = "DHL Express - EuropackNonDoc";
        $easypost_service_levels['DHLExpress.Express1030'] = "DHL Express - Express1030";
        $easypost_service_levels['DHLExpress.Express1030NonDoc'] = "DHL Express - Express1030NonDoc";
        $easypost_service_levels['DHLExpress.Express1200NonDoc'] = "DHL Express - Express1200NonDoc";
        $easypost_service_levels['DHLExpress.Express1200'] = "DHL Express - Express1200";
        $easypost_service_levels['DHLExpress.Express900'] = "DHL Express - Express900";
        $easypost_service_levels['DHLExpress.Express900NonDoc'] = "DHL Express - Express900NonDoc";
        $easypost_service_levels['DHLExpress.ExpressEasy'] = "DHL Express - ExpressEasy";
        $easypost_service_levels['DHLExpress.ExpressEasyNonDoc'] = "DHL Express - ExpressEasyNonDoc";
        $easypost_service_levels['DHLExpress.ExpressEnvelope'] = "DHL Express - ExpressEnvelope";
        $easypost_service_levels['DHLExpress.ExpressWorldwide'] = "DHL Express - ExpressWorldwide";
        $easypost_service_levels['DHLExpress.LogisticsServices'] = "DHL Express - LogisticsServices";
        $easypost_service_levels['DHLExpress.SameDay'] = "DHL Express - SameDay";
        $easypost_service_levels['DHLExpress.SecureLine'] = "DHL Express - SecureLine";
        $easypost_service_levels['DHLExpress.SprintLine'] = "DHL Express - SprintLine";
        $easypost_service_levels['DhlEcs.DHLParcelExpedited'] = "DHL eCommerce Solutions - DHLParcelExpedited";
        $easypost_service_levels['DhlEcs.DHLParcelExpeditedMax'] = "DHL eCommerce Solutions - DHLParcelExpeditedMax";
        $easypost_service_levels['DhlEcs.DHLParcelGround'] = "DHL eCommerce Solutions - DHLParcelGround";
        $easypost_service_levels['DhlEcs.DHLBPMExpedited'] = "DHL eCommerce Solutions - DHLBPMExpedited";
        $easypost_service_levels['DhlEcs.DHLBPMGround'] = "DHL eCommerce Solutions - DHLBPMGround";
        $easypost_service_levels['DhlEcs.DHLParcelInternationalDirect'] = "DHL eCommerce Solutions - DHLParcelInternationalDirect";
        $easypost_service_levels['DhlEcs.DHLParcelInternationalStandard'] = "DHL eCommerce Solutions - DHLParcelInternationalStandard";
        $easypost_service_levels['DhlEcs.DHLPacketInternational'] = "DHL eCommerce Solutions - DHLPacketInternational";
        $easypost_service_levels['DhlEcs.DHLParcelInternationalDirectPriority'] = "DHL eCommerce Solutions - DHLParcelInternationalDirectPriority";
        $easypost_service_levels['DhlEcs.DHLParcelInternationalDirectStandard'] = "DHL eCommerce Solutions - DHLParcelInternationalDirectStandard";
        $easypost_service_levels['DPD.DPDCLASSIC'] = "DPD - DPDCLASSIC";
        $easypost_service_levels['DPD.DPDEXPRESS'] = "DPD - DPDEXPRESS";
        $easypost_service_levels['DPD.DPDPARCELLETTER'] = "DPD - DPDPARCELLETTER";
        $easypost_service_levels['DPD.DPDPARCELLETTERPLUS'] = "DPD - DPDPARCELLETTERPLUS";
        $easypost_service_levels['DPD.DPDINTERNATIONALMAIL'] = "DPD - DPDINTERNATIONALMAIL";
        $easypost_service_levels['Estafeta.NextDay'] = "Estafeta - NextDay";
        $easypost_service_levels['Estafeta.Ground'] = "Estafeta - Ground";
        $easypost_service_levels['Estafeta.TwoDay'] = "Estafeta - TwoDay";
        $easypost_service_levels['royalmail.1stClass'] = "RoyalMail - 1stClass";
        $easypost_service_levels['royalmail.1stClassSignedFor'] = "RoyalMail - 1stClassSignedFor";
        $easypost_service_levels['royalmail.2ndClass'] = "RoyalMail - 2ndClass";
        $easypost_service_levels['royalmail.2ndClassSignedFor'] = "RoyalMail - 2ndClassSignedFor";
        $easypost_service_levels['royalmail.RoyalMail24'] = "RoyalMail - RoyalMail24";
        $easypost_service_levels['royalmail.RoyalMail24SignedFor'] = "RoyalMail - RoyalMail24SignedFor";
        $easypost_service_levels['royalmail.RoyalMail48'] = "RoyalMail - RoyalMail48";
        $easypost_service_levels['royalmail.RoyalMail48SignedFor'] = "RoyalMail - RoyalMail48SignedFor";
        $easypost_service_levels['royalmail.SpecialDeliveryGuaranteed1pm'] = "RoyalMail - SpecialDeliveryGuaranteed1pm";
        $easypost_service_levels['royalmail.SpecialDeliveryGuaranteed9am'] = "RoyalMail - SpecialDeliveryGuaranteed9am";
        $easypost_service_levels['royalmail.StandardLetter1stClass'] = "RoyalMail - StandardLetter1stClass";
        $easypost_service_levels['royalmail.StandardLetter1stClassSignedFor'] = "RoyalMail - StandardLetter1stClassSignedFor";
        $easypost_service_levels['royalmail.StandardLetter2ndClass'] = "RoyalMail - StandardLetter2ndClass";
        $easypost_service_levels['royalmail.StandardLetter2ndClassSignedFor'] = "RoyalMail - StandardLetter2ndClassSignedFor";
        $easypost_service_levels['royalmail.Tracked24'] = "RoyalMail - Tracked24";
        $easypost_service_levels['royalmail.Tracked24Signature'] = "RoyalMail - Tracked24Signature";
        $easypost_service_levels['royalmail.Tracked48'] = "RoyalMail - Tracked48";
        $easypost_service_levels['royalmail.Tracked48Signature'] = "RoyalMail - Tracked48Signature";
        $parcelforce_services = array(
            'Express9',
            'Express9Secure',
            'Express9CourierPack',
            'Express10',
            'Express10Secure',
            'Express10Exchange',
            'Express10SecureExchange',
            'Express10CourierPack',
            'ExpressAM',
            'ExpressAMSecure',
            'ExpressAMExchange',
            'ExpressAMSecureExchange',
            'ExpressAMCourierPack',
            'ExpressPM',
            'ExpressPMSecure',
            'Express24',
            'Express24Large',
            'Express24Secure',
            'Express24Exchange',
            'Express24SecureExchange',
            'Express24CourierPack',
            'Express48',
            'Express48Large',
            'ParcelRiderPlus',
            'GlobalBulkDirect',
            'GlobalExpress',
            'GlobalExpressEnvelopeDelivery',
            'GlobalExpressPackDelivery',
            'GlobalValue',
            'GlobalPriority',
            'GlobalPriorityReturns',
            'EuroPriorityHome',
            'EuroPriorityBusiness',
            'IrelandExpress'
        );
        foreach ( $parcelforce_services as $service_level ) {
            $key = 'parcelforce.' . $service_level;
            $easypost_service_levels[$key] = "Parcelforce - " . $service_level;
        }
        // interlinkexpress
        $interlinkexpress_levels = array(
            'InterlinkAirClassicInternationalAir',
            'InterlinkAirExpressInternationalAir',
            'InterlinkExpresspak1By10:30',
            'InterlinkExpresspak1By12',
            'InterlinkExpresspak1NextDay',
            'InterlinkExpresspak1Saturday',
            'InterlinkExpresspak1SaturdayBy10:30',
            'InterlinkExpresspak1SaturdayBy12',
            'InterlinkExpresspak1Sunday',
            'InterlinkExpresspak1SundayBy12',
            'InterlinkExpresspak5By10',
            'InterlinkExpresspak5By10:30',
            'InterlinkExpresspak5By12',
            'InterlinkExpresspak5NextDay',
            'InterlinkExpresspak5Saturday',
            'InterlinkExpresspak5SaturdayBy10',
            'InterlinkExpresspak5SaturdayBy10:30',
            'InterlinkExpresspak5SaturdayBy12',
            'InterlinkExpresspak5Sunday',
            'InterlinkExpresspak5SundayBy12',
            'InterlinkFreightBy10',
            'InterlinkFreightBy12',
            'InterlinkFreightNextDay',
            'InterlinkFreightSaturday',
            'InterlinkFreightSaturdayBy10',
            'InterlinkFreightSaturdayBy12',
            'InterlinkFreightSunday',
            'InterlinkFreightSundayBy12',
            'InterlinkParcelBy10',
            'InterlinkParcelBy10:30',
            'InterlinkParcelBy12',
            'InterlinkParcelDpdEuropeByRoad',
            'InterlinkParcelNextDay',
            'InterlinkParcelReturn',
            'InterlinkParcelReturnToShop',
            'InterlinkParcelSaturday',
            'InterlinkParcelSaturdayBy10',
            'InterlinkParcelSaturdayBy10:30',
            'InterlinkParcelSaturdayBy12',
            'InterlinkParcelShipToShop',
            'InterlinkParcelSunday',
            'InterlinkParcelSundayBy12',
            'InterlinkParcelTwoDay',
            'InterlinkPickupParcelDpdEuropeByRoad'
        );
        foreach ( $interlinkexpress_levels as $service_level ) {
            $key = 'interlinkexpress.' . $service_level;
            $easypost_service_levels[$key] = "Interlink Express - " . $service_level;
        }
        asort( $easypost_service_levels );
        $activation_date = get_option( '_wcpti_settings_activation_date' );
        $settings = array();
        $settings[] = array(
            'name' => __( 'Gyta BuyBack Settings', 'wcpti-settings-tab' ),
            'type' => 'title',
            'desc' => 'Please carefully utilize all of the settings below',
            'id'   => 'wcpti_settings_tab_section_title_ptis',
        );
        $settings[] = array(
            'type' => 'sectionend',
            'id'   => 'wcpti_settings_tab_section_header_end',
        );
        $settings[] = array(
            'name' => __( 'Mailing Address', 'wcpti-settings-tab' ),
            'type' => 'title',
            'desc' => 'Where do you want the products you\'re buying to be mailed to?',
            'id'   => 'wcpti_settings_tab_section_title_mailing_address',
        );
        $settings[] = array(
            'name' => __( 'Company Name', 'wcpti-settings-tab' ),
            'type' => 'text',
            'id'   => 'wcpti_settings_company_name',
        );
        $settings[] = array(
            'name' => __( 'Name', 'wcpti-settings-tab' ),
            'type' => 'text',
            'desc' => __( 'Optional', 'wcpti-settings-tab' ),
            'id'   => 'wcpti_settings_shipping_name',
        );
        $settings[] = array(
            'name' => __( 'Address Line 1', 'wcpti-settings-tab' ),
            'type' => 'text',
            'id'   => 'wcpti_settings_address_1',
        );
        $settings[] = array(
            'name' => __( 'Address Line 2', 'wcpti-settings-tab' ),
            'type' => 'text',
            'desc' => __( 'Optional', 'wcpti-settings-tab' ),
            'id'   => 'wcpti_settings_address_2',
        );
        $settings[] = array(
            'name' => __( 'Town/City', 'wcpti-settings-tab' ),
            'type' => 'text',
            'id'   => 'wcpti_settings_city',
        );
        $settings[] = array(
            'name' => __( 'State or Province Abbreviation, or County if in the UK', 'wcpti-settings-tab' ),
            'type' => 'text',
            'id'   => 'wcpti_settings_state',
        );
        $settings[] = array(
            'name' => __( 'Postal Code', 'wcpti-settings-tab' ),
            'type' => 'text',
            'id'   => 'wcpti_settings_postal_code',
        );
        $settings[] = array(
            'name'    => __( 'Country', 'wcpti-settings-tab' ),
            'type'    => 'select',
            'options' => array(
                'US' => "United States",
                'AT' => 'Australia',
                "CA" => "Canada",
                "DE" => 'Germany',
                'ES' => 'Spain',
                'MX' => 'Mexico',
                "GB" => 'United Kingdom',
            ),
            'id'      => 'wcpti_settings_country',
        );
        $settings[] = array(
            'name' => __( 'Phone Number', 'wcpti-settings-tab' ),
            'type' => 'text',
            'id'   => 'wcpti_settings_shipping_phone_number',
        );
        $settings[] = array(
            'type' => 'sectionend',
            'id'   => 'wcpti_settings_tab_section_1_end',
        );
        $settings[] = array(
            'name' => __( 'Checkout Options', 'wcpti-settings-tab' ),
            'type' => 'title',
            'desc' => 'Clean up and modify the WooCommerce default checkout options to make it more buyback friendly',
            'id'   => 'wcpti_settings_tab_section_title_checkout_options',
        );
        $settings[] = array(
            'name'     => __( 'Billing details replacement', 'wcpti-settings-tab' ),
            'type'     => 'checkbox',
            'desc'     => __( 'Change "Billing details" and "Billing & Shipping" to "Contact Information"', 'wcpti-settings-tab' ),
            'desc_tip' => __( 'WooCommerce assumes you are selling a product instead of buying one.  This fixes a visual issue in the checkout process.', 'wcpti-settings-tab' ),
            'id'       => 'wcpti_settings_billing_details_display_change',
            'default'  => 'yes',
        );
        $settings[] = array(
            'name'     => __( 'Remove Company Name', 'wcpti-settings-tab' ),
            'type'     => 'checkbox',
            'desc'     => __( 'Remove the "Company Name" input from Contact Information when checking out', 'wcpti-settings-tab' ),
            'desc_tip' => __( 'One less field helps smooth out the checkout process.', 'wcpti-settings-tab' ),
            'id'       => 'wcpti_settings_billing_details_remove_company_name',
            'default'  => 'yes',
        );
        $settings[] = array(
            'name'     => __( 'Customer Order Approval', 'wcpti-settings-tab' ),
            'type'     => 'checkbox',
            'desc'     => __( 'Require customers to approve received order changes before payment is processed', 'wcpti-settings-tab' ),
            'desc_tip' => __( 'Best for businesses doing bulk or PO-based buybacks where changes to the order after receiving are common.', 'wcpti-settings-tab' ),
            'id'       => 'wcpti_customer_order_approval_required',
            'default'  => 'no',
        );
        /*
        array(
        	'name' => __( 'Cart Shipping To Address', 'wcpti-settings-tab' ),
        	'type' => 'checkbox',
        	//'options' => array('US'=>"United States", "CA"=>"Canada"),
        	'desc' => __( 'Remove the "Shipping to" and address display from the cart summary when checking out', 'wcpti-settings-tab' ),
        	'desc_tip'  => __( 'Cleans up the display since showing the customer their own address is not relevant to buybacks.', 'wcpti-settings-tab' ),
        	'id'   => 'wcpti_settings_remove_shipping_to_and_address',
        ),
        */
        /*
        array(
        	'name' => __( 'Remove Ship To', 'wcpti-settings-tab' ),
        	'type' => 'checkbox',
        	//'options' => array('US'=>"United States", "CA"=>"Canada"),
        	'desc' => __( 'Remove the "Ship to a different address?" input when checking out', 'wcpti-settings-tab' ),
        	'desc_tip'  => __( 'No need for a shipping address from the customer since you are not shipping items to them.', 'wcpti-settings-tab' ),
        	'id'   => 'wcpti_settings_remove_ship_to',
        ),
        */
        $settings[] = array(
            'type' => 'sectionend',
            'id'   => 'wcpti_settings_tab_section_2_end',
        );
        $settings[] = array(
            'name' => __( 'Variable Product Fields', 'wcpti-settings-tab' ),
            'type' => 'title',
            'desc' => 'Hide various fields in the product-variations administration screen to make it easier to set up and changes prices.  This section is only available for premium users.  Upgrade now!',
            'id'   => 'wcpti_settings_tab_variable_product_options',
        );
        $settings[] = array(
            'type' => 'sectionend',
            'id'   => 'wcpti_settings_tab_variable_product_options_end',
        );
        $settings[] = array(
            'name' => __( 'EasyPost', 'wcpti-settings-tab' ),
            'type' => 'title',
            'desc' => 'Use EasyPost to handle shipping label generation',
            'id'   => 'wcpti_settings_tab_section_title_easypost_options',
        );
        // mode is determined by the API key, shouldn't be based on selection here (EasyPost API doesn't line up with how they're distributing API keys)
        /*
        array(
        	'name' => __( 'Mode', 'wcpti-settings-tab' ),
        	'type' => 'select',
        	'options' => array('production'=>"Production", "test"=>"Test"),
        	'desc' => __( 'Test mode will not charge shipping or generate valid shipping labels, but will allow for testing of the process.', 'wcpti-settings-tab' ),
        	'id'   => 'wcpti_settings_easypost_mode',
        ),
        */
        $settings[] = array(
            'name' => __( 'API Key', 'wcpti-settings-tab' ),
            'type' => 'text',
            'desc' => __( 'In your EasyPost account, click on your account name in the left navigation and go to "API Keys"', 'wcpti-settings-tab' ),
            'id'   => 'wcpti_settings_easypost_api_key',
        );
        $settings[] = array(
            'name'    => __( 'Preferred Shipping Service', 'wcpti-settings-tab' ),
            'type'    => 'select',
            'options' => $easypost_service_levels,
            'desc'    => __( 'Selected your preferred shipping service.  If it is unavailable, the system will choose the least expensive available rate for you.', 'wcpti-settings-tab' ),
            'id'      => 'wcpti_settings_easypost_compound_carrier_service',
        );
        $settings[] = array(
            'name'     => __( 'Skip Easypost Address Validation', 'wcpti-settings-tab' ),
            'type'     => 'checkbox',
            'desc'     => __( 'Disable Easypost Address Validation before creating shipping labels', 'wcpti-settings-tab' ),
            'desc_tip' => __( 'Enable this option only if you are having repeated problems with EasyPost failing address verification. Using unvalidated addresses may cause shipping label errors.', 'wcpti-settings-tab' ),
            'id'       => 'wcpti_settings_easypost_skip_address_validation',
            'default'  => 'no',
        );
        $settings[] = array(
            'name'    => __( 'Royal Mail Predefined Package', 'wcpti-settings-tab' ),
            'type'    => 'select',
            'options' => [
                ''             => 'Please Select',
                'LARGELETTER'  => 'LARGELETTER',
                'SMALLPARCEL'  => 'SMALLPARCEL',
                'MEDIUMPARCEL' => 'MEDIUMPARCEL',
                'LETTER'       => 'LETTER',
                'PRINTEDPAPER' => 'PRINTEDPAPER',
            ],
            'desc'    => __( 'For Royal Mail ONLY - Select a default package size for shipping label generation', 'wcpti-settings-tab' ),
            'id'      => 'wcpti_settings_easypost_royal_mail_predefined_package_size',
        );
        $settings[] = array(
            'type' => 'sectionend',
            'id'   => 'wcpti_settings_tab_section_easypost_end',
        );
        $settings[] = array(
            'name' => __( 'Email Content', 'wcpti-settings-tab' ),
            'type' => 'title',
            'desc' => 'Additional customization to emails.',
            'id'   => 'wcpti_settings_tab_section_title_email_options',
        );
        $settings[] = array(
            'name' => __( 'Local Drop Off Instructions', 'wcpti-settings-tab' ),
            'type' => 'textarea',
            'desc' => __( 'Custom information for local drop-off customers. Default is "Thanks for your order.  Please drop off your item(s) during our normal business hours."', 'wcpti-settings-tab' ),
            'id'   => 'wcpti_settings_order_placed_local_drop_off',
        );
        $settings[] = array(
            'name' => __( 'Order Completed', 'wcpti-settings-tab' ),
            'type' => 'textarea',
            'desc' => __( 'Email sent when status is changed to "Completed".  Default is "We have finished processing your order and your payment has been sent."', 'wcpti-settings-tab' ),
            'id'   => 'wcpti_settings_order_complete_email_content',
        );
        $settings[] = array(
            'type' => 'sectionend',
            'id'   => 'wcpti_settings_tab_section_title_email_options',
        );
        return apply_filters( 'wcpti_settings_tab_settings', $settings );
    }

}

WCPTI_Settings_Tab::init();
/**
 * End: Settings tab
 **/