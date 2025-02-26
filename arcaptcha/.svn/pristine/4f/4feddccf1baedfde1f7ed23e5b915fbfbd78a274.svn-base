<?php
    /**
     * WooCommerce checkout form file.
     *
     * @package arcaptcha-wp
     */

    // If this file is called directly, abort.
    if (!defined('ABSPATH')) {
        // @codeCoverageIgnoreStart
        exit;
        // @codeCoverageIgnoreEnd
    }

    /**
     * Checkout form.
     */
    function arcap_display_wc_checkout()
    {
        $arcaptcha_size = get_option('arcaptcha_size');
        if ($arcaptcha_size === 'invisible') {
            arcaptcha_invisible_srcipt();
            $arcaptcha_api_key = get_option('arcaptcha_api_key');
            $arcaptcha_theme = get_option('arcaptcha_theme');
            $arcaptcha_language = get_option("arcaptcha_language");
            $arcaptcha_color = get_option("arcaptcha_color");
        ?>
	    <div
		class="arcaptcha"
        style="margin-bottom: 16px;"
        data-size="invisible"
		data-site-key="<?php echo esc_html($arcaptcha_api_key); ?>"
		data-lang="<?php echo esc_html($arcaptcha_language); ?>"
		data-color="<?php echo esc_html($arcaptcha_color); ?>"
		data-theme="<?php echo esc_html($arcaptcha_theme); ?>">
	    </div>
	    <?php
            } else {
                    arcap_form_display();
                }

                wp_nonce_field('arcaptcha_wc_checkout', 'arcaptcha_wc_checkout_nonce');
            }

            add_filter('woocommerce_order_button_html', 'custom_order_button_html');
            function custom_order_button_html($button)
            {
                $first_section_til = strpos($button, '<button') + 7;

                $first_section = substr($button, 0, $first_section_til);

                $last_section = substr($button, $first_section_til);

                $arcap_button = $first_section . ' onclick="return placeOrderClicked()" ' . $last_section;

                return $arcap_button;
            }

            add_action('woocommerce_after_checkout_billing_form', 'arcap_display_wc_checkout', 10, 0);

            /**
             * Verify checkout form.
             */
            function arcap_verify_wc_checkout_captcha()
            {
                $error_message = arcaptcha_get_verify_message(
                    'arcaptcha_wc_checkout_nonce',
                    'arcaptcha_wc_checkout'
                );

                if (null !== $error_message) {
                    wc_add_notice($error_message, 'error');
                }
            }

        add_action('woocommerce_checkout_process', 'arcap_verify_wc_checkout_captcha');
