<?php

/**
 * Database support
 *
 * @since      1.0.0
 * @package    TyresAddict/TyreFilter
 * @author     TyresAddict
 * @link       http://b2b.tyresaddict.com
 */

namespace TyresAddict\TyreFilter;

// DB class

class DB 
{

	public static function seasons()
	{
		return [ 	'Summer' 	=> __('Summer', Plugin::lang), 
					'Winter' 	=> __('Winter', Plugin::lang),
					'All Season' => __('All Season', Plugin::lang),
				];
	}

	public static function tyre_width()
	{
		return [135,145,155,165,175,185,195,
				205,215,225,235,245,255,265,275,285,295,
				305,315,325,335,345,355,365];
	}

	public static function tyre_profile()
	{
		return [25,30,35,40,45,50,55,60,65,70,75,80,85,100];
	}

	public static function tyre_r()
	{
		return [12,13,14,15,16,17,18,19,20,21,22,23,24];
	}

	static function brands()
	{
		return DB::meta_values( 'tyre_brand' );
	}

	static function car_types_all()
	{
		return [ 	'Passenger' 	=> __('Passenger', Plugin::lang), 
					'SUV' 			=> __('SUV', Plugin::lang),
					'Commercial'	=> __('Commercial', Plugin::lang),
					'Moto'			=> __('Moto', Plugin::lang),
					'Truck'			=> __('Truck', Plugin::lang),
				];
	}
	
	static function car_types()
	{
		return array_intersect( [ "Passenger", "SUV", "Commercial", "Moto", "Truck" ], DB::meta_values( 'car_type' ) );
	}

	static function meta_values( $key, $type = 'product', $status = 'publish' ) 
	{
		global $wpdb;
		
		if( empty( $key ) )
			return;

		$sql = "SELECT pm.meta_value 
				FROM {$wpdb->postmeta} pm
				LEFT JOIN {$wpdb->posts} p ON p.ID = pm.post_id
				WHERE pm.meta_key = '%s' 
					AND p.post_status = '%s' 
					AND p.post_type = '%s'
				GROUP BY pm.meta_value";

		$r = $wpdb->get_results( $wpdb->prepare( $sql, $key, $status, $type ) );

		$metas = [];
	    foreach ( $r as $my_r )
    	    $metas[] = $my_r->meta_value;

		return $metas;
	}

}                                  





