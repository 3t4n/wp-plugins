<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://ays-pro.com/
 * @since      1.0.0
 *
 * @package    Ays_Pb
 * @subpackage Ays_Pb/admin/partials
 */
?>
<div class="wrap">

    <h1 class="ays-popup-box-menu-title"><?php echo esc_html(get_admin_page_title()); ?></h1>

    <!--<p>To show your popup please add <strong>[ays-pb]</strong> to your post/page content</p>-->
    <div class="ays-popup-wrapper">
        <form method="post" name="popup_attributes" action="options.php">
            <?php
                $options = get_option($this->plugin_name);
                $shortcode = $options['shortcode'];
                $width = $options['width'];
                $height = $options['height'];
                $popup_title = $options['popup_title'];
                $popup_description = $options['popup_description'];

                settings_fields( $this->plugin_name );

                do_settings_sections( $this->plugin_name );
            ?>
            <fieldset>
                <legend class="screen-reader-text"><span>PopupBox Title</span></legend>
                <label for="<?php echo $this->plugin_name; ?>-popup_title" class="popup_attribute_label">
                    <span><?php esc_attr_e('PopupBox Title', $this->plugin_name); ?></span>
                    <input type="text" id="<?php echo $this->plugin_name; ?>-popup_title"  class="popup_attribute_input" name="<?php echo $this->plugin_name; ?>[popup_title]" value="<?php echo $popup_title; ?>" />
                </label>
            </fieldset>
            <fieldset>
                <legend class="screen-reader-text"><span>PopupBox Description</span></legend>
                <label for="<?php echo $this->plugin_name; ?>-popup_description" class="popup_attribute_label">
                    <span><?php esc_attr_e('PopupBox Description', $this->plugin_name); ?></span>
                    <textarea id="<?php echo $this->plugin_name; ?>-popup_description"  class="popup_attribute_input" name="<?php echo $this->plugin_name; ?>[popup_description]"><?php echo $popup_description; ?></textarea>
                </label>
            </fieldset>
            <fieldset>
                <legend class="screen-reader-text"><span>Width</span></legend>
                <label for="<?php echo $this->plugin_name; ?>-width" class="popup_attribute_label">
                    <span><?php esc_attr_e('Width', $this->plugin_name); ?></span>
                    <input type="number" id="<?php echo $this->plugin_name; ?>-width"  class="popup_attribute_input" name="<?php echo $this->plugin_name; ?>[width]" value="<?php echo $width; ?>" />
                </label>
            </fieldset>
            <fieldset>
                <legend class="screen-reader-text"><span>Height</span></legend>
                <label for="<?php echo $this->plugin_name; ?>-height" class="popup_attribute_label">
                    <span><?php esc_attr_e('Height', $this->plugin_name); ?></span>
                    <input type="number" id="<?php echo $this->plugin_name; ?>-height"  class="popup_attribute_input" name="<?php echo $this->plugin_name; ?>[height]" value="<?php echo $height; ?>" />
                </label>
            </fieldset>

            <fieldset>
                <legend class="screen-reader-text"><span>Shortcode</span></legend>
                <label for="<?php echo $this->plugin_name; ?>-shortcode" class="popup_attribute_label">
                    <span><?php esc_attr_e('Shortcode', $this->plugin_name); ?></span>
                    <input type="text" id="<?php echo $this->plugin_name; ?>-shortcode"  class="popup_attribute_input" name="<?php echo $this->plugin_name; ?>[shortcode]" value="<?php echo $shortcode; ?>" />
                </label>
            </fieldset>
            <?php submit_button('Save all changes', 'primary','submit', TRUE); ?>
        </form>
    </div>
</div>