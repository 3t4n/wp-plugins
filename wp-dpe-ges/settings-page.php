<?php
add_filter( 'plugin_action_links_wp-dpe-ges/wp-dpe-ges.php', 'wpdpeges_settings_link' );
function wpdpeges_settings_link( $links_array ){
	array_unshift( $links_array, '<a href="'.menu_page_url( 'wpdpeges', false ).'">'.__('Settings', 'wpdpeges').'</a>' );
	return $links_array;
}

add_action('admin_menu', 'wpdpeges_register_options_page');
function wpdpeges_register_options_page() {
    add_options_page('DPE / GES Settings', 'DPE / GES', 'manage_options', 'wpdpeges', 'wpdpeges_admin_settings');
}

function wpdpeges_admin_settings(){
    // Set and process settings in the Dashboard
    if (!current_user_can('manage_options', __CLASS__)){
        wp_die(__('You do not have sufficient permissions to access this page.', 'wpdpeges'));
    }
    
    ?>
<div class="wrap banner">
	<h1>DPE / GES</h1>
    <div id="shortcodes" class="section">
        <h2><?php echo __('Shortcodes', 'wpdpeges'); ?></h2>
        <table class="form-table">
            <tr>
                <th><?php echo __('DPE/GES', 'wpdpeges'); ?></th>
                <td><input name="shortcode[]" style="width:100%" class="shortcode" type="text" value='[dpeges dpe_value="256" ges_value="27" inline="true"]' readonly></td>
            </tr>
            <tr>
                <th><?php echo __('DPE/GES with meta key', 'wpdpeges'); ?></th>
                <td><input name="shortcode[]" style="width:100%" class="shortcode" type="text" value='[dpeges dpe_meta_key="custom_dpe" ges_meta_key="custom_ges" inline="true"]' readonly></td>
            </tr>
            <tr>
                <th><?php echo __('DPE/GES Not subject to diagnostic', 'wpdpeges'); ?></th>
                <td><input name="shortcode[]" style="width:100%" class="shortcode" type="text" value='[dpeges not_subject="true"]' readonly></td>
            </tr>
            <tr>
                <th><?php echo __('DPE/GES Not subject to diagnostic with meta key (must return a boolean)', 'wpdpeges'); ?></th>
                <td><input name="shortcode[]" style="width:100%" class="shortcode" type="text" value='[dpeges not_subject="custom_field"]' readonly></td>
            </tr>
            <tr>
                <th><?php echo __('DPE/GES : diagnostic date', 'wpdpeges'); ?></th>
                <td><input name="shortcode[]" style="width:100%" class="shortcode" type="text" value='[dpeges date_diagnostic="2021-07-01" OU date_diagnostic_meta_key="custom_field"]' readonly></td>
            </tr>
            <tr>
                <th><?php echo __('DPE/GES : surface, altitude and climate zone', 'wpdpeges'); ?></th>
                <td><input name="shortcode[]" style="width:100%" class="shortcode" type="text" value='[dpeges surface_value="80" OU surface_meta_key="custom_field" altitude_value="900" OU altitude_meta_key="custom_field" zone_climatique_value="H1b" OU zone_climatique_meta_key="custom_field"]' readonly></td>
            </tr>
            </table>
    </div>
<?php

}