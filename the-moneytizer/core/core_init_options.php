<?php
/*
* Init lazy data
*/
if(!get_option('themoneytizer_setting_init')){

    #Init->Internal Settings
    register_setting('themoneytizer_settings_group', 'themoneytizer_setting_init');
    register_setting('themoneytizer_settings_group', 'themoneytizer_data_lazy');
    register_setting('themoneytizer_settings_group', 'themoneytizer_setting_version');
    register_setting('themoneytizer_settings_group', 'themoneytizer_data_statistics');
    register_setting('themoneytizer_settings_group', 'themoneytizer_user_notifications');
    register_setting('themoneytizer_settings_group', 'themoneytizer_user_language');
    
    #Init->Site
    register_setting('themoneytizer_settings_group', 'themoneytizer_site_id');

    #Init->User
    register_setting('themoneytizer_settings_group', 'themoneytizer_is_registered');
	register_setting('themoneytizer_settings_group', 'themoneytizer_user_name');
	register_setting('themoneytizer_settings_group', 'themoneytizer_user_firstname');
	register_setting('themoneytizer_settings_group', 'themoneytizer_user_mail');
	register_setting('themoneytizer_settings_group', 'themoneytizer_user_tel');
	register_setting('themoneytizer_settings_group', 'themoneytizer_user_currency');
	register_setting('themoneytizer_settings_group', 'themoneytizer_user_password');
	register_setting('themoneytizer_settings_group', 'themoneytizer_user_address');
	register_setting('themoneytizer_settings_group', 'themoneytizer_user_zip_code');
	register_setting('themoneytizer_settings_group', 'themoneytizer_user_city');
	register_setting('themoneytizer_settings_group', 'themoneytizer_user_country');
    register_setting('themoneytizer_settings_group', 'themoneytizer_user_type_structure');
    register_setting('themoneytizer_settings_group', 'themoneytizer_user_sponsorship');
	register_setting('themoneytizer_settings_group', 'themoneytizer_user_reason_added');
    register_setting('themoneytizer_settings_group', 'themoneytizer_user_reason_added_other');
    register_setting('themoneytizer_settings_group', 'themoneytizer_user_sponsorship_code');

    #Init->Bank
    register_setting('themoneytizer_settings_group', 'themoneytizer_user_bank_iban_inter');
    register_setting('themoneytizer_settings_group', 'themoneytizer_user_bank_bic_inter');
    register_setting('themoneytizer_settings_group', 'themoneytizer_user_bank_namebank_inter');
    register_setting('themoneytizer_settings_group', 'themoneytizer_user_bank_adressbank_inter');
    register_setting('themoneytizer_settings_group', 'themoneytizer_user_bank_countrybank_inter');
    register_setting('themoneytizer_settings_group', 'themoneytizer_user_bank_citybank_inter');
    register_setting('themoneytizer_settings_group', 'themoneytizer_user_bank_zipbank_inter');


    register_setting('themoneytizer_settings_group', 'themoneytizer_data_language');
    update_option('themoneytizer_data_language', "en");
    
    register_setting('themoneytizer_settings_group', 'count_call');
    update_option('count_call', 0);

    #Setup
    update_option('themoneytizer_setting_init', true);
    update_option('themoneytizer_data_lazy', json_encode(array()));
    update_option('themoneytizer_plugin_version', '10.0.4');
    update_option('themoneytizer_user_language', 'en');
    update_option( 'themoneytizer_user_notifications', json_encode(array()));
    update_option( 'themoneytizer_data_statistics', json_encode(array()));

    include_once('core_legacy_upgrade.php');
}

/*
* Fix for 46
*/
if(!get_option('themoneytizer_setting_fix_46')){
    if(get_option('themoneytizer_data_auto')){
        $auto_conf = (array)json_decode(get_option('themoneytizer_data_auto'));
        if(gettype($auto_conf)!='array'){
            $auto_conf = [];
        }
        if($auto_conf[46]->status=='true'){
            $auto_conf[46]->tag = '<script defer src="https://cdn.unblockia.com/h.js"></script>';
        }
        update_option('themoneytizer_data_auto', json_encode($auto_conf));
    }

    register_setting('themoneytizer_settings_group', 'themoneytizer_setting_fix_46');
    update_option('themoneytizer_setting_fix_46', true);
}