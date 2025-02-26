<?php

    /**
     * For full documentation, please visit: http://docs.reduxframework.com/
     * For a more extensive sample-config file, you may look at:
     * https://github.com/reduxframework/redux-framework/blob/master/sample/sample-config.php
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "at_news_scroller";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */



    $args = array(
        'opt_name' => 'at_news_scroller',
        'display_name' => 'AT News Scroller',
        'display_version' => '0.2',
        'page_slug' => 'at-news-scroller',
        'page_title' => 'AT Scroll Settings',
        'update_notice' => TRUE,
        'admin_bar' => FALSE,
        'menu_type' => 'menu',
        'menu_title' => 'AT Scroll Option',
        'allow_sub_menu' => TRUE,
        'customizer' => FALSE,
        'default_mark' => '*',
        'hints' => array(
            'icon' => 'el el-info-circle',
            'icon_position' => 'right',
            'icon_color' => '#0073AA',
            
            'tip_style' => array(
                'color' => 'dark',
                'shadow' => '1',
                'rounded' => '1',
                'style' => 'tipsy',
            ),
            'tip_position' => array(
                'my' => 'right top',
                'at' => 'bottom right',
            ),
            'tip_effect' => array(
                'show' => array(
                    'effect' => 'slide',
                    'duration' => '500',
                    'event' => 'mouseover',
                ),
                'hide' => array(
                    'effect' => 'fade',
                    'duration' => '500',
                    'event' => 'mouseleave unfocus',
                ),
            ),
        ),
        'menu_icon' => 'dashicons-admin-customizer',
        'output' => TRUE,
        'output_tag' => TRUE,
        'cdn_check_time' => '1440',
        'compiler' => TRUE,
        'page_permissions' => 'manage_options',
        'save_defaults' => TRUE,
        'database' => 'options',
        'transient_time' => '3600',
        'network_sites' => TRUE,
        'use_cdn' => FALSE,
        'show_import_export'   => false,
        'dev_mode'             => false,
        'footer_credit' => 'Made With <i class="el el-heart" style="color:rgb(255,0,0);"></i> by <a href="http://abhashtech.com" target="_blank">AbhashTech</a>',
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://github.com/AbhashTech/AT-News-Scroller',
        'title' => 'Visit us on GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'http://abhashtech.com',
        'title' => 'Visit our Website',
        'icon'  => 'el el-globe-alt'
    );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


//Speed related settings
    Redux::setSection($opt_name, array( 
                    'id'    => 'speed', 
                    'title' => 'Set Speed & Options',
                    'heading' => 'Setting this overrides default speed of Ticker',
                    'icon' => 'el el-fast-forward', 
                    'fields' =>  array(
                        array(
                            'id'            => 'opt-speed',
                            'type'          => 'slider',
                            'title'         => 'Select Scroller Speed',
                            'subtitle'      => 'Select any speed between 0.01 to 1.00',
                            'default'       => 0.15,
                            'min'           => 0.01,
                            'step'          => 0.01,
                            'max'           => 1.00,
                            'resolution'    => 0.01,
                            'display_value' => 'text',
                            'validate' => 'not_empty',
                            'compiler' => true,
                        ),
                        array(
                            'id'       => 'opt-categories',
                            'type'     => 'select',
                            'data'     => 'categories',
                            'multi'    => true,
                            'title'    => 'Select Categories from which Scrolling Data will be fetched from'
                        ),
                                    array(
                            'id'       => 'opt-text',
                            'type'     => 'text',
                            'title'    => 'Title For Scrolling News',
                            'default'  => 'Latest News',
                            'validate' => 'not_empty',                            
                            'compiler' => true,
                        ),
                        array(
                            'id'       => 'opt-post-count',
                            'type'     => 'text',
                            'title'    => 'Number of Posts to show',
                            'default'  => '10',
                            'validate' => 'numeric'
                        ))));

//UI related settings
    Redux::setSection($opt_name,array( 
                    'id'    => 'css', 
                    'title' => 'Display Settings',
                    'heading' => 'Setting this overrides default UI of Ticker',
                    'icon' => 'el el-css', 
                    'fields' =>  array(

                        array(
                            'id'       => 'scroll-height',
                            'type'     => 'text',
                            'title'    => 'Scrolling Area Height',
                            'default'  => '38',
                            'validate' => 'numeric',
                            'compiler' => true,
                        ),
                        array(
                            'id'       => 'scroll-gap',
                            'type'     => 'text',
                            'title'    => 'Gap Between Scrolling Text',
                            'default'  => '50',
                            'validate' => 'numeric',
                            'compiler' => true,
                        ),
                        array(
                            'id'       => 'title-bg',
                            'type'     => 'color',
                            'title'    => 'Title Background Color', 
                            'subtitle' => 'Pick a background color for the scrolling area.',
                            'default'  => '#F44A55',
                            'validate' => 'color',
                            'transparent' => false,
                            'validate' => 'color',
                            'compiler' => true,                           
                        ),
                        array(
                            'id'       => 'title-text-color',
                            'type'     => 'color',
                            'title'    => 'Title Text Color', 
                            'subtitle' => 'Pick a background color for the scrolling area.',
                            'default'  => '#ffffff',
                            'validate' => 'color',
                            'transparent' => false,
                            'validate' => 'color',
                            'compiler' => true,    
                            
                        ),
                        array(
                            'id'       => 'title-text-size',
                            'type'     => 'text',
                            'title'    => 'Title Text Size',
                            'default'  => '18',
                            'validate' => 'numeric',
                            'compiler' => true,
                        ),
                        array(
                            'id'       => 'title-padding',
                            'type'     => 'spacing',
                            'output'   => array( '.at_scroll_title' ),
                            'mode'     => 'padding',
                            'all'      => false,
                            'units'         => 'px',      // You can specify a unit value. Possible: px, em, %
                            'units_extended'=> 'true',    // Allow users to select any type of unit
                            'display_units' => 'true',   // Set to false to hide the units if the units are specified
                            'title'    => 'Padding Title Text',
                            'subtitle' => 'Padding is space inside the Title Text Box', 
                            'desc'      => 'First Field is Spacing from Top, then from right, then from bottom and last field is spacing from left.',
                            'default'  => array(
                                'padding-top'    => '5px',
                                'padding-right'  => '10px',
                                'padding-bottom' => '5px',
                                'padding-left'   => '10px'
                            ),
                            'compiler' => true,
                              
                         ),
                        array(
                            'id'       => 'scroll-color',
                            'type'     => 'color',
                            'title'    => 'Scrolling Area Background Color', 
                            'subtitle' => 'Pick a background color for the scrolling area.',
                            'default'  => '#333333',
                            'validate' => 'color',
                            'transparent' => false,
                            'validate' => 'color',
                            'compiler' => true,    
                            
                        ),
                        array(
                            'id'       => 'scroll-text-color',
                            'type'     => 'color',
                            'title'    => 'Scrolling Area Text Color', 
                            'subtitle' => 'Pick a background color for the scrolling area.',
                            'default'  => '#ffffff',
                            'validate' => 'color',
                            'transparent' => false,
                            'validate' => 'color',
                            'compiler' => true,    
                            
                        ),
                        array(
                            'id'       => 'scroll-text-size',
                            'type'     => 'text',
                            'title'    => 'Scrolling Text Size',
                            'default'  => '12',
                            'validate' => 'numeric',
                            'compiler' => true,
                        ),
                        array(
                            'id'       => 'scroll-padding',
                            'type'     => 'spacing',
                            'output'   => array( '.at_scroll_title' ),
                            'mode'     => 'padding',
                            'all'      => false,
                            'units'         => 'px',      // You can specify a unit value. Possible: px, em, %
                            'units_extended'=> 'true',    // Allow users to select any type of unit
                            'display_units' => 'true',   // Set to false to hide the units if the units are specified
                            'title'    => 'Padding Scrolling Text',
                            'subtitle' => 'Padding is space inside the Title Text Box', 
                            'desc'      => 'First Field is Spacing from Top, then from right, then from bottom and last field is spacing from left.',
                            'default'  => array(
                                'padding-top'    => '8px',
                                'padding-right'  => '15px',
                                'padding-bottom' => '5px',
                                'padding-left'   => '15px'
                            ),
                            'compiler' => true,
                            
            ))));

//How to page
Redux::setSection($opt_name,array( 
                    'id'    => 'Help', 
                    'title' => 'How to use?',
                    'heading' => 'How to use this plugin',
                    'icon' => 'el el-info-circle',
                    'desc'    => 'To use this plugin with your theme add  <b>&lt;?php do_action(\'at_ticker_code\'); ?&gt;</b> to your code.<br /> or use [at-scroll-code]  shortcode'

                    ));

add_filter('redux/options/' . $opt_name . '/compiler', 'at_scroll_plugin_compiler_file', 10, 3);