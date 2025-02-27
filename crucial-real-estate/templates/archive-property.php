<?php
/**
 * The template for displaying property archive pages
 *
 * @see https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header(); ?>

<section class="page-wrapper">
    <div class="container">
        <div id="primary" class="content-area">
            <!-- primary-home starting from hcre -->
            <main id="main" class="site-main">
                <div class="post-layout-matches-wrap">

                    <?php if ( have_posts() ) : ?>
                        <div class="row columns post-wrapper post-grid-view" data-columns="1" data-columns-md="2" data-columns-lg="3">
                            <?php

                            /* Start the Loop */
                            while ( have_posts() ) : the_post();
                                /*
                                 * Include the Post-Type-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                                 */
                                cre_get_template_part('property/content.php');

                            endwhile; ?>
                        </div><!-- .agent-item-wrap -->

                        <div class="pagination-wrap pagination-numeric">
                            <?php the_posts_pagination(); ?>
                        </div>

                    <?php endif; ?>
                </div>
            </main>
        </div>
    </div>
</section>

<?php get_footer(); ?>
