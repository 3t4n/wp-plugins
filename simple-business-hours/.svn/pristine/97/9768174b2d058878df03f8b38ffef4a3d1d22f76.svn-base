<?php
add_action( 'widgets_init', function(){
     register_widget( 'My_Widget' );
});

class My_Widget extends WP_Widget {

	public function __construct() {
		// widget actual processes
		parent::__construct(
	 		'sbh_widget', // Base ID
			'Simple Business Hours', // Widget Name
			array( 'description' => __( 'A Simple Business Hours Widget used to display your business working hours.', 'SimpleBusinessHours' ), ) // Args
		);
	}


	public function widget( $args, $instance ) {
		wp_enqueue_style('sbh-widget-bootstrap',plugins_url('/bootstrap-assets/css/sbh-widget-bootstrap.css', __FILE__));
		// outputs the content of the widget
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $before_widget;
		if ( ! empty( $title ) )
			echo $before_title . $title . $after_title;
		//echo $after_widget;
		?>
		    <div>
			<style>
			td {
				padding:5px;
			}
			table {
				margin:5px;
			}
			</style>
				<table width="100%">
				  <tr>
				    <td align="center" scope="row">&nbsp;</td>
				    <td align="center"><strong><span class="sbh-label">
			        <?php _e('Start Time' ,'SimpleBusinessHours'); ?></span>
				    </strong></td>
				    <td align="center">&nbsp;</td>
				    <td align="center"><strong><span class="sbh-label">
			        <?php _e('End Time' ,'SimpleBusinessHours'); ?></span>
				    </strong></td>
			      </tr>
				  <?php
				  	global $wpdb;
				  	$BusinessHourTable = $wpdb->prefix ."sbh_business_hours";
					$SbhSettings = get_option('sbh_settings_array');
					//print_r($SbhSettings);
					$GetBusinessHours = $wpdb->get_row("SELECT * FROM `$BusinessHourTable` WHERE `id` =1 AND `loc_id` =1");
					//print_r($GetBusinessHours);
					$monday    = unserialize($GetBusinessHours->monday);
					$tuesday   = unserialize($GetBusinessHours->tuesday);
					$wednesday = unserialize($GetBusinessHours->wednesday);
					$thursday  = unserialize($GetBusinessHours->thursday);
					$friday    = unserialize($GetBusinessHours->friday);
					$saturday  = unserialize($GetBusinessHours->saturday);
					$sunday    = unserialize($GetBusinessHours->sunday);
					
					$Days = array(
						'0' => array( $monday['start_time'],$monday['end_time'],$monday['close']),
						'1' => array( $tuesday['start_time'],$tuesday['end_time'],$tuesday['close']),
						'2' => array( $wednesday['start_time'],$wednesday['end_time'],$wednesday['close']),
						'3' => array( $thursday['start_time'],$thursday['end_time'],$thursday['close']),
						'4' => array( $friday['start_time'],$friday['end_time'],$friday['close']),
						'5' => array( $saturday['start_time'],$saturday['end_time'],$saturday['close']),
						'6' => array( $sunday['start_time'],$sunday['end_time'],$sunday['close'])
					);
					$mon = __( 'mon', 'SimpleBusinessHours' );
					$tue = __( 'tue', 'SimpleBusinessHours' );
					$wed = __( 'wed', 'SimpleBusinessHours' );
					$thr = __( 'thr', 'SimpleBusinessHours' );
					$fri = __( 'fri', 'SimpleBusinessHours' );
					$sat = __( 'sat', 'SimpleBusinessHours' );
					$sun = __( 'sun', 'SimpleBusinessHours' );
					
					$DayName = array( $mon, $tue, $wed, $thr, $fri, $sat, $sun );
					if($SbhSettings) 
					{ 
						$startfrom = $SbhSettings['business_start_day'] - 1; 
						if($SbhSettings['time_format'] == 12) { $SbhTimeFormat = "h:i A"; } else { $SbhTimeFormat = "H:i"; }
					} 
					else { $startfrom = 0;	}
				  ?>
			<?php
				if($GetBusinessHours)
				{
					//start from
					for($i = $startfrom; $i < 7; $i++)
					{
						if($Days[$i][2] == 'yes') { 
							$Days[$i][0] = 'CLOSED';
							$Days[$i][1] = 'CLOSED';
						}
					?>
				  <tr>
					<th align="center" scope="row"><span class="sbh-badge"><?php echo _e(strtoupper($DayName[$i]) ,'SimpleBusinessHours'); ?></span></th>
					<td align="center"><button type="button" class="sbh-btn sbh-btn-mini">
					  <?php if($Days[$i][0] != 'CLOSED') echo date($SbhTimeFormat, strtotime($Days[$i][0])); else echo $Days[$i][0]; ?>
					</button></td>
					<td align="center"><?php _e( 'To', 'SimpleBusinessHours' ); ?></td>
					<td align="center"><button type="button" class="sbh-btn sbh-btn-mini">
					  <?php if($Days[$i][0] != 'CLOSED')echo date($SbhTimeFormat, strtotime($Days[$i][1])); else echo $Days[$i][1]; ?>
					</button></td>
				  </tr>
					<?php
					}
					
					//remailing start
					for($i = 0; $i < $startfrom; $i++)
					{
						if($Days[$i][2] == 'yes') { 
							$Days[$i][0] = 'CLOSED';
							$Days[$i][1] = 'CLOSED';
						}
					?>
				  <tr>
					<th align="center" scope="row"><span class="sbh-badge"><?php echo _e(strtoupper($DayName[$i]) ,'SimpleBusinessHours'); ?></span></th>
					<td align="center"><button type="button" class="sbh-btn sbh-btn-mini">
					  <?php if($Days[$i][0] != 'CLOSED') echo date($SbhTimeFormat, strtotime($Days[$i][0])); else echo $Days[$i][0]; ?>
					</button></td>
					<td align="center"><?php _e( 'To', 'SimpleBusinessHours' ); ?></td>
					<td align="center"><button type="button" class="sbh-btn sbh-btn-mini">
					  <?php if($Days[$i][0] != 'CLOSED')echo date($SbhTimeFormat, strtotime($Days[$i][1])); else echo $Days[$i][1]; ?>
					</button></td>
				  </tr>
					<?php
					}// end foreach
				}// if closebusiness
			?>
			  </table>

			</div>

		<?php
	}


 	public function form( $instance ) {
		// outputs the options form on admin
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'Business Hours', 'SimpleBusinessHours' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
		$instance = array();
		$instance['title'] = strip_tags( $new_instance['title'] );

		return $instance;
	}

}
?>