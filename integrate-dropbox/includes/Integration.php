<?php

namespace CodeConfig\IntegrateDropbox;

defined('ABSPATH') or exit('Hey, what are you doing here? You silly human!');

use CodeConfig\IntegrateDropbox\App\Processor;
use CodeConfig\IntegrateDropbox\Elementor\Elementor;
use CodeConfig\IntegrateDropbox\Integrations\Blocks\Blocks;

class Integration
{
    private static $instance = null;
    private $settings;

    /**
     * Initialize integrations.
     *
     * @since 1.0.0
     */
    public function __construct()
    {
        $this->settings = Processor::instance()->get_setting('settings', []);

        if (!function_exists('current_user_can')) {
            require_once ABSPATH . 'wp-includes/capabilities.php';
        }

        if (!function_exists('wp_get_current_user')) {
            require_once ABSPATH . 'wp-includes/pluggable.php';
        }

        $this->integrateBlocks();

        add_action('init', [$this, 'integrateMediaLibrary']);

        add_action('elementor/init', [$this, 'integrateElementor']);

        if (indbox_fs()->is_paying_or_trial()) {
            if ($this->is_active('woocommerce')) {
                $this->initializeIntegration('woocommerce_loaded', WooCommerce::class);
            }

            if ($this->is_active('master-study-lms')) {
                $this->initializeIntegration('masterstudy_lms_plugin_loaded', MsLMS::class);
            }

            if ($this->is_active('tutor-lms')) {
                $this->initializeIntegration('tutor_loaded', TutorLms::class);
            }
        }
    }

    private function integrateBlocks()
    {
        if ($this->is_active('gutenberg-editor')) {
            if (!class_exists('CodeConfig\\IntegrateDropbox\\Integrations\\Blocks\\Blocks')) {
                require_once INDBOX_INTEGRATIONS . '/blocks/Blocks.php';
            }
            Blocks::instance();
        }
    }

    public function integrateElementor()
    {
        if ($this->is_active('elementor')) {
            Elementor::instance();
        }
    }

    public function integrateMediaLibrary()
    {
        if ($this->is_active('media-library')) {

            if (!function_exists('current_user_can')) {
                require_once ABSPATH . 'wp-includes/capabilities.php';
            }
            if (!function_exists('wp_get_current_user')) {
                require_once ABSPATH . 'wp-includes/pluggable.php';
            }

            if (current_user_can('manage_indbox_files')) {
                MediaLibrary::instance();
            } else {
                add_action('pre_get_posts', [$this, 'filter_grid_attachments']);
            }
        } else {
            add_action('pre_get_posts', [$this, 'filter_grid_attachments']);
        }
    }

    /**
     * Checks if a given integration key is active.
     *
     * @param string $key The key of the integration to check.
     * @return bool True if the integration is active, false otherwise.
     */
    public function is_active($key)
    {
        $active_integrations = isset($this->settings['activeIntegration']) ? $this->settings['activeIntegration'] : [];

        return in_array($key, $active_integrations, true);
    }

    /**
     * Singleton instance retrieval
     *
     * @return Integration
     */
    public static function instance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Filter the grid attachments query to exclude any attachments that are connected to a Dropbox folder.
     *
     * This is a temporary solution until the grid has been modified to use the new `_indbox_media_folder_id` meta key.
     *
     * @param WP_Query $query The query object.
     *
     * @return WP_Query The modified query object.
     */
    public function filter_grid_attachments($query)
    {

        if (! isset($query->query_vars['post_type']) || 'attachment' !== $query->query_vars['post_type']) {
            return $query;
        }

        if (empty($_REQUEST['query'])) {
            return $query;
        }

        $meta_query = $query->get('meta_query') ?: [];

        $meta_query[] = [
            'relation' => 'OR',
            [
                'key'     => '_indbox_media_folder_id',
                'compare' => 'NOT EXISTS',
            ],
        ];

        $query->set('meta_query', $meta_query);

        return $query;
    }

    /**
     * Initializes a given integration class when the specified hook is triggered.
     *
     * @param string $hook  The name of the action hook.
     * @param string $class The class name to be instantiated.
     *
     * @since 1.0.0
     */
    private function initializeIntegration($hook, $class)
    {
        add_action($hook, function () use ($class) {
            $class::instance();
        });
    }
}
