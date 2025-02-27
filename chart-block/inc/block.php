<?php
class BChartBlock{
	function __construct(){
		add_action( 'enqueue_block_assets', [$this, 'enqueueBlockAssets'] );
		add_action( 'init', [$this, 'onInit'] );
	}

	function enqueueBlockAssets(){
		wp_register_script( 'chartJS', BCHART_DIR_URL . 'assets/js/chart.min.js', [], '3.5.1', true );
	}

	function onInit(){
		wp_register_style( 'b-chart-chart-style', BCHART_DIR_URL . 'dist/style.css', [], BCHART_VERSION ); // Style
		wp_register_style( 'b-chart-chart-editor-style', BCHART_DIR_URL . 'dist/editor.css', [ 'b-chart-chart-style' ], BCHART_VERSION ); // Backend Style

		register_block_type( __DIR__, [
			'editor_style'		=> 'b-chart-chart-editor-style',
			'render_callback'	=> [$this, 'render']
		] ); // Register Block

		wp_set_script_translations( 'b-chart-chart-editor-script', 'chart-block', BCHART_DIR_PATH . 'languages' );
	}

	function render( $attributes ){
		extract( $attributes );

		wp_enqueue_style( 'b-chart-chart-style' );
        wp_enqueue_script( 'b-chart-chart-script', BCHART_DIR_URL . 'dist/script.js', [ 'react', 'react-dom', 'chartJS' ], BCHART_VERSION, true );
		wp_set_script_translations( 'b-chart-chart-script', 'chart-block', BCHART_DIR_PATH . 'languages' );

		$className = $className ?? '';
		$blockClassName = "wp-block-b-chart-chart $className align$align";

		ob_start(); ?>
		<div class='<?php echo esc_attr( $blockClassName ); ?>' id='bChart-<?php echo esc_attr( $cId ) ?>' data-attributes='<?php echo esc_attr( wp_json_encode( $attributes ) ); ?>'></div>

		<?php return ob_get_clean();
	} // Render
}
new BChartBlock;