<?php
defined( 'ABSPATH' ) or die();

class WL_AGM_LITE_ADMIN_END_CSS_JS {
	/* Add adminend Css and Js files */
	public static function admin_end_css() {
		global $post;
		if ( ! in_array( $post->post_type, array(
			'wl_agm_locations',
			'wl_agm_maps',
			'wl_agm_routes',
			'wl_agm_inter_maps'
		) ) ) {
			return;
		}

		/* Enqueue styles */
		wp_enqueue_style( 'bootstrap', WL_AGM_LITE_PLUGIN_URL . 'assets/css/bootstrap.min.css' );
		wp_enqueue_style( 'font-awesome', WL_AGM_LITE_PLUGIN_URL . 'assets/css/all.min.css' );
		wp_enqueue_style( 'jquery-dataTables', WL_AGM_LITE_PLUGIN_URL . 'admin/css/jquery.dataTables.min.css' );
		wp_enqueue_style( 'dataTables-bootstrap4', WL_AGM_LITE_PLUGIN_URL . 'admin/css/dataTables.bootstrap4.min.css' );
		wp_enqueue_style( 'wl-agm-lite-admin-style', WL_AGM_LITE_PLUGIN_URL . 'admin/css/wl-agm-cpt-style.css' );

		/* Add the color picker css file */
		wp_enqueue_style( 'wp-color-picker' );

		/* Enqueue scripts */
		wp_enqueue_script( 'jquery' );
		wp_enqueue_media();
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_script( 'popper', WL_AGM_LITE_PLUGIN_URL . 'assets/js/popper.min.js', array( 'jquery' ), true, true );
		wp_enqueue_script( 'bootstrap', WL_AGM_LITE_PLUGIN_URL . 'assets/js/bootstrap.min.js', array( 'jquery' ), true, true );
		wp_enqueue_script( 'jquery-dataTables', WL_AGM_LITE_PLUGIN_URL . 'admin/js/jquery.dataTables.min.js', array( 'jquery' ), true, true );
		wp_enqueue_script( 'wl-agm-lite-admin-script', WL_AGM_LITE_PLUGIN_URL . 'admin/js/wl-agm-cpt-script.js', array(
			'jquery',
			'wp-color-picker'
		), true, false );

		/* Enqueue select region js */
		wp_enqueue_script( 'wl_agm_lite_region_ajax', WL_AGM_LITE_PLUGIN_URL . 'admin/js/wl_agm_lite_region_ajax.js', array( 'jquery' ) );
		wp_localize_script( 'wl_agm_lite_region_ajax', 'ajax_region', array(
			'ajax_url'     => admin_url( 'admin-ajax.php' ),
			'region_nonce' => wp_create_nonce( 'region_ajax_nonce' )
		) );
	}

	public static function wl_agm_admin_styles_edit_php( $array ) {
		/* Enqueue styles */
		wp_enqueue_style( 'wl-agm-lite-admin-edit-style-css', WL_AGM_LITE_PLUGIN_URL . 'admin/css/wl-agm-lite-edit-style.css' );
	}
}
?>