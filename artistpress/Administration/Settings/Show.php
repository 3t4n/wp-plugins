<?php
namespace ArtistPress\Administration\Settings;

/**
 * Exit if accessed directly
 */	
if (!defined('ABSPATH')) {
	exit;
}

class Show extends Settings
{
    const OPTIONS = 'artistpress_show_settings';
    const DISPLAY_ARTWORK = 'display_show_artwork';
	const DISPLAY_DATE = 'display_show_date';
	const DISPLAY_TIME = 'display_show_time';
	const DISPLAY_TYPE = 'display_show_type';
	const DISPLAY_PRICE = 'display_show_price';
	const DISPLAY_TICKET_PHONE = 'display_ticket_phone';
	const DISPLAY_TICKET_BUTTON = 'display_ticket_button';
	const DISPLAY_ADDITIONAL_INFO = 'display_additional_info';
	const DISPLAY_VENUE = 'display_venue';
	const DISPLAY_VENUE_ADDRESS = 'display_venue_address';
	const DISPLAY_VENUE_PHONE = 'display_venue_phone';
	const DISPLAY_VENUE_WEBSITE = 'display_venue_website_button';
	const DISPLAY_MAP = 'map_display';
	const DISPLAY_DIRECTIONS = 'map_directions';
	const MAPS_API = 'artistpress_maps_api';
	const USE_STYLE = 'show_use_stylesheet';
	const USE_SHORTCODE = 'show_use_shortcode';

    public static function getSectionDescription()
    {
        \ob_start();

        echo '<p>These settings control the display of the ArtistPress Show Detail Pages.</p>';
        
        print \apply_filters(__METHOD__, \ob_get_clean());
    }

    public function getSectionFields()
    {
        return \apply_filters(__METHOD__, [
            [
                'type'  => 'radio',
                'args'  => [
                    'slug'  => self::DISPLAY_ARTWORK,
                    'name'  => __('Display Show Artwork', 'artistpress'),
                    'key'   => $this->settings,
                    'desc'  => __('Should the show artwork be shown on the individual show page?', 'artistpress'),
                    'default' => 'yes'
                ]
            ],
            [
                'type'  => 'radio',
                'args'  => [
                    'slug'  => self::DISPLAY_DATE,
                    'name'  => __('Display Show Date', 'artistpress'),
                    'key'   => $this->settings,
                    'desc'  => __('Should the date of the show be displayed on the individual show page?', 'artistpress'),
                    'default' => 'yes'
                ]
            ],
            [
                'type'  => 'radio',
                'args'  => [
                    'slug'  => self::DISPLAY_TIME,
                    'name'  => __('Display Show Time', 'artistpress'),
                    'key'   => $this->settings,
                    'desc'  => __('Should the show time be displayed on the individual show page?', 'artistpress'),
                    'default' => 'yes'
                ]
            ],
            [
                'type'  => 'radio',
                'args'  => [
                    'slug'  => self::DISPLAY_TYPE,
                    'name'  => __('Display Show Type', 'artistpress'),
                    'key'   => $this->settings,
                    'desc'  => __('Should the show type be displayed on the individual show page?', 'artistpress'),
                    'default' => 'yes'
                ]
            ],
            [
                'type'  => 'radio',
                'args'  => [
                    'slug'  => self::DISPLAY_PRICE,
                    'name'  => __('Display Show Price', 'artistpress'),
                    'key'   => $this->settings,
                    'desc'  => __('Should the show price be displayed on the individual show page?', 'artistpress'),
                    'default' => 'yes'
                ]
            ],
            [
                'type'  => 'radio',
                'args'  => [
                    'slug'  => self::DISPLAY_TICKET_PHONE,
                    'name'  => __('Ticket Phone Number', 'artistpress'),
                    'key'   => $this->settings,
                    'desc'  => __('Should a phone number to get tickets be displayed on the individual show page?', 'artistpress'),
                    'default' => 'yes'
                ]
            ],
            [
                'type'  => 'radio',
                'args'  => [
                    'slug'  => self::DISPLAY_TICKET_BUTTON,
                    'name'  => __('Ticket Button', 'artistpress'),
                    'key'   => $this->settings,
                    'desc'  => __('Should there be a button to get tickets displayed on the individual show page?', 'artistpress'),
                    'default' => 'yes'
                ]
            ],
            [
                'type'  => 'radio',
                'args'  => [
                    'slug'  => self::DISPLAY_ADDITIONAL_INFO,
                    'name'  => __('Additional Info', 'artistpress'),
                    'key'   => $this->settings,
                    'desc'  => __('Should the additional information section be displayed on the individual show page?', 'artistpress'),
                    'default' => 'yes'
                ]
            ],
            [
                'type'  => 'radio',
                'args'  => [
                    'slug'  => self::DISPLAY_VENUE,
                    'name'  => __('Display Venue', 'artistpress'),
                    'key'   => $this->settings,
                    'desc'  => __('Should the venue details section be displayed on the individual show page?', 'artistpress'),
                    'default' => 'yes'
                ]
            ],
            [
                'type'  => 'radio',
                'args'  => [
                    'slug'  => self::DISPLAY_VENUE_ADDRESS,
                    'name'  => __('Display Venue Address', 'artistpress'),
                    'key'   => $this->settings,
                    'desc'  => __('Should the venue address be displayed on the individual show page?', 'artistpress'),
                    'default' => 'yes'
                ]
            ],
            [
                'type'  => 'radio',
                'args'  => [
                    'slug'  => self::DISPLAY_VENUE_PHONE,
                    'name'  => __('Display Venue Phone', 'artistpress'),
                    'key'   => $this->settings,
                    'desc'  => __('Should the venue phone number be displayed on the individual show page?', 'artistpress'),
                    'default' => 'yes'
                ]
            ],
            [
                'type'  => 'radio',
                'args'  => [
                    'slug'  => self::DISPLAY_VENUE_WEBSITE,
                    'name'  => __('Venue Website Button', 'artistpress'),
                    'key'   => $this->settings,
                    'desc'  => __('Should there be a venue website button displayed on the individual show page?', 'artistpress'),
                    'default' => 'yes'
                ]
            ],
            [
                'type'  => 'radio',
                'args'  => [
                    'slug'  => self::DISPLAY_MAP,
                    'name'  => __('Display Map', 'artistpress'),
                    'key'   => $this->settings,
                    'desc'  => __('Should there be a map included on the show detail pages?', 'artistpress'),
                    'default' => 'no'
                ]
            ],
            [
                'type'  => 'radio',
                'args'  => [
                    'slug'  => self::DISPLAY_DIRECTIONS,
                    'name'  => __('Provide Directions', 'artistpress'),
                    'key'   => $this->settings,
                    'desc'  => __('Should there be a way for site visitors to get directions to the venues?', 'artistpress'),
                    'default' => 'no'
                ]
            ],
            [
                'type'  => 'text',
                'args'  => [
                    'slug'  => self::MAPS_API,
                    'name'  => __('Google Maps API Key', 'artistpress'),
                    'key'   => $this->settings,
                    'desc'  => __('A Google Maps API key is required. Visit our <a target="_blank" href="https://artistpress-plugin.com/documentation/">documentation</a> to learn how to get a API key.', 'artistpress'),
                    'default' => NULL
                ]
            ],
            [
                'type'  => 'radio',
                'args'  => [
                    'slug'  => self::USE_STYLE,
                    'name'  => __('Show Default Stylesheet', 'artistpress'),
                    'key'   => $this->settings,
                    'desc'  => __('Should the default show stylesheet be used to display the shows?', 'artistpress'),
                    'default' => 'yes'
                ]
            ],
            [
                'type'  => 'radio',
                'args'  => [
                    'slug'  => self::USE_SHORTCODE,
                    'name'  => __('Use Shortcodes for Shows', 'artistpress'),
                    'key'   => $this->settings,
                    'desc'  => __('Should shortcodes be used to display show details?', 'artistpress'),
                    'default' => 'no'
                ]
            ],
        ]);
    }
}
