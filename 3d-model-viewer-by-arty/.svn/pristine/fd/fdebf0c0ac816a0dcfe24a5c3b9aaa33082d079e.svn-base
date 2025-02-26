<?php

/**
 * @package  3D-Model-Viewer-by-Arty
 */

namespace Arty_3DModelViewer\Base;


use Arty_3DModelViewer\Controllers\Arty_3DModelViewer_BaseController;

class Arty_3DModelViewer_Enqueue extends Arty_3DModelViewer_BaseController
{
	public function arty_3dmodelviewer_register()
    {
		add_action( 'admin_enqueue_scripts', array( $this, 'arty_3dmodelviewer_enqueue' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'arty_3dmodelviewer_enqueue' ) );
	}

	function arty_3dmodelviewer_enqueue()
    {
		// enqueue all scripts (no localization) and styles
		wp_enqueue_style('arty3dmodelviewerstyle', $this->plugin_url . 'assets/css/arty3dmodelviewer_style.css', array(), $this->version);

        // Enqueued script with localized data.
        wp_enqueue_script( 'arty3dmodelviewerscript' );
		
		if (
			isset( $_GET['page'] ) && $_GET['page'] === 'wc-settings' &&
			isset( $_GET['tab']) && $_GET['tab'] === $this->woo_tab_id &&
			empty( $_GET['section'] )
		) {
			wp_add_inline_script('jquery', 'jQuery(document).ready(function($){ $(".submit").hide(); });' );
		}
		
	}

}
