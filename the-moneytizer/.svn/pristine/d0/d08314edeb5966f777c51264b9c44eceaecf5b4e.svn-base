<?php
$auth = get_option('themoneytizer_setting_token');
$site_id = get_option("themoneytizer_site_id");

if($auth!=null&&$site_id!=null){
    if(!current_user_can( 'manage_options' )){
        return 0;
    }
    /*
    * Update version information
    */
    $body = ['version' => get_option('themoneytizer_plugin_version'), 'action' => 'ping'];
    $url = "https://www.themoneytizer.com/plugin/setWebsiteInformations?token=$auth";
    $res = post_req($url, $body);
    /*
    * Retrieve site information and store it
    */
    $body = ['plateform' => get_option('themoneytizer_user_plateform'), 'version' => get_option('themoneytizer_plugin_version')];
    $url = "https://www.themoneytizer.com/plugin/getWebsiteAllInformations?token=$auth";
    $res = post_req($url, $body);
    if($res = json_decode($res)){
        if($res->status == 'success'){
            $body = $res->payload;
            #Update->Bank data
            update_option( 'themoneytizer_user_bank_name',stripslashes($body->user_bank_name));
            update_option( 'themoneytizer_user_bank_iban',stripslashes($body->user_bank_iban));
            update_option( 'themoneytizer_user_bank_bic',stripslashes($body->user_bank_bic));
            update_option( 'themoneytizer_user_bank_namebank',stripslashes($body->user_bank_namebank));
            update_option( 'themoneytizer_user_bank_adressbank',stripslashes($body->user_bank_adressbank));
            update_option( 'themoneytizer_user_bank_countrybank',stripslashes($body->user_bank_countrybank));
            update_option( 'themoneytizer_user_bank_citybank',stripslashes($body->user_bank_citybank));
            update_option( 'themoneytizer_user_bank_zipbank',stripslashes($body->user_bank_zipbank));
            update_option( 'themoneytizer_user_bank_iban_inter',stripslashes($body->user_bank_iban_inter));
            update_option( 'themoneytizer_user_bank_bic_inter',stripslashes($body->user_bank_bic_inter));
            update_option( 'themoneytizer_user_bank_namebank_inter',stripslashes($body->user_bank_namebank_inter));
            update_option( 'themoneytizer_user_bank_adressbank_inter',stripslashes($body->user_bank_adressbank_inter));
            update_option( 'themoneytizer_user_bank_countrybank_inter',stripslashes($body->user_bank_countrybank_inter));
            update_option( 'themoneytizer_user_bank_citybank_inter',stripslashes($body->user_bank_citybank_inter));
            update_option( 'themoneytizer_user_bank_zipbank_inter',stripslashes($body->user_bank_zipbank_inter));

            #Update->User data
            update_option( 'themoneytizer_user_type_structure', stripslashes($body->user_type_structure));
            update_option( 'themoneytizer_user_entreprise',stripslashes($body->user_entreprise));
            update_option( 'themoneytizer_user_user_siren',stripslashes($body->user_siren));
            update_option( 'themoneytizer_user_tva',stripslashes($body->user_tva));
            update_option( 'themoneytizer_user_id',stripslashes($body->user_id));
            update_option( 'themoneytizer_user_paypal',stripslashes($body->user_paypal_mail));
            update_option( 'themoneytizer_is_registered',"4");
            update_option( 'themoneytizer_user_language', strtolower(substr(get_locale(), 3, 2)));
            update_option( 'themoneytizer_user_firstname',stripslashes($body->user_firstname));
            update_option( 'themoneytizer_user_name',stripslashes($body->user_lastname));
            update_option( 'themoneytizer_user_mail',stripslashes($body->user_mail));
            update_option( 'themoneytizer_user_tel',stripslashes($body->user_phone));
            update_option( 'themoneytizer_user_address',stripslashes($body->user_adress));
            update_option( 'themoneytizer_user_city',stripslashes($body->user_city));

            update_option( 'themoneytizer_user_zip_code',stripslashes($body->user_zip));
            update_option( 'themoneytizer_user_country',stripslashes($body->user_country));
            update_option( 'themoneytizer_user_plateform',stripslashes($body->user_plateform));
            update_option( 'themoneytizer_user_reason_added',stripslashes($body->user_raison_ajout_id));
            update_option( 'themoneytizer_user_reason_added_other',stripslashes($body->user_raison_ajout_autre));
            update_option('themoneytizer_user_sponsorship_code', stripslashes($body->sponsorship_code));

            #Update->Site data
            update_option( 'themoneytizer_site_ads_txt', stripslashes($body->site_ads_txt));
            update_option( 'themoneytizer_site_cmp', stripslashes($body->site_cmp));
            update_option( 'themoneytizer_site_ads_version', stripslashes($body->ads_version));
            update_option( 'themoneytizer_site_reason_refus', stripslashes($body->raison_refus));
            update_option( 'themoneytizer_site_url', stripslashes($body->site_url));
            update_option( 'themoneytizer_site_id',stripslashes($body->site_id));

            if (!empty(get_option('themoneytizer_user_paypal'))) {
                update_option('themoneytizer_billing_choice', 2);
            } elseif (!empty(get_option('themoneytizer_user_bank_iban'))) {
                update_option('themoneytizer_billing_choice', 1);
                update_option('themoneytizer_billing_inter', 0);
                if(!empty(get_option('themoneytizer_user_bank_namebank_inter'))){
                    update_option('themoneytizer_billing_inter', 1);
                } 
            }
        }
    }

    /*
    * Retrieve formats information and store it
    */
    $body = ['plateform' => get_option('themoneytizer_user_plateform'), 'version' => get_option('themoneytizer_plugin_version')];
    $url = "https://www.themoneytizer.com/plugin/getAllFormatsInformations?token=$auth";
    $res = post_req($url, $body);
    if($res = json_decode($res)){
        if($res->status == 'success'){
            update_option('themoneytizer_setting_formats', json_encode($res->payload));
        }
    }

    /*
    * Retrieve off formats information and store it
    */
    $body = ['plateform' => get_option('themoneytizer_user_plateform'), 'version' => get_option('themoneytizer_plugin_version')];
    $url = "https://www.themoneytizer.com/plugin/getAllOffFormatsInformations?token=$auth";
    $res = post_req($url, $body);
    if($res = json_decode($res)){
        if($res->status == 'success'){
            update_option('themoneytizer_setting_formats_off', json_encode($res->payload));
        }
    }

    /*
    * Retrieve notifications and store it
    */
    $body = ['plateform' => get_option('themoneytizer_user_plateform'), 'version' => get_option('themoneytizer_plugin_version')];
    $url = "https://www.themoneytizer.com/plugin/getNotifications?token=$auth";
    $res = post_req($url, $body);
    if($res = json_decode($res)){
        if($res->status == 'success'){
            update_option( 'themoneytizer_user_notifications', json_encode($res->payload));
        }
    }

    /*
    * Retrieve notifications and store it
    */
    $body = ['version' => get_option('themoneytizer_plugin_version'), 'local_lang' => get_locale()];
    $url = "https://www.themoneytizer.com/plugin/getStatistics?token=$auth";
    $res = post_req($url, $body);
    if($statistics = json_decode($res)){
        if($statistics->status == 'success') {
            $content = json_encode(array('validity' => 'valid',
                'colors' => $statistics->payload->colors,
                'statistics' => $statistics->payload->statistics)
            );
        } else {
            $content = json_encode(array('validity' => 'invalid'));
        }
        update_option( 'themoneytizer_data_statistics', $content);
    }

    /*
    * Retrieve bills and store it
    */
    $body = ['version' => get_option('themoneytizer_plugin_version'), 'local_lang' => get_locale()];
    $url = "https://www.themoneytizer.com/plugin/getBills?token=$auth";
    $res = post_req($url, $body);
    if($bills_list = json_decode($res)){
        if($bills_list->status == 'success') {
            $content = json_encode(array('validity' => 'valid',
                'bills_e' => $bills_list->payload->bills_e,
                'bills' => $bills_list->payload->bills)
            );
        } else {
            $content = json_encode(array('validity' => 'invalid'));
        }
        update_option( 'themoneytizer_data_bills', $content);
    }
    

    /*
    * Retrieve sponsored list
    */
    $body = [];
    $url = "https://www.themoneytizer.com/plugin/getSponsoredSite?token=$auth";
    $res = post_req($url, $body);
    update_option('themoneytizer_data_sponsored', $res);

    /*
    * Retrieve actions
    */
    $body = ['version' => get_option('themoneytizer_plugin_version')];
    $url = "https://www.themoneytizer.com/plugin/getSiteActions?token=$auth";
    $res = post_req($url, $body);
    if($res = json_decode($res)){
        if($res->status=='success'){
            $payload = json_encode($res->payload);
            update_option('themoneytizer_site_remote', $payload);  
        }
    }

    /*
    * Update site options
    */
    $body = ['version' => get_option('themoneytizer_plugin_version'),
    'auto_cmp' => get_option('themoneytizer_data_auto_cmp'),
    'auto_ads_txt' => get_option('themoneytizer_data_auto_ads_txt'),
    'lazy_loading' => get_option('themoneytizer_data_lazy')];
    $url = "https://www.themoneytizer.com/plugin/setSiteOptionStatus?token=$auth";
    $res = post_req($url, $body);
}