<?php
/**
 * Settings
 *
 * @category Class
 * @package ACFG
 * @subpackage ACFGSettings
 * @since 1.0.0
 */

namespace Refact\ACFG\Blocks;

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Register "Conditional Display" block
 *
 * @package ACFG
 * @subpackage ACFGCore
 * @since 1.0.0
 */
class Settings
{

    /**
     * Block id
     *
     * @var string $id
     */
    private static $id = 'settings';

    /**
     * Register the block
     */
    public static function register()
    {

        self::register_scripts_and_styles();

        $blocks = \WP_Block_Type_Registry::get_instance()->get_all_registered();
        $blocks_values = self::get_blocks_values($blocks);
        $block_categories_values = self::get_block_categories_values();
        $blocks_supports = self::get_blocks_supports($blocks);
        $roles = acfg_get_editable_roles();
        $post_types_values = self::get_post_types_values();

        $blocks_without_registered_category = array();
        foreach ($blocks as $block) {
            $block_categories_slugs = array_keys($block_categories_values);
            if ( !isset($block->category)) {
                $blocks_without_registered_category[] = $block->name;
            }
            if ($block->category == 'common' && !in_array($block->category, $block_categories_slugs)) {
                $blocks_without_registered_category[] = $block->name;
            }
        }

        $global = array(
            'roles'      => $roles,
            'blocks'     => $blocks_values,
            'post_types' => $post_types_values,
            'supports'   => $blocks_supports,
            'categories' => $block_categories_values,
            'blocks_without_registered_category' => $blocks_without_registered_category
        );

        $options = get_option(ACFG_SETTINGS, array());
        $rules = get_option( ACFG_RULE_OPTION_NAME, array() );
        self::localize_scripts($options, $global, $rules);
    }

    /**
     * Register scripts and styles
     * 
     * @return void
     */
    private static function register_scripts_and_styles()
    {
        $editor_js  = plugin_dir_url( dirname(dirname(__FILE__)) ) . 'blocks/' . self::$id . '/build/index.js';
        $editor_css = plugin_dir_url( dirname(dirname(__FILE__)) ) . 'blocks/' . self::$id . '/build/index.css';
    
        $dependencies = include ACFG_PATH . 'blocks/' . self::$id . '/build/index.asset.php';
    
        // Register editor script
        wp_register_script(
            'refact-acfg-block-' . self::$id . '-editor-script',
            $editor_js,
            $dependencies['dependencies'],
            $dependencies['version'],
            true
        );
    
        // Register editor style
        wp_register_style(
            'refact-acfg-block-' . self::$id . '-editor-style',
            $editor_css,
            array( 'wp-components' ),
            $dependencies['version'],
        );
    
        // Enqueue editor style
        wp_enqueue_style(
            'refact-acfg-block-' . self::$id . '-editor-style'
        );
    
        // Enqueue editor script
        wp_enqueue_script(
            'refact-acfg-block-' . self::$id . '-editor-script'
        );
    }

    /**
     * Get block categories values
     *
     * @return array
     */
    private static function get_block_categories_values()
    {
        $block_categories = get_block_categories(new \WP_Block_Editor_Context());
        $block_categories_values = array();

        if ($block_categories) {
            foreach ($block_categories as $key => $category) {
                $block_categories_values[$category['slug']] = $category['title'];
            }
        }

        return $block_categories_values;
    }

    /**
     * Get blocks values
     *
     * @param array $blocks
     * @return array
     */
    private static function get_blocks_values($blocks)
    {
        $blocks_values = array(
            array(
                'name' => 'all',
                'title' => 'All Blocks',
                'description' => 'All blocks',
            ),
        );

        foreach ($blocks as $block_key => $block) {
            if (!$block->title) {
                $block_name = $block->name;
                $block_name_parts = explode("/", $block_name);
                $block_slug = end($block_name_parts);
                $block->title = ucwords(str_replace("-", " ", $block_slug));
            }
            $blocks_values[] = $block;
        }

        return $blocks_values;
    }

    /**
     * Get blocks supports
     *
     * @param array $blocks
     * @return array
     */
    private static function get_blocks_supports($blocks)
    {
        $blocks_supports = array();

        foreach ($blocks as $block) {
            $supports = $block->supports;
            if (empty($supports)) {
                continue;
            }
            foreach ($supports as $slug => $support) {
                if (is_array($support)) {
                    foreach ($support as $key => $values) {
                        $blocks_supports = self::process_support_values($blocks_supports, $slug, $key, $values);
                    }
                }
                $blocks_supports[$slug] = ucfirst($slug);
            }
        }

        return $blocks_supports;
    }

    /**
     * Process support values
     *
     * @param array $blocks_supports
     * @param string $slug
     * @param string $key
     * @param array|string $values
     * @return array
     */
    private static function process_support_values($blocks_supports, $slug, $key, $values)
    {
        if (is_array($values)) {
            foreach ($values as $vkey => $value) {
                $blocks_supports = self::process_support_value($blocks_supports, $slug, $key, $vkey, $value);
            }
        } elseif (is_int($key)) {
            $blocks_supports[$slug . ':v:' . $values] = ucfirst($slug) . ' ' . ucfirst($values);
        } else {
            $blocks_supports[$slug . ':' . $key] = ucfirst($slug) . ' ' . ucfirst($key);
        }

        return $blocks_supports;
    }

    /**
     * Process support value
     *
     * @param array $blocks_supports
     * @param string $slug
     * @param string $key
     * @param string|int $vkey
     * @param string $value
     * @return array
     */
    private static function process_support_value($blocks_supports, $slug, $key, $vkey, $value)
    {
        if (is_int($vkey)) {
            $blocks_supports[$slug . ':' . $key . ':v:' . $value] = ucfirst($slug) . ' ' . ucfirst($key) . ' ' . ucfirst($value);
        } else {
            $blocks_supports[$slug . ':' . $key . ':' . $vkey] = ucfirst($slug) . ' ' . ucfirst($key) . ' ' . ucfirst($vkey);
        }

        return $blocks_supports;
    }

    /**
     * Get post types values
     *
     * @return array
     */
    private static function get_post_types_values()
    {
        $args = array(
            'show_in_menu' => true,
            'show_ui' => true,
        );
        $post_types = get_post_types($args, 'objects');
        $exclude_post = array(
            'attachment',
        );
        $post_types_values = array();

        if (!empty($post_types)) {
            foreach ($post_types as $post_type) {
                if (!in_array($post_type->name, $exclude_post)) {
                    $post_types_values[$post_type->name] = $post_type->labels->singular_name;
                }
            }
        }

        return $post_types_values;
    }
    
    /**
     * Localize scripts
     *
     * @param array $options
     * @param array $global
     * @param array $rules
     */
    private static function localize_scripts($options, $global, $rules)
    {
        wp_localize_script(
            'refact-acfg-block-' . self::$id . '-editor-script',
            ACFG_SETTINGS,
            $options
        );
    
        wp_localize_script(
            'refact-acfg-block-' . self::$id . '-editor-script',
            ACFG_GLOBAL,
            $global
        );
    
        wp_localize_script(
            'refact-acfg-block-' . self::$id . '-editor-script',
            ACFG_RULE_OPTION_NAME,
            $rules
        );
    }    
}
