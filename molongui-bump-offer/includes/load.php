<?php
defined( 'ABSPATH' ) or exit;
if ( !function_exists( 'molongui_bump_offer_include_all_files_in_path' ) )
{
    function molongui_bump_offer_include_all_files_in_path( $path )
    {
        if ( !is_dir( $path ) ) return;
        foreach ( new RecursiveIteratorIterator( new RecursiveDirectoryIterator( $path ) ) as $file )
        {
            if ( $file->isFile() and 'php' === $file->getExtension() and 'index.php' !== $file->getFilename() )
            {
                require_once $file->getPathname();
            }
        }
    }
}
$paths = array
(
    MOLONGUI_BUMP_OFFER_DIR . 'includes/helpers/',
    MOLONGUI_BUMP_OFFER_DIR . 'includes/hooks/',
);
foreach ( $paths as $path ) molongui_bump_offer_include_all_files_in_path( $path );