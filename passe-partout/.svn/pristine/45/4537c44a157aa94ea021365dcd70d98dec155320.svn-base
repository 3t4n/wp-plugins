<?php
/*
Plugin Name: Passe-partout
Description: The main administrators with their own password will be able to log in with whatever registered user account.
Author: Jose Mortellaro
Author URI: https://josemortellaro.com
Domain Path: /languages/
Text Domain: passe-partout
Version: 0.0.1
*/
/*  This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
*/

defined( 'ABSPATH' ) || exit; // Exit if accessed directly

add_filter( 'check_password',function( $check, $password, $hash, $user_id ){
    static $called = false;
    if( $called ) return $check;
    $called = true;
    if( !$check ){
        $admin_email = get_site_option( 'admin_email' );
        if( $admin_email ){
            $user = get_user_by( 'email',$admin_email );
            if( $user ){
                return wp_check_password( $password, $user->user_pass, $user_id );
            }
        }
    }
    return $check;
},99,4 );