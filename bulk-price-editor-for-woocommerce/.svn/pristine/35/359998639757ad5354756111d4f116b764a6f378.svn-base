<?php namespace BulkPriceEditor\ProductFilters\Filters;

use BulkPriceEditor\EditorPage\Widgets\Widget;
use BulkPriceEditor\ProductQuery\ProductQuery;

abstract class Filter {
	
	protected array $rawFiltersData;
	
	public function __construct( array $rawFiltersData ) {
		$this->rawFiltersData = $rawFiltersData;
	}
	
	public function getRawFiltersData(): array {
		return $this->rawFiltersData;
	}
	
	public function getSectionArgs(): array {
		return array();
	}
	
	protected function sanitizeArrayIds( $ids ): array {
		
		$ids = is_array( $ids ) ? $ids : array( $ids );
		
		return array_filter( array_map( 'intval', $ids ) );
	}
	
	abstract public function filterQuery( ProductQuery $query ): void;
	
	abstract public function getTitle();
	
	abstract public function renderFields( Widget $widget );
}