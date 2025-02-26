<?php
namespace ArtistPress\Administration\Settings;

/**
 * Exit if accessed directly
 */	
if (!defined('ABSPATH')) {
	exit;
}

class ShowList extends Settings
{
    const OPTIONS = 'artistpress_show_list_settings';
    const TYPE = 'show_list_display';
	const ORDER = 'show_list_order';
	const DISPLAY_ARTIST = 'display_show_artist';
	const DISPLAY_VENUE = 'display_show_venue';
	const DISPLAY_TICKET_BUTTON = 'display_ticket_button';
	const TICKET_BUTTON_LABEL = 'show_ticket_button_label';
	const DISPLAY_INFO_BUTTON = 'display_info_button';
	const INFO_BUTTON_LABEL = 'show_info_button_label';
	const USE_STYLE = 'show_list_use_stylesheet';
	const USE_SHORTCODE = 'show_list_use_shortcode';


    public static function getSectionDescription()
    {
        \ob_start();

        echo '<p>These settings control the display of the ArtistPress Shows List.</p><p>The map settings for the shows are available on the <a href="?page=artistpress_settings&tab=show_settings">Individual Show Settings</a> tab.</p>';
        
        print \apply_filters(__METHOD__, \ob_get_clean());
    }

    public function getSectionFields()
    {
        return \apply_filters(__METHOD__, [
            [
                'type'  => 'radio',
                'args'  => [
                    'slug'  => self::TYPE,
                    'name'  => __('Show List Display', 'artistpress'),
                    'key'   => $this->settings,
                    'desc'  => 'Choose how your ArtistPress show listing is displayed.',
                    'options' => [
                        'show_date'     => 'Order by Date',
                        'show_venue'    => 'Order by Venue',
                        'show_artist'   => 'Order by Artist'
                    ],
                    'default' => 'show_date'
                ]
            ],
            [
                'type'  => 'radio',
                'args'  => [
                    'slug'  => self::ORDER,
                    'name'  => __('Show List Order', 'artistpress'),
                    'key'   => $this->settings,
                    'desc'  => __('Choose the order of your ArtistPress show list. Ascending (Z-A or 100-1 ) or Descending (A-Z or 1-100 ).', 'artistpress'),
                    'options' => [
                        'ASC'       => 'Ascending',
                        'DESC'      => 'Descending'
                    ],
                    'default' => 'ASC'
                ]
            ],
            [
                'type'  => 'radio',
                'args'  => [
                    'slug'  => self::DISPLAY_ARTIST,
                    'name'  => __('Artist Name', 'artistpress'),
                    'key'   => $this->settings,
                    'desc'  => __('Should the Artist Name be displayed on the show list? (If displayed by Artist this setting has no effect on the list.)', 'artistpress'),
                    'default' => 'yes'
                ]
            ],
            [
                'type'  => 'radio',
                'args'  => [
                    'slug'  => self::DISPLAY_VENUE,
                    'name'  => __('Venue Name', 'artistpress'),
                    'key'   => $this->settings,
                    'desc'  => __('Should the Venue Name be displayed on the show list? (If displayed by Venue this setting has no effect on the list.)', 'artistpress'),
                    'default' => 'yes'
                ]
            ],
            [
                'type'  => 'radio',
                'args'  => [
                    'slug'  => self::DISPLAY_TICKET_BUTTON,
                    'name'  => __('Ticket Button', 'artistpress'),
                    'key'   => $this->settings,
                    'desc'  => __('Should there be a button to get tickets on the show list?', 'artistpress'),
                    'default' => 'yes'
                ]
            ],
            [
                'type'  => 'text',
                'args'  => [
                    'slug'  => self::TICKET_BUTTON_LABEL,
                    'name'  => __('Ticket Button Label', 'artistpress'),
                    'key'   => $this->settings,
                    'desc'  => __('Enter a custom label for the Ticket buttons. Defaults to "Get Tickets".', 'artistpress'),
                    'default' => ''
                ]
            ],
            [
                'type'  => 'radio',
                'args'  => [
                    'slug'  => self::DISPLAY_INFO_BUTTON,
                    'name'  => __('More Info Button', 'artistpress'),
                    'key'   => $this->settings,
                    'desc'  => __('Should there be a button to get more info about the shows on the show list?', 'artistpress'),
                    'default' => 'yes'
                ]
            ],
            [
                'type'  => 'text',
                'args'  => [
                    'slug'  => self::INFO_BUTTON_LABEL,
                    'name'  => __('More Info Button Label', 'artistpress'),
                    'key'   => $this->settings,
                    'desc'  => __('Enter a custom label for the Information buttons. Defaults to "Additional Info".', 'artistpress'),
                    'default' => ''
                ]
            ],
            [
                'type'  => 'radio',
                'args'  => [
                    'slug'  => self::USE_STYLE,
                    'name'  => __('Show List Default Stylesheet', 'artistpress'),
                    'key'   => $this->settings,
                    'desc'  => __('Should the default show list stylesheet be used to display the shows?', 'artistpress'),
                    'default' => 'yes'
                ]
            ],
            [
                'type'  => 'radio',
                'args'  => [
                    'slug'  => self::USE_SHORTCODE,
                    'name'  => __('Use Shortcodes for Show List', 'artistpress'),
                    'key'   => $this->settings,
                    'desc'  => __('Should shortcodes be used to display the show list. This can be used to display the showlist on a page with a permalink other than "[domain]/shows". You will need to flush the permalinks <a href="'. get_bloginfo('url').'/wp-admin/options-permalink.php">here</a> after changing this setting.', 'artistpress'),
                    'default' => 'no'
                ]
            ],
        ]);
    }
}
