<?php
/*
 * Template for showing color Info on Member Post Screen.
 */
$color_info = (array_key_exists('color_info', $args)) ? $args['color_info'] : array();
extract($color_info)
?>
<div class="cmb2-wrap form-table">
    <div id="cmb2-metabox" class="cmb2-metabox cmb-field-list">
        <!--Member name color for the single member page-->
        <div class="cmb-row cmb-type-colorpicker">
            <div class="cmb-th">
                <label for="member_name_clr"><?php _e('Member Name', ADL_TEAM_TEXTDOMAIN); ?></label>
            </div>
            <div class="cmb-td">
                <input  type="text" class="cmb2-text-small adl_team_color" name="color_info[member_name_clr]" id="member_name_clr" value="<?= (!empty($member_name_clr)) ? esc_attr($member_name_clr) : "#e56328"; ?>">
            </div>
        </div>
        <!--Skill bar color for the single member page-->
        <div class="cmb-row cmb-type-colorpicker">
            <div class="cmb-th">
                <label for="skill_bg_clr"><?php _e('Skill Bar Background', ADL_TEAM_TEXTDOMAIN); ?></label>
            </div>
            <div class="cmb-td">
                <input  type="text" class="cmb2-text-small adl_team_color" name="color_info[skill_bg_clr]" id="skill_bg_clr" value="<?= (!empty($skill_bg_clr)) ? esc_attr($skill_bg_clr) : "#f75d41"; ?>">
            </div>
        </div>
        <!--Skill bar text color for the single member page-->
        <div class="cmb-row cmb-type-colorpicker">
            <div class="cmb-th">
                <label for="skill_txt_clr"><?php _e('Skill Bar Text', ADL_TEAM_TEXTDOMAIN); ?></label>
            </div>
            <div class="cmb-td">
                <input  type="text" class="cmb2-text-small adl_team_color" name="color_info[skill_txt_clr]" id="skill_txt_clr" value="<?= (!empty($skill_txt_clr)) ? esc_attr($skill_txt_clr) : "#fff"; ?>">
            </div>
        </div>

    </div> <!-- end .cmb2-metabox -->
</div> <!-- end .cmb2-wrap -->





