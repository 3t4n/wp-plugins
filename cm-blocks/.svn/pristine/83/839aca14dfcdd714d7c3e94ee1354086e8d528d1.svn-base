<?php

namespace Codemanas\CmBlocks;

final class Admin {
	private static ?Admin $_instance = null;
	private string $menu_page = '';

	public static function get_instance(): ?Admin {
		return ( self::$_instance == null ) ? self::$_instance = new self() : self::$_instance;
	}

	private function __construct() {
		add_action( 'admin_menu', [ $this, 'add_settings_page' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
	}

	public function add_settings_page() {
		$this->menu_page = add_menu_page( __( 'CM Blocks', 'cm-blocks' ), __( 'Blocks', 'cm-blocks' ), 'activate_plugins', 'cm-blocks', [ $this, 'menu_page' ], 'data:image/svg+xml;base64,' . base64_encode( '<svg width="47" height="54" viewBox="0 0 47 54" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M23.5 4L4.45349 13.66L23.5 24.24L42.093 13.66L23.5 4ZM22.593 28.38L4 17.34V38.96L22.593 50V42.18L17.6047 38.96V41.72L8.53488 36.2V25.62L17.6047 30.68V33.44L22.593 36.2V28.38ZM24.8605 50L29.7434 47.152L29.8488 31.6L35.2907 33.9L38.9186 27L39.3721 41.72L43 39.42L42.5465 17.8L38.0116 20.56L33.4767 28.38L28.9419 26.08L24.8605 28.0848V50Z" fill="#9CA2A7"/>
</svg>
' ) );
	}

	public function menu_page() {
		?>
        <h1 class="screen-reader-text"><?php _e( 'CM Blocks', 'cm-blocks' ) ?></h1>
        <div id="cm-blocks-admin-root"></div>
		<?php
	}

	public function enqueue_scripts( $hook_suffix ) {
		if ( $hook_suffix !== $this->menu_page ) {
			return;
		}
		if ( ! file_exists( CM_BLOCKS_DIR_PATH . '/build/admin/main.asset.php' ) ) {
			return;
		}
		$assets                   = include_once CM_BLOCKS_DIR_PATH . '/build/admin/main.asset.php';
		$assets['dependencies'][] = 'wp-blocks';
		wp_register_script( 'cm-blocks', CM_BLOCKS_DIR_PATH_URL . 'build/admin/main.js', $assets['dependencies'], $assets['version'], true );
		wp_enqueue_script( 'cm-blocks' );
		wp_register_style( 'cm-blocks_admin_css', CM_BLOCKS_DIR_PATH_URL . 'build/admin/style-main.css', [
			'wp-components'
		], $assets['version'] );
		wp_enqueue_style( 'cm-blocks_admin_css' );

		// Localize the script with custom data
		$license_data_array = array(
			'ajaxUrl'      => esc_url( admin_url( 'admin-ajax.php' ) ),
			'licenseNonce' => wp_create_nonce( 'cm-blocks-license-nonce' ),
		);
		wp_localize_script( 'cm-blocks', 'CMlicenseData', $license_data_array );
	}

}
