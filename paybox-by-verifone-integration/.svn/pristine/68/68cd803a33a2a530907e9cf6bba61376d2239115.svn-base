<?php

class Paybox_Config {

    private $_values;
    private $_defaults = array(
        '3ds_enabled' => 'always',
        '3ds_amount' => '',
        'amount' => '',
        'debug' => 'no',
        'delay' => 0,
        'environment' => 'TEST',
        'hmackey' => '0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF',
        'identifier' => 3262411,
        'ips' => '194.2.122.158,195.25.7.166,195.101.99.76',
        'rank' => 77,
        'site' => 1999888,
    );

    public function __construct(array $values, $defaultTitle, $defaultDesc) {
        $this->_values = $values;
        $this->_defaults['title'] = $defaultTitle;
        $this->_defaults['description'] = $defaultDesc;
    }

    protected function _getOption($name) {
        if (isset($this->_values[$name])) {
            return $this->_values[$name];
        }
        if (isset($this->_defaults[$name])) {
            return $this->_defaults[$name];
        }
        return null;
    }

    public function get3DSEnabled() {
        return $this->_getOption('3ds_enabled');
    }

    public function get3DSAmount() {
        $value = $this->_getOption('3ds_amount');
        return empty($value) ? null : floatval($value);
    }

    public function getAmount() {
        $value = $this->_getOption('amount');
        return empty($value) ? null : floatval($value);
    }

    public function getAllowedIps() {
        return explode(',', $this->_getOption('ips'));
    }

    public function getDefaults() {
        return $this->_defaults;
    }

    public function getDelay() {
        return (int) $this->_getOption('delay');
    }

    public function getDescription() {
        return $this->_getOption('description');
    }

    public function getHmacAlgo() {
        return 'SHA512';
    }

    public function getHmacKey() {
        $crypto = new PayboxEncrypt();
        return $crypto->decrypt($this->_values['hmackey']);
    }

    public function getIdentifier() {
        return $this->_getOption('identifier');
    }

    public function getRank() {
        return $this->_getOption('rank');
    }

    public function getSite() {
        return $this->_getOption('site');
    }

    public function getSystemProductionUrls() {
        return array(
            'https://tpeweb.paybox.com/php/',
            'https://tpeweb1.paybox.com/php/',
        );
    }

    public function getSystemTestUrls() {
        return array(
            'https://preprod-tpeweb.paybox.com/php/'
        );
    }

    public function getSystemUrls() {
        if ($this->isProduction()) {
            return $this->getSystemProductionUrls();
        }
        return $this->getSystemTestUrls();
    }

    public function getTitle() {
        return $this->_getOption('title');
    }

    public function isDebug() {
        return $this->_getOption('debug') === 'yes';
    }

    public function isProduction() {
        return $this->_getOption('environment') === 'PRODUCTION';
    }

    public function init_form_fields($type) {
        $defaults = $this->getDefaults();
        $form_fields = array();
        $form_fields['enabled'] = array(
            'title' => __('Enable/Disable', 'paybox'),
            'type' => 'select',
            'options' => array(
                'no' => __('Disable', 'paybox'),
                'yes' => __('Enable', 'paybox'),
            ),
            'label' => __('Enable Paybox Payment', 'paybox'),
            'default' => 'yes'
        );
        $form_fields['title'] = array(
            'title' => __('Title', 'paybox'),
            'type' => 'text',
            'description' => __('This controls the title which the user sees during checkout.', 'paybox'),
            'default' => __($defaults['title'], 'paybox'),
        );
        $form_fields['description'] = array(
            'title' => __('Description', 'paybox'),
            'type' => 'textarea',
            'description' => __('Payment method description that the customer will see on your checkout.', 'paybox'),
            'default' => __($defaults['description'], 'paybox'),
        );
        if ($type == 'standard') {
            $form_fields['delay'] = array(
                'title' => __('Delay', 'paybox'),
                'type' => 'select',
                'options' => array(
                    '0' => __('Immediate', 'paybox'),
                    '1' => __('1 day', 'paybox'),
                    '2' => __('2 days', 'paybox'),
                    '3' => __('3 days', 'paybox'),
                    '4' => __('4 days', 'paybox'),
                    '5' => __('5 days', 'paybox'),
                    '6' => __('6 days', 'paybox'),
                    '7' => __('7 days', 'paybox'),
                ),
                'default' => $defaults['delay'],
            );
        }
        $form_fields['amount'] = array(
            'title' => __('Minimal amount', 'paybox'),
            'type' => 'text',
            'description' => __('Enable this payment method for order with amount greater or equals to this amount (empty to ignore this condition)', 'paybox'),
            'default' => $defaults['amount']
        );
        $form_fields['3ds'] = array(
            'title' => __('3D Secure', 'paybox'),
            'type' => 'title',
        );
        $form_fields['3ds_enabled'] = array(
            'title' => __('Enable/Disable', 'paybox'),
            'type' => 'select',
            'label' => __('Enable 3D Secure', 'paybox'),
            'description' => __('You can enable 3D Secure for all orders or depending on following conditions', 'paybox'),
            'default' => $defaults['3ds_enabled'],
            'options' => array(
                'never' => __('Disabled', 'paybox'),
                'always' => __('Enabled', 'paybox'),
                'conditional' => __('Conditional', 'paybox'),
            ),
        );
        $form_fields['3ds_amount'] = array(
            'title' => __('Minimal amount', 'paybox'),
            'type' => 'text',
            'description' => __('Enable 3D Secure for order with amount greater or equals to this amount (empty to ignore this condition)', 'paybox'),
            'default' => $defaults['3ds_amount']
        );
        $form_fields['paybox_account'] = array(
            'title' => __('Paybox account', 'paybox'),
            'type' => 'title',
        );
        $form_fields['site'] = array(
            'title' => __('Site number', 'paybox'),
            'type' => 'text',
            'description' => __('Site number provided by Paybox.', 'paybox'),
            'default' => $defaults['site'],
        );
        $form_fields['rank'] = array(
            'title' => __('Rank number', 'paybox'),
            'type' => 'text',
            'description' => __('Rank number provided by Paybox (two last digits).', 'paybox'),
            'default' => $defaults['rank'],
        );
        $form_fields['identifier'] = array(
            'title' => __('Login', 'paybox'),
            'type' => 'text',
            'description' => __('Internal login provided by Paybox.', 'paybox'),
            'default' => $defaults['identifier'],
        );
        $form_fields['hmackey'] = array(
            'title' => __('HMAC', 'paybox'),
            'type' => 'text',
            'description' => __('Secrete HMAC key to create using the Paybox interface.', 'paybox'),
            'default' => $defaults['hmackey'],
        );
        $form_fields['environment'] = array(
            'title' => __('Environment', 'paybox'),
            'type' => 'select',
            'description' => __('In test mode your payments will not be sent to the bank.', 'paybox'),
            'options' => array(
                'PRODUCTION' => __('Production', 'paybox'),
                'TEST' => __('Test', 'paybox'),
            ),
            'default' => $defaults['environment'],
        );
        $form_fields['technical'] = array(
            'title' => __('Technical settings', 'paybox'),
            'type' => 'title',
        );
        $form_fields['debug'] = array(
            'title' => __('Debug', 'paybox'),
            'type' => 'checkbox',
            'label' => __('Enable some debugging information', 'paybox'),
            'options' => array(
                'no' => __('Disable', 'paybox'),
                'yes' => __('Enable', 'paybox'),
            ),
            'default' => $defaults['debug'],
        );

        return $form_fields;
    }

}
