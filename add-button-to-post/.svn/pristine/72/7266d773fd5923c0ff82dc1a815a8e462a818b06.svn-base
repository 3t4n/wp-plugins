<div class="wrap">
	<h2>Add Button To Post</h2>	
<form method="post" action="options.php">
	<?php settings_fields( 'add-cbutton-group' ); ?>
	<table class="form-table">
		<tr valign="top">
			<th scope="row">表示ボタン</th>
			<td>
<input type="checkbox" name="add_cbutton_facebook" value="1" <?php checked(get_option('add_cbutton_facebook'), 1); ?> /> Facebook<br />
<input type="checkbox" name="add_cbutton_twitter" value="1" <?php checked(get_option('add_cbutton_twitter'), 1); ?> /> Twitter<br />
<input type="checkbox" name="add_cbutton_hatena" value="1" <?php checked(get_option('add_cbutton_hatena'), 1); ?> /> Hatena<br />
<input type="checkbox" name="add_cbutton_googlebk" value="1" <?php checked(get_option('add_cbutton_googlebk'), 1); ?> /> Google Bookmarks<br />
<input type="checkbox" name="add_cbutton_feed" value="1" <?php checked(get_option('add_cbutton_feed'), 1); ?> /> Feed<br />
<input type="checkbox" name="add_cbutton_comment" value="1" <?php checked(get_option('add_cbutton_comment'), 1); ?> /> コメント
			</td>
		</tr>
		<tr>
			<th scope="row">表示位置</th>
			<td>
<input type="radio" name="add_cbutton_position" value="1" <?php checked(get_option('add_cbutton_position'), 1); ?> /> 右上
<input type="radio" name="add_cbutton_position" value="0" <?php checked(get_option('add_cbutton_position'), 0); ?> /> 右下
<input type="radio" name="add_cbutton_position" value="2" <?php checked(get_option('add_cbutton_position'), 2); ?> /> 左上
<input type="radio" name="add_cbutton_position" value="3" <?php checked(get_option('add_cbutton_position'), 3); ?> /> 左下
			</td>
		</tr>
	</table>
	<?php submit_button(); ?>
</form>
</div>