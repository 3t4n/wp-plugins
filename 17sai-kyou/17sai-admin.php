<?php
include_once( __DIR__ . '/17sai-functions.php' );

function add_user_birthday_form( $bool ) {
    global $profileuser;
	$request_uri = filter_input( INPUT_SERVER, 'REQUEST_URI' );
	
    if ( preg_match( '/^(profile\.php|user-edit\.php)/', basename( $request_uri ) ) ) :
		$user_birthday = $profileuser->user_birthday;
		$select = birthday_select_form( $user_birthday );
		echo '<h3>'. __( 'BirthDate Settting', '17sai'  ) . '</h3>';
		echo '<table class="form-table">';
			echo '<tr>';
				echo '<th scope="row">'. __( 'Birth Date', '17sai' ) . '</th>';
				echo '<td>' . $select . '</td>';
			echo '</tr>';
		echo '</table>';
	endif;
	
    return $bool;
}
add_action( 'show_user_profile', 'add_user_birthday_form' );
add_action( 'edit_user_profile', 'add_user_birthday_form' );

function update_user_birthday( $user_id, $old_user_data ) {
	$old_user_birthday = $old_user_data->user_birthday;
	$user_year = filter_input( INPUT_POST, 'user_year' );
	$user_month = filter_input( INPUT_POST, 'user_month' );
	$user_day = filter_input( INPUT_POST, 'user_day' );
	
    if ( isset( $user_day ) && date( 'j', strtotime( $old_user_birthday ) ) != $user_day ) :
		$user_birthday = $user_year . '-' . $user_month . '-' . $user_day;
        $user_birthday = _wp_specialchars( $user_birthday );
		update_user_meta( $user_id, 'user_birthday', $user_birthday );
	endif;
}
add_action( 'profile_update', 'update_user_birthday', 10, 2 );