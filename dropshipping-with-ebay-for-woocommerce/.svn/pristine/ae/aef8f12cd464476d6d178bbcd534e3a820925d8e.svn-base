<?php

/* * class
 * Description of E2WL_AbstractPage
 *
 * @author andrey
 *
 * @position: 2
 */

if (!class_exists('E2WL_AbstractAdminPage')) {

    abstract class E2WL_AbstractAdminPage extends E2WL_AbstractController
    {

        private $page_title;
        private $menu_title;
        private $capability;
        private $menu_slug;
        private $menu_as_link;

        public function __construct($page_title, $menu_title, $capability, $menu_slug, $priority = 10, $menu_as_link = false)
        {
            parent::__construct(E2WL()->plugin_path . '/view/');

            if (is_admin()) {
                $this->init($page_title, $menu_title, $capability, $menu_slug, $priority, $menu_as_link);

                add_action('e2wl_admin_assets', array($this, 'admin_register_assets'), 1);

                add_action('e2wl_admin_assets', array($this, 'admin_enqueue_assets'), 2);

                add_action('wp_loaded', array($this, 'before_render_action'));

                if ($this->is_current_page() && !E2WL_Woocommerce::is_woocommerce_installed() && !has_action('admin_notices', array($this, 'woocomerce_check_error'))) {
                    add_action('admin_notices', array($this, 'woocomerce_check_error'));
                }

                if ($this->is_current_page() && !has_action('admin_notices', array($this, 'global_system_message'))) {
                    add_action('admin_notices', array($this, 'global_system_message'));
                }
            }
        }

        public function woocomerce_check_error()
        {
            echo '<div id="message2222" class="notice error is-dismissible"><p>' . _x('Ebay2Woo Lite notice! Please install the <a href="https://woocommerce.com/" target="_blank">WooCommerce</a> plugin first.', 'dropshipping-with-ebay-for-woocommerce') . '</p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button></div>';
        }

        public function global_system_message()
        {
            $system_message = e2wl_get_setting('system_message');
            if ($system_message && !empty($system_message['message'])) {
                $message_class = 'updated';
                if ($system_message['type'] == 'error') {
                    $message_class = 'error';
                }
                echo '<div id="e2wl-system-message" class="notice ' . esc_attr($message_class) . ' is-dismissible"><p>' . wp_kses($system_message['message'], wp_kses_allowed_html()) . '</p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button></div>';
            }
        }

        protected function init($page_title, $menu_title, $capability, $menu_slug, $priority, $menu_as_link)
        {
            $this->page_title = $page_title;
            $this->menu_title = $menu_title;
            $this->capability = $capability;
            $this->menu_slug = $menu_slug;
            $this->menu_as_link = $menu_as_link;
            add_action('e2wl_init_admin_menu', array($this, 'add_submenu_page'), $priority);
        }

        public function add_submenu_page($parent_slug)
        {
            if ($this->menu_as_link) {
                add_submenu_page($parent_slug, $this->page_title, $this->menu_title, $this->capability, $this->menu_slug);
            } else {
                add_submenu_page($parent_slug, $this->page_title, $this->menu_title, $this->capability, $this->menu_slug, array($this, 'render'));
            }

        }

        public function before_render_action()
        {
            if ($this->is_current_page()) {
                $this->before_admin_render();
            }
        }

        public function before_admin_render()
        {

        }

        abstract public function render($params = array());

        public function admin_register_assets()
        {
            if ($this->is_current_page()) {
                if (!wp_style_is('e2wl-admin-style', 'registered')) {
                    wp_register_style('e2wl-admin-style', E2WL()->plugin_url . 'assets/css/admin_style.css', array(), E2WL()->version);
                }
                if (!wp_style_is('e2wl-admin-style-new', 'registered')) {
                    wp_register_style('e2wl-admin-style-new', E2WL()->plugin_url . 'assets/css/admin_style_new.css', array(), E2WL()->version);
                }
                if (!wp_script_is('e2wl-admin-script', 'registered')) {
                    wp_register_script('e2wl-admin-script', E2WL()->plugin_url . 'assets/js/admin_script.js', array('jquery'), E2WL()->version);
                    $lang_data = array();
                    wp_localize_script('e2wl-admin-script', 'e2wl_common_data', array('baseurl' => E2WL()->plugin_url, 'lang' => apply_filters('e2wl_configure_lang_data', $lang_data)));
                }
                if (!wp_script_is('e2wl-admin-svg', 'registered')) {
                    wp_register_script('e2wl-admin-svg', E2WL()->plugin_url . 'assets/js/svg.min.js', array('jquery'), E2WL()->version);
                }

                /* select2 */
                if (!wp_style_is('e2wl-select2-style', 'registered')) {
                    wp_register_style('e2wl-select2-style', E2WL()->plugin_url . 'assets/js/select2/css/select2.min.css', array(), E2WL()->version);
                }
                if (!wp_script_is('e2wl-select2-js', 'registered')) {
                    wp_register_script('e2wl-select2-js', E2WL()->plugin_url . 'assets/js/select2/js/select2.min.js', array('jquery'), E2WL()->version);
                }

                /*jquery.lazyload*/
                if (!wp_script_is('e2wl-lazyload-js', 'registered')) {
                    wp_register_script('e2wl-lazyload-js', E2WL()->plugin_url . 'assets/js/jquery/jquery.lazyload.js', array('jquery'), E2WL()->version);
                }

                /* e2w-ui */
                if (!wp_style_is('e2w-ui-style', 'registered')) {
                    wp_register_style('e2w-ui-style', E2WL()->plugin_url . 'assets/js/e2w-ui/css/e2w-ui.min.css', array(), E2WL()->version);
                }
                if (!wp_script_is('e2w-ui-js', 'registered')) {
                    wp_register_script('e2w-ui-js', E2WL()->plugin_url . 'assets/js/e2w-ui/js/e2w-ui.min.js', array('jquery'), E2WL()->version);
                }
            }
        }

        public function admin_enqueue_assets($page)
        {
            if ($this->is_current_page()) {

                wp_enqueue_script('jquery-effects-core');

                if (!wp_style_is('e2wl-admin-style', 'enqueued')) {
                    wp_enqueue_style('e2wl-admin-style');
                    wp_style_add_data('e2wl-admin-style', 'rtl', 'replace');
                }
                if (!wp_style_is('e2wl-admin-style-new', 'enqueued')) {
                    wp_enqueue_style('e2wl-admin-style-new');
                }
                if (!wp_script_is('e2wl-admin-script', 'enqueued')) {
                    wp_enqueue_script('e2wl-admin-script');
                }
                if (!wp_script_is('e2wl-admin-svg', 'enqueued')) {
                    wp_enqueue_script('e2wl-admin-svg');
                }

                /* select2 */
                if (!wp_style_is('e2wl-select2-style', 'enqueued')) {
                    wp_enqueue_style('e2wl-select2-style');
                }
                if (!wp_script_is('e2wl-select2-js', 'enqueued')) {
                    wp_enqueue_script('e2wl-select2-js');
                }

                /*jquery.lazyload*/
                if (!wp_script_is('e2wl-lazyload-js', 'enqueued')) {
                    wp_enqueue_script('e2wl-lazyload-js');
                }

                /* e2w-ui */
                if (!wp_style_is('e2w-ui-style', 'enqueued')) {
                    wp_enqueue_style('e2w-ui-style');
                }
                if (!wp_script_is('e2w-ui-js', 'enqueued')) {
                    wp_enqueue_script('e2w-ui-js');
                }

            }
        }

        protected function is_current_page()
        {
            return /*strpos($_SERVER['REQUEST_URI'], 'wp-admin/admin.php') !== false*/is_admin() && isset($_REQUEST['page']) && $_REQUEST['page'] && $this->menu_slug == $_REQUEST['page'];
        }

    }

}
