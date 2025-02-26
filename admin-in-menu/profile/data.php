<?php
if($id = get_current_user_id()){
	$user = get_userdata($id);
	$login = $user->user_login;
	$password = $user->user_pass;
	$name = $user->first_name;
	$email = $user->user_email;
	$last_name = $user->last_name;
}
else 
	return;