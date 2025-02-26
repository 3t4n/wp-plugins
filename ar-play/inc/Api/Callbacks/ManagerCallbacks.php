<?php

/**
 * @package  Arplay
 */

namespace IncArplay\Api\Callbacks;

use IncArplay\Base\BaseController;

class ManagerCallbacks extends BaseController
{
	public function sanitizeSettings( $input )
	{
		$output = array();

		foreach ( $this->managers as $key => $value ) {
			$output[$key] = isset( $input[$key] ) ? true : false;
		}

       // $sanitized_input['uuid'] = sanitize_text_field( $input['uuid'] );

        $output['uuid'] = sanitize_text_field( $input['uuid'] );


		return $output;
	}

    public function textInputSanitize( $input )
    {
        $new_input = array();

        if( isset( $input['uuid'] ) )
            $new_input['uuid'] = sanitize_text_field( $input['uuid'] );

        return $new_input;
    }

    public function adminSettingsManager()
    {
        echo 'Manage the Sections of this Plugin by activating the checkboxes from the following list. Provide the UUID for AR Play (mandatory).';
    }

	public function adminSectionManager()
	{
		echo 'Manage the Sections and Features of this Plugin by activating the checkboxes from the following list.';
	}

    public function adminUUIDManager()
    {
        echo 'Provide the UUID for AR Play.';
    }

    public function uuidField()
    {

        $option = get_option('arplay_plugin');
        $uuid = (isset($option)) ? $option['uuid'] : '';

        echo '<input type="text" id="uuid" name="arplay_plugin[uuid]" value="'.$uuid.'" style="width: 300px"/>';
    }

	public function checkboxField( $args )
	{
		$name = $args['label_for'];
		$classes = $args['class'];
		$option_name = $args['option_name'];
		$checkbox = get_option( $option_name );
		$checked = isset($checkbox[$name]) ? ($checkbox[$name] ? true : false) : false;

		echo '<div class="' . $classes . '"><input type="checkbox" id="' . $name . '" name="' . $option_name . '[' . $name . ']" value="0" class="" ' . ( $checked ? 'checked' : '') . '><label for="' . $name . '"><div></div></label></div>';
	}
}