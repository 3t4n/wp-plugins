<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;

/**
 * AI Addons Google Map
 *
 * @since 1.0.0
 */
 
class AIEA_Elementor_Google_Map_Widget extends Widget_Base {
	
	/**
	 * Get widget name.
	 *
	 * Retrieve Google Map widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'ai-google-map';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Google Map widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Google Map', 'ai-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Google Map widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('google-map');
	}


	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Google Map widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'ai-elements' ];
	}
	
	/**
	 * Retrieve the list of scripts the counter widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.3.0
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'ai-front-end', 'ai-gmaps'  ];
	}
		
	public function get_help_url() {
        return 'https://aiaddons.ai/google-map-demo/';
    }


	/**
	 * Register Google Map widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		
		$map_api_key = aiea_addon_base()->aiea_options('google-map-api');
		
		if( !empty( $map_api_key ) ) {
			//Map Section
			$this->start_controls_section(
				'map_section',
				[
					'label'			=> esc_html__( 'Map', 'ai-addons' ),
					'tab'			=> Controls_Manager::TAB_CONTENT,
				]
			);
			
			$this->add_control(
				'google_api_link',
				[
					'type' 	=> Controls_Manager::RAW_HTML,
					'raw' 	=> __( 'Create api key in Google account <a href="https://console.cloud.google.com/google/maps-apis/credentials" target="_blank">Create Google Map API</a>', 'ai-addons'),
				]
			);
			
			$repeater = new Repeater();
			
			$repeater->add_control(
				'map_latitude',
				[
					'type'			=> Controls_Manager::TEXT,
					'label' 		=> esc_html__( 'Map Latitude', 'ai-addons' ),
					'default' 		=> '-25.363',
				]
			);	
			$repeater->add_control(
				'map_longitude',
				[
					'type'			=> Controls_Manager::TEXT,
					'label' 		=> esc_html__( 'Map Longitude', 'ai-addons' ),
					'default' 		=> '131.044',
				]
			);	
			$repeater->add_control(
				'map_marker',
				[
					'label' 		=> esc_html__( 'Map Marker', 'ai-addons' ),
					'type' 			=> Controls_Manager::MEDIA,
					'dynamic' 		=> [
						'active' => true,
					]
				]
			);
			$repeater->add_control(
				'map_info_opt',
				[
					'label' 		=> esc_html__( 'Map Info Window Option', 'ai-addons' ),
					'type' 			=> Controls_Manager::SWITCHER,
					'default' 		=> 'no'
				]
			);
			$repeater->add_control(
				'map_info_title',
				[
					'type'			=> Controls_Manager::TEXT,
					'label' 		=> esc_html__( 'Map Info Window Title', 'ai-addons' ),
					'default'		=> '',
					'condition' 	=> [
						'map_info_opt' 	=> '1'
					]
				]
			);
			$repeater->add_control(
				'map_info_address',
				[
					'type'			=> Controls_Manager::TEXTAREA,
					'label'			=> esc_html__( 'Map Info Window Address', 'ai-addons' ),
					'default' 		=> '',
					'condition' 	=> [
						'map_info_opt' 	=> '1'
					]
				]
			);
			$this->add_control(
				'multi_map',
				[
					'label'			=> esc_html__( 'Map Details', 'ai-addons' ),
					'type'			=> Controls_Manager::REPEATER,
					'fields'		=> $repeater->get_controls(),
					'default'		=> [
						[
							'map_latitude' => '-25.363',
							'map_longitude' => '131.044'
						]
					],
					'title_field'	=> '{{{ map_latitude }}}, {{{ map_longitude }}}',
				]
			);		
			
			$this->add_control(
				'map_height',
				[
					'type'			=> Controls_Manager::TEXT,
					'label' 		=> esc_html__( 'Map Height', 'ai-addons' ),
					'default'		=> '400'
				]
			);
			$this->add_control(
				'map_style',
				[
					'label'			=> esc_html__( 'Map Style', 'ai-addons' ),
					'type'			=> Controls_Manager::SELECT,
					'default'		=> 'standard',
					'options'		=> [
						'standard'		=> esc_html__( 'Standard', 'ai-addons' ),
						'aubergine'	=> esc_html__( 'Aubergine', 'ai-addons' ),
						'silver'		=> esc_html__( 'Silver', 'ai-addons' ),
						'retro'		=> esc_html__( 'Retro', 'ai-addons' ),
						'dark'		=> esc_html__( 'Dark', 'ai-addons' ),
						'night'		=> esc_html__( 'Night', 'ai-addons' ),
						'custom'		=> esc_html__( 'Custom', 'ai-addons' )
					]
				]
			);
			$this->add_control(
				'map_zoom',
				[
					'type'			=> Controls_Manager::TEXT,
					'label' 		=> esc_html__( 'Map Zoom', 'ai-addons' ),
					'default'		=> '14'
				]
			);
			$this->add_control(
				'scroll_wheel',
				[
					'label' 		=> esc_html__( 'Map Scroll Wheel', 'ai-addons' ),
					'type' 			=> Controls_Manager::SWITCHER,
					'default' 		=> 'no'
				]
			);
			$this->end_controls_section();
			
			// Go premium section
			$this->start_controls_section(
				'aiea_section_pro',
				[
					'label' => esc_html__( 'Go Premium for More Features', 'ai-addons' )
				]
			);
			$this->add_control(
				'aiea_get_pro',
				[
					'type' => Controls_Manager::RAW_HTML,
					'raw' => '<span class="inc-pro-feature"> Get the  <a href="https://aiaddons.ai/pricing/" target="_blank">Pro version</a> for more ai elements and customization options.</span>',
					'content_classes' => 'ai-elementor-warning'
				]
			);
			$this->end_controls_section();
			
			// Style General Section
			$this->start_controls_section(
				'section_style_general',
				[
					'label' => __( 'General', 'ai-addons' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				]
			);
			$this->add_responsive_control(
				'map_margin',
				[
					'label' => esc_html__( 'Margin', 'ai-addons' ),
					'type' => Controls_Manager::DIMENSIONS,
					'selectors' => [
						'{{WRAPPER}} .google-map-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					]
				]
			);
			$this->add_responsive_control(
				'map_padding',
				[
					'label' => esc_html__( 'Padding', 'ai-addons' ),
					'type' => Controls_Manager::DIMENSIONS,
					'selectors' => [
						'{{WRAPPER}} .google-map-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					]
				]
			);
			$this->add_control(
				'map_bg_color',
				[
					'type'			=> Controls_Manager::COLOR,
					'label'			=> esc_html__( 'Map Background Color', 'ai-addons' ),
					'default' 		=> ''
				]
			);
			$this->end_controls_section();
			
			//Custom Map Colors
			$this->start_controls_section(
				'custom_color_section',
				[
					'label'			=> esc_html__( 'Custom Color', 'ai-addons' ),
					'tab'			=> Controls_Manager::TAB_STYLE,
				]
			);
			$this->add_control(
				'map_color',
				[
					'type'			=> Controls_Manager::COLOR,
					'label'			=> esc_html__( 'Map Color', 'ai-addons' ),
					'default' 		=> '#242f3e'
				]
			);
			$this->add_control(
				'map_text_stroke',
				[
					'type'			=> Controls_Manager::COLOR,
					'label'			=> esc_html__( 'Map Text Stroke Color', 'ai-addons' ),
					'default' 		=> '#242f3e'
				]
			);
			$this->add_control(
				'map_text_fill',
				[
					'type'			=> Controls_Manager::COLOR,
					'label'			=> esc_html__( 'Map Text Fill Color', 'ai-addons' ),
					'default' 		=> '#746855'
				]
			);
			$this->add_control(
				'administrative',
				[
					'type'			=> Controls_Manager::COLOR,
					'label'			=> esc_html__( 'Administrative Text Fill Color', 'ai-addons' ),
					'default' 		=> '#d59563'
				]
			);
			$this->add_control(
				'poi_text_fill',
				[
					'type'			=> Controls_Manager::COLOR,
					'label'			=> esc_html__( 'POI Text Fill Color', 'ai-addons' ),
					'default' 		=> '#d59563'
				]
			);
			$this->add_control(
				'poi_park',
				[
					'type'			=> Controls_Manager::COLOR,
					'label'			=> esc_html__( 'POI Park Color', 'ai-addons' ),
					'default' 		=> '#263c3f'
				]
			);
			$this->add_control(
				'poi_park_text_fill',
				[
					'type'			=> Controls_Manager::COLOR,
					'label'			=> esc_html__( 'POI Park Text Fill Color', 'ai-addons' ),
					'default' 		=> '#6b9a76'
				]
			);
			$this->add_control(
				'road',
				[
					'type'			=> Controls_Manager::COLOR,
					'label'			=> esc_html__( 'Road Color', 'ai-addons' ),
					'default' 		=> '#38414e'
				]
			);
			$this->add_control(
				'road_stroke',
				[
					'type'			=> Controls_Manager::COLOR,
					'label'			=> esc_html__( 'Road Stroke Color', 'ai-addons' ),
					'default' 		=> '#212a37'
				]
			);
			$this->add_control(
				'road_text_fill',
				[
					'type'			=> Controls_Manager::COLOR,
					'label'			=> esc_html__( 'Road Text Fill Color', 'ai-addons' ),
					'default' 		=> '#9ca5b3'
				]
			);
			$this->add_control(
				'road_highway',
				[
					'type'			=> Controls_Manager::COLOR,
					'label'			=> esc_html__( 'Road Highway Color', 'ai-addons' ),
					'default' 		=> '#746855'
				]
			);
			$this->add_control(
				'road_highway_stroke',
				[
					'type'			=> Controls_Manager::COLOR,
					'label'			=> esc_html__( 'Road Highway Stroke Color', 'ai-addons' ),
					'default' 		=> '#1f2835'
				]
			);
			$this->add_control(
				'road_highway_text_fill',
				[
					'type'			=> Controls_Manager::COLOR,
					'label'			=> esc_html__( 'Road Highway Text Fill Color', 'ai-addons' ),
					'default' 		=> '#f3d19c'
				]
			);
			$this->add_control(
				'transit',
				[
					'type'			=> Controls_Manager::COLOR,
					'label'			=> esc_html__( 'Transit Color', 'ai-addons' ),
					'default' 		=> '#2f3948'
				]
			);
			$this->add_control(
				'transit_station',
				[
					'type'			=> Controls_Manager::COLOR,
					'label'			=> esc_html__( 'Transit Station Text Fill Color', 'ai-addons' ),
					'default' 		=> '#d59563'
				]
			);
			$this->add_control(
				'water',
				[
					'type'			=> Controls_Manager::COLOR,
					'label'			=> esc_html__( 'Water Color', 'ai-addons' ),
					'default' 		=> '#17263c'
				]
			);
			$this->add_control(
				'water_text_fill',
				[
					'type'			=> Controls_Manager::COLOR,
					'label'			=> esc_html__( 'Water Text Fill Color', 'ai-addons' ),
					'default' 		=> '#515c6d'
				]
			);
			$this->add_control(
				'water_text_stroke',
				[
					'type'			=> Controls_Manager::COLOR,
					'label'			=> esc_html__( 'Water Text Stroke Color', 'ai-addons' ),
					'default' 		=> '#17263c'
				]
			);
			$this->end_controls_section();
		
		}else{
			$this->start_controls_section(
				'map_section',
				[
					'label'	=> esc_html__( 'Map', 'ai-addons' ),
					'tab'	=> Controls_Manager::TAB_CONTENT
				]
			);
			$this->add_control(
				'map_api_msg',
				[
					'type' => Controls_Manager::RAW_HTML,
					'raw' => sprintf( "<strong>Google Map API</strong> is not activated yet. Please visit ai plugin options. <a href='%s' target='_blank'>Set Google Map API Key</a>", esc_url( 'admin.php?page=ai-addon-settings' ) ),
					'content_classes' => 'ai-elementor-warning',
				]
			);			
			$this->end_controls_section();
		}
			
	}
	
	/**
	 * Render Google Map widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$map_api_key = aiea_addon_base()->aiea_options('google-map-api');
		
		if( empty( $map_api_key ) ) {
			echo '<div class="alert alert-warning"><strong>Google Map API</strong> is not activated yet. </div>';
			return;
		}

		$settings = $this->get_settings_for_display();
		extract( $settings );
		
		//Define Variables
		$map_height = isset( $map_height ) && $map_height != '' ? $map_height : '';
		$map_style = isset( $map_style ) && $map_style != '' ? $map_style : '';
		$scroll_wheel = isset( $scroll_wheel ) && $scroll_wheel == 'yes' ? 'true' : 'false';
		$map_zoom = isset( $map_zoom ) && $map_zoom != '' ? $map_zoom : '14';
		$default_mstyle = '[]';
		
		$multi_map_values = isset( $multi_map ) ? $multi_map : '';
		foreach( $multi_map_values as $key => $map ){
			if( isset( $map['map_marker'] ) && $map['map_marker'] != '' ){
				$multi_map_values[$key]['map_marker'] = $map['map_marker']['url'];
			}
		}
		$multi_map = json_encode( $multi_map_values );
		if( $map_style == 'custom' ){
			$default_mattr = array( "map_color", "map_text_stroke", "map_text_fill", "administrative", "poi_text_fill", "poi_park", "poi_park_text_fill", "road", "road_stroke", "road_text_fill", "road_highway", "road_highway_stroke", "road_highway_text_fill", "transit", "transit_station", "water", "water_text_fill", "water_text_stroke" );
			$map_styl = array();
			foreach( $default_mattr as $attr ){
				$map_styl[$attr] = isset( $$attr ) ? $$attr : '';
			}
			if( $map_styl ):
				$default_mstyle = '[ {"elementType": "geometry", "stylers": [{"color": "'. esc_attr( $map_styl["map_color"] ) .'"}]}, {"elementType": "labels.text.stroke", "stylers": [{"color": "'. esc_attr( $map_styl["map_text_stroke"] ) .'"}]}, {"elementType": "labels.text.fill", "stylers": [{"color": "'. esc_attr( $map_styl["map_text_fill"] ) .'"}]}, {  "featureType": "administrative.locality",  "elementType": "labels.text.fill",  "stylers": [{"color": "'. esc_attr( $map_styl["administrative"] ) .'"}] }, {  "featureType": "poi",  "elementType": "labels.text.fill",  "stylers": [{"color": "'. esc_attr( $map_styl["poi_text_fill"] ) .'"}] }, {  "featureType": "poi.park",  "elementType": "geometry",  "stylers": [{"color": "'. esc_attr( $map_styl["poi_park"] ) .'"}] }, {  "featureType": "poi.park",  "elementType": "labels.text.fill",  "stylers": [{"color": "'. esc_attr( $map_styl["poi_park_text_fill"] ) .'"}] }, {  "featureType": "road",  "elementType": "geometry",  "stylers": [{"color": "'. esc_attr( $map_styl["road"] ) .'"}] }, {  "featureType": "road",  "elementType": "geometry.stroke",  "stylers": [{"color": "'. esc_attr( $map_styl["road_stroke"] ) .'"}] }, {  "featureType": "road",  "elementType": "labels.text.fill",  "stylers": [{"color": "'. esc_attr( $map_styl["road_text_fill"] ) .'"}] }, {  "featureType": "road.highway",  "elementType": "geometry",  "stylers": [{"color": "'. esc_attr( $map_styl["road_highway"] ) .'"}] }, {  "featureType": "road.highway",  "elementType": "geometry.stroke",  "stylers": [{"color": "'. esc_attr( $map_styl["road_highway_stroke"] ) .'"}] }, {  "featureType": "road.highway",  "elementType": "labels.text.fill",  "stylers": [{"color": "'. esc_attr( $map_styl["road_highway_text_fill"] ) .'"}] }, {  "featureType": "transit",  "elementType": "geometry",  "stylers": [{"color": "'. esc_attr( $map_styl["transit"] ) .'"}] }, {  "featureType": "transit.station",  "elementType": "labels.text.fill",  "stylers": [{"color": "'. esc_attr( $map_styl["transit_station"] ) .'"}] }, {  "featureType": "water",  "elementType": "geometry",  "stylers": [{"color": "'. esc_attr( $map_styl["water"] ) .'"}] }, {  "featureType": "water",  "elementType": "labels.text.fill",  "stylers": [{"color": "'. esc_attr( $map_styl["water_text_fill"] ) .'"}] }, {  "featureType": "water",  "elementType": "labels.text.stroke",  "stylers": [{"color": "'. esc_attr( $map_styl["water_text_stroke"] ) .'"}] } ]';
			endif;
		}// if map style is custom
		
		echo '<div class="google-map-wrapper">';			
			echo '<div class="aigmap" styl'.'e="width:100%;height:'. absint( $map_height ) .'px;" data-map-style="'. esc_attr( $map_style ) .'" data-multi-map="true" data-maps="'. htmlspecialchars( $multi_map, ENT_QUOTES, 'UTF-8' ) .'" data-wheel="'. esc_attr( $scroll_wheel ) .'" data-zoom="'. esc_attr( $map_zoom ) .'" data-custom-style="'. htmlspecialchars( $default_mstyle, ENT_QUOTES, 'UTF-8' ) .'"></div>';
			
		echo '</div><!-- .google-map-wrapper -->';		

	}
		
}