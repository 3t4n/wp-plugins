<?php
class AmwalPay
{
    public static function excuse_hook_javascript($amount, $setting, $refNumber)
    {
        $locale = get_locale(); // Get the current language locale
        $currentDate = new DateTime();
        $datetime = $currentDate->format('YmdHis');

        // if $locale content en make $locale = "en"
        if (strpos($locale, 'en') !== false) {
            $locale = "en";
        } else {
            $locale = "ar";
        }

        // Generate secure hash
        $secret_key = self::generateString(
            $amount,
            512,
            $setting['merchant_id'],
            $refNumber
            ,
            $setting['terminal_id'],
            $setting['secret_key'],
            $datetime
        );

        $data = (object) [
            'AmountTrxn' => "$amount",
            'MerchantReference' => "$refNumber",
            'MID' => $setting['merchant_id'],
            'TID' => $setting['terminal_id'],
            'CurrencyId' => 512,
            'LanguageId' => $locale,
            'SecureHash' => $secret_key,
            'TrxDateTime' => $datetime,
            'PaymentViewType' => 1,
            'RequestSource' => 'Checkout_WooCommerce',
            'SessionToken' => '',
        ];

        $jsonData = wp_json_encode($data);
        AmwalPay::addLogs('1', WC_LOG_DIR . 'amwalpay.log', esc_html__('Payment Request: ', 'amwalpay-for-woocommerce'), print_r($data, 1));
        return $jsonData;
    }
    public static function generateString(
        $amount,
        $currencyId,
        $merchantId,
        $merchantReference,
        $terminalId,
        $hmacKey,
        $trxDateTime
    ) {

        $string = "Amount={$amount}&CurrencyId={$currencyId}&MerchantId={$merchantId}&MerchantReference={$merchantReference}&RequestDateTime={$trxDateTime}&SessionToken=&TerminalId={$terminalId}";

        $sign = self::encryptWithSHA256($string, $hmacKey);
        return strtoupper($sign);
    }

    public static function encryptWithSHA256($input, $hexKey)
    {
        // Convert the hex key to binary
        $binaryKey = hex2bin($hexKey);
        // Calculate the SHA-256 hash using hash_hmac
        $hash = hash_hmac('sha256', $input, $binaryKey);
        return $hash;
    }
    public static function generateStringForFilter(
        $data,
        $hmacKey

    ) {
        // Convert data array to string key value with and sign
        $string = '';
        foreach ($data as $key => $value) {
            $string .= $key . '=' . ($value === "null" || $value === "undefined" ? '' : $value) . '&';
        }
        $string = rtrim($string, '&');
        // Generate SIGN
        $sign = self::encryptWithSHA256($string, $hmacKey);
        return strtoupper($sign);
    }
    public static function sanitizeVar($name, $global = 'GET')
    {
        if (isset($GLOBALS['_' . $global][$name])) {
            if (is_array($GLOBALS['_' . $global][$name])) {
                return $GLOBALS['_' . $global][$name];
            }
            return htmlspecialchars($GLOBALS['_' . $global][$name], ENT_QUOTES);
        }
        return null;
    }

    public static function addLogs($debug, $file, $note, $data = false)
    {
        if (is_bool($data)) {
            ('1' === $debug) ? error_log(PHP_EOL . gmdate('d.m.Y h:i:s') . ' - ' . $note, 3, $file) : false;
        } else {
            ('1' === $debug) ? error_log(PHP_EOL . gmdate('d.m.Y h:i:s') . ' - ' . $note . ' -- ' . json_encode($data), 3, $file) : false;
        }
    }

}