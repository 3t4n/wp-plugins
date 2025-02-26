<?php

/**
 * Pressfore Preloaders Main wrapper class
 */

class Pressfore_Preloaders {

	function __construct() {
		$this->hooks();
	}

	function hooks() {
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );
		add_action( 'customize_preview_init', array( $this, 'pressfore_preloaders_customize_preview_js' ) );
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'pressfore_preloaders_customize_controls_register_scripts' ), 0 );
		add_filter( 'plugin_row_meta',  array( $this, 'links' ), 10, 2 );
	}

	/**
	 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
	 */
	function pressfore_preloaders_customize_preview_js() {
		wp_enqueue_script( 'pf_preloaders_preview', PRESSFORE_PRELOADERS_ASSETS_DIR . 'js/admin/customizer.js', array( 'jquery' ), null, true );
	}

	function pressfore_preloaders_customize_controls_register_scripts() {
		wp_register_script( 'pf_preloaders_customizer-controls', PRESSFORE_PRELOADERS_ASSETS_DIR . 'js/admin/customize-controls.js', array( 'jquery' ), null, true );
		wp_register_style( 'pf_preloaders_customizer-controls', PRESSFORE_PRELOADERS_ASSETS_DIR . 'css/customize-controls.css' );
	}

	function scripts() {
		wp_enqueue_style('pf-preloaders-styles', PRESSFORE_PRELOADERS_ASSETS_DIR . 'css/style.css', false);
		wp_enqueue_script('pf-preloaders', PRESSFORE_PRELOADERS_ASSETS_DIR . 'js/main.js', array('jquery'), false, true);

		if ( is_admin() ) {
			wp_enqueue_script('pf-preloaders', PRESSFORE_PRELOADERS_ASSETS_DIR . 'js/admin/admin.js', array('jquery'), false, true);
		}
	}

	/**
	 * Add links in the plugin screen
	 *
	 * @param $links, $file
	 * @return array
	 * @since 1.0
	 */
	function links($links, $file)
	{
		$base = 'pressfore-preloaders/pressfore-preloaders.php';

		if ($file == $base) {
			$links[] = '<a href="http://docs.pressfore.com/pressfore-preloaders/" target="_blank">' .'<i class="dashicons dashicons-book"></i>'. __('Documentation') . '</a>';
		}

		return $links;
	}
}

