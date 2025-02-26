<?php namespace BulkPriceEditor\PriceModifiers\Modifiers;

use BulkPriceEditor\EditorPage\Widgets\Widget;
use WC_Product;

class RemovePrice extends PriceModifier {
	
	const TYPE = 'remove_prices';
	
	public function getName(): string {
		return __( 'Remove prices', 'bulk-price-editor-for-woocommerce' );
	}
	
	public function getType(): string {
		return self::TYPE;
	}
	
	public function getUpdatedRegularPrice( WC_Product $product ): ?string {
		
		$removePrices = $this->getRawArgs()['bpe_remove_prices'] ?? '';
		
		if ( $removePrices === 'both' || $removePrices === 'regular_price' ) {
			return 'N/A';
		}
		
		return null;
	}
	
	public function getUpdatedSalePrice( WC_Product $product ): ?string {
		$removePrices = $this->getRawArgs()['bpe_remove_prices'] ?? '';
		
		if ( $removePrices === 'both' || $removePrices === 'sale_price' ) {
			return 'N/A';
		}
		
		return null;
	}
	
	public function renderFields( Widget $widget ) {
		
		$widget->renderHint( __( 'Select what prices you want to remove (regular, sale, or both) from the selected products.',
			'bulk-price-editor-for-woocommerce' ) );
		
		$widget->renderSelect( array(
			'id'                => 'bpe_remove_prices',
			'label'             => __( 'Remove price', 'bulk-price-editor-for-woocommerce' ),
			'options'           => array(
				'both'          => __( 'Both regular and sale prices', 'bulk-price-editor-for-woocommerce' ),
				'regular_price' => __( 'Regular price', 'bulk-price-editor-for-woocommerce' ),
				'sale_price'    => __( 'Sale price', 'bulk-price-editor-for-woocommerce' ),
			),
			'custom_attributes' => array(
				'data-price-modificator' => 'yes',
			),
		) );
	}
	
	public function updatePrices( WC_Product $product ): void {
		$regularPrice = $this->getUpdatedRegularPrice( $product );
		$salePrice    = $this->getUpdatedSalePrice( $product );
		
		if ( 'N/A' === $regularPrice ) {
			$product->set_regular_price( '' );
		}
		
		if ( 'N/A' === $salePrice ) {
			$product->set_sale_price( '' );
		}
		
		$product->save();
	}
}