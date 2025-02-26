<?php

// This function makes review form for post.

//star review form metas , */5 (for review)
if (!function_exists('amJL_review_post_form')){
    function amJL_review_post_form($name){
        global $post;
        $number = (double)get_post_meta($post->ID, $name, true);
        ?>
        <select name="<?php echo esc_attr($name) ?>" id="<?php echo esc_attr($name) ?>">
        <?php
        for((double)$i=0; $i<=10; $i++){
            $value = (double) $i * 0.5;
            ?>
            <option value="<?php echo esc_attr($value) ?>" <?php if ($number === $value){ echo 'selected'; } ?>>星<?php echo esc_html($value) ?></option>
        <?php
        } ?>
        </select>
        <?php
    }
}