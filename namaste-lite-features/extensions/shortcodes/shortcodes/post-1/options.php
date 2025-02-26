<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

// Post titles

$post_title = array();
$args=array('order'=>'ASC','posts_per_page'	=>	1000,);
$posts = get_posts( $args );
if ( $posts ) {
foreach ( $posts as $post ) {
   $post_title[$post->post_title] = $post->post_title;
}
}

$options = array(
	'title'		=> array(
		'label'   => __( 'Title', 'namaste-lite' ),
		'type'    => 'select',
		'desc'    => __( 'Select from the posts.', 'namaste-lite' ),
		'choices' => $post_title
	),
);