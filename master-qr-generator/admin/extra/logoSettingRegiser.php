<?php



    register_setting("masterqr_logo_posttype", "masterqr_logo_posttype", array());

    add_settings_section("logo_postype_section", " ", array(
        $this,
        'Mastersettting_log_sec_func'
    ) , 'Master_logo_postype_sec');

    add_settings_field("qrc_log_image_upload", esc_html__("Logo Image Upload", "master-qr-generator") , array(
        $this,
        "qrc_log_image_upload"
    ) , 'Master_logo_postype_sec', "logo_postype_section");

    
