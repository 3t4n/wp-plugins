<?php

/**
 * WordPress settings API demo class
 *
 */
function enba_get_all_events(){
    
    if (! class_exists('Tribe__Events__Main') or ! defined('Tribe__Events__Main::VERSION')) {
        return;
    }
    
    $events = tribe_get_events( array(
        'posts_per_page' =>-1,
        'post_type' => 'tribe_events',
        'post_status'    => 'publish',
        'meta_query'     => array(
          array(
              'key' =>'_EventStartDate',
              'value' => current_time( 'Y-m-d H:i:s' ),
              'compare' => '>',
              'type' => 'DATETIME'
          ) )
    ) );
    
    if(is_array($events) && array_filter($events) != null){
        foreach ( $events as $event) { 
            $variable_name[$event->ID] =  $event->post_title;   
        }
    }
    else{ 
        $variable_name[]= __("No Future Event found","enba");    
    }
    
    return  $variable_name;

}


if (!class_exists('ENBA_Settings')) :
    class ENBA_Settings
{

    private $settings_api;

    function __construct()
    {
        $this->settings_api = new ENBA_Settings_API;

        add_action('admin_init', array($this, 'admin_init'));
        add_action('admin_menu', array($this, 'admin_menu'),40);
        add_action( 'admin_enqueue_scripts', array( $this, 'enba_admin_enqueue_scripts' ) );
    }

    function admin_init()
    {

        //set the settings
        $this->settings_api->set_sections($this->get_settings_sections());
        $this->settings_api->set_fields($this->get_settings_fields());

        //initialize settings
        $this->settings_api->admin_init();
    }

    function admin_menu()
    {
        add_submenu_page( 'cool-plugins-events-addon', 'Event Notification Bar', 'Notification Bar',  'manage_options', 'event_notification_bar', array($this, 'plugin_page'),40);
    }

    function get_settings_sections()
    {
        $sections = array(
            array(
                'id' => 'enba_general_settings',
                'title' => __('General Settings', 'enba')
            ),
            array(
                'id' => 'enba_style_settings',
                'title' => __('Style Settings', 'enba')
            )
        );
        return $sections;
    }



    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    function get_settings_fields()
    {
        $enba_date_format = array(
            'default'=>'default',
            'DM'=>'dM (01 Jan)',
            'MD'=>'MD(Jan 01)',
            'FD'=>'FD(January 01)',
            'DF'=>'DF(01 January)',
            'FD,Y'=>'FD,Y(January 01, 2019)',
            'MD,Y'=>'MD,Y(Jan 01, 2019)',
            'MD,YT'=>'MD,YT(Jan 01, 2019 8:00am-5:00pm)',
            'full'=>'full(01 January 2019 8:00am-5:00pm)',
            'dFY'=>'dFY(01 January 2019)',
            'dMY'=>'dMY(01 Jan 2019)'
        );

        $settings_fields = array(
            'enba_general_settings' => array(                
                array(
                    'name' => 'enba_apply_on',
                    'label' => __('Show Notification Bar', 'enba'),
                    'desc' => __('Select where do you want to display Event Notification Bar?', 'enba'),
                    'type' => 'select',
                    'default' => 'everywhere',
                    'options' => array(
                        'everywhere'      => 'Everywhere',
                        'specific_page' => 'On A Specific Page',
                        'events_pages'    => 'On Events Pages (PRO)',
                        'specific_event'  => 'On A Specific Event (PRO)',
                        'specific_event_category' => 'Specific Event Category (PRO)',
                        'specific_event_tag' => 'Specific Event Tag (PRO)'                          
                    )
                ),
                array(
                    'name' => 'enba_specific_page',
                    'label' => __('Enter Page ID', 'enba'),
                    'desc' => __('Enter the specific page ID where you want to display Event Notification Bar. (121,122,123)', 'enba'),
                    //'placeholder' => __('Text Input placeholder', 'enba'),
                    'type' => 'text',
                    //'default' => 'Title',
                   // 'sanitize_callback' => 'sanitize_text_field'
                ),
                array(
                    'name' => 'enba_show_event',
                    'label' => __('Show Event', 'enba'),
                    'desc' => __('Which event to show inside Event Notification Bar?', 'enba'),
                    'type' => 'select',
                    'default' => 'no',
                    'options' => array(
                        'select_event_to_show' => 'A Particular Event',
                        'upcoming_event' => 'Upcoming Event (PRO)',
                        'upcoming_featured_event' => 'Upcoming Featured Event (PRO)',
                        'random_from_upcoming_five' => 'Random From Upcoming 5 Events (PRO)',
                        'random_five_featured' => 'Random From Upcoming 5 Featured Events (PRO)'
                    )
                ),
                array(
                    'name' => 'enba_countdown_event',
                    'label' => __('Select Event To Show', 'enba'),
                    'desc' => __('Select a particular event that you want to display inside Event Notification Bar', 'enba'),
                    'type' => 'select',
                    'options' => enba_get_all_events()
                ),
                array(
                    'name' => 'enba_show_timer',
                    'label' => __('Show Timer', 'enba'),
                    'desc' => __('Show countdown timer of event inside Event Notification Bar', 'enba'),
                    'type' => 'radio',
                    'default' => 'yes',
                    'options' => array(
                        'yes' => 'Yes',
                        'no' => 'No'
                    )
                ),
                array(
                    'name' => 'enba_show_date',
                    'label' => __('Show Date', 'enba'),
                    'desc' => __('Show event date inside Event Notification Bar', 'enba'),
                    'type' => 'radio',
                    'default' => 'yes',
                    'options' => array(
                        'yes' => 'Yes',
                        'no' => 'No'
                    )
                ),
                array(
                    'name' => 'enba_date_format',
                    'label' => __('Date Format', 'enba'),
                    'desc' => __('Select date format', 'enba'),
                    'type' => 'select',
                    'default' => 'default',
                    'options' => $enba_date_format
                ),
                array(
                    'name' => 'enba_show_venue',
                    'label' => __('Show Venue', 'enba'),
                    'desc' => __('Show event venue inside Event Notification Bar', 'enba'),
                    'type' => 'radio',
                    'default' => 'yes',
                    'options' => array(
                        'yes' => 'Yes',
                        'no' => 'No'
                    )
                )
            ),
            'enba_style_settings' => array(
                array(
                    'name' => 'enba_bg_color',
                    'label' => __('Background Color', 'enba'),
                    'desc' => __('Background color of Event Notification Bar', 'enba'),
                    'type' => 'color',
                    'default' => '#801f9b'
                ),
                array(
                    'name' => 'enba_text_color',
                    'label' => __('Text Color', 'enba'),
                    'desc' => __('Text color of Event Notification Bar', 'enba'),
                    'type' => 'color',
                    'default' => '#ffffff'
                ),
                array(
                    'name' => 'enba_font_size',
                    'label' => __('Title Font Size', 'enba'),
                    'desc' => __('Event title font size inside Event Notification Bar', 'enba'),
                    //'placeholder' => __('Text Input placeholder', 'enba'),
                    'type' => 'text',
                    'default' => '24px',
                    //'sanitize_callback' => 'sanitize_text_field'
                ),
                array(
                    'name' => 'enba_content_width',
                    'label' => __('Content Area Width', 'enba'),
                    'desc' => __('Adjust content area width Event Notification Bar', 'enba'),
                    'type' => 'text',
                    'default' => '1152px'
                ),
                array(
                    'name' => 'enba_layout',
                    'label' => __('Notification Bar Layout', 'enba'),
                    'desc' => __('Select a style for Event Notification Bar', 'enba'),
                    'type' => 'select',
                    'default' => 'style-1',
                    'options' => array(
                        'style-1' => 'Style 1',
                        'style-2' => 'Style 2 (PRO)',
                        'style-3' => 'Style 3 (PRO)',
                        'style-4' => 'Style 4 (PRO)'
                    )
                ),
                array(
                    'name' => 'enba_position',
                    'label' => __('Position', 'enba'),
                    'desc' => __('Where do you want to display Event Notification Bar on page?', 'enba'),
                    'type' => 'select',
                    'default' => 'Top',
                    'options' => array(
                        'top' => 'Top',
                        'bottom' => 'Bottom',
                        'left' => 'Left (PRO)',
                        'right' => 'Right (PRO)'
                    )
                ),
                array(
                    'name' => 'enba_behavior',
                    'label' => __('Behavior', 'enba'),
                    'desc' => __('Show on scroll or always', 'enba'),
                    'type' => 'select',
                    'default' => 'always',
                    'options' => array(
                        'scroll' => 'Show On Scroll',
                        'always' => 'Show Always'
                    )
                ),
                array(
                    'name' => 'enba_scroll_height',
                    'label' => __('Scroll Height', 'enba'),
                    'desc' => __('', 'enba'),
                    //'placeholder' => __('Text Input placeholder', 'enba'),
                    'type' => 'text',
                    'default' => '100',
                    //'sanitize_callback' => 'sanitize_text_field'
                )
            )
        );

        return $settings_fields;
    }

    function plugin_page()
    {
        echo '<div class="wrap">
        <h1>';
        echo esc_html( get_admin_page_title() );
        echo '</h1>';    
        $this->settings_api->show_navigation();
        $this->settings_api->show_forms();

        echo '</div>';
    }

    /**
     * Get all the pages
     *
     * @return array page names with key value pairs
     */
    function get_pages()
    {
        $pages = get_pages();
        $pages_options = array();
        if ($pages) {
            foreach ($pages as $page) {
                $pages_options[$page->ID] = $page->post_title;
            }
        }

        return $pages_options;
    }

    function enba_admin_enqueue_scripts(){
        wp_register_script( 'enba-select2-js', ENBA_URL . 'assets/admin/js/enba-select2.min.js', array('jquery'), false, true);
        wp_register_script( 'enba-admin-script', ENBA_URL . 'assets/admin/js/enba-admin-script.js', array('jquery'), false, true);
        wp_register_style( 'enba-select2-css', ENBA_URL . 'assets/admin/css/enba-select2.min.css', array(), null);
        wp_register_style( 'enba-admin-styles-css', ENBA_URL . 'assets/admin/css/enba-admin-styles.css', array(), null);
        wp_enqueue_style( 'enba-admin-styles-css');
        wp_enqueue_script( 'enba-select2-js');  
        wp_enqueue_script( 'enba-admin-script');
        wp_enqueue_style( 'enba-select2-css');
    }

}
endif;