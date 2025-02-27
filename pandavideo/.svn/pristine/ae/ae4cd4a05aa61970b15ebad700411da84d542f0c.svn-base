<?php

class PandaVideo_Player extends \Elementor\Widget_Base 
{
	private $available_appearance = [
		'color',
		'controlsColor',
		'autoplay',
		'smartAutoplay',
		'thumbnail',
		'pandaBranding',
		'saveProgress',
		'saveProgressScreen',
		'saveProgressTitle',
		'saveProgressBackgroundOpacity',
		'saveProgressButton1Title',
		'saveProgressButton2Title',
		'mutedIndicatorIcon',
		'mutedIndicatorAnimation',
		'mutedIndicatorLoop',
		'mutedIndicatorLoopDuration',
		'mutedIndicatorTextTop',
		'mutedIndicatorTextBottom',
		'mutedIndicatorTextColor',
		'mutedIndicatorBackgroundColor',
		'disableForward',
		'hideControlsOnStart',
		'playOpensFullscreen',
		'playOpensFullscreenNative',
		'alternativeProgress',
		'alternativeProgressDefaultVelocity',
		'alternativeProgressVelocity',
		'alternativeProgress2xLimit',
		'alternativeProgressHeight',
		'disablePause',
		'bigPlayButtonSize',
		'bigPlayButtonIconSize'
	];

	private $available_controls = [
		'play-large',
		'rewind',
		'play',
		'fast-forward',
		'progress',
		'current-time',
		'volume',
		'captions',
		'settings',
		'pip',
		'fullscreen'
	];

	public function get_name(): string
	{
		return 'panda-video';
	}

	public static function encodeURIComponent($str)
	{
		$revert = array('%21'=>'!', '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')');
		return strtr(rawurlencode($str), $revert);
	}

	public function get_title(): string
	{
		return esc_html__( 'Panda Video', 'elementor-addon' );
	}

	public function get_icon(): string
	{
		return 'eicon-panda-icon';
	}

	public function get_categories(): array
	{
		return [ 'basic' ];
	}

	public function get_keywords(): array
	{
		return [ 'panda', 'video', 'player' ];
	}

	public function get_script_depends()
	{
		wp_register_script( 'panda-api', 'https://player.pandavideo.com.br/api.v2.js?nowprocket=1&data-no-minify=1&data-no-lazy=1', [ ], null, true );
		wp_register_script( 'panda-external-api', 'https://player.pandavideo.com.br/player.external.js?nowprocket=1&data-no-minify=1&data-no-lazy=1', [ ], null, true );
		return [ 'panda-api', 'panda-external-api' ];
	}

	protected function register_controls() 
	{
		$this->start_controls_section(
			'panda_player',
			[
				'label' => '<b>Panda Video</b>',
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control(
			'external_link',
			[
				'label' => '<b>' . __( 'Video link', 'pandavideo' ) . '</b>',
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Paste here video\'s HLS, Embed code or dashboard\'s url', 'pandavideo' )
			]
		);

		$this->create_switcher( 
			'show_dashboard_buttons', 
			__( 'Show buttons from the dashboard', 'pandavideo' ), 
			false
		);

		$this->create_switcher( 
			'preload', 
			__( 'Active preload', 'pandavideo' ), 
			false
		);

		$this->create_section( 'appearance', __( 'Colors', 'pandavideo' ) );
			$this->create_color( 'color', __( 'Main color', 'pandavideo' ) );
			$this->create_color( 'controlsColor', __( 'Controls color', 'pandavideo' ) );
		
		$this->create_section( 'controls', __( 'Controls', 'pandavideo' ) );
			$this->create_switcher( 'player_control-play-large', __( 'Big Play Button', 'pandavideo' ) );
			$this->create_switcher( 'player_control-play', __( 'Play', 'pandavideo' ), true );
			$this->create_switcher( 'player_control-rewind', __( 'Rewind 10s', 'pandavideo' ), true );
			$this->create_switcher( 'player_control-fast-forward', __( 'Fast Forward 10s', 'pandavideo' ), true );
			$this->add_control(
				'bigPlayButtonSize',
				[
					'label' => __( 'Big Play Button\'s size', 'pandavideo' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 48,
							'max' => 150,
							'step' => 5
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 150,
					],
					'selectors' => [
						'{{WRAPPER}} .your-class' => 'width: {{SIZE}}{{UNIT}};',
					],
					'render_type' => 'template',
					'condition' => [
						'player_control-play-large' => 'yes'
					]
				]
			);
			$this->create_switcher( 'player_control-current-time', 'Current Time', true );
			$this->create_switcher( 'player_control-volume', __( 'Volume', 'pandavideo' ), true );
			$this->add_control(
				'player_control-progress',
				[
					'label' => __( 'Progress', 'pandavideo' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'default' => 'no',
					'condition' => [
						'alternativeProgress!' => 'yes'
					]
				]
			);
			$this->create_switcher( 'player_control-pip', 'Picture-in-Picture', true );
			$this->create_switcher( 'player_control-fullscreen', 'Fullscreen', true );
			$this->create_switcher( 'player_control-captions', __( 'Captions', 'pandavideo' ), true );
			$this->create_switcher( 'player_control-settings', __( 'Settings', 'pandavideo' ), true );
			$this->create_switcher( 'disableForward', __( 'Deactive forward after double click', 'pandavideo' ), true );

		$this->create_switcher_section( 'panda_show_container_section', '<b>' . __( 'Show section at a specific time', 'pandavideo' ) . '</b>', true );
			$this->add_control(
				'panda_show_container',
				[
					'label' => __( 'Section\'s class', 'pandavideo' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'placeholder' => __( 'Your container\'s class', 'pandavideo' ),
					'condition' => [
						'panda_show_container_section' => 'yes'
					]
				]
			);

			$this->add_control(
				'panda_show_container_time',
				[
					'label' => __( 'Show after the second', 'pandavideo' ),
					'type' => \Elementor\Controls_Manager::NUMBER,
					'default' => 0,
					'condition' => [
						'panda_show_container_section' => 'yes'
					]
				]
			);

		$this->create_switcher_section( 'saveProgress', '<b>' . __( 'Resume Play', 'pandavideo' ) . '</b>', true );
			$this->add_control(
				'saveProgressScreen',
				[
					'label' => __( 'Ask users if they want to continue or restart', 'pandavideo' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'default' => 'yes',
					'condition' => [
						'saveProgress' => 'yes'
					]
				]
			);

			$this->add_control(
				'saveProgressBackgroundOpacity',
				[
					'label' => __( 'Opacity', 'pandavideo' ),
					'type' => \Elementor\Controls_Manager::NUMBER,
					'default' => '1',
					'min' => '0.1',
					'max' => '1',
					'step' => '0.1',
					'condition' => [
						'saveProgressScreen' => 'yes',
						'saveProgress' => 'yes'
					]
				]
			);

			$this->add_control(
				'saveProgressTitle',
				[
					'label' => __( 'Title', 'pandavideo' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'default' => __( 'You have already started watching this video.', 'pandavideo' ),
					'condition' => [
						'saveProgressScreen' => 'yes',
						'saveProgress' => 'yes'
					]
				]
			);

			$this->add_control(
				'saveProgressButton1Title',
				[
					'label' => __( 'Button 1\'s title', 'pandavideo' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'default' => __( 'Resume watching', 'pandavideo' ),
					'condition' => [
						'saveProgressScreen' => 'yes',
						'saveProgress' => 'yes'
					]
				]
			);

			$this->add_control(
				'saveProgressButton2Title',
				[
					'label' => __( 'Button 2\'s title', 'pandavideo' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'default' => __( 'Back to the begin', 'pandavideo' ),
					'condition' => [
						'saveProgressScreen' => 'yes',
						'saveProgress' => 'yes'
					]
				]
			);
		
		$this->create_switcher_section(
			'alternativeProgress',
			__( 'Dummy Progress Bar', 'pandavideo' )
		);
			$this->add_control(
				'alternativeProgressDefaultVelocity',
				[
					'label' => __( 'Use recommended settings', 'pandavideo' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'default' => 'no',
					'condition' => [
						'alternativeProgress' => 'yes'
					]
				]
			);
			$this->create_alternative_progress_control( 'alternativeProgressVelocity', __( 'Speed', 'pandavideo') );
			$this->create_alternative_progress_control( 'alternativeProgressHeight', __( 'Height (px)', 'pandavideo') );
			$this->create_alternative_progress_control( 'alternativeProgress2xLimit', __( 'Reduce speed at % of the video', 'pandavideo' ), true );

		$this->create_switcher_section( 'autoplay', 'Smart Autoplay' );
			$this->add_control(
				'smartAutoplay',
				[
					'label' => __( 'Detect page interaction to start with audio', 'pandavideo' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'default' => 'no',
					'condition' => [
						'autoplay' => 'yes'
					]
				]
			);

		$this->create_switcher_section('mutedIndicatorIcon', __( 'Muted indicator', 'pandavideo' ) );
			$this->add_control(
				'mutedIndicatorAnimation',
				[
					'label' => __( 'Animations', 'pandavideo' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'impact',
					'options' => [
						'default' => __( 'Default', 'pandavideo' ),
						'impact' => __( 'Impact', 'pandavideo' )
					],
					'condition' => [
						'mutedIndicatorIcon' => 'yes'
					]
				]
			);
			
			$this->add_control(
				'mutedIndicatorLoop',
				[
					'label' => __( 'Animation in loop', 'pandavideo' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'default' => 'no',
					'condition' => [
						'mutedIndicatorIcon' => 'yes',
						'mutedIndicatorAnimation' => 'impact'
					]
				]
			);

			$this->add_control(
				'mutedIndicatorLoopDuration',
				[
					'label' => __( 'Looping time (seconds)', 'pandavideo' ),
					'type' => \Elementor\Controls_Manager::NUMBER,
					'default' => 5,
					'min' => 2,
					'condition' => [
						'mutedIndicatorIcon' => 'yes',
						'mutedIndicatorLoop' => 'yes',
						'mutedIndicatorAnimation' => 'impact'
					]
				]
			);

			$this->add_control(
				'mutedIndicatorTextColor',
				[
					'label' => __( 'Font color', 'pandavideo' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .title' => 'color: {{VALUE}}',
					],
					'render_type' => 'template',
					'condition' => [
						'mutedIndicatorIcon' => 'yes'
					]
				]
			);

			$this->add_control(
				'mutedIndicatorBackgroundColor',
				[
					'label' => __( 'Background color', 'pandavideo' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .title' => 'color: {{VALUE}}',
					],
					'render_type' => 'template',
					'condition' => [
						'mutedIndicatorIcon' => 'yes'
					]
				]
			);

			$this->add_control(
				'mutedIndicatorTextTop',
				[
					'label' => __( 'Top text', 'pandavideo' ),
					'default' => __( 'Click here', 'pandavideo' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'condition' => [
						'mutedIndicatorIcon' => 'yes'
					]
				]
			);

			$this->add_control(
				'mutedIndicatorTextBottom',
				[
					'label' => __( 'Bottom text', 'pandavideo' ),
					'default' => __( 'to activate the sound', 'pandavideo' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'condition' => [
						'mutedIndicatorIcon' => 'yes'
					]
				]
			);
			
		$this->create_section( 'extras', 'Extras' );
			$this->add_control(
				'hideControlsOnStart',
				[
					'label' => __( 'Hide controls before the play', 'pandavideo'),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'default' => 'no',
					'condition' => [
						'autoplay!' => 'yes'
					]
				]
			);
			$this->create_switcher( 'playOpens', __( 'Play opens fullscreen', 'pandavideo' ), true );
				$this->add_control(
					'playOpensFullscreenNative',
					[
						'label' => __( 'Use native fullscreen', 'pandavideo' ),
						'type' => \Elementor\Controls_Manager::SWITCHER,
						'default' => 'yes',
						'condition' => [
							'playOpens' => 'yes'
						]
					]
				);

				$this->add_control(
					'playOpensFullscreen',
					[
						'label' => __( 'Use fullscreen with additional script', 'pandavideo' ),
						'type' => \Elementor\Controls_Manager::SWITCHER,
						'default' => 'no',
						'condition' => [
							'playOpens' => 'yes'
						]
					]
				);
			
			$this->create_switcher( 'disablePause', __( 'Disable pause', 'pandavideo' ), true );

			$this->add_control(
				'pandaBranding',
				[
					'label' => __( 'Panda\'s logo', 'pandavideo' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'default' => 'yes',
					'condition' => [
						'mutedIndicatorIcon!' => 'yes'
					]
				]
			);

		
		$this->add_control(
			'thumbnail-hr',
			[
				'label' => '<b>Thumbnails</b>',
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

			$this->add_control(
				'thumbnail',
				[
					'label' => __( 'Video thumbnail', 'pandavideo' ),
					'type' => \Elementor\Controls_Manager::MEDIA
				]
			);

			$this->add_control(
				'post_message_control-pause_thumbnail',
				[
					'label' => __( 'Pause thumbnail', 'pandavideo' ),
					'type' => \Elementor\Controls_Manager::MEDIA
				]
			);

			$this->add_control(
				'post_message_control-pause-skip-button',
				[
					'label' => __( 'Resume watching button', 'pandavideo' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'default' => 'yes'
				]
			);

			$this->add_control(
				'post_message_control-end_thumbnail',
				[
					'label' => __( 'Thumbnail in the end of video', 'pandavideo' ),
					'type' => \Elementor\Controls_Manager::MEDIA
				]
			);
		
			$this->add_control(
				'report-bug',
				[
					'label' => __( 'Report bug', 'pandavideo' ),
					'sent_message' => __( 'Sent', 'pandavideo' ),
					'type' => 'panda-report-bug',
				]
			);
	
		$this->end_controls_section();
	}

	private function create_switcher_section(string $id, string $label, bool $disabled_by_default = false)
	{
		$this->add_control(
			"$id-hr",
			[
				'type' => \Elementor\Controls_Manager::DIVIDER
			]
		);
		$this->create_switcher($id, "<b>$label</b>", $disabled_by_default);
	}

	private function create_switcher(string $id, string $label, bool $disabled_by_default = false)
	{
		if (!$disabled_by_default) {
			if ($id !== 'player_control-progress') {
				$this->add_control(
					$id,
					[
						'label' => "$label",
						'type' => \Elementor\Controls_Manager::SWITCHER,
						'default' => 'yes'
					]
				);
			} else {
				$this->add_control(
					$id,
					[
						'label' => "$label",
						'type' => \Elementor\Controls_Manager::SWITCHER,
						'default' => 'yes',
						'condition' => [
							'alternativeProgress!' => 'yes'
						]
					]
				);
			}
		} else {
			$this->add_control(
				$id,
				[
					'label' => "$label",
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'default' => 'no',
				]
			);
		}
	}

	private function create_alternative_progress_control(string $id, string $label, bool $isPercentage = false)
	{
		if ($isPercentage) {
			$configs = [
				'label' => esc_html__( $label, 'pandavideo' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .your-class' => 'width: {{SIZE}}{{UNIT}};',
				],
				'render_type' => 'template',
				'condition' => [
					'alternativeProgress' => 'yes'
				]
			];
			if ($id !== 'alternativeProgressHeight') {
				$configs['condition']['alternativeProgressDefaultVelocity!'] = 'yes';
			}
			$this->add_control(
				$id, $configs
			);
		} else {
			$configs = [
				'label' => esc_html__( $label, 'pandavideo' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 40,
				],
				'selectors' => [
					'{{WRAPPER}} .your-class' => 'width: {{SIZE}}{{UNIT}};',
				],
				'render_type' => 'template',
				'condition' => [
					'alternativeProgress' => 'yes'
				]
			];
			if ($id !== 'alternativeProgressHeight') {
				$configs['condition']['alternativeProgressDefaultVelocity!'] = 'yes';
			}
			$this->add_control(
				$id, $configs
			);
		}
	}

	private function create_color(string $id, string $label)
	{
		$this->add_control(
			$id,
			[
				'label' => esc_html__( $label, 'pandavideo' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .title' => 'color: {{VALUE}}',
				],
				'render_type' => 'template'
			]
		);
	}

	private function create_section(string $id, string $header, bool $create_hr = true)
	{
		if($create_hr) {
			$this->add_control(
				"$id-hr",
				[
					'type' => \Elementor\Controls_Manager::DIVIDER
				]
			);
		}

		$this->add_control(
			"$id-heading",
			[
				'label' => esc_html__( "$header", 'pandavideo' ),
				'type' => \Elementor\Controls_Manager::HEADING
			]
		);
	}

	public function apply_appearance( $settings ): Array
	{
		$available_appearance = $this->available_appearance;
		$available_controls = $this->available_controls;
		$desired_appearance = [];
		$desired_controls = [];

		foreach( $available_appearance as $appearance_option ) {
			if ( strpos($appearance_option, 'post_message_control') ) {
				continue;
			}
			if( 
				(
					!is_numeric( strpos(strtolower($appearance_option), 'color') ) &&
					$appearance_option !== 'bigPlayButtonIconSize'
				) && 
				(
					!$settings[$appearance_option] ||
					$settings[$appearance_option] === 'no'
				)
			) {
				array_push($desired_appearance, [
						$appearance_option =>
						'false'
					]
				);	
			} else if ( isset($settings[$appearance_option]) ) {
				if ( $appearance_option === 'thumbnail' ) {
					if ( $settings[$appearance_option]['url'] !== '' ) {
						array_push( $desired_appearance, [
							$appearance_option =>
							$this->encodeURIComponent(
								(string) $settings[$appearance_option]['url']
							)]
						);
					}
				} else {
					if ( is_array($settings[$appearance_option]) ) {
						if ( array_key_exists('size', $settings[$appearance_option]) ) {
							if ($appearance_option === 'bigPlayButtonSize' ) {
								array_push( $desired_appearance, [
									$appearance_option =>
										$settings[$appearance_option]['size']
									]
								);
								$scaleSize = ((int) $settings[$appearance_option]['size']);
								$iconSize = 55;
								if ($scaleSize < 68) {
									$iconSize = ($scaleSize / 2) - 9.5;
								}  else {
									$iconSize = ($scaleSize / 1.75);
								}
								array_push( $desired_appearance, [
									'bigPlayButtonIconSize' =>
										$iconSize
									]
								);
							} else {
								array_push( $desired_appearance, [
									$appearance_option =>
										$settings[$appearance_option]['size']
									]
								);
							}
						}
					} else if ( $settings[$appearance_option] === 'yes' ) {
						if ( $appearance_option === 'playOpensFullscreen') { 
							if (
								!$settings['playOpensFullscreenNative'] ||
								$settings['playOpensFullscreenNative'] === 'no'
							) {
								array_push( $desired_appearance, [
									$appearance_option =>
										'true'
									]
								);
							}
						} else {
							array_push( $desired_appearance, [
								$appearance_option =>
									'true'
								]
							);
						}
					} else {
						array_push( $desired_appearance, [
							$appearance_option =>
							$this->encodeURIComponent(	
								(string) $settings[$appearance_option]
							)]
						);
					}
				}
			}
		}
		
		foreach($available_controls as $control_option) {
			if ($settings["player_control-$control_option"] === 'yes') {
				array_push($desired_controls, [
					explode('-', $control_option, 1)[0]
					]
				);
			}
		}

		if (count($desired_controls) === 0) {
			array_push($desired_controls, ['none']);
		}

		return [
			wp_json_encode($desired_appearance), 
			wp_json_encode($desired_controls)
		];
	}

	public function strpos_all($haystack, $needle)
	{
		$offset = 0;
		$allpos = array();
		while (($pos = strpos($haystack, $needle, $offset)) !== FALSE) {
			$offset   = $pos + 1;
			$allpos[] = $pos;
		}
		return $allpos;
	}
	
	protected function render() 
	{
		$settings = $this->get_settings_for_display();
		$external_link = $settings['external_link'];
		$play_opens_fullscreen_additional_script = (bool) $settings['playOpensFullscreen'];
		$play_opens_fullscreen_native = (bool) $settings['playOpensFullscreenNative'];
		$preload = $settings['preload'];
		$show_dashboard_buttons = (bool) $settings['show_dashboard_buttons'];
		$show_container_time = $settings['panda_show_container_time'];
		$show_container = $settings['panda_show_container'];
		$pause_thumbnail = $settings['post_message_control-pause_thumbnail']['url'];
		$pause_button = $settings['post_message_control-pause-skip-button'];
		$end_thumbnail = $settings['post_message_control-end_thumbnail']['url'];
		$dashboard_buttons = '';
		$id = $this->get_id();
		$external_video = (object) [];

		if (is_numeric(strpos($external_link, 'pandaexternal-'.bin2hex('exte')))) {
			$script = explode(
				'</script>', explode('<script>', $external_link)[1]
			)[0];
			$external_video->l = explode(
				'"', explode( '"l":"', $script )[1]
			)[0];
			if (strpos($script, '"t":"')) {
				$external_video->t = explode(
					'"', explode( '"t":"', $script )[1]
				)[0];
			} else if (strpos($script, '"v":"')) {
				$external_video->v = explode(
					'"', explode( '"v":"', $script )[1]
				)[0];
			}
			$external_video->pullzone = $script;
			$html = explode(
				'<script>', $external_link
			)[0];
			if (strpos($external_link, '</style>')) {
				$html = explode('</style>', $external_link)[1];
			}
			$div_id = explode('"', explode('id="', $html)[1])[0];
			$external_video->html = $html;
			$external_video->id = $div_id;
		} else if (is_numeric(strpos($external_link, '<iframe'))) {
			$div_positions = $this->strpos_all($external_link, '<div');
			$dashboard_buttons = '';
			if (count($div_positions) > 0 && $show_dashboard_buttons) {
				if ($div_positions[0] === 0 && count($div_positions) > 1) {
					$dashboard_buttons = substr($external_link, $div_positions[1]);
				} else if($div_positions[0] !== 0) {
					$dashboard_buttons = substr($external_link, $div_positions[0]);
				}
			}
			$raw_link = explode("src=\"", $external_link)[1];
			$raw_link = explode("\"", $raw_link)[0];
			$external_link = $raw_link;
		} else if (is_numeric(strpos($external_link, '<script'))) {
			$div_positions = $this->strpos_all($external_link, '<div');
			$dashboard_buttons = '';
			if (count($div_positions) > 0 && $show_dashboard_buttons) {
				if ($div_positions[0] === 0 && count($div_positions) > 1) {
					$dashboard_buttons = substr($external_link, $div_positions[1]);
				} else if($div_positions[0] !== 0) {
					$dashboard_buttons = substr($external_link, $div_positions[0]);
				}
			}
			$video_id = explode("video_id: '", $external_link)[1];
			$video_id = explode("'", $video_id)[0];
			$video_library = explode("library_id: '", $external_link)[1];
			$video_library = explode("'", $video_library)[0];
			$external_link = "https://player-$video_library.tv.pandavideo.com.br/embed/?v=$video_id";
		}

		$is_external_video = property_exists($external_video, 'html');
		if (strpos($external_link, 'pandavideo.com')) {
			$player_config_json = $this->apply_appearance($settings);
		?>
			<style>
				.<?php echo esc_html(str_replace('.', '', $show_container)) ?> {
					visibility: hidden;
				}

				.panda__hidden-item--<?php echo esc_attr($id) ?> {
					display: none;
				}
			</style>
			<?php
				if ($is_external_video) {
					echo "<div class=\"external-video-container\">".wp_kses_post($external_video->html)."</div>";
				} else {
			?>
			
			<div id="<?php echo esc_attr($id) ?>">
				<p class="there-is-content">&nbsp;</p>
				<div style="position: relative; padding-top: 56.25%;"></div>
			</div>
			<?php
				}
			?>
			<?php
				if (isset($dashboard_buttons)) {
					?>
						<div class="dashboard-buttons-container-<?php echo esc_html($id) ?>">
							<?php
								# no escaping function used, since it's purpose is to render HTML, majority generated by Panda Video's platform.
								echo $dashboard_buttons;
							?>
						</div>
					<?php
				}
			?> 
			<script>
				/* nowprocket */
				var isEditingElementor = undefined;
				if (
					window.location.search.indexOf('elementor-preview=') !== -1 || 
					window.location.search.indexOf('preview_id=') !== -1
				) {
					isEditingElementor = true;
				} else {
					isEditingElementor = false;
				}
				var dashboardButtons<?php echo esc_html($id) ?> = '<?php echo esc_js($dashboard_buttons) ?>'
				var playerConfigs<?php echo esc_html($id) ?> = {};
				var ctas<?php echo esc_html($id) ?> = [];
				var showContainer<?php echo esc_html($id) ?> = '<?php echo $show_container ? esc_js($show_container) : '' ?>';
				<?php # appearanceConfig & controlsConfig were already sanitized previously by wp_json_encode ?>
				var appearanceConfig<?php echo esc_html($id) ?> = '<?php echo $player_config_json[0] ?>';
				var controlsConfig<?php echo esc_html($id) ?> = '<?php echo $player_config_json[1] ?>'; 
				var ctaThumbs<?php echo esc_html($id) ?> = {
					skipButton: '<?php echo esc_js($pause_button) ?>',
					pause: '<?php echo esc_url($pause_thumbnail) ?>',
					end: '<?php echo esc_url($end_thumbnail) ?>'
				};
				var isExternalVideo<?php echo esc_html($id) ?> = '<?php echo esc_js($is_external_video) ?>';
				
				if (!isEditingElementor) {
					preparePandaButtons();
				} else {
					playerConfigs<?php echo esc_html($id) ?>.isDashboard = true;
				}

				playerConfigs<?php echo esc_html($id) ?>.controls = [];
				appearanceConfig<?php echo esc_html($id) ?> = JSON.parse(appearanceConfig<?php echo esc_html($id) ?>);
				controlsConfig<?php echo esc_html($id) ?> = JSON.parse(controlsConfig<?php echo esc_html($id) ?>);
				
				appearanceConfig<?php echo esc_html($id) ?>.forEach(value => {
					playerConfigs<?php echo esc_html($id) ?>[Object.keys(value)[0]] = Object.values(value)[0];
				});

				controlsConfig<?php echo esc_html($id) ?>.forEach(value => {
					playerConfigs<?php echo esc_html($id) ?>.controls.push(value[0]);
				});
				
				if (ctaThumbs<?php echo esc_html($id) ?>.pause) {
					let pauseThumbnail = "<i"+"mg src='"+ctaThumbs<?php echo esc_html($id) ?>.pause+"' style='object-fit:cover; width:100%; height:100%;'><script>document.querySelector('img').onclick=function() { window.parent.postMessage({type: 'cta_play',}, '*') }"+"</sc"+"ript>";
					if (ctaThumbs<?php echo esc_html($id) ?>.skipButton) {
						ctas<?php echo esc_html($id) ?>.push(
							{
								id: '<?php echo esc_html($id) ?>',
								type: 'pause',
								script: pauseThumbnail,
								skipButton: true
							}
						);
					} else {
						ctas<?php echo esc_html($id) ?>.push(
							{
								id: '<?php echo esc_html($id) ?>',
								type: 'pause',
								script: pauseThumbnail
							}
						);
					}
				}

				if (ctaThumbs<?php echo esc_html($id) ?>.end) {
					let endThumbnail = "<i"+"mg src='"+ctaThumbs<?php echo esc_html($id) ?>.end+"' style='object-fit:cover; width:100%; height:100%;'><script>document.querySelector('img').onclick=function() { window.parent.postMessage({type: 'cta_play',}, '*') }"+"</sc"+"ript>";
					ctas<?php echo esc_html($id) ?>.push(
						{
							id: '<?php echo esc_html($id) ?>2',
							type: 'end',
							script: endThumbnail
						}
					);
					playerConfigs<?php echo esc_html($id) ?>.endThumbnail = ctaThumbs<?php echo esc_html($id) ?>.end;
				}

				<?php if (!$preload) {
					?>
						playerConfigs<?php echo esc_html($id) ?>.preload = false;
					<?php
				} ?>
				
				function getAspectRatio(height, width) {
					let ratio = height / width;

					if (Number.isNaN(ratio)) {
						ratio = 9 / 16;
					}

					return `${ratio * 100}%`;
				}

				function preparePandaButtons() {
					const pandaButtons = document.querySelectorAll('.panda-button');
					pandaButtons.forEach(button => {
						const showTime = Number(button.getAttribute('show-time'));
						
						if(isEditingElementor) {
							if (isEditingElementor) {
								button.style.opacity = 1;
							}
							button.style.display = 'flex';
						} else if (showTime === 0) {
							button.style.display = 'flex';
						}
					});
				}

				function preparePandaButtonsToPauseVideo(player) {
					const pandaButtons = document.querySelectorAll('.panda-button');
					pandaButtons.forEach(button => {
						button.addEventListener('click', () => {
							player.pause();
						});
					});
				}
				
				if (isExternalVideo<?php echo esc_html($id) ?>) {
					window.pandaexternaltag = window.pandaexternaltag || [];
					const l = '<?php echo esc_js(property_exists($external_video, 'l') ? $external_video->l : '') ?>';
					const t = '<?php echo esc_js(property_exists($external_video, 't') ? $external_video->t : '') ?>';
					const v = '<?php echo esc_js(property_exists($external_video, 'v') ? $external_video->v : '') ?>';
					const pushObj =  {
						refreshConfig: isEditingElementor,
						onError(e) {
							console.error(e);
						}
					};
					if (l) {
						pushObj.l = l;
					}
					if (v) {
						pushObj.v = v;
					}
					if (t) {
						pushObj.t = t;
					}
					const playerConfigs = playerConfigs<?php echo esc_html($id) ?>;
					const configKeys = Object.keys(playerConfigs);
					configKeys.map((key) => {
						if (!playerConfigs[key]) {
							delete playerConfigs[key];
						} else if (playerConfigs[key] !== decodeURIComponent(playerConfigs[key]) && !Array.isArray(playerConfigs[key])) {
							playerConfigs[key] = decodeURIComponent(playerConfigs[key]);
						}
					});
					if (playerConfigs.color) {
						playerConfigs.primaryColor = playerConfigs.color;
						delete playerConfigs.color;
					}
					if (playerConfigs.controls.length === 1) {
						playerConfigs.controls = `${playerConfigs.controls[0]},`;
					} else if (playerConfigs.controls.length > 1) {
						playerConfigs.controls = playerConfigs.controls.reduce((previousControl, currentControl) => {
							if (previousControl) {
								return `${previousControl},${currentControl}`;
							}
							return currentControl;
						}, '');
					}
					window.pandaexternaltag.push(() => {
						const player = new PandaExternalPlayer('<?php echo $is_external_video ? esc_js($external_video->id) : "" ?>', {...pushObj, ...playerConfigs, ...{ onReady() {
							player.setCtas(ctas<?php echo esc_html($id) ?>);
						}}});
					});
				} else {
					window.pandascripttag = window.pandascripttag || [];
					window.pandascripttag.push(function () { 
						const p = new PandaPlayer('<?php echo esc_attr($id) ?>', {
							url: '<?php echo esc_url_raw($external_link) ?>',
							defaultStyle: true,
							fetchPriority: 'high',
							async onReady() {
								const additionalScriptFullscreen = '<?php echo esc_js($play_opens_fullscreen_additional_script); ?>';
								const nativeFullscreen = '<?php echo esc_js($play_opens_fullscreen_native); ?>'; 
								if (additionalScriptFullscreen && !nativeFullscreen) {
									p.loadWindowScreen({panda_id_player: '<?php echo esc_attr($id) ?>'});
								}
								const aspectRatio = getAspectRatio(this.video_height, this.video_width);
								const videoContainer = document.querySelector('[data-id="<?php echo esc_attr($id) ?>"] div div[id="<?php echo esc_attr($id) ?>"]');
								videoContainer.style.paddingTop = aspectRatio;
								let SECONDS_TO_DISPLAY_CONTAINER = '<?php echo esc_html($show_container_time) ?>';
								SECONDS_TO_DISPLAY_CONTAINER = Number(SECONDS_TO_DISPLAY_CONTAINER);
								if (isEditingElementor) {
									preparePandaButtons();
								} 
								preparePandaButtonsToPauseVideo(p);
								if (dashboardButtons<?php echo esc_html($id) ?>) {
									await p.loadButtonInTime({fetchApi: true, isAsync: true });
									
									if (this.outsideCtas) {
										const outsideCtasIds = this.outsideCtas.map(({divId}) => divId);
										const dashboardButtons = document.querySelector('.dashboard-buttons-container-<?php echo esc_html($id) ?> div');
										outsideCtasIds.forEach(id => {
											const div = document.createElement('div');
											div.id = id;
											dashboardButtons.appendChild(div);
										});
									}
								}
								p.onEvent(function(e) {
									let customContainers = undefined;
									if (showContainer<?php echo esc_html($id) ?>) customContainers = document.querySelectorAll(`.${showContainer<?php echo esc_html($id) ?>.replace('.', '')}`);
									const type = e.message;
									const { currentTime, isMutedIndicator } = e;

									const pandaButtons = document.querySelectorAll('.panda-button');
									pandaButtons.forEach(button => {
										const showTime = Number(button.getAttribute('show-time'));
										const btnId = button.getAttribute('id');
										const btnLocalStorageKey = `pandavideo_elementor_delay_watched_${btnId}-${showTime}`;
										const watched = localStorage.getItem(btnLocalStorageKey) || false;

										if (watched && !isEditingElementor) {
											button.style.opacity = 1;
											button.style.display = 'flex';
										} else if (showTime !== 0) {
											if (currentTime < showTime) {
												if (isEditingElementor) {
													button.style.opacity = .5;
													button.style.display = 'flex';
												} else {
													button.style.display = 'none';
												}
											} else if (currentTime > showTime && !isMutedIndicator) {
												if (isEditingElementor) {
													button.style.opacity = 1;
												}
												button.style.display = 'flex'
												if (!isEditingElementor) {
													localStorage.setItem(btnLocalStorageKey, true)
												}
											} else if (isEditingElementor && isMutedIndicator) {
												button.style.opacity = .5;
												button.style.display = 'flex';
											}
										} else {
											if (isEditingElementor) {
												button.style.opacity = 1;	
											}
											button.style.display = 'flex';
										}
									});

									const hiddenClass = 'panda__hidden-item--<?php echo esc_attr($id) ?>'; 

									if (customContainers) {
										customContainers.forEach(container => {
											let showTime = '<?php echo $show_container_time ? esc_html($show_container_time) : '' ?>';
											showTime = Number(showTime);
											const containerClass = container.classList.contains(showContainer<?php echo esc_html($id) ?>) ? showContainer<?php echo esc_html($id) ?> : false;
											let containerLocalStorageKey = `pandavideo_elementor_delay_watched_${containerClass}-${showTime}`;
											let watched = false;
											if (containerClass) {
												watched = localStorage.getItem(containerLocalStorageKey) || false;
											}
											if (watched && !isEditingElementor) {
												container.classList.remove(hiddenClass);
												container.style.visibility = 'visible';
											} else if (showTime !== 0) {
												if (currentTime < showTime) {
													if (isEditingElementor) {
														container.style.opacity = .5;
														container.classList.remove(hiddenClass);
														container.style.visibility = 'visible';
													} else {
														container.classList.add(hiddenClass);
														container.style.visibility = 'visible';
													}
												} else if (currentTime > showTime && !isMutedIndicator) {
													if (isEditingElementor) {
														container.style.opacity = 1;
													}
													container.classList.remove(hiddenClass);
													if (!isEditingElementor) {
														localStorage.setItem(containerLocalStorageKey, true);
													}
												} else if (isEditingElementor && isMutedIndicator) {
													container.style.opacity = .5;
													container.classList.remove(hiddenClass);
												}
											} else {
												if (isEditingElementor) {
													container.style.opacity = 1;
												}
												container.classList.remove(hiddenClass);
												container.style.visibility = 'visible';
											}
										});
									}
			
									if(type === 'panda_timeupdate') {
										if (isMutedIndicator) {
											return;
										}
										if (customContainers && SECONDS_TO_DISPLAY_CONTAINER) {
											if (currentTime < SECONDS_TO_DISPLAY_CONTAINER) {
												customContainers.forEach(e => {
													if (isEditingElementor) {
														e.style.opacity = .5;
														e.classList.remove(hiddenClass);
													} else {
														e.classList.add(hiddenClass);
													}
												});
											} else if (currentTime > SECONDS_TO_DISPLAY_CONTAINER) {
												customContainers.forEach((e, key) => {
													if (isEditingElementor) {
														e.style.opacity = 1;
													}
													e.classList.remove(hiddenClass);
												});
											}	
										}
									}
								});
								var iframe = null;
								if (this.comparison_id) {
									iframe = document.querySelector('#panda-'+this.comparison_id).contentWindow;
								} else {
									iframe = document.querySelector('#panda-'+this.video_external_id).contentWindow;
								}
								iframe.postMessage({
									type: 'ctas',
									parameter: {
										'ctas': ctas<?php echo esc_html($id) ?>,
									}
								}, '*');
							},
							playerConfigs: playerConfigs<?php echo esc_html($id) ?>
						});
					});
				}
			</script>
			<style>
				.e-con.e-flex > .e-con-inner:has(iframe[id^="panda-"]) {
					flex-wrap: nowrap;
				}
				.elementor-element:has(iframe[id^="panda-"]) {
					width: 100%;
				}
				.there-is-content {
					margin: 0;
					z-index: -1;
				}
				.external-video-container {
					position: relative;
					padding-top: 56.25%;
				}
				.external-video-container:first-child {
					position:absolute;
					top:0;
					left:0;
					width: 100%;
					height: 100%;
				}
			</style>
		<?php
		} else {
			?>
				<div style="text-align: center" class="player-container" id="<?php echo esc_attr($id) ?>">
					<?php esc_html_e( 'Insert your video\'s link in "Edit Panda Video".', 'pandavideo' ) ?>
				</div>
			<?php
		}
	?>
	<?php
	}
}