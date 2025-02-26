<div class="wrap rkns-wrap">
    <div class="postbox">
        <table class="form-table">
            <tbody>
            <tr valign="top">
                <th scope="row" colspan="2"><h3><?php esc_html_e('Resources', 'rankology-stats'); ?></h3></th>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <?php esc_html_e('Memory usage in PHP', 'rankology-stats'); ?>:
                </th>
                <td>
                    <strong><?php echo size_format(memory_get_usage(), 3); ?></strong>
                    <p class="description"><?php esc_html_e('Memory usage in PHP', 'rankology-stats'); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <?php esc_html_e('PHP Memory Limit', 'rankology-stats'); ?>:
                </th>

                <td>
                    <strong><?php echo ini_get('memory_limit'); ?></strong>
                    <p class="description"><?php esc_html_e('The memory limit a script is allowed to consume, set in php.ini.', 'rankology-stats'); ?></p>
                </td>
            </tr>

            <?php
            foreach ($result as $table_name => $number_row) {
                ?>
                <tr valign="top">
                    <th scope="row">
                        <?php echo sprintf(__('Number of rows in the %s table', 'rankology-stats'), '<code>' . esc_attr($table_name) . '</code>'); ?>:
                    </th>
                    <td>
                        <strong><?php echo number_format_i18n($number_row); ?></strong> <?php echo _n('Row', 'Rows', number_format_i18n($number_row), 'rankology-stats'); ?>
                        <p class="description"><?php esc_html_e('Number of rows', 'rankology-stats'); ?></p>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
    <div class="postbox">
        <table class="form-table">
            <tbody>
            <tr valign="top">
                <th scope="row" colspan="2"><h3><?php esc_html_e('Version Info', 'rankology-stats'); ?></h3></th>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <?php esc_html_e('Rankology Stats Version', 'rankology-stats'); ?>:
                </th>

                <td>
                    <strong><?php echo RANKOLOGY_STATS_VERSION; ?></strong>
                    <p class="description"><?php esc_html_e('The Rankology Stats version you are running.', 'rankology-stats'); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <?php esc_html_e('PHP Version', 'rankology-stats'); ?>:
                </th>

                <td>
                    <strong><?php echo phpversion(); ?></strong>
                    <p class="description"><?php esc_html_e('The PHP version you are running.', 'rankology-stats'); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <?php esc_html_e('PHP Safe Mode', 'rankology-stats'); ?>:
                </th>

                <td>
                    <strong><?php if (ini_get('safe_mode')) {
                            esc_html_e('Yes', 'rankology-stats');
                        } else {
                            esc_html_e('No', 'rankology-stats');
                        } ?></strong>

                    <p class="description"><?php esc_html_e('Is PHP Safe Mode active. The GeoIP code is not supported in Safe Mode.', 'rankology-stats'); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <?php esc_html_e('PHP IPv6 Enabled', 'rankology-stats'); ?>:
                </th>

                <td>
                    <strong><?php if (defined('AF_INET6')) {
                            esc_html_e('Yes', 'rankology-stats');
                        } else {
                            esc_html_e('No', 'rankology-stats');
                        } ?></strong>
                    <p class="description"><?php esc_html_e('Is PHP compiled with IPv6 support. You may see warning messages in your PHP log if it is not and you receive HTTP headers with IPv6 addresses in them.', 'rankology-stats'); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <?php esc_html_e('jQuery Version', 'rankology-stats'); ?>:
                </th>

                <td>
                    <strong>
                        <script type="text/javascript">document.write(jQuery().jquery);</script>
                    </strong>

                    <p class="description"><?php esc_html_e('The jQuery version you are running.', 'rankology-stats'); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <?php esc_html_e('cURL Version', 'rankology-stats'); ?>:
                </th>

                <td>
                    <strong><?php if (function_exists('curl_version')) {
                            $curl_ver = curl_version();
                            echo esc_attr($curl_ver['version']);
                        } else {
                            esc_html_e('cURL not installed', 'rankology-stats');
                        } ?></strong>

                    <p class="description"><?php esc_html_e('The PHP cURL Extension version you are running. cURL is required for the GeoIP code, if it is not installed GeoIP will be disabled.', 'rankology-stats'
                        ); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <?php esc_html_e('Zlib gzopen()', 'rankology-stats'); ?>:
                </th>

                <td>
                    <strong><?php if (function_exists('gzopen')) {
                            esc_html_e('Installed', 'rankology-stats');
                        } else {
                            esc_html_e('Not installed', 'rankology-stats');
                        } ?></strong>

                    <p class="description"><?php esc_html_e('If the gzopen() function is installed. The gzopen() function is required for the GeoIP database to be downloaded successfully.', 'rankology-stats'); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <?php esc_html_e('GMP PHP extension', 'rankology-stats'); ?>:
                </th>

                <td>
                    <strong><?php if (extension_loaded('gmp')) {
                            esc_html_e('Installed', 'rankology-stats');
                        } else {
                            esc_html_e('Not installed', 'rankology-stats');
                        } ?></strong>

                    <p class="description"><?php esc_html_e('If the GMP Math PHP extension is loaded, either GMP or BCMath is required for the GeoIP database to be read successfully.', 'rankology-stats'); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <?php esc_html_e('BCMath PHP extension', 'rankology-stats'); ?>:
                </th>

                <td>
                    <strong><?php if (extension_loaded('bcmath')) {
                            esc_html_e('Installed', 'rankology-stats');
                        } else {
                            esc_html_e('Not installed', 'rankology-stats');
                        } ?></strong>

                    <p class="description"><?php esc_html_e('If the BCMath PHP extension is loaded, either GMP or BCMath is required for the GeoIP database to be read successfully.', 'rankology-stats'); ?></p>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="postbox">
        <table class="form-table">
            <tbody>
            <tr valign="top">
                <th scope="row" colspan="2"><h3><?php esc_html_e('File Info', 'rankology-stats'); ?></h3></th>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <?php esc_html_e('GeoIP Database', 'rankology-stats'); ?>:
                </th>

                <td>
                    <strong><?php
                        $GeoIP_filename = \RANKOLOGY_STATS\GeoIP::get_geo_ip_path('country');
                        $GeoIP_filedate = @filemtime($GeoIP_filename);

                        if ($GeoIP_filedate === false) {
                            esc_html_e('Database file does not exist.', 'rankology-stats');
                        } else {
                            echo size_format(@filesize($GeoIP_filename), 2) . __(', created on ',
                                    'rankology-stats') . date_i18n(get_option('date_format') . ' @ ' . get_option('time_format'),
                                    $GeoIP_filedate);
                        } ?></strong>

                    <p class="description"><?php esc_html_e('The file size and date of the GeoIP database.', 'rankology-stats'); ?></p>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="postbox">
        <table class="form-table">
            <tbody>
            <tr valign="top">
                <th scope="row" colspan="2"><h3><?php esc_html_e('Client Info', 'rankology-stats'); ?></h3></th>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <?php esc_html_e('Client IP', 'rankology-stats'); ?>:
                </th>

                <td>
                    <strong><?php echo \RANKOLOGY_STATS\IP::getIP(); ?></strong>
                    <p class="description"><?php esc_html_e('The client IP address.', 'rankology-stats'); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <?php esc_html_e('User Agent', 'rankology-stats'); ?>:
                </th>

                <td>
                    <strong><?php echo esc_textarea(\RANKOLOGY_STATS\UserAgent::getHttpUserAgent()); ?></strong>
                    <p class="description"><?php esc_html_e('The client user agent string.', 'rankology-stats'); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <?php esc_html_e('Browser', 'rankology-stats'); ?>:
                </th>

                <td>
                    <strong><?php $agent = \RANKOLOGY_STATS\UserAgent::getUserAgent();
                        echo esc_attr($agent['browser']);
                        ?></strong>

                    <p class="description"><?php esc_html_e('The detected client browser.', 'rankology-stats'); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <?php esc_html_e('Version', 'rankology-stats'); ?>:
                </th>

                <td>
                    <strong><?php echo esc_attr($agent['version']); ?></strong>
                    <p class="description"><?php esc_html_e('The detected client browser version.', 'rankology-stats'); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <?php esc_html_e('Platform', 'rankology-stats'); ?>:
                </th>

                <td>
                    <strong><?php echo esc_attr($agent['platform']); ?></strong>
                    <p class="description"><?php esc_html_e('The detected client platform.', 'rankology-stats'); ?></p>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="postbox">
        <table class="form-table">
            <tbody>
            <tr valign="top">
                <th scope="row" colspan="2"><h3><?php esc_html_e('Server Info', 'rankology-stats'); ?></h3></th>
            </tr>

            <?php
            $list = array(
                'SERVER_SOFTWARE',
                'HTTP_HOST',
                'REMOTE_ADDR',
                'HTTP_CLIENT_IP',
                'HTTP_X_FORWARDED_FOR',
                'HTTP_X_FORWARDED',
                'HTTP_FORWARDED_FOR',
                'HTTP_FORWARDED',
                'HTTP_X_REAL_IP',
            );
            foreach ($list as $server) {
                if (isset($_SERVER[$server])) {
                    echo '<tr valign="top">
                     <th scope="row">
                    ' . $server . '
                    </th>
                    <td>
                        <strong>' . esc_attr($_SERVER[$server]) . '</strong>
                    </td>
                </tr>';
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
