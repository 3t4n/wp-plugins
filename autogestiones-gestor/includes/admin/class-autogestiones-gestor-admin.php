<?php


if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Admin-facing functionality of the plugin.
 *
 * @link       https://autogestiones.net
 * @since      1.0.0
 *
 * @package    Autogestiones_Plugin
 * @subpackage Autogestiones_Plugin/admin
 */

class Autogestiones_Plugin_Admin
{
    /**
     * El identificador único del plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    El identificador único del plugin.
     */
    private $plugin_name;

    /**
     * La versión actual del plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    La versión actual del plugin.
     */
    private $version;

    /**
     * Inicializa la clase y establece sus propiedades.
     *
     * @since    1.0.0
     * @param    string    $plugin_name       El nombre del plugin.
     * @param    string    $version    La versión actual del plugin.
     */
    public function __construct($plugin_name, $version)
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Registra los estilos y scripts del plugin para la sección de administración.
     *
     * @since    1.0.0
     */
    public function enqueue_styles_and_scripts()
    {
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/autogestiones-gestor-admin.css', array(), $this->version, 'all');
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/autogestiones-gestor-admin.js', array('jquery'), $this->version, false);

    }

    /**
     * Agrega una página de opciones para el plugin.
     *
     * @since    1.0.0
     */
    public function add_plugin_options_page()
    {
        $svg_url = plugin_dir_url(__FILE__) . 'img/icon-ag.svg';

        add_menu_page(
            'Mi Autogestiones',
            'Mi Autogestiones',
            'manage_options',
            $this->plugin_name,
            array($this, 'display_plugin_options_page'),
            $svg_url, // Use the URL directly here
            '1'
        );

        add_submenu_page(
            $this->plugin_name,
            'Agregar Cuenta de Autogestiones Cloud',
            'Agregar Cuenta de Autogestiones Cloud',
            'manage_options',
            'autg_plugin_options',
            array($this, 'display_plugin_options_page'),
        );


        add_submenu_page(
            $this->plugin_name,
            'Productos',
            'Productos',
            'manage_options',
            'https://app.autogestiones.net/ventas/productos/',
        );


        add_submenu_page(
            $this->plugin_name,
            'Clientes',
            'Clientes',
            'manage_options',
            'https://app.autogestiones.net/ventas/personas/clientes/',
        );

        add_submenu_page(
            $this->plugin_name,
            'Listado de Precios',
            'Listado de Precios ',
            'manage_options',
            'https://app.autogestiones.net/ventas/listado-de-precios/',
        );

        add_submenu_page(
            $this->plugin_name,
            'Vendedores',
            'Vendedores',
            'manage_options',
            'https://app.autogestiones.net/ventas/vendedores/',
        );

        add_submenu_page(
            $this->plugin_name,
            'Comprobantes de Venta',
            'Comprobantes de Venta',
            'manage_options',
            'https://app.autogestiones.net/ventas/comprobantes/',
        );

        add_submenu_page(
            $this->plugin_name,
            'Cobros',
            'Cobros',
            'manage_options',
            'https://app.autogestiones.net/ventas/cobros/',
        );

        add_submenu_page(
            $this->plugin_name,
            'Configurar',
            'Configurar',
            'manage_options',
            'https://app.autogestiones.net/integraciones/woocommerce/configuracion/',
        );


        /* add_options_page(
            'Autogestiones Gestor Options',
            'Autogestiones Gestor',
            'manage_options',
            $this->plugin_name,
            array($this, 'display_plugin_options_page')
        ); */
    }

    /**
     * Muestra la página de opciones del plugin.
     *
     * @since    1.0.0
     */
    public function display_plugin_menu_page()
    {
        // Carga los valores de opciones actuales.
        $options = get_option('autg_plugin_options');

        // Carga la plantilla para la página de opciones.
        require_once plugin_dir_path(__FILE__) . 'partials/autogestiones-gestor-admin-display.php';
    }


    /**
     * Muestra la página de opciones del plugin.
     *
     * @since    1.0.0
     */
    public function display_plugin_options_page()
    {
        // Carga los valores de opciones actuales.
        $options = get_option('autg_plugin_options');

        // Carga la plantilla para la página de opciones.
        require_once plugin_dir_path(__FILE__) . 'partials/autogestiones-gestor-admin-display.php';
    }

    /**
     * Registra los campos de opciones del plugin.
     *
     * @since    1.0.0
     */
    /**
     * Registra los campos de opciones del plugin.
     *
     * @since    1.0.0
     */
    public function register_plugin_options()
    {
        // Registra la sección de opciones del plugin.
        register_setting('autg_plugin_options', 'autg_plugin_options', 'autg_plugin_validate_options');
    }

    /**
     * Callback para la sección de opciones del plugin.
     *
     * @since    1.0.0
     */
    public function settings_section_callback()
    {
        echo 'Configure las opciones del plugin';
    }

    public function init()
    {
        // Registra los estilos y scripts del plugin.
        add_action('admin_enqueue_scripts', array($this, 'enqueue_styles_and_scripts'));

        // Agrega la página de opciones del plugin.
        add_action('admin_menu', array($this, 'add_plugin_options_page'));

        // Registra los campos de opciones del plugin.
        add_action('admin_init', array($this, 'register_plugin_options'));
    }



}