<?php

/**
 * @package  3D-Model-Viewer-by-Arty
 */

namespace Arty_3DModelViewer\Controllers;

class Arty_3DModelViewer_BaseController
{

    public string $plugin_path;

    public string $plugin_url;

    public string $plugin;

    public string $woo_tab_id;

    public array $managers = array();

    public array $product_page_positions = array();
	
	public string $version;

    public function __construct() {

        $this->plugin_path = plugin_dir_path( dirname( __FILE__, 2 ) );
        $this->plugin_url = plugin_dir_url( dirname( __FILE__, 2) );
        $this->plugin = plugin_basename( dirname( __FILE__, 3 ) ) . '/3d-model-viewer-by-arty.php';
        $this->woo_tab_id = 'arty-3dmodel-viewer';
		
        $this->managers = array(
            'arty_3dmodelviewer_woo_widget' => __('3D Model Viewer for WooCommerce','3d-model-viewer-by-arty')
        );

        $this->product_page_positions = array(
            'woocommerce_before_single_product_summary' => __('Top of the product page','3d-model-viewer-by-arty'),
            'woocommerce_single_product_summary' => __('Next to the image gallery','3d-model-viewer-by-arty'),
            'woocommerce_replace_image' => __('Replace the image gallery','3d-model-viewer-by-arty')
        );
		
		$this->version = '2.0.0';
    }
}

