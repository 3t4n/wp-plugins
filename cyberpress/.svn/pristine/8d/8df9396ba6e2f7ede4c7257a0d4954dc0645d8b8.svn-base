<?php
/**
 * Games block.
 *
 * @package cyberpress
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Class CyberPress_Games_List_Block
 */
class CyberPress_Games_List_Block {

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
            'default' => 5,
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
        'filterByGames' => array(
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
        'className' => array(
            'type'    => 'string',
            'default' => '',
        ),
    );

    /**
     * CyberPress_Games_List_Block constructor.
     */
    public function __construct() {
        add_action( 'init', array( $this, 'init' ) );
    }

    /**
     * Init.
     */
    public function init() {
        if ( function_exists( 'register_block_type' ) ) {
            register_block_type(
                'cyberpress/games',
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

        $args = array(
            'post_type' => 'game',
        );

        $attributes['className'] .= ' cyberpress-block-games';

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

        if ( isset( $attributes['filterByGames'] ) && $attributes['filterByGames'] ) {
            $include_ids = explode( ',', $attributes['filterByGames'] );
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

        $the_query = new WP_Query( $args );
        // The Filtering Loop.
        if ( $the_query->have_posts() ) {

            do_action( 'cyberpress_games_wrapper_block_start', $attributes );

            do_action( 'cyberpress_games_loop_block_start', $attributes );

            while ( $the_query->have_posts() ) {
                $the_query->the_post();

                do_action( 'cyberpress_games_loop_block', $attributes );
            }

            do_action( 'cyberpress_games_loop_block_end' );

            do_action( 'cyberpress_blocks_pagination', $the_query, isset( $attributes['displayPagination'] ) ? $attributes['displayPagination'] : false );

            do_action( 'cyberpress_games_wrapper_block_end' );

        } else {
            do_action( 'cyberpress_content_none' );
        }
        /* Restore original Post Data */
        wp_reset_postdata();

        return ob_get_clean();
    }
}
new CyberPress_Games_List_Block();
