<?php
/**
 * Matches block.
 *
 * @package cyberpress
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Class CyberPress_Matches_List_Block
 */
class CyberPress_Matches_List_Block {

    /**
     * List of attributes supported by the block.
     *
     * @var array
     */
    private $attributes = array(
        'count' => array(
            'type'    => 'number',
            'default' => 6,
        ),
        'columns' => array(
            'type'    => 'number',
            'default' => 1,
        ),
        'displayPagination' => array(
            'type'    => 'boolean',
            'default' => false,
        ),
        'order' => array(
            'type'    => 'string',
            'default' => 'desc',
        ),
        'orderBy' => array(
            'type'    => 'string',
            'default' => 'date',
        ),
        'filterByMatches' => array(
            'type'    => 'string',
            'default' => '',
        ),
        'filterByPlayers' => array(
            'type'    => 'string',
            'default' => '',
        ),
        'filterByGames' => array(
            'type'    => 'string',
            'default' => '',
        ),
        'filterByTournaments' => array(
            'type'    => 'string',
            'default' => '',
        ),
        'filterByTournamentStage' => array(
            'type'    => 'string',
            'default' => '',
        ),
        'filterByPlayingStatus' => array(
            'type'    => 'string',
            'default' => '',
        ),
        'filterByTeams' => array(
            'type'    => 'string',
            'default' => '',
        ),
        'displayMetaGame' => array(
            'type'    => 'boolean',
            'default' => true,
        ),
        'displayMetaTournament' => array(
            'type'    => 'boolean',
            'default' => true,
        ),
        'displayMetaTournamentStage' => array(
            'type'    => 'boolean',
            'default' => true,
        ),
        'displayMetaMatchStartDate' => array(
            'type'    => 'boolean',
            'default' => false,
        ),
        'displayMetaMatchEndDate' => array(
            'type'    => 'boolean',
            'default' => false,
        ),
        'displayMetaReadMoreButton' => array(
            'type'    => 'boolean',
            'default' => false,
        ),
        'displayMatchTitle' => array(
            'type'    => 'boolean',
            'default' => false,
        ),
        'displayMatchStartDate' => array(
            'type'    => 'boolean',
            'default' => true,
        ),
        'displayMatchPoints' => array(
            'type'    => 'boolean',
            'default' => true,
        ),
        'displayTeamLogo' => array(
            'type'    => 'boolean',
            'default' => true,
        ),
        'displayTeamName' => array(
            'type'    => 'boolean',
            'default' => true,
        ),
        'displayTeamPlayers' => array(
            'type'    => 'boolean',
            'default' => false,
        ),
        'className' => array(
            'type'    => 'string',
            'default' => '',
        ),
    );

    /**
     * CyberPress_Matches_List_Block constructor.
     */
    public function __construct() {
        add_action( 'init', array( $this, 'init' ) );
        add_action( 'wp_ajax_get_tournament_stages', array( $this, 'get_tournament_stage_options' ) );
    }

    /**
     * Get Tournament Stage Options.
     *
     * @return void
     */
    public function get_tournament_stage_options() {
        $query_args = array(
            'post_type'      => 'tournament',
            'posts_per_page' => - 1,
        );

        $query_tournaments = new WP_Query( $query_args );

        $stages_collections = array();
        if ( $query_tournaments->have_posts() ) {
            while ( $query_tournaments->have_posts() ) {
                $query_tournaments->the_post();
                $stages_collections[ get_the_ID() ] = carbon_get_post_meta( get_the_ID(), 'cyberpress_tournament_stages' );
                array_unshift(
                    $stages_collections[ get_the_ID() ],
                    array(
                        '_type' => '_',
                        'stage' => __( 'Choose stage of tournament', 'cyberpress' ),
                    )
                );
            }
        }

        wp_reset_postdata();

        echo wp_json_encode( $stages_collections );

        wp_die();
    }

    /**
     * The function forms an array with access to the database for filtering by multiple values
     *
     * @param string $query_key - the name of the meta in the database.
     * @param string $value - filtered value: "123,456, ...".
     * @return array
     */
    public function get_meta_query_for_multiple_selector( $query_key, $value ) {
        $ids = explode( ',', $value );
        if ( count( $ids ) > 1 ) {
            $query_array = array(
                'relation' => 'OR',
            );
            foreach ( $ids as $id ) {
                $query_array[] = array(
                    'key'   => $query_key,
                    'value' => $id,
                );
            }
        } else {
            $query_array = array(
                'key'   => $query_key,
                'value' => $ids[0],
            );
        }
        return $query_array;
    }

    /**
     * Init.
     */
    public function init() {
        if ( function_exists( 'register_block_type' ) ) {
            register_block_type(
                'cyberpress/matches',
                array(
                    'attributes'      => $this->attributes,
                    'render_callback' => array( $this, 'block_render' ),
                )
            );
        }
    }

    /**
     * Get default attributes.
     *
     * @return array - default attributes
     */
    private function get_default_attributes() {
        $default_attributes = array();

        foreach ( $this->attributes as $key => $attribute ) {
            $default_attributes[ $key ] = $attribute['default'];
        }

        return $default_attributes;
    }

    /**
     * Register gutenberg block output
     *
     * @param array $attributes - block attributes.
     *
     * @return string
     */
    public function block_render( $attributes = array() ) {
        ob_start();

        $attributes = array_merge(
            $this->get_default_attributes(),
            $attributes
        );

        $attributes = array_merge(
            array(
                'className' => '',
            ),
            $attributes
        );

        $attributes['className'] .= ' cyberpress-block-matches';

        $args = array(
            'post_type' => 'match',
        );

        if ( isset( $attributes['order'] ) && $attributes['order'] && isset( $attributes['orderBy'] ) && $attributes['orderBy'] ) {
            $args = array_merge(
                array(
                    'order'   => $attributes['order'],
                    'orderby' => $attributes['orderBy'],
                ),
                $args
            );
        }

        if ( isset( $attributes['filterByMatches'] ) && $attributes['filterByMatches'] ) {
            $include_ids = explode( ',', $attributes['filterByMatches'] );
            if ( isset( $include_ids ) && ! empty( $include_ids ) && is_array( $include_ids ) ) {
                foreach ( $include_ids as $key => $include_id ) {
                    $include_ids[ $key ] = trim( $include_id );
                }
                $args = array_merge(
                    array( 'post__in' => $include_ids ),
                    $args
                );
            }
        }

        if ( isset( $attributes['displayPagination'] ) && $attributes['displayPagination'] ) {
            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            $args  = array_merge(
                array( 'paged' => $paged ),
                $args
            );
        }

        if ( isset( $attributes['count'] ) && $attributes['count'] >= -1 ) {
            $args = array_merge(
                array( 'posts_per_page' => $attributes['count'] ),
                $args
            );
        }

        // phpcs:ignore
        $args['meta_query'] = array();

        if ( isset( $attributes['filterByPlayers'] ) && $attributes['filterByPlayers'] ) {
            $args['meta_query'][] = $this->get_meta_query_for_multiple_selector( 'cyberpress_match_participants_team/players/player', $attributes['filterByPlayers'] );
        }

        if ( isset( $attributes['filterByGames'] ) && $attributes['filterByGames'] ) {
            $args['meta_query'][] = $this->get_meta_query_for_multiple_selector( 'cyberpress_match_game', $attributes['filterByGames'] );
        }

        if ( isset( $attributes['filterByTournaments'] ) && $attributes['filterByTournaments'] ) {
            $args['meta_query'][] = $this->get_meta_query_for_multiple_selector( 'cyberpress_match_tournament', $attributes['filterByTournaments'] );
        }

        if ( isset( $attributes['filterByTournamentStage'] ) && $attributes['filterByTournamentStage'] ) {
            $args['meta_query'][] = $this->get_meta_query_for_multiple_selector( 'cyberpress_match_tournament_stage', $attributes['filterByTournamentStage'] );
        }

        if ( isset( $attributes['filterByTeams'] ) && $attributes['filterByTeams'] ) {
            $args['meta_query'][] = $this->get_meta_query_for_multiple_selector( 'cyberpress_match_participants_team/team_name', $attributes['filterByTeams'] );
        }

        if ( isset( $attributes['filterByPlayingStatus'] ) && $attributes['filterByPlayingStatus'] ) {
            $now_time = date_i18n( 'Y-m-d H:i:s' );
            $statuses = explode( ',', $attributes['filterByPlayingStatus'] );

            if ( count( $statuses ) === 2 ) {
                $status_match_query = array(
                    'relation' => 'OR',
                );
                foreach ( $statuses as $status ) {
                    $compare_start = '>';
                    $compare_end   = '>';

                    switch ( $status ) {
                        case 'upcoming':
                            break;
                        case 'playing':
                            $compare_start = '<';
                            break;
                        case 'past':
                            $compare_start = '<';
                            $compare_end   = '<';
                            break;
                    }

                    $status_match_query[] = array(
                        'relation' => 'AND',
                        array(
                            'key'     => 'cyberpress_match_time_start',
                            'value'   => $now_time,
                            'compare' => $compare_start,
                        ),
                        array(
                            'key'     => 'cyberpress_match_time_end',
                            'value'   => $now_time,
                            'compare' => $compare_end,
                        ),
                    );
                }
            } elseif ( count( $statuses ) === 1 ) {
                $status             = $statuses[0];
                $status_match_query = array(
                    'relation' => 'AND',
                );

                $compare_start = '>';
                $compare_end   = '>';

                switch ( $status ) {
                    case 'upcoming':
                        break;
                    case 'playing':
                        $compare_start = '<';
                        break;
                    case 'past':
                        $compare_start = '<';
                        $compare_end   = '<';
                        break;
                }

                $status_match_query[] = array(
                    'key'     => 'cyberpress_match_time_start',
                    'value'   => $now_time,
                    'compare' => $compare_start,
                );
                $status_match_query[] = array(
                    'key'     => 'cyberpress_match_time_end',
                    'value'   => $now_time,
                    'compare' => $compare_end,
                );
            }

            if ( isset( $status_match_query ) ) {
                $args['meta_query'][] = $status_match_query;
            }
        }

        $the_query = new WP_Query( $args );

        // The Filtering Loop.
        if ( $the_query->have_posts() ) {

            do_action( 'cyberpress_matches_wrapper_block_start', $attributes );

            do_action( 'cyberpress_matches_loop_block_start', $attributes );

            while ( $the_query->have_posts() ) {
                $the_query->the_post();
                do_action( 'cyberpress_matches_loop_block', $attributes );
            }

            do_action( 'cyberpress_matches_loop_block_end' );

            do_action( 'cyberpress_blocks_pagination', $the_query, isset( $attributes['displayPagination'] ) ? $attributes['displayPagination'] : false );

            do_action( 'cyberpress_matches_wrapper_block_end' );

        } elseif ( isset( $attributes['blockRendered'] ) && $attributes['blockRendered'] ) {
            do_action( 'cyberpress_content_none' );
        }

        /* Restore original Post Data */
        wp_reset_postdata();

        return ob_get_clean();
    }
}
new CyberPress_Matches_List_Block();
