<?php
/**
* Atom Featured Image Class
*
* @package Atom Featured Image
* @since 1.0.0
**/
namespace AtomFeaturedImage;

/*
* FeedImage
* @since 1.0.0
*/
class FeedImage
{
    /*
    * Register the atom feed class
    * @since 1.0.0
    */
    public static function register()
    {
        $image = new self();
        add_action('atom_entry', array($image, 'create_atom_icon_tag'));
    }


    /*
    * Create the 'icon' tag with the featured image inside the atom feed entry
    * @since 1.0.0
    */
    public function create_atom_icon_tag()
    {
        global $post;
        if (!has_post_thumbnail($post->ID))
            echo '';

        $options = Options::get_instance();
        echo '<icon>' . get_the_post_thumbnail_url($post->ID, $options->get('image_size'), ATOM_IMAGE_DEFAULT_SIZE) . '</icon>';
    }
}
