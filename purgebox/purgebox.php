<?php
/*
Plugin Name: PurgeBox
Plugin URI: https://ja.wordpress.org/plugins/purgebox/
Description: REDBOX CDN Purge Plugin.
Author: REDBOX
Version: 1.9
Author URI: https://www.redbox.ne.jp
License: GPL3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

*/
define( 'PURGEBOX_PLUGIN_FILE', __FILE__ );

// Import classes
require_once dirname( __FILE__ ). '/classes/class-purgebox-api.php';
require_once dirname( __FILE__ ). '/classes/class-purgebox-purge.php';
require_once dirname( __FILE__ ). '/classes/class-purgebox-admin.php';
// Setup Purging
new PurgeBox_Purge();

// Setup admin
if( is_admin() ) {
	new PurgeBox_Admin();
}


// プラグインがロードされるたびにアップデートをチェックする関数
function purgebox_check_and_update_version() {
    if (!function_exists('get_plugin_data')) {
        require_once(ABSPATH . 'wp-admin/includes/plugin.php');
    }
    $plugin_data = get_plugin_data(PURGEBOX_PLUGIN_FILE);
    $current_version = $plugin_data['Version'];
    $saved_version = get_option('purgebox_plugin_version');

    // バージョンが古い場合はアップデート処理を実行
    if (version_compare($saved_version, $current_version, '<')) {
        // アップデート処理をここに実装
        purgebox_run_update_procedures();

        // アップデート処理の後、新しいバージョンを保存
        update_option('purgebox_plugin_version', $current_version);

        // PurgePath と MultisiteEnabled purgebox_manual_purgepath_enabledの初期値を設定
        $existing_purge_path = get_option('purgebox_purge_path', null);
        $existing_multisite_enabled = get_option('purgebox_multisite_enabled', null);
        $existing_manual_purgepath_enabled = get_option('purgebox_manual_purgepath_enabled', null);

        if ($existing_purge_path === null) {
            update_option('purgebox_purge_path', '/*'); // デフォルト値を設定
        }

        if ($existing_multisite_enabled === null) {
            update_option('purgebox_multisite_enabled', '0'); // デフォルト値を設定
        }

        if ($existing_manual_purgepath_enabled === null) {
            update_option('purgebox_manual_purgepath_enabled', '0'); // デフォルト値を設定
        }
    }
}

add_action('plugins_loaded', 'purgebox_check_and_update_version');


// アップデート時に実行する具体的な処理
function purgebox_run_update_procedures() {
    // ここにアップデートに必要なコードを書く
    add_purgebox_admin_role();
    error_log('plugin update detected. added to administrator.');
}



// プラグイン有効化時に実行される関数
function add_purgebox_admin_role() {

    // Administratorロールに 'purge_all' ケーパビリティを追加
    $role = get_role('administrator');
    if ($role) {
        $role->add_cap('purge_all');
        error_log('purge_all capability added to administrator.');
    }else{
        error_log('Failed to get the administrator role.');

    }
}

// プラグイン有効化時に実行される関数を登録
register_activation_hook(__FILE__, 'add_purgebox_admin_role');


// ネットワーク設定ページを追加
add_action('network_admin_menu', function () {
    add_menu_page(
        'PurgeBox Network Settings',
        'PurgeBox',
        'manage_network',
        'purgebox-network-settings',
        'purgebox_render_network_settings_page'
    );
});

function purgebox_render_network_settings_page() {
    if ($_POST['submit']) {
        check_admin_referer('purgebox_network_settings');

        // 入力値を保存
        $api_key = isset($_POST['api_key']) ? sanitize_text_field($_POST['api_key']) : '';
        $group = isset($_POST['group']) ? sanitize_text_field($_POST['group']) : '';
        $multisite_enabled = isset($_POST['multisite_enabled']) ? '1' : '0';

        update_site_option('purgebox_api_key', $api_key);
        update_site_option('purgebox_group', $group);
        update_site_option('purgebox_multisite_enabled', $multisite_enabled);

        echo '<div class="updated"><p>Settings Saved!</p></div>';
    }

    // 現在の設定値を取得
    $api_key = get_site_option('purgebox_api_key', '');
    $group = get_site_option('purgebox_group', '');
    $multisite_enabled = get_site_option('purgebox_multisite_enabled', '0');
    ?>
    <div class="wrap">
        <h1>PurgeBox Network Settings</h1>
        <form method="post">
            <?php wp_nonce_field('purgebox_network_settings'); ?>
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="api_key">API Key</label></th>
                    <td>
                        <input type="text" id="api_key" name="api_key" value="<?php echo esc_attr($api_key); ?>" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="group">Group</label></th>
                    <td>
                        <input type="text" id="group" name="group" value="<?php echo esc_attr($group); ?>" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="multisite_enabled">Enable Multisite</label></th>
                    <td>
                        <input type="checkbox" id="multisite_enabled" name="multisite_enabled" value="1" <?php checked($multisite_enabled, '1'); ?>>
                        Enable multisite functionality for PurgeBox
                    </td>
                </tr>
            </table>
            <p class="submit">
                <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
            </p>
        </form>
    </div>
    <?php
}


