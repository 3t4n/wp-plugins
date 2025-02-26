<?php
namespace ArtistPress\Administration\Meta;

/**
 * Exit if accessed directly
 */	
if (!defined('ABSPATH')) {
	exit;
}

class Venue extends MetaBox
{
    public function getFields()
    {
        return \apply_filters(__METHOD__, [
            [
                'label' => __('Address', 'artistpress'),
                'desc'  => __('Enter the street address of the venue.', 'artistpress'),
                'id'    =>  self::FIELD_PREFIX .'venue_address',
                'type'  => 'text'
            ],
            [
                'label' => __('City', 'artistpress'),
                'desc'  => __('Enter the city where the venue is located.', 'artistpress'),
                'id'    =>  self::FIELD_PREFIX .'venue_city',
                'type'  => 'text'
            ],
            [
                'label' => __('State/Province', 'artistpress'),
                'desc'  => __('Enter the state/province where the venue is located.', 'artistpress'),
                'id'    =>  self::FIELD_PREFIX .'venue_state',
                'type'  => 'text'
            ],
            [
                'label' => __('Zip Code', 'artistpress'),
                'desc'  => __('Enter the zip code where the venue is located.', 'artistpress'),
                'id'    =>  self::FIELD_PREFIX .'venue_postal_code',
                'type'  => 'text'
            ],
            [
                'label' => __('Country', 'artistpress'),
                'desc'  => __('Enter the country where the venue is located.', 'artistpress'),
                'id'    =>  self::FIELD_PREFIX .'venue_country',
                'type'  => 'text'
            ],
            [
                'label' => __('Coordinates', 'artistpress'),
                'desc'  => __('Click button to get latitude & longitude for venue map function.', 'artistpress'),
                'id'    =>  self::FIELD_PREFIX .'venue_latlng',
                'type'  => 'geocode'
            ],
            [
                'label' => __('Web Address', 'artistpress'),
                'desc'  => __('If the venue has a website enter the address here.', 'artistpress'),
                'id'    =>  self::FIELD_PREFIX .'venue_website',
                'type'  => 'url'
            ],    
            [
                'label' => __('Telephone', 'artistpress'),
                'desc'  => __('If the venue has a telephone number enter it here.', 'artistpress'),
                'id'    =>  self::FIELD_PREFIX .'venue_telephone',
                'type'  => 'tel'
            ],            
        ]);
    }
}

