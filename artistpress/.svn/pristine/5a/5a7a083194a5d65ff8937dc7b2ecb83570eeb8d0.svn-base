<?php
namespace ArtistPress\Administration\Meta;

/**
 * Exit if accessed directly
 */	
if (!defined('ABSPATH')) {
	exit;
}

class Artist extends MetaBox
{
    public function getFields()
    {
        return \apply_filters(__METHOD__, [
            [
                'label' => __('Phone', 'artistpress'),
                'desc'  => __('Enter the best phone number for contacting the artist.', 'artistpress'),
                'id'    =>  self::FIELD_PREFIX .'artist_phone_number',
                'type'  => 'tel'
            ],
            [
                'label' => __('Email Address', 'artistpress'),
                'desc'  => __('Enter the best email address for contacting the artist.', 'artistpress'),
                'id'    =>  self::FIELD_PREFIX .'artist_email_address',
                'type'  => 'email'
            ],
            [
                'label' => __('Web Address', 'artistpress'),
                'desc'  => __('If the artist has a website enter the address here.', 'artistpress'),
                'id'    =>  self::FIELD_PREFIX .'artist_web_address',
                'type'  => 'url'
            ],
            [
                'label' => __('Biography', 'artistpress'),
                'desc'  => __('Enter the artist\'s bio or artist statement here.', 'artistpress'),
                'id'    =>  self::FIELD_PREFIX .'artist_bio',
                'type'  => 'editor',
                'settings'   => [
                    'media_buttons' => false,
                    'quicktags' => false
                ]
            ],
            
        ]);
    }
}
