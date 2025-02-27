<?php

// Register a theme options page
add_filter( 'mb_settings_pages', function ( $settings_pages ) {
    $settings_pages[] = array(
        'id'          => 'wpdp',
        'option_name' => 'wpdp_settings',
        'menu_title'  => 'Settings',
        'icon_url'    => 'dashicons-edit',
        'style'       => 'no-boxes',
        'columns'     => 2,
        'parent'	  => 'edit.php?post_type=wp-disclaimer-popup',
        'tabs'        => array(
            'general' => 'General Settings',
            'design'  => 'Design Customization',
            'faq'     => 'Author',
        ),
    );
    return $settings_pages;
} );

// Register meta boxes and fields for settings page
add_filter( 'rwmb_meta_boxes', function ( $meta_boxes ) {
    $meta_boxes[] = array(
        'id'             => 'general',
        'title'          => 'General',
        'settings_pages' => 'wpdp',
        'context'        => 'normal',
        'tab'            => 'general',
        'fields' => array(
            array(
                'type' => 'checkbox',
                'name' => esc_html__( 'Enable Disclaimer', 'wp-disclaimer-popup' ),
                'id'   => 'wpdp_enable_disclaimer',
            ),
            array(
	            'type'       => 'post',
                'name'       => esc_html__( 'Choose which disclaimer to show', 'wp-disclaimer-popup' ),
                'id'         => 'wpdp_post',
                'post_type'  => 'wp-disclaimer-popup',
                'field_type' => 'select',
            ),
            array(
                'type' => 'number',
                'name' => esc_html__( 'Cookie expiration', 'wp-disclaimer-popup' ),
                'id'   => 'wpdp_cookie_expiration',
                'desc' => esc_html__( 'Indicate how many days the cookies are valid. (0 to always make the pop-up appear)', 'online-generator' ),
                'step' => 1,
            ),
            array(
			    'type' => 'heading',
			    'name' => esc_html__( 'Buttons', 'wp-disclaimer-popup' ),
			    //'desc' => 'Optional description',
			),
			array(
				'type'        => 'text',
				'name'        => esc_html__( 'Agree Text', 'wp-disclaimer-popup' ),
				'id'          => 'wpdp_agree_text',
			),
			array(
				'type'        => 'text',
				'name'        => esc_html__( 'Decline Text', 'wp-disclaimer-popup' ),
				'id'          => 'wpdp_decline_text',
			),
			array(
				'type'        => 'text',
				'name'        => esc_html__( 'Decline Url', 'wp-disclaimer-popup' ),
				'id'          => 'wpdp_decline_url',
			),
			

        ),
    );

    $meta_boxes[] = array(
        'id'             => 'general1',
        'title'          => 'General',
        'settings_pages' => 'wpdp',
        'context'        => 'side',
        'tab'            => 'general',
        'fields' => array(
            array(
                'type'        => 'custom_html',
                'name'        => esc_html__( 'HOW TO USE THE PLUGIN', 'wp-disclaimer-popup' ),
                'id'          => 'wpdp_decline_text22',
                'std'         => '<div class="alert alert-warning">
                <h4>AUTOMATIC MODE (all pages)</h4>
                <ol>
                    <li>Create the text for the disclaimer to be displayed in the popup.</li>
                    <li>Activate the display of the disclaimer on all pages of your website.</li>
                    <li>Visitors will see the selected disclaimer popup when accessing any page or article.</li>
                    <li>If desired, you can individually disable the popup display on specific pages or posts.</li>
                </ol>
                <h4>MANUAL MODE (single choice)</h4>
                <ol>
                    <li>Create the text for the disclaimer to be displayed in the popup.</li>
                    <li>Choose not to automatically activate its display on all pages by leaving the activation checkbox unselected.</li>
                    <li>This option allows you to manually select on which pages or articles you want to enable the opening of the disclaimer popup.</li>
                </ol>
                </div>',
            ),
        ),
    );
    
    
    $meta_boxes[] = array(
        'id'             => 'colors',
        'title'          => 'Colors',
        'settings_pages' => 'wpdp',
        'tab'            => 'design',
        'fields' => array(
            array(
                'name' => 'Container width',
                'id'   => 'wpdp_contW',
                'type' => 'slider',
                'js_options' => array(
			        'min'   => 400,
			        'max'   => 1000,
			        'step'  => 1,
			    ),
			    'std' => 650,
            ),
            array(
                'name' => 'Button Background Color',
                'id'   => 'wpdp_btnBgColor',
                'type' => 'color',
                'std'  => '#FFFFFF',
            ),
            
            array(
                'name' => 'Button Text Color',
                'id'   => 'wpdp_btnTxtColor',
                'type' => 'color',
                'std'  => '#1A4179',
            ),
            
            array(
                'name' => 'Button Border Color',
                'id'   => 'wpdp_btnBorderColor',
                'type' => 'color',
                'std'  => '#1A4179',
            ),
            
            array(
                'name' => 'Button Background Color Hover',
                'id'   => 'wpdp_btnBgColorHover',
                'type' => 'color',
                'std'  => '#1A4179',
            ),
            
            array(
                'name' => 'Button Text Color Hover',
                'id'   => 'wpdp_btnTxtColorHover',
                'type' => 'color',
                'std'  => '#FFFFFF',
            ),
            
            array(
                'name' => 'Button Border Color Hover',
                'id'   => 'wpdp_btnBorderColorHover',
                'type' => 'color',
                'std'  => '#1A4179',
            ),
            
            array(
                'name' => 'Overlay opacity',
                'id'   => 'wpdp_overlayBgOpacity',
                'type' => 'slider',
                'js_options' => array(
			        'min'   => 0.01,
			        'max'   => 1,
			        'step'  => 0.01,
			    ),
			    'std' => 0.8,
            ),
            
            array(
                'name' => 'Overlay Color',
                'id'   => 'wpdp_overlayBgColor',
                'type' => 'color',
                'std'  => '#0b0b0b',
            ),

            [
                'name' => 'Alignment at the top',
                'id'   => 'wpdp_alig',
                'type' => 'checkbox',
                'std'  => 1, // 0 or 1
            ],
        ),
    );
    
    
    $meta_boxes[] = array(
        'id'             => 'info',
        'title'          => 'Theme Info',
        'settings_pages' => 'wpdp',
        'tab'            => 'faq',
        'fields'         => array(
            array(
                'type' => 'custom_html',
                'std'  => 'Development by <a href="https://www.themeinthebox.com" target="_blank">ThemeintheBox.com</a> - <a href="http://www.wordpressguru.it" target="_blank">WordPressGuru.it</a></br>
                For information  <a href="mailto:support@themeinthebox.com">support@themeinthebox.com</a> (ENG)<br>
                For italian support <a href="mailto:supporto@wordpressguru.it">supporto@wordpressguru.it</a> (ITA)',
            ),
            
        ),
    );
    return $meta_boxes;
} );

/* ----------------------------- |
    DISCLAIMER POST SIDEBAR
| ----------------------------- */

add_filter( 'rwmb_meta_boxes', 'wpdp_sidebar_post' );

function wpdp_sidebar_post( $meta_boxes ) {

    $enable = get_option( 'wpdp_settings' )['wpdp_enable_disclaimer'];

    // get in array all post_types
    $allpost_type = get_post_types([], 'names');

    if (! $enable) { // if the general popup (all pages) is NOT enabled.

        // remove wp-disclaimer-popup from array
        $arr_allpost_type = array_diff($allpost_type, array('wp-disclaimer-popup'));
        $meta_boxes[] = [
            'title'      => __( 'Disclaimer Popup', 'wp-disclaimer-popup' ),
            'id'         => 'wp-disclaimer-popup-sidebar-post',
            'post_types' => $arr_allpost_type,
            'context'    => 'side',
            'visible' => array( 'wpdp_enable_disclaimer', '=', '1' ),
            'fields'     => [
                [
                    'name' => __( 'Enable popup?', 'wp-disclaimer-popup' ),
                    'id'   => 'wpdp_enable_single',
                    'type' => 'checkbox',
                ],
                [
                    'name'      => __( 'Disclaimer to show on this post?', 'wp-disclaimer-popup' ),
                    'id'        => 'wpdp_disclaimer_select',
                    'type'      => 'post',
                    'post_type' => ['wp-disclaimer-popup'],
                    'required'  => true,
                    'visible'   => [
                        'when'     => [['wpdp_enable_single', '=', 1]],
                        'relation' => 'or',
                    ],
                ],
            ],

        ];

    } else { // if the general popup (all pages) is enabled.

        // remove wp-disclaimer-popup from array
        $arr_allpost_type = array_diff($allpost_type, array('wp-disclaimer-popup'));
        $meta_boxes[] = [
            'title'      => __( 'Disclaimer Popup', 'wp-disclaimer-popup' ),
            'id'         => 'wp-disclaimer-popup-sidebar-post',
            'post_types' => $arr_allpost_type,
            'context'    => 'side',
            'visible' => array( 'wpdp_enable_disclaimer', '=', '1' ),
            'fields'     => [
                [
                    'name' => __( 'Disable popup on this page?', 'wp-disclaimer-popup' ),
                    'id'   => 'wpdp_disable_single',
                    'type' => 'checkbox',
                ],
            ],

        ];


    }

    return $meta_boxes;
}
