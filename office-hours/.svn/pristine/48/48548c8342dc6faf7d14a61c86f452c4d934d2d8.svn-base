<?php

class OpeningHours_Schedule extends WP_Widget{
	function OpeningHours_Schedule(){
		$widget_ops = array( 'classname' => 'OpeningHours_Schedule', 'description' => __( 'Displays business hours.' , 'opening_hours') );
		$this->WP_Widget( 'OfficeHours_Schedule', __( 'OfficeHours_Schedule' , 'opening_hours'), $widget_ops );
	}
	
	function form( $instance ){
		/* default setting for schedule widget */
		$instance = wp_parse_args(( array ) $instance, array( 'title' => '', 'text' => __( 'We don\'t work today' , 'opening_hours' ), 'work' => true, 'align' => 'left' ));
		$title = $instance['title'];
		$text = $instance['text'];
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
				<?php _e( 'Title', 'opening_hours' ); ?>: 
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</label><br/><br/>
			<label for="<?php echo $this->get_field_id( 'text' ); ?>">
				<?php _e( 'Text for free day', 'opening_hours' ); ?>: 
				<input class="widefat" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" type="text" value="<?php echo esc_attr( $text ); ?>" />
			</label><br/><br/>
			<label for="<?php echo $this->get_field_id( 'work' ); ?>"><?php _e( 'Show free days', 'opening_hours' ); ?>: <input id="<?php echo $this->get_field_id( 'work' ); ?>" name="<?php echo $this->get_field_name( 'work' ); ?>" type="checkbox" <?php if ( true == $instance['work'] ) echo 'checked="checked"'; ?> value="true" /></label><br/></p>
			<?php _e( 'Align', 'opening_hours' ); ?>:<br/>
				<?php _e( 'left', 'opening_hours' ); ?><input id="<?php echo $this->get_field_id( 'align' ); ?>" name="<?php echo $this->get_field_name( 'align' ); ?>" type="radio" <?php if ( strcmp( $instance['align'], 'left' ) == 0 ) echo 'checked="checked"'; ?> value="left" />
				<?php _e( 'center', 'opening_hours' ); ?><input id="<?php echo $this->get_field_id( 'align' ); ?>" name="<?php echo $this->get_field_name( 'align' ); ?>" type="radio" <?php if ( strcmp( $instance['align'], 'center' ) == 0 ) echo 'checked="checked"'; ?> value="center" />
				<?php _e( 'right', 'opening_hours' ); ?><input id="<?php echo $this->get_field_id( 'align' ); ?>" name="<?php echo $this->get_field_name( 'align' ); ?>" type="radio" <?php if ( strcmp( $instance['align'], 'right' ) == 0 ) echo 'checked="checked"'; ?> value="right" />
			<br/></p>
  
		<?php
	}
	
	function update( $new_instance, $old_instance ){
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['text'] = $new_instance['text'];
		$instance['work'] = $new_instance['work'];
		$instance['align'] = $new_instance['align'];
		return $instance;
	}
	
	function widget($args, $instance){
		extract($args, EXTR_SKIP);
		echo $before_widget;
		$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
		$work = $instance['work'];
		$text = $instance['text'];
	
		/* show widget's title if exist */
		if (!empty($title))
			echo $before_title . $title . $after_title;;
		
		$options = get_option('openinghour_options');
		
		/* showing schedule */
		echo "<ul style='text-align: " . $instance['align'] . ";list-style-type: none;'>";
		if($options['schedule_mon_work']){
			if($options['schedule_lunch_use'])
				echo "<li>" . __( 'Mon', 'opening_hours') . " : " . $options['schedule_mon_where']. " " .$this->stringtime_to_time( $options['time-format'], $options['schedule_mon_from'] ) . " - ".$this->stringtime_to_time( $options['time-format'], $options['schedule_lunch_from'] ) . " " .$this->stringtime_to_time( $options['time-format'], $options['schedule_lunch_to'] ) . " - ".$this->stringtime_to_time( $options['time-format'], $options['schedule_mon_to'] ) . "</li>";
			else
				echo "<li>" . __( 'Mon', 'opening_hours') . " : " . $options['schedule_mon_where']. " " .$this->stringtime_to_time( $options['time-format'], $options['schedule_mon_from'] ) . " - ".$this->stringtime_to_time( $options['time-format'], $options['schedule_mon_to'] ) . "</li>";
		}
		elseif($work) echo "<li>" . __( 'Mon', 'opening_hours') . " : " . $text ."</li>";
	
		if($options['schedule_tue_work']){
			if($options['schedule_lunch_use'])
				echo "<li>" . __( 'Tue', 'opening_hours') . " : " . $options['schedule_tue_where']. " " .$this->stringtime_to_time( $options['time-format'], $options['schedule_tue_from'] ) . " - ".$this->stringtime_to_time( $options['time-format'], $options['schedule_lunch_from'] ) . " " .$this->stringtime_to_time( $options['time-format'], $options['schedule_lunch_to'] ) . " - ".$this->stringtime_to_time( $options['time-format'], $options['schedule_tue_to'] ) . "</li>";
			else
				echo "<li>" . __( 'Tue', 'opening_hours') . " : " . $options['schedule_tue_where']. " " .$this->stringtime_to_time( $options['time-format'], $options['schedule_tue_from'] ) . " - ".$this->stringtime_to_time( $options['time-format'], $options['schedule_tue_to'] ) . "</li>";
		}
		elseif($work) echo "<li>" . __( 'Tue', 'opening_hours') . " : " . $text ."</li>";
	
		if($options['schedule_wed_work']){
			if($options['schedule_lunch_use'])
				echo "<li>" . __( 'Wed', 'opening_hours') . " : " . $options['schedule_wed_where']. " " .$this->stringtime_to_time( $options['time-format'], $options['schedule_wed_from'] ) . " - ".$this->stringtime_to_time( $options['time-format'], $options['schedule_lunch_from'] ) . " " .$this->stringtime_to_time( $options['time-format'], $options['schedule_lunch_to'] ) . " - ".$this->stringtime_to_time( $options['time-format'], $options['schedule_wed_to'] ) . "</li>";
			else
				echo "<li>" . __( 'Wed', 'opening_hours') . " : " . $options['schedule_wed_where']. " " .$this->stringtime_to_time( $options['time-format'], $options['schedule_wed_from'] ) . " - ".$this->stringtime_to_time( $options['time-format'], $options['schedule_wed_to'] ) . "</li>";
		}
		elseif($work) echo "<li>" . __( 'Wed', 'opening_hours') . " : " . $text ."</li>";
	
		if($options['schedule_thu_work']){
			if($options['schedule_lunch_use'])
				echo "<li>" . __( 'Thu', 'opening_hours') . " : " . $options['schedule_thu_where']. " " .$this->stringtime_to_time( $options['time-format'], $options['schedule_thu_from'] ) . " - ".$this->stringtime_to_time( $options['time-format'], $options['schedule_lunch_from'] ) . " " .$this->stringtime_to_time( $options['time-format'], $options['schedule_lunch_to'] ) . " - ".$this->stringtime_to_time( $options['time-format'], $options['schedule_thu_to'] ) . "</li>";
			else
				echo "<li>" . __( 'Thu', 'opening_hours') . " : " . $options['schedule_thu_where']. " " .$this->stringtime_to_time( $options['time-format'], $options['schedule_thu_from'] ) . " - ".$this->stringtime_to_time( $options['time-format'], $options['schedule_thu_to'] ) . "</li>";
		}
		elseif($work) echo "<li>" . __( 'Thu', 'opening_hours') . " : " . $text ."</li>";
	
		if($options['schedule_fri_work']){
			if($options['schedule_lunch_use'])
				echo "<li>" . __( 'Fri', 'opening_hours') . " : " . $options['schedule_fri_where']. " " .$this->stringtime_to_time( $options['time-format'], $options['schedule_fri_from'] ) . " - ".$this->stringtime_to_time( $options['time-format'], $options['schedule_lunch_from'] ) . " " .$this->stringtime_to_time( $options['time-format'], $options['schedule_lunch_to'] ) . " - ".$this->stringtime_to_time( $options['time-format'], $options['schedule_fri_to'] ) . "</li>";
			else
				echo "<li>" . __( 'Fri', 'opening_hours') . " : " . $options['schedule_fri_where']. " " .$this->stringtime_to_time( $options['time-format'], $options['schedule_fri_from'] ) . " - ".$this->stringtime_to_time( $options['time-format'], $options['schedule_fri_to'] ) . "</li>";
		}
		elseif($work) echo "<li>" . __( 'Fri', 'opening_hours') . " : " . $text ."</li>";
	
		if($options['schedule_sat_work']){
			if($options['schedule_lunch_use'])
				echo "<li>" . __( 'Sat', 'opening_hours') . " : " . $options['schedule_sat_where']. " " .$this->stringtime_to_time( $options['time-format'], $options['schedule_sat_from'] ) . " - ".$this->stringtime_to_time( $options['time-format'], $options['schedule_lunch_from'] ) . " " .$this->stringtime_to_time( $options['time-format'], $options['schedule_lunch_to'] ) . " - ".$this->stringtime_to_time( $options['time-format'], $options['schedule_sat_to'] ) . "</li>";
			else
				echo "<li>" . __( 'Sat', 'opening_hours') . " : " . $options['schedule_sat_where']. " " .$this->stringtime_to_time( $options['time-format'], $options['schedule_sat_from'] ) . " - ".$this->stringtime_to_time( $options['time-format'], $options['schedule_sat_to'] ) . "</li>";
		}
		elseif($work) echo "<li>" . __( 'Sat', 'opening_hours') . " : " . $text ."</li>";
	
		if($options['schedule_sun_work']){
			if($options['schedule_lunch_use'])
				echo "<li>" . __( 'Sun', 'opening_hours') . " : " . $options['schedule_sun_where']. " " .$this->stringtime_to_time( $options['time-format'], $options['schedule_sun_from'] ) . " - ".$this->stringtime_to_time( $options['time-format'], $options['schedule_lunch_from'] ) . " " .$this->stringtime_to_time( $options['time-format'], $options['schedule_lunch_to'] ) . " - ".$this->stringtime_to_time( $options['time-format'], $options['schedule_sun_to'] ) . "</li>";
			else
				echo "<li>" . __( 'Sun', 'opening_hours') . " : " . $options['schedule_sun_where']. " " .$this->stringtime_to_time( $options['time-format'], $options['schedule_sun_from'] ) . " - ".$this->stringtime_to_time( $options['time-format'], $options['schedule_sun_to'] ) . "</li>";
		}
		elseif($work) echo "<li>" . __( 'Sun', 'opening_hours') . " : " . $text ."</li>";
		
		echo "<li>" . $options['schedule_comment'] . "</li></ul>";
		
		echo $after_widget;
	}
  
	function stringtime_to_time( $format, $time ){
		/* convert HH:MM into valid time and show it in 24 hours or 12 hours format */
		$parts = explode( ":", trim( $time ));
		$options = get_option( 'openinghour_options' );
		$format = $options['time-format'];
		if( strcmp( $options['time-format'], "tf24" ) == 0)
			return date( 'H:i', mktime($parts[0], $parts[1], 0, 0, 0, 0));
		else
			return date( 'h:i a', mktime($parts[0], $parts[1], 0, 0, 0, 0));
	}
}
?>
