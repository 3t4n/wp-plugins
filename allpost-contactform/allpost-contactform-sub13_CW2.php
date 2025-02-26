<?php
/*****************************************************
         "All Post Contact Form"'s Sub File
          - Confirmation Window 【MAIN】 -
               including: sub10-12  
               Don't Edit This File
             Created by RainbowLink Inc.
*****************************************************/
if(!empty($_FILES["attachment_file"])){ 
 include plugin_dir_path( __FILE__ )."allpost-contactform-sub12_uploadAttachment.php";
}

$count = 0;
foreach ($_POST as $key => $value){
 if(!empty($value)){
   include plugin_dir_path( __FILE__ )."allpost-contactform-str_replace.php";
   $value = str_replace("http://","", $value);
   $value = str_replace("https://","", $value);
   if(!empty($_POST["custom_apcf_subject_show"])){
      $org_custom_apcf_subject = sanitize_text_field($_POST["custom_apcf_subject"]);
      $custom_apcf_subject_show = sanitize_text_field($_POST["custom_apcf_subject_show"]);
      $key = str_replace("custom_apcf_subject", $custom_apcf_subject_show, $key);
      $nondispkey = $custom_apcf_subject_show.'_show';
   }
   
   $count = $count-1;
   if($count % 2  === 0){
       $apcf_cw_divclass = "even";
   }else{ 
       $apcf_cw_divclass = "odd";
   }  
   if(stristr($value,"https://") !== FALSE){
      $confi_value = sanitize_url($value);
   }elseif(stristr($value,"http://") !== FALSE){
      $confi_value = sanitize_url($value);
   }else{
      $confi_value = sanitize_text_field($value);
   }
   $confirmation_body_show = '<div id="apcf_'.$apcf_cw_divclass.'" class="apcf-container"><div class="apcf-container_inner"><div class="apcf-container_content"><div class="apcf-content-key">'.sanitize_text_field($key).'</div><div class="apcf-content-value">'.$confi_value.'</div>'.$apcf_design_div_bottom; 
   
   if(stristr($confirmation_body_show,$nondispkey) !== FALSE && $nondispkey !== "rl_apcf_default_non"){
   }elseif(stristr($confirmation_body_show,"custom_apcf_subject") !== FALSE){
   }elseif(stristr($confirmation_body_show,"custom_apcf_subject_sub") !== FALSE){
   }else{
      if(!empty($key)){
         echo $confirmation_body_show;
      }
   } 
 ?>
   <div class="apcf-hiddens"><input name="<?php echo sanitize_text_field($key); ?>" style="display:none;" value="<?php echo sanitize_text_field($value); ?>"></div><!-- /apcf-hiddens --> 
 <?php
 }
}
$count++;

if(!empty($org_custom_apcf_subject)){
 echo '<input name="custom_apcf_subject" style="display:none;" value="'.$org_custom_apcf_subject.'"><input name="custom_apcf_subject_del" style="display:none;" value="'.$nondispkey.'">';
} 

