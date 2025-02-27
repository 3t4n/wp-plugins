<?php

namespace Generic\Elements;

defined('ABSPATH') || die();

class Breadcrumb extends GenericWidget
{

    /**
     * Get widget name.
     *
     * Retrieve Generic Elements widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */

    public function get_name()
    {
        return 'generic-breadcrumb';
    }

    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */

    public function get_title()
    {
        return esc_html__('Generic Breadcrumb', 'generic-elements');
    }

    public function get_custom_help_url()
    {
        return 'http://elementor.bdevs.net/bdevselement/generic-logo/';
    }

    public function get_style_depends()
    {
        return ['bootstrap', 'fontawesome', 'generic-element-css'];
    }

    public function get_script_depends()
    {
        return ['bootstrap', 'generic-element-js'];
    }

    /**
     * Get widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-product-breadcrumbs gen-icon';
    }

    public function get_keywords()
    {
        return ['generic', 'elements', 'breadcrumbs', 'site', 'header', 'navigation', 'nav'];
    }

    public function get_categories()
    {
        return ['generic-elements'];
    }


    // register_content_controls
    protected function register_content_controls()
    {
        $this->breadcrumb_settings_content_controls();
    }

    // breadcrumb_settings_content_controls
    protected function breadcrumb_settings_content_controls()
    {

        $this->start_controls_section(
            'section_breadcrumb_settings',
            [
                'label' => esc_html__('Settings', 'generic-elements'),
            ]
        );

        $this->add_control(
            'show_title',
            [
                'label' => esc_html__('Show Title', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'generic-elements'),
                'label_off' => esc_html__('Hide', 'generic-elements'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_nav',
            [
                'label' => esc_html__('Show Nav', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'generic-elements'),
                'label_off' => esc_html__('Hide', 'generic-elements'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => __('Title HTML Tag', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'h1' => [
                        'title' => __('H1', 'generic-elements'),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2' => [
                        'title' => __('H2', 'generic-elements'),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3' => [
                        'title' => __('H3', 'generic-elements'),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4' => [
                        'title' => __('H4', 'generic-elements'),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5' => [
                        'title' => __('H5', 'generic-elements'),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6' => [
                        'title' => __('H6', 'generic-elements'),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
                'default' => 'h1',
                'toggle' => false,
            ]
        );

        $this->add_control(
            'nav_pos',
            [
                'label' => __('Nav Postion', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    ''     => __('Default', 'generic-elements'),
                    'd-flex flex-column-reverse'     => __('Top', 'generic-elements'),
                    'd-flex flex-column' => __('Bottom', 'generic-elements'),
                ],
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label' => esc_html__('Alignment', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'start' => [
                        'title' => esc_html__('Left', 'generic-elements'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'generic-elements'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'end' => [
                        'title' => esc_html__('Right', 'generic-elements'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'start',
                'selectors'          => [
                    '{{WRAPPER}} .generic-page-header' => 'text-align: {{VALUE}};',
                ],
                'frontend_available' => true,
                'toggle' => true,
            ]
        );

        $this->end_controls_section();
    }


    // register_style_controls
    protected function register_style_controls()
    {
        $this->breadcrumb_style_control();
    }


    // breadcrumb_style_control
    protected function breadcrumb_style_control()
    {
        $this->start_controls_section(
            '_section_style_content',
            [
                'label' => esc_html__('Breadcrumb', 'generic-elements'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Title
        $this->add_control(
            '_breadcrumb_title',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => esc_html__('Title', 'generic-elements'),
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'breadcrumb_title_spacing',
            [
                'label' => __('Margin', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .generic-el-page-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Text Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .generic-el-page-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'breadcrumb-title',
                'selector' => '{{WRAPPER}} .generic-el-page-title',
            ]
        );

        // Breacrumb Nav
        $this->add_control(
            '_heading_subtitle',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => esc_html__('Breadcrumb Nav', 'generic-elements'),
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'breadcrumb_nav_color',
            [
                'label' => esc_html__('Nav Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} nav.generic-el-page-menu-trail.breadcrumbs span' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'breadcrumb_nav_hcolor',
            [
                'label' => esc_html__('Nav Hover Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} nav.generic-el-page-menu-trail.breadcrumbs span:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'breadcrumb_nav_acolor',
            [
                'label' => esc_html__('Nav Active Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} nav.generic-el-page-menu-trail.breadcrumbs span.current-item' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'breadcrumb-nav',
                'selector' => '{{WRAPPER}} nav.generic-el-page-menu-trail.breadcrumbs span',
            ]
        );

        $this->add_responsive_control(
            'divider_padding',
            [
                'label' => esc_html__('Divider Spacing', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} nav.generic-el-page-menu-trail span.dvdr ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'dvdr_color',
            [
                'label' => esc_html__('Divider Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} nav.generic-el-page-menu-trail span.dvdr' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'dvdr_size',
            [
                'label' => esc_html__('Divider Size', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} nav.generic-el-page-menu-trail span.dvdr' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }



    // Render Function
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $title_tag = $settings['title_tag'];
        $nav_pos = $settings['nav_pos'];
        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', 'generic-el-page-title');

        global $post;
        $breadcrumb_show = 1;

        if (is_front_page() && is_home()) {
            $title = get_theme_mod('breadcrumb_blog_title', esc_html__('Blog', 'generic-elements'));
        } elseif (is_front_page()) {
            $title = get_theme_mod('breadcrumb_blog_title', esc_html__('Blog', 'generic-elements'));
            $breadcrumb_show = 0;
        } elseif (is_home()) {
            if (get_option('page_for_posts')) {
                $title = get_the_title(get_option('page_for_posts'));
            }
        } elseif (is_single() && 'post' == get_post_type()) {
            $title = get_the_title();
        } elseif (is_single() && 'product' == get_post_type()) {
            $title = get_the_title();
        } elseif (is_single() && 'bdevs-services' == get_post_type()) {
            $title = get_the_title();
        } elseif (is_single() && 'courses' == get_post_type()) {
            $title = get_the_title();
        } elseif (is_single() && 'bdevs-event' == get_post_type()) {
            $title = get_the_title();
        } elseif (is_single() && 'bdevs-portfolios' == get_post_type()) {
            $title = get_the_title();
        } elseif (is_search()) {
            $title = get_theme_mod('breadcrumb_search', 'Search Results for :') . get_search_query();
        } elseif (is_404()) {
            $title = get_theme_mod('breadcrumb_404', 'Page not Found');
        } elseif (function_exists('is_woocommerce') && is_woocommerce()) {
            $title = get_theme_mod('breadcrumb_shop', esc_html__('Shop', 'generic-elements'));
        } elseif (is_archive()) {
            $title = get_the_archive_title();
        } else {
            $title = get_the_title();
        }

        $_id = get_the_ID();

        if (is_single() && 'product' == get_post_type()) {
            $_id = $post->ID;
        } elseif (function_exists("is_shop") and is_shop()) {
            $_id = wc_get_page_id('shop');
        } elseif (is_home() && get_option('page_for_posts')) {
            $_id = get_option('page_for_posts');
        }

        $is_breadcrumb = function_exists('get_field') ? get_field('is_it_invisible_breadcrumb', $_id) : '';
        if (!empty($_GET['s'])) {
            $is_breadcrumb = null;
        }

        if (empty($is_breadcrumb) && $breadcrumb_show == 1) {

?>

            <!-- page title area start  -->
            <div class="generic-page-header bdevs-generic-el">
                <div class="generic-page-header-inner <?php echo esc_attr($nav_pos); ?>">
                    <?php if (!empty($settings['show_title'])) : ?>
                        <?php printf(
                            '<%1$s %2$s>%3$s</%1$s>',
                            tag_escape($settings['title_tag']),
                            $this->get_render_attribute_string('title'),
                            $title
                        ); ?>
                    <?php endif; ?>
                    <?php if (!empty($settings['show_nav'])) : ?>
                        <div class="generic-el-page-menu">
                            <nav class="generic-el-page-menu-trail breadcrumbs">
                                <?php
                                if (function_exists('bcn_display')) {
                                    bcn_display();
                                } ?>
                            </nav>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <!-- page title area end  -->
<?php
        }
    }
}
