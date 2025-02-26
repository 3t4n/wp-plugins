<?php
/**
 * Main plugin class
 */

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    exit;
}

class Parallaxer {
    /**
     * Instance
     *
     * @var Parallaxer
     */
    private static $instance = null;

    /**
     * Get instance
     */
    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Constructor
     */
    public function __construct() {
        // Register hooks for adding controls
        add_action('elementor/element/common/_section_style/after_section_end', [$this, 'register_controls']);
        add_action('elementor/element/section/section_advanced/after_section_end', [$this, 'register_controls']);
        add_action('elementor/element/container/section_layout/after_section_end', [$this, 'register_controls']);
        
        // Frontend assets
        add_action('elementor/frontend/after_enqueue_scripts', [$this, 'enqueue_scripts']);
        add_action('elementor/frontend/after_enqueue_styles', [$this, 'enqueue_styles']);
        
        // Editor assets
        add_action('elementor/editor/after_enqueue_scripts', [$this, 'enqueue_scripts']);
        add_action('elementor/editor/after_enqueue_styles', [$this, 'enqueue_styles']);
        
        // Preview assets
        add_action('elementor/preview/enqueue_styles', [$this, 'enqueue_styles']);

        // Before render hook
        add_action('elementor/frontend/before_render', [$this, 'before_render']);

        // Register user preference for smooth scroll
        add_action('elementor/element/editor-preferences/preferences/before_section_end', [$this, 'add_smooth_scroll_preference']);

        // image controls, aspect ratio
        add_action('elementor/element/image/section_style_image/before_section_end', [$this, 'register_image_controls']);

        // container controls, aspect ratio
        add_action('elementor/element/container/section_layout_container/before_section_end', [$this, 'register_container_controls']);
    }

    /**
     * Add smooth scroll preference to Elementor editor preferences
     */
    public function add_smooth_scroll_preference($preferences) {
        $preferences->add_control(
            'enable_smooth_scroll',
            [
                'label' => esc_html__('Enable Smooth Scroll', 'parallaxer-for-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no',
                'description' => esc_html__('Enable smooth scrolling effect on the frontend', 'parallaxer-for-elementor'),
            ]
        );
    }

    /**
     * Check if smooth scroll is enabled
     */
    private function is_smooth_scroll_enabled() {
        // Check site-wide option first
        $global_setting = get_option('parallaxer_smooth_scroll_enabled', 'yes');
        
        if ($global_setting === 'yes') {
            return true;
        }
        
        return false;
    }

    /**
     * Enqueue scripts
     */
    public function enqueue_scripts() {
        // Only proceed with Lenis scripts if we're not in admin and smooth scroll is enabled
        if (!is_admin() && $this->is_smooth_scroll_enabled()) {
            
            // Enqueue Lenis
            wp_enqueue_script(
                'lenis',
                PARALLAXER_URL . 'assets/js/lenis.min.js',
                [],
                '1.0.27',
                true
            );

            // Enqueue Lenis initialization
            wp_enqueue_script(
                'parallaxer-lenis-init',
                PARALLAXER_URL . 'assets/js/lenis-init.js',
                ['lenis'],
                PARALLAXER_VERSION,
                true
            );
            
        }

        // Enqueue other scripts as before
        wp_enqueue_script(
            'rellax',
            PARALLAXER_URL . 'assets/js/rellax.min.js',
            [],
            '1.12.1',
            true
        );

        wp_enqueue_script(
            'parallaxer-elementor',
            PARALLAXER_URL . 'assets/js/parallaxer.js',
            ['jquery', 'rellax'],
            PARALLAXER_VERSION,
            true
        );

        wp_localize_script(
            'parallaxer-elementor',
            'parallaxerSettings',
            [
                'breakpoints' => [
                    'mobile' => 767,
                    'tablet' => 1024
                ]
            ]
        );
    }

    /**
     * Enqueue styles
     */
    public function enqueue_styles() {
        wp_enqueue_style(
            'parallaxer-fluid-system',
            PARALLAXER_URL . 'assets/css/fluid-system.css',
            [],
            PARALLAXER_VERSION
        );
    }

    /**
     * Register controls specifically for the Image widget
     */
    public function register_image_controls($element) {
        $element->start_injection([
            'type' => 'control',
            'at' => 'after',
            'of' => 'height'
        ]);
        
        $element->add_responsive_control(
            'custom_aspect_ratio',
            [
                'label' => esc_html__('Aspect Ratio', 'parallaxer-for-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
                'placeholder' => '16/9',
                'selectors' => [
                    '{{WRAPPER}} img' => 'aspect-ratio: {{VALUE}};object-fit: cover;',
                ],
            ]
        );
        
        $element->end_injection();
    }

    /**
     * Register controls for Container element
     */
    public function register_container_controls($element) {
        $element->start_injection([
            'type' => 'control',
            'at' => 'after',
            'of' => 'min_height'
        ]);
        
        $element->add_responsive_control(
            'container_aspect_ratio',
            [
                'label' => esc_html__('Aspect Ratio', 'parallaxer-for-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
                'placeholder' => '16/9',
                'selectors' => [
                    '{{WRAPPER}}' => 'aspect-ratio: {{VALUE}};',
                ],
            ]
        );
        
        $element->end_injection();
    }

    /**
     * Register Elementor controls
     */
    public function register_controls($element) {
        // Check if Elementor is loaded
        if (!class_exists('\Elementor\Controls_Manager')) {
            return;
        }

        $element->start_controls_section(
            'section_parallaxer',
            [
                'label' => esc_html__('Parallaxer', 'parallaxer-for-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_ADVANCED,
            ]
        );

        $element->add_control(
            'enable_parallax',
            [
                'label' => esc_html__('Enable Parallax', 'parallaxer-for-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => '',
                'label_on' => esc_html__('Yes', 'parallaxer-for-elementor'),
                'label_off' => esc_html__('No', 'parallaxer-for-elementor'),
                'return_value' => 'yes',
                'frontend_available' => true,
            ]
        );

        $element->add_responsive_control(
            'parallax_speed',
            [
                'label' => esc_html__('Speed', 'parallaxer-for-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -10,
                        'max' => 10,
                        'step' => 0.1,
                    ]
                ],
                'default' => [
                    'size' => 2,
                ],
                'condition' => [
                    'enable_parallax' => 'yes',
                ],
                'frontend_available' => true,
            ]
        );

        $element->add_control(
            'parallax_centered',
            [
                'label' => esc_html__('Center Element', 'parallaxer-for-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => '',
                'condition' => [
                    'enable_parallax' => 'yes',
                ],
                'frontend_available' => true,
            ]
        );

		$element->add_control(
			'paralaxer_txt',
			[
				'label' => esc_html__( 'Note!', 'parallaxer-for-elementor' ), 
				'type' => \Elementor\Controls_Manager::RAW_HTML, 
				'raw' => __( 'Parallax is relative to the BODY element! It will work best for Hero sections or those elements closer to the page top.', 'parallaxer-for-elementor' ),
				'separator' => 'before', 
			]
		);

        $element->end_controls_section();
    }

    /**
     * Before render callback
     */
    public function before_render($element) {
        $settings = $element->get_settings_for_display();
        
        if ('yes' === $settings['enable_parallax']) {
            $element->add_render_attribute('_wrapper', 'class', 'rellax');
            
            // Add data attributes for Rellax.js
            if (isset($settings['parallax_speed']['size'])) {
                $element->add_render_attribute('_wrapper', 'data-rellax-speed', esc_attr($settings['parallax_speed']['size']));
            }
            
            if ('yes' === $settings['parallax_centered']) {
                $element->add_render_attribute('_wrapper', 'data-rellax-centered', 'true');
            }

        }
    }
}

// Initialize the plugin
Parallaxer::get_instance();