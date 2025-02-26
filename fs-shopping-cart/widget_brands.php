<?php
class FSSC_Brand_Widget extends WP_Widget {
	function __construct() {
		parent::WP_Widget('FSSC_Brand_Widget', 'Shop By Brand', array('description' => 'Display a list of your product brands/vendors.'));
	}

	function widget( $args, $instance ) {
		global $wpdb,$FSSCPages;
		extract($args);
		$title = apply_filters('widget_title', $instance['fsscwbtitle']);
		echo $before_widget;
		if (!empty($title)) { echo $before_title.$title.$after_title; } 
		
		if ($instance['fsscwbfeatured'] == 'Yes') {
			echo '<ul>';
			$StoreBrand = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_brands WHERE brand_visibility = 1 AND brand_product_count > 0 ORDER BY brand_name");
			echo '<li style="text-align: center; padding: 5px 0;"><select name="selectbrand" onChange="location.href = \''.get_option('home').'/'.$FSSCPages['BrandURL'].'/\'+this.value"><option value="/">Select a Brand</option>';
			foreach ($StoreBrand as $StoreBrand) {
				echo '<option value="'.$StoreBrand->brand_url.'/">'.$StoreBrand->brand_name.'</option>';
			}
			echo '</select></li>';
			echo '<li style="padding: 5px 0 5px 10px; border-bottom: 1px solid #cfcfcf;"><strong>Featured Brands:</strong></li>';
			$StoreBrand = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_brands WHERE brand_visibility = 1 AND brand_product_count > 0 AND brand_widget_featured = 1 ORDER BY brand_name");
			foreach ($StoreBrand as $StoreBrand) {
				echo '<li><a href="'.get_option('home').'/'.$FSSCPages['BrandURL'].'/'.$StoreBrand->brand_url.'/">'.$StoreBrand->brand_name.'</a></li>'."\n";
			}
			echo '</ul>';
		} else {
			echo '<ul>';
			$StoreBrand = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_brands WHERE brand_visibility = 1 AND brand_product_count > 0 ORDER BY brand_name");
			foreach ($StoreBrand as $StoreBrand) {
				echo '<li><a href="'.get_option('home').'/'.$FSSCPages['BrandURL'].'/'.$StoreBrand->brand_url.'/">'.$StoreBrand->brand_name.'</a></li>'."\n";
			}
			echo '</ul>';
		}
		
		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['fsscwbtitle'] = strip_tags($new_instance['fsscwbtitle']);
		$instance['fsscwbfeatured'] = strip_tags($new_instance['fsscwbfeatured']);
		return $instance;
	}

	function form($instance) {
		if ($instance) {
			$title = esc_attr($instance['fsscwbtitle']);
			$hidebrands = esc_attr($instance['fsscwbfeatured']);
		} else {
			$title = __('Shop by Brand', 'text_domain');
			$hidebrandschecked = '';
			$statictitlechecked = '';
		}
		$hidebrandschecked = ''; if ($hidebrands == 'Yes') { $hidebrandschecked = 'checked'; }
		?>
		<p>
		<label for="<?php echo $this->get_field_id('fsscwbtitle'); ?>"><?php _e('Title:'); ?></label><input class="widefat" id="<?php echo $this->get_field_id('fsscwbtitle'); ?>" name="<?php echo $this->get_field_name('fsscwbtitle'); ?>" type="text" value="<?php echo $title; ?>" /><br />
		<label for="<?php echo $this->get_field_id('fsscwbfeatured'); ?>"><?php _e('Only List Featured Brands:'); ?></label> <input id="<?php echo $this->get_field_id('fsscwbfeatured'); ?>" name="<?php echo $this->get_field_name('fsscwbfeatured'); ?>" type="checkbox" value="Yes" <?php echo $hidebrandschecked; ?> /><br />
		</p>
		<?php 
	}

} 

add_action('widgets_init', create_function('', 'register_widget("FSSC_Brand_Widget");'));
?>