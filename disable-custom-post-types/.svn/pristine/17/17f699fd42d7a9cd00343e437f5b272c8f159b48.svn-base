<?php

/**
 * WordPress settings API demo class
 *
 * @author Tareq Hasan
 */
if ( !class_exists('hmk_settings_disable_post_type' ) ):
class hmk_settings_disable_post_type {

    private $settings_api;

    function __construct() {
        $this->settings_api = new WeDevs_Settings_API;

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
        add_options_page( 'Disable Post Types', 'Disable Post Types', 'delete_posts', 'disable_post_types', array($this, 'plugin_page') );
    }

    function get_settings_sections() {
        $sections = array(
            array(
                'id'    => 'hmk_excl_ptypes',
                'title' => __( 'Disable Custom Post Types Settings', 'wedevs' )
            ),

        );
        return $sections;
    }

    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    function get_settings_fields() {

      $args = array( 'public' => true, '_builtin' => false );
      $output = 'names';
      $operator = 'and';
      $custom_post_types = get_post_types( $args, $output, $operator );


        if(!empty($custom_post_types)) {
        $settings_fields = array(
            'hmk_excl_ptypes' => array(
              array(
                  'name'    => 'hmk_excl',
                  'label'   => __( 'Post Types to Disable', 'wedevs' ),
                  'desc'    => __( 'Select the post types to be disabled', 'wedevs' ),
                  'type'    => 'multicheck',
                  //'default' => array('one' => 'one', 'four' => 'four'),
                  'options' => $custom_post_types
              ),

            ),
          );

            }else{

            $settings_fields = array(
                'hmk_excl_ptypes' => array(
                  array(
                      'name'        => 'html',
                      'desc'        => __( 'There are no Custom Post Tyepes Registered', 'wedevs' ),
                      'type'        => 'html'
                  ),
                  array(
                    'name'  => 'hmk_disable_plugin',
                    'label' => __( 'Change selection', 'wedevs' ),
                    'desc'  => __( 'Check This to Chane selection if you have disabled only available custom post type.', 'wedevs' ),
                    'type'  => 'checkbox'
                ),
                ),
              );

      }

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

add_action('admin_head', 'hmk_admin_css');

function hmk_admin_css() {
  echo '<style>
    #hmk_excl_ptypes h2{
      background: #0de590;
      padding: 10px 20px;
      text-align: center;
      }

    #hmk_excl_ptypes{
        background: #e5e5e5ab;
        padding: 0px 30px;
        max-width: 800px;
        margin: 0 auto;
      }

  </style>';
}
