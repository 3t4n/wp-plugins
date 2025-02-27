<?php

/**
 *
 * @class FLDadevarzanDateAndTimeModule
 */
class FLDadevarzanDateAndTimeModule extends FLBuilderModule {

    /** 
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */  
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Display Date and Time', 'dadevarzan-beaverbuilder-modules'),
            'description'   => __('Displaying Date and Time anywhere.', 'dadevarzan-beaverbuilder-modules'),
            'category'		=> __('Dadevarzan Modules', 'dadevarzan-beaverbuilder-modules'),
            'dir'           => FL_MODULE_DADEVARZAN_DIR . 'date-and-time/',
            'url'           => FL_MODULE_DADEVARZAN_URL . 'date-and-time/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));
    }

}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('FLDadevarzanDateAndTimeModule', array(
    'general'       => array( // Tab
        'title'         => __('General', 'dadevarzan-beaverbuilder-modules'), // Tab title
        'sections'      => array( // Tab Sections
            'title'       => array( // Section
                'title'         => '', // Section Title
                'fields'        => array( // Section Fields
                    'display_date' => array(
                        'type'          => 'select',
                        'label'         => __( 'Display Date?', 'fl-builder' ),
                        'default'       => 'true',
                        'options'       => array(
                            'true'      => __( 'Yes', 'fl-builder' ),
                            'false'      => __( 'No', 'fl-builder' )
                        ),
                        'toggle'        => array(
                            'true'      => array(
                                'fields'        => array( 'date_format' ),
                            ),
                            'false'      => array()
                        )
                    ),
                    'date_format'     => array(
                        'type'         => 'text',
                        'label'        => __('Date format', 'dadevarzan-beaverbuilder-modules'),
                        'default'       => get_option('date_format'),
                        'placeholder'   => get_option('date_format'),
                        'description'   => __('<br>For more details <a target="_blank" rel="noopener" href="https://codex.wordpress.org/Formatting_Date_and_Time">Click here</a>','dadevarzan-beaverbuilder-modules'),
                    ),
                    'display_time' => array(
                        'type'          => 'select',
                        'label'         => __( 'Display Time?', 'fl-builder' ),
                        'default'       => 'false',
                        'options'       => array(
                            'true'      => __( 'Yes', 'fl-builder' ),
                            'false'      => __( 'No', 'fl-builder' )
                        ),
                    ),
                )
            ),
        )
    ),
));
