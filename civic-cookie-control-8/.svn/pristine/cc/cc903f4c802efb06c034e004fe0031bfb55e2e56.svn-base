<?php

class CCC_Cookie_Control_Admin_Dependencies_v8{

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
     * @param      string $plugin_name       The name of the plugin.
     * @param      string $version    The version of this plugin.
     */
    public function __construct( $plugin_name, $version ) {

        $this->plugin_name = $plugin_name;
        $this->version     = $version;

    }


    function ccc_cookiecontrol_settings_defaults()
    {
// defaults
        $ccc_def_cookiecontrol_logConsent = 'false';
        $ccc_cookiecontrol_encodeCookie = 'false';
        $ccc_cookiecontrol_subDomains = 'true';
        $ccc_def_cookiecontrol_initialState = 'CLOSED';
        $ccc_def_cookiecontrol_notifyOnce = 'false';
        $ccc_def_cookiecontrol_position = 'RIGHT';
        $ccc_def_cookiecontrol_theme = 'DARK';
        $ccc_def_cookiecontrol_layout = 'SLIDEOUT';
        $ccc_def_cookiecontrol_toggleType = 'slider';
        $ccc_def_cookiecontrol_closeStyle = 'icon';
        $ccc_def_cookiecontrol_settingsStyle = 'button';
        $ccc_def_cookiecontrol_expiry = 90;

        $ccc_def_cookiecontrol_fontColor = '#fff';
        $ccc_def_cookiecontrol_fontFamily = 'Arial,sans-serif';
        $ccc_def_cookiecontrol_fontSizeTitle = '1.2';
        $ccc_def_cookiecontrol_fontSizeHeaders = '1';
        $ccc_def_cookiecontrol_fontSize = '0.8';
        $ccc_def_cookiecontrol_backgroundColor = '#313147';
        $ccc_def_cookiecontrol_toggleText = '#fff';
        $ccc_def_cookiecontrol_toggleColor = '#2f2f5f';
        $ccc_def_cookiecontrol_toggleBackground = '#111125';
        $ccc_def_cookiecontrol_buttonIcon = null;
        $ccc_def_cookiecontrol_buttonIconWidth = '64';
        $ccc_def_cookiecontrol_buttonIconHeight = '64';
        $ccc_def_cookiecontrol_removeIcon = 'false';
        $ccc_def_cookiecontrol_removeAbout = 'false';
        $ccc_def_cookiecontrol_alertText = '#fff';
        $ccc_def_cookiecontrol_alertBackground = '#111125';
        $ccc_def_cookiecontrol_acceptTextColor = '#ffffff';
        $ccc_def_cookiecontrol_acceptBackground = '#111125';

        $ccc_def_cookiecontrol_titleText = 'This site uses cookies';
        $ccc_def_cookiecontrol_introText = 'Some of these cookies are essential, while others help us to improve your experience by providing insights into how the site is being used.';
        $ccc_def_cookiecontrol_privacyURL = '';
        $ccc_def_cookiecontrol_privacyName = '';
        $ccc_def_cookiecontrol_privacyDescription = '';
        $ccc_def_cookiecontrol_privacyUpdateDate = '';
        $ccc_def_cookiecontrol_necessaryTitle = 'Necessary Cookies';
        $ccc_def_cookiecontrol_necessaryDescription = 'Necessary cookies enable core functionality. The website cannot function properly without these cookies, and can only be disabled by changing your browser preferences.';
        $ccc_def_cookiecontrol_thirdPartyTitle = 'Warning: Some cookies require your attention';
        $ccc_def_cookiecontrol_thirdPartyDescription = 'Consent for the following cookies could not be automatically revoked. Please follow the link(s) below to opt out manually.';
        $ccc_def_cookiecontrol_offText = 'Off';
        $ccc_def_cookiecontrol_onText = 'On';
        $ccc_def_cookiecontrol_acceptText = 'Accept';
        $ccc_def_cookiecontrol_settingsText = 'Cookie Preferences';
        $ccc_def_cookiecontrol_notifyTitle = 'Your choice regarding cookies on this site';
        $ccc_def_cookiecontrol_notifyDescription = 'We use cookies to optimise site functionality and give you the best possible experience.';
        $ccc_def_cookiecontrol_acceptRecommended = 'Accept Recommended Settings';
        $ccc_def_cookiecontrol_rejectButton = 'false';
        $ccc_def_cookiecontrol_reject = 'Reject';
        $ccc_def_cookiecontrol_rejectSettings = 'Reject All';
        $ccc_def_cookiecontrol_closeLabel = 'Close';
        $ccc_def_cookiecontrol_accessibilityAlert = 'This site uses cookies to store information. Press accesskey C to learn more about your options.';

        $ccc_def_cookiecontrol_accessKey = 'C';
        $ccc_def_cookiecontrol_highlightFocus = 'false';
        $ccc_def_cookiecontrol_iabCMP = 'false';
        $ccc_def_cookiecontrol_language = 'en';
        $ccc_def_gdprAppliesGlobally = 'true';
        $ccc_def_RecommendedState1 = 'false';
        $ccc_def_RecommendedState2 = 'false';
        $ccc_def_RecommendedState3 = 'false';
        $ccc_def_RecommendedState4 = 'false';
        $ccc_def_RecommendedState5 = 'false';

        $ccc_def_cookiecontrol_iabLabel = 'Ad Vendors';
        $ccc_def_cookiecontrol_iabDescription = 'When you visit our site, pre-selected companies may access and use certain information on your device to serve relevant ads or personalised content. Certain partners rely on your consent while others require you to opt-out.';

        $ccc_def_cookiecontrol_iabConfigure = 'Configure Ad Vendors';
        $ccc_def_cookiecontrol_iabPanelTitle = 'Ad Vendors : What information is collected and how it may be used';
        $ccc_def_cookiecontrol_iabPanelIntro = 'We and select companies may access information such as the device, operating system and type of browser your using; cookie information and information about your activity on that device, including web pages and mobile apps visited or used, along with the the IP address and associated geographic location of the device when it accesses a website or mobile application.';
        $ccc_def_cookiecontrol_iabAboutIab = 'You may control how this information is used by signaling your consent to the following purposes outlined by';
        $ccc_def_cookiecontrol_iabIabName = 'IAB Europe';
        $ccc_def_cookiecontrol_iabIabLink = 'https://advertisingconsent.eu/';
        $ccc_def_cookiecontrol_iabPanelBack = 'Back to All Categories';
        $ccc_def_cookiecontrol_iabVendorTitle = 'Ad Vendors';
        $ccc_def_cookiecontrol_iabVendorConfigure = 'Show Ad Vendors';
        $ccc_def_cookiecontrol_iabVendorBack = 'Back to Ad Vendor Purposes';
        $ccc_def_cookiecontrol_iabAcceptAll = 'Accept All';
        $ccc_def_cookiecontrol_iabRejectAll = 'Reject All';
        $ccc_def_cookiecontrol_iabBack = 'Back';


// define defaults
        $ccc_cookiecontrol_defaults = apply_filters(
            'cookiecontrol_defaults',
            array(
                'logConsent' => $ccc_def_cookiecontrol_logConsent,
                'subDomains' => $ccc_cookiecontrol_subDomains,
                'encodeCookie' => $ccc_cookiecontrol_encodeCookie,
                'notifyOnce' => $ccc_def_cookiecontrol_notifyOnce,
                'initialState' => $ccc_def_cookiecontrol_initialState,
                'position' => $ccc_def_cookiecontrol_position,
                'theme' => $ccc_def_cookiecontrol_theme,
                'layout' => $ccc_def_cookiecontrol_layout,
                'toggleType' => $ccc_def_cookiecontrol_toggleType,
                'closeStyle' => $ccc_def_cookiecontrol_closeStyle,
                'settingsStyle' => $ccc_def_cookiecontrol_settingsStyle,
                'expiry' => $ccc_def_cookiecontrol_expiry,

                'fontColor' => $ccc_def_cookiecontrol_fontColor,
                'fontFamily' => $ccc_def_cookiecontrol_fontFamily,
                'fontSizeTitle' => $ccc_def_cookiecontrol_fontSizeTitle,
                'fontSizeHeaders' => $ccc_def_cookiecontrol_fontSizeHeaders,
                'fontSize' => $ccc_def_cookiecontrol_fontSize,
                'backgroundColor' => $ccc_def_cookiecontrol_backgroundColor,
                'toggleText' => $ccc_def_cookiecontrol_toggleText,
                'toggleColor' => $ccc_def_cookiecontrol_toggleColor,
                'toggleBackground' => $ccc_def_cookiecontrol_toggleBackground,
                'buttonIcon' => $ccc_def_cookiecontrol_buttonIcon,
                'buttonIconWidth' => $ccc_def_cookiecontrol_buttonIconWidth,
                'buttonIconHeight' => $ccc_def_cookiecontrol_buttonIconHeight,
                'removeIcon' => $ccc_def_cookiecontrol_removeIcon,
                'removeAbout' => $ccc_def_cookiecontrol_removeAbout,
                'alertText' => $ccc_def_cookiecontrol_alertText,
                'alertBackground' => $ccc_def_cookiecontrol_alertBackground,
                'acceptTextColor' => $ccc_def_cookiecontrol_acceptTextColor,
                'acceptBackground' => $ccc_def_cookiecontrol_acceptBackground,

                'titleText' => $ccc_def_cookiecontrol_titleText,
                'introText' => $ccc_def_cookiecontrol_introText,
                'privacyURL' => $ccc_def_cookiecontrol_privacyURL,
                'necessaryTitle' => $ccc_def_cookiecontrol_necessaryTitle,
                'necessaryDescription' => $ccc_def_cookiecontrol_necessaryDescription,
                'thirdPartyTitle' => $ccc_def_cookiecontrol_thirdPartyTitle,
                'thirdPartyDescription' => $ccc_def_cookiecontrol_thirdPartyDescription,
                'onText' => $ccc_def_cookiecontrol_onText,
                'offText' => $ccc_def_cookiecontrol_offText,
                'acceptText' => $ccc_def_cookiecontrol_acceptText,
                'settingsText' => $ccc_def_cookiecontrol_settingsText,
                'acceptRecommended' => $ccc_def_cookiecontrol_acceptRecommended,
                'rejectButton' => $ccc_def_cookiecontrol_rejectButton,
                'reject' => $ccc_def_cookiecontrol_reject,
                'rejectSettings' => $ccc_def_cookiecontrol_rejectSettings,
                'notifyTitle' => $ccc_def_cookiecontrol_notifyTitle,
                'notifyDescription' => $ccc_def_cookiecontrol_notifyDescription,
                'closeLabel' => $ccc_def_cookiecontrol_closeLabel,
                'accessibilityAlert' => $ccc_def_cookiecontrol_accessibilityAlert,

                'accessKey' => $ccc_def_cookiecontrol_accessKey,
                'highlightFocus' => $ccc_def_cookiecontrol_highlightFocus,
                'iabCMP' => $ccc_def_cookiecontrol_iabCMP,
                'language' => $ccc_def_cookiecontrol_language,
                'gdprAppliesGlobally' => $ccc_def_gdprAppliesGlobally,
                'recommendedState1' => $ccc_def_RecommendedState1,
                'recommendedState2' => $ccc_def_RecommendedState1,
                'recommendedState3' => $ccc_def_RecommendedState1,
                'recommendedState4' => $ccc_def_RecommendedState1,
                'recommendedState5' => $ccc_def_RecommendedState1,

                'iabLabel' => $ccc_def_cookiecontrol_iabLabel,
                'iabDescription' => $ccc_def_cookiecontrol_iabDescription,
                'iabConfigure' => $ccc_def_cookiecontrol_iabConfigure,
                'iabPanelTitle' => $ccc_def_cookiecontrol_iabPanelTitle,
                'iabPanelIntro' => $ccc_def_cookiecontrol_iabPanelIntro,
                'iabAboutIab' => $ccc_def_cookiecontrol_iabAboutIab,
                'iabIabName' => $ccc_def_cookiecontrol_iabIabName,
                'iabIabLink' => $ccc_def_cookiecontrol_iabIabLink,
                'iabPanelBack' => $ccc_def_cookiecontrol_iabPanelBack,
                'iabVendorTitle' => $ccc_def_cookiecontrol_iabVendorTitle,
                'iabVendorConfigure' => $ccc_def_cookiecontrol_iabVendorConfigure,
                'iabVendorBack' => $ccc_def_cookiecontrol_iabVendorBack,
                'iabAcceptAll' => $ccc_def_cookiecontrol_iabAcceptAll,
                'iabRejectAll' => $ccc_def_cookiecontrol_iabRejectAll,
                'iabBack' => $ccc_def_cookiecontrol_iabBack,


            )
        );
        return $ccc_cookiecontrol_defaults;
    }

    function ccc_cookiecontrol_settings_init() {
        $ccc_cookiecontrol_settings = wp_parse_args( get_option( 'civic_cookiecontrol_settings' ), $this->ccc_cookiecontrol_settings_defaults() );
        return $ccc_cookiecontrol_settings;
    }

    function ccc_cookiecontrol_settings_validate() {

        if(isset($_POST['civic_cookiecontrol_settings'])){
            $input = $_POST['civic_cookiecontrol_settings'];
        }elseif(isset($_POST['cookiecontrol_settings'])){
            $input = $_POST['cookiecontrol_settings'];
        }

        $ccc_options_defaults = $this->ccc_cookiecontrol_settings_defaults();

        $ccc_options_v8 = get_option($this->plugin_name);

        $allowedHTML = array(
            'a'      => array(
                'href'  => array(),
                'title' => array(),
            ),
            'br'     => array(),
            'em'     => array(),
            'strong' => array(),
            'p'      => array(),
            'ul'     => array(),
            'ol'     => array(),
            'li'     => array(),
        );


        $input['apiKey']   = isset($input['apiKey']) ? wp_filter_nohtml_kses( trim( $input['apiKey'] ) ) : '';
        $input['product']   = isset($input['product']) ? wp_filter_nohtml_kses( $input['product'] ) : '';
        $input['logConsent']   = isset($input['logConsent']) ?  wp_filter_nohtml_kses( $input['logConsent'] ) : $ccc_options_defaults['logConsent'];
        $input['encodeCookie']   = isset($input['encodeCookie']) ?  wp_filter_nohtml_kses( $input['encodeCookie'] ) : $ccc_options_defaults['encodeCookie'];
        $input['subDomains']   = isset($input['subDomains']) ?  wp_filter_nohtml_kses( $input['subDomains'] ) : $ccc_options_defaults['subDomains'];
        $input['notifyOnce']   = isset($input['notifyOnce']) ?  wp_filter_nohtml_kses( $input['notifyOnce'] ) : $ccc_options_defaults['notifyOnce'];
        $input['position']     = isset($input['position']) ?  wp_filter_nohtml_kses( $input['position'] ) : $ccc_options_defaults['position'];
        $input['theme']        = isset($input['theme']) ?  wp_filter_nohtml_kses( $input['theme'] ) : $ccc_options_defaults['theme'];
        $input['layout']       = isset($input['layout']) ?  wp_filter_nohtml_kses( $input['layout'] ) : $ccc_options_defaults['layout'];
        $input['initialState'] = isset($input['initialState']) ?  wp_filter_nohtml_kses( $input['initialState'] ) : $ccc_options_defaults['initialState'];
        $input['toggleType']   = isset($input['toggleType']) ?  wp_filter_nohtml_kses( $input['toggleType'] ) : $ccc_options_defaults['toggleType'];
        $input['closeStyle']   = isset($input['closeStyle']) ?  wp_filter_nohtml_kses( $input['closeStyle'] ) : $ccc_options_defaults['closeStyle'];
        $input['settingsStyle']   = isset($input['settingsStyle']) ?  wp_filter_nohtml_kses( $input['settingsStyle'] ) : $ccc_options_defaults['settingsStyle'];
        $input['expiry']       = ( empty( $input['expiry'] ) || ! is_numeric( $input['expiry'] ) ) ? '' : $input['expiry'];

        $input['titleText']             =  isset($input['titleText']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['titleText'] ) ): $ccc_options_defaults['titleText'];
        $input['introText']             = isset($input['introText']) ? wp_kses( $input['introText'], $allowedHTML ) : $ccc_options_defaults['introText'];
        $input['necessaryTitle']        =  isset($input['necessaryTitle']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['necessaryTitle'] ) ): $ccc_options_defaults['necessaryTitle'];
        $input['necessaryDescription']  = isset($input['necessaryDescription']) ? wp_kses( $input['necessaryDescription'], $allowedHTML ) : $ccc_options_defaults['necessaryDescription'];
        $input['thirdPartyTitle']       =  isset($input['thirdPartyTitle']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['thirdPartyTitle'] ) ): $ccc_options_defaults['thirdPartyTitle'];
        $input['thirdPartyDescription'] =  isset($input['thirdPartyDescription']) ? wp_kses( $input['thirdPartyDescription'], $allowedHTML ) : $ccc_options_defaults['thirdPartyDescription'];
        $input['onText']                =  isset($input['onText']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['onText'] ) ): $ccc_options_defaults['onText'];
        $input['offText']               =  isset($input['offText']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['offText'] ) ): $ccc_options_defaults['offText'];
        $input['acceptText']            =  isset($input['acceptText']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['acceptText'] ) ): $ccc_options_defaults['acceptText'];
        $input['settingsText']          =  isset($input['settingsText']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['settingsText'] ) ): $ccc_options_defaults['settingsText'];
        $input['privacyURL']            =  isset($input['privacyURL']) ?  wp_filter_nohtml_kses( $input['privacyURL'] ): $ccc_options_defaults['privacyURL'];

        if ( isset( $input['privacyName'] ) ) {
            $input['privacyName'] = sanitize_text_field( wp_filter_nohtml_kses( $input['privacyName'] ) );
        }
        if ( isset( $input['privacyDescription'] ) ) {
            $input['privacyDescription'] = sanitize_text_field( wp_filter_nohtml_kses( $input['privacyDescription'] ) );
        }
        if ( isset( $input['privacyUpdateDate'] ) ) {
            $input['privacyUpdateDate'] = sanitize_text_field( $input['privacyUpdateDate'] );
        }
        $input['acceptRecommended'] =  isset($input['acceptRecommended']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['acceptRecommended'] ) ): $ccc_options_defaults['acceptRecommended'];
        $input['rejectButton']   =  isset($input['rejectButton']) ? wp_filter_nohtml_kses( $input['rejectButton'] ): $ccc_options_defaults['rejectButton'];
        $input['rejectSettings'] =  isset($input['rejectSettings']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['rejectSettings'] ) ): $ccc_options_defaults['rejectSettings'];
        $input['reject'] =  isset($input['reject']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['reject'] ) ): $ccc_options_defaults['reject'];
        $input['notifyTitle']       =  isset($input['notifyTitle']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['notifyTitle'] ) ): $ccc_options_defaults['notifyTitle'];
        $input['notifyDescription'] =  isset($input['notifyDescription']) ?  wp_kses( $input['notifyDescription'], $allowedHTML ): $ccc_options_defaults['notifyDescription'];

        $input['closeLabel']         =  isset($input['closeLabel']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['closeLabel'] ) ): $ccc_options_defaults['closeLabel'];
        $input['accessibilityAlert'] =  isset($input['accessibilityAlert']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['accessibilityAlert'] ) ): $ccc_options_defaults['accessibilityAlert'];

        $input['fontColor']        = ( empty( $input['fontColor'] ) || ! preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $input['fontColor'] ) ) ? '' : $input['fontColor'];
        $input['fontSizeTitle']    = ( empty( $input['fontSizeTitle'] ) || ! is_numeric( $input['fontSizeTitle'] ) ) ? '' : $input['fontSizeTitle'];
        $input['fontSizeHeaders']  = ( empty( $input['fontSizeHeaders'] ) || ! is_numeric( $input['fontSizeHeaders'] ) ) ? '' : $input['fontSizeHeaders'];
        $input['fontSize']         = ( empty( $input['fontSize'] ) || ! is_numeric( $input['fontSize'] ) ) ? '' : $input['fontSize'];
        $input['backgroundColor']  = ( empty( $input['backgroundColor'] ) || ! preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $input['backgroundColor'] ) ) ? '' : $input['backgroundColor'];
        $input['toggleText']       = ( empty( $input['toggleText'] ) || ! preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $input['toggleText'] ) ) ? '' : $input['toggleText'];
        $input['toggleColor']      = ( empty( $input['toggleColor'] ) || ! preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $input['toggleColor'] ) ) ? '' : $input['toggleColor'];
        $input['toggleBackground'] = ( empty( $input['toggleBackground'] ) || ! preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $input['toggleBackground'] ) ) ? '' : $input['toggleBackground'];
        $input['buttonIcon']       = ( empty( $input['buttonIcon'] ) ) ? null : esc_url( $input['buttonIcon'] );
        $input['buttonIconWidth']  = ( empty( $input['buttonIconWidth'] ) || ! is_numeric( $input['buttonIconWidth'] ) ) ? '64' : $input['buttonIconWidth'];
        $input['buttonIconHeight'] = ( empty( $input['buttonIconHeight'] ) || ! is_numeric( $input['buttonIconHeight'] ) ) ? '64' : $input['buttonIconHeight'];
        $input['alertText']        = ( empty( $input['alertText'] ) || ! preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $input['alertText'] ) ) ? '' : $input['alertText'];
        $input['alertBackground']  = ( empty( $input['alertBackground'] ) || ! preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $input['alertBackground'] ) ) ? '' : $input['alertBackground'];
        $input['acceptTextColor']  = ( empty( $input['acceptTextColor'] ) || ! preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $input['acceptTextColor'] ) ) ? '' : $input['acceptTextColor'];
        $input['acceptBackground'] = ( empty( $input['acceptBackground'] ) || ! preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $input['acceptBackground'] ) ) ? '' : $input['acceptBackground'];

        $input['onLoad'] = isset($input['onLoad']) ? $input['onLoad'] : '';

        if ( ! empty( $input['optionalCookiesName'] ) && is_array( $input['optionalCookiesName'] ) ) {
            foreach ( $input['optionalCookiesName'] as $key => $val ) :
                $input['optionalCookiesName'][ $key ]                  = str_replace( ' ', '_', sanitize_text_field( $input['optionalCookiesName'][ $key ] ) );
                $input['optionalCookiesLabel'][ $key ]                 = esc_js( wp_strip_all_tags( $input['optionalCookiesLabel'][ $key ] ) );
                $input['optionalCookiesDescription'][ $key ]           = esc_js( wp_strip_all_tags( $input['optionalCookiesDescription'][ $key ] ) );
                $input['optionalCookiesArray'][ $key ]                 = stripslashes( sanitize_textarea_field( $input['optionalCookiesArray'][ $key ] ) );
                $input['optionalCookiesthirdPartyCookiesName'][ $key ] = sanitize_text_field( $input['optionalCookiesthirdPartyCookiesName'][ $key ] );
                $input['optionalCookiesthirdPartyCookiesUrl'][ $key ]  = sanitize_text_field( $input['optionalCookiesthirdPartyCookiesUrl'][ $key ] );
                if ( isset( $input[ 'optionalCookiesthirdPartyCookiesName' . $key ] ) ) {
                    foreach ( $input[ 'optionalCookiesthirdPartyCookiesName' . $key ] as $key2 => $val2 ) {
                        $input[ 'optionalCookiesthirdPartyCookiesName' . $key . '' ][ $key2 ] = sanitize_text_field( $input[ 'optionalCookiesthirdPartyCookiesName' . $key . '' ][ $key2 ] );
                        $input[ 'optionalCookiesthirdPartyCookiesUrl' . $key . '' ][ $key2 ]  = sanitize_text_field( $input[ 'optionalCookiesthirdPartyCookiesUrl' . $key . '' ][ $key2 ] );
                    }
                }
            endforeach;
        }

        if ( ! empty( $input['necessaryCookies'] ) && is_array( $input['necessaryCookies'] ) ) {
            foreach ( $input['necessaryCookies'] as $key => $val ) :
                $input['necessaryCookies'][ $key ] = esc_js( sanitize_text_field( $val ) );
            endforeach;
        }
        // add by default wp session cookies
        if ( ! empty( $input['excludedCountries'] ) && is_array( $input['excludedCountries'] ) ) {
            foreach ( $input['excludedCountries'] as $key => $val ) :
                $input['excludedCountries'][ $key ] = esc_js( sanitize_text_field( $val ) );
            endforeach;
        }

        if ( ! empty( $input['altLanguages'] ) && is_array( $input['altLanguages'] ) ) {
            foreach ( $input['altLanguages'] as $key => $val ) :
                $input['altLanguages'][ $key ]     = esc_js( sanitize_text_field( $val ) );
                $input['altLanguagesText'][ $key ] = wp_kses( $input['altLanguagesText'][ $key ], $allowedHTML );
            endforeach;
        }

        $input['iabCMP']   = isset($input['iabCMP']) ? wp_filter_nohtml_kses( $input['iabCMP'] ): $ccc_options_defaults['iabCMP'];
        $input['language']   = isset($input['language']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['language'] )) : $ccc_options_defaults['language'];
        $input['gdprAppliesGlobally'] = isset($input['gdprAppliesGlobally']) ? wp_filter_nohtml_kses( $input['gdprAppliesGlobally'] ): (isset($ccc_options_v8['gdprAppliesGlobally'])? $ccc_options_v8['gdprAppliesGlobally'] :  $ccc_options_defaults['gdprAppliesGlobally']);
        $input['recommendedState1']   = isset($input['recommendedState1']) ? wp_filter_nohtml_kses( $input['recommendedState1'] ): (isset($ccc_options_v8['recommendedState1'])? $ccc_options_v8['recommendedState1'] :  $ccc_options_defaults['recommendedState1']);
        $input['recommendedState2']   = isset($input['recommendedState2']) ? wp_filter_nohtml_kses( $input['recommendedState2'] ): (isset($ccc_options_v8['recommendedState2'])? $ccc_options_v8['recommendedState2'] :  $ccc_options_defaults['recommendedState2']);
        $input['recommendedState3']   = isset($input['recommendedState3']) ? wp_filter_nohtml_kses( $input['recommendedState3'] ): (isset($ccc_options_v8['recommendedState3'])? $ccc_options_v8['recommendedState3'] :  $ccc_options_defaults['recommendedState3']);
        $input['recommendedState4']   = isset($input['recommendedState4']) ? wp_filter_nohtml_kses( $input['recommendedState4'] ): (isset($ccc_options_v8['recommendedState4'])? $ccc_options_v8['recommendedState4'] :  $ccc_options_defaults['recommendedState4']);
        $input['recommendedState5']   = isset($input['recommendedState5']) ? wp_filter_nohtml_kses( $input['recommendedState5'] ): (isset($ccc_options_v8['recommendedState5'])? $ccc_options_v8['recommendedState5'] :  $ccc_options_defaults['recommendedState5']);

        $input['iabLabel']   = isset($input['iabLabel']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabLabel'] ) ): (isset($ccc_options_v8['iabLabel'])? $ccc_options_v8['iabLabel'] :  $ccc_options_defaults['iabLabel']);
        $input['iabDescription']   = isset($input['iabDescription']) ? sanitize_textarea_field( wp_filter_nohtml_kses( $input['iabDescription'] ) ): (isset($ccc_options_v8['iabDescription'])? $ccc_options_v8['iabDescription'] :  $ccc_options_defaults['iabDescription']);
        $input['iabConfigure']   = isset($input['iabConfigure']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabConfigure'] ) ): (isset($ccc_options_v8['iabConfigure'])? $ccc_options_v8['iabConfigure'] :  $ccc_options_defaults['iabConfigure']);
        $input['iabPanelTitle']   = isset($input['iabPanelTitle']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabPanelTitle'] ) ): $ccc_options_defaults['iabPanelTitle'];
        $input['iabPanelIntro']   = isset($input['iabPanelIntro']) ? sanitize_textarea_field( wp_filter_nohtml_kses( $input['iabPanelIntro'] ) ): $ccc_options_defaults['iabPanelIntro'];
        $input['iabAboutIab']   = isset($input['iabAboutIab']) ?  sanitize_textarea_field( wp_filter_nohtml_kses( $input['iabAboutIab'] ) ): $ccc_options_defaults['iabAboutIab'];
        $input['iabIabName']   = isset($input['iabIabName']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabIabName'] ) ): $ccc_options_defaults['iabIabName'];
        $input['iabIabLink']   = isset($input['iabIabLink']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabIabLink'] ) ): $ccc_options_defaults['iabIabLink'];
        $input['iabPanelBack']   =  isset($input['iabPanelBack']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabPanelBack'] ) ): (isset($ccc_options_v8['iabPanelBack'])? $ccc_options_v8['iabPanelBack'] :  $ccc_options_defaults['iabPanelBack']);
        $input['iabVendorTitle']   = isset($input['iabVendorTitle']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabVendorTitle'] ) ): (isset($ccc_options_v8['iabVendorTitle'])? $ccc_options_v8['iabVendorTitle'] :  $ccc_options_defaults['iabVendorTitle']);
        $input['iabVendorConfigure']   = isset($input['iabVendorConfigure']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabVendorConfigure'] ) ): (isset($ccc_options_v8['iabVendorConfigure'])? $ccc_options_v8['iabVendorConfigure'] :  $ccc_options_defaults['iabVendorConfigure']);
        $input['iabVendorBack']   = isset($input['iabVendorBack']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabVendorBack'] ) ): (isset($ccc_options_v8['iabConfigure'])? $ccc_options_v8['iabConfigure'] :  $ccc_options_defaults['iabConfigure']);
        $input['iabAcceptAll']   = isset($input['iabAcceptAll']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabAcceptAll'] ) ): $ccc_options_defaults['iabAcceptAll'];
        $input['iabRejectAll']   = isset($input['iabRejectAll']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabRejectAll'] ) ): $ccc_options_defaults['iabRejectAll'];
        $input['iabBack']   = isset($input['iabBack']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabBack'] ) ): (isset($ccc_options_v8['iabBack'])? $ccc_options_v8['iabBack'] :  $ccc_options_defaults['iabBack']);


        return $input;
    }

    function ccc_cookiecontrol_args() {

        if(get_option( $this->plugin_name )){

            $ccc_cookiecontrol_settings = get_option( $this->plugin_name );

        }elseif(get_option( 'cookiecontrol_settings' )){

            $ccc_cookiecontrol_settings = get_option( 'cookiecontrol_settings' );

        }

        $ccc_cookiecontrol_productval = get_option( 'civic_cookiecontrol_productval' );

        $allowedHTML = array(
            'a'      => array(
                'href'  => array(),
                'title' => array(),
            ),
            'br'     => array(),
            'em'     => array(),
            'strong' => array(),
            'p'      => array(),
            'ul'     => array(),
            'ol'     => array(),
            'li'     => array(),
        );

        if ( isset( $ccc_cookiecontrol_settings['apiKey'] ) && $ccc_cookiecontrol_settings['apiKey'] != '' ) :

            $ccc_output_extra_cookies       = '';
            $ccc_output_extra_cookies_array = [];
            $ccc_product_val                = '';
            if ( ! empty( $ccc_cookiecontrol_settings['optionalCookiesName'] ) ) {

                foreach ( $ccc_cookiecontrol_settings['optionalCookiesName'] as $key => $val ) {
                    if ( ( isset( $ccc_cookiecontrol_settings['optionalCookiesthirdPartyCookiesName'][ $key ] ) && $ccc_cookiecontrol_settings['optionalCookiesthirdPartyCookiesName'][ $key ] ) && ( isset( $ccc_cookiecontrol_settings['optionalCookiesthirdPartyCookiesUrl'][ $key ] ) && $ccc_cookiecontrol_settings['optionalCookiesthirdPartyCookiesUrl'][ $key ] ) ) {
                        $ccc_output_extra_cookies .= '{"name": "' . $ccc_cookiecontrol_settings['optionalCookiesthirdPartyCookiesName'][ $key ] . '",  "optOutLink" : "' . $ccc_cookiecontrol_settings['optionalCookiesthirdPartyCookiesUrl'][ $key ] . '"}';
                        if ( isset( $ccc_cookiecontrol_settings[ 'optionalCookiesthirdPartyCookiesName' . $key ] ) ) {

                            foreach ( $ccc_cookiecontrol_settings[ 'optionalCookiesthirdPartyCookiesName' . $key ] as $key2 => $val2 ) {

                                $ccc_output_extra_cookies .= ' , {"name": "' . $ccc_cookiecontrol_settings[ 'optionalCookiesthirdPartyCookiesName' . $key ][ $key2 ] . '", "optOutLink" : "' . $ccc_cookiecontrol_settings[ 'optionalCookiesthirdPartyCookiesUrl' . $key ][ $key2 ] . '"}';
                            }
                        }
                    }
                    $ccc_output_extra_cookies_array[] = $ccc_output_extra_cookies;
                    $ccc_output_extra_cookies         = '';
                }
            }

            if ( isset( $ccc_cookiecontrol_productval ) && $ccc_cookiecontrol_productval != '' ) {
                $ccc_product_val = $ccc_cookiecontrol_productval;
            } elseif ( isset( $ccc_cookiecontrol_settings['product'] ) ) {
                $ccc_product_val = $ccc_cookiecontrol_settings['product'];
            }
            ?>

            <script type="text/javascript">
                var config = {
                    apiKey: '<?php echo esc_html( trim( $ccc_cookiecontrol_settings['apiKey'] ) ); ?>',
                    product: '<?php echo esc_html( $ccc_product_val ); ?>',
                    logConsent: <?php echo esc_html( $ccc_cookiecontrol_settings['logConsent'] ); ?>,
                    notifyOnce: <?php echo esc_html( $ccc_cookiecontrol_settings['notifyOnce'] ); ?>,
                    initialState: '<?php echo  esc_html( $ccc_cookiecontrol_settings['initialState'] ) ==='CLOSE' ? "CLOSED" : esc_html( $ccc_cookiecontrol_settings['initialState'] ); ?>',
                    position: '<?php echo esc_html( $ccc_cookiecontrol_settings['position'] ); ?>',
                    theme: '<?php echo esc_html( $ccc_cookiecontrol_settings['theme'] ); ?>',
                    layout: '<?php echo esc_html( $ccc_cookiecontrol_settings['layout'] ); ?>',
                    toggleType: '<?php echo esc_html( $ccc_cookiecontrol_settings['toggleType'] ); ?>',
                    iabCMP: <?php echo isset( $ccc_cookiecontrol_settings['iabCMP']) ?  esc_html( $ccc_cookiecontrol_settings['iabCMP'] ) : 'false'; ?>,
                    <?php if(  $ccc_product_val != 'COMMUNITY' && isset($ccc_cookiecontrol_settings['iabCMP']) && $ccc_cookiecontrol_settings['iabCMP'] == 'true' ){ ?>
                    iabConfig: {
                        globalVendorListLocation: 'https://vendorlist.consensu.org/vendorlist.json',
                        language: '<?php  echo esc_html( $ccc_cookiecontrol_settings['language'] );  ?>',
                        gdprAppliesGlobally:  <?php  echo esc_html( $ccc_cookiecontrol_settings['gdprAppliesGlobally'] );  ?>,
                        recommendedState: {<?php  if($ccc_cookiecontrol_settings['recommendedState1'] == 'true') { ?> 1: <?php echo $ccc_cookiecontrol_settings['recommendedState1'] ?>,<?php }?><?php  if($ccc_cookiecontrol_settings['recommendedState2'] == 'true') { ?> 2: <?php echo $ccc_cookiecontrol_settings['recommendedState2'] ?>,<?php }?><?php  if($ccc_cookiecontrol_settings['recommendedState3'] == 'true') { ?> 3: <?php echo $ccc_cookiecontrol_settings['recommendedState3'] ?>,<?php }?><?php  if($ccc_cookiecontrol_settings['recommendedState4'] == 'true') { ?> 4: <?php echo $ccc_cookiecontrol_settings['recommendedState4'] ?>,<?php }?><?php  if($ccc_cookiecontrol_settings['recommendedState5'] == 'true') { ?> 5: <?php echo $ccc_cookiecontrol_settings['recommendedState5'] ?>,<?php }?>}
                    },
                    <?php } ?>
                    closeStyle: '<?php echo esc_html( $ccc_cookiecontrol_settings['closeStyle'] ); ?>',
                    consentCookieExpiry: <?php echo !empty( $ccc_cookiecontrol_settings['expiry'] ) ? esc_html( $ccc_cookiecontrol_settings['expiry'] ) : '0'; ?>,
                    subDomains :  <?php echo isset( $ccc_cookiecontrol_settings['subDomains']) ?  esc_html( $ccc_cookiecontrol_settings['subDomains'] ) : 'true'; ?>,
                    rejectButton: <?php echo isset( $ccc_cookiecontrol_settings['rejectButton']) ?  esc_html( $ccc_cookiecontrol_settings['rejectButton'] ) : 'false'; ?>,
                    settingsStyle : '<?php echo isset( $ccc_cookiecontrol_settings['settingsStyle']) ?  esc_html( $ccc_cookiecontrol_settings['settingsStyle'] ) : 'button'; ?>',
                    encodeCookie : <?php echo isset( $ccc_cookiecontrol_settings['encodeCookie']) ?  esc_html( $ccc_cookiecontrol_settings['encodeCookie'] ) : 'false'; ?>,
                    accessibility: {
                        accessKey: '<?php echo esc_html( $ccc_cookiecontrol_settings['accessKey'] ); ?>',
                        highlightFocus: <?php echo esc_html( $ccc_cookiecontrol_settings['highlightFocus'] ); ?>
                    },
                    <?php if(isset($ccc_cookiecontrol_settings['onLoad']) && !empty( $ccc_cookiecontrol_settings['onLoad'] )){ ?>
                    onLoad: function () { <?php echo stripslashes($ccc_cookiecontrol_settings['onLoad']); ?>
                    },
                    <?php }?>
                    text: {
                        title: '<?php echo esc_html( $ccc_cookiecontrol_settings['titleText'] ); ?>',
                        intro: '<?php echo wp_kses( preg_replace( "/\r\n|\r|\n/", '<br/>', $ccc_cookiecontrol_settings['introText'] ), $allowedHTML ); ?>',
                        necessaryTitle: '<?php echo esc_html( $ccc_cookiecontrol_settings['necessaryTitle'] ); ?>',
                        necessaryDescription: '<?php echo wp_kses( preg_replace( "/\r\n|\r|\n/", '<br/>', $ccc_cookiecontrol_settings['necessaryDescription'] ), $allowedHTML ); ?>',
                        thirdPartyTitle: '<?php echo esc_html( $ccc_cookiecontrol_settings['thirdPartyTitle'] ); ?>',
                        thirdPartyDescription: '<?php echo wp_kses( preg_replace( "/\r\n|\r|\n/", '<br/>', $ccc_cookiecontrol_settings['thirdPartyDescription'] ), $allowedHTML ); ?>',
                        on: '<?php echo esc_html( $ccc_cookiecontrol_settings['onText'] ); ?>',
                        off: '<?php echo esc_html( $ccc_cookiecontrol_settings['offText'] ); ?>',
                        accept: '<?php echo esc_html( $ccc_cookiecontrol_settings['acceptText'] ); ?>',
                        settings: '<?php echo esc_html( $ccc_cookiecontrol_settings['settingsText'] ); ?>',
                        acceptRecommended: '<?php echo esc_html( $ccc_cookiecontrol_settings['acceptRecommended'] ); ?>',
                        notifyTitle: '<?php echo esc_html( $ccc_cookiecontrol_settings['notifyTitle'] ); ?>',
                        notifyDescription: '<?php echo wp_kses( preg_replace( "/\r\n|\r|\n/", '<br/>', $ccc_cookiecontrol_settings['notifyDescription'] ), $allowedHTML ); ?>',
                        closeLabel: '<?php echo esc_html( $ccc_cookiecontrol_settings['closeLabel'] ); ?>',
                        accessibilityAlert: '<?php echo esc_html( $ccc_cookiecontrol_settings['accessibilityAlert'] ); ?>',
                        rejectSettings: '<?php echo isset( $ccc_cookiecontrol_settings['rejectSettings']) ?  esc_html( $ccc_cookiecontrol_settings['rejectSettings'] ) : 'Reject All'; ?>',
                        reject: '<?php echo isset( $ccc_cookiecontrol_settings['reject']) ?  esc_html( $ccc_cookiecontrol_settings['reject'] ) : 'Reject'; ?>',
                        <?php if(  $ccc_product_val != 'COMMUNITY' && isset($ccc_cookiecontrol_settings['iabCMP']) && $ccc_cookiecontrol_settings['iabCMP'] == 'true' ){ ?>
                        iabCMP: {
                            label: '<?php echo esc_html( $ccc_cookiecontrol_settings['iabLabel'] ); ?>',
                            description: '<?php echo esc_html( $ccc_cookiecontrol_settings['iabDescription'] ); ?>',
                            configure: '<?php echo esc_html( $ccc_cookiecontrol_settings['iabConfigure'] ); ?>',
                            panelTitle: '<?php echo esc_html( $ccc_cookiecontrol_settings['iabPanelTitle'] ); ?>',
                            panelIntro: '<?php echo esc_html( $ccc_cookiecontrol_settings['iabPanelIntro'] ); ?>',
                            aboutIab: '<?php echo esc_html( $ccc_cookiecontrol_settings['iabAboutIab'] ); ?>',
                            iabName: '<?php echo esc_html( $ccc_cookiecontrol_settings['iabIabName'] ); ?>',
                            iabLink: '<?php echo esc_html( $ccc_cookiecontrol_settings['iabIabLink'] ); ?>',
                            panelBack: '<?php echo esc_html( $ccc_cookiecontrol_settings['iabPanelBack'] ); ?>',
                            vendorTitle: '<?php echo esc_html( $ccc_cookiecontrol_settings['iabVendorTitle'] ); ?>',
                            vendorConfigure: '<?php echo esc_html( $ccc_cookiecontrol_settings['iabVendorConfigure'] ); ?>',
                            vendorBack: '<?php echo esc_html( $ccc_cookiecontrol_settings['iabVendorBack'] ); ?>',
                            acceptAll: '<?php echo esc_html( $ccc_cookiecontrol_settings['iabAcceptAll'] ); ?>',
                            rejectAll: '<?php echo esc_html( $ccc_cookiecontrol_settings['iabRejectAll'] ); ?>',
                            back: '<?php echo esc_html( $ccc_cookiecontrol_settings['iabBack'] ); ?>',
                        },
                        <?php } ?>
                    },

                    <?php if ( $ccc_product_val != 'COMMUNITY' ) : ?>

                    branding: {
                        fontColor: '<?php echo esc_html( $ccc_cookiecontrol_settings['fontColor'] ); ?>',
                        fontFamily: '<?php echo esc_html( $ccc_cookiecontrol_settings['fontFamily'] ); ?>',
                        fontSizeTitle: '<?php echo esc_html( $ccc_cookiecontrol_settings['fontSizeTitle'] ); ?>em',
                        fontSizeHeaders: '<?php echo esc_html( $ccc_cookiecontrol_settings['fontSizeHeaders'] ); ?>em',
                        fontSize: '<?php echo esc_html( $ccc_cookiecontrol_settings['fontSize'] ); ?>em',
                        backgroundColor: '<?php echo esc_html( $ccc_cookiecontrol_settings['backgroundColor'] ); ?>',
                        toggleText: '<?php echo esc_html( $ccc_cookiecontrol_settings['toggleText'] ); ?>',
                        toggleColor: '<?php echo esc_html( $ccc_cookiecontrol_settings['toggleColor'] ); ?>',
                        toggleBackground: '<?php echo esc_html( $ccc_cookiecontrol_settings['toggleBackground'] ); ?>',
                        alertText: '<?php echo esc_html( $ccc_cookiecontrol_settings['alertText'] ); ?>',
                        alertBackground: '<?php echo esc_html( $ccc_cookiecontrol_settings['alertBackground'] ); ?>',
                        acceptText: '<?php echo esc_html( $ccc_cookiecontrol_settings['acceptTextColor'] ); ?>',
                        acceptBackground: '<?php echo esc_html( $ccc_cookiecontrol_settings['acceptBackground'] ); ?>',
                        <?php if ( empty( $ccc_cookiecontrol_settings['buttonIcon'] ) ) : ?>
                        buttonIcon: null,
                        <?php else : ?>
                        buttonIcon: '<?php echo esc_url( $ccc_cookiecontrol_settings['buttonIcon'] ); ?>',
                        <?php endif; ?>
                        buttonIconWidth: '<?php echo esc_html( $ccc_cookiecontrol_settings['buttonIconWidth'] ); ?>px',
                        buttonIconHeight: '<?php echo esc_html( $ccc_cookiecontrol_settings['buttonIconHeight'] ); ?>px',
                        removeIcon: <?php echo esc_html( $ccc_cookiecontrol_settings['removeIcon'] ); ?>,
                        removeAbout: <?php echo esc_html( $ccc_cookiecontrol_settings['removeAbout'] ); ?>
                    },
                    <?php endif; ?>
                    <?php if ( isset( $ccc_cookiecontrol_settings['excludedCountries'] ) && is_array( $ccc_cookiecontrol_settings['excludedCountries'] ) && count( $ccc_cookiecontrol_settings['excludedCountries'] ) > 0 && ! empty( $ccc_cookiecontrol_settings['excludedCountries'] ) ) : ?>
                    <?php
                    $excludedCountriesVal = '';
                    foreach ( $ccc_cookiecontrol_settings['excludedCountries'] as $key => $val ) :
                        $excludedCountriesVal .= $val != '' ? "'" . $val . "'," : '';
                    endforeach;
                    ?>
                    <?php if ( $ccc_product_val != 'COMMUNITY' ) : ?>
                    <?php if ( $excludedCountriesVal != '' ) : ?>
                    excludedCountries: [ <?php echo wp_kses( substr( $excludedCountriesVal, 0, -1 ), $allowedHTML ); ?> ],
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php if ( $ccc_product_val != 'COMMUNITY' ) : ?>
                    <?php
                    if ( isset( $ccc_cookiecontrol_settings['altLanguages'] ) ) :
                    if ( is_array( $ccc_cookiecontrol_settings['altLanguages'] ) && count( $ccc_cookiecontrol_settings['altLanguages'] ) > 0 && ! empty( $ccc_cookiecontrol_settings['altLanguages'] ) ) :
                    ?>
                    locales: [
                        <?php foreach ( $ccc_cookiecontrol_settings['altLanguages'] as $key => $val ) : ?>
                        <?php if ( $val != '' && $ccc_cookiecontrol_settings['altLanguagesText'][ $key ] != '' ) : ?>
                        {
                            locale: '<?php echo esc_html( $val ); ?>',
                            <?php echo wp_kses( stripslashes( $ccc_cookiecontrol_settings['altLanguagesText'][ $key ] ), $allowedHTML ); ?>
                        },
                        <?php endif; ?>
                        <?php endforeach; ?>
                    ],
                    <?php
                    endif;
                    endif;
                    ?>
                    <?php endif; ?>
                    <?php
                    $necessaryCookiesVal = "'wordpress_*','wordpress_logged_in_*','CookieControl','wp_consent_*',";
                    ?>
                    <?php if ( isset( $ccc_cookiecontrol_settings['necessaryCookies'] ) && is_array( $ccc_cookiecontrol_settings['necessaryCookies'] ) && count( $ccc_cookiecontrol_settings['necessaryCookies'] ) > 0 && ! empty( $ccc_cookiecontrol_settings['necessaryCookies'] ) ) : ?>
                    <?php
                    foreach ( $ccc_cookiecontrol_settings['necessaryCookies'] as $key => $val ) :
                        $necessaryCookiesVal .= $val != '' ? "'" . $val . "'," : '';
                    endforeach;
                    ?>
                    <?php endif; ?>

                    <?php if ( $necessaryCookiesVal != '' ) : ?>
                    necessaryCookies: [ <?php echo wp_kses( substr( $necessaryCookiesVal, 0, -1 ), $allowedHTML ); ?> ],
                    <?php endif; ?>

                    <?php if ( isset( $ccc_cookiecontrol_settings['optionalCookiesName'] ) && is_array( $ccc_cookiecontrol_settings['optionalCookiesName'] ) && count( $ccc_cookiecontrol_settings['optionalCookiesName'] ) > 0 && ! empty( $ccc_cookiecontrol_settings['optionalCookiesName'] ) ) : ?>
                    optionalCookies: [
                        <?php foreach ( $ccc_cookiecontrol_settings['optionalCookiesName'] as $key => $val ) : ?>
                        <?php if ( $val != '' ) : ?>
                        {
                            name: '<?php echo esc_html( $val ); ?>',
                            label: '<?php echo esc_html( $ccc_cookiecontrol_settings['optionalCookiesLabel'][ $key ] ); ?>',
                            description: '<?php echo esc_html( $ccc_cookiecontrol_settings['optionalCookiesDescription'][ $key ] ); ?>',
                            <?php $cookies_names = explode(",", $ccc_cookiecontrol_settings['optionalCookiesArray'][ $key ] );
                            $cookies_names=array_map('trim',$cookies_names);
                            $cookies_names = str_replace('"', "", $cookies_names);
                            $cookies_names  = str_replace("'", "", $cookies_names);
                            $string_name = "'" . implode("', '", $cookies_names) . "'";
                            ?>
                            cookies: [ <?php echo wp_kses( stripslashes( $string_name ), $allowedHTML ); ?> ],
                            onAccept: function () {
                                <?php echo stripslashes( $ccc_cookiecontrol_settings['optionalCookiesonAccept'][ $key ] ); ?>
                            },
                            onRevoke: function () {
                                <?php echo stripslashes( $ccc_cookiecontrol_settings['optionalCookiesonRevoke'][ $key ] ); ?>
                            },
                            <?php if ( ! empty( $ccc_output_extra_cookies_array[ $key - 1 ] ) ) : ?>
                            thirdPartyCookies: [<?php echo wp_kses( stripslashes( $ccc_output_extra_cookies_array[ $key - 1 ] ), $allowedHTML ); ?>],
                            <?php endif; ?>
                            recommendedState: '<?php echo esc_html( $ccc_cookiecontrol_settings['optionalCookiesinitialConsentState'][ $key ] ); ?>',
                            lawfulBasis: '<?php echo isset( $ccc_cookiecontrol_settings['optionalCookieslawfulBasis'] ) ? esc_html( $ccc_cookiecontrol_settings['optionalCookieslawfulBasis'][ $key ] ) : 'consent'; ?>',
                        },
                        <?php endif; ?>
                        <?php endforeach; ?>
                    ],
                    <?php endif; ?>

                    <?php if ( isset( $ccc_cookiecontrol_settings['privacyURL'] ) && ! empty( $ccc_cookiecontrol_settings['privacyURL'] ) ) : ?>
                    statement: {
                        description: '<?php echo esc_html( $ccc_cookiecontrol_settings['privacyDescription'] ); ?>',
                        name: '<?php echo esc_html( $ccc_cookiecontrol_settings['privacyName'] ); ?>',
                        url: '<?php echo esc_url( $ccc_cookiecontrol_settings['privacyURL'] ); ?>',
                        updated: '<?php echo esc_html( $ccc_cookiecontrol_settings['privacyUpdateDate'] ); ?>'
                    },
                    <?php endif; ?>

                };
                CookieControl.load(config);
            </script>

            <?php
        endif;
    }
}

?>
