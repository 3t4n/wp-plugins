<?php

/**
 * Wheels feature
 *
 * @since      1.0.0
 * @package    TyresAddict
 * @subpackage TyresAddict/Finder/includes
 * @author     TyresAddict
 * @link       http://b2b.tyresaddict.com
 */

namespace TyresAddict\TCM;


class FeatureWheels
{
	function __construct() 
	{
		add_filter( 'rwmb_meta_boxes', [ $this, 'rwmb_meta_boxes' ] );
		add_action( 'add_meta_boxes' , [ $this, 'filter_metaboxes' ], 50 );
	}

	public function rwmb_meta_boxes( $meta_boxes ) 
	{
		$meta_boxes[] = [
			'id'  			=> 'wheel_spec',
			'title'  		=> __( 'Wheel Specification', Plugin::lang ),
			'post_types' 	=> ['product'],
			'fields' => [
				[
					'id'   => 'wheel_brand',
					'name' => __( 'Wheel Brand', Plugin::lang ),
					'type' => 'text',
				],
				[
					'id'   => 'wheel_model',
					'name' => __( 'Wheel Model', Plugin::lang ),
					'type' => 'text',
				],
				[
					'id'   => 'wheel_spec',
					'name' => __( 'Wheel Specification', Plugin::lang ),
					'type' => 'text',
				],
				[
					'id'	=> 'wheel_type',
					'name'	=> __( 'Wheel Type', Plugin::lang ),
					'type'	=> 'select',
					'options' => [
						'None' 		=> __( 'None', Plugin::lang ),
						'Alloy' 	=> __( 'Alloy', Plugin::lang ),
						'Forged' 	=> __( 'Forged', Plugin::lang ),
						'Steel' 	=> __( 'Steel', Plugin::lang ),
					],
				],
				[	'type' => 'divider'	],
				[
					'id'   => 'width',
					'name' => __( 'Width', Plugin::lang ),
					'type' => 'number',
					'step' => '0.5',
					'datalist' => [
						'options' => [
							__( 'None', Plugin::lang ),
							3.5,4, 4.5, 5, 5.5, 6, 6.5, 7, 7.5, 8,
							8.5, 9, 9.5, 10, 10.5, 11, 11.5 
						],
					],
				],
				[
					'id'   => 'diameter',
					'name' => __( 'Diameter', Plugin::lang ),
					'type' => 'number',
					'step' => '0.5',
					'datalist' => [
						'options' => [
							__( 'None', Plugin::lang ),
							12,13,14,15,16,17,18,19,20,21,22,23,24
						],
					],
				],
				[
					'id'   => 'pcd',
					'name' => __( 'Bolt Pattern/PCD', Plugin::lang ),
					'type' => 'text',
					'datalist' => [
						'options' => [
							__( 'None', Plugin::lang ),
							'3x98', '3x112',
							'4x100', '4x108', '4x114', '4x114.3', '4x98',
							'5x100', '5x105', '5x108', '5x110', '5x112', '5x114', '5x114.3', '5x115', '5x118',
							'5x120', '5x120.6', '5x127', '5x128','5x130', '5x135', '5x139.7',
							'5x150', '5x160', '5x165', '5x98',
							'6x114.3', '6x115', '6x120', '6x125', '6x127', '6x130', '6x132', '6x135', '6x139.7', '6x180',
							'8x165.1','8x170','8x180'
						],
					],
				],
				[
					'id'   => 'dia',
					'name' => __( 'DIA', Plugin::lang ),
					'type' => 'number',
					'step' => 'any',
					'datalist' => [
						'options' => [
							__( 'None', Plugin::lang ),
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
						],
					],
				],
				[
					'id'   	=> 'et',
					'name' 	=> __( 'ET', Plugin::lang ),
					'type' 	=> 'number',
					'min'	=> -300,	// not work with negative numbers without this
				],
				[
					'id'   => 'color',
					'name' => __( 'Color', Plugin::lang ),
					'type' => 'text',
				],
				[	'type' => 'divider'	],
				[
					'id'	=> 'wheel_production',
					'name'	=> __( 'Production', Plugin::lang ),
					'type'	=> 'select',
					'options' => [
						'none' 	=> __( 'none', Plugin::lang ),
						'on'	=> __( 'on', Plugin::lang ),
						'off'	=> __( 'off', Plugin::lang ),
					],
				],
			],
		];
	
		return $meta_boxes;
	}

	static function filter_metaboxes( $type )
	{
	    if ( !Woo::allow_metabox( 'wheel' ))
	    	remove_meta_box( 'wheel_spec' , 'product' , 'normal' );
	}

	public function woocommerce_product_meta_end()
	{
	    if ( !Woo::allow_metabox( 'wheel' ))
	    	return;

		if ( PluginOptions::value('show_wheel_brand_model') ) {
			$meta = rwmb_meta( 'wheel_brand' );
			if ( $meta && $meta != '' )
				echo "<div class='js-wheel-brand'>" . __( 'Wheel brand:', Plugin::lang ) . " <span>" . esc_html__( $meta, Plugin::lang ) . "</span></div>";

			$meta = rwmb_meta( 'wheel_model' );
			if ( $meta && $meta != '' )
				echo "<div class='js-wheel-brand'>" . __( 'Wheel model:', Plugin::lang ) . " <span>" . esc_html__( $meta, Plugin::lang ) . "</span></div>";
		}

		if ( PluginOptions::value('show_wheel_spec_full') ) {
			$meta = rwmb_meta( 'wheel_full_spec' );
			if ( $meta && $meta != 'None' )			echo '<div>' . __( 'Spec:', Plugin::lang ) . " <span>$meta</span></div>";
		}

		if ( PluginOptions::value('show_wheel_type') ) 
		{
			$meta = rwmb_meta( 'wheel_type' );
			if ( $meta && $meta != 'None' )
				echo "<div>" . __( 'Wheel type:', Plugin::lang ) . " <span>" . esc_html__( $meta, Plugin::lang ) . "</span></div>";
		}

		if ( PluginOptions::value('show_wheel_spec_size') ) 
		{
			if ( $meta = rwmb_meta( 'width' ) )		echo '<div>' . __( 'Width:', Plugin::lang ) . " <span>$meta''</span></div>";
			if ( $meta = rwmb_meta( 'diameter' ) )	echo '<div>' . __( 'Diameter:', Plugin::lang ) . " <span>$meta''</span></div>";

			if ( $meta = rwmb_meta( 'pcd' ) )		echo '<div>' . __( 'PCD:', Plugin::lang ) . " <span>$meta</span></div>";

			if ( $meta = rwmb_meta( 'dia' ) )		echo '<div>' . __( 'Dia:', Plugin::lang ) . " <span>$meta</span></div>";
			if ( $meta = rwmb_meta( 'et' ) )		echo '<div>' . __( 'ET:', Plugin::lang ) . " <span>$meta</span></div>";
		}

		if ( PluginOptions::value('show_wheel_color') ) {
			$meta = rwmb_meta( 'color' );
			if ( $meta && $meta != 'None' )			echo '<div>' . __( 'Color:', Plugin::lang ) . " <span>$meta</span></div>";
		}
	}

}



