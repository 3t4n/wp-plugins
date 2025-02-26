<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/**
 * Main AR Model Viewer Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class AR_Model_Viewer_Public
{

	private $product;

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct()
	{
		$this->init();
	}


	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init()
	{

		if (is_singular('product')) {
			$this->product = wc_get_product();
			wp_register_script('ar-model-viewer', plugins_url('../js/ar-model-viewer-public.js', __FILE__),  array('jquery'), WP_DEBUG ? time(): AR_Model_Viewer::VERSION);
			wp_enqueue_script('ar-model-viewer');

			wp_enqueue_style('AR Model Viewer', plugins_url('../css/ar-model-viewer-public.css', __FILE__));

			add_action('wp_footer', function () {
				$this->ar_model_viewer_woocommerce_single_product_image_html();
			}, 10, 2);
		}
	}

	public function ar_model_viewer_woocommerce_single_product_image_html()
	{
		if (empty($this->product)) {
			return;
		}
		$attachment_id = get_post_meta($this->product->get_id(), 'ar_model_viewer_file_id', true);
		if ($attachment_id) {
			$src = wp_get_attachment_url($attachment_id);
			printf('<a href="#" class="product-three-model-button" src=' . $src . ' data-btn-text="' . __('View In AR', 'ar-model-viewer') . '">3D</a>');
			
		}
	}
}
