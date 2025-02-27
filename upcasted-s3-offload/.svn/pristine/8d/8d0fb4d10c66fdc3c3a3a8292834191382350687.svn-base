<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.upcasted.com
 * @since      1.0.0
 *
 * @package    Upcasted_S3_Offload
 * @subpackage Upcasted_S3_Offload/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Upcasted_S3_Offload
 * @subpackage Upcasted_S3_Offload/admin
 * @author     Upcasted <contact@upcasted.com>
 */
class Upcasted_S3_Offload_Admin
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $plugin_name The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;

    /** @var CloudCredentialsEncryption $encryption */
    private $encryption;

    /**
     * Initialize the class and set its properties.
     *
     * @param string $plugin_name The name of this plugin.
     * @param string $version The version of this plugin.
     *
     * @since    1.0.0
     */

    public function __construct(string $plugin_name, string $version)
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
        $this->encryption = CloudCredentialsEncryption::getInstance();
    }

    /**
     * Register submenu
     * @return void
     */
    public function register_sub_menu()
    {
        add_submenu_page(
            'upload.php',
            'S3 Offload Settings',
            'S3 Offload Settings',
            'manage_options',
            'upcasted-s3-offload-panel',
            array(&$this, 'submenu_page_callback')
        );
    }
 
    public function set_s3_provider() {
        // Verify the nonce for security
        if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'wp_rest' ) ) {
            wp_send_json_error( array( 'message' => __( 'Invalid nonce.', 'upcasted-s3-offload' ) ), 403 );
            return;
        }
    
        // Check user capabilities (optional but recommended for sensitive operations)
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_send_json_error( array( 'message' => __( 'Unauthorized action.', 'upcasted-s3-offload' ) ), 403 );
            return;
        }
    
        // Sanitize the input to prevent potential security issues
        $selected_s3_provider = isset( $_POST['selected_s3_provider'] )
            ? sanitize_text_field( wp_unslash( $_POST['selected_s3_provider'] ) )
            : null;
    
        // Update the option and handle errors
        if ( update_option( 'UPCASTED_SELECTED_S3_PROVIDER', $selected_s3_provider ) ) {
            wp_send_json_success( array( 'message' => __( 'S3 provider updated successfully.', 'upcasted-s3-offload' ) ) );
        } else {
            wp_send_json_error( array( 'message' => __( 'Failed to update S3 provider.', 'upcasted-s3-offload' ) ), 500 );
        }
    }

    /**
     * Render submenu
     * @return void
     */
    public function submenu_page_callback()
    {
        // check user capabilities
        if (!current_user_can('manage_options')) {
            return;
        }
        $options = get_option(UPCASTED_S3_OFFLOAD_SETTINGS);

        $access_key_id = !empty($options[UPCASTED_S3_OFFLOAD_ACCESS_KEY_ID])
            ? esc_attr($this->encryption->decrypt($options[UPCASTED_S3_OFFLOAD_ACCESS_KEY_ID]))
            : '';
        $secret_access_key = !empty($options[UPCASTED_S3_OFFLOAD_SECRET_ACCESS_KEY])
            ? esc_attr($this->encryption->decrypt($options[UPCASTED_S3_OFFLOAD_SECRET_ACCESS_KEY]))
            : '';
        $region = !empty($options[UPCASTED_OFFLOAD_REGION])
            ? esc_attr($options[UPCASTED_OFFLOAD_REGION])
            : '';
        $custom_endpoint = !empty($options[UPCASTED_CUSTOM_ENDPOINT])
            ? esc_attr($options[UPCASTED_CUSTOM_ENDPOINT])
            : '';
        $fileTypes = !empty($options[UPCASTED_S3_OFFLOAD_INCLUDED_FILETYPES])
            ? $options[UPCASTED_S3_OFFLOAD_INCLUDED_FILETYPES]
            : [];
        $bucket = !empty($options[UPCASTED_S3_OFFLOAD_BUCKET])
            ? esc_attr($options[UPCASTED_S3_OFFLOAD_BUCKET])
            : '';
        $protocol = !empty($options[UPCASTED_S3_OFFLOAD_PROTOCOL])
            ? esc_attr($options[UPCASTED_S3_OFFLOAD_PROTOCOL])
            : '';
        $custom_domain = !empty($options[UPCASTED_S3_OFFLOAD_CUSTOM_DOMAIN])
            ? esc_attr($options[UPCASTED_S3_OFFLOAD_CUSTOM_DOMAIN])
            : '';
        $custom_batch_size = esc_attr(get_option(UPCASTED_CUSTOM_BATCH_SIZE) ?? 5);
        $run_local_to_s3_cron = !empty($options['upcasted_move_from_local_to_cloud_using_cron__premium_only'])
            ? esc_attr($options['upcasted_move_from_local_to_cloud_using_cron__premium_only'])
            : '';
        $run_s3_to_local_cron = !empty($options['upcasted_move_from_cloud_to_local_using_cron__premium_only'])
            ? esc_attr($options['upcasted_move_from_cloud_to_local_using_cron__premium_only'])
            : '';
        $keepLocalFiles = !empty($options[UPCASTED_KEEP_LOCAL_FILES])
            ? esc_attr($options[UPCASTED_KEEP_LOCAL_FILES])
            : '';
        $keepS3Files = !empty($options[UPCASTED_KEEP_S3_FILES])
            ? esc_attr($options[UPCASTED_KEEP_S3_FILES])
            : '';

        $s3_provider = get_option(UPCASTED_SELECTED_S3_PROVIDER);
        $s3_provider = !empty($s3_provider)
            ? esc_attr($s3_provider)
            : '';
        if (empty($s3_provider) && !empty($access_key_id) && !empty($secret_access_key)) {
            if (empty($custom_endpoint)) {
                $s3_provider = 'aws-s3';
            } else {
                if (str_contains($custom_endpoint, 'digitaloceanspaces.com')) {
                    $s3_provider = 'digital-ocean';
                } else {
                    $s3_provider = 'other';
                }
            }
        }

        $availableRegions = [
            "aws-s3" => [
                "us-east-2" => "US East (Ohio)",
                "us-east-1" => "US East (N. Virginia)",
                "us-west-1" => "US West (N. California)",
                "us-west-2" => "US West (Oregon)",
                "af-south-1" => "Africa (Cape Town)",
                "ap-east-1" => "Asia Pacific (Hong Kong)",
                "ap-southeast-3" => "Asia Pacific (Jakarta)",
                "ap-south-1" => "Asia Pacific (Mumbai)",
                "ap-northeast-3" => "Asia Pacific (Osaka)",
                "ap-northeast-2" => "Asia Pacific (Seoul)",
                "ap-southeast-1" => "Asia Pacific (Singapore)",
                "ap-southeast-2" => "Asia Pacific (Sydney)",
                "ap-northeast-1" => "Asia Pacific (Tokyo)",
                "ca-central-1" => "Canada (Central)",
                "cn-north-1" => "China (Beijing)",
                "cn-northwest-1" => "China (Ningxia)",
                "eu-central-1" => "Europe (Frankfurt)",
                "eu-west-1" => "Europe (Ireland)",
                "eu-west-2" => "Europe (London)",
                "eu-south-1" => "Europe (Milan)",
                "eu-west-3" => "Europe (Paris)",
                "eu-north-1" => "Europe (Stockholm)",
                "sa-east-1" => "South America (São Paulo)",
                "me-south-1" => "Middle East (Bahrain)",
                "us-gov-east-1" => "AWS GovCloud (US-East)",
                "us-gov-west-1" => "AWS GovCloud (US-West)",
                "" => "Other (custom)",
            ],
            "digital-ocean" => [
                "NYC3" => "North America (NYC3)",
                "SFO3" => "South America (SFO3)",
                "SGP1" => "Asia (Singapore)",
                "AMS3" => "Europe (Amsterdam)",
                "FRA1" => "Europe (Frankfurt)",
                "" => "Other (custom)",
            ],
            "other" => [
                "" => "Other (custom)",
            ]
        ];
        // Include the view
        $view_file = plugin_dir_path(__FILE__) . '/views/settings-view.php'; // Adjust the path as necessary
        if (file_exists($view_file)) {
            include $view_file;
        } else {
            echo '<div class="error"><p>View file not found: ' . esc_html($view_file) . '</p></div>';
        }
    }

    /**
     * Register and add settings
     */
    public function settings_page_init()
    {
        register_setting(
            'general',
            UPCASTED_S3_OFFLOAD_SETTINGS
        );
    }

    /**
     * Adds new column "Storage" to media library list view 
     *
     * @since    3.0.2
     */
    public function add_cloudindicator_column( $columns )
    {
        $columns['cloudIndicator'] = __('File storage');
        return $columns;
    }

    /**
     * Populates "Storage" column in media library list view with either bucket name or "Local storage"
     *
     * @since    3.0.2
     */
    public function add_cloudindicator_value($columnName, $columnID){
        if($columnName == 'cloudIndicator'){
            $metadata = wp_get_attachment_metadata($columnID);
            echo isset($metadata['bucket']) ? "<b>Bucket:</b><br />" . $metadata['bucket'] : "Local server";
        }
    }

    /**
     * Add a custom property to attachment metadata to indicate cloud storage.
     *
     * @param array $response Attachment data for JavaScript.
     * @param WP_Post $attachment Attachment post object.
     * @param array $meta Attachment metadata.
     * @return array Modified attachment data.
     */
    public function add_cloud_metadata( $response, $attachment, $meta ) {
        $metadata = get_post_meta( $attachment->ID, '_wp_attachment_metadata', true );

        if ( isset( $metadata['bucket'] ) ) {
            $response['is_cloud'] = true;
        } else {
            $response['is_cloud'] = false;
        }

        return $response;
    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Upcasted_S3_Offload_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Upcasted_S3_Offload_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'assets/css/upcasted-offload-admin.css');
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {
        // Sanitize the settings array
        $settings = get_option(UPCASTED_S3_OFFLOAD_SETTINGS);

        if (is_array($settings)) {
            // Use array_map to sanitize each value
            $sanitized_settings = array_map(function($value) {
                return is_array($value) ? array_map('esc_attr', $value) : esc_attr($value);
            }, $settings);
        } else {
            $sanitized_settings = [];
        }
        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Upcasted_S3_Offload_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Upcasted_S3_Offload_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_register_script($this->plugin_name,
            plugin_dir_url(__FILE__) . 'assets/js/upcasted-offload-admin.js', array('jquery'));
        wp_localize_script($this->plugin_name, 'upcasted_offload_s3_params', array(
            'ajaxurl' => admin_url('admin-ajax.php'), // WordPress AJAX
            'nonce' => wp_create_nonce( 'wp_rest' ),
            'settings' => $sanitized_settings
        ));
        wp_enqueue_script($this->plugin_name);
    }

}
