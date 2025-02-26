<?php

/**
 * @package  3D-Model-Viewer-by-Arty
 */

namespace Arty_3DModelViewer\Controllers;


use Arty_3DModelViewer\Callbacks\Arty_3DModelViewer_WooCommerceCallbacks;
use Arty_3DModelViewer\Controllers\Arty_3DModelViewer_BaseController;

class Arty_3DModelViewer_WooCommerceController extends Arty_3DModelViewer_BaseController
{

	public $callbacks;
	
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
     * Initialization function
     * @return void
     */
    public function arty_3dmodelviewer_register()
	{
		$this->callbacks = new Arty_3DModelViewer_WooCommerceCallbacks();

        add_action( 'save_post', array($this, 'arty_3dmodelviewer_save_product'), 10, 2 );
		add_action( 'delete_post', array($this, 'arty_3dmodelviewer_delete_product'), 10, 2 );

        $this->arty_3dmodelviewer_show_3dmodelviewer();
	}


    /**
     * @param $post_id
     * @param $post
     * @return void
     */
    public function arty_3dmodelviewer_save_product( $post_id, $post )
    {
        if ( $post->post_type == 'product' ) {

	        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );

			$data = [
				'shopIdentity' => get_option( 'siteurl' ),
				'product' => [
					'id' => $post_id,
					'name' => get_the_title($post),
					'img' => $image[0]
				]
			];

	        $apiOptions = get_option( 'arty_3dmodelviewer_woocommerce_api' );

	        $response = wp_remote_post(  $apiOptions['baseUrl'] . '/api/products/wc/product/update', array(
		        'body'    => json_encode($data),
		        'headers'     => [
			        'Content-Type' => 'application/json',
		        ]
	        ) );

            if ( $response['body'] ){
                update_post_meta( $post_id, 'arty_viewer_iframe', $response['body'] );
            }
        }
    }

    /**
     * @param $post_id
     * @param $post
     * @return void
     */
    public function arty_3dmodelviewer_delete_product( $post_id, $post )
	{
	    if ( $post->post_type == 'product' ) {

			$data = [
				'shopIdentity' => get_option( 'siteurl' ),
				'product' => [
					'id' => $post_id
				]
			];

			$apiOptions = get_option( 'arty_3dmodelviewer_woocommerce_api' );

			$response = wp_remote_post( $apiOptions['baseUrl'] . '/api/products/wc/product/delete', array(
				'body'    => json_encode($data),
				'headers'     => [
					'Content-Type' => 'application/json',
				]
			) );
		}
	}


    /**
     * @return void
     */
    public function arty_3dmodelviewer_show_3dmodelviewer()
    {
        $get_option = get_option( 'arty_3dmodelviewer_woocommerce_default_position' );
        $position = $get_option['position'];

        switch ($position){

            case 'woocommerce_replace_image':
                $this->arty_3dmodelviewer_replace_product_image_with_3dmodelviewer();
                break;

            default:
                $this->arty_3dmodelviewer_show_3dmodelviewer_in_position( $position );

        }
    }


    /**
     * @param $position
     * @return void
     */
    public function arty_3dmodelviewer_show_3dmodelviewer_in_position( $position )
    {
    	add_action( $position, array( $this, 'arty_3dmodelviewer_product_position' ), 10, 2 );
    }

    /**
     * @return void
     */
    public function arty_3dmodelviewer_replace_product_image_with_3dmodelviewer()
    {
        add_action( 'woocommerce_product_thumbnails', array($this, 'arty_3dmodelviewer_replace_product_image'), 10, 2 );
    }

    /**
     * @return void
     */
    public function arty_3dmodelviewer_product_position()
    {

        global $product;

        $iframe = $this->arty_3dmodelviewer_get_iframe( $product->get_id() );

        // check WPML
        if ( empty( $iframe ) && class_exists( 'woocommerce_wpml' ) ) {

            global $wpdb;
            $current_lang = apply_filters( 'wpml_current_language', NULL );
			
			// Define a unique cache key based on the product ID and language
			$cache_key = 'arty_3dmodel_viewer_translations_' . $product->get_id() . '_' . $current_lang;
			
			// Try to get the result from the cache first
			$query_result = wp_cache_get( $cache_key, 'arty_3dmodel_viewer' );
			
			if ( false === $query_result ) {
				// If the cache is empty, perform the query
				$query_result = $wpdb->get_results(
					$wpdb->prepare(
						"SELECT * FROM {$wpdb->prefix}icl_translations WHERE trid = %d AND source_language_code = %s",
						$product->get_id(),
						$current_lang
					)
				);
				
				// Store the result in the cache for future use
				wp_cache_set( $cache_key, $query_result, 'arty_3dmodel_viewer', HOUR_IN_SECONDS );
			}

            if ( !empty( $query_result ) ){

                $object = $query_result[0];
                $trans_product_id = $object->element_id;
                $iframe = $this->arty_3dmodelviewer_get_iframe($trans_product_id);
            }
        }

        if ( !empty( $iframe ) ){
			$this->callbacks->arty_3dmodelviewer_woo_product_webviewer( $iframe );
        }
    }

    /**
     * @param $product_id
     * @return mixed
     */
    public function arty_3dmodelviewer_get_iframe( $product_id )
    {
        return get_post_meta( $product_id, 'arty_viewer_iframe', true );
    }

    /**
     * @return void
     */
    public function arty_3dmodelviewer_replace_product_image()
    {
        global $product;

	    $iframe = $this->arty_3dmodelviewer_get_iframe( $product->get_id() );

        if ( !empty( $iframe ) ){
            $this->callbacks->arty_3dmodelviewer_woo_product_webviewer ( $iframe, true );
        }
    }

}
