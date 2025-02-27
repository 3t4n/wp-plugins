<?php

$opt_name = 'divipreloader_opts';
Redux::setArgs(
    $opt_name,
    // This is your opt_name,
    array(
        'display_name'        => 'Preloader',
        'display_version'     => '1',
        'menu_title'          => 'Preloader',
        'admin_bar'           => 'true',
        'page_slug'           => 'divipreloader_settings',
        'menu_type'           => 'menu',
        'allow_sub_menu'      => false,
        'show_options_object' => false,
        'show_import_export'  => false,
        'menu_icon'           => 'dashicons-sos',
        'page_title'          => 'Divi Preloader',
    )
);
$general_tab = [ [
    'id'      => 'opt-site-display-preloader',
    'type'    => 'switch',
    'title'   => __( 'Display Preloader On Site', 'redux-framework-demo' ),
    'default' => '1',
    'on'      => __( 'Enabled', 'redux-framework-demo' ),
    'off'     => __( 'Disabled', 'redux-framework-demo' ),
], [
    'id'      => 'opt-site-home-pg-display-preloader',
    'type'    => 'switch',
    'title'   => __( 'Display Preloader On Home Page Only', 'redux-framework-demo' ),
    'default' => '1',
    'on'      => __( 'Enabled', 'redux-framework-demo' ),
    'off'     => __( 'Disabled', 'redux-framework-demo' ),
], 
[
    'id'      => 'opt-site-home-up',
    'type'    => 'raw',
    'title'   => __( '', 'redux-framework-demo' ),
    'content'  => '<a href="'.dpl_fs()->get_upgrade_url().'"><img src="'.DIVIPRELOADER_PLUGIN_URL.'assets/admin/img/geneal.png" style="max-width: 740px;display: block;margin: 0 auto;" /></a>'

]
 ];
$gifs = [
    '0' => [
    'alt' => '1 Column',
    'img' => DIVIPRELOADER_PLUGIN_URL . 'spinners/Spin-1s-200px.svg',
],
];
$design_settings = [ [
    'id'      => 'opt-site-select-preloader',
    'type'    => 'image_select',
    'title'   => __( 'Select Preloader GIF', 'redux-framework-demo' ),
    'options' => $gifs,
    'default' => '0',
    'class'   => 'redux_gifs',
],
[
    'id'      => 'opt-site-home-s',
    'type'    => 'raw',
    'title'   => __( '', 'redux-framework-demo' ),
    'content'  => '<a href="'.dpl_fs()->get_upgrade_url().'"><img src="'.DIVIPRELOADER_PLUGIN_URL.'assets/admin/img/upgrade-s.png" style="max-width: 800px;display: block;margin: 0 auto;" /></a>'

]
 ];
$options = [
    [
    'title'      => 'General',
    'id'         => 'divipreloader_general_tab',
    'heading'    => '',
    'subsection' => false,
    'desc'       => '',
    'fields'     => $general_tab,
],
    [
    'title'      => 'Design Settings',
    'heading'    => '',
    'id'         => 'opt-site-design-settings-tab',
    'subsection' => false,
    'desc'       => '',
    'icon'       => 'el el-brush',
    'fields'     => $design_settings,
],
    [
    'title'      => 'Animation Settings',
    'heading'    => '',
    'id'         => 'opt-site-animation-settings-tab',
    'subsection' => false,
    'desc'       => '',
    'icon'       => 'el el-th',
    'fields'     => [
    [
    'id'      => 'opt-select-animation-effect',
    'type'    => 'select',
    'title'   => __( 'Select Animation Effect', 'redux-framework-demo' ),
    'desc'    => __( '', 'redux-framework-demo' ),
    'options' => [
        'fade_in'  => 'Fade In',
        'fade_out' => 'Fade Out',
    ],
    'default' => 'fade_in'
],
    [
    'id'      => 'opt-select-animation-speed',
    'type'    => 'select',
    'title'   => __( 'Select Animation Speed', 'redux-framework-demo' ),
    'desc'    => __( '', 'redux-framework-demo' ),
    'options' => [
        'fast' => 'Fast',
        'slow' => 'Slow',
    ],
     'default'  => 'fast',
],
    [
    'id'    => 'opt-preloader-delay-time',
    'type'  => 'text',
    'title' => __( 'Preloader Delay Time', 'redux-framework-demo' ),
    'desc'  => __( '', 'redux-framework-demo' ),
    'default'  => 0,
],
    [
    'id'    => 'opt-preloader-body-opacity',
    'type'  => 'text',
    'title' => __( 'Preloader Body Opacity', 'redux-framework-demo' ),
    'desc'  => __( '', 'redux-framework-demo' ),
]
],
],
    [
    'title'      => 'Custom CSS',
    'heading'    => '',
    'id'         => 'opt-site-custom-css-tab',
    'subsection' => false,
    'desc'       => '',
    'icon'       => 'el el-edit',
    'fields'     => [ [
    'id'       => 'opt-divipreloader-css-editor',
    'type'     => 'ace_editor',
    'title'    => __( 'CSS Code', 'redux-framework-demo' ),
    'subtitle' => __( 'Paste your CSS code here.', 'redux-framework-demo' ),
    'mode'     => 'css',
    'theme'    => 'chrome',
    'desc'     => '',
    'default'  => '',
    'options'  => [
    'minLines' => 24,
    'maxLines' => 60,
],
] ],
]
];
foreach ( $options as $option ) {
    Redux::setSection( $opt_name, $option );
}