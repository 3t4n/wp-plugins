<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://continual.ly/
 * @since      1.3.0
 *
 * @package    Continually
 * @subpackage Continually/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap continually_options">

    <h2><?php echo esc_html(get_admin_page_title()); ?></h2>

    <form method="post" name="continually_options" action="options.php">

        <?php settings_fields($this->plugin_name); ?>

        <?php
        // Grab all options
        $options = get_option($this->plugin_name);

        $continually_enabled = $options ? $options['continually_enabled'] : false;
        $continually_embed_code = $options ? $options['continually_embed_code'] : false;
        ?>

        <?php
        settings_fields($this->plugin_name);
        do_settings_sections($this->plugin_name);
        ?>
        <div class="<?php echo esc_html($this->plugin_name); ?>-intro">
            <p>A <a href="http://continual.ly" target="_blank">Continually</a> account is required to use this plugin</p>
        </div>

        <fieldset class="<?php echo esc_html($this->plugin_name); ?>-continually_enabled">
            <legend class="screen-reader-text"><span><?php _e('Enable Continually on your Website', 'continually'); ?></span></legend>
            <label for="<?php echo esc_html($this->plugin_name); ?>-continually_enabled">
                <input type="checkbox" id="<?php echo esc_html($this->plugin_name); ?>-continually_enabled" name="<?php echo esc_html($this->plugin_name); ?>[continually_enabled]" value="1" <?php checked($continually_enabled, 1); ?> />
                <span><?php esc_attr_e('Enable Continually on your Website', 'continually'); ?></span>
            </label>
        </fieldset>
        <fieldset class="<?php echo esc_html($this->plugin_name); ?>-continually_embed_code">
            <legend class="screen-reader-text"><span><?php _e('Add your Continually embed code', 'continually'); ?></span></legend>
            <label for="<?php echo esc_html($this->plugin_name); ?>-continually_embed_code">
                <span><?php esc_attr_e('Your Continually embed code', 'continually'); ?></span>
            </label>
            <p class="form-help"><span class="description">You can find your <a href="https://app.continual.ly/embed-code" target="_blank">Continually embed code here</a>.</span></p>
            <textarea id="<?php echo esc_html($this->plugin_name); ?>-continually_embed_code" name="<?php echo esc_html($this->plugin_name); ?>[continually_embed_code]" cols="80" rows="4" placeholder="<!-- Insert your Continually embed code here -->"><?php if (!empty($continually_embed_code)) echo esc_html($continually_embed_code); ?></textarea>
        </fieldset>

        <?php submit_button(__('Save changes', 'continually'), 'primary', 'submit', TRUE); ?>

    </form>

</div>