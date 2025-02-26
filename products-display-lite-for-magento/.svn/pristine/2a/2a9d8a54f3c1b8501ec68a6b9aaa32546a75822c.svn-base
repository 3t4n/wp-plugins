<?php 
/**
 * Plugin Name: Products Display Lite for Magento
 * Plugin URI: https://myaiplugins.com/plugins/products-display-for-magento/
 * Description: A plugin to display Magento product information via shortcode.
 * Version: 1.1
 * Author: mywpplugin
 * Text Domain: products-display-lite-for-magento
 * License: GPLv2 or later
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Include necessary files
include_once plugin_dir_path(__FILE__) . 'extensions/shortcode.php';

// Add link to settings page in plugin list
function pdlm_add_plugin_action_links($links) {
    $settings_link = '<a href="' . admin_url('options-general.php?page=pdlm-settings') . '">' . esc_html__('Settings', 'products-display-lite-for-magento') . '</a>';
    array_unshift($links, $settings_link);
    return $links;
}
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'pdlm_add_plugin_action_links');

// Add settings page for the plugin
function pdlm_add_settings_menu() {
    add_options_page(
        esc_html__('Products Display Lite for Magento Settings', 'products-display-lite-for-magento'),
        esc_html__('Products Display Lite for Magento', 'products-display-lite-for-magento'),
        'manage_options',
        'pdlm-settings',
        'pdlm_render_settings_page'
    );
}
add_action('admin_menu', 'pdlm_add_settings_menu');

// Register settings
function pdlm_register_settings() {
    register_setting(
        'pdlm_settings_group',
        'pdlm_access_token',
        array(
            'type' => 'string',
            'description' => 'Magento API Access Token',
            'sanitize_callback' => 'sanitize_text_field',
            'show_in_rest' => false,
            'default' => ''
        )
    );

    register_setting(
        'pdlm_settings_group',
        'pdlm_domain',
        array(
            'type' => 'string',
            'description' => 'Magento Store Domain',
            'sanitize_callback' => 'pdlm_sanitize_domain',
            'show_in_rest' => false,
            'default' => ''
        )
    );

    register_setting(
        'pdlm_settings_group',
        'pdlm_url_suffix',
        array(
            'type' => 'string',
            'description' => 'Product URL Suffix',
            'sanitize_callback' => 'sanitize_text_field',
            'show_in_rest' => false,
            'default' => '.html'
        )
    );

}
add_action('admin_init', 'pdlm_register_settings');

// Sanitization function for domain
function pdlm_sanitize_domain($domain) {
    $domain = trim($domain);
    $domain = preg_replace('#^https?://#', '', $domain);
    $domain = rtrim($domain, '/');
    return sanitize_text_field($domain);
}

// Display the settings page
function pdlm_render_settings_page() {
    ?>
    <div class="wrap">
        <h1><?php esc_html_e('Products Display Lite for Magento Settings', 'products-display-lite-for-magento'); ?></h1>
        
        <form method="post" action="options.php">
            <?php settings_fields('pdlm_settings_group'); ?>
            <?php do_settings_sections('pdlm_settings_group'); ?>
            
            <table class="form-table">
                <tr valign="top">
                    <th scope="row"><?php esc_html_e('Access Token', 'products-display-lite-for-magento'); ?></th>
                    <td>
                        <input type="text" name="pdlm_access_token" 
                               value="<?php echo esc_attr(get_option('pdlm_access_token')); ?>" 
                               class="regular-text" />
                        <p class="description">
                            <a href="https://devdocs.magento.com/guides/v2.4/get-started/authentication/gs-authentication-token.html" target="_blank">
                                <?php esc_html_e('How to create an Access Token in Magento', 'products-display-lite-for-magento'); ?>
                            </a>
                        </p>
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row"><?php esc_html_e('Magento Domain', 'products-display-lite-for-magento'); ?></th>
                    <td>
                        <input type="text" name="pdlm_domain" 
                               value="<?php echo esc_attr(get_option('pdlm_domain')); ?>" 
                               class="regular-text" />
                        <p class="description">
                            <?php esc_html_e('Example: https://yourmagentostore.com', 'products-display-lite-for-magento'); ?>
                        </p>
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row"><?php esc_html_e('Product URL Suffix', 'products-display-lite-for-magento'); ?></th>
                    <td>
                        <input type="text" name="pdlm_url_suffix" 
                            value="<?php echo esc_attr(get_option('pdlm_url_suffix', '.html')); ?>" 
                            class="regular-text" />
                        <p class="description">
                            <?php esc_html_e('The suffix to append to product URLs (e.g., ".html", "-product" or leave empty for no suffix).', 'products-display-lite-for-magento'); ?>
                        </p>
                    </td>
                </tr>                
            </table>

            <?php submit_button(); ?>
        </form>

        <!-- Test Connection Form -->
        <form method="post">
            <?php wp_nonce_field('pdlm_test_connection_nonce', 'pdlm_test_nonce'); ?>
            <input type="hidden" name="magento_test_connection" value="1" />
            <?php submit_button(esc_html__('Test Connection', 'products-display-lite-for-magento'), 'secondary'); ?>
        </form>

        <?php
        // Handle test connection
        if (isset($_POST['magento_test_connection']) && 
            isset($_POST['pdlm_test_nonce']) && 
            wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['pdlm_test_nonce'])), 'pdlm_test_connection_nonce')) {
            
            $access_token = get_option('pdlm_access_token');
            $domain = get_option('pdlm_domain');

            if (empty($access_token) || empty($domain)) {
                echo '<p style="color: red;">' . esc_html__('Connection failed: Access token or domain is missing.', 'products-display-lite-for-magento') . '</p>';
            } else {
                // Ensure domain starts with https://
                if (strpos($domain, 'http') !== 0) {
                    $domain = 'https://' . $domain;
                }
                $test_api_url = "$domain/rest/V1/products?searchCriteria[pageSize]=1";

                $response = wp_remote_get($test_api_url, [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $access_token,
                    ],
                ]);

                if (is_wp_error($response)) {
                    echo '<p style="color: red;">' . 
                         esc_html__('Connection failed: ', 'products-display-lite-for-magento') . 
                         esc_html($response->get_error_message()) . '</p>';
                } else {
                    $response_code = wp_remote_retrieve_response_code($response);
                    if ($response_code == 200) {
                        echo '<p style="color: green;">' . 
                             esc_html__('Connection successful', 'products-display-lite-for-magento') . '</p>';
                    } else {
                        echo '<p style="color: red;">' . 
                             esc_html__('Connection failed: Invalid response from Magento.', 'products-display-lite-for-magento') . 
                             '</p>';
                    }
                }
            }
        }
        ?>

        <div class="pro-version-box" style="margin-top: 20px;">
            <h2><?php esc_html_e('PRO Version', 'products-display-lite-for-magento'); ?></h2>
            <p><?php esc_html_e('Unlock additional features including Elementor and Gutenberg integration by upgrading to PRO.', 'products-display-lite-for-magento'); ?></p>
            <p><a href="https://myaiplugins.com/plugins/products-display-for-magento/" target="_blank" class="button button-primary">
                <?php esc_html_e('Get the PRO Version Now!', 'products-display-lite-for-magento'); ?>
            </a></p>
        </div>

        <div class="shortcode-attributes">
            <h2><?php esc_html_e('Shortcode Attributes', 'products-display-lite-for-magento'); ?></h2>
            <p><?php esc_html_e('Use the following attributes to customize the Magento product display shortcode:', 'products-display-lite-for-magento'); ?></p>
            <ul>
                <li><strong>sku</strong>: <?php esc_html_e('The SKU of the product to display. Example:', 'products-display-lite-for-magento'); ?> 
                    <code>[magento_product sku="XX-0001"]</code></li>
                <li><strong>domain</strong>: <?php esc_html_e('The domain of your Magento store. Example:', 'products-display-lite-for-magento'); ?> 
                    <code>[magento_product domain="https://yourdomain.com"]</code></li>
                <li><strong>lang</strong>: <?php esc_html_e('The language code for the API call. Example:', 'products-display-lite-for-magento'); ?> 
                    <code>[magento_product lang="en"]</code></li>
                <li><strong>currency</strong>: <?php esc_html_e('The currency symbol to display with the price. Example:', 'products-display-lite-for-magento'); ?> 
                    <code>[magento_product currency="€"]</code></li>
                <li><strong>cta</strong>: <?php esc_html_e('The call-to-action text for the button. Example:', 'products-display-lite-for-magento'); ?> 
                    <code>[magento_product cta="Buy Now!"]</code></li>
                <li><strong>description_length</strong>: <?php esc_html_e('The maximum length of the product description. Example:', 'products-display-lite-for-magento'); ?> 
                    <code>[magento_product description_length="150"]</code></li>
                <li><strong>hide_price</strong>: <?php esc_html_e('Whether to hide the product price. Accepts true or false. Example:', 'products-display-lite-for-magento'); ?> 
                    <code>[magento_product hide_price="true"]</code></li>
            </ul>
            <h3><?php esc_html_e('Full Example', 'products-display-lite-for-magento'); ?></h3>
            <p><code>[magento_product sku="XX-0001" domain="https://yourdomain.com" lang="en" currency="€" cta="Buy Now!" description_length="150" hide_price="false"]</code></p>
        </div>
    </div>
    <?php
}
?>