<?php

/**
 * @package  3D-Model-Viewer-by-Arty
 */

namespace Arty_3DModelViewer\Callbacks;

use Arty_3DModelViewer\Controllers\Arty_3DModelViewer_BaseController;

class Arty_3DModelViewer_WooCommerceCallbacks extends Arty_3DModelViewer_BaseController
{
	
	private array $allowed_html = array(
		'iframe' => array(
			'src' => array(),
			'width' => array(),
			'height' => array(),
			'frameborder' => array(),
			'allowfullscreen' => array(),
			'class' => array(),
			'style' => array()
		),
	);
	
    /**
     * @param $iframe
     * @param bool $replace_image
     */
    public function arty_3dmodelviewer_woo_product_webviewer($iframe, bool $replace_image = false )
    {
		
		$viewerOptions = get_option( 'arty_3dmodelviewer_woocommerce_default_values' );
		$height = isset( $viewerOptions['height'] ) ? esc_attr( $viewerOptions['height'] ) . 'px' : '500px';
		
		$iframeHtml = '<iframe src="' . esc_url($iframe) . '" class="arty_3dmodelviewer_iframe" style="height: ' . esc_attr($height) . ';"></iframe>';
		
		echo wp_kses( $iframeHtml, $this->allowed_html );
		
		// Enqueue the correct JavaScript function
		if ($replace_image) {
			$this->enqueue_replace_image_script();
		} else {
			$this->enqueue_reorder_title_script();
		}
    }
	
	public function enqueue_replace_image_script() {
		wp_add_inline_script('jquery', '
        jQuery(function($) {
            "use strict";
            $(document).ready(function(){
                $(".woocommerce-product-gallery__image").hide();
                $(".woocommerce-product-gallery__trigger").hide();
                $(".woocommerce-product-gallery").empty();
                $(".woocommerce-product-gallery").append($(".arty_3dmodelviewer_iframe"));
            });
        });
    ');
	}
	
	public function enqueue_reorder_title_script() {
		wp_add_inline_script('jquery', '
        jQuery(function($) {
            "use strict";
            $(document).ready(function(){
                let title = $(".product_title");
                let newTitle = title.clone();
                $(".product_title").remove();
                $(".product").prepend(newTitle);
            });
        });
    ');
	}
	
}
