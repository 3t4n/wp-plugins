<?php if ( count($downloads) > 0 ) : ?>
	<?php
	foreach ( $downloads as $download ) {
		if ( $download['product_id'] == $id ) {
			$downloadButtonLabel = empty($downloadButtonLabel) ? 'Download ' . $download['download_name'] : $downloadButtonLabel;
			echo apply_filters( 'woocommerce_available_download_link', '<a href="' . esc_url( $download['download_url'] ) . '" class="' . $downloadButtonClass . '">' . $download['download_name'] . '</a>', $download );
		}
	}
	?>
<?php else: ?>
	<div class="woocommerce-my-downloads-button-no-downloads"><?php echo $no_downloads; ?></div>
<?php endif; ?>