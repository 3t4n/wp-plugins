<?php

//=====[Recipe setting menu]=====//
if(!function_exists('amJL_recipe_meta')){
  function amJL_recipe_meta(){
    add_meta_box('recipe_structure', 'Recipe設定項目', 'recipe_form', 'post', 'advanced' );
  }
}
if((int)get_option('recipe_check') === 1) add_action('admin_menu', 'amJL_recipe_meta');


//=====[Recipe from]=====//
if(!function_exists('recipe_form')){
  function recipe_form(){
    global $post;
    $necessary = '※必須';
    $need = '推奨';

    ?>
    <h1>構造化データ「Recipe」の設定</h1><br>
    <p>入力を保存するには、記事を保存してください。</p><br>
    
    <h3 class="recipe_form">レシピ名の入力</h3>
    <p>レシピ名を入力してください<b>（※必須）</b></p>
    <?php amJL_single_post_form('Yes', 'レシピ名', 'title', 80, $necessary) ?>

    <h3 class="recipe_form">準備・調理時間</h3>
    <p>準備時間と調理時間を半角数字・整数で入力します。（※小数点以下は切り捨てられます）<br>
    この時、「分」と入力する必要はありません。<br>
    【記入例】調理時間が20分の場合<br>
    調理時間：20（※単位は「分」で、単位の記入は不要）</p>
    <?php amJL_double_post_form('Yes', "準備時間を入力（分）", "preptime", 30, $necessary, "調理時間を入力（分）", "cooktime", 30, $necessary); ?>


    <h3 class="recipe_form">レシピのカテゴリー・カロリー</h3>
    <p>レシピのカテゴリーとカロリーを入力してください<b>（※必須）</b><br>
    【記入例】和食のカテゴリーの料理で、カロリーが350kcalの場合<br>
    カテゴリー：和食、カロリー：350（※kcalは入力不要）</p>
    <?php amJL_double_post_form('Yes', "カテゴリー", "recipe_category", 50, $necessary, "カロリー（半角数字・整数）", "calory", 30, $necessary); ?>

    <h3 class="recipe_form">レシピのキーワード</h3>
    <p>レシピのキーワードを入力します。</p>
    <?php amJL_single_post_form('Yes', 'キーワード', 'keyword', 80, $necessary); ?>

    <h3 class="recipe_form">レシピに関連付けられている地域</h3>
    <p>レシピと関係のある地域を入力します。<br>
    例 : 「フランス」、「地中海」、「日本」など</p>
    <?php amJL_single_post_form('Yes', 'レシピに関連する地域', 'area', 80, $necessary); ?>

    <h3 class="recipe_form">レシピの説明</h3>
    <p>レシピの簡単な説明を入力します。</p>
    <?php amJL_single_post_form('Yes', 'レシピの説明', 'description', 100, $necessary); ?>

    <h3 class="recipe_form">レシピの画像設定</h3>
    <p>レシピの画像URLを入力します</p>
    <?php amJL_single_post_form('Yes', 'レシピの画像URL', 'image', 100, $necessary); ?>

    <h3 class="recipe_form">レシピの動画の設定</h3>
    <?php if(get_option('API')){ ?>
      <p>レシピのYouTube動画がある場合、その動画IDを指定してください。（任意）</p>
      <?php amJL_single_post_form('Yes', 'レシピの動画ID', 'recipe_video', 50, $need);
    }else{ ?>
      <p>この項目を利用したい場合には、プラグインの設定画面にてAPIキーを設定してください。</p>
      <?php
    } ?>

    <h3 class="recipe_form">レシピの材料・分量</h3>
    <p>レシピを作るのに必要となる材料の数（種類）を選択後、材料と分量をセットで記入します。<b>（※必須）</b><br>
    ※設定を保存するには、一度記事を保存してください。</p>

    <h4>レシピに必要な材料の数（種類）</h4>
    <p>レシピを作るのに必要な材料の数（種類）を選択します。<br>
    未選択の状態では、15個に設定されています。</p>
    <?php amJL_select_number("ingredient_number", 40); ?>

    <h4>材料・分量を記入</h4>
    <p>レシピを作るのに必要な材料と分量をセットで入力します。<br>
    例 : しょうゆ 大さじ1</p>
    <?php
    $ingredientNo = (int)get_post_meta($post->ID, "ingredient_number", true);
    amJL_select_post_form(15, $ingredientNo, '材料＆分量 ', "ingredient", 50, "※材料・分量を入力"); ?>
    
    <h3 class="recipe_form">レシピの手順</h3>
    <p>レシピを作る手順を記入します。<p>

    <h4>レシピを作るのに必要な手順の数</h4>
    <p>必要な手順の数を選択してください。<br>
    未選択の状態では10個に設定されています。</p>
    <?php amJL_select_number("howto_number", 30); ?>

    <h4>必要な手順を記入</h4>
    <p>必要な手順を入力してください。ただし、「手順1」のように入力する必要はありません。<br>
    例 : ×「手順1 : 卵を混ぜる」 --> ○「卵を混ぜる」</p>
    <?php
    $howtoNo = (int)get_post_meta($post->ID, "howto_number", true);
    amJL_select_post_form(10, $howtoNo, '手順 ', "howto", 50, "※手順を入力");
  }
}
  
//---- post save ----
if (!function_exists('amJL_recipe_setting_save')){
  function amJL_recipe_setting_save($post_id){
    amJL_post_data_save($post_id, 'title', 'text');
    amJL_post_data_save($post_id, 'preptime', 'int');
    amJL_post_data_save($post_id, 'cooktime', 'int');
    amJL_post_data_save($post_id, 'recipe_category', 'text');
    amJL_post_data_save($post_id, 'calory', 'int');
    amJL_post_data_save($post_id, 'keyword', 'text');
    amJL_post_data_save($post_id, 'description', 'text');
    amJL_post_data_save($post_id, 'image', 'url');
    amJL_post_data_save($post_id, 'area', 'text');
    amJL_post_data_save($post_id, 'recipe_video', 'text');
    amJL_post_data_save($post_id, 'ingredient_number', 'int');
    amJL_post_data_save($post_id, 'howto_number', 'int');

    for((int)$i=1; $i<=40; $i++){
      amJL_post_data_save($post_id, "ingredient{$i}", 'text');
      if($i <= 30){
        amJL_post_data_save($post_id, "howto{$i}", 'text');
      }
    }

  }
}
add_action('save_post', 'amJL_recipe_setting_save');