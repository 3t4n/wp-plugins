<?php

add_action( 'phpmailer_init', 'ftm_wp_layout_mail');
function ftm_wp_layout_mail( $phpmailer) {
	if(get_option('ftm_wp_all') == 'true'){
		$arg = [
			'Subject' => $phpmailer->Subject,
			'Body' => $phpmailer->Body,
			'From' => $phpmailer->From,
			'FromName' => $phpmailer->FromName,
		];
		$ftm_mail = new ftmSubmit($arg);
		$ftm_mail->ftm_pre_send();
		$ftm_mail_array = (array)$ftm_mail;
		foreach($ftm_mail_array as $ftm_mail_key => $ftm_mail_value){
			if(property_exists($phpmailer,$ftm_mail_key)){
				$phpmailer->$ftm_mail_key = $ftm_mail_value;
			}
		}
	}
}
