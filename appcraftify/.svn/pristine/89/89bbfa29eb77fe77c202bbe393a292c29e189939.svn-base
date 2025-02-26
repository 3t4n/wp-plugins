<?php

namespace AppCraftify\Classes;

class LoadAssets
{
    public function admin()
    {
        wp_enqueue_script('AppCraftify-script-boot', APPCRAFTIFY_URL . 'assets/js/start.js', array('jquery'), APPCRAFTIFY_VERSION, false);
		wp_enqueue_style('AppCraftify-style-boot', APPCRAFTIFY_URL . 'assets/css/start.css', array(), APPCRAFTIFY_VERSION);
        
    }

    private function addModuleToScript($tag, $handle, $src)
    {
        
        $tag = '<script type="module" src="' . esc_url($src) . '"></script>';
        
        return $tag;
    }
  
}
