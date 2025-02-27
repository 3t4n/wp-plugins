<?php

/*
Widget Name: E: Product Box
Description: Display a Product from your shop.
Author: Echelon
Author URI: https://echelonso.com
Documentation: https://echelonso.com/widgets/product-box/
*/

class EchelonSOProductBox extends SiteOrigin_Widget {

    function __construct() {
        parent::__construct(
            'eso-product-box',
            __('E: Product Box', EsoWidgetFormPart::text_domain()),
            array(
                'description' => __('Display a Product from your shop.', EsoWidgetFormPart::text_domain() ),
                'help' => 'https://echelonso.com/widgets/product-category-box/',
                'panels_groups' => array('eso_woo'),
            ),
            array(),
            false,
            plugin_dir_path(__FILE__)
        );
    }

    /*
    * Template File
    */

    function get_template_name($instance) {
        $template_name = $instance['settings']['layout'];
        $allowed_templates = array('simple', 'badge');
        if ( in_array($template_name, $allowed_templates) ) {
            return $template_name;
        }
        return 'simple';
    }

    /*
    * LESS File
    */

    function get_style_name($instance) {
        $template_name = $instance['settings']['layout'];
        $allowed_templates = array('simple', 'badge');
        if ( in_array($template_name, $allowed_templates) ) {
            return $template_name;
        }
        return 'simple';
    }

    /*
    * Template Variables
    */

    function get_template_variables($instance, $args) {

        // image size
        $image_size = empty( $instance['settings']['image_size'] ) ? 'full' : $instance['settings']['image_size'];
        $return['image_size'] = $image_size;

        // image mode
        $return['image_mode'] = $instance['settings']['image_mode'];

        // direct
        if ( $instance['settings']['mode'] == 'direct' ) {

            if ( !empty($instance['settings']['product']) ) {

                $return['has_product'] = true;

                $image = get_the_post_thumbnail_url($instance['settings']['product'], $image_size);
                $return['image'] = $image;

                $return['product_id'] = $instance['settings']['product'];

                $return['link'] = get_permalink($instance['settings']['product']);

            } else {

                $return['has_product'] = false;

            }

        }

        // recent
        if ( $instance['settings']['mode'] == 'recent' ) {

            $return['has_product'] = true;

            if ( !empty($instance['settings']['category']) ) {

                $tax_query = array(
                    array(
                        'taxonomy' => 'product_cat',
                        'terms' => $instance['settings']['category'],
                        'operator' => 'IN',
                    )
                );

            } else {

                $tax_query = array();

            }

            $args = array(
                'post_type'  => 'product',
                'orderby'    => 'date',
                'order'      => 'DESC',
                'posts_per_page' => 10,
                'tax_query'  => $tax_query
            );

            $products = get_posts( $args );

            if ( empty($products) ) {

                $return['has_product'] = false;

            } else {

                if ( !empty($instance['settings']['offset']) && !empty($products[(int)$instance['settings']['offset'] - 1]) ) {

                    $return['product_id'] = $products[(int)$instance['settings']['offset'] - 1]->ID;

                    $image = get_the_post_thumbnail_url($return['product_id'], $image_size);
                    $return['link'] = get_permalink($return['product_id']);

                    $return['image'] = $image;

                } else {

                    $return['has_product'] = false;

                }

            }

        }

        // best sellers
        if ( $instance['settings']['mode'] == 'best_seller' ) {

            $return['has_product'] = true;

            if ( !empty($instance['settings']['category']) ) {

                $tax_query = array(
                    array(
                        'taxonomy' => 'product_cat',
                        'terms' => $instance['settings']['category'],
                        'operator' => 'IN',
                    )
                );

            } else {

                $tax_query = array();

            }

            $args = array(
                'post_type'  => 'product',
                'orderby'    => 'date',
                'order'      => 'DESC',
                'posts_per_page' => 10,
                'meta_key' => 'total_sales',
                'orderby'   => array( 'meta_value_num' => 'DESC', 'title' => 'ASC' ),
                'tax_query'  => $tax_query
            );

            $products = get_posts( $args );

            if ( empty($products) ) {

                $return['has_product'] = false;

            } else {

                if ( !empty($instance['settings']['offset']) && !empty($products[(int)$instance['settings']['offset'] - 1]) ) {

                    $return['product_id'] = $products[(int)$instance['settings']['offset'] - 1]->ID;

                    $image = get_the_post_thumbnail_url($return['product_id'], $image_size);
                    $return['link'] = get_permalink($return['product_id']);


                    $return['image'] = $image;

                } else {

                    $return['has_product'] = false;

                }

            }

        }

        // image
        $return['image_class'][] = 'eso';
        (empty($instance['settings']['image_transition'])) ?: $return['image_class'][] = $instance['settings']['image_transition'];
        $return['swap_class'][] = 'eso';
        (empty($instance['settings']['swap_mode'])) ?: $return['swap_class'][] = $instance['settings']['swap_mode'];

        // name
        $return['name_class'][] = 'eso';
        (empty($instance['name']['text_align'])) ?: $return['name_class'][] = $instance['name']['text_align'];
        (empty($instance['name']['text_transform'])) ?: $return['name_class'][] = $instance['name']['text_transform'];
        (empty($instance['name']['font_size'])) ?: $return['name_class'][] = $instance['name']['font_size'];
        (empty($instance['name']['font_weight'])) ?: $return['name_class'][] = $instance['name']['font_weight'];
        $return['name_visibility'] = $instance['name']['visibility'];

        // category
        $return['category_class'][] = 'eso';
        (empty($instance['category']['text_align'])) ?: $return['category_class'][] = $instance['category']['text_align'];
        (empty($instance['category']['text_transform'])) ?: $return['category_class'][] = $instance['category']['text_transform'];
        (empty($instance['category']['font_size'])) ?: $return['category_class'][] = $instance['category']['font_size'];
        (empty($instance['category']['font_weight'])) ?: $return['category_class'][] = $instance['category']['font_weight'];
        $return['category_visibility'] = $instance['category']['visibility'];

        // Price
        $return['price_class'][] = 'eso';
        (empty($instance['price']['text_align'])) ?: $return['price_class'][] = $instance['price']['text_align'];
        (empty($instance['price']['text_transform'])) ?: $return['price_class'][] = $instance['price']['text_transform'];
        (empty($instance['price']['font_size'])) ?: $return['price_class'][] = $instance['price']['font_size'];
        (empty($instance['price']['font_weight'])) ?: $return['price_class'][] = $instance['price']['font_weight'];
        $return['price_visibility'] = $instance['price']['visibility'];

        // description
        $return['description_class'][] = 'eso';
        (empty($instance['description']['text_align'])) ?: $return['description_class'][] = $instance['description']['text_align'];
        (empty($instance['description']['text_transform'])) ?: $return['description_class'][] = $instance['description']['text_transform'];
        (empty($instance['description']['font_size'])) ?: $return['description_class'][] = $instance['description']['font_size'];
        (empty($instance['description']['font_weight'])) ?: $return['description_class'][] = $instance['description']['font_weight'];
        $return['description_visibility'] = $instance['description']['visibility'];

        // cover
        if ( $instance['settings']['layout'] == 'cover' || $instance['settings']['layout'] == 'cover_boxed' ) {
            $return['name_count_class'][] = 'eso';
            (empty($instance['cover']['position'])) ?: $return['cover_position_class'][] = $instance['cover']['position'];
            (empty($instance['cover']['position_size'])) ?: $return['cover_position_class'][] = $instance['cover']['position_size'];
            $return['overlay_class'][] = 'eso';
            (empty($instance['cover']['overlay'])) ?: $return['overlay_class'][] = $instance['cover']['overlay'];

            if ( empty($instance['cover']['hide_name']) ) {
                $return['name_class'][] = 'uk-transition-opaque';
            }
            (empty($instance['cover']['name_transition'])) ?: $return['name_class'][] = $instance['cover']['name_transition'];

            if ( empty($instance['cover']['hide_category']) ) {
                $return['category_class'][] = 'uk-transition-opaque';
            }
            (empty($instance['cover']['category_transition'])) ?: $return['category_class'][] = $instance['cover']['category_transition'];

            if ( empty($instance['cover']['hide_price']) ) {
                $return['price_class'][] = 'uk-transition-opaque';
            }

            (empty($instance['cover']['padding'])) ?: $return['overlay_class'][] = $instance['cover']['padding'];
            (empty($instance['cover']['border_radius'])) ?: $return['overlay_class'][] = $instance['cover']['border_radius'];

        }

        // overlay
        if ( $instance['settings']['layout'] == 'overlay' || $instance['settings']['layout'] == 'overlay_boxed' ) {

            $return['overlay_position_class'][] = 'eso';
            (empty($instance['overlay']['position'])) ?: $return['overlay_position_class'][] = $instance['overlay']['position'];
            (empty($instance['overlay']['position_size'])) ?: $return['overlay_position_class'][] = $instance['overlay']['position_size'];

            $return['overlay_class'][] = 'eso';
            (empty($instance['overlay']['overlay'])) ?: $return['overlay_class'][] = $instance['overlay']['overlay'];

            if ( empty($instance['overlay']['hide_name']) ) {
                $return['name_class'][] = 'uk-transition-opaque';
            }
            (empty($instance['overlay']['name_transition'])) ?: $return['name_class'][] = $instance['overlay']['name_transition'];

            if ( empty($instance['overlay']['hide_category']) ) {
                $return['category_class'][] = 'uk-transition-opaque';
            }
            (empty($instance['overlay']['category_transition'])) ?: $return['category_class'][] = $instance['overlay']['category_transition'];

            if ( empty($instance['overlay']['hide_price']) ) {
                $return['price_class'][] = 'uk-transition-opaque';
            }
            (empty($instance['overlay']['price_transition'])) ?: $return['price_class'][] = $instance['overlay']['price_transition'];

            (empty($instance['overlay']['padding'])) ?: $return['overlay_class'][] = $instance['overlay']['padding'];
            (empty($instance['overlay']['border_radius'])) ?: $return['overlay_class'][] = $instance['overlay']['border_radius'];

        }

        // Wide
        if ( $instance['settings']['layout'] == 'wide' ) {

            if ( empty($instance['wide']['hide_name']) ) {
                $return['name_class'][] = 'uk-transition-opaque';
            }
            (empty($instance['wide']['name_transition'])) ?: $return['name_class'][] = $instance['wide']['name_transition'];

            if ( empty($instance['wide']['hide_category']) ) {
                $return['category_class'][] = 'uk-transition-opaque';
            }
            (empty($instance['wide']['category_transition'])) ?: $return['category_class'][] = $instance['wide']['category_transition'];

            if ( empty($instance['wide']['hide_description']) ) {
                $return['description_class'][] = 'uk-transition-opaque';
            }
            (empty($instance['wide']['description_transition'])) ?: $return['description_class'][] = $instance['wide']['description_transition'];

            $return['left_column_class'][] = 'eso';
            $return['right_column_class'][] = 'eso';

            if ( $instance['wide']['left_column'] == 'uk-width-1-2' ) {
                $return['left_column_class'][] = 'uk-width-1-2';
                $return['right_column_class'][] = 'uk-width-1-2';
            } elseif ( $instance['wide']['left_column'] == 'uk-width-1-3' ) {
                $return['left_column_class'][] = 'uk-width-1-3';
                $return['right_column_class'][] = 'uk-width-2-3';
            } elseif ( $instance['wide']['left_column'] == 'uk-width-1-4' ) {
                $return['left_column_class'][] = 'uk-width-1-4';
                $return['right_column_class'][] = 'uk-width-3-4';
            }

            $return['flex_class'][] = 'eso';
            (empty($instance['wide']['vertical_align'])) ?: $return['flex_class'][] = $instance['wide']['vertical_align'];

        }

        // discount
        $return['discount_visibility'] = $instance['discount']['discount_visibility'];
        $return['discount_class'][] = 'eso';
        (empty($instance['discount']['position'])) ?: $return['discount_class'][] = $instance['discount']['position'];
        (empty($instance['discount']['position_size'])) ?: $return['discount_class'][] = $instance['discount']['position_size'];
        (empty($instance['discount']['font_size'])) ?: $return['discount_class'][] = $instance['discount']['font_size'];
        (empty($instance['discount']['font_weight'])) ?: $return['discount_class'][] = $instance['discount']['font_weight'];

        // slider
        $return['nav_visibility'] = $instance['slidenav']['nav_visibility'];
        $return['autoplay'] = empty( $instance['slidenav']['slider_autoplay'] ) ? 'false' : 'true';
        $return['autoplay_interval'] = intval($instance['slidenav']['autoplay_interval']) * 1000;
        $return['slidenav_class'][] = 'eso';
        (empty($instance['slidenav']['position'])) ?: $return['slidenav_class'][] = $instance['slidenav']['position'];
        (empty($instance['slidenav']['position_size'])) ?: $return['slidenav_class'][] = $instance['slidenav']['position_size'];
        (empty($instance['slidenav']['nav_hidden_hover'])) ?: $return['slidenav_class'][] = 'uk-hidden-hover';
        (empty($instance['slidenav']['nav_hidden_touch'])) ?: $return['slidenav_class'][] = 'uk-hidden-Touch';

        return $return;

    }

    /*
    * Less Variables
    */

    function get_less_variables($instance) {

        $less_vars = array();

        $less_vars['name_color'] = isset( $instance['name']['color'] ) ? $instance['name']['color'] : false;
        $less_vars['name_margin'] = isset( $instance['name']['margin'] ) ? $instance['name']['margin'] : false;

        $less_vars['category_color'] = isset( $instance['category']['color'] ) ? $instance['category']['color'] : false;
        $less_vars['category_margin'] = isset( $instance['category']['margin'] ) ? $instance['category']['margin'] : false;

        $less_vars['description_color'] = isset( $instance['description']['color'] ) ? $instance['description']['color'] : false;
        $less_vars['description_margin'] = isset( $instance['description']['margin'] ) ? $instance['description']['margin'] : false;

        $less_vars['price_color'] = isset( $instance['price']['color'] ) ? $instance['price']['color'] : false;
        $less_vars['price_margin'] = isset( $instance['price']['margin'] ) ? $instance['price']['margin'] : false;

        $less_vars['arrow_background_color'] = isset( $instance['slidenav']['arrow_background_color'] ) ? $instance['slidenav']['arrow_background_color'] : false;
        $less_vars['arrow_color'] = isset( $instance['slidenav']['arrow_color'] ) ? $instance['slidenav']['arrow_color'] : false;
        $less_vars['arrow_hover_color'] = isset( $instance['slidenav']['arrow_hover_color'] ) ? $instance['slidenav']['arrow_hover_color'] : false;
        $less_vars['arrow_padding'] = isset( $instance['slidenav']['arrow_padding'] ) ? $instance['slidenav']['arrow_padding'] : false;

        // badge
        if ( $instance['settings']['layout'] == 'badge' ) {
            $less_vars['badge_hover_text_color'] = isset( $instance['badge']['hover_text_color'] ) ? $instance['badge']['hover_text_color'] : false;
            $less_vars['badge_background_color'] = isset( $instance['badge']['background_color'] ) ? $instance['badge']['background_color'] : false;
            $less_vars['badge_hover_background_color'] = isset( $instance['badge']['hover_background_color'] ) ? $instance['badge']['hover_background_color'] : false;
        }

        // overlay
        if ( $instance['settings']['layout'] == 'overlay') {
            $less_vars['overlay_background_color'] = isset( $instance['overlay']['overlay_background_color'] ) ? $instance['overlay']['overlay_background_color'] : false;
            $less_vars['overlay_hover_background_color'] = isset( $instance['overlay']['overlay_hover_background_color'] ) ? $instance['overlay']['overlay_hover_background_color'] : false;
            $less_vars['overlay_hover_text_color'] = isset( $instance['overlay']['overlay_hover_text_color'] ) ? $instance['overlay']['overlay_hover_text_color'] : false;
        }

        // cover
        if ( $instance['settings']['layout'] == 'cover' || $instance['settings']['layout'] == 'cover_boxed') {

            $less_vars['tablet_breakpoint'] = siteorigin_panels_setting()['tablet-width'] . 'px';
            $less_vars['mobile_breakpoint'] = siteorigin_panels_setting()['mobile-width'] . 'px';

            $less_vars['desktop_height'] = isset( $instance['cover']['desktop_height'] ) ? $instance['cover']['desktop_height'] : false;
            $less_vars['tablet_height'] = isset( $instance['cover']['tablet_height'] ) ? $instance['cover']['tablet_height'] : false;
            $less_vars['mobile_height'] = isset( $instance['cover']['mobile_height'] ) ? $instance['cover']['mobile_height'] : false;

            $less_vars['overlay_background_color'] = isset( $instance['cover']['overlay_background_color'] ) ? $instance['cover']['overlay_background_color'] : false;
            $less_vars['overlay_hover_background_color'] = isset( $instance['cover']['overlay_hover_background_color'] ) ? $instance['cover']['overlay_hover_background_color'] : false;
            $less_vars['overlay_hover_text_color'] = isset( $instance['cover']['overlay_hover_text_color'] ) ? $instance['cover']['overlay_hover_text_color'] : false;

        }

        // discount
        $less_vars['discount_color'] = isset( $instance['discount']['color'] ) ? $instance['discount']['color'] : false;
        $less_vars['discount_background_color'] = isset( $instance['discount']['background'] ) ? $instance['discount']['background'] : false;
        $less_vars['discount_padding'] = isset( $instance['discount']['padding'] ) ? $instance['discount']['padding'] : false;

        return $less_vars;

    }

    /*
    * Widget Form
    */

    function get_widget_form() {

        $return['settings'] = EsoWidgetFormCorePart::section('Settings', array(
            'mode' => EsoWidgetFormCorePart::select('Selection Mode', 'How the product should be selected.', 'direct', array(
                'direct' => __( 'Direct', EsoWidgetFormPart::text_domain() ),
                'recent' => __( 'Recent', EsoWidgetFormPart::text_domain() ),
                'best_seller' => __( 'Best Seller', EsoWidgetFormPart::text_domain() ),
            ), array(

            ), array(
                'callback' => 'select',
                'args' => array('mode')
            )),
            'product' => EsoWidgetFormCorePart::select('Product', 'The product to use for the box.', '', EsoWidgetFormPart::get_wc_product_select_options(), array(
                'mode[direct]' => array('show'),
                '_else[mode]' => array('hide'),
            )),
            'category' => EsoWidgetFormCorePart::select('Product Category', 'Choose to restrict products to this category.', '', EsoWidgetFormPart::get_wc_categoy_select_options(), array(
                'mode[recent]' => array('show'),
                'mode[best_seller]' => array('show'),
                '_else[mode]' => array('hide'),
            )),
            'offset' => EsoWidgetFormCorePart::slider('Offset', 'Offset the selection to products other than the most recent.', 1, 1, 20, true, array(
                'mode[recent]' => array('show'),
                'mode[best_seller]' => array('show'),
                '_else[mode]' => array('hide'),
            )),
            'layout' => EsoWidgetFormCorePart::select('Layout', 'Choose which layout to use for the box. Slienavs are not supported with Cover layouts.' . EsoWidgetFormPart::important() , 'simple', array(
                'simple' => __('Simple', EsoWidgetFormPart::text_domain()),
                'badge' => __('Badge', EsoWidgetFormPart::text_domain() ),
                'overlay' => __('Overlay' . EsoWidgetFormPart::prime_tag(), EsoWidgetFormPart::text_domain() ),
                'cover' => __('Cover' . EsoWidgetFormPart::prime_tag(), EsoWidgetFormPart::text_domain() ),
                'cover_boxed' => __('Cover Boxed' . EsoWidgetFormPart::prime_tag(), EsoWidgetFormPart::text_domain() ),
                'wide' => __('Wide' . EsoWidgetFormPart::prime_tag(), EsoWidgetFormPart::text_domain() ),
            ), array(

            ), array(
                'callback' => 'select',
                'args' => array('layout')
            )),
            'image_size' => EsoWidgetFormCorePart::image_size('Image Size', 'Choose the size of the image to use when generating the box.', 'ESO-720x900-Crop'),
            'image_mode' => EsoWidgetFormCorePart::select('Image Mode', 'Swap requires at least 1 gallery image. Slider requires at least 2 gallery images.' . EsoWidgetFormPart::important(), '0', array(
                '0' => __('-', EsoWidgetFormPart::text_domain()),
                'swap' => __('Swap', EsoWidgetFormPart::text_domain()),
                'slider' => __('Slider', EsoWidgetFormPart::text_domain())
            ), array(

            ), array(
                'callback' => 'select',
                'args' => array('image_mode')
            )),
            'image_transition' => EsoWidgetFormCorePart::select('Image Transition', 'Choose if a hover transition should be added to the box images.', '0', array(
                '0' => __('-', EsoWidgetFormPart::text_domain()),
                'uk-transition-scale-up' => __('Scale Up', EsoWidgetFormPart::text_domain())
            )),
            'swap_mode' => EsoWidgetFormPart::uikit('transition', 'Swap Mode', 'The featured image will be swapped with the 1st gallery image.', 'uk-transition-fade', array(
                'image_mode[swap]' => array( 'show' ),
                '_else[image_mode]' => array( 'hide' ),
            ))
        ));

        $return['name'] = EsoWidgetFormCorePart::section('Name', array(
            'visibility' => EsoWidgetFormPart::binary('Visibility', 'Show or hide the name.', '1', 'Show', 'Hide'),
            'color' => EsoWidgetFormCorePart::color(),
            'font_weight' => EsoWidgetFormPart::uikit('font_weight'),
            'font_size' => EsoWidgetFormPart::uikit('font_size'),
            'margin' => EsoWidgetFormCorePart::multi_measurement('Margin', 'Set margins for the name.'),
            'text_align' => EsoWidgetFormPart::uikit('text_align'),
            'text_transform' => EsoWidgetFormPart::uikit('text_transform')
        ));

        $return['category'] = EsoWidgetFormCorePart::section('Category', array(
            'visibility' => EsoWidgetFormPart::binary('Visibility', 'Show or hide the category.', '1', 'Show', 'Hide'),
            'color' => EsoWidgetFormCorePart::color(),
            'font_weight' => EsoWidgetFormPart::uikit('font_weight'),
            'font_size' => EsoWidgetFormPart::uikit('font_size'),
            'margin' => EsoWidgetFormCorePart::multi_measurement('Margin', 'Set margins for the category.'),
            'text_align' => EsoWidgetFormPart::uikit('text_align'),
            'text_transform' => EsoWidgetFormPart::uikit('text_transform')
        ));

        $return['price'] = EsoWidgetFormCorePart::section('Price', array(
            'visibility' => EsoWidgetFormPart::binary('Visibility', 'Show or hide the price.', '1', 'Show', 'Hide'),
            'color' => EsoWidgetFormCorePart::color(),
            'font_weight' => EsoWidgetFormPart::uikit('font_weight'),
            'font_size' => EsoWidgetFormPart::uikit('font_size'),
            'margin' => EsoWidgetFormCorePart::multi_measurement('Margin', 'Set margins for the name.'),
            'text_align' => EsoWidgetFormPart::uikit('text_align'),
            'text_transform' => EsoWidgetFormPart::uikit('text_transform')
        ));

        $return['description'] = EsoWidgetFormCorePart::section('Description' . EsoWidgetFormPart::prime_tag(), array(
            'visibility' => EsoWidgetFormPart::binary('Visibility', 'Show or hide the short description.', '1', 'Show', 'Hide'),
            'color' => EsoWidgetFormCorePart::color(),
            'font_weight' => EsoWidgetFormPart::uikit('font_weight'),
            'font_size' => EsoWidgetFormPart::uikit('font_size'),
            'margin' => EsoWidgetFormCorePart::multi_measurement('Margin', 'Set margins for the description.'),
            'text_align' => EsoWidgetFormPart::uikit('text_align'),
            'text_transform' => EsoWidgetFormPart::uikit('text_transform')
        ), array(
            'layout[wide]' => array('show'),
            '_else[layout]' => array('hide'),
        ));

        $return['slidenav'] = EsoWidgetFormCorePart::section('Slide Nav', array(
            'slider_autoplay' => EsoWidgetFormPart::binary('Autoplay', 'Autoplay the slides.', '0', 'Yes', 'No'),
            'autoplay_interval' => EsoWidgetFormCorePart::slider('Autoplay Interval', 'Time between slide changes in seconds.', 5, 1, 10, true),
            'nav_visibility' => EsoWidgetFormPart::binary('Arrow Visibility', 'Show or hide the arrow controls.', '1', 'Show', 'Hide', array(
                'layout[cover]' => array( 'hide' ),
                '_else[image_mode]' => array( 'show' ),
            )),
            'nav_hidden_hover' => EsoWidgetFormPart::binary('Arrows Use Hidden Hover', 'Only show the arrows on hover.', '0', 'Yes', 'No', array(
                'layout[cover]' => array( 'hide' ),
                '_else[image_mode]' => array( 'show' ),
            )),
            'nav_hidden_touch' => EsoWidgetFormPart::binary('Arrows Use Hidden Touch', 'Hide the the arrows on touch enabled devices.', '1', 'Yes', 'No', array(
                'layout[cover]' => array( 'hide' ),
                '_else[image_mode]' => array( 'show' ),
            )),
            'position' => EsoWidgetFormPart::uikit('position_corners', '', '', 'uk-position-top-left', array(
                'layout[cover]' => array( 'hide' ),
                '_else[image_mode]' => array( 'show' ),
            )),
            'position_size' => EsoWidgetFormPart::uikit('position_size', '', '', '0', array(
                'layout[cover]' => array( 'hide' ),
                '_else[image_mode]' => array( 'show' ),
            )),
            'arrow_color' => EsoWidgetFormPart::rgba('Arrow Color', 'The default color for the nav arrows.', EsoWidgetFormPart::default_color('primary'), array(
                'layout[cover]' => array( 'hide' ),
                '_else[image_mode]' => array( 'show' ),
            )),
            'arrow_hover_color' => EsoWidgetFormPart::rgba('Arrow Hover Color', 'The hover and focus color for the nav arrows.', EsoWidgetFormPart::default_color('primary'), array(
                'layout[cover]' => array( 'hide' ),
                '_else[image_mode]' => array( 'show' ),
            )),
            'arrow_background_color' => EsoWidgetFormPart::rgba('Arrow Background Color', 'The background color for the arrows.', EsoWidgetFormPart::default_color('inverse'), array(
                'layout[cover]' => array( 'hide' ),
                '_else[image_mode]' => array( 'show' ),
            )),
            'arrow_padding' => EsoWidgetFormCorePart::multi_measurement('Arrow Padding', 'The padding to use for the conjoint wrap.', '5px 10px 5px 10px', array(
                'layout[cover]' => array( 'hide' ),
                '_else[image_mode]' => array( 'show' ),
            )),
        ), array(
            'image_mode[slider]' => array( 'show' ),
            '_else[image_mode]' => array( 'hide' ),
        ));

        $return['wide'] = EsoWidgetFormCorePart::section('Wide' . EsoWidgetFormPart::prime_tag(), array(
            'left_column' => EsoWidgetFormCorePart::select('Left Column Width', '', 'uk-width-1-2', array(
                '0' => __('-', EsoWidgetFormPart::text_domain()),
                'uk-width-1-4' => __('Quater', EsoWidgetFormPart::text_domain()),
                'uk-width-1-3' => __('Third', EsoWidgetFormPart::text_domain()),
                'uk-width-1-2' => __('Half', EsoWidgetFormPart::text_domain())
            )),
            'vertical_align' => EsoWidgetFormPart::uikit('flex_v', 'Vertical Align', '', 'uk-flex-top'),
            'name_transition' => EsoWidgetFormPart::uikit('transition', 'Name Transition'),
            'hide_name' => EsoWidgetFormCorePart::checkbox(0, 'Hide Name', 'Hide the product name until the transition is toggled.'),
            'category_transition' => EsoWidgetFormPart::uikit('transition', 'Category Transition'),
            'hide_category' => EsoWidgetFormCorePart::checkbox(0, 'Hide Category', 'Hide the category name until the transition is toggled.'),
            'price_transition' => EsoWidgetFormPart::uikit('transition', 'Price Transition'),
            'hide_price' => EsoWidgetFormCorePart::checkbox(0, 'Hide Price', 'Hide the price until the transition is toggled.'),
        ), array(
            'layout[wide]' => array( 'show' ),
            '_else[layout]' => array( 'hide' ),
        ));

        $return['badge'] = EsoWidgetFormCorePart::section('Badge', array(
            'hover_text_color' => EsoWidgetFormCorePart::color('Text Hover Color', 'The starting color is set in the Name, Price, Caegory and Description sections.', EsoWidgetFormPart::default_color('inverse')),
            'background_color' => EsoWidgetFormPart::rgba('Background Color', '', EsoWidgetFormPart::default_color('overlay')),
            'hover_background_color' => EsoWidgetFormPart::rgba('Hover Background Color', '', EsoWidgetFormPart::default_color('overlay_hover')),
        ), array(
            'layout[badge]' => array( 'show' ),
            '_else[layout]' => array( 'hide' ),
        ));

        $return['overlay'] = EsoWidgetFormCorePart::section('Overlay' . EsoWidgetFormPart::prime_tag(), array(
            'overlay_background_color' => EsoWidgetFormPart::rgba('Overlay Color', 'The starting background color.', EsoWidgetFormPart::default_color('overlay')),
            'overlay_hover_background_color' => EsoWidgetFormPart::rgba('Overlay Color', 'The starting background color.', EsoWidgetFormPart::default_color('overlay_hover')),
            'overlay_hover_text_color' => EsoWidgetFormCorePart::color('Hover Text Color', 'The starting colors are set in the Name, Category, Price sections.', EsoWidgetFormPart::default_color('inverse')),
            'position' => EsoWidgetFormPart::uikit('position_nocover', '', '', 'uk-position-bottom'),
            'position_size' => EsoWidgetFormPart::uikit('position_size'),
            'padding' => EsoWidgetFormPart::uikit('padding', '', '', 'uk-padding-small'),
            'border_radius' => EsoWidgetFormPart::uikit('border_radius_rounded'),
            'name_transition' => EsoWidgetFormPart::uikit('transition', 'Name Transition'),
            'hide_name' => EsoWidgetFormCorePart::checkbox('Hide Name', 'Hide the product name until the transition is toggled.', false),
            'category_transition' => EsoWidgetFormPart::uikit('transition', 'Category Transition'),
            'hide_category' => EsoWidgetFormCorePart::checkbox('Hide Category', 'Hide the category name until the transition is toggled.', false),
            'price_transition' => EsoWidgetFormPart::uikit('transition', 'Price Transition'),
            'hide_price' => EsoWidgetFormCorePart::checkbox('Hide Price', 'Hide the price until the transition is toggled.', false),
        ), array(
            'layout[overlay]' => array( 'show' ),
            'layout[overlay_boxed]' => array( 'show' ),
            '_else[layout]' => array( 'hide' ),
        ));

        $return['cover'] = EsoWidgetFormCorePart::section('Cover' . EsoWidgetFormPart::prime_tag(), array(
            'desktop_height' => EsoWidgetFormCorePart::measurement('Desktop Height', '', '200px'),
			'tablet_height' => EsoWidgetFormCorePart::measurement('Tablet Height', '', '200px'),
			'mobile_height' => EsoWidgetFormCorePart::measurement('Mobile Height', '', '200px'),
            'overlay_background_color' => EsoWidgetFormPart::rgba('Overlay Color', 'The starting background color.', EsoWidgetFormPart::default_color('overlay')),
            'overlay_hover_background_color' => EsoWidgetFormPart::rgba('Overlay Hover Color', 'The background color when hovered or focused.', EsoWidgetFormPart::default_color('overlay_hover')),
            'overlay_hover_text_color' => EsoWidgetFormCorePart::color('Hover Text Color', 'The starting colors are set in the Name, Category, Price sections.', EsoWidgetFormPart::default_color('inverse')),
            'position' => EsoWidgetFormPart::uikit('position_nocover'),
            'position_size' => EsoWidgetFormPart::uikit('position_size'),
            'padding' => EsoWidgetFormPart::uikit('padding', '', '', 'uk-padding-small'),
            'border_radius' => EsoWidgetFormPart::uikit('border_radius_rounded'),
            'name_transition' => EsoWidgetFormPart::uikit('transition', 'Name Transition'),
            'hide_name' => EsoWidgetFormCorePart::checkbox('Hide Price', 'Hide the product name until the transition is toggled.', false),
            'category_transition' => EsoWidgetFormPart::uikit('transition', 'Category Transition'),
            'hide_category' => EsoWidgetFormCorePart::checkbox('Hide Category', 'Hide the product category until the transition is toggled.', false),
            'price_transition' => EsoWidgetFormPart::uikit('transition', 'Price Transition'),
            'hide_price' => EsoWidgetFormCorePart::checkbox('Hide Price', 'Hide the price until the transition is toggled.', false)
        ), array(
            'layout[cover]' => array( 'show' ),
            'layout[cover_boxed]' => array( 'show' ),
            '_else[layout]' => array( 'hide' ),
        ));

        $return['discount'] = EsoWidgetFormCorePart::section('Discount', array(
            'discount_visibility' => EsoWidgetFormPart::binary('Visibility', 'Show or hide the product discount.', '1', 'Visible', 'Hidden'),
            'color' => EsoWidgetFormCorePart::color('Text Color', 'The discount text color.', EsoWidgetFormPart::default_color('inverse')),
            'background' => EsoWidgetFormPart::rgba('Background Color', 'The starting background color.', EsoWidgetFormPart::default_color('primary')),
            'padding' => EsoWidgetFormCorePart::multi_measurement('Padding', 'Set the internal padding for the discount.', '5px 10px 5px 10px'),
            'font_weight' =>EsoWidgetFormPart::uikit('font_weight'),
            'font_size' => EsoWidgetFormPart::uikit('font_size'),
            'position' => EsoWidgetFormPart::uikit('position_corners', '', '', 'uk-position-top-right'),
            'position_size' => EsoWidgetFormPart::uikit('position_size')
        ));

        return $return;
    }

}

siteorigin_widget_register('eso-product-box', __FILE__, 'EchelonSOProductBox');
