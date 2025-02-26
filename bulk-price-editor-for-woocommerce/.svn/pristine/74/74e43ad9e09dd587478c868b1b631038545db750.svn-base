<?php namespace BulkPriceEditor\PriceModifiers\Modifiers;

use BulkPriceEditor\EditorPage\Widgets\Widget;
use WC_Product;

class NewPrices extends PriceModifier {
	
	const TYPE = 'new_prices';
	
	public function getType(): string {
		return self::TYPE;
	}
	
	public function getName(): string {
		return __( 'New Prices', 'bulk-price-editor-for-woocommerce' );
	}
	
	public function getUpdatedRegularPrice( WC_Product $product ): ?float {
		$args = $this->getRawArgs();
		
		return isset( $args['bpe_new_regular_price'] ) ? (float) $args['bpe_new_regular_price'] : null;
	}
	
	public function getUpdatedSalePrice( WC_Product $product ): ?float {
		$args = $this->getRawArgs();
		
		return isset( $args['bpe_new_sale_price'] ) ? (float) $args['bpe_new_sale_price'] : null;
	}
	
	public function renderFields( Widget $widget ) {
		
		$widget->renderHint( __( 'Enter new prices for selected products.', 'bulk-price-editor-for-woocommerce' ) );
		
		$widget->renderTextInput( array(
			'id'                => 'bpe_new_regular_price',
			'css_class'         => 'wc_input_price',
			/* translators: %s: Currency symbol */
			'label'             => sprintf( __( 'New Regular Price (%s)', 'bulk-price-editor-for-woocommerce' ),
				get_woocommerce_currency_symbol() ),
			'custom_attributes' => array(
				'data-price-modificator' => 'yes',
			),
		) );
		
		$widget->renderTextInput( array(
			'id'                => 'bpe_new_sale_price',
			'css_class'         => 'wc_input_price',
			/* translators: %s: Currency symbol */
			'label'             => sprintf( __( 'New Sale Price (%s)', 'bulk-price-editor-for-woocommerce' ),
				get_woocommerce_currency_symbol() ),
			'custom_attributes' => array(
				'data-price-modificator' => 'yes',
			),
		) );
	}
}