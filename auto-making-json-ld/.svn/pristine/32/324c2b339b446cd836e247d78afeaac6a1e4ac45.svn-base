<?php

if (!defined('ABSPATH')) exit;

if (!function_exists('amJL_FAQ_meta')){
  function amJL_FAQ_meta(){
    add_meta_box('faq_structure', 'よくある質問', 'amJL_faq_form', 'post', 'advanced' );
  }
}
if((int)get_option('faq_check') === 1) add_action('admin_menu', 'amJL_FAQ_meta');

if (!function_exists('amJL_faq_form')){
  function amJL_faq_form(){
    $need = "※必須";

    ?>
    <h1>「よくある質問」の設定</h1><br>
    <p>入力内容を更新するためには、記事を保存後・一度更新してください。<br>
    よくある質問とその答えには、<b>本文中に含まれる内容</b>を記述してください。</p><br>

    <h3 class="recipe_form">よくある質問とその答えの数</h3>
    <p>よくある質問の数を選択します。<br>
    この項目が未選択の場合、構造化データ「よくある質問」は設定されません。</p> 
    <?php
    amJL_faq_meta_form();   
  }
}

if (!function_exists('amJL_faq_setting_save')){
  function amJL_faq_setting_save($post_id){
    amJL_post_data_save($post_id, 'faq_number', 'int');
    for((int)$i=1; $i<=20; $i++){
      amJL_post_data_save($post_id, "question_{$i}", 'text');
      amJL_post_data_save($post_id, "answer_{$i}", 'text');
    }
  }
}
add_action('save_post', 'amJL_faq_setting_save');