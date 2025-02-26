<?php if ( 'rcb_banner-position' == $field['label_for'] ) : ?>

	<input id="rcb_banner-position-top-right" name="rcb_banner-position" type="radio" value="top-right" <?php checked( $this->banner_position, 'top-right' ); ?> />
	<label for="rcb_banner-position-top-right"><span class="description"><?php _e( 'Top Right Corner.', 'rescue-children-banner' ); ?></span></label>
	<br />
	
	<input id="rcb_banner-position-top-left" name="rcb_banner-position" type="radio" value="top-left" <?php checked( $this->banner_position, 'top-left' ); ?> />
	<label for="rcb_banner-position-top-left"><span class="description"><?php _e( 'Top Left Corner.', 'rescue-children-banner' ); ?></span></label>

<?php elseif ( 'rcb_new-window' == $field['label_for'] ) : ?>
	
	<input id="rcb_new-window" name="rcb_new-window" type="checkbox" <?php checked( $this->new_window, 'on' ); ?> />
	<label for="rcb_new-window">
		<span class="description">
			<?php _e( 'If checked, the link to the Destiny Rescue website open in a new window.', 'rescue-children-banner' ); ?><br />
			<?php _e( '<strong>Note:</strong> Forcing links to open in a new window is <a href="http://uxdesign.smashingmagazine.com/2008/07/01/should-links-open-in-new-windows/">considered a bad practice</a>. Please consider leaving this off.', 'rescue-children-banner' ); ?>
		</span>
	</label>

<?php elseif ( 'rcb_bottom-for-mobile' == $field['label_for'] ) : ?>

	<input id="rcb_bottom-for-mobile" name="rcb_bottom-for-mobile" type="checkbox" <?php checked( $this->bottom_for_mobile, 'on' ); ?> />
	<label for="rcb_bottom-for-mobile">
		<span class="description">
			<?php _e( "If checked, the banner will appear at the bottom of the page when viewed on a smartphone so that it doesn't overlap the header. Note that this won't work in Internet Explorer versions 8 and below, because they don't support modern web standards.", 'rescue-children-banner' ); ?>
		</span>
	</label>

<?php endif; ?>
