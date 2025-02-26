<?php
namespace AETS_Base\Inc;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
class Shortcode{

    /**
     * Initialize the class for shortcode
     * To Enable shortcode for Anywhere Elementor Template by Shortcode for frontend. 
     * So that users can easily use shortcode to show Elementor Template in their posts/pages
     * 
     * Used hook in this method:
     * add_shortcode
     * wp_enqueue_scripts
     * 
     * @return void
     */
    public static function init() {
        /**
         * our supported atts
         * id
         * template_id
         */
        add_shortcode( 'AETS_Template', [__CLASS__, 'show_template'] );
        

        // Enqueue Elementor Styles
        add_action( 'wp_enqueue_scripts', [ __CLASS__, 'wp_enqueue_style' ] );   
    }
    
    /**
     * Show Elementor Template by ID
     * ****************************
     * Not only Elemtor Template, but also any post type
     * by POST_ID, using this shortcode
     * Shortcode is:
     * [AETS_Template id="POST_ID"] and
     * [Elementor_Anywhere id="POST_ID"]
     * 
     * @param array $atts
     * @return string
     */
    public static function show_template( $atts ) {
        if( empty( $atts['id'] ) ){
            return;
        }
        $pairs = array( 'exclude' => false );
        extract( shortcode_atts( $pairs, $atts ) );
        $post_id = (int) $atts['id'];
        
        if( ! $post_id ){
            $post_id = (int) $atts['template_id'];
        }
        if( ! $post_id ){
            $post_id = (int) $atts['post_id'];
        }
        if( ! $post_id ){
            return;
        }

        $post_status = get_post_status( $post_id );
        if( 'publish' !== $post_status ) return;
        
        (int) $select_post_id = $post_id;
        if ( \Elementor\Plugin::instance()->documents->get( $select_post_id ) ) {
            if ( class_exists( '\Elementor\Core\Files\CSS\Post' ) ) {
                $css_file = new \Elementor\Core\Files\CSS\Post( $select_post_id );
            } elseif ( class_exists( '\Elementor\Post_CSS_File' ) ) {
                // Load elementor styles.
                $css_file = new \Elementor\Post_CSS_File( $select_post_id );
            }
            
            if(isset($css_file)){
                $css_file->enqueue();
            }
            return \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $select_post_id );
        }
        return;
    }

    /**
     * Include Elementor Styles, when shortcoded in the page
     * Otherwise, page will not load the styles properly
     * That's why we need to include the styles
     * 
     * @author Saiful Islam <codersaiful@gmail.com>
     *
     * @return void
     */
    public static function wp_enqueue_style() {
        $elementor = \Elementor\Plugin::instance();
        $elementor->frontend->enqueue_styles();
        
		

		if ( class_exists( '\ElementorPro\Plugin' ) ) {
			$elementor_pro = \ElementorPro\Plugin::instance();
            if(method_exists($elementor_pro, 'enqueue_styles')){
                $elementor_pro->enqueue_styles();
            }
		}
        
    }
}