<?php
class FSSC_ProductSearch_Widget extends WP_Widget {
	function __construct() {
		parent::WP_Widget('FSSC_ProductSearch_Widget', 'Product Search', array('description' => 'Display a product search box.'));
	}

	function widget($args, $instance) {
		global $wpdb,$FSSCPages;
		extract($args);
		$title = apply_filters('widget_title', $instance['fsscwstitle']);
		echo $before_widget;
		if (!empty($title)) { echo $before_title.$title.$after_title; } 
		
		echo '<form method="post" id="searchform" action="'.get_option('home').'/'.$FSSCPages['ProductsURL'].'/search/">';
		echo '<div style="padding: 10px 0 0 10px;"><input type="text" value="" name="string" id="s" style="width: 110px;" /> ';
		echo '<input name="submit" type="submit" value="Search" />';
		echo '</div>';
		echo '</form>';
		
		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['fsscwstitle'] = strip_tags($new_instance['fsscwstitle']);
		return $instance;
	}

	function form($instance) {
		if ($instance) {
			$title = esc_attr($instance['fsscwstitle']);
		}
		else {
			$title = __('Product Search', 'text_domain');
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id('fsscwstitle'); ?>"><?php _e('Title:'); ?></label><input class="widefat" id="<?php echo $this->get_field_id('fsscwstitle'); ?>" name="<?php echo $this->get_field_name('fsscwstitle'); ?>" type="text" value="<?php echo $title; ?>" /><br />
		</p>
		<?php 
	}

} 

add_action('widgets_init', create_function('', 'register_widget("FSSC_ProductSearch_Widget");'));
?>