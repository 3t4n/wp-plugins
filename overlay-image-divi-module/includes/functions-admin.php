<?php

/**
 * Sets the activation time for the LWP Overlay Image plugin.
 *
 * This function is responsible for setting the activation time for the LWP Overlay Image plugin.
 * It retrieves the current timestamp and stores it as an option named 'lwp_overlay_image_activation_time'.
 *
 * @since 1.3
 *
 * @return void
 */
if ( ! function_exists( 'lwp_overlay_image_activation_time' ) ):
    function lwp_overlay_image_activation_time(){

        $get_activation_time = strtotime( "now" );
        add_option( 'lwp_overlay_image_activation_time', $get_activation_time );

    }
    register_activation_hook( __FILE__, 'lwp_overlay_image_activation_time' );
endif;

//========================================================================//

/**
 * Checks the installation time for the LWP Overlay Image plugin.
 * If it has been more than 7 days and spare me is false then shows admin notice.
 *
 * @since 1.3
 *
 * @return void
 */
if ( ! function_exists( 'lwp_overlay_image_check_installation_time' ) ):

    function lwp_overlay_image_check_installation_time() {

        $install_date = get_option( 'lwp_overlay_image_activation_time' );
        $spare_me     = get_option( 'lwp_overlay_image_spare_me' );
        $past_date    = strtotime( '-7 days' );

        if ( $past_date >= $install_date && $spare_me == false ) {
            add_action( 'admin_notices', 'lwp_overlay_image_rating_admin_notice' );
        }

    }
    add_action( 'admin_init', 'lwp_overlay_image_check_installation_time' );

endif;

//========================================================================//

/**
 * Displays an admin notice asking for a review of the plugin.
 *
 * @since 1.3
 *
 * @return void
 */

if ( ! function_exists( 'lwp_overlay_image_rating_admin_notice' ) ):

    function lwp_overlay_image_rating_admin_notice() {

        $nonce        = wp_create_nonce( 'overlay_image_nonce' );
        $dont_disturb = esc_url( get_admin_url() . '?lwp_overlay_image_spare_me=1' .'&overlay_image_nonce='. $nonce );
        $dont_show    = esc_url( get_admin_url() . '?lwp_overlay_image_spare_me=1' .'&overlay_image_nonce='. $nonce );
        $plugin_info  = 'Divi Overlay Image';
        $reviewurl    = esc_url( 'https://wordpress.org/support/plugin/overlay-image-divi-module/reviews/?filter=5' );

        // phpcs:disable
        //All variables in the printf are escaped in the start of the function.
        printf(__('<div class="wrap notice notice-info">
                        <div style="margin:10px 0px;">
                            Hello! Seems like you are using <strong> %s </strong> plugin to build your Divi website - Thanks a lot! Could you please do us a BIG favor and give it a 5-star rating on WordPress? This would boost our motivation and help other users make a comfortable decision while choosing the plugin.
                        </div>
                        <div class="button-group" style="margin:10px 0px;">
                            <a href="%s" class="button button-primary" target="_blank" style="margin-right:10px;">Ok,you deserve it</a>
                            <span class="dashicons dashicons-smiley"></span><a href="%s" class="button button-link" style="margin-right:10px; margin-left:3px;">I already did</a>
                            <a href="%s" class="button button-link"> Don\'t show this again.</a>
                        </div>
                    </div>', 'lwp-overlay-images'), $plugin_info, $reviewurl, $dont_disturb,$dont_show );
        // phpcs:enable
    }

endif;

//========================================================================//

/**
 * Handles the submission of admin notice.
 *
 * If spare me is set to 1 then the option is updated in the
 * database and the notice will not appear again.
 *
 * @since 1.3
 *
 * @return void
 */

if ( ! function_exists( 'lwp_overlay_image_spare_me' ) ):

    function lwp_overlay_image_spare_me() {
        if( isset( $_GET['overlay_image_nonce'] )  && wp_verify_nonce( sanitize_text_field( $_GET['overlay_image_nonce'] ), 'overlay_image_nonce' ) ) {

            if( isset( $_GET['lwp_overlay_image_spare_me'] ) && ! empty( $_GET['lwp_overlay_image_spare_me'] ) ) {

                $lwp_overlay_image_spare_me = absint( $_GET['lwp_overlay_image_spare_me'] );

                if( $lwp_overlay_image_spare_me == 1 ) {
                    add_option( 'lwp_overlay_image_spare_me' , TRUE );
                }

            }

        }
    }
    add_action( 'admin_init', 'lwp_overlay_image_spare_me', 5 );

endif;