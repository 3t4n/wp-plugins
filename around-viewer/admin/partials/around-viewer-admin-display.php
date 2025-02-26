<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://www.around.media
 * @since      1.0.0
 *
 * @package    Around_Viewer
 * @subpackage Around_Viewer/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">

    <h2><?php echo esc_html(get_admin_page_title()); ?></h2>

    <form method="post" name="viewer_options" action="options.php">

        <?php
            // Load all options
            $options = get_option($this->plugin_name);

            $custom_css = $options['custom_css'];
        ?>

        <?php
            settings_fields($this->plugin_name);
            do_settings_sections($this->plugin_name);
        ?>

        <label for="<?php echo $this->plugin_name; ?>-custom_css" style="display: block"><?php _e('Custom CSS', $this->plugin_name); ?></label>
        <textarea id="<?php echo $this->plugin_name; ?>-custom_css"
                  name="<?php echo $this->plugin_name; ?>[custom_css]"
                  cols="80"
                  rows="10"
                  style="display: block;"><?php if(!empty($custom_css)) echo $custom_css; ?></textarea>

        <?php submit_button(__('Save all', $this->plugin_name), 'primary', 'submit', TRUE); ?>

    </form>
</div>