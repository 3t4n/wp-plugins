<?php
namespace Admintosh\Inc;
 /**
  * 
  * @package    Admintosh
  * @version    1.0.0
  * @author     wpmobo
  * @Websites: http://wpmobo.com
  *
  */
 
class Limit_Login_Attempts {

	private $failed_login_limit;
	private $lockout_duration; //Sureyi sn cinsinden giriniz. 30 dakika: 60*30 = 1800
	private $transient_name = 'admintosh_attempted_login';

    private $username;

	function __construct() {

        $opt = get_option( 'admintosh_options' );

        $this->failed_login_limit = !empty( $opt['ath_failed_login_limit'] ) ? $opt['ath_failed_login_limit'] : 3;
        $duration = !empty( $opt['ath_lockout_duration'] ) ? $opt['ath_lockout_duration'] : 15;
        $this->lockout_duration = 60 * $duration;

		add_filter( 'authenticate', array( $this, 'check_attempted_login' ), 30, 3 );
    	add_action( 'wp_login_failed', array( $this, 'login_failed' ), 10, 1 );
        add_action( 'login_errors', array( $this, 'login_errors_msg' ), 10, 1 );

	}

    protected function getTransientName($username) {
        return $this->transient_name.'_'.sanitize_title($username);
    }

	public function check_attempted_login( $user, $username, $password ) {
        $error = new \WP_Error();
		  
          $transientName = $this->getTransientName($username);

          if ( get_transient( $transientName ) ) {
            
            $datas = get_transient( $transientName );
            if ( $datas['tried'] >= $this->failed_login_limit ) {
                $until = get_option( '_transient_timeout_' . $transientName );

                $time = $this->when( $until );
                //Display error message to the user when limit is reached
                $error->add( 'too_many_tried', sprintf( __( 'To many failed login attempts. Please login after %1$s', 'admintosh' ) , $time ) );

                return $error;
            }

        }

        return $user;

	}

	public function login_failed( $username ) {

        $this->username = $username;

        $transientName = $this->getTransientName($username);

        $datas = get_transient( $transientName );

		if ( !empty( $datas['tried'] ) ) {
            $datas['tried']++;
            if ( $datas['tried'] <= $this->failed_login_limit ) {
                set_transient( $transientName, $datas , $this->lockout_duration );
            }
        } else {
            $datas = array(
            'tried' => 1
            );
            set_transient( $transientName, $datas , $this->lockout_duration );
        }

	}

	private function when( $time ) {
        if ( ! $time )
        return;
            $right_now = time();
            $diff = abs( $right_now - $time );
            $second = 1;
            $minute = $second * 60;
            $hour = $minute * 60;
            $day = $hour * 24;
        if ( $diff < $minute )
            return floor( $diff / $second ) . ' sec';
        if ( $diff < $minute * 2 )
            return "1 minute";
        if ( $diff < $hour )
            return floor( $diff / $minute ) . ' min';
        if ( $diff < $hour * 2 )
            return '1 Hour';
            return floor( $diff / $hour ) . ' Hour';
    }


    public function login_errors_msg( $error ) {


        $transientName = $this->getTransientName($this->username);

          if ( get_transient( $transientName ) ) {
            
            $datas = get_transient( $transientName );
            if ( $datas['tried'] >= $this->failed_login_limit ) {
                $until = get_option( '_transient_timeout_' . $transientName );

                $time = $this->when( $until );
                //Display error message to the user when limit is reached
                $error = sprintf( __( 'To many failed login attempts. Please login after %1$s', 'admintosh' ) , $time );
            } 

            if( !empty( $datas['tried'] ) && $datas['tried'] < $this->failed_login_limit ) {
                $error .= sprintf( __( '%1$s %2$s attempts remaining.%3$s', 'admintosh' ) , '<p style="color: #ff0000;margin-top: 8px;"><strong>', ($this->failed_login_limit - $datas['tried']), '</strong></p>' );
            }

        }

        return $error;

    }



}
