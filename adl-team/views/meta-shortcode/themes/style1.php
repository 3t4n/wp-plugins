<?php
    (array_key_exists('st1', $args) && !empty($args['st1'])) ? extract($args['st1']) : array();
?>


<!--Theme Elegant Square Grid Setting-->
<div class="cmb2-metabox cmb-field-list" id="style1">

    <!--Tagline -->

    <div class="cmb-row cmb-type-text-medium">
        <div class="cmb-th">
            <label for="tag_line"><?php _e('Team Tag Line', ADL_TEAM_TEXTDOMAIN); ?></label>
        </div>

        <div class="cmb-td">
            <input type="text" id="tag_line" class="cmb2-text width80pc" name="gs[st1][tag_line]"  placeholder="eg. We are professional" value="<?= (!empty($tag_line)) ? esc_attr($tag_line): '' ; ?>">
        </div>
    </div>

    <!--Grid BG color-->
    <div class="cmb-row cmb-type-colorpicker">
        <div class="cmb-th">
            <label><?php _e('Grid Background', ADL_TEAM_TEXTDOMAIN); ?></label>
        </div>
        <div class="cmb-td">
            <input  type="text" class="cmb2-text-small adl_team_color" name="gs[st1][grid_bg_color]" id="st1_grid_bg_color" value="<?= (!empty($grid_bg_color)) ? esc_attr($grid_bg_color) : "#fff"; ?>">
        </div>

    </div>

    <!--    Team Title Color -->
    <div class="cmb-row cmb-type-colorpicker">
        <div class="cmb-th">
            <label for="st1_title_color"><?php _e('Team Title', ADL_TEAM_TEXTDOMAIN); ?></label>
        </div>
        <div class="cmb-td">
            <input  type="text" class="cmb2-text-small adl_team_color" name="gs[st1][title_color]" id="st1_title_color" value="<?= (!empty($title_color)) ? esc_attr($title_color) : "#E17A52"; ?>">
        </div>
    </div>

    <!--    Member Name Color -->
    <div class="cmb-row cmb-type-colorpicker">
        <div class="cmb-th">
            <label for="st1_member_name"><?php _e('Member Name', ADL_TEAM_TEXTDOMAIN); ?></label>
        </div>
        <div class="cmb-td">
            <input  type="text" class="cmb2-text-small adl_team_color" name="gs[st1][st1_member_name]" id="st1_member_name" value="<?= (!empty($st1_member_name)) ? esc_attr($st1_member_name) : "#676767"; ?>">
        </div>
    </div>

    <!--    Designation Color -->
    <div class="cmb-row cmb-type-colorpicker">
        <div class="cmb-th">
            <label for="st1_designation"><?php _e('Member Designation', ADL_TEAM_TEXTDOMAIN); ?></label>
        </div>
        <div class="cmb-td">
            <input  type="text" class="cmb2-text-small adl_team_color" name="gs[st1][st1_designation]" id="st1_designation" value="<?= (!empty($st1_designation)) ? esc_attr($st1_designation) : "#676767"; ?>">
        </div>
    </div>

    <!--    Social Icon Color -->
    <div class="cmb-row cmb-type-colorpicker">
        <div class="cmb-th">
            <label for="st1_social_icon"><?php _e('Social Icon', ADL_TEAM_TEXTDOMAIN); ?></label>
        </div>
        <div class="cmb-td">
            <input  type="text" class="cmb2-text-small adl_team_color" name="gs[st1][st1_social_icon]" id="st1_social_icon" value="<?= (!empty($st1_social_icon)) ? esc_attr($st1_social_icon) : "#C5C5C5"; ?>">
        </div>
    </div>

    <!--    Social Icon Hover Color -->
    <div class="cmb-row cmb-type-colorpicker">
        <div class="cmb-th">
            <label for="st1_social_icon_hover"><?php _e('Social Icon hover', ADL_TEAM_TEXTDOMAIN); ?></label>
        </div>
        <div class="cmb-td">
            <input  type="text" class="cmb2-text-small adl_team_color" name="gs[st1][st1_social_icon_hover]" id="st1_social_icon_hover" value="<?= (!empty($st1_social_icon_hover)) ? esc_attr($st1_social_icon_hover) : "#D7947A"; ?>">
        </div>
    </div>

    <!--Image cropping width-->
    <div class="cmb-row cmb-type-text-medium hide-it">
        <div class="cmb-th">
            <label for="image_width"><?php _e('Image Cropping width', ADL_TEAM_TEXTDOMAIN); ?></label>
        </div>
        <div class="cmb-td">
            <input type="number" class="width60px cmb2-text-small" name="gs[st1][image_width]" id="image_width" placeholder="270" value="<?= (!empty($image_width)) ? intval($image_width) : 270 ; ?>"> Pixel
            <p class="cmb2-metabox-description"><?php _e('Specify the image cropping Width in Pixel, if you have uploaded larger image and enabled cropping on general setting tab.', ADL_TEAM_TEXTDOMAIN); ?></p>
        </div>
    </div>

    <!--Image cropping height-->
    <div class="cmb-row cmb-type-text-medium hide-it">
        <div class="cmb-th">
            <label for="image_height"><?php _e('Image Cropping height', ADL_TEAM_TEXTDOMAIN); ?></label>
        </div>
        <div class="cmb-td">
            <input type="number" class="width60px cmb2-text-small" name="gs[st1][image_height]" id="image_height" placeholder="260" value="<?= (!empty($image_height)) ? intval($image_height) : 260 ; ?>"> Pixel
            <p class="cmb2-metabox-description"><?php _e('Specify the image cropping Height in Pixel, if you have uploaded larger image and enabled cropping on general setting tab.', ADL_TEAM_TEXTDOMAIN); ?></p>
        </div>
    </div>

</div> <!-- ends Theme Modern Setting-->
