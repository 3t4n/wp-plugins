<?php

namespace AdBlockGuard;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class Admin_Menu
{
    public function __construct()
    {
        // Hook into the admin_menu action
        add_action('admin_menu', [$this, 'add_menus'], 100);

        // Hook into admin_enqueue_scripts for enqueuing styles/scripts
        add_action('admin_enqueue_scripts', [$this, 'enqueue_demo_overlay_styles'], 100);
    }

    public function add_menus()
    {
        $parent_slug = 'wuadblockguard_settings'; // This will be the top-level menu slug

        // Add Demo Page submenu
        add_submenu_page(
            $parent_slug, 
            __('Demo Overlay', 'ad-block-guard'), 
            __('Demo Overlay', 'ad-block-guard'), 
            'manage_options', 
            'wuadblockguard_demo_page', 
            [$this, 'demo_page_callback']
        );

        // Add System Check submenu
        add_submenu_page(
            $parent_slug,
            __('System Check', 'ad-block-guard'),
            __('System Check', 'ad-block-guard'),
            'manage_options',
            'wuadblockguard_system_check',
            [$this, 'system_check_page_callback']
        );

        // Add License Key submenu
        add_submenu_page(
            $parent_slug, 
            __('License Key', 'ad-block-guard'), 
            __('License Key', 'ad-block-guard'), 
            'manage_options', 
            'wuadblockguard_license_key', 
            [$this, 'license_key_page_callback']
        );
    }

    public function system_check_page_callback()
    {
        if (!current_user_can('manage_options')) {
            return;
        }

        global $wpdb;

		// 1a) Check AdBlock System enabled
		$adblockguard_enable = carbon_get_theme_option('wuadblockguard_enable');


		// 1b) Check if any usergroups are enabled
		$wuadblockguard_usergroup_settings = carbon_get_theme_option('wuadblockguard_usergroup_settings');

		$overlays_enabled = [];

		if (isset($wuadblockguard_usergroup_settings)) {
			foreach ($wuadblockguard_usergroup_settings as $usergroup) {
				if ($usergroup['overlay_enabled'] === true) {
					$overlays_enabled[] = $usergroup['usergroup'];
				}
			}
		}



        // 3) Check charset via get_col_charset
        $charset_result = '';
        if (method_exists($wpdb, 'get_col_charset')) {
            $charset_result = $wpdb->get_col_charset($wpdb->options, 'option_value');
        }
        $is_utf8mb4 = ($charset_result === 'utf8mb4');

        echo '<div class="wrap">';
        echo '<h1>' . esc_html__('System Check', 'ad-block-guard') . '</h1>';





        /**
         * =============================================
         *  "System Settings"
         * =============================================
         */
        echo '<h2>' . esc_html__('AdBlock Guard Settings', 'ad-block-guard') . '</h2>';
        echo '<table class="wp-list-table widefat fixed striped responsive-table table-width">'; 
        echo '<thead><tr>';
        echo '<th width="200">' . esc_html__('Check', 'ad-block-guard') . '</th>';
        echo '<th width="160">' . esc_html__('Status', 'ad-block-guard') . '</th>';
        echo '<th>' . esc_html__('Message', 'ad-block-guard') . '</th>';
        echo '</tr></thead>';
        echo '<tbody>';

        // Row for adblock enabled
        echo '<tr>';
        echo '<td>' . esc_html__('AdBlock system enabled', 'ad-block-guard') . '</td>';
        echo '<td>';
        if ($adblockguard_enable) {
            echo '<span class="license-status active">' . esc_html__('Yes', 'ad-block-guard') . '</span>';
        } else {
            echo '<span class="license-status expired">' . esc_html__('No', 'ad-block-guard') . '</span>';
        }
        echo '</td>';
        if ($adblockguard_enable) {
            echo '<td><span class="license-status active">' . esc_html__('Passed', 'ad-block-guard') . '</span></td>';
        } else {
            echo '<td>' . esc_html__('AdBlock Guard System is globally disabled in the detection options', 'ad-block-guard') . '</td>';
        }
        echo '</tr>';


        // Row for overlays enabled
        echo '<tr>';
        echo '<td>' . esc_html__('Overlays enabled', 'ad-block-guard') . '</td>';
        echo '<td>';
        if (count($overlays_enabled) > 0) {

        	foreach ($overlays_enabled as $usergroup) {
        		echo '<span class="license-status active" style="display: block;">' . esc_html__($usergroup, 'ad-block-guard') . '</span>';
        	}
            
        } else {
            echo '<span class="license-status expired">' . esc_html__('No', 'ad-block-guard') . '</span>';
        }
        echo '</td>';
        if (count($overlays_enabled) > 0) {
            echo '<td><span class="license-status active">' . esc_html__('Passed', 'ad-block-guard') . '</span></td>';
        } else {
            echo '<td>' . esc_html__('AdBlock Guard System has zero overlays enabled', 'ad-block-guard') . '</td>';
        }
        echo '</tr>';







        echo '</tbody>';
        echo '</table>';



        /**
         * =============================================
         *  "PHP Settings" TABLE (with table-width)
         * =============================================
         */
        echo '<h2>' . esc_html__('PHP Settings', 'ad-block-guard') . '</h2>';
        echo '<table class="wp-list-table widefat fixed striped responsive-table table-width">'; 
        echo '<thead><tr>';
        echo '<th width="200">' . esc_html__('Check', 'ad-block-guard') . '</th>';
        echo '<th width="160">' . esc_html__('Status', 'ad-block-guard') . '</th>';
        echo '<th>' . esc_html__('Message', 'ad-block-guard') . '</th>';
        echo '</tr></thead>';
        echo '<tbody>';

        // Row for charset
        echo '<tr>';
        echo '<td>' . esc_html__('charset is utf8mb4', 'ad-block-guard') . '</td>';
        echo '<td>';
        if ($is_utf8mb4) {
            echo '<span class="license-status active">' . esc_html__('Yes', 'ad-block-guard') . '</span>';
        } else {
            echo '<span class="license-status expired">' . esc_html__('No', 'ad-block-guard') . '</span>';
        }
        echo '</td>';
        if ($is_utf8mb4) {
            echo '<td><span class="license-status active">' . esc_html__('Passed', 'ad-block-guard') . '</span></td>';
        } else {
            echo '<td>' . esc_html__('Requires attention', 'ad-block-guard') . '</td>';
        }


        echo '</tr>';

        echo '</tbody>';
        echo '</table>';

        /**
         * =============================================================
         *   "WP Rocket - Cache System" TABLE (only if WP_ROCKET_VERSION)
         * =============================================================
         */
        if (defined('WP_ROCKET_VERSION')) {
            $wp_rocket_settings = get_option('wp_rocket_settings', []);
            $conflicting_settings = [
                'minify_concatenate_js' => 'The "Combine JavaScript files" option is not compatible and must be deactivated.',
                'manual_preload'        => 'The "Activate Preloading" option is not compatible and must be deactivated.',
                'defer_all_js'          => 'The "Defer All JavaScript files" option creates processing delays and must be deactivated.',
                'delay_js'              => 'The "Delay JavaScript" option creates significant overlay delays and must be deactivated.',
            ];

            echo '<h2>' . esc_html__('WP Rocket - Cache System', 'ad-block-guard') . '</h2>';
            echo '<table class="wp-list-table widefat fixed striped responsive-table table-width">';
            echo '<thead><tr>';
            echo '<th width="200">' . esc_html__('Setting', 'ad-block-guard') . '</th>';
            echo '<th width="160">' . esc_html__('Disabled?', 'ad-block-guard') . '</th>';
            echo '<th>' . esc_html__('Message', 'ad-block-guard') . '</th>';
            echo '</tr></thead>';
            echo '<tbody>';

            foreach ($conflicting_settings as $setting_key => $message) {
                $is_disabled = empty($wp_rocket_settings[$setting_key]);
                echo '<tr>';
                echo '<td>' . esc_html($setting_key) . '</td>';
                echo '<td>';
                if ($is_disabled) {
		            echo '<span class="license-status active">' . esc_html__('Yes', 'ad-block-guard') . '</span>';
		        } else {
		            echo '<span class="license-status expired">' . esc_html__('No', 'ad-block-guard') . '</span>';
                }
                echo '</td>';

                if ($is_disabled) {
                    echo '<td><span class="license-status active">Passed</span></td>';
                } else {
                    echo '<td>' . esc_html($message) . '</td>';
                }
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
        }

        // ------------------------------------------------------------------
        // HANDLE FORM SUBMISSION AND EMAIL
        // ------------------------------------------------------------------
        if (
            isset($_POST['adblock_guard_request_nonce']) &&
            wp_verify_nonce($_POST['adblock_guard_request_nonce'], 'adblock_guard_request')
        ) {
            // Sanitize fields
            $name            = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '';
            $user_email      = isset($_POST['user_email']) ? sanitize_email($_POST['user_email']) : '';
            $request_type    = isset($_POST['request_type']) ? sanitize_text_field($_POST['request_type']) : '';
            $request_details = isset($_POST['request_details']) ? sanitize_textarea_field($_POST['request_details']) : '';
            $include_site_info = !empty($_POST['include_site_info']);

            // Build basic details in the email body
            $domain  = $_SERVER['SERVER_NAME'] ?? 'unknown-domain';
            $subject = "AdBlock Guard Request: {$domain}";

            // We'll build an HTML email body
            $body  = '<p><strong>Name:</strong> ' . esc_html($name) . '</p>';
            $body .= '<p><strong>Email:</strong> ' . esc_html($user_email) . '</p>';
            $body .= '<p><strong>Type of Request:</strong> ' . esc_html($request_type) . '</p>';
            if (!empty($request_details)) {
                // nl2br so line breaks show in HTML
                $body .= '<p><strong>Request Details:</strong><br>' . nl2br(esc_html($request_details)) . '</p>';
            }


			// If you want to ensure directory sizes are computed:
			if ( ! class_exists( '\WP_Site_Health' ) ) {
			    require_once ABSPATH . 'wp-admin/includes/class-wp-site-health.php';
			}

			if ( class_exists('\WP_Site_Health') ) {
			    $site_health = \WP_Site_Health::get_instance();
			    if ( method_exists($site_health, 'perform_async_tests') ) {
			        $site_health->perform_async_tests();
			    }
			}

			// Then fetch the debug data
			if ( ! class_exists( '\WP_Debug_Data' ) ) {
			    require_once ABSPATH . 'wp-admin/includes/class-wp-debug-data.php';
			}

			if ( class_exists('\WP_Debug_Data') ) {


			    // true => include sensitive data in the output
			    $debug_data = \WP_Debug_Data::debug_data( true );

			    // If any data is returned, convert it into an HTML table
			    if ( ! empty($debug_data) && is_array($debug_data) ) {
			        $body .= '<hr><h3>Site Health Debug Info (WP_Debug_Data):</h3>';
			        $body .= '<table border="1" cellpadding="5" cellspacing="0" width="100%">';
			        
			        foreach ( $debug_data as $section_key => $section ) {
			            // Each $section has 'label' and 'fields' keys
			            $section_label = ! empty($section['label']) ? $section['label'] : ucfirst($section_key);
			            $body .= '<tr><td colspan="2" style="background: #ddd;"><strong>' . esc_html($section_label) . '</strong></td></tr>';

			            // The 'fields' array typically contains key => value
			            if ( ! empty($section['fields']) && is_array($section['fields']) ) {
			                foreach ( $section['fields'] as $field_key => $field ) {
			                    $field_label = $field['label'] ?? $field_key;
			                    $field_value = is_array($field['value']) 
			                                   ? print_r($field['value'], true) 
			                                   : $field['value'];

			                    // Escape or format as needed
			                    $body .= '<tr>';
			                    $body .= '<td><strong>' . esc_html($field_label) . '</strong></td>';
			                    $body .= '<td>' . nl2br(esc_html($field_value)) . '</td>';
			                    $body .= '</tr>';
			                }
			            }
			        }
			        
			        $body .= '</table>';
			    } else {
			        $body .= '<hr><p><em>No debug data found or site health is not available.</em></p>';
			    }
			} else {
			    $body .= '<hr><p><em>No \WP_Debug_Data data not found or site health is not available.</em></p>';
			}

			// Path to your plugin's log file
			$log_path = ADBLOCKGUARD_PLUGIN_DIR . 'ad-block-guard.log';

			// Build attachments array
			$attachments = array();

			// If the log exists, load the last 5k lines & store in a temp file
			if ( file_exists( $log_path ) ) {
			    $log_tail = self::get_last_lines( $log_path, 5000 );
			    if ( $log_tail ) {
			        // Build a custom-named temp file in system temp directory
			        $timestamp = time();
			        $named_tmp = sys_get_temp_dir() . "/ad-block-guard-tail-{$timestamp}.log";

			        // Write the tail
			        file_put_contents( $named_tmp, $log_tail );

			        // Add to attachments
			        $attachments[] = $named_tmp;
			    }
			}

            // Prepare HTML headers for wp_mail
            $headers = ['Content-Type: text/html; charset=UTF-8'];

            // Attempt to send
            $sent = wp_mail('wutime@gmail.com', $subject, $body, $headers, $attachments);

			// Clean up the temp file(s)
			if ( $sent && ! empty( $attachments ) ) {
			    foreach ( $attachments as $tmp_file ) {
			        @unlink( $tmp_file );
			    }
			}

            if ($sent) {
                echo '<div class="notice notice-success"><p>';
                esc_html_e('Your request has been sent successfully!', 'ad-block-guard');
                echo '</p></div>';
            } else {
                echo '<div class="notice notice-error"><p>';
                _e(
                    'Unable to send email! Contact <a href="mailto:wutime@gmail.com">wutime@gmail.com</a> directly.',
                    'ad-block-guard'
                );
                echo '</p></div>';
            }
        }

        // ------------------------------------------------------------------
        // DISPLAY THE FORM (ONLY ONCE)
        // ------------------------------------------------------------------
        $current_user = wp_get_current_user();
        $default_email = $current_user ? $current_user->user_email : '';

        ?>
        <h2><?php echo esc_html__('Make a Support Request', 'ad-block-guard'); ?></h2>
        <form method="post" action="">
            <?php wp_nonce_field('adblock_guard_request', 'adblock_guard_request_nonce'); ?>

            <table class="wp-list-table widefat fixed striped responsive-table table-width">
                <thead>
                    <tr>
                        <th colspan="2"><?php esc_html_e('Send a Request', 'ad-block-guard'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- 1) Name -->
                    <tr>
                        <th scope="row">
                            <label for="adbg_name"><?php esc_html_e('Name:', 'ad-block-guard'); ?></label>
                        </th>
                        <td>
                            <input 
                                type="text" 
                                id="adbg_name" 
                                name="name" 
                                value=""
                                size="40" 
                            />
                        </td>
                    </tr>
                    <!-- 2) Email -->
                    <tr>
                        <th scope="row">
                            <label for="adbg_user_email"><?php esc_html_e('Email:', 'ad-block-guard'); ?></label>
                        </th>
                        <td>
                            <input
                                type="email"
                                id="adbg_user_email"
                                name="user_email"
                                value="<?php echo esc_attr($default_email); ?>"
                                size="40"
                            />
                        </td>
                    </tr>
                    <!-- 3) Type of Request -->
                    <tr>
                        <th scope="row"><?php esc_html_e('Type of Request:', 'ad-block-guard'); ?></th>
                        <td>
                            <label>
                                <input type="radio" name="request_type" value="Support request" checked>
                                <?php esc_html_e('Support request', 'ad-block-guard'); ?>
                            </label><br/>
                            <label>
                                <input type="radio" name="request_type" value="Feature request">
                                <?php esc_html_e('Feature request', 'ad-block-guard'); ?>
                            </label><br/>
                            <label>
                                <input type="radio" name="request_type" value="Bug request">
                                <?php esc_html_e('Bug request', 'ad-block-guard'); ?>
                            </label>
                        </td>
                    </tr>
                    <!-- 4) Request Details -->
                    <tr>
                        <th scope="row">
                            <label for="adbg_request_details"><?php esc_html_e('Request Details:', 'ad-block-guard'); ?></label>
                        </th>
                        <td>
                            <textarea
                                id="adbg_request_details"
                                name="request_details"
                                rows="5"
                                cols="40"
                            ></textarea>
                        </td>
                    </tr>
                    <!-- 5) Include Site Health Info -->
                    <tr>
                        <th scope="row">
                            <label for="include_site_info">
                                <?php esc_html_e('Include Site Health Debug Info:', 'ad-block-guard'); ?>
                            </label>
                        </th>
                        <td>
                            <input
                                type="checkbox"
                                id="include_site_info"
                                name="include_site_info"
                                value="1"
                                checked
                            />
                        </td>
                    </tr>
                </tbody>
            </table>

            <?php submit_button(__('Send Request', 'ad-block-guard')); ?>
        </form>

        <?php
        echo '</div>'; // end wrap
    }

    public function enqueue_demo_overlay_styles($hook_suffix)
    {
        $screen = get_current_screen();

        if ($screen && $screen->id === 'adblock-guard_page_wuadblockguard_demo_page') {
            if (!current_user_can('manage_options')) {
                return;
            }

            $is_overlay = isset($_GET['overlay']) && $_GET['overlay'] == '1';

            if ($is_overlay) {
                if (
                    isset($_GET['wuadblockguard_demo_nonce']) && 
                    wp_verify_nonce(sanitize_text_field(wp_unslash($_GET['wuadblockguard_demo_nonce'])), 'wuadblockguard_demo_action')
                ) {
                    wp_enqueue_style(
                        'demo-overlay-admin-css', 
                        ADBLOCKGUARD_PLUGIN_URL . 'assets/css/admin-demo-overlay.css',
                        [],
                        ADBLOCKGUARD_VERSION
                    );
                } else {
                    wp_die(esc_html__('Nonce verification failed. Please try again.', 'ad-block-guard'));
                }
            }
        }
    }

    public function license_key_page_callback()
    {
        include ADBLOCKGUARD_PLUGIN_DIR . 'templates/admin/license-key-page.php';
    }

    public function demo_page_callback()
    {
        $this->render_overlay_demo_page();
    }

    private function render_overlay_demo_page()
    {
        if (!current_user_can('manage_options')) {
            return;
        }

        $system_enabled = carbon_get_theme_option('wuadblockguard_enable');
        $remote_detection_enabled = carbon_get_theme_option('wuadblockguard_remote_detection');
        $network_detection_enabled = carbon_get_theme_option('wuadblockguard_network_detection');
        $fast_detection_enabled = carbon_get_theme_option('wuadblockguard_fast_detection');

        $this->render_warning_table(
            !$system_enabled,
            __('WARNING: You have the system disabled in "General Settings".', 'ad-block-guard')
        );
        $this->render_warning_table(
            !$remote_detection_enabled && !$network_detection_enabled && !$fast_detection_enabled,
            __('ERROR: All detection methods are disabled. The system will NOT work with all methods disabled.', 'ad-block-guard')
        );

        $usergroup_settings = carbon_get_theme_option('wuadblockguard_usergroup_settings', []);
        list($enabled_overlays, $disabled_overlays) = $this->process_overlays($usergroup_settings);

        echo '<div class="wrap">';
        echo '<h1>' . esc_html__('Demo Overlay', 'ad-block-guard') . '</h1>';
        echo '<div class="updated" style="margin-left:0"><p>' 
             . esc_html__('REMINDER: The overlay close button will ALWAYS be available on overlays during demo mode.', 'ad-block-guard') 
             . '</p></div>';

        echo '<div class="overlay-tables-container">';
        $this->render_overlays_table(__('Enabled Overlays', 'ad-block-guard'), $enabled_overlays, true);
        $this->render_overlays_table(__('Disabled Overlays', 'ad-block-guard'), $disabled_overlays, false);
        echo '</div>';

        echo '</div>';
    }

    private function render_warning_table($condition, $message)
    {
        if ($condition) {
            echo '<div class="notice notice-error"><p>' . esc_html($message) . '</p></div>';
        }
    }

    private function process_overlays($usergroup_settings)
    {
        $enabled_overlays = [];
        $disabled_overlays = [];

        if (!empty($usergroup_settings)) {
            foreach ($usergroup_settings as $group) {
                if (isset($group['overlay_enabled']) && $group['overlay_enabled']) {
                    $enabled_overlays[] = $group;
                } else {
                    $disabled_overlays[] = $group;
                }
            }
        }

        return [$enabled_overlays, $disabled_overlays];
    }

    private function render_overlays_table($title, $overlays, $enabled)
    {
        echo '<h2>' . esc_html($title) . '</h2>';
        if (empty($overlays)) {
            $message = $enabled
                ? __('No enabled overlays found. Please check your settings.', 'ad-block-guard')
                : null;
            if ($message) $this->render_warning_table(true, esc_html($message));
        } else {
            echo '<div class="overlay-table-wrapper">';
            echo '<table class="wp-list-table widefat fixed striped responsive-table table-width">';
            echo '<thead><tr>';
            echo '<th>' . esc_html__('Edit', 'ad-block-guard') . '</th>';
            echo '<th>' . esc_html__('Role', 'ad-block-guard') . '</th>';
            echo '<th>' . esc_html__('Enabled', 'ad-block-guard') . '</th>';
            echo '<th>' . esc_html__('Theme', 'ad-block-guard') . '</th>';
            echo '<th>' . esc_html__('Can Close', 'ad-block-guard') . '</th>';
            echo '<th>' . esc_html__('Delay', 'ad-block-guard') . '</th>';
            echo '<th>' . esc_html__('Launch', 'ad-block-guard') . '</th>';
            echo '</tr></thead><tbody>';

            foreach ($overlays as $overlay) {
                $this->render_overlay_row($overlay, $enabled);
            }

            echo '</tbody></table>';
            echo '</div>';
        }
    }

    private function render_overlay_row($overlay, $enabled)
    {
        $usergroup = ucfirst($overlay['usergroup']);
        $link = add_query_arg('tab', urlencode($usergroup), admin_url('admin.php?page=wuadblockguard_settings'));
        $overlay['theme'] = $overlay['theme'] ?? 'Compact';

        echo '<tr>';
        echo '<td><a href="' . esc_url($link) . '"><span class="dashicons dashicons-edit"></span></a></td>';
        echo '<td><a href="' . esc_url($link) . '">' . esc_html($usergroup) . '</a></td>';
        echo '<td><span class="license-status ' . esc_attr($enabled ? 'active' : 'nolicense') . '">'
             . esc_html($enabled ? __('Yes', 'ad-block-guard') : __('No', 'ad-block-guard'))
             . '</span></td>';
        echo '<td>' . esc_html($overlay['theme']) . '</td>';
        echo '<td>' . esc_html($overlay['allow_close'] ? __('Yes', 'ad-block-guard') : __('No', 'ad-block-guard')) . '</td>';
        echo '<td>' . esc_html($overlay['overlay_delay']) . 's</td>';
        echo '<td>';
        echo '<form method="post" class="adblock-demo-form">';
        wp_nonce_field('wuadblockguard_demo_action', 'wuadblockguard_demo_nonce');
        echo '<input type="hidden" name="AdBlockGuardDemo" value="1">';
        echo '<input type="hidden" name="role" value="' . esc_attr(strtolower($overlay['usergroup'])) . '">';
        // Add the data-allow-close attribute to the button
        echo '<button type="submit" class="button' . ($enabled ? ' button-primary' : '') 
             . '" data-allow-close="' . ($overlay['allow_close'] ? 'yes' : 'no') . '">'
             . esc_html__('Demo', 'ad-block-guard') . '</button>';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
    }

	/**
	 * Safely read only the last $maxLines lines from a file
	 * and return them as a single string.
	 */
	private static function get_last_lines( $file_path, $max_lines = 5000 ) {
	    if ( ! file_exists( $file_path ) ) {
	        return '';
	    }

	    // Read entire file into array, ignoring newlines
	    // (Simple approach — if your log is extremely large, you might need a more efficient method)
	    $lines = @file( $file_path, FILE_IGNORE_NEW_LINES );
	    if ( ! is_array( $lines ) ) {
	        return '';
	    }

	    // Slice the last $max_lines lines
	    $total = count( $lines );
	    if ( $total > $max_lines ) {
	        $lines = array_slice( $lines, -$max_lines );
	    }

	    // Re-join into one string
	    return implode( "\n", $lines );
	}
}
