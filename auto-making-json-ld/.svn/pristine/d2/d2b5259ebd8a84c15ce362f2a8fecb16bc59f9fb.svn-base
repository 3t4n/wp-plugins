<?php

// This function makes select form for post

// number select form for Recipe and HowTo

if (!function_exists('amJL_select_number')){
    function amJL_select_number($name, $max){
        global $post;
        $number = (int)get_post_meta($post->ID, $name, true);
        ?>
        <select name="<?php echo esc_attr($name) ?>" id="<?php echo esc_attr($name) ?>">
            <option value="0" <?php if(!empty($number)){if($number === 0){echo 'selected'; } } ?>>未選択</option>
            <?php
            for((int)$i=1; $i<=$max; $i++){?>
                <option value="<?php echo esc_attr($i) ?>" <?php if(!empty($number)){if($number === $i){echo 'selected'; } } ?>><?php echo esc_html($i) ?>個</option>
                <?php 
            } ?>
        </select>
        <?php
    }
}