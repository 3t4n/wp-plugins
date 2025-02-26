<?php

if (!defined('ABSPATH')) exit;

//=====[ Review setting menu ]=====//
if (!function_exists('amJL_review_meta')){
  function amJL_review_meta(){
    add_meta_box('amJL_review_structure', 'Review', 'amJL_review_form', 'post', 'advanced' );
  }
}
add_action('admin_menu', 'amJL_review_meta');

//=====[Review from]=====//
if (!function_exists('amJL_review_form')){
  function amJL_review_form(){
    global $post;
    $place = "※必須";

    /*
    * 1             : amJL_single_post_form($YorN, $label, $name, $size, $place)
    * 2             : amJL_double_post_form($YorN, $label1, $name1, $size1, $place1, $label2, $name2, $size2, $place2)
    * many          : amJL_post_forms($basic_label, $number, $basic_name, $size, $place)
    * set or no-set : amJL_select_post_form($init_number, $max_number, $label, $name, $size, $place)
    * star review   : amJL_review_post_form($name)
    * price         : amJL_itemPrice_post_form($label1, $name1, $label2, $name2, $size, $place)
    */

    ?>
    <h1>構造化データ「商品レビュー」の設定</h1><br>
    <p>入力内容を保存するには、記事を保存してください。</p><br>
    
    <h3 class="recipe_form">商品名</h3>
    <p>商品名を入力してください</p>
    <?php amJL_single_post_form('Yes', '商品名', 'itemName', 80, $place); ?>

    <h3 class="recipe_form">商品画像</h3>
    <p>商品画像のURLを入力します。必要な入力フォームを選択後、記事を保存・更新することで入力フォームの数が更新されます。</p>
    <h4>商品画像URLの入力フォームの数</h4>
    <p>商品画像URLの入力に必要なフォームの数を選択してください。選択後、記事を保存・更新すると反映されます。</p>
    <label>入力フォームの個数</label>
    <?php amJL_select_number('imageNumber', 5); ?>
    <h4>商品画像URLの入力</h4>
    <?php 
    $imageNumber = (int)get_post_meta($post->ID, 'imageNumber', true);
    amJL_select_post_form(0, $imageNumber, '商品画像URL', 'reviewImage_', 50, '推奨');
    ?>

    <h3 class="recipe_form">商品の説明</h3>
    <p>商品の説明を入力してください。</p>
    <?php amJL_single_post_form('Yes', '商品の説明', 'reviewDescription', 100, '推奨'); ?>

    <h3 class="recipe_form">商品の在庫・製造番号の入力</h3>
    <p>商品の在庫（わかる場合のみ）と製造番号を入力します。</p>
    <?php amJL_double_post_form('Yes', '在庫の個数', 'reviewSku', 50, '', '製造番号', 'reviewMpn', 50, '推奨'); ?>

    <h3 class="recipe_form">ブランド名</h3>
    <p>商品のブランド名を入力します。</p>
    <?php amJL_single_post_form('Yes', 'ブランド名', 'BrandName', 60, '推奨') ?>

    <h3 class="recipe_form">評価</h3>
    <p>商品の評価を行います。5段階中どれくらいの評価であるかを入力してください。</p>
    <?php amJL_review_post_form('ratingValue'); ?>

    <h3 class="recipe_form">商品の肯定的な評価</h3>
    <p>商品の肯定的な評価があれば記入します。<br>
    入力フォームの個数を選択後、記事を保存・更新することで反映されます。未選択の場合には入力フォームは1つしか表示されません。</p>
    <h4>肯定的な評価用の入力フォームの個数</h4>
    <?php amJL_select_number('PositiveNumber', 5); ?>
    <h4>肯定的な評価を入力</h4>
    <?php
    $PositiveNumber = get_post_meta($post->ID, 'PositiveNumber', true) ? (int)get_post_meta($post->ID, 'PositiveNumber', true) : 1;
    echo "<table class='form-table'>\n";
    for((int)$i = 1; $i <= $PositiveNumber; $i++){
      amJL_single_post_form('No', "肯定的な評価{$i}", "PositiveNote_{$i}", 80, '推奨');
    }
    echo "</table>\n";
    
    ?>

    <h3 class="recipe_form">商品の否定的な評価</h3>
    <p>商品の否定的な評価があれば記入します。<br>
    入力フォームの個数を選択後、記事を保存・更新することで反映されます。未選択の場合には入力フォームは1つしか表示されません。</p>
    <h4>否定的な評価用の入力フォームの個数</h4>
    <?php amJL_select_number('NegativeNumber', 5); ?>
    <h4>否定的な評価を入力</h4>
    <?php
    $NegativeNumber = get_post_meta($post->ID, 'NegativeNumber', true) ? (int)get_post_meta($post->ID, 'NegativeNumber', true) : 1;
    echo "<table class='form-table'>\n";
    for((int)$i = 1; $i <= $NegativeNumber; $i++){
      amJL_single_post_form('No', "否定的な評価{$i}", "NegativeNote_{$i}", 80, '推奨');
    }
    echo "</table>\n";
    ?>

    <h3 class="recipe_form">商品のURL</h3>
    <p>商品のURLを入力します</p>
    <?php amJL_single_post_form('Yes', '商品のURL', 'itemURL', 80, '推奨'); ?>

    <h3 class="recipe_form">商品の価格</h3>
    <p>商品の価格を入力します</p>
    <?php amJL_itemPrice_post_form('商品の通貨', 'itemPriceCurrency', '商品の価格', 'itemPrice', 50, '推奨') ?>

    <h3 class="recipe_form">商品の価格有効期限</h3>
    <p>その日以降は商品の価格が使用できなくなる日付を入力します。（該当する場合）<br>
    ※過去の日付を入力すると、正しくリッチスニペットが表示されなくなる可能性があります。</p>
    <label>商品の価格有効期限を選択</label>
    <?php $itemPriceValidUntil = get_post_meta($post->ID, 'itemPriceValidUntil', true); ?>
    <input type="date" name='itemPriceValidUntil' min='<?php echo esc_attr(date('Y-m-d')) ?>' value='<?php echo esc_attr($itemPriceValidUntil) ?>'>
    
    <h3 class="recipe_form">商品の状態</h3>
    <p>商品の状態を選択してください。</p>
    <?php $itemCondition = get_post_meta($post->ID, 'itemCondition', true); ?>
    <label>商品の状態</label>
    <select name='itemCondition' id='itemCondition'>
      <option value='NewCondition' <?php if(!empty($itemCondition)){if($itemCondition === 'NewCondition'){echo 'selected'; } } ?>>新品</option>
      <option value='UsedCondition' <?php if(!empty($itemCondition)){if($itemCondition === 'UsedCondition'){echo 'selected'; } } ?>>中古</option>
      <option value='DamagedCondition' <?php if(!empty($itemCondition)){if($itemCondition === 'DamagedCondition'){echo 'selected'; } } ?>>中古（破損）</option>
      <option value='RefurbishedCondition' <?php if(!empty($itemCondition)){if($itemCondition === 'RefurbishedCondition'){echo 'selected'; } } ?>>商品の改装</option>
    </select>

    <h3 class="recipe_form">商品の在庫状況</h3>
    <p>商品の在庫状況を選択します。</p>
    <?php $itemAvailability = get_post_meta($post->ID, 'itemAvailability', true); ?>
    <label>商品の状態</label>
    <select name='itemAvailability' id='itemAvailability'>
      <option value='InStock' <?php if(!empty($itemAvailability)){if($itemAvailability === 'InStock'){echo 'selected'; } } ?>>在庫あり</option>
      <option value='BackOrder' <?php if(!empty($itemAvailability)){if($itemAvailability === 'BackOrder'){echo 'selected'; } } ?>>入荷待ち</option>
      <option value='Discontinued' <?php if(!empty($itemAvailability)){if($itemAvailability === 'Discontinued'){echo 'selected'; } } ?>>販売終了</option>
      <option value='InStoreOnly' <?php if(!empty($itemAvailability)){if($itemAvailability === 'InStoreOnly'){echo 'selected'; } } ?>>店頭販売のみ</option>
      <option value='LimitedAvailability' <?php if(!empty($itemAvailability)){if($itemAvailability === 'LimitedAvailability'){echo 'selected'; } } ?>>在庫残りわずか</option>
      <option value='OnlineOnly' <?php if(!empty($itemAvailability)){if($itemAvailability === 'OnlineOnly'){echo 'selected'; } } ?>>オンライン販売のみ</option>
      <option value='OutOfStock' <?php if(!empty($itemAvailability)){if($itemAvailability === 'OutOfStock'){echo 'selected'; } } ?>>在庫切れ</option>
      <option value='PreOrder' <?php if(!empty($itemAvailability)){if($itemAvailability === 'PreOrder'){echo 'selected'; } } ?>>予約受付中</option>
      <option value='PreSale' <?php if(!empty($itemAvailability)){if($itemAvailability === 'PreSale'){echo 'selected'; } } ?>>一般提供前の注文・配達可</option>
      <option value='SoldOut' <?php if(!empty($itemAvailability)){if($itemAvailability === 'SoldOut'){echo 'selected'; } } ?>>完売</option>
    </select>

    <?php
  }
}

  

//=====[ post save ]=====//
if (!function_exists('amJL_review_form_save')){
  function amJL_revier_form_save($post_id){
    amJL_post_data_save($post_id, 'itemName', 'text');
    amJL_post_data_save($post_id, 'imageNumber', 'int');
    for((int)$i = 1; $i <= 5; $i++){
      $name = "reviewImage_{$i}";
      amJL_post_data_save($post_id, $name, 'url');
    }
    amJL_post_data_save($post_id, 'reviewDescription', 'text');
    amJL_post_data_save($post_id, 'reviewSku', 'text');
    amJL_post_data_save($post_id, 'reviewMpn', 'text');
    amJL_post_data_save($post_id, 'BrandName', 'text');
    amJL_post_data_save($post_id, 'ratingValue', 'text');
    amJL_post_data_save($post_id, 'PositiveNumber', 'int');
    amJL_post_data_save($post_id, 'NegativeNumber', 'int');
    for((int)$i = 1; $i <= 5; $i++){
      $positive = "PositiveNote_{$i}";
      $negative = "NegativeNote_{$i}";
      amJL_post_data_save($post_id, $positive, 'text');
      amJL_post_data_save($post_id, $negative, 'text');
    }
    amJL_post_data_save($post_id, 'itemURL', 'url');
    amJL_post_data_save($post_id, 'itemPriceCurrency', 'text');
    amJL_post_data_save($post_id, 'itemPrice', 'text');
    amJL_post_data_save($post_id, 'itemPriceValidUntil', 'text');
    amJL_post_data_save($post_id, 'itemCondition', 'text');
    amJL_post_data_save($post_id, 'itemAvailability', 'text');
  }
}
add_action('save_post', 'amJL_revier_form_save');