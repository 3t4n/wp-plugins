<div class="get_term_by">
	
	<?php if ( !empty($instance['option']['link']) ) : ?>
		<a href="<?php echo get_term_link(sanitize_text_field($instance['option']['term']), sanitize_text_field($instance['option']['taxonomy'])); ?>">
		<?php endif; ?>
		
		<?php if ( !empty($instance['icon']['icon'])) : ?>
			
			<span class="get_term_by-icon">
				<?php echo siteorigin_widget_get_icon( $instance['icon']['icon'] ); ?>
			</span>
			
		<?php endif; ?>
		
		<?php if ( !empty($instance['option']['text_before']) ) : ?>
			<span class="get_term_by-before">
				<?php echo wp_kses_post($instance['option']['text_before']); ?>
			</span>
		<?php endif; ?>
		
		<span class="get_term_by-result">
			<?php
			$taxonomy = sanitize_text_field($instance['option']['taxonomy']);
			$term = sanitize_text_field($instance['option']['term']);
			$display = $instance['option']['display'];
			echo get_term_by('slug', $term, $taxonomy )->$display;
			?>
		</span>
		
		<?php if ( !empty($instance['option']['text_after']) ) : ?>
			<span class="get_term_by-after">
				<?php echo wp_kses_post($instance['option']['text_after']); ?>
			</span>
		<?php endif; ?>
		
		<?php if ( !empty($instance['option']['link']) ) : ?>
		</a>
	<?php endif; ?>
	
</div>
