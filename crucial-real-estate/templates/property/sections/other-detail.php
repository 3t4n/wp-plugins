<?php
/**
 * Template part for displaying property post of other detail section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

$property_id        = get_post_meta( get_the_ID(), 'cre_property_id', true );
$lot_size           = get_post_meta( get_the_ID(), 'cre_property_lot_size', true );
$additional_details = get_post_meta( get_the_ID(), 'cre_additional_details_list', true );
$heading            = get_theme_mod( cre_get_active_theme_prefix().'_property_post_element_other', esc_html__( 'Others Detail', 'crucial-real-estate' ) );

if ( $property_id || $lot_size || $additional_details ) :
?>
<div class="property-other-detail single-property-section entry-content">

    <?php if ( $heading != '' ) : ?>
    <h4><?php echo esc_html( $heading ); ?></h4>
    <?php endif; ?>

    <ul>
        <?php if ( $property_id ) : ?>
        <li>
            <span class="other-detail-heading"><?php esc_html_e( 'property Id:', 'crucial-real-estate' ); ?></span>
            <span class="other-detail-info"><?php echo esc_html( $property_id ); ?></span>
        </li>
        <?php endif; ?>

        <?php if ( $lot_size ) :
            $property_lot_size = $lot_size;
            if ( $lot_size_suffix = get_post_meta( get_the_ID(), 'cre_property_lot_size_postfix', true ) ) {
                $property_lot_size .= ' ' . $lot_size_suffix;
            }
            ?>
        <li>
            <span
                class="other-detail-heading"><?php esc_html_e( 'Property Lot Size:', 'crucial-real-estate' ); ?></span>
            <span class="other-detail-info"><?php echo esc_html( $property_lot_size ); ?></span>
        </li>
        <?php endif; ?>

        <?php if ( $additional_details ) : ?>

        <?php foreach ( $additional_details as $detail ) : ?>
        <li>
            <span class="other-detail-heading"><?php echo esc_html( $detail[0] ); ?>:</span>
            <span class="other-detail-info"><?php echo esc_html( $detail[1] ); ?></span>
        </li>
        <?php endforeach; ?>

        <?php endif; ?>
    </ul>
</div><!-- .property-other-detail -->
<?php endif;