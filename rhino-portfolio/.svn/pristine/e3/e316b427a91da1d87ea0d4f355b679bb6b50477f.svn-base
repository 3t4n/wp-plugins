<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Rhino_Portfolio{

	public function get_name(){
		return 'rhino_portfolio';
	}
	public function get_title(){
		return 'Rhino Portfolio';
	}
	public function get_icon() {
		return 'wppb-font-Page-grid';
	}
	public function get_category_name(){
        return 'Rhino Portfolio Plugin Addon';
    }

	// headline Settings Fields
	public function get_settings() {

		$settings = array(

			'portfolio_layout' => array(
			    'type' => 'select',
			    'title' => __('Portfolio Layout Style','rhino-portfolio'),
			    'values' => array(
			        'layout_one' => __('Layout One','rhino-portfolio'),
			        'layout_two' => __('Layout Two','rhino-portfolio'),
			    ),
			    'std' => 'layout_one',
			),
			'portfolio_number' => array(
				'type' => 'number',
				'title' => __('Number of Portfolio','rhino-portfolio'),
				'range' => array(
							'min' => 0,
							'max' => 12,
							'step' => 1,
						),
				'std' => '3',
			),
			'portfolio_popup' => array(
				'type' => 'switch',
				'title' => __('Enable Popup','rhino-portfolio'),
				'std' => '0'
			),
			'portfolio_column' => array(
				'type' => 'select',
				'title' => __('Portfolio Column','rhino-portfolio'),
				'placeholder' => __('Number of Column','rhino-portfolio'),
				'values' => array(
                    '12' =>  __( 'One Column', 'rhino-portfolio' ),
                    '6' =>  __( 'Two Column', 'rhino-portfolio' ),
                    '4' =>  __( 'Three Column', 'rhino-portfolio' ),
                    '3' =>  __( 'Four Column', 'rhino-portfolio' )
                ),
                'std' => '4'
			),
			'portfolio_order_by' => array(
				'type' => 'select',
				'title' => __('Post Order','rhino-portfolio'),
				'placeholder' => __('Order By','rhino-portfolio'),
				'values' => array(
					'DEC' => 'Descending',
					'ASC' => 'Ascending',
				),
				'std' => 'DEC',
			),
			'portfolio_show_filter' => array(
				'type' => 'switch',
				'title' => __('Post Filter','rhino-portfolio'),
				'std' => '0'
			),
			'portfolio_show_content' => array(
				'type' => 'switch',
				'title' => __('Show Title','rhino-portfolio'),
				'std' => '1'
			),
			'portfolio_show_cat' => array(
				'type' => 'switch',
				'title' => __('Show Category','rhino-portfolio'),
				'std' => '0'
			),
			'post_pagination' => array(
				'type' => 'switch',
				'title' => __('Show Pagination','rhino-portfolio'),
				'std' => '0'
			),
			// Rhino Portfolio Style
			
			'portfolio_border' => array(
			    'type' => 'border',
			    'tab' => 'style',
			    'title' => __('Portfolio Border','rhino-portfolio'),
			    'std' => array(
			        'borderWidth' => array( 'top' => '0px', 'right' => '0px', 'bottom' => '0px', 'left' => '0px' ), 
			        'borderStyle' =>'solid', 
			        'borderColor' => '#cccccc' 
			    ),
			    'selector' => '{{SELECTOR}} .portfolio-single-items'
			),
			'portfolio_spacing' => array(
				'type' => 'slider',
				'title' => __('Portfolio Spacing','rhino-portfolio'),
				'range' => array(
							'min' => 0,
							'max' => 100,
							'step' => 1,
						),
				'std' => '15px',
				'tab' => 'style',
				'selector' => '{{SELECTOR}} .portfolio-items{ padding: {{data.portfolio_spacing}}; }'
			), 
			'content_bg' => array(
				'type' => 'background2',
				'tab' => 'style',
				'title' => __('Content Background','rhino-portfolio'),
				'selector' => '{{SELECTOR}} .portfolio-item-content',
				'std' => array(
					'bgType' => 'color',
					'bgColor' => '',
					'bgImage' => array(),
					'bgimgPosition' => '',
					'bgimgAttachment' => '',
					'bgimgRepeat' => '',
					'bgimgSize' => '',
					'bgDefaultColor' => '',
					'bgGradient' => array(),
					'Opacity' => 1,
					'bgHoverType' => 'color',
					'bgHoverColor' => '',
					'bgHoverImage' => array(),
					'bgHoverimgPosition' => '',
					'bgHoverimgAttachment' => '',
					'bgimgHoverRepeat' => '',
					'bgimgHoverSize' => '',
					'bgHoverDefaultColor' => '',
					'bgHoverGradient' => array(),
					'hoverOpacity' => 1,
				)
			),
			'filter_title_color'=> array(
				'type' => 'color',
				'tab' => 'style', 
				'title' => 'Filter Title Color',
				'std' => '#ababab',
				'selector' => '{{SELECTOR}} .filterable-portfolio .portfolioFilter a{ color: {{data.filter_title_color}}; }'
			),
			'filter_active_color'=> array(
				'type' => 'color',
				'tab' => 'style', 
				'title' => 'Filter Active Color',
				'std' => '#d53175',
				'selector' => '{{SELECTOR}} .filterable-portfolio .portfolioFilter a.current{ color: {{data.filter_active_color}}; }'
			),
			'content_padding' => array(
				'type' => 'dimension',
				'section' => 'Portfolio Content',
				'tab' => 'style', 
				'title'	=> __('Content Padding','rhino-portfolio'),
				'std' => array(
					'md' => array( 'top' => '20px', 'right' => '20px', 'bottom' => '20px', 'left' => '20px' ),
					'sm' => array( 'top' => '20px', 'right' => '20px', 'bottom' => '20px', 'left' => '20px' ),
					'xs' => array( 'top' => '10px', 'right' => '10px', 'bottom' => '10px', 'left' => '10px' ),
					),
				'unit' => array( 'px','em','%' ),
				'responsive' => true,
				'selector' => '{{SELECTOR}} .portfolioContainer .portfolio-item-content{ padding: {{data.content_padding}}; }'
			),
			'content_alignment' => array(
				'type' => 'alignment',
				'title' => __('Content Alignment','rhino-portfolio'),
				'std' => 'left',
				'tab' => 'style', 
				'selector' => '{{SELECTOR}} .portfolio-item-content{ text-align: {{data.content_alignment}}; }',
				'section' => 'Portfolio Content',
				'clip' => true,
			),
			'cont_title_color'=> array(
				'type' => 'color',
				'tab' => 'style', 
				'title' => 'Content Title Color',
				'std' => '#d53175',
				'section' => 'Portfolio Content',
				'clip' => true,
				'selector' => '{{SELECTOR}} .portfolio-title a, .overlay-cont2{ color: {{data.cont_title_color}}; }'
			),
			'cont_title_hover'=> array(
				'type' => 'color',
				'tab' => 'style', 
				'title' => 'Content Title Hover',
				'std' => '#293340',
				'section' => 'Portfolio Content',
				'clip' => true,
				'selector' => '{{SELECTOR}} .portfolio-title a:hover, {{SELECTOR}} .overlay-cont2:hover{ color: {{data.cont_title_hover}}; }'
			),
			'sub_title_color'=> array(
				'type' => 'color',
				'tab' => 'style', 
				'title' => 'Category Color',
				'std' => '#6D7784',
				'section' => 'Portfolio Content',
				'clip' => true,
				'selector' => '{{SELECTOR}} .portfolio-category{ color: {{data.sub_title_color}}; }'
			),
			'sub_title_hover'=> array(
				'type' => 'color',
				'tab' => 'style', 
				'title' => 'Category Hover',
				'std' => '#6D7784',
				'section' => 'Portfolio Content',
				'clip' => true,
				'selector' => '{{SELECTOR}} .portfolio-category:hover{ color: {{data.sub_title_hover}}; }'
			),
			'cont_title_fontstyle' => array(
				'type' => 'typography',
				'tab' => 'style', 
				'title' => __('Content Title Typography','rhino-portfolio'),
				'section' => 'Portfolio Content',
				'clip' => true,
				'std' => array(
					'fontFamily' => '',
					'fontSize' => array( 'md'=>'28px', 'sm'=>'', 'xs'=>'' ),
					'lineHeight' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
					'fontWeight' => '700',
					'textTransform' => '',
					'fontStyle' => '',
					'letterSpacing' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
				),
				'selector' => '{{SELECTOR}} .portfolio-title',
				'tab' => 'style',
			),
			'sub_title_fontstyle' => array(
				'type' => 'typography',
				'tab' => 'style', 
				'title' => __('Category Typography','rhino-portfolio'),
				'section' => 'Portfolio Content',
				'clip' => true,
				'std' => array(
					'fontFamily' => '',
					'fontSize' => array( 'md'=>'28px', 'sm'=>'', 'xs'=>'' ),
					'lineHeight' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
					'fontWeight' => '700',
					'textTransform' => '',
					'fontStyle' => '',
					'letterSpacing' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
				),
				'selector' => '{{SELECTOR}} .portfolio-category',
				'tab' => 'style',
			)

		);

		return $settings;
	}

	// Headline Render HTML
	public function render($data = null){

		ob_start();
		$settings 		= $data['settings'];
		$page_numb 			= max( 1, get_query_var('paged') );
		$portfolio_layout 		= isset($settings['portfolio_layout']) ? $settings["portfolio_layout"] : '';
		$portfolio_popup 		= isset($settings['portfolio_popup']) ? $settings["portfolio_popup"] : '';

		$args = array(
			'post_type'		 	=> 'portfolio',
			'posts_per_page'	=> $settings['portfolio_number'],
			'order'				=> $settings['portfolio_order_by']
		);
		if( $page_numb ){
			$args['paged'] = $page_numb;
		}

		$data = new \WP_Query( $args );
		global $post;
	?>

	<div class="filterable-portfolio">


<?php
// filter of portfolio
if ( $settings['portfolio_show_filter'] == '1' ) {
	$filters = get_terms('portfolio-cat');
	if ( $filters && !is_wp_error( $filters ) ) { ?>
		<div class="portfolioFilter d-inline-block">
			<a class="current" href="#" data-filter="*"><?php esc_html_e('Show All','rhino-portfolio'); ?></a>
		<?php foreach ( $filters as $filter ){ ?>
			<a href="#" data-filter=".<?php echo esc_attr($filter->slug); ?>"><?php echo esc_html($filter->name); ?></a>
		<?php } ?>
			
		</div>
	<?php }
} ?>


<div class="container-fluid">
	<div class="row portfolioContainer">

	<?php
	if ( $data->have_posts() ) :
		while ( $data->have_posts() ) : $data->the_post();

		$external_link	= esc_attr(get_post_meta( get_the_ID(),'external_link',true));
		# Filter List Item
		$terms	  = get_the_terms(  get_the_ID(), 'portfolio-cat' );
		$term_name  = '';
		if (is_array( $terms )) {
			foreach ( $terms as $term ) {
				$term_name .= ' '.$term->slug;
			}
		}
		# category list
		$terms2 = get_the_terms(  get_the_ID(), 'portfolio-cat' );
		$term_name2 = '';
		if (is_array( $terms2 )){
			foreach ( $terms2 as $term2 )
			{
				$term_name2 .= $term2->slug.', ';
			}
		}
		$term_name2 = substr($term_name2, 0, -2);
		?>

		<?php if ($portfolio_layout == 'layout_one') { ?>
		
		<div class="portfolio-items col-<?php echo $settings['portfolio_column'];?> <?php echo $term_name; ?>">
			<div class="portfolio-single-items layout-one">
				<div class="portfolio-thumb">
					<?php if(has_post_thumbnail( get_the_ID())) {
						$thumb  = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID()), 'rhino-portfolio'); ?>
						<img class="img-responsive" src="<?php echo esc_url($thumb[0]); ?>"  alt="">
					<?php } else { ?>
						<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>'/images/recipes.jpg" alt="<?php _e('image','rhino-portfolio'); ?>">
					<?php } ?>

					<?php if(!empty($settings['portfolio_popup'])) {?>
					<div class="caption-full-width2">
						<div class="overlay-cont">
							<?php if(has_post_thumbnail( get_the_ID() )) {
								$photo = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ),'full' ); ?>
						<a class="plus-icon cloud-zooms" href="<?php echo esc_url($photo[0]); ?>"><i class="fa fa-camera"></i></a>
					<?php } ?>
						</div>
					</div>
					<?php }?>

				</div>
				<div class="portfolio-item-wrap">
					<div class="portfolio-item-content">
						<div class="portfolio-item-content-in">
							<?php if(!empty($settings['portfolio_show_content'])) { ?>
							<!-- <span class="fa fa-camera"></span> -->
							<h3 class="portfolio-title">
								<a href="<?php the_permalink(  get_the_ID() ); ?>"><?php echo get_the_title( get_the_ID()) ?></a>
							</h3>
							<?php } ?>
							
							<?php if(!empty($settings['portfolio_show_cat'])) { ?>
							<?php if($term_name != '') { ?>
								<span class="portfolio-category"><?php echo $term_name2; ?></span>
							<?php } ?>
							<?php } ?>

						</div>
					</div>
				</div>
			</div>
		</div>

		<?php } else{ ?>

		<div class="portfolio-items col-<?php echo $settings['portfolio_column'];?> <?php echo $term_name; ?>">
			<div class="portfolio-single-items layout-two">
				<div class="portfolio-thumb">
					<?php if(has_post_thumbnail( get_the_ID())) {
						$thumb  = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID()), 'rhino-portfolio'); ?>
						<img class="img-responsive" src="<?php echo esc_url($thumb[0]); ?>"  alt="">
					<?php } else { ?>
						<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>'/images/recipes.jpg" alt="<?php _e('image','rhino-portfolio'); ?>">
					<?php } ?>

					<?php if(!empty($settings['portfolio_popup'])) {?>
					<div class="caption-full-width2">
						<div class="overlay-cont">
							<?php if(has_post_thumbnail( get_the_ID() )) {
								$photo = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ),'full' ); ?>
						<a class="plus-icon cloud-zooms" href="<?php echo esc_url($photo[0]); ?>"><i class="fa fa-camera"></i></a>
					<?php } ?>
						</div>
					</div>
					<?php }?>

				</div>
				<div class="portfolio-item-wrap">
					<div class="portfolio-item-content">
						<div class="portfolio-item-content-in">
							<?php if($portfolio_popup == '0') {?>
							<!-- <span class="fa fa-camera"></span> -->
							<?php }?>
							<?php if(!empty($settings['portfolio_show_cat'])) { ?>
								<?php if($term_name != '') { ?>
									<span class="portfolio-category"><?php echo $term_name2; ?></span>
								<?php } ?>
							<?php } ?>
							<?php if(!empty($settings['portfolio_show_content'])) { ?>
							<h3 class="portfolio-title">
								<a href="<?php the_permalink(  get_the_ID() ); ?>"><?php echo get_the_title( get_the_ID()) ?></a>
							</h3>
							<?php } ?>

						</div>
					</div>
				</div>
			</div>
		</div>

		<?php }?>

	<?php endwhile; ?>
		<div class="col-md-12">
			<?php
			if( !empty($settings['post_pagination'] == '1' )){
					$max_page = $data->max_num_pages;
					echo rhino_pagination( $page_numb, $max_page );
				}
			?>
		</div>
	</div>
</div>

</div>
<?php wp_reset_postdata(); endif; ?>
	<?php
    
        $output = ob_get_contents();
        ob_end_clean(); 
        return $output;

    }
}