<?php

include_once( ABSPATH . 'wp-includes/pluggable.php' );
include_once( ABSPATH . 'wp-admin/includes/template.php' );
include_once( 'paybox-plugins-installer.php' );

class Paybox_Helper {

    public static function shortcodes() {
        global $current_user;
        get_currentuserinfo();
//        var_dump($current_user);
        $email = !empty($current_user->user_email) ? $current_user->user_email : '';
        $html = '<form>
        Email: <input type = "text" name = "email" value="' . $email . '"><br>
        <input type="submit" value="Payer" />
        </form>';

        return $html;
    }

    public static function getPluginGeneric() {
        return $plugins = array(
            'paybox' => array(
                'file_path' => 'paybox-by-verifone-integration/paybox-by-verifone-integration.php',
                'required' => true,
                'name' => 'Wordpress Paybox Payment plugin',
                'slug' => 'paybox',
                'author' => 'Paybox Verifone',
                'depend' => '',
                'wordpress_org_name' => 'paybox-by-verifone-integration',
                'external_url' => 'http://www1.paybox.com/espace-integrateur-documentation/modules-by-paybox/',
            ),
        );
    }

    public static function getPlugins() {
        $plugins = array();
        include(plugin_dir_path(dirname(__FILE__)) . 'config_plugins.php');
        return $plugins;
    }

    public static function getStringMessages() {
        return array(
            'page_title' => __('Install Required Plugins', 'paybox'),
            'menu_title' => __('Install Plugins', 'paybox'),
            'installing' => __('Installing Plugin: %s', 'paybox'),
            'oops' => __('Something went wrong.', 'paybox'),
            'notice_can_install_required' => _n_noop('Paybox plugin requires the following plugin: %1$s.', 'Paybox plugin requires the following plugins: %1$s.'),
            'notice_can_install_recommended' => _n_noop('Paybox plugin recommends the following plugin: %1$s.', 'Paybox plugin recommends the following plugins: %1$s.'),
            'notice_cannot_install' => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.'),
            'notice_can_activate_required' => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.'),
            'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.'),
            'notice_cannot_activate' => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.'),
            'notice_ask_to_update' => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.'),
            'notice_cannot_update' => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.'),
            'activate_link' => _n_noop('Begin activating plugin', 'Begin activating plugins'),
            'install_link' => _n_noop('Begin installing plugin', 'Begin installing plugins'),
            'return' => __('Return to Required Plugins Installer', 'paybox'),
            'dashboard' => __('Return to the dashboard', 'paybox'),
            'plugin_activated' => __('Plugin activated successfully.', 'paybox'),
            'activated_successfully' => __('The following plugin was activated successfully:', 'paybox'),
            'complete' => __('All plugins installed and activated successfully. %1$s', 'paybox'),
            'dismiss' => __('Dismiss this notice', 'paybox'),
            'force_install_message_before' => __('Installation du module Paybox %s.', 'paybox'),
            'force_install_message_after' => __('Installation du module Paybox %s terminé.', 'paybox'),
        );
    }

    public static function notices($plugins = null) {
        global $current_screen;
        $installed_plugins = get_plugins(); // Retrieve a list of all the plugins

        $message = array(); // Store the messages in an array to be outputted after plugins have looped through.
        $install_link = false;   // Set to false, change to true in loop if conditions exist, used for action link 'install'.
        $install_link_count = 0;       // Used to determine plurality of install action link text.
        $activate_link = false;   // Set to false, change to true in loop if conditions exist, used for action link 'activate'.
        $activate_link_count = 0;
        $display = false;
        $strings = Paybox_Helper::getStringMessages();
        $dismissable = false;
        global $wp_version;
        $settings = (array) get_option('paybox_state_settings');

        $plugins = is_null($plugins) ? Paybox_Helper::getPlugins() : $plugins;
        foreach ($plugins as $plugin) {

            if ($plugin['depend'] == 'WooCommerce') {
                /**
                 * Check if WooCommerce is active
                 * */
                if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
                    $display = true;
                }
            }
            if ($plugin['depend'] == 'Wp E-Commerce') {
                /**
                 * Check if WpEcommerce is active
                 * */
                if (in_array('wp-e-commerce/wp-shopping-cart.php', apply_filters('active_plugins', get_option('active_plugins')))) {
                    $display = true;
                }
            }

            // If the plugin is installed and active, check for minimum version argument before moving forward.
            if (is_plugin_active($plugin['file_path'])) {
                
            }
            // Not installed or version change
            $forceInstall = false;
            $alias = 'tag_' . $plugin['wordpress_org_name'];
            if(isset($settings[$alias]) && isset($installed_plugins[$plugin['file_path']])){
                $data = get_plugin_data(ABSPATH . 'wp-content/plugins/' . $plugin['file_path']);
                if($settings[$alias] != $data['Version']){
                    $forceInstall = true;
                }
            }

            if (!isset($installed_plugins[$plugin['file_path']]) || $forceInstall) {
                $install_link = true; // We need to display the 'install' action link.
                $install_link_count++; // Increment the install link count.
                if (current_user_can('install_plugins')) {
                    if ($plugin['required']) {
                        if ($display) {

                            $installer = new Paybox_Plugin_Installer();
                            $imgPath = plugin_dir_url(dirname(__FILE__)) . 'images/logo.png';
                            $installer->skin->feedback('<img src="'.$imgPath .'"" alt="Paybox by Verifone" />');
                            show_message(sprintf($strings['force_install_message_before'], $plugin['name']));
                            if($forceInstall){
                                $plugin['version'] = $settings[$alias];
                            }
                            if($installer->install($plugin)){
                                activate_plugin($plugin['file_path']);
                                show_message(sprintf($strings['force_install_message_after'], $plugin['name']));
                                $update_actions =  array(
                                'plugins_page' => '<a href="' . self_admin_url( 'plugins.php' ) . '" target="_parent">' . __( 'Return to Plugins page' ) . '</a>'
                                );
                            $update_actions = apply_filters( 'update_plugin_complete_actions', $update_actions, $installer );

                            if ( ! empty($update_actions) )
                                $installer->skin->feedback(implode(' | ', (array)$update_actions));
                                                    break;
                            }
                            //AutoInstall plugin
                            // Paybox_Helper::install_plugin($plugin['wordpress_org_name']);
                            // echo 'rzrezr';
                            // die();
                            $message['notice_can_install_required'][] = $plugin['name'];
                        }
                    }
                    // This plugin is only recommended.
                    else {
                        if ($display) {
                            $message['notice_can_install_recommended'][] = $plugin['name'];
                        }
                    }
                }
                // Need higher privileges to install the plugin.
                else {
                    $message['notice_cannot_install'][] = $plugin['name'];
                }
            }
            // Installed but not active.
            elseif (is_plugin_inactive($plugin['file_path'])) {
                $activate_link = true; // We need to display the 'activate' action link.
                $activate_link_count++; // Increment the activate link count.
                if (current_user_can('activate_plugins')) {
                    if (isset($plugin['required']) && $plugin['required']) {
                        $message['notice_can_activate_required'][] = $plugin['name'];
                    }
                    // This plugin is only recommended.
                    else {
                        $message['notice_can_activate_recommended'][] = $plugin['name'];
                    }
                }
                // Need higher privileges to activate the plugin.
                else {
                    $message['notice_cannot_activate'][] = $plugin['name'];
                }
            }
        }

        if (!empty($message)) {
            krsort($message); // Sort messages.
            $rendered = ''; // Display all nag messages as strings.

            foreach ($message as $type => $plugin_groups) {
                $linked_plugin_groups = array();

                // Count number of plugins in each message group to calculate singular/plural message.
                $count = count($plugin_groups);

                // Loop through the plugin names to make the ones pulled from the .org repo linked.
                foreach ($plugin_groups as $plugin_group_single_name) {
                    $external_url = Paybox_Helper::get_plugin_data_from_name($plugin_group_single_name, 'external_url');
                    $source = Paybox_Helper::get_plugin_data_from_name($plugin_group_single_name, 'source');

                    if ($external_url && preg_match('|^http(s)?://|', $external_url)) {
                        $linked_plugin_groups[] = '<a href="' . esc_url($external_url) . '" title="' . $plugin_group_single_name . '" target="_blank">' . $plugin_group_single_name . '</a>';
                    } elseif (!$source || preg_match('|^http://wordpress.org/extend/plugins/|', $source)) {
                        $url = add_query_arg(
                                array(
                            'tab' => 'plugin-information',
                            'plugin' => Paybox_Helper::get_plugin_data_from_name($plugin_group_single_name, 'wordpress_org_name'),
                            'TB_iframe' => 'true',
                            'width' => '640',
                            'height' => '500',
                                ), network_admin_url('plugin-install.php')
                        );

                        $linked_plugin_groups[] = '<a href="' . esc_url($url) . '" class="thickbox" title="' . $plugin_group_single_name . '">' . $plugin_group_single_name . '</a>';
                    } else {
                        $linked_plugin_groups[] = $plugin_group_single_name; // No hyperlink.
                    }

                    if (isset($linked_plugin_groups) && (array) $linked_plugin_groups) {
                        $plugin_groups = $linked_plugin_groups;
                    }
                }

                $last_plugin = array_pop($plugin_groups); // Pop off last name to prep for readability.
                $imploded = empty($plugin_groups) ? '<em>' . $last_plugin . '</em>' : '<em>' . ( implode(', ', $plugin_groups) . '</em> ' . __('and', 'paybox') . ' <em>' . $last_plugin . '</em>' );

                $rendered .= '<p>' . sprintf(translate_nooped_plural($strings[$type], $count, 'paybox'), $imploded, $count) . '</p>';
            }
            // Setup variables to determine if action links are needed.
            $show_install_link = $install_link ? '<a href="">' . translate_nooped_plural($strings['install_link'], $install_link_count, 'paybox') . '</a>' : '';
            $show_activate_link = $activate_link ? '<a href="">' . translate_nooped_plural($strings['activate_link'], $activate_link_count, 'paybox') . '</a>' : '';

            // Define all of the action links.
            $action_links = apply_filters(
                    'tgmpa_notice_action_links', array(
                'install' => ( current_user_can('install_plugins') ) ? $show_install_link : '',
                'activate' => ( current_user_can('activate_plugins') ) ? $show_activate_link : '',
                'dismiss' => $dismissable ? '<a class="dismiss-notice" href="' . add_query_arg('paybox-dismiss', 'dismiss_admin_notices') . '" target="_parent">' . $strings['dismiss'] . '</a>' : '',
                    )
            );

            $action_links = array_filter($action_links); // Remove any empty array items.
            if ($action_links) {
                $rendered .= '<p>' . implode(' | ', $action_links) . '</p>';
            }

            // Register the nag messages and prepare them to be processed.
            $nag_class = version_compare($wp_version, '3.8', '<') ? 'updated' : 'error';
            if (!empty($strings['nag_type'])) {
                add_settings_error('paybox', 'paybox', $rendered, sanitize_html_class(strtolower($strings['nag_type'])));
            } else {
                add_settings_error('paybox', 'paybox', $rendered, $nag_class);
            }
        }

        if (!empty($current_screen)) {
            if ('options-general' !== $current_screen->parent_base) {
                settings_errors('paybox');
            }
        } else {
            settings_errors('paybox');
        }
    }

    public static function get_plugin_data_from_name($name, $data = 'slug') {
        foreach (Paybox_Helper::getPlugins() as $plugin => $values) {
            if ($name == $values['name'] && isset($values[$data])) {
                return $values[$data];
            }
        }
        return false;
    }

    public static function generateForm($type, $settings, $key) {
        $payboxConfig = new Paybox_Config(array(), '', '');
        $fields = $payboxConfig->init_form_fields($type);
        $defaults = $payboxConfig->getDefaults();

        foreach ($fields as $k => $value) {
            if (!isset($settings[$k]) && isset($value['default'])) {
                $settings[$k] = $value['default'];
            }
        }

        if (isset($settings['hmackey'])) {
            $crypto = new PayboxEncrypt();
            $settings['hmackey'] = $crypto->decrypt($settings['hmackey']);
        }


        $return = <<<EOF
        <table class = "form-table">
        <tbody>
        <tr valign = "top">
        <th scope = "row" class = "titledesc">
        <label for = "paybox_enabled">{$fields['enabled']['title']}</label>
        </th>
        <td class="forminp">
            <fieldset>
                <legend class="screen-reader-text"><span>{$fields['enabled']['title']}</span></legend>
                <label for="paybox_enabled">
                    <select class="select " name="{$key}[enabled]" id="paybox_enabled" style="">
EOF;
        foreach ($fields['enabled']['options'] as $id => $option) {
            $selected = ($settings['enabled'] == $id) ? ' selected ' : '';
            $return .= <<<EOF
                    <option {$selected} value = "{$id}"> {$option}</option>
EOF;
        }
        $return .= <<<EOF
                    </select>
            </fieldset>
        </td>
        </tr>
        <tr valign="top">
            <th scope="row" class="titledesc">
                <label for="paybox_title">{$fields['title']['title']}</label>
            </th>
            <td class="forminp">
                <fieldset>
                    <legend class="screen-reader-text"><span>{$fields['title']['title']}</span></legend>
                    <input class="input-text regular-input " type="text" name="{$key}[title]" id="paybox_title" style="" value="{$settings['title']}" placeholder="">
                    <p class="description">{$fields['title']['description']}</p>
                </fieldset>
            </td>
        </tr>
        <tr valign="top">
            <th scope="row" class="titledesc">
                <label for="paybox_description">{$fields['description']['title']}</label>
            </th>
            <td class="forminp">
                <fieldset>
                    <legend class="screen-reader-text"><span>{$fields['description']['title']}</span></legend>
                    <textarea rows="3" cols="20" class="input-text wide-input " type="textarea" name="{$key}[description]" id="paybox_description" style="" placeholder="">{$settings['description']}</textarea>
                    <p class="description">{$fields['description']['description']}</p>
                </fieldset>
            </td>
        </tr>
EOF;
        if ($type == 'standard') {
            $return .= <<<EOF
        <tr valign="top">
            <th scope="row" class="titledesc">
                <label for="paybox_delay">{$fields['delay']['title']}</label>
            </th>
            <td class="forminp">
                <fieldset>
                    <legend class="screen-reader-text"><span>{$fields['delay']['title']}</span></legend>
                    <select class="select " name="{$key}[delay]" id="paybox_delay" style="">
EOF;
            foreach ($fields['delay']['options'] as $id => $option) {
                $selected = ($settings['delay'] == $id) ? ' selected ' : '';
                $return .= <<<EOF
                    <option {$selected} value = "{$id}"> {$option}</option>
EOF;
            }
            $return .= <<<EOF
                    </select>
                </fieldset>
            </td>
        </tr>
EOF;
        }
        $return .= <<<EOF
        <tr valign="top">
            <th scope="row" class="titledesc">
                <label for="paybox_amount">{$fields['amount']['title']}</label>
            </th>
            <td class="forminp">
                <fieldset>
                    <legend class="screen-reader-text"><span>{$fields['amount']['title']}</span></legend>
                    <input class="input-text regular-input " type="text" name="{$key}[amount]" id="paybox_amount" style="" value="{$settings['amount']}" placeholder="">
                    <p class="description">{$fields['amount']['description']}</p>
                </fieldset>
            </td>
        </tr>
        </tbody>
        </table>
        <h3 class="settings-sub-title " id="paybox_3ds">3D Secure</h3>
        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for="paybox_3ds_enabled">{$fields['3ds_enabled']['title']}</label>
                    </th>
                    <td class="forminp">
                        <fieldset>
                            <legend class="screen-reader-text"><span>{$fields['3ds_enabled']['title']}</span></legend>
                            <select class="select " name="{$key}[3ds_enabled]" id="paybox_3ds_enabled" style="">
EOF;
        foreach ($fields['3ds_enabled']['options'] as $id => $option) {
            $selected = ($settings['3ds_enabled'] == $id) ? ' selected ' : '';
            $return .= <<<EOF
                    <option {$selected} value = "{$id}"> {$option}</option>
EOF;
        }
        $return .= <<<EOF
                    </select>
                            <p class="description">{$fields['3ds_enabled']['description']}</p>
                        </fieldset>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for="paybox_3ds_amount">{$fields['3ds_amount']['title']}</label>
                    </th>
                    <td class="forminp">
                        <fieldset>
                            <legend class="screen-reader-text"><span>{$fields['3ds_amount']['title']}</span></legend>
                            <input class="input-text regular-input " type="text" name="{$key}[3ds_amount]" id="paybox_3ds_amount" style="" value="{$settings['3ds_amount']}" placeholder="">
                            <p class="description">{$fields['3ds_amount']['description']}</p>
                        </fieldset>
                    </td>
                </tr>
            </tbody>
        </table>
        <h3 class="settings-sub-title " id="paybox_paybox_account">Paybox account</h3>
        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for="paybox_site">{$fields['site']['title']}</label>
                    </th>
                    <td class="forminp">
                        <fieldset>
                            <legend class="screen-reader-text"><span>{$fields['site']['title']}</span></legend>
                            <input class="input-text regular-input " type="text" name="{$key}[site]" id="paybox_site" style="" value="{$settings['site']}" placeholder="">
                            <p class="description">{$fields['site']['description']}</p>
                        </fieldset>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for="paybox_rank">{$fields['rank']['title']}</label>
                    </th>
                    <td class="forminp">
                        <fieldset>
                            <legend class="screen-reader-text"><span>{$fields['rank']['title']}</span></legend>
                            <input class="input-text regular-input " type="text" name="{$key}[rank]" id="paybox_rank" style="" value="{$settings['rank']}" placeholder="">
                            <p class="description">{$fields['rank']['description']}</p>
                        </fieldset>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for="paybox_identifier">{$fields['identifier']['title']}</label>
                    </th>
                    <td class="forminp">
                        <fieldset>
                            <legend class="screen-reader-text"><span>{$fields['identifier']['title']}</span></legend>
                            <input class="input-text regular-input " type="text" name="{$key}[identifier]" id="paybox_identifier" style="" value="{$settings['identifier']}" placeholder="">
                            <p class="description">{$fields['identifier']['description']}</p>
                        </fieldset>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for="paybox_hmackey">{$fields['hmackey']['title']}</label>
                    </th>
                    <td class="forminp">
                        <fieldset>
                            <legend class="screen-reader-text"><span>{$fields['hmackey']['title']}</span></legend>
                            <input class="input-text regular-input " type="text" name="{$key}[hmackey]" id="paybox_hmackey" style="" value="{$settings['hmackey']}" placeholder="">
                            <p class="description">{$fields['hmackey']['description']}</p>
                        </fieldset>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for="paybox_environment">{$fields['environment']['title']}</label>
                    </th>
                    <td class="forminp">
                        <fieldset>
                            <legend class="screen-reader-text"><span>{$fields['environment']['title']}</span></legend>
                            <select class="select " name="{$key}[environment]" id="paybox_delay" style="">
EOF;
        foreach ($fields['environment']['options'] as $id => $option) {
            $selected = ($settings['environment'] == $id) ? ' selected ' : '';
            $return .= <<<EOF
                    <option {$selected} value = "{$id}"> {$option}</option>
EOF;
        }
        $return .= <<<EOF
                    </select>
                            <p class="description">{$fields['environment']['description']}</p>
                        </fieldset>
                    </td>
                </tr>
            </tbody>
        </table>
        <h3 class="settings-sub-title " id="paybox_technical">Technical settings</h3>
        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for="paybox_debug">{$fields['debug']['title']}</label>
                    </th>
                    <td class="forminp">
                        <fieldset>
                            <legend class="screen-reader-text"><span>{$fields['debug']['title']}</span></legend>
                            <label for="paybox_debug">
                                <select class="select " name="{$key}[debug]" id="paybox_debug" style="">
EOF;
        foreach ($fields['debug']['options'] as $id => $option) {
            $selected = ($settings['debug'] == $id) ? ' selected ' : '';
            $return .= <<<EOF
                    <option {$selected} value = "{$id}"> {$option}</option>
EOF;
        }
        $return .= <<<EOF
                    </select>
                        </fieldset>
                    </td>
                </tr>
            </tbody>
        </table>
EOF;

        return $return;
    }

}
