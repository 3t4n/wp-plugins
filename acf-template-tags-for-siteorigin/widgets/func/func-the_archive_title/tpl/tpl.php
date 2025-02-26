<div class="the_archive_title">
	
	<?php if ( !empty($instance['option']['before'])) : ?>
		
		<span class="the_archive_title-before">
			<?php echo wp_kses_post( $instance['option']['before'] ); ?>
		</span>
		
	<?php endif; ?>
	
	<span class="the_archive_title-title">
		<?php the_archive_title(); ?>
	</span>
	
	<?php if ( !empty($instance['option']['after'])) : ?>
		
		<span class="the_archive_title-after">
			<?php echo wp_kses_post( $instance['option']['after'] ); ?>
		</span>
		
	<?php endif; ?>
	
</div>
