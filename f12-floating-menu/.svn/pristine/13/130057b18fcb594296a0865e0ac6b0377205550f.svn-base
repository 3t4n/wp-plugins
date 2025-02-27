<?php

namespace forge12\floating_menu {
    if (!defined('ABSPATH')) {
        exit;
    }
    /**
     * Dependencies
     */
    require_once('core/ComponentManager.class.php');
    require_once('core/UIPage.class.php');
    require_once('core/UIPageForm.class.php');
    require_once('core/Support.class.php');

    require_once('core/Ajax.class.php');
    require_once('core/UI.class.php');
    require_once('core/HTMLSelect.class.php');
    require_once('core/Messages.class.php');

    /**
     * Plugin Name: F12 Floating Menu
     * Plugin URI: https://www.forge12.com/produkte/f12-floating-menu/
     * Description: Add a simple floating menu to your website.
     * Version: 1.3.4
     * Author: Forge12 Interactive GmbH
     * Author URI: https://www.forge12.com
     */
    define('FORGE12_FLOATING_VERSION', '1.3.4');
    define('FORGE12_FLOATING_SLUG', 'f12_floating_menu');
    define('FORGE12_FLOATING_BASENAME', plugin_basename(__FILE__));

    /**
     * Class FloatingMenu
     */
    class Application
    {
        /**
         * @var Application|Null
         */
        private static $_instance = null;

        /**
         * Get the instance of the custom links controller
         * @return Application
         */
        public static function getInstance()
        {
            if (self::$_instance == null) {
                self::$_instance = new Application();
            }

            return self::$_instance;
        }

        /**
         * Locate the Template
         *
         * Search Order:
         * 1. /themes/theme/templates/$template_name
         * 2. /themes/theme/$template_name
         * 3. /plugins/plugin/templates/$template_name
         *
         * @param string $template_name
         * @return string
         */
        private function locateTemplateFile(string $template_name): string
        {
            // Set template path
            $template_path = 'templates/';

            // Set default template path
            $default_path = plugin_dir_path(__FILE__) . 'templates/';

            // Search template file in theme folder
            $template = locate_template(array(
                $template_path . $template_name,
                $template_name
            ));

            if (!$template) {
                $template = $default_path . $template_name;
            }

            return $template;
        }

        /**
         * Render the template file
         * @param $template_name
         * @param array $args
         */
        public function getTemplateFile($template_name, $args = array()): void
        {
            if (is_array($args)) {
                extract($args);
            }

            $template_file = $this->locateTemplateFile($template_name);

            if (!file_exists($template_file)) {
                _doing_it_wrong(__FUNCTION__, sprintf('<code>%s</code> does not exist.', $template_file));
                return;
            }

            include $template_file;
        }


        /**
         * CustomLinks constructor.
         */
        private function __construct()
        {
            $UI = new UI(FORGE12_FLOATING_SLUG, 'Forge12 Floating Menu', 'manage_options');
            $UIMenu = new UIMenu(FORGE12_FLOATING_SLUG);

            add_filter('f12-' . FORGE12_FLOATING_SLUG . '-settings', '\forge12\floating_menu\Application::getSettings');

            ComponentManager::getInstance();

            Support::getInstance();
        }
    }

    Application::getInstance();
}