<?php namespace BulkPriceEditor\ProductFilters\Filters;

use BulkPriceEditor\EditorPage\Services\LookupService;
use BulkPriceEditor\EditorPage\Widgets\Widget;
use BulkPriceEditor\ProductQuery\ProductQuery;

class ExcludedProducts extends Filter {
	
	public function getExcludedProducts(): ?array {
		
		$filters = $this->rawFiltersData;
		
		// Return from request params
		return isset( $filters['bpe_excluded_product_ids'] ) ? $this->sanitizeArrayIds( $filters['bpe_excluded_product_ids'] ) : null;
	}
	
	public function getExcludedCategories(): ?array {
		
		$filters = $this->rawFiltersData;
		
		// Return from request params
		return isset( $filters['bpe_excluded_category_ids'] ) ? $this->sanitizeArrayIds( $filters['bpe_excluded_category_ids'] ) : null;
	}
	
	public function filterQuery( ProductQuery $query ): void {
		
		if ( ! empty( $this->getExcludedProducts() ) ) {
			$query->args['exclude'] = $this->getExcludedProducts();
		}
		
		if ( empty( $this->getExcludedCategories() ) ) {
			return;
		}
		
		$taxQuery = $query->args['tax_query'] ?? array();
		
		$taxQuery[] = array(
			'taxonomy' => 'product_cat',
			'field'    => 'term_id',
			'terms'    => $this->getExcludedCategories(),
			'operator' => 'NOT IN',
		);
		
		$query->args['tax_query'] = $taxQuery;
	}
	
	public function renderFields( Widget $widget ) {
		
		$widget->renderSelect2( array(
			'id'                => 'bpe_excluded_category_ids',
			'label'             => __( 'Exclude product categories', 'bulk-price-editor-for-woocommerce' ),
			'placeholder'       => __( 'Select product categories', 'bulk-price-editor-for-woocommerce' ),
			'search_action'     => LookupService::CATEGORIES_SEARCH_ACTION,
			'value'             => array(),
			'custom_attributes' => array(
				'data-product-filter' => 'yes',
			),
		) );
		
		$widget->renderSelect2( array(
			'id'                => 'bpe_excluded_product_ids',
			'label'             => __( 'Exclude products', 'bulk-price-editor-for-woocommerce' ),
			'placeholder'       => __( 'Select products', 'bulk-price-editor-for-woocommerce' ),
			'search_action'     => 'woocommerce_json_search_products_and_variations',
			'value'             => array(),
			'custom_attributes' => array(
				'data-product-filter' => 'yes',
			),
		) );
		
	}
	
	public function getTitle(): string {
		return __( 'Excluded Products', 'bulk-price-editor-for-woocommerce' );
	}
}