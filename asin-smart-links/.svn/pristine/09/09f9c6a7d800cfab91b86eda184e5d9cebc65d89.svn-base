<?php

namespace AsinSmartInternationalLinks\Functionality;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class CustomFields
{

	protected $plugin_name;
	protected $plugin_version;

	public function __construct($plugin_name, $plugin_version)
	{
		$this->plugin_name = $plugin_name;
		$this->plugin_version = $plugin_version;

		add_action('after_setup_theme', [$this, 'load_cf']);
		add_action('carbon_fields_register_fields', [$this, 'register_fields']);
	}

	public function load_cf()
	{
		\Carbon_Fields\Carbon_Fields::boot();
	}

	public function register_fields()
	{
		Container::make( 'theme_options', __( 'ASIN Smart Links' ) )
			->set_icon( 'dashicons-amazon' )
			->add_fields( array(
				Field::make( 'select', 'asil_affiliate_type', __( 'Affiliate type' ) )
					->set_options( array(
						'unique' => 'Same affiliate code for all countries',
						'multiple' => 'Different affiliate codes for each country'
					) ),
				Field::make( 'text', 'asil_affiliate', __( 'Affiliate code' ) )
					->set_conditional_logic( array(
						array(
							'field' => 'asil_affiliate_type',
							'value' => 'unique',
						)
					) ),


				Field::make( 'text', 'asil_affiliate_au', __( 'AU Affiliate code' ) )
					->set_width(33)
					->set_conditional_logic( array(
						array(
							'field' => 'asil_affiliate_type',
							'value' => 'multiple',
						)
					) ),
				Field::make( 'text', 'asil_affiliate_de', __( 'DE Affiliate code' ) )
					->set_width(33)
					->set_conditional_logic( array(
						array(
							'field' => 'asil_affiliate_type',
							'value' => 'multiple',
						)
					) ),
				Field::make( 'text', 'asil_affiliate_be', __( 'BE Affiliate code' ) )
					->set_width(33)
					->set_conditional_logic( array(
						array(
							'field' => 'asil_affiliate_type',
							'value' => 'multiple',
						)
					) ),
				Field::make( 'text', 'asil_affiliate_br', __( 'BR Affiliate code' ) )
					->set_width(33)
					->set_conditional_logic( array(
						array(
							'field' => 'asil_affiliate_type',
							'value' => 'multiple',
						)
					) ),
				Field::make( 'text', 'asil_affiliate_ca', __( 'CA Affiliate code' ) )
					->set_width(33)
					->set_conditional_logic( array(
						array(
							'field' => 'asil_affiliate_type',
							'value' => 'multiple',
						)
					) ),
				Field::make( 'text', 'asil_affiliate_cn', __( 'CN Affiliate code' ) )
					->set_width(33)
					->set_conditional_logic( array(
						array(
							'field' => 'asil_affiliate_type',
							'value' => 'multiple',
						)
					) ),
				Field::make( 'text', 'asil_affiliate_eg', __( 'EG Affiliate code' ) )
					->set_width(33)
					->set_conditional_logic( array(
						array(
							'field' => 'asil_affiliate_type',
							'value' => 'multiple',
						)
					) ),
				Field::make( 'text', 'asil_affiliate_fr', __( 'FR Affiliate code' ) )
					->set_width(33)
					->set_conditional_logic( array(
						array(
							'field' => 'asil_affiliate_type',
							'value' => 'multiple',
						)
					) ),
				Field::make( 'text', 'asil_affiliate_in', __( 'IN Affiliate code' ) )
					->set_width(33)
					->set_conditional_logic( array(
						array(
							'field' => 'asil_affiliate_type',
							'value' => 'multiple',
						)
					) ),
				Field::make( 'text', 'asil_affiliate_it', __( 'IT Affiliate code' ) )
					->set_width(33)
					->set_conditional_logic( array(
						array(
							'field' => 'asil_affiliate_type',
							'value' => 'multiple',
						)
					) ),
				Field::make( 'text', 'asil_affiliate_jp', __( 'JP Affiliate code' ) )
					->set_width(33)
					->set_conditional_logic( array(
						array(
							'field' => 'asil_affiliate_type',
							'value' => 'multiple',
						)
					) ),
				Field::make( 'text', 'asil_affiliate_mx', __( 'MX Affiliate code' ) )
					->set_width(33)
					->set_conditional_logic( array(
						array(
							'field' => 'asil_affiliate_type',
							'value' => 'multiple',
						)
					) ),
				Field::make( 'text', 'asil_affiliate_nl', __( 'NL Affiliate code' ) )
					->set_width(33)
					->set_conditional_logic( array(
						array(
							'field' => 'asil_affiliate_type',
							'value' => 'multiple',
						)
					) ),
				Field::make( 'text', 'asil_affiliate_pl', __( 'PL Affiliate code' ) )
					->set_width(33)
					->set_conditional_logic( array(
						array(
							'field' => 'asil_affiliate_type',
							'value' => 'multiple',
						)
					) ),
				Field::make( 'text', 'asil_affiliate_sa', __( 'SA Affiliate code' ) )
					->set_width(33)
					->set_conditional_logic( array(
						array(
							'field' => 'asil_affiliate_type',
							'value' => 'multiple',
						)
					) ),
				Field::make( 'text', 'asil_affiliate_sg', __( 'SG Affiliate code' ) )
					->set_width(33)
					->set_conditional_logic( array(
						array(
							'field' => 'asil_affiliate_type',
							'value' => 'multiple',
						)
					) ),
				Field::make( 'text', 'asil_affiliate_es', __( 'ES Affiliate code' ) )
					->set_width(33)
					->set_conditional_logic( array(
						array(
							'field' => 'asil_affiliate_type',
							'value' => 'multiple',
						)
					) ),
				Field::make( 'text', 'asil_affiliate_se', __( 'SE Affiliate code' ) )
					->set_width(33)
					->set_conditional_logic( array(
						array(
							'field' => 'asil_affiliate_type',
							'value' => 'multiple',
						)
					) ),
				Field::make( 'text', 'asil_affiliate_tr', __( 'TR Affiliate code' ) )
					->set_width(33)
					->set_conditional_logic( array(
						array(
							'field' => 'asil_affiliate_type',
							'value' => 'multiple',
						)
					) ),
				Field::make( 'text', 'asil_affiliate_ae', __( 'AE Affiliate code' ) )
					->set_width(33)
					->set_conditional_logic( array(
						array(
							'field' => 'asil_affiliate_type',
							'value' => 'multiple',
						)
					) ),
				Field::make( 'text', 'asil_affiliate_gb', __( 'GB Affiliate code' ) )
					->set_width(33)
					->set_conditional_logic( array(
						array(
							'field' => 'asil_affiliate_type',
							'value' => 'multiple',
						)
					) ),
			) );
	}
}
