<?php

function init_hooks()
{
    $arcaptcha_size = get_option('arcaptcha_size');

    if ($arcaptcha_size === 'normal') {
        add_action('wp_print_footer_scripts', 'enqueue_script', 9);
        add_filter('script_loader_tag', 'add_id_to_script_digits', 10, 3);

    } else {
        add_action('wp_print_footer_scripts', 'enqueue_invisible_script', 9);
        add_filter('script_loader_tag', 'add_id_to_script_digits_invisible', 10, 3);

    }

    add_action('wp_ajax_nopriv_digits_submit_form', 'check_arcaptcha', 9);

    add_action('wp_ajax_nopriv_digits_check_mob', 'check_arcaptcha', 9);

    add_action('wp_ajax_digits_check_mob', 'check_arcaptcha', 9);
}

function check_arcaptcha()
{
    if (!isset($_POST['arcaptcha-token']) || arcaptcha_request_verify($_POST['arcaptcha-token']) !== 'success') {
        $current_filter = current_filter();

        if ($current_filter === 'wp_ajax_nopriv_digits_submit_form') {
            wp_send_json(
                array(
                    'success' => false,
                    'data'    => array(
                        'code' => '0',
                        'msg'  => __('Please complete the captcha.', 'arcaptcha-plugin')
                    )
                )
            );
        } else if ($current_filter === 'wp_ajax_digits_check_mob' || $current_filter === 'wp_ajax_nopriv_digits_check_mob') {
            wp_send_json_error(array('message' => __('Please complete the captcha.', 'arcaptcha-plugin')));

        }
        die();

    }
}

function add_id_to_script_digits($tag, $handle, $source)
{
    if ('digits-arcaptcha' === $handle) {
        $arcaptcha_api_key = esc_html(get_option('arcaptcha_api_key'));
        $arcaptcha_theme = get_option('arcaptcha_theme');
        $arcaptcha_language = get_option("arcaptcha_language");
        $arcaptcha_color = get_option("arcaptcha_color");
        // $arcaptcha_size = get_option("arcaptcha_size");

        $tag = sprintf('<script type="text/javascript" src="%s" data-site-key="%s" data-theme="%s" data-lang="%s" data-color="%s"></script>',
            $source,
            $arcaptcha_api_key,
            $arcaptcha_theme,
            $arcaptcha_language,
            $arcaptcha_color,
            // $arcaptcha_size
        );

    }

    return $tag;
}

function add_id_to_script_digits_invisible($tag, $handle, $source)
{
    if ('digits-invisible-arcaptcha' === $handle) {
        $arcaptcha_api_key = esc_html(get_option('arcaptcha_api_key'));
        $arcaptcha_theme = get_option('arcaptcha_theme');
        $arcaptcha_language = get_option("arcaptcha_language");
        $arcaptcha_color = get_option("arcaptcha_color");
        $arcaptcha_size = get_option("arcaptcha_size");

        $tag = sprintf('<script type="text/javascript" src="%s" data-site-key="%s" data-theme="%s" data-lang="%s" data-color="%s" data-size="%s"></script>',
            $source,
            $arcaptcha_api_key,
            $arcaptcha_theme,
            $arcaptcha_language,
            $arcaptcha_color,
            $arcaptcha_size
        );

    }

    return $tag;
}

function enqueue_script()
{
    wp_enqueue_style('arcaptcha-style', ARCAPTCHA_URL . '/assets/css/arcaptcha-style.css');

    wp_enqueue_script(
        'digits-arcaptcha',
        ARCAPTCHA_URL . '/assets/js/digits.js',
        [],
        ARCAPTCHA_VERSION,
        true
    );
}

function enqueue_invisible_script()
{
    wp_enqueue_script(
        'digits-invisible-arcaptcha',
        ARCAPTCHA_URL . '/assets/js/digits-invisible.js',
        [],
        ARCAPTCHA_VERSION,
        true
    );
}

init_hooks();
