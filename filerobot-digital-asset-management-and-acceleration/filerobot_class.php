<?php

class Filerobot
{
    private $token;
    private $sec_id;
    private $cname;
    private $container;
    private $cloud_storage_only;
    private $use_fmaw_only;
    private $sync_comments; //@Todo: Currently unused. Confirm and use it later
    private $endpoint;
    private $sync_metadata;
    private $metadata_fields;
    private $sync_post_id;
    private $sync_post_id_to_metadata;
    private $sync_multiple_metadata_to_db;
    private $name_the_metadata_list;
    private $change_value_wp_attached_file_to_cdn_link;
    private $sync_metadata_by_custom_meta_key;
    private $metadata_by_custom_meta_key;
    private $warning_notice_class = 'notice notice-warning';
    private $scan_criteria;
    private $version;

    public function __construct()
    {
        $this->token = get_option('filerobot_token');
        $this->sec_id = get_option('filerobot_sec_id');
        $this->cname = get_option('filerobot_cname');
        $this->container = get_option('filerobot_container');
        $this->cloud_storage_only = get_option('filerobot_cloud_storage_only');
        $this->use_fmaw_only = get_option('filerobot_use_fmaw_only');
        $this->sync_comments = get_option('filerobot_sync_comments');
        $this->sync_metadata = get_option('filerobot_sync_metadata');
        $this->sync_post_id = get_option('filerobot_sync_post_id');
        $this->sync_post_id_to_metadata = get_option('filerobot_sync_post_id_to_metadata');
        $this->endpoint = get_option('filerobot_endpoint');

        $this->sync_multiple_metadata_to_db = get_option('filerobot_sync_multiple_metadata_to_db');
        $this->metadata_fields = get_option('filerobot_metadata_fields');
        $this->name_the_metadata_list = get_option('filerobot_name_the_metadata_list');

        $this->change_value_wp_attached_file_to_cdn_link = get_option('filerobot_change_value_wp_attached_file_to_cdn_link');

        $this->sync_metadata_by_custom_meta_key = get_option('filerobot_sync_metadata_by_custom_meta_key');
        $this->metadata_by_custom_meta_key = get_option('filerobot_metadata_by_custom_meta_key');

        $this->version = '4.0.9';

        $this->scan_criteria = [
            'fields'         => 'ids',
            'post_type'      => 'attachment',
            'numberposts'    => -1,
            'orderby'        => 'date',
            'order'          => 'DESC',
            'post_status'    => null,
            'post_parent'    => null, // any parent
            //'post_mime_type' => 'image',
        ];
    }

    public function setup()
    {
        $this->register_actions();
        $this->register_filters();
//        $this->cron_setup();
    }
    private function register_actions()
    {
        add_action('admin_menu', array($this, 'register_menu'));
        add_action('admin_init', array($this, 'register_settings'));

        // Insert Stylesheets
        add_action('admin_enqueue_scripts', array($this, 'register_styles'));
        // Insert JavaScripts
        add_action('admin_enqueue_scripts', array($this, 'register_scripts'), 100);
        // - Insert fmaw.js for Elementor-affected admin-side post-editor pages (scripts can't be added to Elementor-affected pages the regular way)
        add_action('elementor/editor/after_enqueue_scripts', array($this, 'fmaw_for_elementor_scripts'));

        // Warning notices
        add_action('admin_notices', array($this, 'admin_notice_no_domain'));
        add_action('admin_notices', array($this, 'admin_notice_localhost'));

        // Sync action change filename in FMAW
        add_action('wp_ajax_filerobot_fmaw_action_change_filename', array($this, 'fmaw_action_change_filename'));

        // AJAX - The 3 buttons in the settings page
        // - Check Connection
        add_action('wp_ajax_filerobot_test_connection', array($this, 'test_connection_with_message'));
        // - Sync Status
        add_action('wp_ajax_filerobot_sync_status', array($this, 'get_sync_status'));
        // - Trigger Sync
        add_action('wp_ajax_filerobot_get_totals_to_sync', array($this, 'get_sync_totals'));
        add_action('wp_ajax_filerobot_sync_up', array($this, 'sync_up'));
        add_action('wp_ajax_filerobot_sync_down', array($this, 'sync_down'));

        // Other AJAXs from the front end
        // - Update the logs in the 3rd tab of Filerobot settings {domain}/wp-admin/admin.php?page=scaleflex-dam&tab=logs
        add_action('wp_ajax_filerobot_update_log', array($this, 'update_log'));
        // - Insert media (its Filerobot info) into WP CMS
        add_action('wp_ajax_filerobot_fmaw_insert_to_content', array($this, 'fmaw_insert_to_content'));

        add_action('wp_ajax_filerobot_widget_insert_attachment_to_db', array($this, 'filerobot_widget_insert_attachment_to_db'));

        add_action('wp_ajax_filerobot_load_fmaw_page', array($this, 'filerobot_load_fmaw_page'));

        // - Currently not used - Insert media into WP CMS
        //add_action('wp_ajax_filerobot_on_fmaw_upload', array($this, 'filerobot_on_fmaw_upload'));

        // Delete attachment off Filerobot when an image is deleted
        add_action('delete_attachment', array($this, 'filerobot_action_delete_attachment'), 10);

        // Cron
//        add_action('wp_filerobot_sync_files', array($this, 'filerobot_cron_sync'));

        // Adjust things on the admin post editor page to Filerobot
        add_action('edit_form_before_permalink', array($this, 'filerobot_action_correct_attachment_permalink'));
        add_action('edit_form_after_editor', array($this, 'filerobot_action_correct_attachment_postbox_url'));

        // Action needed when upgrade the plugin
        add_action( 'upgrader_process_complete', array($this, 'filerobot_action_need_when_upgrade'),10, 2);
    }

    private function register_filters()
    {
        // kicks in when a new attachments is uploaded into WP CMS.
        // It put a copy of that image into the Filerobot platform and then makes a log of it in the WP CMS DB tables.
        add_filter('wp_generate_attachment_metadata', array($this, 'filerobot_filter_generate_attachment_metadata'), 10);
        add_filter('wp_update_attachment_metadata', array($this, 'filerobot_filter_update_attachment_metadata'), 10, 2);

        // Giving attachments Filerobot URLs upon re-display
        add_filter('wp_get_attachment_image_src', array($this, 'filerobot_filter_image_read'), 10, 4);
        add_filter('wp_prepare_attachment_for_js', array($this, 'filerobot_filter_prepare_attachment_for_js'), 10, 3);


        // Converts an attachment's URL into Filerobot URL that attachment is added into the content of a Post.
        add_filter('image_send_to_editor', array($this, 'filerobot_filter_on_add_media_to_post_content'));

        // Giving attachments Filerobot URLs upon re-display inside a Post's content.
        add_filter('the_content', array($this, 'filerobot_filter_correct_content_attachments'));
        add_filter('the_editor_content', array($this, 'filerobot_filter_correct_content_attachments_admin'));


        // Converts an image's URL into Filerobot URL
        add_filter('wp_get_attachment_url', array($this, 'filerobot_filter_image_read_url'), 10, 4);

        // Converts an image's size-variant URLs into Filerobot URLs
        add_filter('wp_calculate_image_srcset', array($this, 'filerobot_filter_image_srcset'), 10);


        // For Gutenberg editor Featured Image
        add_filter('rest_prepare_attachment', array($this, 'filerobot_adjust_wp_json_media_response'));

        // Custom query-attachments - change posts_per_page
//        add_filter( 'ajax_query_attachments_args', array($this, 'filerobot_query_attachments_args'), 10, 1 );
    }

    public function filerobot_action_need_when_upgrade($upgrader_object, $options)
    {
        $current_plugin_path_name = plugin_basename( __FILE__ );
        if ($options['action'] == 'update' && $options['type'] == 'plugin' ) {
            foreach($options['plugins'] as $each_plugin) {
                if ($each_plugin == $current_plugin_path_name) {
                    if ($this->version == '4.0.9') {
                        error_log('Action needed for Scaleflex DAM v4.0.9');
                        wp_clear_scheduled_hook('wp_filerobot_sync_files');
                    }
                }
            }
        }
    }

    public function cron_setup()
    {
        if (!wp_next_scheduled('wp_filerobot_sync_files')) {
            wp_schedule_event(time(), 'hourly', 'wp_filerobot_sync_files');
        }
    }

    public function register_scripts()
    {
        wp_register_script('jquery_initialize_js', plugin_dir_url(__FILE__) . 'assets/scripts/jquery.initialize.js', ['jquery'], $this->version, true);

        $current_url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $explodeCurrentUrl = explode('?', $current_url);
        $urlPath = $explodeCurrentUrl[0];
        $explodeUrlPath = explode('/', $urlPath);
        $lastPathUrl = end($explodeUrlPath);
        if ($lastPathUrl == 'upload.php') {
            wp_register_script('image_editor', plugin_dir_url(__FILE__) . 'assets/scripts/image_editor.js', ['media-views', 'jquery_initialize_js']);
        }
        if (!strpos($current_url,"action=elementor")) {
            wp_enqueue_media();
        }

        wp_register_script('fmaw', 'https://cdn.scaleflex.com/plugins/filerobot-widget/v3/latest/filerobot-widget.min.js', ['jquery'], $this->version, true);
        wp_register_script('fmaw_media_tab', plugin_dir_url(__FILE__) . 'assets/scripts/fmaw.js', ['fmaw'], $this->version, true);

        wp_localize_script('image_editor', 'filerobot_image_editor_params', ['wp_admin_url' => admin_url(), 'title' => 'Scaleflex DAM Image Editor']);
        wp_enqueue_script('image_editor');

        $response = $this->test_connection($this->token, $this->sec_id);

        if (is_object($response) && $response->status == 'success') {
            $params = $this->construct_fmaw_params();
            wp_localize_script('fmaw_media_tab', 'filerobot_admin_meta', $params);
            wp_enqueue_script('fmaw_media_tab');

            $getInfoPost = $this->getInfoPost();
            wp_localize_script('fmaw_media_tab', 'filerobot_get_post_info', $getInfoPost);
            wp_enqueue_script('fmaw_media_tab');
        }

        wp_enqueue_script('filerobot-core-js', plugin_dir_url(__FILE__) . 'assets/scripts/core.js', ['jquery'], $this->version, true);
        $theme = wp_get_theme();
        if ( 'Enfold' == $theme->name || 'Enfold' == $theme->parent_theme ) {
            wp_enqueue_script('fmaw_enfold_theme', plugin_dir_url(__FILE__) . 'assets/scripts/filerobot-enfold-theme.js', ['jquery'], $this->version, true);
        }
    }

    public function fmaw_for_elementor_scripts()
    {
        if (!function_exists('is_plugin_active')) {
            include_once(ABSPATH . 'wp-admin/includes/plugin.php');
        }

        if (is_plugin_active('elementor/elementor.php')) {
            wp_enqueue_script('fmaw', 'https://scaleflex.cloudimg.io/v7/plugins/filerobot-widget/v3/latest/filerobot-widget.min.js?vh=4be6b8&func=proxy', array('jquery'), $this->version, true);
            $response = $this->test_connection($this->token, $this->sec_id);

            if (is_object($response) && $response->status == 'success') {
                $params = $this->construct_fmaw_params();
                $params['isElementor'] = 1;
                wp_register_script('fmaw_media_tab', plugin_dir_url(__FILE__) . 'assets/scripts/fmaw.js', array('fmaw'), $this->version, true);
                wp_localize_script('fmaw_media_tab', 'filerobot_admin_meta', $params);
                wp_enqueue_script('fmaw_media_tab');

                $getInfoPost = $this->getInfoPost();
                wp_localize_script('fmaw_media_tab', 'filerobot_get_post_info', $getInfoPost);
            }
        }
    }
    private function construct_fmaw_params()
    {
        $is_gutenberg_page = 0;
        if( function_exists( 'is_gutenberg_page' ) && is_gutenberg_page() ) {
            $is_gutenberg_page = 1;
        }

        $current_screen = get_current_screen();
        if ( method_exists( $current_screen, 'is_block_editor' ) && $current_screen->is_block_editor() ) {
            $is_gutenberg_page = 1;
        }

        $wp_additional_image_sizes = wp_get_additional_image_sizes();

        $sizes = array();
        $get_intermediate_image_sizes = get_intermediate_image_sizes();

        // Create the full array with sizes and crop info
        foreach ($get_intermediate_image_sizes as $_size) {
            if (in_array($_size, array('thumbnail', 'medium', 'large', 'medium_large', '1536x1536', '2048x2048'))) {
                $sizes[$_size]['width'] = get_option($_size . '_size_w');
                $sizes[$_size]['height'] = get_option($_size . '_size_h');
                $sizes[$_size]['crop'] = (bool)get_option($_size . '_crop');
            } elseif (isset($wp_additional_image_sizes[$_size])) {
                $sizes[$_size] = array(
                    'width' => $wp_additional_image_sizes[$_size]['width'],
                    'height' => $wp_additional_image_sizes[$_size]['height'],
                    'crop' => $wp_additional_image_sizes[$_size]['crop']
                );
            }
        }

        $is_elementor_edit_page = 0;
        if (!function_exists('is_plugin_active')) {
            include_once(ABSPATH . 'wp-admin/includes/plugin.php');
        }
        if (is_plugin_active('elementor/elementor.php') && \Elementor\Plugin::$instance->editor->is_edit_mode()) {
            $is_elementor_edit_page = 1;
            foreach (['thumbnail', 'medium', 'large', 'medium_large', '1536x1536', '2048x2048'] as $it) {
                $sizes[$it]['width'] = get_option($it . '_size_w');
                $sizes[$it]['height'] = get_option($it . '_size_h');
                $sizes[$it]['crop'] = (bool)get_option($it . '_crop');
            }
        }

        $params = [
            'token'      => $this->token,
            'sec_tmp'    => $this->sec_id,
            'use_fmaw_only'    => $this->use_fmaw_only,
            'directory'  => '/' . trim($this->container, ' /'),
            'title'      => 'Scaleflex DAM Widget',
            'name'       => 'Scaleflex DAM',
            'fmaw_only'  => (int)$this->use_fmaw_only,
            'plugin_dir' => plugin_dir_url(__FILE__),
            'insert_btn' => 'Insert from DAM into page',
            'replace_btn'=> 'Replace via DAM',
            'insert_product_img_btn' => 'Insert Product Image',
            'insert_product_gallery_btn' => 'Insert to Product Gallery',
            'is_gutenberg_page' => $is_gutenberg_page,
            'is_elementor_edit_page' => $is_elementor_edit_page,
            'sizes' => $sizes
        ];

        return $params;
    }

    private function getInfoPost()
    {
        $post_id = get_the_ID();
        if ($post_id > 0 || $post_id != '') {
            $attachment_id = get_post_thumbnail_id( $post_id );
            $mapping  = $this->get_remote_mapping(['post_id' => $attachment_id]);
            $thumbnail = '';
            if (count($mapping) > 0) {
                $thumbnail = $mapping[0]->guid;
            }

            return [
                'post_ID'      => $post_id,
                'thumbnail'    => $thumbnail
            ];
        } else {
            return [];
        }
    }

    public function register_styles()
    {
        wp_enqueue_style('filerobot-core-css', plugin_dir_url(__FILE__) . 'assets/styles/core.css');
        wp_enqueue_style('filerobot-flexboxgrid', plugin_dir_url(__FILE__) . 'assets/styles/flexboxgrid.min.css');

        wp_enqueue_style('acf-fmaw', plugin_dir_url(__FILE__) . 'assets/styles/acf-fmaw.css');

        // https://deluxeblogtips.com/how-to-detect-gutenberg-via-javascript-and-php/
        if (get_current_screen()->is_block_editor()) {
            wp_enqueue_style('gutenberg-fmaw', plugin_dir_url(__FILE__) . 'assets/styles/gutenberg-fmaw.css');

            if ($this->use_fmaw_only == 1) {
                wp_enqueue_style('gutenberg-fmaw-only', plugin_dir_url(__FILE__) . 'assets/styles/gutenberg-fmaw-only.css');
            }
        }
    }

    public function register_settings()
    {
        register_setting('filerobot_settings', 'filerobot_token');
        register_setting('filerobot_settings', 'filerobot_sec_id');
        register_setting('filerobot_settings', 'filerobot_cname');
        register_setting('filerobot_settings', 'filerobot_endpoint');
        register_setting('filerobot_settings', 'filerobot_container');
        register_setting('filerobot_settings', 'filerobot_cloud_storage_only');
        register_setting('filerobot_settings', 'filerobot_use_fmaw_only');
        register_setting('filerobot_settings', 'filerobot_sync_metadata');
        register_setting('filerobot_settings', 'filerobot_sync_comments');
        register_setting('filerobot_settings', 'filerobot_sync_post_id');
        register_setting('filerobot_settings', 'filerobot_sync_post_id_to_metadata');

        register_setting('filerobot_settings', 'filerobot_sync_multiple_metadata_to_db');
        register_setting('filerobot_settings', 'filerobot_metadata_fields');
        register_setting('filerobot_settings', 'filerobot_name_the_metadata_list');

        register_setting('filerobot_settings', 'filerobot_change_value_wp_attached_file_to_cdn_link');
        register_setting('filerobot_settings', 'filerobot_sync_metadata_by_custom_meta_key');
        register_setting('filerobot_settings', 'filerobot_metadata_by_custom_meta_key');
    }

    public function register_menu()
    {
        add_menu_page(
            'Welcome to the Scaleflex DAM WordPress Plugin',
            'Scaleflex Settings',
            'manage_options',
            'scaleflex-dam',
            array($this, 'register_main_page'),
            'https://assets.scaleflex.com/Marketing/Logos/Filerobot+Logos/Logo+Icon/icon.png?vh=23f160&trim=0&w=17&h=17&gray=1&func=cropfit'
        );

        $response = $this->test_connection($this->token, $this->sec_id);

        if (is_object($response) && $response->status == 'success') {
            if ($this->use_fmaw_only == 1) {
                add_menu_page(
                    'Scaleflex DAM Widget',
                    'DAM Library',
                    'manage_options',
                    'scaleflex-dam-widget',
                    array($this, 'register_fmaw_page'),
                    'https://assets.scaleflex.com/Marketing/Logos/Filerobot+Logos/Logo+Icon/icon.png?vh=23f160&trim=0&w=17&h=17&gray=1&func=cropfit',
                    11
                );
                remove_menu_page('upload.php');
            } else {
                add_media_page(
                    'Scaleflex DAM Widget',
                    'DAM Library',
                    'manage_options',
                    'scaleflex-dam-widget',
                    array($this, 'register_fmaw_page'),
                    1
                );
            }
        }

        add_submenu_page(
            'scaleflex-dam',
            'General Settings',
            'Welcome',
            'manage_options',
            'scaleflex-dam',
            array($this, 'register_main_page')
        );
        add_submenu_page(
            'scaleflex-dam',
            'General Settings',
            'General Settings',
            'manage_options',
            'scaleflex-dam&tab=settings',
            array($this, 'register_settings_page')
        );
        add_submenu_page(
            'scaleflex-dam',
            'Scaleflex DAM Logs',
            'Scaleflex DAM Logs',
            'manage_options',
            'scaleflex-dam&tab=logs',
            array($this, 'register_logs_page')
        );
        add_submenu_page(
            'scaleflex-dam',
            'Support',
            'Support',
            'manage_options',
            'scaleflex-dam&tab=support',
            array($this, 'register_support_page')
        );

//        add_submenu_page(
//            null,
//            'Edit Image',
//            'Edit Image',
//            'manage_options',
//            'scaleflex-dam-image-edit',
//            [$this, 'filerobot_image_edit_page']
//        );
    }

    public function register_main_page()
    {
        include_once('filerobot_main_admin_page.php');
    }

    public function register_fmaw_page()
    {
        $directory = '/' . trim($this->container, ' /');
        $token     = $this->token;
        $sec_tmp   = $this->sec_id;

        include_once('filerobot_fmaw_page.php');
    }

    public function register_settings_page()
    {
        include_once('filerobot_settings_page.php');
    }

    public function register_logs_page()
    {
        include_once('filerobot_log_page.php');
    }

    public function register_support_page()
    {
        include_once('filerobot_support_page.php');
    }

    public function filerobot_image_edit_page()
    {
        if(!(basename($_SERVER['PHP_SELF']) === "admin.php" && $_GET['page'] === "filerobot-image-edit" && current_user_can('manage_options'))) {
            return;
        }

        $post_id = isset($_REQUEST['id']) ? intval($_REQUEST['id']) : '';

        if(empty($post_id)) {
            return;
        }

        global $wpdb;
        $mapping  = $this->get_remote_mapping(['post_id' => $post_id]);
        $base_url = wp_upload_dir()['baseurl'];
        $base_dir = str_replace('\\', '/', wp_upload_dir()['basedir']);
        $attachment_url = $this->get_file_url(get_attached_file($post_id));

        if (!empty($mapping)) {
            $api         = new Filerobot_API($this->token, $this->sec_id, $this->container, $this->endpoint);
            $exist_check = $api->check_existence($mapping[0]->uuid);

            if ($exist_check)
            {
                $attachment_url = $mapping[0]->guid;
            }

            $size_path = str_replace($base_url, $base_dir, $attachment_url);

            if (!$exist_check && !is_readable($size_path)) {
                // The size variation isn't locally stored
                $attachment_url = $this->get_file_url(get_attached_file($post_id));
            }
        } else {
            $size_path = str_replace($base_url, $base_dir, $attachment_url);

            if (!is_readable($size_path)) {
                // The size variation isn't locally stored
                $attachment_url = $this->get_file_url(get_attached_file($post_id));
            }
        }

        $attachment_url = str_replace('\\', '/', $attachment_url);

        $container  = trim($this->container, ' /');
        $api        = new Filerobot_API($this->token, $this->sec_id, $this->container, $this->endpoint);
        $sass       = $api->get_sass($this->sec_id);
        $upload_url = 'https://api.filerobot.com/'.$this->token.'/v4/files?folder=/'.$container;

        require_once(dirname(__FILE__) . "/filerobot_image_edit_page.php");
        exit;
    }

    public static function setup_db()
    {
        global $wpdb;

        $table_name      = $wpdb->prefix . 'filerobot_remote_mapping';
        $charset_collate = $wpdb->get_charset_collate();

        if( $wpdb->get_var( "show tables like '$table_name'" ) != $table_name ) {
            $sql = "CREATE TABLE `$table_name` (";
            $sql .= " `id` bigint(20) NOT NULL auto_increment, ";
            $sql .= " `post_id` bigint(20) NOT NULL, ";
            $sql .= " `remote_name` varchar(500) NOT NULL, ";
            $sql .= " `local_name` varchar(500) NOT NULL, ";
            $sql .= " `uuid` varchar(500) NOT NULL, ";
            $sql .= " `sha` varchar(500) NOT NULL DEFAULT '', ";
            $sql .= " `container` varchar(500) NOT NULL, ";
            $sql .= " `status` varchar(500) NOT NULL, ";
            $sql .= " `in_progress` varchar(500) NOT NULL DEFAULT '0', ";
            $sql .= " `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, ";
            $sql .= " `updated` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, ";
            $sql .= " PRIMARY KEY `remote_mapping_id` (`id`), ";
            $sql .= " INDEX (`post_id`), ";
            $sql .= " INDEX (`status`), ";
            $sql .= " INDEX (`remote_name`), ";
            $sql .= " INDEX (`uuid`), ";
            $sql .= " INDEX (`in_progress`) ";
            $sql .= ") $charset_collate;";
        }

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta($sql);
    }

    public static function deactivate()
    {
        // Clear options DB table
        delete_option('filerobot_token');
        delete_option('filerobot_sec_id');
        delete_option('filerobot_cname');
        delete_option('filerobot_endpoint');
        delete_option('filerobot_container');
        delete_option('filerobot_cloud_storage_only');
        delete_option('filerobot_use_fmaw_only');
        delete_option('filerobot_sync_metadata');
        delete_option('filerobot_sync_comments');
        delete_option('filerobot_sync_post_id');
        delete_option('filerobot_sync_post_id_to_metadata');
        delete_option('filerobot_sync_multiple_metadata_to_db');
        delete_option('filerobot_metadata_fields');
        delete_option('filerobot_name_the_metadata_list');
        delete_option('filerobot_change_value_wp_attached_file_to_cdn_link');
        delete_option('filerobot_sync_metadata_by_custom_meta_key');
        delete_option('filerobot_metadata_by_custom_meta_key');
        wp_clear_scheduled_hook('wp_filerobot_sync_files');

        global $wpdb;
        $wpdb->query('drop table if exists ' . $wpdb->prefix . 'filerobot_remote_mapping');

        $wp_cms_base_url = wp_upload_dir()['baseurl'];
        $ids_to_clear    = $wpdb->get_col("SELECT id FROM {$wpdb->prefix}posts WHERE guid NOT LIKE '{$wp_cms_base_url}%' AND post_type = 'attachment'");

        foreach ($ids_to_clear as $id) {
            wp_delete_post($id);
        }
    }

    // public static function uninstall()
    // {
    // }

    private function is_development_mode()
    {
        $site_url         = site_url();
        $development_mode = (false === strpos($site_url, '.')) || (stripos($site_url, 'local') !== false);

        return $development_mode;
    }

    public function admin_notice_no_domain()
    {
        if (empty($this->token) || empty($this->sec_id)) {
            printf(
                '<div class="%1$s"><p>Scaleflex DAM is almost ready. To get started, please fill your token : <a href="%2$s">here</a></p></div>',
                $this->warning_notice_class,
                admin_url('admin.php?page=scaleflex-dam&tab=settings')
            );
        }
    }
    public function admin_notice_localhost()
    {
        if ($this->is_development_mode()) {
            printf(
                '<div class="%1$s"><p>Scaleflex DAM cannot sync because your are running on localhost. Scaleflex DAM needs accessible URL to work</p></div>',
                $this->warning_notice_class
            );
        }
    }

    private function on_metadata_change($metadata, $attachment_id)
    {
        if (is_null($attachment_id) || empty($metadata) || (isset($metadata['ignore_update']) && $metadata['ignore_update'] === true) ) {
            return $metadata;
        }

        $rel_path          = wp_attachment_is_image($attachment_id) ? $metadata['file'] : get_post_meta($attachment_id, '_wp_attached_file', true);
        list($name, $path) = $this->get_path_and_filename($rel_path);
        $base_path         = wp_upload_dir()['basedir'] . DIRECTORY_SEPARATOR . $path;
        $main_file         = get_attached_file($attachment_id);
        $metadata['id']    = $attachment_id;
        $post              = get_post($attachment_id);
        $additional_meta   = ['title' => ['en' => $post->post_title], 'description' => ['en' => $post->post_excerpt]];
        $metadata          = array_merge($metadata, $additional_meta);

        if (
            !wp_attachment_is_image($attachment_id)
            || ( wp_attachment_is_image($attachment_id) && empty($metadata['sizes']) ) // Don't upload size variants
        ) {
            $response = $this->upload($main_file, $name, $metadata);

            if ($response !== false) {
                $this->insert_map(
                    $attachment_id,
                    is_null($response->file) ? '' : $response->file->name,
                    is_null($response->file) ? '' : (array_key_exists('original_image', $metadata) ? $metadata['original_image'] : $name),
                    is_null($response->file) ? '' : $response->file->uuid,
                    is_null($response->file) ? '' : $response->file->hash->sha1,
                    is_null($response->file) ? '' : $response->file->folder->name,
                    $response->status
                );
            }
        }

        if (wp_attachment_is_image($attachment_id)) {
            $this->delete_file($main_file);
            if (isset($metadata['sizes'])) {
                // Other sizes
                foreach ($metadata['sizes'] as $key => $size) {
                    $size_file = $base_path . DIRECTORY_SEPARATOR . $size['file'];
                    $this->delete_file($size_file);
                }
            }
        }

        return $metadata;
    }

    public function filerobot_filter_update_attachment_metadata($metadata, $attachment_id)
    {//@Todo: called twice when uploading into WP's Media Lib
        return $this->on_metadata_change($metadata, $attachment_id);
    }

    public function filerobot_filter_generate_attachment_metadata($metadata, $attachment_id = null, $context = '')
    {
        return $this->on_metadata_change($metadata, $attachment_id);
    }

    public function filerobot_action_delete_attachment($postID, $post = null)
    {
        if (is_null($post)) {
            return get_post($postID);
        }

        global $wpdb;
        $to_delete = $wpdb->get_col("SELECT uuid FROM {$wpdb->prefix}filerobot_remote_mapping WHERE {$wpdb->prefix}filerobot_remote_mapping.post_id = {$postID}");

        foreach ($to_delete as $uuid) {
            $api      = new Filerobot_API($this->token, $this->sec_id, $this->container, $this->endpoint);
            $response = $api->delete($uuid);

            if ($response !== false && $response->status === 'success') {
                $wpdb->delete($wpdb->prefix . 'filerobot_remote_mapping', ['post_id' => $postID]);
            }
        }

        return $post;
    }

    public function filerobot_filter_image_read($src, $attachment_id, $size, $icon)
    { // On redisplay
//        error_log('filerobot_filter_image_read');
        if ($src === false) {
            return $src;
        }

        $record = $this->get_remote_mapping(['post_id' => $attachment_id]);
        if (count($record)) {
            $metadata = wp_get_attachment_metadata($attachment_id);
            $func     = 'fit';
            if (is_array($size)) {
                $width  = $size[0];
                $height = $size[1];
                $func = '';
            } else if (is_string($size) && isset($metadata['sizes']) && is_array($metadata['sizes'])) {
                $width  = (array_key_exists($size, $metadata['sizes']) && $metadata['sizes'][$size]['width'] > 0) ? $metadata['sizes'][$size]['width']  : '';
                $height = (array_key_exists($size, $metadata['sizes']) && $metadata['sizes'][$size]['height'] > 0) ? $metadata['sizes'][$size]['height'] : '';
                $func = (array_key_exists($size, $metadata['sizes']) && isset($metadata['sizes'][$size]['func'])) ? $metadata['sizes'][$size]['func']  : '';
            } else {
                $width  = '';
                $height = '';
            }

            if (!function_exists('is_plugin_active')) {
                include_once(ABSPATH . 'wp-admin/includes/plugin.php');
            }
            if (is_plugin_active('elementor/elementor.php') && \Elementor\Plugin::$instance->editor->is_edit_mode()) {
                $src[0] = $src[0] . "?w={$width}&h={$height}&func={$func}";
            } else {
                $filename = (isset($metadata['file'])) ? $metadata['file'] : '';
                if ($filename == '') {
                    $filename = basename(get_attached_file($attachment_id));
                }
                $explodeFilename = explode('/', $filename);
                $filename = end($explodeFilename);
                if (($width != '' || $height != '')) {
                    if (is_array($width) || is_array($height)) {
                        $src[0] = $record[0]->guid;
                    } else {
                        $src[0] = $record[0]->guid . "?w={$width}&h={$height}&func={$func}";
                    }
                } else {
                    $src[0] = $record[0]->guid;
                }
            }
        }

        return $src;
    }

    public function filerobot_filter_image_read_url($attachment_url)
    {
//        error_log('filerobot_filter_image_read_url');
        if (!function_exists('is_plugin_active')) {
            include_once(ABSPATH . 'wp-admin/includes/plugin.php');
        }

        if (is_plugin_active('elementor/elementor.php') && \Elementor\Plugin::$instance->editor->is_edit_mode()) {
            $attachmentURLToArray = explode('/', $attachment_url);
            $record     = $this->get_remote_mapping(['local_name' => end($attachmentURLToArray)]);
            return $record[0]->guid;
        } else {
            $theme = wp_get_theme();
            if ( 'Enfold' == $theme->name || 'Enfold' == $theme->parent_theme ) {
                $attachmentURLToArray = explode('/', $attachment_url);
                $record     = $this->get_remote_mapping(['local_name' => end($attachmentURLToArray)]);
                if (!empty($record)) {
                    return $record[0]->guid;
                }
            }

            return $attachment_url;
        }
    }

    public function filerobot_filter_prepare_attachment_for_js($response, $attachment, $meta)
    { // On redisplay
//        error_log('filerobot_filter_prepare_attachment_for_js');
        if (!isset($response["sizes"])) {
            $response["sizes"] = [];
        }
        $record     = $this->get_remote_mapping(['post_id' => $response['id']]);

        $check_exist = true;
        $image_content = $this->checkRemoteFile($response["url"]);
        if (!$image_content) {
            $check_exist = false;
            $nonImageParam = '';
            $response['url'] = $record[0]->guid . $nonImageParam;
        }

        if ($response['type'] == 'image' && array_key_exists('sizes', $response)) {
            $base_url  = wp_upload_dir()['baseurl'];
            $base_dir  = str_replace('\\', '/', wp_upload_dir()['basedir']);

            $tempSizes = [];
            foreach ($response['sizes'] as $key => $size) {
                if (strpos($size['url'], '.filerobot.com') === false) {
                    if (!$check_exist) {
                        $width = (isset($size['width'])) ? $size['width'] : '';
                        $height = (isset($size['height'])) ? $size['height'] : '';
                        $versionRandom = rand(0, 10000);
                        if ($width != '' || $height != '') {
                            if (is_array($width) || is_array($height)) {
                                $size['url'] = $record[0]->guid . "?vh={$versionRandom}";
                            } else {
                                $size['url'] = $record[0]->guid . "?w={$width}&h={$height}&vh={$versionRandom}";
                            }
                        } else {
                            $size['url'] = $record[0]->guid . "?vh={$versionRandom}";
                        }
                    } else {
                        $size_path = str_replace($base_url, $base_dir, $size['url']);

                        if (!is_readable($size_path)) {
                            // The size variation isn't locally stored
                            $size['url'] = $this->get_file_url(get_attached_file($response['id']));
                        }
                    }
                    $tempSizes[$key] = [
                        'url' => $size['url']
                    ];
                }
            }
            $response['sizes'] = $tempSizes;
        }
        return $response;
    }

    function checkRemoteFile($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        // don't download content
        curl_setopt($ch, CURLOPT_NOBODY, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);
        curl_close($ch);
        if ($result !== FALSE) {
            return true;
        } else {
            return false;
        }
    }

    public function filerobot_filter_correct_content_attachments($content)
    { // On redisplay - Attachments in post content
        return $this->remotize_links_in_content($content);
    }

    public function filerobot_filter_correct_content_attachments_admin($content)
    { // On redisplay - Attachments in post content in admin side editor
        return $this->remotize_links_in_content($content);
    }

    public function filerobot_filter_on_add_media_to_post_content($html)
    {
        return $this->remotize_links_in_content($html);
    }

    private function remotize_links_in_content($content)
    {
        $pattern = '/src="[^"]+"|href="[^"]+"/';
        if (preg_match_all($pattern, $content, $matches)) {
            foreach ($matches[0] as $match) {
                $orig_url = trim(str_replace('src=', '', $match)," \"");

                if (strpos($orig_url, wp_upload_dir()['baseurl']) === false) {
                    continue;
                }

                $rel_path = str_replace(wp_upload_dir()['baseurl'], '', $orig_url);
                list($name, $path) = $this->get_path_and_filename($rel_path);
                list($name, $size) = $this->get_original_image_name($name);
                $record = $this->get_remote_mapping(['local_name' => $name]);

                if ($record && $record[0]->status === 'success') {
                    $remote_url = $record[0]->guid;
                    $content    = str_replace($orig_url, $remote_url, $content);
                }
            }
        }
        return $content;
    }

    public function filerobot_adjust_wp_json_media_response($response, $post = null, $request = null)
    { // For Gutenberg editor Featured Image
        if (array_key_exists('media_details', $response->data) && !empty($response->data['media_details']['sizes'])) {
            // This filter function is for Gutenberg Featured Image only. When sizes isnt empty, that normally means that it isnt featured image
            return $response;
        }

        if (array_key_exists('id', $response->data) && array_key_exists('guid', $response->data) && array_key_exists('source_url', $response->data)) {
            $response->data['source_url'] = $response->data['guid']['rendered'] . '&height=150';
            $response->data['media_details']['width'] = 150;
            $response->data['media_details']['height'] = 150;
            $response->data['media_details']['thumbnail'] = [
                //'file' => ''
                'width' => 150,
                'height' => 150
                //'mime_type' => 'image/whatever not important here'
                //'source_url' => ''
            ];
        }

        return $response;
    }

    private function get_remote_mapping($where)
    {
        global $wpdb;

        $flattened = $where;
        array_walk($flattened, function(&$value, $key) {
            $value = is_string($value) ? "$key = '{$value}'" :"$key = {$value}";
        });
        $where = implode(' AND ' . $wpdb->prefix . 'filerobot_remote_mapping.', $flattened);

        $mapping = $wpdb->get_results("SELECT {$wpdb->prefix}filerobot_remote_mapping.*, {$wpdb->prefix}posts.ID, {$wpdb->prefix}posts.guid FROM {$wpdb->prefix}filerobot_remote_mapping JOIN {$wpdb->prefix}posts ON {$wpdb->prefix}posts.ID = {$wpdb->prefix}filerobot_remote_mapping.post_id WHERE {$where}", OBJECT);

        return $mapping;
    }

    public function filerobot_filter_image_srcset($sources, $size_array = [], $image_src = '', $image_meta = [], $attachment_id = null)
    {
        return $sources = '';
    }

    private function get_original_image_name($name)
    {
        if (preg_match("/(\w+)-(\w+)x(\w+).(\w+)/i", $name)) {
            $ext  = substr($name, strrpos($name, '.'));
            $name = str_replace($ext, '', $name);
            $name = trim($name, " /");
            $size = substr($name, strrpos($name, '-'));
            $name = str_replace($size, '', $name) . $ext;
            $size = trim($size, " /-");
            $size = explode("x", $size);
        } else {
            $size = [];
        }

        return [$name, $size];
    }

    private function upload($path, $new_name, $meta)
    {
        try {
            if (is_readable($path) && !empty($new_name)) {
                $file_url = $this->get_file_url($path);
                $api      = new Filerobot_API($this->token, $this->sec_id, $this->container, $this->endpoint);
                return $api->upload_file($file_url, $new_name, $meta);
            } else {
                return false;
            }
        } catch (Exception $e) {
            error_log($e);
            return false;
        }
    }

    private function delete_file($path)
    {
        if ($this->cloud_storage_only == 1 && file_exists($path)) {
            unlink($path);
        }
    }

    private function insert_map($post_id, $remote_name, $local_name, $uuid, $sha, $container, $status)
    {
        global $wpdb;
        $wpdb->insert($wpdb->prefix . 'filerobot_remote_mapping', [
            'post_id'     => $post_id,
            'remote_name' => $remote_name,
            'local_name'  => $local_name,
            'uuid'        => $uuid,
            'sha'         => $sha,
            'container'   => $container,
            'status'      => $status,
        ]);
    }

    private function get_path_and_filename($rel_path)
    {
        $parts = explode('/', $rel_path);
        $name  = $parts[count($parts)-1];
        array_pop($parts);
        $path = implode(DIRECTORY_SEPARATOR, $parts);

        return [$name, $path];
    }

    private function check_upload($current = '0')
    {
        global $wpdb;
        $attachments = get_posts($this->scan_criteria);
        $not_synced  = $wpdb->get_col(
            "SELECT post_id FROM {$wpdb->prefix}filerobot_remote_mapping 
            WHERE {$wpdb->prefix}filerobot_remote_mapping.status = 'success' 
            AND ({$wpdb->prefix}filerobot_remote_mapping.in_progress = '0' 
            OR {$wpdb->prefix}filerobot_remote_mapping.in_progress = {$current})"
        );
        $not_synced  = empty($not_synced) ? [] : array_map('intval', $not_synced);
        $to_upload   = array_diff($attachments, $not_synced);

        return $to_upload;
    }

    private function check_download()
    {
        $api         = new Filerobot_API($this->token, $this->sec_id, $this->container, $this->endpoint);
        $response    = $api->view_list();
        $to_download = 0;
        global $wpdb;

        foreach ($response->files as $file) {
            $new = (int) $wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->prefix}filerobot_remote_mapping WHERE remote_name = '{$file->name}'");

            if (!$new) {
                $to_download++;
            }

            $update = (int) $wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->prefix}filerobot_remote_mapping WHERE remote_name = '{$file->name}' AND uuid <> '{$file->uuid}'");

            if ($update) {
                $to_download++;
            }
        }

        return $to_download;
    }
    public function get_sync_totals()
    {
        if (empty($this->token) || empty($this->sec_id) || empty($this->container)) {
            echo json_encode(['up' => 0, 'down' => 0, 'unready' => true]);
            exit();
        }

        echo json_encode(
            [
                'up'   => count($this->check_upload()),
                'down' => $this->check_download(),
            ]
        );
        exit();
    }
    public function get_sync_status()
    {
        if (empty($this->token) || empty($this->sec_id) || empty($this->container)) {
            $this->show_message('Please fill and save Token, Security Template Identifier and Directory before synchronization', true);
            exit();
        }

        $to_upload   = $this->check_upload();
        $to_download = $this->check_download();

        $this->show_message(
            sprintf(
                'There are %1$s files to sync to Scaleflex DAM. There are %2$s files to sync from Scaleflex DAM. In case there are many local files, the upload TO Scaleflex DAM can take a while.',
                count($to_upload),
                $to_download
            )
        );

        exit();
    }
    public function sync_up($from_cron = false)
    {
        error_log('sync_up');
        global $wpdb;
        $batch     = 5;
        $done      = 0;
        $succeeded = 0;
        $timestamp = $from_cron ? time() : $_POST['timestamp'];
        $to_upload = $this->check_upload($timestamp);

        foreach ($to_upload as $id) {
            if (wp_attachment_is_image($id)) {
                $wp_get_attachment_metadata = wp_get_attachment_metadata($id);
                if (isset($wp_get_attachment_metadata['file'])) {
                    $rel_path = $wp_get_attachment_metadata['file'];
                } else {
                    $rel_path = get_post_meta($id, '_wp_attached_file', true);
                }
            } else {
                $rel_path = get_post_meta($id, '_wp_attached_file', true);
            }
            list($name, $path) = $this->get_path_and_filename($rel_path);
            $base_path         = wp_upload_dir()['basedir'] . DIRECTORY_SEPARATOR . $path;
            $main_file         = get_attached_file($id);
            $meta              = wp_attachment_is_image($id) ? wp_get_attachment_metadata($id) : [];
            $meta['id']        = $id;
            $post              = get_post($id);
            $additional_meta   = ['title' => ['en' => $post->post_title], 'description' => ['en' => $post->post_excerpt]];
            $meta              = array_merge($meta, $additional_meta);
            $response          = $this->upload($main_file, $name, $meta);
            if ($response !== false) {
                $prev_err = (int) $wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->prefix}filerobot_remote_mapping WHERE post_id = {$id} AND status = 'error'");

                if ($prev_err) {
                    $wpdb->update(
                        $wpdb->prefix . 'filerobot_remote_mapping',
                        [
                            'remote_name' => is_null($response->file) ? '' : $response->file->name,
                            'local_name'  => is_null($response->file) ? '' : ((!empty($meta) && array_key_exists('original_image', $meta)) ? $meta['original_image'] : $name),
                            'uuid'        => is_null($response->file) ? '' : $response->file->uuid,
                            'sha'         => is_null($response->file) ? '' : $response->file->hash->sha1,
                            'container'   => is_null($response->file) ? '' : $response->file->folder->name,
                            'status'      => $response->status
                        ],
                        ['post_id' => $id]
                    );
                } else {
                    $this->insert_map(
                        $id,
                        is_null($response->file) ? '' : (isset($response->file) && !empty($response->file->name) ? $response->file->name : $name),
                        is_null($response->file) ? '' : ((!empty($meta) && array_key_exists('original_image', $meta)) ? $meta['original_image'] : $name),
                        is_null($response->file) ? '' : $response->file->uuid,
                        is_null($response->file) ? '' : $response->file->hash->sha1,
                        is_null($response->file) ? '' : $response->file->folder->name,
                        $response->status
                    );
                }

                $wpdb->update($wpdb->prefix . 'filerobot_remote_mapping', ['in_progress' => $timestamp], ['post_id' => $id]);
            }

            if (wp_attachment_is_image($id) && isset($meta['sizes'])) {
                // Other sizes
                foreach ($meta['sizes'] as $key => $size) {
                    $size_file = $base_path . DIRECTORY_SEPARATOR . $size['file'];
                    $this->delete_file($size_file);
                }
            }

            $done++;

            if ($response !== false && isset($response->status) && $response->status === 'success') {
                $succeeded++;
            }

            if ($done === $batch && $done !== count($to_upload) && !$from_cron) {
                break;
            }

            if ($done === count($to_upload)) {
                $wpdb->update($wpdb->prefix . 'filerobot_remote_mapping', ['in_progress' => '0'], ['in_progress' => $timestamp]);
                break;
            }
        }

        if (!$from_cron) {
            echo json_encode(['done' => $done, 'succeeded' => $succeeded]);
            exit();
        }
    }

    public function sync_down($from_cron = false)
    {
//        error_log('sync_down');
        global $wpdb;
        $api       = new Filerobot_API($this->token, $this->sec_id, $this->container, $this->endpoint);
        $response  = $api->view_list();
        $batch     = 5;
        $done      = 0;
        $succeeded = 0;
        // $timestamp = $from_cron ? time() : $_POST['timestamp']; // Currently no need for timestamp here

        foreach ($response->files as $file) {
            $new = (int) $wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->prefix}filerobot_remote_mapping WHERE remote_name = '{$file->name}'");
            $file = json_decode(json_encode($file),true);
            if (!$new) {
                if (isset($response['file']['url']['download'])) {
                    $fr_link = $response['file']['url']['download'];
                } else {
                    $fr_link = $response['file']['url']['cdn'];
                }

                $base_url = strtok($fr_link, '?');
                $parsed = parse_url($fr_link);
                $query = $parsed['query'];
                parse_str($query, $params);
                unset($params['vh']);
                unset($params['func']);
                $fr_link = $base_url;
                if (count($params)) {
                    $k = 0;
                    foreach($params as $key => $param) {
                        if ($k == 0) {
                            $fr_link = $base_url . '?' . $key . '=' . $param;
                        } else {
                            $fr_link .= '&' . $key . '=' . $param;
                        }
                        $k++;
                    }
                }

                // If this $file->name isn't in WP-CMS yet
                $post_data = [
                    'name'    => $file['name'],
                    'type'    => $file['type'],
                    'url'     => $fr_link,
                    'info'    => $file['info'],
                    'size'    => $file['size'],
                    'title'   => isset($file['meta']['title']['en']) ? $file['meta']['title']['en'] : '',
                    'content' => $this->get_comments($file['uuid']),
                    'excerpt' => isset($file['meta']['description']['en']) ? $file['meta']['description']['en'] : '',
                ];

                if (!empty($file['tags'])) {
                    $tags = array_map(function($obj) { return $obj['label']; }, $file['tags']['en']);
                    $tags = implode(". ", $tags);
                } else {
                    $tags = '';
                }

                $postmeta_data = [
                    'alt' => $tags,
                    'meta' => [],
                    'generate_default_meta' => true,
                ];

                if ($this->sync_metadata) {
                    $postmeta_data['meta'] = $file['meta'];
                }

                $fr_map_data = [
                    'uuid'   => $file['uuid'],
                    'sha'    => $file['hash']['sha1'],
                    'dir'    => $file['folder']['name'],
                    'status' => 'success',
                    'file'   => $file
                ];

                $this->filerobot_insert_attachment_to_wp($post_data, $postmeta_data, $fr_map_data);

                $done++;
                $succeeded++;
            }

//            $unique_name = wp_unique_filename(wp_upload_dir()['path'], $post_data['name']);

            $update = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}filerobot_remote_mapping WHERE remote_name = '{$file->name}' AND uuid <> '{$file->uuid}'" , OBJECT);

            $unique_name = $file->name;
            if (count($update) > 0) {
                // UUID (version) needs updating
                $post_info = [
                    'ID'             => $update[0]->post_id,
                    'guid'           => $file->url->cdn,
                    'post_title'     => isset($file->meta->title) ? $file->meta->title->en : $unique_name,
                    'post_name'      => $unique_name,
                    'post_content'   => '',// Filerobot Comments
                    'post_excerpt'   => isset($file->meta->description) ? $file->meta->description->en : '',
                ];

                $attach_id = wp_update_post($post_info);

                // Post Meta
                if (is_int($attach_id) && $attach_id > 0) {
                    require_once ABSPATH . 'wp-admin/includes/image.php';
                    $wp_meta               = get_post_meta($attach_id);
                    $wp_meta               = is_array($wp_meta) ? $wp_meta : [];
                    $filerobot_meta        = json_decode(json_encode($file->meta), true);
                    unset($filerobot_meta['id']);
                    $meta                  = array_merge($wp_meta, $filerobot_meta);
                    $meta['ignore_update'] = true;
                    wp_update_attachment_metadata($attach_id, $meta);
                }

                if ($this->sync_metadata) {
                    if (is_int($attach_id) && $attach_id > 0 && !empty( (array) $file->tags )) {

                        $tags = isset($file->meta->description) ? $file->meta->description->en : '';
                        if ($tags == '') {
                            if (!empty((array)$file->tags)) {
                                $tags = array_map(function($obj) { return $obj->label; }, $file->tags->en);
                                $tags = implode(". ", $tags);
                            }
                        }

                        update_post_meta($attach_id, '_wp_attachment_image_alt', $tags);
                    }
                }

                $wpdb->update($wpdb->prefix . 'filerobot_remote_mapping', ['uuid' => $file->uuid, 'sha' => $file->hash->sha1], ['remote_name' => $file->name]);

                $done++;
                $succeeded++;
            }

            if ($done === $batch && !$from_cron) {
                break;
            }
        }

        if (!$from_cron) {
            echo json_encode(['done' => $done, 'succeeded' => $succeeded]);
            exit();
        }
    }

    public function filerobot_cron_sync()
    {
        $this->sync_up(true);
        $this->sync_down(true);
    }

    public function update_log()
    {
        $status      = $_POST['status'];
        $remote_name = $_POST['remote_name'];
        $uuid        = $_POST['uuid'];
        $sha         = $_POST['sha'];
        $container   = $_POST['container'];
        $post_id     = $_POST['post_id'];

        global $wpdb;

        $exists = (int) $wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->prefix}filerobot_remote_mapping WHERE post_id = {$post_id}");

        if ($exists) {
            $wpdb->update(
                $wpdb->prefix . 'filerobot_remote_mapping',
                [
                    'remote_name' => $remote_name,
                    'uuid'        => $uuid,
                    'sha'         => $sha
                ],
                ['post_id' => $post_id]
            );
        } else {
            $meta = wp_get_attachment_metadata($post_id);
            list($name, $path) = $this->get_path_and_filename($meta['file']);

            $wpdb->insert($wpdb->prefix . 'filerobot_remote_mapping', [
                'post_id'     => $post_id,
                'remote_name' => $remote_name,
                'local_name'  => array_key_exists('original_image', $meta) ? $meta['original_image'] : $name,
                'uuid'        => $uuid,
                'sha'         => $sha,
                'container'   => $container,
                'status'      => $status,
            ]);
        }
    }

    public function filerobot_widget_insert_attachment_to_db()
    {
        $response = $_POST['fr_data'];
        $uuid = $response['file']['uuid'];
        if (isset($response['file']['url']['download'])) {
            $fr_link = $response['file']['url']['download'];
        } else {
            $fr_link = $response['file']['url']['cdn'];
        }

        $base_url = strtok($fr_link, '?');
        $parsed = parse_url($fr_link);
        $query = $parsed['query'];
        parse_str($query, $params);
        unset($params['vh']);
        unset($params['func']);
        $fr_params = '';
        $fr_link = $base_url;
        if (count($params)) {
            $k = 0;
            foreach($params as $key => $param) {
                if ($k == 0) {
                    $fr_params .= $key . '=' . $param;
                    $fr_link = $base_url . '?' . $key . '=' . $param;
                } else {
                    $fr_link .= '&' . $key . '=' . $param;
                    $fr_params .= '&' . $key . '=' . $param;
                }
                $k++;
            }
        }
        $fr_filename = ($fr_params != '') ? $response['file']['name'] . '?' . $fr_params : $response['file']['name'];

        $record = $this->get_remote_mapping(['uuid' => $uuid, 'remote_name' => $fr_filename]);

        $tags = isset($response['file']['meta']['description']) ? $response['file']['meta']['description']['en'] : '';

        if ($tags == '') {
            if (!empty($response['file']['tags'])) {
                $tags = array_map(
                    function($obj) {
                        return $obj->label;
                    },
                    $response['file']['tags']['en']
                );
                $tags = implode(". ", $tags);
            }
        }

        $mediaType = explode('/', $response['file']['type']);

        if (empty($record)) { // Check if remote mappings exists
            $url = $fr_link;

            $post_data = [
                'name'    => $fr_filename,
                'type'    => $response['file']['type'],
                'url'     => $url,
                'title'   => isset($response['file']['meta']['title']) ? $response['file']['meta']['title']['en'] : '',
                'content' => '', // Filerobot Comments
                'excerpt' => isset($response['file']['meta']['description']) ? $response['file']['meta']['description']['en'] : '',
                'info'    => $response['file']['info'],
                'size'    => $response['file']['size']
            ];

            $postmeta_data = [
                'alt' => $tags,
                'meta' => [],
                'generate_default_meta' => true,
            ];

            if ($this->sync_metadata) {
                $postmeta_data['meta'] = ($response['file']['meta']) ? $response['file']['meta'] : [];
            }

            $fr_map_data = [
                'uuid'   => $response['file']['uuid'],
                'sha'    => $response['file']['hash']['sha1'],
                'dir'    => $response['file']['folder']['name'],
                'status' => 'success',
                'file'   => $response['file']
            ];

            $map       = $this->filerobot_insert_attachment_to_wp($post_data, $postmeta_data, $fr_map_data);
            $record    = [];
            $record[0] = $map;

        } else {
            $url = $record[0]->guid;
        }

        $id   = intval($record[0]->post_id);
        $post = get_post($id);
        if ('attachment' !== $post->post_type) {
            wp_send_json_error();
        }

        $metadata = wp_get_attachment_metadata($id);
        echo json_encode(
            [
                "url" => $url,
                "attachment_id" => $id,
                "success" => true,
                "name" => $response['file']['name'],
                "metadata" => $metadata,
                "type" => $response['file']['type'],
                "media_type" => [
                    "type" => $mediaType[0],
                    "ext" => $mediaType[1]
                ]
            ]
        );
        exit();
    }

    /**
     *
     * https://wordpress.stackexchange.com/questions/9838/add-new-insert-into-post-button-with-another-function
     * Imitates: https://developer.wordpress.org/reference/functions/wp_ajax_send_attachment_to_editor/
     *
     */
    public function fmaw_insert_to_content()
    {
        $insert_into_post_id = intval($_POST['post_id']);
        $response = $_POST['fr_data'];
        $uuid = $response['file']['uuid'];
        if (isset($response['file']['url']['download'])) {
            $fr_link = $response['file']['url']['download'];
        } else {
            $fr_link = $response['file']['url']['cdn'];
        }

        $base_url = strtok($fr_link, '?');
        $parsed = parse_url($fr_link);
        $query = $parsed['query'];
        parse_str($query, $params);
        unset($params['vh']);
        unset($params['func']);
        $fr_params = '';
        $fr_link = $base_url;
        if (count($params)) {
            $k = 0;
            foreach($params as $key => $param) {
                if ($k == 0) {
                    $fr_params .= $key . '=' . $param;
                    $fr_link = $base_url . '?' . $key . '=' . $param;
                } else {
                    $fr_link .= '&' . $key . '=' . $param;
                    $fr_params .= '&' . $key . '=' . $param;
                }
                $k++;
            }
        }
        $fr_filename = ($fr_params != '') ? $response['file']['name'] . '?' . $fr_params : $response['file']['name'];

        $record = $this->get_remote_mapping(['uuid' => $uuid, 'remote_name' => $fr_filename]);
        $filesystem = new Filerobot_API($this->token, $this->sec_id, $this->container, $this->endpoint);
//        $response   = $filesystem->get_file($uuid);

        $tags = isset($response['file']['meta']['description']) ? $response['file']['meta']['description']['en'] : '';

        if ($tags == '') {
            if (!empty($response['file']['tags'])) {
                $tags = array_map(
                    function($obj) {
                        return $obj->label;
                    },
                    $response['file']['tags']['en']
                );
                $tags = implode(". ", $tags);
            }
        }

        $mediaType = explode('/', $response['file']['type']);

        if (empty($record)) { // Check if remote mappings exists
            $url = $fr_link;

            $post_data = [
                'name'    => $fr_filename,
                'type'    => $response['file']['type'],
                'url'     => $url,
                'title'   => isset($response['file']['meta']['title']) ? $response['file']['meta']['title']['en'] : '',
                'content' => '', // Filerobot Comments
                'excerpt' => isset($response['file']['meta']['description']) ? $response['file']['meta']['description']['en'] : '',
                'info'    => $response['file']['info'],
                'size'    => $response['file']['size']
            ];

            $postmeta_data = [
                'alt' => $tags,
                'meta' => [],
                'generate_default_meta' => true,
            ];

            if ($this->sync_metadata) {
                $postmeta_data['meta'] = ($response['file']['meta']) ? $response['file']['meta'] : [];
            }

            $fr_map_data = [
                'uuid'   => $response['file']['uuid'],
                'sha'    => $response['file']['hash']['sha1'],
                'dir'    => $response['file']['folder']['name'],
                'status' => 'success',
                'file'   => $response['file']
            ];

            $map       = $this->filerobot_insert_attachment_to_wp($post_data, $postmeta_data, $fr_map_data);
            $record    = [];
            $record[0] = $map;

        } else {
            $url = $record[0]->guid;
        }

        // check if function sync_post_id is turn on/off
        if ($this->sync_post_id) {
            $filesystem->update_metadata_file($uuid, $insert_into_post_id);
        }

        $id   = intval($record[0]->post_id);
        $post = get_post($id);
        if ('attachment' !== $post->post_type) {
            wp_send_json_error();
        }

        if (current_user_can('edit_post', $id)) {
            // If this attachment is unattached, attach it. Primarily a back compat thing.
            if (0 == $post->post_parent && $insert_into_post_id) {
                wp_update_post([
                    'ID'          => $id,
                    'post_parent' => $insert_into_post_id,
                ]);
            }
        }

        remove_filter('media_send_to_editor', 'image_media_send_to_editor');

        $returnHtml = isset($_POST['return_html']) ? boolval($_POST['return_html']) : true;
        if ($returnHtml) {
            if ('image' === substr( $post->post_mime_type, 0, 5 )) {
                $caption = ''; // Not excerpt here (like how WP would normally do)
                $title   = isset($response['file']['meta']['title']) ? $response['file']['meta']['title']['en'] : '';
                $align   = '';
                $rel     = false;
                $size    = '';

                if ($tags != '') {
                    $alt = $tags;
                } else {
                    $alt = '';
                }

                if ($fr_params != '' || $response['file']['type'] == 'image/webp') {
                    $html    = '<img src="' . $url . '" alt="" width="' . $response['file']['info']['img_w'] . '" height="' . $response['file']['info']['img_h'] . '" class="align size- wp-image-' . $id . '"/>';
                } else {
                    $html    = get_image_send_to_editor($id, $caption, $title, $align, null, $rel, $size, $alt);
                }
            } elseif (wp_attachment_is('video', $post)) {
                $html = '[video width=\"' . $response['file']['info']['img_w'] . '\" height=\"' . $response['file']['info']['img_h'] . '\" mp4=\"' . $url . '\"][/video]';
            } elseif (wp_attachment_is('audio', $post)) {
                $html = '[audio mp3=\"' . $url . '\"][/audio]';
            } else {
                $filename = isset($response['file']['meta']['title']) ? $response['file']['meta']['title']['en'] : $response['file']['name'];
                $html = '<a href="' . $url . '">' . $filename . '</a>';
            }
            $html       = apply_filters('media_send_to_editor', $html, $id, ["id" => $id]);

            wp_send_json_success($html);
        } else {
            $metadata = wp_get_attachment_metadata($id);
            echo json_encode(
                [
                    "url" => $url,
                    "attachment_id" => $id,
                    "success" => true,
                    "name" => $response['file']['name'],
                    "metadata" => $metadata,
                    "type" => $response['file']['type'],
                    "media_type" => [
                        "type" => $mediaType[0],
                        "ext" => $mediaType[1]
                    ]
                ]
            );
            exit();
        }
    }

    public function filerobot_on_fmaw_upload()
    {
        $post_data = [
            'name'    => $_POST['name'],
            'type'    => $_POST['type'],
            'url'     => $_POST['cdn'],
        ];

        if (isset($_POST['tags'])) {
            $tags = json_decode(str_replace('\"', '"', $_POST['tags']));
            $tags = array_map(function($obj) { return $obj->label; }, $tags->en);
            $tags = implode(". ", $tags);
        } else {
            $tags = '';
        }

        $postmeta_data = [
            'alt' => $tags,
            'meta' => [],
            'generate_default_meta' => true,
        ];

        if ($this->sync_metadata) {
            $postmeta_data['meta'] = json_decode(str_replace('\"', '"', $_POST['meta']), true);
        }

        $fr_map_data = [
            'uuid'   => $_POST['uuid'],
            'sha'    => $_POST['sha'],
            'dir'    => $_POST['dir'],
            'status' => $_POST['status'],
            'file'   => []
        ];

        $this->filerobot_insert_attachment_to_wp($post_data, $postmeta_data, $fr_map_data);
    }

    /**
     *
     * https://gist.github.com/m1r0/f22d5237ee93bcccb0d9
     *
     */
    private function filerobot_insert_attachment_to_wp($post_data, $postmeta_data, $fr_map_data)
    {
        // Post
        $unique_name = $post_data['name'];

        $post_info = [
            'guid'           => $post_data['url'],
            'post_mime_type' => $post_data['type'],
            'post_title'     => (isset($post_data['title']) && $post_data['title'] != '') ? $post_data['title'] : $unique_name,
            'post_name'      => $unique_name,
            'post_content'   => isset($post_data['content']) ? $post_data['content'] : '',
            'post_excerpt'   => isset($post_data['excerpt']) ? $post_data['excerpt'] : '',
            'post_status'    => 'inherit',
        ];

        $attach_id = wp_insert_attachment($post_info, $unique_name);

        // Post Meta
        if (isset($postmeta_data['generate_default_meta']) && $postmeta_data['generate_default_meta'] === true) {
            require_once ABSPATH . 'wp-admin/includes/image.php';
            $attach_data           = wp_generate_attachment_metadata($attach_id, $post_data['url']);
            if ($this->sync_metadata) {
                $meta = array_merge($attach_data, $postmeta_data['meta']);
            }
            $meta['ignore_update'] = true;

            $mediaType = explode('/', $post_data['type']);
            if ($mediaType[0] == 'image') {
                $meta['width'] = $post_data['info']['img_w'];
                $meta['height'] = $post_data['info']['img_h'];
                $meta['ratio'] = round($post_data['info']['img_w'] / $post_data['info']['img_h'] , 2);
                $meta['file'] = $unique_name;
                $meta['filesize'] = $post_data['size']['bytes'];
                // Add default metadata size
                $wp_additional_image_sizes = wp_get_additional_image_sizes();
                $get_intermediate_image_sizes = get_intermediate_image_sizes();
                // Create the full array with sizes and crop info
                foreach ($get_intermediate_image_sizes as $_size) {
                    if (in_array($_size, array('thumbnail', 'medium', 'large', 'medium_large'))) {
                        $meta['sizes'][$_size]['file'] = $unique_name;
                        $meta['sizes'][$_size]['width'] = get_option($_size . '_size_w');
                        $meta['sizes'][$_size]['height'] = get_option($_size . '_size_h');
                        $meta['sizes'][$_size]['func'] = 'fit';
                        $meta['sizes'][$_size]['mime-type'] = $post_data['type'];
                    } elseif (isset($wp_additional_image_sizes[$_size])) {
                        $meta['sizes'][$_size] = array(
                            'file' => $unique_name,
                            'width' => $wp_additional_image_sizes[$_size]['width'],
                            'height' => $wp_additional_image_sizes[$_size]['height'],
                            'func' => 'fit',
                            'mime-type' => $post_data['type']
                        );
                    }
                }

                if ($this->sync_multiple_metadata_to_db) {
                    $metadata_fields = json_decode($this->metadata_fields, true);
                    $mt = [];
                    foreach ($metadata_fields as $value) {
                        $mt[$value] = $fr_map_data['file']['meta'][$value];
                    }
                    $meta[$this->name_the_metadata_list] = $mt;
                }
            } elseif ($mediaType[0] == 'video') {
                $meta['filesize'] = $post_data['size']['bytes'];
                $meta['mime_type'] = $post_data['type'];
                $meta['width'] = $post_data['info']['video_w'];
                $meta['height'] = $post_data['info']['video_h'];
                $meta['fileformat'] = $post_data['info']['ext'];
                $meta['dataformat'] = 'quicktime';
            }
            wp_update_attachment_metadata($attach_id, $meta);

            if ((int)$this->change_value_wp_attached_file_to_cdn_link) {
                update_attached_file($attach_id, $post_data['url']);
            }

            if ((int)$this->sync_metadata_by_custom_meta_key) {
                $metadata_by_custom_meta_key = ($this->metadata_by_custom_meta_key != '') ? json_decode($this->metadata_by_custom_meta_key, true) : [];
                if (count($metadata_by_custom_meta_key)) {
                    for ($i = 0; $i < count($metadata_by_custom_meta_key); $i++) {
                        $metadata_field = $metadata_by_custom_meta_key[$i]['metadata_field'];
                        add_post_meta($attach_id, $metadata_by_custom_meta_key[$i]['meta_key'], $fr_map_data['file']['meta'][$metadata_field]);
                    }
                }
            }
        }

        if ((int)$this->sync_metadata == 1) {
            if (isset($postmeta_data['alt'])) {
                add_post_meta($attach_id, '_wp_attachment_image_alt', $postmeta_data['alt']);
            }
        }

        // FR remote maps table
        $this->insert_map(
            $attach_id,
            $post_data['name'],
            $unique_name,
            $fr_map_data['uuid'],
            $fr_map_data['sha'],
            $fr_map_data['dir'],
            $fr_map_data['status']
        );

        $map              = new stdClass;
        $map->post_id     = $attach_id;
        $map->remote_name = $post_data['name'];
        $map->local_name  = $unique_name;
        $map->uuid        = $fr_map_data['uuid'];
        $map->sha         = $fr_map_data['sha'];
        $map->container   = $fr_map_data['dir'];
        $map->status      = $fr_map_data['status'];

        return $map;
    }

    public function filerobot_action_correct_attachment_permalink($post)
    {
        $attachment_url = $this->check_remotize_url($post);

        if (!$attachment_url) {
            echo '<style>#edit-slug-box{display:none !important;}</style>';
            echo '
                <div id="edit-slug-box-adjusted">
                    <strong>Permalink:</strong>
                    <a id="sample-permalink" href="'.$post->guid.'">'.$post->guid.'</a>
                </div>';
        } else {
            echo '<style>#edit-slug-box{display:none !important;}</style>';
            echo '
                <div id="edit-slug-box-adjusted">
                    <strong>Permalink:</strong>
                    <a id="sample-permalink" href="'.$attachment_url.'">'.$attachment_url.'</a>
                </div>';
        }
    }
    public function filerobot_action_correct_attachment_postbox_url($post)
    {
        if (!$this->check_remotize_url($post)) {
            return;
        }

        echo '<style>.misc-pub-section.misc-pub-attachment{display:none !important;}</style>';
    }
    private function check_remotize_url($post)
    {
        $base_url = wp_upload_dir()['baseurl'];

        if ($post->post_type !== 'attachment') {
            return false;
        }

        if (strpos($post->guid, $base_url) === false) {
            return false;
        }

        $rel_path          = str_replace($base_url, '', $post->guid);
        list($name, $path) = $this->get_path_and_filename($rel_path);
        $mapping           = $this->get_remote_mapping(['local_name' => $name, 'post_id' => $post->ID]);

        if (empty($mapping)) {
            return false;
        }

        if (empty($mapping[0]->remote_name) || empty($mapping[0]->sha) || empty($mapping[0]->container)) {
            return false;
        }

        return $mapping[0]->guid;
    }

    public function get_comments($uuid)
    {
        $filesystem = new Filerobot_API($this->token, $this->sec_id, $this->container, $this->endpoint);
        $response   = $filesystem->get_file_comments($uuid);
        $comments   = '';

        foreach ($response->comments as $comment) {
            $text      = json_decode($comment->text);
            $comments .= $text->text . ' ';
        }

        return $comments;
    }

    public function test_connection($token, $sec_id)
    {
        $container = '/';
        $endpoint  = 'https://api.filerobot.com/';

        $filesystem = new Filerobot_API($token, $sec_id, $container, $endpoint);
        $response   = $filesystem->check_connection();

        return $response;
    }

    public function test_connection_with_message()
    {
        $response = $this->test_connection($_POST['filerobot_token'], $_POST['filerobot_sec_id']);
        if ($response->status == 'success') {
            $this->show_message('Connection is successfully established. Proceed with files upload.');
            exit();
        } else {
            $this->show_message('Connection is not established. Please check your credentials', true);
            exit();
        }
    }

    public function get_metadata_fields()
    {
        $endpoint  = 'https://api.filerobot.com/';
        $filesystem = new Filerobot_API($_POST['filerobot_token'], $_POST['filerobot_sec_id'], '/', $endpoint);
        $response   = $filesystem->get_metadata_taxonomy();

        echo json_encode($response);
        exit();
    }

    public function show_message($message, $errormsg = false)
    {
        echo json_encode(['type' => $errormsg ? 'dashicons-no' : 'dashicons-yes-alt', 'message' => $message]);
    }

    public function fmaw_action_change_filename()
    {
        global $wpdb;
        $uuid = $_POST['uuid'];
        if ($uuid != '') {
            $filename = $_POST['filename'];
            $records = $wpdb->get_col("SELECT {$wpdb->prefix}filerobot_remote_mapping.*, {$wpdb->prefix}posts.ID, {$wpdb->prefix}posts.guid 
                    FROM {$wpdb->prefix}filerobot_remote_mapping 
                    JOIN {$wpdb->prefix}posts ON {$wpdb->prefix}posts.ID = {$wpdb->prefix}filerobot_remote_mapping.post_id 
                    WHERE {$wpdb->prefix}filerobot_remote_mapping.uuid = '{$uuid}'");
            foreach ($records as $record) {
                $wpdb->update(
                    "{$wpdb->prefix}filerobot_remote_mapping",
                    [
                        'remote_name' => $filename,
                        'local_name' => $filename,
                        'updated' => date('Y-m-d H:i:s')
                    ],
                    [
                        'uuid' => $uuid
                    ]
                );

                $attachment_url = $record->guid;
                $wpdb->update(
                    "{$wpdb->prefix}posts",
                    [
                        'guid' => $attachment_url,
                        'post_modified' => date('Y-m-d H:i:s')
                    ],
                    [
                        'ID' => $record->post_id
                    ]
                );

                $meta_value = $filename;
                if ((int)$this->change_value_wp_attached_file_to_cdn_link) {
                    $meta_value = $attachment_url;
                }
                $wpdb->update(
                    "{$wpdb->prefix}postmeta",
                    [
                        'meta_value' => $meta_value
                    ],
                    [
                        'post_id' => $record->post_id,
                        'meta_key' => '_wp_attached_file'
                    ]
                );

                $metadata = $wpdb->get_col("SELECT meta_value FROM {$wpdb->prefix}postmeta WHERE {$wpdb->prefix}postmeta.post_id = {$record->post_id} AND {$wpdb->prefix}postmeta.meta_key = '_wp_attachment_metadata'");
                foreach ($metadata as $item) {
                    if (!empty($item)) {
                        $dataItem = unserialize($item);
                        $dataItem['file'] = $filename;
                        if (isset($dataItem['sizes'])) {
                            $newSizes = [];
                            foreach ($dataItem['sizes'] as $key => $size) {
                                $size['file'] = $filename;
                                $newSizes[$key] = $size;
                            }
                            $dataItem['sizes'] = $newSizes;
                        }

                        $wpdb->update(
                            "{$wpdb->prefix}postmeta",
                            [
                                'meta_value' => serialize($dataItem)
                            ],
                            [
                                'post_id' => $record->post_id,
                                'meta_key' => '_wp_attachment_metadata'
                            ]
                        );
                    }
                }
            }
            echo json_encode(
                [
                    'success' => true,
                    'message' => 'Success change filename.'
                ]
            );
        } else {
            echo json_encode(
                [
                    'success' => false,
                    'message' => 'UUID not found.'
                ]
            );
        }
        exit();
    }

    private function get_file_url($file)
    {
        $base_path = DIRECTORY_SEPARATOR . join(DIRECTORY_SEPARATOR, ['wp-content', 'uploads']);
        $url       = get_site_url() . $base_path . $this->get_file_path($file);

        return $url;
    }

    private function get_file_path($file)
    {
        $path = str_replace(wp_upload_dir()['basedir'], '', $file);

        return $path;
    }

    public function filerobot_query_attachments_args($query = array())
    {
        $query['posts_per_page'] = 20;
        return $query;
    }

    public function filerobot_load_fmaw_page()
    {
        include 'filerobot_fmaw_page.php';
        exit();
    }
}
