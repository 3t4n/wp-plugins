<?php

	$lan = new Language(get_locale());

	//postされていれば保存
	if(isset($_POST['zumi_ad_tag']))
		if(update_option('zumi_ad_tag', $_POST['zumi_ad_tag']))
			echo "<span class='red'>".$lan->saved."</span>";

	

?>


<h2><?php echo $lan->settings ?></h2>



<form action="?page=zumi-ad-settings" method="post">

<?php settings_fields( 'zumi-ad-settings-group' ); ?>
<?php do_settings_sections( 'zumi-ad-settings-group' ); ?>

<table>
<tr>
	<td><?php echo $lan->shortcode_tag ?></td>
	<td><input type="text" name="zumi_ad_tag" value="<?php echo esc_attr(get_option('zumi_ad_tag')) ?>"></td>
</tr>


</table>
    <?php submit_button(); ?>
</form>


<h3><?php echo $lan->import ?></h3>

<form action="?page=zumi-ad-settings" method="post">
<table>
<tr>

	<td><input type="file" name="import_file"></td>
</tr>

</table>
<?php submit_button(); ?>

</form>
■広告ショートコードタグの設定
デフォルト⇒ad

■ロール設定
有料版だけ付けてもいいかも

■エクスポート/インポート
バックアップ用

