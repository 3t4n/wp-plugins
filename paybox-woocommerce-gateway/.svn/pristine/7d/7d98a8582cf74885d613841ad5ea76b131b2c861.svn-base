<?php

/**
 * Paybox 3 times - Payment Gateway class.
 *
 * Extended by individual payment gateways to handle payments.
 *
 * @class   WC_Pbx3xGw
 * @extends WC_Paybox_Abstract_Gateway
 */
class WC_Pbx3xGw extends WC_Paybox_Abstract_Gateway
{
    /**
     * @var string
     */
    protected $defaultTitle = 'Paybox 3 times payment';

    /**
     * @var string
     */
    protected $defaultDesc = 'xxxx';

    /**
     * @var string
     */
    protected $type = 'threetime';

    public function __construct()
    {
        // Some properties
        $this->id = 'paybox_3x';
        $this->method_title = __('Paybox 3 times', WC_PAYBOX_PLUGIN);
        $this->has_fields = false;
        $this->icon = '3xcbvisamcecb.png';

        parent::__construct();
    }

    private function _showDetailRow($label, $value)
    {
        return '<strong>'.$label.'</strong> '.$value;
    }

    /**
     * Check If The Gateway Is Available For Use
     *
     * @access public
     * @return bool
     */
    public function showDetails($order)
    {
        $orderId = $order->get_id();
        $payment = $this->_paybox->getOrderPayments($orderId, 'first_payment');

        if (empty($payment)) {
            return;
        }

        $data = unserialize($payment->data);
        $payment = $this->_paybox->getOrderPayments($orderId, 'second_payment');
        if (!empty($payment)) {
            $second = unserialize($payment->data);
        }
        $payment = $this->_paybox->getOrderPayments($orderId, 'third_payment');
        if (!empty($payment)) {
            $third = unserialize($payment->data);
        }

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

        $date = (isset($data['date']) ? preg_replace('/^([0-9]{2})([0-9]{2})([0-9]{4})$/', '$1/$2/$3', $data['date']) : 'N/A');
        $value = sprintf('%s (%s)', $data['amount'] / 100.0, $date);
        $rows[] = $this->_showDetailRow(__('First debit:'), $value);

        if (isset($second)) {
            $date = preg_replace('/^([0-9]{2})([0-9]{2})([0-9]{4})$/', '$1/$2/$3', $second['date']);
            $value = sprintf('%s (%s)', $second['amount'] / 100.0, $date);
        } else {
            $value = __('Not achieved', WC_PAYBOX_PLUGIN);
        }
        $rows[] = $this->_showDetailRow(__('Second debit:'), $value);

        if (isset($third)) {
            $date = preg_replace('/^([0-9]{2})([0-9]{2})([0-9]{4})$/', '$1/$2/$3', $third['date']);
            $value = sprintf('%s (%s)', $third['amount'] / 100.0, $date);
        } else {
            $value = __('Not achieved', WC_PAYBOX_PLUGIN);
        }
        $rows[] = $this->_showDetailRow(__('Third debit:'), $value);

        $rows[] = $this->_showDetailRow(__('Transaction:', WC_PAYBOX_PLUGIN), $data['transaction']);
        $rows[] = $this->_showDetailRow(__('Call:', WC_PAYBOX_PLUGIN), $data['call']);
        $rows[] = $this->_showDetailRow(__('Authorization:', WC_PAYBOX_PLUGIN), $data['authorization']);

        echo '<h4>'.__('Payment information', WC_PAYBOX_PLUGIN).'</h4>';
        echo '<p>'.implode('<br/>', $rows).'</p>';
    }
}

class WC_Paybox_Threetime_GateWay extends WC_Pbx3xGw
{
    public function receipt_page($orderId)
    {
        return;
    }
}
