<?php
 use \Elementor\Controls_Manager;
 use \Elementor\Group_Control_Background;
 use \Elementor\Group_Control_Typography;
 use \Elementor\Group_Control_Border;
 use \Elementor\Icons_Manager;
 use \Elementor\Widget_Base;
 use \Elementor\Repeater;
 use \Elementor\Utils;
 
 if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class Profile_Widget
 */

class Profile_Widget_WP extends Widget_Base {

    public function get_name() {
        return 'wpdeen-profile-widget';
    }

    public function get_title() {
        return esc_html__( 'Deen Author Profile Widget', 'deen-author-profile-widget' );
    }

    public function get_icon() {
        return 'wpdeen-icon eicon-user-circle-o';
    }

    public function get_categories() {
        return ['wpdeen_profile_category'];
    }

    public function get_keywords() {
        return [ 'profile', 'widget' , 'wpdeen', 'author' ];
    }

    public function wpdeen_allowed_tags() {
        
        $wpdeen_allowed_html_tags = array(
            'a' => array(
                'class' => array(),
                'href'  => array(),
                'rel'   => array(),
                'title' => array(),
            ),
            'abbr' => array(
                'title' => array(),
            ),
            'b' => array(),
            'blockquote' => array(
                'cite'  => array(),
            ),
            'cite' => array(
                'title' => array(),
            ),
            'code' => array(),
            'del' => array(
                'datetime' => array(),
                'title' => array(),
            ),
            'dd' => array(),
            'div' => array(
                'class' => array(),
                'title' => array(),
                'style' => array(),
            ),
            'dl' => array(),
            'dt' => array(),
            'em' => array(),
            'h1' => array(),
            'h2' => array(),
            'h3' => array(),
            'h4' => array(),
            'h5' => array(),
            'h6' => array(),
            'i' => array(),
            'img' => array(
                'alt'    => array(),
                'class'  => array(),
                'height' => array(),
                'src'    => array(),
                'width'  => array(),
            ),
            'li' => array(
                'class' => array(),
            ),
            'ol' => array(
                'class' => array(),
            ),
            'p' => array(
                'class' => array(),
            ),
            'q' => array(
                'cite' => array(),
                'title' => array(),
            ),
            'span' => array(
                'class' => array(),
                'title' => array(),
                'style' => array(),
            ),
            'strike' => array(),
            'strong' => array(),
            'ul' => array(
                'class' => array(),
            ),
        );
        
        return $wpdeen_allowed_html_tags;
    }

    protected function register_controls() {

        $this->start_controls_section(
            'wpdeen_body_control_section',
            [
                'label' => 'Header',
                'tab' =>  Controls_Manager::TAB_CONTENT
            ]
        );

        $this->add_control(
			'wpdeen_profile_image',
			[
				'label' => esc_html__( 'Profile Image', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

        $this->add_control(
			'wpdeen_profile_display_badge',
			[
				'label' => esc_html__( 'Display Badge', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'deen-author-profile-widget' ),
				'label_off' => esc_html__( 'Hide', 'deen-author-profile-widget' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

        $this->add_control(
			'wpdeen_author_name',
			[
				'label' => esc_html__( 'Author Name', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::TEXT,
				'default' => esc_html__( 'John Doe', 'deen-author-profile-widget' ),
			]
		);

		$this->add_control(
			'wpdeen_author_name_html_tags',
			[
				'label' => esc_html__( 'Author Name Tag', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'div' => 'div',
					'span' => 'span',
					'p' => 'p',
				],
				'default' => 'h2',
			]
		);

        $this->add_control(
			'wpdeen_author_description',
			[
				'label' => esc_html__( 'Author Tagline', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::TEXTAREA,
				'rows' => 5,
				'default' => esc_html__( 'Enter author tagline', 'deen-author-profile-widget' ),
			]
		);

        $this->add_control(
			'wpdeen_user_profile_rating',
			[
				'label' => esc_html__( 'Rating', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::HEADING,
				'separator' => 'before'
				
			]
		);

        $this->add_control(
			'wpdeen_show_profile_rating',
			[
				'label' => esc_html__( 'Profile Rating', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'deen-author-profile-widget' ),
				'label_off' => esc_html__( 'Hide', 'deen-author-profile-widget' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

        $this->add_control(
			'wpdeen_rating_counter',
			[
				'label' => esc_html__( 'Rating', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 5,
				'step' => .5,
				'default' => 5,
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'wpdeen_show_profile_rating',
                            'operator' => '===',
                            'value' => 'yes',
                        ],
                    ],
                ],
			]
		);

        $this->add_control(
			'wpdeen_rating_text',
			[
				'label' => esc_html__( 'Total Rating Count', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::TEXT,
				'default' => esc_html__( '(50 Reviews)', 'deen-author-profile-widget' ),
				'placeholder' => esc_html__( 'Type your title here', 'deen-author-profile-widget' ),
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'wpdeen_show_profile_rating',
                            'operator' => '===',
                            'value' => 'yes',
                        ],
                    ],
                ],
				'label_block' => true, 
				'separator' => 'before'
			]
		);

		$this->add_control(
			'wpdeen_user_profile_rat_profile_alignment_control',
			[
				'label' => esc_html__( 'Alginment', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'deen-author-profile-widget' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'deen-author-profile-widget' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'deen-author-profile-widget' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'separator' => 'before',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .wpdeen-profile-img-block' => 'text-align: {{VALUE}} !important;',
					'{{WRAPPER}} .wpdeen-profile-info' => 'text-align: {{VALUE}} !important;',
					'{{WRAPPER}} .wpdeen-profile-rating' => 'text-align: {{VALUE}} !important;',
				],
			]
		);

		$this->add_control(
			'wpdeen_user_divider_heading',
			[
				'label' => esc_html__( 'Divider', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'wpdeen_user_divider',
			[
				'label' => esc_html__( 'Divider', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'deen-author-profile-widget' ),
				'label_off' => esc_html__( 'Hide', 'deen-author-profile-widget' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

        $this->add_control(
			'wpdeen_user_profile_cta',
			[
				'label' => esc_html__( 'CTA', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_control(
			'wpdeen_profile_primary_cta',
			[
				'label' => esc_html__( 'Primary', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'deen-author-profile-widget' ),
				'label_off' => esc_html__( 'Hide', 'deen-author-profile-widget' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

        $this->add_control(
			'wpdeen_profile_primary_cta_text',
			[
				'label' => esc_html__( 'Text', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::TEXT,
				'default' => esc_html__( 'Contact Me', 'deen-author-profile-widget' ),
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'wpdeen_profile_primary_cta',
                            'operator' => '===',
                            'value' => 'yes',
                        ],
                    ],
                ],
			]
		);

        $this->add_control(
			'wpdeen_profile_primary_cta_url',
			[
				'label' => esc_html__( 'Link', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
				],
				'dynamic' => [
					'active' => true,
				],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'wpdeen_profile_primary_cta',
                            'operator' => '===',
                            'value' => 'yes',
                        ],
                    ],
                ],
				'label_block' => true,

			]
		);

        $this->add_control(
			'wpdeen_profile_secondary_cta',
			[
				'label' => esc_html__( 'Secondary', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'deen-author-profile-widget' ),
				'label_off' => esc_html__( 'Hide', 'deen-author-profile-widget' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

        $this->add_control(
			'wpdeen_profile_secondary_cta_text',
			[
				'label' => esc_html__( 'Text', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::TEXT,
				'default' => esc_html__( 'Get a Quote', 'deen-author-profile-widget' ),
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'wpdeen_profile_secondary_cta',
                            'operator' => '===',
                            'value' => 'yes',
                        ],
                    ],
                ],
			]
		);

        $this->add_control(
			'wpdeen_profile_secondary_cta_url',
			[
				'label' => esc_html__( 'Link', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
				],
				'dynamic' => [
					'active' => true,
				],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'wpdeen_profile_secondary_cta',
                            'operator' => '===',
                            'value' => 'yes',
                        ],
                    ],
                ],
				'separator' => 'after',
				'label_block' => true,

			]
		);

		$this->add_control(
			'wpdeen_profile_widget_pro_cta_alignment',
			[
				'label' => esc_html__( 'CTA Alignment', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::CHOOSE,
				'separator' => 'before',
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'deen-author-profile-widget' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'deen-author-profile-widget' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'deen-author-profile-widget' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justify', 'deen-author-profile-widget' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'default' => 'justify',
				'separator' => 'before',
				'toggle' => true,
			]
		);

		$this->add_control(
			'wpdeen_author_long_description',
			[
				'label' => esc_html__( 'Author  Description', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::TEXTAREA,
				'rows' => 5,
				'default' => esc_html__( 'Type description here', 'deen-author-profile-widget' ),
			]
		);

        $this->add_control(
			'wpdeen_user_profile_expertise',
			[
				'label' => esc_html__( 'Expertise', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::HEADING,
				'separator' => 'before',
				
			]
		);

        $this->add_control(
			'wpdeen_user_profile_expertise_title',
			[
				'label' => esc_html__( 'Text', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::TEXT,
				'default' => esc_html__( 'Expert in:', 'deen-author-profile-widget' ),
			]
		);
        
        $repeater = new Repeater();
        
        $repeater->add_control(
            'wpdeen_list_icon',
            [
                'label' => esc_html__( 'Icon', 'deen-author-profile-widget' ),
                'type' => Controls_Manager::ICONS,
                'skin' => 'inline',
                'default' => [
                    'value' => 'fas fa-check',
                    'library' => 'fa-solid',
                ],

            ]
        );

		$repeater->add_control(
			'wpdeen_list_title',
			[
				'label' => esc_html__( 'Title', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::TEXT,
				'default' => esc_html__( 'List Title' , 'deen-author-profile-widget' ),
				'label_block' => true,
			]
		);

        $this->add_control(
			'wpdeen_expertise_list',
			[
				'label' => esc_html__( 'Repeater List', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'wpdeen_list_title' => esc_html__( 'Email Marketing', 'deen-author-profile-widget' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'deen-author-profile-widget' ),
					],
					[
						'wpdeen_list_title' => esc_html__( 'Social Media Advertising', 'deen-author-profile-widget' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'deen-author-profile-widget' ),
					],
					[
						'wpdeen_list_title' => esc_html__( 'Marketing Advice', 'deen-author-profile-widget' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'deen-author-profile-widget' ),
					],
				],
				'title_field' => '{{{ wpdeen_list_title }}}',
			]
		);

		$this->add_control(
			'wpdeen_user_profile_des_ex_alignment_control',
			[
				'label' => esc_html__( 'Alginment', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'deen-author-profile-widget' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'deen-author-profile-widget' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'deen-author-profile-widget' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'left',
				'separator' => 'before',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .wpdeen-profile-description' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'wpdeen_client_control_section',
            [
                'label' => 'Clients',
                'tab' =>  Controls_Manager::TAB_CONTENT
            ]
        );

		$this->add_control(
			'wpdeen_user_profile_show_clients_section',
			[
				'label' => esc_html__( 'Show Clients', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'deen-author-profile-widget' ),
				'label_off' => esc_html__( 'Hide', 'deen-author-profile-widget' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'wpdeen_user_profile_title_clients_section',
			[
				'label' => esc_html__( 'Title', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::TEXT,
				'default' => esc_html__( 'Among my clients:', 'deen-author-profile-widget' ),
				'placeholder' => esc_html__( 'Type your title here', 'deen-author-profile-widget' ),
			]
		);

		$clients_repeater = new Repeater();

		$clients_repeater->add_control(
			'wpdeen_user_profile_clients_brand_logo_section',
			[
				'label' => esc_html__( 'Brand Logo', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$clients_repeater->add_control(
			'wpdeen_user_profile_client_name_section',
			[
				'label' => esc_html__( 'Client Name', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'John Doe', 'deen-author-profile-widget' ),
			]
		);

		$clients_repeater->add_control(
			'wpdeen_user_profile_client_category_section',
			[
				'label' => esc_html__( 'Client Description', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Lorem ipsum dolor sit.', 'deen-author-profile-widget' ),
			]
		);

		$this->add_control(
			'wpdeen_user_profile_client_repeater_section',
			[
				'label' => esc_html__( 'Repeater List', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $clients_repeater->get_controls(),
				'default' => [
					[
						'wpdeen_user_profile_client_name_section' => esc_html__( 'John Doe', 'deen-author-profile-widget' ),
						'wpdeen_user_profile_client_category_section' => esc_html__( 'Item content. Click the edit button to change this text.', 'deen-author-profile-widget' ),
					],
					[
						'wpdeen_user_profile_client_name_section' => esc_html__( 'Jimmy Doe', 'deen-author-profile-widget' ),
						'wpdeen_user_profile_client_category_section' => esc_html__( 'Item content. Click the edit button to change this text.', 'deen-author-profile-widget' ),
					],
					[
						'wpdeen_user_profile_client_name_section' => esc_html__( 'James Doe', 'deen-author-profile-widget' ),
						'wpdeen_user_profile_client_category_section' => esc_html__( 'Item content. Click the edit button to change this text.', 'deen-author-profile-widget' ),
					],
				],
				'title_field' => '{{{ wpdeen_user_profile_client_name_section }}}',
			]
		);

		$this->add_control(
			'wpdeen_user_profile_client_alignment_control',
			[
				'label' => esc_html__( 'Alignment', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'deen-author-profile-widget' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'deen-author-profile-widget' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'deen-author-profile-widget' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'left',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .wpdeen-clients-wrap' => 'text-align: {{VALUE}};',
					'{{WRAPPER}} .wpdeen-client-group-list' => 'justify-content: {{VALUE}}; text-align: {{VALUE}}',
				],
			]
		);

        $this->end_controls_section();

		$this->start_controls_section(
            'wpdeen_skills_control_section',
            [
                'label' => 'Skills',
                'tab' =>  Controls_Manager::TAB_CONTENT
            ]
        );

		$this->add_control(
			'wpdeen_user_profile_show_skills_section',
			[
				'label' => esc_html__( 'Show Skills', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'deen-author-profile-widget' ),
				'label_off' => esc_html__( 'Hide', 'deen-author-profile-widget' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'wpdeen_user_profile_title_skill_section',
			[
				'label' => esc_html__( 'Title', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::TEXT,
				'default' => esc_html__( 'Skills:', 'deen-author-profile-widget' ),
				'placeholder' => esc_html__( 'Type your title here', 'deen-author-profile-widget' ),
			]
		);

		$this->add_control(
			'wpdeen_user_profile_skills',
			[
				'label' => esc_html__( 'Skills', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 5,
				'default' => esc_html__( 'Email Marketing, Facebook Ads, Instagram Marketing', 'deen-author-profile-widget' ),
			]
		);

		$this->add_control(
			'wpdeen_user_profile_skills_alignment_control',
			[
				'label' => esc_html__( 'Alignment', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'deen-author-profile-widget' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'deen-author-profile-widget' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'deen-author-profile-widget' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'left',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .wpdeen-skills-card' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'wpdeen_profile_widget_social_presence_tab',
			[
				'label' => esc_html__( 'Social Presence', 'deen-author-profile-widget' ),
				'tab' =>  Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'wpdeen_user_profile_show_social_presence_section',
			[
				'label' => esc_html__( 'Show Social Presence', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'deen-author-profile-widget' ),
				'label_off' => esc_html__( 'Hide', 'deen-author-profile-widget' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'wpdeen_user_profile_title_social_section',
			[
				'label' => esc_html__( 'Title', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::TEXT,
				'default' => esc_html__( 'Social Presence:', 'deen-author-profile-widget' ),
				'placeholder' => esc_html__( 'Type your title here', 'deen-author-profile-widget' ),
			]
		);
		
		$social_repeater = new Repeater();

		$social_repeater->add_control(
			'wpdeen_user_profile_social_icon',
			[
				'label' => esc_html__( 'Icon', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
			]
		);

		$social_repeater->add_control(
			'wpdeen_user_profile_social_icon_url',
			[
				'label' => esc_html__( 'Link', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
				],
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
			]
		);

		$this->add_control(
			'wpdeen_user_profile_social_repeater_section',
			[
				'label' => esc_html__( 'Repeater List', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $social_repeater->get_controls(),
				'default' => [
					[
						'wpdeen_user_profile_social_icon' => [
							'value' => 'fab fa-linkedin',
							'library' => 'fa-brands',
						],
					],
					[
						'wpdeen_user_profile_social_icon' => [
							'value' => 'fab fa-facebook',
							'library' => 'fa-brands',
						],
					],
				],
				'title_field' => '<# var migrated = "undefined" !== typeof __fa4_migrated, social = ( "undefined" === typeof social ) ? false : social; #>{{{ elementor.helpers.getSocialNetworkNameFromIcon( wpdeen_user_profile_social_icon, social, true, migrated, true ) }}}',
			]
		);

		$this->add_control(
			'wpdeen_user_profile_social_alignment_control',
			[
				'label' => esc_html__( 'Alignment', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'deen-author-profile-widget' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'deen-author-profile-widget' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'deen-author-profile-widget' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'left',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .wpdeen-social-section-title' => 'text-align: {{VALUE}};',
					'{{WRAPPER}} .wpdeen-social-list' => 'justify-content: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'wpdeen_profile_widget_education_tab',
			[
				'label' => esc_html__( 'Education', 'deen-author-profile-widget' ),
				'tab' =>  Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'wpdeen_profile_widget_show_education',
			[
				'label' => esc_html__( 'Show Education', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'deen-author-profile-widget' ),
				'label_off' => esc_html__( 'Hide', 'deen-author-profile-widget' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'wpdeen_user_profile_title_education_section',
			[
				'label' => esc_html__( 'Title', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::TEXT,
				'default' => esc_html__( 'Education:', 'deen-author-profile-widget' ),
				'placeholder' => esc_html__( 'Type your title here', 'deen-author-profile-widget' ),
			]
		);

		$education = new Repeater();

		$education->add_control(
			'wpdeen_user_profile_graduation_title_section',
			[
				'label' => esc_html__( 'Graduation Title', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Graduation Title', 'deen-author-profile-widget' ),
				'placeholder' => esc_html__( 'Type your title here', 'deen-author-profile-widget' ),
				'label_block' => true
			]
		);

		$education->add_control(
			'wpdeen_user_profile_graduation_description_section',
			[
				'label' => esc_html__( 'Graduation Description', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Graduation Description', 'deen-author-profile-widget' ),
				'placeholder' => esc_html__( 'Type your title here', 'deen-author-profile-widget' ),
				'label_block' => true
			]
		);

		$this->add_control(
			'wpdeen_user_profile_education_repeater_section',
			[
				'label' => esc_html__( 'Repeater List', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $education->get_controls(),
				'default' => [
					[
						'wpdeen_user_profile_graduation_title_section' => esc_html__( 'B.Sc. - marketingmanagement', 'deen-author-profile-widget' ),
						'wpdeen_user_profile_graduation_description_section' => esc_html__( 'odisee, Belgium, Graduated 2020', 'deen-author-profile-widget' ),
					],
					[
						'wpdeen_user_profile_graduation_title_section' => esc_html__( 'B.Sc. - mis', 'deen-author-profile-widget' ),
						'wpdeen_user_profile_graduation_description_section' => esc_html__( 'AIU, Syria, Graduated 2011', 'deen-author-profile-widget' ),
					],
				],
				'title_field' => '{{{ wpdeen_user_profile_graduation_title_section }}}',
			]
		);

		$this->add_control(
			'wpdeen_user_profile_eduction_alignment_control',
			[
				'label' => esc_html__( 'Alignment', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'deen-author-profile-widget' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'deen-author-profile-widget' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'deen-author-profile-widget' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'left',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .wpdeen-education-card' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'wpdeen_profile_widget_box_gap',
			[
				'label' => esc_html__( 'Gap', 'deen-author-profile-widget' ),
				'tab' =>  Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'wpdeen_profile_widget_box_gap_range',
			[
				'label' => esc_html__( 'Box Gap', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 24,
				],
				'selectors' => [
					'{{WRAPPER}} .box-margin-top' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

        $this->start_controls_section(
			'wpdeen_profile_widget_style_tab',
			[
				'label' => esc_html__( 'Header', 'deen-author-profile-widget' ),
				'tab' =>  Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'wpdeen_header_background',
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .wpdeen-header-wrap',
			]
		);

		$this->add_responsive_control(
			'wpdeen_header_padding',
			[
				'label' => esc_html__( 'Padding', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .wpdeen-header-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wpdeen_header_border',
				'selector' => '{{WRAPPER}} .wpdeen-header-wrap',
			]
		);

		$this->add_responsive_control(
			'wpdeen_header_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .wpdeen-header-wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'wpdeen_user_profile_author_image',
			[
				'label' => esc_html__( 'Author Image', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::HEADING,
				
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'wpdeen_user_profile_author_image_background',
				'types' => ['gradient'],
				'selector' => '{{WRAPPER}} .wpdeen-profile-img::after',
			]
		);

		$this->add_control(
			'wpdeen_user_profile_author_badge',
			[
				'label' => esc_html__( 'Author Badge', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::HEADING,
				
			]
		);

		$this->add_responsive_control(
			'wpdeen_user_profile_author_badge_icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 25,
				],
				'selectors' => [
					'{{WRAPPER}} .wpdeen-profile-badge svg' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'wpdeen_user_profile_author_badge_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpdeen-profile-badge' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'wpdeen_user_profile_author_badge_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpdeen-profile-badge svg' => 'fill: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'wpdeen_user_profile_author_name',
			[
				'label' => esc_html__( 'Author Name', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::HEADING,
				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wpdeen_author_typography',
				'selector' => '{{WRAPPER}} .wpdeen-profile-info .wpdeen-card-title',
			]
		);

        $this->add_control(
			'wpdeen_author_name_text_color',
			[
				'label' => esc_html__( 'Color', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpdeen-profile-info .wpdeen-card-title' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_responsive_control(
			'wpdeen_title_padding',
			[
				'label' => esc_html__( 'Padding', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .wpdeen-profile-info .wpdeen-card-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'wpdeen_user_profile_author_description',
			[
				'label' => esc_html__( 'Author Tagline', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::HEADING,
				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wpdeen_author_des_typography',
				'selector' => '{{WRAPPER}} .wpdeen-profile-info .wpdeen-author-description',
			]
		);

        $this->add_control(
			'wpdeen_author_des_text_color',
			[
				'label' => esc_html__( 'Color', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpdeen-profile-info .wpdeen-author-description' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_responsive_control(
			'wpdeen_description_padding',
			[
				'label' => esc_html__( 'Padding', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .wpdeen-profile-info .wpdeen-author-description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'wpdeen_user_profile_rating_heading',
			[
				'label' => esc_html__( 'Rating', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::HEADING,
				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wpdeen_rating_typography',
				'selector' => '{{WRAPPER}} .wpdeen-rating-number',
			]
		);

        $this->add_control(
			'wpdeen_profile_rating_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpdeen-rating-icon' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'wpdeen_profile_rating_color',
			[
				'label' => esc_html__( 'Rating Color', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpdeen-rating-number' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'wpdeen_user_profile_rating_gap',
			[
				'label' => esc_html__( 'Gap', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 20,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .wpdeen-first-rating' => 'padding-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpdeen_user_profile_rating_size',
			[
				'label' => esc_html__( 'Size', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 20,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}} span.wpdeen-rating-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'wpdeen_user_profile_rating_text_heading',
			[
				'label' => esc_html__( 'Rating Text', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::HEADING,
				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wpdeen_rating_text_typography',
				'selector' => '{{WRAPPER}} .wpdeen-rating-text',
			]
		);

        $this->add_control(
			'wpdeen_profile_rating_text_color',
			[
				'label' => esc_html__( 'Text Color', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpdeen-rating-text' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'wpdeen_divider_style_heading',
			[
				'label' => esc_html__( 'Divider', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::HEADING,
				'separator' => 'before',
				
			]
		);

		$this->add_control(
			'wpdeen_divider_weight',
			[
				'label' => esc_html__( 'Weight', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 1,
				],
				'selectors' => [
					'{{WRAPPER}} hr.wpdeen-divider' => 'border-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
	
		$this->add_control(
			'wpdeen_divider_color',
			[
				'label' => esc_html__( 'Color', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} hr.wpdeen-divider' => 'border-color: {{VALUE}}',
				],
			]
		);
	
		$this->add_control(
			'wpdeen_divider_border_style',
			[
				'label' => esc_html__( 'Style', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::SELECT,
				'default' => 'solid',
				'options' => [
					'solid'  => esc_html__( 'Solid', 'deen-author-profile-widget' ),
					'dashed' => esc_html__( 'Dashed', 'deen-author-profile-widget' ),
					'dotted' => esc_html__( 'Dotted', 'deen-author-profile-widget' ),
					'double' => esc_html__( 'Double', 'deen-author-profile-widget' ),
					'groove' => esc_html__( 'Groove', 'deen-author-profile-widget' ),
				],
				'selectors' => [
					'{{WRAPPER}} hr.wpdeen-divider' => 'border-style: {{VALUE}};',
				],
			]
		);
	
		$this->add_control(
			'wpdeen_divider_width',
			[
				'label' => esc_html__( 'Width', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::SLIDER,
				'size_units' => ['%'],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 100,
				],
				'selectors' => [
					'{{WRAPPER}} hr.wpdeen-divider' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'wpdeen_divider_gap',
			[
				'label' => esc_html__( 'Gap', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'default' => [
					'top' => 10,
					'right' => 0,
					'bottom' => 10,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .wpdeen-divider-wraper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
	
		$this->add_control(
			'wpdeen_divider_alignment',
			[
				'label' => esc_html__( 'Alignment', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'0 0 0 0' => [
						'title' => esc_html__( 'Left', 'deen-author-profile-widget' ),
						'icon' => 'eicon-text-align-left',
					],
					'0 auto 0 auto' => [
						'title' => esc_html__( 'Center', 'deen-author-profile-widget' ),
						'icon' => 'eicon-text-align-center',
					],
					'0 0 0 auto' => [
						'title' => esc_html__( 'Right', 'deen-author-profile-widget' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => '0 auto 0 auto',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} hr.wpdeen-divider' => 'margin: {{VALUE}};',
				],
			]
		);


        $this->add_control(
			'wpdeen_user_profile_primary_cta_heading',
			[
				'label' => esc_html__( 'Primary CTA', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wpdeen_user_profile_primary_cta_typo',
				'selector' => '{{WRAPPER}} .wpdeen-header-primary-cta',
			]
		);

		$this->add_control(
			'wpdeen_user_profile_primary_cta_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpdeen-header-primary-cta' => 'background-color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'wpdeen_user_profile_primary_cta_color',
			[
				'label' => esc_html__( 'Color', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpdeen-header-primary-cta' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_responsive_control(
			'wpdeen_user_profile_primary_cta_padding',
			[
				'label' => esc_html__( 'Padding', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .wpdeen-header-primary-cta' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wpdeen_user_profile_primary_cta_border',
				'selector' => '{{WRAPPER}} .wpdeen-header-primary-cta',
			]
		);

        $this->add_control(
			'wpdeen_user_profile_secondary_cta_heading',
			[
				'label' => esc_html__( 'Secondary CTA', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::HEADING,
				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wpdeen_user_profile_secondary_cta_typo',
				'selector' => '{{WRAPPER}} .wpdeen-header-secondary-cta',
			]
		);

		$this->add_control(
			'wpdeen_user_profile_secondary_cta_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpdeen-header-secondary-cta' => 'background-color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'wpdeen_user_profile_secondary_cta_color',
			[
				'label' => esc_html__( 'Color', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpdeen-header-secondary-cta' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_responsive_control(
			'wpdeen_user_profile_secondary_cta_padding',
			[
				'label' => esc_html__( 'Padding', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .wpdeen-header-secondary-cta' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wpdeen_user_profile_secondary_cta_border',
				'selector' => '{{WRAPPER}} .wpdeen-header-secondary-cta',
			]
		);

		$this->add_control(
			'wpdeen_user_profile_author_long_description',
			[
				'label' => esc_html__( 'Author  Description', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::HEADING,
				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wpdeen_author_long_des_typography',
				'selector' => '{{WRAPPER}} .wpdeen-profile-description .wpdeen-profile-long-description',
			]
		);

        $this->add_control(
			'wpdeen_author_long_des_text_color',
			[
				'label' => esc_html__( 'Color', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpdeen-profile-description .wpdeen-profile-long-description' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_responsive_control(
			'wpdeen_long_description_padding',
			[
				'label' => esc_html__( 'Padding', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .wpdeen-profile-description .wpdeen-profile-long-description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        
        $this->add_control(
			'wpdeen_user_profile_experts_heading',
			[
				'label' => esc_html__( 'Expert Title', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::HEADING,
				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wpdeen_user_profile_expart_title_typography',
				'selector' => '{{WRAPPER}} .wpdeen-profile-list-item .wpdeen-expert-heading',
			]
		);

        $this->add_control(
			'wpdeen_user_profile_expart_title_color',
			[
				'label' => esc_html__( 'Color', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpdeen-profile-list-item .wpdeen-expert-heading ' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_responsive_control(
			'wpdeen_user_profile_expart_title_spacing',
			[
				'label' => esc_html__( 'Spacing', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}} .wpdeen-profile-list-item .wpdeen-expert-heading' => 'padding-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'wpdeen_user_profile_experts_list_title_heading',
			[
				'label' => esc_html__( 'Expert List Title', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::HEADING,
				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wpdeen_user_profile_expart_list_title_typography',
				'selector' => '{{WRAPPER}} .wpdeen-list-item-child span.wpdeen-list-title',
			]
		);

        $this->add_control(
			'wpdeen_user_profile_expart_list_title_color',
			[
				'label' => esc_html__( 'Color', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpdeen-list-item-child span.wpdeen-list-title' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_responsive_control(
			'wpdeen_user_profile_expart_list_title_spacing',
			[
				'label' => esc_html__( 'Bottom Spacing', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .wpdeen-list-item-child:not(:last-child)' => 'padding-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'wpdeen_user_profile_experts_icon',
			[
				'label' => esc_html__( 'Expert List Icon', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::HEADING,
				
			]
		);

		$this->add_responsive_control (
			'wpdeen_user_profile_expart_icon_size',
			[
				'label' => esc_html__( 'Size', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 16,
				],
				'selectors' => [
					'{{WRAPPER}} .wpdeen-icon-box-child i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .wpdeen-icon-box-child svg' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'wpdeen_user_profile_expart_icon_color',
			[
				'label' => esc_html__( 'Color', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpdeen-icon-box-child i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .wpdeen-icon-box-child svg' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .wpdeen-icon-box-child svg path' => 'fill: {{VALUE}}',
				],
			]
		);

        $this->add_responsive_control (
			'wpdeen_user_profile_expart_icon_spacing',
			[
				'label' => esc_html__( 'Spacing', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .wpdeen-icon-box-child i' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .wpdeen-icon-box-child svg' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'wpdeen_profile_widget_client_tab',
			[
				'label' => esc_html__( 'Clients', 'deen-author-profile-widget' ),
				'tab' =>  Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'wpdeen_clients_bg_color',
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .wpdeen-clients-wrap',
			]
		);

		$this->add_responsive_control(
			'wpdeen_clients_padding',
			[
				'label' => esc_html__( 'Padding', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .wpdeen-clients-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wpdeen_clients_border',
				'selector' => '{{WRAPPER}} .wpdeen-clients-wrap',
			]
		);

		$this->add_responsive_control(
			'wpdeen_clients_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .wpdeen-clients-wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'wpdeen_client_logo',
			[
				'label' => esc_html__( 'Brand Logo', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'wpdeen_brand_logo_width',
			[
				'label' => esc_html__( 'Width', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}} .wpdeen-client-logo' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .wpdeen-client-logo img' => 'height: auto !important',
				],
			]
		);

		$this->add_responsive_control(
			'wpdeen_brand_logo_gap',
			[
				'label' => esc_html__( 'Gap', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 16,
				],
				'selectors' => [
					'{{WRAPPER}} .wpdeen-client-group div' => 'gap: {{SIZE}}{{UNIT}} !important;',
				],
			]
		);


		$this->add_control(
			'wpdeen_client_section_title',
			[
				'label' => esc_html__( 'Title', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wpdeen_client_section_title_typography',
				'selector' => '{{WRAPPER}} .wpdeen-client-section-title',
			]
		);

		$this->add_control(
			'wpdeen_client_section_title_color',
			[
				'label' => esc_html__( 'Color', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpdeen-client-section-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'wpdeen_client_name',
			[
				'label' => esc_html__( 'Name', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wpdeen_client_name_typography',
				'selector' => '{{WRAPPER}} .wpdeen-client-name',
			]
		);

		$this->add_control(
			'wpdeen_client_name_color',
			[
				'label' => esc_html__( 'Color', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpdeen-client-name' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'wpdeen_client_des',
			[
				'label' => esc_html__( 'Description', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wpdeen_client_des_typography',
				'selector' => '{{WRAPPER}} .wpdeen-client-des',
			]
		);

		$this->add_control(
			'wpdeen_client_des_color',
			[
				'label' => esc_html__( 'Color', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpdeen-client-des' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'wpdeen_client_info_vertical_align',
			[
				'label' => esc_html__( 'Verticle Position', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::CHOOSE,
				'options' => [
					'self-start' => [
						'title' => esc_html__( 'Top', 'deen-author-profile-widget' ),
						'icon' => 'eicon-v-align-top',
					],
					'center' => [
						'title' => esc_html__( 'Middle', 'deen-author-profile-widget' ),
						'icon' => 'eicon-v-align-middle',
					],
					'self-end' => [
						'title' => esc_html__( 'Bottom', 'deen-author-profile-widget' ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'default' => 'center',
				'separator' => 'before',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .wpdeen-client-info' => 'align-self: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section (
			'wpdeen_profile_widget_skills_tab',
			[
				'label' => esc_html__( 'Skills', 'deen-author-profile-widget' ),
				'tab' =>  Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'wpdeen_skills_bg_color',
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .wpdeen-skills-card',
			]
		);

		$this->add_responsive_control(
			'wpdeen_skill_padding',
			[
				'label' => esc_html__( 'Padding', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .wpdeen-skills-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wpdeen_skill_border',
				'selector' => '{{WRAPPER}} .wpdeen-skills-card',
			]
		);

		$this->add_responsive_control(
			'wpdeen_skill_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .wpdeen-skills-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'wpdeen_skill_section_title',
			[
				'label' => esc_html__( 'Title', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wpdeen_skill_section_title_typography',
				'selector' => '{{WRAPPER}} .wpdeen-skills-section-title',
			]
		);

		$this->add_control(
			'wpdeen_skill_section_title_color',
			[
				'label' => esc_html__( 'Color', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpdeen-skills-section-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'wpdeen_skill_section_title_gap',
			[
				'label' => esc_html__( 'Gap', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .wpdeen-skills-section-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'wpdeen_skill_property_title',
			[
				'label' => esc_html__( 'Skills', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wpdeen_skill_property_typography',
				'selector' => '{{WRAPPER}} .wpdeen-tag-buttons li',
			]
	   );

		$this->add_responsive_control(
			'wpdeen_skill_property_column_gap',
			[
				'label' => esc_html__( 'Column Gap', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .wpdeen-skills-card li' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpdeen_skill_property_row_gap',
			[
				'label' => esc_html__( 'Row Gap', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .wpdeen-skills-card li' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs(
			'wpdeen_skill_property_style_tabs'
		);
	
		// Normal Tab
		$this->start_controls_tab(
			'wpdeen_skill_property_style_normal',
			[
				'label' => esc_html__( 'Normal', 'deen-author-profile-widget' ),
			]
		);

		$this->add_control(
			'wpdeen_skill_property_background_color',
			[
				'label' => esc_html__( 'Background Color', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpdeen-skills-card li' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'wpdeen_skill_property_color',
			[
				'label' => esc_html__( 'Color', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpdeen-tag-buttons li' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wpdeen_skills_normal_border',
				'selector' => '{{WRAPPER}} .wpdeen-skills-card li',
			]
		);

		$this->end_controls_tab();

		// Hover tab
		$this->start_controls_tab(
			'wpdeen_skill_property_style_hover',
			[
				'label' => esc_html__( 'Hover', 'deen-author-profile-widget' ),
			]
		);

		$this->add_control(
			'wpdeen_skill_property_hover_background_color',
			[
				'label' => esc_html__( 'Background Color', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpdeen-skills-card li:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'wpdeen_skill_property_hover_color',
			[
				'label' => esc_html__( 'Color', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpdeen-tag-buttons li:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wpdeen_skills_hover_border',
				'selector' => '{{WRAPPER}} .wpdeen-skills-card li:hover',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_responsive_control(
			'margin',
			[
				'label' => esc_html__( 'Padding', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .wpdeen-skills-card li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section (
			'wpdeen_profile_widget_social_tab',
			[
				'label' => esc_html__( 'Social Presence', 'deen-author-profile-widget' ),
				'tab' =>  Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'wpdeen_social_background',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .wpdeen-social-presence-card',
			]
		);

		$this->add_responsive_control(
			'wpdeen_social_padding',
			[
				'label' => esc_html__( 'Padding', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .wpdeen-social-presence-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			 Group_Control_Border::get_type(),
			[
				'name' => 'wpdeen_social_border',
				'selector' => '{{WRAPPER}} .wpdeen-social-presence-card',
			]
		);

		$this->add_responsive_control(
			'wpdeen_social_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .wpdeen-social-presence-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'wpdeen_social_section_title',
			[
				'label' => esc_html__( 'Title', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wpdeen_social_section_title_typo',
				'selector' => '{{WRAPPER}} .wpdeen-social-section-title',
			]
		);

		$this->add_control(
			'wpdeen_social_section_title_color',
			[
				'label' => esc_html__( 'Color', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpdeen-social-section-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'wpdeen_social_section_title_gap',
			[
				'label' => esc_html__( 'Gap', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .wpdeen-social-section-title' => 'padding-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'wpdeen_social_icons_title',
			[
				'label' => esc_html__( 'Icons', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'wpdeen_social_icons_size',
			[
				'label' => esc_html__( 'Size', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .wpdeen-social-i li a i' => 'font-size: {{SIZE}}{{UNIT}} !important;',
					'{{WRAPPER}} .wpdeen-social-presence-card li a svg' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .wpdeen-social-svg li a svg' => 'width: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .wpdeen-social-svg li a i' => 'width: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .wpdeen-social-presence-card li a i' => 'height: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'wpdeen_social_icons_color',
			[
				'label' => esc_html__( 'Color', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpdeen-social-presence-card li a i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .wpdeen-social-presence-card li a svg' => 'fill: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'wpdeen_social_icons_gap',
			[
				'label' => esc_html__( 'Gap', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 16,
				],
				'selectors' => [
					'{{WRAPPER}} .wpdeen-social-list' => 'gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wpdeen_social_icons_border',
				'selector' => '{{WRAPPER}} .wpdeen-social-presence-card li a',
			]
		);

		$this->add_responsive_control(
			'wpdeen_social_icons_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .wpdeen-social-presence-card li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section (
			'wpdeen_profile_widget_graduation_tab',
			[
				'label' => esc_html__( 'Education', 'deen-author-profile-widget' ),
				'tab' =>  Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'wpdeen_education_background',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .wpdeen-education-card',
			]
		);

		$this->add_responsive_control(
			'wpdeen_education_padding',
			[
				'label' => esc_html__( 'Padding', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .wpdeen-education-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wpdeen_education_border',
				'selector' => '{{WRAPPER}} .wpdeen-education-card',
			]
		);

		$this->add_responsive_control(
			'wpdeen_education_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .wpdeen-education-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_control(
			'wpdeen_education_section_title',
			[
				'label' => esc_html__( 'Section Title', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wpdeen_education_section_title_typo',
				'selector' => '{{WRAPPER}} .wpdeen-education-section-title',
			]
		);

		$this->add_control(
			'wpdeen_education_section_title_color',
			[
				'label' => esc_html__( 'Color', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpdeen-education-section-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'wpdeen_education_section_title_gap',
			[
				'label' => esc_html__( 'Gap', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .wpdeen-education-section-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'wpdeen_education_title',
			[
				'label' => esc_html__( 'Title', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wpdeen_education_title_typo',
				'selector' => '{{WRAPPER}} .wpdeen-education-title',
			]
		);

		$this->add_control(
			'wpdeen_education_title_color',
			[
				'label' => esc_html__( 'Color', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpdeen-education-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'wpdeen_education_title_gap',
			[
				'label' => esc_html__( 'Gap', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .wpdeen-education-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'wpdeen_education_des',
			[
				'label' => esc_html__( 'Description', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wpdeen_education_des_typo',
				'selector' => '{{WRAPPER}} .wpdeen-education-des',
			]
		);

		$this->add_control(
			'wpdeen_education_des_color',
			[
				'label' => esc_html__( 'Color', 'deen-author-profile-widget' ),
				'type' =>  Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpdeen-education-des' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'wpdeen_education_des_gap',
			[
				'label' => esc_html__( 'Gap', 'deen-author-profile-widget' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .wpdeen-education-des' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

    protected function render() {
    	$settings = $this->get_settings_for_display();
    ?>
        <div class="container wpdeen-author-container">
            <!-- profile intro card  -->
            <div class="wpdeen-custom-row">
                <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="wpdeen-profile-intro">
                        <div class="card wpdeen-header-wrap">
                            <!-- profile image  -->
                            <div class="wpdeen-profile-img-block mt-2 text-center">
                                <div class="wpdeen-profile-img d-inline-block">
                                    <img src="<?php echo esc_url($settings['wpdeen_profile_image']['url']); ?>" class="wpdeen-profile-image img-fluid mx-auto d-block rounded-circle wpdeen-aspect-ratio-1 wpdeen-o-fit-cover" alt="User face">
                                    <!-- profile badge  -->
                                    <?php
                                        if( 'yes' === $settings['wpdeen_profile_display_badge'] ) {
                                    ?>
                                        <span class="wpdeen-profile-badge position-absolute">
                                            <svg viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" fill="#fff">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M8.203.432a1.891 1.891 0 0 0-2.406 0l-1.113.912a1.904 1.904 0 0 1-.783.384l-1.395.318c-.88.2-1.503.997-1.5 1.915l.007 1.456c0 .299-.065.594-.194.863L.194 7.59a1.978 1.978 0 0 0 .535 2.388l1.12.903c.231.185.417.422.543.692l.615 1.314a1.908 1.908 0 0 0 2.166 1.063l1.392-.33c.286-.068.584-.068.87 0l1.392.33a1.908 1.908 0 0 0 2.166-1.063l.615-1.314c.126-.27.312-.507.542-.692l1.121-.903c.707-.57.93-1.563.535-2.388l-.625-1.309a1.983 1.983 0 0 1-.194-.863l.006-1.456a1.947 1.947 0 0 0-1.5-1.915L10.1 1.728a1.904 1.904 0 0 1-.784-.384L8.203.432Zm2.184 5.883a.742.742 0 0 0 0-1.036.71.71 0 0 0-1.018 0L6.565 8.135 5.095 6.73a.71.71 0 0 0-1.018.032.742.742 0 0 0 .032 1.036L6.088 9.69a.71.71 0 0 0 1.001-.016l3.297-3.359Z">
                                                </path>
                                            </svg>
                                        </span>
                                    <?php
                                        }
                                    ?>                             
                                </div>
                            </div>
                            <!-- profile info  -->
                           
                            <?php
                                if( '' !== $settings['wpdeen_author_name'] || '' !== $settings['wpdeen_author_description'] ){
                            ?>
                                <div class="wpdeen-profile-info text-center mt-4">
                                    <?php
                                        if( '' !== $settings['wpdeen_author_name'] ) {
											printf('<%1$s class="wpdeen-card-title">%2$s</%1$s>', esc_html($settings['wpdeen_author_name_html_tags']), esc_html($settings['wpdeen_author_name']));
                                        }
                                    ?>
                                    <?php
                                        if( '' !== $settings['wpdeen_author_description']) {
                                    ?>
                                        <p class="wpdeen-card-text wpdeen-author-description">
                                            <?php
                                                echo esc_html($settings['wpdeen_author_description']);
                                            ?>
                                        </p> 
                                    <?php
                                        }
                                    ?>
                                </div>
                            <?php
                               }
                            ?>
                            <!-- profile rating  -->
                            <?php
                                if( '' !== $settings['wpdeen_show_profile_rating'] ){
                            ?>
                                <div class="wpdeen-profile-rating mt-3 text-center">

                                    <div class="wpdeen-first-rating">
                                        <span class="wpdeen-rating-icon">
                                            <i class="fas fa-star"></i>
                                        </span>
                                        <span class="wpdeen-rating-number">
                                            <?php echo esc_html($settings['wpdeen_rating_counter']); ?>
                                        </span>
                                        <small class="ms-2 fw-thin wpdeen-rating-text">
                                            <?php echo esc_html($settings['wpdeen_rating_text']); ?>
                                        </small>
                                    </div>

                                </div>
                            <?php
                                }
                            ?>
							
							<?php
								if( 'yes' === $settings['wpdeen_user_divider']) {
							?>
								<div class="wpdeen-divider-wraper">
									<hr class="wpdeen-divider">
								</div>
							<?php
							}
							?>
                            
                            <?php
                              if( 'yes' === $settings['wpdeen_profile_primary_cta'] || 'yes' === $settings['wpdeen_profile_secondary_cta'] ) {
                            ?>
                                <div class="my-1"></div>
                                <div class="wpdeen-call-to-action" <?php 
								if('center' === $settings['wpdeen_profile_widget_pro_cta_alignment']){
									echo esc_attr('text-center');
								}elseif('right' === $settings['wpdeen_profile_widget_pro_cta_alignment']){
									echo esc_attr('text-end');
								}
								?>>
                                    <?php
                                        if( 'yes' === $settings['wpdeen_profile_primary_cta']  && '' !== $settings['wpdeen_profile_primary_cta_text'] ) {
                                            if ( ! empty( $settings['wpdeen_profile_primary_cta_url']['url'] ) ) {
                                                $this->add_link_attributes( 'wpdeen_profile_primary_cta_url', $settings['wpdeen_profile_primary_cta_url'] );
                                            }
                                            $margin_bottom = 'mb-3';
                                            if( 'yes' !== $settings['wpdeen_profile_secondary_cta']  || '' === $settings['wpdeen_profile_secondary_cta_text'] ) {
                                                $margin_bottom = '';
                                            }
                                    ?>
                                        <a <?php echo wp_kses($this->get_render_attribute_string( 'wpdeen_profile_primary_cta_url' ), $this->wpdeen_allowed_tags()); ?> class="btn w-100 wpdeen-header-primary-cta <?php 
										if('justify' === $settings['wpdeen_profile_widget_pro_cta_alignment']){
                                            echo esc_attr(' w-100 ');
                                        }
										echo esc_attr($margin_bottom); ?>">
                                            <?php echo esc_html($settings['wpdeen_profile_primary_cta_text']); ?>
                                        </a>
                                    <?php
                                        }
                                    ?>
									<br/>
                                    <?php
                                         if( 'yes' === $settings['wpdeen_profile_secondary_cta']  && '' !== $settings['wpdeen_profile_secondary_cta_text'] ) {
                                            if ( ! empty( $settings['wpdeen_profile_secondary_cta_url']['url'] ) ) {
                                                $this->add_link_attributes( 'wpdeen_profile_secondary_cta_url', $settings['wpdeen_profile_secondary_cta_url'] );
                                            }
                                    ?>
                                        <a <?php echo wp_kses($this->get_render_attribute_string( 'wpdeen_profile_secondary_cta_url' ), $this->wpdeen_allowed_tags()); ?> class="btn w-100 wpdeen-header-secondary-cta <?php 
										if('justify' === $settings['wpdeen_profile_widget_pro_cta_alignment']){
                                            echo esc_attr(' w-100 ');
                                        }
										?>">
                                           <?php echo esc_html($settings['wpdeen_profile_secondary_cta_text']); ?>
                                        </a>
                                    <?php
                                         }
                                    ?>
                                </div>
                                <div class="my-1"></div>
                            <?php
                              }
                            ?>

							<?php
								if( 'yes' === $settings['wpdeen_user_divider']){
							?>
								<div class="wpdeen-divider-wraper">
									<hr class="wpdeen-divider">
								</div>
							<?php
							}
							?>

                            <div class="wpdeen-profile-description">
                                <?php
                                    if( '' !== $settings['wpdeen_author_long_description'] ) {
                                ?>
                                    <p class="wpdeen-profile-long-description">
                                        <?php
                                            echo esc_html($settings['wpdeen_author_long_description']);
                                        ?>
                                    </p> 
                                <?php
                                    }
                                ?>

                                <div class="wpdeen-profile-list-item">
                                    <?php
                                        if( '' !== $settings['wpdeen_user_profile_expertise_title'] ) {
                                    ?>
                                    <div class="wpdeen-list-item">
                                        <h6 class="wpdeen-profile-subheading wpdeen-expert-heading">
                                            <?php echo esc_html($settings['wpdeen_user_profile_expertise_title']); ?>
                                        </h6>
                                    </div>
                                    <?php
                                    }
                                    	if($settings['wpdeen_expertise_list']){
                                    ?>
                                    <div class="wpdeen-list-item-icon">
                                        <!-- each expartise -->
                                        <?php
                                            foreach ( $settings['wpdeen_expertise_list'] as $expartise ) {
                                        ?>
                                        <div class="wpdeen-list-item-child">
                                            <span class="wpdeen-icon-box-child">
                                                <?php Icons_Manager::render_icon( $expartise['wpdeen_list_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                            </span>
                                            <span class="wpdeen-list-title">
                                                <?php
                                                    echo esc_html($expartise['wpdeen_list_title']);
                                                ?>
                                            </span>
                                        </div>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- my client section  -->
					<?php
						if( 'yes' === $settings['wpdeen_user_profile_show_clients_section'] ){
					?>
						<div class="wpdeen-clients box-margin-top">
							<div class="card wpdeen-clients-wrap">
								<!-- card heading  -->
								<?php
								if( '' !== $settings['wpdeen_user_profile_title_clients_section'] ) {
								?>
									<h6 class="wpdeen-f-bold wpdeen-profile-subheading wpdeen-client-section-title mb-4">
										<?php echo esc_html($settings['wpdeen_user_profile_title_clients_section']); ?>
									</h6>
								<?php
								}
								?>
								<!-- client list  -->
								<?php
									if( '' !== $settings['wpdeen_user_profile_client_repeater_section'] ){
								?>
								<div class="wpdeen-client-group">
									<?php
										foreach($settings['wpdeen_user_profile_client_repeater_section']  as $wpdeen_client_repeater) {
											if( '' !== $wpdeen_client_repeater['wpdeen_user_profile_client_name_section'] || isset($wpdeen_client_repeater['wpdeen_user_profile_clients_brand_logo_section']['url']) && '' !== $wpdeen_client_repeater['wpdeen_user_profile_clients_brand_logo_section']['url'] ) {
									?>
										<div class="d-flex wpdeen-client-group-list align-items-canter gap-3">
											<div class="wpdeen-client-logo">
												<?php
												$wpdeen_client_image = $wpdeen_client_repeater['wpdeen_user_profile_clients_brand_logo_section']['url'] ?? $wpdeen_client_repeater['wpdeen_user_profile_clients_brand_logo_section'];
												if( '' !== $wpdeen_client_image ) {
												?>
													<img src="<?php  echo esc_url($wpdeen_client_image); ?>" alt="brand logo">
												<?php
												}else{
												?>
													<div class="no-brand-logo px-4"></div>
												<?php
												}
												?>
											</div>
											<div class="wpdeen-client-info">
												<div class="wpdeen-client-name wpdeen-fs-sm wpdeen-f-bold ">
													<?php echo esc_html($wpdeen_client_repeater['wpdeen_user_profile_client_name_section']); ?>
												</div>
												<div class="wpdeen-client-des wpdeen-fs-sm">
													<?php echo esc_html($wpdeen_client_repeater['wpdeen_user_profile_client_category_section']); ?>
												</div>
											</div>
										</div>
									<?php
										}
									}
									?>
								</div>
								<?php
									}
								?>
							</div>
						</div>
					<?php
						}
					?>
                    <div class="wpdeen-more-details box-margin-top">
                        <!-- skill card  -->
						<?php
							if( 'yes' === $settings['wpdeen_user_profile_show_skills_section'] ) {
						?>
							<div class="card wpdeen-skills-card">
								<!-- card heading  -->
								<?php
								if( '' !== $settings['wpdeen_user_profile_title_skill_section'] ) {
								?>
									<h6 class="wpdeen-f-bold wpdeen-skills-section-title wpdeen-profile-subheading">
										<?php echo esc_html($settings['wpdeen_user_profile_title_skill_section']); ?>
									</h6>
								<?php
								}
								?>
								<ul class="wpdeen-tag-buttons">
									<?php
									$wpdeen_get_skills = $settings['wpdeen_user_profile_skills'];
									if( '' !== $wpdeen_get_skills &&  false !== strpos($wpdeen_get_skills, ',') ) {
										$wpdeen_skills = explode(',', $wpdeen_get_skills );
										foreach($wpdeen_skills as $wpdeen_skill){
									?>
										<li>
											<?php  echo esc_html($wpdeen_skill); ?>
										</li>
									<?php
										}
									}
									?>
								</ul>
							</div>
						<?php
							}
						?>

                        <!-- social-presence card  -->
						<?php
						if( 'yes' === $settings['wpdeen_user_profile_show_social_presence_section'] ) {
						?>
							<div class="card wpdeen-social-presence-card wpdeen-social-svg wpdeen-social-i box-margin-top">
								<!-- card heading  -->
								<?php
									if( '' !== $settings['wpdeen_user_profile_title_social_section'] ) {
								?>
									<h6 class="wpdeen-f-bold wpdeen-social-section-title wpdeen-profile-subheading">
										<?php  echo esc_html($settings['wpdeen_user_profile_title_social_section']); ?>
									</h6>
								<?php
									}
								?>
								<ul class="d-flex wpdeen-social-list">
									<?php
									foreach( $settings['wpdeen_user_profile_social_repeater_section'] as $index=>$social_repeater) {
									?>
									<li class="wpdeen-platform">
									<?php
									if ( ! empty( $social_repeater['wpdeen_user_profile_social_icon_url']['url'] ) ) {
										$wpdeen_link_key= 'wpdeen_user_profile_social_icon_url_' . $index;
										$this->add_link_attributes( $wpdeen_link_key , $social_repeater['wpdeen_user_profile_social_icon_url'] );
									?>
										<a <?php echo wp_kses($this->get_render_attribute_string( $wpdeen_link_key), $this->wpdeen_allowed_tags()); ?>>
											<?php Icons_Manager::render_icon( $social_repeater['wpdeen_user_profile_social_icon'], [ 'aria-hidden' => 'true' ] ); ?>
										</a>
									</li>
									<?php
									}
									}
									?>

								</ul>
							</div>
						<?php
						}
						?>
                        <!-- Education Section -->
						<?php
						if( 'yes' === $settings['wpdeen_profile_widget_show_education'] ) {
						?>
							<div class="card wpdeen-other-card box-margin-top wpdeen-education-card">
								<?php
								if( ''  !==  $settings['wpdeen_user_profile_title_education_section'] ) {
								?>
									<h6 class="wpdeen-f-bold wpdeen-education-section-title wpdeen-profile-subheading">
										<?php echo esc_html($settings['wpdeen_user_profile_title_education_section']); ?>
									</h6>
								<?php
								}	
								?>
								<?php
								if( '' !== $settings['wpdeen_user_profile_education_repeater_section'] ) {
								?>
								<ul>
									<?php
									foreach($settings['wpdeen_user_profile_education_repeater_section'] as $education) {
									?>
										<li>
											<p class="wpdeen-education-title">
												<?php echo	esc_html($education['wpdeen_user_profile_graduation_title_section']);  ?>
											</p>
											<p class="wpdeen-co-gray wpdeen-education-des">
												<?php echo esc_html($education['wpdeen_user_profile_graduation_description_section']); ?>
											</p>
										</li>
									<?php
									}
									?>
								</ul>
								<?php
								}
								?>
							</div>
						<?php
						}
						?>
                    </div>
                </div>
            </div>
		</div>
    <?php
    }
	protected function content_template() {
	?>
		<div class="container wpdeen-author-container">
			<div class="wpdeen-custom-row">
				<div class="col-12 col-md-12 col-lg-12 col-xl-12">
					<div class="wpdeen-profile-intro">
						<div class="card wpdeen-header-wrap">
							<!-- profile image -->
							<div class="wpdeen-profile-img-block mt-2 text-center">
								<div class="wpdeen-profile-img d-inline-block">
									<img src="{{{ settings.wpdeen_profile_image.url }}}" height="150" width="150"
										class="img-fluid mx-auto d-block rounded-circle wpdeen-aspect-ratio-1 wpdeen-o-fit-cover"
										alt="User face">
									<!-- profile badge -->
									<# if ( 'yes' === settings.wpdeen_profile_display_badge ) { #>
										<span class="wpdeen-profile-badge position-absolute">
											<svg viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" fill="#fff">
												<path fill-rule="evenodd" clip-rule="evenodd" d="M8.203.432a1.891 1.891 0 0 0-2.406 0l-1.113.912a1.904 1.904 0 0 1-.783.384l-1.395.318c-.88.2-1.503.997-1.5 1.915l.007 1.456c0 .299-.065.594-.194.863L.194 7.59a1.978 1.978 0 0 0 .535 2.388l1.12.903c.231.185.417.422.543.692l.615 1.314a1.908 1.908 0 0 0 2.166 1.063l1.392-.33c.286-.068.584-.068.87 0l1.392.33a1.908 1.908 0 0 0 2.166-1.063l.615-1.314c.126-.27.312-.507.542-.692l1.121-.903c.707-.57.93-1.563.535-2.388l-.625-1.309a1.983 1.983 0 0 1-.194-.863l.006-1.456a1.947 1.947 0 0 0-1.5-1.915L10.1 1.728a1.904 1.904 0 0 1-.784-.384L8.203.432Zm2.184 5.883a.742.742 0 0 0 0-1.036.71.71 0 0 0-1.018 0L6.565 8.135 5.095 6.73a.71.71 0 0 0-1.018.032.742.742 0 0 0 .032 1.036L6.088 9.69a.71.71 0 0 0 1.001-.016l3.297-3.359Z">
												</path>
											</svg>
										</span>
									<# } #>
								</div>
							</div>
							<!-- profile info -->
							<# if ( '' !== settings.wpdeen_author_name || '' !== settings.wpdeen_author_description ) { #>
								<div class="wpdeen-profile-info text-center mt-4">
									<# if ( '' !== settings.wpdeen_author_name ) { #>
										<{{{ settings.wpdeen_author_name_html_tags }}} class="wpdeen-card-title">{{{ settings.wpdeen_author_name }}}</{{{ settings.wpdeen_author_name_html_tags }}}>
									<# } #>
									<# if ( '' !== settings.wpdeen_author_description ) { #>
										<p class="wpdeen-card-text wpdeen-author-description">{{{ settings.wpdeen_author_description }}}</p>
									<# } #>
								</div>
							<# } #>
							<!-- profile rating -->
							<# if ( '' !== settings.wpdeen_show_profile_rating ) { #>
								<div class="wpdeen-profile-rating mt-3 text-center">
									<div class="wpdeen-first-rating">
										<span class="wpdeen-rating-icon">
											<i class="fas fa-star"></i>
										</span>
										<span class="wpdeen-rating-number">{{{ settings.wpdeen_rating_counter }}}</span>
										<small class="ms-2 fw-thin wpdeen-rating-text">{{{ settings.wpdeen_rating_text }}}</small>
									</div>
								</div>
							<# } #>
							<!-- Call to action buttons -->
							<# 
								if ( 'yes' === settings.wpdeen_user_divider) {
							#>
								<div class="wpdeen-divider-wraper">
									<hr class="wpdeen-divider">
								</div>
							<#
								} 
							#>
							<# if ( 'yes' === settings.wpdeen_profile_primary_cta ||  'yes' === settings.wpdeen_profile_secondary_cta) { #>
								<#
                                    let ctaAlignment = 'text-start'
                                    if ('center' === settings.wpdeen_profile_widget_pro_cta_alignment) {
                                        ctaAlignment = 'text-center'
                                    } else if ('right' === settings.wpdeen_profile_widget_pro_cta_alignment) { 
                                        ctaAlignment = 'text-end'
                                    }
									
									let ctaWidth = '';
									if ('justify' === settings.wpdeen_profile_widget_pro_cta_alignment) {
                                        ctaWidth = 'w-100';
                                    }
                                #>
								<div class="my-1"></div>
								<div class="wpdeen-call-to-action {{ ctaAlignment }}">
									<!-- Primary CTA -->
									<# 
									if ( 'yes' === settings.wpdeen_profile_primary_cta && '' !== settings.wpdeen_profile_primary_cta_text ) {
									var margin_bottom = 'mb-3';
									if ( 'yes' !== settings.wpdeen_profile_secondary_cta || '' === settings.wpdeen_profile_secondary_cta_text ) {
										margin_bottom = '';
									}
									#>
										<a class="btn {{ ctaWidth }} wpdeen-header-primary-cta {{ margin_bottom }}" href="{{{ settings.wpdeen_profile_primary_cta_url.url }}}">
											{{{ settings.wpdeen_profile_primary_cta_text }}}
										</a>
									<# } #>
									<br/>
									<!-- Secondary CTA -->
									<# if ( 'yes' === settings.wpdeen_profile_secondary_cta && '' !== settings.wpdeen_profile_secondary_cta_text ) { #>
										<a class="btn {{ ctaWidth }} wpdeen-header-secondary-cta" href="{{{ settings.wpdeen_profile_secondary_cta_url.url }}}">
											{{{ settings.wpdeen_profile_secondary_cta_text }}}
										</a>
									<# } #>
								</div>
								<div class="my-1"></div>
							<# } #>
							<# 
								if ( 'yes' === settings.wpdeen_user_divider) {
							#>
								<div class="wpdeen-divider-wraper">
									<hr class="wpdeen-divider">
								</div>
							<#
								} 
							#>
							<!-- Profile Description -->
							<div class="wpdeen-profile-description">
								<# if ( '' !== settings.wpdeen_author_long_description ) { #>
									<p class="wpdeen-profile-long-description">{{{ settings.wpdeen_author_long_description }}}</p>
								<# } #>
								<!-- Profile List Item -->
								<div class="wpdeen-profile-list-item">
									<# if ( '' !== settings.wpdeen_user_profile_expertise_title ) { #>
										<div class="wpdeen-list-item">
											<h6 class="wpdeen-profile-subheading wpdeen-expert-heading">{{{ settings.wpdeen_user_profile_expertise_title }}}</h6>
										</div>
									<# } #>
									<# if (settings.wpdeen_expertise_list.length) { #>
										<div class="wpdeen-list-item-icon">
											<!-- Each expertise -->
											<# _.each(settings.wpdeen_expertise_list, function(expertise) { 
											var expertIcon = elementor.helpers.renderIcon( view, expertise.wpdeen_list_icon, { 'aria-hidden': true }, 'i' , 'object' );	
											#>
												<div class="wpdeen-list-item-child">
													<span class="wpdeen-icon-box-child">
														{{{ expertIcon.value }}}
													</span>
													<span class="wpdeen-list-title">{{{ expertise.wpdeen_list_title }}}</span>
												</div>
											<# }); #>
										</div>
									<# } #>
								</div>
							</div>
						</div>
					</div>
					<# if ( 'yes' === settings.wpdeen_user_profile_show_clients_section ) { #>
						<div class="wpdeen-clients box-margin-top">
							<div class="card wpdeen-clients-wrap">
								<!-- card heading -->
								<# if ( '' !== settings.wpdeen_user_profile_title_clients_section) { #>
									<h6 class="wpdeen-f-bold wpdeen-profile-subheading wpdeen-client-section-title mb-4">
										{{{ settings.wpdeen_user_profile_title_clients_section }}}
									</h6>
								<# } #>
								<!-- client list -->
								<#
									if ( '' !== settings.wp_user_profile_client_repeater_section ) {
								#>
									<div class="wpdeen-client-group">
										<#
										_.each( settings.wpdeen_user_profile_client_repeater_section, function( wpdeen_client_repeater ) {
											if ( '' !== wpdeen_client_repeater.wpdeen_user_profile_client_name_section || ( wpdeen_client_repeater.wpdeen_user_profile_clients_brand_logo_section.url && '' !== wpdeen_client_repeater.wpdeen_user_profile_clients_brand_logo_section.url ) ) {
											#>
												<div class="d-flex wpdeen-client-group-list align-items-canter gap-3">
													<div class="wpdeen-client-logo">
														<#
															var wpdeen_client_image = wpdeen_client_repeater.wpdeen_user_profile_clients_brand_logo_section.url || wpdeen_client_repeater.wpdeen_user_profile_clients_brand_logo_section;
															if (wpdeen_client_image !== "") {
														#>
															<img src="{{ wpdeen_client_image }}" alt="brand logo">
														<# } else { #>
															<div class="no-brand-logo px-4"></div>
														<# } #>
													</div>
													<div class="wpdeen-client-info">
														<div class="wpdeen-client-name wpdeen-fs-sm wpdeen-f-bold ">
															{{{ wpdeen_client_repeater.wpdeen_user_profile_client_name_section }}}
														</div>
														<div class="wpdeen-client-des wpdeen-fs-sm">
															{{{ wpdeen_client_repeater.wpdeen_user_profile_client_category_section }}}
														</div>
													</div>
												</div>
											<#
											}
										});
										#>
									</div>
								<#
								}
								#>
							</div>
						</div>
					<# } #>
					<div class="wpdeen-more-details box-margin-top">
						<# if ( 'yes' === settings.wpdeen_user_profile_show_skills_section ) { #>
							<div class="card wpdeen-skills-card">
								<!-- card heading -->
								<# if ( '' !==  settings.wpdeen_user_profile_title_skill_section) { #>
									<h6 class="wpdeen-f-bold wpdeen-skills-section-title wpdeen-profile-subheading">
										{{{ settings.wpdeen_user_profile_title_skill_section }}}
									</h6>
								<# } #>
								<ul class="wpdeen-tag-buttons">
									<# if ( '' !== settings.wpdeen_user_profile_skills && false !== settings.wpdeen_user_profile_skills.indexOf(',') ) { #>
										<# _.each(settings.wpdeen_user_profile_skills.split(','), function(wp_skill) { #>
											<li>{{{ wp_skill }}}</li>
										<# }); #>
									<# } #>
								</ul>
							</div>
						<# } #>

						<# if ( 'yes' ===  settings.wpdeen_user_profile_show_social_presence_section ) { #>
							<div class="card wpdeen-social-presence-card wpdeen-social-svg wpdeen-social-i box-margin-top">
								<!-- card heading -->
								<# if ( '' !== settings.wpdeen_user_profile_title_social_section ) { #>
									<h6 class="wpdeen-f-bold wpdeen-social-section-title wpdeen-profile-subheading">
										{{{ settings.wpdeen_user_profile_title_social_section }}}
									</h6>
								<# } #>
								<ul class="d-flex wpdeen-social-list">
									<# if (settings.wpdeen_user_profile_social_repeater_section && settings.wpdeen_user_profile_social_repeater_section.length) { #>
										<# _.each(settings.wpdeen_user_profile_social_repeater_section, function(social_repeater) { #>
											<li class="wpdeen-platform">
												<# 
												var socialIcon = elementor.helpers.renderIcon( view, social_repeater.wpdeen_user_profile_social_icon, { 'aria-hidden': true }, 'i' , 'object' );
												#>
													<a href="{{ social_repeater.wpdeen_user_profile_social_icon_url.url }}">
														{{{ socialIcon.value }}}
													</a>
											</li>
										<# }); #>
									<# } #>
								</ul>
							</div>
						<# } #>

						<# if ( 'yes' === settings.wpdeen_profile_widget_show_education ) { #>
							<div class="card wpdeen-other-card box-margin-top wpdeen-education-card">
								<# if ( '' !== settings.wpdeen_user_profile_title_education_section ) { #>
									<h6 class="wpdeen-f-bold wpdeen-education-section-title wpdeen-profile-subheading">
										{{{ settings.wpdeen_user_profile_title_education_section }}}
									</h6>
								<# } #>
								<# if (settings.wpdeen_user_profile_education_repeater_section && settings.wpdeen_user_profile_education_repeater_section.length) { #>
									<ul>
										<# _.each(settings.wpdeen_user_profile_education_repeater_section, function(education) { #>
											<li>
												<p class="wpdeen-education-title">{{{ education.wpdeen_user_profile_graduation_title_section }}}</p>
												<p class="wpdeen-co-gray wpdeen-education-des">{{{ education.wpdeen_user_profile_graduation_description_section }}}</p>
											</li>
										<# }); #>
									</ul>
								<# } #>
							</div>
						<# } #>
					</div>
				</div>
			</div>
		</div>
	<?php
	}

}