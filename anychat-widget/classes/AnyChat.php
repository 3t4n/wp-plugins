<?php
AnyChatLoader::loadClass('AnyChatAbstract');

class AnyChat extends AnyChatAbstract
{
    protected $viewParams = [];
    
    public function init()
    {
        load_plugin_textdomain('anychat', false, basename(ANYCHAT_PLUGIN_DIR) . '/languages');
        if (!is_admin()) {
            add_action('wp_print_scripts', array($this, 'renderWidgetScript'));
        }
        AnyChatTools::getDefaultLanguage();
    }
    
    public function renderWidgetScript()
    {
        echo self::render('front/button.php', array(
            'generalConfig' => $this->getGeneralConfig()
        ));
    }

    public function activate()
    {
        if (!get_option('anychat_installed')){
            $generalConfig = new AnyChatConfigGeneral('anychat_');
            $generalConfig->loadDefaults();
            $generalConfig->saveToConfig(false);
            
            $admin = new AnyChatAdmin();
            $admin->init();
            
            update_option('anychat_installed', time());
        }
        return true;
    }
}
