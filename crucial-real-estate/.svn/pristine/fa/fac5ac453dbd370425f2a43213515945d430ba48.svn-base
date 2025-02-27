<?php
/**
 * Template part for displaying property post of floor plan section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

$floor_plans = get_post_meta( get_the_ID(), 'cre_floor_plans', true );

if ( $floor_plans && ! empty( $floor_plans[0]['cre_floor_plan_name'] ) ) :
	$heading = get_theme_mod( cre_get_active_theme_prefix().'_property_post_element_floor', esc_html__( 'Floor Plan', 'crucial-real-estate' ) );
	?>
<div class="floor-plan-section single-property-section entry-content">

    <?php if ( $heading != '' ) : ?>
    <h4><?php echo esc_html( $heading ); ?></h4>
    <?php endif; ?>

    <div class="accordion-item-wrap">
        <?php foreach ( $floor_plans as $floor ) : ?>
        <div class="accordion-item">
            <span class="accordion-icon"></span>
            <?php if ( ! empty( $floor['cre_floor_plan_name'] ) ) : ?>
            <a class="toggle" href="javascript:void(0);"><?php echo esc_html( $floor['cre_floor_plan_name'] ); ?></a>
            <?php endif; ?>
            <div class="accordion-content">
                <div class="floor-plan-item-detail-wrap">
                    <ul>
                        <?php
								if ( ! empty( $floor['cre_floor_plan_size'] ) ) :
									$size  = $floor['cre_floor_plan_size'];
									$size .= ! empty( $floor['cre_floor_plan_size_postfix'] ) ? ' ' . $floor['cre_floor_plan_size_postfix'] : '';
									?>
                        <li>
                            <span
                                class="floor-plan-heading"><?php esc_html_e( 'Size:', 'crucial-real-estate' ); ?></span>
                            <span class="floor-plan-info"><?php echo esc_html( $size ); ?></span>
                        </li>
                        <?php endif; ?>

                        <?php if ( ! empty( $floor['cre_floor_plan_bedrooms'] ) ) : ?>
                        <li>
                            <span
                                class="floor-plan-heading"><?php esc_html_e( 'Rooms:', 'crucial-real-estate' ); ?></span>
                            <span
                                class="floor-plan-info"><?php echo esc_html( $floor['cre_floor_plan_bedrooms'] ); ?></span>
                        </li>
                        <?php endif; ?>

                        <?php if ( ! empty( $floor['cre_floor_plan_bathrooms'] ) ) : ?>
                        <li>
                            <span
                                class="floor-plan-heading"><?php esc_html_e( 'Bathrooms:', 'crucial-real-estate' ); ?></span>
                            <span
                                class="floor-plan-info"><?php echo esc_html( $floor['cre_floor_plan_bathrooms'] ); ?></span>
                        </li>
                        <?php endif; ?>

                        <?php if ( ! empty( $floor['cre_floor_plan_price'] ) && function_exists( 'cre_get_property_floor_price' ) ) : ?>
                        <li>
                            <span class="floor-plan-heading"><?php esc_html_e( 'Price:', 'real-home' ); ?></span>
                            <span class="floor-plan-info"><?php cre_property_floor_price( $floor ); ?></span>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>

                <?php if ( ! empty( $floor['cre_floor_plan_desc'] ) ) : ?>
                <div class="floor_description">
                    <?php echo wp_kses_post( wpautop( $floor['cre_floor_plan_desc'] ) ); ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div><!-- .accordion-item-wrap -->

</div><!-- .floor-plan-section -->
<?php
endif;