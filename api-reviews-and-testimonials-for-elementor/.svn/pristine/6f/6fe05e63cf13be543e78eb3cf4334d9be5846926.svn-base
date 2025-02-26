<?php
namespace apira_api_reviews_Addon;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
if (!defined('ABSPATH')) exit;
class apira_api_reviews_carousel extends \Elementor\Widget_Base {

    public function __construct($data = [], $args = null) {
        parent::__construct($data, $args);

        // Enqueue styles
        wp_enqueue_style(
            'slick-slider-css', 
            plugins_url('widget-assets/css/slick.min.css', dirname(__FILE__)), 
            array(), 
            '1.0.0'
        );

        wp_enqueue_style(
            'style-main-css', 
            plugins_url('widget-assets/css/style-main.css', dirname(__FILE__)), 
            array(), 
            '1.0.0'
        );

        // Register scripts
        wp_register_script(
            'slick-slider-js', 
            plugins_url('widget-assets/js/slick.min.js', dirname(__FILE__)), 
            array('jquery'), 
            '1.8.1', 
            true
        );

        wp_register_script(
            'custom-widget-js', 
            plugins_url('widget-assets/js/custom-widget.js', dirname(__FILE__)), 
            array('jquery', 'slick-slider-js'), 
            '1.0.0', 
            true
        );
     }
    public function get_style_depends() {
        return ['style-main-css','slick-slider-css','slick-slider-theme-css'];
        }
 
    public function get_script_depends() {
        return ['slick-slider-js', 'custom-widget-js'];
        }
    public function get_name() {
		return 'api-review-carousel';
	}
	
	public function get_title() {
		return 'API Review Carousel';
	}
    protected function _register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'api-reviews-and-testimonials-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
    
        $this->add_control(
            'api_url',
            [
                'label' => __( 'API URL', 'api-reviews-and-testimonials-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'url',
                'placeholder' => __( 'https://example.com/api', 'api-reviews-and-testimonials-for-elementor' ),
            ]
        );
        $this->add_control(
            'note_1',
            [
                'label' => __( 'Important Note', 'api-reviews-and-testimonials-for-elementor' ),
                'type' => \Elementor\Controls_Manager::RAW_HTML,
                'raw' => __( '<p>Ensure that the API URL is correct and returns the expected data format e.g JSON <br> <br> All keys supported Nested Keys e.g (information.name or use name) </p>', 'api-reviews-and-testimonials-for-elementor' ),
            ]
        );

            // Control for specifying the reviews key
        $this->add_control(
            'reviews_key',
            [
                'label' => __('Reviews Key', 'text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'reviews',
                'description' => __('Specify the key where the reviews are located in the API response.', 'text-domain'),
            ]
        );

    
        $this->add_control(
            'name_key',
            [
                'label' => __( 'Name Key', 'api-reviews-and-testimonials-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'e.g. name', 'api-reviews-and-testimonials-for-elementor' ),
            ]
        );
    
        $this->add_control(
            'review_key',
            [
                'label' => __( 'Review Key', 'api-reviews-and-testimonials-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'e.g. review', 'api-reviews-and-testimonials-for-elementor' ),
            ]
        );
    
        $this->add_control(
            'title_key',
            [
                'label' => __( 'Title Key', 'api-reviews-and-testimonials-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'e.g. title', 'api-reviews-and-testimonials-for-elementor' ),
            ]
        );
    
        $this->add_control(
            'rating_key',
            [
                'label' => __( 'Rating Key', 'api-reviews-and-testimonials-for-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'e.g. rating', 'api-reviews-and-testimonials-for-elementor' ),
            ]
        );
        $this->add_control(
            'limit_body_text',
            [
                'label' => __( 'Trim Review Content', 'api-reviews-and-testimonials-for-elementor' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 25,
                'min' => 1,
                'step' => 1,
            ]
        );
        $this->add_control(
            'limit',
            [
                'label' => __( 'Number of Reviews to Show', 'api-reviews-and-testimonials-for-elementor' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 5,
                'min' => 1,
                'step' => 1,
            ]
        );
        $this->add_control(
            'columns',
            [
                'label' => __( 'Columns', 'api-reviews-and-testimonials-for-elementor' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 2,
                'min' => 1,
                'step' => 1,
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'style_section',
            [
                'label' => __( 'Style', 'api-reviews-and-testimonials-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
    
        // Box Styling
    $this->add_control(
        'box_background_color',
        [
            'label' => __( 'Box Background Color', 'api-reviews-and-testimonials-for-elementor' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .review-item' => 'background-color: {{VALUE}};',
            ],
        ]
    );

    $this->add_control(
        'box_border_color',
        [
            'label' => __( 'Box Border Color', 'api-reviews-and-testimonials-for-elementor' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .review-item' => 'border-color: {{VALUE}};',
            ],
        ]
    );

    $this->add_control(
        'box_border_radius',
        [
            'label' => __( 'Box Border Radius', 'api-reviews-and-testimonials-for-elementor' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'selectors' => [
                '{{WRAPPER}} .review-item' => 'border-radius: {{TOP}} {{RIGHT}} {{BOTTOM}} {{LEFT}};',
            ],
        ]
    );

    $this->add_control(
        'box_padding',
        [
            'label' => __( 'Box Padding', 'api-reviews-and-testimonials-for-elementor' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'selectors' => [
                '{{WRAPPER}} .review-item' => 'padding: {{TOP}} {{RIGHT}} {{BOTTOM}} {{LEFT}};',
            ],
        ]
    );

    // Title Styling
    $this->add_control(
        'title_color',
        [
            'label' => __( 'Title Color', 'api-reviews-and-testimonials-for-elementor' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .review-item h3' => 'color: {{VALUE}};',
            ],
        ]
    );

    $this->add_control(
        'title_font_size',
        [
            'label' => __( 'Title Font Size', 'api-reviews-and-testimonials-for-elementor' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', 'em', 'rem' ],
            'range' => [
                'px' => [
                    'min' => 10,
                    'max' => 100,
                    'step' => 1,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .review-item h3' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    // Review Styling
    $this->add_control(
        'review_color',
        [
            'label' => __( 'Review Color', 'api-reviews-and-testimonials-for-elementor' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .review-item p' => 'color: {{VALUE}};',
            ],
        ]
    );

    $this->add_control(
        'review_font_size',
        [
            'label' => __( 'Review Font Size', 'api-reviews-and-testimonials-for-elementor' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', 'em', 'rem' ],
            'range' => [
                'px' => [
                    'min' => 10,
                    'max' => 100,
                    'step' => 1,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .review-item p' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    // Name Styling
    $this->add_control(
        'name_color',
        [
            'label' => __( 'Name Color', 'api-reviews-and-testimonials-for-elementor' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .review-item span' => 'color: {{VALUE}};',
            ],
        ]
    );

    $this->add_control(
        'name_font_size',
        [
            'label' => __( 'Name Font Size', 'api-reviews-and-testimonials-for-elementor' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', 'em', 'rem' ],
            'range' => [
                'px' => [
                    'min' => 10,
                    'max' => 100,
                    'step' => 1,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .review-item span' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    // Rating Styling
    $this->add_control(
        'rating_color',
        [
            'label' => __( 'Rating Color', 'api-reviews-and-testimonials-for-elementor' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .star-rating' => 'color: {{VALUE}};',
            ],
        ]
    );

    $this->add_control(
        'rating_font_size',
        [
            'label' => __( 'Rating Font Size', 'api-reviews-and-testimonials-for-elementor' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', 'em', 'rem' ],
            'range' => [
                'px' => [
                    'min' => 10,
                    'max' => 100,
                    'step' => 1,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .star-rating span' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $this->add_control(
        'align', [
            'label' => __( 'Align', 'api-reviews-and-testimonials-for-elementor' ),
            'type' => Controls_Manager::CHOOSE,
            'options' => [
                'left' => [
                    'title' => esc_html__( 'Left', 'api-reviews-and-testimonials-for-elementor' ),
                    'icon' => 'eicon-text-align-left',
                ],
                'center' => [
                    'title' => esc_html__( 'Center', 'api-reviews-and-testimonials-for-elementor' ),
                    'icon' => 'eicon-text-align-center',
                ],
                'right' => [
                    'title' => esc_html__( 'Right', 'api-reviews-and-testimonials-for-elementor' ),
                    'icon' => 'eicon-text-align-right',
                ],
                'justify' => [
                    'title' => esc_html__( 'Justified', 'api-reviews-and-testimonials-for-elementor' ),
                    'icon' => 'eicon-text-align-justify',
                ],
            ],
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} ..review-item' => 'text-align: {{VALUE}};',
            ],
        ]
    );
    
        $this->end_controls_section();


    }

    private function get_nested_value($array, $key) {
        $keys = explode('.', $key);
        foreach ($keys as $k) {
            if (isset($array[$k])) {
                $array = $array[$k];
            } else {
                return null; // Key does not exist
            }
        }
        return $array;
    }

    protected function render() {
        $allowed_tags = array(
            'span' => array(
                'class' => array(),
            ),
            'strong' => array(),
            'em' => array(),
        );
    
        $settings = $this->get_settings_for_display();
        $limit = $settings['limit'];
        $columns = $settings['columns'];
        $unique_id = 'rts-slick-slider-' . uniqid();
    
        // Fetch data from the API
        $response = wp_remote_get( $settings['api_url'], array( 'timeout' => 20, 'sslverify' => false ) );
        if ( is_wp_error( $response ) ) {
            echo 'Failed to retrieve data from the API.';
            return;
        }
    
        // Decode the JSON data
        $data = json_decode( wp_remote_retrieve_body( $response ), true );
    
        // Check if JSON decoding was successful
        if ( ! is_array( $data ) || empty( $data ) ) {
            echo 'Invalid API response.';
            return;
        }
    
        // Check if a `reviews_key` is set in the widget settings
        $reviews_key = $settings['reviews_key'];
        if ( !empty($reviews_key) && isset($data[$reviews_key]) ) {
            // Use nested reviews key
            $reviews = $data[$reviews_key];
        } else {
            // Use the whole response as reviews
            $reviews = $data;
        }
    
        // Validate that `reviews` is an array
        if ( ! is_array( $reviews ) ) {
            echo 'Invalid reviews data format.';
            return;
        }
    
        // Start rendering the reviews
        echo '<div class="' . esc_attr( $unique_id ) . ' review-slider" data-slides-to-show="' . esc_attr( $columns ) . '">';
    
        // Loop through the reviews and extract the necessary fields
        $count = 0;
        foreach ( $reviews as $item ) {
            if ( $count >= $limit ) break;
    
            // Fetch the values from JSON structure using nested keys
            $name = $this->get_nested_value($item, $settings['name_key']);
            $review = $this->get_nested_value($item, $settings['review_key']);
            $rating = $this->get_nested_value($item, $settings['rating_key']);
            $date = isset($item['date']) ? $item['date'] : ''; // Optional date field
    
            $operator = isset($item['operatore']) ? $item['operatore'] : [];
            $operator_name = isset($operator['nickName']) ? $operator['nickName'] : '';
            $operator_description = isset($operator['descrizione']) ? $operator['descrizione'] : '';
    
            // Limit the review content if necessary
            $text_limit = $settings['limit_body_text'];
            $trimmed_review = wp_trim_words( $review, $text_limit );
    
            // Generate the star rating HTML
            $rating_html = '';
            if ($rating) {
                $full_stars = floor($rating);
                $half_star = ($rating - $full_stars) >= 0.5 ? true : false;
                $empty_stars = 5 - $full_stars - ($half_star ? 1 : 0);
    
                // Full stars
                for ($i = 0; $i < $full_stars; $i++) {
                    $rating_html .= '<span class="star">&#9733;</span>'; // Full star
                }
    
                // Half star
                if ($half_star) {
                    $rating_html .= '<span class="star">&#189;</span>'; // Half star
                }
    
                // Empty stars
                for ($i = 0; $i < $empty_stars; $i++) {
                    $rating_html .= '<span class="star empty">&#9733;</span>'; // Empty star
                }
            }
    
            // Output the review item
            echo '<div class="review-item">';
            echo '<h3>' . esc_html( $operator_name ) . '</h3>'; // Display the operator's nickname
            echo '<p>' . wp_kses( $operator_description, $allowed_tags ) . '</p>'; // Operator description
            echo '<p><strong>' . esc_html( $name ) . '</strong> (' . esc_html( $date ) . '):</p>'; // User name and review date
            echo '<p>' . esc_html( $trimmed_review ) . '</p>'; // Display review content
            echo '<div class="star-rating">' . wp_kses( $rating_html, $allowed_tags ) . '</div>'; // Display star rating
            echo '</div>';
    
            $count++;
        }
    
        echo '</div>';
    }

}