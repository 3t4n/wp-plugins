<?php
/*
Plugin Name: WP-Admin Distribution List
Plugin URI: http://wpadmin.ca
Description: Distribution List to send emails to members in your <a href='https://wordpress.org/plugins/connections/'>Connections</a> plugin
Author: WP Admin
Version: 0.3
Author URI: http://wpadmin.ca
*/
	if ( ! defined( 'wpadlbasedir' ) )
	define( 'wpadlbasedir', plugin_dir_path( __FILE__ ) );
	if ( ! defined( 'wpadlPLUGIN_BASENAME' ) )
	define( 'wpadlPLUGIN_BASENAME', plugin_basename( __FILE__ ) );
	if ( ! defined( 'wpadlPLUGIN_DIRNAME' ) )
	define( 'wpadlPLUGIN_DIRNAME', dirname( wpadlPLUGIN_BASENAME ) );
	if ( ! defined( 'wpadlPLUGIN_URL' ) )
	define( 'wpadlPLUGIN_URL', plugin_dir_url( __FILE__ ) );
	add_action("admin_menu", "WPAMenus");
	function WPAMenus() {
		add_menu_page("WP Admin DL", "WP Admin DL", 0, "Distribution-List", "wpadltoplevel_page");
	}
	function wpadltoplevel_page() {
		echo "<p><h2>" . __( 'WP Admin Distribution List', 'wpadl_menu' ) . "</h2><p>";
		require_once(wpadlbasedir . "admin/Distributionlist.php");
	}
	function sendMail_ajax_request() {
		if ( isset($_REQUEST) ) {
			@$S = $_REQUEST['S'];
			@$M = $_REQUEST['M'];
			@$L = $_REQUEST['L'];
			$s = html_entity_decode(urldecode($S));
			$m = html_entity_decode(urldecode($M));
			$l = $L;
			$i = 0;
			$replyto = $from = $to =  $_SERVER['SERVER_NAME'] . ' List Serve <DonotReply@' . $_SERVER['SERVER_NAME'] . ">";
			$headers = 'From: ' . $from . "\r\n" .
			'Reply-To: ' . $replyto . "\r\n" ;
			while($i < count($l))
			{
				$originalto = $l[$i];
				$header = $headers . 'Bcc: ' . $originalto  .  "\r\n" . "Content-Type: text/html; charset=ISO-8859-1\r\n" . 'X-Mailer: PHP/' . phpversion();	
				if(mail($to,$s,wordwrap($m),$header))
				{
					echo "Email Send successfully to $originalto<br>";	
				}
				$i++;	
			}
			
		}
		
		wp_die();
	}
	add_action( 'wp_ajax_sendMail_ajax_request', 'sendMail_ajax_request' );
?>