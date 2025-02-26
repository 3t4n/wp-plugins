<?php namespace BulkPriceEditor\PriceModifiers\Modifiers;

use BulkPriceEditor\EditorPage\Widgets\Widget;
use WC_Product;

class SubtractFlatValue extends PriceModifier {
	
	const TYPE = 'subtract_flat_value';
	
	public function getType(): string {
		return self::TYPE;
	}
	
	public function getName(): string {
		return __( 'Subtract flat value', 'bulk-price-editor-for-woocommerce' );
	}
	
	public function getUpdatedRegularPrice( WC_Product $product ): ?float {
		$args = $this->getRawArgs();
		
		$oldRegularPrice = $product->get_regular_price( 'edit' );
		
		if ( ! is_numeric( $oldRegularPrice ) ) {
			return null;
		}
		
		$subtractFlatValue = isset( $args['bpe_regular_price_subtract_flat_value'] ) ? (float) $args['bpe_regular_price_subtract_flat_value'] : null;
		
		if ( ! is_numeric( $subtractFlatValue ) ) {
			return null;
		}
		
		return max( 0, (float) $oldRegularPrice - $subtractFlatValue );
	}
	
	public function getUpdatedSalePrice( WC_Product $product ): ?float {
		$args = $this->getRawArgs();
		
		$oldSalePrice = $product->get_sale_price( 'edit' );
		
		if ( ! is_numeric( $oldSalePrice ) ) {
			return null;
		}
		
		$subtractFlatValue = isset( $args['bpe_sale_price_subtract_flat_value'] ) ? (float) $args['bpe_sale_price_subtract_flat_value'] : null;
		
		if ( ! is_numeric( $subtractFlatValue ) ) {
			return null;
		}
		
		return max( 0, (float) $oldSalePrice - $subtractFlatValue );
	}
	
	public function renderFields( Widget $widget ) {
		
		$widget->renderHint( __( 'Input a flat value to subtract from the regular and sale prices of selected products.',
			'bulk-price-editor-for-woocommerce' ) );
		
		$widget->renderTextInput( array(
			'id'                => 'bpe_regular_price_subtract_flat_value',
			'label'             => __( 'Subtract value from regular price', 'bulk-price-editor-for-woocommerce' ),
			'custom_attributes' => array(
				'data-price-modificator' => 'yes',
			),
		) );
		
		$widget->renderTextInput( array(
			'id'                => 'bpe_sale_price_subtract_flat_value',
			'label'             => __( 'Subtract value from sale price', 'bulk-price-editor-for-woocommerce' ),
			'custom_attributes' => array(
				'data-price-modificator' => 'yes',
			),
		) );
		
	}
}