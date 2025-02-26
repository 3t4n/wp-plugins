<?php
namespace ArtistPress\Includes;

/**
 * Exit if accessed directly
 */	
if (!defined('ABSPATH')) {
	exit;
}

class Functions
{
    /**
     * Creates all the custom image sizes for the Artistpress
     *
     *  @author     LTDI Studios
     *  @package    ArtistPress/includes
     *  @version    1.5.0
     */
    public static function registerImageSizes()
    {
        \add_image_size('artistpress_thumbnail', 250, 150, true);
        \add_image_size('artistpress_full', 600, 400, true);
        \add_image_size('artistpress_square', 400, 400, ['center', 'center']);
    }
}