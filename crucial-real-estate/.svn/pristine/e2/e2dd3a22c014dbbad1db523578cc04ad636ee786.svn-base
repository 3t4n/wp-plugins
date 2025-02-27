<?php
/**
 * Template part for displaying property post of feature section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

$property_features = get_the_terms( get_the_ID(), 'property-feature');
if ( $property_features ) :
$heading = get_theme_mod( cre_get_active_theme_prefix().'_property_post_element_features', esc_html__( 'Features', 'crucial-real-estate' ) );
?>
<div class="property-feature-detail single-property-section entry-content">
    <?php if ( $heading != '' ) : ?>
    <h4><?php echo esc_html( $heading ); ?></h4>
    <?php endif; ?>
    <ul>
        <?php foreach ( $property_features as $feature ) : ?>
        <li>
            <?php echo esc_html( $feature->name ); ?>
        </li>
        <?php endforeach; ?>
    </ul>
</div><!-- .property-feature-detail -->
<?php endif;