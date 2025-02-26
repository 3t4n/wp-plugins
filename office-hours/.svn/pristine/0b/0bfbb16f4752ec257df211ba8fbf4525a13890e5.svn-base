<?php
 function openinghour_settings_api_init(){
	register_setting( 'openinghour_options', 'openinghour_options', 'openinghour_options_validate' );
	add_settings_section( 'openinghour_schedule', __( 'Time Format', 'opening_hours'), 'openinghour_schedule_text', 'openinghour' );
	add_settings_section( 'openinghour_lunch_time', __( 'Lunch Time', 'opening_hours'), 'openinghour_lunch_time', 'openinghour' );
	add_settings_section( 'openinghour_comment', __( 'Comment', 'opening_hours'), 'openinghour_comment', 'openinghour' );
	add_settings_section( 'openinghour_holydays', __( 'Free time', 'opening_hours'), 'openinghour_holydays_text', 'openinghour' );
	}
 
 
function openinghour_schedule_text() {
	$options = get_option('openinghour_options');
	?>
		<table class="form-table">
			<tr valign="top">
				<td><fieldset><legend class="screen-reader-text"><span><?php _e( 'Time format', 'opening_hours'); ?></span></legend>
					<p><label>
						<input name="openinghour_options[time-format]" type="radio" value="tf12" class="tog" <?php if(isset($options['time-format']) && strcmp($options['time-format'], "tf12") == 0) echo "checked='checked'"; ?>/>
						<?php _e( '12 hours', 'opening_hours'); ?>	</label>
					</p>
					<p><label>
						<input name="openinghour_options[time-format]" type="radio" value="tf24" class="tog" <?php if(isset($options['time-format']) && strcmp($options['time-format'], "tf24") == 0) echo "checked='checked'"; ?>/>
						<?php _e( '24 hours', 'opening_hours'); ?>	</label>
					</p>
					</fieldset></td>
			</tr>
		</table>
		
		<table>
			<tr>
				<th></th>
				<th><?php _e( 'From', 'opening_hours'); ?>:</th>
				<th><?php _e( 'To', 'opening_hours'); ?>:</th>
				<th><?php _e( 'Where', 'opening_hours'); ?>:</th>
				<th><?php _e( 'Work day', 'opening_hours'); ?>:</th>
			</tr>
			<tr>
				<td><?php _e( 'Mon', 'opening_hours'); ?>: </td>
				<td><input id='openinghour_schedule_mon_from' name='openinghour_options[schedule_mon_from]' size='5' type='text' value='<?php echo $options['schedule_mon_from']; ?>' /></td>
				<td><input id='openinghour_schedule_mon_to' name='openinghour_options[schedule_mon_to]' size='5' type='text' value='<?php echo $options['schedule_mon_to']; ?>' /></td>
				<td><input id='openinghour_schedule_mon_where' name='openinghour_options[schedule_mon_where]' size='10' type='text' value='<?php echo $options['schedule_mon_where']; ?>' /></td>
				<td style="text-align: center;"><input id='openinghour_schedule_mon_work' name='openinghour_options[schedule_mon_work]' size='40' type='checkbox' value='1' <?php checked( 1, $options['schedule_mon_work'] ); ?> /></td>
			</tr>
			<tr>
				<td><?php _e( 'Tue', 'opening_hours'); ?>: </td>
				<td><input id='openinghour_schedule_tue_from' name='openinghour_options[schedule_tue_from]' size='5' type='text' value='<?php echo $options['schedule_tue_from']; ?>' /></td>
				<td><input id='openinghour_schedule_tue_to' name='openinghour_options[schedule_tue_to]' size='5' type='text' value='<?php echo $options['schedule_tue_to']; ?>' /></td>
				<td><input id='openinghour_schedule_tue_where' name='openinghour_options[schedule_tue_where]' size='10' type='text' value='<?php echo $options['schedule_tue_where']; ?>' /></td>
				<td style="text-align: center;"><input id='openinghour_schedule_tue_work' name='openinghour_options[schedule_tue_work]' size='40' type='checkbox' value='1' <?php checked( 1, $options['schedule_tue_work'] ); ?> /></td>
			</tr>
			<tr>
				<td><?php _e( 'Wed', 'opening_hours'); ?>: </td>
				<td><input id='openinghour_schedule_wed_from' name='openinghour_options[schedule_wed_from]' size='5' type='text' value='<?php echo $options['schedule_wed_from']; ?>' /></td>
				<td><input id='openinghour_schedule_wed_to' name='openinghour_options[schedule_wed_to]' size='5' type='text' value='<?php echo $options['schedule_wed_to']; ?>' /></td>
				<td><input id='openinghour_schedule_wed_where' name='openinghour_options[schedule_wed_where]' size='10' type='text' value='<?php echo $options['schedule_wed_where']; ?>' /></td>
				<td style="text-align: center;"><input id='openinghour_schedule_wed_work' name='openinghour_options[schedule_wed_work]' size='40' type='checkbox' value='1' <?php checked( 1, $options['schedule_wed_work'] ); ?> /></td>
			</tr>
			<tr>
				<td><?php _e( 'Thu', 'opening_hours'); ?>: </td>
				<td><input id='openinghour_schedule_thu_from' name='openinghour_options[schedule_thu_from]' size='5' type='text' value='<?php echo $options['schedule_thu_from']; ?>' /></td>
				<td><input id='openinghour_schedule_thu_to' name='openinghour_options[schedule_thu_to]' size='5' type='text' value='<?php echo $options['schedule_thu_to']; ?>' /></td>
				<td><input id='openinghour_schedule_thu_where' name='openinghour_options[schedule_thu_where]' size='10' type='text' value='<?php echo $options['schedule_thu_where']; ?>' /></td>
				<td style="text-align: center;"><input id='openinghour_schedule_thu_work' name='openinghour_options[schedule_thu_work]' size='40' type='checkbox' value='1' <?php checked( 1, $options['schedule_thu_work'] ); ?> /></td>
			</tr>
			<tr>
				<td><?php _e( 'Fri', 'opening_hours'); ?>: </td>
				<td><input id='openinghour_schedule_fri_from' name='openinghour_options[schedule_fri_from]' size='5' type='text' value='<?php echo $options['schedule_fri_from']; ?>' /></td>
				<td><input id='openinghour_schedule_fri_to' name='openinghour_options[schedule_fri_to]' size='5' type='text' value='<?php echo $options['schedule_fri_to']; ?>' /></td>
				<td><input id='openinghour_schedule_fri_where' name='openinghour_options[schedule_fri_where]' size='10' type='text' value='<?php echo $options['schedule_fri_where']; ?>' /></td>
				<td style="text-align: center;"><input id='openinghour_schedule_fri_work' name='openinghour_options[schedule_fri_work]' size='40' type='checkbox' value='1' <?php checked( 1, $options['schedule_fri_work'] ); ?> /></td>
			</tr>
			<tr>
				<td><?php _e( 'Sat', 'opening_hours'); ?>: </td>
				<td><input id='openinghour_schedule_sat_from' name='openinghour_options[schedule_sat_from]' size='5' type='text' value='<?php echo $options['schedule_sat_from']; ?>' /></td>
				<td><input id='openinghour_schedule_sat_to' name='openinghour_options[schedule_sat_to]' size='5' type='text' value='<?php echo $options['schedule_sat_to']; ?>' /></td>
				<td><input id='openinghour_schedule_sat_where' name='openinghour_options[schedule_sat_where]' size='10' type='text' value='<?php echo $options['schedule_sat_where']; ?>' /></td>
				<td style="text-align: center;"><input id='openinghour_schedule_sat_work' name='openinghour_options[schedule_sat_work]' size='40' type='checkbox' value='1' <?php checked( 1, $options['schedule_sat_work'] ); ?> /></td>
			</tr>
			<tr>
				<td><?php _e( 'Sun', 'opening_hours'); ?>: </td>
				<td><input id='openinghour_schedule_sun_from' name='openinghour_options[schedule_sun_from]' size='5' type='text' value='<?php echo $options['schedule_sun_from']; ?>' /></td>
				<td><input id='openinghour_schedule_sun_to' name='openinghour_options[schedule_sun_to]' size='5' type='text' value='<?php echo $options['schedule_sun_to']; ?>' /></td>
				<td><input id='openinghour_schedule_sun_where' name='openinghour_options[schedule_sun_where]' size='10' type='text' value='<?php echo $options['schedule_sun_where']; ?>' /></td>
				<td style="text-align: center;"><input id='openinghour_schedule_sun_work' name='openinghour_options[schedule_sun_work]' size='40' type='checkbox' value='1' <?php checked( 1, $options['schedule_sun_work'] ); ?> /></td>
			</tr>
		</table>
	<?php
}

function openinghour_lunch_time(){
	$options = get_option('openinghour_options');
	?>
	<label for='openinghour_schedule_lunch_from'><?php _e( 'From', 'opening_hours'); ?>: </label><input id='openinghour_schedule_lunch_from' name='openinghour_options[schedule_lunch_from]' size='10' type='text' value='<?php echo $options['schedule_lunch_from']; ?>' />
	<label for='openinghour_schedule_lunch_to'><?php _e( 'To', 'opening_hours'); ?>: </label><input id='openinghour_schedule_lunch_to' name='openinghour_options[schedule_lunch_to]' size='10' type='text' value='<?php echo $options['schedule_lunch_to']; ?>' />
	<label for='openinghour_schedule_lunch_use'><?php _e( 'Use', 'opening_hours'); ?>: </label><input id='openinghour_schedule_lunch_use' name='openinghour_options[schedule_lunch_use]' size='10' type='checkbox' value='1' <?php checked( 1, $options['schedule_lunch_use'] ); ?> />
	<?php
}

function openinghour_comment(){
	$options = get_option('openinghour_options');
	?>
	<textarea id='openinghour_schedule_comment' name='openinghour_options[schedule_comment]' type='text' rows="5" cols="40"><?php echo $options['schedule_comment']; ?></textarea>
	<?php
}

function openinghour_holydays_text(){
	$options = get_option('openinghour_options');
	?>
	<label for='openinghour_holydays_from'><?php _e( 'From', 'opening_hours'); ?>: </label><input id='openinghour_holydays_from' class="input_date" name='schedule_holydays_from' size='10' type='text' value='' />
	<label for='openinghour_holydays_to'><?php _e( 'To', 'opening_hours'); ?>: </label><input id='openinghour_holydays_to' class="input_date" name='schedule_holydays_to' size='10' type='text' value='' />
	<label for='openinghour_holydays_why'><?php _e( 'Reason', 'opening_hours'); ?>: </label><input id='openinghour_holydays_why' name='schedule_holydays_why' size='10' type='text' value='' />
	<button id="add" type='button'><?php _e( 'Add', 'opening_hours'); ?></button>
	<br /><br />
	<table id="holydays" style="width:370px">
		<tr>
			<th class="openinghour_from"><?php _e( 'From', 'opening_hours'); ?>:</th>
			<th class="openinghour_to"><?php _e( 'To', 'opening_hours'); ?>:</th>
			<th class="openinghour_why"><?php _e( 'Reason', 'opening_hours'); ?>:</th>
			<?php echo openinghour_show_holidays(); ?>
		</tr>
	</table>
	<?php
}

function openinghour_options_validate( $input ){
	
	$options['time-format'] = $input['time-format'];
	
	if( !isset( $options['time-format'] ) && ( strcmp( $options['time-format'], "tf24" ) != 0 ) && ( strcmp( $options['time-format'], "tf12") != 0 ))
		$options['time-format'] = "tf24";
	
	$options['schedule_comment'] = trim( $input['schedule_comment'] );
	
	$options['schedule_lunch_from'] = settime($input['schedule_lunch_from']);
	$options['schedule_lunch_to'] = settime($input['schedule_lunch_to']);
	if( !is_after( $options['schedule_lunch_from'], $options['schedule_lunch_to'] )){
		$input['schedule_lunch_use'] = 0;
	}
	if( isset( $input['schedule_lunch_from'] ) &&$input['schedule_lunch_use'] == 1 )
		$options['schedule_lunch_use'] = 1;
	else
		$options['schedule_lunch_use'] = 0;
	
	$options['schedule_mon_where'] = trim( $input['schedule_mon_where'] );
	$options['schedule_tue_where'] = trim( $input['schedule_tue_where'] );
	$options['schedule_wed_where'] = trim( $input['schedule_wed_where'] );
	$options['schedule_thu_where'] = trim( $input['schedule_thu_where'] );
	$options['schedule_fri_where'] = trim( $input['schedule_fri_where'] );
	$options['schedule_sat_where'] = trim( $input['schedule_sat_where'] );
	$options['schedule_sun_where'] = trim( $input['schedule_sun_where'] );
	
	$options['schedule_mon_from'] = settime($input['schedule_mon_from']);
	$options['schedule_mon_to'] = settime($input['schedule_mon_to']);
	if( !is_after( $options['schedule_mon_from'], $options['schedule_mon_to'] )){
		$options['schedule_mon_from'] = "00:00";
		$options['schedule_mon_to'] = "00:00";
		$input['schedule_mon_work'] = 0;
	}
	
	
	$options['schedule_tue_from'] = settime($input['schedule_tue_from']);
	$options['schedule_tue_to'] = settime($input['schedule_tue_to']);
	if( !is_after( $options['schedule_tue_from'], $options['schedule_tue_to'] )){
		$options['schedule_tue_from'] = "00:00";
		$options['schedule_tue_to'] = "00:00";
		$input['schedule_tue_work'] = 0;
	}
	
	$options['schedule_wed_from'] = settime($input['schedule_wed_from']);
	$options['schedule_wed_to'] = settime($input['schedule_wed_to']);
	if( !is_after( $options['schedule_wed_from'], $options['schedule_wed_to'] )){
		$options['schedule_wed_from'] = "00:00";
		$options['schedule_wed_to'] = "00:00";
		$input['schedule_wed_work'] = 0;
	}
	
	$options['schedule_thu_from'] = settime($input['schedule_thu_from']);
	$options['schedule_thu_to'] = settime($input['schedule_thu_to']);
	if( !is_after( $options['schedule_thu_from'], $options['schedule_thu_to'] )){
		$options['schedule_thu_from'] = "00:00";
		$options['schedule_thu_to'] = "00:00";
		$input['schedule_thu_work'] = 0;
	}
	
	$options['schedule_fri_from'] = settime($input['schedule_fri_from']);
	$options['schedule_fri_to'] = settime($input['schedule_fri_to']);
	if( !is_after( $options['schedule_fri_from'], $options['schedule_fri_to'] )){
		$options['schedule_fri_from'] = "00:00";
		$options['schedule_fri_to'] = "00:00";
		$input['schedule_fri_work'] = 0;
	}
	
	$options['schedule_sat_from'] = settime($input['schedule_sat_from']);
	$options['schedule_sat_to'] = settime($input['schedule_sat_to']);
	if( !is_after( $options['schedule_sat_from'], $options['schedule_sat_to'] )){
		$options['schedule_sat_from'] = "00:00";
		$options['schedule_sat_to'] = "00:00";
		$input['schedule_sat_work'] = 0;
	}
	
	$options['schedule_sun_from'] = settime($input['schedule_sun_from']);
	$options['schedule_sun_to'] = settime($input['schedule_sun_to']);
	if( !is_after( $options['schedule_sun_from'], $options['schedule_sun_to'] )){
		$options['schedule_sun_from'] = "00:00";
		$options['schedule_sun_to'] = "00:00";
		$input['schedule_sun_work'] = 0;
	}
	
	if( isset( $input['schedule_mon_work'] ) &&$input['schedule_mon_work'] == 1 )
		$options['schedule_mon_work'] = 1;
	else
		$options['schedule_mon_work'] = 0;
	
	if( isset( $input['schedule_tue_work'] ) &&$input['schedule_tue_work'] == 1 )
		$options['schedule_tue_work'] = 1;
	else
		$options['schedule_tue_work'] = 0;
		
	if( isset( $input['schedule_wed_work'] ) &&$input['schedule_wed_work'] == 1 )
		$options['schedule_wed_work'] = 1;
	else
		$options['schedule_wed_work'] = 0;
		
	if( isset( $input['schedule_thu_work'] ) &&$input['schedule_thu_work'] == 1 )
		$options['schedule_thu_work'] = 1;
	else
		$options['schedule_thu_work'] = 0;
		
	if( isset( $input['schedule_fri_work'] ) &&$input['schedule_fri_work'] == 1 )
		$options['schedule_fri_work'] = 1;
	else
		$options['schedule_fri_work'] = 0;
		
	if( isset( $input['schedule_sat_work'] ) &&$input['schedule_sat_work'] == 1 )
		$options['schedule_sat_work'] = 1;
	else
		$options['schedule_sat_work'] = 0;
		
	if( isset( $input['schedule_sun_work'] ) &&$input['schedule_sun_work'] == 1 )
		$options['schedule_sun_work'] = 1;
	else
		$options['schedule_sun_work'] = 0;
	
	$save = array();
	$from = $to = $why = NULL;
	$fc = $ft = $fw = -1;
	foreach ( $_POST as $key => $input_arr ){
		if( strrpos( $key, "free_from" ) !== false ){
			$from = $input_arr;
			$fc = substr( $key, 9 );
		}
		else if( strrpos( $key, "free_to") !== false ){
			$to = $input_arr;
			$ft = substr( $key, 7 );
		}
		else if( strrpos( $key, "free_why" ) !== false ){
			$why = $input_arr;
			$fw = substr( $key, 8 );
		}
		if(( $from != NULL ) &&( $to != NULL ) &&( $fc == $ft ) &&( $ft == $fw )){
			$parts = explode(".", $from);
			$parts2 = explode(".", $to);
			/* check if date exist */
			if( checkdate( $parts[1], $parts[0], $parts[2] ) &&checkdate( $parts2[1], $parts2[0], $parts2[2] )){
				
				$save[] = array($from, $to, $why);
			}
			$from = $to = $why = NULL;
		}
	}
	
	if(count($save) != 0)
		$options["holydays"] = $save;
	
	return $options;
}

/* time validation */
function settime( $time ) {
	/* find pm or PM in send time*/
	$pos = strpos( $time, "pm" );
	$POS = strpos( $time, "PM" );
	
	/* parts[0] contains hours parts[1] contains minutes*/
	$parts = explode( ":", trim( $time ));
	
	/* if is set only hours without minutes*/
	if( count( $parts ) == 1){
		/* add minutes */
		$parts[] = "00";
	}
	
	$parts[0] = substr( $parts[0], 0, 2);
	$parts[1] = substr( $parts[1], 0, 2);
	
	/* if hours and minutes aren't numbers return 00:00 */
	if( !is_numeric( $parts[0] ) ||!is_numeric( $parts[1] )){
		return "00:00";
	}
	/* if PM or pm was found add 12 to hours */
	if ( $pos !== false ||$POS !== false ) {
		$parts[0] = $parts[0] + 12;
	}
	
    if ( $parts[0] < -1 || $parts[0] > 24 && $parts[1] < -1 && $parts[1] > 60) {
        return "00:00";
    }
	
	/* hours must be in format HH so add 0 if it's needed*/	
	if ( strlen( $parts[0] ) == 1)
		$parts[0] = "0" . $parts[0];
	
	return $parts[0] . ":" . $parts[1];
}

/* time2 must be greater or equal time  */
function is_after($time1, $time2){
	$from = explode(":", trim( $time1 ));
	$to = explode(":", trim( $time2 ));
	if(( int ) $from[0] > ( int ) $to[0] )
		return false;
	
	if(( int ) $from[0] == ( int ) $to[0] && ( int ) $from[1] >= ( int ) $to[1])
		return false;
	
	return true;
}

/* show saved holidays */
function openinghour_show_holidays(){
	$options = get_option('openinghour_options');
	if( isset( $options['holydays'] )){
		$holydays = $options['holydays'];
		$i = 1;
		foreach($holydays as $day){
			echo ('<tr><td><input name="free_from'.$i.'" type="text" size="10" value="'.$day[0].'"/></td><td><input name="free_to'.$i.'"type="text" size="10" value="'.$day[1].'"/></td><td><input name="free_why'.$i.'"type="text" size="10" value="'.$day[2].'"/></td><td><button class="del" type="button">' . __( 'Remove', 'opening_hours' ) . '</button></td></tr>');
			$i++;
		}
	}
}
?>
