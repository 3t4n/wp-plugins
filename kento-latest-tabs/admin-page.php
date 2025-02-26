<?php

if( !defined( 'ABSPATH' ) ){
    exit;
}

if (isset($_POST['oscimp_hidden']) && $_POST['oscimp_hidden'] == 'Y') {
    // Form data sent
    $active_color = $_POST['kento_latest_tabs_active'] ?? '';
    update_option('kento_latest_tabs_active', $active_color);

    $hover_color = $_POST['kento_latest_tabs_hover'] ?? '';
    update_option('kento_latest_tabs_hover', $hover_color);

    $kento_thumb_style = stripslashes_deep($_POST['kento_thumb_style'] ?? '');
    update_option('kento_thumb_style', $kento_thumb_style);

    $pop_title = $_POST['kento_latest_tabs_pop_title'] ?? '';
    update_option('kento_latest_tabs_pop_title', $pop_title);

    $rp_title = $_POST['kento_latest_tabs_rp_title'] ?? '';
    update_option('kento_latest_tabs_rp_title', $rp_title);

    $lc_title = $_POST['kento_latest_tabs_lc_title'] ?? '';
    update_option('kento_latest_tabs_lc_title', $lc_title);

    echo '<div class="updated"><p><strong>' . __('Changes Saved.') . '</strong></p></div>';
} else {
    // Normal page display
	$active_color      = get_option('kento_latest_tabs_active', '');
	$hover_color       = get_option('kento_latest_tabs_hover', '');
	$kento_thumb_style = get_option('kento_thumb_style', '');
	$pop_title         = get_option('kento_latest_tabs_pop_title', '');
	$rp_title          = get_option('kento_latest_tabs_rp_title', '');
	$lc_title          = get_option('kento_latest_tabs_lc_title', '');
}
?>
<div class="wrap">
    <div id="icon-tools" class="icon32"></div>
    <h2><?php echo __('Kento Latest Tabs Settings', 'kento-latest-tabs' ); ?></h2>
    <form name="kento_latest_tabs" method="post" action="">
        <input type="hidden" name="oscimp_hidden" value="Y">
        <?php 
        settings_fields('kento_highlight_plugin_options'); 
        do_settings_sections('kento_highlight_plugin_options'); 
        ?>

        <table class="form-table">
            <tr valign="top">
                <th scope="row"><label for="pop_title"><?php echo __('Title for Popular Posts Tab', 'kento-latest-tabs' ); ?>:</label></th>
                <td><input name="kento_latest_tabs_pop_title" id="pop_title" type="text" value="<?php echo esc_attr($pop_title); ?>" /><span> Example: 'Popular'.</span></td>
            </tr>

            <tr valign="top">
                <th scope="row"><label for="rp_title"><?php echo __('Title for Recent Posts Tab', 'kento-latest-tabs'); ?>:</label></th>
                <td><input name="kento_latest_tabs_rp_title" id="rp_title" type="text" value="<?php echo esc_attr($rp_title); ?>" /><span> Example: 'Recent'.</span></td>
            </tr>

            <tr valign="top">
                <th scope="row"><label for="lc_title"><?php echo __('Title for Latest Comments Tab', 'kento-latest-tabs'); ?>:</label></th>
                <td><input name="kento_latest_tabs_lc_title" id="lc_title" type="text" value="<?php echo esc_attr($lc_title); ?>" /><span> Example: 'Comments'.</span></td>
            </tr>

            <tr valign="top">
                <th scope="row"><label for="active-color"><?php echo __('Active Tab\'s Background Color', 'kento-latest-tabs'); ?>:</label></th>
                <td><input name="kento_latest_tabs_active" id="active-color" type="text" value="<?php echo esc_attr($active_color); ?>" /></td>
            </tr>

            <tr valign="top">
                <th scope="row"><label for="hover-color"><?php echo __('Tabs Hover Color', 'kento-latest-tabs'); ?>:</label></th>
                <td><input name="kento_latest_tabs_hover" id="hover-color" type="text" value="<?php echo esc_attr($hover_color); ?>" /></td>
            </tr>

            <tr valign="top">
                <th scope="row"><label for="kento_thumb_style"><?php echo __('Thumbnails Style', 'kento-latest-tabs'); ?>:</label></th>
                <td>
                    <select name="kento_thumb_style">
                        <option value="1" <?php selected($kento_thumb_style, '1'); ?>><?php echo __('Square Style', 'kento-latest-tabs'); ?></option>
                        <option value="2" <?php selected($kento_thumb_style, '2'); ?>><?php echo __('Round Style', 'kento-latest-tabs'); ?></option>
                    </select><br />
                    <span><?php echo __('Choose Latest Tab Thumbnails Style.', 'kento-latest-tabs'); ?></span>
                </td>
            </tr>
        </table>

        <p class="submit">
            <input class="button button-primary" type="submit" name="Submit" value="<?php _e('Save Changes') ?>" />
        </p>
    </form>
</div>