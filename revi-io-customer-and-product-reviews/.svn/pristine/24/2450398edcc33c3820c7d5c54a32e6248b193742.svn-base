<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class reviGeneralModel
{
    var $REVI_API_URL;
    var $prefix;
    var $wpdb;

    public function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->prefix = $this->wpdb->prefix;
        $this->REVI_API_URL = REVI_API_URL;
    }

    /////////// URL NEW REVIEW ///////////////

    public function getNewReviewUrl($idOrder, $medium = 1, $email = '')
    {
        $wc_order = wc_get_order($idOrder);

        if (!empty($wc_order)) {
            return '';
        }

        $iso_country = $wc_order->get_shipping_country();
        $lang = $this->getOrderLang($idOrder, $iso_country);
        $customer_firstname = $wc_order->get_billing_first_name();
        $customer_lastname = $wc_order->get_billing_last_name();
        $email = $wc_order->get_billing_email();
        $currency = $wc_order->get_currency();
        $total_paid = $wc_order->get_total();
        $date_order = $wc_order->get_date_created()->date('Y-m-d H:i:s');

        return $this->reviCURL($this->REVI_API_URL . 'createNewReviewLink', 'POST', [
            'id_external_order' => $idOrder,
            'iso_code' => $lang,
            'customer_firstname' => $customer_firstname,
            'customer_lastname' => $customer_lastname,
            'email' => $email,
            'currency' => $currency,
            'total_paid' => $total_paid,
            'date_order' => $date_order,
            'medium' => $medium, // 1 Popup | 2 Order history
        ]);
    }

    private function getOrderLang($idOrder, $iso_country)
    {
        $lang = get_post_meta($idOrder, 'wpml_language', true);
        if (!empty($lang) && strlen($lang) >= 2) {
            $lang = substr($lang, 0, 2);
        } else if (!empty($iso_country) && strlen($iso_country) >= 2) {
            $lang = substr($iso_country, 0, 2);
        } else {
            $lang = get_option('REVI_SELECTED_LANGUAGE');
        }
        return $lang;
    }



    /////////////// UPDATE CONFIGURATION ///////////////

    public function updateConfiguration()
    {
        $result = $this->reviCURL($this->REVI_API_URL . 'connectedPlatformSettings', 'GET');

        if (!isset($result->settings)) {
            update_option('REVI_SUBSCRIPTION', '0');
            return false;
        }

        $settings = $result->settings;

        if ($settings->widgets) {

            // Podemos guardar todo en un solo campo
            update_option('REVI_WIDGETS', json_encode($settings->widgets));

            foreach ($settings->widgets as $widget) {
                update_option('REVI_WIDGET_' . $widget->type->name, $widget->hashID);
            }
        }

        update_option('REVI_LANG', $settings->default_language);
        update_option('REVI_SUBSCRIPTION', $settings->subscription_plan);

        update_option('REVI_SELECTED_LANGUAGE', $settings->default_language); //lo inicializamos, luego se sobreescribe si lo cambia
        update_option('REVI_ACTIVE_LANGUAGES', json_encode($settings->languages));

        return true;
    }

    public function sendModuleVersion()
    {
        $plugin_data = get_plugin_data(WP_PLUGIN_DIR . '/revi-io-customer-and-product-reviews/revi.php');
        $plugin_version = $plugin_data['Version'];

        $this->reviCURL($this->REVI_API_URL . 'moduleVersion', 'POST', ['version' => $plugin_version]);

        update_option('REVI_MODULE_VERSION', $plugin_version);
    }

    public function checkModuleMessage()
    {
        $plugin_data = get_plugin_data(WP_PLUGIN_DIR . '/revi-io-customer-and-product-reviews/revi.php');
        $plugin_version = $plugin_data['Version'];

        return $this->reviCURL($this->REVI_API_URL . 'checkModuleMessage', 'POST', ['version' => $plugin_version]);
    }

    /////////////// CURL ///////////////

    public function reviCURL($url, $request_type = 'GET', $data = array(), $json_decode = true, $debug = false)
    {
        // Requests::register_autoloader(); // Requests initialize

        $headers = array(
            'Accept' => 'application/json',
            'Content-Type' => 'application/x-www-form-urlencoded',
            'X-API-KEY' => get_option('REVI_API_KEY'),
        );

        $options = array(
            'follow_redirects' => true, // Follow 3xx redirects?
            'timeout' => 30, // How long should we wait for a response?
            'connect_timeout' => 30, // How long should we wait while trying to connect?
        );

        $args = $options;
        $args['headers'] = $headers;
        $args['body'] = $data;

        if ($request_type == "GET") {
            $request = wp_remote_get($url, $args);
        } elseif ($request_type == "POST") {
            $request = wp_remote_post($url, $args);
        }

        if ($debug) {
            echo "<pre>";
            var_dump(wp_remote_retrieve_body($request));
            echo "</pre>";
        }

        $result_response = wp_remote_retrieve_body($request);
        if ($json_decode) {
            return json_decode($result_response);
        }
        return $result_response;
    }
}
