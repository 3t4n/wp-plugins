<?php
namespace ShopCred;

if ( ! defined( 'ABSPATH' ) ) exit;

/**
* Woo_Quickview_Data
*/
class Woo_Quickview_Data {

    /**
     * [$instance]
     * @var null
     */
    private static $instance   = null;

    /**
     * [$product_id]
     * @var null
     */
    private static $product_id = null;

    /**
     * [instance] Initializes a singleton instance
     * @return [Assets_Management]
     */
    public static function instance() {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * [__construct] Class Constructor
     */
    public function __construct(){
        add_action( 'init', [ $this, 'on_init'] );

        add_action( 'wp_ajax_spc_quickview', [ $this, 'spc_quickview' ] );
        add_action( 'wp_ajax_nopriv_spc_quickview', [ $this, 'spc_quickview' ] );

        add_action( 'wp_footer', [ $this, 'quick_view_html'] );
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
        add_action( 'enqueue_block_editor_assets', [ $this, 'enqueue_scripts' ] );

    }

    /**
     * [on_init] Initialize Function
     * @return [void]
     */
    public function on_init(){
        add_filter( 'body_class', [ $this, 'body_class' ] );
    }

    /**
     * [body_class] Body Classes
     * @param  [type] $classes String
     * @return [void] 
     */
    public function body_class( $classes ){
        $post_type = get_post_type();
       
            $classes[] = 'woocommerce';
            $classes[] = 'woocommerce-page';
            $classes[] = 'spc-woocommerce-builder';
        
        return $classes;
    }

    // Open Quick view Ajax Callback
    public function spc_quickview( ) {
        
        if ( isset( $_POST['id'] ) && (int) $_POST['id'] ) {
            global $post, $product, $woocommerce;
            $id      = ( int ) $_POST['id'];
            $post    = get_post( $id );
            $product = get_product( $id );
           
            if ( $product ) {

                include base_init()->plugin_path( 'includes/templates/tmpl-quick-view.php' ); ?>
            
                <?php
            }
        }
        wp_die();

    }

    // Quick View Markup
    public function quick_view_html(){
        echo '<div class="woocommerce" id="spc-viewmodal"><div class="spc-modal-loading"><div class="spc-loader"></div></div><div class="spc-modal-quickview-dialog product"><div class="spc-modal-quickview-contentt"><button type="button" class="spc-close-btn"><span class="spc-close-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button><div class="spc-modal-quickview-body"></div></div></div></div>';
    }

   public function enqueue_scripts() {
    // In preview mode it's not a real Product page - enqueue manually.

        global $product;

        if ( is_singular( 'product' ) ) {
            $product = wc_get_product();
        }

        if ( current_theme_supports( 'wc-product-gallery-zoom' ) ) {
            wp_enqueue_script( 'zoom' );
        }
        if ( current_theme_supports( 'wc-product-gallery-slider' ) ) {
            wp_enqueue_script( 'flexslider' );
        }
        if ( current_theme_supports( 'wc-product-gallery-lightbox' ) ) {
            wp_enqueue_script( 'photoswipe-ui-default' );
            wp_enqueue_style( 'photoswipe-default-skin' );
            add_action( 'wp_footer', 'woocommerce_photoswipe' );
        }
        wp_enqueue_script( 'wc-single-product' );

        wp_enqueue_style( 'photoswipe' );
        wp_enqueue_style( 'photoswipe-default-skin' );
        wp_enqueue_style( 'photoswipe-default-skin' );
        wp_enqueue_style( 'woocommerce_prettyPhoto_css' );

    }
    
}
Woo_Quickview_Data::instance();