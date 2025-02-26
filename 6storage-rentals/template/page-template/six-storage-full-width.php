<?php

add_filter( 'body_class', 'six_storage_custom_class' );
function six_storage_custom_class( $classes ) {
    if ( is_page_template( 'six-storage-full-width.php' ) ) {
        $classes[] = 'cc';
        $classes[] = 'six-storage-body';
    }
    if(get_locale() == 'ar' || get_locale() == 'he_IL'){
        $classes[] = 'six-storage-arabic';
    }
    return $classes;
}

get_header();

?>
    <div id="six-storage-site-content">
    <div id="six-storage-internet-activity-mymodal" class="six-storage-internet-activity-modal" style="display:none;"></div>
        <?php
            while ( have_posts() ) : the_post();
            the_content();
            endwhile; // End of the loop.
        ?>
    </div>
<?php

get_footer();


