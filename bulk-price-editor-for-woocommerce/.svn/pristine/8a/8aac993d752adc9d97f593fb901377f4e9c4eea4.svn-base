<?php namespace BulkPriceEditor\Actions;

use BulkPriceEditor\PriceModifiers\Dispatcher;
use WC_Product_Query;

class UpdateProductPriceAction {
	
	const ACTION_NAME = 'bulk_price_editor_update_prices';
	
	public function __construct() {
		add_action( self::ACTION_NAME, array( self::class, 'updatePrices' ) );
	}
	
	public static function updatePrices( $argsKey ) {
		
		$args = (array) get_transient( $argsKey );
		
		$productIds = isset( $args['products'] ) ? (array) $args['products'] : array();
		
		$priceModifierType = isset( $args['price_modifier_type'] ) ? (string) $args['price_modifier_type'] : '';
		$priceModifierArgs = isset( $args['price_modifier_args'] ) ? (array) $args['price_modifier_args'] : array();
		
		$productQuery = new WC_Product_Query( array(
			'limit'    => - 1,
			'include'  => $productIds,
			'paginate' => false,
		) );
		
		$products = $productQuery->get_products();
		$total    = count( $products );
		
		SchedulePriceUpdatesAction::updateProgressedProducts( $total );
		
		$priceModifier = Dispatcher::getInstance()->dispatchModifier( $priceModifierType, $priceModifierArgs );
		
		if ( $priceModifier === null ) {
			return;
		}
		
		foreach ( $products as $product ) {
			
			if ( $product instanceof \WC_Product ) {
				$priceModifier->updatePrices( $product );
			}
			
		}
		
		delete_transient( $argsKey );
	}
}