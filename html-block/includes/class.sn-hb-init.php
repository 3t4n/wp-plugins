<?php

if ( ! defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly

if ( ! class_exists( 'SN_HB_INIT' ) ) {

    class SN_HB_INIT {

        /**
         * Constructor
         * @description Function to register and initialize WP actions for the plugin
         */
        function __construct() {

            register_activation_hook( SN_HB_FILE, array( 'SN_HB_INIT', 'install_plugin_data' ) );
            register_uninstall_hook( SN_HB_FILE, array( 'SN_HB_INIT', 'uninstall_plugin_data' ) );

            $this->init_plugin();
        }

        /**
         * Initializer plugin
         * @description Function initialize action for the plugin
         *
         * @return null
         */
        public function init_plugin() {
            add_filter( 'plugin_action_links_' . SN_HB_FILE_NAME, array( $this, 'plugin_action_links' ) );
            add_action( 'admin_head', array( &$this, 'add_head_css'), 10 );
            add_action( 'admin_head', array( &$this, 'add_head_js'), 10 );
            add_filter( 'manage_edit-html-block_columns', array( $this, 'add_shortcode_column' ) );
            add_action( 'manage_html-block_posts_custom_column', array( $this, 'add_shortcode_column_content') );
            add_shortcode( 'html_block', array( $this, 'html_block_content' ) );
        }

        /**
         * Add action links on plugin page
         * @description Function to add plugin action links
         *
         * @param $links
         * @return array
         */
        public function plugin_action_links( $links ) {
            $plugin_links = array(
                '<a target="_blank" href="'.SN_HB_AUTHOR_URL.'contact-us">' . __('Support', SN_HB_SLUG) . '</a>',
                '<a target="_blank" href="https://wordpress.org/support/plugin/html-block/reviews?rate=5#new-post">' . __('Review', SN_HB_SLUG) . '</a>',
                //'<a target="_blank" href="'.SN_HB_PLUGIN_URL.'" style="color:#4DB849;"> ' . __('Premium Upgrade', SN_HB_SLUG) . '</a>',
            );
            return array_merge($plugin_links, $links);
        }


        /**
         * Add Head CSS
         * @description Function to add global CSS admin head
         *
         * @return null
         */
        public function add_head_css() {

        }

        /**
         * Add Head JS
         * @description Function to add global JS variables in admin head
         *
         * @return null
         */
        public function add_head_js() {
            ?>
            <script>
                var sn_hb_admin_url = "<?php echo( admin_url() ); ?>";
            </script>
            <?php
        }

        /**
         * Install plugin data
         * @description Function to install the data at installation
         *
         * @return null
         */
        public function install_plugin_data() {

        }

        /**
         * Uninstall plugin data
         * @description Function to uninstall the data at un-installation
         *
         * @return null
         */
        public function uninstall_plugin_data() {

        }


        function add_shortcode_column( $columns ){
            $columns['html_block_shortcode'] = 'Content Shortcode';
            return( $columns );
        }

        /**
         * Add shortcode column on listing
         * @description Function to show shortcode on listing page
         *
         * @return null
         */
        public function add_shortcode_column_content( $column ) {
            global $post;

            if ( $column == 'html_block_shortcode' ) {
                echo( wp_kses_post('[html_block id="' . $post->ID . '"] <br /> [html_block slug="' . $post->post_name . '"]' ));
            }
        }

        /**
         * Show HTML block content
         * @description Function to show shortcode content
         *
         * @return null
         */
        public function html_block_content( $attrs, $content = null ) {
            $output = '';
            $attrs = shortcode_atts( array(
                'id' => '',
                'slug' => ''
            ), $attrs );
            $id = $attrs['id'];
            $slug = $attrs['slug'];
            if( $id ) {
                $output = get_post($id)->post_content;
            }
            elseif( $slug ) {
                $args = array(
                    'name'        => $slug,
                    'post_type'   => 'html-block',
                    'post_status' => 'publish',
                    'numberposts' => 1
                );
                $result = get_posts($args);
                if($result) {
                    $output = $result[0]->post_content;
                }
            }
            return( $output );
        }
    }
}

$sn_hb_init = new SN_HB_INIT();
