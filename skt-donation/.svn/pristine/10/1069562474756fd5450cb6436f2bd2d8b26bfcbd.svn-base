<?php 
define('CACERT_CONFIG_PATH', __DIR__ . "/cert/");
class StdPayPal
{
    /**
     * @var bool $use_sandbox     Indicates if the sandbox endpoint is used.
     */
    private $use_sandbox = false;
    
    private $paypal_business_email = '';
    /**
     * @var bool $use_local_certs Indicates if the local certificates are used.
     */
    private $use_local_certs = true;

    /** Production Postback URL */
    const VERIFY_URI = 'https://ipnpb.paypal.com/cgi-bin/webscr';
    /** Sandbox Postback URL */
    const SANDBOX_VERIFY_URI = 'https://ipnpb.sandbox.paypal.com/cgi-bin/webscr';
    
    /** Production Post URL */
    const PAYPAL_POST_LIVE_URI = 'https://www.paypal.com/cgi-bin/webscr';
    /** Sandbox Post URL */
    const PAYPAL_POST_SANDBOX_URI = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
    /** Response from PayPal indicating validation was successful */
    const VALID = 'VERIFIED';
    /** Response from PayPal indicating validation failed */
    const INVALID = 'INVALID';
    function __construct($config) {
		$this->use_sandbox = $config['paypal_use_sandbox'];
        $this->paypal_business_email = $config['paypal_business_email'];
	}
    /**
     * Determine endpoint to post the verification data to.
     * @return string
     */
    public function getPaypalUri()
    {
        if ($this->use_sandbox) {
            return self::SANDBOX_VERIFY_URI;
        } else {
            return self::VERIFY_URI;
        }
    }
    /**
     * Determine endpoint to post the form data to paypal site.
     * @return string
     */
    public function getPaypalPostUri()
    {        
        if ($this->use_sandbox) {
            return self::PAYPAL_POST_SANDBOX_URI;
        } else {
            return self::PAYPAL_POST_LIVE_URI;
        }
    }
    /**
     * prepare post value in a single array and post it to paypal.
     * @return string
     */
    public function purchase($params = array())
    {    
        $post_data = array();
        $message = 'Please wait!! we are redirecting the website on PayPal to pay your payment amount.';
        $post_data['business'] = $this->paypal_business_email;
        $post_data['cmd'] = '_xclick';
        $post_data['no_note'] = 1;
        $post_data['no_shipping'] = 1;
        $post_data['lc'] = 'EN';
        $post_data['bn'] = 'PP-BuyNowBF';
        $url = $this->getPaypalPostUri();
        if(!empty($params)){
            foreach($params as $key => $value){
                $post_data[$key] = $value;
            }
        }
        $this->post_redirect($url, $post_data, $message);
    }
    public function subscribe($params = array())
    {    
        $post_data = array();
        $message = 'Please wait!! we are redirecting the website on PayPal to pay your payment amount.';
        $post_data['business'] = $this->paypal_business_email;
        $post_data['cmd'] = '_xclick-subscriptions';
        $post_data['no_note'] = 1;
        $post_data['no_shipping'] = 1;
        $post_data['lc'] = 'EN';
        $post_data['rm'] = 2;
        $post_data['bn'] = 'PP-SubscriptionsBF:btn_subscribeCC_LG.gif:NonHostedGuest';
        $url = $this->getPaypalPostUri();
        if(!empty($params)){
            foreach($params as $key => $value){
                $post_data[$key] = $value;
            }
        }
       $check =  $this->post_redirect($url, $post_data, $message);
    }
    /**
	 * Redirect the user's browser to a URL using a POST request.
	 */
	protected function post_redirect($url, $data, $message = NULL)
	{
		return self::post_payapl_redirect($url, $data, $message);
	}
    	/**
	 * Redirect the user's browser to a URL using a POST request.
	 *
	 * @param string $url
	 * @param array $data
	 * @param string $message
	 */
	public static function post_payapl_redirect($url, $data, $message = NULL)
	{
		?>
        	<form name="payment" action="<?php echo wp_kses_post($url); ?>" method="post">
        		<p><?php echo !empty($message)? wp_kses_post($message):''; ?></p>
        		<p>
        			<?php foreach ($data as $key => $value): ?>
        				<input type="hidden" name="<?php echo wp_kses_post($key); ?>" value="<?php echo wp_kses_post($value); ?>" />
        			<?php endforeach ?>
        			<input type="submit" value="Continue" id="modal" />
        		</p>
        	</form>

            <script type="text/javascript">
                $(document).ready(function(){
                    $("#modal").click(); 
                });
            </script>
        <!-- </body>
        </html> -->
        <?php
		exit();
 	}
    /**
     * Verification Function
     * Sends the incoming post data back to PayPal using the cURL library.
     *
     * @return bool
     * @throws Exception
     */
    public function verifyIPN() {
        if (!count($_POST)) { // phpcs:ignore WordPress.Security.NonceVerification.Missing
            throw new Exception("Missing POST Data");
        }

        $raw_post_data = file_get_contents('php://input');
        $raw_post_array = explode('&', $raw_post_data);
        $myPost = array();

        foreach ($raw_post_array as $keyval) {
            $keyval = explode('=', $keyval);
            if (count($keyval) == 2) {
                // Preserve '+' in datetime strings
                if ($keyval[0] === 'payment_date' && substr_count($keyval[1], '+') === 1) {
                    $keyval[1] = str_replace('+', '%2B', $keyval[1]);
                }
                $myPost[$keyval[0]] = urldecode($keyval[1]);
            }
        }

        // Build the body of the verification post request, adding the _notify-validate command
        $req = 'cmd=_notify-validate';
        foreach ($myPost as $key => $value) {
            $req .= "&" . urlencode($key) . "=" . urlencode($value);
        }

        // Set up request arguments
        $response = wp_remote_post($this->getPaypalUri(), array(
            'method'      => 'POST',
            'body'        => $req,
            'timeout'     => 45,
            'httpversion' => '1.1',
            'headers'     => array(
                'Connection' => 'Close',
            ),
            'sslverify'   => $this->use_local_certs,
            'sslcertificates' => $this->use_local_certs ? CACERT_CONFIG_PATH . '/cacert.pem' : null,
        ));

        // Handle errors
        if (is_wp_error($response)) {
            $error_message = $response->get_error_message();
            throw new Exception("HTTP request error: " . esc_attr( $error_message ) );
        }

        $http_code = wp_remote_retrieve_response_code($response);
        if ($http_code !== 200) {
            throw new Exception("PayPal responded with http code $http_code"); // phpcs:ignore WordPress.Security.EscapeOutput.ExceptionNotEscaped
        }

        $body = wp_remote_retrieve_body($response);
        if ($body === self::VALID) {
            return $myPost;
        } else {
            return false;
        }
    }
}