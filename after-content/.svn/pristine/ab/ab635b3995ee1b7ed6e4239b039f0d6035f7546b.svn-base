<?php
/* == RELATED CONTENT == */
function afc_related_content() {
    global $post;
	global $afc_opt;
	$num = $afc_opt['related_posts_number'];
	$type = $afc_opt['related_type'];
	
	if($type == 'cat' && is_single()) {
		
		$categories = get_the_category( $post->ID );
		if ( $categories ) {
			$category_ids = array();
			foreach( $categories as $individual_category ) {
				$category_ids[] = $individual_category->term_id;
			}
		
		$args = array(
			'category__in' => $category_ids,
			'post__not_in' => array( $post->ID ),
			'posts_per_page'=> $num,
			);
			
		$the_query = new WP_Query($args);
		if( $the_query->have_posts() ):
			$posts = '<section class="afc-related-wrapper"><h3>' . $afc_opt['related_title'] .  '</h3>';
			
			while ( $the_query->have_posts()): $the_query->the_post();
				$posts .= '<div class="afc-related-post">';
				
				if ( $afc_opt['display_img'] == 1 ) {
					$posts .= '<div class="afc-related-thumbnail"><a href="' . get_permalink() . '" title="' . get_the_title() . '">';
					if ( has_post_thumbnail() ) {
						$posts .= get_the_post_thumbnail( $post->ID, 'afc-200' );
					}
					$posts .= '</a></div>';
				}
				
				$posts .= '<h3><a href="' . get_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a></h3>
		</div>';
			endwhile;
			
			$posts .= '</section>';
		endif;
		
		wp_reset_query();
		return $posts;
	}//end if
	
} elseif( $type == 'tag' && is_single() ){
		
		$tags = wp_get_post_tags( $post->ID );
		if ( $tags ) {
			$first_tag = $tags[0]->term_id;
			$args = array(
				'tag__in' => $first_tag,
				'post__not_in' => array( $post->ID ),
				'posts_per_page'=>$num,
			);
			$the_query = new WP_Query( $args );
			if( $the_query->have_posts() ):
				$posts = '<section class="afc-related-wrapper"><h3>' . $afc_opt['related_title'] .  '</h3>';
				
				while ( $the_query->have_posts() ): $the_query->the_post();
					$posts .= '<div class="afc-related-post">';
		
					if ( $afc_opt['display_img'] == 1 ) {
						$posts .= '<div class="afc-related-thumbnail"><a href="' . get_permalink() . '" title="' . get_the_title() . '">';
						if ( has_post_thumbnail() ) {
							$posts .= get_the_post_thumbnail( $post->ID, 'afc-200' );
						}
						$posts .= '</a></div>';
					}
		
					$posts .= '<h3><a href="' . get_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a></h3>
		</div>';
				endwhile;
				
				$posts .= '</section>';
				return $posts;
			endif;
		wp_reset_query();
		}//end if
	}

}