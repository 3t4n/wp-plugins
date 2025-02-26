<?php
class FSSC_Categories_Widget extends WP_Widget {
	function __construct() {
		parent::WP_Widget('FSSC_Categories_Widget', 'Product Categories', array('description' => 'Display your product categories.'));
	}

	function widget($args, $instance) {
		global $wpdb,$FSSCPages;
		extract($args);
		
		
		
		$pageurl = explode("?", $_SERVER['REQUEST_URI']);
		if (preg_match('/'.$FSSCPages['ProductsURL'].'/i', $pageurl[0])) {
			$pageurl = explode("/".$FSSCPages['ProductsURL']."/", $pageurl[0]);
			$pageurl[1] = str_replace("/", "", $pageurl[1]);
		} else {
			$pageurl[1] = '';
		}
		if ($pageurl[1] != '') {
			$fssc_prod_count = $wpdb->get_var("SELECT COUNT(products_id) FROM ".$wpdb->prefix."fssc_products WHERE products_url = '".$pageurl[1]."'");
			if ($fssc_prod_count > 0) {
				$fssc_prod_id = $wpdb->get_var("SELECT products_id FROM ".$wpdb->prefix."fssc_products WHERE products_url = '".$pageurl[1]."'");
				$fssc_cat_id = $wpdb->get_var("SELECT categories_id FROM ".$wpdb->prefix."fssc_products_to_categories WHERE products_id = $fssc_prod_id ORDER BY categories_id DESC");
				$pageurl[1] = $wpdb->get_var("SELECT categories_url FROM ".$wpdb->prefix."fssc_categories WHERE categories_id = $fssc_cat_id");
			}
			$fssc_parent_id = $wpdb->get_var("SELECT categories_id FROM ".$wpdb->prefix."fssc_categories WHERE categories_url = '".$pageurl[1]."'");
			$fssc_cat_name = $wpdb->get_var("SELECT categories_name FROM ".$wpdb->prefix."fssc_categories WHERE categories_url = '".$pageurl[1]."'");
			$fssc_cat_count = $wpdb->get_var("SELECT COUNT(categories_id) FROM ".$wpdb->prefix."fssc_categories WHERE parent_id = $fssc_parent_id");
			$current_cat_id = $fssc_parent_id;
			if ($fssc_cat_count == 0) {
				$fssc_parent_id = $wpdb->get_var("SELECT parent_id FROM ".$wpdb->prefix."fssc_categories WHERE categories_url = '".$pageurl[1]."'");
				$fssc_cat_name = $wpdb->get_var("SELECT categories_name FROM ".$wpdb->prefix."fssc_categories WHERE categories_id = $fssc_parent_id");
				$fssc_cat_url = $wpdb->get_var("SELECT categories_url FROM ".$wpdb->prefix."fssc_categories WHERE categories_id = $fssc_parent_id");
				if ($fssc_cat_name == '') {
					$fssc_cat_name = apply_filters('widget_title', $instance['fsscwctitle']);
				}
				$fssc_cat_name = '<a href="'.get_option('home').'/'.$FSSCPages['ProductsURL'].'/'.$fssc_cat_url.'/">'.$fssc_cat_name.'</a>';
			}
		} else {
			$fssc_parent_id = 0;
			$current_cat_id = 0;
			$fssc_cat_name = apply_filters('widget_title', $instance['fsscwctitle']);
		}
		
		$title = $fssc_cat_name;
		if ($instance['fsscwcstatic'] == 'Yes') { $title = apply_filters('widget_title', $instance['fsscwctitle']); }
		echo $before_widget;
		if (!empty($title)) { echo $before_title . $title . $after_title; } 
		echo '<ul>';
		if ($instance['fsscwchide'] == 'Yes') {
			$StoreCategories = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_categories WHERE categories_visibility = 1 AND parent_id = $fssc_parent_id AND categories_product_count > 0 ORDER BY categories_order");
		} else {
			$StoreCategories = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_categories WHERE categories_visibility = 1 AND parent_id = $fssc_parent_id ORDER BY categories_order");
		}
    foreach ($StoreCategories as $StoreCategories) {
			$style = '';
			if ($current_cat_id == $StoreCategories->categories_id) {
				$style = ' style="font-weight: bold;"';
			}
      echo '<li><a href="'.get_option('home').'/'.$FSSCPages['ProductsURL'].'/'.$StoreCategories->categories_url.'/"'.$style.'>'.stripslashes(htmlspecialchars($StoreCategories->categories_name, ENT_QUOTES)).'</a></li>';
    }
		echo '</ul>';

		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['fsscwctitle'] = strip_tags($new_instance['fsscwctitle']);
		$instance['fsscwcstatic'] = strip_tags($new_instance['fsscwcstatic']);
		$instance['fsscwchide'] = strip_tags($new_instance['fsscwchide']);
		return $instance;
	}

	function form($instance) {
		if ($instance) {
			$title = esc_attr($instance['fsscwctitle']);
			$statictitle = esc_attr($instance['fsscwcstatic']);
			$hidecat = esc_attr($instance['fsscwchide']);
		}
		else {
			$title = __('Categories', 'text_domain');
			$statictitlechecked = '';
			$hidechecked = '';
		}
		
		$statictitlechecked = ''; if ($statictitle == 'Yes') { $statictitlechecked = 'checked'; }
		$hidechecked = ''; if ($hidecat == 'Yes') { $hidechecked = 'checked'; }
		?>
		<p>
		<label for="<?php echo $this->get_field_id('fsscwctitle'); ?>"><?php _e('Title:'); ?></label><input class="widefat" id="<?php echo $this->get_field_id('fsscwctitle'); ?>" name="<?php echo $this->get_field_name('fsscwctitle'); ?>" type="text" value="<?php echo $title; ?>" /><br />
		<label for="<?php echo $this->get_field_id('fsscwcstatic'); ?>"><?php _e('Static Title:'); ?></label> <input id="<?php echo $this->get_field_id('fsscwcstatic'); ?>" name="<?php echo $this->get_field_name('fsscwcstatic'); ?>" type="checkbox" value="Yes" <?php echo $statictitlechecked; ?> /><br />
		<label for="<?php echo $this->get_field_id('fsscwchide'); ?>"><?php _e('Hide Empty Categories:'); ?></label> <input id="<?php echo $this->get_field_id('fsscwchide'); ?>" name="<?php echo $this->get_field_name('fsscwchide'); ?>" type="checkbox" value="Yes" <?php echo $hidechecked; ?> /><br />
		</p>
		<?php 
	}

} 

add_action('widgets_init', create_function('', 'register_widget("FSSC_Categories_Widget");'));

?>