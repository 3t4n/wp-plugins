<div class="postbox">
    <table class="form-table">
        <tbody>
        <tr valign="top">
            <th scope="row" colspan="2"><h3><?php esc_html_e('Privacy and Data Protection', 'rankology-stats'); ?></h3></th>
        </tr>

        <tr valign="top">
            <th scope="row">
                <label for="hash_ips"><?php esc_html_e('Hash IP Addresses:', 'rankology-stats'); ?></label>
            </th>
            <td>
                <input id="hash_ips" type="checkbox" value="1" name="rkns_hash_ips" <?php echo RANKOLOGY_STATS\Option::get('hash_ips') == true ? "checked='checked'" : ''; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
                <label for="hash_ips"><?php esc_html_e('Enable', 'rankology-stats'); ?></label>
                <p class="description"><?php echo __('By enabling this option, you cannot recover the IP addresses in the future to find out location information.', 'rankology-stats'); ?></p>
            </td>
        </tr>

        <tr valign="top">
            <th scope="row">
                <label for="anonymize_ips"><?php esc_html_e('Anonymize IP Addresses:', 'rankology-stats'); ?></label>
            </th>
            <td>
                <input id="anonymize_ips" type="checkbox" value="1" name="rkns_anonymize_ips" <?php echo RANKOLOGY_STATS\Option::get('anonymize_ips') == true ? "checked='checked'" : ''; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
                <label for="anonymize_ips"><?php esc_html_e('Enable', 'rankology-stats'); ?></label>
                <p class="description"><?php echo __('This option anonymize the user IP address because of the data privacy & GDPR.', 'rankology-stats'); ?></p>
            </td>
        </tr>

        <tr valign="top">
            <th scope="row">
                <label for="do_not_track"><?php esc_html_e('Do Not Track:', 'rankology-stats'); ?></label>
            </th>

            <td>
                <input id="do_not_track" type="checkbox" value="1" name="rkns_do_not_track" <?php echo RANKOLOGY_STATS\Option::get('do_not_track') == true ? "checked='checked'" : ''; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
                <label for="do_not_track"><?php esc_html_e('Enable', 'rankology-stats'); ?></label>
                <p class="description"><?php esc_html_e("Enabling this means that the plugin will not collect or store any data about the user's visits to your website.", 'rankology-stats'); ?></p>
            </td>
        </tr>

        <tr valign="top">
            <th scope="row">
                <label for="store_ua"><?php esc_html_e('Store Entire User Agent String:', 'rankology-stats'); ?></label>
            </th>

            <td>
                <input id="store_ua" type="checkbox" value="1" name="rkns_store_ua" <?php echo RANKOLOGY_STATS\Option::get('store_ua') == true ? "checked='checked'" : ''; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
                <label for="store_ua"><?php esc_html_e('Enable', 'rankology-stats'); ?></label>
                <p class="description"><?php esc_html_e('Only enable it for debugging. If the IP hashes are enabled, this option will be disabled automatically.', 'rankology-stats'); ?></p>
            </td>
        </tr>

        </tbody>
    </table>
</div>

<?php submit_button(__('Update', 'rankology-stats'), 'primary', 'submit', '', array('OnClick' => "var rknsCurrentTab = getElementById('rkns_current_tab'); rknsCurrentTab.value='privacy-settings'")); ?>
