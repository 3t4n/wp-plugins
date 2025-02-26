<?php namespace BulkPriceEditor\PriceModifiers\Modifiers;

use BulkPriceEditor\EditorPage\Widgets\Widget;
use WC_Product;

class DecreaseByPercent extends PriceModifier {
	
	const TYPE = 'decrease_by_percent';
	
	public function getType(): string {
		return self::TYPE;
	}
	
	public function getName(): string {
		return __( 'Decrease by percent', 'bulk-price-editor-for-woocommerce' );
	}
	
	public function getUpdatedRegularPrice( WC_Product $product ): ?float {
		$args = $this->getRawArgs();
		
		$oldRegularPrice = $product->get_regular_price( 'edit' );
		
		if ( ! is_numeric( $oldRegularPrice ) ) {
			return null;
		}
		
		$decreaseByPercent = isset( $args['bpe_regular_price_decrease_by_percent'] ) ? (float) $args['bpe_regular_price_decrease_by_percent'] : null;
		
		if ( ! is_numeric( $decreaseByPercent ) ) {
			return null;
		}
		
		return max( 0, (float) $oldRegularPrice - ( $oldRegularPrice * $decreaseByPercent / 100 ) );
	}
	
	public function getUpdatedSalePrice( WC_Product $product ): ?float {
		$args = $this->getRawArgs();
		
		$oldSalePrice = $product->get_sale_price( 'edit' );
		
		if ( ! is_numeric( $oldSalePrice ) ) {
			return null;
		}
		
		$decreaseByPercent = isset( $args['bpe_sale_price_decrease_by_percent'] ) ? (float) $args['bpe_sale_price_decrease_by_percent'] : null;
		
		if ( ! is_numeric( $decreaseByPercent ) ) {
			return null;
		}
		
		return max( 0, round( (float) $oldSalePrice - ( $oldSalePrice * $decreaseByPercent / 100 ), 2 ) );
	}
	
	public function renderFields( Widget $widget ) {
		
		$widget->renderHint( __( 'Enter the percentage by which to decrease the prices of the selected products.',
			'bulk-price-editor-for-woocommerce' ) );
		
		$widget->renderTextInput( array(
			'id'                => 'bpe_regular_price_decrease_by_percent',
			'label'             => __( 'Decrease regular price by percent', 'bulk-price-editor-for-woocommerce' ),
			'custom_attributes' => array(
				'data-price-modificator' => 'yes',
			),
		) );
		
		$widget->renderTextInput( array(
			'id'                => 'bpe_sale_price_decrease_by_percent',
			'label'             => __( 'Decrease sale price by percent', 'bulk-price-editor-for-woocommerce' ),
			'custom_attributes' => array(
				'data-price-modificator' => 'yes',
			),
		) );
	}
	
}