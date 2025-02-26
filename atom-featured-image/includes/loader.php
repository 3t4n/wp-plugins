<?php
/**
* Atom Featured Image Plugin Loader
*
* @package Atom Featured Image
* @since 1.0.0
**/
namespace AtomFeaturedImage;

/*
* Loader
* @since 1.0.0
*/
class Loader
{
    /*
    * Load text domain and options; register plugin classes
    * @since 1.0.0
    */
    public static function init()
    {
        load_plugin_textdomain('atom_featured_image', false, basename(ATOM_IMAGE_BASE_PATH) . '/languages' );

        $options = Options::get_instance();

        FeedImage::register();
        AdminSettings::register();
    }
}
