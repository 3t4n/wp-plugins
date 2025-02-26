<?php namespace BulkPriceEditor\ProductFilters\Filters;

use BulkPriceEditor\EditorPage\Widgets\ProductFilters\LookupService;
use BulkPriceEditor\EditorPage\Widgets\Widget;
use BulkPriceEditor\ProductQuery\ProductQuery;

class ProductType extends Filter {
	
	public function getProductTypes(): ?array {
		$filters = $this->rawFiltersData;
		
		return isset( $filters['bpe_product_type'] ) ? (array) $filters['bpe_product_type'] : null;
	}
	
	public function filterQuery( ProductQuery $query ): void {
		
		if ( empty( $this->getProductTypes() ) ) {
			return;
		}
		
		$query->args['type'] = $this->getProductTypes();
	}
	
	public function getSectionArgs(): array {
		return array(
			'open' => false,
		);
	}
	
	public function renderFields( Widget $widget ) {
		$widget->renderCheckboxGroup( array(
			'id'                => 'bpe_product_type',
			'label'             => __( 'Product type', 'bulk-price-editor-for-woocommerce' ),
			'options'           => wc_get_product_types(),
			'value'             => array_keys( wc_get_product_types() ),
			'custom_attributes' => array(
				'data-product-filter' => 'yes',
			),
		) );
	}
	
	public function getTitle(): string {
		return __( 'Product type', 'bulk-price-editor-for-woocommerce' );
	}
	
}