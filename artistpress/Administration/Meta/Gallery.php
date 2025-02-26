<?php
namespace ArtistPress\Administration\Meta;

/**
 * Exit if accessed directly
 */	
if (!defined('ABSPATH')) {
	exit;
}

class Gallery extends MetaBox
{
    public function getFields()
    {
        return \apply_filters(__METHOD__, [
            [
                'label'     => __('Images', 'artistpress'),
                'id'        =>  self::FIELD_PREFIX .'images',
                'type'      => 'repeatable',
                'sanitizer' => [
                    'featured'  => 'meta_box_santitize_boolean',
                    'title'     => 'sanitize_text_field',
                    'desc'      => 'wp_kses_data'
                ],
                'repeatable_fields' => [
                    [
                        'label' => __('Image', 'artistpress'),
                        'id'    => 'image',
                        'type'  => 'image'
                    ]
                ]
            ]  
        ]);
    }
}
