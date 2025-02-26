<?php
// Prevent direct file access.
if (!defined('ABSPATH')) {
    die();
}
/**
 * Customizer settings
 *
 * Here are the customizer setting that are defined by the plugin.
 *
 * @package    Absc
 * @subpackage Absc/includes
 * @author     ArchimidisM <info@archimidismertzanos.me>
 */

function absc_customizer_styles($wp_customize)
{
    $prefix = 'absc_';
    /*
     * Create the panel
     */
    $wp_customize->add_panel($prefix . 'styling_panel', array(
        'priority' => 4,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__('Atlast Business Styling', 'absc'),
        'description' => esc_html__('Change all the colors in this theme.', 'atlast-business'),
    ));
    $wp_customize->add_section($prefix . 'home_styles', array(
        'priority' => 4,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__('Home Styles', 'absc'),
        'description' => esc_html__('Styling of the home sections when using the home builder', 'absc'),
        'panel' => $prefix . 'styling_panel',
    ));
    $wp_customize->add_section($prefix . 'top_bar_styles', array(
        'priority' => 5,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__('Top Bar Styles', 'absc'),
        'description' => esc_html__('The colors of the top bar section.', 'absc'),
        'panel' => $prefix . 'styling_panel',
    ));

    $wp_customize->add_section($prefix . 'header_styles', array(
        'priority' => 6,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__('Header Styles', 'absc'),
        'description' => esc_html__('The colors header section ,containing the navigation as well.', 'absc'),
        'panel' => $prefix . 'styling_panel',
    ));

    $wp_customize->add_section($prefix . 'header_image_styles', array(
        'priority' => 7,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__('Header Image', 'absc'),
        'description' => esc_html__('The colors of the text and buttons in the header image.', 'absc'),
        'panel' => $prefix . 'styling_panel',
    ));

    $wp_customize->add_section($prefix . 'single_postpage_styles', array(
        'priority' => 8,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__('Page/Posts/Archive Styles', 'absc'),
        'description' => esc_html__('The styling of the single posts/pages/archives', 'absc'),
        'panel' => $prefix . 'styling_panel',
    ));

    $wp_customize->add_section($prefix . 'default_button_styles', array(
        'priority' => 9,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__('Default button styles', 'absc'),
        'description' => esc_html__('The styling of the default buttons', 'absc'),
        'panel' => $prefix . 'styling_panel',
    ));
    $wp_customize->add_section($prefix . 'sidebar_styles', array(
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__('Sidebar Styles', 'absc'),
        'description' => esc_html__('The sidebar area styles', 'absc'),
        'panel' => $prefix . 'styling_panel',
    ));
    $wp_customize->add_section($prefix . 'footer_sidebar_styles', array(
        'priority' => 11,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__('Footer Sidebar Styles', 'absc'),
        'description' => esc_html__('The footer sidebar styles.', 'absc'),
        'panel' => $prefix . 'styling_panel',
    ));
    $wp_customize->add_section($prefix . 'copyright_styles', array(
        'priority' => 12,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__('Copyright Styles', 'absc'),
        'description' => esc_html__('The copyright are styles.', 'absc'),
        'panel' => $prefix . 'styling_panel',
    ));


    /*
     * TOP_BAR_STYLES
     */
    $wp_customize->add_setting($prefix . 'top_bar_bg_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting($prefix . 'top_bar_txt_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting($prefix . 'top_bar_links_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting($prefix . 'top_bar_links_hover_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'top_bar_bg_color',
            array(
                'label' => esc_html__('Top Bar background color.', 'absc'),
                'section' => $prefix . 'top_bar_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'top_bar_txt_color',
            array(
                'label' => esc_html__('Top Bar text color.', 'absc'),
                'description' => esc_html__('Just the text , not the links color', 'absc'),
                'section' => $prefix . 'top_bar_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'top_bar_links_color',
            array(
                'label' => esc_html__('Top Bar links color.', 'absc'),
                'section' => $prefix . 'top_bar_styles', // Add a default or your own section
            )));
    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'top_bar_links_hover_color',
            array(
                'label' => esc_html__('Top Bar links hover color.', 'absc'),
                'section' => $prefix . 'top_bar_styles', // Add a default or your own section
            )));


    /*
    * HEADER_STYLES
    */

    $wp_customize->add_setting($prefix . 'header_bg_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));


    $wp_customize->add_setting($prefix . 'header_title_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting($prefix . 'header_title_hover_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'

    ));

    $wp_customize->add_setting($prefix . 'header_tagline_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting($prefix . 'header_menu_item_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting($prefix . 'header_menu_item_hover_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_setting($prefix . 'header_menu_current_item_border', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting($prefix . 'header_menu_submenu_bg_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting($prefix . 'header_menu_submenu_link_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting($prefix . 'header_menu_submenu_link_hover_bg_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_setting($prefix . 'header_menu_submenu_link_hover_txt_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'header_bg_color',
            array(
                'label' => esc_html__('Header background color.', 'absc'),
                'section' => $prefix . 'header_styles', // Add a default or your own section
            )));


    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'header_title_color',
            array(
                'label' => esc_html__('Header title color.', 'absc'),
                'description' => esc_html__('When not using the Logo option.', 'absc'),
                'section' => $prefix . 'header_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'header_title_hover_color',
            array(
                'label' => esc_html__('Header title hover color.', 'absc'),
                'description' => esc_html__('When not using the Logo option.', 'absc'),
                'section' => $prefix . 'header_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'header_tagline_color',
            array(
                'label' => esc_html__('Header tagline (below title) color.', 'absc'),
                'description' => esc_html__('When not using the Logo option.', 'absc'),
                'section' => $prefix . 'header_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'header_menu_item_color',
            array(
                'label' => esc_html__('Header menu link color.', 'absc'),
                'description' => esc_html__('This option applies to social icons as well.', 'absc'),
                'section' => $prefix . 'header_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'header_menu_item_hover_color',
            array(
                'label' => esc_html__('Header menu link hover color.', 'absc'),
                'description' => esc_html__('This option applies to social icons as well.', 'absc'),
                'section' => $prefix . 'header_styles', // Add a default or your own section
            )));


    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'header_menu_current_item_border',
            array(
                'label' => esc_html__('Current menu item border color.', 'absc'),
                'section' => $prefix . 'header_styles', // Add a default or your own section
            )));


    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'header_menu_submenu_bg_color',
            array(
                'label' => esc_html__('Header submenu background color.', 'absc'),
                'section' => $prefix . 'header_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'header_menu_submenu_link_color',
            array(
                'label' => esc_html__('Header submenu link color.', 'absc'),
                'section' => $prefix . 'header_styles', // Add a default or your own section
            )));


    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'header_menu_submenu_link_hover_bg_color',
            array(
                'label' => esc_html__('Submenu link background color on hover.', 'absc'),
                'section' => $prefix . 'header_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'header_menu_submenu_link_hover_txt_color',
            array(
                'label' => esc_html__('Submenu link text color on hover.', 'absc'),
                'section' => $prefix . 'header_styles', // Add a default or your own section
            )));


    //HEADER_IMAGE_STYLES

    $wp_customize->add_setting($prefix . 'header_txt_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting($prefix . 'header_button_bg_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting($prefix . 'header_button_bg_hover_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',

    ));

    $wp_customize->add_setting($prefix . 'header_button_txt_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting($prefix . 'header_button_txt_hover_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',

    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'header_txt_color',
            array(
                'label' => esc_html__('The text color of the header image.', 'absc'),
                'section' => $prefix . 'header_image_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'header_button_bg_color',
            array(
                'label' => esc_html__('The background color of the buttons on the header image.', 'absc'),
                'section' => $prefix . 'header_image_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'header_button_bg_hover_color',
            array(
                'label' => esc_html__('The hover state of the background color of the buttons on the header image.', 'absc'),
                'section' => $prefix . 'header_image_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'header_button_txt_color',
            array(
                'label' => esc_html__('The color of the text on the button.', 'absc'),
                'section' => $prefix . 'header_image_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'header_button_txt_hover_color',
            array(
                'label' => esc_html__('The hover color of the text on the button.', 'absc'),
                'section' => $prefix . 'header_image_styles', // Add a default or your own section
            )));

    // HOME_STYLES

    $wp_customize->add_setting($prefix . 'home_about_bg_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting($prefix . 'home_about_title_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));


    $wp_customize->add_setting($prefix . 'home_about_subtitle_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting($prefix . 'home_about_title_border_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_setting($prefix . 'home_about_txt_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    // SERVICES SECTION

    $wp_customize->add_setting($prefix . 'home_services_bg_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting($prefix . 'home_services_title_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));


    $wp_customize->add_setting($prefix . 'home_services_subtitle_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting($prefix . 'home_services_title_border_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ));


    $wp_customize->add_setting($prefix . 'home_services_icon_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting($prefix . 'home_services_border_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    // LATEST PROJECTS

    $wp_customize->add_setting($prefix . 'home_projects_bg_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting($prefix . 'home_projects_title_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));


    $wp_customize->add_setting($prefix . 'home_projects_subtitle_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting($prefix . 'home_projects_title_border_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_setting($prefix . 'home_projects_prj_title_link_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting($prefix . 'home_projects_prj_title_link_hover_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    //LATEST GALLERIES

    $wp_customize->add_setting($prefix . 'home_gallery_bg_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting($prefix . 'home_gallery_title_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));


    $wp_customize->add_setting($prefix . 'home_gallery_subtitle_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting($prefix . 'home_gallery_title_border_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    // TEAM SECTION

    $wp_customize->add_setting($prefix . 'home_team_bg_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting($prefix . 'home_team_title_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));


    $wp_customize->add_setting($prefix . 'home_team_subtitle_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting($prefix . 'home_team_title_border_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_setting($prefix . 'home_team_member_link_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting($prefix . 'home_team_member_link_hover_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ));


    $wp_customize->add_setting($prefix . 'home_team_job_title_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    // TESTIMONIALS SECTION
    $wp_customize->add_setting($prefix . 'home_testimonials_bg_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_setting($prefix . 'home_testimonials_title_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_setting($prefix . 'home_testimonials_subtitle_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_setting($prefix . 'home_testimonials_title_border_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_setting($prefix . 'home_testimonials_single_bg_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting($prefix . 'home_testimonials_single_text_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting($prefix . 'home_testimonials_single_name_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_setting($prefix . 'home_testimonials_single_name_hover_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    // LATEST BLOG

    $wp_customize->add_setting($prefix . 'home_blog_bg_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting($prefix . 'home_blog_title_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));


    $wp_customize->add_setting($prefix . 'home_blog_subtitle_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting($prefix . 'home_blog_title_border_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_setting($prefix . 'home_blog_item_meta_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting($prefix . 'home_blog_item_title_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting($prefix . 'home_blog_item_icon_hover_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'home_about_bg_color',
            array(
                'label' => esc_html__('The background color of the "About section".', 'absc'),
                'section' => $prefix . 'home_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'home_about_title_color',
            array(
                'label' => esc_html__('The title color of the "About section".', 'absc'),
                'section' => $prefix . 'home_styles', // Add a default or your own section
            )));


    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'home_about_subtitle_color',
            array(
                'label' => esc_html__('The subtitle color of the "About section".', 'absc'),
                'section' => $prefix . 'home_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'home_about_title_border_color',
            array(
                'label' => esc_html__('The color of the title borders in the "About section".', 'absc'),
                'section' => $prefix . 'home_styles', // Add a default or your own section
            )));


    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'home_about_txt_color',
            array(
                'label' => esc_html__('The body color of the "About section".', 'absc'),
                'section' => $prefix . 'home_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'home_services_bg_color',
            array(
                'label' => esc_html__('The background color of the "Services section".', 'absc'),
                'section' => $prefix . 'home_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'home_services_title_color',
            array(
                'label' => esc_html__('The title color of the "Services section".', 'absc'),
                'section' => $prefix . 'home_styles', // Add a default or your own section
            )));


    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'home_services_subtitle_color',
            array(
                'label' => esc_html__('The subtitle color of the "Services section".', 'absc'),
                'section' => $prefix . 'home_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'home_services_title_border_color',
            array(
                'label' => esc_html__('The color of the title borders in the "Services section".', 'absc'),
                'section' => $prefix . 'home_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'home_services_icon_color',
            array(
                'label' => esc_html__('The icon color in the "Services section".', 'absc'),
                'section' => $prefix . 'home_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'home_services_border_color',
            array(
                'label' => esc_html__('The border color in the "Services section" in hover state.', 'absc'),
                'section' => $prefix . 'home_styles', // Add a default or your own section
            )));

    //PROJECTS SECTION

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'home_projects_bg_color',
            array(
                'label' => esc_html__('The background color of the "Latest projects" section.', 'absc'),
                'section' => $prefix . 'home_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'home_projects_title_color',
            array(
                'label' => esc_html__('The title color of the "Projects section".', 'absc'),
                'section' => $prefix . 'home_styles', // Add a default or your own section
            )));


    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'home_projects_subtitle_color',
            array(
                'label' => esc_html__('The subtitle color of the "Projects section".', 'absc'),
                'section' => $prefix . 'home_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'home_projects_title_border_color',
            array(
                'label' => esc_html__('The color of the title borders in the "Projects section".', 'absc'),
                'section' => $prefix . 'home_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'home_projects_prj_title_link_color',
            array(
                'label' => esc_html__('The color of project name link in "Projects section"', 'absc'),
                'section' => $prefix . 'home_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'home_projects_prj_title_link_hover_color',
            array(
                'label' => esc_html__('The hover color of project name link in "Projects section"', 'absc'),
                'section' => $prefix . 'home_styles', // Add a default or your own section
            )));

    // GALLERY SECTION

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'home_gallery_bg_color',
            array(
                'label' => esc_html__('The background color of the "Latest gallery" section.', 'absc'),
                'section' => $prefix . 'home_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'home_gallery_title_color',
            array(
                'label' => esc_html__('The title color of the "Latest gallery".', 'absc'),
                'section' => $prefix . 'home_styles', // Add a default or your own section
            )));


    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'home_gallery_subtitle_color',
            array(
                'label' => esc_html__('The subtitle color of the "Latest gallery".', 'absc'),
                'section' => $prefix . 'home_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'home_gallery_title_border_color',
            array(
                'label' => esc_html__('The color of the title borders in the "Latest gallery".', 'absc'),
                'section' => $prefix . 'home_styles', // Add a default or your own section
            )));

    // TEAM SECTION

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'home_team_bg_color',
            array(
                'label' => esc_html__('The background color of the "Team" section.', 'absc'),
                'section' => $prefix . 'home_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'home_team_title_color',
            array(
                'label' => esc_html__('The title color of the "Team" section.', 'absc'),
                'section' => $prefix . 'home_styles', // Add a default or your own section
            )));


    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'home_team_subtitle_color',
            array(
                'label' => esc_html__('The subtitle color of the "Team" section.', 'absc'),
                'section' => $prefix . 'home_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'home_team_title_border_color',
            array(
                'label' => esc_html__('The color of the title borders in the "Team" section.', 'absc'),
                'section' => $prefix . 'home_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'home_team_member_link_color',
            array(
                'label' => esc_html__('The link color of the name of the team member in "Team" section.', 'absc'),
                'section' => $prefix . 'home_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'home_team_member_link_hover_color',
            array(
                'label' => esc_html__('The link hover color of the name of the team member in "Team" section.', 'absc'),
                'section' => $prefix . 'home_styles', // Add a default or your own section
            )));


    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'home_team_job_title_color',
            array(
                'label' => esc_html__('The color of the job title in the "Team section"', 'absc'),
                'section' => $prefix . 'home_styles', // Add a default or your own section
            )));

    // TESTIMONIALS
    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'home_testimonials_bg_color',
            array(
                'label' => esc_html__('The background color of the "Testimonials" section.', 'absc'),
                'section' => $prefix . 'home_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'home_testimonials_title_color',
            array(
                'label' => esc_html__('The title color of the "Testimonials" section.', 'absc'),
                'section' => $prefix . 'home_styles', // Add a default or your own section
            )));


    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'home_testimonials_subtitle_color',
            array(
                'label' => esc_html__('The subtitle color of the "Testimonials" section.', 'absc'),
                'section' => $prefix . 'home_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'home_testimonials_title_border_color',
            array(
                'label' => esc_html__('The color of the title borders in the "Testimonials" section.', 'absc'),
                'section' => $prefix . 'home_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'home_testimonials_single_bg_color',
            array(
                'label' => esc_html__('The background color of a single testimonial', 'absc'),
                'section' => $prefix . 'home_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'home_testimonials_single_text_color',
            array(
                'label' => esc_html__('The text color of a single testimonial', 'absc'),
                'section' => $prefix . 'home_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'home_testimonials_single_name_color',
            array(
                'label' => esc_html__('The color of the name in a single testimonial', 'absc'),
                'section' => $prefix . 'home_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'home_testimonials_single_name_hover_color',
            array(
                'label' => esc_html__('The hover state color of the name in a single testimonial', 'absc'),
                'section' => $prefix . 'home_styles', // Add a default or your own section
            )));
    // LATEST BLOG

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'home_blog_bg_color',
            array(
                'label' => esc_html__('The background color of the "Latest Posts" section.', 'absc'),
                'section' => $prefix . 'home_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'home_blog_title_color',
            array(
                'label' => esc_html__('The title color of the "Latest Posts" section.', 'absc'),
                'section' => $prefix . 'home_styles', // Add a default or your own section
            )));


    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'home_blog_subtitle_color',
            array(
                'label' => esc_html__('The subtitle color of the "Latest Posts" section.', 'absc'),
                'section' => $prefix . 'home_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'home_blog_title_border_color',
            array(
                'label' => esc_html__('The color of the title borders in the "Latest Posts" section.', 'absc'),
                'section' => $prefix . 'home_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'home_blog_item_meta_color',
            array(
                'label' => esc_html__('The color of the meta items (date) of a post in the "Latest Posts" section.', 'absc'),
                'section' => $prefix . 'home_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'home_blog_item_title_color',
            array(
                'label' => esc_html__('The color of the title of a post in the "Latest Posts" section.', 'absc'),
                'section' => $prefix . 'home_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'home_blog_item_icon_hover_color',
            array(
                'label' => esc_html__('The hover color of the link icon in the "Latest Posts" section.', 'absc'),
                'section' => $prefix . 'home_styles', // Add a default or your own section
            )));

    // SINGLE POSTS/PAGES

    $wp_customize->add_setting($prefix . 'single_postpage_major_bg_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting($prefix . 'single_postpage_major_txt_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting($prefix . 'single_postpage_breadcrump_bg_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting($prefix . 'single_postpage_breadcrump_link_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));


    $wp_customize->add_setting($prefix . 'single_postpage_breadcrump_txt_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting($prefix . 'single_postpage_headings_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting($prefix . 'single_postpage_body_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting($prefix . 'single_postpage_link_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_setting($prefix . 'single_postpage_link_hover_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'single_postpage_major_bg_color',
            array(
                'label' => esc_html__('The background color of the major title section inside a single post/page/archive page', 'absc'),
                'section' => $prefix . 'single_postpage_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'single_postpage_major_txt_color',
            array(
                'label' => esc_html__('The text color of the major title section inside a single post/page/archive page', 'absc'),
                'section' => $prefix . 'single_postpage_styles', // Add a default or your own section
            )));


    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'single_postpage_breadcrump_bg_color',
            array(
                'label' => esc_html__('The breadcrumb container color', 'absc'),
                'section' => $prefix . 'single_postpage_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'single_postpage_breadcrump_link_color',
            array(
                'label' => esc_html__('The breadcrumb link color', 'absc'),
                'section' => $prefix . 'single_postpage_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'single_postpage_breadcrump_txt_color',
            array(
                'label' => esc_html__('The breadcrumb text color', 'absc'),
                'section' => $prefix . 'single_postpage_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'single_postpage_headings_color',
            array(
                'label' => esc_html__('The headings color inside an article h1-h6.', 'absc'),
                'section' => $prefix . 'single_postpage_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'single_postpage_body_color',
            array(
                'label' => esc_html__('The body color inside an article.', 'absc'),
                'section' => $prefix . 'single_postpage_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'single_postpage_link_color',
            array(
                'label' => esc_html__('The links color inside an article. That applies to all the links.', 'absc'),
                'section' => $prefix . 'single_postpage_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'single_postpage_link_hover_color',
            array(
                'label' => esc_html__('The links hover color inside an article.', 'absc'),
                'section' => $prefix . 'single_postpage_styles', // Add a default or your own section
            )));

    // Default Buttons


    $wp_customize->add_setting($prefix . 'button_txt_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_setting($prefix . 'button_bg_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_setting($prefix . 'button_border_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_setting($prefix . 'button_txt_hover_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_setting($prefix . 'button_bg_hover_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_setting($prefix . 'button_border_hover_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',

    ));

    $wp_customize->add_setting($prefix . 'button_search_bg_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_setting($prefix . 'button_search_txt_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_setting($prefix . 'button_search_border_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_setting($prefix . 'button_search_bg_hover_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_setting($prefix . 'button_search_txt_hover_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_setting($prefix . 'button_search_border_hover_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ));


    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'button_txt_color',
            array(
                'label' => esc_html__('The button text color', 'absc'),
                'section' => $prefix . 'default_button_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'button_bg_color',
            array(
                'label' => esc_html__('The button background color', 'absc'),
                'section' => $prefix . 'default_button_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'button_border_color',
            array(
                'label' => esc_html__('The button border color', 'absc'),
                'section' => $prefix . 'default_button_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'button_txt_hover_color',
            array(
                'label' => esc_html__('The button text hover color', 'absc'),
                'section' => $prefix . 'default_button_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'button_bg_hover_color',
            array(
                'label' => esc_html__('The button background hover color', 'absc'),
                'section' => $prefix . 'default_button_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'button_border_hover_color',
            array(
                'label' => esc_html__('The button border hover color', 'absc'),
                'section' => $prefix . 'default_button_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'button_search_bg_color',
            array(
                'label' => esc_html__('The widget search button background color', 'absc'),
                'section' => $prefix . 'default_button_styles', // Add a default or your own section
            )));
    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'button_search_txt_color',
            array(
                'label' => esc_html__('The widget search button text color', 'absc'),
                'section' => $prefix . 'default_button_styles', // Add a default or your own section
            )));
    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'button_search_border_color',
            array(
                'label' => esc_html__('The widget search button border color', 'absc'),
                'section' => $prefix . 'default_button_styles', // Add a default or your own section
            )));
    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'button_search_bg_hover_color',
            array(
                'label' => esc_html__('The widget search button hover background color', 'absc'),
                'section' => $prefix . 'default_button_styles', // Add a default or your own section
            )));
    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'button_search_txt_hover_color',
            array(
                'label' => esc_html__('The widget search button text hover color', 'absc'),
                'section' => $prefix . 'default_button_styles', // Add a default or your own section
            )));
    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'button_search_border_hover_color',
            array(
                'label' => esc_html__('The widget search button border hover color', 'absc'),
                'section' => $prefix . 'default_button_styles', // Add a default or your own section
            )));

    // Sidebar Widgets

    $wp_customize->add_setting($prefix . 'widget_title_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_setting($prefix . 'widget_txt_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting($prefix . 'widget_link_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting($prefix . 'widget_link_hover_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'widget_title_color',
            array(
                'label' => esc_html__('The widget title color', 'absc'),
                'section' => $prefix . 'sidebar_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'widget_txt_color',
            array(
                'label' => esc_html__('The widget body color / not the links.', 'absc'),
                'section' => $prefix . 'sidebar_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'widget_link_color',
            array(
                'label' => esc_html__('The widget link color.', 'absc'),
                'section' => $prefix . 'sidebar_styles', // Add a default or your own section
            )));
    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'widget_link_hover_color',
            array(
                'label' => esc_html__('The widget link hover color.', 'absc'),
                'section' => $prefix . 'sidebar_styles', // Add a default or your own section
            )));

    // FOOTER SIDEBARS

    $wp_customize->add_setting($prefix . 'footer_area_bg_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_setting($prefix . 'footer_widget_title_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_setting($prefix . 'footer_widget_txt_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting($prefix . 'footer_widget_link_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting($prefix . 'footer_widget_link_hover_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'footer_area_bg_color',
            array(
                'label' => esc_html__('The footer area background bg color.', 'absc'),
                'section' => $prefix . 'footer_sidebar_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'footer_widget_title_color',
            array(
                'label' => esc_html__('The footer area widget\'s title color.', 'absc'),
                'section' => $prefix . 'footer_sidebar_styles', // Add a default or your own section
            )));
    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'footer_widget_txt_color',
            array(
                'label' => esc_html__('The footer area widget\'s body color.', 'absc'),
                'section' => $prefix . 'footer_sidebar_styles', // Add a default or your own section
            )));
    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'footer_widget_link_color',
            array(
                'label' => esc_html__('The footer area widget\'s link color', 'absc'),
                'section' => $prefix . 'footer_sidebar_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'footer_widget_link_hover_color',
            array(
                'label' => esc_html__('The footer area widget\'s link hover color', 'absc'),
                'section' => $prefix . 'footer_sidebar_styles', // Add a default or your own section
            )));

    //COPYRIGHT STYLES
    $wp_customize->add_setting($prefix . 'copyright_bg_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_setting($prefix . 'copyright_txt_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting($prefix . 'copyright_link_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting($prefix . 'copyright_link_hover_color', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'copyright_bg_color',
            array(
                'label' => esc_html__('The copyright area background color.', 'absc'),
                'section' => $prefix . 'copyright_styles', // Add a default or your own section
            )));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'copyright_txt_color',
            array(
                'label' => esc_html__('The copyright area text color.', 'absc'),
                'section' => $prefix . 'copyright_styles', // Add a default or your own section
            )));
    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'copyright_link_color',
            array(
                'label' => esc_html__('The copyright area link color.', 'absc'),
                'section' => $prefix . 'copyright_styles', // Add a default or your own section
            )));
    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,
            $prefix . 'copyright_link_hover_color',
            array(
                'label' => esc_html__('The copyright area link hover color.', 'absc'),
                'section' => $prefix . 'copyright_styles', // Add a default or your own section
            )));
}