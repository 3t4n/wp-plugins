<?php
class TTBBlock{
	function __construct(){
		add_action( 'enqueue_block_assets', [$this, 'enqueueBlockAssets'] );
		add_action( 'init', [$this, 'onInit'] );
	}

	function enqueueBlockAssets(){
		wp_register_script( 'typedJS', TTB_DIR_URL . 'assets/js/typed.min.js', [], '2.0.12', true );
	}

	function onInit() {
		wp_register_style( 'ttb-text-typing-style', TTB_DIR_URL . 'dist/style.css', [], TTB_PLUGIN_VERSION ); // Style
		wp_register_style( 'ttb-text-typing-editor-style', TTB_DIR_URL . 'dist/editor.css', [ 'ttb-text-typing-style' ], TTB_PLUGIN_VERSION ); // Backend Style

		register_block_type( __DIR__, [
			'editor_style'		=> 'ttb-text-typing-editor-style',
			'render_callback'	=> [$this, 'render']
		] ); // Register Block

		wp_set_script_translations( 'ttb-text-typing-editor-script', 'text-typing', TTB_DIR_PATH . 'languages' );
	}

	function render( $attributes ){
		extract( $attributes );

		wp_enqueue_style( 'ttb-text-typing-style' );
		wp_enqueue_script( 'ttb-text-typing-script', TTB_DIR_URL . 'dist/script.js', [ 'react', 'react-dom', 'typedJS' ], TTB_PLUGIN_VERSION, true );
		wp_set_script_translations( 'ttb-text-typing-script', 'text-typing', TTB_DIR_PATH . 'languages' );

		$className = $className ?? '';
		$blockClassName = "wp-block-ttb-text-typing $className align$align";

		ob_start(); ?>
		<div class='<?php echo esc_attr( $blockClassName ); ?>' id='ttbTextTyping-<?php echo esc_attr( $cId ) ?>' data-attributes='<?php echo esc_attr( wp_json_encode( $attributes ) ); ?>'></div>

		<?php return ob_get_clean();
	} // Render
}
new TTBBlock;