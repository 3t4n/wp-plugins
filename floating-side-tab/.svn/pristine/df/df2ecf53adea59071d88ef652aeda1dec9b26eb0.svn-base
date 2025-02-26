<?php
defined('ABSPATH') or die('No script kiddies please!!');
include(FSDT_PATH . '/includes/cores/icon-template-data.php');

?>

<div class="fsdt-each-icon fsdt-each-form-field fsdt-icon-sortable-handle">
    <div class="fsdt-field-head fsdt-clearfix">
        <h3 class="fsdt-field-title">
            <span class="dashicons dashicons-arrow-down"></span>
            <span class="fsdt-tab-title">
                <?php echo esc_html($tab_title); ?>
            </span>
        </h3>
        <a href="javascript:void(0);" class="fsdt-remove-new-icon"><span class="dashicons dashicons-trash"></span></a>
    </div>
    <div class="fsdt-field-body fsdt-display-none">
        <div class="fsdt-field-wrap">
            <label>
                <?php esc_html_e('Tab Name', 'floating-side-tab'); ?>
            </label>
            <div class="fsdt-field amft-tab-name">
                <input type="text" class="fsdt-tab-name" name="<?php echo esc_attr($field_name_prefix); ?>[tab_name]" value="<?php echo esc_attr($tab_name); ?>" />
            </div>
        </div>

        <div class="fsdt-field-wrap">
            <label>
                <?php esc_html_e('Tooltip Text', 'floating-side-tab'); ?>
            </label>
            <div class="fsdt-field amft-tab-name">
                <input type="text" name="<?php echo esc_attr($field_name_prefix); ?>[tool_tip_text]" value="<?php echo esc_attr($tool_tip_text); ?>" />
            </div>
        </div>
        <div class="fsdt-added-block iconpicker-container">
            <div class="fsdt-field-wrap">
                <label>
                    <?php esc_html_e('Icon Picker Type', 'floating-side-tab'); ?>
                </label>
                <div class="fsdt-field fsdt-icon-selection-block">
                    <select name="<?php echo esc_attr($field_name_prefix); ?>[icon_select_type]" class="fsdt-icon-type-select-option fsdt-select-option">

                        <option value="bootstrap_icons" <?php echo selected($selected_icon_option, 'bootstrap_icons'); ?>>
                            <?php esc_html_e('Font Icons', 'floating-side-tab'); ?>
                        </option>
                        <option value="custom_icons" <?php echo selected($selected_icon_option, 'custom_icons'); ?>>
                            <?php esc_html_e('Custom Icon', 'floating-side-tab'); ?>
                        </option>
                    </select>
                </div>
            </div>

            <div class="fsdt-icon-picker-block <?php $this->display_none($selected_icon_option, 'bootstrap_icons'); ?>" id="fsdt-icon-picker-block-<?php echo esc_attr($field_key); ?>">
                <div class="fsdt-field-wrap">
                    <label>
                        <?php esc_html_e('Icon Picker', 'floating-side-tab'); ?>
                    </label>
                    <div class="fsdt-field iconselect-btn"><a href="javascript:void(0)" class="fsdt-icon-picker-btn" data-field-key="<?php echo esc_attr($field_key); ?>" data-icon-type="tab-main-icon">
                            <?php esc_html_e('Select Icon', 'floating-side-tab'); ?>
                        </a>
                        <textarea class="selected-icon-libraryname fsdt-field-hide" name="<?php echo esc_attr($field_name_prefix); ?>[icon_detail][libraryName]"><?php echo wp_kses_post($iconlibraryname); ?></textarea>
                        <textarea type="text" class="selected-icon-lib-id fsdt-field-hide" name="<?php echo esc_attr($field_name_prefix); ?>[icon_detail][libraryId]"> <?php echo wp_kses_post($iconlibraryid); ?></textarea>
                        <textarea type="text" class="selected-icon-iconHtml fsdt-field-hide" name="<?php echo esc_attr($field_name_prefix); ?>[icon_detail][iconHtml]"> <?php echo wp_kses_post($iconHtml); ?></textarea>
                        <textarea type="text" class="selected-icon-iconMarkup fsdt-field-hide" name="<?php echo esc_attr($field_name_prefix); ?>[icon_detail][iconMarkup]"> <?php echo wp_kses_post($iconMarkup); ?></textarea>
                        <textarea type="text" class="selected-icon-iconClass fsdt-field-hide" name="<?php echo esc_attr($field_name_prefix); ?>[icon_detail][iconClass]"> <?php echo wp_kses_post($iconClass); ?> </textarea>
                        <textarea type="text" class="selected-icon-iconText fsdt-field-hide" name="<?php echo esc_attr($field_name_prefix); ?>[icon_detail][iconText]"> <?php echo wp_kses_post($iconText); ?></textarea>
                        <div class="fsdt-menu-icon-view">

                            <div class="fsdt-selected-icon-view">
                                <?php
                                if (!empty($iconHtml)) {
                                    echo wp_kses_post($iconHtml);
                                } ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <div class="fsdt-field-wrap fsdt-custom-icon-block <?php $this->display_none($selected_icon_option, 'custom_icons'); ?>">
                <label>
                    <?php esc_html_e('Custom Icon', 'floating-side-tab'); ?>
                </label>
                <div class="fsdt-field">
                    <input class="fsdt-custom-icon" name="<?php echo esc_attr($field_name_prefix); ?>[custom_icon]" type="text" placeholder="Click to Upload Icon" value="">
                    <div class="fsdt-custom-icon-img-preview">
                        <?php
                        if (!empty($custom_icon_link)) { ?>
                            <img src="<?php echo esc_url($custom_icon_link); ?>" />
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="fsdt-added-block">
            <div class="fsdt-field-wrap">
                <label for="">
                    <?php esc_html_e('Menu Icon Type', 'floating-side-tab'); ?>
                </label>
                <div class="fsdt-field">
                    <select name="<?php echo esc_attr($field_name_prefix); ?>[icon_link_type]" class="fsdt-select-option">

                        <option value="link" <?php echo selected($selected_menu_type, 'link'); ?>>
                            <?php esc_html_e('Link', 'floating-side-tab'); ?>
                        </option>
                        <option value="tab" <?php echo selected($selected_menu_type, 'tab'); ?>>
                            <?php esc_html_e('Tab', 'floating-side-tab'); ?>
                        </option>
                    </select>
                </div>
            </div>
            <div class="fsdt-field-wrap fsdt-url-block <?php $this->display_none($selected_menu_type, 'link'); ?>">
                <label>
                    <?php esc_html_e('Icon Link', 'floating-side-tab'); ?>
                </label>
                <div class="fsdt-field"><input type="text" placeholder="Enter Link" value="<?php echo esc_attr($icon_link_url); ?>" name="<?php echo esc_attr($field_name_prefix); ?>[icon_link_url]">
                </div>
            </div>

            <div class="fsdt-field-wrap fsdt-url-block <?php $this->display_none($selected_menu_type, 'link'); ?>">
                <label>
                    <?php esc_html_e('Link Open', 'floating-side-tab'); ?>
                </label>
                <div class="fsdt-field">
                    <select name="<?php echo esc_attr($field_name_prefix); ?>[icon_link_open_type]" class="fsdt-select-opt">
                        <option value="_self" <?php echo selected($tab_open, '_self'); ?>>
                            <?php esc_html_e('Open in Same Tab', 'floating-side-tab'); ?>
                        </option>
                        <option value="_blank" <?php echo selected($tab_open, '_blank'); ?>>
                            <?php esc_html_e('Open in New Tab', 'floating-side-tab'); ?>
                        </option>

                    </select>

                </div>
            </div>


            <div class="fsdt-tab-type-block <?php $this->display_none($selected_menu_type, 'tab'); ?>">
                <div class="fsdt-field-wrap">
                    <label>
                        <?php esc_html_e('Tab Type', 'floating-side-tab'); ?>
                    </label>
                    <div class="fsdt-field fsdt-high-width-tab">
                        <div class="fsdt-tab-flex">
                            <div class="fsdt-tab-image"><img src="<?php echo FSDT_URL . '/images/pro-tab/fsdt-pro-html.png' ?>" /></div>
                            <div class="fsdt-tab-image fsdt-pro-svg"><img src="<?php echo FSDT_URL . '/images/pro-tab/fsdt-pro-post.png' ?>" /></div>
                            <div class="fsdt-tab-image fsdt-pro-svg"><img src="<?php echo FSDT_URL . '/images/pro-tab/fsdt-pro-product.png' ?>" /></div>
                            <div class="fsdt-tab-image fsdt-pro-svg"><img src="<?php echo FSDT_URL . '/images/pro-tab/fsdt-pro-contact.png' ?>" /></div>
                            <div class="fsdt-tab-image fsdt-pro-svg"><img src="<?php echo FSDT_URL . '/images/pro-tab/fsdt-pro-subscription.png' ?>" /></div>
                            <div class="fsdt-tab-image fsdt-pro-svg"><img src="<?php echo FSDT_URL . '/images/pro-tab/fsdt-pro-social-icon.png' ?>" /></div>
                        </div>
                    </div>
                </div>
                <div class="fsdt-field-wrap">
                    <label></label>
                    <div class="fsdt-field fsdt-checkbox-toggle fsdt-high-width-tab fsdt-demo-wrap">
                        <a class="fsdt-demo-btn fsdt-btn-secondary" href="<?php echo esc_url(FSDT_DEMO_LINK); ?>?utm_source=fsdt_free&utm_campaign=admin_tab_type" target="_blank"><?php echo esc_html_e('Checkout Demo Playground','floating-side-tab');?></a>
                    </div>
                </div>

                <div class="fsdt-field-wrap">
                    <label>
                        <?php esc_html_e('Tab Heading', 'floating-side-tab'); ?>
                    </label>
                    <div class="fsdt-field">
                        <input type="text" name="<?php echo esc_attr($field_name_prefix); ?>[tab_heading]" value="<?php echo esc_attr($tab_heading); ?>" />
                    </div>
                </div>

                <div class="fsdt-field-wrap">
                    <label>
                        <?php esc_html_e('Hide Tab Heading', 'floating-side-tab'); ?>
                    </label>
                    <div class="fsdt-field">
                        <input type="checkbox" name="<?php echo esc_attr($field_name_prefix); ?>[tab_heading_enable]" value="1" <?php checked($tab_heading_enable, '1'); ?> />
                    </div>
                </div>
                <div class="fsdt-field-wrap fsdt-wp-editor-block">
                    <label>
                        <?php esc_html_e('Tab Content', 'floating-side-tab'); ?>
                    </label>
                    <div class="fsdt-field">
                        <div class="fsdt-wp-editor-append fsdt-editor-wrap-<?php echo esc_attr($field_key); ?>">

                            <?php

                            if ($field_key != '{{data.icon_key}}') {
                                $editor_id = 'editor_' . $field_key;
                                $settings = array(
                                    'media_buttons' => true,
                                    'textarea_rows' => 6,
                                    'textarea_name' => 'fsdt_settings[menu][' . $field_key . '][custom_html]'
                                );

                                wp_editor(wp_kses_post($html), $editor_id, $settings);
                            }

                            ?>

                        </div>
                        <p class="description">
                            <?php esc_html_e('You can also enter any shortcode which will get executed inside the tab.', 'floating-side-tab'); ?>
                        </p>
                    </div>
                </div>
            </div>
            <h2><?php esc_html_e('Customization', 'floating-side-tab'); ?></h2>
            <div class="fsdt-field-wrap">
                <label>
                    <?php esc_html_e('Enable', 'floating-side-tab'); ?>
                </label>
                <div class="fsdt-field">
                    <input type="checkbox" class="fsdt-each-customize-status" name="<?php echo esc_attr($field_name_prefix); ?>[each_customize_status]" value="1" <?php checked($tab_each_customize, '1'); ?>>
                </div>
            </div>
            <div class="fsdt-each-customize <?php $this->display_none($tab_each_customize, '1'); ?>">
                <div class="fsdt-field-wrap">
                    <label for="">
                        <?php esc_html_e('Icon Background', 'floating-side-tab'); ?>
                    </label>
                    <div class="fsdt-field">
                        <input type="text" name="<?php echo esc_attr($field_name_prefix); ?>[tab_bg_color]" class="fsdt-form-field fsdt-colorpicker" value="<?php echo esc_attr($tab_bg_color); ?>" />
                    </div>
                </div>
                <div class="fsdt-field-wrap">
                    <label for="">
                        <?php esc_html_e('Icon Color', 'floating-side-tab'); ?>
                    </label>
                    <div class="fsdt-field">
                        <input type="text" name="<?php echo esc_attr($field_name_prefix); ?>[tab_text_color]" class="fsdt-form-field fsdt-colorpicker" value="<?php echo esc_attr($tab_text_color); ?>" />
                    </div>
                </div>
                <div class="fsdt-field-wrap fsdt-tab-type-block <?php $this->display_none($selected_menu_type, 'tab'); ?>">
                    <label for="">
                        <?php esc_html_e('Tab Height', 'floating-side-tab'); ?>
                    </label>
                    <div class="fsdt-field">
                        <input type="text" name="<?php echo esc_attr($field_name_prefix); ?>[tab_height]" class="fsdt-form-field" value="<?php echo esc_attr($tab_height); ?>" />
                        <p class="description">
                            <?php esc_html_e('Eg: 500px', 'floating-side-tab'); ?>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>