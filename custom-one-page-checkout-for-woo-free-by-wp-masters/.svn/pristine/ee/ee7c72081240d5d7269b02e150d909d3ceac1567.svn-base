<div id="settings-panel">
    <div class="section-company">
        <div class="left-side">
            <ul>
                <li><a class="change-table active" data-table="general-settings-table"><i class="fas fa-tools"></i> General Setting</a></li>
                <li><a class="change-table" data-table="system-info-table"><i class="fas fa-shield-alt"></i> System Info</a></li>
                <li><a class="support-item" href="https://wp-masters.com" target="_blank"><i class="fas fa-life-ring"></i> Plugin Support</a></li>
            </ul>
        </div>
        <div class="right-side">
            <a href="https://wp-masters.com" target="_blank"><img src="<?php echo esc_attr(PLUGIN_MODERN_CHECKOUT_PATH.'/templates/assets/img/logo.png') ?>" alt=""></a>
        </div>
    </div>
    <div class="select-table" id="general-settings-table">
        <form action="" method="post">
            <div class="section_data">
                <div class="title">Checkout Logo</div>
                <div class="items-list">
                    <div class="item-content">
                        <div class="item-table logo-fixer">
                            <img id='image-preview' src='<?php if (isset($settings['logo_checkout'])) {echo esc_attr(wp_get_attachment_url($settings['logo_checkout']));} else { echo esc_attr(PLUGIN_MODERN_CHECKOUT_PATH.'/templates/assets/img/noimage.gif'); } ?>'>
                            <button id="upload_image_button" type="button" class="button button-primary button-large"><i class="fas fa-plus-square"></i> Upload image</button>
                            <input type='hidden' name='wpm_modern_checkout[logo_checkout]' id='image_attachment_id' value='<?php if (isset($settings['logo_checkout'])) {echo esc_attr($settings['logo_checkout']);} ?>'>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section_data colors">
                <div class="title">CheckOut Design</div>
                <div class="head_items">
                    <div class="item-table">Links, Shadows, Borders: <a href="#" data-tooltip="Color of elements - Links, Shadows, Borders" class="help-icon clicktips"><i class="fas fa-question-circle"></i></a></div>
                    <div class="item-table">Links, Shadows, Borders (Hover): <a href="#" data-tooltip="Color of elements on hover - Links, Shadows, Borders" class="help-icon clicktips"><i class="fas fa-question-circle"></i></a></div>
                    <div class="item-table">Sidebar Background: <a href="#" data-tooltip="Right Sidebar Background color" class="help-icon clicktips"><i class="fas fa-question-circle"></i></a></div>
                    <div class="item-table">Sidebar Fonts Color: <a href="#" data-tooltip="Right Sidebar Fonts Cols" class="help-icon clicktips"><i class="fas fa-question-circle"></i></a></div>
                    <div class="item-table">Border Color: <a href="#" data-tooltip="Color of all borders" class="help-icon clicktips"><i class="fas fa-question-circle"></i></a></div>
                </div>
                <div class="items-list">
                    <div class="item-content">
                        <div class="item-table"><input class="color-picker" name="wpm_modern_checkout[links]" value='<?php if (isset($settings['links'])) {echo esc_attr($settings['links']);} else { echo esc_attr('#7aa941'); } ?>'></div>
                        <div class="item-table"><input class="color-picker" name="wpm_modern_checkout[links_hover]" value='<?php if (isset($settings['links_hover'])) {echo esc_attr($settings['links_hover']);} else { echo esc_attr('#669331'); } ?>'></div>
                        <div class="item-table"><input class="color-picker" name="wpm_modern_checkout[sidebar_background]" value='<?php if (isset($settings['sidebar_background'])) {echo esc_attr($settings['sidebar_background']);} else { echo esc_attr('#eee'); } ?>'></div>
                        <div class="item-table"><input class="color-picker" name="wpm_modern_checkout[sidebar_fonts]" value='<?php if (isset($settings['sidebar_fonts'])) {echo esc_attr($settings['sidebar_fonts']);} else { echo esc_attr('#000'); } ?>'></div>
                        <div class="item-table"><input class="color-picker" name="wpm_modern_checkout[border_color]" value='<?php if (isset($settings['border_color'])) {echo esc_attr($settings['border_color']);} else { echo esc_attr('#7e9e57'); } ?>'></div>
                    </div>
                </div>
                <div class="head_items">
                    <div class="item-table">Input Border: <a href="#" data-tooltip="Color Border on Input fields" class="help-icon clicktips"><i class="fas fa-question-circle"></i></a></div>
                    <div class="item-table">Input Border Hover: <a href="#" data-tooltip="Color Border on Input fields after hover" class="help-icon clicktips"><i class="fas fa-question-circle"></i></a></div>
                </div>
                <div class="items-list">
                    <div class="item-content">
                        <div class="item-table"><input class="color-picker" name="wpm_modern_checkout[input_border]" value='<?php if (isset($settings['input_border'])) {echo esc_attr($settings['input_border']);} else { echo esc_attr('#d9d9d9'); } ?>'></div>
                        <div class="item-table"><input class="color-picker" name="wpm_modern_checkout[input_border_hover]" value='<?php if (isset($settings['input_border_hover'])) {echo esc_attr($settings['input_border_hover']);} else { echo esc_attr('#7aa941'); } ?>'></div>
                    </div>
                </div>
            </div>
            <div class="section_data">
                <div class="title">Checkout Footer Links</div>
                <div class="head_items" <?php if(isset($settings['product']) && count($settings['product']) > 0) {} else {echo "style='display: none;'";} ?>>
                    <div class="number_element">#</div>
                    <div class="item-table">Link Name <a href="#" data-tooltip="The name of anchor the link" class="help-icon clicktips"><i class="fas fa-question-circle"></i></a></div>
                    <div class="item-table">Link URL <a href="#" data-tooltip="Url on link - where to go" class="help-icon clicktips"><i class="fas fa-question-circle"></i></a></div>
                </div>
                <div class="items-list">
                    <?php if(isset($settings['footer_anchor']) && count($settings['footer_anchor']) > 0) { $i = 1; foreach ($settings['footer_anchor'] as $item => $link_name) { ?>
                        <div class="item-content">
                            <div class="number_element"><?php echo esc_html($i); ?></div>
                            <div class="item-table">
                                <input type="text" name="wpm_modern_checkout[footer_anchor][]" value="<?php echo esc_html($link_name); ?>">
                            </div>
                            <div class="item-table">
                                <input type="text" name="wpm_modern_checkout[footer_link][]" value="<?php echo esc_html($settings['footer_link'][$item]); ?>">
                            </div>
                            <div class="delete_item"><i class="fas fa-trash"></i></div>
                        </div>
                        <?php $i++; }} else { ?>
                        <div class="item-content" style="display: none">
                            <div class="number_element">1</div>
                            <div class="item-table">
                                <input type="text" name="wpm_modern_checkout[footer_anchor][]">
                            </div>
                            <div class="item-table">
                                <input type="text" name="wpm_modern_checkout[footer_link][]">
                            </div>
                            <div class="delete_item"><i class="fas fa-trash"></i></div>
                        </div>
                    <?php } ?>
                    <button class="button button-primary button-large add-item" type="button"><i class="fas fa-plus-square"></i> Add new Item</button>
                </div>
            </div>
            <button class="button button-primary button-large" id="save-settings" type="submit">Save settings</button>
        </form>
    </div>
    <div class="select-table" id="system-info-table" style="display: none">
        <div class="section_data">
            <div class="alert-help">
                <i class="fas fa-question-circle"></i> The following is a system report containing useful technical information for troubleshooting issues. If you need further help after viewing the report, do the screenshots of this page and send it to our Support.
            </div>
            <table class="status-table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    <th colspan="2">WordPress</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Home URL</td>
                    <td><?php echo esc_html(get_home_url()) ?></td>
                </tr>
                <tr>
                    <td>Site URL</td>
                    <td><?php echo esc_html(get_site_url()) ?></td>
                </tr>
                <tr>
                    <td>REST API Base URL</td>
                    <td><?php echo esc_html(rest_url()) ?></td>
                </tr>
                <tr>
                    <td>WordPress Version</td>
                    <td><?php echo esc_html($wp_version) ?></td>
                </tr>
                <tr>
                    <td>WordPress Memory Limit</td>
                    <td><?php echo esc_html(WP_MEMORY_LIMIT) ?></td>
                </tr>
                <tr>
                    <td>WordPress Debug Mode</td>
                    <td><?php echo esc_html(WP_DEBUG ? 'Yes' : 'No') ?></td>
                </tr>
                <tr>
                    <td>WordPress Debug Log</td>
                    <td><?php echo esc_html(WP_DEBUG_LOG ? 'Yes' : 'No'); ?></td>
                </tr>
                <tr>
                    <td>WordPress Script Debug Mode</td>
                    <td><?php echo esc_html(SCRIPT_DEBUG ? 'Yes' : 'No'); ?></td>
                </tr>
                <tr>
                    <td>WordPress Cron</td>
                    <td><?php echo esc_html(defined('DISABLE_WP_CRON') && DISABLE_WP_CRON ? 'Yes' : 'No'); ?></td>
                </tr>
                <tr>
                    <td>WordPress Alternate Cron</td>
                    <td><?php echo esc_html(defined('ALTERNATE_WP_CRON') && ALTERNATE_WP_CRON ? 'Yes' : 'No'); ?></td>
                </tr>
                </tbody>
            </table>
            <table class="status-table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    <th colspan="2">Web Server</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Software</td>
                    <td><?php echo esc_html($_SERVER['SERVER_SOFTWARE']) ?></td>
                </tr>
                <tr>
                    <td>Port</td>
                    <td><?php echo esc_html($_SERVER['SERVER_PORT']) ?></td>
                </tr>
                <tr>
                    <td>Document Root</td>
                    <td><?php echo esc_html($_SERVER['DOCUMENT_ROOT']) ?></td>
                </tr>
                </tbody>
            </table>
            <table class="status-table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    <th colspan="2">PHP</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Version</td>
                    <td><?php echo esc_html(phpversion()) ?></td>
                </tr>
                <tr>
                    <td>Memory Limit (memory_limit)</td>
                    <td><?php echo esc_html(ini_get('memory_limit')) ?></td>
                </tr>
                <tr>
                    <td>Maximum Execution Time (max_execution_time)</td>
                    <td><?php echo esc_html(ini_get('max_execution_time')) ?></td>
                </tr>
                <tr>
                    <td>Maximum File Upload Size (upload_max_filesize)</td>
                    <td><?php echo esc_html(ini_get('upload_max_filesize')) ?></td>
                </tr>
                <tr>
                    <td>Maximum File Uploads (max_file_uploads)</td>
                    <td><?php echo esc_html(ini_get('max_file_uploads')) ?></td>
                </tr>
                <tr>
                    <td>Maximum Post Size (post_max_size)</td>
                    <td><?php echo esc_html(ini_get('post_max_size')) ?></td>
                </tr>
                <tr>
                    <td>Maximum Input Variables (max_input_vars)</td>
                    <td><?php echo esc_html(ini_get('max_input_vars')) ?></td>
                </tr>
                <tr>
                    <td>cURL Enabled</td>
                    <td><?php $curl = curl_version();
                        if(isset($curl['version'])) {
                            echo esc_html("Yes (version $curl[version])");
                        } else {
                            echo esc_html("No");
                        } ?></td>
                </tr>
                <tr>
                    <td>Mcrypt Enabled</td>
                    <td><?php echo esc_html(function_exists('mcrypt_encrypt') ? 'Yes' : 'No') ?></td>
                </tr>
                <tr>
                    <td>Mbstring Enabled</td>
                    <td><?php echo esc_html(function_exists('mb_strlen') ? 'Yes' : 'No') ?></td>
                </tr>
                <tr>
                    <td>Loaded Extensions</td>
                    <td><?php echo esc_html(implode(', ', get_loaded_extensions())) ?></td>
                </tr>
                </tbody>
            </table>
            <table class="status-table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    <th colspan="2">Database Server</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Database Server</td>
                    <td><?php echo esc_html($wpdb->get_var('SELECT @@character_set_database')) ?></td>
                </tr>
                <tr>
                    <td>Database Collation</td>
                    <td><?php echo esc_html($wpdb->get_var('SELECT @@collation_database')) ?></td>
                </tr>
                </tbody>
            </table>
            <table class="status-table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    <th colspan="2">Date and Time</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>WordPress (Local) Timezone</td>
                    <td><?php echo esc_html(get_option('timezone_string')) ?></td>
                </tr>
                <tr>
                    <td>MySQL (UTC)</td>
                    <td><?php echo esc_html($wpdb->get_var('SELECT utc_timestamp()')) ?></td>
                </tr>
                <tr>
                    <td>MySQL (Local)</td>
                    <td><?php echo esc_html(date("F j, Y, g:i a", strtotime($wpdb->get_var('SELECT utc_timestamp()')))) ?></td>
                </tr>
                <tr>
                    <td>PHP (UTC)</td>
                    <td><?php echo esc_html(date('Y-m-d H:i:s')) ?></td>
                </tr>
                <tr>
                    <td>PHP (Local)</td>
                    <td><?php echo esc_html(date("F j, Y, g:i a")) ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
