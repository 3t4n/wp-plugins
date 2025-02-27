<?php

/**
 *
 * @class FLDadevarzanPoweredByModule
 */
class FLDadevarzanPoweredByModule extends FLBuilderModule {

    /** 
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */  
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Powered By', 'dadevarzan-beaverbuilder-modules'),
            'description'   => __('Displaying Dadevarzan Powered By anywhere.', 'dadevarzan-beaverbuilder-modules'),
            'category'		=> __('Dadevarzan Modules', 'dadevarzan-beaverbuilder-modules'),
            'dir'           => FL_MODULE_DADEVARZAN_DIR . 'powered-by/',
            'url'           => FL_MODULE_DADEVARZAN_URL . 'powered-by/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));
    }
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('FLDadevarzanPoweredByModule', array(
    'general'       => array( // Tab
        'title'         => __('General', 'dadevarzan-beaverbuilder-modules'), // Tab title
        'sections'      => array( // Tab Sections
            'title'       => array( // Section
                'title'         => '', // Section Title
                'fields'        => array( // Section Fields
                    'powered_by_title'     => array(
                        'type'         => 'text',
                        'label'        => __('Title', 'dadevarzan-beaverbuilder-modules'),
						'placeholder'  => __('Website Design', 'dadevarzan-beaverbuilder-modules'),
                    ),
                    'powered_by_url'   => array(
                        'type'         => 'link',
						'show_target'  => true,
						'show_nofollow' => true,
                        'label'        => __('URL', 'dadevarzan-beaverbuilder-modules'),
						'placeholder'  => 'https://www.dadevarzan.com/web-design/',
                    ),
                    'second_powered_by_title'     => array(
                        'type'         => 'text',
                        'label'        => __('Second Title', 'dadevarzan-beaverbuilder-modules'),
						'placeholder'  => __('Portal Design', 'dadevarzan-beaverbuilder-modules'),
                    ),
                    'second_powered_by_url'     => array(
                        'type'         => 'link',
                        'label'        => __('Second URL', 'dadevarzan-beaverbuilder-modules'),
						'show_target'   => true,
						'show_nofollow' => true,
						'placeholder'  => 'https://www.dadevarzan.com/portal-design/',
                    ),
                )
            ),
        )
    ),
));
