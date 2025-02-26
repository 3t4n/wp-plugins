<?php
if ( ! defined( 'ABSPATH' ) ) exit; // make sure index.php is called and ABSPATH is set 
 
 add_action('wp_logout','nucuta_logout');
function nucuta_logout()
{
	session_start();
	unset($_SESSION['user_token']);
	session_destroy();
}

?>