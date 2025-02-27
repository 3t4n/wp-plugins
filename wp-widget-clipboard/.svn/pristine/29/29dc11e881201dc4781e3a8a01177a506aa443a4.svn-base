<?php

/**
 * @author Fukuro
 * @created 2018/09/13
 */
 
$this_dir_path = plugin_dir_url(__FILE__);

$paypal_sandbox_mode = false;
if( $_SERVER['HTTP_HOST'] === 'wp-plugins.me' ) {
  /// XAMPP環境ではサンドボックスを使用する
  $paypal_sandbox_mode = true;
}


/// Start HTML ?>
<h3>WPWCのアップグレード手順</h3>

<p>
WPWCのアップグレードには<u>追加プラグインのインストール</u>が必要です。
</p>

<p>
アップグレードされる方は次のPayPalボタンからご購入ください。<br>

<!-- PayPal button -->
<?php if ( ! $paypal_sandbox_mode ): /// 本番環境の場合 ?>
  <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
  <input type="hidden" name="cmd" value="_s-xclick">
  <input type="hidden" name="hosted_button_id" value="GCLNVNP5NWU72">
  <input type="image" src="https://www.paypalobjects.com/ja_JP/JP/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - オンラインでより安全・簡単にお支払い">
  <img alt="" border="0" src="https://www.paypalobjects.com/ja_JP/i/scr/pixel.gif" width="1" height="1">
  </form>
<?php else: /// サンドボックス環境の場合 ?>
  <?php /// form[action] の変更と hidden[business] の追加 ?>
  <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_blank">
  <input type="hidden" name="cmd" value="_s-xclick">
  <input type="hidden" name="hosted_button_id" value="Z7YLYLRSMV4CG">
  <input type="image" src="https://www.sandbox.paypal.com/ja_JP/JP/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - オンラインでより安全・簡単にお支払い">
  <img alt="" border="0" src="https://www.sandbox.paypal.com/ja_JP/i/scr/pixel.gif" width="1" height="1">
  </form>
<?php endif; ?>
<!-- // PayPal button -->
</p>

<p>
PayPal決済が完了するとzip形式のファイル（<b>wp-widget-clipboard-upgrader.zip</b>）がダウンロードされます。<br>
それを有効化して、<u>アップグレードする手順は次の通り</u>です。
</p>

<p>&nbsp;</p>

<p>
1. プラグイン新規追加画面からzipファイルをアップロードしてインストール<br>
<img src="<?php echo $this_dir_path; ?>upgrade_procedure_1_1_upload_zip_ja.png"><br>

2. プラグインを有効化すればアップグレードは完了です。<br>
<img src="<?php echo $this_dir_path; ?>upgrade_procedure_1_2_activate_upgrader_ja.png"><br>
</p>

<h3>追加される機能と使い方</h3>

<h4>&bull; ウィジェットお気に入り登録</h4>

お気に入りのウィジェットを保存していつでも貼り付けできる機能<br>
保存されたウィジェットは元のウィジェットが削除されても残ります。<br>
その使い方は次の通り<br><br>

まず保存したいウィジェットの "<b>お気に入りウィジェットに追加</b>" リンクをクリック<br>
<img src="<?php echo $this_dir_path; ?>upgrade_feature_1_1_favo_click_add_favo_link_ja.png"><br>

クリップボードの [<b>お気に入りウィジェット</b>] にそのウィジェットが追加されるので、貼り付けたい位置にドラッグ＆ドロップ<br>
<img src="<?php echo $this_dir_path; ?>upgrade_feature_1_3_favo_drag_and_drop_favo_widget_ja.png"><br>

お気に入りウィジェットのコピーがその位置に作成されます。<br>
<img src="<?php echo $this_dir_path; ?>upgrade_feature_1_4_favo_pasted_favo_widget_ja.png"><br>

<h4>&bull; ウィジェットの一括選択</h4>

ウィジェットエリアにチェックを入れるとウィジェットが一括選択可能<br>
<img src="<?php echo $this_dir_path; ?>upgrade_feature_2_1_collective_selection_ja.png"><br>

<?php /// End HTML