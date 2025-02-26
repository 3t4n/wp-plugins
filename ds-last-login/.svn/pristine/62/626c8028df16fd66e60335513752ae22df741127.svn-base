<?php 
/*
Plugin Name: DS Last Login
Description: DS Last Login plugin that allows you to see active users last login date and time
Author: Deepika
Version: 1.0
License: GPLv2 or later
*/
add_action( 'wp_login', 'dsll_login_time' );
function dsll_login_time( $user_login ) {
    global $wpdb;
    $user_id = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->users WHERE user_login = %s", $user_login ) );
    update_user_meta( $user_id, 'last_login', current_time('mysql') );
}

add_filter( 'manage_users_columns', 'dsll_last_login_column' );
function dsll_last_login_column( $columns ) {
    $columns['last_login'] = __( 'Last login', 'last_login' );
    return $columns;
}

add_action( 'manage_users_custom_column',  'dsll_last_login_column_value', 10, 3 );
function dsll_last_login_column_value( $value, $column_name, $user_id ) {
    $meta = get_user_meta( $user_id, 'last_login', true );
    if ( 'last_login' == $column_name && $meta ) {
        return date_i18n( 
            sprintf(
                '%s - %s',
                get_option( 'date_format' ),
                get_option( 'time_format' )
            ),
            strtotime( $meta ),
            get_option( 'gmt_offset' )
        );
    }
    return $value;
}
?>
