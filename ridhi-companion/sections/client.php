<?php
/**
 * Client Section
 * 
 * @package Ridhi_Companion
 */

$defaults = new Ridhi_Companion_Dummy_Array();
$title    = get_theme_mod( 'client_title', __( 'As Featured In', 'ridhi-companion' ) );
$logos    = get_theme_mod( 'front_clients', $defaults->default_logos() );

if( $title || $logos ){ ?>
    <div id="client_section" class="clients bg-fullwidth">
        <div class="container">
            <section class="widget widget_raratheme_client_logo_widget">
                <div class="raratheme-client-logo-holder">
                    <div class="raratheme-client-logo-inner-holder">
                        <?php 
                            if( $title ) echo '<h2 class="widget-title">' . esc_html( $title ) . '</h2>';

                            if( $logos ){
                                foreach( $logos as $logo ){
                                    echo '<div class="image-holder">';
                                    if( isset( $logo['link'] ) && $logo['link'] ) echo '<a href="' . esc_url( $logo['link'] ) . '">';
                                    if( isset( $logo['image'] ) && $logo['image'] ){
                                        if( is_numeric( $logo['image'] ) ){
                                            echo wp_get_attachment_image( $logo['image'], 'full', false, array( 'itemprop' => 'image' ) );
                                        }else{
                                            echo '<img src="' . esc_url( $logo['image'] ) . '" alt="">';
                                        }                                        
                                    } 
                                    if( isset( $logo['link'] ) && $logo['link'] ) echo '</a>';
                                    echo '</div><!-- .image-holder -->';
                                }
                            }
                        ?>
                    </div><!-- .raratheme-client-logo-inner-holder -->
                </div><!-- .raratheme-client-logo-holder -->
            </section><!-- .widget_raratheme_client_logo_widget -->
        </div><!-- .container -->
    </div><!-- .clients -->
    <?php
}