<?php
global $wpdb;
$table_name = $wpdb->prefix . "get_your_quote_options";
$my_products_db_version = '1.0.0';
$charset_collate = $wpdb->get_charset_collate();

if ( $wpdb->get_var( "SHOW TABLES LIKE '{$table_name}'" ) != $table_name ) {

    $sql = "CREATE TABLE $table_name (
            ID mediumint(9) NOT NULL AUTO_INCREMENT,
            `apikey` varchar(500) NOT NULL, 
			`services` text NOT NULL,
			`msg_header` varchar(50) NOT NULL,
			`message` varchar(100) NOT NULL,
			`heading` varchar(100) NOT NULL,
			`headertext` varchar(200) NOT NULL,
			`backgroundcolor` text NOT NULL,
			`formbackgroundcolor` text NOT NULL,
			`backgroundimage` text NOT NULL,
			`buttoncolorprev` text NOT NULL,
			`buttoncolornext` text NOT NULL,
			`type` text NOT NULL,
            PRIMARY KEY  (ID)
    )    $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
    add_option( 'my_db_version', $my_products_db_version );
}
add_action( 'admin_menu', 'gyq_admin_menu', 9, 0 );
	function gyq_admin_menu() {
	add_menu_page(
        __( 'ServicesTitle', 'textdomain' ),
        'GetYourQuote',
        'manage_options',
        'get-your-quote/services_admin.php',
        '',
         'dashicons-admin-post',
        6
    );
	}	

?>