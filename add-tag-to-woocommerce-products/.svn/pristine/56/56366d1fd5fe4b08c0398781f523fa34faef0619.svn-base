<?php

/**

 * Register all actions and filters for the plugin

 *

 * @since      1.0.0

 *

 * @package    WC_Tag_Product

 * @subpackage wc_tag_on_products/classes

 */



/**

 * Register all actions and filters for the plugin.

 *

 * Maintain a list of all hooks that are registered throughout

 * the plugin, and register them with the WordPress API. Call the

 * run function to execute the list of actions and filters.

 *

 * @package    WC_Tag_Product

 * @subpackage wc_tag_on_products/classes

 * @author     Junaid <junaidali.it@gmail.com>

 */

if(!defined( 'ABSPATH' )) exit;

/**
 * Wc_Tag_On_Products class.
 */

class Wc_Tag_On_Products {


    protected $loader;

    protected $plugin_name;

    protected $version;
    

    /**
     * __construct function.
     */
    function __construct() {

        $this->plugin_name = 'Custom Tag On Products';
        $this->version = '1.0.0';


        $this->load_dependencies();
        $this->define_admin_hooks();
        $this->define_public_hooks();

    }

    private function load_dependencies() {


  

        /**
         * The class responsible for orchestrating the actions and filters of the
         * core plugin.
         */

        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'classes/wc_tag_on_products_loader.php';

        /**
         * The class responsible for defining all actions that occur in the admin area.
         */

        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/wc_tag_on_products_admin.php';

        /**
         * The class responsible for defining all actions that occur in the public-facing
         * side of the site.
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/wc_tag_on_products_public.php';


        $this->loader = new Wc_Tag_On_Products_Loader();

    }



    /**
     * menu function.
     */

    private function define_admin_hooks() {
        $plugin_admin = new Wc_Tag_On_Products_Admin( $this->get_plugin_name(), $this->get_version() );
         
         $this->loader->add_action( 'admin_menu', $plugin_admin, 'add_plugin_admin_menu' );
         $this->loader->add_action( 'admin_action_wpse10500',$plugin_admin, 'wpse10500_admin_action' );
    }


    private function define_public_hooks() {

        $plugin_public = new Wc_Tag_On_Products_Public( $this->get_plugin_name(), $this->get_version() );

        $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );

        $this->loader->add_action( 'woocommerce_before_shop_loop_item_title', $plugin_public, 'add_text_above_wc_shop_image');


    }





    public function run() {
            $this->loader->run();
    }

    public function get_plugin_name() {
        return $this->plugin_name;
    }

    public function get_version() {
        return $this->version;
    }



}