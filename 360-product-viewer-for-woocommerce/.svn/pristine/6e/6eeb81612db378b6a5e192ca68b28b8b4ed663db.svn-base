<?php
namespace WP360view\Frontend;

use \WP360view\Helper\Wp360view_Loader;  

/**
 * Shortcode functions
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
 
class Wp360view_Shortcode {
	 
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
		
		$this->loader->add_shortcode( 'wp360view',  $this, 'wp360view_shortcode'  );

		$this->loader->run(); 
		 
	}  

	/**
	* Print Custom Shortcode
	*
	* @since  1.0.0
	*/
	public static function wp360view_shortcode($atts) {

		
		 // Get default values from global configuration
		 $navigation = get_option("navigation"); 
		 $playspeed = get_option("playspeed"); 
		 $framerate = get_option("framerate"); 
		 $enablespin = get_option("enablespin"); 
		 $showcursor = get_option("showcursor"); 
		 $fullscreen = get_option("fullscreen");     
		 $zoominout = get_option("zoominout");     
		 $drag = get_option("drag");     
		 
		 
		// Reset shortcode params with default values if not passed
		$product_data = shortcode_atts(array(
			'product_id' => 0,
			'navigation' => ($navigation != "" && (trim($navigation) == "yes" || trim($navigation) =="1")) ? true : false,
			'enablespin' => ($enablespin != "" && (trim($enablespin) == "yes" || trim($enablespin) == "1")) ? true : false,
			'showcursor' => ($showcursor != "" && (trim($showcursor) == "yes" || trim($showcursor) == "1")) ? true : false,
			'fullscreen' => ($fullscreen != "" && (trim($fullscreen) == "yes" || trim($fullscreen) == "1")) ? true : false, 
			'zoominout' => ($zoominout != "" && (trim($zoominout) == "yes" || trim($zoominout) == "1") ) ? true : false, 
			'drag' => ($drag != "" && (trim($drag) == "yes" || trim($drag) == "1") ) ? true : false, 
			'playspeed' => (trim($playspeed) != "" && intval($playspeed) > 0) ? intval($playspeed) : 100,
			'framerate' => (trim($framerate) != "" && intval($framerate) > 0) ? intval($framerate) : 10, 
		), $atts); 

		// Check if product id set or not 
		if(isset($product_data["product_id"]) && !empty($product_data["product_id"])) {
			 
			// Load product from product id
			$product = wc_get_product( $product_data["product_id"] );  

			// Get gallery images for 360 view
			$gallery_ids = get_post_meta( $product_data["product_id"], '_wp360view_images',true );
			 
			 
			// Set images data with template
			if ( ! empty( $gallery_ids )  ) {

				$gallery_ids = explode(',',$gallery_ids);
				$gallery_urls = array();
				foreach( $gallery_ids as $gallery_id ){
					$gallery_details = wp_get_attachment_image_src( $gallery_id ,'full' );
					$gallery_urls[] = wp_get_attachment_image_url( $gallery_id, 'full' );
				}				

				// Load shortcode template with data
				ob_start();  
				include( WP360VIEW_PLUGIN_DIR . 'templates/shortcode-template.php' ); 
				$output = ob_get_contents();
				ob_end_clean();
				return $output;
			}		

		}

	}
 
 
}
