<?php namespace BulkPriceEditor\ProductFilters;

use BulkPriceEditor\ProductFilters\Filters\ExcludedProducts;
use BulkPriceEditor\ProductFilters\Filters\IncludedProducts;
use BulkPriceEditor\ProductFilters\Filters\ProductType;
use BulkPriceEditor\ProductFilters\Filters\StockStatus;

class FilterManager {
	
	protected array $rawFiltersData;
	
	protected array $filters = array();
	
	public function __construct( array $rawFiltersData = array() ) {
		$this->rawFiltersData = $rawFiltersData;
		
		$this->initFilters();
	}
	
	public function getRawFilters(): array {
		return $this->rawFiltersData;
	}
	
	protected function initFilters() {
		// todo: apply_filters
		
		$this->filters = array(
			IncludedProducts::class,
			ExcludedProducts::class,
			StockStatus::class,
			ProductType::class,
		);
	}
	
	public function getFilters(): array {
		return $this->filters;
	}
	
	public function filterQuery( $query ) {
		foreach ( $this->getFilters() as $filter ) {
			$filter = new $filter( $this->rawFiltersData );
			
			$filter->filterQuery( $query );
		}
		
		return $query;
	}
}