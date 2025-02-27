<?php

namespace managerForIcomoon ; 

class Scripts {
    private $icomoon_url ;
    private $icomoon_path ;
    private $icomoon_file ;

	public function __construct(){
        
        if(file_exists(Core::getIcomoonPath().'style.min.css') &&  Options::get('minify_css') == 'yes'){
            $this->icomoon_file = 'style.min.css';
        } else {
            $this->icomoon_file = 'style.css';
        }

        if(is_admin()){
            // Load admin CSS & JS
            add_action('admin_enqueue_scripts', array($this,'load_admin_style') );
            add_action('admin_enqueue_scripts', array($this,'load_admin_js') );

            // Load Icomoon in editor/backoffice
            add_action('enqueue_block_assets', array($this, 'load_icomoon'), 999); 
            add_action('admin_enqueue_scripts', array($this,'load_icomoon') );
        } else {
            // Load Icomoon
            add_action('wp_enqueue_scripts', array($this,'load_icomoon') );
        }
        
	}

    public function load_admin_style() {
        wp_enqueue_style('managerforicomoon', Core::getUrl('css/style_admin.min.css'), array(), filemtime(Core::getPath('css/style_admin.min.css')), false);
    } 
        
    public function load_admin_js(){
        wp_enqueue_script('managerforicomoon', Core::getUrl('js/javascript_admin.js'), array('jquery','wp-color-picker'), filemtime(Core::getPath('/js/javascript_admin.js')));
        wp_localize_script('managerforicomoon', 'managerforicomoon', array(
            'ajaxurl'  => admin_url('admin-ajax.php'),
            'siteurl'  => site_url(),
            'shortcode' => Options::get('shortcode')
        ));
    }

	public function load_icomoon() {
        wp_enqueue_style('managerforicomoon-icomoon', Core::getIcomoonUrl().$this->icomoon_file , array(), filemtime(Core::getIcomoonPath().$this->icomoon_file), false);
    }
}





