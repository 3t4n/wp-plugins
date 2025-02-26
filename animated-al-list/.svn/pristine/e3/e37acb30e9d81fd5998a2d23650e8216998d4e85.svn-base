<h2 style="text-decoration:overline;">Apply Templates</h2>

<form id="template_list_form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=animated_al_show&active=3&pid=<?php if (isset($_GET['pid']))echo $_GET['pid']; else echo $proj_id; ?>&amp;updated=true">

  <?php
  if (function_exists('wp_nonce_field'))
    {
    wp_nonce_field('edit_template_items');
    }
  ?>
<div>
<p>Choose Main Template :
<select name="main_template">
<option value="none">none</option>
<?php
if (isset($main_files)&&is_array($main_files))
foreach ($main_files as $mfile)
  {
  if (isset($list['main_info']['list_main_template'])&&($list['main_info']['list_main_template'] == $mfile))
    echo "<option value='".$mfile."' selected>".$mfile."</option>";
    else
    echo "<option value='".$mfile."'>".$mfile."</option>";
  }
?>
</select>
</p>

<p>Choose Item Template :
<select name="item_template">
<option value="none">none</option>
<?php
if (isset($item_files)&&is_array($item_files))
foreach ($item_files as $ifile)
  {
  if (isset($list['main_info']['list_item_template'])&&($list['main_info']['list_item_template'] == $ifile))
    echo "<option value='".$ifile."' selected>".$ifile."</option>";
    else
    echo "<option value='".$ifile."'>".$ifile."</option>";
  }
?>
</select>
</p>
</div>
<input type="hidden" name="proj_id" value="<?php if (isset($_GET['pid']))echo $_GET['pid']; else echo $proj_id; ?>">
<input type="submit" name="save_template_btn" value=" Save Template ">
</form>
