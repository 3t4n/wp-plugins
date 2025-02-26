<?php

class FiveSter_Frontend {

    public function __construct() {
        $this->load();
    }

    private function load() {
		add_action( 'woocommerce_order_status_changed', array( $this, 'order_completed' ), 99, 3 );
    }

	public function order_completed( $order_id, $old_status, $new_status ) {
		
		FiveSter_Log_Debug::log( "order $order_id, $old_status, $new_status ", true );
		
		if( $new_status !== "completed" ) return;

		FiveSter_Log_Debug::log( "order $order_id ", true );
		
		$order		= wc_get_order( $order_id );
		$order_data = $order->get_data();
		$data		= $order_data['billing'];
		$this->send_email( $order_id, $data['first_name'], $data['last_name'], $data['email'] );
	}

	private function send_email( $order_id, $first_name, $last_name, $email ) {
		$url	= FIVESTER_INVITE_API__ . FiveSter_Admin::getOption( 'password' );
		$domains = FiveSter_Admin::getOption( 'blacklist' );
		$domains = preg_replace('/\s+/', ',', $domains);
		$blacklist = explode(",", $domains);
		$user_domain = substr(strrchr($email, "@"), 1);
		
		
		if ( !in_array($user_domain, $blacklist)){
			
			$params	= array(
					'customerFirstname'		=> $first_name,
					'customerSurname'		=> $last_name,
					'customerEmail'			=> $email,
					'customerGender'		=> 'Heer/mevrouw',
					'employeeFirstname'		=> FiveSter_Admin::getOption( 'employeeFirstname' ),
					'employeeSurname'		=> FiveSter_Admin::getOption( 'employeeSurname' ),
					'employeeEmail'			=> FiveSter_Admin::getOption( 'employeeEmail' ),
					'reminderDelayInDays'	=> FiveSter_Admin::getOption( 'reminderDelayInDays' ),
					'debug'					=> intval( FiveSter_Admin::getOption( 'debug' ) ) === 1,
			);
			$result	= wp_remote_retrieve_body(wp_remote_post( $url, array(
				'method'	=> 'POST',
				'headers'	=> array(
				'companyID'	=> FiveSter_Admin::getOption( 'companyID' ),
				),
				'body'		=> json_encode( $params ),
			) ) );
	
			$result	= json_decode( $result, true );
			FiveSter_Log_Debug::log( sprintf( "For order#%s Calling %s with params %s and getting response: %s", $order_id, $url, print_r( $params,true ), print_r( $result, true ) ), true );
		}else{
			FiveSter_Log_Debug::log("user email: $user_domain, has been blocked", true);
		}
	}

}