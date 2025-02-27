function opera_define_ui_hooks_for_cron_rules( json_param_obj ){

//console.log( 'opera_define_ui_hooks_for_cron_rules', json_param_obj);

	// RUN	------------------------------------------------------------------------------------------------------------

	if (  ( undefined != json_param_obj.advanced ) && ( undefined != json_param_obj.advanced['rule_run'] ) && ( undefined != json_param_obj.advanced['rule_run']['recurrence'] )  ){

		var seconds = parseInt( json_param_obj.advanced['rule_run']['recurrence'] );
		jQuery( '.cron_rule_run__recurrence' ).val( seconds );

		var days_hours_minutes = opera_get_days_hours_minutes_from_seconds( seconds );

		jQuery( '.cron_rule_run__recurrence_days' ).val( days_hours_minutes[ 0 ] );
		jQuery( '.cron_rule_run__recurrence_hours' ).val( days_hours_minutes[ 1 ] );
		jQuery( '.cron_rule_run__recurrence_minutes' ).val( days_hours_minutes[ 2 ] );

	}

	jQuery( '.cron_rule_run__recurrence_days,.cron_rule_run__recurrence_hours,.cron_rule_run__recurrence_minutes' ).on( 'change', function( event ){

		var days = jQuery( '.cron_rule_run__recurrence_days' ).val();
		var hours = jQuery( '.cron_rule_run__recurrence_hours' ).val();
		var minutes = jQuery( '.cron_rule_run__recurrence_minutes' ).val();

		var seconds = parseInt( days ) * 24 * 60 * 60 + parseInt( hours ) * 60 * 60 + parseInt( minutes ) * 60;

		jQuery( '.cron_rule_run__recurrence' ).val( seconds );
	});

	// RESET	--------------------------------------------------------------------------------------------------------

	if (  ( undefined != json_param_obj.advanced ) && ( undefined != json_param_obj.advanced['rule_reset'] ) && ( undefined != json_param_obj.advanced['rule_reset']['recurrence'] )  ){

		var seconds = parseInt(  json_param_obj.advanced['rule_reset']['recurrence'] );
		if ( isNaN( seconds ) ){
			seconds = 0;
		}
		jQuery( '.cron_rule_reset__recurrence' ).val( seconds );

		var days_hours_minutes = opera_get_days_hours_minutes_from_seconds( seconds );

		jQuery( '.cron_rule_reset__recurrence_days' ).val( days_hours_minutes[ 0 ] );
		jQuery( '.cron_rule_reset__recurrence_hours' ).val( days_hours_minutes[ 1 ] );
		jQuery( '.cron_rule_reset__recurrence_minutes' ).val( days_hours_minutes[ 2 ] );

	}

	jQuery( '.cron_rule_reset__recurrence_days,.cron_rule_reset__recurrence_hours,.cron_rule_reset__recurrence_minutes' ).on( 'change', function( event ){

		var days = jQuery( '.cron_rule_reset__recurrence_days' ).val();
		var hours = jQuery( '.cron_rule_reset__recurrence_hours' ).val();
		var minutes = jQuery( '.cron_rule_reset__recurrence_minutes' ).val();

		var seconds = parseInt( days ) * 24 * 60 * 60 + parseInt( hours ) * 60 * 60 + parseInt( minutes ) * 60;
		if ( isNaN( seconds ) ){
			seconds = 0;
		}

		jQuery( '.cron_rule_reset__recurrence' ).val( seconds );
	});


}


/**
 * Get array of Days, Hours, Minutes, Seconds, based on  seconds value
 * @param seconds
 * @returns []
 */
function opera_get_days_hours_minutes_from_seconds( seconds ){

	var days = parseInt( Math.floor( seconds / ( 60 * 60 * 24 ) ) );
	if ( isNaN( days ) ){
		days = 0;
	}
	var hours =  parseInt( Math.floor( ( seconds - ( days * 60 * 60 * 24 ) ) / ( 60 * 60 ) ) );
	if ( isNaN( hours ) ){
		hours = 0;
	}
	var minutes =  parseInt( Math.floor( ( seconds - ( days * 60 * 60 * 24 ) - ( hours * 60 * 60 ) ) / ( 60 ) ) );
	if ( isNaN( minutes ) ){
		minutes = 0;
	}
	var rest_seconds =  parseInt( Math.floor( ( seconds - ( days * 60 * 60 * 24 ) - ( hours * 60 * 60 )  - ( minutes * 60 ) ) ) );
	if ( isNaN( rest_seconds ) ){
		rest_seconds = 0;
	}
	return [ days, hours, minutes, rest_seconds ];
}


/**
 * Get nearest  time in seconds to  start send email reminder
 *
 * @param int   local_time_s    - Timestamp - Local Time in seconds since 1970
 * @param array condition_arr	- advanced: {
										send_week0: "On"
										send_week1: "Off"
										send_week2: "Off"
										send_week3: "Off"
										send_week4: "Off"
										send_week5: "Off"
										send_week6: "On"
										time_from: "13:00"
										time_to: "15:00"

 * @returns int seconds
 */
function opera_get_next_time_to_send( local_time_s, condition_arr ){

	// If one of times undefined,  so  something wrong with  configuration,  and we need to  send right now - 0 sec.
	if ( ( undefined == condition_arr[ 'time_from' ] ) || ( undefined == condition_arr[ 'time_from' ] ) ){
		// return 'now';
		return 0;
	}

	local_time_s = parseInt( local_time_s );

	////////////////////////////////////////////////////////////////////////
	var time_from = condition_arr[ 'time_from' ].split( ':' );
	time_from[0] = parseInt( time_from[0] );
	time_from[1] = parseInt( time_from[1] );

	var time_to = condition_arr[ 'time_to' ].split( ':' );
	time_to[0] = parseInt( time_to[0] );
	time_to[1] = parseInt( time_to[1] );
	if ( ( 24 == time_to[0] ) && ( 0 == time_to[1] ) ){
		time_to = [23, 59];
	}
	// time_from = [ 0, 0 ]
	// time_to 	 = [ 23, 59 ]
	////////////////////////////////////////////////////////////////////////


	var now_date = new Date();
	now_date.setTime( local_time_s * 1000 );

	var now_date_arr = [
						  now_date.getUTCFullYear()
						, now_date.getUTCMonth()				// Months start from 0  [0..11]
						, now_date.getUTCDate()
						, now_date.getUTCDay()				// Su - 0 .... Sat - 6
						, now_date.getUTCHours()
						, now_date.getUTCMinutes()
						, now_date.getUTCSeconds()
						, now_date.getUTCMilliseconds()
	]


	var current_weekday = now_date.getUTCDay();

	// Its array of start/ end times  for Next week starting from  today.
	var next_week = [];

	var check_date;

	var closest = {};
	closest['min_diff'] = 8 * ( 24 * 60 * 60 * 1000 );

	for ( var day_shift = 0; day_shift < 7; day_shift++ ){

		if  (
			   ( undefined != condition_arr[ 'send_week' + current_weekday ] )
			&& ( 'On' == condition_arr[ 'send_week' + current_weekday ] )
		){

			next_week[ current_weekday ] = [];

			check_date = new Date();
			check_date.setTime( now_date.getTime()  + day_shift * ( 24 * 60 * 60 * 1000 )  );

			// Set Start hours
			check_date.setUTCHours( time_from[ 0 ] , time_from[ 1 ], 0 );
			next_week[ current_weekday ].push( (check_date.getTime() - now_date.getTime()) / 1000 );

			// Set End hours
			check_date.setUTCHours( time_to[ 0 ] , time_to[ 1 ], 0 );
			next_week[ current_weekday ].push( (check_date.getTime() - now_date.getTime()) / 1000 );

			// If start time less than now time (its negative value,
			// and END time is higher than now time,  its positive value,
			// -- its means that  we can  send it NOW
			if (
					(  next_week[ current_weekday ][0]  < 0 )
				&&  (  next_week[ current_weekday ][1]  > 0 )
			){
				//return 'now';
				return 0;
			}

			// Get closest timestamp
			if (  next_week[ current_weekday ][0] < closest['min_diff'] ) {

				closest['min_diff'] = next_week[ current_weekday ][0];

				closest['week_day'] =  current_weekday;

				check_date.setUTCHours( time_from[ 0 ] , time_from[ 1 ], 0 );

				closest['timestamp'] 	=  check_date.getTime();
				closest['date'] 		=  new Date( check_date.getTime() );
				closest['diff_in_sec'] 	=  ( ( closest['timestamp'] - now_date.getTime() ) / 1000 );
				closest['diff_in_h'] 	= opera_get_days_hours_minutes_from_seconds( closest['diff_in_sec'] );
			}
		}

		current_weekday++;
		if ( current_weekday > 6 ){
			current_weekday = 0;
		}
	}

// console.log( 'next_week', next_week )
// console.log( 'closest', closest );

	return closest['diff_in_sec']; //closest['diff_in_h'];
}