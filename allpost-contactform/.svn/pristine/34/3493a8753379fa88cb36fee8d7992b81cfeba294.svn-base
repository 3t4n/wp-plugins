<?php
/*****************************************************
       "All Post Contact Form"'s Core File
		          - Define【2】 -
	            Don't Edit This File
          Created by RainbowLink Inc.
*****************************************************/
$rl_apcf_SUBMIT = urldecode(get_permalink());
$rl_apcf_users_toppage_url = esc_url( home_url( '/' ) );

$rl_apcf_ConfirmationTitle = $rl_apcf_forming->rlapcf_ctitle;
if(empty($rl_apcf_ConfirmationTitle)){
 $rl_apcf_ConfirmationTitle = $rl_apcf_public_c1_eg;
}

$rl_apcf_ConfirmationMessage = $rl_apcf_forming->rlapcf_cmessage;
if(empty($rl_apcf_ConfirmationMessage)){
 $rl_apcf_ConfirmationMessage = $rl_apcf_public_c2_eg;
}

$rl_apcf_cbtn = $rl_apcf_forming->rlapcf_cbtn;
if(empty($rl_apcf_cbtn)){
 $rl_apcf_cbtn = $rl_apcf_public_c3_eg;
}

$rl_apcf_SubmissionTitle = $rl_apcf_forming->rlapcf_stitle;
if(empty($rl_apcf_SubmissionTitle)){
 $rl_apcf_SubmissionTitle = $rl_apcf_public_s1_eg;
}

$rl_apcf_SubmissionMessage = $rl_apcf_forming->rlapcf_smessage;
if(empty($rl_apcf_SubmissionMessage)){
 $rl_apcf_SubmissionMessage = $rl_apcf_public_s2_eg;
}

$rl_apcf_subject = $rl_apcf_forming->rlapcf_mailsubject;
if(empty($rl_apcf_subject)){
 $rl_apcf_subject = $rl_apcf_admin_m3_eg;
}

$rl_apcf_sender = $rl_apcf_forming->rlapcf_mailsender;
if(empty($rl_apcf_sender)){
 $rl_apcf_sender = $rl_apcf_admin_m2_eg;
}

$recipient = $rl_apcf_forming->rlapcf_mail;
if(empty($recipient)){
 $recipient = get_option( 'admin_email' );
}

$rl_apcf_redirect_page = $rl_apcf_forming->rlapcf_redirectpage;
if(empty($rl_apcf_redirect_page)){
 $rl_apcf_redirect_page = $rl_apcf_users_toppage_url;
}

$rl_apcf_redirect_time = $rl_apcf_forming->rlapcf_redirecttime;
if(!is_numeric($rl_apcf_redirect_time) || empty($rl_apcf_redirect_time)){
 $rl_apcf_redirect_time = "3600";
}

$rl_apcf_gototop = $rl_apcf_forming->rlapcf_gototop;
if(empty($rl_apcf_gototop)){
 $rl_apcf_gototop = "";
}

$rl_apcf_errormsg = $rl_apcf_forming->rlapcf_errormsg;
if(empty($rl_apcf_errormsg)){
 $rl_apcf_errormsg = $rl_apcf_public_e1_eg;
}

$rl_apcf_errorbtn = $rl_apcf_forming->rlapcf_errorbtn;
if(empty($rl_apcf_errorbtn)){
 $rl_apcf_errorbtn = $rl_apcf_public_e2_eg;
}

$rl_apcf_strreplace = $rl_apcf_forming->rlapcf_strreplace;
if(!is_numeric($rl_apcf_strreplace) || empty($rl_apcf_strreplace)){
 $rl_apcf_strreplace = "0";
}

if(!empty($rl_apcf_strreplace)){
 if($rl_apcf_strreplace >= 2 ){
	 $rl_apcf_strreplace = "0";
 }
}

$rl_apcf_cookie = $rl_apcf_forming->rlapcf_cookie;
if(!is_numeric($rl_apcf_cookie) || empty($rl_apcf_cookie)){
 $rl_apcf_cookie = "0";
}

if(!empty($rl_apcf_cookie)){
 if($rl_apcf_cookie >= 2 ){
	 $rl_apcf_cookie = "0";
 }
}

$rl_apcf_saveattinserver = $rl_apcf_forming->rlapcf_saveattinserver;
if(empty($rl_apcf_saveattinserver)){
 $rl_apcf_saveattinserver = "0";
}

if(!empty($rl_apcf_saveattinserver)){
 if($rl_apcf_saveattinserver >= 2 ){
	 $rl_apcf_saveattinserver = "0";
 }
}



