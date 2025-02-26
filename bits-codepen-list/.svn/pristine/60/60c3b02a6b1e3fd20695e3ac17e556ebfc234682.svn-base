<?php

namespace Bits\CodePenList\Modules;

class Cache extends BaseModule
{
    /**
     * Get the cache time from the options.
     *
     * @return null|string
     */
    public function getCacheTime()
    {
        return get_option('bits_codepen_shortcode_cachetime');
    }

    /**
     * Set the cache time.
     * 
     * @param  integer $cachetime
     * @return void
     */
    public function bindCacheFilter($cachetime = 43200)
    {
        update_option('bits_codepen_shortcode_cachetime', $cachetime);
        add_filter('wp_feed_cache_transient_lifetime', [$this, 'getCacheTime']);
    }

    /**
     * Unset the cache time.
     * 
     * @return void
     */
    public function unbindCacheFilter()
    {
        remove_filter('wp_feed_cache_transient_lifetime', [$this, 'getCacheTime']);
    }

    /**
     * Register the hooks.
     * 
     * @return void
     */
    public function registerHooks()
    {
        add_action('bind_codepenlist_cache_filter', [$this, 'bindCacheFilter']);
        add_action('unbind_codepenlist_cache_filter', [$this, 'unbindCacheFilter']);
    }
}