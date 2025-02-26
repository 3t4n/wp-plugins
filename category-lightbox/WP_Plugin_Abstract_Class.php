<?php

/**
 * WordPress Plugin Base class
 *
 *
 * @package     WordPress Plugin
 * @category    Plugin
 * @author      Nitin kumar
 * @link        http://www.w3blog.in
 */

abstract class WP_Plugin_Abstract_Class
{    

    /**
     * Do we need to debug the script
     *
     * @var boolean
     */
    public $debug;
    

    /**
     * Holds the error logs
     *
     * @var string
     */
    public $log;


    /**
     * Plugins settings array
     *
     * @var array
     */
    public $options = array();


    /**
     * Table prefix
     *
     * @var var
     */
    public $prefix;


    /**
     * Plugin dir path
     *
     * @var string
     */
    public $plugin_dir;


    /**
     * Initialization constructor
     *
     * @param none
     * @return void
     */
    public function __construct()
    {
        // Some default values of the class        
        $this->log = TRUE;
        $this->debug = TRUE;
        //$this->plugin_dir = __FILE__;
    }

    
    /**
     * Fire on plugin activation
     *
     * @param none
     * @return none
     */
    abstract protected function activate();

    /**
     * Fire on plugin deactivation
     *
     * @param none
     * @return boolean
     */
    abstract protected function deactivate();
    
    
    /**
     * Fire on unistalling plugin
     *
     * @param none
     * @return boolean
     */
    abstract protected function uninstall();
    

    
}
