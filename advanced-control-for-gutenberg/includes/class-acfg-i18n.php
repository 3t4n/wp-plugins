<?php
/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * php version 7.4+
 *
 * @category   Plugin
 * @package    ACFG
 * @subpackage ACFG/admin/partials
 * @author     Refact <dev@refact.co>
 * @license    GPL-2.0+ http://www.gnu.org/licenses/gpl-2.0.txt
 * @link       https://refact.co/
 */

namespace Refact\ACFG;

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @category   Plugin
 * @package    ACFG
 * @subpackage ACFG/includes
 * @author     Refact <info@refact.co>
 * @license    GPL-2.0+ http://www.gnu.org/licenses/gpl-2.0.txt
 * @link       https://refact.co/
 * @since      1.0.0
 */
class ACFG_I18n
{

    /**
     * Load the plugin text domain for translation.
     *
     * @since    1.0.0
     * @return void
     */
    public function load_plugin_textdomain()
    {

        load_plugin_textdomain(
            'acfg',
            false,
            ACFG_PATH . '/languages/'
        );
    }
}
