<?php
if ( ! defined( 'ABSPATH' ) ) exit; // make sure index.php is called and ABSPATH is set

function nucuta_password_hashPass($password)
{
	return password_hash($password,PASSWORD_DEFAULT );
}
?>