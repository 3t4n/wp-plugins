<?php

    register_setting("masterqr_settings", "masterqr_settings", array(
        $this,
        'master_option_page_sanitize'
    ));

    register_setting("masterqr_pagety", "masterqr_pagety", array(
        $this,
        'master_opagetype_sanitize'
    ));

    add_settings_section("master_pagestysetting", " ", array(
        $this,
        'settting_sec_func'
    ) , 'master_pagty_sec');

    add_settings_section("master_section_setting", " ", array(
        $this,
        'settting_sec_func'
    ) , 'master_admin_sec');

    add_settings_field("qr_code_size", esc_html__("QR Code Size", "master-qr-generator") , array(
        $this,
        "qr_input_size"
    ) , 'master_admin_sec', "master_section_setting");

    add_settings_field("dot_scale", esc_html__("QR Dot Scale", "master-qr-generator") , array(
        $this,
        "dot_scale"
    ) , 'master_admin_sec', "master_section_setting");

    add_settings_field("qr_color_management", esc_html__("QR Dot Color", "master-qr-generator") , array(
        $this,
        "qr_color_management"
    ) , 'master_admin_sec', "master_section_setting");
    add_settings_field("background", esc_html__("Background Color", "master-qr-generator") , array(
        $this,
        "background"
    ) , 'master_admin_sec', "master_section_setting",array('class'=>'mqrbgchnage'));

    add_settings_field("qrc_logo_image", esc_html__("Logo Image", "master-qr-generator") , array(
        $this,
        "qrc_logo_image"
    ) , 'master_admin_sec', "master_section_setting");

    add_settings_field("qrc_logo_bgimage", esc_html__("Background Image", "master-qr-generator") , array(
        $this,
        "qrc_logo_bgimage"
    ) , 'master_admin_sec', "master_section_setting");

    add_settings_field("qrdowtext", esc_html__("Download Button", "master-qr-generator") , array(
        $this,
        "qrdowtext"
    ) , 'master_admin_sec', "master_section_setting",array("class" => "MqrDwnbtn"));
    add_settings_field("qr_download_show", esc_html__("Show / hide", "master-qr-generator") , array(
        $this,
        "qr_download_show"
    ) , 'master_admin_sec', "master_section_setting");
    add_settings_field("qr_download_text", esc_html__("Button Label", "master-qr-generator") , array(
        $this,
        "qr_download_text"
    ) , 'master_admin_sec', "master_section_setting");

    add_settings_field("qr_download_text_c", esc_html__("Button Color", "master-qr-generator") , array(
        $this,
        "qr_download_text_c"
    ) , 'master_admin_sec', "master_section_setting");
    add_settings_field("qrcbtnbg", esc_html__("Button Background", "master-qr-generator") , array(
        $this,
        "qrcbtnbg"
    ) , 'master_admin_sec', "master_section_setting");

    add_settings_field("qrdowtexts", esc_html__("Print Button", "master-qr-generator") , array(
        $this,
        "qrdowtext"
    ) , 'master_admin_sec', "master_section_setting",array("class" => "MqrDwnbtn"));

    add_settings_field("qr_print_show", esc_html__("Show / Hide", "master-qr-generator") , array(
        $this,
        "qr_print_show"
    ) , 'master_admin_sec', "master_section_setting");

    add_settings_field("qr_print_text", esc_html__("Button Label", "master-qr-generator") , array(
        $this,
        "qr_print_text"
    ) , 'master_admin_sec', "master_section_setting");

    add_settings_field("qr_print_text_c", esc_html__("Button Color", "master-qr-generator") , array(
        $this,
        "qr_print_text_c"
    ) , 'master_admin_sec', "master_section_setting");

    add_settings_field("qr_printbtnbg", esc_html__("Button Background", "master-qr-generator") , array(
        $this,
        "qr_printbtnbg"
    ) , 'master_admin_sec', "master_section_setting");


    add_settings_field("qr_checkbox", esc_html__("Hide QR code according to post type", "master-qr-generator") , array(
        $this,
        "qr_checkbox"
    ) , 'master_pagty_sec', "master_pagestysetting");

    add_settings_field("qr_alignment", esc_html__("QR Alignment", "master-qr-generator") , array(
        $this,
        "qr_alignment"
    ) , 'master_pagty_sec', "master_pagestysetting");

    if (class_exists('WooCommerce'))
    {


        add_settings_field("master_wc_ptab_name", esc_html__("Customize Text in Product Page", "master-qr-generator") , array(
            $this,
            "master_wc_ptab_name"
        ) , 'master_pagty_sec', "master_pagestysetting");
        add_settings_field("mqr_wcalignment", esc_html__("QR Alignment(Product Page)", "master-qr-generator") , array(
            $this,
            "mqr_wcalignment"
        ) , 'master_pagty_sec', "master_pagestysetting");
    }

    add_settings_field("qr_stcode_management", esc_html__("Shortcode for Current Page URL", "master-qr-generator") , array(
        $this,
        "qr_stcode_management"
    ) , 'master_pagty_sec', "master_pagestysetting");

    add_settings_field("master_stcode_postype", esc_html__("Display QR list by post type ", "master-qr-generator") , array(
        $this,
        "master_stcode_postype"
    ) , 'master_pagty_sec', "master_pagestysetting");

