<?php

/**
 * Plexx Hero Widget.
 */

use Elementor\Embed;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class Elementor_Plexx_Hero extends \Elementor\Widget_Base {


    public function get_name() {
        return 'plexx_hero';
    }

    public function get_title() {
        return __( 'Plexx Hero Title', 'themeworm' );
    }

    public function get_icon() {
        return 'eicon-site-title';
    }

    public function get_categories() {
        return [ 'plexx-elementor-category' ];
    }

    public function get_keywords() {
        return ['hero', 'text', 'title', 'plexx', 'image', 'photo', 'heading', 'video', 'youtube', 'vimeo', 'selfhosted'];
    }

    public function __construct($data = [], $args = null) {
      parent::__construct($data, $args);
   }

    protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Plexx Hero Title', 'themeworm' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
    			'hero_text',
          [
              'label'         => __('Title', 'themeworm'),
              'type'          => \Elementor\Controls_Manager::TEXT,
              'default'       => __('Title Here','themeworm'),
              'label_block'   => true,
              'dynamic'       => [ 'active' => true ]
          ]
    		);

        $this->add_control(
    			'hero_subtitle',
          [
              'label'         => __('Subtitle', 'themeworm'),
              'type'          => \Elementor\Controls_Manager::TEXT,
              'default'       => '',
              'label_block'   => true,
              'dynamic'       => [ 'active' => true ]
          ]
    		);

        $this->add_control('hero_background_type',
            [
                'label'         => __( 'Background Type', 'themeworm' ),
                'type'          => \Elementor\Controls_Manager::SELECT,
                'options'       => [
                  'image'       => __('Image/Color', 'themeworm'),
                    'youtube'       => __('YouTube', 'themeworm'),
                    'vimeo'         => __('Vimeo', 'themeworm'),
                    'hosted'        => __('Self Hosted', 'themeworm'),
                ],
                'label_block'   => true,
                'default'       => 'image',
            ]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
        'label' => __( 'Background', 'themeworm' ),
				'name' => 'hero_background',
				'label' => __( 'Background', 'themeworm' ),
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .plexx-hero-title',
        'condition'     => [
            'hero_background_type'         => 'image',
        ]
			]
		);

    $this->add_control('hero_youtube_video_url',
        [
            'label'         => __('Video URL', 'themeworm'),
            'description'         => __('Please note, Youtube video doesn\'t loop', 'themeworm'),
            'type'          => \Elementor\Controls_Manager::URL,
            'dynamic'       => [ 'active' => true ],
            'label_block'   => true,
            'condition'     => [
                'hero_background_type' => 'youtube',
            ]
        ]);

        $this->add_control('hero_vimeo_video_url',
            [
                'label'         => __('Video URL', 'themeworm'),
                'type'          => \Elementor\Controls_Manager::URL,
                'dynamic'       => [ 'active' => true ],
                'label_block'   => true,
                'condition'     => [
                    'hero_background_type' => 'vimeo',
                ]
            ]);

    $this->add_control('hero_video_hosted',
        [
            'label'         => __('Select Video', 'themeworm'),
            'type'          => \Elementor\Controls_Manager::MEDIA,
            'media_type' => 'video',
            'condition'     => [
                'hero_background_type'=> 'hosted'
            ]
        ]
    );

    $this->add_control('hero_overlay_color',
        [
            'label'         => __('Video overlay color', 'themeworm'),
            'type'          => \Elementor\Controls_Manager::COLOR,
            'global'        => [
              'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY
            ],
            'selectors'     => [
                '{{WRAPPER}} .hero-video-overlay' => 'background: {{VALUE}};',
            ],
            'condition'     => [
                'hero_background_type'=> ['hosted', 'youtube', 'vimeo']
            ]
        ]
    );

    $this->add_control(
			'hero_align',
			[
        'label'         => __('Title Align', 'themeworm'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'themeworm' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'themeworm' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'themeworm' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'toggle' => false,
			]
		);

    $this->add_responsive_control(
			'hero_height',
			[
				'label' => __( 'Height', 'themeworm' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'vw' ],
				'range' => [
					'px' => [
						'max' => 1500,
					],
					'%' => [
						'max' => 100,
						'step' => 1,
					],
					'vw' => [
						'max' => 100,
						'step' => 1,
					],
					'em' => [
						'max' => 100,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .plexx-hero-title' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

    $this->add_control(
			'hero_full_width',
			[
				'label' => __( 'Force Full Width', 'themeworm' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'themeworm' ),
				'label_off' => __( 'No', 'themeworm' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

    $this->end_controls_section();


    $this->start_controls_section(
      'section_title_style',
      [
        'label' => __( 'Title Style', 'themeworm' ),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );

    $this->add_control('plexx_title_color',
        [
            'label'         => __('Title Color', 'themeworm'),
            'type'          => \Elementor\Controls_Manager::COLOR,
            'global'        => [
              'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY
            ],
            'selectors'     => [
                '{{WRAPPER}} .plexx-hero-title h2' => 'color: {{VALUE}};',
            ],
        ]
    );

    $this->add_control('plexx_subtitle_color',
        [
            'label'         => __('Subtitle Color', 'themeworm'),
            'type'          => \Elementor\Controls_Manager::COLOR,
            'global'        => [
              'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY
            ],
            'selectors'     => [
                '{{WRAPPER}} .hero-subtitle' => 'color: {{VALUE}};',
            ],
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name'          => 'title_typography',
            'label'         => __('Title Typography', 'themeworm'),
            'global' => [
              'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
             ],
            'selector'      => '{{WRAPPER}} .plexx-hero-title h2',
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name'          => 'subtitle_typography',
            'label'         => __('Subtitle Typography', 'themeworm'),
            'global' => [
              'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
             ],
            'selector'      => '{{WRAPPER}} .plexx-hero-title h2',
        ]
    );


    $this->end_controls_section();


    }

    protected function render() {

      $settings = $this->get_settings_for_display();

      $this->add_inline_editing_attributes('hero_text', 'none');
      $this->add_inline_editing_attributes('hero_subtitle', 'none');

      $this->add_render_attribute('plexx_hero', 'class', 'plexx-hero-title');
      $this->add_render_attribute( 'plexx_hero', 'class', [ 'plexx-hero-title', 'plexx-hero-title-' . esc_attr($settings['hero_align']) ] );


      if ("yes" === $settings['hero_full_width']) {

        $this->add_render_attribute( 'plexx_hero', 'class', [ 'plexx-hero-title', 'force-full-width' ] );

      } ?>

      <div <?php echo $this->get_render_attribute_string('plexx_hero'); ?>>

        <h2><?php echo esc_html( $settings['hero_text'] ); ?></h2>

        <?php if( !empty( $settings['hero_subtitle'] ) ) { ?>
            <div class="hero-subtitle"><?php echo esc_html( $settings['hero_subtitle'] ); ?></div>
        <?php } ?>

        <div class="hero-video-overlay"></div>

        <?php if( !empty( $settings['hero_video_hosted']['url'] ) && $settings['hero_background_type'] == 'hosted' ) { ?>
          <video autoplay muted loop class="hero-video" playsinline>
            <source src="<?php echo esc_url( $settings['hero_video_hosted']['url'] ); ?>" type="video/mp4">
          </video>
        <?php } ?>

        <?php if( !empty( $settings['hero_youtube_video_url']['url'] ) && $settings['hero_background_type'] == 'youtube' ) { ?>
          <iframe class="no-fitvids" src="<?php echo esc_url($this->get_video_params()); ?>&controls=0&showinfo=0&rel=0&autoplay=1&loop=1&mute=1" frameborder="0" allowfullscreen allow="autoplay"></iframe>
          <div class="hero-video-background">
          </div>
        <?php } ?>

        <?php if( !empty( $settings['hero_vimeo_video_url']['url'] ) && $settings['hero_background_type'] == 'vimeo' ) { ?>
          <iframe class="no-fitvids" src="<?php echo esc_url($this->get_video_params()); ?>?background=1&autoplay=1&loop=1&muted=1" frameborder="0" allowfullscreen allow="autoplay"></iframe>
          <div class="hero-video-background">
          </div>
        <?php } ?>

      </div>

    <?php
    }

    private function get_video_params() {

        $settings = $this->get_settings_for_display();

        $link = ( 'vimeo' === $settings['hero_background_type'] ) ? esc_url($settings['hero_vimeo_video_url']['url']) : esc_url($settings['hero_youtube_video_url']['url']);

        if ( ! empty( $link ) ) {
            if ( 'youtube' === $settings['hero_background_type'] ) {
                $video_props    = Embed::get_video_properties( $link );
                $link           = Embed::get_embed_url( $link );
                $video_id       = $video_props['video_id'];
            } elseif ( 'vimeo' === $settings['hero_background_type'] ) {
                $mask = '/^.*vimeo\.com\/(?:[a-z]*\/)*([‌​0-9]{6,11})[?]?.*/';
                $video_id = substr( $link, strpos( $link, '.com/' ) + 5 );
        				preg_match( $mask, $link, $matches );
        				if( $matches ) {
        					$video_id = $matches[1];
        				} else {
        					$video_id = substr( $link, strpos( $link, '.com/' ) + 5 );
        				}
                $link = sprintf( 'https://player.vimeo.com/video/%s', $video_id );
            }

            $id = $video_id;
        }

        return $link;

    }


}
