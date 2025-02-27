<?php

/**
 * Tyres feature
 *
 * @since      1.0.0
 * @package    TyresAddict
 * @subpackage TyresAddict/Finder/includes
 * @author     TyresAddict
 * @link       http://b2b.tyresaddict.com
 */

namespace TyresAddict\TCM;


class FeatureTyres
{
	function __construct() 
	{
		add_filter( 'rwmb_meta_boxes', [ $this, 'rwmb_meta_boxes' ] );
		add_action( 'add_meta_boxes' , [ $this, 'filter_metaboxes' ], 50 );
	}

	// create metaboxes with tyre specification fields

	public function rwmb_meta_boxes( $meta_boxes ) 
	{
		$brands = DB::tyre_brands();
		$models = [];

		$tyre_meta_box = [
			'id'  			=> 'tyre_spec',
			'title'  		=> __( 'Tyre Specification', Plugin::lang ),
			'post_types' 	=> ['product'],
			'fields' => [
				[
					'id'   => 'tyre_brand',
					'name' => __( 'Tyre Brand', Plugin::lang ),
					'type' => 'text',
					'datalist' => [
						'options' => $brands
					],
					'class'	=> 'tcm-tyre_brand',
				],
				[
					'id'   => 'tyre_model',
					'name' => __( 'Tyre Model', Plugin::lang ),
					'type' => 'text',
					'datalist' => [
						'options' => $models
					],
					'class'	=> 'tcm-tyre_model',
				],
				[
					'id'	=> 'car_type',
					'name'	=> __( 'Car Type', Plugin::lang ),
					'type'	=> 'text',
					'datalist' => [
						'options' => [
							'None' 			=> __( 'None', Plugin::lang ),
							'Passenger' 	=> __( 'Passenger', Plugin::lang ),
							'SUV' 			=> __( 'SUV', Plugin::lang ),
							'Commercial' 	=> __( 'Commercial', Plugin::lang ),
							'Moto' 			=> __( 'Moto', Plugin::lang ),
							'Truck' 		=> __( 'Truck', Plugin::lang ),
							'OTR' 			=> __( 'OTR', Plugin::lang ),
						],
					],
					'class'	=> 'tcm-car_type',
				],
				[
					'id'	=> 'suv_type',
					'name'	=> __( 'SUV tyre type', Plugin::lang ),
					'type'	=> 'text',
					'datalist' => [
						'options' => [
							__( 'None', Plugin::lang ),
							__( 'AT (All Terrain)', Plugin::lang ),
							__( 'MT (Mud Terrain)', Plugin::lang ),
							__( 'HT (Half-Terrain)', Plugin::lang ),
							__( 'HP (High Performance)', Plugin::lang ),
						],
					],
					'class'	=> 'tcm-suv_type',
				],
				[
					'id'	=> 'season',
					'name'	=> __( 'Tyre Season', Plugin::lang ),
					'type'	=> 'select',
					'options' => [
						'None' 			=> __( 'None', Plugin::lang ),
						'Summer' 		=> __( 'Summer', Plugin::lang ),
						'Winter' 		=> __( 'Winter', Plugin::lang ),
						'All Season' 	=> __( 'All Season', Plugin::lang ),
					],
					'class'	=> 'tcm-season',
				],
				[
					'id'	=> 'stud',
					'name'	=> __( 'Studded', Plugin::lang ),
					'type'	=> 'select',
					'options' => [
						'on'	=> __( 'on', Plugin::lang ),
						'off'	=> __( 'off', Plugin::lang ),
					],
					'class'	=> 'tcm-stud',
				],
				[	'type' => 'divider'	],
				[
					'id'   => 'tyre_spec',
					'name' => __( 'Tyre Specification', Plugin::lang ),
					'type' => 'text',
					'class'	=> 'tcm-tyre_spec',
				],
				[
					'id'   => 'width',
					'name' => __( 'Width', Plugin::lang ),
					'type' => 'number',
					'step' => '0.5',
					'datalist' => [
						'options' => DB::tyre_width(),
					],
				],
				[
   	                'id'   => 'profile',
       	            'name' => __( 'Profile', Plugin::lang ),
           	        'type' => 'number',
					'datalist' => [
						'options' => DB::tyre_profile(),
					],
				],
				[
   	                'id'   => 'diameter',
       	            'name' => __( 'Diameter', Plugin::lang ),
           	        'type' => 'number',
					'step' => '0.1',
					'datalist' => [
						'options' => DB::tyre_r(),
					],
				],
				[
   	                'id'   => 'load_index',
       	            'name' => __( 'Load Index', Plugin::lang ),
           	        'type' => 'number',
					'datalist' => [
						'options' => DB::tyre_i_load(),
					],
				],
				[
					'id'   => 'speed_index',
					'name' => __( 'Speed Index', Plugin::lang ),
					'type' => 'text',
					'datalist' => [
						'options' => DB::tyre_i_speed(),
					],
				],
				[	'type' => 'divider'	],
				[
					'id'   => 'production_year',
					'name' => __( 'Production Year', Plugin::lang ),
					'type' => 'number',
					'datalist' => [
						'options' => DB::tyre_year(),
					],
					'class'	=> 'tcm-production_year',
				],
			],
		];
	
		$tyre_meta_box = apply_filters( 'tcm_metabox_tyres', $tyre_meta_box );
		$meta_boxes[] = $tyre_meta_box;

		return $meta_boxes;
	}


	static function filter_metaboxes( $type )
	{
	    if ( !Woo::allow_metabox( 'tyre' ))
	    	remove_meta_box( 'tyre_spec' , 'product' , 'normal' );
	}

	static public function woocommerce_product_meta_end()
	{
	    if ( !Woo::allow_metabox( 'tyre' ))
	    	return;

		if ( PluginOptions::value('show_brand_model') ) {
			$meta = rwmb_meta( 'tyre_brand' );
			if ( $meta && $meta != '' )
				echo "<div class='js-tyre-brand'>" . __( 'Tyre brand:', Plugin::lang ) . " <span>" . esc_html__( $meta, Plugin::lang ) . "</span></div>";

			$meta = rwmb_meta( 'tyre_model' );
			if ( $meta && $meta != '' )
				echo "<div class='js-tyre-brand'>" . __( 'Tyre model:', Plugin::lang ) . " <span>" . esc_html__( $meta, Plugin::lang ) . "</span></div>";
		}

		if ( PluginOptions::value('show_season') ) {
			$meta = rwmb_meta( 'season' );
			if ( $meta && $meta != 'None' )
				echo "<div>" . __( 'Season:', Plugin::lang ) . " <span>" . esc_html__( $meta, Plugin::lang ) . "</span></div>";

			if ( $meta && $meta == 'Winter' )
			{
				$meta = rwmb_meta( 'stud' );
				if ( $meta && $meta == 'on' )
					echo "<div>" . __( 'Studded:', Plugin::lang ) . " <span>" . esc_html__( 'yes', Plugin::lang ) . "</span></div>";
				else
					echo "<div>" . __( 'Studded:', Plugin::lang ) . " <span>" . esc_html__( 'no', Plugin::lang ) . "</span></div>";
			}
		}

		if ( PluginOptions::value('show_car_type') ) {
			$meta = rwmb_meta( 'car_type' );
			if ( $meta && $meta != 'None' )
				echo "<div>" . __( 'Car Type:', Plugin::lang ) . " <span>" . esc_html__( $meta, Plugin::lang ) . "</span></div>";
		}

		if ( PluginOptions::value('show_suv_type') ) {
			$meta = rwmb_meta( 'suv_type' );
			if ( $meta && $meta != 'None' )
				echo "<div>" . __( 'SUV Type:', Plugin::lang ) . " <span>" . esc_html__( $meta, Plugin::lang ) . "</span></div>";
		}

		if ( PluginOptions::value('show_spec_full') ) {
			if ( $meta = rwmb_meta( 'tyre_spec' ) )	echo '<div>' . __( 'Specification:', Plugin::lang ) . " <span>$meta</span></div>";
		}

		if ( PluginOptions::value('show_spec_size') ) {
			if ( $meta = rwmb_meta( 'width' ) )		echo '<div>' . __( 'Width:', Plugin::lang ) . " <span>$meta</span></div>";
			if ( $meta = rwmb_meta( 'profile' ) )	echo '<div>' . __( 'Profile:', Plugin::lang ) . " <span>$meta</span></div>";
			if ( $meta = rwmb_meta( 'diameter' ) )	echo '<div>' . __( 'Diameter:', Plugin::lang ) . " <span>$meta''</span></div>";
		}

		if ( PluginOptions::value('show_indexes') ) {
			if ( $meta = rwmb_meta( 'load_index' ) )	
				echo '<div>' . __( 'Load Index:', Plugin::lang ) . " <span>" . $meta . " (" . FeatureTyres::human_load_index( $meta ) . ")</span></div>";

			if ( $meta = rwmb_meta( 'speed_index' ) )	
				echo '<div>' . __( 'Speed Index:', Plugin::lang ) . " <span>" . $meta . " (" . FeatureTyres::human_speed_index( $meta ) . ")</span></div>";
		}

		if ( PluginOptions::value('show_year') ) {
			if ( $meta = rwmb_meta( 'production_year' ) )	echo '<div>' . __( 'Year:', Plugin::lang ) . " <span>$meta</span></div>";
		}

		do_action('tcm_product_meta_end');
	}

	function woocommerce_display_product_attributes( $product_attrs, $product ) 
	{
	    if ( !Woo::allow_metabox( 'tyre' ))
		    return $product_attrs;
	    	
		if ( $meta = rwmb_meta( 'season' ) )		$product_attrs[ 'attribute_' . 'season' ] = [ 'label' => __( 'Tyre Season', Plugin::lang ), 'value' => $meta ];

		if ( $meta = rwmb_meta( 'tyre_spec' ) )		$product_attrs[ 'attribute_' . 'tyre_spec' ] = [ 'label' => __( 'Tyre Size', Plugin::lang ), 'value' => $meta ];

		if ( $meta = rwmb_meta( 'width' ) )			$product_attrs[ 'attribute_' . 'width' ] = [ 'label' => __( 'Width', Plugin::lang ), 'value' => $meta ];
		if ( $meta = rwmb_meta( 'profile' ) )		$product_attrs[ 'attribute_' . 'profile' ] = [ 'label' => __( 'Profile', Plugin::lang ), 'value' => $meta ];
		if ( $meta = rwmb_meta( 'diameter' ) )		$product_attrs[ 'attribute_' . 'diameter' ] = [ 'label' => __( 'Diameter', Plugin::lang ), 'value' => $meta ];
	
		if ( $meta = rwmb_meta( 'load_index' ) )	$product_attrs[ 'attribute_' . 'load_index' ] = [ 'label' => __( 'Load Index', Plugin::lang ), 'value' => $meta ];
		if ( $meta = rwmb_meta( 'speed_index' ) )	$product_attrs[ 'attribute_' . 'speed_index' ] = [ 'label' => __( 'Speed Index', Plugin::lang ), 'value' => $meta ];

	    return $product_attrs;
	}

	// convert tyre speed index to human-readable string

	static public function human_speed_index( $index )
	{
		$interface['speed_rating'] = [ 	'J' => '100',
								'K' => '110',
								'L' => '120',
								'M' => '130',
								'N' => '140',
								'P' => '150',
								'Q' => '160',
								'R' => '170',
								'S' => '180',
								'T' => '190',
								'U' => '200',
								'H' => '210',
								'V' => '240',
								'W' => '270',
								'Y' => '300',
								'Z' => '>240',
								'ZR' => '>240', 
							];

		$kmh = __( 'km\h', Plugin::lang );

		if (!isset($interface['speed_rating'][$index]))
			return '';
		else
		    return $interface['speed_rating'][$index] . ' ' . $kmh;
	}
	
	// convert tyre load index to human-readable string

	static public function human_load_index( $index )
	{
		$indexes = [
			'50' => '190',
			'51' => '195',
			'52' => '200',
			'53' => '206',
			'54' => '212',
			'55' => '218',
			'56' => '224',
			'57' => '230',
			'58' => '236',
			'59' => '243',
			'60' => '250',
			'61' => '257',
			'62' => '265',
			'63' => '272',
			'64' => '280',
			'65' => '290',
			'66' => '300',
			'67' => '307',
			'68' => '315',
			'69' => '325',
			'70' => '335',
			'71' => '345',
			'72' => '355',
			'73' => '365',
			'74' => '375',
			'75' => '387',
			'76' => '400',
			'77' => '412',
			'78' => '425',
			'79' => '437',
			'80' => '450',
			'81' => '462',
			'82' => '475',
			'83' => '487',
			'84' => '500',
			'85' => '515',
			'86' => '530',
			'87' => '545',
			'88' => '560',
			'89' => '580',
			'90' => '600',
			'91' => '615',
			'92' => '630',
			'93' => '650',
			'94' => '670',
			'95' => '690',
			'96' => '710',
			'97' => '730',
			'98' => '750',
			'99' => '775',
			'100' => '800',
			'101' => '825',
			'102' => '850',
			'103' => '875',
			'104' => '900',
			'105' => '925',
			'106' => '950',
			'107' => '975',
			'108' => '1000',
			'109' => '1030',
			'110' => '1060',
			'111' => '1090',
			'112' => '1120',
			'113' => '1150',
			'114' => '1180',
			'115' => '1215',
			'116' => '1250',
			'117' => '1285',
			'118' => '1320',
			'119' => '1360',
			'120' => '1400',
			'121' => '1450',
			'122' => '1500',
			'123' => '1550',
			'124' => '1600',
			'125' => '1650',
			'126' => '1700',
			'127' => '1750',
			'128' => '1800',
			'129' => '1850',
			'130' => '1900',
			'131' => '1950',
			'132' => '2000',
			'133' => '2060',
			'134' => '2120',
			'135' => '2180',
			'136' => '2240',
			'137' => '2300',
			'138' => '2360',
			'139' => '2430',
			'140' => '2500',
			'141' => '2575',
			'142' => '2650',
			'143' => '2725',
			'144' => '2800',
			'145' => '2900',
			'146' => '3000',
			'147' => '3075',
			'148' => '3150',
			'149' => '3250',
			'150' => '3350',
			'151' => '3450',
			'152' => '3550',
			'153' => '3650',
			'154' => '3750',
			'155' => '3875',
			'156' => '4000',
			'157' => '4125',
			'158' => '4250',
			'159' => '4375',
			'160' => '4500',
			'161' => '4625',
			'162' => '4750',
			'163' => '4875',
			'164' => '5000',
			'165' => '5150',
			'166' => '5300',
			'167' => '5450',
			'168' => '5600',
			'169' => '5800',
		];

		$kg = __( 'kg', Plugin::lang );

		if (!isset($indexes[$index]))
			return '';
		else
		    return $indexes[$index] . ' ' . $kg;
	}

}



