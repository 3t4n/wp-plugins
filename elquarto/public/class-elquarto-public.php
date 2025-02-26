<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://elquarto.com
 * @since      1.0.0
 *
 * @package    ElQuarto
 * @subpackage ElQuarto/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    ElQuarto
 * @subpackage ElQuarto/public
 * @author     Tango Bravo<pz@tangobravo.com.br>
 */
class ElQuarto_Public
{
    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**     *
     * @since    1.0.0
     * @access   private
     * @var      string    $options
     */
    private $options;

    /**     *
     * @since    1.0.0
     * @access   private
     * @var      string    $option_name
     */
    private $option_name = 'elquarto';

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of the plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {
        $this->options = get_option('elquarto');

        $this->plugin_name = $plugin_name;
        $this->version = $version;

    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {
        wp_enqueue_style($this->plugin_name . 'public', plugin_dir_url(__FILE__) . 'css/public.css', array(), $this->version, 'all');
        wp_enqueue_style($this->plugin_name . 'fonts', plugin_dir_url(__FILE__) . 'css/fonts.css', array(), $this->version, 'all');
    }

    public function elquarto_public_add_shortcodes()
    {
        add_shortcode('elquarto_shortcode', array($this, $this->option_name . '_display_shortcode'));
    }

    public function elquarto_display_shortcode($attrs = array())
    {
        $elquarto_options = $this->options;
        $elquarto_public_path = plugin_dir_url(__FILE__);

        ob_start();

        if(isset($attrs['theme']) && $attrs['theme'] == 'widget')
            include 'partials/elquarto-public-display-widget.php';

        $content = ob_get_clean();

        return $content;
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {
        wp_register_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/public.js');
        wp_register_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/serialize-0.2.min.js');

        wp_localize_script(
            $this->plugin_name,
            'elquarto',
            array('plugin_dir' => plugin_dir_url(__FILE__))
        );

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/public.js', array(), $this->version, 'all');
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/serialize-0.2.min.js', array(), $this->version, 'all');
    }
}


