<?php if ($has_post) : ?>

    <div class="eso-post-box uk-transition-toggle">

        <?php if ( !empty($image_visibility) ) : ?>

            <div class="<?php echo esc_attr(implode(' ', $image_wrap_class)); ?>">

                <div class="eso-post-outer-wrap uk-position-relative uk-inline uk-overflow-hidden width-1-1">

                    <a href="<?php echo $link; ?>">

                        <img class="uk-float-left uk-transition-opaque <?php echo esc_attr(implode(' ', $image_class)); ?>" src="<?php echo $image; ?>">

                    </a>

                    <div class="uk-position-cover eso-post-box-overlay" style="pointer-events: none;"></div>

                    <?php if ( !empty($date_visibility) ) : ?>

                        <div class="eso-post-box-date <?php echo esc_attr(implode(' ', $date_wrap_class)); ?>">
                            <div class="eso-post-box-day <?php echo esc_attr(implode(' ', $day_class)); ?>"><?php echo get_the_date( 'd', $post_id ); ?></div>
                            <div class="eso-post-box-month <?php echo esc_attr(implode(' ', $month_class)); ?>"><?php echo get_the_date( 'M', $post_id ); ?></div>
                        </div>

                    <?php endif; ?>

                    <?php if ( !empty($categories_visibility) ) : ?>

                        <?php

                        $post_categories = wp_get_post_categories( $post_id );
                        $cats = array();

                        foreach($post_categories as $c){
                            $cats[] = array('name' => get_category($c)->name, 'link' => get_category_link($c));
                        }

                        ?>

                        <div class="eso-post-box-categories uk-overlay <?php echo esc_attr(implode(' ', $categories_class)); ?>">
                            <?php foreach($cats as $k => $v): ?>
                                <a href="<?php echo $v['link']; ?>"><?php echo $v['name']; ?></a><?php if (next($cats)) echo ', '; ?>
                            <?php endforeach; ?>
                        </div>

                    <?php endif; ?>

                </div>

            </div>

        <?php endif; ?>

        <div class="eso-post-box-wrap <?php echo esc_attr(implode(' ', $wrap_class)); ?>">

            <?php if ( !empty($title_visibility) ) : ?>

                <div class="eso-post-box-title <?php echo esc_attr(implode(' ', $title_class)); ?>">
                    <a href="<?php echo $link; ?>" class="<?php echo esc_attr(implode(' ', $title_link_class)); ?>">
                        <?php echo get_the_title($post_id); ?>
                    </a>
                </div>

            <?php endif; ?>

            <?php if ( !empty($author_visibility) || !empty($comment_visibility) ) : ?>

                <div class="eso-post-box-author-comment <?php echo esc_attr(implode(' ', $author_comment_class)); ?>">

                    <?php $post_author_id = get_post_field( 'post_author', $post_id ); ?>

                    <?php if ( !empty($author_visibility) ) : ?>

                        <?php echo esc_attr($author_label); ?> <a class="<?php echo esc_attr(implode(' ', $author_class)); ?> eso-post-box-author" href="<?php echo get_author_posts_url($post_author_id); ?>"><?php echo get_the_author_meta( 'display_name', $post_author_id ); ?></a>

                    <?php endif; ?>

                    <?php if ( !empty($author_visibility) && !empty($comment_visibility) ) : ?>
                        <?php echo esc_attr($separator); ?>
                    <?php endif; ?>

                    <?php if ( !empty($comment_visibility) ) : ?>

                        <a class="<?php echo esc_attr(implode(' ', $comment_class)); ?> eso-post-box-comment" href="<?php echo get_the_permalink($post_id); ?><?php echo esc_attr($respond_hash); ?>"><?php echo esc_attr($reply_label); ?></a>

                    <?php endif; ?>

                </div>

            <?php endif; ?>

            <?php if ( !empty($excerpt_visibility) ) : ?>

                <div class="eso-post-box-excerpt <?php echo esc_attr(implode(' ', $excerpt_class)); ?>">

                    <?php

                    $my_post = get_post($post_id);

                    if ( $excerpt_source == 'content' ) {
                        echo esc_html(wp_trim_words(wp_strip_all_tags($my_post->post_content), absint($excerpt_length))) . '';
                    }

                    if ( $excerpt_source == 'excerpt' ) {
                        if ( !empty($my_post->post_excerpt) ) {
                            echo esc_html(wp_trim_words(wp_strip_all_tags($my_post->post_excerpt), absint($excerpt_length))) . '';
                        } else {
                            echo esc_html(wp_trim_words(wp_strip_all_tags($my_post->post_content), absint($excerpt_length))) . '';
                        }
                    }

                    ?>

                </div>

            <?php endif; ?>

            <?php if ( !empty($button_visibility) ) : ?>

                <div class="eso-post-box-link <?php echo esc_attr(implode(' ', $button_wrap_class)); ?>">

                    <a class="uk-button uk-button-text <?php echo esc_attr(implode(' ', $button_class)); ?>" href="<?php echo get_the_permalink($post_id); ?>"><?php echo esc_html($button_text); ?></a>

                </div>

            <?php endif; ?>

        </div>

    </div>

<?php else : ?>

    <?php echo __('PLease ensure your post selection contains a valid post.', 'echelon-so'); ?>

<?php endif; ?>
