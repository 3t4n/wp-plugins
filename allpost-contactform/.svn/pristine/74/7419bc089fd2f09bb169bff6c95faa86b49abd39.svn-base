<?php
/*****************************************************
         "All Post Contact Form"'s Sub File
               - Sending An Email -
               Don't Edit This File
            Created by RainbowLink Inc.
*****************************************************/
/* Preparing an Attachment File */ 
if(!empty($apcf_attFileSend)){
 $attachments = array( 'path' => $apcf_attFileSend,
                       'filename' => $rl_apcf_attachment_file,
                       'encoding' => 'base64',
                       'type' => $rl_apcf_attachment_file_type,
                       'disposition' => 'attachment'
                     ); 
} 

/* Preparing Subject */
$ip = getenv('REMOTE_ADDR'); 
$ip = sanitize_text_field($ip); 

if(!empty($custom_apcf_subject)){
 $subject = $custom_apcf_subject; 
}elseif(!empty($custom_apcf_subject_sub)){
 $subject = $rl_apcf_subject." ".$ip." ".$custom_apcf_subject_sub;
}else{
 $subject = $rl_apcf_subject." ".$ip;
} 

/* Preparing Sender */
$header = array('From: '.$rl_apcf_sender.' <'.$recipient.'>');  

/* Sending an Email */
wp_mail($recipient, $subject, $mail_bodies, $header, $attachments); 

/* Cleaning Attachment */
if(!empty($attachments)){
 $unlink_ok = file_exists($apcf_attFileSaved); 
 if(!empty($unlink_ok)){
    if($rl_apcf_saveattinserver === "0"){
       unlink($apcf_attFileSaved);
    }
 } 
 if(file_exists($apcf_attFileSend)){
    unlink($apcf_attFileSend);
 }
}

/* Displaying an Attachment File */
if(!empty($rl_apcf_attachment_file)){
echo $apcf_design_div_top; ?>
<div class="apcf-content-key"><i class="fa fa-envelope" aria-hidden="true"></i></div>
<div class="apcf-content-value"><?php echo $rl_apcf_attachment_file; ?></div>
<?php echo $apcf_design_div_bottom;
}
