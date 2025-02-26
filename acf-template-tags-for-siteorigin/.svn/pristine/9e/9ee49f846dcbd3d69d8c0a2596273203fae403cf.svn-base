<div class="wp_count_comments">
	
	<?php if ( !empty($instance['icon']['icon'])) : ?>
		
		<span class="wp_count_comments-icon">
			<?php echo siteorigin_widget_get_icon( $instance['icon']['icon'] ); ?>
		</span>
		
	<?php endif; ?>
	
	<?php if ( !empty($instance['option']['before'])) : ?>
		
		<span class="wp_count_comments-before">
			<?php echo wp_kses_post( $instance['option']['before'] ); ?>
		</span>
		
	<?php endif; ?>
	
	
	<span class="wp_count_comments-count">
		
		<?php echo wp_count_comments( get_the_ID() )->approved; ?>
		
	</span>
	
	<?php if ( !empty($instance['option']['after'])) : ?>
		
		<span class="wp_count_comments-after">
			<?php echo wp_kses_post( $instance['option']['after'] ); ?>
		</span>
		
	<?php endif; ?>
	
</div>
