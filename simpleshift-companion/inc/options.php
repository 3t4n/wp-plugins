<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// #################################################
// Reg. js / css
// #################################################


function simpleshift_companion_customizer_styles() { ?>
	<style type="text/css">
	    li[id*="upsell"] { border:1px solid #7B5A84; padding:20px; width:auto; background:#f9e6ff; margin-top:20px; }
	</style>
<?php }
add_action( 'customize_controls_print_styles', 'simpleshift_companion_customizer_styles', 20 );

// #################################################
// upsell note
// #################################################

$pro_url='https://themeshift.com/wordpress-themes/simpleshift/';
$upsell='<p>'. __( 'SimpleShift Pro offers additional options for this section including parallax background images, typography, and color settings.', 'simpleshift-companion' ) .'</p><a href="'.$pro_url.'" class="button button-simpleshift" target="_blank">Get SimpleShift Pro</a>';

// #################################################
// Extend Kirki Options
// #################################################

// Featured

Kirki::add_section( 'fp-featured', array(
    'title'          => __( 'Frontpage Featured Section', 'simpleshift-companion' ),
    'description'    => '',
    'panel'          => '', 
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'simpleshift-config', array(
	'type'        => 'custom',
	'settings'    => 'featured-upsell-note',
	'label'       => 'Additional Features',
	'section'     => 'fp-featured',
	'default'     => $upsell,
	'priority'    => 100,
) );

Kirki::add_field( 'simpleshift-config', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'featured-toggle',
	'label'       => __( 'Frontpage Featured Status', 'simpleshift-companion' ),
	'section'     => 'fp-featured',
	'default'     => '2',
	'priority'    => 10,
	'choices'     => array(
		'1'   => esc_attr__( 'Show', 'simpleshift-companion' ),
		'2' => esc_attr__( 'Demo', 'simpleshift-companion' ),
		'3'  => esc_attr__( 'Hide', 'simpleshift-companion' ),
	),
) );

Kirki::add_field( 'simpleshift-config', array(
	'settings' => 'fp-featured-slug',
	'label'    => __( 'Navigation Menu ID', 'simpleshift-companion' ),
	'section'  => 'fp-featured',
	'type'     => 'text',
	'priority' => 10,
	'default'  => 'featured',
	'description'   => __( 'The frontpage section IDs (what shows up in the hover state and the address bar when clicked) have already been set to a default show in this field. If you would like to change the ID so that a different term comes up in the slug for that section (ie. http://example.com/#top instead of /#home), then change the term below for the corresponding section. You will also want to add the custom menu items in the Menus section of your dashboard (click "Links," then add the entire URL, such as http://example.com/#top). IMPORTANT: You must also add this term to the title field in the menu editor. If you do not see this field you may have to activate it by selecting the Screen Options tab in the top right of the page and then checking the Title Attribute box.', 'simpleshift-companion' ),
) );

Kirki::add_field( 'simpleshift-config', array(
	'type'        => 'custom',
	'settings'    => 'featured-widget-note',
	'label'       => 'Populate Featured Content',
	'section'     => 'fp-team',
	'default'     => __( 'To populate the featured content section, you will need to add featured content widgets to the Frontpage Featured widget areas. Go to the Widgets section under Apperance in the left sidebar.', 'simpleshift-companion' ),
	'priority'    => 10,
) );

// Action Row #1

Kirki::add_section( 'fp-action1', array(
    'title'          => __( 'Frontpage Action Row #1', 'simpleshift-companion' ),
    'description'    => '',
    'panel'          => '', 
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'simpleshift-config', array(
	'type'        => 'custom',
	'settings'    => 'action1-upsell-note',
	'label'       => 'Additional Features',
	'section'     => 'fp-action1',
	'default'     => $upsell,
	'priority'    => 100,
) );

Kirki::add_field( 'simpleshift-config', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'fp-action1-toggle',
	'label'       => __( 'Frontpage Action Row Status', 'simpleshift-companion' ),
	'section'     => 'fp-action1',
	'default'     => '2',
	'priority'    => 1,
	'choices'     => array(
		'1'   => esc_attr__( 'Show', 'simpleshift-companion' ),
		'2' => esc_attr__( 'Demo', 'simpleshift-companion' ),
		'3'  => esc_attr__( 'Hide', 'simpleshift-companion' ),
	),
) );
            
Kirki::add_field( 'simpleshift-config', array(
	'settings' => 'fp-action1-title',
	'label'    => __( 'Action Row #1 - Main Title', 'simpleshift-companion' ),
	'section'  => 'fp-action1',
	'type'     => 'text',
	'priority' => 10,
	'default'  => '',
	'description'   => __( 'This is the big text in the Action Row #1 section. Leave blank to hide.', 'simpleshift-companion' ),
) );

Kirki::add_field( 'simpleshift-config', array(
	'settings' => 'fp-action1-sub-title',
	'label'    => __( 'Action Row #1 - Sub Title', 'simpleshift-companion' ),
	'section'  => 'fp-action1',
	'type'     => 'text',
	'priority' => 10,
	'default'  => '',
	'description'   => __( 'This is the smaller text in the Action Row #1 section. Leave blank to hide.', 'simpleshift-companion' ),
) );

Kirki::add_field( 'simpleshift-config', array(
	'settings' => 'fp-action1-button-text',
	'label'    => __( 'Action Row #1 - Button Text', 'simpleshift-companion' ),
	'section'  => 'fp-action1',
	'type'     => 'text',
	'priority' => 10,
	'default'  => '',
	'description'   => __( 'This is the text in the button. Leave blank to hide.', 'simpleshift-companion' ),
) );

Kirki::add_field( 'simpleshift-config', array(
	'settings' => 'fp-action1-button-url',
	'label'    => __( 'Action Row #1 - Button URL', 'simpleshift-companion' ),
	'section'  => 'fp-action1',
	'type'     => 'text',
	'priority' => 10,
	'default'  => '',
	'description'   => __( 'This is link destination for the button. Leave blank to hide.', 'simpleshift-companion' ),
	'sanitize_callback' => 'simpleshift_companion_sanitize_url'
) );        
            
Kirki::add_field( 'simpleshift-config', array(
	'settings' => 'fp-action1-slug',
	'label'    => __( 'Navigation Menu ID', 'simpleshift-companion' ),
	'section'  => 'fp-action1',
	'type'     => 'text',
	'priority' => 10,
	'default'  => 'action1',
	'description'   => __( 'The frontpage section IDs (what shows up in the hover state and the address bar when clicked) have already been set to a default show in this field. If you would like to change the ID so that a different term comes up in the slug for that section (ie. http://example.com/#top instead of /#home), then change the term below for the corresponding section. You will also want to add the custom menu items in the Menus section of your dashboard (click "Links," then add the entire URL, such as http://example.com/#top). IMPORTANT: You must also add this term to the title field in the menu editor. If you do not see this field you may have to activate it by selecting the Screen Options tab in the top right of the page and then checking the Title Attribute box.', 'simpleshift-companion' ),
) );

// About Section

Kirki::add_section( 'fp-about', array(
    'title'          => __( 'Frontpage About Section', 'simpleshift-companion' ),
    'description'    => '',
    'panel'          => '', 
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'simpleshift-config', array(
	'type'        => 'custom',
	'settings'    => 'about-upsell-note',
	'label'       => 'Additional Features',
	'section'     => 'fp-about',
	'default'     => $upsell,
	'priority'    => 100,
) );

Kirki::add_field( 'simpleshift-config', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'fp-about-toggle',
	'label'       => __( 'About Status', 'simpleshift-companion' ),
	'section'     => 'fp-about',
	'default'     => '2',
	'priority'    => 1,
	'choices'     => array(
		'1' 	=> esc_attr__( 'Show', 'simpleshift-companion' ),
		'2' 	=> esc_attr__( 'Demo', 'simpleshift-companion' ),
		'3' 	=> esc_attr__( 'Hide', 'simpleshift-companion' ),
	),
) );

Kirki::add_field( 'simpleshift-config', array(
	'settings' => 'fp-about-title',
	'label'    => __( 'About - Main Title', 'simpleshift-companion' ),
	'section'  => 'fp-about',
	'type'     => 'text',
	'priority' => 10,
	'default'  => '',
	'description'   => __( 'This is the big text in the about section. Leave blank to hide.', 'simpleshift-companion' ),
) );

Kirki::add_field( 'simpleshift-config', array(
	'settings' => 'fp-about-sub-title',
	'label'    => __( 'About - Sub Title', 'simpleshift-companion' ),
	'section'  => 'fp-about',
	'type'     => 'text',
	'priority' => 10,
	'default'  => '',
	'description'   => __( 'This is the smaller text in the about section. Leave blank to hide.', 'simpleshift-companion' ),
) );

Kirki::add_field( 'simpleshift-config', array(
	'settings' => 'fp-about-description',
	'label'    => __( 'About - Description', 'simpleshift-companion' ),
	'section'  => 'fp-about',
	'type'     => 'text',
	'priority' => 10,
	'default'  => '',
	'description'   => __( 'This is the smallest text in the about section. Leave blank to hide.', 'simpleshift-companion' ),
) );

Kirki::add_field( 'simpleshift-config', array(
	'type'        => 'custom',
	'settings'    => 'about-widget-note',
	'label'       => 'Populate About Content',
	'section'     => 'fp-about',
	'default'     => __( 'To populate the About content section, you will need to add About content widgets to the Frontpage About widget areas. Go to the Widgets section under Apperance in the left sidebar.', 'simpleshift-companion' ),
	'priority'    => 10,
) );

Kirki::add_field( 'simpleshift-config', array(
	'settings' => 'fp-about-slug',
	'label'    => __( 'Navigation Menu ID', 'simpleshift-companion' ),
	'section'  => 'fp-about',
	'type'     => 'text',
	'priority' => 10,
	'default'  => 'about',
	'description'   => __( 'The frontpage section IDs (what shows up in the hover state and the address bar when clicked) have already been set to a default show in this field. If you would like to change the ID so that a different term comes up in the slug for that section (ie. http://example.com/#top instead of /#home), then change the term below for the corresponding section. You will also want to add the custom menu items in the Menus section of your dashboard (click "Links," then add the entire URL, such as http://example.com/#top). IMPORTANT: You must also add this term to the title field in the menu editor. If you do not see this field you may have to activate it by selecting the Screen Options tab in the top right of the page and then checking the Title Attribute box.', 'simpleshift-companion' ),
) );

// Testimonial

Kirki::add_section( 'fp-test', array(
    'title'          => __( 'Frontpage Testimonial Section', 'simpleshift-companion' ),
    'description'    => '',
    'panel'          => '', 
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'simpleshift-config', array(
	'type'        => 'custom',
	'settings'    => 'test-upsell-note',
	'label'       => 'Additional Features',
	'section'     => 'fp-test',
	'default'     => $upsell,
	'priority'    => 100,
) );

Kirki::add_field( 'simpleshift-config', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'fp-test-toggle',
	'label'       => __( 'Testimonial Status', 'simpleshift-companion' ),
	'section'     => 'fp-test',
	'default'     => '2',
	'priority'    => 1,
	'choices'     => array(
		'1'   => esc_attr__( 'Show', 'simpleshift-companion' ),
		'2' => esc_attr__( 'Demo', 'simpleshift-companion' ),
		'3'  => esc_attr__( 'Hide', 'simpleshift-companion' ),
	),
) );
            
Kirki::add_field( 'simpleshift-config', array(
	'settings' => 'fp-test-title',
	'label'    => __( 'Testimonial - Main Title', 'simpleshift-companion' ),
	'section'  => 'fp-test',
	'type'     => 'text',
	'priority' => 10,
	'default'  => '',
	'description'   => __( 'This is the big text in the testimonial section. Leave blank to hide.', 'simpleshift-companion' ),
) );

Kirki::add_field( 'simpleshift-config', array(
	'type'     => 'textarea',
	'settings' => 'fp-test-description',
	'label'    => __( 'Testimonial', 'simpleshift-companion' ),
	'section'  => 'fp-test',
	'default'  => '',
	'priority' => 10,
) );

Kirki::add_field( 'simpleshift-config', array(
	'settings' => 'fp-test-tag',
	'label'    => __( 'Testimonial - Name', 'simpleshift-companion' ),
	'section'  => 'fp-test',
	'type'     => 'text',
	'priority' => 10,
	'default'  => '',
	'description'   => __( 'This is the name under the testimonial section. Leave blank to hide.', 'simpleshift-companion' ),
) );

Kirki::add_field( 'simpleshift-config', array(
	'settings' => 'fp-test-tag-url',
	'label'    => __( 'Testimonial - Website Link', 'simpleshift-companion' ),
	'section'  => 'fp-test',
	'type'     => 'text',
	'priority' => 10,
	'default'  => '',
	'description'   => __( 'This is the link applied to the name above.', 'simpleshift-companion' ),
	'sanitize_callback' => 'simpleshift_companion_sanitize_url'
) );

Kirki::add_field( 'simpleshift-config', array(
	'settings' => 'fp-test-slug',
	'label'    => __( 'Navigation Menu ID', 'simpleshift-companion' ),
	'section'  => 'fp-test',
	'type'     => 'text',
	'priority' => 10,
	'default'  => 'test',
	'description'   => __( 'The frontpage section IDs (what shows up in the hover state and the address bar when clicked) have already been set to a default show in this field. If you would like to change the ID so that a different term comes up in the slug for that section (ie. http://example.com/#top instead of /#home), then change the term below for the corresponding section. You will also want to add the custom menu items in the Menus section of your dashboard (click "Links," then add the entire URL, such as http://example.com/#top). IMPORTANT: You must also add this term to the title field in the menu editor. If you do not see this field you may have to activate it by selecting the Screen Options tab in the top right of the page and then checking the Title Attribute box.', 'simpleshift-companion' ),
) );

// Action Row 2

Kirki::add_section( 'fp-action2', array(
    'title'          => __( 'Frontpage Action Row #2', 'simpleshift-companion' ),
    'description'    => '',
    'panel'          => '', 
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'simpleshift-config', array(
	'type'        => 'custom',
	'settings'    => 'action2-upsell-note',
	'label'       => 'Additional Features',
	'section'     => 'fp-action2',
	'default'     => $upsell,
	'priority'    => 100,
) );

Kirki::add_field( 'simpleshift-config', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'fp-action2-toggle',
	'label'       => __( 'Frontpage Action Row #2 Status', 'simpleshift-companion' ),
	'section'     => 'fp-action2',
	'default'     => '2',
	'priority'    => 1,
	'choices'     => array(
		'1'   => esc_attr__( 'Show', 'simpleshift-companion' ),
		'2' => esc_attr__( 'Demo', 'simpleshift-companion' ),
		'3'  => esc_attr__( 'Hide', 'simpleshift-companion' ),
	),
) );
            
Kirki::add_field( 'simpleshift-config', array(
	'settings' => 'fp-action2-title',
	'label'    => __( 'Action Row #2 - Main Title', 'simpleshift-companion' ),
	'section'  => 'fp-action2',
	'type'     => 'text',
	'priority' => 10,
	'default'  => '',
	'description'   => __( 'This is the big text in the Action Row #2 section. Leave blank to hide.', 'simpleshift-companion' ),
) );

Kirki::add_field( 'simpleshift-config', array(
	'settings' => 'fp-action2-button-text',
	'label'    => __( 'Action Row #2 - Button Text', 'simpleshift-companion' ),
	'section'  => 'fp-action2',
	'type'     => 'text',
	'priority' => 10,
	'default'  => '',
	'description'   => __( 'This is the text in the button. Leave blank to hide.', 'simpleshift-companion' ),
) );

Kirki::add_field( 'simpleshift-config', array(
	'settings' => 'fp-action2-button-url',
	'label'    => __( 'Action Row #2 - Button URL', 'simpleshift-companion' ),
	'section'  => 'fp-action2',
	'type'     => 'text',
	'priority' => 10,
	'default'  => '',
	'description'   => __( 'This is link destination for the button. Leave blank to hide.', 'simpleshift-companion' ),
	'sanitize_callback' => 'simpleshift_companion_sanitize_url'
) );

Kirki::add_field( 'simpleshift-config', array(
	'settings' => 'fp-action2-slug',
	'label'    => __( 'Navigation Menu ID', 'simpleshift-companion' ),
	'section'  => 'fp-action2',
	'type'     => 'text',
	'priority' => 10,
	'default'  => 'action2',
	'description'   => __( 'The frontpage section IDs (what shows up in the hover state and the address bar when clicked) have already been set to a default show in this field. If you would like to change the ID so that a different term comes up in the slug for that section (ie. http://example.com/#top instead of /#home), then change the term below for the corresponding section. You will also want to add the custom menu items in the Menus section of your dashboard (click "Links," then add the entire URL, such as http://example.com/#top). IMPORTANT: You must also add this term to the title field in the menu editor. If you do not see this field you may have to activate it by selecting the Screen Options tab in the top right of the page and then checking the Title Attribute box.', 'simpleshift-companion' ),
) );

// Team Section

Kirki::add_section( 'fp-team', array(
    'title'          => __( 'Frontpage Team Section', 'simpleshift-companion' ),
    'description'    => '',
    'panel'          => '', 
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'simpleshift-config', array(
	'type'        => 'custom',
	'settings'    => 'team-upsell-note',
	'label'       => 'Additional Features',
	'section'     => 'fp-team',
	'default'     => $upsell,
	'priority'    => 100,
) );

Kirki::add_field( 'simpleshift-config', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'fp-team-toggle',
	'label'       => __( 'Team Status', 'simpleshift-companion' ),
	'section'     => 'fp-team',
	'default'     => '2',
	'priority'    => 1,
	'choices'     => array(
		'1'   => esc_attr__( 'Show', 'simpleshift-companion' ),
		'2' => esc_attr__( 'Demo', 'simpleshift-companion' ),
		'3'  => esc_attr__( 'Hide', 'simpleshift-companion' ),
	),
) );
            
Kirki::add_field( 'simpleshift-config', array(
	'settings' => 'fp-team-title',
	'label'    => __( 'Team - Main Title', 'simpleshift-companion' ),
	'section'  => 'fp-team',
	'type'     => 'text',
	'priority' => 10,
	'default'  => '',
	'description'   => __( 'This is the big text in the team section. Leave blank to hide.', 'simpleshift-companion' ),
) );

Kirki::add_field( 'simpleshift-config', array(
	'settings' => 'fp-team-sub-title',
	'label'    => __( 'Team - Sub Title', 'simpleshift-companion' ),
	'section'  => 'fp-team',
	'type'     => 'text',
	'priority' => 10,
	'default'  => '',
	'description'   => __( 'This is the smaller text in the team section. Leave blank to hide.', 'simpleshift-companion' ),
) );

Kirki::add_field( 'simpleshift-config', array(
	'type'        => 'custom',
	'settings'    => 'team-widget-note',
	'label'       => 'Populate Team Content',
	'section'     => 'fp-team',
	'default'     => __( 'To populate the Team content section, you will need to add About content widgets to the Frontpage Team widget areas. Go to the Widgets section under Apperance in the left sidebar.', 'simpleshift-companion' ),
	'priority'    => 10,
) );

Kirki::add_field( 'simpleshift-config', array(
	'settings' => 'fp-team-slug',
	'label'    => __( 'Navigation Menu ID', 'simpleshift-companion' ),
	'section'  => 'fp-team',
	'type'     => 'text',
	'priority' => 10,
	'default'  => 'team',
	'description'   => __( 'The frontpage section IDs (what shows up in the hover state and the address bar when clicked) have already been set to a default show in this field. If you would like to change the ID so that a different term comes up in the slug for that section (ie. http://example.com/#top instead of /#home), then change the term below for the corresponding section. You will also want to add the custom menu items in the Menus section of your dashboard (click "Links," then add the entire URL, such as http://example.com/#top). IMPORTANT: You must also add this term to the title field in the menu editor. If you do not see this field you may have to activate it by selecting the Screen Options tab in the top right of the page and then checking the Title Attribute box.', 'simpleshift-companion' ),
) );

// Social Media

Kirki::add_section( 'fp-social', array(
    'title'          => __( 'Frontpage Social Media Section', 'simpleshift-companion' ),
    'description'    => '',
    'panel'          => '', 
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'simpleshift-config', array(
	'type'        => 'custom',
	'settings'    => 'social-upsell-note',
	'label'       => 'Additional Features',
	'section'     => 'fp-social',
	'default'     => $upsell,
	'priority'    => 100,
) );

Kirki::add_field( 'simpleshift-config', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'fp-social-toggle',
	'label'       => __( 'Social Status', 'simpleshift-companion' ),
	'section'     => 'fp-social',
	'default'     => '2',
	'priority'    => 1,
	'choices'     => array(
		'1'   => esc_attr__( 'Show', 'simpleshift-companion' ),
		'2' => esc_attr__( 'Demo', 'simpleshift-companion' ),
		'3'  => esc_attr__( 'Hide', 'simpleshift-companion' ),
	),
) );

Kirki::add_field( 'simpleshift-config', array(
	'type'        => 'custom',
	'settings'    => 'social-widget-note',
	'label'       => __( 'Populate Social Meida Section Content', 'simpleshift-companion' ),
	'section'     => 'fp-social',
	'default'     => __( 'To populate the Social Media section, you will need to add Social Meida widgets to the Social Media widget areas.  Go to the Widgets section under Apperance in the left sidebar.', 'simpleshift-companion' ),
	'priority'    => 10,
) );

Kirki::add_field( 'simpleshift-config', array(
	'settings' => 'fp-social-slug',
	'label'    => __( 'Navigation Menu ID', 'simpleshift-companion' ),
	'section'  => 'fp-social',
	'type'     => 'text',
	'priority' => 10,
	'default'  => 'social',
	'description'   => __( 'The frontpage section IDs (what shows up in the hover state and the address bar when clicked) have already been set to a default show in this field. If you would like to change the ID so that a different term comes up in the slug for that section (ie. http://example.com/#top instead of /#home), then change the term below for the corresponding section. You will also want to add the custom menu items in the Menus section of your dashboard (click "Links," then add the entire URL, such as http://example.com/#top). IMPORTANT: You must also add this term to the title field in the menu editor. If you do not see this field you may have to activate it by selecting the Screen Options tab in the top right of the page and then checking the Title Attribute box.', 'simpleshift-companion' ),
) );

// News

Kirki::add_section( 'fp-news', array(
    'title'          => __( 'Frontpage Page News/Content Section', 'simpleshift-companion' ),
    'description'    => '',
    'panel'          => '', 
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'simpleshift-config', array(
	'type'        => 'custom',
	'settings'    => 'news-upsell-note',
	'label'       => 'Additional Features',
	'section'     => 'fp-news',
	'default'     => $upsell,
	'priority'    => 100,
) );

Kirki::add_field( 'simpleshift-config', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'fp-news-toggle',
	'label'       => __( 'Content Row Status', 'simpleshift-companion' ),
	'section'     => 'fp-news',
	'default'     => '2',
	'priority'    => 1,
	'choices'     => array(
		'1'   => esc_attr__( 'Show', 'simpleshift-companion' ),
		'2'  => esc_attr__( 'Hide', 'simpleshift-companion' ),
	),
) );

Kirki::add_field( 'simpleshift-config', array(
	'type'        => 'custom',
	'settings'    => 'news-note',
	'label'       => __( 'About News Section', 'simpleshift-companion' ),
	'section'     => 'fp-news',
	'default'     => __( 'You can use this section as either a feed that displays your latest blog posts (the # of posts specified in Settings > Reading > #2), or a page. If you want the Blog to be a separate page completely go to Settings > Reading and make sure Frontpage displays... A static page... and select the HOME page (and create a HOME page if you have not already). Then, create a BLOG page and set the BLOG page as the Posts page option in Settings > Reading. If you do not want the blog to be displayed separately, then set Frontpage displays... Your latest posts.', 'simpleshift-companion' ),
	'priority'    => 10,
) );
            
Kirki::add_field( 'simpleshift-config', array(
	'settings' => 'fp-news-title',
	'label'    => __( 'Content - Main Title', 'simpleshift-companion' ),
	'section'  => 'fp-news',
	'type'     => 'text',
	'priority' => 10,
	'default'  => '',
	'description'   => __( 'This is the big text in the news section. Leave blank to hide.', 'simpleshift-companion' ),
) );

Kirki::add_field( 'simpleshift-config', array(
	'settings' => 'fp-news-sub-title',
	'label'    => __( 'Content - Sub Title', 'simpleshift-companion' ),
	'section'  => 'fp-news',
	'type'     => 'text',
	'priority' => 10,
	'default'  => '',
	'description'   => __( 'This is the smaller text in the news section. Leave blank to hide.', 'simpleshift-companion' ),
) );

Kirki::add_field( 'simpleshift-config', array(
	'settings' => 'fp-news-slug',
	'label'    => __( 'Navigation Menu ID', 'simpleshift-companion' ),
	'section'  => 'fp-news',
	'type'     => 'text',
	'priority' => 10,
	'default'  => 'news',
	'description'   => __( 'The frontpage section IDs (what shows up in the hover state and the address bar when clicked) have already been set to a default show in this field. If you would like to change the ID so that a different term comes up in the slug for that section (ie. http://example.com/#top instead of /#home), then change the term below for the corresponding section. You will also want to add the custom menu items in the Menus section of your dashboard (click "Links," then add the entire URL, such as http://example.com/#top). IMPORTANT: You must also add this term to the title field in the menu editor. If you do not see this field you may have to activate it by selecting the Screen Options tab in the top right of the page and then checking the Title Attribute box.', 'simpleshift-companion' ),
) );


// #################################################
// Some Custom Sanitize Functions
// #################################################

function simpleshift_companion_sanitize_url( $value ) {
    $value=esc_url_raw( $value );
    return $value;
}

function simpleshift_companion_sanitize_email( $value ) {
    $value=sanitize_email( $value );
    return $value;
}