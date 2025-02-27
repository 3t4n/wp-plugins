<?php
/**
 * @package dompdf
 * @link    http://dompdf.github.com/
 * @author  Benj Carson <benjcarson@digitaljunkies.ca>
 * @author  Fabien Ménager <fabien.menager@gmail.com>
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 */

// HMLT5 Parser
//FIXME: replace with masterminds HTML5
//require_once __DIR__ . '/lib/html5lib/Parser.php';

// Sabberworm
spl_autoload_register(function($class)
{
    if (strpos($class, 'Sabberworm') !== false) {
        $file = str_replace('\\', DIRECTORY_SEPARATOR, $class);
        $file = realpath(__DIR__ . '/lib/php-css-parser/lib/' . (empty($file) ? '' : DIRECTORY_SEPARATOR) . $file . '.php');
        if (file_exists($file)) {
            require_once $file;
            return true;
        }
    }
    return false;
});

// php-font-lib
include_once(plugin_dir_path(__FILE__) . 'lib/php-font-lib/src/FontLib/Autoloader.php');

//php-svg-lib
include_once(plugin_dir_path(__FILE__). 'lib/php-svg-lib/src/autoload.php');


/*
 * New PHP 5.3.0 namespaced autoloader
 */
include_once(plugin_dir_path(__FILE__) . 'src/Autoloader.php');

Dompdf\Autoloader::register();
