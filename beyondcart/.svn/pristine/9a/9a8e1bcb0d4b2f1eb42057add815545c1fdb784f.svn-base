<?php
namespace BCAPP\Admin;

class Pages
{
    public static function get()
    {
        // check user capabilities
        if (!current_user_can('manage_options')) {
            return;
        }
        $default_tab = null;
        $settings = [];
    
        $settings['site_id'] = esc_attr(get_option('grind_mobile_app_site_id', null));
        $settings['api_key'] = esc_attr(get_option('grind_mobile_app_api_key', null));
        $settings['woo_consumer_api_key'] = esc_attr(get_option('grind_mobile_app_woo_consumer_api_key', null));
        $settings['woo_consumer_api_secret'] = esc_attr(get_option('grind_mobile_app_woo_consumer_api_secret', null));
        $settings['onesignal_app_id'] = esc_attr(get_option('grind_mobile_app_onesignal_app_id', null));
        $settings['onesignal_api_key'] = esc_attr(get_option('grind_mobile_app_onesignal_api_key', null));
        $settings['firebase_server_key'] = esc_attr(get_option('grind_mobile_app_firebase_server_key', null));
        $settings['facebook_app_id'] = esc_attr(get_option('grind_mobile_app_facebook_app_id', null));
        $settings['facebook_app_secret'] = esc_attr(get_option('grind_mobile_app_facebook_app_secret', null));
    
        $settings['banner_app_active'] = esc_attr(get_option('grind_mobile_app_banner_app_active', null));
        $settings['banner_app_hide_desktop'] = esc_attr(get_option('grind_mobile_app_banner_app_hide_desktop', null));
        $settings['banner_app_logo'] = esc_url(get_option('grind_mobile_app_banner_app_logo', null));
        $settings['banner_app_url_apple'] = esc_url(get_option('grind_mobile_app_banner_app_url_apple', null));
        $settings['banner_app_url_google'] = esc_url(get_option('grind_mobile_app_banner_app_url_google', null));
        $settings['banner_app_title'] = esc_html(get_option('grind_mobile_app_banner_app_title', null));
        $settings['banner_app_desc'] = esc_html(get_option('grind_mobile_app_banner_app_desc', null));
        $settings['banner_app_button'] = esc_html(get_option('grind_mobile_app_banner_app_button', null));
    
        include_once __DIR__ . '/pages/Settings.php';
    }

    public static function post()
    {
        if (isset($_POST['api_key'])) {
            // Update the settings
            update_option('grind_mobile_app_site_id', sanitize_text_field($_POST['site_id']));
            update_option('grind_mobile_app_api_key', sanitize_text_field($_POST['api_key']));
            update_option('grind_mobile_app_woo_consumer_api_key', sanitize_text_field($_POST['woo_consumer_api_key']));
            update_option('grind_mobile_app_woo_consumer_api_secret', sanitize_text_field($_POST['woo_consumer_api_secret']));
            update_option('grind_mobile_app_onesignal_app_id', sanitize_text_field($_POST['onesignal_app_id']));
            update_option('grind_mobile_app_onesignal_api_key', sanitize_text_field($_POST['onesignal_api_key']));
            update_option('grind_mobile_app_facebook_app_id', sanitize_text_field($_POST['facebook_app_id']));
            update_option('grind_mobile_app_facebook_app_secret', sanitize_text_field($_POST['facebook_app_secret']));
    
            update_option('grind_mobile_app_banner_app_active', isset($_POST['banner_app_active']) ? '1' : '0');
            update_option('grind_mobile_app_banner_app_hide_desktop', isset($_POST['banner_app_hide_desktop']) ? '1' : '0');
            update_option('grind_mobile_app_banner_app_logo', esc_url_raw($_POST['banner_app_logo']));
            update_option('grind_mobile_app_banner_app_url_apple', esc_url_raw($_POST['banner_app_url_apple']));
            update_option('grind_mobile_app_banner_app_url_google', esc_url_raw($_POST['banner_app_url_google']));
            update_option('grind_mobile_app_banner_app_title', sanitize_text_field($_POST['banner_app_title']));
            update_option('grind_mobile_app_banner_app_desc', sanitize_text_field($_POST['banner_app_desc']));

            // Delete expired carts from the database
            if ( isset($_POST['delete_carts']) ) {
                global $wpdb;
            
                // Initialize the message variable
                $message = '';
                $batch_size = 1000000; // Adjust batch size based on server capacity
                $time_limit = 60; // Maximum execution time in seconds
                $start_time = time(); // Record the start time
            
                do {
                    // Execute the delete query with a limit
                    $deleted_rows = $wpdb->query(
                        $wpdb->prepare(
                            "DELETE FROM {$wpdb->prefix}grind_mobile_app_carts 
                            WHERE cart_expiry < UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 3 MONTH)) 
                            LIMIT %d",
                            $batch_size
                        )
                    );
            
                    if ( $deleted_rows === false ) {
                        $message = 'Error occurred while deleting expired carts from the database.';
                        break;
                    } elseif ( $deleted_rows > 0 ) {
                        $message .= 'Deleted expired carts from the database in this batch: ' . esc_html( $deleted_rows ) . '<br>';
                        usleep(200000); // Pause for 0.2 seconds to reduce load
                    }
            
                    // Check if the script has exceeded the time limit
                    if ( time() - $start_time >= $time_limit ) {
                        $message .= 'Time limit reached. Please re-execute to continue deletion.';
                        break;
                    }
                } while ( $deleted_rows > 0 );
            
                // Final message if no more rows are left to delete
                if ( $deleted_rows === 0 ) {
                    $message .= 'All expired carts have been successfully deleted from the database.';
                }
            
                // Add the admin notice
                add_action('admin_notices', function () use ($message) {
                    echo '<div class="notice notice-success is-dismissible"><p>' . $message . '</p></div>';
                });
            }

            // Alert message
            add_action('admin_notices', function () {echo '<div class="update notice"><p>Настройките са обновени</p></div>';});
            return;
        }
    }
}
