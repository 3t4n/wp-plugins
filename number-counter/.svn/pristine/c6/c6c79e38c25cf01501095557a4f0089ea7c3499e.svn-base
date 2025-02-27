<?php

/**
 * Load google fonts.
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

class Number_Counter_Helper
{

    private static $instance;

    /**
     * Registers the plugin.
     */
    public static function register()
    {
        if (null === self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * The Constructor.
     */
    public function __construct()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueues'));
    }

    /**
     * Load fonts.
     *
     * @access public
     */
    public function enqueues($hook)
    {
        global $pagenow;

        /**
         * Only for admin add/edit pages/posts
         */
        if ($pagenow == 'post-new.php' || $pagenow == 'post.php' || $pagenow == 'site-editor.php' || ($pagenow == 'themes.php' && !empty($_SERVER['QUERY_STRING']) && str_contains($_SERVER['QUERY_STRING'], 'gutenberg-edit-site'))) {

            $controls_dependencies = include_once NUMBER_COUNTER_BLOCK_ADMIN_PATH . '/dist/modules.asset.php';

            wp_register_script(
                "number-counter-block-controls-util",
                NUMBER_COUNTER_BLOCK_ADMIN_URL . 'dist/modules.js',
                array_merge($controls_dependencies['dependencies']),
                $controls_dependencies['version'],
                true
            );

            wp_localize_script('number-counter-block-controls-util', 'EssentialBlocksLocalize', array(
                'eb_wp_version' => (float) get_bloginfo('version'),
                'rest_rootURL' => get_rest_url(),
				'fontAwesome' => "true"
            ));

            if ($pagenow == 'post-new.php' || $pagenow == 'post.php') {
                wp_localize_script('number-counter-block-controls-util', 'eb_conditional_localize', array(
                    'editor_type' => 'edit-post'
                ));
            } else if ($pagenow == 'site-editor.php' || $pagenow == 'themes.php') {
                wp_localize_script('number-counter-block-controls-util', 'eb_conditional_localize', array(
                    'editor_type' => 'edit-site'
                ));
            }

			wp_register_style(
				'essential-blocks-iconpicker-css',
				NUMBER_COUNTER_BLOCK_ADMIN_URL . 'dist/style-modules.css',
				[],
				NUMBER_COUNTER_BLOCK_VERSION,
				'all'
			);

            wp_enqueue_style(
                'countdown-editor-css',
                NUMBER_COUNTER_BLOCK_ADMIN_URL . 'dist/modules.css',
                array(
                    'fontawesome-frontend-css',
                    'fontpicker-default-theme',
                    'fontpicker-matetial-theme',
                    'essential-blocks-animation',
					'essential-blocks-iconpicker-css'
                ),
                $controls_dependencies['version'],
                'all'
            );
        }
    }

    public static function get_block_register_path($blockname, $blockPath)
    {
        if ((float) get_bloginfo('version') <= 5.6) {
            return $blockname;
        } else {
            return $blockPath;
        }
    }
}
Number_Counter_Helper::register();
