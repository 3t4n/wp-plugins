<?php

/**
 * @package  Arplay
 */

namespace IncArplay\Base;

use IncArplay\Api\Callbacks\ManagerCallbacks;
use IncArplay\Api\Callbacks\PositionCallbacks;
use IncArplay\Api\Callbacks\WoocommerceCallbacks;
use IncArplay\Api\SettingsApi;
use IncArplay\Base\BaseController;
use IncArplay\Api\Callbacks\AdminCallbacks;

class WoocommerceController extends BaseController
{
	public $settings;

	public $callbacks;

	public $callbacks_woo;

    public $callbacks_positions;

	public $subpages = array();

	public function register()
	{
		if ( ! $this->activated( 'arplay_woo_widget' ) ) return;

		$this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

		$this->callbacks_woo = new WoocommerceCallbacks();

        $this->callbacks_positions = new PositionCallbacks();

        $this->callbacks_mngr = new ManagerCallbacks();

        $this->setSettings();
        $this->setSections();
        $this->setFields();

		$this->setSubpages();

		$this->settings->addSubPages( $this->subpages )->register();

        add_action('add_meta_boxes', array($this, 'add_arplay_metabox'), 30);
        add_action('edit_post', array($this, 'save_product_arplay_path'), 10, 2);

        $this->showArplay();

	}


    public function add_arplay_metabox() {
        add_meta_box('arplay-product-metabox', __('<span class="arplay_violet"><i class="dashicons dashicons-welcome-view-site" style="margin-right:7px"></i>AR Play</span>', 'wc-arplay'), array($this, 'arplay_product_metabox_callback'), 'product', 'side', 'high');
    }


    public function arplay_product_metabox_callback($product) {

        $is_arplay_exist = $this->isArplayExist($product->ID);
        $product_arplay_path = (!empty($is_arplay_exist)) ? $this->getProductArplayPath($product->ID) : '';
        $product_arplay_status = (!empty($is_arplay_exist)) ? 'Enabled' : 'Disabled';

        $output = $this->callbacks_woo->wooProductMetabox($product_arplay_path, $product_arplay_status);
        echo $output;
    }


    public function save_product_arplay_path($post_id, $post)
    {
        if ($post->post_type == 'product') {

            $product_arplay_path =  sanitize_text_field($_POST['product_arplay_path']);

            if (trim($product_arplay_path) != ''){

                update_post_meta($post_id, '_is_arplay_exist', 1);
                update_post_meta($post_id, '_product_arplay_path', $product_arplay_path);
            } else {

                delete_post_meta($post_id, '_is_arplay_exist');
                delete_post_meta($post_id, '_product_arplay_path');
            }

        }
    }


    public function isArplayExist($product_id)
    {
        return get_post_meta($product_id, '_is_arplay_exist', true);
    }


    public function getProductArplayPath($product_id)
    {
        return get_post_meta($product_id, '_product_arplay_path', true);
    }


    public function showArplay()
    {
        $get_option = get_option('arplay_woocommerce');
        $position = $get_option['position'];


        switch ($position){

            case 'woocommerce_product_tabs':
                $this->showArplayInTab();
                break;

            default:
                $this->showArplayInPosition($position);

        }
    }


    public function showArplayInPosition($position)
    {
        add_action( $position, array($this, 'arplay_product_position'), 10, 2 );
    }


    public function arplay_product_position(){

        global $product;

        $product_arplay_path = $this->getProductArplayPath($product->get_id());
        $output = $this->callbacks_woo->wooProductLink($product_arplay_path);

        $is_arplay_exist = $this->isArplayExist($product->get_id());

        if (!empty($is_arplay_exist)){
            echo $output;
        }
    }


    public function showArplayInTab()
    {
        add_filter('woocommerce_product_tabs', array(&$this, 'arplay_product_tab'));
    }


    public function arplay_product_tab($tabs) {

        $tabs['arplay_tab'] = array(
            'title' => apply_filters('arplay_account_title', __('AR Play', 'arplay')),
            'priority' => 50,
            'callback' => array(&$this, 'arplay_product_tab_content')
        );

        global $product;

        $is_arplay_exist = $this->isArplayExist($product->get_id());

        if (!empty($is_arplay_exist)){
            return $tabs;
        }
    }


    public function arplay_product_tab_content() {

        global $product;

        $product_arplay_path = $this->getProductArplayPath($product->get_id());
        $output = $this->callbacks_woo->wooProductLink($product_arplay_path);

        echo '<h2>'.__('AR Play', 'arplay').'</h2>';
        echo $output;
    }


    public function setSubpages()
    {
        $this->subpages = array(
            array(
                'parent_slug' => 'arplay_settings',
                'page_title' => 'AR Play for WooCommerce',
                'menu_title' => 'For WooCommerce',
                'capability' => 'manage_options',
                'menu_slug' => 'arplay_woocommerce',
                'callback' => array( $this->callbacks, 'adminWoocommerce' )
            )
        );
    }


    public function setSettings()
    {
        $args = array(
            array(
                'option_group' => 'arplay_woocommerce_settings',
                'option_name' => 'arplay_woocommerce',
                //'callback' => array( $this->callbacks_positions, 'sanitizePositions' )
            )
        );

        $this->settings->setSettings( $args );
    }


    public function setSections()
    {
        $args = array(
            array(
                'id' => 'arplay_admin_woocommerce',
                'title' => 'Select position on product page',
                //'callback' => array( $this->callbacks_mngr, 'adminSettingsManager' ),
                'page' => 'arplay_woocommerce'
            )
        );

        $this->settings->setSections( $args );
    }


    public function setFields()
    {

        $args = array();

        foreach ( $this->product_page_positions as $key => $value ) {
            $args[] = array(
                'id' => $key,
                'title' => $value,
                'callback' => array( $this->callbacks_positions, 'selectPosition' ),
                'page' => 'arplay_woocommerce',
                'section' => 'arplay_admin_woocommerce',
                'args' => array(
                    'option_name' => 'arplay_woocommerce',
                    'option_node' => 'position',
                    'option_value' => $key,
                    'option_display' => $value,
                )
            );

        }

        $args[] = array(
            'id' => 'code_size',
            'title' => '<br>QR code size',
            'callback' => array( $this->callbacks_positions, 'codeSize' ),
            'page' => 'arplay_woocommerce',
            'section' => 'arplay_admin_woocommerce',
            'args' => array(
                'option_name' => 'arplay_woocommerce',
                'label_for' => 'code_size',
                'class' => ''
            )
        );

        $args[] = array(
            'id' => 'qr_text',
            'title' => '<br>QR code text',
            'callback' => array( $this->callbacks_positions, 'qrText' ),
            'page' => 'arplay_woocommerce',
            'section' => 'arplay_admin_woocommerce',
            'args' => array(
                'option_name' => 'arplay_woocommerce',
                'label_for' => 'qr_text',
                'class' => ''
            )
        );

        $args[] = array(
            'id' => 'button_text',
            'title' => '<br>Mobile button text',
            'callback' => array( $this->callbacks_positions, 'btnText' ),
            'page' => 'arplay_woocommerce',
            'section' => 'arplay_admin_woocommerce',
            'args' => array(
                'option_name' => 'arplay_woocommerce',
                'label_for' => 'button_text',
                'class' => ''
            )
        );

        $this->settings->setFields( $args );
    }

}