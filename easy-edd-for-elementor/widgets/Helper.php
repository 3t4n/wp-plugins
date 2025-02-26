<?php
namespace EasyEddForElementor\Widgets;

class Helper {
    public static function getEddCategories ()
    {
        $categories = get_terms( 'download_category', array(
            'hide_empty' => false,
        ) );

        $options = [];

        foreach ( $categories as $category ) {
            $options[ $category->slug ] = $category->name;
        }

        return $options;
    }

    public static function getEddTags ()
    {
        $tags = get_terms( 'download_tag', array(
            'hide_empty' => false,
        ) );

        $options = [];

        foreach ( $tags as $tag ) {
            $options[ $tag->slug ] = $tag->name;
        }

        return $options;
    }
}