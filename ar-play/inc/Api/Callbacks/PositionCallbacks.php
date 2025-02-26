<?php

/**
 * @package  Arplay
 */

namespace IncArplay\Api\Callbacks;

use IncArplay\Base\BaseController;

class PositionCallbacks extends BaseController
{
	public function sanitizePositions( $input )
	{
		$output = array();

        $output['arplay_woocommerce']['code_size'] = sanitize_text_field( $input['arplay_woocommerce']['code_size'] );
        $output['arplay_woocommerce']['position'] = sanitize_text_field( $input['arplay_woocommerce']['position'] );

		return $output;

	}

    public function codeSize()
    {
        $option = get_option('arplay_woocommerce');
        $code_size = (isset($option)) ? $option['code_size'] : '';

        echo '<br><input type="number" min="100" max="300" required id="code_size" name="arplay_woocommerce[code_size]" value="'.$code_size.'" style="width: 300px"/><br><span style="margin-left: 10px">Width / Height in pixels</span>';
    }

    public function qrText()
    {
        $option = get_option('arplay_woocommerce');
        $qr_text = (isset($option)) ? $option['qr_text'] : '';

        echo '<br><input type="text" id="qr_text" name="arplay_woocommerce[qr_text]" value="'.$qr_text.'" style="width: 300px"/><br><span style="margin-left: 10px">Text to show bellow QR code</span>';
    }

    public function btnText()
    {
        $option = get_option('arplay_woocommerce');
        $button_text = (isset($option)) ? $option['button_text'] : '';

        echo '<br><input type="text" id="button_text" name="arplay_woocommerce[button_text]" value="'.$button_text.'" style="width: 300px" required /><br><span style="margin-left: 10px">Text to show on mobile link</span>';
    }

	public function selectPosition( $args )
	{
        $value = $args['option_value'];
		$option_name = $args['option_name'];
        $option_node = $args['option_node'];
		$get_option = get_option( $option_name );
        $selected_option = $get_option[$option_node];
		$checked = ($selected_option == $value) ? true : false;

		echo '<input type="radio" id="' . $option_name . '" name="' . $option_name . '['.$option_node.']" value="' . $value . '"' . ( $checked ? 'checked' : '') . ' />';
	}
}