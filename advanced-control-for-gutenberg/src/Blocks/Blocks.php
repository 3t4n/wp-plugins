<?php
/**
 * Blocks
 *
 * @category Class
 * @package ACFG
 * @subpackage ACFGBlocks
 * @since 1.0.0
 */

namespace Refact\ACFG\Blocks;

use Refact\ACFG\Blocks\Settings;

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Register Plugin Blocks
 *
 * @package ACFG
 * @subpackage ACFGBlocks
 * @since 1.0.0
 */
class Blocks
{

    /**
     * Register all blocks
     *
     * @return void
     */
    public static function register_all_blocks($hook_suffix)
    {
        /**
         * Register "Settings" block
         */

        // Is Advanced Control for Gutenberg page
        if ('settings_page_acfg' == $hook_suffix || 'settings_page_acfg-add-rules' == $hook_suffix) {
			Settings::register();
		}
        
    }
}
