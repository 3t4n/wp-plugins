<?php
if (!defined('ABSPATH')) { exit;}

class CHATBOTCOM_Admin{
    public static $instance;
    public $store;

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }

        return self::$instance;
    }
    public function initialize() {
        $this->store = new CHATBOTCOM_Store();

        if (
            current_user_can('manage_options') &&
            array_key_exists('nonce', $_GET) &&
            array_key_exists('action', $_GET) &&
            wp_verify_nonce($_GET['nonce'], CHATBOTCOM_NONCE)
        ) {
            switch (CHATBOTCOM_Utils::sanitizeString($_GET['action'])) {
                case 'log-in':
                    if (!array_key_exists('access_token', $_POST)) {
                        break;
                    }

                    if (
                        !$this->store->setAccessToken(CHATBOTCOM_Utils::sanitizeString($_POST['access_token'])) ||
                        !$this->store->fetchEmail() ||
                        !$this->store->fetchConnections()
                    ) {
                        return $this->store->setViewError();
                    }

                    if (empty($this->store->connections)) {
                        return $this->store->setViewNoStories();
                    }

                    return $this->store->setViewSetUp();
                case 'set-up':
                    if (
                        !array_key_exists('access_token', $_POST) ||
                        !array_key_exists('email', $_POST) ||
                        !array_key_exists('widget', $_POST)
                    ) {
                        break;
                    }

                    if (!$this->store->setAccessToken(CHATBOTCOM_Utils::sanitizeString($_POST['access_token']))) {
                        return $this->store->setViewError();
                    }

                    $widget = (string)$_POST['widget'];
                    $widget_data = explode(':', $widget, 2);
                    $connectionId = CHATBOTCOM_Utils::sanitizeString($widget_data[0]);
                    $storyName = CHATBOTCOM_Utils::sanitizeString($widget_data[1]);
                    $email = CHATBOTCOM_Utils::sanitizeEmail($_POST['email']);
                    $disableMobile = isset($_POST['disable-mobile']);
                    $disableGuests = isset($_POST['disable-guests']);

                    if (
                        !CHATBOTCOM_Utils::validateId($connectionId) ||
                        !$storyName ||
                        !$email
                    ) {
                        return $this->store->setViewError();
                    }

                    $connection = $this->store->createConnection($connectionId);

                    if (!$connection) {
                        return $this->store->setViewError();
                    }

                    $this->store->updateConnection(
                        $email,
                        $storyName,
                        $connection->type,
                        $connection->id,
                        $connection->templateId,
                        $connection->organizationId
                    );

                    $this->store->updateOptions(
                        $disableMobile,
                        $disableGuests
                    );

                    return $this->store->setViewConnected();
                case 'update':
                    $disableMobile = isset($_POST['disable-mobile']);
                    $disableGuests = isset($_POST['disable-guests']);

                    $this->store->updateOptions(
                        $disableMobile,
                        $disableGuests
                    );

                    return $this->store->setViewConnected();
                case 'disconnect':
                    $this->store->deleteConnection();
                    $this->store->deleteOptions();

                    return $this->store->setViewLogIn();
            }
        }

        if ($this->store->isConnected()) {
            return $this->store->setViewConnected();
        }

        $this->store->setViewLogIn();
    }
    public function __construct() {
        add_action(
            'admin_menu',
            function () {
                add_menu_page(
                    CHATBOTCOM_PAGE_TITLE,
                    CHATBOTCOM_MENU_TITLE,
                    'manage_options',
                    CHATBOTCOM_MENU_SLUG,
                    function () {
                        require_once CHATBOTCOM_ADMIN_DIR . 'views/index.php';
                    },
                    CHATBOTCOM_ADMIN_URL . 'assets/images/chatbot-logo-small-white.svg'
                );

                add_action(
                    'admin_enqueue_scripts',
                    function ($hook) {
                        wp_enqueue_style(
                            CHATBOTCOM_ASSETS_PREFIX . 'style-menu-icon',
                            CHATBOTCOM_ADMIN_URL . 'assets/style/menu-icon.css'
                        );

                        if ($hook !== CHATBOTCOM_PAGE_HOOK) {
                            return;
                        }

                        CHATBOTCOM_Components::registerScripts();

                        wp_enqueue_style(
                            CHATBOTCOM_ASSETS_PREFIX . 'style',
                            CHATBOTCOM_ADMIN_URL . 'assets/style/style.css'
                        );

                        wp_enqueue_script(
                            CHATBOTCOM_ASSETS_PREFIX . 'script-login-sdk',
                            CHATBOTCOM_ADMIN_URL . 'assets/scripts/login-sdk.js'
                        );

                        wp_localize_script(
                            CHATBOTCOM_ASSETS_PREFIX . 'script-login-sdk',
                            'wpSdkConfig',
                            array(
                                'origin' => CHATBOTCOM_AUTH_URL,
                                'clientId' => CHATBOTCOM_AUTH_CLIENT_ID,
                                'authRedirect' => CHATBOTCOM_AUTH_REDIRECT
                            )
                        );

                        wp_enqueue_script(
                            CHATBOTCOM_ASSETS_PREFIX . 'scripts',
                            CHATBOTCOM_ADMIN_URL . 'assets/scripts/script.js'
                        );

                        wp_localize_script(
                            CHATBOTCOM_ASSETS_PREFIX . 'scripts',
                            'wpUtils',
                            array(
                                'nonce' => wp_create_nonce(CHATBOTCOM_NONCE),
                                'adminPageUrl' => CHATBOTCOM_ADMIN_PAGE_URL
                            )
                        );
                    }
                );
            }
        );

        add_filter(
            'plugin_action_links_' . CHATBOTCOM_ROOT_FILE_PATH,
            function ($links) {
                return array_merge(
                    array(sprintf('<a href="' . CHATBOTCOM_ADMIN_PAGE_URL . '">%s</a>', __('Settings'))),
                    $links
                );
            }
        );

        add_action(
            'admin_init',
            array($this, 'initialize')
        );
    }
}