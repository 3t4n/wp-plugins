<?php

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
include HMLS_PATH . 'assets/css/slide.php';
?>
<div class="hmls-slide-wrapper">

    <div class="splide">

        <div class="splide__track">

            <ul class="splide__list">
                <?php 
while ( $hmls_logos->have_posts() ) {
    $hmls_logos->the_post();
    ?>
                    <li class="splide__slide hmls-tooltip">
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
                    </li>
                    <?php 
}
?>
            </ul>

        </div>
            
        <?php 
if ( $hmls_progress_bar ) {
    ?>
            <div class="splide__progress">
                <div class="splide__progress__bar">
                </div>
            </div>
            <?php 
}
if ( $hmls_play_pause ) {
    ?>
            <div class="splide__autoplay">
                <button class="splide__play">Play</button>
                <button class="splide__pause">Pause</button>
            </div>
            <?php 
}
?>

    </div>
</div>



	
