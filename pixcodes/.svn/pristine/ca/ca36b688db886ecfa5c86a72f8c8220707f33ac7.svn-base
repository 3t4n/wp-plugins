<div class="pixcode  pixcode--progressbar  progressbar">
	<?php if ( $title ) { ?>
		<div class="progressbar__title"><?php echo wp_kses_post( $title ); ?></div>
	<?php } ?>
	<div class="progressbar__bar">
		<div class="progressbar__progress" data-value="<?php echo esc_attr( $progress ) ?>">
			<div class="progressbar__tooltip"><?php echo esc_attr( $progress ) ?></div>
		</div>
		<?php
		if ( $markers == 'on' ) {
			for ( $i = 1; $i <= 4; $i ++ ) { ?>
				<div class="progressbar__marker" style="width: <?php echo esc_attr( $i * 20 ) ?>%"></div>
			<?php }
		} ?>
	</div>
</div>
