<?php

// This function makes double forms for

//double form metas (for post)
if(!function_exists('amJL_double_post_form')){
  function amJL_double_post_form($YorN, $label1, $name1, $size1, $place1, $label2, $name2, $size2, $place2){
    global $post;
    $value1 = get_post_meta($post->ID, $name1, true);
    $value2 = get_post_meta($post->ID, $name2, true);
    if($YorN === 'Yes')echo "<table class='form-table'>\n";
    ?>
    <tr valign="top">
      <th scope="row"><label><?php echo esc_html($label1) ?></label></th>
      <td><input type="text" size="<?php echo esc_attr($size1) ?>" name="<?php echo esc_attr($name1) ?>" value="<?php echo esc_attr($value1) ?>" placeholder="<?php echo esc_attr($place1) ?>"></td>
      <th scope="row"><label><?php echo esc_html($label2) ?></label></th>
      <td><input type="text" size="<?php echo esc_attr($size2) ?>" name="<?php echo esc_attr($name2) ?>" value="<?php echo esc_attr($value2) ?>" placeholder="<?php echo esc_attr($place2) ?>"></td>
    </tr>
    <?php
    if($YorN === 'Yes')echo "</table>\n";
  }
}