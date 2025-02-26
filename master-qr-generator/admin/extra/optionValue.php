    <?php
    $options = get_option('masterqr_settings');
    $options1 = get_option('masterqr_pagety');
    $print_clor = (isset($options['print_clor'])) ? $options['print_clor'] : '#fff';
    $print_background = (isset($options['print_background'])) ? $options['print_background'] : '#e53463';
    $qr_print_text = isset($options['qr_print_text']) ? $options['qr_print_text'] : 'Print QR';
    $qr_print_hide = isset($options['qr_print_hide']) ? $options['qr_print_hide'] : 'no';

    $qrc_size = isset($options['qr_code_picture_size_width']) ? $options['qr_code_picture_size_width'] : 254;

    $qrc_bgcolor = isset($options['background']) ? $options['background'] : 'transparent';

    $qrc_color = isset($options['qr_color']) ? $options['qr_color'] : '#01026d';

    $dot_scale = isset($options['dot_scale']) ? $options['dot_scale'] : 0.6;
    $download_qr = isset($options['qr_download_text']) ? $options['qr_download_text'] : 'Download QR';
    $qr_download_hide = isset($options['qr_download_hide']) ? $options['qr_download_hide'] : 'no';
    $qr_dwnbtn_color = isset($options['dt_clor']) ? $options['dt_clor'] : '#fff';
    $qr_dwnbtnbg_color = isset($options['dt_background']) ? $options['dt_background'] : '#e53463';

    global $wp;
    $current_id_link = home_url(add_query_arg(array() , $wp->request));

    $current_id = get_the_ID();
    $current_title = get_the_title(get_the_id());

    $qrc_meta_display = get_post_meta($current_id, 'masterqr_meta', true);

    $qrc_qr_image = '';
    $post_types = get_post_types();

    if (!empty($options))
    {
    $singlular_exclude = is_singular($options);
    }
    else
    {
    $singlular_exclude = '';
    }

    $qrc_alignment = isset($options1['qrc_select_alignment']) ? $options1['qrc_select_alignment'] : 'left';

    $qrc_wc_alignment = isset($options1['qrc_wc_select_alignment']) ? $options1['qrc_wc_select_alignment'] : 'left';
