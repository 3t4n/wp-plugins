<?php
defined('ABSPATH') || die('Cheatin\' uh?');

add_action('wp_ajax_verify_highcompress_api_key', 'verify_highcompress_api_key');
function verify_highcompress_api_key()
{
    
    if (!current_user_can('manage_options')) {
        wp_send_json_error(array('message' => 'Access Denied'), 401);
    }


    if (isset($_POST['verify'])) {
        $key=sanitize_text_field($_POST['key']);
        $auth=get_option('siteurl');
        $url="https://highcompress.com/api/verify?api_key=$key&auth=$auth";
        $body = wp_remote_get($url);
        $api_response = extract(json_decode(wp_remote_retrieve_body($body), true));
        $response = wp_remote_retrieve_body($body);

        if ($status=="201") {
            if (!add_option('HIGHCOMPRESS_PLAN', $plan, '', 'yes')) {
                update_option('HIGHCOMPRESS_PLAN', $plan, '', 'yes');
            }
            if (!add_option('HIGHCOMPRESS_PLAN_NAME', $planname, '', 'yes')) {
                update_option('HIGHCOMPRESS_PLAN_NAME', $planname, '', 'yes');
            }

            if (!add_option('HIGHCOMPRESS_COUNT', '0', '', 'yes')) {
                update_option('HIGHCOMPRESS_COUNT', $remaining, '', 'yes');
            }

            if (!add_option('HIGHCOMPRESS_TOTAL_COUNT', '0', '', 'yes')) {
            }
        } else {
            if (!add_option('HIGHCOMPRESS_PLAN', '0', '', 'yes')) {
                update_option('HIGHCOMPRESS_PLAN', '0', '', 'yes');
            }
            if (!add_option('HIGHCOMPRESS_COUNT', '0', '', 'yes')) {
                update_option('HIGHCOMPRESS_COUNT', '0', '', 'yes');
            }
        }
        //returning json object
        echo wp_kses_post($response);
        wp_die();
    }

    if (isset($_POST['save'])) {
        $key=sanitize_text_field($_POST['key']);
        if (!add_option('HIGHCOMPRESS_API_KEY', $key, '', 'yes')) {
            update_option('HIGHCOMPRESS_API_KEY', $key, '', 'yes');
        }
    }
    if (isset($_POST['lvl'])) {
        $mode=sanitize_text_field($_POST['mode']);
        if (!add_option('HIGHCOMPRESS_MODE', $mode, '', 'yes')) {
            update_option('HIGHCOMPRESS_MODE', $mode, '', 'yes');
        }
    }

    if (isset($_POST['backup'])) {
        $mode=sanitize_text_field($_POST['mode']);
        if (!add_option('HIGHCOMPRESS_AUTOBACKUP_RULE', $mode, '', 'yes')) {
            update_option('HIGHCOMPRESS_AUTOBACKUP_RULE', $mode, '', 'yes');
        }
    }

    if (isset($_POST['auto'])) {
        $mode=sanitize_text_field($_POST['mode']);
        if (!add_option('HIGHCOMPRESS_AUTOCOMPRESS_RULE', $mode, '', 'yes')) {
            update_option('HIGHCOMPRESS_AUTOCOMPRESS_RULE', $mode, '', 'yes');
        }
    }


    if (isset($_POST['fail'])) {
        update_option('HIGHCOMPRESS_API_KEY', '', 'yes');
    }



    if (isset($_POST['mail'])) {
        $email=sanitize_email($_POST['email']);
        $url="https://www.highcompress.com/email/apigen.php?user_email=$email";
        $response = wp_remote_get($url);
        $api_response = wp_remote_retrieve_body($response);
        echo esc_html($api_response);
    }
    die();
}
