<h2 style="text-decoration:overline;">Edit List Item</h2>

<div class='list_item_output_area'>
<?php
if (isset($curlist['edit_list_item'])&&(!empty($curlist['edit_list_item'])))
  {
  ?>
  <div class='list_item_container'>
  <form method="POST" id="edit_list_item_frm_<?php echo $curlist['edit_list_item'][0]->item_id; ?>" class="edit_list_item" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=animated_al_show&active=2&pid=<?php if (isset($_GET['pid']))echo $_GET['pid']; else echo $proj_id; ?>&amp;updated=true">
        <?php
  if (function_exists('wp_nonce_field'))
    {
    wp_nonce_field('edit_list_item');
    }
  ?>
  <h3><?php echo stripslashes($curlist['edit_list_item'][0]->item_name); ?></h3>
  <input type='hidden' name='item_id' value='<?php echo $curlist['edit_list_item'][0]->item_id; ?>'>
    <div class='list_item_show'>
      <div class="left_line">
      <table>
      
      <tr>
      <td>
      Name
      </td>
      <td>
      <input type="text" name="list_item_name" size="30" value="<?php echo stripslashes($curlist['edit_list_item'][0]->item_name); ?>">
      </td>
      </tr>

      <tr>
      <td>
      URL
      </td>
      <td>
      <input type="text" name="list_item_url" size="30" value="<?php echo $curlist['edit_list_item'][0]->item_url; ?>">
      </td>
      </tr>

      <tr>
      <td>
      Text
      </td>
      <td>
      <input type="text" name="list_item_text" size="50" value="<?php echo htmlspecialchars(stripslashes($curlist['edit_list_item'][0]->item_text)); ?>">
      </td>
      </tr>

      <tr>
      <td>
      Image File
      </td>
      <td>
      <input type="text" class="list_item_image" name="list_item_image" size="50" value="<?php echo $curlist['edit_list_item'][0]->item_image; ?>"> &nbsp;&nbsp;&nbsp;&nbsp;
      <button class="set_img_list_item">Upload New</button> &nbsp;&nbsp;&nbsp; <img class="list_item_image_src" src="<?php if ((isset($curlist['edit_list_item'][0]->item_image))&&(!empty($curlist['edit_list_item'][0]->item_image))) echo $curlist['edit_list_item'][0]->item_image; else echo plugins_url("../../images/none.jpg", __FILE__); ?>">
      </td>
      </tr>

      <tr>
      <td>
      Width
      </td>
      <td>
      <input type="text" name="list_item_width" size="10" value="<?php echo $curlist['edit_list_item'][0]->item_width; ?>">
      </td>
      </tr>

      <tr>
      <td>
      Height
      </td>
      <td>
      <input type="text" name="list_item_height" size="10" value="<?php echo $curlist['edit_list_item'][0]->item_height; ?>">
      </td>
      </tr>

      <tr>
      <td>
      Styles
      </td>
      <td>
      <input type="text" name="list_item_styles" size="30" value="<?php echo $curlist['edit_list_item'][0]->item_styles; ?>">
      </td>
      </tr>

      <tr>
      <td>
      Classes
      </td>
      <td>
      <input type="text" name="list_item_classes" size="30" value="<?php echo $curlist['edit_list_item'][0]->item_classes; ?>">
      </td>
      </tr>

      <tr>
      <td>
      Color
      </td>
      <td>
      <input type="text" name="list_item_color" size="10" value="<?php echo $curlist['edit_list_item'][0]->item_color; ?>">
      </td>
      </tr>

      <tr>
      <td>
      Background Color
      </td>
      <td>
      <input type="text" name="list_item_bgcolor" size="10" value="<?php echo $curlist['edit_list_item'][0]->item_bgcolor; ?>">
      </td>
      </tr>

      <tr>
      <td>
      Actions
      </td>
      <td>
      <input type="submit" name="save_list_item_btn" value=" Save List Item ">
      </td>
      </tr>
      
      </table>
      </div>
      <div class="clear_line"></div>

    </div>
   </form>
  </div>
  <?php
  }
?>
</div>
