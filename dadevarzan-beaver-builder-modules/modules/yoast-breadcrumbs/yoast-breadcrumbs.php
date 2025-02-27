<?php

/**
 *
 * @class FLDadevarzanYoastBreadcrumbsModule
 */
class FLDadevarzanYoastBreadcrumbsModule extends FLBuilderModule {

    /**
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Yoast Breadcrumbs', 'dadevarzan-beaverbuilder-modules'),
            'description'   => __('Add yoast breadcrumbs any where you want.', 'dadevarzan-beaverbuilder-modules'),
            'category'		=> __('Dadevarzan Modules', 'dadevarzan-beaverbuilder-modules'),
            'dir'           => FL_MODULE_DADEVARZAN_DIR . 'yoast-breadcrumbs/',
            'url'           => FL_MODULE_DADEVARZAN_URL . 'yoast-breadcrumbs/',
            'editor_export' => false, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));
    }
}

FLBuilder::register_module( 'FLDadevarzanYoastBreadcrumbsModule', array() );
