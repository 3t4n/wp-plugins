<?php

namespace GenieImageAi\App\Providers;

defined( 'ABSPATH' ) || exit;
class EnqueueProvider
{

    public function __construct()
    {
        add_action('init', function () {
            if (!is_user_logged_in() || !current_user_can('publish_posts')) {
                return;
            }

            
            add_action('admin_enqueue_scripts', [$this, 'addEnqueue']);

            add_action('admin_enqueue_scripts', [$this, 'globalScripts']);
        });
    }
    public function is_exist_script($id)
	{
		global $wp_scripts;

		if (false == $wp_scripts->queue) {
			return false;
		}

		foreach ($wp_scripts->queue as $handle) {
			$obj = $wp_scripts->registered[$handle];
			$name = $obj->handle;
			$version = $obj->ver;

			if ($name == $id) {
				return true;
			}
		}

        return false;
	}

    public function addEnqueue()
    {
        
        $current_screen = get_current_screen();

        if(is_admin()){
            $deps = ['wp-plugins', 'wp-i18n', 'wp-element', 'wp-dom', 'wp-data'];

            if(!$this->is_exist_script('getgenie-antd-scripts-js')){
                wp_enqueue_script( 'getgenie-antd-scripts-js', GENIEIMAGE_URL . 'assets/dist/admin/js/antd'.GENIEIMAGE_DEBUG_SCRIPT_SUFFIX.'.js', $deps, GENIEIMAGE_VERSION, true );
            }
            
           wp_enqueue_script( 'genieimage-handler-scripts', GENIEIMAGE_URL . 'assets/dist/admin/js/app-handler'.GENIEIMAGE_DEBUG_SCRIPT_SUFFIX.'.js', $deps, GENIEIMAGE_VERSION, true );
           wp_enqueue_script( 'genieimage-common-scripts', GENIEIMAGE_URL . 'assets/dist/admin/js/common-scripts'.GENIEIMAGE_DEBUG_SCRIPT_SUFFIX.'.js', ['genieimage-handler-scripts'], GENIEIMAGE_VERSION, true );
            
            wp_enqueue_script( 'genieimage-admin-scripts', GENIEIMAGE_URL . 'assets/dist/admin/js/main-app-integration'.GENIEIMAGE_DEBUG_SCRIPT_SUFFIX.'.js', ['genieimage-common-scripts','media-views'], GENIEIMAGE_VERSION, true );
            wp_enqueue_style( 'genieimage-fonts-style', GENIEIMAGE_URL . 'assets/dist/admin/styles/wp-font-family.css', [], GENIEIMAGE_VERSION );
        }
    }

    public function globalScripts()
    {
        
        wp_enqueue_style( 'genieimage-icon-style', GENIEIMAGE_URL . 'assets/dist/admin/styles/icon-pack.css', [], GENIEIMAGE_VERSION );
        wp_enqueue_style( 'genieimage-admin-global-style', GENIEIMAGE_URL . 'assets/dist/admin/styles/admin'.GENIEIMAGE_DEBUG_SCRIPT_SUFFIX.'.css', [], GENIEIMAGE_VERSION );
    }

    public function elementorEditorStyle(){
        wp_enqueue_style( 'genieimage-editor-style', GENIEIMAGE_URL . 'assets/dist/admin/styles/elementor.css', [], GENIEIMAGE_VERSION );
    }

}

