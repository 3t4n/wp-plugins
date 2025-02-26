<?php

// This function makes checkbox for plugin admin page.

if (!function_exists('amJL_echo_checked')){
    function amJL_echo_checked($val, $isAll){
        if ((int)$isAll === 100) return -1;
        if ((int)$isAll === 1 || (int)$val === 1)  echo ' checked="checked"';
    }
}

if (!function_exists('amJL_checkbox_normal')){
    function amJL_checkbox_normal($name, $label){
        $value = get_option($name) ? (int)get_option($name) : 0;
        $isAll = ($name === 'all_view') ? 100 :(int)get_option('all_view');
        ?>
        <input type="hidden" name="<?php echo esc_attr($name) ?>" value="0">
        <input type="checkbox" name="<?php echo esc_attr($name) ?>" value="1" <?php amJL_echo_checked($value, $isAll) ?>>
        <label><?php echo esc_html($label) ?></label>
        <br>
        <?php
    }
}