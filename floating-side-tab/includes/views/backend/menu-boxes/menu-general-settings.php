<?php
defined('ABSPATH') or die('No script kiddies please!!');
?>
<div class="fsdt-settings-section fsdt-form-flx" data-settings-ref="general">
    <div class="fsdt-form-left">
        <div class="fsdt-field-wrap">
            <label>
                <?php esc_html_e('Menu Title', 'floating-side-tab'); ?>
            </label>
            <div class="fsdt-field fsdt-checkbox-toggle">
                <input name="menu_title" type="text"
                    value="<?php echo !empty($menu_title) ? esc_attr($menu_title) : '' ?>" required="required" />
            </div>
        </div>
        <div class="fsdt-field-wrap fsdt-field-hide">
            <label>
                <?php esc_html_e('Select Icon', 'floating-side-tab'); ?>
            </label>
            <div class="fsdt-field fsdt-checkbox-toggle">
                <div id="fsdt-universal-icon-selector" title="Open the icon picker"></div>
            </div>
        </div>
        <div class="fsdt-field-wrap">
            <label>
                <?php esc_html_e('Menu Items', 'floating-side-tab'); ?>
            </label>
            <div class="fsdt-field fsdt-menu-items-field">
                <div class="fsdt-icon-block fsdt-icon-sortable">
                    <?php
                    if (!empty($fsdt_menu_settings['menu'])) {
                        foreach ($fsdt_menu_settings['menu'] as $menu_key => $menu_settings) {
                            $field_key = $menu_key;

                            include(FSDT_PATH . '/includes/views/backend/js-templates/icon-template.php');
                        }
                    } else {
                        $field_key = '';
                    }
                    ?>
                </div>
                <a href="javascript:void(0);" class="fsdt-add-new-icon fsdt-btn-secondary">
                    <?php esc_html_e('Add New Menu Item', 'floating-side-tab'); ?>
                </a>
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