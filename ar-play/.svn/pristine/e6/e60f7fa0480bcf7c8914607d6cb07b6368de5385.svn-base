<?php

/**
 * @package  Arplay
 */

namespace IncArplay\Base;

use IncArplay\Api\SettingsApi;
use IncArplay\Base\BaseController;
use IncArplay\Api\Callbacks\AdminCallbacks;

class ShortcodeController extends BaseController
{

	public $settings;

	public $callbacks;

	public $subpages = array();

	public $custom_post_types = array();

	public function register()
	{
		if ( ! $this->activated( 'arplay_shortcode' ) ) return;

		$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();

		$this->setSubpages();

		$this->settings->addSubPages( $this->subpages )->register();

		add_shortcode('arplay', array( $this, 'arplayShortcode' ));

	}


	function arplayShortcode($atts = array(), $link = null) {

		// get uuid
		$settings = get_option('arplay_plugin');
		$uuid = (isset($settings)) ? $settings['uuid'] : '';
		// get urls
        $app_url = get_option('arplay_app_url');
		$api_url = get_option('arplay_api_url');

		// get class option
		extract( shortcode_atts ( array('class' => ''), $atts ) );
        // url for button
        $btn_url = $app_url . '/' . $uuid . '/' .$link;

        $option = get_option('arplay_woocommerce');

        $width = $option['code_size'];
        if ($width == ''){
            $width = 150;
        }

        if ($class) {
            $margin_left = 0;
        } else {
            $margin_left = ceil ( $width * 0.08 );
        }

        $output = '<div class="arplay-qr-wrap arplay-qr" style="margin-left: -' . $margin_left . 'px"><img src="' . $api_url . '/generate-qr?userId=' . $uuid . '&modelName=' . $link . '" alt="AR Play" width="' . $width . '" class="' . $class . '"/><span style="margin-left: ' . $margin_left . 'px">' . $option['qr_text'] . '</span></div>';
        $output .= '<a href="' . $btn_url. '" class="arplay-btn">' . $option['button_text'] . '</a>';

		return $output;
	}


	public function setSubpages()
	{
		$this->subpages = array(
			array(
				'parent_slug' => 'arplay_settings',
				'page_title' => 'AR Play Shortcode',
				'menu_title' => 'Shortcode',
				'capability' => 'manage_options', 
				'menu_slug' => 'arplay_shortcode',
				'callback' => array( $this->callbacks, 'adminShortcode' )
			)
		);
	}

}