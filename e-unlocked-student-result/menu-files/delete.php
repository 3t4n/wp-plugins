<?php
DEFINED('ABSPATH') or die("You can't access this file.");
global $wpdb;
$prefix = $wpdb->prefix;
$id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
$sqlmark = $wpdb->delete( $prefix.'eusr_mark', array( 'sid' => $id ) );
$sql = $wpdb->delete( $prefix.'eusr_student_result', array( 'sid' => $id ) );
if ($sql>0){
    header('Location: '.admin_url("admin.php?page=eusr-all-students&del=true"));
 }
?>