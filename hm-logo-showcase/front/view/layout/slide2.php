<?php

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
include HMLS_PATH . 'assets/css/slide.php';
?>
<div class="hmls-slide-wrapper">

    <div class="hmls-view-slide" <?php 
echo ( 'rtl' === $hmls_template ? 'dir="rtl"' : '' );
?>>
        <?php 
while ( $hmls_logos->have_posts() ) {
    $hmls_logos->the_post();
    ?>
            <div class="splide__slide hmls-tooltip">
            <?php 
    $hmls_logo_url = get_post_meta( $post->ID, 'hmls_logo_url', true );
    $hmls_img_url = get_post_meta( $post->ID, 'hmls_img_url', true );
    ?>
                <a href="<?php 
    echo esc_url( $hmls_logo_url );
    ?>" target="_blank">
                <?php 
    if ( $hmls_img_url ) {
        ?>
                    <img src="<?php 
        echo esc_url( $hmls_img_url );
        ?>" alt="<?php 
        _e( 'No Image Available', HMLS_TXT_DOMAIN );
        ?>" width="256">
                    <?php 
    } else {
        if ( has_post_thumbnail() ) {
            the_post_thumbnail();
        } else {
            ?>
                    <img src="<?php 
            echo esc_attr( HMLS_ASSETS . 'img/noimage.jpg' );
            ?>" alt="<?php 
            _e( 'No Logo Found', HMLS_TXT_DOMAIN );
            ?>">
                    <?php 
        }
    }
    ?>
                </a>
            </div>
            <?php 
}
?>
    </div>

</div>



	
