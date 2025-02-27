<?php
function rfc_bulk_install_fresh_plugins() {
    // Check if we are on the correct admin page
    if (isset($_GET['page']) && sanitize_text_field(wp_unslash($_GET['page'])) === 'fresh-plugins' && isset($_SERVER['REQUEST_URI']) && strpos(sanitize_text_field(wp_unslash($_SERVER['REQUEST_URI'])), 'plugins.php') !== false) {

        if (isset($_POST['rfc_bulk_install_fresh']) && !empty($_POST['plugins'])) {
            check_admin_referer('rfc_bulk_install_fresh_nonce');

            // Include the necessary plugin API
            rfc_include_plugin_api();

            // Sanitize and unslash input
            $plugins = array_map('sanitize_text_field', wp_unslash($_POST['plugins']));
            $batch_size = 5; // Define batch size

            // Split the plugins array into chunks of the defined batch size
            foreach (array_chunk($plugins, $batch_size) as $plugin_batch) {
                foreach ($plugin_batch as $plugin_file) {
                    if (rfc_is_plugin_from_wporg($plugin_file)) {
                        $plugin_slug = dirname(sanitize_text_field($plugin_file));

                        // Delete the plugin
                        delete_plugins([sanitize_text_field($plugin_file)]);

                        // Get plugin info from WordPress.org
                        $api = plugins_api('plugin_information', [
                            'slug' => $plugin_slug,
                            'fields' => ['sections' => false],
                        ]);

                        if (!is_wp_error($api)) {
                            // Install the fresh copy
                            $upgrader = new Plugin_Upgrader(new WP_Ajax_Upgrader_Skin());
                            $upgrader->install(esc_url_raw($api->download_link));
                        }
                    }
                }

                // Add a small delay to avoid server overload
                sleep(1); // 1-second delay between batches
            }

            // Redirect back to the settings page with a success message
            wp_safe_redirect(admin_url('admin.php?page=fresh-plugins&bulk_reinstalled=1'));
            exit;
        }
    }
}

// Hook into admin_init
add_action('admin_init', 'rfc_bulk_install_fresh_plugins');

// Enqueue necessary styles and scripts for the loading overlay
function rfc_enqueue_loader_scripts() {
    if (isset($_GET['page']) && $_GET['page'] === 'fresh-plugins') {
        // Enqueue CSS for the loader
        ?>
        <style>
            #fresh-install-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(59, 101, 125, 0.7);
                display: none;
                z-index: 9999;
                justify-content: center;
                align-items: center;
            }

            #fresh-install-loader {
                text-align: center;
                color: white;
                position: relative;
            }

            #fresh-install-loader .loader-circle {
                border: 16px solid #f99568;
                border-radius: 50%;
                border-top: 16px solid #00D78B;
                width: 120px;
                height: 120px;
                animation: spin 2s linear infinite;
                position: relative;
                z-index: 1;
            }

            #fresh-install-loader .loader-text {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                z-index: 2; /* Ensure the text stays above the circle */
                color: white;
                font-size: 14px;
            }

            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }
        </style>
        <?php
        // Enqueue JavaScript for showing and hiding the overlay
        ?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const form = document.querySelector("form"); // Target the form element
                if (form) {
                    form.addEventListener("submit", function() {
                        document.getElementById("fresh-install-overlay").style.display = "flex"; // Show the overlay
                    });
                }
            });
        </script>
        <?php
    }
}
add_action('admin_footer', 'rfc_enqueue_loader_scripts');

// Add the loader overlay HTML
function rfc_add_loader_overlay() {
    if (isset($_GET['page']) && $_GET['page'] === 'fresh-plugins') {
        ?>
        <div id="fresh-install-overlay">
            <div id="fresh-install-loader">
                <div class="loader-circle"></div>
                <div class="loader-text">Installing Fresh...</div>
            </div>
        </div>
        <?php
    }
}
add_action('admin_footer', 'rfc_add_loader_overlay');