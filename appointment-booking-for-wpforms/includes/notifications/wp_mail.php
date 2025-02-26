<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
class Booknow_Notifications_Wpmail{ 
	public static function send($email_to,$datas= array()){
		$email_subject  ="";
		$email_subject  = $datas["subject"];
		$headers  = array('Content-Type: text/html; charset=UTF-8');
		if(isset($datas["reply"]) && is_email($datas["reply"])){
			$headers[] = 'Reply-To: '.$datas["name"].' <'.$datas["reply"].'>';
		}
		if(isset($datas["formmail"]) && is_email($datas["formmail"])){
			$headers[] = 'From: '.$datas["name"].' <'.$datas["formmail"].'>';
		}
		if(isset($datas["bcc"]) && is_email($datas["bcc"])){
			$headers[] = 'Bcc: '.$datas["bcc"]; 
		}
		
		$body  = nl2br($datas["message"]);
		$attachments = $datas["attachments"];
		$is_success  = wp_mail( $email_to, $email_subject, $body, $headers, $attachments);
		return $is_success;
	}
}
