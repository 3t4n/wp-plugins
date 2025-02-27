<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://www.upcasted.com
 * @since      1.0.0
 *
 * @package    Upcasted_S3_Offload
 * @subpackage Upcasted_S3_Offload/includes
 */

/**
 * Class Upcasted_Offload
 */
class Upcasted_Offload
{

    /**
     * The loader that's responsible for maintaining and registering all hooks that power
     * the plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      Upcasted_S3_Offload_Loader $loader Maintains and registers all hooks for the plugin.
     */
    protected $loader;

    /**
     * The unique identifier of this plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string $plugin_name The string used to uniquely identify this plugin.
     */
    protected $plugin_name;

    /**
     * The current version of the plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string $version The current version of the plugin.
     */
    protected $version;

    /**
     * Define the core functionality of the plugin.
     *
     * Set the plugin name and the plugin version that can be used throughout the plugin.
     * Load the dependencies, define the locale, and set the hooks for the admin area and
     * the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function __construct()
    {
        $this->version = defined('UPCASTED_S3_OFFLOAD_VERSION') ? UPCASTED_S3_OFFLOAD_VERSION : '1.0.0';
        $this->plugin_name = 'upcasted-s3-offload';
        $this->load_dependencies();
        $this->set_locale();
        $this->define_admin_hooks();
    }

    /**
     * Load the required dependencies for this plugin.
     *
     * Include the following files that make up the plugin:
     *
     * - Upcasted_S3_Offload_Loader. Orchestrates the hooks of the plugin.
     * - Upcasted_S3_Offload_i18n. Defines internationalization functionality.
     * - Upcasted_S3_Offload_Admin. Defines all hooks for the admin area.
     * - Upcasted_S3_Offload_Public. Defines all hooks for the public side of the site.
     *
     * Create an instance of the loader which will be used to register the hooks
     * with WordPress.
     *
     * @since    1.0.0
     * @access   private
     */
    private function load_dependencies()
    {
        $plugin_dir_path = plugin_dir_path(dirname(__FILE__));


        require_once $plugin_dir_path . 'admin/CloudApplication.php';

        require_once $plugin_dir_path . 'admin/interfaces/iCloudActions.php';

        require_once $plugin_dir_path . 'admin/interfaces/iCloudManipulator.php';

        require_once $plugin_dir_path . 'admin/services/CronManagement.php';

        require_once $plugin_dir_path . 'admin/services/CloudCredentialsEncryption.php';

        require_once $plugin_dir_path . 'admin/repositories/CloudRepository.php';

        require_once $plugin_dir_path . 'admin/providers/AmazonCloudManipulator.php';

        require_once $plugin_dir_path . 'admin/services/CloudActions.php';

        require_once $plugin_dir_path . 'admin/controllers/CloudToolsController.php';

        /**
         * The class responsible for orchestrating the actions and filters of the
         * core plugin.
         */
        require_once $plugin_dir_path . 'includes/class-upcasted-offload-loader.php';

        /**
         * The class responsible for defining internationalization functionality
         * of the plugin.
         */
        require_once $plugin_dir_path . 'includes/class-upcasted-offload-i18n.php';

        /**
         * The class responsible for seamlessly syncing Media Library with S3.
         */
        require_once $plugin_dir_path . 'admin/class-upcasted-offload-init.php';

        /**
         * The class responsible for defining all actions that occur in the admin area.
         */
        require_once $plugin_dir_path . 'admin/class-upcasted-offload-admin.php';

        $this->loader = new Upcasted_S3_Offload_Loader();
    }

    /**
     * Define the locale for this plugin for internationalization.
     *
     * Uses the Upcasted_S3_Offload_i18n class in order to set the domain and to register the hook
     * with WordPress.
     *
     * @since    1.0.0
     * @access   private
     */
    private function set_locale()
    {

        $plugin_i18n = new Upcasted_S3_Offload_i18n();

        $this->loader->add_action('plugins_loaded', $plugin_i18n, 'load_plugin_textdomain');

    }

    /**
     * Register all of the hooks related to the admin area functionality
     * of the plugin.
     *
     * @since    1.0.0
     * @access   private
     */
    private function define_admin_hooks()
    {
        try {
            $cloudToolsController = new CloudToolsController();
            $plugin_admin = new Upcasted_S3_Offload_Admin($this->get_plugin_name(), $this->get_version());
            $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
            $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');
            $this->loader->add_action('admin_menu', $plugin_admin, 'register_sub_menu');
            $this->loader->add_action('admin_init', $plugin_admin, 'settings_page_init');
            $this->loader->add_action('manage_media_columns', $plugin_admin, 'add_cloudindicator_column');
            $this->loader->add_action('manage_media_custom_column', $plugin_admin, 'add_cloudindicator_value', 10, 2);
            $this->loader->add_filter('wp_prepare_attachment_for_js', $plugin_admin, 'add_cloud_metadata', 10, 3);
            $this->loader->add_action('wp_ajax_set_s3_provider', $plugin_admin, 'set_s3_provider', 10, 2);
            $this->loader->add_action('wp_ajax_nopriv_set_s3_provider', $plugin_admin, 'set_s3_provider', 10, 2);
            $this->loader->add_action('wp_ajax_upcasted_offload_connect', $cloudToolsController, 'upcasted_offload_connect');
            $this->loader->add_action('wp_ajax_nopriv_upcasted_offload_connect', $cloudToolsController, 'upcasted_offload_connect');
            $this->loader->add_action('wp_ajax_upcasted_init', $cloudToolsController, 'upcasted_init');
            $this->loader->add_action('wp_ajax_nopriv_upcasted_init', $cloudToolsController, 'upcasted_init');
            $this->loader->add_action('wp_ajax_upcasted_create_bucket', $cloudToolsController, 'upcasted_create_bucket__premium_only');
            $this->loader->add_action('wp_ajax_nopriv_upcasted_create_bucket', $cloudToolsController, 'upcasted_create_bucket__premium_only');

            $this->loader->add_filter('pre_get_posts', $this, 'filter_media_by_s3', 10, 2);
            $this->loader->add_filter('restrict_manage_posts', $this, 'add_s3_storage_filter');
            
            $this->loader->add_action('admin_notices', $this, 'add_finished_cron_admin_notice');
            $this->loader->add_action('wp_ajax_dismiss_finished_cron_admin_notice', $this, 'dismiss_finished_cron_admin_notice');
            $this->loader->add_action('wp_ajax_nopriv_dismiss_finished_cron_admin_notice', $this, 'dismiss_finished_cron_admin_notice');

            (Upcasted_S3_Offload_Init::getInstance())->define_admin_hooks();
            
            uso_fs()->add_action('after_uninstall', array($this, 'remove_plugin'));
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }

    public function dismiss_finished_cron_admin_notice() {
        // Delete the transient
        delete_transient( 'upcasted_local_to_s3_finished' );
        delete_transient( 'upcasted_s3_to_local_finished' );

        // Return a success response
        wp_send_json_success( 'Transient deleted successfully' );
    }

    public function add_finished_cron_admin_notice() {
        // Check if the transient exists
        if ( get_transient( 'upcasted_local_to_s3_finished' ) ) {
            ?>
            <div class="upcasted-success-notice notice notice-success">
                <p><strong><span class="dashicons dashicons-saved"></span> Upcasted S3 Offload:</strong> The process of moving local files to S3 has finished successfully!</p>
                <button class="button button-primary" id="dismiss-upcasted-notice">Dismiss notice</button>
            </div>
            <?php
        }
        if ( get_transient( 'upcasted_s3_to_local_finished' ) ) {
            ?>
            <div class="upcasted-success-notice notice notice-success">
                <p><strong><span class="dashicons dashicons-saved"></span> Upcasted S3 Offload:</strong> The process of moving S3 files to local storage has finished successfully!</p>
                <button class="button button-primary" id="dismiss-upcasted-notice">Dismiss notice</button>
            </div>
            <?php
        }
    }

    function add_s3_storage_filter() {
        // Make sure we're on the Media Library page
        if (get_current_screen()->id !== 'upload') {
            return;
        }
    
        ?>
        <select name="s3_filter" id="s3_filter" class="postform">
            <option value=""><?php _e('All storage providers', 'upcasted-s3-offload'); ?></option>
            <option value="s3" <?php selected(isset($_GET['s3_filter']) && $_GET['s3_filter'] === 's3'); ?>><?php _e('S3 Storage', 'upcasted-s3-offload'); ?></option>
            <option value="local" <?php selected(isset($_GET['s3_filter']) && $_GET['s3_filter'] === 'local'); ?>><?php _e('Local Storage', 'upcasted-s3-offload'); ?></option>
        </select>
        <?php
    }

    // Modify the media query based on the S3 filter
    function filter_media_by_s3($query) {
        // Ensure we're in the admin area and on the Media Library page
        if (!is_admin() || $query->get('post_type') !== 'attachment') {
            return;
        }

        // Check if the 's3_filter' GET parameter is set
        if (isset($_GET['s3_filter']) && !empty($_GET['s3_filter'])) {
            $s3_filter = sanitize_text_field($_GET['s3_filter']);
            
            // Prepare meta_query to filter by the presence of 'bucket' in _wp_attachment_metadata
            $meta_query = $query->get('meta_query') ?: []; // Get any existing meta_query or initialize an empty array

            if ($s3_filter === 's3') {
                // Filter for files stored in S3 (those with `bucket` in metadata)
                $meta_query[] = [
                    'key'     => '_wp_attachment_metadata',
                    'value'   => 'bucket',
                    'compare' => 'LIKE',
                ];
            } elseif ($s3_filter === 'local') {
                // Filter for local files (those without `bucket` in metadata)
                $meta_query[] = [
                    'key'     => '_wp_attachment_metadata',
                    'value'   => 'bucket',
                    'compare' => 'NOT LIKE',
                ];
            }

            // Set the modified meta_query to the query
            $query->set('meta_query', $meta_query);
        }
    }
    
    public function remove_plugin()
    {
        //delete_post_meta_by_key('bucket');
        delete_option(UPCASTED_S3_OFFLOAD_SETTINGS);
        wp_unschedule_event(wp_next_scheduled('upcasted_move_unsynced_files_to_remote_job_hook'),
            'upcasted_move_unsynced_files_to_remote_job_hook');
        wp_unschedule_event(wp_next_scheduled('upcasted_move_from_cloud_to_local_using_cron'),
            'upcasted_move_files_to_local_job_hook');
    }

    /**
     * Run the loader to execute all of the hooks with WordPress.
     *
     * @since    1.0.0
     */
    public function run()
    {
        $this->loader->run();
    }

    /**
     * The name of the plugin used to uniquely identify it within the context of
     * WordPress and to define internationalization functionality.
     *
     * @return    string    The name of the plugin.
     * @since     1.0.0
     */
    public function get_plugin_name(): string
    {
        return $this->plugin_name;
    }

    /**
     * The reference to the class that orchestrates the hooks with the plugin.
     *
     * @return    Upcasted_S3_Offload_Loader    Orchestrates the hooks of the plugin.
     * @since     1.0.0
     */
    public function get_loader(): Upcasted_S3_Offload_Loader
    {
        return $this->loader;
    }

    /**
     * Retrieve the version number of the plugin.
     *
     * @return    string    The version number of the plugin.
     * @since     1.0.0
     */
    public function get_version(): string
    {
        return $this->version;
    }

}
