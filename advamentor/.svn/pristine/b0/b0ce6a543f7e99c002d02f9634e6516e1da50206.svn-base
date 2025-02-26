<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Advanced_Post_Grid_Widget extends Widget_Base {

    public function get_name() {
        return 'advanced-post-grid';
    }

    public function get_title() {
        return 'Advanced Post Grid';
    }

    public function get_icon() {
        return 'eicon-banner';
    }

    public function get_categories() {
        return [ 'advamentor' ];
    }

    // Registering Controls
    protected function _register_controls() {

        // Registering Post Grid Global Author Controls
        $this->start_controls_section( 'advanced_post_grid_global_author_control',
            [
                'label'         => __( 'Author Filter', 'advamentor' ),
                'tab'           => Controls_Manager::TAB_CONTENT
            ]
        );

        // Registering Post Grid Global Author Filter Control
        $this->add_control('advanced_post_grid_global_author_filter_control',
            [
                'label'             => __( 'Author', 'advamentor' ),
                'type'              => Controls_Manager::SELECT2,
                'multiple'          => true,
                'options'           => advamentor_get_users(),
                'description'       => 'Select Author(s)'
            ]
        );

        // Registering Post Grid Global Author Exclude Filter Control
        $this->add_control('advanced_post_grid_global_author_exclude_filter_control',
            [
                'label'             => __( 'Exclude Author', 'advamentor' ),
                'type'              => Controls_Manager::SELECT2,
                'multiple'          => true,
                'options'           => advamentor_get_users(),
                'description'       => 'Select Author(s) to Exclude',
                'separator'         => 'after'
            ]
        );

        $this->end_controls_section();

        // Registering Post Grid Global Author Controls
        $this->start_controls_section( 'advanced_post_grid_global_category_control',
            [
                'label'         => __( 'Category Filter', 'advamentor' ),
                'tab'           => Controls_Manager::TAB_CONTENT
            ]
        );

        // Registering Post Grid Global Category Filter Control
        $this->add_control('advanced_post_grid_global_category_filter_control',
            [
                'label'             => __( 'Category', 'advamentor' ),
                'type'              => Controls_Manager::SELECT2,
                'multiple'          => true,
                'options'           => advamentor_get_categories(),
                'description'       => 'Select Category(s)'
            ]
        );

        // Registering Post Grid Global Category Exclude Filter Control
        $this->add_control('advanced_post_grid_global_category_exclude_filter_control',
            [
                'label'             => __( 'Exclude Category', 'advamentor' ),
                'type'              => Controls_Manager::SELECT2,
                'multiple'          => true,
                'options'           => advamentor_get_categories(),
                'description'       => 'Select Category(s) to Exclude',
                'separator'         => 'after'
            ]
        );

        $this->end_controls_section();

        // Registering Post Grid Global Tag Controls
        $this->start_controls_section( 'advanced_post_grid_global_tag_control',
            [
                'label'         => __( 'Tag Filter', 'advamentor' ),
                'tab'           => Controls_Manager::TAB_CONTENT
            ]
        );

        // Registering Post Grid Global Tag Filter Control
        $this->add_control('advanced_post_grid_global_tag_filter_control',
            [
                'label'             => __( 'Tag', 'advamentor' ),
                'type'              => Controls_Manager::SELECT2,
                'multiple'          => true,
                'options'           => advamentor_get_tags(),
                'description'       => 'Select Tag(s)'
            ]
        );

        // Registering Post Grid Global Tag Exclude Filter Control
        $this->add_control('advanced_post_grid_global_tag_exclude_filter_control',
            [
                'label'             => __( 'Exclude Tag', 'advamentor' ),
                'type'              => Controls_Manager::SELECT2,
                'multiple'          => true,
                'options'           => advamentor_get_tags(),
                'description'       => 'Select Tag(s) to Exclude',
                'separator'         => 'after'
            ]
        );

        $this->end_controls_section();

        // Registering Post Grid Global Post Controls
        $this->start_controls_section( 'advanced_post_grid_global_post_control',
            [
                'label'         => __( 'Post Filter', 'advamentor' ),
                'tab'           => Controls_Manager::TAB_CONTENT
            ]
        );

        // Registering Post Grid Global Post Filter Control
        $this->add_control('advanced_post_grid_global_post_filter_control',
            [
                'label'             => __( 'Specific Post(s)', 'advamentor' ),
                'type'              => Controls_Manager::SELECT2,
                'multiple'          => true,
                'options'           => advamentor_get_posts(),
                'description'       => 'Select Specific Post(s)'
            ]
        );

        // Registering Post Grid Global Post Exclude Filter Control
        $this->add_control('advanced_post_grid_global_post_exclude_filter_control',
            [
                'label'             => __( 'Exclude Post', 'advamentor' ),
                'type'              => Controls_Manager::SELECT2,
                'multiple'          => true,
                'options'           => advamentor_get_posts(),
                'description'       => 'Select Post(s) to Exclude',
                'separator'         => 'after'
            ]
        );

        $this->end_controls_section();

        // Registering Post Grid Global Other Controls
        $this->start_controls_section( 'advanced_post_grid_global_other_control',
            [
                'label'         => __( 'Other Filters', 'advamentor' ),
                'tab'           => Controls_Manager::TAB_CONTENT
            ]
        );

        // Registering Post Grid Global Post Per Page Filter Control
        $this->add_control('advanced_post_grid_global_post_per_page_control',
            [
                'label'             => __( 'Posts Per Page', 'advamentor' ),
                'type'              => Controls_Manager::NUMBER,
                'min'               => 1,
                'max'               => 1000,
                'default'           => 20
            ]
        );

        // Registering Post Grid Global Offset Filter Control
        $this->add_control('advanced_post_grid_global_offset_control',
            [
                'label'             => __( 'Offset', 'advamentor' ),
                'type'              => Controls_Manager::NUMBER,
                'min'               => 0,
                'max'               => 1000,
                'separator'         => 'after'
            ]
        );

        // Registering Post Grid Global Order Control
        $this->add_control( 'advanced_post_grid_global_order_control',
            [
                'label'         => __( 'Select Order', 'advamentor' ),
                'type'          => Controls_Manager::SELECT,
                'options'       => [
                    'ASC'       => 'Ascending',
                    'DESC'      => 'Descending'
                ],
                'default'       => 'ASC'
            ]
        );

        // Registering Post Grid Global Order By Control
        $this->add_control( 'advanced_post_grid_global_orderby_control',
            [
                'label'                 => __( 'Order By', 'advamentor' ),
                'type'                  => Controls_Manager::SELECT,
                'options'               => [
                    'none'              => 'None',
                    'ID'                => 'Post ID',
                    'author'            => 'Author',
                    'title'             => 'Title',
                    'name'              => 'Slug',
                    'date'              => 'Date',
                    'modified'          => 'Last Modified Date',
                    'parent'            => 'Post Parent ID',
                    'rand'              => 'Random',
                    'comment_count'     => 'Number of Comments',
                ],
                'default'               => 'none'
            ]
        );

        $this->end_controls_section();

        // Registering Post Grid Global Preset Controls
        $this->start_controls_section( 'advanced_post_grid_preset_style_controls',
            [
                'label'         => __( 'Preset', 'advamentor' ),
                'tab'           => Controls_Manager::TAB_STYLE
            ]
        );

        // Registering Post Grid Global Preset Selector Control
        $this->add_control( 'advanced_post_grid_global_preset_selector_control',
            [
                'label'         => __( 'Select Preset', 'advamentor' ),
                'type'          => Controls_Manager::SELECT,
                'options'       => [
                    'card'      => 'Card',
                    'imagebox'  => 'Image Box',
                    'masonry'   => 'Masonry',
                    'minimal'   => 'Minimal',
                    'modern'    => 'Modern',
                ],
                'default'       => 'card'
            ]
        );

        $this->end_controls_section();

        // Registering Post Grid Preset Display Switch Controls
        $this->start_controls_section( 'advanced_post_grid_preset_display_switch_controls',
            [
                'label'         => __( 'Display', 'advamentor' ),
                'tab'           => Controls_Manager::TAB_STYLE
            ]
        );

        // Registering Post Grid Global Column Selector Control
        $this->add_control( 'advanced_post_grid_global_column_selector_control',
            [
                'label'         => __( 'Number of Columns', 'advamentor' ),
                'type'          => Controls_Manager::SELECT,
                'options'       => [
                    '6'         => '2 Columns',
                    '4'         => '3 Columns',
                    '3'         => '4 Columns',
                    '2'         => '6 Columns'
                ],
                'default'       => '3'
            ]
        );

        // Registering Post Grid Card Author Meta Switch Control
        $this->add_control('advanced_post_grid_card_author_meta_switch_control',
            [
                'label'         => __( 'Show Author', 'advamentor' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => __( 'Show', 'advamentor' ),
                'label_off'     => __( 'Hide', 'advamentor' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'card'
                ]
            ]
        );

        // Registering Post Grid Imagebox Author Meta Switch Control
        $this->add_control('advanced_post_grid_imagebox_author_meta_switch_control',
            [
                'label'         => __( 'Show Author', 'advamentor' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => __( 'Show', 'advamentor' ),
                'label_off'     => __( 'Hide', 'advamentor' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'imagebox'
                ]
            ]
        );

        // Registering Post Grid Masonry Author Meta Switch Control
        $this->add_control('advanced_post_grid_masonry_author_meta_switch_control',
            [
                'label'         => __( 'Show Author', 'advamentor' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => __( 'Show', 'advamentor' ),
                'label_off'     => __( 'Hide', 'advamentor' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'masonry'
                ]
            ]
        );

        // Registering Post Grid Minimal Author Meta Switch Control
        $this->add_control('advanced_post_grid_minimal_author_meta_switch_control',
            [
                'label'         => __( 'Show Author', 'advamentor' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => __( 'Show', 'advamentor' ),
                'label_off'     => __( 'Hide', 'advamentor' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'minimal'
                ]
            ]
        );

        // Registering Post Grid Modern Author Meta Switch Control
        $this->add_control('advanced_post_grid_modern_author_meta_switch_control',
            [
                'label'         => __( 'Show Author', 'advamentor' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => __( 'Show', 'advamentor' ),
                'label_off'     => __( 'Hide', 'advamentor' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'modern'
                ]
            ]
        );

        // Registering Post Grid Card Category Meta Switch Control
        $this->add_control('advanced_post_grid_card_category_meta_switch_control',
            [
                'label'         => __( 'Show Category', 'advamentor' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => __( 'Show', 'advamentor' ),
                'label_off'     => __( 'Hide', 'advamentor' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'card'
                ]
            ]
        );

        // Registering Post Grid Imagebox Category Meta Switch Control
        $this->add_control('advanced_post_grid_imagebox_category_meta_switch_control',
            [
                'label'         => __( 'Show Category', 'advamentor' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => __( 'Show', 'advamentor' ),
                'label_off'     => __( 'Hide', 'advamentor' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'imagebox'
                ]
            ]
        );

        // Registering Post Grid Masonry Category Meta Switch Control
        $this->add_control('advanced_post_grid_masonry_category_meta_switch_control',
            [
                'label'         => __( 'Show Category', 'advamentor' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => __( 'Show', 'advamentor' ),
                'label_off'     => __( 'Hide', 'advamentor' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'masonry'
                ]
            ]
        );

        // Registering Post Grid Minimal Category Meta Switch Control
        $this->add_control('advanced_post_grid_minimal_category_meta_switch_control',
            [
                'label'         => __( 'Show Category', 'advamentor' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => __( 'Show', 'advamentor' ),
                'label_off'     => __( 'Hide', 'advamentor' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'minimal'
                ]
            ]
        );

        // Registering Post Grid Modern Category Meta Switch Control
        $this->add_control('advanced_post_grid_modern_category_meta_switch_control',
            [
                'label'         => __( 'Show Category', 'advamentor' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => __( 'Show', 'advamentor' ),
                'label_off'     => __( 'Hide', 'advamentor' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'modern'
                ]
            ]
        );

        // Registering Post Grid Card Comment Meta Switch Control
        $this->add_control('advanced_post_grid_card_comment_meta_switch_control',
            [
                'label'         => __( 'Show Comment Count', 'advamentor' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => __( 'Show', 'advamentor' ),
                'label_off'     => __( 'Hide', 'advamentor' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'card'
                ]
            ]
        );

        // Registering Post Grid Imagebox Comment Meta Switch Control
        $this->add_control('advanced_post_grid_imagebox_comment_meta_switch_control',
            [
                'label'         => __( 'Show Comment Count', 'advamentor' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => __( 'Show', 'advamentor' ),
                'label_off'     => __( 'Hide', 'advamentor' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'imagebox'
                ]
            ]
        );

        // Registering Post Grid Masonry Comment Meta Switch Control
        $this->add_control('advanced_post_grid_masonry_comment_meta_switch_control',
            [
                'label'         => __( 'Show Comment Count', 'advamentor' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => __( 'Show', 'advamentor' ),
                'label_off'     => __( 'Hide', 'advamentor' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'masonry'
                ]
            ]
        );

        // Registering Post Grid Minimal Comment Meta Switch Control
        $this->add_control('advanced_post_grid_minimal_comment_meta_switch_control',
            [
                'label'         => __( 'Show Comment Count', 'advamentor' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => __( 'Show', 'advamentor' ),
                'label_off'     => __( 'Hide', 'advamentor' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'minimal'
                ]
            ]
        );

        // Registering Post Grid Modern Comment Meta Switch Control
        $this->add_control('advanced_post_grid_modern_comment_meta_switch_control',
            [
                'label'         => __( 'Show Comment Count', 'advamentor' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => __( 'Show', 'advamentor' ),
                'label_off'     => __( 'Hide', 'advamentor' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'modern'
                ]
            ]
        );

        // Registering Post Grid Card Date Meta Switch Control
        $this->add_control('advanced_post_grid_card_date_meta_switch_control',
            [
                'label'         => __( 'Show Date Posted', 'advamentor' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => __( 'Show', 'advamentor' ),
                'label_off'     => __( 'Hide', 'advamentor' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'card'
                ]
            ]
        );

        // Registering Post Grid Imagebox Date Meta Switch Control
        $this->add_control('advanced_post_grid_imagebox_date_meta_switch_control',
            [
                'label'         => __( 'Show Date Posted', 'advamentor' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => __( 'Show', 'advamentor' ),
                'label_off'     => __( 'Hide', 'advamentor' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'imagebox'
                ]
            ]
        );

        // Registering Post Grid Masonry Date Meta Switch Control
        $this->add_control('advanced_post_grid_masonry_date_meta_switch_control',
            [
                'label'         => __( 'Show Date Posted', 'advamentor' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => __( 'Show', 'advamentor' ),
                'label_off'     => __( 'Hide', 'advamentor' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'masonry'
                ]
            ]
        );

        // Registering Post Grid Minimal Date Meta Switch Control
        $this->add_control('advanced_post_grid_minimal_date_meta_switch_control',
            [
                'label'         => __( 'Show Date Posted', 'advamentor' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => __( 'Show', 'advamentor' ),
                'label_off'     => __( 'Hide', 'advamentor' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'minimal'
                ]
            ]
        );

        // Registering Post Grid Modern Date Meta Switch Control
        $this->add_control('advanced_post_grid_modern_date_meta_switch_control',
            [
                'label'         => __( 'Show Date Posted', 'advamentor' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => __( 'Show', 'advamentor' ),
                'label_off'     => __( 'Hide', 'advamentor' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'modern'
                ]
            ]
        );

        // Registering Post Grid Card Excerpt Meta Switch Control
        $this->add_control('advanced_post_grid_card_excerpt_meta_switch_control',
            [
                'label'         => __( 'Show Excerpt', 'advamentor' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => __( 'Show', 'advamentor' ),
                'label_off'     => __( 'Hide', 'advamentor' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'card'
                ]
            ]
        );

        // Registering Post Grid Imagebox Excerpt Meta Switch Control
        $this->add_control('advanced_post_grid_imagebox_excerpt_meta_switch_control',
            [
                'label'         => __( 'Show Excerpt', 'advamentor' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => __( 'Show', 'advamentor' ),
                'label_off'     => __( 'Hide', 'advamentor' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'imagebox'
                ]
            ]
        );

        // Registering Post Grid Masonry Excerpt Meta Switch Control
        $this->add_control('advanced_post_grid_masonry_excerpt_meta_switch_control',
            [
                'label'         => __( 'Show Excerpt', 'advamentor' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => __( 'Show', 'advamentor' ),
                'label_off'     => __( 'Hide', 'advamentor' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'masonry'
                ]
            ]
        );

        // Registering Post Grid Minimal Excerpt Meta Switch Control
        $this->add_control('advanced_post_grid_minimal_excerpt_meta_switch_control',
            [
                'label'         => __( 'Show Excerpt', 'advamentor' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => __( 'Show', 'advamentor' ),
                'label_off'     => __( 'Hide', 'advamentor' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'minimal'
                ]
            ]
        );

        // Registering Post Grid Modern Excerpt Meta Switch Control
        $this->add_control('advanced_post_grid_modern_excerpt_meta_switch_control',
            [
                'label'         => __( 'Show Excerpt', 'advamentor' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => __( 'Show', 'advamentor' ),
                'label_off'     => __( 'Hide', 'advamentor' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'modern'
                ]
            ]
        );

        // Registering Post Grid Card Readmore Meta Switch Control
        $this->add_control('advanced_post_grid_card_readmore_meta_switch_control',
            [
                'label'         => __( 'Show Read More Link', 'advamentor' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => __( 'Show', 'advamentor' ),
                'label_off'     => __( 'Hide', 'advamentor' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'card'
                ]
            ]
        );

        // Registering Post Grid Imagebox Readmore Meta Switch Control
        $this->add_control('advanced_post_grid_imagebox_readmore_meta_switch_control',
            [
                'label'         => __( 'Show Read More Link', 'advamentor' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => __( 'Show', 'advamentor' ),
                'label_off'     => __( 'Hide', 'advamentor' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'imagebox'
                ]
            ]
        );

        // Registering Post Grid Masonry Readmore Meta Switch Control
        $this->add_control('advanced_post_grid_masonry_readmore_meta_switch_control',
            [
                'label'         => __( 'Show Read More Link', 'advamentor' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => __( 'Show', 'advamentor' ),
                'label_off'     => __( 'Hide', 'advamentor' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'masonry'
                ]
            ]
        );

        // Registering Post Grid Minimal Readmore Meta Switch Control
        $this->add_control('advanced_post_grid_minimal_readmore_meta_switch_control',
            [
                'label'         => __( 'Show Read More Link', 'advamentor' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => __( 'Show', 'advamentor' ),
                'label_off'     => __( 'Hide', 'advamentor' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'minimal'
                ]
            ]
        );

        // Registering Post Grid Modern Readmore Meta Switch Control
        $this->add_control('advanced_post_grid_modern_readmore_meta_switch_control',
            [
                'label'         => __( 'Show Read More Link', 'advamentor' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => __( 'Show', 'advamentor' ),
                'label_off'     => __( 'Hide', 'advamentor' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'modern'
                ]
            ]
        );

        // Registering Post Grid Card Featured Image Meta Switch Control
        $this->add_control('advanced_post_grid_card_featured_image_meta_switch_control',
            [
                'label'         => __( 'Show Featured Image', 'advamentor' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => __( 'Show', 'advamentor' ),
                'label_off'     => __( 'Hide', 'advamentor' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'card'
                ]
            ]
        );

        // Registering Post Grid Imagebox Featured Image Meta Switch Control
        $this->add_control('advanced_post_grid_imagebox_featured_image_meta_switch_control',
            [
                'label'         => __( 'Show Featured Image', 'advamentor' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => __( 'Show', 'advamentor' ),
                'label_off'     => __( 'Hide', 'advamentor' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'imagebox'
                ]
            ]
        );

        // Registering Post Grid Masonry Featured Image Meta Switch Control
        $this->add_control('advanced_post_grid_masonry_featured_image_meta_switch_control',
            [
                'label'         => __( 'Show Featured Image', 'advamentor' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => __( 'Show', 'advamentor' ),
                'label_off'     => __( 'Hide', 'advamentor' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'masonry'
                ]
            ]
        );

        // Registering Post Grid Minimal Featured Image Meta Switch Control
        $this->add_control('advanced_post_grid_minimal_featured_image_meta_switch_control',
            [
                'label'         => __( 'Show Featured Image', 'advamentor' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => __( 'Show', 'advamentor' ),
                'label_off'     => __( 'Hide', 'advamentor' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'minimal'
                ]
            ]
        );

        // Registering Post Grid Modern Featured Image Meta Switch Control
        $this->add_control('advanced_post_grid_modern_featured_image_meta_switch_control',
            [
                'label'         => __( 'Show Featured Image', 'advamentor' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => __( 'Show', 'advamentor' ),
                'label_off'     => __( 'Hide', 'advamentor' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'modern'
                ]
            ]
        );

        // Registering Post Grid Card Tag Meta Switch Control
        $this->add_control('advanced_post_grid_card_tag_meta_switch_control',
            [
                'label'         => __( 'Show Tag(s)', 'advamentor' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => __( 'Show', 'advamentor' ),
                'label_off'     => __( 'Hide', 'advamentor' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'card'
                ]
            ]
        );

        // Registering Post Grid Imagebox Tag Meta Switch Control
        $this->add_control('advanced_post_grid_imagebox_tag_meta_switch_control',
            [
                'label'         => __( 'Show Tag(s)', 'advamentor' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => __( 'Show', 'advamentor' ),
                'label_off'     => __( 'Hide', 'advamentor' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'imagebox'
                ]
            ]
        );

        // Registering Post Grid masonry Tag Meta Switch Control
        $this->add_control('advanced_post_grid_masonry_tag_meta_switch_control',
            [
                'label'         => __( 'Show Tag(s)', 'advamentor' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => __( 'Show', 'advamentor' ),
                'label_off'     => __( 'Hide', 'advamentor' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'masonry'
                ]
            ]
        );

        // Registering Post Grid Minimal Tag Meta Switch Control
        $this->add_control('advanced_post_grid_minimal_tag_meta_switch_control',
            [
                'label'         => __( 'Show Tag(s)', 'advamentor' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => __( 'Show', 'advamentor' ),
                'label_off'     => __( 'Hide', 'advamentor' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'minimal'
                ]
            ]
        );

        // Registering Post Grid Modern Tag Meta Switch Control
        $this->add_control('advanced_post_grid_modern_tag_meta_switch_control',
            [
                'label'         => __( 'Show Tag(s)', 'advamentor' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => __( 'Show', 'advamentor' ),
                'label_off'     => __( 'Hide', 'advamentor' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'modern'
                ]
            ]
        );

        $this->end_controls_section();

        // Registering Post Grid Preset Title Style Controls
        $this->start_controls_section( 'advanced_post_grid_preset_title_style_controls',
            [
                'label'         => __( 'Title Style', 'advamentor' ),
                'tab'           => Controls_Manager::TAB_STYLE
            ]
        );

        // Registering Post Grid Card Title Alignment Control
        $this->add_control('advanced_post_grid_card_title_alignment_control',
            [
                'label'         => __('Title Alignment', 'advamentor'),
                'type'          => Controls_Manager::CHOOSE,
                'options'       => [
                    'left'      => [
                        'title' => __('Left', 'advamentor'),
                        'icon'  => 'fa fa-align-left'
                    ],
                    'center'    => [
                        'title' => __('Center', 'advamentor'),
                        'icon'  => 'fa fa-align-center'
                    ],
                    'right'     => [
                        'title' => __('Right', 'advamentor'),
                        'icon'  => 'fa fa-align-right'
                    ],
                ],
                'default'       => 'left',
                'toggle'        => false,
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner-ib-title, {{WRAPPER}} .advanced-banner-content, {{WRAPPER}} .advanced-banner-read-more'   => 'text-align: {{VALUE}};',
                ],
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'card'
                ]
            ]
        );

        // Registering Post Grid Imagebox Title Alignment Control
        $this->add_control('advanced_post_grid_imagebox_title_alignment_control',
            [
                'label'         => __('Title Alignment', 'advamentor'),
                'type'          => Controls_Manager::CHOOSE,
                'options'       => [
                    'left'      => [
                        'title' => __('Left', 'advamentor'),
                        'icon'  => 'fa fa-align-left'
                    ],
                    'center'    => [
                        'title' => __('Center', 'advamentor'),
                        'icon'  => 'fa fa-align-center'
                    ],
                    'right'     => [
                        'title' => __('Right', 'advamentor'),
                        'icon'  => 'fa fa-align-right'
                    ],
                ],
                'default'       => 'left',
                'toggle'        => false,
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner-ib-title, {{WRAPPER}} .advanced-banner-content, {{WRAPPER}} .advanced-banner-read-more'   => 'text-align: {{VALUE}};',
                ],
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'imagebox'
                ]
            ]
        );

        // Registering Post Grid Masonry Title Alignment Control
        $this->add_control('advanced_post_grid_masonry_title_alignment_control',
            [
                'label'         => __('Title Alignment', 'advamentor'),
                'type'          => Controls_Manager::CHOOSE,
                'options'       => [
                    'left'      => [
                        'title' => __('Left', 'advamentor'),
                        'icon'  => 'fa fa-align-left'
                    ],
                    'center'    => [
                        'title' => __('Center', 'advamentor'),
                        'icon'  => 'fa fa-align-center'
                    ],
                    'right'     => [
                        'title' => __('Right', 'advamentor'),
                        'icon'  => 'fa fa-align-right'
                    ],
                ],
                'default'       => 'left',
                'toggle'        => false,
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner-ib-title, {{WRAPPER}} .advanced-banner-content, {{WRAPPER}} .advanced-banner-read-more'   => 'text-align: {{VALUE}};',
                ],
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'masonry'
                ]
            ]
        );

        // Registering Post Grid Minimal Title Alignment Control
        $this->add_control('advanced_post_grid_minimal_title_alignment_control',
            [
                'label'         => __('Title Alignment', 'advamentor'),
                'type'          => Controls_Manager::CHOOSE,
                'options'       => [
                    'left'      => [
                        'title' => __('Left', 'advamentor'),
                        'icon'  => 'fa fa-align-left'
                    ],
                    'center'    => [
                        'title' => __('Center', 'advamentor'),
                        'icon'  => 'fa fa-align-center'
                    ],
                    'right'     => [
                        'title' => __('Right', 'advamentor'),
                        'icon'  => 'fa fa-align-right'
                    ],
                ],
                'default'       => 'left',
                'toggle'        => false,
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner-ib-title, {{WRAPPER}} .advanced-banner-content, {{WRAPPER}} .advanced-banner-read-more'   => 'text-align: {{VALUE}};',
                ],
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'minimal'
                ]
            ]
        );

        // Registering Post Grid Modern Title Alignment Control
        $this->add_control('advanced_post_grid_modern_title_alignment_control',
            [
                'label'         => __('Title Alignment', 'advamentor'),
                'type'          => Controls_Manager::CHOOSE,
                'options'       => [
                    'left'      => [
                        'title' => __('Left', 'advamentor'),
                        'icon'  => 'fa fa-align-left'
                    ],
                    'center'    => [
                        'title' => __('Center', 'advamentor'),
                        'icon'  => 'fa fa-align-center'
                    ],
                    'right'     => [
                        'title' => __('Right', 'advamentor'),
                        'icon'  => 'fa fa-align-right'
                    ],
                ],
                'default'       => 'left',
                'toggle'        => false,
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner-ib-title, {{WRAPPER}} .advanced-banner-content, {{WRAPPER}} .advanced-banner-read-more'   => 'text-align: {{VALUE}};',
                ],
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'modern'
                ]
            ]
        );

        // Registering Post Grid Card Title Color Control
        $this->add_control('advanced_post_grid_card_title_color_control',
            [
                'label'         => __( 'Title Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#ffffff',
                'selectors'     => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ],
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'card'
                ]
            ]
        );

        // Registering Post Grid Imagebox Title Color Control
        $this->add_control('advanced_post_grid_imagebox_title_color_control',
            [
                'label'         => __( 'Title Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#ff0000',
                'selectors'     => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ],
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'imagebox'
                ]
            ]
        );

        // Registering Post Grid Masonry Title Color Control
        $this->add_control('advanced_post_grid_masonry_title_color_control',
            [
                'label'         => __( 'Title Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#a0a0a0',
                'selectors'     => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ],
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'masonry'
                ]
            ]
        );

        // Registering Post Grid Minimal Title Color Control
        $this->add_control('advanced_post_grid_minimal_title_color_control',
            [
                'label'         => __( 'Title Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#000000',
                'selectors'     => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ],
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'minimal'
                ]
            ]
        );

        // Registering Post Grid Modern Title Color Control
        $this->add_control('advanced_post_grid_modern_title_color_control',
            [
                'label'         => __( 'Title Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#fff000',
                'selectors'     => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ],
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'modern'
                ]
            ]
        );

        // Registering Post Grid Card Title Hover Color Control
        $this->add_control('advanced_post_grid_card_title_hover_color_control',
            [
                'label'         => __( 'Title Hover Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#ffffff',
                'selectors'     => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ],
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'card'
                ]
            ]
        );

        // Registering Post Grid Imagebox Title Hover Color Control
        $this->add_control('advanced_post_grid_imagebox_title_hover_color_control',
            [
                'label'         => __( 'Title Hover Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#ff0000',
                'selectors'     => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ],
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'imagebox'
                ]
            ]
        );

        // Registering Post Grid Masonry Title Hover Color Control
        $this->add_control('advanced_post_grid_masonry_title_hover_color_control',
            [
                'label'         => __( 'Title Hover Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#a0a0a0',
                'selectors'     => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ],
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'masonry'
                ]
            ]
        );

        // Registering Post Grid Minimal Title Hover Color Control
        $this->add_control('advanced_post_grid_minimal_title_hover_color_control',
            [
                'label'         => __( 'Title Hover Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#000000',
                'selectors'     => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ],
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'minimal'
                ]
            ]
        );

        // Registering Post Grid Modern Title Hover Color Control
        $this->add_control('advanced_post_grid_modern_title_hover_color_control',
            [
                'label'         => __( 'Title Hover Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#fff000',
                'selectors'     => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ],
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'modern'
                ]
            ]
        );

        // Registering Post Grid Card Title Typography Control
        $this->add_group_control( Group_Control_Typography::get_type(),
            [
                'name' => 'advanced_post_grid_card_title_typography_control',
                'label' => __( 'Title Typography', 'advamentor' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'card'
                ],
                'selector' => '{{WRAPPER}} .text',
            ]
        );

        // Registering Post Grid Imagebox Title Typography Control
        $this->add_group_control( Group_Control_Typography::get_type(),
            [
                'name' => 'advanced_post_grid_imagebox_title_typography_control',
                'label' => __( 'Title Typography', 'advamentor' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'imagebox'
                ],
                'selector' => '{{WRAPPER}} .text',
            ]
        );

        // Registering Post Grid Masonry Title Typography Control
        $this->add_group_control( Group_Control_Typography::get_type(),
            [
                'name' => 'advanced_post_grid_masonry_title_typography_control',
                'label' => __( 'Title Typography', 'advamentor' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'masonry'
                ],
                'selector' => '{{WRAPPER}} .text',
            ]
        );

        // Registering Post Grid Minimal Title Typography Control
        $this->add_group_control( Group_Control_Typography::get_type(),
            [
                'name' => 'advanced_post_grid_minimal_title_typography_control',
                'label' => __( 'Title Typography', 'advamentor' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'minimal'
                ],
                'selector' => '{{WRAPPER}} .text',
            ]
        );

        // Registering Post Grid Modern Title Typography Control
        $this->add_group_control( Group_Control_Typography::get_type(),
            [
                'name' => 'advanced_post_grid_modern_title_typography_control',
                'label' => __( 'Title Typography', 'advamentor' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'modern'
                ],
                'selector' => '{{WRAPPER}} .text',
            ]
        );

        $this->end_controls_section();

        // Registering Post Grid Preset Excerpt Style Controls
        $this->start_controls_section( 'advanced_post_grid_preset_excerpt_style_controls',
            [
                'label'         => __( 'Excerpt Style', 'advamentor' ),
                'tab'           => Controls_Manager::TAB_STYLE
            ]
        );

        // Registering Post Grid Card Excerpt Alignment Control
        $this->add_control('advanced_post_grid_card_excerpt_alignment_control',
            [
                'label'         => __('Excerpt Alignment', 'advamentor'),
                'type'          => Controls_Manager::CHOOSE,
                'options'       => [
                    'left'      => [
                        'title' => __('Left', 'advamentor'),
                        'icon'  => 'fa fa-align-left'
                    ],
                    'center'    => [
                        'title' => __('Center', 'advamentor'),
                        'icon'  => 'fa fa-align-center'
                    ],
                    'right'     => [
                        'title' => __('Right', 'advamentor'),
                        'icon'  => 'fa fa-align-right'
                    ],
                ],
                'default'       => 'left',
                'toggle'        => false,
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner-ib-title, {{WRAPPER}} .advanced-banner-content, {{WRAPPER}} .advanced-banner-read-more'   => 'text-align: {{VALUE}};',
                ],
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'card'
                ]
            ]
        );

        // Registering Post Grid Imagebox Excerpt Alignment Control
        $this->add_control('advanced_post_grid_imagebox_excerpt_alignment_control',
            [
                'label'         => __('Excerpt Alignment', 'advamentor'),
                'type'          => Controls_Manager::CHOOSE,
                'options'       => [
                    'left'      => [
                        'title' => __('Left', 'advamentor'),
                        'icon'  => 'fa fa-align-left'
                    ],
                    'center'    => [
                        'title' => __('Center', 'advamentor'),
                        'icon'  => 'fa fa-align-center'
                    ],
                    'right'     => [
                        'title' => __('Right', 'advamentor'),
                        'icon'  => 'fa fa-align-right'
                    ],
                ],
                'default'       => 'left',
                'toggle'        => false,
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner-ib-title, {{WRAPPER}} .advanced-banner-content, {{WRAPPER}} .advanced-banner-read-more'   => 'text-align: {{VALUE}};',
                ],
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'imagebox'
                ]
            ]
        );

        // Registering Post Grid Masonry Excerpt Alignment Control
        $this->add_control('advanced_post_grid_masonry_excerpt_alignment_control',
            [
                'label'         => __('Excerpt Alignment', 'advamentor'),
                'type'          => Controls_Manager::CHOOSE,
                'options'       => [
                    'left'      => [
                        'title' => __('Left', 'advamentor'),
                        'icon'  => 'fa fa-align-left'
                    ],
                    'center'    => [
                        'title' => __('Center', 'advamentor'),
                        'icon'  => 'fa fa-align-center'
                    ],
                    'right'     => [
                        'title' => __('Right', 'advamentor'),
                        'icon'  => 'fa fa-align-right'
                    ],
                ],
                'default'       => 'left',
                'toggle'        => false,
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner-ib-title, {{WRAPPER}} .advanced-banner-content, {{WRAPPER}} .advanced-banner-read-more'   => 'text-align: {{VALUE}};',
                ],
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'masonry'
                ]
            ]
        );

        // Registering Post Grid Minimal Excerpt Alignment Control
        $this->add_control('advanced_post_grid_minimal_excerpt_alignment_control',
            [
                'label'         => __('Excerpt Alignment', 'advamentor'),
                'type'          => Controls_Manager::CHOOSE,
                'options'       => [
                    'left'      => [
                        'title' => __('Left', 'advamentor'),
                        'icon'  => 'fa fa-align-left'
                    ],
                    'center'    => [
                        'title' => __('Center', 'advamentor'),
                        'icon'  => 'fa fa-align-center'
                    ],
                    'right'     => [
                        'title' => __('Right', 'advamentor'),
                        'icon'  => 'fa fa-align-right'
                    ],
                ],
                'default'       => 'left',
                'toggle'        => false,
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner-ib-title, {{WRAPPER}} .advanced-banner-content, {{WRAPPER}} .advanced-banner-read-more'   => 'text-align: {{VALUE}};',
                ],
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'minimal'
                ]
            ]
        );

        // Registering Post Grid Modern Excerpt Alignment Control
        $this->add_control('advanced_post_grid_modern_excerpt_alignment_control',
            [
                'label'         => __('Excerpt Alignment', 'advamentor'),
                'type'          => Controls_Manager::CHOOSE,
                'options'       => [
                    'left'      => [
                        'title' => __('Left', 'advamentor'),
                        'icon'  => 'fa fa-align-left'
                    ],
                    'center'    => [
                        'title' => __('Center', 'advamentor'),
                        'icon'  => 'fa fa-align-center'
                    ],
                    'right'     => [
                        'title' => __('Right', 'advamentor'),
                        'icon'  => 'fa fa-align-right'
                    ],
                ],
                'default'       => 'left',
                'toggle'        => false,
                'selectors'     => [
                    '{{WRAPPER}} .advanced-banner-ib-title, {{WRAPPER}} .advanced-banner-content, {{WRAPPER}} .advanced-banner-read-more'   => 'text-align: {{VALUE}};',
                ],
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'modern'
                ]
            ]
        );

        // Registering Post Grid Card Excerpt Color Control
        $this->add_control('advanced_post_grid_card_excerpt_color_control',
            [
                'label'         => __( 'Excerpt Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#fff000',
                'selectors'     => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ],
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'card'
                ]
            ]
        );

        // Registering Post Grid Imagebox Excerpt Color Control
        $this->add_control('advanced_post_grid_imagebox_excerpt_color_control',
            [
                'label'         => __( 'Excerpt Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#fff000',
                'selectors'     => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ],
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'imagebox'
                ]
            ]
        );

        // Registering Post Grid Masonry Excerpt Color Control
        $this->add_control('advanced_post_grid_masonry_excerpt_color_control',
            [
                'label'         => __( 'Excerpt Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#fff000',
                'selectors'     => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ],
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'masonry'
                ]
            ]
        );

        // Registering Post Grid Minimal Excerpt Color Control
        $this->add_control('advanced_post_grid_minimal_excerpt_color_control',
            [
                'label'         => __( 'Excerpt Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#fff000',
                'selectors'     => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ],
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'minimal'
                ]
            ]
        );

        // Registering Post Grid Modern Excerpt Color Control
        $this->add_control('advanced_post_grid_modern_excerpt_color_control',
            [
                'label'         => __( 'Excerpt Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#fff000',
                'selectors'     => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ],
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'modern'
                ]
            ]
        );

        // Registering Post Grid Card Excerpt Typography Control
        $this->add_group_control( Group_Control_Typography::get_type(),
            [
                'name' => 'advanced_post_grid_card_excerpt_typography_control',
                'label' => __( 'Excerpt Typography', 'advamentor' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'card'
                ],
                'selector' => '{{WRAPPER}} .text',
            ]
        );

        // Registering Post Grid Imagebox Excerpt Typography Control
        $this->add_group_control( Group_Control_Typography::get_type(),
            [
                'name' => 'advanced_post_grid_imagebox_excerpt_typography_control',
                'label' => __( 'Excerpt Typography', 'advamentor' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'imagebox'
                ],
                'selector' => '{{WRAPPER}} .text',
            ]
        );

        // Registering Post Grid Masonry Excerpt Typography Control
        $this->add_group_control( Group_Control_Typography::get_type(),
            [
                'name' => 'advanced_post_grid_masonry_excerpt_typography_control',
                'label' => __( 'Excerpt Typography', 'advamentor' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'masonry'
                ],
                'selector' => '{{WRAPPER}} .text',
            ]
        );

        // Registering Post Grid Minimal Excerpt Typography Control
        $this->add_group_control( Group_Control_Typography::get_type(),
            [
                'name' => 'advanced_post_grid_minimal_excerpt_typography_control',
                'label' => __( 'Excerpt Typography', 'advamentor' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'minimal'
                ],
                'selector' => '{{WRAPPER}} .text',
            ]
        );

        // Registering Post Grid Modern Excerpt Typography Control
        $this->add_group_control( Group_Control_Typography::get_type(),
            [
                'name' => 'advanced_post_grid_modern_excerpt_typography_control',
                'label' => __( 'Excerpt Typography', 'advamentor' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'modern'
                ],
                'selector' => '{{WRAPPER}} .text',
            ]
        );

        $this->end_controls_section();

        // Registering Post Grid Preset Meta Style Controls
        $this->start_controls_section( 'advanced_post_grid_preset_meta_style_controls',
            [
                'label'         => __( 'Meta Style', 'advamentor' ),
                'tab'           => Controls_Manager::TAB_STYLE
            ]
        );

        // Registering Post Grid Card Meta Color Control
        $this->add_control('advanced_post_grid_card_meta_color_control',
            [
                'label'         => __( 'Meta Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#fff000',
                'selectors'     => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ],
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'card'
                ]
            ]
        );

        // Registering Post Grid Imagebox Meta Color Control
        $this->add_control('advanced_post_grid_imagebox_meta_color_control',
            [
                'label'         => __( 'Meta Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#fff000',
                'selectors'     => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ],
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'imagebox'
                ]
            ]
        );

        // Registering Post Grid Masonry Meta Color Control
        $this->add_control('advanced_post_grid_masonry_meta_color_control',
            [
                'label'         => __( 'Meta Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#fff000',
                'selectors'     => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ],
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'masonry'
                ]
            ]
        );

        // Registering Post Grid Minimal Meta Color Control
        $this->add_control('advanced_post_grid_minimal_meta_color_control',
            [
                'label'         => __( 'Meta Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#fff000',
                'selectors'     => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ],
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'minimal'
                ]
            ]
        );

        // Registering Post Grid Modern Meta Color Control
        $this->add_control('advanced_post_grid_modern_meta_color_control',
            [
                'label'         => __( 'Meta Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#fff000',
                'selectors'     => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ],
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'modern'
                ]
            ]
        );

        $this->end_controls_section();

        // Registering Post Grid Preset Meta Style Controls
        $this->start_controls_section( 'advanced_post_grid_preset_readmore_style_controls',
            [
                'label'         => __( 'Read More Style', 'advamentor' ),
                'tab'           => Controls_Manager::TAB_STYLE
            ]
        );

        // Registering Post Grid Card Read More Text/Icon Color Control
        $this->add_control('advanced_post_grid_card_readmore_color_control',
            [
                'label'         => __( 'Read More Text/Icon Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#fff000',
                'selectors'     => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ],
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'card'
                ]
            ]
        );

        // Registering Post Grid Imagebox Read More Text/Icon Color Control
        $this->add_control('advanced_post_grid_imagebox_readmore_color_control',
            [
                'label'         => __( 'Read More Text/Icon Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#fff000',
                'selectors'     => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ],
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'imagebox'
                ]
            ]
        );

        // Registering Post Grid Masonry Read More Text/Icon Color Control
        $this->add_control('advanced_post_grid_masonry_readmore_color_control',
            [
                'label'         => __( 'Read More Text/Icon Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#fff000',
                'selectors'     => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ],
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'masonry'
                ]
            ]
        );

        // Registering Post Grid Minimal Read More Text/Icon Color Control
        $this->add_control('advanced_post_grid_minimal_readmore_color_control',
            [
                'label'         => __( 'Read More Text/Icon Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#fff000',
                'selectors'     => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ],
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'minimal'
                ]
            ]
        );

        // Registering Post Grid Modern Read More Text/Icon Color Control
        $this->add_control('advanced_post_grid_modern_readmore_color_control',
            [
                'label'         => __( 'Read More Text/Icon Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#fff000',
                'selectors'     => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ],
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'modern'
                ]
            ]
        );

        // Registering Post Grid Card Read More Background Color Control
        $this->add_control('advanced_post_grid_card_readmore_bg_color_control',
            [
                'label'         => __( 'Read More Background Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#fff000',
                'selectors'     => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ],
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'card'
                ]
            ]
        );

        // Registering Post Grid Imagebox Read More Background Color Control
        $this->add_control('advanced_post_grid_imagebox_readmore_bg_color_control',
            [
                'label'         => __( 'Read More Background Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#fff000',
                'selectors'     => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ],
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'imagebox'
                ]
            ]
        );

        // Registering Post Grid Masonry Read More Background Color Control
        $this->add_control('advanced_post_grid_masonry_readmore_bg_color_control',
            [
                'label'         => __( 'Read More Background Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#fff000',
                'selectors'     => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ],
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'masonry'
                ]
            ]
        );

        // Registering Post Grid Minimal Read More Background Color Control
        $this->add_control('advanced_post_grid_minimal_readmore_bg_color_control',
            [
                'label'         => __( 'Read More Background Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#fff000',
                'selectors'     => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ],
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'minimal'
                ]
            ]
        );

        // Registering Post Grid Modern Read More Background Color Control
        $this->add_control('advanced_post_grid_modern_meta_bg_color_control',
            [
                'label'         => __( 'Read More Background Color', 'advamentor' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#fff000',
                'selectors'     => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ],
                'condition'     => [
                    'advanced_post_grid_global_preset_selector_control' => 'modern'
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {

        $settings   = $this->get_settings_for_display();

        $args = array(
            'post_type'             => 'post',
            'author__in'            => $settings['advanced_post_grid_global_author_filter_control'],
            'author__not_in'        => $settings['advanced_post_grid_global_author_exclude_filter_control'],
            'category__in'          => $settings['advanced_post_grid_global_category_filter_control'],
            'category__not_in'      => $settings['advanced_post_grid_global_category_exclude_filter_control'],
            'tag__in'               => $settings['advanced_post_grid_global_tag_filter_control'],
            'tag__not_in'           => $settings['advanced_post_grid_global_tag_exclude_filter_control'],
            'post__in'              => $settings['advanced_post_grid_global_post_filter_control'],
            'post__not_in'          => $settings['advanced_post_grid_global_post_exclude_filter_control'],
            'posts_per_page'        => $settings['advanced_post_grid_global_post_per_page_control'],
            'offset'                => $settings['advanced_post_grid_global_offset_control'],
            'order'                 => $settings['advanced_post_grid_global_order_control'],
            'orderby'               => $settings['advanced_post_grid_global_orderby_control'],
        );

        $the_query = new \WP_Query( $args );

        if ( $the_query->have_posts() ) {

            while ( $the_query->have_posts() ) {

                $the_query->the_post();

                echo '<ul style="border: 1px solid #d7d7d7; padding: 20px">';
                echo '<li><strong>Post Title </strong><a href=" ' . get_post_permalink() . ' ">' . get_the_title() . '</a></li>';
                echo '<li><strong>Post ID </strong>' . get_the_ID() . '</li>';
                echo '<li><strong>Post Thumbnail </strong>' . get_the_post_thumbnail(get_the_ID(), 'full') . '</li>';
                echo '<li><strong>Author Name </strong>' . get_the_author() . '</li>';
                echo '<li><strong>Updated At </strong>' . get_post_modified_time('F d, Y g:i a') . '</li>';
                echo '<li><strong>Total Comments </strong>' . get_comments_number() . '</li>';
                echo '<li><strong>Here is the Content Brief </strong>' . get_the_excerpt() . '</li>';
                echo '<li><strong>Posted In </strong>' . get_the_category_list(', ') . '</li>';
                echo '</ul>';

            }

        } else {

            echo 'No Post Found';

        }

        wp_reset_postdata();

    }

}