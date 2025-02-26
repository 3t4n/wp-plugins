<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function EWD_UAR_Create_Admin_Account($Email_Address) {
	$Password = EWD_UAR_RandomString();

	$User_Data = array(
						'user_login' => $Email_Address,
						'user_pass' => $Password,
						'user_email' => $Email_Address,
						'role' => "administrator"	
	);
	wp_insert_user($User_Data);
}

function EWD_UAR_RandomString($CharLength = 20)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < $CharLength; $i++) {
        $randstring .= $characters[rand(0, strlen($characters))];
    }
    return $randstring;
}
?>