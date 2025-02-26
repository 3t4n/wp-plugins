<?php

if ( ! class_exists( 'About_Author_Box_Display' ) ) {

    /**
     * Display functions
     *
     * @since 1.0.0
     */
    class About_Author_Box_Display {

        /**
         * Constructor
         *
         * @since 1.0.0
         */
        function __construct() {

            add_shortcode( 'about_author_box', array( $this, 'display_shortcode' ) );

            add_filter( 'the_content', array( $this, 'display_after_content' ) );
            add_filter( 'the_content', array( $this, 'display_before_content' ) );

        }

        /**
         * Display the author box
         *
         * @since 1.0.0
         */
        function display_about_author_box( $settings = false ) {

            // if no atts supplied make it an empty array
            if ( ! $settings ) $settings = array();

            // get author ID
            if ( get_the_author_meta( 'ID' ) )
                $author_id = get_the_author_meta( 'ID' );
            else
                $author_id = 1;

            ?>
            <div class="about-author-box about-author-box-border-<?php echo esc_attr( $settings['style_border'] ); ?>">

                <?php if ( $settings['avatar'] == '1' ) : ?>

                    <div class="about-author-box-sidebar about-author-box-sidebar-position-<?php echo esc_attr( $settings['avatar_position'] ); ?>">

                        <div class="about-author-box-avatar about-author-box-avatar-style-<?php echo esc_attr( $settings['avatar_style'] ); ?>">
                            <?php echo get_avatar( $author_id , $settings['avatar_size'] ); ?>
                        </div><!-- .about-author-box-avatar -->

                    </div><!-- .about-author-box-sidebar -->

                <?php endif; ?>

                <div class="about-author-box-main">

                    <?php if ( $settings['name'] == '1' || $settings['date'] == '1' ) : ?>
                        <div class="about-author-box-info">
                            <?php if ( $settings['name'] == '1' ) : ?>
                                <span class="about-author-box-name"><?php esc_html_e( 'by', 'about-author-box' ); ?> <?php the_author_posts_link(); ?></span>
                            <?php endif; ?>
                            <?php if ( $settings['date'] == '1' ) : ?>
                                <span class="about-author-box-date"><?php esc_html_e( 'on', 'about-author-box' ); ?> <?php the_time( get_option( 'date_format' ) ); ?></span>
                            <?php endif; ?>
                        </div><!-- .about-author-box-info -->
                    <?php endif; ?>

                    <?php if ( $settings['bio'] == '1' ) : ?>
                        <div class="about-author-box-bio">
                            <?php echo get_the_author_meta( 'description', $author_id ); ?>
                        </div><!-- .about-author-box-bio -->
                    <?php endif; ?>

                    <?php if ( $settings['social'] == '1' ) : ?>
                        <div class="about-author-box-social">
                            <?php if ( get_the_author_meta( 'about_author_box_twitter', $author_id ) ) : ?>
                                <a class="about-author-box-social-link-twitter" href="<?php echo esc_url( get_the_author_meta( 'about_author_box_twitter' ) ); ?>" target="_blank"><span class="fa fa-twitter"></span></a>
                            <?php endif; ?>
                            <?php if ( get_the_author_meta( 'about_author_box_facebook', $author_id ) ) : ?>
                                <a class="about-author-box-social-link-facebook" href="<?php echo esc_url( get_the_author_meta( 'about_author_box_facebook' ) ); ?>" target="_blank"><span class="fa fa-facebook"></span></a>
                            <?php endif; ?>
                            <?php if ( get_the_author_meta( 'about_author_box_instagram', $author_id ) ) : ?>
                                <a class="about-author-box-social-link-instagram" href="<?php echo esc_url( get_the_author_meta( 'about_author_box_instagram' ) ); ?>" target="_blank"><span class="fa fa-instagram"></span></a>
                            <?php endif; ?>
                            <?php if ( get_the_author_meta( 'about_author_box_behance', $author_id ) ) : ?>
                                <a class="about-author-box-social-link-behance" href="<?php echo esc_url( get_the_author_meta( 'about_author_box_behance' ) ); ?>" target="_blank"><span class="fa fa-behance"></span></a>
                            <?php endif; ?>
                            <?php if ( get_the_author_meta( 'about_author_box_dribbble', $author_id ) ) : ?>
                                <a class="about-author-box-social-link-dribbble" href="<?php echo esc_url( get_the_author_meta( 'about_author_box_dribbble' ) ); ?>" target="_blank"><span class="fa fa-dribbble"></span></a>
                            <?php endif; ?>
                            <?php if ( get_the_author_meta( 'about_author_box_vine', $author_id ) ) : ?>
                                <a class="about-author-box-social-link-vine" href="<?php echo esc_url( get_the_author_meta( 'about_author_box_dribbble' ) ); ?>" target="_blank"><span class="fa fa-vine"></span></a>
                            <?php endif; ?>
                            <?php if ( get_the_author_meta( 'about_author_box_linkedin', $author_id ) ) : ?>
                                <a class="about-author-box-social-link-linkedin" href="<?php echo esc_url( get_the_author_meta( 'about_author_box_linkedin' ) ); ?>" target="_blank"><span class="fa fa-linkedin"></span></a>
                            <?php endif; ?>
                            <?php if ( get_the_author_meta( 'about_author_box_pinterest', $author_id ) ) : ?>
                                <a class="about-author-box-social-link-pinterest" href="<?php echo esc_url( get_the_author_meta( 'about_author_box_pinterest' ) ); ?>" target="_blank"><span class="fa fa-pinterest"></span></a>
                            <?php endif; ?>
                            <?php if ( get_the_author_meta( 'user_url', $author_id ) ) : ?>
                                <a class="about-author-box-social-link-website" href="<?php echo esc_url( get_the_author_meta( 'user_url' ) ); ?>" target="_blank"><span class="fa fa-link"></span></a>
                            <?php endif; ?>
                        </div><!-- .about-author-box-social -->
                    <?php endif; ?>

                </div><!-- .about-author-box-main -->

            </div><!-- about-author-box -->
            <?php

        }

        /**
         * Shortcode
         *
         * @since 1.0.0
         */
        function display_shortcode( $atts = false, $content = false ) {

            // if no atts supplied make it an empty array
            if ( ! $atts ) $atts = array();

            $defaults = about_author_box_get_option( 'about_author_box_shortcode_settings' );

            // merge settings
            $settings = array_merge( $defaults, $atts );

            // return if disabled
            if ( $settings['enabled'] == '0' ) {
                return;
            }

            // start output buffer
            ob_start();

            $this->display_about_author_box( $settings );

            $output = ob_get_contents();
            ob_end_clean();

            return $output;

        }

        /**
         * Show author box after content
         *
         * @since 1.0.0
         */
        function display_after_content( $content ) {

            if ( ! is_single() ) {
                return $content;
            }

            $settings = about_author_box_get_option( 'about_author_box_after_content_settings' );

            // return if disabled
            if ( $settings['enabled'] == '0' ) {
                return $content;
            }

            // default
            $about_author_box_content = '';

            // start output buffer
            ob_start();

                $this->display_about_author_box( $settings );

            // end output buffer
            $about_author_box_content .= ob_get_contents();
            ob_end_clean();

            // pass it back
            return $content . $about_author_box_content;

        }

        /**
         * Show author box before content
         *
         * @since 1.0.0
         */
        function display_before_content( $content ) {

            if ( ! is_single() ) {
                return $content;
            }

            $settings = about_author_box_get_option( 'about_author_box_before_content_settings' );

            // return if disabled
            if ( $settings['enabled'] == '0' ) {
                return $content;
            }

            // default
            $about_author_box_content = '';

            // start output buffer
            ob_start();

                $this->display_about_author_box( $settings );

            // end output buffer
            $about_author_box_content .= ob_get_contents();
            ob_end_clean();

            // pass it back
            return $about_author_box_content . $content;

        }

    }

}

new About_Author_Box_Display();
