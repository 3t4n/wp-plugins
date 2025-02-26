<?php

    /**
     * For full documentation, please visit: http://docs.reduxframework.com/
     * For a more extensive sample-config file, you may look at:
     * https://github.com/reduxframework/redux-framework/blob/master/sample/sample-config.php
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

	// Redux Directory URL
	$ms_redux_dir = plugin_dir_url(__FILE__);

    // This is your option name where all the Redux data is stored.
    $opt_name = "ms_opt";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        'hints' => array(
            'icon_position' => 'right',
            'icon_size' => 'normal',
            'tip_style' => array(
                'color' => 'light',
            ),
            'tip_position' => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect' => array(
                'show' => array(
                    'duration' => '500',
                    'event' => 'mouseover',
                ),
                'hide' => array(
                    'duration' => '500',
                    'event' => 'mouseleave unfocus',
                ),
            ),
        ),
        'admin_bar' => FALSE,
        'allow_sub_menu' => TRUE,
        'cdn_check_time' => '1440',
        'compiler' => TRUE,
        'customizer' => TRUE,
        'database' => 'options',
        'default_mark' => '*',
        'dev_mode' => TRUE, // @todo: Mstoic: Change this to FALSE
        'disable_tracking' => TRUE,
        'display_name' => 'Mstoic Shortcodes Options',
        'display_version' => '4.4.1',
        'forced_dev_mode_off' => true,
        'menu_title' => 'Mstoic Shortcodes',
        'menu_type' => 'submenu',
        'network_sites' => TRUE,
        'opt_name' => 'ms_opt',
        'output' => TRUE,
        'output_tag' => TRUE,
        'page_parent' => 'themes.php',
        'page_parent_post_type' => 'your_post_type',
        'page_permissions' => 'manage_options',
        'page_priority' => 64,
        'page_slug' => 'mstoic_shortcodes_options',
        'page_title' => 'Mstoic Shortcodes Options',
        'save_defaults' => TRUE,
        'settings_api' => TRUE,
        'show_import_export' => FALSE,
        'transient_time' => '3600',
        'update_notice' => TRUE,
        'use_cdn' => 'FALSE',
    );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */

/*
 * ---> START HELP TABS
 */

$tabs = array(
	array(
		'id'      => 'mstoic-help-tab',
		'title'   => esc_html__( 'Help', 'mstoic-shortcodes'),
		'content' => '<p>' . esc_html__( 'The plugin is built with a lot of care and keeping every fine detail in mind.', 'mstoic-shortcodes') . '</p>' .
		             '<p>' .
		             esc_html__( 'If you ever get into a problem or have a suggestion, don\'t hesitate, post it in our ', 'mstoic-shortcodes') .
		             '<a href="' . esc_url('http://www.mstoicthemes.com/forums/') . '">' . esc_html__('Forum', 'mstoic-shortcodes') . '</a>' . esc_html__( '.', 'mstoic-shortcodes') .
		             '</p>' .
		             '<p>' . esc_html__( 'We will be more than happy to help.', 'mstoic-shortcodes' ) . '</p>'
	),
);
Redux::setHelpTab( $opt_name, $tabs );

// Set the help sidebar
$content = '<p>' . esc_html__( 'Visit our ', 'mstoic-shortcodes' ) . '<a href="http://www.mstoicthemes.com/forums/">' . esc_html__('Forum', 'mstoic-shortcodes') . '</a>' . esc_html__( ' for any help you need.', 'mstoic-shortcodes' ) . '</p>';
Redux::setHelpSidebar( $opt_name, $content );

/*
 * <--- END HELP TABS
 */



/*
 *
 * ---> START SECTIONS
 *
 */

    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'General', 'mstoic-shortcodes' ),
        'id'     => 'general',
        'desc'   => esc_html__( 'General settings for Mstoic Shortcodes plugin', 'mstoic-shortcodes' ),
        'icon'   => 'el el-home',
        'fields' => array(
	        array(
		        'id' => 'custom_featured_image',
		        'type' => 'media',
		        'compiler' => 'true',
		        'title' => esc_html__('Featured Image Fallback', 'mstoic-shortcodes'),
		        'subtitle' => esc_html__('This image will be used if no featured image for a post is set. We use this across all shortcodes given by Mstoic Shortcodes.', 'mstoic-shortcodes'),
		        'desc' => esc_html__('Image should be at least 600px in width, to make sure it looks good across all devices.', 'mstoic-shortcodes'),
		        'default' => array(
			        'url' => $ms_redux_dir . '../../images/frontend/theme-logo/featured-image-fallback.png',
			        'height' => 600,
			        'width' => 1200,
		        ),
	        ),
	        array(
		        'id' => 'square_custom_featured_image',
		        'type' => 'media',
		        'compiler' => 'true',
		        'title' => esc_html__('Square Featured Image', 'mstoic-shortcodes'),
		        'subtitle' => esc_html__('This image is used as a fallback image in some shortcodes where square images are required.', 'mstoic-shortcodes'),
		        'desc' => esc_html__('Recommendation: Image should be at least 600px in size, and should be in a square shape.', 'mstoic-shortcodes'),
		        'default' => array(
			        'url' => $ms_redux_dir . '../../images/frontend/theme-logo/square-featured-image-fallback.png',
			        'height' => 1200,
			        'width' => 1200,
		        ),
	        ),
	        array(
		        'id' => 'google_analytics_id',
		        'type' => 'text',
		        'title' => esc_html__('Google Analytics ID', 'mstoic-shortcodes'),
		        'subtitle' => esc_html__('A Gooogle Analytics tracking ID looks like ', 'mstoic-shortcodes') . '<strong>UA-41565880-1</strong>',
		        'desc' => esc_html__('Type in your Google Analytics Tracking ID, if you want to enable Google Analytics.', 'mstoic-shortcodes'),
	        ),
	        array(
		        'id'       => 'google_maps_api_key',
		        'type'     => 'text',
		        'title'    => esc_html__( 'Your Google Maps API Key', 'mstoic-shortcodes' ),
		        'subtitle' => esc_html__( 'Only required if you use Google Maps shortcode', 'mstoic-shortcodes' ),
		        'desc'     =>
			        '<p>' . esc_html__( 'Google Maps API key is required if you embed Google Maps on your website. Leave blank if you are not going to embed Google Maps using our shortcode.', 'mstoic-shortcodes' ) . '</p>' .
			        '<p class="description">' .
			        esc_html__( 'Get your free API key ', 'mstoic-shortcodes' ) .
			        '<a target="_blank" href="' . esc_url( 'https://developers.google.com/maps/documentation/embed/guide#api_key' ) . '">' . esc_html__( 'here', 'mstoic-shortcodes' ) . '</a>' .
			        '</p>',
		        'default'  => 'AIzaSyAuHQmj9v3utIpdTWdzHalLLLaJBrIo6eg',
	        ),
        )
    ) );

    /*
     * <--- END SECTIONS
     */
