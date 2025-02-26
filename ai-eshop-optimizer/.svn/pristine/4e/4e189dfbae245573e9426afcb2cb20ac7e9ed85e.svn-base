<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly
if (!class_exists('AIEO')) {

    class AIEO
    {
        public function __construct()
        {
            // Add a menu page to handle CSV upload, enqueue stylesheet and normalize paths for non-Linux systems (WP Local etc.) 
            add_action('admin_menu', array($this, 'aieo_add_admin_menu'));
            add_action('admin_enqueue_scripts', array($this, 'aieo_enqueue_styles_scripts'));
            add_action('admin_aieo_normalize_path', array($this, 'aieo_normalize_path'));

            // Export Orders
            add_action('admin_post_eshop_optimizer_export_csv', array($this, 'aieo_export_upsells_cross_sells_to_csv'));
            add_action('admin_post_eshop_optimizer_handle_export_orders', array($this, 'aieo_handle_export_orders'));
            add_action('admin_post_delete_exported_file', array($this, 'aieo_delete_exported_file'));

            // Upload Recommendations
            add_action('admin_post_eshop_optimizer_handle_upload', array($this, 'aieo_handle_recommendations_upload'));

            // Set Display options for recommendations
            add_action('admin_post_eshop_optimizer_display_references', array($this, 'aieo_handle_display_references_setting'));


            // Enable UTMs for each recommendation
            add_action('admin_post_eshop_optimizer_utm_stats', array($this, 'aieo_handle_utm_stats_setting'));


            // Add hooks to display admin notices
            add_action('admin_notices', array($this, 'aieo_display_all_admin_notices'));


            // Action for remote transfer
            add_action('admin_post_eshop_optimizer_transfer_to_remote', array($this, 'aieo_handle_eshop_optimizer_transfer_to_remote'));


            // Action for associating eshop-optimizer account
            add_action('admin_post_eshop_optimizer_account', array($this, 'aieo_handle_eshop_optimizer_account'));

            // Add the action to authenticate using the stored JWT token
            // add_action('init', [$this, 'authenticate_with_stored_token']);
        }


        public function aieo_wpse_edit_text($content)
        {
            return "Thank you for choosing <a href='https://eshop-optimizer.com'>AI eShop Optimizer</a> for Woocommerce by <i><a href='https://oxfordmetadata.co.uk'>Oxford Metadata Ltd</a></i>";
        }
        public function aieo_normalize_path($csv_path)
        {
            if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
                $csv_path = str_replace('\\', '/', $csv_path);
            }
            return $csv_path;
        }


        /**
         * Enqueue admin styles and scripts.
         */
        public function aieo_enqueue_styles_scripts()
        {
            wp_enqueue_media();

            $css_file_url = AIEO_URI . 'assets/css/admin-panel.css'; // Ensure this is a URL
            $response = wp_remote_get($css_file_url);

            if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) == 200) {
                $css_content = wp_remote_retrieve_body($response);

                if (!empty($css_content)) {
                    // Replace relative image URLs with absolute URLs
                    $css_content = preg_replace_callback('/url\((\'|"|)([^\'"\)]+)(\'|"|)\)/', function ($matches) {
                        $url = $matches[2];
                        if (strpos($url, 'http') !== 0) {
                            $url = AIEO_URI . 'assets/css/' . $url;
                        }
                        return 'url(' . $matches[1] . $url . $matches[3] . ')';
                    }, $css_content);

                    wp_register_style('ai-eshop-optimizer-admin-inline', false);
                    wp_enqueue_style('ai-eshop-optimizer-admin-inline');
                    wp_add_inline_style('ai-eshop-optimizer-admin-inline', $css_content);
                }
            }

            // Enqueue script
            wp_enqueue_script(
                'ai-eshop-optimizer-form-validation',
                AIEO_URI . 'assets/js/form-validation.js',
                array('jquery'),
                AIEO_VERSION,
                true
            );
        }


        // Create Admin Menu
        public function aieo_add_admin_menu()
        {
            // Create Admin Menu under WooCommerce
            $hook_suffix = add_submenu_page(
                'woocommerce',                                  // Parent slug
                'AI eShop Optimizer',                           // Page title
                'AI eShop Optimizer',                           // Menu title
                'manage_options',                               // Capability
                'ai-eshop-optimizer',                           // Menu slug
                array($this, 'render_eshop_optimizer_admin_page') // Callback function to display the page
            );

            // Use the hook suffix to add an action for enqueuing scripts and styles only on this plugin's admin page
            add_action('admin_enqueue_scripts', function ($hook) use ($hook_suffix) {
                if ($hook == $hook_suffix) {
                    $this->aieo_enqueue_styles_scripts(); // Call your enqueue function here
                }
            });
        }



        public function aieo_display_all_admin_notices()
        {
            //  error_log('aieo_display_all_admin_notices: Function called');

            // Check for the products updated count transient
            if ($products_impacted = get_transient('aieo_products_updated_count')) {
                $message = sprintf(
                    _n('%d product has been updated in the catalogue.', '%d products have been updated in the catalogue.', $products_impacted, 'eshop-optimizer'),
                    esc_html($products_impacted)
                );
                echo '<div class="notice notice-success is-dismissible"><p>' . esc_html($message) . '</p></div>';
                delete_transient('aieo_products_updated_count');
                //  error_log('aieo_display_all_admin_notices: Displaying products updated notice');
            }

            // Handle export orders message
            global $pagenow;
            if ($pagenow == 'admin.php' && isset($_GET['page']) && $_GET['page'] == 'ai-eshop-optimizer') {
                if (isset($_GET['exported_orders']) && $_GET['exported_orders'] == '1') {
                    // Sanitize
                    $nonce = isset($_GET['_wpnonce']) ? sanitize_text_field($_GET['_wpnonce']) : '';
                    // Validate
                    if ($nonce && wp_verify_nonce($nonce, 'exported_orders_action')) {
                        $message = get_option('aieo_export_orders_message', false);
                        if ($message) {
                            // Escape
                            echo '<div class="notice notice-success is-dismissible"><p>' . esc_html($message) . '</p></div>';
                            delete_option('aieo_export_orders_message');
                        }
                    } else {
                        wp_die('Security check failed.'); // Nonce verification failed
                    }
                }
            }

            // Handle upload notices
            if ($notice = get_transient('aieo_upload_notice')) {
                echo '<div class="notice notice-success is-dismissible"><p>' . esc_html($notice) . '</p></div>';
                delete_transient('aieo_upload_notice');
                // error_log('aieo_display_all_admin_notices: Displaying upload local test table success notice');
            }
            if ($error = get_transient('aieo_upload_error')) {
                echo '<div class="notice notice-error is-dismissible"><p>' . esc_html($error) . '</p></div>';
                delete_transient('aieo_upload_error');
                // error_log('aieo_display_all_admin_notices: Displaying upload to local test table error');
            }

            // Handle account notice
            $account_message = get_option('aieo_account_message', false);
            if ($account_message) {
                $class = strpos($account_message, 'Error') !== false ? 'notice-error' : 'notice-success';
                echo '<div class="notice ' . esc_attr($class) . ' is-dismissible"><p>' . esc_html($account_message) . '</p></div>';
                delete_option('aieo_account_message');
                // error_log('aieo_display_all_admin_notices: Displaying account notice');
            }

            // Handle remote connection notice
            $remote_connection_message = get_option('aieo_remote_connection_message', false);
            if ($remote_connection_message) {
                $class = strpos($remote_connection_message, 'Error') !== false ? 'notice-error' : 'notice-success';
                echo '<div class="notice ' . esc_attr($class) . ' is-dismissible"><p>' . esc_html($remote_connection_message) . '</p></div>';
                delete_option('aieo_remote_connection_message');
                //  error_log('aieo_display_all_admin_notices: Displaying remote connection notice');
            }
        }



        public function aieo_handle_display_references_setting()
        {
            // Check if nonce is set and is valid
            if (
                isset($_POST['eshop_optimizer_nonce_field_1']) && // Use the correct nonce name
                wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['eshop_optimizer_nonce_field_1'])), 'eshop_optimizer_update_display_preferences') // Use the correct action name
            ) {
                if (current_user_can('manage_options')) {
                    // Save the checkboxes as options
                    update_option('aieo_display_upsells', isset($_POST['aieo_display_upsells']) ? '1' : '0');
                    update_option('aieo_display_cross_sells', isset($_POST['aieo_display_cross_sells']) ? '1' : '0');
                    update_option('aieo_display_related', isset($_POST['aieo_display_related']) ? '1' : '0');
                    update_option('aieo_display_recently_viewed_products', isset($_POST['aieo_display_recently_viewed_products']) ? '1' : '0');
                    update_option('aieo_recommendations_display_order', isset($_POST['aieo_recommendations_display_order']) ? '1' : '0');
                }
            } else {
                // Handle invalid nonce (optional: you can show an error message here)
                wp_die('Invalid nonce!'); // Example for terminating with an error message
            }

            // Redirect back to settings page with a success message.
            wp_redirect(esc_url(admin_url('admin.php?page=ai-eshop-optimizer')));
            exit;
        }




        public function aieo_handle_utm_stats_setting()
        {
            // Check if nonce is set and is valid
            if (
                isset($_POST['eshop_optimizer_utm_stats_nonce_2']) &&
                wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['eshop_optimizer_utm_stats_nonce_2'])), 'eshop_optimizer_utm_stats_action')
            ) {
                // Check user capabilities
                if (current_user_can('manage_options')) {
                    // Update the setting.
                    if (isset($_POST['aieo_activate_utm_stats'])) {
                        $ga4tag = sanitize_text_field($_POST['aieo_google_ga4']);
                        update_option('aieo_activate_utm_stats', 1);
                        update_option('aieo_google_ga4', $ga4tag);
                    } else {
                        delete_option('aieo_activate_utm_stats');
                        delete_option('aieo_google_ga4');
                    }
                }

                // Redirect back to settings page with a success message.
                wp_redirect(esc_url(admin_url('admin.php?page=ai-eshop-optimizer')));
                exit;
            }

            // Redirect or display an error message as appropriate
        }




        public function render_eshop_optimizer_admin_page()
        {
            require_once AIEO_DIR . 'assets/pages/ai-eshop-optimizer.php';

            add_filter('admin_footer_text', array($this, 'aieo_wpse_edit_text'), 11);
        }



        // Function to Export Existing Up sells and cross sells 
        public function aieo_export_upsells_cross_sells_to_csv()
        {
            // Verify nonce
            if (
                isset($_POST['eshop_optimizer_export_csv_nonce_4']) &&
                wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['eshop_optimizer_export_csv_nonce_4'])), 'eshop_optimizer_export_csv_action')
            ) {
                global $wpdb;

                // Generate the table name
                $current_recommendations_table_name = $wpdb->prefix . "aieo_" . gmdate('Y_m') . "_current_recommendations";

                // Sanitize and validate the dynamic table name
                // Regex checks if the table name only contains alphanumeric characters, underscores, or dashes
                if (preg_match('/^\w+$/', $current_recommendations_table_name)) {
                    // Table name is safe to use directly in SQL
                    $wpdb->query("DROP TABLE IF EXISTS {$current_recommendations_table_name}");

                    // Create the table with the safe table name
                    $wpdb->query("
                        CREATE TABLE {$current_recommendations_table_name} (
                            original_product_id BIGINT(20) UNSIGNED NOT NULL,
                            related_upsells_list TEXT NOT NULL,
                            related_crossells_list TEXT NOT NULL, 
                            aieo_neo4j_params TEXT NOT NULL
                        )
                    ");
                } else {
                    // Log error or handle invalid table name
                    wp_die('Invalid table name detected.');
                }

                // Query the first 20,000 products by product_id using proper prepared statement
                // Correct usage with a string placeholder for 'post_type'
                $table_name = $wpdb->prefix . 'posts';

                // Now pass the table name directly into your query
                $query = "SELECT ID FROM $table_name WHERE post_type = %s ORDER BY ID ASC";
                $product_ids = $wpdb->get_col($wpdb->prepare($query, 'product'));

                foreach ($product_ids as $product_id) {
                    $product_object = wc_get_product($product_id);
                    if ($product_object) {
                        $upsell_ids_list = implode(',', $product_object->get_upsell_ids());
                        $crossell_ids_list = implode(',', $product_object->get_cross_sell_ids());
                        $aieo_neo4j_params = get_post_meta($product_id, 'aieo_neo4j_params', true);
                        $wpdb->insert(
                            $current_recommendations_table_name,
                            array(
                                'original_product_id' => $product_id,
                                'related_upsells_list' => $upsell_ids_list,
                                'related_crossells_list' => $crossell_ids_list,
                                'aieo_neo4j_params' => $aieo_neo4j_params
                            )
                        );
                    }
                }



                function esc_csv($data)
                {
                    return '"' . str_replace('"', '""', $data) . '"';
                }

                global $wpdb, $wp_filesystem;
                require_once(ABSPATH . 'wp-admin/includes/file.php');

                if (!WP_Filesystem()) {
                    // Unable to setup WP_Filesystem, handle error
                    return false;
                }

                // Create a CSV file
                $csv_filename = 'upsells_cross_sells_export_' . gmdate('Y-m-d_H-i-s') . '.csv';
                $csv_file_path = $wp_filesystem->wp_content_dir() . $csv_filename;
                $csv_header = array('original_product_id', 'related_upsells_list', 'related_crossells_list', 'aieo_neo4j_params');
                $csv_content = implode(',', $csv_header) . "\n";

                // Validate and sanitize the table name
                $table_name = sanitize_text_field($current_recommendations_table_name);
                if (!preg_match('/^\w+$/', $table_name)) {
                    // Invalid table name
                    return false;
                }
                $full_table_name = $wpdb->prefix . $table_name; // Append prefix to the sanitized table name

                // Get the data from the table and write to the CSV file
                $query = $wpdb->prepare("SELECT * FROM $table_name", array());
                $results = $wpdb->get_results($query, ARRAY_A);


                // Process results to CSV content
                foreach ($results as $row) {
                    $csv_content .= implode(',', array_map('esc_csv', $row)) . "\n";
                }

                // Write to CSV file
                $success = $wp_filesystem->put_contents($csv_file_path, $csv_content, FS_CHMOD_FILE);
                if (!$success) {
                    wp_die('Failed to write to CSV file.');
                }

                // Offer the CSV file for download
                if ($wp_filesystem->exists($csv_file_path)) {
                    header('Content-Type: application/csv');
                    header('Content-Disposition: attachment; filename="' . $csv_filename . '"');
                    header('Pragma: no-cache');
                    echo $wp_filesystem->get_contents($csv_file_path);
                    $wp_filesystem->delete($csv_file_path); // Delete the temporary file
                    exit;
                }
            } else {
                // Handle the case where the nonce check fails
                wp_die('Security check  1 failed.');
            }
        }



        // Handle form submission and export orders
        public function aieo_handle_export_orders()
        {
            if (
                isset($_POST['eshop_optimizer_handle_export_orders_nonce_3']) &&
                wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['eshop_optimizer_handle_export_orders_nonce_3'])), 'eshop_optimizer_handle_export_orders_action')
            ) {

                global $wpdb; // Make $wpdb accessible inside the function

                // Save the current time limit
                $original_time_limit = ini_get('max_execution_time');

                // Get product count
                $product_count = $wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->posts} WHERE post_type = 'product' AND post_status = 'publish'");

                // Get order item count
                $order_item_count = $wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->prefix}woocommerce_order_items");

                // Calculate timeout: (products + order items) / 50
                $timeout = ($product_count + $order_item_count) / 50;

                // Set PHP timeout for the current script
                set_time_limit($timeout);

                // Register a shutdown function to reset the time limit
                register_shutdown_function(function () use ($original_time_limit) {
                    set_time_limit($original_time_limit);
                });

                $site_prefix = $wpdb->prefix;

                $orders_table_name = $wpdb->prefix . "aieo_" . gmdate('Y_m') . "_orders";
                $orders_table_name = sanitize_text_field($orders_table_name);

                // Validate that the table name only contains alphanumeric characters, underscores, or dashes
                if (!preg_match('/^[a-zA-Z0-9_]+$/', $orders_table_name)) {
                    // Table name is invalid
                    return false;
                }

                $drop_orders_table_query = $wpdb->prepare("DROP TABLE IF EXISTS {$orders_table_name};");

                // Get the current site's database prefix

                $order_id = 0;
                if (isset($_POST['export_orders'])) {
                    // Get the user input OrderID
                    if (isset($_POST['aieo_order_id']) && !empty($_POST['aieo_order_id'])) {
                        $order_id = intval($_POST['aieo_order_id']);
                        $max_records = intval($_POST['aieo_max_records']);
                    }
                    // Check if the form is submitted and if the user has the capability to manage options
                    if (current_user_can('manage_options')) {
                        // Save the checkboxes as options
                        update_option('aieo_create_orders', isset($_POST['aieo_create_orders']) ? '1' : '0');
                        update_option('aieo_include_eponymous', isset($_POST['aieo_include_eponymous']) ? '1' : '0');
                        update_option('aieo_include_seasonality', isset($_POST['aieo_include_seasonality']) ? '1' : '0');
                        update_option('aieo_include_price', isset($_POST['aieo_include_price']) ? '1' : '0');
                        update_option('aieo_variations_choice', isset($_POST['aieo_variations_choice']) ? '1' : '0');
                        update_option('aieo_include_aggregate_stats', isset($_POST['aieo_include_aggregate_stats']) ? '1' : '0');
                        update_option('aieo_include_aggregate_cust_std_stats', isset($_POST['aieo_include_aggregate_cust_std_stats']) ? '1' : '0');
                        update_option('aieo_include_aggregate_cust_adv_stats', isset($_POST['aieo_include_aggregate_cust_adv_stats']) ? '1' : '0');
                        update_option('aieo_include_text', isset($_POST['aieo_include_text']) ? '1' : '0');
                        update_option('aieo_include_full_text', isset($_POST['aieo_include_full_text']) ? '1' : '0');
                        update_option('aieo_create_catalogue', isset($_POST['aieo_create_catalogue']) ? '1' : '0');
                        update_option('aieo_include_unsold', isset($_POST['aieo_include_unsold']) ? '1' : '0');
                        update_option('aieo_create_uuids', isset($_POST['aieo_create_uuids']) ? '1' : '0');
                        update_option('aieo_create_export', isset($_POST['aieo_create_export']) ? '1' : '0');

                        // Save the numbers as options
                        if (isset($_POST['aieo_order_id'])) {
                            update_option('aieo_order_id', sanitize_text_field($_POST['aieo_order_id']));
                        }

                        if (isset($_POST['aieo_max_records'])) {
                            update_option('aieo_max_records', sanitize_text_field($_POST['aieo_max_records']));
                        }
                    }

                    // Check if the checkbox for excluding pricing and title data is checked

                    $create_orders = isset($_POST['aieo_create_orders']) && $_POST['aieo_create_orders'] === '1';
                    $orders_sql_choice = $create_orders ? 1 : 0;

                    $include_text = isset($_POST['aieo_include_text']) && $_POST['aieo_include_text'] === '1';
                    $text_sql_choice = $include_text ? 1 : 0;

                    $include_full_text = isset($_POST['aieo_include_full_text']) && $_POST['aieo_include_full_text'] === '1';
                    $full_text_sql_choice = $include_full_text ? 1 : 0;

                    $include_price = isset($_POST['aieo_include_price']) && $_POST['aieo_include_price'] === '1';
                    $price_sql_choice = $include_price ? 1 : 0;

                    $variations_choice = isset($_POST['aieo_variations_choice']) && $_POST['aieo_variations_choice'] === '1';
                    $variations_sql_choice = $variations_choice ? 1 : 0;

                    $include_aggregate_stats = isset($_POST['aieo_include_aggregate_stats']) && $_POST['aieo_include_aggregate_stats'] === '1';
                    $aggregate_stats_sql_choice = $include_aggregate_stats ? 1 : 0;

                    $create_catalogue = isset($_POST['aieo_create_catalogue']) && $_POST['aieo_create_catalogue'] === '1';
                    $catalogue_sql_choice = $create_catalogue ? 1 : 0;

                    $create_uuids = isset($_POST['aieo_create__uuids']) && $_POST['aieo_create__uuids'] === '1';
                    $uuids_sql_choice = $create_uuids ? 1 : 0;

                    $create_export = isset($_POST['aieo_create_export']) && $_POST['aieo_create_export'] === '1';
                    $export_sql_choice = $create_export ? 1 : 0;

                    $include_unsold = isset($_POST['aieo_include_unsold']) && $_POST['aieo_include_unsold'] === '1';
                    $unsold_sql_choice = $include_unsold ? 1 : 0;

                    $include_seasonality = isset($_POST['aieo_include_seasonality']) && $_POST['aieo_include_seasonality'] === '1';
                    $seasonality_sql_choice = $include_seasonality ? 1 : 0;

                    $include_eponymous = isset($_POST['aieo_include_eponymous']) && $_POST['aieo_include_eponymous'] === '1';
                    $eponymous_sql_choice = $include_eponymous ? 1 : 0;

                    // Query to fetch orders with higher OrderID
                    $temp_orders_table_name = get_option('aieo_site_orders_table');
                    $temp_orders_table_name = sanitize_text_field($temp_orders_table_name);

                    // Validate that the table name only contains alphanumeric characters, underscores, or dashes
                    if (!preg_match('/^[a-zA-Z0-9_]+$/', $temp_orders_table_name)) {
                        // Table name is invalid
                        return false;
                    }
                    $temp_products_table_name = get_option('aieo_site_products_table');

                    $eponymousStatus = ($eponymous_sql_choice == '1') ? ', and user ids provided' : '';
                    $seasonalityStatus = ($seasonality_sql_choice == '1') ? ', and seasonality active' : '';


                    if ((isset($_POST['aieo_create_orders']) && $_POST['aieo_create_orders'] == '1') || get_option('aieo_create_orders', '1') == '1') {

                        if (class_exists('Automattic\WooCommerce\Utilities\OrderUtil') && function_exists('WC')) {
                            // Check if HPOS (High Performance Order Storage) is enabled
                            if (Automattic\WooCommerce\Utilities\OrderUtil::custom_orders_table_usage_is_enabled()) {
                                // If HPOS is enabled then use this query

                                // Execute the Create Tables Query

                                $script_version = 'HPOS via SP for ' . $max_records . ' records starting at Order_Id ' . $order_id . $eponymousStatus . $seasonalityStatus;

                                $wpdb->query($wpdb->prepare(
                                    "CALL `{$site_prefix}AIEO_Export_Orders_HPOS` (%d, %d, %d, %d, %d, %d, %d)",
                                    $price_sql_choice,
                                    $text_sql_choice,
                                    $full_text_sql_choice,
                                    $eponymous_sql_choice,
                                    $seasonality_sql_choice,
                                    $order_id,
                                    $max_records
                                ));
                            }
                            // Non HPOS Query
                            else {
                                $script_version = 'Non-HPOS via SP for ' . $max_records . ' records starting at Order_Id ' . $order_id . $eponymousStatus . $seasonalityStatus;

                                $wpdb->query($wpdb->prepare(
                                    "CALL `{$site_prefix}AIEO_Export_Orders_non_HPOS` (%d, %d, %d, %d, %d, %d, %d)",
                                    $price_sql_choice,
                                    $text_sql_choice,
                                    $full_text_sql_choice,
                                    $eponymous_sql_choice,
                                    $seasonality_sql_choice,
                                    $order_id,
                                    $max_records
                                ));
                            }
                        }
                    } else {
                        $script_version = 'The orders were not processed this time! ';
                    }

                    if ((isset($_POST['aieo_create_catalogue']) && $_POST['aieo_create_catalogue'] == '1') || get_option('aieo_create_catalogue', '1') == '1') {
                        $wpdb->query($wpdb->prepare(
                            "CALL `{$site_prefix}AIEO_Create_Product_Catalogue_HPOS` (%d, %d, %d)",
                            $price_sql_choice,
                            $text_sql_choice,
                            $full_text_sql_choice
                        ));
                        $script_version = $script_version . ', and having created a fresh product catalogue';
                    }

                    if ((isset($_POST['aieo_include_unsold']) && $_POST['aieo_include_unsold'] == '1') || get_option('aieo_include_unsold', '1') == '1') {

                        // Validate the $site_prefix
                        if (preg_match('/^[a-zA-Z0-9_]+$/', $site_prefix)) {
                            // Initialize the output message variable
                            $wpdb->query("SET @output_message = ''");

                            // Call the stored procedure without including the output parameter in prepare()
                            // Note: Directly using $site_prefix in the query as it can't be parameterized
                            $wpdb->query($wpdb->prepare("CALL `{$site_prefix}AIEO_UpdateOrdersWithUnsold`(@output_message)"));

                            // Retrieve the value of the output parameter
                            $output_message_from_sp = $wpdb->get_var("SELECT @output_message AS output_message");
                        } else {
                            // Handle invalid $site_prefix
                        }

                        // Check if the message contains the word "Warning"
                        if (strpos($output_message_from_sp, 'Warning') !== false) {
                            $message = 'The operation did not complete! Regenerate the necessary tables! ' . $output_message_from_sp;

                            // Save the message as an option to retrieve it later
                            update_option('aieo_export_orders_message', $message);

                            // Redirect back to the admin page after handling the export
                            $redirect_url = add_query_arg(
                                array(
                                    'page' => 'ai-eshop-optimizer',
                                    'exported_orders' => '1',
                                    '_wpnonce' => wp_create_nonce('exported_orders_action')
                                ),
                                admin_url('admin.php')
                            );

                            wp_redirect($redirect_url);
                            exit;
                        } else {
                            $script_version = $script_version . $output_message_from_sp;
                        }
                    }

                    // Only now Populate the statistics so that onsold variations can be accounted with their parents

                    if ((isset($_POST['aieo_include_aggregate_stats']) && $_POST['aieo_include_aggregate_stats'] == '1') || get_option('aieo_include_aggregate_stats', '1') == '1') {
                        $result = $wpdb->query($wpdb->prepare("CALL `{$site_prefix}AIEO_UpdateProductCentricStats` ('wp_aieo_temp_orders_table', 0);"));
                        $script_version = $script_version . ', and the Product stats';
                    }
                    if ((isset($_POST['aieo_include_aggregate_cust_std_stats']) && $_POST['aieo_include_aggregate_cust_std_stats'] == '1') || get_option('aieo_include_aggregate_cust_std_stats', '1') == '1') {
                        $result = $wpdb->query($wpdb->prepare("CALL `{$site_prefix}AIEO_UpdateCustomerCentricStdStats` ('$temp_orders_table_name', 0);"));
                        $script_version = $script_version . ', and the Customer Standard Statistics were computed';
                    }
                    if ((isset($_POST['aieo_include_aggregate_cust_adv_stats']) && $_POST['aieo_include_aggregate_cust_adv_stats'] == '1') || get_option('aieo_include_aggregate_cust_adv_stats', '1') == '1') {
                        $result = $wpdb->query($wpdb->prepare("CALL `{$site_prefix}AIEO_UpdateCustomerCentricAdvStats` ('$temp_orders_table_name', 0);"));
                        $script_version = $script_version . ', and the Customer Adv Statistics were computed';
                    }

                    // Now Generate the UUIDs 
                    if ((isset($_POST['aieo_create_uuids']) && $_POST['aieo_create_uuids'] == '1') || get_option('aieo_create_uuids', '1') == '1') {
                        $result = $wpdb->query($wpdb->prepare("CALL `{$site_prefix}AIEO_GenerateGraphDBUUIDFreqs` ('$temp_orders_table_name');"));
                        $script_version = $script_version . ', and generated the UUIDs';
                    }

                    /// Need to think about this. May best closing it at the end    
                }

                // This part, althought ready, will be activated when we launch the sentiment/text analysis offering to customers.
                // Start of textual operations
                if ((isset($_POST['aieo_include_full_text']) && $_POST['aieo_include_full_text'] == '1') || get_option('aieo_include_full_text', '0') == '1') {

                    $wpdb->query($wpdb->prepare(
                        "CALL `{$site_prefix}AIEO_FindDifferences` (%s)",
                        $temp_orders_table_name
                    ));

                    $script_version = $script_version . ', and found text diffrences';
                    // Count the number of outgoing links in the description of the product 
                    $wpdb->query(
                        $wpdb->prepare(
                            "CALL `{$site_prefix}AIEO_UpdateContentOutgoingLinks` (%s)",
                            $temp_orders_table_name
                        )
                    );

                    $script_version = $script_version . ', and counted the links in the text';
                    // Clean up HTML Tags
                    $wpdb->query(
                        $wpdb->prepare(
                            "CALL `{$site_prefix}AIEO_UpdateContentIntroPlain` (%s)",
                            $temp_orders_table_name
                        )
                    );

                    $script_version = $script_version . ', and created the plain text descriptions';
                    // Updating description word count
                    $wpdb->query(
                        $wpdb->prepare(
                            "CALL `{$site_prefix}AIEO_UpdateContentWordCount` (%s)",
                            $temp_orders_table_name
                        )
                    );

                    $script_version = $script_version . ', and having counted the words in the description';
                    // end of textual operations if
                }
                if ((isset($_POST['aieo_create_export']) && $_POST['aieo_create_export'] == '1') || get_option('aieo_create_export', '1') == '1') {
                    global $wpdb;
                    require_once(ABSPATH . 'wp-admin/includes/file.php');

                    // Initialize WordPress filesystem.
                    WP_Filesystem();
                    global $wp_filesystem;

                    // Rename the temp_table to chosen name and recreate the temp orders table
                    // Prepare the statement with placeholders for variables

                    // Execute the prepared query
                    $wpdb->query(
                        $wpdb->prepare(
                            "CALL `{$site_prefix}AIEO_RenameTable` (%s, %s);",
                            $temp_orders_table_name,
                            $orders_table_name
                        )
                    );
                    aieo_create_temp_orders_table($temp_orders_table_name);

                    // Fetch columns from the table
                    $columns_query = "SHOW COLUMNS FROM {$orders_table_name}";
                    $table_columns = $wpdb->get_results($columns_query);
                    $export_columns = array_map(function ($column) {
                        return $column->Field;
                    }, $table_columns);

                    // Query all data from the table
                    $select_query = "SELECT * FROM {$orders_table_name}";
                    $results = $wpdb->get_results($select_query, ARRAY_A);

                    $file_extension = 'csv';
                    $uploads_dir = wp_upload_dir();
                    $parsed_url = wp_parse_url(home_url());
                    $domain = $parsed_url['host'];
                    $file_path = $uploads_dir['basedir'] . '/' . $domain . '_exported_orders_hpos.csv';
                    $file_path = $this->aieo_normalize_path($file_path);

                    // Prepare CSV data as a string
                    $csv_content = '';
                    $csv_content .= implode(',', $export_columns) . "\r\n";
                    foreach ($results as $result) {
                        $row_data = [];
                        foreach ($export_columns as $col_name) {
                            $row_data[] = $result[$col_name] ?? '';
                        }
                        $csv_content .= implode(',', $row_data) . "\r\n";
                    }

                    // Write to file using WP_Filesystem
                    $wp_filesystem->put_contents($file_path, $csv_content, FS_CHMOD_FILE);

                    // Set message, save it, and redirect
                    $message = $script_version . ': The orders table/file have been created and are ready for transfer/upload!';
                    update_option('aieo_export_orders_message', $message);

                    $redirect_url = add_query_arg(
                        array(
                            'page' => 'ai-eshop-optimizer',
                            'exported_orders' => '1',
                            '_wpnonce' => wp_create_nonce('exported_orders_action')
                        ),
                        admin_url('admin.php')
                    );
                    wp_redirect($redirect_url);
                    exit;
                } else {
                    $message = $script_version . ': The orders have been created but you have to confirm that you need to create the export file!';
                    // Save the message as an option to retrieve it later
                    update_option('aieo_export_orders_message', $message);
                    // Redirect back to the admin page after handling the export
                    $redirect_url = add_query_arg(
                        array(
                            'page' => 'ai-eshop-optimizer',
                            'exported_orders' => '1',
                            '_wpnonce' => wp_create_nonce('exported_orders_action')
                        ),
                        admin_url('admin.php')
                    );

                    wp_redirect($redirect_url);
                    exit;
                }
            } else {
                // Handle the case where the nonce check fails
                // For example, you could display an error message or log the incident
                wp_die('Security check 2 failed.');
            }
        }


        public function aieo_delete_exported_file()
        {
            $uploads_dir = wp_upload_dir();
            $parsed_url = wp_parse_url(home_url());
            $domain = $parsed_url['host'];
            $file_path = $uploads_dir['basedir'] . '/' . esc_html($domain) . '_exported_orders_hpos.csv'; // Update the filename and extension accordingly
            $file_path = $this->aieo_normalize_path($file_path);
            if (file_exists($file_path)) {
                wp_delete_file($file_path);
            }
            // Redirect back to the admin page after deleting the file
            wp_redirect(admin_url('admin.php?page=ai-eshop-optimizer'));
            exit;
        }


        public function aieo_handle_recommendations_upload()
        {
            // error_log('aieo_handle_recommendations_upload: Function called');
            if (
                isset($_POST['eshop_optimizer_process_params_nonce_6']) &&
                wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['eshop_optimizer_process_params_nonce_6'])), 'eshop_optimizer_handle_upload_action')
            ) {
                //   error_log('aieo_handle_recommendations_upload: Nonce verified');

                global $wpdb; // Global WordPress database variable
                $monitor_performance = isset($_POST['aieo_monitor_performance']) && $_POST['aieo_monitor_performance'] === '1';

                // Check if the form is submitted and if the user has the capability to manage options
                if (current_user_can('manage_options')) {
                    // Save the checkboxes as options
                    update_option('aieo_monitor_performance', isset($_POST['aieo_monitor_performance']) ? '1' : '0');
                    update_option('aieo_batch_size', isset($_POST['aieo_batch_size']) ? '1' : '0');
                    update_option('aieo_batch_sleep', isset($_POST['aieo_batch_sleep']) ? '1' : '0');

                    // Save the numbers as options
                    if (isset($_POST['aieo_monitor_performance'])) {
                        update_option('aieo_monitor_performance', sanitize_text_field($_POST['aieo_monitor_performance']));
                    }

                    if (isset($_POST['aieo_batch_size'])) {
                        update_option('aieo_batch_size', sanitize_text_field($_POST['aieo_batch_size']));
                    }

                    if (isset($_POST['aieo_batch_sleep'])) {
                        update_option('aieo_batch_sleep', sanitize_text_field($_POST['aieo_batch_sleep']));
                    }
                }

                $new_recommendations_table_name = $wpdb->prefix . "aieo_" . gmdate('Y_m') . "_new_recommendations";
                $wpdb->query("DROP TABLE IF EXISTS `{$new_recommendations_table_name}`");

                // Create the new recommendations table
                $wpdb->query("CREATE TABLE `{$new_recommendations_table_name}` (
                    original_product_id INT NOT NULL,
                    related_upsells_list TEXT,
                    related_crossells_list TEXT,
                    aieo_neo4j_params TEXT,
                    PRIMARY KEY (original_product_id)
                )");

                if (isset($_FILES['csv_file'])) {
                    $uploaded_file = $_FILES['csv_file'];
                    if (!function_exists('wp_handle_upload')) {
                        require_once ABSPATH . 'wp-admin/includes/file.php';
                    }
                    $uploaded_file['name'] = sanitize_file_name($uploaded_file['name']);
                    $movefile = wp_handle_upload($uploaded_file, array('test_form' => false));

                    if ($movefile && !isset($movefile['error'])) {
                        $csv_data = array_map('str_getcsv', file($movefile['file']));
                        array_shift($csv_data); // Remove the first row (header row)

                        if (!empty($csv_data)) {
                            foreach ($csv_data as $row) {
                                // Check if the ID already exists in the table
                                $query = $wpdb->prepare(
                                    "SELECT COUNT(*) FROM `{$new_recommendations_table_name}` WHERE `original_product_id` = %d",
                                    intval($row[0])
                                );

                                // Execute the query and retrieve the variable
                                $exists = $wpdb->get_var($query);

                                if ($exists == 0) {
                                    // Only insert if the ID does not exist
                                    $wpdb->insert(
                                        $new_recommendations_table_name,
                                        array(
                                            'original_product_id' => intval($row[0]),
                                            'related_upsells_list' => sanitize_text_field($row[1]),
                                            'related_crossells_list' => sanitize_text_field($row[2]),
                                            'aieo_neo4j_params' => sanitize_text_field($row[3])
                                        ),
                                        array('%d', '%s', '%s', '%s') // data format
                                    );
                                }
                            }
                        }

                        $total_products_impacted = $this->assign_upsells_cross_sells_from_db($new_recommendations_table_name);

                        // Set a transient to store the number of products impacted
                        set_transient('aieo_products_updated_count', $total_products_impacted, 60); // 60 seconds expiry

                        //  error_log('aieo_handle_recommendations_upload: File processed successfully');
                        $redirect_url = admin_url('admin.php?page=ai-eshop-optimizer');
                    } else {
                        //  error_log('aieo_handle_recommendations_upload: File upload error');
                        $redirect_url = add_query_arg('upsell_cross_sell_error', 1, admin_url('admin.php?page=ai-eshop-optimizer'));
                    }
                } else {
                    //   error_log('aieo_handle_recommendations_upload: Nonce check failed');
                    wp_die('Security check 3 failed.');
                }

                wp_redirect(esc_url_raw($redirect_url));
                exit;
            } else {
                //  error_log('aieo_handle_recommendations_upload: Nonce or POST data not set');
            }
        }



        public function assign_upsells_cross_sells_from_db($new_recommendations_table_name)
        {
            global $wpdb;

            // Drop performance tuning table if it exists and then create a new one
            $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}aieo_performance_tuning");

            $query = "CREATE TABLE {$wpdb->prefix}aieo_performance_tuning (
                        id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                        batch_size INT(11) UNSIGNED NOT NULL,
                        processing_time FLOAT NOT NULL,
                        total_processing_time FLOAT NOT NULL,
                        date_recorded TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                        PRIMARY KEY (id)
                    )";
            $wpdb->query($query);

            $offset = 0;
            $batch_size = get_option('aieo_batch_size', 10);
            $batch_sleep = get_option('aieo_batch_sleep', 1);

            $products_impacted_count = 0;
            $batch_times = [];

            while (true) {
                $sql = $wpdb->prepare("SELECT * FROM `{$new_recommendations_table_name}` WHERE (related_upsells_list <> '' OR related_crossells_list <> '') LIMIT %d OFFSET %d", $batch_size, $offset);

                $products_data = $wpdb->get_results($sql, ARRAY_A);

                if (empty($products_data)) {
                    break;
                }

                $start_time = microtime(true);

                foreach ($products_data as $data) {
                    $original_product_id = intval($data['original_product_id']);
                    $related_upsells_list = array_filter(explode(',', $data['related_upsells_list']));
                    $related_crossells_list = array_filter(explode(',', $data['related_crossells_list']));
                    $aieo_neo4j_params = $data['aieo_neo4j_params'];
                    $this->assign_upsells_cross_sells($original_product_id, $related_upsells_list, $related_crossells_list, $aieo_neo4j_params);
                }

                $end_time = microtime(true);
                $time_taken = $end_time - $start_time;
                $batch_times[] = $time_taken;

                if (count($batch_times) == 4) {
                    $avg_first_two = ($batch_times[0] + $batch_times[1]) / 2;
                    $avg_last_two = ($batch_times[2] + $batch_times[3]) / 2;

                    if ($avg_last_two > 2 * $avg_first_two) {
                        $batch_size = intdiv($batch_size, 2);  // Halve the batch size
                    }

                    $batch_times = [];
                }

                $products_impacted_count += count($products_data);
                $offset += $batch_size;
                sleep($batch_sleep);
            }

            return $products_impacted_count;
        }


        public function assign_upsells_cross_sells($original_product_id, $related_upsells_list, $related_crossells_list, $aieo_neo4j_params)
        {
            global $wpdb;

            $parsed_url = wp_parse_url(home_url());
            $domain = str_replace(['.', '-'], '', $parsed_url['host']);
            $current_user = wp_get_current_user();

            $tablesuffix =   esc_html($current_user->user_login) . '_' . esc_html($current_user->ID) . '_' . esc_html($domain);

            $start_time = microtime(true);

            $original_product = wc_get_product($original_product_id);
            if (!$original_product) {
                return 0;
            }

            $upsell_ids = array_slice($related_upsells_list, 0, 10);
            $cross_sell_ids = array_slice($related_crossells_list, 0, 10);

            if (!empty($upsell_ids)) {
                $original_product->set_upsell_ids($upsell_ids);
            }

            if (!empty($cross_sell_ids)) {
                $original_product->set_cross_sell_ids($cross_sell_ids);
            }

            $original_product->save();

            if ($aieo_neo4j_params === '0' || empty($aieo_neo4j_params)) {
                delete_post_meta($original_product_id, 'aieo_neo4j_params');
            } else {
                update_post_meta($original_product_id, 'aieo_neo4j_params', $aieo_neo4j_params);
            }

            // Calculate the time taken
            $end_time = microtime(true);
            $time_taken = $end_time - $start_time;


            $current_total = $wpdb->get_var("SELECT SUM(processing_time) FROM wp_aieo_performance_tuning");
            $new_total = $current_total + $time_taken;

            // Store in aieo_performance_tuning
            $monitor_performance = get_option('aieo_monitor_performance');
            if ($monitor_performance) {
                $wpdb->insert('wp_aieo_performance_tuning', [
                    'batch_size' => count($related_upsells_list) + count($related_crossells_list), // Sum of upsells and crossells
                    'processing_time' => $time_taken,
                    'total_processing_time' => $new_total
                ]);
            }
            return 1;
        }



        public function aieo_handle_eshop_optimizer_account()
        {
            if (
                isset($_POST['eshop_optimizer_account_nonce_7']) &&
                wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['eshop_optimizer_account_nonce_7'])), 'eshop_optimizer_account_action')
            ) {
                $username = sanitize_text_field($_POST['aieo_account_username']);
                $password = sanitize_text_field($_POST['aieo_account_password']);
                $table = sanitize_text_field($_POST['aieo_account_table'] ?? '');
                $result = $this->remote_user_authenticate_and_check_membership($username, $password);
                // Check the authentication result
                if ($result === 'You have been successfully authenticated as a Pro User' || $result === 'You have been successfully authenticated as a Free User') {
                    // Save username and encrypted password to WordPress options
                    update_option('aieo_account_username', $username);

                    // Encrypt the password
                    $method = 'aes-256-ctr';
                    $key = AUTH_KEY;
                    $iv = substr(AUTH_SALT, 0, 16);
                    $encrypted_password = openssl_encrypt($password, $method, $key, 0, $iv);
                    update_option('aieo_account_password', $encrypted_password);
                }

                // If the result is not any of the expected messages, then it's an error, and you redirect.
                if ($result !== 'Hello Pro' && $result !== 'Thank you for registering') {
                    update_option('aieo_account_message', $result);
                    wp_redirect(wp_get_referer());
                    exit;
                }

                // Encrypt the password
                $method = 'aes-256-ctr';
                $key = AUTH_KEY;
                $iv = substr(AUTH_SALT, 0, 16);
                $encrypted_password = openssl_encrypt($password, $method, $key, 0, $iv);

                //  update_option('aieo_account_table', $table);
                update_option('aieo_account_username', $username);
                update_option('aieo_account_password', $encrypted_password);
                update_option('aieo_activate_account', isset($_POST['aieo_activate_account']) ? 1 : 0);

                // Depending on the result, set a different success message.
                if ($result === 'Hello Pro') {
                    update_option('aieo_account_message', 'Successfully connected as a Pro user and settings saved.');
                } elseif ($result === 'Thank you for registering') {
                    update_option('aieo_account_message', 'Successfully connected as a registered user and settings saved.');
                }

                wp_redirect(wp_get_referer());
                exit;
            } else {
                // Handle the case where the nonce check fails
                wp_die('Security check 4 failed.');
            }
        }

        // Helper function to sanitize URLs for comparison
        public function sanitize_url_for_comparison($url)
        {
            // Remove scheme
            $url = preg_replace('#^https?://#', '', $url);
            // Remove www
            $url = str_replace('www.', '', $url);
            // Remove trailing slash
            $url = rtrim($url, '/');

            return $url;
        }

        public function remote_user_authenticate_and_check_membership($username, $password)
        {
            $auth_url = 'https://eshop-optimizer.com/wp-json/jwt-auth/v1/token/';
            $response = wp_remote_post($auth_url, [
                'body' => [
                    'username' => $username,
                    'password' => $password,
                ],
            ]);

            $body = wp_remote_retrieve_body($response);

            // return 'Authentication: ' . $body;
            // Save the full response to a WordPress option for debugging purposes
            update_option('aieo_jwt_response', $body);

            if (is_wp_error($response)) {
                return 'Authentication request error: ' . $response->get_error_message();
            }

            $token_info = json_decode($body, true);
            if (empty($token_info['token'])) {
                return 'Authentication failed. Response: ' . $body;
            }
            // Save the JWT token in options
            update_option('aieo_jwt_token', $token_info['token']);

            // Fetch user info using the token
            $user_info_url = 'https://eshop-optimizer.com/wp-json/wp/v2/users/me/?JWT=' . $token_info['token'];
            $response = wp_remote_get($user_info_url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token_info['token'],
                ],
            ]);

            if (is_wp_error($response)) {
                return 'User info request error: ' . $response->get_error_message();
            }

            $user_info_body = wp_remote_retrieve_body($response);
            $user_info = json_decode($user_info_body, true);

            // Save the full response from the /wp/v2/users/me endpoint for debugging
            update_option('aieo_jwt_debugging', $user_info_body);
            update_option('aieo_jwt_user_details', $user_info_body);


            // Fetch subscription expiration date and set it as an option
            if (isset($user_info['aieo_subscription_expiration_date'])) {
                update_option('aieo_subscription_expiration', $user_info['aieo_subscription_expiration_date']);
            } else {
                //  error_log('Unable to retrieve aieo_subscription_expiration_date from user info.');
            }

            // URL comparison logic
            $current_site_url = $this->sanitize_url_for_comparison(get_site_url());
            $sanitized_remote_url = '';
            $matching_website_db_prefix = null;
            $matching_report_db_suffix = null;

            if (isset($user_info['site_database_prefixes']) && is_array($user_info['site_database_prefixes'])) {
                foreach ($user_info['site_database_prefixes'] as $website) {
                    $sanitized_remote_url = $this->sanitize_url_for_comparison($website['website_url']);
                    if ($sanitized_remote_url === $current_site_url) {
                        $matching_website_db_prefix = $website['website_db_prefix'];

                        // Check and retrieve the report_db_suffix if it exists
                        if (isset($website['report_db_suffix'])) {
                            $matching_report_db_suffix = $website['report_db_suffix'];
                        }

                        break;
                    }
                }
            }

            if ($matching_website_db_prefix) {
                update_option('aieo_account_table', $matching_website_db_prefix);
                // If a matching report_db_suffix is found, update the option with that value
                if ($matching_report_db_suffix) {
                    update_option('aieo_account_report_table', $matching_report_db_suffix);
                }
            } else {
                $error_message = "There is no registered website in the account that matches this URL. 
                        Current site URL (sanitized): {$current_site_url} | 
                        Remote site URL last checked (sanitized): {$sanitized_remote_url}";
                //   error_log($error_message);
                add_action('admin_notices', function () use ($error_message) {
                    echo '<div class="notice notice-error is-dismissible"><p>' . esc_html($error_message)  . '</p></div>';
                });
            }
            // Additional checks and role-based logic
            $messages = [];

            if (isset($user_info['site_database_prefixes']) && !empty($user_info['site_database_prefixes'])) {
                update_option('aieo_first_website_db_prefix', $user_info['site_database_prefixes'][0]['website_db_prefix']);
            }

            if (!isset($user_info['roles']) || !is_array($user_info['roles'])) {
                $messages[] = 'Error fetching user roles or roles not set. Response: ' . $user_info_body;
            }

            if (isset($user_info['roles']) && is_array($user_info['roles'])) {
                if (in_array('pro_users', $user_info['roles'])) {
                    if (current_user_can('manage_options')) {
                        update_option('aieo_user_membership', 'Pro');
                        $expiry_date = get_option('aieo_subscription_expiration', '1/1/2025');
                        update_option('aieo_user_expiry', $expiry_date);
                    }
                    $messages[] = 'You have been successfully authenticated as a Pro User';
                } elseif (in_array('free_users', $user_info['roles'])) {
                    if (current_user_can('manage_options')) {
                        update_option('aieo_user_membership', 'Free');
                        $expiry_date = get_option('aieo_subscription_expiration', '1/1/2025');
                        update_option('aieo_user_expiry', $expiry_date);
                    }
                    $messages[] = 'You have been successfully authenticated as a Free User';
                } else {
                    $messages[] = 'Unknown role. User info: ' . $user_info_body;
                }
            }
            return implode(' | ', $messages);
        }



        public function authenticate_with_stored_token()
        {
            $token = get_option('aieo_jwt_token');

            if (!$token) {
                return 'No token found.';
            }

            $user_info_url = 'https://eshop-optimizer.com/wp-json/wp/v2/users/me/?nowprocket';
            $response = wp_remote_get($user_info_url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                ],
            ]);

            if (is_wp_error($response)) {
                return 'User info request error: ' . $response->get_error_message();
            }
            $user_info = json_decode(wp_remote_retrieve_body($response), true);

            if (!isset($user_info['roles']) || !is_array($user_info['roles'])) {
                return 'Error fetching user roles or roles not set. Response: ' . wp_remote_retrieve_body($response);
            }
            if (isset($user_info['roles']) && is_array($user_info['roles'])) {
                if (in_array('pro_users', $user_info['roles'])) {

                    if (current_user_can('manage_options')) {
                        // Save the checkboxes as options
                        update_option('aieo_user_membership', 'Pro');
                        update_option('aieo_user_membership', '1/1/2025');
                    }
                    return 'You have been successfully authenticated as a Pro User';
                }
            }
            if (in_array('free_users', $user_info['roles'])) {
                if (current_user_can('manage_options')) {
                    // Save the checkboxes as options
                    update_option('aieo_user_membership', 'Free');
                }
                return 'You have been successfully authenticated as a Free User';
            }
            return 'Unknown role. User info: ' . wp_remote_retrieve_body($response);
        }


        function aieo_handle_eshop_optimizer_transfer_to_remote()
        {
            if (
                isset($_POST['eshop_optimizer_transfer_to_remote_nonce_8']) &&
                wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['eshop_optimizer_transfer_to_remote_nonce_8'])), 'eshop_optimizer_transfer_to_remote_action')
            ) {
                // Set a transient for the message
                set_transient('aieo_upload_notice', 'Soon with you', 60 * 5); // Message will be available for 5 minutes

                wp_redirect(esc_url(admin_url('admin.php?page=ai-eshop-optimizer')));
                exit;
            } else {
                // Handle the case where the nonce check fails
                wp_die('Security check 5 failed.');
            }
        }
    }
}


if (!class_exists('aieo_UTM_appender')) {
    class aieo_UTM_appender
    {

        public function __construct()
        {
            add_filter('post_type_link', array($this, 'aieo_custom_product_title_link'), 10, 2);
            add_filter('woocommerce_product_add_to_cart_url', array($this, 'aieo_modify_add_to_cart_url'), 10, 2);
            add_action('wp_enqueue_scripts', array($this, 'enqueue_gtag_script'));
        }

        public function enqueue_gtag_script()
        {
            if (is_product() && get_option('aieo_activate_utm_stats') == 1) {
                // Enqueue the script
                wp_enqueue_script('gtag-event-script', plugin_dir_url(__FILE__) . 'js/ai-eshop-optimizer-googleGA4.js', array(), null, true);

                // Pass data from WordPress to your script
                $script_data = array(
                    'aieo_google_ga4' => get_option('aieo_google_ga4', 'default_value_if_not_set')
                );
                wp_localize_script('gtag-event-script', 'myLocalizedData', $script_data);
            }
        }


        public function aieo_custom_product_title_link($url, $post)
        {
            // Check if post is a product and we're on a product page
            if ($post->post_type !== 'product' || !is_product() || get_option('aieo_activate_utm_stats') != 1) {
                return $url;
            }

            global $woocommerce_loop;
            $main_product_id = get_queried_object_id();
            $target_product_id = $post->ID;

            if (isset($woocommerce_loop['name']) && $woocommerce_loop['name'] == 'upsells') {
                $utm_parameters = array(
                    'utm_source' => 'AIOUpSell',
                    'utm_campaign' =>  $woocommerce_loop['loop'] . '_' . $main_product_id . '_' . $target_product_id
                );
            } elseif (isset($woocommerce_loop['name']) && $woocommerce_loop['name'] == 'cross-sells') {
                $utm_parameters = array(
                    'utm_source' => 'AIOCrossSell',
                    'utm_campaign' =>  $woocommerce_loop['loop'] . '_' . $main_product_id . '_' . $target_product_id
                );
            } elseif (isset($woocommerce_loop['name']) && $woocommerce_loop['name'] == 'related') {
                $utm_parameters = array(
                    'utm_source' => 'AIOWooRANDRelated',
                    'utm_campaign' =>  $woocommerce_loop['loop'] . '_' . $main_product_id . '_' . $target_product_id
                );
            } elseif (isset($woocommerce_loop['name']) && $woocommerce_loop['name'] == 'recently-viewed') {
                $utm_parameters = array(
                    'utm_source' => 'AIORecentlyViewed',
                    'utm_campaign' =>  $woocommerce_loop['loop'] . '_' . $main_product_id . '_' . $target_product_id
                );
            } else {
                return $url;
            }
            return add_query_arg($utm_parameters, $url);
        }

        public function aieo_modify_add_to_cart_url($url, $product)
        {
            global $woocommerce_loop;

            if (!is_product() || get_option('aieo_activate_utm_stats') != 1) {
                return $url;
            }

            $main_product_id = get_queried_object_id();
            $target_product_id = $product->get_id();

            $utm_base_parameters = array();

            // Determine the campaign and term based on the current loop name
            switch ($woocommerce_loop['name']) {
                case 'upsells':
                    $utm_parameters = array_merge($utm_base_parameters, array(
                        'utm_source' => 'AIOCartUpSell',
                        'utm_campaign' =>  $woocommerce_loop['loop'] . '_' . $main_product_id . '_' . $target_product_id
                    ));
                    break;

                case 'cross-sells':
                    $utm_parameters = array_merge($utm_base_parameters, array(
                        'utm_source' => 'AIOCartCrossSell',
                        'utm_campaign' =>  $woocommerce_loop['loop'] . '_' . $main_product_id . '_' . $target_product_id
                    ));
                    break;

                case 'related':
                    $utm_parameters = array_merge($utm_base_parameters, array(
                        'utm_source' => 'AIOCartWooRANDRelated',
                        'utm_campaign' =>  $woocommerce_loop['loop'] . '_' . $main_product_id . '_' . $target_product_id
                    ));
                    break;

                case 'recently-viewed':
                    $utm_parameters = array_merge($utm_base_parameters, array(
                        'utm_source' => 'AIOCartRecentlyViewed',
                        'utm_campaign' =>  $woocommerce_loop['loop'] . '_' . $main_product_id . '_' . $target_product_id
                    ));
                    break;

                default:
                    return $url;
            }
            return add_query_arg($utm_parameters, $url);
        }
    }

    if (get_option('aieo_activate_utm_stats') == 1) {
        new aieo_UTM_appender();
    }
}



if (!class_exists('aieo_display_recommendations')) {
    class aieo_display_recommendations
    {

        public function __construct()
        {
            $display_order = get_option('aieo_recommendations_display_order', 0); // Default to 0 if the option doesn't exist
            $display_order = ($display_order == 1) ? 1 : 0;

            if ($display_order == 1) {
                $upsell_priority = 20;
                $cross_sell_priority = 15;
            } else {
                $upsell_priority = 15;
                $cross_sell_priority = 20;
            }

            // Deal with Upsell Sell Display
            $display_upsells = get_option('aieo_display_upsells', 0); // Default to 0 if the option doesn't exist
            $display_upsells = $display_upsells == 1 ? 1 : 0;

            if ($display_upsells == 1) {
                remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
                add_action('woocommerce_after_single_product_summary', array($this, 'aieo_show_upsell_in_single_product'), $upsell_priority);
            } else {
                remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
            }

            // Deal with Cross Sell Display
            $display_cross_sells = get_option('aieo_display_cross_sells', 0); // Default to 0 if the option doesn't exist
            $display_cross_sells = $display_cross_sells == 1 ? 1 : 0;

            if ($display_cross_sells == 1) {
                add_action('woocommerce_after_single_product_summary', array($this, 'aieo_show_cross_sell_in_single_product'), $cross_sell_priority);
            }

            // Deal with Cross Sell Display
            $display_related = get_option('aieo_display_related', 0); // Default to 0 if the option doesn't exist
            $display_related = $display_related == 1 ? 1 : 0;

            if ($display_related == 1) {
                remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
                add_action('woocommerce_after_single_product_summary', array($this, 'aieo_show_related_products_in_single_product'), 20);
            } else {
                remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
            }

            // Deal with Cross Sell Display
            $display_recently_viewed_products = get_option('aieo_display_recently_viewed_products', 0); // Default to 0 if the option doesn't exist
            $display_recently_viewed_products = $display_recently_viewed_products == 1 ? 1 : 0;

            if ($display_recently_viewed_products == 1) {
                remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 30);
                add_action('woocommerce_after_single_product_summary', array($this, 'aieo_show_recently_viewed_products'), 30);
            } else {
                remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 30);
            }
        }


        public function aieo_show_recently_viewed_products()
        {
            // Get the recently viewed product IDs from the user's cookies.
            $viewed_products = array();
            if (!empty($_COOKIE['woocommerce_recently_viewed'])) {
                $recently_viewed = sanitize_text_field(wp_unslash($_COOKIE['woocommerce_recently_viewed']));
                $viewed_products = array_reverse(array_filter(array_map('absint', explode('|', $recently_viewed))));
            }

            if (empty($viewed_products)) {
                return;
            }

            $args = array(
                'post_type'      => 'product',
                'posts_per_page' => 5,
                'no_found_rows'  => 1,
                'post_status'    => 'publish',
                'post__in'       => $viewed_products,
                'orderby'        => 'post__in',
            );

            $products = new WP_Query($args);

            if ($products->have_posts()) :
                echo '<section id="aieo-recently-viewed" class="related recently-viewed products"><h2>' . esc_html__('Recently Viewed Products Recommendations ', 'ai-eshop-optimizer') . '</h2>';
                woocommerce_product_loop_start();
                while ($products->have_posts()) : $products->the_post();
                    global $woocommerce_loop;
                    $woocommerce_loop['name'] = 'recently-viewed';
                    wc_get_template_part('content', 'product');
                endwhile; // end of the loop.
                woocommerce_product_loop_end();
                echo '</section>';
            endif;
            wp_reset_postdata();
        }


        public function aieo_show_related_products_in_single_product()
        {
            global $product;
            $related_ids = wc_get_related_products($product->get_id());

            if (empty($related_ids)) {
                return;
            }

            $args = array(
                'post_type' => 'product',
                'posts_per_page' => -1,
                'post__in' => $related_ids,
                'orderby' => 'rand'
            );
            $products = new WP_Query($args);

            if ($products->have_posts()) :
                echo '<section id="aieo-related" class="related products"><h2>' . esc_html__('Related Products Recommendations ', 'ai-eshop-optimizer') . '</h2>'; // This is the translated string "Related Products" in Greek. Adjust the translation if needed.
                woocommerce_product_loop_start();
                while ($products->have_posts()) : $products->the_post();
                    global $woocommerce_loop;
                    $woocommerce_loop['name'] = 'related';
                    wc_get_template_part('content', 'product');
                endwhile; // end of the loop.
                woocommerce_product_loop_end();
                echo '</section>';
            endif;
            wp_reset_postdata();
        }


        public function aieo_show_upsell_in_single_product()
        {
            $upsells = get_post_meta(get_the_ID(), '_upsell_ids', true);

            if (empty($upsells)) {
                return;
            }

            $args = array(
                'post_type' => 'product',
                'posts_per_page' => -1,
                'post__in' => $upsells
            );
            $products = new WP_Query($args);
            if ($products->have_posts()) :
                echo '<section id="aieo-up-sells" class="related up-sells upsells products"><h2>' . esc_html__('Up-sell Recommendations ', 'ai-eshop-optimizer') . '</h2>'; // This is the translated string "You may also be interested in" in Greek. Adjust the translation if needed.
                woocommerce_product_loop_start();
                while ($products->have_posts()) : $products->the_post();
                    global $woocommerce_loop;
                    $woocommerce_loop['name'] = 'upsells';
                    wc_get_template_part('content', 'product');
                endwhile; // end of the loop.
                woocommerce_product_loop_end();
                echo '</section>';
            endif;
            wp_reset_postdata();
        }


        public function aieo_show_cross_sell_in_single_product()
        {
            $crosssells = get_post_meta(get_the_ID(), '_crosssell_ids', true);

            if (empty($crosssells)) {
                return;
            }

            $args = array(
                'post_type' => 'product',
                'posts_per_page' => -1,
                'post__in' => $crosssells
            );
            $products = new WP_Query($args);
            if ($products->have_posts()) :
                echo '<section id="aieo-cross-sells" class="related cross-sells products"><h2>' . esc_html__('Cross-sell Recommendations ', 'ai-eshop-optimizer') . '</h2>';
                woocommerce_product_loop_start();
                while ($products->have_posts()) : $products->the_post();
                    global $woocommerce_loop;
                    $woocommerce_loop['name'] = 'cross-sells';
                    wc_get_template_part('content', 'product');
                endwhile; // end of the loop.
                woocommerce_product_loop_end();
                echo '</section>';
            endif;
            wp_reset_postdata();
        }
    }
}
