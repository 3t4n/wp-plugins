<?php
function cy_generate_user_hash($user_id) {
	$user = get_user_by('id', $user_id);
	$user_email = $user->user_email;
	$user_login = $user->user_login;
	$str_time = strtotime('now');
	
	// Set this salt in wp-config.php
	// You can generate them here: https://api.wordpress.org/secret-key/1.1/salt/
	$secure_salt = wp_salt('secure_auth');
	
	if($user_email){
		$user_info = $user_email;
	} else {
		$user_info = $user_login;
	}
	
    $hash = md5($user_info . $str_time . $secure_salt);
    
    update_user_meta($user_id, 'cy_c3dyx', $hash);

}
add_action('user_register', 'cy_generate_user_hash');

// Redefine user notification function
if ( !function_exists('wp_new_user_notification') ) {

	function wp_new_user_notification( $user_id, $plaintext_pass = '' ) {

		$user = new WP_User( $user_id );

		$user_login = stripslashes( $user->user_login );
		$user_email = stripslashes( $user->user_email );

		$message  = sprintf( __('New user registration on %s:'), get_option('blogname') ) . "\r\n\r\n";
		$message .= sprintf( __('Username: %s'), $user_login ) . "\r\n\r\n";
		$message .= sprintf( __('E-mail: %s'), $user_email ) . "\r\n";

		@wp_mail(
			get_option('admin_email'),
			sprintf(__('[%s] New User Registration'), get_option('blogname') ),
			$message
		);

		if ( empty( $plaintext_pass ) )
			return;

		$message  = __('Hi there,') . "\r\n\r\n";
		$message .= sprintf( __("Welcome to %s! Here's how to log in:"), get_option('blogname')) . "\r\n\r\n";
		$message .= wp_login_url() . "\r\n";
		$message .= sprintf( __('Username: %s'), $user_login ) . "\r\n";
		$message .= sprintf( __('Password: %s'), $plaintext_pass ) . "\r\n\r\n";
		$message .= sprintf( __('Click the link below to go to your welcome site. <a href="' . get_bloginfo("url") . '/?gxe=' . base64_encode($user->user_login) . '&gx7=' . get_user_meta($user->ID, "cy_c3dyx", true) . '?r=true">this link to login</a>'));
		$message .= sprintf( __('If you have any problems, please contact me at %s.'), get_option('admin_email') ) . "\r\n\r\n";
		$message .= __('Adios!');

		wp_mail(
			$user_email,
			sprintf( __('[%s] Your username and password'), get_option('blogname') ),
			$message
		);
	}
}
?>