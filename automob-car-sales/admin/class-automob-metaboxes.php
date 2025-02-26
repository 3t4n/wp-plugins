<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class Automob_Metaboxes{
	private $prefix = '_am_';

	public function add_tabs_markup(){
	    ob_start(); 
			$template_loader  = new AutomobTemplateManager(); 
			$template_loader->get_template_part( 'admin/element-tabs' );
			$contents = ob_get_contents();
		ob_end_clean();
		echo $contents;
	}


	public function add_images_metabox() {
		$cmb = new_cmb2_box( array(
			'id'           => $this->prefix . 'images-metabox',
			'title'        => __( 'Vehicle Image Gallery', 'cmb2' ),
			'object_types' => array( AUTOMOB_CPT_CAR ),
			'context'      => 'side',
			'priority'     => 'default',
		) );
		$cmb->add_field( array(
			'id' => $this->prefix. 'images',
			'description' => 'Recommended image sizes: 800x600 for image gallery',
			'type' => 'file_list',
		) );
	}

	public function add_showroom_ribbons_metabox() {
		$cmb = new_cmb2_box( array(
			'id'           => $this->prefix . 'ribbon-metabox',
			'title'        => __( 'Showroom Ribbons', 'cmb2' ),
			'object_types' => array( AUTOMOB_CPT_CAR ),
			'context'      => 'side',
			'priority'     => 'default',
		) );
		$cmb->add_field( array(
			// 'name' => __( 'Showroom Ribbons', 'cmb2' ),
			'id' => $this->prefix. 'ribbon',
			'type' => 'select',
			'options' => array(
				'no_ribbon' => __( 'No Ribbon', 'cmb2' ),
				'low_price' => __( 'Low Price', 'cmb2' ),
				'great_deal' => __( 'Great Deal', 'cmb2' ),
				'just_added' => __( 'Just Added', 'cmb2' ),
				'low_miles' => __( 'Low Miles', 'cmb2' ),
				'brand_new' => __( 'Brand New', 'cmb2' )
			),
		) );
	}

	public function add_specs_metabox() {


		$cmb = new_cmb2_box( array(
			'id'           => $this->prefix . 'specs-metabox',
			'title'        => __( 'Basic Specs', 'cmb2' ),
			'object_types' => array( AUTOMOB_CPT_CAR ),
			'context'      => 'normal',
			'priority'     => 'default',
		) );


		$cmb->add_field( array(
			'name' => __( 'Status', 'cmb2' ),
			'id' => $this->prefix. 'status',
			'description' => 'Is the vehicle AVAILABLE or SOLD.',
			'type' => 'select',
			'options' => array(
				'Available' => __( 'Available', 'cmb2' ),
				'Sold' => __( 'Sold', 'cmb2' )
			),
		) );

		$cmb->add_field( array(
			'name' => __( 'Condition', 'cmb2' ),
			'id' => $this->prefix. 'condition',
			'description' => 'New or Used',
			'type' => 'select',
			'options' => array(
				'New' => __( 'New', 'cmb2' ),
				'Used' => __( 'Preowned', 'cmb2' ),
			),
		) );

		$cmb->add_field( array(
			'name' => __( 'Mileage ('.get_option('distance_unit').')', 'cmb2' ),
			'id' => $this->prefix. 'mileage',
			'type' => 'text_small',
		) );



		$cmb->add_field( array(
			'name' => __( 'Make', 'cmb2' ),
			'id' => $this->prefix. 'make',
			'type' => 'text',
		) );

		$cmb->add_field( array(
			'name' => __( 'Model', 'cmb2' ),
			'id' => $this->prefix. 'model',
			'type' => 'text',
		) );

		$cmb->add_field( array(
			'name' => __( 'Year', 'cmb2' ),
			'am-type'=>'am-digits',
			'id' => $this->prefix. 'model_year',
			'type' => 'text_small',

		) );

		$cmb->add_field( array(
			'name' => __( 'Transmission', 'cmb2' ),
			'id' => $this->prefix. 'transmission',
			'type' => 'select',
			'options' => array(
				'Automatic' => __( 'Automatic', 'cmb2' ),
				'Manual' => __( 'Manual', 'cmb2' ),
				'Semi-Automatic' => __( 'Semi-Automatic', 'cmb2' ),
			),
		) );


		$cmb->add_field( array(
			'name' => __( 'Body Style', 'cmb2' ),
			'description' => 'e.g SUV, Sedan, Hatchback etc',
			'id' => $this->prefix. 'body_style',
			'type' => 'text_medium',
		) );

		$cmb->add_field( array(
			'name' => __( 'Fuel', 'cmb2' ),
			'id' => $this->prefix. 'engine_type',
			'type' => 'select',
			'options' => array(
				'Diesel' => __( 'Diesel', 'cmb2' ),
				'Electric' => __( 'Electric', 'cmb2' ),
				'Petrol' => __( 'Petrol', 'cmb2' ),
				'Hybrid' => __( 'Hybrid', 'cmb2' ),
			),
		) );



		$cmb->add_field( array(
			'name' => __( 'Current Location', 'cmb2' ),
			'id' => $this->prefix. 'location',
			'type' => 'text_medium',
			'description' => 'Location of Vehicle e.g City, Town, Country etc',
		) );


		$cmb->add_field( array(
			'name' => __( 'Exterior Color', 'cmb2' ),
			'description' => 'Body color of the car',
			'id' => $this->prefix. 'exterior_color',
			'type' => 'text_medium',
		) );



	}


	public function add_pricing_metabox() {
		

		$cmb = new_cmb2_box( array(
			'id'           => $this->prefix. 'pricing-metabox',
			'title'        => __( 'Pricing', 'cmb2' ),
			'object_types' => array( AUTOMOB_CPT_CAR ),
			'context'      => 'normal',
			'priority'     => 'default',
		) );
		
		$cmb->add_field( array(
			'name' => __( 'Asking Price', 'cmb2' ),
			'description'=>'Price at which YOU are selling the vehicle.',
			'id' => $this->prefix. 'asking_price',
			'type' => 'text_money',
			'before_field' => get_option('currency_symbol'),
		) );

		$cmb->add_field( array(
			'name' => __( 'Retail Price', 'cmb2' ),
			'description'=>'Price at which retailers sell the same vehicle.',
			'id' => $this->prefix. 'retail_price',
			'type' => 'text_money',
			'before_field' => get_option('currency_symbol'),
			
		) );



	}

	
}