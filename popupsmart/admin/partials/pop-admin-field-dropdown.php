<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://popupsmart.com
 * @since      1.0.0
 *
 * @package    Pop
 * @subpackage Pop/admin/partials
 */

?>
<select style="height:40px" class="<?php echo esc_attr($atts['class']); ?>" id="<?php echo esc_attr($atts['id']); ?>" name="<?php echo esc_attr($atts['name']); ?>">
    <?php foreach ($atts['options'] as $value) { ?>
        <option <?php echo $atts['value'] == $value ?  'selected' :  '' ?> value="<?php echo $value; ?>"><?php echo $value; ?></option>
    <?php } ?>
</select>

<?php
