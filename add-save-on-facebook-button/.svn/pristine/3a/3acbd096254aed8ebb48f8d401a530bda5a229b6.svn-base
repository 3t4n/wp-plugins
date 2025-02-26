<?php

class SaveOnFacebook {
    
    protected $loader;
    
    protected $version;
    
    protected $pluginPath;
    
    protected $pluginUrl;
    
    public function __construct() {
        
        $this->version = '1.0.0';
        
        $this->plugin_slug = 'add-save-on-facebook-button';
        
        $this->load_dependencies();
        
        $this->define_admin_hooks();
        
        $this->pluginPath = SaveButtonPluginPath . 'add-save-on-facebook-button';
        
        $this->pluginUrl = WP_PLUGIN_URL . '/add-save-on-facebook-button';
    }
    
    private function get_version() {
        return $this->version;
    }
    
    private function load_dependencies() {
        require_once plugin_dir_path(SaveButtonPluginPath) . 'add-save-on-facebook-button/admin/save-on-facebook-admin.php';
        
        require_once plugin_dir_path(SaveButtonPluginPath) . 'add-save-on-facebook-button/includes/save-on-facebook-loader.php';
        $this->loader = new SaveOnFacebookLoader();
    }
    
    private function define_admin_hooks() {
        $admin = new SaveOnFacebookAdmin($this->get_version());
        
        $this->loader->add_action('admin_menu', $admin, 'addAdminMenu');
        $this->loader->add_action('admin_init', $admin, 'initDisplayOptions');
        $this->loader->add_action('admin_init', $admin, 'initFacebookOptions');
        $this->loader->add_action('admin_enqueue_scripts', $admin, 'enqueueStyles');
        
    }
    
    public function run() {
        $this->loader->add_action('the_content', $this, 'displayButton');
        $this->loader->add_action('wp_enqueue_scripts', $this, 'addPluginStyles');

        $this->loader->run();
        
        
    }
    
    public function checkFacebookSdk() {
        $options = get_option('sof-facebook');
        if (isset($options['sof-sdk'])) {
            $fbSdk = $options['sof-sdk'];
            
            if ($fbSdk == 1) {
                return true;
            } else {
                return false;
            }
        }
    }
    
    public function displayButton($content) {
        
        if (!$this->checkPostType()) {
            return $content;
        }
        
        $currentUrl = get_permalink();
        $options = get_option('sof-section');
        $buttonSize = $options['button-size'];
        $buttonPosition = $options['button-position'];
        $buttonAlignment = $options['button-alignment'];
        $button = '<div class="sof-button sof-position-' . $buttonPosition . ' sof-align-' . $buttonAlignment . '">';
        $button .= '<div class="fb-save" data-uri="' . $currentUrl . '" data-size="' . $buttonSize . '"></div>';
        $button .= '</div>';
        
        if ($buttonPosition == 'top') {
            $content = $button . $content;
        } else {
            $content = $content . $button;
        }
        
        return $content;
    }
    
    public function addPluginStyles() {
        
        wp_enqueue_style('save-on-facebook', plugins_url('add-save-on-facebook-button/css/save-on-facebook.css'));
        if ($this->checkFacebookSdk()) {
            wp_enqueue_script('facebook-sdk', plugins_url('add-save-on-facebook-button/includes/js/facebookSdk.js'));
            
            $lang = get_option('sof-facebook')['sof-lang'];
            
            wp_localize_script('facebook-sdk', 'lang', $lang);
        }
    }
    
    public function checkPostType() {
        $postType = get_post_type();
        
        $options = get_option('sof-section');
        $postOption = $options['post-type-post'];
        $pageOption = $options['post-type-page'];
        
        if ($postOption == $postType || $pageOption == $postType) {
            return true;
        } else {
            return false;
        }
    }
}

