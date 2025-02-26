<?php defined('ABSPATH') or die('No script kiddies please!!'); ?>
<div class="artl-settings-section" data-settings-ref="layout" style="display:none;">
    <?php
    $art_display = (!empty($artl_settings['layout']['display_section'])) ? $artl_settings['layout']['display_section'] : 'beginning';
    ?>
    <div class="artl-field-wrap">
        <div class="artl-field-wrap">
            <label><?php esc_html_e('Display Section', 'article-read-time-lite'); ?></label>
            <div class="artl-field">
                <select name="article_read_lite_settings[layout][display_section]">
                    <option value="beginning" <?php selected($art_display, 'beginning'); ?>>
                        <?php echo esc_html_e('Beginning of the Content'); ?></option>
                    <option value="end" <?php selected($art_display, 'end'); ?>><?php esc_html_e(
                                                                                    'End of the content'
                                                                                ); ?>
                    </option>

                </select>
            </div>
        </div>
        <?php

        $layout_display_type_check = (!empty($artl_settings['layout']['display_type'])) ? $artl_settings['layout']['display_type'] : 'paragraph';
        ?>
        <div class="artl-field-wrap">
            <label><?php esc_html_e('Display Type', 'article-read-time-lite'); ?></label>
            <div class="artl-field">
                <select name="article_read_lite_settings[layout][display_type]" class="artl-display-type-dropdown">
                    <option value="paragraph" <?php selected($layout_display_type_check, 'paragraph'); ?>>
                        <?php echo esc_html_e('Paragraph Type'); ?></option>
                    <option value="block" <?php selected($layout_display_type_check, 'block'); ?>><?php esc_html_e(
                                                                                                        'Block Type'
                                                                                                    ); ?>
                    </option>
                </select>
            </div>
        </div>
        <?php

        $paragraph_template_check = (!empty($artl_settings['layout']['paragraph_template'])) ? $artl_settings['layout']['paragraph_template'] : 'template-1';
        ?>
        <div class="artl-field-wrap artl-paragraph-ref" <?php if ($layout_display_type_check  == 'block') { ?>style="display:none" <?php } ?>>
            <label><?php esc_html_e('Choose Paragraph Template', 'article-read-time-lite'); ?></label>
            <div class="artl-field">
                <select name="article_read_lite_settings[layout][paragraph_template]" class="artl-form-field artl-template-dropdown-paragraph">
                    <?php

                    for ($i = 1; $i <= 2; $i++) {
                    ?>

                        <option value="template-<?php echo esc_attr($i); ?>" <?php selected($paragraph_template_check, 'template-' . $i); ?>>
                            <?php echo __('Template ',  'article-read-time-lite') . $i; ?></option>
                    <?php
                    }
                    ?>

                </select>


                <div class="artl-template-previews-wrap">
                    <?php for ($i = 1; $i <= 2; $i++) {
                    ?>
                        <div class="artl-each-template-preview-paragraph" <?php if ('template-' . $i != $paragraph_template_check) { ?>style="display:none" <?php } ?> data-template-ref="template-<?php echo intval($i); ?>"><img src="<?php echo ARTL_IMG_DIR . '/template-paragraph/template-' . $i . '.png'; ?>" class="image" /></div>
                    <?php
                    }
                    ?>

                </div>

            </div>
        </div>
        <?php

        $block_template_check = (!empty($artl_settings['layout']['block_template'])) ?
            $artl_settings['layout']['block_template'] : 'template-1';
        ?>
        <div class="artl-field-wrap artl-block-ref" <?php if ($layout_display_type_check  == 'paragraph') { ?>style="display:none" <?php } ?>>
            <label><?php esc_html_e('Choose Block Template', 'article-read-time-lite'); ?></label>
            <div class="artl-field">
                <select name="article_read_lite_settings[layout][block_template]" class="artl-form-field artl-template-dropdown-block">
                    <?php

                    for ($i = 1; $i <= 2; $i++) {
                    ?>

                        <option value="template-<?php echo esc_attr($i); ?>" <?php selected($block_template_check, 'template-' . $i); ?>>
                            <?php echo __('Template ',  'article-read-time-lite') . $i; ?></option>
                    <?php
                    }
                    ?>

                </select>

                <div class="artl-template-previews-wrap">
                    <?php for ($i = 1; $i <= 2; $i++) {
                    ?>
                        <div class="artl-each-template-preview-block" <?php if ('template-' . $i != $block_template_check) { ?>style="display:none" <?php } ?> data-template-ref="template-<?php echo esc_attr($i); ?>"><img src="<?php echo ARTL_IMG_DIR . '/template-block/template-' . $i . '.png'; ?> " class="image" /></div>
                    <?php
                    }
                    ?>

                </div>

            </div>
        </div>

        <div class="artl-field-wrap">
            <label><?php esc_html_e('Heading Text', 'article-read-time-lite'); ?></label>
            <div class="artl-field">
                <input type="text" name="article_read_lite_settings[layout][heading_text]" value="<?php echo esc_attr((!empty($artl_settings['layout']['heading_text']))) ? esc_attr($artl_settings['layout']['heading_text']) : 'Article Read Time'; ?>" />

            </div>

        </div>

        <div class="artl-field-wrap artl-paragraph-ref" <?php if ($layout_display_type_check  == 'block') { ?>style="display:none" <?php } ?>>
            <label><?php esc_html_e('Word/Character Count Message', 'article-read-time-lite'); ?></label>
            <div class="artl-field">
                <textarea name="article_read_lite_settings[layout][word_message]" rows="4" cols="50"><?php echo esc_attr((!empty($artl_settings['layout']['word_message']))) ? rtrim($artl_settings['layout']['word_message']) : 'This post has [word_count] words .This post has [character_count]  characters.This post take [time] minute to read.'; ?></textarea>

                <p class="description">
                    <?php esc_html_e('(Please use [word_count] for word count , [character_count] for character count and [time] for reading time)'); ?>
                </p>
            </div>
        </div>

        <?php

        $word_status = (!empty($artl_settings['layout']['word_enable'])) ? $artl_settings['layout']['word_enable'] : '';
        ?>
        <div class="artl-block-ref" <?php if ($layout_display_type_check  == 'paragraph') { ?>style="display:none" <?php } ?>>
            <div class="artl-field-wrap artl-block-ref">
                <label><?php esc_html_e("Word Enable", 'article-read-time-lite'); ?></label>
                <div class="artl-field">

                    <input type="checkbox" id="artl-word" name="article_read_lite_settings[layout][word_enable]" value="1" <?php checked($word_status, '1');  ?>>

                </div>

            </div>

            <div class="artl-field-wrap artl-word-wrap" <?php if (empty($word_status)) { ?>style="display:none" <?php } ?>>
                <label><?php esc_html_e("Word Label", 'article-read-time-lite'); ?></label>

                <div class="artl-field">

                    <input type="text" name="article_read_lite_settings[layout][word_field_label]" value="<?php echo esc_attr((!empty($artl_settings['layout']['word_field_label']))) ? esc_attr($artl_settings['layout']['word_field_label']) : 'Words'; ?>">

                </div>
            </div>
            <?php

            $char_status = (!empty($artl_settings['layout']['character_enable'])) ? $artl_settings['layout']['character_enable'] : '';
            ?>
            <div class="artl-field-wrap">
                <label><?php esc_html_e("Character Enable", 'article-read-time-lite'); ?></label>
                <div class="artl-field">

                    <input type="checkbox" id="artl-char" name="article_read_lite_settings[layout][character_enable]" value="1" <?php checked($char_status, '1');  ?>>

                </div>

            </div>
            <div class="artl-field-wrap artl-char-wrap" <?php if ($char_status == '') { ?>style="display:none" <?php } ?>>
                <label><?php esc_html_e("Character Label", 'article-read-time-lite'); ?></label>

                <div class="artl-field">

                    <input type="text" name="article_read_lite_settings[layout][character_field_label]" value="<?php echo esc_attr((!empty($artl_settings['layout']['character_field_label']))) ? esc_attr($artl_settings['layout']['character_field_label']) : 'Characters'; ?>">

                </div>
            </div>
            <?php

            $read_status = (!empty($artl_settings['layout']['read_enable'])) ? $artl_settings['layout']['read_enable'] : '';
            ?>
            <div class="artl-field-wrap">
                <label><?php esc_html_e("Read Enable", 'article-read-time-lite'); ?></label>
                <div class="artl-field">

                    <input type="checkbox" id="artl-read" name="article_read_lite_settings[layout][read_enable]" value="1" <?php checked($read_status, '1');  ?>>

                </div>

            </div>
            <div class="artl-field-wrap artl-read-wrap" <?php if ($read_status == '') { ?>style="display:none" <?php } ?>>
                <label><?php esc_html_e("Read Label", 'article-read-time-lite'); ?></label>

                <div class="artl-field">

                    <input type="text" name="article_read_lite_settings[layout][read_field_label]" value="<?php echo esc_attr((!empty($artl_settings['layout']['read_field_label']))) ? esc_attr($artl_settings['layout']['read_field_label']) : 'Read Time'; ?>">

                </div>


            </div>
        </div>

    </div>
</div>