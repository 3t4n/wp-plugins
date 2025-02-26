<?php

// This function makes single form for plugin admin page.

// single form for
// - './settings/article.php'
// - './settings/certification.php'
// - './settings/recipe_video.php'

if (!function_exists('amJL_single_form')){
    function amJL_single_form($label, $size, $name, $place){
        $value = get_option($name);
        ?>
        <table class="form-table">
            <tr valign="top">
                <th scope="row"><label><?php echo esc_html($label) ?></label></th>
                <td><input type="text" size="<?php echo esc_attr($size) ?>" name="<?php echo esc_attr($name) ?>" id="<?php echo esc_attr($name) ?>" value="<?php echo esc_attr($value); ?>" placeholder="<?php echo esc_attr($place) ?>"></td>
            </tr>
        </table>
        <?php
    }
}