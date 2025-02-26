<?php

$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

if( get_option('alobaidi_gallery_count') ){
	$count = get_option('alobaidi_gallery_count');
}else{
	$count = 9;
}

$args = array(
            'post_type' => 'attachment',
            'post_status' => 'any',
            'post_mime_type' => array( 'image/jpeg', 'image/png', 'image/bmp', 'image/tiff', 'image/x-png', 'image/pjpeg', 'image/jpg' ),
            'posts_per_page' => $count,
            'paged' => $paged
        );

$query = new WP_Query( $args );

?>

<?php if ( $query->have_posts() ) : // If have post START. ?>

	<?php while ( $query->have_posts() ) : $query->the_post(); // Start Loop: ?>

		<?php
			$image_link = wp_get_attachment_image_src( $query->post->ID, 'full', false ); // get image link
			$alt = get_post_meta($query->post->ID, '_wp_attachment_image_alt', true); // get image alt
			$caption = get_post($query->post->ID); // get image caption
			$title = get_post($query->post->ID); // get image title

			if( !empty($alt) ){
				$alt_attr = ' alt="'.$alt.'"';
			}else{
				$alt_attr = null;
			}

			if( !empty($caption->post_excerpt) ){
				$caption_attr = ' title="'.$caption->post_excerpt.'"';
			}else{
				$caption_attr = null;
			}

			if( !empty($title->post_title) ){
				$figcaption = '<figcaption><span>'.$title->post_title.'</span></figcaption>';
			}else{
				$figcaption = null;
			}
		?>

		<figure>
			<a href="<?php echo $image_link[0]; ?>"<?php echo $caption_attr; ?>>
				<img<?php echo $alt_attr; ?> src="<?php echo $image_link[0]; ?>">
				<?php echo $figcaption; ?>
			</a>
		</figure>

	<?php endwhile; // End Loop. ?>

	<?php wp_reset_postdata(); ?>

<?php else : ?>

	<p class="no-posts-ag">Go to "Media" > "Add New" and upload images to display it here.</p>

<?php endif; // If have post END. ?>