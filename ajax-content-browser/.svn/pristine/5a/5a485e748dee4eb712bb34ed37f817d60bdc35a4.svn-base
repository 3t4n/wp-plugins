<?php
/**
 * EDD - Price
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div class="acb-price">
	<div class="acb-price-data"><?php echo edd_price( get_the_ID() ); ?></div>
	<div class="acb-price-buy">
		<?php
			$button_text = ! empty( $buy_now_text ) ? esc_html__( $buy_now_text, 'acb' ) : esc_html__( 'Buy Now', 'acb' );
			echo edd_get_purchase_link( array( 'download_id' => get_the_ID(), 'price' => false, 'direct' => true, 'style' => 'text', 'text' => $button_text, 'class' => 'acb-button' ) );
		?>
	</div>
</div>