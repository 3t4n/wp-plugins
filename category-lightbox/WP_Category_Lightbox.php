<?php
/*
Plugin Name: WP Category Lightbox
Plugin URI:
Description: This plugin will replace the default category selection to lightbox category selection while writing/editing the post.
Version: 1.0
Author: Nitin kumar
Author URI: http://www.w3blog.in
*/

// include plugin abstract class
include_once ('WP_Plugin_Abstract_Class.php');

if (class_exists('WP_Plugin_Abstract_Class')) {

    class WP_Category_Lightbox extends WP_Plugin_Abstract_Class {


        public $shortname = "WP_cl_";
        public $plugin_dir = WP_PLUGIN_DIR;
        public $plugin_dir_url = WP_PLUGIN_URL;
        public $plugin_dir_name = "category-lightbox";
        public $plugin_source_url = "";
        public $plugin_source_path = "";

        public function __construct() {


            parent::__construct();

            ini_set("display_errors",1);

            // Initialize varables
            $this->init();

            // Init options & tables during activation & deregister init option
            //register_activation_hook( __FILE__, array(&$this, 'activate') );
            //register_deactivation_hook( __FILE__, array(&$this, 'deactivate') );

            // Register a uninstall hook to remove all tables & option automatic
            register_uninstall_hook( __FILE__, array(&$this, 'uninstall') );

            // call administrative hook to load plugin settings in administrative area
            add_action('admin_init', array(&$this,'admin_init_callback') );

            // Add admin ajax handler hook
            add_action('wp_ajax_Admin_Ajax_Handler', 'Admin_Ajax_Handler' );

            // add admin scripts
            add_action('admin_print_scripts', array(&$this,'add_admin_print_scripts') );



        }


        // Initialize varables
        function init() {

            $this->plugin_source_url = $this->plugin_dir_url."/".$this->plugin_dir_name."/";
            $this->plugin_source_path = $this->plugin_dir."/".$this->plugin_dir_name."/";

        }



        protected function activate() {



        }


        protected function deactivate() {



        }



        protected function uninstall() {




        }


        public function admin_init_callback() {

            // remove the existing categories meta box
            remove_meta_box( 'categorydiv' , 'post' , 'normal' );

            // add new meta box
            add_meta_box( $this->shortname.'_categorydiv', __( 'Categories', $this->shortname.'_categorydiv' ),  array(&$this, 'WP_cl_categories' ) , 'post', "side", 'high' );


        }
        

        public function WP_cl_categories() {

            include("category-popup.php");
        
        }



        public function add_admin_print_scripts() {


           
            wp_deregister_script( 'jquery' );
            wp_register_script( 'jquery', $this->plugin_source_url.'js/jquery-1.7.1.min.js');
            wp_enqueue_script( 'jquery' );
           
           //wp_enqueue_style("admin_css", $this->plugin_source_url."css/admin_css.css", false, "1.0", "all");
            wp_enqueue_script("admin_script", $this->plugin_source_url."js/admin_script.js", false, "1.0");


            
        }




    } // end class


    global $WP_Category_Lightbox;
    $WP_Category_Lightbox = new WP_Category_Lightbox();


    /*
     * Admin Ajax Handler
     * @author: Nitin kumar
     */

    function Admin_Ajax_Handler()
    {
            require_once( $WP_Category_Lightbox->plugin_source_path ."WP_Ajax_Class.php" );
            WP_Ajax_Class::To_Do($_REQUEST);
            die();
    }



}

?>
