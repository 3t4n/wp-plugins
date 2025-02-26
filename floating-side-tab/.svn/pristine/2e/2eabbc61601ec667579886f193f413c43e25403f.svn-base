<?php
defined('ABSPATH') or die('No script kiddies please!!');
$selected_icon_animation = (!empty($fsdt_menu_settings['layout']['icon_animation'])) ? $fsdt_menu_settings['layout']['icon_animation'] : 'fsdt-animate-none';
$selected_menu_position = (!empty($fsdt_menu_settings['layout']['menu_position'])) ? esc_attr($fsdt_menu_settings['layout']['menu_position']) : 'fsdt-left';
$selected_menu_templates = (!empty($fsdt_menu_settings['layout']['menu_templates'])) ? esc_attr($fsdt_menu_settings['layout']['menu_templates']) : 'template-1';
$hide_in_mobile = (!empty($fsdt_menu_settings['layout']['hide_mobile'])) ? esc_attr($fsdt_menu_settings['layout']['hide_mobile']) : '';
?>
<div class="fsdt-settings-section fsdt-form-flx" data-settings-ref="layout" style="display:none;" <?php echo selected($selected_menu_position, 'top_left'); ?>>
    <div class="fsdt-form-left">
        <div class="fsdt-field-wrap fsdt-field-hide">
            <label>
                <?php esc_html_e('Menu Positions', 'floating-side-tab'); ?>
            </label>
            <div class="fsdt-field">
                <select name="fsdt_settings[layout][menu_position]" class="fsdt-select-option">
                    <option value="fsdt-left" <?php echo selected($selected_menu_position, 'fsdt-left'); ?>>
                        <?php esc_html_e('Mid Left', 'floating-side-tab'); ?>
                    </option>
                    <option value="fsdt-right" <?php echo selected($selected_menu_position, 'fsdt-right'); ?>>
                        <?php esc_html_e('Mid Right', 'floating-side-tab'); ?>
                    </option>

                </select>
            </div>
        </div>
        <div class="fsdt-field-wrap">
            <label>
                <?php esc_html_e('Menu Positions', 'floating-side-tab'); ?>
            </label>
            <div class="fsdt-field fsdt-high-width">
                <div class="position-image-flex">
                    <div class="fsdt-position-image">
                        <label>
                            <div class="fsdt-position-image-wrap fsdt-position-select <?php echo $selected_menu_position == 'fsdt-left' ? 'fsdt-selected' : ''; ?>">
                                <img src="<?php echo FSDT_URL . '/images/positions/left-tab.png' ?>" data-postion="fsdt-left" />
                            </div>
                            <span>Mid Left Tab</span>
                        </label>
                    </div>
                    <div class="fsdt-position-image">
                        <label>
                            <div class="fsdt-position-image-wrap fsdt-position-select <?php echo $selected_menu_position == 'fsdt-right' ? 'fsdt-selected' : ''; ?>">
                                <img src="<?php echo FSDT_URL . '/images/positions/right-tab.png' ?>" data-postion="fsdt-right" />
                            </div>
                            <span>Mid Right Tab</span>
                        </label>
                    </div>
                    <div class="fsdt-position-image fsdt-pro-icon ">
                        <label>
                            <div class="fsdt-position-image-wrap fsdt-disable">
                                <img src="<?php echo FSDT_URL . '/images/positions/top-left-tab.png' ?>" />
                            </div>
                            <span>Top Left Tab</span>
                        </label>
                    </div>
                    <div class="fsdt-position-image fsdt-pro-icon">
                        <label>
                            <div class="fsdt-position-image-wrap fsdt-disable">
                                <img src="<?php echo FSDT_URL . '/images/positions/top-Right-tab.png' ?>" />
                            </div>
                            <span>Top Right Tab</span>
                        </label>
                    </div>
                    <div class="fsdt-position-image fsdt-pro-icon">
                        <label>
                            <div class="fsdt-position-image-wrap fsdt-disable">
                                <img src="<?php echo FSDT_URL . '/images/positions/btm-left-tab.png' ?>" />
                            </div>
                            <span>Bottom Left Tab</span>
                        </label>
                    </div>
                    <div class="fsdt-position-image fsdt-pro-icon">
                        <label>
                            <div class="fsdt-position-image-wrap fsdt-disable">
                                <img src="<?php echo FSDT_URL . '/images/positions/btm-right-tab.png' ?>" />
                            </div>
                            <span>Bottom Right Tab</span>
                        </label>
                    </div>
                </div>

            </div>

        </div>
        <div class="fsdt-field-wrap ">
            <label>
                <?php esc_html_e('Menu Templates', 'floating-side-tab'); ?>
            </label>
            <div class="fsdt-field">
                <select name="fsdt_settings[layout][menu_templates]" class="fsdt-template-dropdown fsdt-select-option">

                    <?php for ($i = 1; $i <= 8; $i++) {
                    ?>
                        <option value="template-<?php echo esc_attr($i); ?>" <?php echo selected($selected_menu_templates, 'template-' . $i); ?>>
                            <?php esc_html_e('Template', 'floating-side-tab'); ?>
                            <?php echo esc_html($i); ?>
                        </option>
                    <?php } ?>
                </select>
                <div class="fsdt-template-preview-wrap">
                    <?php for ($i = 1; $i <= 8; $i++) {
                    ?>
                        <div class="fsdt-each-template-preview-wrap" <?php if ('template-' . $i != $selected_menu_templates) { ?>style="display:none" <?php } ?> data-template-ref="template-<?php echo intval($i); ?>"><img
                                src="<?php echo esc_url(FSDT_IMG_DIR . '/template-' . $i . '.png'); ?>" /></div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="fsdt-field-wrap">
            <label class="fsdt-pro-label">
                <?php esc_html_e('Template Available in Pro Version', 'floating-side-tab'); ?>
            </label>
            <div class="fsdt-field fsdt-high-width">
                <div class="position-image-flex fsdt-preview-scroll">
                    <div class="fsdt-template-image fsdt-pro-icon">
                        <label>
                            <div class="fsdt-template-image-wrap fsdt-disable">
                                <img src="<?php echo FSDT_URL . '/images/pro-template/template-9.png' ?>" />
                                <span class="fsdt-template-span">Template-9</span>
                            </div>
                        </label>
                    </div>
                    <div class="fsdt-template-image fsdt-pro-icon">
                        <label>
                            <div class="fsdt-template-image-wrap fsdt-disable">
                                <img src="<?php echo FSDT_URL . '/images/pro-template/template-10.png' ?>" />
                                <span class="fsdt-template-span">Template-10</span>
                            </div>
                        </label>
                    </div>
                    <div class="fsdt-template-image fsdt-pro-icon ">
                        <label>
                            <div class="fsdt-template-image-wrap fsdt-disable">
                                <img src="<?php echo FSDT_URL . '/images/pro-template/template-11.png' ?>" />
                                <span class="fsdt-template-span">Template-11</span>
                            </div>
                        </label>
                    </div>
                    <div class="fsdt-template-image fsdt-pro-icon">
                        <label>
                            <div class="fsdt-template-image-wrap fsdt-disable">
                                <img src="<?php echo FSDT_URL . '/images/pro-template/template-12.png' ?>" />
                                <span class="fsdt-template-span">Template-12</span>
                            </div>
                        </label>
                    </div>
                    <div class="fsdt-template-image fsdt-pro-icon">
                        <label>
                            <div class="fsdt-template-image-wrap fsdt-disable">
                                <img src="<?php echo FSDT_URL . '/images/pro-template/template-13.png' ?>" />
                                <span class="fsdt-template-span">Template-13</span>
                            </div>
                        </label>
                    </div>
                    <div class="fsdt-template-image fsdt-pro-icon">
                        <label>
                            <div class="fsdt-template-image-wrap fsdt-disable">
                                <img src="<?php echo FSDT_URL . '/images/pro-template/template-14.png' ?>" />
                                <span class="fsdt-template-span">Template-14</span>
                            </div>
                        </label>
                    </div>
                    <div class="fsdt-template-image fsdt-pro-icon">
                        <label>
                            <div class="fsdt-template-image-wrap fsdt-disable">
                                <img src="<?php echo FSDT_URL . '/images/pro-template/template-15.png' ?>" />
                                <span class="fsdt-template-span">Template-15</span>
                            </div>
                        </label>
                    </div>
                    <div class="fsdt-template-image fsdt-pro-icon">
                        <label>
                            <div class="fsdt-template-image-wrap fsdt-disable">
                                <img src="<?php echo FSDT_URL . '/images/pro-template/template-16.png' ?>" />
                                <span class="fsdt-template-span">Template-16</span>
                            </div>
                        </label>
                    </div>
                    <div class="fsdt-template-image fsdt-pro-icon ">
                        <label>
                            <div class="fsdt-template-image-wrap fsdt-disable">
                                <img src="<?php echo FSDT_URL . '/images/pro-template/template-17.png' ?>" />
                                <span class="fsdt-template-span">Template-17</span>
                            </div>
                        </label>
                    </div>
                    <div class="fsdt-template-image fsdt-pro-icon">
                        <label>
                            <div class="fsdt-template-image-wrap fsdt-disable">
                                <img src="<?php echo FSDT_URL . '/images/pro-template/template-18.png' ?>" />
                                <span class="fsdt-template-span">Template-18</span>
                            </div>
                        </label>
                    </div>
                    <div class="fsdt-template-image fsdt-pro-icon">
                        <label>
                            <div class="fsdt-template-image-wrap fsdt-disable">
                                <img src="<?php echo FSDT_URL . '/images/pro-template/template-19.png' ?>" />
                                <span class="fsdt-template-span">Template-19</span>
                            </div>
                        </label>
                    </div>
                    <div class="fsdt-template-image fsdt-pro-icon">
                        <label>
                            <div class="fsdt-template-image-wrap fsdt-disable">
                                <img src="<?php echo FSDT_URL . '/images/pro-template/template-20.png' ?>" />
                                <span class="fsdt-template-span">Template-20</span>
                            </div>
                        </label>
                    </div>
                    <div class="fsdt-template-image fsdt-pro-icon">
                        <label>
                            <div class="fsdt-template-image-wrap fsdt-disable">
                                <img src="<?php echo FSDT_URL . '/images/pro-template/template-21.png' ?>" />
                                <span class="fsdt-template-span">Template-21</span>
                            </div>
                        </label>
                    </div>
                    <div class="fsdt-template-image fsdt-pro-icon">
                        <label>
                            <div class="fsdt-template-image-wrap fsdt-disable">
                                <img src="<?php echo FSDT_URL . '/images/pro-template/template-22.png' ?>" />
                                <span class="fsdt-template-span">Template-22</span>
                            </div>
                        </label>
                    </div>
                    <div class="fsdt-template-image fsdt-pro-icon">
                        <label>
                            <div class="fsdt-template-image-wrap fsdt-disable">
                                <img src="<?php echo FSDT_URL . '/images/pro-template/template-23.png' ?>" />
                                <span class="fsdt-template-span">Template-23</span>
                            </div>
                        </label>
                    </div>
                    <div class="fsdt-template-image fsdt-pro-icon">
                        <label>
                            <div class="fsdt-template-image-wrap fsdt-disable">
                                <img src="<?php echo FSDT_URL . '/images/pro-template/template-24.png' ?>" />
                                <span class="fsdt-template-span">Template-24</span>
                            </div>
                        </label>
                    </div>

                </div>
            </div>

        </div>
        <div class="fsdt-field-wrap">
            <label></label>
            <div class="fsdt-field fsdt-checkbox-toggle fsdt-high-width fsdt-demo-wrap">
                <a class="fsdt-demo-btn fsdt-btn-secondary" href="<?php echo esc_url(FSDT_DEMO_LINK); ?>?utm_source=fsdt_free&utm_campaign=pro-templates" target="_blank"><?php echo esc_html_e('Checkout Demo Playground','floating-side-tab');?></a>
            </div>
        </div>
        <div class="fsdt-field-wrap fsdt-field-hide">
            <label>
                <?php esc_html_e('Icon Animation', 'floating-side-tab'); ?>
            </label>
            <div class="fsdt-field">
                <select name="fsdt_settings[layout][icon_animation]" class="fsdt-select-option">
                    <option value="fsdt-animate-none" <?php echo selected($selected_icon_animation, 'fsdt-animate-none'); ?>>
                        None
                    </option>
                    <option value="fsdt-animate-slide" <?php echo selected($selected_icon_animation, 'fsdt-animate-slide'); ?>>
                        Slide
                    </option>

                </select>

            </div>
        </div>
        <div class="fsdt-field-wrap">
            <label>
                <?php esc_html_e('Icon Animation Type', 'floating-side-tab'); ?>
            </label>
            <div class="fsdt-field fsdt-high-width-tab">
                <div class="fsdt-tab-flex">
                    <div class="fsdt-tab-animation fsdt-anim-lite fsdt-animation-select <?php echo $selected_icon_animation == 'fsdt-animate-none' ? 'fsdt-animation-selected' : ''; ?> ">
                        <div class="fsdt-anim-content">
                            <i class="fa-solid fa-pen-to-square bcknd-animation" data-animation="fsdt-animate-none"></i>
                            <span>None</span>
                        </div>
                    </div>
                    <div class="fsdt-tab-animation fsdt-anim-lite fsdt-slide fsdt-animation-select <?php echo $selected_icon_animation == 'fsdt-animate-slide' ? 'fsdt-animation-selected' : ''; ?>">
                        <div class="fsdt-anim-content">
                            <i class="fa-solid fa-pen-to-square bcknd-animation" data-animation="fsdt-animate-slide"></i>
                            <span>Slide</span>
                        </div>
                    </div>
                    <div class="fsdt-tab-animation pro-opacity fsdt-spin fsdt-pro-icon">
                        <div class="fsdt-anim-opacity">
                            <div class="fsdt-anim-content">
                                <i class="fa-solid fa-pen-to-square bcknd-animation"></i>
                                <span>Spin</span>
                            </div>
                        </div>
                    </div>
                    <div class="fsdt-tab-animation pro-opacity fsdt-rotate fsdt-pro-icon">
                        <div class="fsdt-anim-opacity">
                            <div class="fsdt-anim-content">
                                <i class="fa-solid fa-pen-to-square bcknd-animation"></i>
                                <span>Rotate</span>
                            </div>
                        </div>
                    </div>
                    <div class="fsdt-tab-animation pro-opacity fsdt-zoom fsdt-pro-icon">
                        <div class="fsdt-anim-opacity">
                            <div class="fsdt-anim-content">
                                <i class="fa-solid fa-pen-to-square bcknd-animation"></i>
                                <span>Zoom</span>
                            </div>
                        </div>
                    </div>
                    <div class="fsdt-tab-animation pro-opacity fsdt-bounce fsdt-pro-icon">
                        <div class="fsdt-anim-opacity">
                            <div class="fsdt-anim-content">
                                <i class="fa-solid fa-pen-to-square bcknd-animation"></i>
                                <span>Bounce</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="fsdt-field-wrap">
            <label></label>
            <div class="fsdt-field fsdt-checkbox-toggle fsdt-high-width fsdt-demo-wrap">
                <a class="fsdt-demo-btn fsdt-btn-secondary" href="<?php echo esc_url(FSDT_DEMO_LINK); ?>?utm_source=fstd_free&utm_campaign=animation" target="_blank"><?php echo esc_html_e('Checkout Demo Playground','floating-side-tab');?></a>
            </div>
        </div>
        <div class="fsdt-field-wrap ">
            <label>
                <?php esc_html_e('Hide in Mobile Device', 'floating-side-tab'); ?>
            </label>

            <div class="fsdt-field fsdt-checkbox-toggle">
                <input type="checkbox" name="fsdt_settings[layout][hide_mobile]" value="fsdt-mob-hide" <?php checked($hide_in_mobile, 'fsdt-mob-hide'); ?> />
                <label></label>
            </div>
        </div>
        <div class="fsdt-field-wrap">

            <div class="fsdt-field-wrap  fsdt-settings-action">
                <label></label>
                <div class="fsdt-field">
                    <input type="submit" class="button-primary"
                        value="<?php esc_html_e('Save Menu', 'floating-side-tab'); ?>" />
                </div>
            </div>
        </div>


    </div>
    <div class="fsdt-form-right">
        <?php
        /**
         * Upgrade Field
         */
        include(FSDT_PATH . '/includes/views/backend/upgrade.php');
        ?>

    </div>

</div>