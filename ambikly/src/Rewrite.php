<?php

namespace Ambikly;

class Rewrite
{

    public function __construct()
    {
        add_action('init', [$this, 'add_rewrite_rules']);
        add_action('wp_loaded', [$this, 'flush_rewrite_rules']);
    }

    /**
     * Add custom rewrite rules for products
     */
    public function add_rewrite_rules()
    {
        add_rewrite_rule(
            '^' . Constants::getProductBase() . '/([^/]+)/?$', // Match "products/{product_slug}"
            'index.php?ambikly_type=' . Constants::AMBIKLY_PRODUCT_TYPE . '&name=$matches[1]', // Redirect to custom query
            'top'
        );

        add_rewrite_rule(
            '^' . Constants::getCategoryBase() . '/([^/]+)/?$', // Match "categories/{category_slug}"
            'index.php?ambikly_type=' . Constants::AMBIKLY_CATEGORY_TYPE . '&name=$matches[1]', // Redirect to custom query
            'top'
        );
        flush_rewrite_rules();
    }

    /**
     * Flush rewrite rules once (you may call this manually during development)
     */
    public function flush_rewrite_rules()
    {
        if (get_option('ambikly_flush_rewrite_rules')) {
            flush_rewrite_rules();
            delete_option('ambikly_flush_rewrite_rules');
        }
    }

    /**
     * Manually call this method after activation
     */
    public function activate()
    {
        add_option('ambikly_flush_rewrite_rules', true);
        $this->add_rewrite_rules();
        flush_rewrite_rules();
    }

}