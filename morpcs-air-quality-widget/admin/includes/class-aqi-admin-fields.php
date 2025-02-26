<?php

/**
 * Defines the admin fields functionality of the plugin.
 *
 * @link       http://morpc.gohio.com
 * @since      1.0.0
 *
 * @package    Aqi_Widget
 * @subpackage Aqi_Widget/admin
 * @author     Mid-Ohio Regional Planning Commission <gohio@morpc.org>
 */

class Aqi_Admin_Fields {

    public function __construct() {}

    public function select_field_callback($args) {
    	$option = get_option($args['option_name']);
    	$items = $args['items'];

    	echo "<select id='" . $args['option_name'] . "' name='" . $args['option_name'] . "'>";

    	foreach($items as $item) {
    		$selected = ($option==$item) ? 'selected="selected"' : '';
    		echo "<option value='" . $item . "' " . $selected . ">" . $item . "</option>";
    	}

    	echo "</select>";
    }

	public function radio_field_callback($args) {
		$option = get_option($args['option_name']);
		$items = $args["items"];

		foreach($items as $item) {
			$checked = ($option==$item) ? ' checked="checked" ' : '';
			echo "<label><input id='" . $args['option_name'] . "'" . $checked . " value='" . $item . "' name='" . $args['option_name'] . "' type='radio' />" . $item . "</label><br />";
		}
	}

	public function text_field_callback($args) {
		$option = get_option($args['option_name']);

		echo "<input id='" . $args['option_name'] . "' name='" . $args['option_name'] . "' size='" . $args['field_size'] . "' type='text' value='" . $option . "'" . $args['required'] . " />";
	}

    public function number_field_callback($args) {
		$option = get_option($args['option_name']);

		echo "<input id='" . $args['option_name'] . "' name='" . $args['option_name'] . "' type='number' style='width:5em;' value='" . $option . "'" . $args['required'] . " />";
	}

}
