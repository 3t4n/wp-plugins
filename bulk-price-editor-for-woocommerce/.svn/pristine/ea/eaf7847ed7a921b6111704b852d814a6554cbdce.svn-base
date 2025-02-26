<?php namespace BulkPriceEditor\ProductFilters\Filters;

use BulkPriceEditor\EditorPage\Services\LookupService;
use BulkPriceEditor\EditorPage\Widgets\Widget;
use BulkPriceEditor\ProductQuery\ProductQuery;

class IncludedProducts extends Filter {
	
	public function getIncludedProducts(): ?array {
		
		$filters = $this->rawFiltersData;
		
		// Return from request params
		return isset( $filters['bpe_included_product_ids'] ) ? $this->sanitizeArrayIds( $filters['bpe_included_product_ids'] ) : null;
	}
	
	public function getIncludedCategories(): ?array {
		
		$filters = $this->rawFiltersData;
		
		// Return from request params
		return isset( $filters['bpe_included_category_ids'] ) ? $this->sanitizeArrayIds( $filters['bpe_included_category_ids'] ) : null;
	}
	
	public function filterQuery( ProductQuery $query ): void {
		
		if ( ! empty( $this->getIncludedProducts() ) ) {
			$query->args['include'] = $this->getIncludedProducts();
		}
		
		if ( empty( $this->getIncludedCategories() ) ) {
			return;
		}
		
		$taxQuery = $query->args['tax_query'] ?? array();
		
		$taxQuery[] = array(
			'taxonomy' => 'product_cat',
			'field'    => 'term_id',
			'terms'    => $this->getIncludedCategories(),
			'operator' => 'NOT IN',
		);
		
		$query->args['tax_query'] = $taxQuery;
	}
	
	public function getSectionArgs(): array {
		return array(
			'open' => true,
		);
	}
	
	public function renderFields( Widget $widget ) {
		
		$widget->renderSelect2( array(
			'id'                => 'bpe_included_category_ids',
			'attributes'        => 'multiple',
			'label'             => __( 'Include product categories', 'bulk-price-editor-for-woocommerce' ),
			'placeholder'       => __( 'Select product categories', 'bulk-price-editor-for-woocommerce' ),
			'search_action'     => LookupService::CATEGORIES_SEARCH_ACTION,
			'value'             => array(),
			'custom_attributes' => array(
				'data-product-filter' => 'yes',
			),
		) );
		
		$widget->renderSelect2( array(
			'id'                => 'bpe_included_product_ids',
			'label'             => __( 'Include products', 'bulk-price-editor-for-woocommerce' ),
			'placeholder'       => __( 'Select products', 'bulk-price-editor-for-woocommerce' ),
			'search_action'     => 'woocommerce_json_search_products_and_variations',
			'value'             => array(),
			'custom_attributes' => array(
				'data-product-filter' => 'yes',
			),
		) );
		
	}
	
	public function getTitle(): string {
		return __( 'Included Products', 'bulk-price-editor-for-woocommerce' );
	}
}