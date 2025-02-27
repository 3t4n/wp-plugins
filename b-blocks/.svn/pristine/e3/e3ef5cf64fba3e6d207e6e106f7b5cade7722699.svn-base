<?php
$prefix = 'bBlocksPosts';
$id = wp_unique_id( "$prefix-" );
$planClass = BBlocks\Inc\Utils::isPro() ? 'pro' : 'free';

use BBlocks\Inc\Posts\Posts as Posts;

extract( $attributes );

if( 'ticker' === $layout ){
	wp_enqueue_script( 'easyTicker' );
}

$allPosts = get_posts( array_merge( Posts::query( $attributes ), [ 'posts_per_page' => -1 ] ) );

$skeletonAllowedTags = [
	'style'		=> [],
	'div'		=> [ 'class' => [], 'id' => [] ],
	'article'	=> [ 'class' => [] ],
	'span'		=> [ 'class' => [] ],
];
?>
<div
	<?php echo get_block_wrapper_attributes( [ 'class' => "$planClass align$align" ] ); ?>
	id='<?php echo esc_attr( $id ); ?>'
	data-nonce='<?php echo esc_attr( wp_json_encode( wp_create_nonce( 'wp_ajax' ) ) ); ?>'
	data-attributes='<?php echo esc_attr( wp_json_encode( $attributes ) ); ?>'
	data-extra='<?php echo esc_attr( wp_json_encode( [ 'totalPosts' => count( $allPosts ) ] ) ); ?>'
>
	<pre id='firstPosts' style='display: none;'>
		<?php echo esc_html( wp_json_encode( Posts::getPosts( $attributes ) ) ) ?>
	</pre>

	<?php echo wp_kses( Posts::loadingPlaceholder( $attributes, $prefix ), $skeletonAllowedTags ); ?>
</div>