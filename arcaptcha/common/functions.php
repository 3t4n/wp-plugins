<?php

add_filter('script_loader_tag', 'add_id_to_script', 10, 3);

function add_id_to_script($tag, $handle, $source)
{
    if ('arcaptcha-invisible-login-script' === $handle) {
        $arcaptcha_api_key = get_option('arcaptcha_api_key');
        $arcaptcha_theme = get_option('arcaptcha_theme');
        $arcaptcha_language = get_option("arcaptcha_language");
        $arcaptcha_color = get_option("arcaptcha_color");

        $tag = sprintf(
            '<script type="text/javascript" src="%s" data-site-key="%s" data-theme="%s" data-lang="%s" data-color="%s"></script>',
            $source,
            $arcaptcha_api_key,
            $arcaptcha_theme,
            $arcaptcha_language,
            $arcaptcha_color
        );
    }

    return $tag;
}

function arcaptcha_invisible_srcipt()
{
    wp_enqueue_script(
        'arcaptcha-invisible-login-script',
        ARCAPTCHA_URL . '/default/invisible.js',
        [],
        ARCAPTCHA_VERSION,
        true
    );
}

function is_off_or_on($value)
{
    return in_array($value, ['on', 'off']);
}

/**
 * Functions file.
 *
 * @package arcaptcha-wp
 */

/**
 * Get ARCaptcha form.
 *
 * @return false|string
 */
function arcap_form()
{
    ob_start();
    arcap_form_display();
    return ob_get_clean();
}

/**
 * Display ARCaptcha form.
 */
function arcap_form_display()
{
    $arcaptcha_api_key = get_option('arcaptcha_api_key');
    $arcaptcha_theme = get_option('arcaptcha_theme');
    $arcaptcha_language = get_option("arcaptcha_language");
    $arcaptcha_color = get_option("arcaptcha_color");
?>
    <div class="arcaptcha" style="margin-bottom: 16px;" data-site-key="<?php echo esc_html($arcaptcha_api_key); ?>" data-lang="<?php echo esc_html($arcaptcha_language); ?>" data-color="<?php echo esc_html($arcaptcha_color); ?>" data-theme="<?php echo esc_html($arcaptcha_theme); ?>">
    </div>
<?php
}

/**
 * Display ARCaptcha shortcode.
 *
 * @param string $content arcaptcha shortcode content.
 *
 * @return string
 */
function arcap_shortcode($content = '')
{
    $arcaptcha = apply_filters('arcap_arcaptcha_content', arcap_form());

        // return $content . $arcaptcha;
        return $arcaptcha;

}

add_shortcode('arcaptcha', 'arcap_shortcode');

/**
 * List of hcap options.
 */
function arcap_options()
{
    return array(
        'arcaptcha_api_key'             => array(
            'label'    => __('ARCaptcha Site Key', 'arcaptcha-plugin'),
            'type'     => 'text',
            'validate' => function ($value) {
                return is_string($value) && strlen($value) === 10;
            }
        ),
        'arcaptcha_secret_key'          => array(
            'label'    => __('ARCaptcha Secret Key', 'arcaptcha-plugin'),
            'type'     => 'password',
            'validate' => function ($value) {
                return is_string($value);
            }
        ),
        'arcaptcha_theme'               => array(
            'label'    => __('ARCaptcha Theme', 'arcaptcha-plugin'),
            'type'     => 'select',
            'options'  => array(
                'light' => __('Light', 'arcaptcha-plugin'),
                'dark'  => __('Dark', 'arcaptcha-plugin')
            ),
            'validate' => function ($value) {
                return is_string($value) && ($value === 'light' || $value === 'dark');
            }
        ),
        'arcaptcha_size'                => array(
            'label'    => __('ARCaptcha Size', 'arcaptcha-plugin'),
            'type'     => 'select',
            'options'  => array(
                'normal'    => __('Normal', 'arcaptcha-plugin'),
                'invisible' => __('Invisible', 'arcaptcha-plugin')
            ),
            'validate' => function ($value) {
                return is_string($value) && ($value === 'normal' || $value === 'invisible');
            }
        ),
        'arcaptcha_language'            => array(
            'label'    => __('Override Language Detection (optional)', 'arcaptcha-plugin'),
            'type'     => 'select',
            'options'  => array(
                'fa' => __('fa', 'arcaptcha-plugin'),
                'en' => __('en', 'arcaptcha-plugin')
            ),
            'validate' => function ($value) {
                return is_string($value) && ($value === 'en' || $value === 'fa');
            }
        ),
        'arcaptcha_color'               => array(
            'label'    => __('ARCaptcha Color', 'arcaptcha-plugin'),
            'type'     => 'text',
            'validate' => function ($value) {
                return is_string($value);
            }
        ),
        // 'arcaptcha_recaptchacompat'          => array(
        //     'label' => __('Disable reCAPTCHA Compatibility (use if including both ARCaptcha and reCAPTCHA on the same page)', 'arcaptcha-plugin'),
        //     'type'  => 'checkbox'
        // ),
        // 'arcaptcha_nf_status'                => array(
        //     'label' => __('Enable Ninja Forms Addon', 'arcaptcha-plugin'),
        //     'type'  => 'checkbox'
        // ),
        // 'arcaptcha_cf7_status'               => array(
        //     'label' => __('Enable Contact Form 7 Addon', 'arcaptcha-plugin'),
        //     'type'  => 'checkbox'
        // ),
        'arcaptcha_lf_status'           => array(
            'label'    => __('Enable ARCaptcha on Login Form', 'arcaptcha-plugin'),
            'type'     => 'checkbox',
            'validate' => function ($value) {
                return is_off_or_on($value);
            }
        ),
        'arcaptcha_rf_status'           => array(
            'label'    => __('Enable ARCaptcha on Register Form', 'arcaptcha-plugin'),
            'type'     => 'checkbox',
            'validate' => function ($value) {
                return is_off_or_on($value);
            }
        ),
        'arcaptcha_cmf_status'          => array(
            'label'    => __('Enable ARCaptcha on Comment Form', 'arcaptcha-plugin'),
            'type'     => 'checkbox',
            'validate' => function ($value) {
                return is_off_or_on($value);
            }
        ),
        'arcaptcha_lpf_status'          => array(
            'label'    => __('Enable ARCaptcha on Lost Password Form', 'arcaptcha-plugin'),
            'type'     => 'checkbox',
            'validate' => function ($value) {
                return is_off_or_on($value);
            }
        ),
        'arcaptcha_wc_login_status'     => array(
            'label'    => __('Enable ARCaptcha on WooCommerce Login Form', 'arcaptcha-plugin'),
            'type'     => 'checkbox',
            'validate' => function ($value) {
                return is_off_or_on($value);
            }
        ),
        'arcaptcha_wc_reg_status'       => array(
            'label'    => __('Enable ARCaptcha on WooCommerce Registration Form', 'arcaptcha-plugin'),
            'type'     => 'checkbox',
            'validate' => function ($value) {
                return is_off_or_on($value);
            }
        ),
        'arcaptcha_wc_lost_pass_status' => array(
            'label'    => __('Enable ARCaptcha on WooCommerce Lost Password Form', 'arcaptcha-plugin'),
            'type'     => 'checkbox',
            'validate' => function ($value) {
                return is_off_or_on($value);
            }
        ),
        'arcaptcha_wc_checkout_status'  => array(
            'label'    => __('Enable ARCaptcha on WooCommerce Checkout Form', 'arcaptcha-plugin'),
            'type'     => 'checkbox',
            'validate' => function ($value) {
                return is_off_or_on($value);
            }
        ),
        // 'arcaptcha_bp_reg_status'            => array(
        //     'label' => __('Enable ARCaptcha on Buddypress Registration Form', 'arcaptcha-plugin'),
        //     'type'  => 'checkbox'
        // ),
        // 'arcaptcha_bp_create_group_status'   => array(
        //     'label' => __('Enable ARCaptcha on BuddyPress Create Group Form', 'arcaptcha-plugin'),
        //     'type'  => 'checkbox'
        // ),
        // 'arcaptcha_bbp_new_topic_status'     => array(
        //     'label' => __('Enable ARCaptcha on bbPress New Topic Form', 'arcaptcha-plugin'),
        //     'type'  => 'checkbox'
        // ),
        // 'arcaptcha_bbp_reply_status'         => array(
        //     'label' => __('Enable ARCaptcha on bbPress Reply Form', 'arcaptcha-plugin'),
        //     'type'  => 'checkbox'
        // ),
        'arcaptcha_wpforms_status'      => array(
            'label'    => __('Enable ARCaptcha on WPForms Lite', 'arcaptcha-plugin'),
            'type'     => 'checkbox',
            'validate' => function ($value) {
                return is_off_or_on($value);
            }
        ),
        'arcaptcha_wpforms_pro_status'  => array(
            'label'    => __('Enable ARCaptcha on WPForms Pro', 'arcaptcha-plugin'),
            'type'     => 'checkbox',
            'validate' => function ($value) {
                return is_off_or_on($value);
            }
        ),

        'arcaptcha_cf7_status'          => array(
            'label'    => __('Enable Contact Form 7 Addon', 'arcaptcha-plugin'),
            'type'     => 'checkbox',
            'validate' => function ($value) {
                return is_off_or_on($value);
            }
        ),
        'arcaptcha_digits_status'       => array(
            'label'    => __('Enable Digits', 'arcaptcha-plugin'),
            'type'     => 'checkbox',
            'validate' => function ($value) {
                return is_off_or_on($value);
            }
        ),
        'arcaptcha_elementor-pro_status'       => array(
            'label'    => __('Enable ElementorPro Addon', 'arcaptcha-plugin'),
            'type'     => 'checkbox',
            'validate' => function ($value) {
                return is_off_or_on($value);
            }
        )
        // 'arcaptcha_wpforo_new_topic_status'  => array(
        //     'label' => __('Enable ARCaptcha on WPForo New Topic Form', 'arcaptcha-plugin'),
        //     'type'  => 'checkbox'
        // ),
        // 'arcaptcha_wpforo_reply_status'      => array(
        //     'label' => __('Enable ARCaptcha on WPForo Reply Form', 'arcaptcha-plugin'),
        //     'type'  => 'checkbox'
        // ),
        // 'arcaptcha_mc4wp_status'             => array(
        //     'label' => __('Enable ARCaptcha on Mailchimp for WP Form', 'arcaptcha-plugin'),
        //     'type'  => 'checkbox'
        // ),
        // 'arcaptcha_jetpack_cf_status'        => array(
        //     'label' => __('Enable ARCaptcha on Jetpack Contact Form', 'arcaptcha-plugin'),
        //     'type'  => 'checkbox'
        // ),
        // 'arcaptcha_subscribers_status'       => array(
        //     'label' => __('Enable ARCaptcha on Subscribers Form', 'arcaptcha-plugin'),
        //     'type'  => 'checkbox'
        // ),
        // 'arcaptcha_wc_wl_create_list_status' => array(
        //     'label' => __('Enable ARCaptcha on WooCommerce Wishlists Create List Form', 'arcaptcha-plugin'),
        //     'type'  => 'checkbox'
        // )
    );
}
