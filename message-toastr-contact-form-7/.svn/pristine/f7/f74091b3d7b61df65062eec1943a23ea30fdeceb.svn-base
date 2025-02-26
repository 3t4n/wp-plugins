<?php
/**
* Plugin Name: Message by Toastr for Contact Form 7
* Description: Display Toastr success fail and others message For Contact Form 7.
* Version: 1.0.6
* Author: Delowar Hossen
* Author URI: https://www.aimsdevelop.com/
* Requires at least: 4.6
* Tested up to: 6.5
* Text Domain: message-toastr-contact-form-7
* Domain Path: /lang/
* License: GPLv2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
    require_once __DIR__ . '/vendor/autoload.php';
}


/**
 * initial main class
 */

final class Aims_cf7_js {

    const version = '1.0.6';

    /*
    * class contrator
    */
    private function __construct(){
        // code...
        $this->define_constant();

        if ( ! class_exists('WPCF7') ) {
            add_action('admin_notices',  [ $this, 'Aims_cf7_inactive_notice' ] );
            return;
        }

        register_activation_hook(__FILE__, [ $this, 'activate' ]);

        add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );
        add_action( 'activated_plugin', [ $this, 'Aims_cf7_activation_redirect' ] );
        add_action( 'plugins_loaded', [ $this, 'load_textdomain' ] );

    }

    /*
    * init instance
    */
    public static function init (){

        static $instance = false;

        if( ! $instance ){
            $instance = new self();
        }

        return $instance;

    }

    public function define_constant(){

        if ( ! defined( 'Aims_cf7_VERSION' ) )
            define('Aims_cf7_VERSION', self::version);

        if ( ! defined( 'Aims_cf7_FILE' ) )
            define('Aims_cf7_FILE', __FILE__);

        if ( ! defined( 'Aims_cf7_PATH' ) )
            define('Aims_cf7_PATH', __DIR__);

        if ( ! defined( 'Aims_cf7_URL' ) )
            define('Aims_cf7_URL', plugins_url('', Aims_cf7_FILE ));

        if ( ! defined( 'Aims_cf7_ASSETS' ) )
            define('Aims_cf7_ASSETS', Aims_cf7_URL. '/assets');

    }

    public function load_textdomain() {

        load_plugin_textdomain( 'message-toastr-contact-form-7', false, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );

    }

    /**
     * Initialize the plugin
     * 
     * */
    public function init_plugin(){

        new Aims\Aims_cf7\Assets();

        if( is_admin() ){
            new Aims\Aims_cf7\Admin();
        }

    }

    public function activate(){

       $installer = new Aims\Aims_cf7\Installer();
       $installer->run();
        
    }


    public function Aims_cf7_activation_redirect( $plugin ) {
        if( $plugin == plugin_basename( __FILE__ ) ) {
            exit( wp_redirect( esc_url( admin_url('admin.php?page=aims-cf7-admin') ) ) );
        }
    }

    public function Aims_cf7_inactive_notice(){

        if (current_user_can('activate_plugins')) :

            if ( ! class_exists('WPCF7') ) :
                deactivate_plugins(plugin_basename(__FILE__));
                ?>
                <style>
                    .updated {
                        display: none;
                    }
                </style>
                <div id="message" class="error">
                    <p>
                        <?php
                        printf(
                            esc_html('%1$s Message by Toastr for Contact Form 7 Requires Contact Form 7. %2$s %3$s Contact Form 7 %4$s must be active for Message by Toastr for Contact Form 7 to work. Please install & activate Contact Form 7.', 'message-toastr-contact-form-7' ),
                            '<strong>',
                            '</strong><br>',
                            '<a href="https://wordpress.org/plugins/contact-form-7/" target="_blank" >',
                            '</a>'
                        );
                        ?>
                    </p>
                </div>
                <?php

            endif;

        endif;

    }

}

/**
 * initializes the plugin
 */
if(!function_exists('Aims_cf7_js_init')){
    function Aims_cf7_js_init(){
        return Aims_cf7_js::init();
    }
}
Aims_cf7_js_init();
