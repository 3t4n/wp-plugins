<?php
/**
 *
 *
 * @package magazine art
 */
 // Exit if accessed directly.
 if ( ! defined( 'ABSPATH' ) ) {
 	exit;
 }
 // Do not proceed if Kirki does not exist.
 if ( ! class_exists( 'Kirki' ) ) {
 	return;
 }

 function azeen_core_kirki_config() {
 	$args = array(
         'disable_loader' => true,
     );
 	return $args;
 }
 add_filter( 'kirki/config', 'azeen_core_kirki_config' );


 /**
 * First of all, add the config.
 *
 * @link https://aristath.github.io/kirki/docs/getting-started/config.html
 */
Kirki::add_config(
	'azeen_core_option', array(
		'capability'  => 'edit_theme_options',
		'option_type' => 'theme_mod',
	)
);
 /*=============================================>>>>>
 = adding panel =
 ===============================================>>>>>*/


 Kirki::add_panel( 'upgradepro_options', array(
     'priority'    => 10,
     'title'       => esc_attr__( 'About Theme', 'azeen' ),
     'description' => esc_attr__( 'This panel will provide all info about the Theme.', 'azeen' ),
     'icon' => 'dashicons-warning'

 ) );
Kirki::add_panel( 'azeen_site_appearance', array(
    'priority'    => 10,
    'title'       => esc_attr__( 'Appearance', 'azeen' ),
    'description' => esc_attr__( 'This panel will provide all Site layout and Background color typography options of the Theme.', 'azeen' ),
) );

Kirki::add_panel( 'azeen_header_options', array(
    'priority'    => 10,
    'title'       => esc_attr__( 'Header Settings', 'azeen' ),
    'description' => esc_attr__( 'This panel site header options', 'azeen' ),
) );


Kirki::add_panel( 'azeen_home_options', array(
    'priority'    => 10,
    'title'       => esc_attr__( 'Home sections', 'azeen' ),
    'description' => esc_attr__( 'This panel will provide home page sections options', 'azeen' ),
) );
Kirki::add_panel( 'azeen_post_options', array(
    'priority'    => 10,
    'title'       => esc_attr__( 'Post options', 'azeen' ),
    'description' => esc_attr__( 'This panel will provide all Post options of the Theme.', 'azeen' ),
) );
Kirki::add_panel( 'azeen_socialshare_options', array(
    'priority'    => 10,
    'title'       => esc_attr__( 'Social Icon and Share', 'azeen' ),
    'description' => esc_attr__( 'This panel will provide Social icon and Share options of the Theme.', 'azeen' ),
) );

Kirki::add_panel( 'azeen_footer_options', array(
    'priority'    => 10,
    'title'       => esc_attr__( 'Footer options', 'azeen' ),
    'description' => esc_attr__( 'This panel footer options of the Theme.', 'azeen' ),
) );
/*=============================================>>>>>
= adding section =
===============================================>>>>>*/
Kirki::add_section( 'magazine_upgradepro_options', array(
    'priority'       => 1,
    'type'           => 'expanded',
    'capability'     => 'edit_theme_options',
) );


Kirki::add_section( 'azeen_color_options', array(
    'title'          =>esc_attr__( 'Color', 'azeen' ),
     'panel'          => 'azeen_site_appearance', // Not typically needed.
    'priority'       => 1,
    'icon' => 'dashicons-admin-customizer'
) );

Kirki::add_section( 'azeen_layout_site', array(
    'title'          =>esc_attr__( 'Site Layout', 'azeen' ),
     'panel'          => 'azeen_site_appearance', // Not typically needed.
    'priority'       => 1,
    'icon' => 'dashicons-welcome-widgets-menus'
) );

// header options
Kirki::add_section( 'azeen_topbar_options', array(
    'title'          =>esc_attr__( 'Top Bar Options', 'azeen' ),
     'panel'          => 'azeen_header_options', // Not typically needed.
    'priority'       => 1,
    'icon' => 'dashicons-menu'
) );

Kirki::add_section( 'azeen_header_options', array(
    'title'          =>esc_attr__( 'Header Options', 'azeen' ),
     'panel'          => 'azeen_header_options', // Not typically needed.
    'priority'       => 1,
    'icon' => 'dashicons-menu'
) );

Kirki::add_section( 'azeen_header_image', array(
    'title'          =>esc_attr__( 'Header Background image', 'azeen' ),
     'panel'          => 'azeen_header_options', // Not typically needed.
    'priority'       => 1,
    'icon' => 'dashicons-menu'
) );


// slider options


Kirki::add_section( 'azeen_postlayout_settings', array(
    'title'          =>esc_attr__( 'Category and Blog Post ', 'azeen' ),
     'panel'          => 'azeen_post_options', // Not typically needed.
    'priority'       => 3,
) );
Kirki::add_section( 'azeen_singlepost_settings', array(
    'title'          =>esc_attr__( 'Single Post ', 'azeen' ),
    'panel'          => 'azeen_post_options', // Not typically needed.
    'priority'       => 3,
) );
Kirki::add_section( 'azeen_relatedpost_settings', array(
    'title'          =>esc_attr__( 'Related post ', 'azeen' ),
    'panel'          => 'azeen_post_options', // Not typically needed.
    'priority'       => 3,
) );
Kirki::add_section( 'azeen_page_settings', array(
    'title'          =>esc_attr__( 'Page setting ', 'azeen' ),
     'panel'          => 'azeen_post_options', // Not typically needed.
    'priority'       => 3,
) );

Kirki::add_section( 'azeen_socialshare_settings', array(
    'title'          =>esc_attr__( 'social share setting ', 'azeen' ),
     'panel'          => 'azeen_socialshare_options', // Not typically needed.
    'priority'       => 3,
    'type' 			=> 'expanded',
) );

Kirki::add_section( 'azeen_footer_settings', array(
    'title'          =>esc_attr__( 'Footer Options ', 'azeen' ),
     'panel'          => 'azeen_footer_options', // Not typically needed.
    'priority'       => 3,
    'icon' => 'dashicons-feedback'
) );



$socialarray = array(
		'' => esc_attr__('Please Select', 'azeen'),
		'facebook' =>esc_attr__('Facebook', 'azeen'),
    'instagram' => esc_attr__('Instagram', 'azeen'),
    'linkedin'=> esc_attr__('LinkedIn', 'azeen'),
    'pinterest' => esc_attr__('Pinterest', 'azeen'),
		'dribbble' => esc_attr__('Dribbble', 'azeen'),
		'twitter' => esc_attr__('Twitter', 'azeen'),
		'google' => esc_attr__('google plus', 'azeen'),
		'skype' => esc_attr__('skype', 'azeen'),
		'youtube' => esc_attr__('Youtube', 'azeen'),
		'flickr' => esc_attr__('Flickr', 'azeen'),
		'vk' => esc_attr__('vk', 'azeen'),
		'rss' => esc_attr__('RSS', 'azeen'),
		'tumblr' => esc_attr__('Tumblr', 'azeen'),
		'instagram' => esc_attr__('Instagram', 'azeen'),
		'xing' => esc_attr__('Xing', 'azeen'),
    'linkedin'=> esc_attr__('LinkedIn', 'azeen'),
);

/**
 * A proxy function. Automatically passes-on the config-id.
 *
 * @param array $args The field arguments.
 */
function azeen_core_kirki_add_field( $args ) {
	Kirki::add_field( 'azeen_core_option', $args );
}

azeen_core_kirki_add_field( array(
	'type'        => 'custom',
	'settings'    => 'azeen_link_pro',
	'section'     => 'magazine_upgradepro_options',
	'default'     => '<a class="button button-primary" target="_blank" href="' . esc_url( 'imobthemes.com' ) . '">'.esc_html__( 'Upgrade To Pro', 'azeen' ).'</a>',
	'priority'    => 10,
) );

$azeen_primary_color = get_theme_mod('azeen_primary_color', '#93bf3d');
if ( 225 > ariColor::newColor( $azeen_primary_color )->luminance ) {
  $text_color_primary = '#fff';
} else {
$text_color_primary = '#0a0a0a';
}
azeen_core_kirki_add_field( array(
    'type' => 'color',
    'settings' => 'azeen_primary_color',
    'label' => esc_attr__('Primary Color', 'azeen'),
    'section' => 'azeen_color_options',
    'default' => '#93bf3d',
    'priority' => 10,
    'choices' => array(
        'alpha' => true
    ),
    'output' => array(
  			array(
  					'element' => '.woocommerce span.onsale,#blog-content .navigation .nav-links .current,.menu-wrap .dropdown.menu a::before,.label,.label:hover,.label:focus,#burger span,.search-submit',
  					'property' => 'background',
  					'units' => ''
  			),
        array(
            'element' => '.label-border.red ,.woocommerce div.product .woocommerce-tabs ul.tabs li.active,.woocommerce div.product p.price,.woocommerce ul.products li.product .price ins, .woocommerce ul.products li.product .price,.menu-wrap .dropdown.menu a:hover,a,.post-pagination-wrap .nav-links .nav-previous h4:hover,.post-pagination-wrap .nav-links i,.post-pagination-wrap .nav-links .nav-next h4:hover',
            'property' => 'color',
            'units' => ''
        ),
        array(
            'element' => '.header1 .is-dropdown-submenu > li:hover,.btn-read:hover,.comment-form .form-submit input#submit, a.box-comment-btn, .comment-form .form-submit input[type="submit"],.woocommerce nav.woocommerce-pagination ul li span.current,.woocommerce ul.products li.product .button:hover,#blog-content .navigation .nav-links a.page-numbers:hover,.post-single-cat,.label-border.red:hover,.single-post-title h1:after,.scroll_to_top',
            'property' => 'background-color',
            'units' => ''
        ),

        array(
            'element' => '.btn-read:hover,.woocommerce nav.woocommerce-pagination ul li span.current,.label-border.red',
            'property' => 'border-color',
            'units' => ''
        ),

        array(
            'element' => '.btn-read:hover,.comment-form .form-submit input#submit, a.box-comment-btn, .comment-form .form-submit input[type="submit"],.label-border.red:hover, .woocommerce nav.woocommerce-pagination ul li span.current,.woocommerce span.onsale,.woocommerce ul.products li.product .button:hover,#blog-content .navigation .nav-links a.page-numbers:hover,#blog-content .navigation .nav-links .current,.post-single-cat,.post-single-cat:hover,.label,.label-border.red:hover,.label:hover,.scroll_to_top,.scroll_to_top:hover,.search-submit',
            'property' => 'color',
            'value_pattern' =>$text_color_primary,
        ),
        array(
            'element' => '.label',
            'property' => 'box-shadow',
            'value_pattern' => 'inset 0 0 1em '. Kirki_Color::get_rgba($azeen_primary_color, 0.5) .', 0 0 1em '. Kirki_Color::get_rgba($azeen_primary_color, 0.5) .''
        ),
        array(
            'element' => '.label:hover,.label-border.red:hover',
            'property' => 'box-shadow',
            'value_pattern' => 'inset 0 0 0 '. Kirki_Color::get_rgba($azeen_primary_color, 0.5) .', 0 0 1.5em '. Kirki_Color::get_rgba($azeen_primary_color, 0.7) .''
        ),
        array(
            'element' => '.label-border.red',
            'property' => 'box-shadow',
            'value_pattern' => 'inset 0 0 0.2em '. Kirki_Color::get_rgba($azeen_primary_color, 0.4) .', 0 0 0.2em '. Kirki_Color::get_rgba($azeen_primary_color, 0.4) .''
        ),

  	),
));

azeen_core_kirki_add_field( array(
	'type'        => 'color',
	'settings'    => 'postitle_hover_color',
	'label'       => __( 'Post Title Hover color', 'azeen' ),
	'section'     => 'azeen_color_options',
	'default'     => '#93bf3d',
	'transport' => 'auto',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
			array(
					'element' => '.post-title a.post-title-link:hover',
					'property' => 'color',
					'units' => ''
			),
	),

) );

azeen_core_kirki_add_field( array(
	'type'        => 'switch',
	'settings'    => 'azeen_layout_site_box',
	'label'       => esc_attr__( 'Box/Full Site', 'azeen' ),
	'section'     => 'azeen_layout_site',
	'default'     => '2',
	'priority'    => 10,
	'choices'     => array(
		'on'  => esc_attr__( 'Box', 'azeen' ),
		'off' => esc_attr__( 'Full', 'azeen' ),
	),
) );
/*=============================================>>>>>
= Top Bar Options =
===============================================>>>>>*/
azeen_core_kirki_add_field( array(
	'type'        => 'switch',
	'settings'    => 'topbar_menu_onof',
	'label'       => esc_attr__( 'Enable/Disable top Bar', 'azeen' ),
	'section'     => 'azeen_topbar_options',
	'default'     => '1',
	'priority'    => 10,
	'choices'     => array(
		'on'  => esc_attr__( 'Enable', 'azeen' ),
		'off' => esc_attr__( 'Disable', 'azeen' ),
	),
) );

azeen_core_kirki_add_field( array(
	'type'        => 'custom',
	'settings'    => 'add_social_icontop',
	'section'     => 'azeen_topbar_options',
  'default'     => '<button type="button" class="button menu-shortcut focus-customizer-social-icontop" >' . esc_html__( 'Add Social Icon', 'azeen' ) . '</button>',
) );

azeen_core_kirki_add_field( array(
	'type'        => 'custom',
	'settings'    => 'add_menu_topbar',
	'section'     => 'azeen_topbar_options',
  'default'     => '<button type="button" class="button menu-shortcut focus-customizer-menu-topbar" >' . esc_html__( 'Add menu', 'azeen' ) . '</button>',
) );
$topbar_dbg_color = get_theme_mod('topbar_dbg_color', '#fff');
if ( 225 > ariColor::newColor( $topbar_dbg_color )->luminance ) {
  $text_color_topbar = '#fff';
} else {
$text_color_topbar = '#0a0a0a';
}

azeen_core_kirki_add_field( array(
	'type'        => 'color',
	'settings'    => 'topbar_dbg_color',
	'label'       => __( 'topbar background color', 'azeen' ),
	'section'     => 'azeen_topbar_options',
	'default'     => '#fff',
	'transport' => 'auto',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
			array(
					'element' => '.top-header',
					'property' => 'background',
					'units' => ''
			),
      array(
          'element' => '.top-header .top-bar-left .menu a',
          'property' => 'color',
          'value_pattern' =>$text_color_topbar,
      )
	),

) );
azeen_core_kirki_add_field( array(
	'type'        => 'slider',
	'settings'    => 'topbar_text_size',
	'label'       => esc_attr__( 'Text Size', 'azeen' ),
	'section'     => 'azeen_topbar_options',
	'default'     => 12,
	'choices'     => array(
		'min'  => '0',
		'max'  => '100',
		'step' => '1',
	),
  'transport' => 'auto',
  'output' => array(
      array(
          'element' => '.top-header .menu a',
          'property' => 'font-size',
          'units' => 'px'
      )),
) );

/*=============================================>>>>>
= Header Options =
===============================================>>>>>*/

azeen_core_kirki_add_field( array(
	'type'        => 'spacing',
	'settings'    => 'header_main_padding',
	'label'       => __( 'Main Header padding', 'azeen' ),
	'section'     => 'azeen_header_options',
	'transport' => 'auto',
	'default'     => array(
			'top'    => '30px',
			'bottom' => '30px',
			'left'   => '10px',
			'right'  => '10px',
		),
	'output' => array(
			array(
					'element' => '.header-wrap .header1',
					'property' => 'padding',
			)
	),
) );


azeen_core_kirki_add_field( array(
	'type'        => 'color',
	'settings'    => 'header_solidbg_color',
	'label'       => __( 'background color', 'azeen' ),
	'section'     => 'azeen_header_options',
	'default'     => '#fff',
	'transport' => 'auto',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
			array(
					'element' => '.header1 .is-dropdown-submenu > li,.header1 .is-dropdown-submenu,.banner-warp,.header1',
					'property' => 'background',
					'units' => ''
			)
	),

) );

azeen_core_kirki_add_field( array(
	'type'        => 'color',
	'settings'    => 'header_titledic_text',
	'label'       => __( 'Title And description color', 'azeen' ),
	'section'     => 'azeen_header_options',
	'default'     => '#0a0a0a',
	'transport' => 'auto',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
			array(
					'element' => '.header-wrap .banner-warp .site-branding p,.site-branding h1 a,.mobile-header .site-title,.mobile-header .site-description',
					'property' => 'color',
					'units' => ''
			)
	),

) );


azeen_core_kirki_add_field( array(
	'type'        => 'switch',
	'settings'    => 'sticky_menu_onof',
	'label'       => esc_attr__( 'Enable/Disable sticky Menu', 'azeen' ),
	'section'     => 'azeen_header_options',
	'default'     => '1',
	'priority'    => 10,
	'choices'     => array(
		'on'  => esc_attr__( 'Enable', 'azeen' ),
		'off' => esc_attr__( 'Disable', 'azeen' ),
	),
) );

azeen_core_kirki_add_field( array(
	'type'        => 'checkbox',
	'settings'    => 'search_icon_menubar',
	'label'       => esc_attr__( 'show/hide search icon Menu bar', 'azeen' ),
	'section'     => 'azeen_header_options',
	'default'     => true,

) );
azeen_core_kirki_add_field( array(
	'type'        => 'color',
	'settings'    => 'menu_text_color',
	'label'       => esc_attr__( 'Menu Text color', 'azeen' ),
	'section'     => 'azeen_header_options',
	'default'     => '#0a0a0a',
	'transport' => 'auto',
	'choices'     => array(
		'alpha' => true,
	),
  'output' => array(
			array(
					'element' => '.offcanvas-full-screen-inner .accordion-menu a,.header3,.menu-outer .menu-icon::after,.main-menu-wrap .dropdown.menu a,.navbar-search .navbar-search-button .fa,.offcanvas-trigger ',
					'property' => 'color',
					'units' => ''
			),
			array(
					'element' => '.offcanvas-full-screen-inner .accordion-menu .is-accordion-submenu-parent:not(.has-submenu-toggle)>a::after,.dropdown.menu > li.is-dropdown-submenu-parent > a::after',
					'property' => 'border-top-color',
					'units' => ''
			),
			array(
					'element' => '.is-dropdown-submenu .is-dropdown-submenu-parent.opens-left > a::after',
					'property' => 'border-right-color',
					'units' => ''
			)
	),

) );



/*=============================================>>>>>
= Home Page layout =
===============================================>>>>>*/

azeen_core_kirki_add_field( array(
	'type'        => 'checkbox',
	'settings'    => 'onoff_latestpost_home',
	'label'       => esc_attr__( 'Hide/Latest post Home page', 'azeen' ),
	'section'     => 'azeen_fontpage_layout',
	'default'     => true,
  'active_callback' => array(
      array(
          'setting' => 'show_on_front',
          'operator' => '==',
          'value' => 'posts'
      )
  ),
) );

azeen_core_kirki_add_field( array(
    'type' => 'radio-image',
    'settings' => 'layout_font_post',
    'label' => esc_html__('Layout font page post', 'azeen'),
    'section' => 'azeen_fontpage_layout',
    'default' => 'content1',
    'priority' => 10,
    'choices' => array(
        'content1' => get_template_directory_uri() . '/images/archive--list.jpg',
        'content2' => get_template_directory_uri() . '/images/archive--classic.jpg',
    ),
    'active_callback' => array(
        array(
            'setting' => 'show_on_front',
            'operator' => '==',
            'value' => 'posts'
        )
    ),
));

azeen_core_kirki_add_field( array(
    'type' => 'radio-image',
    'settings' => 'sidbar_position_fontpost',
    'label' => esc_html__('Layout Sidebar', 'azeen'),
    'section' => 'azeen_fontpage_layout',
    'default' => 'right',
    'priority' => 10,
    'choices' => array(
        'full' => get_template_directory_uri() . '/images/layout--full.jpg',
        'left' => get_template_directory_uri() . '/images/layout--left.jpg',
        'right' => get_template_directory_uri() . '/images/layout--right.jpg',
    ),
    'active_callback' => array(
        array(
            'setting' => 'show_on_front',
            'operator' => '==',
            'value' => 'posts'
        )
    ),
));
/*=============================================>>>>>
= slider options =
===============================================>>>>>*/



/* Slider */

azeen_core_kirki_add_field( array(
	'type'        => 'select',
	'settings'    => 'slider_style',
	'label'       => __( 'Select Slider Style', 'azeen' ),
	'section'     => 'azeen_slider_settings',
	'default'     => 'style2',
	'multiple'    => 1,
	'choices'     => array(
		'style1' => esc_attr__( 'style 1', 'azeen' ),
		'style2' => esc_attr__( 'style 2', 'azeen' ),
	),
) );

azeen_core_kirki_add_field( array(
	'type'        => 'number',
	'settings'    => 'slide_to_show',
	'label'       => esc_attr__( 'Slide to show', 'azeen' ),
	'section'     => 'azeen_slider_settings',
	'default'     => 3,
  'transport'   => 'postMessage',
	'choices'     => array(
		'min'  => 1,
		'max'  => 6,
		'step' => 1,
	),
  'active_callback' => array(
      array(
          'setting' => 'slider_style',
          'operator' => '==',
          'value' => 'style2'
      )
  )
) );

azeen_core_kirki_add_field( array(
	'type'        => 'checkbox',
	'settings'    => 'sticky_checkbox_slider',
	'label'       => esc_attr__( 'Hide sticky Post', 'azeen' ),
	'section'     => 'azeen_slider_settings',
	'default'     => false,
) );
azeen_core_kirki_add_field( array(
	'type'        		=> 'custom',
	'settings'    		=> 'slider_notice_hight',
	'label'       		=> esc_html__( 'Notice', 'azeen' ),
	'section'     		=> 'azeen_slider_settings',
	'default'     		=> '<div style="padding: 8px; background-color: #e74c3c; color: #fff; border-radius: 3px;">' . esc_html__( 'Slider height should be 1440 x 600 px', 'azeen' ) . '</div>',
	'priority'    		=> 1,
  'active_callback' => array(
      array(
          'setting' => 'slider_style',
          'operator' => '==',
          'value' => 'style1'
      )
  )
	));
  azeen_core_kirki_add_field( array(
  	'type'        		=> 'custom',
  	'settings'    		=> 'slider_notice_hight',
  	'label'       		=> esc_html__( 'Notice', 'azeen' ),
  	'section'     		=> 'azeen_slider_settings',
  	'default'     		=> '<div style="padding: 8px; background-color: #e74c3c; color: #fff; border-radius: 3px;">' . esc_html__( 'Slider height should be 720 x 450 px', 'azeen' ) . '</div>',
  	'priority'    		=> 1,
    'active_callback' => array(
        array(
            'setting' => 'slider_style',
            'operator' => '==',
            'value' => 'style2'
        )
    )
  	));

azeen_core_kirki_add_field( array(
    'type' => 'select',
    'settings' => 'category_show_slider',
    'label' => esc_attr__('Select Category', 'azeen'),
    'section' => 'azeen_slider_settings',
    'priority' => 10,
    'multiple' => 999,
    'transport'   => 'postMessage',
    'choices' =>Kirki_Helper::get_terms( array('taxonomy' => 'category') ),
));



azeen_core_kirki_add_field( array(
    'type' => 'select',
    'settings' => 'slider_post_order_by',
    'label' => esc_attr__('Show post orderby', 'azeen'),
    'section' => 'azeen_slider_settings',
    'default' => 'date',
    'priority' => 10,
    'transport'   => 'postMessage',
    'choices' => array(
        'none' => esc_attr__('None', 'azeen'),
        'date' => esc_attr__('Date', 'azeen'),
        'ID' => esc_attr__('ID', 'azeen'),
        'author' => esc_attr__('Author', 'azeen'),
        'title' => esc_attr__('Title', 'azeen'),
        'rand' => esc_attr__('Random', 'azeen')
    )
));

$slide_title_bgcolor = get_theme_mod('slide_title_bgcolor', 'rgba(0, 0, 0, .7)');
if ( 225 > ariColor::newColor( $slide_title_bgcolor )->luminance ) {
  $text_color_slider = '#fff';
} else {
$text_color_slider = '#0a0a0a';
}

azeen_core_kirki_add_field( array(
	'type'        => 'color',
	'settings'    => 'slide_title_bgcolor',
	'label'       => __( 'Slider title background color', 'azeen' ),
	'section'     => 'azeen_slider_settings',
	'default'     => 'rgba(0, 0, 0, .7)',
  'transport'   => 'auto',
  'choices'     => array(
		'alpha' => true,
	),
  'output'      => array(
    array(
      'element' => '.slider-post-wrap .slider-content,.slider-post-wrap .entry-meta',
      'property' => 'background',
      'units'   => '',
    ),
    array(
      'element' => '.slider-post-wrap .slider-content h3 a,.slider-post-wrap .entry-meta h3 a',
      'property' => 'color',
      'value_pattern'   => $text_color_slider,
    ),
  ),
) );


azeen_core_kirki_add_field( array(
	'type'        => 'checkbox',
	'settings'    => 'onof_slider_cat',
	'label'       => esc_attr__( 'Show/Hide Slider Category', 'azeen' ),
	'section'     => 'azeen_slider_settings',
	'default'     => true,
  'transport'   => 'auto',
  'output' => array(
	array(
		'element'       => '#slider .slider-content .label  ',
		'property'      => 'display',
		'value_pattern' => 'none',
		'exclude'       => array( true ),
	),
),
) );

azeen_core_kirki_add_field( array(
	'type'        => 'checkbox',
	'settings'    => 'onof_auto_play',
	'label'       => esc_attr__( 'On/Off Auto Play', 'azeen' ),
	'section'     => 'azeen_slider_settings',
	'default'     => true,
  'transport'   => 'postMessage',

) );
/*=============================================>>>>>
= Blog ,category page options =
===============================================>>>>>*/


azeen_core_kirki_add_field( array(
	'type'        => 'spacing',
	'settings'    => 'post_subheader_padding',
	'label'       => __( 'Post Page Sub-Header height', 'azeen' ),
	'section'     => 'azeen_postlayout_settings',
	'transport' => 'auto',
	'default'     => array(
			'top'    => '20px',
			'bottom' => '20px',
			'left'   => '15px',
			'right'  => '15px',
		),
	'output' => array(
			array(
					'element' => '.sub_banner .top-bar',
					'property' => 'padding',
			)
	),
) );

$color_setting_subheader_blog = get_theme_mod('color_setting_subheader_blog', '#e8e8e8');
if ( 225 > ariColor::newColor( $color_setting_subheader_blog )->luminance ) {
  $text_color_subheader_blog = '#fff';
} else {
$text_color_subheader_blog = '#0a0a0a';
}
azeen_core_kirki_add_field( array(
	'type'        => 'color',
	'settings'    => 'color_setting_subheader_blog',
	'label'       => __( 'Sub Header Color', 'azeen' ),
	'description' => esc_attr__( 'Change Blog ,category,archive etc sub header background color ', 'azeen' ),
	'section'     => 'azeen_postlayout_settings',
	'default'     => '#e8e8e8',
  'transport'   => 'auto',
  'choices'     => array(
    'alpha' => true,
  ),
  'output'      => array(
    array(
      'element' => '.sub_banner',
      'property' => 'background',
      'units'   => '',
    ),
    array(
      'element' => '.sub_banner h3.subheader,.sub_banner .breadcrumbs li,.sub_banner .breadcrumbs a,.sub_banner h2.subheader',
      'property' => 'color',
      'value_pattern'   => $text_color_subheader_blog,
    ),
  ),
) );

azeen_core_kirki_add_field( array(
    'type' => 'radio-image',
    'settings' => 'layout_page_gen',
    'label' => esc_html__('Post Layout', 'azeen'),
    'section' => 'azeen_postlayout_settings',
    'default' => 'content1',
    'priority' => 10,
    'choices' => array(
        'content1' => get_template_directory_uri() . '/images/archive--list.jpg',
        'content2' => get_template_directory_uri() . '/images/archive--classic.jpg',
    )
));

azeen_core_kirki_add_field( array(
    'type' => 'radio-image',
    'settings' => 'sidbar_position_gen',
    'label' => esc_html__('Layout Sidebar', 'azeen'),
    'section' => 'azeen_postlayout_settings',
    'default' => 'right',
    'priority' => 10,
    'choices' => array(
        'full' => get_template_directory_uri() . '/images/layout--full.jpg',
        'left' => get_template_directory_uri() . '/images/layout--left.jpg',
        'right' => get_template_directory_uri() . '/images/layout--right.jpg',
    )
));


azeen_core_kirki_add_field( array(
	'type'        => 'checkbox',
	'settings'    => 'checkbox_cat_box',
	'label'       => esc_attr__( 'Show/hide Category', 'azeen' ),
	'section'     => 'azeen_postlayout_settings',
	'default'     => true,
) );

azeen_core_kirki_add_field( array(
	'type'        => 'checkbox',
	'settings'    => 'checkbox_date_au_box',
	'label'       => esc_attr__( 'Show/hide Date and author', 'azeen' ),
	'section'     => 'azeen_postlayout_settings',
	'default'     => true,

) );

azeen_core_kirki_add_field( array(
	'type'        => 'checkbox',
	'settings'    => 'checkbox_share_box',
	'label'       => esc_attr__( 'Show/hide share icon', 'azeen' ),
	'section'     => 'azeen_postlayout_settings',
	'default'     => true,

) );

azeen_core_kirki_add_field( array(
	'type'        => 'checkbox',
	'settings'    => 'checkbox_button_readmore',
	'label'       => esc_attr__( 'Show/hide read more button', 'azeen' ),
	'section'     => 'azeen_postlayout_settings',
	'default'     => false,

) );

/*=============================================>>>>>
= Related Post =
===============================================>>>>>*/


azeen_core_kirki_add_field( array(
    'type' => 'switch',
    'settings' => 'show_single_related',
    'label' => esc_attr__('Related Post', 'azeen'),
    'section' => 'azeen_relatedpost_settings',
    'default' => '1',
    'priority' => 10,
    'choices' => array(
        'on' => esc_attr__('Enable', 'azeen'),
        'off' => esc_attr__('Disable', 'azeen')
    )
));
azeen_core_kirki_add_field( array(
    'type' => 'text',
    'settings' => 'related_post_title',
    'label' => esc_attr__('Related Post title', 'azeen'),
    'section' => 'azeen_relatedpost_settings',
    'default' => esc_attr__('You Might Also Like', 'azeen'),
    'priority' => 10,
    'transport' => 'postMessage',
    'js_vars' => array(
        array(
            'element' => '.single-post-box-related .block-title h3 ',
            'function' => 'html'
        )
    )
));
/*=============================================>>>>>
= single Post =
===============================================>>>>>*/
azeen_core_kirki_add_field( array(
	'type'        => 'checkbox',
	'settings'    => 'checkbox_featuredimg_box',
	'label'       => esc_attr__( 'Show/hide featured image', 'azeen' ),
	'section'     => 'azeen_singlepost_settings',
	'default'     => true,
) );

azeen_core_kirki_add_field( array(
	'type'        => 'checkbox',
	'settings'    => 'checkbox_author_boxsingle',
	'label'       => esc_attr__( 'Show/hide author box', 'azeen' ),
	'section'     => 'azeen_singlepost_settings',
	'default'     => true,

) );

azeen_core_kirki_add_field( array(
	'type'        => 'checkbox',
	'settings'    => 'checkbox_share_boxsingle',
	'label'       => esc_attr__( 'Show/hide share icon', 'azeen' ),
	'section'     => 'azeen_singlepost_settings',
	'default'     => true,

) );
/*=============================================>>>>>
= social share =
===============================================>>>>>*/
azeen_core_kirki_add_field( array(
	'type'        		=> 'custom',
	'settings'    		=> 'social_icons_header',
	'label'       		=> esc_html__( 'Social Icon', 'azeen' ),
	'section'     		=> 'azeen_socialshare_settings',
	'default'     		=> '<div style="padding: 3px; background-color: #e74c3c; color: #fff; border-radius: 3px;">' . esc_html__( 'Setup your social icon for social profile', 'azeen' ) . '</div>',
	'priority'    		=> 1,

));
azeen_core_kirki_add_field( array(
    'type' => 'repeater',
    'label' => esc_attr__('Add social icon', 'azeen'),
    'section' => 'azeen_socialshare_settings',
    'priority' => 10,
    'row_label' => array(
        'type' => 'field',
        'value' => esc_attr__('Social', 'azeen'),
        'field' => 'social_icon'
    ),
    'settings' => 'social_icons_top',
    'fields' => array(
        'social_icon' => array(
            'type' => 'select',
            'label' => esc_attr__('Icon', 'azeen'),
            'default' => '',
            'choices' =>$socialarray,
        ),
        'social_url' => array(
            'type' => 'url',
            'label' => esc_attr__('Link URL', 'azeen'),
            'default' => ''
        ),
    )
));
azeen_core_kirki_add_field( array(
	'type'        => 'checkbox',
	'settings'    => 'socialicon_topbar',
	'label'       => esc_attr__( 'show/hide social icon top bar', 'azeen' ),
	'section'     => 'azeen_socialshare_settings',
	'default'     => true,

) );

azeen_core_kirki_add_field( array(
	'type'        => 'checkbox',
	'settings'    => 'socialicon_menubar',
	'label'       => esc_attr__( 'show/hide social icon Menu bar', 'azeen' ),
	'section'     => 'azeen_socialshare_settings',
	'default'     => false,

) );


azeen_core_kirki_add_field( array(
	'type'        		=> 'custom',
	'settings'    		=> 'social_share_header',
	'label'       		=> esc_html__( 'Social share', 'azeen' ),
	'section'     		=> 'azeen_socialshare_settings',
	'default'     		=> '<div style="padding: 3px; background-color: #e74c3c; color: #fff; border-radius: 3px;">' . esc_html__( 'Enable and disable your social share icon in post', 'azeen' ) . '</div>',
));
azeen_core_kirki_add_field( array(
	'type'        => 'checkbox',
	'settings'    => 'socialshare_facebook',
	'label'       => esc_attr__( 'Facebook', 'azeen' ),
	'section'     => 'azeen_socialshare_settings',
	'default'     => true,
  'output'      => array(
       array(
           'element'       => '.post-social-share .btn-facebook',
           'property'      => 'display',
           'value_pattern' => 'none',
           'exclude'       => array( true ),
       ),
   ),
) );

azeen_core_kirki_add_field( array(
	'type'        => 'checkbox',
	'settings'    => 'socialshare_twitter',
	'label'       => esc_attr__( 'Twitter', 'azeen' ),
	'section'     => 'azeen_socialshare_settings',
	'default'     => true,
  'output'      => array(
       array(
           'element'       => '.post-social-share .btn-twitter',
           'property'      => 'display',
           'value_pattern' => 'none',
           'exclude'       => array( true ),
       ),
   ),

) );

azeen_core_kirki_add_field( array(
	'type'        => 'checkbox',
	'settings'    => 'socialshare_google',
	'label'       => esc_attr__( 'Google+', 'azeen' ),
	'section'     => 'azeen_socialshare_settings',
	'default'     => true,
  'output'      => array(
       array(
           'element'       => '.post-social-share .btn-google',
           'property'      => 'display',
           'value_pattern' => 'none',
           'exclude'       => array( true ),
       ),
   ),

) );

azeen_core_kirki_add_field( array(
	'type'        => 'checkbox',
	'settings'    => 'socialshare_pinterest',
	'label'       => esc_attr__( 'Pinterest', 'azeen' ),
	'section'     => 'azeen_socialshare_settings',
	'default'     => true,
  'output'      => array(
       array(
           'element'       => '.post-social-share .btn-pinterest',
           'property'      => 'display',
           'value_pattern' => 'none',
           'exclude'       => array( true ),
       ),
   ),

) );

azeen_core_kirki_add_field( array(
	'type'        => 'checkbox',
	'settings'    => 'socialshare_linkedin',
	'label'       => esc_attr__( 'LinkedIn', 'azeen' ),
	'section'     => 'azeen_socialshare_settings',
	'default'     => false,
  'output'      => array(
       array(
           'element'       => '.post-social-share .btn-linkedin',
           'property'      => 'display',
           'value_pattern' => 'none',
           'exclude'       => array( true ),
       ),
   ),

) );
/*=============================================>>>>>
= Footer Options =
===============================================>>>>>*/
$azeen_widgets_bgcolor = get_theme_mod('azeen_widgets_bgcolor', '#fff');
if ( 225 > ariColor::newColor( $azeen_widgets_bgcolor )->luminance ) {
  $text_color_fotwid = '#fff';
} else {
$text_color_fotwid = '#0a0a0a';
}
azeen_core_kirki_add_field( array(
    'type' => 'color',
    'settings' => 'azeen_widgets_bgcolor',
    'label' => esc_attr__('Widgets background color', 'azeen'),
    'section' => 'azeen_footer_settings',
    'default' => '#fff',
    'transport' => 'auto',
    'priority' => 10,
    'choices' => array(
        'alpha' => true
    ),
    'output' => array(
        array(
            'element' => '#footer .top-footer-wrap',
            'property' => 'background-color',
            'units' => ''
        ),
        array(
            'element' => '.top-footer-wrap .widget-title h3,.top-footer-wrap .widget_wrap  ul,.top-footer-wrap .widget_wrap ul li,.top-footer-wrap .widget_wrap ul li a,.top-footer-wrap .widget_wrap p,.top-footer-wrap .widget_wrap .tagcloud a',
            'property' => 'color',
            'value_pattern' =>$text_color_fotwid,
        ),
        array(
            'element' => '.top-footer-wrap .widget_wrap .tagcloud a',
            'property' => 'border-color',
            'value_pattern' =>$text_color_fotwid,
        ),
    )

));



/*----------- Footer COPYRIGHT options -----------*/
$azeen_copyright_bgcolor = get_theme_mod('azeen_copyright_bgcolor', '#242424');
if ( 225 > ariColor::newColor( $azeen_copyright_bgcolor )->luminance ) {
  $text_color_copyright = '#fff';
} else {
$text_color_copyright = '#0a0a0a';
}
azeen_core_kirki_add_field( array(
    'type' => 'color',
    'settings' => 'azeen_copyright_bgcolor',
    'label' => esc_attr__('Copyright background color', 'azeen'),
    'section' => 'azeen_footer_settings',
    'default' => '#242424',
    'transport' => 'auto',
    'priority' => 10,
    'choices' => array(
        'alpha' => true
    ),
    'output' => array(
        array(
            'element' => '#footer .footer-copyright-wrap',
            'property' => 'background-color',
            'units' => ''
        ),
        array(
            'element' => '.copy-text,#footer .footer-copyright-wrap,.footer-copyright-text p,.footer-copyright-wrap a',
            'property' => 'color',
            'value_pattern' =>$text_color_copyright,
        ),

    )

));

azeen_core_kirki_add_field( array(
    'type' => 'textarea',
    'transport'   => 'postMessage',
    'settings' => 'azeen_footertext',
    'label' => __('Copyright text', 'azeen'),
    'section' => 'azeen_footer_settings',
    'priority' => 10,

	));
