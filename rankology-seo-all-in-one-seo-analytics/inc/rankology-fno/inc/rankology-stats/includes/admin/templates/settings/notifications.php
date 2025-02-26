<script type="text/javascript">
    function ToggleStatOptions() {
        jQuery('[id^="rkns_stats_report_option"]').fadeToggle();
    }
</script>
<div class="postbox">
    <table class="form-table">
        <tbody>
        <tr valign="top">
            <th scope="row" colspan="2"><h3><?php esc_html_e('Email Options', 'rankology-stats'); ?></h3></th>
        </tr>

        <tr valign="top">
            <td scope="row" style="vertical-align: top;">
                <label for="email-report"><?php esc_html_e('Email Addresses:', 'rankology-stats'); ?></label>
            </td>

            <td>
                <input dir="ltr" type="text" id="email_list" name="rkns_email_list" size="30" value="<?php if (RANKOLOGY_STATS\Option::get('email_list') == '') {
                    $rankology_stats_options['email_list'] = get_bloginfo('admin_email');
                }
                echo esc_textarea(RANKOLOGY_STATS\Option::get('email_list')); ?>"/>
                <p class="description"><?php esc_html_e('Add email addresses you want to receive reports and separate them with a comma.', 'rankology-stats'); ?></p>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<div class="postbox">
    <table class="form-table">
        <tbody>
        <tr valign="top">
            <th scope="row" colspan="2"><h3><?php esc_html_e('Stats reporting', 'rankology-stats'); ?></h3></th>
        </tr>

        <tr valign="top">
            <th scope="row">
                <label for="stats-report"><?php esc_html_e('Statistical Reports:', 'rankology-stats'); ?></label>
            </th>

            <td>
                <input id="stats-report" type="checkbox" value="1" name="rkns_stats_report" <?php echo RANKOLOGY_STATS\Option::get('stats_report') == true ? "checked='checked'" : ''; ?> onClick='ToggleStatOptions();'>
                <label for="stats-report"><?php esc_html_e('Enable', 'rankology-stats'); ?></label>
                <p class="description"><?php esc_html_e('Enable this option to receive stats report via email', 'rankology-stats'); ?></p>
            </td>
        </tr>

        <?php if (RANKOLOGY_STATS\Option::get('stats_report')) {
            $hidden = "";
        } else {
            $hidden = " style='display: none;'";
        } ?>
        <tr valign="top"<?php echo $hidden; ?> id='rkns_stats_report_option'>
            <td scope="row" style="vertical-align: top;">
                <label for="time-report"><?php esc_html_e('Schedule:', 'rankology-stats'); ?></label>
            </td>

            <td>
                <select name="rkns_time_report" id="time-report">
                    <option value="0" <?php selected(RANKOLOGY_STATS\Option::get('time_report'), '0'); ?>><?php esc_html_e('Please select', 'rankology-stats'); ?></option>
                    <?php
                    function rankology_stats_schedule_sort($a, $b)
                    {
                        if ($a['interval'] == $b['interval']) {
                            return 0;
                        }
                        return ($a['interval'] < $b['interval']) ? -1 : 1;
                    }

                    //Get List Of Schedules Wordpress
                    $schedules = wp_get_schedules();
                    uasort($schedules, 'rankology_stats_schedule_sort');
                    $schedules_item = array();

                    foreach ($schedules as $key => $value) {
                        if (!in_array($value, $schedules_item)) {
                            echo '<option value="' . esc_attr($key) . '" ' . selected(RANKOLOGY_STATS\Option::get('time_report'), $key) . '>' . esc_attr($value['display']) . '</option>';
                            $schedules_item[] = $value;
                        }
                    }
                    ?>
                </select>
                <p class="description"><?php esc_html_e('Select how often to receive statistical report.', 'rankology-stats'); ?></p>
            </td>
        </tr>

        <tr valign="top"<?php echo $hidden; ?> id='rkns_stats_report_option'>
            <td scope="row" style="vertical-align: top;">
                <label for="content-report"><?php esc_html_e('Message body:', 'rankology-stats'); ?></label>
            </td>

            <td>
                <?php wp_editor(RANKOLOGY_STATS\Option::get('content_report'), 'content-report', array('media_buttons' => false, 'textarea_name' => 'rkns_content_report', 'textarea_rows' => 5)); ?>
                <p class="description"><?php esc_html_e('Enter the contents of the report.', 'rankology-stats'); ?></p>

                <p class="description data">
                    <?php esc_html_e('Any shortcode supported by your installation of WordPress, include shortcodes for Rankology. Here is the list:', 'rankology-stats'); ?>
                    <br><br>
                    <?php esc_html_e('Active/Online User', 'rankology-stats'); ?>:
                    <code>[rankologystats stat=usersonline]</code><br>
                    <?php esc_html_e('Today\'s Visitors', 'rankology-stats'); ?>:
                    <code>[rankologystats stat=visitors time=today]</code><br>
                    <?php esc_html_e('Today\'s Visits', 'rankology-stats'); ?>:
                    <code>[rankologystats stat=visits time=today]</code><br>
                    <?php esc_html_e('Yesterday\'s Visitors', 'rankology-stats'); ?>:
                    <code>[rankologystats stat=visitors time=yesterday]</code><br>
                    <?php esc_html_e('Yesterday\'s Visits', 'rankology-stats'); ?>:
                    <code>[rankologystats stat=visits time=yesterday]</code><br>
                    <?php esc_html_e('Total Visitors', 'rankology-stats'); ?>:
                    <code>[rankologystats stat=visitors time=total]</code><br>
                    <?php esc_html_e('Total Visits', 'rankology-stats'); ?>:
                    <code>[rankologystats stat=visits time=total]</code><br>
                </p>

            </td>
        </tr>
        </tbody>
    </table>
</div>

<?php submit_button(__('Update', 'rankology-stats'), 'primary', 'submit', '', array('OnClick' => "var rknsCurrentTab = getElementById('rkns_current_tab'); rknsCurrentTab.value='notifications-settings'")); ?>
