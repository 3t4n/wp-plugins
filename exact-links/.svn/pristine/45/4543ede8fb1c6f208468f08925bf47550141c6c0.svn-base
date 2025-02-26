<?php

namespace ExactLinks\App\Hooks\Handlers;

use ExactLinks\Framework\Foundation\Config;
use ExactLinks\App\Hooks\Handlers\ActivationHandler;
use ExactLinks\App\Models\Link;
use ExactLinks\App\App;
use ExactLinks\App\Libs\Translation\TranslationStrings;
    
class AdminPageHandler
{

    public function addMenuPage()
    {
        $permisison = 'manage_options';

        if (!current_user_can($permisison)) {
            return;
        }

        add_menu_page(
            __('Exact Links', 'exact-links'),
            __('Exact Links', 'exact-links'),
            $permisison,
            'wplink-exactlinks',
            array($this, 'renderPage'),
            $this->getMenuIcon(),
            27
        );

        add_submenu_page(
            'wplink-exactlinks',
            __('All Links', 'exact-links'),
            __('All Links', 'exact-links'),
            $permisison,
            'wplink-exactlinks',
            array($this, 'renderPage')
        );

        add_submenu_page(
            'wplink-exactlinks',
            __('Create Link', 'exact-links'),
            __('Create Link', 'exact-links'),
            $permisison,
            'admin.php?page=wplink-exactlinks#/create_link',
        );

        add_submenu_page(
            'wplink-exactlinks',
            __('Global Settings', 'exact-links'),
            __('Global Settings', 'exact-links'),
            $permisison,
            'admin.php?page=wplink-exactlinks#/global_settings',
        );

        add_submenu_page(
            'wplink-exactlinks',
            __('Support', 'exact-links'),
            __('Support', 'exact-links'),
            $permisison,
            'admin.php?page=wplink-exactlinks#/support',
        );

    }

    public function renderPage()
    {
        echo wp_kses_post("<div class='wrap exactlinks_links_wrap'><div id='wp_exactlinks_app'></div></div>");
        $this->checkForDbMigration();

        $app = App::getInstance();
        do_action('exactlinks/admin_app_loaded', $app);
    }

    private function getMenuIcon()
	{
		return 'data:image/svg+xml;base64,'.base64_encode('<svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" viewBox="0 0 150 150"><defs><style>.cls-1{fill: #0091ea;}.cls-1,.cls-2{fill-rule: evenodd;}.cls-2{fill: #2a62ff;}</style></defs><g id="logo"><path class="cls-1" d="M43.388,97.563L10.527,57.456S-2.707,41.086,2.505,24.077c0,0,6.323-20.061,26.652-22.253,0,0,18.794-4.742,32.344,11.126l4.916,5.693L49.081,32.874S42.816,24.013,36.4,23.818c0,0-12.142.292-11.9,11.9,0,0-.377,2.985,5.692,9.833L60.725,83.072Z"/><path id="Shape_1_copy" data-name="Shape 1 copy" class="cls-2" d="M51.7,41.186l40.561-32.3s16.552-13,33.487-7.555c0,0,19.972,6.6,21.88,26.959,0,0,4.479,18.858-11.576,32.186l-5.761,4.836L116.3,47.779s8.948-6.14,9.232-12.551c0,0-.123-12.145-11.736-12.067,0,0-2.979-.418-9.911,5.555L65.947,58.723Z"/><path id="Shape_1_copy_2" data-name="Shape 1 copy 2" class="cls-1" d="M106.849,53.547L138.389,94.7s12.694,16.791,6.931,33.622c0,0-6.972,19.845-27.361,21.374,0,0-18.938,4.129-31.965-12.172l-4.729-5.849,17.79-13.661s5.973,9.061,12.378,9.464c0,0,12.146.1,12.284-11.509,0,0,.473-2.971-5.37-10.012L89.05,67.465Z"/><path id="Shape_1_copy_3" data-name="Shape 1 copy 3" class="cls-2" d="M97.793,108.689l-40.639,32.2s-16.584,12.964-33.506,7.474c0,0-19.955-6.65-21.814-27.012,0,0-4.434-18.869,11.654-32.157l5.772-4.822,13.946,17.567s-8.963,6.119-9.263,12.529c0,0,.093,12.146,11.706,12.1,0,0,2.979.426,9.924-5.531L83.589,91.118Z"/></g></svg>');
	}

    public function exactlinksPluginAction($links) {

        $exactLinks = [
            '<a href="'.admin_url('admin.php?page=wplink-exactlinks#/global_settings').'">' .esc_html__('Settings', 'exact-links'). '</a>'
        ];

        if (!defined('EXACTLINKSPRO')) {
            $goPro = '<a href="https://exactlinks.com" class="exl-go-pro" target="_blank" style="color:#39b54a;font-weight:bold;">' .esc_html__('Go Pro', 'exact-links'). '</a>';
            array_push($exactLinks, $goPro);
        }

        return array_merge($links, $exactLinks);
        
    }

    public function adminNotice()
    {
        $disablePages = [
            'wplink-exactlinks'
        ];

        if (isset($_GET['page']) && in_array($_GET['page'], $disablePages)) {
            remove_all_actions('admin_notices');
        }
    }

    public function checkForDbMigration()
    {
        $olderVersion = get_option('_exactlinks_version', '2.3.4');
        if (version_compare($olderVersion, EXACTLINKS_VERSION, '<=')) {
            (new ActivationHandler)->handle();
        }
    }

    public function gutenBlocksEditorAssets()
    {
       // if guentburg
       $assetsUrl = EXACTLINKS_PLUGIN_URL.'assets/';
       wp_enqueue_script(
           'exactlinks_gutenblock',
           $assetsUrl.'admin/js/exactlinks-gutenblock-build.js',
           array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-components', 'wp-compose', 'wp-data', 'wp-block-editor', 'wp-api-fetch'),
           EXACTLINKS_VERSION,
           false
        );

        wp_enqueue_style('exactlinks_admin_guten_editor', $assetsUrl.'admin/css/exactlinks_guten_editor.css');
        wp_enqueue_style('exactlinks-common', EXACTLINKS_PLUGIN_URL.'assets/public/css/exactlinks-common.css');

        wp_localize_script('exactlinks_gutenblock','exactlinks_gutenblock_vars', array(
           'images_url' => $assetsUrl.'images',
           'site_url' => get_site_url(),
           'nonce' => wp_create_nonce('exactlinks'),
           'settings' => get_option('exactlinks_settings'),
           'has_pro' => defined('EXACTLINKSPRO')
       ));
    }

    public function loadAssets()
    {

        if (isset($_GET['page']) && $_GET['page'] == 'wplink-exactlinks') {

            if (function_exists('wp_enqueue_editor')) {
                wp_enqueue_editor();
                wp_enqueue_script('thickbox');
            }
            if (function_exists('wp_enqueue_media')) {
                wp_enqueue_media();
            }

            $app = ExactLink();

            $assetsUrl = EXACTLINKS_PLUGIN_URL.'assets/';
            wp_enqueue_style('exactlinks_admin', $assetsUrl.'admin/css/admin.css');
            wp_enqueue_script('exactlinks_admin_boot', $assetsUrl.'admin/js/boot.js', array('jquery'), EXACTLINKS_VERSION, false);
            wp_enqueue_script('exactlinks_admin_app', $assetsUrl.'admin/js/start.js', array('jquery'), EXACTLINKS_VERSION, true);
           
            wp_enqueue_style('exactlinks-common', EXACTLINKS_PLUGIN_URL.'assets/public/css/exactlinks-common.css');

            $settings = get_option('exactlinks_settings');
            
            $i18ns = TranslationStrings::getTranslationStrings();

            wp_localize_script('exactlinks_admin_boot', 'exactlinks_admin', array(
                'images_url' => $assetsUrl.'images',
                'slug' => 'wp_exactlinks-',
                'site_url' => get_site_url(),
                'nonce' => wp_create_nonce('exactlinks'),
                'server_time' => current_time('mysql'),
                'i18n'        => $i18ns,
                'link_types' => [
                    'simple' => esc_html__('Simple Short Link', 'exact-links'),
                    'box_content' => esc_html__('Box Content', 'exact-links'),
                    'choice_pages' => esc_html__('Choice Page', 'exact-links'),
                    'ab_pages' => esc_html__('A/B Split Test', 'exact-links')
                ],
                'link_statuses' => [
                    'active' => esc_html__('Active', 'exact-links'),
                    'archive' => esc_html__('Archived', 'exact-links'),
                    'broken' => esc_html__('Broken', 'exact-links')
                ],
                'link_categories' => [],
                'settings' => $settings,
                'getConfigs' => $this->getConfigs(),
                'has_pro' => defined('EXACTLINKSPRO'),
                'woo_active' => defined('WC_VERSION'),
                'edd_active' => defined('EDD_VERSION'),
                'rest'       => $this->getRestInfo($app),
                'migrationTabs' => $this->getMigrationTabs(),
            ));
        }
    }

    private function getRestInfo($app)
    {
        $ns = $app->config->get('app.rest_namespace');
        $v = $app->config->get('app.rest_version');

        $restUrl = rest_url($ns . '/' . $v);
        $restUrl = rtrim($restUrl, '/\\');
        return [
            'base_url'  => esc_url_raw(rest_url()),
            'url'       => $restUrl,
            'nonce'     => wp_create_nonce('wp_rest'),
            'namespace' => $ns,
            'version'   => $v,
        ];
    }

    public function getConfigs()
    {
        return array(
            'theme' => 'light',
            'box_template'=> 'cactus',
            'new_tab' => 'yes',
            'no_follow' => 'yes',
            'description' => 'yes',
            'disclosure' => 'yes',
            'price' => 'yes',
            // 'config' => array(),
            'styles' => array(
                'badgeStyles' => array(
                    'color'   => array(
                        'key'   => 'color',
                        'value' => '#FFFFFF'
                    ),
                    'backgroundColor'   => array(
                        'key'   => 'backgroundcolor',
                        'value' => '#5E36CA'
                    )
                ),
                'buttonStyles' => array(
                    'color'   => array(
                        'key'   => 'color',
                        'value' => '#FFFFFF'
                    ),
                    'backgroundColor'   => array(
                        'key'   => 'backgroundcolor',
                        'value' => '#11B996'
                    )
                )
            )
        );
    }

    /**
     *  Migrations Tab
    */
    public function getMigrationTabs()
    {
        $migrationTabs = [];
        
        /**
         * Pretty Links
        */
        if (defined('PRLI_VERSION')) {
            $plugin = [
                'label' => 'Pretty Links',
                'plugin_name'  => 'prli_links'
            ];
            array_push( $migrationTabs, $plugin );
        }

        /**
         * Better Links
        */
        if (defined('BETTERLINKS_VERSION')) {
            $plugin = [
                'label' => 'BetterLinks',
                'plugin_name'  => 'betterlinks'
            ];
            array_push( $migrationTabs,  $plugin );
        }

        /**
         * URL Shortener by MyThemeShop  
        */
        if (defined('URL_SHORTENER_PLUGIN_PATH')) {
            $plugin = [
                'label' => 'Short Links (MyThemeShop)',
                'plugin_name'  => 'short_links'
            ];
            array_push( $migrationTabs,  $plugin );
        }
        
        /**
         * URL Shortify 
        */
        if (defined('KC_US_PLUGIN_VERSION')) {
            $plugin = [
                'label' => 'URL Shortify',
                'plugin_name'  => 'kc_us_links'
            ];
            array_push( $migrationTabs,  $plugin );
        } 

        /**
         * Thirsty Affiliates Links
        */
        // if (class_exists('ThirstyAffiliates')) {
        //     $plugin = [
        //         'label' => 'ThirstyAffiliates',
        //         'plugin_name'  => 'thirstylink'
        //     ];
        //     array_push( $migrationTabs,  $plugin );
        // }
        

        return $migrationTabs;
    }
}