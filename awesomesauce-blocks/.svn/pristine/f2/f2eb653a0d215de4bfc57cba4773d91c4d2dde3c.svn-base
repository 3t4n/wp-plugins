<?php

use Awesomesauce\Awesomesauce;

if (!defined('ABSPATH')) {
    exit;
}

class AwesomesauceGutenberg {

    public function __construct() {
        add_action('init', array(
            $this,
            'register_block'
        ));
    }

    public function register_block() {
        wp_register_script('awesomesauce-block', plugins_url('awesomesauce-gutenberg.js', __FILE__), array(
            'wp-blocks',
            'wp-element',
            'wp-block-editor',
            'wp-components'
        ), Awesomesauce::$version, true);

        wp_localize_script('awesomesauce-block', 'awesomesauce_blocks', array(
            'blocks'   => $this->get_blocks(),
            'adminUrl' => site_url('/wp-admin/post.php')
        ));

        register_block_type('awesomesauce/block', array(
            'editor_script'   => 'awesomesauce-block',
            'render_callback' => array(
                $this,
                'render_block'
            ),
            'attributes'      => array(
                'awesomesauceID' => array(
                    'type'    => 'string',
                    'default' => ''
                ),
            ),
        ));
    }

    private function get_blocks() {
        $args = array(
            'post_type'      => 'awesomesauce_blocks',
            'posts_per_page' => -1,
            'post_status'    => 'publish'
        );

        $query  = new WP_Query($args);
        $blocks = array();

        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $blocks[] = array(
                    'id'    => get_the_ID(),
                    'title' => get_the_title(),
                );
            }
            wp_reset_postdata();
        }

        return $blocks;
    }

    public function render_block($attributes) {
        if (!empty($attributes['awesomesauceID'])) {
            return do_shortcode('[awesomesauce id="' . esc_attr($attributes['awesomesauceID']) . '"]');
        }

        return '';
    }
}

new AwesomesauceGutenberg();