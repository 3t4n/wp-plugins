<?php
/*****************************************************
       "All Post Contact Form"'s Core File
           Created by RainbowLink Inc.
*****************************************************/
if(!defined('ABSPATH')){ die('Invalid request.'); }
include plugin_dir_path( __FILE__ )."allpost-contactform-sub1_security.php"; 
include plugin_dir_path( __FILE__ )."allpost-contactform-language.php"; 
include plugin_dir_path( __FILE__ )."allpost-contactform-sub2_define1.php";
//=== Add-Ons ============================================
//Add-On: AutoResponder & Carbon Copy
if(file_exists(plugin_dir_path( __FILE__ )."addon_autoresponder_and_cc.php")){
include plugin_dir_path( __FILE__ )."addon_autoresponder_and_cc.php"; 
//Add-On: AutoResponder
}elseif(file_exists(plugin_dir_path( __FILE__ )."addon_autoresponder.php")){
include plugin_dir_path( __FILE__ )."addon_autoresponder.php"; 
//Add-On: Carbon Copy
}elseif(file_exists(plugin_dir_path( __FILE__ )."addon_cc.php")){
include plugin_dir_path( __FILE__ )."addon_cc.php"; 
//Add-On: Receiving Notice
}elseif(file_exists(plugin_dir_path( __FILE__ )."addon_receiving_notice.php")){
include plugin_dir_path( __FILE__ )."addon_receiving_notice.php"; 
//Add-On: CSV
}elseif(file_exists(plugin_dir_path( __FILE__ )."addon_csv.php")){
include plugin_dir_path( __FILE__ )."addon_csv.php"; 
//=== Core ===============================================
}else{
include plugin_dir_path( __FILE__ )."allpost-contactform-sub3_define2.php";
if($rl_apcf_cookie === "1"){
 include plugin_dir_path( __FILE__ )."allpost-contactform-sub4_cookie1.php";
} 
?>
<div class="apcf_outline">
<?php 
if(isset($_POST['apcf_delete_cookie'])){
 include plugin_dir_path( __FILE__ )."allpost-contactform-sub5_cookie2.php";
}elseif(isset($_POST['apcf_submit'])){ /*:: Submission Window 1【START】::::::*/ 
 //・・・sub7 in "sub6_SW1.php"・・・//
 include plugin_dir_path( __FILE__ )."allpost-contactform-sub6_SW1.php";
}else{ /*:::::::::::::::::::::::::::::::::: Confirmation Window 1【START】::::*/ 
 include plugin_dir_path( __FILE__ )."allpost-contactform-sub8_CW1.php";
} 
?>
<form action="<?php echo $rl_apcf_SUBMIT; ?>" method="POST">
<?php
// WordPress Built-in Security: NONCE
wp_nonce_field( 'confirmation_check', 'confirmation_verification' ); 
if(isset($_POST['apcf_submit'])){ /*::::::: Submission Window 2【MAIN】::::::::*/
include plugin_dir_path( __FILE__ )."allpost-contactform-sub9_SW2.php";	
}else{ /*:::::::::::::::::::::::::::::::::: Confirmation Window 2【MAIN】::::::*/ 
 //・・・sub10-12 in "sub13_CW2.php"・・・//  
 include plugin_dir_path( __FILE__ )."allpost-contactform-sub13_CW2.php";
}
if(!isset($_POST['apcf_submit'])){ /*:::::: Confirmation Window 3【END】:::::::*/ 
 //・・・sub14 in "sub15_CW3.php"・・・// 
 include plugin_dir_path( __FILE__ )."allpost-contactform-sub15_CW3.php";
}
?>
</div><!-- #window_* -->
</div><!-- .apcf_outline -->
<?php } //======================================================
if(isset($_POST['apcf_submit'])){ /*:::::: Submission Window 3【END】:::::::::*/ 
include plugin_dir_path( __FILE__ )."allpost-contactform-sub16_SW3.php";
} 

