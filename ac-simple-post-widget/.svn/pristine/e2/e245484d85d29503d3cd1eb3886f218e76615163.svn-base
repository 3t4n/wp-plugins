<?php
    
    echo $before_widget;
    if ( ! empty( $title ) ) {
        echo $before_title . $title . $after_title;
    }
    ?>

    <ul class="ac_widget_ul clearfix">

        <?php

            $width = $img_width;
            $height = $img_height;

            $args = array(
                'post_type' => $post_type,
	            'posts_per_page' => $num_post,
                'meta_key'    => '_thumbnail_id',
            );

            $the_query = new WP_Query( $args );

            $i = 0;

            if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();

        ?>

	            <?php if ( $title_content == 1 ) : ?>

		            <li class="ac_border_bottom">

			            <div class="ac_featured_img">

				            <a target="<?php if ( $new_tab == 1 ) echo '_blank' ?>" href="<?php the_permalink(); ?>">
					            <?php the_post_thumbnail( array( $width, $height ) ); ?>
				            </a>

			            </div>

			            <div class="ac_post_container">

				            <div class="ac_post_title">
					            <h3>
						            <a target="<?php if ( $new_tab == 1 ) echo '_blank' ?>" href="<?php the_permalink(); ?>">
							            <?php the_title(); ?>
						            </a>
					            </h3>
				            </div>

				            <div class="ac_post_content">
					            <?php the_excerpt( 25 );?>
				            </div>

			            </div>

		            </li>


	            <?php else : ?>

	                <li>

			            <div class="ac_featured_img_only">

				            <a target="<?php if ( $new_tab == 1 ) echo '_blank' ?>" href="<?php the_permalink(); ?>">
					            <?php the_post_thumbnail( array( $width, $height ) ); ?>
				            </a>

			            </div>

		            </li>

	            <?php endif; ?>


        <?php endwhile; endif; wp_reset_postdata(); ?>

    </ul>

<?php

echo $after_widget;