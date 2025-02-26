<?php

// Ensure this file is not accessed directly
if (!defined('ABSPATH')) {
    exit;
}

function alt_magic_render_help_page() {
    
    $current_debug_mode = 0;

    // Path to the error log file
    $log_file_path = ABSPATH . 'wp-content/altm_debug.log'; // Adjust the path as needed

    // Check if the log file exists and is readable
    if (file_exists($log_file_path) && is_readable($log_file_path)) {
        $logs = file_get_contents($log_file_path);
        
        // Filter logs to include only those starting with ""
        $filtered_logs = '';
        $log_lines = explode("\n", $logs);
        foreach ($log_lines as $line) {
            if (strpos($line, '') !== false) { // Check if the line contains ""
                $filtered_logs .= $line . "\n";
            }
        }
    } else {
        $filtered_logs = 'Error log file not found or not readable.';
    }

    // Add a download link for the log file
    $download_url = admin_url('admin-post.php?action=download_altm_log');

    ?>
    <div class="wrap">
        <h1>Alt Magic Help</h1>
        
        
        <div class="chat-support" style="width: 600px; border: 1px solid #ccc; padding: 10px; margin-top: 20px;">
            <h2 style="margin: 0px;">Contact Chat Support</h2>
            <p style="margin-top: 6px; margin-bottom: 24px; color: #666;">To contact chat support, visit your account on <a href="https://app.altmagic.pro" target="_blank">app.altmagic.pro</a> and open the chat support.</p>
            <img src="https://ik.imagekit.io/tqecp1s7u/alt-magic-assets/alt-magic-chat-support.gif" alt="Alt Magic Chat Support" style="max-width: 100%; height: auto;" />
        </div>
    </div>

    <div style="width: 600px; border: 1px solid #ccc; padding: 10px; margin-top: 20px; display: flex; flex-direction: column;">
        <h2 style="margin: 0px;">Alt Magic Debug Logs</h2>
        <p style="margin-top: 6px; margin-bottom: 14px; color: #666;">Download the logs if asked by chat support.</p>
        <a style="margin-bottom: 10px; width: max-content;" href="<?php echo esc_url($download_url); ?>" class="button">Download Logs</a>
        <form id="altm-debug-form" >
            <?php wp_nonce_field('altm_help_page_action', 'altm_help_page_nonce'); ?>
            <label for="altm_debug_mode">
                <input type="checkbox" name="altm_debug_mode" value="1" <?php checked($current_debug_mode, true); ?> />
                View Logs (not recommended for general use)
            </label>
        </form>
        <textarea id="altm-logs" readonly style="background-color: #212121; color: #cdcdcd; font-family: monospace; font-size: 11px; margin-top: 10px; width: 100%; height: 200px; display: <?php echo $current_debug_mode ? 'block' : 'none'; ?>;"><?php echo esc_textarea($filtered_logs); ?></textarea>
    </div>
    <script>
        document.querySelector('input[name="altm_debug_mode"]').addEventListener('change', function() {
            document.getElementById('altm-logs').style.display = this.checked ? 'block' : 'none';
        });
    </script>
    <?php
}

// Add a handler for the log download
add_action('admin_post_download_altm_log', 'altm_download_log_file');

function altm_download_log_file() {
    $log_file_path = ABSPATH . 'wp-content/altm_debug.log'; // Adjust the path as needed
    $log_file_name = date('Y-m-d_H-i-s') . '_altmagic_debug.log';

    if (file_exists($log_file_path) && is_readable($log_file_path)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $log_file_name . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($log_file_path));
        readfile($log_file_path);
        exit;
    } else {
        wp_die('Error log file not found or not readable.');
    }
}



