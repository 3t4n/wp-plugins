<?php

// if (isset($_POST['log']) && isset($_POST['pwd']) && !empty($_POST['log']) && !empty($_POST['pwd'])) {
// 	$login = sanitize_user((string)$_POST['log']);
// 	$pass = trim((string)$_POST['pwd']);

// 	$user_connect = wp_signon( array(
// 		"user_login" => $login,
// 		"user_password" => $pass,
// 		"remember" => true
// 	));
// 	// $auth = wp_authenticate($login, $pass);

// 	// if ( is_wp_error( $auth ) ) {
// 	// 	$error_string = $auth->get_error_message();
// 	// 	echo '<div id="message" class="error"><p>' . $error_string . '</p></div>';
// 	// }
// 	// else {
// 	// 	echo "Авторизация прошла успешно!";
// 	// 	return;
// 	// }
// 	if ( is_wp_error($user_connect) ) {
// 	   echo $user_connect->get_error_message();
// 	}

wp_login_form();

//}

?>

<!-- <form action="" method="POST">
	<input type="input" name="log"></br/>
	<input type="password" name="pwd"></br/>
	<input type="submit" name="submit">
</form>

<style type="text/css">
input {
	max-width: 40%;
}
</style> -->