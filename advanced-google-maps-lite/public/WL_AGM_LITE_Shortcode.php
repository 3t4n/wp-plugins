<?php
defined( 'ABSPATH' ) or die();

class WL_AGM_LITE_Shortcode {

	/* Location */
	public static function create_location_front( $attr ) {
		ob_start();
		require_once( 'inc/controllers/wl_agm_lite_location_front.php' );
		return ob_get_clean();
	}

	/* Maps */
	public static function create_map_front( $attr ) {
		ob_start();
		require_once( 'inc/controllers/wl_agm_lite_map_front.php' );
		return ob_get_clean();
	}

	/* Route */
	public static function create_route_front( $attr ) {
		ob_start();
		require_once( 'inc/controllers/wl_agm_lite_route_front.php' );
		return ob_get_clean();
	}

		/* Interactive Maps */
	public static function create_interactive_map_front( $attr ) {
		ob_start();
		require_once( 'inc/controllers/wl_agm_lite_i_map_front.php' );
		return ob_get_clean();
	}

	public static function shortcode_enqueue_assets() {
		wp_enqueue_script( 'jquery');
		/* Enqueue styles */
		wp_enqueue_style( 'bootstrap', WL_AGM_LITE_PLUGIN_URL . 'assets/css/bootstrap.min.css' );
		wp_enqueue_style( 'wl-agm-lite-front-end', WL_AGM_LITE_PLUGIN_URL . 'public/css/front_end_css.css' );
		/* Enqueue scripts */
		wp_enqueue_script( 'jquery', array('wl_agm_lite_multi_frot'), null, true);
		wp_enqueue_script( 'wl-agm-lite-loader-js', WL_AGM_LITE_PLUGIN_URL . 'admin/js/loader.js', '', true, false );
		wp_enqueue_script( 'wl-agm-lite-map-theme', WL_AGM_LITE_PLUGIN_URL . 'public/js/wl_agm_lite_map_theme.js', '', true, false );

	}
}
