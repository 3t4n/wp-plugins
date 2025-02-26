<?php defined('ABSPATH') or die('No script kiddies please!!'); ?>
<div class="artl-settings-section" data-settings-ref="basic">
    <?php wp_nonce_field('artl_settings_nonce', 'artl_settings_nonce_field'); ?>
    <input type="hidden" name="action" value="artl_settings_save_action" />
    <?php
    $main_status = (!empty($artl_settings['basic']['status'])) ? $artl_settings['basic']['status'] : '';
    $img_include = (!empty($artl_settings['basic']['image_include'])) ? $artl_settings['basic']['image_include'] : '';
    $comment_include = (!empty($artl_settings['basic']['comment_include'])) ? $artl_settings['basic']['comment_include'] : '';
    ?>
    <div class="artl-field-wrap">
        <label><?php esc_html_e('Status', 'article-read-time-lite'); ?></label>
        <div class="artl-field artl-checkbox-toggle">
            <input type="checkbox" id="artl-basic-status" name="article_read_lite_settings[basic][status]" value="1"
                <?php checked($main_status, '1'); ?> />
            <label></label>
        </div>
    </div>

    <?php

    $basic_status = (!empty($artl_settings['basic']['status'])) ? $artl_settings['basic']['status'] : '';
    ?>
    <div class="artl-basic-wrap" <?php if ($basic_status  == '') { ?>style="display:none" <?php } ?>>
        <div class="artl-field-wrap">
            <label><?php esc_html_e('Word Per Minute', 'article-read-time-lite'); ?></label>
            <div class="artl-field">
                <input type="number" name="article_read_lite_settings[basic][word_per_minute]"
                    value="<?php echo (!empty($artl_settings['basic']['word_per_minute'])) ? esc_attr($artl_settings['basic']['word_per_minute']) : '300'; ?>" />
                <p class="description">
                    <?php esc_html_e('(defaults word per minute to 300, the average article  reading speed for adults)'); ?>
                </p>
            </div>

        </div>
        <div class="artl-field-wrap">
            <label><?php esc_html_e('Comment Include', 'article-read-time-lite'); ?></label>
            <div class="artl-field artl-checkbox-toggle">
                <input type="checkbox" name="article_read_lite_settings[basic][comment_include]" value="1"
                    <?php checked($comment_include, '1'); ?> />
                <label></label>
            </div>
        </div>
        <div class="artl-field-wrap">
            <label><?php esc_html_e('Image Include', 'article-read-time-lite'); ?></label>
            <div class="artl-field artl-checkbox-toggle">
                <input type="checkbox" id="artl-img-status" name="article_read_lite_settings[basic][image_include]"
                    value="1" <?php checked($img_include, '1'); ?> />
                <label></label>
            </div>
        </div>
        <div class="artl-field-wrap artl-img-wrap" <?php if ($img_include  == '') { ?>style="display:none" <?php } ?>>
            <label><?php esc_html_e('Image Per Minute', 'article-read-time-lite'); ?></label>
            <div class="artl-field">
                <input type="number" name="article_read_lite_settings[basic][image_per_minute]"
                    value="<?php echo (!empty($artl_settings['basic']['image_per_minute'])) ? esc_attr($artl_settings['basic']['image_per_minute']) : '10'; ?>" />
                <p class="description">
                    <?php esc_html_e('(defaults image time to 10 second, the average article image viewing speed for adults)'); ?>
                </p>
            </div>

        </div>




        <h3><?php esc_html_e('Select Post Type to Display', 'article-read-time-lite'); ?></h3>
        <?php

        $args       = array(
            'public' => true,
        );
        $post_types = get_post_types($args, 'names');

        foreach ($post_types as $post_type) {
        ?>
        <div class="artl-field-wrap">
            <label><?php esc_html_e("Display on $post_type", 'article-read-time-lite'); ?></label>
            <div class="artl-field">
                <?php
                    $selected_display_post_types = (!empty($artl_settings['basic']['display_post_types'])) ? $artl_settings['basic']['display_post_types'] : [];

                    ?>
                <div class="artl-field artl-checkbox-toggle">
                    <input type="checkbox"
                        name="article_read_lite_settings[basic][display_post_types][<?php echo esc_attr($post_type); ?>]"
                        value="<?php echo esc_attr($post_type); ?>"
                        <?php echo esc_attr((in_array($post_type, $selected_display_post_types))) ? 'checked="checked"' : ''; ?>>
                    <label></label>
                </div>
            </div>
        </div>
        <?php } ?>


    </div>
</div>