<?php
AnyChatLoader::loadModel('AnyChatConfigGeneral');

abstract class AnyChatAbstract
{
    public $generalConfig;
    public $mobileButtonConfig;
    
    /**
     * 
     * @return AnyChatConfigGeneral
     */
    public function getGeneralConfig()
    {
        if (!$this->generalConfig) {
            $this->generalConfig = new AnyChatConfigGeneral('anychat_');
        }
        if (!$this->generalConfig->isLoaded()) {
            $this->generalConfig->loadFromConfig();
        }
        return $this->generalConfig;
    }
    
    abstract public function init();
    
    public function activate()
    {
        return true;
    }
    
    public function deactivate()
    {
        return true;
    }

    public function css()
    {
        return array();
    }
    
    public function js()
    {
        return array();
    }
    
    public function registerJs()
    {
        $deps = array();
        
        foreach ($this->js() as $key => $file){
            if (is_array($file)) {
                $src = $file['src'];
                wp_enqueue_script($key, ANYCHAT_PLUGIN_URL . $src, $deps, ANYCHAT_VERSION);
                if (isset($file['localization']) && isset($file['localization']['varName']) && isset($file['localization']['l10n'])) {
                    wp_localize_script($key, $file['localization']['varName'], $file['localization']['l10n']);
                }
            } else {
                if ($file){
                    wp_enqueue_script($key, ANYCHAT_PLUGIN_URL . $file, $deps, ANYCHAT_VERSION);
                } else {
                    wp_enqueue_script($key);
                }
            }
        }
    }
    
    public function registerCss()
    {
        foreach ($this->css() as $key => $file){
            if (preg_match('/https?:/is', $file)){
                $url = $file;
            } else {
                $url = ANYCHAT_PLUGIN_URL . $file;
            }
            wp_enqueue_style($key, $url, array(), ANYCHAT_VERSION);
        }
    }
    
    public static function render($view, $viewData = array())
    {
        ob_start();
        extract($viewData);
	include realpath(ANYCHAT_PLUGIN_DIR . 'views/' . $view);
	$output = ob_get_clean();
	return $output;
    }
    
    public static function isSubmit($submit)
    {
        return (
            isset($_POST[$submit]) || isset($_POST[$submit.'_x']) || isset($_POST[$submit.'_y'])
            || isset($_GET[$submit]) || isset($_GET[$submit.'_x']) || isset($_GET[$submit.'_y'])
        );
    }
    
    public function isMobile()
    {
        return AnyChatTools::isMobile();
    }
}
