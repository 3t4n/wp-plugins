<?php

/**
 * Option page of the plugin.
 *
 * @since      1.0.0
 * @package    TyresAddict/TyreFilter
 * @author     TyresAddict
 * @link       http://b2b.tyresaddict.com
 */

namespace TyresAddict\TyreFilter;


class PluginOptions
{
	const OptionGroup 	= 'tyresaddict_woo_tpf_options';

	const defaults = [	'category' 		=> '',
						];

	private $options 	= [];


	// get-set

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




