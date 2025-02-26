<?php
/**
 * Team Section
 * 
 * @package Ridhi_Companion
*/

$defaults = new Ridhi_Companion_Dummy_Array();
$title    = get_theme_mod( 'team_title', __( 'Our Team', 'ridhi-companion' ) );
$content  = get_theme_mod( 'team_content', __( 'It\'s complicated. I\'ve spent more than 20 years recommending various anti-virus programs as an essential part of any Window setup.', 'ridhi-companion' ) );
$teams    = get_theme_mod( 'front_teams', $defaults->default_teams() );

if( $title || $content || $teams ){ ?>
    <div id="team_section" class="our-team">
        <div class="container">
            <div class="holder">
                <?php 
                    if( $title || $content ){
                        echo '<section class="widget widget_text">';
                        if( $title ) echo '<h2 class="widget-title">' . esc_html( $title ) . '</h2>';
                        if( $content ) echo '<div class="textwidget">' . wpautop( wp_kses_post( $content ) ) . '</div><!-- .textwidget -->';
                        echo '</section><!-- .widget_text -->';
                    }

                    if( $teams ){
                        foreach( $teams as $team ){
                            if( ( isset( $team['name'] ) && $team['name'] ) || ( isset( $team['designation'] ) && $team['designation'] ) || ( isset( $team['description'] ) && $team['description'] ) || ( isset( $team['image'] ) && $team['image'] ) || ( isset( $team['facebook'] ) && $team['facebook'] ) || ( isset( $team['twitter'] ) && $team['twitter'] ) || ( isset( $team['linkedin'] ) && $team['linkedin'] ) || ( isset( $team['instagram'] ) && $team['instagram'] ) || ( isset( $team['youtube'] ) && $team['youtube'] ) ){
                                echo '<section class="widget widget_rrtc_description_widget">';
                                echo '<div class="rtc-team-holder"><div class="rtc-team-inner-holder">';
                                if( ( isset( $team['image'] ) && $team['image'] ) ){
                                    echo '<div class="image-holder">';
                                    if( is_numeric( $team['image'] ) ){
                                        echo wp_get_attachment_image( $team['image'], 'ridhi-blog', false, array( 'itemprop' => 'image' ) );
                                    }else{
                                        echo '<img src="' . esc_url( $team['image'] ) . '" alt="' . esc_attr( $team['name'] ) . '">';
                                    }
                                    echo '</div><!-- .image-holder -->';
                                }
                                if( ( isset( $team['name'] ) && $team['name'] ) || ( isset( $team['designation'] ) && $team['designation'] ) || ( isset( $team['description'] ) && $team['description'] ) ){
                                    echo '<div class="text-holder">';
                                    if( ( isset( $team['name'] ) && $team['name'] ) ) echo '<span class="name">' . esc_html( $team['name'] ) . '</span>';
                                    if( ( isset( $team['designation'] ) && $team['designation'] ) ) echo '<span class="designation">' . esc_html( $team['designation'] ) . '</span>';
                                    if( ( isset( $team['description'] ) && $team['description'] ) ) echo '<div class="description">' . wpautop( wp_kses_post( $team['description'] ) ) . '</div> ';
                                    echo '</div><!-- .text-holder -->';
                                }                                
                                if( ( isset( $team['facebook'] ) && $team['facebook'] ) || ( isset( $team['twitter'] ) && $team['twitter'] ) || ( isset( $team['linkedin'] ) && $team['linkedin'] ) || ( isset( $team['instagram'] ) && $team['instagram'] ) || ( isset( $team['youtube'] ) && $team['youtube'] ) ){
                                    echo '<ul class="social-profile">';
                                    if( ( isset( $team['facebook'] ) && $team['facebook'] ) ) echo '<li><a href="' . esc_url( $team['facebook']) . '" target="_blank"><i class="fab fa-facebook-f"></i></a></li>';
                                    if( ( isset( $team['twitter'] ) && $team['twitter'] ) ) echo '<li><a href="' . esc_url( $team['twitter'] ) .'" target="_blank"><i class="fab fa-twitter"></i></a></li>';
                                    if( ( isset( $team['linkedin'] ) && $team['linkedin'] ) ) echo '<li><a href="' . esc_url( $team['linkedin'] ) .'" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>';
                                    if( ( isset( $team['instagram'] ) && $team['instagram'] ) ) echo '<li><a href="' . esc_url( $team['instagram'] ) .'" target="_blank"><i class="fab fa-instagram"></i></a></li>';
                                    if( ( isset( $team['youtube'] ) && $team['youtube'] ) ) echo '<li><a href="' . esc_url( $team['youtube'] ) .'" target="_blank"><i class="fab fa-youtube"></i></a></li>';
                                    echo '</ul><!-- .social-profile -->';
                                }
                                echo '</div><!-- .rtc-team-inner-holder --></div><!-- .rtc-team-holder -->';
                                
                                echo '<div class="rtc-team-holder-modal">';
                                echo '<div class="rtc-team-inner-holder-modal">';
                                if( ( isset( $team['image'] ) && $team['image'] ) ){
                                    echo '<div class="image-holder">';
                                    if( is_numeric( $team['image'] ) ){
                                        echo wp_get_attachment_image( $team['image'], 'ridhi-blog', false, array( 'itemprop' => 'image' ) );
                                    }else{
                                        echo '<img src="' . esc_url( $team['image'] ) . '" alt="' . esc_attr( $team['name'] ) . '">';
                                    }
                                    echo '</div><!-- .image-holder -->';
                                }
                                if( ( isset( $team['name'] ) && $team['name'] ) || ( isset( $team['designation'] ) && $team['designation'] ) || ( isset( $team['description'] ) && $team['description'] ) ){
                                    echo '<div class="text-holder">';
                                    if( ( isset( $team['name'] ) && $team['name'] ) ) echo '<span class="name">' . esc_html( $team['name'] ) . '</span>';
                                    if( ( isset( $team['designation'] ) && $team['designation'] ) ) echo '<span class="designation">' . esc_html( $team['designation'] ) . '</span>';
                                    if( ( isset( $team['description'] ) && $team['description'] ) ) echo '<div class="description">' . wpautop( wp_kses_post( $team['description'] ) ) . '</div> ';
                                    echo '</div><!-- .text-holder -->';
                                }
                                if( ( isset( $team['facebook'] ) && $team['facebook'] ) || ( isset( $team['twitter'] ) && $team['twitter'] ) || ( isset( $team['linkedin'] ) && $team['linkedin'] ) || ( isset( $team['instagram'] ) && $team['instagram'] ) || ( isset( $team['youtube'] ) && $team['youtube'] ) ){
                                    echo '<ul class="social-profile">';
                                    if( ( isset( $team['facebook'] ) && $team['facebook'] ) ) echo '<li><a href="' . esc_url( $team['facebook']) . '" target="_blank"><i class="fab fa-facebook-f"></i></a></li>';
                                    if( ( isset( $team['twitter'] ) && $team['twitter'] ) ) echo '<li><a href="' . esc_url( $team['twitter'] ) .'" target="_blank"><i class="fab fa-twitter"></i></a></li>';
                                    if( ( isset( $team['linkedin'] ) && $team['linkedin'] ) ) echo '<li><a href="' . esc_url( $team['linkedin'] ) .'" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>';
                                    if( ( isset( $team['instagram'] ) && $team['instagram'] ) ) echo '<li><a href="' . esc_url( $team['instagram'] ) .'" target="_blank"><i class="fab fa-instagram"></i></a></li>';
                                    if( ( isset( $team['youtube'] ) && $team['youtube'] ) ) echo '<li><a href="' . esc_url( $team['youtube'] ) .'" target="_blank"><i class="fab fa-youtube"></i></a></li>';
                                    echo '</ul><!-- .social-profile -->';
                                }
                                echo '<a href="javascript:void(0);" class="close_popup"></a>';
                                echo '</div><!-- .rtc-team-inner-holder-modal -->';                                
                                echo '</div><!-- .rtc-team-holder-modal -->';
                                echo '</section><!-- .widget_rrtc_description_widget -->';
                            }
                        }
                    }
                ?>
            </div><!-- .holder -->
        </div><!-- .container -->
    </div><!-- .our-team -->
    <?php
}