<?php namespace SmoothScroll\Admin;

use Premmerce\SDK\V2\FileManager\FileManager;
use SmoothScroll\SmoothScrollPlugin;
use _WP_Editors;

/**
 * Class Admin
 *
 * @package SmoothScroll\Admin
 */
class Admin
{

    /**
     * @var string
     */
    private $settingsPage;

    /**
     * @var FileManager
     */
    private $fileManager;

    /**
     * @var Settings
     */
    private $settings;

    /**
     * Admin constructor.
     *
     * Register menu items and handlers
     *
     * @param FileManager $fileManager
     */
    public function __construct(FileManager $fileManager)
    {
        $this->fileManager = $fileManager;
        $this->settingsPage = SmoothScrollPlugin::DOMAIN . '-admin';
        $this->settings = new Settings($fileManager);
        $this->registerActions();

    }

    private function registerActions()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueueScripts'));
        add_action('admin_menu', array($this, 'addMenuPage'));
        add_action('admin_init', array($this->settings, 'register'));
        add_filter('plugin_action_links_' . SmoothScrollPlugin::BASE_NAME, array($this, 'plugin_action_links'));
        add_action('admin_enqueue_scripts', array($this, 'addAdminStyle'));
        add_filter('mce_external_plugins', array($this, 'addTinymcePlugin'));
        add_filter('mce_buttons', array($this, 'registerTinymceButton'));
        add_filter('mce_external_languages', array($this, 'tinymcePluginAddLocale'));



    }

    /**
     * @param string $hook
     */
    public function enqueueScripts($hook)
    {


    }







    /**
     * Add submenu to premmerce menu page
     */
    public function addMenuPage()
    {

        add_options_page(
            __('Anchor Smooth Scroll', 'anchor-smooth-scroll'),
            __('Anchor Smooth Scroll', 'anchor-smooth-scroll'),
            'edit_theme_options',
            $this->settingsPage,
            array($this, 'options')
        );
    }


    /**
     * Options page
     */
    public function options()
    {
        //$this->triggerFlush();

        $current = isset($_GET['tab']) ? $_GET['tab'] : 'settings';

        $tabs['settings'] = __('Settings', 'anchor-smooth-scroll');
        $tabs['instructions'] = __('Instructions', 'anchor-smooth-scroll');

        $tabs = false;

        $this->fileManager->includeTemplate('admin/main.php', array(
            'settings' => $this->settings,
            'tabs' => $tabs,
            'current' => $current,
        ));
    }


    /**
     * Show action links on the plugin screen.
     *
     * @param   mixed $links Plugin Action links.
     * @return  array
     */
    public static function plugin_action_links($links)
    {
        $actionLinks = array(
            'settings' => '<a href="' . admin_url('admin.php?page=anchor-smooth-scroll-admin') .
                '" aria-label="' . esc_attr__('Anchor smooth scroll', 'anchor-smooth-scroll') .
                '">' . esc_html__('Settings', 'anchor-smooth-scroll') .
                '</a>',
        );

        return array_merge($actionLinks, $links);
    }


    public function addAdminStyle()
    {
        wp_enqueue_style(
            'ass-admin-style',
            $this->fileManager->locateAsset('admin/css/admin-style.css')
        );
    }


    /**
     * MCE Button
     */

    public function addTinymcePlugin($pluginArray)
    {
        $pluginArray['anchorButton'] = $this->fileManager->locateAsset('admin/js/anchor-tinymce-button.js');
        return $pluginArray;
    }

    public function registerTinymceButton($buttons)
    {
        array_push($buttons, 'anchorButton');
        return $buttons;
    }

    public static function tinymcePluginTranslation()
    {
        $strings = array(
            'Anchor' => __('Anchor', 'anchor-smooth-scroll'),
            'insert_anchor' => __('Insert anchor', 'anchor-smooth-scroll'),
            'anchor_name' => __('Anchor name', 'anchor-smooth-scroll'),
            'Please provide an anchor name!' => __('Please provide an anchor name', 'anchor-smooth-scroll'),
            'Link' => __('Link', 'anchor-smooth-scroll'),
        );
        $locale = _WP_Editors::$mce_locale;
        $translated = 'tinyMCE.addI18n("' . $locale . '", ' . json_encode($strings) . ");\n";

        return $translated;
    }



    public function tinymcePluginAddLocale($locales)
    {
        $locales ['anchorButton'] = $this->fileManager->getPluginDirectory().'src/Admin/custom-tinymce-plugin-langs.php';
        return $locales;

    }


}