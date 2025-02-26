<?php
use Mocean\Client;
use Mocean\Client\Credentials\Basic;
use Mocean\Voice\Mc;
use Mocean\Voice\McBuilder;

if (!class_exists('emc_Ajax')) {
    class emc_Ajax {
        public function __construct() {

            add_action('wp_ajax_make_the_call_guest', array($this, 'make_the_call_callback'));
            add_action('wp_ajax_nopriv_make_the_call_guest', array($this, 'make_the_call_callback'));
        }

        public function make_the_call_callback() {
            global $wpdb;
            $customerNumber = sanitize_text_field(preg_replace('/[^0-9]+/', '', $_POST['user']));
            $agentNumber = sanitize_text_field(preg_replace('/[^0-9]+/', '', $_POST['agent']));
            $welcome = sanitize_text_field($_POST['welcome']);
			$apikey = sanitize_text_field(get_option('emc_setting_account_sid'));
			$apisecret = sanitize_text_field(get_option('emc_setting_auth_token'));
			$operatornumber = sanitize_text_field(get_option('emc_setting_number'));

            if(isset ($_POST['security']) && wp_verify_nonce($_POST['security'], 'emc_nonce_action') && $customerNumber && $operatornumber) {
                   
                    //get the welcome message
                    if( $welcome){
                        $welcomemessage =  urlencode($welcome);
                    }else{
                        $welcomemessage = '';
                    }
                    
					$mocean = new Client(new Basic($apikey, $apisecret));
					
					$mcBuilder = McBuilder::create()
						->add(Mc::dial($operatornumber))
						->add(Mc::say($welcomemessage));
						
                    try {
					$mocean->voice()->call([
						'mocean-to' => $customerNumber,
						'mocean-command' => $mcBuilder
					]);
					echo "Done"; 
					} catch (Exception $e) {
						echo $e->getMessage();
					}
            }
            wp_die();
        }
    }
    $ajax = new emc_Ajax();
}
