<?php

/**
 * Return the default value for options
 */
function cdc_cookie_default_values( $index ) {

    $default_values_array = array(
        'main-befor-title'                              => '',
        'main-title'                                    => __( 'Our cookies', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN ),
        'main-description'                              => __( 'This site uses cookies necessary for its proper functioning. You can accept them all or click on “learn more” to choose which cookies you accept or not.', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN ),
        'main-summary'                                  => 'yes',
        'main-summary-text'                             => __( 'What are these cookies used for:', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN ),
        'main-important-links'                          => array('1665503914930' => array('text'  => __( 'Read the privacy policy', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN ), 'link'  => apply_filters('cdc-cookie-default-main-important-links', '#') )),
        'main-reject-text'                              => '',
        'main-choose-text'                              => __( 'Learn more', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN ),
        'main-acceptall-text'                           => __( 'I accept all', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN ),
        'main-refuseall-text'                           => __( 'I refuse all', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN ),
        'mandatory-show-step'                           => 'yes',
        'mandatory-step-title'                          => __( 'Mandatory cookies', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN ),
        'mandatory-befor-title'                         => '',
        'mandatory-title'                               => __( 'Our cookies', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN ),
        'mandatory-description'                         => __( 'Here is the list of cookies necessary for the proper functioning of the site, you cannot deactivate them but we must tell you about them.', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN ),
        'mandatory-acceptall-text'                      => __( 'I accept all', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN ),
        'mandatory-refuseall-text'                      => __( 'I refuse all', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN ),
        'mandatory-nextbtn-text'                        => __( 'Next', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN ),
        'optional-show-step'                            => 'yes',
        'optional-step-title'                           => __( 'Optional cookies', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN ),
        'optional-befor-title'                          => '',
        'optional-title'                                => __( 'Our cookies', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN ),
        'optional-description'                          => __( 'On this site, we use cookies in order to analyze our traffic, maintain a quality relationship with you and occasionally offer you relevant content. You can choose here which ones you agree to keep.', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN ),
        'optional-acceptall-text'                       => __( 'I accept all', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN ),
		'optional-refuseall-text'                       => __( 'I refuse all', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN ),
        'optional-confirmbtn-text'                      => __( 'I valid', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN ),
        'personalization-main-image'                    => COOKIE_DOUGH_CONSENT_PLUGIN_URL . 'admin/images/cookie-01.webp',
        'personalization-bg-shape'                      => COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/svgs/bg-shape-01.svg',
        'personalization-color-shape'                   => '#8943FA',
        'personalization-color-action'                  => '#8943FA',
        'personalization-color-secondary-action'        => '#646468',
        'personalization-color-text'                    => '#101010',
        'personalization-color-border'                  => '#E3E3E3',
        'personalization-color-bg'                      => '#FFFFFF',
        'personalization-modal-border-radius'           => '30',
        'personalization-alignment-main-btn'            => 'bottom_right',
        'personalization-margin-horizontal-main-btn'    => '20',
        'personalization-margin-vertical-main-btn'      => '20',
        'personalization-image-main-btn'                => COOKIE_DOUGH_CONSENT_PLUGIN_URL . 'admin/images/cookie-01.webp',
        'personalization-size-main-btn'                 => '64',
        'personalization-border-radius-main-btn'        => '32',
        'cookie-settings-main'                          => array(),
        'advanced-delay-opening'                        => '15',
        'advanced-disappears-accepted'                  => 'yes',
        'advanced-cookie-duration-acceptall'            => '365',
        'advanced-cookie-duration-notacceptall'         => '365',
        'advanced-handle-cache'                         => 'no'
    );

    return $default_values_array[$index] ?? '';
}

/**
 * Array contains cookies with data
 */
function cdc_cookie_cookiess_array() {

    return array(
        array(
            "name"              => "ABtasty",
            "title"             => "A/B Tasty",
            "shortDescription"  => _x( "Agile platform for marketing automation.", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.abtasty.com/fr/",
            "policyUrl"         =>  "https://www.abtasty.com/fr/mentions-legales/",
            "id"                => "static_ABtasty",
            "type"              => "testing",
        ),
        array(
            "name"              => "Acquia_Lift",
            "title"             => "Acquia Lift",
            "shortDescription"  => _x( "Active Campaign: email editing and routing tool.", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.acquia.com/fr/products-services/acquia-lift",
            "policyUrl"         =>  "https://www.acquia.com/fr/products-services/acquia-lift",
            "id"                => "static_Acquia_Lift",
            "type"              => "testing"
        ),
        array(
            "name"              => "Actito",
            "title"             => "Actito",
            "shortDescription"  => _x( "Precise orientation of mobile advertising.", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "http://www.actito.com",
            "policyUrl"         =>  "http://www.actito.com",
            "id"                => "static_Actito",
            "type"              => "marketing"
        ),
        array(
            "name"              => "ActiveCampaign",
            "title"             => "ActiveCampaign",
            "shortDescription"  => _x( "Integrate sharing links into site articles.", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.activecampaign.com/",
            "policyUrl"         =>  "https://www.activecampaign.com/legal/cookie-policy",
            "id"                => "static_ActiveCampaign",
            "type"              => "email"
        ),
        array(
            "name"              => "ad4screen",
            "title"             => "Ad4Screen",
            "shortDescription"  => _x( "Service for distributing our advertising communications.", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.ad4screen.com",
            "policyUrl"         =>  "https://www.ad4screen.com/mentions-legales/",
            "id"                => "static_ad4screen",
            "type"              => "marketing"
        ),
        array(
            "name"              => "addthis",
            "title"             => "AddThis",
            "shortDescription"  => _x( "Audience monitoring carried out by the company Clickon (Admo.tv) on our site.", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.addthis.com/",
            "policyUrl"         =>  "https://www.admo.tv/",
            "id"                => "static_addthis",
            "type"              => "other"
        ),
        array(
            "name"              => "adformCookie",
            "title"             => "Adform",
            "shortDescription"  => _x( "Agency dedicated to the distribution of our advertisements", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://site.adform.com/",
            "policyUrl"         =>  "https://site.adform.com/privacy-center/overview/",
            "id"                => "static_adformCookie",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Admo_TV",
            "title"             => "Admo TV",
            "shortDescription"  => _x( "Advertising agency for the distribution of our ads.", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.admo.tv/",
            "policyUrl"         =>  "https://www.admo.tv/",
            "id"                => "static_Admo_TV",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Adobe",
            "title"             => "Adobe Campaigns",
            "shortDescription"  => _x( "Evaluation of the effectiveness of advertising campaigns.", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.adobe.com/",
            "policyUrl"         =>  "https://www.adobe.com/privacy.html",
            "id"                => "static_Adobe",
            "type"              => "marketing"
        ),
        array(
            "name"              => "AdRoll",
            "title"             => "AdRoll",
            "shortDescription"  => _x( "Agency for distributing our advertising communications.", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.adroll.com/",
            "policyUrl"         =>  "https://www.nextroll.com/privacy",
            "id"                => "static_AdRoll",
            "type"              => "marketing"
        ),
        array(
            "name"              => "adot",
            "title"             => "Adot",
            "shortDescription"  => _x( "Evaluates the effectiveness of advertising actions", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://we-are-adot.com",
            "policyUrl"         =>  "https://we-are-adot.com/privacy-policy/",
            "id"                => "static_adot",
            "type"              => "monitoring"
        ),
        array(
            "name"              => "advalo",
            "title"             => "Advalo",
            "shortDescription"  => _x( "Agency dedicated to the distribution of our advertisements", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://pulse.advalo.com",
            "policyUrl"         =>  "https://pulse.advalo.com",
            "id"                => "static_advalo",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Advertising.com",
            "title"             => "Advertising.com",
            "shortDescription"  => _x( "Agency dedicated to the distribution of our advertisements", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "Advertising.com",
            "policyUrl"         =>  "Advertising.com",
            "id"                => "static_Advertising.com",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Affilae",
            "title"             => "Affilae",
            "shortDescription"  => _x( "Administration of affiliate programs", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "www.affilae.com",
            "policyUrl"         =>  "https://affilae.com/en/privacy-cookie-policy/",
            "id"                => "static_Affilae",
            "type"              => "marketing"
        ),
        array(
            "name"              => "AirCall",
            "title"             => "AirCall",
            "shortDescription"  => _x( "Add a call button to our site ", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://aircall.io/fr/",
            "policyUrl"         =>  "https://aircall.io/privacy/",
            "id"                => "static_AirCall",
            "type"              => "chat"
        ),
        array(
            "name"              => "Albacross",
            "title"             => "Albacross",
            "shortDescription"  => _x( "Identifies user sessions using IP", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "www.albacross.com",
            "policyUrl"         =>  "https://albacross.com/privacy-policy/",
            "id"                => "static_Albacross",
            "type"              => "monitoring"
        ),
        array(
            "name"              => "Amazon",
            "title"             => "Amazon",
            "shortDescription"  => _x( "Recognizes visitors coming from this site", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "amazon.com",
            "policyUrl"         =>  "amazon.com",
            "id"                => "static_Amazon",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Amelia",
            "title"             => "Amelia",
            "shortDescription"  => _x( "Online appointment booking platform", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "www.amelia.com",
            "policyUrl"         =>  "www.amelia.com",
            "id"                => "static_Amelia",
            "type"              => "other"
        ),
        array(
            "name"              => "amplitude",
            "title"             => "Amplitude",
            "shortDescription"  => _x( "Evaluates and analyzes site performance", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://amplitude.com/",
            "policyUrl"         =>  "https://amplitude.com/privacy",
            "id"                => "static_amplitude",
            "type"              => "monitoring"
        ),
        array(
            "name"              => "appnexus",
            "title"             => "Appnexus",
            "shortDescription"  => _x( "Creates and optimizes online programmatic ads", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.appnexus.com/fr",
            "policyUrl"         =>  "https://www.appnexus.com/fr/corporate-privacy-policy",
            "id"                => "static_appnexus",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Appvizer",
            "title"             => "Appvizer",
            "shortDescription"  => _x( "Tracks visits from the Appvizer platform", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.appvizer.fr/",
            "policyUrl"         =>  "https://www.appvizer.fr/a-propos/confidentialite",
            "id"                => "static_Appvizer",
            "type"              => "other"
        ),
        array(
            "name"              => "Asayer",
            "title"             => "Asayer",
            "shortDescription"  => _x( "Asayer: a contemporary session analysis and replay tool for web applications, facilitating rapid delivery of quality software.", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://asayer.io/",
            "policyUrl"         =>  "https://asayer.io/privacy.html",
            "id"                => "static_Asayer",
            "type"              => "monitoring"
        ),
        array(
            "name"              => "Automate",
            "title"             => "Automate",
            "shortDescription"  => _x( "Individually adapt your advertisements", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://automate.io/",
            "policyUrl"         =>  "https://automate.io/privacy-policy",
            "id"                => "static_Automate",
            "type"              => "other"
        ),
        array(
            "name"              => "AvisVerifies",
            "title"             => "Avis Vérifiés",
            "shortDescription"  => _x( "Facilitates the collection of feedback from our customers", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.avis-verifies.com/",
            "policyUrl"         =>  "https://www.avis-verifies.com/index.php?page=mod_regles_confidentialites",
            "id"                => "static_AvisVerifies",
            "type"              => "other"
        ),
        array(
            "name"              => "awin",
            "title"             => "Awin",
            "shortDescription"  => _x( "Evaluate the traffic generated by Awin", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "www.awin.com",
            "policyUrl"         =>  "https://www.awin.com/fr/cgv/privacy-policy",
            "id"                => "static_awin",
            "type"              => "monitoring"
        ),



        array(
            "name"              => "app_insight",
            "title"             => "Azure AppInsight",
            "shortDescription"  => _x( "Evaluate the effectiveness of our website", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://docs.microsoft.com/fr-fr/azure/azure-monitor/app/app-insights-overview",
            "policyUrl"         =>  "https://docs.microsoft.com/fr-fr/azure/azure-monitor/app/data-retention-privacy",
            "id"                => "static_app_insight",
            "type"              => "monitoring"
        ),
        array(
            "name"              => "Beamer",
            "title"             => "Beamer",
            "shortDescription"  => _x( "Instrument dedicated to customer relationship management", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.getbeamer.com/",
            "policyUrl"         =>  "https://www.getbeamer.com/",
            "id"                => "static_Beamer",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Benchmark Email",
            "title"             => "Benchmark Email",
            "shortDescription"  => _x( "Makes it easier to send tailor-made emails!", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.benchmarkemail.com/fr/",
            "policyUrl"         =>  "https://www.benchmarkemail.com/fr/email-marketing/privacy-policy",
            "id"                => "static_Benchmark Email",
            "type"              => "email"
        ),
        array(
            "name"              => "Bing",
            "title"             => "Bing",
            "shortDescription"  => _x( "Evaluates the performance of advertising campaigns sponsored by Bing", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.bing.com/",
            "policyUrl"         =>  "https://privacy.microsoft.com/fr-fr/privacystatement",
            "id"                => "static_Bing",
            "type"              => "marketing"
        ),
        array(
            "name"              => "bizible",
            "title"             => "Bizible",
            "shortDescription"  => _x( "Marketing Resource Assignment Tool", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.bizible.com/",
            "policyUrl"         =>  "https://www.bizible.com/",
            "id"                => "static_bizible",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Bluekai",
            "title"             => "Bluekai",
            "shortDescription"  => _x( "Agency dedicated to the distribution of our advertisements", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.oracle.com/fr/corporate/acquisitions/bluekai/",
            "policyUrl"         =>  "https://www.oracle.com/fr/corporate/acquisitions/bluekai/",
            "id"                => "static_Bluekai",
            "type"              => "monitoring"
        ),
        array(
            "name"              => "Brains",
            "title"             => "Brains",
            "shortDescription"  => _x( "Continuous improvement of IT systems", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "http://www.brains.fr/",
            "policyUrl"         =>  "http://www.brains.fr/",
            "id"                => "static_Brains",
            "type"              => "monitoring"
        ),
        array(
            "name"              => "Bugsnag",
            "title"             => "Bugsnag",
            "shortDescription"  => _x( "Contributes to the stability of our site", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.bugsnag.com/",
            "policyUrl"         =>  "https://www.bugsnag.com/",
            "id"                => "static_Bugsnag",
            "type"              => "monitoring"
        ),
        array(
            "name"              => "calameo",
            "title"             => "Calaméo",
            "shortDescription"  => _x( "Manages cookies created by the Calaméo PDF reader", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "domain"            => "https://fr.calameo.com/",
            "id"                => "static_calameo",
            "type"              => "other"
        ),
        array(
            "name"              => "Calendly",
            "title"             => "Calendly",
            "shortDescription"  => _x( "Allows you to make appointments online", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://calendly.com/fr",
            "policyUrl"         =>  "https://calendly.com/fr/pages/privacy",
            "id"                => "static_Calendly",
            "type"              => "other"
        ),
        array(
            "name"              => "Carts_Guru",
            "title"             => "Carts Guru",
            "shortDescription"  => _x( "Marketing automation and email sending tool", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.carts.guru/fr/",
            "policyUrl"         =>  "https://www.carts.guru/privacy-policy/website-privacy-policy",
            "id"                => "static_Carts_Guru",
            "type"              => "email"
        ),
        array(
            "name"              => "chance_xp",
            "title"             => "Chance experience",
            "shortDescription"  => _x( "Optimizes the customer experience", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.chance.co/fr",
            "policyUrl"         =>  "https://www.chance.co/fr",
            "id"                => "static_chance_xp",
            "type"              => "marketing"
        ),
        array(
            "name"              => "FarmaHope Chat",
            "title"             => "Chat Online",
            "shortDescription"  => _x( "Allows you to contact us by chat", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.farmahope.it",
            "policyUrl"         =>  "https://www.farmahope.it/it/content/7-politica-sulla-privacy",
            "id"                => "static_FarmaHope Chat",
            "type"              => "marketing"
        ),
        array(
            "name"              => "chatfuel",
            "title"             => "Chatfuel",
            "shortDescription"  => _x( "Allows you to contact us by chat", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "www.chatfuel.com",
            "policyUrl"         =>  "",
            "id"                => "static_chatfuel",
            "type"              => "chat"
        ),
        array(
            "name"              => "chatra_io",
            "title"             => "Chatra.io",
            "shortDescription"  => _x( "To chat with our team", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://chatra.io/fr/",
            "policyUrl"         =>  "https://www.livechatinc.com/legal/privacy-policy/",
            "id"                => "static_chatra_io",
            "type"              => "chat"
        ),
        array(
            "name"              => "CJ",
            "title"             => "CJ",
            "shortDescription"  => _x( "Administration of affiliate programs", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.cj.com/",
            "policyUrl"         =>  "https://www.conversantmedia.com/legal/privacy",
            "id"                => "static_CJ",
            "type"              => "marketing"
        ),
        array(
            "name"              => "clickdimensions",
            "title"             => "Click Dimensions",
            "shortDescription"  => _x( "Marketing automation and email sending tool", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://clickdimensions.com/",
            "policyUrl"         =>  "https://clickdimensions.com/about/legal/",
            "id"                => "static_clickdimensions",
            "type"              => "marketing"
        ),
        array(
            "name"              => "_jsuid",
            "title"             => "Clicky",
            "shortDescription"  => _x( "Analyzes site usage in real time", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://clicky.com",
            "policyUrl"         =>  "https://clicky.com/help/faq/privacy",
            "id"                => "static__jsuid",
            "type"              => "monitoring"
        ),
        array(
            "name"              => "CloudFlare",
            "title"             => "CloudFlare",
            "shortDescription"  => _x( "This cookie helps with page loading and user authentication", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.cloudflare.com/fr-fr/",
            "policyUrl"         =>  "https://www.cloudflare.com/privacypolicy/",
            "id"                => "static_CloudFlare",
            "type"              => "monitoring"
        ),
        array(
            "name"              => "Cloze",
            "title"             => "Cloze",
            "shortDescription"  => _x( "Tool for customer relationship management", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.cloze.com/",
            "policyUrl"         =>  "https://www.cloze.com/app/legal/privacy",
            "id"                => "static_Cloze",
            "type"              => "crm"
        ),
        array(
            "name"              => "commanders_act",
            "title"             => "Commanders Act",
            "shortDescription"  => _x( "Managing tags on the website", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "www.commandersact.com",
            "policyUrl"         =>  "https://www.commandersact.com/fr/vie-privee/",
            "id"                => "static_commanders_act",
            "type"              => "other"
        ),
        array(
            "name"              => "ContentSquare",
            "title"             => "Content Square",
            "shortDescription"  => _x( "Improve the customer experience on our sitea", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://contentsquare.com/fr/",
            "policyUrl"         =>  "https://contentsquare.com/fr/confidentialite-securite/",
            "id"                => "static_ContentSquare",
            "type"              => "monitoring"
        ),
        array(
            "name"              => "CQuotient",
            "title"             => "CQuotient",
            "shortDescription"  => _x( "Customer personalization tool", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://tealium.com/integrations/cquotient_cquotientactivitytracking.php",
            "policyUrl"         =>  "https://tealium.com/integrations/cquotient_cquotientactivitytracking.php",
            "id"                => "static_CQuotient",
            "type"              => "testing"
        ),
        array(
            "name"              => "Create2Sell",
            "title"             => "Create 2 Sell",
            "shortDescription"  => _x( "Crossing module", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.target2sell.com/",
            "policyUrl"         =>  "https://www.target2sell.com/",
            "id"                => "static_Create2Sell",
            "type"              => "marketing"
        ),
        array(
            "name"              => "crisp",
            "title"             => "Crisp",
            "shortDescription"  => _x( "Online chat with our teams", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "www.crisp.chat",
            "policyUrl"         =>  "https://crisp.chat/fr/privacy/",
            "id"                => "static_crisp",
            "type"              => "chat"
        ),
        array(
            "name"              => "Criteo",
            "title"             => "Criteo",
            "shortDescription"  => _x( "Individually adapt your advertisements", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.criteo.com/fr/",
            "policyUrl"         =>  "https://www.criteo.com/fr/insights/application-du-reglement-general-europeen-sur-la-protection-des-donnees-rgpd-les-bases-legales-pour-la-collecte-des-donnees-personnelles/",
            "id"                => "static_Criteo",
            "type"              => "marketing"
        ),
        array(
            "name"              => "critizr",
            "title"             => "Critizr",
            "shortDescription"  => _x( "Collects opinions from users of our services.", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://critizr.com/legal",
            "policyUrl"         =>  "https://critizr.com/legal",
            "id"                => "static_critizr",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Customer.io",
            "title"             => "Customer.io",
            "shortDescription"  => _x( "Chat tool with our teams", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "http://customer.io/",
            "policyUrl"         =>  "https://customer.io/legal/privacy-policy/",
            "id"                => "static_Customer.io",
            "type"              => "chat"
        ),
        array(
            "name"              => "Dailymotion",
            "title"             => "Dailymotion",
            "shortDescription"  => _x( "The site allows you to broadcast a video from the French Daily Motion platform. ", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "www.dailymotion.com",
            "policyUrl"         =>  "https://faq.dailymotion.com/hc/fr/articles/360001375827-Dailymotion-et-les-cookies",
            "id"                => "static_Dailymotion",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Dataxu",
            "title"             => "Dataxu",
            "shortDescription"  => _x( "Agency dedicated to the distribution of our advertisements", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.dataxu.com/",
            "policyUrl"         =>  "https://www.dataxu.com/about-us/privacy/data-collection-platform/",
            "id"                => "static_Dataxu",
            "type"              => "marketing"
        ),
        array(
            "name"              => "dexem",
            "title"             => "Dexem",
            "shortDescription"  => _x( "Call tracking tool", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.dexem.com/",
            "policyUrl"         =>  "https://www.dexem.com/",
            "id"                => "static_dexem",
            "type"              => "chat"
        ),
        array(
            "name"              => "Disqus",
            "title"             => "Disqus",
            "shortDescription"  => _x( "We are interested in your comments ", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://disqus.com",
            "policyUrl"         =>  "https://help.disqus.com/terms-and-policies/disqus-privacy-policy",
            "id"                => "static_Disqus",
            "type"              => "testing"
        ),
        array(
            "name" => "DOKAN",
            "title" => "Dokan",
            "shortDescription" => _x( "Marketplace Manager", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "domain" => "https://wedevs.com/dokan/modules/stripe-connect/",
            "id" => "static_DOKAN",
            "type" => "other"
        ),
        array(
            "name" => "Double_Click",
            "title" => "Double Click",
            "shortDescription" => _x( "Broadcasts our advertisements on the Google network", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "domain" => "www.google.fr",
            "id" => "static_Double_Click",
            "type" => "marketing"
        ),
        array(
            "name"              => "Dr_Banner",
            "title"             => "Dr Banner",
            "shortDescription"  => _x( "Optimize our advertising", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://drbanner.com/fr/privacypolicy_fr/",
            "policyUrl"         =>  "https://drbanner.com/fr/privacypolicy_fr/",
            "id"                => "static_Dr_Banner",
            "type"              => "marketing"
        ),
        array(
            "name"              => "drift",
            "title"             => "Drift",
            "shortDescription"  => _x( "Online chat with our teams", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "drift.com",
            "policyUrl"         =>  "https://www.drift.com/privacy-policy/",
            "id"                => "static_drift",
            "type"              => "chat"
        ),
        array(
            "name"              => "Programmatique DV 360",
            "title"             => "DV360",
            "shortDescription"  => _x( "Identifies visitors from YouTube posts", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://displayvideo.google.com/",
            "policyUrl"         =>  "https://privacy.google.com/businesses/processorterms/",
            "id"                => "static_Programmatique DV 360",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Dynatrace",
            "title"             => "Dynatrace",
            "shortDescription"  => _x( "Improve the performance of our site", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.dynatrace.fr/",
            "policyUrl"         =>  "https://www.dynatrace.fr/",
            "id"                => "static_Dynatrace",
            "type"              => "monitoring"
        ),
        array(
            "name"              => "Early_Birds",
            "title"             => "Early Birds",
            "shortDescription"  => _x( "Personalization platform", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "http://www.early-birds.fr",
            "policyUrl"         =>  "http://www.early-birds.fr",
            "id"                => "static_Early_Birds",
            "type"              => "testing"
        ),
        array(
            "name"              => "effiliation",
            "title"             => "Effiliation",
            "shortDescription"  => _x( "Marketing agency specializing in affiliation", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.effiliation.com/",
            "policyUrl"         =>  "https://www.effiliation.com/",
            "id"                => "static_effiliation",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Eloqua",
            "title"             => "Eloqua",
            "shortDescription"  => _x( "Personalization platform", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.oracle.com/legal/privacy/marketing-cloud-data-cloud-privacy-policy.html",
            "policyUrl"         =>  "https://www.oracle.com/legal/privacy/marketing-cloud-data-cloud-privacy-policy.html",
            "id"                => "static_Eloqua",
            "type"              => "testing"
        ),
        array(
            "name"              => "Email_Reflex",
            "title"             => "Email Reflex",
            "shortDescription"  => _x( "Address of personalized messages.", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.eperflex.com/",
            "policyUrl"         =>  "https://backoffice.eperflex.com/email-retargeting/desinscription",
            "id"                => "static_Email_Reflex",
            "type"              => "email"
        ),
        array(
            "name"              => "EquiStation",
            "title"             => "EquiStation",
            "shortDescription"  => _x( "To stay connected during future sessions", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "EquiStation.fr",
            "policyUrl"         =>  "https://equistation.fr/confidentialite",
            "id"                => "static_EquiStation",
            "type"              => "other"
        ),
        array(
            "name"              => "Eulerian",
            "title"             => "eulerian",
            "shortDescription"  => _x( "Marketing analysis tool", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.eulerian.com/",
            "policyUrl"         =>  "https://www.eulerian.com/rgpd/",
            "id"                => "static_Eulerian",
            "type"              => "marketing"
        ),
        array(
            "name"              => "EventBrite",
            "title"             => "EventBrite",
            "shortDescription"  => _x( "Manage our events ", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.eventbrite.fr/",
            "policyUrl"         =>  "https://www.eventbrite.fr/support/articles/fr/Troubleshooting/avis-de-protection-des-donnees-personnelles-eu-us?lg=fr",
            "id"                => "static_EventBrite",
            "type"              => "other"
        ),
        array(
            "name"              => "Ezoic",
            "title"             => "Ezoic",
            "shortDescription"  => _x( "Affiliation management", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.ezoic.com/",
            "policyUrl"         =>  "https://www.ezoic.com/privacy-policy/",
            "id"                => "static_Ezoic",
            "type"              => "marketing"
        ),
        array(
            "name" => "Facebook Conversion Tracking",
            "title" => "Facebook Conversion Tracking",
            "shortDescription" => _x( "Facebook's conversion tracking feature allows a user to track ad clicks.", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "domain" => "http://www.facebook.com",
            "id" => "static_Facebook Conversion Tracking",
            "type" => "monitoring"
        ),
        array(
            "name" => "Facebook Custom Audiences",
            "title" => "Facebook Custom Audiences",
            "shortDescription" => _x( "Custom audiences on your website help you reach people who visit your website and send them the right message on Facebook.", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "domain" => "https://developers.facebook.com/docs/reference/ads-api/custom-audience-website",
            "id" => "static_Facebook Custom Audiences",
            "type" => "marketing"
        ),
        array(
            "name"              => "facebook_pixel",
            "title"             => "Facebook Pixel",
            "shortDescription"  => _x( "Identifies visitors from Facebook posts", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "facebook.com",
            "policyUrl"         =>  "https://www.facebook.com/business/gdpr",
            "id"                => "static_facebook_pixel",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Freespee",
            "title"             => "Freespee",
            "shortDescription"  => _x( "Tool for customer relationship management", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "www.freespee.com",
            "policyUrl"         =>  "www.freespee.com",
            "id"                => "static_Freespee",
            "type"              => "crm"
        ),
        array(
            "name"              => "freestar",
            "title"             => "Freestar",
            "shortDescription"  => _x( "Customer personalization tool", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "www.freestar.io",
            "policyUrl"         =>  "https://freestar.com/data-policy/",
            "id"                => "static_freestar",
            "type"              => "marketing"
        ),
        array(
            "name"              => "FreshSales",
            "title"             => "FreshSales",
            "shortDescription"  => _x( "Tool for customer relationship management", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.freshsales.fr/",
            "policyUrl"         =>  "https://support.freshsales.io/support/solutions/articles/233227-privacy-policy",
            "id"                => "static_FreshSales",
            "type"              => "crm"
        ),
        array(
            "name"              => "Frontapp",
            "title"             => "Frontapp",
            "shortDescription"  => _x( "Online chat with customer service", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://frontapp.com/",
            "policyUrl"         =>  "https://frontapp.com/privacy-policy",
            "id"                => "static_Frontapp",
            "type"              => "chat"
        ),
        array(
            "name"              => "Gamned",
            "title"             => "Gamned",
            "shortDescription"  => _x( "Target advertising", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.gamned.com/fr/",
            "policyUrl"         =>  "https://www.gamned.com/fr/vie-privee/",
            "id"                => "static_Gamned",
            "type"              => "marketing"
        ),
        array(
            "name"              => "GetQuanty",
            "title"             => "GetQuanty",
            "shortDescription"  => _x( "Analyze the behavior of your visitors in real time", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "http://www.getquanty.com/",
            "policyUrl"         =>  "http://www.getquanty.com/mentions-legales/",
            "id"                => "static_GetQuanty",
            "type"              => "monitoring"
        ),
        array(
            "name"              => "GetResponse",
            "title"             => "GetResponse",
            "shortDescription"  => _x( "Makes it easier to send tailor-made emails!", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.getresponse.fr/",
            "policyUrl"         =>  "https://www.getresponse.fr/email-marketing/legale/intimite.html",
            "id"                => "static_GetResponse",
            "type"              => "email"
        ),
        array(
            "name"              => "GoBot",
            "title"             => "GoBot",
            "shortDescription"  => _x( "Online chat with our teams", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.getgobot.com/",
            "policyUrl"         =>  "https://www.intercom.com/fr/security",
            "id"                => "static_GoBot",
            "type"              => "chat"
        ),
        array(
            "name"              => "Google_Ads",
            "title"             => "Google Ads",
            "shortDescription"  => _x( "Measure the effectiveness of sponsored campaigns", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "www.google.fr",
            "policyUrl"         =>  "https://privacy.google.com/intl/fr_fr/businesses/compliance/#!?modal_active=none",
            "id"                => "static_Google_Ads",
            "type"              => "marketing"
        ),
        array(
            "name"              => "google_analytics",
            "title"             => "Google Analytics",
            "shortDescription"  => _x( "Allows us to analyze the consultation statistics of our site", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "analytics.google.com",
            "policyUrl"         =>  "https://support.google.com/analytics/answer/6004245?hl=fr",
            "id"                => "static_google_analytics",
            "type"              => "monitoring"
        ),
        array(
            "name" => "Google_Conversion_Linker",
            "title" => "Google Conversion Linker",
            "shortDescription" => _x( "Detects ad click information in your conversion page URLs and stores this information to associate an ad click with a conversion", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "domain" => "https://support.google.com/tagmanager/answer/7549390?hl=en",
            "id" => "static_Google_Conversion_Linker",
            "type" => "monitoring"
        ),
        array(
            "name" => "Google_Conversion_Tracking",
            "title" => "Google Conversion Tracking",
            "shortDescription" => _x( "Google Conversion Tracking Usage Statistics", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "domain" => "https://support.google.com/adwords/answer/1722054",
            "id" => "static_Google_Conversion_Tracking",
            "type" => "monitoring"
        ),
        array(
            "name"              => "gmaps",
            "title"             => "Google Maps",
            "shortDescription"  => _x( "Displays custom maps", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://maps.google.com",
            "policyUrl"         =>  "https://policies.google.com/privacy",
            "id"                => "static_gmaps",
            "type"              => "other"
        ),
        array(
            "name"              => "IDE",
            "title"             => "Google Marketing platform",
            "shortDescription"  => _x( "Help Google feed Google AdWords with data to increase the credibility of its results", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://marketingplatform.google.com/about/",
            "policyUrl"         =>  "https://policies.google.com/privacy?hl=en&gl=uk",
            "id"                => "static_IDE",
            "type"              => "marketing"
        ),
        array(
            "name"              => "GoogleRecaptcha",
            "title"             => "Google Recaptcha",
            "shortDescription"  => _x( "Secures our contact forms", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.google.com/recaptcha/about/",
            "policyUrl"         =>  "https://developers.google.com/recaptcha/docs/v3",
            "id"                => "static_GoogleRecaptcha",
            "type"              => "monitoring"
        ),
        array(
            "name" => "GoogleRemarketing",
            "title" => "Google Remarketing",
            "shortDescription" => _x( "Google code specifically for remarketing/retargeting based advertising.", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "domain" => "http://www.google.com",
            "id" => "static_GoogleRemarketing",
            "type" => "marketing"
        ),
        array(
            "name"              => "heap_analytics",
            "title"             => "Heap Analytics",
            "shortDescription"  => _x( "google_analytics", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://heap.io",
            "policyUrl"         =>  "https://heap.io/privacy",
            "id"                => "static_heap_analytics",
            "type"              => "testing"
        ),
        array(
            "name"              => "HelloRetail",
            "title"             => "Hello Retail",
            "shortDescription"  => _x( "Google_Conversion_Linker", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://helloretail.com/",
            "policyUrl"         =>  "https://helloretail.com/legal/cookies-2018-08-10",
            "id"                => "static_HelloRetail",
            "type"              => "chat"
        ),
        array(
            "name"              => "Hellobar",
            "title"             => "HelloBar",
            "shortDescription"  => _x( "Google_Conversion_Tracking", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.hellobar.com/",
            "policyUrl"         =>  "https://www.hellobar.com/gdpr/",
            "id"                => "static_Hellobar",
            "type"              => "marketing"
        ),
        array(
            "name"              => "HelloSign",
            "title"             => "HelloSign",
            "shortDescription"  => _x( "gmaps", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.hellosign.com/",
            "policyUrl"         =>  "https://www.hellosign.com/legal-fr/politique-de-confidentialite",
            "id"                => "static_HelloSign",
            "type"              => "other"
        ),
        array(
            "name"              => "HighcoBox",
            "title"             => "Highco Box",
            "shortDescription"  => _x( "Multi-brand management", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "www.pixibox.com",
            "policyUrl"         =>  "www.pixibox.com",
            "id"                => "static_HighcoBox",
            "type"              => "marketing"
        ),
        array(
            "name"              => "holimetrix",
            "title"             => "Holimetrix",
            "shortDescription"  => _x( "Measures TV advertising performance", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.holimetrix.com/",
            "policyUrl"         =>  "",
            "id"                => "static_holimetrix",
            "type"              => "marketing"
        ),
        array(
            "name"              => "hotjar",
            "title"             => "Hotjar",
            "shortDescription"  => _x( "Recording of the navigation path", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.hotjar.com",
            "policyUrl"         =>  "https://www.hotjar.com/privacy",
            "id"                => "static_hotjar",
            "type"              => "crm"
        ),
        array(
            "name"              => "hubspot",
            "title"             => "Hubspot",
            "shortDescription"  => _x( "Tool for customer relationship management", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "www.hubspot.com",
            "policyUrl"         =>  "https://legal.hubspot.com/fr/privacy-policy",
            "id"                => "static_hubspot",
            "type"              => "crm"
        ),
        array(
            "name"              => "Hypo",
            "title"             => "Hypo",
            "shortDescription"  => _x( "Chat tool with our teams", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.hypo.ai",
            "policyUrl"         =>  "https://www.hypo.ai/chatbot-credit-immobilier/politique-de-confidentialite",
            "id"                => "static_Hypo",
            "type"              => "chat"
        ),
        array(
            "name"              => "iadvize",
            "title"             => "iAdvize",
            "shortDescription"  => _x( "Human, intelligent and flexible conversational platform", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.iadvize.com/fr",
            "policyUrl"         =>  "https://privacy.iadvize.com/en/",
            "id"                => "static_iadvize",
            "type"              => "marketing"
        ),
        array(
            "name" => "Improve Digital",
            "title" => "Improve Digital",
            "shortDescription" => _x( "Private ad exchange network", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "domain" => "ImproveDigital.com",
            "id" => "static_Improve Digital",
            "type" => "other"
        ),
        array(
            "name" => "Index Exchange",
            "title" => "Index Exchange",
            "shortDescription" => _x( "Media solutions provider", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "domain" => "http://casalemedia.com",
            "id" => "static_Index Exchange",
            "type" => "marketing"
        ),
        array(
            "name"              => "Insider",
            "title"             => "Insider",
            "shortDescription"  => _x( "Push notification manager", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://useinsider.com/",
            "policyUrl"         =>  "https://useinsider.com/privacy-policy/",
            "id"                => "static_Insider",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Insightly",
            "title"             => "Insightly",
            "shortDescription"  => _x( "Tool for customer relationship management", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.insightly.com/",
            "policyUrl"         =>  "https://www.insightly.com/privacy-policy/",
            "id"                => "static_Insightly",
            "type"              => "crm"
        ),
        array(
            "name"              => "Inspectlet",
            "title"             => "Inspectlet",
            "shortDescription"  => _x( "Analyzes traffic on our site", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.inspectlet.com/",
            "policyUrl"         =>  "http://docs.inspectlet.com/hc/en-us/articles/360002994432-Privacy-Impact-Assessment-under-GDPR",
            "id"                => "static_Inspectlet",
            "type"              => "monitoring"
        ),
        array(
            "name"              => "intercom",
            "title"             => "Intercom",
            "shortDescription"  => _x( "Online chat with our teams", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "www.intercom.com",
            "policyUrl"         =>  "https://www.intercom.com/fr/security",
            "id"                => "static_intercom",
            "type"              => "chat"
        ),
        array(
            "name" => "IponWebBidSwitch",
            "title" => "IponWeb BidSwitch",
            "shortDescription" => _x( "Delivery of targeted advertising", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "domain" => "BidSwitch.com",
            "id" => "static_IponWebBidSwitch",
            "type" => "marketing"
        ),
        array(
            "name"              => "ividence",
            "title"             => "Ividence",
            "shortDescription"  => _x( "Send personalized emails", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "http://www.ividence.com",
            "policyUrl"         =>  "http://www.ividence.com/politique-dutilisation-des-cookies/",
            "id"                => "static_ividence",
            "type"              => "email"
        ),
        array(
            "name"              => "jabmo",
            "title"             => "Jabmo",
            "shortDescription"  => _x( "Analyzes traffic on our site", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://jabmo.com",
            "policyUrl"         =>  "https://jabmo.com/privacy-policy/",
            "id"                => "static_jabmo",
            "type"              => "monitoring"
        ),
        array(
            "name"              => "tk_ai",
            "title"             => "Jetpack",
            "shortDescription"  => _x( "Anonymously analyzes your use of the site", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://fr.jetpack.com/",
            "policyUrl"         =>  "https://jetpack.com/support/privacy/",
            "id"                => "static_tk_ai",
            "type"              => "testing"
        ),
        array(
            "name"              => "Joonbot",
            "title"             => "Joonbot",
            "shortDescription"  => _x( "Intelligent robot that answers your questions", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://app.joonbot.com/",
            "policyUrl"         =>  "https://www.joonbot.com/privacy-policy/",
            "id"                => "static_Joonbot",
            "type"              => "other"
        ),
        array(
            "name"              => "Kameleoon",
            "title"             => "Kameleoon",
            "shortDescription"  => _x( "Adapts the user experience on the site", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.kameleoon.com/fr/",
            "policyUrl"         =>  "https://www.kameleoon.com/fr/politique-de-confidentialite",
            "id"                => "static_Kameleoon",
            "type"              => "testing"
        ),
        array(
            "name"              => "Keyade",
            "title"             => "Keyade",
            "shortDescription"  => _x( "Helps us analyze our Google campaigns", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.keyade.com/",
            "policyUrl"         =>  "https://www.keyade.com/politique-de-confidentialite",
            "id"                => "static_Keyade",
            "type"              => "monitoring"
        ),
        array(
            "name"              => "__kla_id",
            "title"             => "Klaviyo",
            "shortDescription"  => _x( "Collects, analyzes, and uses your data to stay in touch", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.klaviyo.com/",
            "policyUrl"         =>  "https://www.klaviyo.com/privacy",
            "id"                => "static___kla_id",
            "type"              => "marketing"
        ),
        array(
            "name"              => "LasociétéMétéo-Villes",
            "title"             => "La société Météo-Villes",
            "shortDescription"  => _x( "Shows the weather on the site", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.meteo-chambery.com/",
            "policyUrl"         =>  "https://www.meteo-chambery.com/cgu",
            "id"                => "static_LasociétéMétéo-Villes",
            "type"              => "other"
        ),
        array(
            "name"              => "Labellium",
            "title"             => "Labellium",
            "shortDescription"  => _x( "Helps us analyze our Google campaigns", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.labelium.com/newyork",
            "policyUrl"         =>  "https://www.labelium.com/newyork/legal-notice",
            "id"                => "static_Labellium",
            "type"              => "monitoring"
        ),
        array(
            "name"              => "LaedtheWay",
            "title"             => "Lead The Way",
            "shortDescription"  => _x( "Analyzes visits to our site", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://lead-the-way.fr/",
            "policyUrl"         =>  "https://lead-the-way.fr/",
            "id"                => "static_LaedtheWay",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Leboncoin",
            "title"             => "Leboncoin",
            "shortDescription"  => _x( "Optimizes the advertising displayed on this site.", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.leboncoin.fr/",
            "policyUrl"         =>  "https://www.leboncoin.fr/dc/cookies/",
            "id"                => "static_Leboncoin",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Linkedin",
            "title"             => "Linkedin",
            "shortDescription"  => _x( "Identifies visitors from Linkedin", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://Linkedin.com",
            "policyUrl"         =>  "https://www.linkedin.com/legal/privacy-policy?_l=fr_FR",
            "id"                => "static_Linkedin",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Live_Agent",
            "title"             => "Live Agent",
            "shortDescription"  => _x( "Online chat with our teams", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.liveagent.com/",
            "policyUrl"         =>  "https://www.liveagent.com/privacy-policy/",
            "id"                => "static_Live_Agent",
            "type"              => "chat"
        ),
        array(
            "name"              => "_LiveChat",
            "title"             => "LiveChat",
            "shortDescription"  => _x( "Online chat with our teams", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.livechatinc.com",
            "policyUrl"         =>  "https://www.livechatinc.com/fr/pourquoi-livechat/",
            "id"                => "static__LiveChat",
            "type"              => "chat"
        ),
        array(
            "name"              => "LiveQuanty",
            "title"             => "LiveQuanty",
            "shortDescription"  => _x( "LiveQuanty is a free analytics dedicated to b2b that audits your website in real time and alerts you when hot prospects visit you.", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.livequanty.fr/",
            "policyUrl"         =>  "http://www.getquanty.com/mentions-legales/",
            "id"                => "static_LiveQuanty",
            "type"              => "monitoring"
        ),
        array(
            "name" => "LiveRamp",
            "title" => "LiveRamp",
            "shortDescription" => _x( "CRM retargeting and data integration application.", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "domain" => "http://liveramp.com/",
            "id" => "static_LiveRamp",
            "type" => "marketing"
        ),
        array(
            "name"              => "logRocket",
            "title"             => "LogRocket",
            "shortDescription"  => _x( "Helps identify problems on our site", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://logrocket.com/",
            "policyUrl"         =>  "https://logrocket.com/privacy/",
            "id"                => "static_logRocket",
            "type"              => "monitoring"
        ),
        array(
            "name"              => "MailChimp",
            "title"             => "MailChimp",
            "shortDescription"  => _x( "Send personalized emails", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://mailchimp.com/",
            "policyUrl"         =>  "https://mailchimp.com/fr/help/about-mailchimp-the-eu-swiss-privacy-shield-and-the-gdpr/",
            "id"                => "static_MailChimp",
            "type"              => "email"
        ),
        array(
            "name"              => "MailMunch",
            "title"             => "MailMunch",
            "shortDescription"  => _x( "Tool for customer relationship management", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.mailmunch.co",
            "policyUrl"         =>  "https://legal.mailmunch.com/privacy/",
            "id"                => "static_MailMunch",
            "type"              => "testing"
        ),
        array(
            "name"              => "MapBox",
            "title"             => "MapBox",
            "shortDescription"  => _x( "Mapping service", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.mapbox.com/",
            "policyUrl"         =>  "https://www.mapbox.com/legal/privacy/",
            "id"                => "static_MapBox",
            "type"              => "other"
        ),
        array(
            "name"              => "marketo",
            "title"             => "Marketo",
            "shortDescription"  => _x( "Customer personalization tool", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.marketo.com/",
            "policyUrl"         =>  "https://www.marketo.com/",
            "id"                => "static_marketo",
            "type"              => "marketing"
        ),
        array(
            "name" => "Mautic",
            "title" => "Mautic",
            "shortDescription" => _x( "Functional cookie allowing us to analyze the consultation statistics of our site", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "domain" => "https://mautic.mondevisfacile.fr/",
            "id" => "static_Mautic",
            "type" => "monitoring"
        ),
        array(
            "name" => "Media.net",
            "title" => "Media.net",
            "shortDescription" => _x( "User-focused contextual ad network with multiple implementation techniques", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "domain" => "Media.net",
            "id" => "static_Media.net",
            "type" => "marketing"
        ),
        array(
            "name"              => "Mediamat",
            "title"             => "Mediamat",
            "shortDescription"  => _x( "Statistics tool", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.mediametrie.fr/fr/mediamat",
            "policyUrl"         =>  "https://www.mediametrie.fr/fr/mediamat",
            "id"                => "static_Mediamat",
            "type"              => "monitoring"
        ),
        array(
            "name"              => "Mediarithmics",
            "title"             => "Mediarithmics",
            "shortDescription"  => _x( "Optimize our advertising", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.mediarithmics.com/fr-fr",
            "policyUrl"         =>  "https://www.mediarithmics.com/fr-fr/content/mentions-legales",
            "id"                => "static_Mediarithmics",
            "type"              => "other"
        ),
        array(
            "name"              => "Memberstack",
            "title"             => "Memberstack",
            "shortDescription"  => _x( "Payment solution", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.memberstack.io/",
            "policyUrl"         =>  "https://www.memberstack.io/legal/cookies",
            "id"                => "static_Memberstack",
            "type"              => "other"
        ),
        array(
            "name"              => "Messenger",
            "title"             => "Messenger",
            "shortDescription"  => _x( "Online chat with our teams", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.messenger.com/",
            "policyUrl"         =>  "https://developers.facebook.com/docs/messenger-platform/policy/",
            "id"                => "static_Messenger",
            "type"              => "chat"
        ),
        array(
            "name"              => "Meta I/O",
            "title"             => "Meta I/O",
            "shortDescription"  => _x( "Allows you to analyze consultation statistics for Metasearch advertising campaigns.", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://wihphotels.com/",
            "policyUrl"         =>  "https://wihphotels.com/en/privacy-policy.html",
            "id"                => "static_Meta I/O",
            "type"              => "monitoring"
        ),
        array(
            "name"              => "mojo",
            "title"             => "Mojo",
            "shortDescription"  => _x( "Animated Stories Editor for Instagram", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://mo-jo.fr/",
            "policyUrl"         =>  "https://mo-jo.fr/mentions-legales.html",
            "id"                => "static_mojo",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Monster_Insight",
            "title"             => "MonsterInsight",
            "shortDescription"  => _x( "Analyzes visits to our site", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.monsterinsights.com/",
            "policyUrl"         =>  "https://www.digitalreferent.fr/politique-de-confidentialite/",
            "id"                => "static_Monster_Insight",
            "type"              => "monitoring"
        ),
        array(
            "name"              => "MouseFlow",
            "title"             => "MouseFlow",
            "shortDescription"  => _x( "Recording of the navigation path", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://mouseflow.com/",
            "policyUrl"         =>  "https://mouseflow.com/privacy/",
            "id"                => "static_MouseFlow",
            "type"              => "testing"
        ),
        array(
            "name"              => "Mozoo",
            "title"             => "Mozoo",
            "shortDescription"  => _x( "Address of personalized messages.", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "http://www.mozoo.fr/",
            "policyUrl"         =>  "http://www.mozoo.fr/",
            "id"                => "static_Mozoo",
            "type"              => "marketing"
        ),
        array(
            "name"              => "MTCaptcha",
            "title"             => "MTCaptcha",
            "shortDescription"  => _x( "Secure our website", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.mtcaptcha.com/",
            "policyUrl"         =>  "https://www.mtcaptcha.com/gdpr-captcha",
            "id"                => "static_MTCaptcha",
            "type"              => "other"
        ),
        array(
            "name"              => "nelioab_userid",
            "title"             => "Nelio A/B testing",
            "shortDescription"  => _x( "Adapts the user experience on the site", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://neliosoftware.com/testing/",
            "policyUrl"         =>  "https://neliosoftware.com/nelio-ab-testing-terms-conditions/",
            "id"                => "static_nelioab_userid",
            "type"              => "testing"
        ),        
        array(
            "name"              => "NEURAL.ONE",
            "title"             => "Neural.one",
            "shortDescription"  => _x( "Collect behavioral information to create custom ads.", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://web.neural.one",
            "policyUrl"         =>  "https://web.neural.one/politica-de-privacidad/",
            "id"                => "static_NEURAL.ONE",
            "type"              => "other"
        ),
        array(
            "name" => "Newrelic",
            "title" => "Newrelic",
            "shortDescription" => _x( "Application performance monitoring", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "domain" => "https://newrelic.fr/",
            "id" => "static_Newrelic",
            "type" => "monitoring"
        ),
        array(
            "name"              => "nextuser",
            "title"             => "Nextuser",
            "shortDescription"  => _x( "Analyzes visits to our site", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.nextuser.com",
            "policyUrl"         =>  "https://www.nextuser.com/fr/policy/",
            "id"                => "static_nextuser",
            "type"              => "monitoring"
        ),
        array(
            "name"              => "Numberly",
            "title"             => "Numberly",
            "shortDescription"  => _x( "Customer personalization tool", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://numberly.com/fr/",
            "policyUrl"         =>  "https://numberly.com/fr/",
            "id"                => "static_Numberly",
            "type"              => "testing"
        ),
        array(
            "name"              => "Oktopost",
            "title"             => "Oktopost",
            "shortDescription"  => _x( "To keep in touch on social networks", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.oktopost.com/",
            "policyUrl"         =>  "https://www.oktopost.com/privacy",
            "id"                => "static_Oktopost",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Olapic",
            "title"             => "Olapic",
            "shortDescription"  => _x( "Inspirational photo gallery", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "http://www.olapic.com/",
            "policyUrl"         =>  "http://www.olapic.com/privacy-policy/",
            "id"                => "static_Olapic",
            "type"              => "other"
        ),
        array(
            "name"              => "Omnisend",
            "title"             => "Omnisend",
            "shortDescription"  => _x( "Send personalized emails", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "www.omnisend.com",
            "policyUrl"         =>  "https://www.omnisend.com/privacy/",
            "id"                => "static_Omnisend",
            "type"              => "email"
        ),
        array(
            "name" => "Omnitag",
            "title" => "Omnitag",
            "shortDescription" => _x( "Advertising pixel.", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "domain" => "http://omnitagjs.com",
            "id" => "static_Omnitag",
            "type" => "marketing"
        ),
        array(
            "name" => "Omniture_SiteCatalyst",
            "title" => "Omniture SiteCatalyst",
            "shortDescription" => _x( "Provides your website with real-time actionable insights regarding online strategies and marketing initiatives.", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "domain" => "http://www.omniture.com/",
            "id" => "static_Omniture_SiteCatalyst",
            "type" => "monitoring"
        ),
        array(
            "name"              => "One_Signal",
            "title"             => "One Signal",
            "shortDescription"  => _x( "Send mobile and desktop notifications", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://onesignal.com",
            "policyUrl"         =>  "https://onesignal.com/privacy_policy",
            "id"                => "static_One_Signal",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Optimizely",
            "title"             => "Optimizely",
            "shortDescription"  => _x( "Adapts the user experience on the site", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.optimizely.com/",
            "policyUrl"         =>  "https://www.optimizely.com/privacy/",
            "id"                => "static_Optimizely",
            "type"              => "testing"
        ),
        array(
            "name"              => "outfunnel",
            "title"             => "Outfunnel",
            "shortDescription"  => _x( "Send personalized emails", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://outfunnel.com/",
            "policyUrl"         =>  "https://outfunnel.com/cookie-policy",
            "id"                => "static_outfunnel",
            "type"              => "email"
        ),
        array(
            "name"              => "outplay",
            "title"             => "Outplay",
            "shortDescription"  => _x( "Tool for customer relationship management", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "outplayhq.com",
            "policyUrl"         =>  "https://outplayhq.com/privacy-policy",
            "id"                => "static_outplay",
            "type"              => "crm"
        ),
        array(
            "name"              => "ownpage_fp2",
            "title"             => "Ownpage",
            "shortDescription"  => _x( "Editorial customization", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.ownpage.fr",
            "policyUrl"         =>  "https://www.ownpage.fr/legal.html",
            "id"                => "static_ownpage_fp2",
            "type"              => "marketing"
        ),
        array(
            "name"              => "PageFair",
            "title"             => "PageFair",
            "shortDescription"  => _x( "Allows you to analyze how many users have an ad blocker", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://pagefair.com/",
            "policyUrl"         =>  "https://pagefair.com/privacy/",
            "id"                => "static_PageFair",
            "type"              => "monitoring"
        ),
        array(
            "name"              => "Pandadoc",
            "title"             => "Pandadoc",
            "shortDescription"  => _x( "Allows you to sign electronically ", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.pandadoc.com/",
            "policyUrl"         =>  "https://www.pandadoc.com/privacy-policy/",
            "id"                => "static_Pandadoc",
            "type"              => "other"
        ),
        array(
            "name"              => "Piio",
            "title"             => "Piio",
            "shortDescription"  => _x( "Optimize images on our site", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://piio.co/",
            "policyUrl"         =>  "https://piio.co/",
            "id"                => "static_Piio",
            "type"              => "marketing"
        ),
        array(
            "name"              => "PixelMe",
            "title"             => "PixelMe",
            "shortDescription"  => _x( "Evaluates the effectiveness of advertising actions", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://pixelme.me",
            "policyUrl"         =>  "https://pixelme.me/gdpr",
            "id"                => "static_PixelMe",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Plezi",
            "title"             => "Plezi",
            "shortDescription"  => _x( "Adapts the user experience on the site", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.plezi.co/fr/",
            "policyUrl"         =>  "https://www.plezi.co/fr/mentions-legales/",
            "id"                => "static_Plezi",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Polylang",
            "title"             => "Polylang",
            "shortDescription"  => _x( "Lets us remember your favorite language", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://polylang.pro/",
            "policyUrl"         =>  "/cookies",
            "id"                => "static_Polylang",
            "type"              => "other"
        ),
        array(
            "name"              => "Profitwell",
            "title"             => "Profitwell",
            "shortDescription"  => _x( "Allows us to analyze the consultation statistics of our site", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.profitwell.com/",
            "policyUrl"         =>  "https://www.priceintelligently.com/privacy-policy",
            "id"                => "static_Profitwell",
            "type"              => "monitoring"
        ),
        array(
            "name"              => "Pubmatic",
            "title"             => "Pubmatic",
            "shortDescription"  => _x( "PubMatic enables ad optimization across all ad networks", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "Pubmatic.com",
            "policyUrl"         =>  "Pubmatic.com",
            "id"                => "static_Pubmatic",
            "type"              => "marketing"
        ),
        array(
            "name"              => "_qca",
            "title"             => "Quantcast",
            "shortDescription"  => _x( "Collects your data to send you targeted advertisements", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.quantcast.com/",
            "policyUrl"         =>  "https://www.quantcast.com/privacy/",
            "id"                => "static__qca",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Qubit",
            "title"             => "Qubit",
            "shortDescription"  => _x( "Personalized product recommendation", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.qubit.com/fr/",
            "policyUrl"         =>  "https://www.qubit.com/fr/",
            "id"                => "static_Qubit",
            "type"              => "marketing"
        ),
        array(
            "name"              => "QuestionPro",
            "title"             => "QuestionPro",
            "shortDescription"  => _x( "Shows polls and surveys", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.questionpro.com/fr/",
            "policyUrl"         =>  "https://www.questionpro.com/help/privacy-policy.html",
            "id"                => "static_QuestionPro",
            "type"              => "other"
        ),
        array(
            "name"              => "Rakuten_affiliate",
            "title"             => "Rakuten Affiliate",
            "shortDescription"  => _x( "Recognizes visitors coming from this site", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://rakutenmarketing.com/fr-fr/canaux/affiliation/",
            "policyUrl"         =>  "https://rakutenmarketing.com/legal-notices/website-privacy-policy/",
            "id"                => "static_Rakuten_affiliate",
            "type"              => "monitoring"
        ),
        array(
            "name"              => "Realytics",
            "title"             => "Realytics",
            "shortDescription"  => _x( "Allows you to personalize advertisements for site visitors who have seen our TV campaign", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "www.realytics.io",
            "policyUrl"         =>  "https://www.realytics.io/fr/regles-de-confidentialite/",
            "id"                => "static_Realytics",
            "type"              => "monitoring"
        ),
        array(
            "name"              => "reengage",
            "title"             => "Reengage.io",
            "shortDescription"  => _x( "Adapts the user experience on the site", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://reengage.io/",
            "policyUrl"         =>  "https://reengage.io/",
            "id"                => "static_reengage",
            "type"              => "testing"
        ),
        array(
            "name"              => "resoneo",
            "title"             => "Résoneo",
            "shortDescription"  => _x( "Optimize our advertising", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.resoneo.com/",
            "policyUrl"         =>  "https://www.resoneo.com/",
            "id"                => "static_resoneo",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Reviews",
            "title"             => "Reviews",
            "shortDescription"  => _x( "Collects and displays customer reviews.", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "www.reviews.io",
            "policyUrl"         =>  "https://www.reviews.io/front/user-privacy-policy",
            "id"                => "static_Reviews",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Rubicon_Project",
            "title"             => "Rubicon Project",
            "shortDescription"  => _x( "Advertising optimization service.", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "RubiconProject.com",
            "policyUrl"         =>  "RubiconProject.com",
            "id"                => "static_Rubicon_Project",
            "type"              => "marketing"
        ),
        array(
            "name"              => "SaleCycle",
            "title"             => "SaleCycle",
            "shortDescription"  => _x( "Send personalized emails", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "SaleCycle.com",
            "policyUrl"         =>  "SaleCycle.com",
            "id"                => "static_SaleCycle",
            "type"              => "marketing"
        ),
        array(
            "name"              => "SalesForce",
            "title"             => "SalesForce",
            "shortDescription"  => _x( "Personalize your customer profile ", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.salesforce.com/fr/",
            "policyUrl"         =>  "https://www.salesforce.com/fr/company/privacy/",
            "id"                => "static_SalesForce",
            "type"              => "crm"
        ),
        array(
            "name"              => "saleweaver",
            "title"             => "saleweaver",
            "shortDescription"  => _x( "Secure our website", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.saleweaver.com",
            "policyUrl"         =>  "https://www.saleweaver.com/privacy",
            "id"                => "static_saleweaver",
            "type"              => "monitoring"
        ),
        array(
            "name"              => "Sarbacane",
            "title"             => "Sarbacane",
            "shortDescription"  => _x( "Makes it easier to send tailor-made emails!", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.sarbacane.com/",
            "policyUrl"         =>  "https://www.sarbacane.com/rgpd",
            "id"                => "static_Sarbacane",
            "type"              => "email"
        ),
        array(
            "name"              => "segment",
            "title"             => "Segment",
            "shortDescription"  => _x( "Tracking interactions between user and page", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://segment.com/",
            "policyUrl"         =>  "https://segment.com/docs/legal/privacy/",
            "id"                => "static_segment",
            "type"              => "crm"
        ),
        array(
            "name"              => "Selligent",
            "title"             => "Selligent",
            "shortDescription"  => _x( "Optimize our advertising", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.selligent.com/fr",
            "policyUrl"         =>  "https://www.selligent.com/fr/politique-de-confidentialite-de-selligent-sa",
            "id"                => "static_Selligent",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Sellsy",
            "title"             => "Sellsy",
            "shortDescription"  => _x( "Customer relationship management and statistics solution", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://go.sellsy.com/fr/",
            "policyUrl"         =>  "https://go.sellsy.com/fr/rgpd/",
            "id"                => "static_Sellsy",
            "type"              => "crm"
        ),
        array(
            "name"              => "SemRush",
            "title"             => "SemRush",
            "shortDescription"  => _x( "Analyzes the relevance of the pages of our site", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.semrush.com/",
            "policyUrl"         =>  "https://fr.semrush.com/company/legal/privacy-policy/",
            "id"                => "static_SemRush",
            "type"              => "other"
        ),
        array(
            "name"              => "SendinBlue",
            "title"             => "SendinBlue",
            "shortDescription"  => _x( "Send personalized emails", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://fr.sendinblue.com/",
            "policyUrl"         =>  "https://fr.sendinblue.com/legal/antispampolicy/",
            "id"                => "static_SendinBlue",
            "type"              => "email"
        ),
        array(
            "name"              => "Sentry",
            "title"             => "Sentry",
            "shortDescription"  => _x( "Allows you to detect design problems", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://sentry.io/welcome/",
            "policyUrl"         =>  "https://sentry.io/privacy/",
            "id"                => "static_Sentry",
            "type"              => "monitoring"
        ),
        array(
            "name"              => "pxcelBcnLcy",
            "title"             => "ShareThis",
            "shortDescription"  => _x( "Adds sharing links to articles on this site", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://sharethis.com/",
            "policyUrl"         =>  "https://sharethis.com/privacy/",
            "id"                => "static_pxcelBcnLcy",
            "type"              => "other"
        ),
        array(
            "name"              => "Silverpop",
            "title"             => "Silverpop",
            "shortDescription"  => _x( "Allows us to send personalized emails", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.ibm.com/security/privacy?p1=Search&p4=p50370606087&p5=b&cm_mmc=Search_Google-_-1S_1S-_-WW_EP-_-%2Bgdpr_b&cm_mmca7=71700000061224228&cm_mmca8=kwd-137027213082&cm_mmca9=EAIaIQobChMI24_Vpurs5wIVxMreCh00WgsWEAAYASAAEgKMqvD_BwE&cm_mmca10=406750868091&cm_mmca11=b&gclid=EAIaIQobChMI24_Vpurs5wIVxMreCh00WgsWEAAYASAAEgKMqvD_BwE&gclsrc=aw.ds",
            "policyUrl"         =>  "https://www.ibm.com/watson/marketing-automation",
            "id"                => "static_Silverpop",
            "type"              => "email"
        ),
        array(
            "name" => "Skaze",
            "title" => "Skaze",
            "shortDescription" => _x( "Marketing automation and email sending tool", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "domain" => "http://www.skaze.fr/",
            "id" => "static_Skaze",
            "type" => "marketing"
        ),
        array(
            "name"              => "Skimlinks",
            "title"             => "Skimlinks",
            "shortDescription"  => _x( "Optimize our advertising", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://skimlinks.com/",
            "policyUrl"         =>  "https://skimlinks.com/",
            "id"                => "static_Skimlinks",
            "type"              => "marketing"
        ),
        array(
            "name"              => "smart-adserver",
            "title"             => "Smart Adserver",
            "shortDescription"  => _x( "Generates and optimizes online advertising.", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "http://www.smartadserver.com/",
            "policyUrl"         =>  "https://smartadserver.fr/politique-confidentialite-client-final/",
            "id"                => "static_smart-adserver",
            "type"              => "marketing"
        ),
        array(
            "name"              => "SmartCrawl",
            "title"             => "SmartCrawl",
            "shortDescription"  => _x( "Improve our natural referencing", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://premium.wpmudev.org/project/smartcrawl-wordpress-seo/",
            "policyUrl"         =>  "https://closuria.fr/cgv-mentions-legales",
            "id"                => "static_SmartCrawl",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Smartlook",
            "title"             => "Smartlook",
            "shortDescription"  => _x( "helps us detect ergonomic problems", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.smartlook.com/fr/",
            "policyUrl"         =>  "https://www.smartlook.com/help/gdpr/",
            "id"                => "static_Smartlook",
            "type"              => "testing"
        ),
        array(
            "name"              => "smartprofile",
            "title"             => "SmartProfile",
            "shortDescription"  => _x( "Allows us to analyze the consultation statistics of our site", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.smartp.com",
            "policyUrl"         =>  "https://www.smartp.com",
            "id"                => "static_smartprofile",
            "type"              => "monitoring"
        ),
        array(
            "name"              => "Smartsupp",
            "title"             => "Smartsupp",
            "shortDescription"  => _x( "Online chat with customer service", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.smartsupp.com",
            "policyUrl"         =>  "https://www.smartsupp.com/fr/help/rgpd/",
            "id"                => "static_Smartsupp",
            "type"              => "chat"
        ),
        array(
            "name"              => "SMSFactor",
            "title"             => "SMSFactor",
            "shortDescription"  => _x( "To keep in touch with you by SMS", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.smsfactor.it/",
            "policyUrl"         =>  "https://www.smsfactor.it/",
            "id"                => "static_SMSFactor",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Snap_Pixel",
            "title"             => "Snap Pixel",
            "shortDescription"  => _x( "With the Snap Pixel, advertisers can track their customers' journey.", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://forbusiness.snapchat.com/measurement/",
            "policyUrl"         =>  "https://forbusiness.snapchat.com/measurement/",
            "id"                => "static_Snap_Pixel",
            "type"              => "monitoring"
        ),
        array(
            "name"              => "Snapcall",
            "title"             => "Snapcall",
            "shortDescription"  => _x( "Integrates a direct call function on our site", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://snapcall.io/",
            "policyUrl"         =>  "https://snapcall.io/privacy/",
            "id"                => "static_Snapcall",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Snapchat",
            "title"             => "Snapchat",
            "shortDescription"  => _x( "Allows you to improve the performance of advertising campaigns on Snapchat", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "snap.com",
            "policyUrl"         =>  "https://www.snap.com/en-US/privacy/privacy-center/",
            "id"                => "static_Snapchat",
            "type"              => "chat"
        ),
        array(
            "name"              => "Sociomantic",
            "title"             => "Sociomantic",
            "shortDescription"  => _x( "Offers real-time bidding solutions for e-commerce advertisers.", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "Sociomantic.com",
            "policyUrl"         =>  "Sociomantic.com",
            "id"                => "static_Sociomantic",
            "type"              => "marketing"
        ),
        array(
            "name"              => "sorewards",
            "title"             => "sorewards",
            "shortDescription"  => _x( "Improve your experience on the site", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.sorewards.com/",
            "policyUrl"         =>  "https://www.sorewards.com/",
            "id"                => "static_sorewards",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Speed_Curve",
            "title"             => "Speed Curve",
            "shortDescription"  => _x( "Guarantees the security and stability of our site", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://speedcurve.com/",
            "policyUrl"         =>  "https://speedcurve.com/",
            "id"                => "static_Speed_Curve",
            "type"              => "monitoring"
        ),
        array(
            "name"              => "splio",
            "title"             => "Splio",
            "shortDescription"  => _x( "Loyalty program", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "www.slio.com",
            "policyUrl"         =>  "www.slio.com",
            "id"                => "static_splio",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Spread",
            "title"             => "Spread",
            "shortDescription"  => _x( "Offers games and promotions", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.spreadfamily.fr/",
            "policyUrl"         =>  "",
            "id"                => "static_Spread",
            "type"              => "crm"
        ),
        array(
            "name"              => "Squarespace",
            "title"             => "Squarespace",
            "shortDescription"  => _x( "Guarantees the security and stability of our site", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "www.squarespace.com",
            "policyUrl"         =>  "https://fr.squarespace.com/confidentialite",
            "id"                => "static_Squarespace",
            "type"              => "monitoring"
        ),
        array(
            "name"              => "SugarCRM",
            "title"             => "SugarCRM",
            "shortDescription"  => _x( "Tool for customer relationship management", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.sugarcrm.com/fr",
            "policyUrl"         =>  "https://www.sugarcrm.com/legal/privacy-policy",
            "id"                => "static_SugarCRM",
            "type"              => "crm"
        ),
        array(
            "name"              => "Sumo",
            "title"             => "Sumo",
            "shortDescription"  => _x( "Customer relationship management tool", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://sumo.com/",
            "policyUrl"         =>  "https://sumo.com/tos",
            "id"                => "static_Sumo",
            "type"              => "marketing"
        ),
        array(
            "name"              => "SurveyGizmo",
            "title"             => "SurveyGizmo",
            "shortDescription"  => _x( "Shows polls and surveys", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.surveygizmo.com/",
            "policyUrl"         =>  "https://www.surveygizmo.com/privacy/",
            "id"                => "static_SurveyGizmo",
            "type"              => "other"
        ),
        array(
            "name"              => "SurveyMonkey",
            "title"             => "SurveyMonkey",
            "shortDescription"  => _x( "Shows polls and surveys", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://fr.surveymonkey.com/",
            "policyUrl"         =>  "https://fr.surveymonkey.com/mp/legal/privacy-policy/",
            "id"                => "static_SurveyMonkey",
            "type"              => "other"
        ),
        array(
            "name"              => "sync_tv",
            "title"             => "Sync TV",
            "shortDescription"  => _x( "Multi-screen advertising", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://sync.tv/",
            "policyUrl"         =>  "https://sync.tv/",
            "id"                => "static_sync_tv",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Taboola",
            "title"             => "Taboola",
            "shortDescription"  => _x( "Personalized recommendation technology", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "Taboola.com",
            "policyUrl"         =>  "Taboola.com",
            "id"                => "static_Taboola",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Tapad",
            "title"             => "Tapad",
            "shortDescription"  => _x( "Allows advertisers to engage the same consumer with consistent ads across multiple platforms", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "Tapad.com",
            "policyUrl"         =>  "Tapad.com",
            "id"                => "static_Tapad",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Tawk.to",
            "title"             => "Tawk.to",
            "shortDescription"  => _x( "Online chat from our site", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "Tawk.to",
            "policyUrl"         =>  "https://www.tawk.to/privacy-policy/",
            "id"                => "static_Tawk.to",
            "type"              => "chat"
        ),
        array(
            "name"              => "Teads",
            "title"             => "Teads",
            "shortDescription"  => _x( "Video advertising at the service of technology.", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "Teads.tv",
            "policyUrl"         =>  "Teads.tv",
            "id"                => "static_Teads",
            "type"              => "marketing"
        ),
        array(
            "name"              => "TheTrade Desk",
            "title"             => "The Trade Desk",
            "shortDescription"  => _x( "Data-driven marketing suite that gives marketers a single place to buy all forms of media online", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "TheTradeDesk.com",
            "policyUrl"         =>  "TheTradeDesk.com",
            "id"                => "static_TheTrade Desk",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Tidio",
            "title"             => "Tidio Chat",
            "shortDescription"  => _x( "Live chat", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "tidio.com",
            "policyUrl"         =>  "https://www.tidio.com/privacy-policy/",
            "id"                => "static_Tidio",
            "type"              => "chat"
        ),
        array(
            "name"              => "TikTok",
            "title"             => "TikTok",
            "shortDescription"  => _x( "Identifies visitors from TikTok", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.tiktok.com/fr/",
            "policyUrl"         =>  "https://www.tiktok.com/legal/privacy-policy?lang=fr",
            "id"                => "static_TikTok",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Time_One_Affiliation",
            "title"             => "Time One",
            "shortDescription"  => _x( "Optimize our advertising", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.timeonegroup.com/",
            "policyUrl"         =>  "https://privacy.timeonegroup.com/?utm_source=privacy_perf",
            "id"                => "static_Time_One_Affiliation",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Toky_Woky",
            "title"             => "Toky Woky",
            "shortDescription"  => _x( "Community conversational tool", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.tokywoky.com/fr",
            "policyUrl"         =>  "https://www.tokywoky.com/fr",
            "id"                => "static_Toky_Woky",
            "type"              => "chat"
        ),
        array(
            "name"              => "tonefuse",
            "title"             => "Tonefuse",
            "shortDescription"  => _x( "Optimize our advertising", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://cp.tonefuse.com/amplified-terms-of-service",
            "policyUrl"         =>  "https://cp.tonefuse.com/amplified-terms-of-service",
            "id"                => "static_tonefuse",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Tower_Data",
            "title"             => "Tower Data",
            "shortDescription"  => _x( "Optimize our advertising", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "http://intelligence.towerdata.com/",
            "policyUrl"         =>  "http://intelligence.towerdata.com/",
            "id"                => "static_Tower_Data",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Tradedoubler",
            "title"             => "Tradedoubler",
            "shortDescription"  => _x( "Affiliate program management", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.tradedoubler.com/fr/",
            "policyUrl"         =>  "https://www.tradedoubler.com/fr/gdpr-compliance/",
            "id"                => "static_Tradedoubler",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Tradelab",
            "title"             => "Tradelab",
            "shortDescription"  => _x( "Delivers targeted advertising ", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://tradelab.com/",
            "policyUrl"         =>  "https://tradelab.com/vie-privee-2/",
            "id"                => "static_Tradelab",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Tree_Nation",
            "title"             => "Tree Nation",
            "shortDescription"  => _x( "Compensation for CO2 emissions", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "www.tree-nation.com",
            "policyUrl"         =>  "https://info.tree-nation.com/privacy-policy-and-cookies/",
            "id"                => "static_Tree_Nation",
            "type"              => "other"
        ),
        array(
            "name"              => "TAUD",
            "title"             => "Tripadvisor",
            "shortDescription"  => _x( "Tracks your site usage to build search profiles", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.tripadvisor.fr/",
            "policyUrl"         =>  "https://tripadvisor.mediaroom.com/us-privacy-policy",
            "id"                => "static_TAUD",
            "type"              => "other"
        ),
        array(
            "name"              => "TripleLift",
            "title"             => "TripleLift",
            "shortDescription"  => _x( "Native Advertising System for the Visual Web", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "TripleLift.com",
            "policyUrl"         =>  "TripleLift.com",
            "id"                => "static_TripleLift",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Twilio_SendGrid",
            "title"             => "Twilio SendGrid",
            "shortDescription"  => _x( "Email routing platform", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://sendgrid.com/",
            "policyUrl"         =>  "https://www.twilio.com/legal/privacy",
            "id"                => "static_Twilio_SendGrid",
            "type"              => "email"
        ),
        array(
            "name"              => "Twitter",
            "title"             => "Twitter",
            "shortDescription"  => _x( "Identifies visitors from Twitter", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://twitter.com",
            "policyUrl"         =>  "https://help.twitter.com/fr/rules-and-policies/update-privacy-policy",
            "id"                => "static_Twitter",
            "type"              => "marketing"
        ),
        array(
            "name"              => "TypeForm",
            "title"             => "TypeForm",
            "shortDescription"  => _x( "Shows polls and surveys", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.typeform.com/",
            "policyUrl"         =>  "https://admin.typeform.com/to/dwk6gt",
            "id"                => "static_TypeForm",
            "type"              => "other"
        ),
        array(
            "name"              => "vimeo",
            "title"             => "Vimeo",
            "shortDescription"  => _x( "This cookie allows the display of videos from Vimeo", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://vimeo.com/fr",
            "policyUrl"         =>  "https://vimeo.com/cookie_policy",
            "id"                => "static_vimeo",
            "type"              => "other"
        ),
        array(
            "name"              => "Visiblee",
            "title"             => "Visible",
            "shortDescription"  => _x( "Helps us identify anonymous visitors", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.visiblee.io/",
            "policyUrl"         =>  "http://confidentiality.visiblee.io/fr/confidentialite",
            "id"                => "static_Visiblee",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Visitor_Analytics",
            "title"             => "Visitor Analytics",
            "shortDescription"  => _x( "Measure the audience on our site", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "www.wix.com",
            "policyUrl"         =>  "privacy.wix.com",
            "id"                => "static_Visitor_Analytics",
            "type"              => "monitoring"
        ),
        array(
            "name"              => "W3_Total_Cache plugin",
            "title"             => "W3TOTAL CACHE",
            "shortDescription"  => _x( "Reduced page loading time", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.w3-edge.com/products/w3-total-cache/",
            "policyUrl"         =>  "https://www.digitalreferent.fr/politique-de-confidentialite/",
            "id"                => "static_W3_Total_Cache plugin",
            "type"              => "other"
        ),
        array(
            "name"              => "Warfare_plugins",
            "title"             => "Warfare plugins",
            "shortDescription"  => _x( "Adds sharing links to articles on this site", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.addthis.com/",
            "policyUrl"         =>  "https://warfareplugins.com/privacy-policy/",
            "id"                => "static_Warfare_plugins",
            "type"              => "marketing"
        ),
        array(
            "name"              => "webgains",
            "title"             => "Webgains",
            "shortDescription"  => _x( "Agency dedicated to the distribution of our advertisements", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.webgains.com",
            "policyUrl"         =>  "https://www.webgains.com/public/fr/politique/",
            "id"                => "static_webgains",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Webmecanik",
            "title"             => "Webmecanik",
            "shortDescription"  => _x( "Marketing automation and email sending tool", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.webmecanik.com/",
            "policyUrl"         =>  "https://www.webmecanik.com/",
            "id"                => "static_Webmecanik",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Weborama",
            "title"             => "Weborama",
            "shortDescription"  => _x( "User knowledge support tool", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://weborama.com",
            "policyUrl"         =>  "https://weborama.com/respect-de-la-vie-privee-2-2/",
            "id"                => "static_Weborama",
            "type"              => "marketing"
        ),
        array(
            "name"              => "WhatsApp",
            "title"             => "WhatsApp",
            "shortDescription"  => _x( "To chat with us", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.whatsapp.com/business/?lang=it",
            "policyUrl"         =>  "https://www.whatsapp.com/privacy",
            "id"                => "static_WhatsApp",
            "type"              => "chat"
        ),
        array(
            "name"              => "WhoIsVisiting",
            "title"             => "WhoIsVisiting",
            "shortDescription"  => _x( "Allows us to analyze the consultation statistics of our site", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.whoisvisiting.com/",
            "policyUrl"         =>  "https://www.whoisvisiting.com/privacy-policy/",
            "id"                => "static_WhoIsVisiting",
            "type"              => "monitoring"
        ),
        array(
            "name"              => "Wisepop",
            "title"             => "Wisepop",
            "shortDescription"  => _x( "Displays personalized and contextualized popups on our site", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://wisepops.com/",
            "policyUrl"         =>  "https://wisepops.com/",
            "id"                => "static_Wisepop",
            "type"              => "marketing"
        ),
        array(
            "name"              => "wooTracker",
            "title"             => "Woopra",
            "shortDescription"  => _x( "Statistics useful for product development, marketing, sales and support teams", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.woopra.com",
            "policyUrl"         =>  "https://www.woopra.com/privacy",
            "id"                => "static_wooTracker",
            "type"              => "monitoring"
        ),
        array(
            "name"              => "xandr",
            "title"             => "Xandr",
            "shortDescription"  => _x( "Agency dedicated to the distribution of our advertisements", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.xandr.com/",
            "policyUrl"         =>  "https://www.xandr.com/privacy/",
            "id"                => "static_xandr",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Xeno",
            "title"             => "XenoApp",
            "shortDescription"  => _x( "To chat with us", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://xenoapp.com",
            "policyUrl"         =>  "https://xenoapp.com/legal/xeno-and-the-general-data-protection-regulation-gdpr/",
            "id"                => "static_Xeno",
            "type"              => "chat"
        ),
        array(
            "name"              => "Xiti",
            "title"             => "Xiti",
            "shortDescription"  => _x( "Measure and analyze the audience on our website", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.xiti.com/",
            "policyUrl"         =>  "https://www.atinternet.com/societe/rgpd-et-vie-privee/",
            "id"                => "static_Xiti",
            "type"              => "monitoring"
        ),
        array(
            "name"              => "Yahoo",
            "title"             => "Yahoo",
            "shortDescription"  => _x( "Personalize sponsored results on Yahoo", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "fr.yahoo.com",
            "policyUrl"         =>  "fr.yahoo.com",
            "id"                => "static_Yahoo",
            "type"              => "marketing"
        ),
        array(
            "name" => "Yahoo_Small_Business",
            "title" => "Yahoo Small Business",
            "shortDescription" => _x( "Yahoo advertising network and search engine marketing solutions.", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "domain" => "http://sem.smallbusiness.yahoo.com/searchenginemarketing/",
            "id" => "static_Yahoo_Small_Business",
            "type" => "marketing"
        ),
        array(
            "name"              => "Yandex_Metrica",
            "title"             => "Yandex Metrica",
            "shortDescription"  => _x( "Allows you to understand navigation errors.", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "metrica.yandex.ru",
            "policyUrl"         =>  "metrica.yandex.ru",
            "id"                => "static_Yandex_Metrica",
            "type"              => "monitoring"
        ),
        array(
            "name"              => "Youtube",
            "title"             => "YouTube",
            "shortDescription"  => _x( "This cookie allows us to collect your video playback preferences", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.youtube.com/intl/fr/yt/about/",
            "policyUrl"         =>  "https://policies.google.com/privacy?hl=fr&gl=fr",
            "id"                => "static_Youtube",
            "type"              => "other"
        ),
        array(
            "name" => "zendesk",
            "title"                 => "Zendesk",
            "shortDescription"          => _x( "Online chat with our teams", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => "Zendesk is software that makes it easy to communicate with you, by providing a dialog window on the lower right corner of our page.",
            "domain"            => "www.zendesk.com",
            "policyUrl"         =>  "https://www.zendesk.fr/company/customers-partners/privacy-policy/",
            "id"                => "static_zendesk",
            "type"              => "chat"
        ),
        array(
            "name"              => "Zoho",
            "title"             => "Zoho",
            "shortDescription"  => _x( "Tool for customer relationship management", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.zoho.com/fr/",
            "policyUrl"         =>  "https://www.zoho.com/fr/privacy.html",
            "id"                => "static_Zoho",
            "type"              => "crm"
        ),
        array(
            "name"              => "Matomo",
            "title"             => "Matomo",
            "shortDescription"  => _x( "Measure our audience on our site", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://fr.matomo.org/",
            "policyUrl"         =>  "https://fr.matomo.org/privacy-policy/",
            "id"                => "static_Matomo",
            "type"              => "monitoring"
        ),
        array(
            "name"              => "Fathom",
            "title"             => "Fathom",
            "shortDescription"  => _x( "Measure our audience on our site", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://usefathom.com/",
            "policyUrl"         =>  "https://usefathom.com/privacy",
            "id"                => "static_Fathom",
            "type"              => "monitoring"
        ),
        array(
            "name"              => "Plausible",
            "title"             => "Plausible",
            "shortDescription"  => _x( "Measure our audience on our site", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://plausible.io/",
            "policyUrl"         =>  "https://plausible.io/privacy",
            "id"                => "static_Plausible",
            "type"              => "monitoring"
        ),
        array(
            "name" => "AT Internet",
            "title" => "AT_Internet",
            "shortDescription" => _x( "Audience measurement", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription" => "AT Internet is a privately held company that provides web analytics services and consulting for websites, intranet, mobile sites and mobile applications. GDPR compliant.",
            "domain" => "https://www.atinternet.com",
            "id" => "static_AT Internet",
            "type" => "monitoring"
        ),
        array(
            "name"              => "Magnetis",
            "title"             => "Magnetis",
            "shortDescription"  => _x( "Call tracking solution", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.magnetis.fr/",
            "policyUrl"         =>  "https://www.magnetis.fr/mentions-legales/",
            "id"                => "static_Magnetis",
            "type"              => "chat"
        ),
        array(
            "name"              => "shopimind",
            "title"             => "Shopimind",
            "shortDescription"  => _x( "Intelligent multichannel marketing for e-retailers", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.shopimind.com/",
            "policyUrl"         =>  "https://www.shopimind.com/politique-de-confidentialite/",
            "id"                => "static_shopimind",
            "type"              => "email"
        ),
        array(
            "name" => "Soundcloud",
            "title" => "Soundcloud",
            "shortDescription" => _x( "This cookie collects your music preferences", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription" => "This cookie collects your preferences in terms of music listening",
            "domain" => "https://soundcloud.com/",
            "id" => "static_soundcloud",
            "type" => "other"
        ),
        array(
            "name" => "Batch",
            "title"                 => "Batch",
            "shortDescription"          => _x( "Batch makes it easy to send notifications to keep you informed of announcements", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => "You won't miss any announcement thanks to Batch which allows us to easily send you notifications",
            "domain"            => "https://batch.com",
            "policyUrl"         =>  "https://batch.com/privacy-policy",
            "id"                => "static_batch",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Capterra",
            "title"             => "Capterra",
            "shortDescription"  => _x( "Capterra helps you find the right software for your business", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => "We're the world's leading software reviews and selection platform",
            "domain"            => "https://www.capterra.com/",
            "policyUrl"         =>  "https://www.capterra.com/legal/privacy-policy",
            "id"                => "static_Capterra",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Netaffiliation",
            "title"             => "Netaffiliation",
            "shortDescription"  => _x( "eMailing and marketing automation", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "domain"            => "Netaffiliation.com",
            "id"                => "static_Netaffiliation",
            "type"              => "marketing"
        ),
        array(
            "name"              => "Outbrain",
            "title"             => "Outbrain",
            "shortDescription"  => _x( "Improve your user experience", 'cookie-short-description', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN),
            "longDescription"   => '',
            "domain"            => "https://www.outbrain.com",
            "policyUrl"         =>  "https://www.outbrain.com/fr/trust-and-transparency/",
            "id"                => "static_Outbrain",
            "type"              => "marketing"
        ),
    );
}

/**
 * Add a data attribute to an html element
 */
function cdc_add_data( $html, $el, $id, $content ) {

    $content    = esc_attr( $content );
    $id         = esc_attr( $id );

    //don't add if it's already included
    if ( strpos( $html, 'data-'.$id ) !== false ) {
        return $html;
    }

    $pos = strpos( $html, "<$el" );

    if ( $pos !== false ) {
        $html = substr_replace( $html, '<' . $el . ' data-' . $id . '="' . $content . '"', $pos, strlen( "<$el" ) );
    }

    return $html;
}

/**
 * Check if this is a page builder editor
 */
function cdc_is_pagebuilder_preview() {

    $preview = false;
    global $wp_customize;
    
    if ( isset( $wp_customize ) 
        || isset( $_GET['fb-edit'] )
        || isset( $_GET['et_pb_preview'] ) //divi
        || isset( $_GET['et_fb'] ) //divi
        || isset( $_GET['elementor-preview'] )
        || isset( $_GET['elementor_library'] )
        || isset( $_GET['elementor-app'] )
        || isset( $_GET['vc_action'] )
        || isset( $_GET['vc_editable'] )
        || isset( $_GET['vcv-action'] )
        || isset( $_GET['zion_builder_active'])
        || isset( $_GET['zionbuilder-preview'])
        || isset( $_GET['fl_builder'] )
        || isset( $_GET['tve'] )
        || isset( $_GET['ct_builder'] ) //oxygen
        || isset( $_GET['tatsu'] ) //tatsu
        || isset( $_GET['tatsu-header'] ) //tatsu
        || isset( $_GET['tatsu-footer'] ) //tatsu
    ) {
        $preview = true;
    }

    //exclude widgets
    if ( defined( 'REST_REQUEST' ) && REST_REQUEST ) {
        return true;
    }

    if ( isset($_GET['context']) &&  $_GET['context'] === 'edit' ) {
        return true;
    }

    return $preview;
}