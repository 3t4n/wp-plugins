<?php

class ZCForm_Base{

    protected $loader;
    protected $plugin_name;
    protected $version;

    public function __construct(){

        if(defined('ZCFORM_PLUGIN_NAME_VERSION')){
            $this->version = ZCFORM_PLUGIN_NAME_VERSION;
        }else{
            $this->version = '1.0.0';
        }

        if(defined('ZCFORM_PLUGIN_NAME')){
            $this->plugin_name = ZCFORM_PLUGIN_NAME;
        }else{
            $this->plugin_name = 'contact-form-z';
        }

        $this->load_dependencies();
        $this->set_locale();
        $this->define_admin_hooks();
        $this->define_public_hooks();
    }

    private function load_dependencies(){

        require_once plugin_dir_path(dirname(__FILE__)).'includes/class-'.ZCFORM_PLUGIN_NAME.'-loader.php';
        require_once plugin_dir_path(dirname(__FILE__)).'includes/class-'.ZCFORM_PLUGIN_NAME.'-i18n.php';
        require_once plugin_dir_path(dirname(__FILE__)).'includes/class-'.ZCFORM_PLUGIN_NAME.'-static.php';
        require_once plugin_dir_path(dirname(__FILE__)).'includes/class-'.ZCFORM_PLUGIN_NAME.'-ajax.php';
        require_once plugin_dir_path(dirname(__FILE__)).'admin/class-'.ZCFORM_PLUGIN_NAME.'-admin.php';
        require_once plugin_dir_path(dirname(__FILE__)).'admin/includes/class-'.ZCFORM_PLUGIN_NAME.'-editor.php';
        require_once plugin_dir_path(dirname(__FILE__)).'admin/includes/class-'.ZCFORM_PLUGIN_NAME.'-table.php';
        require_once plugin_dir_path(dirname(__FILE__)).'public/class-'.ZCFORM_PLUGIN_NAME.'-public.php';

        $this->loader = new ZCForm_Loader();
    }

    private function set_locale(){

        $plugin_i18n = new ZCForm_i18n();

        $this->loader->add_action('plugins_loaded', $plugin_i18n, 'load_plugin_textdomain');
    }

    private function define_admin_hooks(){

        $plugin_admin = new ZCForm_Admin($this->get_plugin_name(), $this->get_version());

        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');

        $this->loader->add_action('admin_menu', $plugin_admin, 'zcform_create_admin_menu');

        new ZCForm_Ajax(
            [
                'save_form' => true, 
                'delete_form' => true, 
                'restore_form' => true, 
                'copy_form' => true, 
                'save_recaptcha' => true,
                'load_report' => true,
                'get_template' => true,
                'check_mail' => true,
                'math_captcha' => false
            ]
            );
    }

    private function define_public_hooks(){

        $plugin_public = new ZCForm_Public($this->get_plugin_name(), $this->get_version());
        
        
        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');

        add_shortcode(ZCFORM_PLUGIN_NAME_ABBR, [$plugin_public, 'zcform_shortcode']);
        $this->loader->add_filter('the_content', $plugin_public, 'zcform_content');
        
         new ZCForm_Ajax(['send_form' => false, 'math_captcha' => false]);
        
    }

    public function run(){
        $this->loader->run();
    }

    public function get_plugin_name(){
        return $this->plugin_name;
    }

    public function get_loader(){
        return $this->loader;
    }
    
    public function get_version(){
        return $this->version;
    }

}
