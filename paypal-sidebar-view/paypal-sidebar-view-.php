<?php
/*
------------------------------------------------------------
Plugin Name: PayPal Sidebar View
Plugin URI: http://strong-seo.net/
Description: PayPalクレジット対応サイトであることを、サイドバーに表示するためのプラグイン。 | <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=CZGZ9BZ9SYHKL" target="_blank">開発者に寄付する</a>
Author: パートナーズ株式会社
Version: 1.0.4
Author URI: http://partnersltd.jp/
------------------------------------------------------------
Copyright (C) 2010,2011 - Patners Co.,Ltd. (staff@partnersltd.jp)
------------------------------------------------------------
・2010/07/01 V1.0.0 初版公開
・2010/07/30 V1.0.1 一部内部仕様を変更
・2010/09/10 V1.0.2 Another HTML-lint gateway で減点される問題への対応
・2010/12/25 V1.0.3 一部内部仕様を変更
・2011/01/14 V1.0.4 一部内部仕様を変更
------------------------------------------------------------
*/

include_once('paypal-sidebar-view-pr.php');

add_option('paypal_sidebar_view_is_view_title', 'TRUE' , 'PayPal Sidebar View - タイトルビューの表示有無', 'YES');
add_option('paypal_sidebar_view_wiget_name', 'お支払い方法' , 'PayPal Sidebar View - ウィジェット名', 'YES');
add_option('paypal_sidebar_view_uppertext', '＜PalPalクレジット対応＞' , 'PayPal Sidebar View - 上部表示テキスト', 'YES');
add_option('paypal_sidebar_view_lowertext', '' , 'PayPal Sidebar View - 下部表示テキスト', 'YES');
add_option('paypal_sidebar_view_donate', 'FALSE' , 'PayPal Sidebar View - 寄付の有無', 'YES');

register_widget_control('PayPal Side Bar View', 'paypal_sidebar_view_widget_control');
register_sidebar_widget('PayPal Side Bar View', 'paypal_sidebar_view_widget_viewer');

function paypal_sidebar_view_widget_viewer($args){ extract($args);

	$paypal_sidebar_view_is_view_title = get_option('paypal_sidebar_view_is_view_title');
	$paypal_sidebar_view_wiget_name = get_option('paypal_sidebar_view_wiget_name');
	$paypal_sidebar_view_uppertext = get_option('paypal_sidebar_view_uppertext');
	$paypal_sidebar_view_lowertext = get_option('paypal_sidebar_view_lowertext');
	$paypal_sidebar_view_donate = get_option('paypal_sidebar_view_donate');

	if ($paypal_sidebar_view_is_view_title == 'TRUE') { echo $before_widget . $before_title . $paypal_sidebar_view_wiget_name . $after_title . '<br />';};

		echo '<div style="text-align:center;">';

			if($paypal_sidebar_view_uppertext != '') {echo '<p>'.$paypal_sidebar_view_uppertext.'</p>';};

			echo '<img alt="PayPal" src="'.plugin_dir_url(__FILE__).'images/logo_paypal.gif'.'" />';

			if($paypal_sidebar_view_lowertext != '') {echo '<p>'.$paypal_sidebar_view_lowertext.'</p>';};

			if ($paypal_sidebar_view_donate == 'FALSE'){ echo get_links_for_paypal_sidebar_view_widget();}


		echo '</div>';

	if ($paypal_sidebar_view_is_view_title == 'TRUE') {echo $after_widget. '<br />';};
}

function paypal_sidebar_view_widget_control(){

	$paypal_sidebar_view_is_view_title = get_option('paypal_sidebar_view_is_view_title');
	$paypal_sidebar_view_wiget_name = get_option('paypal_sidebar_view_wiget_name');
	$paypal_sidebar_view_uppertext = get_option('paypal_sidebar_view_uppertext');
	$paypal_sidebar_view_lowertext = get_option('paypal_sidebar_view_lowertext');
	$paypal_sidebar_view_donate = get_option('paypal_sidebar_view_donate');

	if (isset($_POST['paypal_sidebar_view_submit'])) {
		update_option('paypal_sidebar_view_is_view_title', $_POST['paypal_sidebar_view_is_view_title']);
		update_option('paypal_sidebar_view_wiget_name', $_POST['paypal_sidebar_view_wiget_name']);
		update_option('paypal_sidebar_view_uppertext', $_POST['paypal_sidebar_view_uppertext']);
		update_option('paypal_sidebar_view_lowertext', $_POST['paypal_sidebar_view_lowertext']);
		update_option('paypal_sidebar_view_donate', $_POST['paypal_sidebar_view_donate']);
	}

	?>
	<table style="text-valign:top;">
	<tr>
		<td style="text-valign:top;">タイトルの表示:</td>
		<td style="text-valign:bottom;">
		<select name="paypal_sidebar_view_is_view_title">
		<option value="TRUE" <?php if($paypal_sidebar_view_is_view_title=='TRUE'){ echo('selected');} ?>>表示する</option>
		<option value="FALSE" <?php if($paypal_sidebar_view_is_view_title=='FALSE'){ echo('selected');} ?>>表示しない</option>
		</select>
		</td>
	</tr>
	</table>

	<table style="text-valign:top;">
	<tr><td>タイトル:</td></tr>
	<tr>
		<td>
		<input name="paypal_sidebar_view_wiget_name" type="text" value="<?php echo $paypal_sidebar_view_wiget_name; ?>" />
		</td>
	</tr>
	<tr><td>(例) ＜PayPalクレジット対応＞</td></tr>
	</table>

	&nbsp;<br />

	<table style="text-valign:top;">
	<tr><td>画像上部に表示するテキスト:</td></tr>
	<tr>
		<td>
		<input name="paypal_sidebar_view_uppertext" type="text" value="<?php echo $paypal_sidebar_view_uppertext; ?>" />
		</td>
	</tr>
	<tr><td>(例) ＜PayPalクレジット対応＞</td></tr>
	</table>

	&nbsp;<br />

	<table style="text-valign:top;">
	<tr><td>画像下部に表示するテキスト:</td></tr>
	<tr>
		<td>
		<input name="paypal_sidebar_view_lowertext" type="text" value="<?php echo $paypal_sidebar_view_lowertext; ?>" />
		</td>
	</tr>
	<tr><td>(例) ＜PayPalクレジット対応＞</td></tr>
	</table>

	&nbsp;<br />

	<table style="text-valign:top;">
	<tr>
		<td style="text-valign:top;">ステータス:</td>
		<td style="text-valign:bottom;">
		<select name="paypal_sidebar_view_donate">
		<option value="FALSE" <?php if($paypal_sidebar_view_donate=='FALSE'){ echo('selected');} ?>>寄付していません</option>
		<option value="TRUE" <?php if($paypal_sidebar_view_donate=='TRUE'){ echo('selected');} ?>>寄付しました</option>
		</select>
		</td>
	</tr>
	<tr>
		<td style="text-valign:top;"></td>
		<td style="text-valign:top;">
		&nbsp;<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=CZGZ9BZ9SYHKL" target="_blank">開発者に寄付する</a>
		</td>
	</tr>
	</table>

	<p><input type="hidden" name="paypal_sidebar_view_submit" value="1" /></p>
	<?php
}
?>