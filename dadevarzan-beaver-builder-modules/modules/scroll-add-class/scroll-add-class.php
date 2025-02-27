<?php

/**
 *
 * @class FLDadevarzanScrollAddClassModule
 */
class FLDadevarzanScrollAddClassModule extends FLBuilderModule {

    /** 
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */  
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('On Scroll Add Class', 'dadevarzan-beaverbuilder-modules'),
            'description'   => __('An basic example for coding new modules.', 'dadevarzan-beaverbuilder-modules'),
            'category'		=> __('Dadevarzan Modules', 'dadevarzan-beaverbuilder-modules'),
            'dir'           => FL_MODULE_DADEVARZAN_DIR . 'scroll-add-class/',
            'url'           => FL_MODULE_DADEVARZAN_URL . 'scroll-add-class/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));
    }

    /**
     * @method enqueue_scripts
     */
    public function enqueue_scripts()
    {
        $this->add_js( 'jquery-on-screen-vertical', FL_MODULE_DADEVARZAN_URL . 'scroll-add-class/js/onScreenVertical.js', array('jquery'), '', true );
    }
}

/**
 * Register the module and its form settings.
 */
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('FLDadevarzanScrollAddClassModule', array(
    'general'       => array( // Tab
        'title'         => __('General', 'dadevarzan-beaverbuilder-modules'), // Tab title
        'sections'      => array( // Tab Sections
            'general'       => array( // Section
                'title'         => __('Css Class Items', 'dadevarzan-beaverbuilder-modules'), // Section Title
                'fields'        => array( // Section Fields
                    'dadevarzan_class_form_field' => array(
                        'type'          => 'form',
                        'label'         => __('Css Class', 'dadevarzan-beaverbuilder-modules'),
                        'form'          => 'dadevarzan_css_class_form', // ID of a registered form.
                        'preview_text'  => 'css_class', // ID of a field to use for the preview text.
                        'multiple'      => true,
                    ),
                ),
            ),
        ),
    ),
));

//Add Parallax Layers
FLBuilder::register_settings_form('dadevarzan_css_class_form', array(
    'title' => __( 'Add Parallax Layer', 'dadevarzan-beaverbuilder-modules' ),
    'tabs'  => array(
        'css_class_general'      => array(
            'title'         => __( 'General', 'dadevarzan-beaverbuilder-modules' ),
            'sections'      => array(
                'title'       => array(
                    'title'         => __( '', 'dadevarzan-beaverbuilder-modules' ),
                    'fields'        => array(
                        'css_class'	=> array(
                            'type'		  => 'text',
                            'label'		  => __( 'CSS Class', 'dadevarzan-beaverbuilder-modules' ),
                            'description' => '',
                            'placeholder' => __( 'Without dot(.)', 'dadevarzan-beaverbuilder-modules' ),
                        ),
                        'selector'     => array(
                            'type'          => 'text',
                            'label'         => __('CSS Selector', 'dadevarzan-beaverbuilder-modules'),
                            'default'       => '',
                            'placeholder'   => '#ID or .CLASS',
                            'help'          => 'Add CSS Class to body when scroll comes to this selector',
                        ),
                    ),
                ),
            )
        ),
    )
));
