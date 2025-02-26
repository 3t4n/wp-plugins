<?php
/*
 * Plugin Name: Adzapier GDPR CCPA compliance
 * Description: This plugin provides you with the easiest way to insert the JavaScript for implementing Adzapier’s Cookie Banner and providing the network path to get cookie consent records from your website users.
 * Version: 1.0.0
 * Author: Adzapier, Llc
 * Author URI: https://adzapier.com/
 * Text Domain: adzapier-gdpr
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */
if ( ! defined( 'Adzapier_GDPR_Path' ) )
    define( 'Adzapier_GDPR_Path', plugin_dir_path( __FILE__ ) );

/**
 * Main plugin class.
 */
class Adzapier_GDPR {

    private static $instance;

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct(){
        add_action( 'plugin_action_links_' . plugin_basename(__FILE__), array($this, 'plugin_action_links') );
        add_action('admin_enqueue_scripts',array(&$this, 'add_js_code_scripts' ));
        add_action('admin_menu',array(&$this, 'add_js_code_page_settings' ));
        add_action('wp_head',array(&$this, 'add_js_code_in_head' ));
    }
    public function add_js_code_in_head(){
        if(get_option('_adzapier_js_code')){
            $_adzapier_js_code = get_option('_adzapier_js_code');
            if($_adzapier_js_code) echo html_entity_decode(esc_js($_adzapier_js_code));
        }
    }
    public function add_js_code_scripts(){
        if($_GET['page'] != 'adzapier-gdpr') return;

        wp_enqueue_style( 'adzapier-gdpr-css', plugins_url('assets/adzapier-gdpr.css', __FILE__), array(), '1.0.6', 'all');
    }
    public function add_js_code_page_settings(){
        add_submenu_page(
            'options-general.php',
            'Adzapier GDPR',
            'Adzapier GDPR',
            'manage_options',
            'adzapier-gdpr',
            array(&$this,'wp_js_code_callback'));
    }
    public function applyActions($action,$data){
        if(empty($action)) return array('status'=>false,'msg'=>"Error occurred! Form has no action.");;
        switch ($action){
            case 'insertjs' : {
                $is_nonce_valid = ( isset( $data['wp_js_code_insert_nonce'] ) && wp_verify_nonce( $data['wp_js_code_insert_nonce'], 'wp_js_code_' . $data['_nonce_id'] ) ) ? true : false;
                if(!$is_nonce_valid) return array('status'=>false,'msg'=>"Error occurred! Form not secure.");

                $_head_js_code = $data['_head_js_code'];
                if ( current_user_can('unfiltered_html') )
                    $_head_js_code = stripslashes($_head_js_code);
                else
                    $_head_js_code = wp_filter_post_kses($_head_js_code);

                update_option('_adzapier_js_code',$_head_js_code);
                return array('status'=>1,'msg'=>"JS Code saved successfully.");

                break;
            }
        }
        return array('status'=>false,'msg'=>"Error occurred!");
    }
    public function wp_js_code_callback(){
        $response = null;
        if($_REQUEST['frm-action']){ /*Apply Form Action*/
            $action = sanitize_text_field($_REQUEST['frm-action']);
            $response = $this->applyActions($action,$_REQUEST);
        }

        $_adzapier_js_code = NULL;
        if(get_option('_adzapier_js_code')){
            $_adzapier_js_code = get_option('_adzapier_js_code');
            $_adzapier_js_code = format_to_edit($_adzapier_js_code);
        }

        include_once dirname(__FILE__)."/admin.php";
    }

    public function plugin_action_links($links){
        unset( $links['edit'] );
        $links['manage'] = '<a href="' . admin_url('options-general.php?page=adzapier-gdpr') . '">'.__('Settings', 'adzapier-gdpr').'</a>';
        return $links;
    }
}
add_action( 'plugins_loaded', array( 'Adzapier_GDPR', 'getInstance' ) );
?>