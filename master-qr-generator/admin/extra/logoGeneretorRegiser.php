<?php



    register_setting("masterqr_link_generator", "masterqr_link_generator", array(
        $this,
        'qr_log_option_page_sanitize'
    ));

    add_settings_section("logo_master_section_setting", " ", array(
        $this,
        'Mastersettting_log_sec_func'
    ) , 'Master_logo_admin_sec');

    add_settings_field("qr_code_custom_text", esc_html__("Custom Link/Text", "master-qr-generator") , array(
        $this,
        "qr_code_custom_text"
    ) , 'Master_logo_admin_sec', "logo_master_section_setting");

    add_settings_field("qr_code_mail_text", esc_html__("QR for WhatsApp ", "master-qr-generator") , array(
        $this,
        "qr_code_mail_text"
    ) , 'Master_logo_admin_sec', "logo_master_section_setting");

    add_settings_field("qr_code_wifi_text", esc_html__("QR for Wifi ", "master-qr-generator") , array(
        $this,
        "qr_code_wifi_text"
    ) , 'Master_logo_admin_sec', "logo_master_section_setting");

    add_settings_field("qr_code_maps_text", esc_html__("QR for Maps ", "master-qr-generator") , array(
        $this,
        "qr_code_maps_text"
    ) , 'Master_logo_admin_sec', "logo_master_section_setting");

    add_settings_field("master_qr_vcard", esc_html__("Contact info(Vcard)", "master-qr-generator") , array(
        $this,
        "master_qr_vcard"
    ) , 'Master_logo_admin_sec', "logo_master_section_setting");
   