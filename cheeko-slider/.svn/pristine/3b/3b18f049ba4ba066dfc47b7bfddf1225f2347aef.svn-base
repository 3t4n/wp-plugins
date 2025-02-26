<?php
/*
* Plugin Name: Simple Responsive Image Slider
* Plugin URI: http://www.base29.com
* Description: WordPress Responsive Slider creates all in one image slide show with controls such as pagination next, previous links from the images you upload. You* can upload/delete images via the administration panel. You can display the slider in your theme by using the [cheeko_slider] shortcode in the template or in the wordpress editor.
* Version: 1.0.3
* Author: Base29
* Author URI: http://www.base29.com
* Text Domain: cheeko-slider
* Domain Path: /languages

* #####################################################################################################
* #                                                                                                   # 
* # Simple Responsive Image Slider is a free software: you can redistribute it and/or modify                           # 
* # it under the terms of the GNU General Public License as published by                              # 
* # the Free Software Foundation, either version 2 of the License, or                                 # 
* # any later version.                                                                                # 
* #                                                                                                   # 
* # Simple Responsive Image Slider is distributed in the hope that it will be useful,                                  # 
* # but WITHOUT ANY WARRANTY; without even the implied warranty of                                    # 
* # MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the                                      #         
* # GNU General Public License for more details.                                                      # 
* #                                                                                                   #
* # You should have received a copy of the GNU General Public License                                 #
* # along with WordPress SSL (HTTPS) Enforcer. If not, see https://www.gnu.org/licenses/gpl-2.0.html. #
* #####################################################################################################
*/

//Plugin Class
class Cheeko_jQuery_Slider {

    //add image table name
    protected $cjs_image_tbl;

    // Plugin Construct
    function __construct() {
        //global DB
        global $wpdb;

        // Table name
        $this->cjs_image_tbl = $wpdb->prefix . "cjs_images";

        //Define Plugin version
        define("CJS_PLUGIN_VER", "1.0.0");

        // Define Plugin directory, uri
        define("CJS_PLUIGN_DIR", plugin_dir_path(__FILE__));
        define("CJS_OLUGIN_URI", plugin_dir_url(__FILE__));

        // Text Domain
        add_action( "init", array($this, "cjs_plugin_load_textdomain") );

        // plugin menu hook
        add_action("admin_menu", array($this, "cjs_plugin_menu"));

        // Enqueue admin scripts and styles hook
        add_action("admin_enqueue_scripts", array($this, "cjs_admin_scripts_styles"));

        // register settings
        add_action("admin_init", array($this, "cjs_slider_settings"));

        // Plugin register activation hook
        register_activation_hook(__FILE__, array($this, "cjs_plugin_hook"));

        //Creating AJAX for saving value in databsae
        add_action("wp_ajax_cjs_settings", "cjs_settings");
        add_action("wp_ajax_nopriv_cjs_settings", "cjs_settings");

        add_action("wp_ajax_cjs_get_add_images", "cjs_add_images");
        add_action("wp_ajax_nopriv_cjs_get_add_images", "cjs_add_images");

        add_action("wp_ajax_cjs_get_update_values", "cjs_update_values");
        add_action("wp_ajax_nopriv_cjs_get_update_values", "cjs_update_values");

        add_action("wp_ajax_cjs_get_delete_values", "cjs_delete_values");
        add_action("wp_ajax_nopriv_cjs_get_delete_values", "cjs_delete_values");

        add_action("admin_head", array($this, "cjs_plugin_head"));

        // require ajax functions file
        require "admin/cjs-ajax-functions.php";

        // Enqueue styles or scripts for frontend
        add_action('wp_enqueue_scripts', array($this, "cjs_wp_scripts_styles"));

        // Cheeko plugin shortcode
        add_shortcode('cheeko_slider', array($this, 'cjs_shortcode'));

        // Dynamic wp css hook
        add_action('wp_head', array($this, 'cjs_head_css'));
    }

    // Text Domain
    function cjs_plugin_load_textdomain() {
        load_plugin_textdomain( 'cheeko-slider', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
    }

    // Plugin Menu
    function cjs_plugin_menu() {
        add_menu_page(__("Cheeko Slider Settings","cheeko-slider"), __("Cheeko Slider","cheeko-slider"), "manage_options", "csj-cheeko-slider", array($this,"cjs_plugin_settings"), "dashicons-image-filter");
        add_submenu_page("csj-cheeko-slider", __("Cheeko Slider Settings","cheeko-slider"), __("Settings","cheeko-slider"), "manage_options", "csj-cheeko-slider", array($this,"cjs_plugin_settings"));
        add_submenu_page("csj-cheeko-slider", __("Add Slider Images","cheeko-slider"), __("Add Images","cheeko-slider"), "manage_options", "cheeko-slider-images", array($this,"cjs_slider_add_images"));
    }

    // Enqueue admin scripts and styles
    function cjs_admin_scripts_styles() {
        //Enqueue admin styles
        wp_register_style("cjs-admin-style", plugins_url("admin/assets/css/cjs-admin.css",__FILE__), array(), CJS_PLUGIN_VER);
        wp_enqueue_style("cjs-admin-style");

        // Enqueue admin jQuery Library
        wp_enqueue_script("jQuery");

        // Enqueue media uploader for image uploader 
        $cjs_page = $_GET['page'];
        if (($cjs_page == 'cheeko-slider-images')) {
            wp_enqueue_media();

            wp_register_script('meta-image', plugins_url('admin/assets/js/cjs-custom.js',__FILE__), array('jquery'));
            wp_localize_script('meta-image', 'meta_image',
                array(
                    'title' => __('Upload an Image','cheeko-slider'),
                    'button' => __('Use this image','cheeko-slider'),
                )
            );
            wp_enqueue_script('meta-image');
        }
    }

    // Register Settings
    function cjs_slider_settings() {
        register_setting('cheeko_slider_settings', 'cheeko_slider_options');
    }

    // Plugin activation hook
    function cjs_plugin_hook() {

        // Save settings on plugin activate
        $array_of_options = array(
            'cjs_effect' => 'scrollHorz',
            'cjs_speed' => '2',
            'cjs_auto_play' => 0,
            'cjs_auto_time' => 0,
            'cjs_pager' => 0,
            'cjs_controls' => 0,
            'cjs_width' => 800,
            'cjs_height' => 400
        );
        update_option('cheeko_slider_options', $array_of_options);

        // Creat images table in database
        require_once(ABSPATH . '/wp-admin/includes/upgrade.php');

        if ($wpdb->get_var("SHOW TABLES LIKE '" . $this->cjs_image_tbl . "'") != $this->cjs_image_tbl) {
            if (!empty($wpdb->charset))
                $charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";

            if (!empty($wpdb->collate))
                $charset_collate .= " COLLATE $wpdb->collate";

            $sql = "CREATE TABLE " . $this->cjs_image_tbl . " (
                `cjs_img_id` int(11) NOT NULL AUTO_INCREMENT,
                `cjs_img_path` varchar(500),
                `cjs_img_title` varchar(255),
                `cjs_img_description` mediumtext,
                `cjs_img_link` varchar(500),
                PRIMARY KEY (`cjs_img_id`)
         ) $charset_collate;";
            dbDelta($sql);
        }
    }

    // Setting File
    function cjs_plugin_settings() {
        require "settings/cjs-settings.php";
    }

    // Add images
    function cjs_slider_add_images() {
        require "admin/cjs-add-images.php";
    }

    // Plugin head
    function cjs_plugin_head() {
        require "admin/cjs-ajax-scripts.php";
    }

    // Enqueue Scripts & Styles For Front End
    function cjs_wp_scripts_styles() {
        wp_register_style("cjs-style", plugins_url("assets/css/cjs-style.css",__FILE__), array(), CJS_PLUGIN_VER);
        wp_enqueue_style("cjs-style");

        wp_enqueue_script('jquery');

        wp_register_script('cjs-cyle2', plugins_url("assets/js/cjs-jquery.cycle2.js",__FILE__), array('jquery'), CJS_PLUGIN_VER, false);
        wp_enqueue_script('cjs-cyle2');
    }

    // Dynamic css
    function cjs_head_css() {
    	$cheeko_slider_options = get_option('cheeko_slider_options');
    ?>
    	<style type="text/css">
			.cjs-slider {
				position: relative;
				width: <?php echo $cheeko_slider_options['cjs_width']; ?>px;
				height: <?php echo $cheeko_slider_options['cjs_height']; ?>px;
                margin: 30px auto;
			}
    	</style>
    <?php	
    }

    // Plugin Shortcode
    function cjs_shortcode(){
        ob_start();
        require_once ('includes/shortcode_slider.php');
        return ob_get_clean();
    }
}

// call the class
new Cheeko_jQuery_Slider();
