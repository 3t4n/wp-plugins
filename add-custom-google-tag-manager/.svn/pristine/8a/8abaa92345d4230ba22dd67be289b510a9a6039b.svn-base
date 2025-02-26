<?php
defined('ABSPATH') or die('not allowed.');

$dashboardData = array(
    'tag-manager-custom-id'=>'1', //SECOND PARAMETERS FOR SANITIZE OR NOT. 1 = TRUE ;)
    'tag-manager-loading-method'=>'1',
    'tag-manager-custom-placement'=>'1',
    'tag-manager-add-custom-script'=>'0',
    'tag-manager-is-widget-active'=>'1',
    'tag-manager-custom-script-element'=>'1'
    );

if (!empty($_POST) && !empty($_POST['act'])){
    $upadteData = array();
    $allowed_actions = array('save','pluginReset');
    if (in_array($_POST['act'], $allowed_actions)){
        foreach ($dashboardData as $dat => $IF_SANITIZE){
            if ($IF_SANITIZE){
                $updateData[$dat] = (!empty($_POST[$dat])) ? sanitize_text_field( $_POST[$dat] ) : false;
            }else{
                $updateData[$dat] = (!empty($_POST[$dat])) ?  stripslashes($_POST[$dat]) : false;
            }
            if ($_POST['act'] == 'pluginReset'){
                $updateData[$dat] = '';
            }
            update_option($dat, $updateData[$dat]);
        }
    }
}

$data = array();
foreach ($dashboardData as $option => $IF_SANITIZE){
    $data[$option] = get_option($option);
}


?>
<form method="post">
<div class="">
<table class="form-table">
<tbody>
<tr>
<th scope="row"><label for="tag-manager-is-widget-active">Power on</label></th>
<td><label><input name="tag-manager-is-widget-active" type="radio" id="tag-manager-is-widget-active" value="1"<?php confirm_val('1', $data['tag-manager-is-widget-active'], ' checked'); ?>>Yes</label><br><label><input name="tag-manager-is-widget-active" type="radio" id="tag-manager-is-widget-active" value="0"<?php confirm_val('0', $data['tag-manager-is-widget-active'], ' checked'); ?>>No</label>
    </td>
</tr>
<tr>
<th scope="row"><label for="tag-manager-custom-id">Tag Custom ID</label></th>
<td><input name="tag-manager-custom-id" type="text" id="tag-manager-custom-id" placeholder="GTM-XX1234" value="<?php echo $data['tag-manager-custom-id']; ?>"></td>
</tr>
<tr>
<th scope="row"><label for="tag-manager-loading-method">Load Tag Manager after document? (async script)</label></th>
<td><input name="tag-manager-loading-method" type="checkbox" id="tag-manager-loading-method" value="1"<?php if ($data['tag-manager-loading-method']) echo ' checked' ?>></td>
</tr>
</tbody>
<tbody><tr>
<tr>
<th scope="row">
    <label for="tag-manager-add-custom-script">Custom HTML / SCRIPT</label></th>
<td><textarea name="tag-manager-add-custom-script" type="text" id="tag-manager-add-custom-script" placeholder="e.g: <div><script>doc.."><?php echo $data['tag-manager-add-custom-script']; ?></textarea></td>
</tr>

<tr>
<th scope="row"><label for="tag-manager-custom-placement">Insert into</label></th>
<td><select name="tag-manager-custom-placement" id="tag-manager-custom-placement">
	<option value="0"<?php confirm_val('0', $data['tag-manager-custom-placement'], ' selected'); ?>>Disabled</option>
	<option value="1"<?php confirm_val('1', $data['tag-manager-custom-placement'], ' selected'); ?>>In Header Element</option>
	<option value="2"<?php confirm_val('2', $data['tag-manager-custom-placement'], ' selected'); ?>>Inside custom element</option>
	<option value="3"<?php confirm_val('3', $data['tag-manager-custom-placement'], ' selected'); ?>>in Footer Element</option>
	<option value="4"<?php confirm_val('4', $data['tag-manager-custom-placement'], ' selected'); ?>>Only Shortcode</option></option>
    </select></td>
</tr>
<?php confirm_val('2', $data['tag-manager-custom-placement'], '<tr><th scope="row"><label for="tag-manager-custom-script-element">Element selector</label></th><td><input type="text" name="tag-manager-custom-script-element" value="'. $data['tag-manager-custom-script-element'] .'"></td></tr>'); ?>

<?php confirm_val('4', $data['tag-manager-custom-placement'], '<tr><th scope="row"><label for="tag-manager-shortcode">Shortcode</label></th><td><input type="text" readonly value="[customscript]"></td></tr>'); ?>
</tbody></table>

</div>

<button type="submit" name="act" value="save">Save</button>
<button type="submit" name="act" value="pluginReset">Reset to default</button>

</form>