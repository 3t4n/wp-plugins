<div class="postbox">
    <table class="form-table">
        <tbody>
        <tr valign="top">
            <th scope="row" colspan="2"><h3><?php esc_html_e('Exclude User Roles', 'rankology-stats'); ?></h3></th>
        </tr>
        <?php
        $role_option_list = '';
        foreach (\RANKOLOGY_STATS\User::get_role_list() as $role) {
            $store_name       = 'exclude_' . str_replace(" ", "_", strtolower($role));
            $option_name      = 'rkns_' . $store_name;
            $role_option_list .= $option_name . ',';

            $translated_role_name = translate_user_role($role);
            ?>

            <tr valign="top">
                <th scope="row"><label for="<?php echo esc_attr($option_name); ?>"><?php echo esc_attr($translated_role_name); ?>:</label>
                </th>
                <td>
                    <input id="<?php echo esc_attr($option_name); ?>" type="checkbox" value="1" name="<?php echo esc_attr($option_name); ?>" <?php echo RANKOLOGY_STATS\Option::get($store_name) == true ? "checked='checked'" : ''; ?>><label for="<?php echo esc_attr($option_name); ?>"><?php esc_html_e('Exclude', 'rankology-stats'); ?></label>
                    <p class="description"><?php echo sprintf(__('Exclude %s role from data collection.', 'rankology-stats'), esc_attr($translated_role_name)); ?></p>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<div class="postbox">
    <table class="form-table">
        <tbody>
        <tr valign="top">
            <th scope="row" colspan="2"><h3><?php esc_html_e('IP/Robot Exclusions', 'rankology-stats'); ?></h3></th>
        </tr>

        <tr valign="top">
            <th scope="row"><?php esc_html_e('Robot List:', 'rankology-stats'); ?></th>
            <td>
                    <textarea name="rkns_robotlist" class="code textarea-input-reset" dir="ltr" rows="10" cols="60" id="rkns_robotlist"><?php
                        $robotlist = RANKOLOGY_STATS\Option::get('robotlist');
                        if ($robotlist == '') {
                            $robotlist = RANKOLOGY_STATS\Helper::get_robots_list();
                            update_option('rkns_robotlist', $robotlist);
                        }
                        echo esc_textarea($robotlist);
                        ?>
                    </textarea>
                <p class="description"><?php echo __('It is a list of words - one per line.', 'rankology-stats'); ?></p>
                <a onclick="var rkns_robotlist = getElementById('rkns_robotlist'); rkns_robotlist.value = '<?php echo str_replace(array("\r\n", "\n", "\r"), '\n', esc_html(\RANKOLOGY_STATS\Helper::get_robots_list())); ?>';" class="button"><?php esc_html_e('Reset to Default', 'rankology-stats'); ?></a>
            </td>
        </tr>

        <tr valign="top">
            <th scope="row">
                <label for="force_robot_update"><?php esc_html_e('Force Robot List Update After Upgrades:', 'rankology-stats'); ?></label>
            </th>
            <td>
                <input id="force_robot_update" type="checkbox" value="1" name="rkns_force_robot_update" <?php echo RANKOLOGY_STATS\Option::get('force_robot_update') == true ? "checked='checked'" : ''; ?>><label for="force_robot_update"><?php esc_html_e('Enable', 'rankology-stats'); ?></label>
                <p class="description"><?php echo sprintf(__('Force the robot list to reset itself to the default after Rankology Stats updated. Note that any custom robots added to the list will be lost if this option is enabled.', 'rankology-stats'), $role); ?></p>
            </td>
        </tr>

        <tr valign="top">
            <th scope="row">
                <label for="rkns_robot_threshold"><?php esc_html_e('Robot Visit Threshold:', 'rankology-stats'); ?></label>
            </th>
            <td>
                <input id="rkns_robot_threshold" type="text" size="5" name="rkns_robot_threshold" value="<?php echo esc_attr(RANKOLOGY_STATS\Option::get('robot_threshold')); ?>">
                <p class="description"><?php echo __('Treat visitors with more than this number of visits per day as robots. 0 = disabled.', 'rankology-stats'); ?></p>
            </td>
        </tr>

        <tr valign="top">
            <th scope="row"><?php esc_html_e('Excluded IP Address List:', 'rankology-stats'); ?></th>
            <td>
                <textarea id="rkns_exclude_ip" name="rkns_exclude_ip" rows="5" cols="60" class="code" dir="ltr"><?php echo esc_textarea(RANKOLOGY_STATS\Option::get('exclude_ip')); ?></textarea>
                <p class="description"><?php echo __('You can add a list of IP addresses (one per line) to exclude from the data collection.', 'rankology-stats'); ?></p>
                <?php
                foreach (\RANKOLOGY_STATS\IP::$private_SubNets as $ip) {
                    ?>
                    <a onclick="var rkns_exclude_ip = getElementById('rkns_exclude_ip'); if( rkns_exclude_ip != null ) { rkns_exclude_ip.value = jQuery.trim( rkns_exclude_ip.value + '\n<?php echo esc_attr($ip); ?>' ); }" class="button"><?php esc_html_e('Add', 'rankology-stats'); ?><?php echo esc_attr($ip); ?></a>
                    <?php
                }
                ?>
            </td>
        </tr>

        <tr valign="top">
            <th scope="row"><label for="use_honeypot"><?php esc_html_e('Use Honey Pot:', 'rankology-stats'); ?></label></th>
            <td>
                <input id="use_honeypot" type="checkbox" value="1" name="rkns_use_honeypot" <?php echo RANKOLOGY_STATS\Option::get('use_honeypot') == true ? "checked='checked'" : ''; ?>><label for="rkns_use_honeypot"><?php esc_html_e('Enable', 'rankology-stats'); ?></label>
                <p class="description"><?php echo __('Enable this option for identifying robots by the Honey Pot page.', 'rankology-stats'); ?></p>
            </td>
        </tr>

        <tr valign="top">
            <th scope="row"><label for="honeypot_postid"><?php esc_html_e('Honey Pot Page', 'rankology-stats'); ?></label></th>
            <td>
                <?php wp_dropdown_pages(array('show_option_none' => __('Please select', 'rankology-stats'), 'id' => 'honeypot_postid', 'name' => 'rkns_honeypot_postid', 'selected' => RANKOLOGY_STATS\Option::get('honeypot_postid'))); ?>
                <p class="description"><?php echo __('Select the page for the Honey Pot page or create a new one and then select here.', 'rankology-stats'); ?></p>
            </td>
        </tr>

        <tr valign="top">
            <th scope="row">
                <label for="corrupt_browser_info"><?php esc_html_e('Treat Corrupt Browser Info as a Bot:', 'rankology-stats'); ?></label>
            </th>
            <td>
                <input id="corrupt_browser_info" type="checkbox" value="1" name="rkns_corrupt_browser_info" <?php echo RANKOLOGY_STATS\Option::get('corrupt_browser_info') == true ? "checked='checked'" : ''; ?>><label for="corrupt_browser_info"><?php esc_html_e('Enable', 'rankology-stats'); ?></label>
                <p class="description"><?php echo __('Treat any visitor with corrupt browser info (missing IP address or empty user agent string) as a robot.', 'rankology-stats'); ?></p>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<div class="postbox">
    <table class="form-table">
        <tbody>
        <tr valign="top">
            <th scope="row" colspan="2"><h3><?php esc_html_e('GeoIP Exclusions', 'rankology-stats'); ?></h3></th>
        </tr>

        <tr valign="top">
            <th scope="row"><?php esc_html_e('Excluded Countries:', 'rankology-stats'); ?></th>
            <td>
                <textarea id="rkns_excluded_countries" name="rkns_excluded_countries" rows="5" cols="50" class="code" dir="ltr"><?php echo esc_textarea(RANKOLOGY_STATS\Option::get('excluded_countries')); ?></textarea>
                <p class="description"><?php echo __('Add the country codes (one per line, two letters each) to exclude them from data collection.', 'rankology-stats') . ' ' . __('Use "000" (three zeros) to exclude unknown countries.', 'rankology-stats') . ' ' . sprintf(__('(%1$sList of Country Codes%2$s)', 'rankology-stats'), '<a href="' . esc_url('https://en.wikipedia.org/wiki/List_of_ISO_3166_country_codes') . '" target="_blank">', '</a>'); ?></p>
            </td>
        </tr>

        <tr valign="top">
            <th scope="row"><?php esc_html_e('Included Countries:', 'rankology-stats'); ?></th>
            <td>
                <textarea id="rkns_included_countries" name="rkns_included_countries" rows="5" cols="50" class="code" dir="ltr"><?php echo esc_textarea(RANKOLOGY_STATS\Option::get('included_countries')); ?></textarea>
                <p class="description"><?php echo __('Add the country codes (one per line, two letters each) to include them in data collection.', 'rankology-stats') . ' ' . __('Use "000" (three zeros) to exclude unknown countries.', 'rankology-stats') . ' ' . sprintf(__('(%1$sList of Country Codes%2$s)', 'rankology-stats'), '<a href="' . esc_url('https://en.wikipedia.org/wiki/List_of_ISO_3166_country_codes') . '" target="_blank">', '</a>'); ?></p>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<div class="postbox">
    <table class="form-table">
        <tbody>
        <tr valign="top">
            <th scope="row" colspan="2"><h3><?php esc_html_e('Host Exclusions', 'rankology-stats'); ?></h3></th>
        </tr>

        <tr valign="top">
            <th scope="row"><?php esc_html_e('Excluded Hosts:', 'rankology-stats'); ?></th>
            <td>
                <textarea id="rkns_excluded_hosts" name="rkns_excluded_hosts" rows="5" cols="80" class="code" dir="ltr"><?php echo esc_textarea(RANKOLOGY_STATS\Option::get('excluded_hosts')); ?></textarea>
                <p class="description"><?php echo __('You can add a list of fully qualified host names (i.e. server.example.com, one per line) to exclude from statistics collection.', 'rankology-stats'); ?></p><br>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<div class="postbox">
    <table class="form-table">
        <tbody>
        <tr valign="top">
            <th scope="row" colspan="2"><h3><?php esc_html_e('Site URL Exclusions', 'rankology-stats'); ?></h3></th>
        </tr>

        <tr valign="top">
            <th scope="row"><?php esc_html_e('Excluded Login Page:', 'rankology-stats'); ?></th>
            <td>
                <input id="rkns-exclude-loginpage" type="checkbox" value="1" name="rkns_exclude_loginpage" <?php echo RANKOLOGY_STATS\Option::get('exclude_loginpage') == true ? "checked='checked'" : ''; ?>><label for="rkns-exclude-loginpage"><?php esc_html_e('Exclude', 'rankology-stats'); ?></label>
                <p class="description"><?php esc_html_e('Exclude the login page for registering as a hit.', 'rankology-stats'); ?></p>
            </td>
        </tr>
        <tr valign="top">
            <th scope="row"><?php esc_html_e('Excluded RSS Feeds:', 'rankology-stats'); ?></th>
            <td>
                <input id="rkns-exclude-feeds" type="checkbox" value="1" name="rkns_exclude_feeds" <?php echo RANKOLOGY_STATS\Option::get('exclude_feeds') == true ? "checked='checked'" : ''; ?>><label for="rkns-exclude-feeds"><?php esc_html_e('Exclude', 'rankology-stats'); ?></label>
                <p class="description"><?php esc_html_e('Exclude the RSS feeds for registering as a hit.', 'rankology-stats'); ?></p>
            </td>
        </tr>
        <tr valign="top">
            <th scope="row"><?php esc_html_e('Excluded 404 Pages:', 'rankology-stats'); ?></th>
            <td>
                <input id="rkns-exclude-404s" type="checkbox" value="1" name="rkns_exclude_404s" <?php echo RANKOLOGY_STATS\Option::get('exclude_404s') == true ? "checked='checked'" : ''; ?>><label for="rkns-exclude-404s"><?php esc_html_e('Exclude', 'rankology-stats'); ?></label>
                <p class="description"><?php esc_html_e('Exclude any URL that returns a "404 - Not Found" message.', 'rankology-stats'); ?></p>
            </td>
        </tr>
        <tr valign="top">
            <th scope="row"><?php esc_html_e('Excluded URLs:', 'rankology-stats'); ?></th>
            <td>
                <textarea id="rkns_excluded_urls" name="rkns_excluded_urls" rows="5" cols="80" class="code" dir="ltr"><?php echo esc_textarea(RANKOLOGY_STATS\Option::get('excluded_urls')); ?></textarea>
                <p class="description"><?php echo __('You can add a list of local URLs (i.e.  /wordpress/about), one per line to exclude from collection.', 'rankology-stats'); ?></p><br>
            </td>
        </tr>
        </tbody>
    </table>
</div>

<?php submit_button(__('Update', 'rankology-stats'), 'primary', 'submit', '', array('OnClick' => "var rknsCurrentTab = getElementById('rkns_current_tab'); rknsCurrentTab.value='exclusions-settings'")); ?>