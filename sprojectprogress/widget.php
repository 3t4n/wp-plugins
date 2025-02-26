<?php
	class sProjectProgress extends WP_Widget {
		function sProjectProgress() {
			$wp_options = array( 'description' => 'Create progress bars for your projects.' );
			parent::WP_Widget( false, $name = 'sProjectProgress', $wp_options );
		}

		function widget( $args, $instance ) {
			extract($args);
			$title = apply_filters( 'widget_title', $instance['title'] );
			$progress = $instance['progress'];
			$layout = $instance['layout'];
			$primarycolor = $instance['primarycolor'];
			$secondarycolor = $instance['secondarycolor'];

			echo $before_widget;

			switch ($layout) {
				case 0:
					if ( $title ) echo $before_title . $title . $after_title;
					echo '<progress value="' . ( $instance['progress'] / 100 ) . '" style="width: 100%;">' . $instance['progress'] . '</progress>';
					break;
				case 1:
					if ( $title ) echo $before_title . $title . $after_title;
					echo '<div style="' . $this->layout1( 'outer', $secondarycolor ) . '"><div style="width: ' . $instance['progress'] . '%;' . $this->layout1('inner', $primarycolor ) . '"></div></div>';
					break;
				case 2:
					if ( $title ) echo $before_title . $title . $after_title;
					echo '<div style="' . $this->layout2( 'outer', $secondarycolor ) . '"><div style="width: ' . $instance['progress'] . '%;' . $this->layout2('inner', $primarycolor ) . '"></div></div>';
					break;

				default:
					if ( $title ) echo $before_title . $title . $after_title;
					echo '<progress value="' . ( $instance['progress'] / 100 ) . '">' . $instance['step'] . ': ' . $instance['progress'] . '</progress>';
					break;
				}

			echo $after_widget;
		}

		private function layout1($element, $color = '' ) {
			switch ($element) {
				case 'outer':
					if ( $color == '') $color = '#404040';
					$css .= 'padding: 5px;';
					$css .= 'height: 20px;';
					$css .= 'background-color: ' . $color . ';';
					break;
				case 'inner':
					if ( $color == '') $color = '#BC360A';
					$css .= 'display: block;';
					$css .= 'height: 100%;';
					$css .= 'background-color: ' . $color . ';';
					break;
			}
			return $css;
		}

		private function layout2($element, $color = '' ) {
			switch ($element) {
				case 'outer':
					if ( $color == '') $color = '#404040';
					$css .= 'height: 20px;';
					$css .= 'border-radius: 5px;';
					$css .= 'background-color: ' . $color . ';';
					$css .= 'box-shadow:inset 0px 0px 4px #000000;';
					break;
				case 'inner':
					if ( $color == '') $color = '#BC360A';
					$css .= 'display: block;';
					$css .= 'height: 100%;';
					$css .= 'border-radius: 5px;';
					$css .= 'background-color: ' . $color . ';';
					$css .= 'box-shadow: inset 0px 0px 3px #000000;';
					break;
			}
			return $css;
		}

		private function layout3($element, $color = '' ) {
			switch ($element) {
				case 'outer':
					if ( $color == '') $color = '#404040';
					$css .= 'padding: 4px;';
					$css .= 'height: 30px;';
					$css .= 'border-radius: 5px;';
					$css .= 'background-color: ' . $color . ';';
					$css .= 'box-shadow:inset 0px 0px 3px #000000;';
					break;
				case 'inner':
					if ( $color == '') $color = '#BC360A';
					$css .= 'display: block;';
					$css .= 'height: 100%;';
					$css .= 'background-image: url(' . get_option( 'siteurl' ) . '/' . PLUGINDIR . '/sprojectprogress/img/bar.gif);';
					$css .= 'background-repeat: repeat-x;';
					break;
			}
			return $css;
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			$instance['title'] = strip_tags($new_instance['title']);
			$instance['progress'] = $new_instance['progress'];
			$instance['layout'] = $new_instance['layout'];
			$instance['primarycolor'] = strip_tags($new_instance['primarycolor']);
			$instance['secondarycolor'] = strip_tags($new_instance['secondarycolor']);

			return $instance;
		}

		function form( $instance ) {
			$default_settings = array( 'title' => get_option('sPP_default_project'), 'progress' => get_option('sPP_default_progress'), 'layout' => get_option('sPP_default_layout'), 'primarycolor' => get_option('sPP_default_primarycolor'), 'secondarycolor' => get_option('sPP_default_secondarycolor') );
			$instance = wp_parse_args((array) $instance, $default_settings); 
			?>
				<p>
					<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
					<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" type="text" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('progress'); ?>">Progress (in percent):</label>
					<input id="<?php echo $this->get_field_id('progress'); ?>" name="<?php echo $this->get_field_name('progress'); ?>" value="<?php echo $instance['progress']; ?>" style="width:100%;" type="text" />
				</p>
				<p>
					<ul>
						<li><b>Appearance</b></li>
						<li><input id="<?php echo $this->get_field_id('layout'); ?>0" name="<?php echo $this->get_field_name('layout'); ?>" value="0" type="radio"<?php if($instance['layout']==0) echo ' checked="checked"'; ?> /> <label for="<?php echo $this->get_field_id('layout'); ?>0">Standard</label></li>
						<li><input id="<?php echo $this->get_field_id('layout'); ?>1" name="<?php echo $this->get_field_name('layout'); ?>" value="1" type="radio"<?php if($instance['layout']==1) echo ' checked="checked"'; ?> /> <label for="<?php echo $this->get_field_id('layout'); ?>1">Flat</label></li>
						<li><input id="<?php echo $this->get_field_id('layout'); ?>2" name="<?php echo $this->get_field_name('layout'); ?>" value="2" type="radio"<?php if($instance['layout']==2) echo ' checked="checked"'; ?> /> <label for="<?php echo $this->get_field_id('layout'); ?>2">Round</label></li>
					</ul>
				</p>
				<p><b>Colors</b> (not for the standard appearance, use hexadecimal codes)</p>
				<p>
					<input id="<?php echo $this->get_field_id('primarycolor'); ?>" name="<?php echo $this->get_field_name('primarycolor'); ?>" value="<?php echo $instance['primarycolor']; ?>" type="color" /> <label for="<?php echo $this->get_field_id('primarycolor'); ?>">Primary color:</label>
				</p>
				<p>
					<input id="<?php echo $this->get_field_id('secondarycolor'); ?>" name="<?php echo $this->get_field_name('secondarycolor'); ?>" value="<?php echo $instance['secondarycolor']; ?>" type="color" /> <label for="<?php echo $this->get_field_id('secondarycolor'); ?>">Secondary color:</label>
				</p>
			<?php
		}
	}

	function sPP_register_widget() {
		register_widget( 'sProjectProgress' );
	}

	add_action( 'widgets_init', 'sPP_register_widget' );
?>