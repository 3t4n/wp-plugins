<?php
/**
* Atom Featured Image options
*
* @package Atom Featured Image
* @since  1.0.0
**/
namespace AtomFeaturedImage;

/*
* Options (singleton)
* @since  1.0.0
*/
class Options
{
    /*
	* Singleton instance of this class
	* @since    1.0.0
	* @access   protected
	* @var      object    $_instance    Singleton instance of this class
	*/
    protected static $_instance = null;

    /*
	* Array with the option of this plugin
	* @since    1.0.0
	* @access   private
	* @var      array    $options    Array with the option of this plugin
	*/
    private $options = null;


    /*
    * The the singleton instance
    * @since  1.0.0
    */
    public static function get_instance()
    {
        if (null === self::$_instance)
            self::$_instance = new self;

        return self::$_instance;
    }


    /*
    * Protected clone function due to singleton use
    * @since  1.0.0
    */
    protected function __clone()
    {
    }


    /*
    * Protected constructor due to singleton use
    * @since  1.0.0
    */
    protected function __construct()
    {
        $options = get_option('atom_featured_image', array());
        $this->options = $options;
    }


    /*
    * Get an option; returning default value if not found
    * @since  1.0.0
    * @param    string    @name     The option's name
    * @param    string    @default  Default value if option not found
    */
    public function get($name, $default = null)
    {
        if ($this->exists($name))
            return $this->options[$name];

        return $default;
    }


    /*
    * Check if option with this name exists
    * @since  1.0.0
    * @param    string    @name    The option's name
    */
    public function exists($name)
    {
        return isset($this->options[$name]);
    }


    /*
    * Set option
    * @since  1.0.0
    * @param    string    @name     The option's name
    * @param    string    @value    Value for the option
    */
    public function set($name, $value)
    {
        $this->options[$name] = $value;
    }


    /*
    * Force options to be saved
    * @since  1.0.0
    */
    public function flush()
    {
        update_option('atom_featured_image', $this->options);
    }
}
