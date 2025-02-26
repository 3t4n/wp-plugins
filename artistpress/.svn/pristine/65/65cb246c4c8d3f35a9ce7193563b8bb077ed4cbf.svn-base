<?php
namespace ArtistPress\Administration\Settings;

/**
 * Exit if accessed directly
 */	
if (!defined('ABSPATH')) {
	exit;
}

class Artist extends Settings
{
    const OPTIONS = 'artistpress_artist_settings';
    const DISPLAY_NAME = 'artist_name';
    const DISPLAY_PHONE = 'artist_phone';
    const DISPLAY_EMAIL = 'artist_email';
    const DISPLAY_WEB = 'artist_web';
    const DISPLAY_BIO = 'artist_bio';
    const LINK_PHONE = 'artist_phone_link';
    const LINK_EMAIL = 'artist_email_link';
    const USE_STYLE = 'artist_use_stylesheet';
    const USE_SHORTCODE = 'artist_use_shortcode';
    
    public static function getSectionDescription()
    {
        \ob_start();

        echo '<p>These settings control the display of the ArtistPress Artists. These settings affect all artist shortcodes and artist page templates.</p>';
        
        print \apply_filters(__METHOD__, \ob_get_clean());
    }

    public function getSectionFields()
    {
        return \apply_filters(__METHOD__, [
            [
                'type'  => 'radio',
                'args'  => [
                    'slug'    => self::DISPLAY_NAME,
                    'name'    => __('Artist Name', 'artistpress'),
                    'key'     => $this->settings,
                    'desc'    => __('Should the artist\'s name be displayed on the artist pages?', 'artistpress'),
                    'default' => 'yes'
                ]
            ],
            [
                'type'  => 'radio',
                'args'  => [
                    'slug'  => self::DISPLAY_PHONE,
                    'name'  => __('Phone Number', 'artistpress'),
                    'key'   => $this->settings,
                    'desc'  => __('Should the artist\'s phone number be displayed on the artist pages?', 'artistpress'),
                    'default' => 'yes'
                ]
            ],
            [
                'type'  => 'radio',
                'args'  => [
                    'slug'  => self::LINK_PHONE,
                    'name'  => __('Link Phone Number', 'artistpress'),
                    'key'   => $this->settings,
                    'desc'  => __('Should the artist\'s phone number be click-to-dial functionality?', 'artistpress'),
                    'default' => 'no'
                ]
            ],
            [
                'type'  => 'radio',
                'args'  => [
                    'slug'  => self::DISPLAY_EMAIL,
                    'name'  => __('Display Email', 'artistpress'),
                    'key'   => $this->settings,
                    'desc'  => __('Should the artist\'s email be displayed on the artist pages?', 'artistpress'),
                    'default' => 'yes'
                ]
            ],
            [
                'type'  => 'radio',
                'args'  => [
                    'slug'  => self::DISPLAY_WEB,
                    'name'  => __('Display Website', 'artistpress'),
                    'key'   => $this->settings,
                    'desc'  => __('Should the artist\'s website be displayed on the artist pages?', 'artistpress'),
                    'default' => 'yes'
                ]
            ],
            [
                'type'  => 'radio',
                'args'  => [
                    'slug'  => self::DISPLAY_BIO,
                    'name'  => __('Display Bio', 'artistpress'),
                    'key'   => $this->settings,
                    'desc'  => __('Should the artist\'s bio be displayed on the artist pages?', 'artistpress'),
                    'default' => 'yes'
                ]
            ],
            [
                'type'  => 'radio',
                'args'  => [
                    'slug'  => self::USE_STYLE,
                    'name'  => __('Artist Default Stylesheet', 'artistpress'),
                    'key'   => $this->settings,
                    'desc'  => __('Should the default artist stylesheet be used to display the Artists?', 'artistpress'),
                    'default' => 'yes'
                ]
            ],
            [
                'type'  => 'radio',
                'args'  => [
                    'slug'  => self::USE_SHORTCODE,
                    'name'  => __('Use Shortcodes for Artists', 'artistpress'),
                    'key'   => $this->settings,
                    'desc'  => __('Use WordPress templates instead of shortcodes (recommended for developer use only).', 'artistpress'),
                    'default' => 'yes'
                ]
            ]
        ]);
    }
}

