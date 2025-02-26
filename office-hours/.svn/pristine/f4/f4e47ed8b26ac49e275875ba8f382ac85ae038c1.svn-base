<?php

class OpeningHours_Today extends WP_Widget{
	function OpeningHours_Today(){
		$widget_ops = array( 'classname' => 'OpeningHours_Today', 'description' => __( 'Displays a message whether we work today or not.' , 'opening_hours' ));
		$this->WP_Widget( 'OfficeHours_Today', __( 'OfficeHours_Today' , 'opening_hours' ), $widget_ops );
	}
	function form( $instance ){
		/* default setting for today widget */
		$instance = wp_parse_args(( array ) $instance, array( 'title' => '', 'yes' => __( 'We work today' , 'opening_hours' ), 'no' => __( 'We don\'t work today' , 'opening_hours' ), 'yes_color' => 'green', 'yes_background' => 'white', 'no_color' => 'red', 'no_background' => 'white', 'background_use' => 'false', 'align' => 'left' ));		
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
				<?php _e( 'Title', 'opening_hours' ); ?>: 
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
			</label><br/><br/>
			<label for="<?php echo $this->get_field_id( 'yes' ); ?>">
				<?php _e( 'Text for work day', 'opening_hours' ); ?>: 
				<input class="widefat" id="<?php echo $this->get_field_id( 'yes' ); ?>" name="<?php echo $this->get_field_name( 'yes' ); ?>" type="text" value="<?php echo esc_attr( $instance['yes'] ); ?>" />
			</label><br/><br/>
			<label for="<?php echo $this->get_field_id( 'yes_color' ); ?>">
				<?php _e( 'Color of text for work day', 'opening_hours' ); ?>: 
				<input class="widefat" id="<?php echo $this->get_field_id( 'yes_color' ); ?>" name="<?php echo $this->get_field_name( 'yes_color' ); ?>" type="text" value="<?php echo esc_attr( $instance['yes_color'] ); ?>" />
			</label><br/><br/>
			<label for="<?php echo $this->get_field_id( 'yes_background' ); ?>">
				<?php _e( 'Color of background for work day', 'opening_hours' ); ?>: 
				<input class="widefat" id="<?php echo $this->get_field_id( 'yes_background' ); ?>" name="<?php echo $this->get_field_name( 'yes_background' ); ?>" type="text" value="<?php echo esc_attr( $instance['yes_background'] ); ?>" />
			</label><br/><br/>
			<label for="<?php echo $this->get_field_id( 'no' ); ?>">
				<?php _e( 'Text for free day', 'opening_hours' ); ?>: 
				<input class="widefat" id="<?php echo $this->get_field_id('no'); ?>" name="<?php echo $this->get_field_name('no'); ?>" type="text" value="<?php echo esc_attr( $instance['no'] ); ?>" />
			</label><br/><br/>
			<label for="<?php echo $this->get_field_id( 'no_color' ); ?>">
				<?php _e( 'Color of text for free day', 'opening_hours' ); ?>: 
				<input class="widefat" id="<?php echo $this->get_field_id( 'no_color' ); ?>" name="<?php echo $this->get_field_name( 'no_color' ); ?>" type="text" value="<?php echo esc_attr( $instance['no_color'] ); ?>" />
			</label><br/><br/>
			<label for="<?php echo $this->get_field_id( 'no_background' ); ?>">
				<?php _e( 'Color of background for free day', 'opening_hours' ); ?>: 
				<input class="widefat" id="<?php echo $this->get_field_id( 'no_background' ); ?>" name="<?php echo $this->get_field_name( 'no_background' ); ?>" type="text" value="<?php echo esc_attr( $instance['no_background'] ); ?>" />
			</label><br/><br/>
			<label for="<?php echo $this->get_field_id( 'background_use' ); ?>">
				<?php _e( 'Use background color', 'opening_hours' ); ?>: 
				<input id="<?php echo $this->get_field_id( 'background_use' ); ?>" name="<?php echo $this->get_field_name( 'background_use' ); ?>" type="checkbox" <?php if ( 'true' == $instance['background_use'] ) echo 'checked="checked"'; ?> value="true" />
			</label><br/><br/></p>
			
			<?php _e( 'Align', 'opening_hours' ); ?>:<br/>
				<?php _e( 'left', 'opening_hours' ); ?><input id="<?php echo $this->get_field_id( 'align' ); ?>" name="<?php echo $this->get_field_name( 'align' ); ?>" type="radio" <?php if ( strcmp( $instance['align'],'left' ) == 0 ) echo 'checked="checked"'; ?> value="left" />
				<?php _e( 'center', 'opening_hours' ); ?><input id="<?php echo $this->get_field_id( 'align' ); ?>" name="<?php echo $this->get_field_name( 'align'); ?>" type="radio" <?php if ( strcmp( $instance['align'],'center' ) == 0 ) echo 'checked="checked"'; ?> value="center" />
				<?php _e( 'right', 'opening_hours' ); ?><input id="<?php echo $this->get_field_id( 'align' ); ?>" name="<?php echo $this->get_field_name( 'align' ); ?>" type="radio" <?php if ( strcmp( $instance['align'],'right' ) == 0 ) echo 'checked="checked"'; ?> value="right" />
			<br/></p>
		</p>
		<?php
	}
	
	function update( $new_instance, $old_instance ){
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['yes'] = $new_instance['yes'];
		$instance['no'] = $new_instance['no'];
		$instance['yes_color'] = $new_instance['yes_color'];
		$instance['no_color'] = $new_instance['no_color'];
		$instance['yes_background'] = $new_instance['yes_background'];
		$instance['no_background'] = $new_instance['no_background'];
		$instance['background_use'] = $new_instance['background_use'];
		$instance['align'] = $new_instance['align'];
		return $instance;
	}
	
	function widget( $args, $instance ){
		extract( $args, EXTR_SKIP );
		echo $before_widget;
		$title = empty( $instance['title'] ) ? ' ' : apply_filters( 'widget_title', $instance['title'] );
		
		/* show widget's title if exist */
		if ( !empty($title))
			echo $before_title . $title . $after_title;
		
		$options = get_option( 'openinghour_options' );
		$work = true;

		if( isset( $options['holydays'] )){
			$holydays = $options['holydays'];
			$now = time();
			foreach( $holydays as $day ){
				$parts = explode( ".", $day[0] );
				$var = $parts[2] . "-" . $parts[1] . "-" . $parts[0];
				$parts = explode( ".", $day[1] );
				$var2 = $parts[2] . "-" . $parts[1] . "-" . ( $parts[0] + 1 );
    
				if(( $now > strtotime( $var )) && ( strtotime( $var2 ) > $now )){
					$reason = $day[2];
					$work = false;
					break;
				}
			}
		}
		
		if( $work ){
		/* get current day and compare it with schedule */
		switch ( date( "w" )){
			case "0":
				if( $options['schedule_sun_work'] )
					$work = true;
				else $work = false;
				break;
			case 1:
				if( $options['schedule_mon_work'] )
					$work = true;
				else $work = false;
				break;
			case 2:
				if( $options['schedule_tue_work'] )
					$work = true;
				else $work = false;
				break;
			case 3:
				if( $options['schedule_wed_work'] )
					$work = true;
				else $work = false;
				break;
			case 4:
				if( $options['schedule_thu_work'] )
					$work = true;
				else $work = false;
				break;
			case 5:
				if( $options['schedule_fri_work'] )
					$work = true;
				else $work = false;
				break;
			case 6:
				if( $options['schedule_sat_work'] )
					$work = true;
				else $work = false;
				break;
		}}
		
		$ul = "<ul style='text-align: " . $instance['align'] . ";list-style-type: none;";
		/* if is set using background color so backgound color is used*/
		if( $instance['background_use'] == true ){
			if( $work )
				$ul = $ul . ";background: " . $instance['yes_background'] . ";";
			else
				$ul = $ul . ";background: " . $instance['no_background'] . ";";
		}
		$ul = $ul . ";'>";
		
		/* showing message */
		echo $ul;
		echo "<li>" . _e( 'Today is', 'opening_hours' ) . "</li>";
		echo "<li>".date( 'd.m.Y' )."</li>";
		if( $work )
			echo "<li style='color: " . $instance['yes_color'] . ";'>" . $instance['yes'] . "</li>"; 
		else
			echo "<li style='color: " . $instance['no_color'] . ";'>" . $instance['no'] . "</li>";
		if( isset( $reason ) &&strcmp( $reason, "" ) != 0 )
			echo "<li>Dôvod: " . $reason . "</li>";
			
		echo "</ul>";
		echo $after_widget;
	}
}
?>
