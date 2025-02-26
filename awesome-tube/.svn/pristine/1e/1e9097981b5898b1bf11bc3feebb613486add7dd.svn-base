<div class="video-loop-block ele grid gap-12">
	<?php

	if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
	elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
	else { $paged = 1; }

	if(empty($category)) {
		if($orderby == "meta_value") {
			$order1 = array(
				'post_type'	     => 'awetube-video',
				'posts_per_page' => $post_per_page,
				'post_status'    => 'publish',
				'paged'          => $paged,
				'ignore_sticky_posts' => true,
				'offset' => $offset,
				'orderby'        => 'meta_value_num',
				'order'          => 'DESC',
				'meta_query' => array(
					array(
						'key'     => '_awetube_view_count',
					),
				),
			);
		} else {
			$order1 = array(
				'post_type'	     => 'awetube-video',
				'posts_per_page' => $post_per_page,
				'post_status'    => 'publish',
				'paged'          => $paged,
				'ignore_sticky_posts' => true,
				'orderby' => $orderby,
				'offset' => $offset,
			);			
		}
	} else {
		if($orderby == "meta_value") {
			$order1 = array(
				'post_type'	     => 'awetube-video',
				'posts_per_page' => $post_per_page,
				'post_status'    => 'publish',
				'paged'          => $paged,
				'ignore_sticky_posts' => true,
				'orderby'        => 'meta_value_num',
				'order'          => 'DESC',
				'meta_query' => array(
					array(
						'key'     => '_awetube_view_count',
					),
				),
				'offset' => $offset,
				'tax_query' => array(
					array(
						'taxonomy' => 'video-category',
						'terms'    => $category,
					),
				),
			);
		} else {
			$order1 = array(
				'post_type'	     => 'awetube-video',
				'posts_per_page' => $post_per_page,
				'post_status'    => 'publish',
				'paged'          => $paged,
				'ignore_sticky_posts' => true,
				'orderby' => $orderby,
				'offset' => $offset,
				'tax_query' => array(
					array(
						'taxonomy' => 'video-category',
						'terms'    => $category,
					),
				),
			);
		}
	}

	$sec_hook = new WP_Query( $order1 );
	if ($sec_hook->have_posts()) : while($sec_hook->have_posts()) : $sec_hook->the_post();

		$img_url_blog = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
		if($testi_image_crop == 'on') {
			$crop = true;
		}
		else {
			$crop = false;
		}

		$video_url   = carbon_get_post_meta( get_the_ID(), 'video_url' );
		$video_embed = '';
		$video_file  = carbon_get_post_meta( get_the_ID(), 'video_file' );

		if( has_post_thumbnail() ) {
			$video_poster = get_the_post_thumbnail_url( get_the_ID() );
		} else {
			$video_poster = '';
		}

		$lastmodified = get_the_modified_time('U');
		$posted = get_the_time('U');
	?>
	<div class="vidio-style2">
		<?php if(!empty($video_poster)) {
			$id_image = attachment_url_to_postid($video_poster);

			$data_image = wp_get_attachment_metadata($id_image);
			$width_image = $data_image['width'];
			$height_image = $data_image['height'];
	
			$video_poster = aq_resize($video_poster, $width, $height, true, true, true);
		?>
		<div class="vidio-thumb">
			<a href="<?php the_permalink(); ?>">
				<img src="<?php echo esc_url($video_poster); ?>" alt="<?php the_title(); ?>" class="featured-img">
				<?php if($use_hover == 'on') { ?>
				<div class="button-hover">
					<i class="fa fa-play play-button play-button"></i>
				</div>
				<div class="overlay-vidio-style2"></div>
				<?php } ?>
			</a>
		</div>
		<?php } ?>
			
		<div class="bottom-item grid grid-cols-12">
			<div class="author-wrap col-span-4">
				<figure class="author-ava">
					<?php 
				$user_img = wp_get_attachment_image_src( get_user_meta(get_the_author_meta('ID'),'_user_img', 'author50-thumb' ));
				if(!empty($user_img)) { ?>
					<img src="<?php echo esc_url($user_img[0]); ?>" alt="<?php echo get_the_author_meta( 'display_name' ); ?>">
					<?php } else { ?>
					<?php echo get_avatar( get_the_author_meta('ID'), '50' ); ?>
				<?php } ?>
				</figure>	
			</div>

			<div class="item-wrap col-span-8">
				<?php if($use_title == 'on') { ?>
					<h4 class="video-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
				<?php } ?>
				<?php if($use_author == 'on') { ?>
					<span class="vcard"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"> <?php echo get_the_author_meta( 'display_name' ); ?></a></span>
				<?php } ?>	
				<?php if($use_view == 'on') { ?>
				<div class="meta-video-wrap">
					<ul>
						<li><i class="fa fa-eye"></i>
							<?php 
							$awetube_fake_count = 0;
							$post_views_count = get_post_meta( get_the_ID(), 'post_views_count', true );
							$use_fake_count = carbon_get_theme_option( 'awetube_use_fake_count' );
							if( true === $use_fake_count ) {
								$awetube_fake_count = carbon_get_theme_option( 'awetube_fake_count' );
							}
							// Check if the custom field has a value.
							if ( ! empty( $post_views_count ) ) {
								echo esc_html( awetube_shorten_number( $post_views_count + $awetube_fake_count ) );
							} else {
								echo esc_html('0');
							} ?></li>
						<li><?php echo esc_html( human_time_diff( $posted, current_time( 'U' ) ) . esc_html__( ' ago', 'awetube' ) ); ?></li>
					</ul>
				</div>
				<?php } ?>
			</div>
			
		</div>
	</div>
	<?php endwhile; endif; ?>
	<?php wp_reset_postdata();  ?>
</div>