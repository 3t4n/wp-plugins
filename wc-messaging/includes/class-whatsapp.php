<?php
if (!class_exists('WCWhatsapp')) {
    class WCWhatsapp
    {

        private $base_url;
        private $access_token;

        // initialise all variables
        function __construct()
        {

            $this->base_url    = $this->get_wa_baseurl();
            $this->access_token = $this->get_wa_token();
        }


        private function get_wa_token()
        {
            if (!defined('DEFAULT_WA_ACCESS_TOKEN')) {
                $token = get_option('woom_whatsapp_api', '');
            } else {

                $token = DEFAULT_WA_ACCESS_TOKEN;
            }

            return $token;
        }
        private function get_wa_baseurl($slug = 'messages', $version = "v17.0", $has_number_id = true)
        {
            $woom_whatsapp_number_id = get_option('woom_whatsapp_number_id', '');

            $base_url = array('https://graph.facebook.com/' . $version);
            if ($has_number_id && $woom_whatsapp_number_id !== '') {
                $base_url[] = $woom_whatsapp_number_id;
            }
            if (!empty($slug)) {
                $base_url[] = $slug;
            }
            return implode('/', $base_url);
        }

        /**
         * Accept phone number and return cleaned phone without + sign or spaces
         * 
         * @param mixed $mobile
         * @return string|string[]
         * @since 2.0.0
         */
        public function clean_phone_number($mobile)
        {
            return str_replace([' ', '+'], '', $mobile);
        }


        function sync_message_templates()
        {
            $number_id = get_option('woom_wb_account_ID', '');
            $api_version = 'v18.0';
            $url = array('https://graph.facebook.com', $api_version, $number_id, 'message_templates');
            $url = esc_url(implode('/', $url));
            $headers = array(
                'headers'     => array(
                    'Authorization' => 'Bearer ' . $this->access_token,
                )
            );

            $request = wp_remote_get($url, $headers);
            if (is_wp_error($request) || wp_remote_retrieve_response_code($request) != 200) {
                $error_data = json_decode(wp_remote_retrieve_body($request));
                $err_message = __("Something went wrong...", 'wc-messaging');
                if (isset($error_data->error->message)) {
                    $err_message = $error_data->error->message;
                }
                return array("data" => $error_data, "success" => false, "message" => $err_message);
            } else {
                $response = wp_remote_retrieve_body($request);
                $templates = json_decode($response);
                return array("data" => json_decode($response), "success" => true, "message" => __('Templates fetched successfully', 'wc-messaging'));
            }
        }



        public function get_message_template($template_type = 'template', $template_id = null)
        {
            $woom_template_message = get_option('woom_wa_templates', array());
            $woom_template = array();
            foreach ($woom_template_message as $id => $template) {
                $allowed_formats = array('TEXT');
                if (in_array($template['format'], $allowed_formats)) {
                    if (!empty($template_type) && isset($template['type']) && $template['type'] === $template_type) {
                        $woom_template[$id] = $template;
                    } else if (is_null($template_type)) {
                        $woom_template[$id] = $template;
                    }
                }
            }
            if (!empty($template_id)) {
                return (isset($woom_template[$template_id])) ?  $woom_template[$template_id] : array();
            }
            return $woom_template;
        }

        /**
         * Function for get whatsapp templates by name
         * 
         * @param string $template_name
         * @param array $args
         * @return string
         * @since 1.0.0
         */
        public function woom_get_whatsapp_template_by_name($template_name = '', $args = array())
        {
            $templates = $this->get_message_template();
            $template = array();
            $templateHTML = '';
            foreach ($templates as $template_value) {
                if ($template_value['name'] === $template_name) {
                    if (array_key_exists('header_params_count', $template_value) && $template_value['header_params_count'] > 0) {
                        $header_parameters = array();

                        for ($i = 0; $i < $template_value['header_params_count']; $i++) {
                            $header_parameters['{{' . ($i + 1) . '}}'] = array_values($args['header'])[$i];
                        }
                        foreach ($header_parameters as $param_key => $param_val) {
                            $template_value['Header'] = str_replace($param_key, $param_val, $template_value['Header']);
                        }
                    }
                    if (array_key_exists('body_params_count', $template_value) && $template_value['body_params_count'] > 0) {
                        $body_parameters = array();

                        for ($i = 0; $i < $template_value['body_params_count']; $i++) {
                            $body_parameters['{{' . ($i + 1) . '}}'] = array_values($args['body'])[$i];
                        }
                        foreach ($body_parameters as $param_key => $param_val) {
                            $template_value['Body'] = str_replace($param_key, $param_val, $template_value['Body']);
                        }
                    }
                    if (array_key_exists('footer_params_count', $template_value) && $template_value['footer_params_count'] > 0) {
                        $footer_parameters = array();

                        for ($i = 0; $i < $template_value['footer_params_count']; $i++) {
                            $footer_parameters['{{' . ($i + 1) . '}}'] = array_values($args['footer'])[$i];
                        }
                        foreach ($footer_parameters as $param_key => $param_val) {
                            $template_value['Footer'] = str_replace($param_key, $param_val, $template_value['Footer']);
                        }
                    }
                    $template = $template_value;
                }
            }
            if (count($template) > 0) {
                if (array_key_exists('Header', $template)) {
                    $templateHTML .= sprintf('<h3 class="woom-template-header">%s</h3>', $template['Header']);
                }
                if (array_key_exists('Body', $template)) {
                    $templateHTML .= sprintf('<div class="woom-template-body">%s</div>', $template['Body']);
                }
                if (array_key_exists('Footer', $template)) {
                    $templateHTML .= sprintf('<small class="woom-template-footer">%s</small>', $template['Footer']);
                }
            }
            return $templateHTML;
        }

        function get_template_parameters($parameters = array(), $type = "text")
        {
            $parameter_list = array();
            if (count($parameters) > 0) {
                foreach ($parameters as $parameter) {
                    $parameter_list[] = array(
                        'type' => 'text',
                        'text' => $parameter
                    );
                }
            }
            return $parameter_list;
        }

        function validate_parameters($mobile = '', $template_name = '', $language = '', $body_params = array(), $header_params = array())
        {
            $message = [];
            if (empty($template_name)) {
                $message[] = __('Template name is empty', 'wc-messaging');
            }
            if (empty($language)) {
                $message[] = __('Language is empty', 'wc-messaging');
            }
            if (!empty($body_params)) {
                $missing_params = [];
                foreach ($body_params as $param_key => $param_val) {
                    if (empty($param_val)) {
                        $missing_params[] = $param_key;
                    }
                }
                if (count($missing_params) > 0) {
                    $message[] = sprintf('%1$s: %2$s', __('Body parameters missing', 'wc-messaging'), implode(', ', $missing_params));
                }
            }
            if (!empty($header_params)) {

                $missing_params = [];
                foreach ($header_params as $param_key => $param_val) {
                    if (empty($param_val)) {
                        $missing_params[] = $param_key;
                    }
                }
                if (count($missing_params) > 0) {
                    $message[] = sprintf('%1$s: %2$s', __('Header parameters missing', 'wc-messaging'), implode(', ', $missing_params));
                }
            }
            if (count($message) > 0) {
                return array(
                    'success' => false,
                    'message' => implode('<br/>', $message)
                );
            }
            return array(
                'success' => true,
                'message' => 'Successful'
            );
        }

        /**
         * Send a message template via WhatsApp API.
         *
         * @param string $mobile The recipient's mobile number.
         * @param string $template_name The name of the message template.
         * @param string $language The language code for the template.
         * @param array $body_params (optional) Parameters to replace in the template body.
         * @param array $header_params (optional) Parameters to replace in the template header.
         * @return array The result of the API call with success status, message, and possibly the wam_id.
         */
        public function send_message_template($mobile, $template_name, $language, $body_params = array(), $header_params = array())
        {
            $result = $this->validate_parameters($mobile, $template_name, $language, $body_params, $header_params);
            if (!$result['success']) {
                return $result;
            }
            $mobile = $this->clean_phone_number($mobile);
            $wam_id = 0;
            // Constructing the template data
            $template_data = array(
                "name" => $template_name,
                "language" => array(
                    "code" => $language
                )
            );
            // Adding body parameters if present
            if (!empty($body_params)) {
                $template_data["components"][] = array(
                    "type" => "body",
                    "parameters" => $this->get_template_parameters($body_params, "text")
                );
            }

            // Adding header parameters if present
            if (!empty($header_params)) {
                $template_data["components"][] = array(
                    "type" => "header",
                    "parameters" => $this->get_template_parameters($header_params, "text")
                );
            }

            // Constructing the data array
            $data = array(
                "messaging_product" => "whatsapp",
                "recipient_type" => "individual",
                "to" => $mobile,
                "type" => "template",
                "template" => $template_data
            );
            $response = wp_remote_post($this->base_url, array(
                'body'    => wp_json_encode($data),
                'headers' => array(
                    'Authorization' => 'Bearer ' . $this->access_token,
                    'content-type' => 'application/json',
                ),
            ));

            if (is_wp_error($response)) {
                $error_message = $response->get_error_message();
                return array(
                    "success" => false,
                    'message' => $error_message
                );
            } else {
                // Decode the API response body
                $api_response = json_decode(wp_remote_retrieve_body($response), true);

                // Check if there's an error in the API response
                if (isset($api_response['error'])) {
                    $error_message = $api_response['error']['message'];
                    return array(
                        "success" => false,
                        'message' => __('API Error: ', 'wc-messaging') . $error_message
                    );
                }

                // Check for the message ID if there was no error
                if (isset($api_response['messages'][0]['id'])) {
                    $wam_id = $api_response['messages'][0]['id'];
                    return array(
                        "success" => true,
                        "message" => __('Message sent successfully.', 'wc-messaging'),
                        'wam_id' => $wam_id
                    );
                } else {
                    return array(
                        "success" => false,
                        'message' => __('No message id returned from API.', 'wc-messaging')
                    );
                }
            }
        }



        /**
         * get array of data if array has multiple arrays
         *
         * @param [type] $list
         * @return mixed
         */
        function get_params_from_object($list, $prefix, $result = array())
        {
            foreach ($list as $key => $value) {
                if (in_array(gettype($value), ['object', 'array'])) {
                    $this->get_params_from_object($value, $prefix . $key . '_', $result);
                } else {
                    $result[$prefix . $key] = $value;
                }
            }
            return $result;
        }

        /**
         * facilitates the retrieval of specific parameters  for WooCommerce orders.
         * 
         * @param string $type
         * @param string $method
         * @since 1.0.0
         */
        function woom_get_mparams($type = "keys", $method = "string", $order = null, $options = '')
        {
            $param_keys = array();
            $param_values = array();
            $additional_params = apply_filters("woom_additional_template_params", array(), $order, $options);
            $params_list = array(
                "site_title" => get_bloginfo('name'),
                "site_address" => get_bloginfo('wpurl'),
                "site_url" => get_bloginfo('url'),
            );
            if ($order === null) {


                $order_data =
                    array(
                        'order_id' => '',
                        'order_status' => '',
                        'order_prices_include_tax' => '',
                        'order_discount_total' => '',
                        'order_discount_tax' => '',
                        'order_shipping_total' => '',
                        'order_shipping_tax' => '',
                        'order_cart_tax' => '',
                        'order_total' => '',
                        'order_total_tax' => '',
                        'order_customer_id' => '',
                        'order_order_key' => '',
                        'order_billing_full_name' => '',
                        'order_shipping_full_name' => '',
                        'order_billing_first_name' => '',
                        'order_billing_last_name' => '',
                        'order_billing_company' => '',
                        'order_billing_address_1' => '',
                        'order_billing_address_2' => '',
                        'order_billing_city' => '',
                        'order_billing_state' => '',
                        'order_billing_postcode' => '',
                        'order_billing_country' => '',
                        'order_billing_email' => '',
                        'order_billing_phone' => '',
                        'order_shipping_first_name' => '',
                        'order_shipping_last_name' => '',
                        'order_shipping_company' => '',
                        'order_shipping_address_1' => '',
                        'order_shipping_address_2' => '',
                        'order_shipping_city' => '',
                        'order_shipping_state' => '',
                        'order_shipping_postcode' => '',
                        'order_shipping_country' => '',
                        'order_shipping_phone' => '',
                        'order_payment_method' => '',
                        'order_payment_method_title' => '',
                        'order_transaction_id' => '',
                        'order_created_via' => '',
                        'order_number' => '',
                        'order_date_created' => '',
                        'order_date_modified' => '',
                        'order_date_completed' => '',
                        'order_date_paid' => ''
                    );
            } else {
                $order_data = array();
                $order_data_prefix = "order_";

                foreach ($order->get_data() as $order_key => $order_val) {
                    if (in_array(gettype($order_val), ['object', 'array'])) {
                        $order_data = $this->get_params_from_object($order_val, $order_data_prefix . $order_key . "_", $order_data);
                    } else {
                        $order_data[$order_data_prefix . $order_key] = $order_val;
                    }
                }
                $order_data['order_billing_full_name'] = $order->get_formatted_billing_full_name();
                $order_data['order_shipping_full_name'] = $order->get_formatted_shipping_full_name();

                if (!empty($order->get_date_created())) {
                    $order_data['order_date_created'] = $order->get_date_created()->date("F j, Y");
                }
                if (!empty($order->get_date_modified())) {
                    $order_data['order_date_modified'] = $order->get_date_modified()->date("F j, Y");
                }
                if (!empty($order->get_date_completed())) {
                    $order_data['order_date_completed'] = $order->get_date_completed()->date("F j, Y");
                }
                if (!empty($order->get_date_paid())) {
                    $order_data['order_date_paid'] = $order->get_date_paid()->date("F j, Y");
                }
            }
            $params_list = array_merge($params_list, $order_data, $additional_params);
            if (!is_array($options) && $options !== '') {
                $avail_param_list = array();
                foreach (explode(',', $options) as $param) {
                    $param = str_replace(' ', '', $param);
                    $avail_param_list[$param] = $params_list[$param];
                }
                $params_list = $avail_param_list;
            } else if (is_array($options) && count($options) > 0) {
                foreach ($options as $param) {
                    $param = str_replace(' ', '', $param);
                    $avail_param_list[$param] = $params_list[$param];
                }
                $params_list = $avail_param_list;
            }
            switch ($type) {
                case 'keys':
                    $param_keys = array_keys($params_list);
                    if ($method === 'string') {
                        return implode(", ", $param_keys);
                    }
                    return $param_keys;
                    break;
                case 'values':
                    $param_values = array_values($params_list);
                    if ($method === 'string') {
                        return implode(", ", $param_values);
                    }
                    return $param_values;
                    break;

                default:

                    if ($method === 'string') {
                        $param = "";
                        foreach ($params_list as $p_key => $p_value) {
                            if ($param !== '') {
                                $param .= ",";
                            }
                            $param .= $p_key . '=' . $p_value;
                        }
                        return $param;
                    }
                    return $params_list;
                    break;
            }
            if ($method === 'string') {
                return implode(", ", $param_values);
            }
            return $param_values;
        }
    } // End Class
}//