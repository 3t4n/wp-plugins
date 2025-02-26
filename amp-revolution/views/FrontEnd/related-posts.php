<?php
if ( ! is_single() ) {
	return;
}

global $post;
$taxs = get_object_taxonomies( $post );
if ( ! $taxs ) {
	return;
}

$size = array( 72, 72 );

$count = ARSCP_AMP_Revolution::get()->options->get_option_data('amountRelated','personalizator','4');

// ignoring post formats
if( ( $key = array_search( 'post_format', $taxs ) ) !== false ) {
	unset( $taxs[$key] );
}

// try tags first

if ( ( $tag_key = array_search( 'post_tag', $taxs ) ) !== false ) {

	$tax = 'post_tag';
	$tax_term_ids = wp_get_object_terms( $post->ID, $tax, array( 'fields' => 'ids' ) );
}

// if no tags, then by cat or custom tax

if ( empty( $tax_term_ids ) ) {
	// remove post_tag to leave only the category or custom tax
	if ( $tag_key !== false ) {
		unset( $taxs[ $tag_key ] );
		$taxs = array_values($taxs);
	}

	$tax = $taxs[0];
	$tax_term_ids = wp_get_object_terms( $post->ID, $tax, array('fields' => 'ids') );

}

if ( $tax_term_ids ) {
	$args = array(
		'post_type' => $post->post_type,
		'posts_per_page' => $count,
		'orderby' => 'rand',
		'tax_query' => array(
			array(
				'taxonomy' => $tax,
				'field' => 'id',
				'terms' => $tax_term_ids
			)
		),
		'post__not_in' => array ($post->ID),
	);
	$related = get_posts( $args );
	if ( $related ) {   ?>
		<div class="amp-wp-meta amp-wp-tax-tag">

			<div id="amp-related-posts">
				<h3><?php echo ARSCP_AMP_Revolution::get()->options->get_option_data('relatedTitle' , 'personalizator', 'You may also like ...'); ?></h3>
				<ul>
					<?php foreach( $related as $post) {
						setup_postdata( $post );
						?><li>
						<a href="<?php echo esc_url( amp_get_permalink( get_the_id() ) ); ?>"><?php
							$thumb_id = get_post_thumbnail_id( $post->ID );
							if ( $thumb_id ) {
								$img = wp_get_attachment_image_src( $thumb_id, $size );
								$alt = get_post_meta( $post->ID, '_wp_attachment_image_alt', true );
								if ( empty( $alt ) ) {
									$attachment = get_post( $thumb_id );
									$alt = trim(strip_tags( $attachment->post_title ) );
								} ?>

								<amp-img class="related-img" src="<?php echo esc_url( $img[0] ); ?>" <?php
								if ( $img_srcset = wp_get_attachment_image_srcset( $thumb_id, $size ) ) {
									?> srcset="<?php echo esc_attr( $img_srcset ); ?>" <?php
								}
								?> alt="<?php echo esc_attr( $alt ); ?>" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>">
								</amp-img>

								<?php
							}
							?>
						</a>
						<p> <a href="<?php echo esc_url( amp_get_permalink( get_the_id() ) ); ?>"><?php the_title(); ?></a></p></li>
					<?php } ?>
				</ul>
			</div>
		</div>
		<?php
	}
	wp_reset_postdata();
}
?>