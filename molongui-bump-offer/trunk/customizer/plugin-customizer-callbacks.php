<?php
if ( !defined( 'ABSPATH' ) ) exit;
function molongui_order_bump_sanitize_setting( $input, $setting )
{
	$setting_type = $setting->manager->get_control( $setting->id )->type;
	$choices = $setting->manager->get_control( $setting->id )->choices;
	if ( !empty( $choices ) )
	{
		$accepted = array();
		foreach ( $choices as $choice => $atts )
		{
			if ( !isset( $atts['premium'] ) or ( isset( $atts['premium'] ) and !$atts['premium'] ) ) $accepted[] = $choice;
		}
		if ( in_array( $input, $accepted ) ) return $input;
		if ( $setting_type == 'molongui-image-checkbox' or $setting_type == 'molongui-compact-image-checkbox' )
		{
			if ( !empty( $input ) )
			{
				$input_values = explode( ',', $input );
				foreach ( $input_values as $key => $input_value )
				{
					if ( !in_array( $input_value, $accepted ) ) unset( $input_values[$key] );
				}
			}
			else return $input;
			return implode(',', $input_values );
		}
		$box = get_option( MOLONGUI_BUMP_OFFER_XXXX_SETTINGS );
		preg_match('/\[(.*?)\]/', $setting->id, $setting_name);
		if ( isset( $box[$setting_name[1]] ) and !empty( $box[$setting_name[1]] ) )
		{
			if ( in_array( $box[$setting_name[1]], $accepted ) ) return $box[$setting_name[1]];
		}
		return $setting->default ;
	}
	else
	{
		if ( $setting_type == 'molongui-color' ) $input = molongui_sanitize_color( $input );
		$input_attrs = $setting->manager->get_control( $setting->id )->input_attrs;
		if ( !isset( $input_attrs['premium'] ) or ( isset( $input_attrs['premium'] ) and !$input_attrs['premium'] ) ) return $input;
		else return $setting->default ;
	}
}

// TODO...