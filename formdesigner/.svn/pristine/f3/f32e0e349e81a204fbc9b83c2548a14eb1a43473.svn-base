<?php

class FormDesigner
{
    const SLUG = 'formdesigner';
    const SESSION_KEY = 'formdesigner_code';

    private $hash;
    private $cryptKey;
    private $language;

    public function __construct($hash, $cryptKey)
    {
        $this->hash     = $hash;
        $this->cryptKey = $cryptKey;
        
        $this->language = current(explode('-', get_bloginfo('language')));

        register_deactivation_hook(FORMDESIGNER__PLUGIN_DIR . '/formdesigner.php', [$this, 'uninstall']);

        add_action('init', [$this, 'sessionStart']);

        add_action('plugins_loaded', [$this, 'my_plugin_load_plugin_textdomain']);
        
        add_action('admin_menu', [$this, 'adminMenu']);
        add_filter('plugin_action_links_' . plugin_basename(FORMDESIGNER__PLUGIN_DIR . '/formdesigner.php'),
            [$this, 'formdesigner_settings_link']);
        add_action('admin_enqueue_scripts', [$this, 'loadResources']);
        add_action('wp_ajax_formdesigner_popup', [$this, 'popup']);
        add_action('wp_ajax_formdesigner_auth', [$this, 'auth']);
        add_action('wp_ajax_formdesigner_load_forms', [$this, 'loadForms']);

        $hash     = get_option('formdesignerHash');
        $cryptKey = get_option('formdesignerCryptKey');
        if ($hash && $cryptKey) {
            add_filter('mce_external_plugins', [$this, 'mceRegistr']);
            add_filter('mce_buttons', [$this, 'mceButtons'], 0);
            add_shortcode('formdesigner', [$this, 'formdesigner_shortcode']);
            add_action('init', [$this, 'addGutenbergWidget']);
        }
    }

    function my_plugin_load_plugin_textdomain()
    {
        load_plugin_textdomain( 'formdesigner', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
    }

    public function sessionStart()
    {
        if (!session_id()) {
            session_start();
        }
    }
    
    public function auth()
    {
        if (
            !empty($_GET['code']) && !empty($_GET['hash']) && !empty($_GET['cryptKey']) &&
            !empty($_SESSION[self::SESSION_KEY]) && $_SESSION[self::SESSION_KEY] == $_GET['code']
        ) {
            add_option('formdesignerHash', $_GET['hash']);
            add_option('formdesignerCryptKey', $_GET['cryptKey']);
            $this->renderPartial('redirect', [
                'redirectUrl' => $this->getPluginAdminUrl(),
            ]);
            exit;
        }
        wp_die('error');
    }
    
    public function loadForms()
    {
        echo $this->getForms();
        exit;
    }
    
    public function formdesigner_settings_link($links)
    {
        $settings_link = '<a href="' . $this->getPluginAdminUrl() . '">' . __('Settings', 'formdesigner') . '</a>';
        array_unshift($links, $settings_link);
        return $links;
    }

    public function formdesigner_shortcode($attributes)
    {
        $id = $this->getAttribute($attributes, 'id');
        if (empty($id)) {
            return '';
        }
    
        $slug = $this->getAttribute($attributes, 'slug');
        $attributes = [
            'formId'     => intval($id),
            'el'         => $this->getAttribute($attributes, 'el', 'form_' . $id . '_' . mt_rand(10, 100)),
            'host'       => $this->getAttribute($attributes, 'host', $this->getHost()),
            'formHeight' => intval($this->getAttribute($attributes, 'height', 100)),
            'center'     => intval($this->getAttribute($attributes, 'center', 1)),
        ];
        if (!empty($slug)) {
            $attributes['slug'] = $slug;
        }
        return $this->renderPartial('code', ['attributes' => $attributes], true);
    }
    
    private function getAttribute($attributes, $name, $default = null)
    {
        return isset($attributes[$name]) ? $attributes[$name] : $default;
    }
    
    public function popup()
    {
        $forms = [];
        $error = null;
        
        $result = json_decode($this->getForms(), true);
        if ($result['status'] == 'OK') {
            $forms = $result['data']['forms'];
        } else {
            $error = $result['error'];
        }

        $this->renderPartial('popup', [
            'forms'   => $forms,
            'error'   => $error,
            'menuUrl' => $this->getPluginAdminUrl(),
        ]);
        wp_die();
    }

    public function addGutenbergWidget()
    {
        if (function_exists('wp_register_script')) {
            wp_register_script('gutenberg-formdesigner', plugins_url('src/gutenberg.js', __FILE__), [
                'wp-blocks',
                'wp-element',
                'wp-editor',
                'wp-components',
            ]);
            
            wp_add_inline_script(
                'gutenberg-formdesigner', 
                'var formdesigner_host = "' . $this->getHost() . '";', 
                'before'
            );

            wp_add_inline_script(
                'gutenberg-formdesigner',
                'var formdesigner_langs = ' . json_encode(array(
                    'loading' => __('Forms are being loaded...', 'formdesigner'),
                    'chooseForm' => __('Choose form', 'formdesigner'),
                    'chooseFormOption' => __('-- choose a form --', 'formdesigner'),
                    'insertForm' => __('Insert form', 'formdesigner'),
                    'alignLeft' => __('Align left', 'formdesigner'),
                    'alignCenter' => __('Align center', 'formdesigner'),
                    'formList' => __('FormDesigner form list', 'formdesigner'),
                )) . ';',
                'before'
            );
        }
        
        if (function_exists('wp_register_style')) {
            wp_register_style(
                'gutenberg-formdesigner',
                plugins_url('src/editor.css', __FILE__),
                ['wp-edit-blocks'],
                filemtime(plugin_dir_path(__FILE__) . 'src/editor.css')
            );
        }

        if (function_exists('register_block_type')) {
            register_block_type('formdesigner/block', [
                'editor_script' => 'gutenberg-formdesigner',
                'editor_style'  => 'gutenberg-formdesigner',
            ]);
        }
    }

    public function mceRegistr($plugin_array)
    {
        $plugin_array['FormDesigner'] = plugins_url('src/formdesigner.js', __FILE__);
        return $plugin_array;
    }

    public function mceButtons($buttons)
    {
        array_push($buttons, "separator", "FormDesigner");
        return $buttons;
    }

    public function adminMenu()
    {
        add_menu_page(
            __('FormDesigner Web Form Builder', 'formdesigner'),
            'FormDesigner',
            8,
            self::SLUG,
            [$this, 'mainContent'],
            FORMDESIGNER__PLUGIN_URL . 'src/menu_icon.png'
        );
    }

    public function loadResources($hook)
    {
        if ($hook === 'toplevel_page_' . self::SLUG) {
            wp_enqueue_script('common.js', FORMDESIGNER__PLUGIN_URL . 'src/common.js');
            wp_enqueue_style('style.css', FORMDESIGNER__PLUGIN_URL . 'src/style.css');
        }
    }
    
    public function mainContent()
    {
        $hash     = get_option('formdesignerHash');
        $cryptKey = get_option('formdesignerCryptKey');
        if ($hash !== false && $cryptKey !== false) {
            $this->login();
        } else {
            $this->signUp();
        }
    }
    
    private function login()
    {
        $hash = get_option('formdesignerHash');
        $k    = json_encode([
            'hash'      => $hash,
            'createdOn' => date('Y-m-d h:i:s'),
        ]);
        
        $code = $this->encrypt($k, get_option('formdesignerCryptKey'));
        echo $this->showIframe($this->getApiUrl() . 'login?k=zaa' . $hash . rawurlencode($code) . '&hash=' . $this->hash);
        exit;
    }
    
    public function signUp()
    {
        $this->redirect('signup');
    }
    
    public function signIn()
    {
        $this->redirect('signin');
    }

    private function redirect($action)
    {
        $code = md5(wp_generate_password(40, true, true));
        $_SESSION[self::SESSION_KEY] = $code;
        $current_user = wp_get_current_user();
        echo $this->showIframe($this->getApiUrl() . $action .'?' . http_build_query([
            'firstName' => $current_user->user_firstname,
            'lastName'  => $current_user->user_lastname,
            'email'     => $current_user->user_email,
            'hash'      => $this->hash,
            'returnUrl' => admin_url('admin-ajax.php?action=formdesigner_auth') . '&code=' . $code,
        ]));
    }

    public function showIframe($src, $htmlOptions = [])
    {
        $options = array_merge([
            'width'        => '100%',
            'height'       => '550px',
            'frameborder'  => 0,
            'src'          => $src,
            'marginwidth'  => 0,
            'marginheight' => 0,
            'name'         => 'formdesigner',
            'id'           => 'formdesigner',
        ], $htmlOptions);
        $optionsInline = '';
        foreach ($options as $option => $value) {
            $optionsInline .= ' ' . $option . '="' . $value . '"';
        }
        return '<iframe' . $optionsInline . '></iframe>';
    }

    public function renderPartial($_viewFile_, $_data_ = null, $_return_ = false)
    {
        $_viewFile_ = FORMDESIGNER__PLUGIN_DIR . 'views/' . $_viewFile_ . '.php';
        if (is_array($_data_)) {
            extract($_data_, EXTR_PREFIX_SAME, 'data');
        } else {
            $data = $_data_;
        }

        if (file_exists($_viewFile_)) {
            if ($_return_) {
                ob_start();
                ob_implicit_flush(false);
                require($_viewFile_);
                return ob_get_clean();
            } else {
                require($_viewFile_);
            }
        } else {
            throw new Exception( __('Unable to find a template', 'formdesigner') . ': ' . $_viewFile_);
        }
    }

    private function encrypt($string, $key)
    {
        if (empty($key)) {
            $key = '%key&';
        }
        $len    = strlen($key);
        $result = '';
        for ($i = 0; $i < strlen($string); $i++) {
            $char       = substr($string, $i, 1);
            $keychar    = substr($key, ($i % $len) - 1, 1);
            $ordChar    = ord($char);
            $ordKeychar = ord($keychar);
            $sum        = $ordChar + $ordKeychar;
            $char       = chr($sum);
            $result     .= $char;
        }
        return base64_encode($result);
    }

    public function uninstall()
    {
        delete_option('formdesignerHash');
        delete_option('formdesignerCryptKey');
    }
    
    private function getPluginAdminUrl()
    {
        return admin_url('admin.php?page=' . self::SLUG);
    }

    private function getForms()
    {
        $hash     = get_option('formdesignerHash');
        $cryptKey = get_option('formdesignerCryptKey');
        if ($hash && $cryptKey) {
            $k = json_encode([
                'hash'      => $hash,
                'createdOn' => date('Y-m-d h:i:s'),
            ]);

            $code = rawurlencode($this->encrypt($k, $cryptKey));
            $response = wp_remote_get($this->getApiUrl() . 'forms?k=zaa' . $hash . $code . '&hash=' . $this->hash, [
                'sslverify' => false,
            ]);
            return wp_remote_retrieve_body($response);
        }
        return json_encode([
            'status' => 'ERR',
            'error'  => __('Unable to retrieve form list', 'formdesigner'),
        ]);
    }
    
    private function getApiUrl()
    {
        return $this->language === 'ru'
            ? 'https://ac.formdesigner.ru/crypt/'
            : 'https://ac.formdesigner.pro/crypt/';
    }

    private function getHost()
    {
        return $this->language === 'ru' ? 'formdesigner.ru' : 'formdesigner.pro';
    }
}
