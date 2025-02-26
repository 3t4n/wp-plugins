<?php
/**
 * About Section
 * 
 * @package Ridhi_Companion
 */

$defaults = new Ridhi_Companion_Dummy_Array();
$title    = get_theme_mod( 'home_about_title', __( 'Hi! I\'m Samantha Walters', 'ridhi-companion' ) );
$content  = get_theme_mod( 'home_about_content', $defaults->default_about_content() );
$image    = get_theme_mod( 'home_about_image', RIDHI_COMPANION_URL . 'images/about-img.jpg' );
$link     = get_theme_mod( 'home_about_link', '#' );
$label    = get_theme_mod( 'home_about_label', __( 'More About Me', 'ridhi-companion' ) );
$target   = get_theme_mod( 'ed_home_about_target', false ) ? ' target="_blank"' : '';

if( $title || $content || $image || $link || $label ){ ?>
    <div id="home_about_section" class="about">
        <div class="container">
            <div class="holder">
                <section class="widget widget_raratheme_featured_page_widget">
                    <div class="widget-featured-holder right has-featured-image">                    
                        <?php 
                            if( $title || $content || ( $link && $label ) ){ ?>
                                <div class="text-holder">
                                    <div class="content-wrapper">
                                        <?php 
                                            if( $title ) echo '<h2 class="section-subtitle">' . esc_html( $title ) . '</h2>';
                                            if( $content || ( $link && $label ) ){
                                                echo '<div class="featured_page_content">';
                                                if( $content ) echo '<div class="section-content">' . wpautop( wp_kses_post( $content ) ) . '</div>';
                                                if( $link && $label ) echo '<a href="' . esc_url( $link ) . '" class="btn-readmore btn-primary"' . $target . '>' . esc_html( $label ) . '</a>'; 
                                                echo '</div><!-- .featured_page_content -->';
                                            }
                                        ?>
                                    </div><!-- .content-wrapper -->
                                </div><!-- .text-holder -->
                                <?php 
                            }

                            if( $image ){
                                echo '<div class="img-holder">';
                                if( $link ) echo '<a href="' . esc_url( $link ) .'"' . $target . '>';
                                echo '<img src="' . esc_url( $image ) . '" alt="' . esc_attr( $title ) . '">';
                                if( $link ) echo '</a>';
                                echo '</div><!-- .img-holder -->';
                            }
                        ?>
                    </div><!-- .widget-featured-holder -->        
                </section><!-- .widget_raratheme_featured_page_widget -->
            </div><!-- .holder -->
        </div><!-- .container -->
    </div><!-- .about -->
    <?php
}