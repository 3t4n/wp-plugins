<?php
function cy_auto_login() {
	
	// If a user is logged in, get out of this function
	if(is_user_logged_in()){
		return;
	}
	
	// if the user isn't logged in, continue.
	if(!is_user_logged_in()){
	
		// Get the User Name & URL hash
		$user_login = $_GET['gxe'];
		$provided_hash = $_GET['gx7'];
		
		// If the url does not contain either a user hash or a login hash, get out.
		if(!$provided_hash || !$user_login) {
			wp_logout(); // only using this just in case they have a login cookie and get here.
			return;
		}
		
		// Decode the login hash (no essential data in there. See user-registered.php)
		$user_login_decoded = base64_decode($user_login);
		
		//get user's ID
		$user = get_user_by('login', $user_login_decoded);
		$user_id = $user->ID;
		
		// If the user does not exist, get out.
		if(!$user) {
			wp_logout(); // only using this just in case they have a login cookie and get here.
			return;
		}
		
		// if the user is an admin, get out. Admins should log in through http://your_site_url/wp-admin
		if(is_super_admin( $user_id )){
			return;
		}
		
		// Get the Users hash from the DB (See user-registered.php for how the hash was created)
		$user_hash = get_user_meta($user_id, 'cy_c3dyx', true);
		
		// if the user hash does not match the provided hash, get out.
		if($user_hash !== $provided_hash){
			wp_logout();
			return;
		}
		
		//login
		wp_set_current_user($user_id, $user_login);
		wp_set_auth_cookie($user_id);
		do_action('wp_login', $user_login);
		
		// remove user meta so they cannot use the link again.
		delete_user_meta($user_id, 'cy_c3dyx');
	}
}
add_action('init', 'cy_auto_login');
?>