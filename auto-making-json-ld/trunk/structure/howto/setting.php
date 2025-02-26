<?php

//=====[ howto meta ]=====//
if (!function_exists('amJL_howto_meta')){
  function amJL_howto_meta(){
    add_meta_box('howto_structure', 'ハウツー', 'howto_form', 'post', 'advanced' );
  }
}
if((int)get_option('howto_check') === 1)  add_action('admin_menu', 'amJL_howto_meta');

//=====[ howto setting ]=====//
if (!function_exists('howto_form')){
  function howto_form(){
      global $post;
      $need = "※必須";

      ?>
      <h1>ハウツーの設定</h1>
      <p>ハウツーを利用する場合には、<b>記事の本文に同じ内容（テキスト、画像など）が含まれていること</b>を確認してください。<br>
      記事の本文に含まれない場合には、正しく構造化データを設定できない可能性があります。<br>
      また、料理の手順の場合にはハウツーではなくRecipeをご利用ください。</p>

      <h3 class="recipe_form">ハウツーのタイトル</h3>
      <p>ハウツーのタイトルを入力してください。（※必須）<br>
      例：「ネクタイの結び方」</p>
      <?php amJL_single_post_form('Yes', "タイトル", "howto_name", 80, $need); ?>

      <h3 class="recipe_form">ハウツー完了時の画像</h3>
      <p>ハウツー完了時の画像を設定します。<br>
      使用できる画像のフォーマットは<b>jpg、png、gif</b>のいずれかです。</p>
      <?php amJL_single_post_form('Yes', "ハウツー完了後の画像", "howto_image", 80, "推奨"); ?>

      <h3 class="recipe_form">ハウツーの動画</h3>
      <p>ハウツーの動画（YouTubeの動画ID）を設定します。<br>
      この項目をご利用いただくためには、プラグイン管理画面から、YouTubeのAPIキーを入力していただく必要があります。</p>
      <?php amJL_single_post_form('Yes', "YouTubeの動画ID", "total_video", 80, ""); ?>

      <h3 class="recipe_form">必要経費</h3>
      <p>ハウツー完了に必要な経費（半角数字）を入力してください。<br>
      また、通貨を選択後、必要経費を半角数字で記入してください。</p>
      <?php amJL_itemPrice_post_form('通貨を選択　　　', 'howto_cost_passage', '必要経費', 'howto_cost', 30, '半角数字'); ?>

      <h3 class="recipe_form">手順や指示の実施で使うもの</h3>
      <p>手順や指示の実施において必要なものがあれば入力してください。<br>
      例）ネクタイを結ぶ場合：ネクタイ、Yシャツ　（※鏡は次の項目で入力してください）</p>
      <?php amJL_select_number("supply_number", 20); ?>
      <table class="form-table">
          <?php
          $supply_number = (int)get_post_meta($post->ID, "supply_number", true);
          for((int)$i=1; $i<=$supply_number; $i++){
              amJL_single_post_form('No', "手順・指示の実施に使うもの{$i}", "supply_{$i}", 80, "");
          }
          ?>
      </table>

      <h3 class="recipe_form">手順や指示の実施に使う道具</h3>
      <p>必要な道具があれば入力してください。<br>
      ただし、消費するものについては入力しないでください。</p>
      <?php amJL_select_number("tool_number", 20); ?>
      <table class="form-table">
          <?php
          $tool_number = (int)get_post_meta($post->ID, "tool_number", true);
          for((int)$i=1; $i<=$tool_number; $i++){
              amJL_single_post_form('No', "手順・指示の実施に使う道具{$i}", "tool_{$i}", 80, "");
          }
          ?>
      </table>

      <h3 class="recipe_form">合計時間</h3>
      <p>合計でどれくらいの時間がかかるかを入力します。（単位：分）</p>
      <?php amJL_single_post_form('Yes', "合計時間", "howto_time", 70, "半角数字・単位「分」"); ?>

      <h3 class="recipe_form">必要な手順を記入してください</h3>
      <p>必要な手順の数を選択します。</p>
      <?php amJL_select_number("step_number", 20); ?>
      <p>必要な手順の名前（簡潔でわかりやすいもの）と、詳細な説明、画像URL、説明をしているページのアンカーリンクを入力します。<br>
      手順の詳細な説明以外は任意項目となっていますが、できる限り入力することをおすすめします。<p>
      <p>また、手順の説明では手順の番号を書く必要はありません。<br>
      例：<font color="red">×</font>　手順1：ネクタイを結ぶ</p>
      <?php
      $step_number = (int)get_post_meta($post->ID, "step_number" , true);
      for((int)$i=1; $i<=$step_number; $i++){?>
        <table class="form-table">
          <?php
          amJL_single_post_form('No', "手順{$i}の簡単な説明", "step_name_{$i}", 70, "推奨");
          amJL_single_post_form('No', "手順{$i}の詳細な説明", "step_text_{$i}", 100, "※必須");
          amJL_single_post_form('No', "手順{$i}の画像URL", "step_image_{$i}", 100, "推奨");
          amJL_single_post_form('No', "手順{$i}のURL（アンカーリンクなど）", "step_url_{$i}", 70, "推奨");
          ?>
        </table>
        <?php
      }
  }


  function amJL_howto_setting_save($post_id){

    amJL_post_data_save($post_id, 'howto_check', 'int');
    amJL_post_data_save($post_id, 'howto_name', 'text');
    amJL_post_data_save($post_id, 'howto_image', 'url');
    amJL_post_data_save($post_id, 'total_video', 'text');
    amJL_post_data_save($post_id, 'howto_cost_passage', 'text');
    amJL_post_data_save($post_id, 'howto_const', 'text');
    amJL_post_data_save($post_id, 'supply_number', 'int');
    amJL_post_data_save($post_id, 'tool_number', 'int');
    amJL_post_data_save($post_id, 'howto_time', 'int');
    amJL_post_data_save($post_id, 'step_number', 'int');

    for((int)$i=1; $i<=20; $i++){
      amJL_post_data_save($post_id, "supply_{$i}", 'text');
      amJL_post_data_save($post_id, "tool_{$i}", 'text');
      amJL_post_data_save($post_id, "step_text_{$i}", 'text');
      amJL_post_data_save($post_id, "step_name_{$i}", 'text');
      amJL_post_data_save($post_id, "step_image_{$i}", 'url');
      amJL_post_data_save($post_id, "step_url_{$i}", 'turl');
    }

  }
}
add_action('save_post', 'amJL_howto_setting_save');