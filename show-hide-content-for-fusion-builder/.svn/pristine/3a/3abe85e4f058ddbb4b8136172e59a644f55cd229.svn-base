<?php 
/**
 * Class Show_Hide_Content_Fusion_Builder
 * 
 * @package show_hide_content_fusion_builder
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
   exit; // Exit if accessed directly.
}


if ( ! class_exists( 'Show_Hide_Content_Fusion_Builder' ) ) {
   /**
    * Show Hide content class.
    *
    * @package show_hide_content_fusion_builder
    * @since 1.0.0
    */
   class Show_Hide_Content_Fusion_Builder {

      /**
       * Member Variable
       *
       * @var object instance
      */
      private static $instance;


      /**
       * Returns the *Singleton* instance of this class.
       * 
       * @since 1.0.0
       * @return Singleton The *Singleton* instance.
      */
      public static function get_instance() {
         if ( null === self::$instance ) {
             self::$instance = new self();
         }
         return self::$instance;
      }

      /**
       * Constructor.
       *
       * @access public
       * @since 1.0.0
       */
      public function __construct() {
         
        //add_action for register JS/CSS
        add_action( 'wp_enqueue_scripts', array( $this, 'register_scripts' ) );

        add_filter( 'the_content', array( $this, 'shcfb_the_content_more_btn' ), 1 );
        add_action( 'fusion_builder_before_init', array( $this, 'shcfb_more_btn_element' ) );

      }

    /**
     * Register CSS and JS files
     *
     * @since 1.0.0
     * @return void
     */
    public function register_scripts() {

    // Custom Style
    wp_register_style( 'shcfb_style', plugins_url( 'assets/css/shcfb.css', SHCFB_PLUGIN_FILE ) );

    // Custom JS
    wp_register_script( 'shcfb_script',  plugins_url( 'assets/js/shcfb.js', SHCFB_PLUGIN_FILE ), array( 'jquery' ), SHCFB_PLUGIN_VERSION, true );
    }

      /**
       * More Tag Element.
       *
       * @access public
       * @since 1.0.0
       * @return void
       */
      public function shcfb_more_btn_element() {

         fusion_builder_map( 
             array(
                 'name'            => esc_attr__( 'More Tag', 'show-hide-content-fusion-builder' ),
                 'shortcode'       => 'SHCFB_MORE_TAG',
                 'icon'            => 'fusiona-ellipsis',
                 'preview_id'      => 'fusion-builder-block-module-text-preview-template',
                 'allow_generator' => true,
                 'params'          => array(
                     array(
                        'type'        => 'textfield',
                        'heading'     => esc_attr__( 'More Button Text', 'show-hide-content-fusion-builder' ),
                        'param_name'  => 'element_content',
                        'value'       => esc_attr__( 'View More', 'show-hide-content-fusion-builder' ),
                        'description' => esc_attr__( 'Add the text that will display on more button.', 'show-hide-content-fusion-builder' ),
                     )
                 ),
             ) 
         );
      }

      /**
       * More Tag Element.
       *
       * @access public
       * @param  array  $content  
       * @since 1.0.0
       * @return html
       */
      public function shcfb_the_content_more_btn( $content ) {

        /* Enqueue CSS files */
        wp_enqueue_style( 'shcfb_style' );

        /* Enqueue JS files */
        wp_enqueue_script( 'shcfb_script' );

         global $post;

         if( preg_match( '/(\[SHCFB_MORE_TAG\])(.*)(\[\/SHCFB_MORE_TAG\])/', $content, $matches ) ) {
    
            $more_link_text = ( isset( $matches[2] ) && !empty( $matches[2] ) ) ? $matches[2] : esc_attr__( 'Read More' );
            
            $content = explode( $matches[0], $content, 2 );

            if ( ! empty( $matches[0] ) && ! empty( $content[0] ) ) {
               $has_teaser = true;
               $teaser = $content[0];
            } else {
               $has_teaser = false;
               $content = array( $content );
            }

            $output = $teaser;
            if ( count( $content ) > 1 ) {

               // Add View more button using apply_filters hook. 
               $output .= apply_filters( 'shcfb_content_more_link', ' <div data-target="shcfb-more-content-'. $post->ID .'"  id="shcfb-more-link-'. $post->ID .'" class="shcfb-more-link shcfb-text-center"><a class="fusion-button button-flat fusion-button-round button-large button-default button-1" href="javascript:void(0);">'. $more_link_text .'</a></div>' );

               //After readmore content
               $output .= '<div id="shcfb-more-content-'. $post->ID .'" class="shcfb-more-content" style="display: none;">'. $content[1] .'</div>';

            } else {
                //without readmore content
               $output = $content[0];
            }
            return $output;
         } else {
            return $content;
         }

      }

   }

   /**
    * Calling class using 'get_instance()' method
    */
   Show_Hide_Content_Fusion_Builder::get_instance();

}

