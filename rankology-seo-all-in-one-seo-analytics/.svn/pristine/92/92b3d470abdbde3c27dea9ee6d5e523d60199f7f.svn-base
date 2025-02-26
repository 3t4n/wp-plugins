<div class="postbox">
    <table class="form-table">
        <tbody>
        <tr valign="top">
            <th scope="row" colspan="2">
                <h3><?php esc_html_e('GeoIP Settings', 'rankology-stats'); ?></h3>
            </th>
        </tr>

        <tr valign="top">
            <th scope="row"><label for="rkns_geoip_license_type"><?php esc_html_e('GeoIP Server Type:', 'rankology-stats'); ?></label></th>
            <td>
                <select name="rkns_geoip_license_type" id="geoip_license_type">
                    <option value="js-deliver" <?php selected(RANKOLOGY_STATS\Option::get('geoip_license_type'), 'js-deliver'); ?>><?php esc_html_e('Use the JsDelivr', 'rankology-stats'); ?></option>
                    <option value="user-license" <?php selected(RANKOLOGY_STATS\Option::get('geoip_license_type'), 'user-license'); ?>><?php esc_html_e('Use the MaxMind server with your own license key', 'rankology-stats'); ?></option>
                </select>

                <p class="description"><?php echo sprintf(__('IP location services are provided by data created by %s.', 'rankology-stats'), '<a href="http://www.maxmind.com" target=_blank>MaxMind</a>'); ?></p>
            </td>
        </tr>

        <tr valign="top" id="geoip_license_key_option">
            <th scope="row">
                <label for="geoip_license_key"><?php esc_html_e('GeoIP License Key:', 'rankology-stats'); ?></label>
            </th>
            <td>
                <input id="geoip_license_key" type="text" size="30" name="rkns_geoip_license_key" value="<?php echo esc_attr(RANKOLOGY_STATS\Option::get('geoip_license_key')); ?>">
                <p class="description"><?php echo __('Put your license key here and save settings to apply it.', 'rankology-stats'); ?></p>
            </td>
        </tr>

        <?php
        if (RANKOLOGY_STATS\GeoIP::IsSupport()) {
            ?>
            <tr valign="top">
                <th scope="row">
                    <label for="geoip-enable"><?php esc_html_e('GeoIP Collection:', 'rankology-stats'); ?></label>
                </th>

                <td>
                    <input id="geoip-enable" type="checkbox" name="rkns_geoip" <?php echo(RANKOLOGY_STATS\Option::get('geoip') === 'on' ? "checked='checked'" : ''); ?>>
                    <label for="geoip-enable">
                        <?php esc_html_e('Enable', 'rankology-stats'); ?>
                        <input type="hidden" name="geoip_name" value="country">
                        <?php submit_button(__("Update Database", 'rankology-stats'), "secondary", "update_geoip", false); ?>
                    </label>

                    <p class="description"><?php esc_html_e('Enable this option to get more information and location (country) from a visitor.', 'rankology-stats'); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <label for="geoip-city"><?php esc_html_e('GeoIP City:', 'rankology-stats'); ?></label>
                </th>

                <td>
                    <input id="geoip-city" type="checkbox" name="rkns_geoip_city" <?php echo(RANKOLOGY_STATS\Option::get('geoip_city') == 'on' ? "checked='checked'" : ''); ?>>
                    <label for="geoip-city">
                        <?php esc_html_e('Enable', 'rankology-stats'); ?>
                        <input type="hidden" name="geoip_name" value="city">
                        <?php submit_button(__("Update Database", 'rankology-stats'), "secondary", "update_geoip", false); ?>
                    </label>
                    <p class="description"><?php esc_html_e('Enable this option to see visitors\'city name', 'rankology-stats'); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <label for="geoip-schedule"><?php esc_html_e('Schedule Monthly Update of GeoIP DB:', 'rankology-stats'); ?></label>
                </th>

                <td>
                    <input id="geoip-schedule" type="checkbox" name="rkns_schedule_geoip" <?php echo RANKOLOGY_STATS\Option::get('schedule_geoip') == true ? "checked='checked'" : ''; ?>>
                    <label for="geoip-schedule"><?php esc_html_e('Enable', 'rankology-stats'); ?></label>
                    <?php
                    if (RANKOLOGY_STATS\Option::get('schedule_geoip')) {
                        echo '<p class="description">' . __('Next update will be', 'rankology-stats') . ': <code>';
                        $last_update = RANKOLOGY_STATS\Option::get('last_geoip_dl');
                        $this_month  = strtotime(__('First Tuesday of this month', 'rankology-stats'));

                        if ($last_update > $this_month) {
                            $next_update = strtotime(__('First Tuesday of next month', 'rankology-stats')) + (86400 * 2);
                        } else {
                            $next_update = $this_month + (86400 * 2);
                        }

                        $next_schedule = wp_next_scheduled('rankology_stats_geoip_hook');
                        if ($next_schedule) {
                            echo \RANKOLOGY_STATS\TimeZone::getLocalDate(get_option('date_format'), $next_update) .
                                ' @ ' .
                                \RANKOLOGY_STATS\TimeZone::getLocalDate(get_option('time_format'), $next_schedule);
                        } else {
                            echo \RANKOLOGY_STATS\TimeZone::getLocalDate(get_option('date_format'), $next_update) .
                                ' @ ' .
                                \RANKOLOGY_STATS\TimeZone::getLocalDate(get_option('time_format'), time());
                        }

                        echo '</code></p>';
                    }
                    ?>
                    <p class="description"><?php esc_html_e('Download of the GeoIP database will be scheduled for 2 days after the first Tuesday of the month.', 'rankology-stats'); ?></p>
                    <p class="description"><?php esc_html_e('This option will also download the database if the local filesize is less than 1k (which usually means the stub that comes with the plugin is still in place).', 'rankology-stats'); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <label for="geoip-schedule"><?php esc_html_e('Populate Missing GeoIP After Updating GeoIP DB:', 'rankology-stats'); ?></label>
                </th>

                <td>
                    <input id="geoip-auto-pop" type="checkbox" name="rkns_auto_pop" <?php echo RANKOLOGY_STATS\Option::get('auto_pop') == true ? "checked='checked'" : ''; ?>>
                    <label for="geoip-auto-pop"><?php esc_html_e('Enable', 'rankology-stats'); ?></label>
                    <p class="description"><?php esc_html_e('Enable this option to update any missing GeoIP data after downloading a new database.', 'rankology-stats'); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <label for="geoip-schedule"><?php esc_html_e('Country Code for Private IP Addresses:', 'rankology-stats'); ?></label>
                </th>

                <td>
                    <input type="text" size="3" id="geoip-private-country-code" name="rkns_private_country_code" value="<?php echo esc_attr(RANKOLOGY_STATS\Option::get('private_country_code', \RANKOLOGY_STATS\GeoIP::$private_country)); ?>">
                    <p class="description"><?php echo __('The international standard two letter country code (ie. US = United States, CA = Canada, etc.) for private (non-routable) IP addresses (ie. 10.0.0.1, 192.158.1.1, 127.0.0.1, etc.).', 'rankology-stats') . ' ' . __('Use "000" (three zeros) to use "Unknown" as the country code.', 'rankology-stats'); ?></p>
                </td>
            </tr>
            <?php
        } else {
            ?>
            <tr valign="top">
                <th scope="row" colspan="2">
                    <?php
                    echo __('GeoIP collection is disabled due to the following reasons:', 'rankology-stats') . '<br><br>';

                    if (!function_exists('curl_init')) {
                        echo '<br>&nbsp;&nbsp;&nbsp;&nbsp;* ';
                        esc_html_e('GeoIP collection requires the cURL PHP extension and it is not loaded on your version of PHP!', 'rankology-stats');
                        echo '<br>';
                    }

                    if (!function_exists('bcadd')) {
                        echo '<br>&nbsp;&nbsp;&nbsp;&nbsp;* ';
                        esc_html_e('GeoIP collection requires the BC Math PHP extension and it is not loaded on your version of PHP!', 'rankology-stats');
                        echo '<br>';
                    }

                    if (ini_get('safe_mode')) {
                        echo '<br>&nbsp;&nbsp;&nbsp;&nbsp;* ';
                        esc_html_e('PHP safe mode detected! GeoIP collection is not supported with PHP\'s safe mode enabled!', 'rankology-stats');
                        echo '<br>';
                    }
                    ?>
                </th>
            </tr>
            <?php
        } ?>

        <script type="text/javascript">
            jQuery(document).ready(function () {

                // Show and hide user license input base on license type option
                function handle_geoip_license_key_field() {
                    console.log(jQuery("#geoip_license_type").val())
                    if (jQuery("#geoip_license_type").val() == "user-license") {
                        jQuery("#geoip_license_key_option").show();
                    } else {
                        jQuery("#geoip_license_key_option").hide();
                    }
                }
                handle_geoip_license_key_field();
                jQuery("#geoip_license_type").on('change', handle_geoip_license_key_field);

                // Ajax function for updating database
                jQuery("input[name = 'update_geoip']").click(function (event) {
                    event.preventDefault();
                    var geoip_clicked_button = this;

                    var geoip_action = jQuery(this).prev().val();
                    jQuery(".geoip-update-loading").remove();
                    jQuery(".update_geoip_result").remove();

                    jQuery(this).after("<img class='geoip-update-loading' src='<?php echo esc_url(plugins_url('rankology-stats')); ?>/assets/images/loading.gif'/>");

                    jQuery.ajax({
                        url: ajaxurl,
                        type: 'post',
                        data: {
                            'action': 'rankology_stats_update_geoip_database',
                            'update_action': geoip_action,
                            'rkns_nonce': '<?php echo wp_create_nonce('wp_rest'); ?>'
                        },
                        datatype: 'json',
                    })
                        .always(function (result) {
                            jQuery(".geoip-update-loading").remove();
                            jQuery(geoip_clicked_button).after("<span class='update_geoip_result'>" + result + "</span>")
                        });
                });
            });
        </script>

        </tbody>
    </table>
</div>

<?php submit_button(__('Update', 'rankology-stats'), 'primary', 'submit', '', array('OnClick' => "var rknsCurrentTab = getElementById('rkns_current_tab'); rknsCurrentTab.value='geoipsets-settings'")); ?>