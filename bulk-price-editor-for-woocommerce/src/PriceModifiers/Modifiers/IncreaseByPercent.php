<?php namespace BulkPriceEditor\PriceModifiers\Modifiers;

use BulkPriceEditor\EditorPage\Widgets\Widget;
use WC_Product;

class IncreaseByPercent extends PriceModifier {
	
	const TYPE = 'increase_by_percent';
	
	public function getType(): string {
		return self::TYPE;
	}
	
	public function getName(): string {
		return __( 'Increase by percent', 'bulk-price-editor-for-woocommerce' );
	}
	
	public function getUpdatedRegularPrice( WC_Product $product ): ?float {
		$args = $this->getRawArgs();
		
		$oldRegularPrice = $product->get_regular_price( 'edit' );
		
		if ( ! is_numeric( $oldRegularPrice ) ) {
			return null;
		}
		
		$increaseByPercent = isset( $args['bpe_regular_price_increase_by_percent'] ) ? (float) $args['bpe_regular_price_increase_by_percent'] : null;
		
		if ( ! is_numeric( $increaseByPercent ) ) {
			return null;
		}
		
		return (float) $oldRegularPrice + ( $oldRegularPrice * $increaseByPercent / 100 );
	}
	
	public function getUpdatedSalePrice( WC_Product $product ): ?float {
		$args = $this->getRawArgs();
		
		$oldSalePrice = $product->get_sale_price( 'edit' );
		
		if ( ! is_numeric( $oldSalePrice ) ) {
			return null;
		}
		
		$increaseByPercent = isset( $args['bpe_sale_price_increase_by_percent'] ) ? (float) $args['bpe_sale_price_increase_by_percent'] : null;
		
		if ( ! is_numeric( $increaseByPercent ) ) {
			return null;
		}
		
		return round( (float) $oldSalePrice + ( $oldSalePrice * $increaseByPercent / 100 ), 2 );
	}
	
	public function renderFields( Widget $widget ) {
		
		$widget->renderHint( __( 'Enter the percentage by which to increase the prices of the selected products.',
			'bulk-price-editor-for-woocommerce' ) );
		
		$widget->renderTextInput( array(
			'id'                => 'bpe_regular_price_increase_by_percent',
			'label'             => __( 'Increase regular price by percent', 'bulk-price-editor-for-woocommerce' ),
			'custom_attributes' => array(
				'data-price-modificator' => 'yes',
			),
		) );
		
		$widget->renderTextInput( array(
			'id'                => 'bpe_sale_price_increase_by_percent',
			'label'             => __( 'Increase sale price by percent', 'bulk-price-editor-for-woocommerce' ),
			'custom_attributes' => array(
				'data-price-modificator' => 'yes',
			),
		) );
		
	}
}