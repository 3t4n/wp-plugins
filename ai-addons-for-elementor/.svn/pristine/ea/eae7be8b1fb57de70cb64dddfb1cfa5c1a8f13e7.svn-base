<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * AI Addons AI Content 
 *
 * @since 1.0.0
 */
 
class AIEA_Elementor_AI_Content_Widget extends Widget_Base {
	
	/**
	 * Get widget name.
	 *
	 * Retrieve AI Content name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'ai-content';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve AI Content title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'AI Content', 'ai-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve AI Content icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'ai-default-icon '. aiea_addon_base()->widget_icon_classes('ai-content');
	}


	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the AI Content widget belongs to.
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
		return [ 'ai-front-end'  ];
	}
	
	public function get_style_depends() {
		return [ 'themify-icons', 'bootstrap-icons' ];
	}
	
	public function get_help_url() {
        return 'https://aiaddons.ai/ai-content/';
    }

	/**
	 * Register AI Content widget controls. 
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		//AI Section
		$this->start_controls_section(
			'aiea_section',
			[
				'label'	=> esc_html__( 'AI', 'ai-addons' ),
				'tab'	=> Controls_Manager::TAB_CONTENT,
			]
		);
		// Openai part
		$openaiea_api_key = aiea_addon_base()->aiea_options('openai-api');
		if( !$openaiea_api_key ) {
			$this->add_control(
				'aiea_msg',
				[
					'type' => Controls_Manager::RAW_HTML,
					'raw' => sprintf( 'You should put OpenAI api key on plugin settings. <strong>%s</strong>', __( 'AI addons -> settings -> OpenAI API Key', 'ai-addons' ) ),
					'content_classes' => 'ai-elementor-warning',
				]
			);
		} else {
			$this->add_control(
				'aiea_content_box',
				[
					'type'			=> 'aiea_prompt',
					'label' 		=> esc_html__( 'Enter anything', 'rc-custom' ),
					'btn_txt'		=> esc_html__( 'Search', 'ai-addons' ),
					'loading_text'	=> esc_html__( 'Loading..', 'ai-addons' ),
					'default'		=> '',
					'description'	=> __( 'Example 1: 50 words about space <br>Example 2: 50 words about space in french', 'ai-addons' ),
				]
			);
		}
		$this->add_control(
			'aiea_content',
			[
				'label'			=> esc_html__( 'AI Content', 'ai-addons' ),
				'type'			=> Controls_Manager::WYSIWYG,
				'default'		=> aiea_addon_base()->make_default_content('ai-content'),
				'description' 	=> __( 'Create api key in OpenAI account <a href="https://platform.openai.com/account/api-keys" target="_blank">Create OpenAI API</a>', 'ai-addons'),
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
		
	}

	/**
	 * Render AI Content widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		extract( $settings );
			
		$aiea_content = isset( $aiea_content ) ? $aiea_content : '';
		
		echo '<div class="ai-content-wrapper">';
			echo '<div class="ai-content-inner">';
				
				if( $aiea_content ){
					echo '<div class="ai-content">'. wp_kses_post( $aiea_content ) .'</div><!-- .ai-content -->';
				}
				
			echo '</div><!-- .ai-toggle-content-inner -->';
		echo '</div><!-- .ai-toggle-content-wrapper -->';

	}
		
}