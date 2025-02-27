<?php
/**
 * Class api for working with fields of custom tournament taxonomy.
 *
 * @package cyberpress
 */

/**
 * Class CyberPress_Tournament_API
 */
class CyberPress_Tournament_API extends CyberPress_Custom_Post_API {

    /**
     * CyberPress_Tournament_API constructor.
     *
     * @param null   $id - post id. If null or not exist - we use global $post->ID.
     * @param string $post_type - post type.
     */
    public function __construct( $id = null, $post_type = 'tournament' ) {
        global $post;
        if ( isset( $id ) && ! empty( $id ) ) {
            $this->set_id( $id );
        } else {
            $this->set_id( $post->ID );
        }
        $this->set_post_type( $post_type );
    }

    /**
     * Display the classes for the post div.
     *
     * @param string $class - One or more classes to add to the class list.
     * @param null   $post_id - Post ID or post object. Defaults to the global `$post`.
     */
    public function tournament_classes( $class = '', $post_id = null ) {
        post_class( $class, $post_id );
    }

    /**
     * Get tournament stages.
     *
     * @return mixed - list of tournament stages.
     */
    public function get_tournament_stages() {
        $tournament_stages = carbon_get_post_meta( $this->get_id(), $this->get_global_prefix() . '_tournament_stages' );
        $stages_array      = array();

        if ( isset( $tournament_stages ) && ! empty( $tournament_stages ) ) {
            foreach ( $tournament_stages as $stage ) {
                $stages_array[] = $stage['stage'];
            }
        }

        return apply_filters( 'cyberpress_tournament_get_stages', $stages_array );
    }

    /**
     * Tournament Game.
     *
     * @return mixed
     */
    public function get_game() {
        $game_id = carbon_get_post_meta( $this->get_id(), $this->get_global_prefix() . '_tournament_game' );

        // team game data.
        if ( $game_id ) {
            $game = cyberpress()->get_the_game( $game_id );

            if ( $game->get_url() ) {
                return apply_filters( 'cyberpress_tournament_get_game', $game );
            }
        }

        return false;
    }

    /**
     * Get Tournament Organizer.
     *
     * @return bool|mixed
     */
    public function get_organizer() {
        $organizer = carbon_get_post_meta( $this->get_id(), $this->get_global_prefix() . '_tournament_organizer' );

        if ( isset( $organizer ) && ! empty( $organizer ) ) {
            return apply_filters( 'cyberpress_tournament_get_organizer', $organizer );
        }

        return false;
    }

    /**
     * Get Tournament Type.
     *
     * @return bool|mixed
     */
    public function get_type() {
        $type = carbon_get_post_meta( $this->get_id(), $this->get_global_prefix() . '_tournament_type' );

        if ( isset( $type ) && ! empty( $type ) ) {
            return apply_filters( 'cyberpress_tournament_get_type', $type );
        }

        return false;
    }

    /**
     * Get Tournament Total Prize Pool.
     *
     * @return bool|mixed
     */
    public function get_total_prize_pool() {
        $total_prize_pool = carbon_get_post_meta( $this->get_id(), $this->get_global_prefix() . '_tournament_total_prize_pool' );

        if ( isset( $total_prize_pool ) && ! empty( $total_prize_pool ) ) {
            return apply_filters( 'cyberpress_tournament_get_total_prize_pool', $total_prize_pool );
        }

        return false;
    }

    /**
     * Get Tournament Screenshots.
     *
     * @return mixed
     */
    public function get_screenshots() {
        return apply_filters( 'cyberpress_tournament_get_screenshots', carbon_get_post_meta( $this->get_id(), $this->get_global_prefix() . '_tournament_screenshots' ) );
    }

    /**
     * Get Tournament Videos.
     *
     * @return mixed
     */
    public function get_videos() {
        $result = array();
        $videos = carbon_get_post_meta( $this->get_id(), $this->get_global_prefix() . '_tournament_videos' );

        foreach ( $videos as $video ) {
            $result[] .= $video['video'];
        }

        return apply_filters( 'cyberpress_tournament_get_videos', $result );
    }

    /**
     * Get Tournament Time Start.
     *
     * @return mixed
     */
    public function get_time_start() {
        return apply_filters( 'cyberpress_tournament_get_time_start', carbon_get_post_meta( $this->get_id(), $this->get_global_prefix() . '_tournament_start_date' ) );
    }

    /**
     * Get Tournament Time End.
     *
     * @return mixed
     */
    public function get_time_end() {
        return apply_filters( 'cyberpress_tournament_get_time_end', carbon_get_post_meta( $this->get_id(), $this->get_global_prefix() . '_tournament_end_date' ) );
    }

    /**
     * Get Tournament Time Start.
     *
     * @return mixed
     */
    public function get_time_start_formatted() {
        $time = $this->get_time_start();
        return apply_filters( 'cyberpress_tournament_get_time_start_formatted', date_i18n( get_option( 'date_format' ), strtotime( $time ) ) );
    }

    /**
     * Get Tournament Time End.
     *
     * @return mixed
     */
    public function get_time_end_formatted() {
        $time = $this->get_time_end();
        return apply_filters( 'cyberpress_tournament_get_time_end_formatted', date_i18n( get_option( 'date_format' ), strtotime( $time ) ) );
    }
}
