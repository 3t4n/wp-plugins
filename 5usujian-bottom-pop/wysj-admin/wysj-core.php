<?php
require_once(WYSJ_POP_DIR.'/wysj-admin/wysj-update.php');

if ( ! defined( 'ABSPATH' ) ) exit;

function wysj_getAdminPopForm()
{
	global $wyBtpopOptions;
	$label =  $wyBtpopOptions['formLabel'];
	$name =  $wyBtpopOptions['formName'];
	$type =  $wyBtpopOptions['formType'];
	$content =  $wyBtpopOptions['formContent'];
	$width =  $wyBtpopOptions['formWidth'];
	$required =  $wyBtpopOptions['required'];
	$html = '';
	if (count($label) > 0) {
		for ($i=0; $i < count($label); $i++) {
?>
<tr>
	<td>
		<span class="wysj_btpop_draggable" title="拖动排序"></span>
	</td>
	<td><label>表单标签：</label><input type="text" name="wysj_btpop_formLabel[]" value="<?php echo $label[$i]; ?>"></td>
	<td>
		<label>表单类型：</label>
		<select name="wysj_btpop_formType[]">
			<option value="text" <?php if($type[$i] =='text') echo 'selected'; ?> >单行文本</option>
			<option value="textarea" <?php if($type[$i] =='textarea') echo 'selected'; ?>>多行文本</option>
			<option value="select" <?php if($type[$i] =='select') echo 'selected'; ?>>单选下拉菜单</option>
			<option disabled>多选下拉菜单(需升级完整版)</option>
			<option disabled>单选按钮(需升级完整版)</option>
			<option disabled>日期(需升级完整版)</option>
			<option disabled>日期加时间(需升级完整版)</option>
			<option disabled>城市选择器(需升级完整版)</option>
		</select>
		<input type="hidden" name="wysj_btpop_formName[]" value="<?php echo $name[$i]; ?>">
	</td>
	<td><label>默认内容：</label><input type="text" name="wysj_btpop_formContent[]" value="<?php echo $content[$i]; ?>"></td>
	<td>
		<label>表单宽度：</label>
		<select name="wysj_btpop_formWidth[]">
			<option value="one" <?php if($width[$i] =='one') echo 'selected'; ?> >1行</option>
			<option value="two" <?php if($width[$i] =='two') echo 'selected'; ?>>1/2行</option>
			<option disabled>1/3行(需升级完整版)</option>
			<option disabled>2/3行(需升级完整版)</option>
			<option disabled>1/4行(需升级完整版)</option>
		</select>
	</td>
	<td>
		<label>是否必填：</label>
		<select name="wysj_btpop_required[]">
			<option value="required" <?php if($required[$i] =='required') echo 'selected'; ?> >必填项</option>
			<option value="unrequired" <?php if($required[$i] =='unrequired') echo 'selected'; ?>>非必填</option>
		</select>
	</td>
	<td><button class="button-primary wy-pop-delForm" onclick="wysjPopAdmin.delForm(this)">删除表单</button></td>
</tr>
<?php
		}
	}

}

?>