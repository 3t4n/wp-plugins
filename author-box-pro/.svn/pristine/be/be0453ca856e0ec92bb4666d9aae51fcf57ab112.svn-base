<?php
require_once 'class.MelibuBackendMenus.php';

/**
 * class.MelibuBackend.php  
 *  
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        https://www.tnado.com/author/prod3v3loper/
 * @package     Melabu
 * @subpackage  Author Box Pro
 * @since       1.0
 */
if (!class_exists('MB_AUTHOR_BOX_BACKEND')) {

    class MB_AUTHOR_BOX_BACKEND extends MB_AUTHOR_BOX_BACKEND_MENUS {

        /**
         * Constructor 
         */
        public function __construct() {

            $this->action_handler();
        }

        /**
         * Action Handler
         */
        private function action_handler() {

            /**
             * add_action() WP Since: 1.2.0  
             * @see https://developer.wordpress.org/reference/functions/add_action/
             * @see https://codex.wordpress.org/Plugin_API/Action_Reference
             */
            add_action('admin_menu', array($this, 'add_menu')); // admin_menu diese action wird benötigt um die Admin Menüs zu registrieren  
            add_action('admin_init', array($this, 'admin_init')); // admin_init diese action wird benötigt um z.B. option, settings und filter zusetzen  
            add_action('admin_head', array($this, 'admin_head')); // admin_head diese action wird benötigt um z.B. CSS oder JavaScript im HTML <head> einzubinden <meta > etc.  
            add_action('admin_enqueue_scripts', array($this, 'admin_enqueue_scripts')); // admin_enqueue_scripts diese action wird benötigt um z.B. CSS oder JavaScript im adminbereich einzubinden
            add_action('plugins_loaded', array($this, 'plugins_loaded')); // plugins_loaded diese action wird bei jedem aufruf der Seite ausgeführt  
            add_action('plugins_loaded', array($this, 'plugins_loaded_about'), 1); // plugins_loaded diese action begrenzen wir auf ein einmaligen aufruf, der hier beim aktivieren des plugins genutzt wird
        }

        /**
         * Activate Plugin
         */
        public static function activate() {

            /**
             * current_user_can() WP Since: 2.0.0
             * @see https://codex.wordpress.org/Function_Reference/current_user_can
             * @see https://codex.wordpress.org/Roles_and_Capabilities
             */
            if (!current_user_can('activate_plugins')) {
                return;
            }

            /**
             * set_transient() WP Since: 2.8  
             * @see https://codex.wordpress.org/Function_Reference/set_transient  
             */
            set_transient('mb-author-box-pro-page-activated', 1, 30);
        }

        /**
         * Deactivate Plugin
         */
        public static function deactivate() {

            //..  
        }

        /**
         * Uninstall Plugin
         */
        public static function uninstall() {

            /**
             * current_user_can() WP Since: 2.0.0
             * @see https://codex.wordpress.org/Function_Reference/current_user_can
             * @see https://codex.wordpress.org/Roles_and_Capabilities
             */
            if (!defined('WP_UNINSTALL_PLUGIN') && !current_user_can('delete_plugins')) {
                return;
            }

            /**
             * Alle registierten setting wieder entfernen und die option dazu
             * 
             * unregister_setting()
             * @see https://codex.wordpress.org/Function_Reference/unregister_setting
             */
            unregister_setting("mb-author-box-pro-setting-group", "mb-author-box-pro-get-setting-group", "");
            delete_option("mb-author-box-pro-get-setting-group");

            // Wir entfernen die beiden versionen die wir erstellt haben
            delete_option('mb-author-box-pro-db-version');
            delete_option('mb-author-box-pro-version');

            global $wpdb;
            $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}melibu_ab");
        }

        /**
         * Add the settings link to the plugins page
         * 
         * @param type $links
         * @return type
         */
        public function melibu_plugin_settings_author_box_link($links) {

            $settings_link = '<a href="admin.php?page=melibu-plugin-author-admin-control-menu-1">' . __('Options', 'author-box-pro') . '</a>';
            array_unshift($links, $settings_link);
            return $links;
        }

        /**
         * Admin Init
         */
        public function admin_init() {

            $this->init_options(); // Option 
            $this->init_settings(); // Settings 
            $this->init_filter(); // Filter 

            global $wpdb;
            if (isset($_POST) && !empty($_POST['mb-author-box-pro-get-setting-group'])) {
                if (!isset($_POST['mb-author-box-pro-nonce']) || !wp_verify_nonce($_POST['mb-author-box-pro-nonce'], 'mb-author-box-pro-nonce-action')) {
                    //..
                } else {
                    $melibu_ab = $wpdb->prefix . "melibu_ab";
                    $get = $wpdb->get_results("SELECT * FROM " . $melibu_ab . "");
                    $dbTableName = 'panel_options';
                    $bodyguard = true;
                    foreach ($_POST['mb-author-box-pro-get-setting-group'] as $key => $val) {
                        $_POST['mb-author-box-pro-get-setting-group'][$key] = htmlentities($val, ENT_QUOTES, "UTF-8");
                    }
                    if ($get) {
                        foreach ($get as $key => $data) {
                            if ($data->name == $dbTableName) {
                                $bodyguard = false;
                                $wpdb->update($melibu_ab, array(
                                    'name' => $dbTableName,
                                    'value' => serialize($_POST['mb-author-box-pro-get-setting-group']),
                                    'time' => time()
                                        ), array('id' => $data->id)
                                );
                            }
                        }
                    }
                    if ($bodyguard === true) {
                        $wpdb->insert($melibu_ab, array(
                            'name' => $dbTableName,
                            'value' => serialize($_POST['mb-author-box-pro-get-setting-group']),
                            'time' => time()
                        ));
                    }
                }
            }
        }

        /**
         * Admin Head
         */
        public function admin_enqueue_scripts() {

            wp_enqueue_media();

            /**
             * wp_enqueue_style() WP Since: 2.6.0 
             * @see https://developer.wordpress.org/reference/functions/wp_enqueue_style/ 
             */
            wp_enqueue_style('melibu-plugin-all-style-css', plugins_url('css/all.min.css', dirname(__FILE__)));
            wp_enqueue_style('melibu-plugin-ab-admin-style-css', plugins_url('css/admin.min.css', dirname(__FILE__)));

            wp_enqueue_script('melibu-plugin-all-event-js', plugins_url('js/mb-all-event.js', dirname(__FILE__)), array(), '', true);
            wp_enqueue_script('melibu-plugin-all-ajax-js', plugins_url('js/mb-all-ajax.js', dirname(__FILE__)), array(), '', true);

            /**
             * 
             * @see https://developer.wordpress.org/reference/functions/wp_register_script/
             */
            wp_register_script('melibu-plugin-ab-admin-nav-js', plugins_url('js/mb-ab-nav.js', dirname(__FILE__)), array(), '', true);
            $drag_translation_array = array(
                'blog_url' => get_bloginfo('url')
            );
            wp_localize_script('melibu-plugin-ab-admin-nav-js', 'melibu_plugin_author_translate', $drag_translation_array);
            wp_enqueue_script('melibu-plugin-ab-admin-nav-js');

            wp_enqueue_script('melibu-plugin-ab-admin-doc-js', plugins_url('js/mb-ab-doc.js', dirname(__FILE__)), array(), '', true);
            wp_enqueue_script('melibu-plugin-ab-admin-uploader-js', plugins_url('js/mb-ab-uploader.js', dirname(__FILE__)), array(), '', true);
        }

        /**
         * Admin Head
         */
        public function admin_head() {

            /**
             * Get Admin Colors (User color sheme)
             */
            global $_wp_admin_css_colors, $MB_AUTHOR_BOX_HELPER;
            $mbPluginABoptions = $MB_AUTHOR_BOX_HELPER->options(); // Globals

            $admin_colors = $_wp_admin_css_colors; // In new var
            $adminColors = $admin_colors[get_user_option('admin_color')]->colors; // Get admin colors | Only use in Backend (fontend dont work)
            update_option('mb-author-admin-colors', $adminColors); // Set admin colors for Frontend
            // CUSTOM CSS
            $customCSS = isset($mbPluginABoptions['custom-css']) && !empty($mbPluginABoptions['custom-css']) ? $mbPluginABoptions['custom-css'] : '';

            // ADMIN COLORS ACTIVE
            $isColorsActivated = isset($mbPluginABoptions['color']) && $mbPluginABoptions['color'] == 'on' ? $mbPluginABoptions['color'] : '';
            if ($isColorsActivated != '' && isset($admin_colors[0])) {
                ?>
                <style type='text/css'>

                    /*.mb-author--tabs {
                        background-color: <?php // echo $admin_colors[0];                ?>;
                    }*/

                    .mb-author--tabs .mb-author--tabs-tab input[type=radio]:checked + .mb-author--tabs-tab-label {
                        background-color: <?php echo $admin_colors[0]; ?>;
                        color: <?php echo $admin_colors[3]; ?>;
                    }

                    .mb-author--tabs .mb-author--tabs-tab .mb-author--tabs-tab-label {
                        background-color: <?php echo $admin_colors[2]; ?>;
                        color: <?php echo $admin_colors[3]; ?> !important;
                    }

                    .mb-author--tabs .mb-author--tabs-tab .mb-author--tabs-tab-label:hover {
                        background-color: <?php echo $admin_colors[3]; ?>;
                        color: <?php echo $admin_colors[1]; ?> !important;
                    }

                    .mb-author--tabs .mb-author--tabs-tab .mb-author--tabs-tab-content {
                        background-color: <?php echo $admin_colors[0]; ?>;
                        color: <?php echo $admin_colors[3]; ?>;
                    }

                    .mb-author--tabs .mb-author--tabs-tab .mb-author--tabs-tab-content-header {
                        color: <?php echo $admin_colors[3]; ?>;
                    }

                    .mb-author--tabs .mb-author--tabs-tab .mb-author--tabs-tab-content-description {
                        color: <?php echo $admin_colors[3]; ?>;
                    }

                    .mb-author--tabs .mb-author--tabs-tab .mb-author--tabs-tab-content-description strong {
                        color: <?php echo $admin_colors[3]; ?>;
                    }

                    .mb-author--tabs .mb-author--tabs-tab .mb-author--tabs-tab-content h1 {
                        color: <?php echo $admin_colors[3]; ?> !important;
                    }
                    .mb-author--tabs .mb-author--tabs-tab .mb-author--tabs-tab-content h2 {
                        color: <?php echo $admin_colors[3]; ?> !important;
                    }
                    .mb-author--tabs .mb-author--tabs-tab .mb-author--tabs-tab-content h3 {
                        color: <?php echo $admin_colors[3]; ?> !important;
                    }
                    .mb-author--tabs .mb-author--tabs-tab .mb-author--tabs-tab-content h4 {
                        color: <?php echo $admin_colors[3]; ?> !important;
                    }
                    .mb-author--tabs .mb-author--tabs-tab .mb-author--tabs-tab-content h5 {
                        color: <?php echo $admin_colors[3]; ?> !important;
                    }
                    .mb-author--tabs .mb-author--tabs-tab .mb-author--tabs-tab-content h6 {
                        color: <?php echo $admin_colors[3]; ?> !important;
                    }

                    .mb-author--tabs .mb-author--tabs-tab .mb-author--tabs-tab-content a {
                        color: <?php echo $admin_colors[2]; ?> !important;
                    }

                    .mb-author--tabs .mb-author--tabs-tab .mb-author--tabs-tab-content a:hover {
                        color: <?php echo $admin_colors[3]; ?> !important;
                    }

                    <?php echo $customCSS; ?>

                </style>
                <?php
            } else {
                ?>
                <style type='text/css'>
                <?php echo $customCSS; ?>
                </style>
                <?php
            }
        }

        /**
         * Plugins Loaded
         */
        public function plugins_loaded() {

            $this->create(); // Create
            $this->update(); // Update
        }

        /**
         * Plugins Loaded Once on Activate
         */
        public function plugins_loaded_about() {

            /**
             * get_transient() WP Since: 2.8 
             * @see https://codex.wordpress.org/Function_Reference/get_transient 
             */
            if (!get_transient('mb-author-box-pro-page-activated')) {
                return;
            }

            /**
             * delete_transient() WP Since: 2.8 
             * @see https://codex.wordpress.org/Function_Reference/delete_transient 
             */
            delete_transient('mb-author-box-pro-page-activated');

            /**
             * wp_safe_redirect() WP Since: 2.3
             * @see https://codex.wordpress.org/Function_Reference/wp_safe_redirect
             * 
             * wp_redirect() WP Since: 1.5.1 
             * @see https://codex.wordpress.org/Function_Reference/wp_redirect 
             */
            wp_redirect(
                    /**
                     * admin_url() WP Since:2.6.0 
                     * @see https://codex.wordpress.org/Function_Reference/admin_url 
                     */
                    admin_url('admin.php?page=melibu-plugin-author-admin-control-menu-2')
            );

            exit;
        }

    }

    global $MB_AUTHOR_BOX_BACKEND;
    $MB_AUTHOR_BOX_BACKEND = new MB_AUTHOR_BOX_BACKEND();
} 