<?php

class CCC_Cookie_Control_Admin_Dependencies_v9{

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
        $ccc_options_v9 = get_option('civic_cookiecontrol_settings_v9');

// defaults
        $ccc_def_cookiecontrol_logConsent = 'false';
        $ccc_cookiecontrol_encodeCookie = 'false';
        $ccc_cookiecontrol_subDomains = 'true';
        $ccc_cookiecontrol_mode = 'gdpr';
        $ccc_def_cookiecontrol_wrapInnerHTML = 'false';
        $ccc_def_cookiecontrol_initialState = 'CLOSED';
        $ccc_def_cookiecontrol_notifyOnce = 'false';
        $ccc_def_cookiecontrol_position = 'RIGHT';
        $ccc_def_cookiecontrol_theme = 'DARK';
        $ccc_def_cookiecontrol_layout = 'SLIDEOUT';
        $ccc_def_cookiecontrol_toggleType = 'slider';
        $ccc_def_cookiecontrol_acceptBehaviour = 'all';
        $ccc_def_cookiecontrol_closeOnGlobalChange ='true';
        $ccc_def_cookiecontrol_closeStyle = 'icon';
        $ccc_def_cookiecontrol_settingsStyle = 'button';
        $ccc_def_cookiecontrol_expiry = 90;
        $ccc_def_cookiecontrol_sameSiteCookie = 'true';
        $ccc_def_cookiecontrol_sameSiteValue = 'Strict';
        $ccc_def_cookiecontrol_notifyDismissButton = 'true';
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
        $ccc_def_cookiecontrol_rejectText = '#ffffff';
        $ccc_def_cookiecontrol_rejectBackground = '#111125';
        $ccc_def_cookiecontrol_closeText = '#111125';
        $ccc_def_cookiecontrol_closeBackground = '#FFF';
        $ccc_def_cookiecontrol_notifyFontColor = '#FFF';
        $ccc_def_cookiecontrol_notifyBackgroundColor = '#313147';

        $ccc_def_cookiecontrol_titleText = 'This site uses cookies';
        $ccc_def_cookiecontrol_introText = 'Some of these cookies are essential, while others help us to improve your experience by providing insights into how the site is being used.';
        $ccc_def_cookiecontrol_privacyURL = '';
        $ccc_def_cookiecontrol_privacyName = '';
        $ccc_def_cookiecontrol_privacyDescription = '';
        $ccc_def_cookiecontrol_privacyUpdateDate = date('d/m/Y');
        $ccc_def_cookiecontrol_ccpaPrivacyURL = '';
        $ccc_def_cookiecontrol_ccpaPrivacyName = '';
        $ccc_def_cookiecontrol_ccpaPrivacyDescription = '';
        $ccc_def_cookiecontrol_ccpaPrivacyUpdateDate = date('d/m/Y');
        $ccc_def_cookiecontrol_ccpaRejectButton='Do Not Sell or Share My Personal Information';
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
        $ccc_def_cookiecontrol_acceptSettings = 'I Accept';
        $ccc_def_cookiecontrol_rejectButton = 'false';
        $ccc_def_cookiecontrol_reject = 'Reject';
        $ccc_def_cookiecontrol_rejectSettings = 'Reject All';
        $ccc_def_cookiecontrol_closeLabel = 'Close';
        $ccc_def_cookiecontrol_accessibilityAlert = 'This site uses cookies to store information. Press accesskey C to learn more about your options.';
        $ccc_def_cookiecontrol_cornerButton = 'Set cookie preferences.';
        $ccc_def_cookiecontrol_landmark = 'Cookie preferences.';
        $ccc_def_cookiecontrol_showVendors = 'Show vendors within this category';
        $ccc_def_cookiecontrol_thirdPartyCookies = 'This vendor may set third party cookies.';
        $ccc_def_cookiecontrol_readMore = 'Read more';
        $ccc_def_cookiecontrol_chooseLocale = 'browser';

        $ccc_def_cookiecontrol_accessKey = 'C';
        $ccc_def_cookiecontrol_highlightFocus = 'false';
        $ccc_def_cookiecontrol_outline = 'true';
        $ccc_def_cookiecontrol_overlay = 'true';
        $ccc_def_cookiecontrol_disableSiteScrolling = 'false';
        $ccc_def_cookiecontrol_iabCMP = 'false';
        $ccc_def_cookiecontrol_publisherCC = 'GB';
        $ccc_def_cookiecontrol_dropDowns = 'false';
        $ccc_def_cookiecontrol_fullLegalDescriptions = 'true';
        $ccc_def_cookiecontrol_saveOnlyOnClose = 'false';

        $ccc_def_cookiecontrol_iabPanelTitle = 'This site uses cookies to store information on your computer.';
        $ccc_def_cookiecontrol_iabPanelIntro = 'We and select companies use technologies such as cookies to store and retrieve information from your browser. This information may be about you, your preferences or your device and is mostly used to make the site work as you expect. While the information does not usually directly identify you, details such as the device, operating system and type of browser your using may be considered personal data as it helps to create a more personalised web experience.';
        $ccc_def_cookiecontrol_iabPanelIntro2 = 'As we respect your right to privacy, you can review how this information is used by viewing the purposes, special features and vendors that we support and choose whether or not you wish to allow your information to be processed in this way.';
        $ccc_def_cookiecontrol_iabPanelIntro3 = 'Certain vendors may process personal data on the basis of legitimate interests and rely on different preferences to offer certain services. You have the right to object to your personal data being processed on the basis of legitimate interest and may set this across all purposes and vendors by clicking Reject All below, or setting your preference for each purpose and vendor individually. Please refer to the vendor tab for more specific details and be assured that you may change your preferences at any time by clicking the Cookie Control icon in the bottom corner.';
        $ccc_def_cookiecontrol_iabAboutIab = 'You may control how this information is used by signaling your consent to the following purposes outlined by';
        $ccc_def_cookiecontrol_iabIabName = 'IAB Europe';
        $ccc_def_cookiecontrol_iabIabLink = 'https://iabeurope.eu/iab-europe-transparency-consent-framework-policies/';
        $ccc_def_cookiecontrol_iabVendorTitle = 'Vendors';
        $ccc_def_cookiecontrol_iabPurposes = 'Purposes';
        $ccc_def_cookiecontrol_iabFeatures = 'Features';
        $ccc_def_cookiecontrol_iabSpecialPurposes = 'Special Purposes';
        $ccc_def_cookiecontrol_iabSpecialFeatures = 'Special Features';
        $ccc_def_cookiecontrol_iabPurposeLegitimateInterest= 'I accept the processing of personal data on the grounds of Legitimate Interest for the purpose:';
        $ccc_def_cookiecontrol_iabVendorLegitimateInterest = 'I accept the processing of personal data on the grounds of Legitimate Interest by:';
        $ccc_def_cookiecontrol_iabAcceptAll = 'Accept All';
        $ccc_def_cookiecontrol_iabRejectAll = 'Reject All';
        $ccc_def_cookiecontrol_iabDataUse = 'How data is used';
        $ccc_def_cookiecontrol_iabSavePreferences = 'Save Preferences and Exit';
        $ccc_def_cookiecontrol_iabLegalDescription = 'Read full legal description';
        $ccc_def_cookiecontrol_iabCookieMaxAge = 'Cookie Max-Age:';
        $ccc_def_cookiecontrol_iabUsesNonCookieAccessTrue = 'Uses other means for storing information, eg. localstorage';
        $ccc_def_cookiecontrol_iabUsesNonCookieAccessFalse = 'Only uses cookies to store information';
        $ccc_def_cookiecontrol_iabStorageDisclosures = 'Device Storage Duration & Access Disclosure';
        $ccc_def_cookiecontrol_iabDisclosureDetailsColumn = 'Storage Details';
        $ccc_def_cookiecontrol_iabDisclosurePurposesColumn = 'Purposes';
        $ccc_def_cookiecontrol_iabSeconds = 'seconds';
        $ccc_def_cookiecontrol_iabMinutes = 'minutes';
        $ccc_def_cookiecontrol_iabHours = 'hours';
        $ccc_def_cookiecontrol_iabDays = 'days';
        $ccc_def_cookiecontrol_iabGoogleVendors = 'Google Vendors';
        $ccc_def_cookiecontrol_iabGoogleVendorInformation = 'Cookies may be shared across the following domains:';
        $ccc_def_cookiecontrol_objectPurposeLegitimateInterest = 'I object to the processing of personal data on the grounds of Legitimate Interest for the purpose:';
        $ccc_def_cookiecontrol_objectVendorLegitimateInterest = 'I object to the processing of personal data on the grounds of Legitimate Interest by:';
        $ccc_def_cookiecontrol_relyConsent = 'Relying on consent for:';
        $ccc_def_cookiecontrol_relyLegitimateInterest = 'Relying on legitimate interests for:';
        $ccc_def_cookiecontrol_iabVendorDataUses = 'Data collected and processed by vendor:';
        $ccc_def_cookiecontrol_iabDataRetention = 'day data retention period';
        $ccc_def_cookiecontrol_iabPrivacy = 'Privacy Policy';
        $ccc_def_cookiecontrol_iabLiClaims = 'Legitimate Interests at stake';
        $ccc_def_cookiecontrol_iabVendorCount = 'third party vendors are seeking consent or wishing to pursue data processing purposes on the basis of their legitimate interests.';
        $ccc_def_cookiecontrol_iabIllustrationsDescription = 'Read illustrations of possible use scenarios';
        $ccc_def_cookiecontrol_iabIncludeVendors = '';
        $ccc_def_cookiecontrol_govUkacceptMessage =  ('You have accepted additional cookies. You can <a href=\'' . ((isset( $ccc_options_v9['privacyURL']) && !empty( $ccc_options_v9['privacyURL'] ) ) ? esc_url($ccc_options_v9['privacyURL']): "" ).'\'>change your cookie settings</a> at any time.');
        $ccc_def_cookiecontrol_govUkrejectMessage = ('You have rejected additional cookies. You can <a href=\'' . ((isset( $ccc_options_v9['privacyURL']) && !empty( $ccc_options_v9['privacyURL'] ) ) ? esc_url($ccc_options_v9['privacyURL']): "" ).'\'>change your cookie settings</a> at any time.');
        $ccc_def_cookiecontrol_govUkFormSuccessMessage = 'You have set your preferences.';
        $ccc_def_cookiecontrol_govUkFormNecessaryTitle = '';
        $ccc_def_cookiecontrol_govUkFormNecessaryMessage = '';
        // define defaults
        $ccc_cookiecontrol_defaults = apply_filters(
            'cookiecontrol_defaults',
            array(
                'logConsent' => $ccc_def_cookiecontrol_logConsent,
                'subDomains' => $ccc_cookiecontrol_subDomains,
                'encodeCookie' => $ccc_cookiecontrol_encodeCookie,
                'mode' => $ccc_cookiecontrol_mode,
                'notifyOnce' => $ccc_def_cookiecontrol_notifyOnce,
                'wrapInnerHTML' => $ccc_def_cookiecontrol_wrapInnerHTML,
                'initialState' => $ccc_def_cookiecontrol_initialState,
                'position' => $ccc_def_cookiecontrol_position,
                'theme' => $ccc_def_cookiecontrol_theme,
                'layout' => $ccc_def_cookiecontrol_layout,
                'toggleType' => $ccc_def_cookiecontrol_toggleType,
                'acceptBehaviour' => $ccc_def_cookiecontrol_acceptBehaviour,
                'closeOnGlobalChange' => $ccc_def_cookiecontrol_closeOnGlobalChange,
                'closeStyle' => $ccc_def_cookiecontrol_closeStyle,
                'settingsStyle' => $ccc_def_cookiecontrol_settingsStyle,
                'expiry' => $ccc_def_cookiecontrol_expiry,
                'sameSiteCookie' =>  $ccc_def_cookiecontrol_sameSiteCookie,
                'notifyDismissButton' => $ccc_def_cookiecontrol_notifyDismissButton, 
                'sameSiteValue' => $ccc_def_cookiecontrol_sameSiteValue,

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
                'rejectText' => $ccc_def_cookiecontrol_rejectText,
                'rejectBackground'=> $ccc_def_cookiecontrol_rejectBackground,
                'closeText' => $ccc_def_cookiecontrol_closeText,
                'closeBackground' => $ccc_def_cookiecontrol_closeBackground,
                'notifyFontColor' => $ccc_def_cookiecontrol_notifyFontColor,
                'notifyBackgroundColor' => $ccc_def_cookiecontrol_notifyBackgroundColor,

                'titleText' => $ccc_def_cookiecontrol_titleText,
                'introText' => $ccc_def_cookiecontrol_introText,
                'privacyURL' => $ccc_def_cookiecontrol_privacyURL,
                'privacyUpdateDate' => $ccc_def_cookiecontrol_privacyUpdateDate,
                'privacyName' => $ccc_def_cookiecontrol_privacyName,
                'privacyDescription' => $ccc_def_cookiecontrol_privacyDescription,
                'ccpaPrivacyURL' => $ccc_def_cookiecontrol_ccpaPrivacyURL,
                'ccpaPrivacyName' => $ccc_def_cookiecontrol_ccpaPrivacyName,
                'ccpaPrivacyDescription' => $ccc_def_cookiecontrol_ccpaPrivacyDescription,
                'ccpaPrivacyUpdateDate' => $ccc_def_cookiecontrol_ccpaPrivacyUpdateDate,
                'ccpaRejectButton' => $ccc_def_cookiecontrol_ccpaRejectButton,
                'necessaryTitle' => $ccc_def_cookiecontrol_necessaryTitle,
                'necessaryDescription' => $ccc_def_cookiecontrol_necessaryDescription,
                'thirdPartyTitle' => $ccc_def_cookiecontrol_thirdPartyTitle,
                'thirdPartyDescription' => $ccc_def_cookiecontrol_thirdPartyDescription,
                'onText' => $ccc_def_cookiecontrol_onText,
                'offText' => $ccc_def_cookiecontrol_offText,
                'acceptText' => $ccc_def_cookiecontrol_acceptText,
                'settingsText' => $ccc_def_cookiecontrol_settingsText,
                'acceptRecommended' => $ccc_def_cookiecontrol_acceptRecommended,
                'acceptSettings' =>  $ccc_def_cookiecontrol_acceptSettings,
                'rejectButton' => $ccc_def_cookiecontrol_rejectButton,
                'reject' => $ccc_def_cookiecontrol_reject,
                'rejectSettings' => $ccc_def_cookiecontrol_rejectSettings,
                'notifyTitle' => $ccc_def_cookiecontrol_notifyTitle,
                'notifyDescription' => $ccc_def_cookiecontrol_notifyDescription,
                'closeLabel' => $ccc_def_cookiecontrol_closeLabel,
                'accessibilityAlert' => $ccc_def_cookiecontrol_accessibilityAlert,
                'cornerButton' => $ccc_def_cookiecontrol_cornerButton ,
                'landmark' => $ccc_def_cookiecontrol_landmark ,
                'showVendors' => $ccc_def_cookiecontrol_showVendors,
                'thirdPartyCookies' => $ccc_def_cookiecontrol_thirdPartyCookies,
                'readMore' => $ccc_def_cookiecontrol_readMore,
                'chooseLocale' => $ccc_def_cookiecontrol_chooseLocale,

                'accessKey' => $ccc_def_cookiecontrol_accessKey,
                'highlightFocus' => $ccc_def_cookiecontrol_highlightFocus,
                'outline' => $ccc_def_cookiecontrol_outline, 
                'overlay' => $ccc_def_cookiecontrol_overlay,
                'disableSiteScrolling' => $ccc_def_cookiecontrol_disableSiteScrolling,
                'iabCMP' => $ccc_def_cookiecontrol_iabCMP,
                'publisherCC' =>   $ccc_def_cookiecontrol_publisherCC,
                'dropDowns' => $ccc_def_cookiecontrol_dropDowns,
                'fullLegalDescriptions' => $ccc_def_cookiecontrol_fullLegalDescriptions,
                'saveOnlyOnClose' => $ccc_def_cookiecontrol_saveOnlyOnClose,

                'iabPanelTitle' => $ccc_def_cookiecontrol_iabPanelTitle,
                'iabPanelIntro' => $ccc_def_cookiecontrol_iabPanelIntro,
                'iabPanelIntro2' => $ccc_def_cookiecontrol_iabPanelIntro2,
                'iabPanelIntro3' => $ccc_def_cookiecontrol_iabPanelIntro3,
                'iabAboutIab' => $ccc_def_cookiecontrol_iabAboutIab,
                'iabIabName' => $ccc_def_cookiecontrol_iabIabName,
                'iabIabLink' => $ccc_def_cookiecontrol_iabIabLink,
                'iabVendorTitle' => $ccc_def_cookiecontrol_iabVendorTitle,
                'iabPurposes' => $ccc_def_cookiecontrol_iabPurposes,
                'iabFeatures' => $ccc_def_cookiecontrol_iabFeatures,
                'iabSpecialPurposes' => $ccc_def_cookiecontrol_iabSpecialPurposes,
                'iabSpecialFeatures' => $ccc_def_cookiecontrol_iabSpecialFeatures,
                'iabPurposeLegitimateInterest' => $ccc_def_cookiecontrol_iabPurposeLegitimateInterest,
                'iabVendorLegitimateInterest' => $ccc_def_cookiecontrol_iabVendorLegitimateInterest,

                'iabAcceptAll' => $ccc_def_cookiecontrol_iabAcceptAll,
                'iabRejectAll' => $ccc_def_cookiecontrol_iabRejectAll,
                'iabDataUse' => $ccc_def_cookiecontrol_iabDataUse,
                'iabSavePreferences' => $ccc_def_cookiecontrol_iabSavePreferences,
                'iabLegalDescription' => $ccc_def_cookiecontrol_iabLegalDescription,
                'iabRelyConsent' => $ccc_def_cookiecontrol_relyConsent,
                'iabRelyLegitimateInterest' => $ccc_def_cookiecontrol_relyLegitimateInterest,
                'iabCookieMaxAge' => $ccc_def_cookiecontrol_iabCookieMaxAge,
                'iabUsesNonCookieAccessTrue' => $ccc_def_cookiecontrol_iabUsesNonCookieAccessTrue,
                'iabUsesNonCookieAccessFalse' => $ccc_def_cookiecontrol_iabUsesNonCookieAccessFalse,
                'iabStorageDisclosures' => $ccc_def_cookiecontrol_iabStorageDisclosures,
                'iabDisclosureDetailsColumn' => $ccc_def_cookiecontrol_iabDisclosureDetailsColumn,
                'iabDisclosurePurposesColumn' => $ccc_def_cookiecontrol_iabDisclosurePurposesColumn,
                'iabSeconds' => $ccc_def_cookiecontrol_iabSeconds,
                'iabMinutes' => $ccc_def_cookiecontrol_iabMinutes,
                'iabHours' => $ccc_def_cookiecontrol_iabHours,
                'iabDays' => $ccc_def_cookiecontrol_iabDays,
                'iabGoogleVendors' => $ccc_def_cookiecontrol_iabGoogleVendors,
                'iabGoogleVendorInformation' => $ccc_def_cookiecontrol_iabGoogleVendorInformation,
                'iabVendorDataUses' => $ccc_def_cookiecontrol_iabVendorDataUses,
                'iabDataRetention' => $ccc_def_cookiecontrol_iabDataRetention,
                'iabPrivacy' =>  $ccc_def_cookiecontrol_iabPrivacy,
                'iabLiClaims' => $ccc_def_cookiecontrol_iabLiClaims,
                'iabVendorCount' => $ccc_def_cookiecontrol_iabVendorCount,
                'iabIllustrationsDescription' => $ccc_def_cookiecontrol_iabIllustrationsDescription,
                'iabIncludeVendors' => $ccc_def_cookiecontrol_iabIncludeVendors,
                'govUkacceptMessage' =>  $ccc_def_cookiecontrol_govUkacceptMessage,
                'govUkrejectMessage' =>  $ccc_def_cookiecontrol_govUkrejectMessage,
                'govUkFormSuccessMessage' =>  $ccc_def_cookiecontrol_govUkFormSuccessMessage,
                'govUkFormNecessaryTitle' => $ccc_def_cookiecontrol_govUkFormNecessaryTitle,
                'govUkFormNecessaryMessage' => $ccc_def_cookiecontrol_govUkFormNecessaryMessage,
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

        $ccc_options_v9 = get_option('civic_cookiecontrol_settings_v9');

        $allowedHTML = array(
            'a'      => array(
                'href'  => array(),
                'title' => array(),
                'target' => array()
            ),
            'br'     => array(),
            'em'     => array(),
            'strong' => array(),
            'p'      => array(),
            'ul'     => array(),
            'ol'     => array(),
            'li'     => array(),
            'b' => array(),
            'span' => array(),
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
        $input['wrapInnerHTML']   = isset($input['wrapInnerHTML']) ?  wp_filter_nohtml_kses( $input['wrapInnerHTML'] ) : $ccc_options_defaults['wrapInnerHTML'];
        $input['initialState'] = isset($input['initialState']) ?  wp_filter_nohtml_kses( $input['initialState'] ) : $ccc_options_defaults['initialState'];
        $input['toggleType']   = isset($input['toggleType']) ?  wp_filter_nohtml_kses( $input['toggleType'] ) : $ccc_options_defaults['toggleType'];
        $input['closeStyle']   = isset($input['closeStyle']) ?  wp_filter_nohtml_kses( $input['closeStyle'] ) : $ccc_options_defaults['closeStyle'];
        $input['settingsStyle']   = isset($input['settingsStyle']) ?  wp_filter_nohtml_kses( $input['settingsStyle'] ) : $ccc_options_defaults['settingsStyle'];
        $input['expiry']       = ( empty( $input['expiry'] ) || ! is_numeric( $input['expiry'] ) ) ? '' : $input['expiry'];
        $input['mode']         = isset($input['mode']) ?  wp_filter_nohtml_kses( $input['mode'] ) : (isset($ccc_options_v9['mode'])? $ccc_options_v9['mode'] :  $ccc_options_defaults['mode']);
        $input['acceptBehaviour']   = isset($input['acceptBehaviour']) ?  wp_filter_nohtml_kses( $input['acceptBehaviour'] ) : (isset($ccc_options_v9['acceptBehaviour'])? $ccc_options_v9['acceptBehaviour'] :  $ccc_options_defaults['acceptBehaviour']);
        $input['closeOnGlobalChange']   = isset($input['closeOnGlobalChange']) ?  wp_filter_nohtml_kses( $input['closeOnGlobalChange'] ) :  (isset($ccc_options_v9['closeOnGlobalChange'])? $ccc_options_v9['closeOnGlobalChange'] :  $ccc_options_defaults['closeOnGlobalChange']);
        $input['sameSiteCookie']   = isset($input['sameSiteCookie']) ?  wp_filter_nohtml_kses( $input['sameSiteCookie'] ) : (isset($ccc_options_v9['sameSiteCookie'])? $ccc_options_v9['sameSiteCookie'] :  $ccc_options_defaults['sameSiteCookie']);
        $input['notifyDismissButton'] = isset($input['notifyDismissButton']) ?  wp_filter_nohtml_kses( $input['notifyDismissButton'] ) : (isset($ccc_options_v9['notifyDismissButton'])? $ccc_options_v9['notifyDismissButton'] :  $ccc_options_defaults['notifyDismissButton']);
        $input['sameSiteValue']     = isset($input['sameSiteValue']) ?  wp_filter_nohtml_kses( $input['sameSiteValue'] ) : (isset($ccc_options_v9['sameSiteValue'])? $ccc_options_v9['sameSiteValue'] :  $ccc_options_defaults['sameSiteValue']);

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
        $input['privacyURL']            =  isset($input['privacyURL']) ? sanitize_text_field( $input['privacyURL'] ): $ccc_options_defaults['privacyURL'];
        $input['privacyName'] =  isset($input['privacyName']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['privacyName'] ) ) : $ccc_options_defaults['privacyName']; 
        $input['privacyDescription'] =  isset($input['privacyDescription']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['privacyDescription'] ) ) : $ccc_options_defaults['privacyDescription']; 
        $input['privacyUpdateDate'] =  isset($input['privacyUpdateDate']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['privacyUpdateDate'] ) ) : $ccc_options_defaults['privacyUpdateDate']; 

        $input['ccpaPrivacyURL']            =  isset($input['ccpaPrivacyURL']) ? sanitize_text_field( $input['ccpaPrivacyURL'] ): $ccc_options_defaults['ccpaPrivacyURL'];
        $input['ccpaPrivacyName'] =  isset($input['ccpaPrivacyName']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['ccpaPrivacyName'] ) ) : $ccc_options_defaults['ccpaPrivacyName']; 
        $input['ccpaPrivacyDescription'] =  isset($input['ccpaPrivacyDescription']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['ccpaPrivacyDescription'] ) ) : $ccc_options_defaults['ccpaPrivacyDescription']; 
        $input['ccpaPrivacyUpdateDate'] =  isset($input['ccpaPrivacyUpdateDate']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['ccpaPrivacyUpdateDate'] ) ) : $ccc_options_defaults['ccpaPrivacyUpdateDate']; 
        $input['ccpaRejectButton'] =  isset($input['ccpaRejectButton']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['ccpaRejectButton'] ) ) : $ccc_options_defaults['ccpaRejectButton']; 

        $input['acceptRecommended'] =  isset($input['acceptRecommended']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['acceptRecommended'] ) ): $ccc_options_defaults['acceptRecommended'];
        $input['acceptSettings'] = isset($input['acceptSettings']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['acceptSettings'] ) ): (isset($ccc_options_v9['acceptSettings'])? $ccc_options_v9['acceptSettings'] :  $ccc_options_defaults['acceptSettings']);
        $input['rejectButton']   =  isset($input['rejectButton']) ? wp_filter_nohtml_kses( $input['rejectButton'] ): $ccc_options_defaults['rejectButton'];
        $input['rejectSettings'] =  isset($input['rejectSettings']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['rejectSettings'] ) ): $ccc_options_defaults['rejectSettings'];
        $input['reject'] =  isset($input['reject']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['reject'] ) ): $ccc_options_defaults['reject'];
        $input['notifyTitle']       =  isset($input['notifyTitle']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['notifyTitle'] ) ): $ccc_options_defaults['notifyTitle'];
        $input['notifyDescription'] =  isset($input['notifyDescription']) ?  wp_kses( $input['notifyDescription'], $allowedHTML ): $ccc_options_defaults['notifyDescription'];

        $input['closeLabel']         =  isset($input['closeLabel']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['closeLabel'] ) ): $ccc_options_defaults['closeLabel'];
        $input['accessibilityAlert'] =  isset($input['accessibilityAlert']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['accessibilityAlert'] ) ): $ccc_options_defaults['accessibilityAlert'];

        $input['cornerButton'] = isset($input['cornerButton']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['cornerButton'] ) ): (isset($ccc_options_v9['cornerButton'])? $ccc_options_v9['cornerButton'] :  $ccc_options_defaults['cornerButton']);
        $input['landmark'] = isset($input['landmark']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['landmark'] ) ): (isset($ccc_options_v9['landmark'])? $ccc_options_v9['landmark'] :  $ccc_options_defaults['landmark']);
        $input['showVendors'] = isset($input['showVendors']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['showVendors'] ) ): (isset($ccc_options_v9['showVendors'])? $ccc_options_v9['showVendors'] :  $ccc_options_defaults['showVendors']);
        $input['thirdPartyCookies'] = isset($input['thirdPartyCookies']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['thirdPartyCookies'] ) ): (isset($ccc_options_v9['thirdPartyCookies'])? $ccc_options_v9['thirdPartyCookies'] :  $ccc_options_defaults['thirdPartyCookies']);
        $input['readMore'] = isset($input['readMore']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['readMore'] ) ): (isset($ccc_options_v9['readMore'])? $ccc_options_v9['readMore'] :  $ccc_options_defaults['readMore']);

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
        $input['rejectText']  = ( empty( $input['rejectText'] ) || ! preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $input['rejectText'] ) ) ? (isset($ccc_options_v9['rejectText'])? $ccc_options_v9['rejectText'] :  $ccc_options_defaults['rejectText']) : $input['rejectText'];
        $input['rejectBackground'] = ( empty( $input['rejectBackground'] ) || ! preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $input['rejectBackground'] ) ) ? (isset($ccc_options_v9['rejectBackground'])? $ccc_options_v9['rejectBackground'] :  $ccc_options_defaults['rejectBackground']): $input['rejectBackground'];
        $input['closeText'] = ( empty( $input['closeText'] ) || ! preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $input['closeText'] ) ) ? (isset($ccc_options_v9['closeText'])? $ccc_options_v9['closeText'] :  $ccc_options_defaults['closeText']): $input['closeText'];
        $input['closeBackground'] = ( empty( $input['closeBackground'] ) || ! preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $input['closeBackground'] ) ) ? (isset($ccc_options_v9['closeBackground'])? $ccc_options_v9['closeBackground'] :  $ccc_options_defaults['closeBackground']): $input['closeBackground'];
        $input['notifyFontColor'] = ( empty( $input['notifyFontColor'] ) || ! preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $input['notifyFontColor'] ) ) ? (isset($ccc_options_v9['notifyFontColor'])? $ccc_options_v9['notifyFontColor'] :  $ccc_options_defaults['notifyFontColor']): $input['notifyFontColor'];
        $input['notifyBackgroundColor'] = ( empty( $input['notifyBackgroundColor'] ) || ! preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $input['notifyBackgroundColor'] ) ) ? (isset($ccc_options_v9['notifyBackgroundColor'])? $ccc_options_v9['notifyBackgroundColor'] :  $ccc_options_defaults['notifyBackgroundColor']): $input['notifyBackgroundColor'];

        $input['chooseLocale']     = isset($input['chooseLocale']) ?  wp_filter_nohtml_kses( $input['chooseLocale'] ) : (isset($ccc_options_v9['chooseLocale'])? $ccc_options_v9['chooseLocale'] :  $ccc_options_defaults['chooseLocale']);

        $input['onLoad'] = isset($input['onLoad']) ? $input['onLoad'] : '';

        if ( ! empty( $input['optionalCookiesName'] ) && is_array( $input['optionalCookiesName'] ) ) {

            foreach ( $input['optionalCookiesName'] as $key => $val ) :
                $input['optionalCookiesName'][ $key ]                  = str_replace( ' ', '_', sanitize_text_field( $input['optionalCookiesName'][ $key ] ) );
                $input['optionalCookiesLabel'][ $key ]                 = esc_js( wp_strip_all_tags( $input['optionalCookiesLabel'][ $key ] ) );
                $input['optionalCookiesDescription'][ $key ]           = esc_js( wp_strip_all_tags( $input['optionalCookiesDescription'][ $key ] ) );
                $input['optionalCookiesArray'][ $key ]                 = stripslashes( sanitize_textarea_field( $input['optionalCookiesArray'][ $key ] ) );
                
                $input['optionalCookiesVendorName'][ $key ]           =  isset($input['optionalCookiesVendorName'][ $key ]) ? sanitize_text_field( $input['optionalCookiesVendorName'][ $key ] ) : $ccc_options_v9['optionalCookiesVendorName'][ $key ];
                $input['optionalCookiesVendorUrl'][ $key ]           = isset($input['optionalCookiesVendorUrl'][ $key ]) ? sanitize_text_field( $input['optionalCookiesVendorUrl'][ $key ] ) :  $ccc_options_v9['optionalCookiesVendorUrl'][ $key ];
                $input['optionalCookiesVendorDescription'][ $key ]           = isset($input['optionalCookiesVendorDescription'][ $key ]) ? sanitize_text_field( $input['optionalCookiesVendorDescription'][ $key ] ) :  $ccc_options_v9['optionalCookiesVendorDescription'][ $key ];;

                $input['optionalCookiesthirdPartyCookiesName'][ $key ] = sanitize_text_field( $input['optionalCookiesthirdPartyCookiesName'][ $key ] );
                $input['optionalCookiesthirdPartyCookiesUrl'][ $key ]  = sanitize_text_field( $input['optionalCookiesthirdPartyCookiesUrl'][ $key ] );
                if ( isset( $input[ 'optionalCookiesthirdPartyCookiesName' . $key ] ) ) {
                    foreach ( $input[ 'optionalCookiesthirdPartyCookiesName' . $key ] as $key2 => $val2 ) {
                        $input[ 'optionalCookiesthirdPartyCookiesName' . $key . '' ][ $key2 ] = sanitize_text_field( $input[ 'optionalCookiesthirdPartyCookiesName' . $key . '' ][ $key2 ] );
                        $input[ 'optionalCookiesthirdPartyCookiesUrl' . $key . '' ][ $key2 ]  = sanitize_text_field( $input[ 'optionalCookiesthirdPartyCookiesUrl' . $key . '' ][ $key2 ] );
                    }
                }
                if ( isset( $input[ 'optionalCookiesVendorName' . $key ] ) ) {
                    foreach ( $input[ 'optionalCookiesVendorName' . $key ] as $key2 => $val2 ) {
                                
                        $input['optionalCookiesVendorName' . $key . '' ][ $key2 ]          = isset($input['optionalCookiesVendorName' . $key . '' ][ $key2 ]) ? sanitize_text_field( $input['optionalCookiesVendorName' . $key . '' ][ $key2 ] ) : $ccc_options_v9['optionalCookiesVendorName' . $key . '' ][ $key2 ] ;
                        $input['optionalCookiesVendorUrl' . $key . '' ][ $key2 ]           = isset($input['optionalCookiesVendorUrl' . $key . '' ][ $key2 ]) ? sanitize_text_field( $input['optionalCookiesVendorUrl' . $key . '' ][ $key2 ] ) : $ccc_options_v9['optionalCookiesVendorUrl' . $key . '' ][ $key2 ] ;
                        $input['optionalCookiesVendorDescription' . $key . '' ][ $key2 ]   = isset($input['optionalCookiesVendorDescription' . $key . '' ][ $key2 ]) ? sanitize_text_field( $input['optionalCookiesVendorDescription' . $key . '' ][ $key2 ] ) : $ccc_options_v9['optionalCookiesVendorDescription' . $key . '' ][ $key2 ] ;
                      
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

                $input['altLanguagesMode'][ $key ]   = isset( $input['altLanguagesMode'][$key]) ? wp_filter_nohtml_kses( $input['altLanguagesMode'][$key] ) : (isset($ccc_options_v9['altLanguagesMode'][$key])? $ccc_options_v9['altLanguagesMode'][$key]: "");


            endforeach;
        }

        $input['accessKey']   = isset($input['accessKey']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['accessKey'] ) ): $ccc_options_defaults['accessKey'];
        $input['highlightFocus']   = isset($input['highlightFocus']) ? wp_filter_nohtml_kses( $input['highlightFocus'] ): $ccc_options_defaults['highlightFocus'];
        $input['outline']   = isset($input['outline']) ? wp_filter_nohtml_kses( $input['outline'] ): $ccc_options_defaults['outline'];
        $input['overlay']   = isset($input['overlay']) ? wp_filter_nohtml_kses( $input['overlay'] ): $ccc_options_defaults['overlay'];
        $input['disableSiteScrolling']   = isset($input['disableSiteScrolling']) ? wp_filter_nohtml_kses( $input['disableSiteScrolling'] ): $ccc_options_defaults['disableSiteScrolling'];


        $input['iabCMP']   = isset($input['iabCMP']) ? wp_filter_nohtml_kses( $input['iabCMP'] ): $ccc_options_defaults['iabCMP'];
        $input['publisherCC']   = isset($input['publisherCC']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['publisherCC'] )) : (isset($ccc_options_v9['publisherCC'])? $ccc_options_v9['publisherCC'] :  $ccc_options_defaults['publisherCC']);
        $input['dropDowns']   = isset($input['dropDowns']) ?  wp_filter_nohtml_kses( $input['dropDowns']): (isset($ccc_options_v9['dropDowns'])? wp_filter_nohtml_kses( $ccc_options_v9['dropDowns'] ) :  $ccc_options_defaults['dropDowns']);
        $input['fullLegalDescriptions']   = isset($input['fullLegalDescriptions']) ?  wp_filter_nohtml_kses( $input['fullLegalDescriptions']): (isset($ccc_options_v9['fullLegalDescriptions'])? wp_filter_nohtml_kses( $ccc_options_v9['fullLegalDescriptions'] ) :  $ccc_options_defaults['fullLegalDescriptions']);
        $input['saveOnlyOnClose']   = isset($input['saveOnlyOnClose']) ?  wp_filter_nohtml_kses( $input['saveOnlyOnClose']): (isset($ccc_options_v9['saveOnlyOnClose'])? wp_filter_nohtml_kses( $ccc_options_v9['saveOnlyOnClose'] ) :  $ccc_options_defaults['saveOnlyOnClose']);
        $input['iabPanelTitle']   = isset($input['iabPanelTitle']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabPanelTitle'] ) ): $ccc_options_defaults['iabPanelTitle'];
        $input['iabPanelIntro']   = isset($input['iabPanelIntro']) ? wp_kses( $input['iabPanelIntro'], $allowedHTML ): $ccc_options_defaults['iabPanelIntro'];
        $input['iabPanelIntro2']   = isset($input['iabPanelIntro2']) ?  wp_kses( $input['iabPanelIntro2'], $allowedHTML ): (isset($ccc_options_v9['iabPanelIntro2'])? wp_kses( $ccc_options_v9['iabPanelIntro2'], $allowedHTML ) :  $ccc_options_defaults['iabPanelIntro2']);
        $input['iabPanelIntro3']   = isset($input['iabPanelIntro3']) ?  wp_kses( $input['iabPanelIntro3'], $allowedHTML ): (isset($ccc_options_v9['iabPanelIntro3'])? wp_kses( $ccc_options_v9['iabPanelIntro3'], $allowedHTML ) :  $ccc_options_defaults['iabPanelIntro3']);
        $input['iabAboutIab']   = isset($input['iabAboutIab']) ?  wp_kses( $input['iabAboutIab'], $allowedHTML ): (isset($ccc_options_v9['iabAboutIab'])? wp_kses( $input['iabAboutIab'], $allowedHTML ) :  $ccc_options_defaults['iabAboutIab']);
        $input['iabIabName']   = isset($input['iabIabName']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabIabName'] ) ): $ccc_options_defaults['iabIabName'];
        $input['iabIabLink']   = isset($input['iabIabLink']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabIabLink'] ) ): $ccc_options_defaults['iabIabLink'];
        $input['iabVendorTitle']   = isset($input['iabVendorTitle']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabVendorTitle'] ) ): $ccc_options_defaults['iabVendorTitle'];
        $input['iabPurposes']   = isset($input['iabPurposes']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabPurposes'] ) ): (isset($ccc_options_v9['iabPurposes'])? $ccc_options_v9['iabPurposes'] :  $ccc_options_defaults['iabPurposes']);
        $input['iabSpecialPurposes']   = isset($input['iabSpecialPurposes']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabSpecialPurposes'] ) ): (isset($ccc_options_v9['iabSpecialPurposes'])? $ccc_options_v9['iabSpecialPurposes'] :  $ccc_options_defaults['iabSpecialPurposes']);
        $input['iabSpecialFeatures']   = isset($input['iabSpecialFeatures']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabSpecialFeatures'] ) ): (isset($ccc_options_v9['iabSpecialFeatures'])? $ccc_options_v9['iabSpecialFeatures'] :  $ccc_options_defaults['iabSpecialFeatures']);
        $input['iabPurposeLegitimateInterest']   = isset($input['iabPurposeLegitimateInterest']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabPurposeLegitimateInterest'] ) ): (isset($ccc_options_v9['iabPurposeLegitimateInterest'])? $ccc_options_v9['iabPurposeLegitimateInterest'] :  $ccc_options_defaults['iabPurposeLegitimateInterest']);
        $input['iabVendorLegitimateInterest']   = isset($input['iabVendorLegitimateInterest']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabVendorLegitimateInterest'] ) ): (isset($ccc_options_v9['iabVendorLegitimateInterest'])? $ccc_options_v9['iabVendorLegitimateInterest'] :  $ccc_options_defaults['iabVendorLegitimateInterest']);
        $input['iabFeatures']   = isset($input['iabFeatures']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabFeatures'] ) ): (isset($ccc_options_v9['iabFeatures'])? $ccc_options_v9['iabFeatures'] :  $ccc_options_defaults['iabFeatures']);
        $input['iabAcceptAll']   = isset($input['iabAcceptAll']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabAcceptAll'] ) ): $ccc_options_defaults['iabAcceptAll'];
        $input['iabRejectAll']   = isset($input['iabRejectAll']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabRejectAll'] ) ): $ccc_options_defaults['iabRejectAll'];
        $input['iabDataUse']   = isset($input['iabDataUse']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabDataUse'] ) ): (isset($ccc_options_v9['iabDataUse'])? $ccc_options_v9['iabDataUse'] :  $ccc_options_defaults['iabDataUse']);
        $input['iabSavePreferences']   = isset($input['iabSavePreferences']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabSavePreferences'] ) ): (isset($ccc_options_v9['iabSavePreferences'])? $ccc_options_v9['iabSavePreferences'] :  $ccc_options_defaults['iabSavePreferences']);
        $input['iabLegalDescription']   = isset($input['iabLegalDescription']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabLegalDescription'] ) ): (isset($ccc_options_v9['iabLegalDescription'])? $ccc_options_v9['iabLegalDescription'] :  $ccc_options_defaults['iabLegalDescription']);
        $input['iabRelyConsent']  = isset($input['iabRelyConsent']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabRelyConsent'] ) ): (isset($ccc_options_v9['iabRelyConsent'])? $ccc_options_v9['iabRelyConsent'] :  $ccc_options_defaults['iabRelyConsent']);
        $input['iabRelyLegitimateInterest']  = isset($input['iabRelyLegitimateInterest']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabRelyLegitimateInterest'] ) ): (isset($ccc_options_v9['iabRelyLegitimateInterest'])? $ccc_options_v9['iabRelyLegitimateInterest'] :  $ccc_options_defaults['iabRelyLegitimateInterest']);
        $input['iabCookieMaxAge']  = isset($input['iabCookieMaxAge']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabCookieMaxAge'] ) ): (isset($ccc_options_v9['iabCookieMaxAge'])? $ccc_options_v9['iabCookieMaxAge'] :  $ccc_options_defaults['iabCookieMaxAge']);
        $input['iabUsesNonCookieAccessTrue']  = isset($input['iabUsesNonCookieAccessTrue']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabUsesNonCookieAccessTrue'] ) ): (isset($ccc_options_v9['iabUsesNonCookieAccessTrue'])? $ccc_options_v9['iabUsesNonCookieAccessTrue'] :  $ccc_options_defaults['iabUsesNonCookieAccessTrue']);
        $input['iabUsesNonCookieAccessFalse']  = isset($input['iabUsesNonCookieAccessFalse']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabUsesNonCookieAccessFalse'] ) ): (isset($ccc_options_v9['iabUsesNonCookieAccessFalse'])? $ccc_options_v9['iabUsesNonCookieAccessFalse'] :  $ccc_options_defaults['iabUsesNonCookieAccessFalse']);
        $input['iabStorageDisclosures']  = isset($input['iabStorageDisclosures']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabStorageDisclosures'] ) ): (isset($ccc_options_v9['iabStorageDisclosures'])? $ccc_options_v9['iabStorageDisclosures'] :  $ccc_options_defaults['iabStorageDisclosures']);
        $input['iabDisclosureDetailsColumn']  = isset($input['iabDisclosureDetailsColumn']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabDisclosureDetailsColumn'] ) ): (isset($ccc_options_v9['iabDisclosureDetailsColumn'])? $ccc_options_v9['iabDisclosureDetailsColumn'] :  $ccc_options_defaults['iabDisclosureDetailsColumn']);
        $input['iabDisclosurePurposesColumn']  = isset($input['iabDisclosurePurposesColumn']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabDisclosurePurposesColumn'] ) ): (isset($ccc_options_v9['iabDisclosurePurposesColumn'])? $ccc_options_v9['iabDisclosurePurposesColumn'] :  $ccc_options_defaults['iabDisclosurePurposesColumn']);
        $input['iabSeconds']  = isset($input['iabSeconds']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabSeconds'] ) ): (isset($ccc_options_v9['iabSeconds'])? $ccc_options_v9['iabSeconds'] :  $ccc_options_defaults['iabSeconds']);
        $input['iabMinutes']  = isset($input['iabMinutes']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabMinutes'] ) ): (isset($ccc_options_v9['iabMinutes'])? $ccc_options_v9['iabMinutes'] :  $ccc_options_defaults['iabMinutes']);
        $input['iabHours']  = isset($input['iabHours']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabHours'] ) ): (isset($ccc_options_v9['iabHours'])? $ccc_options_v9['iabHours'] :  $ccc_options_defaults['iabHours']);
        $input['iabDays']  = isset($input['iabDays']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabDays'] ) ): (isset($ccc_options_v9['iabDays'])? $ccc_options_v9['iabDays'] :  $ccc_options_defaults['iabDays']);
        $input['iabGoogleVendors']  = isset($input['iabGoogleVendors']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabGoogleVendors'] ) ): (isset($ccc_options_v9['iabGoogleVendors'])? $ccc_options_v9['iabGoogleVendors'] :  $ccc_options_defaults['iabGoogleVendors']);
        $input['iabGoogleVendorInformation']  = isset($input['iabGoogleVendorInformation']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabGoogleVendorInformation'] ) ): (isset($ccc_options_v9['iabGoogleVendorInformation'])? $ccc_options_v9['iabGoogleVendorInformation'] :  $ccc_options_defaults['iabGoogleVendorInformation']);
        $input['iabVendorDataUses']  = isset($input['iabVendorDataUses']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabVendorDataUses'] ) ): (isset($ccc_options_v9['iabVendorDataUses'])? $ccc_options_v9['iabVendorDataUses'] :  $ccc_options_defaults['iabVendorDataUses']);
        $input['iabDataRetention']  = isset($input['iabDataRetention']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabDataRetention'] ) ): (isset($ccc_options_v9['iabDataRetention'])? $ccc_options_v9['iabDataRetention'] :  $ccc_options_defaults['iabDataRetention']);
        $input['iabPrivacy']  = isset($input['iabPrivacy']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabPrivacy'] ) ): (isset($ccc_options_v9['iabPrivacy'])? $ccc_options_v9['iabPrivacy'] :  $ccc_options_defaults['iabPrivacy']);
        $input['iabLiClaims']  = isset($input['iabLiClaims']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabLiClaims'] ) ): (isset($ccc_options_v9['iabLiClaims'])? $ccc_options_v9['iabLiClaims'] :  $ccc_options_defaults['iabLiClaims']);
        $input['iabVendorCount']  = isset($input['iabVendorCount']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabVendorCount'] ) ): (isset($ccc_options_v9['iabVendorCount'])? $ccc_options_v9['iabVendorCount'] :  $ccc_options_defaults['iabVendorCount']);
        $input['iabIllustrationsDescription']  = isset($input['iabIllustrationsDescription']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabIllustrationsDescription'] ) ): (isset($ccc_options_v9['iabIllustrationsDescription'])? $ccc_options_v9['iabIllustrationsDescription'] :  $ccc_options_defaults['iabIllustrationsDescription']);
        $input['iabIncludeVendors']  = isset($input['iabIncludeVendors']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['iabIncludeVendors'] ) ): (isset($ccc_options_v9['iabIncludeVendors'])? $ccc_options_v9['iabIncludeVendors'] :  $ccc_options_defaults['iabIncludeVendors']);
        $input['govUkacceptMessage'] = isset($input['govUkacceptMessage']) ? wp_kses( $input['govUkacceptMessage'], $allowedHTML ) :  wp_kses( $ccc_options_defaults['govUkacceptMessage'], $allowedHTML );
        $input['govUkrejectMessage']   = isset($input['govUkrejectMessage']) ? wp_kses( $input['govUkrejectMessage'], $allowedHTML ):  wp_kses( $ccc_options_defaults['govUkrejectMessage'], $allowedHTML );
        $input['govUkFormSuccessMessage']   = isset($input['govUkFormSuccessMessage']) ? wp_kses( $input['govUkFormSuccessMessage'], $allowedHTML ): $ccc_options_defaults['govUkFormSuccessMessage'];
        $input['govUkFormNecessaryMessage']   = isset($input['govUkFormNecessaryMessage']) ? wp_kses( $input['govUkFormNecessaryMessage'], $allowedHTML ): $ccc_options_defaults['govUkFormNecessaryMessage'];
        $input['govUkFormNecessaryTitle']   = isset($input['govUkFormNecessaryTitle']) ? sanitize_text_field( wp_filter_nohtml_kses( $input['govUkFormNecessaryTitle'] ) ): $ccc_options_defaults['govUkFormNecessaryTitle'];

        return $input;
    }

    function ccc_cookiecontrol_args() {

        if(get_option('civic_cookiecontrol_settings_v9' )){

            $ccc_cookiecontrol_settings = get_option( 'civic_cookiecontrol_settings_v9' );

        }elseif(get_option( $this->plugin_name )){

            $ccc_cookiecontrol_settings = get_option( $this->plugin_name );

        }

        $ccc_cookiecontrol_productval = get_option( 'civic_cookiecontrol_productval' );

        $ccc_cookiecontrol_defaults_sctipt_values = $this->ccc_cookiecontrol_settings_defaults();

        $allowedHTML = array(
            'a'      => array(
                'href'  => array(),
                'title' => array(),
                'target' => array()
            ),
            'br'     => array(),
            'em'     => array(),
            'strong' => array(),
            'p'      => array(),
            'ul'     => array(),
            'ol'     => array(),
            'li'     => array(),
            'b' => array(),
            'span' => array(),
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
            $ccc_output_category_vendors       = '';
            $ccc_output_category_vendors_array = [];

            if ( ! empty( $ccc_cookiecontrol_settings['optionalCookiesVendorName'] ) ) {

                foreach ( $ccc_cookiecontrol_settings['optionalCookiesVendorName'] as $key => $val ) {
                    if ( ( isset( $ccc_cookiecontrol_settings['optionalCookiesVendorName'][ $key ] ) && $ccc_cookiecontrol_settings['optionalCookiesVendorName'][ $key ] ) ) {
                        $ccc_output_category_vendors .= '{"name": "' . $ccc_cookiecontrol_settings['optionalCookiesVendorName'][ $key ] . '",  "url" : "' . $ccc_cookiecontrol_settings['optionalCookiesVendorUrl'][ $key ] . '",  "description" : "' . $ccc_cookiecontrol_settings['optionalCookiesVendorDescription'][ $key ] . '",  "thirdPartyCookies" : ' . $ccc_cookiecontrol_settings['optionalCookiesVendorThirdPartyCookies'][ $key ] . '}';
                        if ( isset( $ccc_cookiecontrol_settings[ 'optionalCookiesVendorName' . $key ] ) ) {

                            foreach ( $ccc_cookiecontrol_settings[ 'optionalCookiesVendorName' . $key ] as $key2 => $val2 ) {

                                $ccc_output_category_vendors .= ' , {"name": "' . $ccc_cookiecontrol_settings[ 'optionalCookiesVendorName' . $key ][ $key2 ] . '", "url" : "' . $ccc_cookiecontrol_settings[ 'optionalCookiesVendorUrl' . $key ][ $key2 ] . '" , "description" : "' . $ccc_cookiecontrol_settings[ 'optionalCookiesVendorDescription' . $key ][ $key2 ] . '" , "thirdPartyCookies" : ' . $ccc_cookiecontrol_settings[ 'optionalCookiesVendorThirdPartyCookies' . $key ][ $key2 ] . '}';
                            }
                        }
                    }
                    $ccc_output_category_vendors_array[] = $ccc_output_category_vendors;
                    $ccc_output_category_vendors         = '';
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
                    initialState: '<?php echo  esc_html( $ccc_cookiecontrol_settings['initialState'] ) ==='CLOSE' || esc_html( $ccc_cookiecontrol_settings['initialState'] ) ==='GOVUK' ? "CLOSED" : esc_html( $ccc_cookiecontrol_settings['initialState'] ); ?>',
                    position: '<?php echo esc_html( $ccc_cookiecontrol_settings['position'] ); ?>',
                    theme: '<?php echo esc_html( $ccc_cookiecontrol_settings['theme'] ); ?>',
                    layout: '<?php echo esc_html( $ccc_cookiecontrol_settings['layout'] ); ?>',
                    toggleType: '<?php echo esc_html( $ccc_cookiecontrol_settings['toggleType'] ); ?>',
                    acceptBehaviour :  '<?php echo isset( $ccc_cookiecontrol_settings['acceptBehaviour']) ?  esc_html( $ccc_cookiecontrol_settings['acceptBehaviour'] ) : 'all'; ?>',
                    closeOnGlobalChange : <?php echo isset( $ccc_cookiecontrol_settings['closeOnGlobalChange']) ?  esc_html( $ccc_cookiecontrol_settings['closeOnGlobalChange'] ) : 'true'; ?>,
                    iabCMP: <?php echo isset( $ccc_cookiecontrol_settings['iabCMP']) &&  $ccc_cookiecontrol_settings['initialState']  !='GOVUK'?  esc_html( $ccc_cookiecontrol_settings['iabCMP'] ) : 'false'; ?>,
                    <?php if(  $ccc_product_val != 'COMMUNITY' && isset($ccc_cookiecontrol_settings['iabCMP']) && $ccc_cookiecontrol_settings['iabCMP'] == 'true'  && $ccc_cookiecontrol_settings['initialState'] !='GOVUK'){ ?>
                    iabConfig: {
                        publisherCC: '<?php  echo esc_html( $ccc_cookiecontrol_settings['publisherCC'] );  ?>',
                        dropDowns:  <?php echo isset( $ccc_cookiecontrol_settings['dropDowns']) ?  esc_html( $ccc_cookiecontrol_settings['dropDowns'] ) :  $ccc_cookiecontrol_defaults_sctipt_values['dropDowns']; ?>,
                        fullLegalDescriptions: <?php echo isset( $ccc_cookiecontrol_settings['fullLegalDescriptions']) ?  esc_html( $ccc_cookiecontrol_settings['fullLegalDescriptions'] ) :  $ccc_cookiecontrol_defaults_sctipt_values['fullLegalDescriptions']; ?>,
                        saveOnlyOnClose: <?php echo isset( $ccc_cookiecontrol_settings['saveOnlyOnClose']) ?  esc_html( $ccc_cookiecontrol_settings['saveOnlyOnClose'] ) : $ccc_cookiecontrol_defaults_sctipt_values['saveOnlyOnClose']; ?>,
                        includeVendors: <?php echo (isset( $ccc_cookiecontrol_settings['iabIncludeVendors']) && !empty($ccc_cookiecontrol_settings['iabIncludeVendors'])) ? wp_kses(stripslashes($ccc_cookiecontrol_settings['iabIncludeVendors']), array(), array())  : "[]"; ?>,
                    },
                    <?php } ?>
                    closeStyle: '<?php echo esc_html( $ccc_cookiecontrol_settings['closeStyle'] ); ?>',
                    consentCookieExpiry: <?php echo !empty( $ccc_cookiecontrol_settings['expiry'] ) ? esc_html( $ccc_cookiecontrol_settings['expiry'] ) : '0'; ?>,
                    subDomains :  <?php echo isset( $ccc_cookiecontrol_settings['subDomains']) ?  esc_html( $ccc_cookiecontrol_settings['subDomains'] ) : 'true'; ?>,
                    mode :  '<?php echo isset( $ccc_cookiecontrol_settings['mode']) ?  esc_html( $ccc_cookiecontrol_settings['mode'] ) : 'gdpr'; ?>',
                    rejectButton: <?php echo isset( $ccc_cookiecontrol_settings['rejectButton']) ?  esc_html( $ccc_cookiecontrol_settings['rejectButton'] ) : 'false'; ?>,
                    settingsStyle : '<?php echo isset( $ccc_cookiecontrol_settings['settingsStyle']) ?  esc_html( $ccc_cookiecontrol_settings['settingsStyle'] ) : 'button'; ?>',
                    encodeCookie : <?php echo isset( $ccc_cookiecontrol_settings['encodeCookie']) ?  esc_html( $ccc_cookiecontrol_settings['encodeCookie'] ) : 'false'; ?>,
                    setInnerHTML: true,
                    wrapInnerHTML : <?php echo isset( $ccc_cookiecontrol_settings['wrapInnerHTML']) ?  esc_html( $ccc_cookiecontrol_settings['wrapInnerHTML'] ) : 'false'; ?>,
                    accessibility: {
                        accessKey: '<?php echo esc_html( $ccc_cookiecontrol_settings['accessKey'] ); ?>',
                        highlightFocus: <?php echo esc_html( $ccc_cookiecontrol_settings['highlightFocus'] ); ?>,
                        outline: <?php echo isset( $ccc_cookiecontrol_settings['outline']) ?  esc_html( $ccc_cookiecontrol_settings['outline'] ) : $ccc_cookiecontrol_defaults_sctipt_values['outline']; ?>,
                        overlay: <?php echo isset( $ccc_cookiecontrol_settings['overlay']) ?  esc_html( $ccc_cookiecontrol_settings['overlay'] ) : $ccc_cookiecontrol_defaults_sctipt_values['overlay']; ?>,
                        disableSiteScrolling: <?php echo isset( $ccc_cookiecontrol_settings['disableSiteScrolling']) ?  esc_html( $ccc_cookiecontrol_settings['disableSiteScrolling'] ) : $ccc_cookiecontrol_defaults_sctipt_values['disableSiteScrolling']; ?>,                       
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
                        acceptSettings: '<?php echo isset( $ccc_cookiecontrol_settings['acceptSettings']) ?  esc_html( $ccc_cookiecontrol_settings['acceptSettings'] ) : 'I Accept'; ?>',
                        notifyTitle: '<?php echo esc_html( $ccc_cookiecontrol_settings['notifyTitle'] ); ?>',
                        notifyDescription: '<?php echo wp_kses( preg_replace( "/\r\n|\r|\n/", '<br/>', $ccc_cookiecontrol_settings['notifyDescription'] ), $allowedHTML ); ?>',
                        closeLabel: '<?php echo esc_html( $ccc_cookiecontrol_settings['closeLabel'] ); ?>',
                        cornerButton :  '<?php echo esc_html( $ccc_cookiecontrol_settings['cornerButton'] ); ?>',
                        landmark :  '<?php echo esc_html( $ccc_cookiecontrol_settings['landmark'] ); ?>',
                        showVendors : '<?php echo isset( $ccc_cookiecontrol_settings['showVendors']) ?  esc_html( $ccc_cookiecontrol_settings['showVendors'] ) : $ccc_cookiecontrol_defaults_sctipt_values['showVendors']; ?>',
                        thirdPartyCookies : '<?php echo isset( $ccc_cookiecontrol_settings['thirdPartyCookies']) ?  esc_html( $ccc_cookiecontrol_settings['thirdPartyCookies'] ) : $ccc_cookiecontrol_defaults_sctipt_values['thirdPartyCookies']; ?>',
                        readMore : '<?php echo isset( $ccc_cookiecontrol_settings['readMore']) ?  esc_html( $ccc_cookiecontrol_settings['readMore'] ) : $ccc_cookiecontrol_defaults_sctipt_values['readMore']; ?>',
                        accessibilityAlert: '<?php echo esc_html( $ccc_cookiecontrol_settings['accessibilityAlert'] ); ?>',
                        rejectSettings: '<?php echo isset( $ccc_cookiecontrol_settings['rejectSettings']) ?  esc_html( $ccc_cookiecontrol_settings['rejectSettings'] ) : 'Reject All'; ?>',
                        reject: '<?php echo isset( $ccc_cookiecontrol_settings['reject']) ?  esc_html( $ccc_cookiecontrol_settings['reject'] ) : 'Reject'; ?>',
                        <?php if(  $ccc_product_val != 'COMMUNITY' && isset($ccc_cookiecontrol_settings['iabCMP']) && $ccc_cookiecontrol_settings['iabCMP'] == 'true' && $ccc_cookiecontrol_settings['initialState'] !='GOVUK' ){ ?>
                        iabCMP: {
                            panelTitle: '<?php echo esc_html( $ccc_cookiecontrol_settings['iabPanelTitle'] ); ?>',
                            panelIntro1: '<?php echo wp_kses( preg_replace( "/\r\n|\r|\n/", '<br/>', $ccc_cookiecontrol_settings['iabPanelIntro'] ), $allowedHTML ); ?>',
                            panelIntro2: '<?php echo wp_kses( preg_replace( "/\r\n|\r|\n/", '<br/>', $ccc_cookiecontrol_settings['iabPanelIntro2'] ), $allowedHTML ); ?>',
                            panelIntro3: '<?php echo wp_kses( preg_replace( "/\r\n|\r|\n/", '<br/>', $ccc_cookiecontrol_settings['iabPanelIntro3'] ), $allowedHTML ); ?>',
                            aboutIab: '<?php echo wp_kses( preg_replace( "/\r\n|\r|\n/", '<br/>', $ccc_cookiecontrol_settings['iabAboutIab'] ), $allowedHTML ); ?>',
                            iabName: '<?php echo esc_html( $ccc_cookiecontrol_settings['iabIabName'] ); ?>',
                            iabLink: '<?php echo esc_html( $ccc_cookiecontrol_settings['iabIabLink'] ); ?>',
                            vendors: '<?php echo esc_html( $ccc_cookiecontrol_settings['iabVendorTitle'] ); ?>',
                            purposes: '<?php echo esc_html( $ccc_cookiecontrol_settings['iabPurposes'] ); ?>',
                            features: '<?php echo esc_html( $ccc_cookiecontrol_settings['iabFeatures'] ); ?>',
                            specialPurposes: '<?php echo esc_html( $ccc_cookiecontrol_settings['iabSpecialPurposes'] ); ?>',
                            specialFeatures: '<?php echo esc_html( $ccc_cookiecontrol_settings['iabSpecialFeatures'] ); ?>',
                            purposeLegitimateInterest: '<?php echo esc_html( $ccc_cookiecontrol_settings['iabPurposeLegitimateInterest'] ); ?>',
                            vendorLegitimateInterest: '<?php echo esc_html( $ccc_cookiecontrol_settings['iabVendorLegitimateInterest'] ); ?>',
                            relyConsent: '<?php echo isset( $ccc_cookiecontrol_settings['iabRelyConsent']) ? esc_html( $ccc_cookiecontrol_settings['iabRelyConsent'] ) :  $ccc_cookiecontrol_defaults_sctipt_values['iabRelyConsent']; ?>',
                            relyLegitimateInterest: '<?php echo  isset( $ccc_cookiecontrol_settings['iabRelyLegitimateInterest']) ? esc_html( $ccc_cookiecontrol_settings['iabRelyLegitimateInterest'] ) :  $ccc_cookiecontrol_defaults_sctipt_values['iabRelyLegitimateInterest']; ?>',
                            acceptAll: '<?php echo esc_html( $ccc_cookiecontrol_settings['iabAcceptAll'] ); ?>',
                            rejectAll: '<?php echo esc_html( $ccc_cookiecontrol_settings['iabRejectAll'] ); ?>',
                            dataUse: '<?php echo esc_html( $ccc_cookiecontrol_settings['iabDataUse'] ); ?>',
                            savePreferences: '<?php echo esc_html( $ccc_cookiecontrol_settings['iabSavePreferences'] ); ?>',
                            legalDescription: '<?php echo  isset( $ccc_cookiecontrol_settings['iabLegalDescription']) ? esc_html( $ccc_cookiecontrol_settings['iabLegalDescription'] ) :  $ccc_cookiecontrol_defaults_sctipt_values['iabLegalDescription']; ?>',
                            cookieMaxage:  '<?php echo  isset( $ccc_cookiecontrol_settings['iabCookieMaxAge']) ? esc_html( $ccc_cookiecontrol_settings['iabCookieMaxAge'] ) :  $ccc_cookiecontrol_defaults_sctipt_values['iabCookieMaxAge']; ?>',
                            usesNonCookieAccessTrue:  '<?php echo  isset( $ccc_cookiecontrol_settings['iabUsesNonCookieAccessTrue']) ? esc_html( $ccc_cookiecontrol_settings['iabUsesNonCookieAccessTrue'] ) :  $ccc_cookiecontrol_defaults_sctipt_values['iabUsesNonCookieAccessTrue']; ?>',
                            usesNonCookieAccessFalse:  '<?php echo  isset( $ccc_cookiecontrol_settings['iabUsesNonCookieAccessFalse']) ? esc_html( $ccc_cookiecontrol_settings['iabUsesNonCookieAccessFalse'] ) :  $ccc_cookiecontrol_defaults_sctipt_values['iabUsesNonCookieAccessFalse']; ?>',
                            storageDisclosures:  '<?php echo  isset( $ccc_cookiecontrol_settings['iabStorageDisclosures']) ? esc_html( $ccc_cookiecontrol_settings['iabStorageDisclosures'] ) :  $ccc_cookiecontrol_defaults_sctipt_values['iabStorageDisclosures']; ?>',
                            disclosureDetailsColumn:  '<?php echo  isset( $ccc_cookiecontrol_settings['iabDisclosureDetailsColumn']) ? esc_html( $ccc_cookiecontrol_settings['iabDisclosureDetailsColumn'] ) :  $ccc_cookiecontrol_defaults_sctipt_values['iabDisclosureDetailsColumn']; ?>',
                            disclosurePurposesColumn:  '<?php echo  isset( $ccc_cookiecontrol_settings['iabDisclosurePurposesColumn']) ? esc_html( $ccc_cookiecontrol_settings['iabDisclosurePurposesColumn'] ) :  $ccc_cookiecontrol_defaults_sctipt_values['iabDisclosurePurposesColumn']; ?>',
                            seconds:  '<?php echo  isset( $ccc_cookiecontrol_settings['iabSeconds']) ? esc_html( $ccc_cookiecontrol_settings['iabSeconds'] ) :  $ccc_cookiecontrol_defaults_sctipt_values['iabSeconds']; ?>',
                            minutes:  '<?php echo  isset( $ccc_cookiecontrol_settings['iabMinutes']) ? esc_html( $ccc_cookiecontrol_settings['iabMinutes'] ) :  $ccc_cookiecontrol_defaults_sctipt_values['iabMinutes']; ?>',
                            hours:  '<?php echo  isset( $ccc_cookiecontrol_settings['iabHours']) ? esc_html( $ccc_cookiecontrol_settings['iabHours'] ) :  $ccc_cookiecontrol_defaults_sctipt_values['iabHours']; ?>',
                            days:  '<?php echo  isset( $ccc_cookiecontrol_settings['iabDays']) ? esc_html( $ccc_cookiecontrol_settings['iabDays'] ) :  $ccc_cookiecontrol_defaults_sctipt_values['iabDays']; ?>',
                            googleVendors:  '<?php echo  isset( $ccc_cookiecontrol_settings['iabGoogleVendors']) ? esc_html( $ccc_cookiecontrol_settings['iabGoogleVendors'] ) :  $ccc_cookiecontrol_defaults_sctipt_values['iabGoogleVendors']; ?>',
                            googleVendorInformation:  '<?php echo  isset( $ccc_cookiecontrol_settings['iabGoogleVendorInformation']) ? esc_html( $ccc_cookiecontrol_settings['iabGoogleVendorInformation'] ) :  $ccc_cookiecontrol_defaults_sctipt_values['iabGoogleVendorInformation']; ?>',
                            vendorDataUses: '<?php echo  isset( $ccc_cookiecontrol_settings['iabVendorDataUses']) ? esc_html( $ccc_cookiecontrol_settings['iabVendorDataUses'] ) :  $ccc_cookiecontrol_defaults_sctipt_values['iabVendorDataUses']; ?>',
                            dataRetention: '<?php echo  isset( $ccc_cookiecontrol_settings['iabDataRetention']) ? esc_html( $ccc_cookiecontrol_settings['iabDataRetention'] ) :  $ccc_cookiecontrol_defaults_sctipt_values['iabDataRetention']; ?>',
                            privacy: '<?php echo  isset( $ccc_cookiecontrol_settings['iabPrivacy']) ? esc_html( $ccc_cookiecontrol_settings['iabPrivacy'] ) :  $ccc_cookiecontrol_defaults_sctipt_values['iabPrivacy']; ?>',
                            liClaims: '<?php echo  isset( $ccc_cookiecontrol_settings['iabLiClaims']) ? esc_html( $ccc_cookiecontrol_settings['iabLiClaims'] ) :  $ccc_cookiecontrol_defaults_sctipt_values['iabLiClaims']; ?>',
                            vendorCount: '<?php echo  isset( $ccc_cookiecontrol_settings['iabVendorCount']) ? esc_html( $ccc_cookiecontrol_settings['iabVendorCount'] ) :  $ccc_cookiecontrol_defaults_sctipt_values['iabVendorCount']; ?>',
                            illustrationsDescription: '<?php echo  isset( $ccc_cookiecontrol_settings['iabIllustrationsDescription']) ? esc_html( $ccc_cookiecontrol_settings['iabIllustrationsDescription'] ) :  $ccc_cookiecontrol_defaults_sctipt_values['iabIllustrationsDescription']; ?>',
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
                        rejectText: '<?php echo esc_html( $ccc_cookiecontrol_settings['rejectText'] ); ?>',
                        rejectBackground: '<?php echo esc_html( $ccc_cookiecontrol_settings['rejectBackground'] ); ?>',
                        closeText : '<?php echo  isset( $ccc_cookiecontrol_settings['closeText']) ? esc_html( $ccc_cookiecontrol_settings['closeText'] ) :  $ccc_cookiecontrol_defaults_sctipt_values['closeText']; ?>',
                        closeBackground : '<?php echo  isset( $ccc_cookiecontrol_settings['closeBackground']) ? esc_html( $ccc_cookiecontrol_settings['closeBackground'] ) :  $ccc_cookiecontrol_defaults_sctipt_values['closeBackground']; ?>',
                        notifyFontColor : '<?php echo  isset( $ccc_cookiecontrol_settings['notifyFontColor']) ? esc_html( $ccc_cookiecontrol_settings['notifyFontColor'] ) :  $ccc_cookiecontrol_defaults_sctipt_values['notifyFontColor']; ?>',
                        notifyBackgroundColor: '<?php echo  isset( $ccc_cookiecontrol_settings['notifyBackgroundColor']) ? esc_html( $ccc_cookiecontrol_settings['notifyBackgroundColor'] ) :  $ccc_cookiecontrol_defaults_sctipt_values['notifyBackgroundColor']; ?>',
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
                    <?php if(isset( $ccc_cookiecontrol_settings['chooseLocale'] ) && $ccc_cookiecontrol_settings['chooseLocale']=="website" &&  $ccc_cookiecontrol_settings['initialState'] !='GOVUK' ): ?>
                        <?php if(get_locale()!="") : ?>

                        locale:  '<?php echo get_locale(); ?>',

                        <?php endif; ?>
                    <?php  endif; ?>
                    <?php
                    if ( isset( $ccc_cookiecontrol_settings['altLanguages'] ) &&  $ccc_cookiecontrol_settings['initialState'] !='GOVUK' ) :
                    if ( is_array( $ccc_cookiecontrol_settings['altLanguages'] ) && count( $ccc_cookiecontrol_settings['altLanguages'] ) > 0 && ! empty( $ccc_cookiecontrol_settings['altLanguages'] ) ) :
                    ?>

                    locales: [
                        <?php foreach ( $ccc_cookiecontrol_settings['altLanguages'] as $key => $val ) : ?>
                        <?php if ( $val != '' && $ccc_cookiecontrol_settings['altLanguagesText'][ $key ] != '' ) : ?>
                        {
                            locale: '<?php echo esc_html( $val ); ?>',
                            <?php if(isset($ccc_cookiecontrol_settings['altLanguagesMode'][ $key ])) :  ?>
                            mode: '<?php echo esc_html( $ccc_cookiecontrol_settings['altLanguagesMode'][ $key ] ); ?>',
                            <?php endif; ?>
                            <?php echo wp_kses( stripslashes( $ccc_cookiecontrol_settings['altLanguagesText'][ $key ] ), $allowedHTML ); ?>
                        },
                        <?php endif; ?>
                        <?php endforeach; ?>
                    ],
                    <?php endif ;?>

                  <?php endif;
                    endif; ?>

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
                        
                            <?php if ( ! empty( $ccc_output_category_vendors_array[ $key - 1 ] ) ) : ?>
                            vendors: [<?php echo wp_kses( stripslashes( $ccc_output_category_vendors_array[ $key - 1 ] ), $allowedHTML ); ?>],
                            <?php endif; ?>

                        },
                        <?php endif; ?>
                        <?php endforeach; ?>
                    ],
                    <?php endif; ?>
                    <?php if ( isset( $ccc_cookiecontrol_settings['privacyURL'] ) && ! empty( $ccc_cookiecontrol_settings['privacyURL'] )  && isset( $ccc_cookiecontrol_settings['privacyName'] ) && ! empty( $ccc_cookiecontrol_settings['privacyName'] ) ) : ?>
                        statement: {
                            description: '<?php echo esc_html( $ccc_cookiecontrol_settings['privacyDescription'] ); ?>',
                            name: '<?php echo esc_html( $ccc_cookiecontrol_settings['privacyName'] ); ?>',
                            url: '<?php echo esc_url( $ccc_cookiecontrol_settings['privacyURL'] ); ?>',
                            updated: '<?php echo esc_html( $ccc_cookiecontrol_settings['privacyUpdateDate'] ); ?>'
                        },
                        <?php  endif; 
                        if ( isset( $ccc_cookiecontrol_settings['ccpaPrivacyURL'] ) && ! empty( $ccc_cookiecontrol_settings['ccpaPrivacyURL'] ) && isset( $ccc_cookiecontrol_settings['ccpaPrivacyName'] ) && ! empty( $ccc_cookiecontrol_settings['ccpaPrivacyName'] ) && $ccc_cookiecontrol_settings['initialState'] !='GOVUK' ) :?>
                        ccpaConfig: {
                                description: '<?php echo esc_html( $ccc_cookiecontrol_settings['ccpaPrivacyDescription'] ); ?>',
                                name: '<?php echo esc_html( $ccc_cookiecontrol_settings['ccpaPrivacyName'] ); ?>',
                                url: '<?php echo esc_url( $ccc_cookiecontrol_settings['ccpaPrivacyURL'] ); ?>',
                                updated: '<?php echo esc_html( $ccc_cookiecontrol_settings['ccpaPrivacyUpdateDate'] ); ?>',
                                rejectButton: '<?php echo  isset( $ccc_cookiecontrol_settings['ccpaRejectButton']) && !empty($ccc_cookiecontrol_settings['ccpaRejectButton']) ? esc_html( $ccc_cookiecontrol_settings['ccpaRejectButton'] ) :  $ccc_cookiecontrol_defaults_sctipt_values['ccpaRejectButton']; ?>',
                            },
                    <?php    endif; ?>
                    sameSiteCookie : <?php echo isset( $ccc_cookiecontrol_settings['sameSiteCookie']) ?  esc_html( $ccc_cookiecontrol_settings['sameSiteCookie'] ) : 'true'; ?>,
                    sameSiteValue : '<?php echo isset( $ccc_cookiecontrol_settings['sameSiteValue']) ?  esc_html( $ccc_cookiecontrol_settings['sameSiteValue'] ) : 'Strict'; ?>',
                    notifyDismissButton: <?php echo isset( $ccc_cookiecontrol_settings['notifyDismissButton']) ?  esc_html( $ccc_cookiecontrol_settings['notifyDismissButton'] ) : 'true'; ?>

                };
                CookieControl.load(config);
            </script>

            <?php
        endif;
    }
}

?>
