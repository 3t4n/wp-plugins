<?php
/**
 * Custom option and settings
 */
if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}
function coneblog_settings_init() {
    // Register settings for "Page Builders" section
    register_setting(
        'coneblog',
        'coneblog_builders_elementor',
        array(
            'default' => 'on',
            'sanitize_callback' => 'sanitize_text_field',
            'type' => 'string'
        )
    );

    // Register settings for "Widgets" Section
    $widget_settings = array(
        'coneblog_widgets_posts_grid',
        'coneblog_widgets_posts_list',
        'coneblog_widgets_posts_carousel',
        'coneblog_widgets_category_tiles',
        'coneblog_widgets_posts_classic',
        'coneblog_widgets_posts_slider',
        'coneblog_widgets_author_box',
        'coneblog_widgets_news_ticker'
    );

    foreach ($widget_settings as $setting) {
        register_setting(
            'cb-widgets',
            $setting,
            array(
                'default' => 'on',
                'sanitize_callback' => 'sanitize_text_field',
                'type' => 'string'
            )
        );
    }

    // Register settings for "Tools" page
    register_setting(
        'cb-tools',
        'coneblog_tools_social_sharing',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'type' => 'string'
        )
    );

    // Style setting (minimal, boxed, rounded, floating)
    register_setting(
        'cb-tools',
        'coneblog_tools_social_sharing_style',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'type' => 'string'
        )
    );

    // Position settings
    $position_settings = array(
        'coneblog_tools_social_sharing_position',
        'coneblog_tools_social_sharing_desktop_position',
        'coneblog_tools_social_sharing_mobile_position',
        'coneblog_tools_social_sharing_content_position'
    );

    foreach ($position_settings as $setting) {
        register_setting(
            'cb-tools',
            $setting,
            array(
                'sanitize_callback' => 'sanitize_text_field',
                'type' => 'string'
            )
        );
    }

    // Social media sharing options
    $social_options = array(
        'coneblog_tools_social_sharing_facebook',
        'coneblog_tools_social_sharing_twitter',
        'coneblog_tools_social_sharing_whatsapp',
        'coneblog_tools_social_sharing_linkedin',
        'coneblog_tools_social_sharing_reddit',
        'coneblog_tools_social_sharing_pinterest',
        'coneblog_tools_social_sharing_mail'
    );

    foreach ($social_options as $option) {
        register_setting(
            'cb-tools',
            $option,
            array(
                'sanitize_callback' => 'sanitize_text_field',
                'type' => 'string'
            )
        );
    }

    // Page Builders Section
    add_settings_section(
        'coneblog_section_builders',
        __( 'Page Builders.', 'coneblog-widgets' ),
        'coneblog_section_builders_callback',
        'coneblog'
    );

    // Widgets Section
    add_settings_section(
        'coneblog_section_widgets',
        __( 'Widgets.', 'coneblog-widgets' ),
        'coneblog_section_widgets_callback',
        'cb-widgets'
    );

    // Tools Section
    add_settings_section(
        'coneblog_section_tools',
        __( 'Tools.', 'coneblog-widgets' ),
        'coneblog_section_tools_callback',
        'cb-tools'
    );

    // Register all settings fields
    coneblog_register_settings_fields();
}

/**
 * Register all settings fields
 */
function coneblog_register_settings_fields() {
    // Elementor
    add_settings_field(
        'coneblog_builders_elementor',
        'Elementor',
        'coneblog_builders_elementor_field_cb',
        'coneblog',
        'coneblog_section_builders'
    );

    // Widget fields
    $widget_fields = array(
        'coneblog_widgets_posts_grid' => 'Posts Grid',
        'coneblog_widgets_posts_list' => 'Posts List',
        'coneblog_widgets_posts_carousel' => 'Carousel',
        'coneblog_widgets_posts_classic' => 'Classic Block',
        'coneblog_widgets_category_tiles' => 'Categories',
        'coneblog_widgets_posts_slider' => 'Slider',
        'coneblog_widgets_author_box' => 'Author Box',
        'coneblog_widgets_news_ticker' => 'News Ticker'
    );

    foreach ($widget_fields as $id => $label) {
        add_settings_field(
            $id,
            $label,
            $id . '_field_cb',
            'cb-widgets',
            'coneblog_section_widgets'
        );
    }

    // Tools fields
    $tools_fields = array(
        'coneblog_tools_social_sharing' => 'Social Sharing',
        'coneblog_tools_social_sharing_style' => 'Style',
        'coneblog_tools_social_sharing_position' => 'Position',
        'coneblog_tools_social_sharing_desktop_position' => 'Desktop Position',
        'coneblog_tools_social_sharing_mobile_position' => 'Mobile Position',
        'coneblog_tools_social_sharing_content_position' => 'Content Position',
        'coneblog_tools_social_sharing_facebook' => 'Facebook',
        'coneblog_tools_social_sharing_twitter' => 'Twitter',
        'coneblog_tools_social_sharing_whatsapp' => 'WhatsApp',
        'coneblog_tools_social_sharing_linkedin' => 'LinkedIn',
        'coneblog_tools_social_sharing_reddit' => 'Reddit',
        'coneblog_tools_social_sharing_pinterest' => 'Pinterest',
        'coneblog_tools_social_sharing_mail' => 'Email'
    );

    foreach ($tools_fields as $id => $label) {
        add_settings_field(
            $id,
            $label,
            $id . '_field_cb',
            'cb-tools',
            'coneblog_section_tools'
        );
    }
}

/**
 * Section Callback Functions
 */
function coneblog_section_builders_callback( $args ) {
    return;
}
function coneblog_section_widgets_callback( $args ) {
    return;
}
function coneblog_section_tools_callback( $args ) {
    return;
}

add_action('admin_init', 'coneblog_settings_init');