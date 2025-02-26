<?php
// Check if the ABSPATH constant is defined
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
//  copied from https://github.com/miconda/wp-fail2ban-addon-cf7log
// see https://contactform7.com/2020/07/18/custom-spam-filtering/
// miconda his function :  PHP Warning:  Use of undefined constant wpcf7log_filter_spam - assumed 'wpcf7log_filter_spam' (this will throw an Error in a future version of PHP) 
// instead of declaring  I revoked it as the add filter works too
// changes proposed by https://chat.openai.com/chat
// old
//add_filter( 'wpcf7_spam', function( $spam ) {
//        openlog('wpcf7log', LOG_PID, LOG_DAEMON);
//			if ( isset( $_SERVER['REMOTE_ADDR'] ) ) {
//			$aatiwpfinetuning_REMOTE_ADDR = sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) );
//		    }   
//       syslog(LOG_NOTICE, "contact form 7 submission from {$aatiwpfinetuning_REMOTE_ADDR}");
//        closelog();
//  return $spam;
// }, 100, 1 );//log all entries instead of only with suspect spam
add_filter( 'wpcf7_before_send_mail', function( $form_to_DB ) {
  openlog('wpcf7log', LOG_PID, LOG_DAEMON);
  syslog(LOG_NOTICE, "contact form 7 submission from ".AATIWPF_REMOTE_ADDR." on ".AATIWPF_HTTP_HOST);
  closelog();
  return $form_to_DB;
}, 100, 1 );