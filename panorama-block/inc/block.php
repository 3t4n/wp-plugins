<?php
class BPGBBlock{
	function __construct(){
		add_action( 'enqueue_block_assets', [$this, 'enqueueBlockAssets'] );
		add_action( 'init', [$this, 'register'] );
	}

	function enqueueBlockAssets(){ 
		wp_register_script( 'threeJS', BPGB_DIR_URL . 'assets/js/three.min.js', [], BPGB_VERSION, true ); 
		wp_register_script( 'panoramaJS', BPGB_DIR_URL . 'assets/js/panorama.min.js', [ 'threeJS' ], BPGB_VERSION, true );
	}

	function register() {
		wp_register_style( 'bpgb-panorama-style', BPGB_DIR_URL . 'dist/style.css', [], BPGB_VERSION ); // Style
		wp_register_style( 'bpgb-panorama-editor-style', BPGB_DIR_URL . 'dist/editor.css', [ 'bpgb-panorama-style' ], BPGB_VERSION ); // Backend Style

		register_block_type( __DIR__, [
			'editor_style' => 'bpgb-panorama-editor-style',
			'render_callback' => [$this, 'render']
		] ); // Register Block

		wp_set_script_translations( 'bpgb-panorama-editor-script', 'panorama-block', BPGB_DIR_PATH . 'languages' );
	}

	function render( $attributes ){
		extract( $attributes );

		wp_enqueue_style( 'bpgb-panorama-style' );
		wp_enqueue_script( 'bpgb-panorama-script', BPGB_DIR_URL . 'dist/script.js', [ 'panoramaJS' ], BPGB_VERSION, true );
		wp_set_script_translations( 'bpgb-panorama-script', 'panorama-block', BPGB_DIR_PATH . 'languages' );

		$blockClassName = "wp-block-bpgb-panorama $className align$align";

		$styles = "
			#bpgbPanorama-$cId {
				text-align: $alignment;
			}
			#bpgbPanorama-$cId .bpgbPanorama {
				width: $width;
				height: $height;
			}
		";

		ob_start(); ?>
		<div class='<?php echo esc_attr( $blockClassName ); ?>' id='bpgbPanorama-<?php echo esc_attr($cId); ?>' data-attributes='<?php echo esc_attr( wp_json_encode( $attributes ) ); ?>'>
			<style>
				<?php echo esc_html( $styles ); ?>
			</style>

			<div class='bpgbPanorama'></div>
		</div>
		<?php return ob_get_clean();
	} // Render
}
new BPGBBlock;