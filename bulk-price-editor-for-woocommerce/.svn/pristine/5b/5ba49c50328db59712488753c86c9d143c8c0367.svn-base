<?php namespace BulkPriceEditor\PriceModifiers\Modifiers;

use BulkPriceEditor\EditorPage\Widgets\Widget;
use WC_Product;

abstract class PriceModifier {
	
	private array $rawArgs = array();
	
	public function updatePrices( WC_Product $product ): void {
		$regularPrice = $this->getUpdatedRegularPrice( $product );
		$salePrice    = $this->getUpdatedSalePrice( $product );
		
		if ( $regularPrice !== null ) {
			$product->set_regular_price( $regularPrice );
		}
		
		if ( $salePrice !== null ) {
			$product->set_sale_price( $salePrice );
		}
		
		$product->save();
	}
	
	abstract public function getType(): string;
	
	abstract public function getName();
	
	abstract public function getUpdatedSalePrice( WC_Product $product );
	
	abstract public function getUpdatedRegularPrice( WC_Product $product );
	
	abstract public function renderFields( Widget $widget );
	
	public function setRawArgs( array $rawArgs ): void {
		$this->rawArgs = $rawArgs;
	}
	
	public function getRawArgs(): array {
		return $this->rawArgs;
	}
	
}