<?php
namespace GeounitMaps\Widgets;

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;

defined( 'ABSPATH' ) || die();

class Geounitmaps extends Widget_Base {

	public function __construct( $data = array(), $args = null ) {
		parent::__construct( $data, $args );
    }

	public function get_name() {
		return 'geounitmaps';
	}

	public function get_title() {
		return __( 'Geounit Maps', 'elementor-geounitmaps' );
	}

	public function get_icon() {
		return 'icon-geounit-schwarz';
	}

	public function get_categories() {
		return array( 'general' );
	}

	public function get_script_depends()
    {
        return [];
    }

	protected function _register_controls() {

        $defaults = geounit_maps_get_defaults();

		$this->start_controls_section(
            'geounit-maps_content',
            [
                'label' => __('Content', 'geounit-maps'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT
            ]
        );

        $this->add_control(
			'important_note',
			[
				'label' => __( 'Need help to get your coordinates📍 (lat,lng) where the marker will be placed? Visit', 'geounit-maps-block' ),
				'type' => \Elementor\Controls_Manager::RAW_HTML,
                'raw' =>  '<a target="_blank" href="https://www.latlong.net/">latlong.net</a>'
			]
		);

        $this->add_control(
			'themeattribution',
			[
				'label' => __( 'hidden', 'geounit-maps' ),
				'type' => \Elementor\Controls_Manager::HIDDEN,
				'default' => wp_kses($defaults['themeattribution'], wp_kses_allowed_html(['a' => ['target' => '_blank', 'href' => []]])),
                'frontend_available' => true
			]
		);

        $this->add_control(
			'themeurl',
			[
				'label' => __( 'hidden', 'geounit-maps' ),
				'type' => \Elementor\Controls_Manager::HIDDEN,
				'default' => get_site_url() . esc_attr($defaults['themeurl']),
                'frontend_available' => true
			]
		);

        $this->add_control(
			'disablescrollzoom',
			[
				'label' => __( 'hidden', 'geounit-maps' ),
				'type' => \Elementor\Controls_Manager::HIDDEN,
				'default' => esc_attr($defaults['disablescrollzoom']),
                'frontend_available' => true
			]
		);
        
        $this->add_control(
            'lat',
            [
                'label' =>  __('Map Latitude', 'geounit-maps'),
                'type'   => \Elementor\Controls_Manager::TEXT,
                'placeholder'   => '48.8934784',
                'default'   => esc_attr($defaults['lat']),
                'frontend_available' => true
            ]
        );

        $this->add_control(
            'lon',
            [
                'label' =>  __('Map Longitude', 'geounit-maps'),
                'type'   => \Elementor\Controls_Manager::TEXT,
                'placeholder'   => '8.6994072',
                'default'   => esc_attr($defaults['lng']),
                'frontend_available' => true
            ]
        );

        $this->add_control(
            'disablemarker',
            [
                'label' =>  __('Hide Marker', 'geounit-maps'),
                'type'   => \Elementor\Controls_Manager::SWITCHER,
                'description' => '',
                'label_on' => __('Yes', 'geounit-maps'),
                'label_off' => __('No', 'geounit-maps'),
                'return_value' => 'false',
                'default' => esc_attr($defaults['disablemarker']),
                'separator' => 'after',
                'frontend_available' => true
            ]
        );
      
        $this->add_control(
            'content',
            [
                'label' => __('Tooltip / Content', 'geounit-maps'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'frontend_available' => true
            ]
        );

        $this->end_controls_section();

        //! Style Tab
        $this->start_controls_section(
            'geounit-maps-style',
            [
                'label' => __('Style', 'geounit-maps'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'height',
            [
                'label' =>  __('Map Height', 'geounit-maps'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'description' => 'Value unit in "px". Max value is 2000',
                'size_units' => ['px'],
                'default' => [
                    'size' => esc_attr($defaults['height']),
                ],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 2000,
                        'step' => 50
                    ],

                ],
                'selectors' => [
                    '{{WRAPPER}} .geounit_maps' => 'height: {{SIZE}}{{UNIT}};',
                ],
                'frontend_available' => true
            ]
        );

        $this->add_control(
            'zoom',
            [
                'label' =>  __('Initial Zoom', 'geounit-maps'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'default' => [
                    'size' => esc_attr($defaults['zoom']),
                ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 18,
                    ],
                ],
                'frontend_available' => true
            ]
        );

        $this->add_control(
            'markercolor',
            [
                'label' => __('Marker Color', 'geounit-maps'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => esc_attr($defaults['markercolor']),
                'frontend_available' => true
            ]
        );

        $this->add_control(
            'iconsize',
            [
                'label' =>  __('Marker Size', 'geounit-maps'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'default' => [
                    'size' => esc_attr($defaults['iconsize']),
                ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'frontend_available' => true
            ]
        );

        $this->add_control(
			'style',
			[
				'label' => esc_html__('Style', 'geounit-maps'),
				'type' => \Elementor\CustomControl\ImageSelector_Control::ImageSelector,
				'options' => $defaults['styles'],
				'default' => $defaults['styles'][0]->url,
                'frontend_available' => true
			]
		);

        $this->end_controls_section();
	}

	protected function render() {
        $uniqID = uniqid('geounit_maps');
		echo '<div id="'.esc_attr($uniqID).'" class="geounit_maps"></div>';
	}
}
