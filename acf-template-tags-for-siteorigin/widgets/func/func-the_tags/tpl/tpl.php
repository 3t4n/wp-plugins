<?php if (has_tag()) : ?>
	<div class="the_tags">
		
		<?php if ( !empty($instance['icon']['icon'])) : ?>
			
			<span class="the_tags-icon">
				<?php echo siteorigin_widget_get_icon( $instance['icon']['icon'] ); ?>
			</span>
			
		<?php endif; ?>
		
		<?php
		$before = wp_kses_post($instance['option']['before']);
		$after = wp_kses_post($instance['option']['after']);
		$sep = wp_kses_post($instance['option']['sep']);
		the_tags($before, $sep, $after);
		?>
		
	</div>
<?php endif; ?>
