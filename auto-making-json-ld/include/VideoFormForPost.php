<?php

// This function makes URL form for Video for post.

// URL form for Video
if (!function_exists('amJL_video_form')){
    function amJL_video_form(){
        global $post;
        ?>
        <table class="form-table">
            <?php
            for((int)$i =1; $i<5; $i++){
                $label = "動画ID {$i}";
                $video_id = "video_id{$i}";
                $VideoVal = get_post_meta($post->ID, $video_id, true);
                ?>
                <tr valign="top">
                    <th scope="row"><label><?php echo esc_html($label) ?><label></th>
                </tr>
                <tr valign="top">
                    <td><input type="text" name="<?php echo esc_attr($video_id) ?>" style="width:100%;" value="<?php echo esc_attr($VideoVal) ?>"></td>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php
    }
}