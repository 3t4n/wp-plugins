<?php
/*
 * RB Disable Right Click
 * Version:           1.0.0 - 38451
 * Author:            RBS
 * Date:              03 02 2020 12:11:29 GMT
 */

class rbDisableRightClick
{

    private static $instance = null;

    private $options;
    private $options_name = 'rb_disable_right_click';
    private $modified_types = array();

    private $post_type = 'post';


    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }


    public function __construct()
    {
        $this->options = get_option($this->options_name, array());
        $this->hooks();
    }


    public function hooks()
    {
        add_action('plugins_loaded', array($this, 'registerTextDomain'));

        if (is_admin()) {
            add_action('admin_menu', array($this, 'settingsMenu'));
            add_filter('plugin_action_links', array($this, 'pluginActionsLinks'), 10, 2);
        }
        if (!$this->isOptionSave()) {
            add_action('all_admin_notices', array($this, 'setupNotice'));
        }

        if ( $this->getOptionValue() ) {
         add_action( 'wp_body_open', array($this, 'addFrontendCode') );
        }

    }


    public function addFrontendCode()
    {
        echo'<script>'
            .'const contentProtection = function(){ return false };'
            .'document.body.oncontextmenu = contentProtection;'
            .'document.body.onselectstart = contentProtection;'
            .'document.body.ondragstart = contentProtection;'
        .'</script>';
    }


    public function addAdminCss()
    {
        echo '<style>#adminmenu .toplevel_page_rb_plugins_settings > .wp-menu-image.dashicons-rest-api:before{color: #99d000;}</style>';
    }
    

    private function isAllowedCopy()
    {
        return current_user_can('edit_posts');
    }


    private function isSupportPostType($post_type)
    {
        return $this->post_type == $post_type;
    }


    private function save_options()
    {
        update_option($this->options_name, $this->options);
        echo '<div class="updated fade"><p>' . __('Settings saved.', 'disable-right-click-rb') . '</p></div>';
    }


    private function isOptionSave()
    {
        return isset($this->options['enable']);
    }

    private function getOptionValue()
    {
        return $this->isOptionSave() && $this->options['enable'] ? true : false;
    }


    public function registerTextDomain()
    {
        load_plugin_textdomain('disable-right-click-rb', false, RB_DISABLE_RIGHT_CLICK_PATH . 'languages');
    }


    private function settingsPageUrl()
    {
        return add_query_arg('page', 'rb_disable_right_click_settings', admin_url('admin.php'));
    }


    public function setupNotice()
    {
        if (strpos(get_current_screen()->id, 'settings_page_rb_disable_right_click_settings') === 0) {
            return;
        }

        if (strpos(get_current_screen()->id, 'rb-plugins_page_rb_duplicate_post_settings') === 0) {
            return;
        }

        if (strpos(get_current_screen()->id, 'rb-plugins_page_rb_disable_right_click_settings') === 0) {
            return;
        }
        
        if (strpos(get_current_screen()->id, 'rb_duplicate_post_settings') === 0) {
            return;
        }

        $hascaps = current_user_can('manage_options');
        if( !$hascaps )  return ;

        echo '<div class="updated fade">
                <p>
                    ' . sprintf(__('The <em>RB Disable Right Click </em> plugin is active, but isn\'t configured to do anything yet. Visit the <a href="%s">configuration page</a> to enable right click protection functionality.', 'disable-right-click-rb'), esc_attr($this->settingsPageUrl())) . '
                </p>
            </div>';        
    }


    public function pluginActionsLinks($links, $file)
    {
        static $plugin;

        if ($file == 'disable-right-click-rb/disable-right-click-rb.php' && current_user_can('manage_options')) {
            array_unshift(
                $links,
                sprintf('<a href="%s">%s</a>', esc_attr($this->settingsPageUrl()), __('Settings'))
            );
        }

        return $links;
    }


    public function pluginsListPage()
    {
        echo "empty page";
    }


    public function settingsMenu()
    {
        $menu_exits = menu_page_url( 'rb_plugins_settings', false );
        if(!$menu_exits){
            $title_plugins = __('RB Plugins', 'disable-right-click-rb');
            add_menu_page( $title_plugins,  $title_plugins, null, 'rb_plugins_settings',  array($this, 'pluginsListPage'), 'dashicons-rest-api', 20);
            add_action('admin_head', array($this, 'addAdminCss'));
        }

        $title = __('Disable Right Click', 'disable-right-click-rb');
        add_submenu_page('rb_plugins_settings', $title, $title, 'manage_options', 'rb_disable_right_click_settings', array($this, 'options'));
    }


    public function options()
    {
        include RB_DISABLE_RIGHT_CLICK_PATH . 'information.php';
        include RB_DISABLE_RIGHT_CLICK_PATH . 'options.php';
    }
}
