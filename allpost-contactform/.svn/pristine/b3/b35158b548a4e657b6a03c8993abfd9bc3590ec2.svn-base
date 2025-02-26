<?php
/*****************************************************
         "All Post Contact Form"'s Sub File
            - Submission Window 【MAIN】 -
               Don't Edit This File
            Created by RainbowLink Inc.
*****************************************************/
if(!empty($_POST["custom_apcf_subject"])){ 
 $custom_apcf_subject = sanitize_text_field($_POST["custom_apcf_subject"]); 
} 

if(!empty($_POST["custom_apcf_subject_sub"])){ 
 $custom_apcf_subject_sub = sanitize_text_field($_POST["custom_apcf_subject_sub"]); 
} 

if(!empty($_POST["custom_apcf_subject_del"])){
 $custom_apcf_subject_del = sanitize_text_field($_POST["custom_apcf_subject_del"]); 
 $custom_apcf_subject_del_omitter2 = $custom_apcf_subject_del;
}

$count = 0; 
foreach($_POST as $key => $value){ 
$mail_body_show =  sanitize_text_field($key).': '.sanitize_text_field($value); $mail_body = sanitize_text_field($key).': '.sanitize_text_field($value) .'
';  

/* Displaying the Submission Window */
if(stristr($mail_body_show,"apcf_submit:") === FALSE && stristr($mail_body_show,"s:") === FALSE && stristr($mail_body_show,"submit") === FALSE && stristr($mail_body_show,"rl_apcf_attachment_file") === FALSE && stristr($mail_body_show,"confirmation_verification") === FALSE && stristr($mail_body_show,"_wp_http_referer") === FALSE && stristr($mail_body_show,"apcf_contact_id") === FALSE && stristr($mail_body_show,"custom_apcf_subject") === FALSE && stristr($mail_body_show,"custom_apcf_subject_sub") === FALSE && stristr($mail_body_show,"custom_apcf_subject_del") === FALSE && stristr($mail_body_show,$custom_apcf_subject_del) === FALSE){//condition
 include plugin_dir_path( __FILE__ )."allpost-contactform-str_replace.php"; 
 $count = $count-1; 
 if(!empty($key)){ 
   echo $apcf_design_div_top; ?>
    <div class="apcf-content-key"><?php echo sanitize_text_field($key); ?></div>
    <div class="apcf-content-value"><?php 
     if(stristr($value,"https://") !== FALSE){ 
	  echo sanitize_url($value); 
     }elseif(stristr($value,"http://") !== FALSE){
          echo sanitize_url($value); 
     }else{ 
	  echo sanitize_text_field($value); 
     } ?></div>
  <?php echo $apcf_design_div_bottom; ?>
  <?php } //if(!empty($key)) ?>
  <?php $count++;  ?>
  <?php } //condition 
  
/* Preparing to Send an Email */
if(empty($mail_bodies)){
 $mail_bodies = ""; 
} 

if($rl_apcf_strreplace === "0"){ 
 if(stristr($mail_body,'confirmation_verification') !== FALSE){
 }elseif(stristr($mail_body,'_wp_http_referer') !== FALSE){
 }elseif(stristr($mail_body,'apcf_contact_id') !== FALSE){
 }elseif(stristr($mail_body,'apcf_submit') !== FALSE){
 }elseif(stristr($mail_body,"custom_apcf_subject") !== FALSE){
 }elseif(stristr($mail_body,"custom_apcf_subject_sub") !== FALSE){
 }elseif(stristr($mail_body,$custom_apcf_subject_del_omitter1) !== FALSE){
 }elseif(stristr($mail_body,$custom_apcf_subject_del_omitter2) !== FALSE){
 }else{ 
   $mail_bodies .= $mail_body; 
 }
}else{ 
 $mail_bodies .= $mail_body;
}

}//foreach($_POST as $key => $value){

if(!empty($_POST["rl_apcf_attachment_file"])){
 include plugin_dir_path( __FILE__ )."allpost-contactform-sub10_attachment.php";	 
}
include plugin_dir_path( __FILE__ )."allpost-contactform-sub11_sendingEmail.php";

