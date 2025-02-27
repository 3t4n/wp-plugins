<?php
/**
 * Class WalkerCoreBlock
 *
 * Represents a singleton instance of a core block walker.
 */
class WalkerCoreBlock {
	/**
	 * Singleton instance of WalkerCoreBlock.
	 *
	 * @var WalkerCoreBlock|null Singleton instance of WalkerCoreBlock.
	 */
	private static $instance = null;

	/**
	 * Retrieves the singleton instance of the WalkerCoreBlock class.
	 *
	 * @return WalkerCoreBlock Singleton instance of WalkerCoreBlock.
	 */
	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function __construct() {
		if ( ! defined( 'WALKER_CORE_BLOCK_DIR' ) ) {
			define( 'WALKER_CORE_BLOCK_DIR', plugin_dir_path( __FILE__ ) );
		}
		if ( ! defined( 'WALKER_CORE_BLOCK_URL' ) ) {
			define( 'WALKER_CORE_BLOCK_URL', plugin_dir_url( __FILE__ ) );
		}
		if ( ! defined( 'CT_ASSETS_URL' ) ) {
			define( 'CT_ASSETS_URL', 'https://assets.cozythemes.com/' );
		}

		add_filter( 'block_categories_all', array( $this, 'walker_core_block_category' ), 99, 2 );

		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_walkercore_editor_deps' ) );

		add_action( 'init', array( $this, 'enqueue_walkercore_blocks' ) );
	}

	public function walker_core_block_category( $categories ) {
		return array_merge(
			array(
				array(
					'slug'  => 'walker-core',
					'title' => __( 'Walker Core Blocks', 'walker-core' ),
				),
			),
			$categories
		);
	}

	public function enqueue_walkercore_frontend_deps() {
		// Swiper.
		wp_register_script( 'walker-core--swiper-bundle', trailingslashit( WALKER_CORE_BLOCK_URL ) . 'assets/js/swiper-bundle.js', array(), '11.0.3', false );
		// Swiper styles.
		wp_register_style( 'walker-core--swiper-bundle', trailingslashit( WALKER_CORE_BLOCK_URL ) . 'assets/css/swiper-bundle.css', array(), '11.0.3' );

		wp_register_script( 'walker-core--block-scripts', trailingslashit( WALKER_CORE_BLOCK_URL ) . 'assets/js/walker-core-block-scripts.js', array( 'jquery' ), WALKER_CORE_VERSION, false );
	}

	public function enqueue_walkercore_editor_deps() {
		if ( file_exists( WALKER_CORE_BLOCK_DIR . 'assets/css/walker-core-block-editor.css' ) ) {
			wp_enqueue_style(
				'walker-core-block--editor-styles',
				trailingslashit( WALKER_CORE_BLOCK_URL ) . 'assets/css/walker-core-block-editor.css',
				array(),
				WALKER_CORE_VERSION
			);
		}
	}

	public function enqueue_walkercore_blocks() {
		$this->enqueue_walkercore_frontend_deps();

		$walker_core_blocks = glob( WALKER_CORE_BLOCK_DIR . 'dist/*/build' );

		$pro_stub = array(
			'post-carousel',
		);

		foreach ( $walker_core_blocks as $block ) {
			$path_parts = explode( '/', $block );

			$block_name = $path_parts[ count( $path_parts ) - 2 ];

			$walker_core = new Walker_Core();

			if ( ! $walker_core->walker_core_premium_status() && in_array( $block_name, $pro_stub, true ) ) {
				continue;
			}

			if ( is_dir( $block ) ) {
				register_block_type( $block );

				$asset_file = $this->asset_file_values( $block . '/index.asset.php' );

				if ( file_exists( WALKER_CORE_BLOCK_DIR . 'dist/' . $block_name . '/build/index.js' ) ) {
					wp_register_script( 'walker-core--' . $block_name, WALKER_CORE_BLOCK_URL . 'dist/' . $block_name . '/build/index.js', $asset_file['dependencies'], $asset_file['version'], false );
				}

				if ( file_exists( WALKER_CORE_BLOCK_DIR . 'dist/' . $block_name . '/build/index.css' ) ) {
					wp_register_style( 'walker-core--' . $block_name . '--editor', WALKER_CORE_BLOCK_URL . 'dist/' . $block_name . '/build/index.css', array(), $asset_file['version'], false );
				}

				if ( file_exists( WALKER_CORE_BLOCK_DIR . 'dist/' . $block_name . '/build/style-index.css' ) ) {
					wp_register_style( 'walker-core--' . $block_name . '--frontend', WALKER_CORE_BLOCK_URL . 'dist/' . $block_name . '/build/style-index.css', array(), $asset_file['version'], false );
				}

				wp_localize_script(
					'walker-core--' . $block_name,
					'blockAssets',
					array(
						'CTAssets' => CT_ASSETS_URL,
					)
				);
			}
		}
	}

	/**
	 * Include asset path if exists to fetch dependencies and version.
	 *
	 * @param string $path location to the index.asset.php.
	 * @return array
	 */
	public static function asset_file_values( string $path ): array {
		$asset_path = $path;

		return file_exists( $asset_path )
			? include $asset_path
			: array(
				'dependencies' => array(),
				'version'      => $version ?? WALKER_CORE_VERSION,
			);
	}
}
