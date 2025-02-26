<?php

/**
 * @package  Arplay
 */

namespace IncArplay\Api\Callbacks;

class WoocommerceCallbacks
{

	public function wooProductMetabox($path, $status)
    {

        $output = 'Enter path to model and update product.';
        $output .= '<br />';
        $output .=  '<input type="text" style="width:100%" name="product_arplay_path" value="'.$path.'" placeholder="path/to/model.zip" />';
        $output .=  '<br />';
        $output .=  '<br />';
        $output .=  '<span class="arplay_red">STATUS: <strong>'.$status.'</strong></span>';
        $output .=  '<br />';
        $output .=  'NOTE: Leave blank to disable link to model.';

        return $output;

    }

    public function wooProductLink($path)
    {

        $option = get_option('arplay_woocommerce');

        $width = $option['code_size'];
        if ($width == ''){
            $width = 150;
        }
        $margin_left = ceil ( $width * 0.08 );

        // get uuid
        $settings = get_option('arplay_plugin');
        $uuid = (isset($settings)) ? $settings['uuid'] : '';
        // get urls
        $app_url = get_option('arplay_app_url');
        $api_url = get_option('arplay_api_url');

        // url for button
        $btn_url = $app_url . '/' . $uuid . '/' .$path;

        $output = '<div class="arplay-qr-wrap arplay-qr" style="margin-left: -' . $margin_left . 'px"><img src="' . $api_url . '/generate-qr?userId=' . $uuid . '&modelName=' . $path . '" alt="AR Play" width="' . $width . '"/><span style="margin-left: ' . $margin_left . 'px">' . $option['qr_text'] . '</span></div>';
        $output .= '<a href="' . $btn_url. '" class="arplay-btn">' . $option['button_text'] . '</a>';

        return $output;

    }

}