<?php
if ( !defined('ABSPATH') ){
    die();
}  
if(wp_kses_post(wp_unslash(isset($_POST["Lucky_Draw_Nonce_Field"])))&&wp_verify_nonce(wp_kses_post(wp_unslash($_POST["Lucky_Draw_Nonce_Field"])),'Lucky_Draw_Nonce')){ 
}else{ die; }


global $wpdb;
global $current_user;
      wp_get_current_user();


      $draw_name="[Contest Name]";
      $draw_date="[Draw Date]";
      $websitename=wp_kses_post(get_bloginfo( 'name' ));
      $partname=$current_user->display_name;

if(isset($_POST["a"])){
$contest_id=wp_kses_post(wp_unslash($_POST["a"])).'<br>';
}
if(isset($_POST["sendmail"])){
$sendmail=wp_kses_post(wp_unslash($_POST["sendmail"]));
}
if(isset($_POST["current_url"])){
    $current_url=wp_kses_post(wp_unslash($_POST["current_url"]));
    }
if(isset($_POST["drawname"])){
$drawname=wp_kses_post(wp_unslash($_POST["drawname"]));
}
if(isset($_POST["SKUText1"])){
    $prizetext=wp_kses_post(wp_unslash($_POST["SKUText1"]));
    }
if(isset($_POST["drawdate"])){
$drawdate=wp_kses_post(wp_unslash($_POST["drawdate"]));
}





 $contestant_count = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM %i WHERE contest_id =%s AND contestants=%s ORDER BY id ASC ",Lucky_Draw_Database2,$contest_id,$current_user->user_email)); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.SchemaChange
if($contestant_count==0){


      //Send Participation Mail
if($sendmail=="sendmail"){

      $to      = $current_user->user_email;
      $subject = $drawname." Participation ".$websitename;
      $headers = "Content-type:text/html;charset=UTF-8" . "\r\n";
     
      lucky_draw_participation_mail($to,$partname,$subject,$drawname,$prizetext,$drawdate);
      // More headers
      


}
$result = $wpdb->insert($wpdb->prefix.'lucky_draw_contestants',array('contest_id'=>$contest_id,'contestants' => $current_user->user_email,'contestant_name' => $current_user->display_name)); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.SchemaChange
wp_redirect($current_url);
exit;
} 
