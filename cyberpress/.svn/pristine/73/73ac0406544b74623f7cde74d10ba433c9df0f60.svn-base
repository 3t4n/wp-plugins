<?php
/**
 * Class api for working with fields of custom player posts.
 *
 * @package cyberpress
 */

/**
 * Class CyberPress_Player_API
 */
class CyberPress_Player_API extends CyberPress_Custom_Post_API {

    /**
     * CyberPress_Player_API constructor.
     *
     * @param null   $id - post id. If null or not exist - we use global $post->ID.
     * @param string $post_type - post type.
     */
    public function __construct( $id = null, $post_type = 'player' ) {
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
    public function player_classes( $class = '', $post_id = null ) {
        post_class( $class, $post_id );
    }

    /**
     * Get full player Full Name.
     *
     * @return mixed
     */
    public function get_full_name() {
        return apply_filters( 'cyberpress_player_get_full_name', carbon_get_post_meta( $this->get_id(), $this->get_global_prefix() . '_player_full_name' ) );
    }

    /**
     * Get player Gender.
     *
     * @return mixed
     */
    public function get_gender() {
        $gender = carbon_get_post_meta( $this->get_id(), $this->get_global_prefix() . '_player_gender' );

        if ( 'male' === $gender ) {
            $gender = esc_html__( 'Male', 'cyberpress' );
        } elseif ( 'female' === $gender ) {
            $gender = esc_html__( 'Female', 'cyberpress' );
        } else {
            $gender = false;
        }

        return apply_filters( 'cyberpress_player_get_gender', $gender );
    }

    /**
     * Get player Date of Birth.
     *
     * @return mixed
     */
    public function get_date_of_birth() {
        return apply_filters( 'cyberpress_player_get_date_of_birth', carbon_get_post_meta( $this->get_id(), $this->get_global_prefix() . '_player_date_birth' ) );
    }

    /**
     * Get player Date of Birth formatted.
     *
     * @return mixed
     */
    public function get_date_of_birth_formatted() {
        $date = $this->get_date_of_birth();

        if ( $date ) {
            return apply_filters( 'cyberpress_player_get_date_of_birth_formatted', date_i18n( get_option( 'date_format' ), strtotime( $date ) ) );
        }

        return false;
    }

    /**
     * Get player Age.
     *
     * @return mixed
     */
    public function get_age() {
        $date = $this->get_date_of_birth();

        if ( $date ) {
            $date = gmdate( 'Ymd', strtotime( $date ) );
            $diff = gmdate( 'Ymd' ) - $date;
            return apply_filters( 'cyberpress_player_get_age', substr( $diff, 0, -4 ) );
        }

        return false;
    }

    /**
     * Get player Country.
     *
     * @return array|bool
     */
    public function get_country() {
        $country_code = carbon_get_post_meta( $this->get_id(), $this->get_global_prefix() . '_player_country' );
        if ( isset( $country_code ) && ! empty( $country_code ) ) {
            $country = CyberPress_Country::country( $country_code );
            $flag    = CyberPress_Country::get_flag( $country_code );

            return apply_filters(
                'cyberpress_player_get_country',
                array(
                    'name'          => $country->getName(),
                    'official_name' => $country->getOfficialName(),
                    'flag'          => $flag,
                )
            );
        }
        return false;
    }

    /**
     * Get player Site Url.
     *
     * @return string
     */
    public function get_site_url() {
        return apply_filters( 'cyberpress_player_get_site_url', carbon_get_post_meta( $this->get_id(), $this->get_global_prefix() . '_player_site_url' ) );
    }

    /**
     * Get player Twitch Channel Url.
     *
     * @return mixed
     */
    public function get_twitch_channel_url() {
        $channel = carbon_get_post_meta( $this->get_id(), $this->get_global_prefix() . '_player_twitch' );
        return apply_filters( 'cyberpress_player_get_twitch_channel_url', $channel ? ( 'https://www.twitch.tv/' . esc_attr( $channel ) ) : false );
    }

    /**
     * Get player Twitch iframe oEmbed.
     *
     * @return string
     */
    public function get_twitch_player_oembed() {
        $channel = carbon_get_post_meta( $this->get_id(), $this->get_global_prefix() . '_player_twitch' );
        return apply_filters( 'cyberpress_player_get_twitch_player_oembed', CyberPress_Twitch::embed( $channel ) );
    }

    /**
     * Fallback for Twitch Chat.
     *
     * @return string
     */
    public function get_twitch_chat_oembed() {
        return '';
    }

    /**
     * Get player YouTube Channel Url.
     *
     * @return mixed
     */
    public function get_youtube_channel_url() {
        $channel = carbon_get_post_meta( $this->get_id(), $this->get_global_prefix() . '_player_youtube' );
        return apply_filters( 'cyberpress_player_get_youtube_channel_url', $channel ? ( 'https://www.youtube.com/user/' . esc_attr( $channel ) ) : false );
    }

    /**
     * Get player Social Links.
     *
     * @return mixed
     */
    public function get_social_links() {
        return apply_filters( 'cyberpress_player_get_social_links', carbon_get_post_meta( $this->get_id(), $this->get_global_prefix() . '_player_social_links' ) );
    }

    /**
     * Get player Games stats.
     *
     * @return mixed
     */
    public function get_games_stats() {
        $result = array();

        $games = carbon_get_post_meta( $this->get_id(), $this->get_global_prefix() . '_player_games' );

        if ( $games && ! empty( $games ) ) {
            foreach ( $games as $game ) {
                $game_obj = cyberpress()->get_the_game( $game['game'] );

                $result[] = array(
                    'game'     => $game_obj,
                    'nickname' => $game['nickname'],
                    'wins'     => (int) $game['wins'],
                    'draws'    => (int) $game['draws'],
                    'losses'   => (int) $game['losses'],
                );
            }
        }

        return apply_filters( 'cyberpress_player_get_games_stats', $result );
    }

    /**
     * Get player Teams.
     *
     * @return mixed
     */
    public function get_teams() {
        $result = array();

        $teams = carbon_get_post_meta( $this->get_id(), $this->get_global_prefix() . '_player_teams' );

        if ( $teams && ! empty( $teams ) ) {
            foreach ( $teams as $team ) {
                $team_obj = cyberpress()->get_the_team( $team['team'] );

                $start_date = $team['start_date'];
                $end_date   = $team['end_date'];

                $result[] = array(
                    'start_date'           => $start_date,
                    'start_date_formatted' => $start_date ? date_i18n( get_option( 'date_format' ), strtotime( $start_date ) ) : false,
                    'end_date'             => $end_date,
                    'end_date_formatted'   => $end_date ? date_i18n( get_option( 'date_format' ), strtotime( $end_date ) ) : esc_html__( 'To the present', 'cyberpress' ),
                    'data'                 => $team_obj,
                );
            }
        }

        return apply_filters( 'cyberpress_player_get_teams', $result );
    }
}
