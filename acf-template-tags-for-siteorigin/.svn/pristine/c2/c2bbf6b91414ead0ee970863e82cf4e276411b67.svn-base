
<?php
$taxonomy = sanitize_text_field($instance['option']['taxonomy']);
if ( get_the_terms( get_the_ID(), $taxonomy ) !== NULL ) :
	?>
	
	<div class="the_terms">
		<?php if ( !empty($instance['icon']['icon'])) : ?>
			<span class="the_terms-icon">
				<?php echo siteorigin_widget_get_icon( $instance['icon']['icon'] ); ?>
			</span>
			
		<?php endif; ?>
		
		<?php
		$before = wp_kses_post($instance['option']['before']);
		$after = wp_kses_post($instance['option']['after']);
		$sep = wp_kses_post($instance['option']['sep']);
		the_terms( get_the_ID(), $taxonomy, $before, $sep, $after );
		?>
		
	</div>
<?php endif; ?>
