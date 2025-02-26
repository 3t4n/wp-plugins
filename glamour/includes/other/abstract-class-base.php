<?php

namespace glamour\other;

abstract class Base{
    public function get_default_media(){
        $media_list = array(
            'all' => array(
                'min' => '',
                'max' => '',
                'icon' => '',
                'view' => array(
                    'width' => '100%',
                    'height' => '100%'
                )
            ),
            'desktop' => array(
                'min' => '1200px',
                'max' => '',
                'icon' => 'fa fa-desktop',
                'view' => array(
                    'width' => '1300px',
                    'height' => '100%'
                )
            ),
            'Tablet Landscape' => array(
                'min' => '',
                'max' => '1199px',
                'icon' => 'fa fa-tablet-alt',
                'view' => array(
                    'width' => '1024px',
                    'height' => '768px'
                )
            ),
            'Tablet Portrait' => array(
                'min' => '',
                'max' => '991px',
                'icon' => 'fa fa-tablet-alt',
                'view' => array(
                    'width' => '768px',
                    'height' => '1024px'
                )
            ),
            'Phone Landscape' => array(
                'min' => '',
                'max' => '767px',
                'icon' => 'fa fa-mobile-alt',
                'view' => array(
                    'width' => '667px',
                    'height' => '375px'
                )
            ),
            'Phone Portrait' => array(
                'min' => '',
                'max' => '575px',
                'icon' => 'fa fa-mobile-alt',
                'view' => array(
                    'width' => '375px',
                    'height' => '667px'
                )
            ),
        );

        return $media_list;
    }

    public function get_default_color() {
        $colors = array(
            array(
                'color' => '#1abc9c',
                'label' => 'Turquoise',
            ),
            array(
                'color' => '#2ecc71',
                'label' => 'Emerald',
            ),
            array(
                'color' => '#3498db',
                'label' => 'Peter River',
            ),
            array(
                'color' => '#9b59b6',
                'label' => 'Amethyst',
            ),
            array(
                'color' => '#34495e',
                'label' => 'Wet Asphalt',
            ),
            array(
                'color' => '#16a085',
                'label' => 'Green Sea',
            ),
            array(
                'color' => '#27ae60',
                'label' => 'Nephritis',
            ),
            array(
                'color' => '#2980b9',
                'label' => 'Belize Hole',
            ),
            array(
                'color' => '#8e44ad',
                'label' => 'Wisteria',
            ),
            array(
                'color' => '#2c3e50',
                'label' => 'Midnight Blue',
            ),
            array(
                'color' => '#f1c40f',
                'label' => 'Sun Flower',
            ),
            array(
                'color' => '#e67e22',
                'label' => 'Carrot',
            ),
            array(
                'color' => '#e74c3c',
                'label' => 'Alizarin',
            ),
            array(
                'color' => '#ecf0f1',
                'label' => 'Clouds',
            ),
            array(
                'color' => '#95a5a6',
                'label' => 'Concrete',
            ),
            array(
                'color' => '#f39c12',
                'label' => 'Orange',
            ),
            array(
                'color' => '#d35400',
                'label' => 'Pumpkin',
            ),
            array(
                'color' => '#c0392b',
                'label' => 'Pomegranate',
            ),
            array(
                'color' => '#bdc3c7',
                'label' => 'Silver',
            ),
            array(
                'color' => '#7f8c8d',
                'label' => 'Asbestos',
            ),
        );

        return $colors;
    }

    public function get_option_name(){
        if(is_home()){
            return 'home';
        } else if(is_front_page()){
            return 'front-page';
        } else if(is_search()){
            return 'search';
        } else if(is_404()){
            return '404';
        } else if(is_category()){
            $term = get_queried_object();
            return 'cat-' . $term->term_id;
        } else if(is_tag()){
            $term = get_queried_object();
            return 'tag-' . $term->term_id;
        } else if(is_author()){
            return 'author-' . get_the_author_meta('ID');
        } else if(is_year()){
            return 'year-' . get_the_date( _x( 'Y', 'yearly archives date format' ) );
        } else if(is_month()){
            return 'month-' . get_the_date( _x( 'Ym', 'monthly archives date format' ) );
        } else if(is_day()){
            return 'date-' . get_the_date( _x( 'Ymd', 'monthly archives date format' ) );
        } elseif ( is_tax( 'post_format' ) ) {
            if ( is_tax( 'post_format', 'post-format-aside' ) ) {
                return 'post-format-aside';
            } elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
                return 'post-format-gallery';
            } elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
                return 'post-format-image';
            } elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
                return 'post-format-video';
            } elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
                return 'post-format-quote';
            } elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
                return 'post-format-link';
            } elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
                return 'post-format-status';
            } elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
                return 'post-format-audio';
            } elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
                return 'post-format-chat';
            }
        } elseif ( is_post_type_archive() ) {
            $post_type = get_query_var( 'post_type' );
            return 'post-type-' . $post_type;
        } elseif ( is_tax() ) {
            $term = get_queried_object();
            return 'tax-' . $term->term_id;
        } else {
            return '';
        }
    }
}