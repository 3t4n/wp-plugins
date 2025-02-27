<?php

/**
 * Plexx Portfolio Widget.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class Elementor_Portfolio_Widget extends \Elementor\Widget_Base {


    public function get_name() {
        return 'oembed';
    }

    public function get_title() {
        return __( 'Plexx Portfolio', 'themeworm' );
    }

    public function get_icon() {
        return 'eicon-gallery-grid';
    }

    public function get_categories() {
        return [ 'plexx-elementor-category' ];
    }

    public function get_keywords() {
        return ['layout', 'gallery', 'image', 'video', 'portfolio', 'plexx', 'masonry', 'lightbox', 'vimeo', 'youtube'];
    }

    public function __construct($data = [], $args = null) {
      parent::__construct($data, $args);
   }

    protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Basic Portfolio Settings', 'themeworm' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
          'portfolio_style',
          [
            'label' => __( 'Portfolio style', 'themeworm' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'masonry-item',
            'options' => [
              'masonry-item'  => __( 'Masonry', 'themeworm' ),
              'square' => __( 'Square', 'themeworm' ),
              'video16' => __( '16:9', 'themeworm' ),
            ],
          ]
        );



		$this->add_control(
			'column_style',
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

		$this->add_control(
			'show_counter',
			[
				'label' => __( 'Projects per Page', 'themeworm' ),
				'type' => \Elementor\Controls_Manager::SELECT,
        'description' => __( 'Big amount might affect page loading speed', 'themeworm' ),
				'default' => '6',
				'options' => [
					'1'  => __( '1', 'themeworm' ),
					'2' => __( '2', 'themeworm' ),
					'3' => __( '3', 'themeworm' ),
					'4' => __( '4', 'themeworm' ),
					'5' => __( '5', 'themeworm' ),
					'6' => __( '6', 'themeworm' ),
					'7'  => __( '7', 'themeworm' ),
					'8' => __( '8', 'themeworm' ),
					'9' => __( '9', 'themeworm' ),
					'10' => __( '10', 'themeworm' ),
					'11' => __( '11', 'themeworm' ),
					'12' => __( '12', 'themeworm' ),
					'13'  => __( '13', 'themeworm' ),
					'14' => __( '14', 'themeworm' ),
					'15' => __( '15', 'themeworm' ),
					'16' => __( '16', 'themeworm' ),
					'17' => __( '17', 'themeworm' ),
					'18' => __( '18', 'themeworm' ),
					'19'  => __( '19', 'themeworm' ),
					'20' => __( '20', 'themeworm' ),
          '21' => __( '21', 'themeworm' ),
          '22' => __( '22', 'themeworm' ),
          '23' => __( '23', 'themeworm' ),
          '24' => __( '24', 'themeworm' ),
          '25' => __( '25', 'themeworm' ),
          '26' => __( '26', 'themeworm' ),
          '27' => __( '27', 'themeworm' ),
          '28' => __( '28', 'themeworm' ),
          '29' => __( '29', 'themeworm' ),
          '30' => __( '30', 'themeworm' ),
          '40' => __( '40', 'themeworm' ),
          '50' => __( '50', 'themeworm' ),
				],
			]
		);

    $this->add_control(
			'projects_order',
			[
				'label' => __( 'Order', 'themeworm' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'date',
				'options' => [
					'date'  => __( 'Default (by Date)', 'themeworm' ),
					'menu_order' => __( 'Custom Sort', 'themeworm' ),
					'title' => __( 'by Title', 'themeworm' ),
					'name' => __( 'by Name (slug)', 'themeworm' ),
					'rand' => __( 'Random', 'themeworm' ),

				],
			]
		);


		$filters = ( function_exists('get_field') && get_field('categories_filters')) ? get_field('categories_filters') : '';
		$terms = get_terms( 'filters', array( 'include' => $filters, 'orderby' => 'slug' ) );
		$terms_array = array();

    if ( $terms ) {
  		foreach ( $terms as $term ) {
  			$terms_array[$term->term_id] = $term->name;
  		}
    }

		$this->add_control(
			'show_elements',
			[
				'label' => __( 'Filters', 'themeworm' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'multiple' => true,
				'options' =>
					$terms_array,
				'default' => [],
			]
		);

    $this->add_control(
      'portfolio_action',
      [
        'label' => __( 'Action on Click', 'themeworm' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => 'default',
        'options' => [
          'default'  => __( 'Default', 'themeworm' ),
          'lightbox' => __( 'Image Lightbox', 'themeworm' ),
          'none' => __( 'Do Nothing', 'themeworm' ),
        ],
      ]
    );

    $this->add_control(
      'full_width',
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
        'content_section2',
        [
            'label' => __( 'Advanced Settings', 'themeworm' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );


    $this->add_control(
			'space_between',
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
			'load_more',
			[
				'label' => __( 'Load More Button', 'themeworm' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'themeworm' ),
				'label_off' => __( 'No', 'themeworm' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

    $this->add_control(
			'show_original',
			[
				'label' => __( 'Show Original Images', 'themeworm' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'themeworm' ),
				'label_off' => __( 'No', 'themeworm' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

    $this->add_control(
			'show_filters',
			[
				'label' => __( 'Show filters', 'themeworm' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'themeworm' ),
				'label_off' => __( 'No', 'themeworm' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

    $this->add_control(
			'hide_all_filters',
			[
				'label' => __( 'Hide "ALL" in filters', 'themeworm' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'themeworm' ),
				'label_off' => __( 'No', 'themeworm' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

    $this->add_control(
			'active_filter',
			[
				'label' => __( 'Active Filter (Default: All)', 'themeworm' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'multiple' => false,
				'options' =>
					$terms_array,
				'default' => [],
			]
		);

    $this->add_control(
			'show_titles',
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
			'show_categories',
			[
				'label' => __( 'Show Categories', 'themeworm' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'themeworm' ),
				'label_off' => __( 'No', 'themeworm' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

    $this->add_control(
			'show_icon',
			[
				'label' => __( 'Show Icon on Hover', 'themeworm' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'themeworm' ),
				'label_off' => __( 'No', 'themeworm' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

      $this->end_controls_section();


      $this->start_controls_section(
        'section_title_style',
        [
          'label' => __( 'Portfolio Style', 'themeworm' ),
          'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
      );

      $this->add_control(
			'color_options',
			[
				'label' => __( 'Colors', 'themeworm' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

      $this->add_control('portfolio_title_color',
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

      $this->add_control('portfolio_category_color',
          [
              'label'         => __('Category Color', 'themeworm'),
              'type'          => \Elementor\Controls_Manager::COLOR,
              'global'        => [
                'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY
              ],
              'selectors'     => [
                  '{{WRAPPER}} .item-filter' => 'color: {{VALUE}};',
              ],
          ]
      );

      $this->add_control('portfolio_overlay_color',
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


      $this->add_control('portfolio_hover_color',
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

      $this->add_control('portfolio_filter_color',
          [
              'label'         => __('Filter Text Color', 'themeworm'),
              'type'          => \Elementor\Controls_Manager::COLOR,
              'global'        => [
                'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY
              ],
              'selectors'     => [
                  '{{WRAPPER}} .filters-container span' => 'color: {{VALUE}};',
              ],
          ]
      );

      $this->add_control('portfolio_loadmore_color',
          [
              'label'         => __('LoadMore Button Color', 'themeworm'),
              'type'          => \Elementor\Controls_Manager::COLOR,
              'global'        => [
                'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY
              ],
              'selectors'     => [
                  '{{WRAPPER}} .load-more a, {{WRAPPER}} .loadmore-img' => 'background: {{VALUE}};',
              ],
          ]
      );

      $this->add_control('portfolio_loadmore_icon_color',
          [
              'label'         => __('LoadMore Button Icon Color', 'themeworm'),
              'type'          => \Elementor\Controls_Manager::COLOR,
              'global'        => [
                'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY
              ],
              'selectors'     => [
                  '{{WRAPPER}} .load-more a:after, {{WRAPPER}} .load-more a:before' => 'background-color: {{VALUE}};',
              ],
          ]
      );

    //   $this->add_control(
		// 	'icon',
		// 	[
		// 		'label' => __( 'Icon', 'text-domain' ),
		// 		'type' => \Elementor\Controls_Manager::ICONS,
		// 		'default' => [
		// 			'value' => 'fas fa-star',
		// 			'library' => 'solid',
		// 		],
		// 	]
		// );

      $this->add_control(
			'typo_options',
			[
				'label' => __( 'Typography', 'themeworm' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name'          => 'title_typo',
            'label' => __( 'Titles Typography', 'themeworm' ),
            'global' => [
        			'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
        	   ],
            'selector'      => '{{WRAPPER}} .item-description h2',
        ]
    );

    $this->add_control(
			'title_align',
			[
				'label' => __( 'Titles Alignment', 'themeworm' ),
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
            'name'          => 'category_typo',
            'label' => __( 'Categories Typography', 'themeworm' ),
            'global' => [
        			'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
        	   ],
            'selector'      => '{{WRAPPER}} .item-filter',
        ]
    );

    $this->add_control(
			'category_align',
			[
				'label' => __( 'Categories Alignment', 'themeworm' ),
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

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name'          => 'filters_typo',
            'label' => __( 'Filters Typography', 'themeworm' ),
            'global' => [
        			'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
        	   ],
            'selector'      => '{{WRAPPER}} .filters-container span',
        ]
    );

    $this->add_control(
			'filters_align',
			[
				'label' => __( 'Filters Alignment', 'themeworm' ),
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
        'selectors'     => [
            '{{WRAPPER}} .filters-container' => 'text-align: {{VALUE}};',
        ]
			]
		);

    $this->add_control(
    'playbutton_options',
    [
      'label' => __( 'Play Button', 'themeworm' ),
      'type' => \Elementor\Controls_Manager::HEADING,
      'separator' => 'before',
    ]
  );

  $this->add_control(
    'playbutton_style',
    [
      'label' => __( 'Style', 'themeworm' ),
      'type' => \Elementor\Controls_Manager::SELECT,
      'default' => '\f04b',
      'options' => [
        '\f04b'  => __( 'Default Triangle', 'themeworm' ),
        '\f16a' => __( 'Youtube Logo', 'themeworm' ),
        '\f194' => __( 'Vimeo Logo', 'themeworm' ),
        '\f144' => __( 'Circle', 'themeworm' ),
        '\f01d' => __( 'Ring', 'themeworm' ),
      ],
      'selectors' => [
        '{{WRAPPER}} .portfolio-item-slug .video-popup:before' => 'content: "{{VALUE}}";',
      ],
    ]
  );

    $this->add_responsive_control(
			'playbutton_size',
			[
				'label' => __( 'Size', 'themeworm' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'max' => 100,
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
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .portfolio-item-slug .video-popup:before' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

      $this->end_controls_section();

    }

    protected function plexx_filter_container() { ?>

      <div class="filters-container">

      <?php $settings = $this->get_settings_for_display();
      $posts_per_page = ($settings['show_counter']) ?: 3;
      $portfolio_style = ('masonry-item' == $settings['portfolio_style'] || 'video16' == $settings['portfolio_style'] ) ? 'masonry' : '';
      $data_size = ("yes" === $settings['show_original']) ? "full" : '';
      // $filters = $settings['active_filter'] ?: $settings['show_elements'];
      $filters = $settings['show_elements'];
      $data_ratio = ( 'video16' == $settings['portfolio_style'] ) ? '1.7777' : '';
      $data_order = ( !empty($settings['projects_order']) ) ? $settings['projects_order'] : 'date';
        $filter_array = '';
        $all = 0;
        $terms = get_terms( 'filters', array( 'include' => $filters, 'orderby' => 'slug' ) );

        foreach ( $terms as $counter ) {
          $all = $all + $counter->count;
          $filter_array .= $counter->term_id . ',';
        }

        $data_filters = ($filters) ? $filter_array : 'all' ?>

        <ul id="filter" class="portfolio-filters">

          <?php if ( "yes" != $settings['hide_all_filters']) { ?>

                <li class="all-filter" data-filter="<?php echo esc_attr($data_filters); ?>" data-count="<?php echo esc_attr($all); ?>" data-container="<?php echo $this->get_id(); ?>" data-size="<?php echo esc_attr($data_size); ?>" data-style="<?php echo esc_attr($portfolio_style); ?>" data-columns="<?php echo esc_attr($settings['column_style']); ?>" data-perpage="<?php echo esc_attr($posts_per_page); ?>" data-order="' . esc_attr($data_order) . '"><span class="active"><?php esc_html_e( 'All', 'plexx' ); ?></span></li>

          <?php } ?>


            <?php	foreach ( $terms as $term ) {
              $active = ($term->term_id == $settings['active_filter']) ? 'class="active"' : '';
              echo '<li data-filter="' . $term->term_id . '" data-count="' . $term->count . '" data-container="'. $this->get_id() .'" data-size="' . $data_size . '" data-style="' . esc_attr($portfolio_style) . '" data-columns="' . esc_attr($settings['column_style']) . '" data-perpage="'. esc_attr($posts_per_page) .'" data-ratio="' . esc_attr($data_ratio) . '" data-order="' . esc_attr($data_order) . '"><span ' . $active . '>' . esc_html($term->name) . '</span></li>';
            } ?>
        </ul>

      </div>

    <?php }


    protected function plexx_load_more() {

      $settings = $this->get_settings_for_display();

      $posts_per_page = ($settings['show_counter']) ?: 3;
      $data_size = ("yes" === $settings['show_original']) ? "full" : '';
      $load_svg = plugin_dir_url( __DIR__ ) . 'assets/images/puff.svg';
      $show_elements = $settings['active_filter'] ? array($settings['active_filter']): $settings['show_elements'];
      $data_all = (!empty($data_all)) ? $data_all : plexx_get_tax_filters($show_elements, 'count');
      // $portfolio_style = (function_exists('get_field') && get_field('portfolio_type', $parent_id) == 'portfolio_masonry') ? 'masonry' : '';
    	$portfolio_style = ('masonry-item' == $settings['portfolio_style'] || 'video16' == $settings['portfolio_style'] ) ? 'masonry' : '';
      $data_filter = ($show_elements) ? plexx_get_tax_filters($show_elements) : 'all';
      $data_ratio = ( 'video16' == $settings['portfolio_style'] ) ? '1.7777' : '';
      $data_order = ( !empty($settings['projects_order']) ) ? $settings['projects_order'] : 'date';

      echo '<div class="load-more">';
      echo '<a href="#" id="next-projects" class="next-projects next-projects-id'. $this->get_id() .'" data-size="' . esc_attr($data_size) . '" data-parent_id="" data-style="' . esc_attr($portfolio_style) . '" data-all="'. esc_attr($data_all) .'" data-perpage="'. esc_attr($posts_per_page) .'" data-filter="'. $data_filter .'" data-container="'. $this->get_id() .'" data-columns="' . esc_attr($settings['column_style']) . '" data-ratio="' . esc_attr($data_ratio) . '" data-order="' . esc_attr($data_order) . '">'
        . '<img class="loadmore-img" src="' . esc_url($load_svg) . '" alt="loading" />'
        . '</a>'
        . '</div>';
    }


    protected function render() {

        $settings = $this->get_settings_for_display();


        $class_attr[] = ( "yes" === $settings['space_between'] ) ? 'add-space' : 'no-space';
        $class_attr[] = ( 'yes' === $settings['full_width'] ) ? 'force-full-width' : '';
        $class_attr[] = ( 'video16' == $settings['portfolio_style'] ) ? 'video16' : '';
        $class_attr[] = ( ! empty( $settings['column_style'] )) ? 'plexx-' . $settings['column_style'] : '';

        if ( "yes" === $settings['show_filters']) { $this->plexx_filter_container(); } ?>

				<div class="container portfolio_container boxed-style">
					<div id="ajax-loader" class="ajax-loader loader-id<?php echo $this->get_id(); ?>" data-container="<?php echo $this->get_id(); ?>">
						<div class="spinner">
							<div class="bounce1"></div>
							<div class="bounce2"></div>
							<div class="bounce3"></div>
						</div>
					</div>
					<div id="portfolio-wrapper" class="plexx-wrapper wrapper-id<?php echo $this->get_id(); ?> <?php echo esc_attr($class_attr = (is_array($class_attr)) ? implode (' ', $class_attr) : ''); ?>" data-masonry='{ "itemSelector": ".portfolio-item-slug" }'>


<?php			global $parent_id, $post; $i = 0;
					$themeworm_slug = ( get_option('themeworm_slug') ) ?: 'portfolio-item';
					$portfolio_sorting = ( $settings['projects_order'] ) ?: 'date';
          $portfolio_order = ($settings['projects_order'] == 'menu_order') ? "ASC" : "DESC";
					// $portfolio_order = (function_exists('get_field') && get_field('projects_order', $parent_id) == 'menu_order') ? "ASC" : "DESC";

          $show_elements = $settings['active_filter'] ?: $settings['show_elements'];

					$tax_query = ( $show_elements ) ? array( array( 'taxonomy' => 'filters', 'field' => 'term_id', 'terms' => $show_elements, 'operator' => 'IN' ) ) : '';

					$args = array(
						'post_type' => $themeworm_slug,
						'orderby' => $portfolio_sorting,
						'order'   => $portfolio_order,
						'posts_per_page' => $settings['show_counter'],
						'post_status' => 'publish',
						'post__not_in' => '',
						'tax_query' => $tax_query
					);

					$portfolio_query = new WP_Query( $args );
          $group_id = rand(1, 999);

						if ( $portfolio_query->have_posts() ) :
							while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post();

							$columns = new plexx_GetGlobal();
							$rand = rand (0, 500);

							$columns_style[] = 'fadeIn';

							$columns_style[] = (isset($settings['column_style'])) ? $settings['column_style'] : 'portfolio-three';

              $columns_style[] = ("yes" === $settings['show_icon']) ? '' : 'hide-hover-icons';

							$ratio = $image_url = '';
							$hover_image_size = ("yes" === $settings['show_original']) ? "plexx_fullsize" : 'plexx_blog-main';

								// $columns_style[] = ' masonry-item';
                $columns_style[] = ( $settings['portfolio_style'] ) ?: ' masonry-item';
                $columns_style[] = ( 'video16' == $settings['portfolio_style'] ) ? ' masonry-item' : '';

								$image_size = ("yes" === $settings['show_original']) ? "full" : "plexx_blog-main";

							if (has_post_thumbnail() && !post_password_required()) {
								$portfolio_main = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), $image_size );
								$ratio = ($portfolio_main[2] > 0) ? $portfolio_main[1]/$portfolio_main[2] : '';
								$image_url = (!empty($portfolio_main)) ? $portfolio_main[0] : '';
							} else {
								$image_url = plugin_dir_url( __DIR__ ) . 'assets/images/noimage.jpg';
								$ratio = 1;
							}

              $ratio = ("video16" == $settings['portfolio_style']) ? "1.7777" : $ratio;


              $image_full = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
              $image_full = (!empty($image_full)) ? $image_full[0] : '';

							$thumbnail_url = get_the_permalink();

							if ( function_exists('get_field') && get_field('show_lightbox') || function_exists('get_field') && get_field('lightbox_only', $columns->parent_id) ) {
								$thumbnail_data = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
								$thumbnail_url = esc_url($thumbnail_data[0]);
								if (function_exists('get_field') && get_field('video_url')) {
									preg_match('/src="(.+?)"/', get_field('video_url'), $matches);
									$thumbnail_url = isset($matches[1]) ? $matches[1] : get_field('video_url_safe');
								}
                if (get_field('selfhosted_mp4')) {
              		$selfhosted_mp4 = get_field('selfhosted_mp4');
              		$thumbnail_url = $selfhosted_mp4['url'];
              	}
							}

							$plexx_customurl = (function_exists('get_field') && get_field('custom_url')) ? get_field('custom_url') : '';
							$clickable_title = (function_exists('get_field') && get_field('clickable_title') && 'none' != $settings['portfolio_action']) ? ['<a href="' . get_the_permalink() . '">', '</a>'] : ['',''];
							$data_caption = (function_exists('get_field') && get_field('text_for_lightbox')) ? esc_attr(get_field('text_for_lightbox')) : '';
              $video_ratio = (function_exists('get_field') && get_field('lightbox_aspect_ratio', 'option')) ? get_field('lightbox_aspect_ratio', 'option') : '';
              $video_ratio = (function_exists('get_field') && get_field('current_lightbox_aspect_ratio') && "none" != get_field('current_lightbox_aspect_ratio')) ? get_field('current_lightbox_aspect_ratio') : $video_ratio;

              $portfolio_link = ($plexx_customurl) ? esc_url($plexx_customurl) : $thumbnail_url;
              $portfolio_link = ('lightbox' == $settings['portfolio_action']) ? $image_full : $portfolio_link;
              $portfolio_link = ('none' == $settings['portfolio_action']) ? 'javascript:void(0)' : esc_url($portfolio_link);

              $data_fancybox = (function_exists('get_field') && get_field('fancybox_url', 'options')) ? get_post_field( 'post_name', get_the_ID() ) : 'group-' . $group_id; ?>

							<div class="portfolio_sizer"></div>
							<div <?php post_class( esc_attr(implode (" ", $columns_style)) . ' portfolio-item-slug wow' ); ?> id="post-<?php the_ID(); ?>" data-id="<?php the_ID(); ?>" data-wow-delay="<?php echo esc_attr($rand);?>ms">

								<div class="picture">
									<a href="<?php if ( ! \Elementor\Plugin::instance()->editor->is_edit_mode() ) { echo esc_url($portfolio_link); } ?>" class="portfolio-link <?php if ( function_exists('get_field') && get_field('video_url') && get_field('show_lightbox') ) { echo 'video-popup'; } ?>"
                    <?php
                    if ('none' != $settings['portfolio_action']) {
                      if ( function_exists('get_field') && get_field('show_lightbox') && ! \Elementor\Plugin::instance()->editor->is_edit_mode() || function_exists('get_field') &&  get_field('lightbox_only', $columns->parent_id) && ! \Elementor\Plugin::instance()->editor->is_edit_mode() || ! \Elementor\Plugin::instance()->editor->is_edit_mode() && 'lightbox' == $settings['portfolio_action']) {
                        echo 'data-ratio="' . esc_attr($video_ratio) . '" data-fancybox="' . esc_attr($data_fancybox) . '" data-caption="' . esc_attr($data_caption) . '"';
                      }
                    } ?>

                    <?php if (function_exists('get_field') && get_field('video_url') || function_exists('get_field') && get_field('selfhosted_mp4') ) { echo 'data-type="video"'; } ?> data-thumb="<?php echo esc_url($image_url); ?>" >


										<?php if ( $columns->allow_multi_items && get_post_meta($post->ID, 'plexx_gallery_slider', TRUE) && get_post_meta($post->ID, 'plexx_featured_gallery', true) == "on" ) { ?>

											<?php get_template_part('/templates/content/content', 'items-gallery'); ?>

										<?php } else { ?>

											<?php if (function_exists('get_field') && get_field('hover_image', get_the_ID()) || function_exists('get_field') && get_field('hover_image_webm', get_the_ID()) || function_exists('get_field') && get_field('hover_image_mp4', get_the_ID()) ) {
                        if (get_field('hover_image', get_the_ID()) && !get_field('hover_image_webm', get_the_ID())) {

  												$hover_image = get_field('hover_image', get_the_ID());
  												$hover_size = (function_exists('get_field') && get_field('show_fullsize_image')) ? $hover_image['url'] : $hover_image['sizes'][$hover_image_size];
  												$data_background = (function_exists('get_field') && get_field('hover_image_lazyload') || $hover_size) ? $hover_size : '';
  												$hover_size = (function_exists('get_field') && get_field('hover_image_lazyload')) ? '' : $hover_size; ?>

  												<div class="hover-thumb" data-background="<?php echo esc_url($data_background); ?>" style="background-image:url('<?php echo esc_url($hover_size); ?>');"></div>

											  <?php }

                        if (get_field('hover_image_webm', get_the_ID()) || get_field('hover_image_mp4', get_the_ID())) {

              						$hover_file = get_field('hover_image_webm', get_the_ID()) ?: '';
              						$hover_mp4 = get_field('hover_image_mp4', get_the_ID()) ?: ''; ?>

              						<video class="hover-webm no-autoplay" loop muted preload="none">
              							<source src="<?php echo esc_url(  is_array($hover_file) ? $hover_file['url'] : '' ); ?>" type="video/webm">
                						<source src="<?php echo esc_url( ($hover_mp4) ? $hover_mp4['url'] : $hover_file['url'] ); ?>" type="video/mp4">
              						</video>

              					<?php } ?>

                      <?php } ?>

											<div class="thumb" data-ratio="<?php echo esc_attr($ratio) ?>" style="background-image:url('<?php echo esc_url($image_url); ?>');"></div>

										<?php } ?>

									</a>
								</div>

								<?php if (function_exists('get_field') && !get_field('hide_hover_info')) { ?>

									<div class="item-description <?php echo esc_attr( $clickable_title_class = get_field('clickable_title') ? 'clickable-title' : '' ); ?>">
                    <?php if ( "yes" === $settings['show_titles']) { ?>

                      <?php if (function_exists('get_field') && get_field('clickable_title') && 'none' != $settings['portfolio_action']) { ?>
										   <h2><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h2>
                     <?php } else { ?>
                        <h2><?php the_title(); ?></h2>
                       <?php } ?>
                    <?php } ?>
                    <?php if ( "yes" === $settings['show_categories']) { ?>
  										<div class="item-filter">
  											<?php if (get_field('filter_text')) {

  												echo esc_html( get_field('filter_text') );

  											} else {

  												$terms = get_the_terms( $post->ID, 'filters');
  												if ( $terms ) {
  													foreach ( $terms as $term ) {

  														echo esc_html( $term->name ) . ' ';

  													}
  												}
  											} ?>
  										</div>
                    <?php } ?>
									</div>

								<?php } ?>

							</div>

              <?php endwhile;

							wp_reset_postdata();
						else :

                $this->get_empty_query_message();
                return;

            endif;

				 ?>

				</div>

			</div>


      <?php if ( \Elementor\Plugin::instance()->editor->is_edit_mode() ) {
             $this->render_editor_script();
      } ?>

      <style>

      <?php $syles_set = array();

        $wrapper = '.wrapper-id' . $this->get_id() . ' ';

        $syles_set[] = ("yes" === $settings['show_titles']) ? '' : $wrapper . '.item-description h2';
        $syles_set[] = ("yes" === $settings['show_categories']) ? '' : $wrapper . '.item-filter';
        $syles_set[] = ("yes" === $settings['show_icon']) ? '' : $wrapper . '.portfolio-item-slug .thumb::before,' . $wrapper . ' .portfolio-item-slug .thumb::after,' . $wrapper . ' .portfolio-gallery-item .thumb::before,' . $wrapper . ' .portfolio-gallery-item .thumb::after,' . $wrapper . ' .slick-slide .justified-cross::before,' . $wrapper . ' .portfolio-item-slug .video-popup:before ';

        foreach( $syles_set as $set ) {
          echo ($set != '') ?  esc_attr($set) . ' {display: none;}' : '';
        } ?>

      </style>



  <?php if ( "yes" === $settings['load_more']) { $this->plexx_load_more(); }

  }


    protected function render_editor_script() {

      // add_action( 'elementor/editor/before_enqueue_scripts', function() {
      //    	wp_enqueue_script( 'jquery-migrate', get_theme_file_uri( '/assets/js/jquery-migrate-1.4.1.min.js' ), array( 'jquery' ), false, true );
      // } );

      ?><script type="text/javascript">

          var container = document.querySelector('.wrapper-id<?php echo $this->get_id(); ?>');
          var msnry = new Masonry( container, {
            itemSelector: '.portfolio-item-slug',
          });

        ( function( $ ) {
        $( document ).ready( function( $ ) {

          plexx_getHeight<?php echo $this->get_id(); ?>();
          plexx_getMasonry<?php echo $this->get_id(); ?>();

          function plexx_getMasonry<?php echo $this->get_id(); ?>() {

              $( '.wrapper-id<?php echo $this->get_id(); ?>' ).masonry( {
                itemSelector: '.portfolio-item-slug',
              });

          }

          function plexx_getHeight<?php echo $this->get_id(); ?>() {

            $( '.next-projects' ).each( function() {
        			var this_perpage = +$( this ).attr( 'data-perpage' );

        			if ( this_perpage >= $( this ).attr( 'data-all' ) ) {
                $( this ).parent().html( 'No more projects to load!' );
        				// $( this ).parent().addClass( 'hide' );
        			}

        		});


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

          $('.portfolio-item-slug').hover(function() {
      			if (typeof $(this).find('.hover-thumb').attr('data-background') !== 'undefined' && $(window).width() > 959) {
      				$(this).find('.hover-thumb').css({ 'background-image' : 'url(' + $(this).find('.hover-thumb').attr('data-background') + ')', 'display' : 'none'}).fadeIn(100);
      				$(this).mouseleave(function() {
      					$(this).find('.hover-thumb').css({ 'background-image' : '', 'display' : 'none'});
      				});
      			}
      		});

        });
        } )( jQuery );

      </script>
      <style>
        .portfolio-item-slug .thumb, .portfolio-item-slug .hover-thumb {
          opacity: 1;
        }
      </style>
      <?php
    }

    protected function get_empty_query_message() {
        ?>
        <div class="error-notice">
            <?php echo __('The current query has no projects. Please make sure you have published items matching your query.','themeworm'); ?>
        </div>
        <?php
    }


}
