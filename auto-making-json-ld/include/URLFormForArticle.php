<?php

/// This function makes URL forms for article admin page.

if (!function_exists('amJL_URL_form_article')){
    function amJL_URL_form_article($label, $size, $place){
        ?>
        <table class='form-table'>
        <?php
        for((int)$i = 0; $i < count($label); $i++){
            $count = $i + 1;
            $name = "url{$count}";
            $value = get_option($name);
            ?>
            <tr valigin='top'>
                <th scope='row'><label><?php echo esc_html($label[$i]) ?></label></th>
                <td><input type="text" size="<?php echo esc_attr($size) ?>" name="<?php echo esc_attr($name) ?>" id="<?php echo esc_attr($name) ?>" value="<?php echo esc_attr($value); ?>" placeholder="<?php echo esc_attr($place) ?>"></td>
            </tr>
            <?php
        }
        ?>
        </table>
        <?php
    }
}