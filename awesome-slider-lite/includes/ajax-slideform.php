<?php
$id = isset($_POST['id']) ? awescape($_POST['id']) : '';
if($id!='') {
	$slidepost = get_post($id);
}
?>
<form id="aweslideraddfrom" onsubmit="return false;">
<table class="form-table">
<tbody>
<tr valign="top" id="title_row">
<th scope="row">
<label for="slidename">Slide Title:</label>
</th>
<td>
<input type="text" value="<?php echo isset($slidepost->post_title) ? $slidepost->post_title : ''; ?>" name="slidename" id="slidename" class="regular-text" />
<br />
<span class="setting_required">*</span>
<span class="description">The name of the slide. Example: Slide1</span>
</td>
</tr>
<tr valign="top" id="title_row">
<th scope="row">&nbsp;
</th>
<td>
<?php
if($id!='') {
?>
<input type="button" value="Save" onclick="update_aweslide(this, '<?php echo $id; ?>');" class="button-secondary" />
<?php
}else {
?>
<input type="button" value="Add New" onclick="create_aweslide(this);" class="button-secondary" />
<?php
}
?>
<input type="button" value="Cancel" onclick="jQuery('#slideformdiv').html('');" class="button-secondary" />
<span id="slideloader" style="display: none;">&nbsp;<img align="absmiddle" src="<?php echo AW_IMAGES; ?>loader.gif" /> Loading...</span>
</td>
</tr>
</tbody>
</table>
</form>