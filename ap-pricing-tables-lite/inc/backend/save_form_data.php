<?php

defined( 'ABSPATH' ) or die( "No script kiddies please!" );
global $wpdb;
$table_name = $wpdb -> prefix . 'appts_tables_data';

if ( isset( $_POST[ '_action' ] ) && $_POST[ '_action' ] == 'table_edit_save' ) {


    $post_id = $_POST[ 'postid' ];

    $name = sanitize_text_field( $_POST[ 'name' ] );
    $sid = strtolower( sanitize_text_field( $_POST[ 'sid' ] ) );

    $sid_database = $wpdb -> get_row( $wpdb->prepare( "SELECT sid FROM $table_name WHERE id = %d", $post_id ) );

    $row = $wpdb -> get_var( $wpdb->prepare( "SELECT count(*) FROM $table_name WHERE sid = %s", $sid ) );

    if ( preg_match( '/[^a-z_\-0-9]/i', $sid ) ) {
        $sid_flag = FALSE;
    } else {
        $sid_flag = TRUE;
    }

    if ( $sid == '' ) {
        wp_redirect( esc_url(admin_url( "admin.php?page=ap-pricing-tables-lite-add-new&postid=".intval($post_id)."&message=1" )) );
    } else if ( $sid_flag == FALSE ) {
        wp_redirect( esc_url(admin_url( "admin.php?page=ap-pricing-tables-lite-add-new&postid=".intval($post_id)."&message=2" )) );
    } else if ( ($row == '1' && ($sid == $sid_database -> sid) ) || ($row == '0') ) {
        $post_data = array();
        foreach ( $_POST as $key => $value ) {
            if ( $key == '_action' || $key == 'action' || $key == 'name' || $key == 'sid' || $key == 'postid' ) {
                unset( $post_data[ $key ] );
            } else {
                $post_data[ $key ] = stripslashes_deep( $value );
            }
        }


        $last_modified_date = current_time( 'mysql' );

        $data = array(
            'name' => $name,
            'sid' => $sid,
            'table_data' => maybe_serialize( $post_data ),
            'last_modified_date' => $last_modified_date
        );

        $where = array(
            'id' => $post_id
        );

        $result = $wpdb -> update( $table_name, $data, $where );

        if ( $result !== false ) {
            wp_redirect( esc_url(admin_url( "admin.php?page=ap-pricing-tables-lite-add-new&postid=".intval($post_id)."&message=3" )) );
        } else {
            wp_redirect( esc_url(admin_url( "admin.php?page=ap-pricing-tables-lite-add-new&postid=".intval($post_id)."&message=4" )) );
        }
    } else {
        wp_redirect( esc_url(admin_url( "admin.php?page=ap-pricing-tables-lite-add-new&postid=".intval($post_id)."&message=5" )) );
    }
    die();
} else {

    $name = sanitize_text_field( $_POST[ 'name' ] );
    $sid = strtolower( sanitize_text_field( $_POST[ 'sid' ] ) );

    $post_data = array();
    foreach ( $_POST as $key => $value ) {
        if ( $key == '_action' || $key == 'action' || $key == 'name' || $key == 'sid' ) {
            unset( $post_data[ $key ] );
        } else {
            $post_data[ $key ] = stripslashes_deep( $value );
        }
    }

    $table_name = $wpdb -> prefix . 'appts_tables_data';

    $row = $wpdb -> get_var( "SELECT count(*) FROM $table_name WHERE sid ='$sid'" );

    if ( preg_match( '/[^a-z_\-0-9]/i', $sid ) ) {
        $sid_flag = FALSE;
    } else {
        $sid_flag = TRUE;
    }

    if ( $sid == '' ) {
        wp_redirect( esc_url(admin_url( "admin.php?page=ap-pricing-tables-lite-add-new&message=1" )) );
    } else if ( $sid_flag == FALSE ) {
        wp_redirect( esc_url(admin_url( "admin.php?page=ap-pricing-tables-lite-add-new&message=2" )) );
    } else if ( $row == '0' && $sid != '' ) {
        $current_time = current_time( 'mysql' );

        $result = $wpdb -> insert( $table_name, array(
            'name' => $name,
            'sid' => $sid,
            'table_data' => maybe_serialize( $post_data ),
            'created_date' => $current_time
                )
        );
        $post_id = $wpdb -> insert_id;
        if ( $result !== false ) {
            wp_redirect( esc_url(admin_url( "admin.php?page=ap-pricing-tables-lite-add-new&postid=".intval($post_id)."&message=6" )) );
        } else {
            wp_redirect( esc_url(admin_url( "admin.php?page=ap-pricing-tables-lite-add-new&message=4" )) );
        }
    } else {
        wp_redirect( esc_url(admin_url( "admin.php?page=ap-pricing-tables-lite-add-new&message=5" )) );
    }

    die();
}