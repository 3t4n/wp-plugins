<script type="text/javascript">
    function ToggleShowHitsOptions() {
        jQuery('[id^="rkns_show_hits_option"]').fadeToggle();
    }
</script>

<div class="postbox">
    <table class="form-table">
        <tbody>
        <tr valign="top">
            <th scope="row" colspan="2"><h3><?php esc_html_e('Pages and Posts', 'rankology-stats'); ?></h3></th>
        </tr>

        <tr valign="top">
            <th scope="row">
                <label for="pages"><?php esc_html_e('Pages:', 'rankology-stats'); ?></label>
            </th>
            <td>
                <input id="pages" type="checkbox" value="1" name="rkns_pages" <?php echo RANKOLOGY_STATS\Option::get('pages') == true ? "checked='checked'" : ''; ?>>
                <label for="pages"><?php esc_html_e('Enable', 'rankology-stats'); ?></label>
                <p class="description"><?php esc_html_e('Enable this option to count the Pages visits', 'rankology-stats'); ?></p>
            </td>
        </tr>

        <tr valign="top">
            <th scope="row">
                <label for="all_pages"><?php esc_html_e('Track All Pages:', 'rankology-stats'); ?></label>
            </th>
            <td>
                <input id="all_pages" type="checkbox" value="1" name="rkns_track_all_pages" <?php echo RANKOLOGY_STATS\Option::get('track_all_pages') == true ? "checked='checked'" : ''; ?>>
                <label for="all_pages"><?php esc_html_e('Enable', 'rankology-stats'); ?></label>
                <p class="description"><?php esc_html_e('Enable or disable this feature', 'rankology-stats'); ?></p>
                <p class="description"><?php echo sprintf(__('Track all WordPress pages, contains Category, Post Tags, Author, Custom Taxonomy, etc.', 'rankology-stats'), esc_url(admin_url('options-permalink.php'))); ?></p>
            </td>
        </tr>

        <?php
        if (!$disable_strip_uri_parameters) {
            ?>
            <tr valign="top">
                <th scope="row">
                    <label for="strip_uri_parameters"><?php esc_html_e('Strip URL Parameters:', 'rankology-stats'); ?></label>
                </th>

                <td>
                    <input id="strip_uri_parameters" type="checkbox" value="1" name="rkns_strip_uri_parameters" <?php echo RANKOLOGY_STATS\Option::get('strip_uri_parameters') == true ? "checked='checked'" : ''; ?>>
                    <label for="strip_uri_parameters"><?php esc_html_e('Enable', 'rankology-stats'); ?></label>
                    <p class="description"><?php esc_html_e('Enable this option to remove everything after the “?” in a URL', 'rankology-stats'); ?></p>
                </td>
            </tr>
            <?php
        }
        ?>

        <tr valign="top">
            <th scope="row">
                <label for="disable-editor"><?php esc_html_e('Traffic Chart Metabox', 'rankology-stats'); ?></label>
            </th>

            <td>
                <input id="disable-editor" type="checkbox" value="1" name="rkns_disable_editor" <?php echo RANKOLOGY_STATS\Option::get('disable_editor') == true ? "checked='checked'" : ''; ?>>
                <label for="disable-editor"><?php esc_html_e('Disable', 'rankology-stats'); ?></label>
                <p class="description"><?php esc_html_e('Disable showing the hits chart metabox in the edit pages.', 'rankology-stats'); ?></p>
            </td>
        </tr>

        <tr valign="top">
            <th scope="row">
                <label for="disable_column"><?php esc_html_e('Traffic Column', 'rankology-stats'); ?></label>
            </th>
            <td>
                <input id="disable_column" type="checkbox" value="1" name="rkns_disable_column" <?php echo RANKOLOGY_STATS\Option::get('disable_column') == true ? "checked='checked'" : ''; ?>>
                <label for="disable_column"><?php esc_html_e('Disable', 'rankology-stats'); ?></label>
                <p class="description"><?php esc_html_e('Disable showing the hits column in list pages.', 'rankology-stats'); ?></p>
            </td>
        </tr>

        <tr valign="top">
            <th scope="row">
                <label for="hit_post_metabox"><?php esc_html_e('Traffic in Publish Metabox', 'rankology-stats'); ?></label>
            </th>

            <td>
                <input id="hit_post_metabox" type="checkbox" value="1" name="rkns_hit_post_metabox" <?php echo RANKOLOGY_STATS\Option::get('hit_post_metabox') == true ? "checked='checked'" : ''; ?>>
                <label for="hit_post_metabox"><?php esc_html_e('Enable', 'rankology-stats'); ?></label>
                <p class="description"><?php esc_html_e('Enable this option to show hits on the edit page » Publish meta box of all post types', 'rankology-stats'); ?></p>
            </td>
        </tr>

        <tr valign="top">
            <th scope="row">
                <label for="show_hits"><?php esc_html_e('Traffic in Single Pages', 'rankology-stats'); ?></label>
            </th>

            <td>
                <input id="show_hits" type="checkbox" value="1" name="rkns_show_hits" <?php echo RANKOLOGY_STATS\Option::get('show_hits') == true ? "checked='checked'" : ''; ?> onClick='ToggleShowTrafficOptions();'>
                <label for="show_hits"><?php esc_html_e('Enable', 'rankology-stats'); ?></label>
                <p class="description"><?php esc_html_e('Enable this option to show the hits in post content', 'rankology-stats'); ?></p>
            </td>
        </tr>

        <?php if (RANKOLOGY_STATS\Option::get('show_hits')) {
            $hidden = "";
        } else {
            $hidden = " style='display: none;'";
        } ?>
        <tr valign="top"<?php echo $hidden; ?> id='rkns_show_hits_option'>
            <td scope="row" style="vertical-align: top;">
                <label for="display_hits_position"><?php esc_html_e('Display position:', 'rankology-stats'); ?></label>
            </td>

            <td>
                <select name="rkns_display_hits_position" id="display_hits_position">
                    <option value="0" <?php selected(RANKOLOGY_STATS\Option::get('display_hits_position'), '0'); ?>><?php esc_html_e('Please select', 'rankology-stats'); ?></option>
                    <option value="before_content" <?php selected(RANKOLOGY_STATS\Option::get('display_hits_position'), 'before_content'); ?>><?php esc_html_e('Before Content', 'rankology-stats'); ?></option>
                    <option value="after_content" <?php selected(RANKOLOGY_STATS\Option::get('display_hits_position'), 'after_content'); ?>><?php esc_html_e('After Content', 'rankology-stats'); ?></option>
                </select>
                <p class="description"><?php esc_html_e('Choose the position to show Hits.', 'rankology-stats'); ?></p>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<div class="postbox">
    <table class="form-table">
        <tbody>
        <tr valign="top">
            <th scope="row" colspan="2"><h3><?php esc_html_e('Active Users', 'rankology-stats'); ?></h3></th>
        </tr>

        <tr valign="top">
            <th scope="row">
                <label for="useronline"><?php esc_html_e('Active/Online User:', 'rankology-stats'); ?></label>
            </th>

            <td>
                <input id="useronline" type="checkbox" value="1" name="rkns_useronline" <?php echo RANKOLOGY_STATS\Option::get('useronline') == true ? "checked='checked'" : ''; ?>>
                <label for="useronline"><?php esc_html_e('Enable', 'rankology-stats'); ?></label>
                <p class="description"><?php esc_html_e('Enable this feature to show actively website using users', 'rankology-stats'); ?></p>
            </td>
        </tr>

        <tr valign="top">
            <th scope="row">
                <label for="check_online"><?php esc_html_e('Check for Active Users Every:', 'rankology-stats'); ?></label>
            </th>

            <td>
                <input type="text" class="small-text code" id="check_online" name="rkns_check_online" value="<?php echo esc_attr(RANKOLOGY_STATS\Option::get('check_online')); ?>"/>
                <?php esc_html_e('Seconds', 'rankology-stats'); ?>
                <p class="description"><?php echo sprintf(__('Time for checking out accurate actively website using users on the site. Now: %s Seconds', 'rankology-stats'), RANKOLOGY_STATS\Option::get('check_online')); ?></p>
            </td>
        </tr>

        <tr valign="top">
            <th scope="row">
                <label for="allonline"><?php esc_html_e('Record All Users:', 'rankology-stats'); ?></label>
            </th>

            <td>
                <input id="allonline" type="checkbox" value="1" name="rkns_all_online" <?php echo RANKOLOGY_STATS\Option::get('all_online') == true ? "checked='checked'" : ''; ?>>
                <label for="allonline"><?php esc_html_e('Enable', 'rankology-stats'); ?></label>
                <p class="description"><?php esc_html_e('Enable this option to ignore the exclusion settings and record all actively website using users (including self referrals and robots). Should only be used for troubleshooting.', 'rankology-stats'); ?></p>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<div class="postbox">
    <table class="form-table">
        <tbody>
        <tr valign="top">
            <th scope="row" colspan="2"><h3><?php esc_html_e('Cache Compatibility', 'rankology-stats'); ?></h3></th>
        </tr>

        <tr valign="top">
            <th scope="row">
                <label for="use_cache_plugin"><?php esc_html_e('Status:', 'rankology-stats'); ?></label>
            </th>

            <td>
                <input id="use_cache_plugin" type="checkbox" value="1" name="rkns_use_cache_plugin" <?php echo RANKOLOGY_STATS\Option::get('use_cache_plugin') == true ? "checked='checked'" : ''; ?>>
                <label for="use_cache_plugin"><?php esc_html_e('Enable', 'rankology-stats'); ?></label>
                <p class="description"><?php esc_html_e('Enable this option if the Cache is enabled in your WordPress', 'rankology-stats'); ?></p>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<div class="postbox">
    <table class="form-table">
        <tbody>
        <tr valign="top">
            <th scope="row" colspan="2"><h3><?php esc_html_e('Visits', 'rankology-stats'); ?></h3></th>
        </tr>

        <tr valign="top">
            <th scope="row">
                <label for="visits"><?php esc_html_e('Status:', 'rankology-stats'); ?></label>
            </th>

            <td>
                <input id="visits" type="checkbox" value="1" name="rkns_visits" <?php echo RANKOLOGY_STATS\Option::get('visits') == true ? "checked='checked'" : ''; ?>>
                <label for="visits"><?php esc_html_e('Enable', 'rankology-stats'); ?></label>
                <p class="description"><?php esc_html_e('Enable this option to show the number of Page Views', 'rankology-stats'); ?></p>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<div class="postbox">
    <table class="form-table">
        <tbody>
        <tr valign="top">
            <th scope="row" colspan="2"><h3><?php esc_html_e('Visitors', 'rankology-stats'); ?></h3></th>
        </tr>

        <tr valign="top" id="visitors_tr">
            <th scope="row">
                <label for="visitors"><?php esc_html_e('Status:', 'rankology-stats'); ?></label>
            </th>
            <td>
                <input id="visitors" type="checkbox" value="1" name="rkns_visitors" <?php echo RANKOLOGY_STATS\Option::get('visitors') == true ? "checked='checked'" : ''; ?>>
                <label for="visitors"><?php esc_html_e('Enable', 'rankology-stats'); ?></label>
                <p class="description"><?php esc_html_e('Enable this option to show the number of Unique Users who have visited your website', 'rankology-stats'); ?></p>
            </td>
        </tr>

        <tr valign="top" data-view="visitors_log_tr" <?php echo(RANKOLOGY_STATS\Option::get('visitors') == false ? 'style="display:none;"' : '') ?>>
            <th scope="row">
                <label for="visitors_log"><?php esc_html_e('Log Visitors Pages:', 'rankology-stats'); ?></label>
            </th>
            <td>
                <input id="visitors_log" type="checkbox" value="1" name="rkns_visitors_log" <?php echo RANKOLOGY_STATS\Option::get('visitors_log') == true ? "checked='checked'" : ''; ?>>
                <label for="visitors_log"><?php esc_html_e('Enable', 'rankology-stats'); ?></label>
                <p class="description"><?php esc_html_e('Enable this option to receive a report of each user’s visits to the pages', 'rankology-stats'); ?></p>
            </td>
        </tr>

        <tr valign="top" data-view="visitors_log_tr" <?php echo(RANKOLOGY_STATS\Option::get('visitors') == false ? 'style="display:none;"' : '') ?>>
            <th scope="row">
                <label for="enable_user_column"><?php esc_html_e('User Visits Column', 'rankology-stats'); ?></label>
            </th>
            <td>
                <input id="enable_user_column" type="checkbox" value="1" name="rkns_enable_user_column" <?php echo RANKOLOGY_STATS\Option::get('enable_user_column') == true ? "checked='checked'" : ''; ?>>
                <label for="enable_user_column"><?php esc_html_e('Enable', 'rankology-stats'); ?></label>
                <p class="description"><?php esc_html_e('Enable this option to show the list of user visits, link in the WordPress admin user list page.', 'rankology-stats'); ?></p>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<div class="postbox">
    <table class="form-table">
        <tbody>
        <tr valign="top">
            <th scope="row" colspan="2"><h3><?php esc_html_e('Miscellaneous', 'rankology-stats'); ?></h3></th>
        </tr>

        <tr valign="top">
            <th scope="row">
                <label for="menu-bar"><?php esc_html_e('Show Stats in Menu Bar:', 'rankology-stats'); ?></label>
            </th>

            <td>
                <select name="rkns_menu_bar" id="menu-bar">
                    <option value="1" <?php selected(RANKOLOGY_STATS\Option::get('menu_bar'), '1'); ?>><?php esc_html_e('Yes', 'rankology-stats'); ?></option>
                    <option value="0" <?php selected(RANKOLOGY_STATS\Option::get('menu_bar'), '0'); ?>><?php esc_html_e('No', 'rankology-stats'); ?></option>
                </select>
                <p class="description"><?php esc_html_e('Select Yes to show stats in the admin menu bar', 'rankology-stats'); ?></p>
            </td>
        </tr>

        <tr valign="top">
            <th scope="row">
                <label for="hide_notices"><?php esc_html_e('Hide Admin Notices About Non-active Features:', 'rankology-stats'); ?></label>
            </th>

            <td>
                <input id="hide_notices" type="checkbox" value="1" name="rkns_hide_notices" <?php echo RANKOLOGY_STATS\Option::get('hide_notices') == true ? "checked='checked'" : ''; ?>>
                <label for="hide_notices"><?php esc_html_e('Enable', 'rankology-stats'); ?></label>
                <p class="description"><?php esc_html_e('Rankology Stats displays an alert if any of the core features are disabled. To hide these notices, enable this option.', 'rankology-stats'); ?></p>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<div class="postbox">
    <table class="form-table">
        <tbody>
        <tr valign="top">
            <th scope="row" colspan="2"><h3><?php esc_html_e('Charts', 'rankology-stats'); ?></h3></th>
        </tr>

        <tr valign="top">
            <th scope="row">
                <label for="chart-totals"><?php esc_html_e('Include Totals:', 'rankology-stats'); ?></label>
            </th>
            <td>
                <input id="chart-totals" type="checkbox" value="1" name="rkns_chart_totals" <?php echo RANKOLOGY_STATS\Option::get('chart_totals') == true ? "checked='checked'" : ''; ?>>
                <label for="chart-totals"><?php esc_html_e('Enable', 'rankology-stats'); ?></label>
                <p class="description"><?php esc_html_e('Add a total line to charts with multiple values, like the search engine referrals', 'rankology-stats'); ?></p>
            </td>
        </tr>

        </tbody>
    </table>
</div>
<div class="postbox">
    <table class="form-table">
        <tbody>
        <tr valign="top">
            <th scope="row" colspan="2"><h3><?php esc_html_e('Search Engines', 'rankology-stats'); ?></h3></th>
        </tr>

        <tr valign="top">
            <th scope="row">
                <label for="addsearchwords"><?php esc_html_e('Add Page Title to Empty Search Words:', 'rankology-stats'); ?></label>
            </th>

            <td>
                <input id="addsearchwords" type="checkbox" value="1" name="rkns_addsearchwords" <?php echo RANKOLOGY_STATS\Option::get('addsearchwords') == true ? "checked='checked'" : ''; ?>>
                <label for="addsearchwords"><?php esc_html_e('Enable', 'rankology-stats'); ?></label>
                <p class="description"><?php esc_html_e('If a search engine is identified as the referrer but it does not include the search query this option will substitute the page title in quotes preceded by "~:" as the search query to help identify what the user may have been searching for.', 'rankology-stats'); ?></p>
            </td>
        </tr>

        <tr valign="top">
            <th scope="row" colspan="2">
                <p class="description"><?php esc_html_e('Disabling all search engines is not allowed. Doing so will result in all search engines being active.', 'rankology-stats'); ?></p>
            </th>
        </tr>
        <?php
        $se_option_list = '';

        foreach ($selist as $se) {
            $option_name    = 'rkns_disable_se_' . $se['tag'];
            $store_name     = 'disable_se_' . $se['tag'];
            $se_option_list .= $option_name . ',';
            ?>

            <tr valign="top">
                <th scope="row">
                    <label for="<?php echo esc_attr($option_name); ?>"><?php echo esc_attr($se['name']); ?>:</label>
                </th>
                <td>
                    <input id="<?php echo esc_attr($option_name); ?>" type="checkbox" value="1" name="<?php echo esc_attr($option_name); ?>" <?php echo RANKOLOGY_STATS\Option::get($store_name) == true ? "checked='checked'" : ''; ?>><label for="<?php echo esc_attr($option_name); ?>"><?php esc_html_e('Disable', 'rankology-stats'); ?></label>
                    <p class="description"><?php echo sprintf(__('Disable %s from data collection and reporting.', 'rankology-stats'), esc_attr($se['name'])); ?></p>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<?php submit_button(__('Update', 'rankology-stats'), 'primary', 'submit', '', array('OnClick' => "var rknsCurrentTab = getElementById('rkns_current_tab'); rknsCurrentTab.value='general-settings'")); ?>
