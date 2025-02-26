<?php

// This function makes item price form for post.

//price form metas (for Review and HowTo)
if(!function_exists('amJL_itemPrice_post_form')){
  function amJL_itemPrice_post_form($label1, $name1, $label2, $name2, $size, $place){
      global $post;
      $value = get_post_meta($post->ID, $name1, true);
      ?>
      <label><?php echo esc_html($label1) ?></label>
      <select name="<?php echo esc_attr($name1) ?>" id="<?php echo esc_attr($name1) ?>">
        <option value="JPY" <?php if(!empty($value)){if($value === 'JPY'){echo 'selected'; } } ?>>日本円(JPY)</option>
        <option value="USD" <?php if(!empty($value)){if($value === 'USD'){echo 'selected'; } } ?>>米ドル(USD)</option>
        <option value="EUR" <?php if(!empty($value)){if($value === 'EUR'){echo 'selected'; } } ?>>ユーロ(EUR)</option>
      </select>
      <?php
      amJL_single_post_form('Yes', $label2, $name2, $size, $place);
  }
}