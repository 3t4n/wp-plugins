<?php
    /*
     Plugin Name: High Compress
     Plugin URI: https://highcompress.com
     Description: Highcompress compress and reduce image file sizes without losing quality and boost website seo as well as also decrease page loading speed
     Author: Himalaya Saxena
     Author URI: https://www.facebook.com/himalayasaxena
     Version: 6.1.2
     License: GPLv2 or later
     */
    defined('ABSPATH') || die('Cheatin\' uh?');
    define('HIGHCOMPRESS_FILE', __FILE__);
    define('HIGHCOMPRESS_SLUG', 'highcompress');
    define('HIGHCOMPRESS_PLUGIN_PATH', plugin_dir_url(__FILE__));
    define('HIGHCOMPRESS_PATH', realpath(plugin_dir_path(HIGHCOMPRESS_FILE)) . '/');
    define('HIGHCOMPRESS_ASSETS_PATH', realpath(HIGHCOMPRESS_PATH . 'assets') . '/');
    define('HIGHCOMPRESS_INC_PATH', realpath(HIGHCOMPRESS_PATH . 'inc/') . '/');
    define('HIGHCOMPRESS_FUNCTIONS_PATH', realpath(HIGHCOMPRESS_INC_PATH . 'functions') . '/');
    define('HIGHCOMPRESS_3RD_PARTY_PATH', realpath(HIGHCOMPRESS_INC_PATH . '3rd-party') . '/');
    add_option('HIGHCOMPRESS_VERSION_TAG', '6.1.2', '', 'yes');
    require_once(HIGHCOMPRESS_FUNCTIONS_PATH.'verifyapi.php');
    require_once(HIGHCOMPRESS_FUNCTIONS_PATH.'process.php');
    require_once(HIGHCOMPRESS_FUNCTIONS_PATH.'autocompress.php');
    
    add_action('admin_menu', 'highcompress_adminfunction');
    
    function highcompress_autocompressjs()
    {
        wp_register_script('alert_js', HIGHCOMPRESS_PLUGIN_PATH. 'assets/js/alert.js');
        wp_enqueue_script('alert_js', HIGHCOMPRESS_PLUGIN_PATH. 'assets/js/alert.js', array('media-upload', 'swfupload', 'plupload'), false, true);
        wp_localize_script('alert_js', 'WPURLS', array( 'siteurl' => admin_url('admin-ajax.php') ));
    }
    
    
    add_action('admin_enqueue_scripts', 'highcompress_autocompressjs');
    
    function highcompress_adminfunction()
    {

        if (!current_user_can('manage_options')) {
            return;
        }
        add_menu_page("High compress", "High compress", 'manage_options', "highcompress-settings", "highcompress_Menu");
        add_media_page("High compress", "Bulk Optimizer", 'manage_options', "highcompress-optimizer", "bulkcommpress_highcompress");
        add_option('HIGHCOMPRESS_TOATAL_Size_BEFORE', '0', '', 'no');
        add_option('HIGHCOMPRESS_TOATAL_IMAGES', '0', '', 'no');
        add_option('HIGHCOMPRESS_TOATAL_Size_AFTER', '0', '', 'no');
        add_option('HIGHCOMPRESS_PERCENT', '0', '', 'yes');
        add_option('HIGHCOMPRESS_TOTAL_SIZE', '0KB', '', 'yes');
        add_option('HIGHCOMPRESS_AUTOCOMPRESS_RULE', 'NO', '', 'yes');
        add_option('HIGHCOMPRESS_AUTOBACKUP_RULE', 'NO', '', 'yes');
        
        $url="https://www.highcompress.com/banner";
        $response = wp_remote_get($url);
        $api_response = wp_remote_retrieve_body($response);
        
        if (!add_option('HIGHCOMPRESS_MY', $api_response, '', 'yes')) {
            update_option('HIGHCOMPRESS_MY', $api_response, '', 'yes');
        }
        
        $sizes = get_intermediate_image_sizes();
        // $sizes= array( 'thumbnail', 'medium', 'medium_large', 'large' );
        $sizes[] = 'full';
        $arrlength = count($sizes);
        
        
        for ($i=0;$i<$arrlength;$i++) {
            for ($j=0;$j<2;$j++) {
                if ($j==1) {
                    $newarr[$i][$j]=1;
                } else {
                    $newarr[$i][$j]=$sizes[$i];
                }
            }
            add_option('HIGHCOMPRESS_OFFSET_OFF_'.$sizes[$i], 0, '', 'yes');
        }
        add_option('HIGHCOMPRESS_FILE_TYPE', $newarr, '', 'yes');
    }
    
    function highcompress_Menu()
    {
        

        if (!current_user_can('manage_options')) {
            return;
        }



        require(HIGHCOMPRESS_FUNCTIONS_PATH . 'admin-ui.php');
    }
    function bulkcommpress_highcompress()
    {
        
        if (!current_user_can('manage_options')) {
            return;
        }


        require(HIGHCOMPRESS_FUNCTIONS_PATH . 'optimizer-ui.php');
    }
    
    if (isset($_GET['page'])) {
        if ($_GET['page']=='highcompress-optimizer' || $_GET['page']=='highcompress-settings') {
            add_action('admin_enqueue_scripts', 'highcompress_customstyle');
            add_action('admin_enqueue_scripts', 'highcompress_enqueuejsscripts');
            
            function highcompress_heartbeatsettings($settings)
            {
                $settings['interval'] = 30;
                return $settings;
            }
            add_filter('heartbeat_settings', 'highcompress_heartbeatsettings');
        }
    }
    
    function highcompress_customstyle()
    {
        wp_register_style(
            'custom_highcompress_bootstrap_css',
            HIGHCOMPRESS_PLUGIN_PATH. 'assets/css/bootstrap.min.css',
            false,
            '1.0.0'
        );
        
        wp_register_style(
            'custom_highcompress_admin_style_css',
            HIGHCOMPRESS_PLUGIN_PATH. 'assets/css/style.css',
            false,
            '1.0.0'
        );
        
        wp_register_style(
            'custom_highcompress_admin_circle_css',
            HIGHCOMPRESS_PLUGIN_PATH. 'assets/css/css-circular-prog-bar.css',
            false,
            '1.0.0'
        );
        
        wp_register_style(
            'custom_highcompress_admin_main_css',
            HIGHCOMPRESS_PLUGIN_PATH. 'assets/css/main.css',
            false,
            '1.0.0'
        );
        
        wp_register_style(
            'custom_highcompress_admin_fontawo_css',
            HIGHCOMPRESS_PLUGIN_PATH. 'assets/css/font-awesome.min.css',
            false,
            '1.0.0'
        );
        
        wp_register_style(
            'custom_highcompress_admin_flaticon_css',
            HIGHCOMPRESS_PLUGIN_PATH. 'assets/css/flaticon.css',
            false,
            '1.0.0'
        );
        
        wp_register_style(
            'custom_highcompress_admin_sweetalert2_css',
            HIGHCOMPRESS_PLUGIN_PATH. 'assets/css/sweetalert2.css',
            false,
            '1.90.0'
        );
        
        wp_enqueue_style('custom_highcompress_admin_style_css');
        wp_enqueue_style('custom_highcompress_bootstrap_css');
        wp_enqueue_style('custom_highcompress_admin_circle_css');
        wp_enqueue_style('custom_highcompress_admin_main_css');
        wp_enqueue_style('custom_highcompress_admin_fontawo_css');
        wp_enqueue_style('custom_highcompress_admin_flaticon_css');
        wp_enqueue_style('custom_highcompress_admin_sweetalert2_css');
    }
    
    function highcompress_enqueuejsscripts()
    {
        wp_enqueue_script(
            'custom_highcompress_btjs',
            HIGHCOMPRESS_PLUGIN_PATH. 'assets/js/bootstrap.min.js',
            array('jquery'),
            '1.999',
            true
        );
        
        
        
        wp_enqueue_script(
            'custom_highcompress_sweetalert_js',
            HIGHCOMPRESS_PLUGIN_PATH. 'assets/js/sweetalert2.js',
            array('jquery'),
            '1.999',
            true
        );
    }