<div class="the_time">
	
	<?php if ( !empty($instance['icon']['icon'])) : ?>
		
		<span class="the_time-icon">
			<?php echo siteorigin_widget_get_icon( $instance['icon']['icon'] ); ?>
		</span>
		
	<?php endif; ?>
	
	<?php if ( !empty($instance['option']['before'])) : ?>
		
		<span class="the_time-before">
			<?php echo wp_kses_post( $instance['option']['before'] ); ?>
		</span>
		
	<?php endif; ?>
	
	<time class="the_time-time">
		
		<?php the_time(); ?>
		
	</time>
	
	<?php if ( !empty($instance['option']['after'])) : ?>
		
		<span class="the_time-after">
			<?php echo wp_kses_post( $instance['option']['after'] ); ?>
		</span>
		
	<?php endif; ?>
	
</div>
