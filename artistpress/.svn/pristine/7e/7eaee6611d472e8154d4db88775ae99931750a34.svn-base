<?php
namespace ArtistPress\Administration\Settings;

/**
 * Exit if accessed directly
 */	
if (!defined('ABSPATH')) {
	exit;
}

class Gallery extends Settings
{
    const OPTIONS = 'artistpress_gallery_settings';
    const BEHAVIOR = 'gallery_behavior';
	const DISPLAY_NAME = 'gallery_show_title';
	const DISPLAY_IMAGE_TITLE = 'gallery_show_image_title';
	const DISPLAY_IMAGE_CAPTION = 'gallery_show_image_caption';
	const USE_STYLE = 'gallery_use_stylesheet';	
    
    public static function getSectionDescription()
    {
        \ob_start();

        echo '<p>These settings control the display of the ArtistPress Galleries. These settings affect all album and gallery pages. This also includes shortcodes.</p>';
        
        print \apply_filters(__METHOD__, \ob_get_clean());
    }

    public function getSectionFields()
    {
        return \apply_filters(__METHOD__, [
            [
                'type'  => 'radio',
                'args'  => [
                    'slug'  => self::BEHAVIOR,
                    'name'  => __('Gallery Style', 'artistpress'),
                    'key'   => $this->settings,
                    'desc'  => 'Choose the display style of your ArtistPress galleries.',
                    'options' => [
                        'cardlightbox'    => 'Card Lightbox',
                        'masonrylightbox'     => 'Masonry Lightbox'
                    ],
                    'default' => 'cardlightbox'
                ]
            ],
            [
                'type'  => 'radio',
                'args'  => [
                    'slug'  => self::DISPLAY_NAME,
                    'name'  => __('Gallery Title', 'artistpress'),
                    'key'   => $this->settings,
                    'desc'  => __('Should the gallery name be displayed on the gallery page?', 'artistpress'),
                    'default' => 'yes'
                ]
            ],
            [
                'type'  => 'radio',
                'args'  => [
                    'slug'  => self::DISPLAY_IMAGE_TITLE,
                    'name'  => __('Gallery Image Title', 'artistpress'),
                    'key'   => $this->settings,
                    'desc'  => __('Should the image titles be displayed in the gallery?', 'artistpress'),
                    'default' => 'yes'
                ]
            ],
            [
                'type'  => 'radio',
                'args'  => [
                    'slug'  => self::DISPLAY_IMAGE_CAPTION,
                    'name'  => __('Gallery Image Caption', 'artistpress'),
                    'key'   => $this->settings,
                    'desc'  => __('Should the image captions be displayed in the lightbox model window?', 'artistpress'),
                    'default' => 'yes'
                ]
            ],
            [
                'type'  => 'radio',
                'args'  => [
                    'slug'  => self::USE_STYLE,
                    'name'  => __('Gallery Default Stylesheet', 'artistpress'),
                    'key'   => $this->settings,
                    'desc'  => __('Should the default gallery stylesheet be used to display the galleries?', 'artistpress'),
                    'default' => 'yes'
                ]
            ],
        ]);
    }
}
