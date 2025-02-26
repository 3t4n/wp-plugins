<?php

class DPDCart_Admin_Notice
{
    private $options;

    /**
     * DPDCart_Admin_Notice constructor.
     */
    public function __construct()
    {
        session_start();
        $this->options = get_option('dpdcart-settings');
        add_action('admin_notices', array($this, 'add_notice'));
    }

    public function add_notice()
    {
        $this->global_notice();
        $this->session_notice();
    }

    private function render_notice($type, $message, $dismissible = true)
    {
        if ($dismissible) {
            $dismissible = "is-dismissible";
        } else {
            $dismissible = "";
        }
        $output = sprintf(
            "<div class='notice notice-%s %s'><p><strong>DPD Cart Plugin: </strong>%s</p></div>",
            $type, $dismissible, $message);
        echo $output;
    }

    private function global_notice()
    {
        if (!isset($this->options['valid']) | !$this->options['valid']) {
            $this->notice('not-setup');
        } elseif (!isset($this->options['store']) | !$this->options['valid']) {
            $this->notice('not-store');
        }
    }

    private function session_notice()
    {
        if (isset($_SESSION['dpdcart_notices'])) {
            foreach ($_SESSION['dpdcart_notices'] as $notice) {
                $this->notice($notice);
            }
            unset($_SESSION['dpdcart_notices']);
        }
    }

    private function notice($name)
    {
        $notices = array(
            'not-setup' => array(
                'warning',
                'You must Enter Valid Username and  API Key for DPD Cart Plugin to work.',
                false
            ), 'not-store' => array(
                'warning',
                'You must select and store for DPD Cart Plugin to work.',
                false
            ),
            'api-404' => array(
                'error',
                'Unable to connect to DPD API. Please try gain later',
                true
            ),
            'api-auth-error' => array(
                'error',
                'Either DPD Username or API Key is not valid',
                true
            ), 'api-store-error' => array(
                'error',
                'Either Store ID is not valid or The store is not your.',
                true
            ),
        );
        if (isset($notices[$name])) {
            $item = $notices[$name];
            $this->render_notice($item[0], $item[1], $item[2]);
        }
    }
}

new DPDCart_Admin_Notice();