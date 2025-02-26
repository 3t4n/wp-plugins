<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class zlfms_advanced_image_gallery extends Widget_Base
{

    public function get_name()
    {
        return "advanced_image_gallery";
    }

    public function get_title()
    {
        return esc_html__("Advanced Image Gallery - Grid, Carousel & Slideshow", "advanced-image-gallery");
    }

    public function get_icon()
    {
        return "eicon-slider-video";
    }

    public function get_categories()
    {
        return ["basic"];
    }

    public function get_keywords()
    {
        return ["gallery", "images", "media"];
    }

    protected function _register_controls()
    {
        $this->start_controls_section("gallery_section", [
            "label" => esc_html__("Gallery", "advanced-image-gallery"),
            "tab" => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $this->add_control("skin", [
            "label" => esc_html__("Skin", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::SELECT,
            "default" => "grid",
            "options" => [
                "grid" => esc_html__("Grid", "advanced-image-gallery"),
                "carousel" => esc_html__("Carousel", "advanced-image-gallery"),
                "slideshow" => esc_html__("Slideshow", "advanced-image-gallery"),
            ],
            "prefix_class" => "elementor-skin-",
            "render_type" => "template",
            "frontend_available" => true,
        ]);

        $gallery_columns = range(1, 6);
        $gallery_columns = array_combine($gallery_columns, $gallery_columns);
        $this->add_control("gallery_columns", [
            "label" => esc_html__("Number of Columns", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::SELECT,
            "default" => "3",
            "options" => $gallery_columns,
            "condition" => [
                "skin" => "grid",
            ],
        ]);

        $repeater = new \Elementor\Repeater();
        $repeater->add_control("type", [
            "type" => \Elementor\Controls_Manager::CHOOSE,
            "label" => esc_html__("Type", "advanced-image-gallery"),
            "default" => "image",
            "options" => [
                "image" => [
                    "title" => esc_html__("Image", "advanced-image-gallery"),
                    "icon" => "eicon-image-bold",
                ],
                "video" => [
                    "title" => esc_html__("Video", "advanced-image-gallery"),
                    "icon" => "eicon-video-camera",
                ],
            ],
            "toggle" => false,
        ]);
        $repeater->add_control("image", [
            "label" => esc_html__("Image", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::MEDIA,
            "dynamic" => [
                "active" => true,
            ],
            "default" => [
                "url" => \Elementor\Utils::get_placeholder_image_src(),
            ],
        ]);
        $repeater->add_control("image_link_to_type", [
            "label" => esc_html__("Link", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::SELECT,
            "options" => [
                "" => esc_html__("None", "advanced-image-gallery"),
                "file" => esc_html__("Media File", "advanced-image-gallery"),
                "custom" => esc_html__("Custom URL", "advanced-image-gallery"),
            ],
            "condition" => [
                "type" => "image",
            ],
        ]);

        $repeater->add_control("link", [
            "type" => \Elementor\Controls_Manager::URL,
            "dynamic" => [
                "active" => true,
            ],
            "placeholder" => esc_html__(
                "https://your-link.com",
                "advanced-image-gallery"
            ),
            "show_external" => "true",
            "condition" => [
                "type" => "image",
                "image_link_to_type" => "custom",
            ],
            "separator" => "none",
            "show_label" => false,
        ]);

        $repeater->add_control("video", [
            "label" => esc_html__("Video Link", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::URL,
            "dynamic" => [
                "active" => true,
            ],
            "placeholder" => esc_html__(
                "Enter your video link",
                "advanced-image-gallery"
            ),
            "description" => esc_html__(
                "YouTube or Vimeo link",
                "advanced-image-gallery"
            ),
            "options" => false,
            "condition" => [
                "type" => "video",
            ],
        ]);

        $this->add_control("open_lightbox", [
            "label" => esc_html__("Lightbox", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::SWITCHER,
            "description" => sprintf(
                /* translators: 1: Link open tag, 2: Link close tag. */
                esc_html__(
                    'Manage your site’s lightbox settings in the %1$sLightbox panel%2$s.',
                    "advanced-image-gallery"
                ),
                '<a href="javascript: $e.run( \'panel/global/open\' ).then( () => $e.route( \'panel/global/settings-lightbox\' ) )">',
                "</a>"
            ),
            "default" => "no",
            "options" => [
                "yes" => esc_html__("Yes", "advanced-image-gallery"),
                "no" => esc_html__("No", "advanced-image-gallery"),
            ],
        ]);

        $this->add_control("image_list", [
            "label" => esc_html__("Items", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::REPEATER,
            "fields" => $repeater->get_controls(),
            "default" => [
                [
                    "text" => esc_html__(
                        "Gallery Image #1",
                        "advanced-image-gallery"
                    ),
                    "condition" => [
                        "image[url]!" => "",
                    ],
                ],
                [
                    "text" => esc_html__(
                        "Gallery Image #2",
                        "advanced-image-gallery"
                    ),
                    "condition" => [
                        "image[url]!" => "",
                    ],
                ],
                [
                    "text" => esc_html__(
                        "Gallery Image #3",
                        "advanced-image-gallery"
                    ),
                    "condition" => [
                        "image[url]!" => "",
                    ],
                ],
                [
                    "text" => esc_html__(
                        "Gallery Image #4",
                        "advanced-image-gallery"
                    ),
                    "condition" => [
                        "image[url]!" => "",
                    ],
                ],
                [
                    "text" => esc_html__(
                        "Gallery Image #5",
                        "advanced-image-gallery"
                    ),
                    "condition" => [
                        "image[url]!" => "",
                    ],
                ],
                [
                    "text" => esc_html__(
                        "Gallery Image #6",
                        "advanced-image-gallery"
                    ),
                    "condition" => [
                        "image[url]!" => "",
                    ],
                ],
            ],
        ]);
        $this->add_responsive_control("item_ratio", [
            "label" => esc_html__("Item Ratio", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::SLIDER,
            "default" => [
                "size" => 3,
                "unit" => '',
            ],
            "range" => [
                "px" => [
                    "min" => 0,
                    "max" => 5,
                    "step" => 0.01,
                ],
            ],

            "condition" => [
                "skin" => "grid",
            ],
            "selectors" => [
                '{{WRAPPER}} .zlfms_gallery' => 'aspect-ratio: {{SIZE}}',
            ],
        ]);


        $this->add_control(
            'overlay_type',
            [
                'label' => esc_html__('Overlay', 'advanced-image-gallery'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'none',
                'options' => [
                    'none' => esc_html__('None', 'advanced-image-gallery'),
                    'text' => esc_html__('Text', 'advanced-image-gallery'),
                    'icon' => esc_html__('Icon', 'advanced-image-gallery'),
                ],
            ]
        );

        $this->add_control(
            'overlay_text',
            [
                'label' => esc_html__('Text', 'advanced-image-gallery'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'title_type' => 'text',
                ],
            ]
        );

        $this->add_control(
            'overlay_icon',
            [
                'label' => esc_html__('Icon', 'advanced-image-gallery'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'condition' => [
                    'title_type' => 'icon',
                ],
            ]
        );
        $this->add_control(
            'overlay_icon_choose',
            [
                'label' => esc_html__('Overlay Icon', 'advanced-image-gallery'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-link',
                    'library' => 'fa-solid',
                ],
                'condition' => [
                    'overlay_type' => 'icon',
                ],
            ]
        );
        $this->add_control(
            'overlay_animation',
            [
                'label' => esc_html__('Animation', 'advanced-image-gallery'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'fade',
                'options' => [
                    'fade' => esc_html__('Fade', 'advanced-image-gallery'),
                    'slide-up' => esc_html__('Slide Up', 'advanced-image-gallery'),
                    'slide-down' => esc_html__('Slide Down', 'advanced-image-gallery'),
                    'slide-left' => esc_html__('Slide Left', 'advanced-image-gallery'),
                    'slide-right' => esc_html__('Slide Right', 'advanced-image-gallery'),
                    'zoom-in' => esc_html__('Zoom In', 'advanced-image-gallery'),
                ],
                "condition" => [
                    "overlay_type!" => "none",
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section("gallery_carousel", [
            "label" => esc_html__("Gallery Carousel", "advanced-image-gallery"),
            "tab" => \Elementor\Controls_Manager::TAB_CONTENT,
            "condition" => [
                "skin!" => "grid",
            ],
        ]);

        $this->add_responsive_control("height", [
            "label" => esc_html__("Height", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::SLIDER,
            "size_units" => ["px", "%", "em", "rem", "custom"],
            "default" => [
                "size" => 200,
                "unit" => 'px',
            ],
            "range" => [
                "px" => [
                    "max" => 500,
                ],
                "em" => [
                    "min" => 0,
                    "max" => 50,
                ],
                "rem" => [
                    "min" => 0,
                    "max" => 50,
                ],
            ],
            "selectors" => [
                "{{WRAPPER}} .zlfms-carousel .zlfms-gallery-img" => "height: {{SIZE}}{{UNIT}};",
                "{{WRAPPER}} .zlfms-slideshow .gallery-top" => "height: {{SIZE}}{{UNIT}};",
            ],
        ]);

        $this->add_responsive_control("thumbnails_ratio", [
            "label" => esc_html__("Thumbnails Ratio", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::SLIDER,
            "size_units" => ["px", "%", "em", "rem", "custom"],
            "default" => [
                "size" => 200,
                "unit" => 'px',
            ],
            "range" => [
                "px" => [
                    "max" => 500,
                ],
                "em" => [
                    "min" => 0,
                    "max" => 50,
                ],
                "rem" => [
                    "min" => 0,
                    "max" => 50,
                ],
            ],
            "condition" => [
                "skin" => "slideshow",
            ],
            "selectors" => [
                "{{WRAPPER}} .zlfms-slideshow .gallery-thumbs" => "height: {{SIZE}}{{UNIT}};",
            ],
        ]);

        $this->add_control("centermode", [
            "label" => esc_html__("Centered Slides", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::SWITCHER,
            "label_on" => esc_html__("Yes", "advanced-image-gallery"),
            "label_off" => esc_html__("No", "advanced-image-gallery"),
            "return_value" => "yes",
            "default" => "no",
            "condition" => [
                "skin" => "slideshow",
            ],
        ]);

        $slides_per_view = range(1, 8);
        $slides_per_view = array_combine($slides_per_view, $slides_per_view);

        $this->add_responsive_control("slides_per_view", [
            "type" => \Elementor\Controls_Manager::SELECT,
            "label" => esc_html__("Slides on Display", "advanced-image-gallery"),
            "options" =>
            ["" => esc_html__("Default", "advanced-image-gallery")] +
                $slides_per_view,
            "frontend_available" => true,
        ]);

        $slides_per_scroll = range(1, 8);
        $slides_per_scroll = array_combine($slides_per_scroll, $slides_per_scroll);

        $this->add_control("slides_per_scroll", [
            "type" => \Elementor\Controls_Manager::SELECT,
            "label" => esc_html__("Slides on Scroll", "advanced-image-gallery"),
            "options" =>
            ["" => esc_html__("Default", "advanced-image-gallery")] +
                $slides_per_scroll,
            "frontend_available" => true,
        ]);

        $this->add_control("navigation", [
            "label" => esc_html__("Arrow", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::SWITCHER,
            "label_on" => esc_html__("Yes", "advanced-image-gallery"),
            "label_off" => esc_html__("No", "advanced-image-gallery"),
            "return_value" => "yes",
            "default" => "yes",
        ]);

        $this->add_control("navigation_previous_icon", [
            "label" => esc_html__("Previous Arrow Icon", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::ICONS,
            "default" => [
                "value" => "fas fa-arrow-left",
                "library" => "fa-solid",
            ],
            "condition" => [
                "navigation" => "yes",
            ],
        ]);

        $this->add_control("navigation_next_icon", [
            "label" => esc_html__("Next Arrow Icon", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::ICONS,
            "default" => [
                "value" => "fas fa-arrow-right",
                "library" => "fa-solid",
            ],
            "condition" => [
                "navigation" => "yes",
            ],
        ]);

        $this->add_control("pagination", [
            "label" => esc_html__("Pagination", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::SELECT,
            "default" => "",
            "options" => [
                "" => esc_html__("None", "advanced-image-gallery"),
                "fraction" => esc_html__("Fraction", "advanced-image-gallery"),
                "progressbar" => esc_html__("Progress", "advanced-image-gallery"),
                "dots" => esc_html__("Dots", "advanced-image-gallery"),
            ],
            "condition" => [
                "skin" => "carousel",
            ],

            "prefix_class" => "zlfms-pagination-type-",
            "render_type" => "template",
            "frontend_available" => true,
        ]);
        $this->add_control("effect", [
            "label" => esc_html__("Coverflow Effect", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::SWITCHER,
            "label_on" => esc_html__("Yes", "advanced-image-gallery"),
            "label_off" => esc_html__("No", "advanced-image-gallery"),
            "return_value" => "yes",
            "default" => "no",
            "condition" => [
                "skin" => "carousel",
            ],
        ]);

        $this->add_control("speed", [
            "label" => esc_html__("Transition Duration", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::NUMBER,
            "default" => 500,
            "render_type" => "none",
            "frontend_available" => true,
        ]);

        $this->add_control(
            'autoplay',
            [
                'label' => esc_html__('Autoplay', 'advanced-image-gallery'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
                'label_on' => esc_html__('Yes', 'advanced-image-gallery'),
                'label_off' => esc_html__('No', 'advanced-image-gallery'),
                'return_value' => 'yes',
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'scroll_speed',
            [
                'label' => esc_html__('Scroll Speed (ms)', 'advanced-image-gallery'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 5000,
                'condition' => [
                    'autoplay' => 'yes',
                ],
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'pause_on_hover',
            [
                'label' => esc_html__('Pause on Hover', 'advanced-image-gallery'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
                'condition' => [
                    'autoplay' => 'yes',
                ],
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'pause_on_interaction',
            [
                'label' => esc_html__('Pause on Interaction', 'advanced-image-gallery'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
                'condition' => [
                    'autoplay' => 'yes',
                ],
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'infinite_scroll',
            [
                'label' => esc_html__('Infinite Scroll', 'advanced-image-gallery'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
                'label_on' => esc_html__('Yes', 'advanced-image-gallery'),
                'label_off' => esc_html__('No', 'advanced-image-gallery'),
                'return_value' => 'yes',
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'offset_sides',
            [
                'label' => esc_html__('Offset Sides', 'advanced-image-gallery'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'none' => esc_html__('None', 'advanced-image-gallery'),
                    'both' => esc_html__('Both', 'advanced-image-gallery'),
                    'left' => esc_html__('Left', 'advanced-image-gallery'),
                    'right' => esc_html__('Right', 'advanced-image-gallery'),
                ],
                "condition" => [
                    "skin" => "carousel",

                ],
                'default' => 'none',
                'frontend_available' => true,
            ]
        );

        $this->add_responsive_control(
            'offset_width',
            [
                'label' => esc_html__('Offset Width', 'advanced-image-gallery'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 30,
                ],
                'condition' => [
                    'offset_sides!' => 'none',
                ],
                'frontend_available' => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section("section_gallery_images", [
            "label" => esc_html__("Image", "advanced-image-gallery"),
            "tab" => \Elementor\Controls_Manager::TAB_STYLE,
        ]);

        $this->add_responsive_control("align", [
            "label" => esc_html__("Alignment", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::CHOOSE,
            "options" => [
                "left" => [
                    "title" => esc_html__("Left", "advanced-image-gallery"),
                    "icon" => "eicon-text-align-left",
                ],
                "center" => [
                    "title" => esc_html__("Center", "advanced-image-gallery"),
                    "icon" => "eicon-text-align-center",
                ],
                "right" => [
                    "title" => esc_html__("Right", "advanced-image-gallery"),
                    "icon" => "eicon-text-align-right",
                ],
                "justify" => [
                    "title" => esc_html__("Justified", "advanced-image-gallery"),
                    "icon" => "eicon-text-align-justify",
                ],
            ],
            "default" => "center",
            "selectors" => [
                "{{WRAPPER}} .zlfms-gallery-item" => "text-align: {{VALUE}};",
            ],
        ]);

        $this->add_control("image_object_fit", [
            "label" => esc_html__("Object Fit", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::SELECT,
            "options" => [
                "auto" => esc_html__("Default (Fill)", "advanced-image-gallery"),
                "cover" => esc_html__("Cover", "advanced-image-gallery"),
                "contain" => esc_html__("Contain", "advanced-image-gallery"),
            ],
            "default" => "cover",
            "selectors" => [
                "{{WRAPPER}} .zlfms-gallery-img" => "background-size: {{VALUE}};",
            ],
        ]);

        $this->add_control("image_spacing", [
            "label" => esc_html__("Spacing", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::SELECT,
            "options" => [
                "" => esc_html__("Default", "advanced-image-gallery"),
                "custom" => esc_html__("Custom", "advanced-image-gallery"),
            ],
            "prefix_class" => "zlfms-gallery-spacing-",
            "default" => "",
            "condition" => [
                "skin" => "grid",
            ],
        ]);

        $this->add_control("image_spacing_custom", [
            "label" => esc_html__("Custom Spacing", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::SLIDER,
            "size_units" => ["px", "em", "rem", "custom"],
            "range" => [
                "px" => ["max" => 100],
                "em" => ["max" => 10],
                "rem" => ["max" => 10],
            ],
            "default" => ["size" => 15],
            "selectors" => [
                "{{WRAPPER}} .zlfms_gallery" => "gap: {{SIZE}}{{UNIT}};",
            ],
            "condition" => [
                "image_spacing" => "custom",
                "skin" => "grid",
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            "name" => "image_border",
            "selector" => "{{WRAPPER}} .zlfms-gallery-item",
            "separator" => "before",
        ]);

        $this->add_responsive_control("image_border_radius", [
            "label" => esc_html__("Border Radius", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::DIMENSIONS,
            "size_units" => ["px", "%", "em", "rem", "custom"],
            "selectors" => [
                "{{WRAPPER}} .zlfms-gallery-item" => "border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};",
            ],
        ]);
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                "name" => "image_box_shadow",
                "selector" => "{{WRAPPER}} .zlfms-gallery-item",
            ]
        );
        $this->add_responsive_control("image_padding", [
            "label" => esc_html__("Padding", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::SLIDER,
            "size_units" => ["px", "%", "em", "rem"],
            "selectors" => [
                "{{WRAPPER}} .zlfms-gallery-item" => "padding: {{SIZE}}{{UNIT}};",
            ],
            "range" => [
                "px" => [
                    "max" => 50,
                ],
                "em" => [
                    "min" => 0,
                    "max" => 5,
                ],
                "rem" => [
                    "min" => 0,
                    "max" => 5,
                ],
            ],
        ]);
        $this->start_controls_tabs("tabs_background_color", [
            "separator" => "before",
        ]);

        $this->start_controls_tab("tab_background_normal", [
            "label" => esc_html__("Normal", "advanced-image-gallery"),
        ]);

        $this->add_control("background_color", [
            "label" => esc_html__("Image Background Color", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::COLOR,
            "default" => "",
            "selectors" => [
                "{{WRAPPER}} .zlfms-gallery-item" =>
                "background-color: {{VALUE}};",
            ],
        ]);

        $this->end_controls_tab();

        $this->start_controls_tab("tab_background_hover", [
            "label" => esc_html__("Hover", "advanced-image-gallery"),
        ]);

        $this->add_control("hover_background_color", [
            "label" => esc_html__("Image Hover Background Color", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::COLOR,
            "default" => "",
            "selectors" => [
                "{{WRAPPER}} .zlfms-gallery-item:hover" =>
                "background-color: {{VALUE}};",
            ],
        ]);

        $this->end_controls_tab();
        $this->end_controls_tabs();
        // Add tabs for background colors
        $this->add_control("show_play_icon", [
            "label" => esc_html__("Play Icon", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::SWITCHER,
            "default" => "yes",
            "label_off" => esc_html__("Hide", "advanced-image-gallery"),
            "label_on" => esc_html__("Show", "advanced-image-gallery"),
            "separator" => "before",
            "condition" => [],
        ]);
        $this->add_control("play_icon", [
            "label" => esc_html__("Play Icon", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::ICONS,
            "default" => [
                "value" => "far fa-play-circle",
                "library" => "fa-solid",
            ],
            "condition" => [
                "show_play_icon" => "yes",
            ],
        ]);
        $this->add_control("play_icon_color", [
            "label" => esc_html__("Color", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::COLOR,
            "selectors" => [
                "{{WRAPPER}} .zlfms-custom-embed-play i" => "color: {{VALUE}}",
                "{{WRAPPER}} .zlfms-custom-embed-play svg" => "fill: {{VALUE}}",
            ],
            "condition" => [
                "show_play_icon" => "yes",
            ],
        ]);

        $this->add_responsive_control("play_icon_size", [
            "label" => esc_html__("Size", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::SLIDER,
            "size_units" => ["px", "em", "rem", "custom"],
            "range" => [
                "px" => [
                    "min" => 10,
                    "max" => 300,
                ],
            ],
            "selectors" => [
                "{{WRAPPER}} .zlfms-custom-embed-play i" =>
                "font-size: {{SIZE}}{{UNIT}}",
                "{{WRAPPER}} .zlfms-custom-embed-play svg" =>
                "width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};",
            ],
            "condition" => [
                "show_play_icon" => "yes",
            ],
        ]);

        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                "name" => "play_icon_text_shadow",
                "selector" => "{{WRAPPER}} .zlfms-custom-embed-play i",
                "fields_options" => [
                    "text_shadow_type" => [
                        "label" => esc_html__("Shadow", "advanced-image-gallery"),
                    ],
                ],
                "condition" => [
                    "show_play_icon" => "yes",
                ],
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section("zlfms_navigation_style", [
            "label" => esc_html__("Carousel Layout", "advanced-image-gallery"),
            "tab" => \Elementor\Controls_Manager::TAB_STYLE,
            "condition" => [
                "skin!" => "grid",
            ],
        ]);
        $this->add_control("space_between_slides", [
            "label" => esc_html__("Space Between Slides", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::SLIDER,
            "size_units" => ["px", "em", "rem", "custom"],
            "range" => [
                "px" => ["max" => 100],
                "em" => ["max" => 10],
                "rem" => ["max" => 10],
            ],
            "default" => ["size" => 15],
            "selectors" => [
                "{{WRAPPER}} .zlfms-carousel .zlfms-gallery-item" => "margin-right: {{SIZE}}{{UNIT}};",
                "{{WRAPPER}} .zlfms-slideshow .zlfms-gallery-item" => "margin-right: {{SIZE}}{{UNIT}};",
                "{{WRAPPER}} .zlfms-slideshow .gallery-top .zlfms-gallery-item" => "padding-bottom: {{SIZE}}{{UNIT}};",
            ],
        ]);

        $this->add_control("heading_arrows", [
            "label" => esc_html__("Arrows", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::HEADING,
            "separator" => "none",
            "condition" => [
                "navigation" => "yes",
            ],
        ]);
        $this->add_control("arrows_color", [
            "label" => esc_html__("Arrow Color", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::COLOR,
            "selectors" => [
                "{{WRAPPER}} .swiper-button-prev, {{WRAPPER}} .swiper-button-next" => "color: {{VALUE}};",
            ],
            "condition" => [
                "navigation" => "yes",
            ],
        ]);

        $this->add_control("arrows_size", [
            "label" => esc_html__("Arrow Size", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::SLIDER,
            "size_units" => ["px", "em", "%"],
            "default" => [
                "size" => 20,
                "unit" => 'px',
            ],
            "selectors" => [
                "{{WRAPPER}} .swiper-button-prev i, {{WRAPPER}} .swiper-button-next i" => "font-size: {{SIZE}}{{UNIT}};",
            ],
            "condition" => [
                "navigation" => "yes",
            ],
        ]);

        $this->add_control("arrows_background_color", [
            "label" => esc_html__("Background Color", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::COLOR,
            "selectors" => [
                "{{WRAPPER}} .swiper-button-prev, {{WRAPPER}} .swiper-button-next" => "background-color: {{VALUE}} !important;",
            ],
            "condition" => [
                "navigation" => "yes",
            ],
        ]);
        $this->add_responsive_control("arrow_background_size", [
            "label" => esc_html__("Arrow Background Size", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::SLIDER,
            "default" => [
                "size" => 0,
            ],
            "size_units" => ["px", "%", "em", "rem", "custom"],
            "selectors" => [
                "{{WRAPPER}} .swiper-button-prev, {{WRAPPER}} .swiper-button-next" => "padding: {{SIZE}}{{UNIT}};",
            ],
            "condition" => [
                "navigation" => "yes",
            ],
        ]);

        $this->add_responsive_control("arrow_radius", [
            "label" => esc_html__("Arrow Radius", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::DIMENSIONS,
            "size_units" => ["px", "%", "em", "rem", "custom"],
            "selectors" => [
                "{{WRAPPER}} .swiper-button-prev, {{WRAPPER}} .swiper-button-next" => "border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};",
            ],
            "condition" => [
                "navigation" => "yes",
            ],
        ]);

        $this->end_controls_section();
        $this->start_controls_section("pagination_style", [
            "label" => esc_html__("Pagination", "advanced-image-gallery"),
            "tab" => \Elementor\Controls_Manager::TAB_STYLE,
            "condition" => [
                "pagination" => ["fraction", "progressbar", "dots"],
            ],
        ]);

        // Fraction Pagination Controls
        $this->add_control("pagination_fraction_alignment", [
            "label" => esc_html__("Alignment", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::CHOOSE,
            "options" => [
                "left" => [
                    "title" => esc_html__("Left", "advanced-image-gallery"),
                    "icon" => "eicon-text-align-left",
                ],
                "center" => [
                    "title" => esc_html__("Center", "advanced-image-gallery"),
                    "icon" => "eicon-text-align-center",
                ],
                "right" => [
                    "title" => esc_html__("Right", "advanced-image-gallery"),
                    "icon" => "eicon-text-align-right",
                ],
            ],
            "default" => "center",
            "toggle" => true,
            "selectors" => [
                "{{WRAPPER}} .swiper-pagination-fraction" => "text-align: {{VALUE}};",
            ],
            "condition" => [
                "pagination" => "fraction",
            ],
        ]);

        $this->add_control("pagination_fraction_current_color", [
            "label" => esc_html__("Current Slide Color", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::COLOR,
            "selectors" => [
                "{{WRAPPER}} .swiper-pagination-current" => "color: {{VALUE}};",
            ],
            "condition" => [
                "pagination" => "fraction",
            ],
        ]);

        $this->add_control("pagination_fraction_total_color", [
            "label" => esc_html__("Total Slides Color", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::COLOR,
            "selectors" => [
                "{{WRAPPER}} .swiper-pagination-total" => "color: {{VALUE}};",
            ],
            "condition" => [
                "pagination" => "fraction",
            ],
        ]);

        $this->add_control("pagination_fraction_font_size", [
            "label" => esc_html__("Font Size", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::SLIDER,
            "size_units" => ["px", "em", "rem"],
            "default" => [
                "size" => 15,
                "unit" => 'px',
            ],
            "selectors" => [
                "{{WRAPPER}} .swiper-pagination-fraction" => "font-size: {{SIZE}}{{UNIT}};",
            ],
            "condition" => [
                "pagination" => "fraction",
            ],
        ]);
        $this->add_control("pagination_fraction_space", [
            "label" => esc_html__("Space from Slides", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::SLIDER,
            "size_units" => ["px", "em", "rem"],
            "default" => [
                "size" => 40,
                "unit" => 'px',
            ],
            "selectors" => [
                "{{WRAPPER}} .swiper-wrapper" => "padding-bottom: {{SIZE}}{{UNIT}};",
            ],
            "condition" => [
                "pagination" => "fraction",
            ],
        ]);

        // Progressbar Pagination Controls
        $this->add_control("pagination_progressbar_background_color", [
            "label" => esc_html__("Progress Bar Background Color", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::COLOR,
            "selectors" => [
                "{{WRAPPER}} .swiper-pagination-progressbar" => "background-color: {{VALUE}};",
            ],
            "condition" => [
                "pagination" => "progressbar",
            ],
        ]);

        $this->add_control("pagination_progressbar_fill_color", [
            "label" => esc_html__("Progress Bar Fill Color", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::COLOR,
            "selectors" => [
                "{{WRAPPER}} .swiper-pagination-progressbar-fill" => "background-color: {{VALUE}};",
            ],
            "condition" => [
                "pagination" => "progressbar",
            ],
        ]);

        $this->add_control("pagination_progressbar_height", [
            "label" => esc_html__("Progress Bar Height", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::SLIDER,
            "size_units" => ["px", "em", "%"],
            "default" => [
                "size" => 4,
                "unit" => 'px',
            ],
            "selectors" => [
                "{{WRAPPER}} .swiper-pagination-progressbar" => "height: {{SIZE}}{{UNIT}};",
            ],
            "condition" => [
                "pagination" => "progressbar",
            ],
        ]);

        $this->add_control("pagination_progressbar_border_radius", [
            "label" => esc_html__("Progress Bar Border Radius", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::SLIDER,
            "size_units" => ["px", "%"],
            "default" => [
                "size" => 2,
                "unit" => 'px',
            ],
            "selectors" => [
                "{{WRAPPER}} .swiper-pagination-progressbar, {{WRAPPER}} .swiper-pagination-progressbar-fill" => "border-radius: {{SIZE}}{{UNIT}};",
            ],
            "condition" => [
                "pagination" => "progressbar",
            ],
        ]);

        // dots Pagination Controls
        $this->add_control("dots_color", [
            "label" => esc_html__("Dots Color", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::COLOR,
            "selectors" => [
                "{{WRAPPER}} .swiper-pagination-bullet" => "background-color: {{VALUE}};",
                "{{WRAPPER}} .swiper-pagination-bullet-active" => "background-color: {{VALUE}};",
            ],
            "condition" => [
                "pagination" => "dots",
            ],
        ]);

        $this->add_control("dots_size", [
            "label" => esc_html__("Dots Size", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::SLIDER,
            "default" => [
                "size" => 12,
            ],
            "selectors" => [
                "{{WRAPPER}} .swiper-pagination-bullet" => "width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};",
            ],
            "condition" => [
                "pagination" => "dots",
            ],
        ]);

        $this->add_control("space_between_dots", [
            "label" => esc_html__("Space Between Dots", "advanced-image-gallery"),
            "type" => \Elementor\Controls_Manager::SLIDER,
            "default" => ["size" => 5],
            "selectors" => [
                "{{WRAPPER}} .swiper-pagination-bullet" => "margin: 0px {{SIZE}}{{UNIT}};",
            ],
            "condition" => [
                "pagination" => "dots",
            ],
        ]);

        $this->end_controls_section();

        $this->start_controls_section("overlay", [
            "label" => esc_html__("Overlay", "advanced-image-gallery"),
            "tab" => \Elementor\Controls_Manager::TAB_STYLE,
            'condition' => [
                'overlay_type!' => 'none', // Show only if overlay_type is not 'none'
            ],
        ]);

        // Overlay Background Color Control
        $this->add_control(
            'overlay_background_color',
            [
                'label' => esc_html__('Background Color', 'advanced-image-gallery'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'rgba(0, 0, 0, 0.5)', // default color with transparency
                'selectors' => [
                    '{{WRAPPER}} .zlfms-carousel-image-overlay' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .gallery-thumbs .swiper-slide' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Overlay Text Color Control
        $this->add_control(
            'overlay_text_color',
            [
                'label' => esc_html__('Text Color', 'advanced-image-gallery'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff', // default text color
                'selectors' => [
                    '{{WRAPPER}} .zlfms-carousel-image-overlay' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'overlay_type' => 'text',
                ],
            ]
        );

        // Overlay Text Size Control
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'overlay_text_typography',
                'label' => esc_html__('Typography', 'advanced-image-gallery'),
                'selector' => '{{WRAPPER}} .zlfms-carousel-image-overlay',
                'condition' => [
                    'overlay_type' => 'text',
                ],
            ]
        );

        // Overlay Icon Color Control
        $this->add_control(
            'overlay_icon_color',
            [
                'label' => esc_html__('Icon Color', 'advanced-image-gallery'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff', // default icon color
                'selectors' => [
                    '{{WRAPPER}} .zlfms-carousel-image-overlay i' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'overlay_type' => 'icon',
                ],
            ]
        );

        $this->add_control(
            "overlay_icon_size",
            [
                "label" => esc_html__("Icon Size", "advanced-image-gallery"),
                "type" => \Elementor\Controls_Manager::SLIDER,
                "size_units" => ["px", "em", "rem"],
                "range" => [
                    "px" => ["max" => 100],  // Increased max size for more flexibility
                    "em" => ["max" => 10],
                    "rem" => ["max" => 10],
                ],
                "default" => ["size" => 24, "unit" => "px"],  // Updated default size
                "selectors" => [
                    "{{WRAPPER}} .zlfms-carousel-image-overlay i" => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'overlay_type' => 'icon',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings();
        $skin = isset($settings['skin']) ? sanitize_text_field($settings['skin']) : '';

        // Determine the file to include based on the skin
        switch ($skin) {
            case 'grid':
                include plugin_dir_path(__FILE__) . '../include/gallery-widget/grid-widget.php';
                break;
            case 'carousel':
                include plugin_dir_path(__FILE__) . '../include/gallery-widget/carousel-widget.php';
                break;
            case 'slideshow':
                include plugin_dir_path(__FILE__) . '../include/gallery-widget/slideshow-widget.php';
                break;
            default:
                include plugin_dir_path(__FILE__) . '../include/gallery-widget/grid-widget.php';
                break;
        }
    }
}