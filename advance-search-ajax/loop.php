<?php
/**
 * create wp query
 */
$query = new WP_Query($args);

// The Loop
while ($query->have_posts()) {

    $query->the_post();

    ?>

    <div class="search-me-post">

        <a href="<?php the_permalink(); ?>">

            <div class="search-me-post-img">
                <?php the_post_thumbnail(); ?>
            </div>

            <?php echo get_the_title(); ?>


        </a>

    </div>

    <?php

}

/**
 * crate link for show all result on search page
 */


	$search_address .=get_bloginfo("url");	
	$search_address .='/?s=' . $keyword . '&category_name=' . $cat . '&author_name=' . $author . '&tag=' . $tag . '&year=' . $year . '&monthnum=' . $monthnum . '&day=' . $day;
	
// select count post for show
$s_posts_p = get_option('s_posts_per_page');
// show count publish posts on result

$count = $query->found_posts;


if ($count > $s_posts_p):

    ?>

 <div class="archive-search-me"><a href="<?php echo esc_url($search_address); ?>"> Show All Result</a></div>

    <?php

endif;

if($count < 1)
echo "<li style='text-align:center'><h3>No Post!</h3></li>";

wp_reset_postdata();

wp_die();