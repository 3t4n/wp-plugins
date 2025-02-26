<?php
/**
 * Register Block Class
 *
 * @package ACF Guten Blocks
 */

class ACFTB_Register_Block {

	/**
	 * Constructor function.
	 */
	function __construct() {

		add_action( 'acf/init', [ $this, 'acftb_register_blocks' ] );

	}

	/**
	 * Register Blocks.
	 */
	public function acftb_register_blocks() {

		if( ! function_exists( 'acf_register_block_type' ) ) {
			return;
		}

		// Register a testimonial block.
		acf_register_block_type( [
		'name'              => 'testimonial',
		'title'             => 'Testimonial Slider',
		'description'       => 'Add Your Testimonials Here.',
		'render_template'   => ACFTB_PATH. 'acftb_cstm_testimonial.php',
		'category'          => 'layout',
		'icon'				=> 'admin-comments',
		] );

	}
}

new ACFTB_Register_Block();
