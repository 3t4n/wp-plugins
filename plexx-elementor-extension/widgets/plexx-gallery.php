<?php

/**
 * Plexx Gallery Widget.
 */

use Elementor\Repeater;
use Elementor\Group_Control_Image_Size;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class Elementor_Plexx_Gallery extends \Elementor\Widget_Base {

    public function get_name() {
        return 'plexx_gallery';
    }

    public function get_title() {
        return __( 'Plexx Advanced Gallery', 'themeworm' );
    }

    public function get_icon() {
        return 'eicon-image-rollover';
    }

    public function get_categories() {
        return [ 'plexx-elementor-category' ];
    }

    public function get_keywords() {
        return ['layout', 'gallery', 'images', 'video', 'portfolio', 'plexx', 'masonry', 'lightbox', 'vimeo', 'youtube'];
    }

    public function __construct($data = [], $args = null) {
      parent::__construct($data, $args);
   }

    protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Gallery Settings', 'themeworm' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
          'gallery_style',
          [
            'label' => __( 'Gallery style', 'themeworm' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'masonry-item',
            'options' => [
              'masonry-item'  => __( 'Masonry', 'themeworm' ),
              'square' => __( 'Square', 'themeworm' ),
            ],
          ]
        );



      		$this->add_control(
      			'gallery_columns',
      			[
      				'label' => __( 'Columns', 'themeworm' ),
      				'type' => \Elementor\Controls_Manager::SELECT,
      				'default' => 'portfolio-three',
      				'options' => [
      					'portfolio-one'  => __( '1 column', 'themeworm' ),
      					'portfolio-two' => __( '2 columns', 'themeworm' ),
      					'portfolio-three' => __( '3 columns', 'themeworm' ),
      					'portfolio-four' => __( '4 columns', 'themeworm' ),
      					'portfolio-five' => __( '5 columns', 'themeworm' ),

      				],
      			]
      		);

          $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
              'name'             => 'thumbnail',
              'default'          => 'full',
            ]
          );

          $img_repeater = new REPEATER();

          $img_repeater->add_control('plexx_repeater_gallery_item',
              [
                  'label' => __( 'Upload Image', 'themeworm' ),
                  'type' => \Elementor\Controls_Manager::MEDIA,
                  'dynamic'       => [ 'active' => true ],
                  'default'       => [
                      'url'	=> plugin_dir_url( __DIR__ ) . 'assets/images/noimage.jpg',
                  ],
              ]);

              $img_repeater->add_control('plexx_repeater_item_title',
                  [
                      'label' => __( 'Title', 'themeworm' ),
                      'type' => \Elementor\Controls_Manager::TEXT,
                      'dynamic'       => [ 'active' => true ],
                      'label_block'   => true,
                  ]);

          $img_repeater->add_control('plexx_repeater_item_desc',
                  [
                      'label' => __( 'Description', 'themeworm' ),
                      'type' => \Elementor\Controls_Manager::TEXTAREA,
                      'dynamic'       => [ 'active' => true ],
                      'label_block' => true,
                  ]);

          $img_repeater->add_control('plexx_repeater_link_type',
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

          $img_repeater->add_control('plexx_repeater_url',
                          [
                              'label'         => __('URL', 'themeworm'),
                              'type'          => \Elementor\Controls_Manager::TEXT,
                              'dynamic'       => [
                                  'active' => true,
                              ],
                              'label_block'   => true,
                              'condition'     => [
                                  'plexx_repeater_link_type'=> 'url'
                              ]
                          ]
          );

          $img_repeater->add_control('plexx_repeater_video_url',
                          [
                              'label'         => __('Vimeo/Youtube URL', 'themeworm'),
                              'type'          => \Elementor\Controls_Manager::TEXT,
                              'dynamic'       => [
                                  'active' => true,
                              ],
                              'label_block'   => true,
                              'condition'     => [
                                  'plexx_repeater_link_type'=> 'video_lightbox'
                              ]
                          ]
          );

          $img_repeater->add_control('plexx_repeater_lightbox_caption',
                  [
                      'label' => __( 'Lightbox Caption', 'themeworm' ),
                      'type' => \Elementor\Controls_Manager::TEXTAREA,
                      'dynamic'       => [ 'active' => true ],
                      'label_block' => true,
                      'condition'     => [
                          'plexx_repeater_link_type'=> ['video_lightbox', 'lightbox']
                      ]
          ]);

          $img_repeater->add_control(
      			'plexx_repeater_video_ratio',
      			[
      				'label' => __( 'Video Lightbox Ratio', 'themeworm' ),
      				'type' => \Elementor\Controls_Manager::SELECT,
      				'default' => '1.777777',
      				'options' => [
      					'1.333333'  => __( '4:3', 'themeworm' ),
      					'1.777777' => __( '16:9 - default', 'themeworm' ),
      					'1.85' => __( '1.85:1', 'themeworm' ),
      					'2' => __( '2:1', 'themeworm' ),
      					'2.35' => __( '2.35:1', 'themeworm' ),
                '1' => __( '1:1', 'themeworm' ),
                '0.5625' => __( '9:16 - vertical', 'themeworm' ),
      				],
              'condition'     => [
                  'plexx_repeater_link_type'=> 'video_lightbox'
              ]
      			]
      		);

          $img_repeater->add_control(
            'gallery_hover_image_switcher',
            [
              'label' => __( 'Show Hover Image', 'themeworm' ),
              'type' => \Elementor\Controls_Manager::SWITCHER,
              'label_on' => __( 'Yes', 'themeworm' ),
              'label_off' => __( 'No', 'themeworm' ),
              'return_value' => 'yes',
              'default' => 'no',
            ]
          );

          $img_repeater->add_control('gallery_hover_image',
              [
                  'label' => __( 'Hover Image', 'themeworm' ),
                  'type' => \Elementor\Controls_Manager::MEDIA,
                  'dynamic'       => [ 'active' => true ],
                  'condition'     => [
                      'gallery_hover_image_switcher'=> 'yes'
                  ]
          ]);

          $img_repeater->add_control(
            'gallery_hover_webm_switcher',
            [
              'label' => __( 'Enable WebM/MP4 (experimental)', 'themeworm' ),
              'type' => \Elementor\Controls_Manager::SWITCHER,
              'label_on' => __( 'Yes', 'themeworm' ),
              'label_off' => __( 'No', 'themeworm' ),
              'return_value' => 'yes',
              'default' => 'no',
            ]
          );

          $img_repeater->add_control('plexx_repeater_webm_url',
                          [
                              'label'         => __('WebM video file URL', 'themeworm'),
                              'type'          => \Elementor\Controls_Manager::TEXT,
                              'placeholder' => __( 'Use files from your media gallery', 'themeworm' ),
                              'dynamic'       => [
                                  'active' => true,
                              ],
                              'label_block'   => true,
                              'condition'     => [
                                  'gallery_hover_webm_switcher'=> 'yes'
                              ]
                          ]
          );

          $img_repeater->add_control('plexx_repeater_mp4_url',
                          [
                              'label'         => __('MP4 video file URL', 'themeworm'),
                              'type'          => \Elementor\Controls_Manager::TEXT,
                              'placeholder' => __( 'Use files from your media gallery', 'themeworm' ),
                              'dynamic'       => [
                                  'active' => true,
                              ],
                              'label_block'   => true,
                              'condition'     => [
                                  'gallery_hover_webm_switcher'=> 'yes'
                              ]
                          ]
          );


          $this->add_control('gallery_items_content',
             [
                 'label' => __( 'Images', 'themeworm' ),
                 'type' => \Elementor\Controls_Manager::REPEATER,
                 'default' => [
                     [
                         'plexx_repeater_item_title'   => 'Image #1',
                     ],
                     [
                         'plexx_repeater_item_title'   => 'Image #2',
                     ],
                     [
                         'plexx_repeater_item_title'   => 'Image #3',
                     ],
                 ],
                 'fields' => $img_repeater->get_controls(),
                 'title_field'   => '{{{ "" !== plexx_repeater_item_title ? plexx_repeater_item_title : "Image" }}}',
             ]
         );

         $this->add_control(
           'gallery_full_width',
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
             'gallery_section2',
             [
                 'label' => __( 'Advanced Settings', 'themeworm' ),
                 'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
             ]
         );


         $this->add_control(
          'gallery_space_between',
          [
            'label' => __( 'Space Between', 'themeworm' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Yes', 'themeworm' ),
            'label_off' => __( 'No', 'themeworm' ),
            'return_value' => 'yes',
            'default' => 'yes',
          ]
        );


         $this->add_control(
          'gallery_show_titles',
          [
            'label' => __( 'Show Titles', 'themeworm' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Yes', 'themeworm' ),
            'label_off' => __( 'No', 'themeworm' ),
            'return_value' => 'yes',
            'default' => 'yes',
          ]
        );

         $this->add_control(
          'gallery_show_categories',
          [
            'label' => __( 'Show Descriptions', 'themeworm' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Yes', 'themeworm' ),
            'label_off' => __( 'No', 'themeworm' ),
            'return_value' => 'yes',
            'default' => 'yes',
          ]
        );

         $this->add_control(
          'gallery_show_icon',
          [
            'label' => __( 'Show Icon on Hover', 'themeworm' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Yes', 'themeworm' ),
            'label_off' => __( 'No', 'themeworm' ),
            'return_value' => 'yes',
            'default' => 'yes',
          ]
        );

        $this->add_control(
         'gallery_title_always_on',
         [
           'label' => __( 'Always Show Title', 'themeworm' ),
           'type' => \Elementor\Controls_Manager::SWITCHER,
           'label_on' => __( 'Yes', 'themeworm' ),
           'label_off' => __( 'No', 'themeworm' ),
           'return_value' => 'yes',
           'default' => 'no',
         ]
       );

       $this->add_control(
        'gallery_description_always_on',
        [
          'label' => __( 'Always Show Description', 'themeworm' ),
          'type' => \Elementor\Controls_Manager::SWITCHER,
          'label_on' => __( 'Yes', 'themeworm' ),
          'label_off' => __( 'No', 'themeworm' ),
          'return_value' => 'yes',
          'default' => 'no',
        ]
      );

        $this->end_controls_section();


        $this->start_controls_section(
          'gallery_title_style',
          [
            'label' => __( 'Portfolio Style', 'themeworm' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
          ]
        );

        $this->add_control(
        'gallery_color_options',
        [
          'label' => __( 'Colors', 'themeworm' ),
          'type' => \Elementor\Controls_Manager::HEADING,
          'separator' => 'before',
        ]
      );

        $this->add_control('gallery_title_color',
            [
                'label'         => __('Titles Color', 'themeworm'),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'global'        => [
                  'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY
                ],
                'selectors'     => [
                    '{{WRAPPER}} .item-description h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control('gallery_category_color',
            [
                'label'         => __('Description Color', 'themeworm'),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'global'        => [
                  'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY
                ],
                'selectors'     => [
                    '{{WRAPPER}} .item-filter' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control('gallery_overlay_color',
            [
                'label'         => __('Overlay Color', 'themeworm'),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'global'        => [
                  'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY
                ],
                'selectors'     => [
                    '{{WRAPPER}} .portfolio-item-slug .picture:before' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control('gallery_hover_color',
            [
                'label'         => __('Mouse Over Color', 'themeworm'),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'global'        => [
                  'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY
                ],
                'selectors'     => [
                    '{{WRAPPER}} .portfolio-link:after' => 'background: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
        'gallery_typo_options',
        [
          'label' => __( 'Typography', 'themeworm' ),
          'type' => \Elementor\Controls_Manager::HEADING,
          'separator' => 'before',
        ]
      );

      $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
              'name'          => 'gallery_title_typo',
              'label' => __( 'Title Typography', 'themeworm' ),
              'global' => [
                'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
               ],
              'selector'      => '{{WRAPPER}} .item-description h2',
          ]
      );

      $this->add_control(
        'gallery_title_align',
        [
          'label' => __( 'Title Alignment', 'themeworm' ),
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
          'default' => 'right',
          'toggle' => false,
          'selectors'     => [
              '{{WRAPPER}} .item-description' => 'text-align: {{VALUE}};',
          ]
        ]
      );

      $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
              'name'          => 'gallery_category_typo',
              'label' => __( 'Description Typography', 'themeworm' ),
              'global' => [
                'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
               ],
              'selector'      => '{{WRAPPER}} .item-filter',
          ]
      );

      $this->add_control(
        'gallery_category_align',
        [
          'label' => __( 'Description Alignment', 'themeworm' ),
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
          'default' => 'right',
          'toggle' => false,
          'selectors'     => [
              '{{WRAPPER}} .item-filter' => 'text-align: {{VALUE}};',
          ]
        ]
      );

      $this->end_controls_section();

    }


    protected function render() {

        $settings = $this->get_settings_for_display();

        $class_attr[] = ( "yes" === $settings['gallery_space_between'] ) ? 'add-space' : 'no-space';
        $class_attr[] = ( 'yes' === $settings['gallery_full_width'] ) ? 'force-full-width' : '';
        $group_id = rand(1, 999); ?>

				<div class="container portfolio_container boxed-style">
					<div id="portfolio-wrapper" class="wrapper-id<?php echo $this->get_id(); ?> <?php echo esc_attr($class_attr = (is_array($class_attr)) ? implode (' ', $class_attr) : ''); ?>">


          <?php if (!empty( $settings['gallery_items_content'])) {

            foreach( $settings['gallery_items_content'] as $image  ) :

							$rand = rand (0, 500);

              $plexx_image_url = (!empty( $image['plexx_repeater_gallery_item']['url'])) ? $image['plexx_repeater_gallery_item']['url'] : plugin_dir_url( __DIR__ ) . 'assets/images/noimage.jpg';

              $image_src = $image['plexx_repeater_gallery_item'];
              $image_src_size = Group_Control_Image_Size::get_attachment_image_src($image_src['id'], 'thumbnail', $settings);
              $image_src = empty( $image_src_size ) ? $image_src['url'] : $image_src_size;

              $plexx_slide_title = (!empty( $image['plexx_repeater_item_title'])) ? $image['plexx_repeater_item_title'] : '';
              $plexx_slide_subtitle = (!empty( $image['plexx_repeater_item_desc'])) ? $image['plexx_repeater_item_desc'] : '';
      				$plexx_slide_url = (!empty( $image['plexx_repeater_url'])) ? esc_url($image['plexx_repeater_url']) : '#';
              $plexx_slide_url = ( 'lightbox' == $image['plexx_repeater_link_type'] ) ? $plexx_image_url : $plexx_slide_url;
              $plexx_slide_url = ( 'video_lightbox' == $image['plexx_repeater_link_type'] && !empty( $image['plexx_repeater_video_url']) ) ? $image['plexx_repeater_video_url'] : $plexx_slide_url;
              $plexx_slide_url = ( 'none' == $image['plexx_repeater_link_type'] ) ? 'javascript:void(0)' : $plexx_slide_url;
              $data_caption = (!empty( $image['plexx_repeater_lightbox_caption'])) ? $image['plexx_repeater_lightbox_caption'] : '';

							$portfolio_main = wp_get_attachment_image_src( attachment_url_to_postid($plexx_image_url), 'full' );
							$ratio = (is_array($portfolio_main) && $portfolio_main[2] > 0) ? $portfolio_main[1]/$portfolio_main[2] : '1.77';
              $video_ratio = (!empty( $image['plexx_repeater_video_ratio'])) ? $image['plexx_repeater_video_ratio'] : '1.7777';

              $this->add_render_attribute( $image['_id'], [
                      'class' => [
                          (isset($settings['gallery_columns'])) ? $settings['gallery_columns'] : 'portfolio-three',
                          ( $settings['gallery_style'] ) ?: ' masonry-item',
                          'portfolio-item-slug',
                          'wow',
                          'fadeIn',
                          'elementor-repeater-item-' . $image['_id'],
                          ("yes" === $settings['gallery_show_icon']) ? '' : 'hide-hover-icons',
                          ("yes" === $settings['gallery_title_always_on']) ? 'title-alwayson' : '',
                          ("yes" === $settings['gallery_description_always_on']) ? 'filter-alwayson' : '',

                      ]
                  ]
              ); ?>

							<div class="portfolio_sizer"></div>
							<div <?php echo $this->get_render_attribute_string($image['_id']); ?> data-id="<?php echo $this->get_id(); ?>" data-wow-delay="<?php echo esc_attr($rand);?>ms">

								<div class="picture">
									<a href="<?php if ( ! \Elementor\Plugin::instance()->editor->is_edit_mode() ) { echo esc_url($plexx_slide_url); } ?>" class="portfolio-link <?php if ( 'video_lightbox' == $image['plexx_repeater_link_type'] && !empty( $image['plexx_repeater_video_url']) ) { echo 'video-popup'; } ?>" <?php if ( 'lightbox' == $image['plexx_repeater_link_type'] && ! \Elementor\Plugin::instance()->editor->is_edit_mode() || 'video_lightbox' == $image['plexx_repeater_link_type'] && ! \Elementor\Plugin::instance()->editor->is_edit_mode() ) { echo 'data-ratio="' . esc_attr($video_ratio) . '" data-fancybox="group-' . $group_id . '" data-caption="' . esc_attr($data_caption) . '"'; } ?> data-thumb="<?php echo esc_url($image_src); ?>" >


											<?php if ( !empty( $image['gallery_hover_image']['url']) && 'yes' === $image['gallery_hover_image_switcher'] ) {
												$hover_image = $image['gallery_hover_image']['url'];
                        $data_background = ''; ?>

												<div class="hover-thumb" data-background="<?php echo esc_url($hover_image); ?>" style="<?php if ( !empty( $image['gallery_hover_image']['url']) && 'yes' === $image['gallery_hover_image_switcher'] && \Elementor\Plugin::instance()->editor->is_edit_mode() ) { echo "background-image:url('" . esc_url($hover_image) . "')"; } ?>"></div>

											<?php } ?>

                    <?php if ( 'yes' == $image['gallery_hover_webm_switcher'] ) {


                      $hover_mp4 = !empty( $image['plexx_repeater_mp4_url']) ? $image['plexx_repeater_mp4_url'] : '' ;
                      $hover_webm = !empty( $image['plexx_repeater_webm_url']) ? $image['plexx_repeater_webm_url'] : $hover_mp4 ; ?>

                      <video class="hover-webm" autoplay loop muted preload="none">
                        <source src="<?php echo esc_url( $hover_webm ); ?>" type="video/webm">
                        <source src="<?php echo esc_url( $hover_mp4); ?>" type="video/mp4">
                      </video>

                    <?php } ?>

											<div class="thumb" data-ratio="<?php echo esc_attr($ratio) ?>" style="background-image:url('<?php echo esc_url($image_src); ?>');"></div>

									</a>
								</div>


									<div class="item-description">
                    <?php if ( "yes" === $settings['gallery_show_titles']) { ?>
										   <h2><?php echo (!empty( $image['plexx_repeater_item_title'])) ? esc_html($image['plexx_repeater_item_title']) : ''; ?></h2>
                    <?php } ?>
                    <?php if ( "yes" === $settings['gallery_show_categories']) { ?>
  										<div class="item-filter">
                        <?php echo (!empty( $image['plexx_repeater_item_desc'])) ? esc_html($image['plexx_repeater_item_desc']) : ''; ?>
  										</div>
                    <?php } ?>
									</div>


							</div>



            <?php endforeach;


          } ?>

				</div>

			</div>

      <?php if ( \Elementor\Plugin::instance()->editor->is_edit_mode() ) {
            $this->render_editor_script();
      } ?>

      <style>

        <?php $syles_set = array();

        $wrapper = '.wrapper-id' . $this->get_id() . ' ';

        $syles_set[] = ("yes" === $settings['gallery_show_titles']) ? '' : $wrapper . '.item-description h2';
        $syles_set[] = ("yes" === $settings['gallery_show_categories']) ? '' : $wrapper . '.item-filter';
        $syles_set[] = ("yes" === $settings['gallery_show_icon']) ? '' : $wrapper . '.portfolio-item-slug .thumb::before,' . $wrapper . ' .portfolio-item-slug .thumb::after,' . $wrapper . ' .portfolio-gallery-item .thumb::before,' . $wrapper . ' .portfolio-gallery-item .thumb::after,' . $wrapper . ' .slick-slide .justified-cross::before,' . $wrapper . ' .portfolio-item-slug .video-popup:before ';

        foreach( $syles_set as $set ) {
          echo ($set != '') ?  esc_attr($set) . ' {display: none;}' : '';
        } ?>

      </style>

  <?php  }


  protected function render_editor_script() { ?>

    <script type="text/javascript">

      var container = document.querySelector('.wrapper-id<?php echo $this->get_id(); ?>');
      var msnry = new Masonry( container, {
        itemSelector: '.portfolio-item-slug',
      });

      jQuery( document ).ready( function( $ ) {

        function plexx_getMasonry<?php echo $this->get_id(); ?>() {

          var $container = $( '.wrapper-id<?php echo $this->get_id(); ?>' ),

          newWidth = '.portfolio_sizer';

          $container.masonry( {
            // columnWidth: newWidth,
            itemSelector: '.portfolio-item-slug',
            transitionDuration: 0,
            isAnimated: false,
            // horizontalOrder: true
          });
        }

        function plexx_getHeight<?php echo $this->get_id(); ?>() {


            $('.portfolio-item-slug:not(.masonry-item):not(.portfolio-row)').each(function() {
              $(this).css({"height": $(this).width()})
            });

            $('.portfolio-item-slug').each( function() {
               var ratio = $( this ).find( '.thumb' ).attr( 'data-ratio' );
               var img_width = $( this ).width();

               if ( ratio > 1 ) {
                 var div_height = img_width / ratio;
               } else {
                 var div_height = img_width / ratio;
               }

               $( this ).css( { 'height': Math.floor( div_height ) } );
             } );

        }

        plexx_getHeight<?php echo $this->get_id(); ?>();
        plexx_getMasonry<?php echo $this->get_id(); ?>();

      });
    </script>

    <style>
      .portfolio-item-slug .thumb, .portfolio-item-slug .hover-thumb {
        opacity: 1;
      }
    </style>

  <?php }



}
