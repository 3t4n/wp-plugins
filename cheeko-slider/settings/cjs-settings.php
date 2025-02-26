<div class="cjs_plugin_body">

    <h2><?php echo get_admin_page_title(); ?></h2>

    <div id="cjs-setting-message" style="display: none;">
        <?php _e("Settings Saved Successfully","cheeko-slider") ?>
    </div>
        
    <div id="form-left">
    <?php
        $cheeko_slider_options = get_option('cheeko_slider_options');
    ?>
        <table class="settings-table">

            <tbody>

            <tr>
                <th scope="row"><?php _e("Image Dimensions","cheeko-slider"); ?></th>
                <td>
                    <?php _e("Please input the width of the image slider:", "cheeko-slider"); ?>
                    <br>
                    <strong><?php _e("Width","cheeko-slider"); ?></strong>
                    <input type="text" name="cjs_width" id="cjs_width" value="<?php echo esc_html($cheeko_slider_options['cjs_width']); ?>" size="4"> px

                    <br><br>
                    
                    <?php _e("Please input the height of the image slider:", "cheeko-slider"); ?>
                    <br>
                    <strong><?php _e("Height", "cheeko-slider"); ?></strong>
                    <input type="text" name="cjs_height" id="cjs_height" value="<?php echo esc_html($cheeko_slider_options['cjs_height']); ?>" size="4"> px
                </td>
            </tr>

            <tr>
                <th scope="row"><?php _e("Transition Effect", "cheeko-slider"); ?></th>
                <td>
                    <?php _e("Please select the effect you would like to use when your images slide (if applicable):","cheeko-slider"); ?>
                    <br>
                    <select name="cjs_effect" class="cjs_effect">
                        <option value="scrollHorz" <?php echo ($cheeko_slider_options['cjs_effect'] == 'scrollHorz' ? 'selected' : '') ?>>
                            <?php _e("Slide","cheeko-slider"); ?>
                        </option>
                        <option value="fade" <?php echo ($cheeko_slider_options['cjs_effect'] == 'fade' ? 'selected' : '') ?>>
                            <?php _e("Fade","cheeko-slider"); ?>
                        </option>
                    </select>
                </td>
            </tr>

            <tr>
                <th scope="row"><?php _e("Auto Play","cheeko-slider"); ?></th>
                <td>
                    <label>
                        <input name="cjs_auto_play" type="checkbox" id="cjs_auto_play" <?php checked($cheeko_slider_options['cjs_auto_play'],'1'); ?>>
                        <?php _e("Check for auto play slider","cheeko-slider"); ?>
                    </label>
                </td>
            </tr>

            <tr>
                <th scope="row"><?php _e("Auto Slide Time","cheeko-slider"); ?></th>
                <td>
                    <?php _e("Set slider auto play time","cheeko-slider"); ?>
                    <br>
                    <input name="cjs_auto_time" type="text" id="cjs_auto_time" value="<?php echo esc_html($cheeko_slider_options['cjs_auto_time']) ?>" size="4">
                    <?php _e("second(s)","cheeko-slider"); ?>
                </td>
            </tr>

            <tr>
                <th scope="row"><?php _e("Slider Speed","cheeko-slider"); ?></th>
                <td>
                    <?php _e("Length of time (in seconds) you would like each image to be visible:","cheeko-slider"); ?>
                    <br>
                    <input type="text" name="cjs_speed" id="cjs_speed" value="<?php echo esc_html($cheeko_slider_options['cjs_speed']); ?>" size="4">
                    <?php _e("second(s)","cheeko-slider"); ?>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row"><?php _e("Pagination Enabled","cheeko-slider"); ?></th>
                <td>
                    <label>
                        <input name="cjs_pager" type="checkbox" id="cjs_pager" <?php checked($cheeko_slider_options['cjs_pager'], '1'); ?>>
                        <?php _e("Check this box if you want to enable the pagination","cheeko-slider"); ?>
                    </label>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row"><?php _e("Controls Enabled", "cheeko-slider"); ?></th>
                <td>
                    <label>
                        <input name="cjs_controls" type="checkbox" id="cjs_controls" <?php checked($cheeko_slider_options['cjs_controls'],'1'); ?>>
                        <?php _e("Check this box if you want to enable the controls like next, previous links","cheeko-slider"); ?>
                        <br>
                    </label>
                </td>
            </tr>

            </tbody>
        </table>

        <input type="button" value="<?php _e('Save Settings','cheeko-slider'); ?>" id="save_settings">
    </div>
    
</div>