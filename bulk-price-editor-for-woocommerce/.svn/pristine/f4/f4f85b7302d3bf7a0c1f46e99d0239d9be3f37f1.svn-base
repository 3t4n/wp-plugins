<?php namespace BulkPriceEditor\EditorPage\Notifications;

class PriceUpdatedSuccessfullyNotification {
	
	const NOTIFICATION_OPTION_KEY = 'bulk_price_editor_price_updated_successfully_notification';
	
	public static function setStatus( bool $active, $args = array() ) {
		
		if ( ! $active ) {
			delete_option( self::NOTIFICATION_OPTION_KEY );
			
			return;
		}
		
		$args = wp_parse_args( $args, array(
			'total' => null,
		) );
		
		update_option( self::NOTIFICATION_OPTION_KEY, $args );
	}
	
	public static function isActive(): bool {
		return get_option( self::NOTIFICATION_OPTION_KEY ) !== false;
	}
	
	public static function render() {
		if ( ! self::isActive() ) {
			return;
		}
		
		$args = get_option( self::NOTIFICATION_OPTION_KEY );
		
		?>
		<div class="bulk-price-editor-notifications">
			<div class="bulk-price-editor-notification">
				<span>🎉</span>
				
				<?php
					/* translators: %d: products number */
					echo esc_html( sprintf( __( 'Prices for %d products have been updated successfully.',
						'bulk-price-editor-for-woocommerce' ), esc_html( $args['total'] ) ) );
				?>
			</div>
		</div>
		<?php
		
		self::setStatus( false );
	}
	
}