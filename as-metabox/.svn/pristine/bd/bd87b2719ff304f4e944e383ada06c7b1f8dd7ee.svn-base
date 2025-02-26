<?php
if ( ! defined( 'ABSPATH' ) ) { die; } 

/**
* wp data
*/
class as_get_wp_data{
	public function as_get_wp_post_type_data($query){
		$query = ($query) ? $query : false ;		
		$loop = new WP_Query( $query );
		// The Loop
		$data = array();
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
				$data[]				= array(
						'id'		=> get_the_ID(),
						'title'		=> get_the_title(),
					);
			endwhile; 
			wp_reset_postdata();
		} else {
			return false;
		}
		return $data;		
	}

	public function as_get_wp_terms($query){
		$query = ($query) ? $query : false ;	
		$query['taxonomy'] 		= (isset($query['taxonomy'])) ? (string)$query['taxonomy'] : 'category' ;
		$query['hide_empty'] 	= (isset($query['hide_empty'])) ? $query['hide_empty'] : false ;
		if (is_string($query['hide_empty'])) {
			if ($query['hide_empty'] == 'true') {
				$query['hide_empty'] = true;
			}else{
				$query['hide_empty'] = false;
			}
		}

		$terms = get_terms( $query );
		$data = array();
		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
			foreach ($terms as $value) {
				$data[]				= array(
						'id'		=> $value->term_id,
						'title'		=> $value->name,
					);
			}
		}else {
			return false;
		}
		return $data;
	}
	public function as_wp_select_search_post_field($data){
		$args = array(  
		'post_status' 			=> 	'publish',
		'post_type' 			=> 	$data['post_type'],
		'posts_per_page' 		=> 	$data['posts_per_page'],
		'ignore_sticky_posts' 	=>	true,	
		'orderby'     			=> 'title', 
		'order'       			=> 'ASC',
		's' => $data['curr_val']);

		$query = new WP_Query($args);

		$data = array();
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) : $query->the_post();
				$data[]				= array(
						'id'		=> get_the_ID(),
						'title'		=> get_the_title(),
					);
			endwhile; 
			wp_reset_postdata();
		} else {
			return false;
		}
		return $data;	

	}
}
