<?php

/*
Widget Name: E: Post Box
Description: Display a post from your blog.
Author: Echelon
Author URI: https://echelonso.com
Documentation: https://echelonso.com/widgets/post-box/
*/

class EchelonSOPostBox extends SiteOrigin_Widget {

    function __construct() {
        parent::__construct(
            'echelonso-eso-post-box',
            __('E: Post Box', 'echelon-so'),
            array(
                'description' => __('Display a post from your blog.', 'echelon-so' ),
                'help' => 'https://echelonso.com/widgets/post-box/',
                'panels_groups' => array('eso'),
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
        return 'card';
    }

    /*
    * Template Variables
    */

    function get_template_variables($instance, $args) {

        // image size
        $image_size = empty( $instance['settings']['image_size'] ) ? 'full' : $instance['settings']['image_size'];
        $return['image_size'] = $image_size;
        $return['image_visibility'] = $instance['settings']['image_visibility'];

        $return['image_wrap_class'][] = 'eso';
        (empty($instance['settings']['image_margin'])) ?: $return['image_wrap_class'][] = $instance['settings']['image_margin'];

        $return['image_class'][] = 'eso';
        (empty($instance['settings']['image_transition'])) ?: $return['image_class'][] = $instance['settings']['image_transition'];

        // direct
        if ( $instance['settings']['mode'] == 'direct' ) {

            if ( !empty($instance['settings']['post']) ) {

                $return['has_post'] = true;

                $image = get_the_post_thumbnail_url($instance['settings']['post'], $image_size);
                $return['image'] = $image;

                $return['post_id'] = $instance['settings']['post'];

                $return['link'] = get_permalink($instance['settings']['post']);

            } else {

                $return['has_post'] = false;

            }

        }

        // recent
        if ( $instance['settings']['mode'] == 'recent' ) {

            $return['has_post'] = true;

            if ( !empty($instance['settings']['category']) ) {

                $tax_query = array(
                    array(
                        'taxonomy' => 'category',
                        'terms' => $instance['settings']['category'],
                        'operator' => 'IN',
                    )
                );

            } else {

                $tax_query = array();

            }

            $args = array(
                'post_type'  => 'post',
                'orderby'    => 'date',
                'order'      => 'DESC',
                'posts_per_page' => 20,
                'tax_query'  => $tax_query
            );

            $posts = get_posts( $args );

            if ( empty($posts) ) {

                $return['has_post'] = false;

            } else {

                if ( !empty($instance['settings']['offset']) && !empty($posts[(int)$instance['settings']['offset'] - 1]) ) {

                    $image = get_the_post_thumbnail_url($posts[(int)$instance['settings']['offset'] - 1], $image_size);
                    $return['image'] = $image;

                    $return['post_id'] = $posts[(int)$instance['settings']['offset'] - 1]->ID;

                    $return['link'] = get_permalink($posts[(int)$instance['settings']['offset'] - 1]->ID);

                } else {

                    $return['has_product'] = false;

                }

            }

        }

        // wrap
        $return['wrap_class'][] = 'eso';
        (empty($instance['settings']['padding'])) ?: $return['wrap_class'][] = $instance['settings']['padding'];

        // title
        $return['title_class'][] = 'eso';
        (empty($instance['title']['text_align'])) ?: $return['title_class'][] = $instance['title']['text_align'];
        (empty($instance['title']['margin'])) ?: $return['title_class'][] = $instance['title']['margin'];

        $return['title_link_class'][] = 'eso';
        (empty($instance['title']['text_transform'])) ?: $return['title_link_class'][] = $instance['title']['text_transform'];
        (empty($instance['title']['font_size'])) ?: $return['title_link_class'][] = $instance['title']['font_size'];
        (empty($instance['title']['font_weight'])) ?: $return['title_link_class'][] = $instance['title']['font_weight'];

        $return['title_visibility'] = $instance['title']['visibility'];

        // author comment
        $return['author_comment_class'][] = 'eso';
        (empty($instance['author_comment']['margin'])) ?: $return['author_comment_class'][] = $instance['author_comment']['margin'];
        (empty($instance['author_comment']['text_align'])) ?: $return['author_comment_class'][] = $instance['author_comment']['text_align'];
        (empty($instance['author_comment']['font_size'])) ?: $return['author_comment_class'][] = $instance['author_comment']['font_size'];

        $return['author_class'][] = 'eso';
        (empty($instance['author']['text_transform'])) ?: $return['author_class'][] = $instance['author']['text_transform'];
        (empty($instance['author_comment']['font_size'])) ?: $return['author_class'][] = $instance['author_comment']['font_size'];
        (empty($instance['author']['font_weight'])) ?: $return['author_class'][] = $instance['author']['font_weight'];

        $return['comment_class'][] = 'eso';
        (empty($instance['comment']['text_transform'])) ?: $return['comment_class'][] = $instance['comment']['text_transform'];
        (empty($instance['author_comment']['font_size'])) ?: $return['comment_class'][] = $instance['author_comment']['font_size'];
        (empty($instance['comment']['font_weight'])) ?: $return['comment_class'][] = $instance['comment']['font_weight'];

        $return['author_visibility'] = $instance['author']['author_visibility'];
        $return['comment_visibility'] = $instance['comment']['comment_visibility'];
        $return['respond_hash'] = !empty($instance['comment']['respond_hash']) ? $instance['comment']['respond_hash'] : '';
        $return['author_label'] = !empty($instance['author']['author_label']) ? $instance['author']['author_label'] : '';
        $return['reply_label'] = !empty($instance['comment']['reply_label']) ? $instance['comment']['reply_label'] : '';
        $return['separator'] = !empty($instance['author_comment']['separator']) ? $instance['author_comment']['separator'] : '';

        // excerpt
        $return['excerpt_class'][] = 'eso';
        (empty($instance['excerpt']['text_align'])) ?: $return['excerpt_class'][] = $instance['excerpt']['text_align'];
        (empty($instance['excerpt']['text_transform'])) ?: $return['excerpt_class'][] = $instance['excerpt']['text_transform'];
        (empty($instance['excerpt']['font_size'])) ?: $return['excerpt_class'][] = $instance['excerpt']['font_size'];
        (empty($instance['excerpt']['font_weight'])) ?: $return['excerpt_class'][] = $instance['excerpt']['font_weight'];
        (empty($instance['excerpt']['margin'])) ?: $return['excerpt_class'][] = $instance['excerpt']['margin'];
        $return['excerpt_visibility'] = $instance['excerpt']['visibility'];
        $return['excerpt_length'] = $instance['excerpt']['length'];
        $return['excerpt_source'] = $instance['excerpt']['source'];

        // date
        $return['date_wrap_class'][] = 'eso';
        (empty($instance['date']['text_align'])) ?: $return['date_wrap_class'][] = $instance['date']['text_align'];
        (empty($instance['date']['position'])) ?: $return['date_wrap_class'][] = $instance['date']['position'];
        (empty($instance['date']['position_size'])) ?: $return['date_wrap_class'][] = $instance['date']['position_size'];
        (empty($instance['date']['border_radius'])) ?: $return['date_wrap_class'][] = $instance['date']['border_radius'];
        $return['date_visibility'] = $instance['date']['visibility'];

        $return['day_class'][] = 'eso';
        (empty($instance['date']['day_font_size'])) ?: $return['day_class'][] = $instance['date']['day_font_size'];
        (empty($instance['date']['day_font_weight'])) ?: $return['day_class'][] = $instance['date']['day_font_weight'];
        (empty($instance['date']['day_line_height'])) ?: $return['day_class'][] = $instance['date']['day_line_height'];
        (empty($instance['date']['day_margin'])) ?: $return['day_class'][] = $instance['date']['day_margin'];

        $return['month_class'][] = 'eso';
        (empty($instance['date']['month_font_size'])) ?: $return['month_class'][] = $instance['date']['month_font_size'];
        (empty($instance['date']['month_font_weight'])) ?: $return['month_class'][] = $instance['date']['month_font_weight'];
        (empty($instance['date']['month_line_height'])) ?: $return['month_class'][] = $instance['date']['month_line_height'];
        (empty($instance['date']['month_text_transform'])) ?: $return['month_class'][] = $instance['date']['month_text_transform'];

        // categories
        $return['categories_class'][] = 'eso';
        (empty($instance['categories']['font_size'])) ?: $return['categories_class'][] = $instance['categories']['font_size'];
        (empty($instance['categories']['font_weight'])) ?: $return['categories_class'][] = $instance['categories']['font_weight'];
        (empty($instance['categories']['text_align'])) ?: $return['categories_class'][] = $instance['categories']['text_align'];
        if ($instance['settings']['layout'] == 'card') {
            (empty($instance['categories']['position'])) ?: $return['categories_class'][] = $instance['categories']['position'];
            (empty($instance['categories']['position_size'])) ?: $return['categories_class'][] = $instance['categories']['position_size'];
        }
        $return['categories_wrap_class'][] = 'eso';
        (empty($instance['categories']['text_align'])) ?: $return['categories_wrap_class'][] = $instance['categories']['text_align'];
        (empty($instance['categories']['margin'])) ?: $return['categories_wrap_class'][] = $instance['categories']['margin'];
        $return['categories_visibility'] = $instance['categories']['visibility'];

        $return['button_wrap_class'][] = 'eso';
        (empty($instance['button']['text_align'])) ?: $return['button_wrap_class'][] = $instance['button']['text_align'];

        $return['button_class'][] = 'eso';
        (empty($instance['button']['font_size'])) ?: $return['button_class'][] = $instance['button']['font_size'];
        (empty($instance['button']['font_weight'])) ?: $return['button_class'][] = $instance['button']['font_weight'];
        (empty($instance['button']['text_transform'])) ?: $return['button_class'][] = $instance['button']['text_transform'];

        $return['button_visibility'] = $instance['button']['visibility'];
        $return['button_text'] = !empty($instance['button']['text']) ? $instance['button']['text'] : '';

        // overlay
        $return['overlay_wrap_class'][] = 'eso';
        (empty($instance['overlay']['position'])) ?: $return['overlay_wrap_class'][] = $instance['overlay']['position'];
        (empty($instance['overlay']['position_size'])) ?: $return['overlay_wrap_class'][] = $instance['overlay']['position_size'];
        (empty($instance['overlay']['padding'])) ?: $return['overlay_wrap_class'][] = $instance['overlay']['padding'];

        // wide
        $return['wide_wrap_class'][] = 'eso';
        (empty($instance['wide']['flex_wrap'])) ?: $return['wide_wrap_class'][] = $instance['wide']['flex_wrap'];
        (empty($instance['wide']['padding'])) ?: $return['wide_wrap_class'][] = $instance['wide']['padding'];
        (empty($instance['settings']['padding'])) ?: $return['wide_wrap_class'][] = $instance['settings']['padding'];

        if ($instance['wide']['left_width'] == 'uk-width-1-2') {
            $return['left_width'] = 'uk-width-1-2';
            $return['right_width'] = 'uk-width-1-2';
        }
        if ($instance['wide']['left_width'] == 'uk-width-1-3') {
            $return['left_width'] = 'uk-width-1-3';
            $return['right_width'] = 'uk-width-2-3';
        }
        if ($instance['wide']['left_width'] == 'uk-width-1-4') {
            $return['left_width'] = 'uk-width-1-4';
            $return['right_width'] = 'uk-width-3-4';
        }

        return $return;

    }

    /*
    * Google Font
    */

    function less_import_google_font( $instance, $args ) {
        if ( isset($instance['title']['font']) ) {
            $selected_font = siteorigin_widget_get_font( $instance['title']['font'] );
            if (!empty($selected_font['css_import'])) {
                return $selected_font['css_import'];
            } else {
                return false;
            }
        }
        return false;
    }

    /*
    * Less Variables
    */

    function get_less_variables($instance) {

        if ( isset( $instance['title']['font'] ) ) {
            $font = siteorigin_widget_get_font( $instance['title']['font'] );
            $return['title_font'] = $font['family'];
            if ( ! empty( $font['weight'] ) ) {
                $return['title_font_weight'] = $font['weight'];
            }
        }

        $return['date_color'] = !empty( $instance['date']['background_color'] ) ? $instance['date']['color'] : false;
        $return['date_background_color'] = !empty( $instance['date']['background_color'] ) ? $instance['date']['background_color'] : false;
        $return['date_padding'] = !empty( $instance['date']['padding'] ) ? $instance['date']['padding'] : false;

        $return['day_letter_spacing'] = !empty( $instance['date']['day_letter_spacing'] ) ? $instance['date']['day_letter_spacing'] : false;
        $return['month_letter_spacing'] = !empty( $instance['date']['month_letter_spacing'] ) ? $instance['date']['month_letter_spacing'] : false;

        $return['categories_color'] = !empty( $instance['categories']['color'] ) ? $instance['categories']['color'] : false;
        $return['categories_hover_color'] = !empty( $instance['categories']['hover_color'] ) ? $instance['categories']['hover_color'] : false;
        $return['categories_background_color'] = !empty( $instance['categories']['background_color'] ) ? $instance['categories']['background_color'] : false;
        $return['categories_padding'] = !empty( $instance['categories']['background_color'] ) ? $instance['categories']['padding'] : false;

        $return['title_color'] = !empty( $instance['title']['color'] ) ? $instance['title']['color'] : false;
        $return['title_hover_color'] = !empty( $instance['title']['color'] ) ? $instance['title']['hover_color'] : false;
        $return['excerpt_color'] = !empty( $instance['exerpt']['color'] ) ? $instance['exerpt']['color'] : false;

        $return['ac_color'] = !empty( $instance['author']['color'] ) ? $instance['author']['color'] : false;
        $return['author_link_color'] = !empty( $instance['author']['link_color'] ) ? $instance['author']['link_color'] : false;
        $return['author_link_hover_color'] = !empty( $instance['author']['link_hover_color'] ) ? $instance['author']['link_hover_color'] : false;
        $return['comment_link_color'] = !empty( $instance['comment']['link_color'] ) ? $instance['comment']['link_color'] : false;
        $return['comment_link_hover_color'] = !empty( $instance['comment']['link_hover_color'] ) ? $instance['comment']['link_hover_color'] : false;

        $return['overlay_color'] = !empty( $instance['settings']['overlay_color'] ) ? $instance['settings']['overlay_color'] : false;
        $return['overlay_hover_color'] = !empty( $instance['settings']['overlay_hover_color'] ) ? $instance['settings']['overlay_hover_color'] : false;
        $return['overlay_wrap_color'] = !empty( $instance['overlay']['overlay_color'] ) ? $instance['overlay']['overlay_color'] : false;

        $return['button_color'] = !empty( $instance['button']['color'] ) ? $instance['button']['color'] : false;

        $return['column_height'] = !empty( $instance['wide']['height'] ) ? $instance['wide']['height'] : false;

        return $return;

    }

    /*
    * Widget Form
    */

    function get_widget_form() {

        $return['settings'] = EsoWidgetFormCorePart::section('Settings', array(
            'mode' => EsoWidgetFormCorePart::select('Selection Mode', 'How the post should be selected.', 'direct', array(
                'direct' => __( 'Direct', 'echelon-so' ),
                'recent' => __( 'Recent', 'echelon-so' ),
            ), array(

            ), array(
                'callback' => 'select',
                'args' => array('mode')
            )),
            'post' => EsoWidgetFormCorePart::select('Post', 'The product to use for the box.', '', EsoWidgetFormPart::get_post_select_options(), array(
                'mode[direct]' => array('show'),
                '_else[mode]' => array('hide'),
            )),
            'category' => EsoWidgetFormCorePart::select('Post Category', 'Choose to restrict products to this category.', '', EsoWidgetFormPart::get_post_categoy_select_options(), array(
                'mode[recent]' => array('show'),
                'mode[best_seller]' => array('show'),
                '_else[mode]' => array('hide'),
            )),
            'offset' => EsoWidgetFormCorePart::slider('Post to Get', 'Get this post from the recent post list.', 1, 1, 20, true, array(
                'mode[recent]' => array('show'),
                '_else[mode]' => array('hide'),
            )),
            'layout' => EsoWidgetFormCorePart::select('Layout', 'Choose which layout to use for the box. Card boxes work best with wide images, Wide boxes work best with tall images.' . EsoWidgetFormPart::important() , 'card', array(
                'card' => __('Card', 'echelon-so'),
                'overlay' => __('Overlay' . EsoWidgetFormPart::prime_tag(), 'echelon-so' ),
                'wide_left' => __('Wide Left to Right' . EsoWidgetFormPart::prime_tag(), 'echelon-so' ),
                'wide_right' => __('Wide Right to Left'. EsoWidgetFormPart::prime_tag(), 'echelon-so' ),
            ), array(

            ), array(
                'callback' => 'select',
                'args' => array('layout')
            )),
            'padding' => EsoWidgetFormPart::uikit('padding', '', 'The inner padding of the cards body portion (title, excerpt, etc).', 'uk-padding-small'),
            'image_visibility' => EsoWidgetFormPart::binary('Image Visibility', 'Show or hide the post image.', '1', 'Show', 'Hide'),
            'image_margin' => EsoWidgetFormPart::uikit('margin_bottom', 'Image Margin', 'Ads margin below the post image for card layouts.', array(
                'layout[card]' => array('show'),
                '_else[layout]' => array('hide'),
            )),
            'image_size' => EsoWidgetFormCorePart::image_size('Image Size', 'Choose the size of the image to use when generating the box.', 'ESO-1280x720-Crop'),
            'image_transition' => EsoWidgetFormCorePart::select('Image Transition', 'Choose if a hover transition should be added to the box images.', '0', array(
                '0' => __('-', 'echelon-so'),
                'uk-transition-scale-up' => __('Scale Up', 'echelon-so')
            )),
            'overlay_color' => EsoWidgetFormPart::rgba('Overlay Color', 'Adds a color overlay to the boxes images.', 'rgba(0,0,0,0)'),
            'overlay_hover_color' => EsoWidgetFormPart::rgba('Overlay Hover Color', 'Adds a color overlay to the boxes images when hovered or focused.', EsoWidgetFormPart::default_color('overlay_hover')),
        ));

        $return['title'] = EsoWidgetFormCorePart::section('Title', array(
            'visibility' => EsoWidgetFormPart::binary('Visibility', 'Show or hide the title.', '1', 'Show', 'Hide'),
            'font' => EsoWidgetFormCorePart::font('Font'),
            'color' => EsoWidgetFormCorePart::color(),
            'hover_color' => EsoWidgetFormCorePart::color('Hover Color'),
            'font_weight' => EsoWidgetFormPart::uikit('font_weight'),
            'font_size' => EsoWidgetFormPart::uikit('font_size', '', '', 'uk-text-large'),
            'margin' => EsoWidgetFormPart::uikit('margin_bottom', '', '', 'uk-margin-small-bottom'),
            'text_align' => EsoWidgetFormPart::uikit('text_align', '', '', 'uk-text-center'),
            'text_transform' => EsoWidgetFormPart::uikit('text_transform')
        ));

        $return['author_comment'] = EsoWidgetFormCorePart::section('Author & Comment', array(
            'margin' => EsoWidgetFormPart::uikit('margin_bottom', '', '', 'uk-margin-small-bottom'),
            'font_size' => EsoWidgetFormPart::uikit('font_size', '', '', 'uk-text-small'),
            'text_align' => EsoWidgetFormPart::uikit('text_align', '', '', 'uk-text-center'),
            'separator' => EsoWidgetFormCorePart::text('Separator', 'The separator for the author comments.', '/'),
        ));

        $return['author'] = EsoWidgetFormCorePart::section('Author', array(
            'author_visibility' => EsoWidgetFormPart::binary('Author Visibility', 'Show or hide the author link.', '1', 'Show', 'Hide'),
            'color' => EsoWidgetFormCorePart::color(),
            'link_color' => EsoWidgetFormCorePart::color('Link Color'),
            'link_hover_color' => EsoWidgetFormCorePart::color('Link Hover Color'),
            'font_weight' => EsoWidgetFormPart::uikit('font_weight'),
            'text_transform' => EsoWidgetFormPart::uikit('text_transform'),
            'author_label' => EsoWidgetFormCorePart::text('Author Label', 'The label to use for the author link.', 'By'),
        ));

        $return['comment'] = EsoWidgetFormCorePart::section('Comment', array(
            'comment_visibility' => EsoWidgetFormPart::binary('Comment Visibility', 'Show or hide the comment link.', '1', 'Show', 'Hide'),
            'link_color' => EsoWidgetFormCorePart::color('Link Color'),
            'link_hover_color' => EsoWidgetFormCorePart::color('Link Hover Color'),
            'font_weight' => EsoWidgetFormPart::uikit('font_weight'),
            'text_transform' => EsoWidgetFormPart::uikit('text_transform'),
            'respond_hash' => EsoWidgetFormCorePart::text('Respond Hash', 'For themes with different comments respond ID. Normally this should be #respond.', '#respond'),
            'reply_label' => EsoWidgetFormCorePart::text('Reply Label', 'The label to use for the add comment link.', 'Leave a comment'),
        ));

        $return['excerpt'] = EsoWidgetFormCorePart::section('Excerpt', array(
            'visibility' => EsoWidgetFormPart::binary('Visibility', 'Show or hide the post excerpt.', '1', 'Show', 'Hide'),
            'color' => EsoWidgetFormCorePart::color(),
            'font_weight' => EsoWidgetFormPart::uikit('font_weight'),
            'font_size' => EsoWidgetFormPart::uikit('font_size', '', '', 'uk-text-small'),
            'margin' => EsoWidgetFormPart::uikit('margin_bottom', '', '', 'uk-margin-small-bottom'),
            'text_align' => EsoWidgetFormPart::uikit('text_align', '', '', 'uk-text-center'),
            'text_transform' => EsoWidgetFormPart::uikit('text_transform'),
            'length' => EsoWidgetFormCorePart::number('Length', 'The number of words to show from the excerpt', 15),
            'source' => EsoWidgetFormCorePart::select('Source', 'Use the post excerpt if it exists or auto generate from the content,', 'excerpt', array(
                'content' => __('Content', 'echelon-so'),
                'excerpt' => __('Excerpt If Exists', 'echelon-so')
            )),
        ));

        $return['date'] = EsoWidgetFormCorePart::section('Date', array(
            'visibility' => EsoWidgetFormPart::binary('Visibility', 'Show or hide the date.', '1', 'Show', 'Hide'),
            'color' => EsoWidgetFormCorePart::color(),
            'background_color' => EsoWidgetFormPart::rgba('Background Color', 'The background color for the date wrap.', EsoWidgetFormPart::default_color('inverse')),
            'padding' => EsoWidgetFormCorePart::multi_measurement('Padding', 'The padding for the date wrap.', '8px 15px 8px 15px'),
            'day_font_size' => EsoWidgetFormPart::uikit('font_size', 'Day Font Size'),
            'day_font_weight' => EsoWidgetFormPart::uikit('font_weight', 'Day Font Weight', '', 'uk-text-bold'),
            'day_margin' => EsoWidgetFormPart::uikit('margin_bottom', 'Day Margin'),
            'day_line_height' => EsoWidgetFormPart::uikit('line_height', 'Day Line Height'),
            'day_letter_spacing' => EsoWidgetFormCorePart::measurement('Day Letter Spacing', '', '6px'),
            'month_font_size' => EsoWidgetFormPart::uikit('font_size', 'Month Font Size', '', 'uk-text-small'),
            'month_font_weight' => EsoWidgetFormPart::uikit('font_weight', 'Month Font Weight'),
            'month_line_height' => EsoWidgetFormPart::uikit('line_height', 'Month Line Height'),
            'month_letter_spacing' => EsoWidgetFormCorePart::measurement('Month Letter Spacing', '', '5px'),
            'month_text_transform' => EsoWidgetFormPart::uikit('text_transform', 'Month Text Transform', '', 'uk-text-uppercase'),
            'text_align' => EsoWidgetFormPart::uikit('text_align', '', '', 'uk-text-center'),
            'position' => EsoWidgetFormPart::uikit('position_top_bottom', '', '', 'uk-position-top-left'),
            'position_size' => EsoWidgetFormPart::uikit('position_size', '', '', 'uk-position-small'),
            'border_radius' => EsoWidgetFormPart::uikit('border_radius'),
        ));

        $return['categories'] = EsoWidgetFormCorePart::section('Categories', array(
            'visibility' => EsoWidgetFormPart::binary('Visibility', 'Show or hide the category links.', '1', 'Show', 'Hide'),
            'color' => EsoWidgetFormCorePart::color('Color', 'The color for the category links.', EsoWidgetFormPart::default_color('inverse')),
            'hover_color' => EsoWidgetFormCorePart::color('Hover Color', 'The hover color for the category links.', EsoWidgetFormPart::default_color('inverse')),
            'background_color' => EsoWidgetFormPart::rgba('Background Color', 'The background color for the caegory links.', EsoWidgetFormPart::default_color('primary')),
            'padding' => EsoWidgetFormCorePart::multi_measurement('Padding', 'THe inner padding for the category links.', '5px 10px 5px 10px'),
            'font_size' => EsoWidgetFormPart::uikit('font_size', '', '', 'uk-text-small'),
            'font_weight' => EsoWidgetFormPart::uikit('font_weight'),
            'text_align' => EsoWidgetFormPart::uikit('text_align', '', '', 'uk-text-center'),
            'margin' => EsoWidgetFormPart::uikit('margin_bottom', 'Margin', '', 'uk-margin-small-bottom', array(
                'layout[card]' => array('hide'),
                '_else[layout]' => array('show'),
            )),
            'position' => EsoWidgetFormPart::uikit('position_top_bottom', '', '', 'uk-position-bottom-center', array(
                'layout[card]' => array('show'),
                '_else[layout]' => array('hide'),
            )),
            'position_size' => EsoWidgetFormPart::uikit('position_size', '', '', '0', array(
                'layout[card]' => array('show'),
                '_else[layout]' => array('hide'),
            ))
        ));

        $return['button'] = EsoWidgetFormCorePart::section('Button', array(
            'visibility' => EsoWidgetFormPart::binary('Visibility', 'Show or hide the button.', '1', 'Show', 'Hide'),
            'text' => EsoWidgetFormCorePart::text('Text', 'The text for the button.', 'Read More'),
            'color' => EsoWidgetFormCorePart::color(),
            'font_size' => EsoWidgetFormPart::uikit('font_size'),
            'font_weight' => EsoWidgetFormPart::uikit('font_weight'),
            'text_align' => EsoWidgetFormPart::uikit('text_align', '', '', 'uk-text-center'),
            'text_transform' => EsoWidgetFormPart::uikit('text_transform'),
        ), array(
            'layout[overlay]' => array('hide'),
            '_else[layout]' => array('show'),
        ));

        $return['overlay'] = EsoWidgetFormCorePart::section('Overlay', array(
            'padding' => EsoWidgetFormPart::uikit('padding', '', 'Adds padding inside the the overlay.', 'uk-padding-small'),
            'position' => EsoWidgetFormPart::uikit('position_top_bottom', '', '', 'uk-position-bottom'),
            'position_size' => EsoWidgetFormPart::uikit('position_size', '', '', 'uk-position-small'),
            'overlay_color' => EsoWidgetFormPart::rgba('Background Color', '', EsoWidgetFormPart::default_color('overlay')),
        ), array(
            'layout[overlay]' => array('show'),
            '_else[layout]' => array('hide'),
        ));

        $return['wide'] = EsoWidgetFormCorePart::section('Wide', array(
            'height' => EsoWidgetFormCorePart::measurement('Height', '', '300px'),
            'flex_wrap' => EsoWidgetFormPart::uikit('flex_wrap', '', '', 'uk-flex-wrap-middle'),
            'left_width' => EsoWidgetFormCorePart::select('Left Width', '', 'uk-width-1-2', array(
                'uk-width-1-2' => __('Half', 'echelon-so'),
                'uk-width-1-3' => __('Third', 'echelon-so'),
                'uk-width-1-4' => __('Quater', 'echelon-so'),
            )),
        ), array(
            'layout[wide_left]' => array('show'),
            'layout[wide_right]' => array('show'),
            '_else[layout]' => array('hide'),
        ));

        return $return;
    }

}

siteorigin_widget_register('echelonso-eso-post-box', __FILE__, 'EchelonSOPostBox');
