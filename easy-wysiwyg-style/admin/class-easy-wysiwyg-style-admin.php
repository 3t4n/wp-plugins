<?php

/**
 * The Easy Wysiwyg Style is a plugin that allows you to view the styling
 * of your theme in the Wysiwyg editor. This particular file is
 * responsible for including the dependencies and starting the plugin.
 *
 * @package EWS
 */


class Easy_Wysiwyg_Style_Admin {

    /**
     * A reference to the version of the plugin that is passed to this class from the caller.
     *
     * @access private
     * @var    string    $version    The current version of the plugin.
     */
    private $version;

    /**
     * Initializes this class and stores the current version of this plugin.
     *
     * @param    string    $version    The current version of this plugin.
     */
    public function __construct( $version ) {
        $this->version = $version;
    }

    /**
     * Enqueues the style sheet responsible for styling the contents of this
     * meta box.
     */
    public function enqueue_styles() {
        $currentScreen = get_current_screen();
        if( $currentScreen->base === "settings_page_options_ews_page" ) {
            // Run some code, only on the admin widgets page
            wp_enqueue_style(
                'bootstrap',
                plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css',
                array(),
                $this->version,
                FALSE
            );
        }
    }

    /**
     * Registers the options page that will be used to set the timeout length.
     */
    public function create_theme_ews_page() {
        add_options_page('Easy Wysiwyg Style', 'Easy Wysiwyg Style', 'administrator', 'options_ews_page',
            'Easy_Wysiwyg_Style_Admin::build_ews_options_page','dashicons-editor-paragraph');
    }
    /**
     * Requires the file that is used to display the user interface of the post meta box.
     */
    public function build_ews_options_page() {
        require_once plugin_dir_path( __FILE__ ) . 'partials/easy-wysiwyg-style.php';
    }

    /**
     * Registers the settings of the options page previously defined.
     */
    public function register_ews_mysettings() {
        register_setting( 'ews', 'ews');
    }

    /**
     * Registers the filter for adding the settings page link to the plugin list
     *
     * @param $links
     * @return mixed
     */
    public function ews_settings_link($links) {
        $settings_link = '<a href="options-general.php?page=options_ews_page">Settings</a>';
        array_push($links, $settings_link);
        return $links;
    }

    /**
     * Return custom list of toolbar buttons in row 2
     *
     * @param $buttons
     * @return array
     */
    function theme_mce_buttons_2( $buttons ) {
        return array( 'formatselect', 'styleselect', 'underline', 'alignjustify', 'forecolor', 'code', 'pastetext','table', 'spellchecker', 'outdent',
            'indent', 'wp_help', 'removeformat', 'charmap', 'undo', 'redo' );
    }

    /**
     * Add content css to the Wysiwyg editor
     *
     * @param $settings
     * @return mixed
     */
    function theme_mce_styles( $settings ) {
        $ews=get_option('ews');
        $settings['body_class'] = $ews['class']; //"main-text-content";
        $settings['content_css'] = get_stylesheet_directory_uri().'/'.$ews['css']; //'/library/css/style.css';
        return $settings;
    }

    /**
     * Add table plugin to tinyMCE
     *
     * @return array
     */
    function my_custom_tinymce_plugins () {
        $plugins = array('table');
        $plugins_array = array();

        foreach ($plugins as $plugin ) {
            $plugins_array[ $plugin ] = plugins_url('easy-wysiwyg-style/tinymce/') . $plugin . '/plugin.min.js';
        }
        return $plugins_array;
    }


}
