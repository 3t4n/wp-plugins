<?php
/**
 * Testimonial Section
 * 
 * @package Ridhi_Companion
 */

$defaults     = new Ridhi_Companion_Dummy_Array();
$title        = get_theme_mod( 'testimonial_title', __( 'What they are saying', 'ridhi-companion' ) );
$testimonials = get_theme_mod( 'front_testimonials', $defaults->default_testimonials() );

if( $title || $testimonials ){ ?>
    <div id="testimonial_section" class="testimonial-section bg-fullwidth">
        <div class="container">
            <?php
                if( $title ){
                    echo '<section class="widget widget_text"><h2 class="widget-title">' . esc_html( $title ) . '</h2></section><!-- .widget_text -->';
                }

                if( $testimonials ){
                    echo '<div class="holder"><div class="testimonial-slider owl-carousel">';
                    foreach( $testimonials as $testimonial ){
                        if( ( isset( $testimonial['name'] ) && $testimonial['name'] ) || ( isset( $testimonial['designation'] ) && $testimonial['designation'] ) || ( isset( $testimonial['description'] ) && $testimonial['description'] ) || ( isset( $testimonial['image'] ) && $testimonial['image'] ) ){
                            echo '<section class="widget widget_rrtc_testimonial_widget"><div class="rtc-testimonial-holder"><div class="rtc-testimonial-inner-holder">';
                            if( ( isset( $testimonial['image'] ) && $testimonial['image'] ) ){
                                echo '<div class="img-holder">';
                                if( is_numeric( $testimonial['image'] ) ){
                                    echo wp_get_attachment_image( $testimonial['image'], 'thumbnail', false, array( 'itemprop' => 'image' ) );
                                }else{
                                    echo '<img src="' . esc_url( $testimonial['image'] ) . '" alt="' . esc_attr( $testimonial['name'] ) . '">';
                                }
                                echo '</div><!-- .img-holder -->';
                            } 
                            if( ( isset( $testimonial['name'] ) && $testimonial['name'] ) || ( isset( $testimonial['designation'] ) && $testimonial['designation'] ) || ( isset( $testimonial['description'] ) && $testimonial['description'] ) ){
                                echo '<div class="text-holder">';
                                if( ( isset( $testimonial['name'] ) && $testimonial['name'] ) || ( isset( $testimonial['designation'] ) && $testimonial['designation'] ) ){
                                    echo '<div class="testimonial-meta">';
                                    if( isset( $testimonial['name'] ) && $testimonial['name'] ) echo '<span class="name">' . esc_html( $testimonial['name'] ) . '</span>';
                                    if( isset( $testimonial['designation'] ) && $testimonial['designation'] ) echo '<span class="designation">' . esc_html( $testimonial['designation'] ) . '</span>';
                                    echo '</div><!-- .testimonial-meta -->';    
                                } 
                                if( isset( $testimonial['description'] ) && $testimonial['description'] ) echo '<div class="testimonial-content">' . wpautop( wp_kses_post( $testimonial['description'] ) ) . '</div><!-- .testimonial-content -->';
                                echo '</div><!-- .text-holder -->';
                            }
                            echo '</div><!-- .rtc-testimonial-inner-holder --></div><!-- .rtc-testimonial-holder --></section><!-- .widget_rrtc_testimonial_widget -->';
                        }
                    }
                    echo '</div><!-- .testimonial-slider --></div><!-- .holder -->';
                }
            ?>                
        </div><!-- .container -->
    </div><!-- .testimonial-section -->
    <?php
}