<div class="edd-showcase-slider">
    <?php
    $args = array(
        'post_type'      => 'download',
        'post_status'    => 'publish',
        'posts_per_page' => -1, // retrieve all posts
    );
    $posts = get_posts($args);

    $chunks = array_chunk($posts, $productsPerSlides);

    foreach ($chunks as $chunk) {
        echo '<div class="edd-showcase-slide">';
        foreach ($chunk as $product) {
            setup_postdata($product);
            // Display post content
            echo '<div class="edd-slide-item">';
            echo get_the_post_thumbnail(intval($product->ID));
            echo '<h3>' . $product->post_title . '</h3>';
            edd_price(intval($product->ID));
            echo edd_get_purchase_link(array_merge(['download_id' => intval($product->ID)],$purchaseLinkArgs));
            echo '</div>';
        }
        echo '</div>';
    }
    wp_reset_postdata();
    ?>
</div>

<style>
    .edd-showcase-slider {
        display: flex;
        flex-wrap: nowrap;
        overflow-x: auto;
        scroll-snap-type: x mandatory;
    }

    .edd-showcase-slide {
        flex: 0 0 auto;
        width: 100%;
        scroll-snap-align: start;
        display: flex;
    }

    .edd-slide-item {
        width: calc(100% / 3);
        padding: 10px;
        box-sizing: border-box;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    @media (max-width: 768px) {
        .edd-slide-item {
            width: 50%;
        }
    }

    @media (max-width: 480px) {
        .edd-slide-item {
            width: 100%;
        }
    }
</style>
