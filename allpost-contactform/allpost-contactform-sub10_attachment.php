<?php
/*****************************************************
         "All Post Contact Form"'s Sub File
               - Attachment File -
               Don't Edit This File
            Created by RainbowLink Inc.
*****************************************************/
/* Set Attchment-Dir  */
if(!is_dir($apcf_attDir)){
 echo $rl_apcf_public_upload_error_msg; 
 exit; 
}else{ 
 $apcf_attDir = realpath($apcf_attDir).'/'; 
 wp_normalize_path($apcf_attDir); 
} 

/* Set Temp-Dir  */
if(!$apcf_attTempDir || !is_dir($apcf_attTempDir) || is_link($apcf_attTempDir) ){
 echo $rl_apcf_public_upload_error_msg;
 exit; 
}else{
 $apcf_attTempDir = realpath($apcf_attTempDir).'/'; 
}  

/* Set Saving  */
$rl_apcf_attachment_file = sanitize_text_field($_POST["rl_apcf_attachment_file"]);
$rl_apcf_attachment_file_type = sanitize_text_field($_POST["rl_apcf_attachment_file_type"]); 
$apcf_attFileSaved = $apcf_attDir.$rl_apcf_attachment_file; 

if(!empty($_POST["rl_apcf_attachment_saved_as"])){
 $rl_apcf_attachment_saved_as = sanitize_text_field($_POST["rl_apcf_attachment_saved_as"]); 
 $apcf_attFileSaved = $apcf_attDir.$rl_apcf_attachment_saved_as;
} 

/* Prepare an Attachment-File  */
if(file_exists($apcf_attFileSaved)){ 
 $apcf_attFileSend = $apcf_attTempDir.$rl_apcf_attachment_file; 
 if(file_exists($apcf_attFileSend)){
   unlink($apcf_attFileSend); 
 } 
 if(!empty($apcf_attFileSaved) && !empty($apcf_attFileSend)){
   copy($apcf_attFileSaved, $apcf_attFileSend);
 }
}


