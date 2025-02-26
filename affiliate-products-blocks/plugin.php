<?php
/**
 * Plugin Name:       Affiliaterg - Affiliate Products Review Blocks
 * Description:       A collection of custom Gutenberg blocks for Affiliate Products Review.
 * Requires at least: 5.7
 * Requires PHP:      7.0
 * Version:           2.0.1
 * Author:            WPCenter
 * Author URI:        https://wpcenter.io
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       affiliaterg
 *
 * @package           @wordpress/create-block
 */

/**
 * @package Zero Configuration with @wordpress/create-block
 *  [affiliaterg] && [AFFILIATERG] ===> Prefix
 */

// Stop Direct Access 
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// admin file 
require_once plugin_dir_path( __FILE__ ) . 'admin/admin.php';

/**
 * Blocks Final Class
 */

final class AFFILIATERG_BLOCKS_CLASS {
    public function __construct() {

        // define constants
        $this->affiliaterg_define_constants();

        // block initialization
        add_action( 'init', [ $this, 'affiliaterg_blocks_init' ] );

        // blocks category
        if( version_compare( $GLOBALS['wp_version'], '5.7', '<' ) ) {
            add_filter( 'block_categories', [ $this, 'affiliaterg_register_block_category' ], 10, 2 );
        } else {
            add_filter( 'block_categories_all', [ $this, 'affiliaterg_register_block_category' ], 10, 2 );
        }

        // enqueue block assets
        add_action( 'enqueue_block_assets', [ $this, 'affiliaterg_external_libraries' ] );
    }

    /**
     * Initialize the plugin
     */

    public static function init(){
        static $instance = false;
        if( ! $instance ) {
            $instance = new self();
        }
        return $instance;
    }

    /**
     * Define the plugin constants
     */
    private function affiliaterg_define_constants() {
        define( 'AFFILIATERG_VERSION', '2.0.0' );
        define( 'AFFILIATERG_URL', plugin_dir_url( __FILE__ ) );
        define( 'AFFILIATERG_LIB_URL', AFFILIATERG_URL . 'utilities/' );
    }

    /**
     * Blocks Registration
     */

    public function affiliaterg_register_block( $name, $options = array() ) {
        register_block_type( __DIR__ . '/build/' . $name, $options );
    }

    // render inline css
    public function affiliaterg_render_inline_css( $handle, $css ) {
        wp_register_style( $handle, false );
        wp_enqueue_style( $handle );
        wp_add_inline_style( $handle, $css );
    }

    /**
     * Blocks Initialization
     */
    public function affiliaterg_blocks_init() {
        // register single block
        $this->affiliaterg_register_block( 'button', array(
            'render_callback' => [ $this, 'affiliaterg_button_render' ],
        ) );
        $this->affiliaterg_register_block( 'props-cons', array(
            'render_callback' => [ $this, 'affiliaterg_props_cons_render' ],
        ));
        $this->affiliaterg_register_block( 'review-list', array(
            'render_callback' => [ $this, 'affiliaterg_review_list_render' ],
        ));
        $this->affiliaterg_register_block( 'review-style-one', array(
            'render_callback' => [ $this, 'affiliaterg_review_style_one_render' ],
        ));
        $this->affiliaterg_register_block( 'review-style-two', array(
            'render_callback' => [ $this, 'affiliaterg_review_style_two_render' ],
        ));
        $this->affiliaterg_register_block( 'list-table', array(
            'render_callback' => [ $this, 'affiliaterg_review_table_render' ]
        ) );
    }

    // button block 
    public function affiliaterg_button_render($attributes, $content){
        if(! is_admin(  )){
            $handle = 'afpb-'.$attributes['uniqueId'];
            $custom_css = '';
            // desktop css
            $custom_css .= '.afpb__btn_'.$attributes['uniqueId'].':hover { color: '.$attributes['hoverColor'].' !important; background-color: '.$attributes['hoverBgColor'].'!important; border-color: '.$attributes['hoverBorderColor'].'!important; }';
            $this->affiliaterg_render_inline_css( $handle, $custom_css );
        }
        return $content;
    }

    // props cons block 
    public function affiliaterg_props_cons_render($attributes, $content){
        if(! is_admin(  )){
            $handle = 'afpb-'.$attributes['uniqueId'];
            $custom_css = '';
            // desktop css
            $custom_css .= '#afpb__props_'.$attributes['uniqueId'].' li:before { color: '.$attributes['propsIconColor'].' !important;}';
            $custom_css .= '#afpb__cons_'.$attributes['uniqueId'].' li:before { color: '.$attributes['consIconColor'].' !important;}';
            $this->affiliaterg_render_inline_css( $handle, $custom_css );
        }
        return $content;
    }

    // review block #1
    public function affiliaterg_review_style_one_render($attributes, $content){
        if(! is_admin(  )){
            $handle = 'afpb-'.$attributes['uniqueId'];
            $custom_css = '';
            $custom_css .= '.afpb__btn_'.$attributes['uniqueId'].':hover { color: '.$attributes['hoverColor'].' !important; background-color: '.$attributes['hoverBgColor'].'!important; border-color: '.$attributes['hoverBorderColor'].'!important; }';
            $custom_css .= '#afpb__props_'.$attributes['uniqueId'].' li:before { color: '.$attributes['propsIconColor'].' !important;}';
            $custom_css .= '#afpb__cons_'.$attributes['uniqueId'].' li:before { color: '.$attributes['consIconColor'].' !important;}';
            $this->affiliaterg_render_inline_css( $handle, $custom_css );
        }
        return $content;
    }

    // review block #2
    public function affiliaterg_review_style_two_render($attributes, $content){
        if(! is_admin(  )){
            $handle = 'afpb-'.$attributes['uniqueId'];
            $custom_css = '';
            $custom_css .= '.afpb__btn_'.$attributes['uniqueId'].':hover { color: '.$attributes['hoverColor'].' !important; background-color: '.$attributes['hoverBgColor'].'!important; border-color: '.$attributes['hoverBorderColor'].'!important; }';
            $custom_css .= '#afpb__props_'.$attributes['uniqueId'].' li:before { color: '.$attributes['propsIconColor'].' !important;}';
            $custom_css .= '#afpb__cons_'.$attributes['uniqueId'].' li:before { color: '.$attributes['consIconColor'].' !important;}';
            $this->affiliaterg_render_inline_css( $handle, $custom_css );
        }
        return $content;
    }

    // list review block
    public function affiliaterg_review_list_render($attributes, $content){
        if(! is_admin(  )){
            $handle = 'afpb-'.$attributes['uniqueId'];
            $custom_css = '';
            $custom_css .= '.afpb__btn_'.$attributes['uniqueId'].':hover { color: '.$attributes['hoverColor'].' !important; background-color: '.$attributes['hoverBgColor'].'!important; border-color: '.$attributes['hoverBorderColor'].'!important; }';
            $custom_css .= '#afpb__props_'.$attributes['uniqueId'].' li:before { color: '.$attributes['propsIconColor'].' !important;}';
            $this->affiliaterg_render_inline_css( $handle, $custom_css );
        }
        return $content;
    }

    // list table block
    public function affiliaterg_review_table_render($attributes, $content){
        if(! is_admin(  )){
            $handle = 'afpb-'.$attributes['uniqueId'];
            $custom_css = '';
            $custom_css .= '.afpb__table_'.$attributes['uniqueId'].' .wp-block-afpb-list-item { border-bottom: '.$attributes['boxBorder']['width'].' '.$attributes['boxBorder']['style'].' '.$attributes['boxBorder']['color'].' !important;}';
            $this->affiliaterg_render_inline_css( $handle, $custom_css );
        }
        return $content;
    }

    /**
     * Register Block Category
     */

    public function affiliaterg_register_block_category( $categories, $post ) {
        return array_merge(
            array(
                array(
                    'slug'  => 'affiliaterg',
                    'title' => __( 'Affiliaterg Blocks', 'affiliaterg' ),
                ),
            ),
            $categories,
        );
    }

    /**
     * Enqueue Block Assets
     */
    public function affiliaterg_external_libraries() {
        // admin editor css
        if( is_admin() ) {
            wp_enqueue_style( 'afpb-admin-editor-css', AFFILIATERG_LIB_URL . 'editor/editor.css', array(), AFFILIATERG_VERSION, 'all' );
        }
        // font awesome css
        wp_enqueue_style( 'afpb-font-awesome-css', AFFILIATERG_LIB_URL . 'assets/css/all.min.css', array(), AFFILIATERG_VERSION, 'all' );

        // enqueue JS
        wp_enqueue_script( 'afpb-rater-js', AFFILIATERG_LIB_URL . 'assets/js/rater.min.js', array('jquery'), AFFILIATERG_VERSION, true );
        wp_enqueue_script( 'afpb-plugin-js', AFFILIATERG_LIB_URL . 'assets/js/plugin.js', array('jquery'), AFFILIATERG_VERSION, true );
    }

}

/**
 * Kickoff
 */

AFFILIATERG_BLOCKS_CLASS::init();
