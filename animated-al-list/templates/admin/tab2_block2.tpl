  <form method="POST" id="list_items_add_frm" class="list_items_add_frm" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=animated_al_show&active=1&pid=<?php if (isset($_GET['pid']))echo $_GET['pid']; else echo $proj_id; ?>&amp;updated=true">
      <?php
  if (function_exists('wp_nonce_field'))
    {
    wp_nonce_field('list_items_add');
    }
  ?>
    <h3 style="text-decoration:overline;">Add List Items</h3>
  <input type='hidden' name='main_id' value='<?php if (isset($_GET['pid']))echo $_GET['pid']; else echo $proj_id; ?>'>
    <div class='list_add_show'>
      <table>
      
      <tr>
      <td>
      List Items (one element per line)
      </td>
      <td>
      <textarea name="list_items" rows="7" cols="45"></textarea>
      </td>
      </tr>

      <tr>
      <td>
      Actions
      </td>
      <td>
      <input type="submit" name="list_items_add_btn" value=" Add Items ">
      </td>
      </tr>
      
      </table>
    </div>
  </form>
