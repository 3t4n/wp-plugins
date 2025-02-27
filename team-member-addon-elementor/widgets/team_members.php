<?php

class Elementor_team_members_Widget extends \Elementor\Widget_Base {

    public function get_name() {
		return 'teams_widget';
	}

	public function get_title() {
		return esc_html__( 'Team Member', 'elementor-team' );
	}

	public function get_icon() {
		return 'eicon-lock-user';
	}

	public function get_custom_help_url() {
		return 'https://go.elementor.com/widget-name';
	}

	public function get_categories() {
		return [ 'elementor-team-addon-category' ];
	}

	public function get_keywords() {
		return [ 'team', 'heading' ];
	}

    protected function register_controls(){

        $this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'elementor-team' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// team layout select 
		// team layout select 

		$this->add_control(
			'teams_layouts',
			[
				'label' => esc_html__( 'Team Layout Style', 'elementor-team' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'team_layout1',
				'options' => [
					'team_layout1' => esc_html__( 'Team Layout 1', 'elementor-team' ),
					'team_layout2' => esc_html__( 'Team Layout 2', 'elementor-team' ),
					'team_layout3' => esc_html__( 'Team Layout 3', 'elementor-team' ),
					'team_layout4' => esc_html__( 'Team Layout 4', 'elementor-team' ),
					'team_layout5' => esc_html__( 'Team Layout 5', 'elementor-team' ),
					'team_layout6' => esc_html__( 'Team Layout 6', 'elementor-team' ),
					'team_layout7' => esc_html__( 'Team Layout 7', 'elementor-team' ),
					'team_layout8' => esc_html__( 'Team Layout 8', 'elementor-team' ),
					
				],
			]
		);


		// team images 

		$this->add_control(
			'teams_image',
			[
				'label' => esc_html__( 'Choose Team Image', 'elementor-team' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				
				],
			]
		);

		// Member Name
		$this->add_control(
			'member_name',
			[
				'label' => esc_html__( 'Member Name', 'elementor-team' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'MD Farhad', 'elementor-team' ),
				'placeholder' => esc_html__( 'Type your Name here', 'elementor-team' ),
				'label_block' => true,
				'separator' => 'before'
			]
		);

		// Section Description
		$this->add_control(
			'member_profession',
			[
				'label' => esc_html__( 'Member Profession', 'elementor-team' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Web Developer', 'elementor-team' ),
				'placeholder' => esc_html__( 'Type your Profession here', 'elementor-team' ),
				'label_block' => true,
				'separator' => 'before'
			]
		);

		// social icons 
		// social icons 

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'social_icon_name', [
				'label' => esc_html__( 'Type Here Icon Name', 'elementor-team' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Facebook' , 'elementor-team' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'social_icon',
			[
				'label' => esc_html__( 'Add Social Icon', 'elementor-team' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
					'label_block' => true,
				],
			]
		);

		$repeater->add_control(
			'member_social_link',
			[
				'label' => esc_html__( 'Social Link', 'elementor-team' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'elementor-team' ),
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);
		

		$this->add_control(
			'member_social_list',
			[
				'label' => esc_html__( 'Add Social Icon', 'elementor-team' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ social_icon_name }}}',
			]
		);
		
        $this->end_controls_section();

        // team member stylesheet 
        // team member stylesheet 

		$this->start_controls_section(
			'member_con_sec',
			[
				'label' => esc_html__( 'Content Section', 'elementor-team' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// member Title
	

		$this->add_control(
			'member_titles_sty',
			[
				'label' => esc_html__( 'Member Name Section', 'elementor-team'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'team_title_color',
			[
				'label' => esc_html__( 'Color', 'elementor-team' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team_titls' => 'color: {{VALUE}}',
					'label_block' => true,
				'separator' => 'before'
				],
				
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .team_titls',
				'label_block' => true,
			]
		);


		// member Description
	

		$this->add_control(
			'member_desc_sty',
			[
				'label' => esc_html__( 'Member Description Section', 'elementor-team'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'team_dec_color',
			[
				'label' => esc_html__( 'Color', 'elementor-team' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team_desc' => 'color: {{VALUE}}',
					'label_block' => true,
					'separator' => 'before'
				
				],
				
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_desc_typography',
				'selector' => '{{WRAPPER}} .team_desc',
				'label_block' => true,
			]
		);


		$this->end_controls_section();


		// social icons css 

		$this->start_controls_section(
			'member_socials_iconss',
			[
				'label' => esc_html__( 'Social Icon Section', 'elementor-team' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'style_tabs'
		);

		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'elementor-team' ),
			]
		);

		$this->add_control(
			'sub_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .our-team .social li a' => 'color: {{VALUE}};',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => esc_html__( 'Background', 'plugin-name' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .our-team .social li a',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				],
			]
		);



		$this->end_controls_tab();

		// hover style 
		
		
		$this->start_controls_tab(
			'style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'elementor-team' ),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => esc_html__( 'Background', 'plugin-name' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .our-team .social li a',
			]
		);


		$this->end_controls_tab();
		



		$this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
		$teams_layouts 		= $settings['teams_layouts'];
		$teams_image 		= $settings['teams_image'];
		$member_name 		= $settings['member_name'];
		$member_profession  = $settings['member_profession'];
		$member_social_list = $settings['member_social_list'];
		
	
		switch ($teams_layouts) {
			case "team_layout1":
				include( __DIR__ . '/parts/team_layout1.php' );
			break;

			case "team_layout2":
				include( __DIR__ . '/parts/team_layout2.php' );
			break;

			case "team_layout3":
				include( __DIR__ . '/parts/team_layout3.php' );
			break;

			case "team_layout4":
				include( __DIR__ . '/parts/team_layout4.php' );
			break; 
			
			case "team_layout5":
				include( __DIR__ . '/parts/team_layout5.php' );
			break; 

			case "team_layout6":
				include( __DIR__ . '/parts/team_layout6.php' );
			break;
			
			case "team_layout7":
				include( __DIR__ . '/parts/team_layout7.php' );
			break; 

			case "team_layout8":
				include( __DIR__ . '/parts/team_layout8.php' );
			break; 

			default:
				include( __DIR__ . '/parts/team_layout1.php' );
		  }	


    }
}
