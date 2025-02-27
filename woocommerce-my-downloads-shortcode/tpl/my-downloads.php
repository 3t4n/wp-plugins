<div id='downloads-wrapper'>
	<?php if ( count( $downloads ) > 0 ) : ?>

        <h2><?php echo apply_filters( 'woocommerce_my_account_my_downloads_title', __( $heading, 'woocommerce' ) ); ?></h2>

        <ul class="wc-my-downloads-digital-downloads">
			<?php foreach ( $downloads as $download ) : ?>
				<?php
				// Get order date
				$order     = new WC_Order( $download['order_id'] );
				$orderDate = date( 'm/d/Y', strtotime( $order->get_date_completed() ) );

				$items              = $order->get_items();
				$downloadLimit      = get_post_meta( $download['product_id'], '_download_limit', true );
				$downloadsRemaining = ( (int) $downloadLimit - (int) $download['downloads_remaining'] );
				?>
                <li>
					<?php if ( $showDate ) : echo $orderDate . ' - '; endif; ?>

					<?php do_action( 'woocommerce_available_download_start', $download ); ?>

					<?php if ( is_numeric( $download['downloads_remaining'] ) && $showDownloads ) : ?>
                        Downloaded <?php echo $downloadsRemaining; ?> time(s)
					<?php endif; ?>

					<?php if ( $showDownloadCount ) : ?>
						<?php
						if ( is_numeric( $download['downloads_remaining'] ) && $download['downloads_remaining'] >= 0 ) {
							$downloads_remaining = $download['downloads_remaining'];
						} else {
							$downloads_remaining = '&#8734;';
						}
						if ( is_numeric( $downloadLimit ) && $downloadLimit >= 0 ) {
							$download_limit = $downloadLimit;
						} else {
							$download_limit = '&#8734;';
						}

						?>

						<?php echo apply_filters( 'woocommerce_available_download_count', '<span class="wc-my-downloads-count">' . $downloads_remaining . '</span> / ', $download ); ?>
						<?php echo apply_filters( 'woocommerce_available_available_download_count', '<span class="wc-my-downloads-available-count">' . $download_limit . ' downloads remaining. </span>', $download ); ?>
					<?php endif; ?>

					<?php echo apply_filters( 'woocommerce_available_download_link', '<a href="' . esc_url( $download['download_url'] ) . '" class="wc-my-downloads-download-link">' . $download['download_name'] . '</a>', $download ); ?>

					<?php do_action( 'woocommerce_available_download_end', $download ); ?>
                </li>
			<?php endforeach; ?>
        </ul>

	<?php else: ?>
		<?php echo $no_downloads; ?>
	<?php endif; ?>
</div>