<?php
/**
 * @package Akismet Notifier
 * @version 1.0.3
 */
/*
Plugin Name: Akismet Notifier
Plugin URI: https://wordpress.org/plugins/akismet-notifier/
Description: Simple akismet notifier. When Akismet finds SPAM a frontend notification will be shown.
Author: codection
Version: 1.0.3
Author URI: https://codection.com
*/

/**
 * Filter SPAM commets
 *
 * @since 0.8
 */

function codection_pendiente_moderacion($comment_ID, $comment_approved) {
	if( $comment_approved == 'spam' )
		setcookie('es_spam', 'true', time() + 30);	
}
add_action( 'comment_post', 'codection_pendiente_moderacion', 10, 2 );

/**
 * Show message when a SPAM comment is detected
 *
 * @since 0.8
 */
function codection_comprobar_mostrar_spam() {
	if(isset($_COOKIE['es_spam'])) {
		if($_COOKIE['es_spam']=='true')
			echo "<script>alert('" . __( 'Dear reader, your comment has been classified as SPAM by our system, pending to be approved by a moderator.', 'akismetnotifier' ) ."');</script>";
		unset($_COOKIE['es_spam']);
		setcookie('es_spam', '', time() - 3600);
	}
}
add_action('wp_footer', 'codection_comprobar_mostrar_spam');

/**
* Add plugin text domain
*
* @since 0.8
*/
function load_akismet_notifier_textdomain(){
	load_plugin_textdomain( 'akismetnotifier', false, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );
}
add_action( 'plugins_loaded', 'load_akismet_notifier_textdomain' );

?>
