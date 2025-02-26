<?php

class AllContactOrgV_Shortcodes {
    

    public function register(){
        add_action('init',[$this,'register_shortcode']);
    }

    public function register_shortcode(){
        add_shortcode('allcontactv_address', [$this,'allcontactv_address_shortcode']);
        add_shortcode('allcontact_telephon', [$this,'allcontactv_telephon_shortcode']);
        add_shortcode('allcontact_telephon2', [$this,'allcontactv_telephon2_shortcode']);
        add_shortcode('allcontact_comers_text', [$this,'allcontactv_comers_text_shortcode']);
    }

    public function allcontactv_address_shortcode() {
        $options = get_option('allcontactorgv_settings_options');
		return isset($options['allcontact_address']) ? $options['allcontact_address'] : "";
	}

    public function allcontactv_telephon_shortcode() {
        $options = get_option('allcontactorgv_settings_options');
		return isset($options['allcontact_telephon']) ? $options['allcontact_telephon'] : "";
	}
    public function allcontactv_telephon2_shortcode() {
        $options = get_option('allcontactorgv_settings_options');
		return isset($options['allcontact_telephon2']) ? $options['allcontact_telephon2'] : "";
	}

    public function allcontactv_comers_text_shortcode() {
        $options = get_option('allcontactorgv_settings_options');
		return isset($options['allcontact_comers_text']) ? $options['allcontact_comers_text'] : "";
	}




}

$AllContactOrgV_Shortcodes = new AllContactOrgV_Shortcodes();
$AllContactOrgV_Shortcodes->register();
?>