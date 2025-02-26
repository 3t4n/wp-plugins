<?php
if ( ! class_exists('PricingTableADL') ) :
    class PricingTableADL {

        private $req_wp_version = '4.0';

        function __construct( ){
            // Don't let the class/plugin instantiate outside of WordPress
            if ( ! defined('ABSPATH') ) { return; }
            add_action('admin_init', [$this, 'warn_if_unsupported_wp']);

            // create custom table custom post
            require_once PT_DIR . 'includes/pt-custom-post.php';
            //require_once 'includes/pt-metabox.php';
            new APT_Custom_Post(PT_POST_TYPE, PT_POST_TYPE, 'Pricing Table', 'Pricing Tables', ['supports' => ['title']], 'dashicons-editor-table' );
            // add custom columns below

            // includes all files
            $this->apt_include_files();
            $metabox = new PT_Metabox();
            $shortcode = new PT_Shortcode();
            // admin hooks and filter
            if ( is_admin() ) {
                //actions
                add_action( 'admin_enqueue_scripts', array( $this, 'pt_admin_enqueue_scripts' ), 9999 );
                add_action('plugins_loaded', [ $this, 'load_textdomain' ] );
                add_action('admin_menu', [$this, 'add_menu']);
                //filters
                add_filter( 'plugin_action_links_' . PT_BASE, [$this, 'add_pro_version_link'] );
                add_filter('manage_'.PT_POST_TYPE.'_posts_columns', [$this, 'add_new_columns']);
                add_action('manage_'.PT_POST_TYPE.'_posts_custom_column', [$this, 'manage_custom_columns'], 10, 2);
                add_filter( 'enter_title_here', [$this, 'change_title_text'] );

            }



            // all other hooks
            // enqueue all front-end scripts. 'template_redirect' is the best hook to use for front-end scripts
            add_action('template_redirect', [$this, 'pt_user_enqueue_scripts']);

            // Enables shortcode for Widget
            add_filter('widget_text', 'do_shortcode');


        }

        public function add_menu() {
            add_submenu_page( 'edit.php?post_type='.PT_POST_TYPE, __('Upgrade to Pro', PT_TEXTDOMAIN), __('Upgrade', PT_TEXTDOMAIN), 'manage_options', 'pt-upgrade', [$this, 'admin_menu_cb'] );

        }

        public function admin_menu_cb(  ) {
            include_once PT_DIR . 'includes/pt-upgrade.php';

        }
        public function pt_admin_enqueue_scripts( $page ) {
            global $typenow;
            if ( PT_POST_TYPE == $typenow ) {
                wp_enqueue_style('cmb2-style', PT_ADMIN_ASSETS . 'css/cmb2.min.css', false, PT_VERSION);
                wp_enqueue_style('pt-admin-style', PT_ADMIN_ASSETS . 'css/pt-admin.css', false, PT_VERSION);
                wp_enqueue_style('pt-admin-nice-select', PT_ADMIN_ASSETS . 'css/nice-select.css', false, PT_VERSION);
                wp_dequeue_style('jquery-ui-css'); 
                wp_enqueue_style('jquery-ui', PT_ADMIN_ASSETS . 'css/jquery-ui.min.css', ['pt-admin-style'], PT_VERSION);
                wp_enqueue_style('sweetalertcss', 'https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css', false, PT_VERSION);

                wp_enqueue_script('nice-select-js', PT_ADMIN_ASSETS . 'js/jquery.nice-select.min.js', ['jquery'], PT_VERSION, true);
                wp_enqueue_script('sweetalert', 'https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js', ['jquery'], PT_VERSION, true);
                wp_enqueue_script('admin-js', PT_ADMIN_ASSETS . 'js/apt-admin.js', ['jquery', 'nice-select-js', 'wp-color-picker', 'jquery-ui-accordion', 'jquery-ui-slider', 'sweetalert', ], PT_VERSION, true);
                wp_enqueue_style('wp-color-picker');



            }

        }

        public function pt_user_enqueue_scripts() {
            // enqueue bootstrap here so that it loads before style.css
            wp_enqueue_style('pt-bootstrap-min', PT_PUBLIC_ASSETS . 'css/bootstrap.min.css', false, PT_VERSION);
            wp_register_style('pt-core', PT_PUBLIC_ASSETS . 'css/core.css', false, PT_VERSION);

        }

        public function add_pro_version_link($links) {
            unset($links['edit']); // protect editing the plugin
            $links[] = sprintf( '<a href="%s" title="%s">%s</a>', 'post-new.php?post_type='.PT_POST_TYPE, 'Add New Table', __( 'Add New Table', PT_TEXTDOMAIN ) );
            $links[] = sprintf( '<a href="%s" title="%s" target="_blank">%s</a>', 'http://adlplugins.com/plugin/adl-pricing-table-pro', 'Upgrade to PRO version for Priority SUPPORT and Many Amazing Features.', __( 'Get Pro Version', PT_TEXTDOMAIN ) );
            return $links;

        }


        //Load text domain
        public function load_textdomain( ){
            load_textdomain(PT_TEXTDOMAIN, false, plugin_basename( dirname( __FILE__ ) ) . '/languages/');
        }

        /**
         * Includes all required files
         * @return void
         */
        public function apt_include_files( ){
            require_once PT_DIR . 'includes/pt-metabox.php';
            require_once PT_DIR . 'includes/pt-metabox.php';
            require_once PT_DIR . 'includes/pt-shortcode.php';
        }

        public function add_new_columns($new_columns){
            $new_columns = [];
            $new_columns['cb']   = '<input type="checkbox" />';
            $new_columns['title']   = __('Table Name', PT_TEXTDOMAIN);
            $new_columns['pt_shortcode_col']   = __('Table Shortcode', PT_TEXTDOMAIN);
            $new_columns['date']   = __('Created at', PT_TEXTDOMAIN);
            return $new_columns;
        }

        public function manage_custom_columns( $column_name, $post_id ) {
            switch($column_name){
                case 'pt_shortcode_col': ?>
                    <textarea style="resize: none; background-color: #eeeeee; color: #2d3135;" cols="30" rows="1" onClick="this.select();" >[adl-pricing-table <?php echo 'id="'.$post_id.'"';?>]</textarea>
                    <?php
                    break;

                default:
                    break;

            }
        }



        /**
         * Change the placeholder of title input box
         * @param string $title Name of the Pricing Table
         *
         * @return string
         */
        function change_title_text( $title ){

            return ( PT_POST_TYPE == get_current_screen()->post_type ) ? 'Enter a table name' : $title;

        }





        public function warn_if_unsupported_wp() {
            if ( $this->check_minimum_required_wp_version() ) {
                $wp_ver = ! empty( $GLOBALS['wp_version'] ) ? $GLOBALS['wp_version'] : '(undefined)';
                ?>
                <div class="error notice is-dismissible"><p>
                        <?php

                        printf( __( 'Pricing Table Lite requires WordPress version %1$s or newer. It appears that you are running %2$s. The plugin may not work properly.', PT_TEXTDOMAIN ),
                            $this->req_wp_version,
                            esc_html( $wp_ver )
                        );

                        echo '<br>';

                        printf( __( 'Please upgrade your WordPress installation or download latest version from <a href="%s" target="_blank" title="Download Latest WordPress">here</a>.', PT_TEXTDOMAIN ),
                            'https://wordpress.org/download/'
                        );

                        ?>
                    </p></div>
                <?php

                return;
            }
        }

        // Min required wp version
        private function check_minimum_required_wp_version() {
            include( ABSPATH . WPINC . '/version.php' ); // get an unmodified $wp_version
            return ( version_compare( $wp_version, $this->req_wp_version, '<' ) );
        }







        //getters and setters


        public function setReqWP( $version ) {
            $this->req_wp_version = $version;
        }

        public function getReqWP(  ) {
            return $this->req_wp_version;
        }
    }



endif;

