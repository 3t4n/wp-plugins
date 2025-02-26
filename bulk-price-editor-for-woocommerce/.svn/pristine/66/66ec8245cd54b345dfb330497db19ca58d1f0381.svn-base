<?php namespace BulkPriceEditor\ProductFilters\Filters;

use BulkPriceEditor\EditorPage\Widgets\Widget;
use BulkPriceEditor\ProductQuery\ProductQuery;

class StockStatus extends Filter {
	
	public function getStockStatus(): ?string {
		$filters = $this->rawFiltersData;
		
		return isset( $filters['bpe_stock_status'] ) ? $this->filterStockStatus( $filters['bpe_stock_status'] ) : null;
	}
	
	public function filterQuery( ProductQuery $query ): void {
		
		if ( empty( $this->getStockStatus() ) ) {
			return;
		}
		
		$query->args['stock_status'] = $this->getStockStatus();
	}
	
	public function getSectionArgs(): array {
		return array(
			'open' => false,
		);
	}
	
	public function renderFields( Widget $widget ) {
		$widget->renderRadioButtons( array(
			'id'                => 'bpe_stock_status',
			'label'             => __( 'Stock status', 'bulk-price-editor-for-woocommerce' ),
			'options'           => array(
				''            => __( 'Any stock status', 'bulk-price-editor-for-woocommerce' ),
				'instock'     => __( 'In stock', 'bulk-price-editor-for-woocommerce' ),
				'outofstock'  => __( 'Out of stock', 'bulk-price-editor-for-woocommerce' ),
				'onbackorder' => __( 'On backorder', 'bulk-price-editor-for-woocommerce' ),
			),
			'value'             => '',
			'custom_attributes' => array(
				'data-product-filter' => 'yes',
			),
		) );
	}
	
	public function getTitle(): string {
		return __( 'Stock status', 'bulk-price-editor-for-woocommerce' );
	}
	
	protected function filterStockStatus( string $stockStatus ): ?string {
		return in_array( $stockStatus, array( 'instock', 'outofstock', 'onbackorder' ) ) ? $stockStatus : null;
	}
}