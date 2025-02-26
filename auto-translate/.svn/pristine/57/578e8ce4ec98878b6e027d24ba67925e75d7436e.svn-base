<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://pampa.dev
 * @since      1.0.0
 *
 * @package    Auto_Translate
 * @subpackage Auto_Translate/admin/partials
 */
$data = $vars['tabs']['advanced_settings'];
?>
<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<table class="form-table">
    <tr valign="top">
        <th scope="row">
            <?php _e('Default Location', 'auto-translate'); ?><br/>
            <small><?php _e('Turn this off if you don\'t want the \'Automatic Translator\' button to be displayed on the top left corner.','auto-translate'); ?></small>
        </th>
        <td colspan="<?=$data['columns']?>">
            <label for="default-location-on"><?php _e('On', 'auto-translate'); ?></label> <input type="radio" id="default-location-on" name="wpat_default_location" value=1 <?php if( $data['wpat_default_location'] ){ echo "checked='checked'"; }; ?>/>
            <label for="default-location-off"><?php _e('Off', 'auto-translate'); ?></label> <input type="radio" id="default-location-off" name="wpat_default_location" value=0 <?php if( !$data['wpat_default_location'] ){ echo "checked='checked'"; }; ?>/>
        </td>
        <td colspan="<?=$data['columns']?>">
            <div class="suggestion">
                <p><?php _e( 'For optimization reasons we suggest you to turn this option <b>Off</b> if you are using a <b>shortcode</b>, <b>menu</b> or a <b>widget</b> to display the translation button.', 'auto-translate' ); ?></p>
            </div>
        </td>
    </tr>
    <tr>
    <th scope="row">
            <?php _e('Show in Menu', 'auto-translate'); ?><br/>
            <small><?php _e('Select the menu where you want the translation button to be displayed','auto-translate'); ?></small>
        </th>
        <td><select id="wpat_show_in_menu" name="wpat_show_in_menu">
                <option value="" selected> - <?php _e('None', 'auto-translate'); ?> - </option>
                <?php $menus = get_registered_nav_menus(); ?>
                <?php foreach($menus as $location => $desc): ?>
                        <option value="<?php echo $location; ?>" <?php if($data['wpat_show_in_menu'] === $location) echo "selected"; ?> > <?= $desc; ?></option>
                <?php endforeach; ?>
            </select></td>
    </tr>
    <tr valign="top">
        <th scope="row" class="admin-shortcode-wrapper">
            <?php _e('Shortcode', 'auto-translate'); ?><br/>
            <small><?php _e('You can use this shortcode to display the translation button in a custom location.', 'auto-translate'); ?></small>
        </th>
        <td colspan="<?=$data['columns']?>" class="admin-shortcode-wrapper">
            <code>[auto_translate_button]</code>
        </td>
    </tr>
    <tr valign="top">
        <th scope="row" class="admin-shortcode-wrapper">
            <?php _e('Widget', 'auto-translate'); ?><br/>
            <small><?php _e('You can use a widget to display the translation button within a widget area.', 'auto-translate'); ?></small>
        </th>
        <td colspan="<?=$data['columns']?>" class="admin-shortcode-wrapper">
        <?php _e('Go to <b>Appearance -> Widgets</b> and look for the <i>"Automatic Translator Button"</i> widget to place it where you need.', 'auto-translate'); ?>
        </td>
    </tr>
    <tr valign="top">
        <th scope="row">
            <?php _e('Auto Translate', 'auto-translate'); ?><br/>
            <small><?php _e('Turn this on if you want the visitors to have the site automatically translated into their host language','auto-translate'); ?></small>
        </th>
        <td colspan="<?=$data['columns']?>">
            <label for="auto-detect-on"><?php _e('On', 'auto-translate'); ?></label> <input type="radio" id="auto-detect-on" name="wpat_auto_detect" value="enabled" <?php if( $data['wpat_auto_detect'] == 'enabled' ){ echo "checked='checked'"; }; ?>/>
            <label for="auto-detect-off"><?php _e('Off', 'auto-translate'); ?></label> <input type="radio" id="auto-detect-off" name="wpat_auto_detect" value="disabled" <?php if( $data['wpat_auto_detect'] == 'disabled' ){ echo "checked='checked'"; }; ?>/>
        </td>
    </tr>
</table>