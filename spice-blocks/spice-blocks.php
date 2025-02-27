<?php 
/**
* Plugin Name:          Spice Blocks
* Plugin URI:
* Description:          Spice Blocks Plugin is a block plugin that is compatible with all WordPress themes. In plugin block controls are given, that's help to develop a beautiful WordPress theme.
* Version:              0.3
* Requires at least:    5.3
* Requires PHP:         5.2
* Tested up to:         6.1.1
* Author:               Spicethemes
* Author URI:           https://spicethemes.com
* License:              GPLv2 or later
* License URI:          https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain:          spice-blocks
* Domain Path:          /languages
*/
if ( ! function_exists( 'sb_fs' ) ) {
    // Create a helper function for easy SDK access.
    function sb_fs() {
        global $sb_fs;

        if ( ! isset( $sb_fs ) ) {
            // Include Freemius SDK.
            require_once dirname(__FILE__) . '/freemius/start.php';

            $sb_fs = fs_dynamic_init( array(
                'id'                  => '11560',
                'slug'                => 'spice-blocks',
                'type'                => 'plugin',
                'public_key'          => 'pk_cc4dac906a3ad63fe8d670b7c85eb',
                'is_premium'          => false,
                'has_addons'          => false,
                'has_paid_plans'      => false,
                'menu'                => array(
                    'slug'           => 'spice-blocks',
                    'account'        => false,
                ),
            ) );
        }

        return $sb_fs;
    }

    // Init Freemius.
    sb_fs();
    // Signal that SDK was initiated.
    do_action( 'sb_fs_loaded' );
}

if( !defined( 'ABSPATH' ) ) {exit(); }
define('SPICE_BLOCKS_VERSION', 'self::VERSION');
define('SPICE_BLOCKS_PLUGIN_PATH',trailingslashit(plugin_dir_path(__FILE__)));
define('SPICE_BLOCKS_PLUGIN_URL',trailingslashit(plugins_url('/',__FILE__)));

add_action( 'admin_menu', 'spice_blocks_options_page',999 );
if(!function_exists('spice_blocks_options_page')){
    function spice_blocks_options_page() {
        add_menu_page(
            esc_html__( 'Spice Blocks', 'spice-blocks' ),
            esc_html__( 'Spice Blocks', 'spice-blocks' ),
            'manage_options',
            'spice-blocks',
            function() { require_once SPICE_BLOCKS_PLUGIN_PATH.'/admin/view.php'; },
            'dashicons-groups',
            20
        );
        add_submenu_page(
            'spice-blocks',
            esc_html__( 'Spice Blocks Panel', 'spice-blocks' ),
            esc_html__( 'Spice Blocks Panel', 'spice-blocks' ),
            'manage_options',
            'spice-blocks',
            function() { require_once SPICE_BLOCKS_PLUGIN_PATH.'/admin/view.php'; },
            1
        );
    }
}

//Enqueue Style & Script for admin

add_action('admin_enqueue_scripts','spice_blocks_style_script');

if(!function_exists('spice_blocks_style_script')){
    function spice_blocks_style_script(){
        $id = $GLOBALS['hook_suffix'];
        if('toplevel_page_spice-blocks'==$id){
            wp_enqueue_style( 'spice-blocks-about-css', SPICE_BLOCKS_PLUGIN_URL . 'admin/assets/css/about.css' );
            wp_enqueue_style( 'spice-blocks-all-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css');
        }
    }
}

final class Spice_Blocks{

    /** 
     * Construct Function
     */
    private  function __construct(){
        add_action('plugins_loaded',[$this,'init_plugin']);
    }

    /**
     * Singletone Instance
     */
    public static function init(){
        static $instance=false;
        if(!$instance){
            $instance=new self();
        }
        return $instance;
    }

    /**
     * Plugin Init
     */
    public function init_plugin(){
       $this->enqueue_scripts();
    }

    /**
     * Enqueue Script
     */
    public function enqueue_scripts(){
        add_action('enqueue_block_editor_assets',[$this,'register_block_editor_assets']);
        add_action('enqueue_block_assets',[$this,'register_block_assets']);
        add_action('admin_enqueue_scripts',[$this,'register_admin_scripts']);
        add_action('init',[$this,'register_block']);        
        add_action('init',[$this,'spice_blocks_load_plugin_textdomain']);
    }

    /**
     * Register Block Editor Assets
     */   
    public function register_block_editor_assets(){
        wp_enqueue_script(
            'prefix-spice-blocks',
            SPICE_BLOCKS_PLUGIN_URL.'/build/index.js',
            [
                'wp-blocks',
                'wp-editor',
                'wp-i18n',
                'wp-element',
                'wp-components',
                'wp-data',

            ]
        );
    }
    public function register_block_assets(){
        wp_enqueue_style(
            'spice-blocks-animate',
            SPICE_BLOCKS_PLUGIN_URL.'assets/css/animate.css'
        ); 
        wp_enqueue_script(
            'spice-blocks-fontawesome',
            SPICE_BLOCKS_PLUGIN_URL.'assets/js/fontawesome.js'
        );
        wp_enqueue_style(
           'spice-blocks-style',
           SPICE_BLOCKS_PLUGIN_URL.'assets/css/style.css',
           [],
           false,
           'all'
        );  
    }
    
    /**
     * Register Admin Scripts
     */   
    public function register_admin_scripts(){  

        wp_enqueue_script(
           'spice-blocks-editor-js',
           SPICE_BLOCKS_PLUGIN_URL.'assets/js/editor.js',
           array('jquery'),
           rand(),
           true
        );
        wp_localize_script('spice-blocks-editor-js','plugin',['pluginpath' => SPICE_BLOCKS_PLUGIN_URL ]);
        wp_enqueue_script('spice-blocks-editor-js');
         
        wp_enqueue_style(
           'spice-blocks-editor-css',
           SPICE_BLOCKS_PLUGIN_URL.'assets/css/editor.css',
           ['wp-edit-blocks'],
           false,
           'all'
        );
        wp_enqueue_style(
           'spice-blocks-fonticonpicker-material',
           SPICE_BLOCKS_PLUGIN_URL.'assets/css/fonticonpicker/fonticonpicker.material-theme.react.css',
           ['wp-edit-blocks'],
               false,
               'all'
        );
        wp_enqueue_style(
           'spice-blocks-fonticonpicker-base',
           SPICE_BLOCKS_PLUGIN_URL.'assets/css/fonticonpicker/fonticonpicker.base-theme.react.css',
           ['wp-edit-blocks'],
               false,
               'all'
        );  
    }


   /**
    * Register Blocks
    */
    public function register_block(){      
        register_block_type('spice-blocks/spice-heading',[
           'editor_style'=>'spice-blocks-editor-css',
        ]);

        register_block_type('spice-blocks/spice-text-editor',[
           'editor_style'=>'spice-blocks-editor-css',
        ]);

        register_block_type('spice-blocks/spice-divider',[
           'editor_style'=>'spice-blocks-editor-css',
        ]);

        register_block_type('spice-blocks/spice-spacer',[
           'editor_style'=>'spice-blocks-editor-css',
        ]);

        register_block_type('spice-blocks/spice-button',[
           'style'=> 'spice-blocks-public',
           'editor_style'=>'spice-blocks-editor',
        ]);

        register_block_type('spice-blocks/spice-icon',[
           'style'=> 'spice-blocks-public',
           'editor_style'=>'spice-blocks-editor',
        ]);

        register_block_type('spice-blocks/spice-section',[
           'style'=> 'wp-block-columns',
           'editor_style'=>'wp-block-columns-editor',
        ]); 

        register_block_type('spice-blocks/spice-image',[
           'style'=> 'wp-block-columns',
           'editor_style'=>'wp-block-columns-editor',
        ]);

        register_block_type('spice-blocks/spice-blockquote',[
           'style'=> 'wp-block-columns',
           'editor_style'=>'wp-block-columns-editor',
        ]);

        register_block_type('spice-blocks/spice-cta',[
           'style'=> 'wp-block-columns',
           'editor_style'=>'wp-block-columns-editor',
        ]);
         
    }

    /**
     * Load the localisation file.
     */
    public function spice_blocks_load_plugin_textdomain() {
        load_plugin_textdomain( 'spice-blocks', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
    }

}

/** 
 * Init
 */

function spice_blocks_run_plugin(){
   return Spice_Blocks::init();

}
spice_blocks_run_plugin();

//Add Category 
function spice_blocks_custom_block_category( $spice_blocks_categories ) {
    return array_merge(
        array(
            array(
                'slug' => 'spice-blocks',
                'title' => __( 'Spice Blocks', 'spice-blocks' ),
            ),
        ),
        $spice_blocks_categories
    );
}

if ( version_compare( get_bloginfo( 'version' ), '5.8', '>=' ) ) {
    add_filter( 'block_categories_all', 'spice_blocks_custom_block_category' );
} else {
    add_filter( 'block_categories', 'spice_blocks_custom_block_category', 10, 2 );
}