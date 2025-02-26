<?php

// This function makes category forms for article admin page.

// category id & thumbnail URL form for './settings/article.php'

if(!function_exists('amJL_category_forms')){
    function amJL_category_forms(){
        $AllCategories = get_categories();
        $catNumber = 1;
        echo "<table class='form-table'>\n";
        foreach($AllCategories as $val) {
            $ID = "cat_ID_{$catNumber}";
            $Thumb = "thumb_url_{$catNumber}";
            $catThumb = get_option("thumb_url_{$catNumber}");
            $catNumber++;
            ?>
            <tr valign="top">
                <th scope="row"><label><?php echo esc_html($val->name) ?></label></th>
                <td><input type="text" size=10 name="<?php echo esc_attr($ID) ?>" id="<?php echo esc_attr($ID) ?>" value="<?php echo esc_attr($val->cat_ID) ?>" readonly></td>
                <td><input type="text" size=80 name="<?php echo esc_attr($Thumb) ?>" id="<?php echo esc_attr($Thumb) ?>" value="<?php echo esc_attr($catThumb) ?>" placeholder="※必須"></td>
            </tr>
            <?php
        }
        echo "</table>\n";
    }
}
