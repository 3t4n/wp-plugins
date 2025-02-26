<div class="single_term_title">
	
	<?php if ( !empty($instance['option']['before'])) : ?>
		
		<span class="single_term_title-before">
			<?php echo wp_kses_post( $instance['option']['before'] ); ?>
		</span>
		
	<?php endif; ?>
	
	<?php echo single_term_title(wp_kses_post($instance['option']['prefix'])); ?>
	
	<?php if ( !empty($instance['option']['after'])) : ?>
		
		<span class="single_term_title-after">
			<?php echo wp_kses_post( $instance['option']['after'] ); ?>
		</span>
		
	<?php endif; ?>
	
</div>
