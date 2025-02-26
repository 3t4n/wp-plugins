<?php

function birthday_select_form( $user_birthday ) {
	if( !$user_birthday ) { $user_birthday = date( 'Y-m-d', strtotime( '-17 year' ) ); }
	
	$user_year = date( 'Y', strtotime( $user_birthday ) );
	$user_month = date( 'n', strtotime( $user_birthday ) );
	$user_day = date( 'j', strtotime( $user_birthday ) );
	
	$year = '<select name="user_year">';
	for( $y = date( 'Y', strtotime( '-100 year' ) ); $y <= date( 'Y' ); $y++ ) :
		if( $y == $user_year ) :
			$year .= '<option value="' . $y . '" selected>' . $y . '</option>';
		else :
			$year .= '<option value="' . $y . '">' . $y . '</option>';
		endif;
	endfor;
	$year .= '</select>';
	
	$month = '<select name="user_month">';
	for( $m = 1; $m <= 12; $m++ ) :
		if( $m == $user_month ) :
			$month .= '<option value="' . $m . '" selected>' . $m . '</option>';
		else :
			$month .= '<option value="' . $m . '">' . $m . '</option>';
		endif;
	endfor;
	$month .= '</select>';
	
	$day = '<select name="user_day">';
	for( $d = 1; $d <= 31; $d++ ) :
		if( $d == $user_day ) :
			$day .= '<option value="' . $d . '" selected>' . $d . '</option>';
		else :
			$day .= '<option value="' . $d . '">' . $d . '</option>';
		endif;
	endfor;
	$day .= '</select>';
	
	$select = $year . ' - ' . $month . ' - ' . $day;
	
	return $select;
}

function birthday_calculation() {
	$user_birthday = get_user_option( 'user_birthday' );
	$today = date('Y-m-d', strtotime( '-17 year' ) );
	$days = ( strtotime( $today ) - strtotime( $user_birthday ) ) / ( 60 * 60 * 24 );
	
	return $days;
}