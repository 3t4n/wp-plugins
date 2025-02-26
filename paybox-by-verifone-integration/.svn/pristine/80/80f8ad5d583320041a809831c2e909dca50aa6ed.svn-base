<?php

class Payboxclass {

    private $_config;
    private $_currencyDecimals = array(
        '008' => 2,
        '012' => 2,
        '032' => 2,
        '036' => 2,
        '044' => 2,
        '048' => 3,
        '050' => 2,
        '051' => 2,
        '052' => 2,
        '060' => 2,
        '064' => 2,
        '068' => 2,
        '072' => 2,
        '084' => 2,
        '090' => 2,
        '096' => 2,
        '104' => 2,
        '108' => 0,
        '116' => 2,
        '124' => 2,
        '132' => 2,
        '136' => 2,
        '144' => 2,
        '152' => 0,
        '156' => 2,
        '170' => 2,
        '174' => 0,
        '188' => 2,
        '191' => 2,
        '192' => 2,
        '203' => 2,
        '208' => 2,
        '214' => 2,
        '222' => 2,
        '230' => 2,
        '232' => 2,
        '238' => 2,
        '242' => 2,
        '262' => 0,
        '270' => 2,
        '292' => 2,
        '320' => 2,
        '324' => 0,
        '328' => 2,
        '332' => 2,
        '340' => 2,
        '344' => 2,
        '348' => 2,
        '352' => 0,
        '356' => 2,
        '360' => 2,
        '364' => 2,
        '368' => 3,
        '376' => 2,
        '388' => 2,
        '392' => 0,
        '398' => 2,
        '400' => 3,
        '404' => 2,
        '408' => 2,
        '410' => 0,
        '414' => 3,
        '417' => 2,
        '418' => 2,
        '422' => 2,
        '426' => 2,
        '428' => 2,
        '430' => 2,
        '434' => 3,
        '440' => 2,
        '446' => 2,
        '454' => 2,
        '458' => 2,
        '462' => 2,
        '478' => 2,
        '480' => 2,
        '484' => 2,
        '496' => 2,
        '498' => 2,
        '504' => 2,
        '504' => 2,
        '512' => 3,
        '516' => 2,
        '524' => 2,
        '532' => 2,
        '532' => 2,
        '533' => 2,
        '548' => 0,
        '554' => 2,
        '558' => 2,
        '566' => 2,
        '578' => 2,
        '586' => 2,
        '590' => 2,
        '598' => 2,
        '600' => 0,
        '604' => 2,
        '608' => 2,
        '634' => 2,
        '643' => 2,
        '646' => 0,
        '654' => 2,
        '678' => 2,
        '682' => 2,
        '690' => 2,
        '694' => 2,
        '702' => 2,
        '704' => 0,
        '706' => 2,
        '710' => 2,
        '728' => 2,
        '748' => 2,
        '752' => 2,
        '756' => 2,
        '760' => 2,
        '764' => 2,
        '776' => 2,
        '780' => 2,
        '784' => 2,
        '788' => 3,
        '800' => 2,
        '807' => 2,
        '818' => 2,
        '826' => 2,
        '834' => 2,
        '840' => 2,
        '858' => 2,
        '860' => 2,
        '882' => 2,
        '886' => 2,
        '901' => 2,
        '931' => 2,
        '932' => 2,
        '934' => 2,
        '936' => 2,
        '937' => 2,
        '938' => 2,
        '940' => 0,
        '941' => 2,
        '943' => 2,
        '944' => 2,
        '946' => 2,
        '947' => 2,
        '948' => 2,
        '949' => 2,
        '950' => 0,
        '951' => 2,
        '952' => 0,
        '953' => 0,
        '967' => 2,
        '968' => 2,
        '969' => 2,
        '970' => 2,
        '971' => 2,
        '972' => 2,
        '973' => 2,
        '974' => 0,
        '975' => 2,
        '976' => 2,
        '977' => 2,
        '978' => 2,
        '979' => 2,
        '980' => 2,
        '981' => 2,
        '984' => 2,
        '985' => 2,
        '986' => 2,
        '990' => 0,
        '997' => 2,
        '998' => 2,
    );
    private $_errorCode = array(
        '00000' => 'Successful operation',
        '00001' => 'Payment system not available',
        '00003' => 'Paybor error',
        '00004' => 'Card number or invalid cryptogram',
        '00006' => 'Access denied or invalid identification',
        '00008' => 'Invalid validity date',
        '00009' => 'Subscription creation failed',
        '00010' => 'Unknown currency',
        '00011' => 'Invalid amount',
        '00015' => 'Payment already done',
        '00016' => 'Existing subscriber',
        '00021' => 'Unauthorized card',
        '00029' => 'Invalid card',
        '00030' => 'Timeout',
        '00033' => 'Unauthorized IP country',
        '00040' => 'No 3D Secure',
    );
    private $_resultMapping = array(
        'M' => 'amount',
        'R' => 'reference',
        'T' => 'transaction',
        'A' => 'authorization',
        'B' => 'subscription',
        'C' => 'cardType',
        'D' => 'validity',
        'E' => 'error',
        'F' => '3ds',
        'G' => '3dsWarranty',
        'H' => 'imprint',
        'I' => 'ip',
        'J' => 'lastNumbers',
        'K' => 'sign',
        'N' => 'firstNumbers',
        'O' => '3dsInlistment',
        'o' => 'celetemType',
        'P' => 'paymentType',
        'Q' => 'time',
        'S' => 'call',
        'U' => 'subscriptionData',
        'W' => 'date',
        'Y' => 'country',
        'Z' => 'paymentIndex',
    );
    public $_messages;

    public function __construct(Paybox_Config $config) {
        $this->_config = $config;
        $this->_messages = array(
            'error' => array(
                'unexpected-type' => __('Unexpected type %s', 'paybox'),
                'unexpected-3dstatus' => __('Unexpected 3-D Secure status %s', 'paybox'),
                'paybox-noparameters' => __('An unexpected error in Paybox call has occured: no parameters.', 'paybox'),
                'paybox-missing-signature' => __('An unexpected error in Paybox call has occured: missing signature.', 'paybox'),
                'paybox-invalid-signature' => __('An unexpected error in Paybox call has occured: invalid signature.', 'paybox'),
                'paybox-missing-url' => __('Missing URL for Paybox system in configuration', 'paybox'),
                'paybox-not-available' => __('Paybox not available. Please try again later.', 'paybox'),
                'paybox-hmac-signature-create' => __('Unable to create hmac signature. Maybe a wrong configuration.', 'paybox'),
                'paybox-invalid-decrypted-token' => __('Invalid decrypted token "%s"', 'paybox'),
                'paybox-token-order-id' => __('Not existing order id from decrypted token "%s"', 'paybox'),
                'paybox-token-concistency-error' => __('Consistency error on descrypted token "%s"', 'paybox'),
                'paybox-call-parameter-missing' => __('Missing %s parameter in Paybox call', 'paybox'),
                'paybox-three-time-invalid' => __('Invalid three-time payment status', 'paybox'),
                'paybox-payment-refused' => __('Payment was refused by Paybox (%s).', 'paybox'),
                'paybox-payment-refuse' => __('Payment refused by Paybox.', 'paybox'),
            ),
            'info' => array(
                'paybox-authorized-captured' => __('Payment was authorized and captured by Paybox.', 'paybox'),
                'paybox-second-captured' => __('Second payment was captured by Paybox.', 'paybox'),
                'paybox-third-captured' => __('Third payment was captured by Paybox.', 'paybox'),
                'paybox-payment-user-canceled' => __('Payment was canceled by user on Paybox payment page.', 'paybox'),
                'paybox-payment-canceled' => __('Payment canceled', 'paybox'),
                'paybox-user-back' => __('Customer is back from Paybox payment page.', 'paybox'),
                'paybox-customer-redirect' => __('Customer is redirected to Paybox payment page', 'paybox'),
                'paybox-debug-view' => __('This is a debug view. Click continue to be redirected to Paybox payment page.', 'paybox'),
                'paybox-continue' => __('Continue...', 'paybox'),
                'paybox-redirect-button' => __('You will be redirected to the Paybox payment page. If not, please use the button bellow.', 'paybox'),
            ),
            'fields' => array(
                'paybox-fields-reference' => __('Reference:', 'paybox'),
                'paybox-fields-country' => __('Country of IP:', 'paybox'),
                'paybox-fields-processing-date' => __('Processing date:', 'paybox'),
                'paybox-fields-card-numbers' => __('Card numbers:', 'paybox'),
                'paybox-fields-validity-date' => __('Validity date:', 'paybox'),
                'paybox-fields-transaction' => __('Transaction:', 'paybox'),
                'paybox-fields-call' => __('Call:', 'paybox'),
                'paybox-fields-authorization' => __('Authorization:', 'paybox'),
                'paybox-fields-information' => __('Payment information', 'paybox'),
                'paybox-fields-first-debit' => __('First debit:', 'paybox'),
                'paybox-fields-second-debit' => __('Second debit:', 'paybox'),
                'paybox-fields-third-debit' => __('Third debit:', 'paybox'),
                'paybox-fields-not-achieve' => __('Not achieved', 'paybox'),
            ),
        );
    }

    public function addCartErrorMessage($message) {
        wc_add_notice($message, 'error');
    }

    public function addOrderNote($order, $message) {
        if (get_class($order) == 'WPSC_Purchase_Log') {//WpEcommerce
            global $wpdb;
            $wpdb->insert($wpdb->prefix . 'wpsc_paybox_message', array(
                'order_id' => $order->get('id'),
                'date' => date('Y-m-d H:i:s'),
                'message' => $message,
            ));
        }
        if (get_class($order) == 'WC_Order') {//WooCommerce
            $order->add_order_note($message);
        }
    }

    public function addOrderPayment($order, $type, array $data) {
        global $wpdb;
        if (get_class($order) == 'WPSC_Purchase_Log') {//WpEcommerce
            $wpdb->insert($wpdb->prefix . 'wpsc_paybox_payment', array(
                'order_id' => $order->get('id'),
                'type' => $type,
                'data' => serialize($data),
            ));
        }
        if (get_class($order) == 'WC_Order') {//WooCommerce
            $wpdb->insert($wpdb->prefix . 'wc_paybox_payment', array(
                'order_id' => $order->id,
                'type' => $type,
                'data' => serialize($data),
            ));
        }
    }

    /**
     * @params $order Order
     * @params string $type Type of payment (standard or threetime)
     * @params array $additionalParams Additional parameters
     */
    public function buildSystemParams($order, $type, array $additionalParams = array()) {
        global $wpdb;

        if (get_class($order) == 'WPSC_Purchase_Log') {//WpEcommerce
//            $data = $order->get_data();
            $orderID = $order->get('id');
            $order_total = floatval($order->get('totalprice'));
        }
        if (get_class($order) == 'WC_Order') {//WooCommerce
            $orderID = $order->id;
            $order_total = $order->order_total;
        }
        if (get_class($order) == 'stdClass') {//Shortcode
            $orderID = $order->id;
            $order_total = $order->amount;
        }

        // Parameters
        $values = array();

        // Merchant information
        $values['PBX_SITE'] = $this->_config->getSite();
        $values['PBX_RANG'] = $this->_config->getRank();
        $values['PBX_IDENTIFIANT'] = $this->_config->getIdentifier();

        // Order information
        $values['PBX_PORTEUR'] = $this->getBillingEmail($order);
        $values['PBX_DEVISE'] = $this->getCurrency();
        $values['PBX_CMD'] = $orderID . ' - ' . $this->getBillingName($order);

        // Amount
        $orderAmount = floatval($order_total);
        $amountScale = $this->_currencyDecimals[$values['PBX_DEVISE']];
        $amountScale = pow(10, $amountScale);
        switch ($type) {
            case 'standard':
                $delay = $this->_config->getDelay();
                if ($delay > 0) {
                    if ($delay > 7) {
                        $delay = 7;
                    }
                    $values['PBX_DIFF'] = sprintf('%02d', $delay);
                }
                $values['PBX_TOTAL'] = sprintf('%03d', round($orderAmount * $amountScale));
                break;

            case 'threetime':
                // Compute each payment amount
                $step = round($orderAmount * $amountScale / 3);
                $firstStep = ($orderAmount * $amountScale) - 2 * $step;
                $values['PBX_TOTAL'] = sprintf('%03d', $firstStep);
                $values['PBX_2MONT1'] = sprintf('%03d', $step);
                $values['PBX_2MONT2'] = sprintf('%03d', $step);

                // Payment dates
                $now = new DateTime();
                $now->modify('1 month');
                $values['PBX_DATE1'] = $now->format('d/m/Y');
                $now->modify('1 month');
                $values['PBX_DATE2'] = $now->format('d/m/Y');

                // Force validity date of card
                $values['PBX_DATEVALMAX'] = $now->format('ym');
                break;

            default:
                $message = $this->_messages['error']['unexpected-type'];
                $message = sprintf($message, $type);
                throw new Exception($message);
        }

        // 3D Secure
        switch ($this->_config->get3DSEnabled()) {
            case 'never':
                $enable3ds = false;
                break;
            case null:
            case 'always':
                $enable3ds = true;
                break;
            case 'conditional':
                $tdsAmount = $this->_config->get3DSAmount();
                $enable3ds = empty($tdsAmount) || ($orderAmount >= $tdsAmount);
                break;
            default:
                $message = $this->_messages['error']['unexpected-3dstatus'];
                $message = sprintf($message, $this->_config->get3DSEnabled());
                throw new Exception($message);
        }
        // Enable is the default behaviour
        if (!$enable3ds) {
            $values['PBX_3DS'] = 'N';
        }

        // Paybox => Magento
        $values['PBX_RETOUR'] = 'M:M;R:R;T:T;A:A;B:B;C:C;D:D;E:E;F:F;G:G;I:I;J:J;N:N;O:O;P:P;Q:Q;S:S;W:W;Y:Y;K:K';
        $values['PBX_RUF1'] = 'POST';

        // Choose correct language
        $lang = get_locale();
        if (!empty($lang)) {
            $lang = preg_replace('#_.*$#', '', $lang);
        }
        $languages = $this->getLanguages();
        if (!array_key_exists($lang, $languages)) {
            $lang = 'default';
        }
        $values['PBX_LANGUE'] = $languages[$lang];

        // Choose page format depending on browser/devise
        if ($this->isMobile()) {
            $values['PBX_SOURCE'] = 'XHTML';
        }

        // Misc.
        $values['PBX_TIME'] = date('c');
        $values['PBX_HASH'] = strtoupper($this->_config->getHmacAlgo());

        // Adding additionnal informations
        $values = array_merge($values, $additionalParams);

        // Sort parameters for simpler debug
        ksort($values);

        // Sign values
        $sign = $this->signValues($values);

        // Hash HMAC
        $values['PBX_HMAC'] = $sign;

        return $values;
    }

    public function convertParams(array $params) {
        $result = array();
        foreach ($this->_resultMapping as $param => $key) {
            if (isset($params[$param]))
                $result[$key] = utf8_encode($params[$param]);
        }

        return $result;
    }

    public function getBillingEmail($order) {
        if (get_class($order) == 'WPSC_Purchase_Log') {//WpEcommerce
            global $wpdb;
            $sql = 'select value'
                    . ' from `' . WPSC_TABLE_SUBMITTED_FORM_DATA . '` d'
                    . ' join `' . WPSC_TABLE_CHECKOUT_FORMS . '` n on (n.id = d.form_id)'
                    . ' where n.unique_name = "billingemail" and d.log_id = %d';
            $sql = $wpdb->prepare($sql, $order->get('id'));
            return $wpdb->get_var($sql);
        }
        if (get_class($order) == 'WC_Order') {//WooCommerce
            return $order->billing_email;
        }
        if (get_class($order) == 'stdClass') {//Shortcode
            return 'guillaume.jara@bm-services.com';
        }
    }

    public function getBillingName($order) {
        if (get_class($order) == 'WPSC_Purchase_Log') {//WpEcommerce
            global $wpdb;
            $sql = 'select value'
                    . ' from `' . WPSC_TABLE_SUBMITTED_FORM_DATA . '` d'
                    . ' join `' . WPSC_TABLE_CHECKOUT_FORMS . '` n on (n.id = d.form_id)'
                    . ' where n.unique_name = "%s" and d.log_id = %d';
            $sql2 = $wpdb->prepare($sql, 'billingfirstname', $order->get('id'));
            $firstname = $wpdb->get_var($sql2);
            $sql2 = $wpdb->prepare($sql, 'billinglastname', $order->get('id'));
            $lastname = $wpdb->get_var($sql2);

            $name = $firstname . ' ' . $lastname;
            $name = remove_accents($name);
            $name = trim(preg_replace('/[^-. a-zA-Z0-9]/', '', $name));
        }
        if (get_class($order) == 'WC_Order') {//WooCommerce
            $name = $order->billing_first_name . ' ' . $order->billing_last_name;
            $name = remove_accents($name);
            $name = trim(preg_replace('/[^-. a-zA-Z0-9]/', '', $name));
        }
        if (get_class($order) == 'stdClass') {//Shortcode
            $name = $order->name;
            if(!empty($order->params)){
                $name .= ' - ' . $order->params;
            }
        }
        return $name;
    }

    public function getClientIp() {
        $ipaddress = '';
        if ($_SERVER['HTTP_CLIENT_IP'])
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if ($_SERVER['HTTP_X_FORWARDED_FOR'])
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if ($_SERVER['HTTP_X_FORWARDED'])
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if ($_SERVER['HTTP_FORWARDED_FOR'])
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if ($_SERVER['HTTP_FORWARDED'])
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if ($_SERVER['REMOTE_ADDR'])
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';

        return $ipaddress;
    }

    public function getCurrency() {
        return Paybox_Iso4217Currency::getIsoCode(get_woocommerce_currency());
    }

    public function getLanguages() {
        return array(
            'fr' => 'FRA',
            'es' => 'ESP',
            'it' => 'ITA',
            'de' => 'DEU',
            'nl' => 'NLD',
            'sv' => 'SWE',
            'pt' => 'PRT',
            'default' => 'GBR',
        );
    }

    public function getOrderPayments($orderId, $type, $class) {
        global $wpdb;
        if ($class == 'WPSC_Purchase_Log') {//WpEcommerce
            $sql = 'select * from ' . $wpdb->prefix . 'wpsc_paybox_payment where order_id = %d and type = %s';
        }
        if ($class == 'WC_Order') {//WooCommerce
            $sql = 'select * from ' . $wpdb->prefix . 'wc_paybox_payment where order_id = %d and type = %s';
        }
        $sql = $wpdb->prepare($sql, $orderId, $type);
        return $wpdb->get_row($sql);
    }

    public function getParams() {
        // Retrieves data
        $data = file_get_contents('php://input');
        if (empty($data)) {
            $data = $_SERVER['QUERY_STRING'];
        }
        if (empty($data)) {
            $message = $this->_messages['error']['paybox-noparameters'];
            throw new Exception($message);
        }

        // Extract signature
        $matches = array();
        if (!preg_match('#^(.*)&K=(.*)$#', $data, $matches)) {
            $message = $this->_messages['error']['paybox-missing-signature'];
            throw new Exception($message);
        }

        // Check signature
        $signature = base64_decode(urldecode($matches[2]));
        $pubkey = file_get_contents(dirname(__FILE__) . '/pubkey.pem');
        $res = (boolean) openssl_verify($matches[1], $signature, $pubkey);

        if (!$res) {
            if (preg_match('#^s=i&(.*)&K=(.*)$#', $data, $matches)) {
                $signature = base64_decode(urldecode($matches[2]));
                $res = (boolean) openssl_verify($matches[1], $signature, $pubkey);
            }

            if (!$res) {
                $message = $this->_messages['error']['paybox-invalid-signature'];
                throw new Exception($message);
            }
        }

        $rawParams = array();
        parse_str($data, $rawParams);

        // Decrypt params
        $params = $this->convertParams($rawParams);
        if (empty($params)) {
            $message = $this->_messages['error']['paybox-noparameters'];
            throw new Exception($message);
        }

        return $params;
    }

    public function getSystemUrl() {
        $urls = $this->_config->getSystemUrls();
        if (empty($urls)) {
            $message = $this->_messages['error']['paybox-missing-url'];
            throw new Exception($message);
        }

        // look for valid peer
        $error = null;
        foreach ($urls as $url) {
            $testUrl = preg_replace('#^([a-zA-Z0-9]+://[^/]+)(/.*)?$#', '\1/load.html', $url);

            $connectParams = array(
                'timeout' => 5,
                'redirection' => 0,
                'user-agent' => 'Woocommerce Paybox module',
            );
            try {
                $response = wp_remote_get($testUrl, $connectParams);
                if (is_array($response) && ($response['response']['code'] == 200)) {
                    if (preg_match('#<div id="server_status" style="text-align:center;">OK</div>#', $response['body']) == 1) {
                        return $url;
                    }
                }
            } catch (Exception $e) {
                $error = $e;
            }
        }

        // Here, there's a problem
        $message = $this->_messages['error']['paybox-not-available'];
        throw new Exception($message);
    }

    public function isMobile() {
        // From http://detectmobilebrowsers.com/, regexp of 09/09/2013
        global $_SERVER;
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i', $userAgent)) {
            return true;
        }
        if (preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($userAgent, 0, 4))) {
            return true;
        }
        return false;
    }

    public function paybox_button($params) {
        $paybox_params = shortcode_atts(array(
            'button-label' => 'Paid',
            'amount' => 0,
            'mail' => 0,
            'currency' => 0,
            'params' => 0
                ), $params);

        $option_value = get_option('paybox_api_page_id');
        $page_object = get_post($option_value);
        $url = get_permalink($page_object);
        $html = '<form id="pbxep_form" method="post" action="' . esc_url($url) . '" enctype="application/x-www-form-urlencoded">';

        $crypto = new PayboxEncrypt();
        $html .= '<input type="submit" value="' . $paybox_params['button-label'] . '" />';
        $html .= '<input type="hidden" name="ammount" value="' . $crypto->encrypt($paybox_params['amount']) . '" />';
        $html .= '<input type="hidden" name="currency" value="' . $crypto->encrypt($paybox_params['currency']) . '" />';
        $html .= '<input type="hidden" name="mail" value="' . $crypto->encrypt($paybox_params['mail']) . '" />';
        $html .= '<input type="hidden" name="params" value="' . $crypto->encrypt($paybox_params['params']) . '" />';
        $html .= '</form>';

        return $html;
    }

    public function controller() {
        $status = !empty($_GET['status']) ? $_GET['status'] : false;
        $orderClass = 'stdClass';

        if (!$status) {
            $data = $_POST;
            $urls = array(
                'PBX_ANNULE' => get_permalink(get_option('paybox_cancel_page_id')),
                'PBX_EFFECTUE' => get_permalink(get_option('paybox_success_page_id')),
                'PBX_REFUSE' => get_permalink(get_option('paybox_failed_page_id')),
                'PBX_REPONDRE_A' => get_permalink(get_option('paybox_cancel_page_id')),
            );

            $crypto = new PayboxEncrypt();
            $order = new stdClass();
            //increment id
            if(get_option('paybox_button_increment_id') === false){
                add_option('paybox_button_increment_id', 1);
            }
            $increment_id = (int)get_option('paybox_button_increment_id');
            $increment_id = $increment_id + 1;
            update_option('paybox_button_increment_id', $increment_id);
            $order->id = $increment_id;
            $order->amount = $crypto->decrypt($data['ammount']);
            $order->name = $crypto->decrypt($data['mail']);
            $order->currency = $data['currency'];
            $order->params = $crypto->decrypt($data['params']);
            $params = $this->buildSystemParams($order, 'standard', $urls);
            $orderAmount = floatval($order->amount);
            $amountScale = $this->_currencyDecimals[$params['PBX_DEVISE']];
            $amountScale = pow(10, $amountScale);
            $params['PBX_TOTAL'] = sprintf('%03d', round($orderAmount * $amountScale));
            $debugViewMsg = $this->_messages['info']['paybox-debug-view'];
            $redirectButtonMsg = $this->_messages['info']['paybox-redirect-button'];
            $continueMsg = $this->_messages['info']['paybox-continue'];
            $debug = $this->_config->isDebug();
            $url = $this->getSystemUrl();

            $html = '<form id="pbxep_form" method="post" action="' . esc_url($url) . '" enctype="application/x-www-form-urlencoded">';
            if ($debug) {
                $html .= $debugViewMsg;
            } else {
                $html .= $redirectButtonMsg;
                $html .= <<<EOF
                    <script type="text/javascript">
                    window.setTimeout(function () {
                        document.getElementById("pbxep_form").submit();
                    }, 1);
                </script>
EOF;
            }

            $html .= '<center><button>' . $continueMsg . '</button></center>';
            $type = $debug ? "text" : "hidden";
            foreach ($params as $name => $value) {
                $name = esc_attr($name);
                $value = esc_attr($value);
                if ($debug) {
                    $html .= '<p><label for = "' . $name . '">' . $name . '</label>';
                }
                $html .= '<input type = "' . $type . '" id = "' . $name . '" name = "' . $name . '" value = "' . $value . '" />';
                if ($debug) {
                    $html .= '</p > ';
                }
            }

            $html .= '</form>';
            return $html;
        }
    }

    private function _showDetailRow($label, $value) {
        return '<strong>' . $label . '</strong> ' . __($value, 'paybox');
    }

    public function showDetails($orderId, $class, $type) {

        if ($type == 'standard') {
            $payment = $this->getOrderPayments($orderId, 'capture', $class);
            if (!empty($payment)) {
                $data = unserialize($payment->data);
                $rows = array();
                $rows[] = $this->_showDetailRow($this->_messages['fields']['paybox-fields-reference'], $data['reference']);
                if (isset($data['ip'])) {
                    $rows[] = $this->_showDetailRow($this->_messages['fields']['paybox-fields-country'], $data['ip']);
                }
                $rows[] = $this->_showDetailRow($this->_messages['fields']['paybox-fields-processing-date'], preg_replace('/^([0-9]{2})([0-9]{2})([0-9]{4})$/', '$1/$2/$3', $data['date']) . " - " . $data['time']);
                if (isset($data['firstNumbers']) && isset($data['lastNumbers'])) {
                    $rows[] = $this->_showDetailRow($this->_messages['fields']['paybox-fields-card-numbers'], $data['firstNumbers'] . '...' . $data['lastNumbers']);
                }
                if (isset($data['validity'])) {
                    $rows[] = $this->_showDetailRow($this->_messages['fields']['paybox-fields-validity-date'], preg_replace('/^([0-9]{2})([0-9]{2})$/', '$2/$1', $data['validity']));
                }
                $rows[] = $this->_showDetailRow($this->_messages['fields']['paybox-fields-transaction'], $data['transaction']);
                $rows[] = $this->_showDetailRow($this->_messages['fields']['paybox-fields-call'], $data['call']);
                $rows[] = $this->_showDetailRow($this->_messages['fields']['paybox-fields-authorization'], $data['authorization']);

                echo '<h4>' . $this->_messages['fields']['paybox-fields-information'] . '</h4>';
                echo '<p>' . implode('<br/>', $rows) . '</p>';
            }
        }
        if ($type == 'threetime') {
            $payment = $this->getOrderPayments($orderId, 'first_payment', $class);
            if (!empty($payment)) {
                $data = unserialize($payment->data);
                $payment = $this->getOrderPayments($orderId, 'second_payment', $class);
                if (!empty($payment)) {
                    $second = unserialize($payment->data);
                }
                $payment = $this->getOrderPayments($orderId, 'third_payment', $class);
                if (!empty($payment)) {
                    $third = unserialize($payment->data);
                }

                $rows = array();
                $rows[] = $this->_showDetailRow($this->_messages['fields']['paybox-fields-reference'], $data['reference']);
                if (isset($data['ip'])) {
                    $rows[] = $this->_showDetailRow($this->_messages['fields']['paybox-fields-country'], $data['ip']);
                }
                $rows[] = $this->_showDetailRow($this->_messages['fields']['paybox-fields-processing-date'], preg_replace('/^([0-9]{2})([0-9]{2})([0-9]{4})$/', '$1/$2/$3', $data['date']) . " - " . $data['time']);
                if (isset($data['firstNumbers']) && isset($data['lastNumbers'])) {
                    $rows[] = $this->_showDetailRow($this->_messages['fields']['paybox-fields-card-numbers'], $data['firstNumbers'] . '...' . $data['lastNumbers']);
                }
                if (isset($data['validity'])) {
                    $rows[] = $this->_showDetailRow($this->_messages['fields']['paybox-fields-validity-date'], preg_replace('/^([0-9]{2})([0-9]{2})$/', '$2/$1', $data['validity']));
                }

                $date = preg_replace('/^([0-9]{2})([0-9]{2})([0-9]{4})$/', '$1/$2/$3', $data['date']);
                $value = sprintf('%s (%s)', $data['amount'] / 100.0, $date);
                $rows[] = $this->_showDetailRow($this->_messages['fields']['paybox-fields-first-debit'], $value);

                if (isset($second)) {
                    $date = preg_replace('/^([0-9]{2})([0-9]{2})([0-9]{4})$/', '$1/$2/$3', $second['date']);
                    $value = sprintf('%s (%s)', $second['amount'] / 100.0, $date);
                } else {
                    $value = $this->_messages['fields']['paybox-fields-not-achieve'];
                }
                $rows[] = $this->_showDetailRow($this->_messages['fields']['paybox-fields-second-debit'], $value);

                if (isset($third)) {
                    $date = preg_replace('/^([0-9]{2})([0-9]{2})([0-9]{4})$/', '$1/$2/$3', $third['date']);
                    $value = sprintf('%s (%s)', $third['amount'] / 100.0, $date);
                } else {
                    $value = $this->_messages['fields']['paybox-fields-not-achieve'];
                }
                $rows[] = $this->_showDetailRow($this->_messages['fields']['paybox-fields-third-debit'], $value);

                $rows[] = $this->_showDetailRow($this->_messages['fields']['paybox-fields-transaction'], $data['transaction']);
                $rows[] = $this->_showDetailRow($this->_messages['fields']['paybox-fields-call'], $data['call']);
                $rows[] = $this->_showDetailRow($this->_messages['fields']['paybox-fields-authorization'], $data['authorization']);

                echo '<h4>' . $this->_messages['fields']['paybox-fields-information'] . '</h4>';
                echo '<p>' . implode('<br/>', $rows) . '</p>';
            }
        }
    }

    public function signValues(array $values) {
        // Serialize values
        $params = array();
        foreach ($values as $name => $value) {
            $params[] = $name . '=' . $value;
        }
        $query = implode('&', $params);

        // Prepare key
        $key = pack('H*', $this->_config->getHmacKey());

        // Sign values
        $sign = hash_hmac($this->_config->getHmacAlgo(), $query, $key);
        if ($sign === false) {
            $errorMsg = $this->_messages['error']['paybox-hmac-signature-create'];
            throw new Exception($errorMsg);
        }

        return strtoupper($sign);
    }

    public function toErrorMessage($code) {
        if (isset($this->_errorCode[$code])) {
            return $this->_errorCode[$code];
        }

        return 'Unknown error ' . $code;
    }

    /**
     * Load order from the $token
     * @param string $token Token (@see tokenizeOrder)
     * @return Mage_Sales_Model_Order
     */
    public function untokenizeOrder($token, $class) {
        $parts = explode(' - ', $token, 2);
        if (count($parts) < 2) {
            $message = $this->_messages['error']['paybox-invalid-decrypted-token'];
            throw new Exception(sprintf($message, $token));
        }

        // Retrieves order
        if ($class == 'WPSC_Purchase_Log') {//WpEcommerce
            // Retrieves order
            $order = new WPSC_Purchase_Log($parts[0]);
            if (!$order->exists()) {
                $message = $this->_messages['error']['paybox-token-order-id'];
                throw new Exception(sprintf($message, $token));
            }
        }
        if ($class == 'WC_Order') {//WooCommerce
            $order = new WC_Order($parts[0]);
            if (empty($order->id)) {
                $message = $this->_messages['error']['paybox-token-order-id'];
                throw new Exception(sprintf($message, $token));
            }
        }


        $name = $this->getBillingName($order);
        if (($name != utf8_decode($parts[1])) && ($name != $parts[1])) {
            $message = $this->_messages['error']['paybox-token-concistency-error'];
            throw new Exception(sprintf($message, $token));
        }

        return $order;
    }

    public function on_ipn($class, $type) {
        global $wpdb;

        $params = $this->getParams();

        if ($params === false) {
            return;
        }

        $order = $this->untokenizeOrder($params['reference'], $class);

        // Check required parameters
        $requiredParams = array('amount', 'transaction', 'error', 'reference', 'sign', 'date', 'time');
        foreach ($requiredParams as $requiredParam) {
            if (!isset($params[$requiredParam])) {
                $message = $this->_messages['error']['paybox-call-parameter-missing'];
                $message = sprintf($message, $requiredParam);
                $this->addOrderNote($order, $message);
                throw new Exception($message);
            }
        }

        // Payment success
        if ($params['error'] == '00000') {
            switch ($type) {
                case 'standard':
                    $message = $this->_messages['info']['paybox-authorized-captured'];
                    $this->addOrderNote($order, $message);
                    if ($class == 'WC_Order') {//WooCommerce
                        $order->payment_complete($params['transaction']);
                    }
                    if ($class == 'WPSC_Purchase_Log') {//WpEcommerce
                        wpsc_update_purchase_log_status($order->get('id'), 3);
                    }
                    $this->addOrderPayment($order, 'capture', $params);
                    break;

                case 'threetime':
                    if ($class == 'WC_Order') {//WooCommerce
                        $sql = 'select distinct type from ' . $wpdb->prefix . 'wc_paybox_payment where order_id = ' . $order->id;
                    }
                    if ($class == 'WPSC_Purchase_Log') {//WpEcommerce
                        $sql = 'select distinct type from ' . $wpdb->prefix . 'wpsc_paybox_payment where order_id = ' . $order->id;
                    }
                    $done = $wpdb->get_col($sql);
                    if (!in_array('first_payment', $done)) {
                        $message = $this->_messages['info']['paybox-authorized-captured'];
                        $this->addOrderNote($order, $message);
                        if ($class == 'WC_Order') {//WooCommerce
                            $order->payment_complete($params['transaction']);
                        }
                        if ($class == 'WPSC_Purchase_Log') {//WpEcommerce
                            wpsc_update_purchase_log_status($order->get('id'), 3);
                        }
                        $this->addOrderPayment($order, 'first_payment', $params);
                    } else if (!in_array('second_payment', $done)) {
                        $message = $this->_messages['info']['paybox-second-captured'];
                        $this->addOrderNote($order, $message);
                        $this->addOrderPayment($order, 'second_payment', $params);
                    } else if (!in_array('third_payment', $done)) {
                        $message = $this->_messages['info']['paybox-third-captured'];
                        $this->addOrderNote($order, $message);
                        $this->addOrderPayment($order, 'third_payment', $params);
                    } else {
                        $message = $this->_messages['error']['paybox-three-time-invalid'];
                        $this->addOrderNote($order, $message);
                        throw new Exception($message);
                    }
                    break;

                default:
                    $message = $this->_messages['error']['unexpected-type'];
                    $message = sprintf($message, $type);
                    $this->addOrderNote($order, $message);
                    throw new Exception($message);
            }
        }

        // Payment refused
        else {
            $message = $this->_messages['error']['paybox-payment-refused'];
            $error = $this->toErrorMessage($params['error']);
            $message = sprintf($message, $error);
            $this->addOrderNote($order, $message);
        }
    }

    public function on_payment_canceled($class) {
        try {
            $params = $this->getParams();
            if ($params !== false) {
                $order = $this->untokenizeOrder($params['reference'], $class);
                $message = $this->_messages['info']['paybox-payment-user-canceled'];

                if ($class == 'WC_Order') {//WooCommerce
                    $order->cancel_order($message);
                    $message = $this->_messages['info']['paybox-payment-canceled'];
                    $this->addCartErrorMessage($message);
                }
                if ($class == 'WPSC_Purchase_Log') {//WpEcommerce
                    $this->addOrderNote($order, $message);
                    wpsc_update_purchase_log_status($order->get('id'), 6);
                }
            }
        } catch (Exception $e) {
            // Ignore
        }

        $this->redirectToCheckout($class);
    }

    public function on_payment_failed($class) {
        try {
            $params = $this->getParams();
            if ($params !== false) {
                $order = $this->untokenizeOrder($params['reference'], $class);
                $message = $this->_messages['info']['paybox-user-back'];
                $message .= ' ' . $this->_messages['error']['paybox-payment-refuse'];

                if ($class == 'WC_Order') {//WooCommerce
                    $order->cancel_order($message);
                    $message = $this->_messages['error']['paybox-payment-refuse'];
                    $this->addCartErrorMessage($message);
                }
                if ($class == 'WPSC_Purchase_Log') {//WpEcommerce
                    $this->addOrderNote($order, $message);
                    wpsc_update_purchase_log_status($order->get('id'), 6);
                }
            }
        } catch (Exception $e) {
            // Ignore
        }

        $this->redirectToCheckout($class);
    }

    public function on_payment_succeed($class) {
        try {
            $params = $this->getParams();
            if ($params !== false) {
                $order = $this->untokenizeOrder($params['reference'], $class);
                $message = $this->_messages['info']['paybox-user-back'];
                $this->addOrderNote($order, $message);

                if ($class == 'WC_Order') {//WooCommerce
                    WC()->cart->empty_cart();
                    wp_redirect($order->get_checkout_order_received_url());
                    die();
                }
                if ($class == 'WPSC_Purchase_Log') {//WpEcommerce
                    global $wpsc_cart;
                    $wpsc_cart->empty_cart();
                    wp_redirect(get_option('transact_url') . '&sessionid=' . $order->get('sessionid'));
                    die();
                }
            }
        } catch (Exception $e) {
            // Ignore
        }

        $this->redirectToCheckout($class);
    }

    public function redirectToCheckout($class) {
        if ($class == 'WC_Order') {//WooCommerce
            wp_redirect(WC()->cart->get_cart_url());
            die();
        }
        if ($class == 'WPSC_Purchase_Log') {//WpEcommerce
            wp_redirect(get_option('shopping_cart_url'));
            exit();
        }
    }

}
