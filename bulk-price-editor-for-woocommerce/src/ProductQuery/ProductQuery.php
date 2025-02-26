<?php namespace BulkPriceEditor\ProductQuery;

use BulkPriceEditor\ProductFilters\FilterManager;
use WC_Product_Query;

class ProductQuery {
	
	protected ?FilterManager $filterManager;
	
	protected array $defaultArgs = array(
		'post_type'      => array( 'product', 'product_variation' ),
		'paginate'       => true,
		'limit'          => 10,
		'page'           => 1,
		'posts_per_page' => 10,
	);
	
	public array $args = array();
	
	public function __construct(
		FilterManager $filterManager = null,
		array $args = array()
	) {
		$this->args          = wp_parse_args( $args, $this->defaultArgs );
		$this->filterManager = $filterManager;
	}
	
	public function getFilterManager(): ?FilterManager {
		return $this->filterManager;
	}
	
	public function setFilterManager( ?FilterManager $filterManager ): void {
		$this->filterManager = $filterManager;
	}
	
	public function build(): WC_Product_Query {
		
		if ( $this->filterManager ) {
			$this->filterManager->filterQuery( $this );
		}
		
		return new WC_Product_Query( $this->args );
	}
}