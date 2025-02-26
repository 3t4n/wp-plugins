<?php
/*****************************************************
         "All Post Contact Form"'s Sub File
            - Submission Window 【START】 -
                 including: sub7  
               Don't Edit This File
            Created by RainbowLink Inc.
*****************************************************/
if(!isset( $_POST['confirmation_verification'] ) || !wp_verify_nonce( $_POST['confirmation_verification'],'confirmation_check' )){ 
   print $confirmation_verification_error; 
   exit; 
}

$apcf_contact_id = $_POST['apcf_contact_id'];

if(empty($apcf_contact_id)){ 
   print $confirmation_verification_error; 
   exit; 
}

if($rl_apcf_cookie === "1"){ //If Cookie Enabled
  include plugin_dir_path( __FILE__ )."allpost-contactform-sub7_cookie3.php";	
}else{ 
  $apcf_onetime_id = md5(uniqid(rand(), true)); 
  $apcf_contact_id = md5(uniqid(rand(), true)); 
}
?>
<div id="window_submission">
<h2 class="submission"><?php echo $rl_apcf_SubmissionTitle; ?></h2>
<div class="submission_message"><?php echo $rl_apcf_SubmissionMessage; ?></div>
