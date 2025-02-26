<?php
/**
* Wizard
*
* @package Whizzie
* @author Catapult Themes
* @since 1.0.0
*/

class am_demo_importer_ThemeWhizzie {

    private $setup_plugins_instance;
    private $activation_instance;
    private $steps_instance;
        
    public static $theme_key = '';
    protected $version = '1.1.0';
    
    /** @var string Current theme name, used as namespace in actions. */
    protected $plugin_name = '';
    protected $plugin_title = '';

    protected $plugin_path = '';
    protected $parent_slug  = '';
    
    /** @var string Wizard page slug and title. */
    protected $page_slug = '';
    protected $page_title = '';
    
    /**
    * Relative plugin url for this plugin folder
    * @since 1.0.0
    * @var string
    */
    protected $plugin_url = '';
    
    /**
    * TGMPA instance storage
    *
    * @var object
    */
    protected $tgmpa_instance;
    
    /**
    * TGMPA Menu slug
    *
    * @var string
    */
    protected $tgmpa_menu_slug = 'am-demo-importer-tgmpa-install-plugins';
    
    /**
    * TGMPA Menu url
    *
    * @var string
    */
    protected $tgmpa_url = 'admin.php?page=am-demo-importer-tgmpa-install-plugins';

    // Where to find the widget.wie file
    protected $widget_file_url = '';
    
    /**
    * Constructor
    *
    * @param $am_demo_importer_config Our config parameters
    */
    public function __construct() {
        $this->set_vars();
        $this->init();
    }

    public static function get_the_validation_status() {
        return get_option('am_demo_importer_pre_theme_validation_status', 'false');
    }

    public static function set_the_validation_status($is_valid) {
        update_option('am_demo_importer_pre_theme_validation_status', $is_valid);
    }

    public static function set_the_theme_key($the_key) {
        update_option('adi_pre_theme_key', $the_key);
    }

    public static function remove_the_theme_key() {
        delete_option('adi_pre_theme_key');
    }

    public static function get_the_theme_key() {
        return get_option('adi_pre_theme_key');
    }

    public function get_page_slug() {
        return $this->page_slug;
    }

    public function get_tgmpa_url() {
        return $this->tgmpa_url;
    }

    public function get_tgmpa_menu_slug() {
        return $this->tgmpa_menu_slug;
    }

    /**
    * Set some settings
    * @since 1.0.0
    * @param $am_demo_importer_config Our config parameters
    */
    public function set_vars() {
        
        require_once trailingslashit(am_demo_importer_WHIZZIE_DIR) . 'tgm/tgm.php';

        $this->page_title = 'ET Import';
        
        $this->plugin_path = trailingslashit(dirname(__FILE__));
        $relative_url = str_replace(get_template_directory(), '', $this->plugin_path);
        $this->plugin_url = trailingslashit(get_template_directory_uri() . $relative_url);
        $current_plugin = 'Elementor Template Importer';
        $this->plugin_title = $current_plugin;
        $this->plugin_name = strtolower(preg_replace('#[^a-zA-Z]#', '', $current_plugin));
        $this->page_slug = apply_filters('am_demo_importer_' . $this->plugin_name . '_theme_setup_wizard_page_slug', $this->plugin_name . '-wizard');
        $this->parent_slug = apply_filters('am_demo_importer_' . $this->plugin_name . '_theme_setup_wizard_parent_slug', '');

    }
    /**
    * Hooks and filters
    * @since 1.0.0
    */
    public function init() {

        $this->setup_plugins_instance = new AmDemoImporterSetup_Plugins($this);
        $this->activation_instance = new AmDemoImporterActivation($this);
        $this->steps_instance = new AmDemoImporterSteps($this);
        
        add_action('activated_plugin', array($this, 'redirect_to_wizard'), 100, 2);
        if (class_exists('AM_DEMO_IMPORTER_TGM_Plugin_Activation') && isset($GLOBALS['am_demo_importer_tgmpa'])) {
            add_action('init', array($this, 'get_tgmpa_instance'), 30);
            add_action('init', array($this, 'set_tgmpa_url'), 40);
        }
        add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts'));
        add_action('admin_menu', array($this, 'menu_page'));
        add_action('admin_init', array($this->setup_plugins_instance, 'get_plugins'), 30);
        add_filter('am_demo_importer_tgmpa_load', array($this, 'am_demo_importer_tgmpa_load'), 10, 1);
        add_action('wp_ajax_setup_plugins', array($this->setup_plugins_instance, 'setup_plugins'));
        add_action('wp_ajax_setup_widgets', array($this, 'setup_widgets'));
        add_action('wp_ajax_wz_activate_am_demo_importer_pro', array($this->activation_instance, 'wz_activate_am_demo_importer_pro'));
        add_action('wp_ajax_am_demo_importer_setup_elementor', array($this, 'am_demo_importer_setup_elementor'));
    }
    
    // enqueue class start //
    public function enqueue_scripts($hook) {

        $page_slug = $this->get_page_slug();

        if ( $hook == 'toplevel_page_' . $page_slug ) {
            wp_enqueue_style('bootstrap-min-css', ADI_URL . 'theme-wizard/assets/css/bootstrap.min.css', array(), ADI_VER);
            wp_enqueue_style('theme-wizard-style', ADI_URL . 'theme-wizard/assets/css/theme-wizard-style.css', array(), ADI_VER);
            wp_register_script('theme-wizard-script', ADI_URL . 'theme-wizard/assets/js/theme-wizard-script.js', array('jquery'), time(), true);
            wp_localize_script('theme-wizard-script', 'am_demo_importer_pro_whizzie_params', array(
                'ajaxurl' => esc_url(admin_url('admin-ajax.php')), 
                'wpnonce' => wp_create_nonce('whizzie_nonce'),
                'verify_text' => esc_html('verifying', 'am-demo-importer')
            ));
            wp_enqueue_script('theme-wizard-script');
            wp_enqueue_script('tabs', ADI_URL . 'theme-wizard/assets/js/tab.js', array('jquery'), ADI_VER, true);
            wp_enqueue_script('wp-notify-popup', ADI_URL . 'theme-wizard/assets/js/notify.min.js', array('jquery'), ADI_VER, true);
            wp_enqueue_script('bootstrap-bundle-min-js', ADI_URL . 'theme-wizard/assets/js/bootstrap.bundle.min.js', array('jquery'), ADI_VER, true);
        }
        
        wp_enqueue_style('am-demo-importer-font', $this->am_demo_importer_pro_admin_font_url(), array(), ADI_VER);
        wp_enqueue_style('custom-admin-style', ADI_URL . 'theme-wizard/assets/css/getstart.css', array(), ADI_VER);
    }

    public function am_demo_importer_pro_admin_font_url() {
        
        $font_url = '';
        $font_family = array();
        $font_family[] = 'Muli:300,400,600,700,800,900';
        $query_args = array('family' => urlencode(implode('|', $font_family)),);
        $font_url = add_query_arg($query_args, '//fonts.googleapis.com/css');
        return $font_url;
    }
    // enqueue class end //

    // import class start
    public function am_demo_importer_setup_elementor() {

        $am_themes = $this->get_am_themes();
        $arrayJson = array();
        if( $am_themes['status'] == 200 && !empty($am_themes['data']) ) {
            
            $am_themes_data = $am_themes['data'];
            foreach ( $am_themes_data as $single_theme ) {
                $arrayJson[$single_theme->theme_text_domain] = array(
                    'title' => $single_theme->theme_page_title,
                    'url' => $single_theme->theme_json_url
                );
            }
        }

        $my_theme_txd = wp_get_theme();
        $get_textdomain = $my_theme_txd->get('TextDomain');

        $pages_arr = array();
        if (array_key_exists($get_textdomain, $arrayJson)) {
            $getpreth = $arrayJson[$get_textdomain];
            array_push($pages_arr, array(
                'title' => $getpreth['title'],
                'ishome' => 1,
                'type' => '',
                'post_type' => 'page',
                'url' => $getpreth['url'],
            ));
        
            
            if( defined('IS_AM_PREMIUM_THEME') || defined('IS_AM_FREEMIUM') ){
                    
                if (file_exists(get_template_directory() . '/inc/page.json')) {
                    $json_url = get_template_directory_uri() . '/inc/page.json';
                    $response = wp_remote_get($json_url);
                
                    if (!is_wp_error($response) && $response['response']['code'] == 200) {
                        $inner_page_json = wp_remote_retrieve_body($response);
                        $inner_page_json_decoded = json_decode($inner_page_json, true);
                
                        if ($inner_page_json_decoded !== null) {
                            foreach ($inner_page_json_decoded as $page) {
                                array_push($pages_arr, array(
                                    'type' => isset($page['type']) ? $page['type'] : '',
                                    'title' => $page['name'],
                                    'ishome' => 0,
                                    'post_type' => $page['posttype'],
                                    'url' => $page['source'],
                                ));
                            }
                        } 
                    }
                }                
            }
        } else {
            array_push($pages_arr, array(
                'title' => 'Pest Control Elementor',
                'type' => '',
                'ishome' => 1,
                'post_type' => 'page',
                'url' => 'https://webxthemes.com/am-theme-json/am-random.json',
            ));
        }

        $this->create_all_existing_elementor_values();

        // call theme function start //
        $setup_widgets_function = str_replace( '-', '_', $get_textdomain ) . '_demo_import';
        if ( class_exists('AM_Theme_Whizzie') && method_exists( 'AM_Theme_Whizzie', $setup_widgets_function ) ) {
            AM_Theme_Whizzie::$setup_widgets_function();
        }
        // call theme function end //

        foreach ($pages_arr as $page) {
            $elementor_template_data = $page['url'];
            $elementor_template_data_title = $page['title'];
            $ishome = $page['ishome'];
            $post_type = $page['post_type'];
            $type = isset($page['type']) ? $page['type'] : '';
            $this->import_inner_pages_data($elementor_template_data, $elementor_template_data_title, $ishome,$post_type,$type);
        }

        wp_send_json(array(
            'permalink' => site_url(),
            'edit_post_link' => admin_url('post.php?post=' . $home_id . '&action=elementor')
        ));
    }

    public function random_string($length) {
        
        $key = '';
        $keys = array_merge(range(0, 9), range('a', 'z'));
        for ($i = 0;$i < $length;$i++) {
            $key.= $keys[array_rand($keys) ];
        }
        return $key;
    }

    public function import_inner_pages_data($elementor_template_data, $elementor_template_data_title, $ishome,$post_type,$type){

        $response = wp_remote_get($elementor_template_data);

        if (is_wp_error($response)) {
            // Handle error
            return;
        }
        
        $elementor_template_data_json = wp_remote_retrieve_body($response);

        // Upload the file first
        $upload_dir = wp_upload_dir();
        $filename = $this->random_string(25) . '.json';
        $file = trailingslashit($upload_dir['path']) . $filename;

        // Initialize WP_Filesystem
        if ( ! function_exists( 'WP_Filesystem' ) ) {
            require_once ABSPATH . '/wp-admin/includes/file.php';
        }
    
        WP_Filesystem();
    
        global $wp_filesystem;
    
        if ( ! $wp_filesystem ) {
            // Failed to initialize WP_Filesystem, handle error
            return;
        }

        $write_result = $wp_filesystem->put_contents($file, $elementor_template_data_json, FS_CHMOD_FILE);

        if ( ! $write_result ) {
            // Failed to write file, handle error
            return;
        }

        $json_path = $upload_dir['path'] . '/' . $filename;
        $json_url = $upload_dir['url'] . '/' . $filename;
        $elementor_home_data = $this->get_elementor_theme_data($json_url, $json_path);

        $page_title = $elementor_template_data_title;
        $home_page = array(
            'post_type' => $post_type, 
            'post_title' => $page_title, 
            'post_content' => $elementor_home_data['elementor_content'], 
            'post_status' => 'publish', 
            'post_author' => 1, 
            'meta_input' => $elementor_home_data['elementor_content_meta']
        );
        $home_id = wp_insert_post($home_page);
        
        $get_author = wp_get_theme();
        $theme_author = $get_author->display( 'Author', FALSE );
        if( $theme_author == 'patrickoslo'){
            update_post_meta( $home_id, '_wp_page_template', 'default-template.php' );
        }

        // Xpro Builder Start //
        if($post_type == 'xpro-themer'){
            $array_location = [
                'rule' => [
                    $type
                ],
                'specific' => []
            ];
            print_r($array_location);
            update_post_meta( $home_id, 'xpro_theme_builder_target_include_locations', $array_location );
            update_post_meta( $home_id, 'xpro_theme_builder_template_type', 'type_singular' );
        }
        // Xpro Builder end //
        
        // Shop single page start//
        $shopengine_template__post_meta = array(
            'form_title' => $page_title, 
            'form_type' => $type, 
            'status' => 1, 
            'edit_with_option' => 'elementor', 
            'language_code' => 'en', 
            'old_language_code' => 'en'
        );

        // Shop engine single page start //
        if($post_type == 'shopengine-template'){

            $activated_templates = get_option('shopengine_activated_templates');

            if (!is_array($activated_templates)) {
                $activated_templates = [];
            }

            $shop_option_status = array(
                $type => array(
                    'lang' => array(
                        'en' => array(
                            0 => array(
                                'template_id' => $home_id,
                                'status' => true,
                                'category_id' => 0
                            )
                        )
                    )
                )
            );

            if (!array_key_exists($type, $activated_templates)) {
                $activated_templates[$type] = $shop_option_status[$type];
            } else {
                $activated_templates[$type]['lang']['en'][] = array(
                    'template_id' => $home_id,
                    'status' => true,
                    'category_id' => 0
                );
            }

            update_option('shopengine_activated_templates', $activated_templates);
            update_post_meta( $home_id, 'language_code', 'en' );
            update_post_meta( $home_id, 'shopengine_template__post_meta__type', 'single' );
            update_post_meta( $home_id, 'shopengine_template__post_meta', $shopengine_template__post_meta );
            update_post_meta( $home_id, 'shopengine_template__post_meta__edit_with', 'elementor' );
            update_post_meta( $home_id, '_wp_page_template', 'elementor_header_footer' );
            update_post_meta( $home_id, '_elementor_edit_mode', 'builder' );
            update_post_meta( $home_id, '_elementor_version', '3.4.6' );
        }
        // Shop engine single page end //
        
        if($post_type == 'elementskit_template' && $type == 'header' || $type == 'footer'){
            update_post_meta( $home_id, '_wp_page_template', 'elementor_canvas' );
            update_post_meta( $home_id, 'elementskit_template_activation', 'yes' );
            update_post_meta( $home_id, 'elementskit_template_type', $type );
            update_post_meta( $home_id, 'elementskit_template_condition_a', 'entire_site' );
        } else {
            if ($ishome !== 0) {
                update_option('page_on_front', $home_id);
                update_option('show_on_front', $post_type);

                $my_theme_txd = wp_get_theme();
                $get_textdomain = $my_theme_txd->get('TextDomain');
                $sedi_free_text_domain = array('pest-control-elementor ');
                if(in_array($get_textdomain,  $sedi_free_text_domain)) {
                    add_post_meta( $home_id, '_wp_page_template', 'home-page-template.php' );
                }
            }
        }
    }

    public function get_elementor_theme_data($json_url, $json_path) {
    
        // Mime a supported document type.
        $elementor_plugin = \Elementor\Plugin::$instance;
        $elementor_plugin->documents->register_document_type('not-supported', \Elementor\Modules\Library\Documents\Page::get_class_full_name());
        $template = $json_path;
        $name = '';
        $_FILES['file']['tmp_name'] = $template;
        $elementor = new \Elementor\TemplateLibrary\Source_Local;
        $elementor->import_template($name, $template);
        wp_delete_file($json_path);

        $args = array('post_type' => 'elementor_library','nopaging' => true,'posts_per_page' => '1','orderby' => 'date','order' => 'DESC');
        add_filter('posts_where', array($this, 'custom_posts_where'));
        $query = new \WP_Query($args);
        remove_filter('posts_where', array($this, 'custom_posts_where'));
    
        $last_template_added = $query->posts[0];
        //get template id
        $template_id = $last_template_added->ID;
        wp_reset_postdata();
        //page content
        $page_content = $last_template_added->post_content;
        //meta fields
        $elementor_data_meta = get_post_meta($template_id, '_elementor_data');
        $elementor_ver_meta = get_post_meta($template_id, '_elementor_version');
        $elementor_edit_mode_meta = get_post_meta($template_id, '_elementor_edit_mode');
        $elementor_css_meta = get_post_meta($template_id, '_elementor_css');
        $elementor_metas = array('_elementor_data' => !empty($elementor_data_meta[0]) ? wp_slash($elementor_data_meta[0]) : '', '_elementor_version' => !empty($elementor_ver_meta[0]) ? $elementor_ver_meta[0] : '', '_elementor_edit_mode' => !empty($elementor_edit_mode_meta[0]) ? $elementor_edit_mode_meta[0] : '', '_elementor_css' => $elementor_css_meta,);
        $elementor_json = array('elementor_content' => $page_content, 'elementor_content_meta' => $elementor_metas);
        return $elementor_json;
    }

    public function custom_posts_where($where) {
        return $where;
    }

    public function create_all_existing_elementor_values() {
      
        update_option('elementor_unfiltered_files_upload', '1');
        update_option('elementor_experiment-e_optimized_control_loading', 'active');
        
        $elementor_kit_id = get_option('elementor_active_kit');
            
            $expected_breakpoints = array(
                'viewport_mobile',
                'viewport_mobile_extra',
                'viewport_tablet',
                'viewport_tablet_extra',
                'viewport_laptop',
                'viewport_widescreen'
            );
            
            if (isset($get_all_existing_elementor_values['active_breakpoints']) && is_array($get_all_existing_elementor_values['active_breakpoints'])) {
                $active_breakpoints = $get_all_existing_elementor_values['active_breakpoints'];
                $missing_breakpoints = array_diff($expected_breakpoints, $active_breakpoints);
            
                if (!empty($missing_breakpoints)) {
                    $updated_breakpoints = array_merge($active_breakpoints, $missing_breakpoints);
                    $get_all_existing_elementor_values['active_breakpoints'] = $updated_breakpoints;
                    update_post_meta($elementor_kit_id, '_elementor_page_settings', $get_all_existing_elementor_values);
                }
            } else {
                $get_all_existing_elementor_values['active_breakpoints'] = $expected_breakpoints;
            
                update_post_meta($elementor_kit_id, '_elementor_page_settings', $get_all_existing_elementor_values);
            }

    }
    // import class end
    public static function get_the_plugin_key() {
        return get_option('am_demo_importer_plugin_license_key');
    }
    
    public function redirect_to_wizard($plugin, $network_wide) {
        
        global $pagenow;
        if (is_admin() && ('plugins.php' == $pagenow) && current_user_can('manage_options') && (ADI_BASE == $plugin)) {
            wp_redirect(esc_url(admin_url('admin.php?page=' . esc_attr($this->page_slug))));
        }
    }
    
    public static function get_instance() {
        
        if (!self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function am_demo_importer_tgmpa_load($status) {
        return is_admin() || current_user_can('install_themes');
    }
    /**
    * Get configured TGMPA instance
    *
    * @access public
    * @since 1.1.2
    */
    
    public function get_tgmpa_instance() {
        $this->tgmpa_instance = call_user_func(array(get_class($GLOBALS['am_demo_importer_tgmpa']), 'get_instance'));
    }

    /**
    * Update $tgmpa_menu_slug and $tgmpa_parent_slug from TGMPA instance
    *
    * @access public
    * @since 1.1.2
    */
    public function set_tgmpa_url() {
        
        $this->tgmpa_menu_slug = (property_exists($this->tgmpa_instance, 'menu')) ? $this->tgmpa_instance->menu : $this->tgmpa_menu_slug;
        $this->tgmpa_menu_slug = apply_filters('am_demo_importer_' . $this->plugin_name . '_theme_setup_wizard_tgmpa_menu_slug', $this->tgmpa_menu_slug);
        $tgmpa_parent_slug = (property_exists($this->tgmpa_instance, 'parent_slug') && $this->tgmpa_instance->parent_slug !== 'plugin.php') ? 'admin.php' : 'plugin.php';
        $this->tgmpa_url = apply_filters('am_demo_importer_' . $this->plugin_name . '_theme_setup_wizard_tgmpa_url', $tgmpa_parent_slug . '?page=' . $this->tgmpa_menu_slug);
    }
    
    /**
    * Make a modal screen for the wizard
    */
    public function menu_page() {
        add_menu_page(
            esc_html($this->page_title),
            esc_html($this->page_title),
            'manage_options',
            esc_attr($this->page_slug),
            array($this->activation_instance, 'am_demo_importer_pro_mostrar_guide'),
            esc_url(plugin_dir_url(__FILE__) . 'assets/images/am-demo-importer-admin-menu-icon.svg'), // Escaping the URL
            40
        );
    }

    /**
    * Imports the Demo Content
    * @since 1.1.0
    */
    public function setup_widgets() {
    }

    public function get_am_themes() {
        
        $endpoint = ADI_ADMIN_CONTROL_PANEL_ENDPOINT . 'get_am_theme';
        $options = ['headers' => ['Content-Type' => 'application/json', ]];
        $response = wp_remote_get($endpoint, $options);
        if (is_wp_error($response)) {
            $response = array( 'status' => 100, 'msg' => 'Something Went Wrong!', 'data' => [] );
            return $response;
        } else {
            $response_body = wp_remote_retrieve_body($response);
            $response_body = json_decode($response_body);

            $response = array( 'status' => 200, 'msg' => 'Patrickoslo list', 'data' => $response_body->data );
            return $response;
        }
    }
}
