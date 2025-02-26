<?php
/**
 * MELIBU PLUGIN FRONTEND CLASS
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        https://www.tnado.com/author/prod3v3loper/
 * @package     Melabu
 * @subpackage  Auto Text Typing
 * @since       1.0
 */
if (!class_exists('MELIBU_PLUGIN_FRONTEND_07')) {

    class MELIBU_PLUGIN_FRONTEND_07 {

        private $locale = '';

        /**
         *  Construct the plugin object
         */
        public function __construct() {

            add_action('init', array($this, 'init'));
            add_action('wp_enqueue_scripts', array($this, 'wp_enqueue_scripts'));
            add_action('plugins_loaded', array($this, 'plugins_loaded'));
            add_action('widgets_init', array($this, 'widgets_init'));
            add_action('wp_head', array($this, 'wp_head'));

            add_shortcode('wp_mb_plugin_typing', array($this, 'shortcode'));
        }

        /**
         * 
         */
        public function init() {

            $this->init_filter();
        }

        /**
         * 
         */
        public function init_filter() {

            add_filter('widget_text', 'do_shortcode'); // Enable Shortcode in Text Widgets

            /**
             * apply_filters() WP Since: 0.71
             * https://developer.wordpress.org/reference/functions/apply_filters/
             */
            $this->locale = apply_filters('plugin_locale', get_locale(), 'auto-text-typing');
        }

        /**
         * 
         */
        public function wp_enqueue_scripts() {

            /**
             * wp_enqueue_style() WP Since: 2.6.0
             * https://developer.wordpress.org/reference/functions/wp_enqueue_style/
             */
            wp_enqueue_style('melibu-plugin-att-style-css', plugins_url('css/style.min.css', dirname(__FILE__)));


            /**
             * wp_enqueue_script() WP Since: 2.1.0
             * https://developer.wordpress.org/reference/functions/wp_enqueue_script/
             */
//            wp_enqueue_script('melibu-plugin-ajax-js', plugins_url('js/mb-all-ajax.js', dirname(__FILE__)));
            wp_enqueue_script('melibu-plugin-all-event-js', plugins_url('js/mb-all-event.js', dirname(__FILE__)));
            wp_enqueue_script('melibu-plugin-att-typing-js', plugins_url('js/mb-att-typing.js', dirname(__FILE__)), '', '', true);
        }

        public function wp_head() {
            ?>
            <style type="text/css">
                .typing-letters > div p, 
                .typing-letters > div small, 
                .typing-letters > div ul, 
                .typing-letters > div ul li, 
                .typing-letters > div h1, 
                .typing-letters > div h2, 
                .typing-letters > div h3, 
                .typing-letters > div h4, 
                .typing-letters > div h5, 
                .typing-letters > div h6  {

                    color: <?php echo get_option('text-color'); ?>; 
                }

                .typing-letters > div {

                    color: <?php echo get_option('text-color'); ?>; 
                    padding:<?php echo get_option('padding'); ?>px;
                    border-color:<?php echo get_option('text-color'); ?>px;
                    border-radius:<?php echo get_option('border-radius'); ?>px;
                    border-width:<?php echo get_option('border-width'); ?>px;
                    border-style:<?php echo get_option('border-style'); ?>;
                    background-color:<?php echo get_option('background-color'); ?>; 
                }

                .typing-letters > div a {

                    text-decoration: underline;
                    color:<?php echo get_option('text-color'); ?>; 
                    padding:<?php echo get_option('padding'); ?>px;
                }
            </style>
            <?php
        }

        /**
         * 
         */
        public function plugins_loaded() {

            $this->load_textdomain();
        }

        /**
         * 
         */
        public function load_textdomain() {

            load_textdomain('auto-text-typing', WP_LANG_DIR . "/plugins/auto-text-typing/auto-text-typing-$this->locale.mo");
            load_plugin_textdomain('auto-text-typing', false, plugin_basename(MELIBU_PLUGIN_PATH_07 . 'lang/'));
        }

        /**
         * Add Shortcode
         * 
         * @param type $atts
         * @param type $content
         * @return type
         */
        public function shortcode($atts, $content = null) {

            $backturn = '';
            $backturn .= '<div class="typing-letters">';
            $backturn .= '<div>' . $content . '</div>';
            $backturn .= '</div>';
            
            // Create and get from options the copyrights
            if (get_option('copyright') && get_option('copyright') != 0) {
                $backturn .= '<span class="st_copy">';
                $backturn .= 'Created &copy; by';
                $backturn .= '&nbsp;<a href="https://www.tnado.com" target="_blank">Melabu</a>';
                $backturn .= '</span>';
            }

            return $backturn;
        }

        /**
         *  register widgets
         */
        public function widgets_init() {
            
        }

    }

}
