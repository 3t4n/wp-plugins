<?php

if (isset($_POST['log']) &&  isset($_POST['email']) && is_email($_POST['email'])){
	require_once ABSPATH . WPINC .'/registration.php';
	$user_login = trim(sanitize_text_field($_POST['log']));
	$user_email = trim(sanitize_email($_POST['email']));
	$errors = register_new_user($user_login, $user_email);
	if( !email_exists($user_email) ){
		echo "Данный Email уже используется";
		return;
	}
	elseif (!get_user_by('login', $user_login )) {
		echo "Данный login уже используется";
		return;
	}
	echo "Пароль будет прислан вам на почту";
}
else echo "Данные введены неверно";

?>

<form action="" method="POST">
	<label>Login</label><br /><br />
	<input type="input" name="log"><br />
	<label>Email</label><br /><br />
	<input type="input" name="email"><br />
	<input type="submit" name="">
</form>