<div id="rcb_container" class="<?php echo esc_attr( $banner_position . ( $bottom_for_mobile ? ' bottom' : '' ) ); ?>">
	<a href="http://wordpress.org/plugins/rescue-children-banner/" <?php echo ( $new_window ? 'target="_blank"' : '' ); ?>>
		<img id="rcb_add-icon" src="<?php echo esc_url( plugins_url( 'rescue-children-banner/images/add-to-website.png' ) ); ?>" alt="<?php _e( 'Add this banner to your WordPress website', 'rescue-children-banner' ); ?>" title="<?php _e( 'Add this banner to your WordPress website', 'rescue-children-banner' ); ?>" />
	</a>
	
	<a href="<?php echo esc_url( $image_link_url ); ?>" <?php echo ( $new_window ? 'target="_blank"' : '' ); ?>>
		<img src="<?php echo esc_url( $image_location ); ?>" alt="<?php _e( 'Rescue Children', 'rescue-children-banner' ); ?>" />
	</a>
</div>
