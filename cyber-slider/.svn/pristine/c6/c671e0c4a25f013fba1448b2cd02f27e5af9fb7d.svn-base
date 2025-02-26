<?php

/*
    Plugin Name: Cyber Slider
    Plugin URI: http://cyberspeclab.com/cyber-slider/
    Version: 1.1
    Author: CyberSpecLab
    Author URI: http://cyberspeclab.com/
    Description: Cyber Slider is an Elegant, Simple and Responsive slideshow plugin. Is an easy to use slider plugin with an intuitive user interface.
    License: GNU General Public License v2.0 or later
    License URI: http://www.opensource.org/licenses/gpl-license.php

    Copyright 2013 CyberSpecLab

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/** Load all of the necessary class files for the plugin */
spl_autoload_register( 'cyberslider::autoload' );

/** Let's go! */
if ( class_exists( 'cyberslider' ) )
    cyberslider::get_instance();

/**
 * Main plugin class
 *
 * @author CyberSpecLab
 * @since 1.0
 */
class cyberslider {

    /**
     * Class instance
     *
     * @since 1.0
     */
    private static $instance;

    /**
     * String name of the main plugin file
     *
     * @since 1.0
     */
    private static $file = __FILE__;

    /**
     * Our plugin version
     *
     * @since 1.1
     */
    public static $version = '1.0';

    /**
     * Our array of cyber Slider admin pages. These are used to conditionally load scripts.
     *
     * @since 1.0
     */
    public $whitelist = array();

    /**
     * Arrays of admin messages
     *
     * @since 1.0
     */
    public $admin_messages = array();

    /**
     * Flag for indicating that we are on a cyberslider plugin page
     *
     * @since 1.0
     */
    private $is_cyberslider_page = false;
    
    /**
     * PSR-0 compliant autoloader to load classes as needed.
     *
     * @since 1.0
     */
    public static function autoload( $classname ) {
    
        if ( 'ESL' !== substr( $classname, 0, 3 ) )
            return;
            
        $filename = dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . str_replace( 'ESL_', '', $classname ) . '.php';
        require $filename;
    
    }

    /**
     * Getter method for retrieving the class instance.
     *
     * @since 1.0
     */
    public static function get_instance() {
    
        if ( !self::$instance instanceof self )
            self::$instance = new self;
        return self::$instance;
    
    }

    /**
     * Gets the main plugin file
     *
     * @since 1.0
     */
    public static function get_file() {
        return self::$file;
    }
    
    /**
     * Constructor
     *
     * @since 1.0
     */
    private function __construct() {

        /** Load plugin textdomain for language capabilities */
        load_plugin_textdomain( 'cyberslider', false, dirname( plugin_basename( self::get_file() ) ) . '/languages' );

        /** Activation and deactivation hooks. Static methods are used to avoid activation/uninstallation scoping errors. */
        if ( is_multisite() ) {
            register_activation_hook( __FILE__, array( __CLASS__, 'do_network_activation' ) );
            register_uninstall_hook( __FILE__, array( __CLASS__, 'do_network_uninstall' ) );
        }
        else {
            register_activation_hook( __FILE__, array( __CLASS__, 'do_activation' ) );
            register_uninstall_hook( __FILE__, array( __CLASS__, 'do_uninstall' ) );
        }

        /** Legacy functionality */
        if ( apply_filters( 'cyberslider_legacy_functionality', __return_true() ) )
            ESL_Legacy::init( $this );

        /** Plugin shortcodes */
        add_shortcode( 'cyberslider', array( $this, 'do_shortcode' ) );

        /** Plugin actions */
        add_action( 'init', array( $this, 'register_all_styles' ) );
        add_action( 'init', array( $this, 'register_all_scripts' ) );
        add_action( 'admin_menu', array( $this, 'add_menus' ) );
        add_action( 'admin_menu', array( $this, 'do_actions' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_styles' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );
        add_action( 'media_buttons', array( $this, 'add_media_button' ), 11 );
        add_action( 'print_media_templates', array( $this, 'print_backbone_templates' ) );
        add_action( 'wp_before_admin_bar_render', array( $this, 'add_admin_bar_links' ) );

        /** Do plugin upgrades */
        add_action( 'admin_init', array( 'ESL_Upgrade', 'do_upgrades' ) );

        /** Register our custom widget */
        add_action( 'widgets_init', create_function( '', 'register_widget( "ESL_Widget" );' ) );

        /** Some hooks for our own custom actions */
        add_action( 'cyberslider_edit_slideshow_actions', array( $this, 'do_slideshow_actions' ) );
        add_action( 'cyberslider_customizer_actions', array( $this, 'do_customizer_actions' ) );
        add_action( 'cyberslider_edit_settings_actions', array( $this, 'do_settings_actions' ) );

        /** Get plugin settings */
        $settings = get_option( 'cyberslider_settings' );

        /** Load slideshow scripts & styles in the header if set to do so */
        if ( isset( $settings['load_scripts'] ) && $settings['load_scripts'] == 'header' )
            add_action( 'wp_enqueue_scripts', array( 'ESL_Slideshow', 'enqueue_scripts' ) );
        if ( isset( $settings['load_styles'] ) && $settings['load_styles'] == 'header' ) {
            add_action( 'wp_enqueue_scripts', array( 'ESL_Slideshow', 'enqueue_styles' ) );
            add_action( 'wp_head', array( 'ESL_Slideshow', 'print_custom_styles') );
        }

        /** Initialization hook for adding external functionality */
        do_action_ref_array( 'cyberslider', array( $this ) );

    }
    
    /**
     * Executes a network activation
     *
     * @since 1.0
     */
    public static function do_network_activation() {
        self::get_instance()->network_activate();
    }
    
    /**
     * Executes a network uninstall
     *
     * @since 1.0
     */
    public static function do_network_uninstall() {
        self::get_instance()->network_uninstall();
    }
    
    /**
     * Executes an activation
     *
     * @since 1.0
     */
    public static function do_activation() {
        self::get_instance()->activate();
    }
    
    /**
     * Executes an uninstall
     *
     * @since 1.0
     */
    public static function do_uninstall() {
        self::get_instance()->uninstall();
    }
    
    /**
     * Network activation hook
     *
     * @since 1.0
     */
    public function network_activate() {

        /** Do plugin version check */
        if ( !$this->version_check() )
            return;

        /** Get all of the blogs */
        $blogs = $this->get_multisite_blogs();

        /** Execute acivation for each blog */
        foreach ( $blogs as $blog_id ) {
            switch_to_blog( $blog_id );
            $this->activate();
            restore_current_blog();
        }

        /** Trigger hooks */
        do_action_ref_array( 'cyberslider_network_activate', array( $this ) );

    }
    
    /**
     * Network uninstall hook
     *
     * @since 1.0
     */
    public function network_uninstall() {

        /** Get all of the blogs */
        $blogs = $this->get_multisite_blogs();

        /** Execute uninstall for each blog */
        foreach ( $blogs as $blog_id ) {
            switch_to_blog( $blog_id );
            $this->uninstall();
            restore_current_blog();
        }

        /** Trigger hooks */
        do_action_ref_array( 'cyberslider_network_uninstall', array( $this ) );

    }
    
    /**
     * Activation hook
     *
     * @since 1.0
     */
    public function activate() {

        /** Do plugin version check */
        if ( !$this->version_check() )
            return;

        /** Add "wp_options" table options */
        add_option( 'cyberslider_version', self::$version );
        add_option( 'cyberslider_slideshow', $this->slideshow_defaults() );
        add_option( 'cyberslider_customizations', json_encode( $this->customization_defaults() ) );
        add_option( 'cyberslider_settings',
            array(
                'resizing' => false,
                'load_styles' => 'header',
                'load_scripts' => 'header'
            )
        );
        add_option( 'cyberslider_major_upgrade', 0 );
        add_option( 'cyberslider_disable_welcome_panel', 0 );

        /** Add user capabilities */
        $this->manage_capabilities( 'add' );

        /** Trigger hooks */
        do_action_ref_array( 'cyberslider_activate', array( $this ) );

    }
    
    /**
     * Uninstall Hook
     *
     * @since 1.0
     */
    public function uninstall() {

        /** Delete "wp_options" table options */
        delete_option( 'cyberslider_version' );
        delete_option( 'cyberslider_slideshow' );
        delete_option( 'cyberslider_customizations' );
        delete_option( 'cyberslider_settings' );
        delete_option( 'cyberslider_major_upgrade' );
        delete_option( 'cyberslider_disable_welcome_panel' );

        /** Remove user capabilities */
        $this->manage_capabilities( 'remove' );

        /** Trigger hooks */
        do_action_ref_array( 'cyberslider_uninstall', array( $this ) );

    }
    
    /**
     *  Does a plugin version check, making sure the current Wordpress version is supported. If not, the plugin is deactivated and an error message is displayed.
     *
     *  @author Cyberspeclab
     *  @version 1.0
     */
    public function version_check() {
        global $wp_version;
        if ( version_compare( $wp_version, '3.5', '<' ) ) {
            deactivate_plugins( plugin_basename( __FILE__ ) );
            wp_die( __( sprintf( 'Sorry, but your version of WordPress, <strong>%s</strong>, is not supported. The plugin has been deactivated. <a href="%s">Return to the Dashboard.</a>', $wp_version, admin_url() ), 'cyberslider' ) );
            return false;
        }
        return true;
    }
    
    /**
     * Returns the ids of the various multisite blogs. Returns false if not a multisite installation.
     *
     * @since 1.0
     */
    public function get_multisite_blogs() {

        global $wpdb;

        /** Bail if not multisite */
        if ( !is_multisite() )
            return false;

        /** Get the blogs ids from database */
        $query = "SELECT blog_id from $wpdb->blogs";
        $blogs = $wpdb->get_col($query);

        /** Push blog ids to array */
        $blog_ids = array();
        foreach ( $blogs as $blog )
            $blog_ids[] = $blog;

        /** Return the multisite blog ids */
        return $blog_ids;

    }

    /**
     * Default slideshow options
     *
     * @since 1.0
     */
    public function slideshow_defaults() {

        /** Get the current user to be assigned as the slideshow author */
        $author = __( 'Unknown', 'cyberslider' );
        if ( function_exists( 'wp_get_current_user' ) )
            $author = wp_get_current_user()->user_login;

        $object = new stdClass();
        $object->author = $author;
        $object->slides = array();
        $object->general = (object) array( 'randomize' => '' );
        $object->dimensions = (object) array( 'width' => 640, 'height' => 240, 'responsive' => true );
        $object->transitions = (object) array( 'effect' => 'slide', 'duration' => 500 );
        $object->navigation = (object) array( 'arrows' => true, 'arrows_hover' => false, 'arrows_position' => 'inside', 'pagination' => true, 'pagination_hover' => false, 'pagination_position' => 'inside', 'pagination_location' => 'bottom-center' );
        $object->playback = (object) array( 'enabled' => true, 'pause' => 4000 );
        return apply_filters( 'cyberslider_slideshow_defaults', $object );

    }

    /**
     * Get custom styling default options
     *
     * @since 1.0
     */
    public function customization_defaults() {

        $object = (object) array(
            'arrows' => (object) array(
                'next' => stripslashes_deep( plugins_url( dirname( plugin_basename( self::get_file() ) ) . DIRECTORY_SEPARATOR .'images'. DIRECTORY_SEPARATOR .'slideshow_arrow_next.png' ) ),
                'prev' => stripslashes_deep( plugins_url( dirname( plugin_basename( self::get_file() ) ) . DIRECTORY_SEPARATOR .'images'. DIRECTORY_SEPARATOR .'slideshow_arrow_prev.png' ) ),
                'width' => 30,
                'height' => 30
            ),
            'pagination' => (object) array(
                'inactive' => stripslashes_deep( plugins_url( dirname( plugin_basename( self::get_file() ) ) . DIRECTORY_SEPARATOR .'images'. DIRECTORY_SEPARATOR .'slideshow_icon_inactive.png' ) ),
                'active' => stripslashes_deep( plugins_url( dirname( plugin_basename( self::get_file() ) ) . DIRECTORY_SEPARATOR .'images'. DIRECTORY_SEPARATOR .'slideshow_icon_active.png' ) ),
                'width' => 15,
                'height' => 15
            ),
            'border' => (object) array(
                'color' => '#000',
                'width' => 0,
                'radius' => 0
            ),
            'shadow' => (object) array(
                'enable' => false,
                'image' => stripslashes_deep( plugins_url( dirname( plugin_basename( self::get_file() ) ) . DIRECTORY_SEPARATOR .'images'. DIRECTORY_SEPARATOR .'slideshow_shadow.png' ) )
            )
        );
        return apply_filters( 'cyberslider_customizer_defaults', $object );

    }

    /**
     * Returns the plugin capabilities
     *
     * @since 1.0
     */
    public function capabilities() {
        $capabilities = array(
            'cyberslider_edit_slideshow',
            'cyberslider_can_customize',
            'cyberslider_edit_settings'
        );
        $capabilities = apply_filters( 'cyberslider_capabilities', $capabilities );
        return $capabilities; 
    }
    
    /**
     * Manages (adds or removes) user capabilities
     *
     * @since 1.0
     */
    public function manage_capabilities( $action ) {

        global $wp_roles;

        /** Get the capabilities */
        $capabilities = $this->capabilities();
        
        /** Add capability for each applicable user role */
        foreach ( $wp_roles->roles as $role => $info ) {
            $user_role = get_role( $role );
            foreach ( $capabilities as $capability ) {
                if ( $action == 'add' )
                    $this->add_capability( $capability, $user_role );
                elseif ( $action == 'remove' )
                    $this->remove_capability( $capability, $user_role );
            }
        }

    }
    
    /**
     * Adds a user capability
     *
     * @since 1.0
     */
    public function add_capability( $capability, $role ) {
        if ( $role->has_cap( 'edit_plugins' ) )
            $role->add_cap( $capability );
    }
    
    /**
     * Removes a user capability
     *
     * @since 1.0
     */
    public function remove_capability( $capability, $role ) {
        if ( $role->has_cap( $capability ) )
            $role->remove_cap( $capability );
    }
    
    /**
     * Adds the admin menus
     *
     * @since 1.0
     */
    public function add_menus() {

        /** Hook suffixs for admin menus */
        $pages = array( 'cyberslider_edit_slideshow', 'cyberslider_customizer', 'cyberslider_edit_settings' );

        /** Toplevel menu */
        $this->whitelist[] = add_menu_page(
            __( 'Slideshow', 'cyberslider' ),
            __( 'Slideshow', 'cyberslider' ),
            'cyberslider_edit_slideshow',
            'cyberslider_edit_slideshow',
            null
        );

        /** Submenus */
        $this->whitelist[] = add_submenu_page(
            'cyberslider_edit_slideshow',
            __( 'Edit Slideshow', 'cyberslider' ),
            __( 'Edit Slideshow', 'cyberslider' ),
            'cyberslider_edit_slideshow',
            'cyberslider_edit_slideshow',
            array( $this, 'edit_slideshow_view' )
        );
        $this->whitelist[] = add_submenu_page(
            'cyberslider_edit_slideshow',
            __( 'Customizer', 'cyberslider' ),
            __( 'Customize', 'cyberslider' ),
            'cyberslider_can_customize',
            'cyberslider_customizer',
            array( $this, 'customizer_view' )
        );
        $this->whitelist[] = add_submenu_page(
            'cyberslider_edit_slideshow',
            __( 'Edit Settings', 'cyberslider' ),
            __( 'Settings', 'cyberslider' ),
            'cyberslider_edit_settings',
            'cyberslider_edit_settings',
            array( $this, 'edit_settings_view' )
        );

        /** Set flag if we are on one of our own plugin pages */
        if ( isset( $_GET['page'] ) && in_array( $_GET['page'], $pages ) )
            $this->is_cyberslider_page = true;

    }

    /**
     *  Adds plugin links to the admin bar
     *
     *  @author CyberSpecLab
     *  @version 1.0
     */
    function add_admin_bar_links() {
        
        global $wp_admin_bar;

        /** Add the new toplevel menu */
        $wp_admin_bar->add_menu(
            array(
                'id' => 'slideshows-top_menu',
                'title' => __( 'Slideshow', 'cyberslider' ),
                'href' => admin_url( "admin.php?page=cyberslider_edit_slideshow" )
            )
        );

        /** Add submenu links to our toplevel menu */
        $wp_admin_bar->add_menu(
            array(
                'parent' => 'slideshows-top_menu',
                'id' => 'edit-slideshow-sub_menu',
                'title' => __( 'Edit Slideshow', 'cyberslider' ),
                'href' => admin_url( "admin.php?page=cyberslider_edit_slideshow" )
            )
        );
        $wp_admin_bar->add_menu(
            array(
                'parent' => 'slideshows-top_menu',
                'id' => 'customizer-sub_menu',
                'title' => __( 'Customize', 'cyberslider' ),
                'href' => admin_url( "admin.php?page=cyberslider_customizer" )
            )
        );
        $wp_admin_bar->add_menu(
            array(
                'parent' => 'slideshows-top_menu',
                'id' => 'edit-settings-sub_menu',
                'title' => __( 'Settings', 'cyberslider' ),
                'href' => admin_url( "admin.php?page=cyberslider_edit_settings" )
            )
        );

    }

    /**
     * Adds a media button (for inserting a slideshow) to the Post Editor
     *
     * @since 1.0
     */
    function add_media_button( $editor_id ) {
        $img = '<span class="insert-slideshow-icon"></span>';
        ?>
        <style type="text/css">
            .insert-slideshow.button .insert-slideshow-icon {
                width: 16px;
                height: 16px;
                margin-top: -1px;
                margin-left: -1px;
                margin-right: 4px;
                display: inline-block;
                vertical-align: text-top;
                background: url(<?php echo plugins_url( dirname( plugin_basename( self::get_file() ) ) . DIRECTORY_SEPARATOR .'images'. DIRECTORY_SEPARATOR .'menu_icon_single_grey.png' ); ?>) no-repeat top left;
            }
        </style>
        <script type="text/javascript">
            function insertSlideshow() {
                send_to_editor( '[cyberslider]' );
                tb_close();
                return false;
            }
        </script>
        <a onClick="insertSlideshow();" class="button insert-slideshow" data-editor="<?php echo esc_attr( $editor_id ); ?>" title="<?php _e( 'Add a slideshow', 'cyberslider' ); ?>"><?php echo $img . __( 'Add Slideshow', 'cyberslider' ); ?></a>
        <?php
    }
    
    /**
     * Queues an admin message to be displayed
     *
     * @since 1.0
     */
    public function queue_message( $text, $type ) {
        if ( !$this->is_cyberslider_page )
            return;
        $message = "<div class='message $type'><p>$text</p></div>";
        add_action( 'admin_notices', create_function( '', 'echo "'. $message .'";' ) );
    }

    /**
     * Does security nonce checks
     *
     * @since 1.0
     */
    public function security_check( $action, $page ) {
        if ( check_admin_referer( "cyberslider-{$action}_{$page}", "cyberslider-{$action}_{$page}" ) )
            return true;
        return false;
    }

    /**
     * Nonce URL function, polyfill for upcoming trac contribution by me!
     *
     * @since 1.0
     */
    public function nonce_url( $actionurl, $action, $arg = '_wpnonce' ) {
        $actionurl = str_replace( '&amp;', '&', $actionurl );
        return esc_html( add_query_arg( $arg, wp_create_nonce( $action, $actionurl ), $actionurl ) );
    }
    
    /**
     * Does admin actions (if appropriate)
     *
     * @since 1.0
     */
    public function do_actions() {

        /** Bail if we aren't on a cyberslider page */
        if ( !$this->is_cyberslider_page )
            return;

        /** Do admin actions */
        do_action( "{$_GET['page']}_actions", $_GET['page'] );

    }
    
    /**
     * Slideshow based actions
     *
     * @since 1.0
     */
    public function do_slideshow_actions( $page ) {

        /** Disable welcome panel if it is dismissed */
        if ( isset( $_GET['disable_welcome_panel'] ) )
            update_option( 'cyberslider_disable_welcome_panel', filter_var( $_GET['disable_welcome_panel'], FILTER_VALIDATE_BOOLEAN ) );

        /** Save or update a slideshow. Whichever is appropriate. */
        if ( isset( $_POST['save'] ) ) {

            /** Security check. Page is hardcoded to prevent errors when adding a new slidesow) */
            if ( !$this->security_check( 'save', 'cyberslider_edit_slideshow' ) ) {
                wp_die( __( 'Security check has failed. Save has been prevented. Please try again.', 'cyberslider' ) );
                exit();
            }

            /** Updates the slideshow */
            update_option( 'cyberslider_slideshow', 
                (object) array(
                    'author' => stripslashes_deep( $_POST['author'] ),
                    'slides' => json_decode( stripslashes_deep( $_POST['slides'] ) ), /** Slides are stored as JSON string and need to be decoded before being saved. */
                    'general' => (object) stripslashes_deep( $_POST['general'] ),
                    'dimensions' => (object) stripslashes_deep( $_POST['dimensions'] ),
                    'transitions' => (object) stripslashes_deep( $_POST['transitions'] ),
                    'navigation' => (object) stripslashes_deep( $_POST['navigation'] ),
                    'playback' => (object) stripslashes_deep( $_POST['playback'] )
                )
            );

            /** Return success message */
            return $this->queue_message( __( 'Slideshow has been <strong>saved</strong> successfully.', 'cyberslider' ), 'updated' );

        }

    }
    
    /**
     * Customization page actions
     *
     * @since 1.0
     */
    public function do_customizer_actions( $page ) {

        /** Save customizations */
        if ( isset( $_POST['save'] ) ) {

            /** Security check */
            if ( !$this->security_check( 'save', $page ) ) {
                wp_die( __( 'Security check has failed. Save has been prevented. Please try again.', 'cyberslider' ) );
                exit();
            }

            /** Save the customizations */
            update_option( 'cyberslider_customizations',
                json_encode( cyberslider::get_instance()->validate( (object) array(
                    'arrows' => (object) $_POST['arrows'],
                    'pagination' => (object) $_POST['pagination'],
                    'border' => (object) $_POST['border'],
                    'shadow' => (object) $_POST['shadow']
                ) ) )
            );

        }

    }
    
    /**
     * Settings page actions
     *
     * @since 1.0
     */
    public function do_settings_actions( $page ) {

        /** Reset plugin */
        if ( isset( $_POST['reset'] ) ) {

            /** Security check */
            if ( !$this->security_check( 'reset', $page ) ) {
                wp_die( __( 'Security check has failed. Reset has been prevented. Please try again.', 'cyberslider' ) );
                exit();
            }

            /** Do reset */
            $this->uninstall();
            $this->activate();

            /** Queue message */
            return $this->queue_message( __( 'Plugin has been reset successfully.', 'cyberslider' ), 'updated' );

        }

        /** Save the settings */
        if ( isset( $_POST['save'] ) ) {

            /** Security check */
            if ( !$this->security_check( 'save', $page ) ) {
                wp_die( __( 'Security check has failed. Save has been prevented. Please try again.', 'cyberslider' ) );
                exit();
            }

            /** Get settings and do some validation */
            $settings = $this->validate( $_POST['settings'] );

            /** Update database option and get response */
            update_option( 'cyberslider_settings', stripslashes_deep( $settings ) );

            /** Show update message */
            return $this->queue_message( __( 'Settings have been <strong>saved</strong> successfully.', 'cyberslider' ), 'updated' );

        }

    }

    /**
     * Does validation
     *
     * @since 1.0
     */
    public function validate( $values ) {

        /** Object flag */
        $is_object = ( is_object( $values ) ) ? true : false;

        /** Convert objects to arrays */
        if ( $is_object )
            $values = (array) $values;

        /** Get settings and do some validation */
        foreach ( $values as $key => $value ) {

            /** Validators */
            if ( is_numeric( $value ) )
                $values[ $key ] = filter_var( $value, FILTER_VALIDATE_INT );
            elseif ( $value === 'true' || $value === 'false' )
                $values[ $key ] = filter_var( $value, FILTER_VALIDATE_BOOLEAN );

            /** Recurse if necessary */
            if ( is_object( $value ) || is_array( $value ) )
                $values[ $key ] = $this->validate( $value );

        }

        /** Convert back to an object */
        if ( $is_object )
            $values = (object) $values;

        return stripslashes_deep( $values );

    }
    
    /**
     * Executes a shortcode handler
     *
     * @since 1.0
     */
    public function do_shortcode() {

        /** Get the slideshow */
        $slideshow = ESL_Slideshow::get_instance()->display_slideshow();

        /** Display the slideshow (or error message if it doesn't exist) */
        if ( is_wp_error( $slideshow ) )
            return $slideshow->get_error_message();
        else
            return trim( $slideshow );

    }
    
    /**
     * Register all admin stylesheets
     *
     * @since 1.0
     */
    public function register_all_styles() {

        /** Get the extension */
        $ext = ( apply_filters( 'cyberslider_debug_styles', __return_false() ) === true ) ? '.css' : '.min.css';

        /** Register styles */
        wp_register_style( 'esl-admin', plugins_url( dirname( plugin_basename( self::get_file() ) ) . DIRECTORY_SEPARATOR .'css'. DIRECTORY_SEPARATOR .'admin'. $ext ), false, self::$version );
        wp_register_style( 'esl-slideshow', plugins_url( dirname( plugin_basename( self::get_file() ) ) . DIRECTORY_SEPARATOR .'css'. DIRECTORY_SEPARATOR .'slideshow'. $ext ), false, self::$version );
        
    }
    
    /**
     * Register all admin scripts
     *
     * @since 1.0
     */
    public function register_all_scripts() {

        /** Get the extension */
        $ext = ( apply_filters( 'cyberslider_debug_scripts', __return_false() ) ) ? '.js' : '.min.js';

        /** Register scripts */
        wp_register_script( 'esl-admin',  plugins_url( dirname( plugin_basename( self::get_file() ) ) . DIRECTORY_SEPARATOR .'js'. DIRECTORY_SEPARATOR .'admin'. $ext ), array( 'jquery', 'jquery-ui-sortable', 'backbone' ), self::$version, true );
        wp_register_script( 'esl-customizer',  plugins_url( dirname( plugin_basename( self::get_file() ) ) . DIRECTORY_SEPARATOR .'js'. DIRECTORY_SEPARATOR .'customizer'. $ext ), array( 'jquery', 'backbone' ), self::$version ); 
        wp_register_script( 'esl-slideshow',  plugins_url( dirname( plugin_basename( self::get_file() ) ) . DIRECTORY_SEPARATOR .'js'. DIRECTORY_SEPARATOR .'slideshow'. $ext ), false, self::$version );

    }
    
    /**
     * Loads admin stylesheets
     *
     * @since 1.0
     */
    public function enqueue_admin_styles( $hook ) {

        /** Bail if not an cyber Slider "Lite" page */
        if ( !in_array( $hook, $this->whitelist ) )
            return;

        /** Load styles */
        wp_enqueue_style( 'esl-admin' );
        do_action( 'cyberslider_enqueue_admin_styles' );

    }
    
    /**
     * Loads admin javascript files
     *
     * @since 1.0
     */
    public function enqueue_admin_scripts( $hook ) {

        /** Bail if not an cyber Slider page */
        if ( !in_array( $hook, $this->whitelist ) )
            return;

        /** Print Localized variables */
        wp_localize_script( 'esl-admin', 'cyberslider', $this->localizations() );

        /** Load scripts */
        wp_enqueue_media();
        wp_enqueue_script( 'esl-admin' );
        do_action( 'cyberslider_enqueue_admin_scripts' );

    }
    
    /**
     * Translations localized via Javascript
     *
     * @since 1.0
     */
    public function localizations() {
        return array(
            'plugin_url' => '/wp-content/plugins/'. dirname( plugin_basename( self::get_file() ) ) .'/',
            'warn' => __( 'Are you sure you wish to do this? This cannot be reversed.', 'cyberslider' ),
            'delete_image' => __( 'Are you sure you wish to delete this image? This cannot be reversed.', 'cyberslider' ),
            'delete_images' => __( 'Are you sure you wish to delete all of this slideshows images? This cannot be reversed.', 'cyberslider' ),
            'media_upload' => array(
                'title' => __( 'Add Images to Slideshow', 'cyberslider' ),
                'button' => __( 'Insert into slideshow', 'cyberslider' ),
                'change' => __( 'Use this image', 'cyberslider' ),
                'discard_changes' => __( 'Are you sure you wish to discard changes?', 'cyberslider' )
            )
        );
    }
    
    /**
     * Prints the backbone templates used in the admin area
     *
     * @since 1.0
     */
    public function print_backbone_templates() {

        /** Bail if not a cyberslider page */
        if ( !$this->is_cyberslider_page )
            return;

        /** Slide template */
        echo '<script type="text/html" id="tmpl-slide"><div class="thumbnail" data-id="{{ data.id }}"><a href="#" class="delete-button"></a><img src="{{ data.sizes.thumbnail.url }}" alt="{{ data.alt }}" /></div></script>';
        
        /** Slide editor template */
        echo '<script type="text/html" id="tmpl-edit-slide">';
        require dirname( self::get_file() ) . DIRECTORY_SEPARATOR .'templates'. DIRECTORY_SEPARATOR .'editslideshow-slide.php';
        echo '</script>';

        /** Media Library custom sidebar */
        echo '<script type="text/html" id="tmpl-image-details">';
        require dirname( self::get_file() ) . DIRECTORY_SEPARATOR .'templates'. DIRECTORY_SEPARATOR .'editslideshow-media-details.php';
        echo '</script>';
        
    }
    
    /**
     * Edit a slideshow view
     *
     * @since 1.0
     */
    public function edit_slideshow_view() {

        /** Load the edit view template */
        require dirname( self::get_file() ) . DIRECTORY_SEPARATOR .'templates'. DIRECTORY_SEPARATOR .'editslideshow.php';

    }

    /**
     * Customizer view
     *
     * @since 1.0
     */
    public function customizer_view() {

        /** Load the customizer view template */
        require dirname( self::get_file() ) . DIRECTORY_SEPARATOR .'templates'. DIRECTORY_SEPARATOR .'customizer.php';

    }
    
    /**
     * Edit settings view
     *
     * @since 1.0
     */
    public function edit_settings_view() {

        /** Load the edit settings view */
        require dirname( self::get_file() ) . DIRECTORY_SEPARATOR .'templates'. DIRECTORY_SEPARATOR .'editsettings.php';

    }

}

/**
 * Slideshow helper function
 *
 * @author CyberSpecLab
 * @since 1.0
 */
if ( !function_exists( 'cyberslider' ) ) {
    function cyberslider() {
        echo ESL_Slideshow::get_instance()->display_slideshow();
    }
}