<?php
/**
 * Service Section
 * 
 * @package Ridhi_Companion
 */
$defaults = new Ridhi_Companion_Dummy_Array();
$title    = get_theme_mod( 'service_title', __( 'Services We Offer', 'ridhi-companion' ) );
$content  = get_theme_mod( 'service_content', __( 'Our commitment is to provice comprehensive quality care', 'ridhi-companion' ) );
$label    = get_theme_mod( 'home_service_label', __( 'Learn More', 'ridhi-companion' ) );
$target   = get_theme_mod( 'ed_home_service_target', false ) ? ' target="_blank"' : '';
$services = get_theme_mod( 'front_services', $defaults->default_services() );

if( $title || $content || $services ){ ?>
    <div id="service_section" class="services" itemscope itemtype="http://schema.org/Service">
        <div class="container">
            <div class="holder">
                <?php 
                    if( $title || $content ){
                        echo '<section class="widget widget_text">';
                        if( $title ) echo '<h2 class="widget-title">' . esc_html( $title ) . '</h2>';
                        if( $content ) echo '<div class="textwidget">' . wpautop( wp_kses_post( $content ) ) . '</div><!-- .textwidget -->';
                        echo '</section><!-- .widget_text -->';
                    } 
                    
                    if( $services ){
                        foreach( $services as $service ){ 
                            if( ( isset( $service['title'] ) && $service['title'] ) || ( isset( $service['content'] ) && $service['content'] ) || ( isset( $service['image'] ) && $service['image'] ) || ( isset( $service['link'] ) && $service['link'] ) ){
                                echo '<section class="widget widget_rrtc_icon_text_widget"><div class="rtc-itw-holder"><div class="rtc-itw-inner-holder">';
                                if( ( isset( $service['title'] ) && $service['title'] ) || ( isset( $service['content'] ) && $service['content'] ) || ( isset( $service['link'] ) && $service['link'] ) ){
                                    echo '<div class="text-holder">';
                                    if( ( isset( $service['title'] ) && $service['title'] ) ) echo '<h2 class="widget-title" itemprop="name">' . esc_html( $service['title'] ) . '</h2>';
                                    if( ( isset( $service['content'] ) && $service['content'] ) ) echo '<div class="content">' . wpautop( wp_kses_post( $service['content'] ) ) . '</div><!-- .content -->';
                                    if( ( isset( $service['link'] ) && $service['link'] ) && $label ) echo '<a class="btn-readmore" href="' . esc_url( $service['link'] ) . '"' . $target . '><span class="readmore">' . esc_html( $label ) . '</span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 8"><path id="Path_195" data-name="Path 195" class="cls-1" d="M16.01,11H8v2h8.01v3L22,12,16.01,8Z" transform="translate(-8 -8)"/></svg></a>';
                                    echo '</div><!-- .text-holder -->';
                                }
                                
                                if( isset( $service['image'] ) && $service['image'] ){
                                    echo '<div class="icon-holder">';
                                    if( is_numeric( $service['image'] ) ){
                                        echo wp_get_attachment_image( $service['image'], 'ridhi-blog', false, array( 'itemprop' => 'image' ) ); 
                                    }else{
                                        echo '<img src="' . esc_url( $service['image'] ) . '" alt="' . esc_attr( $service['title']) . '">';
                                    }                                    
                                    echo '</div><!-- .icon-holder -->';
                                }
                                echo '</div><!-- .rtc-itw-inner-holder --></div><!-- .rtc-itw-holder --></section><!-- .widget_rrtc_icon_text_widget -->'; 
                            }
                        }
                    }
                ?>
            </div><!-- .holder -->
        </div><!-- .container -->
    </div><!-- .services -->
    <?php
}