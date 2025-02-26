<?php 

	if ( ! defined( 'ABSPATH' ) )
		exit; # Exit if accessed directly

# shortocde
function acrds_swapping_post_query( $atts, $content = null ) {
	$atts = shortcode_atts(
		array(
			'id' => "",
			), $atts);
	global $post;

	$postid = $atts['id'];
	
	$acrds_cat_name			= get_post_meta( $postid, 'acrds_cat_name', true );
	$acrds_orderby 			= get_post_meta( $postid, 'acrds_orderby', true );
	$acrds_order 			= get_post_meta( $postid, 'acrds_order', true );
	$acrds_tcolor 			= get_post_meta( $postid, 'acrds_tcolor', true );
	$acrds_fsize 			= get_post_meta( $postid, 'acrds_fsize', true );
	$acrds_cfsize 			= get_post_meta( $postid, 'acrds_cfsize', true );
	$acrds_ccolor 			= get_post_meta( $postid, 'acrds_ccolor', true );
	$acrds_bgcolor 			= get_post_meta( $postid, 'acrds_bgcolor', true );
	$acrds_textalign 		= get_post_meta( $postid, 'acrds_textalign', true );
	$acrds_hdcolor 			= get_post_meta( $postid, 'acrds_hdcolor', true );
	$excerpt_lenght 		= get_post_meta( $postid, 'excerpt_lenght', true );
	$excerpt_color          = get_post_meta( $postid, 'excerpt_color', true );	
	$btn_readmore           = get_post_meta( $postid, 'btn_readmore', true );
	$excerpt_hcolor			= get_post_meta( $postid, 'excerpt_hcolor', true );	
	$excerpt_fontsize 		= get_post_meta( $postid, 'excerpt_fontsize', true );
	$bg_color				= get_post_meta( $postid, 'bg_color', true );	
	$bg_hovercolor			= get_post_meta( $postid, 'bg_hovercolor', true );	
	$border_color			= get_post_meta( $postid, 'border_color', true );	

	$acrdscat 	=  array();
	$num 		= count($acrds_cat_name);
	for( $j=0; $j<$num; $j++ ) {
		array_push( $acrdscat, $acrds_cat_name[$j] );
	}

	$args = array(
		'post_type' 	 	=> 'accordion-simply',
		'post_status'	 	=> 'publish',
		'posts_per_page' 	=> -1,
		'orderby'	   	   	=> $acrds_orderby,
		'order'			 	=> $acrds_order,
		'tax_query' 	 	=> array(
			array(
				'taxonomy' => 'acrdscat',
				'field' => 'id',
				'terms' => $acrdscat,
			)
		)
	);

	$query	= new WP_Query( $args );
	$content='';
	$content .='<style>';
	$content .='.acrds li{
					font-size:'.$acrds_fsize.'px;
					color:#'.$acrds_tcolor.';
					background:#'.$bg_color.';
					border-color:#'.$border_color.';
				}
				.acrds li:before{
					color:#'.$acrds_tcolor.';
				}
				.acrds li.active:before{
					color:#'.$acrds_tcolor.';
				}				
				.acrds li:hover{background:#'.$bg_hovercolor.';}
				.acrds ul div{
					font-size:'.$acrds_cfsize.'px;
					color:#'.$acrds_ccolor.';
					background:#'.$acrds_bgcolor.';
				}
				.acrds ul div a{
					color:#'.$excerpt_color.';
					font-size:'.$excerpt_fontsize.'px;
					box-shadow:none;
				}

				.acrds ul div a:hover{color:#'.$excerpt_hcolor.';box-shadow:none;}
				
				';
	$content .='</style>';
	
	$content .='<div id="toggle"><div class="acrds"><ul>';

    function acrds_get_excerpt( $excerpt_lenght ) {
        $excerpt = get_the_content();
        $excerpt = preg_replace(" ([.*?])",'',$excerpt);
        $excerpt = strip_shortcodes( $excerpt );
        $excerpt = strip_tags( $excerpt );
        $excerpt = substr( $excerpt, 0, $excerpt_lenght );
        $excerpt = substr( $excerpt, 0, strripos($excerpt, " ") );
        $excerpt = trim( preg_replace('/s+/', ' ', $excerpt) );
        return $excerpt;
    }

	$i=1;
	while ($query->have_posts()) : $query->the_post();
		$content .='<li>'.get_the_title().'</li>';
		$content .='<div>'.acrds_get_excerpt( $excerpt_lenght ).'... <a href="'.get_the_permalink().'">'.esc_attr( $btn_readmore ).'</a></div>';		
		$i++;	
	endwhile; 

	$content.='</ul>';
	$content.='</div>';		
	$content.='</div>';	
	
	return $content;
}
add_shortcode( 'acrds_composer', 'acrds_swapping_post_query' );	

