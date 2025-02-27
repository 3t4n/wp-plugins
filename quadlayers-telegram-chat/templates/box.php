<div id="qltgm" class="qltgm-free <?php printf( 'qltgm-%s qltgm-%s qltgm-%s qltgm-%s', esc_attr( $button['layout'] ), esc_attr( $button['position'] ), esc_attr( $display['devices'] ), esc_attr( $button['rounded'] === 'yes' ? 'rounded' : 'square' ) ); ?>">
	<div class="qltgm-container">
	<?php if ( $button['box'] === 'yes' ) : ?>
		<div class="qltgm-box">
		<?php if ( ! empty( $box['header'] ) ) : ?>
			<div class="qltgm-header">
			<i class="qltgm-close" data-action="close"></i>
			<div class="qltgm-description">
				<?php echo wpautop( wp_kses_post( wpautop( $box['header'] ) ) ); ?>
			</div>
			</div>
		<?php endif; ?>
		<div class="qltgm-body">
		<?php if ( count( $contacts ) ) : ?>
			<?php
			foreach ( $contacts as $id => $contact ) :
				?>
			<a class="qltgm-account" data-action="open" data-username="<?php echo esc_html( $contact['username'] ); ?>" href="javascript:void(0);" target="_blank">
				<?php if ( ! empty( $contact['avatar'] ) ) : ?>
				<div class="qltgm-avatar">
					<div class="qltgm-avatar-container">
					<img alt="<?php printf( '%s %s', esc_html( $contact['firstname'] ), esc_html( $contact['lastname'] ) ); ?>" src="<?php echo esc_url( $contact['avatar'] ); ?>">
					</div>
				</div>
				<?php endif; ?>
				<div class="qltgm-info">
				<span class="qltgm-label"><?php echo esc_html( $contact['label'] ); ?></span>
				<span class="qltgm-name"><?php printf( '%s %s', esc_html( $contact['firstname'] ), esc_html( $contact['lastname'] ) ); ?></span>
				</div>
			</a>
			<?php endforeach; ?>
			<?php endif; ?>
		</div>
		<?php if ( ! empty( $box['footer'] ) ) : ?>
			<div class="qltgm-footer">
			<?php echo wpautop( wp_kses_post( $box['footer'] ) ); ?>
			</div>
			</a>
		<?php endif; ?>
		</div>

	<?php endif; ?>
	<a class="qltgm-toggle" data-action="<?php echo ( $button['box'] === 'yes' ? 'box' : 'open' ); ?>" data-username="<?php echo esc_html( $button['username'] ); ?>" href="javascript:void(0);" target="_blank">
		<?php if ( $button['icon'] ) : ?>
		<i class="qltgm-icon <?php echo esc_attr( $button['icon'] ); ?>"></i>
		<?php endif; ?>
		<i class="qltgm-close" data-action="close"></i>
		<?php if ( $button['text'] ) : ?>
		<span class="qltgm-text"><?php echo esc_html( $button['text'] ); ?></span>
		<?php endif; ?>
	</a>
	</div>
</div>
