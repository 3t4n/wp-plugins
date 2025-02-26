<h2 style="text-decoration:overline;">Main Info</h2>
<?php
if (isset($list['main_info'])&&(!empty($list['main_info'])))
{
?>
  <form method="POST" id="main_info_frm_<?php echo $list['main_info']['list_id']; ?>" class="main_info_frm" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=animated_al_show&active=0&pid=<?php if (isset($_GET['pid']))echo $_GET['pid']; else echo $proj_id; ?>&amp;updated=true">
  <?php
  if (function_exists('wp_nonce_field'))
    {
    wp_nonce_field('list_main_info');
    }
  ?>

<input type="hidden" name="pid" value="<?php echo $list['main_info']['list_id']; ?>">
<div class="left_line">    
      <table class="main_info_table">
  <tr>
  <td>
  Name
  </td>
  <td>
  <input name="list_name" class="notempty_fld" size="50" value="<?php echo $list['main_info']['list_name']; ?>">
  </td>
  </tr>
    <tr>
  <td>
  Width
  </td>
  <td>
  <input name="list_width" class="digits_fld" size="10" value="<?php echo $list['main_info']['list_width']; ?>">
  </td>
  </tr>
  <tr>
  <td>
  Height
  </td>
  <td>
  <input name="list_height" class="digits_fld" size="10" value="<?php echo $list['main_info']['list_height']; ?>">
  </td>
  </tr>

  <tr>
  <td>
  Items Container Class
  </td>
  <td>
  <input name="list_items_container" class="notempty_fld" size="30" value="<?php echo $list['main_info']['list_items_container']; ?>">
  <button name="generate_container_class">Generate unique</button> Must be unique.
  </td>
  </tr>

  <tr>
  <td>
  Main Container Class
  </td>
  <td>
  <input name="list_main_container" class="notempty_fld" size="30" value="<?php echo $list['main_info']['list_main_container']; ?>">
  <button name="generate_main_container_class">Generate unique</button> Must be unique.
  </td>
  </tr>
  
  <tr>
  <td>
  Duration
  </td>
  <td>
  <input name="list_duration" class="digits_fld" size="10" value="<?php echo $list['main_info']['list_duration']; ?>">
  </td>
  </tr>

  <tr>
  <td>
  Effect Duration
  </td>
  <td>
  <input name="list_duration_effect" class="digits_fld" size="10" value="<?php echo $list['main_info']['list_duration_effect']; ?>">
  </td>
  </tr>
  <tr>
  <td>
  Easing
  </td>
  <td>
      <select name="list_easing">
    <?php
    $start_easing = $list['main_info']['list_easing'];
    $easings = array("linear", "swing", "easeInQuad", "easeOutQuad", "easeInOutQuad", "easeInCubic", "easeOutCubic", "easeInOutCubic", "easeInQuart", "easeOutQuart", "easeInOutQuart", "easeInQuint", "easeOutQuint", "easeInOutQuint", "easeInExpo", "easeOutExpo", "easeInOutExpo", "easeInSine", "easeOutSine", "easeInOutSine", "easeInCirc", "easeOutCirc", "easeInOutCirc", "easeInElastic", "easeOutElastic", "easeInOutElastic", "easeInBack", "easeOutBack", "easeInOutBack", "easeInBounce", "easeOutBounce", "easeInOutBounce");
    foreach ($easings as $ease)
      {
        if ($ease == $start_easing)
          echo "<option value='$ease' selected='selected'>$ease</option>";
          else
          echo "<option value='$ease'>$ease</option>";
      }
    ?>
    </select>

  </td>
  </tr>
  
  <tr>
  <td>
  FullWidth
  </td>
  <td>
  <input name="list_fullwidth" class="digits_fld" value="1" type="checkbox" <?php if ($list['main_info']['list_fullwidth'] == 1) echo "checked"; ?>>
  </td>
  </tr>

  
    <tr>
  <td>
  Apply Styles
  </td>
  <td>
  <textarea name="list_apply_classes" style='width:400px;height:200px;'>
    <?php if (isset($list['main_info'])&&(isset($list['main_info']['list_apply_classes'])))echo stripslashes($list['main_info']['list_apply_classes']); ?>
  </textarea>
  </td>
  </tr>
</table>
  </div>
  <div class="clear_line"></div>
    <input type="submit" value=" Save main info " name="main_info_save_btn">
  </form>
<?php
}
?>