<?php
/*
Plugin Name: Elfsight Blocks
Description: Custom Gutenberg Blocks to embed the Elfsight Widgets.
Plugin URI: https://elfsight.com/developers/wp-blocks/?utm_source=portals&utm_medium=wordpress-org&utm_campaign=elfsight-blocks-wordpress&utm_content=plugin-site
Version: 1.1.0
Author: Elfsight
Author URI: https://elfsight.com/?utm_source=portals&utm_medium=wordpress-org&utm_campaign=elfsight-blocks-wordpress&utm_content=plugins-list
*/


if (!defined('ABSPATH')) exit;

final class ElfsightBlocks
{
    /**
     * Plugin Version
     *
     * @var string
     */
    const VERSION = '1.1.0';

    /**
     * Text Domain
     *
     * @var string
     */
    const TEXT_DOMAIN = 'elfsight-blocks';

    /**
     * Category Slug
     *
     * @var string
     */
    static $CATEGORY_SLUG = 'elfsight';

    /**
     * Category Name
     *
     * @var string
     */
    static $CATEGORY_NAME;

    /**
     * Instance
     *
     * @var ElfsightBlocks
     */
    private static $_INSTANCE = null;

    /**
     * Instance
     *
     * Ensures only one instance of the class is loaded or can be loaded
     *
     * @return ElfsightBlocks
     */
    public static function instance()
    {
        if (is_null(self::$_INSTANCE)) {
            self::$_INSTANCE = new self();
        }

        return self::$_INSTANCE;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        self::$CATEGORY_NAME = __('Elfsight Blocks', self::TEXT_DOMAIN);

        add_action('enqueue_block_editor_assets', array($this, 'enqueueBlockEditorAssets'), 1);
        add_action('enqueue_block_assets', array($this, 'enqueueBlockAssets'));

        add_filter('block_categories', array($this, 'registerBlockCategory'), 10, 2);
    }

    /**
     * Append a new category
     *
     * @param  $categories
     * @param  $post
     * @return array
     */
    public function registerBlockCategory($categories, $post) {
        return array_merge(
            $categories,
            array(
                array(
                    'slug'  => self::$CATEGORY_SLUG,
                    'title' => self::$CATEGORY_NAME
                )
            )
        );
    }

    /**
     * Enqueue a editor script with Elfsight Embed SDK
     */
    public function enqueueBlockEditorAssets()
    {
        wp_enqueue_script(
            'elfsight-blocks-editor',
            plugins_url('build/elfsight-blocks.js', __FILE__),
            array( 'wp-blocks', 'wp-i18n', 'wp-element' ),
            self::VERSION
        );
    }

    /**
     * Enqueue a Elfsight platform script on frontend
     */
    public function enqueueBlockAssets()
    {
        wp_enqueue_script(
            'elfsight-platform',
            'https://apps.elfsight.com/p/platform.js',
            array(),
            self::VERSION
        );
    }
}

ElfsightBlocks::instance();
