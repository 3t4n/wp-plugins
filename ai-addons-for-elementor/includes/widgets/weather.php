<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;

/**
 * AI Addons Weather
 *
 * @since 1.0.0
 */
 
class AIEA_Elementor_Weather_Widget extends Widget_Base {
	
	private $excerpt_len;
	
	/**
	 * Get widget name.
	 *
	 * Retrieve Weather Widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'ai-weather';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Weather Widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Weather', 'ai-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Weather Widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('weather');
	}


	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Weather widget belongs to.
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
	 * Retrieve the list of scripts the Weather widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.3.0
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'ai-front-end' ];
	}
	
	/**
	 * Get widget keywords.
	 * @return array widget keywords.
	 */
	public function get_keywords() {
		return [ 'weather', 'google weather', 'cloud', 'rain', 'open weather' ];
	}
		
	public function get_help_url() {
        return 'https://aiaddons.ai/weather-demo/';
    }

	/**
	 * Register Weather widget controls. 
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
	
		$openaiea_api_key = aiea_addon_base()->aiea_options('open-weather-api');	
		
		if( !empty( $openaiea_api_key ) ){
			//General Section
			$this->start_controls_section(
				'general_section',
				[
					'label'	=> esc_html__( 'General', 'ai-addons' ),
					'tab'	=> Controls_Manager::TAB_CONTENT,
					'description'	=> esc_html__( 'Default contact form options.', 'ai-addons' ),
				]
			);
			$this->add_control(
				'api_version',
				[
					'type'			=> Controls_Manager::SELECT,
					'label'			=> esc_html__( 'Open Weather Map API Version', 'ai-addons' ),
					'default'		=> '2.5',
					'options'		=> [
						'2.5' => esc_html__( 'Free(API 2.5)', 'ai-addons' ),
						'3.0' => esc_html__( 'One Call API 3.0', 'ai-addons' ),
					],
					'description' 	=> __( 'Check Open Weather Map API here <a href="https://home.openweathermap.org/api_keys" target="_blank">Open Weather Map API</a>', 'ai-addons'),
				]
			);
			$this->add_control(
				'city',
				[
					'type'			=> Controls_Manager::TEXT,
					'label'			=> esc_html__( 'City Name', 'ai-addons' ),
					'description' 	=> __( 'Enter your city name or click this auto deduct <a href="#" class="aiea-city-auto-deduct">City Auto Deduct</a><span class="ai-auto-loader"><i class="aieaicon-settings"></i></span>. <br>*Note: Example city name like London,UK', 'ai-addons'),
					'default'		=> '',
				]
			);
			$this->add_control(
				'update_cycle',
				[
					'type'			=> Controls_Manager::SELECT,
					'label'			=> esc_html__( 'Update Once In', 'ai-addons' ),
					'default'		=> '60',
					'options'		=> [
						'60' => esc_html__( '1 Hour', 'ai-addons' ),
						'30' => esc_html__( '30 Minutes', 'ai-addons' ),
						'20' => esc_html__( '20 Minutes', 'ai-addons' ),
						'10' => esc_html__( '10 Minutes', 'ai-addons' ),
						'5' => esc_html__( '5 Minutes', 'ai-addons' ),
					],
					'description' 	=> __( 'Update weather report once in a hour or 10 minute once. Default will be 1 hour.', 'ai-addons'),
				]
			);
			$this->add_control(
				'weather_reset',
				[
					'type' => Controls_Manager::RAW_HTML,
					'raw' => __( 'Reset weather data. <a href="#" class="aiea-weather-reset">Reset</a><span class="ai-auto-loader"><i class="aieaicon-settings"></i></span>', 'ai-addons' ),
				]
			);		
			$this->end_controls_section();

			//Title Section
			$this->start_controls_section(
				'weather_title_section',
				[
					'label'	=> esc_html__( 'Title', 'ai-addons' ),
					'tab'	=> Controls_Manager::TAB_CONTENT,
					'description'	=> esc_html__( 'Weather title options.', 'ai-addons' ),
				]
			);
			$this->add_control(
				'enable_title',
				[
					'label' 		=> esc_html__( 'Enable Title', 'ai-addons' ),
					'type' 			=> Controls_Manager::SWITCHER,
					'default' 		=> 'yes'
				]
			);
			$this->add_control(
				'prefix_title',
				[
					'type'			=> Controls_Manager::TEXT,
					'label'			=> esc_html__( 'Title Prefix', 'ai-addons' ),
					'description' 	=> esc_html__( 'Enter some text to show on title prefix', 'ai-addons' ),
					'default'		=> esc_html__( 'Weather in', 'ai-addons' ),
					'condition' 	=> [
						'enable_title' 		=> 'yes'
					],
				]
			);
			$this->add_control(
				'enable_custom_title',
				[
					'label' 		=> esc_html__( 'Enable Title Show Custom Title', 'ai-addons' ),
					'type' 			=> Controls_Manager::SWITCHER,
					'default' 		=> 'no'
				]
			);
			$this->add_control(
				'custom_title',
				[
					'type'			=> Controls_Manager::TEXT,
					'label'			=> esc_html__( 'Custom Title', 'ai-addons' ),
					'description' 	=> esc_html__( 'Enter some text to show as a custom title', 'ai-addons' ),
					'default'		=> '',
					'condition' 	=> [
						'enable_custom_title' 		=> 'yes'
					],
				]
			);
			$this->add_control(
				'suffix_title',
				[
					'type'			=> Controls_Manager::TEXT,
					'label'			=> esc_html__( 'Title Suffix', 'ai-addons' ),
					'description' 	=> esc_html__( 'Enter some text to show on title suffix', 'ai-addons' ),
					'default'		=> '',
					'condition' 	=> [
						'enable_title' 		=> 'yes'
					],
				]
			);
			$this->end_controls_section();
			
		}else{
			//Weather Section
			$this->start_controls_section(
				'general_section',
				[
					'label'	=> esc_html__( 'Weather', 'ai-addons' ),
					'tab'	=> Controls_Manager::TAB_CONTENT
				]
			);
			$this->add_control(
				'weather_api_msg',
				[
					'type' => Controls_Manager::RAW_HTML,
					'raw' => sprintf( 'You should put Open Weather Map API key on plugin settings. <strong>%s</strong>', __( 'AI addons -> settings -> Open Weather API Key', 'ai-addons' ) ),
					'content_classes' => 'ai-elementor-warning'
				]
			);			
			$this->end_controls_section();
		}

	}

	/**
	 * Render Weather widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		extract( $settings );
		

		$api_key = aiea_addon_base()->aiea_options('open-weather-api');
		$api_version = $settings['api_version'];
		$city = $settings['city'];
		$update_cycle = isset( $settings['update_cycle'] ) ? $settings['update_cycle'] : 60;
		
		$is_edit_mode = \Elementor\Plugin::$instance->editor->is_edit_mode();

		echo '<div class="ai-weather-wrapper">';
			
			if( empty( $api_key ) ){
				echo sprintf( 'You should put Open Weather Map API key on plugin settings. <strong>%s</strong>', __( 'AI addons -> settings -> Open Weather API Key', 'ai-addons' ) );
				return;
			}
			
			if( !$city ) {
				echo sprintf( __( 'City name should not be empty or invalid. Example London,UK', 'ai-addons' ) );
				return;
			}
			
			$api_version_key = $api_version ? str_replace( ".", "", $api_version ) : '';
			$city_slug = sanitize_title( $city );
			$transient_name = sprintf( 'aiea_weather_%s_%s_%s', $api_key, $api_version_key, $city_slug );
			
			//delete_transient( $transient_name );
			
			$weather_data = get_transient( $transient_name );

			require_once ( AIEA_DIR . 'includes/base/weather/weather-handler.php' );
			
			if( ! $weather_data ) {
				
				$weather_args = [
					'api_key' => $api_key,
					'city' => $city,
					'version' => $api_version
					
				];
				$response = aiea_weather_handler()->get_weather_data( $weather_args );
				$false_html = esc_html__( 'Open Weather Map data fetching problem.. Check settings..', 'ai-addons' );
				if( isset( $response['status'] ) && $response['status'] == 'success' ) {
					$expire_time = MINUTE_IN_SECONDS * absint( $update_cycle );
					$weather_data = $response['data'];
					if( $weather_data && ( ( isset( $weather_data['cod'] ) && $weather_data['cod'] == '200' ) || isset( $weather_data['current'] ) ) ) {
						set_transient( $transient_name, $weather_data, $expire_time );
						$this->render_weather_layout( $weather_data, $settings );
					} else {
						if( $is_edit_mode ) echo sprintf( '%s', esc_html( $false_html ) );
					}
				} else {
					if( $is_edit_mode ) echo sprintf( '%s', esc_html( $false_html ) );
				}
			} else {
				$this->render_weather_layout( $weather_data, $settings );
			}

		echo '</div><!-- .weather-wrapper -->';

	}
	
	public function render_weather_layout( $weather_data, $settings ) {
				
		if( $weather_data && ( ( isset( $weather_data['cod'] ) && $weather_data['cod'] == '200' ) || isset( $weather_data['current'] ) ) ) {
			
			// weather title
			$this->render_weather_title( $settings );
			
			if( isset( $weather_data['weather'] ) ) {

				$w = $weather_data['weather'];
				$m = $weather_data['main'];
				$wind = $weather_data['wind'];
				
				$w_title = $w[0]['main'];
				$w_desc = $w[0]['description'];
				$w_icon = $w[0]['icon'];
				$temp_c = $m['temp'];
				$temp_h = $m['humidity'];
				$wind_speed = $wind['speed'];
				
				$celsius = $temp_c ? round( $temp_c ) : '';
				$fahrenheit = round( ( $temp_c * 9/5 ) + 32 );
				$wind_speed = $wind_speed ? round( ( $wind_speed * 60 * 60 ) / 1000 ) : '';
				$icon_url = aiea_weather_handler()->get_weather_icons( $w_icon );
			?>	
				
				<div class="aiea-weather-wrap">
					<div class="aiea-weather-base">
						<div class="aiea-weather-icon">
							<img src="<?php echo esc_url( AIEA_URL .'/includes/base/weather/icons/'. $icon_url ); ?>" alt="<?php echo esc_attr( $w_title ); ?>" />
						</div>
						<div class="aiea-weather-temp">
							<div class="aiea-weather-temp-number">
								<span class="aiea-weather-temp-celsius"><?php echo esc_html( $celsius ); ?></span>
								<span class="aiea-weather-temp-fahrenheit"><?php echo esc_html( $fahrenheit ); ?></span>
							</div>
							<div class="aiea-weather-temp-buttons">
								<span class="wob-celsius">°C</span>
								<span class="wob-fahrenheit" >°F</span>
							</div>						
						</div>
						<ul class="aiea-weather-temp-data">
							<li><span><?php echo esc_html__( 'Humidity', 'ai-addons' ); ?></span><span><?php printf( '%s&percnt;', $temp_h ); ?></span></li>
							<li><span><?php echo esc_html__( 'Wind', 'ai-addons' ); ?></span><span><?php printf( '%s km/h', $wind_speed ); ?></span></li>
						</ul>
					</div>
				</div>
			<?php
			} elseif( isset( $weather_data['current'] ) ) {
				
				$w = $weather_data['current'];
				
				$w_title = $w['weather'][0]['main'];
				$w_desc = $w['weather'][0]['description'];
				$w_icon = $w['weather'][0]['icon'];
				$temp_c = $w['temp'];
				$temp_h = $w['humidity'];
				$wind_speed = $w['wind_speed'];
				
				$celsius = $temp_c ? round( $temp_c ) : '';
				$fahrenheit = round( ( $temp_c * 9/5 ) + 32 );
				$wind_speed = $wind_speed ? round( ( $wind_speed * 60 * 60 ) / 1000 ) : '';
				$icon_url = aiea_weather_handler()->get_weather_icons( $w_icon );
			?>	
				
				<div class="aiea-weather-wrap">
					<div class="aiea-weather-base">
						<div class="aiea-weather-icon">
							<img src="<?php echo esc_url( AIEA_URL .'/includes/base/weather/icons/'. $icon_url ); ?>" alt="<?php echo esc_attr( $w_title ); ?>" />
						</div>
						<div class="aiea-weather-temp">
							<div class="aiea-weather-temp-number">
								<span class="aiea-weather-temp-celsius"><?php echo esc_html( $celsius ); ?></span>
								<span class="aiea-weather-temp-fahrenheit"><?php echo esc_html( $fahrenheit ); ?></span>
							</div>
							<div class="aiea-weather-temp-buttons">
								<span class="wob-celsius">°C</span>
								<span class="wob-fahrenheit" >°F</span>
							</div>						
						</div>
						<ul class="aiea-weather-temp-data">
							<li><span><?php echo esc_html__( 'Humidity', 'ai-addons' ); ?></span><span><?php printf( '%s&percnt;', $temp_h ); ?></span></li>
							<li><span><?php echo esc_html__( 'Wind', 'ai-addons' ); ?></span><span><?php printf( '%s km/h', $wind_speed ); ?></span></li>
						</ul>
					</div>
					<!--<div class="aiea-weather-daily-data">
						<div class="aiea-weather-daily-header">
						
						</div>
					</div> -->
				</div>
			<?php
			}
			
		} 
		
	}
	
	public function render_weather_title( $settings ) {
		
		$area_name = $settings['city'];
				
		$enable_title = $settings['enable_title'];
		if( $enable_title == 'yes' ) {
			$enable_cus_title = $settings['enable_custom_title'];
			if( $enable_cus_title == 'yes' ) {
				$area_name = $settings['custom_title'] ? $settings['custom_title'] : $area_name;
			}
			
			if( $settings['prefix_title'] ) {
				$area_name = '<span class="aiea-weather-prefix-title">'. esc_html( $settings['prefix_title'] ) .'</span>'. $area_name;
			}
			
			if( $settings['suffix_title'] ) {
				$area_name = $area_name .'<span class="aiea-weather-suffix-title">'. esc_html( $settings['suffix_title'] ) .'</span>';
			}
			
			echo '<div class="aiea-weather-name">'. $area_name .'</div>';
		}
		
	}
	
}