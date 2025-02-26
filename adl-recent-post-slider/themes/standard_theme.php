<div class="contains" id="adl_rcp_wrap_<?= $random_adl_rec_post_wrapper_id ?>">
    <!-- Standars -->
    <div class="row">
        <div class="col-md-12">
        <?php if('yes' == $adl_rec_post_display_header){ ?>
            <div class="blog_title">
                <h1><?= $adl_rec_post_title; ?></h1>
            </div>
            <?php } ?>
            <div class="post_slider standard" id="<?= $random_adl_rec_post_wrapper_id ?>">
                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <div class="single_slider">
                        <div class="single_post">
                            <figure>
                                <?php
                                // show image if it is allowed
                                if ( 'yes' === $adl_rec_post_display_img ) {
                                    // get featured image, if not, get first image, if not get default image
                                    $image_url = '';
                                    if ( has_post_thumbnail() ) {
                                        $thumb = get_post_thumbnail_id();
                                        $image_url = wp_get_attachment_url( $thumb , 'full'); //get img URL, and this function recieve only 1 arg. wp-includes/posts.php @5005 line
                                    }else{
                                        // get first image from the content
                                        $first_image = adl_rec_post_first_image_or_default();
                                        if (!empty($first_image)){ $image_url = $first_image; } else {
                                            // get default image if it is allowed to use default image
                                            if ( ( !empty($adl_rec_post_display_placeholder_img) && $adl_rec_post_display_placeholder_img == 'yes' ) ) {
                                                $image_url = (!empty($adl_rec_post_default_feat_img)) ? $adl_rec_post_default_feat_img : '';

                                            }
                                        }
                                    } // ends has_post_thumbnail() condition

                                    $full_image = $image_url; // store before cropping to show in lightbox


                                    // crop the image if it is enabled
                                    if ( !empty($image_url) && !empty($adl_rec_post_image_crop) && $adl_rec_post_image_crop === 'yes') {
                                        $image_url = aq_resize( $image_url, $adl_rec_post_crop_image_width, $adl_rec_post_crop_image_height, true, true, true ); //resize & crop img

                                    }



                                    // show the image if image found
                                    if(!empty($image_url)) { ?>
                                        <div class="post_img">
                                            <img src="<?= esc_url($image_url) ?>" alt="<?php the_title_attribute(); ?>">
                                            <div class="overlay_icons">
                                                <ul>
                                                    <li><a href="<?php the_permalink(); ?>"><span class="fa fa-link"></span></a></li>
                                                    <li><a href="<?= esc_url($full_image) ?>" data-gall="relatedBlog" class="venobox vbox-item"><span class="fa fa-search-plus"></span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    <?php } // ends !empty($image_url)

                                }  // ends show image if it is allowed
                                ?>

                                <figcaption>
                                    <?php if ( $adl_rec_post_display_post_title === 'yes' ) { ?>
                                        <a href="<?php the_permalink(); ?>" rel="bookmark" title="Go to <?php the_title_attribute(); ?>"> <h1 class="post_title"> <?php the_title(); ?></h1></a>
                                        <?php if ( $adl_rec_post_display_post_date === 'yes' ) { ?>
                                            <ul class="post_meta">
                                                <li><span class="fa fa-user-o"></span>By <?php the_author_posts_link(); ?></li>
                                                <li><span class="fa fa-calendar"></span><?= get_the_date(); ?></li>
                                            </ul>
                                        <?php }
                                    } ?>
                                    <?php if ( $adl_rec_post_display_excerpt === 'yes' ) { echo adl_rec_post_get_limited_excerpts($adl_rec_post_excerpt_length); } ?>

                                </figcaption>
                            </figure>
                        </div>


                    </div>

                <?php endwhile; ?>

            </div>

            <div class="slider_navigation standard_nav">
                <span class="fa fa-chevron-left prev"></span>
                <span class="fa fa-chevron-right next"></span>
            </div>
        </div>
    </div>
</div>
