<?php
AnyChatLoader::loadClass('AnyChatAbstract');

class AnyChatAdmin extends AnyChatAbstract
{
    const NONCE = 'anychat-update-key';
    
    private static $initiated = false;

    protected $errors = array();
    protected $success = null;

    protected $importSuccess = 0;
    
    public $generalConfig = null;
    
    protected $json;
    
    public function init()
    {
        $this->generalConfig = new AnyChatConfigGeneral('anychat_');
        
        if (!self::$initiated){
            $this->initHooks();
        }
    }
    
    public function validate()
    {
        $nonce = $_REQUEST['_wpnonce'];
        if (!wp_verify_nonce($nonce, AnyChatAdmin::NONCE)) {
            $this->errors['nonce'] = array(esc_html__('Invalid security token. Please try again', 'anychat'));
            return false;
        }
        foreach ($this->getForms() as $model) {
            if (self::isSubmit(get_class($model))) {
                $model->loadFromConfig();
                $model->populate();
                if (!$model->validate()) {
                    $this->errors = $model->getErrors();
                    return false;
                }
                return true;
            }
        }
    }
    
    public function getSubmit()
    {
        foreach ($this->getForms() as $model) {
            if (self::isSubmit(get_class($model))) {
                return get_class($model);
            }
        }
    }
    
    public function isSubmitted()
    {
        foreach ($this->getAllowedSubmits() as $submit) {
            if ($this->isSubmit($submit)) {
                return true;
            }
        }
    }
    
    public function getAllowedSubmits()
    {
        $submits = array();
        foreach ($this->getForms() as $model) {
            $submits[] = get_class($model);
        }
        return $submits;
    }
    
    public function getForms()
    {
        return array(
            $this->generalConfig
        );
    }
    
    public function save()
    {
        if (!wp_verify_nonce($_POST['_wpnonce'], self::NONCE)){
            return false;
        }
        $this->errors = array();
        foreach ($this->getForms() as $model) {
            if (self::isSubmit(get_class($model))) {
                $model->populate();
                if ($model->saveToConfig()) {
                    return true;
                } else {
                    $this->errors = $model->getErrors();
                }
            }
        }
        return false;
    }
    
    public function initHooks()
    {
        self::$initiated = true;
        add_action('admin_init', array($this, 'adminInit'));
        add_action('admin_menu', array($this, 'adminMenu'), 5);
        add_action('admin_enqueue_scripts', array($this, 'loadResources'));
        if (is_admin()) {
            if (!$this->getGeneralConfig()->disable_admin) {
                add_action('wp_print_scripts', array($this, 'renderAdminWidget'), 5);
            }
        }
        add_filter('plugin_action_links', array($this, 'adminPluginSettings'), 10, 2);
    }
    
    public function adminPluginSettings($links, $file)
    {
        if ($file == plugin_basename(ANYCHAT_PLUGIN_DIR . '/anychat.php')){
            $links[] = '<a href="' . esc_url(admin_url('options-general.php?page=anychat-key-config')) . '">'.esc_html__('Settings', 'anychat').'</a>';
        }

        return $links;
    }
    
    public function getErrors()
    {
        return $this->errors;
    }
    
    public function adminInit() {
        load_plugin_textdomain('anychat', false, basename(ANYCHAT_PLUGIN_DIR) . '/languages');
        if ($this->isSubmitted()){
            if ($this->validate()){
                if ($this->save()){
                    $this->success = esc_html__('Settings updated', 'anychat');
                }
            }
        }
    }
    
    public function adminMenu() {
        $this->loadMenu();
    }
    
    public function loadMenu() {
        add_options_page(esc_html__('AnyChat', 'anychat'), esc_html__('AnyChat', 'anychat'), 'manage_options', 'anychat-key-config', array($this, 'displayConfig'));
    }
    
    public function displayConfig()
    {
        if (!$this->generalConfig->isLoaded()){
            $this->generalConfig->loadFromConfig();
        }
        
        echo self::render('/admin/config.php', array(
            'generalConfig' => $this->generalConfig,
            'activeSubmit' => $this->getSubmit(),
            'isWPML' => AnyChatTools::isMultilang(),
            'languages' => AnyChatTools::getLanguages(),
            'defaultLang' => AnyChatTools::getDefaultLanguage(),
            'currentLang' => AnyChatTools::getCurrentLanguage(),
            'errors' => $this->errors,
            'success' => $this->success,
        ));
    }
    
    public function js()
    {
        return array(
            'semantic-ui.js' => 'res/semantic-ui/semantic.min.js',
            'anychat-admin.js' => 'res/js/admin.js'
        );
    }
    
    public function css()
    {
        return array(
            'semantic-ui-combined.css' => 'res/semantic-ui/semantic-combined.min.css',
            'anychat-admin.css' => 'res/css/admin.css'
        );
    }
    
    public function loadResources()
    {
        global $hook_suffix;
        if ($hook_suffix == 'settings_page_anychat-key-config') {
            $this->registerCss();
            $this->registerJs();
        }
    }
    
    public function renderAdminWidget()
    {
        if ($this->getGeneralConfig()->api_key && $this->getGeneralConfig()->widget_id) {
            echo self::render('admin/_button.php', array(
                'generalConfig' => $this->getGeneralConfig(),
                'pluginConfigUrl' => admin_url('options-general.php?page=anychat-key-config')
            ));
        }
    }
}
