<?php
    (array_key_exists('fs', $args) && !empty($args['fs'])) ? extract($args['fs']) : array();
?>
<div class="cmb2-metabox cmb-field-list">

    <!--Member Name Text-->
    <div class="cmb-row cmb-type-text-medium">
        <div class="cmb-th">
            <label for="memberNameFS"><?php esc_html_e('Member Name', ADL_TEAM_TEXTDOMAIN); ?></label>
        </div>

        <div class="cmb-td">
            <div id="memberNameSlider" class="fontSlider"></div>
            <div class="pixel"> <input type="text" id="memberNameFS" name="gs[fs][memberNameFS]" class="pt-font-input" readonly  value="<?= (!empty($memberNameFS)) ? absint($memberNameFS) : 16; ?>">px</div>
        </div>
    </div>

    <!--Member Designation Text-->
    <div class="cmb-row cmb-type-text-medium">
        <div class="cmb-th">
            <label for="designationFS"><?php esc_html_e('Member Designation', ADL_TEAM_TEXTDOMAIN); ?></label>
        </div>

        <div class="cmb-td">
            <div id="designationSlider" class="fontSlider"></div>
            <div class="pixel"> <input type="text" id="designationFS" name="gs[fs][designationFS]" class="pt-font-input" readonly  value="<?= (!empty($designationFS)) ? absint($designationFS) : 16; ?>">px</div>
        </div>
    </div>

    <!--Member Biography Text-->
    <div class="cmb-row cmb-type-text-medium">
        <div class="cmb-th">
            <label for="biographyFS"><?php esc_html_e('Member Biography Text', ADL_TEAM_TEXTDOMAIN); ?></label>
        </div>

        <div class="cmb-td">
            <div id="biographySlider" class="fontSlider"></div>
            <div class="pixel"> <input type="text" id="biographyFS" name="gs[fs][biographyFS]" class="pt-font-input" readonly  value="<?= (!empty($biographyFS)) ? absint($biographyFS) : 16; ?>">px</div>
        </div>
    </div>


    <!--Icon Size-->
    <div class="cmb-row cmb-type-text-medium">
        <div class="cmb-th">
            <label for="iconFS"><?php esc_html_e('Icon Size', ADL_TEAM_TEXTDOMAIN); ?></label>
        </div>

        <div class="cmb-td">
            <div id="iconSlider" class="fontSlider"></div>
            <div class="pixel"> <input type="text" id="iconFS" name="gs[fs][iconFS]" class="pt-font-input" readonly  value="<?= (!empty($iconFS)) ? absint($iconFS) : 16; ?>">px</div>
        </div>
    </div>

</div> <!--   ends  cmb2-metabox-->
