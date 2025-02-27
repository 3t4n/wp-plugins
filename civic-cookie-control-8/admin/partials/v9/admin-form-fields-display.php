<?php

if (get_option('civic_cookiecontrol_settings_v9')) {

    $ccc_options = get_option('civic_cookiecontrol_settings_v9');
} elseif (get_option($this->plugin_name)) {

    $ccc_options = get_option($this->plugin_name);

    update_option('civic_cookiecontrol_settings_v9', $ccc_options);

    $ccc_options = get_option('civic_cookiecontrol_settings_v9');
} else {

    $ccc_options = $ccc_cookiecontrol_settings_defaults_ins;
}

?>

<div class="ccc-container ccc-notice-group">

    <header>
        <h1>
            <a href="https://www.civicuk.com/cookie-control" title="<?php _e('Cookie Control  by Civic', 'cookie-control'); ?>" target="_blank"><?php _e('Cookie Control by Civic', 'cookie-control'); ?></a>
        </h1>
    </header>

    <hr>

    <div>
        <p><?php _e('With an elegant  user-interface that doesn\'t hurt the look and feel of your site, Cookie Control is a mechanism for controlling user consent for the use of cookies on their computer.', 'cookie-control'); ?></p>
        <p><?php _e('For more information, please visit Civic\'s Cookie Control pages at:', 'cookie-control'); ?> <a href="https://www.civicuk.com/cookie-control" title="Cookie Control by Civic" target="_blank">https://www.civicuk.com/cookie-control</a></p>
        <a class="civic" href="https://www.civicuk.com/cookie-control/download" target="_blank"><?php  ?><?php _e('Get Your API Key', 'cookie-control'); ?></a>
    </div>

    <div class="wrap">

        <?php $this->ccc_cookiecontrol_settings_update_check(); ?>
        <form method="post" action="options.php" id="form-settings-main">

            <?php

            $ccc_curr_url = $_SERVER['SERVER_NAME'];
            $ccc_valid_Api_field = '';
            $ccc_api_key_info = '';
            $ccc_productVal = '';

            if (isset($ccc_options['apiKey']) && $ccc_options['apiKey'] != "") {
                $ccc_api_key_info = $this->ccc_get_api_civic($ccc_curr_url, trim($ccc_options['apiKey']));

                if (isset($ccc_api_key_info['valid']) && $ccc_api_key_info['valid']) {
                    $ccc_valid_Api_field = 'valid';
                    if ($ccc_api_key_info['product'] == 'CookieControl Multi-Site') {
                        $ccc_productVal = 'PRO_MULTISITE';
                    } elseif ($ccc_api_key_info['product'] == 'CookieControl Single-Site') {
                        $ccc_productVal = 'PRO';
                    } elseif ($ccc_api_key_info['product'] == 'CookieControl Free') {
                        $ccc_productVal = 'COMMUNITY';
                    } elseif ($ccc_api_key_info['product'] == 'CookieControl Custom') {
                        $ccc_productVal = 'CUSTOM';
                    }
                }
            }
            update_option('civic_cookiecontrol_productval',  $ccc_productVal);


            if (get_option('civic_cookiecontrol_apikey_version') == 'v9') {
                settings_fields($this->plugin_name);
                do_settings_sections('civic_cookiecontrol_settings_v9');
            } else {
                settings_fields($this->plugin_name);
                do_settings_sections($this->plugin_name);
            }

            $hidden_content_product = "";
            $hidden_content_all = "";
            $hidden_content_license = "";

            if (($ccc_valid_Api_field == "" || $ccc_options['apiKey'] == "") && $ccc_api_key_info != 'not respond') {
                $hidden_content_all = 'hidden_content';
            }
            if ((isset($ccc_api_key_info['valid']) && $ccc_api_key_info['product'] == 'CookieControl Free')) {
                $hidden_content_product = 'hidden_content';
            }

            $hide_cookie_tab = $ccc_options['iabCMP'] == "true" && $ccc_options['initialState'] != "GOVUK" ? 'hidden_cookie_tab' : '';
            $active_cookie_tab = $ccc_options['iabCMP'] == "true" && $ccc_options['initialState'] != "GOVUK" ? 'ui-tabs-active ui-state-active' : '';
            $hide_govuk_content = $ccc_options['initialState'] == "GOVUK" ? ' govuk-hide-element-hide' : '';
            $show_govuk_content = $ccc_options['initialState'] == "GOVUK" ? ' govuk-hide-element-show' : '';
        
            ?>

            <input type="hidden" name="cookiecontrol_settings[apiValid]" id="cookiecontrol_settings[apiValid]" value="<?php echo (!empty($ccc_options['apiKey']) ? $ccc_valid_Api_field : ''); ?>">
            <!-- API -->
            <h2><?php _e('Your Cookie Control Product Information', 'cookie-control'); ?></h2>
            <table class="form-table">
                <tr>
                    <th scope="row">
                        <label for="cookiecontrol_settings[apikey]"><?php _e('API Key', 'cookie-control'); ?> <span>&#42;</span></label>
                    </th>
                    <td>
                        <input type="text" name="cookiecontrol_settings[apiKey]" id="cookiecontrol_settings[apiKey]" value="<?php echo (isset($ccc_options['apiKey']) ? esc_html(stripslashes(trim($ccc_options['apiKey']))) : ''); ?>" size="50" />
                        <?php
                        if (!isset($ccc_options['apiKey']) || $ccc_options['apiKey'] == "") { ?>
                            <div class="warning warning--api">
                                <div class="dashicons dashicons-warning"><span class="screen-reader-text"><?php _e('warning', 'cookie-control'); ?></span></div>
                                <?php printf(__('Please fill your API Key. <a class="text-underline" target="_blank" href="%s">Get Your API Key</a>.', 'cookie-control'), esc_url('https://www.civicuk.com/cookie-control/download')); ?>
                            </div>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><?php _e('Please select your API key version first and then save your settings. After save settings, you can see and edit your settings based on checked version.', 'cookie-control') ?></td>
                </tr>
                <?php
                $ccc_options_apikey_version = get_option('civic_cookiecontrol_apikey_version') ? get_option('civic_cookiecontrol_apikey_version') : '';
                $ccc_radio_version_api_class  = (isset($ccc_options['apiKey']) && $ccc_options['apiKey'] != "") ? 'cookiecontrol_settings_api_key_version' : '';
                ?>
                <tr>
                    <th scope="row">
                        <label for="cookiecontrol_settings_v9_api_key_version"><?php _e('API key version', 'cookie-control'); ?> <span>&#42;</span></label>
                    </th>
                    <td>
                        <input type="radio" class="first <?php echo $ccc_radio_version_api_class; ?>" id="ccc_radio_api_key_version_v8" name="cookiecontrol_settings_api_key_version" value="v8" <?php checked('v8', (isset($ccc_options_apikey_version) ?  $ccc_options_apikey_version : '')); ?> /><?php _e('Version 8', 'cookie-control'); ?>
                        <input type="radio" class="<?php echo $ccc_radio_version_api_class; ?>" id="ccc_radio_api_key_version_v9" name="cookiecontrol_settings_api_key_version" value="v9" <?php checked('v9', (isset($ccc_options_apikey_version) ?  $ccc_options_apikey_version : '')); ?> /><?php _e('Version 9', 'cookie-control'); ?>
                    </td>
                </tr>

                <?php

                if (($ccc_api_key_info == 'not respond' || isset($ccc_api_key_info['valid']) &&  !$ccc_api_key_info['valid']) || (isset($ccc_options['apiKey']) && $ccc_options['apiKey'] != "" &&  $ccc_valid_Api_field != 'valid')) {

                    $hidden_content_all = "";

                    if ((isset($ccc_options['product']) && $ccc_options['product'] == 'COMMUNITY')) {
                        $hidden_content_product = 'hidden_content';
                    }
                ?>
                    <tr>
                        <th scope="row">
                            <label for="cookiecontrol_settings[product]"><?php _e('Product License Type', 'cookie-control'); ?> <span>&#42;</span></label>
                        </th>
                        <td>
                            <input type="radio" class="first com-check" name="cookiecontrol_settings[product]" value="COMMUNITY" <?php checked('COMMUNITY', (isset($ccc_options['product']) ? $ccc_options['product'] : '')); ?> /><?php _e('Community Edition', 'cookie-control'); ?>
                            <input type="radio" class="pro-check" name="cookiecontrol_settings[product]" value="PRO" <?php checked('PRO', (isset($ccc_options['product']) ? $ccc_options['product'] : ' ')); ?> /><?php _e('Pro Edition', 'cookie-control'); ?>
                            <input type="radio" class="multi-check" name="cookiecontrol_settings[product]" value="PRO_MULTISITE" <?php checked('PRO_MULTISITE', (isset($ccc_options['product']) ? $ccc_options['product'] : '')); ?> /><?php _e('Multisite Pro Edition', 'cookie-control'); ?>
                            <input type="radio" class="custom-check" name="cookiecontrol_settings[product]" value="CUSTOM" <?php checked('CUSTOM', (isset($ccc_options['product']) ? $ccc_options['product'] : '')); ?> /><?php _e('Custom Edition', 'cookie-control'); ?>
                        </td>
                    </tr>
                <?php } else {  ?>

                    <tr class="<?php echo  $hidden_content_all; ?>">
                        <th scope="row">
                            <label for="cookiecontrol_settings[product]"><?php _e('Product License Type', 'cookie-control'); ?> <span>&#42;</span></label>
                        </th>
                        <td>
                            <span><input type="radio" class="first community-check" name="cookiecontrol_settings[product]" value="COMMUNITY" <?php if (isset($ccc_api_key_info['product']) && $ccc_api_key_info['product'] == "CookieControl Free") { ?> checked <?php } else { ?> disabled <?php } ?> /> <?php _e('Community Edition', 'cookie-control'); ?></span>
                            <span><input type="radio" name="cookiecontrol_settings[product]" value="PRO" <?php if (isset($ccc_api_key_info['product']) && $ccc_api_key_info['product'] == "CookieControl Single-Site") { ?> checked <?php } else { ?> disabled <?php } ?> /> <?php _e('Pro Edition', 'cookie-control'); ?></span>
                            <span> <input type="radio" name="cookiecontrol_settings[product]" value="PRO_MULTISITE" <?php if (isset($ccc_api_key_info['product']) && $ccc_api_key_info['product'] == "CookieControl Multi-Site") { ?> checked <?php } else { ?> disabled <?php } ?> /><?php _e('Multisite Pro Edition', 'cookie-control'); ?></span>
                            <span> <input type="radio" name="cookiecontrol_settings[product]" value="CUSTOM" <?php if (isset($ccc_api_key_info['product']) && $ccc_api_key_info['product'] == "CookieControl Custom") { ?> checked <?php } else { ?> disabled <?php } ?> /><?php _e('Custom Edition', 'cookie-control'); ?></span>

                        </td>
                    </tr>

                <?php } ?>

                <tr class="<?php echo  $hidden_content_all; ?>">
                    <th scope="row">
                        <label for="cookiecontrol_settings[logConsent]"><?php _e('Log Consent', 'cookie-control'); ?> <span>&#42;</span></label>
                    </th>
                    <td>
                        <input type="radio" class="first" name="cookiecontrol_settings[logConsent]" value="false" <?php checked('false', (isset($ccc_options['logConsent']) ? $ccc_options['logConsent'] : '')); ?> /><?php _e('No', 'cookie-control'); ?>
                        <input type="radio" name="cookiecontrol_settings[logConsent]" value="true" <?php checked('true', (isset($ccc_options['logConsent']) ? $ccc_options['logConsent'] : '')); ?> /><?php _e('Yes', 'cookie-control'); ?>
                    </td>
                </tr>
                <tr class="<?php echo  $hidden_content_all; ?>">
                    <th scope="row">
                        <label for="cookiecontrol_settings[encodeCookie]"><?php _e('Encode Cookie', 'cookie-control'); ?></label>
                    </th>
                    <td>
                        <input type="radio" class="first" name="cookiecontrol_settings[encodeCookie]" id="cookiecontrol_settings[encodeCookie]" value="true" <?php if (isset($ccc_options['encodeCookie'])) : checked('true', $ccc_options['encodeCookie']);
                                                                                                                                                                endif; ?> /><?php _e('True', 'cookie-control'); ?>
                        <input type="radio" name="cookiecontrol_settings[encodeCookie]" id="cookiecontrol_settings[encodeCookie]" value="false" <?php if (isset($ccc_options['encodeCookie'])) :  checked('false', $ccc_options['encodeCookie']);
                                                                                                                                                else : ?> checked <?php endif; ?> /><?php _e('False', 'cookie-control'); ?>
                    </td>
                </tr>
                <tr class="<?php echo  $hidden_content_all; ?>">
                    <th scope="row">
                        <label for="cookiecontrol_settings[subDomains]"><?php _e('Sub Domains', 'cookie-control'); ?></label>
                    </th>
                    <td>
                        <input type="radio" class="first" name="cookiecontrol_settings[subDomains]" id="cookiecontrol_settings[subDomains]" value="true" <?php if (isset($ccc_options['subDomains'])) : checked('true', $ccc_options['subDomains']);
                                                                                                                                                            else : ?> checked <?php endif; ?> /><?php _e('True', 'cookie-control'); ?>
                        <input type="radio" name="cookiecontrol_settings[subDomains]" id="cookiecontrol_settings[subDomains]" value="false" <?php if (isset($ccc_options['subDomains'])) :  checked('false', $ccc_options['subDomains']);
                                                                                                                                            endif; ?> /><?php _e('False', 'cookie-control'); ?>
                    </td>
                </tr>
                <tr class="<?php echo  $hidden_content_all; ?> govuk-hide-element <?php echo $hide_govuk_content; ?>">
                    <th scope="row">
                        <label for="cookiecontrol_settings[mode]"><?php _e('Mode', 'cookie-control'); ?> <span>&#42;</span></label>
                    </th>
                    <td>
                        <input type="radio" class="first" name="cookiecontrol_settings[mode]" value="gdpr" <?php checked('gdpr', (isset($ccc_options['mode']) ? $ccc_options['mode'] : '')); ?> /><?php _e('GDPR', 'cookie-control'); ?>
                        <input type="radio" name="cookiecontrol_settings[mode]" value="ccpa" <?php checked('ccpa', (isset($ccc_options['mode']) ? $ccc_options['mode'] : '')); ?> /><?php _e('CCPA', 'cookie-control'); ?>
                    </td>
                </tr>
                <tr class="<?php echo  $hidden_content_all; ?>">
                  <th scope="row">
                    <label for="cookiecontrol_settings[wrapInnerHTML]"><?php _e('Wrap Inner HTML', 'cookie-control'); ?></label>
                  </th>
                  <td>
                    <input type="radio" class="first" name="cookiecontrol_settings[wrapInnerHTML]" id="cookiecontrol_settings[wrapInnerHTML]" value="true" <?php checked('true', (isset($ccc_options['wrapInnerHTML']) ? $ccc_options['wrapInnerHTML'] : $ccc_cookiecontrol_settings_defaults_ins['wrapInnerHTML'])); ?> /><?php _e('True', 'cookie-control'); ?>
                    <input type="radio" name="cookiecontrol_settings[wrapInnerHTML]" id="cookiecontrol_settings[wrapInnerHTML]" value="false" <?php checked('false', (isset($ccc_options['wrapInnerHTML']) ? $ccc_options['wrapInnerHTML'] : $ccc_cookiecontrol_settings_defaults_ins['wrapInnerHTML'])); ?> /><?php _e('False', 'cookie-control'); ?>
                  </td>
                </tr>
            </table>


            <div class="group-down <?php echo   $hidden_content_all; ?> ">
                <h2 class="additional-title"><?php _e('Additional Settings', 'cookie-control'); ?></h2>
                <hr />
                <div id="cookie-tabs">
                    <ul class="cookie-tabs">
                        <li class="cookie-optional-tab <?php echo $hide_cookie_tab; ?>">
                            <h3><a href="#optional"><?php _e('Cookies', 'cookie-control'); ?></a></h3>
                        </li>
                        <li class="<?php echo $active_cookie_tab; ?> ">
                            <h3><a href="#necessary"><?php _e('Necessary Cookies', 'cookie-control'); ?></a></h3>
                        </li>
                        <li>
                            <h3><a href="#appearance"><?php _e('Appearance', 'cookie-control'); ?></a></h3>
                        </li>
                        <li class="hide-com <?php echo $hidden_content_product; ?> <?php echo $hide_govuk_content; ?> govuk-hide-element">
                            <h3><a href="#branding"><?php _e('Branding', 'cookie-control'); ?></a></h3>
                        </li>
                        <li class="hide-com <?php echo $hidden_content_product; ?> govuk-hide-element <?php echo $hide_govuk_content; ?>">
                            <h3><a href="#regional"><?php _e('Regional', 'cookie-control'); ?></a></h3>
                        </li>
                        <li class="govuk-hide-element <?php echo $hide_govuk_content; ?>">
                            <h3><a href="#accessibility"><?php _e('Accessibility', 'cookie-control'); ?></a></h3>
                        </li>
                        <li class="hide-com <?php echo $hidden_content_product;  ?> <?php echo $hide_govuk_content; ?> govuk-hide-element">
                            <h3><a href="#iab"><?php _e('Iab', 'cookie-control'); ?></a></h3>
                        </li>
                    </ul>

                    <div id="optional" class="cookie-optional-tab <?php echo $hide_cookie_tab; ?>">
                        <h2><?php _e('Cookies Categories*', 'cookie-control'); ?></h2>
                        <?php _e('The module\'s core behaviour will be dependent on you accurately setting the optionalCookies option. This will inform the user of the different types of cookies the website may set, and protect any given type from being deleted should the user have consented to their use.', 'cookie-control'); ?>
                        <div class="warning">
                            <div class="dashicons dashicons-warning"><span class="screen-reader-text"><?php _e('warning', 'cookie-control'); ?></span></div>
                            <?php _e('It is required to add at least a cookie category.', 'cookie-control'); ?>
                        </div>

                        <?php
                        // Check if WP Consent API is active
                        if (defined('WP_CONSENT_API_VERSION')): ?>
                        <div class="info">
                            <div class="dashicons dashicons-info-outline"><span class="screen-reader-text"><?php _e('information', 'cookie-control'); ?></span></div>
                            <?php _e('WP Consent API is active. You can set consent foreach of the 5 categories (functional, statistics-anonymous, statistics, preferences, marketing) by adding the following onAccept and onRevoke callbak for each category.', 'cookie-control'); ?>
                            <p><?php _e('On accept callback function (replace statistics with the right category)', 'cookie-control'); ?></p>
                            <pre>wp_set_consent('statistics', 'allow');</pre>
                            <p><?php _e('On revoke callback function (replace statistics with the right category)', 'cookie-control'); ?></p>
                            <pre>wp_set_consent('statistics', 'deny');</pre>
                        </div>
                        <?php endif; ?>

                        <div class="optionalCookiesTemplate">
                            <div class="ccc-title-cat">
                                <h3><?php _e('Cookie Category', 'cookie-control'); ?> <span class="ccc-title-number"></span> <span class="ccc-title-catlabel"></span></h3>
                            </div>
                            <div class="ccc-content-cat">
                                <table class="form-table">
                                    <tr>
                                        <th scope="row">
                                            <label for="cookiecontrol_settings[optionalCookiesName]"><?php _e('Cookie name *', 'cookie-control'); ?></label>
                                            <p><?php _e('A unique identifier for the category, that the module will use to set an acceptance cookie for when user\'s opt in.', 'cookie-control'); ?></p>
                                        </th>
                                        <td>
                                            <input placeholder="eg. analytics" type="text" name="cookiecontrol_settings[optionalCookiesName]" id="cookiecontrol_settings[optionalCookiesName]" size="50" />
                                            <a href="#" class="remove removeRow removeRowInside" data-class="optionalCookies" id="removeoptionalCookies">
                                                <div class="dashicons dashicons-dismiss"><span class="screen-reader-text"><?php _e('Remove', 'cookie-control'); ?></span></div>
                                                <div class="delete-cookie"><?php _e('Remove', 'cookie-control'); ?></div>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="cookiecontrol_settings[optionalCookiesLabel]"><?php _e('Cookie label *', 'cookie-control'); ?></label>
                                            <p><?php _e('The descriptive title assigned to the category and displayed by the module.', 'cookie-control'); ?></p>
                                        </th>
                                        <td>
                                            <input placeholder="eg. Analytical Cookies" class="cookie-label-field" type="text" name="cookiecontrol_settings[optionalCookiesLabel]" id="cookiecontrol_settings[optionalCookiesLabel]" size="50" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="cookiecontrol_settings[optionalCookiesDescription]"><?php _e('Cookie description', 'cookie-control'); ?></label>
                                            <p><?php _e('The full description assigned to the category and displayed by the module.', 'cookie-control'); ?></p>
                                        </th>
                                        <td>
                                            <input placeholder="eg. Analytical cookies help us to improve our website by collecting and reporting information on its usage." type="text" name="cookiecontrol_settings[optionalCookiesDescription]" id="cookiecontrol_settings[optionalCookiesDescription]" size="50" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="cookiecontrol_settings[optionalCookiesArray]"><?php _e('Cookies', 'cookie-control'); ?></label>
                                            <p><?php _e('The name of the cookies that you wish to protect after a user opts in (comma seperated values ex. \'_ga\', \'_gid\', \'_gat\', \'__utma\').', 'cookie-control'); ?></p>
                                        </th>
                                        <td>
                                            <input type="text" name="cookiecontrol_settings[optionalCookiesArray]" id="cookiecontrol_settings[optionalCookiesArray]" size="50" />
                                        </td>
                                    </tr>
                                    <tr class="optionalInfoCookies">
                                        <th scope="row">
                                            <label for="cookiecontrol_settings[optionalCookiesthirdPartyCookies]"><?php _e('Third party cookies', 'cookie-control'); ?></label>
                                            <p><?php _e('Only applicable if the category will set third party cookies on acceptance. Each object will consist of the following key-value pairs:', 'cookie-control'); ?></p>
                                            <ul>
                                                <li>name : string, (Example: AddThis)</li>
                                                <li>optOutLink : url string (Example: http://www.addthis.com/privacy/opt-out )</li>
                                            </ul>
                                        </th>
                                        <td>
                                            <span class=""></span>
                                            <input class="cookieThitdPatyField" placeholder='eg. {"name": "AddThis", "optOutLink": "http://www.addthis.com/privacy/opt-out"}' type="hidden" name="cookiecontrol_settings[optionalCookiesthirdPartyCookies]" id="cookiecontrol_settings[optionalCookiesthirdPartyCookies]" size="50" />
                                            <br>
                                            <span class="thirdPartyCookiesGroup thirdPartyCookiesGroup-down thirdPartyCookiesGroupVal data-number data-number-pre" data-number="1">
                                                <input placeholder='eg. name' class="optOutLinkNameDynamic" type="text" name="cookiecontrol_settings[optionalCookiesthirdPartyCookiesName]" id="cookiecontrol_settings[optionalCookiesthirdPartyCookiesName]" size="50" />
                                                <br>
                                                <input placeholder='eg. optOutLink' class="optOutLinkUrlDynamic" type="text" name="cookiecontrol_settings[optionalCookiesthirdPartyCookiesUrl]" id="cookiecontrol_settings[optionalCookiesthirdPartyCookiesUrl]" size="50" />
                                                <br>
                                            </span>
                                            <div class="warning">
                                                <div class="dashicons dashicons-warning"><span class="screen-reader-text"><?php _e('warning', 'cookie-control'); ?></span></div>
                                                <?php _e('You can add More Third Party Cookies, after you create the Cookie category and save your settings', 'cookie-control'); ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" colspan="2">
                                            <label for="cookiecontrol_settings[optionalCookiesonAccept]"><?php _e('On accept callback function', 'cookie-control'); ?></label>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <textarea name="cookiecontrol_settings[optionalCookiesonAccept]" id="cookiecontrol_settings[optionalCookiesonAccept]" cols="60" rows="10"></textarea>
                                        </td>
                                        <td>
                                            <p><?php _e('Read how to use GA4 with Google Tag Manager and Google Consent Mode ', 'cookie-control'); ?><a class="text-underline" href="https://www.civicuk.com/blog-item/simplify-cookie-control-set-google-consent-mode" title="<?php _e('Example how to use GA4 with google Tag Manager', 'cookie-control'); ?>" target="_blank"><strong><?php _e('here.', 'cookie-control'); ?></strong></a></p>
                                            <p><?php _e('Callback function that will fire on user\'s opting into this cookie category.  For example:', 'cookie-control'); ?> </p>
                                            <pre style="font-size: 10px;">
    gtag('consent', 'update', {'analytics_storage': 'granted'});
                    </pre>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" colspan="2">
                                            <label for="cookiecontrol_settings[optionalCookiesonRevoke]"><?php _e('On revoke callback function', 'cookie-control'); ?></label>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <textarea name="cookiecontrol_settings[optionalCookiesonRevoke]" id="cookiecontrol_settings[optionalCookiesonRevoke]" cols="60" rows="10"></textarea>
                                        </td>
                                        <td>
                                            <p><?php _e('Callback function that will fire on user\'s opting out of this cookie category. For example:', 'cookie-control'); ?> </p>
                                            <pre style="font-size: 10px;"> gtag('consent', 'update', {'analytics_storage': 'denied'});</pre>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="cookiecontrol_settings[optionalCookiesinitialConsentState]"><?php _e('Recommended Consent State', 'cookie-control'); ?></label>
                                            <p><?php _e('Defines whether or not this category should be accepted (opted in) as part of the user granting consent to the site\'s recommended settings. If set to "on", cookies will be allowed by default for this category.', 'cookie-control'); ?> </p>
                                        </th>
                                        <td>
                                            <input type="radio" class="first" name="cookiecontrol_settings[optionalCookiesinitialConsentState]" id="cookiecontrol_settings[optionalCookiesinitialConsentState]" value="off" checked />
                                            <?php _e('Off', 'cookie-control'); ?>
                                            <input type="radio" name="cookiecontrol_settings[optionalCookiesinitialConsentState]" id="cookiecontrol_settings[optionalCookiesinitialConsentState]" value="on" />
                                            <?php _e('On', 'cookie-control'); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="cookiecontrol_settings[optionalCookieslawfulBasis]"><?php _e('Lawful basis', 'cookie-control'); ?></label>
                                            <p><?php _e('Defines whether this category requires explicit user consent, or if the category can be toggled on prior to any user interaction and justified under the more flexible lawful basis for processing: legitimate interest.', 'cookie-control'); ?></p>
                                            <p><?php _e('Possible values are either consent or legitimate interest. If the latter, the UI will show the category toggled \'on\', though no record of consent will exist.', 'cookie-control'); ?></p>
                                            <p><?php _e('If you choose to rely on legitimate interest, you are taking on extra responsibility for considering and protecting people’s rights and interests; and must include details of your legitimate interests in your privacy statement.', 'cookie-control'); ?></p>
                                        </th>
                                        <td>
                                            <input type="radio" class="first" name="cookiecontrol_settings[optionalCookieslawfulBasis]" id="cookiecontrol_settings[optionalCookieslawfulBasis]" value="consent" checked />
                                            <?php _e('Consent ', 'cookie-control'); ?>
                                            <input type="radio" name="cookiecontrol_settings[optionalCookieslawfulBasis]" id="cookiecontrol_settings[optionalCookieslawfulBasis]" value="legitimate interest" />
                                            <?php _e('Legitimate interest', 'cookie-control'); ?>
                                        </td>
                                    </tr>
                                    <tr class="optionalInfoCookiesVendors">
                                        <th scope="row">
                                            <label for="cookiecontrol_settings[optionalCookiesthirdPartyCookies]"><?php _e('Vendors', 'cookie-control'); ?></label>
                                            <p><?php _e('You can use this if you want to explicitly display the vendors that place the cookies that you use. This is particularly useful if you are targeting users in Brazil and want to comply with LGPD.', 'cookie-control'); ?></p>
                                        </th>
                                        <td>
                                            <div class="categoryVendor categoryVendor-down categoryVendorVal data-number data-number-pre" data-number="1">
                                                <input type="text" name="cookiecontrol_settings[optionalCookiesVendorName]" id="cookiecontrol_settings[optionalCookiesVendorName]" placeholder="eg. Name" size="50" />
                                                <br>
                                                <br>
                                                <input type="text" name="cookiecontrol_settings[optionalCookiesVendorDescription]" id="cookiecontrol_settings[optionalCookiesVendorDescription]" placeholder="eg. Description" size="50" />
                                                <br>
                                                <br>
                                                <input type="text" name="cookiecontrol_settings[optionalCookiesVendorUrl]" id="cookiecontrol_settings[optionalCookiesVendorUrl]" placeholder="eg. Url" size="50" />
                                                <br>
                                                <br>
                                                <label for="cookiecontrol_settings[optionalCookiesVendorThirdPartyCookies]"><?php _e('Third party cookies', 'cookie-control'); ?></label>

                                                <input type="radio" class="first" name="cookiecontrol_settings[optionalCookiesVendorThirdPartyCookies]" id="cookiecontrol_settings[optionalCookiesVendorThirdPartyCookies]" value="true" />
                                                <?php _e('Yes ', 'cookie-control'); ?>
                                                <input type="radio" name="cookiecontrol_settings[optionalCookiesVendorThirdPartyCookies]" id="cookiecontrol_settings[optionalCookiesVendorThirdPartyCookies]" value="false" checked />
                                                <?php _e('No', 'cookie-control'); ?>
                                            </div>
                                            <div class="warning">
                                                <div class="dashicons dashicons-warning"><span class="screen-reader-text"><?php _e('warning', 'cookie-control'); ?></span></div>
                                                <?php _e('You can add More Vendors, after you create the Cookie category and save your settings', 'cookie-control'); ?>
                                            </div>
                                        </td>
                                    </tr>
                                </table>

                            </div>
                        </div>

                        <div id="optionalCookiesContainer" class="ccc-accordion">
                            <?php

                            if (!empty($ccc_options['optionalCookiesName'])) :
                                $ccc_output_extra_cookies = "";
                                $ccc_var_update = "";
                                foreach ($ccc_options['optionalCookiesName'] as $key => $val) :  ?>
                                    <?php if (trim($val) != '') : ?>
                                        <div class="optionalCookies ccc-accordion-inside data-number" data-number="<?php echo $key; ?>">
                                            <div class="ccc-title-group">
                                                <div class="ccc-title">
                                                    <h3><?php _e('Cookie Category', 'cookie-control'); ?> <span>1</span> <?php echo !empty($ccc_options['optionalCookiesLabel'][$key]) ? '(' . $ccc_options['optionalCookiesLabel'][$key] . ')' : ''; ?> <i>+</i></h3>
                                                </div>
                                                <a href="#" class="remove removeCookieCategory" data-class="optionalCookies" id="removeoptionalCookies">
                                                    <div class="dashicons dashicons-dismiss"><span class="screen-reader-text"><?php _e('Remove', 'cookie-control'); ?></span></div>
                                                    <div class="delete-cookie">Delete</div>
                                                </a>
                                            </div>

                                            <div class="ccc-content">
                                                <table class="form-table">
                                                    <tr>
                                                        <th scope="row">
                                                            <label for="cookiecontrol_settings[optionalCookiesName][<?php echo $key ?>]"><?php _e('Cookie name *', 'cookie-control'); ?></label>
                                                            <p><?php _e('A unique identifier for the category, that the module will use to set an acceptance cookie for when user\'s opt in.', 'cookie-control'); ?></p>
                                                        </th>
                                                        <td>
                                                            <input required type="text" name="cookiecontrol_settings[optionalCookiesName][<?php echo $key ?>]" data-name="<?php echo $val; ?>" id="cookiecontrol_settings[optionalCookiesName][<?php echo $key ?>]" value="<?php echo esc_html(stripslashes($val)); ?>" size="50" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            <label for="cookiecontrol_settings[optionalCookiesLabel][<?php echo $key ?>]"><?php _e('Cookie label *', 'cookie-control'); ?></label>
                                                            <p><?php _e('The descriptive title assigned to the category and displayed by the module.', 'cookie-control'); ?></p>
                                                        </th>
                                                        <td>
                                                            <input required type="text" name="cookiecontrol_settings[optionalCookiesLabel][<?php echo $key ?>]" id="cookiecontrol_settings[optionalCookiesLabel][<?php echo $key ?>]" value="<?php echo esc_html(stripslashes($ccc_options['optionalCookiesLabel'][$key])); ?>" size="50" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            <label for="cookiecontrol_settings[optionalCookiesDescription][<?php echo $key ?>]"><?php _e('Cookie description', 'cookie-control'); ?></label>
                                                            <p><?php _e('The full description assigned to the category and displayed by the module.', 'cookie-control'); ?></p>
                                                        </th>
                                                        <td>
                                                            <input type="text" name="cookiecontrol_settings[optionalCookiesDescription][<?php echo $key ?>]" id="cookiecontrol_settings[optionalCookiesDescription][<?php echo $key ?>]" value="<?php echo stripslashes($ccc_options['optionalCookiesDescription'][$key]); ?>" size="50" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            <label for="cookiecontrol_settings[optionalCookiesArray][<?php echo $key ?>]"><?php _e('Cookies', 'cookie-control'); ?></label>
                                                            <p><?php _e('The name of the cookies that you wish to protect after a user opts in (comma seperated values ex. \'_ga\', \'_gid\', \'_gat\', \'__utma\').', 'cookie-control'); ?></p>
                                                        </th>
                                                        <td>
                                                            <input type="text" name="cookiecontrol_settings[optionalCookiesArray][<?php echo $key ?>]" id="cookiecontrol_settings[optionalCookiesArray][<?php echo $key ?>]" value="<?php echo esc_html(stripslashes($ccc_options['optionalCookiesArray'][$key])); ?>" size="50" />
                                                        </td>
                                                    </tr>
                                                    <tr class="optionalInfoCookies">
                                                        <th scope="row">
                                                            <label for="cookiecontrol_settings[optionalCookiesthirdPartyCookies][<?php echo $key ?>]"><?php _e('Third party cookies', 'cookie-control'); ?></label>
                                                            <p><?php _e('Only applicable if the category will set third party cookies on acceptance. Each object will consist of the following key-value pairs:', 'cookie-control'); ?></p>
                                                            <ul>
                                                                <li>name : string, (Example: AddThis)</li>
                                                                <li>optOutLink : url string (Example: http://www.addthis.com/privacy/opt-out )</li>
                                                            </ul>
                                                        </th>
                                                        <td>
                                                            <?php if (isset($ccc_options['optionalCookiesthirdPartyCookies'][$key])  && !isset($ccc_options['optionalCookiesthirdPartyCookiesName'][$key]) && !isset($ccc_options['optionalCookiesthirdPartyCookiesUrl'][$key])) { ?>
                                                                <?php if ($ccc_options['optionalCookiesthirdPartyCookies'][$key]) { ?>
                                                                    <div class="warning">
                                                                        <div class="dashicons dashicons-warning"><span class="screen-reader-text"><?php _e('warning', 'cookie-control'); ?></span></div>
                                                                        <?php _e('You may have to re assign the third party cookies inside each category. Your Previous Object was :', 'cookie-control'); ?> <br> <?php echo stripslashes($ccc_options['optionalCookiesthirdPartyCookies'][$key]); ?>
                                                                    </div>
                                                                <?php  } ?>
                                                            <?php } ?>
                                                            <br>

                                                            <br>
                                                            <span class="thirdPartyCookiesGroupVal">
                                                                <input type="text" class="optOutLinkNameDynamic" placeholder="eg. Name" name="cookiecontrol_settings[optionalCookiesthirdPartyCookiesName][<?php echo $key ?>]" id="cookiecontrol_settings[optionalCookiesthirdPartyCookiesName][<?php echo $key ?>]" value='<?php echo isset($ccc_options['optionalCookiesthirdPartyCookiesName'][$key]) ?   esc_attr(stripslashes($ccc_options['optionalCookiesthirdPartyCookiesName'][$key])) : ''; ?>' size="50" />
                                                                <br>
                                                                <input type="text" class="optOutLinkUrlDynamic" placeholder="eg. optOutLink" name="cookiecontrol_settings[optionalCookiesthirdPartyCookiesUrl][<?php echo $key ?>]" id="cookiecontrol_settings[optionalCookiesthirdPartyCookiesUrl][<?php echo $key ?>]" value='<?php echo isset($ccc_options['optionalCookiesthirdPartyCookiesUrl'][$key]) ?   esc_url(stripslashes($ccc_options['optionalCookiesthirdPartyCookiesUrl'][$key])) : ''; ?>' size="50" />
                                                            </span>
                                                            <?php
                                                            if (isset($ccc_options['optionalCookiesthirdPartyCookiesName' . $key]) && isset($ccc_options['optionalCookiesthirdPartyCookiesUrl' . $key])) {

                                                                foreach ($ccc_options['optionalCookiesthirdPartyCookiesName' . $key] as $key2 => $val2) {
                                                                    $ccc_output_extra_cookies  .= ' , {"name": "' . $ccc_options['optionalCookiesthirdPartyCookiesName' . $key][$key2] . '", "optOutLink" : "' . $ccc_options['optionalCookiesthirdPartyCookiesUrl' . $key][$key2] . '"}';
                                                            ?>
                                                                    <span class="thirdPartyCookiesGroup thirdPartyCookiesGroup-down thirdPartyCookiesGroupVal data-number" data-number="<?php echo $key ?>">
                                                                        <input type="text" class="optOutLink-field1 optOutLinkNameDynamic" placeholder="eg. Name" name="cookiecontrol_settings[optionalCookiesthirdPartyCookiesName<?php echo $key; ?>][<?php echo $key2; ?>]" id="cookiecontrol_settings[optionalCookiesthirdPartyCookiesName<?php echo $key; ?>][<?php echo $key2; ?>]" value='<?php echo esc_attr(stripslashes($ccc_options['optionalCookiesthirdPartyCookiesName' . $key][$key2])); ?>' size="50" />
                                                                        <input type="text" class="optOutLink-field1 optOutLinkUrlDynamic" placeholder="eg. optOutLink" name="cookiecontrol_settings[optionalCookiesthirdPartyCookiesUrl<?php echo $key; ?>][<?php echo $key2; ?>]" id="cookiecontrol_settings[optionalCookiesthirdPartyCookiesUrl<?php echo $key; ?>][<?php echo $key2; ?>]" value='<?php echo esc_url(stripslashes($ccc_options['optionalCookiesthirdPartyCookiesUrl' . $key][$key2])); ?>' size="50" />
                                                                        <a href="#" class="remove-opt-link">
                                                                            <div class="dashicons dashicons-dismiss"><span class="screen-reader-text"><?php _e('Remove', 'cookie-control'); ?></span></div><?php _e('Remove optOutlink', 'cookie-control'); ?>
                                                                        </a>
                                                                    </span>
                                                            <?php }
                                                            }
                                                            ?>
                                                            <a href="#" class="more-opt-link civic"><?php _e('Add optOutlink', 'cookie-control') ?></a>
                                                            <input type="hidden" class="thirdPartyCookieFinalUrl" name="cookiecontrol_settings[optionalCookiesthirdPartyCookies][<?php echo $key ?>]" id="cookiecontrol_settings[optionalCookiesthirdPartyCookies][<?php echo $key ?>]" value='<?php if (isset($ccc_options['optionalCookiesthirdPartyCookiesName'][$key]) && isset($ccc_options['optionalCookiesthirdPartyCookiesUrl'][$key])) { ?>{"name": "<?php echo $ccc_options['optionalCookiesthirdPartyCookiesName'][$key]; ?>", "optOutLink": "<?php echo $ccc_options['optionalCookiesthirdPartyCookiesUrl'][$key]; ?>"}<?php if ($ccc_output_extra_cookies != "") {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        echo $ccc_output_extra_cookies;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    echo "";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                } ?>' size="50" />
                                                            <?php
                                                            $ccc_output_extra_cookies = ""; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" colspan="2">
                                                            <label for="cookiecontrol_settings[optionalCookiesonAccept][<?php echo $key ?>]"><?php _e('On accept callback function', 'cookie-control'); ?></label>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <textarea name="cookiecontrol_settings[optionalCookiesonAccept][<?php echo $key ?>]" id="cookiecontrol_settings[optionalCookiesonAccept][<?php echo $key ?>]" cols="60" rows="10"><?php echo esc_html(stripslashes($ccc_options['optionalCookiesonAccept'][$key])); ?></textarea>
                                                        </td>
                                                        <td>
                                                            <p><?php _e('Read how to use GA4 with Google Tag Manager and Google Consent Mode ', 'cookie-control'); ?><a class="text-underline" href="https://www.civicuk.com/blog-item/simplify-cookie-control-set-google-consent-mode" title="<?php _e('Example how to use GA4 with google Tag Manager', 'cookie-control'); ?>" target="_blank"><strong><?php _e('here.', 'cookie-control'); ?></strong> </a></p>
                                                            <p><?php _e('Callback function that will fire on user\'s opting into this cookie category.  For example:', 'cookie-control'); ?> </p>
                                                            <pre style="font-size: 10px;">
    gtag('consent', 'update', {'analytics_storage': 'granted'});
                    </pre>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" colspan="2">
                                                            <label for="cookiecontrol_settings[optionalCookiesonRevoke[<?php echo $key ?>]"><?php _e('On revoke callback function', 'cookie-control'); ?></label>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <textarea name="cookiecontrol_settings[optionalCookiesonRevoke][<?php echo $key ?>]" id="cookiecontrol_settings[optionalCookiesonRevoke][<?php echo $key ?>]" cols="60" rows="10"><?php echo esc_html(stripslashes($ccc_options['optionalCookiesonRevoke'][$key])); ?></textarea>
                                                        </td>
                                                        <td>
                                                            <p><?php _e('Callback function that will fire on user\'s opting out of this cookie category.For example:', 'cookie-control'); ?> </p>
                                                            <pre style="font-size: 10px;">gtag('consent', 'update', {'analytics_storage': 'denied'});</pre>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            <label for="cookiecontrol_settings[optionalCookiesinitialConsentState][<?php echo $key ?>]"><?php _e('Recommended Consent State', 'cookie-control'); ?></label>
                                                            <p><?php _e('Defines whether or not this category should be accepted (opted in) as part of the user granting consent to the site\'s recommended settings. If set to "on", cookies will be allowed by default for this category.', 'cookie-control'); ?></p>
                                                        </th>
                                                        <td>
                                                            <input type="radio" class="first" name="cookiecontrol_settings[optionalCookiesinitialConsentState][<?php echo $key ?>]" id="cookiecontrol_settings[optionalCookiesinitialConsentState][<?php echo $key ?>]" value="off" <?php checked('off', $ccc_options['optionalCookiesinitialConsentState'][$key]); ?> />
                                                            <?php _e('Off', 'cookie-control'); ?>
                                                            <input type="radio" name="cookiecontrol_settings[optionalCookiesinitialConsentState][<?php echo $key ?>]" id="cookiecontrol_settings[optionalCookiesinitialConsentState][<?php echo $key ?>]" value="on" <?php checked('on', $ccc_options['optionalCookiesinitialConsentState'][$key]); ?> />
                                                            <?php _e('On', 'cookie-control'); ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            <label for="cookiecontrol_settings[optionalCookieslawfulBasis]"><?php _e('Lawful basis', 'cookie-control'); ?></label>
                                                            <p><?php _e('Defines whether this category requires explicit user consent, or if the category can be toggled on prior to any user interaction and justified under the more flexible lawful basis for processing: legitimate interest.', 'cookie-control'); ?></p>
                                                            <p><?php _e('Possible values are either consent or legitimate interest. If the latter, the UI will show the category toggled \'on\', though no record of consent will exist.', 'cookie-control'); ?></p>
                                                            <p><?php _e('If you choose to rely on legitimate interest, you are taking on extra responsibility for considering and protecting people’s rights and interests; and must include details of your legitimate interests in your privacy statement.', 'cookie-control'); ?></p>
                                                        </th>
                                                        <td>
                                                            <input type="radio" class="first" name="cookiecontrol_settings[optionalCookieslawfulBasis][<?php echo $key ?>]" id="cookiecontrol_settings[optionalCookieslawfulBasis][<?php echo $key ?>]" value="consent" <?php if ($ccc_options['optionalCookieslawfulBasis'][$key]) ?><?php checked('consent', $ccc_options['optionalCookieslawfulBasis'][$key]); ?> />
                                                            <?php _e('Consent ', 'cookie-control'); ?>
                                                            <input type="radio" name="cookiecontrol_settings[optionalCookieslawfulBasis][<?php echo $key ?>]" id="cookiecontrol_settings[optionalCookieslawfulBasis][<?php echo $key ?>]" value="legitimate interest" <?php checked('legitimate interest', $ccc_options['optionalCookieslawfulBasis'][$key]); ?> />
                                                            <?php _e('Legitimate interest', 'cookie-control'); ?>
                                                        </td>
                                                    </tr>
                                                    <tr class="optionalInfoCookiesVendors">
                                                        <th scope="row">
                                                            <label for="cookiecontrol_settings[optionalCookiesthirdPartyCookies]"><?php _e('Vendors', 'cookie-control'); ?></label>
                                                            <p><?php _e('You can use this if you want to explicitly display the vendors that place the cookies that you use. This is particularly useful if you are targeting users in Brazil and want to comply with LGPD.', 'cookie-control'); ?></p>
                                                        </th>
                                                        <td>
                                                            <div class="categoryVendor categoryVendor-down categoryVendorVal data-number data-number-pre">
                                                                <input type="text" name="cookiecontrol_settings[optionalCookiesVendorName][<?php echo $key ?>]" placeholder="eg. Name" id="cookiecontrol_settings[optionalCookiesVendorName][<?php echo $key ?>]" value='<?php echo isset($ccc_options['optionalCookiesVendorName'][$key]) ?   stripslashes($ccc_options['optionalCookiesVendorName'][$key]) : ""; ?>' size="50" />
                                                                <br>
                                                                <br>
                                                                <input type="text" name="cookiecontrol_settings[optionalCookiesVendorDescription][<?php echo $key ?>]" placeholder="eg. Description" id="cookiecontrol_settings[optionalCookiesVendorDescription][<?php echo $key ?>]" value='<?php echo isset($ccc_options['optionalCookiesVendorDescription'][$key]) ?   stripslashes($ccc_options['optionalCookiesVendorDescription'][$key]) : ""; ?>' size="50" />
                                                                <br>
                                                                <br>
                                                                <input type="text" name="cookiecontrol_settings[optionalCookiesVendorUrl][<?php echo $key ?>]" placeholder="eg. Url" id="cookiecontrol_settings[optionalCookiesVendorUrl][<?php echo $key ?>]" value='<?php echo isset($ccc_options['optionalCookiesVendorUrl'][$key]) ?   esc_url(stripslashes($ccc_options['optionalCookiesVendorUrl'][$key])) : ""; ?>' size="50" />
                                                                <br>
                                                                <br>
                                                                <label for="cookiecontrol_settings[optionalCookiesVendorThirdPartyCookies]"><?php _e('Third party cookies', 'cookie-control'); ?></label>

                                                                <input type="radio" class="first" name="cookiecontrol_settings[optionalCookiesVendorThirdPartyCookies][<?php echo $key ?>]" id="cookiecontrol_settings[optionalCookiesVendorThirdPartyCookies][<?php echo $key ?>]" value="true" <?php if (isset($ccc_options['optionalCookiesVendorThirdPartyCookies'][$key])) :  checked('true', $ccc_options['optionalCookiesVendorThirdPartyCookies'][$key]);
                                                                                                                                                                                                                                                                                                    endif; ?> />
                                                                <?php _e('Yes ', 'cookie-control'); ?>
                                                                <input type="radio" name="cookiecontrol_settings[optionalCookiesVendorThirdPartyCookies][<?php echo $key ?>]" id="cookiecontrol_settings[optionalCookiesVendorThirdPartyCookies][<?php echo $key ?>]" value="false" <?php if (isset($ccc_options['optionalCookiesVendorThirdPartyCookies'][$key])) : checked('false', $ccc_options['optionalCookiesVendorThirdPartyCookies'][$key]);
                                                                                                                                                                                                                                                                                    else : ?> checked <?php endif; ?> />
                                                                <?php _e('No', 'cookie-control'); ?>
                                                                <br>
                                                            </div>
                                                            <?php if (isset($ccc_options['optionalCookiesVendorName' . $key])) {

                                                                foreach ($ccc_options['optionalCookiesVendorName' . $key] as $key2 => $val2) {
                                                            ?>

                                                                    <div class="categoryVendor categoryVendor-down categoryVendorVal data-number data-number-pre" data-number="<?php echo $key ?>">
                                                                        <input type="text" name="cookiecontrol_settings[optionalCookiesVendorName<?php echo $key ?>][<?php echo $key2 ?>]" placeholder="eg. Name" id="cookiecontrol_settings[optionalCookiesVendorName<?php echo $key ?>][<?php echo $key2 ?>]" value='<?php echo isset($ccc_options['optionalCookiesVendorName' . $key][$key2]) ?   stripslashes($ccc_options['optionalCookiesVendorName' . $key][$key2]) : ""; ?>' size="50" />
                                                                        <br>
                                                                        <br>
                                                                        <input type="text" name="cookiecontrol_settings[optionalCookiesVendorDescription<?php echo $key ?>][<?php echo $key2 ?>]" placeholder="eg. Description" id="cookiecontrol_settings[optionalCookiesVendorDescription<?php echo $key ?>][<?php echo $key2 ?>]" value='<?php echo isset($ccc_options['optionalCookiesVendorDescription' . $key][$key2]) ?   stripslashes($ccc_options['optionalCookiesVendorDescription' . $key][$key2]) : ""; ?>' size="50" />
                                                                        <br>
                                                                        <br>
                                                                        <input type="text" name="cookiecontrol_settings[optionalCookiesVendorUrl<?php echo $key ?>][<?php echo $key2 ?>]" placeholder="eg. Url" id="cookiecontrol_settings[optionalCookiesVendorUrl<?php echo $key ?>][<?php echo $key2 ?>]" value='<?php echo isset($ccc_options['optionalCookiesVendorUrl' . $key][$key2]) ?   esc_url(stripslashes($ccc_options['optionalCookiesVendorUrl' . $key][$key2])) : ""; ?>' size="50" />
                                                                        <br>
                                                                        <br>
                                                                        <label for="cookiecontrol_settings[optionalCookiesVendorThirdPartyCookies<?php echo $key ?>]"><?php _e('Third party cookies', 'cookie-control'); ?></label>

                                                                        <input type="radio" class="first" name="cookiecontrol_settings[optionalCookiesVendorThirdPartyCookies<?php echo $key ?>][<?php echo $key2 ?>]" id="cookiecontrol_settings[optionalCookiesVendorThirdPartyCookies<?php echo $key ?>][<?php echo $key2 ?>]" value="true" <?php if (isset($ccc_options['optionalCookiesVendorThirdPartyCookies' . $key][$key2])) :  checked('true', $ccc_options['optionalCookiesVendorThirdPartyCookies' . $key][$key2]);
                                                                                                                                                                                                                                                                                                                                                endif; ?> />
                                                                        <?php _e('Yes ', 'cookie-control'); ?>
                                                                        <input type="radio" name="cookiecontrol_settings[optionalCookiesVendorThirdPartyCookies<?php echo $key ?>][<?php echo $key2 ?>]" id="cookiecontrol_settings[optionalCookiesVendorThirdPartyCookies<?php echo $key ?>][<?php echo $key2 ?>]" value="false" <?php if (isset($ccc_options['optionalCookiesVendorThirdPartyCookies' . $key][$key2])) : checked('false', $ccc_options['optionalCookiesVendorThirdPartyCookies' . $key][$key2]);
                                                                                                                                                                                                                                                                                                                                    else : ?> checked <?php endif; ?> />
                                                                        <?php _e('No', 'cookie-control'); ?>
                                                                        <br>
                                                                        <a href="#" class="remove-category-vendor">
                                                                            <div class="dashicons dashicons-dismiss"><span class="screen-reader-text"><?php _e('Remove', 'cookie-control'); ?></span></div><?php _e('Remove Vendor', 'cookie-control'); ?>
                                                                        </a>

                                                                    </div>
                                                            <?php }
                                                            }
                                                            ?>
                                                            <a href="#" class="more-category-vendors civic"><?php _e('Add Vendor', 'cookie-control') ?></a>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <hr>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <div id="last-used-key-optionalCookies" data-keyid="<?php echo $key ?>"></div>
                            <?php else : ?>
                                <div id="last-used-key-optionalCookies" data-keyid="0"></div>
                            <?php endif; ?>
                        </div>

                        <button class="addRow civic" data-class="optionalCookies"><i class="icon-plus-sign icon-white"></i><?php _e('Add Cookie Category', 'cookie-control'); ?></button></br>

                        <div class="warning">
                            <div class="dashicons dashicons-warning"><span class="screen-reader-text"><?php _e('warning', 'cookie-control'); ?></span></div>
                            <?php _e('We recommend that you add any plugins that may set third party cookies to the appropriate category\'s onAccept function, so that they only run after a user has given their consent. Similarly, the onRevoke function could be used to stop the plugin; though this would be dependent on the plugin offering such methods. How to do this specifically will depend on the plugin itself.', 'cookie-control'); ?>
                        </div>
                    </div>


                    <div id="necessary">
                        <h2><?php _e('Necessary Cookies', 'cookie-control'); ?></h2>
                        <p><?php _e('This is a list of cookies that are necessary for your website\'s functionality, and you don\'t want to be deleted by Cookie Control. In most cases you won\'t have to set this option. Such cookies should be marked as Secure and HttpOnly and hence Cookie Control won\'t be able to delete them anyway.', 'cookie-control'); ?></p>
                        <p><?php _e('Note - it is possible to use the * wildcard at the end of a cookie name, if you want all cookies that start with this prefix to be protected.', 'cookie-control'); ?></p>


                        <div class="necessaryCookiesTemplate">
                            <table class="form-table">
                                <tr>
                                    <th scope="row">
                                        <label for="cookiecontrol_settings[necessaryCookies]"><?php _e('Necessary Cookie', 'cookie-control'); ?></label>
                                    </th>
                                    <td>
                                        <input placeholder="eg. Cookie name ex. JSESSIONID" type="text" name="cookiecontrol_settings[necessaryCookies]" id="cookiecontrol_settings[necessaryCookies]" size="30" />
                                        <a href="#" class="remove removeRow" data-class="necessaryCookies" id="removenecessaryCookies">
                                            <div class="dashicons dashicons-dismiss"><span class="screen-reader-text"><?php _e('Remove', 'cookie-control'); ?></span></div>
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div id="necessaryCookiesContainer">
                            <?php
                            if (!empty($ccc_options['necessaryCookies'])) :
                                foreach ($ccc_options['necessaryCookies'] as $key => $val) :  ?>
                                    <?php if (trim($val) != '') : ?>
                                        <div class="necessaryCookies">
                                            <table class="form-table">
                                                <tr>
                                                    <th scope="row">
                                                        <label for="cookiecontrol_settings[necessaryCookies][<?php echo $key ?>]"><?php _e('Necessary Cookie', 'cookie-control'); ?></label>
                                                    </th>
                                                    <td>
                                                        <input type="text" name="cookiecontrol_settings[necessaryCookies][<?php echo $key ?>]" id="cookiecontrol_settings[necessaryCookies][<?php echo $key ?>]" value="<?php echo stripslashes($val); ?>" size="30" />
                                                        <a href="#" class="remove removeRow" data-class="necessaryCookies" id="removenecessaryCookies">
                                                            <div class="dashicons dashicons-dismiss"><span class="screen-reader-text"><?php _e('Remove', 'cookie-control'); ?></span></div>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <div id="last-used-key-necessaryCookies" data-keyid="<?php echo $key ?>"></div>
                            <?php else : ?>
                                <div id="last-used-key-necessaryCookies" data-keyid="0"></div>
                            <?php endif; ?>
                        </div>
                        <button class="addRow civic" data-class="necessaryCookies"><i class="icon-plus-sign icon-white"></i><?php _e('Add Necessary Cookie', 'cookie-control'); ?></button></br>

                        <div class="warning">
                            <div class="dashicons dashicons-warning"><span class="screen-reader-text"><?php _e('warning', 'cookie-control'); ?></span></div>
                            <?php _e('Be careful not to overuse this option, as this might end in you protecting cookies that store personal identifying information, hence defeating the purpose of using Cookie Control.', 'cookie-control'); ?>
                        </div>
                    </div>

                    <div id="appearance">
                        <h2><?php _e('Customising Appearance, Text And Behaviour', 'cookie-control'); ?></h2>
                        <p><?php _e('Cookie Control will load with its own preset styling and text configuration. You can customize your widget initial state, position, theme and text with the following options.', 'cookie-control'); ?></p>

                        <table class="form-table">
                            <tr class="description">
                                <td colspan="2">
                                    <div class="warning">
                                        <div class="dashicons dashicons-warning"><span class="screen-reader-text"><?php _e('warning', 'cookie-control'); ?></span></div>
                                        <?php printf(__('GOVUK consent banner is displayed the first time a service is used and persists on every page of the service until the user selects an option and updates their settings.
After the user accepts or rejects the use of cookies a confirmation message is displayed until they select “hide” or navigate away from the page.
Read more about this pattern here %s https://design-system.dwp.gov.uk/patterns/consent-to-cookies %s. The shortcode [ccc_gov_uk_block] builds a form with all cookie categories configured so that users can change their consent. You can add the parameter layout="single" to display all categories in one form ex. [ccc_gov_uk_block layout="single"] ', 'cookie-control'), '<a target="_blank" href="https://design-system.dwp.gov.uk/patterns/consent-to-cookies">', '</a>'); ?>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[initialState]"><?php _e('Initial State', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="radio" class="first cookiecontrol_settings_govuk_v9" name="cookiecontrol_settings[initialState]" id="cookiecontrol_settings[initialState]" value="CLOSED" <?php checked('CLOSE', $ccc_options['initialState']); ?> <?php checked('CLOSED', $ccc_options['initialState']); ?> />
                                    <?php _e('Closed', 'cookie-control'); ?>
                                    <input type="radio" name="cookiecontrol_settings[initialState]" id="cookiecontrol_settings[initialState]" class="cookiecontrol_settings_govuk_v9" value="OPEN" <?php checked('OPEN', $ccc_options['initialState']); ?> />
                                    <?php _e('Open', 'cookie-control'); ?>
                                    <span class="hide-com <?php echo $hidden_content_product; ?>"><input type="radio" name="cookiecontrol_settings[initialState]" class="cookiecontrol_settings_govuk_v9" id="cookiecontrol_settings[initialState]" value="NOTIFY" <?php checked('NOTIFY', $ccc_options['initialState']); ?> />
                                        <?php _e('Notify (pro license)', 'cookie-control'); ?></span>
                                    <span class="hide-com <?php echo $hidden_content_product; ?>"><input type="radio" name="cookiecontrol_settings[initialState]" class="cookiecontrol_settings_govuk_v9" id="cookiecontrol_settings[initialState]" value="TOP" <?php checked('TOP', $ccc_options['initialState']); ?> />
                                        <?php _e('Top (pro license)', 'cookie-control'); ?></span>
                                    <span class="hide-com <?php echo $hidden_content_product; ?>"><input type="radio" name="cookiecontrol_settings[initialState]" class="cookiecontrol_settings_govuk_v9" id="cookiecontrol_settings[initialState]" value="BOX" <?php checked('BOX', $ccc_options['initialState']); ?> />
                                        <?php _e('Box (pro license)', 'cookie-control'); ?></span>
                                    <span><input type="radio" name="cookiecontrol_settings[initialState]" class="cookiecontrol_settings_govuk_v9" id="cookiecontrol_settings[initialState]" value="GOVUK" <?php checked('GOVUK', $ccc_options['initialState']); ?> />
                                        <?php _e('GOVUK consent', 'cookie-control'); ?></span>
                                </td>
                            </tr>

                            <tr class="govuk-hide-element <?php echo $hide_govuk_content; ?>">
                                <th scope="row">
                                    <label for="cookiecontrol_settings[position]"><?php _e('Widget Position', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="radio" class="first" name="cookiecontrol_settings[position]" id="cookiecontrol_settings[position]" value="RIGHT" <?php checked('RIGHT', $ccc_options['position']); ?> />
                                    <?php _e('Right', 'cookie-control'); ?>
                                    <input type="radio" name="cookiecontrol_settings[position]" id="cookiecontrol_settings[position]" value="LEFT" <?php checked('LEFT', $ccc_options['position']); ?> />
                                    <?php _e('Left', 'cookie-control'); ?>
                                </td>
                            </tr>
                            <tr class="govuk-hide-element <?php echo $hide_govuk_content; ?>">
                                <th scope="row">
                                    <label for="cookiecontrol_settings[theme]"><?php _e('Widget Theme', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="radio" class="first" name="cookiecontrol_settings[theme]" id="cookiecontrol_settings[theme]" value="DARK" <?php checked('DARK', $ccc_options['theme']); ?> />
                                    <?php _e('Dark', 'cookie-control'); ?>
                                    <input type="radio" name="cookiecontrol_settings[theme]" id="cookiecontrol_settings[theme]" value="LIGHT" <?php checked('LIGHT', $ccc_options['theme']); ?> />
                                    <?php _e('Light', 'cookie-control'); ?>
                                </td>
                            </tr>
                            <tr class="govuk-hide-element <?php echo $hide_govuk_content; ?>">
                                <th scope="row">
                                    <label for="cookiecontrol_settings[layout]"><?php _e('Layout', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="radio" class="first" name="cookiecontrol_settings[layout]" id="cookiecontrol_settings[layout]" value="SLIDEOUT" <?php checked('SLIDEOUT', $ccc_options['layout']); ?> />
                                    <?php _e('Slideout', 'cookie-control'); ?>
                                    <span class="hide-com <?php echo $hidden_content_product ?>"><input type="radio" name="cookiecontrol_settings[layout]" id="cookiecontrol_settings[layout]" value="POPUP" <?php checked('POPUP', $ccc_options['layout']); ?> />
                                        <?php _e('Popup (pro license)', 'cookie-control'); ?></span>
                                </td>
                            </tr>
                            <tr class="govuk-hide-element <?php echo $hide_govuk_content; ?>">
                                <th scope="row">
                                    <label for="cookiecontrol_settings[notifyOnce]"><?php _e('Notify once', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="radio" class="first" name="cookiecontrol_settings[notifyOnce]" value="false" <?php checked('false', (isset($ccc_options['notifyOnce']) ? $ccc_options['notifyOnce'] : '')); ?> /><?php _e('No', 'cookie-control'); ?>
                                    <input type="radio" name="cookiecontrol_settings[notifyOnce]" value="true" <?php checked('true', (isset($ccc_options['notifyOnce']) ? $ccc_options['notifyOnce'] : '')); ?> /><?php _e('Yes', 'cookie-control'); ?>
                                </td>
                            </tr>
                            <tr class="description govuk-hide-element <?php echo $hide_govuk_content; ?>">
                                <td colspan="2">
                                    <p> <?php _e('Determines whether the module only shows its initialState once, or if it continues to replay on subsequent page loads until the user has directly interacted with it - by either toggling on / off a category, accepting the recommended settings, or dismissing the module.', 'cookie-control'); ?> </p>
                                </td>
                            </tr>
                            <tr class="govuk-hide-element <?php echo $hide_govuk_content; ?>">
                                <th scope="row">
                                    <label for="cookiecontrol_settings[toggleType]"><?php _e('Toggle type', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="radio" class="first" name="cookiecontrol_settings[toggleType]" value="slider" <?php checked('slider', (isset($ccc_options['toggleType']) ? $ccc_options['toggleType'] : '')); ?> />
                                    <?php _e('Slider', 'cookie-control'); ?>
                                    <input type="radio" name="cookiecontrol_settings[toggleType]" value="checkbox" <?php checked('checkbox', (isset($ccc_options['toggleType']) ? $ccc_options['toggleType'] : '')); ?> />
                                    <?php _e('Checkbox', 'cookie-control'); ?>
                                </td>
                            </tr>
                            <tr class="description govuk-hide-element <?php echo $hide_govuk_content; ?>">
                                <td colspan="2">
                                    <p><?php printf(__('Determines the control toggle for each item within %s optionalCookies %s', 'cookie-control'), '<em>', '</em>'); ?></p>
                                </td>
                            </tr>
                            <tr class="govuk-hide-element <?php echo $hide_govuk_content; ?>">
                                <th scope="row">
                                    <label for="cookiecontrol_settings[acceptBehaviour]"><?php _e('Accept Behaviour', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="radio" class="first" name="cookiecontrol_settings[acceptBehaviour]" value="all" <?php checked('all', (isset($ccc_options['acceptBehaviour']) ? $ccc_options['acceptBehaviour'] : '')); ?> />
                                    <?php _e('All', 'cookie-control'); ?>
                                    <input type="radio" name="cookiecontrol_settings[acceptBehaviour]" value="recommended" <?php checked('recommended', (isset($ccc_options['acceptBehaviour']) ? $ccc_options['acceptBehaviour'] : '')); ?> />
                                    <?php _e('Recommended', 'cookie-control'); ?>
                                </td>
                            </tr>
                            <tr class="description govuk-hide-element <?php echo $hide_govuk_content; ?>">
                                <td colspan="2">
                                    <p> <?php _e('This property is used to control what will happen when the user clicks on either of the \'Accept\' or \'Accept recommended settings\' buttons. By default all cookie purposes will be accepted.', 'cookie-control'); ?> </p>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[closeOnGlobalChange]"><?php _e('Close on global change', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="radio" class="first" name="cookiecontrol_settings[closeOnGlobalChange]" value="true" <?php checked('true', (isset($ccc_options['closeOnGlobalChange']) ? $ccc_options['closeOnGlobalChange'] : '')); ?> />
                                    <?php _e('True', 'cookie-control'); ?>
                                    <input type="radio" name="cookiecontrol_settings[closeOnGlobalChange]" value="false" <?php checked('false', (isset($ccc_options['closeOnGlobalChange']) ? $ccc_options['closeOnGlobalChange'] : '')); ?> />
                                    <?php _e('False', 'cookie-control'); ?>
                                </td>
                            </tr>
                            <tr class="description govuk-hide-element <?php echo $hide_govuk_content; ?>">
                                <td colspan="2">
                                    <p> <?php _e('If set to false the Cookie Control main window will remain open when the user clicks on either of the accept or reject buttons, and the user will have to explicitly close it using the X close icon at the top right, or the close button.', 'cookie-control'); ?> </p>
                                </td>
                            </tr>
                            <tr class="govuk-hide-element <?php echo $hide_govuk_content; ?>">
                                <th scope="row">
                                    <label for="cookiecontrol_settings[closeStyle]"><?php _e('Close style', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="radio" class="first" name="cookiecontrol_settings[closeStyle]" value="icon" <?php checked('icon', (isset($ccc_options['closeStyle']) ? $ccc_options['closeStyle'] : '')); ?> />
                                    <?php _e('Icon', 'cookie-control'); ?>
                                    <input type="radio" name="cookiecontrol_settings[closeStyle]" value="labelled" <?php checked('labelled', (isset($ccc_options['closeStyle']) ? $ccc_options['closeStyle'] : '')); ?> />
                                    <?php _e('Labelled', 'cookie-control'); ?>
                                    <input type="radio" name="cookiecontrol_settings[closeStyle]" value="button" <?php checked('button', (isset($ccc_options['closeStyle']) ? $ccc_options['closeStyle'] : '')); ?> />
                                    <?php _e('Button', 'cookie-control'); ?>
                                </td>
                            </tr>
                            <tr class="description govuk-hide-element <?php echo $hide_govuk_content; ?>">
                                <td colspan="2">
                                    <p><?php _e('Determines the closing behaviour of the module.', 'cookie-control'); ?></p>
                                    <p></p>
                                </td>
                            </tr>
                            <tr class="govuk-hide-element <?php echo $hide_govuk_content; ?>">
                                <th scope="row">
                                    <label for="cookiecontrol_settings[settingsStyle]"><?php _e('Button Notification bar', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="radio" class="first" name="cookiecontrol_settings[settingsStyle]" id="cookiecontrol_settings[settingsStyle]" value="button" <?php if (isset($ccc_options['settingsStyle'])) : checked('button', $ccc_options['settingsStyle']);
                                                                                                                                                                                else : ?> checked <?php endif; ?> /><?php _e('Button', 'cookie-control'); ?>
                                    <input type="radio" name="cookiecontrol_settings[settingsStyle]" id="cookiecontrol_settings[settingsStyle]" value="link" <?php if (isset($ccc_options['settingsStyle'])) :  checked('link', $ccc_options['settingsStyle']);
                                                                                                                                                                endif; ?> /><?php _e('Link', 'cookie-control'); ?>
                                </td>
                            </tr>
                            <tr class="description govuk-hide-element <?php echo $hide_govuk_content; ?>">
                                <td colspan="2">
                                    <p><?php _e('Determines the appearance of the settings button on the notification bar.', 'cookie-control'); ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[expiry]"><?php _e('Consent cookie expiration(days)', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="number" name="cookiecontrol_settings[expiry]" id="cookiecontrol_settings[expiry]" value="<?php echo !empty($ccc_options['expiry']) ?  esc_html(stripslashes($ccc_options['expiry'])) : '0'; ?>" size="8" />
                                </td>
                            </tr>
                            <tr class="description">
                                <td colspan="2">
                                    <p><?php _e('Controls how many days the consent of the user will be remembered for. Defaults to 90 days. This setting will apply globally to all categories.', 'cookie-control'); ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[sameSiteCookie]"><?php _e('Same Site Cookie', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="radio" class="first" name="cookiecontrol_settings[sameSiteCookie]" id="cookiecontrol_settings[sameSiteCookie]" value="true" <?php if (isset($ccc_options['sameSiteCookie'])) : checked('true', $ccc_options['sameSiteCookie']);
                                                                                                                                                                                else : ?> checked <?php endif; ?> /><?php _e('True', 'cookie-control'); ?>
                                    <input type="radio" name="cookiecontrol_settings[sameSiteCookie]" id="cookiecontrol_settings[sameSiteCookie]" value="false" <?php if (isset($ccc_options['sameSiteCookie'])) :  checked('false', $ccc_options['sameSiteCookie']);
                                                                                                                                                                endif; ?> /><?php _e('False', 'cookie-control'); ?>
                                </td>
                            </tr>
                            <tr class="description">
                                <td colspan="2">
                                    <p><?php _e('If set to true the CookieControl cookie will be marked with the SameSite:Secure flag. Otherwise it will be flagged with SameSite:None, which however will mean that in some browsers Cookie Control will not work unless your site is served over HTTPS.', 'cookie-control'); ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[sameSiteValue]"><?php _e('Same Site Value', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="radio" class="first" name="cookiecontrol_settings[sameSiteValue]" value="Strict" <?php if (isset($ccc_options['sameSiteValue'])) : checked('Strict', $ccc_options['sameSiteValue']);
                                                                                                                                    else : ?> checked <?php endif; ?> />
                                    <?php _e('Strict', 'cookie-control'); ?>
                                    <input type="radio" name="cookiecontrol_settings[sameSiteValue]" value="Lax" <?php checked('Lax', (isset($ccc_options['sameSiteValue']) ? $ccc_options['sameSiteValue'] : '')); ?> />
                                    <?php _e('Lax', 'cookie-control'); ?>
                                    <input type="radio" name="cookiecontrol_settings[sameSiteValue]" value="None" <?php checked('None', (isset($ccc_options['sameSiteValue']) ? $ccc_options['sameSiteValue'] : '')); ?> />
                                    <?php _e('None', 'cookie-control'); ?>
                                </td>
                            </tr>
                            <tr class="description">
                                <td colspan="2">
                                    <p><?php _e('Used in conjuction with the sameSiteCookie property, it controls the value of the SameSite flag for the CookieControl cookie. It can be one of "Strict", "Lax" or "None".', 'cookie-control'); ?></p>
                                </td>
                            </tr>
                            <tr class="govuk-hide-element <?php echo $hide_govuk_content; ?>">
                                <th scope="row">
                                    <label for="cookiecontrol_settings[notifyDismissButton]"><?php _e('Notify Dismiss Button', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="radio" class="first" name="cookiecontrol_settings[notifyDismissButton]" id="cookiecontrol_settings[notifyDismissButton]" value="true" <?php if (isset($ccc_options['notifyDismissButton'])) : checked('true', $ccc_options['notifyDismissButton']);
                                                                                                                                                                                        else : ?> checked <?php endif; ?> /><?php _e('True', 'cookie-control'); ?>
                                    <input type="radio" name="cookiecontrol_settings[notifyDismissButton]" id="cookiecontrol_settings[notifyDismissButton]" value="false" <?php if (isset($ccc_options['notifyDismissButton'])) :  checked('false', $ccc_options['notifyDismissButton']);
                                                                                                                                                                            endif; ?> /><?php _e('False', 'cookie-control'); ?>
                                </td>
                            </tr>
                            <tr class="description govuk-hide-element <?php echo $hide_govuk_content; ?>">
                                <td colspan="2">
                                    <p><?php _e('Set this to false if you are using the notify interface and do not wish to show the (X) close icon on it.', 'cookie-control'); ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" colspan="2">
                                    <label for="cookiecontrol_settings[onLoad]"><?php _e('On Load callback function', 'cookie-control'); ?></label>
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <textarea name="cookiecontrol_settings[onLoad]" id="cookiecontrol_settings[onLoad]" cols="60" rows="10"><?php echo (isset($ccc_options['onLoad']) ? esc_html(stripslashes($ccc_options['onLoad'])) : ''); ?></textarea>
                                </td>
                                <td>
                                    <p><?php _e('Defines a function to be triggered after the module initiates the defined configuration.', 'cookie-control'); ?></p>
                                </td>
                            </tr>
                        </table>

                        <div class="warning">
                            <div class="dashicons dashicons-warning"><span class="screen-reader-text"><?php _e('warning', 'cookie-control'); ?></span></div>
                            <?php _e('Please note, we do not store information of any kind until the user opts into one of your cookie categories. If this never happens and initialState is set to open, the module will re-appear on each subsequent page load.', 'cookie-control'); ?>
                        </div>

                        <hr />

                        <table class="form-table">
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[titleText]"><?php _e('Title', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[titleText]" id="cookiecontrol_settings[titleText]" value="<?php echo !empty($ccc_options['titleText']) ?  esc_html(stripslashes($ccc_options['titleText'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['titleText'])); ?>" size="50" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[introText]"><?php _e('Introductory Text', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <?php wp_editor(stripslashes($ccc_options['introText']), 'cookiecontrol_settings_introText', $settings = array('media_buttons' => false, 'textarea_name' => 'cookiecontrol_settings[introText]', 'tinymce' => false, 'quicktags' => array("buttons" => "strong,em,ul,ol,li,link")));  ?>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <h3> <?php _e('GDPR Statement', 'cookie-control'); ?>
                                    </h3>
                                </th>
                                <td>
                                    <div class="warning">
                                        <div class="dashicons dashicons-warning"><span class="screen-reader-text"><?php _e('warning', 'cookie-control'); ?></span></div>
                                        <?php _e('Please always set a valid update date when providing a GDPR statement. The GDPR statement will not be displayed if the privacy or cookie policy url, privacy or cookie policy url name and privacy or cookie policy update date is not provided.', 'cookie-control'); ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[privacyURL]"><?php _e('Privacy or cookie policy url', 'cookie-control'); ?></label>
                                    <p><?php _e('Use an absolute url', 'cookie-control'); ?></p>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[privacyURL]" id="cookiecontrol_settings[privacyURL]" value="<?php echo esc_url(stripslashes($ccc_options['privacyURL'])); ?>" size="50" placeholder="eg. http://www.yoursitename.com/privacy-policy" />
                                    <p class="ccc-hdden govuk-show-element <?php echo $show_govuk_content;  ?>"><strong> <?php _e('Use for GOVUK banner view cookies url', 'cookie-control'); ?></strong></p>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[privacyDescription]"><?php _e('Privacy or cookie policy intro text', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[privacyDescription]" id="cookiecontrol_settings[privacyDescription]" value="<?php echo  isset($ccc_options['privacyDescription']) ? esc_html(stripslashes($ccc_options['privacyDescription'])) : ''; ?>" size="50" placeholder="eg. For more detailed information, please check our" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[privacyName]"><?php _e('Privacy or cookie policy url name', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[privacyName]" id="cookiecontrol_settings[privacyName]" value="<?php echo isset($ccc_options['privacyName']) ? esc_html(stripslashes($ccc_options['privacyName'])) : '';   ?>" size="50" placeholder="eg. Cookie and Privacy Statement" />
                                    <p class="ccc-hdden govuk-show-element <?php echo $show_govuk_content;  ?>"><strong> <?php _e('Use for GOVUK banner Cookies url text', 'cookie-control'); ?></strong></p>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[privacyUpdateDate]"><?php _e('Privacy or cookie policy update date', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" class="ccc-datepicker" name="cookiecontrol_settings[privacyUpdateDate]" id="cookiecontrol_settings[privacyUpdateDate]" value="<?php echo  isset($ccc_options['privacyUpdateDate']) ? esc_attr(stripslashes($ccc_options['privacyUpdateDate'])) : '';   ?>" size="50" placeholder="eg. dd/mm/YYYY" />
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <h3 class="govuk-hide-element <?php echo $hide_govuk_content; ?>"><?php _e('CCPA Statement', 'cookie-control'); ?></h3>
                                </th>
                                <td>
                                    <div class="warning govuk-hide-element <?php echo $hide_govuk_content; ?>">
                                        <div class="dashicons dashicons-warning"><span class="screen-reader-text"><?php _e('warning', 'cookie-control'); ?></span></div>
                                        <?php _e('Please always set a valid update date when providing a CCPA statement. The CCPA statement will not be displayed if the CCPA Privacy url, CCPA privacy policy url name  and CCPA privacy update date is not provided.', 'cookie-control'); ?>
                                    </div>
                                </td>
                            </tr>
                            <tr class="govuk-hide-element <?php echo $hide_govuk_content; ?>">
                                <th scope="row">
                                    <label for="cookiecontrol_settings[ccpaPrivacyURL]"><?php _e('CCPA Privacy url', 'cookie-control'); ?></label>
                                    <p><?php _e('Use an absolute url'); ?></p>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[ccpaPrivacyURL]" id="cookiecontrol_settings[ccpaPrivacyURL]" value="<?php echo esc_url(stripslashes($ccc_options['ccpaPrivacyURL'])); ?>" size="50" placeholder="eg. http://www.yoursitename.com/privacy-policy" />
                                </td>
                            </tr>
                            <tr class="govuk-hide-element <?php echo $hide_govuk_content; ?>">
                                <th scope="row">
                                    <label for="cookiecontrol_settings[ccpaPrivacyDescription]"><?php _e('CCPA privacy policy intro text', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[ccpaPrivacyDescription]" id="cookiecontrol_settings[ccpaPrivacyDescription]" value="<?php echo  isset($ccc_options['ccpaPrivacyDescription']) ? esc_html(stripslashes($ccc_options['ccpaPrivacyDescription'])) : ''; ?>" size="50" placeholder="eg. For more detailed information, please check our" />
                                </td>
                            </tr>
                            <tr class="govuk-hide-element <?php echo $hide_govuk_content; ?>">
                                <th scope="row">
                                    <label for="cookiecontrol_settings[ccpaPrivacyName]"><?php _e('CCPA privacy policy url name', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[ccpaPrivacyName]" id="cookiecontrol_settings[ccpaPrivacyName]" value="<?php echo isset($ccc_options['ccpaPrivacyName']) ? esc_html(stripslashes($ccc_options['ccpaPrivacyName'])) : '';   ?>" size="50" placeholder="eg. Cookie and Privacy Statement" />
                                </td>
                            </tr>
                            <tr class="govuk-hide-element <?php echo $hide_govuk_content; ?>">
                                <th scope="row">
                                    <label for="cookiecontrol_settings[ccpaPrivacyUpdateDate]"><?php _e('CCPA privacy update date', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" class="ccc-datepicker" name="cookiecontrol_settings[ccpaPrivacyUpdateDate]" id="cookiecontrol_settings[ccpaPrivacyUpdateDate]" value="<?php echo  isset($ccc_options['ccpaPrivacyUpdateDate']) ? esc_attr(stripslashes($ccc_options['ccpaPrivacyUpdateDate'])) : '';   ?>" size="50" placeholder="eg. dd/mm/YYYY" />
                                </td>
                            </tr>
                            <tr class="govuk-hide-element <?php echo $hide_govuk_content; ?>">
                                <th scope="row">
                                    <label for="cookiecontrol_settings[ccpaRejectButton]"><?php _e('CCPA reject button label', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[ccpaRejectButton]" id="cookiecontrol_settings[ccpaRejectButton]" value="<?php echo isset($ccc_options['ccpaRejectButton']) ? esc_html(stripslashes($ccc_options['ccpaRejectButton'])) : '';   ?>" size="50" placeholder="eg. Do Not Sell or Share My Personal Information" />
                                </td>
                            </tr>
                            <tr class="govuk-hide-element <?php echo $hide_govuk_content; ?>">
                                <th scope="row" colspan="2">
                                    <div class="warning">
                                        <div class="dashicons dashicons-warning"><span class="screen-reader-text"><?php _e('warning', 'cookie-control'); ?></span></div>
                                        <?php _e('Please note this link is added at the end of your introductory text.', 'cookie-control'); ?>
                                    </div>
                                </th>
                            </tr>
                            <tr class="govuk-hide-element <?php echo $hide_govuk_content; ?>">
                                <th scope="row">
                                    <label for="cookiecontrol_settings[necessaryTitle]"><?php _e('Necessary cookies title', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[necessaryTitle]" id="cookiecontrol_settings[necessaryTitle]" value="<?php echo !empty($ccc_options['necessaryTitle']) ?  esc_html(stripslashes($ccc_options['necessaryTitle'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['necessaryTitle'])); ?>" size="50" />
                                </td>
                            </tr>
                            <tr class="govuk-hide-element <?php echo $hide_govuk_content; ?>">
                                <th scope="row">
                                    <label for="cookiecontrol_settings[necessaryDescription]"><?php _e('Necessary cookies description', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <?php wp_editor(stripslashes($ccc_options['necessaryDescription']), 'cookiecontrol_settings_necessaryDescription',  $settings = array('media_buttons' => false, 'textarea_name' => 'cookiecontrol_settings[necessaryDescription]', 'tinymce' => false, 'quicktags' => array("buttons" => "strong,em,ul,ol,li,link"))); ?>
                                </td>
                            </tr>
                            <tr class="govuk-hide-element <?php echo $hide_govuk_content; ?>">
                                <th scope="row">
                                    <label for="cookiecontrol_settings[thirdPartyTitle]"><?php _e('Third party cookies title', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[thirdPartyTitle]" id="cookiecontrol_settings[thirdPartyTitle]" value="<?php echo !empty($ccc_options['thirdPartyTitle']) ?  esc_html(stripslashes($ccc_options['thirdPartyTitle'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['thirdPartyTitle']));  ?>" size="50" />
                                </td>
                            </tr>
                            <tr class="govuk-hide-element <?php echo $hide_govuk_content; ?>">
                                <th scope="row">
                                    <label for="cookiecontrol_settings[thirdPartyDescription]"><?php _e('Third party cookies description', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <?php wp_editor(stripslashes($ccc_options['thirdPartyDescription']), 'thirdPartyDescription',  $settings = array('media_buttons' => false, 'textarea_name' => 'cookiecontrol_settings[thirdPartyDescription]', 'tinymce' => false, 'quicktags' => array("buttons" => "strong,em,ul,ol,li,link"))); ?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[onText]"><?php _e('On text', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[onText]" id="cookiecontrol_settings[onText]" value="<?php echo !empty($ccc_options['onText']) ?  esc_html(stripslashes($ccc_options['onText'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['onText'])); ?>" size="50" />
                                    <p class="ccc-hdden govuk-show-element <?php echo $show_govuk_content;  ?>"><strong> <?php _e('Use for GOVUK cookies form on text', 'cookie-control'); ?></strong></p>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[offText]"><?php _e('Off text', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[offText]" id="cookiecontrol_settings[offText]" value="<?php echo !empty($ccc_options['offText']) ?  esc_html(stripslashes($ccc_options['offText'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['offText'])); ?>" size="50" />
                                    <p class="ccc-hdden govuk-show-element <?php echo $show_govuk_content;  ?>"><strong> <?php _e('Use for GOVUK cookies form off text', 'cookie-control'); ?></strong></p>
                                </td>
                            </tr>
                            <tr class="hide-com <?php echo $hidden_content_product; ?> govuk-hide-element <?php echo $hide_govuk_content; ?>">
                                <th scope="row">
                                    <label for="cookiecontrol_settings[notifyTitle]"><?php _e('Notify bar title', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[notifyTitle]" id="cookiecontrol_settings[notifyTitle]" value="<?php echo !empty($ccc_options['notifyTitle']) ?  esc_html(stripslashes($ccc_options['notifyTitle'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['notifyTitle'])); ?>" size="50" />
                                </td>
                            </tr>
                            <tr class="hide-com <?php echo $hidden_content_product; ?> govuk-hide-element <?php echo $hide_govuk_content; ?>">
                                <th scope="row">
                                    <label for="cookiecontrol_settings[notifyDescription]"><?php _e('Notify bar description', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <?php wp_editor(stripslashes($ccc_options['notifyDescription']), 'cookiecontrol_settings_notifyDescription',  $settings = array('media_buttons' => false, 'textarea_name' => 'cookiecontrol_settings[notifyDescription]', 'tinymce' => false, 'quicktags' => array("buttons" => "strong,em,ul,ol,li,link"))); ?>
                                </td>
                            </tr>
                            <tr class="hide-com <?php echo $hidden_content_product; ?> govuk-hide-element <?php echo $hide_govuk_content; ?>">
                                <th scope="row">
                                    <label for="cookiecontrol_settings[acceptText]"><?php _e('Accept text', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[acceptText]" id="cookiecontrol_settings[acceptText]" value="<?php echo !empty($ccc_options['acceptText']) ?  esc_html(stripslashes($ccc_options['acceptText'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['acceptText'])); ?>" size="50" />
                                </td>
                            </tr>
                            <tr class="hide-com <?php echo $hidden_content_product; ?> govuk-hide-element <?php echo $hide_govuk_content; ?>">
                                <th scope="row">
                                    <label for="cookiecontrol_settings[settingsText]"><?php _e('Settings text', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[settingsText]" id="cookiecontrol_settings[settingsText]" value="<?php echo !empty($ccc_options['settingsText']) ?  esc_html(stripslashes($ccc_options['settingsText'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['settingsText'])); ?>" size="50" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[acceptRecommended]"><?php _e('Accept recommended settings button text', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[acceptRecommended]" id="cookiecontrol_settings[acceptRecommended]" value="<?php echo !empty($ccc_options['acceptRecommended']) ?  esc_html(stripslashes($ccc_options['acceptRecommended'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['acceptRecommended'])); ?>" size="50" />
                                    <p class="ccc-hdden govuk-show-element <?php echo $show_govuk_content;  ?>"><strong> <?php _e('Use for GOVUK cookies form save button text', 'cookie-control'); ?></strong></p>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[acceptSettings]"><?php _e('Accept All settings button text', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[acceptSettings]" id="cookiecontrol_settings[acceptSettings]" value="<?php echo !empty($ccc_options['acceptSettings']) ?  esc_html(stripslashes($ccc_options['acceptSettings'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['acceptSettings'])); ?>" size="50" />
                                    <p class="ccc-hdden govuk-show-element <?php echo $show_govuk_content;  ?>"><strong> <?php _e('Use for GOVUK cookie banner accept button text', 'cookie-control'); ?></strong></p>
                                </td>
                            </tr>
                            <tr class="govuk-hide-element <?php echo $hide_govuk_content; ?>">
                                <th scope="row">
                                    <label for="cookiecontrol_settings[rejectButton]"><?php _e('Reject Button', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="radio" class="first" name="cookiecontrol_settings[rejectButton]" id="cookiecontrol_settings[rejectButton]" value="true" <?php if (isset($ccc_options['rejectButton'])) : checked('true', $ccc_options['rejectButton']);
                                                                                                                                                                            endif; ?> /><?php _e('true', 'cookie-control'); ?>
                                    <input type="radio" name="cookiecontrol_settings[rejectButton]" id="cookiecontrol_settings[rejectButton]" value="false" <?php if (isset($ccc_options['rejectButton'])) :  checked('false', $ccc_options['rejectButton']);
                                                                                                                                                            else : ?> checked <?php endif; ?> /><?php _e('false', 'cookie-control'); ?>
                                </td>
                            </tr>
                            <tr class="hide-com <?php echo $hidden_content_product; ?> govuk-hide-element <?php echo $hide_govuk_content; ?>">
                                <th scope="row">
                                    <label for="cookiecontrol_settings[reject]"><?php _e('Reject Notify bar button text', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[reject]" id="cookiecontrol_settings[reject]" value="<?php if ($ccc_options['reject']) : echo esc_html(stripslashes($ccc_options['reject']));
                                                                                                                                        else : _e('Reject');
                                                                                                                                        endif; ?>" size="50" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[rejectSettings]"><?php _e('Reject settings button text', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[rejectSettings]" id="cookiecontrol_settings[rejectSettings]" value="<?php if ($ccc_options['rejectSettings']) : echo esc_html(stripslashes($ccc_options['rejectSettings']));
                                                                                                                                                        else : _e('Reject All');
                                                                                                                                                        endif; ?>" size="50" />
                                    <p class="ccc-hdden govuk-show-element <?php echo $show_govuk_content;  ?>"><strong> <?php _e('Use for GOVUK cookie banner reject button text', 'cookie-control'); ?></strong></p>

                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[closeLabel]"><?php _e('Close cookie window text', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[closeLabel]" id="cookiecontrol_settings[closeLabel]" value="<?php echo !empty($ccc_options['closeLabel']) ?  esc_html(stripslashes($ccc_options['closeLabel'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['closeLabel'])); ?>" size="50" />
                                    <p class="ccc-hdden govuk-show-element <?php echo $show_govuk_content;  ?>"><strong><?php _e('Use for GOVUK cookie banner hide message button text', 'cookie-control'); ?></strong></p>
                                </td>
                            </tr>
                            <tr class="ccc-hdden govuk-show-element table-row <?php echo $show_govuk_content;  ?>">
                                <th scope="row">
                                    <label for="cookiecontrol_settings[govUkacceptMessage]"><?php _e('GOVUK Accept message', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                <?php !empty($ccc_options['govUkacceptMessage']) ?  wp_editor(stripslashes($ccc_options['govUkacceptMessage']), 'cookiecontrol_settings_govUkacceptMessage',  $settings = array('media_buttons' => false, 'textarea_name' => 'cookiecontrol_settings[govUkacceptMessage]', 'tinymce' => false, 'quicktags' => array("buttons" => "strong,em,ul,ol,li,link"))): wp_editor(stripslashes($ccc_cookiecontrol_settings_defaults_ins['govUkacceptMessage']), 'cookiecontrol_settings_govUkacceptMessage',  $settings = array('media_buttons' => false, 'textarea_name' => 'cookiecontrol_settings[govUkacceptMessage]', 'tinymce' => false, 'quicktags' => array("buttons" => "strong,em,ul,ol,li,link"))); ?>
                                </td>
                            </tr>
                            <tr class="ccc-hdden govuk-show-element table-row <?php echo $show_govuk_content;  ?>">
                                <th scope="row">
                                    <label for="cookiecontrol_settings[govUkrejectMessage]"><?php _e('GOVUK reject message', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <?php !empty($ccc_options['govUkrejectMessage']) ?  wp_editor(stripslashes($ccc_options['govUkrejectMessage']), 'cookiecontrol_settings_govUkrejectMessage',  $settings = array('media_buttons' => false, 'textarea_name' => 'cookiecontrol_settings[govUkrejectMessage]', 'tinymce' => false, 'quicktags' => array("buttons" => "strong,em,ul,ol,li,link"))): wp_editor(stripslashes($ccc_cookiecontrol_settings_defaults_ins['govUkrejectMessage']), 'cookiecontrol_settings_govUkrejectMessage',  $settings = array('media_buttons' => false, 'textarea_name' => 'cookiecontrol_settings[govUkrejectMessage]', 'tinymce' => false, 'quicktags' => array("buttons" => "strong,em,ul,ol,li,link"))); ?>
                                </td>
                            </tr>
                            <tr class="ccc-hdden govuk-show-element table-row <?php echo $show_govuk_content; ?>">
                                <th scope="row">
                                    <label for="cookiecontrol_settings[govUkFormSuccessMessage]"><?php _e('GOVUK cookies Form success message after save', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                <?php !empty($ccc_options['govUkFormSuccessMessage']) ?  wp_editor(stripslashes($ccc_options['govUkFormSuccessMessage']), 'cookiecontrol_settings_govUkFormSuccessMessage',  $settings = array('media_buttons' => false, 'textarea_name' => 'cookiecontrol_settings[govUkFormSuccessMessage]', 'tinymce' => false, 'quicktags' => array("buttons" => "strong,em,ul,ol,li,link"))):wp_editor(stripslashes($ccc_cookiecontrol_settings_defaults_ins['govUkFormSuccessMessage']), 'cookiecontrol_settings_govUkFormSuccessMessage',  $settings = array('media_buttons' => false, 'textarea_name' => 'cookiecontrol_settings[govUkFormSuccessMessage]', 'tinymce' => false, 'quicktags' => array("buttons" => "strong,em,ul,ol,li,link"))); ?>
                                </td>
                            </tr>
                            <tr class="ccc-hdden govuk-show-element table-row <?php echo $show_govuk_content; ?>">
                                <th scope="row">
                                    <label for="cookiecontrol_settings[govUkFormNecessaryTitle]"><?php _e('GOVUK cookies Form strictly necessary cookies title', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[govUkFormNecessaryTitle]" id="cookiecontrol_settings[govUkFormNecessaryTitle]" value="<?php echo !empty($ccc_options['govUkFormNecessaryTitle']) ?  esc_html(stripslashes($ccc_options['govUkFormNecessaryTitle'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['govUkFormNecessaryTitle'])); ?>" size="50" />
                                </td>
                            </tr>
                            <tr class="ccc-hdden govuk-show-element table-row <?php echo $show_govuk_content; ?>">
                                <th scope="row">
                                    <label for="cookiecontrol_settings[govUkFormNecessaryMessage]"><?php _e('GOVUK cookies Form strictly necessary cookies Message', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                <?php !empty($ccc_options['govUkFormNecessaryMessage']) ?  wp_editor(stripslashes($ccc_options['govUkFormNecessaryMessage']), 'cookiecontrol_settings_govUkFormNecessaryMessage',  $settings = array('media_buttons' => false, 'textarea_name' => 'cookiecontrol_settings[govUkFormNecessaryMessage]', 'tinymce' => false, 'quicktags' => array("buttons" => "strong,em,ul,ol,li,link"))):wp_editor(stripslashes($ccc_cookiecontrol_settings_defaults_ins['govUkFormNecessaryMessage']), 'cookiecontrol_settings_govUkFormNecessaryMessage',  $settings = array('media_buttons' => false, 'textarea_name' => 'cookiecontrol_settings[govUkFormNecessaryMessage]', 'tinymce' => false, 'quicktags' => array("buttons" => "strong,em,ul,ol,li,link"))); ?>
                                </td>
                            </tr>
                            <tr class="govuk-hide-element <?php echo $hide_govuk_content; ?>">
                                <th scope="row">
                                    <label for="cookiecontrol_settings[accessibilityAlert]"><?php _e('Accessibility alert text', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[accessibilityAlert]" id="cookiecontrol_settings[accessibilityAlert]" value="<?php echo !empty($ccc_options['accessibilityAlert']) ?  esc_html(stripslashes($ccc_options['accessibilityAlert'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['accessibilityAlert'])); ?>" size="100" />
                                </td>
                            </tr>
                            <tr class="govuk-hide-element <?php echo $hide_govuk_content; ?>">
                                <th scope="row">
                                    <label for="cookiecontrol_settings[cornerButton]"><?php _e('Corner Button (used by screen readers)', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[cornerButton]" id="cookiecontrol_settings[cornerButton]" value="<?php echo !empty($ccc_options['cornerButton']) ?  esc_html(stripslashes($ccc_options['cornerButton'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['cornerButton'])); ?>" size="100" />
                                </td>
                            </tr>
                            <tr class="govuk-hide-element <?php echo $hide_govuk_content; ?>">
                                <th scope="row">
                                    <label for="cookiecontrol_settings[landmark]"><?php _e('Landmark (used by screen readers)', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[landmark]" id="cookiecontrol_settings[landmark]" value="<?php echo !empty($ccc_options['landmark']) ?  esc_html(stripslashes($ccc_options['landmark'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['landmark'])); ?>" size="100" />
                                </td>
                            </tr>
                            <tr class="govuk-hide-element <?php echo $hide_govuk_content; ?>">
                                <th scope="row">
                                    <label for="cookiecontrol_settings[showVendors]"><?php _e('Show Vendors	', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[showVendors]" id="cookiecontrol_settings[showVendors]" value="<?php echo !empty($ccc_options['showVendors']) ?  esc_html(stripslashes($ccc_options['showVendors'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['showVendors'])); ?>" size="100" />
                                </td>
                            </tr>
                            <tr class="govuk-hide-element <?php echo $hide_govuk_content; ?>">
                                <th scope="row">
                                    <label for="cookiecontrol_settings[thirdPartyCookies]"><?php _e('Third Party Cookies (used with vendors)', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[thirdPartyCookies]" id="cookiecontrol_settings[thirdPartyCookies]" value="<?php echo !empty($ccc_options['thirdPartyCookies']) ?  esc_html(stripslashes($ccc_options['thirdPartyCookies'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['thirdPartyCookies'])); ?>" size="100" />
                                </td>
                            </tr>
                            <tr class="govuk-hide-element <?php echo $hide_govuk_content; ?>">
                                <th scope="row">
                                    <label for="cookiecontrol_settings[readMore]"><?php _e('Read More (used with vendors)', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[readMore]" id="cookiecontrol_settings[readMore]" value="<?php echo !empty($ccc_options['readMore']) ?  esc_html(stripslashes($ccc_options['readMore'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['readMore'])); ?>" size="100" />
                                </td>
                            </tr>
                        </table>

                    </div>

                    <div id="branding" class="pro-multi-license <?php echo $hidden_content_product; ?> <?php echo $hide_govuk_content; ?> govuk-hide-element">
                        <h2><?php _e('Branding', 'cookie-control'); ?></h2>
                        <p></p>
                        <p><?php printf(__('With %s pro %s and %s pro_multisite %s licenses, you are able to set all aspects of the module\'s styling, and remove any back links to CIVIC.', 'cookie-control'), '<b>', '</b>', '<b>', '</b>'); ?></p>

                        <table class="form-table">
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[fontColor]"><?php _e('Font color', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" class="cc-color-picker" name="cookiecontrol_settings[fontColor]" id="cookiecontrol_settings[fontColor]" value="<?php echo esc_html(stripslashes($ccc_options['fontColor'])); ?>" size="8" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[fontFamily]"><?php _e('Font family', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[fontFamily]" id="cookiecontrol_settings[fontFamily]" value="<?php echo esc_html(stripslashes($ccc_options['fontFamily'])); ?>" size="50" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[fontSizeTitle]"><?php _e('Title font size', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[fontSizeTitle]" id="cookiecontrol_settings[fontSizeTitle]" value="<?php echo esc_html(stripslashes($ccc_options['fontSizeTitle'])); ?>" size="8" /> em
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[fontSizeHeaders]"><?php _e('Headers font size', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[fontSizeHeaders]" id="cookiecontrol_settings[fontSizeHeaders]" value="<?php echo esc_html(stripslashes($ccc_options['fontSizeHeaders'])); ?>" size="8" /> em
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[fontSize]"><?php _e('Body font size', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[fontSize]" id="cookiecontrol_settings[fontSize]" value="<?php echo esc_html(stripslashes($ccc_options['fontSize'])); ?>" size="8" /> em
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[backgroundColor]"><?php _e('Background color', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[backgroundColor]" class="cc-color-picker" id="cookiecontrol_settings[backgroundColor]" value="<?php echo esc_html(stripslashes($ccc_options['backgroundColor'])); ?>" size="8" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[toggleText]"><?php _e('Toggle text color', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[toggleText]" class="cc-color-picker" id="cookiecontrol_settings[toggleText]" value="<?php echo esc_html(stripslashes($ccc_options['toggleText'])); ?>" size="8" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[toggleColor]"><?php _e('Toggle color', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[toggleColor]" class="cc-color-picker" id="cookiecontrol_settings[toggleColor]" value="<?php echo esc_html(stripslashes($ccc_options['toggleColor'])); ?>" size="8" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[toggleBackground]"><?php _e('Toggle background color', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[toggleBackground]" class="cc-color-picker" id="cookiecontrol_settings[toggleBackground]" value="<?php echo esc_html(stripslashes($ccc_options['toggleBackground'])); ?>" size="8" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[alertText]"><?php _e('Alert text color', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[alertText]" class="cc-color-picker" id="cookiecontrol_settings[alertText]" value="<?php echo esc_html(stripslashes($ccc_options['alertText'])); ?>" size="8" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[alertBackground]"><?php _e('Alert background color', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[alertBackground]" class="cc-color-picker" id="cookiecontrol_settings[alertBackground]" value="<?php echo esc_html(stripslashes($ccc_options['alertBackground'])); ?>" size="8" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[acceptTextColor]"><?php _e('Accept text color', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[acceptTextColor]" class="cc-color-picker" id="cookiecontrol_settings[acceptTextColor]" value="<?php echo esc_html(stripslashes($ccc_options['acceptTextColor'])); ?>" size="8" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[acceptBackground]"><?php _e('Accept background color', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[acceptBackground]" class="cc-color-picker" id="cookiecontrol_settings[acceptBackground]" value="<?php echo esc_html(stripslashes($ccc_options['acceptBackground'])); ?>" size="8" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[rejectText]"><?php _e('Reject Text color', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[rejectText]" class="cc-color-picker" id="cookiecontrol_settings[rejectText]" value="<?php echo esc_html(stripslashes($ccc_options['rejectText'])); ?>" size="8" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[rejectBackground]"><?php _e('Reject background color', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[rejectBackground]" class="cc-color-picker" id="cookiecontrol_settings[rejectBackground]" value="<?php echo esc_html(stripslashes($ccc_options['rejectBackground'])); ?>" size="8" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[closeText]"><?php _e('Close text color', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[closeText]" class="cc-color-picker" id="cookiecontrol_settings[closeText]" value="<?php echo !empty($ccc_options['closeText']) ?  esc_html(stripslashes($ccc_options['closeText'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['closeText'])); ?>" size="8" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[closeBackground]"><?php _e('Close background color', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[closeBackground]" class="cc-color-picker" id="cookiecontrol_settings[closeBackground]" value="<?php echo !empty($ccc_options['closeBackground']) ?  esc_html(stripslashes($ccc_options['closeBackground'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['closeBackground'])); ?>" size="8" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[notifyFontColor]"><?php _e('Notify font color', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[notifyFontColor]" class="cc-color-picker" id="cookiecontrol_settings[notifyFontColor]" value="<?php echo !empty($ccc_options['notifyFontColor']) ?  esc_html(stripslashes($ccc_options['notifyFontColor'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['notifyFontColor'])); ?>" size="8" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[notifyBackgroundColor]"><?php _e('Notify background color', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[notifyBackgroundColor]" class="cc-color-picker" id="cookiecontrol_settings[notifyBackgroundColor]" value="<?php echo !empty($ccc_options['notifyBackgroundColor']) ?  esc_html(stripslashes($ccc_options['notifyBackgroundColor'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['notifyBackgroundColor'])); ?>" size="8" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[buttonIcon]"><?php _e('Button Icon (url)', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[buttonIcon]" id="cookiecontrol_settings[buttonIcon]" value="<?php echo esc_html(stripslashes($ccc_options['buttonIcon'])); ?>" size="50" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[buttonIconWidth]"><?php _e('Button icon width', 'cookie-control'); ?></label>
                                    <p><?php _e('Applicable only if custom icon used'); ?></p>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[buttonIconWidth]" id="cookiecontrol_settings[buttonIconWidth]" value="<?php echo esc_html(stripslashes($ccc_options['buttonIconWidth'])); ?>" size="8" /> px
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[buttonIconHeight]"><?php _e('Button icon height', 'cookie-control'); ?></label>
                                    <p><?php _e('Applicable only if custom icon used'); ?></p>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[buttonIconHeight]" id="cookiecontrol_settings[buttonIconHeight]" value="<?php echo esc_html(stripslashes($ccc_options['buttonIconHeight'])); ?>" size="8" /> px
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[removeIcon]"><?php _e('Remove icon', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="radio" class="first" name="cookiecontrol_settings[removeIcon]" id="cookiecontrol_settings[removeIcon]" value="true" <?php checked('true', $ccc_options['removeIcon']); ?> /><?php _e('Yes', 'cookie-control'); ?>
                                    <input type="radio" name="cookiecontrol_settings[removeIcon]" id="cookiecontrol_settings[removeIcon]" value="false" <?php checked('false', $ccc_options['removeIcon']); ?> /><?php _e('No', 'cookie-control'); ?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[removeAbout]"><?php _e('Remove about text', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="radio" class="first" name="cookiecontrol_settings[removeAbout]" id="cookiecontrol_settings[removeAbout]" value="true" <?php checked('true', $ccc_options['removeAbout']); ?> /><?php _e('Yes', 'cookie-control'); ?>
                                    <input type="radio" name="cookiecontrol_settings[removeAbout]" id="cookiecontrol_settings[removeAbout]" value="false" <?php checked('false', $ccc_options['removeAbout']); ?> /><?php _e('No', 'cookie-control'); ?>
                                </td>
                            </tr>
                        </table>

                        <div class="warning">
                            <div class="dashicons dashicons-warning"><span class="screen-reader-text"><?php _e('warning', 'cookie-control'); ?></span></div>
                            <?php _e('Please note, in changing the branding object you take responsibility for the module\'s accessibility standard. Should you set the removeIcon option to true, it is your responsibility to create your own ever present button that invokes CookieControl.toggle() so that users may still have consistent access to granting and revoking their consent.', 'cookie-control'); ?>
                        </div>

                    </div>

                    <div id="regional" class="pro-multi-license <?php echo $hidden_content_product; ?> govuk-hide-element <?php echo $hide_govuk_content; ?>">
                        <h2><?php _e('Geolocation And Localisation', 'cookie-control'); ?></h2>
                        <p><?php _e('Select if you want the cookie to be displayed at the website language or at browser language.', 'cookie-control'); ?></p>

                        <table class="form-table">
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[chooseLocale]"><?php _e('Choose locale', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="radio" class="first" name="cookiecontrol_settings[chooseLocale]" id="cookiecontrol_settings[chooseLocale]" value="browser" <?php checked('browser', $ccc_options['chooseLocale']); ?> /><?php _e('Browser', 'cookie-control'); ?>
                                    <input type="radio" name="cookiecontrol_settings[chooseLocale]" id="cookiecontrol_settings[chooseLocale]" value="website" <?php checked('website', $ccc_options['chooseLocale']); ?> /><?php _e('Website', 'cookie-control'); ?>
                                </td>
                            </tr>
                        </table>
                        <p><?php printf(__('With %s pro %s  and %s pro_multisite %s licenses, you are able to disable the module entirely for visitors outside of the EU, and offer alternative languages.', 'cookie-control'), '<b>', '</b>', '<b>', '</b>'); ?></p>

                        <div class="excludedCountriesTemplate">
                            <table class="form-table">
                                <tr>
                                    <th scope="row">
                                        <label for="cookiecontrol_settings[excludedCountries]"><?php _e('Excluded Country (ISO code)', 'cookie-control'); ?></label>
                                    </th>
                                    <td>
                                        <input placeholder="eg. Language code ex. US" type="text" name="cookiecontrol_settings[excludedCountries]" id="cookiecontrol_settings[excludedCountries]" size="20" />
                                        <a href="#" class="remove removeRow" data-class="excludedCountries" id="removeexcludedCountries">
                                            <div class="dashicons dashicons-dismiss"><span class="screen-reader-text"><?php _e('Remove', 'cookie-control'); ?></span></div>
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <p>
                            <?php printf(__('Either add the value %s all %s, or a 2 letter ISO code (ex. US) for the country you wish to disable the module for. View full %s <a href="%s" target="_blank">list of languages codes</a>.%s', 'cookie-control'), '<b>', '</b>', '<b>', esc_url('https://www.loc.gov/standards/iso639-2/php/code_list.php'), '</b>'); ?>
                        <p>
                        <div id="excludedCountriesContainer" class="pro-multi-license <?php echo $hidden_content_product; ?>">
                            <?php
                            if (!empty($ccc_options['excludedCountries'])) :
                                foreach ($ccc_options['excludedCountries'] as $key => $val) :  ?>
                                    <?php if (trim($val) != '') : ?>
                                        <div class="excludedCountries">
                                            <table class="form-table">
                                                <tr>
                                                    <th scope="row">
                                                        <label for="cookiecontrol_settings[excludedCountries][<?php echo $key ?>]"><?php _e('Excluded Country (ISO code)', 'cookie-control'); ?></label>
                                                    </th>
                                                    <td>
                                                        <input type="text" name="cookiecontrol_settings[excludedCountries][<?php echo $key ?>]" id="cookiecontrol_settings[excludedCountries][<?php echo $key ?>]" value="<?php echo stripslashes($val); ?>" size="20" />
                                                        <a href="#" class="remove removeRow" data-class="excludedCountries" id="removeexcludedCountries">
                                                            <div class="dashicons dashicons-dismiss"><span class="screen-reader-text"><?php _e('Remove', 'cookie-control'); ?></span></div>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    <?php endif ?>
                                <?php endforeach; ?>
                                <div id="last-used-key-excludedCountries" data-keyid="<?php echo is_numeric($key) ? $key : 0; ?>"></div>
                            <?php else : ?>
                                <div id="last-used-key-excludedCountries" data-keyid="0"></div>
                            <?php endif; ?>

                        </div>
                        <button class="addRow civic" data-class="excludedCountries"><i class="icon-plus-sign icon-white"></i><?php _e('Add Excluded Country', 'cookie-control'); ?></button><br>

                        <div class="warning">
                            <div class="dashicons dashicons-warning"><span class="screen-reader-text"><?php _e('warning', 'cookie-control'); ?></span></div>
                            <?php _e('Please note, the excludedCountries option is ignored if the user accesses your website from within the EU, or their location cannot be identified.', 'cookie-control'); ?>
                        </div>

                        <hr />

                        <h2><?php _e('Alternative languages', 'cookie-control'); ?></h2>

                        <div class="altLanguagesTemplate">
                            <table class="form-table">
                                <tr>
                                    <td colspan="2">
                                        <label for="cookiecontrol_settings[altLanguages]"><?php _e('Alternative language (ISO code)', 'cookie-control'); ?></label>
                                        <input placeholder="eg. Language code ex. el" type="text" name="cookiecontrol_settings[altLanguages]" id="cookiecontrol_settings[altLanguages]" size="20" />
                                        <a href="#" class="remove removeRow" data-class="altLanguages" id="removealtLanguages">
                                            <div class="dashicons dashicons-dismiss"><span class="screen-reader-text"><?php _e('Remove', 'cookie-control'); ?></span></div>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <label for="cookiecontrol_settings[altLanguagesText]"><?php _e('Translation for the alternative language', 'cookie-control'); ?></label>
                                        <p><?php _e('The text object mirrors that of the default text object, and allows you to localise all values to this particular locale / language.', 'cookie-control'); ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <textarea name="cookiecontrol_settings[altLanguagesText]" id="cookiecontrol_settings[altLanguagesText]" cols="60" rows="10"></textarea>
                                    </td>
                                    <td>
                                        <p><?php printf(__('Your input should contain all of the language strings you wish to translate %s (Do not use single quotes (\'\') or apostrophe (\') in your input).', 'cookie-control'), '<br>'); ?></p>
                                        <p><?php printf(__('If you have  Pro Edition or  Pro Edition  license type and you need IAB support , you have to add iabCMP: {} ', 'cookie-control'), '<br>'); ?></p>
                                        <p><?php printf(__('If you need IAB support you have to delete OptionalCookies, else if you don\'t need IAB support you have to delete IabCMP: {} from your string. Full example with IabCMP: ', 'cookie-control'), '<br>'); ?></p>

                                        <pre style="font-size: 10px;">
    text : {
            title: 'Αυτός ο ιστότοπος χρησιμοποιεί cookies για να αποθηκεύσει πληροφορίες στον υπολογιστή σας.',
            intro:  'Μερικά από αυτά είναι απαραίτητα, ενώ άλλα μας βοηθούν να βελτιώσουμε την εμπειρία σας δείχνοντάς μας πώς χρησιμοποιείται ο ιστότοπος.',
            necessaryTitle : 'Απαραίτητα Cookies',
            necessaryDescription : 'Τα απαραίτητα cookies καθιστουν δυνατή την λειτουργικότητα του ιστοτόπου, όπως για παράδειγμα την πλοήγηση και την πρόσβαση σε ασφαλείς περιοχές του ιστοτόπου. Ο ιστότοπος δεν μπορεί να λειτουργήσει χωρίς αυτά, και μπορούν να απενεργοποιηθούν μονο από τον φυλλομετρητή σας.',
            on: "ΝΑΙ",
            off: "ΟΧΙ",
            notifyTitle: "Σχετικά με τα cookies σε αυτή την σελίδα",
            notifyDescription: "Χρησιμοποιούμε cookies για να βελτιστοποιήσουμε την λειτουργία της ιστοσελίδας και να σας προσφέρουμε την βέλτιστη δυνατή εμπειρία.",
            accept: "Αποδοχή",
            acceptSettings: "Αποδοχή",
            reject: "Δεν Δέχομαι",
            rejectSettings: "Δεν Δέχομαι",
            settings: "Ρυθμίσεις",
            thirdPartyTitle : 'Προειδοποίηση: Μερικά cookies ζητούν την προσοχή σας',
            thirdPartyDescription : 'Η συγκατάθεση στα παρακάτω cookies δεν μπορεί να ανακληθεί αυτόματα. Παρακαλώ ακολουθηστε τον παρακάτω σύνδεσμο για να αποχωρήσετε από τη χρήση αυτών των υπηρεσιών.',
            acceptRecommended: 'Αποδοχή προτεινόμενων ρυθμίσεων',

            iabCMP: {
                panelTitle: 'Αυτός ο ιστότοπος χρησιμοποιεί cookies για την αποθήκευση πληροφοριών στον υπολογιστή σας',
                panelIntro1: 'Εμείς και επιλεγμένες εταιρείες χρησιμοποιούμε τεχνολογίες όπως τα cookies για την αποθήκευση και ανάκτηση πληροφοριών από το πρόγραμμα περιήγησής σας. Αυτές οι πληροφορίες μπορεί να αφορούν εσάς, τις προτιμήσεις σας ή τη συσκευή σας και χρησιμοποιούνται κυρίως για να λειτουργήσει ο ιστότοπος όπως περιμένετε. Παρόλο που οι πληροφορίες συνήθως δεν σας αναγνωρίζουν άμεσα, λεπτομέρειες όπως η συσκευή, το λειτουργικό σύστημα και ο τύπος του προγράμματος περιήγησης που χρησιμοποιείτε μπορεί να θεωρούνται προσωπικά δεδομένα, καθώς βοηθούν στη δημιουργία μιας πιο εξατομικευμένης εμπειρίας ιστού.',
                panelIntro2: 'Καθώς σεβόμαστε το δικαίωμά σας στο απόρρητο, μπορείτε να ελέγξετε τον τρόπο με τον οποίο χρησιμοποιούνται αυτές οι πληροφορίες βλέποντας τους σκοπούς, τις ειδικές δυνατότητες και τους προμηθευτές που υποστηρίζουμε και επιλέγοντας εάν θέλετε ή όχι να επιτρέψετε την επεξεργασία των πληροφοριών σας με αυτόν τον τρόπο.',
                panelIntro3: 'Ορισμένοι προμηθευτές μπορούν να επεξεργάζονται προσωπικά δεδομένα βάσει νόμιμων συμφερόντων και να βασίζονται σε διαφορετικές προτιμήσεις για την παροχή συγκεκριμένων υπηρεσιών. Έχετε το δικαίωμα να αντιταχθείτε στην επεξεργασία των προσωπικών σας δεδομένων με βάση το νόμιμο συμφέρον και μπορείτε να το ορίσετε σε όλους τους σκοπούς και τους προμηθευτές κάνοντας κλικ στην επιλογή Απόρριψη όλων παρακάτω ή ορίζοντας την προτίμησή σας για κάθε σκοπό και προμηθευτή ξεχωριστά. Ανατρέξτε στην καρτέλα προμηθευτή για πιο συγκεκριμένες λεπτομέρειες και βεβαιωθείτε ότι μπορείτε να αλλάξετε τις προτιμήσεις σας ανά πάσα στιγμή κάνοντας κλικ στο εικονίδιο "Έλεγχος cookie" στην κάτω γωνία.',
                aboutIab: 'Μπορείτε να ελέγξετε τον τρόπο με τον οποίο χρησιμοποιούνται αυτές οι πληροφορίες, υποδεικνύοντας τη συγκατάθεσή σας για τους ακόλουθους σκοπούς που περιγράφονται από',
                iabName: 'IAB Ευρώπη',
                vendors: 'Προμηθευτες Διαφημίσεων',
                acceptAll: 'Αποδοχή όλων',
                rejectAll: 'Απόρριψη όλων',
                dataUse: 'Πώς χρησιμοποιούνται τα δεδομένα',
                savePreferences : 'Αποθήκευση προτιμήσεων και έξοδος'
            },  
        },
        optionalCookies:[
              {
                  label: "Στατιστικά",
                  description: 'Χρησιμοποιούμε cookies για να συλλέγουμε στατιστικά σχετικά με την χρήση της ιστοσελίδας.'
              }
            ]
    
  
                    </pre>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <label><?php _e('Either gdpr, ccpa, or hidden. Similar to the global mode property', 'cookie-control'); ?></label>
                                        <p><?php _e('Determines the mode Cookie Control will run in for a certain locale. Using the hidden option means Cookie Control will be hidden, and all onAccept functions will run immediately.', 'cookie-control'); ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <label for="cookiecontrol_settings[altLanguagesMode]"><?php _e('Locale Mode', 'cookie-control'); ?></label>
                                    </th>
                                    <td>
                                        <input type="radio" class="first" name="cookiecontrol_settings[altLanguagesMode]" id="cookiecontrol_settings[altLanguagesMode]" value="gdpr" checked /><?php _e('GDRP', 'cookie-control'); ?>
                                        <input type="radio" name="cookiecontrol_settings[altLanguagesMode]" id="cookiecontrol_settings[altLanguagesMode]" value="ccpa" /><?php _e('CCPA', 'cookie-control'); ?>
                                        <input type="radio" name="cookiecontrol_settings[altLanguagesMode]" id="cookiecontrol_settings[altLanguagesMode]" value="hidden" /><?php _e('Hidden', 'cookie-control'); ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <p><?php _e('Accepts either a full locale (en_US), or two letter language code (en). Where both are present and matched with the current user\'s preference, the more specific locale will be used', 'cookie-control'); ?></p>
                        <div id="altLanguagesContainer" class="<?php echo $hidden_content_product; ?>">
                            <?php
                            if (!empty($ccc_options['altLanguages'])) :
                                foreach ($ccc_options['altLanguages'] as $key => $val) :  ?>
                                    <?php if (trim($val) != '') : ?>
                                        <div class="altLanguages">
                                            <table class="form-table">
                                                <tr>
                                                    <td colspan="2">
                                                        <label for="cookiecontrol_settings[altLanguages][<?php echo $key; ?>]"><?php _e('Alternative language (ISO code)', 'cookie-control'); ?></label>
                                                        <input type="text" name="cookiecontrol_settings[altLanguages][<?php echo $key; ?>]" id="cookiecontrol_settings[altLanguages][<?php echo $key; ?>]" value="<?php echo esc_attr(stripslashes($val)); ?>" size="20" />
                                                        <a href="#" class="remove removeRow" data-class="altLanguages" id="removealtLanguages">
                                                            <div class="dashicons dashicons-dismiss"><span class="screen-reader-text"><?php _e('Remove', 'cookie-control'); ?></span></div>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <label for="cookiecontrol_settings[altLanguagesText][<?php echo $key; ?>]"><?php _e('Translation for the alternative language', 'cookie-control'); ?></label>
                                                        <p><?php _e('The text object mirrors that of the default text object, and allows you to localise all values to this particular locale / language.', 'cookie-control'); ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <textarea name="cookiecontrol_settings[altLanguagesText][<?php echo $key; ?>]" id="cookiecontrol_settings[altLanguagesText][<?php echo $key; ?>]" cols="180" rows="10"><?php echo stripslashes($ccc_options['altLanguagesText'][$key]);  ?></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <label for="cookiecontrol_settings[altLanguagesMode]"><?php _e('Either gdpr, ccpa, or hidden. Similar to the global mode property', 'cookie-control'); ?></label>
                                                        <p><?php _e('Determines the mode Cookie Control will run in for a certain locale. Using the hidden option means Cookie Control will be hidden, and all onAccept functions will run immediately.', 'cookie-control'); ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <label for="cookiecontrol_settings[altLanguagesMode][<?php echo $key; ?>]"><?php _e('Locale Mode', 'cookie-control'); ?></label>
                                                    </th>
                                                    <td colspan="2">
                                                        <input type="radio" class="first" name="cookiecontrol_settings[altLanguagesMode][<?php echo $key; ?>]" id="cookiecontrol_settings[altLanguagesMode][<?php echo $key; ?>]" value="gdpr" <?php checked('gdpr', (isset($ccc_options['altLanguagesMode'][$key]) ? $ccc_options['altLanguagesMode'][$key] : '')); ?> /><?php _e('GDRP', 'cookie-control'); ?>
                                                        <input type="radio" name="cookiecontrol_settings[altLanguagesMode][<?php echo $key; ?>]" id="cookiecontrol_settings[altLanguagesMode][<?php echo $key; ?>]" value="ccpa" <?php checked('ccpa', (isset($ccc_options['altLanguagesMode'][$key]) ? $ccc_options['altLanguagesMode'][$key] : '')); ?> /><?php _e('CCPA', 'cookie-control'); ?>
                                                        <input type="radio" name="cookiecontrol_settings[altLanguagesMode][<?php echo $key; ?>]" id="cookiecontrol_settings[altLanguagesMode][<?php echo $key; ?>]" value="hidden" <?php checked('hidden', (isset($ccc_options['altLanguagesMode'][$key]) ? $ccc_options['altLanguagesMode'][$key] : '')); ?> /><?php _e('Hidden', 'cookie-control'); ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    <?php endif ?>
                                <?php endforeach; ?>
                                <div id="last-used-key-altLanguages" data-keyid="<?php echo $key ?>"></div>
                            <?php else : ?>
                                <div id="last-used-key-altLanguages" data-keyid="0"></div>
                            <?php endif; ?>
                        </div>
                        <button class="addRow civic" data-class="altLanguages"><i class="icon-plus-sign icon-white"></i><?php _e('Add Alternative Language', 'cookie-control'); ?></button><br>

                    </div>

                    <div id="accessibility" class="govuk-hide-element <?php echo $hide_govuk_content; ?>">
                        <h2><?php _e('Accessibility', 'cookie-control'); ?></h2>
                        <table class="form-table">
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[accessKey]"><?php _e('Access key', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[accessKey]" id="cookiecontrol_settings[accessKey]" value="<?php echo esc_html(stripslashes($ccc_options['accessKey'])); ?>" size="8" />
                                </td>
                            </tr>
                            <tr class="description">
                                <td colspan="2">
                                    <p> <?php _e('Remaps the accesskey that the module is assigned to.', 'cookie-control'); ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[highlightFocus]"><?php _e('Highlight focus', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="radio" class="first" name="cookiecontrol_settings[highlightFocus]" value="false" <?php checked('false', (isset($ccc_options['highlightFocus']) ? $ccc_options['highlightFocus'] : '')); ?> />
                                    <?php _e('No', 'cookie-control'); ?>
                                    <input type="radio" name="cookiecontrol_settings[highlightFocus]" value="true" <?php checked('true', (isset($ccc_options['highlightFocus']) ? $ccc_options['highlightFocus'] : '')); ?> />
                                    <?php _e('Yes', 'cookie-control'); ?>
                                </td>
                            </tr>
                            <tr class="description">
                                <td colspan="2">
                                    <p> <?php _e('Determines if the module should use more accentuated styling to highlight elements in focus, or use the browser\'s outline default.', 'cookie-control'); ?></p>
                                    <p> <?php _e('If enabled, this property uses CSS filters to invert the module\'s colours. This should hopefully mean that a higher visual contrast is achieved, even with a custom branding.', 'cookie-control'); ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[outline]"><?php _e('Outline', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="radio" class="first" name="cookiecontrol_settings[outline]" id="cookiecontrol_settings[outline]" value="true" <?php if (isset($ccc_options['outline'])) : checked('true', $ccc_options['outline']);
                                                                                                                                                                endif; ?> />
                                    <?php _e('Yes', 'cookie-control'); ?>
                                    <input type="radio" name="cookiecontrol_settings[outline]" id="cookiecontrol_settings[outline]" value="false" <?php if (isset($ccc_options['outline'])) :  checked('false', $ccc_options['outline']);
                                                                                                                                                    else : ?> checked <?php endif; ?> />
                                    <?php _e('No', 'cookie-control'); ?>
                                </td>
                            </tr>
                            <tr class="description">
                                <td colspan="2">
                                    <p> <?php _e('Determines if the module should show the browsers default outline styling on elements. It can be combined with highlightFocus to add both a highlight and an outline to focused elements.', 'cookie-control'); ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[overlay]"><?php _e('Overlay', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="radio" class="first" name="cookiecontrol_settings[overlay]" id="cookiecontrol_settings[overlay]" value="true" <?php if (isset($ccc_options['overlay'])) : checked('true', $ccc_options['overlay']);
                                                                                                                                                                else : ?> checked <?php endif; ?> />
                                    <?php _e('Yes', 'cookie-control'); ?>
                                    <input type="radio" name="cookiecontrol_settings[overlay]" id="cookiecontrol_settings[overlay]" value="false" <?php if (isset($ccc_options['overlay'])) :  checked('false', $ccc_options['overlay']);
                                                                                                                                                    endif; ?> />
                                    <?php _e('No', 'cookie-control'); ?>
                                </td>
                            </tr>
                            <tr class="description">
                                <td colspan="2">
                                    <p> <?php _e('Determines if the module should use an overlay to accentuate the presence of an open notification bar or panel and discourage use of the main site while these elements are open.', 'cookie-control'); ?></p>
                                    <p> <?php _e('This property is recommended for accessibility purposes and enabled by default. Even if disabled, interaction with the site behind is not possible if the popup layout is enabled.', 'cookie-control'); ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[disableSiteScrolling]"><?php _e('Disable Site Scrolling', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="radio" class="first" name="cookiecontrol_settings[disableSiteScrolling]" id="cookiecontrol_settings[disableSiteScrolling]" value="true" <?php if (isset($ccc_options['disableSiteScrolling'])) : checked('true', $ccc_options['disableSiteScrolling']);
                                                                                                                                                                                            endif; ?> />
                                    <?php _e('Yes', 'cookie-control'); ?>
                                    <input type="radio" name="cookiecontrol_settings[disableSiteScrolling]" id="cookiecontrol_settings[disableSiteScrolling]" value="false" <?php if (isset($ccc_options['disableSiteScrolling'])) :  checked('false', $ccc_options['disableSiteScrolling']);
                                                                                                                                                                            else : ?> checked <?php endif; ?> />
                                    <?php _e('No', 'cookie-control'); ?>
                                </td>
                            </tr>
                            <tr class="description">
                                <td colspan="2">
                                    <p> <?php _e('Determines if the module should prevent scrolling of the site when either the notification bar or panel are open.', 'cookie-control'); ?></p>
                                    <p> <?php _e('This property is recommended for accessibility purposes, though not enabled by default.', 'cookie-control'); ?></p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div id="iab" class="pro-multi-license <?php echo $hidden_content_product; ?> <?php echo $hide_govuk_content; ?> govuk-hide-element">
                        <h2><?php _e('IAB', 'cookie-control'); ?></h2>
                        <p><?php printf(__('With %s pro %s  and %s pro_multisite %s licenses, you are able to enable and configure the IAB functionality', 'cookie-control'), '<b>', '</b>', '<b>', '</b>'); ?></p>
                        <p><?php _e('Find out more about the IAB', 'cookie-control'); ?> <a class="text-underline" href="https://www.iabuk.com" target="_blank">here</a></p>
                        <div class="warning warning--api">
                            <div class="dashicons dashicons-warning"><span class="screen-reader-text"><?php _e('warning', 'cookie-control'); ?></span></div>
                            <?php _e(' Please note that when using Cookie Control as an IAB CMP, you cannot use any of the more subtle interfaces like notify or box. IAB requires certain view and text so Cookie Control will render in open state.', 'cookie-control'); ?>
                        </div>
                        <table class="form-table">
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabCMP]"><?php _e('iabCMP', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="radio" class="first cookiecontrol_settings_iab_v9" name="cookiecontrol_settings[iabCMP]" id="cookiecontrol_settings[iabCMP]" value="true" <?php if (isset($ccc_options['iabCMP'])) : checked('true', $ccc_options['iabCMP']);
                                                                                                                                                                                            endif; ?> /><?php _e('True', 'cookie-control'); ?>
                                    <input type="radio" class="cookiecontrol_settings_iab_v9" name="cookiecontrol_settings[iabCMP]" id="cookiecontrol_settings[iabCMP]" value="false" <?php if (isset($ccc_options['iabCMP'])) :  checked('false', $ccc_options['iabCMP']);
                                                                                                                                                                                        else : ?> checked <?php endif; ?> /><?php _e('False', 'cookie-control'); ?>
                                </td>
                            </tr>
                            <tr class="description">
                                <td colspan="2">
                                    <p> <?php _e('Determines whether or not Cookie Control supports the IAB\'s TCF v2.0', 'cookie-control'); ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[publisherCC]"><?php _e('PublisherCC', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[publisherCC]" id="cookiecontrol_settings[publisherCC]" value="<?php echo !empty($ccc_options['publisherCC']) ?  esc_html(stripslashes($ccc_options['publisherCC'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['publisherCC'])); ?>" size="50" />
                                </td>
                            </tr>
                            <tr class="description">
                                <td colspan="2">
                                    <p><?php _e('The country code of the country that determines legislation of reference. Commonly, this corresponds to the country in which the publisher’s business entity is established.', 'cookie-control'); ?></p>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[dropDowns]"><?php _e('Dropdowns', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="radio" class="first cookiecontrol_settings_iab_v9" name="cookiecontrol_settings[dropDowns]" id="cookiecontrol_settings[dropDowns]" value="true" <?php if (isset($ccc_options['dropDowns'])) : checked('true', $ccc_options['dropDowns']);
                                                                                                                                                                                                    endif; ?> /><?php _e('True', 'cookie-control'); ?>
                                    <input type="radio" class="cookiecontrol_settings_iab_v9" name="cookiecontrol_settings[dropDowns]" id="cookiecontrol_settings[dropDowns]" value="false" <?php if (isset($ccc_options['dropDowns'])) :  checked('false', $ccc_options['dropDowns']);
                                                                                                                                                                                            else : ?> checked <?php endif; ?> /><?php _e('False', 'cookie-control'); ?>
                                </td>
                            </tr>
                            <tr class="description">
                                <td colspan="2">
                                    <p> <?php _e('If set to true, Purposes, Special Purposes, Features and Special Features will be hidden by default so that the interface is more concise. The user will be able to see them after expanding the corresponding drop down.', 'cookie-control'); ?></p>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[fullLegalDescriptions]"><?php _e('Full Legal Descriptions', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="radio" class="first cookiecontrol_settings_iab_v9" name="cookiecontrol_settings[fullLegalDescriptions]" id="cookiecontrol_settings[fullLegalDescriptions]" value="true" <?php if (isset($ccc_options['fullLegalDescriptions'])) : checked('true', $ccc_options['fullLegalDescriptions']);
                                                                                                                                                                                                                            else : ?> checked <?php endif; ?> /><?php _e('True', 'cookie-control'); ?>
                                    <input type="radio" class="cookiecontrol_settings_iab_v9" name="cookiecontrol_settings[fullLegalDescriptions]" id="cookiecontrol_settings[fullLegalDescriptions]" value="false" <?php if (isset($ccc_options['fullLegalDescriptions'])) :  checked('false', $ccc_options['fullLegalDescriptions']);
                                                                                                                                                                                                                    endif; ?> /><?php _e('False', 'cookie-control'); ?>
                                </td>
                            </tr>
                            <tr class="description">
                                <td colspan="2">
                                    <p> <?php _e('If set to true, the full legal description for each Purpose or Feature will be shown, otherwise it will be hidden and the user can see them after expanding the corresponding drop down.', 'cookie-control'); ?></p>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[saveOnlyOnClose]"><?php _e('Save Only On Close', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="radio" class="first cookiecontrol_settings_iab_v9" name="cookiecontrol_settings[saveOnlyOnClose]" id="cookiecontrol_settings[saveOnlyOnClose]" value="true" <?php if (isset($ccc_options['saveOnlyOnClose'])) : checked('true', $ccc_options['saveOnlyOnClose']);
                                                                                                                                                                                                                endif; ?> /><?php _e('True', 'cookie-control'); ?>
                                    <input type="radio" class="cookiecontrol_settings_iab_v9" name="cookiecontrol_settings[saveOnlyOnClose]" id="cookiecontrol_settings[saveOnlyOnClose]" value="false" <?php if (isset($ccc_options['saveOnlyOnClose'])) :  checked('false', $ccc_options['saveOnlyOnClose']);
                                                                                                                                                                                                        else : ?> checked <?php endif; ?> /><?php _e('False', 'cookie-control'); ?>
                                </td>
                            </tr>
                            <tr class="description">
                                <td colspan="2">
                                    <p> <?php _e('Cookie Control will wait until the user closes the widget before saving the consent, rather than doing so every time the user toggles a purpose on or off.', 'cookie-control'); ?></p>
                                </td>
                            </tr>

                        </table>
                        <hr />
                        <h2><?php _e('IAB Text Object', 'cookie-control'); ?></h2>
                        <p><?php _e('You may also configure the text used to introduce the IAB  panels via the iabCMP object, within the main text object.', 'cookie-control'); ?></p>
                        <table class="form-table">
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabPanelTitle]"><?php _e('Panel Title', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabPanelTitle]" id="cookiecontrol_settings[iabPanelTitle]" value="<?php echo !empty($ccc_options['iabPanelTitle']) ?  esc_html(stripslashes($ccc_options['iabPanelTitle'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabPanelTitle'])); ?>" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabPanelIntro]"><?php _e('Panel Intro 1', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <?php wp_editor(stripslashes($ccc_options['iabPanelIntro']), 'cookiecontrol_settings_iabPanelIntro',  $settings = array('media_buttons' => false, 'textarea_name' => 'cookiecontrol_settings[iabPanelIntro]', 'tinymce' => false, 'quicktags' => array("buttons" => "strong,em,ul,ol,li,link"))); ?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabPanelIntro2]"><?php _e('Panel Intro 2', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <?php wp_editor(stripslashes($ccc_options['iabPanelIntro2']), 'cookiecontrol_settings_iabPanelIntro2',  $settings = array('media_buttons' => false, 'textarea_name' => 'cookiecontrol_settings[iabPanelIntro2]', 'tinymce' => false, 'quicktags' => array("buttons" => "strong,em,ul,ol,li,link"))); ?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabPanelIntro3]"><?php _e('Panel Intro 3', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <?php wp_editor(stripslashes($ccc_options['iabPanelIntro3']), 'cookiecontrol_settings_iabPanelIntro3',  $settings = array('media_buttons' => false, 'textarea_name' => 'cookiecontrol_settings[iabPanelIntro3]', 'tinymce' => false, 'quicktags' => array("buttons" => "strong,em,ul,ol,li,link"))); ?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabAboutIab]"><?php _e('About Iab', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <?php wp_editor(stripslashes($ccc_options['iabAboutIab']), 'cookiecontrol_settings_iabAboutIab',  $settings = array('media_buttons' => false, 'textarea_name' => 'cookiecontrol_settings[iabAboutIab]', 'tinymce' => false, 'quicktags' => array("buttons" => "strong,em,ul,ol,li,link"))); ?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabIabName]"><?php _e('Iab Name', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabIabName]" id="cookiecontrol_settings[iabIabName]" value="<?php echo !empty($ccc_options['iabIabName']) ?  esc_html(stripslashes($ccc_options['iabIabName'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabIabName'])); ?>" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabIabLink]"><?php _e('Iab Link', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="url" name="cookiecontrol_settings[iabIabLink]" id="cookiecontrol_settings[iabIabLink]" value="<?php echo !empty($ccc_options['iabIabLink']) ?  esc_html(stripslashes($ccc_options['iabIabLink'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabIabLink'])); ?>" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabVendorTitle]"><?php _e('Vendors', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabVendorTitle]" id="cookiecontrol_settings[iabVendorTitle]" value="<?php echo !empty($ccc_options['iabVendorTitle']) ?  esc_html(stripslashes($ccc_options['iabVendorTitle'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabVendorTitle'])); ?>" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabPurposes]"><?php _e('Purposes', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabPurposes]" id="cookiecontrol_settings[iabPurposes]" value="<?php echo !empty($ccc_options['iabPurposes']) ?  esc_html(stripslashes($ccc_options['iabPurposes'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabPurposes'])); ?>" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabSpecialPurposes]"><?php _e('SpecialPurposes', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabSpecialPurposes]" id="cookiecontrol_settings[iabSpecialPurposes]" value="<?php echo !empty($ccc_options['iabSpecialPurposes']) ?  esc_html(stripslashes($ccc_options['iabSpecialPurposes'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabSpecialPurposes'])); ?>" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabFeatures]"><?php _e('Features', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabFeatures]" id="cookiecontrol_settings[iabFeatures]" value="<?php echo !empty($ccc_options['iabFeatures']) ?  esc_html(stripslashes($ccc_options['iabFeatures'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabFeatures'])); ?>" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabSpecialFeatures]"><?php _e('SpecialFeatures', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabSpecialFeatures]" id="cookiecontrol_settings[iabSpecialFeatures]" value="<?php echo !empty($ccc_options['iabSpecialFeatures']) ?  esc_html(stripslashes($ccc_options['iabSpecialFeatures'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabSpecialFeatures'])); ?>" size="60" />
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabPurposeLegitimateInterest]"><?php _e('Purpose Legitimate Interest', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabPurposeLegitimateInterest]" id="cookiecontrol_settings[iabPurposeLegitimateInterest]" value="<?php echo !empty($ccc_options['iabPurposeLegitimateInterest']) ?  esc_html(stripslashes($ccc_options['iabPurposeLegitimateInterest'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabPurposeLegitimateInterest'])); ?>" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabVendorLegitimateInterest]"><?php _e('Vendor Legitimate Interest', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabVendorLegitimateInterest]" id="cookiecontrol_settings[iabVendorLegitimateInterest]" value="<?php echo !empty($ccc_options['iabVendorLegitimateInterest']) ?  esc_html(stripslashes($ccc_options['iabVendorLegitimateInterest'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabVendorLegitimateInterest'])); ?>" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabRelyConsent]"><?php _e('Rely Consent', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabRelyConsent]" id="cookiecontrol_settings[iabRelyConsent]" value="<?php echo !empty($ccc_options['iabRelyConsent']) ?  esc_html(stripslashes($ccc_options['iabRelyConsent'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabRelyConsent'])); ?>" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabRelyLegitimateInterest]"><?php _e('Rely Legitimate Interest', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabRelyLegitimateInterest]" id="cookiecontrol_settings[iabRelyLegitimateInterest]" value="<?php echo !empty($ccc_options['iabRelyLegitimateInterest']) ?  esc_html(stripslashes($ccc_options['iabRelyLegitimateInterest'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabRelyLegitimateInterest'])); ?>" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabAcceptAll]"><?php _e('Accept All', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabAcceptAll]" id="cookiecontrol_settings[iabAcceptAll]" value="<?php echo !empty($ccc_options['iabAcceptAll']) ?  esc_html(stripslashes($ccc_options['iabAcceptAll'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabAcceptAll'])); ?>" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabRejectAll]"><?php _e('Reject All', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabRejectAll]" id="cookiecontrol_settings[iabRejectAll]" value="<?php echo !empty($ccc_options['iabRejectAll']) ?  esc_html(stripslashes($ccc_options['iabRejectAll'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabRejectAll'])); ?>" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabDataUse]"><?php _e('Data Use Text', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabDataUse]" id="cookiecontrol_settings[iabDataUse]" value="<?php echo !empty($ccc_options['iabDataUse']) ?  esc_html(stripslashes($ccc_options['iabDataUse'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabDataUse'])); ?>" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabSavePreferences]"><?php _e('Save Preferences Text', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabSavePreferences]" id="cookiecontrol_settings[iabSavePreferences]" value="<?php echo !empty($ccc_options['iabSavePreferences']) ?  esc_html(stripslashes($ccc_options['iabSavePreferences'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabSavePreferences'])); ?>" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabLegalDescription]"><?php _e('Legal Description', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabLegalDescription]" id="cookiecontrol_settings[iabLegalDescription]" value="<?php echo !empty($ccc_options['iabLegalDescription']) ?  esc_html(stripslashes($ccc_options['iabLegalDescription'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabLegalDescription'])); ?>" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabCookieMaxAge]"><?php _e('Cookie Max-Age', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabCookieMaxAge]" id="cookiecontrol_settings[iabCookieMaxAge]" value="<?php echo !empty($ccc_options['iabCookieMaxAge']) ?  esc_html(stripslashes($ccc_options['iabCookieMaxAge'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabCookieMaxAge'])); ?>" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabUsesNonCookieAccessTrue]"><?php _e('Uses Non Cookie Access True', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabUsesNonCookieAccessTrue]" id="cookiecontrol_settings[iabUsesNonCookieAccessTrue]" value="<?php echo !empty($ccc_options['iabUsesNonCookieAccessTrue']) ?  esc_html(stripslashes($ccc_options['iabUsesNonCookieAccessTrue'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabUsesNonCookieAccessTrue'])); ?>" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabUsesNonCookieAccessFalse]"><?php _e('Uses Non Cookie Access False', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabUsesNonCookieAccessFalse]" id="cookiecontrol_settings[iabUsesNonCookieAccessFalse]" value="<?php echo !empty($ccc_options['iabUsesNonCookieAccessFalse']) ?  esc_html(stripslashes($ccc_options['iabUsesNonCookieAccessFalse'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabUsesNonCookieAccessFalse'])); ?>" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabStorageDisclosures]"><?php _e('Storage Disclosures', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabStorageDisclosures]" id="cookiecontrol_settings[iabStorageDisclosures]" value="<?php echo !empty($ccc_options['iabStorageDisclosures']) ?  esc_html(stripslashes($ccc_options['iabStorageDisclosures'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabStorageDisclosures'])); ?>" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabDisclosureDetailsColumn]"><?php _e('Disclosure Details Column', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabDisclosureDetailsColumn]" id="cookiecontrol_settings[iabDisclosureDetailsColumn]" value="<?php echo !empty($ccc_options['iabDisclosureDetailsColumn']) ?  esc_html(stripslashes($ccc_options['iabDisclosureDetailsColumn'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabDisclosureDetailsColumn'])); ?>" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabDisclosurePurposesColumn]"><?php _e('Disclosure Purposes Column', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabDisclosurePurposesColumn]" id="cookiecontrol_settings[iabDisclosurePurposesColumn]" value="<?php echo !empty($ccc_options['iabDisclosurePurposesColumn']) ?  esc_html(stripslashes($ccc_options['iabDisclosurePurposesColumn'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabDisclosurePurposesColumn'])); ?>" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabSeconds]"><?php _e('Seconds', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabSeconds]" id="cookiecontrol_settings[iabSeconds]" value="<?php echo !empty($ccc_options['iabSeconds']) ?  esc_html(stripslashes($ccc_options['iabSeconds'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabSeconds'])); ?>" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabMinutes]"><?php _e('Minutes', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabMinutes]" id="cookiecontrol_settings[iabMinutes]" value="<?php echo !empty($ccc_options['iabMinutes']) ?  esc_html(stripslashes($ccc_options['iabMinutes'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabMinutes'])); ?>" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabHours]"><?php _e('Hours', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabHours]" id="cookiecontrol_settings[iabHours]" value="<?php echo !empty($ccc_options['iabHours']) ?  esc_html(stripslashes($ccc_options['iabHours'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabHours'])); ?>" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabDays]"><?php _e('Days', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabDays]" id="cookiecontrol_settings[iabDays]" value="<?php echo !empty($ccc_options['iabDays']) ?  esc_html(stripslashes($ccc_options['iabDays'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabDays'])); ?>" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabGoogleVendors]"><?php _e('Google Vendors', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabGoogleVendors]" id="cookiecontrol_settings[iabGoogleVendors]" value="<?php echo !empty($ccc_options['iabGoogleVendors']) ?  esc_html(stripslashes($ccc_options['iabGoogleVendors'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabGoogleVendors'])); ?>" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabGoogleVendorInformation]"><?php _e('Google Vendor Information', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabGoogleVendorInformation]" id="cookiecontrol_settings[iabGoogleVendorInformation]" value="<?php echo !empty($ccc_options['iabGoogleVendorInformation']) ?  esc_html(stripslashes($ccc_options['iabGoogleVendorInformation'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabGoogleVendorInformation'])); ?>" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabVendorDataUses]"><?php _e('Vendor Data Uses', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabVendorDataUses]" id="cookiecontrol_settings[iabVendorDataUses]" value="<?php echo !empty($ccc_options['iabVendorDataUses']) ?  esc_html(stripslashes($ccc_options['iabVendorDataUses'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabVendorDataUses'])); ?>" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabDataRetention]"><?php _e('Data Retention', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabDataRetention]" id="cookiecontrol_settings[iabDataRetention]" value="<?php echo !empty($ccc_options['iabDataRetention']) ?  esc_html(stripslashes($ccc_options['iabDataRetention'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabDataRetention'])); ?>" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabPrivacy]"><?php _e('Privacy', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabPrivacy]" id="cookiecontrol_settings[iabPrivacy]" value="<?php echo !empty($ccc_options['iabPrivacy']) ?  esc_html(stripslashes($ccc_options['iabPrivacy'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabPrivacy'])); ?>" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabLiClaims]"><?php _e('Li Claims', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabLiClaims]" id="cookiecontrol_settings[iabLiClaims]" value="<?php echo !empty($ccc_options['iabLiClaims']) ?  esc_html(stripslashes($ccc_options['iabLiClaims'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabLiClaims'])); ?>" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabVendorCount]"><?php _e('Vendor Count', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabVendorCount]" id="cookiecontrol_settings[iabVendorCount]" value="<?php echo !empty($ccc_options['iabVendorCount']) ?  esc_html(stripslashes($ccc_options['iabVendorCount'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabVendorCount'])); ?>" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabIllustrationsDescription]"><?php _e('Illustrations Description', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabIllustrationsDescription]" id="cookiecontrol_settings[iabIllustrationsDescription]" value="<?php echo !empty($ccc_options['iabIllustrationsDescription']) ?  esc_html(stripslashes($ccc_options['iabIllustrationsDescription'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabIllustrationsDescription'])); ?>" size="60" />
                                </td>
                            </tr>
                        </table>
                        <hr />
                        <h2><?php _e('IAB Vendor Options', 'cookie-control'); ?></h2>
                        <p><?php _e('An emphasis of TCF v2.2 is to allow site owners (Publishers) the ability to limit the number of vendors detailed by the CMP and avoid requesting user’s consent for Vendors that operate in technical environments and jurisdictions that are not relevant to their online services.', 'cookie-control'); ?></p>
                        <p><?php _e('You can set the territorial scopes, environments and service types you are interested in and click calculate vendors button to find all vendors operating within these parameters and create the array of their ids for you.', 'cookie-control'); ?></p>
                        <div id="iab-generate-vendors">
                            <fieldset class="fieldset-group">
                                <legend class="fieldset-legend"><?php _e('Territorial Scope', 'cookie-control'); ?></legend>
                                <div class="fieldset-group-inside">
                                    <?php $territorial_checkboxes = [
                                        ["value" => "BE", "name" => "territory-BE", "label" => "BE - Belgium"],
                                        ["value" => "BG", "name" => "territory-BG", "label" => "BG - Bulgaria"],
                                        ["value" => "CZ", "name" => "territory-CZ", "label" => "CZ - Czech Republic"],
                                        ["value" => "DK", "name" => "territory-DK", "label" => "DK - Denmark"],
                                        ["value" => "DE", "name" => "territory-DE", "label" => "DE - Germany"],
                                        ["value" => "EE", "name" => "territory-EE", "label" => "EE - Estonia"],
                                        ["value" => "IE", "name" => "territory-IE", "label" => "IE - Ireland"],
                                        ["value" => "GR", "name" => "territory-GR", "label" => "GR - Greece"],
                                        ["value" => "ES", "name" => "territory-ES", "label" => "ES - Spain"],
                                        ["value" => "FR", "name" => "territory-FR", "label" => "FR - France"],
                                        ["value" => "HR", "name" => "territory-HR", "label" => "HR - Croatia"],
                                        ["value" => "IS", "name" => "territory-IS", "label" => "IS - Iceland"],
                                        ["value" => "IT", "name" => "territory-IT", "label" => "IT - Italy"],
                                        ["value" => "CY", "name" => "territory-CY", "label" => "CY - Cyprus"],
                                        ["value" => "LV", "name" => "territory-LV", "label" => "LV - Latvia"],
                                        ["value" => "LI", "name" => "territory-LI", "label" => "LI - Liechtenstein"],
                                        ["value" => "LT", "name" => "territory-LT", "label" => "LT - Lithuania"],
                                        ["value" => "LU", "name" => "territory-LU", "label" => "LU - Luxembourg"],
                                        ["value" => "HU", "name" => "territory-HU", "label" => "HU - Hungary"],
                                        ["value" => "MT", "name" => "territory-MT", "label" => "MT - Malta"],
                                        ["value" => "NL", "name" => "territory-NL", "label" => "NL - The Netherlands"],
                                        ["value" => "NO", "name" => "territory-NO", "label" => "NO - Norway"],
                                        ["value" => "AT", "name" => "territory-AT", "label" => "AT - Austria"],
                                        ["value" => "PL", "name" => "territory-PL", "label" => "PL - Poland"],
                                        ["value" => "PT", "name" => "territory-PT", "label" => "PT - Portugal"],
                                        ["value" => "RO", "name" => "territory-RO", "label" => "RO - Romania"],
                                        ["value" => "SI", "name" => "territory-SI", "label" => "SI - Slovenia"],
                                        ["value" => "SK", "name" => "territory-SK", "label" => "SK - Slovakia"],
                                        ["value" => "FI", "name" => "territory-FI", "label" => "FI - Finland"],
                                        ["value" => "SE", "name" => "territory-SE", "label" => "SE - Sweden"],
                                        ["value" => "CH", "name" => "territory-CH", "label" => "CH - Switzerland"],
                                        ["value" => "GB", "name" => "territory-GB", "label" => "GB - United Kingdom"]
                                    ];
                                    foreach ($territorial_checkboxes as $checkbox) : ?>
                                        <div class="fieldset-input-wrapper">
                                            <input type="checkbox" class="territorial-scope-input fieldset-input" id="<?php echo esc_attr($checkbox['name']); ?>" name="<?php echo esc_attr($checkbox['name']); ?>" value="<?php echo esc_attr($checkbox['value']); ?>">
                                            <label for="<?php echo esc_attr($checkbox['name']); ?>" class="territorial-scope-label fieldset-label"><?php esc_html_e($checkbox['label'], 'cookie-control'); ?></label>
                                        </div>
                                    <?php
                                    endforeach;
                                    ?>
                                </div>
                            </fieldset>
                            <fieldset class="fieldset-group">
                                <legend class="fieldset-legend"><?php _e('Enviroments', 'cookie-control'); ?></legend>
                                <div class="fieldset-group-inside">
                                    <?php $environment_checkboxes = [
                                        ["value" => "Web", "name" => "environment-Web", "label" => "Web"],
                                        ["value" => "Native App (Mobile)", "name" => "environment-Native-App-Mobile", "label" => "Native App (Mobile)"],
                                        ["value" => "Native App (CTV)", "name" => "environment-Native-App-CTV", "label" => "Native App (CTV)"],
                                        ["value" => "Other", "name" => "environment-Other", "label" => "Other"]
                                    ];
                                    foreach ($environment_checkboxes as $checkbox) : ?>
                                        <div class="fieldset-input-wrapper">
                                            <input type="checkbox" class="environment-input fieldset-input" id="<?php echo esc_attr($checkbox['name']); ?>" name="<?php echo esc_attr($checkbox['name']); ?>" value="<?php echo esc_attr($checkbox['value']); ?>">
                                            <label for="<?php echo esc_attr($checkbox['name']); ?>" class="environment-label fieldset-label"><?php esc_html_e($checkbox['label'], 'cookie-control'); ?></label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </fieldset>

                            <fieldset class="fieldset-group">
                                <legend class="fieldset-legend"><?php _e('Service Types', 'cookie-control'); ?></legend>
                                <div class="fieldset-group-inside">
                                    <?php $service_checkboxes = [
                                        ["value" => "SSP", "name" => "service-SSP", "label" => "SSP"],
                                        ["value" => "DSP", "name" => "service-DSP", "label" => "DSP"],
                                        ["value" => "Verification Tool", "name" => "service-Verification", "label" => "Verification"],
                                        ["value" => "Ad Serving", "name" => "service-ad-serving", "label" => "Ad serving"],
                                        ["value" => "Header Bidding Service", "name" => "service-Header bidding", "label" => "Header bidding service"],
                                        ["value" => "DMP / Data provider", "name" => "service-DMP-data-provider", "label" => "DMP / Data provider"],
                                        ["value" => "Identity resolution service", "name" => "service-identity-resolution-services", "label" => "Identity resolution service"],
                                        ["value" => "Content delivery network", "name" => "service-content-delivery-network", "label" => "Content delivery network"],
                                        ["value" => "Recommendation service", "name" => "service-recommendation-service", "label" => "Recommendation service"],
                                        ["value" => "Website analytics", "name" => "service-website-analytics", "label" => "Website analytics"],
                                        ["value" => "Buyer", "name" => "service-buyer", "label" => "Buyer"],
                                        ["value" => "Campaign Analytics", "name" => "service-campaign-analytics", "label" => "Campaign Analytics"],
                                        ["value" => "Audience analytics", "name" => "service-audience-analytics", "label" => "Audience analytics"],
                                        ["value" => "Other", "name" => "service-Other", "label" => "Other"]
                                    ];
                                    foreach ($service_checkboxes as $checkbox) : ?>
                                        <div class="fieldset-input-wrapper">
                                            <input type="checkbox" class="service-input fieldset-input" id="<?php echo esc_attr($checkbox['name']); ?>" name="<?php echo esc_attr($checkbox['name']); ?>" value="<?php echo esc_attr($checkbox['value']); ?>">
                                            <label for="<?php echo esc_attr($checkbox['name']); ?>" class="service-label fieldset-label"><?php esc_html_e($checkbox['label'], 'cookie-control'); ?></label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </fieldset>
                            <button id="ccc_calculate_vendors_button" class="button-primary"><?php _e('Calculate Vendors', 'cookie-control') ?></button>
                            <p class="iab-include-vendors-error hide"><?php _e('You should choose at least one value.', 'cookie-control'); ?></p>
                            <p class="iab-include-vendors-text hide"><?php _e('The selections used would require the following property value and seek consent for', 'cookie-control'); ?> <span class="iab-include-vendors-span"></span></p>
                        </div>
                        <table class="form-table">
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabIncludeVendors]"><?php _e('Include Vendors', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" class="iab-include-vendors" name="cookiecontrol_settings[iabIncludeVendors]" id="cookiecontrol_settings[iabIncludeVendors]" value="<?php echo !empty($ccc_options['iabIncludeVendors']) ?  esc_html(stripslashes($ccc_options['iabIncludeVendors'])) : null;  ?>" placeholder='Expects a list of vendors ids (strings), ie: ["1","2"]' size="60" />
                                </td>
                            </tr>
                        </table>
                        <p><?php _e('You can give mannualy your list of vendors ids to the input Include Vendors, (strings) ie: ["1","2"]', 'cookie-control'); ?></p>
                    </div>
                </div>
            </div>
            <!-- Submit -->
            <p class="submit">
                <input type="hidden" id="ccc_api_version_form_submit" name="ccc_form_submit" value="v9">
                <button type="submit" id="ccc_save_form_submit" class="button-primary"><?php _e('Save Settings', 'cookie-control') ?></button>
            </p>
        </form>

        <!-- The Reset Option -->
        <form method="post" id="form-reset-main" action="options.php">
            <?php settings_fields($this->plugin_name);
            do_settings_sections('civic_cookiecontrol_settings_v9');
            $ccc_cookiecontrol_defaults = $ccc_cookiecontrol_settings_defaults_ins; // use the defaults
            if (get_option('civic_cookiecontrol_settings_v9')) {
                $ccc_options = get_option('civic_cookiecontrol_settings_v9');
            } elseif (get_option($this->plugin_name)) { // check if option civic_cookiecontrol_settings exists , for backward compatibility
                $ccc_options = get_option($this->plugin_name);
            } ?>

            <input type="hidden" name="cookiecontrol_settings[apiKey]" value="<?php echo isset($ccc_options['apiKey']) ?  $ccc_options['apiKey'] : ""; ?>" />
            <input type="hidden" name="cookiecontrol_settings_api_key_version" value="<?php echo isset($ccc_options_apikey_version) ?  $ccc_options_apikey_version : ''  ?>" />

            <?php foreach ((array)$ccc_cookiecontrol_defaults as $key => $value) : ?>
                <input type="hidden" name="cookiecontrol_settings[<?php echo $key; ?>]" value="<?php echo $value; ?>" />
            <?php endforeach; ?>
            <input type="hidden" name="cookiecontrol_settings[update]" value="RESET" />
            <input type="hidden" name="ccc_form_submit" value="v9">
            <button type="submit" class="button"><?php _e('Reset Settings', 'cookie-control') ?></button>
        </form>
        <!-- End Reset Option -->
    </div>
</div><!-- End of Plugin Option Page Container -->