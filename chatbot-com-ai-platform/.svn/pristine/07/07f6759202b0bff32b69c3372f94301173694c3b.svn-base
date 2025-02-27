<?php
if (!defined('ABSPATH')) { exit;}

class CHATBOTCOM_Public{
    public $store;

    public function __construct() {
        $this->store = new CHATBOTCOM_Public_Store();

        add_action(
            'wp_footer',
            array($this, 'initialize')
        );
    }
    public function initialize() {
        $isMobile = preg_match('/((Chrome).*(Mobile))|((Android).*)|((iPhone|iPod).*Apple.*Mobile)|((Android).*(Mobile))/i', array_key_exists('HTTP_USER_AGENT', $_SERVER) ? $_SERVER['HTTP_USER_AGENT'] : '');
        $isLogged = property_exists(wp_get_current_user()->data, 'ID');

        if (
            ($isMobile && $this->store->options['disableMobile']) ||
            (!$isLogged && $this->store->options['disableGuests'])
        ) {
            return;
        }

        switch ($this->store->connection['type']) {
            case 'openwidget':
                if (
                    $this->store->connection['templateId'] &&
                    $this->store->connection['organizationId']
                ) {
                    require_once CHATBOTCOM_PUBLIC_DIR . '/views/footer-openwidget.php';
                }

                break;
            case 'widget':
                if ($this->store->connection['id']) {
                    require_once CHATBOTCOM_PUBLIC_DIR . '/views/footer-widget.php';
                }

                break;
        }
    }
}