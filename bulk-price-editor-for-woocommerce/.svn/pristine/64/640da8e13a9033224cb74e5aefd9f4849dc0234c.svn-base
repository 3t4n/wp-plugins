<?php namespace BulkPriceEditor\EditorPage\Widgets\PriceModifiers;

use BulkPriceEditor\EditorPage\Widgets\Widget;
use BulkPriceEditor\PriceModifiers\Modifiers\AddFlatValue;
use BulkPriceEditor\PriceModifiers\Modifiers\IncreaseByPercent;
use BulkPriceEditor\PriceModifiers\Modifiers\NewPrices;
use BulkPriceEditor\PriceModifiers\Modifiers\PriceModifier;
use BulkPriceEditor\PriceModifiers\Modifiers\RemovePrice;
use BulkPriceEditor\PriceModifiers\Modifiers\DecreaseByPercent;
use BulkPriceEditor\PriceModifiers\Modifiers\SubtractFlatValue;

class PriceModifiersWidget extends Widget {
	
	/**
	 * @var PriceModifier[]
	 */
	protected array $modifiers;
	
	public string $defaultModifier = 'new_prices';
	
	public function __construct() {
		$this->modifiers = array(
			NewPrices::class,
			IncreaseByPercent::class,
			DecreaseByPercent::class,
			AddFlatValue::class,
			SubtractFlatValue::class,
			RemovePrice::class,
		);
	}
	
	public function getTitle(): string {
		return __( 'Edit Prices', 'bulk-price-editor-for-woocommerce' );
	}
	
	public function getDescription(): string {
		return __( 'Choose how you want to adjust prices for selected products.', 'bulk-price-editor-for-woocommerce' );
	}
	
	public function getStepNumber(): string {
		return '2';
	}
	
	protected function renderContent() {
		?>
		<div id="bulk-price-editor-price-adjustments">
			<div class="bulk-price-editor-price-modificators-tabs">
				
				<?php foreach ( $this->modifiers as $modifier ) : ?>
					
					<?php
					$instance = new $modifier();
					
					$active = $instance->getType() === $this->defaultModifier;
					?>

					<div class="bulk-price-editor-price-modificator-tab <?php echo $active ? 'bulk-price-editor-price-modificator-tab--active' : ''; ?>"
						 data-target="<?php echo esc_attr( $instance->getType() ) ?>">
						<?php echo esc_html( $instance->getName() ); ?>
					</div>
				<?php endforeach; ?>

			</div>

			<div class="bulk-price-editor-price-modificators">
				
				<?php foreach ( $this->modifiers as $modifier ) : ?>
					
					<?php
					$instance = new $modifier();
					
					$active = $instance->getType() === $this->defaultModifier;
					?>

					<div class="bulk-price-editor-price-modificator <?php echo $active ? 'bulk-price-editor-price-modificator--active' : ''; ?>"
						 id="<?php echo esc_attr( $instance->getType() ) ?>">
						<?php $instance->renderFields( $this ); ?>
					</div>
				<?php endforeach; ?>

			</div>
		</div>
		<?php
	}
	
	protected function renderFooter() {}
}