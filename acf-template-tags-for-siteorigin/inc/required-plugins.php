<?php

$plugins = array(
    
    array(
        'name'      => 'Reusable Layouts for SiteOrigin',
        'slug'      => 'reusable-layouts-for-siteorigin',
        'required'  => true,
    ),
    array(
        'name'      => 'Page Builder by SiteOrigin',
        'slug'      => 'siteorigin-panels',
        'required'  => true,
    ),
    array(
        'name'      => 'SiteOrigin Widgets Bundle',
        'slug'      => 'so-widgets-bundle',
        'required'  => true,
    ),
    array(
        'name'      => 'Advanced Custom Fields',
        'slug'      => 'advanced-custom-fields',
        'required'  => true,
    )
    
);

$config = array(
    'id'           => 'acftt',
    'default_path' => '',
    'menu'         => 'tgmpa-install-plugins',
    'parent_slug'  => 'plugins.php',
    'capability'   => 'manage_options',
    'has_notices'  => true,
    'dismissable'  => true,
    'dismiss_msg'  => '',
    'is_automatic' => false,
    'message'      => '',
    'strings'     => array(
        'install_link'                    => _n_noop(
            'Begin installing plugin',
            'Begin installing plugins',
            'acf-template-tags-for-siteorigin'
        ),
        'activate_link'                   => _n_noop(
            'Begin activating plugin',
            'Begin activating plugins',
            'acf-template-tags-for-siteorigin'
        ),
        'update_link'                   => _n_noop(
            'Begin updating plugins',
            'Begin updating plugins',
            'acf-template-tags-for-siteorigin'
        ),
    )
);
