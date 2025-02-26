<?php $style_settings = get_option('sola_t_style_settings'); ?>
<form method="post">
    <?php 
        wp_nonce_field( 'sola_settings_styles_nonce', 'sola_settings_styles_nonce' );
    ?>
    <tr>
        <th><label for=""><?php _e('Choose an Image Style', 'sola-testimonials'); ?></label></th>
        <td>        
            <img src="<?php echo SOLA_T_PLUGIN_DIR.'/images/layouts/sola-t-image-1.png'; ?>" title="<?php _e('Image 1', 'sola-testimonials'); ?>" id="sola_t_image_1" <?php if(isset($style_settings['image_layout']) && $style_settings['image_layout'] == 'image-1') { echo 'class="layout_activate"'; } ?>/>       
            <img src="<?php echo SOLA_T_PLUGIN_DIR.'/images/layouts/sola-t-image-2.png'; ?>" title="<?php _e('Image 2', 'sola-testimonials'); ?>" id="sola_t_image_2" <?php if(isset($style_settings['image_layout']) && $style_settings['image_layout'] == 'image-2') { echo 'class="layout_activate"'; } ?>/>
            <input type="radio" name="sola_t_image_layout" value="image-1" class="sola_t_hide_input" id="sola_t_rb_image_1" <?php if(isset($style_settings['image_layout']) && $style_settings['image_layout'] == 'image-1') { echo 'checked'; } ?>/>
            <input type="radio" name="sola_t_image_layout" value="image-2" class="sola_t_hide_input" id="sola_t_rb_image_2" <?php if(isset($style_settings['image_layout']) && $style_settings['image_layout'] == 'image-2') { echo 'checked'; } ?>/>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <hr/>
        </td>
    </tr>
    <tr>
        <th><label for=""><?php _e('Choose a Layout', 'sola-testimonials'); ?></label></th>
        <td>        
            <img src="<?php echo SOLA_T_PLUGIN_DIR.'/images/layouts/sola-t-layout-1.png'; ?>" title="<?php _e('Layout 1', 'sola-testimonials'); ?>" id="sola_t_layout_1" <?php if(isset($style_settings['chosen_layout']) && $style_settings['chosen_layout'] == 'layout-1') { echo 'class="layout_activate"'; } ?>/>       
            <img src="<?php echo SOLA_T_PLUGIN_DIR.'/images/layouts/sola-t-layout-2.png'; ?>" title="<?php _e('Layout 2', 'sola-testimonials'); ?>" id="sola_t_layout_2" <?php if(isset($style_settings['chosen_layout']) && $style_settings['chosen_layout'] == 'layout-2') { echo 'class="layout_activate"'; } ?>/>
            <img src="<?php echo SOLA_T_PLUGIN_DIR.'/images/layouts/sola-t-layout-3.png'; ?>" title="<?php _e('Layout 3', 'sola-testimonials'); ?>" id="sola_t_layout_3" <?php if(isset($style_settings['chosen_layout']) && $style_settings['chosen_layout'] == 'layout-3') { echo 'class="layout_activate"'; } ?>/>
            <img src="<?php echo SOLA_T_PLUGIN_DIR.'/images/layouts/sola-t-layout-4.png'; ?>" title="<?php _e('Layout 4', 'sola-testimonials'); ?>" id="sola_t_layout_4" <?php if(isset($style_settings['chosen_layout']) && $style_settings['chosen_layout'] == 'layout-4') { echo 'class="layout_activate"'; } ?>/>
            <img src="<?php echo SOLA_T_PLUGIN_DIR.'/images/layouts/sola-t-layout-5.png'; ?>" title="<?php _e('Layout 5', 'sola-testimonials'); ?>" id="sola_t_layout_5" <?php if(isset($style_settings['chosen_layout']) && $style_settings['chosen_layout'] == 'layout-5') { echo 'class="layout_activate"'; } ?>/>
            <input type="radio" name="sola_t_layout" value="layout-1" class="sola_t_hide_input" id="sola_t_rb_layout_1" <?php if(isset($style_settings['chosen_layout']) && $style_settings['chosen_layout'] == 'layout-1') { echo 'checked'; } ?>/>
            <input type="radio" name="sola_t_layout" value="layout-2" class="sola_t_hide_input" id="sola_t_rb_layout_2" <?php if(isset($style_settings['chosen_layout']) && $style_settings['chosen_layout'] == 'layout-2') { echo 'checked'; } ?>/>
            <input type="radio" name="sola_t_layout" value="layout-3" class="sola_t_hide_input" id="sola_t_rb_layout_3" <?php if(isset($style_settings['chosen_layout']) && $style_settings['chosen_layout'] == 'layout-3') { echo 'checked'; } ?>/>
            <input type="radio" name="sola_t_layout" value="layout-4" class="sola_t_hide_input" id="sola_t_rb_layout_4" <?php if(isset($style_settings['chosen_layout']) && $style_settings['chosen_layout'] == 'layout-4') { echo 'checked'; } ?>/>
            <input type="radio" name="sola_t_layout" value="layout-5" class="sola_t_hide_input" id="sola_t_rb_layout_5" <?php if(isset($style_settings['chosen_layout']) && $style_settings['chosen_layout'] == 'layout-5') { echo 'checked'; } ?>/>
            <div class="description">
                &nbsp;  
                <?php $dialog_link = "<a href=\"javascript:void(0)\" id=\"sola_t_open_dialog\">".__('Click here', 'sola-testimonials')."</a>"; ?>
                <p><?php _e("The last layout does not contain any styles. This allows you to style your testimonial to your requirements. For a full list of classes used to style these testimonials $dialog_link" ,"sola-testimonials"); ?>.</p>
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <hr/>
        </td>
    </tr>
    <tr>
        <th><label for=""><?php _e('Choose a Theme', 'sola-testimonials'); ?></label></th>
        <td>       
            <?php 
            if(function_exists('sola_t_register_pro')){
                $bubble = 'sola-t-theme-3';
                $card = 'sola-t-theme-4';
                $bubble2 = 'sola-t-theme-5';
                $type1 = 'sola-t-theme-6';
                $type2 = 'sola-t-theme-7';
            } else {
                $bubble = 'sola-t-theme-3';
                $card = 'sola-t-theme-4';
                $bubble2 = 'sola-t-theme-5';
                $type1 = 'sola-t-theme-6';
                $type2 = 'sola-t-theme-7';
            }
            
            ?>
            <img style='width:160px; height:160px; border-radius: 8px; border:1px solid #ccc;' class='sola_t_theme_select <?php if(isset($style_settings['chosen_theme']) && $style_settings['chosen_theme'] == 'theme-1') { echo 'layout_activate'; } ?>' tid='1' src="<?php echo SOLA_T_PLUGIN_DIR.'/images/layouts/sola-t-theme-1.png?x=1'; ?>" title="<?php _e('Clean Theme', 'sola-testimonials'); ?>" id="sola_t_theme_1" />
            <img style='width:160px; height:160px; border-radius: 8px; border:1px solid #ccc;' class='sola_t_theme_select <?php if(isset($style_settings['chosen_theme']) && $style_settings['chosen_theme'] == 'theme-2') { echo 'layout_activate'; } ?>' tid='2' src="<?php echo SOLA_T_PLUGIN_DIR.'/images/layouts/sola-t-theme-2.png'; ?>" title="<?php _e('Clean Theme', 'sola-testimonials'); ?>" id="sola_t_theme_2" />
            <img style='width:160px; height:160px; border-radius: 8px; border:1px solid #ccc;' class='sola_t_theme_select <?php if(isset($style_settings['chosen_theme']) && $style_settings['chosen_theme'] == 'theme-7') { echo 'layout_activate'; } ?>' tid='7' src="<?php echo SOLA_T_PLUGIN_DIR.'/images/layouts/'.$type2.'.png?x=nocache'; ?>" title="<?php _e('Material Theme 1', 'sola-testimonials'); ?>" id="<?php if(function_exists('sola_t_register_pro')){ echo 'sola_t_theme_7'; } else { echo 'pro_only'; }?>" />

            <img style='width:160px; height:160px; border-radius: 8px; border:1px solid #ccc;' class='sola_t_theme_select <?php if(isset($style_settings['chosen_theme']) && $style_settings['chosen_theme'] == 'theme-3') { echo 'layout_activate'; } ?>' tid='3' src="<?php echo SOLA_T_PLUGIN_DIR.'/images/layouts/'.$bubble.'.png?x=nocache'; ?>" title="<?php _e('Bubble Theme', 'sola-testimonials'); ?>" id="<?php if(function_exists('sola_t_register_pro')){ echo 'sola_t_theme_3'; } else { echo 'pro_only'; }?>" />
            <img style='width:160px; height:160px; border-radius: 8px; border:1px solid #ccc;' class='sola_t_theme_select <?php if(isset($style_settings['chosen_theme']) && $style_settings['chosen_theme'] == 'theme-4') { echo 'layout_activate'; } ?>' tid='4' src="<?php echo SOLA_T_PLUGIN_DIR.'/images/layouts/'.$card.'.png?x=nocache'; ?>" title="<?php _e('Card Theme', 'sola-testimonials'); ?>" id="<?php if(function_exists('sola_t_register_pro')){ echo 'sola_t_theme_4'; } else { echo 'pro_only'; }?>" />
            <img style='width:160px; height:160px; border-radius: 8px; border:1px solid #ccc;' class='sola_t_theme_select <?php if(isset($style_settings['chosen_theme']) && $style_settings['chosen_theme'] == 'theme-5') { echo 'layout_activate'; } ?>' tid='5' src="<?php echo SOLA_T_PLUGIN_DIR.'/images/layouts/'.$bubble2.'.png?x=nocache'; ?>" title="<?php _e('Bubble Theme', 'sola-testimonials'); ?>" id="<?php if(function_exists('sola_t_register_pro')){ echo 'sola_t_theme_5'; } else { echo 'pro_only'; }?>" />
            <img style='width:160px; height:160px; border-radius: 8px; border:1px solid #ccc;' class='sola_t_theme_select <?php if(isset($style_settings['chosen_theme']) && $style_settings['chosen_theme'] == 'theme-6') { echo 'layout_activate'; } ?>' tid='6' src="<?php echo SOLA_T_PLUGIN_DIR.'/images/layouts/'.$type1.'.png?x=nocache'; ?>" title="<?php _e('Card Theme', 'sola-testimonials'); ?>" id="<?php if(function_exists('sola_t_register_pro')){ echo 'sola_t_theme_6'; } else { echo 'pro_only'; }?>" />
        
            <input type="radio" name="sola_t_theme" value="theme-1" class="sola_t_hide_input" id="sola_t_rb_theme_1" <?php if(isset($style_settings['chosen_theme']) && $style_settings['chosen_theme'] == 'theme-1') { echo 'checked'; } ?>/>
            <input type="radio" name="sola_t_theme" value="theme-2" class="sola_t_hide_input" id="sola_t_rb_theme_2" <?php if(isset($style_settings['chosen_theme']) && $style_settings['chosen_theme'] == 'theme-2') { echo 'checked'; } ?>/>
            <input type="radio" name="sola_t_theme" value="theme-3" class="sola_t_hide_input" id="sola_t_rb_theme_3" <?php if(isset($style_settings['chosen_theme']) && $style_settings['chosen_theme'] == 'theme-3') { echo 'checked'; } ?>/>
            <input type="radio" name="sola_t_theme" value="theme-4" class="sola_t_hide_input" id="sola_t_rb_theme_4" <?php if(isset($style_settings['chosen_theme']) && $style_settings['chosen_theme'] == 'theme-4') { echo 'checked'; } ?>/>
            <input type="radio" name="sola_t_theme" value="theme-5" class="sola_t_hide_input" id="sola_t_rb_theme_5" <?php if(isset($style_settings['chosen_theme']) && $style_settings['chosen_theme'] == 'theme-5') { echo 'checked'; } ?>/>
            <input type="radio" name="sola_t_theme" value="theme-6" class="sola_t_hide_input" id="sola_t_rb_theme_6" <?php if(isset($style_settings['chosen_theme']) && $style_settings['chosen_theme'] == 'theme-6') { echo 'checked'; } ?>/>
            <input type="radio" name="sola_t_theme" value="theme-7" class="sola_t_hide_input" id="sola_t_rb_theme_7" <?php if(isset($style_settings['chosen_theme']) && $style_settings['chosen_theme'] == 'theme-7') { echo 'checked'; } ?>/>
            
                <?php if(!function_exists('sola_t_register_pro')){ ?>
                <div class="description">
                    &nbsp;  
                    <?php $purchase_link = "<a href=\"https://codecabin.io/store/super-testimonials-pro/?utm_source=plugin&utm_medium=link&utm_campaign=super_t_themes\" target=\"_BLANK\">".__('Unlock all themes', 'sola-testimonials')."</a>"; ?>
                    <p><?php _e("$purchase_link for only $19.99 once off." ,"sola-testimonials"); ?></p>
                </div>
            <?php } ?>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <hr/>
        </td>
    </tr>
    
    <tr>
        <th><label for=""><?php _e('Custom CSS', 'sola-testimonials'); ?></label></th>
        <td>        
            <textarea name="sola_t_custom_css" id="sola_t_custom_css" style="width: 50%; height: 250px;"><?php if(isset($style_settings['custom_css']) && $style_settings['custom_css'] != "") { echo strip_tags($style_settings['custom_css']); } ?></textarea>
            <p class="description"><?php _e('Style your testimonials to your preference.', 'sola-testimonials'); ?></p>
        </td>
    </tr>     

    <tr>
        <td colspan="2">
            <hr/>
        </td>
    </tr>
    <tr>
        <th><input type="submit" name="sola_t_save_style_settings"  class="button-primary" value="<?php _e('Update Settings', 'sola-testimonials'); ?>" /></th>
        <td></td>
    </tr>
</form>

<div id="sola_t_dialog" title="<?php _e('Available Classes', 'sola-testimonials'); ?>">
    <p><?php _e("The following classes can be used to style your testimonials to your preference", "sola-testimonials"); ?></p>
    <code>
        sola_t_layout_1_container <br/>
        sola_t_layout_2_container <br/>
        sola_t_layout_3_container <br/>
        sola_t_layout_4_container <br/>
        sola_t_layout_5_container <br/>
        sola_t_container <br/>
        sola_t_image <br/>
        sola_t_title <br/>
        sola_t_body <br/>
        sola_t_meta_data <br/>
        sola_t_name <br/>
        sola_t_website <br/>
    </code>
</div>




    
