<?php

/**
 * class.Frontend.php 
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        https://www.tnado.com/author/prod3v3loper/
 * @package     Melabu
 * @subpackage  Author Box Pro
 * @since       1.0
 */

if (!class_exists('MB_AUTHOR_BOX_FRONTEND')) {

    class MB_AUTHOR_BOX_FRONTEND {

        /**
         * Locale
         * 
         * @var type 
         */
        private $locale = '';

        /**
         *  Construct
         */
        public function __construct() {

            $this->action_handler();
        }

        /**
         * 
         */
        private function action_handler() {

            /**
             * add_action() WP Since: 1.2.0
             * https://developer.wordpress.org/reference/functions/add_action/
             */
            add_action('init', array($this, 'init'));
            add_action('plugins_loaded', array($this, 'plugins_loaded'));
            add_action('widgets_init', array($this, 'widgets_init'));
            add_action('wp_head', array($this, 'wp_head'));
            add_action('wp_enqueue_scripts', array($this, 'wp_enqueue_scripts'));
            add_action('wp_footer', array($this, 'wp_footer'));

            /**
             * add_shortcode() WP Since: 2.5
             * https://codex.wordpress.org/Function_Reference/add_shortcode
             */
            add_shortcode('wp-mb-author-box-pro', array($this, 'shortcode')); // Dies erlaub ein short code einsatzt den wir schon im backend vorbereitet haben
        }

        /**
         * Init
         */
        public function init() {

            $this->init_filters(); // Filter
        }

        /**
         * Init Filters
         */
        public function init_filters() {

            /**
             * apply_filters() WP Since: 0.71
             * https://developer.wordpress.org/reference/functions/apply_filters/
             */
            $this->locale = apply_filters('plugin_locale', get_locale(), 'author-box-pro'); // Locale holen und festhalten
            add_filter('widget_text', 'do_shortcode'); // Shortcode in Text Widgets erlauben
            add_filter('the_content', array($this, 'the_content'));
        }

        /**
         * WP Enqueue Scripts
         */
        public function the_content($content) {

            global $MB_AUTHOR_BOX, $MB_AUTHOR_BOX_HELPER;
            $mbPluginABoptions = $MB_AUTHOR_BOX_HELPER->options();

            $userID = get_the_author_meta('ID');

            /**
             * USER query
             */
            $user = new WP_User($userID);
            $userRoles = array();
            foreach ($user->roles as $role) {
                $role = get_role($role);
                if ($role != null) {
                    $userRoles[] = $role->name;
                }
            }

            // OPTIONS
            $checkArray = array(
                isset($mbPluginABoptions['role-administrator']) ? 'administrator' : '',
                isset($mbPluginABoptions['role-editor']) ? 'editor' : '',
                isset($mbPluginABoptions['role-author']) ? 'author' : '',
                isset($mbPluginABoptions['role-contributer']) ? 'contributer' : '',
                isset($mbPluginABoptions['role-subscriber']) ? 'subscriber' : ''
            );

            foreach ($userRoles as $check) {
                if (!in_array($check, $checkArray)) {
                    return $content;
                }
            }

            $userPostTypes = $MB_AUTHOR_BOX_HELPER->post_types(true);
            foreach ($userPostTypes as $userPostType => $userPostTypeValue) {
                if ($userPostType == get_post_type()) {
                    if (isset($mbPluginABoptions[$userPostType]) && $mbPluginABoptions[$userPostType] == 'below') {
                        $content = $content . $MB_AUTHOR_BOX->profile();
                    } else if (isset($mbPluginABoptions[$userPostType]) && $mbPluginABoptions[$userPostType] == 'above') {
                        $content = $MB_AUTHOR_BOX->profile() . $content;
                    }
                }
            }
                        
            return $content;
        }

        /**
         * WP Enqueue Scripts
         */
        public function wp_enqueue_scripts() {

            /**
             * wp_enqueue_style() WP Since: 2.6.0
             * https://developer.wordpress.org/reference/functions/wp_enqueue_style/
             */
            wp_enqueue_style('melibu-ab-style', plugins_url('css/style.min.css', dirname(__FILE__)));
            wp_enqueue_style('font-awesome-4-6-1', plugins_url('ext/font-awesome-4.6.1/css/font-awesome.min.css', dirname(__FILE__)));
        }

        /**
         * WP Head
         */
        public function wp_head() {

            /**
             * Get saved or default settings
             */
            global $MB_AUTHOR_BOX_HELPER;
            $mbPluginABoptions = $MB_AUTHOR_BOX_HELPER->options(); // Options

            $admin_colors = get_option('mb-author-admin-colors'); // Get admin colors from backend
            // CUSTOM CSS
            $customCSS = isset($mbPluginABoptions['custom-css']) && !empty($mbPluginABoptions['custom-css']) ? $mbPluginABoptions['custom-css'] : '';

            // ADMIN COLORS ACTIVE
            $isColorsActivated = isset($mbPluginABoptions['color']) && $mbPluginABoptions['color'] == 'on' ? $mbPluginABoptions['color'] : '';
            if ($isColorsActivated != '') {
                ?>
                <style type='text/css'>

                    /*.mb-author--tabs {
                        background-color: <?php // echo $admin_colors[0];      ?>;
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
         * WP Footer
         */
        public function wp_footer() {

            //..
        }

        /**
         * Plugins Loaded
         */
        public function plugins_loaded() {

            $this->load_textdomain();
        }

        /**
         * Load Textdomains
         * Textdomain für plugin und WordPress.org laden
         */
        public function load_textdomain() {

            /**
             * load_textdomain() WP Since: 1.5.0
             * https://codex.wordpress.org/Function_Reference/load_textdomain
             */
            load_textdomain('author-box-pro', WP_LANG_DIR . "/plugins/author-box-pro/author-box-pro-$this->locale.mo");

            /**
             * load_plugin_textdomain() WP Since: 1.5.0
             * https://codex.wordpress.org/Function_Reference/load_plugin_textdomain
             */
            load_plugin_textdomain('author-box-pro', false, plugin_basename(MB_AUTHOR_BOX_PATH . 'languages/'));
        }

        /**
         * Short Code
         * 
         * @param type $atts
         * @param type $content
         * @return type
         * 
         * https://codex.wordpress.org/Shortcode_API
         */
        public function shortcode($atts, $content = null) {

            global $MB_AUTHOR_BOX, $MB_AUTHOR_BOX_HELPER;
            $mbPluginABoptions = $MB_AUTHOR_BOX_HELPER->options();

            $userID = get_the_author_meta('ID');

            /**
             * USER query
             */
            $user = new WP_User($userID);
            $userRoles = array();
            foreach ($user->roles as $role) {
                $role = get_role($role);
                if ($role != null) {
                    $userRoles[] = $role->name;
                }
            }

            // OPTIONS
            $checkArray = array(
                isset($mbPluginABoptions['role-administrator']) ? 'administrator' : '',
                isset($mbPluginABoptions['role-editor']) ? 'editor' : '',
                isset($mbPluginABoptions['role-author']) ? 'author' : '',
                isset($mbPluginABoptions['role-contributer']) ? 'contributer' : '',
                isset($mbPluginABoptions['role-subscriber']) ? 'subscriber' : ''
            );

            foreach ($userRoles as $check) {
                if (!in_array($check, $checkArray)) {
                    return $content;
                }
            }

            $userPostTypes = $MB_AUTHOR_BOX_HELPER->post_types(true);
            foreach ($userPostTypes as $userPostType => $userPostTypeValue) {
                if ($userPostType == get_post_type()) {
                    if (isset($mbPluginABoptions[$userPostType]) && $mbPluginABoptions[$userPostType] == 'below') {
                        $content = $content . $MB_AUTHOR_BOX->profile();
                    } else if (isset($mbPluginABoptions[$userPostType]) && $mbPluginABoptions[$userPostType] == 'above') {
                        $content = $MB_AUTHOR_BOX->profile() . $content;
                    }
                }
            }

            return $content;
        }

        /**
         * Init Widgets
         */
        public function widgets_init() {

            require_once MB_AUTHOR_BOX_PATH . 'classes/class.MelibuWidget.php';

            /**
             * register_widget()
             * https://codex.wordpress.org/Function_Reference/register_widget
             */
            register_widget('MB_AUTHOR_BOX_WIDGET');
        }

    }
    
    global $MB_AUTHOR_BOX_FRONTEND;
    $MB_AUTHOR_BOX_FRONTEND = new MB_AUTHOR_BOX_FRONTEND();

}
