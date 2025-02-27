<?php

if(get_option($this->plugin_name)){

    $ccc_options = get_option($this->plugin_name);


}elseif(get_option('cookiecontrol_settings')){ // check if option cookiecontrol_settings exists , for backward compatibility

    $ccc_options = get_option('cookiecontrol_settings');

}elseif(get_option('civic_cookiecontrol_settings_v9')){

    $ccc_options = get_option('civic_cookiecontrol_settings_v9');

    require_once ('ccc_unwanted_v8_fields.php');

    foreach ($ccc_unwanted_fields_for_v8  as $ccc_remove_for_v8){
        if(isset($ccc_options[$ccc_remove_for_v8])){
            unset($ccc_options[$ccc_remove_for_v8]);
        }
    }
    if ( !empty( $ccc_options['altLanguages'] ) ) :
        foreach ($ccc_options['altLanguages'] as $key => $val ) :
            unset(  $ccc_options['altLanguagesMode'][$key] );
        endforeach;
    endif;

    update_option($this->plugin_name, $ccc_options );

    $ccc_options = get_option($this->plugin_name);

}else{

    $ccc_options = $ccc_cookiecontrol_settings_defaults_ins;
}

?>

<div class="ccc-container ccc-notice-group">
    <?php
    if ( !empty( $ccc_options['optionalCookiesName'] ) ) {
        $check_previous_opt_link="";
        foreach ($ccc_options['optionalCookiesName'] as $key => $val) {
            if (isset($ccc_options['optionalCookiesthirdPartyCookies'][$key]) &&  !isset( $ccc_options['optionalCookiesthirdPartyCookiesName'][$key]) &&  !isset( $ccc_options['optionalCookiesthirdPartyCookiesUrl'][$key])) { ?>
                <?php  $check_previous_opt_link = true; ?>
            <?php }
        }
        if($check_previous_opt_link){ ?>
            <div class="ccc-warning-popup-wrapper">
                <div class="warning warning-popup">
                    <a href="#" class="warning-close-popup"><div class="dashicons dashicons-dismiss"><span class="screen-reader-text"><?php _e('Remove', 'cookie-control'); ?></span></div></a>
                    <p><?php _e('Because of the core structure update you  have to re assign the third party cookies inside each accordion
                           cookie category. Users with version prior to 1.6 should review all settings and select values for newly created configuration options.','cookie-control'); ?></p>
                </div>
            </div>
        <?php }
    }?>
    <header>
        <h1>
            <a href="https://www.civicuk.com/cookie-control" title="<?php _e('Cookie Control by Civic','cookie-control'); ?>" target="_blank"><?php _e('Cookie Control by Civic','cookie-control'); ?></a>
        </h1>
    </header>

    <hr>

    <div>
        <p><?php _e('With an elegant  user-interface that doesn\'t hurt the look and feel of your site, Cookie Control is a mechanism for controlling user consent for the use of cookies on their computer.','cookie-control'); ?></p>
        <p><?php _e('For more information, please visit Civic\'s Cookie Control pages at:','cookie-control'); ?> <a href="https://www.civicuk.com/cookie-control" title="Cookie Control by Civic" target="_blank">https://www.civicuk.com/cookie-control</a></p>
        <a class="civic" href="https://www.civicuk.com/cookie-control/download" target="_blank"><?php  ?><?php _e('Get Your API Key','cookie-control'); ?></a>
    </div>

    <div class="wrap">
        <?php 	if (isset($_POST["delete_old_option"]))
        {
            delete_option('cookiecontrol_settings');
        }
        if( get_option($this->plugin_name) &&  get_option('cookiecontrol_settings')){ ?>

            <form method="post" action="#" id="form-delete-old-option">
                <div class="warning warning--delete-option">
                    <div class="dashicons dashicons-warning"><span class="screen-reader-text"><?php _e('warning','cookie-control'); ?></span></div>
                    <?php _e('Delete old option "cookiecontrol_settings" from database ( your current settings will not be lost )',"cookie-control"); ?>
                    <input type="submit" class="button-primary"  value="<?php _e('Delete') ?>" name="delete_old_option">
                </div>
            </form>

        <?php  } ?>

        <?php $this->ccc_cookiecontrol_settings_update_check(); ?>
        <form method="post" action="options.php" id="form-settings-main">

            <?php

            $ccc_curr_url = $_SERVER['SERVER_NAME'];
            $ccc_valid_Api_field='';
            $ccc_api_key_info='';
            $ccc_productVal ='';

            if(isset($ccc_options['apiKey']) && $ccc_options['apiKey']!=""){
                $ccc_api_key_info = $this->ccc_get_api_civic($ccc_curr_url, trim( $ccc_options['apiKey'] ) );

                if (isset($ccc_api_key_info['valid']) && $ccc_api_key_info['valid'] ){
                    $ccc_valid_Api_field='valid';
                    if($ccc_api_key_info['product']=='CookieControl Multi-Site'){
                        $ccc_productVal='PRO_MULTISITE';
                    }elseif($ccc_api_key_info['product']=='CookieControl Single-Site'){
                        $ccc_productVal='PRO';
                    }elseif($ccc_api_key_info['product']=='CookieControl Free'){
                        $ccc_productVal='COMMUNITY';
                    }
                }
            }
            update_option('civic_cookiecontrol_productval',  $ccc_productVal );

            settings_fields($this->plugin_name);
            do_settings_sections($this->plugin_name);


            $hidden_content_product="";
            $hidden_content_all="";
            $hidden_content_license ="";

            if(($ccc_valid_Api_field=="" || $ccc_options['apiKey']=="") && $ccc_api_key_info!='not respond'){
                $hidden_content_all='hidden_content';
            }
            if((isset($ccc_api_key_info['valid']) && $ccc_api_key_info['product']=='CookieControl Free') ){
                $hidden_content_product='hidden_content';
            }
            ?>

            <input type="hidden" name="cookiecontrol_settings[apiValid]" id="cookiecontrol_settings[apiValid]" value="<?php echo ( !empty($ccc_options['apiKey']) ? $ccc_valid_Api_field : '' ); ?>">
            <!-- API -->
            <h2><?php _e('Your Cookie Control Product Information', 'cookie-control'); ?></h2>
            <table class="form-table">
                <tr>
                    <th scope="row">
                        <label for="cookiecontrol_settings[apikey]"><?php _e('API Key', 'cookie-control'); ?> <span>&#42;</span></label>
                    </th>
                    <td>
                        <input type="text" name="cookiecontrol_settings[apiKey]" id="cookiecontrol_settings[apiKey]" value="<?php echo ( isset($ccc_options['apiKey']) ? esc_html(stripslashes(trim($ccc_options['apiKey']))) : '' ); ?>" size="50" />
                        <?php
                        if(!isset($ccc_options['apiKey']) || $ccc_options['apiKey']==""){ ?>
                            <div class="warning warning--api">
                                <div class="dashicons dashicons-warning"><span class="screen-reader-text"><?php _e('warning','cookie-control'); ?></span></div>
                                <?php printf( __( 'Please fill your API Key. <a class="text-underline" target="_blank" href="%s">Get Your API Key</a>.', 'cookie-control' ), esc_url( 'https://www.civicuk.com/cookie-control/download' )); ?>
                            </div>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><?php _e('Please select your API key version first and then save your settings. After save settings, you can see and edit your settings based on checked version.','cookie-control') ?></td>
                </tr>
                <?php
                $ccc_options_apikey_version = get_option('civic_cookiecontrol_apikey_version') ? get_option('civic_cookiecontrol_apikey_version') : '';
                $ccc_radio_version_api_class  =( isset($ccc_options['apiKey']) && $ccc_options['apiKey']!="") ? 'cookiecontrol_settings_api_key_version' : '';
                ?>
                <tr>
                    <th scope="row">
                        <label for="cookiecontrol_settings_v9_api_key_version"><?php _e('API key version', 'cookie-control'); ?> <span>&#42;</span></label>
                    </th>
                    <td>
                        <input type="radio" class="first <?php echo $ccc_radio_version_api_class; ?>" name="cookiecontrol_settings_api_key_version" id="ccc_radio_api_key_version_v8" value="v8" <?php checked('v8', ( isset( $ccc_options_apikey_version) ?  $ccc_options_apikey_version : '' )); ?> /><?php _e('Version 8', 'cookie-control'); ?>
                        <input type="radio" class="<?php echo $ccc_radio_version_api_class; ?>" name="cookiecontrol_settings_api_key_version" id="ccc_radio_api_key_version_v9" value="v9" <?php checked('v9', ( isset( $ccc_options_apikey_version) ?  $ccc_options_apikey_version : '' )); ?> /><?php _e('Version 9', 'cookie-control'); ?>
                    </td>
                </tr>

                <?php

                if( ( $ccc_api_key_info=='not respond' || isset($ccc_api_key_info['valid']) &&  !$ccc_api_key_info['valid'] ) || ( isset($ccc_options['apiKey']) && $ccc_options['apiKey']!="" &&  $ccc_valid_Api_field!='valid') ){

                    $hidden_content_all="";

                    if((isset($ccc_options['product']) && $ccc_options['product']=='COMMUNITY') ){
                        $hidden_content_product='hidden_content';
                    }
                    ?>
                    <tr>
                        <th scope="row">
                            <label for="cookiecontrol_settings[product]"><?php _e('Product License Type', 'cookie-control'); ?> <span>&#42;</span></label>
                        </th>
                        <td>
                            <input type="radio" class="first com-check" name="cookiecontrol_settings[product]" value="COMMUNITY" <?php checked('COMMUNITY', ( isset($ccc_options['product']) ? $ccc_options['product'] : '' )); ?> /><?php _e('Community Edition', 'cookie-control'); ?>
                            <input type="radio" class="pro-check" name="cookiecontrol_settings[product]" value="PRO" <?php checked('PRO', ( isset($ccc_options['product']) ? $ccc_options['product'] : ' ' )); ?> /><?php _e('Pro Edition', 'cookie-control'); ?>
                            <input type="radio"  class="multi-check" name="cookiecontrol_settings[product]" value="PRO_MULTISITE" <?php checked('PRO_MULTISITE', ( isset($ccc_options['product']) ? $ccc_options['product'] : '' )); ?> /><?php _e('Multisite Pro Edition', 'cookie-control'); ?>
                        </td>
                    </tr>
                <?php } else{  ?>

                    <tr class="<?php  echo  $hidden_content_all; ?>">
                        <th scope="row">
                            <label for="cookiecontrol_settings[product]"><?php _e('Product License Type', 'cookie-control'); ?> <span>&#42;</span></label>
                        </th>
                        <td>
                            <span><input type="radio" class="first community-check" name="cookiecontrol_settings[product]" value="COMMUNITY" <?php  if(isset($ccc_api_key_info['product']) && $ccc_api_key_info['product']=="CookieControl Free" ){ ?> checked <?php }else{ ?> disabled <?php }?> /> <?php _e('Community Edition', 'cookie-control'); ?></span>
                            <span><input type="radio" name="cookiecontrol_settings[product]" value="PRO" <?php  if(isset($ccc_api_key_info['product']) &&  $ccc_api_key_info['product']=="CookieControl Single-Site" ){ ?> checked <?php }else{ ?> disabled <?php }?> /> <?php _e('Pro Edition', 'cookie-control'); ?></span>
                            <span> <input type="radio" name="cookiecontrol_settings[product]" value="PRO_MULTISITE"  <?php  if(isset($ccc_api_key_info['product']) &&  $ccc_api_key_info['product']=="CookieControl Multi-Site" ){ ?> checked <?php }else{ ?> disabled <?php }?> /><?php _e('Multisite Pro Edition', 'cookie-control'); ?></span>
                        </td>
                    </tr>

                <?php } ?>

                <tr class="<?php  echo  $hidden_content_all; ?>">
                    <th scope="row">
                        <label for="cookiecontrol_settings[logConsent]"><?php _e('Log Consent', 'cookie-control'); ?> <span>&#42;</span></label>
                    </th>
                    <td>
                        <input type="radio" class="first" name="cookiecontrol_settings[logConsent]" value="false" <?php checked('false', ( isset($ccc_options['logConsent']) ? $ccc_options['logConsent'] : '' )); ?> /><?php _e('No', 'cookie-control'); ?>
                        <input type="radio" name="cookiecontrol_settings[logConsent]" value="true" <?php checked('true', ( isset($ccc_options['logConsent']) ? $ccc_options['logConsent'] : '' )); ?> /><?php _e('Yes', 'cookie-control'); ?>
                    </td>
                </tr>
                <tr class="<?php  echo  $hidden_content_all; ?>">
                    <th scope="row">
                        <label for="cookiecontrol_settings[encodeCookie]"><?php _e('Encode Cookie', 'cookie-control'); ?></label>
                    </th>
                    <td>
                        <input type="radio" class="first" name="cookiecontrol_settings[encodeCookie]" id="cookiecontrol_settings[encodeCookie]" value="true" <?php if(isset($ccc_options['encodeCookie'])) : checked('true', $ccc_options['encodeCookie']); endif; ?>/><?php _e('True', 'cookie-control'); ?>
                        <input type="radio" name="cookiecontrol_settings[encodeCookie]" id="cookiecontrol_settings[encodeCookie]" value="false" <?php  if(isset($ccc_options['encodeCookie'])) :  checked('false', $ccc_options['encodeCookie']);  else : ?> checked <?php endif; ?> /><?php _e('False', 'cookie-control'); ?>
                    </td>
                </tr>
                <tr class="<?php  echo  $hidden_content_all; ?>">
                    <th scope="row">
                        <label for="cookiecontrol_settings[subDomains]"><?php _e('Sub Domains', 'cookie-control'); ?></label>
                    </th>
                    <td>
                        <input type="radio" class="first" name="cookiecontrol_settings[subDomains]" id="cookiecontrol_settings[subDomains]" value="true" <?php if(isset($ccc_options['subDomains'])) : checked('true', $ccc_options['subDomains']);  else : ?> checked <?php endif; ?>/><?php _e('True', 'cookie-control'); ?>
                        <input type="radio" name="cookiecontrol_settings[subDomains]" id="cookiecontrol_settings[subDomains]" value="false" <?php  if(isset($ccc_options['subDomains'])) :  checked('false', $ccc_options['subDomains']);  endif; ?> /><?php _e('False', 'cookie-control'); ?>
                    </td>
                </tr>
            </table>


            <div class="group-down <?php  echo   $hidden_content_all; ?> ">
                <h2 class="additional-title"><?php _e('Additional Settings', 'cookie-control'); ?></h2>

                <hr />

                <div id="cookie-tabs">
                    <ul class="cookie-tabs">
                        <li><h3><a href="#optional"><?php _e('Cookies', 'cookie-control'); ?></a></h3></li>
                        <li><h3><a href="#necessary"><?php _e('Necessary Cookies', 'cookie-control'); ?></a></h3></li>
                        <li><h3><a href="#appearance"><?php _e('Appearance', 'cookie-control'); ?></a></h3></li>
                        <li class="hide-com <?php echo $hidden_content_product ?>"><h3><a href="#branding"><?php _e('Branding', 'cookie-control'); ?></a></h3></li>
                        <li class="hide-com <?php echo $hidden_content_product ?>"><h3><a href="#regional"><?php _e('Regional', 'cookie-control'); ?></a></h3></li>
                        <li><h3><a href="#accessibility"><?php _e('Accessibility', 'cookie-control'); ?></a></h3></li>
                        <li class="hide-com <?php echo $hidden_content_product ?>"><h3><a href="#iab"><?php _e('Iab', 'cookie-control'); ?></a></h3></li>
                    </ul>

                    <div id="optional">
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
                                            <input placeholder="eg. analytics" type="text" name="cookiecontrol_settings[optionalCookiesName]"  id="cookiecontrol_settings[optionalCookiesName]" size="50" />
                                            <a href="#" class="remove removeRow removeRowInside" data-class="optionalCookies" id="removeoptionalCookies"><div class="dashicons dashicons-dismiss"><span class="screen-reader-text"><?php _e('Remove', 'cookie-control'); ?></span></div><div class="delete-cookie"><?php _e('Remove', 'cookie-control'); ?></div></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="cookiecontrol_settings[optionalCookiesLabel]"><?php _e('Cookie label *', 'cookie-control'); ?></label>
                                            <p><?php _e('The descriptive title assigned to the category and displayed by the module.', 'cookie-control'); ?></p>
                                        </th>
                                        <td>
                                            <input placeholder="eg. Analytical Cookies" class="cookie-label-field" type="text" name="cookiecontrol_settings[optionalCookiesLabel]"  id="cookiecontrol_settings[optionalCookiesLabel]" size="50" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="cookiecontrol_settings[optionalCookiesDescription]"><?php _e('Cookie description', 'cookie-control'); ?></label>
                                            <p><?php _e('The full description assigned to the category and displayed by the module.', 'cookie-control'); ?></p>
                                        </th>
                                        <td>
                                            <input placeholder="eg. Analytical cookies help us to improve our website by collecting and reporting information on its usage." type="text" name="cookiecontrol_settings[optionalCookiesDescription]"  id="cookiecontrol_settings[optionalCookiesDescription]" size="50" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="cookiecontrol_settings[optionalCookiesArray]"><?php _e('Cookies', 'cookie-control'); ?></label>
                                            <p><?php _e('The name of the cookies that you wish to protect after a user opts in (comma seperated values ex. \'_ga\', \'_gid\', \'_gat\', \'__utma\').', 'cookie-control'); ?></p>
                                        </th>
                                        <td>
                                            <input type="text" name="cookiecontrol_settings[optionalCookiesArray]"  id="cookiecontrol_settings[optionalCookiesArray]" size="50" />
                                        </td>
                                    </tr>
                                    <tr class="optionalInfoCookies">
                                        <th scope="row">
                                            <label for="cookiecontrol_settings[optionalCookiesthirdPartyCookies]"><?php _e('Third party cookies', 'cookie-control'); ?></label>
                                            <p><?php _e('Only applicable if the category will set third party cookies on acceptance. Each object will consist of the following key-value pairs:', 'cookie-control'); ?></p><ul><li>name : string, (Example: AddThis)</li><li>optOutLink : url string (Example: http://www.addthis.com/privacy/opt-out )</li></ul>
                                        </th>
                                        <td>
                                            <span class=""></span>
                                            <input class="cookieThitdPatyField" placeholder='{"name": "AddThis", "optOutLink": "http://www.addthis.com/privacy/opt-out"}' type="hidden" name="cookiecontrol_settings[optionalCookiesthirdPartyCookies]"  id="cookiecontrol_settings[optionalCookiesthirdPartyCookies]" size="50" />
                                            <br>
                                            <span class="thirdPartyCookiesGroup thirdPartyCookiesGroup-down thirdPartyCookiesGroupVal data-number data-number-pre" data-number="1">
                                            <input placeholder='eg. name' class="optOutLinkNameDynamic" type="text" name="cookiecontrol_settings[optionalCookiesthirdPartyCookiesName]"  id="cookiecontrol_settings[optionalCookiesthirdPartyCookiesName]" size="50" />
                                            <br>
                                            <input placeholder='eg. optOutLink' class="optOutLinkUrlDynamic"  type="text" name="cookiecontrol_settings[optionalCookiesthirdPartyCookiesUrl]"  id="cookiecontrol_settings[optionalCookiesthirdPartyCookiesUrl]" size="50" />
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
                                            <p><?php _e('Callback function that will fire on user\'s opting into this cookie category.  For example:', 'cookie-control'); ?> </p>
                                            <pre  style="font-size: 10px;">
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-XXXXX-Y', 'auto');
    ga('send', 'pageview');
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
                                            <p><?php _e('Callback function that will fire on user\'s opting out of this cookie category. Should any thirdPartyCookies be set, the module will automatically display a warning that manual user action is needed.  For example:', 'cookie-control'); ?> </p>
                                            <pre  style="font-size: 10px;">window['ga-disable-UA-XXXXX-Y'] = true;</pre>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <label for="cookiecontrol_settings[optionalCookiesinitialConsentState]"><?php _e('Recommended Consent State', 'cookie-control'); ?></label>
                                            <p><?php _e('Defines whether or not this category should be accepted (opted in) as part of the user granting consent to the site\'s recommended settings. If set to "on", cookies will be allowed by default for this category.', 'cookie-control'); ?> </p>
                                        </th>
                                        <td>
                                            <input type="radio" class="first" name="cookiecontrol_settings[optionalCookiesinitialConsentState]" id="cookiecontrol_settings[optionalCookiesinitialConsentState]" value="off"  checked />
                                            <?php _e('Off', 'cookie-control'); ?>
                                            <input type="radio" name="cookiecontrol_settings[optionalCookiesinitialConsentState]" id="cookiecontrol_settings[optionalCookiesinitialConsentState]" value="on"  />
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
                                            <input type="radio" class="first" name="cookiecontrol_settings[optionalCookieslawfulBasis]" id="cookiecontrol_settings[optionalCookieslawfulBasis]" value="consent"  checked />
                                            <?php _e('Consent ', 'cookie-control'); ?>
                                            <input type="radio" name="cookiecontrol_settings[optionalCookieslawfulBasis]" id="cookiecontrol_settings[optionalCookieslawfulBasis]" value="legitimate interest"  />
                                            <?php _e('Legitimate interest', 'cookie-control'); ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div id="optionalCookiesContainer" class="ccc-accordion">
                            <?php

                            if ( !empty( $ccc_options['optionalCookiesName'] ) ):
                                $ccc_output_extra_cookies ="";
                                $ccc_var_update="";
                                foreach ($ccc_options['optionalCookiesName'] as $key => $val ) :  ?>
                                    <?php if ( trim($val) != '') : ?>
                                        <div class="optionalCookies ccc-accordion-inside data-number" data-number="<?php echo $key; ?>">
                                            <div class="ccc-title-group">
                                                <div class="ccc-title">
                                                    <h3><?php _e('Cookie Category', 'cookie-control'); ?> <span>1</span> <?php echo !empty($ccc_options['optionalCookiesLabel'][$key]) ? '('. $ccc_options['optionalCookiesLabel'][$key] .')' : ''; ?> <i>+</i></h3>
                                                </div>
                                                <a href="#" class="remove removeCookieCategory" data-class="optionalCookies" id="removeoptionalCookies"><div class="dashicons dashicons-dismiss"><span class="screen-reader-text"><?php _e('Remove', 'cookie-control'); ?></span></div><div class="delete-cookie">Delete</div></a>
                                            </div>

                                            <div class="ccc-content">
                                                <table class="form-table">
                                                    <tr>
                                                        <th scope="row">
                                                            <label for="cookiecontrol_settings[optionalCookiesName][<?php echo $key ?>]"><?php _e('Cookie name *', 'cookie-control'); ?></label>
                                                            <p><?php _e('A unique identifier for the category, that the module will use to set an acceptance cookie for when user\'s opt in.', 'cookie-control'); ?></p>
                                                        </th>
                                                        <td>
                                                            <input required type="text" name="cookiecontrol_settings[optionalCookiesName][<?php echo $key ?>]"  data-name="<?php echo $val; ?>" id="cookiecontrol_settings[optionalCookiesName][<?php echo $key ?>]" value="<?php echo esc_html(stripslashes($val)); ?>" size="50" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            <label for="cookiecontrol_settings[optionalCookiesLabel][<?php echo $key ?>]"><?php _e('Cookie label *', 'cookie-control'); ?></label>
                                                            <p><?php _e('The descriptive title assigned to the category and displayed by the module.', 'cookie-control'); ?></p>
                                                        </th>
                                                        <td>
                                                            <input required type="text" name="cookiecontrol_settings[optionalCookiesLabel][<?php echo $key ?>]"  id="cookiecontrol_settings[optionalCookiesLabel][<?php echo $key ?>]" value="<?php echo esc_html(stripslashes($ccc_options['optionalCookiesLabel'][$key])); ?>" size="50" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            <label for="cookiecontrol_settings[optionalCookiesDescription][<?php echo $key ?>]"><?php _e('Cookie description', 'cookie-control'); ?></label>
                                                            <p><?php _e('The full description assigned to the category and displayed by the module.', 'cookie-control'); ?></p>
                                                        </th>
                                                        <td>
                                                            <input type="text" name="cookiecontrol_settings[optionalCookiesDescription][<?php echo $key ?>]"  id="cookiecontrol_settings[optionalCookiesDescription][<?php echo $key ?>]" value="<?php echo stripslashes($ccc_options['optionalCookiesDescription'][$key]); ?>" size="50" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            <label for="cookiecontrol_settings[optionalCookiesArray][<?php echo $key ?>]"><?php _e('Cookies', 'cookie-control'); ?></label>
                                                            <p><?php _e('The name of the cookies that you wish to protect after a user opts in (comma seperated values ex. \'_ga\', \'_gid\', \'_gat\', \'__utma\').', 'cookie-control'); ?></p>
                                                        </th>
                                                        <td>
                                                            <input type="text" name="cookiecontrol_settings[optionalCookiesArray][<?php echo $key ?>]"  id="cookiecontrol_settings[optionalCookiesArray][<?php echo $key ?>]" value="<?php echo esc_html(stripslashes($ccc_options['optionalCookiesArray'][$key])); ?>" size="50" />
                                                        </td>
                                                    </tr>
                                                    <tr  class="optionalInfoCookies">
                                                        <th scope="row">
                                                            <label for="cookiecontrol_settings[optionalCookiesthirdPartyCookies][<?php echo $key ?>]"><?php _e('Third party cookies', 'cookie-control'); ?></label>
                                                            <p><?php _e('Only applicable if the category will set third party cookies on acceptance. Each object will consist of the following key-value pairs:', 'cookie-control'); ?></p><ul><li>name : string, (Example: AddThis)</li><li>optOutLink : url string (Example: http://www.addthis.com/privacy/opt-out )</li></ul>
                                                        </th>
                                                        <td>
                                                            <?php  if(isset($ccc_options['optionalCookiesthirdPartyCookies'][$key])  && !isset( $ccc_options['optionalCookiesthirdPartyCookiesName'][$key]) && !isset( $ccc_options['optionalCookiesthirdPartyCookiesUrl'][$key])){ ?>
                                                                <?php if($ccc_options['optionalCookiesthirdPartyCookies'][$key]){ ?>
                                                                    <div class="warning">
                                                                        <div class="dashicons dashicons-warning"><span class="screen-reader-text"><?php _e('warning', 'cookie-control'); ?></span></div>
                                                                        <?php _e('You may have to re assign the third party cookies inside each category. Your Previous Object was :', 'cookie-control'); ?> <br> <?php echo stripslashes($ccc_options['optionalCookiesthirdPartyCookies'][$key]); ?>
                                                                    </div>
                                                                <?php  } ?>
                                                            <?php } ?>
                                                            <br>
                                                            <br>
                                                            <span class="thirdPartyCookiesGroupVal">
                                                                    <input type="text" class="optOutLinkNameDynamic" placeholder="eg. Name" name="cookiecontrol_settings[optionalCookiesthirdPartyCookiesName][<?php echo $key ?>]"  id="cookiecontrol_settings[optionalCookiesthirdPartyCookiesName][<?php echo $key ?>]" value='<?php echo isset($ccc_options['optionalCookiesthirdPartyCookiesName'][$key]) ?   esc_attr(stripslashes($ccc_options['optionalCookiesthirdPartyCookiesName'][$key])) : ""; ?>' size="50" />
                                                                    <br>
                                                                    <input type="text" class="optOutLinkUrlDynamic" placeholder="eg. optOutLink" name="cookiecontrol_settings[optionalCookiesthirdPartyCookiesUrl][<?php echo $key ?>]"  id="cookiecontrol_settings[optionalCookiesthirdPartyCookiesUrl][<?php echo $key ?>]" value='<?php echo isset($ccc_options['optionalCookiesthirdPartyCookiesUrl'][$key]) ?   esc_url(stripslashes($ccc_options['optionalCookiesthirdPartyCookiesUrl'][$key])) : ""; ?>' size="50" />
                                                                  </span>
                                                            <?php
                                                            if(isset($ccc_options['optionalCookiesthirdPartyCookiesName'.$key]) && isset($ccc_options['optionalCookiesthirdPartyCookiesUrl'.$key])){

                                                                foreach ($ccc_options['optionalCookiesthirdPartyCookiesName'.$key] as $key2 => $val2){
                                                                    $ccc_output_extra_cookies  .= ' , {"name": "'.$ccc_options['optionalCookiesthirdPartyCookiesName'.$key][$key2].'", "optOutLink" : "'. $ccc_options['optionalCookiesthirdPartyCookiesUrl'.$key][$key2].'"}';
                                                                    ?>
                                                                    <span class="thirdPartyCookiesGroup thirdPartyCookiesGroup-down thirdPartyCookiesGroupVal data-number" data-number="<?php echo $key ?>">
                                                                            <input type="text" class="optOutLink-field1 optOutLinkNameDynamic" placeholder="eg. Name" name="cookiecontrol_settings[optionalCookiesthirdPartyCookiesName<?php echo $key; ?>][<?php echo $key2; ?>]"  id="cookiecontrol_settings[optionalCookiesthirdPartyCookiesName<?php echo $key; ?>][<?php echo $key2; ?>]" value='<?php  echo esc_attr(stripslashes($ccc_options['optionalCookiesthirdPartyCookiesName'.$key][$key2])); ?>' size="50" />
                                                                            <input type="text" class="optOutLink-field1 optOutLinkUrlDynamic" placeholder="eg. optOutLink" name="cookiecontrol_settings[optionalCookiesthirdPartyCookiesUrl<?php echo $key; ?>][<?php echo $key2; ?>]"  id="cookiecontrol_settings[optionalCookiesthirdPartyCookiesUrl<?php echo $key; ?>][<?php echo $key2; ?>]" value='<?php echo esc_url(stripslashes($ccc_options['optionalCookiesthirdPartyCookiesUrl'.$key][$key2])); ?>' size="50" />
                                                                                <a href="#" class="remove-opt-link"><div class="dashicons dashicons-dismiss"><span class="screen-reader-text"><?php _e('Remove', 'cookie-control'); ?></span></div><?php _e('Remove optOutlink', 'cookie-control'); ?></a>
                                                                       </span>
                                                                <?php }
                                                            }
                                                            ?>
                                                            <a href="#" class="more-opt-link civic"><?php _e('Add optOutlink', 'cookie-control') ?></a>
                                                            <input type="hidden" class="thirdPartyCookieFinalUrl"  name="cookiecontrol_settings[optionalCookiesthirdPartyCookies][<?php echo $key ?>]"  id="cookiecontrol_settings[optionalCookiesthirdPartyCookies][<?php echo $key ?>]" value='<?php if(isset($ccc_options['optionalCookiesthirdPartyCookiesName'][$key]) && isset($ccc_options['optionalCookiesthirdPartyCookiesUrl'][$key])){ ?>{"name": "<?php echo $ccc_options['optionalCookiesthirdPartyCookiesName'][$key]; ?>", "optOutLink": "<?php echo $ccc_options['optionalCookiesthirdPartyCookiesUrl'][$key]; ?>"}<?php  if($ccc_output_extra_cookies!=""){ echo $ccc_output_extra_cookies; } } else{ echo ""; } ?>' size="50" />
                                                            <?php
                                                            $ccc_output_extra_cookies=""; ?>
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
                                                            <p><?php _e('Callback function that will fire on user\'s opting into this cookie category.  For example:', 'cookie-control'); ?> </p>
                                                            <pre  style="font-size: 10px;">(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-XXXXX-Y', 'auto');
    ga('send', 'pageview');</pre>
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
                                                            <p><?php _e('Callback function that will fire on user\'s opting out of this cookie category. Should any thirdPartyCookies be set, the module will automatically display a warning that manual user action is needed.  For example:', 'cookie-control'); ?> </p>
                                                            <pre  style="font-size: 10px;">window['ga-disable-UA-XXXXX-Y'] = true;</pre>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            <label for="cookiecontrol_settings[optionalCookiesinitialConsentState][<?php echo $key ?>]"><?php _e('Recommended Consent State', 'cookie-control'); ?></label>
                                                            <p><?php _e('Defines whether or not this category should be accepted (opted in) as part of the user granting consent to the site\'s recommended settings. If set to "on", cookies will be allowed by default for this category.', 'cookie-control'); ?></p>
                                                        </th>
                                                        <td>
                                                            <input type="radio" class="first" name="cookiecontrol_settings[optionalCookiesinitialConsentState][<?php echo $key ?>]" id="cookiecontrol_settings[optionalCookiesinitialConsentState][<?php echo $key ?>]" value="off"  <?php checked('off', $ccc_options['optionalCookiesinitialConsentState'][$key]); ?> />
                                                            <?php _e('Off', 'cookie-control'); ?>
                                                            <input type="radio" name="cookiecontrol_settings[optionalCookiesinitialConsentState][<?php echo $key ?>]" id="cookiecontrol_settings[optionalCookiesinitialConsentState][<?php echo $key ?>]" value="on"  <?php checked('on', $ccc_options['optionalCookiesinitialConsentState'][$key]); ?> />
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
                                                            <input type="radio" class="first" name="cookiecontrol_settings[optionalCookieslawfulBasis][<?php echo $key ?>]" id="cookiecontrol_settings[optionalCookieslawfulBasis][<?php echo $key ?>]" value="consent" <?php if($ccc_options['optionalCookieslawfulBasis'][$key]) ?><?php checked('consent', $ccc_options['optionalCookieslawfulBasis'][$key]); ?> />
                                                            <?php _e('Consent ', 'cookie-control'); ?>
                                                            <input type="radio" name="cookiecontrol_settings[optionalCookieslawfulBasis][<?php echo $key ?>]" id="cookiecontrol_settings[optionalCookieslawfulBasis][<?php echo $key ?>]" value="legitimate interest" <?php checked('legitimate interest', $ccc_options['optionalCookieslawfulBasis'][$key]); ?> />
                                                            <?php _e('Legitimate interest', 'cookie-control'); ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <hr>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <div id="last-used-key-optionalCookies" data-keyid="<?php echo $key ?>"></div>
                            <?php else: ?>
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
                                        <input placeholder="eg. Cookie name ex. JSESSIONID" type="text" name="cookiecontrol_settings[necessaryCookies]"  id="cookiecontrol_settings[necessaryCookies]" size="30" />
                                        <a href="#" class="remove removeRow" data-class="necessaryCookies" id="removenecessaryCookies"><div class="dashicons dashicons-dismiss"><span class="screen-reader-text"><?php _e('Remove', 'cookie-control'); ?></span></div></a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div id="necessaryCookiesContainer">
                            <?php
                            if ( !empty( $ccc_options['necessaryCookies'] ) ):
                                foreach ($ccc_options['necessaryCookies'] as $key => $val ) :  ?>
                                    <?php if ( trim($val) != '') : ?>
                                        <div class="necessaryCookies">
                                            <table class="form-table">
                                                <tr>
                                                    <th scope="row">
                                                        <label for="cookiecontrol_settings[necessaryCookies][<?php echo $key ?>]"><?php _e('Necessary Cookie', 'cookie-control'); ?></label>
                                                    </th>
                                                    <td>
                                                        <input type="text" name="cookiecontrol_settings[necessaryCookies][<?php echo $key ?>]"  id="cookiecontrol_settings[necessaryCookies][<?php echo $key ?>]" value="<?php echo stripslashes($val); ?>" size="30" />
                                                        <a href="#" class="remove removeRow" data-class="necessaryCookies" id="removenecessaryCookies"><div class="dashicons dashicons-dismiss"><span class="screen-reader-text"><?php _e('Remove', 'cookie-control'); ?></span></div></a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <div id="last-used-key-necessaryCookies" data-keyid="<?php echo $key ?>"></div>
                            <?php else: ?>
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
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[initialState]"><?php _e('Initial State', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="radio" class="first" name="cookiecontrol_settings[initialState]" id="cookiecontrol_settings[initialState]" value="CLOSED"<?php checked('CLOSE', $ccc_options['initialState']); ?> <?php checked('CLOSED', $ccc_options['initialState']); ?> />
                                    <?php _e('Closed', 'cookie-control'); ?>
                                    <input type="radio" name="cookiecontrol_settings[initialState]" id="cookiecontrol_settings[initialState]" value="OPEN" <?php checked('OPEN', $ccc_options['initialState']); ?> />
                                    <?php _e('Open', 'cookie-control'); ?>
                                    <span class="hide-com <?php echo $hidden_content_product; ?>"><input type="radio"  name="cookiecontrol_settings[initialState]" id="cookiecontrol_settings[initialState]" value="NOTIFY" <?php checked('NOTIFY', $ccc_options['initialState']); ?> />
                                        <?php _e('Notify (pro license)', 'cookie-control'); ?></span>
                                    <span class="hide-com <?php echo $hidden_content_product; ?>"><input type="radio"  name="cookiecontrol_settings[initialState]" id="cookiecontrol_settings[initialState]" value="TOP" <?php checked('TOP', $ccc_options['initialState']); ?> />
                                        <?php _e('Top (pro license)', 'cookie-control'); ?></span>
                                </td>
                            </tr>
                            <tr>
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
                            <tr>
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
                            <tr>
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
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[notifyOnce]"><?php _e('Notify once', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="radio" class="first" name="cookiecontrol_settings[notifyOnce]" value="false" <?php checked('false', ( isset($ccc_options['notifyOnce']) ? $ccc_options['notifyOnce'] : '' )); ?> /><?php _e('No', 'cookie-control'); ?>
                                    <input type="radio" name="cookiecontrol_settings[notifyOnce]" value="true" <?php checked('true', ( isset($ccc_options['notifyOnce']) ? $ccc_options['notifyOnce'] : '' )); ?> /><?php _e('Yes', 'cookie-control'); ?>
                                </td>
                            </tr>
                            <tr class="description">
                                <td colspan="2">
                                    <p> <?php _e('Determines whether the module only shows its initialState once, or if it continues to replay on subsequent page loads until the user has directly interacted with it - by either toggling on / off a category, accepting the recommended settings, or dismissing the module.', 'cookie-control'); ?> </p>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[toggleType]"><?php _e('Toggle type', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="radio" class="first" name="cookiecontrol_settings[toggleType]" value="slider" <?php checked('slider', ( isset($ccc_options['toggleType']) ? $ccc_options['toggleType'] : '' )); ?> />
                                    <?php _e('Slider', 'cookie-control'); ?>
                                    <input type="radio" name="cookiecontrol_settings[toggleType]" value="checkbox" <?php checked('checkbox', ( isset($ccc_options['toggleType']) ? $ccc_options['toggleType'] : '' )); ?> />
                                    <?php _e('Checkbox', 'cookie-control'); ?>
                                </td>
                            </tr>
                            <tr class="description">
                                <td colspan="2">
                                    <p><?php printf(__( 'Determines the control toggle for each item within %s optionalCookies %s', 'cookie-control' ), '<em>', '</em>'); ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[closeStyle]"><?php _e('Close style', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="radio" class="first" name="cookiecontrol_settings[closeStyle]" value="icon" <?php checked('icon', ( isset($ccc_options['closeStyle']) ? $ccc_options['closeStyle'] : '' )); ?> />
                                    <?php _e('Icon', 'cookie-control'); ?>
                                    <input type="radio" name="cookiecontrol_settings[closeStyle]" value="labelled" <?php checked('labelled', ( isset($ccc_options['closeStyle']) ? $ccc_options['closeStyle'] : '' )); ?> />
                                    <?php _e('Labelled', 'cookie-control'); ?>
                                    <input type="radio" name="cookiecontrol_settings[closeStyle]" value="button" <?php checked('button', ( isset($ccc_options['closeStyle']) ? $ccc_options['closeStyle'] : '' )); ?> />
                                    <?php _e('Button', 'cookie-control'); ?>
                                </td>
                            </tr>
                            <tr class="description">
                                <td colspan="2">
                                    <p><?php printf(__( 'Determines the control toggle for each item within %s optionalCookies %s', 'cookie-control' ), '<em>', '</em>'); ?></p>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[settingsStyle]"><?php _e('Button Notification bar', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="radio" class="first" name="cookiecontrol_settings[settingsStyle]" id="cookiecontrol_settings[settingsStyle]" value="button" <?php if(isset($ccc_options['settingsStyle'])) : checked('button', $ccc_options['settingsStyle']); else : ?> checked <?php endif; ?>/><?php _e('Button', 'cookie-control'); ?>
                                    <input type="radio" name="cookiecontrol_settings[settingsStyle]" id="cookiecontrol_settings[settingsStyle]" value="link" <?php  if(isset($ccc_options['settingsStyle'])) :  checked('link', $ccc_options['settingsStyle']); endif; ?> /><?php _e('Link', 'cookie-control'); ?>
                                </td>
                            </tr>
                            <tr class="description">
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
                                <th scope="row" colspan="2">
                                    <label for="cookiecontrol_settings[onLoad]"><?php _e('On Load callback function', 'cookie-control'); ?></label>
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <textarea name="cookiecontrol_settings[onLoad]" id="cookiecontrol_settings[onLoad]" cols="60" rows="10"><?php echo( isset($ccc_options['onLoad']) ? esc_html(stripslashes($ccc_options['onLoad'])) : '' ); ?></textarea>
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
                                    <input type="text" name="cookiecontrol_settings[titleText]" id="cookiecontrol_settings[titleText]" value="<?php echo esc_html(stripslashes($ccc_options['titleText'])); ?>" size="50" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[introText]"><?php _e('Introductory Text', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <?php wp_editor( stripslashes($ccc_options['introText']), 'cookiecontrol_settings[introText]', $settings= array('media_buttons' => false,'tinymce' => false,'quicktags' => array("buttons"=>"strong,em,ul,ol,li")));  ?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[privacyURL]"><?php _e('Privacy or cookie policy url', 'cookie-control'); ?></label>
                                    <p><?php _e('Use an absolute url'); ?></p>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[privacyURL]" id="cookiecontrol_settings[privacyURL]" value="<?php echo esc_url(stripslashes($ccc_options['privacyURL'])); ?>" size="50" placeholder="eg. http://www.yoursitename.com/privacy-policy" />
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
                                <th scope="row" colspan="2">
                                    <div class="warning">
                                        <div class="dashicons dashicons-warning"><span class="screen-reader-text"><?php _e('warning', 'cookie-control'); ?></span></div>
                                        <?php _e('Please note this link is added at the end of your introductory text.', 'cookie-control'); ?>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[necessaryTitle]"><?php _e('Necessary cookies title', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[necessaryTitle]" id="cookiecontrol_settings[necessaryTitle]" value="<?php echo esc_html(stripslashes($ccc_options['necessaryTitle'])); ?>" size="50" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[necessaryDescription]"><?php _e('Necessary cookies description', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <?php wp_editor( stripslashes($ccc_options['necessaryDescription']), 'cookiecontrol_settings[necessaryDescription]',  $settings= array('media_buttons' => false,'tinymce' => false,'quicktags' => array("buttons"=>"strong,em,ul,ol,li"))); ?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[thirdPartyTitle]"><?php _e('Third party cookies title', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[thirdPartyTitle]" id="cookiecontrol_settings[thirdPartyTitle]" value="<?php echo esc_html(stripslashes($ccc_options['thirdPartyTitle'])); ?>" size="50" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[thirdPartyDescription]"><?php _e('Third party cookies description', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <?php wp_editor( stripslashes($ccc_options['thirdPartyDescription']), 'cookiecontrol_settings[thirdPartyDescription]',  $settings= array('media_buttons' => false,'tinymce' => false,'quicktags' => array("buttons"=>"strong,em,ul,ol,li"))); ?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[onText]"><?php _e('On text', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[onText]" id="cookiecontrol_settings[onText]" value="<?php echo esc_html(stripslashes($ccc_options['onText'])); ?>" size="50" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[offText]"><?php _e('Off text', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[offText]" id="cookiecontrol_settings[offText]" value="<?php echo esc_html(stripslashes($ccc_options['offText'])); ?>" size="50" />
                                </td>
                            </tr>
                            <tr class="hide-com <?php echo $hidden_content_product; ?>">
                                <th scope="row">
                                    <label for="cookiecontrol_settings[notifyTitle]"><?php _e('Notify bar title', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[notifyTitle]" id="cookiecontrol_settings[notifyTitle]" value="<?php echo esc_html(stripslashes($ccc_options['notifyTitle'])); ?>" size="50" />
                                </td>
                            </tr>
                            <tr class="hide-com <?php echo $hidden_content_product; ?>">
                                <th scope="row">
                                    <label for="cookiecontrol_settings[notifyDescription]"><?php _e('Notify bar description', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <?php wp_editor( stripslashes($ccc_options['notifyDescription']), 'cookiecontrol_settings[notifyDescription]',  $settings= array('media_buttons' => false,'tinymce' => false,'quicktags' => array("buttons"=>"strong,em,ul,ol,li"))); ?>
                                </td>
                            </tr>
                            <tr class="hide-com <?php echo $hidden_content_product; ?>">
                                <th scope="row">
                                    <label for="cookiecontrol_settings[acceptText]"><?php _e('Accept text', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[acceptText]" id="cookiecontrol_settings[acceptText]" value="<?php echo esc_html(stripslashes($ccc_options['acceptText'])); ?>" size="50" />
                                </td>
                            </tr>
                            <tr class="hide-com <?php echo $hidden_content_product; ?>">
                                <th scope="row">
                                    <label for="cookiecontrol_settings[settingsText]"><?php _e('Settings text', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[settingsText]" id="cookiecontrol_settings[settingsText]" value="<?php echo esc_html(stripslashes($ccc_options['settingsText'])); ?>" size="50" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[acceptRecommended]"><?php _e('Accept recommended settings button text', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[acceptRecommended]" id="cookiecontrol_settings[acceptRecommended]" value="<?php echo esc_html(stripslashes($ccc_options['acceptRecommended'])); ?>" size="50" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[rejectButton]"><?php _e('Reject Button', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="radio" class="first" name="cookiecontrol_settings[rejectButton]" id="cookiecontrol_settings[rejectButton]" value="true" <?php if(isset($ccc_options['rejectButton'])) : checked('true', $ccc_options['rejectButton']); endif; ?> /><?php _e('true', 'cookie-control'); ?>
                                    <input type="radio" name="cookiecontrol_settings[rejectButton]" id="cookiecontrol_settings[rejectButton]" value="false" <?php  if(isset($ccc_options['rejectButton'])) :  checked('false', $ccc_options['rejectButton']); else : ?> checked <?php endif; ?> /><?php _e('false', 'cookie-control'); ?>
                                </td>
                            </tr>
                            <tr class="hide-com <?php echo $hidden_content_product; ?>">
                                <th scope="row">
                                    <label for="cookiecontrol_settings[reject]"><?php _e('Reject Notify bar button text', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[reject]" id="cookiecontrol_settings[reject]" value="<?php if($ccc_options['reject']): echo esc_html(stripslashes($ccc_options['reject'])); else : _e('Reject'); endif; ?>" size="50" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[rejectSettings]"><?php _e('Reject settings button text', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[rejectSettings]" id="cookiecontrol_settings[rejectSettings]" value="<?php if($ccc_options['rejectSettings']): echo esc_html(stripslashes($ccc_options['rejectSettings'])); else : _e('Reject All'); endif; ?>" size="50" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[closeLabel]"><?php _e('Close cookie window text', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[closeLabel]" id="cookiecontrol_settings[closeLabel]" value="<?php echo esc_html(stripslashes($ccc_options['closeLabel'])); ?>" size="50" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[accessibilityAlert]"><?php _e('Accessibility alert text', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[accessibilityAlert]" id="cookiecontrol_settings[accessibilityAlert]" value="<?php echo esc_html(stripslashes($ccc_options['accessibilityAlert'])); ?>" size="100" />
                                </td>
                            </tr>
                        </table>

                    </div>

                    <div id="branding" class="pro-multi-license <?php echo $hidden_content_product; ?>">
                        <h2><?php _e('Branding', 'cookie-control'); ?></h2>
                        <p></p>
                        <p><?php printf(__( 'With %s pro %s and %s pro_multisite %s licenses, you are able to set all aspects of the module\'s styling, and remove any back links to CIVIC.', 'cookie-control' ), '<b>', '</b>', '<b>', '</b>' ); ?></p>

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

                    <div id="regional" class="pro-multi-license <?php echo $hidden_content_product; ?>">
                        <h2><?php _e('Geolocation And Localisation', 'cookie-control'); ?></h2>
                        <p><?php printf(__( 'With %s pro %s  and %s pro_multisite %s licenses, you are able to disable the module entirely for visitors outside of the EU, and offer alternative languages.', 'cookie-control' ), '<b>', '</b>', '<b>', '</b>' ); ?></p>

                        <div class="excludedCountriesTemplate">
                            <table class="form-table">
                                <tr>
                                    <th scope="row">
                                        <label for="cookiecontrol_settings[excludedCountries]"><?php _e('Excluded Country (ISO code)', 'cookie-control'); ?></label>
                                    </th>
                                    <td>
                                        <input placeholder="eg. Language code ex. US" type="text" name="cookiecontrol_settings[excludedCountries]"  id="cookiecontrol_settings[excludedCountries]" size="20" />
                                        <a href="#" class="remove removeRow" data-class="excludedCountries" id="removeexcludedCountries"><div class="dashicons dashicons-dismiss"><span class="screen-reader-text"><?php _e('Remove', 'cookie-control'); ?></span></div></a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <p>
                            <?php printf( __( 'Either add the value %s all %s, or a 2 letter ISO code (ex. US) for the country you wish to disable the module for. View full %s <a href="%s" target="_blank">list of languages codes</a>.%s', 'cookie-control' ),'<b>', '</b>', '<b>', esc_url( 'https://www.loc.gov/standards/iso639-2/php/code_list.php' ), '</b>'); ?>
                        <p>
                        <div id="excludedCountriesContainer" class="pro-multi-license <?php echo $hidden_content_product; ?>">
                            <?php
                            if ( !empty( $ccc_options['excludedCountries'] ) ):
                                foreach ($ccc_options['excludedCountries'] as $key => $val ) :  ?>
                                    <?php if ( trim($val) != '') : ?>
                                        <div class="excludedCountries">
                                            <table class="form-table">
                                                <tr>
                                                    <th scope="row">
                                                        <label for="cookiecontrol_settings[excludedCountries][<?php echo $key ?>]"><?php _e('Excluded Country (ISO code)', 'cookie-control'); ?></label>
                                                    </th>
                                                    <td>
                                                        <input type="text" name="cookiecontrol_settings[excludedCountries][<?php echo $key ?>]"  id="cookiecontrol_settings[excludedCountries][<?php echo $key ?>]" value="<?php echo stripslashes($val); ?>" size="20" />
                                                        <a href="#" class="remove removeRow" data-class="excludedCountries" id="removeexcludedCountries"><div class="dashicons dashicons-dismiss"><span class="screen-reader-text"><?php _e('Remove', 'cookie-control'); ?></span></div></a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    <?php endif ?>
                                <?php endforeach; ?>
                                <div id="last-used-key-excludedCountries" data-keyid="<?php echo is_numeric($key) ? $key: 0; ?>"></div>
                            <?php else: ?>
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
                                    <td>
                                        <label for="cookiecontrol_settings[altLanguages]"><?php _e('Alternative language (ISO code)', 'cookie-control'); ?></label>
                                        <input placeholder="eg. Language code ex. el" type="text" name="cookiecontrol_settings[altLanguages]"  id="cookiecontrol_settings[altLanguages]" size="20" />
                                        <a href="#" class="remove removeRow" data-class="altLanguages" id="removealtLanguages"><div class="dashicons dashicons-dismiss"><span class="screen-reader-text"><?php _e('Remove', 'cookie-control'); ?></span></div></a>
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
                                        <p><?php printf(__( 'Your input should contain all of the language strings you wish to translate %s (Do not use single quotes (\'\') or apostrophe (\') in your input).', 'cookie-control' ), '<br>'); ?></p>
                                        <p><?php printf(__( 'If you have  Pro Edition or  Pro Edition  license type and you need IAB support , you have to add iabCMP: {} ', 'cookie-control' ), '<br>'); ?></p>
                                        <p><?php printf(__( 'If you don\'t need IAB support you have to delete IabCMP: {} from your string. Full example with IabCMP: ', 'cookie-control' ), '<br>'); ?></p>

                                        <pre  style="font-size: 10px;">
    text : {
      title: 'Αυτός ο ιστότοπος χρησιμοποιεί cookies για να αποθηκεύσει πληροφορίες στον υπολογιστή σας.',
      intro:  'Μερικά από αυτά είναι απαραίτητα, ενώ άλλα μας βοηθούν να βελτιώσουμε την εμπειρία σας δείχνοντάς μας πώς χρησιμοποιείται ο ιστότοπος. &lt;a href="/privacy-policy">Περισσότερα&lt;/a&gt;',
      necessaryTitle : 'Απαραίτητα Cookies',
      necessaryDescription : 'Τα απαραίτητα cookies καθιστουν δυνατή την λειτουργικότητα του ιστοτόπου, όπως για παράδειγμα την πλοήγηση και την πρόσβαση σε ασφαλείς περιοχές του ιστοτόπου. Ο ιστότοπος δεν μπορεί να λειτουργήσει χωρίς αυτά, και μπορούν να απενεργοποιηθούν μονο από τον φυλλομετρητή σας.',
      thirdPartyTitle : 'Προειδοποίηση: Μερικά cookies ζητούν την προσοχή σας',
      thirdPartyDescription : 'Η συγκατάθεση στα παρακάτω cookies δεν μπορεί να ανακληθεί αυτόματα. Παρακαλώ ακολουθηστε τον παρακάτω σύνδεσμο για να αποχωρήσετε από τη χρήση αυτών των υπηρεσιών.',
      acceptRecommended:'Αποδοχή προτεινόμενων ρυθμίσεων',
      on : 'On',
      off : 'Off',
      notifyTitle : 'Οι επιλογές σχετικά με τα cookies σε αυτό το site',
        notifyDescription : 'Χρησιμοποιούμε cookies για να βελτιώσουμε την χρήση του site',
      accept : 'Αποδοχή',
      rejectSettings: 'Απόρριψη',
      settings : 'Προτιμήσεις',
      optionalCookies:[
                  {
                      label: 'Analytics',
                      description: 'Τα analytics cookies μας βοηθούν να βελτιώσουμε το website μας, παρακολουθώντας την επισκεψιμότητα και τη χρήση του.'
                  }
              ],
      iabCMP: {
                label: 'Προμηθευτες Διαφημίσεων',
                description: 'Όταν επισκέπτεστε τον ιστότοπό μας, οι προεπιλεγμένες εταιρείες μπορούν να έχουν πρόσβαση και να χρησιμοποιούν ορισμένες πληροφορίες στη συσκευή σας για την προβολή σχετικών διαφημίσεων ή εξατομικευμένου περιεχομένου. Ορισμένοι εταίροι βασίζονται στη συγκατάθεσή σας ενώ άλλοι απαιτούν την εξαίρεσή σας.',
                configure: 'Ρύθμιση παραμέτρων προμηθευτών διαφημίσεων',
                panelTitle: 'Διαφημιζόμενοι διαφημίσεων: Ποιες πληροφορίες συλλέγονται και πώς μπορούν να χρησιμοποιηθούν',
                panelIntro: 'Εμείς και οι εταιρείες που επιλέγουμε μπορούν να έχουν πρόσβαση σε πληροφορίες όπως η συσκευή, το λειτουργικό σύστημα και ο τύπος του προγράμματος περιήγησης που χρησιμοποιείτε. πληροφορίες cookie και πληροφορίες σχετικά με τη δραστηριότητά σας στη συγκεκριμένη συσκευή, συμπεριλαμβανομένων των ιστοσελίδων και των εφαρμογών για κινητά που επισκέφτηκαν ή χρησιμοποιήθηκαν, μαζί με τη διεύθυνση IP και τη γεωγραφική τοποθεσία της συσκευής όταν έχει πρόσβαση σε έναν ιστότοπο ή μια εφαρμογή για κινητά.',
                aboutIab: 'Μπορείτε να ελέγξετε τον τρόπο με τον οποίο χρησιμοποιούνται αυτές οι πληροφορίες, υποδεικνύοντας τη συγκατάθεσή σας για τους ακόλουθους σκοπούς που περιγράφονται από',
                iabName: 'IAB Ευρώπη',
                iabLink: 'https://advertisingconsent.eu/',
                panelBack: 'Επιστροφή σε Όλες τις κατηγορίες',
                vendorTitle: 'Προμηθευτες Διαφημίσεων',
                vendorConfigure: 'Εμφάνιση Προμηθευτών Διαφημίσεων',
                vendorBack: 'Επιστροφή στους σκοπούς του Προμηθευτή διαφημίσεων',
                acceptAll: 'Αποδοχή όλων',
                rejectAll: 'Απόρριψη όλων',
                back: 'Πίσω',
            },
    }
                    </pre>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <p><?php _e('Accepts either a full locale (en_US), or two letter language code (en). Where both are present and matched with the current user\'s preference, the more specific locale will be used', 'cookie-control'); ?></p>
                        <div id="altLanguagesContainer" class="<?php echo $hidden_content_product; ?>">
                            <?php
                            if ( !empty( $ccc_options['altLanguages'] ) ) :
                                foreach ($ccc_options['altLanguages'] as $key => $val ) :  ?>
                                    <?php if ( trim($val) != '') : ?>
                                        <div class="altLanguages">
                                            <table class="form-table">
                                                <tr>
                                                    <td>
                                                        <label for="cookiecontrol_settings[altLanguages][<?php echo $key; ?>]"><?php _e('Alternative language (ISO code)', 'cookie-control'); ?></label>
                                                        <input type="text" name="cookiecontrol_settings[altLanguages][<?php echo $key;?>]"  id="cookiecontrol_settings[altLanguages][<?php echo $key; ?>]" value="<?php echo esc_attr(stripslashes($val)); ?>" size="20" />
                                                        <a href="#" class="remove removeRow" data-class="altLanguages" id="removealtLanguages"><div class="dashicons dashicons-dismiss"><span class="screen-reader-text"><?php _e('Remove', 'cookie-control'); ?></span></div></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <label for="cookiecontrol_settings[altLanguagesText][<?php echo $key; ?>]"><?php _e('Translation for the alternative language', 'cookie-control'); ?></label>
                                                        <p><?php _e('The text object mirrors that of the default text object, and allows you to localise all values to this particular locale / language.', 'cookie-control'); ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <textarea name="cookiecontrol_settings[altLanguagesText][<?php echo $key; ?>]" id="cookiecontrol_settings[altLanguagesText][<?php echo $key; ?>]" cols="180" rows="10"><?php echo stripslashes($ccc_options['altLanguagesText'][$key]);  ?></textarea>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    <?php endif ?>
                                <?php endforeach; ?>
                                <div id="last-used-key-altLanguages" data-keyid="<?php echo $key ?>"></div>
                            <?php else: ?>
                                <div id="last-used-key-altLanguages" data-keyid="0"></div>
                            <?php endif; ?>
                        </div>
                        <button class="addRow civic" data-class="altLanguages"><i class="icon-plus-sign icon-white"></i><?php _e('Add Alternative Language', 'cookie-control'); ?></button><br>

                    </div>

                    <div id="accessibility">
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
                                    <input type="radio" class="first" name="cookiecontrol_settings[highlightFocus]" value="false" <?php checked('false', ( isset($ccc_options['highlightFocus']) ? $ccc_options['highlightFocus'] : '' )); ?> />
                                    <?php _e('No', 'cookie-control'); ?>
                                    <input type="radio" name="cookiecontrol_settings[highlightFocus]" value="true" <?php checked('true', ( isset($ccc_options['highlightFocus']) ? $ccc_options['highlightFocus'] : '' )); ?> />
                                    <?php _e('Yes', 'cookie-control'); ?>
                                </td>
                            </tr>
                            <tr class="description">
                                <td colspan="2">
                                    <p> <?php _e('Determines if the module should use more accentuated styling to highlight elements in focus, or use the browser\'s outline default.', 'cookie-control'); ?></p>
                                    <p> <?php _e('If enabled, this property uses CSS filters to invert the module\'s colours. This should hopefully mean that a higher visual contrast is achieved, even with a custom branding.', 'cookie-control'); ?></p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div id="iab" class="pro-multi-license <?php echo $hidden_content_product; ?>">
                        <h2><?php _e('IAB', 'cookie-control'); ?></h2>
                        <p><?php printf(__( 'With %s pro %s  and %s pro_multisite %s licenses, you are able to enable and configure the IAB functionality', 'cookie-control' ), '<b>', '</b>', '<b>', '</b>' ); ?></p>
                        <p><?php _e('Find out more about the IAB','cookie-control'); ?> <a class="text-underline" href="https://www.iabuk.com" target="_blank">here</a></p>

                        <table class="form-table">
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabCMP]"><?php _e('iabCMP', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="radio" select class="first" name="cookiecontrol_settings[iabCMP]" id="cookiecontrol_settings[iabCMP]" value="true" <?php if(isset($ccc_options['iabCMP'])) : checked('true', $ccc_options['iabCMP']);  endif; ?>/><?php _e('True', 'cookie-control'); ?>
                                    <input type="radio" name="cookiecontrol_settings[iabCMP]" id="cookiecontrol_settings[iabCMP]" value="false" <?php  if(isset($ccc_options['iabCMP'])) :  checked('false', $ccc_options['iabCMP']); else : ?> checked <?php   endif; ?> /><?php _e('False', 'cookie-control'); ?>
                                </td>
                            </tr>
                            <tr class="description">
                                <td colspan="2">
                                    <p> <?php _e('Determines whether or not Cookie Control supports the IAB\'s TCF v1.1', 'cookie-control'); ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[language]"><?php _e('Language', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[language]" id="cookiecontrol_settings[language]"  value="<?php echo !empty($ccc_options['language']) ?  esc_html(stripslashes($ccc_options['language'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['language'])); ?>" size="50"/>
                                </td>
                            </tr>

                            <tr class="description">
                                <td colspan="2">
                                    <p><?php _e('Two letter ISO language code that should be used to display information about IAB purposes.', 'cookie-control'); ?></p>
                                    <p><?php _e('Please note, if you have additional locales set up as part of your main Cookie Control configuration, this value will dynamically change to match that locale should the site visitor be within that locale.', 'cookie-control'); ?></p>

                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[gdprAppliesGlobally]"><?php _e('gdprAppliesGlobally', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="radio" class="first" name="cookiecontrol_settings[gdprAppliesGlobally]" id="cookiecontrol_settings[gdprAppliesGlobally]" value="true" <?php if(isset($ccc_options['gdprAppliesGlobally'])) : checked('true', $ccc_options['gdprAppliesGlobally']);  else : ?> checked <?php endif; ?>/><?php _e('True', 'cookie-control'); ?>
                                    <input type="radio" name="cookiecontrol_settings[gdprAppliesGlobally]" id="cookiecontrol_settings[gdprAppliesGlobally]" value="false" <?php  if(isset($ccc_options['gdprAppliesGlobally'])) :  checked('false', $ccc_options['gdprAppliesGlobally']);  endif; ?> /><?php _e('False', 'cookie-control'); ?>
                                </td>
                            </tr>
                            <tr class="description">
                                <td colspan="2">
                                    <p> <?php _e('Determines whether or not consent should be obtained from all users regardless of their location, or if we ought to only seek it from those within the EU.', 'cookie-control'); ?></p>
                                    <p> <?php _e('Please note, if you have excludedCountries set up as part of your main Cookie Control configuration, this value will dynamically change to match depending on the locale of the site visitor.', 'cookie-control'); ?></p>
                                </td>
                            </tr>
                        </table>
                        <hr/>
                        <h2><?php _e('Recommended State', 'cookie-control'); ?></h2>
                        <p><?php _e('Determines whether or not any of the 5 IAB purposes should be accepted as part of your recommended settings.', 'cookie-control'); ?></p>
                        <table class="form-table">
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[recommendedState1]"><?php _e('Information storage and access', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="radio" class="first" name="cookiecontrol_settings[recommendedState1]" id="cookiecontrol_settings[recommendedState1]" value="true" <?php if(isset($ccc_options['recommendedState1'])) : checked('true', $ccc_options['recommendedState1']);  endif; ?>/><?php _e('True', 'cookie-control'); ?>
                                    <input type="radio" name="cookiecontrol_settings[recommendedState1]" id="cookiecontrol_settings[recommendedState1]" value="false" <?php  if(isset($ccc_options['recommendedState1'])) :  checked('false', $ccc_options['recommendedState1']); else : ?> checked <?php   endif; ?> /><?php _e('False', 'cookie-control'); ?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[recommendedState2]"><?php _e('Personalisation', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="radio" class="first" name="cookiecontrol_settings[recommendedState2]" id="cookiecontrol_settings[recommendedState2]" value="true" <?php if(isset($ccc_options['recommendedState2'])) : checked('true', $ccc_options['recommendedState2']);  endif; ?>/><?php _e('True', 'cookie-control'); ?>
                                    <input type="radio" name="cookiecontrol_settings[recommendedState2]" id="cookiecontrol_settings[recommendedState2]" value="false" <?php  if(isset($ccc_options['recommendedState2'])) :  checked('false', $ccc_options['recommendedState2']); else : ?> checked <?php   endif; ?> /><?php _e('False', 'cookie-control'); ?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[recommendedState3]"><?php _e('Ad selection, delivery, reporting', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="radio" class="first" name="cookiecontrol_settings[recommendedState3]" id="cookiecontrol_settings[recommendedState3]" value="true" <?php if(isset($ccc_options['recommendedState3'])) : checked('true', $ccc_options['recommendedState3']);  endif; ?>/><?php _e('True', 'cookie-control'); ?>
                                    <input type="radio" name="cookiecontrol_settings[recommendedState3]" id="cookiecontrol_settings[recommendedState3]" value="false" <?php  if(isset($ccc_options['recommendedState3'])) :  checked('false', $ccc_options['recommendedState3']); else : ?> checked <?php   endif; ?> /><?php _e('False', 'cookie-control'); ?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[recommendedState4]"><?php _e('Content selection, delivery, reporting', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="radio" class="first" name="cookiecontrol_settings[recommendedState4]" id="cookiecontrol_settings[recommendedState4]" value="true" <?php if(isset($ccc_options['recommendedState4'])) : checked('true', $ccc_options['recommendedState4']);  endif; ?>/><?php _e('True', 'cookie-control'); ?>
                                    <input type="radio" name="cookiecontrol_settings[recommendedState4]" id="cookiecontrol_settings[recommendedState4]" value="false" <?php  if(isset($ccc_options['recommendedState4'])) :  checked('false', $ccc_options['recommendedState4']); else : ?> checked <?php   endif; ?> /><?php _e('False', 'cookie-control'); ?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[recommendedState5]"><?php _e('Measurement', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="radio" class="first" name="cookiecontrol_settings[recommendedState5]" id="cookiecontrol_settings[recommendedState5]" value="true" <?php if(isset($ccc_options['recommendedState5'])) : checked('true', $ccc_options['recommendedState5']);  endif; ?>/><?php _e('True', 'cookie-control'); ?>
                                    <input type="radio" name="cookiecontrol_settings[recommendedState5]" id="cookiecontrol_settings[recommendedState5]" value="false" <?php  if(isset($ccc_options['recommendedState5'])) :  checked('false', $ccc_options['recommendedState5']); else : ?> checked <?php   endif; ?> /><?php _e('False', 'cookie-control'); ?>
                                </td>
                            </tr>
                        </table>
                        <hr/>
                        <h2><?php _e('Text Object', 'cookie-control'); ?></h2>
                        <p><?php _e('You may also configure the text used to introduce the IAB category / panels via the iabCMP object, within the main text object.', 'cookie-control'); ?></p>
                        <table class="form-table">
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabLabel]"><?php _e('Title', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabLabel]" id="cookiecontrol_settings[iabLabel]"  value="<?php echo !empty($ccc_options['iabLabel']) ?  esc_html(stripslashes($ccc_options['iabLabel'])) :  esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabLabel'])); ?>" size="60"/>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabDescription]"><?php _e('Description', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <textarea name="cookiecontrol_settings[iabDescription]" id="cookiecontrol_settings[iabDescription]" cols=60" rows="7" ><?php echo !empty($ccc_options['iabDescription']) ?  esc_html(stripslashes($ccc_options['iabDescription'])) :  esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabDescription'])); ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabConfigure]"><?php _e('Configure', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabConfigure]" id="cookiecontrol_settings[iabConfigure]"  value="<?php echo !empty($ccc_options['iabConfigure']) ?  esc_html(stripslashes($ccc_options['iabConfigure'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabConfigure'])); ?>" size="60"/>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabPanelTitle]"><?php _e('Panel Title', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabPanelTitle]" id="cookiecontrol_settings[iabPanelTitle]"  value="<?php echo !empty($ccc_options['iabPanelTitle']) ?  esc_html(stripslashes($ccc_options['iabPanelTitle'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabPanelTitle'])); ?>" size="60"/>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabPanelIntro]"><?php _e('Panel Intro', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <textarea name="cookiecontrol_settings[iabPanelIntro]" id="cookiecontrol_settings[iabPanelIntro]" cols=60" rows="7"><?php echo !empty($ccc_options['iabPanelIntro']) ?  esc_html(stripslashes($ccc_options['iabPanelIntro'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabPanelIntro'])); ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabAboutIab]"><?php _e('About Iab', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <textarea name="cookiecontrol_settings[iabAboutIab]" id="cookiecontrol_settings[iabAboutIab]" cols=60" rows="7"><?php echo !empty($ccc_options['iabAboutIab']) ?  esc_html(stripslashes($ccc_options['iabAboutIab'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabAboutIab'])); ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabIabName]"><?php _e('Iab Name', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabIabName]" id="cookiecontrol_settings[iabIabName]"  value="<?php echo !empty($ccc_options['iabIabName']) ?  esc_html(stripslashes($ccc_options['iabIabName'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabIabName'])); ?>" size="60"/>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabIabLink]"><?php _e('Iab Link', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="url" name="cookiecontrol_settings[iabIabLink]" id="cookiecontrol_settings[iabIabLink]"  value="<?php echo !empty($ccc_options['iabIabLink']) ?  esc_html(stripslashes($ccc_options['iabIabLink'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabIabLink'])); ?>" size="60"/>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabPanelBack]"><?php _e('Panel Back', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabPanelBack]" id="cookiecontrol_settings[iabPanelBack]"  value="<?php echo !empty($ccc_options['iabPanelBack']) ?  esc_html(stripslashes($ccc_options['iabPanelBack'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabPanelBack'])); ?>" size="60"/>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabVendorTitle]"><?php _e('Vendor Title', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabVendorTitle]" id="cookiecontrol_settings[iabVendorTitle]"  value="<?php echo !empty($ccc_options['iabVendorTitle']) ?  esc_html(stripslashes($ccc_options['iabVendorTitle'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabVendorTitle'])); ?>" size="60"/>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabVendorConfigure]"><?php _e('Vendor Configure', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabVendorConfigure]" id="cookiecontrol_settings[iabVendorConfigure]"  value="<?php echo !empty($ccc_options['iabVendorConfigure']) ?  esc_html(stripslashes($ccc_options['iabVendorConfigure'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabVendorConfigure'])); ?>" size="60"/>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabVendorBack]"><?php _e('Vendor Back', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabVendorBack]" id="cookiecontrol_settings[iabVendorBack]"  value="<?php echo !empty($ccc_options['iabVendorBack']) ?  esc_html(stripslashes($ccc_options['iabVendorBack'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabVendorBack'])); ?>" size="60"/>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabAcceptAll]"><?php _e('Accept All', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabAcceptAll]" id="cookiecontrol_settings[iabAcceptAll]"  value="<?php echo !empty($ccc_options['iabAcceptAll']) ?  esc_html(stripslashes($ccc_options['iabAcceptAll'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabAcceptAll'])); ?>" size="60"/>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabRejectAll]"><?php _e('Reject All', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabRejectAll]" id="cookiecontrol_settings[iabRejectAll]"  value="<?php echo !empty($ccc_options['iabRejectAll']) ?  esc_html(stripslashes($ccc_options['iabRejectAll'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabRejectAll'])); ?>" size="60"/>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="cookiecontrol_settings[iabBack]"><?php _e('Back', 'cookie-control'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="cookiecontrol_settings[iabBack]" id="cookiecontrol_settings[iabBack]"  value="<?php echo !empty($ccc_options['iabBack']) ?  esc_html(stripslashes($ccc_options['iabBack'])) : esc_html(stripslashes($ccc_cookiecontrol_settings_defaults_ins['iabBack'])); ?>" size="60"/>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Submit -->
            <p class="submit">
                <input type="hidden" id="ccc_api_version_form_submit" name="ccc_form_submit" value="v8">
                <button type="submit"  id="ccc_save_form_submit" class="button-primary"  ><?php _e('Save Settings', 'cookie-control') ?></button>
            </p>
        </form>

        <!-- The Reset Option -->
        <form method="post" id="form-reset-main" action="options.php">
            <?php settings_fields($this->plugin_name);
            $ccc_cookiecontrol_defaults = $ccc_cookiecontrol_settings_defaults_ins; // use the defaults
            if(get_option($this->plugin_name)){
                $ccc_options = get_option($this->plugin_name);
            }elseif(get_option('cookiecontrol_settings')){ // check if option cookiecontrol_settings exists , for backward compatibility
                $ccc_options = get_option('cookiecontrol_settings');
            }?>
            <input type="hidden" name="cookiecontrol_settings[apiKey]" value="<?php echo isset($ccc_options['apiKey']) ?  $ccc_options['apiKey'] : ""; ?>" />
            <input type="hidden" name="cookiecontrol_settings_api_key_version" value="<?php echo isset( $ccc_options_apikey_version) ?  $ccc_options_apikey_version : ''  ?>" />
            <?php foreach((array)$ccc_cookiecontrol_defaults as $key => $value) : ?>
                <input type="hidden" name="cookiecontrol_settings[<?php echo $key; ?>]" value="<?php echo $value; ?>" />
            <?php endforeach; ?>
            <input type="hidden" name="cookiecontrol_settings[update]" value="RESET" />
            <input type="hidden" id="ccc_save_form_submit" name="ccc_form_submit" value="v8">
            <button type="submit" class="button"><?php _e('Reset Settings', 'cookie-control') ?></button>
        </form>
        <!-- End Reset Option -->
    </div>
</div><!-- End of Plugin Option Page Container -->