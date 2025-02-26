<?php
if (!defined('ABSPATH')) {
    exit();
}
?>
<style>
    #aveff_example_avatar_for_review .avatar{


        <?php
        if ($this->avatarResizingEnambe) {
            if ($this->avatarWidth !== '') {
                ?>width: <?php echo $this->avatarWidth; ?>px; max-width: none;<?php } ?>
            <?php if ($this->avatarHeight !== '') { ?>height: <?php echo $this->avatarHeight; ?>px;<?php
            }
        }
        ?>
        <?php
        if ($this->avatarBorderStylingEnambe) {
            if ($this->borderWidth !== '') {
                ?>border-width: <?php echo $this->borderWidth; ?>px;<?php } ?>
            <?php if ($this->borderStyle !== '') { ?>border-style: <?php echo $this->borderStyle; ?>;<?php } ?>
            <?php if ($this->borderColor !== '') { ?>border-color: <?php echo $this->borderColor; ?>;<?php } ?>
            <?php if ($this->borderRadiusTopLeft !== '') { ?>border-top-left-radius: <?php echo $this->borderRadiusTopLeft; ?>%;<?php } ?>
            <?php if ($this->borderRadiusTopRight !== '') { ?>border-top-right-radius: <?php echo $this->borderRadiusTopRight; ?>%;<?php } ?>
            <?php if ($this->borderRadiusBottomRight !== '') { ?>border-bottom-right-radius: <?php echo $this->borderRadiusBottomRight; ?>%;<?php } ?>
            <?php if ($this->borderRadiusBottomLeft !== '') { ?>border-bottom-left-radius: <?php echo $this->borderRadiusBottomLeft; ?>%;<?php
            }
        }
        ?>

        <?php if ($this->avatarShadowEnable) { ?>box-shadow: <?php echo $this->shadowXOffset . "px " . $this->shadowYOffset . "px " . $this->shadowBlur . "px " . $this->shadowSpreed . "px " . $this->shadowColor; ?>;<?php } ?>
        <?php if ($this->avatarRotation) { ?>
            transform: perspective(100px) 
            <?php
            if ($this->avatarRotateX !== "") {
                echo "rotateX(" . $this->avatarRotateX . "deg)";
            }
            if ($this->avatarRotateY !== "") {
                echo " rotateY(" . $this->avatarRotateY . "deg)";
            }
            if ($this->avatarRotateZ !== "") {
                echo " rotateZ(" . $this->avatarRotateZ . "deg)";
            }
        }
        ?>
    }        

<?php if ($this->avatarZoomEnable) { ?>
        #aveff_example_avatar_for_review .avatar{
            transition: all .6s;
        }    
<?php } ?>
</style>
<div class="aveff_options_page">
    <h2><?php _e("Avatars Effects General Settings", "avatars-effects"); ?></h2>
    <p></p>
    <form class="" action="<?php echo admin_url('admin-post.php'); ?>" method="post" name="<?php echo AvatarsEffects::PAGE_SETTINGS; ?>" enctype="multipart/form-data">
        <input type="hidden" value="save_aveff_options" name="action">
        <?php
        if (function_exists('wp_nonce_field')) {
            wp_nonce_field('aveffe_option', 'aveffe_option_field');
        }
        ?>
        <table class="wp-list-table widefat plugins">
            <tbody>
                <tr valign="top">
                    <th scope="row"><label for="enable_avatar_resizing"><?php _e("Set avatar sizes: ", "avatars-effects"); ?> </label></th>
                    <td>
                        <div class="aveff_toggle_block_wrap">
                            <div class="input-wrap2 input-wrap2-1">
                                <input type="checkbox" class="aveff_custom_checkbox enable_avatar_resizing" id="enable_avatar_resizing" name="enable_avatar_resizing" <?php checked($this->avatarResizingEnambe == 1); ?> value="1">
                                <label for="enable_avatar_resizing"> | | | </label>
                                <span class="texts-wrap"><span class="on"> off</span>  <span class="off">on</span></span>
                            </div>
                            <div class="avatar_settings_group hide-for-default">
                                <ul class="clear-list aveff_settings_fields_list">
                                    <li>
                                        <label class="left-side" for="aveff_avatar_width"><?php _e("Width: ", "avatars-effects"); ?> </label>
                                        <input type="number" name="aveff_avatar_width" data-input-default-val="96" data-unique-attribut = "width" data-point-attribut = "px" id="aveff_avatar_width" value="<?php echo $this->avatarWidth; ?>" class="aveff_avatar_size aveff_avatar_size_w">  <span class="aveff_avatar_prop_unit">px</span>
                                    </li>
                                    <li>
                                        <label class="left-side" for="aveff_avatar_height"><?php _e("Height: ", "avatars-effects"); ?> </label>
                                        <input type="number" name="aveff_avatar_height" data-input-default-val="96" data-unique-attribut = "height" data-point-attribut = "px" id="aveff_avatar_height" value="<?php echo $this->avatarHeight; ?>" class="aveff_avatar_size aveff_avatar_size_h">  <span class="aveff_avatar_prop_unit">px</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="enable_avatar_border_styling"><?php _e("Avatar border styles: ", "avatars-effects"); ?> </label></th>
                    <td>
                        <div class="aveff_toggle_block_wrap">
                            <div class="input-wrap2 input-wrap2-2">
                                <input type="checkbox" class="aveff_custom_checkbox enable_avatar_border_styling" id="enable_avatar_border_styling" name="enable_avatar_border_styling" <?php checked($this->avatarBorderStylingEnambe == 1); ?> value="1">
                                <label for="enable_avatar_border_styling"> | | | </label>
                                <span class="texts-wrap"><span class="on"> off</span>  <span class="off">on</span></span>
                            </div>
                            <div class="avatar_settings_group hide-for-default">
                                <ul class="clear-list aveff_settings_fields_list">
                                    <li>
                                        <label class="left-side" for="aveff_border_width"><?php _e("Border-width: ", "avatars-effects"); ?> </label>
                                        <input type="number" name="aveff_border_width" data-input-default-val="0" data-unique-attribut = "border-width" data-point-attribut = "px" id="aveff_border_width" value="<?php echo $this->borderWidth; ?>"> <span class="aveff_avatar_prop_unit">px</span>
                                    </li>
                                    <li>
                                        <span  class="left-side"><?php _e("Border-style: ", "avatars-effects"); ?></span>
                                        <select name="aveff_border_style" data-unique-attribut="border-style" data-point-attribut=""  data-input-default-val="">
                                            <!--<option value=" " <?php selected($this->borderStyle, ' ', true); ?>><?php _e("  ", "avatars-effects"); ?></option>-->
                                            <option value="solid" <?php selected($this->borderStyle, 'solid', true); ?>><?php _e("Solid ", "avatars-effects"); ?></option>
                                            <option value="dashed" <?php selected($this->borderStyle, 'dashed', true); ?>><?php _e("Dashed ", "avatars-effects"); ?></option>
                                            <option value="dotted" <?php selected($this->borderStyle, 'dotted', true); ?>><?php _e("Dotted ", "avatars-effects"); ?></option>
                                            <option value="double" <?php selected($this->borderStyle, 'double', true); ?>><?php _e("Double ", "avatars-effects"); ?></option>
                                            <option value="groove" <?php selected($this->borderStyle, 'groove', true); ?>><?php _e("Groove ", "avatars-effects"); ?></option>
                                            <option value="hidden" <?php selected($this->borderStyle, 'hidden', true); ?>><?php _e("Hidden ", "avatars-effects"); ?></option>
                                            <option value="inset" <?php selected($this->borderStyle, 'inset', true); ?>><?php _e("Inset ", "avatars-effects"); ?></option>
                                            <option value="outset" <?php selected($this->borderStyle, 'outset', true); ?>><?php _e("Outset ", "avatars-effects"); ?></option>
                                            <option value="ridge" <?php selected($this->borderStyle, 'ridge', true); ?>><?php _e("Ridge ", "avatars-effects"); ?></option>
                                        </select>
                                        <span class="aveff_avatar_prop_unit"></span>
                                    </li>
                                    <li>
                                        <label class="left-side" for="aveff_border_color"><?php _e("Border-color: ", "avatars-effects"); ?> </label>
                                        <input type="color" name="aveff_border_color" data-input-default-val="#fff" data-unique-attribut="border-color" data-point-attribut="" id="aveff_border_color" value="<?php echo $this->borderColor; ?>"><span class="aveff_avatar_prop_unit"></span>
                                    </li>
                                    <li>
                                        <label class="left-side" for="aveff_border_radius"><?php _e("Border-radius top left: ", "avatars-effects"); ?> </label>
                                        <input type="number" name="aveff_border_radius_top_left" id="aveff_border_radius" data-input-default-val="0" data-unique-attribut = "border-top-left-radius" data-point-attribut = "%" value="<?php echo $this->borderRadiusTopLeft; ?>"> <span class="aveff_avatar_prop_unit">%</span>
                                    </li>
                                    <li>
                                        <label class="left-side" for="aveff_border_radius_top_right"><?php _e("Border-radius top  right: ", "avatars-effects"); ?> </label>
                                        <input type="number" name="aveff_border_radius_top_right" id="aveff_border_radius_top_right" data-input-default-val="0" data-unique-attribut = "border-top-right-radius" data-point-attribut = "%" value="<?php echo $this->borderRadiusTopRight; ?>"> <span class="aveff_avatar_prop_unit">%</span>
                                    </li>
                                    <li>
                                        <label class="left-side" for="aveff_border_radius_bottom_right"><?php _e("Border-radius bottom  right: ", "avatars-effects"); ?> </label>
                                        <input type="number" name="aveff_border_radius_bottom_right" id="aveff_border_radius_bottom_right" data-input-default-val="0" data-unique-attribut = "border-bottom-right-radius" data-point-attribut = "%" value="<?php echo $this->borderRadiusBottomRight; ?>"> <span class="aveff_avatar_prop_unit">%</span>
                                    </li>
                                    <li>
                                        <label class="left-side" for="aveff_border_radius_bottom_left"><?php _e("Border-radius bottom left: ", "avatars-effects"); ?> </label>
                                        <input type="number" name="aveff_border_radius_bottom_left" id="aveff_border_radius_bottom_left" data-input-default-val="0" data-unique-attribut = "border-bottom-left-radius" data-point-attribut = "%" value="<?php echo $this->borderRadiusBottomLeft; ?>"> <span class="aveff_avatar_prop_unit">%</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="enable_avatar_zoom"><?php _e("Enable avatar zoom: ", "avatars-effects"); ?> </label></th>
                    <td>
                        <div class="aveff_toggle_block_wrap">
                            <div class="input-wrap2 input-wrap2-3">
                                <input type="checkbox" class="aveff_custom_checkbox enable_avatar_zoom" id="enable_avatar_zoom" name="enable_avatar_zoom" <?php checked($this->avatarZoomEnable == 1); ?> value="1">
                                <label for="enable_avatar_zoom"> | | | </label>
                                <span class="texts-wrap"><span class="on"> off</span>  <span class="off">on</span></span>
                            </div>
                            <div class="avatar_shadow_details hide-for-default aveff_avatar_zoom_size">
                                <div>
<?php _e("Avatar zoom size: ", "avatars-effects"); ?> <span class="aveff_zoom_size_value"><?php echo $this->avatarZoomSize; ?></span>
                                </div>
                                <input  id="slider-direction" data-unique-attribut = "transform" type="range" name="avatar_zoom_size" step="0.1" min="1" max="3" value="<?php echo $this->avatarZoomSize; ?>">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="enable_avatar_shadow"><?php _e("Avatar shadow: ", "avatars-effects"); ?> </label></th>
                    <td>
                        <div class="aveff_toggle_block_wrap" id="aveff_avatar_shadow">
                            <div class="input-wrap2 input-wrap2-4">
                                <input type="checkbox" data-meaning="box-shadow" class="aveff_custom_checkbox enable_avatar_shadow" id="enable_avatar_shadow" name="enable_avatar_shadow" <?php checked($this->avatarShadowEnable == 1); ?> value="1">
                                <label for="enable_avatar_shadow"> | | | </label>
                                <span class="texts-wrap"><span class="on"> off</span>  <span class="off">on</span></span>
                            </div>
                            <div class="avatar_shadow_details hide-for-default">
                                <ul class="clear-list aveff_settings_fields_list" id="">
                                    <li>
                                        <label class="left-side" for="aveff_shadow_x_offset"><?php _e("X offset: ", "avatars-effects"); ?> </label>
                                        <input type="number" name="aveff_shadow_x_offset" id="aveff_shadow_x_offset" data-shadow-attribut = "box-shadow-x-offset" data-point-attribut = "px" value="<?php echo $this->shadowXOffset; ?>">  <span class="aveff_avatar_prop_unit">px</span>
                                    </li>
                                    <li>
                                        <label class="left-side" for="aveff_shadow_y_offset"><?php _e("Y offset: ", "avatars-effects"); ?> </label>
                                        <input type="number" name="aveff_shadow_y_offset" id="aveff_shadow_y_offset" data-shadow-attribut = "box-shadow-y-offset" data-point-attribut = "px" value="<?php echo $this->shadowYOffset; ?>">  <span class="aveff_avatar_prop_unit">px</span>
                                    </li>
                                    <li>
                                        <label class="left-side" for="aveff_shadow_blur"><?php _e("Blur: ", "avatars-effects"); ?> </label>
                                        <input type="number" name="aveff_shadow_blur" id="aveff_shadow_blur"  data-shadow-attribut = "box-shadow-blur" data-point-attribut = "px" value="<?php echo $this->shadowBlur; ?>">  <span class="aveff_avatar_prop_unit">px</span>
                                    </li> 
                                    <li>
                                        <label class="left-side" for="aveff_shadow_spreed"><?php _e("Spreed: ", "avatars-effects"); ?> </label>
                                        <input type="number" name="aveff_shadow_spreed" id="aveff_shadow_spreed"  data-shadow-attribut = "box-shadow-spreed" data-point-attribut = "px" value="<?php echo $this->shadowSpreed; ?>">  <span class="aveff_avatar_prop_unit">px</span>
                                    </li> 
                                    <li>
                                        <label class="left-side" for="aveff_shadow_color"><?php _e("Color: ", "avatars-effects"); ?> </label>
                                        <input type="color" name="aveff_shadow_color" id="aveff_shadow_color" data-shadow-attribut = "box-shadow-color" data-point-attribut = "" value="<?php echo $this->shadowColor; ?>">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="enable_avatar_rotation"><?php _e("Avatar rotation: ", "avatars-effects"); ?> </label></th>
                    <td>
                        <div class="aveff_toggle_block_wrap" id="aveff_avatar_rotation">
                            <div class="input-wrap2 input-wrap2-5">
                                <input type="checkbox" data-meaning="transform" class="aveff_custom_checkbox enable_avatar_rotation" id="enable_avatar_rotation" name="enable_avatar_rotation" <?php checked($this->avatarRotation == 1); ?> value="1">
                                <label for="enable_avatar_rotation"> | | | </label>
                                <span class="texts-wrap"><span class="on"> off</span>  <span class="off">on</span></span>
                            </div>
                            <div class="avatar_rotation_details hide-for-default">
                                <ul class="clear-list aveff_settings_fields_list carv_avatar_rotate" id="carv_avatar_rotate">
                                    <li>
                                        <label class="left-side" for="aveff_rotate_x"><?php _e("Rotate X: ", "avatars-effects"); ?> </label>
                                        <span class="avatar_shadow_type_radios">
                                            <input type="number" name="aveff_rotate_x" data-unique-attribut = "rotateX" data-point-attribut = "deg" id="aveff_rotate_x" value="<?php echo $this->avatarRotateX; ?>">  <span class="aveff_avatar_prop_unit">deg</span>
                                        </span>
                                    </li>
                                    <li>
                                        <label class="left-side" for="aveff_rotate_y"><?php _e("Rotate Y: ", "avatars-effects"); ?> </label>
                                        <span class="avatar_shadow_type_radios">
                                            <input type="number" name="aveff_rotate_y" data-unique-attribut = "rotateY" data-point-attribut = "deg" id="aveff_rotate_y" value="<?php echo $this->avatarRotateY; ?>">  <span class="aveff_avatar_prop_unit">deg</span>
                                        </span>
                                    </li>
                                    <li>
                                        <label class="left-side" for="aveff_rotate_z"><?php _e("Rotate Z: ", "avatars-effects"); ?> </label>
                                        <span class="avatar_shadow_type_radios">
                                            <input type="number" name="aveff_rotate_z" data-unique-attribut = "rotateZ" data-point-attribut = "deg" id="aveff_rotate_z" value="<?php echo $this->avatarRotateZ; ?>">  <span class="aveff_avatar_prop_unit">deg</span>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr valign="top">
                    <td scope="row">
                        <label for="enable_avatar_custom_styling">
<?php _e("Avatar custom styling: ", "avatars-effects"); ?> 
                        </label>    
                        <p></p>
                    </td>
                    <td>
                        <div class="aveff_toggle_block_wrap">
                            <div class="input-wrap2 input-wrap2-6">
                                <input type="checkbox" class="aveff_custom_checkbox enable_avatar_custom_styling" id="enable_avatar_custom_styling" name="enable_avatar_custom_styling" <?php checked($this->enableAvatarCustomStyling == 1); ?> value="1">
                                <label for="enable_avatar_custom_styling"> | | | </label>
                                <span class="texts-wrap"><span class="on"> off</span>  <span class="off">on</span></span>
                            </div>
                            <div class="avatar_rotation_details hide-for-default">
                                <ul class="clear-list aveff_settings_fields_list">
                                    <li>
                                        <label class="left-side" for="aveff_avatar_parent_classes"><?php _e("Parent selectors: ", "avatars-effects"); ?> </label>
                                        <span class="">
                                            <textarea name="avatar_container_classes" id="aveff_avatar_parent_classes" placeholder=".class1, #id2, ..." style="width: 400px; height: 50px"><?php echo $this->avatarContainerClasses; ?></textarea>
                                        </span>
                                    </li>
                                    <li>
                                        <label class="left-side" for="aveff_custom_css"><?php _e("Custom Css: ", "avatars-effects"); ?> </label>
                                        <span class="avatar_shadow_type_radios">
                                            <textarea name="avatar_custom_css" id="aveff_custom_css" placeholder=".avatar{ font-size: 100%; }" style="width: 400px; height: 150px"><?php echo $this->avatarCustomCss; ?></textarea>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="aveff_align-right">
            <input type="submit" value="<?php _e('Save Options', "avatars-effects"); ?>" class="button button-primary">
        </div>
    </form>
    <div class="aveff_example_avatar_for_review" id="aveff_example_avatar_for_review">

        <?php
        $args = array(
            "class" => "aveff_example_avatar"
        );
        $avatar_options = get_avatar_data(get_current_user_id(), $args);
        if ($avatar_options['default'] === "blank") {
            ?>
            <div class="aveff_example_avatar_for_review" id="aveff_example_avatar_for_review">
                <img alt="" src="<?php echo AVEFF_PLUGIN_URL; ?>/avatars-effects/assets/img/default-avatar.png" class="avatar avatar-96 photo aveff_example_avatar" height="96" width="96" >    
            </div>
            <?php
        } else {
            $example_avatar = get_avatar(get_current_user_id(), 96, '', '', $args);
            echo $example_avatar;
        }
        ?>
    </div>
</div>