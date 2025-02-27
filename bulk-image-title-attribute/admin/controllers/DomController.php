<?php

namespace Pagup\Bigta\Controllers;

use Pagup\Bigta\Core\Option;
use Pagup\Bigta\Traits\DomHelper;
class DomController {
    use DomHelper;
    protected $post_types;

    public function __construct() {
        add_filter( 'the_content', array(&$this, 'bigta'), 99999 );
        add_filter( 'woocommerce_single_product_image_thumbnail_html', array(&$this, 'bigta_woocommerce_gallery'), 99999 );
        add_filter( 'post_thumbnail_html', array(&$this, 'bigta'), 99999 );
        $this->post_types = ( Option::check( 'post_types' ) ? maybe_unserialize( Option::get( 'post_types' ) ) : ['post', 'page'] );
    }

    public function bigta( $content ) {
        // Get the post ID
        $post_id = get_queried_object_id();
        // Check if the post ID is in the blacklist
        if ( !empty( $post_id ) && is_numeric( $post_id ) && in_array( (int) $post_id, $this->blacklist() ) ) {
            return $content;
        }
        // Load content into DOM
        $dom = new \DOMDocument('1.0', 'UTF-8');
        // Load content differently based on debug mode
        if ( Option::check( 'debug_mode' ) ) {
            @$dom->loadHTML( mb_convert_encoding( $content, 'HTML-ENTITIES', 'UTF-8' ), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD );
        } else {
            @$dom->loadHTML( mb_convert_encoding( "<div class='bigta-container'>{$content}</div>", 'HTML-ENTITIES', 'UTF-8' ), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD );
        }
        // XPath query for images
        $html = new \DOMXPath($dom);
        $imgNodes = $html->query( "//img" );
        foreach ( $imgNodes as $node ) {
            // Return image URL
            $img_url = $node->getAttribute( "src" );
            if ( is_singular( $this->post_types ) ) {
                $this->setTitle( 'post_images', $node, $img_url );
            }
            // Set custom title if enabled
            if ( Option::post_meta( 'bigta_use_custom_title' ) && !empty( Option::post_meta( 'bigta_custom_title' ) ) ) {
                $node->setAttribute( "title", Option::post_meta( 'bigta_custom_title' ) );
            }
        }
        if ( is_singular( $this->post_types ) ) {
            // Initialize $saveDom variable
            $saveDom = true;
            // Disable saveDom if it's the BuddyPress profile page
            if ( class_exists( 'BuddyPress' ) && bp_is_my_profile() ) {
                $saveDom = false;
            }
            // Disable saveDom on WCFM pages
            if ( class_exists( 'WCFM' ) && is_wcfm_page() ) {
                $saveDom = false;
            }
            // Disable saveDom on WooCommerce checkout page
            if ( class_exists( 'WooCommerce' ) && is_checkout() ) {
                $saveDom = false;
            }
            // Check if saveDom is true and bigta_disable post meta is empty
            if ( $saveDom && empty( Option::post_meta( 'bigta_disable' ) ) ) {
                $content = $dom->saveHtml();
            }
        }
        return $content;
    }

    public function bigta_woocommerce_gallery( $content ) {
        $dom = new \DOMDocument('1.0', 'UTF-8');
        @$dom->loadHTML( mb_convert_encoding( $content, 'HTML-ENTITIES', 'UTF-8' ), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD );
        $html = new \DOMXPath($dom);
        foreach ( $html->query( "//img" ) as $node ) {
            // Return image URL
            $img_url = $node->getAttribute( "src" );
            // Set titles for products
            $this->setTitle( 'product_images', $node, $img_url );
        }
        if ( is_singular( 'product' ) ) {
            $content = $dom->saveHtml();
        }
        return $content;
    }

}

$DomController = new DomController();