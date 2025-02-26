<?php

/**
 * Change the columns names for our slider
 * @param $columns
 *
 * @return array
 */
function adl_rec_post_add_new_columns($new_columns){
    $new_columns = [];
    $new_columns['cb']   = '<input type="checkbox" />';
    $new_columns['title']   = __('Slider Name', A_RCP_TEXTDOMAIN);
    $new_columns['shortcode']   = __('Slider Shortcode', A_RCP_TEXTDOMAIN);
    $new_columns['shortcode_2']   = __('Shortcode For Template File', A_RCP_TEXTDOMAIN);
    $new_columns['date']   = __('Created at', A_RCP_TEXTDOMAIN);
    return $new_columns;
}
add_filter('manage_adl_rec_post_posts_columns', 'adl_rec_post_add_new_columns');

function adl_rec_post_manage_custom_columns( $column_name, $post_id ) {

    switch($column_name){
        case 'shortcode': ?>
            <textarea style="resize: none; background-color: #2e85de; color: #fff;" cols="25" rows="1" onClick="this.select();" >[adl-recent-post <?php echo 'id="'.$post_id.'"';?>]</textarea>
        <?php
        break;
        case 'shortcode_2':
            ?>
                    <textarea style="resize: none; background-color: #2e85de; color: #fff;" cols="58" rows="1" onClick="this.select();" ><?php echo '<?php echo do_shortcode("[adl-recent-post id='; echo "'".$post_id."']"; echo '"); ?>'; ?></textarea>
            <?php
            break;

        default:
            break;

    }
}



add_action('manage_adl_rec_post_posts_custom_column', 'adl_rec_post_manage_custom_columns', 10, 2);



