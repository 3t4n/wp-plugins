<?php
/**
 * PurgeBox base class
 */
require_once dirname( __FILE__ ). '/class-purgebox-plugin.php';

/**
 * PurgeBox Admin.
 * @package RedBox
 * @author ShoheiTai
 * @copyright 2016 REDBOX All Rights Reserved.
 */
class PurgeBox_Admin extends PurgeBox_Plugin {

    /**
     * Option page query.
     * @var string
     */
    private static $__option_page_query = 'redbox-wp-purge';

    /**
     * Setting group name.
     * @var string
     */
    private static $__setting_group = 'purgebox_group';

    /**
     * Default constructor.
     */
    public function __construct() {
        $hooks = array( 'admin_menu', 'admin_init', 'admin_enqueue_scripts' , 'admin_bar_menu' );
        foreach($hooks as $hook) {
            add_action( $hook, array( $this, $hook ) , 100);
        }
        // Settings Link
        add_filter( 'plugin_action_links_'. self::_get_plugin_basename(), array( $this, 'add_setting_link' ), 10, 2 );

        // 設定が更新されたときに実行するカスタムケイパビリティの追加処理を設定
        add_action('update_option_' . self::$_option_prefix . 'purge_all_roles', array($this, 'purgebox_add_custom_capability'));
    }

    /**
     * Initialize admin page.
     */
    public function admin_init() {
        $this->_register_setting('version');
        $this->_register_setting('group');
        $this->_register_setting('api_key');
        $this->_register_setting('purge_path'); // Purge Path を登録
        $this->_register_setting('multisite_enabled'); // Multisite 設定を登録
        $this->_register_setting('manual_purgepath_enabled'); // 手動PurgePath 設定を登録
        // add purge all role
        register_setting( self::$__setting_group, self::$_option_prefix . 'purge_all_roles' );
    }

    public function purgebox_add_custom_capability() {
        global $wp_roles;
        if (!isset($wp_roles)) {
            return;
        }
    
        // 設定から許可されたロールを取得
        $allowed_roles = get_option(PurgeBox_Admin::$_option_prefix . 'purge_all_roles');
        if (!is_array($allowed_roles)) {
            $allowed_roles = array(); // 非配列の場合は空配列を設定
        }
    
        foreach ($wp_roles->role_names as $role_key => $role_name) {
            $role = get_role($role_key);
            if (!$role) {
                continue;
            }
    
            if (in_array($role_key, $allowed_roles)) {
                // 許可されたロールにケーパビリティを追加
                $role->add_cap('purge_all');
            } else {
                // 許可されていないロールからケーパビリティを削除
                $role->remove_cap('purge_all');
            }
        }
    }

    /**
     * Add the admin menu.
     */
    public function admin_menu() {
        add_options_page(
            self::PLUGIN_NAME. ' Settings',
            self::PLUGIN_NAME. ' Settings',
            'administrator',
            self::$__option_page_query,
            array(&$this, 'render')
        );
        if($this->_api_available()) {
            add_options_page(
                self::PLUGIN_NAME . ' Settings',
                null,
                'purge_all',
                self::$__option_page_query. '/purge-all',
                array(&$this, 'purge_all')
            );
        }
    }


    /**
     * Add the admin bar menu.
     * @param WP_Admin_Bar $wp_admin_bar
     */

     public function admin_bar_menu($wp_admin_bar) {
    // 現在のユーザーがPurge Allを利用できるか直接ケーパビリティでチェック
    if (current_user_can('purge_all')) {
            $title = sprintf('<span class="ab-label">%s</span>', self::PLUGIN_NAME);
            $id = 'purgebox-menu';
    
            // PurgeBoxのメインメニューを追加
            $wp_admin_bar->add_menu(array(
                'id'    => $id,
                'meta'  => array(),
                'title' => $title,
                'href'  => admin_url('options-general.php?page=' . self::$__option_page_query)
            ));
    
            // Purge Allのサブメニューを追加
            if ($this->_api_available()) {
                $wp_admin_bar->add_menu(array(
                    'parent' => $id,
                    'id'     => $id . '-purge-all',
                    'meta'   => array(),
                    'title'  => 'Purge All',
                    'href'   => wp_nonce_url(admin_url('options-general.php?page=' . self::$__option_page_query . '/purge-all'))
                ));
            }
        }
    }

    /**
     * Register scripts and styles needed for the admin page.
     * @param string $hook_suffix
     */
    public function admin_enqueue_scripts( $hook_suffix ) {
        if( 'settings_page_'. self::$__option_page_query !== $hook_suffix ) {
            return;
        }
        wp_register_style( 'purgebox-css', $this->_resource( 'css/purgebox.css' ) );
        wp_enqueue_style( 'purgebox-css' );
    }

    /**
     * Custom action links for the plugin.
     * @params array $links
     * @return array
     */
    public function add_setting_link( $links ) {
        $settings_link = '<a href="' . get_bloginfo( 'wpurl' ) . '/wp-admin/options-general.php?page='. self::$__option_page_query. '">Settings</a>';
        array_unshift( $links, $settings_link );
        return $links;
    }

    /**
     * Rendering the admin page.
     */
    public function render() {
        $value['api_key'] = esc_attr( self::_get_option( 'api_key' ) );
        $value['group'] = esc_attr( self::_get_option( 'group' ) );
        $value['purge_path'] = esc_attr(self::_get_option('purge_path', '/*')); // デフォルト値は '/*'
        $value['multisite_enabled'] = esc_attr(self::_get_option('multisite_enabled', '0')); // デフォルト値は '0'
        $value['manual_purgepath_enabled'] = esc_attr(self::_get_option('manual_purgepath_enabled', '0')); // デフォルト値は '0'
    
        // 手動PurgePathが無効の場合に自動設定を行う
        if ($value['manual_purgepath_enabled'] !== '1') {
            // マルチサイトが有効で、かつチェックが入っている場合
            if ($value['multisite_enabled'] === '1' && is_multisite()) {
                // 現在ログインしているサブサイトのパスを取得
                $details = get_blog_details(get_current_blog_id());
                $value['purge_path'] = rtrim($details->path, '/') . '/*';
            } elseif (!is_multisite()) {
                // マルチサイトでない場合、サブディレクトリのパスを取得
                $home_url = parse_url(home_url());
                $subdirectory = isset($home_url['path']) && $home_url['path'] !== '/' ? rtrim($home_url['path'], '/') . '/*' : '/*';
                $value['purge_path'] = $subdirectory;
            }
        } else {
            // 手動でPurge Pathが設定されていれば、その値を保持
            $value['purge_path'] = esc_attr(self::_get_option('purge_path', '/*')); // 手動設定の場合のデフォルト値
        }

        update_option(self::$_option_prefix . 'purge_path', $value['purge_path']);
    
        $view['plugin_name'] = self::PLUGIN_NAME;
        $view['prefix'] = self::$_option_prefix;
        $view['submit_button'] = get_submit_button();
        $view['options'] = '';
    
        $default = '2';
        foreach( array('2') as $version ) {
            $selected = ($default === $version) ? ' selected="selected"' : '';
            $view['options'] .= '<option value="'. $version. '" '. $selected. '>'. $version. '</option>';
        }
    
        echo '<form method="post" action="options.php">';
        settings_fields( self::$__setting_group );
    
        // 全ロールを取得して、チェックボックスリストを生成
        $roles_checkboxes = '';
        global $wp_roles;
        foreach ($wp_roles->role_names as $role_value => $role_name) {
            $role = get_role($role_value);
            $checked = $role->has_cap('purge_all') ? 'checked' : '';
            $roles_checkboxes .= "<label><input type='checkbox' name='" . self::$_option_prefix . "purge_all_roles[]' value='$role_value' $checked> $role_name</label><br>";
        }
    
        $multisite_checked = ($value['multisite_enabled'] == '1') ? 'checked' : '';
        $manual_purgepath_enabled = ($value['manual_purgepath_enabled'] == '1') ? 'checked' : '';
    
        echo <<<HTML
        <div id="redbox-wrap">
            <h1>{$view['plugin_name']} Setting</h1>
            <fieldset>
                <p>
                    <label>
                        API Version : <select name="{$view['prefix']}version" required="required">{$view['options']}</select>
                    </label>
                </p>
                <p>
                    <label>
                        API Key: <input type="password" name="{$view['prefix']}api_key" value="{$value['api_key']}" required="required">
                    </label>
                </p>
                <p>
                    <label>
                        Group : <input type="text" name="{$view['prefix']}group" value="{$value['group']}" required="required">
                    </label>
                </p>
                <p>
                    <label>
                        Purge Path: <input type="text" name="{$view['prefix']}purge_path" value="{$value['purge_path']}" placeholder="e.g., /* or /specific/path">
                    </label>
                </p>
                <p>
                    <label>
                        Manual Purge Path:
                        <input type="checkbox" name="{$view['prefix']}manual_purgepath_enabled" value="1" $manual_purgepath_enabled>
                        <br>
                        キャッシュ削除パスを手動設定する場合チェックを入れてください。
                    </label>
                </p>
                <p>
                    <label>
                        Multisite Enabled:
                        <input type="checkbox" name="{$view['prefix']}multisite_enabled" value="1" $multisite_checked>
                        <br>
                        WordPressマルチサイト（ディレクトリ版）を利用している場合はチェックを入れてください。
                    </label>
                </p>
                <h2>Purge Allボタンを許可するロールを選択して下さい。</h2>
                $roles_checkboxes
            </fieldset>
            <p>{$view['submit_button']}</p>
        </div>
        HTML;
    
        echo '</form>';
    }
    

    /**
     * Execute purge all action.
     */
    public function purge_all() {
        do_action( 'purge_box_purge_all' );
        echo '<div class="message updated"><p>Purge request was successful.</p></div>';
    }


    /**
     * Wrapeer function for the register_setting().
     * @param string $option
     */
    protected function _register_setting( $option ) {
        register_setting( self::$__setting_group, self::$_option_prefix. $option );
    }

    /**
     * Get the URL to the resource in the plugin directory.
     * @param string $path The relative path for static resources.
     * @return
     */
    protected function _resource( $path = '' ) {
        return self::_get_plugin_url( 'assets/'. $path );
    }
}

