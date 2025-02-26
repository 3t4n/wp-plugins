<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Rswpthemes_Awt_Book_Reviews_Slider extends \Elementor\Widget_Base {

    public function get_name() {
        return 'rswpthemes_awt_book_reviews_slider';
    }

    public function get_title() {
        return __('Awt Book Reviews Slider', 'author-website-templates');
    }

    public function get_icon() {
        return 'dashicons dashicons-testimonial';
    }

    public function get_categories() {
        return ['rswpthemes_awt_widgets'];
    }

    public function get_style_depends(){
        return ['book-reviews-slider', 'slick'];
    }

    public function get_script_depends(){
        return ['rswpbs-review-slider-script', 'slick'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'author-website-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Section Heading
        $this->add_control(
            'section_heading',
            [
                'label' => __('Section Heading', 'author-website-templates'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Words From Our Happy Readers.', 'author-website-templates'),
            ]
        );

        // Section Subheading
        $this->add_control(
            'section_sub_heading',
            [
                'label' => __('Section Sub Heading', 'author-website-templates'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Testimonial', 'author-website-templates'),
            ]
        );

        // Reviews Per Page
        $this->add_control(
            'review_per_page',
            [
                'label' => __('Reviews Per Page', 'author-website-templates'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 8,
            ]
        );

        // Review Layout
        $this->add_control(
            'review_layout',
            [
                'label' => __('Review Layout', 'author-website-templates'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'slider' => __('Slider', 'author-website-templates'),
                    'grid' => __('Grid', 'author-website-templates'),
                ],
                'default' => 'slider',
            ]
        );

        // Select Book
        $this->add_control(
            'select_book',
            [
                'label' => __('Select Book', 'author-website-templates'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
            ]
        );

        // Show Slider Navigation
        $this->add_control(
            'show_slider_navigation',
            [
                'label' => __('Show Slider Navigation', 'author-website-templates'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'author-website-templates'),
                'label_off' => __('Hide', 'author-website-templates'),
                'default' => 'true',
            ]
        );

        // Show Section Title
        $this->add_control(
            'show_section_title',
            [
                'label' => __('Show Section Title', 'author-website-templates'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'author-website-templates'),
                'label_off' => __('Hide', 'author-website-templates'),
                'default' => 'true',
            ]
        );

        // Show Quote
        $this->add_control(
            'show_quote',
            [
                'label' => __('Show Quote', 'author-website-templates'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'author-website-templates'),
                'label_off' => __('Hide', 'author-website-templates'),
                'default' => 'true',
            ]
        );

        // Show Ratings
        $this->add_control(
            'show_ratings',
            [
                'label' => __('Show Ratings', 'author-website-templates'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'author-website-templates'),
                'label_off' => __('Hide', 'author-website-templates'),
                'default' => 'true',
            ]
        );

        // Show Reviewer
        $this->add_control(
            'show_reviewer',
            [
                'label' => __('Show Reviewer', 'author-website-templates'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'author-website-templates'),
                'label_off' => __('Hide', 'author-website-templates'),
                'default' => 'true',
            ]
        );

        // Screen size controls
        $this->add_control(
            'large_screen',
            [
                'label' => __('Large Screen Columns', 'author-website-templates'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 3,
            ]
        );

        $this->add_control(
            'medium_screen',
            [
                'label' => __('Medium Screen Columns', 'author-website-templates'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 2,
            ]
        );

        $this->add_control(
            'small_screen',
            [
                'label' => __('Small Screen Columns', 'author-website-templates'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 1,
            ]
        );

        $this->add_control(
            'layout_style',
            [
                'label' => __('Layout Style', 'author-website-templates'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'classic' => __('Classic', 'author-website-templates'),
                    'modern' => __('Modern', 'author-website-templates'),
                ],
                'default' => 'classic',
            ]
        );

        $this->end_controls_section();
    }
    protected function render() {
        $settings = $this->get_settings_for_display();

        $review_per_page = $settings['review_per_page'];
        $review_layout = $settings['review_layout'];
        $section_sub_heading = $settings['section_sub_heading'];
        $section_heading = $settings['section_heading'];
        $select_book = $settings['select_book'];
        $show_slider_navigation = $settings['show_slider_navigation'] === 'yes' ? 'true' : 'false';
        $show_section_title = $settings['show_section_title'] === 'yes' ? 'true' : 'false';
        $show_quote = $settings['show_quote'] === 'yes' ? 'true' : 'false';
        $show_ratings = $settings['show_ratings'] === 'yes' ? 'true' : 'false';
        $show_reviewer = $settings['show_reviewer'] === 'yes' ? 'true' : 'false';
        $large_screen = $settings['large_screen'];
        $medium_screen = $settings['medium_screen'];
        $small_screen = $settings['small_screen'];
        $layout_style = $settings['layout_style'];

        echo '<div class="extra-addon-testimonial-section">';
        echo do_shortcode("[rswpbs_reviews container=\"container\" show_slider_nagivation=\"$show_slider_navigation\" review_per_page=\"$review_per_page\" review_layout=\"$review_layout\" section_sub_heading=\"$section_sub_heading\" section_heading=\"$section_heading\" select_book=\"$select_book\" show_slider_navigation=\"$show_slider_navigation\" show_section_title=\"$show_section_title\" show_quote=\"$show_quote\" show_ratings=\"$show_ratings\" show_reviewer=\"$show_reviewer\" large_screen=\"$large_screen\" medium_screen=\"$medium_screen\" small_screen=\"$small_screen\" layout_style=\"$layout_style\"]");
        echo '</div>';
    }


}
