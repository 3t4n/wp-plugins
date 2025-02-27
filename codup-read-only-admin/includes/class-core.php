<?php

if (!defined('ABSPATH'))
    exit;

if (!class_exists('CROA_Core')) {

    class CROA_Core {

        /**
         * Class Constructor
         */
        function __construct() {
            add_action('pre_get_posts', array($this, 'deny_trash_access'));
            add_action('admin_init', array($this, 'access_denied'));
            add_action('admin_menu', array($this, 'admin_menu'));
            add_action('user_new_form', array($this, 'admin_user_meta_fields'));
            add_action('show_user_profile', array($this, 'admin_user_meta_fields'));
            add_action('edit_user_profile', array($this, 'admin_user_meta_fields'));
            add_action('user_register', array($this, 'save_user_meta'));
            add_action('personal_options_update', array($this, 'save_user_meta'));
            add_action('edit_user_profile_update', array($this, 'save_user_meta'));
            add_action('admin_head', array($this, 'remove_all_updates'));
            add_filter('allowed_block_types', array($this, 'my_plugin_allowed_block_types'), 10, 2 );
            add_action('add_meta_boxes', array($this, 'remove_product_gallery_meta_boxes'), 40 );
        }
       
        /**
         * On admin init access denied to all submit things if user is read only admin
         *
         * @return void
         */
        function access_denied() {
            global $submenu;

            if (croa_is_read_only_admin()) {
                $this->stop_submit();
                $this->enqueue_assets();
                $this->remove_row_actions();
                $this->access_denied_pages();
                $this->restrict_tools_tab();
                $this->remove_pages_from_admin_screen();
                $this->remove_product_support();
                foreach (croa_get_all_post_types() as $post_type) {
                    remove_meta_box('submitdiv', $post_type, 'side');
                    remove_submenu_page('edit.php?post_type=' . $post_type, 'post-new.php?post_type=' . $post_type);
                    $this->remove_bulk_edit_options($post_type);
                }
            }
        }

        /**
         * Remove all blocks from gutenberg text editor.
         *
         * @return void
         */
        function my_plugin_allowed_block_types($allowed_block_types, $post) {
            if (croa_is_read_only_admin()) {
                return array(null);
            }
        }

        /**
         * Restrict Tools tab on Woocommerce status page.
         *
         * @return void
         */
        function restrict_tools_tab(){
            if(isset($_GET['page']) && isset($_GET['tab'])) {
                if($_GET['page'] == 'wc-status' && $_GET['tab'] == 'tools') {
                    wp_safe_redirect(admin_url('?page=error-404'));
                    exit;
                }
            }
        }

        /**
         * Remove supports from Woocommerce product edit page.
         *
         * @return void
         */
        function remove_product_support() {
            if (croa_is_read_only_admin()) {
                remove_post_type_support( 'product', 'thumbnail' );
                remove_post_type_support( 'product', 'comments' );
                remove_post_type_support( 'product', 'post-thumbnail' );
            }
        }

        /**
         * Remove product gallery metabox from Woocommerce product edit page.
         *
         * @return void
         */
        function remove_product_gallery_meta_boxes(){
            remove_meta_box('woocommerce-product-images',  'product', 'side');
        }

        /**
         * Access denies to trash link only to read only admin user.         
         *
         * @param $query
         * @return void
         */
        function deny_trash_access($query) {

            if (croa_is_read_only_admin()) {
                $status = $query->get('post_status');
                if ($status === 'trash') {
                    wp_safe_redirect(admin_url('?page=error-404'));
                    exit();
                }
            }
        }

        /**
         * Access denied all $_POST request except ajax request and redirect to user to 404 page
         *
         * @return void
         */
        function stop_submit() {
            if ($_POST) {
                if (true === DOING_AJAX) {
                    exit;

                } else {
                    wp_safe_redirect(admin_url('?page=error-404'));
                    exit;
                }
            }
        }

        /**
         * This function check last version of plugins and themes.
         *
         * @return void
         */
        function check_version(){
            global $wp_version;
            return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
        }
        
        /**
         * This function disable updates for plugins and themes for read only admin user.
         *
         * @return void
         */
        function remove_all_updates($user){
            if( current_user_can('administrator') && get_user_meta(get_current_user_id(), 'read_only_admin', true) ) {
                add_filter('pre_site_transient_update_plugins', array($this, 'check_version'));
                add_filter( 'pre_site_transient_update_themes',  array($this, 'check_version') );
            }
            
        }
        /**
         * This function remove the access to create new post for all 
         * post type
         *
         * @return void
         */
        function access_denied_pages() {
            global $pagenow;
            $redirect = false;

            if (!empty($pagenow)) {
                $denied_pages = array(
                    'post-new.php',
                    'media-new.php',
                    'theme-editor.php',
                    'widgets.php',
                    'user-new.php',
                    'plugin-install.php',
                    'plugin-editor.php',
                    'tools.php',
                    'customize.php'
                );

                if (in_array($pagenow, $denied_pages)) {
                    $redirect = true;
                } elseif (isset($_GET['action']) && 'activate' == $_GET['action'] && 'themes.php' == $pagenow) {
                    $redirect = true;
                }

                if ($redirect == true) {
                    wp_safe_redirect(admin_url('?page=error-404'));
                    exit();
                }
            }
        }

        /**
         * Removes pages from admin screen
         *
         * @return void
         */
        function remove_pages_from_admin_screen() {
            remove_menu_page('tools.php');
            remove_submenu_page('edit.php', 'post-new.php');
            remove_submenu_page('upload.php', 'media-new.php');
            remove_submenu_page('users.php', 'user-new.php');
            remove_submenu_page('themes.php', 'theme-editor.php');
            remove_submenu_page('plugins.php', 'plugin-install.php');
            remove_submenu_page('plugins.php', 'plugin-editor.php');
        }
        
        /**
         * Admin Assets         
         */
        function enqueue_assets() {
            //JS
            wp_enqueue_script('croa-script', CROA_ASSETS_DIR_URL . '/js/custom.js', array('jquery'));
            
            //CSS
            wp_enqueue_style('croa-style', CROA_ASSETS_DIR_URL . '/css/style.css');
        }

        /**
         * Remove all the bulk edit options from post type and admin pages         
         */
        function remove_bulk_edit_options($post_type) {
            global $actions;

            add_filter('bulk_actions-edit-post', '__return_empty_array');
            add_filter('bulk_actions-edit-comments', '__return_empty_array');
            add_filter('bulk_actions-users', '__return_empty_array');
            add_filter('bulk_actions-plugins', '__return_empty_array');
            add_filter('bulk_actions-upload', '__return_empty_array');
            add_filter('bulk_actions-edit-' . $post_type, '__return_empty_array');
            add_filter('bulk_actions-' . $post_type, '__return_empty_array');
        }

        /**
         * Removes all the row action from all post types and admin pages.
         */
        function remove_row_actions() {
            global $actions;

            add_filter('post_row_actions', '__return_empty_array');
            add_filter('page_row_actions', '__return_empty_array');
            add_filter('media_row_actions', '__return_empty_array');
            add_filter('comment_row_actions', '__return_empty_array');
            add_filter('user_row_actions', '__return_empty_array');
            add_filter('plugin_action_links', '__return_empty_array');
        }

        /**
         * Adds checkbox for read only admin if user is administrator
         *
         * @param [object]$user         
         */
        function admin_user_meta_fields($user) {
            if (current_user_can('administrator') && !get_user_meta(get_current_user_id(), 'read_only_admin', true)) {
                
                $is_read_only_admin = false;
                if(isset($user->ID) && get_user_meta($user->ID, 'read_only_admin', true)){
                    $is_read_only_admin = true;
                }
                
                include(CROA_TEMP_DIR . '/user-meta-fields.php');
            }
        }

        /**
         * Save user meta.
         * Save read only admin user meta       
         *
         * @param [int] $user_id         
         */
        function save_user_meta($user_id) {
            if (isset($_POST['read_only_admin'])) {
                update_user_meta($user_id, 'read_only_admin', sanitize_text_field($_POST['read_only_admin']));
            }
            else {
                delete_user_meta($user_id, 'read_only_admin');
            }
        }

        /**
         * Register Admin Menu.
         * Add hidden 404 error page.                  
         */
        function admin_menu() {
            add_submenu_page(
                    null, 'Custom Page', 'Custom Page', 'manage_options', 'error-404', array($this, 'access_denied_page')
            );
        }

        /**
         * Access denied page content         
         */
        function access_denied_page() {
            include(CROA_TEMP_DIR . '/access-denied.php');
        }
    }

    new CROA_Core();
}