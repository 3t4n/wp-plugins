<?php
/*
Plugin Name: AntiFake Mate - Phone Blocker
Description: WooCommerce plugin to block specific phone numbers from placing orders.
Version: 1.7
Author: Sm_Rasmy
Author URI: https://rasmyacademy.shop/
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Hook: Initialize plugin functionalities after all plugins are loaded
add_action('plugins_loaded', 'afnk_init_plugin');

function afnk_init_plugin() {
    // Add admin menu for settings
    add_action('admin_menu', 'afnk_add_settings_page');
    // Check phone number during checkout
    add_action('woocommerce_after_checkout_validation', 'afnk_check_number', 10, 2);
}

// Function to sanitize, normalize, and convert Arabic numbers to English
function afnk_normalize_phone($phone) {
    // Convert Arabic numbers to English numbers
    $arabic_to_english_map = [
        '٠' => '0', '١' => '1', '٢' => '2', '٣' => '3', '٤' => '4',
        '٥' => '5', '٦' => '6', '٧' => '7', '٨' => '8', '٩' => '9'
    ];
    $phone = strtr($phone, $arabic_to_english_map);

    // Remove all non-numeric characters
    $phone = preg_replace('/\D/', '', $phone);

    // Remove leading zeros and country codes, adjust based on common country codes you want to handle
    $phone = ltrim($phone, '0');
    if (strpos($phone, '966') === 0) $phone = substr($phone, 3); // Example for Saudi Arabia
    if (strpos($phone, '20') === 0) $phone = substr($phone, 2);  // Example for Egypt

    return $phone;
}

// WooCommerce phone number validation function
function afnk_check_number($data, $errors) {
    $blocked_numbers = get_option('afnk_blocked_phone_numbers', []);

    if (empty($blocked_numbers)) {
        return;
    }

    $entered_phone = afnk_normalize_phone($data['billing_phone']);
    $normalized_blocked_numbers = array_map('afnk_normalize_phone', $blocked_numbers);

    if (in_array($entered_phone, $normalized_blocked_numbers)) {
        $blocked_attempts = get_option('afnk_blocked_phone_attempts', []);
        if (!isset($blocked_attempts[$entered_phone])) {
            $blocked_attempts[$entered_phone] = 0;
        }
        $blocked_attempts[$entered_phone]++;
        update_option('afnk_blocked_phone_attempts', $blocked_attempts);

        $errors->add('blocked_phone', __('This phone number is not allowed to place orders.', 'antifake-mate-phone-blocker'));
    }
}

// Add admin menu for managing blocked phone numbers
function afnk_add_settings_page() {
    add_menu_page(
        'Phone Blocker Settings',
        'Phone Blocker',
        'manage_options',
        'afnk-phone-blocker',
        'afnk_settings_page',
        'dashicons-phone',
        56
    );

    // Add submenu for useful plugins
    add_submenu_page(
        'afnk-phone-blocker', // Parent slug (matches the main menu slug)
        'Must Have Plugins',  // Page title
        'Must Have Plugins',  // Submenu title
        'manage_options',     // Capability
        'afnk-phone-blocker-submenu', // Submenu slug
        'afnk_submenu_page_content'   // Callback function to display content
    );
}

// Render the settings page
function afnk_settings_page() {
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        // Verify nonce
        $nonce = isset($_POST['afnk_nonce']) ? sanitize_text_field(wp_unslash($_POST['afnk_nonce'])) : '';
        if (!wp_verify_nonce($nonce, 'afnk_phone_blocker_action')) {
            wp_die(esc_html__('Unauthorized request', 'antifake-mate-phone-blocker'));
        }

        // Add a phone number
        if (isset($_POST['add_number']) && !empty($_POST['phone_number'])) {
            $blocked_numbers = get_option('afnk_blocked_phone_numbers', []);
            $phone_number = afnk_normalize_phone(sanitize_text_field(wp_unslash($_POST['phone_number'])));

            if (!in_array($phone_number, $blocked_numbers)) {
                $blocked_numbers[] = $phone_number;
                update_option('afnk_blocked_phone_numbers', $blocked_numbers);
                echo '<div class="updated"><p>' . esc_html__('Phone number added successfully.', 'antifake-mate-phone-blocker') . '</p></div>';
            } else {
                echo '<div class="error"><p>' . esc_html__('This phone number is already blocked.', 'antifake-mate-phone-blocker') . '</p></div>';
            }
        }

        // Delete a phone number
        if (isset($_POST['delete_number']) && !empty($_POST['phone_number'])) {
            $blocked_numbers = get_option('afnk_blocked_phone_numbers', []);
            $phone_number = afnk_normalize_phone(sanitize_text_field(wp_unslash($_POST['phone_number'])));

            if (($key = array_search($phone_number, $blocked_numbers)) !== false) {
                unset($blocked_numbers[$key]);
                update_option('afnk_blocked_phone_numbers', array_values($blocked_numbers));
                echo '<div class="updated"><p>' . esc_html__('Phone number deleted successfully.', 'antifake-mate-phone-blocker') . '</p></div>';
            } else {
                echo '<div class="error"><p>' . esc_html__('This phone number was not found.', 'antifake-mate-phone-blocker') . '</p></div>';
            }
        }
    }

    $blocked_numbers = get_option('afnk_blocked_phone_numbers', []);
    $blocked_attempts = get_option('afnk_blocked_phone_attempts', []);

    ?>
    <div class="wrap">
        <h1><?php echo esc_html__('Phone Blocker Settings', 'antifake-mate-phone-blocker'); ?></h1>
        <form method="post" action="">
            <?php wp_nonce_field('afnk_phone_blocker_action', 'afnk_nonce'); ?>
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="phone_number"><?php echo esc_html__('Add Phone Number', 'antifake-mate-phone-blocker'); ?></label></th>
                    <td>
                        <input type="text" name="phone_number" class="regular-text" required>
                        <button type="submit" name="add_number" class="button button-primary"><?php echo esc_html__('Add Number', 'antifake-mate-phone-blocker'); ?></button>
                    </td>
                </tr>
            </table>
        </form>

        <h2><?php echo esc_html__('Blocked Numbers', 'antifake-mate-phone-blocker'); ?></h2>
        <table class="widefat fixed">
            <thead>
                <tr>
                    <th><?php echo esc_html__('Phone Number', 'antifake-mate-phone-blocker'); ?></th>
                    <th><?php echo esc_html__('Blocked Attempts', 'antifake-mate-phone-blocker'); ?></th>
                    <th><?php echo esc_html__('Actions', 'antifake-mate-phone-blocker'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($blocked_numbers)) : ?>
                    <?php foreach ($blocked_numbers as $number) : ?>
                        <tr>
                            <td><?php echo esc_html($number); ?></td>
                            <td><?php echo isset($blocked_attempts[$number]) ? intval($blocked_attempts[$number]) : 0; ?></td>
                            <td>
                                <form method="post" action="" style="display:inline;">
                                    <?php wp_nonce_field('afnk_phone_blocker_action', 'afnk_nonce'); ?>
                                    <input type="hidden" name="phone_number" value="<?php echo esc_attr($number); ?>">
                                    <button type="submit" name="delete_number" class="button button-secondary"><?php echo esc_html__('Delete', 'antifake-mate-phone-blocker'); ?></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="3"><?php echo esc_html__('No blocked numbers found.', 'antifake-mate-phone-blocker'); ?></td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php
}

function afnk_submenu_page_content() {
    ?>
    <div class="wrap">
        <div class="useful-plugins-container">
            <h1 class="afnk-title">
                Complete Your WooCommerce Management with Our Must-Have Plugins
            </h1>
            <div class="plugins-list">
                <?php
                $plugin_dir_url = plugin_dir_url(__FILE__) . 'img/'; // Local image directory
                $plugins = [
                    [
                        'name' => 'Client Mate',
                        'image' => $plugin_dir_url . 'client-mate.webp',
                        'description' => 'ClientMate is your all-in-one WooCommerce analytics tool, offering powerful insights into your customers’ orders.',
                        'short_description' => 'ClientMate is your all-in-one WooCommerce analytics tool.',
                        'link' => 'https://bit.ly/Clientmate' // Example link, replace with actual link
                    ],
                    [
                        'name' => 'Track Mate',
                        'image' => $plugin_dir_url . 'track-mate.jpg',
                        'description' => 'Perfect solution for WooCommerce store owners who want to give their customers an easy way to track their orders.',
                        'short_description' => 'WooCommerce Order Tracker.',
                        'link' => 'https://bit.ly/TrackwMate' // Example link, replace with actual link
                    ],
                    [
                        'name' => 'DeliveryMate',
                        'image' => $plugin_dir_url . 'delivery-mate.jpg',
                        'description' => 'Transform your WooCommerce store’s delivery process with DeliveryMate, the ultimate plugin for managing delivery companies efficiently and effectively.',
                        'short_description' => 'Streamline Your Delivery Management.',
                        'link' => 'https://bit.ly/DeliveryMate' // Example link, replace with actual link
                    ],
                    [
                        'name' => 'WaMate',
                        'image' => $plugin_dir_url . 'wamate.jpg',
                        'description' => 'Powerful plugin designed to streamline your order confirmation process by automatically sending WhatsApp notifications when orders are received.',
                        'short_description' => 'Automatic WhatsApp notifications for your WooCommerce.',
                        'link' => 'https://bit.ly/WamatePd' // Example link, replace with actual link
                    ],
                ];

                foreach ($plugins as $plugin) : ?>
                    <div class="plugin-item">
                        <a href="<?php echo esc_url($plugin['link']); ?>" target="_blank">
                            <img src="<?php echo esc_url($plugin['image']); ?>" alt="<?php echo esc_attr($plugin['name']); ?>">
                            <h2><?php echo esc_html($plugin['name']); ?></h2>
                        </a>
                        <p class="short-description"><?php echo esc_html($plugin['short_description']); ?></p>
                        <div class="description">
                            <p><?php echo esc_html($plugin['description']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php
}

function afnk_enqueue_admin_styles() {
    // Register and enqueue CSS file
    wp_register_style(
        'afnk_admin_styles',
        plugin_dir_url(__FILE__) . 'css/admin-styles.css',
        [],
        '1.0.0'
    );
    wp_enqueue_style('afnk_admin_styles');

    // Inline styles
    $inline_styles = "
        .afnk-title {
            font-family: 'Georgia', serif; 
            font-size: 32px; 
            font-weight: bold; 
            background: linear-gradient(to right, #b78628, #f1c40f); 
            -webkit-background-clip: text; 
            -webkit-text-fill-color: transparent; 
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2); 
            margin-bottom: 20px; 
            text-align: center;
        }
        .plugins-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-around;
        }
        .plugin-item {
            background: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            width: calc(33.333% - 20px);
            box-sizing: border-box;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }
        .plugin-item img {
            max-width: 100px;
            height: auto;
            margin-bottom: 10px;
            border-radius: 50%;
        }
        .plugin-item h2 {
            font-size: 18px;
            margin: 10px 0;
            color: #333;
        }
        .plugin-item .short-description {
            font-size: 14px;
            color: #666;
            margin-bottom: 10px;
        }
        .plugin-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        }
    ";
    wp_add_inline_style('afnk_admin_styles', $inline_styles);
}
add_action('admin_enqueue_scripts', 'afnk_enqueue_admin_styles');

