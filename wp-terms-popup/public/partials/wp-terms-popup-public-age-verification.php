<?php
/**
 * Provide a dropdown view for the plugin.
 *
 * @link       https://linksoftwarellc.com
 * @since      1.0.0
 *
 * @package    Wp_Terms_Popup_Age
 * @subpackage Wp_Terms_Popup_Age/public/partials
 */
?>
<table class="wptpa-dropdowns">
    <?php if (isset($terms_age_message) && !empty($terms_age_message)) : ?>
    <tr>
        <td colspan="<?php echo count($columns); ?>">
            <div class="wpta-age-verification-message"><?php echo $terms_age_message; ?></div>
        </td>
    </tr>
    <?php endif; ?>
    <tr>
        <?php foreach ($columns as $df => $column) : ?>
        <td>
            <div class="wpta-dropdown-label"><?php echo $column['label']; ?></div>
            <select id="wptpa-<?php echo $df; ?>" name="wp_term_popup_dob_<?php echo $df; ?>" class="wptpa-dropdown" data-target="<?php echo $column['target']; ?>">
                <option value=""></option>
                <?php foreach ($column['options'] as $option) : ?>
                <option value="<?php echo $option['value']; ?>"><?php echo $option['label']; ?></option>
                <?php endforeach; ?>
            </select>
        </td>
        <?php endforeach; ?>
    </tr>
</table>