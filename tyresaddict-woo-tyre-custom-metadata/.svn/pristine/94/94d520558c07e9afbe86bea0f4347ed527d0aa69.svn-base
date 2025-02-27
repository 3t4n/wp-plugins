<?php

/**
 * DB\Data support
 *
 * @since      1.0.0
 * @package    TyresAddict\includes
 * @author     TyresAddict
 * @link       http://b2b.tyresaddict.com
 */

namespace TyresAddict\TCM;


class DB
{
	static function countries()
	{
		return [ 
			'' => __( 'None', Plugin::lang ),
			'CN' => __( 'China', Plugin::lang ),
			'FI' => __( 'Finland', Plugin::lang ),
			'FR' => __( 'France', Plugin::lang ),
			'DE' => __( 'Germany', Plugin::lang ),
			'IN' => __( 'India', Plugin::lang ),
			'JP' => __( 'Japan', Plugin::lang ),
			'ID' => __( 'Indonesia', Plugin::lang ),
			'IT' => __( 'Italy', Plugin::lang ),
			'RU' => __( 'Russia', Plugin::lang ),
			'KR' => __( 'South Korean', Plugin::lang ),
			'TW' => __( 'Taiwan', Plugin::lang ),
			'TH' => __( 'Thailand', Plugin::lang ),
			'US' => __( 'USA', Plugin::lang ),
		];
	}

	static function country_code( $code )
	{
		return DB::countries()[ $code ];
	}

	static function countries_list()
	{
		return array_values( DB::countries() );
	}

	// tyre size

	static public function tyre_width()
	{
		return [135,145,155,165,175,185,195,
				205,215,225,235,245,255,265,275,285,295,
				305,315,325,335,345,355,365];
	}

	static public function tyre_profile()
	{
		return [25,30,35,40,45,50,55,60,65,70,75,80,85,100];
	}

	static public function tyre_r()
	{
		return [12,13,14,15,16,17,18,19,20,21,22,23,24];
	}

	static public function tyre_i_speed()
	{
		return explode('|', "J|K|L|M|N|P|Q|R|S|T|U|H|V|W|Y|Z|ZR");
	}

	static public function tyre_i_load()
	{
		return range( 60, 130 );
	}

	static public function tyre_year()
	{
		return range( date("Y"), date("Y")-10, -1 );
	}

	// wheel size 

	static public function wheel_width()
	{
		return [ 3.5,4, 4.5, 5, 5.5, 6, 6.5, 7, 7.5, 8,
				8.5, 9, 9.5, 10, 10.5, 11, 11.5 ];
	}

	static public function wheel_r()
	{
		return [12,13,14,15,16,17,18,19,20,21,22,23,24];
	}

	public static function wheel_pcd()
	{
		return [ 	
			'3x98', '3x112',
			'4x100', '4x108', '4x114', '4x114.3', '4x98',
			'5x100', '5x105', '5x108', '5x110', '5x112', '5x114', '5x114.3', '5x115', '5x118',
			'5x120', '5x120.6', '5x127', '5x128','5x130', '5x135', '5x139.7',
			'5x150', '5x160', '5x165', '5x98',
			'6x114.3', '6x115', '6x120', '6x125', '6x127', '6x130', '6x132', '6x135', '6x139.7', '6x180',
			'8x165.1','8x170','8x180'
		];
	}

	public static function wheel_dia()
	{
		return [ 	
					48.1, 
					54, 54.1, 56, 56.1, 56.5, 56.6, 57.1, 58, 58.1, 58.5, 58.6, 59.1, 59.6, 
					60, 60.1, 63.1, 63.3, 63.4, 63.5, 64.1, 65, 65.1, 65.2, 66, 66.1, 66.5, 66.6, 66.7, 66.9, 67, 67.1, 68.1, 69.1, 69.5, 
					70.1, 70.2, 70.3, 70.4, 70.5, 70.6, 71.1, 71.4, 71.5, 71.6, 72.5, 72.6, 73.1, 73.8, 74.1, 75.1, 76, 77.7, 77.8, 78, 78.1, 78.3, 
					84, 84.1, 86, 86.5, 86.8, 87, 87.1, 89, 
					92.5, 93, 93.1, 95.3, 98.5, 
					100, 100.1, 100.3, 102.6, 105, 106, 106.1, 106.2, 107.1, 108, 108.1, 108.4, 108.5, 
					110, 110.1, 111, 113, 114.5, 116.1, 116.6, 117, 
					120.9, 124.1, 124.9, 125, 
					138.8
		];
	}

	static public function wheel_year()
	{
		return range( date("Y"), date("Y")-12, -1 );
	}

	static function tyre_brands()
	{
		return Woo::cache( Plugin::name . '-db-tyre_brand', 60, 'TyresAddict\TCM\Woo::meta_values', 'tyre_brand' );
	}

	static function wheel_brands()
	{
		return Woo::cache( Plugin::name . '-db-wheel_brand', 60, 'TyresAddict\TCM\Woo::meta_values', 'wheel_brand' );
	}
}


