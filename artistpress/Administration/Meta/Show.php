<?php
namespace ArtistPress\Administration\Meta;

/**
 * Exit if accessed directly
 */	
if (!defined('ABSPATH')) {
	exit;
}

class Show extends MetaBox
{
    public function getFields()
    {
        return \apply_filters(__METHOD__, [
            [
                'label' => __('Show Date', 'artistpress'),
                'desc'  => __('Enter the date of the show.', 'artistpress'),
                'id'    =>  self::FIELD_PREFIX .'show_date',
                'type'  => 'date'
            ],
            [
                'label' => __('Show Time', 'artistpress'),
                'desc'  => __('Enter the time the event starts.', 'artistpress'),
                'id'    =>  self::FIELD_PREFIX .'show_time',
                'type'  => 'text'
            ],
            [
                'label' => __('Artist *', 'artistpress'),
                'desc'  => __('Choose the Show Artist.', 'artistpress'),
                'id'    =>  self::FIELD_PREFIX .'show_artist',
                'type'  => 'post_select',
                'post_type' => ['artist']
            ],
            [
                'label' => __('Venue *', 'artistpress'),
                'desc'  => __('Choose the Show Venue.', 'artistpress'),
                'id'    =>  self::FIELD_PREFIX .'show_venue',
                'type'  => 'post_select',
                'post_type' => ['venue']
            ],
            [
                'label' => __('Show Type *', 'artistpress'),
                'desc'  => __('Choose the type of show.', 'artistpress'),
                'id'    =>  self::FIELD_PREFIX .'show_type',
                'type'  => 'select',
                'options' => [
                    [
                        'label' => 'Not Sure',
                        'value' => 'not-sure'
                    ],
                    [
                        'label' => 'All Ages',
                        'value' => 'all-ages'
                    ],
                    [
                        'label' => 'All Ages Licensed',
                        'value' => 'all-ages-licensed'
                    ],
                    [
                        'label' => 'No Minors',
                        'value' => 'no-minors'
                    ],
                ]
            ],
            [
                'label' => __('Price', 'artistpress'),
                'desc'  => __('If there is an admision price, enter it here.', 'artistpress'),
                'id'    =>  self::FIELD_PREFIX .'show_price',
                'type'  => 'text'
            ],
            [
                'label' => __('Ticket Phone', 'artistpress'),
                'desc'  => __('If tickets are available via phone, enter it here.', 'artistpress'),
                'id'    =>  self::FIELD_PREFIX .'ticket_phone',
                'type'  => 'tel'
            ],    
            [
                'label' => __('Ticket Website', 'artistpress'),
                'desc'  => __('If tickets are available via the web, enter the address here.', 'artistpress'),
                'id'    =>  self::FIELD_PREFIX .'ticket_url',
                'type'  => 'url'
            ],
            [
                'label' => __('Additional Information', 'artistpress'),
                'desc'  => __('If there is additional information, like supporting acts, additional artists showing, etc.., enter that information here.', 'artistpress'),
                'id'    =>  self::FIELD_PREFIX .'show_add_info',
                'type'  => 'editor',
                'setting' => []
            ],
            [
                'label' => NULL,
                'desc'  => '',
                'id'    =>  self::FIELD_PREFIX .'show_artist_name',
                'type'  => 'hidden'
            ],
            [
                'label' => NULL,
                'desc'  => '',
                'id'    =>  self::FIELD_PREFIX .'show_venue_name',
                'type'  => 'hidden'
            ],            
        ]);
    }
}

