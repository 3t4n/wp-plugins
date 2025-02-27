<?php

/**
 * Option page of the plugin.
 *
 * @since      1.0.0
 * @package    TyresAddict
 * @subpackage TyresAddict/Finder/includes
 * @author     TyresAddict
 * @link       http://b2b.tyresaddict.com
 */

namespace TyresAddict\TCM;



class PluginOptions
{
	const OptionGroup 	= 'tyresaddict_woo_tcm_options';

	const defaults = [	'show_spec_full' 	=> true,
						'show_spec_size' 	=> true,
						'show_brand_model' 	=> true,
						'show_car_type' 	=> true,
						'show_season' 		=> true,
						'show_indexes' 		=> true,
						'tyre_category' 		=> '',
						'tyre_category_id' 		=> 0,

						'show_wheel_brand_model'	=> true,
						'show_wheel_spec_full'		=> true,
						'show_wheel_spec_size'		=> true,
						'show_wheel_type' 			=> true,
						'show_wheel_color' 			=> true,
						'wheel_category' 		=> 'no-disable',
						'wheel_category_id' 	=> -1,

						'custom_css' 		=> '',
						];

	private $options = [];


	static function value( $field ) 
	{
		$options = get_option( PluginOptions::OptionGroup );
		
		if ( false === $options )
			return PluginOptions::defaults[ $field ];

		if ( !isset( $options[ $field ] ) )
			return PluginOptions::defaults[ $field ];

		return $options[ $field ];
	}

	static function update( $field, $value ) 
	{
		$options = get_option( PluginOptions::OptionGroup );

		if ( false === $options ) 
			$options = [];
		
		$options[ $field ] = $value;
		update_option( PluginOptions::OptionGroup, $options );
	}
}




