<?php
/**
 * Social Section
 * 
 * @package Ridhi_Companion
 */

$title  = get_theme_mod( 'social_title', __( 'Get Connected', 'ridhi-companion' ) );
$social = new Ridhi_Companion();

if( $title || ( $social->social_links( 'section', false ) ) ){ ?>
    <div id="social_section" class="social-media-section bg-fullwidth">
        <div class="container">
            <section class="widget widget_rtc_social_links">
                <?php 
                    if( $title ) echo '<h2 class="widget-title">' . esc_html( $title ) . '</h2>';
                    if( $social->social_links( 'section', false ) ) $social->social_links( 'section' );
                ?>
            </section>
        </div>
    </div><!-- .social-media-section -->
    <?php
}