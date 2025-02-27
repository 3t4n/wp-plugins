<?php
/**
 * Class api for working with fields of custom games posts.
 *
 * @package cyberpress
 */

/**
 * Class CyberPress_Game_API
 */
class CyberPress_Game_API extends CyberPress_Custom_Post_API {

    /**
     * CyberPress_Game_API constructor.
     *
     * @param null   $id - post id. If null or not exist - we use global $post->ID.
     * @param string $post_type - post type.
     */
    public function __construct( $id = null, $post_type = 'game' ) {
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
    public function game_classes( $class = '', $post_id = null ) {
        post_class( $class, $post_id );
    }
}
