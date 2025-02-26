<?php
if ( ! defined('ABSPATH') ) { die( 'Direct access is not allowed' ); } // die if the page is accessed directly

if ( ! class_exists('Adl_Team') ) :
    final class Adl_Team {

    private $req_wp_version = '4.0';
    public $objects = array(); // all objects of our plugins will be stored here

    /**
     * Load all classes and instantiate them and flush rewrite rules
     */
    public function __construct( ){
        // Don't let the class/plugin instantiate outside of WordPress
        if ( ! defined('ABSPATH') ) { die( 'Cheating? Direct access is not allowed. ' ); }
        // load all classes and its object
        $this->load_classes(ADL_TEAM_CLASS_DIR);
        register_activation_hook(ADL_TEAM_BASE, array($this, 'plugin_activated'));
        register_deactivation_hook(ADL_TEAM_BASE, array($this, 'plugin_deactivated'));

    }

    /**
     * Flush rewrite rules on activation so that our custom post type and its custom url works better.
     * @return void
     */
    public function plugin_activated() {
        flush_rewrite_rules();
    }

    /**
     *  Flush rewrite rules on deactivation
     * @return void
     */
    public function plugin_deactivated() {
        flush_rewrite_rules();
    }

    /**
     * Load all classes from a given directory and store objects to the $this->$objects property
     * @param $dir Name of the directory where all classes resides
     * @return void
     */
    public function load_classes($dir){
        if (!file_exists($dir)) return;

        $objects = array();

        foreach (scandir($dir) as $file) {
        // if any file(eg.class files) found in the given dir then require it once and then create an object and add it to the objects array.
            if( preg_match( "/.php$/i" , $file ) ) {
                require_once( $dir . $file );
                $singleClass = str_replace( ".php", "", $file );
                $objects[] = new $singleClass; // File name must match Class names in order to dynamically instantiate the class
            }
        }

        if($objects){
            foreach( $objects as $object )
                $this->objects[] = $object;
        }
    }

    /**
     * Dynamically calls a method from this class if it is not public or from a subclass
     * @param   String  $name The Name of the Method to invoke on this class or subclass
     * @param   Mixed $args Dynamic list of arguments that will be passed to the method when it is called.
     *
     * @return mixed|void
     */
    public function __call( $name, $args ){
        if( !is_array($this->objects) ) return;
        foreach($this->objects as $object){
            if(method_exists($object, $name)){
                return call_user_func_array(array($object, $name), $args);
            }
        }
    }

    /**
     * Initialize the plugin by hooking all actions and filters
     */
    public function init() {
        add_action('admin_init', array($this, 'warn_if_unsupported_wp'));
        add_action('plugins_loaded', array($this, 'load_textdomain' ) );

        // admin hooks and filter
        if ( is_admin() ) {
            //actions
            //filters
            add_filter( 'plugin_action_links_' . ADL_TEAM_BASE, array($this, 'add_plugin_action_link') );
            add_action('admin_menu', array($this, 'add_admin_menu'));

        }

        // Enables shortcode for Widget
        add_filter('widget_text', 'do_shortcode');



    }

    /**
     * It loads html view
     * @param $name Name of the view to be loaded
     * @param array $args The array of arguments to be passed to the view
     * @return mixed
     */
    public function loadView( $name, $args = array() ) {
        global $ADL_team, $post;
        include(ADL_TEAM_VIEWS_DIR.$name.'.php');
    }

    /**
     * It includes any files from the themes directory.
     * @param string $name  Name of the file from the Themes directory eg. 'style1/index'
     * @param array $args   Optional Values passed to the views to be used there.
     */
    public function loadTheme( $name, $args = array() ) {
        $name = "themes/{$name}";
        $this->loadView($name, $args);
    }


    /**
     * It fetches all information about a member and return it as an associative array
     * @param Object $member Single member object
     * @return array Returns an associative array of member's meta information.
     */
    public function get_all_info_of_member( $member ) {
        global $ADL_team;
        if (is_object($member)):
        $designations = get_the_terms($member, 'adl-team-designation');
        $designation = $designations[0];

        /*GET ALL DATA of MEMBER*/
        $g_info = get_post_meta( $member->ID, 'general' , true); // return serialized and encoded string of array value
        $contact = get_post_meta( $member->ID, 'contact' , true); // return serialized and encoded string of array value
        $socials = get_post_meta( $member->ID, 'social' , true); // return serialized and encoded string of array value
        $skills = get_post_meta( $member->ID, 'skill' , true); // return serialized and encoded string of array value
        $color_info = get_post_meta( $member->ID, 'color_info' , true); // return serialized and encoded string of array value
        $shortbio = get_post_meta( $member->ID, 'membershortbio' , true); // single value
        $fullbio = get_post_meta( $member->ID, 'memberfullbio' , true); // single value
        // unserialize the data
        $general = (!empty($g_info) ? unserialize( base64_decode( $g_info )) : array());
        $contact = (!empty($contact) ? unserialize( base64_decode( $contact )) : array());
        $socials = (!empty($socials) ? unserialize( base64_decode( $socials )) : array());
        $skills = (!empty($skills) ? unserialize( base64_decode( $skills )) : array());
        $color_info = (!empty($color_info) ? unserialize( base64_decode( $color_info )) : array());


            //build the data array to return final data and it maybe used with any theme's view
        //$img_info = wp_get_attachment_image_src( intval($general['_member_image_id']) , array(200, 150) );
            $member_link = get_post_permalink( $member->ID);
        $img_info = wp_get_attachment_image_src( intval(@$general['_member_image_id']) , 'full' );
        $general['member_img_src'] = $img_info[0];
        $general['membershortbio'] = (!empty($shortbio)) ? $shortbio : '';
        $general['memberfullbio'] = (!empty($fullbio)) ? $fullbio : '';
        $general['name'] = $member->post_title;
        $general['socials'] = $socials; // multi array value
        $general['skills'] = $skills; // multi array value
        $general['color_info'] = $color_info; // multi array value
        $general['designation'] = !empty($designation->name) ? $designation->name : '';
        $general['permalink'] = !empty($member_link) ? $member_link : '#';
        return array_merge($general, $contact); // return a merged associative array

        endif;
        return array();

    }


    /**
     * It adds links to the plugin activation page
     * @param $links The array of all default links of a plugin
     *
     * @return array The modified array of all links of a plugin
     */
     public function add_plugin_action_link($links) {
        unset($links['edit']); // protect editing the plugin
        $links[] = sprintf( '<a href="%s" title="%s">%s</a>', 'post-new.php?post_type='.ADL_TEAM_POST_TYPE, 'Add New Member', __( 'Add New', ADL_TEAM_TEXTDOMAIN ) );
        $links[] = sprintf( '<a href="%s" title="%s">%s</a>', 'edit.php?post_type='.ADL_TEAM_POST_TYPE, 'View All Members', __( 'View All', ADL_TEAM_TEXTDOMAIN ) );
        return $links;

    }


    /**
     *  It loads the text domain of the plugin
     * @return void
     */
    public function load_textdomain( ){
        load_plugin_textdomain(ADL_TEAM_TEXTDOMAIN, false, plugin_basename( dirname( __FILE__ ) ) . '/languages/');
    }

    public function add_admin_menu() {
        add_submenu_page( 'edit.php?post_type='.ADL_TEAM_POST_TYPE, __('Usage & Support', ADL_TEAM_TEXTDOMAIN), __('Usage & Support', ADL_TEAM_TEXTDOMAIN), 'manage_options', 'usage', array($this, 'admin_menu_cb') );

    }

    public function admin_menu_cb(  ) {
            global $ADL_team;
            $ADL_team->loadView('upgrade-notice');
    }


    /**
     * It shows a warning to the user if they use older WordPress Version.
     * @return mixed
     */
    public function warn_if_unsupported_wp() {
        if ( $this->check_minimum_required_wp_version() ) {
        $wp_ver = ! empty( $GLOBALS['wp_version'] ) ? $GLOBALS['wp_version'] : '(undefined)';
        ?>
        <div class="error notice is-dismissible"><p>
                <?php

                printf( __( ADL_TEAM_PLUGIN_NAME. 'requires WordPress version %1$s or newer. It appears that you are running %2$s. The plugin may not work properly.', ADL_TEAM_TEXTDOMAIN ),
                    $this->req_wp_version,
                    esc_html( $wp_ver )
                );

                echo '<br>';

                printf( __( 'Please upgrade your WordPress installation or download latest version from <a href="%s" target="_blank" title="Download Latest WordPress">here</a>.', ADL_TEAM_TEXTDOMAIN ),
                    'https://wordpress.org/download/'
                );

                ?>
            </p></div>
        <?php

        return;
    }
    }

    /**
     * It checks minimum required version of WordPress we defined in $this->req_wp_version
     * @return mixed
     */
    private function check_minimum_required_wp_version() {
        include( ABSPATH . WPINC . '/version.php' ); // get an unmodified $wp_version
        return ( version_compare( $wp_version, $this->req_wp_version, '<' ) );
    }


}


endif;

