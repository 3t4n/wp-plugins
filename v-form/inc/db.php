<?php
defined('ABSPATH') || die("Nice try");


register_activation_hook(VFORM_PLUGIN_FILE, function(){
	global $wpdb;

	$table_name = $wpdb->prefix . 'vform';
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table_name (
		id int(11) NOT NULL AUTO_INCREMENT,
		formname varchar(200) NOT NULL,
		formdescription varchar(1000) NOT NULL,
		formbody longtext NOT NULL,
		status varchar(50) NOT NULL,
		confirmation varchar(200) NULL NULL,
		confirmation_value mediumtext NULL NULL,
		notification_mode varchar(100) NULL NULL,
		send_to varchar(200) NULL NULL,
		email_subject varchar(500) NULL NULL,
		from_name varchar(200) NULL NULL,
		from_email varchar(200) NULL NULL,
		reply_to varchar(200) NULL NULL,
    	message longtext NULL NULL,

		security_type varchar(50) NULL NULL,
		rec_site_key varchar(300) NULL NULL,
		rec_secret_key varchar(300) NULL NULL,
		hcap_site_key varchar(300) NULL NULL,
		hcap_secret_key varchar(300) NULL NULL,
		no_duplicate varchar(50) NULL NULL,
		google_sheet mediumtext NULL NULL,

    	datesubmit timestamp NOT NULL,
		PRIMARY KEY  (id)
	) $charset_collate;";


	// notification
	$table_namenotifi = $wpdb->prefix . 'vform_notifications';
	$charset_collate_notifi = $wpdb->get_charset_collate();

	$sql_noti = "CREATE TABLE $table_namenotifi (
		id int(11) NOT NULL AUTO_INCREMENT,
		formid int(200) NOT NULL,
		action_name varchar(200) NOT NULL,
		send_to_email varchar(2000) NOT NULL,
		from_name varchar(50) NOT NULL,
		from_email varchar(200) NULL NULL,
		subject varchar(400) NULL NULL,
		message mediumtext NULL NULL,
		reply_to varchar(200) NULL NULL,
		mode varchar(200) NULL NULL,
		dropdown varchar(50) NULL NULL,
    	created_at timestamp NOT NULL,
		PRIMARY KEY  (id)
	) $charset_collate_notifi;";


  // secondtable

  $table_name2 = $wpdb->prefix . 'vform_userinput';
	$charset_collate2 = $wpdb->get_charset_collate();

	$sql2 = "CREATE TABLE $table_name2 (
		id int(11) NOT NULL AUTO_INCREMENT,
		formid varchar(100) NOT NULL,
		maindatabody mediumtext NOT NULL,
		ip varchar(300) NULL NULL,
        browser varchar(300) NULL NULL,
        currentdate varchar(300) NULL NULL,
        timezone varchar(300) NULL NULL,
        currentdate_part2 varchar(300) NULL NULL,
        usertimetakes varchar(300) NULL NULL,
		PRIMARY KEY  (id)
	) $charset_collate2;";


	// thirdtable

	$table_name3 = $wpdb->prefix . 'vfsubscr';
	$charset_collate3 = $wpdb->get_charset_collate();

	$sql3 = "CREATE TABLE $table_name3 (
		id int(11) NOT NULL AUTO_INCREMENT,
		subscription int(11) NOT NULL,
		PRIMARY KEY  (id)
	) $charset_collate3;";



	// forthtable

	$table_name4 = $wpdb->prefix . 'vform_fields';
	$charset_collate4 = $wpdb->get_charset_collate();

	$sql4 = "CREATE TABLE $table_name4 (
		id int(11) NOT NULL AUTO_INCREMENT,
		formid int(11) NOT NULL,
		ip varchar(200) NULL,
		created_at timestamp NOT NULL,
		PRIMARY KEY  (id)
	) $charset_collate4;";



	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  	dbDelta( $sql );
	dbDelta( $sql_noti );
	dbDelta( $sql2 );
	dbDelta( $sql3 );
	dbDelta( $sql4 );
});

