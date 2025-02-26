<?php

    /**
     * ReduxFramework Barebones Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "ssb_menu";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.
    

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => 'Logics Buffer Floating Menu',
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Floating Menu', 'redux-framework-demo' ),
        'page_title'           => __( 'Floating Menu', 'redux-framework-demo' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-menu',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => 'dashicons-menu',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '_options',
        // Page slug used to denote the panel
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        'footer_credit'     => 'Developed by Logics Buffer',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!

        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        //'compiler'             => true,

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'light',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    /*
      $args['admin_bar_links'][] = array(
        'id'    => 'redux-docs',
        'href'  => 'http://logicsbuffer.com',
        'title' => __( 'Visit Logics Buffer', 'redux-framework-demo' ),
    ); */

    /* $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
        'title' => __( 'Support', 'redux-framework-demo' ),
    );

    $args['admin_bar_links'][] = array(
        'id'    => 'redux-extensions',
        'href'  => 'reduxframework.com/extensions',
        'title' => __( 'Extensions', 'redux-framework-demo' ),
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
        'title' => 'Visit us on GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/reduxframework',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://www.linkedin.com/company/redux-framework',
        'title' => 'Find us on LinkedIn',
        'icon'  => 'el el-linkedin'
    ); */

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '<p>Project Developed by Logics Buffer</p>', 'redux-framework-demo' ), $v );
    } else {
        $args['intro_text'] = __( '<p>Sticky Menu By <a href="http://logicsbuffer.com">Logics Buffer</p>', 'redux-framework-demo' );
    }

    // Add content after the form.
    $args['footer_text'] = __( '<p>Sticky Menu By <a href="http://logicsbuffer.com">Logics Buffer</a></p>', 'redux-framework-demo' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Sticky Menu By Logics Buffer ', 'redux-framework-demo' ),
            'content' => __( '<p>Sticky Menu By <a href="http://logicsbuffer.com">Logics Buffer</a></p>', 'redux-framework-demo' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>Sticky Menu</p>', 'redux-framework-demo' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // -> START Basic Fields

  /*   Redux::setSection( $opt_name, array(
        'title' => __( 'Pricing Options', 'redux-framework-demo' ),
        'id'    => 'basic',
        'desc'  => __( 'Basic fields as subsections.', 'redux-framework-demo' ),
        'icon'  => 'el el-home'
    ) ); */

	Redux::setSection( $opt_name, array(
        'title'  => __( 'Menu Items', 'redux-framework-demo' ),
        'id'     => 'basic',
        'desc'   => __( 'Basic field with no subsections.', 'redux-framework-demo' ),
        'icon'   => 'el el-home',

    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Title', 'redux-framework-demo' ),
        'id'         => 'menu_title',
        'subsection' => true,
        'desc'       => __( 'Enter Munu Items Here', 'redux-framework-demo' ) . '',
        'fields'     => array(
            array(
                'id'       => 'stickymenu_title',
                'type'     => 'text',
                'title'    => __( 'Add Menu Title', 'redux-framework-demo' ),
                'subtitle' => __( 'Define and reorder these however you want.', 'redux-framework-demo' ),
                'desc'     => __( 'Add Menu Title Here', 'redux-framework-demo' ),
            ),
            array(
                'id'=>'menu_icon_main',
                'type' => 'text', 
                'title' => __('Select Menu Icon', 'redux-framework-demo'),
                'subtitle'  => __('Enter Icon Class eg: fa fa-menu', 'redux-framework-demo'),
                'default'  => 'fa fa-bars',
                'placeholder' => 'fa fa-bars'
            ),
            array(
                'id'             => 'icon_spacing',
                'type'           => 'spacing',
                'output'         => array('.ssb_main_icon'),
                'mode'           => 'margin',
                'units'          => array('em', 'px'),
                'units_extended' => 'false',
                'title'          => __('Icon Padding', 'redux-framework-demo'),
                'desc'           => __('You can add padding to the main floating icon here. Top, Right, Bottom, Left, or Units.', 'redux-framework-demo'),
                'default'            => array(
                    'margin-top'     => '1px', 
                    'margin-right'   => '2px', 
                    'margin-bottom'  => '3px', 
                    'margin-left'    => '4px',
                    'units'          => 'em', 
                )
            ),
            array(
               'id'          => 'title_font_family',
               'type'        => 'typography',
               'title'       => __( 'Menu Title Style', 'redux-framework-demo' ),
               //'compiler'      => true,  // Use if you want to hook in your own CSS compiler
               //'google'      => false,
               // Disable google fonts. Won't work if you haven't defined your google api key
               'font-backup' => true,
               // Select a backup non-google font in addition to a google font
               //'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
               //'subsets'       => false, // Only appears if google is true and subsets not set to false
               //'font-size'     => false,
               //'line-height'   => false,
               //'word-spacing'  => true,  // Defaults to false
               //'letter-spacing'=> true,  // Defaults to false
               //'color'         => false,
               //'preview'       => false, // Disable the previewer
               'all_styles'  => true,
               // Enable all Google Font style/weight variations to be added to the page
               'output'      => array( 'h2.site-description, .entry-title' ),
               // An array of CSS selectors to apply this font style to dynamically
               'compiler'    => array( 'h2.site-description-compiler' ),
               // An array of CSS selectors to apply this font style to dynamically
               'units'       => 'px',
               // Defaults to px
               'subtitle'    => __( 'Apply font styling on Menu title.', 'redux-framework-demo' ),
               'default'     => array(
                   'color'       => '#333',
                   'font-style'  => '700',
                   'font-family' => 'Abel',
                   'google'      => true,
                   'font-size'   => '33px',
                   'line-height' => '40px'
               ),
           ),
           

        )
    ) );

        Redux::setSection( $opt_name, array(
        'title'      => __( 'Position', 'redux-framework-demo' ),
        'id'         => 'menu_position',
        'subsection' => true,
        'desc'       => __( 'Enter Munu Items Here', 'redux-framework-demo' ) . '',
        'fields'     => array(
            array(

                'id'       => 'menu_position',
                'type'     => 'radio',
                'title'    => __( 'Menu Position on Screen', 'redux-framework-demo' ),
                'desc'     => __( 'Select Position of Menu on Frontend', 'redux-framework-demo' ),

                //Must provide key => value pairs for radio options

                'options'  => array(
                    'right' => 'Right',
                    'left' => 'Left',
                ),
                'default'  => 'right'

            ),
            array(
                'id'       => 'menu_disable_mobile',
                'type'     => 'checkbox',
                'title'    => __( 'Disable on Mobile', 'redux-framework-demo' ),
                'desc'     => __( 'Disable menu on Moble.', 'redux-framework-demo' ),
                'default'  => '0'// 1 = on | 0 = off

            ),
            array(
                'id'       => 'menu_show_on_pages',
                'type'     => 'checkbox',
                'title'    => __( 'show on Pages', 'redux-framework-demo' ),
                'default'  => '0'// 1 = on | 0 = off

            ),
            array(
                'id'       => 'menu_show_on_posts',
                'type'     => 'checkbox',
                'title'    => __( 'show on Posts', 'redux-framework-demo' ),
                'default'  => '0'// 1 = on | 0 = off

            ),
            array(
                'id'       => 'menu_show_on_frontpage',
                'type'     => 'checkbox',
                'title'    => __( 'show on Front Page', 'redux-framework-demo' ),
                'default'  => '0'// 1 = on | 0 = off

            ),
            array(
                'id'       => 'menu_show_on_cpt',
                'type'     => 'checkbox',
                'title'    => __( 'show on Custom Post Types', 'redux-framework-demo' ),
                'default'  => '0'// 1 = on | 0 = off

            ),
             array(

                'id'       => 'menu_zindex_s',
                'type'     => 'select',
                'title'    => 'Select Z-Index Value',
                'options'  => array(

                    '1'    => '1',
                    '2'  => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5'
                ),
                'default'  => '1',
                'select2'  => array( 'allowClear' => false )

            ),
        )
    ) );


	Redux::setSection( $opt_name, array(
        'title'      => __( 'Menu Items', 'redux-framework-demo' ),
        'id'         => 'menu_items',
        'subsection' => true,
        'desc'       => __( 'Enter Munu Items Here', 'redux-framework-demo' ) . '',
        'fields'     => array(
			array(
                'id'       => 'stickymenu_items',
                'type'     => 'multi_text',
                'title'    => __( 'Add Menu Items', 'redux-framework-demo' ),
                'subtitle' => __( 'Define and reorder these however you want.', 'redux-framework-demo' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'redux-framework-demo' ),
            ),
			array(
                'id'       => 'stickymenu_links',
                'type'     => 'multi_text',
                'title'    => __( 'Add Menu Links', 'redux-framework-demo' ),
                'subtitle' => __( 'Define link to each menu item.', 'redux-framework-demo' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'redux-framework-demo' ),
            ),

			array(
                'id'       => 'menu_fontsize',
                'type'     => 'text',
                'title'    => __( 'Add font size here', 'redux-framework-demo' ),
                'subtitle' => __( 'Define and reorder these however you want.', 'redux-framework-demo' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'redux-framework-demo' ),
            ),
      array(
          'id'       => 'menu_items_hover',
          'type'     => 'color',
          'title'    => __( 'Select hover Color for menu items Here', 'redux-framework-demo' ),
          'default'  => '#dd9933',
          'validate' => 'color',
      ),
			array(
                'id'       => 'menu_fontweight',
                'type'     => 'text',
                'title'    => __( 'Add font Weight here', 'redux-framework-demo' ),
                'subtitle' => __( 'Define and reorder these however you want.', 'redux-framework-demo' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'redux-framework-demo' ),
            ),
			array(
               'id'          => 'menu_font_styling',
               'type'        => 'typography',
               'title'       => __( 'Font Styling for Menu Items', 'redux-framework-demo' ),
               //'compiler'      => true,  // Use if you want to hook in your own CSS compiler
               //'google'      => false,
               // Disable google fonts. Won't work if you haven't defined your google api key
               'font-backup' => true,
               // Select a backup non-google font in addition to a google font
               //'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
               //'subsets'       => false, // Only appears if google is true and subsets not set to false
               //'font-size'     => false,
               //'line-height'   => false,
               //'word-spacing'  => true,  // Defaults to false
               //'letter-spacing'=> true,  // Defaults to false
               //'color'         => false,
               //'preview'       => false, // Disable the previewer
               'all_styles'  => true,
               // Enable all Google Font style/weight variations to be added to the page
               'output'      => array( 'h2.site-description, .entry-title' ),
               // An array of CSS selectors to apply this font style to dynamically
               'compiler'    => array( 'h2.site-description-compiler' ),
               // An array of CSS selectors to apply this font style to dynamically
               'units'       => 'px',
               // Defaults to px
               'subtitle'    => __( 'Apply Font Styling for Menu Items.', 'redux-framework-demo' ),
               'default'     => array(
                   'color'       => '#333',
                   'font-style'  => '700',
                   'font-family' => 'Abel',
                   'google'      => true,
                   'font-size'   => '33px',
                   'line-height' => '40px'
               ),
           ),
        )
    ) );

	Redux::setSection( $opt_name, array(
        'title'      => __( 'Menu Logo', 'redux-framework-demo' ),
        'id'         => 'menu_image',
        'desc'       => __( 'Upload Menu Logo Image Here', 'redux-framework-demo' ),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'menu_image_main',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Upload Menu Logo', 'redux-framework-demo' ),
                'compiler' => 'true',
                //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'     => __( 'Upload Menu Logo Image Here', 'redux-framework-demo' ),
                'subtitle' => __( 'Upload any media using the WordPress native uploader', 'redux-framework-demo' ),
                'default'  => array( 'url' => 'http://s.wordpress.org/style/images/codeispoetry.png' ),
                //'hint'      => array(
                //    'title'     => 'Hint Title',
                //    'content'   => 'This is a <b>hint</b> for the media field with a Title.',
                //)
            ),
            array(
                'id'       => 'logo_dimensions',
                'type'     => 'dimensions',
                'units'    => array('em','px','%'),
                'title'    => __('Dimensions (Width/Height) Option', 'redux-framework-demo'),
                'subtitle' => __('Allow your users to choose width, height, and/or unit.', 'redux-framework-demo'),
                'desc'     => __('Enable or disable any piece of this field. Width, Height, or Units.', 'redux-framework-demo'),
                'default'  => array(
                    'Width'   => '200',
                    'Height'  => '100'
                ),
            ),





        )


    ) );


	Redux::setSection( $opt_name, array(
        'title'      => __( 'Menu Background', 'redux-framework-demo' ),
        'id'         => 'menu_bg',
        'desc'       => __( 'Select Background Color Here', 'redux-framework-demo' ),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'menu_bg_main',
                'type'     => 'color',
                'title'    => __( 'Select Background Color Here', 'redux-framework-demo' ),
                'default'  => '#dd9933',
                'validate' => 'color',
            ),

        )
    ) );

    function newIconFont() {
        // Uncomment this to remove elusive icon from the panel completely
        //wp_deregister_style( 'redux-elusive-icon' );
        //wp_deregister_style( 'redux-elusive-icon-ie7' );
     
        wp_register_style(
            'redux-font-awesome',
            '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css',
            array(),
            time(),
            'all'
        );  
        wp_enqueue_style( 'redux-font-awesome' );
    }
    // This example assumes the opt_name is set to redux_demo.  Please replace it with your opt_name value.
    add_action( 'redux/page/redux_demo/enqueue', 'newIconFont' );

    /*
     * <--- END SECTIONS
     */
