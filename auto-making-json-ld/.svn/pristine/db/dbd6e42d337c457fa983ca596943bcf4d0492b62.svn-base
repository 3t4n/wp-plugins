<?php

// This function makes single form for post

//single form meta (for post)
if (!function_exists('amJL_single_post_form')){
  function amJL_single_post_form($YorN, $label, $name, $size, $place){
      global $post;
      $value = get_post_meta($post->ID, $name, true);
      if($YorN === 'Yes')echo "<table class='form-table'>\n";
      ?>
      <tr valign="top">
        <th scope="row"><label><?php echo esc_html($label) ?></label></th>
        <td><input type="text" size="<?php echo esc_attr($size) ?>" name="<?php echo esc_attr($name) ?>" value="<?php echo esc_attr($value) ?>" placeholder="<?php echo esc_attr($place) ?>"></td>
      </tr>
      <?php
      if($YorN === 'Yes')echo "</table>\n";
  }
}