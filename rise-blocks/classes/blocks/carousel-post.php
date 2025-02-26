<?php
/**
 * Render Blog block
 *
 * @since 1.0.0
 * @package Rise Block
 */

if( !class_exists( 'Rise_Blocks_News_2' ) ){
	
	class Rise_Blocks_News_2 extends Rise_Blocks_Base{

		/**
		* Name of the block.
		*
		* @access protected
		* @since 1.0.0
		* @var string
		*/
		protected $slug = 'carousel-post';

		/**
		* Title of this block.
		*
		* @access protected
		* @since 1.0.0
		* @var string
		*/
		protected $title = '';

		/**
		* Description of this block.
		*
		* @access protected
		* @since 1.0.0
		* @var string
		*/
		protected $description = '';

		/**
		* SVG Icon for this block.
		*
		* @access protected
		* @since 1.0.0
		* @var string
		*/
		protected $icon = '<svg fill="#436DD3" enable-background="new 0 0 64 64" height="80" viewBox="0 0 64 64" width="80" xmlns="http://www.w3.org/2000/svg"><path d="m61 3.998h-58c-1.654 0-3 1.346-3 3v52.004c0 .553.447 1 1 1h62c.553 0 1-.447 1-1v-52.004c0-1.654-1.346-3-3-3zm-31.995 41.005c-.547.006-.984.448-.984.998 0 .546.442.985.985.996h-27.006v-1.994zm-5.999-16.275 4.786 6.785-5.304 7.49h-9.553zm17.006-7.013 15.072 21.288h-30.145zm-10.977 23.288h2.969c-.547.006-.984.448-.984.998 0 .546.442.985.985.996h-2.96c.542-.011.98-.45.98-.996 0-.55-.443-.992-.99-.998zm2.999 0h2.973c-.547.006-.984.448-.984.998 0 .546.442.985.985.996h-2.964c.542-.011.98-.45.98-.996 0-.55-.443-.992-.99-.998zm3.003 0h26.963v1.994h-26.953c.542-.011.98-.45.98-.996 0-.55-.443-.992-.99-.998zm22.498-2-16.696-23.581c-.151-.214-.374-.344-.611-.395-.005-.001-.009-.004-.014-.005-.067-.014-.135-.005-.203-.005-.067 0-.134-.008-.2.004-.006.001-.011.005-.017.006-.236.051-.458.181-.609.394l-10.167 14.36-5.188-7.354c-.144-.203-.352-.325-.574-.381-.018-.005-.034-.017-.053-.021-.064-.013-.131-.004-.197-.004-.067 0-.133-.009-.199.004-.017.004-.032.015-.049.019-.225.056-.434.179-.577.382l-11.694 16.577h-8.487v-33.005h60v33.005zm-55.535 5.994h60v9.005h-60zm1-42.999h1.018c-.551.002-.993.448-.993 1s.452 1 1.005 1c.552 0 1-.448 1-1 0-.551-.447-.998-.997-1h2.983c-.55.002-.992.448-.992 1s.452 1 1.005 1c.552 0 1-.448 1-1 0-.551-.447-.998-.998-1h2.988c-.55.002-.992.448-.992 1s.452 1 1.005 1c.552 0 1-.448 1-1 0-.551-.447-.998-.997-1h50.965c.552 0 1 .449 1 1v1h-60v-1c0-.551.448-1 1-1z"/><path d="m48 50.997h-32c-.553 0-1 .447-1 1s.447 1 1 1h32c.553 0 1-.447 1-1s-.447-1-1-1z"/><path d="m40.993 54h-17.986c-.553 0-1 .447-1 1s.447 1 1 1h17.986c.553 0 1-.447 1-1s-.447-1-1-1z"/><path d="m6.706 23.294c-.391-.391-1.023-.391-1.414 0l-1.997 1.998c-.001 0-.002 0-.002.001-.195.195-.293.451-.293.707s.098.512.293.707l1.999 2c.195.195.451.293.707.293s.512-.098.707-.292c.391-.391.391-1.024 0-1.415l-1.292-1.293 1.292-1.292c.391-.391.391-1.023 0-1.414z"/><path d="m60.708 25.292-1.999-1.999c-.391-.391-1.023-.391-1.414 0s-.391 1.023 0 1.414l1.292 1.293-1.292 1.293c-.391.391-.391 1.024 0 1.415.195.194.451.292.707.292s.512-.098.707-.293l1.999-2c.195-.195.293-.451.293-.707s-.098-.512-.293-.708z"/><path d="m17.002 13.999c-2.206 0-4 1.794-4 4s1.794 4 4 4 4-1.794 4-4-1.794-4-4-4zm0 6c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.898 2-2 2z"/></svg>';

        /**
        * link to the demo of this block.
        *
        * @access protected
        * @since 1.0.0
        * @var string
        */
        protected $demo_link = 'rise-blocks/carousel-post';

		/**
		* To store Array of this blocks
		*
		* @access protected
		* @since 1.0.0
		* @var array
		*/
		protected $blocks = [];

		/**
		* The object instance.
		*
		* @static
		* @access protected
		* @since 1.0.0
		* @var object
		*/
		private static $instance;

		/**
		* Constructor Function.
		*
		* @static
		* @access protected
		* @since 1.0.0
		* @var object
		*/
		public function __construct(){
			$this->title       = esc_html__( 'Carousel Post', 'rise-blocks' );
			$this->description = esc_html__( 'Carousel Post Block is for creating beautiful Gutenberg post grid blocks, post slider blocks and post carousel blocks quickly.', 'rise-blocks' );
		}

	   /**
		* Gets an instance of this object.
		* Prevents duplicate instances which avoid artefacts and improves performance.
		*
		* @static
		* @access public
		* @since 1.0.0
		* @return object
		*/
		public static function get_instance() {
			if ( ! self::$instance ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

	   /**
		* Enqueue Frontend Scripts and Styles
		* Called in wp_enqueue_scripts hook
		* Fires in frontend
		* @access public
		* @since 1.0.0
		* @return null
		*/
		public function enqueue_scripts_styles(){

			$this->get_blocks();
			if( count( $this->blocks ) > 0 ){
				$scripts = [
					[
						'handler' => 'slick',
						'script'  => 'vendors/slick/slick.js',
						'version' => '1.8.1',
						'dependency' => [ 'jquery' ]
					],
					[
						'handler' => 'slick',
						'style' => 'vendors/slick/slick.css',
						'version' => '1.8.1',
					]
				];
				$scripts = apply_filters( self::get_block_name( $this->slug ) . '_frontend_assets', $scripts, $this );
				self::enqueue( $scripts );
			}
		}

	   /**
		* Generate & Print Frontend Styles
		* Called in wp_head hook
		* @access public
		* @since 1.0.0
		* @return null
		*/
		public function prepare_scripts_styles(){ 

			foreach( $this->blocks as $block ){

				$attrs = self::get_attrs_with_default( $block[ 'attrs' ] );
				
				# Typography for title, content on mobile
				$heading_typo = self::get_initial_responsive_props();
				if( isset( $attrs[ 'headingTypo' ] ) ){
					$heading_typo = self::get_typography_props(  $attrs[ 'headingTypo' ] );
				}

				$title_typo = self::get_initial_responsive_props();
				if( isset( $attrs[ 'titleTypo' ] ) ){
					$title_typo = self::get_typography_props(  $attrs[ 'titleTypo' ] );
				}

				$content_typo = self::get_initial_responsive_props();
				if( isset( $attrs[ 'contentTypo' ] ) ){	
					$content_typo = self::get_typography_props(  $attrs[ 'contentTypo' ] );
				}

				$meta_typo = self::get_initial_responsive_props();
				if( isset( $attrs[ 'metaTypo' ] ) ){	
					$meta_typo = self::get_typography_props(  $attrs[ 'metaTypo' ] );
				}

				$padding = self::get_dimension_props( 'padding', $attrs[ 'padding' ] );

				foreach( [ 'mobile', 'tablet', 'desktop' ] as $device ){
					$css = [
						[
							'selector' => self::add_prefix( '.%prefix-news-2-title' ),
							'props'    => $heading_typo[ $device ]
						],
						[
							'selector' => self::add_prefix( '.%prefix-news-2-post-title a' ),
							'props'    => $title_typo[ $device ]
						],
						[
							'selector' => '.meta-content a',
							'props'    => $meta_typo[ $device ]
						],
						[
							'selector' => self::add_prefix( '.%prefix-news-2-post-content' ),
							'props'    => $content_typo[ $device ]
						],
						[
							'selector' => '',
							'props' => $padding[ $device ],
						]
					];

					self::add_styles([
						'attrs' => $attrs,
						'css'   => $css,
					], $device );
				}

				$dynamic_css = [
					[
						'selector' => self::add_prefix( '.%prefix-news-2-meta-wrapper a' ),
						'props' => [
							'color' => 'color'
						]
					],
					[
						'selector' => self::add_prefix( '.%prefix-news-2-post-title a' ),
						'props'    =>  [
							'color' => 'color'
						]
					],
					[
						'selector' => self::add_prefix( '.%prefix-news-2-title' ),
						'props'    =>  [
							'color' => 'color'
						]
					],
					[
						'selector' => self::add_prefix( '.%prefix-news-2-post-title:hover a' ),
						'props'    => [
							'color' => 'color'
						]
					],
					[
						'selector' => self::add_prefix( '.%prefix-news-2-post-title:hover a' ),
						'props'    => [
							'color' => 'color'
						]
					],
					[
						'selector' => self::add_prefix( '.%prefix-news-2-post-content' ),
						'props'    => [
							'color' => 'color'
						]
					],
					[
						'selector' => self::add_prefix( '.meta-content a' ),
						'props'    => [
							'color' => 'color'
						]
					],
					[
						'selector' => self::add_prefix( '.meta-content .line' ),
						'props'    => [
							'background-color' => 'color'
						]
					],
					[
						'selector' => '',
						'props'    => [
							'background-color' => 'bgColor'
						]
					],
					[
						'selector' => self::add_prefix( '.%prefix-slider-arrow' ),
						'props'    => [
							'background-color' => 'arrowBgColor'
						]
					],
					[
						'selector' => self::add_prefix( '.%prefix-slider-arrow' ),
						'props'    => [
							'color' => 'arrowColor'
						]
					]
				];

				self::add_styles([
					'attrs' => $attrs,
					'css'   => $dynamic_css,
				]);

				$query = $this->get_query( $attrs );
				$slidesToShow = $query->post_count > $attrs[ 'slidesToShow' ] ? $attrs[ 'slidesToShow' ] : $query->post_count;
				ob_start();
				?>
				
				var riseBlocksNewsArgs = {
					slidesToShow: <?php echo esc_attr( $slidesToShow ) ?>,
					slidesToScroll: 1,
					autoplay: false,
					infinite: true,
					arrows: true,
					dots: false,
					prevArrow: '<button type="button" class="<?php self::add_prefix_e( '%prefix-prev-arrow %prefix-slider-arrow' ); ?>"><i class="fa fa-angle-left"></i></button>',
					nextArrow: '<button type="button" class="<?php self::add_prefix_e( '%prefix-next-arrow %prefix-slider-arrow' ); ?>"><i class="fa fa-angle-right"></i></button>',
					responsive: [
						{
							breakpoint: 767,
							settings: {
								slidesToShow: 1
							}
						}
					]
				};
				jQuery('#<?php echo esc_attr( $attrs[ 'block_id' ] ); ?> .news2-init').slick( riseBlocksNewsArgs );

				<?php
				$js = ob_get_clean();
				self::add_scripts( $js );
			}
		}

	   /**
		* Returns attributes for this Block
		*
		* @access public
		* @since 1.0.0
		* @return array
		*/
		protected function get_attrs(){
			return [

				# Hidden setting
				'block_id' => [
					'type' => 'string',
				],
				'title' => [
					'type' => 'string',
					'default' => 'Carousel Post'
 				],
				'alignment' => [ 
					'type' => 'string',
					'default' => 'center'
				],
				# Post Setting
				'postsToShow' => [
					'type'    => 'number',
					'default' => 5,
				],
				'order' => [
					'type'    => 'string',
					'default' => 'desc',
				],
				'orderBy'         => [
					'type'    => 'string',
					'default' => 'date',
				],
				'categories' => [
					'type' => 'string',
				],
				'headingTypo' => [
					'type' => 'object',
					'default' => [
						'fontFamily' => 'Roboto',
						'fontSize'   => [
							'units' => [ 'px', 'em', 'rem' ],
							'activeUnit' => 'px',
							'values' => [
								'desktop' => 20,
								'tablet'  => 20,
								'mobile'  => 20
							]
						],
						'textTransform' => 'uppercase',
						'fontWeight' => 700,
						'lineHeight' => [
							'activeUnit' => '',
							'units'      => [ '' ],
							'values'     => [
								'desktop' => '1.2',
								'tablet'  => '1.2',
								'mobile'  => '1.2'
							]
						]
					]
				],

				'titleTypo' => [
					'type' => 'object',
					'default' => [
						'fontFamily' => 'Roboto',
						'fontSize'   => [
							'units' => [ 'px', 'em', 'rem' ],
							'activeUnit' => 'px',
							'values' => [
								'desktop' => 20,
								'tablet'  => 20,
								'mobile'  => 20
							]
						],
						'fontWeight' => 500,
						'lineHeight' => [
							'activeUnit' => 'px',
							'units'      => [ 'px' ],
							'values'     => [
								'desktop' => '28',
								'tablet'  => '28',
								'mobile'  => '28'
							]
						]
					]
				],
				'metaTypo' => [
					'type' => 'object',
					'default' => [
						'fontFamily' => 'Roboto',
						'fontSize'   => [
							'units' => [ 'px', 'em', 'rem' ],
							'activeUnit' => 'px',
							'values' => [
								'desktop' => 12,
								'tablet'  => 12,
								'mobile'  => 12
							]
						],
						'fontWeight' => 400,
						'lineHeight' => [
							'activeUnit' => '',
							'units'      => [ '' ],
							'values'     => [
								'desktop' => '1.2',
								'tablet'  => '1.2',
								'mobile'  => '1.2'
							]
						]
					]
				],
				'contentTypo' => [
					'type' => 'object',
					'default' => [
						'fontFamily' => 'Roboto',
						'fontSize'   => [
							'units' => [ 'px', 'em', 'rem' ],
							'activeUnit' => 'px',
							'values' => [
								'desktop' => 14,
								'tablet'  => 14,
								'mobile'  => 14
							]
						],
						'fontWeight' => 400,
						'lineHeight' => [
							'activeUnit' => '',
							'units'      => [ '' ],
							'values'     => [
								'desktop' => '1.2',
								'tablet'  => '1.2',
								'mobile'  => '1.2'
							]
						]
					]
				],
				'padding' => [
					'type' => 'object',
					'default' => [
						'activeUnit'   => 'px',
						'isLinkActive' => true,
						'properties'   => [ 'top', 'right', 'bottom', 'left' ],
						'responsiveViews' => [ 'desktop', 'tablet', 'mobile' ],
						'units' => [ 'px', 'rem' ],
						'values' => [
							'desktop' => [ 20, 20, 20, 20 ],
							'tablet' => [ 20, 20, 20, 20 ],
							'mobile' => [ 20, 20, 20, 20 ],
						]
					]
				],

				'enableTitle' => [
					'type' => 'boolean',
					'default' => true
				],
				'enableContent' => [
					'type' => 'boolean',
					'default' => false
				],
				'enableCategory' => [
					'type' => 'boolean',
					'default' => true
				],
				'enableAuthor' => [
					'type'    => 'boolean',
					'default' => true
				],
				'enableDate' => [
					'type'    => 'boolean',
					'default' => true
				],
				'imageSize' => [
					'type'    => 'string',
					'default' => 'full'
				],

				'color' => [
					'type'    => 'string',
					'default' => '#ffffff'
				],
				'bgColor' => [
					'type'    => 'string',
					'default' => '#0693e3'
				],
				'arrowBgColor' => [
					'type'    => 'string',
					'default' => '#000000'
				],
				'arrowColor' => [
					'type'    => 'string',
					'default' => '#ffffff'
				],
				'slidesToShow' => [
					'type' => 'number',
					'default' => 3
				],
				'excerptLength' => [
					'type' => 'number',
					'default' => 20
				]
			];
		}

	   /**
		* get array of category
		*
		* @access public
		* @since 1.0.0
		* @return string
		*/
		public static function make_category_arr( $_cat ){
			$cat = false;
			if( $_cat ){
				$cat = [
					'name' => $_cat->name,
					'link' => get_category_link( $_cat->term_id )
				];
			}

			return $cat;
		}

		public function get_query( $attrs ){

			$args = [
				'post_type'   => 'post',
				'post_status' => 'publish',
				'ignore_sticky_posts' => true,
				'posts_per_page' => $attrs[ 'postsToShow' ],
				'order' => $attrs[ 'order' ],
				'orderby' => $attrs[ 'orderBy' ]
			];
			
			if( isset( $attrs[ 'categories' ] ) ){
				$args[ 'cat' ] = $attrs[ 'categories' ];
			}
			
			$query = new WP_Query( apply_filters( self::add_prefix( '%prefix_news_1_query' ), $args ) );

			return $query;
		}

	   /**
		* Renders blocks in frontend
		*
		* @access public
		* @since 1.0.0
		* @return string
		*/
		public function render( $attrs, $content ){
			
			$block_content = '';
			
			$query = $this->get_query( $attrs );

			if( $query->have_posts() ):
				ob_start();

				if( isset( $attrs[ 'categories' ] ) ){
					$_cat = get_category( absint( $attrs[ 'categories' ] ) );
					$cat = self::make_category_arr( $_cat );
				}

				$section_cls = self::add_prefix( '%prefix-news-2-wrapper %prefix-align-' . esc_attr( $attrs[ 'alignment' ] ) );
				
				?>
				<section id="<?php echo esc_attr( $attrs[ 'block_id' ] ); ?>" class="<?php echo esc_attr( $section_cls ); ?>">
					<div class="<?php self::add_prefix_e( '%prefix-carousel-post-overlay' ); ?>"></div>
					<h2 class="<?php self::add_prefix_e( '%prefix-news-2-title' ); ?>"><?php echo esc_html( $attrs['title'] ); ?></h2>
					<div class="news2-init">
				    <?php while( $query->have_posts() ): 
				    	$query->the_post(); 

				    	$id        = get_the_ID();
				    	$author_id = get_the_author_meta( 'ID' );
				    	$author_link = get_author_posts_url( $author_id );
				    	$src = '';

				    	if( !isset( $attrs[ 'categories' ] ) ){
				    		$_cat = get_the_category();
				    		$cat = self::make_category_arr( $_cat[ 0 ] );
				    	}

			            if( has_post_thumbnail( ) ){
			            	$src = get_the_post_thumbnail_url( $id, $attrs[ 'imageSize' ] );
			            }

				    ?>
			            <div class="<?php self::add_prefix_e( '%prefix-news-2-card-wrapper %prefix-align-' . esc_attr( $attrs[ 'alignment' ] ) );  ?>">

			            	<div>
			            	    <div style="background-image: url(<?php echo esc_url( $src ); ?>)" class="<?php self::add_prefix_e( '%prefix-news-2-card-image' ); ?>">                                                
			            	    </div>
			            	</div>

			                <div class="<?php self::add_prefix_e( '%prefix-news-2-card' ); ?>">
			                    <div class="<?php self::add_prefix_e( '%prefix-news-2-body' ); ?>">
			                    	<div class="<?php self::add_prefix_e( '%prefix-news-2-body-inner' ); ?>">
			                    		<?php if( $attrs[ 'enableCategory' ] ): ?>
			                    	        <div class="<?php self::add_prefix_e( '%prefix-news-2-post-cat meta-content' ); ?>">
			                    	            <a href="<?php echo esc_url( $cat[ 'link' ] ); ?>">
			                    	                <span><?php echo esc_html( $cat[ 'name' ] ); ?></span>
			                    	                <span class="line"></span>
			                    	            </a>
			                    	        </div>
			                    	    <?php endif; ?>

		                            	<?php if( $attrs[ 'enableTitle' ] ): ?>
		    	                            <h2 class="<?php self::add_prefix_e( '%prefix-news-2-post-title' ); ?>">
		    	                                <a href="<?php the_permalink(); ?>">
		    	                                    <?php the_title(); ?>
		    	                                </a>
		    	                            </h2>
		                            	<?php endif; ?>

		                            	<?php if ($attrs['enableContent']): ?>
											<div class="<?php self::add_prefix_e( '%prefix-news-2-post-content' );?>">
												<?php self::excerpt( $attrs[ 'excerptLength' ] );?>
											</div>
										<?php endif;?>

					                    <?php if( $attrs[ 'enableAuthor' ] || $attrs[ 'enableDate' ] ): ?>
					                        <div class="<?php self::add_prefix_e( '%prefix-news-2-meta-wrapper' ); ?>">
					                        	<?php if( $attrs[ 'enableAuthor' ] ): ?>
					                                <div class="<?php self::add_prefix_e( '%prefix-news-2-author meta-content' ); ?>">
					                                    <a href="<?php echo esc_url( $author_link ); ?>" title="<?php echo ucfirst( get_the_author() ); ?>">
					                                        <i class="fa fa-user"></i><?php echo ucfirst( get_the_author() ); ?>

					                                    </a>
					                                </div>
					                        	<?php endif; ?>

					                        	<?php if( $attrs[ 'enableDate' ] ): ?>
					                                <div class="<?php self::add_prefix_e( '%prefix-news-2-post-date meta-content' ); ?>" >
					                                    <a href="<?php echo esc_url( self::get_day_link() ) ?>">
					                                    	<i class="fa fa-calendar"></i>
					                                        <span>
					                                        	<?php echo get_the_date(); ?>
					                                    	</span>
					                                    </a>
					                                </div>
					                        	<?php endif; ?>
					                        </div>
					                    <?php endif; ?>
				                	</div>
			                    </div>
			                </div>
			            </div>                   
					    <?php endwhile; ?>   	
					</div>
				</section>
				<?php
				wp_reset_postdata();
				$block_content = ob_get_clean();
			endif; 

			return $block_content;
		}
	}
}

Rise_Blocks_News_2::get_instance()->init();
