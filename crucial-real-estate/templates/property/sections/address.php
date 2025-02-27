<?php
/**
 * Template part for displaying property single post of address details section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

$map_location = get_post_meta( get_the_ID(), 'cre_property_map_address', true );
$address    = get_post_meta( get_the_ID(), 'cre_property_address', true );
$city       = get_post_meta( get_the_ID(), 'cre_property_city', true );
$area       = get_post_meta( get_the_ID(), 'cre_property_area', true );
$state      = get_post_meta( get_the_ID(), 'cre_property_state', true );
$zip        = get_post_meta( get_the_ID(), 'cre_property_zip', true );
$country    = get_post_meta( get_the_ID(), 'cre_property_country', true );
$heading    = get_theme_mod( cre_get_active_theme_prefix().'_property_post_element_address', esc_html__( 'Address', 'crucial-real-estate' ) );
?>
<div class="property-address-wrap single-property-section entry-content">
    <?php if ( $heading != '' ) : ?>
    <h4><?php echo esc_html( $heading ); ?></h4>
    <?php endif; ?>
    <ul>
        <?php if ( $address ) : ?>
        <li>
            <span class="property-address-heading"><?php esc_html_e( 'Address :', 'crucial-real-estate' ); ?></span>
            <span class="property-address-info"><?php echo esc_html( $address ); ?></span>
        </li>
        <?php endif; ?>

        <?php if ( $city ) : ?>
        <li>
            <span class="property-address-heading"><?php esc_html_e( 'City :', 'crucial-real-estate' ); ?></span>
            <span class="property-address-info"><?php echo esc_html( $city ); ?></span>
        </li>
        <?php endif; ?>

        <?php if ( $area ) : ?>
        <li>
            <span class="property-address-heading"><?php esc_html_e( 'Area :', 'crucial-real-estate' ); ?></span>
            <span class="property-address-info"><?php echo esc_html( $area ); ?></span>
        </li>
        <?php endif; ?>

        <?php if ( $state ) : ?>
        <li>
            <span class="property-address-heading"><?php esc_html_e( 'State :', 'crucial-real-estate' ); ?></span>
            <span class="property-address-info"><?php echo esc_html( $state ); ?></span>
        </li>
        <?php endif; ?>

        <?php if ( $zip ) : ?>
        <li>
            <span class="property-address-heading"><?php esc_html_e( 'Zip :', 'crucial-real-estate' ); ?></span>
            <span class="property-address-info"><?php echo esc_html( $zip ); ?></span>
        </li>
        <?php endif; ?>

        <?php if ( $country ) : ?>
        <li>
            <span class="property-address-heading"><?php esc_html_e( 'Country :', 'crucial-real-estate' ); ?></span>
            <span class="property-address-info"><?php echo esc_html( $country ); ?></span>
        </li>
        <?php endif; ?>

        <?php if ( $map_location ) : ?>
        <li class="address-map">
            <?php

                $google_map_address_url = "http://maps.google.com/?q=" . $map_location;
                ?>
            <a href="<?php echo esc_url($google_map_address_url); ?>"
                target="_blank"><?php esc_html_e( 'open in google map', 'crucial-real-estate' ); ?></a>
        </li>
        <?php endif; ?>

    </ul>

</div><!-- .property-address-wrap -->