<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $wpdb;

$user_info = get_userdata(1);

$time = time();
$my_token_ens = $wpdb->get_var( "SELECT option_value FROM $wpdb->options WHERE option_name = 'my_token_ens'" );
global $wpdb;
$table_name = $wpdb->prefix . 'my_servers';

		$id_server= $time;
		$ex_server= '4';
		$ative_server = '1';
		$date_include = $time;
		$from_name = get_bloginfo( 'name' );		
		$smtp_debug = '0';		
		$debug_output = 'html';
		$host_mail = 'example-smtp.gmail.com';
		$port = '587';
		$smtp_secure = 'tls';
		$smtp_auth = 'true';
		$username = 'example-your-email@gmail.com';
		$password = '*****';
		$set_from = 'example-your-email@gmail.com';
		$add_reply_to = $user_info->user_email;
		$add_cc = '';
		$list_unsubscribe = network_site_url( '/list-unsubscribe' );
		$limit_server = '500';
		$sends = '0';
		$first_send = '0';
		$last_send = '0';
		$limit_query = '1';
		$token = $my_token_ens;
		
$charset_collate = $wpdb->get_charset_collate();

$sql = "CREATE TABLE IF NOT EXISTS $table_name (
  id_server int(11) NOT NULL,
  ex_server int(11) NOT NULL,
  ative_server int(2) NOT NULL,
  date_include int(20) NOT NULL,
  from_name varchar(75) NOT NULL,
  smtp_debug int(2) NOT NULL,
  debug_output varchar(4) NOT NULL,
  host_mail varchar(75) NOT NULL,
  port varchar(5) NOT NULL,
  smtp_secure varchar(5) NOT NULL,
  smtp_auth varchar(15) NOT NULL,
  username varchar(75) NOT NULL,
  password varchar(15) NOT NULL,
  set_from varchar(75) NOT NULL,
  add_reply_to varchar(75) NOT NULL,
  add_cc varchar(75) NOT NULL,
  list_unsubscribe varchar(255) NOT NULL,
  limit_server int(11) NOT NULL,
  sends int(11) NOT NULL,
  first_send int(15) NOT NULL,
  last_send int(15) NOT NULL,
  limit_query int(11) NOT NULL,
  token varchar(125) NOT NULL,
  PRIMARY KEY  (id_server)
) $charset_collate;";
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
dbDelta( $sql );


	$wpdb->insert( 
	$table_name, 
	array( 
		'id_server' => $id_server, //1
		'ex_server' =>  $ex_server, //1
		'ative_server' => $ative_server, //2
		'date_include' => $date_include, //3
		'from_name' => $from_name, //4		
		'smtp_debug' => $smtp_debug, //5		
		'debug_output' => $debug_output, //6
		'host_mail' => $host_mail, //7
		'port' => $port, //8
		'smtp_secure' => $smtp_secure, //9
		'smtp_auth' => $smtp_auth, //10
		'username' => $username, //11
		'password' => $password, //12
		'set_from' => $set_from, //13
		'add_reply_to' => $add_reply_to, //14
		'add_cc' => $add_cc, //15
		'list_unsubscribe'  => $list_unsubscribe, //15
		'limit_server' => $limit_server, //16
		'sends' => $sends, //17
		'first_send' => $first_send, //18
		'last_send' => $last_send, //19
		'limit_query' => $limit_query, //20
		'token' => $my_token_ens //21
	), 
	array( 
		'%d',	// value1
		'%d',	// value1
		'%d',	// value2
		'%d',	// value3
		'%s',	// value4			
		'%d',	// value5
		'%s',	// value6		
		'%s',	// value7
		'%s',	// value8		
		'%s',	// value9		
		'%s',	// value10
		'%s',	// value11
		'%s',	// value12
		'%s',	// value13
		'%s',	// value14			
		'%s',	// value15
		'%s',	// value15
		'%d',	// value16		
		'%d',	// value77
		'%d',	// value18		
		'%d',	// value19		
		'%d',	// value20
		'%s'	// value21	
	)
);
		
include( EMAILS_NO_SPAM_DIR .'create_tables/send-webservice/my_servers.php');		

?>