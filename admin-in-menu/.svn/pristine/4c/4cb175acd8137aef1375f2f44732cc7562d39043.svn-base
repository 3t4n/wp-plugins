<?php

//vars
require 'data.php';

define('PLUGIN_DIR', plugin_dir_path( dirname( __FILE__ ) ));
define('PROFILE_DIR', plugin_dir_path( dirname( __FILE__ ) ) . '/profile/');

$return = PROFILE_DIR . "successfully.php";

//print $path;

$lables = array(
	'login' => "",
	'pass' => 'Новый пароль',
	'name' => 'Имя',
	'last_name' => 'Фамилия',
	'email' => 'Email'
	);

$current_pass;
$current_login;
/*$creeds = array(
		'user_login' => $user->user_login, 
		'user_password' => $user->user_pass, 
		'remember' => true);*/

//form validation
if (isset($_POST['pass']) && $_POST['pass'] != "") {
	$_POST['pass'] = trim($_POST['pass']);
}

//$_POST['login'] = trim($_POST['login']);

if (!isset($_POST['pass']) || $_POST['pass'] == "") {
	$current_pass = $user->user_pass;
}
else{
	$current_pass = wp_set_password((string)$_POST['pass'], $id);
}



if (isset($_POST['email']) && is_email($_POST['email'])) {
	$email_user = sanitize_email($_POST['email']);
}
elseif(!isset($_POST['email'])) {
	$email_user = (string)$email;
}
else {
	$return = PROFILE_DIR . "noncorrect.php";
	$email_user = $email;
}


/*if (isset($_POST['login']) && $login != $_POST['login'] && $_POST != "") {
	$current_login = $_POST;
}
else {
	$current_login = $user->user_login;
}
*/

if (isset($_POST['name_person']) && isset($_POST['last_name_person']) &&  isset($_POST['email']) && $_POST['name_person'] != "" && $_POST['last_name_person'] != "" && $_POST['email'] != "") {
	wp_update_user(array(

		'ID' => (int)$id,
		'first_name' => sanitize_text_field((string)$_POST['name_person']),
		'user_pass' => $current_pass,
		'user_login' => $user->user_login,
		'user_email' => $email_user,
		'last_name' => sanitize_text_field((string)$_POST['last_name_person'])

		));
	require $return;
	return;

}

?>
<form action="" method="POST">
	<label><?= $lables['login'] ?></label><br /><br />
	<label><?= $lables['pass'] ?></label><br />
	<input type="input" value="" name="pass"><br />
	<label><?= $lables['name'] ?></label><br />
	<input type="input" required value="<?= $name; ?>" name="name_person"><br />
	<label><?= $lables['last_name'] ?></label><br />
	<input type="input" required value="<?= $last_name; ?>" name="last_name_person"><br />
	<label><?= $lables['email'] ?></label><br />
	<input type="input" required value="<?= $email; ?>" name="email"><br /><br />
	<input type="submit" value="Обновить значение" name="">
</form>

<style type="text/css">
input {
	max-width: 40%;
}
</style>