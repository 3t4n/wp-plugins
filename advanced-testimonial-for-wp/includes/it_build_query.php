<?php
	if ( ! defined( 'ABSPATH' ) ) exit;
	$query='';
    $args = array(
			'post_type'  => ITT_Testimonial_Post,
			'posts_per_page'=> $count,
            'orderby' => $orderby,
            'order' => $order,
            'post_status' => 'publish'
    );
    // select category
    $tax_terms='';
    if($category != 'all') {
        $tax_terms = explode(',' ,$category);
        $args['tax_query'] = array(array('taxonomy' => ITT_Testimonial_Post_Taxonomy, 'field' => 'slug', 'terms' => $tax_terms));
    }
	// The Query
    $query = new WP_Query( $args );

?>