<?php

/**
 * Plexx Blog Widget.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class Elementor_Plexx_Blog extends \Elementor\Widget_Base {

    public function get_name() {
        return 'plexx_blog';
    }

    public function get_title() {
        return __( 'Plexx Blog', 'themeworm' );
    }

    public function get_icon() {
        return 'eicon-edit';
    }

    public function get_categories() {
        return [ 'plexx-elementor-category' ];
    }

    public function get_keywords() {
        return ['text', 'plexx', 'blog', 'journal', 'minimal'];
    }

    public function __construct($data = [], $args = null) {
      parent::__construct($data, $args);
    }

    protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Blog Settings', 'themeworm' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
          'blog_style',
          [
            'label' => __( 'Blog style', 'themeworm' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'minimal',
            'options' => [
              'packery'  => __( 'Packery', 'themeworm' ),
              'minimal' => __( 'Minimal', 'themeworm' ),
            ],
          ]
        );

  		$this->add_control(
  			'post_counter',
  			[
  				'label' => __( 'Posts Count', 'themeworm' ),
  				'type' => \Elementor\Controls_Manager::SELECT,
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
  				],
  			]
  		);

      $this->add_control(
  			'post_order',
  			[
  				'label' => __( 'Order', 'themeworm' ),
  				'type' => \Elementor\Controls_Manager::SELECT,
  				'default' => 'date',
  				'options' => [
  					'date'  => __( 'Default (by Date)', 'themeworm' ),
  					// 'menu_order' => __( 'Custom Sort', 'themeworm' ),
  					'title' => __( 'by Title', 'themeworm' ),
  					'name' => __( 'by Name (slug)', 'themeworm' ),
  					'rand' => __( 'Random', 'themeworm' ),

  				],
  			]
  		);

      $categories = get_categories( [
      	'taxonomy'     => 'category',
      	'type'         => 'post',
      	'orderby'      => 'slug',
      ] );

      $cat_array = array();

      if ( $categories ) {
    		foreach ( $categories as $term ) {
    			$cat_array[$term->term_id] = $term->name;
    		}
      }

      $this->add_control(
  			'show_categories',
  			[
  				'label' => __( 'Categories', 'themeworm' ),
  				'type' => \Elementor\Controls_Manager::SELECT2,
  				'multiple' => true,
  				'options' =>
  					$cat_array,
  				'default' => [],
  			]
  		);

      $this->add_control(
  			'post_words',
  			[
  				'label' => __( 'Words to Show', 'themeworm' ),
  				'type' => \Elementor\Controls_Manager::SELECT,
  				'default' => '25',
  				'options' => [
  					'5'  => __( '5', 'themeworm' ),
  					'10' => __( '10', 'themeworm' ),
  					'15' => __( '15', 'themeworm' ),
  					'20' => __( '20', 'themeworm' ),
  					'25' => __( '25', 'themeworm' ),
            '30' => __( '30', 'themeworm' ),
  					'35' => __( '35', 'themeworm' ),
  					'45' => __( '45', 'themeworm' ),
            '55' => __( '55', 'themeworm' ),
            '65' => __( '65', 'themeworm' ),
            '75' => __( '75', 'themeworm' ),

  				],
  			]
  		);

      $this->add_control(
  			'blog_full_width',
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
        'blog_loadmore',
        [
          'label' => __( 'Show Load More', 'themeworm' ),
          'type' => \Elementor\Controls_Manager::SWITCHER,
          'label_on' => __( 'Yes', 'themeworm' ),
          'label_off' => __( 'No', 'themeworm' ),
          'return_value' => 'yes',
          'default' => 'no',
        ]
      );

        $this->add_control(
    			'show_dates',
    			[
    				'label' => __( 'Show Dates', 'themeworm' ),
    				'type' => \Elementor\Controls_Manager::SWITCHER,
    				'label_on' => __( 'Yes', 'themeworm' ),
    				'label_off' => __( 'No', 'themeworm' ),
    				'return_value' => 'yes',
    				'default' => 'yes',
    			]
    		);

      $this->add_control(
        'packery_options',
        [
          'label' => __( 'Only for Packery style', 'themeworm' ),
          'type' => \Elementor\Controls_Manager::HEADING,
          'separator' => 'before',
          'condition'     => [
              'blog_style' => 'packery',
          ]
        ]
      );


      $this->add_control(
  			'show_text',
  			[
  				'label' => __( 'Show Text', 'themeworm' ),
  				'type' => \Elementor\Controls_Manager::SWITCHER,
  				'label_on' => __( 'Yes', 'themeworm' ),
  				'label_off' => __( 'No', 'themeworm' ),
  				'return_value' => 'yes',
  				'default' => 'yes',
          'condition'     => [
              'blog_style' => 'packery',
          ]
  			]
  		);

      $this->add_control(
  			'show_separator',
  			[
  				'label' => __( 'Show Separator', 'themeworm' ),
  				'type' => \Elementor\Controls_Manager::SWITCHER,
  				'label_on' => __( 'Yes', 'themeworm' ),
  				'label_off' => __( 'No', 'themeworm' ),
  				'return_value' => 'yes',
  				'default' => 'yes',
          'condition'     => [
              'blog_style' => 'packery',
          ]
  			]
  		);

      $this->end_controls_section();


      $this->start_controls_section(
        'section_title_style',
        [
          'label' => __( 'Blog Style', 'elementor' ),
          'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
      );

      $this->add_control('blog_title_color',
          [
              'label'         => __('Titles Color', 'themeworm'),
              'type'          => \Elementor\Controls_Manager::COLOR,
              'global'        => [
                'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY
              ],
              'selectors'     => [
                  '{{WRAPPER}} .minimal-post h2, {{WRAPPER}} .post-title h2' => 'color: {{VALUE}};',
              ],
          ]
      );

      $this->add_control('blog_date_color',
          [
              'label'         => __('Dates Color', 'themeworm'),
              'type'          => \Elementor\Controls_Manager::COLOR,
              'global'        => [
                'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY
              ],
              'selectors'     => [
                  '{{WRAPPER}} .minimal-date span, {{WRAPPER}} .blog-item .date-number' => 'color: {{VALUE}};',
              ],
          ]
      );

      $this->add_control('blog_text_color',
          [
              'label'         => __('Text Color', 'themeworm'),
              'type'          => \Elementor\Controls_Manager::COLOR,
              'global'        => [
                'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY
              ],
              'selectors'     => [
                  '{{WRAPPER}} .minimal-text p, {{WRAPPER}} .minimal-hide .readmore, .preview-text, {{WRAPPER}} .blog-item blockquote, {{WRAPPER}} .blog-item .link-text' => 'color: {{VALUE}};',
                  '{{WRAPPER}} .minimal-hide .readmore' => 'border-color: {{VALUE}};',
              ],
          ]
      );

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
              'selector'      => '{{WRAPPER}} .blog-content .type-post h2',
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
          'default' => '',
          'toggle' => false,
          'selectors'     => [
              '{{WRAPPER}} .blog-item .post-title' => 'text-align: {{VALUE}};',
          ]
        ]
      );

      $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
              'name'          => 'dates_typo',
              'label' => __( 'Dates Typography', 'themeworm' ),
              'global' => [
                'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
               ],
              'selector'      => '{{WRAPPER}} .blog-item .date-number',
          ]
      );

      $this->add_control(
        'dates_align',
        [
          'label' => __( 'Dates Alignment', 'themeworm' ),
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
          'default' => '',
          'toggle' => false,
          'selectors'     => [
              '{{WRAPPER}} .blog-item .date-number' => 'text-align: {{VALUE}};',
          ]
        ]
      );

      $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
              'name'          => 'text_typo',
              'label' => __( 'Text Typography', 'themeworm' ),
              'global' => [
                'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
               ],
              'selector'      => '{{WRAPPER}} .content-preview .preview-text, {{WRAPPER}} .blog-item blockquote, {{WRAPPER}} .blog-item .link-text',
          ]
      );

      $this->add_control(
        'text_align',
        [
          'label' => __( 'Text Alignment', 'themeworm' ),
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
          'default' => '',
          'toggle' => false,
          'selectors'     => [
              '{{WRAPPER}} .content-preview .preview-text' => 'text-align: {{VALUE}};',
          ]
        ]
      );


        $this->end_controls_section();

    }


  protected function get_post_layout_minimal() {

      $settings = $this->get_settings();

      $post_id = get_the_ID();

      $rand = rand (0, 400); $link = '';
      $words_to_show =  $settings['post_words'] ?: 55;
      $blog_animation = 'fadeIn';

      if ( function_exists('get_post_format') && get_post_format($post_id) == 'link' ) {
      	$link = get_the_content();
      	$link = strip_tags($link);
      }

      if (has_post_thumbnail()) {
      	$thumbnail_data = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full' );
      	$thumbnail_url = $thumbnail_data[0];
      } ?>

      <article <?php post_class('loop minimal-post wow ' . esc_attr($blog_animation)); ?> id="post-<?php the_ID(); ?>" data-id="<?php the_ID(); ?>" data-wow-delay="<?php echo esc_attr($rand);?>ms">

      			<div class="half-blog minimal-date">
              <span class="simple-date">&nbsp;
                <?php if ("yes" === $settings['show_dates']) { ?>
                  <?php echo get_the_date(get_option('date_format')); ?>
                <?php } ?>
              &nbsp;</span>
            </div>

      			<div class="half-blog minimal-content">

      				<h2><?php the_title(); ?></h2>

      				<div class="minimal-hide">

      					<?php if ( ! \Elementor\Plugin::instance()->editor->is_edit_mode() && function_exists('get_post_format') && get_post_format() != 'link' && get_post_format() != "quote") { ?>

      						<?php get_template_part('/templates/blog/blog', get_post_format()); ?>

      					<?php } ?>

      					<div class="minimal-text"><p>
      						<?php if (get_the_content() && function_exists('get_post_format') && !in_array(get_post_format(), array('link', 'quote', 'audio')) ) {
      							echo strip_shortcodes(wp_trim_words( get_the_content(), $words_to_show ));
      						} else { ?>
      							<?php if (get_post_format() == 'link') { ?>
      								<div class="link-simple-text">
      									<?php the_content(); ?>
      								</div>
      							<?php } else { ?>
      								<?php the_content(); ?>
      							<?php } ?>
      						<?php } ?>
      					</p></div>

      					<a class="readmore" href="<?php get_post_format() == 'link' && function_exists('get_field') && get_field('url_for_post_link') ? esc_url(the_field('url_for_post_link')) : the_permalink(); ?>"><?php echo get_post_format() == 'link' && function_exists('get_field') && get_field('url_for_post_link') ? esc_html__( 'Open Link', 'plexx' ) : esc_html__( 'Read more', 'plexx' ); ?></a>

      				</div>

      			</div>

      </article>

  <?php }

  protected function get_post_layout_packery() {

      $settings = $this->get_settings();

      $words_to_show =  $settings['post_words'] ?: 55;

      $post_id = get_the_ID();

      $rand = rand (0, 400); $link = '';

      $blog_animation[] = 'fadeIn';
      $blog_animation[] = (function_exists('get_field') && get_field('post_packery_size')) ? 'size-' . get_field('post_packery_size') : 'size-1x1';

      if ( function_exists('get_post_format') && get_post_format($post_id) == 'link' ) {
        $link = get_the_content();
        $link = strip_tags($link);
      }

      $thumbnail_url = '';

      if (has_post_thumbnail()) {
        $thumbnail_data = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full' );
        $thumbnail_url = $thumbnail_data[0];
      } ?>

      <div class="blog_sizer"></div>
      <article <?php post_class('loop blog-three column blog-packery blog-item wow ' . esc_attr( implode(" ", $blog_animation))); ?> id="post-<?php the_ID(); ?>" data-id="<?php the_ID(); ?>" data-wow-delay="<?php echo esc_attr($rand); ?>ms">

      	<?php if (function_exists('get_post_format') && get_post_format() != 'link' && get_post_format() != "quote") { ?>

      		<a href="<?php the_permalink(); ?>" rel="bookmark" class="blog-link"></a>

      		<div class="blog-image" style="background-image:url('<?php echo esc_url($thumbnail_url); ?>')"></div>

      		<div class="post-title">
      			<h2><?php the_title(); ?></h2>
      		</div>

      		<div class="content-preview">

            <?php if ("yes" === $settings['show_dates']) { ?>

        			<div class="date-number">
        				<?php if (function_exists('get_field') && !get_field('hide_date')) { ?>
        					<?php echo get_the_date(get_option( 'date_format' )); ?>
        				<?php } ?>
        			</div>

            <?php } ?>

            <?php if ("yes" === $settings['show_separator']) { ?>

      			     <div class="gradient"></div>

            <?php } ?>

            <?php if ("yes" === $settings['show_text']) { ?>
        			<div class="preview-text">
        				<?php echo wp_trim_words( strip_shortcodes(get_the_content()), $words_to_show ); ?>
        			</div>
            <?php } ?>
      		</div>

      	<?php } elseif (function_exists('get_post_format') && get_post_format() == 'quote') {  ?>

      		<div class="post-title">
      			<h2>
      				<a href="<?php the_permalink(); ?>" rel="bookmark">
      					<?php the_title(); ?>
      				</a>
      			</h2>
      		</div>

      		<div class="post-quote"><i class="fa fa-quote-right"></i></div>

      		<a href="<?php the_permalink(); ?>" class="blog-link"></a>
      		<?php echo '<blockquote>' . wp_trim_words( strip_shortcodes(get_the_content()), $words_to_show ) . '</blockquote>'; ?>

      	<?php } else { ?>

      		<a href="<?php get_post_format() == 'link' && function_exists('get_field') && get_field('url_for_post_link') ? esc_url(the_field('url_for_post_link')) : the_permalink(); ?>" class="blog-link"></a>
      		<div class="post-title">
      			<h2>
      				<a href="<?php echo esc_url(get_field('url_for_post_link') ? the_field('url_for_post_link') : the_permalink()); ?>" rel="bookmark">
      					<?php the_title(); ?>
      				</a>
      			</h2>
      		</div>

      		<div class="post-link"><i class="fa fa-link"></i></div>
      		<?php echo '<div class="link-text">' . wp_trim_words( strip_shortcodes(get_the_content()), $words_to_show ) . '</div>'; ?>

      	<?php } ?>

      </article>

  <?php }

  protected function render() {

      $paged = max( 1, get_query_var( 'paged' ), get_query_var( 'page' ) );

      $settings = $this->get_settings();

      $offset = ! empty( $settings['premium_blog_offset'] ) ? $settings['premium_blog_offset'] : 0;

      $post_per_page = ! empty( $settings['post_counter'] ) ? $settings['post_counter'] : 6;

      $new_offset = $offset + ( ( $paged - 1 ) * $post_per_page );

      $categories_fromsettings = ! empty( $settings['show_categories'] ) ? $settings['show_categories'] : '';

      $orderby = ! empty( $settings['post_order'] ) ? $settings['post_order'] : 'date';

      $post_args = array(
          'author'            => '',
          'category'          => $categories_fromsettings,
          'orderby'           => $orderby,
          'posts_per_page'    => $post_per_page,
          'paged'             => $paged,
          'offset'            => $new_offset,
      );

      $defaults = array(
          'author'            => '',
          'category'          => '',
          'orderby'           => '',
          'posts_per_page'    => 3,
          'paged'             => $paged,
          'offset'            => $new_offset,
      );

      $query_args = wp_parse_args( $post_args, $defaults );

      $posts = get_posts( $query_args );

      if( ! count( $posts ) ) {

          $this->get_empty_query_message();
          return;

      }


      $this->add_render_attribute('plexx_minimal', 'class', ['blog-container' , 'wrapper-id' . $this->get_id() ]);

      if ("packery" === $settings['blog_style']) {
        $this->add_render_attribute('plexx_minimal', 'class', ['blog-content' ]);
      }


      if ("minimal" === $settings['blog_style']) {
        $this->add_render_attribute('plexx_minimal', 'class', ['blog-minimal' ]);
      }


      if ("yes" === $settings['blog_full_width']) {

        $this->add_render_attribute( 'plexx_minimal', 'class', [ 'blog-container', 'force-full-width' ] );

      }

  ?>

  <div <?php echo $this->get_render_attribute_string('plexx_minimal'); ?>>


    <?php

    if( count( $posts ) ) {
        global $post;
        foreach( $posts as $post ) {
            setup_postdata( $post );
            if ("packery" === $settings['blog_style']) {
              $this->get_post_layout_packery();
            } else {
              $this->get_post_layout_minimal();
            }
        }

      }
    ?>

  </div>

    <?php if ("yes" === $settings['blog_loadmore']) {
      $this->widget_load_posts();
    } ?>

    <style>
    <?php $syles_set = array();

      $wrapper = '.wrapper-id' . $this->get_id() . ' ';

      $syles_set[] = ("yes" === $settings['show_dates']) ? '' : $wrapper . '.date-number,' . $wrapper . '.date-itself';
      $syles_set[] = ("yes" === $settings['show_separator']) ? '' : $wrapper . '.content-preview .gradient';
      $syles_set[] = ("yes" === $settings['show_text']) ? '' : $wrapper . '.preview-text';

      foreach( $syles_set as $set ) {
        echo ($set != '') ?  esc_attr($set) . ' {display: none;}' : '';
      } ?>
    </style>

    <?php wp_reset_postdata();

      if ( \Elementor\Plugin::instance()->editor->is_edit_mode() ) {
              $this->render_editor_script();
        }

  }

  protected function widget_load_posts() {

    $settings = $this->get_settings();

    $blog_style = ! empty( $settings['blog_style'] ) ? $settings['blog_style'] : 'minimal';

  	$post_per_page = ! empty( $settings['post_counter'] ) ? $settings['post_counter'] : 6;
  	$load_svg = plugin_dir_url( __DIR__ ) . 'assets/images/puff.svg';
  	$blog_class = (isset($blog_style) && $blog_style == 'packery') ? 'load-packery' : 'load-posts';
  	$data_all = wp_count_posts();
    $count = $data_all->publish;

    $show_categories = ! empty( $settings['show_categories'] ) ? $settings['show_categories'] : false;
    $data_filter = ! empty( $settings['show_categories'] ) ? implode (',', $settings['show_categories']) : 'all';

    if ($show_categories) {
      $count = 0;
      foreach ($show_categories as $category) {
        $cat_id = get_category($category);
        $count += $cat_id->category_count;
      }
    }

  	echo '<div class="load-more load-posts">'
    . '<a href="#" id="next-posts" class="next-posts" data-filter="'. esc_attr($data_filter) .'" data-style="' . esc_attr($blog_style) . '" data-parent_id="" data-all="' . esc_attr($count) . '" data-perpage="' . esc_attr($post_per_page) . '" data-container="'. $this->get_id() .'">'
    . '<img class="loadmore-img loadmore-posts-img" src="' . esc_url($load_svg) . '" alt="loading" />'
    . '</a>'
    . '</div>';
  }

  protected function render_editor_script() { ?>

    <script type="text/javascript">

      jQuery( document ).ready( function( $ ) {

        function plexx_getMasonry<?php echo $this->get_id(); ?>() {

          var $container = $( '.wrapper-id<?php echo $this->get_id(); ?>' ),

          newWidth = '.blog_sizer';

          if (!$(".wrapper-id<?php echo $this->get_id(); ?>").is(".blog-minimal") ) {

            $container.masonry( {
              itemSelector: '.blog-item',
              transitionDuration: 0,
              isAnimated: false,
          });

          }
        }

        function plexx_getBlogHeight<?php echo $this->get_id(); ?>() {

          $( '.next-posts' ).each( function() {
      			var this_perpage = +$( this ).attr( 'data-perpage' );

      			if ( this_perpage >= $( this ).attr( 'data-all' ) ) {
              $( this ).parent().html( 'No more posts to load!' );
      				// $( this ).parent().addClass( 'hide' );
      			}

      		});

      		if ($("div").is(".blog-content.wrapper-id<?php echo $this->get_id(); ?>") ) {
            var itemWidth = $(".blog-content.wrapper-id<?php echo $this->get_id(); ?>").width()/3 - 40;
      			$('.blog-item').each(function() {
      				var $this = $(this);
      				if ($this.hasClass('size-2x2')) {
      					$(this).css({"height": Math.floor((itemWidth - 40)/1.5 * 2 + 40)})
      				} else if ($this.hasClass('size-2x1')) {
      					if ($(window).width() > 959) {
      						$(this).css({"height": Math.floor( (itemWidth - 40)/1.5 )})
      					} else {
      						$(this).css({"height": Math.floor(itemWidth()/1.5)})
      					}
      				} else if ($this.hasClass('size-1x2')) {
      					$(this).css({"height": Math.floor( itemWidth/1.5 * 2 + 40 )})
      				} else if ($this.hasClass('size-3x2')) {
      					$(this).css({"height": Math.floor( (itemWidth - 60)/1.5 * 2 + 40 )})
      				} else if ($this.hasClass('size-3x3')) {
      					$(this).css({"height": Math.floor( (itemWidth - 60)/1.5 * 3 + 60 )})
      				} else {
      					$(this).css({"height": Math.floor(itemWidth/1.5)})
      				}
      			})
      		}
      	}

        plexx_getBlogHeight<?php echo $this->get_id(); ?>();
        plexx_getMasonry<?php echo $this->get_id(); ?>();

      });

    </script>

  <?php }

    protected function get_empty_query_message() { ?>

        <div class="error-notice">
            <?php echo __('The current query has no posts. Please make sure you have published items matching your query.','themeworm'); ?>
        </div>

    <?php }

}
