<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once(T4U_DIR.'core'.DIRECTORY_SEPARATOR.'t4u_activation_hooks.php');
require_once(T4U_DIR.'core'.DIRECTORY_SEPARATOR.'t4u_content_parser.php');
require_once(T4U_DIR.'core'.DIRECTORY_SEPARATOR.'t4u_course_metaboxes.php');
require_once(T4U_DIR.'core'.DIRECTORY_SEPARATOR.'t4u_course_ajax_hooks.php');


require_once(T4U_DIR.'core'.DIRECTORY_SEPARATOR.'t4u_user_submissions_table.php');
require_once(T4U_DIR.'core'.DIRECTORY_SEPARATOR.'t4u_user_queries_table.php');
require_once(T4U_DIR.'core'.DIRECTORY_SEPARATOR.'t4u_functions.php');