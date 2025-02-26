<div class="wpscr_newsfeed" style="<?php echo esc_html( $bottom_styles ); ?>">

	<?php

	include_once( ABSPATH . WPINC . '/feed.php' );

	$rss = fetch_feed( $newsfeed_url );

	if ( ! is_wp_error( $rss ) ) {

		if ( empty( $newsfeed_items ) ) {
			$newsfeed_items = 5;
		}
		$maxitems  = $rss->get_item_quantity( $newsfeed_items );
		$rss_items = $rss->get_items( 0, $maxitems );

	}
	?>

	<?php if (!empty( $newsfeed_logo ) && ($logo_position == 'left' || $logo_position == "left_right")) { ?>
		<div class="wpscr_image_left <?php echo $logo_position; ?>">
			<img src="<?php echo esc_url( $newsfeed_logo ); ?>" alt="<?php _e( 'Newsfeed', 'wpscreens' ); ?>">
		</div>
	<?php } ?>
	<ul class="newsfeed-slider owl-carousel owl-theme">

		<?php if ( 0 === $maxitems ){ ?>
			<li><?php _e( 'No items', 'wpscreens' ); ?></li>
		<?php } else { ?>
			<?php foreach ( $rss_items as $item ){ ?>
				<li class="item">
					<a href="<?php echo esc_url( $item->get_permalink() ); ?>"
						title="<?php echo esc_html( $item->get_title() ); ?>" target="_blank" style="color: <?php echo esc_html( $bottom_color ); ?>;">
						<?php echo esc_html( $item->get_title() ); ?>
					</a>
				</li>
			<?php } ?>
		<?php } ?>
	</ul>

	<?php if ( ! empty( $newsfeed_logo ) && ($logo_position == 'right' || $logo_position == "left_right")) { ?>
		<div class="wpscr_image_right <?php echo $logo_position; ?>">
			<img src="<?php echo esc_url( $newsfeed_logo ); ?>"  alt="<?php _e( 'Newsfeed', 'wpscreens' ); ?>">
		</div>
	<?php } ?>

</div>