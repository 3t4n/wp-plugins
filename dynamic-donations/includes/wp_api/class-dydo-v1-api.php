<?php

class DyDo_v1_Api
{

	/**
	 * Constructor.
	 *
	 * @return void
	 */
	public function __construct()
	{
		add_action(
			'rest_api_init',
			array($this, 'register_endpoints')
		);
	}

    private $mail_template_variables = array(
        '[site_url]'        => ''
	);


	/**
	 *  Register endpoints of wp api for the plugin.
	 * 	@return void
	 */
	public function register_endpoints()
	{
        $path = explode("/", $_SERVER['REQUEST_URI']);
        if ($path[4] == 'webhook') {
            $endpoints = array(
                array(
                    'slug' => 'webhook/',
                    'args' => array(
                        'methods'  => 'POST',
                        'callback' => array($this, 'stripe_webhook'),
                    ),
                ),
            );
        } 
        // else {
        //     $endpoints = array(
        //         array(
        //             'slug' => 'listen/',
        //             'args' => array(
        //                 'methods'  => 'GET',
        //                 'callback' => array($this, 'check_expired_payment_methods'),
        //             ),
        //         ),
        //     );
        // }
		
		foreach ($endpoints as $endpoint) {
			register_rest_route(
				PWP_SITE_API_PREFIX,
				$endpoint['slug'],
				$endpoint['args']
			);
		}
	}

	public function stripe_webhook(WP_REST_Request $request)
	{
		$web_mgnt = new DyDo_Stripe_Webhooks_Management($this->get_origin_ip());
		$result   = $web_mgnt->manage_webhook_request($request);
		if ($result['success'] === true) {
			return wp_send_json_success($result);
		}
		return wp_send_json_error($result);
	}

	private function get_origin_ip()
	{
		return isset($_SERVER['REMOTE_ADDR']) ? wp_unslash(sanitize_url($_SERVER['REMOTE_ADDR'])) : '0.0.0.0';
	}

    public function check_expired_payment_methods () {
        $users = get_users();
        $array_emails = [];

        foreach ($users as $user) {
            // Get customer id by user
            $customer_id = DyDo_Stripe_Customers::wp_get_user_customer_id($user->ID);
            $payment_methods_by_user = DyDo_Stripe_PaymentMethods::all(100, $customer_id);
            if (isset($payment_methods_by_user->data)) {
                foreach ($payment_methods_by_user->data as $paymentmethod) {
                    // iterate payment methods by user and verify each one
                    $days = $this->verify_days_for_expired_payment_methods($paymentmethod, $user->user_email);
                    if ($days == 15 || $days == 4 || $days == 0 || $days < 0) {
                        if (!in_array($user->user_email, $array_emails)) {
                            array_push($array_emails, $user->user_email);
                        } 
                    }
                }                
            }            
        }
        $this->wp_send_payment_expired_mail($array_emails);
        return true;
    }

    private function verify_days_for_expired_payment_methods($paymentmethod, $email) 
    {
        $fecha_actual = new DateTime(date('Y-m-d'));
        $fecha_aux = $paymentmethod->card->exp_year.'-'.$paymentmethod->card->exp_month.'-01';
        $last_date_of_month = date("Y-m-t", strtotime($fecha_aux));
        $last_day = substr($last_date_of_month, -2, 2);
        $fecha_card = $paymentmethod->card->exp_year.'-'.$paymentmethod->card->exp_month.'-'.$last_day;
        $fecha_final = new DateTime($fecha_card);
        $dias = $fecha_actual->diff($fecha_final)->format('%r%a');
        //echo 'Payment: '.$paymentmethod->card->last4.' expire on '.$dias.' days (user mail: '.$email.') <br>';
        return $dias;
    }


    public function wp_send_payment_expired_mail($emails)
    {
        try {
            $my_instance = new DyDo_Stripe_Webhooks_Management($this->get_origin_ip());
            $my_instance->send_payment_method_expired_mail($emails);
        } catch (\Throwable $th) {
            wp_send_json_error($th->getMessage());
        }    
    }

    public function test() {
        echo 'hola';
        // $output = shell_exec('crontab -l');
        // echo $output;
        // file_put_contents('/tmp/crontab.txt', $output.'* * * * * '.get_site_url().'/wp-json/dydo/v1/listen '.PHP_EOL);
        // echo exec('crontab /tmp/crontab.txt');
    }
}
