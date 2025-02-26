<?php

    /*
    Plugin Name:       Annytab Code Prettify
    Description:       This plugin prettifies code in all &lt;pre&gt; tags on a page.
    Version:           1.0.2
    Requires at least: 5.4
    Requires PHP:      7.4
    Author:            A Name Not Yet Taken AB
    Author URI:        https://www.annytab.com
    License:           GPL v2 or later
    License URI:       https://www.gnu.org/licenses/gpl-2.0.html
    Text Domain:       annytab-code-prettify
    Domain Path:       /languages

    Annytab Code Prettify is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 2 of the License, or
    any later version.

    Annytab Code Prettify is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Annytab Code Prettify. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
    */

    // Turn strict types on, by default PHP 7 remains a weakly typed language.
    declare(strict_types=1);

    // Add a namespace to avoid conflicts
    namespace Annytab\Plugins\CodePrettify;

    // Make sure we don't expose any info if called directly
    if (!function_exists('add_action')) {
        echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
        exit;
    }

    // Variables
    define('ANNYTAB_CODE_PRETTIFY_VERSION', '1.0.2');
    define('ANNYTAB_CODE_PRETTIFY_PLUGIN_DIR', plugin_dir_path(__FILE__));

    // Create a startup instance
    $startup = new StartUp(ANNYTAB_CODE_PRETTIFY_VERSION);

    // Add actions
    add_action('wp_enqueue_scripts', array($startup, 'add_contents'));

    // This class includes startup actions for the plugin
    class StartUp
    {
        #region Variables

        private $version;

        #endregion

        #region Constructors

        // Create a new instance
        public function __construct($version) 
        {
            // Set values for instance variables
            $this->version = $version;

        } // End of the constructor

        #endregion

        #region Methods

        // Insert styles and scripts
        function add_contents() 
        {
            // Add styles
            wp_enqueue_style('annytab-code-prettify', esc_url(plugins_url('css/prettify.min.css',__FILE__)), array(), $this->version, 'all');

            // Add scripts
            wp_enqueue_script('annytab-code-prettify-0', esc_url(plugins_url('js/prettify.min.js',__FILE__)), array(), $this->version, true);
            wp_enqueue_script('annytab-code-prettify-1', esc_url(plugins_url('js/startup.min.js',__FILE__)), array(), $this->version, true);

        } // End of the add_contents method

        #endregion

    } // End of the class

?>