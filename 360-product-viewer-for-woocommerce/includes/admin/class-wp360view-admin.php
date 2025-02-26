<?php
namespace WP360view\Admin;

use \WP360view\Config\Wp360view_Config; 
use \WP360view\Helper\Wp360view_Loader; 
use \WP360view\Admin\WP360view_Settings;

/**
 * The admin-specific code functionality of the plugin. 
 *
 * @since      1.0.0
 *
 * @package    WP360view
 * @subpackage WP360view\Admin
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Wp360view_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name = Wp360view_Config::PLUGIN_NAME;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version = Wp360view_Config::PLUGIN_VERSION; 

	/**
	 * Filter and actions of the plugin
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Wp360view_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	public $loader;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0 
	 */
	public function __construct() {

		// Initialize object for actions and filters hooks

		$this->loader = new Wp360view_Loader();
		
		//$this->loader->add_action( 'wp_enqueue_scripts',  $this, 'enqueue_styles' );
		
		$this->loader->add_action( 'admin_enqueue_scripts',  $this, 'wp360view_admin_enqueue_styles' );
		//$this->loader->add_filter( 'woocommerce_locate_template',  $this, 'woo_adon_plugin_template', 1, 3 ); 

		$this->loader->add_action( 'add_meta_boxes', $this, 'wp360view_meta_boxes' );

		$this->loader->add_action( 'woocommerce_process_product_meta', $this, 'wp360view_meta_boxes_save' );
 	
		$this->loader->run(); 

		// Apply New Tab on Woocommerce Settings
		add_filter( 'woocommerce_get_settings_pages', array( $this, 'wp360view_settings_tab' ) );

	} 

	/**
	 * Register the stylesheets  
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() { 

		wp_enqueue_style( $this->plugin_name, WP360VIEW_PLUGIN_URL . 'css/custom.css', array(), $this->version, 'all' );
		 		
	}

	/**
	 * Register the js
	 *
	 * @since    1.0.0
	 */
	public function wp360view_admin_enqueue_styles() { 

		 wp_enqueue_script( $this->plugin_name."_script", WP360VIEW_PLUGIN_URL . 'js/360-custom-admin.js', array( 'jquery' ), $this->version, true );

	}

	/**
	 * Add Meta boxes
	 *
	 * @since    1.0.0
	 */
	public function wp360view_meta_boxes() {

		add_meta_box( 'wp360view-image', esc_html__( '360 Product image', 'wp360view' ), array( $this, 'wp360view_image_content' ), 'product', 'side', 'low' );

   	}

	/**
	 * Meta box function
	 *
	 * @since    1.0.0
	 */
	public function wp360view_image_content( $post ) {
		?>
            <div id="wp360-product-container">
                <ul class="wp360-product-images-wrap">
                    <?php			                    
					$product_image_gallery = get_post_meta( $post->ID, '_wp360view_images', true );									

                    $attachments         = explode(',',$product_image_gallery);
                    $update_meta         = false;
                    $updated_gallery_ids = array();                    

                    if ( ! empty( $attachments ) ) {
                        foreach ( $attachments as $attachment_id ) {
                            $attachment = wp_get_attachment_image( $attachment_id, 'thumbnail' );

                            // if attachment is empty skip.
                            if ( empty( $attachment ) ) {								
                                $update_meta = true;
                                continue;
                            }

                            echo '<li class="image" data-attachment_id="' . esc_attr( $attachment_id ) . '">
                                    ' . $attachment . '
                                    <ul class="actions">
                                        <li><a href="#" class="delete tips" data-tip="' . esc_attr__( 'Delete image', 'wp360view' ) . '">' . esc_html__( 'Delete', 'wp360view' ) . '</a></li>
                                    </ul>
                                </li>';

                            // rebuild ids to be saved.
                            $updated_gallery_ids[] = $attachment_id;
                        }

                        // need to update product meta to set new gallery ids
                        if ( $update_meta ) {
                            update_post_meta( $post->ID, '_wp360view_images', implode( ',', $updated_gallery_ids ) );
                        }
                    }
                    ?>
                </ul>

                <input type="hidden" id="wp360view_gallery" name="wp360view_gallery" value="<?php echo esc_attr( implode( ',', $updated_gallery_ids ) ); ?>" />

            </div>
            <p class="add_product_360_images hide-if-no-js">                
				<a href="javascript:void(0)" data-choose="<?php esc_attr_e( 'Add 360 Product images', 'wp360view' ); ?>" data-update="<?php esc_attr_e( 'Add to 360 Product gallery', 'wp360view' ); ?>" data-delete="<?php esc_attr_e( 'Delete 360 Product image', 'wp360view' ); ?>" data-text="<?php esc_attr_e( 'Delete', 'wp360view' ); ?>"><?php esc_html_e( 'Add 360 product images', 'wp360view' ); ?></a>
            </p>
			<p class="add_product_360_images shortcode-wrap">
				<strong>
					<?php echo esc_attr__( 'Shortcode Example', 'wp360view' ); ?>
				</strong>
			</p>
			<pre class="shortcode-content"><code>[wp360view product_id = <?php echo esc_html( $post->ID ); ?>]</pre></code>
        <?php
	}

	public function wp360view_meta_boxes_save( $post_id ) {

		// 360 Images gallery save
		$old_360_images = get_post_meta( $post_id, '_wp360view_images', true );
		$new_360_images = ! empty( $_POST['wp360view_gallery'] ) ? sanitize_text_field( $_POST['wp360view_gallery'] ) : '';

		if ( ! empty( $new_360_images ) && $new_360_images != $old_360_images ){
			update_post_meta( $post_id, '_wp360view_images', $new_360_images);
		} elseif ( empty( $new_360_images ) && $old_360_images) {
			delete_post_meta( $post_id, '_wp360view_images', $old_360_images);
		}
	}

	/**
	 * Add tab to WooCommerce Settings tabs.
	 *
	 * @param  array $settings
	 * @return array $settings
	*/
	public static function wp360view_settings_tab( $settings ) {
		
		$settings[] = new WP360view_Settings();
		return $settings;
	}

}