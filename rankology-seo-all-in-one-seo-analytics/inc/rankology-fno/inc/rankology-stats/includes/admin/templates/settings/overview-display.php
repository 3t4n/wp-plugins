<?php
// Only display the global options if the user is an administrator.
if ($rkns_admin) {
    ?>
    <div class="postbox">
        <table class="form-table">
            <tbody>

            <tr valign="top">
                <td scope="row" colspan="2"><?php esc_html_e('The following items are global to all users.',
                        'rankology-stats'); ?></td>
            </tr>

            <tr valign="top">
                <th scope="row" colspan="2"><h3><?php esc_html_e('Dashboard', 'rankology-stats'); ?></h3></th>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <label for="disable-map"><?php esc_html_e('Dashboard Widgets:', 'rankology-stats'); ?></label>
                </th>

                <td>
                    <input id="disable-dashboard" type="checkbox" value="1" name="rkns_disable_dashboard" <?php echo RANKOLOGY_STATS\Option::get('disable_dashboard') == true ? "checked='checked'" : ''; ?>>
                    <label for="disable-dashboard"><?php esc_html_e('Disable', 'rankology-stats'); ?></label>
                    <p class="description"><?php esc_html_e('This option will disable dashboard widgets.',
                            'rankology-stats'); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row" colspan="2"><h3><?php esc_html_e('Map', 'rankology-stats'); ?></h3></th>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <label for="disable-map"><?php esc_html_e('Map Display:', 'rankology-stats'); ?></label>
                </th>

                <td>
                    <input id="disable-map" type="checkbox" value="1" name="rkns_disable_map" <?php echo RANKOLOGY_STATS\Option::get('disable_map') == true ? "checked='checked'" : ''; ?>>
                    <label for="disable-map"><?php esc_html_e('Disable', 'rankology-stats'); ?></label>
                    <p class="description"><?php esc_html_e('This option will disable the map display.',
                            'rankology-stats'); ?></p>
                </td>
            </tr>

            </tbody>
        </table>
    </div>
    <?php
}

submit_button(__('Update', 'rankology-stats'), 'primary', 'submit', '', array('OnClick' => "var rknsCurrentTab = getElementById('rkns_current_tab'); rknsCurrentTab.value='overview-display-settings'")); ?>
