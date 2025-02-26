<?php

Kirki::add_section( 'finest_settings', array(
    'title'          => esc_html__( 'General Options', 'finest-quickview' ),
    'panel'          => 'finest_panel',
    'priority'       => 160,
) );


Kirki::add_field( 'finest_panel', [
    'type'        => 'switch',
    'settings'    => 'on_quick_view',
	'label'       => esc_html__( 'Show Quick View', 'finest-quickview' ),
    'section'     => 'finest_settings',
    'default'     => 'on',
    'priority'    => 10,
    'choices'     => [
        'on'  => esc_html__( 'Enable', 'finest-quickview' ),
        'off' => esc_html__( 'Disable', 'finest-quickview' ),
    ],
] );

Kirki::add_field( 'finest_panel', [
	'type'        => 'select',
	'settings'    => 'quickview_option',
	'label'       => esc_html__( 'Quick View Button Position', 'finest-quickview' ),
	'section'     => 'finest_settings',
	'default'     => 'after_add_to_cart',
	'placeholder' => esc_html__( 'Select an option...', 'finest-quickview' ),
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'before_add_to_cart' => esc_html__( 'Before Add To Cart', 'finest-quickview' ),
		'after_add_to_cart' => esc_html__( 'After Add To Cart', 'finest-quickview' ),
		'above_add_to_cart' => esc_html__( 'Above Add To Cart', 'finest-quickview' ),
		'below_add_to_cart' => esc_html__( 'Below Add To Cart', 'finest-quickview' ),
	],
   
] );

Kirki::add_field( 'finest_panel', [
	'type'     => 'text',
	'settings' => 'change_button_text',
	'label'    => esc_html__( 'Change Quick View Button Text', 'finest-quickview' ),
	'section'  => 'finest_settings',
	'default'  => esc_html__( 'Quick View', 'finest-quickview' ),
	'priority' => 10,
   
] );

Kirki::add_field( 'finest_panel', [
	'type'        => 'select',
	'settings'    => 'qucik_view_style',
	'label'       => esc_html__( 'Quick View Button Style', 'finest-quickview' ),
	'section'     => 'finest_settings',
	'default'     => 'only_text',
	'placeholder' => esc_html__( 'Select an option...', 'finest-quickview' ),
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'only_text' => esc_html__( 'Text', 'finest-quickview' ),
		'only_icon' => esc_html__( 'Icon', 'finest-quickview' ),
		'icon_text' => esc_html__( 'Icon with Button', 'finest-quickview' ),
	],
   
] );


// modal content by device
Kirki::add_field( 'finest_panel', [
	'type'        => 'radio-buttonset',
	'settings'    => 'modal_content_device',
	'label'       => esc_html__( 'Show Modal Content By Device', 'finest-quickview' ),
	'section'     => 'finest_settings',
	'default'     => 'desktop',
	'priority'    => 10,
	'choices'     => [
		'desktop'   => esc_html__( 'Desktop', 'finest-quickview' ),
		'tablet' => esc_html__( 'Tablet', 'finest-quickview' ),
		'mobile'  => esc_html__( 'Mobile', 'finest-quickview' ),
	],
] );

Kirki::add_field( 'finest_panel', [
    'type'        => 'switch',
    'settings'    => 'modal_close_button',
	'label'       => esc_html__( 'Show Close Button', 'finest-quickview' ),
    'section'     => 'finest_settings',
    'default'     => 'on',
    'priority'    => 10,
    'choices'     => [
        'on'  => esc_html__( 'Enable', 'finest-quickview' ),
        'off' => esc_html__( 'Disable', 'finest-quickview' ),
    ],
    'active_callback' => [
        [
            'setting'  => 'modal_content_device',
            'operator' => '==',
            'value'    => 'desktop',
        ]
    ],
] );

Kirki::add_field( 'finest_panel', [
    'type'        => 'switch',
    'settings'    => 'on_title_view',
	'label'       => esc_html__( 'Show Title', 'finest-quickview' ),
    'section'     => 'finest_settings',
    'default'     => 'on',
    'priority'    => 10,
    'choices'     => [
        'on'  => esc_html__( 'Enable', 'finest-quickview' ),
        'off' => esc_html__( 'Disable', 'finest-quickview' ),
    ],
    'active_callback' => [
        [
            'setting'  => 'modal_content_device',
            'operator' => '==',
            'value'    => 'desktop',
        ]
    ],
    
] );

Kirki::add_field( 'finest_panel', [
    'type'        => 'switch',
    'settings'    => 'on_rating_view',
	'label'       => esc_html__( 'Show Rating', 'finest-quickview' ),
    'section'     => 'finest_settings',
    'default'     => 'on',
    'priority'    => 10,
    'choices'     => [
        'on'  => esc_html__( 'Enable', 'finest-quickview' ),
        'off' => esc_html__( 'Disable', 'finest-quickview' ),
    ],
    'active_callback' => [
        [
            'setting'  => 'modal_content_device',
            'operator' => '==',
            'value'    => 'desktop',
        ]
    ],
   
] );

Kirki::add_field( 'finest_panel', [
    'type'        => 'switch',
    'settings'    => 'on_price_view',
	'label'       => esc_html__( 'Show Price', 'finest-quickview' ),
    'section'     => 'finest_settings',
    'default'     => 'on',
    'priority'    => 10,
    'choices'     => [
        'on'  => esc_html__( 'Enable', 'finest-quickview' ),
        'off' => esc_html__( 'Disable', 'finest-quickview' ),
    ],
    'active_callback' => [
        [
            'setting'  => 'modal_content_device',
            'operator' => '==',
            'value'    => 'desktop',
        ]
    ],
   
] );

Kirki::add_field( 'finest_panel', [
    'type'        => 'switch',
    'settings'    => 'on_decription_view',
	'label'       => esc_html__( 'Show Excerpt', 'finest-quickview' ),
    'section'     => 'finest_settings',
    'default'     => 'on',
    'priority'    => 10,
    'choices'     => [
        'on'  => esc_html__( 'Enable', 'finest-quickview' ),
        'off' => esc_html__( 'Disable', 'finest-quickview' ),
    ],
    'active_callback' => [
        [
            'setting'  => 'modal_content_device',
            'operator' => '==',
            'value'    => 'desktop',
        ]
    ],
   
] );

Kirki::add_field( 'finest_panel', [
    'type'        => 'switch',
    'settings'    => 'on_quantity_view',
	'label'       => esc_html__( 'Show Quantity', 'finest-quickview' ),
    'section'     => 'finest_settings',
    'default'     => 'on',
    'priority'    => 10,
    'choices'     => [
        'on'  => esc_html__( 'Enable', 'finest-quickview' ),
        'off' => esc_html__( 'Disable', 'finest-quickview' ),
    ],
    'active_callback' => [
        [
            'setting'  => 'modal_content_device',
            'operator' => '==',
            'value'    => 'desktop',
        ]
    ],
    
] );

Kirki::add_field( 'finest_panel', [
    'type'        => 'switch',
    'settings'    => 'on_meta_view',
	'label'       => esc_html__( 'Show Meta', 'finest-quickview' ),
    'section'     => 'finest_settings',
    'default'     => 'on',
    'priority'    => 10,
    'choices'     => [
        'on'  => esc_html__( 'Enable', 'finest-quickview' ),
        'off' => esc_html__( 'Disable', 'finest-quickview' ),
    ],
    'active_callback' => [
        [
            'setting'  => 'modal_content_device',
            'operator' => '==',
            'value'    => 'desktop',
        ]
    ],
   
] );

Kirki::add_field( 'finest_panel', [
    'type'        => 'switch',
    'settings'    => 'on_sharing_view',
	'label'       => esc_html__( 'Show Sharing', 'finest-quickview' ),
    'section'     => 'finest_settings',
    'default'     => 'on',
    'priority'    => 10,
    'choices'     => [
        'on'  => esc_html__( 'Enable', 'finest-quickview' ),
        'off' => esc_html__( 'Disable', 'finest-quickview' ),
    ],
    'active_callback' => [
        [
            'setting'  => 'modal_content_device',
            'operator' => '==',
            'value'    => 'desktop',
        ]
    ],
    
] );

// tablet device
Kirki::add_field( 'finest_panel', [
    'type'        => 'switch',
    'settings'    => 'show_quick_buton_tablet',
	'label'       => esc_html__( 'Show Quick View Button On Tablet', 'finest-quickview' ),
    'section'     => 'finest_settings',
    'default'     => 'on',
    'priority'    => 10,
    'choices'     => [
        'on'  => esc_html__( 'Enable', 'finest-quickview' ),
        'off' => esc_html__( 'Disable', 'finest-quickview' ),
    ],
    'active_callback' => [
        [
            'setting'  => 'modal_content_device',
            'operator' => '==',
            'value'    => 'tablet',
        ]
    ],
] );


Kirki::add_field( 'finest_panel', [
    'type'        => 'switch',
    'settings'    => 'tablet_title_show',
	'label'       => esc_html__( 'Show Title On Tablet', 'finest-quickview' ),
    'section'     => 'finest_settings',
    'default'     => 'on',
    'priority'    => 10,
    'choices'     => [
        'on'  => esc_html__( 'Enable', 'finest-quickview' ),
        'off' => esc_html__( 'Disable', 'finest-quickview' ),
    ],
    'active_callback' => [
        [
            'setting'  => 'modal_content_device',
            'operator' => '==',
            'value'    => 'tablet',
        ]
    ],
    
] );

Kirki::add_field( 'finest_panel', [
    'type'        => 'switch',
    'settings'    => 'show_rating_on_tablet',
	'label'       => esc_html__( 'Show Rating On Tablet', 'finest-quickview' ),
    'section'     => 'finest_settings',
    'default'     => 'on',
    'priority'    => 10,
    'choices'     => [
        'on'  => esc_html__( 'Enable', 'finest-quickview' ),
        'off' => esc_html__( 'Disable', 'finest-quickview' ),
    ],
    'active_callback' => [
        [
            'setting'  => 'modal_content_device',
            'operator' => '==',
            'value'    => 'tablet',
        ]
    ],
   
] );

Kirki::add_field( 'finest_panel', [
    'type'        => 'switch',
    'settings'    => 'show_price_on_tablet',
	'label'       => esc_html__( 'Show Price On Tablet ', 'finest-quickview' ),
    'section'     => 'finest_settings',
    'default'     => 'on',
    'priority'    => 10,
    'choices'     => [
        'on'  => esc_html__( 'Enable', 'finest-quickview' ),
        'off' => esc_html__( 'Disable', 'finest-quickview' ),
    ],
    'active_callback' => [
        [
            'setting'  => 'modal_content_device',
            'operator' => '==',
            'value'    => 'tablet',
        ]
    ],
   
] );

Kirki::add_field( 'finest_panel', [
    'type'        => 'switch',
    'settings'    => 'show_decription_on_table',
	'label'       => esc_html__( 'Show Excerpt On Tablet', 'finest-quickview' ),
    'section'     => 'finest_settings',
    'default'     => 'on',
    'priority'    => 10,
    'choices'     => [
        'on'  => esc_html__( 'Enable', 'finest-quickview' ),
        'off' => esc_html__( 'Disable', 'finest-quickview' ),
    ],
    'active_callback' => [
        [
            'setting'  => 'modal_content_device',
            'operator' => '==',
            'value'    => 'tablet',
        ]
    ],
   
] );

Kirki::add_field( 'finest_panel', [
    'type'        => 'switch',
    'settings'    => 'show_quantity_on_tablet',
	'label'       => esc_html__( 'Show Quantity On Tablet', 'finest-quickview' ),
    'section'     => 'finest_settings',
    'default'     => 'on',
    'priority'    => 10,
    'choices'     => [
        'on'  => esc_html__( 'Enable', 'finest-quickview' ),
        'off' => esc_html__( 'Disable', 'finest-quickview' ),
    ],
    'active_callback' => [
        [
            'setting'  => 'modal_content_device',
            'operator' => '==',
            'value'    => 'tablet',
        ]
    ],
    
] );

Kirki::add_field( 'finest_panel', [
    'type'        => 'switch',
    'settings'    => 'show_meta_on_tablet',
	'label'       => esc_html__( 'Show Meta On Tablet', 'finest-quickview' ),
    'section'     => 'finest_settings',
    'default'     => 'on',
    'priority'    => 10,
    'choices'     => [
        'on'  => esc_html__( 'Enable', 'finest-quickview' ),
        'off' => esc_html__( 'Disable', 'finest-quickview' ),
    ],
    'active_callback' => [
        [
            'setting'  => 'modal_content_device',
            'operator' => '==',
            'value'    => 'tablet',
        ]
    ],
   
] );


// tablet device
Kirki::add_field( 'finest_panel', [
    'type'        => 'switch',
    'settings'    => 'show_quick_buton_mobile',
	'label'       => esc_html__( 'Show Quick View Button On Mobile', 'finest-quickview' ),
    'section'     => 'finest_settings',
    'default'     => 'on',
    'priority'    => 10,
    'choices'     => [
        'on'  => esc_html__( 'Enable', 'finest-quickview' ),
        'off' => esc_html__( 'Disable', 'finest-quickview' ),
    ],
    'active_callback' => [
        [
            'setting'  => 'modal_content_device',
            'operator' => '==',
            'value'    => 'mobile',
        ]
    ],
] );


Kirki::add_field( 'finest_panel', [
    'type'        => 'switch',
    'settings'    => 'mobile_title_show',
	'label'       => esc_html__( 'Show Title On Mobile', 'finest-quickview' ),
    'section'     => 'finest_settings',
    'default'     => 'on',
    'priority'    => 10,
    'choices'     => [
        'on'  => esc_html__( 'Enable', 'finest-quickview' ),
        'off' => esc_html__( 'Disable', 'finest-quickview' ),
    ],
    'active_callback' => [
        [
            'setting'  => 'modal_content_device',
            'operator' => '==',
            'value'    => 'mobile',
        ]
    ],
    
] );

Kirki::add_field( 'finest_panel', [
    'type'        => 'switch',
    'settings'    => 'show_rating_on_mobile',
	'label'       => esc_html__( 'Show Rating On Mobile', 'finest-quickview' ),
    'section'     => 'finest_settings',
    'default'     => 'on',
    'priority'    => 10,
    'choices'     => [
        'on'  => esc_html__( 'Enable', 'finest-quickview' ),
        'off' => esc_html__( 'Disable', 'finest-quickview' ),
    ],
    'active_callback' => [
        [
            'setting'  => 'modal_content_device',
            'operator' => '==',
            'value'    => 'mobile',
        ]
    ],
   
] );

Kirki::add_field( 'finest_panel', [
    'type'        => 'switch',
    'settings'    => 'show_price_on_mobile',
	'label'       => esc_html__( 'Show Price On Mobile ', 'finest-quickview' ),
    'section'     => 'finest_settings',
    'default'     => 'on',
    'priority'    => 10,
    'choices'     => [
        'on'  => esc_html__( 'Enable', 'finest-quickview' ),
        'off' => esc_html__( 'Disable', 'finest-quickview' ),
    ],
    'active_callback' => [
        [
            'setting'  => 'modal_content_device',
            'operator' => '==',
            'value'    => 'mobile',
        ]
    ],
   
] );

Kirki::add_field( 'finest_panel', [
    'type'        => 'switch',
    'settings'    => 'show_decription_on_mobile',
	'label'       => esc_html__( 'Show Excerpt On Mobile', 'finest-quickview' ),
    'section'     => 'finest_settings',
    'default'     => 'on',
    'priority'    => 10,
    'choices'     => [
        'on'  => esc_html__( 'Enable', 'finest-quickview' ),
        'off' => esc_html__( 'Disable', 'finest-quickview' ),
    ],
    'active_callback' => [
        [
            'setting'  => 'modal_content_device',
            'operator' => '==',
            'value'    => 'mobile',
        ]
    ],
   
] );

Kirki::add_field( 'finest_panel', [
    'type'        => 'switch',
    'settings'    => 'show_quantity_on_mobile',
	'label'       => esc_html__( 'Show Quantity On Mobile', 'finest-quickview' ),
    'section'     => 'finest_settings',
    'default'     => 'on',
    'priority'    => 10,
    'choices'     => [
        'on'  => esc_html__( 'Enable', 'finest-quickview' ),
        'off' => esc_html__( 'Disable', 'finest-quickview' ),
    ],
    'active_callback' => [
        [
            'setting'  => 'modal_content_device',
            'operator' => '==',
            'value'    => 'mobile',
        ]
    ],
    
] );

Kirki::add_field( 'finest_panel', [
    'type'        => 'switch',
    'settings'    => 'show_meta_on_mobile',
	'label'       => esc_html__( 'Show Meta On Mobile', 'finest-quickview' ),
    'section'     => 'finest_settings',
    'default'     => 'on',
    'priority'    => 10,
    'choices'     => [
        'on'  => esc_html__( 'Enable', 'finest-quickview' ),
        'off' => esc_html__( 'Disable', 'finest-quickview' ),
    ],
    'active_callback' => [
        [
            'setting'  => 'modal_content_device',
            'operator' => '==',
            'value'    => 'mobile',
        ]
    ],
   
] );

