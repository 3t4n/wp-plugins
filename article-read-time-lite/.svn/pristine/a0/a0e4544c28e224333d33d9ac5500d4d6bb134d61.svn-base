<?php defined('ABSPATH') or die('No script kiddies please!!'); ?>
<div class="artl-settings-section" data-settings-ref="progress-bar">
    <?php wp_nonce_field('artl_progress_bar_settings_nonce', 'artl_progress_bar_settings_nonce_field'); ?>
    <input type="hidden" name="action" value="artl_progress_bar_settings_save_action" />
    <?php
    $progress_bar_status = (!empty($artl_progress_bar_settings['progress-bar']['status'])) ? $artl_progress_bar_settings['progress-bar']['status'] : '';
    ?>
    <div class="artl-field-wrap">
        <div class="artl-field-wrap">
            <label><?php esc_html_e('Progress Bar Status', 'article-read-time-lite'); ?></label>
            <div class="artl-field">
                <input type="checkbox" id="artl-progress-status" name="artl_progress_bar_settings[progress-bar][status]"
                    value="1" <?php checked($progress_bar_status, '1'); ?>>
            </div>
        </div>

        <div class="artl-progress-wrap" <?php if ($progress_bar_status  == '') { ?>style="display:none" <?php } ?>>
            <?php
            $bar_display_position = (!empty($artl_progress_bar_settings['progress-bar']['bar_display_position'])) ? $artl_progress_bar_settings['progress-bar']['bar_display_position'] : 'top';
            ?>
            <div class="artl-field-wrap">
                <label><?php esc_html_e('Display Position', 'article-read-time-lite'); ?></label>
                <div class="artl-field">
                    <select name="artl_progress_bar_settings[progress-bar][bar_display_position]"
                        class="artl-display-position-dropdown">
                        <option value="top" <?php selected($bar_display_position, 'top'); ?>>
                            <?php echo esc_html_e('Top of the post/page'); ?></option>
                        <option value="bottom" <?php selected($bar_display_position, 'bottom'); ?>><?php esc_html_e(
                                                                                                        'Bottom of the post/page'
                                                                                                    ); ?></option>
                        <option value="none" <?php selected($bar_display_position, 'none'); ?>><?php esc_html_e(
                                                                                                    'Nones'
                                                                                                ); ?></option>
                    </select>
                </div>
            </div>



            <div class="artl-field-wrap artl-normal-ref"
                <?php if ($bar_display_position == 'none') { ?>style="display:none" <?php } ?>>
                <label><?php esc_html_e('Background Color', 'article-read-time-lite'); ?></label>
                <div class="artl-field">
                    <input type="text" name="artl_progress_bar_settings[progress-bar][background_color]"
                        class="artl-form-field artl-colorpicker"
                        value="<?php echo esc_attr($artl_progress_bar_settings['progress-bar']['background_color']) ?>" />
                </div>
            </div>
            <div class="artl-field-wrap artl-normal-ref"
                <?php if ($bar_display_position == 'none') { ?>style="display:none" <?php } ?>>
                <label><?php esc_html_e('Primary Color', 'article-read-time-lite'); ?></label>
                <div class="artl-field">
                    <input type="text" name="artl_progress_bar_settings[progress-bar][primary_color]"
                        class="artl-form-field artl-colorpicker"
                        value="<?php echo esc_attr($artl_progress_bar_settings['progress-bar']['primary_color']) ?>" />
                </div>
            </div>


            <div class="artl-field-wrap artl-progress-bar-thickness"
                <?php if ($bar_display_position == 'none') { ?>style="display:none" <?php } ?>>
                <label><?php esc_html_e('Bar Thickness:', 'article-read-time-lite'); ?></label>
                <div class="artl-field">
                    <input type="number" name="artl_progress_bar_settings[progress-bar][bar_thickness]"
                        value="<?php echo (!empty($artl_progress_bar_settings['progress-bar']['bar_thickness'])) ? esc_attr($artl_progress_bar_settings['progress-bar']['bar_thickness']) : '12'; ?>" />
                    <p class="description"><?php esc_html_e('(default thickness 12)'); ?></p>
                </div>
            </div>

            <h3><?php esc_html_e('Select Post Type to Display', 'article-read-time-lite'); ?></h3>
            <?php

            $args       = array(
                'public' => true,
            );
            $all_post_types = get_post_types($args, 'names');
            foreach ($all_post_types as $one_post_type) {
            ?>
            <div class="artl-field-wrap">
                <label><?php esc_html_e("Display on $one_post_type", 'article-read-time-lite'); ?></label>
                <div class="artl-field">
                    <?php
                        $selected_post_types_prorgress_bar = (!empty($artl_progress_bar_settings['progress-bar']['display_post_types_progress_bar'])) ? $artl_progress_bar_settings['progress-bar']['display_post_types_progress_bar'] : [];

                        ?>
                    <div class="artl-field artl-checkbox-toggle">
                        <input type="checkbox"
                            name="artl_progress_bar_settings[progress-bar][display_post_types_progress_bar][<?php echo esc_attr($one_post_type); ?>]"
                            value="<?php echo esc_attr($one_post_type); ?>"
                            <?php echo esc_attr((in_array($one_post_type, $selected_post_types_prorgress_bar))) ? 'checked="checked"' : ''; ?>>
                        <label></label>
                    </div>
                </div>
            </div>
            <?php } ?>

        </div>
    </div>
</div>