<?php

/**
 * Paybox - Individual Payment Gateway class.
 *
 * @class   WC_PbxStdGw
 * @extends WC_Paybox_Abstract_Gateway
 */
class WC_PbxStdGw extends WC_Paybox_Abstract_Gateway
{
    /**
     * @var string
     */
    protected $defaultTitle = 'Paybox payment';

    /**
     * @var string
     */
    protected $defaultDesc = 'xxxx';

    /**
     * @var string
     */
    protected $type = 'standard';

    public function __construct()
    {
        // Some properties
        $this->id = 'paybox_std';
        $this->method_title = __('Paybox', WC_PAYBOX_PLUGIN);
        $this->has_fields = false;
        $this->icon = 'cbvisamcecb.png';

        parent::__construct();
    }

    private function _showDetailRow($label, $value)
    {
        return '<strong>'.$label.'</strong> '.__($value, WC_PAYBOX_PLUGIN);
    }

    public function showDetails($order)
    {
        $orderId = $order->get_id();
        $payment = $this->_paybox->getOrderPayments($orderId, 'capture');

        if (empty($payment)) {
            return;
        }

        $data = unserialize($payment->data);
        $rows = array();
        $rows[] = $this->_showDetailRow(__('Reference:', WC_PAYBOX_PLUGIN), $data['reference']);
        if (isset($data['ip'])) {
            $rows[] = $this->_showDetailRow(__('Country of IP:', WC_PAYBOX_PLUGIN), $data['ip']);
        }
        $rows[] = $this->_showDetailRow(__('Processing date:', WC_PAYBOX_PLUGIN), (isset($data['date']) ? preg_replace('/^([0-9]{2})([0-9]{2})([0-9]{4})$/', '$1/$2/$3', $data['date']) : 'N/A') . " - " . (isset($data['time']) ? $data['time'] : 'N/A'));
        if (isset($data['firstNumbers']) && isset($data['lastNumbers'])) {
            $rows[] = $this->_showDetailRow(__('Card numbers:', WC_PAYBOX_PLUGIN), $data['firstNumbers'].'...'.$data['lastNumbers']);
        }
        if (isset($data['validity'])) {
            $rows[] = $this->_showDetailRow(__('Validity date:', WC_PAYBOX_PLUGIN), preg_replace('/^([0-9]{2})([0-9]{2})$/', '$2/$1', $data['validity']));
        }

        // 3DS Version
        if (!empty($data['3ds']) && $data['3ds'] == 'Y') {
            $cc_3dsVersion = '1.0.0';
            if (!empty($data['3dsVersion'])) {
                $cc_3dsVersion = str_replace('3DSv', '', trim($data['3dsVersion']));
            }
            $rows[] = $this->_showDetailRow(__('3DS version:', WC_PAYBOX_PLUGIN), $cc_3dsVersion);
        }

        $rows[] = $this->_showDetailRow(__('Transaction:', WC_PAYBOX_PLUGIN), $data['transaction']);
        $rows[] = $this->_showDetailRow(__('Call:', WC_PAYBOX_PLUGIN), $data['call']);
        $rows[] = $this->_showDetailRow(__('Authorization:', WC_PAYBOX_PLUGIN), $data['authorization']);

        echo '<h4>'.__('Payment information', WC_PAYBOX_PLUGIN).'</h4>';
        echo '<p>'.implode('<br/>', $rows).'</p>';
    }
}
