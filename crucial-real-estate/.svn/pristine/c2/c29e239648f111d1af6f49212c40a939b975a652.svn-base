<?php
/**
 * The template for displaying all property single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */

get_header(); ?>

<section class="page-wrapper single-post-wrapper">
    <div class="container d-flex flex-wrap">
        <div id="primary" class="content-area">
            <!-- primary-home starting from hcre -->
            <main id="main" class="site-main">

                <?php
                while ( have_posts() ) : the_post();

                    cre_get_template_part('property/content-single.php');

                endwhile; // End of the loop.
                ?>

            </main>
        </div>
    </div>
</section>

<?php get_footer() ?>
