<div class="the_author_meta">
	
	<?php
	
	if ( $instance['option']['html_tag'] != 'none' ) {
		
		$before = '<' . sanitize_text_field(esc_html($instance['option']['html_tag'])) . '>';
		$after = '</' . sanitize_text_field(esc_html($instance['option']['html_tag'])) . '>';
		
	} else {
		
		$before = '';
		$after = '';
		
	}
	
	echo $before;
	
	?>
	
	
	<?php if ( !empty($instance['icon']['icon'])) : ?>
		
		<span class="the_author_meta-icon">
			<?php echo siteorigin_widget_get_icon( $instance['icon']['icon'] ); ?>
		</span>
		
	<?php endif; ?>
	
	
	
	<?php if ( !empty($instance['option']['before'])) : ?>
		
		<span class="the_author_meta-before">
			<?php echo wp_kses_post( $instance['option']['before'] ); ?>
		</span>
		
	<?php endif; ?>
	
	
	
	<?php if ( !empty($instance['option']['link']) ) : ?>
		
		<a href="<?php echo get_author_posts_url( get_the_author_ID() ); ?>">
			
		<?php endif; ?>
		
		<?php
		$meta_field = sanitize_text_field($instance['option']['meta_field']);
		the_author_meta($meta_field, get_the_author_ID());
		?>
		
		
		
		<?php if ( !empty($instance['option']['link']) ) : ?>
			
		</a>
		
	<?php endif; ?>
	
	
	
	<?php if ( !empty($instance['option']['after'])) : ?>
		
		<span class="the_author_meta-after">
			<?php echo wp_kses_post( $instance['option']['after'] ); ?>
		</span>
		
		
	<?php endif; ?>
	
	
	<?php echo $after; ?>
	
</div>
