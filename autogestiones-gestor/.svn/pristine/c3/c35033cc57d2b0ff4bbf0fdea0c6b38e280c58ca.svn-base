<?php
/**
 * Plugin Name: Autogestiones Gestor
 * Plugin URI: https://www.autogestiones.net/integraciones/woocommerce
 * Description: Plugin para autogestiones.
 * Version: 1.0.4
 * Author: Autogestiones
 * Author URI: https://autogestiones.net/
 * Text Domain: autogestiones-gestor
 * Domain Path: /languages/ COMING SOON
 *
 * @package Autogestiones_Plugin
 */

if (!defined('ABSPATH')) {
    exit;
}

// Define la constante del directorio base del plugin.
define('AUTOGESTIONES_PLUGIN_DIR', plugin_dir_path(__FILE__));
//define('AUTOGESTIONES_REDIRECT_URL', "https://f343-2800-2260-4080-d06-4bf2-8169-974d-5d90.ngrok-free.app");
define('AUTOGESTIONES_REDIRECT_URL', "https://api.autogestiones.net");

// Incluye los archivos del plugin.
require_once AUTOGESTIONES_PLUGIN_DIR . 'includes/admin/class-autogestiones-gestor-admin.php';
require_once AUTOGESTIONES_PLUGIN_DIR . 'includes/public/class-autogestiones-gestor-public.php';
require_once AUTOGESTIONES_PLUGIN_DIR . 'includes/public/autogestiones-gestor-functions.php';

// Crea una instancia de la clase principal del plugin.
function autg_run_plugin()
{
    $plugin = new Autogestiones_Plugin();
    $plugin->run();
}
autg_run_plugin();

class Autogestiones_Plugin
{

    private $plugin_name;
    private $plugin_version;

    /**
     * Constructor de la clase Autogestiones_Plugin.
     */
    public function __construct()
    {
        $this->plugin_name = 'autogestiones-gestor';
        $this->plugin_version = '1.0.4';
        add_action('rest_api_init', array($this, 'autg_plugin_register_api'));
    }

    public function autg_plugin_register_api()
    {
        register_rest_route('wc/v3', '/autogestiones-gestor/manage', array(
            'methods' => 'POST',
            'callback' => array($this, 'autg_plugin_api_callback_post'),
        )
        );

        register_rest_route('wc/v3', '/autogestiones-gestor/manage', array(
            'methods' => 'GET',
            'callback' => array($this, 'autg_plugin_api_callback_get'),
        )
        );
    }

    public function autg_plugin_api_callback_post($request)
    {
        if (!current_user_can('manage_options')) {
            return new WP_Error('rest_forbidden', esc_html__('No tienes permisos para acceder a esta ruta.'), array('status' => 401));
        }

        $params = $request->get_params();
        $documentNo = isset($params['documentNo']) ? $params['documentNo'] : '';
        $documentTypeId = isset($params['documentTypeId']) ? $params['documentTypeId'] : '';
        $documentTypeName = isset($params['documentTypeName']) ? $params['documentTypeName'] : '';
        $denomination = isset($params['denomination']) ? $params['denomination'] : '';
        $countryName = isset($params['countryName']) ? $params['countryName'] : '';
        $fieldCustomName = isset($params['fieldCustomName']) ? $params['fieldCustomName'] : '';
        $autoId = isset($params['autoId']) ? $params['autoId'] : '';

        // Guardar los valores en la opción del plugin
        $options = get_option('autg_plugin_options');
        $options['autoId'] = $autoId;
        $options['fieldCustomName'] = $fieldCustomName;
        $options['documentTypeName'] = $documentTypeName;
        $options['documentNo'] = $documentNo;
        $options['documentTypeId'] = $documentTypeId;
        $options['denomination'] = $denomination;
        $options['countryName'] = $countryName;
        update_option('autg_plugin_options', $options);

        $response = array(
            'status' => 'success',
            'message' => 'La API ha recibido la solicitud correctamente.',
        );

        return $response;
    }


    public function autg_plugin_api_callback_get($request)
    {
        $response = array(
            'status' => 'success',
            'message' => 'La API ha recibido la solicitud correctamente.',

        );
        return $response;
    }



    /**
     * Inicializa el plugin.
     */
    public function run()
    {
        // Agrega los hooks necesarios para el plugin.
        add_action('init', array($this, 'init'));
    }

    /**
     * Inicializa el plugin.
     */
    public function init()
    {
        // Agrega los hooks necesarios para la sección pública del plugin.
        if (class_exists('Autogestiones_Plugin_Public')) {
            $plugin_public = new Autogestiones_Plugin_Public($this->get_plugin_name(), $this->get_plugin_version());
            $plugin_public->init();
        }

        // Agrega los hooks necesarios para la sección de administración del plugin.
        if (class_exists('Autogestiones_Plugin_Admin')) {
            $plugin_admin = new Autogestiones_Plugin_Admin($this->get_plugin_name(), $this->get_plugin_version());
            $plugin_admin->init();
        }
    }

    /**
     * Devuelve el nombre del plugin.
     */
    public function get_plugin_name()
    {
        return $this->plugin_name;
    }

    /**
     * Devuelve la versión del plugin.
     */
    public function get_plugin_version()
    {
        return $this->plugin_version;
    }
}