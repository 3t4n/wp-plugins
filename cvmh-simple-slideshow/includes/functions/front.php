<?php
defined( 'ABSPATH' ) or exit;

add_action('wp_enqueue_scripts', 'cvmh_slideshow_front_enqueues' );
function cvmh_slideshow_front_enqueues() {
    wp_register_script( 'cvmh-slideshow', plugins_url( '../../assets/js/front.min.js', __FILE__), array( 'jquery' ) );
    wp_register_style( 'cvmh-slideshow', plugins_url( '../../assets/css/front.min.css', __FILE__) );
}
    
add_shortcode( 'cvmh-simple-slideshow', 'cvmh_slideshow_front_shortcode' );
function cvmh_slideshow_front_shortcode( $atts ) {
    extract( shortcode_atts( array( 'categories' => '' ), $atts ) );
    $params = array( 'categories' => $categories );
    return cvmh_slideshow_front_render( $params );
}
     
/**
 * Render slideshow
 * 
 * @return type
 */
function cvmh_slideshow_front_render( $params ) {
    wp_enqueue_script( 'cvmh-slideshow' );
    wp_enqueue_style( 'cvmh-slideshow' );
    wp_localize_script( 'cvmh-slideshow', 'cvmhSlideshow', json_decode( get_option( CVMH_SLIDESHOW_SLUG ), true ) );
    $args = array(
        'post_type'      => CVMH_SLIDESHOW_SLUG,
        'posts_per_page' => -1
    );
    if ( ! empty( $params['categories'] ) ) :
        $args['tax_query'] = array( array(
            'taxonomy' => CVMH_SLIDESHOW_SLUG . '_category',
            'field'    => 'slug',
            'terms'    => explode( ',', $params['categories'] ),
        ) );
    endif;
    $posts = get_posts( $args );
    $nb_posts = count( $posts );

    if ( ! empty ( $posts ) ) :

        $options = json_decode( get_option( CVMH_SLIDESHOW_SLUG ), true );
        $i = 0;

        ob_start(); ?>

        <div class="cvmh-slideshow">
            <?php do_action( 'cvmh_slideshow_prepend' ); ?>

            <?php if ( $options['show_nav'] and $nb_posts > 1 ) : ?>
                <div class="cvmh-slideshow-nav">
                    <button class="cvmh-slideshow-prev">prev</button>
                    <button class="cvmh-slideshow-next">next</button>
                </div>
            <?php endif; ?>    

            <ul>
                <?php foreach ( $posts as $post ) : ?>
                    <?php
                    $image_id = get_post_meta( $post->ID, '_cvmh_slide_image', true );
                    $image = wp_get_attachment_image_src( $image_id, CVMH_SLIDESHOW_SLUG );
                    $slide_content = '';
                    if ( ! empty ( $options['fields'] ) ) :
                        foreach( $options['fields'] as $key => $label ) :
                            $value = get_post_meta( $post->ID, '_cvmh_slide_' . $key, true );
                            if ( !empty( $value ) ) :
                                $slide_content.= '<div class="slide_' . $key . '">' . apply_filters( "cvmh_slide_content_field_{$key}", $value, $post->ID ) . '</div>';
                                if ( $key == 0 ) :
                                    $slide_alt = $value;
                                endif;
                            endif;
                        endforeach;
                    endif;
                    ?>
                    <li data-item="item-<?php echo $i+1; ?>" class="slide cvmh-animated-slide item-<?php echo ($i+1) . ( $i == 0 ? ' active' : '' ); ?>" <?php if ( ! empty( $options['background'] ) ) : ?>style="background-image:url('<?php echo $image[0]; ?>');"<?php endif; ?>>
                        <?php if ( empty( $options['background'] ) ) : ?>
                            <img class="slide-img" src="<?php echo $image[0]; ?>" alt="<?php echo $slide_alt; ?>" width="<?php echo $options['width']; ?>" height="<?php echo $options['height']; ?>" />
                        <?php endif; ?>
                        <?php if ( ! empty ( $slide_content ) ) : ?>
                            <div class="slide-content"><?php echo apply_filters( 'cvmh_slide_content', $slide_content ); ?></div> 
                        <?php else : ?>
                            <div class="slide-no-content"></div>
                        <?php endif; ?>
                        <?php
                        $lien = get_post_meta( $post->ID, '_cvmh_slide_link', true );
                        $target = '';
                        $new_window = get_post_meta( $post->ID, '_cvmh_slide_new_window', true );
                        if ( !empty( $new_window ) ) :
                            $target = ' target="_blank"';
                        endif;
                        ?>
                        <?php if ( !empty( $lien ) ) : ?>
                            <a href="<?php echo $lien; ?>"<?php echo $target; ?> class="slide-link"></a>
                        <?php endif; ?>
                    </li>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </ul>

            <?php if ( $options['show_dots'] and $nb_posts > 1 ) : ?>
                <div class="cvmh-slideshow-dots">
                    <?php for ( $i=1; $i<=$nb_posts; $i++ ) : ?>
                        <button class="cvmh-slideshow-dot dot-<?php echo $i; ?><?php echo ($i == 1) ? ' active' : ''; ?>" data-destination="<?php echo $i; ?>"><?php echo $i; ?></button>
                    <?php endfor; ?>
                </div>
            <?php endif; ?>   

            <?php do_action( 'cvmh_slideshow_append' ); ?>
        </div>

    <?php
    endif;

    return ob_get_clean();
}