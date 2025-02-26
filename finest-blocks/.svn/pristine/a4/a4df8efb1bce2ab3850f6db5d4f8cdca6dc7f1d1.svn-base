<?php

namespace Finest\Blocks;

/**
 * ImageGallery class handler
 */
class ImageGallery {


	function __construct() {
		if ( version_compare( get_bloginfo( 'version' ), '5.8', '>=' ) ) {
			add_filter( 'block_categories_all', [ $this, 'register_layout_category' ] );
		} else {
			add_filter( 'block_categories', [ $this, 'register_layout_category' ] );
		}
		$this->register_dynamic_block();
	}

	public function register_layout_category( $categories ) {
		$categories[] = [
			'slug'  => 'finestblock',
			'title' => __('Finest Block', 'finestblock'),
		];

		return $categories;
	}

	public function register_dynamic_block() {

		// Only load if Gutenberg is available.
		if ( ! function_exists( 'register_block_type' ) ) {
			return;
		}

		// Hook server side rendering into render callback
		register_block_type(
			'finestblocks/image-gallery',
			[
				'attributes'      => [
					'images',
				],
				'render_callback' => [ $this, 'render_dynamic_block' ],
			]
		);
	}


	public function render_dynamic_block( $args ) {
		$count  = 0;
		$images = false;

		if ( isset( $args['images'] ) && ! empty( $args['images'] ) ) {
			$count  = count( $args['images'] );
			$images = true;
		}

		ob_start(); ?>

		<div class="gallery cf"> 
			<?php
			if ( $images ) {
				foreach ( $args['images'] as $key => $value ) {
					?>
						<div>
							<img src="<?php echo esc_url( $value['src'] ); ?>" alt="gallery"/>
						</div>
						<?php
				}
			}
			?>
			</div>   

		<?php
		return ob_get_clean();
	}

}
