<?php
// If this file is called directly, abort.
if (!defined('WPINC')) die;

?>
<div class="wrap">
    <h2>Easy Store Customizer</h2>
</div>

<div class="esc-settings-container">
    <div class="esc-settings-main">
        <form method="post" id="esc-settings-form">
            <?php
            // Get existing options, if none exist it will return false
            $existing_options = get_option($this->plugin_name);

            // If no options exist yet, use defaults
            $options = ($existing_options === false) ? $this->settings->get_defaults() : $existing_options;

            ?>

            <div class="esc-settings-section">
                <div class="esc-card">
                    <h2><?php esc_html_e('Shop Page', 'easy-store-customizer'); ?></h2>
                    <?php
                    /**
                     *  "Add to cart" Button Label
                     * 
                     */
                    $this->generate_feature_control('shop_add_to_cart', $options);

                    /**
                     *  Products Per Page
                     * 
                     */
                    $this->generate_feature_control('shop_product_per_page', $options);
                    ?>
                </div>

                <div class="esc-card">
                    <h2><?php esc_html_e('Product Page', 'easy-store-customizer'); ?></h2>

                    <?php
                    /**
                     *  Product Quantity Input Plus Minus Buttons
                     * 
                     */

                    $this->generate_feature_control('product_qty_input_plus_minus', $options);

                    /**
                     *  Product Quantity Input Arrows
                     * 
                     */

                    $this->generate_feature_control('product_qty_input_arrows', $options);

                    /**
                     *  Show Number of Products sold
                     * 
                     */

                    $this->generate_feature_control('product_show_number_sold', $options);

                    ?>
                </div>
            </div>

            <?php submit_button(); ?>
        </form>
    </div>

    <div class="esc-settings-sidebar">
        <div class="esc-card">
            <h3><?php esc_html_e('About Easy Store Customizer', 'easy-store-customizer'); ?></h3>
            <p><?php esc_html_e('Enhance your WooCommerce store with useful features - no coding required!', 'easy-store-customizer'); ?></p>
            <hr>
            <h4><?php esc_html_e('Quick Links', 'easy-store-customizer'); ?></h4>
            <ul>
                <li><a href="https://wordpress.org/support/plugin/easy-store-customizer/" target="_blank"><?php esc_html_e('Support', 'easy-store-customizer'); ?></a></li>
                <li><a href="https://wordpress.org/plugins/easy-store-customizer/#reviews" target="_blank"><?php esc_html_e('Leave a Review', 'easy-store-customizer'); ?></a></li>
                <li><a href="https://100xwpdev.com?utm_source=esc-setting&utm_medium=wp-dash&utm_campaign=esc-setting" target="_blank"><?php esc_html_e('About Author', 'easy-store-customizer'); ?></a></li>
            </ul>
        </div>
    </div>
</div>