<?php

/**
 * Class Appswiperslider_App_Swiper_Slider_Help_Upgrade
 */

if (!class_exists('Appswiperslider_App_Swiper_Slider_Help_Upgrade')):
    class Appswiperslider_App_Swiper_Slider_Help_Upgrade
    {

        /**
         * Helper method 
         */
        public function app_screen_slider_menu_helper_callback()
        { ?>
            <div class="wrap" style="background-color:#fff; padding:40px 30px;">


                <div class="app-swiper-slider-tutorial">

                    <!-- Video Tutorial Section -->
                    <h3>Feel free to contact me anytime</h3>
                    <p>
                        <a class="button button-primary" target="_blank" href="mailto:nababurdev@gmail.com">
                            <?php esc_html_e('Hire me', 'app-swiper-slider'); ?>
                        </a>
                        <a class="button button-primary" target="_blank" href="https://profiles.wordpress.org/nababurbd/">
                            <?php esc_html_e('Wordpress profile', 'app-swiper-slider'); ?>
                        </a>
                        <a class="button button-primary" target="_blank" href="https://www.linkedin.com/in/nababur/">
                            <?php esc_html_e('Linkedin', 'app-swiper-slider'); ?>
                        </a>
                        <a class="button button-secondary" target="_blank" href="https://api.whatsapp.com/send?phone=8801717090233">
                            <?php esc_html_e('DM Whatsapp', 'app-swiper-slider'); ?>
                        </a>
                    </p>
                    <!-- Free Version Information -->
                    <h3>Free Version</h3>
                    <p>Use the following shortcode to display mobile app screen, partner, or sponsor logos:</p>
                    <pre style="background: #f4f4f4; padding: 10px; border: 1px solid #ddd;">
    [appswiperslider] or [appswiperslider posts_num="5" order="ASC" orderby="title" screen_cat="brand"]   or echo do_shortcode("[appswiperslider posts_num="5" order="ASC" orderby="title" screen_cat="brand"]") 

</pre>
                    <!-- Video Tutorial Section -->
                    <h3>Video Tutorial for App Swiper Slider WordPress plugin</h3>
                    <div class="nab-tutorial-video" style="margin-bottom: 20px;">
                        <iframe width="660" height="415" src="https://www.youtube.com/embed/uAeoDyzhRiM?si=X006neZ2mPw9o5Kj"
                            frameborder="0" allowfullscreen>
                        </iframe>
                    </div>






                </div>





            </div> <!-- wrap end  -->

<?php }

        /**
         * Add admin menu page
         * 
         */
        function app_swiper_slider_admin_menu_callback_init()
        {
            add_submenu_page(
                'edit.php?post_type=appswiperslider',
                __('Help & Upgrade', 'app-swiper-slider'),
                __('Help & Upgrade', 'app-swiper-slider'),
                'manage_options',
                'swiper-slider-helper',
                [$this, 'app_screen_slider_menu_helper_callback']
            );
        }
    } //end class

endif;
