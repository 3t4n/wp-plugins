<?php
class GFPaymentRecovery {
	public static function add_hooks() {
		if (GFStripeExtensions::get_option('recovery-enable')) {
			add_action('parse_request', array(static::class, 'parse_request'), 5);
		}
		add_shortcode('stripe_payment_recovery', array(static::class, 'stripe_payment_recovery'));
		//add_filter('gform_stripe_webhook', array(static::class, 'gform_stripe_webhook'), 10, 2);
	}
	public static function stripe_payment_recovery($atts) {
		//https://codex.wordpress.org/Shortcode_API
		$a = shortcode_atts( array(
			'test' => 'false'
		), $atts );
		$test = filter_var($a['test'], FILTER_VALIDATE_BOOLEAN);
		$public_key = $test ? GFStripeExtensions::get_stripe_test_public() : GFStripeExtensions::get_stripe_live_public();
		$secret_key = $test ? GFStripeExtensions::get_stripe_test_secret() : GFStripeExtensions::get_stripe_live_secret();
		//https://stripe.com/docs/recipes/updating-customer-cards
		if (isset($_GET['customer']) && $_GET['customer'] != '') {
		$secret_key = $test ? GFStripeExtensions::get_stripe_test_secret() : GFStripeExtensions::get_stripe_live_secret();
			if ($public_key && trim($public_key) != '' && $secret_key && trim($secret_key) != '') {
				$customer = self::base64_decode_url($_GET['customer']);
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					if (!class_exists('\Stripe\Stripe')) {
						require_once('inc/autoload.php');
					}
					\Stripe\Stripe::setApiKey($secret_key);
					if (isset($_POST['stripeToken'])){
						try {
							$cu = \Stripe\Customer::update(
								$customer,
								[ 'source' => $_POST['stripeToken']]
							);
							$success = "Your card details have been updated!";
							$html .= $success;
						} catch(Exception $e) {
							//TODO: errors are not getting caught
							$body = $e->getJsonBody();
							$err  = $body['error'];
							$error = $err['message'];
							$html .= $error;
						}
					}
				} else {
					$email = self::base64_decode_url($_GET['email']); //TODO: maybe leave of email to get user to update?
					$html = '<form action="" method="POST">
						<script
						src="https://checkout.stripe.com/checkout.js" class="stripe-button"
						data-key="'.$public_key.'"
						data-image=""
						data-name="'.htmlspecialchars(get_bloginfo('','name')).'"
						data-panel-label="Update Card Details"
						data-label="Update Card Details"
						data-allow-remember-me=false
						data-locale="auto"
						data-billing-address="true"
						data-email="'.$email.'">
						</script>
					</form>';
				}
			} else {
				$html = 'Please set stripe public/secret key.';	
			}
		} else {
			$html = 'Please specify customer.';
		}
		return $html;
	}
	public static function base64_encode_url($string) {
		return str_replace(['+','/','='], ['-','_',''], base64_encode($string));
	}
	public static function base64_decode_url($string) {
		return base64_decode(str_replace(['-','_'], ['+','/'], $string));
	}
	public static function parse_request($query) {
		//TODO: check if test event and don't send?????
		$response = GFStripeExtensions::stripe_event();
		if (!empty($response) && isset($response['data']) && isset($response['data']['object'])) {
			//TODO: check if recurring
			$event = $response['data']['object'];
			$customer = $event['customer'];
			$billing = $event['billing_details'];
			$email = $billing['email'];
			$email = $email && $email != '' ? $email : $event['receipt_email'];
			$name = $billing['name'];
			$name = $name && $name != '' ? $name : 'Customer';
			if ($response['type'] == 'charge.failed') {
				self::send_email($customer, $email, 'failed', $name);
			} elseif ($response['type'] == 'charge.expired') {
				self::send_email($customer, $email, 'expired', $name);
			}
		}
	}
	public static function replace_tag($message, $tag, $value) {
		return str_replace('['.$tag.']', $value, $message);
	}
	public static function send_email($customer, $email, $type, $name = 'Customer') {
		if ($customer && $customer != '' && $email && $email != '') {
			$address = GFStripeExtensions::get_option('recovery-address');
			$subject = GFStripeExtensions::get_option('recovery-subject');
			$message = GFStripeExtensions::get_option('recovery-template');
			$url = GFStripeExtensions::get_option('recovery-url');
			if ($address && $address != '' && $message && $message != ''&& $url && $url != '') {
				$customer_encode = self::base64_encode_url($customer);
				$email_encode = self::base64_encode_url($email);
				$link = (strpos($url, 'http') === 0 ? '' : get_site_url()) . $url . (strpos($url, '?') === false ? '?' : '&') . 'customer=' . $customer_encode . '&email=' . $email_encode;
				$message = self::replace_tag($message, 'link', $link);
				$message = self::replace_tag($message, 'error', $type);
				$message = self::replace_tag($message, 'email', $email);
				$message = self::replace_tag($message, 'fullname', $name);
				$message = self::replace_tag($message, 'sitename', get_bloginfo('','name'));
				$headers = array('Content-Type: text/html; charset=UTF-8');
				$bcc = GFStripeExtensions::get_option('recovery-bcc');
				if ($bcc && $bcc != '') {
					$headers[] = 'Bcc: ' . $bcc;
				}
				add_filter('wp_mail_from', array(self::class, 'wp_mail_from'));
				add_filter('wp_mail_from_name', array(self::class, 'wp_mail_from_name'));
				add_action('wp_mail_failed', array(static::class, 'wp_mail_failed'));
				$result = wp_mail($email, $subject, wpautop($message), $headers);
				remove_filter('wp_mail_from', array(self::class, 'wp_mail_from'));
				remove_filter('wp_mail_from_name', array(self::class, 'wp_mail_from_name'));
				remove_action('wp_mail_failed', array(static::class, 'wp_mail_failed'));
				if (!$result) {
					error_log('Payment Recovery Failed');
				}	
			} else {
				error_log("send_email: Address, template or url blank, skipping recovery.");
			}
		} else {
			error_log("send_email: Customer or email blank, skipping recovery.");
		}
	}
	public static function wp_mail_from_name($name) {
		return GFStripeExtensions::get_option('recovery-name');
	}
	public static function wp_mail_from($email) {
		return GFStripeExtensions::get_option('recovery-address');
	}
	public static function gform_stripe_webhook($action, $event) {
		if ($event) {
			if ($event->type == 'charge.failed') {
				
			} elseif ($event->type == 'charge.expired') {
				//Expired don't show up here because of stripe payment addon not finding event
			}
		}
	}
	public static function wp_mail_failed($error) {
		error_log(print_r($error, true));
	}
}
GFPaymentRecovery::add_hooks();