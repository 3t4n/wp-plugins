<?php

/**
 * @package  Arplay
 */

namespace IncArplay\Base;

class BaseController
{

    public $plugin_path;

    public $plugin_url;

    public $plugin;

    public $managers = array();

    public $product_page_positions = array();

    public function __construct() {

        $this->plugin_path = plugin_dir_path( dirname( __FILE__, 2 ) );
        $this->plugin_url = plugin_dir_url( dirname( __FILE__, 2) );
        $this->plugin = plugin_basename( dirname( __FILE__, 3 ) ) . '/arplay.php';

        $this->managers = array(
            'arplay_shortcode' => 'AR Play Shortcode',
            'arplay_woo_widget' => 'AR Play for WooCommerce'
        );

        $this->product_page_positions = array(
            'woocommerce_before_single_product' => '1 - Before product',
            'woocommerce_before_single_product_summary' => '2 - Before product summary',
            'woocommerce_single_product_summary' => '3 - Product summary',
            'woocommerce_before_add_to_cart_form' => '4 - Before add to cart form',
            'woocommerce_after_add_to_cart_form' => '5 - After add to cart form',
            'woocommerce_product_meta_start' => '6 - Product meta start',
            'woocommerce_product_meta_end' => '7 - Product meta end',
            'woocommerce_share' => '8 - Share',
            'woocommerce_product_thumbnails' => '9 - Product thumbnails',
            'woocommerce_product_tabs' => '10 - Product tabs',
            'woocommerce_after_single_product_summary' => '11 - After product summary',
            'woocommerce_after_single_product' => '12 - After single product'
        );
    }

    public function activated( $key )
    {
        $option = get_option( 'arplay_plugin' );

        return isset( $option[ $key ] ) ? $option[ $key ] : false;
    }

}