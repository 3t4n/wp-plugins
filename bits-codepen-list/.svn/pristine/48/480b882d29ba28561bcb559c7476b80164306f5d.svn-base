<?php

namespace Bits\CodePenList\Modules;

class Feed extends BaseModule
{
    /**
     * The feed object.
     * 
     * @var SimplePie
     */
    protected $feed;

    /**
     * Render the list from the feed.
     *
     * @param  array  $atts
     * @return string
     */
    public function render($atts)
    {
        do_action('bind_codepenlist_cache_filter', $atts['cachetime']);

        $response = $this->fetchFeed($atts);

        if (is_array($response)) {        
            $response = Realize::build(compact('response', 'atts'));
        }
        
        do_action('unbind_codepenlist_cache_filter');

        if (empty($atts['widget']) || ! $atts['widget']) {
            return $response;
        }

        echo $response;
    }

    /**
     * Fetch the feed.
     * 
     * @param  array  $atts
     * @return string|array
     */
    protected function fetchFeed($atts)
    {
        $this->feed = fetch_feed(sprintf(
            'http://codepen.io/%s/%s/feed/', $atts['username'], $atts['type']
        ));

        if (! $response = $this->checkFeed($atts)) {
            $this->feed->enable_order_by_date(false);
        }

        return $response;
    }

    /**
     * Check for feed errors, and return with the response.
     * 
     * @param  array  $atts
     * @return array|string
     */
    protected function checkFeed($atts)
    {
        if (is_wp_error($this->feed)) {
            return __('Invalid RSS feed!', 'bits-codepen-list');
        }

        if (! $response = $this->feed->get_items(0, $atts['posts'])) {
            return __('No items', 'bits-codepen-list');
        }
        
        return $response;
    }

    /**
     * Register the hooks.
     * 
     * @return void
     */
    public function registerHooks()
    {
        add_shortcode('codepen-list', [$this, 'render']);
        add_action('bits_codepen_list_render', [$this, 'render']);
    }
}