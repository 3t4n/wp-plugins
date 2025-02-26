<?php
/*
 * Template for showing Skill Meta Info on Member Post Screen.
 */

$skill_info = (array_key_exists('skill_info', $args)) ? $args['skill_info'] : array(); ?>

<div class="cmb2-wrap form-table">
    <div id="cmb2-metabox" class="cmb2-metabox cmb-field-list">
        <h2 class="skill-h2"><span class="button button-primary" id="addNewSkill"><?php esc_html_e('Add New Skill', ADL_TEAM_TEXTDOMAIN); ?></span></h2>

        <div id="skill_info_sortable_container">
            <?php
            if ( !empty($skill_info) ):
                foreach ( $skill_info as $index => $skillInfo ): // eg. $skillInfo = ['id'=> 'PHP', 'percent'=> '90']
                    ?>

                    <div class="cmb-row cmb-type-text-medium adl_skill_field_wrapper" id="skillID-<?= $index; ?>">
                        <div class="cmb-th adl_team_meta_label">
                            <label for="skillID-<?= $index; ?>" class="skill-label"><?php esc_html_e('Skill Name & Percentage', ADL_TEAM_TEXTDOMAIN); ?></label>
                        </div>
                        <div class="cmb-td">
                            <input name="skill[<?= $index; ?>][id]" placeholder="eg. PHP" value="<?= $skillInfo['id']; ?>" class="adl_skill_name" required>
                            <input type="number" name="skill[<?= $index; ?>][percentage]" class="cmb2-text-small adl_skill_input" value="<?= $skillInfo['percentage']; ?>" placeholder="eg. 80" required>%
                            <span data-id="<?= $index; ?>" class="removeSkillField dashicons dashicons-dismiss" title="Remove this item"></span>
                            <span class="adl-move-icon dashicons dashicons-move"></span>
                        </div>
                    </div>

                    <?php
                endforeach;
            else:
                ?>

                <div class="cmb-row cmb-type-text-medium adl_skill_field_wrapper" id="skillID-0">
                    <div class="cmb-th adl_team_meta_label">
                        <label for="skillID-0" class="skill-label"><?php esc_html_e('Skill Name & Expertise', ADL_TEAM_TEXTDOMAIN); ?></label>
                    </div>
                    <div class="cmb-td">
                        <input type="text" name="skill[0][id]" placeholder="eg. PHP" value="" class="adl_skill_name" required>
                        <input type="number" name="skill[0][percentage]" class="cmb2-text-small adl_skill_input" value="" placeholder="eg. 80" required>%
                        <span data-id="0" class="removeSkillField dashicons dashicons-dismiss" title="Remove this item"></span>
                        <span class="adl-move-icon dashicons dashicons-move"></span>
                        <p><?php esc_html_e('Enter a skill name and its expertise value from 0 to 100.', ADL_TEAM_TEXTDOMAIN); ?></p>

                    </div>
                </div> <!--   ends .cmb-row   &  .adl_skill_field_wrapper-->

                <?php
            endif;
            ?>
        </div> <!--    ends .skill_info_sortable_container    -->

    </div> <!-- end .cmb2-metabox -->
</div> <!-- end .cmb2-wrap -->