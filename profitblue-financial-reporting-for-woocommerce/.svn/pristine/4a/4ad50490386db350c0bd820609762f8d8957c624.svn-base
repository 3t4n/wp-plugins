<?php

namespace Profitblue\Settings;

use Profitblue\Enums\DeliveryMethods;
use Profitblue\Abstracts\AbstractSettings;
use Profitblue\PostTypes\ProductPostType;
use Profitblue\Repositories\SettingsRepository;
use Profitblue\Musilda\CustomFields\CustomFields;

class ProductSettings extends AbstractSettings {

	private $feed_categories;

	public function __construct( CustomFields $wcf, SettingsRepository $settings_repository, FeedCategories $feed_categories ) {
		parent::__construct( $wcf, $settings_repository );
		$this->feed_categories = $feed_categories;
	}

	public function setup() {
		if ( ! $this->settings_repository->is_feature_enabled( GeneralSettings::FEATURE_FEEDS ) ) {
			return;
		}
		$this->wcf->create_product_options(
			array(
				'tab'   => array(
					'id'       => 'profitblue-financial-reporting-for-woocommerce',
					'label'    => esc_html__( 'profitblue-financial-reporting-for-woocommerce', 'profitblue-financial-reporting-for-woocommerce' ),
					'priority' => 100,
					'class'    => array(),
				),
				'items' => array(
					array(
						'id'    => '_profitblue',
						'type'  => 'group',
						'items' => array(
							array(
								'id'    => 'exclude',
								'title' => esc_html__( 'Exclude', 'profitblue-financial-reporting-for-woocommerce' ),
								'desc'  => esc_html__( 'Check for exclude this product.', 'profitblue-financial-reporting-for-woocommerce' ),
								'type'  => 'toggle',
							),
							array(
								'id'    => 'id',
								'title' => esc_html__( 'Custom ID', 'profitblue-financial-reporting-for-woocommerce' ),
								'desc'  => esc_html__( 'Overwrite ITEM_ID. Product ID or custom field.', 'profitblue-financial-reporting-for-woocommerce' ),
								'type'  => 'text',
							),						
							
																					
						),
					),
				),
			)
		);
	}
}
