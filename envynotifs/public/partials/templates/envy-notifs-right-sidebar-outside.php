<?php

// Output for outside right sidebar
function notifs_show_outside_right() {
    $outside_right_notice_show = new WP_Query( array(
        'post_type' => 'envynotifs',
        'posts_per_page' => 1,
    ));     
    while( $outside_right_notice_show->have_posts() ) : $outside_right_notice_show->the_post() ?>
        <?php
        global $post; 
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
        <div class="envynotifs-right-sidebar-two notifino-outside-right-panel" style="background-image: url('<?php echo $image[0]; ?>'); background-repeat: no-repeat; background-size: cover;">
            <div class="envynotifs-right-sidebar-two-container">
                <ul class="envynotifs-right-sidebar-two-wrap">
                    <li class="envynotifs-right-sidebar-two-single">
                        <div class="envynotifs-right-sidebar-two-title">
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
                        <li class="envynotifs-right-sidebar-two-single">
                            <div class="envynotifs-right-sidebar-two-social-icon">
                                <ul class="envynotifs-right-sidebar-two-social-icon-list">
                                    <?php if( ! $notifs_bar_social_title_new == '' ) : ?>
                                    <li>
                                        <span class="envynotifs-right-sidebar-two-social">
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
                        <li class="envynotifs-right-sidebar-two-single envynotifs-read-more">
                            <div class="envynotifs-right-sidebar-two-btn">
                                <a href="<?php echo get_post_meta( get_the_ID(), 'custom_element_grid_class_meta_box', true ); ?>" class="envynotifs-right-sidebar-two-button">
                                    <?php 
                                        echo esc_html__($notifs_bar_btn_text['notifs-bar-btn-text']);
                                    ?>
                                </a>
                            </div>
                        </li>
                        <?php endif;
                    endif; ?>
                </ul>
            </div>
            
            <?php $notifs_bar_icon_class  = (array)get_option('new_settings');
            if( $notifs_bar_icon_class['notifs-bar-icon-class'] ) : ?>
            <button id="envynotifs-close-btn7" class="envynotifs-right-sidebar-two-close-button">
                <i class="<?php echo esc_attr( $notifs_bar_icon_class["notifs-bar-icon-class"] ); ?>">
                </i>
            </button>
            <?php endif; ?>

        </div>
    <?php endwhile; ?>

<a id="notifino-open-close7">
    <i class="fa fa-angle-double-left"></i>
</a>

<?php $notifs_bar_mobile_hide  = (array)get_option('new_settings');
if( isset( $notifs_bar_mobile_hide['notifs-mobile-hide'] ) ) :
    $notifs_bar_mobile_hide_new  = $notifs_bar_mobile_hide['notifs-mobile-hide'];
else:
    $notifs_bar_mobile_hide_new = '';
endif;

if( $notifs_bar_mobile_hide_new && wp_is_mobile() ) : ?>
    <script>
        jQuery(document).ready(function(){
            jQuery('body').css('margin', '0');
            jQuery('#notifino-open-close7').css('display', 'none');
            jQuery('.notifino-outside-right-panel').css('display', 'none');            
        });
    </script> 
<?php endif; ?>

<style type="text/css">
    body {
        margin-right: 72px;
    }
</style>

<?php if( is_user_logged_in() ) : ?>
    <script>
        jQuery(document).ready(function(){
            jQuery(".envynotifs-right-sidebar-two").css('top', '32px');
            jQuery("#notifino-open-close7").css('top', '32px');
        });
    </script>
<?php endif;

}

add_action( 'wp_footer', 'notifs_show_outside_right' );
