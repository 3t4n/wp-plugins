<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Plugin Name: Miinto Feed Generator
 * Plugin URI: http://therightsw.com/
 * Description: Miinto Feed Generator is a WooCommerce plugin used to download product information in TSV format for Miinto feeds. This is only for simple products.
 * Version: 1.1
 * Author: therightsw
 * Author URI: http://therightsw.com/contact/
 * Tested up to: 6.7.1
 * License: GPL2
 */

/*
|---------------------------------------------------------------------------
| CHECK CLASS EXISTS OR NOT
|---------------------------------------------------------------------------
*/
if ( ! class_exists( 'Mfp_Miinto_Feeds' ) ) {

    /*
    |---------------------------------------------------------------------------
    | START PLUGIN CLASS NAME Miinto Feeds
    |---------------------------------------------------------------------------
    */
    class Mfp_Miinto_Feeds {

        public function __construct() {
            /*
            |---------------------------------------------------------------------------
            | APPLY ACTIONS & FILTERS IF WOOCOMMERCE IS ACTIVE
            |---------------------------------------------------------------------------
            */
            add_action( 'add_meta_boxes', array( $this, 'Mfp_Miinto_Feed_Meta' ) );
            add_action( 'save_post', array( $this, 'Mfp_Save_Miintofeeds_Data' ) );
            add_action( 'admin_menu', array( $this, 'Mfp_Miinto_Feeds_Menu' ) );
        }

        /*
        |---------------------------------------------------------------------------
        | START PLUGIN FUNCTIONS
        |---------------------------------------------------------------------------
        */
        // Adding Submenu page in WooCommerce menu
        public function Mfp_Miinto_Feeds_Menu() {
            add_submenu_page(
                'woocommerce',
                'Miinto Feeds',
                'Miinto Feeds',
                'manage_options',
                'mfp_miinto_feed',
                array( $this, 'Mfp_Miinto_Feed' )
            );
        }

        public function Mfp_Save_Miintofeeds_Data( $post_id ) {
            // Verify nonce before saving data
            if ( ! isset( $_POST['mfp_miinto_feed_nonce'] ) || ! wp_verify_nonce( wp_unslash( $_POST['mfp_miinto_feed_nonce'] ), 'mfp_miinto_feed_nonce_action' ) ) {
                return; // Exit if nonce verification fails
            }
        
            // Proceed with saving the data if nonce is valid
            $post_info = $_POST;
            $color = isset( $post_info['color'] ) ? sanitize_text_field( wp_unslash( $post_info['color'] ) ) : '';
            $size = isset( $post_info['size'] ) ? sanitize_text_field( wp_unslash( $post_info['size'] ) ) : '';
        
            $trs_miintofeed_attributes = array( $size, $color );
            update_post_meta( $post_id, 'mfp_miinto_feed', $trs_miintofeed_attributes );
        }
        
        public function Mfp_Miinto_Feed_Meta( $post_type ) {
            if ( in_array( $post_type, array( 'product' ) ) ) {
                add_meta_box(
                    'mpf_miinto_meta_box',
                    'Add Size and Color',
                    array( $this, 'Mfp_Miintofeeds_Meta_Box_Content' ),
                    'product',
                    'side',
                    'default'
                );
            }
        }

        public function Mfp_Miintofeeds_Meta_Box_Content() {
            global $post_id;
        
            // Use get_posts() instead of a direct $wpdb query
            $args = array(
                'post_parent' => $post_id,
                'post_type'   => 'product_variation',
                'posts_per_page' => -1, // Get all variations
                'fields' => 'ids' // Only fetch IDs
            );
        
            // Fetch product variations for the current product
            $trs_meta_val = get_posts( $args );
        
            $trs_prod_color = '';
            $trs_prod_size = '';
        
            if ( empty( $trs_meta_val ) ) {
                $trscustom_val = get_post_meta( $post_id, 'mfp_miinto_feed', true );
        
                if ( ! empty( $trscustom_val ) ) {
                    $trs_prod_color = esc_html( $trscustom_val[0] );
                    $trs_prod_size = esc_html( $trscustom_val[1] );
                }
                ?>
                <label for="color">Color:</label>
                <input type="text" id="color" name="color" style="width:6em;" placeholder="color" value="<?php echo esc_attr( $trs_prod_color ); ?>">
                <label for="size">Size:</label>
                <input type="text" id="size" name="size" style="width:6em;" placeholder="size" value="<?php echo esc_attr( $trs_prod_size ); ?>">
                <?php
            }
        }
        
        public function Mfp_Miinto_Feed() {
            include( plugin_dir_path( __FILE__ ) . 'admin/mfp-create-feed.php' );
            $plugin_data = get_plugin_data( plugin_dir_path( __FILE__ ) . "mfp-miinto-feeds.php" );
            ?>
            <style>
                .rating span:before {
                    content: "\2605";
                    position: absolute;
                    text-decoration: underline;
                }
            </style>
            <div>
                Note: Contact Us for Variable and Composite Products Miinto Feeds Plugin
            </div>
            <div class='content-down'>
                <div style="float:left;">
                    Developed by <a href="<?php echo esc_url( $plugin_data["PluginURI"] ); ?>" style="text-decoration: none;" target="_blank">The Right Software</a>
                    <span>|</span>
                    <a href="<?php echo esc_url( $plugin_data["AuthorURI"] ); ?>" style="text-decoration: none;" target="_blank">Contact Support</a>
                </div>
                <div style="float:right;">
                    Give us a Review <a href="link" style="text-decoration: none;" class='rating' target="_blank">
                    <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span></a> | TRS-MF <?php echo esc_html( $plugin_data["Version"] ); ?>
                </div>
            </div>
            <?php
        }
    } /* Class End */
} // Class exists check end

$mfp_miinto_feed = new Mfp_Miinto_Feeds();
