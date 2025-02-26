<div class="the_category">
	
	<?php if ( !empty($instance['icon']['icon'])) : ?>
		
		<span class="the_category-icon">
			<?php echo siteorigin_widget_get_icon( $instance['icon']['icon'] ); ?>
		</span>
		
	<?php endif; ?>
	
	<?php if ( !empty($instance['option']['before'])) : ?>
		
		<span class="the_category-before">
			<?php echo wp_kses_post( $instance['option']['before'] ); ?>
		</span>
		
	<?php endif; ?>
	
	<?php
	$sep = wp_kses_post($instance['option']['sep']);
	the_category($sep);
	?>
	
	<?php if ( !empty($instance['option']['after'])) : ?>
		
		<span class="the_category-after">
			<?php echo wp_kses_post( $instance['option']['after'] ); ?>
		</span>
		
	<?php endif; ?>
	
</div>
