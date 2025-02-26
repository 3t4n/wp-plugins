<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
use Elementor\Widget_Base;
use Elementor\Utils;
use Elementor\Icons_Manager;
use Elementor\Controls_Manager;
use Elementor\Control_Media;
use \Elementor\Group_Control_Box_Shadow;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Text_Stroke;
use Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Image_Size;

class Rswpthemes_Awt_Full_Width_Book_Slider extends Widget_Base {

	public function get_name() {
		return 'rswpthemes_awt_full_width_books_slider';
	}

	public function get_title() {
		return __( 'Awt Full Width Books Slider', 'author-website-templates' );
	}

	public function get_icon() {
		return 'dashicons dashicons-book-alt';
	}

	public function get_categories() {
		return [ 'rswpthemes_awt_widgets' ];
	}

	public function get_style_depends() {
		return [ 'rswpthemes-awt-full-width-book-slider', 'slick' ];
	}

	public function get_script_depends() {
		return [ 'rswpthemes-awt-full-width-book-slider', 'slick' ];
	}

	protected function register_controls() {

		// Content Tab
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'author-website-templates' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
            'book_ids',
            [
                'label' => __( 'Book IDs Separated By Commas', 'author-website-templates' ),
                'separator' => 'before',
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder'	=> '775, 895, 458'
            ]
        );

        $this->add_control(
            'show_image',
            [
                'label' => __( 'Show Book Image', 'author-website-templates' ),
                'separator' => 'before',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'author-website-templates' ),
                'label_off' => __( 'Hide', 'author-website-templates' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_label',
            [
                'label' => __( 'Show Label', 'author-website-templates' ),
                'separator' => 'before',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'author-website-templates' ),
                'label_off' => __( 'Hide', 'author-website-templates' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_label_border',
            [
                'label' => __( 'Show Label Border', 'author-website-templates' ),
                'separator' => 'before',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'author-website-templates' ),
                'label_off' => __( 'Hide', 'author-website-templates' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_title',
            [
                'label' => __( 'Show Title', 'author-website-templates' ),
                'separator' => 'before',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'author-website-templates' ),
                'label_off' => __( 'Hide', 'author-website-templates' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_author',
            [
                'label' => __( 'Show Author', 'author-website-templates' ),
                'separator' => 'before',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'author-website-templates' ),
                'label_off' => __( 'Hide', 'author-website-templates' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_description',
            [
                'label' => __( 'Show Description', 'author-website-templates' ),
                'separator' => 'before',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'author-website-templates' ),
                'label_off' => __( 'Hide', 'author-website-templates' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_button_one',
            [
                'label' => __( 'Show Button One', 'author-website-templates' ),
                'separator' => 'before',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'author-website-templates' ),
                'label_off' => __( 'Hide', 'author-website-templates' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_button_two',
            [
                'label' => __( 'Show Button Two', 'author-website-templates' ),
                'separator' => 'before',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'author-website-templates' ),
                'label_off' => __( 'Hide', 'author-website-templates' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
			'slider_settings',
			[
				'label' => __( 'Slides Settings', 'author-website-templates' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'slider_smart_speed',
			[
				'label' => __( 'Smart Speed', 'author-website-templates' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 2000,
						'step' => 10,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 400,
				],
			]
		);
		$this->add_control(
			'slider_fluid_speed',
			[
				'label' => __( 'Fluid Speed', 'author-website-templates' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 2000,
						'step' => 10,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 400,
				],
			]
		);
		$this->add_control(
			'slider_autoplay_speed',
			[
				'label' => __( 'Auto Play Speed', 'author-website-templates' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 2000,
						'step' => 10,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 400,
				],
			]
		);
		$this->add_control(
			'slider_nav_speed',
			[
				'label' => __( 'Nav Speed', 'author-website-templates' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 2000,
						'step' => 10,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 400,
				],
			]
		);
		$this->add_control(
			'autoplay_hover_push',
			[
				'label'        => __( 'Auto Play Hover', 'author-website-templates' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'author-website-templates' ),
				'label_off'    => __( 'No', 'author-website-templates' ),
				'return_value' => 'true',
				'default'      => 'true',
			]
		);
		$this->add_control(
			'nav',
			[
				'label'        => __( 'Navigation Arrow', 'author-website-templates' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'author-website-templates' ),
				'label_off'    => __( 'Hide', 'author-website-templates' ),
				'return_value' => 'true',
				'default'      => 'true',
			]
		);
		$this->add_control(
			'autoplay',
			[
				'label'        => __( 'Auto Play', 'author-website-templates' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'author-website-templates' ),
				'label_off'    => __( 'No', 'author-website-templates' ),
				'return_value' => 'true',
				'default'      => 'true',
			]
		);
		$this->add_control(
			'loop',
			[
				'label'        => __( 'Loop', 'author-website-templates' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'author-website-templates' ),
				'label_off'    => __( 'No', 'author-website-templates' ),
				'return_value' => 'true',
				'default'      => 'true',
			]
		);
		$this->add_control(
			'mouseDrag',
			[
				'label'        => __( 'Mouse Drag', 'author-website-templates' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'author-website-templates' ),
				'label_off'    => __( 'No', 'author-website-templates' ),
				'return_value' => 'true',
				'default'      => 'true',
			]
		);
		$this->add_control(
			'touchDrag',
			[
				'label'        => __( 'Touch Drag', 'author-website-templates' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'author-website-templates' ),
				'label_off'    => __( 'No', 'author-website-templates' ),
				'return_value' => 'true',
				'default'      => 'true',
			]
		);
		$this->add_control(
			'autoplayTimeout',
			[
				'label'     => __( 'Autoplay Timeout', 'author-website-templates' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => '5000',
				'condition' => [
					'autoplay' => 'true',
				],
				'options' => [
					'5000'  => __( '5 Seconds', 'author-website-templates' ),
					'10000' => __( '10 Seconds', 'author-website-templates' ),
					'15000' => __( '15 Seconds', 'author-website-templates' ),
					'20000' => __( '20 Seconds', 'author-website-templates' ),
					'25000' => __( '25 Seconds', 'author-website-templates' ),
					'30000' => __( '30 Seconds', 'author-website-templates' ),
				],
			]
		);
		$this->end_controls_section();


	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$sliderDynamicId 		   = wp_rand(10, 100000);

	    $sliderAttributes = [
	        'id' => 'featured-book-slider-activate-' . esc_attr($sliderDynamicId),
	        'data-nav' => $settings['nav'] ? $settings['nav'] : 'false',
	        'data-loop' => $settings['loop'] ? $settings['loop'] : 'false',
	        'data-autoplay' => $settings['autoplay'] ? $settings['autoplay'] : 'false',
	        'data-autoplay-timeout' => $settings['autoplayTimeout'] ? $settings['autoplayTimeout'] : '0',
	        'data-mouse-drag' => $settings['mouseDrag'] ? $settings['mouseDrag'] : 'false',
	        'data-touch-drag' => $settings['touchDrag'] ? $settings['touchDrag'] : 'false',
	        'data-smart-speed' => $settings['slider_smart_speed'] ? $settings['slider_smart_speed']['size'] : '250',
	        'data-autoplay-speed' => $settings['slider_autoplay_speed'] ? $settings['slider_autoplay_speed']['size'] : 'false',
	        'data-fluid-speed' => $settings['slider_fluid_speed'] ? $settings['slider_fluid_speed']['size'] : 'false',
	        'data-nav-speed' => $settings['slider_nav_speed'] ? $settings['slider_nav_speed']['size'] : 'false',
	        'data-auto-hover' => $settings['autoplay_hover_push'] ? $settings['autoplay_hover_push'] : 'true',
	    ];

		$sliderAttributesString = implode('; ', array_map(
		    fn($key, $value) => $key . '=' . esc_attr($value),
		    array_keys($sliderAttributes),
		    $sliderAttributes
		));

		$showBookImage = $settings['show_image'] === 'yes' ? 'true' : 'false';
		$showButtonTwo = $settings['show_button_two'] === 'yes' ? 'true' : 'false';
		$showButtonOne = $settings['show_button_one'] === 'yes' ? 'true' : 'false';
		$showDescription = $settings['show_description'] === 'yes' ? 'true' : 'false';
		$showAuthor = $settings['show_author'] === 'yes' ? 'true' : 'false';
		$showTitle = $settings['show_title'] === 'yes' ? 'true' : 'false';

		$bookIds = $settings['book_ids'];

		echo do_shortcode("[rswpbs_full_width_book_slider
			show_image=\"$showBookImage\"
			book_ids=\"$bookIds\"
			show_title=\"$showTitle\"
			show_author=\"$showAuthor\"
			show_description=\"$showDescription\"
			show_button_one=\"$showButtonOne\"
			show_button_two=\"$showButtonTwo\"
			slider_attr=\"$sliderAttributesString\"
		]");

	}
}
