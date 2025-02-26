<?php
namespace EEL\Inc;

defined('ABSPATH') || die('Hey, what are you doing here? You silly human!');

class EEL_Ajax {

    public function init() {
        add_action('wp_ajax_clean_debug_log', array($this, 'clean_debug_log_callback'));
        add_action('wp_ajax_reset_debug_constant', array($this, 'reset_debug_constant_callback'));
        add_action('wp_ajax_toggle_debug_mode', array($this, 'toggle_debug_mode_callback'));
        add_action('wp_ajax_get_debug_mode_status', array($this, 'get_debug_mode_status_callback'));
        add_action('wp_ajax_download_debug_log', array($this, 'download_debug_log_callback'));
        add_action('wp_ajax_get_error_count', array($this, 'get_error_count_callback'));
        add_action('wp_ajax_check_debug_constants_status', array($this, 'check_debug_constants_status_callback'));
        add_action('wp_ajax_toggle_widgets_mode', array($this, 'toggle_widgets_mode_callback'));
        add_action('wp_ajax_get_widgets_mode_status', array($this, 'get_widgets_mode_status_callback'));
        add_action( 'wp_ajax_display_error_log', array( $this, 'display_error_log_callback' ) );
		add_action( 'wp_ajax_nopriv_display_error_log', array( $this, 'display_error_log_callback' ) );
        
    }

    /**
     * AJAX callback function to display error log.
     */
    public function display_error_log_callback() {
        $debug_log_paths = array(
            WP_CONTENT_DIR . '/debug.log',
            ABSPATH . 'debug.log',
        );
    
        $debug_log_path = '';
        foreach ($debug_log_paths as $path) {
            if (file_exists($path)) {
                $debug_log_path = $path;
                break;
            }
        }
    
        if (file_exists($debug_log_path)) {
            $debug_log_entries = file($debug_log_path, FILE_IGNORE_NEW_LINES);
            if (empty($debug_log_entries)) {
                echo '<div>' . esc_html__('Debug log empty. No errors found.', 'easy-error-log') . '</div>';
            } else {
                // Create array to store unique errors
                $unique_errors = array();
                $current_entry = '';
                $current_timestamp = '';
                
                // Combine multi-line entries
                foreach ($debug_log_entries as $line) {
                    // Check if line starts with a timestamp
                    if (preg_match('/^\[(.*?)\](.+)$/', $line, $matches)) {
                        //save previous entry
                        if ($current_entry !== '') {
                            $content_key = trim($current_entry);
                            if (!isset($unique_errors[$content_key])) {
                                $unique_errors[$content_key] = array(
                                    'timestamp' => $current_timestamp,
                                    'full_message' => "[$current_timestamp] " . $current_entry
                                );
                            }
                        }
                        // Start new entry
                        $current_timestamp = $matches[1];
                        $current_entry = $matches[2];
                    } else {
                        // Continuation of the current entry
                        $current_entry .= "\n" . $line;
                    }
                }
                
                // Save the last entry
                if ($current_entry !== '') {
                    $content_key = trim($current_entry);
                    if (!isset($unique_errors[$content_key])) {
                        $unique_errors[$content_key] = array(
                            'timestamp' => $current_timestamp,
                            'full_message' => "[$current_timestamp] " . $current_entry
                        );
                    }
                }
    
                // Display the unique entries
                foreach ($unique_errors as $error) {
                    echo "<div class='debug-log-errors'>" . 
                        nl2br(esc_html($error['full_message'])) . 
                        "</div>";
                }
            }
        } else {
            echo '<div>' . esc_html__('Debug log file not found.', 'easy-error-log') . '</div>';
        }
        die();
    }


    /**
     * AJAX callback function to clean debug log.
     */
    public function clean_debug_log_callback() {
        $debug_log_paths = array(
            WP_CONTENT_DIR . '/debug.log',
            ABSPATH . 'debug.log',
        );

        $debug_log_path = '';
        foreach ( $debug_log_paths as $path ) {
            if ( file_exists($path) ) {
                $debug_log_path = $path;
                break;
            }
        }

        if ( file_exists( $debug_log_path ) ) {
            file_put_contents( $debug_log_path, '' );
            echo '<p>' . esc_html__( 'Debug log cleaned successfully.', 'easy-error-log' ) . '</p>';
        } else {
            echo '<p>' . esc_html__( 'Debug log file not found.', 'easy-error-log' ) . '</p>';
        }
        die();
    }


    /**
     * Reset debug constant callback.
     */
    public function reset_debug_constant_callback() {
        update_option('easy_error_log_debug_mode_enabled', ''); // Reset the option value
        echo esc_html__('Debug constant reset successfully.', 'easy-error-log'); // Return success message
        wp_die();
    }


    /**
     * Callback function for toggling debug mode.
     */
    public function toggle_debug_mode_callback() {
        $config_path = ABSPATH . 'wp-config.php';
        if ( file_exists( $config_path ) ) {
            $config_contents = file_get_contents( $config_path );

            // Check if WP_DEBUG is defined.
            if ( preg_match( '/define\s*\(\s*\'WP_DEBUG\'\s*,\s*([^\)]+)\);/s', $config_contents, $matches ) ) {
                // Toggle WP_DEBUG value.
                $new_debug_value = ( 'true' === $matches[1] ) ? 'false' : 'true';
                $config_contents = preg_replace( '/define\s*\(\s*\'WP_DEBUG\'\s*,\s*([^\)]+)\);/s', "define('WP_DEBUG', $new_debug_value);", $config_contents );

                // Toggle WP_DEBUG_LOG value.
                if ( 'false' === $new_debug_value ) {
                    $config_contents = preg_replace('/define\s*\(\s*\'WP_DEBUG_LOG\'\s*,\s*([^\)]+)\);/s', "define('WP_DEBUG_LOG', false);", $config_contents);
                } else {
                    $config_contents = preg_replace('/define\s*\(\s*\'WP_DEBUG_LOG\'\s*,\s*([^\)]+)\);/s', "define('WP_DEBUG_LOG', true);", $config_contents);
                }

                // Update wp-config.php with the new values.
                file_put_contents( $config_path, $config_contents );
                $debug_status = ( 'true' === $new_debug_value ) ? 'ON' : 'OFF';
                echo esc_html__( $debug_status, 'easy-error-log' );

            } else {
                echo esc_html__( 'WP_DEBUG constant not found', 'easy-error-log' );
            }
        } else {
            echo esc_html__( 'wp-config not found.', 'easy-error-log' );
        }
        die();
    }


    /**
     * AJAX callback function to get the current debug mode status.
     */
    public function get_debug_mode_status_callback() {
        $debug_mode_status = ( defined( 'WP_DEBUG' ) && WP_DEBUG ) ? 'ON' : 'OFF';
        echo esc_html($debug_mode_status);
        wp_die();
    }

    /**
     * AJAX callback function to download debug log.
     */
    public function download_debug_log_callback() {
        // $debug_log_path = WP_CONTENT_DIR . '/debug.log';.
        $debug_log_paths = array(
            WP_CONTENT_DIR . '/debug.log',
            ABSPATH . 'debug.log',
        );

        $debug_log_path = '';
        foreach ( $debug_log_paths as $path ) {
            if ( file_exists($path) ) {
                $debug_log_path = $path;
                break;
            }
        }

        if ( file_exists( $debug_log_path ) ) {
            // Return the URL to the debug log file.
            echo esc_url( content_url( '/debug.log' ) );
        } else {
            echo esc_html__( 'Debug log file not found.', 'easy-error-log' );
        }
        wp_die();
    }

    /**
     * Count erros.
     */
    public function get_error_count_callback() {

        $debug_log_paths = array(
            WP_CONTENT_DIR . '/debug.log',
            ABSPATH . 'debug.log',
        );

        $debug_log_path = '';
        foreach ( $debug_log_paths as $path ) {
            if ( file_exists($path) ) {
                $debug_log_path = $path;
                break;
            }
        }

        $error_count = 0;
        if ( file_exists($debug_log_path) ) {
            $debug_log_entries = file( $debug_log_path, FILE_IGNORE_NEW_LINES );
            $error_count = count($debug_log_entries);
        }

        echo esc_html($error_count);
        wp_die();
    }


    /**
     * Show status
     */
    public function check_debug_constants_status_callback() {
        $status = array(
            'WP_DEBUG' => defined('WP_DEBUG') ? WP_DEBUG : 'Not Found',
            'WP_DEBUG_LOG' => defined('WP_DEBUG_LOG') ? WP_DEBUG_LOG : 'Not Found',
        );
        wp_send_json_success($status);
        wp_die();
    }

    public function toggle_widgets_mode_callback(){
        // Check the current value of the option.
        $widgets_mode = get_option( 'fe_widgets_mode', 'false' ); 

        // Toggle the value.
        if ( 'true' === $widgets_mode ) {
            $widgets_mode = 'false';
        } else {
            $widgets_mode = 'true';
        }
    
        // Update the option with the new value.
        update_option( 'fe_widgets_mode', $widgets_mode );
    
        // Send the new mode back as the response.
        wp_send_json_success( array( 'widgets_mode' => $widgets_mode ) );
    }

    public function get_widgets_mode_status_callback() {
        // Get the current mode value.
        $widgets_mode = get_option( 'fe_widgets_mode', 'false' );
        wp_send_json_success( array( 'widgets_mode' => $widgets_mode ) );
    }






}