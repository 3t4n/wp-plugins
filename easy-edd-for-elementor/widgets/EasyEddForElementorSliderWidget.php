<?php

namespace EasyEddForElementor\Widgets;
use EasyEddForElementor\Widgets\Customizer\TemplateCustomizer;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
class EasyEddForElementorSliderWidget extends \Elementor\Widget_Base
{
    private static $slides = [];
    public function get_name ()
    {
        return esc_html__('Product Slider', 'ele-edd-addon');
    }

    public function get_title ()
    {
        return esc_html__( 'Product Slider', 'ele-edd-addon' );
    }

    public function get_icon ()
    {
        return 'eicon-products';
    }

    public function get_custom_help_url ()
    {
        return '';
    }

    public function get_categories() {
        return [ 'edd' ];
    }


    public function get_keywords() {
        return [ 'edd', 'product', 'link', 'download' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_content',
            [
                'label' => 'Carousel Settings',
            ]
        );

        $this->add_control(
            'products_per_slide',
            [
                'label' => 'Post Per Slide',
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 3,
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label' => 'Autoplay',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
                'condition' => [
                    'slider_type' => 'carouselSlider',
                ],
            ]
        );

        $this->add_control(
            'slide_speed',
            [
                'label' => 'Slide Speed (in milliseconds)',
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 5000,
                'condition' => [
                    'slider_type' => 'carouselSlider',
                    'autoplay' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'slider_type',
            [
                'label' => 'Slider Type',
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'carouselSlider',
                'options' => [
                    'carouselSlider' => 'Carousel Slider',
                    'showCaseSlider' => 'Showcase Slider',
                    'cardCarouselSlider' => 'Carousel Slider with Card',
                ],
            ]
        );

        $this->add_control(
            'button-text',
            [
                'label' => esc_html__( 'Button Text', 'ele-edd-addon' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Purchase', 'ele-edd-addon' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'show-price',
            [
                'label' => esc_html__( 'Show Price On Button', 'ele-edd-addon' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'ele-edd-addon' ),
                'label_off' => esc_html__( 'Hide', 'ele-edd-addon' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();

    }


    private function carouselSlider()
    {
        $settings = $this->get_settings_for_display();
        $productsPerSlides = $settings['products_per_slide'];
        $sliderSpeed = $settings['slide_speed'];
        $products = get_posts(array(
            'post_type'   => 'download',
            'post_status' => 'publish'
        ));
        $groupedProducts = array_chunk($products, $productsPerSlides);

        $purchaseLinkArgs = [
            'text'  => "Buy Now",
            'price' => true,
        ];

        require plugin_dir_path(__FILE__) . "templates/SliderTemplates/carouselSlider.php";
    }

    private function showCaseSlider()
    {
        $settings = $this->get_settings_for_display();
        $productsPerSlides = $settings['products_per_slide'];
        $purchaseLinkArgs = [
            'text'  => "Buy Now",
            'price' => true,
        ];
        require plugin_dir_path(__FILE__) . "templates/SliderTemplates/showCaseSlider.php";
    }

    private function cardCarouselSlider()
    {
        $settings = $this->get_settings_for_display();
        $productsPerSlides = $settings['products_per_slide'];
        $sliderSpeed = $settings['slide_speed'];
        $products = get_posts(array(
            'post_type'   => 'download',
            'post_status' => 'publish'
        ));
        $groupedProducts = array_chunk($products, $productsPerSlides);

        $purchaseLinkArgs = [
            'text'  => $settings['button-text'],
            'price' => $settings['show-price'] === 'yes' ? true : false,
        ];
        require plugin_dir_path(__FILE__) . "templates/SliderTemplates/cardCarouselSlider.php";
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $sliderType = $settings['slider_type'];
        return $this->{$sliderType}();
    }
}
