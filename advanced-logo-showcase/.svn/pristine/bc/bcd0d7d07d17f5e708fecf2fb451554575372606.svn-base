<?php
if ( ! defined( 'ABSPATH' ) ) exit;
$query='';
$args = array(
		'post_type'  => ITLS_Custom_Post,
		'posts_per_page'=> $count,
		'orderby' => $orderby,
		'order' => $order
);
// select category
$tax_terms='';
if($category != 'all') {
	$tax_terms = explode(',' ,$category);
	$args['tax_query'] = array(array('taxonomy' => ITLS_Custom_Post_Taxonomy, 'field' => 'slug', 'terms' => $tax_terms));
}
// The Query
$query = new WP_Query( $args );

?>