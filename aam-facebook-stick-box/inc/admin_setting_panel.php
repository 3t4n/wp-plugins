<?php
/**
 * aaM Settings Control Panel
 *
 * @version 1.0
 *
 */
if ( !class_exists('AAM_FB_Box_Setting_Controls' ) ):
class AAM_FB_Box_Setting_Controls {

    private $settings_api;

    function __construct() {
        $this->settings_api = new MAGE_Setting_API;

        add_action( 'admin_init', array($this, 'admin_init') );
        add_action( 'admin_menu', array($this, 'admin_menu') );
    }

    function admin_init() {

        //set the settings
        $this->settings_api->set_sections( $this->get_settings_sections() );
        $this->settings_api->set_fields( $this->get_settings_fields() );

        //initialize settings
        $this->settings_api->admin_init();
    }

    function admin_menu() {
        add_options_page( 'FB Stick Box Settings', 'FB Stick Box Settings', 'delete_posts', 'aam_fb_stick_settings_page', array($this, 'plugin_page') );
    }

    function get_settings_sections() {

        $sections = array(
            array(
                'id' => 'aam_fbb_general_setting_sec',
                'title' => __( 'General Settings', 'aam' )
            ) 
        );



        return $sections;
    }

    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    function get_settings_fields() {
        $settings_fields = array(
            'aam_fbb_general_setting_sec' => array(

				array(
                    'name' => 'aam_fb_page_url',
                    'label' => __( 'Facebook FAN Page URL', 'aam' ),
                    'desc' => __( 'Enter Your Facebook Page URL here', 'aam' ),
                    'type' => 'text',
                    'default' => ''
                ),
            )

        );

        return $settings_fields;
    }

    function plugin_page() {
        echo '<div class="wrap">';

        $this->settings_api->show_navigation();
        $this->settings_api->show_forms();

        echo '</div>';
    }

    /**
     * Get all the pages
     *
     * @return array page names with key value pairs
     */
    function get_pages() {
        $pages = get_pages();
        $pages_options = array();
        if ( $pages ) {
            foreach ($pages as $page) {
                $pages_options[$page->ID] = $page->post_title;
            }
        }

        return $pages_options;
    }

}
endif;

$settings = new AAM_FB_Box_Setting_Controls();


function aam_fb_get_option( $option, $section, $default = '' ) {
    $options = get_option( $section );

    if ( isset( $options[$option] ) ) {
        return $options[$option];
    }
    
    return $default;
}