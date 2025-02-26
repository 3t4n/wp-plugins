<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
class Photo_Gallery_Licensing{
    /**
     * Prints Licensing page
     */
    public function show_page( ){
        include( PHOTO_PORTFOLIO_TEMPLATES_PATH.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'photo-portfolio-admin-licensing.php' );
    }
}