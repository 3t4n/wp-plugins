<?php
	include_once('../../../../wp-config.php');
	include_once('../../../../wp-load.php');
	include_once('../../../../wp-includes/wp-db.php');

    $authentication = array ('access_token'=>get_option('ajs_access_token'), 'user_id'=>get_option('ajs_user_id'), 'count'=>get_option('ajs_count'));
	header('Content-type: application/json');
    echo json_encode($authentication);
?>