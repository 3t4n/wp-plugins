<?php

// Output for popup bar
function notifs_show_popup() {
    $popup_notice_show = new WP_Query( array(
        'post_type' => 'envynotifs',
        'posts_per_page' => 1,
    ));  
    while( $popup_notice_show->have_posts() ) : $popup_notice_show->the_post() ?>
        <?php
            global $post; 
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
        <div class="envynotifs-popup" style="background-image: url('<?php echo $image[0]; ?>'); background-repeat: no-repeat; background-size: cover;">
            <ul class="envynotifs-popup-wrap">
                <li class="envynotifs-popup-single">
                    <div class="envynotifs-popup-title">
                        <h2>
                            <?php $notifs_bar_scroll_show = (array)get_option('new_settings');
                            if( isset( $notifs_bar_scroll_show['notifs-scroll-show'] ) ) :
                                $notifs_bar_scroll_show_new = $notifs_bar_scroll_show['notifs-scroll-show'];
                            else:
                                $notifs_bar_scroll_show_new = '';
                            endif;
                            if( $notifs_bar_scroll_show_new ) : ?>
                                <marquee><?php the_title(); ?></marquee>
                            <?php else:
                                the_title();
                            endif; ?>
                        </h2>
                    </div>
                </li>

                 <?php 
                    $notifs_bar_end_date = (array)get_option('new_settings');
                    if( isset( $notifs_bar_end_date['select-end-date'] ) ) :
                        $notifs_bar_end_date_new = $notifs_bar_end_date['select-end-date'];
                    else:
                        $notifs_bar_end_date_new = '';  
                    endif;
                    $notifs_bar_end_time = (array)get_option('new_settings');
                    if( isset( $notifs_bar_end_time['select-end-time'] ) ) :
                        $notifs_bar_end_time_new = $notifs_bar_end_time['select-end-time'];
                    else:
                        $notifs_bar_end_time_new = '';
                    endif; 

                if( ! $notifs_bar_end_date_new == '' ) : ?>
                    <li class="envynotifs-popup-single">
                        <div class="envynotifs-popup-time">
                            <ul class="envynotifs-popup-time-list">
                                <li class="countdown show" data-Date='<?php echo wp_kses_post($notifs_bar_end_date_new); echo wp_kses_post(' '.$notifs_bar_end_time_new); ?>'>
                                    <div class="running"> 
                                        <div class="labels"><span><?php echo esc_html__('Days', 'envy-notifs'); ?></span><span><?php echo esc_html__('Hours', 'envy-notifs'); ?></span><span><?php echo esc_html__('Minutes', 'envy-notifs'); ?></span><span><?php echo esc_html__('Seconds', 'envy-notifs'); ?></span>
                                        </div>
                                        <div class="break"></div>
                                        <div class="labels">
                                        <timer>
                                            <span class="days"></span>:<span class="hours"></span>:<span class="minutes"></span>:<span class="seconds"></span>
                                        </timer>
                                    </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>

                <?php $notifs_bar_subscribe = (array)get_option('new_settings');
                if( isset( $notifs_bar_subscribe['notifs-bar-subscribe'] ) ) :
                    $notifs_bar_subscribe_new = $notifs_bar_subscribe['notifs-bar-subscribe'];
                else:
                    $notifs_bar_subscribe_new = '';
                endif;
                if( ! $notifs_bar_subscribe_new == '' ) : ?>
                    <li class="envynotifs-popup-single">
                        <div class="envynotifs-popup-sign-up">
                            <?php $notifs_bar_subscribe_title = (array)get_option('new_settings');
                            if( isset( $notifs_bar_subscribe_title['notifs-bar-subscribe-title'] ) ) :
                                $notifs_bar_subscribe_title_new = $notifs_bar_subscribe_title['notifs-bar-subscribe-title'];
                            else: $notifs_bar_subscribe_title_new = '';
                            endif; ?>
                            <span class="envynotifs-popup-subscribe-title"><?php echo esc_html__( $notifs_bar_subscribe_title_new ); ?></span>
                            <?php echo do_shortcode( $notifs_bar_subscribe_new ); ?> 
                        </div>
                    </li>
                <?php endif; ?>
                
                <?php $notifs_bar_social_title = (array)get_option('new_settings');
                if( isset( $notifs_bar_social_title['notifs-bar-social-title'] ) ) :
                    $notifs_bar_social_title_new = $notifs_bar_social_title['notifs-bar-social-title'];
                else: $notifs_bar_social_title_new;
                endif;

                $notifs_bar_social_facebook = (array)get_option('new_settings');
                if( isset( $notifs_bar_social_facebook['facebook-display'] ) ) :
                    $notifs_bar_social_facebook_new = $notifs_bar_social_facebook['facebook-display'];
                else: $notifs_bar_social_facebook_new = '';
                endif;
                $notifs_bar_social_twitter = (array)get_option('new_settings');
                if( isset( $notifs_bar_social_twitter['twitter-display'] ) ) :
                    $notifs_bar_social_twitter_new  = $notifs_bar_social_twitter['twitter-display'];
                else: $notifs_bar_social_twitter_new = '';
                endif;
                $notifs_bar_social_instagram = (array)get_option('new_settings');
                if( isset( $notifs_bar_social_instagram ['instagram-display'] ) ) :
                    $notifs_bar_social_instagram_new = $notifs_bar_social_instagram['instagram-display'];
                else: $notifs_bar_social_instagram_new = '';
                endif;
                $notifs_bar_social_linkedin = (array)get_option('new_settings');
                if( isset( $notifs_bar_social_linkedin['linkedin-display'] ) ) :
                    $notifs_bar_social_linkedin_new = $notifs_bar_social_linkedin['linkedin-display'];
                else: $notifs_bar_social_linkedin_new = '';
                endif;
                $notifs_bar_social_skype = (array)get_option('new_settings');
                if( isset( $notifs_bar_social_skype['skype-display'] )):
                    $notifs_bar_social_skype_new = $notifs_bar_social_skype['skype-display'];
                else: $notifs_bar_social_skype_new = '';
                endif;

                if( ! $notifs_bar_social_facebook_new == '' 
                    || ! $notifs_bar_social_twitter_new == ''
                    || ! $notifs_bar_social_instagram_new == ''
                    || ! $notifs_bar_social_linkedin_new == ''
                    || ! $notifs_bar_social_skype_new == '' ) : ?>
                    <li class="envynotifs-popup-single">
                        <div class="envynotifs-popup-social-icon">
                            <ul class="envynotifs-popup-social-icon-list">
                                <?php if( ! $notifs_bar_social_title_new == '' ) : ?>
                                <li>
                                    <span class="envynotifs-popup-social">
                                        <?php echo esc_html__( $notifs_bar_social_title_new ); ?>
                                    </span>
                                </li>
                                <?php endif; ?>
                                <?php if( ! $notifs_bar_social_facebook_new == '' ): ?>
                                <li>
                                    <a href="<?php echo esc_url($notifs_bar_social_facebook_new); ?>">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <?php endif;                                        
                                if( ! $notifs_bar_social_twitter_new == '' ): ?>
                                <li>
                                    <a href="<?php echo esc_url($notifs_bar_social_twitter_new); ?>">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <?php endif;                                       
                                if( ! $notifs_bar_social_instagram_new == '' ): ?>
                                <li>
                                    <a href="<?php echo esc_url($notifs_bar_social_instagram_new); ?>">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                                <?php endif;
                                if( ! $notifs_bar_social_linkedin_new == '' ): ?>
                                <li>
                                    <a href="<?php echo esc_url($notifs_bar_social_linkedin_new); ?>">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                                <?php endif;                                        
                                if( ! $notifs_bar_social_skype_new == '' ): ?>
                                <li>
                                    <a href="<?php echo esc_url($notifs_bar_social_skype_new); ?>">
                                        <i class="fa fa-skype"></i>
                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </li>
                <?php endif; 

                if( get_post_meta( get_the_ID(), 'custom_element_grid_class_meta_box', true ) ) :
                    $notifs_bar_btn_text  = (array)get_option('new_settings');
                    if( $notifs_bar_btn_text['notifs-bar-btn-text'] ) : ?>
                    <li class="envynotifs-popup-single envynotifs-read-more">
                        <div class="envynotifs-popup-btn">
                            <a href="<?php echo get_post_meta( get_the_ID(), 'custom_element_grid_class_meta_box', true ); ?>" class="envynotifs-popup-button">
                                <?php 
                                    echo esc_html__($notifs_bar_btn_text['notifs-bar-btn-text']);
                                ?>
                            </a>
                        </div>
                    </li>
                    <?php endif;
                endif; ?>
            </ul>

            <?php $notifs_bar_icon_class  = (array)get_option('new_settings');
            if( $notifs_bar_icon_class['notifs-bar-icon-class'] ) : ?>
            <button id="envynotifs-close-btn3" class="envynotifs-popup-close-button">
                <i class="<?php echo esc_attr( $notifs_bar_icon_class["notifs-bar-icon-class"] ); ?>">
                </i>
            </button>
            <?php endif; ?>

        </div>
    <?php endwhile;

    $notifs_bar_mobile_hide  = (array)get_option('new_settings');
    if( isset( $notifs_bar_mobile_hide['notifs-mobile-hide'] ) ) :
        $notifs_bar_mobile_hide_new  = $notifs_bar_mobile_hide['notifs-mobile-hide'];
    else:
        $notifs_bar_mobile_hide_new = '';
    endif;

    if( $notifs_bar_mobile_hide_new && wp_is_mobile() ) : ?>
        <script>
            jQuery(document).ready(function(){
                jQuery('.envynotifs-popup').css('display', 'none');           
            });
        </script>
    <?php endif;
    
    if( is_user_logged_in() ) : ?>
        <script>
            jQuery(document).ready(function(){
                jQuery(".envynotifs-popup").css('top', '55%');
            });
        </script>
    <?php endif; ?>

<?php }

add_action( 'wp_footer', 'notifs_show_popup' );
