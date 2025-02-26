<?php

class Comments_Frontend extends Comments_Main {

    /**
     * @since 1.0.0
     */
    public function __construct() {
        parent::__construct();

        // disable comments for specific post types
        add_filter('comments_open', array($this, 'comments_open'));
    }

    /**
     * manage when comments are open
     *
     * @param bool $open if comments are open/closed by WP settings
     * @param int $post_id id of the current post
     * @since 1.0.0
     * @see /wp-includes/comment-template.php comments_open()
     */
    public function comments_open($open, $post_id = 0){

        $options = $this->options();

        if(isset($options['disabled_post_type'][get_post_type()]) &&
                $options['disabled_post_type'][get_post_type()] == 1)
            return false;

        return $open;

    }

}
