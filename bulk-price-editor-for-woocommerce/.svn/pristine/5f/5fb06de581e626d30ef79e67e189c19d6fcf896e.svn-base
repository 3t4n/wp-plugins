<?php namespace BulkPriceEditor\EditorPage\Widgets\ProductsList;

use BulkPriceEditor\Actions\SchedulePriceUpdatesAction;
use BulkPriceEditor\ProductQuery\ProductQuery;
use BulkPriceEditor\ProductsTable\WPListProductsTable;
use BulkPriceEditor\EditorPage\Widgets\Widget;
use BulkPriceEditor\ProductFilters\FilterManager;

class ProductsListWidget extends Widget {
	
	public function getTitle(): string {
		return __( 'Preview and apply changes', 'bulk-price-editor-for-woocommerce' );
	}
	
	public function getDescription(): string {
		return __( 'Review updates and confirm changes.', 'bulk-price-editor-for-woocommerce' );
	}
	
	public function getStepNumber(): string {
		return '3';
	}
	
	public function getSize(): int {
		return 100;
	}
	
	protected function renderContent() {
		?>
		<div id="bulk-price-editor-product-table"
			 class="bulk-price-editor-product-table"
			 data-nonce="<?php echo esc_attr( wp_create_nonce( 'load_products_table' ) ); ?>"
			 data-update-url="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>"
			 data-update-action="<?php echo esc_attr( 'load_products_table' ); ?>">
			
			<?php
				$productsTable = new WPListProductsTable( new ProductQuery() );
				
				$productsTable->prepare_items();
				
				$productsTable->display();
			?>

		</div>
		<?php
	}
	
	public function renderActions() {
		?>
		<div id="bulk-price-editor-apply-changes"
			 data-action-url="<?php echo esc_attr( SchedulePriceUpdatesAction::getURL() ) ?>">

			<button id="bulk-price-editor-apply-changes-button"
					class="bulk-price-editor-button bulk-price-editor-button--primary">
				<span class="dashicons dashicons-saved"></span>
				<?php esc_html_e( 'Apply changes', 'bulk-price-editor-for-woocommerce' ); ?>
			</button>

		</div>
		<?php
	}
	
	protected function renderFooter() {}
}