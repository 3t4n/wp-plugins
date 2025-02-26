<?php
/**
 * Contact Section
 * 
 * @package Ridhi_Companion
 */

$title         = get_theme_mod( 'contact_title', __( 'Let\'s Talk', 'ridhi-companion' ) );
$content       = get_theme_mod( 'contact_content', __( 'Tell me your story or just say Hello!', 'ridhi-companion' ) );
$bg_image      = get_theme_mod( 'contact_bg', RIDHI_COMPANION_URL . 'images/contact-bg.jpg' );
$form          = get_theme_mod( 'contact_form' );
$phone_label   = get_theme_mod( 'phone_label', __( 'Call Me', 'ridhi-companion' ) );
$phone         = get_theme_mod( 'phone', __( '(222) 400-630', 'ridhi-companion' ) );
$email_label   = get_theme_mod( 'email_label', __( 'Email Me', 'ridhi-companion' ) );
$email         = get_theme_mod( 'email', __( 'info@domail.com', 'ridhi-companion' ) );
$address_label = get_theme_mod( 'address_label', __( 'Visit Me', 'ridhi-companion' ) );
$address       = get_theme_mod( 'address', __( 'Street Name, np. 14, 
London, U.K, E14 2RF', 'ridhi-companion' ) );

if( $bg_image ){
    $style = ' style="background: url(' . esc_url( $bg_image ) .  ') no-repeat; background-size: cover;"';
}else{
    $style = '';
}

if( $title || $content || $form || ( $phone_label && $phone ) || ( $email_label && $email ) || ( $address && $address_label ) ){ ?>
    <div id="contact_section" class="contact-section bg-fullwidth"<?php echo $style; ?>>
        <div class="container">
            <?php
                if( $title || $content ){
                    echo '<section class="widget widget_text">';
                    if( $title ) echo '<h2 class="widget-title">' . esc_html( $title ) . '</h2>';
                    if( $content ) echo '<div class="textwidget">' . wpautop( wp_kses_post( $content ) ) . '</div><!-- .textwidget -->';
                    echo '</section><!-- .widget_text -->';
                }

                if( $form ){
                    echo '<div class="contact-form-holder">' . do_shortcode( $form ) . '</div><!-- .contact-form-holder -->';
                }

                if( ( $phone_label && $phone ) || ( $email_label && $email ) || ( $address && $address_label ) ){
                    echo '<div class="contact-info">';
                    
                    if( $phone_label && $phone ){
                        echo '<div class="phone">';
                        echo '<div class="icon-holder"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36"><g id="Group_19" data-name="Group 19" transform="translate(0 0)"><path id="Path_182" data-name="Path 182" class="cls-1" d="M22.79,17.92a28.576,28.576,0,0,1-5.2-.9L15.21,19.4a28.951,28.951,0,0,0,7.6,1.5V17.92Z" transform="translate(9.21 11.02)" /><path id="Path_183" data-name="Path 183" class="cls-1" d="M8.04,5h-3a30.853,30.853,0,0,0,1.5,7.6l2.4-2.4A25.039,25.039,0,0,1,8.04,5Z" transform="translate(-0.96 -1)" /><path id="Path_184" data-name="Path 184" class="cls-2" d="M37,39a2.006,2.006,0,0,0,2-2V30.02a2.006,2.006,0,0,0-2-2,22.814,22.814,0,0,1-7.14-1.14,1.679,1.679,0,0,0-.62-.1,2.049,2.049,0,0,0-1.42.58l-4.4,4.4A30.3,30.3,0,0,1,10.24,18.58l4.4-4.4a2.007,2.007,0,0,0,.5-2.04A22.721,22.721,0,0,1,14,5a2.006,2.006,0,0,0-2-2H5A2.006,2.006,0,0,0,3,5,34,34,0,0,0,37,39Zm-7.2-7.96a25.505,25.505,0,0,0,5.2.9v2.98a30.852,30.852,0,0,1-7.6-1.5ZM7.06,7h3a26,26,0,0,0,.92,5.18l-2.4,2.4A29.651,29.651,0,0,1,7.06,7Z" transform="translate(-3 -3)" /></g></svg></div><!-- .icon-holder -->';
                        echo '<div class="text-holder">';
                        echo '<strong>' . esc_html( $phone_label ) . '</strong>';
                        echo '<a href="' . esc_url( 'tel:' . preg_replace( '/[^\d+]/', '', $phone ) ) . '">' . esc_html( $phone ) . '</a>';
                        echo '</div><!-- .text-holder -->';
                        echo '</div><!-- .phone -->';
                    }

                    if( $email_label && $email ){
                        echo '<div class="email">';
                        echo '<div class="icon-holder"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 32"><g id="Group_20" data-name="Group 20" transform="translate(0 0)"><path id="Path_186" data-name="Path 186" class="cls-1" d="M36,8,20,18,4,8V28H36Z" transform="translate(0 0)" /><path id="Path_187" data-name="Path 187" class="cls-1" d="M36,6H4l16,9.98Z" transform="translate(0 -2)" /><path id="Path_188" data-name="Path 188" class="cls-2" d="M6,36H38a4.012,4.012,0,0,0,4-4V8a4.012,4.012,0,0,0-4-4H6A4.012,4.012,0,0,0,2,8V32A4.012,4.012,0,0,0,6,36ZM38,8,22,17.98,6,8ZM6,12,22,22,38,12V32H6Z" transform="translate(-2 -4)" /></g></svg></div><!-- .icon-holder -->';
                        echo '<div class="text-holder">';
                        echo '<strong>' . esc_html( $email_label ) . '</strong>';
                        echo '<a href="' . esc_url( 'mailto:' . $email ) . '">' . esc_html( $email ) . '</a>';
                        echo '</div><!-- .text-holder -->';
                        echo '</div><!-- .email -->';
                    }

                    if( $address && $address_label ){
                        echo '<div class="address">';
                        echo '<div class="icon-holder"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 40"><g id="Group_21" data-name="Group 21" transform="translate(0 0)"><path id="Path_190" data-name="Path 190" class="cls-1" d="M27,14A10,10,0,1,0,7,14c0,5.7,5.84,14.42,10,19.76C21.24,28.38,27,19.76,27,14ZM12,14a5,5,0,1,1,5,5A5,5,0,0,1,12,14Z" transform="translate(-3 0)" /><path id="Path_191" data-name="Path 191" class="cls-2" d="M33,16A14,14,0,1,0,5,16C5,26.5,19,42,19,42S33,26.5,33,16ZM19,6A10,10,0,0,1,29,16c0,5.76-5.76,14.38-10,19.76C14.84,30.42,9,21.7,9,16A10,10,0,0,1,19,6Z" transform="translate(-5 -2)" /><circle id="Ellipse_1" data-name="Ellipse 1" class="cls-2" cx="5" cy="5" r="5" transform="translate(9 9)" /></g></svg></div><!-- .icon-holder -->';
                        echo '<div class="text-holder">';
                        echo '<strong>' . esc_html( $address_label ) . '</strong>';
                        echo '<address>' . wpautop( wp_kses_post( $address ) ) . '</address>';
                        echo '</div><!-- .text-holder -->';
                        echo '</div><!-- .address -->';
                    }

                    echo '</div><!-- .contact-info -->';
                }
            ?>
        </div><!-- .container -->
    </div><!-- .contact-section -->
    <?php
}