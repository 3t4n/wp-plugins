<?php
/**
 * Get the stylesheet of the plugin
 */
function alwp_stylesheet_hook() {
	wp_enqueue_style( 'alwp_visual', plugins_url('/css/visual.css', __FILE__));
}
add_action( 'init', 'alwp_stylesheet_hook' );

class alwp extends WP_Widget {

	// Plugin Constructor
	    function alwp() {
	        parent::WP_Widget(false, $name = __('Cool Author List', 'alwp') );
		array (
		        'description' => 'Author List in Cool Styles.'
		);
	    }

	// Widget Options
	function form($instance) {
	
	// Checking Options Value
	if( $instance) {
	     $icon = esc_attr($instance['icon']);
		 $title = esc_attr($instance['title']);
	     $number = esc_attr($instance['number']);
	     $sort = esc_textarea($instance['sort']);
     	 $order = esc_textarea($instance['order']);
	} else {
	     $title = 'Top Author';
	     $number = '1';
	     $sort = 'ASC';
	     $order = 'name';
		 $icon = 'android'; 
	}
	?>
	
	<p>
	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title', 'alwp'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
	</p>
	
	<p>
	<label for="<?php echo $this->get_field_id('icon'); ?>"><?php _e('Icon Code from Font Awesome', 'alwp'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('icon'); ?>" name="<?php echo $this->get_field_name('icon'); ?>" type="text" value="<?php echo $icon; ?>" />
	</p>
	
	<p>
	<label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Shows Author ', 'alwp'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="number" value="<?php echo $number; ?>" />
	</p>
	
	<p>
	<label for="<?php echo $this->get_field_id('sort'); ?>"><?php _e('Sort By', 'alwp'); ?></label>
	<select name="<?php echo $this->get_field_name('sort'); ?>" id="<?php echo $this->get_field_id('sort'); ?>" class="widefat">
	<?php
	$options = array('ASC', 'DESC');
	foreach ($options as $option) {
	echo '<option value="' . $option . '" id="' . $option . '"', $sort == $option ? ' selected="selected"' : '', '>', $option, '</option>';
	}
	?>
	</select>
	</p>
	
	<p>
	<label for="<?php echo $this->get_field_id('order'); ?>"><?php _e('Order By', 'alwp'); ?></label>
	<select name="<?php echo $this->get_field_name('order'); ?>" id="<?php echo $this->get_field_id('order'); ?>" class="widefat">
	<?php
	$options = array('name', 'email', 'id', 'url', 'registered', 'user_login', 'post_count');
	foreach ($options as $option) {
	echo '<option value="' . $option . '" id="' . $option . '"', $order == $option ? ' selected="selected"' : '', '>', $option, '</option>';
	}
	?>
	</select>
	</p>
	<?php
	}

	// Widget Update By Options
	function update($new_instance, $old_instance) {
	      $instance = $old_instance;
	      // Fields
	      $instance['title'] = strip_tags($new_instance['title']);
		  $instance['icon'] = strip_tags($new_instance['icon']);
	      $instance['number'] = strip_tags($new_instance['number']);
	      $instance['sort'] = strip_tags($new_instance['sort']);
	      $instance['order'] = strip_tags($new_instance['order']);
	     return $instance;
	}

	// Displaying The Widget
	function widget($args, $instance) {
	   extract( $args );
	   // Loading Widget Options
	   $title = apply_filters('widget_title', $instance['title']);
	   $icon = $instance['icon'];
	   $number = $instance['number'];
	   $sort = $instance['sort'];
	   $order = $instance['order'];
	   $faicon = '<i class="icon-' . $icon . '"></i>';
	   echo $before_widget;
	   // Visual for Widget
	   echo '<div id="alwp">';
	
	   // Check if title is set
	   if ( $title ) {
	      echo $before_title . $faicon . $title . $after_title;
	   }
	
	?>
	<style type="text/css">
		<?php 
		echo 'i.' ;
		echo 'icon-';
		echo $icon;
		?> {margin-right:5px;}
	</style>
            <ol>
		<?php foreach ( get_users('order='.$sort.'&orderby='.$order.'&number='.$number.'') as $user ) : ?>
		<li>
		<a href="<?php echo get_author_posts_url( $user->ID ); ?>">
		<figure>
			<?php echo get_avatar($user->ID, 100); ?>
			<figcaption>
				<h5>
					<?php echo $user->display_name; ?>
				</h5>
				<p style="color:aquamarine">Published <?php echo count_user_posts($user->ID); ?> Posts</p>
				<p><?php echo $user->description; ?></p>
			</figcaption>
		</figure>
		</a>
		</li>
		<?php endforeach; ?>
            </ol>
	<?php
	   echo '</div>';
	   echo $after_widget;
	}
}

// Registering the Widget
add_action('widgets_init', create_function('', 'return register_widget("alwp");'));