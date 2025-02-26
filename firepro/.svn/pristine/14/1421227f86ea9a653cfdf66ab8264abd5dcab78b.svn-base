<?php
/**
 * Plugin Name:     Firepro
 * Description:     Add animations to your site with Firepro blocks
 * Version:         0.1.0
 * Author:          FirePro
 * License:         GPL-2.0-or-later
 * License URI:     https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:     firepro
 *
 * @package         firepro
 */

namespace firepro;

require 'includes/template_manager.php';


// Add Template API
add_action( 'rest_api_init', function() {
  register_rest_route( 'firepro', 'templates', array(
    'methods' => ['GET', 'POST'],
    'callback' => 'FirePro_Templates',
    'permission_callback' => function () {
      return current_user_can( 'edit_posts' );
    }
  ));
});

// Add Custom Javascript To Front End
add_action( 'wp_enqueue_scripts', function($hook) {
  $pluginFolderName = substr(plugin_basename( __FILE__ ), 0, -11);
  wp_enqueue_script( 'firepro_js', plugins_url() . '/' . $pluginFolderName . 'frontend.js' );
});
add_action('wp_head', function(){
  echo '<style>.FP_hide{position: absolute; width: 100%; height: 100%; top: 0; left: 0; pointer-events: none; visibility: hidden;}</style>';
});


/**
 * Get an api key if provided by the user, otherwise use temp key
 *
 */
function get_firepro_api_key(){
  $api_key = get_option( "firepro_api_key" );
  if($api_key == ""){ $api_key = get_option( "firepro_temp_key" ); }
  if($api_key == ""){
    // Create Temp Access Key
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < 12; $i++) {
       $index = rand(0, strlen($characters) - 1);
       $randomString .= $characters[$index];
    }
    $randomString = "firepro_temp_key" . $randomString;
    add_option( "firepro_temp_key", $randomString );
  }
  return $api_key;
}

/**
 * Load & Build all files requried for the plugin
 *
 */
class Loader
{
    var $dir;

    public function __construct()
    {
        $this->dir = dirname(__FILE__);
        spl_autoload_register(array($this, 'loader')); // Load Includes Folder
        add_action('init', array($this, 'firepro_block_init')); // Init Gutenburg Block
        add_action( 'enqueue_scripts', array($this, 'script_enqueue' )  );
        add_action( 'enqueue_block_editor_assets', array($this, 'sidebar_plugin_script_enqueue' ) );

        new Api();
    }


    public function loader($className)
    {
        $className = str_replace('_', '-', strtolower($className));
        $className = str_replace(__NAMESPACE__ . '\\', '', $className);
        $filepath = $this->dir . '/includes/class-' . $className . '.php';
        if (file_exists($filepath)) {
            require $filepath;
        }
    }

    /**
     * Registers all block assets so that they can be enqueued through the block editor
     * in the corresponding context.
     *
     * @see https://developer.wordpress.org/block-editor/tutorials/block-tutorial/applying-styles-with-stylesheets/
     */
    public function firepro_block_init()
    {
        new Settings();

        $script_asset_path = "$this->dir/build/index.asset.php";
        if (!file_exists($script_asset_path)) {
            throw new Error(
                'You need to run `npm start` or `npm run build` for the "firepro/firepro" block first.'
            );
        }
        $index_js = 'build/index.js';
        $script_asset = require($script_asset_path);
        wp_register_script(
            'firepro-firepro-block-editor', // Name of script
            plugins_url($index_js, __FILE__), // Script Source, Builds a path to index.js
            $script_asset['dependencies'],
            $script_asset['version']
        );

        $js_api_key = get_firepro_api_key();
        wp_localize_script( 'firepro-firepro-block-editor', 'firepro', $js_api_key );
        wp_localize_script( 'firepro-firepro-block-editor', 'firepro_status', get_option( "firepro_pro_status" ) );
        $nonce = wp_create_nonce( 'wp_rest' );
        wp_localize_script( 'firepro-firepro-block-editor', 'firepro_nonce', $nonce );
        wp_localize_script( 'firepro-firepro-block-editor', 'firepro_wpURL', get_site_url() );
        add_action('wp_head', function(){
          echo '<script> var firepro = "'.get_firepro_api_key().'"; </script>';
        });


        $editor_css = 'build/index.css';
        wp_register_style(
            'firepro-firepro-block-editor',
            plugins_url($editor_css, __FILE__),
            array(),
            filemtime("$this->dir/$editor_css")
        );

        $style_css = 'build/style-index.css';
        wp_register_style(
            'firepro-firepro-block',
            plugins_url($style_css, __FILE__),
            array(),
            filemtime("$this->dir/$style_css")
        );

        register_block_type('firepro/firepro', array(
            'editor_script' => 'firepro-firepro-block-editor',
            'editor_style' => 'firepro-firepro-block-editor',
            'style' => 'firepro-firepro-block',
        ));

        /*
        Plugin Name: Sidebar plugin
        */
        wp_register_script(
            'firepro-sidebar-js',
            plugins_url('src/sidebar.js', __FILE__),
            array('wp-plugins', 'wp-edit-post', 'wp-element')
        );


    }
    public function script_enqueue()
    {

        wp_enqueue_script('firepro-js',
            'https://cdn.firepro.io/releases/firepro.js'
        );
        $data['value'] = 'wwwww';
        wp_localize_script( 'firepro-js', 'firepro', $data );

    }
    public function sidebar_plugin_script_enqueue()
    {
        wp_enqueue_script('firepro-sidebar-js');
    }
}

new Loader();
