<?php
/**
 * Template part for displaying property post of Gallery section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

$images_id = get_post_meta( get_the_ID(), 'cre_property_images' );
if ( $images_id ) :
    $heading = get_theme_mod( cre_get_active_theme_prefix().'_property_post_element_gallery', esc_html__( 'Gallery', 'crucial-real-estate' ) );
    ?>
<div class="property-gallery single-property-section entry-content">
    <?php if ( $heading != '' ) : ?>
    <h4><?php echo esc_html( $heading ); ?></h4>
    <?php endif; ?>
    <div class="property-gallery-slider">
        <?php foreach ( $images_id as $img_id ) : $img_attr = wp_get_attachment_image_src( $img_id, 'full' ); ?>
        <figure>
            <img src="<?php echo esc_url( $img_attr[0] ) ?>"
                alt="<?php esc_html_e( 'Gallery Image', 'crucial-real-estate' ); ?>">
        </figure>
        <?php endforeach; ?>
    </div>
</div><!-- .property-gallery -->
<?php
endif;