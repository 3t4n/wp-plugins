<?php

namespace Codemanas\CmBlocks\Enhancement;

class ScrollToTop {
	private static ?ScrollToTop $_instance = null;
	private string $option_name = 'cmblocks-scroll-to-top';
	private string $script_name = 'cm-blocks-scroll-to-top';
	private string $asset_file = CM_BLOCKS_DIR_PATH . '/build/frontend/scroll-to-top/index.asset.php';


	public static function get_instance(): ?ScrollToTop {
		return ( self::$_instance == null ) ? self::$_instance = new self() : self::$_instance;
	}

	private function __construct() {
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_assets' ] );
		add_action( 'wp_footer', [ $this, 'render_scroll_to_top' ] );
	}


	public function enqueue_assets() {
		if ( ! file_exists( $this->asset_file ) ) {
			return;
		}
		$asset = require_once $this->asset_file;
		wp_register_script( $this->script_name, CM_BLOCKS_DIR_PATH_URL . '/build/frontend/scroll-to-top/index.js', $asset['dependencies'], $asset['version'], true );
		wp_enqueue_script( $this->script_name );
		wp_register_style( $this->script_name, CM_BLOCKS_DIR_PATH_URL . '/build/frontend/scroll-to-top/style-index.css', $asset['dependencies'], $asset['version'] );
		wp_enqueue_style( $this->script_name );
	}

	public function renderSVG( $icon, $props = [] ): string {
		$width   = absint( $icon['width'] ) . 'em' ?? "1em";
		$height  = absint( $icon['height'] ) . 'em' ?? "1em";
		$viewBox = $icon['viewBox'] ?? "0 0 24 24";
		$path    = $icon['path'] ?? "";

		// Convert properties array to attributes string
		$propsString = "";
		foreach ( $props as $key => $value ) {
			$propsString .= " $key=\"$value\"";
		}

		ob_start();
		?>
        <svg
                width="<?php echo esc_attr( $width, ENT_QUOTES ); ?>"
                height="<?php echo esc_attr( $height, ENT_QUOTES ); ?>"
                viewBox="<?php echo esc_attr( $viewBox, ENT_QUOTES ); ?>"
                xmlns="http://www.w3.org/2000/svg"
        >
            <path d="<?php echo esc_attr( $path, ENT_QUOTES ); ?>"<?php echo $propsString; ?>/>
        </svg>
		<?php
		return ob_get_clean();
	}

	public function render_scroll_to_top() {
		$settings = get_option( $this->option_name, [] );
		if ( empty( $settings['enabled'] ) ) {
			return;
		}

		$classes = ['cmblocks-scroll-to-top'];
		if ( $settings['scroll_offset'] == 0 ) {
			$classes[] = 'cmblocks-scroll-to-top__visible';
		}
		if ( isset( $settings['location'] ) && $settings['location'] === 'bottom-left' ) {
			$classes[] = 'cmblocks-scroll-to-top__left';
		}
		?>
        <style id="cmblocks-scroll-to-top-style">
            .cmblocks-scroll-to-top svg {
                fill: <?php echo esc_attr( $settings['icon_color'] ?? '#e24a01' ); ?>;
            }
        </style>
        <a href="#"
           class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>"
           data-scroll-duration="<?php echo esc_attr( $settings['scroll_duration'] ?? 300 ); ?>"
           data-scroll-offset="<?php echo esc_attr( $settings['scroll_offset'] ?? 100 ); ?>"
        ><?php echo $this->renderSVG( $settings['svg_data'] ); ?></a>
		<?php
	}
}