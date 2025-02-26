<?php

class ACF_Frontend_Display_Fields {

	function __construct()
	{
		add_shortcode('cats_field', array( $this, 'acf_frontend_display_shortcode'));
	}

	function acf_frontend_display_shortcode( $atts ) 
	{
		$atts = shortcode_atts( array(
				'group_id' => '',
				'field' => '',
				'auto_loop' => '',
				'excerpt' => '',
				'post_id' => ''
			), $atts);

		return $this->_process_func( $atts );
	}

	function _process_func( $atts )
	{		
		// init fields array with default params
		$fields[] = array( 
			'label' => get_field_object($atts['field'])['label'],
			'name' => $atts['field'] );

		// condition: group_id not empty and auto_loop = yes
		if ( !empty($atts['group_id']) && !empty($atts['auto_loop']) && $atts['auto_loop'] === 'yes' )
		{
			array_splice($fields, 0);

			$_fields = apply_filters( 'acf/field_group/get_fields', array(), $atts['group_id'] );

			// excerpt not empty
			if ( !empty($atts['excerpt']) )
			{
				foreach ($_fields as $key => $field) 
				{
					if ( $atts['excerpt'] != $field['name'] )
					{
						$fields[] = array(
							'label' => $field['label'],
							'name' => $field['name'] );
					}
				}
			}
			else // excerpt is empty
			{
				foreach ( $_fields as $field ) 
				{
					$fields[] = array(
						'label' => $field['label'],
						'name' => $field['name'] );
				}
			}
		}

		return $this->_show_fields_val( $fields, $atts );
	}

	function _show_fields_val( $fields, $atts )
	{
		$_fields_str = '<p>'; // html string data

		foreach ($fields as $field) 
		{
			switch ( $field['name'] ) {
				case 'checkbox': // convert array values to string values
					$_fields_str .= $field['label'] . ': ' . implode( ', ', get_field( $field['name'], $atts['post_id'] ) ) . '<br>';
					break;
				case 'calendar': // format string to date 
					$date = new DateTime( get_field( $field['name'], $atts['post_id'] ) );
					$_fields_str .= $field['label'] . ': ' . $date->format('j M Y') . '<br>';
					break;
				case 'editor': // format string to date 
					$result = "Sorry, FREE version do not support Image field type. Please upgrade to PRO version.";
					$_fields_str .= $result;
					break;
				case 'image': // handle image field
					$result = "Sorry, FREE version do not support Image field type. Please upgrade to PRO version.";
					$fields_str .= $result;
					break;
				case 'file': // handle image field
					$result = "Sorry, FREE version do not support File field type. Please upgrade to PRO version.";
					$fields_str .= $result;
					break;
				default: // for all fields
					$_fields_str .= $field['label'] . ': ' . get_field( $field['name'], $atts['post_id'] ) . '<br>';
					break;
			}
		}		

		$_fields_str .= '</p>';

		return $_fields_str;
	}
}

$ACF = new ACF_Frontend_Display_Fields();