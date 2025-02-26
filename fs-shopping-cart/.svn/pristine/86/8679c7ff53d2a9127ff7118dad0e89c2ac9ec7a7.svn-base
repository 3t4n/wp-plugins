<?php
class FSSC_Product_Widget extends WP_Widget {
	function __construct() {
		parent::WP_Widget('FSSC_Product_Widget', 'Product Widget', array('description' => 'Display product price, buy button and custom text.'));
	}

	function widget($args, $instance) {
		global $wpdb,$FSSCPages;
		extract($args);
		
		$Content  = '';
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
				$ProductDetails = $wpdb->get_var("SELECT products_id FROM ".$wpdb->prefix."fssc_products WHERE products_url = '".$pageurl[1]."'");
			}
		}
		
		$Content  .= $before_widget;
		if (!empty($title)) { $Content  .= $before_title . $title . $after_title; } 

		$Content  .= $after_widget;
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['fsscptitle'] = strip_tags($new_instance['fsscptitle']);
		$instance['fssctext'] = strip_tags($new_instance['fsscptext']);
		return $instance;
	}

	function form($instance) {
		if ($instance) {
			$title = esc_attr($instance['fsscptitle']);
			$text = esc_attr($instance['fsscptext']);
		}
		else {
			$title = __('Product Details', 'text_domain');
			$text = '';
		}
		
		$hidechecked = ''; if ($hidecat == 'Yes') { $hidechecked = 'checked'; }
		?>
		<p>
		<label for="<?php echo $this->get_field_id('fsscptitle'); ?>"><?php _e('Title:'); ?></label><input class="widefat" id="<?php echo $this->get_field_id('fsscptitle'); ?>" name="<?php echo $this->get_field_name('fsscptitle'); ?>" type="text" value="<?php echo $title; ?>" /><br />
		<label for="<?php echo $this->get_field_id('fsscptext'); ?>"><?php _e('Text:'); ?></label> <textarea id="<?php echo $this->get_field_id('fsscptext'); ?>" name="<?php echo $this->get_field_name('fsscptext'); ?>" /><?php echo $text; ?></textarea><br />
		<label for="<?php echo $this->get_field_id('fsscphide'); ?>"><?php _e('Only Show On Product Pages:'); ?></label> <input id="<?php echo $this->get_field_id('fsscphide'); ?>" name="<?php echo $this->get_field_name('fsscphide'); ?>" type="checkbox" value="Yes" <?php echo $hidechecked; ?> /><br />
		</p>
		<?php 
	}

} 

add_action('widgets_init', create_function('', 'register_widget("FSSC_Product_Widget");'));

?>