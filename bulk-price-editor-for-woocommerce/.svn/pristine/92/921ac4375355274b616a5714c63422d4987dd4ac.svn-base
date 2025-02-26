<?php namespace BulkPriceEditor\EditorPage\Widgets\ProductFilters;

use BulkPriceEditor\Actions\SchedulePriceUpdatesAction;
use BulkPriceEditor\EditorPage\Widgets\Widget;
use BulkPriceEditor\ProductFilters\Filters\ExcludedProducts;
use BulkPriceEditor\ProductFilters\Filters\Filter;
use BulkPriceEditor\ProductFilters\Filters\IncludedProducts;
use BulkPriceEditor\ProductFilters\Filters\ProductType;
use BulkPriceEditor\ProductFilters\Filters\StockStatus;

class ProductFiltersWidget extends Widget {
	
	/**
	 * @var Filter[]
	 */
	protected array $filters;
	
	public function __construct() {
		
		$this->filters = array(
			new IncludedProducts( array() ),
			new ExcludedProducts( array() ),
			new StockStatus( array() ),
			new ProductType( array() ),
		);
	}
	
	public function getTitle(): string {
		return __( 'Filter Products', 'bulk-price-editor-for-woocommerce' );
	}
	
	public function getDescription(): string {
		return __( 'Filter products you want to apply price changes.', 'bulk-price-editor-for-woocommerce' );
	}
	
	public function getStepNumber(): string {
		return '1';
	}
	
	protected function renderContent() {
		?>
		<div id="bulk-price-editor-product-filters">
			
			<?php foreach ( $this->filters as $filter ): ?>
				<div class="bulk-price-editor-widget-section <?php echo esc_attr( $filter->getSectionArgs()['open'] ? 'bulk-price-editor-widget-section--open' : '' ); ?> ">

					<div class="bulk-price-editor-widget-section__header">

						<div class="bulk-price-editor-widget-section__header-title">
							<?php echo esc_html( $filter->getTitle() ); ?>
						</div>

						<div class="bulk-price-editor-widget-section-actions">
							<div class="bulk-price-editor-widget-section-actions__toggle-view">
								<span class="dashicons dashicons-arrow-down-alt2"></span>
							</div>
						</div>

					</div>

					<div class="bulk-price-editor-widget-section__content">
						<?php $filter->renderFields( $this ); ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<?php
	}
	
	protected function renderFooter() {}
}