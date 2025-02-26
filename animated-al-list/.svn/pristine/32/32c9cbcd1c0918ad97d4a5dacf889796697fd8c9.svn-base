<h2 style="text-decoration:overline;">Manage List</h2>

<div style="float:right;width:300px;">
Don't forget for correct work setup width and height of list items.
</div>

<table id="list_items" style="width:600px;">
<?php
if (isset($list['list_items'])&&(!empty($list['list_items'])))
foreach ($list['list_items'] as $li)
  {
  if (isset($li['item_id']))
    {
    ?>
    <tr>
    <td>
<form id="action_list_item_form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=animated_al_show&active=2&pid=<?php if (isset($_GET['pid']))echo $_GET['pid']; else echo $proj_id; ?>&amp;updated=true">
<table class="list_item">
    <tr>
    <td>
  <?php
  if (function_exists('wp_nonce_field'))
    {
    wp_nonce_field('manage_list_items');
    }
  ?>

        <input type="checkbox" name="delete_list_item_chk_now[]" value="<?php echo $li['item_id']; ?>">
    </td>
    <td style="width:50%;">
    <?php echo stripslashes($li['item_name']); ?>
    </td>
    <td>
    <input type="submit" id="edit_list_item" name="edit_list_item_btn" value="Edit">
    </td>
    <td>
    <input type="submit" id="delete_list_item" name="delete_list_item_btn" value="Delete">
    <input type="hidden" name="list_item_id" value="<?php echo $li['item_id']; ?>">
    </td>
    <td>
    <label for="check_<?php echo $li['item_id']; ?>"> &nbsp; 
    <?php if (isset($li['item_disabled'])&&($li['item_disabled'])) echo "<span style='color:red;'>Disabled</span>"; else echo "<span style='color:green;'>Enabled</span>"; ?>
    </label> &nbsp; 
    <input type="checkbox" name="disable_list_item_chk_now[]" value="<?php echo $li['item_id']; ?>" <?php if (isset($li['item_disabled'])&&($li['item_disabled'])) echo "checked"; ?>>
    </td>
    </tr>
</table>
</form>
    <?php
    }
  }

?>
    </td>
    </tr>
</table>

  <br>
<form id="mass_action_list_item_form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=animated_al_show&active=1&pid=<?php if (isset($_GET['pid']))echo $_GET['pid']; else echo $proj_id; ?>&amp;updated=true">
  <?php
  if (function_exists('wp_nonce_field'))
    {
    wp_nonce_field('al_list_item_mass');
    }
  ?>
<div class="hidden_chk_1">
  
</div>
<div class="hidden_chk_2">
  
</div>
<input type="hidden" name="proj_id" value="<?php if (isset($_GET['pid']))echo $_GET['pid']; else echo $proj_id; ?>">
<select id="list_item_mass_action" name="list_item_mass_action">
  <option value="0">None</option>
  <option value="1">Delete</option>
  <option value="2">Disable/Enable</option>
</select>
<input type="submit" id="list_item_mass_effect" name="list_item_mass_execution_btn" value="Execute">
</form>
