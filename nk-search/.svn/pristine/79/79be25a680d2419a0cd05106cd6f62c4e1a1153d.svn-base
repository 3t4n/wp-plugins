<?php
namespace NKS_Search\Ajax;

/**
 * Namespace bootstrap
 *
 * @return void
 */
function bootstrap() {
	add_action( 'wp_ajax_nks_search', __NAMESPACE__ . '\\nk_search_action' );
	add_action( 'wp_ajax_nopriv_nks_search', __NAMESPACE__ . '\\nk_search_action' );
}

/**
 * nk_search_action
 *
 * @return string
 */
function nk_search_action() {
	check_ajax_referer( 'nks', 'security' );
	$post_types         = ( isset( $_POST['post_type'] ) ) ? sanitize_text_field( $_POST['post_type'] ) : 'post';
	$post_search        = ( isset( $_POST['post_search'] ) ) ? sanitize_text_field( $_POST['post_search'] ) : '';
	$posts_per_page     = ( isset( $_POST['posts_per_page'] ) ) ? intval( $_POST['posts_per_page'] ) : 10;
	$post_types         = explode( ',', $post_types );
	$query_args         = array(
		'post_type'      => array_map( 'sanitize_text_field', array_filter( $post_types ) ),
		'posts_per_page' => intval( $posts_per_page ),
		's'              => sanitize_text_field( $post_search )
	);
	$nks_data_transient = md5( wp_json_encode( $query_args ) );
	$query_return       = get_transient( $nks_data_transient );
	if ( ! $query_return ) {
		add_filter( 'posts_where', __NAMESPACE__ . '\\nk_posts_where', 10, 2 );
		$query_result = new \WP_Query( $query_args );
		remove_filter( 'posts_where', __NAMESPACE__ . '\\nk_posts_where', 10, 2 );
		$query_return = array();
		if ( $query_result->have_posts() ) {
			while ( $query_result->have_posts() ) {
				$query_result->the_post();
				$query_return[] = array(
					'title' => get_the_title(),
					'link'  => get_the_permalink()
				);
				wp_reset_postdata();
			}
		}
		set_transient( $nks_data_transient, $query_return, 30 );
	}
	wp_send_json_success( $query_return );
	die;
}

/**
 * nk_posts_where
 *
 * @param  mixed $where
 * @param  mixed $wp_query
 * @return string
 */
function nk_posts_where( $where, &$wp_query ) {
	$title_like = $wp_query->get( 's' );
	global $wpdb;
	if ( $title_like ) {
		$where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'%' . esc_sql( $wpdb->esc_like( $title_like ) ) . '%\'';
	}
	return $where;
}
