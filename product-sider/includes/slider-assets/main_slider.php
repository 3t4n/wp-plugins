<?php
    while ( $plslider_slider->have_posts() ) : $plslider_slider->the_post();
    $product = wc_get_product( $post->ID );
?>
    
    <div class="col-8 col-sm-10 slider justify-content-center">
        <div class="contents mr-1">

            <h2><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 8 ); ?></a></h2>
            <p class="details text-secondary"><?php echo wp_trim_words( get_the_content(), 15, esc_html__(' more...') ); ?></p>
            <p class="price">Only @ <?php echo get_woocommerce_currency_symbol() . $product->get_price(); ?></p>

        </div>

        <div class="image ml-1 d-flex align-items-center"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( $plslider_img_size ); ?></a></div>
    </div>

<?php endwhile; ?>