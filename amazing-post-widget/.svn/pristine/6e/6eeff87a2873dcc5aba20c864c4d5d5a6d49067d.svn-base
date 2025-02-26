<?php
/**
 * Flexible Posts Widget: Widget Admin Form 
 */

// Block direct requests
if ( !defined('ABSPATH') )
	die('-1');

// wp_enqueue_script( 'amazing-posts-widget' );
// wp_enqueue_style( 'amazing-posts-widget' );
?>
<div class="pj-ap-widget">

	<div class="section title">
        <p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget title:', 'pancenjoss_amazing'); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
	</div>
    
    <div class="section getemby">
		<h4><?php _e('Get posts by', 'pancenjoss_amazing'); ?></h4>
		<div class="inside">
		
			<p>
				<label for="<?php echo $this->get_field_id('categories'); ?>"><?php _e( 'Filter by Category', 'pancenjoss_amazing' ) ?></label> 
				<?php wp_dropdown_categories(array('name' => $this->get_field_name('categories'), 'selected' => $instance['categories'], 'orderby' => 'Name' , 'hierarchical' => 1, 'show_option_all' => 'All Categories', 'hide_empty' => '0')); ?>
				<?php
					$post_types = get_post_types();
					unset($post_types['page'], $post_types['attachment'], $post_types['revision'], $post_types['nav_menu_item']);
				?>
			</p>
				
			<p>
				<label for="<?php echo $this->get_field_id('post_type'); ?>"><?php _e( 'Filter by Post Type', 'pancenjoss_amazing' ) ?></label> 
				<select id="<?php echo $this->get_field_id('post_type'); ?>" name="<?php echo $this->get_field_name('post_type'); ?>" style="width:100%;">
				<?php
						foreach ($post_types as $post_type ) { ?>
							<option value="<?php echo $post_type ?>" <?php if ($post_type == $instance['post_type']) echo 'selected="selected"'; ?>>
								<?php echo $post_type ?>
							</option>
						<?php } ?>
				</select>
			</p><!-- .pt.getemby -->
			
		</div><!-- .inside -->
	
	</div>
	
	<div class="section display">
		<h4><?php _e('Display options', 'pancenjoss_amazing'); ?></h4>
		<p class="cf">
          <label for="<?php echo $this->get_field_id('offset'); ?>"><?php _e('Number of posts to skip:', 'pancenjoss_amazing'); ?></label> 
          <input id="<?php echo $this->get_field_id('offset'); ?>" name="<?php echo $this->get_field_name('offset'); ?>" type="text" value="<?php echo $offset; ?>" />
        </p>
   		<p class="cf">
			<label for="<?php echo $this->get_field_id('orderby'); ?>"><?php _e('Order posts by:', 'pancenjoss_amazing'); ?></label> 
			<select name="<?php echo $this->get_field_name('orderby'); ?>" id="<?php echo $this->get_field_id('orderby'); ?>">
				<?php
				foreach ( $this->orderbys as $key => $value ) {
					echo '<option value="' . $key . '" id="' . $this->get_field_id( $key ) . '"', $orderby == $key ? ' selected="selected"' : '', '>', $value, '</option>';
				}
				?>
			</select>		
		</p>
		<p class="cf">
			<label for="<?php echo $this->get_field_id('order'); ?>"><?php _e('Order:', 'pancenjoss_amazing'); ?></label> 
			<select name="<?php echo $this->get_field_name('order'); ?>" id="<?php echo $this->get_field_id('order'); ?>">
				<?php
				foreach ( $this->orders as $key => $value ) {
					echo '<option value="' . $key . '" id="' . $this->get_field_id( $key ) . '"', $order == $key ? ' selected="selected"' : '', '>', $value, '</option>';
				}
				?>
			</select>		
		</p>
		<p class="cf">
          <label for="<?php echo $this->get_field_id('pages_number'); ?>"><?php _e('Number of Pages:', 'pancenjoss_amazing'); ?></label> 
          <input id="<?php echo $this->get_field_id('pages_number'); ?>" name="<?php echo $this->get_field_name('pages_number'); ?>" type="text" value="<?php echo $pages_number; ?>" /><br style="clear:both;" />
        </p>
		<p class="cf">
          <label for="<?php echo $this->get_field_id('rows'); ?>"><?php _e('Number of Rows:', 'pancenjoss_amazing'); ?></label> 
          <input id="<?php echo $this->get_field_id('rows'); ?>" name="<?php echo $this->get_field_name('rows'); ?>" type="text" value="<?php echo $rows; ?>" /><br style="clear:both;" />
        </p>
		<p class="cf">
          <label for="<?php echo $this->get_field_id('columns'); ?>"><?php _e('Number of columns:', 'pancenjoss_amazing'); ?></label> 
          <input id="<?php echo $this->get_field_id('columns'); ?>" name="<?php echo $this->get_field_name('columns'); ?>" type="text" value="<?php echo $columns; ?>" /><br style="clear:both;" />
        </p>
		<p>
          <input class="pj-ap-thumbnail" id="<?php echo $this->get_field_id('post_title'); ?>" name="<?php echo $this->get_field_name('post_title'); ?>" type="checkbox" value="1" <?php checked( '1', $post_title ); ?>/>
          <label style="font-weight:bold;" for="<?php echo $this->get_field_id('post_title'); ?>"><?php _e('Display Post Title?', 'pancenjoss_amazing'); ?></label> 
        </p>
        <p>
			<label for="<?php echo $this->get_field_id('excerpt_length'); ?>"><?php _e('Excerpt Character Length (leave it blank if you don\'t want to display post excerpt):', 'pancenjoss_amazing'); ?></label> 
			<input id="<?php echo $this->get_field_id('excerpt_length'); ?>" name="<?php echo $this->get_field_name('excerpt_length'); ?>" type="text" value="<?php echo $excerpt_length; ?>" /><br style="clear:both;" />
        </p>
        <p>
			<label for="<?php echo $this->get_field_id('post_padding'); ?>"><?php _e('Padding for each post (in px):', 'pancenjoss_amazing'); ?></label> 
			<input id="<?php echo $this->get_field_id('post_padding'); ?>" name="<?php echo $this->get_field_name('post_padding'); ?>" type="text" value="<?php echo $post_padding; ?>" /><br style="clear:both;" />
        </p>
	</div>
	
	<div class="section thumbnails">
		<p style="margin-top:1.33em;">
          <input class="pj-ap-thumbnail" id="<?php echo $this->get_field_id('thumbnail'); ?>" name="<?php echo $this->get_field_name('thumbnail'); ?>" type="checkbox" value="1" <?php checked( '1', $thumbnail ); ?>/>
          <label style="font-weight:bold;" for="<?php echo $this->get_field_id('thumbnail'); ?>"><?php _e('Display thumbnails?', 'pancenjoss_amazing'); ?></label> 
        </p>
        <p>
			<label for="<?php echo $this->get_field_id('img_width'); ?>"><?php _e('Image Width (in pixels):', 'pancenjoss_amazing'); ?></label> 
			<input id="<?php echo $this->get_field_id('img_width'); ?>" name="<?php echo $this->get_field_name('img_width'); ?>" type="text" value="<?php echo $img_width; ?>" /><br style="clear:both;" />
        </p>
        <p>
			<label for="<?php echo $this->get_field_id('img_height'); ?>"><?php _e('Image Height (in pixels):', 'pancenjoss_amazing'); ?></label> 
			<input id="<?php echo $this->get_field_id('img_height'); ?>" name="<?php echo $this->get_field_name('img_height'); ?>" type="text" value="<?php echo $img_height; ?>" /><br style="clear:both;" />
		</p>
	</div>
	
	<div class="section template">
		<p style="margin:1.33em 0;">
			<label for="<?php echo $this->get_field_id('template') ?>"><?php _e('Template', 'pancenjoss_amazing') ?></label>
			<select id="<?php echo $this->get_field_id( 'template' ) ?>" name="<?php echo $this->get_field_name( 'template' ) ?>">
				<?php foreach($templates as $template) : ?>
					<option value="<?php echo esc_attr($template) ?>" <?php selected($instance['template'], $template) ?>><?php echo esc_html($template) ?></option>
				<?php endforeach; ?>
			</select>
		</p>
	</div>
	
</div><!-- .pj-ap-widget -->
