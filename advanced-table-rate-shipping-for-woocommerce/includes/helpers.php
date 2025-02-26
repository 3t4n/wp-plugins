<?php
/*
 * Helper functions for aco-table-rate-shipping
 */

function acoTableAdminErrorNotification()
{
    ob_start();
    ?>
    <div class="notice notice-error is-dismissible">
        <p>
            <?php
            echo sprintf(
                '<a target="_blank" href="%s">WooCommerce</a> are required for %s.',
                esc_url('https://wordpress.org/plugins/woocommerce/'),
                esc_html(ACOTRS_PLUGIN_NAME)
            );
            ?>
        </p>
    </div>
    <?php
    $aco_output = ob_get_clean();
    echo esc_html($aco_output);
}


// function acotrs_debug($data)
// {
//     $debugfile = fopen(plugin_dir_path(ACOTRS_FILE) . 'includes/debug_json.json', 'w') or die("can't open file");
//     fwrite($debugfile, json_encode($data));
//     fclose($debugfile);
// }

if ( ! function_exists( 'acotrs_debug' ) ) {
    function acotrs_debug( $data ) {
        global $wp_filesystem;

        // Load WP Filesystem if not already initialized
        if ( empty( $wp_filesystem ) ) {
            require_once ABSPATH . 'wp-admin/includes/file.php';
            WP_Filesystem();
        }

        // Ensure WP_Filesystem is available
        if ( ! $wp_filesystem ) {
            return false;
        }

        // Define the file path
        $file_path = plugin_dir_path( ACOTRS_FILE ) . 'includes/debug_json.json';

        // Convert data to JSON format
        $json_data = wp_json_encode( $data, JSON_PRETTY_PRINT );

        // Write data to the file
        return $wp_filesystem->put_contents( $file_path, $json_data, FS_CHMOD_FILE );
    }
}

// Example usage
$data = ['status' => 'success', 'message' => 'Debugging info saved'];

