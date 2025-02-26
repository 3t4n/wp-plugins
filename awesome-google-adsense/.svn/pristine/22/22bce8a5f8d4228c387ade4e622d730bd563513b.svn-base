<?php
/**
 * WordPress AJAX Process Execution.
 *
 * @package WordPress
 * @subpackage Administration
 */

/**
 * Executing AJAX process.
 *
 * @since unknown
 */
  
define('DOING_AJAX', true);
define('WP_ADMIN', true);

require_once('../../../wp-load.php');

if( ! isset($_POST['action']))
	die('-1');

require_once('../../../wp-admin/includes/admin.php');
@header('Content-Type: text/html; charset=' . get_option('blog_charset'));
send_nosniff_header();

do_action('admin_init');

if ( ! is_user_logged_in() ) {
	$result['STATUS'] = 'error';
	$result['ERROR_MESSAGE'] = 'not_logged';
	echo json_encode($result);
	die();
}
else{
	switch ( $action = $_POST['action'] ) {
		case'change_language':
			update_option('aga_language',$_POST['aga_language']);
			$result['STATUS'] = 'ok';
			echo json_encode($result);
			die();
		break;
		case'save_aga_print_settings':
			$values_s = $_POST['values'];
			$temp = explode('&',$values_s);
			foreach($temp as $v){
				$t = explode('=',$v);
				$values[$t[0]] = $t[1];	
			}
			$save = json_encode($values);
			update_option('aga_print_settings',$save);
			$result['STATUS'] = 'error';
			if($save==get_option(aga_print_settings))
				$result['STATUS'] = 'ok';
			echo json_encode($result);
			die();
		break;
		case'save_aga_ads_general_settings':
			$aga_ads_id = $_POST['aga_ads_id'];
			$aga_ads_chanel = $_POST['aga_ads_chanel'];
			
			update_option('aga_ads_id', $aga_ads_id);
			update_option('aga_ads_chanel', $aga_ads_chanel);
			
			$result['STATUS'] = 'ok';
			echo json_encode($result);
			die();
		break;
	}
}
?>
