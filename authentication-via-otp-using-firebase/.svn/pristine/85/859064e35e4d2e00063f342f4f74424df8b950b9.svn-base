<?php

/** 
 *   Frontend and backed woocommerce hooks fire hear
 */
$settings_config = get_option('fa_settings_config', true);
if ($settings_config['woo_account'] == 'yes') {
    add_action('woocommerce_login_form_end', 'aafa_login_popup');
    // add_action('woocommerce_register_form_end', 'aafa_login_popup');
}

add_shortcode('fa_login_phone', 'aafa_login_popup');
if (!function_exists('aafa_login_popup')) {
    function aafa_login_popup()
    {
        if (!is_user_logged_in()) {
            $firebase_config = get_option('fa_firebase_config', true);
            $settings_config = get_option('fa_settings_config', true);
            $missing_config = 1;
            $error_message = 'Something Went Wrong';

            if (!empty($firebase_config) && is_array($firebase_config)) {
                if (count(array_filter($firebase_config)) == count($firebase_config)) {
                    $missing_config = 0;
                }
            }
            require AAFA_PLUGIN_PATH . "/template/phone.php";
        }
    }
}

add_action('wp_head', 'aafa_head_style');
if (!function_exists('aafa_head_style')) {
    function aafa_head_style()
    {
        $style_config = get_option('fa_style_config', true); // GET genral settings
?>
        <style>
            :root {
                /* ==============  Continue with phone number  =============== */
                --fa-button: <?php echo esc_html($style_config['fa_button']) ?>;
                --fa-button-hover: <?php echo esc_html($style_config['fa_button_hover'])  ?>;
                --fa-button-text: <?php echo esc_html($style_config['fa_button_text'])  ?>;
                --fa-button-text-hover: <?php echo esc_html($style_config['fa_button_text_hover'])  ?>;
                --fa-button-border: <?php echo esc_html($style_config['fa_button_border'])  ?>;
                --fa-button-border-hover: <?php echo esc_html($style_config['fa_button_border_hover'])  ?>;
                --fa-button-shadow: <?php echo esc_html($style_config['fa_button_shadow']) ?>;
                --fa-button-shadow-hover: <?php echo esc_html($style_config['fa_button_shadow_hover']) ?>;

                /* ==============  Model popup buttons  =============== */
                --fa-pop-button: <?php echo esc_html($style_config['fa_pop_button'])  ?>;
                --fa-pop-button-hover: <?php echo esc_html($style_config['fa_pop_button_hover']) ?>;
                --fa-pop-button-text: <?php echo esc_html($style_config['fa_pop_button_text']) ?>;
                --fa-pop-button-text-hover: <?php echo esc_html($style_config['fa_pop_button_text_hover']) ?>;
                --fa-pop-button-border: <?php echo esc_html($style_config['fa_pop_button_border']) ?>;
                --fa-pop-button-border-hover: <?php echo esc_html($style_config['fa_pop_button_border_hover']) ?>;
                --fa-pop-button-shadow: <?php echo esc_html($style_config['fa_pop_button_shadow']) ?>;
                --fa-pop-button-shadow-hover: <?php echo esc_html($style_config['fa_pop_button_shadow_hover']) ?>;

                /* ==============  other model things  =============== */
                --fa-popup-bg: <?php echo esc_html($style_config['fa_popup_bg'])  ?>;
                --fa-popup-text: <?php echo esc_html($style_config['fa_popup_text'])  ?>;
                --fa-popup-error: <?php echo esc_html($style_config['fa_popup_error'])  ?>;
                --fa-popup-success: <?php echo esc_html($style_config['fa_popup_success'])  ?>;
                --fa-popup-loader: <?php echo esc_html($style_config['fa_popup_loader'])  ?>;
                --fa-popup-loader-border: <?php echo esc_html($style_config['fa_popup_loader_border'])  ?>;
            }
        </style>
<?php
    }
}
