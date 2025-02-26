<?php

/*
    Plugin Name: Ad Swapper
    Plugin URI: http://www.adswapper.com/
    Description: Swap ads with other Ad Swapper sites.
    Author: Ad Swapper Limited
    Version: 1.0.3
    Version Date: 25 Feb 2016
    Copyright: (C) 2014-2016 Peter Newman. All Rights Reserved
    Author URI: http://www.adswapper.com/
    Text Domain: adswapper
    Domain Path: /lang
*/

// *****************************************************************************
// AD-SWAPPER / AD-SWAPPER.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    // =========================================================================
    // Testing/Debugging...
    // =========================================================================

    // -------------------------------------------------------------------------
    // <plugin_root_dir>/test-debug.php
    // SYNOPSIS
    // ================================
    // Defines:-
    //
    //      o   pr( $value , [ $name = NULL ] )
    //
    // All in the namespace:-
    //      greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug
    // -------------------------------------------------------------------------

    require_once( dirname( __FILE__ ) . '/test-debug.php' ) ;

    // =========================================================================
    // WordPress Plugins Repository Specific Stuff...
    // =========================================================================

    $GLOBALS['wordpress_plugins_repository_support'] = array(
        'is_wordpress_plugins_repository_specific_version'      =>  TRUE           ,
        'plugin_title_4_admin_left_menu'                        =>  'Ad Swapper'    ,
        'plugin_title_4_page_header'                            =>  'Ad Swapper'    ,
        'wordpress_plugins_repository_specific_version_number'  =>  '1.0.3'
        ) ;
        //  Use version in "plugin-plant.php", for local testing !!!

    // =========================================================================
    // Load the APPS API (if necessary), and the PLUGIN PROPER...
    // =========================================================================

    $filespec = dirname( __FILE__ ) . '/ad-swapper-proper.php' ;

    // -------------------------------------------------------------------------

    if ( ! is_file( $filespec ) ) {

        require_once( dirname( __FILE__ ) . '/apps-api.php' ) ;

        $filespec = dirname( __FILE__ ) . '/app-defs/ad-swapper.app/plugin.stuff/ad-swapper-proper.php' ;

    }

    // -------------------------------------------------------------------------

    require_once( $filespec ) ;

// =============================================================================
// That's that!
// =============================================================================


