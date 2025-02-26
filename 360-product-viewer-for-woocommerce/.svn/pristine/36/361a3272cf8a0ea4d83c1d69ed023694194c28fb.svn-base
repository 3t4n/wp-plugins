<?php
namespace WP360view\Frontend;

use \WP360view\Helper\Wp360view_Loader;  

/**
 * Ajax functions
 *
 * @since      1.0.0
 *
 * @package    WP360view
 * @subpackage WP360view\Frontend
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} 
 
class Wp360view_Product_Detail {

	 
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

		$this->loader->add_action( 'wp_ajax_captcha_image',  $this, 'captcha_image', 9 );

		$this->loader->add_action( 'woocommerce_product_thumbnails',  $this, 'wp360view_templates', 12 );

		$this->loader->run(); 
		 
	}  
	
	/**
	* Single Page Template call function
	*
	* @since  1.0.0
	*/
	public function wp360view_templates() {
				
		global $product;

		$id = $product->get_id();

		$gallery_ids = get_post_meta( $id, '_wp360view_images',true );

		if ( ! empty( $gallery_ids )  ) {
			$gallery_ids = explode(',',$gallery_ids);
			$gallery_urls = array();
			foreach( $gallery_ids as $gallery_id ){
				$gallery_details = wp_get_attachment_image_src( $gallery_id ,'full' );
				$gallery_urls[] = wp_get_attachment_image_url( $gallery_id, 'full' );
			}
			$data_images = implode(',',$gallery_urls);
			$width = $gallery_details[1];
			$height = $gallery_details[2];
			
			$show_cursor_class = (get_option("showcursor") != "" && (trim(get_option("showcursor")) == "yes" || trim(get_option("showcursor")) == "1")) ? " enable-show-cursor" : "";
			
			if ( $product ) {				

				require_once( WP360VIEW_PLUGIN_DIR . 'templates/360-product.php' );
			}
		}		

	}
 
 
}
