<?php
    /**
     * BiblioDAM Connect
     *
     * @link https://www.publisherstoolbox.com/bibliodam/
     * @package BiblioDAM
     * @since 1.0.0
     *
     * @wordpress-plugin
     * Plugin Name: BiblioDAM Connect
     * Plugin URI: https://wordpress.org/plugins/bibliodam-connect/
     * Description: BiblioDAM Connect allows seamless integration of BiblioDAM media onto your WordPress website(s).
     * Version: 1.3.4
     * Author: Publishers Toolbox
     * Author URI: https://www.publisherstoolbox.com/bibliodam/
     * License: GPL-2.0+
     * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
     * Text Domain: bibliodam-connect
     * Domain Path: /languages
     */
    
    use PTDC\ptx\ptxDcPluginActivate;
    use PTDC\ptx\ptxDcPluginCore;
    use PTDC\ptx\ptxDcPluginDeActivate;
    
    /**
     * If this file is called directly, abort.
     */
    if (!defined('WPINC')) {
        die;
    }
    
    /**
     * Plugin version.
     * Start at version 1.0.0 and use SemVer - https://semver.org
     * Rename this for your plugin and update it as you release new versions.
     */
    define('PTX_BIBLIODAM_CONNECT_VERSION', '1.3.4');
    
    /**
     * Plugin name.
     * Rename this for your plugin.
     */
    define('PTX_BIBLIODAM_CONNECT_NAME', 'bibliodam-connect');
    
    /**
     * SPL auto loader for Publishers Toolbox
     *
     * This function loads all of the classes for
     * the plugin automatically.
     *
     * @param $className
     */
    function DcAutoLoader(string $className) {
        /**
         * If the class being requested does not start with our prefix,
         * we know it's not one in our project
         */
        if (0 !== strpos($className, 'PTDC')) {
            return;
        }
        
        $className = ltrim($className, '\\');
        $fileName  = '';
        if ($lastNsPos = strrpos($className, '\\')) {
            $namespace = plugin_dir_path(__FILE__) . '/' . substr($className, 0, $lastNsPos);
            $className = substr($className, $lastNsPos + 1);
            $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
            $fileName  = str_replace('//PTDC', '', $fileName);
        }
        $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
        
        if (file_exists($fileName)) {
            require $fileName;
        }
    }
    
    try {
        spl_autoload_register('DcAutoLoader');
    } catch (Exception $e) {
        throw new RuntimeException('Could not register DcAutoLoader');
    }
    
    /**
     * The code that runs during plugin activation.
     */
    function activatePluginDc() {
        ptxDcPluginActivate::activate();
    }
    
    register_activation_hook(__FILE__, 'activatePluginDc');
    
    /**
     * The code that runs during plugin deactivation.
     */
    function deactivatePluginDc() {
        ptxDcPluginDeActivate::deactivate();
    }
    
    register_deactivation_hook(__FILE__, 'deactivatePluginDc');
    
    /**
     * Begins execution of the plugin.
     *
     * Since everything within the plugin is registered via hooks,
     * then kicking off the plugin from this point in the file does
     * not affect the page life cycle.
     *
     * @since 1.0.0
     */
    function runPluginDc() {
        (new ptxDcPluginCore())->run();
    }
    
    runPluginDc();
