<?php

namespace forge12\floating_menu {
    if (!defined('ABSPATH')) {
        exit;
    }
    /**
     * dependencies
     */
    require_once('UIMenu.class.php');

    /**
     * Class UI
     *
     * @package forge12\ui
     */
    class UI
    {
        /**
         * @var UI
         */
        private static $instance = null;

        /**
         * @var string
         */
        private $slug = '';
        /**
         * @var string
         */
        private $title = '';
        /**
         * @var string
         */
        private $capabilities;
        /**
         * Store all Pages
         *
         * @var array<UIPage>
         */
        private $pages;
        /**
         * Components
         */
        private $components = array();

        /**
         * @param        $slug
         * @param string $title
         * @param string $capabilities
         *
         * @return UI
         * @deprecated
         * @deprecated
         */
        public static function getInstance($slug, $title = 'Dashboard', $capabilities = 'manage_options')
        {
            if (null == self::$instance) {
                self::$instance = new UI($slug, $title, $capabilities);
            }
            return self::$instance;
        }

        /**
         * Add a Page to the UI
         *
         * @param $UIPage
         *
         * @return void
         */
        public function addPage($UIPage)
        {
            $this->pages[] = $UIPage;

            add_action('forge12-plugin-content-' . $this->slug, array($UIPage, 'renderContent'), 10, 2);
            add_action('forge12-plugin-sidebar-' . $this->slug, array($UIPage, 'renderSidebar'), 10, 2);
        }

        /**
         * @return array<UIPage>
         */
        private function getPages()
        {
            return $this->pages;
        }

        /**
         * @param $slug
         *
         * @return UIPage|null
         */
        private function get($slug)
        {
            foreach ($this->pages as $UIPage) {
                if ($UIPage->getSlug() == $slug) {
                    return $UIPage;
                }
            }

            return null;
        }

        /**
         * UI constructor.
         *
         * @param $slug
         */
        public function __construct($slug, $title, $capabilities)
        {
            $this->slug = $slug;
            $this->title = $title;
            $this->capabilities = $capabilities;

            $this->loadComponents();

            // Add Assets
            add_action('admin_enqueue_scripts', array($this, 'addAssets'));
            add_action($slug . '_ui_after_load_pages', array($this, 'registerComponents'), 999999990, 2);
            add_action($slug . '_ui_after_load_pages', array($this, 'sortComponents'), 999999999, 2);

            do_action($slug . '_ui_after_load_pages', $this, $this->slug);

            add_action('admin_menu', array($this, 'addSubmenuPagesToWordPress'));
        }

        public function addAssets()
        {
            wp_enqueue_style($this->slug . '-admin', plugins_url('assets/admin-style.css', __FILE__));
            wp_enqueue_script($this->slug . '-toggle', plugins_url('assets/toggle.js', __FILE__));
        }

        public function sortComponents($UI, $domain)
        {
            if (!empty($this->pages)) {
                usort($this->pages, function ($a, $b) {
                    if ($a->getPosition() < $b->getPosition()) {
                        return -1;
                    } else if ($a->getPosition() > $b->getPosition()) {
                        return 1;
                    } else {
                        return 0;
                    }
                });
            }
        }

        /**
         * @param $UI
         * @param $domain
         *
         * @return void
         */
        public function registerComponents($UI, $domain)
        {
            foreach ($this->components as $component) {
                if (isset($component['path']) && isset($component['name'])) {
                    require_once($component['path']);
                    $UIPage = new $component['name']($domain);
                    $UI->addPage($UIPage);
                }
            }
        }

        private function addComponent($name, $path)
        {
            $this->components[] = array(
                'name' => $name,
                'path' => $path
            );
        }

        private function loadComponents()
        {
            $directory = dirname(dirname(__FILE__)) . '/ui';

            if (is_dir($directory)) {
                $handle = opendir($directory);

                if (!$handle) {
                    return;
                }

                while (false !== ($entry = readdir($handle))) {
                    if ($entry != '.' && $entry != '..') {
                        if (preg_match('!UI([a-zA-Z_0-9]+)\.class\.php!', $entry, $matches)) {
                            if (isset($matches[1])) {
                                $this->addComponent('\\' . __NAMESPACE__ . '\UI' . $matches[1], $directory . '/' . $entry);
                            }
                        }
                    }
                }
            }
        }

        /**
         * Add the WordPress Page for the Settings to the WordPress CMS
         *
         * @private WordPress Hook
         */
        public function addSubmenuPagesToWordPress()
        {
            //add_menu_page($this->title, $this->title, $this->capabilities, $this->slug, '', 'dashicons-calendar');

            foreach ($this->getPages() as /** @var UIPage $Page */ $Page) {
                if ($Page->isDashboard()) {
                    $slug = $this->slug;
                } else {
                    $slug = $this->slug . '_' . $Page->getSlug();
                }

                add_submenu_page('edit.php?post_type=floating_menu', $Page->getTitle(), $Page->getTitle(), $this->capabilities, $slug, function () {
                    $this->render();
                }, $Page->getPosition());
            }
        }

        /**
         * This will ensure that the menu page will be removed before the rendering.
         * This needs to be called from add_action('admin_head', ''); to be working.
         *
         * @return void
         */
        public function hideSubmenuPagesToWordpress()
        {
            foreach ($this->getPages() as /** @var UIPage $Page */ $Page) {
                if (!$Page->hideInMenu()) {
                    continue;
                }

                if ($Page->isDashboard()) {
                    $slug = $this->slug;
                } else {
                    $slug = $this->slug . '_' . $Page->getSlug();
                }

                remove_submenu_page($this->slug, $slug);
            }
        }

        public function render()
        {
            $page = sanitize_text_field($_GET['page']);
            $page = substr(explode($this->slug, $page)[1], 1);

            if (empty($page)) {
                $page = $this->slug;
            }

            $pages = $this->getPages();
            $menuPages = array();

            foreach ($pages as $UIPage) {
                if (!$UIPage->hideInMenu()) {
                    $menuPages[] = $UIPage;
                }
            }
            ?>
            <div class="forge12-plugin <?php esc_attr_e($this->slug); ?>">
                <div class="forge12-plugin-header">
                    <div class="forge12-plugin-header-inner">
                        <img src="<?php echo esc_url(plugin_dir_url(__FILE__)); ?>/assets/logo-forge12.png"
                             alt="Forge12 Interactvie GmbH" title="Forge12 Interactive GmbH"/>
                    </div>
                </div>
                <div class="forge12-plugin-menu">
                    <?php do_action($this->slug . '_admin_menu', $menuPages, $page, $this->slug); ?>
                </div>
                <div class="forge12-plugin-content">
                    <div class="forge12-plugin-content-main">
                        <?php do_action('forge12-plugin-content-' . $this->slug, $this->slug, $page) ?>
                    </div>
                    <div class="forge12-plugin-content-sidebar">
                        <?php do_action('forge12-plugin-sidebar-' . $this->slug, $this->slug, $page) ?>
                    </div>
                </div>
                <div class="forge12-plugin-footer">
                    <div class="forge12-plugin-footer-inner">
                        <img src="<?php echo esc_url(plugin_dir_url(__FILE__)); ?>/assets/logo-forge12-dark.png"
                             alt="Forge12 Interactvie GmbH" title="Forge12 Interactive GmbH"/>
                    </div>
                </div>
            </div>
            <?php
        }
    }
}