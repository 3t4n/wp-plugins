<?php

/**
 * Plexx Slider Widget.
 */

use Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class Elementor_Plexx_Slider extends \Elementor\Widget_Base {


    public function get_name() {
        return 'plexx_slider';
    }

    public function get_title() {
        return __( 'Plexx Slider', 'themeworm' );
    }

    public function get_icon() {
        return 'eicon-slider-push';
    }

    public function get_categories() {
        return [ 'plexx-elementor-category' ];
    }

    public function get_keywords() {
        return ['slider', 'gallery', 'images', 'lightbox', 'photo', 'plexx', 'swipe'];
    }

    public function __construct($data = [], $args = null) {
      parent::__construct($data, $args);
   }

    protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Slider Settings', 'themeworm' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $img_repeater = new REPEATER();


        $img_repeater->add_control('repeater_gallery_img',
            [
                'label' => __( 'Upload Image', 'themeworm' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'dynamic'       => [ 'active' => true ],
                'default'       => [
                    'url'	=> plugin_dir_url( __DIR__ ) . 'assets/images/noimage.jpg',
                ],
            ]);

            $img_repeater->add_control('repeater_img_name',
                [
                    'label' => __( 'Title', 'themeworm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'dynamic'       => [ 'active' => true ],
                    'label_block'   => true,
                ]);

        $img_repeater->add_control('repeater_img_desc',
                [
                    'label' => __( 'Description', 'themeworm' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'dynamic'       => [ 'active' => true ],
                    'label_block' => true,
                ]);

        $img_repeater->add_control('repeater_link_type',
                    [
                        'label'         => __('Link Type', 'themeworm'),
                        'type'          => \Elementor\Controls_Manager::SELECT,
                        'options'       => [
                            'lightbox'  => __('Lightbox', 'themeworm'),
                            'video_lightbox'  => __('Video Lightbox', 'themeworm'),
                            'url'   => __('Page URL', 'themeworm'),
                            'none'  => __('Do Nothing', 'themeworm'),
                        ],
                        'default'       => 'lightbox',
                        'label_block'   => true,
                    ]);

        $img_repeater->add_control('repeater_url',
                        [
                            'label'         => __('URL', 'themeworm'),
                            'type'          => \Elementor\Controls_Manager::TEXT,
                            'dynamic'       => [
                                'active' => true,
                            ],
                            'label_block'   => true,
                            'condition'     => [
                                'repeater_link_type'=> 'url'
                            ]
                        ]
        );

        $img_repeater->add_control('repeater_video_url',
                        [
                            'label'         => __('Vimeo/Youtube URL', 'themeworm'),
                            'type'          => \Elementor\Controls_Manager::TEXT,
                            'dynamic'       => [
                                'active' => true,
                            ],
                            'label_block'   => true,
                            'condition'     => [
                                'repeater_link_type'=> 'video_lightbox'
                            ]
                        ]
        );


        $this->add_control('slider_img_content',
           [
               'label' => __( 'Images', 'themeworm' ),
               'type' => \Elementor\Controls_Manager::REPEATER,
               'default' => [
                   [
                       'repeater_img_name'   => 'Image #1',
                   ],
               ],
               'fields' => $img_repeater->get_controls(),
               'title_field'   => '{{{ "" !== repeater_img_name ? repeater_img_name : "Image" }}}',
           ]
       );

      //  $this->add_responsive_control(
      //   'slider_height',
      //   [
      //     'label' => __( 'Height', 'themeworm' ),
      //     'type' => \Elementor\Controls_Manager::SLIDER,
      //     'size_units' => [ 'px', 'vw' ],
      //     'range' => [
      //       'px' => [
      //         'max' => 800,
      //       ],
      //       '%' => [
      //         'max' => 100,
      //         'step' => 1,
      //       ],
      //       'vw' => [
      //         'max' => 100,
      //         'step' => 1,
      //       ],
      //       'em' => [
      //         'max' => 100,
      //         'step' => 0.1,
      //       ],
      //     ],
      //     'selectors' => [
      //       '{{WRAPPER}} .owl-item, .owl-height, .owl-carousel' => 'height: {{SIZE}}{{UNIT}};',
      //     ],
      //   ]
      // );

      $this->add_control(
  			'slider_align',
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

      $this->add_control(
        'slider_full_width',
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
          'elements_section',
          [
              'label' => __( 'Slider Controls', 'themeworm' ),
              'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
          ]
      );

      $this->add_control(
        'slider_title',
        [
          'label' => __( 'Show Title', 'themeworm' ),
          'type' => \Elementor\Controls_Manager::SWITCHER,
          'label_on' => __( 'Yes', 'themeworm' ),
          'label_off' => __( 'No', 'themeworm' ),
          'return_value' => 'yes',
          'default' => 'yes',
        ]
      );

      $this->add_control(
        'slider_desc',
        [
          'label' => __( 'Show Description', 'themeworm' ),
          'type' => \Elementor\Controls_Manager::SWITCHER,
          'label_on' => __( 'Yes', 'themeworm' ),
          'label_off' => __( 'No', 'themeworm' ),
          'return_value' => 'yes',
          'default' => 'yes',
        ]
      );

      $this->add_control(
        'slider_dots',
        [
          'label' => __( 'Show Dots', 'themeworm' ),
          'type' => \Elementor\Controls_Manager::SWITCHER,
          'label_on' => __( 'Yes', 'themeworm' ),
          'label_off' => __( 'No', 'themeworm' ),
          'return_value' => 'yes',
          'default' => 'yes',
        ]
      );

      $this->add_control(
        'slider_arrows',
        [
          'label' => __( 'Show Arrows', 'themeworm' ),
          'type' => \Elementor\Controls_Manager::SWITCHER,
          'label_on' => __( 'Yes', 'themeworm' ),
          'label_off' => __( 'No', 'themeworm' ),
          'return_value' => 'yes',
          'default' => 'yes',
        ]
      );

      $this->add_control(
  			'more_options',
  			[
  				'label' => __( 'Autoplay Control', 'themeworm' ),
  				'type' => \Elementor\Controls_Manager::HEADING,
  				'separator' => 'before',
  			]
  		);

      $this->add_control(
        'slider_autoplay',
        [
          'label' => __( 'Enable Autoplay', 'themeworm' ),
          'type' => \Elementor\Controls_Manager::SWITCHER,
          'label_on' => __( 'Yes', 'themeworm' ),
          'label_off' => __( 'No', 'themeworm' ),
          'return_value' => 'yes',
          'default' => 'no',
        ]
      );


      $this->add_responsive_control(
       'autoplay_delay',
       [
         'label' => __( 'Autoplay Delay in ms', 'themeworm' ),
         'type' => \Elementor\Controls_Manager::SLIDER,
         'size_units' => [ 'px' ],
         'range' => [
           'px' => [
             'max' => 9000,
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

         'default' => [
					'unit' => 'px',
					'size' => 6000,
				],
        'condition'     => [
            'slider_autoplay'=> 'yes'
        ]
       ]
     );



      $this->end_controls_section();

      $this->start_controls_section(
        'section_title_style',
        [
          'label' => __( 'Slider Style', 'themeworm' ),
          'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
      );

      $this->add_control('slider_title_color',
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

      $this->add_control('slider_subtitle_color',
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

      $this->add_control('slider_overlay_color',
          [
              'label'         => __('Overlay Color', 'themeworm'),
              'type'          => \Elementor\Controls_Manager::COLOR,
              'global'        => [
                'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY
              ],
              'selectors'     => [
                  '{{WRAPPER}} .plexx-fullscreen-title' => 'background: {{VALUE}};',
              ],
          ]
      );

      $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
              'name'          => 'slider_title_typography',
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
              'name'          => 'slider_subtitle_typography',
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
        $this->add_inline_editing_attributes('repeater_img_name', 'none');
        $this->add_inline_editing_attributes('repeater_img_desc', 'none');

        $this->add_render_attribute('plexx_slider', 'class', ['owl-carousel', 'owl-theme']);
        $this->add_render_attribute( 'plexx_slider', 'class', [ 'owl-carousel', 'plexx-owl-carousel' .  $this->get_id() ] );

        $this->add_render_attribute( 'plexx_hero_title', 'class', [ 'plexx-hero-title', 'wow', 'fadeIn', 'plexx-hero-title-' . esc_attr($settings['slider_align']) ] );


        if ("yes" === $settings['slider_full_width']) {

          $this->add_render_attribute( 'plexx_slider', 'class', [ 'plexx-owl-carousel', 'force-full-width' ] );

        } ?>

        <div <?php echo $this->get_render_attribute_string('plexx_slider'); ?> >

      		<?php if (!empty( $settings['slider_img_content'])) {

      			foreach( $settings['slider_img_content'] as $image  ) :

      				$plexx_image_url = (!empty( $image['repeater_gallery_img']['url'])) ? $image['repeater_gallery_img']['url'] : plugin_dir_url( __DIR__ ) . 'assets/images/noimage.jpg';
      				$plexx_slide_title = (!empty( $image['repeater_img_name'])) ? $image['repeater_img_name'] : '';
              $plexx_slide_subtitle = (!empty( $image['repeater_img_desc'])) ? $image['repeater_img_desc'] : '';
      				$plexx_slide_url = (!empty( $image['repeater_url'])) ? $image['repeater_url'] : '#';
              $plexx_slide_url = ( 'lightbox' == $image['repeater_link_type'] ) ? $plexx_image_url : $plexx_slide_url;
              $plexx_slide_url = ( 'video_lightbox' == $image['repeater_link_type'] && !empty( $image['repeater_video_url']) ) ? $image['repeater_video_url'] : $plexx_slide_url;
              $plexx_slide_url = ( 'none' == $image['repeater_link_type'] ) ? 'javascript:void(0)' : $plexx_slide_url;

              $this->add_render_attribute( $image['_id'], [
                      'class' => [
                          'slick-slide',
                          'elementor-repeater-item-' . $image['_id'],

                      ]
                  ]
              ); ?>

              <a <?php echo $this->get_render_attribute_string($image['_id']); ?>
              	<?php if ( ! \Elementor\Plugin::instance()->editor->is_edit_mode() ) {
                  if ( 'lightbox' == $image['repeater_link_type'] || 'video_lightbox' == $image['repeater_link_type'] ) { ?>
                    data-fancybox="group"
                   <?php } ?>
                  <?php } ?>
                   href="<?php echo esc_url($plexx_slide_url); ?>">
            		<div class="plexx-fullscreen-title">
            			<div <?php echo $this->get_render_attribute_string('plexx_hero_title'); ?>>
                    <?php if ("yes" === $settings['slider_title']) { ?>
            				      <h2><?php echo esc_html($plexx_slide_title); ?></h2>
                    <?php } ?>
            				<?php if( !empty( $image['repeater_img_desc'] ) && "yes" === $settings['slider_desc'] ) { ?>
            					<div class="hero-subtitle"><?php echo esc_html($plexx_slide_subtitle); ?></div>
            				<?php } ?>
            			</div>
            		</div>
            		<img src="<?php echo esc_url($plexx_image_url); ?>" alt="<?php echo esc_attr($plexx_slide_title); ?>" />
            	</a>

      			<?php endforeach;

          } ?>

        </div>

        <style>
        <?php if ("yes" !== $settings['slider_arrows']) { ?>
            .plexx-owl-carousel<?php echo $this->get_id(); ?> .owl-nav {
              display: none;
            }
          <?php } ?>

          <?php if ("yes" !== $settings['slider_dots']) { ?>
            .plexx-owl-carousel<?php echo $this->get_id(); ?> .owl-dots {
              display: none;
            }
          <?php } ?>
        </style>

        <?php if ( ! \Elementor\Plugin::instance()->editor->is_edit_mode() && 'yes' === $settings['slider_autoplay'] ) {
                $this->render_frontend_script();
        } ?>

        <?php if ( \Elementor\Plugin::instance()->editor->is_edit_mode() ) {
                $this->render_editor_script();
        } ?>

  <?php }


  protected function render_editor_script() {

    $settings = $this->get_settings_for_display();

    ?><script type="text/javascript">
      jQuery( document ).ready( function( $ ) {

        $(".owl-carousel").owlCarousel({
          autoplay: <?php echo ( 'yes' === $settings['slider_autoplay'] ) ? 'true' : 'false';?>,
    			items:1,
    			center:true,
    			nav:true,
    			pagination:true,
          loop:true,
    			dots:true,
          navSpeed:800,
          // autoHeight:true,
          autoplayTimeout: <?php echo ( !empty( $settings['autoplay_delay']['size'] ) ) ? esc_attr($settings['autoplay_delay']['size']) : '6000';?>
    		});

      });
    </script>
    <?php
  }

  protected function render_frontend_script() {

    $settings = $this->get_settings_for_display();

    ?><script type="text/javascript">
      jQuery( document ).ready( function( $ ) {

        $(".plexx-owl-carousel<?php echo $this->get_id(); ?>").owlCarousel({
      			autoplay: <?php echo ( 'yes' === $settings['slider_autoplay'] ) ? 'true' : 'false';?>,
      			items:1,
      			merge:true,
      			center:true,
      			lazyLoad:true,
      			nav:true,
      			pagination:true,
      			loop:true,
      			rewind:true,
      			dots:true,
      			navSpeed:800,
      			autoHeight:true,
      			autoplayTimeout: <?php echo ( !empty( $settings['autoplay_delay']['size'] ) ) ? esc_attr($settings['autoplay_delay']['size']) : '6000';?>
      		});

      });
    </script>
    <?php
  }




}
