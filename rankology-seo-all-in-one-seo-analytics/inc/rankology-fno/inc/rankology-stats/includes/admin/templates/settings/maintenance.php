<script type="text/javascript">
    function DBMaintWarning() {
        var checkbox = jQuery('#rkns_schedule_dbmaint');
        if (checkbox.attr('checked') == 'checked') {
            if (!confirm('<?php esc_html_e('This will permanently delete data from the database each day, are you sure you want to enable this option?', 'rankology-stats'); ?>'))
                checkbox.attr('checked', false);
        }
    }
</script>
<div class="postbox">
    <table class="form-table">
        <tbody>
        <tr valign="top">
            <th scope="row" colspan="2"><h3><?php esc_html_e('Purge Old Data Daily', 'rankology-stats'); ?></h3></th>
        </tr>

        <tr valign="top">
            <th scope="row">
                <label for="rkns_schedule_dbmaint"><?php esc_html_e('Enabled:', 'rankology-stats'); ?></label>
            </th>

            <td>
                <input id="rkns_schedule_dbmaint" type="checkbox" name="rkns_schedule_dbmaint" <?php echo RANKOLOGY_STATS\Option::get('schedule_dbmaint') == true ? "checked='checked'" : ''; ?> onclick='DBMaintWarning();'>
                <label for="rkns_schedule_dbmaint"><?php esc_html_e('Enable', 'rankology-stats'); ?></label>
                <p class="description"><?php esc_html_e('A WP Cron job will be run daily to purge any data older than a set number of days.', 'rankology-stats'); ?></p>
            </td>
        </tr>

        <tr valign="top">
            <th scope="row">
                <label for="rkns_schedule_dbmaint_days"><?php esc_html_e('Purge Data Older Than:', 'rankology-stats'); ?></label>
            </th>

            <td>
                <input type="text" class="small-text code" id="rkns_schedule_dbmaint_days" name="rkns_schedule_dbmaint_days" value="<?php echo esc_attr(RANKOLOGY_STATS\Option::get('schedule_dbmaint_days', "365")); ?>"/>
                <?php esc_html_e('Days', 'rankology-stats'); ?>
                <p class="description"><?php echo __('The number of days to keep statistics for.', 'rankology-stats') . ' ' . __('The minimum value is 30 days.', 'rankology-stats') . ' ' . __('Invalid values will disable the daily maintenance.', 'rankology-stats'); ?></p>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<div class="postbox">
    <table class="form-table">
        <tbody>
        <tr valign="top">
            <th scope="row" colspan="2"><h3><?php esc_html_e('Purge High Hit Count Visitors Daily', 'rankology-stats'); ?></h3>
            </th>
        </tr>

        <tr valign="top">
            <th scope="row">
                <label for="rkns_schedule_dbmaint_visitor"><?php esc_html_e('Enabled:', 'rankology-stats'); ?></label>
            </th>

            <td>
                <input id="rkns_schedule_dbmaint_visitor" type="checkbox" name="rkns_schedule_dbmaint_visitor" <?php echo RANKOLOGY_STATS\Option::get('schedule_dbmaint_visitor') == true ? "checked='checked'" : ''; ?> onclick='DBMaintWarning();'>
                <label for="rkns_schedule_dbmaint_visitor"><?php esc_html_e('Enable', 'rankology-stats'); ?></label>
                <p class="description"><?php esc_html_e('A WP Cron job will be run daily to purge any users statistics data where the user has more than the defined number of hits in a day (aka they are probably a bot).', 'rankology-stats'); ?></p>
            </td>
        </tr>

        <tr valign="top">
            <th scope="row">
                <label for="rkns_schedule_dbmaint_visitor_hits"><?php esc_html_e('Purge Visitors More Than:', 'rankology-stats'); ?></label>
            </th>

            <td>
                <input type="text" class="small-text code" id="rkns_schedule_dbmaint_visitor_hits" name="rkns_schedule_dbmaint_visitor_hits" value="<?php echo esc_attr(RANKOLOGY_STATS\Option::get('schedule_dbmaint_visitor_hits', '50')); ?>"/>
                <?php esc_html_e('Traffic', 'rankology-stats'); ?>
                <p class="description"><?php echo __('The number of hits required to delete the visitor.', 'rankology-stats') . ' ' . __('Minimum value is 10 hits.', 'rankology-stats') . ' ' . __('Invalid values will disable the daily maintenance.', 'rankology-stats'); ?></p>
            </td>
        </tr>
        </tbody>
    </table>
</div>

<?php submit_button(__('Update', 'rankology-stats'), 'primary', 'submit', '', array('OnClick' => "var rknsCurrentTab = getElementById('rkns_current_tab'); rknsCurrentTab.value='maintenance-settings'")); ?>
