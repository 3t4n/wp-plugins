<?php namespace BulkPriceEditor\PriceModifiers;

use BulkPriceEditor\PriceModifiers\Modifiers\AddFlatValue;
use BulkPriceEditor\PriceModifiers\Modifiers\NewPrices;
use BulkPriceEditor\PriceModifiers\Modifiers\PriceModifier;
use BulkPriceEditor\PriceModifiers\Modifiers\RemovePrice;
use BulkPriceEditor\PriceModifiers\Modifiers\IncreaseByPercent;
use BulkPriceEditor\PriceModifiers\Modifiers\DecreaseByPercent;
use BulkPriceEditor\PriceModifiers\Modifiers\SubtractFlatValue;

class Dispatcher {
	
	protected array $rawData;
	
	protected static ?self $instance = null;
	
	/**
	 * @var PriceModifier[]
	 */
	protected array $registeredPriceModifiers = array();
	
	protected function __construct() {
		$this->registerPriceModifiers();
	}
	
	public static function getInstance(): Dispatcher {
		if ( ! self::$instance ) {
			self::$instance = new self();
		}
		
		return self::$instance;
	}
	
	protected function registerPriceModifiers() {
		
		// todo: apply_filters
		$this->registeredPriceModifiers = array(
			NewPrices::class,
			RemovePrice::class,
			IncreaseByPercent::class,
			DecreaseByPercent::class,
			AddFlatValue::class,
			SubtractFlatValue::class,
		);
	}
	
	/**
	 * @return PriceModifier[]
	 */
	public function getRegisteredPriceModifiers(): array {
		return $this->registeredPriceModifiers;
	}
	
	public function dispatchModifier( ?string $type, array $args = array() ): ?PriceModifier {
		
		foreach ( $this->getRegisteredPriceModifiers() as $modifier ) {
			
			$modifier = new $modifier();
			
			if ( $modifier->getType() === $type ) {
				$modifier->setRawArgs( $args );
				
				return $modifier;
			}
		}
		
		return null;
	}
	
}