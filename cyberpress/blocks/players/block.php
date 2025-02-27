<?php
/**
 * Players block.
 *
 * @package cyberpress
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Class CyberPress_Players_List_Block
 */
class CyberPress_Players_List_Block {

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
            'default' => 3,
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
        'filterByPlayers' => array(
            'type'    => 'string',
            'default' => '',
        ),
        'filterByGames' => array(
            'type'    => 'string',
            'default' => '',
        ),
        'filterByTeams' => array(
            'type'    => 'string',
            'default' => '',
        ),
        'filterByCountries' => array(
            'type'    => 'string',
            'default' => '',
        ),
        'displayMetaThumbnail' => array(
            'type'    => 'boolean',
            'default' => true,
        ),
        'displayMetaTitle' => array(
            'type'    => 'boolean',
            'default' => true,
        ),
        'displayMetaFullName' => array(
            'type'    => 'boolean',
            'default' => true,
        ),
        'displayMetaGender' => array(
            'type'    => 'boolean',
            'default' => true,
        ),
        'displayMetaCountry' => array(
            'type'    => 'boolean',
            'default' => true,
        ),
        'displayMetaAge' => array(
            'type'    => 'boolean',
            'default' => true,
        ),
        'className' => array(
            'type'    => 'string',
            'default' => '',
        ),
    );

    /**
     * CyberPress_Players_List_Block constructor.
     */
    public function __construct() {
        add_action( 'init', array( $this, 'init' ) );
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
                'cyberpress/players',
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

        $attributes['className'] .= ' cyberpress-block-players';

        $args = array(
            'post_type' => 'player',
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

        if ( isset( $attributes['filterByPlayers'] ) && $attributes['filterByPlayers'] ) {
            $include_ids = explode( ',', $attributes['filterByPlayers'] );
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

        // phpcs:ignore
        $args['meta_query'] = array();

        if ( isset( $attributes['filterByGames'] ) && $attributes['filterByGames'] ) {
            $args['meta_query'][] = $this->get_meta_query_for_multiple_selector( 'cyberpress_player_games/game', $attributes['filterByGames'] );
        }

        if ( isset( $attributes['filterByCountries'] ) && $attributes['filterByCountries'] ) {
            $args['meta_query'][] = $this->get_meta_query_for_multiple_selector( 'cyberpress_player_country', $attributes['filterByCountries'] );
        }

        if ( isset( $attributes['filterByTeams'] ) && $attributes['filterByTeams'] ) {
            $ids         = explode( ',', $attributes['filterByTeams'] );
            $players_ids = array();

            // get all players by filtering teams.
            foreach ( $ids as $id ) {
                $team    = cyberpress()->get_the_team( $id );
                $players = $team->get_players();

                if ( ! empty( $players ) ) {
                    foreach ( $players as $player ) {
                        if ( isset( $player['data'] ) && ! empty( $player['data'] ) ) {
                            $player        = $player['data'];
                            $players_ids[] = $player->get_id();
                        }
                    }
                }
            }
            if ( ! empty( $players_ids ) ) {
                $players_ids = array_unique( $players_ids );
                if ( isset( $args['post__in'] ) ) {
                    $args = array_merge(
                        array( 'post__in' => $players_ids ),
                        $args
                    );
                } else {
                    $args['post__in'] = $players_ids;
                }
            }
        }

        $the_query = new WP_Query( $args );
        // The Filtering Loop.
        if ( $the_query->have_posts() ) {

            do_action( 'cyberpress_players_wrapper_block_start', $attributes );

            do_action( 'cyberpress_players_loop_block_start', $attributes );

            while ( $the_query->have_posts() ) {
                $the_query->the_post();

                do_action( 'cyberpress_players_loop_block', $attributes );
            }

            do_action( 'cyberpress_players_loop_block_end' );

            do_action( 'cyberpress_blocks_pagination', $the_query, isset( $attributes['displayPagination'] ) ? $attributes['displayPagination'] : false );

            do_action( 'cyberpress_players_wrapper_block_end' );

        } else {
            do_action( 'cyberpress_content_none' );
        }

        /* Restore original Post Data */
        wp_reset_postdata();

        return ob_get_clean();
    }
}
new CyberPress_Players_List_Block();
