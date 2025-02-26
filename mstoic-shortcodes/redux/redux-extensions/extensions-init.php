<?php

    // All extensions placed within the extensions directory will be auto-loaded for your Redux instance.
    Redux::setExtensions( 'ms_opt', trailingslashit( plugin_dir_path( __FILE__ ) ) . 'extensions/' );

    // Any custom extension configs should be placed within the configs folder.
    if ( file_exists( trailingslashit( plugin_dir_path( __FILE__ ) ) . 'configs/' ) ) {
        $files = glob( trailingslashit( plugin_dir_path( __FILE__ ) ) . 'configs/*.php' );
        if ( ! empty( $files ) ) {
            foreach ( $files as $file ) {
                include $file;
            }
        }
    }