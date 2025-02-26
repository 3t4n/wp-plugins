<?php

namespace Flynax\Plugins\FlynaxBridge;

/**
 * Class Posts. All actions with WordPress post
 *
 * @since 2.0.0
 *
 * @package Flynax\Plugins\FlynaxBridge
 */
class Posts
{
    /**
     * After post has been published
     */
    public function afterPosted()
    {
        $this->addRefreshingCacheScheldule();
    }

    /**
     * After post removed
     */
    public function afterPostRemoved()
    {
        $this->updateCache();
    }

    /**
     * Post status changed to Draft
     */
    public function postNotVisible()
    {
        $this->updateCache();
    }

    /**
     * Post status changed
     */
    public function postStatusChanged()
    {
        $this->updateCache();
    }

    /**
     * Post has been moved to trash
     */
    public function movedToTrash()
    {
        $this->updateCache();
    }

    /**
     * Post has been restored from trash
     */
    public function untrashedPost()
    {
        $this->updateCache();
    }

    /**
     * After edit post
     */
    public function afterPostEdit()
    {
        $this->addRefreshingCacheScheldule();
    }

    /**
     * Run after posting new post
     */
    public function newPostPublished()
    {
        $this->addRefreshingCacheScheldule();
    }

    /**
     * Adding one-time cache updating scheldule work
     */
    public function addRefreshingCacheScheldule()
    {
        if (!wp_next_scheduled('flb_update_cache')) {
            wp_schedule_single_event(time() + 3, 'flb_update_cache');
        }
    }

    /**
     * Update cache of the WordPress bridge block in Flynax
     *
     * @return \WP_REST_Response  mixed - Post request answer
     */
    public function updateCache()
    {
        return Request::get('/post/update-cache');
    }
}
