<?php

class ACT_PostTypeGrid extends ET_Builder_Module {

    public $slug       = 'act_post_type_grid';
    public $vb_support = 'on';

    protected $module_credits = array(
        'module_uri' => 'https://www.advancedcustomtypes.io',
        'author'     => 'Pablo Capello',
        'author_uri' => 'https://www.capellopablo.com',
    );

    public function init() {
        $this->name = esc_html__( 'ACT Post Type Grid', 'act-divi' );

        $this->main_css_element = '%%order_class%%.act_post_type_grid';


        $this->advanced_fields = array(
            'background'     => array(
                'options' => array(
                    'background_color' => array(
                        'default'          => false,
                    ),
                ),
            ),

            'borders'        => array(
                'default' => array(
                    'css'      => array(
                        'main' => array(
                            'border_styles' => "{$this->main_css_element} article.act-post",
                            'border_radii' => "{$this->main_css_element} article.act-post",
                        ),
                    ),
                    'defaults' => array(
                        'border_radii' => 'on|15px|15px|15px|15px',
                        'border_styles' => array(
                            'width' => '4px',
                            'color' => 'rgb(158, 158, 158)',
                            'style' => 'outset',
                        ),
                    ),
                ),
                'fullwidth' => array(
                    'css' => array(
                        'main' => array(
                            'border_radii'  => "%%order_class%%:not(.et_pb_blog_grid) .et_pb_post",
                            'border_styles' => "%%order_class%%:not(.et_pb_blog_grid) .et_pb_post",
                        ),
                    ),
                    'depends_on'      => array( 'fullwidth' ),
                    'depends_show_if' => 'on',
                    'defaults'        => array(
                        'border_radii'  => 'on||||',
                        'border_styles' => array(
                            'width' => '0px',
                            'color' => '#333333',
                            'style' => 'solid',
                        ),
                    ),
                ),
            ),

            'box_shadow'     => array(
                'default' => array(
                    'css' => array(
                        'main' => "{$this->main_css_element} article.act-post",
                    ),
                ),
            ),

            'button'         => array(
//                'default' => false,

                'view_more' => array(
                    'label'         => esc_html__( 'View more button', 'act-divi' ),
                    'css'           => array(
                        'plugin_main' => "{$this->main_css_element} .act-post .et_pb_button_wrapper a.et_pb_button",
                        'alignment'   => "{$this->main_css_element} .act-post .et_pb_button_wrapper",
                    ),
                    'use_alignment' => true,
                    'box_shadow'    => false,
                    'show_button_icon'    => false,
                    'button_icon'    => false,
                    'icon'    => false,
                ),

            ),


            'filters'        => array(
                'child_filters_target' => array(
                    'tab_slug'    => 'advanced',
                    'toggle_slug' => 'image',
                ),
                'css'                  => array(
                    'main' => '%%order_class%%',
                ),
            ),


            'fonts'          => array(
                'header' => array(
                    'css'          => array(
                        'main'      => "{$this->main_css_element} .act-post h2, {$this->main_css_element} .act-post h1, {$this->main_css_element} .act-post h3, {$this->main_css_element} .act-post h4, {$this->main_css_element} .act-post h5, {$this->main_css_element} .act-post h6",
                        'important' => 'all',
                    ),
                    'header_level' => array(
                        'default' => 'h2',
                    ),
                    'label'        => esc_html__( 'Title', 'act-divi' ),
                ),
                'body'   => array(
                    'css'   => array(
                        'line_height' => "{$this->main_css_element} .act-post .act-post-content p",
                        'plugin_main' => "{$this->main_css_element} .act-post .act-post-content p",
                        'text_shadow' => "{$this->main_css_element} .act-post .act-post-content p",
                    ),
                    'label' => esc_html__( 'Body', 'act-divi' ),
                ),

                /*'button' => array(
                    'label' => esc_html__( 'Button', 'et_builder' ),
                ),*/
            ),

            'margin_padding' => array(
                'css' => array(
                    'important' => 'all',
                ),
            ),

            'max_width'      => array(
                'css' => array(
                    'module_alignment' => "{$this->main_css_element}.simp-custom-class",
                ),
            ),

            'link_options'   => false,

            'image'                 => array(
                'css' => array(
                    'main' => implode(', ', array(
                        '%%order_class%% img',
                        '%%order_class%% .et_pb_slides',
                        '%%order_class%% .et_pb_video_overlay',
                    )),
                ),
            ),
        );


        // Only for development
        $debug_module = true;
        if (is_admin()) {
            // Clear module from cache if necessary
            if ($debug_module) {
                add_action('admin_head', array( $this, 'remove_from_local_storage' ) );
            }
        }
    }

    // Only for development
     public $debug_module = true;

    // Only for development
    public function remove_from_local_storage() {
        global $debug_module;
        echo "<script>localStorage.removeItem('et_pb_templates_".esc_attr($this->slug)."');</script>";
    }




    /*
    public function get_advanced_fields_config() {
        return array(
            'background'     => array(
                'options' => array(
                    'background_color' => array(
                        'default'          => false,
                    ),
                ),
            ),

            'borders'        => array(
                'default' => array(
                    'css'      => array(
                        'main' => array(
                            'border_styles' => "{$this->main_css_element} article.act-post",
                            'border_radii' => "{$this->main_css_element} article.act-post",
                        ),
                    ),
                    'defaults' => array(
                        'border_radii' => 'on|15px|15px|15px|15px',
                        'border_styles' => array(
                            'width' => '4px',
                            'color' => 'rgb(158, 158, 158)',
                            'style' => 'outset',
                        ),
                    ),
                ),
                'fullwidth' => array(
                    'css' => array(
                        'main' => array(
                            'border_radii'  => "%%order_class%%:not(.et_pb_blog_grid) .et_pb_post",
                            'border_styles' => "%%order_class%%:not(.et_pb_blog_grid) .et_pb_post",
                        ),
                    ),
                    'depends_on'      => array( 'fullwidth' ),
                    'depends_show_if' => 'on',
                    'defaults'        => array(
                        'border_radii'  => 'on||||',
                        'border_styles' => array(
                            'width' => '0px',
                            'color' => '#333333',
                            'style' => 'solid',
                        ),
                    ),
                ),
            ),

            'box_shadow'     => array(
                'default' => array(
                    'css' => array(
                        'main' => "{$this->main_css_element} article.act-post",
                    ),
                ),
            ),

            'button'         => array(
                'default' => false,

                'view_more' => array(
                    'label'         => esc_html__( 'View more button', 'act-divi' ),
                    'css'           => array(
                        'plugin_main' => "{$this->main_css_element} .act-post .et_pb_button_wrapper a.et_pb_button",
                        'alignment'   => "{$this->main_css_element} .act-post .et_pb_button_wrapper",
                    ),
                    'use_alignment' => true,
                    'box_shadow'    => false,
                    'show_button_icon'    => false,
                    'button_icon'    => false,
                    'icon'    => false,
                ),

            ),


            'filters'        => array(
                'child_filters_target' => array(
                    'tab_slug'    => 'advanced',
                    'toggle_slug' => 'image',
                ),
                'css'                  => array(
                    'main' => '%%order_class%%',
                ),
            ),


            'fonts'          => array(
                'header' => array(
                    'css'          => array(
                        'main'      => "{$this->main_css_element} .act-post h2, {$this->main_css_element} .act-post h1, {$this->main_css_element} .act-post h3, {$this->main_css_element} .act-post h4, {$this->main_css_element} .act-post h5, {$this->main_css_element} .act-post h6",
                        'important' => 'all',
                    ),
                    'header_level' => array(
                        'default' => 'h2',
                    ),
                    'label'        => esc_html__( 'Title', 'act-divi' ),
                ),
                'body'   => array(
                    'css'   => array(
                        'line_height' => "{$this->main_css_element} .act-post .act-post-content p",
                        'plugin_main' => "{$this->main_css_element} .act-post .act-post-content p",
                        'text_shadow' => "{$this->main_css_element} .act-post .act-post-content p",
                    ),
                    'label' => esc_html__( 'Body', 'act-divi' ),
                ),
                'button' => array(
                    'label' => esc_html__( 'Button', 'et_builder' ),
                ),
            ),

            'margin_padding' => array(
                'css' => array(
                    'important' => 'all',
                ),
            ),

            'max_width'      => array(
                'css' => array(
                    'module_alignment' => "{$this->main_css_element}.simp-custom-class",
                ),
            ),

            'link_options'          => false,
        );
    }*/


    public function get_settings_modal_toggles() {
        return array(
            'general' => array(
                'toggles' => array(
                    'content'	=>	array(
                        'priority' => 1,
                        'title' => esc_html__( 'Content', 'act-divi' ),
                    ),
                    'query'	=>	array(
                        'priority' => 3,
                        'title' => esc_html__( 'Query', 'act-divi' ),
                    ),
                ),
            ),
            'design' => array(
                'toggles' => array(
                    'layout'	=>	array(
                        'priority' => 3,
                        'title' => esc_html__( 'Layout', 'act-divi' ),
                    ),
                    'card'	=>	array(
                        'priority' => 4,
                        'title' => esc_html__( 'Card', 'act-divi' ),
                    ),
                ),
            ),
        );
    }

    public function get_fields() {
        return array(


            // Content fields
            'show_title' => array(
                'label'           => esc_html__( 'Show title', 'act-divi' ),
                'type' => 'yes_no_button',
                'option_category' => 'basic_option',
                'description' => esc_html__('Show title.', 'act-divi'),
                'toggle_slug' => 'content',
                'default_on_front' => 'on',
                'options' => array(
                    'on'  => esc_html__( 'Yes', 'act-divi'),
                    'off' => esc_html__( 'No', 'act-divi'),
                ),
                'computed_affects' => array(
                    '__layoutProps',
                ),
            ),

            'show_thumbnail' => array(
                'label'           => esc_html__( 'Show thumbnail', 'act-divi' ),
                'type' => 'yes_no_button',
                'option_category' => 'basic_option',
                'description' => esc_html__('Show thumbnail', 'act-divi'),
                'toggle_slug' => 'content',
                'default_on_front' => 'on',
                'options' => array(
                    'on'  => esc_html__( 'Yes', 'act-divi'),
                    'off' => esc_html__( 'No', 'act-divi'),
                ),'computed_affects' => array(
                    '__layoutProps',
                ),
            ),
            'thumbnail_size' => array(
                'label'           => esc_html__( 'Thumbnail size', 'act-divi' ),
                'type'            => 'select',
                'options'         => get_intermediate_image_sizes(),
                'default_on_front'         => 'et-pb-post-main-image',
                'option_category' => 'layout',
                'description'     => esc_html__( 'Thumbnail size.', 'act-divi' ),
                'toggle_slug'     => 'content',
                'depends_show_if'   => 'on',
                'depends_to'        => array(
                    'show_thumbnail'
                ),
                'computed_affects' => array(
                    '__layoutProps',
                ),
            ),

            'show_content' => array(
                'label'           => esc_html__( 'Show content', 'act-divi' ),
                'type' => 'yes_no_button',
                'option_category' => 'basic_option',
                'description' => esc_html__('Show content', 'act-divi'),
                'toggle_slug' => 'content',
                'default_on_front' => 'on',
                'options' => array(
                    'on'  => esc_html__( 'Yes', 'act-divi'),
                    'off' => esc_html__( 'No', 'act-divi'),
                ),
                'computed_affects' => array(
                    '__layoutProps',
                ),
            ),
            'content_length' => array(
                'label'           => esc_html__( 'Content length', 'act-divi' ),
                'type'            => 'select',
                'options'         => array('excerpt' => 'Show excerpt', 'content' => 'Show content'),
                'default_on_front'         => 'excerpt',
                'option_category' => 'layout',
                'description'     => esc_html__( 'Content length', 'act-divi' ),
                'toggle_slug'     => 'content',
                'depends_show_if'   => 'on',
                'depends_to'        => array(
                    'show_content'
                ),
                'computed_affects' => array(
                    '__layoutProps',
                ),

            ),
            'show_button' => array(
                'label'           => esc_html__( 'Show button', 'act-divi' ),
                'type' => 'yes_no_button',
                'option_category' => 'basic_option',
                'description' => esc_html__('Show button', 'act-divi'),
                'toggle_slug' => 'content',
                'default_on_front' => 'on',
                'options' => array(
                    'on'  => esc_html__( 'Yes', 'act-divi'),
                    'off' => esc_html__( 'No', 'act-divi'),
                ),
                'computed_affects' => array(
                    '__layoutProps',
                ),
            ),



            // Query fields
            'post_type' => array(
                'label'           => esc_html__( 'Post type', 'act-divi' ),
                'type'            => 'select',
                'options'         => ACTModuleHelper::get_post_types(),
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Post type', 'act-divi' ),
                'toggle_slug'     => 'query',
                'computed_affects' => array(
                    '__query',
                ),
            ),
            'posts_limit' => array(
                'label'           => esc_html__( 'Posts limit', 'act-divi' ),
                'type'            => 'number',
                'option_category' => 'configuration',
                'description'     => esc_html__( 'Posts limit.', 'act-divi' ),
                'toggle_slug'     => 'query',
                'computed_affects' => array(
                    '__query',
                ),
                'default'           => 6,
            ),
            'posts_offset' => array(
                'label'           => esc_html__( 'Posts offset', 'act-divi' ),
                'type'            => 'number',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Posts offset.', 'act-divi' ),
                'toggle_slug'     => 'query',
                'computed_affects' => array(
                    '__query',
                ),
            ),
            'order_by' => array(
                'label'           => esc_html__( 'Order', 'act-divi' ),
                'type'            => 'select',
                'options'         => array('title','name','date','rand','author','ID'),
                'default_on_front'=> 'DESC',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Order posts by.', 'act-divi' ),
                'toggle_slug'     => 'query',
                'computed_affects' => array(
                    '__query',
                ),
            ),
            'order' => array(
                'label'           => esc_html__( 'Order by', 'act-divi' ),
                'type'            => 'select',
                'options'         => array('ASC','DESC'),
                'default_on_front'=> 'date',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Posts order', 'act-divi' ),
                'toggle_slug'     => 'query',
                'computed_affects' => array(
                    '__query',
                ),
            ),


            // Buttons fields
            'view_more_text' => array(
                'label'           => esc_html__( 'View more text', 'act-divi' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'View more text', 'act-divi' ),
                'toggle_slug'     => 'button',
                'default'         => 'View more',
                'depends_show_if'   => 'on',
                'depends_to'        => array(
                    'show_button'
                ),
                'computed_affects' => array(
                    '__layoutProps',
                ),
            ),



            // Layout fields
            'heading_tag' => array(
                'label'           => esc_html__( 'Heading Level', 'act-divi' ),
                'type'            => 'select',
                'option_category' => 'layout',
                'options'		=>[
                    'h1'   => __( 'H1', 'act-divi' ),
                    'h2'   => __( 'H2', 'act-divi' ),
                    'h3'   => __( 'H3', 'act-divi' ),
                    'h4'   => __( 'H4', 'act-divi' ),
                    'h5'   => __( 'H5', 'act-divi' ),
                    'h6'   => __( 'H6', 'act-divi' )
                ],
                'default_on_front'=> 'h3',
                'tab_slug'		  => 'advanced',
                'toggle_slug'     => 'layout',
                'computed_affects' => array(
                ),
                '__layoutProps',
            ),
            'layout' => array(
                'label'           => esc_html__( 'Layout', 'act-divi' ),
                'type'            => 'select',
                'options'         => $this->get_layouts(),
                'option_category' => 'layout',
                'description'     => esc_html__( 'Layout', 'act-divi' ),
                'toggle_slug'     => 'layout',
                'tab_slug'		  => 'advanced',
                'default_on_front'=> 'ACTPostCard',
                'computed_affects' => array(
                    '__layoutProps',
                ),
            ),
            'image_position' => array(
                'label'           => esc_html__( 'Image position', 'act-divi' ),
                'type'            => 'select',
                'option_category' => 'layout',
                'options'		=>[
                    'left'   => __( 'Left',  'act-divi' ),
                    'right'  => __( 'Right', 'act-divi' ),
                ],
                'default'         => 'left',
                'tab_slug'		  => 'advanced',
                'mobile_options'  => true,
                'toggle_slug'     => 'layout',
                'depends_show_if'   => 'ACTPostFullWidth',
                'depends_to'        => array(
                    'layout'
                ),
                'computed_affects' => array(
                    '__posts',
                ),
            ),


            'columns' => array(
                'label'           => esc_html__( 'Columns', 'act-divi' ),
                'type'            => 'select',
                'option_category' => 'layout',
                'options'		=>[
                    1   => __( '1 Column',  'act-divi' ),
                    2   => __( '2 Columns', 'act-divi' ),
                    3   => __( '3 Columns', 'act-divi' ),
                    4   => __( '4 Columns', 'act-divi' ),
                ],
                'default_on_front'         => 3,
                'tab_slug'		  => 'advanced',
                'mobile_options'  => true,
                'toggle_slug'     => 'layout',
                'depends_show_if'   => 'ACTPostCard',
                'depends_to'        => array(
                    'layout'
                ),
                'computed_affects' => array(
                    '__layoutProps',
                ),
            ),
            'card_padding' => array(
                'label'           => esc_html__( 'Card inner padding', 'act-divi' ),
                'type'            => 'yes_no_button',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Card inner padding.', 'act-divi'),
                'tab_slug'		  => 'advanced',
                'toggle_slug'     => 'layout',
                'options' => array(
                    'on'  => esc_html__( 'Yes', 'act-divi'),
                    'off' => esc_html__( 'No', 'act-divi'),
                ),
                'default_on_front'         => "off",
                'depends_show_if'   => 'ACTPostCard',
                'depends_to'        => array(
                    'layout'
                ),
                'computed_affects' => array(
                    '__layoutProps',
                ),
            ),
            'card_equal_cols' => array(
                'label'           => esc_html__( 'Card equal columns', 'act-divi' ),
                'type'            => 'yes_no_button',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Card equal columns.', 'act-divi'),
                'tab_slug'		  => 'advanced',
                'toggle_slug'     => 'layout',
                'options' => array(
                    'on'  => esc_html__( 'Yes', 'act-divi'),
                    'off' => esc_html__( 'No', 'act-divi'),
                ),
                'default_on_front'         => "off",
                'depends_show_if'   => 'ACTPostCard',
                'depends_to'        => array(
                    'layout'
                ),
                'computed_affects' => array(
                    '__posts',
                ),
            ),



            '__query' => array(
                'type' => 'computed',
                'computed_callback' => array( 'ACT_PostTypeGrid', 'get_cpt_query' ),
                'computed_depends_on' => array(
                    // Query
                    'post_type',
                    'posts_limit',
                    'posts_offset',
                    'order_by',
                    'order',
                ),
            ),
            '__layoutProps' => array(
                'type' => 'computed',
                'computed_callback' => array( 'ACT_PostTypeGrid', 'get_layout_props' ),
                'computed_depends_on' => array(
                    // Layout
                    'show_title',
                    'show_thumbnail',
                    'thumbnail_size',
                    'show_content',
                    'content_length',
                    'heading_tag',
                    'card_equal_cols',
                    'card_padding',
                ),
            ),

        );
    }


    public function get_layouts() {
        return [
            'ACTPostCard' => 'Cards',
            'ACTPostFullWidth' => 'Full Width',
        ];
    }

    public function get_layout_html($layout, $posts, $props) {
        $custom_icon_values              = et_pb_responsive_options()->get_property_values( $this->props, 'view_more_icon' );
        $custom_icon                     = isset( $custom_icon_values['desktop'] ) ? $custom_icon_values['desktop'] : '';
        $custom_icon_tablet              = isset( $custom_icon_values['tablet'] ) ? $custom_icon_values['tablet'] : '';
        $custom_icon_phone               = isset( $custom_icon_values['phone'] ) ? $custom_icon_values['phone'] : '';

        $divi_button = $this->render_button( array(
            'button_classname'    => array( 'act-view-more' ),
            'button_custom'       => "on",
            'button_rel'          => '',
            'button_text'         => $props['view_more_text'],
            'button_text_escaped' => true,
            'button_url'          => get_the_permalink(),
            'custom_icon'         => $custom_icon,
            'custom_icon_tablet'  => $custom_icon_tablet,
            'custom_icon_phone'   => $custom_icon_phone,
            'url_new_window'      => false,
            'display_button'      => '' !== $props['view_more_text'],
        ) );

        $default_layout = 'ACTPostCard';
        ob_start();
        if (file_exists(__DIR__ . '/layouts/'.$layout.'.php')){
            include __DIR__ . '/layouts/'.$layout.'.php';
        }else{
            include __DIR__ . '/layouts/'.$default_layout.'.php';
        }
        $html = ob_get_clean();
        return $html;
    }

    public function render( $attrs, $content = null, $render_slug ) {

        $query_args = ACTModuleHelper::get_wp_query_args($this->props);
        $posts = new WP_Query( $query_args );
        $posts_layout = $this->get_layout_html($this->props['layout'], $posts, $this->props);

        $html = sprintf(
            '<div class="%1$s act-divi-module">
				%2$s
			</div>',
            $render_slug,
            $posts_layout
        );

        return $html;

    }


    static function get_layout_props( $args = array(), $conditional_tags = array(), $current_page = array() ) {
        $defaults = array(
            'show_title'        => 'on',
            'show_thumbnail'    => 'on',
            'thumbnail_size'    => 'et-pb-post-main-image',
            'show_content'      => 'on',
            'content_length'    => 'excerpt',
            'show_button'       => 'on',

            'heading_tag'       => 'h3',
            'layout'            => 'ACTPostCard',
            'image_position'    => 'left',
            'columns'           => 3,
            'columns_tablet'    => 2,
            'columns_phone'     => 1,
            'card_padding'      => 'off',
            'card_equal_cols'   => 'off',

        );
        $args = wp_parse_args( $args, $defaults );


        $card_equal_cols = ($args['card_equal_cols'] == 'on') ? "equal-col" : null;
        $card_body_classes = "card-body align-items-start";
        $card_body_classes = ($args['card_padding'] == 'on') ? $card_body_classes." p-3" : $card_body_classes;
        $thumbnail_size = ACTModuleHelper::get_thumbnail_size($args['thumbnail_size']);
        $image_position = ACTModuleHelper::get_image_position_class($args['image_position']);
        $layout_props = [
            'headingTag' => $args['heading_tag'],
            'colClasses' => $col_classes = ACTModuleHelper::get_columns_class($args),
            'cardEqualCols' => $card_equal_cols,
            'imagePosition' => $image_position,
            'cardBodyClasses' => $card_body_classes,
            'showTitle' => ACTModuleHelper::if_show_prop($args['show_title']),
            'showThumbnail' => ACTModuleHelper::if_show_prop($args['show_thumbnail']),
            'thumbnail_size' => $thumbnail_size,
            'showContent' => ACTModuleHelper::if_show_prop($args['show_content']),
            'contentLength' => $args['content_length'],
            'showButton' => ACTModuleHelper::if_show_prop($args['show_button']),
        ];

        return $layout_props;

    }

    /**
     * Get blog posts for blog module
     *
     * @param array   arguments that is being used by et_pb_custom_blog
     * @return array post data
     */
    static function get_cpt_query( $args = array(), $conditional_tags = array(), $current_page = array() ) {
        $defaults = array(
            'post_type'       => 'post_type',
            'posts_limit'     => 6,
            'posts_offset'    => 0,
            'order_by'        => 'date',
            'order'           => 'DESC',
            'thumbnail_size'    => 'et-pb-post-main-image',
            'layout'            => 'ACTPostCard',

        );
        $args = wp_parse_args( $args, $defaults );

        $post_type = ($args['post_type']) ? $args['post_type'] : 'post';
        $posts_limit = ($args['posts_limit']) ? $args['posts_limit'] : -1;
        $posts_offset = ($args['posts_offset']) ? $args['posts_offset'] : false;
        $order_by = ($args['order_by']) ? $args['order_by'] : 'date';
        $order = ($args['order']) ? $args['order'] : 'DESC';
        $query_args = array(
            'post_type' => $post_type,
            'posts_per_page' => $posts_limit,
            'offset' => $posts_offset,
            'orderby' => $order_by,
            'order' => $order,
        );
        $posts = new WP_Query( $query_args );


        $post_classes = ACTModuleHelper::get_post_classes($args['layout']);
        $post_data = [];
        foreach ($posts->posts as $key => $cpt){
            $post_data[$key] = $cpt;
            $post_data[$key]->img = wp_get_attachment_image(get_post_thumbnail_id($cpt->ID),
                $args['thumbnail_size'],
                false,
                array( "class" => "act-card-img-top" )
            );
            $post_data[$key]->class = implode(" ", get_post_class($post_classes, $cpt->ID));
        }


        return $post_data;
    }





}

new ACT_PostTypeGrid;
