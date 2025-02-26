<?php namespace BulkPriceEditor\Actions;

use BulkPriceEditor\EditorPage\Notifications\PriceUpdatedSuccessfullyNotification;
use BulkPriceEditor\EditorPage\PriceEditorPage;
use BulkPriceEditor\PriceModifiers\Dispatcher;
use BulkPriceEditor\PriceModifiers\Modifiers\PriceModifier;
use BulkPriceEditor\ProductFilters\FilterManager;
use BulkPriceEditor\ProductQuery\ProductQuery;

class SchedulePriceUpdatesAction {
	
	const PRODUCTS_PER_RUN = 100;
	
	const PROGRESS_DATA_KEY = 'bulk_price_editor_price_update_progress';
	
	const SCHEDULE_ACTION_NAME = 'bulk_price_editor_schedule_price_updating';
	const GET_PROGRESS_ACTION_NAME = 'bulk_price_editor_get_price_updating_progress';
	const STOP_UPDATING_ACTION_NAME = 'bulk_price_editor_stop_price_updating';
	
	public function __construct() {
		add_action( 'wp_ajax_' . self::SCHEDULE_ACTION_NAME, array( $this, 'run' ) );
		
		add_action( 'wp_ajax_' . self::GET_PROGRESS_ACTION_NAME, function () {
			wp_send_json_success( self::getProgressData() );
		} );
		
		add_action( 'admin_post_' . self::STOP_UPDATING_ACTION_NAME, function () {
			
			if ( ! current_user_can( 'manage_options' ) ) {
				wp_die( 'Access denied' );
			}
			
			$nonce = isset( $_REQUEST['_wpnonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wpnonce'] ) ) : null;
			
			if ( ! wp_verify_nonce( $nonce, self::STOP_UPDATING_ACTION_NAME ) ) {
				wp_die( 'Access denied' );
			}
			
			WC()->queue()->cancel_all( UpdateProductPriceAction::ACTION_NAME );
			
			self::updateProgressData( array(
				'running'   => false,
				'total'     => 0,
				'processed' => 0,
			) );
			
			wp_safe_redirect( admin_url( 'admin.php?page=' . PriceEditorPage::PAGE_SLUG ) );
		} );
	}
	
	public function run(): void {
		
		check_ajax_referer( self::SCHEDULE_ACTION_NAME, 'nonce' );
		
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_send_json_error( array(
				'message' => 'Invalid request',
			) );
			
			return;
		}
		
		$priceModifier = $this->getPriceModifier( $_REQUEST );
		
		if ( ! $priceModifier ) {
			wp_send_json_error( array(
				'message' => 'Price modifier missed',
			) );
			
			return;
		}
		
		$productQuery = new ProductQuery( $this->getFiltersManager( $_REQUEST ), array(
			'posts_per_page' => - 1,
			'limit'          => - 1,
			'return'         => 'ids',
			'paginate'       => false,
		) );
		
		$productQuery = $productQuery->build();
		
		$products = $productQuery->get_products();
		
		self::updateProgressData( array(
			'running'   => true,
			'total'     => count( $products ),
			'processed' => 0,
		) );
		
		$chunks = array_chunk( $products, self::PRODUCTS_PER_RUN );
		
		foreach ( $chunks as $key => $productIds ) {
			
			$arguments = array(
				'products'            => $productIds,
				'price_modifier_type' => $priceModifier->getType(),
				'price_modifier_args' => $priceModifier->getRawArgs(),
			);
			
			$argumentsKey = 'bpe_'  . time() . '_' . $key . '_' . 'update_prices_arguments';
			
			set_transient( $argumentsKey, $arguments, DAY_IN_SECONDS );
			
			WC()->queue()->add( UpdateProductPriceAction::ACTION_NAME, array( $argumentsKey ),
				'bulk-price-editor__prices' );
		}
		
		wp_send_json_success( array(
			'message' => 'Prices updated',
		) );
	}
	
	public static function getProgressURL(): string {
		return add_query_arg( array(
			'action' => self::GET_PROGRESS_ACTION_NAME,
			'nonce'  => wp_create_nonce( self::GET_PROGRESS_ACTION_NAME ),
		), admin_url( 'admin-ajax.php' ) );
	}
	
	protected function getFiltersManager( $data ): FilterManager {
		$filters = isset( $data['filters'] ) ? (array) json_decode( stripslashes( $data['filters'] ), true ) : array();
		
		return new FilterManager( $filters );
	}
	
	protected function getPriceModifier( $data ): ?PriceModifier {
		
		$priceModifiersDispatcher = Dispatcher::getInstance();
		
		$priceModifierData = isset( $data['priceModifiers'] ) ? (array) json_decode( stripslashes( $data['priceModifiers'] ),
			true ) : array();
		
		$type = isset( $priceModifierData['type'] ) ? (string) $priceModifierData['type'] : '';
		$args = isset( $priceModifierData['args'] ) ? (array) $priceModifierData['args'] : array();
		
		return $priceModifiersDispatcher->dispatchModifier( $type, $args );
	}
	
	public static function getURL(): string {
		return add_query_arg( array(
			'action' => self::SCHEDULE_ACTION_NAME,
			'nonce'  => wp_create_nonce( self::SCHEDULE_ACTION_NAME ),
		), admin_url( 'admin-ajax.php' ) );
	}
	
	public static function getProgressData(): array {
		return (array) get_option( self::PROGRESS_DATA_KEY, array(
			'running'   => false,
			'total'     => 0,
			'processed' => 0,
		) );
	}
	
	public static function isRunning(): bool {
		$progressData = self::getProgressData();
		
		return isset( $progressData['running'] ) && $progressData['running'];
	}
	
	public static function updateProgressData( array $data ) {
		update_option( self::PROGRESS_DATA_KEY, $data );
	}
	
	public static function updateProgressedProducts( $productsCount ) {
		
		$progressData = SchedulePriceUpdatesAction::getProgressData();
		
		$progressData['processed'] = isset( $progressData['processed'] ) ? intval( $progressData['processed'] ) : 0;
		$progressData['total']     = isset( $progressData['total'] ) ? intval( $progressData['total'] ) : 0;
		
		$progressData['processed'] += $productsCount;
		
		if ( $progressData['processed'] >= $progressData['total'] ) {
			SchedulePriceUpdatesAction::updateProgressData( array(
				'running'   => false,
				'processed' => $progressData['total'],
				'total'     => $progressData['total'],
			) );
			
			PriceUpdatedSuccessfullyNotification::setStatus( true, array(
				'total' => $progressData['total'],
			) );
			
		} else {
			SchedulePriceUpdatesAction::updateProgressData( $progressData );
		}
	}
}