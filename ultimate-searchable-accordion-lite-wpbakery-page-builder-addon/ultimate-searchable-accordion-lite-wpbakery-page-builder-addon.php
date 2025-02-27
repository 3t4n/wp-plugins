<?php
/*
  Plugin Name: Ultimate Searchable Accordion Lite - WPBakery Page Builder Addon
  Plugin URI:  https://1.envato.market/usva-wp
  Version: 1.0.8
  Description: The most powerful and advanced content searchable accordion addon for the WPBakery Page Builder. Easy to use and attractive, responsive layout fit any screen, which gives the best user experience for your users.
  Author: xenioushk
  Author URI:  https://bluewindlab.net/
  Text Domain: usa_vc
  Domain Path: /languages/
 */

/**
 * @package UsaVcLite
 */

// security check.
defined('ABSPATH') or die("Unauthorized access");

use UsaVcLite\Noticebox;

if (!class_exists('USA_VC_Addon')) {


    if (!defined('USA_VC_PLUGIN_TITLE')) {
        define("USA_VC_PLUGIN_TITLE", 'Ultimate Searchable Accordion Lite - WPBakery Page Builder Addon');
    }

    class USA_VC_Addon
    {

        function __construct()
        {

            if (!defined('WPB_VC_VERSION')) {
                add_action('admin_notices', [$this, 'noticeUsaVcAddonDependencies']);
                return;
            }

            if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
                require_once dirname(__FILE__) . '/vendor/autoload.php';
            }


            // Uses of Autoloaded Files.




            /*--- Addon COMMON CONSTANTS---*/


            define("USA_VC_PRO", 'https://1.envato.market/usva-wp');
            define("USA_VC_UPGRADE_PRO_MSG", "<strong>Upgrade to <a href='" . USA_VC_PRO . "' target='_blank'>pro version</a> to unlock the feature</strong>");
            define("USA_VC_PLUGIN_DIR", plugins_url() . '/ultimate-searchable-accordion-lite-wpbakery-page-builder-addon/');
            define("USA_VC_PLUGIN_VERSION", '1.0.8');

            $this->included_files();

            add_action("init", "usa_vc_addon_function");
            add_action("wp_enqueue_scripts", array($this, "enqueue_plugin_scripts"));
            add_action('admin_enqueue_scripts', array($this, 'usa_admin_vc_addon_style'));

            //Removed old shortcodes and introduced the following twos.
            add_shortcode('usa_vc_container', 'cb_usa_vc_container');
            add_shortcode('usa_vc_item', 'cb_usa_vc_item');

            // Edit plugin metalinks
            add_filter('plugin_row_meta', array($this, 'usa_vc_metalinks'), null, 2);

            /*---  TRANSLATION FILE---*/
            load_plugin_textdomain('usa_vc', false, plugin_basename(dirname(__FILE__)) . '/languages/');
        }

        // Check Dependeines.

        function noticeUsaVcAddonDependencies()
        {
            if (!defined('WPB_VC_VERSION')) {
                $plugin_data = get_plugin_data(__FILE__);
                echo '
                    <div class="updated">
                    <p><strong>' . USA_VC_PLUGIN_TITLE . '</strong> requires <strong><a href="https://1.envato.market/VKEo3" target="_blank">WPBakery Page Builder</a></strong> plugin to be installed and activated on your site.</p>
                    </div>';
            }
        }

        function usa_vc_metalinks($links, $file)
        {

            if (empty(get_option('usa_vc_lite_install_date'))) {
                add_option('usa_vc_lite_install_date', date('Y-m-d H:i:s'));
            }


            if (strpos($file, 'ultimate-searchable-accordion-lite-wpbakery-page-builder-addon.php') !== false && is_plugin_active($file)) {

                $new_links = array(
                    '<a href="' . esc_url('https://xenioushk.github.io/docs-wp-plugins/usva/index.html') . '" target="_blank">' . esc_html__('Documentation', 'usa_vc') . '</a>',
                    '<a href="' . esc_url('https://1.envato.market/usva-wp') . '" target="_blank" style="color:green; font-weight: bold;">' . esc_html__('Get Pro Version', 'usa_vc') . '</a>'
                );

                $links = array_merge($links, $new_links);
            }

            return $links;
        }

        function included_files()
        {
            require_once(__DIR__ . '/includes/usa-vc-element.php');
            require_once(__DIR__ . '/includes/usa-vc-shortcodes.php');

            if (is_admin()) {
                require_once(__DIR__ . '/includes/noticebox/UsaVcAdminNotice.php');
            }
        }

        function enqueue_plugin_scripts()
        {

            /*--- Add Custom Styles---*/

            wp_enqueue_style('usa-vc-animate-styles', plugins_url('assets/lib/animate/animate.css', __FILE__), [], USA_VC_PLUGIN_VERSION);
            wp_enqueue_style('usa-vc-font-awesome-styles', plugins_url('assets/lib/animate/font-awesome.min.css', __FILE__), [], USA_VC_PLUGIN_VERSION);
            wp_enqueue_style('usa-vc-font-awesome-shims-styles', plugins_url('assets/lib/animate/v4-shims.min.css', __FILE__), [], USA_VC_PLUGIN_VERSION);
            wp_enqueue_style('usa-vc-accordion-styles', plugins_url('assets/styles/frontend.css', __FILE__), [], USA_VC_PLUGIN_VERSION);

            /*---Add Custom JavaScripts----*/

            wp_register_script('usa-vc-bwlaccordion-script', plugins_url('assets/scripts/frontend.js', __FILE__), ['jquery'], USA_VC_PLUGIN_VERSION);
        }

        function usa_admin_vc_addon_style()
        {

            wp_enqueue_style('usa-vc-admin-style', plugins_url('assets/styles/admin.css', __FILE__), false, USA_VC_PLUGIN_VERSION, false);
            wp_enqueue_script('usa-vc-admin-script', plugins_url('assets/admin/scripts/admin_notice.js', __FILE__), ['jquery'], USA_VC_PLUGIN_VERSION, true);
        }
    }





    /*--- Initialization---*/

    function usa_vc_plugin_init()
    {
        new USA_VC_Addon();
    }

    add_action('plugins_loaded', 'usa_vc_plugin_init');
}