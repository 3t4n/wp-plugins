<?php
/*  Addlly AI
 *  Plugin Name: Addlly
 *  Description: Create SEO-optimized blogs in one click with the best AI writer for WordPress. Get topic suggestions, keywords, meta tags, AI-generated images, FAQ schema. Select multiple AI models, geo-location, language.
 *  Version: 1.0.2
 *  Author: Addlly
 *  Author URI: https://addlly.ai
 *  License: GPLv2 or later
 *  Text Domain: addlly
 *  Domain Path: /languages
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

define( 'ADDLLY_URL', plugins_url( '', __FILE__ ) );
define( 'ADDLLY_PATH', plugin_dir_path( __FILE__ ) );
define( 'ADDLLY_REL_PATH', dirname( plugin_basename( __FILE__ ) ) . '/' );
require ADDLLY_PATH . '/inc/ajax-functions.php';
require ADDLLY_PATH . '/inc/helpers.php';

if (!class_exists('Addlly')) {
    class Addlly {

        // Constructor
        public function __construct() {
            
            register_activation_hook( __FILE__, array($this, 'addlly_activate'), 9999 );
            add_action('admin_init', array($this,  'addlly_redirect_to_login_page') );
            add_action('admin_init', array($this,  'addlly_app_redirect') );
            add_action('plugins_loaded', array($this, 'addlly_load_textdomain'));
            
            add_action('admin_menu', array($this, 'addlly_add_admin_menu'));
            add_action('admin_enqueue_scripts', array($this, 'addlly_admin_enqueue_scripts'));
            
            require ADDLLY_PATH . '/classes/one-click-blog-writer.php';
            
            add_action( 'wp_head', array($this, 'addlly_custom_js'), 999 );
            
        }
        
        public function addlly_activate(){
            update_option('addlly_activation_redirect', true);
        }
        
        public function addlly_redirect_to_login_page() {
            global $pagenow;
            $current_page = addlly_get_current_page();
            if (get_option('addlly_activation_redirect')) {
                delete_option('addlly_activation_redirect');
                if (is_admin() && !defined('DOING_AJAX')) {
                    wp_redirect(admin_url('admin.php?page=addlly'));
                    exit;
                }
            }
            if ($pagenow == 'admin.php' && isset($current_page) && in_array($current_page, array('buy-plan', 'one-click', 'buy-more-credits'))) {
                if(get_user_meta(get_current_user_id(), 'addlly_user_id', true) <= 0 ){
                    wp_redirect(admin_url('admin.php?page=addlly'));
                    exit;
                }
                if(isset($current_page) && $current_page == 'buy-plan'){
                    wp_redirect('https://staging.addlly.ai/plans');
                    exit;
                }
                if(isset($current_page) && $current_page == 'buy-more-credits'){
                    wp_redirect('https://staging.addlly.ai/buy-more-credits');
                    exit;
                }
            }
            
            if ($pagenow == 'admin.php' && isset($current_page) && in_array($current_page, array('addlly'))) {
                if(get_user_meta(get_current_user_id(), 'addlly_user_id', true) > 0 ){
                    wp_redirect(admin_url('admin.php?page=getting-started'));
                    exit;
                }
            }
        }
        public function addlly_app_redirect() {
            $current_page     = addlly_get_current_page();
            $username         = addlly_get_query_arg('username');
            $password         = addlly_get_query_arg('password');
            $plan_purchased   = addlly_get_query_arg('plan_purchased');
            
            if(is_admin()  && !defined('DOING_AJAX') && isset($current_page) && isset($username) && !empty($username) && isset($password) && !empty($password)){
                addlly_login_by_app(sanitize_text_field(wp_unslash($username)), sanitize_text_field(wp_unslash($password)));
            }
            
            if(is_admin()  && !defined('DOING_AJAX') && isset($current_page) && isset($plan_purchased) && $plan_purchased == 'yes'){
                $user_app_detail = addlly_user_app_detail(addlly_user_id());
                $current_plan    = isset($user_app_detail['current_plan'])   ? $user_app_detail['current_plan']   : '';
                if( $current_plan != '' ){
                    update_user_meta(get_current_user_id(), 'addlly_user_plan', $current_plan);
                    wp_redirect(admin_url('admin.php?page=one-click'));
                    exit;
                }
            }
        }
        
        public function addlly_load_textdomain(){
            $addlly_path = str_replace( '\\', '/', ADDLLY_PATH );
            $mu_path    = str_replace( '\\', '/', WPMU_PLUGIN_DIR );

            if ( stripos( $addlly_path, $mu_path ) !== false ) {
                load_muplugin_textdomain( 'addlly', ADDLLY_URL . '/languages/' );
            }
            else {
                load_plugin_textdomain( 'addlly', false, ADDLLY_URL . '/languages/' );
            }
        }
        
        // Add Admin Menu
        public function addlly_add_admin_menu() {
            add_menu_page(__('Addlly', 'addlly'), __('Addlly', 'addlly'), 'manage_options', 'addlly', array($this, 'addlly_settings_page'), 'dashicons-admin-page', 6);
            add_submenu_page('addlly', __('Getting Started', 'addlly'), __('Getting Started', 'addlly'), 'manage_options', 'getting-started', array($this, 'addlly_getting_started_page'));
            if( addlly_user_id() > 0 ){
                add_submenu_page('addlly', __('Buy Plan', 'addlly'), __('Buy Plan', 'addlly'), 'manage_options', 'buy-plan', array($this, 'addlly_buy_plan_page'));
            }
            $addlly_user_plan = get_user_meta(get_current_user_id(), 'addlly_user_plan', true);
            if( $addlly_user_plan != '' ){
                add_submenu_page('addlly', __('Buy More Credits', 'addlly'), __('Buy More Credits', 'addlly'), 'manage_options', 'buy-more-credits', array($this, 'addlly_buy_more_credits'));
            }
        }
        
        public function addlly_custom_js(){
            if (is_singular('post')){
                $faqSchema = get_post_meta(get_the_ID(), 'faqSchema', true);
                if( $faqSchema != '' ){
                    echo '<script type="application/ld+json">'. esc_html($faqSchema) .'</script>';
                }
            }
        }

        public function addlly_admin_enqueue_scripts(){
            global $pagenow, $current_screen;
            
            if ($pagenow == 'admin.php' && isset($current_screen->id) && in_array($current_screen->id, array('toplevel_page_addlly', 'addlly_page_getting-started', 'addlly_page_one-click'))) {
                
                $version = '1.0.2';
                wp_enqueue_style( 'bootstrap', ADDLLY_URL. '/assets/lib/css/bootstrap.min.css', array(), $version );
                wp_enqueue_style( 'sweetalert', ADDLLY_URL. '/assets/lib/css/sweetalert.min.css', array(), $version );
                wp_enqueue_style( 'toastr', ADDLLY_URL. '/assets/lib/css/toastr.min.css', array(), $version );
                
                wp_enqueue_style( 'addlly-admin', ADDLLY_URL. '/assets/css/admin.css', array(), $version );
                wp_enqueue_style( 'addlly-social-media-posts', ADDLLY_URL. '/assets/css/social-media-posts.css', array(), $version );
                wp_enqueue_style( 'Inter', 'http://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap', array(), $version );
                wp_enqueue_style( 'addlly-tinymce-editor', ADDLLY_URL. '/assets/css/tinymceEditor.css', array(), $version );
                
                wp_enqueue_script( 'bootstrap', ADDLLY_URL. '/assets/lib/js/bootstrap.min.js', array(), $version, true );
                wp_enqueue_script( 'bootstrap.bundle', ADDLLY_URL. '/assets/lib/js/bootstrap.bundle.min.js', array(), $version, true );
                wp_enqueue_script( 'toastr', ADDLLY_URL. '/assets/lib/js/toastr.min.js', array(), $version, true );
                wp_enqueue_script( 'sweetalert', ADDLLY_URL. '/assets/lib/js/sweetalert.min.js', array(), $version, true );
                
                //beautify html/js
                wp_enqueue_script( 'beautify', ADDLLY_URL. '/assets/lib/js/beautify.min.js', array(), $version, true );
                wp_enqueue_script( 'beautify-html', ADDLLY_URL. '/assets/lib/js/beautify-html.min.js', array(), $version, true );
                wp_enqueue_script( 'html2pdf', ADDLLY_URL. '/assets/lib/js/html2pdf.bundle.min.js', array(), $version, true );
                wp_enqueue_script( 'tinymce', ADDLLY_URL. '/assets/lib/tinymce/tinymce.min.js', array(), $version, true );
                wp_enqueue_script( 'addlly-tinymce-editor', ADDLLY_URL. '/assets/js/tinymceEditor.js', array(), $version, true );
                wp_enqueue_script( 'monaco-editor', ADDLLY_URL. '/assets/lib/js/loader.min.js', array(), $version, true );
                
                wp_enqueue_script( 'addlly-admin', ADDLLY_URL. '/assets/js/admin.js', array(), $version, true );
                wp_enqueue_script( 'addlly-social-media-posts', ADDLLY_URL. '/assets/js/social-media-posts.js', array(), $version, true );
                wp_enqueue_script( 'addlly-image-library', ADDLLY_URL. '/assets/js/image-library.js', array(), $version, true );
                wp_enqueue_script( 'addlly-custom-script', ADDLLY_URL. '/assets/js/custom-script.js', array(), $version, true );
                
                $addlly_vars = array(
                    'ajax_url' => admin_url( 'admin-ajax.php' ),
                    'nonce'    => wp_create_nonce('addlly_nonce')
                );
                wp_localize_script('addlly-admin', 'addlly_vars', $addlly_vars);
                
            }
        }

        public function addlly_settings_page() {
            ?>
            <div class="wrap">
                <?php addlly_get_template_part('login/login-form'); ?>
            </div>
            <?php
        }
        
        public function addlly_getting_started_page() {
            ?>
            <div class="wrap getting-started">
                <div class="addlly-container">
                    <div class="addlly-header">
                        <div class="d-flex align-items-center gap-2">
                            <h3><?php esc_html_e('Get Started with Addlly', 'addlly'); ?></h3>
                            <?php if( addlly_user_id() > 0 ){ ?>
                                <a href="https://staging.addlly.ai/plans" class="buy-plan-btn d-flex align-items-center gap-2"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828l.645-1.937zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.734 1.734 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.734 1.734 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.734 1.734 0 0 0 3.407 2.31l.387-1.162zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L10.863.1z"></path></svg>Buy Plan</a>
                            <?php } ?>
                        </div>
                        <p><?php esc_html_e('Setting up Addlly AI takes only a few minutes! Simply go through the "Getting Started" video, click<br>the buttons below, and voila - the AI magic is ready for you!', 'addlly'); ?></p>
                    </div>
                    <div class="addlly-articles-holder">
                        <div class="addlly-video-sec">
                            <iframe class="video-iframe" src="https://www.youtube.com/embed/NVk5nBY2ZLA" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        
        public function addlly_buy_plan_page() {
            ?>
            <div class="wrap">
                <h1><?php esc_html_e('Buy Plan', 'addlly'); ?></h1>
                <p><?php esc_html_e('Buy plan here.', 'addlly'); ?></p>
            </div>
            <?php
        }
        
        public function addlly_buy_more_credits() {
            ?>
            <div class="wrap">
                <h1><?php esc_html_e('Buy More Credits', 'addlly'); ?></h1>
                <p><?php esc_html_e('Buy more credits here.', 'addlly'); ?></p>
            </div>
            <?php
        }
        
    }

    // Initialize the plugin
    new Addlly();
}