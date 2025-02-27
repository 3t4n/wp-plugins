<?php
/**
 * Shortcodes
 *
 *
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*-----------------------------------------------------------------------------------*/
/*	portfolio Item
/*-----------------------------------------------------------------------------------*/
function pgflio_portfolio_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		//"id" => '',
		"postsperpage" => '',
		"showfilter" => '',
		"taxonomy" => '',
		"type" => '',
		"style" => '',
		"columns" => '',
		"margin" => '',
		"linkto" => '',
		
	), $atts));

	

	//Isotope
	wp_enqueue_script( 'imagesloaded', plugin_dir_url( __FILE__ ) . 'js/vendor/imagesloaded.pkgd.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'isotope', plugin_dir_url( __FILE__ ) . 'js/vendor/isotope/js/isotope.pkgd.min.js', array('jquery'), '20151215', true );
	
	//Image Lightbox
	wp_enqueue_script( 'simple-lightbox-js', plugin_dir_url( __FILE__ ) .  '/js/vendor/simplelightbox/dist/simple-lightbox.min.js', array('jquery'), '20151218', true );
	wp_enqueue_style( 'simple-lightbox-css', plugin_dir_url( __FILE__ ) .  '/js/vendor/simplelightbox/dist/simplelightbox.min.css' );
	
	//Custom JS
	wp_enqueue_script( 'pgflio-custom-portfolio-js', plugin_dir_url( __FILE__ ) . 'js/custom-portfolio.js', array('jquery'), '20151215', true );

	//Custom CSS
	wp_enqueue_style( 'pgflio-portfolio-css', plugin_dir_url( __FILE__ ) .  '/css/pgflio_portfolio_css.css' );
	
	global $post;

	$portfolio_type = $type;

	if ( $portfolio_type == 'yes') {
		$args = array(
			'post_type' => 'pugfolio',
			'posts_per_page' => $postsperpage,		
			'tax_query' => array(
				array(
					'taxonomy' => 'pugfoliocategory',
					'field'    => 'id',
					'terms'    => $taxonomy,
				),
			),		
			//'p' => $id
		);	
	} else {
		$args = array(
			'post_type' => 'pugfolio',
			'posts_per_page' => $postsperpage,	
		);	
	}
	
	
	$my_query = new WP_Query($args);

		$retour ='';	

		$retour .='<div class="pgflio-portfolio">';

		if( $my_query->have_posts() ) :

			if ($showfilter != 'no' && $portfolio_type != 'yes') {
				$retour .='<div class="pgflio-portfolio-filter">';					

					$retour .='<button class="portfolio-filter-item item-active" data-filter="*" style="background-color:' .esc_attr( get_option("pgflio_color") ).';">'.esc_html('All', 'pugfolio').'</button>';

					$terms = get_terms( array(
					    'taxonomy' => 'pugfoliocategory',
					    'hide_empty' => false,
					) );

					foreach ( $terms as $term ) :
						$thisterm = $term->name;
						$thistermslug = $term->slug;
						$retour .='<button class="portfolio-filter-item" style="background-color:' .esc_attr( get_option("pgflio_color") ).';" data-filter=".pugfoliocategory-'.esc_attr($thistermslug).'">'.esc_html($thisterm).'</button>';
					endforeach;		 
					
				$retour .='</div>';
			}				

			//Portfolio style
			if ($style == 'masonry' ) {
				$portfoliostyle = 'pgflio-portfolio-style-masonry';
			}
			else {
				$portfoliostyle = 'pgflio-portfolio-style-box';
			}
			if ($columns == '2') {
				$portfoliocolumns = 'pgflio-portfolio-columns-2';
			}
			else if ($columns == '3') {
				$portfoliocolumns = 'pgflio-portfolio-columns-3';
			}
			else {
				$portfoliocolumns = 'pgflio-portfolio-columns-4';
			}
			if ($margin == 'yes' ) {
				$portfoliomargin = 'pgflio-portfolio-margin';
			}
			else {
				$portfoliomargin = '';
			}

			$retour .='<div class="pgflio-portfolio-content '.$portfoliostyle.' '.$portfoliocolumns.' '. $portfoliomargin.'">';

				while ($my_query->have_posts()) : $my_query->the_post();	

					$portfolio_image= wp_get_attachment_image_src( get_post_thumbnail_id(), '' );	

					$portfolio_image_ready = $portfolio_image[0];

					//Fancybox or link
					$portfolio_link = get_the_permalink();

					$portfolio_link_class = '';
					$portfolio_link_rel = '';

					if ( $linkto == 'image') {
						$portfolio_link = $portfolio_image_ready;
						$portfolio_link_class = 'pgflio-portfolio-lightbox';
						$portfolio_link_rel = 'rel="pgflio-portfolio"';

					}
					
					$classes = join( '  ', get_post_class() ); 
					
					$retour .='<div class="portfolio-item-wrapper '.$classes.'">';
						$retour .='<a href="'.esc_url($portfolio_link) .'" class="portfolio-item '.esc_attr($portfolio_link_class) .'" '.esc_attr($portfolio_link_rel) .' style="background-image: url('.esc_url($portfolio_image_ready).')" title="'.get_the_title().'">';
							$retour .='<img src="'.esc_url($portfolio_image_ready) .'" title="'.get_the_title().'" alt="'.get_the_title().'"/>';
							$retour .='<div class="portfolio-item-infos-wrapper" style="background-color:' .esc_attr( get_option("pgflio_color") ).';"><div class="portfolio-item-infos">';
								$retour .='<div class="portfolio-item-title">'.get_the_title().'</div>';
								$retour .='<div class="portfolio-item-category">';
									$terms = get_the_terms( $post->ID , 'pugfoliocategory' );
									if (is_array($terms) || is_object($terms)) {
									   foreach ( $terms as $term ) :
											$thisterm = $term->name;
											$retour .='<span class="pgflio-portfolio-cat">' .esc_html($thisterm) .'</span>';
										endforeach;
									}									
								$retour .='</div>';
							$retour .='</div></div>';
						$retour .='</a>';
					$retour .='</div>';

				endwhile; else:
					$retour .= "nothing found.";
				endif;

			$retour .='</div>';

		$retour .='</div>';

		//Reset Query
	    wp_reset_query();
	
	return $retour;
}

add_shortcode("pugfolio", "pgflio_portfolio_shortcode");



