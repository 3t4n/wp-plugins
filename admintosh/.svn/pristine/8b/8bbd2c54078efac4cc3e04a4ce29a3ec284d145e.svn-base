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
 
 class Recaptcha {

    protected $options;

    /**
     * Start up
     */
    public function __construct() {

        $this->options = get_option( ADMINTOSH_OPTION_NAME );

        $get_options = $this->options;

        add_action('init', [ $this, 'init_session' ], 999 );
        if( !empty( $get_options['active_login_captcha'] ) ) {
            add_action('login_form', [ $this, 'login_form_captcha' ], 999 );
            add_filter('wp_authenticate_user',[ $this, 'validate_login_captcha' ],10,2);
        }
        
    }

    public function init_session() {
        if(!session_id()) {
            session_start();
        }

    }

    public function login_form_captcha() {
        
        $admintoshrev_options = $this->options;

        ?>
        <style>
            .admintosh-login-recaptcha-wrap {
                display: flex;
                align-items: center;
                margin-bottom: 18px;
            }
            .admintosh-login-recaptcha-wrap span {
                font-size: 18px;
            }
            .admintosh-login-recaptcha-wrap input {
                width: 90px !important;
                margin-bottom: 0 !important;
                margin-top: 0 !important;
                margin-left: 10px !important;
                min-height: 20px !important;
                max-height: 35px !important;
                font-size: 18px;
            }
            .random-number-captcha-type span {
                line-height: 0;
            }
            .random-number-captcha-type input {
                max-height: 40px !important;
            }
            .admintosh-login-recaptcha-wrap.g-recaptcha{
                transform: scale(0.895);
                transform-origin: 0 0;
                clear: both;
            }
        </style>

        <?php
        if( !empty( $admintoshrev_options['captcha_type'] ) && $admintoshrev_options['captcha_type'] == 'addition_captcha' ) {
            $this->addition_captcha();
        }elseif( !empty( $admintoshrev_options['captcha_type'] ) && $admintoshrev_options['captcha_type'] == 'google_captcha' ) {
            $this->google_recaptcha();
        } else {
            $this->random_number_captcha();
        }

    }

    public function validate_login_captcha( $user, $password ) {

        $return_value = $user;
        $admintoshrev_options = $this->options;

        // Check captcha type
        if( !empty( $admintoshrev_options['captcha_type'] ) && $admintoshrev_options['captcha_type'] == 'google_captcha' ) {

            // Storing google recaptcha response in $recaptcha variable
            $recaptcha = isset( $_POST['g-recaptcha-response'] ) ? esc_html( $_POST['g-recaptcha-response'] ) : '';
          
            // Put secret key here, which we get from google console
            $secret_key = !empty( $admintoshrev_options['grc_secret_key'] ) ? $admintoshrev_options['grc_secret_key'] : '';
          
            // Hitting request to the URL, Google will respond with success or error scenario
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret='. esc_html( $secret_key ) . '&response=' .esc_html( $recaptcha );
          
            // Making request to verify captcha
            $response = wp_remote_get( esc_url_raw( $url ) );
          
            // Response return by google is in JSON format, so we have to parse
            $response = json_decode( wp_remote_retrieve_body( $response ) );

            if ($response->success != true) {
                $return_value = new \WP_Error( 'loginCaptchaError', esc_html__( 'Captcha Error. Please try again.', 'admintosh' ) );
            }

        } else {

            if( !$this->check( sanitize_text_field( $_POST['adtosh_captcha_answer'] ) ) ) {
                // if there is a mis-match
                $return_value = new \WP_Error( 'loginCaptchaError', esc_html__( 'Captcha Error. Please try again. ', 'admintosh' ) );

            }
        }

        
        return $return_value;
    }

	public function check( $ans ) {
        $uid = $_POST['adtosh_captcha_id'] ?? '';
        return isset( $_SESSION['admintosh_security_captcha_'.$uid] ) && $_SESSION['admintosh_security_captcha_'.$uid] == $ans ? true : false;
    }

    public function addition_captcha() {
        ?>
        <div class="admintosh-login-recaptcha-wrap addition-captcha-type">
            <span><?php echo esc_html( \Admintosh\Classes\Recaptcha_Generator::get_addition_captcha() ); ?></span>
            <?php $this->captcha_input(); ?>
        </div>
        <?php
    }
    
    public function random_number_captcha() {
        ?>
        <div class="admintosh-login-recaptcha-wrap random-number-captcha-type">
            <span><img src="<?php \Admintosh\Classes\Recaptcha_Generator::get_random_number_captcha(); ?>" /></span>
            <?php $this->captcha_input(); ?>
        </div>
        <?php
    }

    public function google_recaptcha() {
        wp_enqueue_script( 'google-recaptcha', '//www.google.com/recaptcha/api.js', array(), null, false );
        \Admintosh\Classes\Recaptcha_Generator::get_google_recaptcha();
    }

    public function captcha_input() {
        echo '<input name="adtosh_captcha_answer" autocomplete="off" type="text" />';
        echo '<input type="hidden" value="'.esc_html( ADMINTOSH_UNIQID ).'" name="adtosh_captcha_id" />';
    }


}

