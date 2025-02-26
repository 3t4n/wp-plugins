<?php

class HeartyPromoteLightWidget extends WP_Widget {

	function __construct() {

		$widget_options = array(
			'classname' => 'heartypromotelight_widget',
			'description' => 'Displays a HeartyPromoteLight instance',
		);

		parent::__construct( 'heartypromotelight_widget', 'HeartyPromoteLight Widget', $widget_options );

	}

	function widget($args, $instance) {

		require_once('view.php');

		global $wp_query;

		$object_id = $wp_query->get_queried_object_id();

		$title = !empty($instance['title']) ? apply_filters('widget_title', $instance['title']) : '';
		$settings_instance = !empty($instance['settings_instance']) && is_numeric($instance['settings_instance']) ? $instance['settings_instance'] : 1;
		$show_on_pages = !empty($instance['show_on_pages']) ? $instance['show_on_pages'] : array(0);
		$show_on_categories = !empty($instance['show_on_categories']) ? $instance['show_on_categories'] : array(0);

		$display = false;

		if (is_page($object_id)) {

			if (!in_array(0, $show_on_pages) && (in_array(-1,$show_on_pages) || in_array($object_id, $show_on_pages))) {

				$display = true;

			}

		} else {

			if (!in_array(0, $show_on_categories)) {

				if (in_array(-1, $show_on_categories)) {

					$display = true;

				} else {

					$categories_obj = get_the_category($object_id);

					$categories_arr = array();

					foreach ($categories_obj as $category_obj) {

						$categories_arr[] = $category_obj->term_id;

					}

					$check_categories = array_intersect($categories_arr, $show_on_categories);

					if (!empty($check_categories)) { $display = true; }

				}

			}

		}

		if ($display) {

			$output = $args['before_widget'];
			$output .= $args['before_title'].$title.$args['after_title'];
			$output .= HeartyPromoteLightView::generate_view($settings_instance);
			$output .= $args['after_widget'];

			echo $output;

		}

	}

	function form($instance) {

		$options = get_option('heartypromotelight_options');

		$number_of_settings_instances = 1;

		$title = !empty($instance['title']) ? $instance['title'] : '';
		$settings_instance = !empty($instance['settings_instance']) ? $instance['settings_instance'] : 1;
		$show_on_pages = !empty($instance['show_on_pages']) ? $instance['show_on_pages'] : array(0);
		$show_on_categories = !empty($instance['show_on_categories']) ? $instance['show_on_categories'] : array(0);

		$output = '';
		$output .= '<p>';
			$output .= '<label for="'.$this->get_field_id('title').'">Title:</label><br />';
			$output .= '<input class="widefat" type="text" id="'.$this->get_field_id('title').'" name="'.$this->get_field_name('title').'" value="'.esc_attr($title).'" />';
		$output .= '</p>';
		$output .= '<p>';
			$output .= '<label for="'.$this->get_field_id('settings_instance').'">Settings Instance:<br /><i>enter a settings instance number</i></label><br />';

			$output .= '<select autocomplete="off" class="widefat" id="'.$this->get_field_id('settings_instance').'" name="'.$this->get_field_name('settings_instance').'">';

				for ($i = 1; $i <= $number_of_settings_instances; $i++) {

					$oselected = (esc_attr($settings_instance) == $i) ? ' selected' : '';

					$output .= '<option value="'.$i.'"'.$oselected.'>'.$i.'</option>';

				}

			$output .='</select>';

		$output .= '</p>';
		$output .= '<p>';

			$output .= '<label for="'.$this->get_field_id('show_on_pages').'">Show on Pages:<br /><i>select the pages you want the widget to be displayed on</i></label><br />';

			$output .= '<select autocomplete="off" class="widefat" id="'.$this->get_field_id('show_on_pages').'" name="'.$this->get_field_name('show_on_pages').'[]" multiple>';

				$aselected = in_array(-1,$show_on_pages) ? ' selected' : '';
				$nselected = in_array(0,$show_on_pages) ? ' selected' : '';

				$output .= '<option value="0"'.$nselected.'>None</option>';
				$output .= '<option value="-1"'.$aselected.'>All</option>';

			$output .='</select>';

		$output .= '</p>';
		$output .= '<p>';

			$output .= '<label for="'.$this->get_field_id('show_on_categories').'">Show on Categories:<br /><i>select the categories you want the widget to be displayed on</i></label><br />';

			$output .= '<select autocomplete="off" class="widefat" id="'.$this->get_field_id('show_on_categories').'" name="'.$this->get_field_name('show_on_categories').'[]" multiple>';

				$aselected = in_array(-1,$show_on_categories) ? ' selected' : '';
				$nselected = in_array(0,$show_on_categories) ? ' selected' : '';

				$output .= '<option value="0"'.$nselected.'>None</option>';
				$output .= '<option value="-1"'.$aselected.'>All</option>';

			$output .='</select>';

		$output .= '</p>';

		echo $output;

	}

	function update($new_instance, $old_instance) {

		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['settings_instance'] = strip_tags($new_instance['settings_instance']);
		$instance['show_on_pages'] = esc_sql($new_instance['show_on_pages']);
		$instance['show_on_categories'] = esc_sql($new_instance['show_on_categories']);

		return $instance;

	}

}
