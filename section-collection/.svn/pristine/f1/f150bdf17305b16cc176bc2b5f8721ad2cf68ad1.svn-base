<?php 

if ( !defined( 'ABSPATH' ) ) { exit; }

if(!class_exists('BPSCSectionCollection')) {
	class BPSCSectionCollection{
		public function __construct(){
			add_action( 'enqueue_block_assets', [$this, 'enqueueBlockAssets'] );
			add_action( 'init', [$this, 'onInit'] );
		}

		function enqueueBlockAssets(){
			wp_register_style( 'fontAwesome', BPSC_DIR_URL . 'assets/css/font-awesome.min.css', [], '6.4.2' ); // Icon
		}

		function onInit() {
			wp_register_style( 'bpsc-section-collection-style', BPSC_DIR_URL . 'dist/style.css', [ 'fontAwesome' ], BPSC_VERSION ); // Style
			wp_register_style( 'bpsc-section-collection-editor-style', BPSC_DIR_URL . 'dist/editor.css', [ 'bpsc-section-collection-style' ], BPSC_VERSION ); // Backend Style

			register_block_type( __DIR__, [
				'editor_style'		=> 'bpsc-section-collection-editor-style',
				'render_callback'	=> [$this, 'render']
			] ); // Register Block

			wp_set_script_translations( 'bpsc-section-collection-editor-script', 'section-collection', BPSC_DIR_PATH . 'languages' );
		}

		function render( $attributes ){
			extract( $attributes );

			wp_enqueue_style( 'bpsc-section-collection-style' );
			wp_enqueue_script( 'bpsc-section-collection-script', BPSC_DIR_URL . 'dist/script.js', [ 'react', 'react-dom' ], BPSC_VERSION, true );
			wp_set_script_translations( 'bpsc-section-collection-script', 'section-collection', BPSC_DIR_PATH . 'languages' );

			$className = $className ?? '';
			$blockClassName = "wp-block-bpsc-section-collection $className align$align";

			$clientId = wp_unique_id('bpsc-');

			ob_start(); ?>
			<div class='<?php echo esc_attr( $blockClassName ); ?>' id='bpscSectionCollection-<?php echo esc_attr( $clientId ) ?>' data-attributes='<?php echo esc_attr( wp_json_encode( $attributes ) ); ?>'></div>

			<?php return ob_get_clean();
		}
	}
	new BPSCSectionCollection();
}	