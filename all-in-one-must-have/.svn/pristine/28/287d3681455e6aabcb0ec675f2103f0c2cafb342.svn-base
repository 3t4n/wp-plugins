<?php

function aiomh_prefix_insertFrontEndScripts(){

	return false;
}

function aiomh_prefix_wpConfigCheckPermissions($wpConfigFilePath='')

{
	if($wpConfigFilePath=='') $wpConfigFilePath=ABSPATH.'wp-config.php';

	if (!is_writable($wpConfigFilePath)) {

		return false;

	}

	// We use these functions later to access the wp-config file

	// so if they're not available we stop here

	if (!function_exists('file') || !function_exists('file_get_contents') || !function_exists('file_put_contents'))

	{

		return false;

	}

	return true;

}



function aiomh_prefix_updateWpConfigTablePrefix($aiomh_prefix_wpConfigFile, $oldPrefix, $newPrefix)

{

	// Check file' status's permissions

	if (!is_writable($aiomh_prefix_wpConfigFile))

	{

		return -1;

	}



	if (!function_exists('file')) {

		return -1;

	}



	// Try to update the wp-config file

	$lines = file($aiomh_prefix_wpConfigFile);

	$fcontent = '';

	$result = -1;

	foreach($lines as $line)

	{

		$line = ltrim($line);

		if (!empty($line)){

			if (strpos($line, '$table_prefix') !== false){

				$line = preg_replace("/=(.*)\;/", "= '".$newPrefix."';", $line);

			}

		}

		$fcontent .= $line;

	}

	if (!empty($fcontent)){

		// Save wp-config file

		$result = file_put_contents($aiomh_prefix_wpConfigFile, $fcontent);

	}



	return $result;

}

function aiomh_prefix_getTablesToAlter()

{

	global $wpdb;

	return $wpdb->get_results("SHOW TABLES LIKE '".$GLOBALS['table_prefix']."%'", ARRAY_N);

}

function aiomh_prefix_renameTables($tables, $currentPrefix, $newPrefix)

{

	global $wpdb;

	$changedTables = array();

	foreach ($tables as $k=>$table)	{

		$tableOldName = $table[0];

		// Hide errors

		$wpdb->hide_errors();



		// To rename the table

		$tableNewName = substr_replace($tableOldName, $newPrefix, 0, strlen($currentPrefix));

		$wpdb->query("RENAME TABLE `{$tableOldName}` TO `{$tableNewName}`");

		array_push($changedTables, $tableNewName);



	}

	return $changedTables;

}

function aiomh_prefix_renameDbFields($oldPrefix,$newPrefix)

{

	global $wpdb;		

	/*

	 * usermeta table

	 *===========================

	 wp_*

	* options table

	* ===========================

	wp_user_roles

	*/

	$str = '';

	if (false === $wpdb->query("UPDATE {$newPrefix}options SET option_name='{$newPrefix}user_roles' WHERE option_name='{$oldPrefix}user_roles';")) {

		$str .= '<br/>Changing value: '.$newPrefix.'user_roles in table <strong>'.$newPrefix.'options</strong>: <font color="#ff0000">Failed</font>';

	}

	$query = 'update '.$newPrefix.'usermeta set meta_key = CONCAT(replace(left(meta_key, ' . strlen($oldPrefix) . "), '{$oldPrefix}', '{$newPrefix}'), SUBSTR(meta_key, " . (strlen($oldPrefix) + 1) . ")) where meta_key in ('{$oldPrefix}autosave_draft_ids', '{$oldPrefix}capabilities', '{$oldPrefix}metaboxorder_post', '{$oldPrefix}user_level', '{$oldPrefix}usersettings','{$oldPrefix}usersettingstime', '{$oldPrefix}user-settings', '{$oldPrefix}user-settings-time', '{$oldPrefix}dashboard_quick_press_last_post_id')";

	if (false === $wpdb->query($query)) {

		$str .= '<br/>Changing values in table <strong>'.$newPrefix.'usermeta</strong>: <font color="#ff0000">Failed</font>';

	}

	if (!empty($str)) {

		$str = '<br/><p>Changing database prefix:</p><p>'.$str.'</p>';

	}

	return $str;

}





global $wpdb;

$bprefix_Message="";

$bprefix_prefix=$wpdb->prefix;

if((isset($_POST['aiomh_prefix_hidden']) && $_POST['aiomh_prefix_hidden']=='Y') && (isset($_POST['Submit']))) { 
	echo '<div class="wrap" id="aiomh-form-prefix" style="display:block">';
	//Form data sent

	$old_aiomh_prefix = $_POST['aiomh_prefix_old_aiomh_prefix'];

	update_option('aiomh_prefix_old_aiomh_prefix', $old_aiomh_prefix);

	$aiomh_prefix_new = $_POST['aiomh_prefix_new'];

	update_option('aiomh_prefix_new', $aiomh_prefix_new);

	$wpdb =& $GLOBALS['wpdb'];

	$new_prefix = preg_replace("/[^0-9a-zA-Z_]/", "", $aiomh_prefix_new);

	$aiomh_prefix_class="aiomh_prefix-error";

	if($_POST['aiomh_prefix_new'] =='' || strlen($_POST['aiomh_prefix_new']) < 2 ){$bprefix_Message .= aiomh_translate('Vui lòng cung cấp tiền tố chính xác').'.';}

		else if ($new_prefix == $old_aiomh_prefix) {$bprefix_Message .= aiomh_translate('Không thay đổi! Vui lòng nhập tiền tố mới khác tiền tố cũ');}

		else if (strlen($new_prefix) < strlen($aiomh_prefix_new)){

			$bprefix_Message .= aiomh_translate('Bạn đã sử dụng một số ký tự không được phép cho tiền tố của bảng. Vui lòng sử dụng ký tự cho phép không phải').' <b>'. $aiomh_prefix_new .'</b>';

		}	else {		

			$tables = aiomh_prefix_getTablesToAlter();

			if (empty($tables)) {

				$bprefix_Message .= aiomh_prefixaiomh_translateInfo('There are no tables to rename!');

			}	else {

				$result = aiomh_prefix_renameTables($tables, $old_aiomh_prefix, $aiomh_prefix_new);

				// check for errors

				if (!empty($result)){

					$bprefix_Message .=aiomh_translate('Tất cả các bảng đã được cập nhật thành công với tiền tố').' <b>'.$aiomh_prefix_new.'</b> !<br/>';

					// try to rename the fields

					$bprefix_Message .= aiomh_prefix_renameDbFields($old_aiomh_prefix, $aiomh_prefix_new);

					$aiomh_prefix_wpConfigFile= ABSPATH.'wp-config.php';

					if (aiomh_prefix_updateWpConfigTablePrefix($aiomh_prefix_wpConfigFile, $old_aiomh_prefix, $aiomh_prefix_new)){

						$bprefix_Message .= aiomh_translate('Tệp wp-config đã được cập nhật thành công với tiền tố').' <b>'.$aiomh_prefix_new.'</b>!';

						$aiomh_prefix_class="aiomh_prefix-success";

					}	else {

						$bprefix_Message .= aiomh_translate('Không thể cập nhật tập tin wp-config! Bạn phải sửa lại biến $table_prefix trong wp-config với tiền tố mới bạn thay đổi').': '.$aiomh_prefix_new;

					}

					// End if tables successfully renamed

					$bprefix_prefix=$aiomh_prefix_new;

				}	else {

					$bprefix_Message .= aiomh_translate('Đã xảy ra lỗi và không thể cập nhật bảng cơ sở dữ liệu');

				}

				$_POST['aiomh_prefix_hidden'] = 'n';	

			} 

	}	

} else {
	echo '<div class="wrap" id="aiomh-form-prefix">';
	//Normal page display

	$dbhost = get_option('aiomh_prefix_dbhost');

	$dbname = get_option('aiomh_prefix_dbname');

	$dbuser = get_option('aiomh_prefix_dbuser');

	$dbpwd = get_option('aiomh_prefix_dbpwd');

	$aiomh_prefixaiomh_translatexist = get_option('aiomh_prefix_prefixaiomh_translatexist');

	$aiomh_prefix_new = get_option('aiomh_prefix_new');

}

?>







  <form id="aiomh_prefix_form" name="aiomh_prefix_form" method="post" action="" >

    <input type="hidden" name="aiomh_prefix_hidden" value="Y">

        <div class="postbox">

            <h2 class="hndle"><span><?php echo aiomh_translate('Thay đổi tiền tố cơ sở dữ liệu')?></span></h2>

            <div class="inside">

              <div class="cdp">

                <h4 style="margin-top: 15px;"><?php echo aiomh_translate('Lưu ý trước khi sử dụng chức năng này')?>:</h4>

                <ul class="cdp-data" style="margin-top: 20px;">

                  <li><?php echo aiomh_translate('Đảm bảo tệp <code>wp-config.php</code> phải <strong>ghi được</strong>')?>.</li>

                  <li><?php echo aiomh_translate('Và cơ sở dữ liệu phải có quyền <strong>ALTER</strong>')?>.</li>

                </ul>

                <?php if(aiomh_prefix_wpConfigCheckPermissions()!=true)
                {
                	echo '<strong style="color:red">'.aiomh_translate('Cảnh báo: file wp-config không có quyền chỉnh sửa. Sau khi đổi tiền tố bạn phải sửa lại biến $table_prefix trong file wp-config một cách thủ công.').'</strong>';
                }
                ?>

              </div><!-- cdp div -->

              <div class="success <?php print $aiomh_prefix_class; ?>" ><?php  echo $bprefix_Message; ?></div><!-- success div -->

              <?php if(isset($_POST['aiomh_prefix_hidden']) && $_POST['aiomh_prefix_hidden']=='Y') { ?>

                  <div class="updated"><p><strong><?php echo aiomh_translate('Options saved.' ); ?></strong></p></div><!-- updated div -->

              <?php } ?>

              <div class="cdp-container">

                <label for="aiomh_prefix_old_aiomh_prefix" class="lable01">

                    <span class="ttl02">

                          <?php echo aiomh_translate("Tiền tố hiện tại")?>: 

                          <span class="required">*</span>

                        </span>

                      <input type="text" name="aiomh_prefix_old_aiomh_prefix" id="aiomh_prefix_old_aiomh_prefix" value="<?php echo $bprefix_prefix; ?>" size="20" required readonly>

                      <span class="error"></span>

                  </label>

                  <label for="aiomh_prefix_new" class="lable01">

                    <span class="ttl02">

                          <?php echo aiomh_translate("Tiền tố mới" ); ?>: 

                          <span class="required">*</span>

                        </span>

                      <input type="text" name="aiomh_prefix_new" value="" size="20" id="aiomh_prefix_new" required>

                      <?php echo aiomh_translate("Ví dụ: example_" ); ?>

                  </label>

                  <p class="margin-top:10px"><?php echo aiomh_translate("<b>Các kí tự cho phép:</b> tất cả chữ latin, chữ số cũng như <strong>_</strong> (gạch dưới), không dùng ký tự đặc biệt và tiếng việt có dấu" )?>.</p>

                  <p class="submit"><input type="submit" name="Submit" class="button button-primary" value="<?php echo aiomh_translate('Lưu thay đổi') ?>" /></p>

                </div><!-- container div -->

            </div><!-- inside div -->

        </div><!-- postbox div -->

  </form>

</div><!-- wrap div -->