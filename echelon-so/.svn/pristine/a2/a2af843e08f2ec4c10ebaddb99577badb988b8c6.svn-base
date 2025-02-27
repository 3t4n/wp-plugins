<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( !class_exists('EsoWidgetFormPart') ) {

    final class EsoWidgetFormPart {

        /*
        * Required
        */

        public static function required() {
            return ' <span style="color: #000;">Required.</span>';
        }

        /*
        * Requires
        */

        public static function requires($value) {
            return ' <span style="color: #000;">Requires ' . $value . '.</span>';
        }

        /*
        * Important
        */

        public static function important() {
            return ' <span style="color: #000;">Important.</span>';
        }

        /*
        * Important
        */

        public static function recommended() {
            return ' <span style="color: #000;">Recommended.</span>';
        }

        /*
        * Important
        */

        public static function exclusive($value = '') {
            return ' <span style="color: #000;">Exclusive from ' . $value . '.</span>';
        }

        /*
        * Text Domain
        */

        public static function text_domain() {
            return 'echelon-so';
        }

        /*
        * Prime Tag
        */

        public static function prime_tag() {
            if ( defined('ECHELONSO_PRIME') ) {
                return '';
            }
            return ' (Prime)';
        }

        /*
        * Colors
        */

        public static function default_color($color = false) {
            if (empty($color)) return '';
            if ($color == 'primary') return (isset(ECHELONSO_OPTIONS['default_color_primary'])) ? ECHELONSO_OPTIONS['default_color_primary'] : '#c00f5b';
            if ($color == 'secondary') return (isset(ECHELONSO_OPTIONS['default_color_seconday'])) ? ECHELONSO_OPTIONS['default_color_seconday'] : '#373d88';
            if ($color == 'light_grey') return (isset(ECHELONSO_OPTIONS['default_color_light_grey'])) ? ECHELONSO_OPTIONS['default_color_light_grey'] : '#fafafa';
            if ($color == 'medium_grey') return (isset(ECHELONSO_OPTIONS['default_color_medium_grey'])) ? ECHELONSO_OPTIONS['default_color_medium_grey'] : '#e3e2e0';
            if ($color == 'dark_grey') return (isset(ECHELONSO_OPTIONS['default_color_dark_grey'])) ? ECHELONSO_OPTIONS['default_color_dark_grey'] : '#454444';
            if ($color == 'darker_grey') return (isset(ECHELONSO_OPTIONS['default_color_darker_grey'])) ? ECHELONSO_OPTIONS['default_color_darker_grey'] : '#111111';
            if ($color == 'inverse') return (isset(ECHELONSO_OPTIONS['default_color_inverse'])) ? ECHELONSO_OPTIONS['default_color_inverse'] : '#ffffff';
            if ($color == 'overlay') return 'rgba(0,0,0,0.45)';
            if ($color == 'overlay_hover') return 'rgba(0,0,0,0.3)';
            return false;
        }

        public static function get_legacy_color($color = false) {
            if (empty($color)) return '';
            if ($color == 'global-primary-background') return (isset(ECHELONSO_OPTIONS['global-primary-background'])) ? ECHELONSO_OPTIONS['global-primary-background'] : self::default_color('primary');
            if ($color == 'global-secondary-background') return (isset(ECHELONSO_OPTIONS['global-secondary-background'])) ? ECHELONSO_OPTIONS['global-secondary-background'] : self::default_color('secondary');
            if ($color == 'global-inverse-color') return (isset(ECHELONSO_OPTIONS['global-inverse-color'])) ? ECHELONSO_OPTIONS['global-inverse-color'] : self::default_color('inverse');
            return false;
        }

        /*
        * Binary
        */

        public static function binary($label = 'Binary', $desc = 'Binary choice.', $default = '1', $t_label = 'True', $f_label = 'False', $state_handler = array(), $state_emitter = array() ) {

            $base_field = array(
                'type' => 'select',
                'default' => $default,
                'label' => __( $label, 'echelon-so' ),
                'description' => __( $desc, 'echelon-so' ),
                'options' => array(
                    '1' => __( $t_label, 'echelon-so' ),
                    '0' => __( $f_label, 'echelon-so' ),
                ),
                'state_handler' => $state_handler,
                'state_emitter' => $state_emitter
            );

            return $base_field;

        }

        /*
        * True False
        */

        public static function true_false($label = 'True False', $desc = 'True or false choice.', $default = 'true', $t_label = 'True', $f_label = 'False', $state_handler = array(), $state_emitter = array() ) {

            $base_field = array(
                'type' => 'select',
                'default' => $default,
                'label' => __( $label, 'echelon-so' ),
                'description' => __( $desc, 'echelon-so' ),
                'options' => array(
                    'true' => __( $t_label, 'echelon-so'),
                    'false' => __( $f_label, 'echelon-so'),
                ),
                'state_handler' => $state_handler,
                'state_emitter' => $state_emitter
            );

            return $base_field;

        }

        /*
        * RGBA
        */

        public static function rgba($label = 'Color', $desc = 'Choose a color to use.', $default = '', $state_handler = array(), $state_emitter = array() ) {

            $base_field = array(
                'type' => 'esorgba',
                'default' => $default,
                'label' => __( $label, 'echelon-so' ),
                'description' => __( $desc, 'echelon-so' ),
                'state_handler' => $state_handler,
                'state_emitter' => $state_emitter
            );

            return $base_field;

        }


        /*
        * Slide settings
        */


        public static function slide_settings($state_handler = array(), $state_emitter = array()) {

            $base_field = array(
                'type' => 'section',
                'label' => __( 'Slider Settings', 'echelon-so' ),
                'hide' => true,
                'fields' => array(
                    'slider_autoplay' => self::binary('Autoplay', 'Autoplay the slides.', '0', 'Yes', 'No', array(), array(
                        'callback' => 'select',
                        'args' => array( 'slider_autoplay' )
                    )),
                    'autoplay_interval' => EsoWidgetFormCorePart::slider('Autoplay Interval', 'Time between slide changes in seconds.', 5, 1, 10, true, array(
                        'slider_autoplay[1]' => array('show'),
                        'slider_autoplay[0]' => array('hide'),
                    )),
                    'col_width' => array(
                        'type' => 'select',
                        'default' => 'uk-child-width-1-1',
                        'label' => __('Columns on Small', 'echelon-so'),
                        'description' => __('The number of columns to use on small screens.', 'echelon-so'),
                        'options' => EsoWidgetFormPartOptions::child_width_int(),
                    ),
                    'col_width_s' => array(
                        'type' => 'select',
                        'default' => 'uk-child-width-1-1',
                        'label' => __('Columns Above Small', 'echelon-so'),
                        'description' => __('The number of columns to use above small screens.', 'echelon-so'),
                        'options' => EsoWidgetFormPartOptions::child_width_s_int(),
                    ),
                    'col_width_m' => array(
                        'type' => 'select',
                        'default' => 'uk-child-width-1-1',
                        'label' => __('Columns Above Medium', 'echelon-so'),
                        'description' => __('The number of columns to use above medium screens.', 'echelon-so'),
                        'options' => EsoWidgetFormPartOptions::child_width_m_int(),
                    ),
                    'col_width_l' => array(
                        'type' => 'select',
                        'default' => 'uk-child-width-1-1',
                        'label' => __('Columns Above Large', 'echelon-so'),
                        'description' => __('The number of columns to use on large screen screens and abvove.', 'echelon-so'),
                        'options' => EsoWidgetFormPartOptions::child_width_l_int(),
                    ),
                    'spacing' => array(
                        'type' => 'select',
                        'default' => 'uk-grid-small',
                        'label' => __('Slide Spacing', 'echelon-so'),
                        'description' => __('The amount of space to add between slides. Collapse removes the spacing.', 'echelon-so'),
                        'options' => EsoWidgetFormPartOptions::grid(),
                    ),
                    'margin_top' => array(
                        'type' => 'select',
                        'default' => '0',
                        'label' => __('Items Margin Top', 'echelon-so'),
                        'description' => __('Add a top margin between the items and nav.', 'echelon-so'),
                        'options' => EsoWidgetFormPartOptions::margin_top(),
                    ),
                    'margin_bottom' => array(
                        'type' => 'select',
                        'default' => '0',
                        'label' => __('Items Margin Bottom', 'echelon-so'),
                        'description' => __('Add a bottom margin between the items and nav.', 'echelon-so'),
                        'options' => EsoWidgetFormPartOptions::margin_bottom(),
                    ),
                    'transition_toggle' => self::binary('Toggle Transitions', 'Fire transitions on child widgets when the slide changes.', '0', 'Yes', 'No'),
                    'center' => self::binary('Center Mode', 'Use center mode for the slider.', '0', 'Yes', 'No'),
                    'lightbox' => self::binary('Enable Lightbox', 'Use only if the slider contains E: Light Box Compnent widgets, as all links will open in lightbox.' . self::important(), '0', 'Yes', 'No'),
                )
            );

            return $base_field;

        }

        /*
        * Slide Nav settings
        */

        public static function slide_nav_settings($state_handler = array(), $state_emitter = array()) {

            $base_field = array(
                'type' => 'section',
                'label' => __( 'Nav Settings', 'echelon-so' ),
                'hide' => true,
                'fields' => array(
                    'nav_placement' => EsoWidgetFormCorePart::select('Nav Placement', 'Choose how to layout the navigation controls.', '0',  array(
                        '0' => __('No Navs', 'echelon-so'),
                        'nav-dots-top'    => __('Arrows & Dots Top', 'echelon-so'),
                        'nav-dots-bottom' => __('Arrows & Dots Bottom', 'echelon-so'),
                        'nav-inside'      => __('Arrows Inside Dots Bottom', 'echelon-so'),
                        'nav-outside'     => __('Arrows Outside Dots Bottom', 'echelon-so'),
                    ), array(

                    ), array(
                        'callback' => 'select',
                        'args' => array('nav_placement')
                    )),
                    'nav_arrangement' => EsoWidgetFormCorePart::select('Nav Arrangement', 'Adjust the order of the arrows and dots.', 'left',  array(
                        'left' => __('Left to Right', 'echelon-so'),
                        'right'    => __('Right to Left', 'echelon-so'),
                    ), array(
                        'nav_placement[nav-dots-top]' => array('show'),
                        'nav_placement[nav-dots-bottom]' => array('show'),
                        '_else[nav_placement]' => array('hide'),
                    )),
                    'nav_visibility' => self::binary('Arrow Visibility', 'Show or hide the arrow controls.', '1', 'Show', 'Hide', array(
                        'nav_placement[nav-dots-top]' => array('show'),
                        'nav_placement[nav-dots-bottom]' => array('show'),
                        'nav_placement[nav-inside]' => array('show'),
                        'nav_placement[nav-outside]' => array('show'),
                        '_else[nav_placement]' => array('hide'),
                    )),
                    'nav_hidden_hover' => self::binary('Arrows Use Hidden Hover', 'Only show the arrows on hover.', '0', 'Yes', 'No', array(
                        'nav_placement[nav-inside]' => array('show'),
                        '_else[nav_placement]' => array('hide'),
                    )),
                    'nav_hidden_touch' => self::binary('Arrows Use Hidden Touch', 'HIde the the arrows on touch enabled devices.', '1', 'Yes', 'No', array(
                        'nav_placement[nav-inside]' => array('show'),
                        '_else[nav_placement]' => array('hide'),
                    )),
                    'dot_visibility' => self::binary('Dot Visibility', 'Show or hide the dot controls.', '1', 'Show', 'Hide', array(
                        'nav_placement[nav-dots-top]' => array('show'),
                        'nav_placement[nav-dots-bottom]' => array('show'),
                        'nav_placement[nav-inside]' => array('show'),
                        'nav_placement[nav-outside]' => array('show'),
                        '_else[nav_placement]' => array('hide'),
                    )),
                    'nav_position' => self::uikit('position_corners_center', 'Arrow Position', 'Left and Right positions will oncjoint the nav arrows.', 'uk-position-top-left', array(
                        'nav_placement[nav-inside]' => array('show'),
                        '_else[nav_placement]' => array('hide'),
                    )),
                    'nav_position_size' => self::uikit('position_size', 'Arrow Position Size', 'Adjust the distance between the nav arrows and the container.', '0', array(
                        'nav_placement[nav-inside]' => array('show'),
                        '_else[nav_placement]' => array('hide'),
                    )),
                    'dot_alignment' => self::uikit('flex_h', 'Dot Alignment', '', 'uk-flex-center', array(
                        'nav_placement[nav-inside]' => array('show'),
                        'nav_placement[nav-outside]' => array('show'),
                        '_else[nav_placement]' => array('hide'),
                    )),
                )
            );

            return $base_field;

        }

        /*
        * Slidenav Appearance
        */


        public static function slidenav_appearance($state_handler = array(), $state_emitter = array()) {

            $base_field = array(
                'type' => 'section',
                'label' => __( 'Arrow Appearance', 'echelon-so' ),
                'hide' => true,
                'fields' => array(
                    'arrow_color' => self::rgba('Arrow Color', 'The default color for the nav arrows.', '#000000'),
                    'arrow_hover_color' => self::rgba('Arrow Hover Color', 'The hover and focus color for the nav arrows.', '#aaaaaa'),
                    'arrow_background_color' => self::rgba('Arrow Background Color', 'The background color for the arrows.', ''),
                    'arrow_previous_padding' => EsoWidgetFormCorePart::multi_measurement('Previous Arrow Padding', 'The padding to use for the conjoint wrap.', '5px 10px 5px 10px'),
                    'arrow_next_padding' => EsoWidgetFormCorePart::multi_measurement('Next Arrow Padding', 'The padding to use for the conjoint wrap.', '5px 10px 5px 10px'),
                ),
                'state_handler' => $state_handler,
                'state_emitter' => $state_emitter
            );

            return $base_field;

        }

        /*
        * Dotnav Appearance
        */

        public static function dotnav_appearance($state_handler = array(), $state_emitter = array()) {

            $base_field = array(
                'type' => 'section',
                'label' => __( 'Dot Appearance', 'echelon-so' ),
                'hide' => true,
                'fields' => array(
                    'dotnav_border' => self::rgba('Border', 'The color for the dot borders.', '#a1a1a1'),
                    'dotnav_active_background' => self::rgba('Active Background', 'The background for the active dot.', '#a1a1a1'),
                    'dotnav_hover_background' => self::rgba('Hover Background', 'The background for hover and focus.', '#a1a1a1'),
                    'dotnav_background' => self::rgba('Inactive Background', 'The default background color.', ''),
                    'dotnav_onclick_background' => self::rgba('Onclick Background', 'The background when clicked.', '#e0e0e0'),
                    'dotnav_size' => EsoWidgetFormCorePart::measurement('Dot Size', 'How large to make the dots in the nav.', '10px'),
                ),
                'state_handler' => $state_handler,
                'state_emitter' => $state_emitter
            );

            return $base_field;

        }

        /*
        * Overlay Appearance
        */

        public static function overlay_appearance($state_handler = array(), $state_emitter = array()) {

            $base_field = array(
                'type' => 'section',
                'label' => __( 'Overlay Appearance', 'echelon-so' ),
                'hide' => true,
                'fields' => array(
                    'overlay_color' => self::rgba('Overly Background Color', 'The background color for the overlay.', self::default_color('overlay')),
                    'overlay_hover_color' => self::rgba('Overlay Hover Background Color', 'The background color for the overlay when hovered or focused.', self::default_color('overlay_hover')),
                    'overlay_padding' => self::uikit('padding'),
                ),
                'state_handler' => $state_handler,
                'state_emitter' => $state_emitter
            );

            return $base_field;

        }

        /*
        * Get echelonso_layout names
        */

        public static function get_layout_select_options() {
            $args = array(
                'post_type'=> 'echelonso_layout',
                'posts_per_page' => -1,
                'orderby' => 'post_title',
                'order' => 'ASC'
            );
            $the_query = new WP_Query( $args );
            $options = array();
            $options[0] = __('None', 'echelon-so');
            if ( $the_query->have_posts() ) {
                foreach ($the_query->posts as $k => $v) {
                    $options[$v->ID] = $v->post_title;
                }
            }
            return $options;
        }

        /*
        * Get WC Category selection options
        */

        public static function get_wc_categoy_select_options() {
            $args = array(
                'taxonomy'   => "product_cat",
                'orderby'    => 'name',
                'order'      => 'ASC',
                'hide_empty' => 0,
            );
            $product_categories = get_terms($args);
            $options[0] = '-';
            if ( !empty($product_categories) ) {
                foreach ($product_categories as $k => $v) {
                    $options[$v->term_id] = $v->name;
                }
            }
            return $options;
        }

        /*
        * Get WC Product selection options
        */

        public static function get_wc_product_select_options() {
            $args = array(
                'post_type' => 'product',
                'orderby'    => 'name',
                'order'      => 'ASC',
                'posts_per_page' => -1
            );
            $products = get_posts($args);
            $options[0] = '-';
            if ( !empty($products) ) {
                foreach ($products as $k => $v) {
                    $options[$v->ID] = $v->post_title;
                }
            }
            return $options;
        }

        /*
        * Get Post Category selection options
        */

        public static function get_post_categoy_select_options() {
            $args = array(
                'orderby'    => 'name',
                'order'      => 'ASC',
                'hide_empty' => 0,
            );
            $product_categories = get_categories($args);
            $options[0] = '-';
            if ( !empty($product_categories) ) {
                foreach ($product_categories as $k => $v) {
                    $options[$v->term_id] = $v->name;
                }
            }
            return $options;
        }

        /*
        * Get Post selection options
        */

        public static function get_post_select_options() {
            $args = array(
                'post_type' => 'post',
                'orderby'    => 'name',
                'order'      => 'ASC',
                'posts_per_page' => -1
            );
            $products = get_posts($args);
            $options[0] = '-';
            if ( !empty($products) ) {
                foreach ($products as $k => $v) {
                    $options[$v->ID] = $v->post_title;
                }
            }
            return $options;
        }

        /*
        * UIkit
        */

        public static function uikit($field = false, $label = '', $desc = '', $default = '0', $state_handler = array(), $state_emitter = array() ) {

            /*
            * FIELD REQUIRED
            */

            if (!$field) {
                return false;
            }

            /*
            * SETUP
            */

            $base_field = array(
                'type' => 'select',
                'default' => $default,
                'state_handler' => $state_handler,
                'state_emitter' => $state_emitter
            );

            /*
            * FONTS AND TEXT
            */

            // FONT SIZE
            if ($field == 'font_size') {

                ( !empty($label) ?: $label = 'Font Size' );
                ( !empty($desc) ?: $desc = 'Adjust the size of the font.' );

                $base_field['label'] = __( $label, 'echelon-so' );
                $base_field['description'] = __( $desc, 'echelon-so' );
                $base_field['options'] = EsoWidgetFormPartOptions::font_size();

                return $base_field;
            }

            // FONT WEIGHT
            if ($field == 'font_weight') {

                ( !empty($label) ?: $label = 'Font Weight' );
                ( !empty($desc) ?: $desc = 'Adjust the font weight.' );

                $base_field['label'] = __( $label, 'echelon-so' );
                $base_field['description'] = __( $desc, 'echelon-so' );
                $base_field['options'] = EsoWidgetFormPartOptions::font_weight();

                return $base_field;
            }

            // LINE HEIGHT
            if ($field == 'line_height') {

                ( !empty($label) ?: $label = 'Line Height' );
                ( !empty($desc) ?: $desc = 'Adjust the line height.' );

                $base_field['label'] = __( $label, 'echelon-so' );
                $base_field['description'] = __( $desc, 'echelon-so' );
                $base_field['options'] = EsoWidgetFormPartOptions::line_height();

                return $base_field;
            }

            // TEXT TRANSFORM
            if ($field == 'text_transform') {

                ( !empty($label) ?: $label = 'Text Transform' );
                ( !empty($desc) ?: $desc = 'Change the capitalization of the text.' );

                $base_field['label'] = __( $label, 'echelon-so' );
                $base_field['description'] = __( $desc, 'echelon-so' );
                $base_field['options'] = EsoWidgetFormPartOptions::text_transform();

                return $base_field;
            }

            if ($field == 'text_align') {

                ( !empty($label) ?: $label = 'Text Align' );
                ( !empty($desc) ?: $desc = 'How to align the text.' );

                $base_field['label'] = __( $label, 'echelon-so' );
                $base_field['description'] = __( $desc, 'echelon-so' );
                $base_field['options'] = EsoWidgetFormPartOptions::text_align();

                return $base_field;
            }

            /*
            * PADDING & MARGIN
            */

            if ($field == 'padding') {

                ( !empty($label) ?: $label = 'Padding' );
                ( !empty($desc) ?: $desc = 'Choose the amount of padding to use.' );

                $base_field['label'] = __( $label, 'echelon-so' );
                $base_field['description'] = __( $desc, 'echelon-so' );
                $base_field['options'] = EsoWidgetFormPartOptions::padding();

                return $base_field;
            }

            if ($field == 'margin_top') {

                ( !empty($label) ?: $label = 'Margin Top' );
                ( !empty($desc) ?: $desc = 'Choose the amount of top margin to use.' );

                $base_field['label'] = __( $label, 'echelon-so' );
                $base_field['description'] = __( $desc, 'echelon-so' );
                $base_field['options'] = EsoWidgetFormPartOptions::margin_top();

                return $base_field;
            }

            if ($field == 'margin_bottom') {

                ( !empty($label) ?: $label = 'Margin Bottom' );
                ( !empty($desc) ?: $desc = 'Choose the amount of bottom margin to use.' );

                $base_field['label'] = __( $label, 'echelon-so' );
                $base_field['description'] = __( $desc, 'echelon-so' );
                $base_field['options'] = EsoWidgetFormPartOptions::margin_bottom();

                return $base_field;
            }

            if ($field == 'margin_left') {

                ( !empty($label) ?: $label = 'Margin Left' );
                ( !empty($desc) ?: $desc = 'Choose the amount of bottom margin to use.' );

                $base_field['label'] = __( $label, 'echelon-so' );
                $base_field['description'] = __( $desc, 'echelon-so' );
                $base_field['options'] = EsoWidgetFormPartOptions::margin_left();

                return $base_field;
            }

            if ($field == 'margin_right') {

                ( !empty($label) ?: $label = 'Margin Right' );
                ( !empty($desc) ?: $desc = 'Choose the amount of bottom margin to use.' );

                $base_field['label'] = __( $label, 'echelon-so' );
                $base_field['description'] = __( $desc, 'echelon-so' );
                $base_field['options'] = EsoWidgetFormPartOptions::margin_right();

                return $base_field;
            }

            /*
            * UI
            */

            // INVERSE
            if ($field == 'inverse') {

                ( !empty($label) ?: $label = 'Inverse' );
                ( !empty($desc) ?: $desc = 'Creates light content for dark backgrounds based on your Inverse color.' );

                $base_field['label'] = __( $label, 'echelon-so' );
                $base_field['description'] = __( $desc, 'echelon-so' );
                $base_field['options'] = EsoWidgetFormPartOptions::inverse();

                return $base_field;
            }

            // BORDER RADIUS
            if ($field == 'border_radius') {

                ( !empty($label) ?: $label = 'Border Radius' );
                ( !empty($desc) ?: $desc = 'How the corners of the element should be rounded.' );

                $base_field['label'] = __( $label, 'echelon-so' );
                $base_field['description'] = __( $desc, 'echelon-so' );
                $base_field['options'] = EsoWidgetFormPartOptions::border_radius();

                return $base_field;
            }

            if ($field == 'border_radius_rounded') {

                ( !empty($label) ?: $label = 'Border Radius' );
                ( !empty($desc) ?: $desc = 'How the corners of the element should be rounded.' );

                $base_field['label'] = __( $label, 'echelon-so' );
                $base_field['description'] = __( $desc, 'echelon-so' );
                $base_field['options'] = EsoWidgetFormPartOptions::border_radius_rounded();

                return $base_field;
            }

            // TRANSITION
            if ($field == 'transition') {

                ( !empty($label) ?: $label = 'Transition' );
                ( !empty($desc) ?: $desc = 'Add a hover transition to the element.' );

                $base_field['label'] = __( $label, 'echelon-so' );
                $base_field['description'] = __( $desc, 'echelon-so' );
                $base_field['options'] = EsoWidgetFormPartOptions::transition();

                return $base_field;
            }

            // TRANSITION OPAQUE
            if ($field == 'transition_opaque') {

                ( !empty($label) ?: $label = 'Transition Opaque' );
                ( !empty($desc) ?: $desc = 'Keep the element visible when applying transitions.' );

                $base_field['label'] = __( $label, 'echelon-so' );
                $base_field['description'] = __( $desc, 'echelon-so' );
                $base_field['options'] = EsoWidgetFormPartOptions::transition_opaque();

                return $base_field;
            }

            // TRANSITION OPAQUE
            if ($field == 'animation') {

                ( !empty($label) ?: $label = 'Animation' );
                ( !empty($desc) ?: $desc = 'Choose an animation.' );

                $base_field['label'] = __( $label, 'echelon-so' );
                $base_field['description'] = __( $desc, 'echelon-so' );
                $base_field['options'] = EsoWidgetFormPartOptions::animation();

                return $base_field;
            }

            // POSITION
            if ($field == 'position') {

                ( !empty($label) ?: $label = 'Position' );
                ( !empty($desc) ?: $desc = 'How to position the element.' );

                $base_field['label'] = __( $label, 'echelon-so' );
                $base_field['description'] = __( $desc, 'echelon-so' );
                $base_field['options'] = EsoWidgetFormPartOptions::position();

                return $base_field;
            }

            if ($field == 'position_nocover') {

                ( !empty($label) ?: $label = 'Position' );
                ( !empty($desc) ?: $desc = 'How to position the element.' );

                $base_field['label'] = __( $label, 'echelon-so' );
                $base_field['description'] = __( $desc, 'echelon-so' );
                $base_field['options'] = EsoWidgetFormPartOptions::position_nocover();

                return $base_field;
            }

            // POSITION CORNERS
            if ($field == 'position_corners') {

                ( !empty($label) ?: $label = 'Position' );
                ( !empty($desc) ?: $desc = 'How to position the element.' );

                $base_field['label'] = __( $label, 'echelon-so' );
                $base_field['description'] = __( $desc, 'echelon-so' );
                $base_field['options'] = EsoWidgetFormPartOptions::position_corners();

                return $base_field;
            }

            // POSITION CORNERS CENTER
            if ($field == 'position_corners_center') {

                ( !empty($label) ?: $label = 'Position' );
                ( !empty($desc) ?: $desc = 'How to position the element.' );

                $base_field['label'] = __( $label, 'echelon-so' );
                $base_field['description'] = __( $desc, 'echelon-so' );
                $base_field['options'] = EsoWidgetFormPartOptions::position_corners_center();

                return $base_field;
            }

            // POSITION SQUARE
            if ($field == 'position_top_bottom') {

                ( !empty($label) ?: $label = 'Position' );
                ( !empty($desc) ?: $desc = 'How to position the element.' );

                $base_field['label'] = __( $label, 'echelon-so' );
                $base_field['description'] = __( $desc, 'echelon-so' );
                $base_field['options'] = EsoWidgetFormPartOptions::position_top_bottom();

                return $base_field;
            }

            // POSITION SIZE
            if ($field == 'position_size') {

                ( !empty($label) ?: $label = 'Position Size' );
                ( !empty($desc) ?: $desc = 'Move the elements position inward' );

                $base_field['label'] = __( $label, 'echelon-so' );
                $base_field['description'] = __( $desc, 'echelon-so' );
                $base_field['options'] = EsoWidgetFormPartOptions::position_size();

                return $base_field;
            }

            /*
            * Buttons
            */

            // BUTTON STYLE
            if ($field == 'button_style') {

                ( !empty($label) ?: $label = 'Button Style' );
                ( !empty($desc) ?: $desc = 'Choose a style for the button' );

                $base_field['label'] = __( $label, 'echelon-so' );
                $base_field['description'] = __( $desc, 'echelon-so' );
                $base_field['options'] = EsoWidgetFormPartOptions::button_style();

                return $base_field;
            }

            // BUTTON SIZE
            if ($field == 'button_size') {

                ( !empty($label) ?: $label = 'Button Size' );
                ( !empty($desc) ?: $desc = 'Choose a size for the button.' );

                $base_field['label'] = __( $label, 'echelon-so' );
                $base_field['description'] = __( $desc, 'echelon-so' );
                $base_field['options'] = EsoWidgetFormPartOptions::button_size();

                return $base_field;
            }

            /*
            * GRID
            */

            // GRID
            if ($field == 'grid') {

                ( !empty($label) ?: $label = 'Grid' );
                ( !empty($desc) ?: $desc = 'Apply spacing to items in the grid.' );

                $base_field['label'] = __( $label, 'echelon-so' );
                $base_field['description'] = __( $desc, 'echelon-so' );
                $base_field['options'] = EsoWidgetFormPartOptions::grid();

                return $base_field;
            }

            // WIDTH
            if ($field == 'width') {

                ( !empty($label) ?: $label = 'Width' );
                ( !empty($desc) ?: $desc = 'Apply a fixed or percentage width to the element.' );

                $base_field['label'] = __( $label, 'echelon-so' );
                $base_field['description'] = __( $desc, 'echelon-so' );
                $base_field['options'] = EsoWidgetFormPartOptions::width();

                return $base_field;
            }

            // WIDTH
            if ($field == 'child_width') {

                ( !empty($label) ?: $label = 'Width' );
                ( !empty($desc) ?: $desc = 'Apply a fixed or percentage width to the element.' );

                $base_field['label'] = __( $label, 'echelon-so' );
                $base_field['description'] = __( $desc, 'echelon-so' );
                $base_field['options'] = EsoWidgetFormPartOptions::child_width();

                return $base_field;
            }

            if ($field == 'child_width_s') {

                ( !empty($label) ?: $label = 'Width' );
                ( !empty($desc) ?: $desc = 'Apply a fixed or percentage width to the element.' );

                $base_field['label'] = __( $label, 'echelon-so' );
                $base_field['description'] = __( $desc, 'echelon-so' );
                $base_field['options'] = EsoWidgetFormPartOptions::child_width_s();

                return $base_field;
            }

            if ($field == 'child_width_m') {

                ( !empty($label) ?: $label = 'Width' );
                ( !empty($desc) ?: $desc = 'Apply a fixed or percentage width to the element.' );

                $base_field['label'] = __( $label, 'echelon-so' );
                $base_field['description'] = __( $desc, 'echelon-so' );
                $base_field['options'] = EsoWidgetFormPartOptions::child_width_m();

                return $base_field;
            }

            if ($field == 'child_width_l') {

                ( !empty($label) ?: $label = 'Width' );
                ( !empty($desc) ?: $desc = 'Apply a fixed or percentage width to the element.' );

                $base_field['label'] = __( $label, 'echelon-so' );
                $base_field['description'] = __( $desc, 'echelon-so' );
                $base_field['options'] = EsoWidgetFormPartOptions::child_width_l();

                return $base_field;
            }

            if ($field == 'child_width_xl') {

                ( !empty($label) ?: $label = 'Width' );
                ( !empty($desc) ?: $desc = 'Apply a fixed or percentage width to the element.' );

                $base_field['label'] = __( $label, 'echelon-so' );
                $base_field['description'] = __( $desc, 'echelon-so' );
                $base_field['options'] = EsoWidgetFormPartOptions::child_width_xl();

                return $base_field;
            }

            if ($field == 'child_width_int') {

                ( !empty($label) ?: $label = 'Width' );
                ( !empty($desc) ?: $desc = 'Apply a fixed or percentage width to the element.' );

                $base_field['label'] = __( $label, 'echelon-so' );
                $base_field['description'] = __( $desc, 'echelon-so' );
                $base_field['options'] = EsoWidgetFormPartOptions::child_width_int();

                return $base_field;
            }

            if ($field == 'child_width_s_int') {

                ( !empty($label) ?: $label = 'Width' );
                ( !empty($desc) ?: $desc = 'THe width of the element in small screens.' );

                $base_field['label'] = __( $label, 'echelon-so' );
                $base_field['description'] = __( $desc, 'echelon-so' );
                $base_field['options'] = EsoWidgetFormPartOptions::child_width_s_int();

                return $base_field;
            }

            if ($field == 'child_width_m_int') {

                ( !empty($label) ?: $label = 'Width' );
                ( !empty($desc) ?: $desc = 'Apply a fixed or percentage width to the element.' );

                $base_field['label'] = __( $label, 'echelon-so' );
                $base_field['description'] = __( $desc, 'echelon-so' );
                $base_field['options'] = EsoWidgetFormPartOptions::child_width_m_int();

                return $base_field;
            }

            if ($field == 'child_width_l_int') {

                ( !empty($label) ?: $label = 'Width' );
                ( !empty($desc) ?: $desc = 'Apply a fixed or percentage width to the element.' );

                $base_field['label'] = __( $label, 'echelon-so' );
                $base_field['description'] = __( $desc, 'echelon-so' );
                $base_field['options'] = EsoWidgetFormPartOptions::child_width_l_int();

                return $base_field;
            }

            if ($field == 'child_width_xl_int') {

                ( !empty($label) ?: $label = 'Width' );
                ( !empty($desc) ?: $desc = 'Apply a fixed or percentage width to the element.' );

                $base_field['label'] = __( $label, 'echelon-so' );
                $base_field['description'] = __( $desc, 'echelon-so' );
                $base_field['options'] = EsoWidgetFormPartOptions::child_width_xl_int();

                return $base_field;
            }

            // ALIGN
            if ($field == 'align') {

                ( !empty($label) ?: $label = 'Align' );
                ( !empty($desc) ?: $desc = 'How to align the element.' );

                $base_field['label'] = __( $label, 'echelon-so' );
                $base_field['description'] = __( $desc, 'echelon-so' );
                $base_field['options'] =EsoWidgetFormPartOptions::align();

                return $base_field;
            }

            // FLEX WRAP
            if ($field == 'flex_wrap') {

                ( !empty($label) ?: $label = 'Flex Wrap' );
                ( !empty($desc) ?: $desc = 'How elements should be aligned vertically.' );

                $base_field['label'] = __( $label, 'echelon-so' );
                $base_field['description'] = __( $desc, 'echelon-so' );
                $base_field['options'] = EsoWidgetFormPartOptions::flex_wrap();

                return $base_field;
            }

            // FLEX_V
            if ($field == 'flex_v') {

                ( !empty($label) ?: $label = 'Flex Vertical' );
                ( !empty($desc) ?: $desc = 'How elements should be aligned vertically.' );

                $base_field['label'] = __( $label, 'echelon-so' );
                $base_field['description'] = __( $desc, 'echelon-so' );
                $base_field['options'] = EsoWidgetFormPartOptions::flex_v();

                return $base_field;
            }

            // FLEX_H
            if ($field == 'flex_h') {

                ( !empty($label) ?: $label = 'Flex Horizontal' );
                ( !empty($desc) ?: $desc = 'How elements should be aligned horizontally.' );

                $base_field['label'] = __( $label, 'echelon-so' );
                $base_field['description'] = __( $desc, 'echelon-so' );
                $base_field['options'] = EsoWidgetFormPartOptions::flex_h();

                return $base_field;
            }

            return false;

        }

    }

}
