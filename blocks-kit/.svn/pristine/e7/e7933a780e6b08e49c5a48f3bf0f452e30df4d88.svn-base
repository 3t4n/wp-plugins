<?php

/**
 * Plugin review class.
 * Prompts users to give a review of the plugin on WordPress.org after a period of usage.
 * Heavily based on code by Rhys Wynne
 *
 * @version   1.0
 * @copyright Copyright (c), Ryan Hellyer
 * @author Ryan Hellyer <ryanhellyer@gmail.com>
 */
if ( ! class_exists( 'Blockskit_Plugin_Review' ) ) :
class Blockskit_Plugin_Review {

/**
 * Private variables.
 *
 * These should be customized for each project.
*/
private $slug;        // The plugin slug
private $name;        // The plugin name
private $time_limit;  // The time limit at which notice is shown

/**
 * Variables.
 */
public $nobug_option;

/**
 * Fire the constructor up :)
 */
public function __construct( $args ) {

$this->slug        = $args['slug'];
$this->name        = $args['name'];
if ( isset( $args['time_limit'] ) ) {
        $this->time_limit  = $args['time_limit'];
} else {
        $this->time_limit = WEEK_IN_SECONDS;
}

$this->nobug_option = $this->slug . '-no-bug';

// Loading main functionality
add_action( 'admin_init', array( $this, 'check_installation_date' ) );
add_action( 'admin_init', array( $this, 'set_no_bug' ), 5 );
}

/**
 * Seconds to words.
 */
public function seconds_to_words( $seconds ) {

        // Get the years
        $years = floor( ( time() - get_site_option( $this->slug . '-activation-date' ) ) / YEAR_IN_SECONDS ) % 100;
        if ( $years > 1 ) {
                // translators: %s: Number of years. 
                return sprintf( __( '%s years', 'blocks-kit' ), $years );
        } elseif ( $years > 0) {
                return __( 'a year', 'blocks-kit' );
        }

        // Get the weeks
        $weeks = floor( ( time() - get_site_option( $this->slug . '-activation-date' ) ) / WEEK_IN_SECONDS ) % 52;
        if ( $weeks > 1 ) {
                // translators: %s: Number of weeks.
                return sprintf( __( '%s weeks', 'blocks-kit' ), $weeks );
        } elseif ( $weeks > 0) {
                return __( 'a week', 'blocks-kit' );
        }

        // Get the days
        $days = ( intval( $seconds ) / DAY_IN_SECONDS ) % 7;
        if ( $days > 1 ) {
                // translators: %s: Number of days.
                return sprintf( __( '%s days', 'blocks-kit' ), $days );
        } elseif ( $days > 0) {
                return __( 'a day', 'blocks-kit' );
        }

        // Get the hours
        $hours = ( intval( $seconds ) / HOUR_IN_SECONDS ) % 24;
        if ( $hours > 1 ) {
                // translators: %s: Number of hours.
                return sprintf( __( '%s hours', 'blocks-kit' ), $hours );
        } elseif ( $hours > 0) {
                return __( 'an hour', 'blocks-kit' );
        }

        // Get the minutes
        $minutes = ( intval( $seconds ) / MINUTE_IN_SECONDS ) % 60;
        if ( $minutes > 1 ) {
                // translators: %s: Number of minute.
                return sprintf( __( '%s minutes', 'blocks-kit' ), $minutes );
        } elseif ( $minutes > 0) {
                return __( 'a minute', 'blocks-kit' );
        }

        // Get the seconds
        $seconds = intval( $seconds ) % 60;
        if ( $seconds > 1 ) {
                // translators: %s: Number of seconds.
                return sprintf( __( '%s seconds', 'blocks-kit' ), $seconds );
        } elseif ( $seconds > 0) {
                return __( 'a second', 'blocks-kit' );
        }

        return;
}

/**
 * Check date on admin initiation and add to admin notice if it was more than the time limit.
 */
public function check_installation_date() {

if ( true != get_site_option( $this->nobug_option ) ) {

        // If not installation date set, then add it
        $install_date = get_site_option( $this->slug . '-activation-date' );
        if ( '' == $install_date ) {
                add_site_option( $this->slug . '-activation-date', time() );
        }

        // If difference between install date and now is greater than time limit, then display notice
        if ( ( time() - $install_date ) >  $this->time_limit  ) {
                add_action( 'admin_notices', array( $this, 'display_admin_notice' ) );
        }
}
}

/**
* Display Admin Notice, asking for a review.
*/
public function display_admin_notice() {

        $screen = get_current_screen(); 
        if ( isset( $screen->base ) && 'plugins' == $screen->base ) {

                $no_bug_url = wp_nonce_url( admin_url( '?' . $this->nobug_option . '=true' ), 'review-nonce' );
                $time = $this->seconds_to_words( time() - get_site_option( $this->slug . '-activation-date' ) );

                echo '
                <div class="updated">
                <p>' . 
                /*
                * translators: 1: Plugin name, 2: Duration of usage
                */
                sprintf( esc_html( 'You have been using the %1$s plugin for %2$s now, do you like it? If so, please leave us a review with your feedback!', 'blocks-kit' ),   esc_html($this->name), esc_html($time)) . '</p>
                </div>';
        }
}

/**
* Set the plugin to no longer bug users if user asks not to be.
*/
public function set_no_bug() {

        // Bail out if not on correct page
        if (
                ! isset( $_GET['_wpnonce'] )
                ||
                (
                        ! wp_verify_nonce( $_GET['_wpnonce'], 'review-nonce' )
                        ||
                        ! is_admin()
                        ||
                        ! isset( $_GET[$this->nobug_option] )
                        ||
                        ! current_user_can( 'manage_options' )
                )
        ) {
                return;
        }
        add_site_option( $this->nobug_option, true );
}

}
endif;

new Blockskit_Plugin_Review( array(
    'slug'        => 'blocks-kit',  // The plugin slug
    'name'        => 'Blocks Kit', // The plugin name
    'time_limit'  => DAY_IN_SECONDS,     // The time limit at which notice is shown
) );
