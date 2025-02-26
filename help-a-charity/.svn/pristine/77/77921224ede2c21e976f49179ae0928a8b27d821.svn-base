<?php
    /* Settings page options */

    require_once( HELPC_PATH . 'hd-wp-settings-api/class-hd-wp-settings-api.php' ); // Settings API

    $helpc_options = array(
        'page_title'  => __( 'Help a Charity', 'helpc' ),
        'menu_title'  => __( 'Help a Charity', 'helpc' ),
        'menu_slug'   => 'helpc_options',
        'capability'  => 'manage_options',
        'icon'        => 'dashicons-universal-access',
        'position'    => 61
    );

    $helpc_fields = array(
        'hd_tab_1'      => array(
            'title' => __( 'Settings', 'helpc' ),
            'type'  => 'tab',
        ),
        'helpc_enable' => array(
            'title'   => __( 'Enable donation bar?', 'helpc' ),
            'type'    => 'checkbox',
            'default' => 0,
            'desc'    => __( 'Enable donation bar?', 'helpc' ),
            'sanit'   => 'nohtml',
        ),
        'helpc_donation_amount' => array(
            'title'   => __( 'Donation amount', 'helpc' ),
            'type'    => 'text',
            'default' => '',
            'desc'    => __( 'Donation amount without currency and commas', 'helpc' ),
            'sanit'   => 'nohtml',
        ),
        'helpc_donation_target' => array(
            'title'   => __( 'Donation target', 'helpc' ),
            'type'    => 'text',
            'default' => '',
            'desc'    => __( 'Donation target without currency and commas', 'helpc' ),
            'sanit'   => 'nohtml',
        ),
        'helpc_bar_text' => array(
            'title'   => __( 'Bar text', 'helpc' ),
            'type'    => 'editor',
            'default' => '',
            'desc'    => __( 'User {{donation_amount}} for displaying amount and {{donation_target}} to display target', 'helpc' ),
            //'sanit'   => 'nohtml',
        ),
        'helpc_progress_bg' => array(
            'title'   => __( 'Progress bar background', 'helpc' ),
            'type'    => 'color',
            'default' => '#000000',
            'desc'    => __( 'Progress bar background', 'helpc' ),
            'sanit'   => 'color',
        ),
        'helpc_progress' => array(
            'title'   => __( 'Progress background', 'helpc' ),
            'type'    => 'color',
            'default' => '#000000',
            'desc'    => __( 'Progress background', 'helpc' ),
            'sanit'   => 'color',
        ),
        'helpc_bar_bg_color' => array(
            'title'   => __( 'Background color', 'helpc' ),
            'type'    => 'color',
            'default' => '#000000',
            'desc'    => __( 'Background color', 'helpc' ),
            'sanit'   => 'color',
        ),
        'helpc_bar_color' => array(
            'title'   => __( 'Text color', 'helpc' ),
            'type'    => 'color',
            'default' => '#ffffff',
            'desc'    => __( 'Text color', 'helpc' ),
            'sanit'   => 'color',
        ),
        'helpc_close_color' => array(
            'title'   => __( 'Close icon color', 'helpc' ),
            'type'    => 'color',
            'default' => '#ffffff',
            'desc'    => __( 'Close icon color', 'helpc' ),
            'sanit'   => 'color',
        ),
        'helpc_charity_logo' => array(
            'title'   => __( 'Charity logo', 'helpc' ),
            'type'    => 'upload',
            'default' => '',
            'desc'    => __( 'Charity logo', 'helpc' ),
            'sanit'   => 'url',
        ),
        'helpc_bar_position' => array(
            'title'   => __( 'Bar position', 'helpc' ),
            'type'    => 'select',
            'default' => 'two',
            'choices' => array(
                'top'   => __( 'Top', 'helpc' ),
                'bottom'   => __( 'Bottom', 'helpc' ),
            ),
            'desc'    => __( 'Bar position', 'helpc' ),
            'sanit'   => 'nohtml',
        ),
    );

    $helpc_settings = new HELPC_WP_Settings_API( $helpc_options, $helpc_fields );