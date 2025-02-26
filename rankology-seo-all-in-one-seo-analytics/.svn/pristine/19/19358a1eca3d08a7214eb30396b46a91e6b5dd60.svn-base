<div class="postbox">
    <table class="form-table">
        <tbody>
        <tr valign="top">
            <th scope="row" colspan="2"><h3><?php esc_html_e('Rankology Stats Reset Options', 'rankology-stats'); ?></h3></th>
        </tr>

        <tr valign="top">
            <th scope="row">
                <label for="reset-plugin"><?php esc_html_e('Reset Options:', 'rankology-stats'); ?></label>
            </th>

            <td>
                <input id="reset-plugin" type="checkbox" name="rkns_reset_plugin">
                <label for="reset-plugin"><?php esc_html_e('Reset', 'rankology-stats'); ?></label>
                <p class="description"><?php esc_html_e('Reset all the options to default. Resetting the options will remove all user and global settings but will keep all other data. This action cannot be undone. Note: For multisite installs, this will reset all sites to the default settings.', 'rankology-stats'); ?></p>
            </td>
        </tr>
        </tbody>
    </table>
</div>

<?php submit_button(__('Update', 'rankology-stats'), 'primary', 'submit', '', array('OnClick' => "var rknsCurrentTab = getElementById('rkns_current_tab'); rknsCurrentTab.value='reset-settings'")); ?>
