<?php

if (!defined('ABSPATH')) exit;

if(!function_exists('amJL_add_video_meta')){
  function amJL_add_video_meta(){
    add_meta_box( 'video_structure', 'YouTubeの動画IDの設定', 'amJL_video_meta_setting', 'post', 'side', 'low' );
  }
}
if((int)get_option('video_value') === 1 && get_option("API")) add_action('admin_menu', 'amJL_add_video_meta');

//---- Video form ----
if(!function_exists('amJL_video_meta_setting')){
  function amJL_video_meta_setting(){
    ?>
    <p>記事内に埋め込んだYouTubeの動画IDを入力します。<br>
    この項目を使用するためには、プラグイン設定画面より、APIキーを設定してください。<br>
    <b>※APIキーを入力しない場合、重大なエラーが発生する場合があります。</b></p>
    <?php
    amJL_video_form();
  }
}
  
if (!function_exists('amJL_save_video_meta')){
  function amJL_save_video_meta($post_id){
    for((int)$i=1; $i<5; $i++){
      $video_id = "video_id{$i}";
      amJL_post_data_save($post_id, $video_id, 'text');
    }
  }
}
add_action('save_post', 'amJL_save_video_meta');