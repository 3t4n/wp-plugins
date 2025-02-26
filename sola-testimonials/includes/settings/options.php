<?php $sola_t_options = get_option('sola_t_options_settings'); ?>
<h4><?php _e('The below options will only affect testimonials using the \'Single\' or \'Grid\' Layouts. To change the options of your slider, plese navigate to the \'Slider\' tab.', 'sola-testimonials'); ?><h4>
<form name="sola_t_options_form" method="post">
    <?php 
        wp_nonce_field( 'sola_settings_options_nonce', 'sola_settings_options_nonce' );
    ?>
    <tr>
        <th><label for=""><?php _e('Show Testimonial Title', 'sola-testimonials'); ?></label></th>
        <td>        
            <input type="checkbox" name="sola_t_show_title" id="sola_t_show_title" value="1" <?php if(isset($sola_t_options['show_title']) && $sola_t_options['show_title'] == 1){ echo 'checked'; } ?> />
        </td>
    </tr>
    <tr>
        <th><label for=""><?php _e('Show Testimonial Body', 'sola-testimonials'); ?></label></th>
        <td>        
            <input type="checkbox" name="sola_t_show_excerpt" id="sola_t_show_excerpt" value="1" <?php if(isset($sola_t_options['show_excerpt']) && $sola_t_options['show_excerpt'] == 1){ echo 'checked'; } ?> />
        </td>
    </tr>
    <tr>
        <th><label for=""><?php _e('Strip all links out of the testimonials', 'sola-testimonials'); ?></label></th>
        <td>        
            <input type="checkbox" name="sola_st_strip_links" id="sola_st_strip_links" value="1" <?php if(isset($sola_t_options['sola_st_strip_links']) && $sola_t_options['sola_st_strip_links'] == 1){ echo 'checked'; } ?>/>
            <p class="description"><?php _e('This will remove all links, and prevent your users from viewing the \'Single view\' of a testimonial', 'sola-testimonials'); ?></p>
        </td>
    </tr>
    <tr>
        <th><label for=""><?php _e('Use \'nofollow\' Links', 'sola-testimonials'); ?></label></th>
        <td>
            <input type="checkbox" name="sola_t_allow_nofollow" id="sola_t_allow_nofollow" value="1" <?php if(isset($sola_t_options['sola_t_allow_nofollow']) && $sola_t_options['sola_t_allow_nofollow'] == 1){ echo 'checked'; } ?>/>
            <p class="description"><?php _e('Enable or Disable \'nofollow\' website address links in all testimonials', 'sola-testimonials'); ?></p>
        </td>
    </tr>
    <tr>
        <th><label for=""><?php _e('Allow HTML to be rendered in the testimonial', 'sola-testimonials'); ?></label></th>
        <td>        
            <input type="checkbox" name="sola_t_allow_html" id="sola_t_allow_html" value="1" <?php if(isset($sola_t_options['sola_t_allow_html']) && $sola_t_options['sola_t_allow_html'] == 1){ echo 'checked'; } ?>/>
        </td>
    </tr>
    <tr>
        <th><label for=""><?php _e('Testimonial content type', 'sola-testimonials'); ?></label></th>
        <td>        
            <input type="radio" name="sola_t_content_type" id="sola_t_content_type_excerpt" value="0" <?php if((isset($sola_t_options['sola_t_content_type']) && $sola_t_options['sola_t_content_type']) == 0 || $sola_t_options['sola_t_content_type'] == null){ echo 'checked'; } ?>/><?php _e('An Excerpt', 'sola-testimonials'); ?><br/>
            <input type="radio" name="sola_t_content_type" id="sola_t_content_type_content" value="1" <?php if(isset($sola_t_options['sola_t_content_type']) && $sola_t_options['sola_t_content_type'] == 1){ echo 'checked'; } ?>/><?php _e('Full Body', 'sola-testimonials'); ?>
        </td>
    </tr>
    <tr class="excerpt_length_row">
        <th><label for=""><?php _e('Excerpt Length', 'sola-testimonials'); ?></label></th>
        <td>        
            <input type="text" name="sola_t_except_length" id="sola_t_except_length" value="<?php if(isset($sola_t_options['excerpt_length'])){ echo intval($sola_t_options['excerpt_length']); } ?>" />
            <p class="description"><?php _e('How long should your testimonial teaser be? (Specify number of words).', 'sola-testimonials'); ?></p>
        </td>
    </tr>
    <tr>
        <th><label for=""><?php _e('Default Image Size', 'sola-testimonials'); ?></label></th>
        <td>        
            <input type="text" name="sola_t_image_size" id="sola_t_image_size" value="<?php if(isset($sola_t_options['image_size'])){ echo intval($sola_t_options['image_size']); } ?>" />
            <p class="description"><?php _e('Size of testimonial images (px).', 'sola-testimonials'); ?></p>
        </td>
    </tr>
    <tr>
        <th><label for=""><?php _e('Read More Link', 'sola-testimonials'); ?></label></th>
        <td>        
            <input type="text" name="sola_t_read_more_link" id="sola_t_read_more_link" value="<?php if(isset($sola_t_options['read_more_link']) && $sola_t_options['read_more_link'] != ""){ echo esc_attr($sola_t_options['read_more_link']); } ?>" />
        </td>
    </tr>
    <tr>
        <th><label for=""><?php _e('Show User\'s Name', 'sola-testimonials'); ?></label></th>
        <td>        
            <input type="checkbox" name="sola_t_show_user_name" id="sola_t_show_user_name" value="1" <?php if(isset($sola_t_options['show_user_name']) && $sola_t_options['show_user_name'] == 1){ echo 'checked'; } ?>/>
        </td>
    </tr>
    <tr>
        <th><label for=""><?php _e('Show Link To User\'s Website', 'sola-testimonials'); ?></label></th>
        <td>        
            <input type="checkbox" name="sola_t_show_web" id="sola_t_show_web" value="1" <?php if(isset($sola_t_options['show_user_web']) && $sola_t_options['show_user_web'] == 1){ echo 'checked'; } ?>/>
        </td>
    </tr>
    <tr>
        <th><label for=""><?php _e('Show Testimonial Image', 'sola-testimonials'); ?></label></th>
        <td>        
            <input type="checkbox" name="sola_t_show_image" id="sola_t_show_image" value="1" <?php if(isset($sola_t_options['show_image']) && $sola_t_options['show_image'] == 1){ echo 'checked'; } ?>/>
        </td>
    </tr>    
    <?php if(function_exists('sola_t_pro_activate')){ ?>
        <tr>
            <th><label for=""><?php _e('Show Star Rating', 'sola-testimonials'); ?></label></th>
            <td>        
                <input type="checkbox" name="sola_t_show_rating" id="sola_t_show_rating" value="1" <?php if(isset($sola_t_options['show_rating']) && $sola_t_options['show_rating'] == 1){ echo 'checked'; } ?>/>
            </td>
        </tr>
    <?php 
    
        } else { 
            $pro_link = "<a href=\"https://codecabin.io/store/super-testimonials-pro/?utm_source=plugin&utm_medium=link&utm_campaign=ratings_options_page\" target=\"_BLANK\">".__('Premium Version', 'sola-testimonials')."</a>";
    ?>
        <tr>
            <th><label for=""><?php _e('Show Rating', 'sola-testimonials'); ?></label></th>
            <td>        
                <input type="checkbox" disabled="disabled" readonly="readonly"/>
                <p class="description"><?php _e("Ratings are only available in the $pro_link", "sola-testimonials"); ?></p>
            </td>
        </tr>
    <?php } ?>
    <?php if(function_exists('sola_t_pro_activate')){ ?>
        <tr>
            <th><label for=""><?php _e('Export Testimonials', 'sola-testimonials'); ?></label></th>
            <td>        
                <a href='<?php echo admin_url( 'edit.php?post_type=testimonials&page=sola_t_settings&tab=options&export=all'); ?>' class='button button-primary'><?php _e( 'Export All', 'sola-testimonials' ); ?></a>
            </td>
        </tr>
    <?php 
    
        } else { 
            $pro_link = "<a href=\"https://codecabin.io/store/super-testimonials-pro/?utm_source=plugin&utm_medium=link&utm_campaign=export_options_page\" target=\"_BLANK\">".__('Premium Version', 'sola-testimonials')."</a>";
    ?>
        <tr>
            <th><label for=""><?php _e('Export Testimonials', 'sola-testimonials'); ?></label></th>
            <td>        
                <a href='#' class='button button-primary' disabled='disbaled' title='<?php _e('Premium Version Only', 'sola-testimonials'); ?>'><?php _e( 'Export All', 'sola-testimonials' ); ?></a>
                <p class="description"><?php _e("Exporting markers is only available in the $pro_link", "sola-testimonials"); ?></p>
            </td>
        </tr>
    <?php } ?>
    <tr>
        <td colspan="2">
            <hr/>
        </td>
    </tr>
    <tr>
        <th><input type="submit" name="sola_t_save_options"  class="button-primary" value="<?php _e('Update Settings', 'sola-testimonials'); ?>" /></th>
        <td></td>
    </tr>
</form>

