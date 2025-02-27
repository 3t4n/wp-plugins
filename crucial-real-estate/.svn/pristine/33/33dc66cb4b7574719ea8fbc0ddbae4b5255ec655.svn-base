<?php
/**
 * Template part for displaying property post of main detail[property-meta] section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

$heading    = get_theme_mod( cre_get_active_theme_prefix().'_property_post_element_main', esc_html__( 'Main Detail', 'crucial-real-estate' ) );
?>
<div class="property-meta entry-meta single-property-section entry-content">

    <?php if ( $heading != '' ) : ?>
    <h4><?php echo esc_html( $heading ); ?></h4>
    <?php endif; ?>

    <?php
    $options = map_deep( wp_unslash( get_option( 'cre_property_basic_builder' ) ), 'sanitize_text_field' );
    $options = ( $options ) ? $options : cre_property_basic_default_fields();
    foreach ( $options as $key => $value) {
        $field_id = 'cre_property_basic_builder_' . intval( $key );
        $basic_fields = get_post_meta( get_the_ID(), $field_id );
        if ( $basic_fields && !empty($basic_fields) ) { ?>
    <div class="meta-wrapper">
        <span class="meta-icon">
            <?php if( isset( $value['image'] ) && $value['image'] != '' ) {
                        $image_src = absint( $value['image'] ) ? wp_get_attachment_url( $value['image'] ) : $value['image'];
                        ?>
            <img src="<?php echo esc_url( $image_src ); ?>" alt="<?php echo esc_attr($value['name']); ?>" width="20"
                height="20">
            <?php } else { ?>
            <i class="fas <?php echo esc_attr( $value['icon'] ); ?>"></i>
            <?php }?>
        </span>
        <?php if ( isset( $basic_fields[0]) ) : ?>
        <span class="meta-value"><?php echo esc_html( $basic_fields[0] ); ?></span>
        <?php endif; ?>
        <?php if ( isset( $basic_fields[1]) ) : ?>
        <span class="meta-unit"><?php echo esc_html( $basic_fields[1] ); ?></span>
        <?php endif; ?>
    </div>

    <?php 
        }
    } ?>

</div><!-- .property-meta entry-meta -->