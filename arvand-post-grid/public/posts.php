<div id="apg-wrap">
    <?php
    $general = apg_general_options();
    $page_number = (isset($_GET['apg_pn']) and $_GET['apg_pn'] > 0) ? intval($_GET['apg_pn']) : 1;

    $args = array(
        'post_type' => $general['post_type'],
        'posts_per_page' => $general['posts_num'],
        'paged' => $page_number
    );

    $query = new WP_Query($args);
    ?>

    <?php if ($query->have_posts()): ?>
        <div>
            <div class="row no-gutters">
                <?php while ($query->have_posts()): ?>
                    <?php
                    $query->the_post();
                    $col = apg_post_columns_options();
                    $cols = 'col-sm-'.$col['sm'].' col-md-'.$col['md'].' col-lg-'.$col['lg'].' col-xl-'.$col['xl'].'';
                    ?>

                    <div class="<?php esc_attr_e($cols); ?>">
                        <article class="apg-card">
                            <?php $image = apg_post_image_options(); ?>

                            <?php if ($image['display']): ?>
                                <div class="apg-image-wrap">
                                    <?php if ($image['height'] == 'equal'): ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <div class="apg-image" style="background-image: url(<?php the_post_thumbnail_url(esc_html($image['size'])); ?>)"></div>
                                        </a>
                                    <?php else: ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <img class="apg-image" src="<?php the_post_thumbnail_url(esc_html($image['size'])); ?>"/>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>

                            <?php $avatar = apg_avatar_options(); ?>

                            <?php if ($avatar['display']): ?>
                                <header class="apg-header">
                                    <img class="apg-avatar" src="<?php echo get_avatar_url(get_the_author_meta('email')); ?>" alt="<?php the_author(); ?>"/>
                                </header>
                            <?php endif; ?>

                            <div class="apg-content">
                                <?php $cat = apg_category_options(); ?>

                                <?php if ($cat['display']): ?>
                                    <div class="apg-category">
                                        <?php
                                        $sep = !empty($cat['sep']) ? '<span>'.esc_html($cat['sep']).'</span>' : '';
                                        the_category($sep, '', get_the_ID());
                                        ?>
                                    </div>
                                <?php endif; ?>

                                <div class="apg-title">
                                    <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                                </div>

                                <?php $excerpt = apg_excerpt_options(); ?>

                                <?php if ($excerpt['display']): ?>
                                    <div class="apg-excerpt">
                                        <?php the_excerpt(); ?>
                                    </div>
                                <?php endif; ?>

                                <?php $more = apg_read_more_options(); ?>

                                <?php if ($more['display']): ?>
                                    <div class="apg-more-wrap">
                                        <a href="<?php the_permalink(); ?>">
                                            <button class="apg-more"><?php esc_html_e($more['text']); ?></button>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <?php $footer = apg_footer_options(); ?>

                            <?php if ($footer['footer_display'] and ($footer['author_display'] or $footer['date_display'])): ?>
                                <footer class="apg-footer">
                                    <?php if ($footer['author_display']): ?>
                                        <span class="apg-author"><?php the_author(); ?></span>
                                    <?php endif; ?>

                                    <?php if ($footer['date_display']): ?>
                                        <span class="apg-date"><?php echo get_the_date(); ?></span>
                                    <?php endif; ?>
                                </footer>
                            <?php endif; ?>
                        </article>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>

        <div class="apg-clear"></div>

        <?php
        $pw = apg_pagination_options('pw');
        $ppn = apg_pagination_options('ppn');
        ?>

        <?php if ($pw['display'] and $query->max_num_pages > 1): ?>
            <div id="apg-pagination">
                <?php apg_posts_pagination($page_number, $query->max_num_pages, true); ?>
            </div>
        <?php endif; ?>

        <?php wp_reset_postdata(); ?>

        <div class="apg-clear"></div>
    <?php else: ?>
        <div id="apg-no-result">
            <h3><?php _e('Sorry, there is no result.', 'arvand-posts'); ?></h3>
        </div>

        <div class="apg-clear"></div>
    <?php endif; ?>
</div>